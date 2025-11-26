# Control de procesos

# Introducción

El sistema de control de procesos de PHP implementa un sistema
de creación, gestión y terminación de procesos como en Unix.
Esta extensión no debe ser activada para su uso en un servidor web,
ya que los resultados podrían ser inesperados.

Esta documentación explica el uso general de las funciones
del gestor de procesos. Para obtener información más detallada
sobre el control de procesos Unix, se recomienda consultar
la documentación del sistema, incluyendo especialmente
fork(2), waitpid(2) y signal(2), o bien consultar una obra de referencia
como "Advanced Programming in the UNIX Environment"
de W. Richard Stevens, publicada por Addison-Wesley.

PCNTL utiliza ahora los ticks como mecanismo de devolución de llamada
del gestor de señales, lo cual es mucho más rápido que la
versión anterior. Este cambio sigue la misma semántica que
el uso de ticks. Se utiliza **declare()** para
especificar los lugares del programa donde pueden ser llamadas
las funciones de devolución de llamada. Esto permite minimizar
el consumo debido a la gestión de eventos asíncronos.
Anteriormente, compilar PHP con pcntl implicaba siempre sufrir
este consumo, incluso si el script no utilizaba pcntl.

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#pcntl.installation)

## Instalación

Soporte de Control de procesos en PHP no está habilitado de forma predeterminada.
Tiene que compilar la versión CGI o CLI de PHP con la opción de configuración
**--enable-pcntl** al compilar PHP para habilitar
el soporte de Control de procesos.

**Nota**:

Actualmente, este módulo no funciona en las plataformas no Unix
(Windows).

# Constantes predefinidas

La lista siguiente representa los señales soportadas por las funciones
de gestión de procesos. Consulte el manual de su sistema
(signal(7)) para más detalles sobre estas señales.

