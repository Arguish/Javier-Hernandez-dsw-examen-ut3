# win32service

# Introducción

La extensión win32service es una extensión específica de Windows que
permite a PHP comunicarse con la Gestión de Control de Servicio para
iniciar, detener, registrar o eliminar servicios, y permite también
que los scripts PHP se ejecuten como servicio.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#win32service.requirements)
- [Instalación](#win32service.installation)
- [Consideraciones de seguridad](#win32service.security)

    ## Requerimientos

    Las versiones de Windows soportadas son las mismas que el paquete redistribuible Visual C++ utilizado para construir PHP.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/win32service](https://pecl.php.net/package/win32service)

    ## Consideraciones de seguridad

    Esta extensión requiere privilegios de administrador para ciertas acciones tales como
    [create](#function.win32-create-service),
    [delete](#function.win32-delete-service),
    [start](#function.win32-start-service),
    [stop](#function.win32-stop-service),
    [pause](#function.win32-pause-service) y
    [continue](#function.win32-continue-service).
    Esta exigencia puede causar una elevación de privilegios si el control de
    servicio está disponible desde la interfaz Web o el control remoto.

    La ACL del servicio puede ser definida después de su adición en el SCM para delegar
    las tareas de administración actuales a una cuenta no administrador o a una cuenta de servicio.

    A partir de Win32Service 1.1.0, los derechos de servicio pueden ser gestionados con PHP. Los ACL actuales pueden ser leídos con
    [win32_read_all_rights_access_service()](#function.win32-read-all-rights-access-service), un derecho de acceso o de denegación puede ser añadido con
    [win32_add_right_access_service()](#function.win32-add-right-access-service), o un derecho de acceso puede ser eliminado con
    [win32_remove_right_access_service()](#function.win32-remove-right-access-service).

    Se recomienda actualizar a Win32Service 1.1.0.
    Para instrucciones adicionales sobre la gestión de derechos sin la extensión (o con una versión anterior a 1.1.0), consulte la
    [» Base de conocimientos de Microsoft](https://www.betaarchive.com/wiki/index.php?title=Microsoft_KB_Archive/914392).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

   <caption>**Mascara binaria de tipo de Servicio de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_WIN32_OWN_PROCESS](#constant.win32-service-win32-own-process)**
      0x00000010

       El servicio se ejecuta en su propio proceso.




      **[WIN32_SERVICE_INTERACTIVE_PROCESS](#constant.win32-service-interactive-process)**
      0x00000100

       El servicio puede interactuar con el escritorio. Esta opción no está disponible en Windows Vista o versiones posteriores.




      **[WIN32_SERVICE_WIN32_OWN_PROCESS_INTERACTIVE](#constant.win32-service-win32-own-process-interactive)**
      0x00000110

       El servicio se ejecuta en su propio proceso y puede interactuar con el escritorio.
       Esta opción no está disponible en Windows Vista y siguientes.



   <caption>**Constantes de Estado del Servicio de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_CONTINUE_PENDING](#constant.win32-service-continue-pending)**
      0x00000005

       La continuación del servicio está en espera.




      **[WIN32_SERVICE_PAUSE_PENDING](#constant.win32-service-pause-pending)**
      0x00000006

       La pausa del servicio está en espera.




      **[WIN32_SERVICE_PAUSED](#constant.win32-service-paused)**
      0x00000004

       El servicio está en pausa.




      **[WIN32_SERVICE_RUNNING](#constant.win32-service-running)**
      0x00000004

       El servicio está en curso de ejecución.




      **[WIN32_SERVICE_START_PENDING](#constant.win32-service-start-pending)**
      0x00000002

       El servicio está en curso de inicio.




      **[WIN32_SERVICE_STOP_PENDING](#constant.win32-service-stop-pending)**
      0x00000003

       El servicio está en curso de parada.




      **[WIN32_SERVICE_STOPPED](#constant.win32-service-stopped)**
      0x00000001

       El servicio está parado.



   <caption>**Constantes del Servicio de Control de Mensaje de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_CONTROL_CONTINUE](#constant.win32-service-control-continue)**
      0x00000003

       Avisa a un servicio suspendido que debe reanudarse.




      **[WIN32_SERVICE_CONTROL_DEVICEEVENT](#constant.win32-service-control-deviceevent)**
      0x0000000B





      **[WIN32_SERVICE_CONTROL_HARDWAREPROFILECHANGE](#constant.win32-service-control-hardwareprofilechange)**
      0x0000000C





      **[WIN32_SERVICE_CONTROL_INTERROGATE](#constant.win32-service-control-interrogate)**
      0x00000004

       Avisa a un servicio que debe informar sobre su estado actual
       al controlador de servicio.




      **[WIN32_SERVICE_CONTROL_NETBINDADD](#constant.win32-service-control-netbindadd)**
      0x00000007

       Avisa a un servicio de red que existe un nuevo componente para la conexión.




      **[WIN32_SERVICE_CONTROL_NETBINDDISABLE](#constant.win32-service-control-netbinddisable)**
      0x0000000A

       Avisa a un servicio de red que una de sus conexiones ha sido desactivada.




      **[WIN32_SERVICE_CONTROL_NETBINDENABLE](#constant.win32-service-control-netbindenable)**
      0x00000009

       Avisa a un servicio de red que una conexión desactivada ha sido activada.




      **[WIN32_SERVICE_CONTROL_NETBINDREMOVE](#constant.win32-service-control-netbindremove)**
      0x00000008

       Avisa a un servicio de red que un componente para la conexión ha sido eliminado.




      **[WIN32_SERVICE_CONTROL_PARAMCHANGE](#constant.win32-service-control-paramchange)**
      0x00000006

       Avisa a un servicio que sus parámetros de inicio han cambiado.




      **[WIN32_SERVICE_CONTROL_PAUSE](#constant.win32-service-control-pause)**
      0x00000002

       Avisa a un servicio que debe ponerse en pausa.




      **[WIN32_SERVICE_CONTROL_POWEREVENT](#constant.win32-service-control-powerevent)**
      0x0000000D





      **[WIN32_SERVICE_CONTROL_PRESHUTDOWN](#constant.win32-service-control-preshutdown)**
      0x0000000F

       Avisa a un servicio que el sistema va a apagarse. Un servicio que maneja
       esta notificación bloquea el apagado del sistema hasta que el servicio se detenga o hasta
       que expire el tiempo de preapagado. Este valor no es soportado por Windows Server 2003 y Windows XP/2000.




      **[WIN32_SERVICE_CONTROL_SESSIONCHANGE](#constant.win32-service-control-sessionchange)**
      0x0000000E





      **[WIN32_SERVICE_CONTROL_SHUTDOWN](#constant.win32-service-control-shutdown)**
      0x00000005

       Avisa a un servicio que el sistema se está apagando y que el servicio puede
       realizar tareas de limpieza. Si un servicio acepta este código de control, debe detenerse
       tan pronto como complete sus tareas de limpieza. Después de enviar este código de control por el ACM,
       ningún otro código de control será enviado al servicio.




      **[WIN32_SERVICE_CONTROL_STOP](#constant.win32-service-control-stop)**
      0x00000001

       Avisa a un servicio que debe detenerse.



  <caption>**Masque binaire de Mensaje de Control de Servicio de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_ACCEPT_HARDWAREPROFILECHANGE](#constant.win32-service-accept-hardwareprofilechange)**
      0x00000020

        El servicio es notificado cuando el perfil de hardware del ordenador ha cambiado.
        Esto permite al sistema enviar notificaciones
       **[WIN32_SERVICE_CONTROL_HARDWAREPROFILECHANGE](#constant.win32-service-control-hardwareprofilechange)** al servicio.




      **[WIN32_SERVICE_ACCEPT_NETBINDCHANGE](#constant.win32-service-accept-netbindchange)**
      0x00000010

        El servicio es un componente de red que puede aceptar cambios en su conexión sin ser detenido y reiniciado. Este código de control permite al
        servicio recibir las notificaciones
        **[WIN32_SERVICE_CONTROL_NETBINDADD](#constant.win32-service-control-netbindadd)**,
        **[WIN32_SERVICE_CONTROL_NETBINDREMOVE](#constant.win32-service-control-netbindremove)**,
        **[WIN32_SERVICE_CONTROL_NETBINDENABLE](#constant.win32-service-control-netbindenable)**, y
        **[WIN32_SERVICE_CONTROL_NETBINDDISABLE](#constant.win32-service-control-netbinddisable)**.




      **[WIN32_SERVICE_ACCEPT_PARAMCHANGE](#constant.win32-service-accept-paramchange)**
      0x00000008

        El servicio puede releer sus parámetros de inicio sin ser detenido y reiniciado.
        Este código de control permite al servicio recibir notificaciones **[WIN32_SERVICE_CONTROL_PARAMCHANGE](#constant.win32-service-control-paramchange)**.




      **[WIN32_SERVICE_ACCEPT_PAUSE_CONTINUE](#constant.win32-service-accept-pause-continue)**
      0x00000002

       El servicio puede ser puesto en pausa y continuado. Este código de control permite al
       servicio recibir las notificaciones
       **[WIN32_SERVICE_CONTROL_PAUSE](#constant.win32-service-control-pause)** y **[WIN32_SERVICE_CONTROL_CONTINUE](#constant.win32-service-control-continue)**.




      **[WIN32_SERVICE_ACCEPT_POWEREVENT](#constant.win32-service-accept-powerevent)**
      0x00000040

        El servicio es notificado cuando el estado de alimentación del ordenador ha cambiado.
        Esto permite al sistema enviar notificaciones
       **[WIN32_SERVICE_CONTROL_POWEREVENT](#constant.win32-service-control-powerevent)** al servicio.




      **[WIN32_SERVICE_ACCEPT_PRESHUTDOWN](#constant.win32-service-accept-preshutdown)**
      0x00000100

       El servicio puede realizar tareas antes del apagado. Este código de control permite
       al servicio recibir la notificación **[WIN32_SERVICE_CONTROL_PRESHUTDOWN](#constant.win32-service-control-preshutdown)**.
       Este valor no es soportado por Windows Server 2003 y Windows XP/2000.




      **[WIN32_SERVICE_ACCEPT_SESSIONCHANGE](#constant.win32-service-accept-sessionchange)**
      0x00000080

       El servicio es notificado cuando el estado de sesión del ordenador ha cambiado.
       Esto permite al sistema enviar notificaciones
       **[WIN32_SERVICE_CONTROL_SESSIONCHANGE](#constant.win32-service-control-sessionchange)** al servicio.
       Windows 2000: este valor no es soportado.




      **[WIN32_SERVICE_ACCEPT_SHUTDOWN](#constant.win32-service-accept-shutdown)**
      0x00000004

       El servicio es informado cuando ocurre el apagado del sistema. Este código de control
       permite al servicio recibir la notificación **[WIN32_SERVICE_CONTROL_SHUTDOWN](#constant.win32-service-control-shutdown)**.




      **[WIN32_SERVICE_ACCEPT_STOP](#constant.win32-service-accept-stop)**
      0x00000001

       El servicio puede ser detenido. Este control permite al servicio recibir la
       notificación **[WIN32_SERVICE_CONTROL_STOP](#constant.win32-service-control-stop)**.




      **[WIN32_SERVICE_ACCEPT_TIMECHANGE](#constant.win32-service-accept-timechange)**
      0x00000200

        El servicio es notificado cuando la hora del sistema ha cambiado.
        Esto permite al sistema enviar notificaciones
        **[WIN32_SERVICE_CONTROL_TIMECHANGE](#constant.win32-service-control-timechange)** al servicio.
       Windows Server 2008, Windows Vista, Windows Server 2003 y Windows XP/2000:
       este código de control no es soportado.




      **[WIN32_SERVICE_ACCEPT_TRIGGEREVENT](#constant.win32-service-accept-triggerevent)**
      0x00000400

       El servicio es notificado cuando ocurre un evento para el cual el servicio se ha registrado.
       Esto permite al sistema enviar notificaciones
       **[WIN32_SERVICE_CONTROL_TRIGGEREVENT](#constant.win32-service-control-triggerevent)** al servicio.
       Windows Server 2008, Windows Vista, Windows Server 2003 y Windows XP/2000:
       este código de control no es soportado.



   <caption>**Constantes de Tipo de Inicio del Servicio de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_BOOT_START](#constant.win32-service-boot-start)**
      0x00000000

       Un controlador de dispositivo iniciado por el cargador del sistema. Este valor es válido únicamente para los servicios de controlador.




      **[WIN32_SERVICE_SYSTEM_START](#constant.win32-service-system-start)**
      0x00000001

       Un controlador de dispositivo iniciado por la función IoInitSystem. Este valor es válido únicamente para los servicios de controlador.




      **[WIN32_SERVICE_AUTO_START](#constant.win32-service-auto-start)**
      0x00000002

       Un servicio lanzado automáticamente por el controlador de servicio al
       inicio del sistema.




      **[WIN32_SERVICE_DEMAND_START](#constant.win32-service-demand-start)**
      0x00000003

       Un servicio iniciado por el controlador de servicio cuando un
       proceso llama a la función StartService.




      **[WIN32_SERVICE_DISABLED](#constant.win32-service-disabled)**
      0x00000004

       Un servicio que no puede ser iniciado. Los intentos para iniciar
       devuelven un código de error **[WIN32_ERROR_SERVICE_DISABLED ](#constant.win32-error-service-disabled%20)**.



   <caption>**Constantes de Control de Error de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_ERROR_IGNORE](#constant.win32-service-error-ignore)**
      0x00000000

       El programa de inicio ignora el error y continúa la operación de inicio.




      **[WIN32_SERVICE_ERROR_NORMAL](#constant.win32-service-error-normal)**
      0x00000001

       El programa de inicio registra el error en el registro de eventos,
       pero continúa la operación de inicio.




      **[WIN32_SERVICE_ERROR_SEVERE](#constant.win32-service-error-severe)**
      0x00000002

       El programa de inicio consigna el error en el registro de eventos.
       Si la última configuración conocida es lanzada, la operación de inicio se
       continúa. De lo contrario, el sistema se reinicia con la última configuración
       conocida-bueno.




      **[WIN32_SERVICE_ERROR_CRITICAL](#constant.win32-service-error-critical)**
      0x00000003

       El programa de inicio consigna el error en el registro de eventos,
       si es posible.
       Si la última configuración conocida es lanzada, la operación de inicio
       falla. De lo contrario, el sistema se reinicia con la última configuración
       conocida-bueno.



   <caption>**Constantes de Flag de Servicio de Win32Service**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_RUNS_IN_SYSTEM_PROCESS](#constant.win32-service-runs-in-system-process)**
      0x00000001

       El servicio se ejecuta en un proceso del sistema que debe estar siempre
       en ejecución.



**Nota**:

    Estas constantes ya no se utilizan a partir de Win32Service 1.0.0.

   <caption>**Códigos de Error Win32**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_ERROR_ACCESS_DENIED](#constant.win32-error-access-denied)**
      0x00000005

       El controlador de la base de datos SMC no dispone de los derechos de acceso apropiados.




      **[WIN32_ERROR_CIRCULAR_DEPENDENCY](#constant.win32-error-circular-dependency)**
      0x00000423

       Una dependencia circular de servicio está especificada.




      **[WIN32_ERROR_DATABASE_DOES_NOT_EXIST](#constant.win32-error-database-does-not-exist)**
      0x00000429

       La base de datos especificada no existe.




      **[WIN32_ERROR_DEPENDENT_SERVICES_RUNNING](#constant.win32-error-dependent-services-running)**
      0x0000041B

       El servicio no puede ser detenido porque otros servicios en ejecución
       dependen de él.




      **[WIN32_ERROR_DUPLICATE_SERVICE_NAME](#constant.win32-error-duplicate-service-name)**
      0x00000436

       El nombre de visualización ya existe en la base de datos del controlador de servicio
       como nombre de servicio o como nombre de visualización.




      **[WIN32_ERROR_FAILED_SERVICE_CONTROLLER_CONNECT](#constant.win32-error-failed-service-controller-connect)**
      0x00000427

       Este error es devuelto si el programa es ejecutado en aplicación de consola
       en lugar de como servicio. Si el programa es ejecutado en aplicación de consola para propósitos de depuración,
       debe ser estructurado de manera que el código específico del servicio nunca sea llamado.




      **[WIN32_ERROR_INSUFFICIENT_BUFFER](#constant.win32-error-insufficient-buffer)**
      0x0000007A

       El buffer es demasiado pequeño para la estructura de estado del servicio.
       Nada ha sido escrito en la estructura.




      **[WIN32_ERROR_INVALID_DATA](#constant.win32-error-invalid-data)**
      0x0000000D

       La estructura de estado del servicio indicada no es válida.




      **[WIN32_ERROR_INVALID_HANDLE](#constant.win32-error-invalid-handle)**
      0x00000006

       El manejador para el controlador de servicio especificado es inválido.




      **[WIN32_ERROR_INVALID_LEVEL](#constant.win32-error-invalid-level)**
      0x0000007C

       El parámetro InfoLevel contiene un valor no soportado.




      **[WIN32_ERROR_INVALID_NAME](#constant.win32-error-invalid-name)**
      0x0000007B

       El nombre de servicio especificado no es válido.




      **[WIN32_ERROR_INVALID_PARAMETER](#constant.win32-error-invalid-parameter)**
      0x00000057

       Un parámetro especificado no es válido.




      **[WIN32_ERROR_INVALID_SERVICE_ACCOUNT](#constant.win32-error-invalid-service-account)**
      0x00000421

       El nombre de usuario especificado en el parámetro user
       no existe. Ver [win32_create_service()](#function.win32-create-service).




      **[WIN32_ERROR_INVALID_SERVICE_CONTROL](#constant.win32-error-invalid-service-control)**
      0x0000041C

       El código de control solicitado no es válido, o es inaceptable para el servicio.




      **[WIN32_ERROR_PATH_NOT_FOUND](#constant.win32-error-path-not-found)**
      0x00000003

       El servicio de fichero binario no ha podido ser encontrado.




      **[WIN32_ERROR_SERVICE_ALREADY_RUNNING](#constant.win32-error-service-already-running)**
      0x00000420

       Una instancia del servicio ya está en ejecución.




      **[WIN32_ERROR_SERVICE_CANNOT_ACCEPT_CTRL](#constant.win32-error-service-cannot-accept-ctrl)**
      0x00000425

       El código de control solicitado no puede ser enviado al servicio porque el estado del servicio
       es **[WIN32_SERVICE_STOPPED](#constant.win32-service-stopped)**,
       **[WIN32_SERVICE_START_PENDING](#constant.win32-service-start-pending)** o
       **[WIN32_SERVICE_STOP_PENDING](#constant.win32-service-stop-pending)**.




      **[WIN32_ERROR_SERVICE_DATABASE_LOCKED](#constant.win32-error-service-database-locked)**
      0x0000041F

       La base de datos está bloqueada.




      **[WIN32_ERROR_SERVICE_DEPENDENCY_DELETED](#constant.win32-error-service-dependency-deleted)**
      0x00000433

       El servicio depende de un servicio que no existe o que ha sido marcado para
       eliminación.




      **[WIN32_ERROR_SERVICE_DEPENDENCY_FAIL](#constant.win32-error-service-dependency-fail)**
      0x0000042C

       Este servicio depende de otro servicio que no ha podido iniciar.




      **[WIN32_ERROR_SERVICE_DISABLED](#constant.win32-error-service-disabled)**
      0x00000422

       El servicio ha sido desactivado.




      **[WIN32_ERROR_SERVICE_DOES_NOT_EXIST](#constant.win32-error-service-does-not-exist)**
      0x00000424

       El servicio especificado no existe como servicio instalado.




      **[WIN32_ERROR_SERVICE_EXISTS](#constant.win32-error-service-exists)**
      0x00000431

       El servicio especificado ya existe en la base de datos.




      **[WIN32_ERROR_SERVICE_LOGON_FAILED](#constant.win32-error-service-logon-failed)**
      0x0000042D

       El servicio no ha iniciado debido a un fallo de conexión. Este
       error ocurre si el servicio está configurado para ejecutarse bajo
       un cuenta que no tiene los derechos "conectar como servicio".




      **[WIN32_ERROR_SERVICE_MARKED_FOR_DELETE](#constant.win32-error-service-marked-for-delete)**
      0x00000430

       El servicio especificado ya ha sido marcado para eliminación.




      **[WIN32_ERROR_SERVICE_NO_THREAD](#constant.win32-error-service-no-thread)**
      0x0000041E

       Un thread no ha podido ser creado para el servicio.




      **[WIN32_ERROR_SERVICE_NOT_ACTIVE](#constant.win32-error-service-not-active)**
      0x00000426

       El servicio no ha sido iniciado.




      **[WIN32_ERROR_SERVICE_REQUEST_TIMEOUT](#constant.win32-error-service-request-timeout)**
      0x0000041D

       El proceso del servicio ha sido iniciado, pero no ha llamado
       StartServiceCtrlDispatcher, o el thread que ha llamado StartServiceCtrlDispatcher
       puede estar bloqueado en una función del controlador de control.




      **[WIN32_ERROR_SHUTDOWN_IN_PROGRESS](#constant.win32-error-shutdown-in-progress)**
      0x0000045B

       El sistema se está apagando, esta función no puede ser llamada.




      **[WIN32_ERROR_SERVICE_SPECIFIC_ERROR](#constant.win32-error-service-specific-error)**
      0x0000042A

       El servicio ha devuelto un código de error específico del servicio.




      **[WIN32_NO_ERROR](#constant.win32-no-error)**
      0x00000000

       Ningún error.



   <caption>**Clases de Prioridad de Base Win32**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_ABOVE_NORMAL_PRIORITY_CLASS](#constant.win32-above-normal-priority-class)**
      0x00008000

       Proceso con una prioridad superior a WIN32_NORMAL_PRIORITY_CLASS
       pero inferior a WIN32_HIGH_PRIORITY_CLASS.




      **[WIN32_BELOW_NORMAL_PRIORITY_CLASS](#constant.win32-below-normal-priority-class)**
      0x00004000

       Proceso con una prioridad superior a WIN32_IDLE_PRIORITY_CLASS
       pero inferior a WIN32_NORMAL_PRIORITY_CLASS.




      **[WIN32_HIGH_PRIORITY_CLASS](#constant.win32-high-priority-class)**
      0x00000080

       Proceso que ejecuta tareas críticas en el tiempo que deben
       ser ejecutadas inmediatamente. El thread del proceso precede a los
       threads de prioridad normal o en reposo. Un ejemplo es la lista de tareas,
       que debe responder rápidamente cuando es llamada por
       el usuario, independientemente de la carga del sistema. Sea extremadamente
       cuidadoso cuando se utiliza la clase de alta prioridad, ya que una
       aplicación de clase de alta prioridad puede utilizar casi todo
       el tiempo CPU disponible.




      **[WIN32_IDLE_PRIORITY_CLASS](#constant.win32-idle-priority-class)**
      0x00000040

       Proceso cuyo threads solo se ejecutan cuando el sistema está
       inactivo. Los threads del proceso son precedidos por los threads de cualquier
       proceso en curso con una clase de mayor prioridad.
       Un ejemplo es un protector de pantalla. Esta clase es heredada por los
       procesos hijos.




      **[WIN32_NORMAL_PRIORITY_CLASS](#constant.win32-normal-priority-class)**
      0x00000020

       Proceso sin necesidades específicas de planificación.




      **[WIN32_REALTIME_PRIORITY_CLASS](#constant.win32-realtime-priority-class)**
      0x00000100

       Proceso con la mayor prioridad posible. Los threads del proceso
       preceden a los threads de cualquier otro proceso, incluyendo los procesos del
       sistema operativo ejecutando tareas importantes. Por ejemplo, un
       proceso en tiempo real que se ejecuta un poco demasiado lento puede causar
       pérdidas de escritura del buffer en el disco o impedir a la ratón de
       responder.



   <caption>**Acciones de Recuperación Win32**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SC_ACTION_NONE](#constant.win32-sc-action-none)**
      0x00000000

       Ninguna acción.




      **[WIN32_SC_ACTION_RESTART](#constant.win32-sc-action-restart)**
      0x00000001

       Reiniciar el servicio.




      **[WIN32_SC_ACTION_REBOOT](#constant.win32-sc-action-reboot)**
      0x00000002

       Reiniciar el servidor.




      **[WIN32_SC_ACTION_RUN_COMMAND](#constant.win32-sc-action-run-command)**
      0x00000003

       Ejecutar un programa.



   <caption>**Informaciones de Servicio Win32**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_INFO_SERVICE](#constant.win32-info-service)**
      "service"





      **[WIN32_INFO_DISPLAY](#constant.win32-info-display)**
      "display"





      **[WIN32_INFO_USER](#constant.win32-info-user)**
      "user"





      **[WIN32_INFO_PASSWORD](#constant.win32-info-password)**
      "password"





      **[WIN32_INFO_PATH](#constant.win32-info-path)**
      "path"





      **[WIN32_INFO_PARAMS](#constant.win32-info-params)**
      "params"





      **[WIN32_INFO_DESCRIPTION](#constant.win32-info-description)**
      "description"





      **[WIN32_INFO_START_TYPE](#constant.win32-info-start-type)**
      "start_type"





      **[WIN32_INFO_LOAD_ORDER](#constant.win32-info-load-order)**
      "load_order"





      **[WIN32_INFO_SVC_TYPE](#constant.win32-info-svc-type)**
      "svc_type"





      **[WIN32_INFO_ERROR_CONTROL](#constant.win32-info-error-control)**
      "error_control"





      **[WIN32_INFO_DELAYED_START](#constant.win32-info-delayed-start)**
      "delayed_start"





      **[WIN32_INFO_BASE_PRIORITY](#constant.win32-info-base-priority)**
      "base_priority"





      **[WIN32_INFO_DEPENDENCIES](#constant.win32-info-dependencies)**
      "dependencies"





      **[WIN32_INFO_RECOVERY_DELAY](#constant.win32-info-recovery-delay)**
      "recovery_delay"





      **[WIN32_INFO_RECOVERY_ACTION_1](#constant.win32-info-recovery-action-1)**
      "recovery_action_1"





      **[WIN32_INFO_RECOVERY_ACTION_2](#constant.win32-info-recovery-action-2)**
      "recovery_action_2"





      **[WIN32_INFO_RECOVERY_ACTION_3](#constant.win32-info-recovery-action-3)**
      "recovery_action_3"





      **[WIN32_INFO_RECOVERY_RESET_PERIOD](#constant.win32-info-recovery-reset-period)**
      "recovery_reset_period"





      **[WIN32_INFO_RECOVERY_ENABLED](#constant.win32-info-recovery-enabled)**
      "recovery_enabled"





      **[WIN32_INFO_RECOVERY_REBOOT_MSG](#constant.win32-info-recovery-reboot-msg)**
      "recovery_reboot_msg"





      **[WIN32_INFO_RECOVERY_COMMAND](#constant.win32-info-recovery-command)**
      "recovery_command"




   <caption>**Permisos de Servicio Win32**</caption>
   
    
     
      Constante
      Valor
      Descripción


      **[WIN32_SERVICE_ALL_ACCESS](#constant.win32-service-all-access)**
      0x000F003F





      **[WIN32_SERVICE_CHANGE_CONFIG](#constant.win32-service-change-config)**
      0x00000002





      **[WIN32_SERVICE_ENUMERATE_DEPENDENTS](#constant.win32-service-enumerate-dependents)**
      0x00000008





      **[WIN32_SERVICE_INTERROGATE](#constant.win32-service-interrogate)**
      0x00000080





      **[WIN32_SERVICE_PAUSE_CONTINUE](#constant.win32-service-pause-continue)**
      0x00000040





      **[WIN32_SERVICE_QUERY_CONFIG](#constant.win32-service-query-config)**
      0x00000001





      **[WIN32_SERVICE_QUERY_STATUS](#constant.win32-service-query-status)**
      0x00000004





      **[WIN32_SERVICE_START](#constant.win32-service-start)**
      0x00000010





      **[WIN32_SERVICE_STOP](#constant.win32-service-stop)**
      0x00000020





      **[WIN32_SERVICE_USER_DEFINED_CONTROL](#constant.win32-service-user-defined-control)**
      0x00000100





      **[WIN32_ACCESS_SYSTEM_SECURITY](#constant.win32-access-system-security)**
      0x00001000





      **[WIN32_DELETE](#constant.win32-delete)**
      0x00010000





      **[WIN32_READ_CONTROL](#constant.win32-read-control)**
      0x00020000





      **[WIN32_WRITE_DAC](#constant.win32-write-dac)**
      0x00040000





      **[WIN32_WRITE_OWNER](#constant.win32-write-owner)**
      0x00080000





      **[WIN32_GENERIC_READ](#constant.win32-generic-read)**
      Incluye los permisos:
       **[WIN32_STANDARD_RIGHTS_READ](#constant.win32-standard-rights-read)**,
       **[WIN32_SERVICE_QUERY_CONFIG](#constant.win32-service-query-config)**,
       **[WIN32_SERVICE_QUERY_STATUS](#constant.win32-service-query-status)**,
       **[WIN32_SERVICE_INTERROGATE](#constant.win32-service-interrogate)**,
       **[WIN32_SERVICE_ENUMERATE_DEPENDENTS](#constant.win32-service-enumerate-dependents)**






      **[WIN32_GENERIC_WRITE](#constant.win32-generic-write)**
      Incluye los permisos:
       **[WIN32_STANDARD_RIGHTS_WRITE](#constant.win32-standard-rights-write)**,
       **[WIN32_SERVICE_CHANGE_CONFIG](#constant.win32-service-change-config)**






      **[WIN32_GENERIC_EXECUTE](#constant.win32-generic-execute)**
       Incluye los permisos:
       **[WIN32_STANDARD_RIGHTS_EXECUTE](#constant.win32-standard-rights-execute)**,
       **[WIN32_SERVICE_START](#constant.win32-service-start)**,
       **[WIN32_SERVICE_STOP](#constant.win32-service-stop)**,
       **[WIN32_SERVICE_PAUSE_CONTINUE](#constant.win32-service-pause-continue)**,
       **[WIN32_SERVICE_USER_DEFINED_CONTROL](#constant.win32-service-user-defined-control)**





# La clase Win32ServiceException

(PECL win32service &gt;=1.0.0)

## Introducción

    La excepción reemplaza el antiguo mecanismo donde el valor de error debía ser
    comparado con las constantes para detectar qué error había sido emitido. El código
    de la excepción es igual al valor de la constante de error y el mensaje de
    la excepción se basa en el nombre de la constante correspondiente.

## Sinopsis de la Clase

    ****




      class **Win32ServiceException**



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

/_ Métodos heredados _/

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

# La clase Win32Service\RightInfo

(PECL win32service &gt;=1.1.0)

## Introducción

    La clase interna **Win32Service\RightInfo** encapsula el resultado de [win32_read_right_access_service()](#function.win32-read-right-access-service).

## Sinopsis de la Clase

    ****



     final

      class **Win32Service\RightInfo**

     {


    /* Métodos */

final private [\_\_construct](#win32service-rightinfo.construct)()
final public [getDomain](#win32service-rightinfo.get-domain)(): [?](#language.types.null)[string](#language.types.string)
final public [getFullUsername](#win32service-rightinfo.get-full-username)(): [?](#language.types.null)[string](#language.types.string)
final public [getRights](#win32service-rightinfo.get-rights)(): [array](#language.types.array)
final public [getUsername](#win32service-rightinfo.get-username)(): [?](#language.types.null)[string](#language.types.string)
final public [isDenyAccess](#win32service-rightinfo.is-deny-access)(): [bool](#language.types.boolean)
final public [isGrantAccess](#win32service-rightinfo.is-grant-access)(): [bool](#language.types.boolean)

}

# Win32Service\RightInfo::\_\_construct

(PECL win32service &gt;=1.1.0)

Win32Service\RightInfo::\_\_construct — Crear un nuevo RightInfo (no utilizado)

### Descripción

final private **Win32Service\RightInfo::\_\_construct**()

Los objetos [Win32Service\RightInfo](#class.win32service-rightinfo) son retornados como
resultado de [win32_read_right_access_service()](#function.win32-read-right-access-service).

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [Win32Service\RightInfo::getRights()](#win32service-rightinfo.get-rights) - Devuelve la lista de derechos

- [Win32Service\RightInfo::isGrantAccess()](#win32service-rightinfo.is-grant-access) - Devuelve true si el RightInfo se refiere al acceso al recurso

- [Win32Service\RightInfo::isDenyAccess()](#win32service-rightinfo.is-deny-access) - Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

- [Win32Service\RightInfo::getFullUsername()](#win32service-rightinfo.get-full-username) - Devuelve el dominio y el nombre de usuario

- [Win32Service\RightInfo::getUsername()](#win32service-rightinfo.get-username) - Devuelve el nombre de usuario

- [Win32Service\RightInfo::getDomain()](#win32service-rightinfo.get-domain) - Devuelve el dominio del usuario

# Win32Service\RightInfo::getDomain

(PECL win32service &gt;=1.1.0)

Win32Service\RightInfo::getDomain — Devuelve el dominio del usuario

### Descripción

final public **Win32Service\RightInfo::getDomain**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el dominio del usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de dominio o **[null](#constant.null)** si no se encuentra ningún dominio (cuenta local o fallo en la resolución del GUID del usuario).

### Ver también

- [Win32Service\RightInfo::\_\_construct()](#win32service-rightinfo.construct) - Crear un nuevo RightInfo (no utilizado)

- [Win32Service\RightInfo::getRights()](#win32service-rightinfo.get-rights) - Devuelve la lista de derechos

- [Win32Service\RightInfo::isGrantAccess()](#win32service-rightinfo.is-grant-access) - Devuelve true si el RightInfo se refiere al acceso al recurso

- [Win32Service\RightInfo::isDenyAccess()](#win32service-rightinfo.is-deny-access) - Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

- [Win32Service\RightInfo::getFullUsername()](#win32service-rightinfo.get-full-username) - Devuelve el dominio y el nombre de usuario

- [Win32Service\RightInfo::getUsername()](#win32service-rightinfo.get-username) - Devuelve el nombre de usuario

# Win32Service\RightInfo::getFullUsername

(No version information available, might only be in Git)

Win32Service\RightInfo::getFullUsername — Devuelve el dominio y el nombre de usuario

### Descripción

final public **Win32Service\RightInfo::getFullUsername**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el dominio y el nombre de usuario separados por un anti-slash \.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el dominio y el nombre de usuario o el nombre de usuario si el dominio es null o **[null](#constant.null)** si no se encuentra ningún nombre de usuario.

### Ver también

- [Win32Service\RightInfo::\_\_construct()](#win32service-rightinfo.construct) - Crear un nuevo RightInfo (no utilizado)

- [Win32Service\RightInfo::getRights()](#win32service-rightinfo.get-rights) - Devuelve la lista de derechos

- [Win32Service\RightInfo::isGrantAccess()](#win32service-rightinfo.is-grant-access) - Devuelve true si el RightInfo se refiere al acceso al recurso

- [Win32Service\RightInfo::isDenyAccess()](#win32service-rightinfo.is-deny-access) - Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

- [Win32Service\RightInfo::getUsername()](#win32service-rightinfo.get-username) - Devuelve el nombre de usuario

# Win32Service\RightInfo::getRights

(PECL win32service &gt;=1.1.0)

Win32Service\RightInfo::getRights — Devuelve la lista de derechos

### Descripción

final public **Win32Service\RightInfo::getRights**(): [array](#language.types.array)

Devuelve la lista de derechos del usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la lista de derechos del usuario.

El array indexado es la máscara de bits del derecho representado por las [constantes de permisos](#win32service.constants.rights).

El valor es una cadena con el nombre de la constante de Windows (sin el prefijo WIN32\_).

### Ver también

- [Win32Service\RightInfo::\_\_construct()](#win32service-rightinfo.construct) - Crear un nuevo RightInfo (no utilizado)

- [Win32Service\RightInfo::isGrantAccess()](#win32service-rightinfo.is-grant-access) - Devuelve true si el RightInfo se refiere al acceso al recurso

- [Win32Service\RightInfo::isDenyAccess()](#win32service-rightinfo.is-deny-access) - Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

- [Win32Service\RightInfo::getFullUsername()](#win32service-rightinfo.get-full-username) - Devuelve el dominio y el nombre de usuario

- [Win32Service\RightInfo::getUsername()](#win32service-rightinfo.get-username) - Devuelve el nombre de usuario

- [Win32Service\RightInfo::getDomain()](#win32service-rightinfo.get-domain) - Devuelve el dominio del usuario

- [Constantes de permisos Win32](#win32service.constants.rights)

# Win32Service\RightInfo::getUsername

(PECL win32service &gt;=1.1.0)

Win32Service\RightInfo::getUsername — Devuelve el nombre de usuario

### Descripción

final public **Win32Service\RightInfo::getUsername**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el nombre de usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de usuario o el GUID si la resolución falla.

### Ver también

- [Win32Service\RightInfo::\_\_construct()](#win32service-rightinfo.construct) - Crear un nuevo RightInfo (no utilizado)

- [Win32Service\RightInfo::getRights()](#win32service-rightinfo.get-rights) - Devuelve la lista de derechos

- [Win32Service\RightInfo::isGrantAccess()](#win32service-rightinfo.is-grant-access) - Devuelve true si el RightInfo se refiere al acceso al recurso

- [Win32Service\RightInfo::isDenyAccess()](#win32service-rightinfo.is-deny-access) - Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

- [Win32Service\RightInfo::getFullUsername()](#win32service-rightinfo.get-full-username) - Devuelve el dominio y el nombre de usuario

- [Win32Service\RightInfo::getDomain()](#win32service-rightinfo.get-domain) - Devuelve el dominio del usuario

# Win32Service\RightInfo::isDenyAccess

(PECL win32service &gt;=1.1.0)

Win32Service\RightInfo::isDenyAccess — Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

### Descripción

final public **Win32Service\RightInfo::isDenyAccess**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el RightInfo se refiere a la denegación de acceso al recurso, de lo contrario, es **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el RightInfo se refiere a la denegación de acceso al recurso, de lo contrario, es **[false](#constant.false)**.

### Ver también

- [Win32Service\RightInfo::\_\_construct()](#win32service-rightinfo.construct) - Crear un nuevo RightInfo (no utilizado)

- [Win32Service\RightInfo::getRights()](#win32service-rightinfo.get-rights) - Devuelve la lista de derechos

- [Win32Service\RightInfo::isGrantAccess()](#win32service-rightinfo.is-grant-access) - Devuelve true si el RightInfo se refiere al acceso al recurso

- [Win32Service\RightInfo::getFullUsername()](#win32service-rightinfo.get-full-username) - Devuelve el dominio y el nombre de usuario

- [Win32Service\RightInfo::getUsername()](#win32service-rightinfo.get-username) - Devuelve el nombre de usuario

- [Win32Service\RightInfo::getDomain()](#win32service-rightinfo.get-domain) - Devuelve el dominio del usuario

# Win32Service\RightInfo::isGrantAccess

(PECL win32service &gt;=1.1.0)

Win32Service\RightInfo::isGrantAccess — Devuelve true si el RightInfo se refiere al acceso al recurso

### Descripción

final public **Win32Service\RightInfo::isGrantAccess**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el RightInfo se refiere al acceso al recurso, de lo contrario, es **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el RightInfo se refiere al acceso al recurso, de lo contrario, es **[false](#constant.false)**.

### Ver también

- [Win32Service\RightInfo::\_\_construct()](#win32service-rightinfo.construct) - Crear un nuevo RightInfo (no utilizado)

- [Win32Service\RightInfo::getRights()](#win32service-rightinfo.get-rights) - Devuelve la lista de derechos

- [Win32Service\RightInfo::isDenyAccess()](#win32service-rightinfo.is-deny-access) - Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso

- [Win32Service\RightInfo::getFullUsername()](#win32service-rightinfo.get-full-username) - Devuelve el dominio y el nombre de usuario

- [Win32Service\RightInfo::getUsername()](#win32service-rightinfo.get-username) - Devuelve el nombre de usuario

- [Win32Service\RightInfo::getDomain()](#win32service-rightinfo.get-domain) - Devuelve el dominio del usuario

## Tabla de contenidos

- [Win32Service\RightInfo::\_\_construct](#win32service-rightinfo.construct) — Crear un nuevo RightInfo (no utilizado)
- [Win32Service\RightInfo::getDomain](#win32service-rightinfo.get-domain) — Devuelve el dominio del usuario
- [Win32Service\RightInfo::getFullUsername](#win32service-rightinfo.get-full-username) — Devuelve el dominio y el nombre de usuario
- [Win32Service\RightInfo::getRights](#win32service-rightinfo.get-rights) — Devuelve la lista de derechos
- [Win32Service\RightInfo::getUsername](#win32service-rightinfo.get-username) — Devuelve el nombre de usuario
- [Win32Service\RightInfo::isDenyAccess](#win32service-rightinfo.is-deny-access) — Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso
- [Win32Service\RightInfo::isGrantAccess](#win32service-rightinfo.is-grant-access) — Devuelve true si el RightInfo se refiere al acceso al recurso

# Ejemplos

**Ejemplo #1 Registrar un script PHP para ejecutar como servicio**

&lt;?php
win32_create_service(array(
'service' =&gt; 'dummyphp', # nombre del servicio
'display' =&gt; 'sample dummy PHP service', # descripción corta
'description' =&gt; 'This is a dummy Windows service created using PHP.', # descripción larga
'params' =&gt; '"' . **FILE** . '" run', # ruta hacia el script y argumentos
));
?&gt;

**Ejemplo #2 Eliminar un servicio**

&lt;?php
win32_delete_service('dummyphp');
?&gt;

**Ejemplo #3 Ejecutar un servicio**

&lt;?php
if ($argv[1] == 'run') {
win32_start_service_ctrl_dispatcher('dummyphp');

while (WIN32_SERVICE_CONTROL_STOP != win32_get_last_control_message()) { # realizar su trabajo aquí. # intente no tomar más de 30 segundos antes de volver al # inicio del ciclo
}
}
?&gt;

# Funciones win32service

# win32_add_right_access_service

(PECL win32service &gt;=1.1.0)

win32_add_right_access_service — Añade los derechos de acceso para un usuario al servicio

### Descripción

**win32_add_right_access_service**(
    [string](#language.types.string) $servicename,
    [string](#language.types.string) $username,
    [int](#language.types.integer) $right,
    [string](#language.types.string) $machine = **[null](#constant.null)**
): [void](language.types.void.html)

Añade los derechos de acceso para username en el servicio servicename.
Se requieren privilegios administrativos para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio al que se añadirán los derechos de acceso.






     username


       Se añaden los derechos de acceso para username.






     right


       Los derechos autorizados para username.
       Las [constantes](#win32service.constants.rights) se utilizan para definir este valor.






     machine


       El nombre opcional de la máquina en la que se desea crear un servicio.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

Devuelve un objeto [Win32Service\RightInfo](#class.win32service-rightinfo).

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro service está vacío.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro username está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - [win32_read_all_rights_access_service()](#function.win32-read-all-rights-access-service) - Lee todos los derechos de acceso al servicio

    - **win32_read_rights_access_service()**

    - [win32_remove_right_access_service()](#function.win32-remove-right-access-service) - Elimina los derechos de acceso para un usuario en el servicio

    - [Constantes de permisos Win32](#win32service.constants.rights)

# win32_add_service_env_var

(PECL win32service &gt;=1.1.0)

win32_add_service_env_var — Añade una variable de entorno personalizada al servicio

### Descripción

**win32_add_service_env_var**([string](#language.types.string) $servicename, [string](#language.types.string) $varname, [string](#language.types.string) $value): [void](language.types.void.html)

Añade una variable de entorno personalizada varname al servicio servicename.
Esta función solo funciona para la máquina local. Se requieren privilegios administrativos para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio al que se añadirá la variable de entorno.






     varname


       El nombre de la variable de entorno.






     value


       El valor de la variable de entorno.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si la
valor del parámetro service está vacío.

Se lanzará una [ValueError](#class.valueerror) si la
valor del parámetro varname está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - [win32_get_service_env_vars()](#function.win32-get-service-env-vars) - Lee todas las variables de entorno personalizadas del servicio

    - [win32_remove_service_env_var()](#function.win32-remove-service-env-var) - Elimina una variable de entorno personalizada del servicio

# win32_continue_service

(PECL win32service &gt;=0.1.0)

win32_continue_service — Reanuda un servicio en pausa

### Descripción

**win32_continue_service**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Reanuda un servicio en pausa. Se requieren privilegios de administrador o
una cuenta con los derechos adecuados definidos en el ACL del servicio.

### Parámetros

     servicename


       El nombre corto del servicio.






     machine


       Nombre de la máquina (opcional). Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
servicename está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un parámetro es inválido,
        antes se devolvía **[false](#constant.false)**.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes se devolvía un
        [Código de error Win32](#win32service.constants.errors).




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), antes era [mixed](#language.types.mixed).




       PECL win32service 0.3.0

        Esta función ya no requiere una cuenta de administrador si el ACL
        está definido para otra cuenta.





### Ver también

    - [win32_start_service()](#function.win32-start-service) - Inicia un servicio

    - [win32_stop_service()](#function.win32-stop-service) - Detiene un servicio

    - [win32_pause_service()](#function.win32-pause-service) - Pone en pausa un servicio

    - [win32_send_custom_control()](#function.win32-send-custom-control) - Envía un control personalizado al servicio

    - Los [códigos de error Win32](#win32service.constants.errors)

# win32_create_service

(PECL win32service &gt;=0.1.0)

win32_create_service — Crea una nueva entrada para servicio en la base de datos SCM

### Descripción

**win32_create_service**([array](#language.types.array) $details, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Intenta añadir un servicio en la base de datos SCM. Se necesitan privilegios
de administrador para que esto tenga éxito.

### Parámetros

     details


       Un array de detalles del servicio:




         service


           El nombre corto del servicio. Este es el nombre que se utilizará
           para controlar el servicio utilizando el comando
           net. El servicio debe ser único (dos servicios
           no pueden compartir el mismo nombre), e idealmente, debería evitar
           tener espacios en su nombre.






         display

          El nombre de visualización del servicio. Este es el nombre que se verá
           en la Applet Servicios.






         description


           La descripción larga del servicio.
           Esta es la descripción que se verá en la Applet de Servicios.






         user


           El nombre de usuario bajo el cual se desea que el servicio se ejecute. Si se omite, el servicio funcionará como
           LocalSystem. Si se especifica el nombre de usuario, también se debe proporcionar una contraseña.






         password


           La contraseña que corresponde a user.






         path


           La ruta completa al módulo ejecutable que se iniciará cuando el
           servicio se inicie. Si se omite, se utilizará la ruta del proceso actual de
           PHP.






         params


           Argumentos de comando a pasar al servicio cuando se inicie.
           Si se desea ejecutar un script PHP como servicio, entonces
           el primer argumento debería ser la ruta completa al script PHP
           que se planea ejecutar. Si el nombre del script o la ruta
           contienen espacios, entonces, rodee la ruta completa del script
           PHP con "






         load_order


           Controla el load_order. Esto aún no está completamente soportado.






         svc_type


           Establece el tipo de servicio. Si se omite, el valor por omisión es
           **[WIN32_SERVICE_WIN32_OWN_PROCESS](#constant.win32-service-win32-own-process)**. No se debe cambiar esto a menos que se sepa realmente lo que se está haciendo.






         start_type


           Especifica cómo debe iniciarse el servicio. El valor por omisión es **[WIN32_SERVIDE_AUTO_START](#constant.win32-servide-auto-start)** lo que significa que el servicio se iniciará cuando la máquina se inicie.






         error_control


           Informa al SCM sobre qué hacer cuando detecte un problema con el servicio. El valor por omisión es
           **[WIN32_SERVER_ERROR_IGNORE](#constant.win32-server-error-ignore)**. Cambiar este valor aún no está completamente soportado.






         delayed_start


           Si delayed_start está establecido a
           **[true](#constant.true)**, entonces informará al SCM que este servicio debe iniciarse después de los servicios iniciados automáticamente y un cierto retraso.




           Cualquier servicio puede ser marcado como un servicio retrasado después del inicio automático; sin embargo, esta configuración no tiene ningún efecto mientras el parámetro start_type
           del servicio valga **[WIN32_SERVICE_AUTO_START](#constant.win32-service-auto-start)**.




           Esta configuración solo se aplica en Windows Vista y servidores Windows 2008 y posteriores.






         base_priority


           Para reducir el impacto en el uso del procesador, puede ser necesario establecer una prioridad más baja que la normal.




           El parámetro base_priority puede ser establecido a
           una de las constantes definidas en las
           [clases de baja prioridad Win32](#win32service.constants.basepriorities).






         dependencies


           Para definir las dependencias del servicio, es necesario establecer este parámetro con la lista de nombres de servicios en un array.






         recovery_delay


           Este parámetro define el retraso entre el fallo y la ejecución de
           la acción de recuperación. El valor es en milisegundos.




           El valor por omisión es 60000.






         recovery_action_1


           La acción que se ejecutará en caso de la primera falla. La acción por omisión es **[WIN32_SC_ACTION_NONE](#constant.win32-sc-action-none)**.




           El parámetro recovery_action_1 puede ser establecido
           con una de las constantes definidas en las
           [Acciones de recuperación Win32](#win32service.constants.recovery-action).






         recovery_action_2


           La acción que se ejecutará en caso de la segunda falla. La acción por omisión es **[WIN32_SC_ACTION_NONE](#constant.win32-sc-action-none)**.




           El parámetro recovery_action_2 puede ser establecido
           con una de las constantes definidas en las
           [Acciones de recuperación Win32](#win32service.constants.recovery-action).






         recovery_action_3


           La acción que se ejecutará en caso de fallas subsiguientes. La acción por omisión es **[WIN32_SC_ACTION_NONE](#constant.win32-sc-action-none)**.




           El parámetro recovery_action_3 puede ser establecido
           con una de las constantes definidas en las
           [Acciones de recuperación Win32](#win32service.constants.recovery-action).






         recovery_reset_period


           El contador de fallas se reiniciará después del retraso definido
           en este parámetro. El retraso se expresa en segundos.




           El valor por omisión es 86400.






         recovery_enabled


           Establecer este parámetro a **[true](#constant.true)** para habilitar las opciones de recuperación, y **[false](#constant.false)**
           para deshabilitarlas.




           El valor por omisión es **[false](#constant.false)**






         recovery_reboot_msg


           Añadir este parámetro para definir el mensaje registrado en el registro
           de eventos de Windows antes del reinicio. Solo se utiliza si una
           de las acciones está definida a
           **[WIN32_SC_ACTION_REBOOT](#constant.win32-sc-action-reboot)**.






         recovery_command


           Añadir este parámetro para definir el comando a ejecutar cuando una
           acción está definida a
           **[WIN32_SC_ACTION_RUN_COMMAND](#constant.win32-sc-action-run-command)**.










     machine


       El nombre opcional de la máquina en la que se desea crear el servicio.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
service está vacío.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
path está omitido o vacío.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
svc_type es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
start_type es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
error_control es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
base_priority es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
recovery_delay no está entre
0 y PHP_INT_MAX.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
recovery_action_1 es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
recovery_action_2 es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
recovery_action_3 es incorrecto.

Se lanzará una [ValueError](#class.valueerror) si el valor del parámetro
recovery_reset_period no está entre
0 y PHP_INT_MAX.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Se lanzará una [ValueError](#class.valueerror) si un parámetro es inválido,
        antes **[false](#constant.false)** era devuelto.




       PECL win32service 1.0.0

        Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era devuelto.




       PECL win32service 1.0.0

        El tipo de retorno ahora es [void](language.types.void.html), antes era [mixed](#language.types.mixed).




       PECL win32service 0.4.0

        Los parámetros dependencies, recovery_delay,
        recovery_action_1, recovery_action_2,
        recovery_action_3, recovery_reset_period,
        recovery_enabled, recovery_reboot_msg
        y recovery_command han sido añadidos.





### Ejemplos

    **Ejemplo #1 Ejemplo con win32_create_service()**



     Crea un servicio cuyo nombre corto es 'dummyphp'.

&lt;?php
\$x = win32_create_service(array(
'service' =&gt; 'dummyphp', // el nombre del servicio
'display' =&gt; 'ejemplo de servicio PHP ficticio', // la descripción corta
'description' =&gt; 'Este es un servicio Windows creado utilizando PHP', // la descripción larga
'params' =&gt; '"' . **FILE** . '" run', // ruta al script así como los argumentos
));
debug_zval_dump(\$x);
?&gt;

    **Ejemplo #2 Un ejemplo win32_create_service()** con dependencias



     Crea un servicio cuyo nombre corto es 'dummyphp' con dependencias.

&lt;?php
\$x = win32_create_service(array(
'service' =&gt; 'dummyphp', // El nombre del servicio
'display' =&gt; 'ejemplo de servicio PHP ficticio', // Una descripción corta
'description' =&gt; 'Este es un servicio Windows creado utilizando PHP.', // Una descripción larga
'params' =&gt; '"' . **FILE** . '" run', // ruta al script así como los argumentos
'dependencies' =&gt; array("Netman"), // La lista de dependencias
));
debug_zval_dump(\$x);
?&gt;

    **Ejemplo #3 Ejemplo de win32_create_service()** con opciones de recuperación



     Crea un servicio cuyo nombre corto es 'dummyphp' con opciones de recuperación.

&lt;?php
\$x = win32_create_service(array(
'service' =&gt; 'dummyphp', // El nombre del servicio
'display' =&gt; 'ejemplo de servicio PHP ficticio', // Una descripción corta
'description' =&gt; 'Este es un servicio Windows creado utilizando PHP.', // Una descripción larga
'params' =&gt; '"' . **FILE** . '" run', // ruta al script así como los argumentos
'recovery_delay' =&gt; 120000, // Las acciones de recuperación se ejecutarán después de 2 minutos
'recovery_action_1' =&gt; WIN32_SC_ACTION_RESTART, // Primera falla, reiniciar el servicio
'recovery_action_2' =&gt; WIN32_SC_ACTION_RUN_COMMAND, // Segunda falla, ejecutar un comando
'recovery_action_3' =&gt; WIN32_SC_ACTION_NONE, // Fallas subsiguientes, no hacer nada
'recovery_reset_period' =&gt; 86400, // Reiniciar el contador de fallas después de 1 día (86400 minutos)
'recovery_enabled' =&gt; true, // Habilitar las opciones de recuperación
'recovery_reboot_msg' =&gt; null, // No definir un mensaje de reinicio, no es útil.
'recovery_command' =&gt; "c:\clean-service.bat", // Cuando la acción es WIN32_SC_ACTION_RUN_COMMAND, ejecutar este comando.
));
debug_zval_dump(\$x);
?&gt;

### Ver también

    - [win32_delete_service()](#function.win32-delete-service) - Elimina una entrada de servicio de la base de datos SCM

    - [Las clases de baja prioridad Win32](#win32service.constants.basepriorities)

    - [Las acciones de recuperación Win32](#win32service.constants.recovery-action)

    - [Los códigos de error Win32](#win32service.constants.errors)

# win32_delete_service

(PECL win32service &gt;=0.1.0)

win32_delete_service — Elimina una entrada de servicio de la base de datos SCM

### Descripción

**win32_delete_service**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Intenta eliminar un servicio de la base de datos SCM. Los privilegios
de administrador son necesarios para que esta función tenga éxito.

Esta función solo marca el servicio para eliminación. Si otros
procesos (como el Applet Services) están abiertos, entonces la eliminación será
pospuesta hasta que estas aplicaciones se cierren. Si un servicio está marcado para eliminación, otros intentos de eliminación fallarán y los intentos de crear un nuevo servicio con ese nombre también fallarán.

### Parámetros

     servicename


       El nombre corto del servicio.






     machine


       El nombre opcional de la máquina.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

    Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
    servicename está vacío.





    Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), antes era [mixed](#language.types.mixed).





### Ejemplos

    **Ejemplo #1 Ejemplo con win32_delete_service()**



     Elimina el servicio dummyphp.

&lt;?php
win32_delete_service('dummyphp');
?&gt;

### Ver también

    - [win32_create_service()](#function.win32-create-service) - Crea una nueva entrada para servicio en la base de datos SCM

    - [Los códigos de error Win32](#win32service.constants.errors)

# win32_get_last_control_message

(PECL win32service &gt;=0.1.0)

win32_get_last_control_message — Devuelve el último mensaje de control que ha sido enviado a este servicio

### Descripción

**win32_get_last_control_message**(): [int](#language.types.integer)

Devuelve el código de control que ha sido enviado por última vez a este proceso de
servicio. Cuando funciona como servicio, debe verificar periódicamente para determinar si el servicio debe ser detenido.

**Precaución**

    Desde la versión 0.2.0, esta función solo funciona en línea de
    comandos ("cli" SAPI). Está deshabilitada en otros casos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una constante de control que será una de
[las
constantes de control de mensajes de servicio Win32Service](#win32service.constants.servicecontrol) :
**[WIN32_SERVICE_CONTROL_CONTINUE](#constant.win32-service-control-continue)**,
**[WIN32_SERVICE_CONTROL_DEVICEEVENT](#constant.win32-service-control-deviceevent)**,
**[WIN32_SERVICE_CONTROL_HARDWAREPROFILECHANGE](#constant.win32-service-control-hardwareprofilechange)**,
**[WIN32_SERVICE_CONTROL_INTERROGATE](#constant.win32-service-control-interrogate)**,
**[WIN32_SERVICE_CONTROL_NETBINDADD](#constant.win32-service-control-netbindadd)**,
**[WIN32_SERVICE_CONTROL_NETBINDDISABLE](#constant.win32-service-control-netbinddisable)**,
**[WIN32_SERVICE_CONTROL_NETBINDENABLE](#constant.win32-service-control-netbindenable)**,
**[WIN32_SERVICE_CONTROL_NETBINDREMOVE](#constant.win32-service-control-netbindremove)**,
**[WIN32_SERVICE_CONTROL_PARAMCHANGE](#constant.win32-service-control-paramchange)**,
**[WIN32_SERVICE_CONTROL_PAUSE](#constant.win32-service-control-pause)**,
**[WIN32_SERVICE_CONTROL_POWEREVENT](#constant.win32-service-control-powerevent)**,
**[WIN32_SERVICE_CONTROL_PRESHUTDOWN](#constant.win32-service-control-preshutdown)**,
**[WIN32_SERVICE_CONTROL_SESSIONCHANGE](#constant.win32-service-control-sessionchange)**,
**[WIN32_SERVICE_CONTROL_SHUTDOWN](#constant.win32-service-control-shutdown)**,
**[WIN32_SERVICE_CONTROL_STOP](#constant.win32-service-control-stop)**.

Si el valor está entre 128 y 255, el código de control es personalizado.

### Errores/Excepciones

Antes de la versión 1.0.0, si esta función se utiliza fuera del SAPI "cli", se emitirá
un error **[E_ERROR](#constant.e-error)**.

A partir de la versión 1.0.0, lanzará una
[Win32ServiceException](#class.win32serviceexception) si el SAPI no es
"cli"

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 0.2.0

        Esta función solo funciona en línea de
        comandos.





### Ver también

    - [win32_start_service_ctrl_dispatcher()](#function.win32-start-service-ctrl-dispatcher) - Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado

    - [win32_set_service_status()](#function.win32-set-service-status) - Actualiza el estado de un servicio

    - [win32_set_service_exit_mode()](#function.win32-set-service-exit-mode) - Define o devuelve el modo de salida para el servicio en ejecución

    - [win32_set_service_exit_code()](#function.win32-set-service-exit-code) - Define o devuelve el código de salida para el servicio en ejecución

    - [las constantes de control de mensajes de servicio Win32Service](#win32service.constants.servicecontrol)

# win32_get_service_env_vars

(PECL win32service &gt;=1.1.0)

win32_get_service_env_vars — Lee todas las variables de entorno personalizadas del servicio

### Descripción

**win32_get_service_env_vars**([string](#language.types.string) $servicename): [array](#language.types.array)

Lee todas las variables de entorno personalizadas del servicio servicename.
Esta función solo funciona para la máquina local. Los privilegios administrativos son necesarios para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio para leer las variables de entorno.





### Valores devueltos

Devuelve un [array](#language.types.array) con el nombre de la variable como clave y el valor de la variable como valor.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
service está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - [win32_add_service_env_var()](#function.win32-add-service-env-var) - Añade una variable de entorno personalizada al servicio

    - [win32_remove_service_env_var()](#function.win32-remove-service-env-var) - Elimina una variable de entorno personalizada del servicio

# win32_pause_service

(PECL win32service &gt;=0.1.0)

win32_pause_service — Pone en pausa un servicio

### Descripción

**win32_pause_service**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Pone en pausa un servicio. Se requieren privilegios de administrador o
una cuenta con los derechos adecuados definidos en la ACL del servicio.

### Parámetros

     servicename


       El nombre corto del servicio.






     machine


       Nombre de la máquina (opcional). Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

    Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
    servicename está vacío.





    Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), antes era [mixed](#language.types.mixed).




       PECL win32service 0.3.0

        Esta función ya no requiere una cuenta de administrador si la ACL
        está definida para otra cuenta.





### Ver también

    - [win32_start_service()](#function.win32-start-service) - Inicia un servicio

    - [win32_stop_service()](#function.win32-stop-service) - Detiene un servicio

    - [win32_continue_service()](#function.win32-continue-service) - Reanuda un servicio en pausa

    - [win32_send_custom_control()](#function.win32-send-custom-control) - Envía un control personalizado al servicio

    - Los [códigos de error Win32](#win32service.constants.errors)

# win32_query_service_status

(PECL win32service &gt;=0.1.0)

win32_query_service_status — Consulta el estado de un servicio

### Descripción

**win32_query_service_status**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [array](#language.types.array)

Consulta el estado actual de un servicio, devolviendo un array
de información.

### Parámetros

     servicename


       El nombre corto del servicio.






     machine


       El nombre opcional de la máquina.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

Devuelve un array que contiene la siguiente información
en caso de éxito.

    Antes de la versión 1.0.0, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.








     ServiceType


       El dwServiceType. Consulte las
       [máscaras de tipo de
       servicio Win32Service](#win32service.constants.servicetype).






     CurrentState


       El dwCurrentState. Consulte las
       [constantes de estado
       de los servicios Win32Service](#win32service.constants.servicestatus).






     ControlsAccepted


       Qué controles de servicio son aceptados por el servicio. Consulte
       las [máscaras
       aceptadas para los mensajes de control de servicio Win32Service](#win32service.constants.controlsaccepted).






     Win32ExitCode


       Si el servicio termina, el código de retorno del proceso. Este valor es igual
       a **[WIN32_ERROR_SERVICE_SPECIFIC_ERROR](#constant.win32-error-service-specific-error)** si el modo de salida no es
       correcto. Consulte
       [códigos de error Win32Service](#win32service.constants.errors)
       y [win32_set_service_exit_mode()](#function.win32-set-service-exit-mode).






     ServiceSpecificExitCode


       Si el servicio termina con una condición de error, el código específico del
       servicio que se registrará en el registro de eventos es visible aquí.
       Este valor es igual al valor definido por
       [win32_set_service_exit_code()](#function.win32-set-service-exit-code).






     CheckPoint


       Si el servicio se detiene, mantiene el número actual de punto de control.
       Esto es utilizado por SCM como una especie de latido para detectar un proceso de
       servicio detenido. El valor del punto de control se interpreta mejor en
       conjunción con el valor WaitHint.






     WaitHint


       Si el servicio se detiene, establecerá un WaitHint a un valor de punto de
       control que indique la ejecución al 100%. Esto puede ser utilizado para
       implementar una barra de progreso.






     ProcessId


       El identificador de proceso de ventana. Si es 0, el proceso no está en ejecución.






     ServiceFlags


       El dwServiceFlags. Consulte las
       [constantes
        utilizadas para las banderas de los servicios Win32Service](#win32service.constants.serviceflag).





### Errores/Excepciones

    Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
    servicename está vacío.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [array](#language.types.array), antes era [mixed](#language.types.mixed).





### Ver también

    - Las [constantes Win32Service predefinidas](#win32service.constants)

# win32_read_all_rights_access_service

(PECL win32service &gt;=1.1.0)

win32_read_all_rights_access_service — Lee todos los derechos de acceso al servicio

### Descripción

**win32_read_all_rights_access_service**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [array](#language.types.array)

Lee todos los derechos de acceso al servicio servicename.
Se requieren privilegios administrativos para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio para leer los derechos de acceso.






     machine


       El nombre opcional de la máquina en la que se desea crear un servicio.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

Devuelve un [array](#language.types.array) de [Win32Service\RightInfo](#class.win32service-rightinfo)

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
service está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - **win32_read_rights_access_service()**

    - [win32_add_right_access_service()](#function.win32-add-right-access-service) - Añade los derechos de acceso para un usuario al servicio

    - [win32_remove_right_access_service()](#function.win32-remove-right-access-service) - Elimina los derechos de acceso para un usuario en el servicio

    - [Constantes de permisos Win32](#win32service.constants.rights)

# win32_read_right_access_service

(PECL win32service &gt;=1.1.0)

win32_read_right_access_service — Lee los derechos de acceso al servicio para un usuario

### Descripción

**win32_read_right_access_service**([string](#language.types.string) $servicename, [string](#language.types.string) $username, [string](#language.types.string) $machine = **[null](#constant.null)**): [Win32Service\RightInfo](#class.win32service-rightinfo)

Lee los derechos de acceso para username en el servicio servicename.
Se requieren privilegios administrativos para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio para leer los derechos de acceso.






     username


       Lee los derechos de acceso para username






     machine


       El nombre opcional de la máquina en la que se desea crear un servicio.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

Devuelve un objeto [Win32Service\RightInfo](#class.win32service-rightinfo).

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
service está vacío.

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
username está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - [win32_read_all_rights_access_service()](#function.win32-read-all-rights-access-service) - Lee todos los derechos de acceso al servicio

    - [win32_add_right_access_service()](#function.win32-add-right-access-service) - Añade los derechos de acceso para un usuario al servicio

    - [win32_remove_right_access_service()](#function.win32-remove-right-access-service) - Elimina los derechos de acceso para un usuario en el servicio

    - [Constantes de permisos Win32](#win32service.constants.rights)

# win32_remove_right_access_service

(PECL win32service &gt;=1.1.0)

win32_remove_right_access_service — Elimina los derechos de acceso para un usuario en el servicio

### Descripción

**win32_remove_right_access_service**([string](#language.types.string) $servicename, [string](#language.types.string) $username, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Elimina los derechos de acceso para username en el servicio servicename.
Se requieren privilegios administrativos para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio del que se eliminan los derechos de acceso.






     username


       Elimina los derechos de acceso para username.






     machine


       El nombre opcional de la máquina en la que se desea crear un servicio.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
service está vacío.

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
username está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - [win32_read_all_rights_access_service()](#function.win32-read-all-rights-access-service) - Lee todos los derechos de acceso al servicio

    - **win32_read_rights_access_service()**

    - [win32_add_right_access_service()](#function.win32-add-right-access-service) - Añade los derechos de acceso para un usuario al servicio

# win32_remove_service_env_var

(No version information available, might only be in Git)

win32_remove_service_env_var — Elimina una variable de entorno personalizada del servicio

### Descripción

**win32_remove_service_env_var**([string](#language.types.string) $servicename, [string](#language.types.string) $varname): [void](language.types.void.html)

Elimina una variable de entorno personalizada varname del servicio servicename.
Esta función solo funciona para la máquina local. Se requieren privilegios administrativos para que esto tenga éxito.

### Parámetros

     servicename


       El nombre del servicio del que se eliminará la variable de entorno.






     varname


       El nombre de la variable de entorno.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
service está vacío.

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
varname está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Ver también

    - [win32_get_service_env_vars()](#function.win32-get-service-env-vars) - Lee todas las variables de entorno personalizadas del servicio

    - [win32_add_service_env_var()](#function.win32-add-service-env-var) - Añade una variable de entorno personalizada al servicio

# win32_send_custom_control

(PECL win32service &gt;=0.4.0)

win32_send_custom_control — Envía un control personalizado al servicio

### Descripción

**win32_send_custom_control**([string](#language.types.string) $servicename, [int](#language.types.integer) $control, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

    Consulte [» Microsoft ControlService function](https://docs.microsoft.com/en-us/windows/desktop/api/winsvc/nf-winsvc-controlservice) para más detalles.

### Parámetros

     servicename


       El nombre corto del servicio.






    control


      El valor de control personalizado entre 128 y 255.






     machine


       Nombre de la máquina opcional. Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Antes de la versión 1.0.0, si el valor de control no está entre 128 y 255, esta función emite
un error de nivel **[E_ERROR](#constant.e-error)**.

    Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
    servicename está vacío.




    Se lanzará una [ValueError](#class.valueerror) si el valor del argumento

control no está entre 128 y 255.

    Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), antes era [mixed](#language.types.mixed).





### Ver también

    - [win32_start_service()](#function.win32-start-service) - Inicia un servicio

    - [win32_stop_service()](#function.win32-stop-service) - Detiene un servicio

    - [win32_pause_service()](#function.win32-pause-service) - Pone en pausa un servicio

    - [win32_continue_service()](#function.win32-continue-service) - Reanuda un servicio en pausa

    - [Códigos de error Win32](#win32service.constants.errors)

# win32_set_service_exit_code

(PECL win32service &gt;=0.4.0)

win32_set_service_exit_code — Define o devuelve el código de salida para el servicio en ejecución

### Descripción

**win32_set_service_exit_code**([int](#language.types.integer) $exitCode = 1): [int](#language.types.integer)

Cambia o devuelve el código de salida. El código de salida se utiliza únicamente
si el modo de salida no es correcto.
Si el valor no es cero, la configuración de recuperación puede ser utilizada
después del fallo del servicio. Consulte [» los
códigos de error del sistema Microsoft](https://docs.microsoft.com/en-us/windows/desktop/debug/system-error-codes) para más detalles.

**Precaución**

    Esta función solo funciona en el SAPI "cli". En otros SAPI, esta
    función está deshabilitada.

### Parámetros

    exitCode


      El código de retorno utilizado a la salida.


### Valores devueltos

Devuelve el código de salida actual o el anterior.

### Errores/Excepciones

Antes de la versión 1.0.0, si esta función se utiliza fuera del SAPI "cli", se emitirá
un error **[E_ERROR](#constant.e-error)**.

A partir de la versión 1.0.0, lanzará una
[Win32ServiceException](#class.win32serviceexception) si el SAPI no es
"cli"

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.





### Ver también

    - [win32_start_service_ctrl_dispatcher()](#function.win32-start-service-ctrl-dispatcher) - Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado

    - [win32_set_service_status()](#function.win32-set-service-status) - Actualiza el estado de un servicio

    - [win32_set_service_exit_mode()](#function.win32-set-service-exit-mode) - Define o devuelve el modo de salida para el servicio en ejecución

# win32_set_service_exit_mode

(PECL win32service &gt;=0.4.0)

win32_set_service_exit_mode — Define o devuelve el modo de salida para el servicio en ejecución

### Descripción

**win32_set_service_exit_mode**([bool](#language.types.boolean) $gracefulMode = true): [bool](#language.types.boolean)

Si se proporciona el argumento gracefulMode, se modifica el modo de
salida. Cuando el modo de salida no es correcto, el código de salida utilizado puede ser definido con la función
[win32_set_service_exit_code()](#function.win32-set-service-exit-code).

**Precaución**

    Esta función solo funciona en el SAPI "cli". En otros SAPI, esta
    función está deshabilitada.

### Parámetros

    gracefulMode


      **[true](#constant.true)** para la salida correcta. **[false](#constant.false)** para la salida con error.


### Valores devueltos

Devuelve el modo de salida actual o anterior.

### Errores/Excepciones

Antes de la versión 1.0.0, si esta función se utiliza fuera del SAPI "cli", se emitirá
un error **[E_ERROR](#constant.e-error)**.

A partir de la versión 1.0.0, lanzará una
[Win32ServiceException](#class.win32serviceexception) si el SAPI no es
"cli"

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        antes **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.





### Ver también

    - [win32_start_service_ctrl_dispatcher()](#function.win32-start-service-ctrl-dispatcher) - Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado

    - [win32_set_service_status()](#function.win32-set-service-status) - Actualiza el estado de un servicio

    - [win32_set_service_exit_code()](#function.win32-set-service-exit-code) - Define o devuelve el código de salida para el servicio en ejecución

# win32_set_service_pause_resume_state

(PECL win32service &gt;=1.1.0)

win32_set_service_pause_resume_state — Define o devuelve la capacidad de pausa/reanudación para el servicio en ejecución

### Descripción

**win32_set_service_pause_resume_state**([bool](#language.types.boolean) $state = true): [bool](#language.types.boolean)

Si se proporciona el argumento state, se modifica la capacidad de pausa/reanudación.

**Precaución**

    Esta función solo funciona en el SAPI "cli" y en el contexto de ejecución del servicio de Windows. En otros SAPI,
    esta función está deshabilitada.

### Parámetros

    state


      **[true](#constant.true)** para habilitar la capacidad de pausa/reanudación del servicio. **[false](#constant.false)** para deshabilitar la capacidad de pausa/reanudación del servicio.


### Valores devueltos

Devuelve el estado actual o anterior de la capacidad de pausa/reanudación.

### Errores/Excepciones

A partir de la versión 1.0.0, si el SAPI no es "cli", esta función emite un error de nivel
**[E_ERROR](#constant.e-error)**.

    Desde la versión 1.0.0, lanzará una
    [Win32ServiceException](#class.win32serviceexception) si el SAPI no es
    "cli"

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) sobre datos inválidos en los argumentos,
        anteriormente **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        anteriormente un
        [código de error Win32](#win32service.constants.errors)
        era retornado.





### Ver también

    - [win32_start_service_ctrl_dispatcher()](#function.win32-start-service-ctrl-dispatcher) - Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado

    - [win32_set_service_status()](#function.win32-set-service-status) - Actualiza el estado de un servicio

    - [win32_set_service_exit_code()](#function.win32-set-service-exit-code) - Define o devuelve el código de salida para el servicio en ejecución

# win32_set_service_status

(PECL win32service &gt;=0.1.0)

win32_set_service_status — Actualiza el estado de un servicio

### Descripción

**win32_set_service_status**([int](#language.types.integer) $status, [int](#language.types.integer) $checkpoint = 0): [void](language.types.void.html)

Informa al SCM del estado actual de un servicio en ejecución. Esta llamada
solo es válida para un proceso de servicio en ejecución.

**Precaución**

    Desde la versión 0.2.0, esta función solo funciona en línea de
    comandos ("cli" SAPI). Está deshabilitada en otros casos.

### Parámetros

     status


       El código de estado del servicio, uno de
       **[WIN32_SERVICE_RUNNING](#constant.win32-service-running)**,
       **[WIN32_SERVICE_STOPPED](#constant.win32-service-stopped)**,
       **[WIN32_SERVICE_STOP_PENDING](#constant.win32-service-stop-pending)**,
       **[WIN32_SERVICE_START_PENDING](#constant.win32-service-start-pending)**,
       **[WIN32_SERVICE_CONTINUE_PENDING](#constant.win32-service-continue-pending)**,
       **[WIN32_SERVICE_PAUSE_PENDING](#constant.win32-service-pause-pending)**,
       **[WIN32_SERVICE_PAUSED](#constant.win32-service-paused)**.






     checkpoint


       Este valor será incrementado periódicamente por el servicio
       para reportar su progreso durante las operaciones de inicio, detención,
       pausa o reanudación. Por ejemplo, el servicio incrementará este valor
       cuando haya completado cada paso de su inicialización durante el inicio.




       checkpoint solo es válido cuando
       status es una de las siguientes constantes:
       **[WIN32_SERVICE_STOP_PENDING](#constant.win32-service-stop-pending)**,
       **[WIN32_SERVICE_START_PENDING](#constant.win32-service-start-pending)**,
       **[WIN32_SERVICE_CONTINUE_PENDING](#constant.win32-service-continue-pending)** o
       **[WIN32_SERVICE_PAUSE_PENDING](#constant.win32-service-pause-pending)**.





### Valores devueltos

    No se retorna ningún valor.




    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Antes de la versión 1.0.0, si esta función se utiliza fuera del SAPI "cli", se emitirá
un error **[E_ERROR](#constant.e-error)**.

A partir de la versión 1.0.0, lanzará una
[Win32ServiceException](#class.win32serviceexception) si el SAPI no es
"cli"

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        anteriormente **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        anteriormente un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), anteriormente era [mixed](#language.types.mixed).




       PECL win32service 0.2.0

        Esta función solo funciona en línea de
        comandos ("cli" SAPI).





### Ver también

    - [win32_start_service_ctrl_dispatcher()](#function.win32-start-service-ctrl-dispatcher) - Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado

    - [win32_get_last_control_message()](#function.win32-get-last-control-message) - Devuelve el último mensaje de control que ha sido enviado a este servicio

    - [win32_set_service_exit_mode()](#function.win32-set-service-exit-mode) - Define o devuelve el modo de salida para el servicio en ejecución

    - [win32_set_service_exit_code()](#function.win32-set-service-exit-code) - Define o devuelve el código de salida para el servicio en ejecución

    - Las [constantes de estado de los servicios Win32Service](#win32service.constants.servicestatus)

# win32_start_service

(PECL win32service &gt;=0.1.0)

win32_start_service — Inicia un servicio

### Descripción

**win32_start_service**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Intenta iniciar el servicio nombrado. Se requieren privilegios de administrador o
una cuenta con los derechos adecuados definidos en la ACL del servicio.

### Parámetros

     servicename


       El nombre corto del servicio.






     machine


       El nombre opcional de la máquina.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Se lanzará una [ValueError](#class.valueerror) si el valor del argumento
servicename está vacío.

Se lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        anteriormente **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        anteriormente un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), anteriormente era [mixed](#language.types.mixed).




       PECL win32service 0.3.0

        Esta función ya no requiere una cuenta de administrador si la ACL
        está definida para otra cuenta.





### Ver también

    - [win32_stop_service()](#function.win32-stop-service) - Detiene un servicio

    - [win32_pause_service()](#function.win32-pause-service) - Pone en pausa un servicio

    - [win32_continue_service()](#function.win32-continue-service) - Reanuda un servicio en pausa

    - [win32_send_custom_control()](#function.win32-send-custom-control) - Envía un control personalizado al servicio

    - [Códigos de error Win32](#win32service.constants.errors)

# win32_start_service_ctrl_dispatcher

(PECL win32service &gt;=0.1.0)

win32_start_service_ctrl_dispatcher — Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado

### Descripción

**win32_start_service_ctrl_dispatcher**([string](#language.types.string) $name, [bool](#language.types.boolean) $gracefulMode = true): [void](language.types.void.html)

Cuando se ejecuta a través del Gestionador de Control de Servicio, un proceso de
servicio debe "registrarse" con él para establecer un servicio de supervisión y
comunicación eficiente. Esta función realiza el registro iniciando un hilo para
manejar las comunicaciones de bajo nivel con el Gestionador de Control de Servicio.

Una vez iniciado, el proceso del servicio debe hacer dos cosas. La primera es
informar al Service Control Manager que el servicio está en ejecución. La segunda
es llamar a la función [win32_set_service_status()](#function.win32-set-service-status) con la constante
**[WIN32_SERVICE_RUNNING](#constant.win32-service-running)**. Si necesita lanzar procesos largos antes
de que el servicio se inicie, puede usar la constante
**[WIN32_SERVICE_START_PENDING](#constant.win32-service-start-pending)**. La segunda es continuar
verificando con el Service Control Manager para determinar si el servicio se
detiene o no. Esto implica llamar periódicamente a la función
[win32_get_last_control_message()](#function.win32-get-last-control-message) y tratar el código devuelto.

**Precaución**

    Desde la versión 0.2.0, esta función solo funciona en línea de
    comandos. Está deshabilitada en otros casos.

### Parámetros

     name


       El nombre corto del servicio, como se registra con
       [win32_create_service()](#function.win32-create-service).






     gracefulMode


       **[true](#constant.true)** para la salida correcta. **[false](#constant.false)** para la salida con error. Consulte
       [win32_set_service_exit_mode()](#function.win32-set-service-exit-mode) para más detalles.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Antes de la versión 1.0.0, si esta función se utiliza fuera del SAPI "cli", se emitirá
un error **[E_ERROR](#constant.e-error)**.

A partir de la versión 1.0.0, lanzará una
[Win32ServiceException](#class.win32serviceexception) si el SAPI no es
"cli"

### Historial de cambios

       Versión
       Descripción






       PECL win32service 1.0.0

        Lanzará una [ValueError](#class.valueerror) si un argumento es inválido,
        anteriormente **[false](#constant.false)** era retornado.




       PECL win32service 1.0.0

        Lanzará una [Win32ServiceException](#class.win32serviceexception) en caso de error,
        anteriormente un
        [Código de error Win32](#win32service.constants.errors)
        era retornado.




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), anteriormente era [mixed](#language.types.mixed).




       PECL win32service 0.4.0

        Se añadió el argumento gracefulMode.




       PECL win32service 0.2.0

        Esta función solo funciona en línea de
        comandos ("cli" SAPI).





### Ejemplos

    **Ejemplo #1 Ejemplo con win32_start_service_ctrl_dispatcher()**



     Verifica si el servicio funciona bajo SCM.

&lt;?php
if (!win32_start_service_ctrl_dispatcher('dummyphp')) {
die("Probablemente no estoy funcionando bajo el Gestionador de Control de Servicio");
}

win32_set_service_status(WIN32_SERVICE_START_PENDING);

// Algunos procesos largos a recuperar mientras el servicio funciona.

win32_set_service_status(WIN32_SERVICE_RUNNING);

while (WIN32_SERVICE_CONTROL_STOP != win32_get_last_control_message()) {

# Realice su trabajo aquí.

# Intente no tomar más de 30 segundos antes de devolver.

}
?&gt;

### Ver también

    - [win32_set_service_status()](#function.win32-set-service-status) - Actualiza el estado de un servicio

    - [win32_get_last_control_message()](#function.win32-get-last-control-message) - Devuelve el último mensaje de control que ha sido enviado a este servicio

    - [win32_set_service_exit_mode()](#function.win32-set-service-exit-mode) - Define o devuelve el modo de salida para el servicio en ejecución

    - [win32_set_service_exit_code()](#function.win32-set-service-exit-code) - Define o devuelve el código de salida para el servicio en ejecución

    - Los [códigos de error Win32](#win32service.constants.errors)

# win32_stop_service

(PECL win32service &gt;=0.1.0)

win32_stop_service — Detiene un servicio

### Descripción

**win32_stop_service**([string](#language.types.string) $servicename, [string](#language.types.string) $machine = **[null](#constant.null)**): [void](language.types.void.html)

Detiene un servicio nombrado. Requiere privilegios de administrador o
una cuenta con los derechos apropiados definidos en el ACL del servicio.

### Parámetros

     servicename


       El nombre corto del servicio.






     machine


       El nombre opcional de la máquina.
       Si se omite, se utilizará la máquina local.





### Valores devueltos

No se retorna ningún valor.

    Antes de la versión 1.0.0, retornaba **[WIN32_NO_ERROR](#constant.win32-no-error)** en caso de éxito, **[false](#constant.false)** si hay un problema con los parámetros o un [Código de Error Win32](#win32service.constants.errors) en caso de fallo.

### Errores/Excepciones

Se lanzará un [ValueError](#class.valueerror) si el valor del parámetro
servicename está vacío.

Se lanzará un [Win32ServiceException](#class.win32serviceexception) en caso de error.

### Historial de cambios

       Versión
       Descripción





       PECL win32service 1.0.0

        Lanzará un [ValueError](#class.valueerror) si un parámetro es inválido,
        antes se retornaba **[false](#constant.false)**.




       PECL win32service 1.0.0

        Lanzará un [Win32ServiceException](#class.win32serviceexception) en caso de error,
        antes se retornaba un
        [Código de error Win32](#win32service.constants.errors)
        .




       PECL win32service 1.0.0

        El tipo de retorno es ahora [void](language.types.void.html), antes era [mixed](#language.types.mixed).




       PECL win32service 0.3.0

        Esta función ya no requiere una cuenta de administrador si el ACL
        está definido para otra cuenta.





### Ver también

    - [win32_start_service()](#function.win32-start-service) - Inicia un servicio

    - [win32_pause_service()](#function.win32-pause-service) - Pone en pausa un servicio

    - [win32_continue_service()](#function.win32-continue-service) - Reanuda un servicio en pausa

    - [win32_send_custom_control()](#function.win32-send-custom-control) - Envía un control personalizado al servicio

    - [Códigos de error Win32](#win32service.constants.errors)

## Tabla de contenidos

- [win32_add_right_access_service](#function.win32-add-right-access-service) — Añade los derechos de acceso para un usuario al servicio
- [win32_add_service_env_var](#function.win32-add-service-env-var) — Añade una variable de entorno personalizada al servicio
- [win32_continue_service](#function.win32-continue-service) — Reanuda un servicio en pausa
- [win32_create_service](#function.win32-create-service) — Crea una nueva entrada para servicio en la base de datos SCM
- [win32_delete_service](#function.win32-delete-service) — Elimina una entrada de servicio de la base de datos SCM
- [win32_get_last_control_message](#function.win32-get-last-control-message) — Devuelve el último mensaje de control que ha sido enviado a este servicio
- [win32_get_service_env_vars](#function.win32-get-service-env-vars) — Lee todas las variables de entorno personalizadas del servicio
- [win32_pause_service](#function.win32-pause-service) — Pone en pausa un servicio
- [win32_query_service_status](#function.win32-query-service-status) — Consulta el estado de un servicio
- [win32_read_all_rights_access_service](#function.win32-read-all-rights-access-service) — Lee todos los derechos de acceso al servicio
- [win32_read_right_access_service](#function.win32-read-right-access-service) — Lee los derechos de acceso al servicio para un usuario
- [win32_remove_right_access_service](#function.win32-remove-right-access-service) — Elimina los derechos de acceso para un usuario en el servicio
- [win32_remove_service_env_var](#function.win32-remove-service-env-var) — Elimina una variable de entorno personalizada del servicio
- [win32_send_custom_control](#function.win32-send-custom-control) — Envía un control personalizado al servicio
- [win32_set_service_exit_code](#function.win32-set-service-exit-code) — Define o devuelve el código de salida para el servicio en ejecución
- [win32_set_service_exit_mode](#function.win32-set-service-exit-mode) — Define o devuelve el modo de salida para el servicio en ejecución
- [win32_set_service_pause_resume_state](#function.win32-set-service-pause-resume-state) — Define o devuelve la capacidad de pausa/reanudación para el servicio en ejecución
- [win32_set_service_status](#function.win32-set-service-status) — Actualiza el estado de un servicio
- [win32_start_service](#function.win32-start-service) — Inicia un servicio
- [win32_start_service_ctrl_dispatcher](#function.win32-start-service-ctrl-dispatcher) — Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado
- [win32_stop_service](#function.win32-stop-service) — Detiene un servicio

- [Introducción](#intro.win32service)
- [Instalación/Configuración](#win32service.setup)<li>[Requerimientos](#win32service.requirements)
- [Instalación](#win32service.installation)
- [Consideraciones de seguridad](#win32service.security)
  </li>- [Constantes predefinidas](#win32service.constants)
- [Win32ServiceException](#class.win32serviceexception) — La clase Win32ServiceException
- [Win32Service\RightInfo](#class.win32service-rightinfo) — La clase Win32Service\RightInfo<li>[Win32Service\RightInfo::\_\_construct](#win32service-rightinfo.construct) — Crear un nuevo RightInfo (no utilizado)
- [Win32Service\RightInfo::getDomain](#win32service-rightinfo.get-domain) — Devuelve el dominio del usuario
- [Win32Service\RightInfo::getFullUsername](#win32service-rightinfo.get-full-username) — Devuelve el dominio y el nombre de usuario
- [Win32Service\RightInfo::getRights](#win32service-rightinfo.get-rights) — Devuelve la lista de derechos
- [Win32Service\RightInfo::getUsername](#win32service-rightinfo.get-username) — Devuelve el nombre de usuario
- [Win32Service\RightInfo::isDenyAccess](#win32service-rightinfo.is-deny-access) — Devuelve true si el RightInfo se refiere a la denegación de acceso al recurso
- [Win32Service\RightInfo::isGrantAccess](#win32service-rightinfo.is-grant-access) — Devuelve true si el RightInfo se refiere al acceso al recurso
  </li>- [Ejemplos](#win32service.examples)
- [Funciones win32service](#ref.win32service)<li>[win32_add_right_access_service](#function.win32-add-right-access-service) — Añade los derechos de acceso para un usuario al servicio
- [win32_add_service_env_var](#function.win32-add-service-env-var) — Añade una variable de entorno personalizada al servicio
- [win32_continue_service](#function.win32-continue-service) — Reanuda un servicio en pausa
- [win32_create_service](#function.win32-create-service) — Crea una nueva entrada para servicio en la base de datos SCM
- [win32_delete_service](#function.win32-delete-service) — Elimina una entrada de servicio de la base de datos SCM
- [win32_get_last_control_message](#function.win32-get-last-control-message) — Devuelve el último mensaje de control que ha sido enviado a este servicio
- [win32_get_service_env_vars](#function.win32-get-service-env-vars) — Lee todas las variables de entorno personalizadas del servicio
- [win32_pause_service](#function.win32-pause-service) — Pone en pausa un servicio
- [win32_query_service_status](#function.win32-query-service-status) — Consulta el estado de un servicio
- [win32_read_all_rights_access_service](#function.win32-read-all-rights-access-service) — Lee todos los derechos de acceso al servicio
- [win32_read_right_access_service](#function.win32-read-right-access-service) — Lee los derechos de acceso al servicio para un usuario
- [win32_remove_right_access_service](#function.win32-remove-right-access-service) — Elimina los derechos de acceso para un usuario en el servicio
- [win32_remove_service_env_var](#function.win32-remove-service-env-var) — Elimina una variable de entorno personalizada del servicio
- [win32_send_custom_control](#function.win32-send-custom-control) — Envía un control personalizado al servicio
- [win32_set_service_exit_code](#function.win32-set-service-exit-code) — Define o devuelve el código de salida para el servicio en ejecución
- [win32_set_service_exit_mode](#function.win32-set-service-exit-mode) — Define o devuelve el modo de salida para el servicio en ejecución
- [win32_set_service_pause_resume_state](#function.win32-set-service-pause-resume-state) — Define o devuelve la capacidad de pausa/reanudación para el servicio en ejecución
- [win32_set_service_status](#function.win32-set-service-status) — Actualiza el estado de un servicio
- [win32_start_service](#function.win32-start-service) — Inicia un servicio
- [win32_start_service_ctrl_dispatcher](#function.win32-start-service-ctrl-dispatcher) — Registra un script con SCM, por lo que puede ser interpretado como un servicio con el nombre dado
- [win32_stop_service](#function.win32-stop-service) — Detiene un servicio
  </li>
