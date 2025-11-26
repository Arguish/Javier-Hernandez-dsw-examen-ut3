# Eio

# Introducción

Esta extensión proporciona E/S POSIX asíncrona a través de
la biblioteca de C [» libeio](http://software.schmorp.de/pkg/libeio.html)
escrita por Marc Lehmann.

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

**Advertencia**

     Es importante tener en cuenta que cada solicitud se ejecuta en un hilo, y el
     orden de ejecución continua de peticiones en cola es basicamente
     impredecible. Por ejemplo, el siguiente trozo de código es incorrecto.






    **Ejemplo #1 Incorrect requests**


    &lt;?php

// Petición para crear un enlace simbólico de $nombre_archivo a $enlace
eio_symlink($nombre_archivo, $enlace);

// Petición para mover $nombre_archivo a $nuevo_nombre_archivo
eio_rename($nombre_archivo, $nuevo_nombre_archivo);

// Procesar las peticiones
eio_event_loop();
?&gt;

En el ejemplo de arriba la petición [eio_rename()](#function.eio-rename) puede finalizar
antes que [eio_symlink()](#function.eio-symlink). Para corregirlo se podría llamar a [eio_rename()](#function.eio-rename)
en la llamada de retorno de [eio_symlink()](#function.eio-symlink):

    **Ejemplo #2 Llamar a una petición desde una llamada de retorno de petición**


    &lt;?php

function mi_enlace_simbólico_hecho($nombre_archivo, $resultado) {
 // Petición para mover $nombre_archivo a $nuevo_nombre_archivo
 eio_rename($nombre_archivo, "/ruta/a/nuevo-nombre");

// Procesar las peticiones
eio_event_loop();
}

// Petición para crear un enlace simbólico de $nombre_archivo a $enlace
eio_symlink($nombre_archivo, $enlace, EIO_PRI_DEFAULT, "mi_enlace_simbólico_hecho", $nombre_archivo);

// Procesar las peticiones
eio_event_loop();
?&gt;

Alternativamente, podría querer crear un grupo de peticiones:

    **Ejemplo #3 Llamar a una petición desde una llamada de retorno de petición**


    &lt;?php

/_ Se llama cuando el grupo de peticiones está hecho _/
function mi_grupo_hecho($data, $resultado) {
// ...
}

function mi_enlace_simbólico_hecho($nombre_archivo, $resultado) {
 // Crear una petición eio_rename y añadirla al grupo
 $petición = eio_rename($nombre_archivo, "/ruta/a/nuevo-nombre");
eio_grp_add($grupo, $petición);
// Podría querer añadir más peticiones...
}

// Crear un grupo de peticiones
$grupo = eio_grp("mi_grupo_hecho", "mis_datos_de_grupo");

// Crear una petición eio_symlink y añadirla al grupo
// Pasar $nombre_archivo a la llamada de retorno
$petición = eio_symlink($nombre_archivo, $enlace,
  EIO_PRI_DEFAULT, "mi_enlace_simbólico_hecho", $nombre_archivo);
eio_grp_add($grupo, $petición);

// Procesar las peticiones
eio_event_loop();
?&gt;

El grupo es un tipo especial de peticion que podría acumular un conjunto de peticiones
_eio_ regulares. Se podría usar para crear una petición
compleja para abrir, leer y cerrar un fichero.

Desde la versión 0.3.0 alfa, una variable usada internamete en las comunicaciones con
libeio, podía ser recuperada con
[eio_get_event_stream()](#function.eio-get-event-stream). La variable se podría usar
para vincularse a un bucle de eventos soportado por alguna otra extensión. Se podría
organizar un sencillo bucle de eventos donde eio y libevent trabajaran juntos:

    **Ejemplo #4 Usar eio con libevent**


    &lt;?php

function mi_eio_poll($df, $eventos, $argumentos) {
/_ Algunas regulaciones de libevent podrían ir aquí .. _/
if (eio_nreqs()) {
eio_poll();
}
/_ .. y aquí _/
}

function mi_res_cb($d, $r) {
    var_dump($r); var_dump($d);
}

$base = event_base_new();
$evento = event_new();

// Este flujo se usa para vincularse con libevent
$df = eio_get_event_stream();

eio*nop(EIO_PRI_DEFAULT, "mi_res_cb", "nop data");
eio_mkdir("/tmp/abc-eio-temp", 0750, EIO_PRI_DEFAULT, "mi_res_cb", "mkdir data");
/\* algunas llamadas eio*_ aquí ... _/

// establecer las banderas del evento
event_set($evento, $df, EV_READ /*| EV_PERSIST*/, "mi_eio_poll", array($evento, $base));

// Establecer la base del evento
event_base_set($evento, $base);

// habilitar el evento
event_add($evento);

// iniciar el bucle de eventos
event_base_loop($base);

/_ Lo mismo estará disponible mediante interfaz libevent con buffer _/
?&gt;

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#eio.requirements)
- [Instalación](#eio.installation)
- [Tipos de recursos](#eio.resources)

    ## Requerimientos

    Esta extensión contiene la biblioteca
    [» libeio](http://software.schmorp.de/pkg/libeio.html). Asimismo, no es necesario
    instalarla por separado.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/eio](https://pecl.php.net/package/eio).

Para información sobre la instalación manual,
lea el fichero INSTALL incluido en el paquete.

## Tipos de recursos

Existen dos tipos de recursos en esta extensión: las peticiones y los grupos de peticiones.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Constantes de prioridad de petición:

     **[EIO_PRI_MIN](#constant.eio-pri-min)**
     ([int](#language.types.integer))



      Prioridad de petición mínima





     **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**
     ([int](#language.types.integer))



      Prioridad de petición predeterminada





     **[EIO_PRI_MAX](#constant.eio-pri-max)**
     ([int](#language.types.integer))



      Prioridad de petición máxima


El argumento whence de [eio_seek()](#function.eio-seek):

     **[EIO_SEEK_SET](#constant.eio-seek-set)**
     ([int](#language.types.integer))



      El índice es establecido para espcificar el número de bytes (offset).





     **[EIO_SEEK_CUR](#constant.eio-seek-cur)**
     ([int](#language.types.integer))



      El índice es establecido a su ubicación actual más offset bytes.





     **[EIO_SEEK_END](#constant.eio-seek-end)**
     ([int](#language.types.integer))



      El índice es establecido a el tamaño del fichero más offset bytes.


Banderas usadas con [eio_readdir()](#function.eio-readdir):

     **[EIO_READDIR_DENTS](#constant.eio-readdir-dents)**
     ([int](#language.types.integer))



      Bandera [eio_readdir()](#function.eio-readdir). Si se especifica, el argumento resultante de la llamada de retorno
      se convierte en un array con las siguientes claves:
      'names' - array de nombres de directorios
      'dents' - array de structura eio_dirent-como
      los arrays pero teniendo las siguientes claves:
      'name' - el nombre del directorio;
      'type' - una de las constantes
      *EIO_DT_**;
      'inode' - el número de inodo, si está disponible, de otro modo
      sin especificar;





     **[EIO_READDIR_DIRS_FIRST](#constant.eio-readdir-dirs-first)**
     ([int](#language.types.integer))



      Cuando se especifica esta bandera, los nombres serán devueltos en un orden
      donde probablemente los directorios vallan primero, en un orden de estadísticas óptimo.





     **[EIO_READDIR_STAT_ORDER](#constant.eio-readdir-stat-order)**
     ([int](#language.types.integer))



      Cuando se especifica esta bandera, los nombres serán devueltos en un orden
      apropiado para realizar estadísticas (stat) con cada uno. Cuando se planea usar
      la función [stat()](#function.stat) para realizar estadísticas de todos los archivos del directorio dado, el
      orden devuelto probablemente sea
      más rápido.





     **[EIO_READDIR_FOUND_UNKNOWN](#constant.eio-readdir-found-unknown)**
     ([int](#language.types.integer))












     **[EIO_DT_UNKNOWN](#constant.eio-dt-unknown)**
     ([int](#language.types.integer))



      Tipo de nodo desconocido(muy común). Se necistan más estadísticas ([stat()](#function.stat)).





     **[EIO_DT_FIFO](#constant.eio-dt-fifo)**
     ([int](#language.types.integer))



      Tipo de nodo FIFO





     **[EIO_DT_CHR](#constant.eio-dt-chr)**
     ([int](#language.types.integer))



      Tipo de nodo





     **[EIO_DT_MPC](#constant.eio-dt-mpc)**
     ([int](#language.types.integer))



      Tipo de nodo de dispositivo de caracteres multiplexado (v7+coherent)





     **[EIO_DT_DIR](#constant.eio-dt-dir)**
     ([int](#language.types.integer))



      Tipo de nodo de directorio





     **[EIO_DT_NAM](#constant.eio-dt-nam)**
     ([int](#language.types.integer))



      Tipo de nodo de fichero Xenix nominado especial





     **[EIO_DT_BLK](#constant.eio-dt-blk)**
     ([int](#language.types.integer))



      Tipo de nodo





     **[EIO_DT_MPB](#constant.eio-dt-mpb)**
     ([int](#language.types.integer))



      Dispositivo de bloqueo multiplexado (v7+coherent)





     **[EIO_DT_REG](#constant.eio-dt-reg)**
     ([int](#language.types.integer))



      Tipo de nodo





     **[EIO_DT_NWK](#constant.eio-dt-nwk)**
     ([int](#language.types.integer))








     **[EIO_DT_CMP](#constant.eio-dt-cmp)**
     ([int](#language.types.integer))



      Tipo de noto especial de red HP-UX





     **[EIO_DT_LNK](#constant.eio-dt-lnk)**
     ([int](#language.types.integer))



      Tipo de nodo de vínculo





     **[EIO_DT_SOCK](#constant.eio-dt-sock)**
     ([int](#language.types.integer))



      Tipo de nodo socket





     **[EIO_DT_DOOR](#constant.eio-dt-door)**
     ([int](#language.types.integer))



      Tipo de nodo de puerta de Solaris





     **[EIO_DT_WHT](#constant.eio-dt-wht)**
     ([int](#language.types.integer))



      Tipo de nodo





     **[EIO_DT_MAX](#constant.eio-dt-max)**
     ([int](#language.types.integer))



      Valor de tipo de nodo más alto


Modo de acceso para el argumento flags de
[eio_open()](#function.eio-open):

     **[EIO_O_RDONLY](#constant.eio-o-rdonly)**
     ([int](#language.types.integer))








     **[EIO_O_WRONLY](#constant.eio-o-wronly)**
     ([int](#language.types.integer))








     **[EIO_O_RDWR](#constant.eio-o-rdwr)**
     ([int](#language.types.integer))








     **[EIO_O_NONBLOCK](#constant.eio-o-nonblock)**
     ([int](#language.types.integer))








     **[EIO_O_APPEND](#constant.eio-o-append)**
     ([int](#language.types.integer))








     **[EIO_O_CREAT](#constant.eio-o-creat)**
     ([int](#language.types.integer))








     **[EIO_O_TRUNC](#constant.eio-o-trunc)**
     ([int](#language.types.integer))








     **[EIO_O_EXCL](#constant.eio-o-excl)**
     ([int](#language.types.integer))








     **[EIO_O_FSYNC](#constant.eio-o-fsync)**
     ([int](#language.types.integer))





Banderas del argumento mode de [eio_open()](#function.eio-open):

     **[EIO_S_IRUSR](#constant.eio-s-irusr)**
     ([int](#language.types.integer))








     **[EIO_S_IWUSR](#constant.eio-s-iwusr)**
     ([int](#language.types.integer))








     **[EIO_S_IXUSR](#constant.eio-s-ixusr)**
     ([int](#language.types.integer))








     **[EIO_S_IRGRP](#constant.eio-s-irgrp)**
     ([int](#language.types.integer))








     **[EIO_S_IWGRP](#constant.eio-s-iwgrp)**
     ([int](#language.types.integer))








     **[EIO_S_IXGRP](#constant.eio-s-ixgrp)**
     ([int](#language.types.integer))








     **[EIO_S_IROTH](#constant.eio-s-iroth)**
     ([int](#language.types.integer))








     **[EIO_S_IWOTH](#constant.eio-s-iwoth)**
     ([int](#language.types.integer))








     **[EIO_S_IXOTH](#constant.eio-s-ixoth)**
     ([int](#language.types.integer))








     **[EIO_S_IFREG](#constant.eio-s-ifreg)**
     ([int](#language.types.integer))








     **[EIO_S_IFCHR](#constant.eio-s-ifchr)**
     ([int](#language.types.integer))








     **[EIO_S_IFBLK](#constant.eio-s-ifblk)**
     ([int](#language.types.integer))








     **[EIO_S_IFIFO](#constant.eio-s-ififo)**
     ([int](#language.types.integer))








     **[EIO_S_IFSOCK](#constant.eio-s-ifsock)**
     ([int](#language.types.integer))





Banderas de [eio_sync_file_range()](#function.eio-sync-file-range):

     **[EIO_SYNC_FILE_RANGE_WAIT_BEFORE](#constant.eio-sync-file-range-wait-before)**
     ([int](#language.types.integer))








     **[EIO_SYNC_FILE_RANGE_WRITE](#constant.eio-sync-file-range-write)**
     ([int](#language.types.integer))








     **[EIO_SYNC_FILE_RANGE_WAIT_AFTER](#constant.eio-sync-file-range-wait-after)**
     ([int](#language.types.integer))





Banderas de [eio_fallocate()](#function.eio-fallocate):

     **[EIO_FALLOC_FL_KEEP_SIZE](#constant.eio-falloc-fl-keep-size)**
     ([int](#language.types.integer))





**Nota**:

Las constantes *EIO_S_I\*\* tienen el mismo significado que sus
homónimos *S_I\*\* de POSIX.

**Nota**:

*EIO*SYNC_FILE*\*\*tienen el mismo significado que sus
homónimos *SYNC*FILE*\*\*\*.

**Nota**:

*EIO*O*\*\*tienen el mismo significado que sus
homónimos *O\_\*\*de POSIX.

# Ejemplos

**Ejemplo #1 Cancelar una petición**

&lt;?php
/_ Es llamada cuando finaliza eio_nop() _/
function mi_llamada_retorno_nop($datos, $resultado) {
echo "mi_nop ", $datos, "\n";
}

// Esta llamada a eio_nop() será cancelada
$petición = eio_nop(EIO_PRI_DEFAULT, "mi_llamada_retorno_nop", "1");
var_dump($petición);
eio_cancel($petición);

// Esta vez eio_nop() será procesada
eio_nop(EIO_PRI_DEFAULT, "mi_llamada_retorno_nop", "2");

// Process requests
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

resource(4) of type (EIO Request Descriptor)
mi_nop 2

**Ejemplo #2 Llamar a [eio_chmod()](#function.eio-chmod)**

&lt;?php
$nombre_fichero_temp = dirname(__FILE__) ."eio-fichero-temp.tmp";
touch($nombre_fichero_temp);

/_ Es llamada cuando finaliza eio_chmod() _/
function mi_llamada_retorno_chmod($datos, $resultado) {
global $nombre_fichero_temp;

    if ($resultado == 0 &amp;&amp; !is_readable($nombre_fichero_temp) &amp;&amp; is_writable($nombre_fichero_temp)) {
        echo "eio_chmod_ok";
    }

    @unlink($nombre_fichero_temp);

}

eio_chmod($nombre_fichero_temp, 0200, EIO_PRI_DEFAULT, "mi_llamada_retorno_chmod");
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

eio_chmod_ok

**Ejemplo #3 Realizar una petición personalizada**

&lt;?php
/_ Llamada de retorno para la llamada de retorno personalizada _/
function mi_llamada_retorno_personalizada($datos, $resultado) {
    var_dump($datos);
var_dump(count($resultado));
    var_dump($resultado['data_modified']);
var_dump($resultado['result']);
}

/_ La petición personalizada _/
function mi_personalizada($datos) {
    var_dump($datos);

    $resultado = array(
        'result'        =&gt; 1001,
        'data_modified' =&gt; "mis datos personalizados",
    );

    return $resultado;

}

$datos = "mis_datos_personalizados";
$petición = eio_custom("mi_personalizada", EIO_PRI_DEFAULT, "mi_llamada_retorno_personalizada", $datos);
var_dump($petición);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

resource(4) of type (EIO Request Descriptor)
string(24) "mis_datos_personalizados"
string(24) "mis_datos_personalizados"
int(2)
string(24) "mis datos personalizados"
int(1001)

**Ejemplo #4 Agrupar peticiones**

&lt;?php
/\*

- Crear un grupo de peticiones para abrir, leer y cerrar un fichero
  \*/

$nombre_fichero_temp = dirname(__FILE__) ."/eio-file.tmp";
$fp = fopen($nombre_fichero_temp, "w");
fwrite($fp, "algunos datos");
fclose($fp);

/_ Es llamada cuando el grupo de peticiones está hecho _/
function mi_grupo_hecho($datos, $resultado) {
 global $nombre_fichero_temp;
 var_dump($resultado == 0);
@unlink($nombre_fichero_temp);
}

/_ Es llamada cuando eio_open() termina _/
function mi_grupo_llamada_retorno_fichero_abierto($datos, $resultado) {
global $mi_df_fichero, $grupo;

$mi_df_fichero = $resultado;

var_dump($resultado &gt; 0);

// Crear una petición eio_read() y añadirla al grupo
$petición = eio_read($mi_df_fichero, 4, 0, EIO_PRI_DEFAULT, "mi_grupo_llamada_retorno_fichero_leído");
eio_grp_add($grupo, $petición);
}

/_ Is called when eio_read() done _/
function mi_grupo_llamada_retorno_fichero_leído($datos, $resultado) {
global $mi_df_fichero, $grupo;

var_dump($resultado);

// Crear una petición eio_close() y añadirla al grupo
$petición = eio_close($mi_df_fichero);
eio_grp_add($grupo, $petición);
}

$grupo = eio_grp("mi_grupo_hecho", "mis_datos_grupo");

// Crear una petición eio_open() y añadirla al grupo
$petición = eio_open($nombre_fichero_temp, EIO_O_RDWR | EIO_O_APPEND , NULL,
EIO_PRI_DEFAULT, "mi_grupo_llamada_retorno_fichero_abierto", NULL);
eio_grp_add($grupo, $petición);
var_dump($grupo);

eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

resource(6) of type (EIO Group Descriptor)
bool(true)
string(7) "algunos"
bool(true)

**Ejemplo #5 Emplear eio con la extensión libevent**

&lt;?php
function mi_eio_poll($df, $eventos, $argumentos) {
/_ Algunas regulaciones de libevent podrían ir aquí .. _/
if (eio_nreqs()) {
eio_poll();
}
/_ .. y aquí _/
}

function mi_llamada_retorno_nop($d, $r) {
    var_dump($r); var_dump($d);
}

$base = event_base_new();
$evento = event_new();

$df = eio_get_event_stream();
var_dump($df);

eio*nop(EIO_PRI_DEFAULT, "mi_llamada_retorno_nop", "nop data");
eio_mkdir("/tmp/abc-eio-temp", 0750, EIO_PRI_DEFAULT, "mi_llamada_retorno_nop", "nop data");
/\* algunas llamadas eio*_ aquí ... _/

// establecer las banderas del evento
event_set($evento, $df, EV_READ /*| EV_PERSIST*/, "my_eio_poll", array($evento, $base));

// Establecer la base del evento
event_base_set($evento, $base);

// habilitar el evento
event_add($evento);

// iniciar el bucle de eventos
event_base_loop($base);

/_ Lo mismo estará disponible mediante interfaz libevent con buffer _/
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)
int(0)
string(8) "nop data"
int(0)
string(10) "mkdir data"

**Ejemplo #6 Emplear eio con la extensión event**

&lt;?php
$base = new EventBase();

// Recuperar el flujo de sondeo de eio.
// Observe, esta variable debería permanecer viva mientras se ejecute el bucle.
$eio_stream = eio_get_event_stream();

// Vincular el flujo de sondeo de eio al bucle de evento.
$poll_event = new Event($base, $eio_stream, Event::READ, function () {
  if (eio_nreqs()) {
    eio_poll();
  }
});
$poll_event-&gt;add();

// Añadir trabajos de eio
eio_nop(EIO_PRI_DEFAULT, function () {
echo "eio_nop\n";
});

// Añadir eventos
$timer = Event::timer($base, function () {
echo "2 segundos transcurridos\n";
});
$timer-&gt;add(2);

// Despachar eventos.
$base-&gt;dispatch();
?&gt;

Resultado del ejemplo anterior es similar a:

eio_nop
2 segundos transcurridos

# Funciones Eio

# eio_busy

(PECL eio &gt;= 0.0.1dev)

eio_busy — Incrementar artificialmente la carga. Podría ser útil en pruebas,
evaluaciones comparativas

### Descripción

**eio_busy**(
    [int](#language.types.integer) $delay,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_busy()** incrementa artificialmente la carga tomanto
delay segundos para ejecutarse. Puede usarse para depuración,
o evaluaciones comparativas.

### Parámetros

    delay


      Retraso en segundos






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback


      Esta llamada de retorno se llama cuando está hecho todo el grupo de peticiones.






    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_busy()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_nop()](#function.eio-nop) - No hace nada, sólo recorre el ciclo de peticiones entero

# eio_cancel

(PECL eio &gt;= 0.0.1dev)

eio_cancel — Cancelar una petición

### Descripción

**eio_cancel**([resource](#language.types.resource) $req): [void](language.types.void.html)

**eio_cancel()** cancela una petición especificada por
req

### Parámetros

    req


      E rescurso de petición






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_cancel()**

&lt;?php
/_ Es llamada cuando eio_nop() finaliza _/
function mi_llamada_retorno_nop($datos, $resultado) {
echo "mi_nop ", $datos, "\n";
}

// Esta llamada a eio_nop() será cancelada
$petición = eio_nop(EIO_PRI_DEFAULT, "mi_llamada_retorno_nop", "1");
var_dump($petición);
eio_cancel($petición);

// Esta vez eio_nop() será procesada
eio_nop(EIO_PRI_DEFAULT, "mi_llamada_retorno_nop", "2");

// Procesar las peticiones
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

resource(4) of type (EIO Request Descriptor)
mi_nop 2

### Ver también

- [eio_grp_cancel()](#function.eio-grp-cancel) - Cancelar un grupo de peticiones

# eio_chmod

(PECL eio &gt;= 0.0.1dev)

eio_chmod — Cambiar los permisos de fichero/directorio

### Descripción

**eio_chmod**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $mode,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_chmod()** cambia los permisos de un fichero o directorio. Los
nuevos permisos son especificados mediandte mode.

### Parámetros

    path


      La ruta al fichero o directorio objetivo


**Advertencia**Evitar los
caminos relativos.

    mode


      Los nuevos permisos. P.ej. 0644.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_chmod()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_chown()](#function.eio-chown) - Cambiar los permisos de un fichero/directorio

# eio_chown

(PECL eio &gt;= 0.0.1dev)

eio_chown — Cambiar los permisos de un fichero/directorio

### Descripción

**eio_chown**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $uid,
    [int](#language.types.integer) $gid = -1,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

Cambia los permisos de un fichero o directorio.

### Parámetros

    path


      La ruta al fichero o directorio.


**Advertencia**Evitar los
caminos relativos.

    uid


      El ID de usuario. Se ignora si es aigual a -1.






    gid


      El ID de grupo. Se ignora si es aigual a -1.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_chown()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_chmod()](#function.eio-chmod) - Cambiar los permisos de fichero/directorio

# eio_close

(PECL eio &gt;= 0.0.1dev)

eio_close — Cerrar un fichero

### Descripción

**eio_close**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_close()** cierra el fichero especificado por
fd.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_close()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_open()](#function.eio-open) - Abre un fichero

# eio_custom

(PECL eio &gt;= 0.0.1dev)

eio*custom — Ejecutar una petición personalizada como cualquier otra llamada \*eio*\*\*

### Descripción

**eio_custom**(
    [callable](#language.types.callable) $execute,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_custom()** ejecuta una función personalizada especificada por
execute procesándola igual que cualquier otra llamada \*eio\_\*\*.

### Parámetros

    execute


      Especifica la función de petición que debería coincidir con el siguiente prototipo:




      mixed execute(mixed data);


      callback es una llamada de retorno de finalización de evento que debería coincidir con el siguiente
      prototipo:

      void callback(mixed data, mixed result);



      data son los datos pasados a
      execute mediante el argumento data
      sin modificaciones
      result valor devuelto por execute




    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_custom()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_custom()**

&lt;?php
/_ Llamada de retorno para la llamada de retorno personalizada _/
function mi_llamada_retorno_personalizada($datos, $resultado) {
    var_dump($datos);
var_dump(count($resultado));
    var_dump($resultado['datos_modificados']);
var_dump($resultado['resultado']);
}

/_ La petición personalizada _/
function mi_personalizada($datos) {
    var_dump($datos);

    $resultado = array(
        'resultado'         =&gt; 1001,
        'datos_modificados' =&gt; "mis datos personalizados",
    );

    return $resultado;

}

$datos = "mis_datos_personalizados";
$petición = eio_custom("mi_personalizada", EIO_PRI_DEFAULT, "mi_llamada_retorno_personalizada", $datos);
var_dump($petición);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

resource(4) of type (EIO Request Descriptor)
string(24) "mis_datos_personalizados"
string(24) "mis_datos_personalizados"
int(2)
string(24) "mis datos personalizados"
int(1001)

# eio_dup2

(PECL eio &gt;= 0.0.1dev)

eio_dup2 — Duplicar un descriptor de fichero

### Descripción

**eio_dup2**(
    [mixed](#language.types.mixed) $fd,
    [mixed](#language.types.mixed) $fd2,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_dup2()** duplica un descriptor de fichero.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor de fichero numérico origen






    fd2


      Un flujo, un recurso Socket, o un descriptor de fichero numérico objetivo






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_dup2()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_event_loop

(PECL eio &gt;= 0.0.1dev)

eio_event_loop — Monitorizar libeio hasta que todas las peticiones sean procesadas

### Descripción

**eio_event_loop**(): [bool](#language.types.boolean)

**eio_event_loop()** monitoriza libeio hasta que todas las peticiones sean procesadas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_event_loop()** devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_event_loop()**

&lt;?php
$nombre_fichero_temp = "fichero-temp-eio.tmp";
touch($nombre_fichero_temp);

/_ Es llamada cuando eio_chmod() finaliza _/
function mi_llamada_retorno_chmod($datos, $resultado) {
global $nombre_fichero_temp;

    if ($resultado == 0 &amp;&amp; !is_readable($nombre_fichero_temp) &amp;&amp; is_writable($nombre_fichero_temp)) {
        echo "eio_chmod_ok";
    }

    @unlink($nombre_fichero_temp);

}

eio_chmod($nombre_fichero_temp, 0200, EIO_PRI_DEFAULT, "mi_llamada_retorno_chmod");
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

eio_chmod_ok

### Ver también

- [eio_poll()](#function.eio-poll) - Puede ser llamada siempre que existan peticiones pendientes que necesitan ser finalizadas

# eio_fallocate

(PECL eio &gt;= 0.0.1dev)

eio_fallocate — Permitir al llamador manipular directamente el espacio de disco
asignado a un fichero

### Descripción

**eio_fallocate**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $mode,
    [int](#language.types.integer) $offset,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_fallocate()** permite al llamador manipular directamente el espacio de disco asignado al
fichero especificado por el descriptor de fichero fd para el rango de bytes
empezando por offset y continuando
length bytes.

**Nota**:
**El fichero debería abrirse para lectura**

Se debería usar _OR_ entre
**[EIO_O_CREAT](#constant.eio-o-creat)** y
**[EIO_O_WRONLY](#constant.eio-o-wronly)** o **[EIO_O_RDWR](#constant.eio-o-rdwr)**

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero, p.ej., devuelto por [eio_open()](#function.eio-open).






    mode

     Actualmente sólo está soportada una bandera para el modo:
      **[EIO_FALLOC_FL_KEEP_SIZE](#constant.eio-falloc-fl-keep-size)** (lo mismo que la constante POSIX
      **[FALLOC_FL_KEEP_SIZE](#constant.falloc-fl-keep-size)**).






    offset


      Especifica el inicio del rango de bytes.






    length


      Especifica la longitud del rango de bytes.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_fallocate()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_fchmod

(PECL eio &gt;= 0.0.1dev)

eio_fchmod — Cambiar los permisos de un fichero

### Descripción

**eio_fchmod**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $mode,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_fchmod()** cambia los permisos del fichero especificado
por el descriptor de fichero fd.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero, p.ej., devuelto por [eio_open()](#function.eio-open).






    mode


      Los nuevos permisos. P.ej. 0644.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_fchmod()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_fchown()](#function.eio-fchown) - Cambiar el propietario del fichero

# eio_fchown

(PECL eio &gt;= 0.0.1dev)

eio_fchown — Cambiar el propietario del fichero

### Descripción

**eio_fchown**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $uid,
    [int](#language.types.integer) $gid = -1,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_fchown()** cambia el propietario del fichero especificado por
el descriptor de fichero fd.

### Valores devueltos

[eio_fdatasync()](#function.eio-fdatasync) devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    uid


      El ID de ususario. Se ignora si es igual a -1.






    gid


      El ID de grupo. Se ignora si es igual a -1.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Ver también

- [eio_fchmod()](#function.eio-fchmod) - Cambiar los permisos de un fichero

# eio_fdatasync

(PECL eio &gt;= 0.0.1dev)

eio_fdatasync — Sincronizar el estado de ficheros que están en memoria con un dispositivo de almacenamiento

### Descripción

**eio_fdatasync**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_fdatasync()** sincroniza el estado de ficheros que están en memoria con un dispositivo de almacenamiento.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero, p.ej., devuelto por [eio_open()](#function.eio-open).






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_fdatasync()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_fstat

(PECL eio &gt;= 0.0.1dev)

eio_fstat — Obtener el estado de un fichero

### Descripción

**eio_fstat**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = ?
): [resource](#language.types.resource)

**eio_fstat()** devuelve la información del estado de un fichero en
el argumento result de callback

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

[eio_busy()](#function.eio-busy) devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de [eio_lstat()](#function.eio-lstat)**

&lt;?php
// Create temporary file
$nombre_fichero_temp = dirname(__FILE__) ."/fichero-eio.tmp";
touch($nombre_fichero_temp);

/_ Se llama cuando eio_fstat() termina _/
function my_res_cb($datos, $resultado) {
 // Debería imprimir un array con la información de las estadísticas
 var_dump($resultado);

if ($datos['fd']) {
  // Cerrar el fichero temporal
  eio_close($datos['fd']);
eio_event_loop();
}
// Eliminar el fichero temporal
@unlink($datos['file']);
}

/_ Se llama cuando eio_open() termina _/
function my_open_cb($datos, $resultado) {
 // Preparar los datos para la llamada de retorno
 $d = array(
  'fd'  =&gt; $resultado,
  'file'=&gt; $datos
 );
 // Solicitar la información de las estadísticas
 eio_fstat($resultado, EIO_PRI_DEFAULT, "my_res_cb", $d);
// Procesar la/s petición/es
eio_event_loop();
}

// Abrir el fichero temporal
eio_open($nombre_fichero_temp, EIO_O_RDONLY, NULL, EIO_PRI_DEFAULT,
"my_open_cb", $nombre_fichero_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

array(12) {
["st_dev"]=&gt;
int(2050)
["st_ino"]=&gt;
int(2489159)
["st_mode"]=&gt;
int(33188)
["st_nlink"]=&gt;
int(1)
["st_uid"]=&gt;
int(1000)
["st_gid"]=&gt;
int(100)
["st_rdev"]=&gt;
int(0)
["st_blksize"]=&gt;
int(4096)
["st_blocks"]=&gt;
int(0)
["st_atime"]=&gt;
int(1318239506)
["st_mtime"]=&gt;
int(1318239506)
["st_ctime"]=&gt;
int(1318239506)
}

### Ver también

- [eio_lstat()](#function.eio-lstat) - Obtener el estado de un fichero

- [eio_stat()](#function.eio-stat) - Obtener el estado de un fichero

# eio_fstatvfs

(PECL eio &gt;= 0.0.1dev)

eio_fstatvfs — Obtener las estadísticas del sistema de ficheros

### Descripción

**eio_fstatvfs**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = ?
): [resource](#language.types.resource)

**eio_fstatvfs()** devuelve las estadísticas del sistema de ficheros en
el parámetro result de callback.

### Parámetros

    fd


      Un descriptor de fichero de un fichero del sistema de ficheros abierto.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_fstatvfs()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_statvfs()](#function.eio-statvfs) - Obtener las estadísticas del sistema de ficheros

# eio_fsync

(PECL eio &gt;= 0.0.1dev)

eio_fsync — Sincronizar el estado de un fichero en memoria con un dispositivo de almacenamiento

### Descripción

**eio_fsync**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

Sincroniza el estado de un fichero en memoria con un dispositivo de almacenamiento

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_fsync()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_sync()](#function.eio-sync) - Consignar el caché de buffer cache al disco

# eio_ftruncate

(PECL eio &gt;= 0.0.1dev)

eio_ftruncate — Truncar un fichero

### Descripción

**eio_ftruncate**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $offset = 0,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_ftruncate()** hace que un fichero regular referenciado por
el descriptor de fichero fd sea truncado a exactamente
length bytes.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    offset


      Índice desde el principio del fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_ftruncate()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_truncate()](#function.eio-truncate) - Truncar un fichero

# eio_futime

(PECL eio &gt;= 0.0.1dev)

eio_futime — Cambiar los momentos de último y acceso y modificación de un fichero

### Descripción

**eio_futime**(
    [mixed](#language.types.mixed) $fd,
    [float](#language.types.float) $atime,
    [float](#language.types.float) $mtime,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_futime()** cambia los momentos de último acceso y modificación de un
fichero.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero, p.ej., devuelto por [eio_open()](#function.eio-open).






    atime


      Momento de acceso






    mtime


      Momento de modificación






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_futime()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_utime()](#function.eio-utime) - Cambiar los momentos de último y acceso y modificación de un fichero

# eio_get_event_stream

(PECL eio &gt;= 0.3.1b)

eio_get_event_stream — Obtiene un flujo que representa una variable usada en comnunicaciones internas con libeio

### Descripción

**eio_get_event_stream**(): [mixed](#language.types.mixed)

**eio_get_event_stream()** adquiere un flujo que representa una
variable usada en comunicaciones internas con libeio. Se podría usar para vinculaciones
con algún bucle de eventos proporcionado por otra extensión PECL, por ejemplo
libevent.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_get_event_stream()** devuelve un flujo en caso de éxito;
de otro modo devuelve **[null](#constant.null)**

### Ejemplos

**Ejemplo #1 Usar eio con libevent**

&lt;?php
function mi_eio_poll($df, $eventos, $argumento) {
/_ Algunas regulaciones de libevent podrían ir aquí .. _/
if (eio_nreqs()) {
eio_poll();
}
/_ .. y aquí _/
}

function my_res_cb($d, $r) {
    var_dump($r); var_dump($d);
}

$base = event_base_new();
$evento = event_new();

$df = eio_get_event_stream();
var_dump($df);

eio*nop(EIO_PRI_DEFAULT, "my_res_cb", "nop data");
eio_mkdir("/tmp/abc-eio-temp", 0750, EIO_PRI_DEFAULT, "my_res_cb", "mkdir data");
/\* algunas llamadas eio*_ aquí ... _/

// establecer la banderas del evento
event_set($evento, $df, EV_READ /*| EV_PERSIST*/, "mi_eio_poll", array($evento, $base));

// establecer la base del evento
event_base_set($evento, $base);

// habilitar el evento
event_add($evento);

// iniciar el bucle de eventos
event_base_loop($base);

/_ Lo mismo estará disponible mediante interfaz libevent con buffer _/
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)
int(0)
string(8) "nop data"
int(0)
string(10) "mkdir data"

# eio_get_last_error

(PECL eio &gt;= 1.0.0)

eio_get_last_error — Retorna un string describiendo el último error asociado con el recurso solicitado

### Descripción

**eio_get_last_error**([resource](#language.types.resource) $req): [string](#language.types.string)

**eio_get_last_error()** retorna un string describiendo el último error asociado con el argumento
req.

### Parámetros

    req


      El recurso solicitado.


### Valores devueltos

**eio_get_last_error()** retorna un string describiendo el último error con el recurso solicitado
especificado por el argumento req.

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# eio_grp

(PECL eio &gt;= 0.0.1dev)

eio_grp — Crear un grupo de peticiones

### Descripción

**eio_grp**([callable](#language.types.callable) $callback, [string](#language.types.string) $data = NULL): [resource](#language.types.resource)

**eio_grp()** crea un grupo de peticiones.

### Parámetros

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_grp()** devuelve un recurso de grupo de peticiones en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_grp()**

&lt;?php
$nombre_fichero_temp = dirname(__FILE__) ."/fichero-eio.tmp";
$fp = fopen($nombre_fichero_temp, "w");
fwrite($fp, "algunos datos");
fclose($fp);
$mi_df_fichero = NULL;

/_ Es llamada cuando el grupo de peticiones está hecho _/
function mi_grupo_hecho($datos, $resultado) {
 // Eliminar el fichero, si aún existe
 @unlink($datos);
}

/_ Es llamada al abrir el fichero temporal _/
function mi_llamada_retorno_grupo_fichero_abierto($datos, $resultado) {
global $mi_df_fichero, $grupo;

$mi_df_fichero = $resultado;

$petición = eio_read($mi_df_fichero, 4, 0,
EIO_PRI_DEFAULT, "mi_llamada_retorno_grupo_fichero_leído");
eio_grp_add($grupo, $petición);
}

/_ Es llamada cuando el fichero es leído _/
function mi_llamada_retorno_grupo_fichero_leído($datos, $resultado) {
global $mi_df_fichero, $grupo;

var_dump($resultado);

// Crear una petición para cerrar el fichero
$petición = eio_close($mi_df_fichero);

// Añadir la petición al grupo
eio_grp_add($grupo, $petición);
}

// Crear un grupo de peticiones
$grupo = eio_grp("mi_grupo_hecho", $nombre_fichero_temp);

// Crear una petición
$petición = eio_open($nombre_fichero_temp, EIO_O_RDWR | EIO_O_APPEND , NULL,
EIO_PRI_DEFAULT, "mi_llamada_retorno_grupo_fichero_abierto", NULL);

// Añadir la petición al grupo
eio_grp_add($grupo, $petición);

// Procesar las peticiones
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

string(7) "algunos"

### Ver también

- [eio_grp_cancel()](#function.eio-grp-cancel) - Cancelar un grupo de peticiones

- [eio_grp_add()](#function.eio-grp-add) - Añadir una petición al grupo de peticiones

# eio_grp_add

(PECL eio &gt;= 0.0.1dev)

eio_grp_add — Añadir una petición al grupo de peticiones

### Descripción

**eio_grp_add**([resource](#language.types.resource) $grp, [resource](#language.types.resource) $req): [void](language.types.void.html)

**eio_grp_add()** añade una petición al grupo de peticiones.

### Parámetros

    grp


      El recurso de grupo de peticiones devuelto por [eio_grp()](#function.eio-grp)






    req


      El recurso de petición


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Agrupar peticiones**

&lt;?php
/\*

- Crear un grupo de peticiones para abrir, leer y cerrar un fichero
  \*/

// Crear un fichero temporal y escribir algunos bytes en él
$nombre_fichero_temp = dirname(__FILE__) ."/fichero-eio.tmp";
$fp = fopen($nombre_fichero_temp, "w");
fwrite($fp, "algunos datos");
fclose($fp);

/_ Es llamada cuando el grupo de peticiones está hecho _/
function mi_grupo_hecho($datos, $resultado) {
 var_dump($resultado == 0);
@unlink($datos);
}

/_ Es llamada cuando eio_open() termina _/
function mi_llamada_retorno_fichero_abierto($datos, $resultado) {
global $grupo;

// $resultado debería contener el descriptor del fichero
 var_dump($resultado &gt; 0);

// Crear una petición eio_read() y añadirla al grupo
// Pasar el descriptor del fichero a la llamada de retorno
$petición = eio_read($resultado, 4, 0,
EIO_PRI_DEFAULT, "mi_llamada_retorno_grupo_fichero_leído", $resultado);
 eio_grp_add($grupo, $petición);
}

/_ Es llamada cuando eio_read() termina _/
function mi_llamada_retorno_grupo_fichero_leído($datos, $resultado) {
global $grupo;

// Leer bytes
var_dump($resultado);

// Crear una petición eio_close() y añadirla al grupo
// $datos debería contener el descriptor del fichero
 $petición = eio_close($datos);
eio_grp_add($grupo, $petición);
}

// Crear un grupo de peticiones
$grupo = eio_grp("mi_grupo_hecho", $nombre_fichero_temp);
var_dump($grupo);

// Crear una petición eio_open() y añadirla al grupo
$petición = eio_open($nombre_fichero_temp, EIO_O_RDWR | EIO_O_APPEND , NULL,
EIO_PRI_DEFAULT, "mi_llamada_retorno_fichero_abierto", NULL);
eio_grp_add($grupo, $petición);

// Procesar las peticiones
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

resource(6) of type (EIO Group Descriptor)
bool(true)
string(7) "algunos"
bool(true)

### Ver también

- [eio_grp()](#function.eio-grp) - Crear un grupo de peticiones

- [eio_grp_cancel()](#function.eio-grp-cancel) - Cancelar un grupo de peticiones

- [eio_grp_limit()](#function.eio-grp-limit) - Establecer el límite de un grupo

# eio_grp_cancel

(PECL eio &gt;= 0.0.1dev)

eio_grp_cancel — Cancelar un grupo de peticiones

### Descripción

**eio_grp_cancel**([resource](#language.types.resource) $grp): [void](language.types.void.html)

**eio_grp_cancel()** cancela un grupo de peticiones especificadas por
el recurso de grupo de peticiones grp.

### Parámetros

    grp


      El recurso de grupo de peticiones devuelto por [eio_grp()](#function.eio-grp).


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [eio_grp()](#function.eio-grp) - Crear un grupo de peticiones

- [eio_grp_add()](#function.eio-grp-add) - Añadir una petición al grupo de peticiones

# eio_grp_limit

(PECL eio &gt;= 0.0.1dev)

eio_grp_limit — Establecer el límite de un grupo

### Descripción

**eio_grp_limit**([resource](#language.types.resource) $grp, [int](#language.types.integer) $limit): [void](language.types.void.html)

Número límite de peticiones en un grupo de peticiones.

### Parámetros

    grp


      El recurso de grupo de peticiones.






    limit


      El número de peticiones del grupo.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [eio_grp_add()](#function.eio-grp-add) - Añadir una petición al grupo de peticiones

# eio_init

(PECL eio = 1.0.0)

eio_init — (Re-)inicializa Eio

### Descripción

**eio_init**(): [void](language.types.void.html)

**eio_init()** (re-)inicializa Eio. Asigna memoria para estructuras internas de libeio y Eio. Se puede llamar a **eio_init()** antes de usar las funciones de Eio. De otro modo, será invocada internamente la primera vez que se invoque a una función de Eio en un proceso.

**Nota**:

    Esta función fue eliminada en la versión 3.0.0RC1 de la extensión eio para PHP versión 8 y superiores.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# eio_link

(PECL eio &gt;= 0.0.1dev)

eio_link — Crear un enlace duro par un fichero

### Descripción

**eio_link**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $new_path,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_link()** crea el enlace duro dado por
new_path para un fichero especificado por
path.

### Parámetros

    path


      La ruta del fichero origen.






    new_path


      La ruta del fichero destino.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de eio_link()**

&lt;?php
$nombre_fichero = dirname(__FILE__)."/symlink.dat";
touch($nombre_fichero);
$enlace = dirname(__FILE__)."/symlink.link";
$enlace_duro = dirname(**FILE**)."/hardlink.link";

function mi_llamada_retorno_hardlink($datos, $resultado) {
    global $enlace, $nombre_fichero;
    var_dump(file_exists($datos) &amp;&amp; !is_link($datos));
    @unlink($datos);

    eio_symlink($nombre_fichero, $enlace, EIO_PRI_DEFAULT, "mi_llamada_retorno_symlink", $enlace);

}

function mi_llamada_retorno_symlink($datos, $resultado) {
    global $enlace, $nombre_fichero;
    var_dump(file_exists($data) &amp;&amp; is_link($datos));

    if (!eio_readlink($datos, EIO_PRI_DEFAULT, "mi_llamada_retorno_readlink", NULL)) {
        @unlink($enlace);
        @unlink($nombre_fichero);
    }

}

function mi_llamada_retorno_readlink($datos, $resultado) {
    global $nombre_fichero, $enlace;
    var_dump($resultado);

    @unlink($enlace);
    @unlink($nombre_fichero);

}

eio_link($nombre_fichero, $enlace_duro, EIO_PRI_DEFAULT, "mi_llamada_retorno_hardlink", $enlace_duro);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
string(%d) "%ssymlink.dat"

### Ver también

- [eio_symlink()](#function.eio-symlink) - Crear un enlace simbólico

# eio_lstat

(PECL eio &gt;= 0.0.1dev)

eio_lstat — Obtener el estado de un fichero

### Descripción

**eio_lstat**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_lstat()** devuelve la información del estado de un fichero en
el argumento result de callback

### Parámetros

    path


      La ruta de archivo






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_lstat()** devuelve un recurso de petición en caso de éxito o **[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_lstat()**

&lt;?php
$nombre_fichero_temp = dirname(__FILE__). "/fichero-eio.tmp";
touch($nombre_fichero_temp);

function my_res_cb($datos, $resultado) {
    var_dump($datos);
var_dump($resultado);
}

function my_open_cb($datos, $resultado) {
    eio_close($resultado);
eio_event_loop();

    @unlink($datos);

}

eio_lstat($nombre_fichero_temp, EIO_PRI_DEFAULT, "my_res_cb", "eio_lstat");
eio_open($nombre_fichero_temp, EIO_O_RDONLY, NULL,
EIO_PRI_DEFAULT, "my_open_cb", $nombre_fichero_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

string(9) "eio_lstat"
array(12) {
["st_dev"]=&gt;
int(2050)
["st_ino"]=&gt;
int(2099197)
["st_mode"]=&gt;
int(33188)
["st_nlink"]=&gt;
int(1)
["st_uid"]=&gt;
int(1000)
["st_gid"]=&gt;
int(100)
["st_rdev"]=&gt;
int(0)
["st_blksize"]=&gt;
int(4096)
["st_blocks"]=&gt;
int(0)
["st_atime"]=&gt;
int(1318235777)
["st_mtime"]=&gt;
int(1318235777)
["st_ctime"]=&gt;
int(1318235777)
}

### Ver también

- [eio_stat()](#function.eio-stat) - Obtener el estado de un fichero

- [eio_fstat()](#function.eio-fstat) - Obtener el estado de un fichero

# eio_mkdir

(PECL eio &gt;= 0.0.1dev)

eio_mkdir — Crear un directorio

### Descripción

**eio_mkdir**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $mode,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_mkdir()** crea un directorio con el acceso especificado por
mode.

### Parámetros

    path


      La ruta del nuevo directorio.






    mode


      Modo de acceso, p.ej. 0755






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_mkdir()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_mkdir()**

&lt;?php
$nombre_directorio_temp = "dir-tmp-eio";

/_ Es llamada cuando eio_mkdir() finaliza _/
function mi_llamada_retorno_mkdir($datos, $resultado) {
 if ($resultado == 0 &amp;&amp; is_dir($nombre_directorio_temp)
   &amp;&amp; !is_readable($nombre_directorio_temp)
&amp;&amp; is_writable($nombre_directorio_temp)) {
echo "eio_mkdir_ok";
}

// Eliminar el directorio
if (file_exists($datos))
        rmdir($nombre_directorio_temp);
}

// Crear un directorio con modo de acceso 0300
eio_mkdir($nombre_directorio_temp, 0300, EIO_PRI_DEFAULT, "mi_llamada_retorno_mkdir", $nombre_directorio_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

eio_mkdir_ok

### Ver también

- [eio_rmdir()](#function.eio-rmdir) - Eliminar un directorio

# eio_mknod

(PECL eio &gt;= 0.0.1dev)

eio_mknod — Crear un fichero especial u ordinario

### Descripción

**eio_mknod**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $mode,
    [int](#language.types.integer) $dev,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_mknod()** crea un fichero ordinario o especial (a menudo).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    path


      Ruta del nuevo nodo (fichero).






    mode


      Especifica tanto los permisos a usar como el tipo de nodo a ser
      creado. Debería ser una combinación (usando el operador OR) de uno de los
      tipos de fichero listados abajo y los permisos para el nuevo nodo (p.ej. 0640).

      Los tipos de ficheros posibles son: **[EIO_S_IFREG](#constant.eio-s-ifreg)** (fichero regular),
      **[EIO_S_IFCHR](#constant.eio-s-ifchr)** (fichero de carácter),
      **[EIO_S_IFBLK](#constant.eio-s-ifblk)** (fichero especial de bloqueo),
      **[EIO_S_IFIFO](#constant.eio-s-ififo)** (FIFO - tubería nominada) y
      **[EIO_S_IFSOCK](#constant.eio-s-ifsock)** (socket de dominio UNIX).

      Para especificar permisos se podrían usar constantes
      *EIO_S_I**.






    dev


      Si el tipo de fichero es **[EIO_S_IFCHR](#constant.eio-s-ifchr)** o
      **[EIO_S_IFBLK](#constant.eio-s-ifblk)**, dev especifica el número mayor y
      menor del recién creado fichero especial de dispositivo. De otro modo
      dev es ignorado. Véase *la página del manual mknod(2) para
      más detalles*.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_mknod()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_mknod()**

&lt;?php
// Nombre FIFO
$nombre_fichero_temp = "/tmp/eio-temp-fifo";

/_ Se llama cuando eio_mknod() finaliza _/
function mi_llamada_retorno_mknod($datos, $resultado) {
    $s = stat($datos);
var_dump($s);

    if ($resultado == 0) {
        echo "eio_mknod_ok";
    }

    @unlink($datos);

}

eio_mknod($nombre_fichero_temp, EIO_S_IFIFO, 0,
EIO_PRI_DEFAULT, "mi_llamada_retorno_mknod", $nombre_fichero_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

array(26) {
[0]=&gt;
int(17)
[1]=&gt;
int(2337608)
[2]=&gt;
int(4096)
[3]=&gt;
int(1)
[4]=&gt;
int(1000)
[5]=&gt;
int(100)
[6]=&gt;
int(0)
[7]=&gt;
int(0)
[8]=&gt;
int(1318241261)
[9]=&gt;
int(1318241261)
[10]=&gt;
int(1318241261)
[11]=&gt;
int(4096)
[12]=&gt;
int(0)
["dev"]=&gt;
int(17)
["ino"]=&gt;
int(2337608)
["mode"]=&gt;
int(4096)
["nlink"]=&gt;
int(1)
["uid"]=&gt;
int(1000)
["gid"]=&gt;
int(100)
["rdev"]=&gt;
int(0)
["size"]=&gt;
int(0)
["atime"]=&gt;
int(1318241261)
["mtime"]=&gt;
int(1318241261)
["ctime"]=&gt;
int(1318241261)
["blksize"]=&gt;
int(4096)
["blocks"]=&gt;
int(0)
}
eio_mknod_ok

### Ver también

- [eio_open()](#function.eio-open) - Abre un fichero

# eio_nop

(PECL eio &gt;= 0.0.1dev)

eio_nop — No hace nada, sólo recorre el ciclo de peticiones entero

### Descripción

**eio_nop**([int](#language.types.integer) $pri = EIO_PRI_DEFAULT, [callable](#language.types.callable) $callback = NULL, [mixed](#language.types.mixed) $data = NULL): [resource](#language.types.resource)

**eio_nop()** no hace nada, sólo recorre el ciclo de
peticiones entero. Podría ser util al depurar.

### Parámetros

    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_nop()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_busy()](#function.eio-busy) - Incrementar artificialmente la carga. Podría ser útil en pruebas,
  evaluaciones comparativas

# eio_npending

(PECL eio &gt;= 0.0.1dev)

eio_npending — Devolver el número de peticiones, excepto las no manejadas

### Descripción

**eio_npending**(): [int](#language.types.integer)

**eio_npending()** devuelve el número de peticiones, excepto las no manejadas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_npending()** devuelve el número de peticiones, excepto las
no manejadas.

### Ver también

- [eio_nreqs()](#function.eio-nreqs) - Devuelve el número de peticiones a ser procesadas

- [eio_nready()](#function.eio-nready) - Devolver el número de peticiones aún no tratadas

- [eio_nthreads()](#function.eio-nthreads) - Devuelve el número de hilos actualmente en uso

# eio_nready

(PECL eio &gt;= 0.0.1dev)

eio_nready — Devolver el número de peticiones aún no tratadas

### Descripción

**eio_nready**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_nready()** devuelve el número de peticiones aún no tratadas

### Ver también

- [eio_nreqs()](#function.eio-nreqs) - Devuelve el número de peticiones a ser procesadas

- **eio_nready()**

- [eio_nthreads()](#function.eio-nthreads) - Devuelve el número de hilos actualmente en uso

# eio_nreqs

(PECL eio &gt;= 0.0.1dev)

eio_nreqs — Devuelve el número de peticiones a ser procesadas

### Descripción

**eio_nreqs**(): [int](#language.types.integer)

**eio_nreqs()** se podría llamar en un bucle personalizado al llamar a
[eio_poll()](#function.eio-poll).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_nreqs()** devuelve el número de peticiones a ser procesadas.

### Ejemplos

**Ejemplo #1 Ejepmlo de eio_nreqs()**

&lt;?php
function res_cb($datos, $resultado) {
    var_dump($datos);
var_dump($resultado);
}

eio_nop(EIO_PRI_DEFAULT, "res_cb", "1");
eio_nop(EIO_PRI_DEFAULT, "res_cb", "2");
eio_nop(EIO_PRI_DEFAULT, "res_cb", "3");

while (eio_nreqs()) {
eio_poll();
}
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "1"
int(0)
string(1) "3"
int(0)
string(1) "2"
int(0)

### Ver también

- [eio_poll()](#function.eio-poll) - Puede ser llamada siempre que existan peticiones pendientes que necesitan ser finalizadas

- [eio_nready()](#function.eio-nready) - Devolver el número de peticiones aún no tratadas

# eio_nthreads

(PECL eio &gt;= 0.0.1dev)

eio_nthreads — Devuelve el número de hilos actualmente en uso

### Descripción

**eio_nthreads**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_nthreads()** devuelve el número de hilos actualmente en
uso.

### Ver también

- [eio_npending()](#function.eio-npending) - Devolver el número de peticiones, excepto las no manejadas

- [eio_nready()](#function.eio-nready) - Devolver el número de peticiones aún no tratadas

- [eio_nreqs()](#function.eio-nreqs) - Devuelve el número de peticiones a ser procesadas

- [eio_set_max_idle()](#function.eio-set-max-idle) - Establecer el número máximo de hilos parados

- [eio_set_max_parallel()](#function.eio-set-max-parallel) - Esteblecer el máximo de hilos paralelos

- [eio_set_min_parallel()](#function.eio-set-min-parallel) - Esteblecer el número de hilos paralelos mínimo

# eio_open

(PECL eio &gt;= 0.0.1dev)

eio_open — Abre un fichero

### Descripción

**eio_open**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $flags,
    [int](#language.types.integer) $mode,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_open()** abre un fichero especificado por el argumento
path con el modo de acceso especificado por
el argumento mode.

### Parámetros

    path


      Ruta hacia el fichero a abrir.


**Advertencia**

        Con algunas APIs (i.e. *PHP-FPM*), la llamada
        puede fallar si no se especifica la ruta completa.








    flags


      Una constante entre las constantes *EIO_O_**,
      o bien una combinación de estas constantes. Las constantes
      *EIO_O_** tienen el mismo significado que las
      constantes correspondientes *O_** definidas en
      el archivo de encabezados C fnctl.h. Por omisión, vale
      **[EIO_O_RDWR](#constant.eio-o-rdwr)**.






    mode


      Una constante entre las constantes *EIO_S_I**, o bien
      una combinación de estas constantes (vía el operador OR).
      Las constantes tienen el mismo significado que las constantes correspondientes
      *S_I** definidas en el archivo de encabezados C [» sys/stat.h](http://pubs.opengroup.org/onlinepubs/9699919799/basedefs/sys_stat.h.html).
      Requerido si se crea un fichero. De lo contrario, será ignorado.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variables arbitrarias a pasar a la función de devolución de llamada
      callback.


### Valores devueltos

**eio_open()** devuelve un descriptor de fichero
en el argumento result de la función de
devolución de llamada callback en caso de éxito;
de lo contrario, result valdrá **[-1](#constant.-1)**.

### Ejemplos

**Ejemplo #1 Ejemplo con eio_open()**

&lt;?php
$temp_filename = "eio-temp-file.tmp";

/_ Será llamado cuando la función eio_close() haya terminado _/
function my_close_cb($data, $result) {
 // Cero indica una ejecución con éxito
    var_dump($result == 0);
@unlink($data);
}

/_ Será llamado cuando la función eio_open() haya terminado _/
function my_file_opened_callback($data, $result) {
 // $result debe contener el descriptor de fichero
    var_dump($result &gt; 0);

    if ($result &gt; 0) {

// Cierra el fichero
eio_close($result, EIO_PRI_DEFAULT, "my_close_cb", $data);
eio_event_loop();
}
}

// Crea un nuevo fichero para lectura y escritura
// No permite a grupos y otros hacer nada con este fichero
eio_open($temp_filename, EIO_O_CREAT | EIO_O_RDWR, EIO_S_IRUSR | EIO_S_IWUSR,
EIO_PRI_DEFAULT, "my_file_opened_callback", $temp_filename);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)

### Ver también

- [eio_mknod()](#function.eio-mknod) - Crear un fichero especial u ordinario

# eio_poll

(PECL eio &gt;= 0.0.1dev)

eio_poll — Puede ser llamada siempre que existan peticiones pendientes que necesitan ser finalizadas

### Descripción

**eio_poll**(): [int](#language.types.integer)

**eio_poll()** se puede usar para implementar un bucle de eventos especial.
Para esto, podria usarse [eio_nreqs()](#function.eio-nreqs) para comprobar si existen
peticiones no procesadas.

**Nota**:

Aplicable solamente al implementar bucles de eventos del espacio de usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Si cualquier invocación a una petición devuelve un valor distinto de cero, devuelve ese valor.
De otro modo devuelve 0.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_poll()**

&lt;?php
function res_cb($datos, $resultado) {
    var_dump($datos);
var_dump($resultado);
}

eio_nop(EIO_PRI_DEFAULT, "res_cb", "1");
eio_nop(EIO_PRI_DEFAULT, "res_cb", "2");
eio_nop(EIO_PRI_DEFAULT, "res_cb", "3");

while (eio_nreqs()) {
// Algún IPC específico más o menos
eio_poll();
}
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "1"
int(0)
string(1) "3"
int(0)
string(1) "2"
int(0)

### Ver también

- [eio_nreqs()](#function.eio-nreqs) - Devuelve el número de peticiones a ser procesadas

# eio_read

(PECL eio &gt;= 0.0.1dev)

eio_read — Leer de un descriptor de fichero en un índice dado

### Descripción

**eio_read**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $offset,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_read()** lee hasta length
bytes desde el descriptor de fichero fd empezando en
offset. Los bytes leídos son almacenados en el
argumento result de callback.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    length


      El número máximo de bytes a leer.






    offset


      El índice dentro del fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_read()** almacena los bytes leídos en el
argumento result de la función
callback.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_read()**

&lt;?php
// Abrir un fichero temporal y escribir algunos bytes en él
$nombre_fichero_temp = "eio-temp-file.tmp";
$fp = fopen($nombre_fichero_temp, "w");
fwrite($fp, "1234567890");
fclose($fp);

/_ Es llamada cuando eio_read() termina _/
function mi_llamada_retorno_read($datos, $resultado) {
global $nombre_fichero_temp;

// Imprimir los bytes leídos
var_dump($resultado);

// Cerrar el fichero
eio_close($datos);
eio_event_loop();

// Eliminar el fichero temporal
@unlink($nombre_fichero_temp);
}

/_ Es llamada cuanco eio_open() termina _/
function mi_llamada_retorno_fichero abierto($datos, $resultado) {
 // $resultado debería contener el descriptor del fichero
    if ($resultado &gt; 0) {
// Leer 5 bytes empezando desde el tercero
eio_read($resultado, 5, 2, EIO_PRI_DEFAULT, "mi_llamada_retorno_read", $resultado);
        eio_event_loop();
    } else {
  // eio_open() falló
        unlink($datos);
}
}

// Abrir el fichero para leer y escribir
eio_open($nombre_fichero_temp, EIO_O_RDWR, NULL,
EIO_PRI_DEFAULT, "mi_llamada_retorno_fichero abierto", $nombre_fichero_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

string(5) "34567"

### Ver también

- [eio_open()](#function.eio-open) - Abre un fichero

- [eio_write()](#function.eio-write) - Escribir en un fichero

- [eio_close()](#function.eio-close) - Cerrar un fichero

- [eio_event_loop()](#function.eio-event-loop) - Monitorizar libeio hasta que todas las peticiones sean procesadas

# eio_readahead

(PECL eio &gt;= 0.0.1dev)

eio_readahead — Perform file readahead into page cache

### Descripción

**eio_readahead**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $offset,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_readahead()** rellena la caché de página con información de un fichero, por lo que lecturas posteriores de
ese fichero no bloquearán la E/S del disco. Véase la página del manual READAHEAD(2) para más detalles.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero.






    offset


      El punto de inicio desde el cual se va a leer la información.






    length


      El número de bytes a leer.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_readahead()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_readdir

(PECL eio &gt;= 0.0.1dev)

eio_readdir — Leer un directorio al completo

### Descripción

**eio_readdir**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $flags,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [string](#language.types.string) $data = NULL
): [resource](#language.types.resource)

     Leer un directorio al completo (mediante las llamadas al sistema de opendir,
     readdir y closedir) y devuelve o los nombres o un array en
     el argumento result de la función callback,
     dependiendo del argumento flags.








     ### Parámetros



       path


         La ruta del directorio.






       flags


         Una combinación de constantes *EIO_READDIR_**.






       pri

        La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

       callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









       data


         Variable arbitraria pasada a callback.










     ### Valores devueltos


      **eio_readdir()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.
      Establece el argumento result de
      la función callback function según
      el parámetro flags:












         **[EIO_READDIR_DENTS](#constant.eio-readdir-dents)**
         ([int](#language.types.integer))



          Bandera **eio_readdir()**. Si se especifica, el argumento resultante de la llamada de retorno
          se convierte en un array con las siguientes claves:
          'names' - array de nombres de directorios
          'dents' - array de structura eio_dirent-como
          los arrays pero teniendo las siguientes claves:
          'name' - el nombre del directorio;
          'type' - una de las constantes
          *EIO_DT_**;
          'inode' - el número de inodo, si está disponible, de otro modo
          sin especificar;





         **[EIO_READDIR_DIRS_FIRST](#constant.eio-readdir-dirs-first)**
         ([int](#language.types.integer))



          Cuando se especifica esta bandera, los nombres serán devueltos en un orden
          donde probablemente los directorios vallan primero, en un orden de estadísticas óptimo.





         **[EIO_READDIR_STAT_ORDER](#constant.eio-readdir-stat-order)**
         ([int](#language.types.integer))



          Cuando se especifica esta bandera, los nombres serán devueltos en un orden
          apropiado para realizar estadísticas (stat) con cada uno. Cuando se planea usar
          la función [stat()](#function.stat) para realizar estadísticas de todos los archivos del directorio dado, el
          orden devuelto probablemente sea
          más rápido.





         **[EIO_READDIR_FOUND_UNKNOWN](#constant.eio-readdir-found-unknown)**
         ([int](#language.types.integer))












     Tipos de nodos:







         **[EIO_DT_UNKNOWN](#constant.eio-dt-unknown)**
         ([int](#language.types.integer))



          Tipo de nodo desconocido(muy común). Se necistan más estadísticas ([stat()](#function.stat)).





         **[EIO_DT_FIFO](#constant.eio-dt-fifo)**
         ([int](#language.types.integer))



          Tipo de nodo FIFO





         **[EIO_DT_CHR](#constant.eio-dt-chr)**
         ([int](#language.types.integer))



          Tipo de nodo





         **[EIO_DT_MPC](#constant.eio-dt-mpc)**
         ([int](#language.types.integer))



          Tipo de nodo de dispositivo de caracteres multiplexado (v7+coherent)





         **[EIO_DT_DIR](#constant.eio-dt-dir)**
         ([int](#language.types.integer))



          Tipo de nodo de directorio





         **[EIO_DT_NAM](#constant.eio-dt-nam)**
         ([int](#language.types.integer))



          Tipo de nodo de fichero Xenix nominado especial





         **[EIO_DT_BLK](#constant.eio-dt-blk)**
         ([int](#language.types.integer))



          Tipo de nodo





         **[EIO_DT_MPB](#constant.eio-dt-mpb)**
         ([int](#language.types.integer))



          Dispositivo de bloqueo multiplexado (v7+coherent)





         **[EIO_DT_REG](#constant.eio-dt-reg)**
         ([int](#language.types.integer))



          Tipo de nodo





         **[EIO_DT_NWK](#constant.eio-dt-nwk)**
         ([int](#language.types.integer))








         **[EIO_DT_CMP](#constant.eio-dt-cmp)**
         ([int](#language.types.integer))



          Tipo de noto especial de red HP-UX





         **[EIO_DT_LNK](#constant.eio-dt-lnk)**
         ([int](#language.types.integer))



          Tipo de nodo de vínculo





         **[EIO_DT_SOCK](#constant.eio-dt-sock)**
         ([int](#language.types.integer))



          Tipo de nodo socket





         **[EIO_DT_DOOR](#constant.eio-dt-door)**
         ([int](#language.types.integer))



          Tipo de nodo de puerta de Solaris





         **[EIO_DT_WHT](#constant.eio-dt-wht)**
         ([int](#language.types.integer))



          Tipo de nodo





         **[EIO_DT_MAX](#constant.eio-dt-max)**
         ([int](#language.types.integer))



          Valor de tipo de nodo más alto












     ### Ejemplos


      **Ejemplo #1 eio_readdir()** example




&lt;?php
/_ Es llamada cuando eio_readdir() finaliza _/
function mi_llamada_retorno_readdir($datos, $resultado) {
    echo __FUNCTION__, " llamada\n";
    echo "datos: "; var_dump($datos);
echo "resultado: "; var_dump($resultado);
echo "\n";
}

eio_readdir("/var/spool/news", EIO_READDIR_STAT_ORDER | EIO_READDIR_DIRS_FIRST,
EIO_PRI_DEFAULT, "mi_llamada_retorno_readdir");
eio_event_loop();
?&gt;

      Resultado del ejemplo anterior es similar a:




mi_llamada_retorno_readdir llamada
datos: NULL
resultado: array(2) {
["names"]=&gt;
array(7) {
[0]=&gt;
string(7) "archive"
[1]=&gt;
string(8) "articles"
[2]=&gt;
string(8) "incoming"
[3]=&gt;
string(7) "innfeed"
[4]=&gt;
string(8) "outgoing"
[5]=&gt;
string(8) "overview"
[6]=&gt;
string(3) "tmp"
}
["dents"]=&gt;
array(7) {
[0]=&gt;
array(3)
{
["name"]=&gt;
string(7)
"archive"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393265)
}
[1]=&gt;
array(3)
{
["name"]=&gt;
string(8)
"articles"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393266)
}
[2]=&gt;
array(3)
{
["name"]=&gt;
string(8)
"incoming"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393267)
}
[3]=&gt;
array(3)
{
["name"]=&gt;
string(7)
"innfeed"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393269)
}
[4]=&gt;
array(3)
{
["name"]=&gt;
string(8)
"outgoing"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393270)
}
[5]=&gt;
array(3)
{
["name"]=&gt;
string(8)
"overview"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393271)
}
[6]=&gt;
array(3)
{
["name"]=&gt;
string(3)
"tmp"
["type"]=&gt;
int(4)
["inode"]=&gt;
int(393272)
}
}
}

# eio_readlink

(PECL eio &gt;= 0.0.1dev)

eio_readlink — Leer el valor de un enlace simbólico

### Descripción

**eio_readlink**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

### Parámetros

    path


      La ruta del enlace simbólico fuente






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_readlink()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_readlink()**

&lt;?php
$nombre_fichero = dirname(__FILE__)."/symlink.dat";
touch($nombre_fichero);
$enlace = dirname(__FILE__)."/symlink.link";
$enlace_duro = dirname(**FILE**)."/hardlink.link";

function mi_llamada_retorno_hardlink($datos, $resultado) {
    global $enlace, $nombre_fichero;
    var_dump(file_exists($datos) &amp;&amp; !is_link($datos));
    @unlink($datos);

    eio_symlink($nombre_fichero, $enlace, EIO_PRI_DEFAULT, "mi_llamada_retorno_symlink", $enlace);

}

function mi_llamada_retorno_symlink($datos, $resultado) {
    global $enlace, $nombre_fichero;
    var_dump(file_exists($datos) &amp;&amp; is_link($datos));

    if (!eio_readlink($datos, EIO_PRI_DEFAULT, "mi_llamada_retorno_readlink", NULL)) {
        @unlink($enlace);
        @unlink($nombre_fichero);
    }

}

function mi_llamada_retorno_readlink($datos, $resultado) {
    global $nombre_fichero, $enlace;
    var_dump($resultado);

    @unlink($enlace);
    @unlink($nombre_fichero);

}

eio_link($nombre_fichero, $enlace_duro, EIO_PRI_DEFAULT, "mi_llamada_retorno_hardlink", $enlace_duro);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
string(16) "/tmp/symlink.dat"

### Ver también

- [eio_symlink()](#function.eio-symlink) - Crear un enlace simbólico

# eio_realpath

(PECL eio &gt;= 0.0.1dev)

eio_realpath — Obtener el nombre de ruta absoluto canonizado

### Descripción

**eio_realpath**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [string](#language.types.string) $data = NULL
): [resource](#language.types.resource)

**eio_realpath()** devuelve el nombre de ruta absoluto
canonizado en el argumento result de la
función callback.

### Parámetros

    path


      EL nombre abreviado







    pri









    callback









    data





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo deeio_realpath()**

&lt;?php
var_dump(getcwd());

function mi_llamada_retorno_realpath($datos, $resultado) {
    var_dump($resultado);
}

eio_realpath("../", EIO_PRI_DEFAULT, "mi_llamada_retorno_realpath");
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

string(12) "/home/ruslan"
string(5) "/home"

# eio_rename

(PECL eio &gt;= 0.0.1dev)

eio_rename — Cambiar el nombre o la ubicación de un fichero

### Descripción

**eio_rename**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $new_path,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_rename()** renombra o mueve un fichero a una nueva ubicación.

### Parámetros

    path


      La ruta de origen






    new_path


      La ruta destino






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_rename()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_rename()**

&lt;?php
$nombre_fichero = dirname(__FILE__)."/fichero-eio-temp.dat";
touch($nombre_fichero);
$nuevo_nombre_fichero = dirname(**FILE**)."/nuevo-fichero-eio-temp.dat";

function mi_llamada_retorno_rename($datos, $resultado) {
global $nombre_fichero, $nuevo_nombre_fichero;

    if ($resultado == 0 &amp;&amp; !file_exists($nombre_fichero) &amp;&amp; file_exists($nuevo_nombre_fichero)) {
        @unlink($nuevo_nombre_fichero);
        echo "eio_rename_ok";
    } else {
        @unlink($nombre_fichero);
    }

}

eio_rename($nombre_fichero, $nuevo_nombre_fichero, EIO_PRI_DEFAULT, "mi_llamada_retorno_rename", $nombre_fichero);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

eio_rename_ok

# eio_rmdir

(PECL eio &gt;= 0.0.1dev)

eio_rmdir — Eliminar un directorio

### Descripción

**eio_rmdir**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_rmdir()** elimina un directorio.

### Parámetros

    path


      La ruta del directorio






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_rmdir()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_rmdir()**

&lt;?php
$nombre_directorio_temp = "dir-tmp-eio";
mkdir($nombre_directorio_temp);

function mi_llamada_retorno_rmdir($datos, $resultado) {
    if ($resultado == 0 &amp;&amp; !file_exists($datos)) {
        echo "eio_rmdir_ok";
    } else if (file_exists($datos)) {
rmdir($datos);
}
}

eio_rmdir($nombre_directorio_temp, EIO_PRI_DEFAULT, "mi_llamada_retorno_rmdir", $nombre_directorio_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

eio_rmdir_ok

### Ver también

- [eio_mkdir()](#function.eio-mkdir) - Crear un directorio

# eio_seek

(PECL eio &gt;= 0.5.0b)

eio_seek — Reposiciona el cursor de un fichero abierto

### Descripción

**eio_seek**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $offset,
    [int](#language.types.integer) $whence,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_seek()** reposiciona el desplazamiento del fichero abierto asociado al flujo,
a la instancia de [Socket](#class.socket), o al descriptor de fichero especificado por fd
al valor del argumento offset conforme
a la directiva whence.

### Parámetros

    fd


      Un flujo, una [Socket](#class.socket), o un descriptor de fichero numérico






    offset


      Punto de partida desde el cual los datos comenzarán a ser leídos.






    whence


      Los valores de whence son :



       - **[EIO_SEEK_SET](#constant.eio-seek-set)** - Posiciona a offset bytes.

       - **[EIO_SEEK_CUR](#constant.eio-seek-cur)** - Posiciona a la posición actual más offset.

       - **[EIO_SEEK_END](#constant.eio-seek-end)** - Posiciona al final del fichero más offset.






    pri

    La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria a pasar a la función de devolución de llamada
      callback.


### Valores devueltos

**eio_seek()** devuelve el recurso solicitado
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_sendfile

(PECL eio &gt;= 0.0.1dev)

eio_sendfile — Transferir información entre descriptores de ficheros

### Descripción

**eio_sendfile**(
    [mixed](#language.types.mixed) $out_fd,
    [mixed](#language.types.mixed) $in_fd,
    [int](#language.types.integer) $offset,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $pri = ?,
    [callable](#language.types.callable) $callback = ?,
    [string](#language.types.string) $data = ?
): [resource](#language.types.resource)

**eio_sendfile()** copia información entre un descriptor de fichero
y otror. Véase la página del manual SENDFILE(2) para más detalles.

### Parámetros

    out_fd


      Un flujo de salida, un recurso Socket, o un descriptor de fichero. Debería ser abierto para escritura.






    in_fd


      Un flujo de entrada, un recurso Socket, o un descriptor de fichero. Debería ser abierto para lectura.






    offset


      El índice dentro del fichero fuente.






    length


      El número de bytes a copiar.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_sendfile()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_set_max_idle

(PECL eio &gt;= 0.0.1dev)

eio_set_max_idle — Establecer el número máximo de hilos parados

### Descripción

**eio_set_max_idle**([int](#language.types.integer) $nthreads): [void](language.types.void.html)

### Parámetros

    nthreads


      El número de hilo parados.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [eio_nthreads()](#function.eio-nthreads) - Devuelve el número de hilos actualmente en uso

- [eio_set_min_parallel()](#function.eio-set-min-parallel) - Esteblecer el número de hilos paralelos mínimo

- [eio_set_max_parallel()](#function.eio-set-max-parallel) - Esteblecer el máximo de hilos paralelos

# eio_set_max_parallel

(PECL eio &gt;= 0.0.1dev)

eio_set_max_parallel — Esteblecer el máximo de hilos paralelos

### Descripción

**eio_set_max_parallel**([int](#language.types.integer) $nthreads): [void](language.types.void.html)

### Parámetros

    nthreads


      El número de hilos paralelos.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [eio_nthreads()](#function.eio-nthreads) - Devuelve el número de hilos actualmente en uso

- [eio_set_max_idle()](#function.eio-set-max-idle) - Establecer el número máximo de hilos parados

- [eio_set_min_parallel()](#function.eio-set-min-parallel) - Esteblecer el número de hilos paralelos mínimo

# eio_set_max_poll_reqs

(PECL eio &gt;= 0.0.1dev)

eio_set_max_poll_reqs — Establecer el máximo número de peticiones procesadas en una monitorización

### Descripción

**eio_set_max_poll_reqs**([int](#language.types.integer) $nreqs): [void](language.types.void.html)

### Parámetros

    nreqs


      El número de peticiones


### Valores devueltos

No se retorna ningún valor.

# eio_set_max_poll_time

(PECL eio &gt;= 0.0.1dev)

eio_set_max_poll_time — Establecer el tiempo máximo de monitorización

### Descripción

**eio_set_max_poll_time**([float](#language.types.float) $nseconds): [void](language.types.void.html)

La monitorización se detiene si toma más de nseconds
segundos.

### Parámetros

    nseconds


      El número de segundos


### Valores devueltos

No se retorna ningún valor.

# eio_set_min_parallel

(PECL eio &gt;= 0.0.1dev)

eio_set_min_parallel — Esteblecer el número de hilos paralelos mínimo

### Descripción

**eio_set_min_parallel**([string](#language.types.string) $nthreads): [void](language.types.void.html)

### Parámetros

    nthreads


      El número de hilos paralelos.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [eio_nthreads()](#function.eio-nthreads) - Devuelve el número de hilos actualmente en uso

- [eio_set_max_idle()](#function.eio-set-max-idle) - Establecer el número máximo de hilos parados

- [eio_set_max_parallel()](#function.eio-set-max-parallel) - Esteblecer el máximo de hilos paralelos

# eio_stat

(PECL eio &gt;= 0.0.1dev)

eio_stat — Obtener el estado de un fichero

### Descripción

**eio_stat**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_stat()** devuelve la información del estado de un fichero en
el argumento result de callback

### Parámetros

    path


      La ruta de archivo






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_stat()**devuelve un recurso de petición en caso de éxito o
**[false](#constant.false)** en caso de error. En caso de éxito asigna el argumento result de
callback a un array.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_stat()**

&lt;?php
$nombre_fichero_temp = "fichero-eio.tmp";
touch($nombre_fichero_temp);

function my_res_cb($datos, $resultado) {
    var_dump($datos);
var_dump($resultado);
}

function my_open_cb($datos, $resultado) {
    eio_close($resultado);
eio_event_loop();

    @unlink($datos);

}

eio_stat($nombre_fichero_temp, EIO_PRI_DEFAULT, "my_res_cb", "eio_stat");
eio_open($nombre_fichero_temp, EIO_O_RDONLY, NULL,
EIO_PRI_DEFAULT, "my_open_cb", $nombre_fichero_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

string(8) "eio_stat"
array(12) {
["st_dev"]=&gt;
int(2050)
["st_ino"]=&gt;
int(2489173)
["st_mode"]=&gt;
int(33188)
["st_nlink"]=&gt;
int(1)
["st_uid"]=&gt;
int(1000)
["st_gid"]=&gt;
int(100)
["st_rdev"]=&gt;
int(0)
["st_blksize"]=&gt;
int(4096)
["st_blocks"]=&gt;
int(0)
["st_atime"]=&gt;
int(1318250380)
["st_mtime"]=&gt;
int(1318250380)
["st_ctime"]=&gt;
int(1318250380)
}

### Ver también

- [eio_lstat()](#function.eio-lstat) - Obtener el estado de un fichero

- [eio_fstat()](#function.eio-fstat) - Obtener el estado de un fichero

# eio_statvfs

(PECL eio &gt;= 0.0.1dev)

eio_statvfs — Obtener las estadísticas del sistema de ficheros

### Descripción

**eio_statvfs**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri,
    [callable](#language.types.callable) $callback,
    [mixed](#language.types.mixed) $data = ?
): [resource](#language.types.resource)

**eio_statvfs()** devuelve la información de las estadísticas del sistema de ficheros en
el argumento result de callback

### Parámetros

    path


      El nombre de ruta de cualquier fichero dentro del sistema de ficheros montado






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_statvfs()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.
En caso de éxito asigna el argumento result de
callback a un array.

### Ejemplos

**Ejemplo #1 Ejemplo de eio_statvfs()**

&lt;?php
$nombre_fichero_temp = '/tmp/fichero-eio.tmp';
touch($nombre_fichero_temp);

function mi_llamada_retorno_statvfs($datos, $resultado) {
    var_dump($datos);
var_dump($resultado);

@unlink($datos);
}

eio_statvfs($nombre_fichero_temp, EIO_PRI_DEFAULT, "mi_llamada_retorno_statvfs", $nombre_fichero_temp);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

string(17) "/tmp/eio-file.tmp"
array(11) {
["f_bsize"]=&gt;
int(4096)
["f_frsize"]=&gt;
int(4096)
["f_blocks"]=&gt;
int(262144)
["f_bfree"]=&gt;
int(262111)
["f_bavail"]=&gt;
int(262111)
["f_files"]=&gt;
int(1540815)
["f_ffree"]=&gt;
int(1540743)
["f_favail"]=&gt;
int(1540743)
["f_fsid"]=&gt;
int(0)
["f_flag"]=&gt;
int(4102)
["f_namemax"]=&gt;
int(255)
}

# eio_symlink

(PECL eio &gt;= 0.0.1dev)

eio_symlink — Crear un enlace simbólico

### Descripción

**eio_symlink**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $new_path,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_symlink()** crea un enlace simbólico
new_path hacia path.

### Parámetros

    path


      La ruta fuente






    new_path


      La ruta destino






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_symlink()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 eio_symlink()** example

&lt;?php
$nombre_fichero = dirname(__FILE__)."/symlink.dat";
touch($nombre_fichero);
$enlace = dirname(**FILE**)."/symlink.link";

function mi_llamada_retorno_symlink($datos, $resultado) {
    global $enlace, $nombre_fichero;
    var_dump(file_exists($datos) &amp;&amp; is_link($datos));

    if (!eio_readlink($datos, EIO_PRI_DEFAULT, "mi_llamada_retorno_readlink", NULL)) {
        @unlink($enlace);
        @unlink($nombre_fichero);
    }

}

function mi_llamada_retorno_readlink($datos, $resultado) {
    global $nombre_fichero, $enlace;
    var_dump($resultado);

    @unlink($enlace);
    @unlink($nombre_fichero);

}

eio_symlink($nombre_fichero, $enlace, EIO_PRI_DEFAULT, "mi_llamada_retorno_symlink", $enlace);
eio_event_loop();
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
string(16) "/tmp/symlink.dat"

### Ver también

- [eio_link()](#function.eio-link) - Crear un enlace duro par un fichero

# eio_sync

(PECL eio &gt;= 0.0.1dev)

eio_sync — Consignar el caché de buffer cache al disco

### Descripción

**eio_sync**([int](#language.types.integer) $pri = EIO_PRI_DEFAULT, [callable](#language.types.callable) $callback = NULL, [mixed](#language.types.mixed) $data = NULL): [resource](#language.types.resource)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**eio_sync()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_sync_file_range

(PECL eio &gt;= 0.0.1dev)

eio_sync_file_range — Sincornizar un segmento de fichero con el disco

### Descripción

**eio_sync_file_range**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $offset,
    [int](#language.types.integer) $nbytes,
    [int](#language.types.integer) $flags,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_sync_file_range()** permite un control preciso al sincronizar el fichero abierto mencionado por el descriptor
de fichero fd con el disco.

### Parámetros

    fd


      El descriptor de fichero






    offset


      El byte de inicio del rango del archivo a ser sincronizado






    nbytes


      Especifica la longitud del rango a ser sincronizado, en bytes. Si
      nbytes es cero, son sicronizados todos los bytes desde
      offset hasta el final del fichero.






    flags


      Una máscara de bits. Puede incluir cualquiera de los siguientes valores:
      **[EIO_SYNC_FILE_RANGE_WAIT_BEFORE](#constant.eio-sync-file-range-wait-before)**,
      **[EIO_SYNC_FILE_RANGE_WRITE](#constant.eio-sync-file-range-write)**,
      **[EIO_SYNC_FILE_RANGE_WAIT_AFTER](#constant.eio-sync-file-range-wait-after)**. Estas banderas tienen
      el mismo significado que sus homónimas *SYNC_FILE_RANGE_**
      (véase la página del manual SYNC_FILE_RANGE(2)).






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_sync_file_range()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_syncfs

(PECL eio &gt;= 0.0.1dev)

eio_syncfs — Realizar una llamada al sistema de syncfs de Linux si está disponible

### Descripción

**eio_syncfs**(
    [mixed](#language.types.mixed) $fd,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

### Parámetros

    fd


      Descriptor de fichero







    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_syncfs()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_truncate

(PECL eio &gt;= 0.0.1dev)

eio_truncate — Truncar un fichero

### Descripción

**eio_truncate**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $offset = 0,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_truncate()** hace que el fichero nominado por path sea truncado al
tamaño de exactamente length bytes

### Parámetros

    path


      Ruta del fichero.






    offset


      Índice desde el principio del fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

[eio_busy()](#function.eio-busy) devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_ftruncate()](#function.eio-ftruncate) - Truncar un fichero

# eio_unlink

(PECL eio &gt;= 0.0.1dev)

eio_unlink — Borrar un nombre y posiblemente el fichero al que se refiere

### Descripción

**eio_unlink**(
    [string](#language.types.string) $path,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_unlink()** borra un nombre del sistema de ficheros.

### Parámetros

    path


      Ruta del fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_unlink()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# eio_utime

(PECL eio &gt;= 0.0.1dev)

eio_utime — Cambiar los momentos de último y acceso y modificación de un fichero

### Descripción

**eio_utime**(
    [string](#language.types.string) $path,
    [float](#language.types.float) $atime,
    [float](#language.types.float) $mtime,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

### Parámetros

    path


      Ruta del fichero.






    atime


      Momento de acceso






    mtime


      Momento de modificación






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_utime()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_futime()](#function.eio-futime) - Cambiar los momentos de último y acceso y modificación de un fichero

# eio_write

(PECL eio &gt;= 0.0.1dev)

eio_write — Escribir en un fichero

### Descripción

**eio_write**(
    [mixed](#language.types.mixed) $fd,
    [string](#language.types.string) $str,
    [int](#language.types.integer) $length = 0,
    [int](#language.types.integer) $offset = 0,
    [int](#language.types.integer) $pri = EIO_PRI_DEFAULT,
    [callable](#language.types.callable) $callback = NULL,
    [mixed](#language.types.mixed) $data = NULL
): [resource](#language.types.resource)

**eio_write()** escribe hasta length
bytes desde str en el índice offset
desde el principo del fichero.

### Parámetros

    fd


      Un flujo, un recurso Socket, o un descriptor numérico de fichero, p.ej., devuelto por [eio_open()](#function.eio-open).






    str


      La cadena fuente






    length


      Número máximo de bytes a escribir.






    offset


      ïndice desde el principio del fichero.






    pri

     La prioridad de la petición: **[EIO_PRI_DEFAULT](#constant.eio-pri-default)**, **[EIO_PRI_MIN](#constant.eio-pri-min)**, **[EIO_PRI_MAX](#constant.eio-pri-max)**, o **[null](#constant.null)**.

Si **[null](#constant.null)** es pasado, el parámetro pri, internamente, es definido a
**[EIO_PRI_DEFAULT](#constant.eio-pri-default)**.

    callback



La función de retrollamada callback
es llamada cuando la petición está terminada.
Debe corresponder al siguiente prototipo:

void callback(mixed $data, int $result[, resource $req]);

        data
        representa los datos personalizados pasados a la petición.




        result
        representa el valor resultante específico de la petición; básicamente,
            el valor retornado por la llamada al sistema correspondiente.




        req
        es el recurso opcional de la petición que puede ser
            utilizado con funciones como [eio_get_last_error()](#function.eio-get-last-error).









    data


      Variable arbitraria pasada a callback.


### Valores devueltos

**eio_write()** devuelve un recurso de petición en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [eio_open()](#function.eio-open) - Abre un fichero

## Tabla de contenidos

- [eio_busy](#function.eio-busy) — Incrementar artificialmente la carga. Podría ser útil en pruebas,
  evaluaciones comparativas
- [eio_cancel](#function.eio-cancel) — Cancelar una petición
- [eio_chmod](#function.eio-chmod) — Cambiar los permisos de fichero/directorio
- [eio_chown](#function.eio-chown) — Cambiar los permisos de un fichero/directorio
- [eio_close](#function.eio-close) — Cerrar un fichero
- [eio_custom](#function.eio-custom) — Ejecutar una petición personalizada como cualquier otra llamada eio\_\*
- [eio_dup2](#function.eio-dup2) — Duplicar un descriptor de fichero
- [eio_event_loop](#function.eio-event-loop) — Monitorizar libeio hasta que todas las peticiones sean procesadas
- [eio_fallocate](#function.eio-fallocate) — Permitir al llamador manipular directamente el espacio de disco
  asignado a un fichero
- [eio_fchmod](#function.eio-fchmod) — Cambiar los permisos de un fichero
- [eio_fchown](#function.eio-fchown) — Cambiar el propietario del fichero
- [eio_fdatasync](#function.eio-fdatasync) — Sincronizar el estado de ficheros que están en memoria con un dispositivo de almacenamiento
- [eio_fstat](#function.eio-fstat) — Obtener el estado de un fichero
- [eio_fstatvfs](#function.eio-fstatvfs) — Obtener las estadísticas del sistema de ficheros
- [eio_fsync](#function.eio-fsync) — Sincronizar el estado de un fichero en memoria con un dispositivo de almacenamiento
- [eio_ftruncate](#function.eio-ftruncate) — Truncar un fichero
- [eio_futime](#function.eio-futime) — Cambiar los momentos de último y acceso y modificación de un fichero
- [eio_get_event_stream](#function.eio-get-event-stream) — Obtiene un flujo que representa una variable usada en comnunicaciones internas con libeio
- [eio_get_last_error](#function.eio-get-last-error) — Retorna un string describiendo el último error asociado con el recurso solicitado
- [eio_grp](#function.eio-grp) — Crear un grupo de peticiones
- [eio_grp_add](#function.eio-grp-add) — Añadir una petición al grupo de peticiones
- [eio_grp_cancel](#function.eio-grp-cancel) — Cancelar un grupo de peticiones
- [eio_grp_limit](#function.eio-grp-limit) — Establecer el límite de un grupo
- [eio_init](#function.eio-init) — (Re-)inicializa Eio
- [eio_link](#function.eio-link) — Crear un enlace duro par un fichero
- [eio_lstat](#function.eio-lstat) — Obtener el estado de un fichero
- [eio_mkdir](#function.eio-mkdir) — Crear un directorio
- [eio_mknod](#function.eio-mknod) — Crear un fichero especial u ordinario
- [eio_nop](#function.eio-nop) — No hace nada, sólo recorre el ciclo de peticiones entero
- [eio_npending](#function.eio-npending) — Devolver el número de peticiones, excepto las no manejadas
- [eio_nready](#function.eio-nready) — Devolver el número de peticiones aún no tratadas
- [eio_nreqs](#function.eio-nreqs) — Devuelve el número de peticiones a ser procesadas
- [eio_nthreads](#function.eio-nthreads) — Devuelve el número de hilos actualmente en uso
- [eio_open](#function.eio-open) — Abre un fichero
- [eio_poll](#function.eio-poll) — Puede ser llamada siempre que existan peticiones pendientes que necesitan ser finalizadas
- [eio_read](#function.eio-read) — Leer de un descriptor de fichero en un índice dado
- [eio_readahead](#function.eio-readahead) — Perform file readahead into page cache
- [eio_readdir](#function.eio-readdir) — Leer un directorio al completo
- [eio_readlink](#function.eio-readlink) — Leer el valor de un enlace simbólico
- [eio_realpath](#function.eio-realpath) — Obtener el nombre de ruta absoluto canonizado
- [eio_rename](#function.eio-rename) — Cambiar el nombre o la ubicación de un fichero
- [eio_rmdir](#function.eio-rmdir) — Eliminar un directorio
- [eio_seek](#function.eio-seek) — Reposiciona el cursor de un fichero abierto
- [eio_sendfile](#function.eio-sendfile) — Transferir información entre descriptores de ficheros
- [eio_set_max_idle](#function.eio-set-max-idle) — Establecer el número máximo de hilos parados
- [eio_set_max_parallel](#function.eio-set-max-parallel) — Esteblecer el máximo de hilos paralelos
- [eio_set_max_poll_reqs](#function.eio-set-max-poll-reqs) — Establecer el máximo número de peticiones procesadas en una monitorización
- [eio_set_max_poll_time](#function.eio-set-max-poll-time) — Establecer el tiempo máximo de monitorización
- [eio_set_min_parallel](#function.eio-set-min-parallel) — Esteblecer el número de hilos paralelos mínimo
- [eio_stat](#function.eio-stat) — Obtener el estado de un fichero
- [eio_statvfs](#function.eio-statvfs) — Obtener las estadísticas del sistema de ficheros
- [eio_symlink](#function.eio-symlink) — Crear un enlace simbólico
- [eio_sync](#function.eio-sync) — Consignar el caché de buffer cache al disco
- [eio_sync_file_range](#function.eio-sync-file-range) — Sincornizar un segmento de fichero con el disco
- [eio_syncfs](#function.eio-syncfs) — Realizar una llamada al sistema de syncfs de Linux si está disponible
- [eio_truncate](#function.eio-truncate) — Truncar un fichero
- [eio_unlink](#function.eio-unlink) — Borrar un nombre y posiblemente el fichero al que se refiere
- [eio_utime](#function.eio-utime) — Cambiar los momentos de último y acceso y modificación de un fichero
- [eio_write](#function.eio-write) — Escribir en un fichero

- [Introducción](#intro.eio)
- [Instalación/Configuración](#eio.setup)<li>[Requerimientos](#eio.requirements)
- [Instalación](#eio.installation)
- [Tipos de recursos](#eio.resources)
  </li>- [Constantes predefinidas](#eio.constants)
- [Ejemplos](#eio.examples)
- [Funciones Eio](#ref.eio)<li>[eio_busy](#function.eio-busy) — Incrementar artificialmente la carga. Podría ser útil en pruebas,
  evaluaciones comparativas
- [eio_cancel](#function.eio-cancel) — Cancelar una petición
- [eio_chmod](#function.eio-chmod) — Cambiar los permisos de fichero/directorio
- [eio_chown](#function.eio-chown) — Cambiar los permisos de un fichero/directorio
- [eio_close](#function.eio-close) — Cerrar un fichero
- [eio_custom](#function.eio-custom) — Ejecutar una petición personalizada como cualquier otra llamada eio\_\*
- [eio_dup2](#function.eio-dup2) — Duplicar un descriptor de fichero
- [eio_event_loop](#function.eio-event-loop) — Monitorizar libeio hasta que todas las peticiones sean procesadas
- [eio_fallocate](#function.eio-fallocate) — Permitir al llamador manipular directamente el espacio de disco
  asignado a un fichero
- [eio_fchmod](#function.eio-fchmod) — Cambiar los permisos de un fichero
- [eio_fchown](#function.eio-fchown) — Cambiar el propietario del fichero
- [eio_fdatasync](#function.eio-fdatasync) — Sincronizar el estado de ficheros que están en memoria con un dispositivo de almacenamiento
- [eio_fstat](#function.eio-fstat) — Obtener el estado de un fichero
- [eio_fstatvfs](#function.eio-fstatvfs) — Obtener las estadísticas del sistema de ficheros
- [eio_fsync](#function.eio-fsync) — Sincronizar el estado de un fichero en memoria con un dispositivo de almacenamiento
- [eio_ftruncate](#function.eio-ftruncate) — Truncar un fichero
- [eio_futime](#function.eio-futime) — Cambiar los momentos de último y acceso y modificación de un fichero
- [eio_get_event_stream](#function.eio-get-event-stream) — Obtiene un flujo que representa una variable usada en comnunicaciones internas con libeio
- [eio_get_last_error](#function.eio-get-last-error) — Retorna un string describiendo el último error asociado con el recurso solicitado
- [eio_grp](#function.eio-grp) — Crear un grupo de peticiones
- [eio_grp_add](#function.eio-grp-add) — Añadir una petición al grupo de peticiones
- [eio_grp_cancel](#function.eio-grp-cancel) — Cancelar un grupo de peticiones
- [eio_grp_limit](#function.eio-grp-limit) — Establecer el límite de un grupo
- [eio_init](#function.eio-init) — (Re-)inicializa Eio
- [eio_link](#function.eio-link) — Crear un enlace duro par un fichero
- [eio_lstat](#function.eio-lstat) — Obtener el estado de un fichero
- [eio_mkdir](#function.eio-mkdir) — Crear un directorio
- [eio_mknod](#function.eio-mknod) — Crear un fichero especial u ordinario
- [eio_nop](#function.eio-nop) — No hace nada, sólo recorre el ciclo de peticiones entero
- [eio_npending](#function.eio-npending) — Devolver el número de peticiones, excepto las no manejadas
- [eio_nready](#function.eio-nready) — Devolver el número de peticiones aún no tratadas
- [eio_nreqs](#function.eio-nreqs) — Devuelve el número de peticiones a ser procesadas
- [eio_nthreads](#function.eio-nthreads) — Devuelve el número de hilos actualmente en uso
- [eio_open](#function.eio-open) — Abre un fichero
- [eio_poll](#function.eio-poll) — Puede ser llamada siempre que existan peticiones pendientes que necesitan ser finalizadas
- [eio_read](#function.eio-read) — Leer de un descriptor de fichero en un índice dado
- [eio_readahead](#function.eio-readahead) — Perform file readahead into page cache
- [eio_readdir](#function.eio-readdir) — Leer un directorio al completo
- [eio_readlink](#function.eio-readlink) — Leer el valor de un enlace simbólico
- [eio_realpath](#function.eio-realpath) — Obtener el nombre de ruta absoluto canonizado
- [eio_rename](#function.eio-rename) — Cambiar el nombre o la ubicación de un fichero
- [eio_rmdir](#function.eio-rmdir) — Eliminar un directorio
- [eio_seek](#function.eio-seek) — Reposiciona el cursor de un fichero abierto
- [eio_sendfile](#function.eio-sendfile) — Transferir información entre descriptores de ficheros
- [eio_set_max_idle](#function.eio-set-max-idle) — Establecer el número máximo de hilos parados
- [eio_set_max_parallel](#function.eio-set-max-parallel) — Esteblecer el máximo de hilos paralelos
- [eio_set_max_poll_reqs](#function.eio-set-max-poll-reqs) — Establecer el máximo número de peticiones procesadas en una monitorización
- [eio_set_max_poll_time](#function.eio-set-max-poll-time) — Establecer el tiempo máximo de monitorización
- [eio_set_min_parallel](#function.eio-set-min-parallel) — Esteblecer el número de hilos paralelos mínimo
- [eio_stat](#function.eio-stat) — Obtener el estado de un fichero
- [eio_statvfs](#function.eio-statvfs) — Obtener las estadísticas del sistema de ficheros
- [eio_symlink](#function.eio-symlink) — Crear un enlace simbólico
- [eio_sync](#function.eio-sync) — Consignar el caché de buffer cache al disco
- [eio_sync_file_range](#function.eio-sync-file-range) — Sincornizar un segmento de fichero con el disco
- [eio_syncfs](#function.eio-syncfs) — Realizar una llamada al sistema de syncfs de Linux si está disponible
- [eio_truncate](#function.eio-truncate) — Truncar un fichero
- [eio_unlink](#function.eio-unlink) — Borrar un nombre y posiblemente el fichero al que se refiere
- [eio_utime](#function.eio-utime) — Cambiar los momentos de último y acceso y modificación de un fichero
- [eio_write](#function.eio-write) — Escribir en un fichero
  </li>