**Constantes de control del proceso**

    **[WNOHANG](#constant.wnohang)**
    ([int](#language.types.integer))









    **[WUNTRACED](#constant.wuntraced)**
    ([int](#language.types.integer))









    **[WCONTINUED](#constant.wcontinued)**
    ([int](#language.types.integer))








    **[WEXITED](#constant.wexited)**
    ([int](#language.types.integer))








    **[WSTOPPED](#constant.wstopped)**
    ([int](#language.types.integer))








    **[WNOWAIT](#constant.wnowait)**
    ([int](#language.types.integer))








    **[SIGCKPT](#constant.sigckpt)**
    ([int](#language.types.integer))



     Genera/restituye un punto de control.
     Disponible a partir de PHP 8.4.0 (uniquely on DragonFlyBSD).





    **[SIGCKPTEXIT](#constant.sigckptexit)**
    ([int](#language.types.integer))



     Genera/restituye un punto de control y sale.
     Disponible a partir de PHP 8.4.0 (uniquely on DragonFlyBSD).

**Las constantes SIG\_\***

    **[SIG_IGN](#constant.sig-ign)**
    ([int](#language.types.integer))









    **[SIG_DFL](#constant.sig-dfl)**
    ([int](#language.types.integer))









    **[SIG_ERR](#constant.sig-err)**
    ([int](#language.types.integer))









    **[SIGHUP](#constant.sighup)**
    ([int](#language.types.integer))









    **[SIGINFO](#constant.siginfo)**
    ([int](#language.types.integer))









    **[SIGINT](#constant.sigint)**
    ([int](#language.types.integer))









    **[SIGQUIT](#constant.sigquit)**
    ([int](#language.types.integer))









    **[SIGILL](#constant.sigill)**
    ([int](#language.types.integer))









    **[SIGTRAP](#constant.sigtrap)**
    ([int](#language.types.integer))









    **[SIGABRT](#constant.sigabrt)**
    ([int](#language.types.integer))









    **[SIGIOT](#constant.sigiot)**
    ([int](#language.types.integer))









    **[SIGBUS](#constant.sigbus)**
    ([int](#language.types.integer))









    **[SIGFPE](#constant.sigfpe)**
    ([int](#language.types.integer))









    **[SIGKILL](#constant.sigkill)**
    ([int](#language.types.integer))









    **[SIGUSR1](#constant.sigusr1)**
    ([int](#language.types.integer))









    **[SIGSEGV](#constant.sigsegv)**
    ([int](#language.types.integer))









    **[SIGUSR2](#constant.sigusr2)**
    ([int](#language.types.integer))









    **[SIGPIPE](#constant.sigpipe)**
    ([int](#language.types.integer))









    **[SIGALRM](#constant.sigalrm)**
    ([int](#language.types.integer))









    **[SIGTERM](#constant.sigterm)**
    ([int](#language.types.integer))









    **[SIGSTKFLT](#constant.sigstkflt)**
    ([int](#language.types.integer))









    **[SIGCLD](#constant.sigcld)**
    ([int](#language.types.integer))









    **[SIGCHLD](#constant.sigchld)**
    ([int](#language.types.integer))









    **[SIGCONT](#constant.sigcont)**
    ([int](#language.types.integer))









    **[SIGSTOP](#constant.sigstop)**
    ([int](#language.types.integer))









    **[SIGTSTP](#constant.sigtstp)**
    ([int](#language.types.integer))









    **[SIGTTIN](#constant.sigttin)**
    ([int](#language.types.integer))









    **[SIGTTOU](#constant.sigttou)**
    ([int](#language.types.integer))









    **[SIGURG](#constant.sigurg)**
    ([int](#language.types.integer))









    **[SIGXCPU](#constant.sigxcpu)**
    ([int](#language.types.integer))









    **[SIGXFSZ](#constant.sigxfsz)**
    ([int](#language.types.integer))









    **[SIGVTALRM](#constant.sigvtalrm)**
    ([int](#language.types.integer))









    **[SIGPROF](#constant.sigprof)**
    ([int](#language.types.integer))









    **[SIGWINCH](#constant.sigwinch)**
    ([int](#language.types.integer))









    **[SIGPOLL](#constant.sigpoll)**
    ([int](#language.types.integer))









    **[SIGIO](#constant.sigio)**
    ([int](#language.types.integer))









    **[SIGPWR](#constant.sigpwr)**
    ([int](#language.types.integer))









    **[SIGSYS](#constant.sigsys)**
    ([int](#language.types.integer))









    **[SIGBABY](#constant.sigbaby)**
    ([int](#language.types.integer))









    **[SIGRTMIN](#constant.sigrtmin)**
    ([int](#language.types.integer))








    **[SIGRTMAX](#constant.sigrtmax)**
    ([int](#language.types.integer))








    **[SIG_BLOCK](#constant.sig-block)**
    ([int](#language.types.integer))








    **[SIG_UNBLOCK](#constant.sig-unblock)**
    ([int](#language.types.integer))








    **[SIG_SETMASK](#constant.sig-setmask)**
    ([int](#language.types.integer))

**Las constantes SI\_\***

    **[SI_USER](#constant.si-user)**
    ([int](#language.types.integer))








    **[SI_NOINFO](#constant.si-noinfo)**
    ([int](#language.types.integer))








    **[SI_KERNEL](#constant.si-kernel)**
    ([int](#language.types.integer))








    **[SI_QUEUE](#constant.si-queue)**
    ([int](#language.types.integer))








    **[SI_TIMER](#constant.si-timer)**
    ([int](#language.types.integer))








    **[SI_MSGGQ](#constant.si-msggq)**
    ([int](#language.types.integer))








    **[SI_ASYNCIO](#constant.si-asyncio)**
    ([int](#language.types.integer))








    **[SI_SIGIO](#constant.si-sigio)**
    ([int](#language.types.integer))








    **[SI_TKILL](#constant.si-tkill)**
    ([int](#language.types.integer))








    **[SI_MESGQ](#constant.si-mesgq)**
    ([int](#language.types.integer))

**Las constantes CLD\_\***

    **[CLD_EXITED](#constant.cld-exited)**
    ([int](#language.types.integer))








    **[CLD_KILLED](#constant.cld-killed)**
    ([int](#language.types.integer))








    **[CLD_DUMPED](#constant.cld-dumped)**
    ([int](#language.types.integer))








    **[CLD_TRAPPED](#constant.cld-trapped)**
    ([int](#language.types.integer))








    **[CLD_STOPPED](#constant.cld-stopped)**
    ([int](#language.types.integer))








    **[CLD_CONTINUED](#constant.cld-continued)**
    ([int](#language.types.integer))

**Las constantes TRAP\_\***

    **[TRAP_BRKPT](#constant.trap-brkpt)**
    ([int](#language.types.integer))








    **[TRAP_TRACE](#constant.trap-trace)**
    ([int](#language.types.integer))

**Las constantes POLL\_\***

    **[POLL_IN](#constant.poll-in)**
    ([int](#language.types.integer))








    **[POLL_OUT](#constant.poll-out)**
    ([int](#language.types.integer))








    **[POLL_MSG](#constant.poll-msg)**
    ([int](#language.types.integer))








    **[POLL_ERR](#constant.poll-err)**
    ([int](#language.types.integer))








    **[POLL_PRI](#constant.poll-pri)**
    ([int](#language.types.integer))








    **[POLL_HUP](#constant.poll-hup)**
    ([int](#language.types.integer))

**Las constantes ILL\_\***

    **[ILL_ILLOPC](#constant.ill-illopc)**
    ([int](#language.types.integer))








    **[ILL_ILLOPN](#constant.ill-illopn)**
    ([int](#language.types.integer))








    **[ILL_ILLADR](#constant.ill-illadr)**
    ([int](#language.types.integer))








    **[ILL_ILLTRP](#constant.ill-illtrp)**
    ([int](#language.types.integer))








    **[ILL_PRVOPC](#constant.ill-prvopc)**
    ([int](#language.types.integer))








    **[ILL_PRVREG](#constant.ill-prvreg)**
    ([int](#language.types.integer))








    **[ILL_COPROC](#constant.ill-coproc)**
    ([int](#language.types.integer))








    **[ILL_BADSTK](#constant.ill-badstk)**
    ([int](#language.types.integer))

**Las constantes FPE\_\***

    **[FPE_INTDIV](#constant.fpe-intdiv)**
    ([int](#language.types.integer))








    **[FPE_INTOVF](#constant.fpe-intovf)**
    ([int](#language.types.integer))








    **[FPE_FLTDIV](#constant.fpe-fltdiv)**
    ([int](#language.types.integer))








    **[FPE_FLTOVF](#constant.fpe-fltovf)**
    ([int](#language.types.integer))








    **[FPE_FLTUND](#constant.fpe-fltund)**
    ([int](#language.types.integer))








    **[FPE_FLTRES](#constant.fpe-fltres)**
    ([int](#language.types.integer))








    **[FPE_FLTINV](#constant.fpe-fltinv)**
    ([int](#language.types.integer))








    **[FPE_FLTSUB](#constant.fpe-fltsub)**
    ([int](#language.types.integer))

**Las constantes SEGV\_\***

    **[SEGV_MAPERR](#constant.segv-maperr)**
    ([int](#language.types.integer))








    **[SEGV_ACCERR](#constant.segv-accerr)**
    ([int](#language.types.integer))

**Las constantes BUS\_\***

    **[BUS_ADRALN](#constant.bus-adraln)**
    ([int](#language.types.integer))








    **[BUS_ADRERR](#constant.bus-adrerr)**
    ([int](#language.types.integer))








    **[BUS_OBJERR](#constant.bus-objerr)**
    ([int](#language.types.integer))

**Las constantes CLONE\_\***

    **[CLONE_NEWNS](#constant.clone-newns)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0





    **[CLONE_NEWIPC](#constant.clone-newipc)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0





    **[CLONE_NEWUTS](#constant.clone-newuts)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0





    **[CLONE_NEWNET](#constant.clone-newnet)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0





    **[CLONE_NEWPID](#constant.clone-newpid)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0





    **[CLONE_NEWUSER](#constant.clone-newuser)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0





    **[CLONE_NEWCGROUP](#constant.clone-newcgroup)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.4.0

**Las constantes PRIO\_\***

    **[PRIO_PGRP](#constant.prio-pgrp)**
    ([int](#language.types.integer))









    **[PRIO_USER](#constant.prio-user)**
    ([int](#language.types.integer))









    **[PRIO_PROCESS](#constant.prio-process)**
    ([int](#language.types.integer))









    **[PRIO_DARWIN_BG](#constant.prio-darwin-bg)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0.





    **[PRIO_DARWIN_THREAD](#constant.prio-darwin-thread)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0.






       Constantes
       Descripción


**Constantes de error de control de proceso**

    **[PCNTL_E2BIG](#constant.pcntl-e2big)**
    ([int](#language.types.integer))



     Lista de argumentos demasiado larga





    **[PCNTL_EACCES](#constant.pcntl-eacces)**
    ([int](#language.types.integer))



     Permiso denegado





    **[PCNTL_EAGAIN](#constant.pcntl-eagain)**
    ([int](#language.types.integer))



     Recurso temporalmente no disponible





    **[PCNTL_ECAPMODE](#constant.pcntl-ecapmode)**
    ([int](#language.types.integer))



     El proceso ha intentado una operación no autorizada en modo capacitario
     mientras se ejecutaba en modo capacitario.





    **[PCNTL_ECHILD](#constant.pcntl-echild)**
    ([int](#language.types.integer))



     Ningún proceso hijo





    **[PCNTL_EFAULT](#constant.pcntl-efault)**
    ([int](#language.types.integer))



     Dirección incorrecta





    **[PCNTL_EINTR](#constant.pcntl-eintr)**
    ([int](#language.types.integer))



     Llamada de función interrumpida





    **[PCNTL_EINVAL](#constant.pcntl-einval)**
    ([int](#language.types.integer))



     Argumento no válido





    **[PCNTL_EIO](#constant.pcntl-eio)**
    ([int](#language.types.integer))



     Error de entrada/salida





    **[PCNTL_EISDIR](#constant.pcntl-eisdir)**
    ([int](#language.types.integer))



     Es un directorio





    **[PCNTL_ELIBBAD](#constant.pcntl-elibbad)**
    ([int](#language.types.integer))



     Acceso a una biblioteca compartida corrupta.





    **[PCNTL_ELOOP](#constant.pcntl-eloop)**
    ([int](#language.types.integer))



     Demasiados niveles de enlaces simbólicos





    **[PCNTL_EMFILE](#constant.pcntl-emfile)**
    ([int](#language.types.integer))



     Demasiados ficheros abiertos. Comúnmente causado por exceder
     el límite de recurso RLIMIT_NOFILE. También puede ser causado por exceder el límite especificado en
     /proc/sys/fs/nr_open.





    **[PCNTL_ENAMETOOLONG](#constant.pcntl-enametoolong)**
    ([int](#language.types.integer))



     Nombre de fichero demasiado largo





    **[PCNTL_ENFILE](#constant.pcntl-enfile)**
    ([int](#language.types.integer))



     Demasiados ficheros abiertos en el sistema.
     En Linux, esto probablemente se debe al encuentro con el límite /proc/sys/fs/file-max.





    **[PCNTL_ENOENT](#constant.pcntl-enoent)**
    ([int](#language.types.integer))



     Ningún fichero o directorio de ese tipo.
     Típicamente, este error ocurre cuando una ruta de acceso especificada
     no existe, o cuando uno de los componentes en el prefijo de directorio de una ruta de acceso
     no existe, o cuando la ruta de acceso especificada
     es un enlace simbólico pendiente.





    **[PCNTL_ENOEXEC](#constant.pcntl-enoexec)**
    ([int](#language.types.integer))



     Error de formato de ejecución





    **[PCNTL_ENOMEM](#constant.pcntl-enomem)**
    ([int](#language.types.integer))



     Espacio insuficiente/imposible asignar memoria





    **[PCNTL_ENOSPC](#constant.pcntl-enospc)**
    ([int](#language.types.integer))



     No hay espacio disponible en el dispositivo





    **[PCNTL_ENOTDIR](#constant.pcntl-enotdir)**
    ([int](#language.types.integer))



     No es un directorio





    **[PCNTL_EPERM](#constant.pcntl-eperm)**
    ([int](#language.types.integer))



     Operación no permitida





    **[PCNTL_ESRCH](#constant.pcntl-esrch)**
    ([int](#language.types.integer))



     Ningún proceso encontrado





    **[PCNTL_ETXTBSY](#constant.pcntl-etxtbsy)**
    ([int](#language.types.integer))



     Fichero de texto ocupado





    **[PCNTL_EUSERS](#constant.pcntl-eusers)**
    ([int](#language.types.integer))



     Demasiados usuarios

**FORK\_\* constants**

    **[FORK_NOSIGCHLD](#constant.fork-nosigchld)**
    ([int](#language.types.integer))








    **[FORK_WAITPID](#constant.fork-waitpid)**
    ([int](#language.types.integer))

**RF\* constants**

    **[RFCFDG](#constant.rfcfdg)**
    ([int](#language.types.integer))








    **[RFFDG](#constant.rffdg)**
    ([int](#language.types.integer))








    **[RFLINUXTHPN](#constant.rflinuxthpn)**
    ([int](#language.types.integer))








    **[RFNOWAIT](#constant.rfnowait)**
    ([int](#language.types.integer))








    **[RFPROC](#constant.rfproc)**
    ([int](#language.types.integer))








    **[RFTHREAD](#constant.rfthread)**
    ([int](#language.types.integer))








    **[RFTSIGZMB](#constant.rftsigzmb)**
    ([int](#language.types.integer))

**Primer argumento de waitid (idtype)**

    **[P_ALL](#constant.p-all)**
    ([int](#language.types.integer))



     Seleccionar cualquier hijo.





    **[P_PID](#constant.p-pid)**
    ([int](#language.types.integer))



     Seleccionar por ID de proceso.





    **[P_PGID](#constant.p-pgid)**
    ([int](#language.types.integer))



     Seleccionar por ID de grupo de procesos.





    **[P_PIDFD](#constant.p-pidfd)**
    ([int](#language.types.integer))



     Seleccionar por descriptor de fichero PID.
     Específico de Linux (desde Linux 5.4).





    **[P_UID](#constant.p-uid)**
    ([int](#language.types.integer))



     Seleccionar por ID de usuario efectivo.
     Específico de NetBSD y FreeBSD.





    **[P_GID](#constant.p-gid)**
    ([int](#language.types.integer))



     Seleccionar por ID de grupo efectivo.
     Específico de NetBSD y FreeBSD.





    **[P_SID](#constant.p-sid)**
    ([int](#language.types.integer))



     Seleccionar por ID de sesión.
     Específico de NetBSD y FreeBSD.





    **[P_JAILID](#constant.p-jailid)**
    ([int](#language.types.integer))



     Seleccionar por identificador de jail.
     Específico de FreeBSD.

# Ejemplos

## Tabla de contenidos

- [Uso simple](#pcntl.example)

    ## Uso simple

    Este ejemplo forkea un proceso demonio, con un gestor de señales.

    **Ejemplo #1 Ejemplo de control de procesos**

&lt;?php
pcntl_async_signals(true);

$pid = pcntl_fork();
if ($pid == -1) {
die("imposible de forkear");
} else if ($pid) {
exit(); // somos el proceso padre
} else {
// somos el proceso hijo
}

// desvinculemos el proceso del terminal
if (posix_setsid() == -1) {
die("imposible de desvincularse del terminal");
}

// configuración de los gestores de señales
pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP, "sig_handler");

// bucle infinito
while (1) {

    // ejecución de algo

}

function sig_handler($signo)
{

     switch ($signo) {
         case SIGTERM:
             // gestión de las tareas de terminación
             exit;
             break;
         case SIGHUP:
             // gestión de las tareas de reinicio
             break;
         default:
             // gestión de otras tareas
     }

}

?&gt;

# La enumeración Pcntl\QosClass

(No version information available, might only be in Git)

## Introducción

    La enumeración **Pcntl\QosClass** se utiliza para especificar la
    prioridad del proceso de usuario con **pcntl_setqos_class()**.

## Enum synopsis

    enum **Pcntl\QosClass**

{

         case  Background
     ; //
      Inicia el proceso después de que todos los procesos de alta prioridad hayan terminado.





         case  Default
     ; //
      Inicia el proceso después de todos los procesos de alta prioridad pero antes que los procesos de baja prioridad.





         case  UserInteractive
     ; //
      Inicia el proceso con la prioridad más alta.





         case  UserInitiated
     ; //
      Inicia el proceso con una prioridad alta pero inferior a UserInteractive.


}

# Funciones PCNTL

# Ver también

Echar una ojeada a la sección sobre las
[funciones POSIX](#ref.posix)
puede ser útil.

# pcntl_alarm

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pcntl_alarm — Programa una alarma para enviar una señal

### Descripción

**pcntl_alarm**([int](#language.types.integer) $seconds): [int](#language.types.integer)

Crea una cuenta atrás que enviará una señal
**[SIGALRM](#constant.sigalrm)** al proceso después de
seconds segundos.
Cualquier llamada a **pcntl_alarm()** anulará las
cuentas atrás previamente configuradas.

### Parámetros

     seconds


       El número de segundos a esperar. Si seconds
       vale 0, no se creará ninguna nueva alarma.





### Valores devueltos

Devuelve el tiempo en segundos que queda antes de la ejecución
de la alarma anterior, o 0 si no había ninguna alarma programada.

# pcntl_async_signals

(PHP 7 &gt;= 7.1.0, PHP 8)

pcntl_async_signals — Activa/desactiva la gestión asíncrona de las señales o devuelve el antiguo parámetro

### Descripción

**pcntl_async_signals**([?](#language.types.null)[bool](#language.types.boolean) $enable = **[null](#constant.null)**): [bool](#language.types.boolean)

Si el argumento enable es **[null](#constant.null)**,
**pcntl_async_signals()** devuelve si la gestión asíncrona
de las señales está activada. De lo contrario, la gestión asíncrona de las señales se activa o
desactiva.

### Parámetros

    enable


      Si la gestión asíncrona de las señales debe ser activada.


### Valores devueltos

Cuando se utiliza como getter (enable es **[null](#constant.null)**), devuelve
si la gestión asíncrona de las señales está activada. Cuando se utiliza como setter
(enable no es **[null](#constant.null)**), devuelve si la gestión asíncrona
de las señales estaba activada _antes_ de la llamada a la función.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       enable es ahora nullable.



### Ver también

- [declare](#control-structures.declare)

# pcntl_errno

(PHP 5 &gt;= 5.3.4, PHP 7, PHP 8)

pcntl_errno — Alias de [pcntl_get_last_error()](#function.pcntl-get-last-error)

### Descripción

Esta función es un alias de:
[pcntl_get_last_error()](#function.pcntl-get-last-error)

# pcntl_exec

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pcntl_exec — Ejecuta el programa indicado en el espacio actual de procesos

### Descripción

**pcntl_exec**([string](#language.types.string) $path, [array](#language.types.array) $args = [], [array](#language.types.array) $env_vars = []): [bool](#language.types.boolean)

Ejecuta el programa indicado en el espacio actual de procesos.

### Parámetros

     path


       path debe ser la ruta hacia un binario ejecutable
       o un script con una ruta válida apuntando a un ejecutable en la primera línea
       (por ejemplo, #!/usr/local/bin/perl).
       Ver las páginas de ayuda de su sistema concernientes a execve(2)
       para más información.






     args


       args es un array de argumentos en forma
       de strings pasados al programa.






     env_vars


       env_vars es un array de strings que son pasadas
       al programa como variables de entorno.
       El array es de la forma nombre =&gt; valor, la clave es el nombre de la variable de entorno
       y el valor es el valor de esta variable.





### Valores devueltos

Devuelve **[false](#constant.false)**.

# pcntl_fork

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_fork — Duplica el proceso actual

### Descripción

**pcntl_fork**(): [int](#language.types.integer)

**pcntl_fork()** crea un proceso hijo, que solo difiere del
proceso padre por el identificador de proceso y el identificador
PPID. Consulte la página de man fork(2) para obtener detalles
sobre el comportamiento de esta función en su sistema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

En caso de éxito, el PID (identificador de proceso) del hijo es devuelto
en el proceso padre, y 0 es devuelto en el proceso hijo. En caso de
fallo, -1 es devuelto en el contexto del padre, no se creará ningún proceso hijo y PHP generará un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con pcntl_fork()**

&lt;?php

$pid = pcntl_fork();
if ($pid == -1) {
die('duplicación imposible');
} else if ($pid) {
     // el padre
     pcntl_wait($status); // Protege contra hijos zombis
} else {
// el hijo
}

?&gt;

### Ver también

    - [pcntl_rfork()](#function.pcntl-rfork) - Manipula los recursos del proceso

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [cli_set_process_title()](#function.cli-set-process-title) - Define el título del proceso

# pcntl_get_last_error

(PHP 5 &gt;= 5.3.4, PHP 7, PHP 8)

pcntl_get_last_error — Recupera el número del error generado por la última función pcntl utilizada

### Descripción

**pcntl_get_last_error**(): [int](#language.types.integer)

Recupera el número de error (errno) definido por la última
función **pcntl** que haya fallado. El mensaje de error del sistema asociado al
número de error puede ser verificado con la función [pcntl_strerror()](#function.pcntl-strerror).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de error (errno) definido por la última
función pcntl que haya fallado. Si no se ha encontrado ningún error, se devuelve 0.

### Ejemplos

**Ejemplo #1 pcntl_get_last_error()** example

    Este ejemplo intentará esperar a los procesos hijos
    en una situación donde no existen procesos hijos,
    y luego mostrará el mensaje de error correspondiente.

&lt;?php
$pid = pcntl_wait($status);
if ($pid === -1) {
    $errno = pcntl_get_last_error();
    $message = pcntl_strerror($errno);
fwrite(STDERR, 'pcntl_wait failed with errno ' . $errno
. ': ' . $message . PHP_EOL);
}

Resultado del ejemplo anterior es similar a:

pcntl_wait failed with errno 10: No child processes

### Ver también

- [pcntl_strerror()](#function.pcntl-strerror) - Recupera el mensaje de error del sistema asociado con el errno proporcionado

# pcntl_getcpuaffinity

(PHP 8 &gt;= 8.4.0)

pcntl_getcpuaffinity — Devuelve la afinidad de CPU de un proceso

### Descripción

**pcntl_getcpuaffinity**([?](#language.types.null)[int](#language.types.integer) $pid = **[null](#constant.null)**): [bool](#language.types.boolean)|[array](#language.types.array)

Devuelve la afinidad de CPU del pid.

### Parámetros

    pid


      Si **[null](#constant.null)**, se utiliza el identificador del proceso actual.


### Valores devueltos

Devuelve la máscara de afinidad de CPU del proceso, o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) cuando
pid es un identificador de proceso no válido
o cuando no se ha podido crear la máscara de CPU.

Si pid es un proceso para el cual el usuario
actual no tiene permiso autorizado, se emite un **[E_WARNING](#constant.e-warning)**.

### Ver también

- [pcntl_setcpuaffinity()](#function.pcntl-setcpuaffinity) - Define la afinidad de CPU de un proceso

# pcntl_getpriority

(PHP 5, PHP 7, PHP 8)

pcntl_getpriority — Devuelve la prioridad de un proceso

### Descripción

**pcntl_getpriority**([?](#language.types.null)[int](#language.types.integer) $process_id = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[PRIO_PROCESS](#constant.prio-process)**): [int](#language.types.integer)|[false](#language.types.singleton)

**pcntl_getpriority()** devuelve la prioridad de
process_id. Como los niveles
de prioridades cambian entre los tipos de sistemas y las versiones de
kernel, lea la página de manual getpriority(2) de su sistema para
detalles específicos.

### Parámetros

     process_id


       Si **[null](#constant.null)**, se utiliza el identificador del proceso actual.






     mode


       Una constante entre **[PRIO_PGRP](#constant.prio-pgrp)**, **[PRIO_USER](#constant.prio-user)**,
       **[PRIO_PROCESS](#constant.prio-process)**,
       **[PRIO_DARWIN_BG](#constant.prio-darwin-bg)** o **[PRIO_DARWIN_THREAD](#constant.prio-darwin-thread)**.





### Valores devueltos

**pcntl_getpriority()** devuelve la prioridad del proceso
o **[false](#constant.false)** en caso de error. Un valor numérico más pequeño hace que la
planificación sea más favorable.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       process_id es ahora nullable.



### Ver también

    - [pcntl_setpriority()](#function.pcntl-setpriority) - Cambia la prioridad de un proceso

# pcntl_rfork

(PHP 8 &gt;= 8.1.0)

pcntl_rfork — Manipula los recursos del proceso

### Descripción

**pcntl_rfork**([int](#language.types.integer) $flags, [int](#language.types.integer) $signal = 0): [int](#language.types.integer)

Manipula los recursos del proceso.

### Parámetros

     flags


       El parámetro flags determina qué recursos del proceso llamante (padre)
       son compartidos por el nuevo proceso (hijo) o inicializados a sus valores por omisión.




       flags es el OU lógico de un subconjunto de los siguientes valores:



        -
         **[RFPROC](#constant.rfproc)**: Si está definido, se crea un nuevo proceso;
         de lo contrario, los cambios afectan al proceso actual.


        -
         **[RFNOWAIT](#constant.rfnowait)**: Si está definido, el proceso hijo será disociado del padre.
         Al salir, el proceso hijo no dejará un estado a recolectar para el padre.


        -
         **[RFFDG](#constant.rffdg)**: Si está definido, la tabla de descriptores de ficheros del llamante es copiada;
         de lo contrario, ambos procesos comparten una sola tabla.


        -
         **[RFCFDG](#constant.rfcfdg)**: Si está definido, el nuevo proceso comienza con una tabla de descriptores de ficheros propia.
         Es mutuamente excluyente con **[RFFDG](#constant.rffdg)**.


        -
         **[RFLINUXTHPN](#constant.rflinuxthpn)**: Si está definido, el núcleo devolverá SIGUSR1 en lugar de SIGCHILD al salir del hilo para el hijo.
         Esto está destinado a hacer la notificación de salida del padre de salida del hilo Linux clone.







     signal


       El número del signal.





### Valores devueltos

En caso de éxito, el PID del proceso hijo es devuelto en el contexto del padre,
y un 0 es devuelto en el contexto del proceso hijo.
En caso de fallo, un -1 será devuelto en el contexto del padre,
ningún proceso hijo será creado, y se lanzará un error PHP.

### Ejemplos

    **Ejemplo #1 Ejemplo de pcntl_rfork()**

&lt;?php

$pid = pcntl_rfork(RFNOWAIT|RFTSIGZMB, SIGUSR1);
if ($pid &gt; 0) {
// Esto es el proceso padre.
var_dump($pid);
} else {
  // Esto es el proceso hijo.
  var_dump($pid);
sleep(2); // mientras el hijo no duerma, vemos su "pid"
}
?&gt;

    Resultado del ejemplo anterior es similar a:

int(77093)
int(0)

### Notas

**Nota**:

    Esta función solo está disponible en sistemas BSD.

### Ver también

    - [pcntl_fork()](#function.pcntl-fork) - Duplica el proceso actual

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [cli_set_process_title()](#function.cli-set-process-title) - Define el título del proceso

# pcntl_setcpuaffinity

(PHP 8 &gt;= 8.4.0)

pcntl_setcpuaffinity — Define la afinidad de CPU de un proceso

### Descripción

**pcntl_setcpuaffinity**([?](#language.types.null)[int](#language.types.integer) $pid = **[null](#constant.null)**, [array](#language.types.array) $hmask = ?): [bool](#language.types.boolean)

Define la afinidad de CPU del pid con el máscara de afinidad de CPU proporcionada por
hmask.

### Parámetros

    pid


      Si **[null](#constant.null)**, se utiliza el identificador del proceso actual.




    hmask


      El máscara de afinidad de CPU compuesto por uno o más identificadores de CPU a los que se vincula el proceso.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

Se lanza una [TypeError](#class.typeerror) si uno
de los identificadores de CPU de hmask es inválido.
Se lanza una [ValueError](#class.valueerror) si
pid es un identificador de proceso inválido
o si el máscara de CPU no ha podido ser creado.

### Ver también

- [pcntl_getcpuaffinity()](#function.pcntl-getcpuaffinity) - Devuelve la afinidad de CPU de un proceso

# pcntl_setpriority

(PHP 5, PHP 7, PHP 8)

pcntl_setpriority — Cambia la prioridad de un proceso

### Descripción

**pcntl_setpriority**([int](#language.types.integer) $priority, [?](#language.types.null)[int](#language.types.integer) $process_id = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[PRIO_PROCESS](#constant.prio-process)**): [bool](#language.types.boolean)

**pcntl_setpriority()** cambia la prioridad de
process_id a priority.

### Parámetros

     priority


       priority es generalmente un valor que va de
       -20 a 20. La prioridad por omisión
       es 0 mientras que un valor numérico más pequeño
       favorece una mejor planificación. Como los niveles de prioridad
       cambian entre los tipos de sistemas y las versiones de kernel, lea
       la página de manual getpriority(2) de su sistema para detalles
       específicos.






     process_id


       Si **[null](#constant.null)**, se utiliza el identificador del proceso actual.






     mode


       Una constante entre **[PRIO_PGRP](#constant.prio-pgrp)**, **[PRIO_USER](#constant.prio-user)**,
       **[PRIO_PROCESS](#constant.prio-process)**,
       **[PRIO_DARWIN_BG](#constant.prio-darwin-bg)** o **[PRIO_DARWIN_THREAD](#constant.prio-darwin-thread)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       process_id es ahora nullable.



### Ver también

    - [pcntl_getpriority()](#function.pcntl-getpriority) - Devuelve la prioridad de un proceso

    - **pcntl_setpriority()**

# pcntl_signal

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_signal — Instala un gestor de señales

### Descripción

**pcntl_signal**([int](#language.types.integer) $signal, [callable](#language.types.callable)|[int](#language.types.integer) $handler, [bool](#language.types.boolean) $restart_syscalls = **[true](#constant.true)**): [bool](#language.types.boolean)

**pcntl_signal()** instala un nuevo gestor
de señales o reemplaza el gestor de señales actual
para la señal indicada por el parámetro
signal.

### Parámetros

     signal


       El número de la señal.






     handler


       El gestor de señales. Puede ser un [callable](#language.types.callable),
       que será llamado para gestionar la señal, o bien una de las dos
       constantes globales **[SIG_IGN](#constant.sig-ign)** o **[SIG_DFL](#constant.sig-dfl)**,
       que, respectivamente, ignorarán la señal o restaurarán el gestor
       de señales por defecto.




       Si se proporciona un [callable](#language.types.callable), debe implementar la siguiente firma:







        handler([int](#language.types.integer) $signo, [mixed](#language.types.mixed) $siginfo): [void](language.types.void.html)



         signal


           La señal a gestionar.




         siginfo


           Si el sistema operativo soporta las estructuras siginfo_t, esto será un [array](#language.types.array) de información de la señal que depende de la señal.





      **Nota**:



        Téngase en cuenta que cuando se configura el gestor con un método de objeto,
        el contador de referencia del objeto se incrementa, lo que lo hace persistente
        hasta que se cambie el gestor de señales por otro, o hasta que el script termine.







     restart_syscalls


       El parámetro opcional restart_syscalls
       especifica si la llamada al sistema de reinicio (restarting) debe ser utilizada
       cuando llega esta señal.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        A partir de PHP 7.1.0 el gestor de la función de retrollamada tiene
        un segundo argumento que contiene el siginfo de esa señal específica. Estos datos
        solo se proporcionan si el sistema operativo tiene la estructura siginfo_t.
        Si el sistema operativo no implementa siginfo_t, se proporciona NULL.





### Ejemplos

    **Ejemplo #1 Ejemplo con pcntl_signal()**

&lt;?php
pcntl_async_signals(true);

// gestor de señales del sistema
function sig_handler($signo)
{

     switch ($signo) {
         case SIGTERM:
             // gestión de la extinción
             exit;
             break;
         case SIGHUP:
             // gestión del reinicio
             break;
         case SIGUSR1:
             echo "Recibida la señal SIGUSR1...\n";
             break;
         default:
             // gestión de otras señales
     }

}

echo "Instalación del gestor de señales...\n";

// Instalación de los gestores de señales
pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP, "sig_handler");
pcntl_signal(SIGUSR1, "sig_handler");

// o bien utilice un objeto
// pcntl_signal(SIGUSR1, array($obj, "hacer_algo"));

echo"Generación de una señal SIGUSR1 a mí mismo...\n";

// envío de SIGUSR1 al identificador de proceso actual
// las funciones posix\_\* requieren la extensión posix
posix_kill(posix_getpid(), SIGUSR1);

echo "Hecho\n";

?&gt;

### Notas

La función **pcntl_signal()** no apila
los gestores de señales, sino que los reemplaza.

#### Método de dispatch

    Existen varios métodos para dispatchar los gestores de señales:



     - Dispatch asíncrono con [pcntl_async_signals()](#function.pcntl-async-signals) activado. Este es el método recomendado

     - Establecer la frecuencia de los [ticks](#control-structures.declare.ticks)

     - Dispatch manual con [pcntl_signal_dispatch()](#function.pcntl-signal-dispatch)




    Cuando las señales son dispatchadas de manera asíncrona o utilizando una ejecución basada en ticks, las funciones bloqueantes como
    [sleep()](#function.sleep) pueden ser interrumpidas.

### Ver también

    - [» Signal (IPC)](https://fr.wikipedia.org/wiki/Signal_(informatique)) en Wikipedia

    - [pcntl_async_signals()](#function.pcntl-async-signals) - Activa/desactiva la gestión asíncrona de las señales o devuelve el antiguo parámetro

    - [pcntl_fork()](#function.pcntl-fork) - Duplica el proceso actual

    - [pcntl_signal_dispatch()](#function.pcntl-signal-dispatch) - Llama a los gestores de señales para cada señal en espera

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

# pcntl_signal_dispatch

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

pcntl_signal_dispatch — Llama a los gestores de señales para cada señal en espera

### Descripción

**pcntl_signal_dispatch**(): [bool](#language.types.boolean)

La función **pcntl_signal_dispatch()** llama a los
gestores de señales instalados por [pcntl_signal()](#function.pcntl-signal) para
cada señal en espera.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con pcntl_signal_dispatch()**

&lt;?php
echo "Instalación de un gestor de señal...\n";
pcntl_signal(SIGHUP, function($signo) {
echo "Gestor de señal llamado!\n";
});

echo "Generación de una señal SIGHUP a mí mismo...\n";
posix_kill(posix_getpid(), SIGHUP);

echo "Envío...\n";
pcntl_signal_dispatch();

echo "Hecho\n";

?&gt;

    Resultado del ejemplo anterior es similar a:

Instalación de un gestor de señal...
Generación de una señal SIGHUP a mí mismo...
Envío...
Gestor de señal llamado!
Hecho

### Ver también

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [pcntl_sigprocmask()](#function.pcntl-sigprocmask) - Lista y configura las señales bloqueadas

    - [pcntl_sigwaitinfo()](#function.pcntl-sigwaitinfo) - Espera una señal

    - [pcntl_sigtimedwait()](#function.pcntl-sigtimedwait) - Espera una señal en un tiempo dado

# pcntl_signal_get_handler

(PHP 7 &gt;= 7.1.0, PHP 8)

pcntl_signal_get_handler — Recupera el gestor actual para la señal especificada

### Descripción

**pcntl_signal_get_handler**([int](#language.types.integer) $signal): [callable](#language.types.callable)|[int](#language.types.integer)

La función **pcntl_signal_get_handler()** recupera el gestor actual para la signal
especificada.

### Parámetros

    signal


      El número de la señal.


### Valores devueltos

Esta función puede devolver un valor entero que se refiere a
**[SIG_DFL](#constant.sig-dfl)** o a **[SIG_IGN](#constant.sig-ign)**.
Si se ha definido un gestor personalizado, este [callable](#language.types.callable)
es devuelto.

### Historial de cambios

      Versión
      Descripción






      7.1.0

       La función **pcntl_signal_get_handler()** fue añadida.



### Ejemplos

    **Ejemplo #1 Ejemplo con pcntl_signal_get_handler()**

&lt;?php
var_dump(pcntl_signal_get_handler(SIGUSR1)); // Muestra: int(0)

function pcntl_test($signo) {}
pcntl_signal(SIGUSR1, 'pcntl_test');
var_dump(pcntl_signal_get_handler(SIGUSR1)); // Muestra: string(10) "pcntl_test"

pcntl_signal(SIGUSR1, SIG_DFL);
var_dump(pcntl_signal_get_handler(SIGUSR1)); // Muestra: int(0)

pcntl_signal(SIGUSR1, SIG_IGN);
var_dump(pcntl_signal_get_handler(SIGUSR1)); // Muestra: int(1)
?&gt;

### Ver también

- [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

# pcntl_sigprocmask

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

pcntl_sigprocmask — Lista y configura las señales bloqueadas

### Descripción

**pcntl_sigprocmask**([int](#language.types.integer) $mode, [array](#language.types.array) $signals, [array](#language.types.array) &amp;$old_signals = **[null](#constant.null)**): [bool](#language.types.boolean)

La función **pcntl_sigprocmask()** añade, retira o configura
las señales bloqueadas, en función del parámetro mode.

### Parámetros

     mode


       Configura el comportamiento de **pcntl_sigprocmask()**. Los valores
       posibles son :



        - **[SIG_BLOCK](#constant.sig-block)** : añade la señal a la lista
        de señales bloqueadas.

        - **[SIG_UNBLOCK](#constant.sig-unblock)**: retira la señal de la lista
        de señales bloqueadas.

        - **[SIG_SETMASK](#constant.sig-setmask)** : reemplaza la lista actual
        de señales bloqueadas por una nueva lista.






     signals


       Lista de señales.






     old_signals


       El parámetro old_signals es un array que contiene
       la lista anterior de señales bloqueadas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el signal
       está vacío.




      8.4.0

       Se lanza una excepción [TypeError](#class.typeerror) si el valor de signal
       no es un [int](#language.types.integer).




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el valor de signal
       es inválido.




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el valor de mode
       no es **[SIG_BLOCK](#constant.sig-block)**, **[SIG_UNBLOCK](#constant.sig-unblock)** o
       **[SIG_SETMASK](#constant.sig-setmask)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con pcntl_sigprocmask()**

&lt;?php
pcntl_sigprocmask(SIG_BLOCK, array(SIGHUP));
$oldset = array();
pcntl_sigprocmask(SIG_UNBLOCK, array(SIGHUP), $oldset);
?&gt;

### Ver también

    - [pcntl_sigwaitinfo()](#function.pcntl-sigwaitinfo) - Espera una señal

    - [pcntl_sigtimedwait()](#function.pcntl-sigtimedwait) - Espera una señal en un tiempo dado

# pcntl_sigtimedwait

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

pcntl_sigtimedwait — Espera una señal en un tiempo dado

### Descripción

**pcntl_sigtimedwait**(
    [array](#language.types.array) $signals,
    [array](#language.types.array) &amp;$info = [],
    [int](#language.types.integer) $seconds = 0,
    [int](#language.types.integer) $nanoseconds = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

La función **pcntl_sigtimedwait()** opera exactamente como
[pcntl_sigwaitinfo()](#function.pcntl-sigwaitinfo) excepto por el hecho de que toma dos
parámetros adicionales: seconds y
nanoseconds, que establecen una duración máxima
de espera.

### Parámetros

     signals


       Una lista de señales a esperar.






     info


       El parámetro info recibe la información
       de la señal, en forma de array. Véase
       [pcntl_sigwaitinfo()](#function.pcntl-sigwaitinfo).






     seconds


       Tiempo máximo de espera en segundos.






     nanoseconds


       Tiempo máximo de espera en nanosegundos.





### Valores devueltos

**pcntl_sigtimedwait()** devuelve un número de señal
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el signal
       está vacío.




      8.4.0

       Se lanza una excepción [TypeError](#class.typeerror) si el valor de signal
       no es un [int](#language.types.integer).




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el valor de signal
       es inválido.




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el valor de seconds
       es inferior a 0.




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el valor de nanoseconds
       es inferior a 0.




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si los valores de seconds y
       de nanoseconds son ambos iguales a 0.



### Ver también

    - [pcntl_sigprocmask()](#function.pcntl-sigprocmask) - Lista y configura las señales bloqueadas

    - [pcntl_sigwaitinfo()](#function.pcntl-sigwaitinfo) - Espera una señal

# pcntl_sigwaitinfo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

pcntl_sigwaitinfo — Espera una señal

### Descripción

**pcntl_sigwaitinfo**([array](#language.types.array) $signals, [array](#language.types.array) &amp;$info = []): [int](#language.types.integer)|[false](#language.types.singleton)

La función **pcntl_sigwaitinfo()** suspende su ejecución hasta
la recepción de una de las señales indicadas en signals.
Si una de las señales ya está en espera (i.e., bloqueada por
[pcntl_sigprocmask()](#function.pcntl-sigprocmask)),
**pcntl_sigwaitinfo()** se termina inmediatamente.

### Parámetros

     signals


       Un array de señales a esperar.






     info


       El parámetro info recibe un array
       que contiene la información sobre la señal.




       Los siguientes elementos están siempre disponibles para todas las señales:



        - signo : número de señal

        - errno : un número de error

        - code : código de señal




       Los siguientes elementos pueden estar disponibles para la señal
       **[SIGCHLD](#constant.sigchld)**:



        - status : valor de salida o señal

        - utime : tiempo de usuario consumido

        - stime : tiempo de sistema consumido

        - pid : número de proceso llamante

        - uid : identificador del usuario llamante, o del proceso llamante




       Los siguientes elementos pueden estar disponibles para las señales
       **[SIGILL](#constant.sigill)**,
       **[SIGFPE](#constant.sigfpe)**, **[SIGSEGV](#constant.sigsegv)** y
       **[SIGBUS](#constant.sigbus)**:



        - addr : dirección de memoria que causó el error




       Los siguientes elementos pueden estar disponibles para la señal
       **[SIGPOLL](#constant.sigpoll)**:



        - band : evento de band

        - fd : número de puntero de fichero





### Valores devueltos

Devuelve un número de señal en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el signal
       está vacío.




      8.4.0

       Se lanza una excepción [TypeError](#class.typeerror) si el valor de signal
       no es un [int](#language.types.integer).




      8.4.0

       Se lanza una excepción [ValueError](#class.valueerror) si el valor de signal
       es inválido.



### Ejemplos

    **Ejemplo #1 Ejemplo con pcntl_sigwaitinfo()**

&lt;?php
echo "Bloquea la señal SIGHUP\n";
pcntl_sigprocmask(SIG_BLOCK, array(SIGHUP));

echo "Envía la señal SIGHUP a sí mismo\n";
posix_kill(posix_getpid(), SIGHUP);

echo "Espera señales\n";
$info = array();
pcntl_sigwaitinfo(array(SIGHUP), $info);
?&gt;

### Ver también

    - [pcntl_sigprocmask()](#function.pcntl-sigprocmask) - Lista y configura las señales bloqueadas

    - [pcntl_sigtimedwait()](#function.pcntl-sigtimedwait) - Espera una señal en un tiempo dado

# pcntl_strerror

(PHP 5 &gt;= 5.3.4, PHP 7, PHP 8)

pcntl_strerror — Recupera el mensaje de error del sistema asociado con el errno proporcionado

### Descripción

**pcntl_strerror**([int](#language.types.integer) $error_code): [string](#language.types.string)

Devuelve el mensaje de error del sistema asociado al error_code
(errno) de la última función pcntl que falló.
El parámetro error_code puede ser obtenido llamando a
[pcntl_get_last_error()](#function.pcntl-get-last-error).

### Parámetros

    error_code


      Un número de error (errno),
      devuelto por [pcntl_get_last_error()](#function.pcntl-get-last-error).


### Valores devueltos

Devuelve el mensaje de error, en forma de string.

### Ejemplos

**Ejemplo #1 pcntl_strerror()** ejemplo

    Este ejemplo intentará esperar a los procesos hijos
    en una situación donde no existen procesos hijos,
    y luego mostrará el mensaje de error correspondiente.

&lt;?php
$pid = pcntl_wait($status);
if ($pid === -1) {
    $errno = pcntl_get_last_error();
    $message = pcntl_strerror($errno);
fwrite(STDERR, 'pcntl_wait falló con errno ' . $errno
. ': ' . $message . PHP_EOL);
}

Resultado del ejemplo anterior es similar a:

pcntl_wait falló con errno 10: No child processes

### Ver también

- [pcntl_get_last_error()](#function.pcntl-get-last-error) - Recupera el número del error generado por la última función pcntl utilizada

# pcntl_unshare

(PHP 7 &gt;= 7.4.0, PHP 8)

pcntl_unshare — Disocia partes del contexto de ejecución del proceso

### Descripción

**pcntl_unshare**([int](#language.types.integer) $flags): [bool](#language.types.boolean)

**pcntl_unshare()** permite a un proceso disociar partes de su contexto de ejecución que actualmente están compartidas con otros procesos.
El uso principal de **pcntl_unshare()** es permitir a un proceso controlar
su contexto de ejecución compartido sin crear un nuevo proceso.

### Parámetros

     flags


       El parámetro flags es una máscara de bits que especifica qué partes del contexto de ejecución deben ser disociadas.
       Este parámetro se especifica combinando por OR una o más de las constantes CLONE_* siguientes:



        - **[CLONE_NEWNS](#constant.clone-newns)**

        - **[CLONE_NEWIPC](#constant.clone-newipc)**

        - **[CLONE_NEWUTS](#constant.clone-newuts)**

        - **[CLONE_NEWNET](#constant.clone-newnet)**

        - **[CLONE_NEWPID](#constant.clone-newpid)**

        - **[CLONE_NEWUSER](#constant.clone-newuser)**

        - **[CLONE_NEWCGROUP](#constant.clone-newcgroup)**





### Valores devueltos

Devuelve 0 en caso de éxito, -1 en caso contrario.
En caso de fallo, define un código de error, que puede ser recuperado con [pcntl_get_last_error()](#function.pcntl-get-last-error).

### Ver también

    - [Constante PCNTL](#pcntl.constants.clone)

    - [pcntl_get_last_error()](#function.pcntl-get-last-error) - Recupera el número del error generado por la última función pcntl utilizada

# pcntl_wait

(PHP 5, PHP 7, PHP 8)

pcntl_wait — Espera o devuelve el estado de un proceso hijo

### Descripción

**pcntl_wait**([int](#language.types.integer) &amp;$status, [int](#language.types.integer) $flags = 0, [array](#language.types.array) &amp;$resource_usage = []): [int](#language.types.integer)

**pcntl_wait()** suspende la ejecución del proceso
actual hasta que uno de los procesos hijos haya terminado, o hasta que
se envíe una señal para terminar el proceso actual o
para llamar a un gestor. Si el proceso ya ha terminado en el momento
de la llamada a la función, es decir, si el proceso es un
zombie, entonces la función termina inmediatamente. Todos los
recursos del sistema utilizados por el proceso hijo son liberados.
Consulte el manual de su sistema en wait(2) para obtener detalles
específicos sobre el funcionamiento de wait() en él.

**Nota**:

    Esta función es equivalente a llamar a la función
    [pcntl_waitpid()](#function.pcntl-waitpid) con un process_id
    valiendo -1 y sin flags.

### Parámetros

     status


       **pcntl_wait()** almacenará la información
       de estado en el parámetro status
       que puede ser leído con las siguientes funciones:
       [pcntl_wifexited()](#function.pcntl-wifexited),
       [pcntl_wifstopped()](#function.pcntl-wifstopped),
       [pcntl_wifsignaled()](#function.pcntl-wifsignaled),
       [pcntl_wexitstatus()](#function.pcntl-wexitstatus),
       [pcntl_wtermsig()](#function.pcntl-wtermsig) y
       [pcntl_wstopsig()](#function.pcntl-wstopsig).






     flags


       Si wait3 está disponible en su sistema (esto es el caso de la mayoría
       de los sistemas BSD-), puede añadir el parámetro opcional
       flags. Si no se proporciona,
       wait() será utilizado para la llamada al sistema. Si wait3 no está disponible,
       el parámetro flags no tendrá efecto. El valor
       de flags es la combinación de cero o más
       de las siguientes constantes:



        <caption>**Valores posibles para flags**</caption>



           **[WNOHANG](#constant.wnohang)**

            Termina inmediatamente si ningún proceso ha terminado.




           **[WUNTRACED](#constant.wuntraced)**

            Termina para los procesos que están detenidos, y para aquellos
            cuyo resultado no ha sido reportado.










### Valores devueltos

**pcntl_wait()** devuelve el identificador de proceso
que ha terminado, -1 en caso de error o cero si WNOHANG ha sido
proporcionado como opción (disponible en los sistemas wait3),
y ningún proceso hijo estaba disponible.

### Ver también

    - [pcntl_fork()](#function.pcntl-fork) - Duplica el proceso actual

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [pcntl_wifexited()](#function.pcntl-wifexited) - Verifica si el código de retorno representa una finalización normal

    - [pcntl_wifstopped()](#function.pcntl-wifstopped) - Devuelve true si el proceso hijo está detenido

    - [pcntl_wifsignaled()](#function.pcntl-wifsignaled) - Devuelve true si el código de estado representa una terminación debido a una señal

    - [pcntl_wexitstatus()](#function.pcntl-wexitstatus) - Devuelve el código de un proceso hijo terminado

    - [pcntl_wtermsig()](#function.pcntl-wtermsig) - Devuelve la señal que causó el término del proceso hijo

    - [pcntl_wstopsig()](#function.pcntl-wstopsig) - Devuelve la señal que causó la detención del proceso hijo

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

# pcntl_waitid

(PHP 8 &gt;= 8.4.0)

pcntl_waitid — Espera a que un proceso hijo cambie de estado

### Descripción

**pcntl_waitid**(
    [int](#language.types.integer) $idtype = **[P_ALL](#constant.p-all)**,
    [?](#language.types.null)[int](#language.types.integer) $id = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$info = [],
    [int](#language.types.integer) $flags = **[WEXITED](#constant.wexited)**,
    [array](#language.types.array) &amp;$resource_usage = []
): [bool](#language.types.boolean)

Obtiene información de estado relacionada con eventos de terminación, parada
y/o continuación en uno de los procesos hijos del llamador.

A menos que se pase el flag **[WNOHANG](#constant.wnohang)**, el proceso que llama
quedará bloqueado hasta que ocurra un error, o hasta que la información de
estado sea disponible y cumpla con todas las siguientes condiciones:

    -

      La información de estado proviene de uno de los procesos hijos en el conjunto
      de procesos hijos especificado por los argumentos idtype
      y id.



    -

      El cambio de estado en la información de estado coincide con uno de los
      flags de cambio de estado establecidos en el argumento flags.


Si la información de estado coincidente está disponible antes de la llamada a
**pcntl_waitid()**, el retorno será inmediato. Si la información
de estado coincidente está disponible para dos o más procesos hijos, el orden
en que se informa su estado no está especificado.

**Nota**:

    Esta documentación cubre la especificación POSIX de la función
    waitid, junto con algunos parámetros adicionales
    específicos de las implementaciones en Linux, NetBSD y FreeBSD. Consulte la
    página del manual waitid(2) de su sistema para obtener
    detalles específicos sobre cómo funciona waitid en su sistema.

### Parámetros

    idtype
    id


      Los argumentos idtype y id
      se utilizan para especificar qué hijos esperar.


      <caption>**Argumentos estándar POSIX idtype y id**</caption>



         Si idtype es P_ALL

          esperar cualquier proceso hijo, id se ignora.




         Si idtype es P_PID

          esperar al hijo con ID de proceso igual a id.




         Si idtype es P_PGID

          esperar cualquier hijo con ID de grupo de procesos igual a id.








      <caption>**Argumentos específicos de Linux idtype y id**</caption>



         Si idtype es P_PIDFD (desde Linux 5.4)

          esperar al hijo referenciado por el descriptor de archivo PID especificado en
          id.
          (Consulte la página del manual de Linux pidfd_open(2) para obtener
          más información sobre los descriptores de archivo PID.)








      <caption>**Argumentos específicos de NetBSD y FreeBSD idtype y id**</caption>




          Si idtype es P_UID


          esperar procesos cuyo ID de usuario efectivo es igual a
          id.





          Si idtype es P_GID


          esperar procesos cuyo ID de grupo efectivo es igual a
          id.





          Si idtype es P_SID


          esperar procesos cuya ID de sesión es igual a
          id.
          Si el proceso hijo inició su propia sesión, su ID de sesión será
          igual a su ID de proceso. De lo contrario, la ID de sesión de un
          proceso hijo coincidirá con la ID de sesión del llamador.








      <caption>**Argumentos específicos de FreeBSD idtype y id**</caption>




          Si idtype es P_JAILID


          esperar procesos dentro de una cárcel cuya identificador de cárcel es igual a
          id.










    info


      El parámetro info se establece en un array
      que contiene información sobre la señal.




      El array info puede contener las siguientes claves:



       - signo: Número de señal

       - errno: Número de error del sistema

       - code: Código de señal

       - status: Valor de salida o señal

       - pid: ID del proceso emisor

       - uid: ID de usuario real del proceso emisor

       - utime: Tiempo de usuario consumido

       - stime: Tiempo de sistema consumido






    flags


      El valor de flags es el valor de cero o más de
      las siguientes constantes combinadas con OR:



       <caption>**Valores posibles para flags**</caption>



          **[WCONTINUED](#constant.wcontinued)**

           Se devolverá el estado de cualquier proceso hijo continuado cuyo
           estado no ha sido reportado desde que continuó de una parada por
           control de trabajos o ha sido reportado solo por llamadas a
           **pcntl_waitid()** con el flag
           **[WNOWAIT](#constant.wnowait)** establecido.




          **[WEXITED](#constant.wexited)**

           Esperar procesos que han finalizado.




          **[WNOHANG](#constant.wnohang)**

           No bloquear si no hay estado disponible; devolver inmediatamente.




          **[WNOWAIT](#constant.wnowait)**

           Mantener el proceso cuyo estado se devuelve en
           info en un estado esperable. Esto no
           afectará el estado del proceso; el proceso puede ser esperado de nuevo
           después de que esta llamada se complete.




          **[WSTOPPED](#constant.wstopped)**

           Se devolverá el estado de cualquier hijo que se haya detenido al
           recibir una señal, y cuyo estado no ha sido reportado desde que se
           detuvo o ha sido reportado solo por llamadas a
           **pcntl_waitid()** con el flag
           **[WNOWAIT](#constant.wnowait)** establecido.











    resource_usage


      El parámetro resource_usage se establece en un array
      que contiene estadísticas de uso de recursos del proceso hijo.

      Esto se admite ya sea si la llamada al sistema wait6 está disponible
      (por ejemplo, en FreeBSD), o en Linux a través de la llamada al sistema
      waitid en bruto.


### Valores devueltos

**pcntl_waitid()** devuelve **[true](#constant.true)** si
**[WNOHANG](#constant.wnohang)** fue especificado y no hay estado disponible para
ningún proceso especificado por idtype y
id.

**pcntl_waitid()** devuelve **[true](#constant.true)** debido al cambio de estado
de uno de sus hijos.

De lo contrario, se devuelve **[false](#constant.false)** y [pcntl_get_last_error()](#function.pcntl-get-last-error)
puede usarse para obtener el número de error errno.

**Nota**:

    Una vez obtenido un número de error errno,
    [pcntl_strerror()](#function.pcntl-strerror) puede usarse para obtener el mensaje de
    texto asociado a él.

### Errores/Excepciones

   <caption>**Valores del número de error (errno)**</caption>
   
    
     
      **[ECHILD](#constant.echild)**
      
       El proceso que llama no tiene procesos hijos no esperados existentes.
      


      **[EINTR](#constant.eintr)**

       **pcntl_waitid()** fue interrumpido por una señal.




      **[EINVAL](#constant.einval)**

       Se especificó un valor no válido para flags, o
       idtype y id especifican un
       conjunto no válido de procesos.



### Historial de cambios

      Versión
      Descripción






      8.5.0

       Se ha añadido resource_usage.



### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_wait()](#function.pcntl-wait) - Espera o devuelve el estado de un proceso hijo

    - [pcntl_fork()](#function.pcntl-fork) - Duplica el proceso actual

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [pcntl_wifexited()](#function.pcntl-wifexited) - Verifica si el código de retorno representa una finalización normal

    - [pcntl_wifstopped()](#function.pcntl-wifstopped) - Devuelve true si el proceso hijo está detenido

    - [pcntl_wifsignaled()](#function.pcntl-wifsignaled) - Devuelve true si el código de estado representa una terminación debido a una señal

    - [pcntl_wexitstatus()](#function.pcntl-wexitstatus) - Devuelve el código de un proceso hijo terminado

    - [pcntl_wtermsig()](#function.pcntl-wtermsig) - Devuelve la señal que causó el término del proceso hijo

    - [pcntl_wstopsig()](#function.pcntl-wstopsig) - Devuelve la señal que causó la detención del proceso hijo

# pcntl_waitpid

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_waitpid — Espera la finalización de la ejecución de un proceso hijo

### Descripción

**pcntl_waitpid**(
    [int](#language.types.integer) $process_id,
    [int](#language.types.integer) &amp;$status,
    [int](#language.types.integer) $flags = 0,
    [array](#language.types.array) &amp;$resource_usage = []
): [int](#language.types.integer)

Suspende la ejecución del proceso actual hasta que un proceso hijo
especificado por el parámetro process_id haya terminado,
una señal haya terminado este proceso o una señal haya llamado a un gestor
de señales.

Si el proceso hijo identificado por process_id ya
ha terminado en el momento de la llamada a esta función (se les llama
procesos "zombie"), la función termina inmediatamente.
Cualquier recurso del sistema utilizado por el proceso hijo es liberado.
Consulte la página de man waitpid(2) para obtener detalles
sobre el comportamiento de esta función en su sistema.

### Parámetros

     process_id


       El valor de process_id puede ser uno de los siguientes:



        <caption>**Valores posibles para process_id**</caption>



           &lt; -1

            espera un proceso hijo cuyo identificador de grupo
            es igual al valor absoluto de process_id.




           -1

            espera cualquier proceso hijo; esto corresponde al
            mismo comportamiento que el de la función [pcntl_wait()](#function.pcntl-wait) presente.




           0

            espera un proceso hijo cuyo identificador de grupo
            es igual al del proceso actual.




           &gt; 0

            espera el proceso hijo cuyo identificador es
            igual al valor de process_id.








      **Nota**:



        Si process_id vale -1, esto equivale
        a utilizar la función [pcntl_wait()](#function.pcntl-wait) (menos
        flags).







     status


       **pcntl_waitpid()** registrará información sobre
       el estado actual del proceso en el parámetro
       status, al cual se puede acceder gracias a las
       siguientes funciones:
       [pcntl_wifexited()](#function.pcntl-wifexited),
       [pcntl_wifstopped()](#function.pcntl-wifstopped),
       [pcntl_wifsignaled()](#function.pcntl-wifsignaled),
       [pcntl_wexitstatus()](#function.pcntl-wexitstatus),
       [pcntl_wtermsig()](#function.pcntl-wtermsig) y
       [pcntl_wstopsig()](#function.pcntl-wstopsig).






     flags


       El parámetro flags puede tomar el valor
       cero, o varias de las siguientes constantes globales
       (combinadas con el operador OR):



        <caption>**Valores posibles de flags**</caption>



           **[WNOHANG](#constant.wnohang)**

            retorna inmediatamente si ningún proceso hijo ha terminado.




           **[WUNTRACED](#constant.wuntraced)**

            retorna cuando los procesos hijos están detenidos y su
            estado no ha sido actualizado.










### Valores devueltos

**pcntl_waitpid()** retorna el identificador de
proceso del proceso hijo que ha terminado, o bien -1 en caso
de error o cero si **[WNOHANG](#constant.wnohang)** ha sido utilizado
y ningún proceso hijo estaba disponible.

### Ver también

    - [pcntl_fork()](#function.pcntl-fork) - Duplica el proceso actual

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [pcntl_wifexited()](#function.pcntl-wifexited) - Verifica si el código de retorno representa una finalización normal

    - [pcntl_wifstopped()](#function.pcntl-wifstopped) - Devuelve true si el proceso hijo está detenido

    - [pcntl_wifsignaled()](#function.pcntl-wifsignaled) - Devuelve true si el código de estado representa una terminación debido a una señal

    - [pcntl_wexitstatus()](#function.pcntl-wexitstatus) - Devuelve el código de un proceso hijo terminado

    - [pcntl_wtermsig()](#function.pcntl-wtermsig) - Devuelve la señal que causó el término del proceso hijo

    - [pcntl_wstopsig()](#function.pcntl-wstopsig) - Devuelve la señal que causó la detención del proceso hijo

# pcntl_wexitstatus

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_wexitstatus — Devuelve el código de un proceso hijo terminado

### Descripción

**pcntl_wexitstatus**([int](#language.types.integer) $status): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el código de retorno del proceso hijo. Esta función solo es útil
si la función [pcntl_wifexited()](#function.pcntl-wifexited) ha devuelto **[true](#constant.true)**.

### Parámetros

     status

      El parámetro

status es el parámetro status pasado a una llamada
de [pcntl_waitpid()](#function.pcntl-waitpid) que tuvo éxito.

### Valores devueltos

Devuelve el código de retorno.
Si la funcionalidad no es soportada por el sistema operativo, **[false](#constant.false)** es devuelto.

### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_wifexited()](#function.pcntl-wifexited) - Verifica si el código de retorno representa una finalización normal

# pcntl_wifexited

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_wifexited — Verifica si el código de retorno representa una finalización normal

### Descripción

**pcntl_wifexited**([int](#language.types.integer) $status): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el proceso hijo ha devuelto un código que representa
una finalización normal.

### Parámetros

     status

      El parámetro

status es el parámetro status pasado a una llamada
de [pcntl_waitpid()](#function.pcntl-waitpid) que tuvo éxito.

### Valores devueltos

Devuelve **[true](#constant.true)** si el proceso hijo ha devuelto un código que representa
una finalización normal, **[false](#constant.false)** en caso contrario.

### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_wexitstatus()](#function.pcntl-wexitstatus) - Devuelve el código de un proceso hijo terminado

# pcntl_wifsignaled

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_wifsignaled — Devuelve **[true](#constant.true)** si el código de estado representa una terminación debido a una señal

### Descripción

**pcntl_wifsignaled**([int](#language.types.integer) $status): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el proceso hijo termina porque una señal no pudo ser recibida.

### Parámetros

     status

      El parámetro

status es el parámetro status pasado a una llamada
de [pcntl_waitpid()](#function.pcntl-waitpid) que tuvo éxito.

### Valores devueltos

Devuelve **[true](#constant.true)** si el proceso hijo termina porque una señal no pudo ser recibida, **[false](#constant.false)** en caso contrario.

### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

# pcntl_wifstopped

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_wifstopped — Devuelve true si el proceso hijo está detenido

### Descripción

**pcntl_wifstopped**([int](#language.types.integer) $status): [bool](#language.types.boolean)

Devuelve true si el proceso hijo está detenido; esto solo es posible si la llamada a
[pcntl_waitpid()](#function.pcntl-waitpid) se ha realizado con la opción
**[WUNTRACED](#constant.wuntraced)**.

### Parámetros

     status

      El parámetro

status es el parámetro status pasado a una llamada
de [pcntl_waitpid()](#function.pcntl-waitpid) que tuvo éxito.

### Valores devueltos

Devuelve true si el proceso hijo está detenido, false en caso contrario.

### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

# pcntl_wstopsig

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_wstopsig — Devuelve la señal que causó la detención del proceso hijo

### Descripción

**pcntl_wstopsig**([int](#language.types.integer) $status): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de la señal que causó la detención del proceso hijo.
Esta función es útil únicamente si [pcntl_wifstopped()](#function.pcntl-wifstopped)
ha devuelto **[true](#constant.true)**.

### Parámetros

     status

      El parámetro

status es el parámetro status pasado a una llamada
de [pcntl_waitpid()](#function.pcntl-waitpid) que tuvo éxito.

### Valores devueltos

Devuelve el número de la señal.
Si la funcionalidad no es soportada por el sistema operativo, **[false](#constant.false)** es devuelto.

### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_wifstopped()](#function.pcntl-wifstopped) - Devuelve true si el proceso hijo está detenido

# pcntl_wtermsig

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

pcntl_wtermsig — Devuelve la señal que causó el término del proceso hijo

### Descripción

**pcntl_wtermsig**([int](#language.types.integer) $status): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de la señal que causó el término del proceso hijo.
Esta función es útil solo si
[pcntl_wifsignaled()](#function.pcntl-wifsignaled) devuelve **[true](#constant.true)**.

### Parámetros

     status

      El parámetro

status es el parámetro status pasado a una llamada
de [pcntl_waitpid()](#function.pcntl-waitpid) que tuvo éxito.

### Valores devueltos

Devuelve el número de la señal.
Si la funcionalidad no es soportada por el sistema operativo, **[false](#constant.false)** es devuelto.

### Ver también

    - [pcntl_waitpid()](#function.pcntl-waitpid) - Espera la finalización de la ejecución de un proceso hijo

    - [pcntl_signal()](#function.pcntl-signal) - Instala un gestor de señales

    - [pcntl_wifsignaled()](#function.pcntl-wifsignaled) - Devuelve true si el código de estado representa una terminación debido a una señal

## Tabla de contenidos

- [pcntl_alarm](#function.pcntl-alarm) — Programa una alarma para enviar una señal
- [pcntl_async_signals](#function.pcntl-async-signals) — Activa/desactiva la gestión asíncrona de las señales o devuelve el antiguo parámetro
- [pcntl_errno](#function.pcntl-errno) — Alias de pcntl_get_last_error
- [pcntl_exec](#function.pcntl-exec) — Ejecuta el programa indicado en el espacio actual de procesos
- [pcntl_fork](#function.pcntl-fork) — Duplica el proceso actual
- [pcntl_get_last_error](#function.pcntl-get-last-error) — Recupera el número del error generado por la última función pcntl utilizada
- [pcntl_getcpuaffinity](#function.pcntl-getcpuaffinity) — Devuelve la afinidad de CPU de un proceso
- [pcntl_getpriority](#function.pcntl-getpriority) — Devuelve la prioridad de un proceso
- [pcntl_rfork](#function.pcntl-rfork) — Manipula los recursos del proceso
- [pcntl_setcpuaffinity](#function.pcntl-setcpuaffinity) — Define la afinidad de CPU de un proceso
- [pcntl_setpriority](#function.pcntl-setpriority) — Cambia la prioridad de un proceso
- [pcntl_signal](#function.pcntl-signal) — Instala un gestor de señales
- [pcntl_signal_dispatch](#function.pcntl-signal-dispatch) — Llama a los gestores de señales para cada señal en espera
- [pcntl_signal_get_handler](#function.pcntl-signal-get-handler) — Recupera el gestor actual para la señal especificada
- [pcntl_sigprocmask](#function.pcntl-sigprocmask) — Lista y configura las señales bloqueadas
- [pcntl_sigtimedwait](#function.pcntl-sigtimedwait) — Espera una señal en un tiempo dado
- [pcntl_sigwaitinfo](#function.pcntl-sigwaitinfo) — Espera una señal
- [pcntl_strerror](#function.pcntl-strerror) — Recupera el mensaje de error del sistema asociado con el errno proporcionado
- [pcntl_unshare](#function.pcntl-unshare) — Disocia partes del contexto de ejecución del proceso
- [pcntl_wait](#function.pcntl-wait) — Espera o devuelve el estado de un proceso hijo
- [pcntl_waitid](#function.pcntl-waitid) — Espera a que un proceso hijo cambie de estado
- [pcntl_waitpid](#function.pcntl-waitpid) — Espera la finalización de la ejecución de un proceso hijo
- [pcntl_wexitstatus](#function.pcntl-wexitstatus) — Devuelve el código de un proceso hijo terminado
- [pcntl_wifexited](#function.pcntl-wifexited) — Verifica si el código de retorno representa una finalización normal
- [pcntl_wifsignaled](#function.pcntl-wifsignaled) — Devuelve true si el código de estado representa una terminación debido a una señal
- [pcntl_wifstopped](#function.pcntl-wifstopped) — Devuelve true si el proceso hijo está detenido
- [pcntl_wstopsig](#function.pcntl-wstopsig) — Devuelve la señal que causó la detención del proceso hijo
- [pcntl_wtermsig](#function.pcntl-wtermsig) — Devuelve la señal que causó el término del proceso hijo

- [Introducción](#intro.pcntl)
- [Instalación/Configuración](#pcntl.setup)<li>[Instalación](#pcntl.installation)
  </li>- [Constantes predefinidas](#pcntl.constants)
- [Ejemplos](#pcntl.examples)<li>[Uso simple](#pcntl.example)
  </li>- [Pcntl\QosClass](#enum.pcntl-qosclass) — La enumeración Pcntl\QosClass
- [Funciones PCNTL](#ref.pcntl)<li>[pcntl_alarm](#function.pcntl-alarm) — Programa una alarma para enviar una señal
- [pcntl_async_signals](#function.pcntl-async-signals) — Activa/desactiva la gestión asíncrona de las señales o devuelve el antiguo parámetro
- [pcntl_errno](#function.pcntl-errno) — Alias de pcntl_get_last_error
- [pcntl_exec](#function.pcntl-exec) — Ejecuta el programa indicado en el espacio actual de procesos
- [pcntl_fork](#function.pcntl-fork) — Duplica el proceso actual
- [pcntl_get_last_error](#function.pcntl-get-last-error) — Recupera el número del error generado por la última función pcntl utilizada
- [pcntl_getcpuaffinity](#function.pcntl-getcpuaffinity) — Devuelve la afinidad de CPU de un proceso
- [pcntl_getpriority](#function.pcntl-getpriority) — Devuelve la prioridad de un proceso
- [pcntl_rfork](#function.pcntl-rfork) — Manipula los recursos del proceso
- [pcntl_setcpuaffinity](#function.pcntl-setcpuaffinity) — Define la afinidad de CPU de un proceso
- [pcntl_setpriority](#function.pcntl-setpriority) — Cambia la prioridad de un proceso
- [pcntl_signal](#function.pcntl-signal) — Instala un gestor de señales
- [pcntl_signal_dispatch](#function.pcntl-signal-dispatch) — Llama a los gestores de señales para cada señal en espera
- [pcntl_signal_get_handler](#function.pcntl-signal-get-handler) — Recupera el gestor actual para la señal especificada
- [pcntl_sigprocmask](#function.pcntl-sigprocmask) — Lista y configura las señales bloqueadas
- [pcntl_sigtimedwait](#function.pcntl-sigtimedwait) — Espera una señal en un tiempo dado
- [pcntl_sigwaitinfo](#function.pcntl-sigwaitinfo) — Espera una señal
- [pcntl_strerror](#function.pcntl-strerror) — Recupera el mensaje de error del sistema asociado con el errno proporcionado
- [pcntl_unshare](#function.pcntl-unshare) — Disocia partes del contexto de ejecución del proceso
- [pcntl_wait](#function.pcntl-wait) — Espera o devuelve el estado de un proceso hijo
- [pcntl_waitid](#function.pcntl-waitid) — Espera a que un proceso hijo cambie de estado
- [pcntl_waitpid](#function.pcntl-waitpid) — Espera la finalización de la ejecución de un proceso hijo
- [pcntl_wexitstatus](#function.pcntl-wexitstatus) — Devuelve el código de un proceso hijo terminado
- [pcntl_wifexited](#function.pcntl-wifexited) — Verifica si el código de retorno representa una finalización normal
- [pcntl_wifsignaled](#function.pcntl-wifsignaled) — Devuelve true si el código de estado representa una terminación debido a una señal
- [pcntl_wifstopped](#function.pcntl-wifstopped) — Devuelve true si el proceso hijo está detenido
- [pcntl_wstopsig](#function.pcntl-wstopsig) — Devuelve la señal que causó la detención del proceso hijo
- [pcntl_wtermsig](#function.pcntl-wtermsig) — Devuelve la señal que causó el término del proceso hijo
  </li>
