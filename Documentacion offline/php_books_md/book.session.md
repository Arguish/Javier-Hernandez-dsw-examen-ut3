# Gestión de sesiones

# Introducción

El soporte de sesiones de PHP es un medio para preservar
datos entre varios accesos.

Cada visitante que accede a su página web se le asigna un
identificador único, llamado "identificador de sesión". Puede
almacenarse en una cookie o propagarse en la URL.

El soporte de sesiones permite almacenar datos entre las peticiones
en el array superglobal [$\_SESSION](#reserved.variables.session).
Cuando un visitante accede a su sitio, PHP verificará automáticamente (si
[**session.auto_start
**](#ini.session.auto-start) está activado) o bajo demanda (explícitamente con
[session_start()](#function.session-start)) si existe una
sesión con el mismo nombre. En caso afirmativo, el entorno
previamente guardado será recreado.

**Precaución**

    Si se activa [
    session.auto_start](#ini.session.auto-start) entonces el único medio de poner objetos
    en la sesión es cargar las definiciones de clase con
    [auto_prepend_file](#ini.auto-prepend-file)
    en el cual se cargan las definiciones necesarias,
    o bien se deberá utilizar [serialize()](#function.serialize)
    en su objeto, y [unserialize()](#function.unserialize)
    para recuperarlo.

La variable [$\_SESSION](#reserved.variables.session) (y todas las variables
registradas) son serializadas internamente por PHP utilizando el
gestor de serialización especificado por la opción de configuración
[session.serialize_handler](#ini.session.serialize-handler),
después de la ejecución del script PHP. Las variables que están indefinidas son marcadas
como tales. En accesos posteriores, no estarán
definidas, hasta que el usuario lo haga.

**Advertencia**

    Debido a que los datos de sesión son serializados,
    las variables de tipo [resource](#language.types.resource) no pueden almacenarse
    en una sesión.




    Los gestores de serialización (php
    y php_binary) heredan las limitaciones de
    register_globals. Por lo tanto, los índices numéricos o los índices
    en forma de string que contienen caracteres especiales
    (| y !) no
    pueden utilizarse. Su uso generará errores al final del script. php_serialize
    no tiene este tipo de limitaciones.

**Nota**:

    Tenga en cuenta que al trabajar con sesiones, un registro
    en la sesión no será creado hasta que la variable sea
    registrada añadiendo una clave al array superglobal
    [$_SESSION](#reserved.variables.session). Esto solo es válido si se ha iniciado una
    sesión llamando a la función [session_start()](#function.session-start).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#session.requirements)
- [Instalación](#session.installation)
- [Configuración en tiempo de ejecución](#session.configuration)

    ## Requerimientos

    No se requiere ninguna biblioteca externa para compilar esta extensión.

    **Nota**:

    Opcionalmente, puede utilizarse la asignación de memoria compartida
    (mm), desarrollada por Ralf S.Engelschall, para almacenar las sesiones.
    Es necesario descargar [» mm](http://www.ossp.org/pkg/lib/mm/) e instalarlo.
    Esta opción no está disponible para los entornos Windows.
    Tenga en cuenta que el módulo de almacenamiento de sesiones mm no garantiza
    los bloqueos de sesiones en caso de acceso múltiple a la misma sesión.
    Puede ser más adecuado utilizar un sistema de archivos basado en memoria compartida
    (como tmpfs en Solaris/Linux o /dev/md en BSD)
    para almacenar las sesiones en archivos, ya que estos serán bloqueados correctamente.
    Los datos de sesión se almacenan en memoria, por lo que serán borrados
    al reiniciar el servidor web.

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-session**

Para utilizar la asignación de memoria compartida (mm) para el almacenamiento de las sesiones, configure PHP
**--with-mm[=DIR]**.

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

**Nota**:

Por omisión, todos los datos relativos a una sesión particular serán
almacenados en un fichero del directorio especificado por **session.save_path**
en las opciones del archivo php.ini. Un fichero para cada sesión será creado.
Esto se debe a que una sesión es abierta (un fichero es creado) pero
ningún dato es escrito en este fichero.
Tenga en cuenta que este comportamiento es un efecto de las limitaciones de uso
del sistema de ficheros y es posible que un gestor de sesiones personalizado (por ejemplo, uno que utilice una base de datos)
no guarde ningún registro de las sesiones donde ningún dato haya sido almacenado.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración para las sesiones**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [session.save_path](#ini.session.save-path)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [session.name](#ini.session.name)
      "PHPSESSID"
      **[INI_ALL](#constant.ini-all)**
       



      [session.save_handler](#ini.session.save-handler)
      "files"
      **[INI_ALL](#constant.ini-all)**
       



      [session.auto_start](#ini.session.auto-start)
      "0"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.gc_probability](#ini.session.gc-probability)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [session.gc_divisor](#ini.session.gc-divisor)
      "100"
      **[INI_ALL](#constant.ini-all)**
       



      [session.gc_maxlifetime](#ini.session.gc-maxlifetime)
      "1440"
      **[INI_ALL](#constant.ini-all)**
       



      [session.serialize_handler](#ini.session.serialize-handler)
      "php"
      **[INI_ALL](#constant.ini-all)**
       



      [session.cookie_lifetime](#ini.session.cookie-lifetime)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [session.cookie_path](#ini.session.cookie-path)
      "/"
      **[INI_ALL](#constant.ini-all)**
       



      [session.cookie_domain](#ini.session.cookie-domain)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [session.cookie_secure](#ini.session.cookie-secure)
      "0"
      **[INI_ALL](#constant.ini-all)**
      Anterior a PHP 7.2.0, el valor por omisión era "".



      [session.cookie_httponly](#ini.session.cookie-httponly)
      "0"
      **[INI_ALL](#constant.ini-all)**
      Anterior a PHP 7.2.0, el valor por omisión era "".



      [session.cookie_samesite](#ini.session.cookie-samesite)
      ""
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.3.0.



      [session.use_strict_mode](#ini.session.use-strict-mode)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [session.use_cookies](#ini.session.use-cookies)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [session.use_only_cookies](#ini.session.use-only-cookies)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [session.referer_check](#ini.session.referer-check)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [session.cache_limiter](#ini.session.cache-limiter)
      "nocache"
      **[INI_ALL](#constant.ini-all)**
       



      [session.cache_expire](#ini.session.cache-expire)
      "180"
      **[INI_ALL](#constant.ini-all)**
       



      [session.use_trans_sid](#ini.session.use-trans-sid)
      "0"
      **[INI_ALL](#constant.ini-all)**





      [session.trans_sid_tags](#ini.session.trans-sid-tags)
      "a=href,area=href,frame=src,form="
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.1.0.



      [session.trans_sid_hosts](#ini.session.trans-sid-hosts)
      $_SERVER['HTTP_HOST']
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.1.0.



      [session.sid_length](#ini.session.sid-length)
      "32"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.1.0. Obsolète a partir de PHP 8.4.0.



      [session.sid_bits_per_character](#ini.session.sid-bits-per-character)
      "4"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.1.0. Obsolète a partir de PHP 8.4.0.



      [session.upload_progress.enabled](#ini.session.upload-progress.enabled)
      "1"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.upload_progress.cleanup](#ini.session.upload-progress.cleanup)
      "1"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.upload_progress.prefix](#ini.session.upload-progress.prefix)
      "upload_progress_"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.upload_progress.name](#ini.session.upload-progress.name)
      "PHP_SESSION_UPLOAD_PROGRESS"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.upload_progress.freq](#ini.session.upload-progress.freq)
      "1%"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.upload_progress.min_freq](#ini.session.upload-progress.min-freq)
      "1"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [session.lazy_write](#ini.session.lazy-write)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [session.hash_function](#ini.session.hash-function)
      "0"
      **[INI_ALL](#constant.ini-all)**
      Eliminado a partir de PHP 7.1.0



      [session.hash_bits_per_character](#ini.session.hash-bits-per-character)
      "4"
      **[INI_ALL](#constant.ini-all)**
      Eliminado a partir de PHP 7.1.0



      [session.entropy_file](#ini.session.entropy-file)
      ""
      **[INI_ALL](#constant.ini-all)**
      Eliminado a partir de PHP 7.1.0.



      [session.entropy_length](#ini.session.entropy-length)
      "0"
      **[INI_ALL](#constant.ini-all)**
      Eliminado a partir de PHP 7.1.0.


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

El sistema de sesiones dispone de un gran número de directivas
en el archivo php.ini. A continuación se presenta una descripción:

     session.save_handler
     [string](#language.types.string)



      Define el nombre del controlador
      de sesiones que se utiliza para almacenar y leer
      los datos. Por omisión, es el sistema integrado
      por archivos: files. Tenga en cuenta que las
      extensiones individuales deben registrar
      sus propios controladores de sesiones. Consulte también
      [session_set_save_handler()](#function.session-set-save-handler).






     session.save_path
     [string](#language.types.string)



      Define la ruta que debe pasarse
      al controlador de guardado. Si decide
      elegir el controlador por omisión (por archivos),
      este argumento se utilizará como carpeta de guardado
      de las sesiones. Consulte también
      [session_save_path()](#function.session-save-path).


      Existe un argumento opcional N para esta directiva que determina
      la profundidad de directorios donde su archivo de sesión será almacenado.
      Por ejemplo, si define '5;/tmp', su archivo
      estará ubicado en /tmp/4/b/1/e/3/sess_4b1e384ad74619bd212e236e52a5a174If.
      Si desea utilizar N, debe crear
      todos estos directorios antes de usarlos. Existe un pequeño script shell en
      ext/session para realizar estas creaciones y se denomina
      mod_files.sh, y su versión Windows lleva el nombre
      mod_files.bat. Tenga en cuenta también que si N
      se utiliza y es superior a 0, entonces la rutina automática gc (recolección de basura)
      no se ejecutará; consulte una copia de php.ini para más información.
      Asimismo, si utiliza N, asegúrese de rodear
      session.save_path con "comillas dobles" ya que el separador
      (;) también se utiliza para los comentarios en
      php.ini.




      El módulo de almacenamiento de archivos crea archivos utilizando el modo
      600 por omisión. Este modo por omisión puede modificarse utilizando el argumento
      opcional MODE: N;MODE;/path donde
      MODE es la representación octal del modo.
      El hecho de definir el argumento MODE no afecta al proceso
      umask.



     **Advertencia**

       Si esta opción se configura con una carpeta accesible en lectura
       para todos, como /tmp (por omisión), otros usuarios podrán explotar estas sesiones obteniendo la
       lista de archivos en esta carpeta.




     **Precaución**

       Al utilizar el argumento opcional N
       que determina la profundidad de directorios, como se indicó anteriormente, tenga en cuenta
       que el uso de un valor superior a 1 o 2 no es apropiado
       para la mayoría de los sitios debido al número de directorios requeridos: por
       ejemplo, un valor de 3 implica que
       (2 ** session.sid_bits_per_character) ** 3 directorios
       existen en el sistema de archivos lo que implica potencialmente un
       gran número de espacios y inodos desperdiciados.




       No utilice un valor de N superior a 2 a menos
       que esté seguro de que es necesario para su sitio.









     session.name
     [string](#language.types.string)



      Especifica el nombre de la sesión,
      que se utilizará como nombre de cookie. Solo debe contener
      caracteres alfanuméricos. Por omisión, es
      PHPSESSID.
      Consulte también [session_name()](#function.session-name).






     session.auto_start
     [bool](#language.types.boolean)



      Especifica si el módulo
      de sesiones debe iniciarse automáticamente al comienzo de
      cada script PHP. Por omisión, es 0
      (desactivado).






     session.serialize_handler
     [string](#language.types.string)



      Define el nombre del controlador que se utiliza para serializar y
      deserializar los datos. El formato de serialización PHP
      (llamado php_serialize), los formatos internos a PHP
      (llamados php y php_binary)
      y WDDX (llamado wddx) son soportados. WDDX solo
      está disponible, si PHP ha sido compilado con la opción
      [WDDX](#ref.wddx). php_serialize
      utiliza las funciones de serialización/deserialización en interno,
      y no tiene las limitaciones que php y php_binary
      tienen. Los antiguos controladores de serialización no pueden almacenar
      índices numéricos, ni índices en forma de cadenas que contengan
      caracteres especiales (| y !) en
      $_SESSION. Utilice php_serialize para evitar este
      tipo de error al final del script. Por omisión, es php.






     session.gc_probability
     [int](#language.types.integer)



      Especifica la probabilidad, expresada en porcentaje, en conjunción de
      session.gc_divisor, que la rutina gc
      (garbage collection)
      se inicie en cada solicitud.
      El valor por omisión es 1. Debe ser superior o igual a 0. Consulte
      [session.gc_divisor](#ini.session.gc-divisor) para más detalles.






     session.gc_divisor
     [int](#language.types.integer)



      session.gc_divisor en conjunción con
      session.gc_probability define la probabilidad que la rutina gc
      (garbage collection) se inicie en cada inicio de sesión.
      La probabilidad se calcula utilizando gc_probability/gc_divisor, por
      ejemplo 1/100 significa que hay un 1% de probabilidad de que la rutina gc
      se inicie en cada solicitud. El valor por omisión es 100.
      Debe ser superior o igual a 0.






     session.gc_maxlifetime
     [int](#language.types.integer)



      Especifica la duración de vida de los datos en el servidor, en número
      de segundos. Después de este tiempo, los datos serán considerados
      obsoletos, y pueden potencialmente ser eliminados.
      Los datos pueden volverse obsoletos al inicio de la sesión
      (siguiendo [session.gc_probability](#ini.session.gc-probability) y
      [session.gc_divisor](#ini.session.gc-divisor)).
      El valor por omisión es 1440 (24 minutos).

     **Nota**:

       Si diferentes scripts tienen valores diferentes de
       session.gc_maxlifetime pero comparten el mismo
       lugar para almacenar los datos de sesión, entonces, el script con el valor
       más pequeño borrará los datos. En este caso, utilice esta directiva
       conjuntamente con [session.save_path](#ini.session.save-path).









     session.referer_check
     [int](#language.types.integer)



      Contiene una subcadena
      que desea encontrar en todos los encabezados HTTP Referer. Si
      este encabezado ha sido enviado por el cliente y la subcadena no ha
      sido encontrada, el identificador de sesión será considerado inválido.
      Por omisión, esta opción es una cadena vacía.






     session.entropy_file
     [string](#language.types.string)



      Es un camino hasta
      una fuente externa (un archivo), que será utilizada como fuente
      adicional de entropía para la creación del identificador
      de sesión. Ejemplos válidos son /dev/random y
      /dev/urandom, que están disponibles en
      todos los sistemas Unix.


      Esta funcionalidad es soportada en Windows.
      El hecho de definir session.entropy_length a un valor
      diferente de cero hará que PHP utilice la API aleatoria de Windows como
      fuente de entropía.

     **Nota**:

       Eliminado en PHP 7.1.0.


       session.entropy_file vale por omisión
       /dev/urandom o /dev/arandom
       si está disponible.









     session.entropy_length
     [int](#language.types.integer)



      Especifica el número de bytes
      que serán leídos en el archivo definido anteriormente. Por omisión 32.


      Eliminado en PHP 7.1.0.






     session.use_strict_mode
     [bool](#language.types.boolean)



      session.use_strict_mode especifica si el módulo debe
      utilizar el modo de identificador de sesión estricto. Si este modo está activado,
      el módulo no aceptará identificadores de sesión no inicializados.
      Si un identificador de sesión no inicializado es enviado desde el navegador,
      un nuevo identificador de sesión será enviado al navegador. Las
      aplicaciones están protegidas de la fijación de sesiones mediante el uso
      del modo estricto de sesiones.
      Por omisión, vale 0 (desactivado).

     **Nota**:

       Activar session.use_strict_mode es obligatorio
       para la seguridad general de las sesiones. Se recomienda activarlo para
       todos los sitios. Consulte el ejemplo de código de
       [session_create_id()](#function.session-create-id) para más detalles.




    **Advertencia**

      Si un controlador de sesiones registrado mediante la función
      [session_set_save_handler()](#function.session-set-save-handler) no implementa
      [SessionUpdateTimestampHandlerInterface::validateId()](#sessionupdatetimestamphandlerinterface.validateid),
      ni proporciona la función de devolución de llamada validate_sid, respectivamente,
      el modo de identificador de sesión estricto estará efectivamente desactivado, siguiendo el valor
      de esta directiva. Tenga en cuenta que [SessionHandler](#class.sessionhandler) *no implementa* el método **SessionHandler::validateId()**.









     session.use_cookies
     [bool](#language.types.boolean)



      Especifica si el módulo utilizará
      cookies para almacenar el id de sesión en el lado del cliente.
      Por omisión, vale 1, es decir, activo.






     session.use_only_cookies
     [bool](#language.types.boolean)



      Especifica si el módulo
      debe utilizar **solo** cookies
      para almacenar los identificadores de sesiones en el lado del navegador.
      Al activarlo, evitará ataques que utilicen
      identificadores de sesiones en las URL.
      Por omisión, vale 1 (activado).






     session.cookie_lifetime
     [int](#language.types.integer)



      Especifica la duración de vida de la cookie en segundos. El valor de
      0 significa: "Hasta que el navegador se apague".
      El valor por omisión es 0. Consulte también
      [session_get_cookie_params()](#function.session-get-cookie-params) y
      [session_set_cookie_params()](#function.session-set-cookie-params).

     **Nota**:

       El timestamp que representa la duración de vida de la cookie se define
       en relación con el tiempo del servidor, que no es necesariamente el mismo
       que el tiempo del navegador.









     session.cookie_path
     [string](#language.types.string)



      Especifica el camino utilizado
      al crear la cookie. Por omisión, vale /.
      Consulte también
      [session_get_cookie_params()](#function.session-get-cookie-params) y
      [session_set_cookie_params()](#function.session-set-cookie-params).






     session.cookie_domain
     [string](#language.types.string)



      Especifica el dominio utilizado al crear la cookie. Por omisión,
      no vale nada, lo que significa que es el nombre del host del servidor que
      genera la cookie de acuerdo con las especificaciones sobre cookies.
      Consulte también [session_get_cookie_params()](#function.session-get-cookie-params) y
      [session_set_cookie_params()](#function.session-set-cookie-params).






     session.cookie_secure
     [bool](#language.types.boolean)



      Especifica que las cookies solo deben emitirse en
      conexiones seguras. Con esta opción definida
      en on, las sesiones solo funcionan con conexiones HTTPS.
      Si está definida en off, entonces las sesiones funcionan con las conexiones HTTP y
      HTTPS. Por omisión, está definida en off.
      Consulte también
      [session_get_cookie_params()](#function.session-get-cookie-params) y
      [session_set_cookie_params()](#function.session-set-cookie-params).






     session.cookie_httponly
     [bool](#language.types.boolean)



      Marca la cookie para que solo sea accesible a través del protocolo HTTP. Esto significa
      que la cookie no será accesible por los lenguajes de script, como Javascript.
      Esta configuración permite limitar ataques como los ataques XSS (aunque
      no es soportado por todos los navegadores).






     session.cookie_samesite
     [string](#language.types.string)



      Permite que una cookie no sea enviada por el servidor con solicitudes entre sitios
      (cross-site). Esta afirmación permite a los agentes de usuario mitigar los riesgos
      de fuga de información de origen del sitio (cross-origin), y proporciona protección contra las
      ataques de falsificación de solicitudes entre sitios (cross-site request forgery). Tenga en cuenta que esto no es soportado por todos los navegadores.
      Un valor vacío significa que ningún atributo SameSite será definido.
      Lax y Strict significa que la cookie
      no será enviada para solicitudes POST entre dominios; Lax
      enviará la cookie para solicitudes GET entre dominios, mientras que Strict
      no lo hará.






     session.cache_limiter
     [string](#language.types.string)



      Especifica el tipo de control de caché utilizado para las páginas
      con sesiones. Los valores posibles son :
      nocache, private,
      private_no_expire, public.
      Por omisión, vale nocache.
      Consulte también [session_cache_limiter()](#function.session-cache-limiter) para
      conocer el significado de estos valores.






     session.cache_expire
     [int](#language.types.integer)



      Especifica la duración de
      vida de los datos de sesiones, en minutos. Esta opción no tiene
      ninguna consecuencia en el control de caché. Por omisión, vale
      180 (3 horas).
      Consulte también
      [session_cache_expire()](#function.session-cache-expire).






     session.use_trans_sid
     [bool](#language.types.boolean)



      Especifica si el soporte del SID es transparente o no. Por omisión vale 0
      (desactivado).

     **Nota**:

       El sistema de gestión de sesiones por URL representa un riesgo
       adicional de seguridad: un usuario puede enviar
       su URL con el identificador de sesión por correo electrónico a un amigo,
       o bien ponerla en sus marcadores. Esto difundirá entonces
       el identificador de sesión.


       Desde PHP 7.1.0, la URL completa, por ejemplo https://php.net/, es
       gestionada por la funcionalidad. Anteriormente, PHP gestionaba solo el camino relativo
       únicamente. El host objetivo de la reescritura está definido por [session.trans_sid_hosts](#ini.session.trans-sid-hosts).









     session.trans_sid_tags
     [string](#language.types.string)



      session.trans_sid_tags especifica las etiquetas HTML que
      son reescritas para incluir el ID de sesión cuando el soporte del SID
      transparente está activado. Por omisión
      a=href,area=href,frame=src,input=src,form=


      form es una etiqueta especial. La variable de formulario
      &lt;input hidden="session_id" name="session_name"&gt;
      es añadida.

     **Nota**:

       Antes de PHP 7.1.0, [url_rewriter.tags](#ini.url-rewriter.tags)
       era utilizado para este propósito. Desde PHP 7.1.0,
       fieldset ya no es considerado como una etiqueta
       especial.









     session.trans_sid_hosts
     [string](#language.types.string)



      session.trans_sid_hosts especifica los hosts que son
      reescritos para incluir el ID de sesión cuando el soporte del SID transparente
      está activado. Por omisión $_SERVER['HTTP_HOST']. Varios
      hosts pueden ser especificados separados por ",", ningún espacio está permitido
      entre los hosts. Por ejemplo:
      php.net,wiki.php.net,bugs.php.net






     session.sid_length
     [int](#language.types.integer)



      session.sid_length permite especificar la longitud
      de la cadena de ID de sesión. La longitud del ID de sesión puede ser
      comprendida entre 22 y 256.


      El valor por omisión es 32. Si necesita compatibilidad, puede especificar 32, 40, etc. El ID de sesión más largo es más difícil
      de adivinar. Al menos 32 caracteres son recomendados.

     **Sugerencia**

       Nota de compatibilidad: utilizar 32 en lugar de
       session.hash_function=0 (MD5) y
       session.hash_bits_per_character=4,
       session.hash_function=1 (SHA1) y
       session.hash_bits_per_character=6. Utilizar 26 en lugar de
       session.hash_function=0 (MD5) y
       session.hash_bits_per_character=5. Utilizar 22 en lugar de
       session.hash_function=0 (MD5) y
       session.hash_bits_per_character=6.
       Debe configurar los valores INI para que haya 128 bits en
       el ID de sesión. No olvide definir el valor apropiado a
       session.sid_bits_per_character, de lo contrario tendrá
       ID de sesión más débiles.




     **Nota**:

       Disponible a partir de PHP 7.1.0.









     session.sid_bits_per_character
     [int](#language.types.integer)



      session.sid_bits_per_character permite especificar el
      número de bits en el carácter codificado en el ID de sesión. Los valores
      posibles son
      '4' (0-9, a-f), '5' (0-9, a-v), y '6' (0-9, a-z, A-Z, "-", ",").


      El valor por omisión es 4. Más bits resultan en un ID de sesión más
      fuerte. 5 es el valor recomendado para la mayoría de los entornos.





     **Nota**:

       Disponible a partir de PHP 7.1.0.









     session.hash_function
     mixed



      session.hash_function permite especificar la función
      de hash a utilizar para generar los identificadores de sesión. '0' significa
      MD5 (128 bits) y '1' significa SHA-1 (160 bits).


      También es posible especificar cualquier algoritmo proporcionado por la
      [extensión hash](#ref.hash)
      (si está disponible), como sha512 o
      whirlpool. Una lista completa de algoritmos puede ser
      obtenida con la función [hash_algos()](#function.hash-algos).



     **Nota**:

       Eliminado en PHP 7.1.0.









     session.hash_bits_per_character
     [int](#language.types.integer)



      session.hash_bits_per_character permite definir
      el número de bits utilizados para cada carácter durante las conversiones de
      los datos binarios en elementos legibles. Los valores posibles son '4' (0-9,
      a-f), '5' (0-9, a-v), y '6' (0-9, a-z, A-Z, "-", ",").

     **Nota**:

       Eliminado en PHP 7.1.0.









     session.upload_progress.enabled
     [bool](#language.types.boolean)



      Activa la supervisión de la progresión de una subida, poblando
      la variable [$_SESSION](#reserved.variables.session). Por omisión, vale 1 (activado).






     session.upload_progress.cleanup
     [bool](#language.types.boolean)



      Limpia las informaciones de progresión tan pronto como todos los datos POST
      han sido leídos (es decir, la subida ha terminado). Por omisión, vale 1 (activado).

     **Nota**:

       Se recomienda encarecidamente mantener activa esta funcionalidad.









     session.upload_progress.prefix
     [string](#language.types.string)



      Un prefijo utilizado para la clave relativa a la progresión de la subida
      en el array [$_SESSION](#reserved.variables.session). Esta clave será concatenada con
      el valor de $_POST[ini_get("session.upload_progress.name")]
      para proporcionar un índice único.


      Por omisión, vale "upload_progress_".






     session.upload_progress.name
     [string](#language.types.string)



      El nombre de la clave a utilizar en el array [$_SESSION](#reserved.variables.session)
      para almacenar las informaciones de progresión. Consulte también
      [session.upload_progress.prefix](#ini.session.upload-progress.prefix).


      Si $_POST[ini_get("session.upload_progress.name")]
      no es proporcionado o disponible, la progresión de una subida no será registrada.


      Por omisión, vale "PHP_SESSION_UPLOAD_PROGRESS".






     session.upload_progress.freq
     [mixed](#language.types.mixed)



      Define el número de veces que las informaciones de progresión de subida
      deben ser actualizadas. Puede ser definido en bytes (es decir, "actualizar
      las informaciones de progresión de subida cada 100 bytes),
      o en porcentaje (es decir, "actualizar las informaciones de progresión de
      subida cada 1% de recepción del peso total del archivo").


      Por omisión, vale "1%".






     session.upload_progress.min_freq
     [int](#language.types.integer)



      El retraso mínimo entre las actualizaciones, en segundos.
      Por omisión, vale "1" (un segundo).






     session.lazy_write
     [bool](#language.types.boolean)



      session.lazy_write, cuando está definido a 1, significa que
      los datos de sesión solo serán reescritos si estos cambian. Por
      omisión 1, activado.


La progresión de subida no será registrada a menos que
session.upload_progress.enabled esté activo, y que la variable
$\_POST[ini_get("session.upload_progress.name")] esté definida.
Consulte la [progresión de subida de sesión](#session.upload-progress) para más información sobre esta funcionalidad.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[SID](#constant.sid)**
    ([string](#language.types.string))



     Constante que contiene el nombre de la sesión y el identificador en curso,
     en el formato "name=ID" o una cadena vacía
     si el identificador de sesión ha sido definido en una cookie de sesión.
     Es el mismo valor que el devuelto por la función
     [session_id()](#function.session-id).





    **[PHP_SESSION_DISABLED](#constant.php-session-disabled)**
    ([int](#language.types.integer))



     Valor devuelto por [session_status()](#function.session-status) si la sesión está desactivada.





    **[PHP_SESSION_NONE](#constant.php-session-none)**
    ([int](#language.types.integer))



     Valor devuelto por [session_status()](#function.session-status) si la sesión está activada,
     pero no existe.





    **[PHP_SESSION_ACTIVE](#constant.php-session-active)**
    ([int](#language.types.integer))



     Valor devuelto por [session_status()](#function.session-status) si la sesión está activada,
     y existe.

# Ejemplos

## Tabla de contenidos

- [Uso básico](#session.examples.basic)
- [Pasar el identificador de sesión (session ID)](#session.idpassing)
- [Gestión personalizada de sesiones](#session.customhandler)

    ## Uso básico

    Las sesiones son una forma sencilla de almacenar datos individuales para cada
    usuario mediante un identificador de sesión único. Pueden utilizarse
    para persistir información entre varias páginas. Los identificadores de sesión
    se envían normalmente al navegador a través de cookies de sesión, y el identificador
    se utiliza para recuperar los datos existentes de la sesión. La ausencia de un identificador
    o de una cookie de sesión indica a PHP que debe crear una nueva sesión, generando así
    un nuevo identificador de sesión.

    Las sesiones siguen una cinemática simple. Cuando se inicia una sesión, PHP
    recuperará una sesión existente utilizando el identificador de sesión pasado (habitualmente
    desde una cookie de sesión) o, si no se pasa ningún identificador de sesión, creará una
    nueva sesión. PHP poblará entonces la variable superglobal [$\_SESSION](#reserved.variables.session)
    con todos los datos de la sesión una vez iniciada. Cuando PHP finaliza,
    tomará automáticamente el contenido de la variable superglobal [$\_SESSION](#reserved.variables.session),
    lo serializará y lo enviará para su almacenamiento al gestor de guardado de sesión.

    Por omisión, PHP utiliza internamente el gestor de guardado files
    que está definido mediante la directiva [session.save_handler](#ini.session.save-handler).
    Los datos de sesión se guardarán en el servidor en el lugar especificado por
    la directiva de configuración [session.save_path](#ini.session.save-path).

    Las sesiones pueden iniciarse manualmente utilizando la función
    [session_start()](#function.session-start). Si la directiva de configuración
    [session.auto_start](#ini.session.auto-start) está definida como
    1, una sesión se iniciará automáticamente al comienzo
    de la solicitud.

    Las sesiones se detienen automáticamente cuando PHP ha terminado de ejecutar un script, pero
    pueden detenerse manualmente utilizando la función
    [session_write_close()](#function.session-write-close).

        **Ejemplo #1
         Almacenar una variable con [$_SESSION](#reserved.variables.session).
        **



         &lt;?php

    session_start();
    if (!isset($\_SESSION['count'])) {
    $\_SESSION['count'] = 0;
    } else {
    $\_SESSION['count']++;
    }
    ?&gt;

        **Ejemplo #2
         Eliminar una variable de sesión con la superglobal [$_SESSION](#reserved.variables.session).
        **



         &lt;?php

    session_start();
    unset($\_SESSION['count']);
    ?&gt;

**Precaución**

     No utilice la función [unset()](#function.unset)
     con [$_SESSION](#reserved.variables.session) de la forma
     unset($_SESSION) ya que esto hará imposible
     el almacenamiento de datos en la sesión utilizando la superglobal
     [$_SESSION](#reserved.variables.session).

**Advertencia**

    No se pueden utilizar referencias en variables de sesión
    ya que no hay ninguna manera factible de restaurar una referencia a otra
    variable.

**Nota**:

    Las sesiones basadas en ficheros (por omisión en PHP) bloquean
    el fichero de sesión cuando una sesión se abre mediante la función
    [session_start()](#function.session-start) o implícitamente mediante la directiva
    de configuración [session.auto_start](#ini.session.auto-start).
    Una vez bloqueado, ningún otro script puede acceder al mismo fichero
    de sesión hasta que la sesión no haya sido cerrada por el script
    que la abrió, o hasta que la función
    [session_write_close()](#function.session-write-close) no haya sido llamada.




    Esto puede ser problemático para los sitios web que utilizan AJAX y producen
    múltiples solicitudes concurrentes. La forma más sencilla de evitar
    este problema es llamar a la función [session_write_close()](#function.session-write-close)
    una vez que se hayan realizado los cambios en la sesión,
    preferiblemente al principio del script. También se puede utilizar
    otro gestor de sesión que soporte concurrencia.

## Pasar el identificador de sesión (session ID)

Existen dos métodos de propagación del identificador de sesión:

    -

      Cookies



    -

      Por URL


El módulo de sesión soporta ambos métodos. Las cookies son
óptimas, pero como no son seguras (no todos los internautas
las aceptan), no son fiables. El segundo
método coloca el identificador de sesión directamente en las URL.

PHP es capaz de hacerlo de manera transparente.
Si la opción de compilación
session.use_trans_sid está activada,
las URL relativas se modificarán para contener el identificador
de sesión automáticamente.

**Nota**:

     La opción [arg_separator.output](#ini.arg-separator.output)
     de php.ini permite personalizar el separador de argumentos.
     Para estar completamente de acuerdo con las especificaciones XHTML, especifique
     &amp;amp; aquí.

Alternativamente, se puede utilizar la constante **[SID](#constant.sid)**
que está definida si la sesión ha comenzado. Si el cliente no envía una cookie de sesión
apropiada, tendrá la forma session_name=session_id.
De lo contrario, valdrá una cadena vacía. Así, en todos los casos
se puede incluir en la URL.

El siguiente ejemplo muestra cómo almacenar una variable y cómo
realizar un enlace correcto a otra página, con
**[SID](#constant.sid)**.

    **Ejemplo #1 Contar el número de visitas de un usuario a una página**



     &lt;?php

session_start();

if (empty($\_SESSION['count'])) {
$\_SESSION['count'] = 1;
} else {
$\_SESSION['count']++;
}
?&gt;

&lt;p&gt;
Hola visitante, ha visto esta página &lt;?php echo $\_SESSION['count']; ?&gt; veces.
&lt;/p&gt;

&lt;p&gt;
Para continuar, &lt;a href="nextpage.php?&lt;?php echo htmlspecialchars(SID); ?&gt;"&gt;haga clic aquí&lt;/a&gt;.
&lt;/p&gt;

La función [htmlspecialchars()](#function.htmlspecialchars) se utiliza al mostrar
el **[SID](#constant.sid)** con el fin de contrarrestar los ataques XSS.

La visualización del **[SID](#constant.sid)**, como se muestra en el ejemplo
anterior, no es necesaria si [
--enable-trans-sid](#ini.session.use-trans-sid) se ha utilizado para compilar
PHP.

**Nota**:

    Las URL no relativas se consideran externas al sitio y no
    recibirán el **[SID](#constant.sid)**, ya que la fuga del **[SID](#constant.sid)**
    a un servidor diferente presenta un riesgo de seguridad importante.

## Gestión personalizada de sesiones

Para implementar un almacenamiento en base de datos, u otro método,
se necesitará la función [session_set_save_handler()](#function.session-set-save-handler) para
configurar las propias funciones de almacenamiento.
Un gestor de sesión puede crearse utilizando la interfaz
[SessionHandlerInterface](#class.sessionhandlerinterface) o extendiendo los
gestores internos de PHP heredando de la clase
[SessionHandler](#class.sessionhandler).

Las funciones de retrollamada especificadas en [session_set_save_handler()](#function.session-set-save-handler) son
métodos llamados por PHP durante el ciclo de vida de la sesión: open,
read, write y close
así como las funciones de mantenimiento destroy para eliminar una sesión
y gc para una recolección periódica de patrones.

Así, PHP siempre necesita un gestor de sesiones. Por omisión se trata del gestor
interno 'files'. Un gestor personalizado puede indicarse mediante
[session_set_save_handler()](#function.session-set-save-handler). Otros gestores alternativos pueden ser propuestos
por extensiones PHP, como sqlite, memcache
y memcached y pueden utilizarse mediante
[session.save_handler](#ini.session.save-handler).

Cuando la sesión comienza, PHP llamará internamente a la función open del gestor, seguida de
read que debe entonces devolver una cadena codificada exactamente como fue pasada durante el almacenamiento.
Una vez que la función de retrollamada de read haya devuelto su cadena, PHP la decodificará
y poblará la superglobal [$\_SESSION](#reserved.variables.session) en consecuencia.

Cuando PHP finaliza (o cuando [session_write_close()](#function.session-write-close) es llamada), codificará internamente el contenido de [$\_SESSION](#reserved.variables.session) y lo pasará con el ID de sesión a la
función write. Después de write, PHP invocará close.

Cuando una sesión es destruida, PHP llamará a destroy con el ID de sesión.

PHP llamará a la función de retrollamada gc de vez en cuando para limpiar
las sesiones expiradas según su
tiempo de vida máximo. Esta llamada debería llevar a la destrucción de los registros en
el soporte de almacenamiento que no han sido accedidos desde $lifetime.

# Progresión de una subida (upload) en sesión

Cuando la opción de configuración
[session.upload_progress.enabled](#ini.session.upload-progress.enabled)
está activa, PHP será capaz de rastrear la progresión de un fichero en
curso de subida (upload). Esta información no es particularmente útil
para la petición de subida en sí, pero durante la subida,
una aplicación puede enviar una petición POST separada (por ejemplo,
mediante XHR) para verificar el estado de esta subida.

La progresión de la subida estará disponible en la variable superglobal
[$\_SESSION](#reserved.variables.session) cuando la subida está en curso,
y durante un envío en método POST de una variable con el mismo nombre que el
definido en la opción de configuración INI
[session.upload_progress.name](#ini.session.upload-progress.name).
Cuando PHP detecta una petición POST de este tipo, llenará un array en
[$\_SESSION](#reserved.variables.session), donde el índice es un valor concatenado de las opciones
de configuración
[session.upload_progress.prefix](#ini.session.upload-progress.prefix)
y
[session.upload_progress.name](#ini.session.upload-progress.name).
La clave se recupera típicamente leyendo estas configuraciones INI, es decir:

&lt;?php
$key = ini_get("session.upload_progress.prefix") . $_POST[ini_get("session.upload_progress.name")];
var_dump($\_SESSION[$key]);
?&gt;

Asimismo, es posible _cancelar_ la subida actual
definiendo la clave $_SESSION[$key]["cancel_upload"] al valor
**[true](#constant.true)**. Durante la subida de varios ficheros en la misma
petición, esta acción solo cancelará el fichero actualmente en curso de subida,
así como aquellos en espera de subida, pero no cancelará las subidas
terminadas con éxito. Cuando una subida es cancelada utilizando este método,
la clave error del array [$\_FILES](#reserved.variables.files) será definida a
**[UPLOAD_ERR_EXTENSION](#constant.upload-err-extension)**.

Las opciones de configuración INI
[session.upload_progress.freq](#ini.session.upload-progress.freq)
y
[session.upload_progress.min_freq](#ini.session.upload-progress.min-freq)
controlan la frecuencia de actualización de las informaciones de progresión de subida.
Con una configuración razonable de estas 2 opciones, el sobrecoste en términos
de carga es casi nulo.

**Ejemplo #1 Ejemplo**

    Ejemplo de estructura del array que contiene las informaciones de
    subida.

&lt;form action="upload.php" method="POST" enctype="multipart/form-data"&gt;
&lt;input type="hidden" name="&lt;?php echo ini_get("session.upload_progress.name"); ?&gt;" value="123" /&gt;
&lt;input type="file" name="file1" /&gt;
&lt;input type="file" name="file2" /&gt;
&lt;input type="submit" /&gt;
&lt;/form&gt;

    Los datos almacenados en sesión se asemejarán a:

&lt;?php
$\_SESSION["upload_progress_123"] = array(
"start_time" =&gt; 1234567890, // La hora de la petición
"content_length" =&gt; 57343257, // Longitud del contenido POST
"bytes_processed" =&gt; 453489, // Cantidad de bytes recibidos y procesados
"done" =&gt; false, // true cuando el manejador POST ha terminado, con éxito o no
"files" =&gt; array(
0 =&gt; array(
"field_name" =&gt; "file1", // Nombre del campo &lt;input/&gt;
// Los 3 elementos siguientes son equivalentes a los en $\_FILES
"name" =&gt; "foo.avi",
"tmp_name" =&gt; "/tmp/phpxxxxxx",
"error" =&gt; 0,
"done" =&gt; true, // True cuando el manejador POST ha terminado de manejar este fichero
"start_time" =&gt; 1234567890, // La hora de inicio de petición
"bytes_processed" =&gt; 57343250, // Cantidad de bytes recibidos y procesados para este fichero
),
// Otro fichero, en curso de subida, en la misma petición
1 =&gt; array(
"field_name" =&gt; "file2",
"name" =&gt; "bar.avi",
"tmp_name" =&gt; NULL,
"error" =&gt; 0,
"done" =&gt; false,
"start_time" =&gt; 1234567899,
"bytes_processed" =&gt; 54554,
),
)
);

**Advertencia**

El almacenamiento en búfer de la petición del servidor web debe estar desactivado
para el buen funcionamiento de esta funcionalidad, de lo contrario PHP solo verá el fichero
una vez que esté completamente subido. Los servidores como Nginx son conocidos por almacenar en búfer
grandes peticiones.

**Precaución**

Las informaciones de progresión de la subida son escritas en sesión antes
de que un script sea ejecutado. Por consecuencia, cambiar el nombre de sesión mediante
[ini_set()](#function.ini-set) o [session_name()](#function.session-name) dará una
sesión sin las informaciones de progresión de la subida.

# Sesiones y Seguridad

## Tabla de contenidos

- [Gestión básica de sesiones](#features.session.security.management)
- [Seguridad de las configuraciones INI de sesión](#session.security.ini)

    Enlace externo: [» Fijación de sesión](https://acrossecurity.com/papers/session_fixation.pdf)

    La gestión de las sesiones HTTP representa el núcleo de la seguridad en la web.
    Medidas de mitigación _deben_ ser consideradas para asegurar
    la seguridad de las sesiones.
    Los desarrolladores deben activar/utilizar los parámetros de seguridad apropiados.

    ## Gestión básica de sesiones

    ### Seguridad de sesiones

    El módulo de sesión no puede garantizar que la información almacenada
    en una sesión sea vista únicamente por el usuario que
    ha creado la sesión. Medidas adicionales son necesarias para
    proteger la confidencialidad de la sesión, según el valor
    que se le asigne.

    La importancia de los datos almacenados en una sesión debe ser evaluada
    y protecciones adicionales pueden ser desplegadas;
    esto tiene obligatoriamente un costo como ser menos práctico para
    el usuario. Por ejemplo, para proteger a los usuarios
    de una táctica simple, la directiva [session.use_only_cookies](#ini.session.use-only-cookies)
    debe ser activada. En este caso, las cookies deben ser
    activadas obligatoriamente lado-cliente sino las sesiones no
    funcionarán.

    Existen varias formas de divulgar identificadores de sesión a
    terceros. Por ejemplo, inyecciones Javascript, identificadores
    de sesión en las URLs, sniffing de paquetes, acceso físico
    al dispositivo, etc.
    Un identificador de sesión divulgado permite a un tercero acceder
    a todos los recursos asociados con dicho identificador. Primero,
    las URLs que contienen los identificadores de sesión. Si hay enlaces
    a sitios o recursos externos, la URL que incluye el identificador
    de sesión debe ser almacenada en los logs referrer del sitio externo.
    Si estos datos no están cifrados, los identificadores de sesión
    serán transmitidos en texto plano por la red. La solución aquí es
    implementar SSL/TLS en el servidor y hacerlo obligatorio para los
    usuarios. HSTS debe ser utilizado para mejorar también la
    seguridad.

    **Nota**:

    Incluso HTTPS no puede proteger la confidencialidad de los datos
    en todos los casos. Por ejemplo, las vulnerabilidades CRIME y BEAST
    permiten a un atacante leer los datos. Además, note
    que algunas redes utilizan proxys HTTPS MITM para
    auditorías. Los atacantes también pueden establecer este tipo de proxy.

    ### Gestión de sesiones no adaptativas

    El gestor de sesiones de PHP es adaptativo, por defecto.
    Un gestor de sesiones adaptativo introduce
    riesgos adicionales.

    Cuando [session.use_strict_mode](#ini.session.use-strict-mode)
    está activado, y el gestor de guardado de sesiones lo soporta,
    un identificador de sesión no inicializado es rechazado, y uno nuevo es creado.
    Esto previene un ataque que fuerza a los usuarios a utilizar un
    identificador de sesión conocido.
    Un atacante puede pasar enlaces o enviar emails que contienen
    el identificador de sesión.
    Por ejemplo: http://example.com/page.php?PHPSESSID=123456789 si
    [session.use_trans_sid](#ini.session.use-trans-sid) está activado,
    la víctima iniciará una sesión utilizando el identificador de sesión
    proporcionado por el atacante.
    [session.use_strict_mode](#ini.session.use-strict-mode)
    permite anular este tipo de riesgo.

    **Advertencia**

    Los gestores de guardado definidos por el usuario también pueden
    soportar el modo de sesión estricto implementando
    la validación de identificadores de sesión. Todos los gestores de
    guardado definidos por el usuario deben implementar la validación
    de identificadores de sesión.

    La cookie de identificador de sesión puede ser definida con los
    atributos domain, path, httponly, secure y, desde PHP 7.3, SameSite.
    Existe una prioridad definida por los navegadores.
    Utilizando las prioridades, un atacante puede definir el identificador de
    sesión que puede ser utilizado permanentemente. El uso de la
    directiva [session.use_only_cookies](#ini.session.use-only-cookies)
    no permite resolver este problema.
    [session.use_strict_mode](#ini.session.use-strict-mode)
    permite mitigar este riesgo. Con la directiva
    [session.use_strict_mode](#ini.session.use-strict-mode)=On,
    el identificador de sesión no inicializado será rechazado.

    **Nota**:

    Aunque la directiva
    [session.use_strict_mode](#ini.session.use-strict-mode)
    limita los riesgos concernientes al gestor adaptativo de sesión, un
    atacante puede forzar a los usuarios a utilizar un identificador de
    sesión no inicializado que ha sido creado por el atacante, por ejemplo, mediante inyecciones
    Javascript. Este tipo de ataque puede ser limitado utilizando las
    recomendaciones de este manual.

    Siguiendo este manual, los desarrolladores deben activar la directiva
    [session.use_strict_mode](#ini.session.use-strict-mode),
    utilizar timestamps basados en el gestor de sesión,
    y regenerar los identificadores de sesión utilizando la función
    [session_regenerate_id()](#function.session-regenerate-id) con los procedimientos
    recomendados. Si los desarrolladores siguen estas instrucciones, un identificador de sesión
    generado por un atacante será normalmente eliminado.

    Cuando ocurre un acceso a una sesión obsoleta, los desarrolladores
    deben guardar todas las datos de la sesión activa del
    usuario; estas informaciones serán útiles para futuras
    investigaciones. El usuario debe ser forzado a desconectarse
    de todas las sesiones, por ejemplo, forzándolo a identificarse de
    nuevo. Esto permite contrarrestar ataques utilizando sesiones robadas.

    **Advertencia**

    El acceso a una sesión obsoleta no significa necesariamente que se trate de una
    ataque. Una red inestable y/o la eliminación inmediata de la sesión
    activa hará que usuarios legítimos utilicen sesiones obsoletas.

    Desde 7.1.0, la función [session_create_id()](#function.session-create-id) ha sido
    añadida. Esta función permite acceder a todas las sesiones activas
    de un usuario prefijando los identificadores de sesión con el identificador
    del usuario. La activación de la directiva
    [session.use_strict_mode](#ini.session.use-strict-mode)
    es vital en esta configuración. De lo contrario, los usuarios maliciosos
    pueden definir identificadores de sesiones para otros usuarios.

    **Nota**:

    Los usuarios de versiones anteriores a PHP 7.1.0 _deben_
    utilizar CSPRNG, por ejemplo, /dev/urandom, o la función
    [random_bytes()](#function.random-bytes) y las funciones de hash
    para generar un nuevo identificador de sesión. La función
    [session_create_id()](#function.session-create-id) posee mecanismos de detección
    de colisiones, y genera un identificador de sesión siguiendo las
    configuraciones INI de las sesiones. El uso de la función
    [session_create_id()](#function.session-create-id) es recomendado.

    ### Regeneración de un identificador de sesión

    La directiva
    [session.use_strict_mode](#ini.session.use-strict-mode)
    es un buen compromiso pero no es suficiente. Los desarrolladores deben
    también utilizar la función [session_regenerate_id()](#function.session-regenerate-id)
    para la seguridad de las sesiones.

    La regeneración de un identificador de sesión reduce el riesgo de robo de identificadores
    de sesión, por lo que la función [session_regenerate_id()](#function.session-regenerate-id)
    debe ser utilizada periódicamente; por ejemplo, regenerar el identificador de sesión cada
    15 minutos para asegurar contenido sensible. Incluso en el caso de que
    un identificador de sesión sea robado, tanto el usuario legítimo
    como el atacante tendrán su sesión que expirará. En otras palabras, el acceso
    al contenido por el usuario o el atacante generará un error de acceso
    a una sesión obsoleta.

    Los identificadores de sesión _deben_ ser regenerados cuando
    los privilegios del usuario son elevados, como después de una autenticación.
    La función [session_regenerate_id()](#function.session-regenerate-id) debe ser llamada
    antes de almacenar las informaciones de autenticación en [$\_SESSION](#reserved.variables.session).
    (la función [session_regenerate_id()](#function.session-regenerate-id)
    guarda los datos de sesión actuales automáticamente para
    guardar timestamps/etc... en la sesión actual.)
    Asegúrese de que la nueva sesión contenga la bandera de autenticación.

    Los desarrolladores _no deben_ basarse en
    la expiración del identificador de sesión definida por la directiva
    [session.gc_maxlifetime](#ini.session.gc-maxlifetime).
    Los atacantes pueden acceder al identificador de sesión de la víctima
    de forma periódica para evitar su expiración, y permitir su explotación
    incluyendo con sesiones autenticadas.

    En su lugar, los desarrolladores deben implementar un timestamp
    basado en la gestión de datos de sesión.

    **Advertencia**

    Aunque el gestor de sesión puede manejar los timestamps de forma
    transparente, esta funcionalidad no está implementada. Los datos
    de las sesiones antiguas deben ser conservados hasta que el recuperador
    de memoria no haya pasado. Simultáneamente, los desarrolladores deben asegurarse
    ellos mismos de que los datos de sesión obsoleta sean efectivamente borrados.
    Sin embargo, los desarrolladores no deben borrar los datos
    de sesión activa demasiado rápido. Por ejemplo, session_regenerate_id(true);
    y [session_destroy()](#function.session-destroy) nunca deben ser llamados
    al mismo tiempo para una sesión activa. Esto puede parecer contradictorio,
    pero es un requisito del mandante.

    [session_regenerate_id()](#function.session-regenerate-id) _no borrará_
    las sesiones antiguas por defecto. Las sesiones autenticadas obsoletas
    pueden estar presentes para ser utilizadas. Los desarrolladores deben asegurarse
    de que las sesiones antiguas no sean utilizadas por nadie.
    Deben prohibir el acceso a los datos de sesión obsoleta
    utilizando ellos mismos timestamps.

    **Advertencia**

    La eliminación repentina de una sesión activa produce efectos secundarios
    indeseables. Las sesiones pueden desaparecer cuando hay conexiones
    concurrentes en la aplicación web y/o cuando la red es inestable.

    Los accesos potencialmente maliciosos son indetectables con la eliminación
    repentina de una sesión.

    En lugar de eliminar las sesiones obsoletas inmediatamente, los desarrolladores
    deben definir un corto tiempo de expiración (timestamp) en
    [$\_SESSION](#reserved.variables.session), y prohibir el acceso a los datos de sesión.

    Los desarrolladores no deben prohibir el acceso a los datos de las
    sesiones antiguas inmediatamente después de la ejecución de la función
    [session_regenerate_id()](#function.session-regenerate-id). El acceso debe ser prohibido
    en una etapa posterior; por ejemplo, unos segundos después para redes
    estables, como una red cableada y unos minutos después para redes
    inestables como teléfonos móviles o redes Wi-Fi.

    Si un usuario accede a una sesión obsoleta (sesión expirada), el acceso
    a esta sesión debe ser rechazado. También es recomendado borrar el
    estado de autenticación de todas las sesiones de usuario, ya que esto
    puede representar un eje de ataque.

    El uso de la directiva [session.use_only_cookies](#ini.session.use-only-cookies) y de la función
    [session_regenerate_id()](#function.session-regenerate-id) pueden causar un DoS personal
    con cookies no eliminadas definidas por los atacantes. En este caso,
    los desarrolladores pueden invitar a los usuarios a eliminar las cookies
    y advertirles que pueden encontrar un problema de seguridad.
    Los atacantes pueden definir cookies maliciosas mediante una aplicación
    web vulnerable, un plugin de navegador expuesto o viciado, un dispositivo
    físico comprometido, etc...

    **Advertencia**

    No se confunda sobre el riesgo DoS. [session.use_strict_mode](#ini.session.use-strict-mode)=On
    es obligatorio para la seguridad de los identificadores de sesión !
    Todos los sitios son animados a activar la directiva
    [session.use_strict_mode](#ini.session.use-strict-mode).

    DoS solo puede ocurrir cuando la cuenta sufre un ataque. Una inyección
    Javascript en una aplicación representa la mayoría de los ejes de ataque.

    ### Eliminación de datos de sesión

    Los datos de sesiones obsoletas deben ser inaccesibles
    y deben ser eliminados. El módulo actual de sesión
    no soporta este aspecto.

    Los datos de sesiones obsoletas deben ser eliminados tan pronto
    como sea posible. Sin embargo, las sesiones activas no deben ser
    eliminadas instantáneamente. Para satisfacer estas recomendaciones, los desarrolladores
    mismos deben implementar un gestor de datos de sesión basado en
    timestamp.

    Defina y gestione la expiración del timestamp en la variable
    global $\_SESSION. Prohíba el acceso a los datos de sesiones
    caducadas. Cuando se detecte un acceso a datos de sesión obsoleta,
    debe eliminarse todo el estado autenticado de las sesiones
    de usuario y forzar a los usuarios a autenticarse de nuevo.
    El acceso a datos de sesiones obsoletas puede representar un ataque.
    Para lograr esto, los desarrolladores deben seguir todas las sesiones
    activas de todos los usuarios.

    **Nota**:

    El acceso a una sesión obsoleta también puede ocurrir debido a una red inestable
    y/o un acceso concurrente a un sitio web, por ejemplo, el servidor intenta definir un
    nuevo identificador de sesión mediante una cookie, pero el paquete Set-Cookie nunca
    llegó al cliente debido a una pérdida de conexión. Una conexión puede
    crear un nuevo identificador de sesión mediante la función [session_regenerate_id()](#function.session-regenerate-id),
    pero otra conexión concurrente puede no haber recibido
    aún el identificador de sesión. Sin embargo, los desarrolladores deben prohibir el acceso
    a una sesión obsoleta en un momento más lejano. Por ejemplo, la gestión de sesiones
    basada en timestamp es obligatoria.

    En resumen, los datos de sesiones no deben ser destruidos con la función
    [session_regenerate_id()](#function.session-regenerate-id), ni con la función [session_destroy()](#function.session-destroy),
    pero los timestamps deben ser utilizados para controlar el acceso a los datos de
    sesión. Deje que la función [session_gc()](#function.session-gc) elimine los datos obsoletos
    desde el almacenamiento de datos de sesiones.

    ### Sesión y Bloqueo

    Los datos de sesión están bloqueados por defecto para evitar los
    accesos concurrentes. El bloqueo es obligatorio para mantener una
    consistencia de los datos de sesión a través de las peticiones.

    Sin embargo, el bloqueo de sesión puede ser utilizado por los atacantes
    para realizar ataques DoS. Para minimizar el riesgo de un ataque DoS
    por bloqueo de sesión, debe minimizarse el uso de bloqueos.
    Utilice datos en modo solo lectura cuando los datos de sesión
    no necesiten ser actualizados. Utilice la opción 'read_and_close'
    con la función [session_start()](#function.session-start).
    session_start(['read_and_close'=&gt;1]); cerrará
    la sesión tan pronto como sea posible después de actualizar la variable
    global $\_SESSION utilizando la función [session_commit()](#function.session-commit).

    El módulo de sesión actual _no detecta_
    todas las modificaciones de la variable $\_SESSION cuando
    la sesión está inactiva. Es responsabilidad del desarrollador
    no modificar la variable $\_SESSION cuando la sesión está inactiva.

    ### Sesiones activas

    Los desarrolladores deben mantener un registro de todas las sesiones
    activas de cada usuario, y notificarles el número de sesiones
    activas, desde qué dirección IP, desde cuándo, etc.
    PHP no mantiene registros de estas informaciones. Los desarrolladores
    están supuestos a hacerlo ellos mismos.

    Existen diferentes formas de hacerlo. Una implementación posible
    es definir una base de datos que mantenga un registro de los datos
    necesarios, y almacenar todas las informaciones pertinentes.
    Dado que los datos de sesión son GCed, los desarrolladores deben
    tener cuidado con los datos GCed para mantener la base de datos
    de sesiones activas consistente.

    Una de las implementaciones simples es "el identificador de usuario prefijando
    el identificador de sesión" y almacenar las informaciones necesarias en
    la variable $\_SESSION. La mayoría de las bases de datos son relativamente
    eficientes para seleccionar un prefijo en forma de [string](#language.types.string).
    Los desarrolladores DEBEN utilizar la función [session_regenerate_id()](#function.session-regenerate-id)
    así como la función [session_create_id()](#function.session-create-id) para esto.

    **Advertencia**

    Nunca utilice datos confidenciales como prefijo.
    Si el identificador de usuario es confidencial, debería utilizar
    la función [hash_hmac()](#function.hash-hmac).

    **Advertencia**

    La activación de la directiva
    [session.use_strict_mode](#ini.session.use-strict-mode)
    es obligatoria para este tipo de configuración. Asegúrese de que
    esté activada. De lo contrario, la base de datos de sesiones activas
    puede ser comprometida.

    El gestor de sesión basado en timestamp es obligatorio
    para detectar el acceso a sesiones obsoletas. Cuando se detecte el acceso a una
    sesión obsoleta, la bandera de autenticación debe ser eliminada de todas las sesiones activas del usuario.
    Esto permite evitar que los atacantes continúen explotando las sesiones
    robadas.

    ### Sesión y auto-identificación

    Los desarrolladores no deben utilizar identificadores de sesión con una
    larga duración para la auto-identificación, ya que esto aumenta el riesgo
    de utilizar sesiones robadas. Una funcionalidad de auto-identificación
    debe ser implementada por el desarrollador.

    Utilice una clave de hash segura de un solo uso como clave
    de auto-identificación utilizando la función
    [setcookie()](#function.setcookie). Utilice un hash seguro
    más fuerte que SHA-2. Por ejemplo, SHA-256 o superior con datos
    aleatorios desde la función [random_bytes()](#function.random-bytes)
    o mediante /dev/urandom.

    Si el usuario no está autenticado, verifique si la clave de auto-identificación
    de un solo uso es válida o no. En el caso de que sea válida, autentifique
    al usuario y defina una nueva clave de hash segura de un solo uso.
    Una clave de auto-identificación solo debe ser utilizada una vez, por ejemplo, nunca utilice
    una clave de auto-identificación, y siempre regénela.

    Una clave de auto-identificación es una clave de autenticación con una
    larga duración, debe ser protegida tanto como sea posible.
    Utilice los atributos de cookie path/httponly/secure/SameSite para protegerla.
    Por ejemplo, nunca transmita la clave de auto-identificación a menos que sea necesario.

    Los desarrolladores deben implementar las funcionalidades que
    desactivan la auto-identificación, y eliminan las cookies
    que contienen las claves de auto-identificación no necesarias.

    ### Attaques CSRF (Cross-Site Request Forgeries)

    Las sesiones y las autenticaciones no protegen contra los
    ataques CSRF. Los desarrolladores deben implementar protecciones
    CSRF ellos mismos.

    La función [output_add_rewrite_var()](#function.output-add-rewrite-var) puede ser utilizada para
    la protección CSRF. Consulte las páginas del manual para más detalles.

    **Nota**:

    PHP, antes de su versión 7.2.0, utiliza el mismo buffer de salida y las
    mismas configuraciones INI que la configuración trans-sid. Sin embargo, el uso
    de la función [output_add_rewrite_var()](#function.output-add-rewrite-var) con versiones
    de PHP anteriores a 7.2.0 no es recomendado.

    La mayoría de los frameworks de aplicaciones web soportan
    la protección CSRF. Consulte el manual de su
    framework de aplicación web para más detalles.

    Desde PHP 7.3, el atributo SameSite de la cookie de sesión puede ser definido.
    Esto es una medida adicional que puede minimizar
    las vulnerabilidades CSRF.

    ## Seguridad de las configuraciones INI de sesión

    Al asegurar las configuraciones INI de sesiones, los desarrolladores
    pueden experimentar la seguridad de las sesiones. Muchas configuraciones
    INI no tienen una configuración recomendada. Los desarrolladores son
    responsables de la correcta configuración de las sesiones.
    - [session.cookie_lifetime](#ini.session.cookie-lifetime)=0

        El valor 0 tiene un significado importante.
        Informa a los navegadores de no almacenar la cookie en un
        espacio de almacenamiento permanente. También, cuando el navegador se cierra,
        la cookie de identificación de sesión es eliminada inmediatamente.
        Si los desarrolladores definen un valor diferente de 0, permite
        a otros usuarios utilizar el identificador de sesión. La
        mayoría de las aplicaciones deben utilizar "0" como
        valor.

        Si se desea una funcionalidad de auto-identificación, los desarrolladores
        deben implementar su propio sistema de auto-identificación seguro.
        No utilice identificadores de sesión de larga duración para esto.
        Para más información, consulte la sección adecuada de esta documentación.

    - [session.use_cookies](#ini.session.use-cookies)=On

        [session.use_only_cookies](#ini.session.use-only-cookies)=On

        Aunque las cookies HTTP sufren de problemas técnicos, siguen siendo
        la forma preferida de gestionar los identificadores de sesiones.
        Utilice solo cookies para la gestión de identificadores de sesiones
        cuando sea posible. La mayoría de las aplicaciones deben utilizar
        una cookie para el identificador de sesión.

        Si [session.use_only_cookies](#ini.session.use-only-cookies)=Off,
        el módulo de sesión utilizará los valores del identificador
        de sesión definidos por las variables GET o POST proporcionadas,
        y la cookie del identificador de sesión no será inicializada.

    - [session.use_strict_mode](#ini.session.use-strict-mode)=On

        Aunque la activación de [session.use_strict_mode](#ini.session.use-strict-mode)
        es obligatoria para la seguridad de las sesiones, esta directiva está
        desactivada por defecto.

        Este modo evita que el módulo de sesión utilice un identificador de sesión
        no inicializado. Dicho de otra forma, el módulo de sesión solo va a aceptar
        identificadores de sesiones válidos generados por el módulo de sesión.
        Rechazará todos los identificadores de sesión proporcionados por los usuarios.

        Debido a la especificación de cookies, los atacantes son capaces
        de colocar cookies que contienen identificadores de sesiones configurando
        localmente una base de datos de cookies o mediante inyecciones Javascript.
        [session.use_strict_mode](#ini.session.use-strict-mode) puede evitar que un atacante
        inicialice un identificador de sesión.

        **Nota**:

        Los atacantes pueden inicializar un identificador de sesión con su
        propio dispositivo, y pueden definir el identificador de sesión
        de su víctima. Deben entonces mantener el identificador de sesión
        activo para poder abusar de él.
        Los atacantes deben pasar por muchos otros pasos para tener éxito en su ataque
        en este escenario. También, el uso de la directiva
        [session.use_strict_mode](#ini.session.use-strict-mode) permite limitar los riesgos.

    - [session.cookie_httponly](#ini.session.cookie-httponly)=On

        Permite rechazar el acceso a una cookie de sesión desde javascript.
        Esta configuración evita que una cookie sea corrompida por una
        inyección Javascript.

        Es posible utilizar un identificador de sesión como token CSRF, pero
        no es recomendado. Por ejemplo, fuentes HTML pueden ser
        guardadas y enviadas a otros usuarios.
        Los desarrolladores no deben escribir los identificadores de sesión en las
        páginas web por razones de seguridad. Todas las aplicaciones web deben
        utilizar el atributo httponly para la cookie que contiene el identificador de sesión.

        **Nota**:

        El token CSRF debe ser renovado periódicamente, al igual que el identificador
        de sesión.

    - [session.cookie_secure](#ini.session.cookie-secure)=On

        Permite acceder a la cookie de identificador de sesión únicamente cuando
        el protocolo es HTTPS. Si un sitio web solo es accesible por HTTPS,
        esta directiva debe ser activada.

        HSTS debe ser utilizado para los sitios web accesibles solo por HTTPS.

    - [session.cookie_samesite](#ini.session.cookie-samesite)="Lax" o
      [session.cookie_samesite](#ini.session.cookie-samesite)="Strict"

        Desde PHP 7.3, el atributo "SameSite" puede ser definido
        para la cookie de identificador de sesión. Este atributo es una forma de
        mitigar los ataques CSRF (Cross Site Request Forgery).

        La diferencia entre Lax y Strict es la accesibilidad de la cookie en las peticiones
        originadas de otros dominios empleando el método HTTP GET.
        Las cookies utilizando Lax serán accesibles mediante una petición GET originada
        de otro dominio, mientras que las cookies utilizando Strict no lo serán.

    - [session.gc_maxlifetime](#ini.session.gc-maxlifetime)=[elija el más pequeño posible]

        [session.gc_maxlifetime](#ini.session.gc-maxlifetime) es una configuración para eliminar
        el identificador de sesión obsoleto. Confiar
        completamente en esta configuración _no es_ recomendado.
        Los desarrolladores deben gestionar la duración de las sesiones con un timestamp
        por ellos mismos.

        La GC de sesiones (recolección de basura) es mejor realizada utilizando
        la función [session_gc()](#function.session-gc).
        La función [session_gc()](#function.session-gc) debe ser ejecutada por un gestor
        de tareas; por ejemplo, un cron en los sistemas Unix.

        GC es ejecutado por probabilidad, por defecto. Esta configuración
        _no garantiza_ que las sesiones antiguas sean
        eliminadas. Aunque los desarrolladores no deben basarse en este parámetro,
        se recomienda definirlo con el valor más pequeño posible.
        Debe ajustarse las directivas [session.gc_probability](#ini.session.gc-probability)
        y [session.gc_divisor](#ini.session.gc-divisor) de modo que
        las sesiones obsoletas sean eliminadas con la frecuencia apropiada.
        Si la funcionalidad de auto-identificación es necesaria, los desarrolladores
        deben implementar su propia funcionalidad de auto-identificación segura;
        consulte a continuación para más información. Nunca utilice el identificador
        de sesión de larga duración para realizar este tipo de funcionalidad.

        **Nota**:

        Algunos módulos de gestión de guardado de sesiones no utilizan esta
        funcionalidad basada en expiración y probabilidad; por ejemplo,
        memcached, memcache. Consulte la documentación de estos gestores
        de guardado de sesiones para más detalles.

    - [session.use_trans_sid](#ini.session.use-trans-sid)=Off

        El uso de un gestor de identificadores de sesiones transparente
        no está prohibido. Los desarrolladores deben emplearlo cuando sea necesario.
        Sin embargo, la desactivación de la gestión de identificadores de sesión de
        forma transparente permite asegurar un poco más los identificadores de sesión
        eliminando la posibilidad de una inyección de identificador de sesión o
        fuga de este identificador.

        **Nota**:

        El identificador de sesión puede filtrarse desde URLs guardadas,
        URLs en emails, una fuente HTML guardada, etc...

    - [session.trans_sid_tags](#ini.session.trans-sid-tags)=[banderas limitadas]

        (PHP 7.1.0 &gt;=) Los desarrolladores no deben reescribir banderas HTML
        innecesarias. El valor por defecto debe ser suficiente para
        la mayoría de los usos. Para versiones de PHP más antiguas,
        utilice en su lugar
        [url_rewriter.tags](#ini.url-rewriter.tags).

    - [session.trans_sid_hosts](#ini.session.trans-sid-hosts)=[hosts limitados]

        (PHP 7.1.0 &gt;=) Este parámetro define una lista blanca de hosts que están
        autorizados a reescribir los identificadores de sesión transparentes. ¡Nunca
        añada hosts que no sean de confianza!
        El módulo de sesión solo autoriza $\_SERVER['HTTP_HOST']
        cuando este parámetro está vacío.

    - [session.referer_check](#ini.session.referer-check)=[URL de origen]

        Cuando el parámetro [session.use_trans_sid](#ini.session.use-trans-sid)
        está activo.
        Este parámetro reduce los riesgos de inyección de identificador de sesión.
        Si un sitio web es http://example.com/,
        defina como valor para este parámetro http://example.com/.
        Tenga en cuenta que los navegadores HTTPS no envían el encabezado referrer.
        Los navegadores pueden no enviar el encabezado referrer debido
        a su propia configuración. Por lo tanto, este parámetro no puede ser
        considerado como una medida fiable de seguridad.
        A pesar de todo, su uso es recomendado.

    - [session.cache_limiter](#ini.session.cache-limiter)=nocache

        Asegura que el contenido HTTP no sea almacenado en caché para las sesiones
        autenticadas. Permite el almacenamiento en caché solo para los contenidos
        que no son privados. De lo contrario, el contenido será expuesto.
        El valor "private" debe ser empleado si el contenido HTTP no incluye
        datos sensibles desde un punto de vista de seguridad. Tenga en cuenta que "private"
        puede transmitir datos privados almacenados en caché para los clientes
        compartidos. "public" solo debe ser utilizado cuando el contenido HTML
        no contiene ningún dato privado.

    - [session.hash_function](#ini.session.hash-function)="sha256"

        (PHP 7.1.0 &lt;) Una función de hash fuerte generará un identificador
        de sesión fuerte. Aunque una colisión de hash es poco probable con algoritmos
        de hash MD5, los desarrolladores deben utilizar SHA-2 o un
        algoritmo de hash más fuerte como sha384 y sha512.
        Los desarrolladores deben asegurarse de una longitud suficiente de
        la [entropía](#ini.session.entropy-length) para la
        función de hash utilizada.

    - [session.save_path](#ini.session.save-path)=[directorio no legible por todos]

        Si este parámetro está definido a un directorio accesible en lectura por todos,
        como /tmp (por defecto), otros usuarios del servidor
        serán capaces de recuperar las sesiones listando los archivos presentes
        en este directorio.

# Funciones de sesión

# session_abort

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

session_abort — Interrumpe los cambios en el array de sesión y finaliza la sesión

### Descripción

**session_abort**(): [bool](#language.types.boolean)

**session_abort()** finaliza la sesión sin guardar los
datos. Los valores originales de la sesión se conservan.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       El tipo de retorno de esta función es ahora [bool](#language.types.boolean).
       Anteriormente, era [void](#language.types.declarations.void).



### Ver también

    - [$_SESSION](#reserved.variables.session)

    -
     La directiva de configuración
     [session.auto_start](#ini.session.auto-start)


    - [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

    - [session_reset()](#function.session-reset) - Restablece el array de sesión con los valores originales

    - [session_commit()](#function.session-commit) - Alias de session_write_close

# session_cache_expire

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

session_cache_expire — Obtiene y/o define el tiempo de expiración de la caché

### Descripción

**session_cache_expire**([?](#language.types.null)[int](#language.types.integer) $value = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**session_cache_expire()** devuelve la configuración actual de
session.cache_expire.

El tiempo de expiración de la caché se reestablece a su valor por omisión de
180, almacenado en [session.cache_limiter](#ini.session.cache-expire),
al inicio de la petición. Por lo tanto, debe llamarse
**session_cache_expire()** en cada petición (y antes
de que [session_start()](#function.session-start) sea llamada).

### Parámetros

     value


       Si value es proporcionado y no **[null](#constant.null)**, la
       configuración actual de cache expire será reemplazada por
       value.






**Nota**:

         La directiva value solo tiene efecto si
         **session.cache_limiter** tiene un valor
         *diferente* de nocache.







### Valores devueltos

Devuelve la configuración actual de session.cache_expire.
El valor devuelto debe leerse en minutos, y por omisión, es 180.
En caso de fallo al modificar el valor, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       value ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con session_cache_expire()**

&lt;?php

/_ Configura el limitador de caché a 'private' _/

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/_ Configura el tiempo de expiración a 30 minutos _/
session_cache_expire(30);
$cache_expire = session_cache_expire();

/_ Inicia la sesión _/

session_start();

echo "El limitador de caché ahora está fijado a $cache_limiter&lt;br /&gt;";
echo "La sesión en caché expirará después de $cache_expire minutos";
?&gt;

### Ver también

    - [session.cache_expire](#ini.session.cache-expire)

    - [session.cache_limiter](#ini.session.cache-limiter)

    - [session_cache_limiter()](#function.session-cache-limiter) - Lee y/o modifica el limitador de caché de sesión

# session_cache_limiter

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

session_cache_limiter — Lee y/o modifica el limitador de caché de sesión

### Descripción

**session_cache_limiter**([?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**session_cache_limiter()** devuelve la configuración
actual del limitador de caché.

El limitador de caché controla los encabezados HTTP enviados al cliente.
Algunos encabezados determinan las reglas de almacenamiento en caché de la página
en el navegador. Al configurar este limitador a nocache,
por ejemplo, el navegador no almacenará la página en su caché. El valor
public, en cambio, permitirá el almacenamiento en caché. El valor
private desactiva la caché para el proxy y autoriza al
cliente a almacenar en caché el contenido.

En modo private, el encabezado Expire enviado al cliente
puede causar problemas en algunos navegadores, como, por ejemplo,
Mozilla. Este problema puede evitarse con el modo
private_no_expire. El encabezado Expire
nunca se envía al navegador para este modo.

El hecho de definir el limitador de caché a
la valor '' desactivará
automáticamente y por completo el envío de los encabezados de caché.

El limitador de caché se restablece al valor por defecto de
[**session.cache_limiter**](#ini.session.cache-limiter) en cada
inicio de script PHP. Por lo tanto, deberá llamarse a **session_cache_limiter()** en
cada página, y antes de [session_start()](#function.session-start).

### Parámetros

     value


       Si value se proporciona y no es **[null](#constant.null)**,
       el limitador de caché se reconfigura con este valor.




       <caption>**Valores posibles**</caption>



          Valores
          Encabezados enviados






          public



Expires: (Algo en el futuro, según session.cache_expire)
Cache-Control: public, max-age=(Algo en el futuro, según session.cache_expire)
Last-Modified: (el timestamp correspondiente al último guardado de la sesión)

          private_no_expire



Cache-Control: private, max-age=(session.cache_expire en el futuro)
Last-Modified: (el timestamp correspondiente al último guardado de la sesión)

          private



Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: private, max-age=(session.cache_expire en el futuro)
Last-Modified: (el timestamp correspondiente al último guardado de la sesión)

          nocache



Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: no-store, no-cache, must-revalidate
Pragma: no-cache

### Valores devueltos

Devuelve el nombre del limitador de caché actual.
En caso de error, se devuelve **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       value ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con session_cache_limiter()**

&lt;?php

/_ configura el limitador de caché a 'private' _/

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

echo "El limitador de caché ahora vale $cache_limiter&lt;br /&gt;";
?&gt;

### Ver también

    - [session.cache_limiter](#ini.session.cache-limiter)

# session_commit

(PHP 4 &gt;= 4.4.0, PHP 5, PHP 7, PHP 8)

session_commit — Alias de [session_write_close()](#function.session-write-close)

### Descripción

Esta función es un alias de:
[session_write_close()](#function.session-write-close).

# session_create_id

(PHP 7 &gt;= 7.1.0, PHP 8)

session_create_id — Crear un nuevo ID de sesión

### Descripción

**session_create_id**([string](#language.types.string) $prefix = ""): [string](#language.types.string)|[false](#language.types.singleton)

**session_create_id()** se utiliza para crear un nuevo
ID de sesión para la sesión actual. Esto devuelve un ID de
sesión sin colisión.

Si la sesión no está activa, la verificación de colisión se omite.

El ID de sesión se crea de acuerdo con los parámetros php.ini.

Es importante utilizar el mismo ID de usuario de su servidor web
para el script de la tarea de Recogida de Basura (Garbage Collection).
De lo contrario, se pueden tener problemas de permisos, especialmente
con los gestores de guardado de ficheros.

### Parámetros

     prefix


        Si prefix está especificado, el nuevo ID de sesión
        se prefiere con prefix. No todos
        los caracteres están permitidos en el ID de sesión. Los caracteres
        entre [a-z A-Z 0-9] están permitidos. La longitud máxima es de 256 caracteres.






### Valores devueltos

**session_create_id()** devuelve un nuevo ID de sesión
sin colisión para la sesión actual. Si se utiliza sin una sesión
activa, la verificación de colisión se omite.
En caso de error, **[false](#constant.false)** se devuelve.

### Ejemplos

    **Ejemplo #1 Ejemplo de session_create_id()** con [session_regenerate_id()](#function.session-regenerate-id)

&lt;?php
// Mi función de inicio de sesión soporta la gestión de marcas de tiempo
function my_session_start() {
session_start();
// No permite el uso de antiguos ID de sesión
if (!empty($\_SESSION['deleted_time']) &amp;&amp; $\_SESSION['deleted_time'] &lt; time() - 180) {
session_destroy();
session_start();
}
}

// Mi función de regeneración de ID
function my_session_regenerate_id() {
// Llamada a session_create_id() cuando la sesión está activa
// para asegurarse de que no hay colisión.
if (session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
// ADVERTENCIA: Nunca utilizar cadenas confidenciales como prefijo
$newid = session_create_id('myprefix-');
    // Establece la marca de tiempo de eliminación.
    // Los datos de sesión no deben eliminarse inmediatamente por ciertas razones.
    $_SESSION['deleted_time'] = time();
    // Termina la sesión
    session_commit();
    // Asegúrese de aceptar los ID de sesión definidos por el usuario
    // NOTA: Debe activar use_strict_mode para operaciones normales.
    ini_set('session.use_strict_mode', 0);
    // Definir un nuevo ID de sesión personalizado
    session_id($newid);
// Inicio con un ID de sesión personalizado
session_start();
}

// Asegúrese de que use_strict_mode esté activado.
// use_strict_mode es obligatorio por razones de seguridad.
ini_set('session.use_strict_mode', 1);
my_session_start();

// El ID de sesión debe regenerarse cuando
// - Un usuario se conecta
// - Un usuario se desconecta
// - Ha transcurrido un cierto período de tiempo
my_session_regenerate_id();

// Lógica de aplicación
?&gt;

### Ver también

    - [session_regenerate_id()](#function.session-regenerate-id) - Reemplaza el identificador de sesión actual por uno nuevo

    - [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

    - [session.use_strict_mode](#ini.session.use-strict-mode)

    - [SessionHandler::create_sid()](#sessionhandler.create-sid) - Devuelve un nuevo ID de sesión

# session_decode

(PHP 4, PHP 5, PHP 7, PHP 8)

session_decode — Decodifica la información de sesión desde una cadena de sesión codificada

### Descripción

**session_decode**([string](#language.types.string) $data): [bool](#language.types.boolean)

**session_decode()** decodifica la información de sesión serializada proporcianda en
$data, y rellena la variable superglobal $\_SESSION
con el resultado.

Por defecto, el método de deserialización usado es interno a PHP, y no es el mismo que [unserialize()](#function.unserialize).
El método de serialización se puede establecer con [session.serialize_handler](#ini.session.serialize-handler).

### Parámetros

     data


       Los datos codificados a alamcenar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [session_encode()](#function.session-encode) - Codifica los datos de sesión

    - [session.serialize_handler](#ini.session.serialize-handler)

# session_destroy

(PHP 4, PHP 5, PHP 7, PHP 8)

session_destroy — Destruye una sesión

### Descripción

**session_destroy**(): [bool](#language.types.boolean)

**session_destroy()** destruye todos los datos
asociados a la sesión actual. Esta función no destruye
las variables globales asociadas a la sesión, de igual manera, no
destruye la cookie de sesión. Para acceder nuevamente a las variables
de sesión, la función [session_start()](#function.session-start) debe ser
llamada nuevamente.

**Nota**:

    No es necesario llamar a **session_destroy()**
    desde el programa generalmente.
    Limpiar el array $_SESSION en lugar de destruir los datos de sesión.

Para destruir completamente una sesión,
el identificador de la sesión debe ser eliminado también. Si una cookie es utilizada
para propagar el identificador de sesión (comportamiento por omisión), entonces la cookie
de sesión debe ser eliminada. La función [setcookie()](#function.setcookie)
puede ser utilizada para esto.

Cuando [session.use_strict_mode](#ini.session.use-strict-mode)
está activado. No es necesario eliminar las cookies de ID de sesión
obsoletas ya que el módulo de sesión no acepta las cookies de ID de sesiones
cuando no hay datos asociados con estos ID de sesiones y definirá
una nueva cookie de ID de sesión.
Activar [session.use_strict_mode](#ini.session.use-strict-mode)
es recomendado para todos los sitios.

**Advertencia**

    La eliminación inmediata de una sesión puede causar resultados inesperados.
    Cuando hay peticiones simultáneas, otras conexiones pueden
    perder repentinamente datos de sesión. Por ejemplo peticiones
    desde JavaScript y/o peticiones desde enlaces URL.




    Aunque el módulo de sesión actual no acepta una cookie de ID de sesión
    vacía, la eliminación inmediata de sesión puede provocar una cookie
    de ID de sesión vacía debido a una condición de concurrencia lado-cliente
    (navegador). Esto provocará la creación de muchos ID de sesión
    innecesarios por el cliente.




    Para evitar esto, se debe definir un timestamp en $_SESSION y
    rechazar el acceso a todas las fechas posteriores. O asegurarse de que su
    aplicación no tenga peticiones simultáneas. Esto también se aplica a
    [session_regenerate_id()](#function.session-regenerate-id).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Destrucción de una sesión con [$_SESSION](#reserved.variables.session)**

&lt;?php
// Inicialización de la sesión.
// Si se utiliza otro nombre
// session_name("otroNombre")
session_start();

// Destruye todas las variables de sesión
$\_SESSION = array();

// Si se quiere destruir completamente la sesión, también se debe eliminar
// la cookie de sesión.
// Nota: esto destruirá la sesión y no solo los datos de sesión !
if (ini_get("session.use_cookies")) {
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,
$params["path"], $params["domain"],
$params["secure"], $params["httponly"]
);
}

// Finalmente, se destruye la sesión.
session_destroy();
?&gt;

### Ver también

    - [session.use_strict_mode](#ini.session.use-strict-mode)

    - [session_reset()](#function.session-reset) - Restablece el array de sesión con los valores originales

    - [session_regenerate_id()](#function.session-regenerate-id) - Reemplaza el identificador de sesión actual por uno nuevo

    - [unset()](#function.unset) - unset destruye una variable

    - [setcookie()](#function.setcookie) - Envía una cookie

# session_encode

(PHP 4, PHP 5, PHP 7, PHP 8)

session_encode — Codifica los datos de sesión

### Descripción

**session_encode**(): [string](#language.types.string)|[false](#language.types.singleton)

**session_encode()** devuelve un string serializado
que contiene las variables de la sesión actual codificadas
almacenadas en la variable superglobal $\_SESSION.

Por omisión, el método de serialización utilizado es interno a PHP, y no es el mismo que [serialize()](#function.serialize).
El método de serialización puede ser definido utilizando la opción de configuración
[session.serialize_handler](#ini.session.serialize-handler).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido codificado de la sesión actual, o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**

    Se debe llamar a la función [session_start()](#function.session-start)
    antes de utilizar la función **session_encode()**.

### Ver también

    - [session_decode()](#function.session-decode) - Decodifica la información de sesión desde una cadena de sesión codificada

    - [session.serialize_handler](#ini.session.serialize-handler)

# session_gc

(PHP 7 &gt;= 7.1.0, PHP 8)

session_gc — Ejecuta la recolección de basura de los datos de sesión

### Descripción

**session_gc**(): [int](#language.types.integer)|[false](#language.types.singleton)

Por omisión, PHP utiliza [session.gc_probability](#ini.session.gc-probability)
para ejecutar el recolector de basura de sesión de forma probabilística en cada
solicitud. Este enfoque presenta algunas limitaciones:

- Es posible que sitios con poco tráfico no eliminen sus datos de sesión dentro del plazo preferido.

- Sitios con mucho tráfico pueden hacer que el recolector de basura funcione con demasiada frecuencia, realizando trabajo extra innecesario.

- La recolección de basura se realiza a petición del usuario, y este puede experimentar una demora.

Para sistemas de producción, se recomienda deshabilitar la
recolección de basura basada en probabilidad configurando
[session.gc_probability](#ini.session.gc-probability) en 0
y activar explícitamente el recolector de basura periódicamente, por ejemplo, utilizando "cron" en
sistemas tipo UNIX para ejecutar un script que llame a **session_gc()**.

**Nota**:

    Al llamar a **session_gc()** desde un script PHP de línea de comandos,
    [session.save_path](#ini.session.save-path) debe tener
    el mismo valor que las solicitudes web, y el script debe tener permisos de acceso y eliminación
    para los archivos de sesión. Esto puede verse afectado por el usuario con el que se ejecuta el script
    y por características de contenedor o aislamiento, como la opción PrivateTmp=
    de systemd.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**session_gc()** devuelve el número de datos de sesión eliminados
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

**Nota**:

    Los antiguos gestores de almacenamiento de sesiones no devuelven el número de entradas de sesión eliminadas, sino
    solo un indicador de éxito/fracaso. En este caso, se devuelve 1 independientemente de
    cuántas entradas de sesión se hayan eliminado realmente.

### Ejemplos

**Ejemplo #1 Ejemplo de session_gc()** para planificadores de tareas como cron

&lt;?php
// Nota: Este script debe ser ejecutado por el mismo usuario que el proceso del servidor web.

// Requiere la activación de las sesiones para inicializar el acceso al gestor de almacenamiento de sesiones
session_start();

// Ejecutar la recolección de basura inmediatamente
session_gc();

// Eliminar el ID de sesión creado por session_start()
session_destroy();
?&gt;

**Ejemplo #2 Ejemplo de session_gc()** para scripts accesibles por el usuario

&lt;?php
// Nota: Se recomienda que session_gc() sea utilizado por un planificador de tareas,
// pero puede ser utilizado de la siguiente manera.

// Utilizado para verificar la hora del último uso de la recolección de basura
$gc_time = '/tmp/php_session_last_gc';
$gc_period = 1800;

session_start();
// Ejecutar la recolección de basura solo cuando haya transcurrido el período.
// Es decir, llamar a session_gc() en cada solicitud es un desperdicio de recursos.
if (file_exists($gc_time)) {
    if (filemtime($gc_time) &lt; time() - $gc_period) {
        session_gc();
        touch($gc_time);
}
} else {
touch($gc_time);
}
?&gt;

### Ver también

- [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

- [session_destroy()](#function.session-destroy) - Destruye una sesión

- [session.gc_probability](#ini.session.gc-probability)

# session_get_cookie_params

(PHP 4, PHP 5, PHP 7, PHP 8)

session_get_cookie_params — Lee la configuración del cookie de sesión

### Descripción

**session_get_cookie_params**(): [array](#language.types.array)

Lee la configuración del cookie de sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array, que contiene los siguientes elementos:

    -

      ["lifetime"](#ini.session.cookie-lifetime):
      duración de vida del cookie.



    -

      ["path"](#ini.session.cookie-path):
      la ruta donde se almacenan las informaciones.



    -

      ["domain"](#ini.session.cookie-domain):
      el dominio del cookie.



    -

      ["secure"](#ini.session.cookie-secure):
      el cookie debe ser enviado solo en conexiones seguras.



    -

      ["httponly"](#ini.session.cookie-httponly):
      el cookie será accesible solo vía el protocolo HTTP.



    -

      ["samesite"](#ini.session.cookie-samesite):
      Controla el envío entre dominio (cross-domain) del cookie.


### Historial de cambios

       Versión
       Descripción






       7.3.0

        La entrada "samesite" ha sido añadida en el array devuelto.





### Ver también

    -
     [session.cookie_lifetime](#ini.session.cookie-lifetime)


    -
     [session.cookie_path](#ini.session.cookie-path)


    -
     [session.cookie_domain](#ini.session.cookie-domain)


    -
     [session.cookie_secure](#ini.session.cookie-secure)


    -
     [session.cookie_httponly](#ini.session.cookie-httponly)


    -
     [session.cookie_samesite](#ini.session.cookie-samesite)


    -
     [session_set_cookie_params()](#function.session-set-cookie-params) - Modifica los parámetros de la cookie de sesión

# session_id

(PHP 4, PHP 5, PHP 7, PHP 8)

session_id — Lee y/o modifica el identificador de sesión actual

### Descripción

**session_id**([?](#language.types.null)[string](#language.types.string) $id = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**session_id()** se utiliza para recuperar o definir
el identificador de sesión para la sesión actual.

La constante **[SID](#constant.sid)** también puede ser utilizada para
leer el nombre de la sesión actual y el identificador de sesión a proporcionar
en las URL. Véase también [Gestión de sesión](#ref.session).

### Parámetros

     id


        Si id es proporcionado y no es **[null](#constant.null)**, reemplazará el identificador
        de sesión actual. **session_id()** debe ser
        llamado antes de [session_start()](#function.session-start). Dependiendo del gestor
        de sesiones que se utilice, no todos los caracteres serán aceptados
        en este valor. Por ejemplo, el gestor de sesiones por defecto,
        basado en archivos, solo acepta caracteres dentro del intervalo [a-zA-Z0-9,-]!



       **Nota**:

         Cuando se utilizan sesiones con cookies, el hecho de especificar un
         id para **session_id()**
         hará que una nueva cookie siempre sea enviada al llamar a
         [session_start()](#function.session-start), independientemente de si el identificador de sesión
         actual es idéntico al que acaba de ser definido.







### Valores devueltos

**session_id()** devuelve el identificador de sesión para la sesión
actual o una cadena vacía ("") si no hay sesión
actual (ningún identificador de sesión existe).
En caso de error, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       id ahora es nullable.



### Ver también

    - [session_regenerate_id()](#function.session-regenerate-id) - Reemplaza el identificador de sesión actual por uno nuevo

    - [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

    - [session_set_save_handler()](#function.session-set-save-handler) - Configura las funciones de almacenamiento de sesiones

    -
     [session.save_handler](#ini.session.save-handler)

# session_module_name

(PHP 4, PHP 5, PHP 7, PHP 8)

session_module_name — Lee y/o modifica el módulo de sesión actual

### Descripción

**session_module_name**([?](#language.types.null)[string](#language.types.string) $module = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**session_module_name()** recupera el nombre del
módulo de sesión actual, que también es conocido como
[session.save_handler](#ini.session.save-handler).

### Parámetros

     module


       Si module es proporcionado y no es **[null](#constant.null)**, este valor
       será utilizado y reemplazará el valor actual.
       Pasar "user" a este argumento está prohibido.
       En su lugar, [session_set_save_handler()](#function.session-set-save-handler) debe ser llamado para
       definir un manejador de sesión definido por el usuario.





### Valores devueltos

Retorna el nombre del módulo de sesión actual, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       module ahora es nullable.




      7.2.0

       Ahora está explícitamente prohibido definir el nombre del modo como
       "user". Anteriormente, esto era ignorado silenciosamente.



# session_name

(PHP 4, PHP 5, PHP 7, PHP 8)

session_name — Lee y/o modifica el nombre de la sesión

### Descripción

**session_name**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**session_name()** devuelve el nombre de la sesión
actual. Si se proporciona el argumento name,
**session_name()** modificará el nombre de la sesión
y devolverá el _anterior_ nombre de la sesión.

Si se proporciona un nuevo nombre de sesión name,
**session_name()** modifica la cookie HTTP
(y el contenido de salida cuando [session.transid](#ini.session.use-trans-sid) está
activado). Una vez enviada la cookie HTTP,
llamar a **session_name()** desencadena un **[E_WARNING](#constant.e-warning)**.
**session_name()** debe ser llamado
antes de [session_start()](#function.session-start) para que la sesión funcione
correctamente.

El nombre de la sesión se reinicia al valor por defecto, almacenado en
session.name al inicio. Por lo tanto, debe
llamarse a **session_name()** para cada petición (y antes de que
[session_start()](#function.session-start) sea llamado).

### Parámetros

     name


       El nombre de sesión se utiliza como nombre para las cookies y las URLs
       (es decir, PHPSESSID). Solo debe contener caracteres alfanuméricos;
       debe ser corto y descriptivo (especialmente para los usuarios
       que tienen activada la alerta de cookies). Si name se proporciona y no es **[null](#constant.null)**,
       el nombre de la sesión actual será reemplazado por este valor.






**Advertencia**

         Los nombres de sesión no pueden contener solo números, al menos una letra
         debe estar presente. De lo contrario, se generará un identificador de sesión cada vez.







### Valores devueltos

Devuelve el nombre de la sesión actual. Si se proporciona el argumento name
y la función actualiza el nombre de la sesión, entonces
el _anterior_ nombre de sesión será devuelto, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        name ahora es nullable.




       7.2.0

        **session_name()** verifica el estado de la sesión,
        anteriormente solo verificaba el estado de la cookie. Por lo tanto,
        las versiones anteriores de **session_name()** permiten
        la llamada a **session_name()**
        después de [session_start()](#function.session-start) lo que puede causar el fallo de PHP
        y puede dar lugar a comportamientos extraños.





### Ejemplos

    **Ejemplo #1 Ejemplo con session_name()**

&lt;?php

/_ elige el nombre de sesión: WebsiteID _/

$previous_name = session_name("WebsiteID");

echo "El nombre anterior de la sesión era $previous_name&lt;br /&gt;";
?&gt;

### Ver también

    -
     La directiva de configuración [session.name](#ini.session.name)

# session_regenerate_id

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

session_regenerate_id —
Reemplaza el identificador de sesión actual por uno nuevo

### Descripción

**session_regenerate_id**([bool](#language.types.boolean) $delete_old_session = **[false](#constant.false)**): [bool](#language.types.boolean)

**session_regenerate_id()** reemplazará el identificador
de sesión actual por uno nuevo, generado automáticamente, manteniendo
los valores de sesión.

Cuando la opción [session.use_trans_sid](#ini.session.use-trans-sid)
está activa, la salida para visualización debe comenzar después de la llamada a la función
**session_regenerate_id()**. De lo contrario, se utilizará el antiguo ID de sesión.

**Advertencia**

    Actualmente, session_regenerate_id no maneja adecuadamente una red inestable.
    Por ejemplo, redes móviles y WiFi. Por lo tanto, puede encontrarse una
    pérdida de sesión al llamar a session_regenerate_id.




    No se deben destruir los antiguos datos de sesión inmediatamente,
    sino que se debe utilizar el timestamp de destrucción y controlar el acceso
    al antiguo ID de sesión. De lo contrario, el acceso simultáneo a la página puede provocar un
    estado inconsistente, o quizás se haya perdido la sesión, o puede
    provocar un acceso concurrente lado-cliente (navegador) y puede crear
    muchos ID de sesión innecesariamente. La eliminación inmediata de datos de
    sesión también desactiva la detección y prevención de ataques de secuestro de sesión.

### Parámetros

     delete_old_session


        Si se debe borrar el antiguo archivo de sesión asociado o no.
        No se debe eliminar la antigua sesión si se necesita
        evitar accesos concurrentes causados por la eliminación o detectar/evitar
        ataques de secuestro de sesión.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con session_regenerate_id()**

&lt;?php
// Nota: este código no funciona completamente, es un ejemplo!

session_start();

// Verificar el timestamp de destrucción
if (isset($_SESSION['destroyed'])
    &amp;&amp; $_SESSION['destroyed'] &lt; time() - 300) {
    // No debería ocurrir habitualmente. Esto podría ser una ataque
    // o debido a una red inestable. Elimine todo el estado de
    // autenticación de esta sesión de usuario.
    remove_all_authentication_flag_from_active_sessions($\_SESSION['userid']);
throw(new DestroyedSessionAccessException);
}

$old_sessionid = session_id();

// Definir el timestamp de destrucción
$\_SESSION['destroyed'] = time(); // session_regenerate_id () registra los antiguos datos de sesión

// Simplemente llamar a session_regenerate_id() puede provocar pérdida de sesión, etc.
// Ver el ejemplo siguiente.
session_regenerate_id();

// La nueva sesión no necesita el timestamp de destrucción
unset($\_SESSION['destroyed']);

$new_sessionid = session_id();

echo "Sesión antigua: $old_sessionid&lt;br /&gt;";
echo "Sesión nueva: $new_sessionid&lt;br /&gt;";

print_r($\_SESSION);
?&gt;

El módulo de sesión actual no maneja adecuadamente una red inestable. Se debe
gestionar el ID de sesión para evitar la pérdida de sesión por session_regenerate_id.

    **Ejemplo #2 Evitar la pérdida de sesión por session_regenerate_id()**

&lt;?php
// Nota: este código no funciona completamente, es un ejemplo!
// my_session_start() y my_session_regenerate_id() evitan sesiones perdidas
// por red inestable. Además, este código puede evitar la explotación de
// sesión robada por atacantes.

function my_session_start() {
session_start();
if (isset($_SESSION['destroyed'])) {
       if ($\_SESSION['destroyed'] &lt; time()-300) {
// No debería ocurrir habitualmente. Esto podría ser una
// ataque o debido a una red inestable. Elimine todo el estado
// de autenticación de esta sesión de usuario.
remove_all_authentication_flag_from_active_sessions($_SESSION['userid']);
           throw(new DestroyedSessionAccessException);
       }
       if (isset($\_SESSION['new_session_id'])) {
// No ha expirado completamente. Podría ser pérdida de cookie por red inestable.
// Intente nuevamente definir la cookie de ID de sesión adecuada.
// Nota: no intente redefinir el ID de sesión si
// desea eliminar el estado de autenticación.
session_commit();
session_id($\_SESSION['new_session_id']);
// El nuevo ID de sesión debe existir
session_start();
return;
}
}
}

function my_session_regenerate_id() {
// El nuevo ID de sesión es requerido para definir el ID de sesión adecuado
// cuando el ID de sesión no está definido debido a una red inestable.
$new_session_id = session_create_id();
$\_SESSION['new_session_id'] = $new_session_id;

    // Define el timestamp de destrucción
    $_SESSION['destroyed'] = time();

    // Escribe y cierra la sesión actual
    session_commit();

    // Inicia la sesión con un nuevo ID
    session_id($new_session_id);
    ini_set('session.use_strict_mode', 0);
    session_start();
    ini_set('session.use_strict_mode', 1);

    // La nueva sesión no lo necesita
    unset($_SESSION['destroyed']);
    unset($_SESSION['new_session_id']);

}
?&gt;

### Ver también

    - [session_id()](#function.session-id) - Lee y/o modifica el identificador de sesión actual

    - [session_create_id()](#function.session-create-id) - Crear un nuevo ID de sesión

    - [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

    - [session_destroy()](#function.session-destroy) - Destruye una sesión

    - [session_reset()](#function.session-reset) - Restablece el array de sesión con los valores originales

    - [session_name()](#function.session-name) - Lee y/o modifica el nombre de la sesión

# session_register_shutdown

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

session_register_shutdown — Función de cierre de sesiones

### Descripción

**session_register_shutdown**(): [void](language.types.void.html)

Registra [session_write_close()](#function.session-write-close) como una función de cierre.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si la función de cierre
falla.

# session_reset

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

session_reset — Restablece el array de sesión con los valores originales

### Descripción

**session_reset**(): [bool](#language.types.boolean)

**session_reset()** restablece una sesión con los valores
originales almacenados en el almacenamiento de sesión. Esta función requiere
una sesión activa y anula los cambios en $\_SESSION.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       El tipo de retorno de esta función es ahora [bool](#language.types.boolean).
       Anteriormente, era [void](#language.types.declarations.void).



### Ver también

    - [$_SESSION](#reserved.variables.session)

    -
     La directiva de configuración
     [session.auto_start](#ini.session.auto-start)


    - [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

    - [session_abort()](#function.session-abort) - Interrumpe los cambios en el array de sesión y finaliza la sesión

    - [session_commit()](#function.session-commit) - Alias de session_write_close

# session_save_path

(PHP 4, PHP 5, PHP 7, PHP 8)

session_save_path — Lee y/o modifica la ruta de guardado de las sesiones

### Descripción

**session_save_path**([?](#language.types.null)[string](#language.types.string) $path = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**session_save_path()** devuelve la ruta del directorio
actualmente utilizado para guardar los datos de las sesiones.

### Parámetros

     path


       Ruta de los datos de sesión. Si path
       está especificado y no es **[null](#constant.null)**, la ruta del directorio será modificada.
       **session_save_path()** debe ser llamado
       antes que [session_start()](#function.session-start).






**Nota**:

         En ciertos sistemas operativos, será necesario elegir una
         ruta hacia un directorio capaz de manejar un gran número de pequeños
         ficheros de manera eficiente.







### Valores devueltos

Devuelve la ruta del directorio actual utilizado para almacenar los datos, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       path ahora es nullable.



### Ver también

    -
     La directiva de configuración [session.save_path](#ini.session.save-path)

# session_set_cookie_params

(PHP 4, PHP 5, PHP 7, PHP 8)

session_set_cookie_params — Modifica los parámetros de la cookie de sesión

### Descripción

**session_set_cookie_params**(
    [int](#language.types.integer) $lifetime_or_options,
    [?](#language.types.null)[string](#language.types.string) $path = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $domain = **[null](#constant.null)**,
    [?](#language.types.null)[bool](#language.types.boolean) $secure = **[null](#constant.null)**,
    [?](#language.types.null)[bool](#language.types.boolean) $httponly = **[null](#constant.null)**
): [bool](#language.types.boolean)

Firma alternativa disponible a partir de PHP 7.3.0:

**session_set_cookie_params**([array](#language.types.array) $lifetime_or_options): [bool](#language.types.boolean)

Modifica los parámetros de configuración de la cookie de sesión, que ha sido
configurada en el archivo php.ini. El efecto de esta función solo dura
durante la ejecución del script actual. Por lo tanto, debe llamarse
a **session_set_cookie_params()** para cada script y antes
de la llamada a [session_start()](#function.session-start).

Esta función modifica los parámetros ini correspondientes que pueden ser
recuperados mediante [ini_get()](#function.ini-get).

### Parámetros

     lifetime_or_options


       Al utilizar la primera firma, la duración de vida de la cookie, en segundos.
       Ver la directiva [lifetime](#ini.session.cookie-lifetime).




       Al utilizar la segunda firma,
       un [array](#language.types.array) asociativo que puede tener como claves
       lifetime, path, domain,
       secure, httponly y samesite.
       Los valores tienen la misma significación que los descritos para los parámetros
       con el mismo nombre. El valor del elemento samesite debe ser
       Lax o Strict.
       Si una opción autorizada no es proporcionada, su valor por defecto será
       idéntico al valor por defecto de los parámetros explícitos. Si el elemento
       samesite es omitido, entonces el atributo SameSite de la cookie
       no será definido.






     path


       La ruta en el dominio donde la cookie será accesible. Utilice
       una barra simple ('/') para todos los caminos del dominio.
       Ver la directiva [path](#ini.session.cookie-path).






     domain


       El dominio de la cookie, por ejemplo 'www.php.net'. Para hacer visibles las cookies
       en todos los subdominios, el dominio debe ser prefijado con
       un punto, tal como '.php.net'.
       Ver la directiva [domain](#ini.session.cookie-domain).






     secure


       Si **[true](#constant.true)**, la cookie solo será enviada en una conexión segura.
       Ver la directiva [secure](#ini.session.cookie-secure).






     httponly


       Si **[true](#constant.true)**, PHP intentará enviar la opción httponly
       durante la configuración de la cookie.
       Ver la directiva [httponly](#ini.session.cookie-httponly).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        path, domain,
        secure y httponly ahora son nullable.




       7.3.0

        Se añadió una firma alternativa que soporta un [array](#language.types.array)
        de lifetime_or_options. Esta firma soporta la definición
        del atributo SameSite de la cookie.




       7.2.0

        Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Anteriormente la función retornaba [void](#language.types.declarations.void).





### Ver también

    -
     [session.cookie_lifetime](#ini.session.cookie-lifetime)


    -
     [session.cookie_path](#ini.session.cookie-path)


    -
     [session.cookie_domain](#ini.session.cookie-domain)


    -
     [session.cookie_secure](#ini.session.cookie-secure)


    -
     [session.cookie_httponly](#ini.session.cookie-httponly)


    -
     [session.cookie_samesite](#ini.session.cookie-samesite)


    -
     [session_get_cookie_params()](#function.session-get-cookie-params) - Lee la configuración del cookie de sesión

# session_set_save_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

session_set_save_handler — Configura las funciones de almacenamiento de sesiones

### Descripción

**session_set_save_handler**(
    [callable](#language.types.callable) $open,
    [callable](#language.types.callable) $close,
    [callable](#language.types.callable) $read,
    [callable](#language.types.callable) $write,
    [callable](#language.types.callable) $destroy,
    [callable](#language.types.callable) $gc,
    [callable](#language.types.callable) $create_sid = ?,
    [callable](#language.types.callable) $validate_sid = ?,
    [callable](#language.types.callable) $update_timestamp = ?
): [bool](#language.types.boolean)

Es posible registrar el siguiente prototipo:

**session_set_save_handler**([object](#language.types.object) $sessionhandler, [bool](#language.types.boolean) $register_shutdown = **[true](#constant.true)**): [bool](#language.types.boolean)

**session_set_save_handler()** configura las funciones
de almacenamiento de sesiones, y permite elegir funciones de usuario
para guardar y leer todas las sesiones. Esta función es
muy práctica cuando se necesita guardar los datos de sesión
utilizando una técnica diferente al sistema de archivos proporcionado
por defecto, por ejemplo, el almacenamiento en base de datos.

### Parámetros

Esta función tiene dos prototipos.

     sessionhandler


       Una instancia de una clase que implementa una o más de las siguientes interfaces:
       [SessionHandlerInterface](#class.sessionhandlerinterface), y opcionalmente
       [SessionIdInterface](#class.sessionidinterface), y/o
       [SessionUpdateTimestampHandlerInterface](#class.sessionupdatetimestamphandlerinterface),
       como la clase [SessionHandler](#class.sessionhandler),
       para el registro como manejador de sesión.






     register_shutdown


       Registra la función [session_write_close()](#function.session-write-close)
       como función [register_shutdown_function()](#function.register-shutdown-function).





o

     open


       Una función de retorno con la siguiente firma:



        open([string](#language.types.string) $savePath, [string](#language.types.string) $sessionName): [bool](#language.types.boolean)



       La función de retorno open funciona como un constructor
       en una clase, y se ejecuta cuando la sesión se abre.
       Es la primera función de retorno ejecutada cuando la sesión
       comienza automáticamente o manualmente con la función
       [session_start()](#function.session-start). El valor devuelto
       es **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.






     close


       Una función de retorno con la siguiente firma:


close(): [bool](#language.types.boolean)

       La función de retorno close funciona como un
       destructor en una clase, y se ejecuta una vez que la función
       de retorno write de la sesión ha terminado de ejecutarse. También
       es llamada cuando la función [session_write_close()](#function.session-write-close) es llamada.
       El valor devuelto es **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.






     read


       Una función de retorno con la siguiente firma:


read([string](#language.types.string) $sessionId): [string](#language.types.string)

       La función de retorno read debe siempre devolver
       un string serializado que contenga los datos de sesión codificados
       o un string vacío si no hay datos que leer.




       Esta función de retorno es llamada internamente por PHP cuando la sesión
       comienza o cuando la función [session_start()](#function.session-start) es llamada.
       Antes de que esta función de retorno sea invocada, PHP invocará
       la función de retorno open.




       El valor devuelto por esta función de retorno debe ser exactamente del mismo
       formato de serialización que el pasado para el almacenamiento a la función
       de retorno write. El valor devuelto será deserializado
       automáticamente por PHP y utilizado para poblar la variable superglobal
       [$_SESSION](#reserved.variables.session). Aunque los datos se asemejen fuertemente
       a los emitidos por la función [serialize()](#function.serialize), note que es un
       formato diferente, que es especificado mediante la opción de configuración
       [session.serialize_handler](#ini.session.serialize-handler).






     write


       Una función de retorno con la siguiente firma:


write([string](#language.types.string) $sessionId, [string](#language.types.string) $data): [bool](#language.types.boolean)

       La función de retorno write es llamada cuando la sesión
       debe ser guardada y cerrada. Esta función de retorno recibe el identificador de
       la sesión actual así como una versión serializada del contenido de la variable
       superglobal [$_SESSION](#reserved.variables.session). El método de serialización utilizado internamente
       por PHP es especificado mediante la opción de configuración
       [session.serialize_handler](#ini.session.serialize-handler).




       Los datos de sesión serializados pasados a esta función de retorno deben ser
       almacenados utilizando el identificador de sesión proporcionado. Al recuperar
       estos datos, la función de retorno read debe devolver
       el valor exacto, originalmente pasado a la función de retorno write.




       Esta función de retorno es invocada cuando PHP se detiene o explícitamente
       cuando la función [session_write_close()](#function.session-write-close) es llamada.
       Note que después de la ejecución de esta función, PHP ejecutará internamente
       la función de retorno close.


**Nota**:

         El manejador de escritura no se ejecuta hasta que el flujo de salida
         no haya sido cerrado. Por lo tanto, la salida de las peticiones de depuración
         del manejador "write" nunca será mostrada en el navegador.
         Si la salida de depuración es necesaria, se sugiere que sea dirigida a un archivo.








     destroy


       Una función de retorno con la siguiente firma:



        destroy([string](#language.types.string) $sessionId): [bool](#language.types.boolean)



       Esta función de retorno es ejecutada cuando una sesión es destruida
       con la función [session_destroy()](#function.session-destroy) o con
       [session_regenerate_id()](#function.session-regenerate-id) con el parámetro de destrucción definido
       a **[true](#constant.true)**. El valor devuelto debe ser **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.






     gc


       Una función de retorno con la siguiente firma:


gc([int](#language.types.integer) $lifetime): [bool](#language.types.boolean)

       La función de retorno del recolector de basura es invocada internamente por PHP
       periódicamente para purgar los datos de sesión antiguos. La frecuencia
       es controlada por las opciones de configuración
       [session.gc_probability](#ini.session.gc-probability) y
       [session.gc_divisor](#ini.session.gc-divisor).
       El valor de la duración de vida pasado a esta función de retorno puede ser
       definido mediante la opción de configuración [session.gc_maxlifetime](#ini.session.gc-maxlifetime).
       El valor devuelto debe ser **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.






     create_sid


       Una función de retorno con la siguiente firma:


create_sid(): [string](#language.types.string)

       Esta función de retorno es ejecutada cuando se necesita un nuevo ID de sesión.
       No se proporcionan parámetros, y el valor devuelto debe ser un string que es un ID de sesión válido para su manejador.






     validate_sid


       Una función de retorno con la siguiente firma:


validate_sid([string](#language.types.string) $key): [bool](#language.types.boolean)

       Esta función de retorno es ejecutada cuando una sesión va a comenzar, un ID
       de sesión es proporcionado y
       [session.use_strict_mode](#ini.session.use-strict-mode)
       está activado.
       key es el ID de sesión a validar.
       Un ID de sesión es válido, si una sesión con este ID ya existe.
       El valor de retorno debe ser **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** en caso de fallo.






     update_timestamp


       Una función de retorno con la siguiente firma:


update_timestamp([string](#language.types.string) $key, [string](#language.types.string) $val): [bool](#language.types.boolean)

       Esta función de retorno es ejecutada cuando una sesión es actualizada.
       key es el ID de sesión, val
       son los datos de sesión.
       El valor de retorno debe ser **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** en caso de fallo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1
     Manejador de sesión personalizado: ver el código completo
     en la documentación sobre la interfaz [SessionHandlerInterface](#class.sessionhandlerinterface).
    **



     Solo mostramos la invocación aquí, el ejemplo completo puede verse en
     la documentación de la interfaz
     [SessionHandlerInterface](#class.sessionhandlerinterface).




     Note que aquí utilizamos el prototipo orientado a objetos con
     **session_set_save_handler()** y registramos la función de cierre
     utilizando el flag en el parámetro de la función. Esto es generalmente
     preferible al registrar objetos como manejadores de guardado de sesión.

&lt;?php
class MySessionHandler implements SessionHandlerInterface
{
// implementación de la interfaz aquí
}

$handler = new MySessionHandler();
session_set_save_handler($handler, true);
session_start();

// proceso para definir y recuperar los valores por sus claves desde $\_SESSION

### Notas

**Advertencia**

    Los manejadores de escritura write y cierre
    close son llamados después de la destrucción de los objetos,
    y por lo tanto, no pueden utilizar los objetos ni lanzar excepciones.
    Las excepciones no pueden ser atrapadas ni mostradas,
    y la ejecución solo se detendrá de manera inesperada.




    Es posible llamar a [session_write_close()](#function.session-write-close) desde
    el destructor para resolver este problema pero la forma más elegante
    es registrar la función de cierre tal como se describe arriba.

**Advertencia**

    El directorio de trabajo actual cambia según las SAPIs si la sesión
    es cerrada al final del script. Es posible cerrar la sesión más tarde,
    gracias a la función [session_write_close()](#function.session-write-close).

### Ver también

    -
     La directiva de configuración [session.save_handler](#ini.session.save-handler)


    -
     La directiva de configuración
     [session.serialize_handler](#ini.session.serialize-handler).


    - [register_shutdown_function()](#function.register-shutdown-function) - Registra una función de retrollamada para ejecución al cierre

    - [session_register_shutdown()](#function.session-register-shutdown) - Función de cierre de sesiones

    -
     Ver [» save_handler.inc](https://github.com/php/php-src/blob/master/ext/session/tests/save_handler.inc)
     para una implementación procedimental completa

# session_start

(PHP 4, PHP 5, PHP 7, PHP 8)

session_start — Inicia una nueva sesión o reanuda una sesión existente

### Descripción

**session_start**([array](#language.types.array) $options = []): [bool](#language.types.boolean)

**session_start()** crea una sesión o
restaura la encontrada en el servidor, mediante el identificador
de sesión pasado en una petición GET, POST o mediante una cookie.

Cuando **session_start()** es llamada o cuando una sesión comienza
automáticamente, PHP va a llamar a los gestores de apertura y lectura. Estos son
gestores internos proporcionados por PHP (como archivos, SQLite o Memcached) o bien
gestores personalizados definidos mediante
[session_set_save_handler()](#function.session-set-save-handler). La función de lectura va a recuperar toda
sesión existente (almacenada en forma serializada) y va a deserializar los datos para poblar
$\_SESSION.

Para utilizar una sesión nombrada, debe
llamarse a [session_name()](#function.session-name) antes de llamar
a **session_start()**.

Cuando [session.use_trans_sid](#ini.session.use-trans-sid)
está activada, la función **session_start()** registrará un
gestor interno de salida para la reescritura de URLs.

Si un usuario utiliza ob_gzhandler o el equivalente
[ob_start()](#function.ob-start), el orden de llamada de las funciones es importante
para una salida correcta. Por ejemplo,
ob_gzhandler debe ser registrado antes de iniciar la sesión.

### Parámetros

    options


      Si se proporciona, se trata de un array asociativo de opciones que reemplazará
      [las directivas de configuración de sesión](#session.configuration)
      actualmente definidas.
      Las claves no deben incluir el prefijo session..




      Además del conjunto normal de directivas de configuración, una opción
      read_and_close puede también ser proporcionada. Si la
      valor es definido como **[true](#constant.true)**, esto provoca el cierre inmediato de
      la sesión después de la lectura, lo que evita cualquier bloqueo innecesario si los
      datos de sesión no son modificados.


### Valores devueltos

Devuelve **[true](#constant.true)** si una sesión pudo ser iniciada con éxito, y **[false](#constant.false)** en caso contrario.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        **session_start()** ahora devuelve **[false](#constant.false)** y
        ya no inicializa [$_SESSION](#reserved.variables.session) cuando no ha podido
        iniciar la sesión.





### Ejemplos

#### Un ejemplo de sesión básica

    **Ejemplo #1 page1.php**

&lt;?php
// page1.php

session_start();

echo 'Bienvenido a la página número 1';

$_SESSION['favcolor'] = 'green';
$\_SESSION['animal'] = 'cat';
$\_SESSION['time'] = time();

// Funciona si la cookie ha sido aceptada
echo '&lt;br /&gt;&lt;a href="page2.php"&gt;página 2&lt;/a&gt;';

// O bien, indicando explícitamente el identificador de sesión
echo '&lt;br /&gt;&lt;a href="page2.php?' . SID . '"&gt;página 2&lt;/a&gt;';
?&gt;

Después de ver la página page1.php con un navegador,
la segunda página page2.php (cuyo código sigue) va a mostrar
mágicamente los datos de sesión. Consulte la referencia sobre
las [sesiones](#ref.session) para obtener información
sobre la [propagación de identificadores de sesión](#session.idpassing),
y el uso de la constante **[SID](#constant.sid)**.

    **Ejemplo #2 Recuperación de la sesión: page2.php**

&lt;?php
// page2.php

session_start();

echo 'Bienvenido a la página número 2&lt;br /&gt;';

echo $\_SESSION['favcolor']; // green
echo $\_SESSION['animal']; // cat
echo date('Y m d H:i:s', $\_SESSION['time']);

// Podría utilizarse la constante SID aquí, al igual que en la página page1.php
echo '&lt;br /&gt;&lt;a href="page1.php"&gt;página 1&lt;/a&gt;';
?&gt;

#### Proporcionar opciones a **session_start()**

    **Ejemplo #3 Reemplazo de la duración del cookie**

&lt;?php
// Esto envía un cookie persistente que dura un día.
session_start([
'cookie_lifetime' =&gt; 86400,
]);
?&gt;

    **Ejemplo #4 Lectura de la sesión y cierre**

&lt;?php
// Si sabemos que no necesitamos cambiar
// nada en la sesión, podemos simplemente
// leer y cerrar de inmediato para evitar bloquear
// el archivo de sesión y bloquear otras páginas
session_start([
'cookie_lifetime' =&gt; 86400,
'read_and_close' =&gt; true,
]);

### Notas

**Nota**:

    Para utilizar sesiones basadas en cookies, **session_start()**
    debe ser llamada antes de mostrar cualquier cosa en el navegador.

**Nota**:

    El uso de
    [**zlib.output_compression**](#ini.zlib.output-compression)
    es recomendado, en lugar de [ob_gzhandler()](#function.ob-gzhandler).

**Nota**:

    Esta función va a emitir varios encabezados HTTP, dependiendo
    de la configuración. Consulte [session_cache_limiter()](#function.session-cache-limiter) para
    personalizar estos encabezados.

### Ver también

    - [$_SESSION](#reserved.variables.session)

    -
     La directiva de configuración [session.auto_start](#ini.session.auto-start)


    - [session_id()](#function.session-id) - Lee y/o modifica el identificador de sesión actual

# session_status

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

session_status — Determina el estado de la sesión actual

### Descripción

**session_status**(): [int](#language.types.integer)

**session_status()** se utiliza para conocer el estado de la sesión actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    -
     **[PHP_SESSION_DISABLED](#constant.php-session-disabled)** si las sesiones están desactivadas.


    -
     **[PHP_SESSION_NONE](#constant.php-session-none)** si las sesiones están activadas, pero no existe ninguna.


    -
     **[PHP_SESSION_ACTIVE](#constant.php-session-active)** si las sesiones están activadas y existe una.

### Ver también

- [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente

# session_unset

(PHP 4, PHP 5, PHP 7, PHP 8)

session_unset — Destruye todas las variables de una sesión

### Descripción

**session_unset**(): [bool](#language.types.boolean)

**session_unset()** destruye todas las variables
de la sesión actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       El tipo de retorno de esta función es ahora [bool](#language.types.boolean).
       Anteriormente, era [void](#language.types.declarations.void).



### Notas

**Nota**:

    Si se utiliza [$_SESSION](#reserved.variables.session)
    utilice [unset()](#function.unset) para destruir una variable de
    sesión, es decir unset($_SESSION['nomvariable']);.

**Precaución**

    No se debe destruir [$_SESSION](#reserved.variables.session) con
    unset($_SESSION) ya que esto desactivará
    la posibilidad de almacenar variables de sesión a partir del
    array superglobal [$_SESSION](#reserved.variables.session).

**Nota**:

    Únicamente **session_unset()** debe utilizarse para código antiguo
    que no utiliza [$_SESSION](#reserved.variables.session).

**Precaución**

    Esta función solo funciona si una sesión está activa. No vaciará el
    array [$_SESSION](#reserved.variables.session) si la sesión no ha sido iniciada
    o si ya ha sido destruida. Utilice $_SESSION = [] para eliminar
    todas las variables de sesión incluso si la sesión no está activa.

# session_write_close

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

session_write_close — Escribe los datos de sesión y cierra la sesión

### Descripción

**session_write_close**(): [bool](#language.types.boolean)

Finaliza la sesión actual, después de almacenar los datos.

Los datos de sesión se almacenan generalmente al final
del script, automáticamente, sin necesidad de llamar explícitamente
a **session_write_close()**. Pero durante toda la ejecución
del script, los datos de sesión están bloqueados en escritura,
y un solo script puede operar sobre la sesión a la vez. Cuando
se utilizan frames con sesiones, esto se nota al ver cómo las frames
se actualizan una tras otra. Puede reducirse el tiempo de cálculo de estas páginas
cerrando la sesión tan pronto como sea posible, lo que libera los datos
para otros scripts.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       El tipo de retorno de esta función es ahora [bool](#language.types.boolean).
       Anteriormente, era [void](#language.types.declarations.void).



### Ver también

    -
     [session_register_shutdown()](#function.session-register-shutdown) - Función de cierre de sesiones

## Tabla de contenidos

- [session_abort](#function.session-abort) — Interrumpe los cambios en el array de sesión y finaliza la sesión
- [session_cache_expire](#function.session-cache-expire) — Obtiene y/o define el tiempo de expiración de la caché
- [session_cache_limiter](#function.session-cache-limiter) — Lee y/o modifica el limitador de caché de sesión
- [session_commit](#function.session-commit) — Alias de session_write_close
- [session_create_id](#function.session-create-id) — Crear un nuevo ID de sesión
- [session_decode](#function.session-decode) — Decodifica la información de sesión desde una cadena de sesión codificada
- [session_destroy](#function.session-destroy) — Destruye una sesión
- [session_encode](#function.session-encode) — Codifica los datos de sesión
- [session_gc](#function.session-gc) — Ejecuta la recolección de basura de los datos de sesión
- [session_get_cookie_params](#function.session-get-cookie-params) — Lee la configuración del cookie de sesión
- [session_id](#function.session-id) — Lee y/o modifica el identificador de sesión actual
- [session_module_name](#function.session-module-name) — Lee y/o modifica el módulo de sesión actual
- [session_name](#function.session-name) — Lee y/o modifica el nombre de la sesión
- [session_regenerate_id](#function.session-regenerate-id) — Reemplaza el identificador de sesión actual por uno nuevo
- [session_register_shutdown](#function.session-register-shutdown) — Función de cierre de sesiones
- [session_reset](#function.session-reset) — Restablece el array de sesión con los valores originales
- [session_save_path](#function.session-save-path) — Lee y/o modifica la ruta de guardado de las sesiones
- [session_set_cookie_params](#function.session-set-cookie-params) — Modifica los parámetros de la cookie de sesión
- [session_set_save_handler](#function.session-set-save-handler) — Configura las funciones de almacenamiento de sesiones
- [session_start](#function.session-start) — Inicia una nueva sesión o reanuda una sesión existente
- [session_status](#function.session-status) — Determina el estado de la sesión actual
- [session_unset](#function.session-unset) — Destruye todas las variables de una sesión
- [session_write_close](#function.session-write-close) — Escribe los datos de sesión y cierra la sesión

# La clase SessionHandler

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

    **SessionHandler** es una clase especial que puede usarse
    para exponer el gestor de almacenamiento de sesiones interno actual de PHP por herencia.
    Existen siete métodos que envuelven las sietes retrollamadas del gestor de almacenamiento
    de sesiones (open, close,
    read, write,
    destroy, gc y
    create_sid). Por defecto, esta clase envolverá
    cualquier gestor de almacenamiento que esté establecido como está definido por la
    directiva de configuración [session.save_handler](#ini.session.save-handler),
    el cual normalmente es files por
    omisión. Otros gestores de almacenamiento de sesión internos son proporcionados por
    extensiones de PHP tales como SQLite (como sqlite), Memcache (como
    memcache), y Memcached (como
    Memcached).




    Cuando se establece una simple instancia de **SessionHandler** como el gestor de almacenamiento usando
    [session_set_save_handler()](#function.session-set-save-handler), envolverá los gestores de almacenamiento actuales.
    Una clase que extienda de **SessionHandler** permite sobrescribir
    los métodos o interceptarlos o filtrarlos llamando a los métodos de la clase madre, los cuales en última instancia envolverán
    los gestores de sesiones de PHP internos.




    Esto permite, por ejemplo, interceptar los métodos read y write
    para encriptar/desencriptar la información de sesión y luego pasar el resultado hacia y desde la clase madre.
    De forma alternativa se podría elegir sobrescribir por completo un método como la llamada de retorno del recolector de basura
    gc.




    Ya que **SessionHandler** envuelve los métodos del gestor de almacenamiento interno
    actual, el ejemplo de arriba de encriptación puede aplicarse a cualquier gestor de almacenamiento interno sin
    tener que conocer los entresijos de los gestores.




    Para usar esta clase, primero establezca el gestor de almacenamiento que desee exponer usando
    [session.save_handler](#ini.session.save-handler) y luego pasar una instancia de
    **SessionHandler** o una que la extienda a [session_set_save_handler()](#function.session-set-save-handler).




    Observe que los métodos de llamda de retorno de esta clase están diseñados para ser llamados internamente por
    PHP y no para ser llamados desde código de espacio de usuario. Los valores devueltos son igualmente procesados internamente
    por PHP. Para más información sobre el flujo de trabajo de sesiones consulte [session_set_save_handler()](#function.session-set-save-handler).

## Sinopsis de la Clase

     class **SessionHandler**



     implements
      [SessionHandlerInterface](#class.sessionhandlerinterface),

     [SessionIdInterface](#class.sessionidinterface) {

    /* Métodos */

public [close](#sessionhandler.close)(): [bool](#language.types.boolean)
public [create_sid](#sessionhandler.create-sid)(): [string](#language.types.string)
public [destroy](#sessionhandler.destroy)([string](#language.types.string) $id): [bool](#language.types.boolean)
public [gc](#sessionhandler.gc)([int](#language.types.integer) $max_lifetime): [int](#language.types.integer)|[false](#language.types.singleton)
public [open](#sessionhandler.open)([string](#language.types.string) $path, [string](#language.types.string) $name): [bool](#language.types.boolean)
public [read](#sessionhandler.read)([string](#language.types.string) $id): [string](#language.types.string)|[false](#language.types.singleton)
public [write](#sessionhandler.write)([string](#language.types.string) $id, [string](#language.types.string) $data): [bool](#language.types.boolean)

}

## Notas

**Advertencia**

     Esta clase está diseñada para exponer el gestor de almacenamiento de sesiones interno de PHP, si quiere
     escribir sus propios gestores de almacenamiento, implemente la interfaz [SessionHandlerInterface](#class.sessionhandlerinterface)
     en lugar de extender desde **SessionHandler**.

## Ejemplos

    **Ejemplo #1
     Usar SessionHandler** para añadir encriptación a los gestores de almacenamiento internos de PHP.

&lt;?php

/\*\*

- decrypt AES 256
-
- @param data $edata
- @param string $password
- @return decrypted data
  \*/
  function decrypt($edata, $password) {
    $data = base64_decode($edata);
  $salt = substr($data, 0, 16);
  $ct = substr($data, 16);

        $rounds = 3; // depends on key length
        $data00 = $password.$salt;
        $hash = array();
        $hash[0] = hash('sha256', $data00, true);
        $result = $hash[0];
        for ($i = 1; $i &lt; $rounds; $i++) {
            $hash[$i] = hash('sha256', $hash[$i - 1].$data00, true);
            $result .= $hash[$i];
        }
        $key = substr($result, 0, 32);
        $iv  = substr($result, 32,16);

        return openssl_decrypt($ct, 'AES-256-CBC', $key, true, $iv);

    }

/\*\*

- crypt AES 256
-
- @param data $data
- @param string $password
- @return base64 encrypted data
  \*/
  function encrypt($data, $password) {
  // Generate a cryptographically secure random salt using random_bytes()
  $salt = random_bytes(16);

        $salted = '';
        $dx = '';
        // Salt the key(32) and iv(16) = 48
        while (strlen($salted) &lt; 48) {
          $dx = hash('sha256', $dx.$password.$salt, true);
          $salted .= $dx;
        }

        $key = substr($salted, 0, 32);
        $iv  = substr($salted, 32,16);

        $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, true, $iv);
        return base64_encode($salt . $encrypted_data);

    }

class EncryptedSessionHandler extends SessionHandler
{
private $key;

    public function __construct($key)
    {
        $this-&gt;key = $key;
    }

    public function read($id)
    {
        $data = parent::read($id);

        if (!$data) {
            return "";
        } else {
            return decrypt($data, $this-&gt;key);
        }
    }

    public function write($id, $data)
    {
        $data = encrypt($data, $this-&gt;key);

        return parent::write($id, $data);
    }

}

// interceptaremos el manejador nativo 'files', pero funcionaría igualmente
// con otros manejadores nativos internos como 'sqlite', 'memcache' o 'memcached'
// que son proporcionados por extensiones de PHP.
ini_set('session.save_handler', 'files');

$key = 'secret_string';
$handler = new EncryptedSessionHandler($key);
session_set_save_handler($handler, true);
session_start();

// proceder para establecer y recuperar valores por clave desde $\_SESSION

**Nota**:

     Ya que los métodos de esta clase están diseñados para se llamados internamente por PHP como parte del flujo de trabajo normal,
     las llamadas de las clases hijas a los métodos padre (es decir, los gestores nativos internos reales) devolverán **[false](#constant.false)** a menos que
     la sesión haya sido iniciada realmente (automáticamente o explícitamente mediante [session_start()](#function.session-start)).
     Es importante considerar esto cuando se escriben unidades de pruebas donde los métodos de la clase podrían ser invocados manualmente.

# SessionHandler::close

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandler::close — Cerrar la sesión

### Descripción

public **SessionHandler::close**(): [bool](#language.types.boolean)

Cierra la sesión actual. Este método es ejecutado de forma automática internamente por PHP al
cerrar la sesión, o explícitamente mediante la función [session_write_close()](#function.session-write-close) (la cual
llama primero a la función [SessionHandler::write()](#sessionhandler.write)).

Este método envuelve el gestor de almacenamiento interno de PHP definido en el
ajuste ini [session.save_handler](#ini.session.save-handler) que fue establecido
antes de que este gestor fuese activado mediante [session_set_save_handler()](#function.session-set-save-handler).

Si esta clase se extiende por herencia, al llamar al método padre close invocará a la
envoltura para este método y así invocará a la llamada de retorno interna asociada. Esto permite que el método sea
sobrescrito y/o interceptado.

Para más información sobre lo que se espera que haga este método, consulte la documentación de
[SessionHandlerInterface::close()](#sessionhandlerinterface.close).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

# SessionHandler::create_sid

(PHP 5 &gt;= 5.5.1, PHP 7, PHP 8)

SessionHandler::create_sid — Devuelve un nuevo ID de sesión

### Descripción

public **SessionHandler::create_sid**(): [string](#language.types.string)

Genera y devuelve un nuevo ID de sesión

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un ID de sesión válido para el manejador de sesión predeterminado.

### Ver también

    - [session_id()](#function.session-id) - Lee y/o modifica el identificador de sesión actual

    - [session_create_id()](#function.session-create-id) - Crear un nuevo ID de sesión

# SessionHandler::destroy

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandler::destroy — Destruir una sesión

### Descripción

public **SessionHandler::destroy**([string](#language.types.string) $id): [bool](#language.types.boolean)

Destruye una sesión. Llamado internamente por PHP con [session_regenerate_id()](#function.session-regenerate-id) (se asume
que $destroy está establecido a **[true](#constant.true)**, mediante [session_destroy()](#function.session-destroy) o cuando
[session_decode()](#function.session-decode) falla.

Este método envuelve el gestor de almacenamiento interno de PHP definido en el
ajuste ini [session.save_handler](#ini.session.save-handler) que fue establecido
antes de que este gestor fuese establecido mediante [session_set_save_handler()](#function.session-set-save-handler).

Si esta clase se extiende por herencia, al llamar al método padre destroy invocará a la
envoltura para este método y así invocará a la llamada de retorno interna asociada. Esto permite que este método sea
sobrescrito y/o interceptado y filtrado.

Para más información sobre lo que se espera que haga este método, consulte la documentación
de [SessionHandlerInterface::destroy()](#sessionhandlerinterface.destroy).

### Parámetros

     id


       El ID de sesión a ser destruido.





### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

# SessionHandler::gc

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandler::gc — Limpia las sesiones antiguas

### Descripción

public **SessionHandler::gc**([int](#language.types.integer) $max_lifetime): [int](#language.types.integer)|[false](#language.types.singleton)

Limpia las sesiones expiradas. Se llama aleatoriamente en el interior de PHP cuando una
sesión comienza o cuando se llama a la función [session_start()](#function.session-start).
La frecuencia de llamada se basa en las directivas de configuración
[session.gc_divisor](#ini.session.gc-divisor) y
[session.gc_probability](#ini.session.gc-probability).

Este método reemplaza al gestor interno de almacenamiento de PHP definido a través de la opción
de configuración [session.save_handler](#ini.session.save-handler)
que se ha definido antes de que este último se defina a través de la función
[session_set_save_handler()](#function.session-set-save-handler).

Si esta clase se extiende por herencia, la llamada al método padre gc
invocará el envoltorio para este método, pero también invocará internamente la función de devolución de llamada
asociada. Este comportamiento permite que este método se sobreescriba o bien se intercepte y filtre.

Para más información sobre lo esperado de este método, consulte la documentación
sobre la función [SessionHandlerInterface::gc()](#sessionhandlerinterface.gc).

### Parámetros

    max_lifetime


      Las sesiones que no se hayan actualizado durante las últimas
      max_lifetime segundos serán eliminadas.


### Valores devueltos

Devuelve el número de sesiones eliminadas en caso de éxito, o **[false](#constant.false)** si ocurre un error.
Nota que este valor se devuelve internamente a PHP para su procesamiento.

### Historial de cambios

      Versión
      Descripción






      7.1.0

       Antes de esta versión, esta función devolvía **[true](#constant.true)** en caso de éxito.



# SessionHandler::open

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandler::open — Inicializar una sesión

### Descripción

public **SessionHandler::open**([string](#language.types.string) $path, [string](#language.types.string) $name): [bool](#language.types.boolean)

Crea una nueva sesión, o reinicializa una sesión existente. Es llamado internamente por PHP cuando
se inicia una sesión automáticamente o cuando se invoca a [session_start()](#function.session-start).

Este método envuelve el gestor de almacenamiento interno de PHP definido en el
ajuste ini [session.save_handler](#ini.session.save-handler) que fue establecido
antes de que este gestor fuese establecido mediante [session_set_save_handler()](#function.session-set-save-handler).

Si esta clase se extiende por herencia, al llamar al método padre open invocará a la
envoltura para este método y así invocará a la llamada de retorno interna asociada. Esto permite que este método sea
sobrescrito y/o interceptado.

Para más información sobre lo que puede hacer este método, consulte la documentación de
[SessionHandlerInterface::open()](#sessionhandlerinterface.open).

### Parámetros

    path


      La ruta donde almacenar/recuperar la sesión.






    name


      El nombre de la sesión.


### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

### Ver también

    -
     La directiva de configuración
     [session.auto-start](#ini.session.auto-start).

# SessionHandler::read

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandler::read — Leer información de la sesión

### Descripción

public **SessionHandler::read**([string](#language.types.string) $id): [string](#language.types.string)|[false](#language.types.singleton)

Lee la información de la sesión desde el almacén de sesiones, y devuelve los resultados a PHP para su procesamiento interno.
Este método es llamado automáticamente por PHP cuando se inicia una sesión (automáticamente o explícitamente
con [session_start()](#function.session-start)) y está precedido por una llamada interna a la función
[SessionHandler::open()](#sessionhandler.open).

Este método envuelve el gestor de almacenamiento interno de PHP definido en el
ajuste ini [session.save_handler](#ini.session.save-handler) que fue establecido
antes de que este gestor fuese establecido mediante [session_set_save_handler()](#function.session-set-save-handler).

Si esta clase se extiende por herencia, al llamar al método padre read invocará a la
envoltura para este método y así invocará a la llamada de retorno interna asociada. Esto permite que el método sea
sobrescrito y/o interceptado y filtrado (por ejemplo, desencriptando el valor de $data
devuelto por el método padre read).

Para más información sobre lo que se espera que haga este método, consulte la documentación de
[SessionHandlerInterface::close()](#sessionhandlerinterface.close).

### Parámetros

    id


      El id de sesión de donde leer la información.


### Valores devueltos

Devuelve una cadena codificada de la información leída. Si no se leyó nada, debe devolver **[false](#constant.false)**. Observe que este valor es devuelto internamente a PHP para su procesamiento.

### Ver también

    -
     La directiva de configuración
     [session.serialize_handler](#ini.session.serialize-handler).

# SessionHandler::write

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandler::write — Escribir información de sesión

### Descripción

public **SessionHandler::write**([string](#language.types.string) $id, [string](#language.types.string) $data): [bool](#language.types.boolean)

Escribe la información de la sesión en el almacén de sesiones. Es llamado por el cierre normal de PHP, por
[session_write_close()](#function.session-write-close), o cuando [session_register_shutdown()](#function.session-register-shutdown) falla.
PHP llamará a [SessionHandler::close()](#sessionhandler.close) inmediatamente después de que este método devuelva.

Este método envuelve el gestor de almacenamiento interno de PHP definido en el
ajuste ini [session.save_handler](#ini.session.save-handler) que fue establecido
antes de que este gestor fuese establecido mediante [session_set_save_handler()](#function.session-set-save-handler).

Si esta clase se extiende por herencia, al llamar al método padre write invocará a la
envoltura para este método y así invocará a la llamada de retorno interna asociada. Esto permite que este método sea
sobrescrito y/o interceptado y filtrado (por ejemplo, encriptando el valor de $data
antes de enviarlo al método padre write).

Para más información sobre lo que se espera que haga este método, consulte la documentación de
[SessionHandlerInterface::write()](#sessionhandlerinterface.write).

### Parámetros

    id


      El id de la sesión.






    data


      La información de sesión codificada. Esta información es el resultado de codificar internamente la variable superglobal [$_SESSION](#reserved.variables.session) a una cadena
      serializada y pasarla como este parámetro. Observe que las sesiones usan un método de serialización alternativo.


### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

### Ver también

    -
     La directiva de configuración
     [session.serialize_handler](#ini.session.serialize-handler).

## Tabla de contenidos

- [SessionHandler::close](#sessionhandler.close) — Cerrar la sesión
- [SessionHandler::create_sid](#sessionhandler.create-sid) — Devuelve un nuevo ID de sesión
- [SessionHandler::destroy](#sessionhandler.destroy) — Destruir una sesión
- [SessionHandler::gc](#sessionhandler.gc) — Limpia las sesiones antiguas
- [SessionHandler::open](#sessionhandler.open) — Inicializar una sesión
- [SessionHandler::read](#sessionhandler.read) — Leer información de la sesión
- [SessionHandler::write](#sessionhandler.write) — Escribir información de sesión

# La clase SessionHandlerInterface

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

    **SessionHandlerInterface** es una interfaz que define un
    prototipo para crear un gestor de sesiones personalizado. Para pasar un gestor de
    sesiones personalizado a [session_set_save_handler()](#function.session-set-save-handler) usando su
    invocación de POO, la clase debe implementar esta interfaz.




    Observe que los métodos de llamada de retorno de esta clase están diseñados para ser llamados internamente por
    PHP y no para ser llamados desde código de espacio de usuario.

## Sinopsis de la Interfaz

     interface **SessionHandlerInterface** {

    /* Métodos */

public [close](#sessionhandlerinterface.close)(): [bool](#language.types.boolean)
public [destroy](#sessionhandlerinterface.destroy)([string](#language.types.string) $id): [bool](#language.types.boolean)
public [gc](#sessionhandlerinterface.gc)([int](#language.types.integer) $max_lifetime): [int](#language.types.integer)|[false](#language.types.singleton)
public [open](#sessionhandlerinterface.open)([string](#language.types.string) $path, [string](#language.types.string) $name): [bool](#language.types.boolean)
public [read](#sessionhandlerinterface.read)([string](#language.types.string) $id): [string](#language.types.string)|[false](#language.types.singleton)
public [write](#sessionhandlerinterface.write)([string](#language.types.string) $id, [string](#language.types.string) $data): [bool](#language.types.boolean)

}

## Ejemplos

    **Ejemplo #1
     Ejemplo usando SessionHandlerInterface**




     El siguiente ejemplo proporciona almacenamiento de sesiones basado en ficheros similar al
     gestor de almacenamiento de sesiones predeterminado de PHP files. Este
     ejemplo podría fácilmente ser extendido para cubrir almacenamiento de bases de datos usando su
     motor de bases de datos favorito soportado por PHP.




     Observe que usamos el prototipo de POO con [session_set_save_handler()](#function.session-set-save-handler) y
     registramos la función de cierre usando la bandera de parámetro de la función. Esto normalmente es
     aconsejable al registrar objetos como gestores de almacenamiento de sesiones.



    **Precaución**

      Por razones de brevedad, este ejemplo omite la validación de entradas. Sin embargo,
      los parámetros $id son en realidad valores suministrados por el usuario
      que requieren una validación/sanitización adecuada para evitar vulnerabilidades, como
      problemas de recorrido o cruce en la ruta de acceso. *Así que no utilice este ejemplo
      sin modificar en entornos de producción.*


&lt;?php
class MySessionHandler implements SessionHandlerInterface
{
private $savePath;

    public function open($savePath, $sessionName): bool
    {
        $this-&gt;savePath = $savePath;
        if (!is_dir($this-&gt;savePath)) {
            mkdir($this-&gt;savePath, 0777);
        }

        return true;
    }

    public function close(): bool
    {
        return true;
    }

    #[\ReturnTypeWillChange]
    public function read($id)
    {
        return (string) @file_get_contents("$this-&gt;savePath/sess_$id");
    }

    public function write($id, $data): bool
    {
        return file_put_contents("$this-&gt;savePath/sess_$id", $data) === false ? false : true;
    }

    public function destroy($id): bool
    {
        $file = "$this-&gt;savePath/sess_$id";
        if (file_exists($file)) {
            unlink($file);
        }

        return true;
    }

    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
    {
        foreach (glob("$this-&gt;savePath/sess_*") as $file) {
            if (filemtime($file) + $maxlifetime &lt; time() &amp;&amp; file_exists($file)) {
                unlink($file);
            }
        }

        return true;
    }

}

$handler = new MySessionHandler();
session_set_save_handler($handler, true);
session_start();

// proceed to set and retrieve values by key from $\_SESSION

# SessionHandlerInterface::close

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandlerInterface::close — Cerrar la sesión

### Descripción

public **SessionHandlerInterface::close**(): [bool](#language.types.boolean)

Cierra la sesión actual. Esta función se ejecuta automáticamente al
cerrar la sesión, o explícitamente mediante [session_write_close()](#function.session-write-close).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

# SessionHandlerInterface::destroy

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandlerInterface::destroy — Destruir una sesión

### Descripción

public **SessionHandlerInterface::destroy**([string](#language.types.string) $id): [bool](#language.types.boolean)

Destruye una sesión. Llamado por [session_regenerate_id()](#function.session-regenerate-id) (con $destroy = **[true](#constant.true)**),
[session_destroy()](#function.session-destroy) y cuando [session_decode()](#function.session-decode) falla.

### Parámetros

     id


       El ID de sesión a ser destruido.





### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

# SessionHandlerInterface::gc

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandlerInterface::gc — Limpia las sesiones antiguas

### Descripción

public **SessionHandlerInterface::gc**([int](#language.types.integer) $max_lifetime): [int](#language.types.integer)|[false](#language.types.singleton)

Limpia las sesiones antiguas expiradas. Es llamada por [session_start()](#function.session-start),
en función de [session.gc_divisor](#ini.session.gc-divisor),
[session.gc_probability](#ini.session.gc-probability) y
[session.gc_maxlifetime](#ini.session.gc-maxlifetime).

### Parámetros

    max_lifetime


      Las sesiones que no han sido actualizadas durante las últimas max_lifetime segundos serán eliminadas.


### Valores devueltos

Devuelve el número de sesiones eliminadas en caso de éxito, o **[false](#constant.false)** si ocurre un error.
Nota que este valor se devuelve internamente a PHP para su procesamiento.

### Historial de cambios

      Versión
      Descripción






      7.1.0

       Antes de esta versión, la función devolvía **[true](#constant.true)** en caso de éxito.



# SessionHandlerInterface::open

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandlerInterface::open — Inicializar una sesión

### Descripción

public **SessionHandlerInterface::open**([string](#language.types.string) $path, [string](#language.types.string) $name): [bool](#language.types.boolean)

Reinicializa una sesión existente, o crea una nueva. Llamado cuando una sesión se inicia o cuando
se invoca a [session_start()](#function.session-start).

### Parámetros

    path


      La ruta donde almacenar/recuperar la sesión.






    name


      El nombre de la sesión.


### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

### Ver también

    - [session_name()](#function.session-name) - Lee y/o modifica el nombre de la sesión

    -
     La directiva de configuración
     [session.auto-start](#ini.session.auto-start).

# SessionHandlerInterface::read

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandlerInterface::read — Leer información de sesión

### Descripción

public **SessionHandlerInterface::read**([string](#language.types.string) $id): [string](#language.types.string)|[false](#language.types.singleton)

Lee la información de sesión desde el almacenamiento de sesiones, y devuelve el resultado.
Llamado justo después de iniciarse una sesión o cuando es llamada [session_start()](#function.session-start).
Observe que antes de que este método sea llamado [SessionHandlerInterface::open()](#sessionhandlerinterface.open) es invocado.

Este método es llmado por PHP cuando la sesión es iniciada.
Este método debería recuperar la información de sesión desde el almacenamiento mediante el
ID de sesión proporcionado. La cadena devuelta por este método debe estar en el mismo
formato serializado que el orgibal pasado a [SessionHandlerInterface::write()](#sessionhandlerinterface.write)
Si no se encuentra el registro, devuelve **[false](#constant.false)**.

La información devuelta por este método será decodificada internamente por PHP usando el
método de deserialización especificado en [session.serialize_handler](#ini.session.serialize-handler).
La información resultante será usada para rellenar la variable superglobal [$\_SESSION](#reserved.variables.session).

Observe que el esquema de serialización no es el mismo que [unserialize()](#function.unserialize)
y pudede accederse a él mediante [session_decode()](#function.session-decode).

### Parámetros

    id


      El ID de sesión.


### Valores devueltos

Devuelve una cadena codificada de la información leída. Si no se leyó nada, debe devolver **[false](#constant.false)**. Observe que este valor es devuelto internamente por PHP para procesamiento.

### Ver también

    -
     La directiva de configuración
     [session.serialize_handler](#ini.session.serialize-handler).

# SessionHandlerInterface::write

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SessionHandlerInterface::write — Escribir información de sesión

### Descripción

public **SessionHandlerInterface::write**([string](#language.types.string) $id, [string](#language.types.string) $data): [bool](#language.types.boolean)

Escribe información de sesión al almacenamiento de sesiones. Llamado por
[session_write_close()](#function.session-write-close), cuando [session_register_shutdown()](#function.session-register-shutdown) falla, o durante un cierre normal.
Nota: [SessionHandlerInterface::close()](#sessionhandlerinterface.close) es llamado inmediantamente después de esta función.

PHP llamará a este método cuando la sesión esté lista para ser almacenada y cerrada. Codifica
la información de sesión desde la variable superglobal [$\_SESSION](#reserved.variables.session) a una cadena serializada y la pasa
junto con el ID de sersión a este método para el almacenamiento. El método de serialización usado
está especificado en la configuración [session.serialize_handler](#ini.session.serialize-handler).

Observe que este método normalmente es llamado por PHP después de que los buffers de salida hayan sido cerrados a menos que se llame
explícitamente a [session_write_close()](#function.session-write-close)

### Parámetros

    id


      El ID de sesión.






    data


      La información de sesión codificada. Esta información es el resultado de que PHP codifique internamente la variable supergobal [$_SESSION](#reserved.variables.session) a una cadena
      serializada y pasarla a este parámetro. Observe que las sesiones usan un método de serialización alternativo.


### Valores devueltos

El valor devuelto (habitualmente **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error).
Tenga en cuenta que este valor es devuelto internamente a PHP para análisis.

### Ver también

    -
     La directiva de configuración
     [session.serialize_handler](#ini.session.serialize-handler).

## Tabla de contenidos

- [SessionHandlerInterface::close](#sessionhandlerinterface.close) — Cerrar la sesión
- [SessionHandlerInterface::destroy](#sessionhandlerinterface.destroy) — Destruir una sesión
- [SessionHandlerInterface::gc](#sessionhandlerinterface.gc) — Limpia las sesiones antiguas
- [SessionHandlerInterface::open](#sessionhandlerinterface.open) — Inicializar una sesión
- [SessionHandlerInterface::read](#sessionhandlerinterface.read) — Leer información de sesión
- [SessionHandlerInterface::write](#sessionhandlerinterface.write) — Escribir información de sesión

# La interfaz SessionIdInterface

(PHP 5 &gt;= 5.5.1, PHP 7, PHP 8)

## Introducción

    **SessionIdInterface** es una interfaz que define
    métodos opcionales para la creación de un gestor
    de sesión personalizado. Con el fin de pasar un gestor
    de sesión personalizado a la función [session_set_save_handler()](#function.session-set-save-handler)
    utilizando su invocación OOP, la clase puede implementar
    esta interfaz.




    Se debe tener en cuenta que estos métodos están destinados a ser llamados de manera interna por PHP, y no
    desde el espacio de usuario.

## Sinopsis de la Interfaz

     interface **SessionIdInterface** {

    /* Métodos */

public [create_sid](#sessionidinterface.create-sid)(): [string](#language.types.string)

}

# SessionIdInterface::create_sid

(PHP 5 &gt;= 5.5.1, PHP 7, PHP 8)

SessionIdInterface::create_sid — Crear un ID de sesión

### Descripción

public **SessionIdInterface::create_sid**(): [string](#language.types.string)

Crea un nuevo ID de sesión. Esta función se ejecuta automáticamente
cuando debe crearse un nuevo ID de sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nuevo ID de sesión.
Cabe señalar que este valor se devuelve internamente a PHP para su
procesamiento.

### Ver también

    - [SessionHandler::create_sid()](#sessionhandler.create-sid) - Devuelve un nuevo ID de sesión

## Tabla de contenidos

- [SessionIdInterface::create_sid](#sessionidinterface.create-sid) — Crear un ID de sesión

# La interfaz SessionUpdateTimestampHandlerInterface

(PHP 7, PHP 8)

## Introducción

    **SessionUpdateTimestampHandlerInterface** es una interfaz que define
    métodos opcionales para la creación de un gestor
    de sesión personalizado. Con el fin de pasar un gestor
    de sesión personalizado a la función [session_set_save_handler()](#function.session-set-save-handler)
    utilizando su invocación OOP, la clase puede implementar
    esta interfaz.




    Se debe tener en cuenta que estos métodos están destinados a ser llamados de manera interna por PHP, y no
    desde el espacio de usuario.

## Sinopsis de la Clase

     interface **SessionUpdateTimestampHandlerInterface** {

    /* Métodos */

public [updateTimestamp](#sessionupdatetimestamphandlerinterface.updatetimestamp)([string](#language.types.string) $id, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [validateId](#sessionupdatetimestamphandlerinterface.validateid)([string](#language.types.string) $id): [bool](#language.types.boolean)

}

# SessionUpdateTimestampHandlerInterface::updateTimestamp

(PHP 7, PHP 8)

SessionUpdateTimestampHandlerInterface::updateTimestamp — Actualizar la marca de tiempo

### Descripción

public **SessionUpdateTimestampHandlerInterface::updateTimestamp**([string](#language.types.string) $id, [string](#language.types.string) $data): [bool](#language.types.boolean)

Actualiza la marca de tiempo de última modificación de la sesión.
Esta función se ejecuta automáticamente cuando una sesión es actualizada.

### Parámetros

    id


      El ID de sesión.






    data


      Los datos de sesión.


### Valores devueltos

Devuelve **[true](#constant.true)** si la marca de tiempo ha sido actualizada, **[false](#constant.false)** en caso contrario.
Se debe tener en cuenta que este valor es devuelto internamente a PHP para su
procesamiento.

# SessionUpdateTimestampHandlerInterface::validateId

(PHP 7, PHP 8)

SessionUpdateTimestampHandlerInterface::validateId — Validar el ID

### Descripción

public **SessionUpdateTimestampHandlerInterface::validateId**([string](#language.types.string) $id): [bool](#language.types.boolean)

Valida un ID de sesión dado. Un ID de sesión es válido, si una sesión
con este ID ya existe.
Esta función se ejecuta automáticamente cuando se inicia una sesión, se
proporciona un ID de sesión y
[session.use_strict_mode](#ini.session.use-strict-mode)
está activado.

### Parámetros

    id


      El ID de sesión


### Valores devueltos

Devuelve **[true](#constant.true)** para un ID válido, **[false](#constant.false)** en caso contrario.
Se debe tener en cuenta que este valor se devuelve internamente a PHP para su
procesamiento.

## Tabla de contenidos

- [SessionUpdateTimestampHandlerInterface::updateTimestamp](#sessionupdatetimestamphandlerinterface.updatetimestamp) — Actualizar la marca de tiempo
- [SessionUpdateTimestampHandlerInterface::validateId](#sessionupdatetimestamphandlerinterface.validateid) — Validar el ID

- [Introducción](#intro.session)
- [Instalación/Configuración](#session.setup)<li>[Requerimientos](#session.requirements)
- [Instalación](#session.installation)
- [Configuración en tiempo de ejecución](#session.configuration)
  </li>- [Constantes predefinidas](#session.constants)
- [Ejemplos](#session.examples)<li>[Uso básico](#session.examples.basic)
- [Pasar el identificador de sesión (session ID)](#session.idpassing)
- [Gestión personalizada de sesiones](#session.customhandler)
  </li>- [Progresión de una subida (upload) en sesión](#session.upload-progress)
- [Sesiones y Seguridad](#session.security)<li>[Gestión básica de sesiones](#features.session.security.management)
- [Seguridad de las configuraciones INI de sesión](#session.security.ini)
  </li>- [Funciones de sesión](#ref.session)<li>[session_abort](#function.session-abort) — Interrumpe los cambios en el array de sesión y finaliza la sesión
- [session_cache_expire](#function.session-cache-expire) — Obtiene y/o define el tiempo de expiración de la caché
- [session_cache_limiter](#function.session-cache-limiter) — Lee y/o modifica el limitador de caché de sesión
- [session_commit](#function.session-commit) — Alias de session_write_close
- [session_create_id](#function.session-create-id) — Crear un nuevo ID de sesión
- [session_decode](#function.session-decode) — Decodifica la información de sesión desde una cadena de sesión codificada
- [session_destroy](#function.session-destroy) — Destruye una sesión
- [session_encode](#function.session-encode) — Codifica los datos de sesión
- [session_gc](#function.session-gc) — Ejecuta la recolección de basura de los datos de sesión
- [session_get_cookie_params](#function.session-get-cookie-params) — Lee la configuración del cookie de sesión
- [session_id](#function.session-id) — Lee y/o modifica el identificador de sesión actual
- [session_module_name](#function.session-module-name) — Lee y/o modifica el módulo de sesión actual
- [session_name](#function.session-name) — Lee y/o modifica el nombre de la sesión
- [session_regenerate_id](#function.session-regenerate-id) — Reemplaza el identificador de sesión actual por uno nuevo
- [session_register_shutdown](#function.session-register-shutdown) — Función de cierre de sesiones
- [session_reset](#function.session-reset) — Restablece el array de sesión con los valores originales
- [session_save_path](#function.session-save-path) — Lee y/o modifica la ruta de guardado de las sesiones
- [session_set_cookie_params](#function.session-set-cookie-params) — Modifica los parámetros de la cookie de sesión
- [session_set_save_handler](#function.session-set-save-handler) — Configura las funciones de almacenamiento de sesiones
- [session_start](#function.session-start) — Inicia una nueva sesión o reanuda una sesión existente
- [session_status](#function.session-status) — Determina el estado de la sesión actual
- [session_unset](#function.session-unset) — Destruye todas las variables de una sesión
- [session_write_close](#function.session-write-close) — Escribe los datos de sesión y cierra la sesión
  </li>- [SessionHandler](#class.sessionhandler) — La clase SessionHandler<li>[SessionHandler::close](#sessionhandler.close) — Cerrar la sesión
- [SessionHandler::create_sid](#sessionhandler.create-sid) — Devuelve un nuevo ID de sesión
- [SessionHandler::destroy](#sessionhandler.destroy) — Destruir una sesión
- [SessionHandler::gc](#sessionhandler.gc) — Limpia las sesiones antiguas
- [SessionHandler::open](#sessionhandler.open) — Inicializar una sesión
- [SessionHandler::read](#sessionhandler.read) — Leer información de la sesión
- [SessionHandler::write](#sessionhandler.write) — Escribir información de sesión
  </li>- [SessionHandlerInterface](#class.sessionhandlerinterface) — La clase SessionHandlerInterface<li>[SessionHandlerInterface::close](#sessionhandlerinterface.close) — Cerrar la sesión
- [SessionHandlerInterface::destroy](#sessionhandlerinterface.destroy) — Destruir una sesión
- [SessionHandlerInterface::gc](#sessionhandlerinterface.gc) — Limpia las sesiones antiguas
- [SessionHandlerInterface::open](#sessionhandlerinterface.open) — Inicializar una sesión
- [SessionHandlerInterface::read](#sessionhandlerinterface.read) — Leer información de sesión
- [SessionHandlerInterface::write](#sessionhandlerinterface.write) — Escribir información de sesión
  </li>- [SessionIdInterface](#class.sessionidinterface) — La interfaz SessionIdInterface<li>[SessionIdInterface::create_sid](#sessionidinterface.create-sid) — Crear un ID de sesión
  </li>- [SessionUpdateTimestampHandlerInterface](#class.sessionupdatetimestamphandlerinterface) — La interfaz SessionUpdateTimestampHandlerInterface<li>[SessionUpdateTimestampHandlerInterface::updateTimestamp](#sessionupdatetimestamphandlerinterface.updatetimestamp) — Actualizar la marca de tiempo
- [SessionUpdateTimestampHandlerInterface::validateId](#sessionupdatetimestamphandlerinterface.validateid) — Validar el ID
  </li>
