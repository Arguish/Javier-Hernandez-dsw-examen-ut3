# Direct IO

# Introducción

PHP soporta las funciones Direct IO, tal como se describe en
el estándar Posix (Sección 6) para realizar funciones
I/O de bajo nivel en comparación con las funciones
C-Language stream I/O ([fopen()](#function.fopen),
[fread()](#function.fread),..). El uso de las funciones
DIO debe considerarse únicamente cuando se requiere un control directo
de un dispositivo. En todos los demás casos,
las funciones estándar del [sistema
de archivos](#book.filesystem) son más adecuadas.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#dio.installation)
- [Tipos de recursos](#dio.resources)

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/dio](https://pecl.php.net/package/dio).

## Tipos de recursos

Un tipo de recurso es definido por esta extensión:
un puntero de fichero, retornado por la función
[dio_open()](#function.dio-open).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[F_DUPFD](#constant.f-dupfd)**
    ([int](#language.types.integer))









    **[F_GETFD](#constant.f-getfd)**
    ([int](#language.types.integer))









    **[F_GETFL](#constant.f-getfl)**
    ([int](#language.types.integer))









    **[F_GETLK](#constant.f-getlk)**
    ([int](#language.types.integer))









    **[F_GETOWN](#constant.f-getown)**
    ([int](#language.types.integer))









    **[F_RDLCK](#constant.f-rdlck)**
    ([int](#language.types.integer))









    **[F_SETFL](#constant.f-setfl)**
    ([int](#language.types.integer))









    **[F_SETLK](#constant.f-setlk)**
    ([int](#language.types.integer))









    **[F_SETLKW](#constant.f-setlkw)**
    ([int](#language.types.integer))









    **[F_SETOWN](#constant.f-setown)**
    ([int](#language.types.integer))









    **[F_UNLCK](#constant.f-unlck)**
    ([int](#language.types.integer))









    **[F_WRLCK](#constant.f-wrlck)**
    ([int](#language.types.integer))









    **[O_APPEND](#constant.o-append)**
    ([int](#language.types.integer))









    **[O_ASYNC](#constant.o-async)**
    ([int](#language.types.integer))









    **[O_CREAT](#constant.o-creat)**
    ([int](#language.types.integer))









    **[O_EXCL](#constant.o-excl)**
    ([int](#language.types.integer))









    **[O_NDELAY](#constant.o-ndelay)**
    ([int](#language.types.integer))









    **[O_NOCTTY](#constant.o-noctty)**
    ([int](#language.types.integer))









    **[O_NONBLOCK](#constant.o-nonblock)**
    ([int](#language.types.integer))









    **[O_RDONLY](#constant.o-rdonly)**
    ([int](#language.types.integer))









    **[O_RDWR](#constant.o-rdwr)**
    ([int](#language.types.integer))









    **[O_SYNC](#constant.o-sync)**
    ([int](#language.types.integer))









    **[O_TRUNC](#constant.o-trunc)**
    ([int](#language.types.integer))









    **[O_WRONLY](#constant.o-wronly)**
    ([int](#language.types.integer))









    **[S_IRGRP](#constant.s-irgrp)**
    ([int](#language.types.integer))









    **[S_IROTH](#constant.s-iroth)**
    ([int](#language.types.integer))









    **[S_IRUSR](#constant.s-irusr)**
    ([int](#language.types.integer))









    **[S_IRWXG](#constant.s-irwxg)**
    ([int](#language.types.integer))









    **[S_IRWXO](#constant.s-irwxo)**
    ([int](#language.types.integer))









    **[S_IRWXU](#constant.s-irwxu)**
    ([int](#language.types.integer))









    **[S_IWGRP](#constant.s-iwgrp)**
    ([int](#language.types.integer))









    **[S_IWOTH](#constant.s-iwoth)**
    ([int](#language.types.integer))









    **[S_IWUSR](#constant.s-iwusr)**
    ([int](#language.types.integer))









    **[S_IXGRP](#constant.s-ixgrp)**
    ([int](#language.types.integer))









    **[S_IXOTH](#constant.s-ixoth)**
    ([int](#language.types.integer))









    **[S_IXUSR](#constant.s-ixusr)**
    ([int](#language.types.integer))

# Funciones de Direct IO

# dio_close

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_close — Cierra el descriptor de fichero fd

### Descripción

**dio_close**([resource](#language.types.resource) $fd): [void](language.types.void.html)

La función **dio_close()** cierra el descriptor de fichero
fd.

### Parámetros

     fd


       Descriptor de fichero devuelto por [dio_open()](#function.dio-open).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Cerrando un descriptor de fichero**

&lt;?php
$fd = dio_open('/dev/ttyS0', O_RDWR);

dio_close($fd);
?&gt;

### Ver también

    - [dio_open()](#function.dio-open) - Abre (crea si fuera necesario) un fichero a un nivel más bajo que el permitido por

flujos de entrada y salida de las bibliotecas en C

# dio_fcntl

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_fcntl — Lleva a cabo la función fcntl de la biblioteca C en el fichero fd

### Descripción

**dio_fcntl**([resource](#language.types.resource) $fd, [int](#language.types.integer) $cmd, [mixed](#language.types.mixed) $args = ?): [mixed](#language.types.mixed)

La función **dio_fcntl()** realiza la operación
especificada por cmd sobre el descriptor de
fichero fd. Algunos comandos requieren que se
proporcionen parámetros adicionales en args.

### Parámetros

     fd


       Descriptor de fichero devuelto por [dio_open()](#function.dio-open).






     cmd


       Puede ser una de las siguientes operaciones:



        -

          **[F_SETLK](#constant.f-setlk)** - Se asigna o quita el bloqueo. Si está bloqueado
          por otro proceso, **dio_fcntl()** devuelve
          -1.





        -

          **[F_SETLKW](#constant.f-setlkw)** - como **[F_SETLK](#constant.f-setlk)**,
          pero en caso de que esté bloqueado por otro proceso,
          **dio_fcntl()** espera a que éste se libere.





        -

          **[F_GETLK](#constant.f-getlk)** - **dio_fcntl()**
          devuelve un array asociativo (como se describe a continuación) si algún proceso
          previene el bloqueo. Si no hubiera impedimento, se asignará la
          clave "type" a **[F_UNLCK](#constant.f-unlck)**.





        -

          **[F_DUPFD](#constant.f-dupfd)** - encuentra el número de descriptor más
          bajo disponible que sea igual o superior a args
          y lo devuelve.





        -

          **[F_SETFL](#constant.f-setfl)** - Establece al descriptor de fichero las
          banderas especificadas en args, de entre
          **[O_APPEND](#constant.o-append)**, **[O_NONBLOCK](#constant.o-nonblock)** o
          **[O_ASYNC](#constant.o-async)**. Para usar **[O_ASYNC](#constant.o-async)**
          debe usarse la extensión [PCNTL](#ref.pcntl).










     args


       args es un array asociativo, cuando
       cmd sea **[F_SETLK](#constant.f-setlk)** o
       **[F_SETLLW](#constant.f-setllw)**, con las siguientes claves:



        -

          start - posición donde comienza el bloqueo





        -

          length - tamaño del area bloqueada. Cero significa hasta
          el final del fichero





        -

          whence - Desde dónde se contabiliza l_start: puede ser
          **[SEEK_SET](#constant.seek-set)**,
          **[SEEK_END](#constant.seek-end)** y **[SEEK_CUR](#constant.seek-cur)**





        -

          type - tipo de bloqueo: puede ser
          **[F_RDLCK](#constant.f-rdlck)** (bloqueo de lectura),
          **[F_WRLCK](#constant.f-wrlck)** (bloqueo de escritura) o
          **[F_UNLCK](#constant.f-unlck)** (desbloqueo)









### Valores devueltos

Devuelve el resultado de la llamada a C.

### Ejemplos

    **Ejemplo #1 Bloqueando y desbloqueando**

&lt;?php

$fd = dio_open('/dev/ttyS0', O_RDWR);

if (dio_fcntl($fd, F_SETLK, Array("type"=&gt;F_WRLCK)) == -1) {
// parece el descriptor de fichero está bloqueado
echo "No se puede desbloquear. Pertenece a algún otro proceso.";
} else {
echo "Bloqueo/desbloqueo con éxito";
}

dio_close($fd);
?&gt;

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

# dio_open

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_open —
Abre (crea si fuera necesario) un fichero a un nivel más bajo que el permitido por
flujos de entrada y salida de las bibliotecas en C

### Descripción

**dio_open**([string](#language.types.string) $filename, [int](#language.types.integer) $flags, [int](#language.types.integer) $mode = 0): [resource](#language.types.resource)

**dio_open()** abre un fichero y devuelve su descriptor
de fichero.

### Parámetros

     filename


       Ruta del fichero a abrir.






     flags


       El parámetro flags es una máscara OR de bits
       compuesta a partir de las siguientes banderas. Estos valores
       *tienen* que incluir alguno de entre
       **[O_RDONLY](#constant.o-rdonly)**, **[O_WRONLY](#constant.o-wronly)**,
       o **[O_RDWR](#constant.o-rdwr)**. Además, podría incluir cualquier
       combinación del resto de banderas de la lista.



        -

          **[O_RDONLY](#constant.o-rdonly)** - abre el fichero con acceso de lectura.





        -

          **[O_WRONLY](#constant.o-wronly)** - abre el fichero con acceso de escritura.





        -

          **[O_RDWR](#constant.o-rdwr)** - abre el fichero con acceso de lectura y
          de escritura.





        -

          **[O_CREAT](#constant.o-creat)** - crea el fichero, si no existiera
          ya.





        -

          **[O_EXCL](#constant.o-excl)** - si tanto **[O_CREAT](#constant.o-creat)**
          como **[O_EXCL](#constant.o-excl)** están habilitados, y el fichero
          existe, **dio_open()** fallará.





        -

          **[O_TRUNC](#constant.o-trunc)** - si el fichero existe, y está abierto
          con sólo escritura, se truncará a cero.





        -

          **[O_APPEND](#constant.o-append)** - las operaciones de escritura añaden los
          datos al final del fichero.





        -

          **[O_NONBLOCK](#constant.o-nonblock)** - asigna el modo no bloqueante.





        -

          **[O_NOCTTY](#constant.o-noctty)** - previene que el SO asigne al fichero
          abierto como el terminal controlador del proceso cuando se abra
          un fichero de dispositivo TTY.










     mode


       Si flags contiene
       **[O_CREAT](#constant.o-creat)**, mode establecerá
       los permisos del ficher (permisos
       de creación). mode es necesario para un correcto
       funcionamiento cuando **[O_CREAT](#constant.o-creat)** se especifica en
       flags, y se ignorará en cualquier otro caso.




       Los permisos que realmente se asignan al fichero creado se verán
       afectados por el *umask* del proceso, como
       suele suceder.





### Valores devueltos

Descriptor de fichero o **[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Abrir un descriptor de fichero**

&lt;?php

$fd = dio_open('/dev/ttyS0', O_RDWR | O_NOCTTY | O_NONBLOCK);

dio_close($fd);
?&gt;

### Ver también

    - [dio_close()](#function.dio-close) - Cierra el descriptor de fichero fd

# dio_read

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_read — Leer bytes de un descriptor de fichero

### Descripción

**dio_read**([resource](#language.types.resource) $fd, [int](#language.types.integer) $len = 1024): [string](#language.types.string)

La función **dio_read()** lee y devuelve
len bytes de fichero con descriptor
fd.

### Parámetros

     fd


       El fichero descriptor devuelto por[dio_open()](#function.dio-open).






     len


       El número de bytes a leer. Si no se especifica la lectura
       es de  bloques de 1K
       **dio_read()**





### Valores devueltos

La bytes leídos desde fd.

### Ver también

    - [dio_write()](#function.dio-write) - Escribe datos en el descriptor de fichero con un truncado opcional

# dio_seek

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_seek — Salta a una posición del descriptor de fichero desde donde proceda

### Descripción

**dio_seek**([resource](#language.types.resource) $fd, [int](#language.types.integer) $pos, [int](#language.types.integer) $whence = SEEK_SET): [int](#language.types.integer)

**dio_seek()** se usa para cambiar la posición del fichero
del descriptor de fichero proporcionado.

### Parámetros

     fd


       Descriptor de fichero devuelto por [dio_open()](#function.dio-open).






     pos


       Nueva posición.






     whence


       Indica cómo interpretar la posición pos:



        -

          **[SEEK_SET](#constant.seek-set)** (por omisión) - indica que
          pos se contabiliza a partir del comienzo
          del fichero.





        -

          **[SEEK_CUR](#constant.seek-cur)** - indica que
          pos se contabiliza a partir de la posición
          actual del fichero. Este valor puede ser positivo o negativo.





        -

          **[SEEK_END](#constant.seek-end)** - Indica que
          pos contabiliza caracteres a partir del final
          del fichero. Un valor negativo especifica una posición perteneciente al
          contenido del fichero; un valor positivo especifica una posición que
          supera el final. Si éste fuera el caso, y se escribieran datos, se
          rellenaría el fichero con ceros hasta alcanzar la posición que
          proceda.









### Valores devueltos

### Ejemplos

    **Ejemplo #1 Posicionamiento de un fichero**

&lt;?php

$fd = dio_open('/dev/ttyS0', O_RDWR);

dio_seek($fd, 10, SEEK_SET);
// la posición está a 10 caracteres del comienzo

dio_seek($fd, -2, SEEK_CUR);
// la posición está a 8 caracteres del comienzo

dio_seek($fd, -5, SEEK_END);
// la posición está a 5 caracteres del final

dio_seek($fd, 10, SEEK_END);
// la posición supera ahora 10 caracteres del final del fichero.
// Los 10 caracteres intermedios entre el final y la posición actual
// se rellenan con ceros.

dio_close($fd);
?&gt;

# dio_stat

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_stat —
Consulta información de estado del descriptor de fichero fd

### Descripción

**dio_stat**([resource](#language.types.resource) $fd): [array](#language.types.array)

**dio_stat()** devuelve información sobre el descriptor de
fichero proporcionado.

### Parámetros

     fd


       Descriptor de fichero devuelto por [dio_open()](#function.dio-open).





### Valores devueltos

Devuelve un array asociativo con las siguientes claves:

    -

      "device" - dispositivo





    -

      "inode" - nodo-i





    -

      "mode" - modo





    -

      "nlink" - número de enlaces duros





    -

      "uid" - id de usuario





    -

      "gid" - id de grupo





    -

      "device_type" - tipo de dispositivo (si es un nodo-i de dispositivo)





    -

      "size" - tamaño total en bytes





    -

      "blocksize" - tamaño de bloque





    -

      "blocks" - número de bloques asignados





    -

      "atime" - fecha de último acceso





    -

      "mtime" - fecha de última modificación





    -

      "ctime" - fecha de último cambio


En caso de error, **dio_stat()** devuelve **[null](#constant.null)**.

# dio_tcsetattr

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.1.0)

dio_tcsetattr —
Establece los atributos de terminal y la velocidad de transmisión para un puerto serie

### Descripción

**dio_tcsetattr**([resource](#language.types.resource) $fd, [array](#language.types.array) $options): [bool](#language.types.boolean)

**dio_tcsetattr()** establece los atributos de terminal y la velocidad de
transmisión del fd abierto.

### Parámetros

     fd


       El descriptor de fichero devuelto por [dio_open()](#function.dio-open).






     options


       Las opciones disponibles actualmente son:



        -

          'baud' - velocidad de transmisión del puerto - puede ser 38400,19200,9600,4800,2400,1800,
          1200,600,300,200,150,134,110,75 o 50, el valor por omisión es 9600.





        -

          'bits' - bits de datos - puede ser 8,7,6 o 5. El valor por omisión es 8.





        -

          'stop' - bits de parada - puede ser 1 o 2. El valor por omisión es 1.





        -

          'parity' - puede ser 0,1 o 2. El valor por omisión es 0.









### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Establecer la velocidad de transmisión en un puerto serie**

&lt;?php

$fd = dio_open('/dev/ttyS0', O_RDWR | O_NOCTTY | O_NONBLOCK);

dio_fcntl($fd, F_SETFL, O_SYNC);

dio_tcsetattr($fd, array(
'baud' =&gt; 9600,
'bits' =&gt; 8,
'stop' =&gt; 1,
'parity' =&gt; 0
));

while (true) {
$data = dio_read($fd, 256);
if ($data !== null &amp;&amp; $date !== '') {
echo $data;
}
}

?&gt;

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

# dio_truncate

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_truncate —
Trunca un descriptor de fichero fd a un determinado número de bytes

### Descripción

**dio_truncate**([resource](#language.types.resource) $fd, [int](#language.types.integer) $offset): [bool](#language.types.boolean)

**dio_truncate()** trunca un fichero a, como mucho, un tamaño de
offset bytes.

Si el fichero excediera este tamaño, el contenido extra se
perdería. Si fuera inferior en tamaño, no se especifica si el fichero
se mantiene sin cambios o si se completa. En este último caso, la parte
completada se haría con ceros.

### Parámetros

     fd


       Descriptor de fichero devuelto por [dio_open()](#function.dio-open).






     offset


       Tamaño en bytes.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

# dio_write

(PHP 4 &gt;= 4.2.0, PHP 5 &lt; 5.1.0)

dio_write —
Escribe datos en el descriptor de fichero con un truncado opcional

### Descripción

**dio_write**([resource](#language.types.resource) $fd, [string](#language.types.string) $data, [int](#language.types.integer) $len = 0): [int](#language.types.integer)

**dio_write()** escriba hasta len
bytes de data al fichero fd.

### Parámetros

     fd


       Descriptor de fichero devuelto por [dio_open()](#function.dio-open).






     data


       Datos a escribir.






     len


       Longitud en bytes de los datos a escribir. Si no se especifica, la función
       escribe todos los datos al fichero especificado.





### Valores devueltos

Devuelve el número de bytes escritos en fd.

### Ver también

    - [dio_read()](#function.dio-read) - Leer bytes de un descriptor de fichero

## Tabla de contenidos

- [dio_close](#function.dio-close) — Cierra el descriptor de fichero fd
- [dio_fcntl](#function.dio-fcntl) — Lleva a cabo la función fcntl de la biblioteca C en el fichero fd
- [dio_open](#function.dio-open) — Abre (crea si fuera necesario) un fichero a un nivel más bajo que el permitido por
  flujos de entrada y salida de las bibliotecas en C
- [dio_read](#function.dio-read) — Leer bytes de un descriptor de fichero
- [dio_seek](#function.dio-seek) — Salta a una posición del descriptor de fichero desde donde proceda
- [dio_stat](#function.dio-stat) — Consulta información de estado del descriptor de fichero fd
- [dio_tcsetattr](#function.dio-tcsetattr) — Establece los atributos de terminal y la velocidad de transmisión para un puerto serie
- [dio_truncate](#function.dio-truncate) — Trunca un descriptor de fichero fd a un determinado número de bytes
- [dio_write](#function.dio-write) — Escribe datos en el descriptor de fichero con un truncado opcional

- [Introducción](#intro.dio)
- [Instalación/Configuración](#dio.setup)<li>[Instalación](#dio.installation)
- [Tipos de recursos](#dio.resources)
  </li>- [Constantes predefinidas](#dio.constants)
- [Funciones de Direct IO](#ref.dio)<li>[dio_close](#function.dio-close) — Cierra el descriptor de fichero fd
- [dio_fcntl](#function.dio-fcntl) — Lleva a cabo la función fcntl de la biblioteca C en el fichero fd
- [dio_open](#function.dio-open) — Abre (crea si fuera necesario) un fichero a un nivel más bajo que el permitido por
  flujos de entrada y salida de las bibliotecas en C
- [dio_read](#function.dio-read) — Leer bytes de un descriptor de fichero
- [dio_seek](#function.dio-seek) — Salta a una posición del descriptor de fichero desde donde proceda
- [dio_stat](#function.dio-stat) — Consulta información de estado del descriptor de fichero fd
- [dio_tcsetattr](#function.dio-tcsetattr) — Establece los atributos de terminal y la velocidad de transmisión para un puerto serie
- [dio_truncate](#function.dio-truncate) — Trunca un descriptor de fichero fd a un determinado número de bytes
- [dio_write](#function.dio-write) — Escribe datos en el descriptor de fichero con un truncado opcional
  </li>
