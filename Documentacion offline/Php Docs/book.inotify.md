# Inotify

# Introducción

La extensión inotify expone las funciones inotify [inotify_init()](#function.inotify-init),
[inotify_add_watch()](#function.inotify-add-watch) e [inotify_rm_watch()](#function.inotify-rm-watch).

Así como la función [inotify_init()](#function.inotify-init) de C devuelve un file
descriptor, [inotify_init()](#function.inotify-init) de PHP devuelve un recurso de flujo,
que puede ser usado con las funciones de flujo estándar, como
[stream_select()](#function.stream-select), [stream_set_blocking()](#function.stream-set-blocking) y
[fclose()](#function.fclose). [inotify_read()](#function.inotify-read) sustituye la
manera C de leer eventos inotify.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación/Configuración](#inotify.install)
- [Tipos de recursos](#inotify.resources)

    ## Instalación/Configuración

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/inotify](https://pecl.php.net/package/inotify).

    ## Tipos de recursos

    Esta extensión define un flujo de datos, retornado por
    [inotify_init()](#function.inotify-init).

    # Constantes predefinidas

    Estas constantes son definidas por esta
    extensión, y solo están disponibles si esta extensión ha sido compilada con
    PHP, o bien cargada en tiempo de ejecución.

    **Constantes Inotify utilizables con [inotify_add_watch()](#function.inotify-add-watch) y/o devueltos por [inotify_read()](#function.inotify-read)**

         **[IN_ACCESS](#constant.in-access)**
          ([int](#language.types.integer))



          El fichero fue accedido (lectura) (*)





         **[IN_MODIFY](#constant.in-modify)**
          ([int](#language.types.integer))



          El fichero fue modificado (*)





         **[IN_ATTRIB](#constant.in-attrib)**
          ([int](#language.types.integer))



          Metadatos cambiados (por ejemplo: permisos, mtime, etc) (*)





         **[IN_CLOSE_WRITE](#constant.in-close-write)**
          ([int](#language.types.integer))



          El fichero, previamente abierto para escritura, fue cerrado (*)





         **[IN_CLOSE_NOWRITE](#constant.in-close-nowrite)**
          ([int](#language.types.integer))



          El fichero, no abierto para escritura, fue cerrado (*)





         **[IN_OPEN](#constant.in-open)**
          ([int](#language.types.integer))



          El fichero fue abierto (*)





         **[IN_MOVED_TO](#constant.in-moved-to)**
          ([int](#language.types.integer))



          Un fichero fue movido dentro del directorio observado (*)





         **[IN_MOVED_FROM](#constant.in-moved-from)**
          ([int](#language.types.integer))



          Un fichero fue movido fuera del directorio observado (*)





         **[IN_CREATE](#constant.in-create)**
          ([int](#language.types.integer))



          Un fichero o directorio fue creado en el directorio observado (*)





         **[IN_DELETE](#constant.in-delete)**
          ([int](#language.types.integer))



          Fichero o directorio borrado en el directorio observado (*)





         **[IN_DELETE_SELF](#constant.in-delete-self)**
          ([int](#language.types.integer))



          El fichero o directorio observado fue borrado





         **[IN_MOVE_SELF](#constant.in-move-self)**
          ([int](#language.types.integer))



          El fichero o directorio observado fue movido





         **[IN_CLOSE](#constant.in-close)**
          ([int](#language.types.integer))



          Similar a IN_CLOSE_WRITE | IN_CLOSE_NOWRITE





         **[IN_MOVE](#constant.in-move)**
          ([int](#language.types.integer))



          Similar a IN_MOVED_FROM | IN_MOVED_TO





         **[IN_ALL_EVENTS](#constant.in-all-events)**
          ([int](#language.types.integer))



          Máscara de bits de todas las constantes anteriores





         **[IN_UNMOUNT](#constant.in-unmount)**
          ([int](#language.types.integer))



          Sistema de ficheros que contiene objetos observados fue desmontado





         **[IN_Q_OVERFLOW](#constant.in-q-overflow)**
          ([int](#language.types.integer))



          Cola de eventos desbordada (wd es -1 para este evento)





         **[IN_IGNORED](#constant.in-ignored)**
          ([int](#language.types.integer))



          Seguimiento borrado (explicitamente indicado por [inotify_rm_watch()](#function.inotify-rm-watch)
          o debido a que el fichero fue eliminado o el sistema de ficheros desmontado)





         **[IN_ISDIR](#constant.in-isdir)**
          ([int](#language.types.integer))



          El sujeto del evento es un directorio





         **[IN_ONLYDIR](#constant.in-onlydir)**
          ([int](#language.types.integer))



          Observar la ruta solamente si se trata de un directorio (A partir de Linux 2.6.15)





         **[IN_DONT_FOLLOW](#constant.in-dont-follow)**
          ([int](#language.types.integer))



          No eliminar la ruta de referencia si es un enlace simbólico (A partir de Linux 2.6.15).





         **[IN_MASK_ADD](#constant.in-mask-add)**
          ([int](#language.types.integer))



          Agregar eventos para observar la máscara de esta ruta de acceso si ya existe
          (en lugar de reemplazar la máscara).





         **[IN_ONESHOT](#constant.in-oneshot)**
          ([int](#language.types.integer))



          Monitorea una ruta para un evento, a continuación elimina de la lista de
          vigilancia.


    **Nota**:

        Los eventos más arriba marcados con un asterisco (*) pueden producirse para
        ficheros en directorios observados.

# Funciones Inotify

# inotify_add_watch

(PECL inotify &gt;= 0.1.2)

inotify_add_watch — Añade un punto de vigilancia a una instancia inotify

### Descripción

**inotify_add_watch**([resource](#language.types.resource) $inotify_instance, [string](#language.types.string) $pathname, [int](#language.types.integer) $mask): [int](#language.types.integer)|[false](#language.types.singleton)

**inotify_add_watch()** añade un punto de vigilancia
a una instancia inotify o modifica un punto de vigilancia en curso
hacia un nuevo fichero o directorio especificado por la ruta
pathname.

Utilizar **inotify_add_watch()** sobre un objeto ya en vigilancia
modifica la configuración. Utilizar la constante **[IN_MASK_ADD](#constant.in-mask-add)**
añade los eventos (operación OR lógica).

### Parámetros

     inotify_instance


       Recurso retornado por

[inotify_init()](#function.inotify-init)

     pathname


       Fichero o directorio a vigilar.






     mask


       Eventos a vigilar. Véase
       [Constantes predefinidas](#inotify.constants).





### Valores devueltos

El valor devuelto es un puntero inotify único (inotify instance wide),
o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [inotify_init()](#function.inotify-init) - Inicializa una instancia inotify

# inotify_init

(PECL inotify &gt;= 0.1.2)

inotify_init — Inicializa una instancia inotify

### Descripción

**inotify_init**(): [resource](#language.types.resource)|[false](#language.types.singleton)

Inicializa una instancia inotify para ser utilizada con la función
[inotify_add_watch()](#function.inotify-add-watch)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un flujo o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de utilización de inotify**

&lt;?php
// Crea una instancia inotify
$fd = inotify_init();

// Vigila las modificaciones de los metadatos del fichero **FILE** (e.g. mtime)
$watch_descriptor = inotify_add_watch($fd, **FILE**, IN_ATTRIB);

// Genera un evento
touch(**FILE**);

// Lee los eventos
$events = inotify_read($fd);
print_r($events);

// Los métodos siguientes permiten utilizar las funciones inotify sin bloquear sobre inotify_read():

// - Utilizar stream_select() sobre $fd:
$read = array($fd);
$write = null;
$except = null;
stream_select($read,$write,$except,0);

// - Utilizar stream_set_blocking() sobre $fd
stream_set_blocking($fd, 0);
inotify_read($fd); // No bloquea, y devuelve false si no hay eventos pendientes

// - Utilizar inotify_queue_len() para verificar el tamaño de la cola
$queue_len = inotify_queue_len($fd); // Si &gt; 0, inotify_read() no bloqueará

// Detener la vigilancia de **FILE**
inotify_rm_watch($fd, $watch_descriptor);

// Destrucción de la instancia inotify
// Esto habría detenido todas las vigilancias si no se hubiera hecho ya
fclose($fd);

?&gt;

    Resultado del ejemplo anterior es similar a:

array(
array(
'wd' =&gt; 1, // Igual al $watch_descriptor
'mask' =&gt; 4, // El bit IN_ATTRIB está activado
'cookie' =&gt; 0, // Identificador único para vincular eventos (e.g.
// IN_MOVE_FROM y IN_MOVE_TO)
'name' =&gt; '', // El nombre del fichero (e.g. si un directorio estaba bajo vigilancia)
),
);

### Ver también

    - [inotify_add_watch()](#function.inotify-add-watch) - Añade un punto de vigilancia a una instancia inotify

    - [inotify_rm_watch()](#function.inotify-rm-watch) - Elimina un seguimiento existente de una instancia inotify

    - [inotify_queue_len()](#function.inotify-queue-len) - Devuelve un número superior a cero si hay eventos pendientes

    - [inotify_read()](#function.inotify-read) - Lee eventos de una instancia inotify

    - [fclose()](#function.fclose) - Cierra un fichero

# inotify_queue_len

(PECL inotify &gt;= 0.1.2)

inotify_queue_len — Devuelve un número superior a cero si hay eventos pendientes

### Descripción

**inotify_queue_len**([resource](#language.types.resource) $inotify_instance): [int](#language.types.integer)

Esta función permite saber si [inotify_read()](#function.inotify-read) bloqueará o no.
Si un número superior a cero es devuelto, hay eventos pendientes e
[inotify_read()](#function.inotify-read) no bloqueará.

### Parámetros

     inotify_instance


       Recurso retornado por

[inotify_init()](#function.inotify-init)

### Valores devueltos

Devuelve un número superior a cero si hay eventos pendientes.

### Ver también

    - [inotify_init()](#function.inotify-init) - Inicializa una instancia inotify

    - [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

# inotify_read

(PECL inotify &gt;= 0.1.2)

inotify_read — Lee eventos de una instancia inotify

### Descripción

**inotify_read**([resource](#language.types.resource) $inotify_instance): [array](#language.types.array)

Leer eventos inotify de una instancia inotify.

### Parámetros

     inotify_instance


       Recurso retornado por

[inotify_init()](#function.inotify-init)

### Valores devueltos

Un array de eventos inotify o **[false](#constant.false)** si no hay eventos pendientes e
inotify_instance no es de bloqueo. Cada evento es un array con las siguientes claves:

    - wd es un descriptor de seguimiento devuelto por
     [inotify_add_watch()](#function.inotify-add-watch)

    - mask es una máscara de bits de
     [eventos](#inotify.constants)

    - cookie es un identificador único para conectar los eventos
     relacionados (por ejemplo: **[IN_MOVE_FROM](#constant.in-move-from)** e
     **[IN_MOVE_TO](#constant.in-move-to)**)

    - name es el nombre de un fichero (por ejemplo: si un fichero se ha modificado en un directorio observado)

### Ver también

    - [inotify_init()](#function.inotify-init) - Inicializa una instancia inotify

    - [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

    - [inotify_queue_len()](#function.inotify-queue-len) - Devuelve un número superior a cero si hay eventos pendientes

# inotify_rm_watch

(PECL inotify &gt;= 0.1.2)

inotify_rm_watch — Elimina un seguimiento existente de una instancia inotify

### Descripción

**inotify_rm_watch**([resource](#language.types.resource) $inotify_instance, [int](#language.types.integer) $watch_descriptor): [bool](#language.types.boolean)

**inotify_rm_watch()** elimina el seguimiento
watch_descriptor de la instancia inotify
inotify_instance.

### Parámetros

     inotify_instance


       Recurso retornado por

[inotify_init()](#function.inotify-init)

     watch_descriptor


       Seguimiento a eliminar de la instancia





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [inotify_init()](#function.inotify-init) - Inicializa una instancia inotify

## Tabla de contenidos

- [inotify_add_watch](#function.inotify-add-watch) — Añade un punto de vigilancia a una instancia inotify
- [inotify_init](#function.inotify-init) — Inicializa una instancia inotify
- [inotify_queue_len](#function.inotify-queue-len) — Devuelve un número superior a cero si hay eventos pendientes
- [inotify_read](#function.inotify-read) — Lee eventos de una instancia inotify
- [inotify_rm_watch](#function.inotify-rm-watch) — Elimina un seguimiento existente de una instancia inotify

- [Introducción](#intro.inotify)
- [Instalación/Configuración](#inotify.setup)<li>[Instalación/Configuración](#inotify.install)
- [Tipos de recursos](#inotify.resources)
  </li>- [Constantes predefinidas](#inotify.constants)
- [Funciones Inotify](#ref.inotify)<li>[inotify_add_watch](#function.inotify-add-watch) — Añade un punto de vigilancia a una instancia inotify
- [inotify_init](#function.inotify-init) — Inicializa una instancia inotify
- [inotify_queue_len](#function.inotify-queue-len) — Devuelve un número superior a cero si hay eventos pendientes
- [inotify_read](#function.inotify-read) — Lee eventos de una instancia inotify
- [inotify_rm_watch](#function.inotify-rm-watch) — Elimina un seguimiento existente de una instancia inotify
  </li>
