# ZooKeeper

# Introducción

Esta extensión utiliza la biblioteca libzookeeper para proporcionar una API para comunicarse con el servicio ZooKeeper.

ZooKeeper es un proyecto Apache que permite un servicio centralizado para mantener la información de configuración, nombrar, proporcionar sincronización distribuida y proporcionar servicios de grupo.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#zookeeper.requirements)
- [Instalación](#zookeeper.installation)
- [Configuración en tiempo de ejecución](#zookeeper.configuration)

    ## Requerimientos

    Esta extensión requiere [» ZooKeeper](https://zookeeper.apache.org/) C Binding (version 3.4.1 o superior).
    Para más información, véase [» Guía del programador de ZooKeeper](https://zookeeper.apache.org/doc/trunk/zookeeperProgrammers.html#C+Binding).

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/zookeeper](https://pecl.php.net/package/zookeeper).

Para habilitar el soporte de zookeeper, configure con
**--with-libzookeeper-dir=DIR**. DIR es el prefijo de instalación de ZooKeeper C Binding, que debe contener el include/zookeeper/zookeeper.h

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Zookeeper Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [zookeeper.recv_timeout](#ini.zookeeper.recv_timeout)
      10000
      **[INI_ALL](#constant.ini-all)**
       



      [zookeeper.session_lock](#ini.zookeeper.session_lock)
      1
      **[INI_SYSTEM](#constant.ini-system)**
       



      [zookeeper.sess_lock_wait](#ini.zookeeper.sess_lock_wait)
      150000
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     zookeeper.recv_timeout
     [int](#language.types.integer)



      Tiempo máximo de espera predeterminado para todas las sesiones de ZooKeeper.








     zookeeper.session_lock
     [int](#language.types.integer)



      Permite el bloqueo de sesiones PHP.








     zookeeper.sess_lock_wait
     [int](#language.types.integer)



      Tiempo de espera en microsegundos para los intentos de bloqueo de la sesión PHP.
      Se debe tener precaución al definir este valor. Los valores válidos son enteros,
      donde 0 se interpreta como el valor predeterminado.
      Los valores negativos provocan un bloqueo reducido a un intento de bloqueo.


# ZooKeeper Funciones

# zookeeper_dispatch

(PECL zookeeper &gt;= 0.4.0)

zookeeper_dispatch — Llama a las funciones de devolución de llamada para las operaciones pendientes

### Descripción

**zookeeper_dispatch**(): [void](language.types.void.html)

La función **zookeeper_dispatch()** llama a las funciones de devolución de llamada pasadas por las operaciones como [Zookeeper::get()](#zookeeper.get) o [Zookeeper::exists()](#zookeeper.exists).

**Precaución**

    Desde la versión 0.4.0, esta función debe ser llamada manualmente para realizar operaciones asíncronas. Si desea que esto se haga automáticamente, también puede declarar ticks al inicio de su programa.

Después de PHP 7.1, puede ignorar esta función. Esta extensión usa EG(vm_interrupt) para implementar la distribución asíncrona.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Este método emite una alerta PHP cuando la función de devolución de llamada no puede ser invocada.

### Ejemplos

**Ejemplo #1 Ejemplo de zookeeper_dispatch()** #1

     Distribuir manualmente las funciones de devolución de llamada.

&lt;?php
$client = new Zookeeper();
$client-&gt;connect('localhost:2181');
$client-&gt;get('/zookeeper', function() {
echo "Callback was called".PHP_EOL;
});
while(true) {
sleep(1);
zookeeper_dispatch();
}
?&gt;

**Ejemplo #2 Ejemplo de zookeeper_dispatch()** #2

     Declarar ticks.

&lt;?php
declare(ticks=1);

$client = new Zookeeper();
$client-&gt;connect('localhost:2181');
$client-&gt;get('/zookeeper', function() {
echo "Callback was called".PHP_EOL;
});
while(true) {
sleep(1);
}
?&gt;

### Ver también

    - [Zookeeper::addAuth()](#zookeeper.addauth) - Especifica la información de autenticación de la aplicación

    - [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

    - [Zookeeper::__construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

    - [Zookeeper::exists()](#zookeeper.exists) - Comprueba la existencia de un nodo de forma sincrónica

    - [Zookeeper::get()](#zookeeper.get) - Devuelve los datos asociados a un nodo de forma sincrónica

    - [Zookeeper::getChildren()](#zookeeper.getchildren) - Lista los hijos de un nodo de forma sincrónica

    - [Zookeeper::setWatcher()](#zookeeper.setwatcher) - Define una función de observación

## Tabla de contenidos

- [zookeeper_dispatch](#function.zookeeper-dispatch) — Llama a las funciones de devolución de llamada para las operaciones pendientes

# La clase Zookeeper

(PECL zookeeper &gt;= 0.1.0)

## Introducción

    Representa la sesión de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **Zookeeper**


     {



    /* Métodos */

public
[\_\_construct](#zookeeper.construct)([string](#language.types.string) $host = '', [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**, [int](#language.types.integer) $recv_timeout = 10000)

    public

[addAuth](#zookeeper.addauth)([string](#language.types.string) $scheme, [string](#language.types.string) $cert, [callable](#language.types.callable) $completion_cb = **[null](#constant.null)**): [bool](#language.types.boolean)
public
   [close](#zookeeper.close)(): [void](language.types.void.html)
public
   [connect](#zookeeper.connect)([string](#language.types.string) $host, [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**, [int](#language.types.integer) $recv_timeout = 10000): [void](language.types.void.html)
public
   [create](#zookeeper.create)(
    [string](#language.types.string) $path,
    [string](#language.types.string) $value,
    [array](#language.types.array) $acls,
    [int](#language.types.integer) $flags = **[null](#constant.null)**
): [string](#language.types.string)
public
   [delete](#zookeeper.delete)([string](#language.types.string) $path, [int](#language.types.integer) $version = -1): [bool](#language.types.boolean)
public
   [exists](#zookeeper.exists)([string](#language.types.string) $path, [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**): [array](#language.types.array)
public
   [get](#zookeeper.get)(
    [string](#language.types.string) $path,
    [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$stat = **[null](#constant.null)**,
    [int](#language.types.integer) $max_size = 0
): [string](#language.types.string)
public
   [getAcl](#zookeeper.getacl)([string](#language.types.string) $path): [array](#language.types.array)
public
   [getChildren](#zookeeper.getchildren)([string](#language.types.string) $path, [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**): [array](#language.types.array)
public
   [getClientId](#zookeeper.getclientid)(): [int](#language.types.integer)
public
   [getConfig](#zookeeper.getconfig)(): [ZookeeperConfig](#class.zookeeperconfig)
public
   [getRecvTimeout](#zookeeper.getrecvtimeout)(): [int](#language.types.integer)
public
   [getState](#zookeeper.getstate)(): [int](#language.types.integer)
public
   [isRecoverable](#zookeeper.isrecoverable)(): [bool](#language.types.boolean)
public
   [set](#zookeeper.set)(
    [string](#language.types.string) $path,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $version = -1,
    [array](#language.types.array) &amp;$stat = **[null](#constant.null)**
): [bool](#language.types.boolean)
public
[setAcl](#zookeeper.setacl)([string](#language.types.string) $path, [int](#language.types.integer) $version, [array](#language.types.array) $acl): [bool](#language.types.boolean)
public
static
[setDebugLevel](#zookeeper.setdebuglevel)([int](#language.types.integer) $logLevel): [bool](#language.types.boolean)
public
static
[setDeterministicConnOrder](#zookeeper.setdeterministicconnorder)([bool](#language.types.boolean) $yesOrNo): [bool](#language.types.boolean)
public
[setLogStream](#zookeeper.setlogstream)([resource](#language.types.resource) $stream): [bool](#language.types.boolean)
public
[setWatcher](#zookeeper.setwatcher)([callable](#language.types.callable) $watcher_cb): [bool](#language.types.boolean)

    /* Constantes */

     const
     [int](#language.types.integer)
      [PERM_READ](#zookeeper.constants.perm-read) = 1;

    const
     [int](#language.types.integer)
      [PERM_WRITE](#zookeeper.constants.perm-write) = 2;

    const
     [int](#language.types.integer)
      [PERM_CREATE](#zookeeper.constants.perm-create) = 4;

    const
     [int](#language.types.integer)
      [PERM_DELETE](#zookeeper.constants.perm-delete) = 8;

    const
     [int](#language.types.integer)
      [PERM_ADMIN](#zookeeper.constants.perm-admin) = 16;

    const
     [int](#language.types.integer)
      [PERM_ALL](#zookeeper.constants.perm-all) = 31;


    const
     [int](#language.types.integer)
      [EPHEMERAL](#zookeeper.constants.ephemeral) = 1;

    const
     [int](#language.types.integer)
      [SEQUENCE](#zookeeper.constants.sequence) = 2;


    const
     [int](#language.types.integer)
      [LOG_LEVEL_ERROR](#zookeeper.constants.log-level-error) = 1;

    const
     [int](#language.types.integer)
      [LOG_LEVEL_WARN](#zookeeper.constants.log-level-warn) = 2;

    const
     [int](#language.types.integer)
      [LOG_LEVEL_INFO](#zookeeper.constants.log-level-info) = 3;

    const
     [int](#language.types.integer)
      [LOG_LEVEL_DEBUG](#zookeeper.constants.log-level-debug) = 4;


    const
     [int](#language.types.integer)
      [EXPIRED_SESSION_STATE](#zookeeper.constants.expired-session-state) = -112;

    const
     [int](#language.types.integer)
      [AUTH_FAILED_STATE](#zookeeper.constants.auth-failed-state) = -113;

    const
     [int](#language.types.integer)
      [CONNECTING_STATE](#zookeeper.constants.connecting-state) = 1;

    const
     [int](#language.types.integer)
      [ASSOCIATING_STATE](#zookeeper.constants.associating-state) = 2;

    const
     [int](#language.types.integer)
      [CONNECTED_STATE](#zookeeper.constants.connected-state) = 3;

    const
     [int](#language.types.integer)
      [READONLY_STATE](#zookeeper.constants.readonly-state) = 5;

    const
     [int](#language.types.integer)
      [NOTCONNECTED_STATE](#zookeeper.constants.notconnected-state) = 999;


    const
     [int](#language.types.integer)
      [CREATED_EVENT](#zookeeper.constants.created-event) = 1;

    const
     [int](#language.types.integer)
      [DELETED_EVENT](#zookeeper.constants.deleted-event) = 2;

    const
     [int](#language.types.integer)
      [CHANGED_EVENT](#zookeeper.constants.changed-event) = 3;

    const
     [int](#language.types.integer)
      [CHILD_EVENT](#zookeeper.constants.child-event) = 4;

    const
     [int](#language.types.integer)
      [SESSION_EVENT](#zookeeper.constants.session-event) = -1;

    const
     [int](#language.types.integer)
      [NOTWATCHING_EVENT](#zookeeper.constants.notwatching-event) = -2;


    const
     [int](#language.types.integer)
      [SYSTEMERROR](#zookeeper.constants.systemerror) = -1;

    const
     [int](#language.types.integer)
      [RUNTIMEINCONSISTENCY](#zookeeper.constants.runtimeinconsistency) = -2;

    const
     [int](#language.types.integer)
      [DATAINCONSISTENCY](#zookeeper.constants.datainconsistency) = -3;

    const
     [int](#language.types.integer)
      [CONNECTIONLOSS](#zookeeper.constants.connectionloss) = -4;

    const
     [int](#language.types.integer)
      [MARSHALLINGERROR](#zookeeper.constants.marshallingerror) = -5;

    const
     [int](#language.types.integer)
      [UNIMPLEMENTED](#zookeeper.constants.unimplemented) = -6;

    const
     [int](#language.types.integer)
      [OPERATIONTIMEOUT](#zookeeper.constants.operationtimeout) = -7;

    const
     [int](#language.types.integer)
      [BADARGUMENTS](#zookeeper.constants.badarguments) = -8;

    const
     [int](#language.types.integer)
      [INVALIDSTATE](#zookeeper.constants.invalidstate) = -9;

    const
     [int](#language.types.integer)
      [NEWCONFIGNOQUORUM](#zookeeper.constants.newconfignoquorum) = -13;

    const
     [int](#language.types.integer)
      [RECONFIGINPROGRESS](#zookeeper.constants.reconfiginprogress) = -14;


    const
     [int](#language.types.integer)
      [OK](#zookeeper.constants.ok) = 0;

    const
     [int](#language.types.integer)
      [APIERROR](#zookeeper.constants.apierror) = -100;

    const
     [int](#language.types.integer)
      [NONODE](#zookeeper.constants.nonode) = -101;

    const
     [int](#language.types.integer)
      [NOAUTH](#zookeeper.constants.noauth) = -102;

    const
     [int](#language.types.integer)
      [BADVERSION](#zookeeper.constants.badversion) = -103;

    const
     [int](#language.types.integer)
      [NOCHILDRENFOREPHEMERALS](#zookeeper.constants.nochildrenforephemerals) = -108;

    const
     [int](#language.types.integer)
      [NODEEXISTS](#zookeeper.constants.nodeexists) = -110;

    const
     [int](#language.types.integer)
      [NOTEMPTY](#zookeeper.constants.notempty) = -111;

    const
     [int](#language.types.integer)
      [SESSIONEXPIRED](#zookeeper.constants.sessionexpired) = -112;

    const
     [int](#language.types.integer)
      [INVALIDCALLBACK](#zookeeper.constants.invalidcallback) = -113;

    const
     [int](#language.types.integer)
      [INVALIDACL](#zookeeper.constants.invalidacl) = -114;

    const
     [int](#language.types.integer)
      [AUTHFAILED](#zookeeper.constants.authfailed) = -115;

    const
     [int](#language.types.integer)
      [CLOSING](#zookeeper.constants.closing) = -116;

    const
     [int](#language.types.integer)
      [NOTHING](#zookeeper.constants.nothing) = -117;

    const
     [int](#language.types.integer)
      [SESSIONMOVED](#zookeeper.constants.sessionmoved) = -118;

    const
     [int](#language.types.integer)
      [NOTREADONLY](#zookeeper.constants.notreadonly) = -119;

    const
     [int](#language.types.integer)
      [EPHEMERALONLOCALSESSION](#zookeeper.constants.ephemeralonlocalsession) = -120;

    const
     [int](#language.types.integer)
      [NOWATCHER](#zookeeper.constants.nowatcher) = -121;

    const
     [int](#language.types.integer)
      [RECONFIGDISABLED](#zookeeper.constants.reconfigdisabled) = -122;

}

## Constantes predefinidas

    ## Permisos ZooKeeper




      **[Zookeeper::PERM_READ](#zookeeper.constants.perm-read)**

       Puede leer el valor de los nodos y enumerar sus hijos





      **[Zookeeper::PERM_WRITE](#zookeeper.constants.perm-write)**

       Puede establecer el valor de los nodos





      **[Zookeeper::PERM_CREATE](#zookeeper.constants.perm-create)**

       Puede crear hijos





      **[Zookeeper::PERM_DELETE](#zookeeper.constants.perm-delete)**

       Puede eliminar hijos





      **[Zookeeper::PERM_ADMIN](#zookeeper.constants.perm-admin)**

       Puede ejecutar set_acl()





      **[Zookeeper::PERM_ALL](#zookeeper.constants.perm-all)**

       Todas las flags anteriores ORd together











    ## ZooKeeper Create Flags




      **[Zookeeper::EPHEMERAL](#zookeeper.constants.ephemeral)**

       Si la flag Zookeeper::EPHEMERAL es establecida, el nodo se eliminará automáticamente si la sesión del cliente desaparece.





      **[Zookeeper::SEQUENCE](#zookeeper.constants.sequence)**

       Si la flag Zookeeper::SEQUENCE flag es establecida, un número de secuencia ascendente único se añade al nombre de la ruta. El número de secuencia es siempre de longitud fija de 10 dígitos, 0 relleno.










    ## ZooKeeper Log Levels




      **[Zookeeper::LOG_LEVEL_ERROR](#zookeeper.constants.log-level-error)**

       Emite sólo mensajes de error





      **[Zookeeper::LOG_LEVEL_WARN](#zookeeper.constants.log-level-warn)**

       Emite errores/advertencias





      **[Zookeeper::LOG_LEVEL_INFO](#zookeeper.constants.log-level-info)**

       Emite grandes mensajes de acción además de errores/advertencias





      **[Zookeeper::LOG_LEVEL_DEBUG](#zookeeper.constants.log-level-debug)**

       Emite todo











    ## ZooKeeper States




      **[Zookeeper::EXPIRED_SESSION_STATE](#zookeeper.constants.expired-session-state)**

       Conectado pero la sesión expiró





      **[Zookeeper::AUTH_FAILED_STATE](#zookeeper.constants.auth-failed-state)**

       Conectado pero la autentificación falló





      **[Zookeeper::CONNECTING_STATE](#zookeeper.constants.connecting-state)**

       Conectando





      **[Zookeeper::ASSOCIATING_STATE](#zookeeper.constants.associating-state)**

       Asociando





      **[Zookeeper::CONNECTED_STATE](#zookeeper.constants.connected-state)**

       Conectado





      **[Zookeeper::READONLY_STATE](#zookeeper.constants.readonly-state)**

       TODO: Ayúdanos a mejorar esta extensión.





      **[Zookeeper::NOTCONNECTED_STATE](#zookeeper.constants.notconnected-state)**

       La conexión falló











    ## Tipos de relojes ZooKeeper




      **[Zookeeper::CREATED_EVENT](#zookeeper.constants.created-event)**

       Se ha creado un nodo


       Esto sólo se genera por los relojes en nodos inexistentes. Estos relojes se ajustan usando Zookeeper::exists.





      **[Zookeeper::DELETED_EVENT](#zookeeper.constants.deleted-event)**

       Se ha eliminado un nodo


       Esto sólo se genera por los relojes de los nodos. Estos relojes se ajustan usando Zookeeper::exists and Zookeeper::get.





      **[Zookeeper::CHANGED_EVENT](#zookeeper.constants.changed-event)**

       Un nodo ha cambiado


       Esto sólo lo generan los relojes de los nodos. Estos relojes se ajustan usando Zookeeper::exists and Zookeeper::get.





      **[Zookeeper::CHILD_EVENT](#zookeeper.constants.child-event)**

       Un cambio como el ocurrido en la lista de hijos


       Esto sólo se genera por los relojes en la lista de hijos de un nodo. Estos relojes se ajustan usando Zookeeper::getChildren.





      **[Zookeeper::SESSION_EVENT](#zookeeper.constants.session-event)**

       Se ha perdido una sesión


       Esto se genera cuando un cliente pierde el contacto o se reconecta con un servidor.





      **[Zookeeper::NOTWATCHING_EVENT](#zookeeper.constants.notwatching-event)**

       Se ha quitado un reloj


       Esto se genera cuando el servidor, por alguna razón, probablemente una limitación de recursos, ya no vigila un nodo para un cliente.











    ## Errores del sistema y del servidor ZooKeeper



      **[Zookeeper::SYSTEMERROR](#zookeeper.constants.systemerror)**

       Esto nunca es lanzado por el servidor, no debe ser usado más que para indicar un rango. Específicamente códigos de error mayores que este valor, pero menores que Zookeeper::APIERROR, son errores del sistema.





      **[Zookeeper::RUNTIMEINCONSISTENCY](#zookeeper.constants.runtimeinconsistency)**

       Se encontró una inconsistencia en el tiempo de ejecución.





      **[Zookeeper::DATAINCONSISTENCY](#zookeeper.constants.datainconsistency)**

       Se encontró una inconsistencia en los datos.





      **[Zookeeper::CONNECTIONLOSS](#zookeeper.constants.connectionloss)**

       Se ha perdido la conexión con el servidor.





      **[Zookeeper::MARSHALLINGERROR](#zookeeper.constants.marshallingerror)**

       Error al ordenar o desordenar los datos.





      **[Zookeeper::UNIMPLEMENTED](#zookeeper.constants.unimplemented)**

       La operación no se ha llevado a cabo.





      **[Zookeeper::OPERATIONTIMEOUT](#zookeeper.constants.operationtimeout)**

       Tiempo de espera de la operación.





      **[Zookeeper::BADARGUMENTS](#zookeeper.constants.badarguments)**

       Argumentos inválidos.





      **[Zookeeper::INVALIDSTATE](#zookeeper.constants.invalidstate)**

       Estado de zhandle inválido.





      **[Zookeeper::NEWCONFIGNOQUORUM](#zookeeper.constants.newconfignoquorum)**

       Ningún grupo de nueva configuración está conectado y actualizado con el líder de la última configuración realizada. - intente invocar la reconfiguración después de que los nuevos servidores estén conectados y sincronizados.


       Disponible a partir de ZooKeeper 3.5.0





      **[Zookeeper::RECONFIGINPROGRESS](#zookeeper.constants.reconfiginprogress)**

       Se solicita una reconfiguración mientras se está llevando a cabo otra reconfiguración. Esto no se soporta actualmente. Por favor, vuelva a intentarlo..


       Disponible a partir de ZooKeeper 3.5.0










    ## Errores de la API ZooKeeper



      **[Zookeeper::OK](#zookeeper.constants.ok)**

       Todo está bien.





      **[Zookeeper::APIERROR](#zookeeper.constants.apierror)**

       Esto nunca es lanzado por el servidor, no debe usarse más que para indicar un rango. Específicamente los códigos de error mayores que este valor son errores de la API (mientras que los valores inferiores a éste indican una Zookeeper::SYSTEMERROR).





      **[Zookeeper::NONODE](#zookeeper.constants.nonode)**

       El nodo no existe.





      **[Zookeeper::NOAUTH](#zookeeper.constants.noauth)**

       No está autentificado.





      **[Zookeeper::BADVERSION](#zookeeper.constants.badversion)**

       Conflicto de versiones.





      **[Zookeeper::NOCHILDRENFOREPHEMERALS](#zookeeper.constants.nochildrenforephemerals)**

       Los nodos efímeros pueden no tener hijos.





      **[Zookeeper::NODEEXISTS](#zookeeper.constants.nodeexists)**

       El nodo ya existe.





      **[Zookeeper::NOTEMPTY](#zookeeper.constants.notempty)**

       El nodo tiene hijos.





      **[Zookeeper::SESSIONEXPIRED](#zookeeper.constants.sessionexpired)**

       La sesión ha expirado por el servidor.





      **[Zookeeper::INVALIDCALLBACK](#zookeeper.constants.invalidcallback)**

       Se especificó una devolución de llamada inválida.





      **[Zookeeper::INVALIDACL](#zookeeper.constants.invalidacl)**

       Se especificó un LCA inválido.





      **[Zookeeper::AUTHFAILED](#zookeeper.constants.authfailed)**

       La autentificación del cliente falló.





      **[Zookeeper::CLOSING](#zookeeper.constants.closing)**

       ZooKeeper está cerrando.





      **[Zookeeper::NOTHING](#zookeeper.constants.nothing)**

       (no error) No hay respuestas del servidor al proceso.





      **[Zookeeper::SESSIONMOVED](#zookeeper.constants.sessionmoved)**

       La sesión se movió a otro servidor, así que la operación es ignorada.





      **[Zookeeper::NOTREADONLY](#zookeeper.constants.notreadonly)**

       La solicitud de cambio de estado se pasa al servidor de sólo lectura.





      **[Zookeeper::EPHEMERALONLOCALSESSION](#zookeeper.constants.ephemeralonlocalsession)**

       Intentar crear un nodo efímero en una sesión local.





      **[Zookeeper::NOWATCHER](#zookeeper.constants.nowatcher)**

       El observador no pudo ser encontrado.





      **[Zookeeper::RECONFIGDISABLED](#zookeeper.constants.reconfigdisabled)**

       Intentar realizar una operación de reconfiguración cuando la función de reconfiguración está desactivada.





# Zookeeper::addAuth

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::addAuth — Especifica la información de autenticación de la aplicación

### Descripción

public
**Zookeeper::addAuth**([string](#language.types.string) $scheme, [string](#language.types.string) $cert, [callable](#language.types.callable) $completion_cb = **[null](#constant.null)**): [bool](#language.types.boolean)

La aplicación llama a esta función para especificar su información de autenticación. El servidor usará el proveedor de seguridad especificado por el parámetro scheme para autenticar la conexión del cliente. Si la solicitud de autenticación falla: - la conexión del servidor se abandona. - el observador es llamado con el valor ZOO_AUTH_FAILED_STATE como parámetro de estado.

### Parámetros

    scheme


      El id del esquema de autenticación. Soportado nativamente: "digest" autenticación basada en contraseña.






    cert


      La información de autenticación de la aplicación. El valor real depende del esquema.






    completion_cb


      La rutina a invocar cuando la solicitud ha terminado. Uno de los siguientes códigos de resultado puede ser pasado a la función de devolución de llamada de finalización:
        - ZOK la operación se completó con éxito
        - ZAUTHFAILED la autenticación falló


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia PHP cuando el número de parámetros o los tipos son incorrectos o cuando la operación falla.

**Precaución**

      Desde la versión 0.3.0, este método emite [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::addAuth()**

     Añade la autenticación antes de solicitar el valor del nodo.

&lt;?php
$zookeeper = new Zookeeper('localhost:2181');
$path = '/path/to/node';
$value = 'nodevalue';
$zookeeper-&gt;set($path, $value);

$zookeeper-&gt;addAuth('digest', 'user0:passwd0');
$r = $zookeeper-&gt;get($path);
if ($r)
echo $r;
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

nodevalue

### Ver también

- [Zookeeper::create()](#zookeeper.create) - Crear un nodo de forma sincrónica

- [Zookeeper::setAcl()](#zookeeper.setacl) - Establece la ACL asociada a un nodo de forma sincrónica

- [Zookeeper::getAcl()](#zookeeper.getacl) - Devuelve las ACL asociadas a un nodo de forma sincrónica

- [Estado de ZooKeeper](#zookeeper.constants.states)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::close

(PECL zookeeper &gt;= 0.5.0)

Zookeeper::close — Cierra la conexión con el servidor ZooKeeper y libera los recursos asociados

### Descripción

public
**Zookeeper::close**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados al cerrar una instancia no inicializada.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::connect

(PECL zookeeper &gt;= 0.2.0)

Zookeeper::connect — Crea un manejador para comunicarse con Zookeeper

### Descripción

public
**Zookeeper::connect**([string](#language.types.string) $host, [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**, [int](#language.types.integer) $recv_timeout = 10000): [void](language.types.void.html)

Este método crea una nueva conexión y una sesión zookeeper que corresponde a esa conexión. El establecimiento
de la sesión es asíncrono, lo que significa que la sesión no debe considerarse establecida hasta que se reciba
un evento ZOO_CONNECTED_STATE.

### Parámetros

    host


      Separados por comas, cada par host:puerto corresponde a un servidor zk. Por ejemplo, «127.0.0.1:3000,127.0.0.1:3001,127.0.0.1:3002».






    watcher_cb


      La función de devolución de llamada de observación global. Cuando se activen las notificaciones, se invocará esta función.






    recv_timeout


      El tiempo de espera para esta sesión, sólo válido si la conexión está actualmente conectada (es decir, el último estado del observador es ZOO_CONNECTED_STATE).


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Este método emite un error/advertencia de PHP si el número de parámetros o tipos es incorrecto o si la instancia no ha podido ser inicializada.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::\_\_construct

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::\_\_construct — Crea un manejador para comunicarse con Zookeeper

### Descripción

public
**Zookeeper::\_\_construct**([string](#language.types.string) $host = '', [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**, [int](#language.types.integer) $recv_timeout = 10000)

Este método crea una nueva conexión y una sesión zookeeper que corresponde a ese handle. El establecimiento de la sesión es asíncrono, lo que significa que la sesión no debe considerarse establecida hasta que se reciba un evento ZOO_CONNECTED_STATE.

### Parámetros

    host


      Separados por comas, cada par host:puerto corresponde a un servidor zk. Por ejemplo, «127.0.0.1:3000,127.0.0.1:3001,127.0.0.1:3002».






    watcher_cb


      La función de devolución de llamada de observación global. Cuando se activen las notificaciones, se invocará esta función.






    recv_timeout


      El tiempo de espera para esta sesión, sólo válido si la conexión está actualmente conectada (es decir, el último estado del observador es ZOO_CONNECTED_STATE).


### Errores/Excepciones

Este método emite un error/advertencia de PHP si el número de parámetros o tipos es incorrecto o si la instancia no ha podido ser inicializada.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::create

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::create — Crear un nodo de forma sincrónica

### Descripción

public
**Zookeeper::create**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $value,
    [array](#language.types.array) $acls,
    [int](#language.types.integer) $flags = **[null](#constant.null)**
): [string](#language.types.string)

Este método crea un nodo en ZooKeeper. Sólo se puede crear un nodo si aún no existe. Las banderas de creación
afectan a la creación de nodos. Si se establece el indicador ZOO_EPHEMERAL, el nodo se eliminará automáticamente
si desaparece la sesión del cliente. Si el indicador ZOO_SEQUENCE está activado, se añade un número de secuencia
ascendente único al nombre de la ruta.

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    value


      Los datos que se almacenarán en el nodo.






    acls


      La ACL inicial del nodo. La ACL no debe ser nula ni estar vacía.






    flags


      Este parámetro puede establecerse en 0 para una creación normal o en una combinación OR de las banderas de creación.


### Valores devueltos

Devuelve la ruta del nuevo nodo (puede ser diferente de la ruta suministrada debido a la bandera ZOO_SEQUENCE) en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia de PHP si el número de parámetros o tipos es incorrecto o si la creación del nodo ha fallado.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Zookeeper::create()** example

     Crea un nuevo nodo.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$aclArray = array(
array(
'perms' =&gt; Zookeeper::PERM_ALL,
'scheme' =&gt; 'world',
'id' =&gt; 'anyone',
)
);
$path = '/path/to/newnode';
$realPath = $zookeeper-&gt;create($path, null, $aclArray);
if ($realPath)
echo $realPath;
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

/path/to/newnode

### Ver también

- [Zookeeper::delete()](#zookeeper.delete) - Elimina un nodo de forma sincrónica

- [Zookeeper::getChildren()](#zookeeper.getchildren) - Lista los hijos de un nodo de forma sincrónica

- [Permisos de ZooKeeper](#zookeeper.constants.perms)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::delete

(PECL zookeeper &gt;= 0.2.0)

Zookeeper::delete — Elimina un nodo de forma sincrónica

### Descripción

public
**Zookeeper::delete**([string](#language.types.string) $path, [int](#language.types.integer) $version = -1): [bool](#language.types.boolean)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    version


      La versión esperada del nodo. La función fallará si la versión actual del nodo no coincide con la versión esperada.
      Si se utiliza -1, la comprobación de la versión no tendrá lugar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia de PHP si el número de parámetros o los tipos son incorrectos o si la eliminación del nodo ha fallado.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::delete()**

     Elimina un nodo existente.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$path = '/path/to/node';
$r = $zookeeper-&gt;delete($path);
if ($r)
echo 'SUCCESS';
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

SUCCESS

### Ver también

- [Zookeeper::create()](#zookeeper.create) - Crear un nodo de forma sincrónica

- [Zookeeper::getChildren()](#zookeeper.getchildren) - Lista los hijos de un nodo de forma sincrónica

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::exists

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::exists — Comprueba la existencia de un nodo de forma sincrónica

### Descripción

public
**Zookeeper::exists**([string](#language.types.string) $path, [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**): [array](#language.types.array)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    watcher_cb


      Si es distinto de cero, se establecerá un observador en el servidor para notificar al cliente si el nodo cambia.
      El observador se activará incluso si el nodo no existe.


### Valores devueltos

Devuelve el valor stat de la ruta si el nodo dado existe, en caso contrario false.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el número de parámetros o los tipos son incorrectos o la comprobación de existencia del nodo ha fallado.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::exists()**

     Comprueba la existencia de un nodo.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$path = '/path/to/node';
$r = $zookeeper-&gt;exists($path);
if ($r)
echo 'EXISTS';
else
echo 'N/A or ERR';
?&gt;

El ejemplo anterior mostrará:

EXISTS

### Ver también

- [Zookeeper::get()](#zookeeper.get) - Devuelve los datos asociados a un nodo de forma sincrónica

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::get

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::get — Devuelve los datos asociados a un nodo de forma sincrónica

### Descripción

public
**Zookeeper::get**(
    [string](#language.types.string) $path,
    [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$stat = **[null](#constant.null)**,
    [int](#language.types.integer) $max_size = 0
): [string](#language.types.string)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    watcher_cb


      Si es distinto de cero, se definirá un observador en el servidor para notificar al cliente si cambia el nodo.






    stat


      Si no es NULL, contendrá el valor de las estadísticas de la ruta devuelta.






    max_size


      El tamaño máximo de los datos. Si se utiliza 0, este método devolverá todos los datos.


### Valores devueltos

Devuelve datos en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia de PHP si el número de parámetros o los tipos son incorrectos,
o si la recuperación de datos ha fallado.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::get()**

     Recupera el valor del nodo.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$path = '/path/to/node';
$value = 'nodevalue';
$zookeeper-&gt;set($path, $value);

$r = $zookeeper-&gt;get($path);
if ($r)
echo $r;
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

nodevalue

**Ejemplo #2 Ejemplo de estadísticas de Zookeeper::get()**

     Devuelve información estadística del nodo.

&lt;?php
$zookeeper = new Zookeeper('localhost:2181');
$path = '/path/to/node';
$stat = [];
$zookeeper-&gt;get($path, null, $stat);
var_dump($stat);
?&gt;

El ejemplo anterior mostrará:

array(11) {
["czxid"]=&gt;
float(0)
["mzxid"]=&gt;
float(0)
["ctime"]=&gt;
float(0)
["mtime"]=&gt;
float(0)
["version"]=&gt;
int(0)
["cversion"]=&gt;
int(-2)
["aversion"]=&gt;
int(0)
["ephemeralOwner"]=&gt;
float(0)
["dataLength"]=&gt;
int(0)
["numChildren"]=&gt;
int(2)
["pzxid"]=&gt;
float(0)
}

### Ver también

- [Zookeeper::set()](#zookeeper.set) - Define los datos asociados a un nodo

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::getAcl

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::getAcl — Devuelve las ACL asociadas a un nodo de forma sincrónica

### Descripción

public
**Zookeeper::getAcl**([string](#language.types.string) $path): [array](#language.types.array)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.


### Valores devueltos

Devuelve un array de ACLs en caso de éxito y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia de PHP si el número de parámetros o los tipos son incorrectos
o si no se han podido recuperar las ACL del nodo.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::getAcl()**

     Devuelve las ACL de un nodo.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$aclArray = array(
array(
'perms' =&gt; Zookeeper::PERM_ALL,
'scheme' =&gt; 'world',
'id' =&gt; 'anyone',
)
);
$path = '/path/to/newnode';
$zookeeper-&gt;setAcl($path, $aclArray);

$r = $zookeeper-&gt;getAcl($path);
if ($r)
  var_dump($r);
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
array(3) {
["perms"]=&gt;
int(31)
["scheme"]=&gt;
string(5) "world"
["id"]=&gt;
string(6) "anyone"
}
}

### Ver también

- [Zookeeper::create()](#zookeeper.create) - Crear un nodo de forma sincrónica

- [Zookeeper::setAcl()](#zookeeper.setacl) - Establece la ACL asociada a un nodo de forma sincrónica

- [Permisos de ZooKeeper](#zookeeper.constants.perms)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::getChildren

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::getChildren — Lista los hijos de un nodo de forma sincrónica

### Descripción

public
**Zookeeper::getChildren**([string](#language.types.string) $path, [callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**): [array](#language.types.array)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    watcher_cb


      Si es distinto de cero, se definirá un observador en el servidor para notificar al cliente si cambia el nodo.


### Valores devueltos

Devuelve un array con las rutas de los hijos en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia PHP cuando el número de parámetros o tipos son incorrectos, o cuando la lista de hijos de un nodo ha fallado.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::getChildren()**

     Lista los hijos de un nodo.

&lt;?php

$zookeeper = new Zookeeper('locahost:2181');
$path = '/zookeeper';
$r = $zookeeper-&gt;getchildren($path);

if ($r) {
    var_dump($r);
} else {
echo 'ERR';
}

?&gt;

El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
string(6) "config"
}

### Ver también

- [Zookeeper::create()](#zookeeper.create) - Crear un nodo de forma sincrónica

- [Zookeeper::delete()](#zookeeper.delete) - Elimina un nodo de forma sincrónica

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::getClientId

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::getClientId — Devuelve el identificador de sesión del cliente, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE).

### Descripción

public
**Zookeeper::getClientId**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de sesión del cliente en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el cliente no ha podido obtener el identificador de sesión.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::getState()](#zookeeper.getstate) - Devuelve el estado de la conexión zookeeper

- [Estados de ZooKeeper](#zookeeper.constants.states)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::getConfig

(PECL zookeeper &gt;= 0.6.0, ZooKeeper &gt;= 3.5.0)

Zookeeper::getConfig — Devuelve la instancia de ZookeeperConfig

### Descripción

public
**Zookeeper::getConfig**(): [ZookeeperConfig](#class.zookeeperconfig)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la instancia de [ZookeeperConfig](#class.zookeeperconfig).

### Ver también

- [ZookeeperConfig](#class.zookeeperconfig)

# Zookeeper::getRecvTimeout

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::getRecvTimeout — Devuelve el tiempo de espera para esta sesión, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE). Este valor puede cambiar tras una reconexión con el servidor.

### Descripción

public
**Zookeeper::getRecvTimeout**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo de espera para esta sesión en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia PHP cuando la operación falla.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::getState

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::getState — Devuelve el estado de la conexión zookeeper

### Descripción

public
**Zookeeper::getState**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el estado de la conexión zookeeper en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia PHP cuando no se puede obtener el estado de la conexión zookeeper.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::getClientId()](#zookeeper.getclientid) - Devuelve el identificador de sesión del cliente, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE).

- [Estados de ZooKeeper](#zookeeper.constants.states)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::isRecoverable

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::isRecoverable — Comprueba si se puede recuperar el estado actual de la conexión zookeeper

### Descripción

public
**Zookeeper::isRecoverable**(): [bool](#language.types.boolean)

La aplicación debería cerrar el gestor e intentar volver a conectarse.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve true/false en caso de éxito y false en caso de fallo.

### Errores/Excepciones

Este método emite un error/advertencia PHP cuando la operación falla.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::getClientId()](#zookeeper.getclientid) - Devuelve el identificador de sesión del cliente, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE).

- [Estado de ZooKeeper](#zookeeper.constants.states)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::set

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::set — Define los datos asociados a un nodo

### Descripción

public
**Zookeeper::set**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $version = -1,
    [array](#language.types.array) &amp;$stat = **[null](#constant.null)**
): [bool](#language.types.boolean)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    value


      Los datos que se almacenarán en el nodo.






    version


      La versión esperada del nodo. La función fallará si la versión actual del nodo no coincide con la versión esperada.
      Si se utiliza -1, no se realizará la comprobación de la versión.






    stat


      Si no es NULL, contendrá el valor de las estadísticas de la ruta devuelta.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el número de parámetros o los tipos son incorrectos
o cuando guardar el valor en el nodo ha fallado.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::set()**

     Guarda un valor en un nodo.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$path = '/path/to/node';
$value = 'nodevalue';
$r = $zookeeper-&gt;set($path, $value);
if ($r)
echo 'SUCCESS';
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

SUCCESS

### Ver también

- [Zookeeper::create()](#zookeeper.create) - Crear un nodo de forma sincrónica

- [Zookeeper::get()](#zookeeper.get) - Devuelve los datos asociados a un nodo de forma sincrónica

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::setAcl

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::setAcl — Establece la ACL asociada a un nodo de forma sincrónica

### Descripción

public
**Zookeeper::setAcl**([string](#language.types.string) $path, [int](#language.types.integer) $version, [array](#language.types.array) $acl): [bool](#language.types.boolean)

### Parámetros

    path


      El nombre del nodo. Expresado como un nombre de archivo con barras separando los ancestros del nodo.






    version


      El número de versión esperado de la ruta.






    acl


      La ACL que debe definirse en la ruta.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el número de parámetros o los tipos son incorrectos o no se ha podido definir la ACL para un nodo.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::setAcl()**

     Establece la ACL para un nodo.

&lt;?php
$zookeeper = new Zookeeper('locahost:2181');
$aclArray = array(
array(
'perms' =&gt; Zookeeper::PERM_ALL,
'scheme' =&gt; 'world',
'id' =&gt; 'anyone',
)
);
$path = '/path/to/newnode';
$zookeeper-&gt;setAcl($path, $aclArray);

$r = $zookeeper-&gt;getAcl($path);
if ($r)
  var_dump($r);
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
array(3) {
["perms"]=&gt;
int(31)
["scheme"]=&gt;
string(5) "world"
["id"]=&gt;
string(6) "anyone"
}
}

### Ver también

- [Zookeeper::create()](#zookeeper.create) - Crear un nodo de forma sincrónica

- [Zookeeper::getAcl()](#zookeeper.getacl) - Devuelve las ACL asociadas a un nodo de forma sincrónica

- [Permisos de ZooKeeper](#zookeeper.constants.perms)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::setDebugLevel

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::setDebugLevel — Define el nivel de depuración de la biblioteca

### Descripción

public
static
**Zookeeper::setDebugLevel**([int](#language.types.integer) $logLevel): [bool](#language.types.boolean)

### Parámetros

    logLevel


      Constantes de nivel de depuración de ZooKeeper.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el número de parámetros o los tipos son incorrectos
o no definen el nivel de depuración.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ejemplos

**Ejemplo #1 Ejemplo de Zookeeper::setDebugLevel()**

     Define el nivel de depuración.

&lt;?php
$r = Zookeeper::setDebugLevel(Zookeeper::LOG_LEVEL_WARN);
if ($r)
echo 'SUCCESS';
else
echo 'ERR';
?&gt;
?&gt;

El ejemplo anterior mostrará:

SUCCESS

### Ver también

- [Nivel de registro ZooKeeper](#zookeeper.constants.log-levels)

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::setDeterministicConnOrder

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::setDeterministicConnOrder — Activa/desactiva la aleatorización del orden de los puntos finales de quórum.

### Descripción

public
static
**Zookeeper::setDeterministicConnOrder**([bool](#language.types.boolean) $yesOrNo): [bool](#language.types.boolean)

Si se establece en true, hará que el cliente se conecte a los quorum peers en el orden especificado en la llamada
a zookeeper_init(). Un valor falso causará que zookeeper_init() intercambie los puntos finales de los quorum peers,
lo que es bueno para una distribución más uniforme de las conexiones de los clientes entre los quorum peers.
El cliente ZooKeeper C utiliza false por defecto.

### Parámetros

    yesOrNo


      Activa/desactiva la aleatorización del orden de los puntos finales de quórum.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el número de parámetros o tipos es incorrecto o la operación falla.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::\_\_construct()](#zookeeper.construct) - Crea un manejador para comunicarse con Zookeeper

- [Zookeeper::connect()](#zookeeper.connect) - Crea un manejador para comunicarse con Zookeeper

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::setLogStream

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::setLogStream — Define el flujo que utilizará la biblioteca para el registro

### Descripción

public
**Zookeeper::setLogStream**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

La librería zookeeper utiliza stderr como flujo de registro por defecto. La aplicación debe asegurarse
de que el flujo es escribible. Pasar NULL restablece el flujo a su valor por defecto (stderr).

### Parámetros

    stream


      El flujo que utilizará la biblioteca para el registro.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error/advertencia de PHP cuando el número de parámetros o tipos es incorrecto o la operación falla.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::setDebugLevel()](#zookeeper.setdebuglevel) - Define el nivel de depuración de la biblioteca

- [ZookeeperException](#class.zookeeperexception)

# Zookeeper::setWatcher

(PECL zookeeper &gt;= 0.1.0)

Zookeeper::setWatcher — Define una función de observación

### Descripción

public
**Zookeeper::setWatcher**([callable](#language.types.callable) $watcher_cb): [bool](#language.types.boolean)

### Parámetros

    watcher_cb


      Un observador que será llamado cada vez que el nodo cambie.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método emite un error PHP/warning cuando el número de parámetros o los tipos son incorrectos
o es imposible cambiar el observador.

**Precaución**

      Desde la versión 0.3.0, este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados.

### Ver también

- [Zookeeper::exists()](#zookeeper.exists) - Comprueba la existencia de un nodo de forma sincrónica

- [Zookeeper::get()](#zookeeper.get) - Devuelve los datos asociados a un nodo de forma sincrónica

- [ZookeeperException](#class.zookeeperexception)

## Tabla de contenidos

- [Zookeeper::addAuth](#zookeeper.addauth) — Especifica la información de autenticación de la aplicación
- [Zookeeper::close](#zookeeper.close) — Cierra la conexión con el servidor ZooKeeper y libera los recursos asociados
- [Zookeeper::connect](#zookeeper.connect) — Crea un manejador para comunicarse con Zookeeper
- [Zookeeper::\_\_construct](#zookeeper.construct) — Crea un manejador para comunicarse con Zookeeper
- [Zookeeper::create](#zookeeper.create) — Crear un nodo de forma sincrónica
- [Zookeeper::delete](#zookeeper.delete) — Elimina un nodo de forma sincrónica
- [Zookeeper::exists](#zookeeper.exists) — Comprueba la existencia de un nodo de forma sincrónica
- [Zookeeper::get](#zookeeper.get) — Devuelve los datos asociados a un nodo de forma sincrónica
- [Zookeeper::getAcl](#zookeeper.getacl) — Devuelve las ACL asociadas a un nodo de forma sincrónica
- [Zookeeper::getChildren](#zookeeper.getchildren) — Lista los hijos de un nodo de forma sincrónica
- [Zookeeper::getClientId](#zookeeper.getclientid) — Devuelve el identificador de sesión del cliente, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE).
- [Zookeeper::getConfig](#zookeeper.getconfig) — Devuelve la instancia de ZookeeperConfig
- [Zookeeper::getRecvTimeout](#zookeeper.getrecvtimeout) — Devuelve el tiempo de espera para esta sesión, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE). Este valor puede cambiar tras una reconexión con el servidor.
- [Zookeeper::getState](#zookeeper.getstate) — Devuelve el estado de la conexión zookeeper
- [Zookeeper::isRecoverable](#zookeeper.isrecoverable) — Comprueba si se puede recuperar el estado actual de la conexión zookeeper
- [Zookeeper::set](#zookeeper.set) — Define los datos asociados a un nodo
- [Zookeeper::setAcl](#zookeeper.setacl) — Establece la ACL asociada a un nodo de forma sincrónica
- [Zookeeper::setDebugLevel](#zookeeper.setdebuglevel) — Define el nivel de depuración de la biblioteca
- [Zookeeper::setDeterministicConnOrder](#zookeeper.setdeterministicconnorder) — Activa/desactiva la aleatorización del orden de los puntos finales de quórum.
- [Zookeeper::setLogStream](#zookeeper.setlogstream) — Define el flujo que utilizará la biblioteca para el registro
- [Zookeeper::setWatcher](#zookeeper.setwatcher) — Define una función de observación

# La clase ZookeeperConfig

(PECL zookeeper &gt;= 0.6.0, ZooKeeper &gt;= 3.5.0)

## Introducción

    La clase de manejo de configuración de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **ZookeeperConfig**

     {



    /* Métodos */

public
[add](#zookeeperconfig.add)([string](#language.types.string) $members, [int](#language.types.integer) $versión = -1, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [void](language.types.void.html)
public
[get](#zookeeperconfig.get)([callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [string](#language.types.string)
public
[remove](#zookeeperconfig.remove)([string](#language.types.string) $id_list, [int](#language.types.integer) $version = -1, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [void](language.types.void.html)
public
[set](#zookeeperconfig.set)([string](#language.types.string) $members, [int](#language.types.integer) $version = -1, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [void](language.types.void.html)

}

# ZookeeperConfig::add

(PECL zookeeper &gt;= 0.6.0, ZooKeeper &gt;= 3.5.0)

ZookeeperConfig::add — Agregar servidores al conjunto

### Descripción

public
**ZookeeperConfig::add**([string](#language.types.string) $members, [int](#language.types.integer) $versión = -1, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [void](language.types.void.html)

### Parámetros

    members


      La lista separada por comas de los servidores que se añadirán al conjunto. Cada uno tiene una línea de configuración para un servidor a añadir (como aparecería en un
      en un fichero de configuración), sólo para quórums mayoritarios.






    versión


      La versión esperada del nodo. La función fallará si la versión actual del nodo no coincide con la versión esperada. Si se utiliza -1, no se realizará la comprobación de la versión.






    stat


      Si no es NULL, contendrá el valor de stat para la ruta de retorno.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados cuando el número o tipo de parámetros es incorrecto o el valor no se puede guardar en el nodo.

### Ejemplos

**Ejemplo #1 Ejemplo de ZookeeperConfig::add()**

    Agrega miembros.

&lt;?php
$client = new Zookeeper();
$client-&gt;connect('localhost:2181');
$client-&gt;addAuth('digest', 'timandes:timandes');
$zkConfig = $client-&gt;getConfig();
$zkConfig-&gt;set("server.1=localhost:2888:3888:participant;0.0.0.0:2181");
$zkConfig-&gt;add("server.2=localhost:2889:3889:participant;0.0.0.0:2182");
$r = $zkConfig-&gt;get();
if ($r)
echo $r;
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

server.1=localhost:2888:3888:participant;0.0.0.0:2181
server.2=localhost:2889:3889:participant;0.0.0.0:2182
version=0xca01e881a2

### Ver también

- [ZookeeperConfig::get()](#zookeeperconfig.get) - Devuelve la última configuración validada del clúster ZooKeeper conocida por el servidor al que está conectado el cliente, de forma sincrónica

- [ZookeeperConfig::set()](#zookeeperconfig.set) - Cambia la pertenencia al conjunto de clústeres ZK y los roles de los pares en el conjunto.

- [ZookeeperConfig::remove()](#zookeeperconfig.remove) - Eliminar servidores del conjunto

- [ZookeeperException](#class.zookeeperexception)

# ZookeeperConfig::get

(PECL zookeeper &gt;= 0.6.0, ZooKeeper &gt;= 3.5.0)

ZookeeperConfig::get — Devuelve la última configuración validada del clúster ZooKeeper conocida por el servidor al que está conectado el cliente, de forma sincrónica

### Descripción

public
**ZookeeperConfig::get**([callable](#language.types.callable) $watcher_cb = **[null](#constant.null)**, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [string](#language.types.string)

### Parámetros

    watcher_cb


      Si es distinto de cero, se colocará un observador en el servidor para notificar al cliente si cambia el nodo.






    stat


      Si no es NULL, contendrá el valor de stat para la ruta de retorno.


### Valores devueltos

Devuelve la cadena de configuración en caso de éxito, y false en caso de fallo.

### Errores/Excepciones

Este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados cuando el número o tipo de parámetros es incorrecto o si falla la recuperación de la configuración.

### Ejemplos

**Ejemplo #1 Ejemplo de ZookeeperConfig::get()**

     Obtener la configuración.

&lt;?php
$zk = new Zookeeper();
$zk-&gt;connect('localhost:2181');
$zk-&gt;addAuth('digest', 'timandes:timandes');
$zkConfig = $zk-&gt;getConfig();
$r = $zkConfig-&gt;get();
if ($r)
echo $r;
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

server.1=localhost:2888:3888:participant;0.0.0.0:2181
version=0xca01e881a2

### Ver también

- [ZookeeperConfig::set()](#zookeeperconfig.set) - Cambia la pertenencia al conjunto de clústeres ZK y los roles de los pares en el conjunto.

- [ZookeeperConfig::add()](#zookeeperconfig.add) - Agregar servidores al conjunto

- [ZookeeperConfig::remove()](#zookeeperconfig.remove) - Eliminar servidores del conjunto

- [ZookeeperException](#class.zookeeperexception)

# ZookeeperConfig::remove

(PECL zookeeper &gt;= 0.6.0, ZooKeeper &gt;= 3.5.0)

ZookeeperConfig::remove — Eliminar servidores del conjunto

### Descripción

public
**ZookeeperConfig::remove**([string](#language.types.string) $id_list, [int](#language.types.integer) $version = -1, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [void](language.types.void.html)

### Parámetros

    id_list


      La lista separada por comas de IDs de servidores a eliminar del conjunto. Cada uno tiene un identificador de un servidor a eliminar, sólo para quórums mayoritarios.






    versión


      La versión esperada del nodo. La función fallará si la versión actual del nodo no coincide con la versión esperada.
      Si se utiliza -1, no se realizará la comprobación de la versión.






    stat


      Si no es NULL, contendrá el valor de stat para la ruta de retorno.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados cuando el número o el tipo de los parámetros es incorrecto o si la eliminación del valor del nodo falla.

### Ejemplos

**Ejemplo #1 Ejemplo de ZookeeperConfig::remove()**

    Quita miembros.

&lt;?php
$client = new Zookeeper();
$client-&gt;connect('localhost:2181');
$client-&gt;addAuth('digest', 'timandes:timandes');
$zkConfig = $client-&gt;getConfig();
$zkConfig-&gt;set("server.1=localhost:2888:3888:participant;0.0.0.0:2181,server.2=localhost:2889:3889:participant;0.0.0.0:2182");
$zkConfig-&gt;remove("2");
echo $zkConfig-&gt;get();
if ($r)
echo $r;
else
echo 'ERR';
?&gt;

El ejemplo anterior mostrará:

server.1=localhost:2888:3888:participant;0.0.0.0:2181
version=0xca01e881a2

### Ver también

- [ZookeeperConfig::get()](#zookeeperconfig.get) - Devuelve la última configuración validada del clúster ZooKeeper conocida por el servidor al que está conectado el cliente, de forma sincrónica

- [ZookeeperConfig::add()](#zookeeperconfig.add) - Agregar servidores al conjunto

- [ZookeeperConfig::set()](#zookeeperconfig.set) - Cambia la pertenencia al conjunto de clústeres ZK y los roles de los pares en el conjunto.

- [ZookeeperException](#class.zookeeperexception)

# ZookeeperConfig::set

(PECL zookeeper &gt;= 0.6.0, ZooKeeper &gt;= 3.5.0)

ZookeeperConfig::set — Cambia la pertenencia al conjunto de clústeres ZK y los roles de los pares en el conjunto.

### Descripción

public
**ZookeeperConfig::set**([string](#language.types.string) $members, [int](#language.types.integer) $version = -1, [array](#language.types.array) &amp;$stat = **[null](#constant.null)**): [void](language.types.void.html)

### Parámetros

    members


      La lista separada por comas de los nuevos miembros (por ejemplo, el contenido de un archivo de configuración de miembros) - para ser utilizado sólo con la reconfiguración no incremental.






    version


      La versión esperada del nodo. La función fallará si la versión actual del nodo no coincide con la versión esperada.
      Si se utiliza -1, no se realizará la comprobación de la versión.






    stat


      Si no es NULL, contendrá el valor de stat para la ruta de retorno.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Este método lanza [ZookeeperException](#class.zookeeperexception) y sus derivados cuando el número
o tipo de parámetros es incorrecto o si guardar el valor en el nodo falla.

### Ejemplos

**Ejemplo #1 Ejemplo de ZookeeperConfig::set()**

     Reconfiguración.

&lt;?php
$client = new Zookeeper();
$client-&gt;connect('localhost:2181');
$client-&gt;addAuth('digest', 'timandes:timandes');
$zkConfig = $client-&gt;getConfig();
$zkConfig-&gt;set("server.1=localhost:2888:3888:participant;0.0.0.0:2181");
?&gt;

### Ver también

- [ZookeeperConfig::get()](#zookeeperconfig.get) - Devuelve la última configuración validada del clúster ZooKeeper conocida por el servidor al que está conectado el cliente, de forma sincrónica

- [ZookeeperConfig::add()](#zookeeperconfig.add) - Agregar servidores al conjunto

- [ZookeeperConfig::remove()](#zookeeperconfig.remove) - Eliminar servidores del conjunto

- [ZookeeperException](#class.zookeeperexception)

## Tabla de contenidos

- [ZookeeperConfig::add](#zookeeperconfig.add) — Agregar servidores al conjunto
- [ZookeeperConfig::get](#zookeeperconfig.get) — Devuelve la última configuración validada del clúster ZooKeeper conocida por el servidor al que está conectado el cliente, de forma sincrónica
- [ZookeeperConfig::remove](#zookeeperconfig.remove) — Eliminar servidores del conjunto
- [ZookeeperConfig::set](#zookeeperconfig.set) — Cambia la pertenencia al conjunto de clústeres ZK y los roles de los pares en el conjunto.

# La clase ZookeeperException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de excepciones de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **ZookeeperException**


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

# La clase ZookeeperAuthenticationException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de excepciones de autenticación de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **ZookeeperAuthenticationException**


      extends
       [ZookeeperException](#class.zookeeperexception)

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

# La clase ZookeeperConnectionException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de excepciones de la conexión de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **ZookeeperConnectionException**


      extends
       [ZookeeperException](#class.zookeeperexception)

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

# La clase ZookeeperMarshallingException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de la excepción ZooKeeper (mientras se marcan o desmarcan los datos).

## Sinopsis de la Clase

    ****




      class **ZookeeperMarshallingException**


      extends
       [ZookeeperException](#class.zookeeperexception)

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

# La clase ZookeeperNoNodeException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de excepciones ZooKeeper (cuando el nodo no existe).

## Sinopsis de la Clase

    ****




      class **ZookeeperNoNodeException**


      extends
       [ZookeeperException](#class.zookeeperexception)

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

# La clase ZookeeperOperationTimeoutException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de excepciones de la operación de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **ZookeeperOperationTimeoutException**


      extends
       [ZookeeperException](#class.zookeeperexception)

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

# La clase ZookeeperSessionException

(PECL zookeeper &gt;= 0.3.0)

## Introducción

    La clase de manejo de excepciones de la sesión de ZooKeeper.

## Sinopsis de la Clase

    ****




      class **ZookeeperSessionException**


      extends
       [ZookeeperException](#class.zookeeperexception)

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

- [Introducción](#intro.zookeeper)
- [Instalación/Configuración](#zookeeper.setup)<li>[Requerimientos](#zookeeper.requirements)
- [Instalación](#zookeeper.installation)
- [Configuración en tiempo de ejecución](#zookeeper.configuration)
  </li>- [ZooKeeper Funciones](#ref.zookeeper)<li>[zookeeper_dispatch](#function.zookeeper-dispatch) — Llama a las funciones de devolución de llamada para las operaciones pendientes
  </li>- [Zookeeper](#class.zookeeper) — La clase Zookeeper<li>[Zookeeper::addAuth](#zookeeper.addauth) — Especifica la información de autenticación de la aplicación
- [Zookeeper::close](#zookeeper.close) — Cierra la conexión con el servidor ZooKeeper y libera los recursos asociados
- [Zookeeper::connect](#zookeeper.connect) — Crea un manejador para comunicarse con Zookeeper
- [Zookeeper::\_\_construct](#zookeeper.construct) — Crea un manejador para comunicarse con Zookeeper
- [Zookeeper::create](#zookeeper.create) — Crear un nodo de forma sincrónica
- [Zookeeper::delete](#zookeeper.delete) — Elimina un nodo de forma sincrónica
- [Zookeeper::exists](#zookeeper.exists) — Comprueba la existencia de un nodo de forma sincrónica
- [Zookeeper::get](#zookeeper.get) — Devuelve los datos asociados a un nodo de forma sincrónica
- [Zookeeper::getAcl](#zookeeper.getacl) — Devuelve las ACL asociadas a un nodo de forma sincrónica
- [Zookeeper::getChildren](#zookeeper.getchildren) — Lista los hijos de un nodo de forma sincrónica
- [Zookeeper::getClientId](#zookeeper.getclientid) — Devuelve el identificador de sesión del cliente, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE).
- [Zookeeper::getConfig](#zookeeper.getconfig) — Devuelve la instancia de ZookeeperConfig
- [Zookeeper::getRecvTimeout](#zookeeper.getrecvtimeout) — Devuelve el tiempo de espera para esta sesión, sólo válido si la conexión está actualmente establecida (es decir, si el último estado del observador es ZOO_CONNECTED_STATE). Este valor puede cambiar tras una reconexión con el servidor.
- [Zookeeper::getState](#zookeeper.getstate) — Devuelve el estado de la conexión zookeeper
- [Zookeeper::isRecoverable](#zookeeper.isrecoverable) — Comprueba si se puede recuperar el estado actual de la conexión zookeeper
- [Zookeeper::set](#zookeeper.set) — Define los datos asociados a un nodo
- [Zookeeper::setAcl](#zookeeper.setacl) — Establece la ACL asociada a un nodo de forma sincrónica
- [Zookeeper::setDebugLevel](#zookeeper.setdebuglevel) — Define el nivel de depuración de la biblioteca
- [Zookeeper::setDeterministicConnOrder](#zookeeper.setdeterministicconnorder) — Activa/desactiva la aleatorización del orden de los puntos finales de quórum.
- [Zookeeper::setLogStream](#zookeeper.setlogstream) — Define el flujo que utilizará la biblioteca para el registro
- [Zookeeper::setWatcher](#zookeeper.setwatcher) — Define una función de observación
  </li>- [ZookeeperConfig](#class.zookeeperconfig) — La clase ZookeeperConfig<li>[ZookeeperConfig::add](#zookeeperconfig.add) — Agregar servidores al conjunto
- [ZookeeperConfig::get](#zookeeperconfig.get) — Devuelve la última configuración validada del clúster ZooKeeper conocida por el servidor al que está conectado el cliente, de forma sincrónica
- [ZookeeperConfig::remove](#zookeeperconfig.remove) — Eliminar servidores del conjunto
- [ZookeeperConfig::set](#zookeeperconfig.set) — Cambia la pertenencia al conjunto de clústeres ZK y los roles de los pares en el conjunto.
  </li>- [ZookeeperException](#class.zookeeperexception) — La clase ZookeeperException
- [ZookeeperAuthenticationException](#class.zookeeperauthenticationexception) — La clase ZookeeperAuthenticationException
- [ZookeeperConnectionException](#class.zookeeperconnectionexception) — La clase ZookeeperConnectionException
- [ZookeeperMarshallingException](#class.zookeepermarshallingexception) — La clase ZookeeperMarshallingException
- [ZookeeperNoNodeException](#class.zookeepernonodeexception) — La clase ZookeeperNoNodeException
- [ZookeeperOperationTimeoutException](#class.zookeeperoperationtimeoutexception) — La clase ZookeeperOperationTimeoutException
- [ZookeeperSessionException](#class.zookeepersessionexception) — La clase ZookeeperSessionException
