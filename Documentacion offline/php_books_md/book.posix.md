# POSIX

# Introducción

Este módulo contiene una interfaz a aquellas funciones definidas en
el documénto de estándares IEEE 1003.1 (POSIX.1) que no son
accesibles mediante otros medios.

**Advertencia**

    Se pueden obtener datos sensibles con las funciones de POSIX, p.ej.
    [posix_getpwnam()](#function.posix-getpwnam) y similares.

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#posix.installation)

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-posix**

# Constantes predefinidas

## Tabla de contenidos

- [Constantes posix_access](#posix.constants.access)
- [Constantes posix_mknod](#posix.constants.mknod)
- [Constantes posix_setrlimit](#posix.constants.setrlimit)
- [Constantes de posix_pathconf](#posix.constants.pathconf)
- [Constantes de posix_sysconf](#posix.constants.sysconf)

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

## Constantes [posix_access()](#function.posix-access)

**Nota**:

    Se debe tener en cuenta que algunas de estas constantes pueden no estar disponibles en cada sistema.







     **[POSIX_F_OK](#constant.posix-f-ok)**
     ([int](#language.types.integer))



      Verifica si el fichero existe.





     **[POSIX_R_OK](#constant.posix-r-ok)**
     ([int](#language.types.integer))



      Verifica si el fichero existe y tiene los permisos de lectura.





     **[POSIX_W_OK](#constant.posix-w-ok)**
     ([int](#language.types.integer))



      Verifica si el fichero existe y tiene los permisos de escritura.





     **[POSIX_X_OK](#constant.posix-x-ok)**
     ([int](#language.types.integer))



      Verifica si el fichero existe y tiene los permisos de ejecución.


## Constantes [posix_mknod()](#function.posix-mknod)

**Nota**:

    Tenga en cuenta que algunas de ellas pueden no estar disponibles en su sistema.







     **[POSIX_S_IFBLK](#constant.posix-s-ifblk)**
     ([int](#language.types.integer))



      Archivos especiales de bloque





     **[POSIX_S_IFCHR](#constant.posix-s-ifchr)**
     ([int](#language.types.integer))



      Archivos especiales de carácter





     **[POSIX_S_IFIFO](#constant.posix-s-ififo)**
     ([int](#language.types.integer))



      FIFO (pipe nombrado) de archivos especiales





     **[POSIX_S_IFREG](#constant.posix-s-ifreg)**
     ([int](#language.types.integer))



      Archivo normal





     **[POSIX_S_IFSOCK](#constant.posix-s-ifsock)**
     ([int](#language.types.integer))



      Socket


## Constantes [posix_setrlimit()](#function.posix-setrlimit)

**Nota**:

    Tenga en cuenta que algunas de ellas pueden no estar disponibles en su sistema.

**Nota**:

    Se debe leer las notas siguientes además del manual de usuario sobre la
    función **setrlimit()** de su sistema específico, sabiendo
    que puede haber variación en la interpretación de estos límites, incluso
    entre varios sistemas que afirman aplicar POSIX en su totalidad.







     **[POSIX_RLIMIT_AS](#constant.posix-rlimit-as)**
     ([int](#language.types.integer))



      El tamaño máximo del espacio de direcciones del proceso, en bytes. Ver también la
      directiva de configuración PHP [memory_limit](#ini.memory-limit).





     **[POSIX_RLIMIT_CORE](#constant.posix-rlimit-core)**
     ([int](#language.types.integer))



      El tamaño máximo de un archivo de núcleo. Si el límite se establece en 0, no se generará
      ningún archivo de núcleo.





     **[POSIX_RLIMIT_CPU](#constant.posix-rlimit-cpu)**
     ([int](#language.types.integer))



      La cantidad máxima de tiempo de CPU que el proceso puede utilizar,
      en segundos. Cuando se alcanza el límite soft, se emitirá una señal
      **[SIGXCPU](#constant.sigxcpu)**, que puede ser interceptada con
      la función [pcntl_signal()](#function.pcntl-signal). Según el sistema,
      las señales **[SIGXCPU](#constant.sigxcpu)** también pueden emitirse cada
      segundo mientras se alcance el límite hard, en cuyo caso, se emitirá una señal
      **[SIGKILL](#constant.sigkill)** no interceptable.


      Ver también la función [set_time_limit()](#function.set-time-limit).





     **[POSIX_RLIMIT_DATA](#constant.posix-rlimit-data)**
     ([int](#language.types.integer))



      El tamaño máximo de un segmento de datos del proceso, en bytes.
      Es poco probable que esto tenga algún efecto en la ejecución
      de PHP mientras se esté utilizando una extensión y llame
      a la función **brk()** o **sbrk()**.





     **[POSIX_RLIMIT_FSIZE](#constant.posix-rlimit-fsize)**
     ([int](#language.types.integer))



      El tamaño máximo de los archivos que el proceso puede crear, en bytes.





     **[POSIX_RLIMIT_LOCKS](#constant.posix-rlimit-locks)**
     ([int](#language.types.integer))



      El número máximo de cerrojos que el proceso puede crear. Esto solo es soportado
      en núcleos Linux muy antiguos.





     **[POSIX_RLIMIT_MEMLOCK](#constant.posix-rlimit-memlock)**
     ([int](#language.types.integer))



      El número máximo de bytes que pueden bloquearse en memoria.





     **[POSIX_RLIMIT_MSGQUEUE](#constant.posix-rlimit-msgqueue)**
     ([int](#language.types.integer))



      El número máximo de bytes que pueden asignarse para la cola de mensajes POSIX. PHP no viene con soporte
      para la cola de mensajes POSIX, por lo tanto, este límite
      no tendrá ningún efecto a menos que utilice una extensión que
      implemente este soporte.





     **[POSIX_RLIMIT_NICE](#constant.posix-rlimit-nice)**
     ([int](#language.types.integer))



      El valor máximo al cual el proceso puede ser
      [cambiado de prioridad](#function.pcntl-setpriority).
      El valor utilizado será 20 - limit, sabiendo que
      los valores límite del recurso no pueden ser negativos.





     **[POSIX_RLIMIT_NOFILE](#constant.posix-rlimit-nofile)**
     ([int](#language.types.integer))



      Un valor superior al número máximo de descriptores de archivo
      que pueden abrirse por este proceso.





     **[POSIX_RLIMIT_NPROC](#constant.posix-rlimit-nproc)**
     ([int](#language.types.integer))



      El número máximo de procesos (y/o hilos, según el sistema)
      que pueden crearse para el ID de usuario real del proceso.





     **[POSIX_RLIMIT_RSS](#constant.posix-rlimit-rss)**
     ([int](#language.types.integer))



      El tamaño máximo del juego residente del proceso, en páginas.





     **[POSIX_RLIMIT_RTPRIO](#constant.posix-rlimit-rtprio)**
     ([int](#language.types.integer))



      La prioridad máxima de tiempo real que puede establecerse mediante las
      llamadas al sistema
      **sched_setscheduler()** y
      **sched_setparam()**.





     **[POSIX_RLIMIT_RTTIME](#constant.posix-rlimit-rttime)**
     ([int](#language.types.integer))



      La cantidad máxima de tiempo de CPU, en microsegundos, que el proceso
      puede consumir sin hacer una llamada al sistema bloqueante si utiliza
      el reloj de tiempo real.





     **[POSIX_RLIMIT_SIGPENDING](#constant.posix-rlimit-sigpending)**
     ([int](#language.types.integer))



      El número máximo de señales que pueden ponerse en cola
      para el ID de usuario real del proceso.





     **[POSIX_RLIMIT_STACK](#constant.posix-rlimit-stack)**
     ([int](#language.types.integer))



      El tamaño máximo de la pila del proceso, en bytes.





     **[POSIX_RLIMIT_INFINITY](#constant.posix-rlimit-infinity)**
     ([int](#language.types.integer))



      Utilizado para indicar un valor infinito para un límite de recurso.





     **[POSIX_RLIMIT_KQUEUES](#constant.posix-rlimit-kqueues)**
     ([int](#language.types.integer))



      El número máximo de kqueues que este id de usuario está autorizado a crear (FreeBSD).
      Disponible a partir de PHP 8.1.0.





     **[POSIX_RLIMIT_NPTS](#constant.posix-rlimit-npts)**
     ([int](#language.types.integer))



      El número máximo de pseudo-terminales que este id de usuario está autorizado a crear (FreeBSD).
      Disponible a partir de PHP 8.1.0.


## Constantes de [posix_pathconf()](#function.posix-pathconf)

        **[POSIX_PC_LINK_MAX](#constant.posix-pc-link-max)**
        ([int](#language.types.integer))



          El número máximo de enlaces que un fichero o directorio dado puede tener.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_MAX_CANON](#constant.posix-pc-max-canon)**
        ([int](#language.types.integer))



          El número máximo de bytes en un búfer de entrada canónica de terminal
          (el camino siendo entonces un fichero especial de caracteres).
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_MAX_INPUT](#constant.posix-pc-max-input)**
        ([int](#language.types.integer))



          El número máximo de bytes en una cola de entrada de terminal
          (el camino siendo entonces un fichero especial de caracteres).
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_NAME_MAX](#constant.posix-pc-name-max)**
        ([int](#language.types.integer))



          El número máximo de caracteres para un nombre de fichero solo, sin su camino.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_PATH_MAX](#constant.posix-pc-path-max)**
        ([int](#language.types.integer))



          El número máximo de caracteres para un camino completo.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_PIPE_BUF](#constant.posix-pc-pipe-buf)**
        ([int](#language.types.integer))



          El número máximo de bytes que pueden escribirse en un tubo en una sola operación.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_CHOWN_RESTRICTED](#constant.posix-pc-chown-restricted)**
        ([int](#language.types.integer))



          Si se requieren privilegios para permitir que [chown()](#function.chown) funcione.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_NO_TRUNC](#constant.posix-pc-no-trunc)**
        ([int](#language.types.integer))



          Si un nombre de fichero (o ficheros bajo un directorio) es más largo que **[POSIX_PC_NAME_MAX](#constant.posix-pc-name-max)**.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_ALLOC_SIZE_MIN](#constant.posix-pc-alloc-size-min)**
        ([int](#language.types.integer))



          El número mínimo de bytes de almacenamiento asignados para cualquier parte de un fichero.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_PC_ALLOC_SYMLINK_MAX](#constant.posix-pc-alloc-symlink-max)**
        ([int](#language.types.integer))



          El número máximo de enlaces simbólicos que un fichero o directorio dado puede tener.
          Disponible a partir de PHP 8.3.0.





      **[POSIX_PC_SYMLINK_MAX](#constant.posix-pc-symlink-max)**
      ([int](#language.types.integer))



       El número máximo de bytes en un enlace simbólico.
       Disponible a partir de PHP 8.3.0.



## Constantes de [posix_sysconf()](#function.posix-sysconf)

        **[POSIX_SC_ARG_MAX](#constant.posix-sc-arg-max)**
        ([int](#language.types.integer))



          El número máximo de bytes que pueden tener los argumentos (y las variables de entorno).
          Disponible a partir de PHP 8.3.0.





        **[POSIX_SC_PAGESIZE](#constant.posix-sc-pagesize)**
        ([int](#language.types.integer))



          El número de bytes de la página actual.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_SC_NPROCESSORS_CONF](#constant.posix-sc-nprocessors-conf)**
        ([int](#language.types.integer))



          El número de procesadores configurados en todo el sistema.
          Disponible a partir de PHP 8.3.0.





        **[POSIX_SC_NPROCESSORS_ONLN](#constant.posix-sc-nprocessors-onln)**
        ([int](#language.types.integer))



          El número de procesadores actualmente activos en todo el sistema.
          Disponible a partir de PHP 8.3.0.





      **[POSIX_SC_CHILD_MAX](#constant.posix-sc-child-max)**
      ([int](#language.types.integer))



       El número máximo de procesos simultáneos por usuario.
       Disponible a partir de PHP 8.4.0.





      **[POSIX_SC_CLK_TCK](#constant.posix-sc-clk-tck)**
      ([int](#language.types.integer))



       El número de ticks de reloj por segundo.
      Disponible a partir de PHP 8.4.0.


# Funciones POSIX

# Ver también

La sección sobre [Funciones de Control de Procesos](#book.pcntl)
puede serle de interés.

# posix_access

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

posix_access —
Determinar la accesibilidad de un archivo

### Descripción

**posix_access**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

**posix_access()** verifica el permiso del usuario sobre un archivo.

### Parámetros

     filename


        El nombre del archivo a ser probado.






     flags


        Una máscara consistente de uno o más de los valores **[POSIX_F_OK](#constant.posix-f-ok)**,
        **[POSIX_R_OK](#constant.posix-r-ok)**, **[POSIX_W_OK](#constant.posix-w-ok)** y
        **[POSIX_X_OK](#constant.posix-x-ok)**.




        **[POSIX_R_OK](#constant.posix-r-ok)**, **[POSIX_W_OK](#constant.posix-w-ok)** y
        **[POSIX_X_OK](#constant.posix-x-ok)** solicitan que se verifique si el
        archivo existe y tiene permisos de lectura, escritura y ejecución,
        respectivamente.  **[POSIX_F_OK](#constant.posix-f-ok)** simplemente
        verifica la existencia del archivo.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_access()**



     Este ejemplo verificará si el $archivo puede leerse y escribirse, de lo
     contrario imprimirá un mensaje de error.

&lt;?php

$archivo = 'algun_archivo';

if (posix_access($archivo, POSIX_R_OK | POSIX_W_OK)) {
echo '¡El archivo puede leerse y escribirse!';

} else {
$error = posix_get_last_error();

    echo "Error $error: " . posix_strerror($error);

}

?&gt;

### Ver también

    - [posix_get_last_error()](#function.posix-get-last-error) - Recuperar el número de error establecido por la última función posix que ha fallado

    - [posix_strerror()](#function.posix-strerror) - Recuperar el mensaje de error del sistema asociado con el errno dado

# posix_ctermid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_ctermid — Obtener el nombre de la ruta del terminal controlador

### Descripción

**posix_ctermid**(): [string](#language.types.string)|[false](#language.types.singleton)

Genera un [string](#language.types.string) que es el nombre de la ruta del terminal
controlador actual para el proceso. En caso de error se establecerá a errno,
que puede ser comprobado usando [posix_get_last_error()](#function.posix-get-last-error)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

En caso de terminación exitosa, devuelve un [string](#language.types.string) del nombre de ruta del
terminal controlador actual. De otro modo devuelve **[false](#constant.false)** y se establece
errno, que puede ser comprobado con [posix_get_last_error()](#function.posix-get-last-error).

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_ctermid()**



     Este ejemplo mostrará la ruta del TTY actual.

&lt;?php
echo "Esto ejecutándome desde ".posix_ctermid();
?&gt;

### Ver también

    - [posix_ttyname()](#function.posix-ttyname) - Devuelve el nombre del dispositivo del terminal

    - [posix_get_last_error()](#function.posix-get-last-error) - Recuperar el número de error establecido por la última función posix que ha fallado

# posix_eaccess

(PHP 8 &gt;= 8.3.0)

posix_eaccess —
Determina la accesibilidad de un fichero

### Descripción

**posix_eaccess**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

**posix_eaccess()** verifica los permisos del usuario efectivo de un fichero.

### Parámetros

     filename


       El nombre del fichero a probar.






     flags


       Una máscara compuesta por una o más de las constantes **[POSIX_F_OK](#constant.posix-f-ok)**,
       **[POSIX_R_OK](#constant.posix-r-ok)**, **[POSIX_W_OK](#constant.posix-w-ok)** y
       **[POSIX_X_OK](#constant.posix-x-ok)**.




       **[POSIX_R_OK](#constant.posix-r-ok)**, **[POSIX_W_OK](#constant.posix-w-ok)** y
       **[POSIX_X_OK](#constant.posix-x-ok)** solicitan respectivamente si el fichero
       existe y tiene permisos de lectura, escritura y ejecución.
       **[POSIX_F_OK](#constant.posix-f-ok)** solicita simplemente si el fichero existe.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Verifica el usuario/grupo efectivo para un fichero, difiriendo
       de [posix_access()](#function.posix-access) que verifica
       el usuario/grupo real.



### Ejemplos

    **Ejemplo #1 Ejemplo de posix_eaccess()**



     Este ejemplo verifica si el fichero $file es legible y escribible, de lo contrario
     muestra un mensaje de error.

&lt;?php

$file = 'some_file';

if (posix_eaccess($file, POSIX_R_OK | POSIX_W_OK)) {
echo 'The file is readable and writable!';

} else {
$error = posix_get_last_error();

    echo "Error $error: " . posix_strerror($error);

}

?&gt;

### Ver también

    - [posix_get_last_error()](#function.posix-get-last-error) - Recuperar el número de error establecido por la última función posix que ha fallado

    - [posix_strerror()](#function.posix-strerror) - Recuperar el mensaje de error del sistema asociado con el errno dado

    - [posix_access()](#function.posix-access) - Determinar la accesibilidad de un archivo

# posix_errno

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

posix_errno — Alias de [posix_get_last_error()](#function.posix-get-last-error)

### Descripción

Esta función es un alias de:
[posix_get_last_error()](#function.posix-get-last-error).

# posix_fpathconf

(PHP 8 &gt;= 8.3.0)

posix_fpathconf — Devuelve el valor de un límite configurable

### Descripción

**posix_fpathconf**([resource](#language.types.resource)|[int](#language.types.integer) $file_descriptor, [int](#language.types.integer) $name): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el valor de un límite configurable de name
para file_descriptor.

### Parámetros

file_descriptor

El descriptor de archivo, que debe ser ya sea una recurso
de archivo, o un entero. Un entero se asume como un descriptor
de archivo que puede ser pasado directamente a la llamada al sistema
subyacente.

     name


       El nombre del límite configurable, uno de los siguientes.
       **[POSIX_PC_LINK_MAX](#constant.posix-pc-link-max)**, **[POSIX_PC_MAX_CANON](#constant.posix-pc-max-canon)**,
       **[POSIX_PC_MAX_INPUT](#constant.posix-pc-max-input)**, **[POSIX_PC_NAME_MAX](#constant.posix-pc-name-max)**,
       **[POSIX_PC_PATH_MAX](#constant.posix-pc-path-max)**, **[POSIX_PC_PIPE_BUF](#constant.posix-pc-pipe-buf)**,
       **[POSIX_PC_CHOWN_RESTRICTED](#constant.posix-pc-chown-restricted)**, **[POSIX_PC_NO_TRUNC](#constant.posix-pc-no-trunc)**,
       **[POSIX_PC_ALLOC_SIZE_MIN](#constant.posix-pc-alloc-size-min)**, **[POSIX_PC_SYMLINK_MAX](#constant.posix-pc-symlink-max)**.





### Valores devueltos

Devuelve el límite configurable o **[false](#constant.false)**.

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror)
si file_descriptor es inválido.

### Ejemplos

**Ejemplo #1 Ejemplo de posix_fpathconf()**

    Este ejemplo devuelve la longitud máxima del nombre de ruta en bytes
    para el directorio actual.

&lt;?php
$fd = fopen(__DIR__, "r");
echo posix_fpathconf($fd, POSIX_PC_PATH_MAX);
?&gt;

El ejemplo anterior mostrará:

4096

### Ver también

- [posix_pathconf()](#function.posix-pathconf) - Devuelve el valor de un límite configurable

# posix_get_last_error

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

posix_get_last_error — Recuperar el número de error establecido por la última función posix que ha fallado

### Descripción

**posix_get_last_error**(): [int](#language.types.integer)

Recupera el número de error establecido por la última función posix que
falló. El mensaje de error del sistema asociado con el valor errno puede
ser consultado con [posix_strerror()](#function.posix-strerror).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el valor errno (número de error) definido por la última función
posix que haya fallado. Si no existe un error, se devuelve 0.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_get_last_error()**



     Este ejemplo intenta matar un id de proceso inexistente, lo cual
     establecerá el error más reciente. Entonces el valor errno será
     impreso.

&lt;?php
posix_kill(999459,SIGKILL);
echo 'Su error devuelto fue '.posix_get_last_error(); //Su error devuelto fue \_\_\_
?&gt;

### Ver también

    - [posix_strerror()](#function.posix-strerror) - Recuperar el mensaje de error del sistema asociado con el errno dado

# posix_getcwd

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getcwd — Nombre de la ruta del directorio actual

### Descripción

**posix_getcwd**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre de ruta absoluta del directorio de trabajo actual del script.
En caso de error se establece errno, que puede ser verificado usando
[posix_get_last_error()](#function.posix-get-last-error)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) del nombre de la ruta absoluta en caso de éxito.
En caso de error devuelve **[false](#constant.false)** y se establece errno, que puede ser verificado con
[posix_get_last_error()](#function.posix-get-last-error).

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_getcwd()**



     Este ejemplo devolverá la ruta absoluta del directorio actual
     de trabajo del script.

&lt;?php
echo 'Mi directorio actual de trabajo es '.posix_getcwd();
?&gt;

### Notas

**Nota**:

    Esta función puede fallar si



     -
      El permiso de Lectura o Búsqueda fue denegado


     -
      El nombre de la ruta ya no existe


# posix_getegid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getegid — Devuelve el ID efectivo de grupo del proceso actual

### Descripción

**posix_getegid**(): [int](#language.types.integer)

Devuelve el ID efectivo de grupo efectivo numérico del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) del ID del grupo efectivo.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_getegid()**



     Este ejemplo imprimirá el id efectivo del grupo, una vez que es
     cambiado con [posix_setegid()](#function.posix-setegid).

&lt;?php
echo 'Mi id del grupo real es '.posix_getgid(); //20
posix_setegid(40);
echo 'Mi id del grupo real es '.posix_getgid(); //20
echo 'Mi id del grupo efectivo es '.posix_getegid(); //40
?&gt;

### Notas

**posix_getegid()** es diferente de
[posix_getgid()](#function.posix-getgid) ya que el ID efectivo del grupo se puede cambiar mediante
una llamada al proceso usando [posix_setegid()](#function.posix-setegid).

### Ver también

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

    - [posix_getgid()](#function.posix-getgid) - Devuelve el ID real de grupo del proceso actual

    - [posix_setgid()](#function.posix-setgid) - Establecer el GID de proceso actual

# posix_geteuid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_geteuid — Devolver el ID efectivo de usuario del proceso actual

### Descripción

**posix_geteuid**(): [int](#language.types.integer)

Devuelve el ID efectivo numérico de usuario del proceso actual. Véase
también [posix_getpwuid()](#function.posix-getpwuid) para información sobre cómo
convertirlo en un nombre de usuario utilizable.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el id de usuario, como un valor de tipo [int](#language.types.integer)

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_geteuid()**


    Este ejemplo mostrará el id del usuario actual y establecerá el
     id efectivo de usuario en un id aparte usando
     [posix_seteuid()](#function.posix-seteuid), luego mostrará la diferencia entre
     el id real y el id efectivo.

&lt;?php
echo posix_getuid()."\n"; //10001
echo posix_geteuid()."\n"; //10001
posix_seteuid(10000);
echo posix_getuid()."\n"; //10001
echo posix_geteuid()."\n"; //10000
?&gt;

### Ver también

    - [posix_getpwuid()](#function.posix-getpwuid) - Devolver información sobre un usuario mediante su id de usuario

    - [posix_getuid()](#function.posix-getuid) - Devolver el ID real de usuario del proceso actual

    - [posix_setuid()](#function.posix-setuid) - Establecer el UID del proceso actual

    - POSIX man page GETEUID(2)

# posix_getgid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getgid — Devuelve el ID real de grupo del proceso actual

### Descripción

**posix_getgid**(): [int](#language.types.integer)

Devuelve el ID real numérico de grupo del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el id real de grupo, como un valor de tipo [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_getgid()**



     Este ejemplo imprimirá el id real de grupo, incluso una vez que el id efectivo
     de grupo ha sido cambiado.

&lt;?php
echo 'Mi id real de grupo es '.posix_getgid(); //20
posix_setegid(40);
echo 'Mi id real de grupo es '.posix_getgid(); //20
echo 'Mi id efectivo de grupo es '.posix_getegid(); //40
?&gt;

### Ver también

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

    - [posix_getegid()](#function.posix-getegid) - Devuelve el ID efectivo de grupo del proceso actual

    - [posix_setgid()](#function.posix-setgid) - Establecer el GID de proceso actual

    - POSIX man page GETGID(2)

# posix_getgrgid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getgrgid — Devolver información sobre un grupo mediante un id de grupo

### Descripción

**posix_getgrgid**([int](#language.types.integer) $gid): [array](#language.types.array)

Obtiene información sobre un grupo porporcionando su id.

### Parámetros

     gid


       El id del grupo.





### Valores devueltos

Los elementos del array devueltos son:

    <caption>**El array de información de grupo**</caption>



       Elemento
       Descripción






       name

        El elemento name contiene el nombre del grupo. Es una
        abreviatura, normalmente menos de 16 caracteres "soportan" el
        groupo, no el nombre real completo.




       passwd

        El elemento passwd contiene la contraseña del grupo en un
        formato encriptado. A menudo, por ejemplo bajo un sistema que emplea
        contraseñas "shadow", se devuelve un asterisco en su lugar.




       gid

        El ID del grupo, debería ser el mismo que el del
        parámetro gid usado al llamar a la
        función, y por lo tanto redundante.




       members

        Consiste en un [array](#language.types.array) de
        [string](#language.types.string)s de todos los miembros del grupo.





### Ejemplos

    **Ejemplo #1 Ejemplo de uso deposix_getgrgid()**

&lt;?php

$groupid   = posix_getegid();
$groupinfo = posix_getgrgid($groupid);

print_r($groupinfo);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; toons
[passwd] =&gt; x
[members] =&gt; Array
(
[0] =&gt; tom
[1] =&gt; jerry
)
[gid] =&gt; 42
)

### Ver también

    - [posix_getegid()](#function.posix-getegid) - Devuelve el ID efectivo de grupo del proceso actual

    - [posix_getgrnam()](#function.posix-getgrnam) - Devolver información sobre un grupo mediante su nombre

    - [filegroup()](#function.filegroup) - Leer el nombre del grupo

    - [stat()](#function.stat) - Proporciona información sobre un fichero

    - POSIX man page GETGRNAM(3)

# posix_getgrnam

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getgrnam — Devolver información sobre un grupo mediante su nombre

### Descripción

**posix_getgrnam**([string](#language.types.string) $name): [array](#language.types.array)

Obtiene información sobre un grupo, proporcioinado su nombre.

### Parámetros

     name

      EL nombre del grupo




### Valores devueltos

Los elementos del array devuelto son:

    <caption>**El array de información del grupo**</caption>



       Elemento
       Descripción






       name

        El elemento name contiene el nombre del grupo. Es una
        abreviatura, normalmente menos de 16 caracteres "soportan" el
        groupo, no el nombre real completo. Debería ser el mismo que el del
        parámetro name usado al
        llamar a la función, y por lo tanto redundante.




       passwd

        El elemento passwd contiene la contraseña del grupo en un
        formato encriptado. A menudo, por ejemplo bajo un sistema que emplea
        contraseñas "shadow", se devuelve un asterisco en su lugar.




       gid

        El ID del grupo en forma numérica.




       members

        Consiste en un [array](#language.types.array) de
        [string](#language.types.string)s de todos los miembros del grupo.





### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getgrnam()**

&lt;?php

$groupinfo = posix_getgrnam("toons");

print_r($groupinfo);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; toons
[passwd] =&gt; x
[members] =&gt; Array
(
[0] =&gt; tom
[1] =&gt; jerry
)
[gid] =&gt; 42
)

### Ver también

    - [posix_getegid()](#function.posix-getegid) - Devuelve el ID efectivo de grupo del proceso actual

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

    - [filegroup()](#function.filegroup) - Leer el nombre del grupo

    - [stat()](#function.stat) - Proporciona información sobre un fichero

    - POSIX man page GETGRNAM(3)

# posix_getgroups

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getgroups — Devolver el conjunto de grupos del proceso actual

### Descripción

**posix_getgroups**(): [array](#language.types.array)|[false](#language.types.singleton)

Obtiene el conjunto de grupos del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de enteros que contiene los ids numéricos del conjunto
de grupos del proceso actual, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getgroups()**

&lt;?php

$groups = posix_getgroups();

print_r($groups);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 4
[1] =&gt; 20
[2] =&gt; 24
[3] =&gt; 25
[4] =&gt; 29
[5] =&gt; 30
[6] =&gt; 33
[7] =&gt; 44
[8] =&gt; 46
[9] =&gt; 104
[10] =&gt; 109
[11] =&gt; 110
[12] =&gt; 1000
)

### Ver también

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

# posix_getlogin

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getlogin — Devuelve el nombre del inicio de sesión

### Descripción

**posix_getlogin**(): [string](#language.types.string)|[false](#language.types.singleton)

Delvuelve el nombre del inicio de sesión del usuario propietarios del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de inicio de sesión del usuario, como valor de tipo [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getlogin()**

&lt;?php
echo posix_getlogin(); //apache
?&gt;

### Ver también

    - [posix_getpwnam()](#function.posix-getpwnam) - Devolver información sobre un usuario mediante su nombre de usuario

    - POSIX man page GETLOGIN(3)

# posix_getpgid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getpgid — Obtener el id del grupo de procesos para un control de trabajo

### Descripción

**posix_getpgid**([int](#language.types.integer) $process_id): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el identificador del grupo de procesos del proceso
process_id o **[false](#constant.false)** si ocurre un error.

### Parámetros

     process_id


       El ide del proceso.





### Valores devueltos

Devuelve el identificador, como valor de tipo [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getpgid()**

&lt;?php
$pid = posix_getppid();
echo posix_getpgid($pid); //35
?&gt;

### Notas

**Nota**:

    Esta no es una función POSIX, pero es usual en sistemas BSD y
    System V. Si el sistema no soporta esta función, no
    será incluidaen tiempo de compilación. Se puede comprobar con
    [function_exists()](#function.function-exists).

### Ver también

    - [posix_getppid()](#function.posix-getppid) - Devolver el identificador del proceso padre

    - Página del manual SETPGID(2)

# posix_getpgrp

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getpgrp — Devolver el identificador de grupo de proceso actual

### Descripción

**posix_getpgrp**(): [int](#language.types.integer)

Devuelve el identificador de grupo de proceso del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador, como valor de tipo [int](#language.types.integer).

### Ver también

    - POSIX.1 y la página del manual getpgrp(2) en los sistemas POSIX para
     más información sobre grupos de procesos.

# posix_getpid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getpid — Devolver el identificador del proceso actual

### Descripción

**posix_getpid**(): [int](#language.types.integer)

Devolver el identificador de proceso del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador, como valor de tipo [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getpid()**

&lt;?php
echo posix_getpid(); //8805
?&gt;

### Ver también

    - [posix_kill()](#function.posix-kill) - Enviar una señal a un proceso

    - POSIX man page GETPID(2)

# posix_getppid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getppid — Devolver el identificador del proceso padre

### Descripción

**posix_getppid**(): [int](#language.types.integer)

Devuelve el identificador de proceso del proceso padre del
proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador, como valor de tipo [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getppid()**

&lt;?php
echo posix_getppid(); //8259
?&gt;

# posix_getpwnam

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getpwnam — Devolver información sobre un usuario mediante su nombre de usuario

### Descripción

**posix_getpwnam**([string](#language.types.string) $username): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un [array](#language.types.array) de información sobre el usuario dado.

### Parámetros

     username


       Un nombre de usuario alfanumérico.





### Valores devueltos

En caso de éxito se devuelve un array con los siguientes elementos, si no
se devuelve **[false](#constant.false)**:

    <caption>**El array de información de usuario**</caption>



       Elemento
       Descripción






       name

        El elemento name contiene el nombre del grupo. Es una
        abreviatura, normalmente menos de 16 caracteres "soportan" el
        groupo, no el nombre real completo. Debería se el mismo que
        el parámetro username usado al
        llamar a la función, y por lo tanto redundante.




       passwd

        El elemento passwd contiene la contraseña del grupo en un
        formato encriptado. A menudo, por ejemplo bajo un sistema que emplea
        contraseñas "shadow", se devuelve un asterisco en su lugar.




       uid

        El ID del usuario en forma numérica.




       gid

        El ID de grupo del usuario. Use la función
        [posix_getgrgid()](#function.posix-getgrgid) para resolver el nombre de
        grupo y una lista de sus miembros.




       gecos

        GECOS es un término obosleto que se refiere al campo de
        información "finger" de un sistema de procesamiento por lotes Honeywell.
        El campo, sin embargo, todavía existe, y su contenido ha sido
        formalizado por POSIX. El campo contiene una lista separada
        por comas que contiene el nombre completo del usuario, teléfono de oficina, número
        de oficina, y el número de teléfono de casa. En la mayoría de los sistemas solo está
        disponible el nombre de usuario completo.




       dir

        Este elemento contiene la ruta absoluta al
        directorio "home" del usuario.




       shell

        El elemento shell contiene la ruta absoluta al
        ejecutable del executable del shell predeterminado de usuario.





### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getpwnam()**

&lt;?php

$userinfo = posix_getpwnam("tom");

print_r($userinfo);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; tom
[passwd] =&gt; x
[uid] =&gt; 10000
[gid] =&gt; 42
[gecos] =&gt; "tom,,,"
[dir] =&gt; "/home/tom"
[shell] =&gt; "/bin/bash"
)

### Ver también

    - [posix_getpwuid()](#function.posix-getpwuid) - Devolver información sobre un usuario mediante su id de usuario

    - POSIX man page GETPWNAM(3)

# posix_getpwuid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getpwuid — Devolver información sobre un usuario mediante su id de usuario

### Descripción

**posix_getpwuid**([int](#language.types.integer) $user_id): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un [array](#language.types.array) de información sobre el usuario
denotado por el ID de usuario dado.

### Parámetros

     user_id


       El identificador de usuario.





### Valores devueltos

Devuelve un array asociativo con los siguientes elementos:

    <caption>**El array de información de usuario**</caption>



       Elemento
       Descripción






       name

        El elemento 'name' contiene el nombre de usuario. Es una
        abreviatura, normalmente un "apodo" de menos de 16 caracteres
        del nombre del usuario, no el nombre real completo.




       passwd

        El elemento 'passwd' contiene la contraseña del usuario en un
        formato encriptado. A menudo, por ejemplo, bajo un sistema que emplea
        contraseñas "shadow", se devuelve un asterisco en su lugar.




       uid

        El ID del usuario, debería ser el mismo que el del
        parámetro user_id empleado al llamar a la
        función, y por lo tanto redundante.




       gid

        El ID de grupo del usuario. Emplee la función
        [posix_getgrgid()](#function.posix-getgrgid) para resolver el nombre de
        grupo y una lista de sus miembros.




       gecos

        GECOS es un término obosleto que se refiere al campo de
        información "finger" de un sistema de procesamiento por lotes Honeywell.
        El campo, sin embargo, todavía existe, y su contenido ha sido
        formalizado por POSIX. El campo contiene una lista separada
        por comas con el nombre completo del usuario, teléfono de oficina, número
        de oficina, y el número de teléfono de casa. En la mayoría de los sistemas solo está
        disponible el nombre de usuario completo.




       dir

        Este elemento contiene la ruta absoluta al
        directorio "home" del usuario.




       shell

        El elemento 'shell' contiene la ruta absoluta al
        ejecutable del shell predeterminado del usuario.





La función devuelve **[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getpwuid()**

&lt;?php

$userinfo = posix_getpwuid(10000);

print_r($userinfo);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; tom
[passwd] =&gt; x
[uid] =&gt; 10000
[gid] =&gt; 42
[gecos] =&gt; "tom,,,"
[dir] =&gt; "/home/tom"
[shell] =&gt; "/bin/bash"
)

### Ver también

    - [posix_getpwnam()](#function.posix-getpwnam) - Devolver información sobre un usuario mediante su nombre de usuario

    - Página GETPWNAM(3) del man de POSIX

# posix_getrlimit

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getrlimit — Devuelve información sobre los límites de recursos del sistema

### Descripción

**posix_getrlimit**([?](#language.types.null)[int](#language.types.integer) $resource = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**posix_getrlimit()** devuelve un [array](#language.types.array)
con información sobre los límites actuales blandos y duros del recurso.

Cada recurso tiene un límite soft y hard asociados. El límite
soft corresponde al valor que el núcleo fuerza para el recurso
correspondiente. El límite hard actúa como un techo del límite soft.
Un proceso no privilegiado solo puede definir su límite soft en un
valor comprendido entre 0 y el límite hard, lo que solo hará bajar
su límite hard.

### Parámetros

     resource


       Si es **[null](#constant.null)**, se devolverán todos los límites de recursos actuales.
       De lo contrario, especifique la
       [constante de límite de recurso](#posix.constants.setrlimit)
       para recuperar un límite específico.





### Valores devueltos

Devuelve un [array](#language.types.array) asociativo de elementos para cada
límite que esté definido. Cada límite tiene un límite blando y uno duro.

    <caption>**Lista de límites posibles devueltos**</caption>



       Nombre del límite
       Descripción del límite






       core

        El tamaño máximo del fichero de memoria. Cuando es 0, no se crean ficheros de memoria.
        Cuando los ficheros de memoria son más grandes que este tamaño, se truncarán a este tamaño.




       totalmem

        El tamaño máximo de la memoria del proceso, en bytes.




       virtualmem

        El tamaño máximo de la memoria virtual para el proceso, en bytes.




       data

        El tamaño máximo del segmento de datos para el proceso, en bytes.




       stack

        El tamaño máximo de la pila del proceso, en bytes.




       rss

        El número máximo de páginas virtuales residentes en RAM




       maxproc

        El número máximo de procesos que pueden ser creados para el
        ID de usuario real del proceso llamante.




       memlock

        El número máximo de bytes de memoria que pueden ser bloqueados en RAM.




       cpu

        La cantidad de tiempo que se permite al proceso usar la CPU.




       filesize

        El tamaño máximo del segmento de datos para el proceso, en bytes.




       openfiles

        Uno más que el número máximo de descriptores de fichero abiertos.





La función devuelve **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Se ha añadido el parámetro opcional resource.



### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getrlimit()**

&lt;?php

$limits = posix_getrlimit();

print_r($limits);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[soft core] =&gt; 0
[hard core] =&gt; unlimited
[soft data] =&gt; unlimited
[hard data] =&gt; unlimited
[soft stack] =&gt; 8388608
[hard stack] =&gt; unlimited
[soft totalmem] =&gt; unlimited
[hard totalmem] =&gt; unlimited
[soft rss] =&gt; unlimited
[hard rss] =&gt; unlimited
[soft maxproc] =&gt; unlimited
[hard maxproc] =&gt; unlimited
[soft memlock] =&gt; unlimited
[hard memlock] =&gt; unlimited
[soft cpu] =&gt; unlimited
[hard cpu] =&gt; unlimited
[soft filesize] =&gt; unlimited
[hard filesize] =&gt; unlimited
[soft openfiles] =&gt; 1024
[hard openfiles] =&gt; 1024
)

### Ver también

    - página del manual GETRLIMIT(2)

    - [posix_setrlimit()](#function.posix-setrlimit) - Establecer los límites de recursos del sistema

# posix_getsid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getsid — Obtener el sid actual del proceos

### Descripción

**posix_getsid**([int](#language.types.integer) $process_id): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el identificador de sesión del proceso process_id.
El identificador de sesión de un proceso es el id de grupo del proceso del líder de la sesión.

### Parámetros

     process_id


       Eñ identificador de proceso. Si se establece a 0, se asume el proceso
       actual. Si se especifica un process_id no
       válido, se devuelve **[false](#constant.false)** y se establece un error que
       puede ser verificado con [posix_get_last_error()](#function.posix-get-last-error).





### Valores devueltos

Devuelve el identificador, como valor de tipo [int](#language.types.integer), o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getsid()**

&lt;?php
$pid = posix_getpid();
echo posix_getsid($pid); //8805
?&gt;

### Ver también

    -
     [posix_getpgid()](#function.posix-getpgid) - Obtener el id del grupo de procesos para un control de trabajo


    -
     [posix_setsid()](#function.posix-setsid) - Hacer del proceso actual un líder de sesión


    - POSIX man page GETSID(2)

# posix_getuid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_getuid — Devolver el ID real de usuario del proceso actual

### Descripción

**posix_getuid**(): [int](#language.types.integer)

Devuelve el ID real numérico de usuario del proceso actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el id de usuario, como valor de tipo [int](#language.types.integer)

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_getuid()**

&lt;?php
echo posix_getuid(); //10000
?&gt;

### Ver también

    -
     [posix_getpwuid()](#function.posix-getpwuid) - Devolver información sobre un usuario mediante su id de usuario

    - POSIX man page GETUID(2)

# posix_initgroups

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

posix_initgroups — Calcular la lista de acceso al grupo

### Descripción

**posix_initgroups**([string](#language.types.string) $username, [int](#language.types.integer) $group_id): [bool](#language.types.boolean)

Calcula la lista de acceso al grupo para el usuario especificado en el parámetro name.

### Parámetros

     username


       El usuario para el que se va a calcular la lista.






     group_id


       Normalmente el número de grupo del fichero de contraseñas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - La página del manua Unix para initgroups(3).

# posix_isatty

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_isatty — Determina si un puntero de fichero es un terminal interactivo

### Descripción

**posix_isatty**([resource](#language.types.resource)|[int](#language.types.integer) $file_descriptor): [bool](#language.types.boolean)

    Determina si el puntero de fichero file_descriptor
    se refiere a un tipo de terminal de dispositivo válido.

### Parámetros

file_descriptor

El descriptor de archivo, que debe ser ya sea una recurso
de archivo, o un entero. Un entero se asume como un descriptor
de archivo que puede ser pasado directamente a la llamada al sistema
subyacente.

### Valores devueltos

Devuelve **[true](#constant.true)** si file_descriptor es un puntero de fichero conectado
a un terminal, **[false](#constant.false)** en caso contrario.

### Historial de cambios

          Versión
          Descripción






        8.4.0

         Define errno (número de error) a **[EBADF](#constant.ebadf)** cuando el
         descriptor de fichero/flujo pasado es inválido.




        8.3.0

         Se generan ahora errores de tipo **[E_WARNING](#constant.e-warning)** para las coerciones de enteros
         siguiendo las semánticas habituales de coerción de tipo de PHP.





### Ver también

    - [posix_ttyname()](#function.posix-ttyname) - Devuelve el nombre del dispositivo del terminal

    - [stream_isatty()](#function.stream-isatty) - Verifica si un flujo es un TTY

# posix_kill

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_kill — Enviar una señal a un proceso

### Descripción

**posix_kill**([int](#language.types.integer) $process_id, [int](#language.types.integer) $signal): [bool](#language.types.boolean)

Envía la señal signal al proceso con
el identificador de proceso process_id.

### Parámetros

     process_id


       El identificador de proceso.






     signal


       Una de las [constantes de señales PCNTL](#pcntl.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    -
     La página del manual kill(2) del sistema POSIX, la cual contiene información
     información sobre identificadores de procesos negativos, el pid especial 0, el
     pid especial -1, y la señal número 0.

# posix_mkfifo

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_mkfifo — Crear un archivo especial fifo (un pipe con nombre)

### Descripción

**posix_mkfifo**([string](#language.types.string) $filename, [int](#language.types.integer) $permissions): [bool](#language.types.boolean)

**posix_mkfifo()** crea un archivo FIFO
especial que existe en el sistema de archivos y actúa como un punto de
comunicación bi-direccional para los procesos.

### Parámetros

     filename


       Ruta al archivo FIFO.






     permissions


       El segundo parámetro permissions tiene que ser
       definido en notación octal (p.ej. 0644). El permiso del
       FIFO recién creado depende también del valor
       [umask()](#function.umask) actual. Los permisos del archivo creado
       son (modo &amp; ~umask).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# posix_mknod

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

posix_mknod —
Crear un fichero especial u ordinario (POSIX.1)

### Descripción

**posix_mknod**(
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $flags,
    [int](#language.types.integer) $major = 0,
    [int](#language.types.integer) $minor = 0
): [bool](#language.types.boolean)

Crea un fichero especial u ordinario.

### Parámetros

     filename


       El fichero a crear






     flags


       Este parámetro se construye mediante un operador a nivel de bits OR entre el tipo de fichero (una de
       las siguientes constantes: **[POSIX_S_IFREG](#constant.posix-s-ifreg)**,
       **[POSIX_S_IFCHR](#constant.posix-s-ifchr)**, **[POSIX_S_IFBLK](#constant.posix-s-ifblk)**,
       **[POSIX_S_IFIFO](#constant.posix-s-ififo)** o
       **[POSIX_S_IFSOCK](#constant.posix-s-ifsock)**) y los permisos.






     major


       El identificador de kernel mayor del dispositivo (necesario pasarlo al usar
       **[S_IFCHR](#constant.s-ifchr)** o **[S_IFBLK](#constant.s-ifblk)**).






     minor


       El identificador de kernel menor del dispositivo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de posix_mknod()**

&lt;?php

$fichero = '/tmp/fich_tmp';  // nombre del fichero
$tipo = POSIX_S_IFBLK; // tipo de fichero
$permisos = 0777;     // octal
$mayor = 1;
$menor = 8; // /dev/random

if (!posix_mknod($fichero, $tipo | $permisos, $mayor, $menor)) {
die('Error ' . posix_get_last_error() . ': ' . posix_strerror(posix_get_last_error()));
}

?&gt;

### Ver también

    - [posix_mkfifo()](#function.posix-mkfifo) - Crear un archivo especial fifo (un pipe con nombre)

# posix_pathconf

(PHP 8 &gt;= 8.3.0)

posix_pathconf — Devuelve el valor de un límite configurable

### Descripción

**posix_pathconf**([string](#language.types.string) $path, [int](#language.types.integer) $name): [int](#language.types.integer)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el valor de un límite configurable de name para un path.

### Parámetros

     path


       El nombre del fichero del que se desea obtener el límite.






     name


       El nombre del límite configurable, uno de los siguientes.
       **[POSIX_PC_LINK_MAX](#constant.posix-pc-link-max)**, **[POSIX_PC_MAX_CANON](#constant.posix-pc-max-canon)**,
       **[POSIX_PC_MAX_INPUT](#constant.posix-pc-max-input)**, **[POSIX_PC_NAME_MAX](#constant.posix-pc-name-max)**,
       **[POSIX_PC_PATH_MAX](#constant.posix-pc-path-max)**, **[POSIX_PC_PIPE_BUF](#constant.posix-pc-pipe-buf)**,
       **[POSIX_PC_CHOWN_RESTRICTED](#constant.posix-pc-chown-restricted)**, **[POSIX_PC_NO_TRUNC](#constant.posix-pc-no-trunc)**,
       **[POSIX_PC_ALLOC_SIZE_MIN](#constant.posix-pc-alloc-size-min)**, **[POSIX_PC_SYMLINK_MAX](#constant.posix-pc-symlink-max)**.





### Valores devueltos

Devuelve el límite configurable o **[false](#constant.false)**.

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror)
si path está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de posix_pathconf()**

    Este ejemplo obtendrá la longitud máxima del nombre de ruta en bytes
    para el directorio temporal.

&lt;?php
echo posix_pathconf(sys_get_temp_dir(), POSIX_PC_PATH_MAX);
?&gt;

El ejemplo anterior mostrará:

4096

### Ver también

- [posix_fpathconf()](#function.posix-fpathconf) - Devuelve el valor de un límite configurable

# posix_setegid

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

posix_setegid — Establecer el GID efectivo del proceso actual

### Descripción

**posix_setegid**([int](#language.types.integer) $group_id): [bool](#language.types.boolean)

Establece el ID de grupo efectivo del proceso actual. Esta es una función
privilegiada y se necesitan los permisos apropiados (usualmente root) en
el sistema para contar con la capacidad de ejecutar esta función.

### Parámetros

     group_id


       El id de grupo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_setegid()**



     Este ejemplo imprimirá el id de grupo efectivo, una vez cambiado.

&lt;?php
echo 'Mi id de grupo real es '.posix_getgid(); //20
posix_setegid(40);
echo 'Mi id de grupo real es '.posix_getgid(); //20
echo 'Mi id de grupo efectivo es '.posix_getegid(); //40
?&gt;

### Ver también

    -
     [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

    - [posix_getgid()](#function.posix-getgid) - Devuelve el ID real de grupo del proceso actual

    - [posix_setgid()](#function.posix-setgid) - Establecer el GID de proceso actual

# posix_seteuid

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

posix_seteuid — Establecer el UID efectivo del proceso actual

### Descripción

**posix_seteuid**([int](#language.types.integer) $user_id): [bool](#language.types.boolean)

Establece el ID de usuario efectivo del proceso actual. Esta es una función
privilegiada y se necesitan los permisos apropiados (usualmente root) en
el sistema para tener la capacidad de ejecutar esta función.

### Parámetros

     user_id


       El id de usuario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [posix_geteuid()](#function.posix-geteuid) - Devolver el ID efectivo de usuario del proceso actual

    - [posix_setuid()](#function.posix-setuid) - Establecer el UID del proceso actual

    - [posix_getuid()](#function.posix-getuid) - Devolver el ID real de usuario del proceso actual

# posix_setgid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_setgid — Establecer el GID de proceso actual

### Descripción

**posix_setgid**([int](#language.types.integer) $group_id): [bool](#language.types.boolean)

Establece el ID real de grupo al proceso actual. Esta en una
función privilegiada y necesita los privilegios apropiados (normalmente
"root") en el sistema para ser capaza de realizar esta función. El
orden apropiado de las llamadas a las funciones es
**posix_setgid()** primero,
[posix_setuid()](#function.posix-setuid) la última.

**Nota**:

    Si el llamador es un superusuario también se establecerá el id
    efectivo de grupo.

### Parámetros

     group_id


       El id de grupo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_setgid()**



     Este ejemplo imprimirá el id efectivo de grupo, una vez cambiado.

&lt;?php
echo 'Mi id real de grupo es '.posix_getgid(); //20
posix_setgid(40);
echo 'Mi id real de grupo es '.posix_getgid(); //40
echo 'Mi id efectivo de grupo es '.posix_getegid(); //40
?&gt;

### Ver también

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

    - [posix_getgid()](#function.posix-getgid) - Devuelve el ID real de grupo del proceso actual

# posix_setpgid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_setpgid — Establecer el id de grupo de procesos para el control de trabajo

### Descripción

**posix_setpgid**([int](#language.types.integer) $process_id, [int](#language.types.integer) $process_group_id): [bool](#language.types.boolean)

Permite al proceso process_id unirse al grupo de procesos
process_group_id.

### Parámetros

     process_id


       El id del proceso.






     process_group_id


       El id de grupo de procesos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    -
     Véase POSIX.1 y la página del manual setsid(2) del sistema POSIX para más
     información sobre grupos de proceoss y control de trabajo.

# posix_setrlimit

(PHP 7, PHP 8)

posix_setrlimit — Establecer los límites de recursos del sistema

### Descripción

**posix_setrlimit**([int](#language.types.integer) $resource, [int](#language.types.integer) $soft_limit, [int](#language.types.integer) $hard_limit): [bool](#language.types.boolean)

**posix_setrlimit()** establece los límites blando y duro para un
recurso de sistema dado.

Cada recurso tiene un límite soft y hard asociados. El límite
soft corresponde al valor que el núcleo fuerza para el recurso
correspondiente. El límite hard actúa como un techo del límite soft.
Un proceso no privilegiado solo puede definir su límite soft en un
valor comprendido entre 0 y el límite hard, lo que solo hará bajar
su límite hard.

### Parámetros

     resource


       La
       [constante de límite de recurso](#posix.constants.setrlimit)
       conrrespondiente al límite  a establecer.






     soft_limit


       El límite blando, en la unidad que el límite del recurso requiera, o
       **[POSIX_RLIMIT_INFINITY](#constant.posix-rlimit-infinity)**.






     hard_limit


       El límite duro, en la unidad que el límite del recurso requiera, o
       **[POSIX_RLIMIT_INFINITY](#constant.posix-rlimit-infinity)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - La página SETRLIMIT(2) de man

    - [posix_getrlimit()](#function.posix-getrlimit) - Devuelve información sobre los límites de recursos del sistema

# posix_setsid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_setsid — Hacer del proceso actual un líder de sesión

### Descripción

**posix_setsid**(): [int](#language.types.integer)

Hace del proceso actual un líder de sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un id de sesión, o -1 si ocurrió algún error.

### Ver también

    -
     Las páginas del manual POSIX.1 y setsid(2) del sistema POSIX para más
     información sobre los grupos de procesos y el control de trabajo.

# posix_setuid

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_setuid — Establecer el UID del proceso actual

### Descripción

**posix_setuid**([int](#language.types.integer) $user_id): [bool](#language.types.boolean)

Establece el ID real de usuario del proceso actual. Esta es una función
privilegiada que necesita los privilegios apropiados (normalmente root) del
sistema para que sea capaz de realizar esta función.

### Parámetros

     user_id


       El id de usuario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_setuid()**


    Este ejemplo mostrará el id de usuario actual y después lo establecerá
     a un valor diferente.

&lt;?php
echo posix_getuid()."\n"; //10001
echo posix_geteuid()."\n"; //10001
posix_setuid(10000);
echo posix_getuid()."\n"; //10000
echo posix_geteuid()."\n"; //10000
?&gt;

### Ver también

    - [posix_setgid()](#function.posix-setgid) - Establecer el GID de proceso actual

    - [posix_seteuid()](#function.posix-seteuid) - Establecer el UID efectivo del proceso actual

    - [posix_getuid()](#function.posix-getuid) - Devolver el ID real de usuario del proceso actual

    - [posix_geteuid()](#function.posix-geteuid) - Devolver el ID efectivo de usuario del proceso actual

# posix_strerror

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

posix_strerror — Recuperar el mensaje de error del sistema asociado con el errno dado

### Descripción

**posix_strerror**([int](#language.types.integer) $error_code): [string](#language.types.string)

Devuelve el mensaje de error del sistema POSIX asociado con el
error_code. Es posible obtener el parámetro
error_code llamando la función
[posix_get_last_error()](#function.posix-get-last-error).

### Parámetros

     error_code


       Un número de error POSIX, devuelto por
       [posix_get_last_error()](#function.posix-get-last-error). Si se define como 0,
       entonces se devuelve la cadena "Success".





### Valores devueltos

Devuelve el mensaje de error, como una cadena.

### Ejemplos

    **Ejemplo #1 Ejemplo de posix_strerror()**



     Este ejemplo intentará matar un proceso que no existe, luego imprimirá
     el mensaje de error correspondiente.

&lt;?php
posix_kill(50,SIGKILL);
echo posix_strerror(posix_get_last_error())."\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

No such process

### Ver también

    - [posix_get_last_error()](#function.posix-get-last-error) - Recuperar el número de error establecido por la última función posix que ha fallado

# posix_sysconf

(PHP 8 &gt;= 8.3.0)

posix_sysconf — Devuelve información sobre el sistema en ejecución

### Descripción

**posix_sysconf**([int](#language.types.integer) $conf_id): [int](#language.types.integer)

Devuelve información sobre el sistema en ejecución.

### Parámetros

     conf_id


       El identificador de la variable con las constantes siguientes:
       **[POSIX_SC_ARG_MAX](#constant.posix-sc-arg-max)**, **[POSIX_SC_PAGESIZE](#constant.posix-sc-pagesize)**,
       **[POSIX_SC_NPROCESSORS_CONF](#constant.posix-sc-nprocessors-conf)**, **[POSIX_SC_NPROCESSORS_ONLN](#constant.posix-sc-nprocessors-onln)**,
       **[POSIX_SC_CHILD_MAX](#constant.posix-sc-child-max)**, **[POSIX_SC_CLK_TCK](#constant.posix-sc-clk-tck)**





### Valores devueltos

Devuelve el valor numérico asociado a conf_id

### Ejemplos

**Ejemplo #1 Ejemplo de posix_sysconf()**

    Devuelve el número de procesadores activos.

&lt;?php
echo posix_sysconf(POSIX_SC_NPROCESSORS_ONLN);
?&gt;

El ejemplo anterior mostrará:

2

# posix_times

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_times — Obtener los tiempos de procesos

### Descripción

**posix_times**(): [array](#language.types.array)|[false](#language.types.singleton)

Obtiene informaciónsobre el uso actual de CPU.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un hash de cadenas con iformación sobre el uso de
CPU del proceso actual. Los índices del hash son:

    -

      ticks - el número de pulsos de reloj que han trasncurrido desde
      el reinicio.



    -

      utime - tiempo de usuario usado por el proceso actual.



    -

      stime - tiempo de sistema usado por el proceso actual.



    -

      cutime - tiempop de usuario usado por el proceso actual y sus hijos.



    -

      cstime - tiempo de sistema usado por el proceso actual y sus hijos.


La función devuelve **[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_times()**

&lt;?php

$tiempos = posix_times();

print_r($tiempos );
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[ticks] =&gt; 25814410
[utime] =&gt; 1
[stime] =&gt; 1
[cutime] =&gt; 0
[cstime] =&gt; 0
)

### Notas

**Advertencia**

    Esta función no es fiable de usar, puede devolver valores negativos para
    tiempos altos.

# posix_ttyname

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_ttyname — Devuelve el nombre del dispositivo del terminal

### Descripción

**posix_ttyname**([resource](#language.types.resource)|[int](#language.types.integer) $file_descriptor): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve un [string](#language.types.string) para la ruta absoluta del terminal actual que
está abierto en el puntero de fichero file_descriptor.

### Parámetros

file_descriptor

El descriptor de archivo, que debe ser ya sea una recurso
de archivo, o un entero. Un entero se asume como un descriptor
de archivo que puede ser pasado directamente a la llamada al sistema
subyacente.

### Valores devueltos

En caso de éxito, devuelve un [string](#language.types.string) correspondiente a la ruta absoluta de
file_descriptor. En caso de error, devuelve **[false](#constant.false)**.

### Errores/Excepciones

    Para valores enteros inválidos de file_descriptor,
    se genera un error **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

          Versión
          Descripción






          8.3.0

            Ahora se generan errores de tipo **[E_WARNING](#constant.e-warning)** para las coerciones de enteros
            siguiendo las semánticas habituales de coerción de tipo de PHP.




          8.3.0

            Para valores enteros inválidos de file_descriptor,
            ahora se genera un error **[E_WARNING](#constant.e-warning)**.





### Ver también

      - [posix_isatty()](#function.posix-isatty) - Determina si un puntero de fichero es un terminal interactivo

      - [stream_isatty()](#function.stream-isatty) - Verifica si un flujo es un TTY

# posix_uname

(PHP 4, PHP 5, PHP 7, PHP 8)

posix_uname — Obtener el nombre del sistema

### Descripción

**posix_uname**(): [array](#language.types.array)|[false](#language.types.singleton)

Obtiene información sobre elsistema.

Posix requiere que estas suposiciones no deben hacerse sobre el
formato de los valores, p.ej. la suposición que la versión puede contener
tres dígitos o cualquier otra cosa devuelta por esta función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Returns un hash de cadena con información sobre el
sistema. Los índices del hash son

    -
     sysname - nombre del sistema operativo (p.ej. Linux)


    -
     nodename - nombre del sistema (p.ej. valiant)


    -
     release - versión de publicación del sistema operativo (p.ej. 2.2.10)


    -
     version - versión del sistema operativo (p.ej. #4 Tue Jul 20
     17:01:36 MEST 1999)


    -
     machine - arquitectura del sistema (p.ej. i586)


    -
     domainname - nombre del dominio DNS (p.ej. example.com)


domainname es una extensión GNU y no es parte de POSIX.1, por lo que este
campo solamente está disponible en sistemas GNU o cuando se usa GNU
libc.

La función devuelve **[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de posix_uname()**

&lt;?php
$uname=posix_uname();
print_r($uname);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[sysname] =&gt; Linux
[nodename] =&gt; funbox
[release] =&gt; 2.6.20-15-server
[version] =&gt; #2 SMP Sun Apr 15 07:41:34 UTC 2007
[machine] =&gt; i686
)

## Tabla de contenidos

- [posix_access](#function.posix-access) — Determinar la accesibilidad de un archivo
- [posix_ctermid](#function.posix-ctermid) — Obtener el nombre de la ruta del terminal controlador
- [posix_eaccess](#function.posix-eaccess) — Determina la accesibilidad de un fichero
- [posix_errno](#function.posix-errno) — Alias de posix_get_last_error
- [posix_fpathconf](#function.posix-fpathconf) — Devuelve el valor de un límite configurable
- [posix_get_last_error](#function.posix-get-last-error) — Recuperar el número de error establecido por la última función posix que ha fallado
- [posix_getcwd](#function.posix-getcwd) — Nombre de la ruta del directorio actual
- [posix_getegid](#function.posix-getegid) — Devuelve el ID efectivo de grupo del proceso actual
- [posix_geteuid](#function.posix-geteuid) — Devolver el ID efectivo de usuario del proceso actual
- [posix_getgid](#function.posix-getgid) — Devuelve el ID real de grupo del proceso actual
- [posix_getgrgid](#function.posix-getgrgid) — Devolver información sobre un grupo mediante un id de grupo
- [posix_getgrnam](#function.posix-getgrnam) — Devolver información sobre un grupo mediante su nombre
- [posix_getgroups](#function.posix-getgroups) — Devolver el conjunto de grupos del proceso actual
- [posix_getlogin](#function.posix-getlogin) — Devuelve el nombre del inicio de sesión
- [posix_getpgid](#function.posix-getpgid) — Obtener el id del grupo de procesos para un control de trabajo
- [posix_getpgrp](#function.posix-getpgrp) — Devolver el identificador de grupo de proceso actual
- [posix_getpid](#function.posix-getpid) — Devolver el identificador del proceso actual
- [posix_getppid](#function.posix-getppid) — Devolver el identificador del proceso padre
- [posix_getpwnam](#function.posix-getpwnam) — Devolver información sobre un usuario mediante su nombre de usuario
- [posix_getpwuid](#function.posix-getpwuid) — Devolver información sobre un usuario mediante su id de usuario
- [posix_getrlimit](#function.posix-getrlimit) — Devuelve información sobre los límites de recursos del sistema
- [posix_getsid](#function.posix-getsid) — Obtener el sid actual del proceos
- [posix_getuid](#function.posix-getuid) — Devolver el ID real de usuario del proceso actual
- [posix_initgroups](#function.posix-initgroups) — Calcular la lista de acceso al grupo
- [posix_isatty](#function.posix-isatty) — Determina si un puntero de fichero es un terminal interactivo
- [posix_kill](#function.posix-kill) — Enviar una señal a un proceso
- [posix_mkfifo](#function.posix-mkfifo) — Crear un archivo especial fifo (un pipe con nombre)
- [posix_mknod](#function.posix-mknod) — Crear un fichero especial u ordinario (POSIX.1)
- [posix_pathconf](#function.posix-pathconf) — Devuelve el valor de un límite configurable
- [posix_setegid](#function.posix-setegid) — Establecer el GID efectivo del proceso actual
- [posix_seteuid](#function.posix-seteuid) — Establecer el UID efectivo del proceso actual
- [posix_setgid](#function.posix-setgid) — Establecer el GID de proceso actual
- [posix_setpgid](#function.posix-setpgid) — Establecer el id de grupo de procesos para el control de trabajo
- [posix_setrlimit](#function.posix-setrlimit) — Establecer los límites de recursos del sistema
- [posix_setsid](#function.posix-setsid) — Hacer del proceso actual un líder de sesión
- [posix_setuid](#function.posix-setuid) — Establecer el UID del proceso actual
- [posix_strerror](#function.posix-strerror) — Recuperar el mensaje de error del sistema asociado con el errno dado
- [posix_sysconf](#function.posix-sysconf) — Devuelve información sobre el sistema en ejecución
- [posix_times](#function.posix-times) — Obtener los tiempos de procesos
- [posix_ttyname](#function.posix-ttyname) — Devuelve el nombre del dispositivo del terminal
- [posix_uname](#function.posix-uname) — Obtener el nombre del sistema

- [Introducción](#intro.posix)
- [Instalación/Configuración](#posix.setup)<li>[Instalación](#posix.installation)
  </li>- [Constantes predefinidas](#posix.constants)<li>[Constantes posix_access](#posix.constants.access)
- [Constantes posix_mknod](#posix.constants.mknod)
- [Constantes posix_setrlimit](#posix.constants.setrlimit)
- [Constantes de posix_pathconf](#posix.constants.pathconf)
- [Constantes de posix_sysconf](#posix.constants.sysconf)
  </li>- [Funciones POSIX](#ref.posix)<li>[posix_access](#function.posix-access) — Determinar la accesibilidad de un archivo
- [posix_ctermid](#function.posix-ctermid) — Obtener el nombre de la ruta del terminal controlador
- [posix_eaccess](#function.posix-eaccess) — Determina la accesibilidad de un fichero
- [posix_errno](#function.posix-errno) — Alias de posix_get_last_error
- [posix_fpathconf](#function.posix-fpathconf) — Devuelve el valor de un límite configurable
- [posix_get_last_error](#function.posix-get-last-error) — Recuperar el número de error establecido por la última función posix que ha fallado
- [posix_getcwd](#function.posix-getcwd) — Nombre de la ruta del directorio actual
- [posix_getegid](#function.posix-getegid) — Devuelve el ID efectivo de grupo del proceso actual
- [posix_geteuid](#function.posix-geteuid) — Devolver el ID efectivo de usuario del proceso actual
- [posix_getgid](#function.posix-getgid) — Devuelve el ID real de grupo del proceso actual
- [posix_getgrgid](#function.posix-getgrgid) — Devolver información sobre un grupo mediante un id de grupo
- [posix_getgrnam](#function.posix-getgrnam) — Devolver información sobre un grupo mediante su nombre
- [posix_getgroups](#function.posix-getgroups) — Devolver el conjunto de grupos del proceso actual
- [posix_getlogin](#function.posix-getlogin) — Devuelve el nombre del inicio de sesión
- [posix_getpgid](#function.posix-getpgid) — Obtener el id del grupo de procesos para un control de trabajo
- [posix_getpgrp](#function.posix-getpgrp) — Devolver el identificador de grupo de proceso actual
- [posix_getpid](#function.posix-getpid) — Devolver el identificador del proceso actual
- [posix_getppid](#function.posix-getppid) — Devolver el identificador del proceso padre
- [posix_getpwnam](#function.posix-getpwnam) — Devolver información sobre un usuario mediante su nombre de usuario
- [posix_getpwuid](#function.posix-getpwuid) — Devolver información sobre un usuario mediante su id de usuario
- [posix_getrlimit](#function.posix-getrlimit) — Devuelve información sobre los límites de recursos del sistema
- [posix_getsid](#function.posix-getsid) — Obtener el sid actual del proceos
- [posix_getuid](#function.posix-getuid) — Devolver el ID real de usuario del proceso actual
- [posix_initgroups](#function.posix-initgroups) — Calcular la lista de acceso al grupo
- [posix_isatty](#function.posix-isatty) — Determina si un puntero de fichero es un terminal interactivo
- [posix_kill](#function.posix-kill) — Enviar una señal a un proceso
- [posix_mkfifo](#function.posix-mkfifo) — Crear un archivo especial fifo (un pipe con nombre)
- [posix_mknod](#function.posix-mknod) — Crear un fichero especial u ordinario (POSIX.1)
- [posix_pathconf](#function.posix-pathconf) — Devuelve el valor de un límite configurable
- [posix_setegid](#function.posix-setegid) — Establecer el GID efectivo del proceso actual
- [posix_seteuid](#function.posix-seteuid) — Establecer el UID efectivo del proceso actual
- [posix_setgid](#function.posix-setgid) — Establecer el GID de proceso actual
- [posix_setpgid](#function.posix-setpgid) — Establecer el id de grupo de procesos para el control de trabajo
- [posix_setrlimit](#function.posix-setrlimit) — Establecer los límites de recursos del sistema
- [posix_setsid](#function.posix-setsid) — Hacer del proceso actual un líder de sesión
- [posix_setuid](#function.posix-setuid) — Establecer el UID del proceso actual
- [posix_strerror](#function.posix-strerror) — Recuperar el mensaje de error del sistema asociado con el errno dado
- [posix_sysconf](#function.posix-sysconf) — Devuelve información sobre el sistema en ejecución
- [posix_times](#function.posix-times) — Obtener los tiempos de procesos
- [posix_ttyname](#function.posix-ttyname) — Devuelve el nombre del dispositivo del terminal
- [posix_uname](#function.posix-uname) — Obtener el nombre del sistema
  </li>
