# Memcache

# Introducción

El módulo Memcache proporciona una interfaz procedimental manejable
así como orientada a objetos a Memcache, un demonio altamente eficiente en
la gestión de la caché, que está principalmente destinado a reducir la carga de las bases
de datos en las aplicaciones web dinámicas.

El módulo Memcache proporciona asimismo un
gestor de [sesión](#ref.session) (memcache).

Más información sobre Memcache puede ser
consultada en [» http://www.memcached.org/](http://www.memcached.org/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#memcache.requirements)
- [Instalación](#memcache.installation)
- [Configuración en tiempo de ejecución](#memcache.ini)
- [Tipos de recursos](#memcache.resources)

    ## Requerimientos

    Este módulo utiliza las funciones de la biblioteca [» zlib](http://www.zlib.net/)
    para soportar la compresión de datos a la volée. Zlib es por lo tanto requerido para instalar
    este módulo.

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.
Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/memcache](https://pecl.php.net/package/memcache).

**Nota**:

Es posible desactivar el gestor de sesiones memcache. La opción 'pecl install'
pregunta por esta opción (por defecto está activada) de todas formas cuando se compila
estáticamente en PHP se puede utilizar la opción de configuración
**--disable-memcache-session**.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración memcache**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [memcache.allow_failover](#ini.memcache.allow-failover)
      "1"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcache 2.0.2.



      [memcache.max_failover_attempts](#ini.memcache.max-failover-attempts)
      "20"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcache 2.1.0.



      [memcache.chunk_size](#ini.memcache.chunk-size)
      "8192"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcache 2.0.2.



      [memcache.default_port](#ini.memcache.default-port)
      "11211"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcache 2.0.2.



      [memcache.hash_strategy](#ini.memcache.hash-strategy)
      "standard"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcache 2.2.0.



      [memcache.hash_function](#ini.memcache.hash-function)
      "crc32"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcache 2.2.0.



      [memcache.protocol](#ini.memcache.protocol)
      ascii
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 3.0.0



      [memcache.redundancy](#ini.memcache.redundancy)
      1
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 3.0.0



      [memcache.session_redundancy](#ini.memcache.session-redundancy)
      2
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 3.0.0



      [memcache.compress_threshold](#ini.memcache.compress-threshold)
      20000
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 3.0.3



      [memcache.lock_timeout](#ini.memcache.lock-timeout)
      15
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 3.0.4


   <caption>**Opciones de Configuración de Sesión que Afectan el Comportamiento de Memcache**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [session.save_handler](#ini.memcache.save-handler)
      "files"
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 2.1.2



      [session.save_path](#ini.memcache.save-path)
      ""
      **[INI_ALL](#constant.ini-all)**
      Supportado a partir de memcache 2.1.2


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    memcache.allow_failover
    [bool](#language.types.boolean)



     Si se debe cambiar a otros servidores en caso de error.








    memcache.max_failover_attempts
    [int](#language.types.integer)



     Define cuántos servidores intentar cuando se fijan o recuperan
     datos. Utilice solo en conjunción con memcache.allow_failover.








    memcache.chunk_size
    [int](#language.types.integer)



     Los datos deben transferirse en fragmentos de este tamaño;
     Configurar este valor a un valor pequeño provoca más escrituras
     en la red. Intente aumentar este valor a 32768 si se encuentran
     retrasos inexplicables.








    memcache.default_port
    [string](#language.types.string)



     El número de puerto TCP por defecto a utilizar al conectarse
     al servidor memcache si no se especifica otro puerto.








    memcache.hash_strategy
    [string](#language.types.string)



     Controla la estrategia a aplicar al mapear las claves en los servidores.
     Definir este valor a consistent para activar el hash consistente
     que permite añadir o eliminar servidores del grupo sin necesidad de
     remapear las claves. Definir este valor a standard hará que se utilice
     la estrategia antigua.








    memcache.hash_function
    [string](#language.types.string)



     Controla la función de hash a aplicar al mapear las claves
     en los servidores, crc32 utilizará el CRC32 estándar,
     mientras que fnv utilizará FNV-1a.








    memcache.protocol
    [string](#language.types.string)











    memcache.redundancy
    [int](#language.types.integer)











    memcache.session_redundancy
    [int](#language.types.integer)











    memcache.compress_threshold
    [int](#language.types.integer)











    memcache.lock_timeout
    [int](#language.types.integer)











    session.save_handler
    [string](#language.types.string)



     Utilice memcache como gestor de sesión definiendo este valor a
     memcache.








    session.save_path
    [string](#language.types.string)



     Define las URL de servidor, separadas por comas, a utilizar para el almacenamiento de
     las sesiones, por ejemplo: "tcp://host1:11211, tcp://host2:11211".




     Cada URL puede contener parámetros que serán aplicados al servidor, de la misma
     forma que para el método [Memcache::addServer()](#memcache.addserver). Por ejemplo:
     "tcp://host1:11211?persistent=1&amp;weight=1&amp;timeout=1&amp;retry_interval=15"

## Tipos de recursos

Existe una única recurso utilizado por el módulo Memcache:
es el enlace identificador que representa la conexión del servidor de caché.

# Constantes predefinidas

  <caption>**Constantes MemCache**</caption>
   
    
     
      Nombre
      Descripción


       **[MEMCACHE_COMPRESSED](#constant.memcache-compressed)**
       ([int](#language.types.integer))


       Utilizada para activar a la volada la compresión de los datos con las funciones
       [Memcache::set()](#memcache.set),
       [Memcache::add()](#memcache.add) y
       [Memcache::replace()](#memcache.replace).





       **[MEMCACHE_HAVE_SESSION](#constant.memcache-have-session)**
       ([int](#language.types.integer))


       1 si el gestor de sesión Memcache está disponible, 0 en caso contrario.





       **[MEMCACHE_USER1](#constant.memcache-user1)**
       ([int](#language.types.integer))


       Utilizado para activar los flags de aplicación definidos
       por los usuarios, con los métodos
       [Memcache::set()](#memcache.set),
       [Memcache::add()](#memcache.add) y
       [Memcache::replace()](#memcache.replace).





       **[MEMCACHE_USER2](#constant.memcache-user2)**
       ([int](#language.types.integer))


       Utilizado para activar los flags de aplicación definidos
       por los usuarios, con los métodos
       [Memcache::set()](#memcache.set),
       [Memcache::add()](#memcache.add) y
       [Memcache::replace()](#memcache.replace).





       **[MEMCACHE_USER3](#constant.memcache-user3)**
       ([int](#language.types.integer))


       Utilizado para activar los flags de aplicación definidos
       por los usuarios, con los métodos
       [Memcache::set()](#memcache.set),
       [Memcache::add()](#memcache.add) y
       [Memcache::replace()](#memcache.replace).





       **[MEMCACHE_USER4](#constant.memcache-user4)**
       ([int](#language.types.integer))


       Utilizado para activar los flags de aplicación definidos
       por los usuarios, con los métodos
       [Memcache::set()](#memcache.set),
       [Memcache::add()](#memcache.add) y
       [Memcache::replace()](#memcache.replace).



# Ejemplos

## Tabla de contenidos

- [Uso básico](#memcache.examples-overview)

    ## Uso básico

    **Ejemplo #1 Ejemplos de la extensión memcache extension**

    En este ejemplo, se guarda un objeto en cache y luego se devuelve de nuevo.
    Objetos y otros tipos no escalares se serializan antes de guardarse, por lo
    tanto es imposible guardar recursos. (ej. identificadores de conexión y otros
    tipos) en caché.

&lt;?php

$memcache = new Memcache;
$memcache-&gt;connect('localhost', 11211) or die ("No se pudo contectar");

$version = $memcache-&gt;getVersion();
echo "Versión del servidor: ".$version."&lt;br/&gt;\n";

$tmp_object = new stdClass;
$tmp_object-&gt;str_attr = 'test';
$tmp_object-&gt;int_attr = 123;

$memcache-&gt;set('key', $tmp_object, false, 10) or die ("Falló al intentar guardar datos en el servidor");
echo "Guarda datos en caché (los datos expirarán en 10 segundos)&lt;br/&gt;\n";

$get_result = $memcache-&gt;get('key');
echo "Datos desde la caché:&lt;br/&gt;\n";

var_dump($get_result);

?&gt;

    **Ejemplo #2 Usando el gestor de sesiones de memcache**

&lt;?php

$session_save_path = "tcp://$host:$port?persistent=1&amp;weight=2&amp;timeout=2&amp;retry_interval=10,  ,tcp://$host:$port ";
ini_set('session.save_handler', 'memcache');
ini_set('session.save_path', $session_save_path);

?&gt;

# La clase Memcache

(PECL memcache &gt;= 0.2.0)

## Introducción

    Representa una conexión a un conjunto de servidores memcache.

## Sinopsis de la Clase

    ****




      class **Memcache**

     {

[add](#memcache.add)(
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)
[addServer](#memcache.addserver)(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 11211,
    [bool](#language.types.boolean) $persistent = ?,
    [int](#language.types.integer) $weight = ?,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $retry_interval = ?,
    [bool](#language.types.boolean) $status = ?,
    [callable](#language.types.callable) $failure_callback = ?,
    [int](#language.types.integer) $timeoutms = ?
): [bool](#language.types.boolean)
[close](#memcache.close)(): [bool](#language.types.boolean)
[connect](#memcache.connect)([string](#language.types.string) $host, [int](#language.types.integer) $port = ?, [int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)
[decrement](#memcache.decrement)([string](#language.types.string) $key, [int](#language.types.integer) $value = 1): [int](#language.types.integer)|[false](#language.types.singleton)
[delete](#memcache.delete)([string](#language.types.string) $key, [int](#language.types.integer) $exptime = 0): [bool](#language.types.boolean)
[flush](#memcache.flush)(): [bool](#language.types.boolean)
[get](#memcache.get)([string](#language.types.string) $key, [int](#language.types.integer) &amp;$flags = ?): [string](#language.types.string)
[getExtendedStats](#memcache.getextendedstats)([string](#language.types.string) $type = ?, [int](#language.types.integer) $slabid = ?, [int](#language.types.integer) $limit = 100): [array](#language.types.array)
[getServerStatus](#memcache.getserverstatus)([string](#language.types.string) $host, [int](#language.types.integer) $port = 11211): [int](#language.types.integer)
[getStats](#memcache.getstats)([string](#language.types.string) $type = ?, [int](#language.types.integer) $slabid = ?, [int](#language.types.integer) $limit = 100): [array](#language.types.array)|[false](#language.types.singleton)
[getVersion](#memcache.getversion)(): [string](#language.types.string)|[false](#language.types.singleton)
[increment](#memcache.increment)([string](#language.types.string) $key, [int](#language.types.integer) $value = 1): [int](#language.types.integer)|[false](#language.types.singleton)
[pconnect](#memcache.pconnect)([string](#language.types.string) $host, [int](#language.types.integer) $port = ?, [int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)
[replace](#memcache.replace)(
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)
[set](#memcache.set)(
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)
[setCompressThreshold](#memcache.setcompressthreshold)([int](#language.types.integer) $threshold, [float](#language.types.float) $min_savings = ?): [bool](#language.types.boolean)
[setServerParams](#memcache.setserverparams)(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 11211,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $retry_interval = **[false](#constant.false)**,
    [bool](#language.types.boolean) $status = ?,
    [callable](#language.types.callable) $failure_callback = ?
): [bool](#language.types.boolean)

}

# Memcache::add

# memcache_add

(PECL memcache &gt;= 0.2.0)

Memcache::add -- memcache_add — Añade un elemento en el servidor

### Descripción

**Memcache::add**(
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)

**memcache_add**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)

**Memcache::add()** almacena la variable
var con la clave key solo si esta
clave no existe ya en el servidor.

### Parámetros

     key


       La clave a asociar al elemento.






     var


       La variable a almacenar. Los strings y los integers se almacenan tal cual,
       los otros tipos se serializan.






     flag


       Utilice **[MEMCACHE_COMPRESSED](#constant.memcache-compressed)** para comprimir el elemento
       (utiliza zlib).






     expire


       Tiempo de expiración del elemento. Si es igual a cero, el elemento nunca
       expirará. También puede utilizarse un timestamp Unix o un número de segundos
       a partir del tiempo actual, pero en este caso el número de segundos no debe
       exceder 2592000 (30 días).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Devuelve **[false](#constant.false)** si la clave ya existe. Para el resto, el comportamiento de
**Memcache::add()** es el mismo que
[Memcache::set()](#memcache.set).

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::add()**

&lt;?php

$memcache_obj = memcache_connect("localhost", 11211);

/_ API procedimental _/
memcache_add($memcache_obj, 'var_key', 'test variable', false, 30);

/_ API orientada a objetos _/
$memcache_obj-&gt;add('var_key', 'test variable', false, 30);

?&gt;

### Ver también

    - [Memcache::set()](#memcache.set) - Almacena datos en el servidor de caché

    - [Memcache::replace()](#memcache.replace) - Remplaza el valor de un elemento existente

# Memcache::addServer

# memcache_add_server

(PECL memcache &gt;= 2.0.0)

Memcache::addServer -- memcache_add_server — Añade un servidor memcache a la lista de conexión

### Descripción

**Memcache::addServer**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 11211,
    [bool](#language.types.boolean) $persistent = ?,
    [int](#language.types.integer) $weight = ?,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $retry_interval = ?,
    [bool](#language.types.boolean) $status = ?,
    [callable](#language.types.callable) $failure_callback = ?,
    [int](#language.types.integer) $timeoutms = ?
): [bool](#language.types.boolean)

**memcache_add_server**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 11211,
    [bool](#language.types.boolean) $persistent = ?,
    [int](#language.types.integer) $weight = ?,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $retry_interval = ?,
    [bool](#language.types.boolean) $status = ?,
    [callable](#language.types.callable) $failure_callback = ?,
    [int](#language.types.integer) $timeoutms = ?
): [bool](#language.types.boolean)

**Memcache::addServer()** añade un servidor a la lista de
conexión.

Al utilizar este método (a diferencia de los métodos
[Memcache::connect()](#memcache.connect) y [Memcache::pconnect()](#memcache.pconnect)),
la conexión a la red no se establece hasta que sea necesaria. Además,
no hay inconveniente en añadir muchos servidores a la lista, incluso si no
todos serán utilizados.

El fallo puede producirse en cualquier momento con cualquier
método siempre que otros servidores estén disponibles, la petición
no emitirá error. Cualquier interfaz de conexión o nivel de errores de servidor Memcache (a excepción de la falta de memoria) puede
lanzar el fallo. Errores normales de cliente como añadir una
clave existente no lanzará un fallo.

**Nota**:

    Esta función fue añadida en la versión 2.0.0 de Memcache.

### Parámetros

     host


       Apunta al host donde memcache escucha para conexiones. Este parámetro puede especificar también otros transportes como unix:///path/to/memcached.sock
       para usar sockets Unix, y en este caso, port debe definirse también a 0.






     port


       Apunta al puerto donde memcache escucha para conexiones.
       Defínase este parámetro a 0 al usar sockets Unix.




       Nota: Por omisión, el parámetro port
       toma el valor de la opción de configuración
       [memcache.default_port](#ini.memcache.default-port)
       cuando no se especifica. Por esta razón, es recomendable
       especificar explícitamente el puerto al llamar a este método.






     persistent


       Controla el uso de una conexión persistente. El valor por
       omisión es **[true](#constant.true)**.






     weight


       Número de entradas a crear para este servidor que a su vez controla su
       probabilidad de ser elegido. La probabilidad es relativa al peso total
       de todos los servidores.






     timeout


       Valor en segundos que será utilizado para conectarse al demonio.
       Piénsese dos veces antes de cambiar el valor por omisión de un segundo
       - podría perderse todos los beneficios de usar la caché si la conexión es demasiado lenta.






     retry_interval


       Controla cuántas veces se intentará un servidor que falla, el valor
       por omisión es de 15 segundos. Si este parámetro vale -1, no se realizará
       ningún nuevo intento. Ni este parámetro, ni el parámetro
       persistent tienen efecto cuando esta extensión
       se carga dinámicamente mediante la función [dl()](#function.dl).




       Cada estructura de conexión fallida tiene su propio tiempo límite
       y antes de que este expire, será saltada durante la selección del
       proceso para servir una petición. Una vez expirado, la conexión será
       correctamente reconectada o marcada como fallida por otro
       intervalo de retry_interval segundos. El efecto
       típico es que cada hijo de servidor web intentará la conexión
       cada retry_interval segundos al servir una página.






     status


       Controla si el servidor debe ser indicado como en línea.
       Cuando este parámetro vale **[false](#constant.false)** y el parámetro retry_interval
       vale -1, permite mantener un servidor fallido en la lista
       y no afectará al algoritmo de distribución de claves. Las peticiones
       para este servidor fallarán inmediatamente según la configuración del
       parámetro memcache.allow_failover.
       Por omisión, este parámetro vale **[true](#constant.true)**, significando que el servidor debe ser
       considerado como en línea.






     failure_callback


       Permite al usuario especificar una función de retorno para manejar un error. La función de retorno se ejecuta antes de alcanzar el límite de intentos. La función toma dos parámetros; el nombre del host y el puerto
       del servidor que falló.






     timeoutms








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::addServer()**

&lt;?php

/_ API orientada a objetos _/

$memcache = new Memcache;
$memcache-&gt;addServer('memcache_host', 11211);
$memcache-&gt;addServer('memcache_host2', 11211);

/_ API procedimental _/

$memcache_obj = memcache_connect('memcache_host', 11211);
memcache_add_server($memcache_obj, 'memcache_host2', 11211);

?&gt;

### Notas

**Advertencia**

    Cuando el parámetro port no se especifica, este método
    tomará el valor de la directiva de configuración INI
    [memcache.default_port](#ini.memcache.default-port).
    Si este valor ha sido modificado en otro lugar de su aplicación,
    esto puede llevar a resultados inesperados: por esta razón, es recomendable
    siempre especificar el puerto explícitamente al llamar al método.

### Ver también

    - [Memcache::connect()](#memcache.connect) - Establece una conexión con el servidor Memcache

    - [Memcache::pconnect()](#memcache.pconnect) - Establece una conexión persistente a un servidor de caché

    - [Memcache::close()](#memcache.close) - Cierra la conexión con el servidor Memcache

    - [Memcache::setServerParams()](#memcache.setserverparams) - Modifica los parámetros y los estados del servidor durante la ejecución

    - [Memcache::getServerStatus()](#memcache.getserverstatus) - Retorna el estado del servidor

# Memcache::close

# memcache_close

(PECL memcache &gt;= 0.4.0)

Memcache::close -- memcache_close — Cierra la conexión con el servidor Memcache

### Descripción

**Memcache::close**(): [bool](#language.types.boolean)

**memcache_close**([Memcache](#class.memcache) $memcache): [bool](#language.types.boolean)

**Memcache::close()** cierra la conexión al servidor
Memcache. Esta función no cierra las conexiones
persistentes que serán cerradas únicamente durante el reinicio del servidor web.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::close()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);
/*
haga algo aquí ...
*/
memcache_close($memcache_obj);

/_ API orientada a objetos _/
$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);
/_
haga algo aquí ...
_/
$memcache_obj-&gt;close();

?&gt;

### Ver también

    - [Memcache::connect()](#memcache.connect) - Establece una conexión con el servidor Memcache

    - [Memcache::pconnect()](#memcache.pconnect) - Establece una conexión persistente a un servidor de caché

# Memcache::connect

# memcache_connect

(PECL memcache &gt;= 0.2.0)

Memcache::connect -- memcache_connect — Establece una conexión con el servidor Memcache

### Descripción

**Memcache::connect**([string](#language.types.string) $host, [int](#language.types.integer) $port = ?, [int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)

**memcache_connect**([string](#language.types.string) $host, [int](#language.types.integer) $port = ?, [int](#language.types.integer) $timeout = ?): [Memcache](#class.memcache)

**Memcache::connect()** establece una conexión con el servidor
de caché Memcache.
La conexión, que ha sido abierta utilizando la función
**Memcache::connect()** se cerrará automáticamente
al final del script. No obstante, puede cerrarse manualmente utilizando la
función [Memcache::close()](#memcache.close).

### Parámetros

     host


       Especifica el host donde memcache escucha para conexiones. Este parámetro puede también
       especificar otros transportes como unix:///path/to/memcached.sock
       para utilizar sockets Unix, y en este caso, port debe también
       ser definido a 0.






     port


       Especifica el puerto donde memcache escucha para conexiones. Defina este parámetro a
       0 al utilizar sockets Unix.




       Nota: Por omisión, el parámetro port toma el valor
       de la opción de configuración [memcache.default_port](#ini.memcache.default-port)
       si no es especificado. Por esta razón, es recomendable especificar explícitamente
       el puerto al llamar a este método.






     timeout


       Valor en segundos que será utilizado para conectarse al demonio.
       Considérelo dos veces antes de cambiar el valor por omisión de un segundo
       - podría perderse todos los beneficios de utilizar la caché si la conexión es demasiado lenta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::connect()**

&lt;?php

/_ API procedimental _/

$memcache_obj = memcache_connect('memcache_host', 11211);

/_ API orientada a objetos _/

$memcache = new Memcache;
$memcache-&gt;connect('memcache_host', 11211);

?&gt;

### Notas

**Advertencia**

    Cuando el parámetro port no es especificado, este método
    tomará el valor de la directiva de configuración INI
    [memcache.default_port](#ini.memcache.default-port).
    Si este valor ha sido modificado en otro lugar de la aplicación,
    esto puede conducir a resultados inesperados: por esta razón, es recomendable
    siempre especificar el puerto explícitamente al llamar al método.

### Ver también

    - [Memcache::pconnect()](#memcache.pconnect) - Establece una conexión persistente a un servidor de caché

    - [Memcache::close()](#memcache.close) - Cierra la conexión con el servidor Memcache

# Memcache::decrement

(PECL memcache &gt;= 0.2.0)

Memcache::decrement — Disminuye el valor de un elemento

### Descripción

**Memcache::decrement**([string](#language.types.string) $key, [int](#language.types.integer) $value = 1): [int](#language.types.integer)|[false](#language.types.singleton)

**memcache_decrement**([Memcache](#class.memcache) $memcache, [string](#language.types.string) $key, [int](#language.types.integer) $value = 1): [int](#language.types.integer)|[false](#language.types.singleton)

**Memcache::decrement()** disminuye el valor del
elemento por value. De manera similar
a la función [memcache::increment()](#memcache.increment), el valor actual
del elemento se convierte primero en numérico y luego
se resta el valor value.

**Nota**:

     El nuevo valor del elemento no puede ser inferior a cero.

**Nota**:

     No se debe utilizar la función **Memcache::decrement()** con elementos
     almacenados comprimidos. En este caso, la llamada a la función
     [Memcache::get()](#memcache.get) fallará.

**Memcache::decrement()** _no crea_
un elemento si no existe.

### Parámetros

     key


       Clave del elemento a disminuir.






     value


       Disminuye el elemento por value.





### Valores devueltos

Devuelve el valor del nuevo elemento en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::decrement()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);
/* disminución del elemento por 2 */
$new_value = memcache_decrement($memcache_obj, 'test_item', 2);

/_ API orientada a objetos _/
$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);
/_ disminución del elemento por 3 _/
$new_value = $memcache_obj-&gt;decrement('test_item', 3);
?&gt;

### Ver también

    - [Memcache::increment()](#memcache.increment) - Incrementa el valor de un elemento

    - [Memcache::replace()](#memcache.replace) - Remplaza el valor de un elemento existente

# Memcache::delete

# memcache_delete

(PECL memcache &gt;= 0.2.0)

Memcache::delete -- memcache_delete — Elimina un elemento del servidor de caché

### Descripción

**Memcache::delete**([string](#language.types.string) $key, [int](#language.types.integer) $exptime = 0): [bool](#language.types.boolean)

**memcache_delete**([Memcache](#class.memcache) $memcache, [string](#language.types.string) $key, [int](#language.types.integer) $exptime = 0): [bool](#language.types.boolean)

**Memcache::delete()** elimina el elemento identificado por la clave
key.

### Parámetros

     key


       La clave asociada al elemento a eliminar.






     exptime


       Este argumento obsoleto no es soportado, y su valor por omisión es
       0 segundos. No se debe utilizar este argumento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL memcache 3.0.5

       El argumento exptime está deprecado y no debería ser proporcionado.
       Valores distintos de 0 pueden provocar errores inesperados.



### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::delete()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);

/_ el elemento será eliminado por el servidor de caché _/
memcache_delete($memcache_obj, 'key_to_delete');

/_ API orientada a objetos _/
$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);

$memcache_obj-&gt;delete('key_to_delete');

?&gt;

### Ver también

    - [Memcache::set()](#memcache.set) - Almacena datos en el servidor de caché

    - [Memcache::replace()](#memcache.replace) - Remplaza el valor de un elemento existente

# Memcache::flush

(PECL memcache &gt;= 1.0.0)

Memcache::flush — Elimina todos los elementos existentes en el servidor de caché

### Descripción

**Memcache::flush**(): [bool](#language.types.boolean)

**memcache_flush**([Memcache](#class.memcache) $memcache): [bool](#language.types.boolean)

**Memcache::flush()** invalida inmediatamente todos los
elementos existentes en el servidor de caché. **Memcache::flush()**
no libera ningún recurso actualmente, solo marca todos los
elementos como expirados, por lo que la memoria ocupada será
reutilizada con nuevos elementos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::flush()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);

memcache_flush($memcache_obj);

/_ API orientada a objetos _/

$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);

$memcache_obj-&gt;flush();

?&gt;

# Memcache::get

# memcache_get

(PECL memcache &gt;= 0.2.0)

Memcache::get -- memcache_get — Recupera un elemento del servidor de caché

### Descripción

**Memcache::get**([string](#language.types.string) $key, [int](#language.types.integer) &amp;$flags = ?): [string](#language.types.string)

**Memcache::get**([array](#language.types.array) $keys, [array](#language.types.array) &amp;$flags = ?): [array](#language.types.array)

**memcache_get**([Memcache](#class.memcache) $memcache, [string](#language.types.string) $key, [int](#language.types.integer) &amp;$flags = ?): [string](#language.types.string)

**memcache_get**([Memcache](#class.memcache) $memcache, [array](#language.types.array) $keys, [array](#language.types.array) &amp;$flags = ?): [array](#language.types.array)

**Memcache::get()** devuelve los datos previamente almacenados
en el elemento identificado por la clave key si existe en
el servidor en el momento de la llamada.

Se puede pasar un array de claves a la función
**Memcache::get()** para obtener un array de valores. El
array resultante contendrá solo las parejas clave-valor encontradas.

### Parámetros

     key


       La clave o el array de claves a recuperar.






     flags


       Si este argumento está presente, representará los flags de los valores
       a recuperar. Estos flags son los mismos que los dados en el ejemplo de
       la función [Memcache::set()](#memcache.set). El byte menos significativo
       del valor está reservado para un uso interno de pecl/memcache
       (por ejemplo, para indicar el estado de compresión y serialización).





### Valores devueltos

Devuelve el valor asociado con el argumento key
o un array que contiene las parejas clave/valor encontradas cuando el argumento
key es un [array](#language.types.array). Devuelve **[false](#constant.false)** si ocurre un error,
si el argumento key no es encontrado,
o si el argumento key es un [array](#language.types.array) vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::get()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);
$var = memcache_get($memcache_obj, 'some_key');

/_ API orientada a objetos _/
$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);
$var = $memcache_obj-&gt;get('some_key');

/_
También se puede utilizar un array de claves como argumento.
Si un elemento de este tipo no es encontrado en el servidor, el array
resultado simplemente no incluirá dicha clave.
_/

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);
$var = memcache_get($memcache_obj, Array('some_key', 'another_key'));

/_ API Orientada a Objetos _/
$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);
$var = $memcache_obj-&gt;get(Array('some_key', 'second_key'));

?&gt;

# Memcache::getExtendedStats

# memcache_get_extended_stats

(PECL memcache &gt;= 2.0.0)

Memcache::getExtendedStats -- memcache_get_extended_stats — Recupera estadísticas de todos los servidores en la lista

### Descripción

**Memcache::getExtendedStats**([string](#language.types.string) $type = ?, [int](#language.types.integer) $slabid = ?, [int](#language.types.integer) $limit = 100): [array](#language.types.array)

**memcache_get_extended_stats**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $type = ?,
    [int](#language.types.integer) $slabid = ?,
    [int](#language.types.integer) $limit = 100
): [array](#language.types.array)

**Memcache::getExtendedStats()** devuelve un array
asociativo de dos dimensiones con estadísticas de servidores. Las claves
de los arrays corresponden a host:puerto de los servidores y los valores
contienen estadísticas del servidor individual. Un servidor en fallo
tendrá sus entradas correspondientes fijadas a **[false](#constant.false)**.

**Nota**:

    Esta función fue añadida en la versión 2.0.0 de Memcache.

### Parámetros

     type


       El tipo de estadísticas a recuperar. Los valores válidos son: "reset",
       "malloc", "maps", "cachedump",
       "slabs", "items", "sizes".
       Según las especificaciones del protocolo memcached, estos argumentos opcionales
       pueden ser modificados según las necesidades de los desarrolladores de memcache.






     slabid


       Utilizado con el parámetro type definido como cachedump
       para identificar el slab a recuperar. El comando cachedump
       sobrecarga el servidor y solo debe ser utilizado con fines de depuración.






     limit


       Utilizado con el parámetro type definido como
       cachedump para limitar el número de entradas a recuperar.





**Advertencia**

     El tipo de estadística cachedump ha sido eliminado del proceso
     memcached por razones de seguridad.

### Valores devueltos

Devuelve un array asociativo con estadísticas de los servidores o
**[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::getExtendedStats()**

&lt;?php
$memcache_obj = new Memcache;
$memcache_obj-&gt;addServer('memcache_host', 11211);
$memcache_obj-&gt;addServer('failed_host', 11211);

    $stats = $memcache_obj-&gt;getExtendedStats();
    print_r($stats);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[memcache_host:11211] =&gt; Array
(
[pid] =&gt; 3756
[uptime] =&gt; 603011
[time] =&gt; 1133810435
[version] =&gt; 1.1.12
[rusage_user] =&gt; 0.451931
[rusage_system] =&gt; 0.634903
[curr_items] =&gt; 2483
[total_items] =&gt; 3079
[bytes] =&gt; 2718136
[curr_connections] =&gt; 2
[total_connections] =&gt; 807
[connection_structures] =&gt; 13
[cmd_get] =&gt; 9748
[cmd_set] =&gt; 3096
[get_hits] =&gt; 5976
[get_misses] =&gt; 3772
[bytes_read] =&gt; 3448968
[bytes_written] =&gt; 2318883
[limit_maxbytes] =&gt; 33554432
)

    [failed_host:11211] =&gt; false

)

### Ver también

    - [Memcache::getVersion()](#memcache.getversion) - Devuelve el número de versión del servidor

    - [Memcache::getStats()](#memcache.getstats) - Lee las estadísticas del servidor

# Memcache::getServerStatus

# memcache_get_server_status

(PECL memcache &gt;= 2.1.0)

Memcache::getServerStatus -- memcache_get_server_status — Retorna el estado del servidor

### Descripción

**Memcache::getServerStatus**([string](#language.types.string) $host, [int](#language.types.integer) $port = 11211): [int](#language.types.integer)

**memcache_get_server_status**([Memcache](#class.memcache) $memcache, [string](#language.types.string) $host, [int](#language.types.integer) $port = 11211): [int](#language.types.integer)

**Memcache::getServerStatus()** retorna el estado
en línea/fuera de línea del servidor.

**Nota**:

    Esta función fue añadida en la versión 2.1.0 de Memcache.

### Parámetros

     host


       Apunta al host donde memcache escucha conexiones.






     port


       Apunta al puerto donde memcache escucha conexiones.





### Valores devueltos

Retorna el estado del servidor. 0 si el servidor falla, un valor
diferente de cero en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::getServerStatus()**

&lt;?php

/_ API orientada a objetos _/
$memcache = new Memcache;
$memcache-&gt;addServer('memcache_host', 11211);
echo $memcache-&gt;getServerStatus('memcache_host', 11211);

/_ API procedimental _/
$memcache = memcache_connect('memcache_host', 11211);
echo memcache_get_server_status($memcache, 'memcache_host', 11211);

?&gt;

### Ver también

    - [Memcache::addServer()](#memcache.addserver) - Añade un servidor memcache a la lista de conexión

    - [Memcache::setServerParams()](#memcache.setserverparams) - Modifica los parámetros y los estados del servidor durante la ejecución

# Memcache::getStats

# memcache_get_stats

(PECL memcache &gt;= 0.2.0)

Memcache::getStats -- memcache_get_stats — Lee las estadísticas del servidor

### Descripción

**Memcache::getStats**([string](#language.types.string) $type = ?, [int](#language.types.integer) $slabid = ?, [int](#language.types.integer) $limit = 100): [array](#language.types.array)|[false](#language.types.singleton)

**memcache_get_stats**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $type = ?,
    [int](#language.types.integer) $slabid = ?,
    [int](#language.types.integer) $limit = 100
): [array](#language.types.array)|[false](#language.types.singleton)

**Memcache::getStats()** devuelve un array asociativo
con las estadísticas del servidor. Los índices del array corresponden
a los parámetros de estadísticas, y el valor asociado es el valor de
dichas estadísticas.

### Parámetros

     type


       El tipo de estadísticas a recuperar. Los valores válidos son {"reset",
       "malloc", "maps", "cachedump",
       "slabs", "items", "sizes".
       Según las especificaciones del protocolo memcached, estos argumentos opcionales son susceptibles
       de ser modificados según las necesidades de los desarrolladores de memcache.






     slabid


       Utilizado con el parámetro type definido como cachedump
       para identificar el slab a recuperar. El comando cachedump
       sobrecarga el servidor y no debe ser utilizado excepto para depuración.






     limit


       Utilizado con el parámetro type definido como
       cachedump para limitar el número de entradas a recuperar.





### Valores devueltos

Devuelve un array asociativo de las estadísticas de un servidor o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [Memcache::getVersion()](#memcache.getversion) - Devuelve el número de versión del servidor

    - [Memcache::getExtendedStats()](#memcache.getextendedstats) - Recupera estadísticas de todos los servidores en la lista

# Memcache::getVersion

# memcache_get_version

(PECL memcache &gt;= 0.2.0)

Memcache::getVersion -- memcache_get_version — Devuelve el número de versión del servidor

### Descripción

**Memcache::getVersion**(): [string](#language.types.string)|[false](#language.types.singleton)

**memcache_get_version**([Memcache](#class.memcache) $memcache): [string](#language.types.string)|[false](#language.types.singleton)

**Memcache::getVersion()** devuelve una cadena con
el número de versión del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) con el número de versión del servidor o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::getVersion()**

&lt;?php

/_ API orientada a objetos _/
$memcache = new Memcache;
$memcache-&gt;connect('memcache_host', 11211);
echo $memcache-&gt;getVersion();

/_ API procedimental _/
$memcache = memcache_connect('memcache_host', 11211);
echo memcache_get_version($memcache);

?&gt;

### Ver también

    - [Memcache::getExtendedStats()](#memcache.getextendedstats) - Recupera estadísticas de todos los servidores en la lista

    - [Memcache::getStats()](#memcache.getstats) - Lee las estadísticas del servidor

# Memcache::increment

# memcache_increment

(PECL memcache &gt;= 0.2.0)

Memcache::increment -- memcache_increment — Incrementa el valor de un elemento

### Descripción

**Memcache::increment**([string](#language.types.string) $key, [int](#language.types.integer) $value = 1): [int](#language.types.integer)|[false](#language.types.singleton)

**memcache_increment**([Memcache](#class.memcache) $memcache, [string](#language.types.string) $key, [int](#language.types.integer) $value = 1): [int](#language.types.integer)|[false](#language.types.singleton)

**Memcache::increment()** incrementa el valor de un elemento
identificado por la clave key por el valor
value. Si el elemento identificado por la clave
key no es de tipo numérico y no puede
ser convertido a número, el valor de este elemento será definido a
value.
**Memcache::increment()** _no crea_
un elemento si no existe.

**Nota**:

     No se debe utilizar **memcache::increment()** con elementos
     almacenados comprimidos. En este caso, la llamada a la función
     [Memcache::get()](#memcache.get) fallará.

### Parámetros

     key


       Clave del elemento a incrementar.






     value


       Incrementa el elemento por value.





### Valores devueltos

Devuelve el valor del nuevo elemento en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::increment()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_connect('memcache_host', 11211);
/* incrementación del contador en 2 */
$current_value = memcache_increment($memcache_obj, 'counter', 2);

/_ API orientada a objetos _/
$memcache_obj = new Memcache;
$memcache_obj-&gt;connect('memcache_host', 11211);
/_ incrementación del contador en 3 _/
$current_value = $memcache_obj-&gt;increment('counter', 3);

?&gt;

### Ver también

    - [Memcache::decrement()](#memcache.decrement) - Disminuye el valor de un elemento

    - [Memcache::replace()](#memcache.replace) - Remplaza el valor de un elemento existente

# Memcache::pconnect

# memcache_pconnect

(PECL memcache &gt;= 0.4.0)

Memcache::pconnect -- memcache_pconnect — Establece una conexión persistente a un servidor de caché

### Descripción

**Memcache::pconnect**([string](#language.types.string) $host, [int](#language.types.integer) $port = ?, [int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)

**Memcache::pconnect**([string](#language.types.string) $host, [int](#language.types.integer) $port = ?, [int](#language.types.integer) $timeout = ?): [Memcache](#class.memcache)

**Memcache::pconnect()** es similar a la función
[Memcache::connect()](#memcache.connect) con la diferencia de que la conexión
será persistente.
Este tipo de conexión no se cierra al finalizar el script ni por la función
[Memcache::close()](#memcache.close).

### Parámetros

     host


       Especifica el host donde memcache escucha conexiones. Este parámetro
       puede también especificar otros transportes como
       unix:///path/to/memcached.sock
       para utilizar sockets Unix, y, en este caso,
       port debe también definirse
       a 0.






     port


       Especifica el puerto donde memcache escucha conexiones. Defínase este parámetro
       a 0 al utilizar sockets Unix.






     timeout


       Valor en segundos que será utilizado para conectarse al demonio.
       Piénsese dos veces antes de cambiar el valor por omisión de un segundo
       - podría perderse todos los beneficios de utilizar la caché
       si la conexión es demasiado lenta.





### Valores devueltos

Retorna un objeto Memcache o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::pconnect()**

&lt;?php

/_ API procedimental _/
$memcache_obj = memcache_pconnect('memcache_host', 11211);

/_ API orientada a objetos _/

$memcache_obj = new Memcache;
$memcache_obj-&gt;pconnect('memcache_host', 11211);

?&gt;

### Ver también

    - [Memcache::connect()](#memcache.connect) - Establece una conexión con el servidor Memcache

# Memcache::replace

# memcache_replace

(PECL memcache &gt;= 0.2.0)

Memcache::replace -- memcache_replace — Remplaza el valor de un elemento existente

### Descripción

**Memcache::replace**(
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)

**memcache_replace**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)

**Memcache::replace()** se utiliza para reemplazar el valor
de un elemento identificado por la clave key. En el caso de
que el elemento identificado por la clave key no exista,
la función **Memcache::replace()** devolverá **[false](#constant.false)**.
Por lo demás, la función **Memcache::replace()** funciona
de la misma manera que la función [Memcache::set()](#memcache.set).

### Parámetros

     key


       La clave que se asociará con el elemento.






     var


       La variable a almacenar. Los strings y los integers se almacenan como tales,
       los demás tipos se almacenan de manera serializada.






     flag


       Utilice **[MEMCACHE_COMPRESSED](#constant.memcache-compressed)** para almacenar
       el elemento comprimido (utiliza zlib).






     expire


       Tiempo de expiración para el elemento. Si es igual a 0, el elemento
       no expirará nunca. También puede utilizarse un timestamp Unix o un número de
       segundos a partir de la fecha actual, pero en este último caso, el número de
       segundos no debe exceder 2592000 (30 días).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::replace()**

&lt;?php

$memcache_obj = memcache_connect('memcache_host', 11211);

/_ API procedimental _/
memcache_replace($memcache_obj, "test_key", "some variable", false, 30);

/_ API orientada a objetos _/
$memcache_obj-&gt;replace("test_key", "some variable", false, 30);

?&gt;

### Ver también

    - [Memcache::set()](#memcache.set) - Almacena datos en el servidor de caché

    - [Memcache::add()](#memcache.add) - Añade un elemento en el servidor

# Memcache::set

# memcache_set

(PECL memcache &gt;= 0.2.0)

Memcache::set -- memcache_set — Almacena datos en el servidor de caché

### Descripción

**Memcache::set**(
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)

**memcache_set**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $var,
    [int](#language.types.integer) $flag = ?,
    [int](#language.types.integer) $expire = ?
): [bool](#language.types.boolean)

**Memcache::set()** almacena el elemento var
con la clave key en el servidor de caché.
El parámetro expire representa el tiempo de expiración en segundos
del elemento. Si vale 0, el elemento no expirará nunca (aunque el servidor
de caché no garantiza que este elemento siempre estará almacenado, puede ser
eliminado de la caché para hacer espacio para otros elementos).
Puede utilizarse la constante **[MEMCACHE_COMPRESSED](#constant.memcache-compressed)**
como valor del parámetro flag
si se desea utilizar la compresión en tiempo real (utilizando la biblioteca zlib).

**Nota**:

     Tenga en cuenta que los recursos (es decir, identificadores de archivos o conexiones)
     no pueden almacenarse en la caché, ya que no pueden ser representados linealmente.

### Parámetros

     key


       La clave que se asociará con el elemento.






     var


       La variable a registrar. Los strings y los integers se registran como tales,
       los demás tipos se registran de manera serializada.






     flag


       Utilice **[MEMCACHE_COMPRESSED](#constant.memcache-compressed)** para registrar
       el elemento comprimido (utiliza zlib).






     expire


       Tiempo de expiración para el elemento. Si es igual a 0, el elemento no expirará.
       También puede utilizarse un timestamp Unix o un número de segundos a partir de la fecha actual,
       pero en este último caso, el número de segundos no debe exceder 2592000 (30 días).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::set()**

&lt;?php
/_ API procedimental _/

/_ conexión al servidor de caché _/
$memcache_obj = memcache_connect('memcache_host', 11211);

/_
define el valor del elemento identificado por la clave 'var_key' ;
utilización del valor 0 para el flag ;
la compresión no se utiliza ;
el tiempo de expiración es de 30 segundos
_/
memcache_set($memcache_obj, 'var_key', 'algunas variables', 0, 30);

echo memcache_get($memcache_obj, 'var_key');

?&gt;

    **Ejemplo #2 Ejemplo con Memcache::set()**

&lt;?php
/_ API orientada a objetos _/

$memcache_obj = new Memcache;

/_ conexión al servidor de caché _/
$memcache_obj-&gt;connect('memcache_host', 11211);

/_
define el valor del elemento identificado por la clave 'var_key' ;
utilización de la compresión en tiempo real ;
el tiempo de expiración es de 50 segundos
_/
$memcache_obj-&gt;set('var_key', 'algunas variables grandes', MEMCACHE_COMPRESSED, 50);

echo $memcache_obj-&gt;get('var_key');

?&gt;

### Ver también

    - [Memcache::add()](#memcache.add) - Añade un elemento en el servidor

    - [Memcache::replace()](#memcache.replace) - Remplaza el valor de un elemento existente

# Memcache::setCompressThreshold

(PECL memcache &gt;= 2.0.0)

Memcache::setCompressThreshold — Activa la compresión automática de los valores grandes

### Descripción

**Memcache::setCompressThreshold**([int](#language.types.integer) $threshold, [float](#language.types.float) $min_savings = ?): [bool](#language.types.boolean)

**memcache_set_compress_threshold**([Memcache](#class.memcache) $memcache, [int](#language.types.integer) $threshold, [float](#language.types.float) $min_savings = ?): [bool](#language.types.boolean)

**Memcache::setCompressThreshold()** activa la compresión
automática de los valores grandes.

**Nota**:

    Esta función fue añadida en la versión 2.0.0 de Memcache.

### Parámetros

     threshold


       Controla el tamaño mínimo de valor antes de intentar comprimir
       automáticamente.






     min_saving


       Especifica el número mínimo de ahorro para guardar los valores
       comprimidos. El valor proporcionado debe estar entre 0 y 1. El valor
       por omisión es 0.2, lo que da un mínimo de 20% de ahorro de compresión.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::setCompressThreshold()**

&lt;?php

/_ API orientada a objetos _/

$memcache_obj = new Memcache;
$memcache_obj-&gt;addServer('memcache_host', 11211);
$memcache_obj-&gt;setCompressThreshold(20000, 0.2);

/_ API procedimental _/

$memcache_obj = memcache_connect('memcache_host', 11211);
memcache_set_compress_threshold($memcache_obj, 20000, 0.2);

?&gt;

# Memcache::setServerParams

# memcache_set_server_params

(PECL memcache &gt;= 2.1.0)

Memcache::setServerParams -- memcache_set_server_params — Modifica los parámetros y los estados del servidor durante la ejecución

### Descripción

**Memcache::setServerParams**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 11211,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $retry_interval = **[false](#constant.false)**,
    [bool](#language.types.boolean) $status = ?,
    [callable](#language.types.callable) $failure_callback = ?
): [bool](#language.types.boolean)

**memcache_set_server_params**(
    [Memcache](#class.memcache) $memcache,
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 11211,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $retry_interval = **[false](#constant.false)**,
    [bool](#language.types.boolean) $status = ?,
    [callable](#language.types.callable) $failure_callback = ?
): [bool](#language.types.boolean)

**Memcache::setServerParams()** modifica los parámetros del
servidor durante la ejecución.

**Nota**:

    Esta función fue añadida en la versión 2.1.0 de Memcache.

### Parámetros

     host


       Host donde memcache escucha para conexiones.






     port


       Puerto donde memcache escucha para conexiones.






     timeout


       Valor en segundos que será utilizado para conectarse al demonio.
       Piénselo dos veces antes de cambiar el valor por omisión de un segundo
       - podría perderse todos los beneficios del uso de la caché si la conexión es demasiado lenta.






     retry_interval


       Controla cuántas veces se intentará conectar a un servidor que falla:
       el valor por omisión es de 15 segundos. Si este parámetro vale -1, no se realizará
       ningún nuevo intento. Ni este parámetro, ni el parámetro
       persistent tienen efecto cuando esta extensión
       es cargada dinámicamente mediante la función [dl()](#function.dl).






     status


       Controla si el servidor debe ser indicado como en línea.
       Cuando este parámetro vale **[false](#constant.false)** y el parámetro retry_interval
       vale -1, permite mantener un servidor fallido en la lista
       y no afectará al algoritmo de distribución de claves. Las peticiones
       para este servidor fallarán inmediatamente según la configuración del
       parámetro memcache.allow_failover.
       Por omisión, este parámetro vale **[true](#constant.true)**, significando que el servidor debe ser
       considerado como en línea.






     failure_callback


       Permite al usuario especificar una función de devolución de llamada para
       manejar un error. La función es ejecutada antes de alcanzar el límite de intentos.
       La función toma dos argumentos; el nombre del host y el puerto
       del servidor que falló.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcache::setServerParams()**

&lt;?php

function \_callback_memcache_failure($host, $port) {
    print "memcache '$host:$port' falló";
}

/_ API orientada a objetos _/

$memcache = new Memcache;

// Añade el servidor en modo fuera de línea
$memcache-&gt;addServer('memcache_host', 11211, false, 1, 1, -1, false);

// Reemplaza el servidor en línea
$memcache-&gt;setServerParams('memcache_host', 11211, 1, 15, true, '\_callback_memcache_failure');

/_ API procedimental _/

$memcache_obj = memcache_connect('memcache_host', 11211);
memcache_set_server_params($memcache_obj, 'memcache_host', 11211, 1, 15, true, '\_callback_memcache_failure');

?&gt;

### Ver también

    - [Memcache::addServer()](#memcache.addserver) - Añade un servidor memcache a la lista de conexión

    - [Memcache::getServerStatus()](#memcache.getserverstatus) - Retorna el estado del servidor

## Tabla de contenidos

- [Memcache::add](#memcache.add) — Añade un elemento en el servidor
- [Memcache::addServer](#memcache.addserver) — Añade un servidor memcache a la lista de conexión
- [Memcache::close](#memcache.close) — Cierra la conexión con el servidor Memcache
- [Memcache::connect](#memcache.connect) — Establece una conexión con el servidor Memcache
- [Memcache::decrement](#memcache.decrement) — Disminuye el valor de un elemento
- [Memcache::delete](#memcache.delete) — Elimina un elemento del servidor de caché
- [Memcache::flush](#memcache.flush) — Elimina todos los elementos existentes en el servidor de caché
- [Memcache::get](#memcache.get) — Recupera un elemento del servidor de caché
- [Memcache::getExtendedStats](#memcache.getextendedstats) — Recupera estadísticas de todos los servidores en la lista
- [Memcache::getServerStatus](#memcache.getserverstatus) — Retorna el estado del servidor
- [Memcache::getStats](#memcache.getstats) — Lee las estadísticas del servidor
- [Memcache::getVersion](#memcache.getversion) — Devuelve el número de versión del servidor
- [Memcache::increment](#memcache.increment) — Incrementa el valor de un elemento
- [Memcache::pconnect](#memcache.pconnect) — Establece una conexión persistente a un servidor de caché
- [Memcache::replace](#memcache.replace) — Remplaza el valor de un elemento existente
- [Memcache::set](#memcache.set) — Almacena datos en el servidor de caché
- [Memcache::setCompressThreshold](#memcache.setcompressthreshold) — Activa la compresión automática de los valores grandes
- [Memcache::setServerParams](#memcache.setserverparams) — Modifica los parámetros y los estados del servidor durante la ejecución

# Funciones de Memcache

# memcache_debug

(PECL memcache &gt;= 0.2.0)

memcache_debug — Activa/desactiva debug output

### Descripción

**memcache_debug**([bool](#language.types.boolean) $on_off): [bool](#language.types.boolean)

**memcache_debug()** activa el debug output si el parámetro
on_off es igual a **[true](#constant.true)** y lo desactiva si es igual a
**[false](#constant.false)**.

**Nota**:

     Solamente se puede acceder a **memcache_debug()** si PHP fue compilado
     con la opción --enable-debug y en este caso siempre retorna **[true](#constant.true)**.
     De lo contrario, esta función no tiene ningún efecto y siempre devuelve **[false](#constant.false)**.

### Parámetros

     on_off


       Activa debug output si es igual a **[true](#constant.true)**.
       Desactiva debug output si es igual a **[false](#constant.false)**.





### Valores devueltos

Devuelve **[true](#constant.true)** si PHP fue compilado con la opción --enable-debug, de lo contrario
devuelve **[false](#constant.false)**.

## Tabla de contenidos

- [memcache_debug](#function.memcache-debug) — Activa/desactiva debug output

- [Introducción](#intro.memcache)
- [Instalación/Configuración](#memcache.setup)<li>[Requerimientos](#memcache.requirements)
- [Instalación](#memcache.installation)
- [Configuración en tiempo de ejecución](#memcache.ini)
- [Tipos de recursos](#memcache.resources)
  </li>- [Constantes predefinidas](#memcache.constants)
- [Ejemplos](#memcache.examples)<li>[Uso básico](#memcache.examples-overview)
  </li>- [Memcache](#class.memcache) — La clase Memcache<li>[Memcache::add](#memcache.add) — Añade un elemento en el servidor
- [Memcache::addServer](#memcache.addserver) — Añade un servidor memcache a la lista de conexión
- [Memcache::close](#memcache.close) — Cierra la conexión con el servidor Memcache
- [Memcache::connect](#memcache.connect) — Establece una conexión con el servidor Memcache
- [Memcache::decrement](#memcache.decrement) — Disminuye el valor de un elemento
- [Memcache::delete](#memcache.delete) — Elimina un elemento del servidor de caché
- [Memcache::flush](#memcache.flush) — Elimina todos los elementos existentes en el servidor de caché
- [Memcache::get](#memcache.get) — Recupera un elemento del servidor de caché
- [Memcache::getExtendedStats](#memcache.getextendedstats) — Recupera estadísticas de todos los servidores en la lista
- [Memcache::getServerStatus](#memcache.getserverstatus) — Retorna el estado del servidor
- [Memcache::getStats](#memcache.getstats) — Lee las estadísticas del servidor
- [Memcache::getVersion](#memcache.getversion) — Devuelve el número de versión del servidor
- [Memcache::increment](#memcache.increment) — Incrementa el valor de un elemento
- [Memcache::pconnect](#memcache.pconnect) — Establece una conexión persistente a un servidor de caché
- [Memcache::replace](#memcache.replace) — Remplaza el valor de un elemento existente
- [Memcache::set](#memcache.set) — Almacena datos en el servidor de caché
- [Memcache::setCompressThreshold](#memcache.setcompressthreshold) — Activa la compresión automática de los valores grandes
- [Memcache::setServerParams](#memcache.setserverparams) — Modifica los parámetros y los estados del servidor durante la ejecución
  </li>- [Funciones de Memcache](#ref.memcache)<li>[memcache_debug](#function.memcache-debug) — Activa/desactiva debug output
  </li>
