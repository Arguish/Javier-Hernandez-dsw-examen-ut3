# Bufferización de salida

# Introducción

Las funciones de bufferización de salida permiten controlar
cuándo los datos son enviados por el script. Esto puede
ser útil en ciertas situaciones, especialmente si se deben
enviar encabezados al navegador después de haber enviado
datos. Estas funciones no afectan a los encabezados
enviados por la función [header()](#function.header) o a las
cookies enviadas por [setcookie()](#function.setcookie). Solo las
funciones como [echo](#function.echo)
y los datos entre bloques PHP son afectados.

# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#outcontrol.configuration)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de los buffers de salida**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [output_buffering](#ini.output-buffering)
     "0"
     **[INI_PERDIR](#constant.ini-perdir)**
      



     [output_handler](#ini.output-handler)
     **[null](#constant.null)**
     **[INI_PERDIR](#constant.ini-perdir)**
      



     [implicit_flush](#ini.implicit-flush)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [url_rewriter.tags](#ini.url-rewriter.tags)
     "form="
     **[INI_ALL](#constant.ini-all)**

      A partir de PHP 7.1.0, este parámetro INI solo tiene efecto en
      [output_add_rewrite_var()](#function.output-add-rewrite-var).
      Anterior a PHP 7.1.0, este parámetro INI activaba el soporte transparente
      del ID de sesión (ver [session.trans_sid_tags](#ini.session.trans-sid-tags)).




     [url_rewriter.hosts](#ini.url-rewriter.hosts)
     $_SERVER['HTTP_HOST'] se utiliza por omisión.
     **[INI_ALL](#constant.ini-all)**
     Disponible a partir de PHP 7.1.0

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    output_buffering
    [bool](#language.types.boolean)/[int](#language.types.integer)



     La memoria intermedia de la salida para todos los ficheros puede ser activada
     al definir esta directiva en "On".
     Para limitar el tamaño del buffer, un número/cantidad correspondiente al
     número máximo de bytes permitidos puede ser utilizado en lugar de
     "On" para el valor de esta directiva.
     Por ejemplo, output_buffering=4096.








    output_handler
    [string](#language.types.string)



     La salida de los scripts puede ser redirigida hacia una función.
     Por ejemplo, al definir output_handler
     en [mb_output_handler()](#function.mb-output-handler), la codificación de los caracteres será
     convertida de manera transparente hacia la codificación especificada.
     La configuración de cualquier manejador de salida activa
     automáticamente la memoria intermedia de la salida.



    **Nota**:



      [mb_output_handler()](#function.mb-output-handler) y
      [ob_iconv_handler()](#function.ob-iconv-handler) no pueden ser utilizados juntos,
      y [ob_gzhandler()](#function.ob-gzhandler) y
      [zlib.output_compression](#ini.zlib.output-compression)
      no pueden ser utilizados con alguno de los siguientes elementos:
      [mb_output_handler()](#function.mb-output-handler),
      [ob_gzhandler()](#function.ob-gzhandler),
      [zlib.output_compression](#ini.zlib.output-compression),
      el manejador 'URL-Rewriter'
      (ver [session.use_trans_sid](#ini.session.use-trans-sid)
      y [output_add_rewrite_var()](#function.output-add-rewrite-var)).




    **Nota**:



      Solo las funciones internas pueden ser utilizadas con esta directiva.
      Para las funciones de usuario, utilice [ob_start()](#function.ob-start).









    implicit_flush
    [bool](#language.types.boolean)



     **[false](#constant.false)** por omisión. Al cambiar este valor a **[true](#constant.true)** se indica
     a PHP que el buffer de salida debe ser vaciado automáticamente después
     de cada función de visualización. Esto equivale a llamar a la función
     [flush()](#function.flush) después de cada llamada a
     cualquier función que produzca una salida (como
     [print](#function.print) o [echo](#function.echo))
     y cada bloque HTML.




     Cuando se utiliza PHP en un entorno web, activar esta
     opción tiene serias implicaciones y generalmente solo se recomienda
     para depuración. Este valor está por omisión en **[true](#constant.true)** cuando PHP
     funciona en modo CLI SAPI.




     Ver también
     [ob_implicit_flush()](#function.ob-implicit-flush).








     url_rewriter.tags
     [string](#language.types.string)



      url_rewriter.tags especifica las etiquetas HTML y los atributos
      en los cuales las URLs son reescritas por los valores de
      [output_add_rewrite_var()](#function.output-add-rewrite-var). Por omisión, es "form=".


      Añadir "form=" o cualquier atributo form
      añadirá un elemento input oculto en el form
      con un atributo de nombre y valor para cada par nombre-valor pasado a
      [output_add_rewrite_var()](#function.output-add-rewrite-var).

     **Precaución**

       Añadir la misma etiqueta más de una vez a url_rewriter.tags
       utilizará únicamente la primera ocurrencia durante el proceso de reescritura de URL.




     **Nota**:

       Anterior a PHP 7.1.0, [url_rewriter.tags](#ini.url-rewriter.tags)
       era utilizado para especificar
       [session.trans_sid_tags](#ini.session.trans-sid-tags).









     url_rewriter.hosts
     [string](#language.types.string)



      url_rewriter.hosts especifica los hosts que son reescritos
      para incluir los valores de la función
      [output_add_rewrite_var()](#function.output-add-rewrite-var).
      Por omisión $_SERVER['HTTP_HOST']. Varios
      hosts pueden ser especificados separados por una coma, no se permite ningún espacio
      entre los hosts. Por ejemplo:
      php.net,wiki.php.net,bugs.php.net


# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

**Indicadores de estado transmitidos al controlador de salida**

Los siguientes indicadores son transmitidos al segundo parámetro (phase) del controlador de salida definido por
[ob_start()](#function.ob-start) en forma de máscara de bits:

    **[PHP_OUTPUT_HANDLER_START](#constant.php-output-handler-start)**
     ([int](#language.types.integer))



     Indica que el almacenamiento en búfer de salida ha comenzado.







    **[PHP_OUTPUT_HANDLER_WRITE](#constant.php-output-handler-write)**
     ([int](#language.types.integer))



     Indica que el búfer de salida ha comenzado a
     ser mostrado y contiene datos.







    **[PHP_OUTPUT_HANDLER_FLUSH](#constant.php-output-handler-flush)**
     ([int](#language.types.integer))



     Indica que el búfer ha sido mostrado.







    **[PHP_OUTPUT_HANDLER_CLEAN](#constant.php-output-handler-clean)**
     ([int](#language.types.integer))



     Indica que el búfer de salida ha sido limpiado.







    **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**
     ([int](#language.types.integer))



     Indica que es la operación final de almacenamiento en búfer de salida.







    **[PHP_OUTPUT_HANDLER_CONT](#constant.php-output-handler-cont)**
     ([int](#language.types.integer))



     Indica que el búfer ha sido mostrado, pero el almacenamiento en búfer de salida continúa.




     Es un alias de la constante
     **[PHP_OUTPUT_HANDLER_WRITE](#constant.php-output-handler-write)**.







    **[PHP_OUTPUT_HANDLER_END](#constant.php-output-handler-end)**
     ([int](#language.types.integer))



     Indica que el almacenamiento en búfer de salida ha finalizado.




     Es un alias de la constante
     **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**.

**Indicadores de control del búfer de salida**

    Los siguientes indicadores pueden ser transmitidos al tercer parámetro (flags) del controlador de salida definido por
    [ob_start()](#function.ob-start) en forma de máscara de bits:





    **[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)**
     ([int](#language.types.integer))



     Controla si un búfer de salida creado por la función
     [ob_start()](#function.ob-start) puede ser eliminado
     por [ob_clean()](#function.ob-clean).
     Este indicador no controla el comportamiento de
     [ob_end_clean()](#function.ob-end-clean) o [ob_get_clean()](#function.ob-get-clean).







    **[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)**
     ([int](#language.types.integer))



     Controla si un búfer de salida creado por la función
     [ob_start()](#function.ob-start) puede ser enviado a la salida estándar
     por [ob_flush()](#function.ob-flush).
     Este indicador no controla el comportamiento de
     [ob_end_flush()](#function.ob-end-flush) o [ob_get_flush()](#function.ob-get-flush).







    **[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**
     ([int](#language.types.integer))



     Controla si un búfer de salida creado por la función
     [ob_start()](#function.ob-start) puede ser eliminado antes del final
     del script o durante la llamada a [ob_end_clean()](#function.ob-end-clean),
     [ob_end_flush()](#function.ob-end-flush), [ob_get_clean()](#function.ob-get-clean) o [ob_get_flush()](#function.ob-get-flush).







    **[PHP_OUTPUT_HANDLER_STDFLAGS](#constant.php-output-handler-stdflags)**
     ([int](#language.types.integer))



     El conjunto por defecto de indicadores para el búfer de salida;
     actualmente, equivalente a
     **[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)** |
     **[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)** |
     **[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**.

**Indicadores de estado del controlador de salida**

Los siguientes indicadores forman parte de la máscara de bits flags
devuelta por [ob_get_status()](#function.ob-get-status):

    **[PHP_OUTPUT_HANDLER_STARTED](#constant.php-output-handler-started)**
    ([int](#language.types.integer))



     Indica que el controlador de salida ha sido llamado.







    **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)**
    ([int](#language.types.integer))



     Indica que el controlador de salida está desactivado.
     Este indicador se define cuando el controlador de salida devuelve **[false](#constant.false)**
     o falla durante el procesamiento del búfer.
     Antes de PHP 8.4.0, este indicador podía estar definido durante el inicio de un búfer de salida.







    **[PHP_OUTPUT_HANDLER_PROCESSED](#constant.php-output-handler-processed)**
    ([int](#language.types.integer))



     Indica que el controlador de salida ha procesado con éxito el búfer.
     Disponible desde PHP 8.4.0.

# Bufferización de salida

La bufferización de salida es el almacenamiento en búfer (temporal) de la salida
antes de que sea volcada (enviada y eliminada) al navegador (en un contexto web)
o al shell (en línea de comandos).
Mientras la bufferización de salida esté activa, ninguna salida es enviada por el script,
en su lugar, la salida es almacenada en un búfer interno.

## Efectos de la bufferización en PHP

PHP depende de la infraestructura lógica/material subyacente
al vaciar el búfer de la salida.
La bufferización implementada por las consolas en línea de comandos (por ejemplo, en modo línea)
o los servidores web y los navegadores en un contexto web (por ejemplo, completamente bufferizado)
afectan cuándo se muestra la salida al usuario final.
Algunos de estos efectos pueden ser eliminados ajustando finamente los parámetros del servidor
y/o alineando los tamaños de los búferes de las diferentes capas.

## Control de la bufferización de salida en PHP

PHP proporciona un búfer de salida de usuario completamente bufferizado
con funciones para iniciar, manipular y desactivar el búfer
(la mayoría de las funciones [ob\_\*](#ref.outcontrol)),
y dos funciones para vaciar los búferes del sistema subyacentes
([flush()](#function.flush) y [ob_implicit_flush()](#function.ob-implicit-flush)).
Algunas de estas funcionalidades pueden ser definidas y/o configuradas
utilizando los parámetros php.ini apropiados.

## Casos de uso

La bufferización de salida es generalmente útil en situaciones donde la salida bufferizada
es modificada o inspeccionada, o es utilizada más de una vez en una petición;
o cuando se desea el vaciado controlado del búfer de la salida.
Los casos de uso específicos incluyen:

    -

      almacenar en caché el resultado de scripts de cálculo/tiempo intensivos
      por ejemplo generando páginas HTML estáticas



    -

      reutilizar la salida generada al mostrarla, guardarla en un fichero
      y/o enviarla por correo electrónico



    -

      vaciar la head de una página HTML
      separada del body permite a los navegadores
      cargar recursos externos mientras el script ejecuta
      procesos potencialmente más largos
      (por ejemplo, acceso a una base de datos/fichero, conexión de red externa).
      Esto es útil únicamente si el código de estado HTTP
      no puede cambiar después del envío de las cabeceras



    -

      extraer información de funciones que producirían de otro modo una salida
      (por ejemplo [phpinfo()](#function.phpinfo))



    -

      controlar la salida de código de terceros al modificar/utilizar partes
      (por ejemplo, extraer datos, reemplazar palabras/frases,
      añadir etiquetas HTML faltantes),
      o al eliminarla completamente bajo ciertas condiciones (por ejemplo, errores)



    -

      Polyfiller ciertas funcionalidades de servidor web no disponibles
      (por ejemplo, comprimir o codificar la salida)


# Vaciar los búferes del sistema

PHP ofrece dos formas de vaciar
(enviar y eliminar el contenido) los búferes del sistema:
mediante la llamada a [flush()](#function.flush)
y activando el vaciado de búfer implícito
con [ob_implicit_flush()](#function.ob-implicit-flush)
o el parámetro [implicit_flush](#ini.implicit-flush)
de php.ini.

## Comportamiento de vaciado del búfer de salida

Con el vaciado de búfer implícito desactivado, PHP solo vacía la salida cuando
se llama a [flush()](#function.flush) o cuando finaliza el script.

Con el vaciado de búfer implícito activado, PHP intentará vaciar
después de cada bloque de código que produzca salida.
La salida en este contexto son datos de longitud no nula que son:

    -

      fuera de las etiquetas &lt;?php ?&gt;



    -

      mostrados por construcciones del lenguaje y funciones
      cuyo propósito explícito es mostrar variables o strings proporcionados por el usuario tales como
      [echo](#function.echo), [print](#function.print),
      [printf()](#function.printf), [var_dump()](#function.var-dump),
      [var_export()](#function.var-export), [vprintf()](#function.vprintf)



    -

      mostrados por funciones cuyo propósito es recolectar y producir
      datos/información sobre el script en ejecución o PHP tales como
      [debug_print_backtrace()](#function.debug-print-backtrace), [phpcredits()](#function.phpcredits),
      [phpinfo()](#function.phpinfo),
      [ReflectionExtension::info()](#reflectionextension.info)



    -

      mostrados por PHP en una excepción no capturada o un error no manejado
      (sujeto a los parámetros de
      [display_errors](#ini.display-errors)
      y [error_reporting](#ini.error-reporting))



    -

      todo lo que se escribe en php://output


**Nota**:

    Mostrar strings vacíos o enviar encabezados no se considera salida
    y no desencadenará una operación de vaciado de búfer.

**Advertencia**

    Si el vaciado de búfer implícito está activado, los caracteres de control
    (por ejemplo "\n", "\r",
    "\0")
    también desencadenarán un vaciado de búfer.

## Limitaciones

Esta funcionalidad no puede vaciar los búferes de salida a nivel de usuario.
Para usarlos juntos, los búferes de salida a nivel de usuario deben ser vaciados
antes de vaciar los búferes del sistema para que PHP produzca una salida.

**Advertencia**

    Llamar a [flush()](#function.flush) o activar el vaciado de búfer implícito
    puede interferir con los manejadores de salida de los búferes de salida a nivel de usuario
    que definen y envían encabezados en un contexto web
    (por ejemplo [ob_gzhandler()](#function.ob-gzhandler))
    al enviar encabezados antes de que estos manejadores lo hagan.

El almacenamiento en búfer implementado por el software/hardware subyacente
no puede ser reemplazado por PHP y debe ser tenido en cuenta
al utilizar las funciones de control de búferes de PHP.
Verificar los parámetros de almacenamiento en búfer de los servidores web/navegadores/consolas
y trabajar con ellos puede mitigar los problemas potenciales.
Trabajando en un contexto web, ya sea los parámetros de almacenamiento en búfer del servidor web
o el almacenamiento en búfer del script podrían ser ajustados para funcionar en conjunto
mientras que trabajar con las estrategias de almacenamiento en búfer de varios navegadores
puede lograrse ajustando el almacenamiento en búfer en el script PHP.
En las consolas que implementan el almacenamiento en búfer por línea,
los caracteres de nueva línea podrían ser insertados en los lugares apropiados
antes de vaciar la salida.

## Diferencias en el vaciado entre SAPI

Aunque el vaciado de búfer es implementado por cada SAPI
de manera ligeramente diferente,
estas implementaciones caen en una de dos categorías:

    -

      Los SAPIs usados en un contexto web vaciarán primero los encabezados
      seguidos de la salida.
      Apache2Handler, CGI,
      FastCGI y FPM
      son tales SAPIs



    -

      otros SAPIs
      tales como CLI y embed
      vaciarán solo la salida


# Búferes de salida a nivel de usuario

## Tabla de contenidos

- [¿Qué salida está bufferizada?](#outcontrol.what-output-is-buffered)
- [Anidamiento de búferes de salida](#outcontrol.nesting-output-buffers)
- [Tamaño del búfer](#outcontrol.buffer-size)
- [Operaciones permitidas en los búferes](#outcontrol.operations-on-buffers)
- [Gestores de salida](#outcontrol.output-handlers)
- [Trabajar con los gestores de salida](#outcontrol.working-with-output-handlers)
- [Flags pasados a los gestores de salida](#outcontrol.flags-passed-to-output-handlers)
- [Valores de retorno de los gestores de salida](#outcontrol.output-handler-return-values)

    La bufferización de salida a nivel de usuario de PHP puede iniciarse, manipularse
    y finalizar desde el código PHP.
    Cada uno de estos búferes incluye un búfer de salida
    y una función de gestión de salida asociada.

    ## ¿Qué salida está bufferizada?

    Los búferes de salida a nivel de usuario de PHP bufferizan toda la salida
    después de su inicio hasta que sean desactivados o el script finalice.
    La salida en el contexto de los búferes de salida a nivel de usuario de PHP
    es todo lo que PHP mostraría o enviaría al navegador.
    En términos prácticos, la salida es cualquier dato de longitud no nula que sea:
    - fuera de las etiquetas &lt;?php ?&gt;

-     mostrados por construcciones del lenguaje y funciones
      cuyo propósito explícito es mostrar variables o strings proporcionados por el usuario tales como
      [echo](#function.echo), [print](#function.print),
      [printf()](#function.printf), [var_dump()](#function.var-dump),
      [var_export()](#function.var-export), [vprintf()](#function.vprintf)
-     mostrados por funciones cuyo propósito es recolectar y producir
      datos/información sobre el script en ejecución o PHP tales como
      [debug_print_backtrace()](#function.debug-print-backtrace), [phpcredits()](#function.phpcredits),
      [phpinfo()](#function.phpinfo),
      [ReflectionExtension::info()](#reflectionextension.info)
-     mostrados por PHP en una excepción no capturada o un error no manejado
      (sujeto a los parámetros de
      [display_errors](#ini.display-errors)
      y [error_reporting](#ini.error-reporting))
-     todo lo que se escribe en php://output

    **Nota**:

    Los datos escritos directamente en stdout
    o pasados a una función SAPI con una funcionalidad similar
    no serán capturados por los búferes de salida a nivel de usuario.
    Esto incluye
    la escritura de datos en stdout con [fwrite()](#function.fwrite)
    o el envío de encabezados con [header()](#function.header)
    o [setcookie()](#function.setcookie).

    ## Iniciar un búfer de salida

    Los búferes de salida a nivel de usuario pueden iniciarse
    utilizando la función [ob_start()](#function.ob-start) o definiendo
    los parámetros [output_buffering](#ini.output-buffering)
    y [output_handler](#ini.output-handler) de php.ini.
    Tanto uno como otro pueden crear búferes de salida,
    [ob_start()](#function.ob-start) es más flexible
    ya que acepta funciones definidas por el usuario como gestores de salida
    y las operaciones permitidas en el búfer (flush, clean, remove)
    pueden definirse también.
    Los búferes de salida iniciados con [ob_start()](#function.ob-start) estarán activos
    a partir de la línea donde se llamó a la función,
    mientras que los iniciados con
    [output_buffering](#ini.output-buffering)
    bufferizarán la salida desde la primera línea del script.

    PHP también incluye un gestor de salida interno "URL-Rewriter"
    que inicia su propio búfer de salida y solo permite dos instancias del mismo
    funcionando al mismo tiempo
    (una para la reescritura de URL a nivel de usuario
    y otra para el soporte transparente de identificadores de sesión).
    Estos búferes pueden iniciarse llamando
    a la función [output_add_rewrite_var()](#function.output-add-rewrite-var)
    y/o activando el parámetro
    [session.use_trans_sid](#ini.session.use-trans-sid)
    de php.ini.

    La extensión zlib tiene su propio búfer de salida
    que puede activarse utilizando el parámetro
    [zlib.output_compression](#ini.zlib.output-compression)
    de php.ini.

    **Nota**:

    Mientras que "URL-Rewriter" es especial
    en cuanto a que solo permite dos instancias del mismo funcionando al mismo tiempo,
    todos los búferes de salida a nivel de usuario utilizan los mismos búferes subyacentes
    usados por [ob_start()](#function.ob-start)
    con su funcionalidad implementada por una función de gestión de salida personalizada.
    Como tal, toda su funcionalidad puede emularse con código de usuario.

    ## Anidamiento de búferes de salida

    Si un búfer de salida está activo cuando se inicia un nuevo búfer,
    el nuevo búfer se anidará dentro del búfer previamente activo.
    El búfer interno se comportará de la misma manera, ya esté anidado o no,
    pero la salida bufferizada por este no será bufferizada por el búfer externo.
    Solo la salida vaciada por el búfer interno será bufferizada por el búfer externo.

    La mayoría de las funciones ob\_\*
    solo funcionan con el búfer de salida activo (el último iniciado)
    por lo que solo el búfer activo puede vaciarse, limpiarse y desactivarse.
    Las funciones que funcionan con otros búferes son
    [ob_list_handlers()](#function.ob-list-handlers)
    que devuelve la lista de todos los gestores de salida en uso
    y [ob_get_status()](#function.ob-get-status)
    que puede devolver información sobre el búfer activo únicamente
    o sobre todos los búferes en uso.

    Llamar a [ob_get_level()](#function.ob-get-level)
    o [ob_get_status()](#function.ob-get-status) devolverá
    el nivel de anidamiento del búfer de salida activo.

    **Precaución**

    El valor para los niveles idénticos entre [ob_get_level()](#function.ob-get-level)
    y [ob_get_status()](#function.ob-get-status) difiere en uno.
    Para [ob_get_level()](#function.ob-get-level)
    el primer nivel es 1,
    mientras que para [ob_get_status()](#function.ob-get-status)
    el primer nivel es 0.

    ## Tamaño del búfer

    Los tamaños de los búferes de salida se expresan mediante enteros
    y representan el número de bytes que el búfer puede almacenar sin vaciarse.
    Cuando el tamaño de la salida en el búfer excede el tamaño del búfer,
    el contenido del búfer se envía al gestor de salida,
    su valor de retorno se lava y el búfer se vacía.

    Con la excepción de "URL-Rewriter",
    el tamaño de los búferes de salida puede definirse cuando el búfer se inicia.
    Si se define como 0,
    el búfer de salida solo está limitado por la memoria disponible para PHP.
    Si se define como 1,
    el búfer se lava después de cada bloque de código que produce
    una salida de longitud no nula.

    El tamaño de los búferes de salida puede recuperarse llamando
    a [ob_get_status()](#function.ob-get-status).

    Los búferes de salida iniciados con [ob_start()](#function.ob-start)
    tendrán su tamaño de búfer definido al valor entero pasado
    al segundo parámetro chunk_size de la función.
    Si se omite, se define como 0.

    El búfer de salida iniciado con
    [output_buffering](#ini.output-buffering)
    definido como "On" tendrá su tamaño de búfer definido como 0.
    Si se define como un entero, el tamaño del búfer corresponderá a ese número.

    El tamaño del búfer de salida de "URL-Rewriter" se define como 0,
    por lo que solo está limitado por la memoria disponible para PHP.

    El tamaño del búfer de salida de zlib está controlado por el parámetro
    [zlib.output_compression](#ini.zlib.output-compression)
    de php.ini.
    Si se define como "On", el tamaño del búfer será "16K"/16384.
    Si se define como un entero, el tamaño del búfer corresponderá a ese número en bytes.

    ## Operaciones permitidas en los búferes

    Las operaciones permitidas en los búferes pueden controlarse
    pasando uno de los
    [flags de control de búfer](#outcontrol.constants.buffer-control-flags)
    al tercer parámetro flags de [ob_start()](#function.ob-start).
    Si se omite, todas las operaciones están permitidas por defecto.
    Si se usa 0 en su lugar,
    el búfer no puede vaciarse, limpiarse ni desactivarse
    pero su contenido puede recuperarse.

    **[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)** permite a
    [ob_clean()](#function.ob-clean) limpiar el contenido del búfer.

    **Advertencia**

    La ausencia del flag **[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)**
    no evitará que [ob_end_clean()](#function.ob-end-clean)
    o [ob_get_clean()](#function.ob-get-clean) limpien el contenido del búfer.

    **[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)** permite a
    [ob_flush()](#function.ob-flush) vaciar el contenido del búfer.

    **Advertencia**

    La ausencia del flag **[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)**
    no evitará que [ob_end_flush()](#function.ob-end-flush)
    o [ob_get_flush()](#function.ob-get-flush) vacíen el contenido del búfer.

    **[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)** permite a
    [ob_end_clean()](#function.ob-end-clean), [ob_end_flush()](#function.ob-end-flush),
    [ob_get_clean()](#function.ob-get-clean) o [ob_get_flush()](#function.ob-get-flush)
    desactivar el búfer.

    **[PHP_OUTPUT_HANDLER_STDFLAGS](#constant.php-output-handler-stdflags)**,
    la combinación de los tres flags, permite que cada una de las tres operaciones
    se realice en el búfer.

    ## Lavar, acceder y limpiar el contenido del búfer

    Lavar envía y elimina el contenido del búfer activo.
    Los búferes de salida se lavan cuando el tamaño de la salida
    excede el tamaño del búfer, el script finaliza o
    se llama a [ob_flush()](#function.ob-flush), [ob_end_flush()](#function.ob-end-flush),
    o [ob_get_flush()](#function.ob-get-flush).

    **Precaución**

    Llamar a [ob_end_flush()](#function.ob-end-flush)
    o [ob_get_flush()](#function.ob-get-flush) desactivará el búfer activo.

    **Precaución**

    Lavar los búferes lavará el valor de retorno del gestor de salida
    que puede diferir del contenido del búfer.
    Por ejemplo, usar [ob_gzhandler()](#function.ob-gzhandler) comprimirá
    la salida y lavará la salida comprimida.

    El contenido del búfer activo puede recuperarse llamando
    a [ob_get_contents()](#function.ob-get-contents) o [ob_get_flush()](#function.ob-get-flush).

    Si solo se necesita la longitud del contenido del búfer,
    [ob_get_length()](#function.ob-get-length) o [ob_get_status()](#function.ob-get-status)
    devolverá la longitud del contenido en bytes.

    **Precaución**

    Llamar a [ob_get_clean()](#function.ob-get-clean)
    o [ob_get_flush()](#function.ob-get-flush) desactivará el búfer activo
    después de devolver su contenido.

    El contenido del búfer activo puede limpiarse llamando
    a [ob_clean()](#function.ob-clean), [ob_end_clean()](#function.ob-end-clean)
    o [ob_get_clean()](#function.ob-get-clean).

    **Precaución**

    Llamar a [ob_end_clean()](#function.ob-end-clean)
    o [ob_get_clean()](#function.ob-get-clean) desactivará el búfer activo.

    ## Desactivar los búferes

    Los búferes de salida pueden desactivarse llamando
    a [ob_end_clean()](#function.ob-end-clean), [ob_end_flush()](#function.ob-end-flush),
    [ob_get_flush()](#function.ob-get-flush) o [ob_get_clean()](#function.ob-get-clean).

    **Advertencia**

    Los búferes de salida iniciados sin el flag
    **[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**
    no pueden desactivarse y generarán un **[E_NOTICE](#constant.e-notice)**.

    Cada búfer de salida que no haya sido desactivado al final del script
    o cuando se llama a [exit()](#function.exit) será lavado
    y desactivado por el proceso de terminación de PHP.
    Los búferes se lavarán y desactivarán en orden inverso
    a su inicio.
    El último búfer iniciado será el primero,
    el primer búfer iniciado será el último en lavarse y desactivarse.

    **Precaución**

    Si no se desea el lavado del contenido del búfer,
    debe usarse un gestor de salida personalizado para evitar el lavado al cerrar.

    ## Gestores de salida

    Los gestores de salida son [callable](#language.types.callable)s asociados a los búferes de salida
    que se invocan al llamar a [ob_clean()](#function.ob-clean),
    [ob_flush()](#function.ob-flush), [ob_end_flush()](#function.ob-end-flush),
    [ob_get_flush()](#function.ob-get-flush), [ob_end_clean()](#function.ob-end-clean),
    [ob_get_clean()](#function.ob-get-clean) o durante el proceso de terminación de PHP.

    **Nota**:

    El proceso de terminación lavará los valores de retorno de los gestores de salida

    Si se omite o es **[null](#constant.null)** al iniciar el búfer de salida
    se utilizará el gestor de salida interno "gestor de salida por defecto"
    que devuelve el contenido del búfer sin modificar cuando se invoca.
    Los gestores de salida pueden usarse para devolver una versión modificada
    del contenido del búfer y/o tener efectos secundarios (por ejemplo, enviar encabezados).

    PHP incluye dos gestores de salida internos:
    "default output handler"
    y "URL-Rewriter" (que está integrado en
    su propio búfer de salida y solo hasta dos instancias del mismo pueden iniciarse).

    La extensión agrupada incluye cuatro gestores de salida adicionales:
    [mb_output_handler()](#function.mb-output-handler), [ob_gzhandler()](#function.ob-gzhandler),
    [ob_iconv_handler()](#function.ob-iconv-handler), [ob_tidyhandler()](#function.ob-tidyhandler).

    ## Trabajar con los gestores de salida

    Al ser invocados, los gestores de salida reciben el contenido del búfer
    y una máscara que indica el estado de la bufferización de salida.

    handler
    (

    [string](#language.types.string) $buffer
    ,

    [int](#language.types.integer) $phase
    = ?): [string](#language.types.string)

    buffer

         El contenido del búfer.

    phase

         Una máscara de bits de las
         [
          constantes
          **<a href="#constant.php-output-handler-start">PHP_OUTPUT_HANDLER_*](#constant.php-output-handler-start)**
         </a>.

    **Advertencia**

    Llamar a cualquiera de las siguientes funciones desde un gestor de salida
    resultará en un error fatal:
    [ob_clean()](#function.ob-clean), [ob_end_clean()](#function.ob-end-clean),
    [ob_end_flush()](#function.ob-end-flush), [ob_flush()](#function.ob-flush),
    [ob_get_clean()](#function.ob-get-clean), [ob_get_flush()](#function.ob-get-flush),
    [ob_start()](#function.ob-start).

    **Nota**:

    Si el **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** de un gestor está definido,
    el gestor no será invocado al llamar a
    [ob_end_clean()](#function.ob-end-clean), [ob_end_flush()](#function.ob-end-flush),
    [ob_get_clean()](#function.ob-get-clean), [ob_get_flush()](#function.ob-get-flush)
    [ob_get_clean()](#function.ob-get-clean), [ob_get_flush()](#function.ob-get-flush),
    [ob_clean()](#function.ob-clean),
    [ob_flush()](#function.ob-flush)
    o durante el proceso de terminación de PHP.
    Antes de PHP 8.4.0, este flag no tenía ningún efecto al llamar a las funciones [ob_clean()](#function.ob-clean)
    o [ob_flush()](#function.ob-flush).

    **Nota**:

    El directorio de trabajo del script puede cambiar dentro de la función de parada
    bajo ciertos servidores web, por ejemplo Apache o el servidor web integrado.

    ## Flags pasados a los gestores de salida

    La máscara de bits pasada al segundo parámetro phase
    del gestor de salida proporciona información sobre la invocación del gestor.

    **Nota**:

    La máscara de bits puede incluir más de un flag
    y el operador &amp; debe usarse
    para verificar si un flag está definido.

    **Advertencia**

    El valor de **[PHP_OUTPUT_HANDLER_WRITE](#constant.php-output-handler-write)** y su alias
    **[PHP_OUTPUT_HANDLER_CONT](#constant.php-output-handler-cont)** es 0
    por lo que si está definido no puede determinarse
    excepto usando un
    [operador de igualdad](#language.operators.comparison)
    (== o ===).

    Los siguientes flags están definidos en una fase específica del ciclo de vida del gestor:
    **[PHP_OUTPUT_HANDLER_START](#constant.php-output-handler-start)** está definido
    cuando un gestor es invocado por primera vez.
    **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**
    o su alias **[PHP_OUTPUT_HANDLER_END](#constant.php-output-handler-end)**
    está definido cuando un gestor es invocado por última vez,
    es decir, cuando se desactiva. Este flag también está definido
    cuando los búferes son desactivados por el proceso de terminación de PHP.

    Los siguientes flags están definidos por una invocación específica del gestor:
    **[PHP_OUTPUT_HANDLER_FLUSH](#constant.php-output-handler-flush)** está definido
    cuando un gestor es invocado al llamar a [ob_flush()](#function.ob-flush).
    **[PHP_OUTPUT_HANDLER_WRITE](#constant.php-output-handler-write)**
    o su alias **[PHP_OUTPUT_HANDLER_CONT](#constant.php-output-handler-cont)**
    está definido cuando el tamaño de su contenido es igual o excede el tamaño del búfer
    y el gestor es invocado mientras el búfer se lava automáticamente.
    **[PHP_OUTPUT_HANDLER_FLUSH](#constant.php-output-handler-flush)** está definido
    cuando un gestor es invocado al llamar a [ob_clean()](#function.ob-clean),
    [ob_end_clean()](#function.ob-end-clean) o [ob_get_clean()](#function.ob-get-clean).
    Cuando se llama a [ob_end_clean()](#function.ob-end-clean) o [ob_get_clean()](#function.ob-get-clean)
    también se define **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**.

    **Nota**:

    Cuando se llama a [ob_end_flush()](#function.ob-end-flush) o [ob_get_flush()](#function.ob-get-flush)
    se define **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**
    pero **[PHP_OUTPUT_HANDLER_FLUSH](#constant.php-output-handler-flush)** no.

    ## Valores de retorno de los gestores de salida

    El valor de retorno del gestor de salida se convierte internamente a una cadena
    siguiendo las semánticas de tipo estándar de PHP, con dos excepciones:
    los [array](#language.types.array)s y los [bool](#language.types.boolean)eanos.

    Los arrays se convierten en la cadena "Array"
    pero el mensaje de advertencia "Conversión de un array a cadena"
    no se dispara.

    Si el gestor de salida devuelve **[false](#constant.false)** se devuelve el contenido del búfer.
    Si el gestor devuelve **[true](#constant.true)** se devuelve una cadena vacía.

    **Nota**:

    Si un gestor devuelve **[false](#constant.false)** o lanza una excepción
    su flag **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** está definido.

    ## Excepciones lanzadas en los gestores de salida

    Si una excepción no capturada es lanzada en un gestor de salida
    el programa termina y el gestor es invocado
    por el proceso de terminación después de lo cual
    se devuelve el mensaje de error "Excepción no capturada".

    Si la excepción no capturada es lanzada en un gestor
    invocado por [ob_flush()](#function.ob-flush),
    [ob_end_flush()](#function.ob-end-flush) o [ob_get_flush()](#function.ob-get-flush),
    el contenido del búfer se lava antes del mensaje de error.

    Si una excepción no capturada es lanzada en un gestor de salida durante la terminación,
    el gestor termina y ni el contenido del búfer ni
    el mensaje de error son lavados.

    **Nota**:

    Si un gestor lanza una excepción
    su flag **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** está definido.

    ## Errores generados en los gestores de salida

    Si un error no fatal es generado en un gestor de salida
    el programa continúa su ejecución.

    Si un error no fatal es generado en un gestor invocado por
    [ob_flush()](#function.ob-flush), [ob_end_flush()](#function.ob-end-flush)
    o [ob_get_flush()](#function.ob-get-flush),
    el búfer vacía algunos datos dependiendo del valor de retorno del gestor.
    Si el gestor devuelve **[false](#constant.false)** el búfer y el mensaje de error son lavados.
    Si el gestor devuelve otra cosa, el valor de retorno del gestor es lavado
    pero no el mensaje de error.

    **Nota**:

    Si un gestor devuelve **[false](#constant.false)**
    su flag **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** está definido.

    Si un error fatal es generado en un gestor de salida
    el programa termina y el gestor es invocado
    por el proceso de terminación después de lo cual el mensaje de error es lavado.

    Si el error fatal es generado en un gestor invocado por
    [ob_flush()](#function.ob-flush), [ob_end_flush()](#function.ob-end-flush)
    o [ob_get_flush()](#function.ob-get-flush),
    el contenido del búfer es lavado antes del mensaje de error.

    Si un error fatal es generado en un gestor de salida durante la terminación
    el programa termina sin lavar el contenido del búfer o el mensaje de error.

    ## Salida en los gestores de salida

    En circunstancias específicas, la salida producida en el gestor es lavada
    con el contenido del búfer.
    Esta salida no se añade al búfer y no forma parte de la cadena
    devuelta por [ob_get_flush()](#function.ob-get-flush).

    Durante las operaciones de lavado de búfer (llamada a [ob_flush()](#function.ob-flush),
    [ob_end_flush()](#function.ob-end-flush), [ob_get_flush()](#function.ob-get-flush)
    y durante la terminación)
    si el valor de retorno de un gestor es **[false](#constant.false)**
    el contenido del búfer es lavado seguido de la salida.
    Si el gestor no es invocado durante la terminación
    el gestor lanzando una excepción o la llamada a [exit()](#function.exit)
    resulta en el mismo comportamiento.

    **Nota**:

    Si un gestor devuelve **[false](#constant.false)**
    su flag **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** está definido.

    ## Flags de estado de los gestores de salida

    Los
    [
    flags de estado de los gestores
    ](#outcontrol.constants.flags-returned-by-handler) de la máscara de bits flags del búfer
    están definidos en cada invocación del gestor de salida
    y forman parte de la máscara de bits flags devuelta por
    [ob_get_status()](#function.ob-get-status).
    Si el gestor se ejecuta con éxito y no devuelve **[false](#constant.false)**,
    **[PHP_OUTPUT_HANDLER_STARTED](#constant.php-output-handler-started)** y
    **[PHP_OUTPUT_HANDLER_PROCESSED](#constant.php-output-handler-processed)** están definidos.
    Si el gestor devuelve **[false](#constant.false)** o lanza una excepción durante la ejecución,
    **[PHP_OUTPUT_HANDLER_STARTED](#constant.php-output-handler-started)** y
    **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** están definidos.

    **Nota**:

    Si **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** de un gestor está definido,
    el gestor no será invocado al llamar a
    [ob_end_clean()](#function.ob-end-clean), [ob_end_flush()](#function.ob-end-flush),
    [ob_get_clean()](#function.ob-get-clean), [ob_get_flush()](#function.ob-get-flush)
    [ob_get_clean()](#function.ob-get-clean), [ob_get_flush()](#function.ob-get-flush),
    [ob_clean()](#function.ob-clean),
    [ob_flush()](#function.ob-flush)
    o durante el proceso de terminación de PHP.
    Antes de PHP 8.4.0, este flag no tenía ningún efecto al llamar a las funciones [ob_clean()](#function.ob-clean)
    o [ob_flush()](#function.ob-flush).

    # Ejemplos

## Tabla de contenidos

- [Uso básico](#outcontrol.examples.basic)
- [Uso de la reescritura de salida](#outcontrol.examples.rewrite)

    ## Uso básico

    **Ejemplo #1 Ejemplo de bufferización de salida**

&lt;?php

ob_start();
echo "Bonjour\n";

setcookie("cookiename", "cookiedata");

ob_end_flush();

?&gt;

En el ejemplo anterior, la instrucción
[echo](#function.echo)
se almacena en un buffer hasta la llamada a la función
[ob_end_flush()](#function.ob-end-flush). Al mismo tiempo, la llamada a [setcookie()](#function.setcookie) ha tenido éxito en la creación de un cookie, sin generar errores.
(Normalmente, los encabezados deben enviarse al navegador antes de los datos).

## Uso de la reescritura de salida

Desde PHP 7.1.0, [output_add_rewrite_var()](#function.output-add-rewrite-var), [output_reset_rewrite_vars()](#function.output-reset-rewrite-vars) utiliza un buffer de salida dedicado. Es decir, no utiliza un buffer de salida [trans sid](#ini.session.use-trans-sid).

    **Ejemplo #1 Ejemplo de reescritura de salida**

&lt;?php
// Este código funciona con PHP 7.1.0, 7.0.10, 5.6.25 y superior.

// HTTP_HOST es el host objetivo por defecto. Definir manualmente para que el ejemplo de código funcione.
$\_SERVER['HTTP_HOST'] = 'php.net';

// La reescritura de salida solo puede reescribir los form. Añadir a=href.
// Las etiquetas pueden especificarse como tag_name=url_attr, por ejemplo img=src, iframe=src
// No se permiten espacios entre los argumentos.
// La etiqueta form es una etiqueta especial que añade un campo oculto.
ini_set('url_rewriter.tags','a=href,form=');
var_dump(ini_get('url_rewriter.tags'));

// Esto se añade a la URL y al formulario
output_add_rewrite_var('test', 'value');
?&gt;
&lt;a href="//php.net/index.php?bug=1234"&gt;bug1234&lt;/a&gt;
&lt;form action="https://php.net/?bug=1234&amp;edit=1" method="post"&gt;
&lt;input type="text" name="title" /&gt;
&lt;/form&gt;

    El ejemplo anterior mostrará:

&lt;a href="//php.net/?bug=1234&amp;test=value"&gt;bug1234&lt;/a&gt;
&lt;form action="https://php.net/?bug=1234&amp;edit=1" method="post"&gt;&lt;input type="hidden" name="test" value="value" /&gt;
&lt;input type="text" name="title" /&gt;
&lt;/form&gt;

Desde PHP 7.1.0, las funciones de reescritura de salida tienen sus propios parámetros INI, [url_rewriter.tags](#ini.url-rewriter.tags) y [url_rewriter.hosts](#ini.url-rewriter.hosts).

# Funciones del Control de la salida

# Ver también

Véase también [header()](#function.header) y
[setcookie()](#function.setcookie).

# flush

(PHP 4, PHP 5, PHP 7, PHP 8)

flush — Vacía los búferes de salida del sistema

### Descripción

**flush**(): [void](language.types.void.html)

Vacía los búferes de escritura del sistema de PHP y del backend utilizado por PHP
(por ejemplo: CGI, un servidor web).
En un entorno de línea de comandos, **flush()**
intentará vaciar únicamente el contenido de los búferes,
mientras que en un contexto web, los encabezados y el contenido de los búferes son vaciados.

**Nota**:

    **flush()** puede no poder sortear
    el esquema de almacenamiento en búfer del servidor web
    y no tiene ningún efecto sobre un almacenamiento en búfer lado-cliente en el navegador.

**Nota**:

    Esta función no tiene ningún efecto sobre los gestores de salida de nivel usuario
    tales como aquellos iniciados por [ob_start()](#function.ob-start)
    o [output_add_rewrite_var()](#function.output-add-rewrite-var).

**Advertencia**

    **flush()** puede interferir con los gestores de salida
    que definen y envían encabezados en un contexto web (por ejemplo, [ob_gzhandler()](#function.ob-gzhandler))
    al enviar encabezados antes de que estos gestores puedan hacerlo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El envío de encabezados sin cuerpo tendrá éxito ahora en FastCGI.



### Ver también

    - [ob_flush()](#function.ob-flush) - Vacía (envía) el valor de retorno del manejador de salida activo.

    - [ob_clean()](#function.ob-clean) - Limpiar (borrar) el contenido del búfer de salida activo.

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

    - [ob_end_clean()](#function.ob-end-clean) - Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

# ob_clean

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ob_clean — Limpiar (borrar) el contenido del búfer de salida activo.

### Descripción

**ob_clean**(): [bool](#language.types.boolean)

Esta función llama al gestor de salida
(con el flag **[PHP_OUTPUT_HANDLER_CLEAN](#constant.php-output-handler-clean)**),
ignora su valor de retorno
y limpia (borra) el contenido del búfer de salida activo.

Esta función no desactiva el búfer de salida activo como lo hacen
[ob_end_clean()](#function.ob-end-clean) o [ob_get_clean()](#function.ob-get-clean).

**ob_clean()** fallará
sin un búfer de salida activo iniciado con el flag
**[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si la función falla, genera una **[E_NOTICE](#constant.e-notice)**.

### Ver también

    - [ob_flush()](#function.ob-flush) - Vacía (envía) el valor de retorno del manejador de salida activo.

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

    - [ob_end_clean()](#function.ob-end-clean) - Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

# ob_end_clean

(PHP 4, PHP 5, PHP 7, PHP 8)

ob_end_clean — Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

### Descripción

**ob_end_clean**(): [bool](#language.types.boolean)

Esta función invoca al gestor de salida
(con los flags **[PHP_OUTPUT_HANDLER_CLEAN](#constant.php-output-handler-clean)** y
**[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**),
ignora su valor de retorno,
ignora el contenido del búfer de salida activo
y lo desactiva.

**ob_end_clean()** fallará
sin un búfer de salida activo iniciado con el flag
**[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**.

**ob_end_clean()**
eliminará el contenido del búfer de salida activo
incluso si fue iniciado sin el flag
**[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si la función falla, genera una **[E_NOTICE](#constant.e-notice)**.

### Ejemplos

El siguiente ejemplo muestra una manera sencilla de deshacerse del
contenido del búfer de salida activo:

    **Ejemplo #1 Ejemplo con ob_end_clean()**

&lt;?php
ob_start();
echo 'Texto que no será mostrado.';
ob_end_clean();
?&gt;

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

    - [ob_clean()](#function.ob-clean) - Limpiar (borrar) el contenido del búfer de salida activo.

    - [ob_get_clean()](#function.ob-get-clean) - Obtiene el contenido del búfer de salida activo y lo desactiva

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

# ob_end_flush

(PHP 4, PHP 5, PHP 7, PHP 8)

ob_end_flush —
Vacía (envía) el valor de retorno del manejador de salida activo
y desactiva el búfer de salida activo

### Descripción

**ob_end_flush**(): [bool](#language.types.boolean)

Esta función llama al manejador de salida
(con el flag **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**),
vacía (envía) su valor de retorno,
ignora el contenido del búfer de salida activo
y desactiva este último.

**ob_end_flush()** fallará
sin un búfer de salida activo iniciado con el flag
**[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**.

**ob_end_flush()** vaciará (enviará)
el valor de retorno del manejador de salida
incluso si el búfer de salida activo ha sido iniciado sin el flag
**[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si la función falla, genera una **[E_NOTICE](#constant.e-notice)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_end_flush()**



     El ejemplo a continuación muestra un método simple para vaciar
     todos los búferes:

&lt;?php
while (@ob_end_flush());
?&gt;

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

    - [ob_flush()](#function.ob-flush) - Vacía (envía) el valor de retorno del manejador de salida activo.

    - [ob_get_flush()](#function.ob-get-flush) - Vacía (envía) el valor de retorno del gestor de salida activo,

devuelve el contenido del búfer de salida activo y lo desactiva.

    - [ob_end_clean()](#function.ob-end-clean) - Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

# ob_flush

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ob_flush — Vacía (envía) el valor de retorno del manejador de salida activo.

### Descripción

**ob_flush**(): [bool](#language.types.boolean)

Esta función llama al manejador de salida
(con el flag **[PHP_OUTPUT_HANDLER_FLUSH](#constant.php-output-handler-flush)**),
vacía (envía) su valor de retorno
e ignora el contenido del búfer de salida activo.

Esta función no desactiva el búfer de salida activo como lo hacen
[ob_end_flush()](#function.ob-end-flush) o [ob_get_flush()](#function.ob-get-flush).

**ob_flush()** fallará
sin un búfer de salida activo iniciado con el flag
**[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si la función falla, genera una **[E_NOTICE](#constant.e-notice)**.

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

    - [ob_get_flush()](#function.ob-get-flush) - Vacía (envía) el valor de retorno del gestor de salida activo,

devuelve el contenido del búfer de salida activo y lo desactiva.

    - [ob_clean()](#function.ob-clean) - Limpiar (borrar) el contenido del búfer de salida activo.

# ob_get_clean

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ob_get_clean — Obtiene el contenido del búfer de salida activo y lo desactiva

### Descripción

**ob_get_clean**(): [string](#language.types.string)|[false](#language.types.singleton)

Esta función llama al gestor de salida
(con los flags **[PHP_OUTPUT_HANDLER_CLEAN](#constant.php-output-handler-clean)** y
**[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**),
ignora su valor de retorno,
devuelve el contenido del búfer de salida activo
y lo desactiva.

**ob_get_clean()** fallará
sin un búfer de salida activo iniciado con el flag
**[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**.

**ob_get_clean()**
eliminará el contenido del búfer de salida activo
incluso si fue iniciado sin el flag
**[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del búfer de salida activo en caso de éxito
o **[false](#constant.false)** en caso de fallo.

**Precaución**

    **ob_get_clean()** devolverá false
    pero no generará una **[E_NOTICE](#constant.e-notice)**
    si no hay un búfer de salida activo.

### Errores/Excepciones

Si la función falla, genera una **[E_NOTICE](#constant.e-notice)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_get_clean()**

&lt;?php

ob_start();

echo "¡Hola mundo!";

$out = ob_get_clean();
$out = strtolower($out);

var_dump($out);
?&gt;

    El ejemplo anterior mostrará:

string(18) "¡hola mundo!"

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

    - [ob_clean()](#function.ob-clean) - Limpiar (borrar) el contenido del búfer de salida activo.

    - [ob_end_clean()](#function.ob-end-clean) - Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

    - [ob_get_flush()](#function.ob-get-flush) - Vacía (envía) el valor de retorno del gestor de salida activo,

devuelve el contenido del búfer de salida activo y lo desactiva.

# ob_get_contents

(PHP 4, PHP 5, PHP 7, PHP 8)

ob_get_contents — Devuelve el contenido del búfer de salida

### Descripción

**ob_get_contents**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el contenido del búfer de salida sin borrarlo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del búfer de salida sin borrarlo
o **[false](#constant.false)**, si la temporización de salida no está activada.

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_get_contents()**

&lt;?php

ob_start();

echo "Bonjour ";

$out1 = ob_get_contents();

echo "le monde !";

$out2 = ob_get_contents();

ob_end_clean();

var_dump($out1, $out2);
?&gt;

    El ejemplo anterior mostrará:

string(8) "Bonjour "
string(18) "Bonjour le monde !"

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_length()](#function.ob-get-length) - Devuelve la longitud del contenido del búfer de salida

# ob_get_flush

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ob_get_flush —
Vacía (envía) el valor de retorno del gestor de salida activo,
devuelve el contenido del búfer de salida activo y lo desactiva.

### Descripción

**ob_get_flush**(): [string](#language.types.string)|[false](#language.types.singleton)

Esta función llama al gestor de salida
(con el flag **[PHP_OUTPUT_HANDLER_FINAL](#constant.php-output-handler-final)**),
envía (vacía) su valor de retorno,
devuelve el contenido del búfer de salida activo
y desactiva el búfer de salida activo.

**ob_get_flush()** fallará
sin un búfer de salida activo iniciado con el flag
**[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**.

**ob_get_flush()** vaciará (enviará)
el valor de retorno del gestor de salida
incluso si el búfer de salida activo ha sido iniciado sin el
flag **[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del búfer de salida activo en caso de éxito
o **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

En caso de fallo de la función, genera una **[E_NOTICE](#constant.e-notice)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_get_flush()**

&lt;?php
//Utilización de output_buffering=On
print_r(ob_list_handlers());

//Guardado del búfer en un fichero
$buffer = ob_get_flush();
file_put_contents('buffer.txt', $buffer);

print_r(ob_list_handlers());
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; default output handler
)
Array
(
)

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

    - [ob_flush()](#function.ob-flush) - Vacía (envía) el valor de retorno del manejador de salida activo.

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

    - [ob_get_clean()](#function.ob-get-clean) - Obtiene el contenido del búfer de salida activo y lo desactiva

# ob_get_length

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

ob_get_length — Devuelve la longitud del contenido del búfer de salida

### Descripción

**ob_get_length**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la longitud del contenido del búfer de salida, en bytes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la longitud del contenido del búfer de salida, en bytes, si la
temporización está activada, y **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_get_length()**

&lt;?php

ob_start();

echo "Bonjour ";

$len1 = ob_get_length();

echo "le monde";

$len2 = ob_get_length();

ob_end_clean();

echo $len1 . ", " . $len2;
?&gt;

    El ejemplo anterior mostrará:

8, 16

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

# ob_get_level

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ob_get_level — Devuelve el número de niveles de anidación del sistema de temporización de salida

### Descripción

**ob_get_level**(): [int](#language.types.integer)

Devuelve el número de niveles de anidación del sistema de temporización de salida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de niveles de anidación del sistema de temporización de
salida, y cero si no está activo.

**Precaución**

    El valor para los niveles idénticos entre **ob_get_level()**
    y [ob_get_status()](#function.ob-get-status) difiere en uno.

    Para **ob_get_level()**,
    el primer nivel es 1.
    Mientras que para [ob_get_status()](#function.ob-get-status),
    el primer nivel es 0.

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_get_status()](#function.ob-get-status) - Lee el estado del búfer de salida

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

# ob_get_status

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ob_get_status — Lee el estado del búfer de salida

### Descripción

**ob_get_status**([bool](#language.types.boolean) $full_status = **[false](#constant.false)**): [array](#language.types.array)

**ob_get_status()** devuelve información sobre el estado
del búfer de salida de alto nivel o de todos los búferes de salida si
full_status está definido como **[true](#constant.true)**.

### Parámetros

     full_status


       **[true](#constant.true)** para devolver todos los búferes de salida. Si es **[false](#constant.false)**
       o no está definido, solo se devolverá el estado del búfer de salida de alto nivel.





### Valores devueltos

Si el parámetro full_status está omitido o es igual a **[false](#constant.false)**, se devuelve un array simple
que contiene información sobre el estado del nivel de salida activo.

Si el parámetro full_status es igual a **[true](#constant.true)**, se devuelve un array
con un elemento para cada nivel de búfer de salida activo. El nivel de salida se utiliza como clave del array superior y cada elemento del array
es a su vez otro array que contiene información sobre un nivel de salida activo.

Se devuelve un array vacío si la memoria intermedia de salida no está activada.

    <caption>**Elementos devueltos por la función ob_get_status()**</caption>
    ClaveValor

     name

      Nombre del gestor de salida activo (ver los valores de retorno de
      [ob_list_handlers()](#function.ob-list-handlers) para más detalles)



     type

      0 (gestor interno) o
      1 (gestor proporcionado por el usuario)



     flags

      Máscara de bits de los indicadores definidos por la función [ob_start()](#function.ob-start),
      el tipo de gestor de salida (ver arriba)
      y el estado del proceso de memoria intermedia
      ([
       **<a href="#constant.php-output-handler-start">PHP_OUTPUT_HANDLER_*](#outcontrol.constants.flags-returned-by-handler)**
      </a> constantes).
      Si el gestor ha procesado con éxito el búfer y no ha devuelto **[false](#constant.false)**,
      **[PHP_OUTPUT_HANDLER_STARTED](#constant.php-output-handler-started)** y
      **[PHP_OUTPUT_HANDLER_PROCESSED](#constant.php-output-handler-processed)** estarán definidos.
      Si el gestor ha fallado al procesar el búfer o ha devuelto **[false](#constant.false)**,
      **[PHP_OUTPUT_HANDLER_STARTED](#constant.php-output-handler-started)** y
      **[PHP_OUTPUT_HANDLER_DISABLED](#constant.php-output-handler-disabled)** estarán definidos.



     level

      Nivel de anidación de la salida (a partir de cero). Tenga en cuenta que el valor devuelto para
      el mismo nivel por la función [ob_get_level()](#function.ob-get-level) está desplazado en uno.
      El primer nivel es 0 para **ob_get_status()**,
      y 1 para [ob_get_level()](#function.ob-get-level).



     chunk_size

      Tamaño del fragmento en bytes. Definido por la función [ob_start()](#function.ob-start)
      o [output_buffering](#ini.output-buffering) si está activado
      y su valor está definido como un entero positivo



     buffer_size

      Tamaño del búfer de salida en bytes



     buffer_used

      Tamaño de los datos en el búfer de salida en bytes
      (el mismo que el valor de retorno entero de [ob_get_length()](#function.ob-get-length))


### Ejemplos

    **Ejemplo #1 Array devuelto cuando el parámetro full_status es igual a [true](#constant.true)**

Array
(
[type] =&gt; 0
[flags] =&gt; 112
[level] =&gt; 2
[chunk_size] =&gt; 0
[buffer_size] =&gt; 16384
[buffer_used] =&gt; 1024
)

    **Ejemplo #2 Array devuelto cuando el parámetro full_status es igual a [true](#constant.true)**

Array
(
[0] =&gt; Array
(
[name] =&gt; default output handler
[type] =&gt; 0
[flags] =&gt; 112
[level] =&gt; 1
[chunk_size] =&gt; 0
[buffer_size] =&gt; 16384
[buffer_used] =&gt; 2048
)

    [1] =&gt; Array
        (
            [name] =&gt; URL-Rewriter
            [type] =&gt; 0
            [flags] =&gt; 112
            [level] =&gt; 2
            [chunk_size] =&gt; 0
            [buffer_size] =&gt; 16384
            [buffer_used] =&gt; 1024
        )

)

### Ver también

    - [ob_get_level()](#function.ob-get-level) - Devuelve el número de niveles de anidación del sistema de temporización de salida

    - [ob_list_handlers()](#function.ob-list-handlers) - Lista los gestores de salida utilizados

    - [ob_get_length()](#function.ob-get-length) - Devuelve la longitud del contenido del búfer de salida

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

# ob_implicit_flush

(PHP 4, PHP 5, PHP 7, PHP 8)

ob_implicit_flush — Activa/desactiva el envío implícito

### Descripción

**ob_implicit_flush**([bool](#language.types.boolean) $enable = **[true](#constant.true)**): [void](language.types.void.html)

**ob_implicit_flush()** activa/desactiva el envío implícito.
La puesta en memoria intermedia implícita provocará una operación de volcado después de cada bloque
de código que produzca una salida, de modo que no serán necesarios los llamados explícitos a [flush()](#function.flush).

**Nota**:

    Mostrar strings vacíos o enviar encabezados no se considera una salida
    y no desencadenará una operación de volcado.

**Nota**:

    Esta función no tiene ningún efecto sobre los gestores de salida de nivel usuario,
    tales como los iniciados por [ob_start()](#function.ob-start)
    o [output_add_rewrite_var()](#function.output-add-rewrite-var).

### Parámetros

     enable


       **[true](#constant.true)** para activar, **[false](#constant.false)** en caso contrario.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       enable ahora espera un valor [bool](#language.types.boolean);
       anteriormente, se esperaba un [int](#language.types.integer).



### Ver también

    - [flush()](#function.flush) - Vacía los búferes de salida del sistema

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

# ob_list_handlers

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ob_list_handlers — Lista los gestores de salida utilizados

### Descripción

**ob_list_handlers**(): [array](#language.types.array)

Lista los gestores de salida utilizados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con el gestor de salida
en uso (si existe).

Si [output_buffering](#ini.output-buffering) está activado
y no se ha definido ningún [output_handler](#ini.output-handler),
o si no se ha pasado ninguna función de retorno o **[null](#constant.null)** a [ob_start()](#function.ob-start),
se devuelve "default output handler".
Activar [output_buffering](#ini.output-buffering)
y definir un [output_handler](#ini.output-handler)
equivale a pasar
una [función interna (integrada)](#functions.internal)
a [ob_start()](#function.ob-start).

Si se ha pasado un [callable](#language.types.callable) a [ob_start()](#function.ob-start),
se devuelve el [nombre completamente cualificado](#language.namespaces.basics)
del [callable](#language.types.callable).
Si el [callable](#language.types.callable) es un objeto que implementa
[\_\_invoke()](#language.oop5.magic.invoke),
se devuelve el [nombre completamente cualificado](#language.namespaces.basics)
del método [\_\_invoke()](#language.oop5.magic.invoke) del objeto.
Si el [callable](#language.types.callable) es una [Closure](#class.closure),
se devuelve "Closure::\_\_invoke".

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_list_handlers()**

&lt;?php
// uso de output_buffering=On, sin output_handler definido
var_dump(ob_list_handlers());
ob_end_flush();

// ningún retorno o null
ob_start();
var_dump(ob_list_handlers());

// Función anónima
ob_start(function($string) { return $string; });
var_dump(ob_list_handlers());
ob_end_flush();

// función flecha
ob_start(fn($string) =&gt; $string);
var_dump(ob_list_handlers());
ob_end_flush();

// callable de primera clase
$firstClassCallable = userDefinedFunction(...);

ob_start([$firstClassCallable, '__invoke']);
var_dump(ob_list_handlers());
ob_end_flush();

// función interna (integrada)
ob_start('print_r');
var_dump(ob_list_handlers());
ob_end_flush();

// función definida por el usuario
function userDefinedFunction($string, $flags) { return $string; };

ob_start('userDefinedFunction');
var_dump(ob_list_handlers());
ob_end_flush();

class MyClass {
public static function staticHandle($string) {
return $string;
}

    public static function handle($string) {
        return $string;
    }

    public function __invoke($string) {
        return $string;
    }

}

// clase y método estático
ob_start(['MyClass','staticHandle']);
var_dump(ob_list_handlers());
ob_end_flush();

// objeto y método no estático
ob_start([new MyClass,'handle']);
var_dump(ob_list_handlers());
ob_end_flush();

// objeto invocable
ob_start(new MyClass);
var_dump(ob_list_handlers());
ob_end_flush();
?&gt;

    El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
string(22) "default output handler"
}
array(1) {
[0]=&gt;
string(22) "default output handler"
}
array(1) {
[0]=&gt;
string(7) "print_r"
}
array(1) {
[0]=&gt;
string(19) "userDefinedFunction"
}
array(1) {
[0]=&gt;
string(17) "Closure::**invoke"
}
array(1) {
[0]=&gt;
string(17) "Closure::**invoke"
}
array(1) {
[0]=&gt;
string(17) "Closure::**invoke"
}
array(1) {
[0]=&gt;
string(21) "MyClass::staticHandle"
}
array(1) {
[0]=&gt;
string(15) "MyClass::handle"
}
array(1) {
[0]=&gt;
string(17) "MyClass::**invoke"
}

### Ver también

    - [ob_end_clean()](#function.ob-end-clean) - Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

    - [ob_get_flush()](#function.ob-get-flush) - Vacía (envía) el valor de retorno del gestor de salida activo,

devuelve el contenido del búfer de salida activo y lo desactiva.

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

# ob_start

(PHP 4, PHP 5, PHP 7, PHP 8)

ob_start — Activa el temporizador de salida

### Descripción

**ob_start**([?](#language.types.null)[callable](#language.types.callable) $callback = **[null](#constant.null)**, [int](#language.types.integer) $chunk_size = 0, [int](#language.types.integer) $flags = **[PHP_OUTPUT_HANDLER_STDFLAGS](#constant.php-output-handler-stdflags)**): [bool](#language.types.boolean)

Esta función activa el almacenamiento en búfer de la salida.
Cuando el almacenamiento en búfer está activo, ninguna salida es enviada desde el script;
en su lugar, la salida se almacena en un búfer interno.
Consulte [¿Qué salida está bufferizada?](#outcontrol.what-output-is-buffered)
para saber exactamente qué salidas están afectadas.

Los búferes de salida son apilables, es decir
**ob_start()** puede ser llamada mientras otro búfer está activo.
Si varios búferes de salida están activos,
la salida es filtrada secuencialmente
a través de cada uno de ellos en el orden de anidación.
Consulte [Anidamiento de búferes de salida](#outcontrol.nesting-output-buffers) para más detalles.

Consulte [Búferes de salida a nivel de usuario](#outcontrol.user-level-output-buffers)
para una descripción detallada de los búferes de salida.

### Parámetros

     callback


       Un callback [callable](#language.types.callable) opcional puede ser
       especificado. También puede ser omitido pasando **[null](#constant.null)**.




       callback es invocado cuando el búfer de salida es
       vaciado (enviado), limpiado, o cuando el búfer de salida es vaciado
       al final del script.




       La firma del callback es la siguiente:







        handler([string](#language.types.string) $buffer, [int](#language.types.integer) $phase = ?): [string](#language.types.string)



         buffer


           Contenido del buffer de salida.




         phase


           Máscara de bits de las constantes
           [
            **<a href="#constant.php-output-handler-start">PHP_OUTPUT_HANDLER_*](#constant.php-output-handler-start)**
           </a>.
           Consulte [Flags pasados a los gestores de salida](#outcontrol.flags-passed-to-output-handlers)
           para más detalles.






       Si callback devuelve **[false](#constant.false)**,
       el contenido del búfer es enviado.
       Consulte [Valores de retorno de los gestores de salida](#outcontrol.output-handler-return-values)
       para más detalles.



      **Advertencia**

        Llamar a alguna de las siguientes funciones desde un manejador de salida
        provocará un error fatal:
        [ob_clean()](#function.ob-clean), [ob_end_clean()](#function.ob-end-clean),
        [ob_end_flush()](#function.ob-end-flush), [ob_flush()](#function.ob-flush),
        [ob_get_clean()](#function.ob-get-clean), [ob_get_flush()](#function.ob-get-flush),
        **ob_start()**.





       Consulte [Gestores de salida](#outcontrol.output-handlers)
       y [Trabajar con los gestores de salida](#outcontrol.working-with-output-handlers)
       para más detalles sobre los callbacks (manejadores de salida).






     chunk_size


       Si el parámetro opcional chunk_size es pasado,
       la función de devolución de llamada es llamada cada nueva línea después
       de chunk_size bytes de salida.
       El valor por omisión 0 significa
       que toda la salida es almacenada en búfer hasta que el búfer sea desactivado.
       Consulte [Tamaño del búfer](#outcontrol.buffer-size) para más detalles.






     flags


       El parámetro flags es una máscara que controla
       las operaciones que pueden ser realizadas sobre el búfer de salida.
       Por omisión, permite que el búfer de salida sea limpiado, enviado
       y eliminado, lo cual puede ser definido explícitamente con los
       [
        indicadores de control del búfer
       ](#outcontrol.constants.buffer-control-flags).
       Consulte [Operaciones permitidas en los búferes](#outcontrol.operations-on-buffers)
       para más detalles.




       Cada flag controla el acceso a un conjunto de funciones, tal como se describe
       a continuación:






           Constante
           Funciones






           **[PHP_OUTPUT_HANDLER_CLEANABLE](#constant.php-output-handler-cleanable)**

            [ob_clean()](#function.ob-clean),




           **[PHP_OUTPUT_HANDLER_FLUSHABLE](#constant.php-output-handler-flushable)**

            [ob_flush()](#function.ob-flush),




           **[PHP_OUTPUT_HANDLER_REMOVABLE](#constant.php-output-handler-removable)**

            [ob_end_clean()](#function.ob-end-clean),
            [ob_end_flush()](#function.ob-end-flush) y
            [ob_get_clean()](#function.ob-get-clean).
            [ob_get_flush()](#function.ob-get-flush).







       **Nota**:

         Antes de PHP 8.4.0, el parámetro flags podía definir
         los [flags de estado del manejador de salida](#outcontrol.constants.flags-returned-by-handler) también.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de manejo de salida con función de devolución de llamada**

&lt;?php

function handler($buffer)
{
// reemplaza todas las patatas por zanahorias
return (str_replace("pommes de terre", "carottes", $buffer));
}

ob_start("handler");

?&gt;
&lt;html&gt;
&lt;body&gt;
&lt;p&gt;Es como comparar zanahorias y patatas.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
&lt;?php

ob_end_flush();

?&gt;

    El ejemplo anterior mostrará:

&lt;html&gt;
&lt;body&gt;
&lt;p&gt;Es como comparar zanahorias y zanahorias.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

    **Ejemplo #2 Crea un búfer de salida no eliminable**

&lt;?php

ob_start(null, 0, PHP_OUTPUT_HANDLER_STDFLAGS ^ PHP_OUTPUT_HANDLER_REMOVABLE);

?&gt;

### Ver también

    - [ob_get_contents()](#function.ob-get-contents) - Devuelve el contenido del búfer de salida

    - [ob_end_clean()](#function.ob-end-clean) - Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

    - [ob_implicit_flush()](#function.ob-implicit-flush) - Activa/desactiva el envío implícito

    - [ob_gzhandler()](#function.ob-gzhandler) - Función de recuperación para la compresión automática de pastillas

    - [ob_iconv_handler()](#function.ob-iconv-handler) - Convierte la codificación de caracteres al manejador del buffer de salida

    - [mb_output_handler()](#function.mb-output-handler) - Función de tratamiento de los despliegues

    - [ob_tidyhandler()](#function.ob-tidyhandler) - Función callback de ob_start para reparar el buffer

# output_add_rewrite_var

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

output_add_rewrite_var — Añade una regla de reescritura de URL

### Descripción

**output_add_rewrite_var**([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

Esta función inicia el gestor de búfer de salida 'URL-Rewriter'
si no está activo,
almacena los argumentos name y value,
y cuando el búfer se vacía, reescribe las URLs
y los formularios según los argumentos ini aplicables.
Las llamadas posteriores a esta función almacenarán todas las parejas nombre/valor
adicionales hasta que el gestor sea desactivado.

Cuando el búfer de salida se vacía
(al llamar a [ob_flush()](#function.ob-flush), [ob_end_flush()](#function.ob-end-flush),
[ob_get_flush()](#function.ob-get-flush) o al final del script),
el gestor 'URL-Rewriter' añade las parejas nombre/valor
como argumentos de consulta a las URLs en los atributos de las etiquetas HTML
y añade campos ocultos a los formularios según los valores de
las directivas de configuración [url_rewriter.tags](#ini.url-rewriter.tags) y
[url_rewriter.hosts](#ini.url-rewriter.hosts).

Cada pareja nombre/valor añadida al gestor 'URL-Rewriter'
se añade a las URLs y/o formularios
incluso si esto resulta en argumentos de consulta de URL duplicados
o elementos con los mismos atributos de nombre.

**Nota**:

    Una vez que el gestor 'URL-Rewriter' ha sido desactivado,
    no puede ser reiniciado.

**Advertencia**

    Antes de PHP 8.4.0, los hosts a reescribir se definían en
    [session.trans_sid_hosts](#ini.session.trans-sid-hosts)
    en lugar de [url_rewriter.hosts](#ini.url-rewriter.hosts).

### Parámetros

     name


       El nombre de la variable.






     value


       El valor de la variable.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        A partir de PHP 7.1.0, se utiliza un búfer de salida dedicado,
        [url_rewriter.tags](#ini.url-rewriter.tags)
        se utiliza únicamente para las funciones de salida y
        [url_rewriter.hosts](#ini.url-rewriter.tags) está disponible.
        Anterior a PHP 7.1.0, las variables de reescritura definidas por **output_add_rewrite_var()**
        compartían un búfer de salida con el soporte transparente del ID de sesión
        (ver [session.trans_sid_tags](#ini.session.trans-sid-tags)).





### Ejemplos

    **Ejemplo #1 Ejemplo con output_add_rewrite_var()**

&lt;?php
ini_set('url_rewriter.tags', 'a=href,form=');

output_add_rewrite_var('var', 'value');

// Algunos enlaces
echo '&lt;a href="file.php"&gt;link&lt;/a&gt;
&lt;a href="http://example.com"&gt;link2&lt;/a&gt;';

// un formulario
echo '&lt;form action="script.php" method="post"&gt;
&lt;input type="text" name="var2" /&gt;
&lt;/form&gt;';

print_r(ob_list_handlers());
?&gt;

    El ejemplo anterior mostrará:

&lt;a href="file.php?var=value"&gt;link&lt;/a&gt;
&lt;a href="http://example.com"&gt;link2&lt;/a&gt;

&lt;form action="script.php" method="post"&gt;
&lt;input type="hidden" name="var" value="value" /&gt;
&lt;input type="text" name="var2" /&gt;
&lt;/form&gt;

Array
(
[0] =&gt; URL-Rewriter
)

### Ver también

    - [output_reset_rewrite_vars()](#function.output-reset-rewrite-vars) - Anula la reescritura de URL

    - [ob_flush()](#function.ob-flush) - Vacía (envía) el valor de retorno del manejador de salida activo.

    - [ob_list_handlers()](#function.ob-list-handlers) - Lista los gestores de salida utilizados

    - [url_rewriter.tags](#ini.url-rewriter.tags)

    - [url_rewriter.hosts](#ini.url-rewriter.hosts)

# output_reset_rewrite_vars

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

output_reset_rewrite_vars — Anula la reescritura de URL

### Descripción

**output_reset_rewrite_vars**(): [bool](#language.types.boolean)

Esta función elimina todas las variables de reescritura previamente definidas por
la función [output_add_rewrite_var()](#function.output-add-rewrite-var).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        Antes de PHP 7.1.0, las variables de reescritura definidas por
        [output_add_rewrite_var()](#function.output-add-rewrite-var) utilizaban el mismo buffer de salida
        del módulo de sesión trans sid. Desde PHP 7.1.0, se utiliza un buffer de salida
        dedicado y **output_reset_rewrite_vars()** elimina únicamente las
        vars de reescritura definidas por [output_add_rewrite_var()](#function.output-add-rewrite-var).





### Ejemplos

    **Ejemplo #1 Ejemplo con output_reset_rewrite_vars()**

&lt;?php
ini_set('url_rewriter.tags', 'a=href');

output_add_rewrite_var('var', 'value');

echo '&lt;a href="file.php"&gt;link&lt;/a&gt;';
ob_flush();

output_reset_rewrite_vars();
echo '&lt;a href="file.php"&gt;link&lt;/a&gt;';
?&gt;

    El ejemplo anterior mostrará:

&lt;a href="file.php?var=value"&gt;link&lt;/a&gt;
&lt;a href="file.php"&gt;link&lt;/a&gt;

### Ver también

    - [output_add_rewrite_var()](#function.output-add-rewrite-var) - Añade una regla de reescritura de URL

    - [ob_flush()](#function.ob-flush) - Vacía (envía) el valor de retorno del manejador de salida activo.

    - [ob_list_handlers()](#function.ob-list-handlers) - Lista los gestores de salida utilizados

    - [url_rewriter.tags](#ini.url-rewriter.tags)

    - [url_rewriter.hosts](#ini.url-rewriter.hosts)

    - [session.trans_sid_tags](#ini.session.trans-sid-tags)

    - [session.trans_sid_hosts](#ini.session.trans-sid-hosts)

## Tabla de contenidos

- [flush](#function.flush) — Vacía los búferes de salida del sistema
- [ob_clean](#function.ob-clean) — Limpiar (borrar) el contenido del búfer de salida activo.
- [ob_end_clean](#function.ob-end-clean) — Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.
- [ob_end_flush](#function.ob-end-flush) — Vacía (envía) el valor de retorno del manejador de salida activo
  y desactiva el búfer de salida activo
- [ob_flush](#function.ob-flush) — Vacía (envía) el valor de retorno del manejador de salida activo.
- [ob_get_clean](#function.ob-get-clean) — Obtiene el contenido del búfer de salida activo y lo desactiva
- [ob_get_contents](#function.ob-get-contents) — Devuelve el contenido del búfer de salida
- [ob_get_flush](#function.ob-get-flush) — Vacía (envía) el valor de retorno del gestor de salida activo,
  devuelve el contenido del búfer de salida activo y lo desactiva.
- [ob_get_length](#function.ob-get-length) — Devuelve la longitud del contenido del búfer de salida
- [ob_get_level](#function.ob-get-level) — Devuelve el número de niveles de anidación del sistema de temporización de salida
- [ob_get_status](#function.ob-get-status) — Lee el estado del búfer de salida
- [ob_implicit_flush](#function.ob-implicit-flush) — Activa/desactiva el envío implícito
- [ob_list_handlers](#function.ob-list-handlers) — Lista los gestores de salida utilizados
- [ob_start](#function.ob-start) — Activa el temporizador de salida
- [output_add_rewrite_var](#function.output-add-rewrite-var) — Añade una regla de reescritura de URL
- [output_reset_rewrite_vars](#function.output-reset-rewrite-vars) — Anula la reescritura de URL

- [Introducción](#intro.outcontrol)
- [Instalación/Configuración](#outcontrol.setup)<li>[Configuración en tiempo de ejecución](#outcontrol.configuration)
  </li>- [Constantes predefinidas](#outcontrol.constants)
- [Bufferización de salida](#outcontrol.output-buffering)
- [Vaciar los búferes del sistema](#outcontrol.flushing-system-buffers)
- [Búferes de salida a nivel de usuario](#outcontrol.user-level-output-buffers)<li>[¿Qué salida está bufferizada?](#outcontrol.what-output-is-buffered)
- [Anidamiento de búferes de salida](#outcontrol.nesting-output-buffers)
- [Tamaño del búfer](#outcontrol.buffer-size)
- [Operaciones permitidas en los búferes](#outcontrol.operations-on-buffers)
- [Gestores de salida](#outcontrol.output-handlers)
- [Trabajar con los gestores de salida](#outcontrol.working-with-output-handlers)
- [Flags pasados a los gestores de salida](#outcontrol.flags-passed-to-output-handlers)
- [Valores de retorno de los gestores de salida](#outcontrol.output-handler-return-values)
  </li>- [Ejemplos](#outcontrol.examples)<li>[Uso básico](#outcontrol.examples.basic)
- [Uso de la reescritura de salida](#outcontrol.examples.rewrite)
  </li>- [Funciones del Control de la salida](#ref.outcontrol)<li>[flush](#function.flush) — Vacía los búferes de salida del sistema
- [ob_clean](#function.ob-clean) — Limpiar (borrar) el contenido del búfer de salida activo.
- [ob_end_clean](#function.ob-end-clean) — Elimina (limpia) el contenido del búfer de salida activo y lo desactiva.
- [ob_end_flush](#function.ob-end-flush) — Vacía (envía) el valor de retorno del manejador de salida activo
  y desactiva el búfer de salida activo
- [ob_flush](#function.ob-flush) — Vacía (envía) el valor de retorno del manejador de salida activo.
- [ob_get_clean](#function.ob-get-clean) — Obtiene el contenido del búfer de salida activo y lo desactiva
- [ob_get_contents](#function.ob-get-contents) — Devuelve el contenido del búfer de salida
- [ob_get_flush](#function.ob-get-flush) — Vacía (envía) el valor de retorno del gestor de salida activo,
  devuelve el contenido del búfer de salida activo y lo desactiva.
- [ob_get_length](#function.ob-get-length) — Devuelve la longitud del contenido del búfer de salida
- [ob_get_level](#function.ob-get-level) — Devuelve el número de niveles de anidación del sistema de temporización de salida
- [ob_get_status](#function.ob-get-status) — Lee el estado del búfer de salida
- [ob_implicit_flush](#function.ob-implicit-flush) — Activa/desactiva el envío implícito
- [ob_list_handlers](#function.ob-list-handlers) — Lista los gestores de salida utilizados
- [ob_start](#function.ob-start) — Activa el temporizador de salida
- [output_add_rewrite_var](#function.output-add-rewrite-var) — Añade una regla de reescritura de URL
- [output_reset_rewrite_vars](#function.output-reset-rewrite-vars) — Anula la reescritura de URL
  </li>
