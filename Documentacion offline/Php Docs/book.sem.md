# Sémaphore, Memoria Compartida e IPC (Comunicación Inter-Proceso)

# Introducción

Estos módulos proporcionan una interfaz para las funciones de tipo System V IPC.
Esto incluye los semáforos, la memoria compartida y el sistema de
comunicación inter-proceso (IPC).

Los semáforos pueden ser utilizados para proporcionar acceso exclusivo
a ciertos recursos de la máquina, o para limitar el
número de procesos que utilizan al mismo tiempo un recurso.

Estos módulos proporcionan también un sistema de memoria compartida,
que utiliza la memoria compartida System V.
Esta memoria compartida permite acceder a variables globales.
Los diferentes demonios httpd e incluso otros programas (tales como Perl,
C, ...) permiten un intercambio de datos globales. No se olvide que la memoria compartida
no está protegida contra el acceso simultáneo.
Será necesario utilizar los semáforos para asegurar la sincronización.

    <caption>**Límites de la memoria compartida bajo Unix OS**</caption>



       SHMMAX

        Tamaño máximo de memoria compartida,
        por omisión, 131072 bytes.




       SHMMIN

        Tamaño mínimo de memoria compartida,
        por omisión, 1 byte.




       SHMMNI

        Número máximo de segmentos de memoria compartida,
        por omisión 100.




       SHMSEG

        Tamaño máximo de memoria compartida por proceso,
        por omisión 6.





Estas funciones permiten enviar y recibir mensajes de/para otros procesos.
Ofrecen una interfaz simple y eficiente para intercambiar datos entre procesos,
sin necesidad de utilizar otro socket UNIX.

