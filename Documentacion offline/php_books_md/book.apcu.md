# APC User Cache

# Introducción

APCu es un array asociativo almacenado en memoria para PHP.
Las claves son de tipo [string](#language.types.string) y los valores son variables PHP de cualquier tipo.
APCu solo gestiona la caché de variables del espacio de usuario.

La caché APCu es por proceso bajo Windows, por lo que al utilizar un SAPI
basado en procesos (en lugar de en hilos), no será compartida entre
diferentes procesos.

APCu es APC sin la caché de código operativo.

La primera versión es 4.0.0, fue un ramificado del código de la
cabeza de la rama principal de APC de la época.
El soporte para PHP 7 está disponible a partir de APCu 5.0.0.
El soporte para PHP 8 está disponible a partir de APCu 5.1.19.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#apcu.installation)
- [Configuración en tiempo de ejecución](#apcu.configuration)

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/apcu](https://pecl.php.net/package/apcu).

    **Sugerencia**

        PHP 7 cuenta con un módulo separado ([» apcu-bc](https://pecl.php.net/apcu_bc)) para garantizar la
        retrocompatibilidad con APC.




        En modo retrocompatibilidad, APCu registra las funciones APC aplicables con prototipos retrocompatibles.




        Cuando una función APC acepta el argumento cache_type, este último es
        ignorado por la versión retrocompatible de la función y omitido del prototipo de la versión APCu.

    **Advertencia**

        A partir de PHP 8.0.0, apcu-bc ya no es aceptado.

    **Nota**:

        Con Windows, APCu requiere un directorio temporal en el que el servidor web esté autorizado a
        escribir. Se verifican sucesivamente las variables de entorno TMP, TEMP y USERPROFILE en este orden y
        se termina intentando el directorio WINDOWS si ninguna de estas variables ha sido definida.

    **Nota**:

        Para obtener más detalles técnicos sobre la implementación, consúltese el
        [» 
         archivo TECHNOTES proporcionado por los desarrolladores
        ](https://github.com/php/pecl-caching-apc/blob/master/TECHNOTES.txt).

    Las fuentes de APCu están disponibles [» aquí](https://github.com/krakjoe/apcu).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

Aunque los ajustes predeterminados de APCu funcionan correctamente en muchas
instalaciones, es útil considerar ajustar estos parámetros de configuración.

Una cuestión importante para la configuración de APCu es
cuál es el tamaño adecuado que debe asignarse en la memoria a APCu.
La directiva ini que controla este parámetro es apc.shm_size.
El párrafo a continuación es importante para responder a esta pregunta.

Una vez iniciado el servidor, el script apc.php, disponible con
la extensión, puede ser copiado en el document root y ejecutado por el
navegador. Este script proporciona un análisis detallado del funcionamiento interno
de APCu. Si la biblioteca GD está activada en PHP, entonces el script puede mostrar
gráficos pertinentes.

Si APCu está funcionando, el número de Cache full count (a la izquierda)
mostrará el número de veces que el caché ha alcanzado su capacidad máxima y ha tenido que
evacuar entradas para liberar memoria. Durante la evacuación, si
apc.ttl ha sido especificado, APCu intentará primero eliminar las
entradas expiradas, es decir, las entradas cuyo TTL ha expirado o las entradas
que no tienen TTL definido y que no han sido consultadas en los últimos
apc.ttl segundos. Si apc.ttl no ha sido
definido o si la eliminación de las entradas expiradas no ha liberado suficiente
espacio, APCu borrará la totalidad del caché.

El número de evacuaciones debe ser mínimo en un caché bien configurado. Si el
caché está constantemente lleno y por lo tanto liberado a la fuerza, el removimiento resultante tendrá
efectos perjudiciales en el rendimiento del script. La manera más sencilla
de reducir este número es asignar más memoria a APCu.

Cuando APCu es compilado con mmap (Memory Mapping), solo utilizará un
segmento de memoria, a diferencia del caso en que APCu es construido con
SHM (SysV Shared Memory) que utiliza varios segmentos de memoria. MMAP no tiene
un límite máximo como SHM en /proc/sys/kernel/shmmax.
En general, el uso de MMAP es recomendado ya que reclama la memoria
más rápidamente cuando el servidor web es reiniciado y reduce el impacto en
la asignación de memoria al inicio.

   <caption>**Opciones de configuración de APCu**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [apc.enabled](#ini.apcu.enabled)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.shm_segments](#ini.apcu.shm-segments)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.shm_size](#ini.apcu.shm-size)
      "32M"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.entries_hint](#ini.apcu.entries-hint)
      512 * apc.shm_size
      **[INI_SYSTEM](#constant.ini-system)**
      Prior to APcu 5.1.25, the default was 4096



      [apc.ttl](#ini.apcu.ttl)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.gc_ttl](#ini.apcu.gc-ttl)
      "3600"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.mmap_file_mask](#ini.apcu.mmap-file-mask)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.slam_defense](#ini.apcu.slam-defense)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.enable_cli](#ini.apcu.enable-cli)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.use_request_time](#ini.apcu.use-request-time)
      "0"
      **[INI_ALL](#constant.ini-all)**
      Anteriormente a APCu 5.1.19, el valor predeterminado era 1.



      [apc.serializer](#ini.apcu.serializer)
      "php"
      **[INI_SYSTEM](#constant.ini-system)**
      Anteriormente a APCu 5.1.15, el valor predeterminado era "default".



      [apc.coredump_unmap](#ini.apcu.coredump-unmap)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [apc.preload_path](#ini.apcu.preload-path)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     apc.enabled
     [bool](#language.types.boolean)



      apc.enabled puede ser puesto a 0 para desactivar APC.
      Esto puede ser útil cuando APC es compilado estáticamente en PHP
      ya que no hay otra manera de desactivarlo (cuando APC es
      compilado como DSO, la línea extension
      en el fichero php.ini puede simplemente ser comentada).







     apc.shm_segments
     [int](#language.types.integer)



      El número de segmentos de memoria compartida a asignar al caché de compilación
      Si APC carece de memoria compartida pero que apc.shm_size
      está puesto al valor máximo permitido por el sistema, entonces aumentar
      este valor puede evitar que APC agote su memoria.







     apc.shm_size
     [string](#language.types.string)



      El tamaño de cada segmento de memoria compartida dado en notación abreviada
      como se indica en esta [FAQ](#faq.using.shorthandbytes).
      Por defecto, algunos sistemas (incluyendo la mayoría de las variantes de BSD)
      tienen un límite muy bajo para el tamaño de un segmento de memoria compartida.







     apc.entries_hint
     [int](#language.types.integer)



      Un "indicio" sobre el número de variables distintas que pueden ser almacenadas.
      Poner a cero o en caso de duda omitir.







     apc.ttl
     [int](#language.types.integer)



      Considerar que las entradas de caché sin TTL explícito son expiradas si no han sido consultadas desde hace tantos segundos. En efecto, esto permite que estas
      entradas sean oportunamente eliminadas durante una inserción en el caché,
      o antes de una eliminación completa. Tenga en cuenta que debido a que la eliminación es
      oportunista, las entradas pueden seguir siendo legibles incluso si son
      más antiguas que apc.ttl segundos. Este parámetro no tiene ningún
      efecto sobre las entradas de caché para las cuales un TTL explícito está especificado.







     apc.gc_ttl
     [int](#language.types.integer)



      El número de segundos durante los cuales una entrada de caché puede
      permanecer en la lista de recolección de basura después de haber sido retirada o invalidada.
      Las entradas son elegibles para eliminación si su número de referencias es cero, o si exceden este límite de tiempo.
      Si se establece en 0, la limpieza basada en el tiempo está desactivada,
      y las entradas solo se eliminan cuando su número de referencias cae a cero.







     apc.mmap_file_mask
     [string](#language.types.string)



      Si APCu ha sido compilado con la opción MMAP usando
      --enable-mmap, este parámetro recibe la máscara de
      fichero de tipo mktemp-style a pasar al módulo mmap para determinar
      si la región de la memoria usando mmap será guardada a través
      de un fichero o por la de la memoria compartida.
      En el caso de que el guardado se haga a través de un fichero,
      la máscara será de la forma /tmp/apc.XXXXXX
      (con exactamente 6 X).
      Para usar shm_open/mmap de la norma POSIX, la máscara debe contener
      .shm, como en el siguiente ejemplo:
      /apc.shm.XXXXXX. Este parámetro puede ser definido por
      /dev/zero para usar la interfaz
      /dev/zero del núcleo con una memoria usando mmap
      anónimamente. Dejar este parámetro indefinido forzará un mmap anónimo.







     apc.slam_defense
     [bool](#language.types.boolean)



      Al inicio o durante la modificación de un fichero en un servidor
      muy ocupado, varios procesos pueden entrar en competencia
      para poner en caché el mismo fichero al mismo tiempo.
      Configurar apc.slam_defense en 1
      puede ayudar a evitar que varios procesos pongan en caché
      el mismo fichero simultáneamente introduciendo un mecanismo
      de probabilidad. Si la misma clave es intentada ser puesta en caché
      en un corto lapso de tiempo por diferentes procesos, salta
      la puesta en caché para el proceso actual para mitigar los posibles
      problemas de puesta en caché.







     apc.enable_cli
     [int](#language.types.integer)



      Principalmente usado para pruebas y depuración. Definir este
      parámetro permite activar APC en la versión CLI de PHP.
      Normalmente, no es ideal crear, alimentar y
      destruir el caché APC en cada solicitud CLI. Sin embargo, en muchos escenarios de prueba es útil poder activar
      fácilmente APC en la versión CLI de PHP.







     apc.serializer
     [string](#language.types.string)



      Este parámetro permite a APC usar un serializador de terceros







     apc.coredump_unmap
     [bool](#language.types.boolean)



      Activa la gestión por APC de señales, tales como SIGSEGV, que provocan
      la escritura de ficheros core dump cuando son recibidas. Cuando estas
      señales son recibidas, APC intentará desasignar el segmento de memoria
      compartida reservado a mmap con el objetivo de excluirlo del fichero core
      dump. Esta opción puede mejorar la estabilidad del sistema cuando
      se reciben señales fatales y APC está configurado con un largo
      segmento de memoria compartida.



     **Advertencia**

       Esta opción es potencialmente peligrosa. Desasignar un segmento de
       memoria compartida usado por mmap en el gestor de señales
       fatales puede causar un comportamiento impredecible si ocurre un error fatal.




     **Nota**:



       Aunque algunos núcleos pueden proporcionar la posibilidad de ignorar
       muchos tipos de memoria compartida cuando generan un fichero
       core dump, estas implementaciones también pueden ignorar importantes
       segmentos de memoria compartida como el tablero de Apache.








     apc.preload_path
     [string](#language.types.string)



      Opcional, define una ruta hacia el directorio donde APC cargará
      los datos del caché al inicio.








     apc.use_request_time
     [bool](#language.types.boolean)



      Usa el tiempo de inicio de la solicitud de la interfaz SAPI
      para la duración de vida (TTL).


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[APC_ITER_ALL](#constant.apc-iter-all)**
     ([int](#language.types.integer))









     **[APC_ITER_ATIME](#constant.apc-iter-atime)**
     ([int](#language.types.integer))









     **[APC_ITER_CTIME](#constant.apc-iter-ctime)**
     ([int](#language.types.integer))









     **[APC_ITER_DEVICE](#constant.apc-iter-device)**
     ([int](#language.types.integer))









     **[APC_ITER_DTIME](#constant.apc-iter-dtime)**
     ([int](#language.types.integer))









     **[APC_ITER_FILENAME](#constant.apc-iter-filename)**
     ([int](#language.types.integer))









     **[APC_ITER_INODE](#constant.apc-iter-inode)**
     ([int](#language.types.integer))









     **[APC_ITER_KEY](#constant.apc-iter-key)**
     ([int](#language.types.integer))









     **[APC_ITER_MD5](#constant.apc-iter-md5)**
     ([int](#language.types.integer))









     **[APC_ITER_MEM_SIZE](#constant.apc-iter-mem-size)**
     ([int](#language.types.integer))









     **[APC_ITER_MTIME](#constant.apc-iter-mtime)**
     ([int](#language.types.integer))









     **[APC_ITER_NONE](#constant.apc-iter-none)**
     ([int](#language.types.integer))









     **[APC_ITER_NUM_HITS](#constant.apc-iter-num-hits)**
     ([int](#language.types.integer))









     **[APC_ITER_REFCOUNT](#constant.apc-iter-refcount)**
     ([int](#language.types.integer))









     **[APC_ITER_TTL](#constant.apc-iter-ttl)**
     ([int](#language.types.integer))









     **[APC_ITER_TYPE](#constant.apc-iter-type)**
     ([int](#language.types.integer))









     **[APC_ITER_VALUE](#constant.apc-iter-value)**
     ([int](#language.types.integer))









     **[APC_LIST_ACTIVE](#constant.apc-list-active)**
     ([int](#language.types.integer))









     **[APC_LIST_DELETED](#constant.apc-list-deleted)**
     ([int](#language.types.integer))






# Funciones APCu

# apcu_add

(PECL apcu &gt;= 4.0.0)

apcu_add —
Almacena en caché una nueva variable en el almacén de datos

### Descripción

**apcu_add**([string](#language.types.string) $key, [mixed](#language.types.mixed) $var, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

**apcu_add**([array](#language.types.array) $values, [mixed](#language.types.mixed) $unused = NULL, [int](#language.types.integer) $ttl = 0): [array](#language.types.array)

Almacena en caché una variable en el almacén de datos, solo si no ha sido ya almacenada.

**Nota**:

    A diferencia de muchos otros mecanismos en PHP, las variables almacenadas
    utilizando **apcu_add()** persistirán entre las peticiones (hasta que
    sus valores sean retirados del caché).

### Parámetros

     key


       Almacena la variable utilizando este nombre de clave. Cada clave es única en el caché,
       intentar utilizar **apcu_add()** para almacenar un dato con una
       clave key ya existente no sobrescribirá el dato sino que devolverá
       el valor **[false](#constant.false)**. (Esta es la única diferencia entre
       las funciones **apcu_add()** y [apcu_store()](#function.apcu-store).)






     var


       La variable a almacenar.






     ttl


       Duración de vida; almacena la variable var en el caché durante
       ttl segundos. Después de la expiración de
       ttl, la variable almacenada será retirada del caché (en la
       próxima petición). Si no se pasa ningún valor a
       ttl (o si el valor de ttl es
       0), la variable persistirá hasta que sea retirada
       manualmente del caché, o, de lo contrario, fallará al salir del caché (durante un
       borrado, reinicio, etc.).






     values


       Los nombres son proporcionados por las claves del array values,
       las variables por los valores.





### Valores devueltos

Devuelve TRUE si una variable ha sido efectivamente añadida al caché, FALSE en caso contrario.
La segunda sintaxis devuelve un array con las claves erróneas.

### Ejemplos

    **Ejemplo #1 Un ejemplo con apcu_add()**

&lt;?php
$bar = 'BAR';
apcu_add('foo', $bar);
var_dump(apcu_fetch('foo'));
echo "\n";
$bar = 'NEVER GETS SET';
apcu_add('foo', $bar);
var_dump(apcu_fetch('foo'));
echo "\n";
?&gt;

    El ejemplo anterior mostrará:

string(3) "BAR"
string(3) "BAR"

### Ver también

    - [apcu_store()](#function.apcu-store) - Almacena una variable en la caché de datos

    - [apcu_fetch()](#function.apcu-fetch) - Recupera una variable almacenada en la caché

    - [apcu_delete()](#function.apcu-delete) - Elimina una variable almacenada en caché

# apcu_cache_info

(PECL apcu &gt;= 4.0.0)

apcu_cache_info —
Recupera la información almacenada en la memoria APCu

### Descripción

**apcu_cache_info**([bool](#language.types.boolean) $limited = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

Recupera la información almacenada y los metadatos del almacén de datos de la APC.

### Parámetros

     limited


       Si el parámetro limited es **[true](#constant.true)**, el
       valor devuelto excluirá la lista individual de entradas de la memoria caché. Esto
       es útil cuando se intentan optimizar las llamadas para la recopilación de estadísticas.





### Valores devueltos

Array de datos en caché (y metadatos) o **[false](#constant.false)** si ocurre un error

**Nota**:

    **apcu_cache_info()** hará una advertencia si no puede recuperar
    los datos de la caché del APC. Esto suele ocurrir cuando el APC no está activado.

### Historial de cambios

       Versión
       Descripción






       PECL apcu 3.0.11

        El parámetro limited fué introducido.




       PECL apcu 3.0.16

        La opción "filehits" para el
        parámetro cache_type fué introducido.





### Ejemplos

    **Ejemplo #1 Un ejemplo de apcu_cache_info()**

&lt;?php
print_r(apcu_cache_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[num_slots] =&gt; 2000
[ttl] =&gt; 0
[num_hits] =&gt; 9
[num_misses] =&gt; 3
[start_time] =&gt; 1123958803
[cache_list] =&gt; Array
(
[0] =&gt; Array
(
[filename] =&gt; /path/to/apcu_test.php
[device] =&gt; 29954
[inode] =&gt; 1130511
[type] =&gt; file
[num_hits] =&gt; 1
[mtime] =&gt; 1123960686
[creation_time] =&gt; 1123960696
[deletion_time] =&gt; 0
[access_time] =&gt; 1123962864
[ref_count] =&gt; 1
[mem_size] =&gt; 677
)
[1] =&gt; Array (...iterates for each cached file)
)

### Ver también

    - [APCu configuration directives](#apcu.configuration)

    - [APCUIterator::getTotalSize()](#apcuiterator.gettotalsize) - Obtiene el tamaño total del caché

    - [APCUIterator::getTotalHits()](#apcuiterator.gettotalhits) - Obtener resultados totales de la memoria caché

    - [APCUIterator::getTotalCount()](#apcuiterator.gettotalcount) - Obtiene el conteo total

# apcu_cas

(PECL apcu &gt;= 4.0.0)

apcu_cas — Actualiza un valor antiguo con un nuevo valor

### Descripción

**apcu_cas**([string](#language.types.string) $key, [int](#language.types.integer) $old, [int](#language.types.integer) $new): [bool](#language.types.boolean)

**apcu_cas()** actualiza un valor entero ya existente si el
parámetro old coincide el valor almacenado
actualmente con el valor del parámetro new.

### Parámetros

    key


      La clave del valor que se está actualizando.






    old


      El valor antiguo (el valor actualmente almacenado).






    new


      El nuevo valor al que actualizar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de apcu_cas()**

&lt;?php
apcu_store('foobar', 2);
echo '$foobar = 2', PHP_EOL;
echo '$foobar == 1 ? 2 : 1 = ', (apcu_cas('foobar', 1, 2) ? 'ok' : 'fail'), PHP_EOL;
echo '$foobar == 2 ? 1 : 2 = ', (apcu_cas('foobar', 2, 1) ? 'ok' : 'fail'), PHP_EOL;

echo '$foobar = ', apcu_fetch('foobar'), PHP_EOL;

echo '$f**bar == 1 ? 2 : 1 = ', (apcu_cas('f**bar', 1, 2) ? 'ok' : 'fail'), PHP_EOL;

apcu_store('perfection', 'xyz');
echo '$perfection == 2 ? 1 : 2 = ', (apcu_cas('perfection', 2, 1) ? 'ok' : 'epic fail'), PHP_EOL;

echo '$foobar = ', apcu_fetch('foobar'), PHP_EOL;
?&gt;

Resultado del ejemplo anterior es similar a:

$foobar = 2
$foobar == 1 ? 2 : 1 = fail
$foobar == 2 ? 1 : 2 = ok
$foobar = 1
$f__bar == 1 ? 2 : 1 = fail
$perfection == 2 ? 1 : 2 = epic fail
$foobar = 1

### Ver también

- [apcu_dec()](#function.apcu-dec) - Disminuir un número almacenado

- [apcu_store()](#function.apcu-store) - Almacena una variable en la caché de datos

# apcu_clear_cache

(PECL apcu &gt;= 4.0.0)

apcu_clear_cache —
Limpia el caché del APCu

### Descripción

**apcu_clear_cache**(): [bool](#language.types.boolean)

Limpia el caché.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve siempre **[true](#constant.true)**

### Ver también

    - [apcu_cache_info()](#function.apcu-cache-info) - Recupera la información almacenada en la memoria APCu

# apcu_dec

(PECL apcu &gt;= 4.0.0)

apcu_dec — Disminuir un número almacenado

### Descripción

**apcu_dec**(
    [string](#language.types.string) $key,
    [int](#language.types.integer) $step = 1,
    [bool](#language.types.boolean) &amp;$success = ?,
    [int](#language.types.integer) $ttl = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Disminuye un valor entero almacenado.

### Parámetros

    key


      La clave de el valor a ser disminuido.






    step


      El paso, o valor a disminuir.






    success


      Opcionalmente pasa el valor booleano en caso de éxito o
      en caso de error a esta variable referenciada.






    ttl


      TTL para usar si la operación inserta un nuevo valor (en lugar de disminuir uno existente).


### Valores devueltos

Devuelve el valor actual del valor de las claves (key) en caso de éxito,
o **[false](#constant.false)** si ocurre un error

### Ejemplos

**Ejemplo #1 Ejemplo de apcu_dec()**

&lt;?php
echo "Let's do something with success", PHP_EOL;

apcu_store('anumber', 42);

echo apcu_fetch('anumber'), PHP_EOL;

echo apcu_dec('anumber'), PHP_EOL;
echo apcu_dec('anumber', 10), PHP_EOL;
echo apcu_dec('anumber', 10, $success), PHP_EOL;

var_dump($success);

echo "Now, let's fail", PHP_EOL, PHP_EOL;

apcu_store('astring', 'foo');

$ret = apcu_dec('astring', 1, $fail);

var_dump($ret);
var_dump($fail);
?&gt;

Resultado del ejemplo anterior es similar a:

Let's do something with success
42
41
31
21
bool(true)
Now, let's fail

bool(false)
bool(false)

### Ver también

- [apcu_inc()](#function.apcu-inc) - Incrementa un número almacenado

# apcu_delete

(PECL apcu &gt;= 4.0.0)

apcu_delete —
Elimina una variable almacenada en caché

### Descripción

**apcu_delete**([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)

Elimina una variable almacenada en caché.

### Parámetros

     key


       Una clave (key) empleada para almacenar el valor como un
       [string](#language.types.string) para una única clave,
       o como un [array](#language.types.array) de strings para varias claves,
       o como un [object](#language.types.object) [APCUIterator](#class.apcuiterator).





### Valores devueltos

Si key es una [array](#language.types.array), se devuelve una [array](#language.types.array) indexada de las claves.
De lo contrario, se devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Un ejemplo deapcu_delete()**

&lt;?php
$bar = 'BAR';
apcu_store('foo', $bar);
apcu_delete('foo');
// obviamente, esto no es útil de esta forma

// Alternativamente, borrar varias claves.
apcu_delete(['foo', 'bar', 'baz']);

// O utilizar un Iterator con una expresión regular.
apcu*delete(new APCUIterator('#^myprefix*#'));
?&gt;

### Ver también

    - [apcu_store()](#function.apcu-store) - Almacena una variable en la caché de datos

    - [apcu_fetch()](#function.apcu-fetch) - Recupera una variable almacenada en la caché

    - [apcu_clear_cache()](#function.apcu-clear-cache) - Limpia el caché del APCu

    - [APCUIterator](#class.apcuiterator)

# apcu_enabled

(PECL apcu &gt;= 4.0.3)

apcu_enabled — Si el APCu es utilizable en el entorno actual

### Descripción

**apcu_enabled**(): [bool](#language.types.boolean)

Devuelve si el APCu es utilizable en el entorno actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** uando el APCu es utilizable en el entorno actual, **[false](#constant.false)** en caso contrario.

# apcu_entry

(PECL apcu &gt;= 5.1.0)

apcu_entry —
Recupera o genera de forma atómica una entrada de caché

### Descripción

**apcu_entry**([string](#language.types.string) $key, [callable](#language.types.callable) $callback, [int](#language.types.integer) $ttl = 0): [mixed](#language.types.mixed)

Intenta de forma atómica encontrar key en la caché; si no se encuentra, se llama a callback,
pasando key como único argumento. El valor de retorno de la llamada se almacena en caché con el ttl
especificado opcionalmente y se devuelve.

**Nota**:

    Cuando el control entra en **apcu_entry()**, se adquiere de forma exclusiva el bloqueo de la caché, que se libera cuando el control
    sale de **apcu_entry()**. En efecto, esto convierte el cuerpo de callback en una sección crítica, impidiendo que
    dos procesos ejecuten las mismas rutas de código concurrentemente. Además, prohíbe la ejecución concurrente de cualquier otra función de APCu,
    ya que adquirirán el mismo bloqueo.

**Advertencia**

    La única función de APCu que puede llamarse de forma segura desde callback es **apcu_entry()**.

### Parámetros

     key


       Identificador de la entrada de caché






     callback


       Una retrollamada que acepta key como único argumento y devuelve el valor a almacenar en caché.






     ttl


       Tiempo de vida; almacena el valor de retorno del callback en la caché durante
       ttl segundos. Después de que
       ttl haya transcurrido, la entrada almacenada será
       eliminada de la caché (en la siguiente petición). Si no se proporciona ttl
       (o si el ttl es
       0), el valor persistirá hasta que se elimine manualmente de
       la caché, o deje de existir en la caché (limpieza,
       reinicio, etc.).





### Valores devueltos

Devuelve el valor almacenado en caché

### Ejemplos

    **Ejemplo #1 Un ejemplo de apcu_entry()**

&lt;?php
$config = apcu_entry("config", function($key) {
return [
"fruit" =&gt; apcu_entry("config.fruit", function($key){
     return [
       "apples",
       "pears"
     ];
   }),
   "people" =&gt; apcu_entry("config.people", function($key){
return [
"bob",
"joe",
"niki"
];
})
];
});

var_dump($config);
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["fruit"]=&gt;
array(2) {
[0]=&gt;
string(6) "apples"
[1]=&gt;
string(5) "pears"
}
["people"]=&gt;
array(3) {
[0]=&gt;
string(3) "bob"
[1]=&gt;
string(3) "joe"
[2]=&gt;
string(4) "niki"
}
}

### Ver también

    - [apcu_store()](#function.apcu-store) - Almacena una variable en la caché de datos

    - [apcu_fetch()](#function.apcu-fetch) - Recupera una variable almacenada en la caché

    - [apcu_delete()](#function.apcu-delete) - Elimina una variable almacenada en caché

# apcu_exists

(PECL apcu &gt;= 4.0.0)

apcu_exists — Verifica si una entrada existe

### Descripción

**apcu_exists**([string](#language.types.string)|[array](#language.types.array) $keys): [bool](#language.types.boolean)|[array](#language.types.array)

Verifica si una o varias entradas APCu existen.

### Parámetros

    keys


      Un [string](#language.types.string) o un [array](#language.types.array) de
      strings que contiene las claves.


### Valores devueltos

Devuelve el valor **[true](#constant.true)** si la clave existe, o **[false](#constant.false)** en caso contrario.
O bien, si un [array](#language.types.array) ha sido pasado a keys,
entonces el valor devuelto es un array conteniendo todas las claves
existentes, o un array vacío si ninguna existe.

### Ejemplos

**Ejemplo #1 Un ejemplo con apcu_exists()**

&lt;?php
$fruit  = 'apple';
$veggie = 'carrot';

apcu_store('foo', $fruit);
apcu_store('bar', $veggie);

if (apcu_exists('foo')) {
echo "Foo existe: ";
echo apcu_fetch('foo');
} else {
echo "Foo no existe";
}

echo PHP_EOL;
if (apcu_exists('baz')) {
echo "Baz existe.";
} else {
echo "Baz no existe";
}

echo PHP_EOL;

$ret = apcu_exists(array('foo', 'donotexist', 'bar'));
var_dump($ret);

?&gt;

Resultado del ejemplo anterior es similar a:

Foo existe: apple
Baz no existe
array(2) {
["foo"]=&gt;
bool(true)
["bar"]=&gt;
bool(true)
}

### Ver también

- [apcu_cache_info()](#function.apcu-cache-info) - Recupera la información almacenada en la memoria APCu

- [apcu_fetch()](#function.apcu-fetch) - Recupera una variable almacenada en la caché

# apcu_fetch

(PECL apcu &gt;= 4.0.0)

apcu_fetch —
Recupera una variable almacenada en la caché

### Descripción

**apcu_fetch**([mixed](#language.types.mixed) $key, [bool](#language.types.boolean) &amp;$success = ?): [mixed](#language.types.mixed)

Recupera una entrada de la caché.

### Parámetros

     key


       La clave key utilizada para almacenar el valor
       (con [apcu_store()](#function.apcu-store)). Si se pasa un array, entonces cada elemento es recuperado y devuelto.






     success


       Definido como **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** en caso de fallo.





### Valores devueltos

La variable o el array de variables almacenado en caso de éxito;
**[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      PECL apcu 3.0.17

       El parámetro success ha sido añadido.



### Ejemplos

    **Ejemplo #1 Un ejemplo con apcu_fetch()**

&lt;?php
$bar = 'BAR';
apcu_store('foo', $bar);
var_dump(apcu_fetch('foo'));
?&gt;

    El ejemplo anterior mostrará:

string(3) "BAR"

### Ver también

    - [apcu_store()](#function.apcu-store) - Almacena una variable en la caché de datos

    - [apcu_delete()](#function.apcu-delete) - Elimina una variable almacenada en caché

    - [APCUIterator](#class.apcuiterator)

# apcu_inc

(PECL apcu &gt;= 4.0.0)

apcu_inc — Incrementa un número almacenado

### Descripción

**apcu_inc**(
    [string](#language.types.string) $key,
    [int](#language.types.integer) $step = 1,
    [bool](#language.types.boolean) &amp;$success = ?,
    [int](#language.types.integer) $ttl = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Incrementa un número almacenado.

### Parámetros

    key


      La clave del valor que debe ser incrementado.






    step


      El paso de incrementación o el valor a añadir.






    success


      Opcional, pasa el valor booleano éxito o fallo a la variable referenciada.






    ttl


      Duración de vida a utilizar si la función inserta una nueva variable (en lugar de incrementar una variable existente).


### Valores devueltos

Devuelve el valor actual asociado a la clave key en caso de éxito,
o **[false](#constant.false)** si ocurre un error

### Ejemplos

**Ejemplo #1 Un ejemplo con apcu_inc()**

&lt;?php
echo "Hagamos algo con éxito", PHP_EOL;

apcu_store('anumber', 42);

echo apcu_fetch('anumber'), PHP_EOL;

echo apcu_inc('anumber'), PHP_EOL;
echo apcu_inc('anumber', 10), PHP_EOL;
echo apcu_inc('anumber', 10, $success), PHP_EOL;

var_dump($success);

echo "Ahora, hagamos que falle", PHP_EOL, PHP_EOL;

apcu_store('astring', 'foo');

$ret = apcu_inc('astring', 1, $fail);

var_dump($ret);
var_dump($fail);
?&gt;

Resultado del ejemplo anterior es similar a:

Hagamos algo con éxito
42
43
53
63
bool(true)
Ahora, hagamos que falle

bool(false)
bool(false)

### Ver también

- [apcu_dec()](#function.apcu-dec) - Disminuir un número almacenado

# apcu_key_info

(No version information available, might only be in Git)

apcu_key_info —
Devuelve información detallada sobre la clave de caché

### Descripción

**apcu_key_info**([string](#language.types.string) $key): [?](#language.types.null)[array](#language.types.array)

Devuelve información detallada sobre la clave de caché.

### Parámetros

     key


       Nombre de la clave.





### Valores devueltos

Un array que contiene información detallada sobre la clave de caché,
o el valor **[null](#constant.null)** si la clave no existe.

### Ejemplos

    **Ejemplo #1 Un ejemplo con apcu_key_info()**

&lt;?php
apcu_add('a','b');
var_dump(apcu_key_info('a'));
?&gt;

    El ejemplo anterior mostrará:

array(7) {
["hits"]=&gt;
int(0)
["access_time"]=&gt;
int(1606701783)
["mtime"]=&gt;
int(1606701783)
["creation_time"]=&gt;
int(1606701783)
["deletion_time"]=&gt;
int(0)
["ttl"]=&gt;
int(0)
["refs"]=&gt;
int(0)
}

### Ver también

    - [apcu_store()](#function.apcu-store) - Almacena una variable en la caché de datos

    - [apcu_fetch()](#function.apcu-fetch) - Recupera una variable almacenada en la caché

    - [apcu_delete()](#function.apcu-delete) - Elimina una variable almacenada en caché

# apcu_sma_info

(PECL apcu &gt;= 4.0.0)

apcu_sma_info —
Devuelve información sobre la Asignación de Memoria Compartida de APCu

### Descripción

**apcu_sma_info**([bool](#language.types.boolean) $limited = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve información sobre la Asignación de Memoria Compartida de APCu.

### Parámetros

     limited


       Cuando el valor **[false](#constant.false)** es pasado (por omisión) a este argumento,
       la función **apcu_sma_info()** devuelve información
       detallada sobre cada segmento.





### Valores devueltos

Un array de datos sobre la Asignación de Memoria Compartida;
**[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Un ejemplo con apcu_sma_info()**

&lt;?php
print_r(apcu_sma_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[num_seg] =&gt; 1
[seg_size] =&gt; 31457280
[avail_mem] =&gt; 31448408
[block_lists] =&gt; Array
(
[0] =&gt; Array
(
[0] =&gt; Array
(
[size] =&gt; 31448408
[offset] =&gt; 8864
)

                )

        )

)

### Ver también

    -
     [Directivas de configuración de APCu](#apcu.configuration)

# apcu_store

(PECL apcu &gt;= 4.0.0)

apcu_store —
Almacena una variable en la caché de datos

### Descripción

**apcu_store**([string](#language.types.string) $key, [mixed](#language.types.mixed) $var, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

**apcu_store**([array](#language.types.array) $values, [mixed](#language.types.mixed) $unused = NULL, [int](#language.types.integer) $ttl = 0): [array](#language.types.array)

Almacena una variable en la caché de datos.

**Nota**:

    A diferencia de muchos otros mecanismos en PHP, las variables almacenadas
    utilizando **apcu_store()** persistirán entre las peticiones (hasta que
    sus valores sean retirados de la caché).

### Parámetros

     key


       Almacena la variable utilizando este nombre de clave. Cada clave es única en la caché,
       almacenar un segundo valor con el mismo parámetro key
       sobrescribirá el valor original.






     var


       La variable a almacenar.






     ttl


       Duración de vida; almacena la variable var en la caché durante
       un tiempo de ttl segundos. Después de la expiración de
       ttl, la variable almacenada será retirada de la caché (en la
       próxima petición). Si no se pasa ningún valor al parámetro
       ttl (o si el valor de ttl es
       0), la variable persistirá hasta que sea retirada
       manualmente de la caché, o, de lo contrario, fallará al salir de la caché (durante un
       borrado, reinicio, etc.).






     values


       Los nombres son proporcionados por las claves del array values,
       las variables por los valores.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
La segunda sintaxis devuelve un array con las claves erróneas.

### Ejemplos

    **Ejemplo #1 Un ejemplo con apcu_store()**

&lt;?php
$bar = 'BAR';
apcu_store('foo', $bar);
var_dump(apcu_fetch('foo'));
?&gt;

    El ejemplo anterior mostrará:

string(3) "BAR"

### Ver también

    - [apcu_add()](#function.apcu-add) - Almacena en caché una nueva variable en el almacén de datos

    - [apcu_fetch()](#function.apcu-fetch) - Recupera una variable almacenada en la caché

    - [apcu_delete()](#function.apcu-delete) - Elimina una variable almacenada en caché

## Tabla de contenidos

- [apcu_add](#function.apcu-add) — Almacena en caché una nueva variable en el almacén de datos
- [apcu_cache_info](#function.apcu-cache-info) — Recupera la información almacenada en la memoria APCu
- [apcu_cas](#function.apcu-cas) — Actualiza un valor antiguo con un nuevo valor
- [apcu_clear_cache](#function.apcu-clear-cache) — Limpia el caché del APCu
- [apcu_dec](#function.apcu-dec) — Disminuir un número almacenado
- [apcu_delete](#function.apcu-delete) — Elimina una variable almacenada en caché
- [apcu_enabled](#function.apcu-enabled) — Si el APCu es utilizable en el entorno actual
- [apcu_entry](#function.apcu-entry) — Recupera o genera de forma atómica una entrada de caché
- [apcu_exists](#function.apcu-exists) — Verifica si una entrada existe
- [apcu_fetch](#function.apcu-fetch) — Recupera una variable almacenada en la caché
- [apcu_inc](#function.apcu-inc) — Incrementa un número almacenado
- [apcu_key_info](#function.apcu-key-info) — Devuelve información detallada sobre la clave de caché
- [apcu_sma_info](#function.apcu-sma-info) — Devuelve información sobre la Asignación de Memoria Compartida de APCu
- [apcu_store](#function.apcu-store) — Almacena una variable en la caché de datos

# La clase APCUIterator

(PECL apcu &gt;= 5.0.0)

## Introducción

    La clase **APCUIterator** hace más fácil iterar
    sobre grandes cachés de APCu. Esto es útil ya que permite iterar sobre grandes
    cachés en pasos, al mismo tiempo que captura un número definido de entradas por instancia de bloqueo,
    por lo que libera los bloqueos de caché para otras actividades en lugar de mantener todo el caché
    para obtener 100 entradas (el valor por defecto). Además, utilizar comparación por expresiones regulares
    es más eficiente ya que se ha movido al nivel de C.

## Sinopsis de la Clase

    ****




      class **APCUIterator**


     implements
       [Iterator](#class.iterator) {


    /* Métodos */

public [\_\_construct](#apcuiterator.construct)(
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $search = **[null](#constant.null)**,
    [int](#language.types.integer) $format = APC_ITER_ALL,
    [int](#language.types.integer) $chunk_size = 100,
    [int](#language.types.integer) $list = APC_LIST_ACTIVE
)

    public [current](#apcuiterator.current)(): [mixed](#language.types.mixed)

public [getTotalCount](#apcuiterator.gettotalcount)(): [int](#language.types.integer)
public [getTotalHits](#apcuiterator.gettotalhits)(): [int](#language.types.integer)
public [getTotalSize](#apcuiterator.gettotalsize)(): [int](#language.types.integer)
public [key](#apcuiterator.key)(): [string](#language.types.string)
public [next](#apcuiterator.next)(): [bool](#language.types.boolean)
public [rewind](#apcuiterator.rewind)(): [void](language.types.void.html)
public [valid](#apcuiterator.valid)(): [bool](#language.types.boolean)

}

# APCUIterator::\_\_construct

(PECL apcu &gt;= 5.0.0)

APCUIterator::\_\_construct — Construye un objeto iterador APCUIterator

### Descripción

public **APCUIterator::\_\_construct**(
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $search = **[null](#constant.null)**,
    [int](#language.types.integer) $format = APC_ITER_ALL,
    [int](#language.types.integer) $chunk_size = 100,
    [int](#language.types.integer) $list = APC_LIST_ACTIVE
)

Construye un [APCUIterator](#class.apcuiterator) [object](#language.types.object).

### Parámetros

    search


      O bien una expresión regular [PCRE](#book.pcre)
      que coincide con nombres de clave APCu, dada como [string](#language.types.string).
      O una [array](#language.types.array) de [string](#language.types.string)s con nombres de claves APCu.
      O, opcionalmente **[null](#constant.null)** para omitir la búsqueda.






    format


      El formato deseado, tal como está configurado con una o más de las
      constantes [APC_ITER_*](#apcu.constants).






    chunk_size


      El tamaño del fragmento. Debe ser un valor mayor que 0. El valor por defecto
      es 100.






    list


      El tipo de lista. O bien pasar en **[APC_LIST_ACTIVE](#constant.apc-list-active)**
      o **[APC_LIST_DELETED](#constant.apc-list-deleted)**.


### Ejemplos

    **Ejemplo #1 Un ejemplo de APCUIterator::__construct()**

&lt;?php
foreach (new APCUIterator('/^counter\./') as $counter) {
    echo "$counter[key]: $counter[value]\n";
    apc_dec($counter['key'], $counter['value']);
}
?&gt;

### Ver también

- [apcu_exists()](#function.apcu-exists) - Verifica si una entrada existe

- [apcu_cache_info()](#function.apcu-cache-info) - Recupera la información almacenada en la memoria APCu

# APCUIterator::current

(PECL apcu &gt;= 5.0.0)

APCUIterator::current — Obtener el elemento actual

### Descripción

public **APCUIterator::current**(): [mixed](#language.types.mixed)

Obtiene el elemento actual de la pila [APCUIterator](#class.apcuiterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el elemento actual en caso de éxito, o **[false](#constant.false)** si no
hay más elementos o no existen, o en caso de error.

### Ver también

- [APCUIterator::next()](#apcuiterator.next) - Mueve el puntero al siguiente elemento

- [Iterator::current()](#iterator.current) - Devuelve el elemento actual

# APCUIterator::getTotalCount

(PECL apcu &gt;= 5.0.0)

APCUIterator::getTotalCount — Obtiene el conteo total

### Descripción

public **APCUIterator::getTotalCount**(): [int](#language.types.integer)

Obtener el conteo total.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El conteo total.

### Ver también

- [APCUIterator::getTotalHits()](#apcuiterator.gettotalhits) - Obtener resultados totales de la memoria caché

- [APCUIterator::getTotalSize()](#apcuiterator.gettotalsize) - Obtiene el tamaño total del caché

- [apcu_cache_info()](#function.apcu-cache-info) - Recupera la información almacenada en la memoria APCu

# APCUIterator::getTotalHits

(PECL apcu &gt;= 5.0.0)

APCUIterator::getTotalHits — Obtener resultados totales de la memoria caché

### Descripción

public **APCUIterator::getTotalHits**(): [int](#language.types.integer)

Obtiene el número total de visitas a la memoria caché.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de visitas en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

- [APCUIterator::getTotalCount()](#apcuiterator.gettotalcount) - Obtiene el conteo total

- [APCUIterator::getTotalSize()](#apcuiterator.gettotalsize) - Obtiene el tamaño total del caché

- [apcu_cache_info()](#function.apcu-cache-info) - Recupera la información almacenada en la memoria APCu

# APCUIterator::getTotalSize

(PECL apcu &gt;= 5.0.0)

APCUIterator::getTotalSize — Obtiene el tamaño total del caché

### Descripción

public **APCUIterator::getTotalSize**(): [int](#language.types.integer)

Obtiene el tamaño total del caché.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El tamaño total del caché.

### Ver también

- [APCUIterator::getTotalCount()](#apcuiterator.gettotalcount) - Obtiene el conteo total

- [APCUIterator::getTotalHits()](#apcuiterator.gettotalhits) - Obtener resultados totales de la memoria caché

- **apc_cache_info()**

# APCUIterator::key

(PECL apcu &gt;= 5.0.0)

APCUIterator::key — Obtiene la clave del iterador

### Descripción

public **APCUIterator::key**(): [string](#language.types.string)

Obtiene la clave del iterador actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la clave en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

- [APCUIterator::current()](#apcuiterator.current) - Obtener el elemento actual

- [Iterator::key()](#iterator.key) - Devuelve la clave del elemento actual

# APCUIterator::next

(PECL apcu &gt;= 5.0.0)

APCUIterator::next — Mueve el puntero al siguiente elemento

### Descripción

public **APCUIterator::next**(): [bool](#language.types.boolean)

Mueve el puntero del iterador al siguiente elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [APCUIterator::current()](#apcuiterator.current) - Obtener el elemento actual

- [APCUIterator::rewind()](#apcuiterator.rewind) - Rebobina el iterador

- [Iterator::next()](#iterator.next) - Avanza al siguiente elemento

# APCUIterator::rewind

(PECL apcu &gt;= 5.0.0)

APCUIterator::rewind — Rebobina el iterador

### Descripción

public **APCUIterator::rewind**(): [void](language.types.void.html)

Rebobina el iterador hasta el primer elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [APCUIterator::next()](#apcuiterator.next) - Mueve el puntero al siguiente elemento

- [Iterator::next()](#iterator.next) - Avanza al siguiente elemento

# APCUIterator::valid

(PECL apcu &gt;= 5.0.0)

APCUIterator::valid — Comprueba si la posición actual es válida

### Descripción

public **APCUIterator::valid**(): [bool](#language.types.boolean)

Comprueba si la posición actual del iterador es válida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la posición actual del iterador es válida, en caso contrario **[false](#constant.false)**.

### Ver también

- [APCUIterator::current()](#apcuiterator.current) - Obtener el elemento actual

- [Iterator::valid()](#iterator.valid) - Comprueba si la posición actual es válido

## Tabla de contenidos

- [APCUIterator::\_\_construct](#apcuiterator.construct) — Construye un objeto iterador APCUIterator
- [APCUIterator::current](#apcuiterator.current) — Obtener el elemento actual
- [APCUIterator::getTotalCount](#apcuiterator.gettotalcount) — Obtiene el conteo total
- [APCUIterator::getTotalHits](#apcuiterator.gettotalhits) — Obtener resultados totales de la memoria caché
- [APCUIterator::getTotalSize](#apcuiterator.gettotalsize) — Obtiene el tamaño total del caché
- [APCUIterator::key](#apcuiterator.key) — Obtiene la clave del iterador
- [APCUIterator::next](#apcuiterator.next) — Mueve el puntero al siguiente elemento
- [APCUIterator::rewind](#apcuiterator.rewind) — Rebobina el iterador
- [APCUIterator::valid](#apcuiterator.valid) — Comprueba si la posición actual es válida

- [Introducción](#intro.apcu)
- [Instalación/Configuración](#apcu.setup)<li>[Instalación](#apcu.installation)
- [Configuración en tiempo de ejecución](#apcu.configuration)
  </li>- [Constantes predefinidas](#apcu.constants)
- [Funciones APCu](#ref.apcu)<li>[apcu_add](#function.apcu-add) — Almacena en caché una nueva variable en el almacén de datos
- [apcu_cache_info](#function.apcu-cache-info) — Recupera la información almacenada en la memoria APCu
- [apcu_cas](#function.apcu-cas) — Actualiza un valor antiguo con un nuevo valor
- [apcu_clear_cache](#function.apcu-clear-cache) — Limpia el caché del APCu
- [apcu_dec](#function.apcu-dec) — Disminuir un número almacenado
- [apcu_delete](#function.apcu-delete) — Elimina una variable almacenada en caché
- [apcu_enabled](#function.apcu-enabled) — Si el APCu es utilizable en el entorno actual
- [apcu_entry](#function.apcu-entry) — Recupera o genera de forma atómica una entrada de caché
- [apcu_exists](#function.apcu-exists) — Verifica si una entrada existe
- [apcu_fetch](#function.apcu-fetch) — Recupera una variable almacenada en la caché
- [apcu_inc](#function.apcu-inc) — Incrementa un número almacenado
- [apcu_key_info](#function.apcu-key-info) — Devuelve información detallada sobre la clave de caché
- [apcu_sma_info](#function.apcu-sma-info) — Devuelve información sobre la Asignación de Memoria Compartida de APCu
- [apcu_store](#function.apcu-store) — Almacena una variable en la caché de datos
  </li>- [APCUIterator](#class.apcuiterator) — La clase APCUIterator<li>[APCUIterator::__construct](#apcuiterator.construct) — Construye un objeto iterador APCUIterator
- [APCUIterator::current](#apcuiterator.current) — Obtener el elemento actual
- [APCUIterator::getTotalCount](#apcuiterator.gettotalcount) — Obtiene el conteo total
- [APCUIterator::getTotalHits](#apcuiterator.gettotalhits) — Obtener resultados totales de la memoria caché
- [APCUIterator::getTotalSize](#apcuiterator.gettotalsize) — Obtiene el tamaño total del caché
- [APCUIterator::key](#apcuiterator.key) — Obtiene la clave del iterador
- [APCUIterator::next](#apcuiterator.next) — Mueve el puntero al siguiente elemento
- [APCUIterator::rewind](#apcuiterator.rewind) — Rebobina el iterador
- [APCUIterator::valid](#apcuiterator.valid) — Comprueba si la posición actual es válida
  </li>