**Nota**:

    Solamente las funciones de memoria compartida y [ftok()](#function.ftok)
    están disponibles en Windows. Ni los semáforos, ni las funciones de mensaje
    inter-proceso son soportadas en esta plataforma.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#sem.installation)
- [Configuración en tiempo de ejecución](#sem.configuration)
- [Tipos de recursos](#sem.resources)

## Instalación

Por defecto, el soporte para estas funciones no está disponible.
Para habilitar el soporte del semáforo de System V compile PHP con la opción
**--enable-sysvsem**.
Para habilitar el soporte de la memoria compartida de System V compile PHP con la opción
**--enable-sysvshm**.
Para habilitar el soporte de mensajes de System V compile PHP con la opción
**--enable-sysvmsg**.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de Configuración del Semáforo**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [sysvshm.init_mem](#ini.sysvshm.init-mem)
     10000
     **[INI_SYSTEM](#constant.ini-system)**
      

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     sysvshm.init_mem
     [int](#language.types.integer)



      Un tamaño predeterminado del segmento de memoria compartida.


## Tipos de recursos

Antes de PHP 8.0.0, esta extensión definía los tipos de recursos
sysvmsg queue (System V Message Queue),
sysvsem (System V Semaphore) y
sysvshm (System V Shared Memory).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[MSG_IPC_NOWAIT](#constant.msg-ipc-nowait)**
    ([int](#language.types.integer))








    **[MSG_EAGAIN](#constant.msg-eagain)**
    ([int](#language.types.integer))








    **[MSG_ENOMSG](#constant.msg-enomsg)**
    ([int](#language.types.integer))








    **[MSG_NOERROR](#constant.msg-noerror)**
    ([int](#language.types.integer))








    **[MSG_EXCEPT](#constant.msg-except)**
    ([int](#language.types.integer))

# Funciones de Semáforo

# ftok

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ftok — Convierte una ruta y un identificador de proyecto en una clave System V IPC

### Descripción

**ftok**([string](#language.types.string) $filename, [string](#language.types.string) $project_id): [int](#language.types.integer)

Convierte el argumento filename
de un fichero existente, y el identificador de proyecto
proj, en un entero integer para ser utilizado
con la función [shmop_open()](#function.shmop-open) y otras funciones
System V IPC.

### Parámetros

     filename


       Ruta hacia un fichero accesible.






     project_id


       Identificador del proyecto. Debe ser un solo carácter.





### Valores devueltos

En caso de éxito, el valor devuelto será el valor de la clave creada,
de lo contrario, se devolverá -1.

### Ver también

    - [shmop_open()](#function.shmop-open) - Crea o abre un bloque de memoria compartida

    - [sem_get()](#function.sem-get) - Retorna un identificador de semáforo

# msg_get_queue

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

msg_get_queue — Crea o se adhiere a una cola de mensajes

### Descripción

**msg_get_queue**([int](#language.types.integer) $key, [int](#language.types.integer) $permissions = 0666): [SysvMessageQueue](#class.sysvmessagequeue)|[false](#language.types.singleton)

**msg_get_queue()** devuelve un recurso que puede
ser utilizado con las colas de mensajes System V y la
clave key. La primera llamada a la función va a crear
la cola de mensajes, con los permisos opcionales de permissions.
Una segunda llamada a **msg_get_queue()** con
la misma clave key devolverá otro recurso de cola de mensajes, pero los dos identificadores conducen a
la misma cola de mensajes.

### Parámetros

     key


       Identificador numérico de la cola de mensajes.






     permissions


       Permisos en la cola. Por omisión, vale 0666. Si la cola de
       mensajes ya existe, el argumento permissions
       será ignorado.





### Valores devueltos

Devuelve un recurso que puede ser utilizado para acceder a la cola de
mensajes System V.
Devuelve una instancia de [SysvMessageQueue](#class.sysvmessagequeue) que puede
ser utilizada para acceder a la cola de mensajes System V,
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        En caso de éxito, esta función devuelve una instancia de
        [SysvMessageQueue](#class.sysvmessagequeue) ahora; anteriormente, se devolvía
        un [resource](#language.types.resource).





### Ver también

    - [msg_remove_queue()](#function.msg-remove-queue) - Destruye una cola de mensajes

    - [msg_receive()](#function.msg-receive) - Recibe un mensaje desde una cola de mensajes

    - [msg_send()](#function.msg-send) - Envía un mensaje a una cola

    - [msg_stat_queue()](#function.msg-stat-queue) - Devuelve información sobre la cola de mensajes

    - [msg_set_queue()](#function.msg-set-queue) - Modifica información en la cola de mensajes

# msg_queue_exists

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

msg_queue_exists — Verificar si una cola de mensajes existe

### Descripción

**msg_queue_exists**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Verifica si la clave dada por el parámetro key de la cola de mensajes existe.

### Parámetros

     key


       La clave de la cola.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [msg_remove_queue()](#function.msg-remove-queue) - Destruye una cola de mensajes

    - [msg_receive()](#function.msg-receive) - Recibe un mensaje desde una cola de mensajes

    - [msg_stat_queue()](#function.msg-stat-queue) - Devuelve información sobre la cola de mensajes

# msg_receive

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

msg_receive — Recibe un mensaje desde una cola de mensajes

### Descripción

**msg_receive**(
    [SysvMessageQueue](#class.sysvmessagequeue) $queue,
    [int](#language.types.integer) $desired_message_type,
    [int](#language.types.integer) &amp;$received_message_type,
    [int](#language.types.integer) $max_message_size,
    [mixed](#language.types.mixed) &amp;$message,
    [bool](#language.types.boolean) $unserialize = **[true](#constant.true)**,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) &amp;$error_code = **[null](#constant.null)**
): [bool](#language.types.boolean)

**msg_receive()** recibe el primer mensaje de la
cola queue, cuyo tipo está especificado por
desired_message_type.

### Parámetros

     queue


       Descriptor de recurso de cola de mensajes






     desired_message_type


       Si desired_message_type vale 0, se devuelve el primer mensaje
       de la cola. Si desired_message_type vale
       más que 0, entonces se devolverá el primer mensaje de ese tipo.
       Si desired_message_type vale menos que 0, se devolverá el primer
       mensaje de la cola cuyo tipo sea inferior o igual al valor absoluto
       de desired_message_type. Si no hay mensajes
       que cumplan los criterios, el script esperará a que llegue un mensaje
       de ese tipo a la cola. Este bloqueo puede evitarse especificando la opción
       **[MSG_IPC_NOWAIT](#constant.msg-ipc-nowait)** en el parámetro
       flags.






     received_message_type


       El tipo de mensaje recibido se almacenará en este parámetro.






     max_message_size


       El tamaño máximo de mensaje se establece mediante
       max_message_size; si el mensaje de la cola es más grande
       que este tamaño, la función fallará (a menos que se utilice una opción
       flags, descrita a continuación).






     message


       El mensaje recibido se almacenará en el parámetro message,
       a menos que haya habido errores al recibir el mensaje.






     unserialize


       Cuando esto es cierto, el mensaje se trata como si hubiera sido serializado
       con el mismo mecanismo que el módulo de sesión. El mensaje será entonces
       deserializado y devuelto al script. Esto permitirá recibir fácilmente
       arrays u objetos complejos en su script, enviados por otros scripts PHP,
       o, si se utiliza WDDX, desde cualquier fuente compatible con WDDX.




       Si unserialize vale **[false](#constant.false)**,
       el mensaje se devolverá intacto, sin modificar los valores binarios.






     flags


       El parámetro flags permite pasar opciones
       para configurar las llamadas msgrcv. Por omisión, vale 0, pero se pueden
       especificar una o varias opciones combinándolas con el operador OR.



        <caption>**Opciones de la función msg_receive()**</caption>



           **[MSG_IPC_NOWAIT](#constant.msg-ipc-nowait)**
           Si no hay mensajes del tipo
            desired_message_type, se devuelve inmediatamente
            y no se espera. La función fallará y devolverá un entero
            correspondiente a **[MSG_ENOMSG](#constant.msg-enomsg)**.




           **[MSG_EXCEPT](#constant.msg-except)**
           Al utilizar esta opción en combinación con
           un tipo desired_message_type superior a 0, la
           función leerá el primer mensaje que no sea
           del tipo solicitado por desired_message_type.



           **[MSG_NOERROR](#constant.msg-noerror)**

            Si el mensaje es más grande que max_message_size,
            esta opción truncará el mensaje al tamaño de
            max_message_size y no reportará errores.











     errorcode


       Si la función falla, el parámetro opcional
       error_code se establecerá al valor
       de la variable del sistema errno.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Al recibir un mensaje con éxito, la cola se actualiza
de la siguiente manera: msg_lrpid toma el valor del identificador
de proceso del proceso llamante, msg_qnum se decrementa en
1 y msg_rtime toma la fecha y hora actuales.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        queue ahora espera una [SysvMessageQueue](#class.sysvmessagequeue);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [msg_remove_queue()](#function.msg-remove-queue) - Destruye una cola de mensajes

    - [msg_send()](#function.msg-send) - Envía un mensaje a una cola

    - [msg_stat_queue()](#function.msg-stat-queue) - Devuelve información sobre la cola de mensajes

    - [msg_set_queue()](#function.msg-set-queue) - Modifica información en la cola de mensajes

# msg_remove_queue

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

msg_remove_queue — Destruye una cola de mensajes

### Descripción

**msg_remove_queue**([SysvMessageQueue](#class.sysvmessagequeue) $queue): [bool](#language.types.boolean)

**msg_remove_queue()** destruye la cola de mensajes
identificada por queue. Únicamente debe utilizarse esta
función cuando todos los procesos hayan finalizado su trabajo en la
cola de mensajes, y se desee liberar los recursos.

### Parámetros

     queue


       La cola de mensajes





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        queue ahora requiere una [SysvMessageQueue](#class.sysvmessagequeue);
        anteriormente se esperaba un [resource](#language.types.resource).





### Ver también

    - [msg_get_queue()](#function.msg-get-queue) - Crea o se adhiere a una cola de mensajes

    - [msg_receive()](#function.msg-receive) - Recibe un mensaje desde una cola de mensajes

    - [msg_stat_queue()](#function.msg-stat-queue) - Devuelve información sobre la cola de mensajes

    - [msg_set_queue()](#function.msg-set-queue) - Modifica información en la cola de mensajes

# msg_send

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

msg_send — Envía un mensaje a una cola

### Descripción

**msg_send**(
    [SysvMessageQueue](#class.sysvmessagequeue) $queue,
    [int](#language.types.integer) $message_type,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float)|[bool](#language.types.boolean) $message,
    [bool](#language.types.boolean) $serialize = **[true](#constant.true)**,
    [bool](#language.types.boolean) $blocking = **[true](#constant.true)**,
    [int](#language.types.integer) &amp;$error_code = **[null](#constant.null)**
): [bool](#language.types.boolean)

**msg_send()** envía el mensaje message
de tipo message_type (que DEBE ser mayor que 0)
a la cola de mensajes identificada por queue.

### Parámetros

     queue


       La cola de mensajes






     message_type


       El tipo del mensaje (DEBE ser mayor que 0)






     message


       El cuerpo del mensaje



      **Nota**:



        Si serialize está definido como **[false](#constant.false)**, DEBE ser del tipo: [string](#language.types.string), [int](#language.types.integer), [float](#language.types.float) o [bool](#language.types.boolean).
        En otros casos se emitirá un aviso.







     serialize


       El parámetro opcional serialize controla el
       método de envío del mensaje message. serialize
       tiene por omisión el valor **[true](#constant.true)** lo que significa que el mensaje message
       será serializado utilizando el mismo mecanismo que el utilizado
       por las sesiones, antes de ser enviado a la cola de mensajes. Esto permite
       enviar arrays y objetos complejos a otros scripts PHP, o bien, si se utiliza
       la extensión WDDX, intercambiar mensajes con clientes compatibles WDDX.






     blocking


       Si el mensaje es demasiado grande para ser almacenado por la cola, su
       script esperará hasta que otro proceso lea de la
       cola un mensaje, y libere suficiente espacio para su mensaje. Este es
       el modo bloqueante: puede evitar este modo utilizando el
       parámetro blocking con el valor **[false](#constant.false)**:
       en este caso, **msg_send()** retornará inmediatamente
       **[false](#constant.false)** si el mensaje es demasiado grande para la cola. Asignará entonces
       al parámetro error_code el valor de
       **[MSG_EAGAIN](#constant.msg-eagain)**,
       indicando que debería intentar enviar su mensaje de nuevo, un poco más tarde.






     error_code


       Si la función falla, el código de error opcional será definido con el valor de
       la variable del sistema errno.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Al enviar con éxito un mensaje, la cola se actualiza
de la siguiente manera: msg_lrpid toma el valor del identificador
de proceso del proceso llamante, msg_qnum se incrementa en
1 y msg_rtime toma la fecha y hora actual.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        queue ahora espera una [SysvMessageQueue](#class.sysvmessagequeue);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [msg_remove_queue()](#function.msg-remove-queue) - Destruye una cola de mensajes

    - [msg_receive()](#function.msg-receive) - Recibe un mensaje desde una cola de mensajes

    - [msg_stat_queue()](#function.msg-stat-queue) - Devuelve información sobre la cola de mensajes

    - [msg_set_queue()](#function.msg-set-queue) - Modifica información en la cola de mensajes

# msg_set_queue

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

msg_set_queue — Modifica información en la cola de mensajes

### Descripción

**msg_set_queue**([SysvMessageQueue](#class.sysvmessagequeue) $queue, [array](#language.types.array) $data): [bool](#language.types.boolean)

**msg_set_queue()** permite modificar ciertos valores
como msg_perm.uid, msg_perm.gid, msg_perm.mode y msg_qbytes, que son
campos de la estructura que alberga la cola de mensajes.

Modificar la estructura de datos requiere que PHP funcione
con el mismo usuario que aquel que creó la cola, que
posee la cola (como se determina por los campos msg_perm.xxx), o
que funcione con los derechos de superusuario.
Los derechos de superusuario son necesarios para asignar a
msg_qbytes valores superiores a los límites del sistema.

### Parámetros

     queue


       La cola de mensajes






     data


       Deben especificarse los valores deseados definiendo
       el valor de las claves que se quieren recuperar en el array
       data.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        queue ahora espera una [SysvMessageQueue](#class.sysvmessagequeue);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [msg_remove_queue()](#function.msg-remove-queue) - Destruye una cola de mensajes

    - [msg_receive()](#function.msg-receive) - Recibe un mensaje desde una cola de mensajes

    - [msg_stat_queue()](#function.msg-stat-queue) - Devuelve información sobre la cola de mensajes

    - [msg_get_queue()](#function.msg-get-queue) - Crea o se adhiere a una cola de mensajes

# msg_stat_queue

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

msg_stat_queue — Devuelve información sobre la cola de mensajes

### Descripción

**msg_stat_queue**([SysvMessageQueue](#class.sysvmessagequeue) $queue): [array](#language.types.array)|[false](#language.types.singleton)

**msg_stat_queue()** devuelve información sobre la cola de mensajes
identificada por queue. Es una función práctica
para conocer el proceso que emitió el mensaje que acaba de
ser recibido.

### Parámetros

     queue


       La cola de mensajes





### Valores devueltos

El valor devuelto por la función es un array cuyos
índices y valores son los siguientes :

    <caption>**Estructura de respuesta de msg_stat_queue()**</caption>



       msg_perm.uid

        El uid del propietario de la cola.




       msg_perm.gid

        El gid del propietario de la cola.




       msg_perm.mode

        El modo de acceso a la cola.




       msg_stime

        La hora del último mensaje enviado a la cola.




       msg_rtime

        La hora del último mensaje emitido por la cola.




       msg_ctime

        La hora de modificación de la cola.




       msg_qnum

        El número de mensajes en espera en la cola.




       msg_qbytes

        El número máximo de bytes autorizados en un mensaje de la
        cola de espera. En Linux, este valor puede ser leído y modificado
        a través del archivo /proc/sys/kernel/msgmnb.




       msg_lspid

        El pid del proceso que envió el último mensaje a la cola.




       msg_lrpid

        El pid del proceso que recibió el último mensaje de la cola.





Devuelve **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        queue ahora espera una [SysvMessageQueue](#class.sysvmessagequeue);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [msg_remove_queue()](#function.msg-remove-queue) - Destruye una cola de mensajes

    - [msg_receive()](#function.msg-receive) - Recibe un mensaje desde una cola de mensajes

    - [msg_get_queue()](#function.msg-get-queue) - Crea o se adhiere a una cola de mensajes

    - [msg_set_queue()](#function.msg-set-queue) - Modifica información en la cola de mensajes

# sem_acquire

(PHP 4, PHP 5, PHP 7, PHP 8)

sem_acquire — Reserva un semáforo

### Descripción

**sem_acquire**([SysvSemaphore](#class.sysvsemaphore) $semaphore, [bool](#language.types.boolean) $non_blocking = **[false](#constant.false)**): [bool](#language.types.boolean)

**sem_acquire()** se bloquea por omisión
(si es necesario) hasta que el semáforo pueda ser reservado.
Un proceso que intenta reservar un semáforo que ya ha
reservado quedará en espera indefinida, si esta adquisición excede
el número máximo de adquisiciones simultáneas (max_acquire).

Al final de un script, todos los semáforos reservados
pero no liberados explícitamente, serán liberados
automáticamente, y se generará una advertencia.

### Parámetros

     semaphore


       semaphore es un recurso de
       semáforo, obtenido de la función [sem_get()](#function.sem-get).






     non_blocking


       Especifica si el proceso no debe esperar la adquisición del semáforo.
       Si es **[true](#constant.true)**, la llamada devolverá
       **[false](#constant.false)** inmediatamente si un semáforo no puede ser
       adquirido inmediatamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        semaphore ahora espera una [SysvSemaphore](#class.sysvsemaphore);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [sem_get()](#function.sem-get) - Retorna un identificador de semáforo

    - [sem_release()](#function.sem-release) - Libera un semáforo

# sem_get

(PHP 4, PHP 5, PHP 7, PHP 8)

sem_get — Retorna un identificador de semáforo

### Descripción

**sem_get**(
    [int](#language.types.integer) $key,
    [int](#language.types.integer) $max_acquire = 1,
    [int](#language.types.integer) $permissions = 0666,
    [bool](#language.types.boolean) $auto_release = **[true](#constant.true)**
): [SysvSemaphore](#class.sysvsemaphore)|[false](#language.types.singleton)

**sem_get()** retorna un identificador que podrá
ser utilizado para acceder a un semáforo System V.

Una segunda llamada a **sem_get()**
con la misma clave retornará un identificador
diferente, pero ambos identificadores permitirán
acceder al mismo semáforo.

Si key es 0, un nuevo semáforo
privado se crea para cada llamada a **sem_get()**.

### Parámetros

     key








     max_acquire


       El número de procesos que pueden reservar simultáneamente el semáforo
       se especifica en el argumento max_acquire.






     permissions


       Los permisos del semáforo.
       Actualmente, este valor solo se aplica
       si el proceso es el único proceso actualmente
       adjunto al semáforo.






     auto_release


       El argumento opcional auto_release especifica
       si el semáforo debe ser liberado automáticamente al cerrar.





### Valores devueltos

Retorna un recurso de semáforo en caso de éxito, y **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        En caso de éxito, esta función retorna una instancia de
        [SysvSemaphore](#class.sysvsemaphore) ahora; anteriormente; un
        [resource](#language.types.resource) era retornado.




       8.0.0

        El tipo de auto_release ha sido modificado de
        [int](#language.types.integer) a [bool](#language.types.boolean).





### Notas

**Advertencia**

    Al utilizar la función **sem_get()** para acceder a
    un semáforo creado fuera de PHP, tenga en cuenta que el semáforo debe haber
    sido creado como un conjunto de 3 semáforos (por ejemplo, especificando 3 como
    argumento nsems durante la llamada a la función C
    semget()), de lo contrario, PHP no será capaz de acceder a este
    semáforo.

### Ver también

    - [sem_acquire()](#function.sem-acquire) - Reserva un semáforo

    - [sem_release()](#function.sem-release) - Libera un semáforo

    - [ftok()](#function.ftok) - Convierte una ruta y un identificador de proyecto en una clave System V IPC

# sem_release

(PHP 4, PHP 5, PHP 7, PHP 8)

sem_release — Libera un semáforo

### Descripción

**sem_release**([SysvSemaphore](#class.sysvsemaphore) $semaphore): [bool](#language.types.boolean)

**sem_release()** libera el semáforo
sem_identifier, si ha sido reservado por el
proceso actual, de lo contrario genera un error.

Tras liberar el semáforo, [sem_acquire()](#function.sem-acquire)
puede ser llamado para reservarlo nuevamente.

### Parámetros

     semaphore


       Un semáforo, tal como
       devuelto por la función [sem_get()](#function.sem-get).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        semaphore ahora espera una [SysvSemaphore](#class.sysvsemaphore);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [sem_get()](#function.sem-get) - Retorna un identificador de semáforo

    - [sem_acquire()](#function.sem-acquire) - Reserva un semáforo

# sem_remove

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

sem_remove — Destruye un semáforo

### Descripción

**sem_remove**([SysvSemaphore](#class.sysvsemaphore) $semaphore): [bool](#language.types.boolean)

**sem_remove()** elimina el semáforo dado.

Tras la eliminación del semáforo, ya no es utilizable.

### Parámetros

     semaphore


       Un semáforo, tal como es devuelto
       por la función [sem_get()](#function.sem-get).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        semaphore ahora espera una [SysvSemaphore](#class.sysvsemaphore);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [sem_get()](#function.sem-get) - Retorna un identificador de semáforo

    - [sem_release()](#function.sem-release) - Libera un semáforo

    - [sem_acquire()](#function.sem-acquire) - Reserva un semáforo

# shm_attach

(PHP 4, PHP 5, PHP 7, PHP 8)

shm_attach — Crea o abre un segmento de memoria compartida

### Descripción

**shm_attach**([int](#language.types.integer) $key, [?](#language.types.null)[int](#language.types.integer) $size = **[null](#constant.null)**, [int](#language.types.integer) $permissions = 0666): [SysvSharedMemory](#class.sysvsharedmemory)|[false](#language.types.singleton)

**shm_attach()** devuelve una instancia que
permitirá acceder a la memoria compartida de tipo System V.
En la primera llamada, la memoria será
creada, con el tamaño size
y con los permisos permissions

En las llamadas siguientes con la misma clave
key, **shm_attach()**
devolverá una nueva instancia, pero esta instancia
accederá siempre a la misma porción de
memoria compartida. En este caso, size
y permissions serán ignorados.

### Parámetros

     key


       Un identificador numérico de la memoria compartida






     size


       El tamaño de la memoria. Si no se proporciona, por defecto
       valdrá el valor de sysvshm.init_mem del fichero
       php.ini, de lo contrario 10000 bytes.






     permissions


       Los permisos (opcionales). Por defecto, valen 0666.





### Valores devueltos

Devuelve una instancia de [SysvSharedMemory](#class.sysvsharedmemory) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve una instancia de
       [SysvSharedMemory](#class.sysvsharedmemory) ahora; anteriormente; un
       [resource](#language.types.resource) era devuelto.




      8.0.0

       size es ahora nullable.



### Ver también

    - [shm_detach()](#function.shm-detach) - Libera un segmento de memoria compartida

    - [ftok()](#function.ftok) - Convierte una ruta y un identificador de proyecto en una clave System V IPC

# shm_detach

(PHP 4, PHP 5, PHP 7, PHP 8)

shm_detach — Libera un segmento de memoria compartida

### Descripción

**shm_detach**([SysvSharedMemory](#class.sysvsharedmemory) $shm): [bool](#language.types.boolean)

**shm_detach()** libera el segmento de
memoria compartida identificado por
shm y creado por
[shm_attach()](#function.shm-attach). No se olvide que esta memoria
compartida sigue existiendo en Unix, y que los
datos siguen siendo accesibles.

### Parámetros

     shm


       Un segmento de memoria compartida obtenido desde [shm_attach()](#function.shm-attach).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        shm ahora requiere una instancia de [SysvSharedMemory](#class.sysvsharedmemory)
        en lugar de un [resource](#language.types.resource).





### Ver también

    - [shm_attach()](#function.shm-attach) - Crea o abre un segmento de memoria compartida

    - [shm_remove()](#function.shm-remove) - Elimina un segmento de memoria compartida bajo Unix

    - [shm_remove_var()](#function.shm-remove-var) - Elimina una variable de la memoria compartida

# shm_get_var

(PHP 4, PHP 5, PHP 7, PHP 8)

shm_get_var — Lee una variable en la memoria compartida

### Descripción

**shm_get_var**([SysvSharedMemory](#class.sysvsharedmemory) $shm, [int](#language.types.integer) $key): [mixed](#language.types.mixed)

**shm_get_var()** devuelve la variable
identificada por variable_key, en
el segmento de memoria compartida identificado por shm_identifier.
La variable siempre está presente en la memoria
compartida.

### Parámetros

     shm


       Un segmento de memoria compartida obtenido desde [shm_attach()](#function.shm-attach).






     key


       La clave de la variable.





### Valores devueltos

Devuelve la variable correspondiente a la clave dada.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        shm ahora requiere una instancia de [SysvSharedMemory](#class.sysvsharedmemory)
        en lugar de un [resource](#language.types.resource).





### Ver también

    - [shm_has_var()](#function.shm-has-var) - Verifica si una variable existe en memoria compartida

    - [shm_put_var()](#function.shm-put-var) - Inserta o modifica una variable en la memoria compartida

# shm_has_var

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

shm_has_var — Verifica si una variable existe en memoria compartida

### Descripción

**shm_has_var**([SysvSharedMemory](#class.sysvsharedmemory) $shm, [int](#language.types.integer) $key): [bool](#language.types.boolean)

Verifica si una variable existe en memoria compartida.

### Parámetros

     shm


       Un segmento de memoria compartida obtenido desde [shm_attach()](#function.shm-attach).






     key


       El nombre de la variable.





### Valores devueltos

Devuelve **[true](#constant.true)** si la variable existe, y **[false](#constant.false)** en caso contrario.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        shm ahora requiere una instancia de [SysvSharedMemory](#class.sysvsharedmemory);
        anteriormente se esperaba un [resource](#language.types.resource).





### Ver también

    - [shm_get_var()](#function.shm-get-var) - Lee una variable en la memoria compartida

    - [shm_put_var()](#function.shm-put-var) - Inserta o modifica una variable en la memoria compartida

# shm_put_var

(PHP 4, PHP 5, PHP 7, PHP 8)

shm_put_var — Inserta o modifica una variable en la memoria compartida

### Descripción

**shm_put_var**([SysvSharedMemory](#class.sysvsharedmemory) $shm, [int](#language.types.integer) $key, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

**shm_put_var()** inserta o modifica la
variable value con la clave
key en el segmento de
memoria shm.

Se emitirán alertas (nivel **[E_WARNING](#constant.e-warning)**)
si shm no es un segmento de
memoria tipo System V válido, o si no hay suficiente memoria para
la solicitud.

### Parámetros

     shm


       Un segmento de memoria compartida obtenido desde [shm_attach()](#function.shm-attach).






     key


       La clave de la variable.






     value


       La variable. Todos los [tipos de variables](#language.types)
       soportados por la función [serialize()](#function.serialize) pueden ser
       utilizados: esto significa que todos los tipos, excepto los recursos y algunos
       objetos internos, pueden ser serializados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        shm ahora requiere una instancia de [SysvSharedMemory](#class.sysvsharedmemory);
        anteriormente, se esperaba un [resource](#language.types.resource).





### Ver también

    - [shm_get_var()](#function.shm-get-var) - Lee una variable en la memoria compartida

    - [shm_has_var()](#function.shm-has-var) - Verifica si una variable existe en memoria compartida

# shm_remove

(PHP 4, PHP 5, PHP 7, PHP 8)

shm_remove — Elimina un segmento de memoria compartida bajo Unix

### Descripción

**shm_remove**([SysvSharedMemory](#class.sysvsharedmemory) $shm): [bool](#language.types.boolean)

**shm_remove()** elimina el segmento de memoria
compartida shm.
Todos los datos serán eliminados.

### Parámetros

     shm


       Un segmento de memoria compartida obtenido desde [shm_attach()](#function.shm-attach).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        shm ahora requiere una instancia de [SysvSharedMemory](#class.sysvsharedmemory);
        anteriormente se esperaba un [resource](#language.types.resource).





### Ver también

    - [shm_remove_var()](#function.shm-remove-var) - Elimina una variable de la memoria compartida

# shm_remove_var

(PHP 4, PHP 5, PHP 7, PHP 8)

shm_remove_var — Elimina una variable de la memoria compartida

### Descripción

**shm_remove_var**([SysvSharedMemory](#class.sysvsharedmemory) $shm, [int](#language.types.integer) $key): [bool](#language.types.boolean)

Elimina la variable key de la memoria
compartida shm
y libera la memoria.

### Parámetros

     shm


       Un segmento de memoria compartida obtenido desde [shm_attach()](#function.shm-attach).






     key


       La clave de la variable.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        shm ahora requiere una instancia de [SysvSharedMemory](#class.sysvsharedmemory)
        en lugar de un [resource](#language.types.resource).





### Ver también

    - [shm_remove()](#function.shm-remove) - Elimina un segmento de memoria compartida bajo Unix

## Tabla de contenidos

- [ftok](#function.ftok) — Convierte una ruta y un identificador de proyecto en una clave System V IPC
- [msg_get_queue](#function.msg-get-queue) — Crea o se adhiere a una cola de mensajes
- [msg_queue_exists](#function.msg-queue-exists) — Verificar si una cola de mensajes existe
- [msg_receive](#function.msg-receive) — Recibe un mensaje desde una cola de mensajes
- [msg_remove_queue](#function.msg-remove-queue) — Destruye una cola de mensajes
- [msg_send](#function.msg-send) — Envía un mensaje a una cola
- [msg_set_queue](#function.msg-set-queue) — Modifica información en la cola de mensajes
- [msg_stat_queue](#function.msg-stat-queue) — Devuelve información sobre la cola de mensajes
- [sem_acquire](#function.sem-acquire) — Reserva un semáforo
- [sem_get](#function.sem-get) — Retorna un identificador de semáforo
- [sem_release](#function.sem-release) — Libera un semáforo
- [sem_remove](#function.sem-remove) — Destruye un semáforo
- [shm_attach](#function.shm-attach) — Crea o abre un segmento de memoria compartida
- [shm_detach](#function.shm-detach) — Libera un segmento de memoria compartida
- [shm_get_var](#function.shm-get-var) — Lee una variable en la memoria compartida
- [shm_has_var](#function.shm-has-var) — Verifica si una variable existe en memoria compartida
- [shm_put_var](#function.shm-put-var) — Inserta o modifica una variable en la memoria compartida
- [shm_remove](#function.shm-remove) — Elimina un segmento de memoria compartida bajo Unix
- [shm_remove_var](#function.shm-remove-var) — Elimina una variable de la memoria compartida

# La clase SysvMessageQueue

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    sysvmsg queue a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **SysvMessageQueue**
     {

}

# La clase SysvSemaphore

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    sysvsem a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **SysvSemaphore**
     {

}

# La clase SysvSharedMemory

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    sysvshm a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **SysvSharedMemory**
     {

}

- [Introducción](#intro.sem)
- [Instalación/Configuración](#sem.setup)<li>[Instalación](#sem.installation)
- [Configuración en tiempo de ejecución](#sem.configuration)
- [Tipos de recursos](#sem.resources)
  </li>- [Constantes predefinidas](#sem.constants)
- [Funciones de Semáforo](#ref.sem)<li>[ftok](#function.ftok) — Convierte una ruta y un identificador de proyecto en una clave System V IPC
- [msg_get_queue](#function.msg-get-queue) — Crea o se adhiere a una cola de mensajes
- [msg_queue_exists](#function.msg-queue-exists) — Verificar si una cola de mensajes existe
- [msg_receive](#function.msg-receive) — Recibe un mensaje desde una cola de mensajes
- [msg_remove_queue](#function.msg-remove-queue) — Destruye una cola de mensajes
- [msg_send](#function.msg-send) — Envía un mensaje a una cola
- [msg_set_queue](#function.msg-set-queue) — Modifica información en la cola de mensajes
- [msg_stat_queue](#function.msg-stat-queue) — Devuelve información sobre la cola de mensajes
- [sem_acquire](#function.sem-acquire) — Reserva un semáforo
- [sem_get](#function.sem-get) — Retorna un identificador de semáforo
- [sem_release](#function.sem-release) — Libera un semáforo
- [sem_remove](#function.sem-remove) — Destruye un semáforo
- [shm_attach](#function.shm-attach) — Crea o abre un segmento de memoria compartida
- [shm_detach](#function.shm-detach) — Libera un segmento de memoria compartida
- [shm_get_var](#function.shm-get-var) — Lee una variable en la memoria compartida
- [shm_has_var](#function.shm-has-var) — Verifica si una variable existe en memoria compartida
- [shm_put_var](#function.shm-put-var) — Inserta o modifica una variable en la memoria compartida
- [shm_remove](#function.shm-remove) — Elimina un segmento de memoria compartida bajo Unix
- [shm_remove_var](#function.shm-remove-var) — Elimina una variable de la memoria compartida
  </li>- [SysvMessageQueue](#class.sysvmessagequeue) — La clase SysvMessageQueue
- [SysvSemaphore](#class.sysvsemaphore) — La clase SysvSemaphore
- [SysvSharedMemory](#class.sysvsharedmemory) — La clase SysvSharedMemory
