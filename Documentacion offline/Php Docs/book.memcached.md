# Memcached

# Introducción

[» memcached](http://www.memcached.org/) es un sistema de alto rendimiento, distribuido y en memoria, de caché de objetos, genérico por naturaleza, pero principalmente destinado al uso con sitios web dinámicos, para aliviar las bases de datos.

Esta extensión utiliza la biblioteca libmemcached para
asegurar las comunicaciones con los servidores memcached. También
proporciona un gestor de
[sesiones](#ref.session), llamado
memcached.

Información sobre libmemcached está disponible en
[» http://libmemcached.org/libMemcached.html](http://libmemcached.org/libMemcached.html).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#memcached.requirements)
- [Instalación](#memcached.installation)
- [Configuración en tiempo de ejecución](#memcached.configuration)

    ## Requerimientos

    Esta extensión requiere la biblioteca cliente
    [» libmemcached](http://libmemcached.org/libMemcached.html)
    (versión 1.0.0 o superior). Para un soporte de la autenticación SASL,
    la biblioteca libmemcached debe haber sido compilada con la activación de SASL.

    A partir de la versión 0.2.0, esta extensión requiere PHP versión 5.2.0 o superior.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/memcached](https://pecl.php.net/package/memcached).

Si libmemcached está instalada en una ubicación no estándar, use la opción **--with-libmemcached-dir=DIR**, siendo DIR el prefijo
de instalación de libmemcached. Este directorio debe contener el fichero
include/libmemcached/memcached.h.

Se requiere Zlib para el soporte de compresión. Para especificar una instalación
no estándar de Zlib, use la opción **--with-zlib-dir=DIR** siendo DIR el prefijo de instalación
de Zlib.

El soporte para el controlador de sesiones está activado de manera predeterminada. Para
desactivarlo, use la opción **--disable-memcached-session**.

El soporte para la autenticación SASL está deshabilitado de forma predeterminada. Para habilitarlo,
use la opción **--enable-memcached-sasl**. Esto
requiere que haya sido instalada libsasl2 y que libmemcached haya sido
construida con el soporte para SASL habilitado.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración Memcached**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [memcached.sess_locking](#ini.memcached.sess-locking)
      On
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0.



      [memcached.sess_consistent_hash](#ini.memcached.sess-consistent-hash)
      On
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.1.0. El valor por omisión es Activo a partir de memcached 3.0.0.



      [memcached.sess_binary](#ini.memcached.sess-binary)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.0.0. Reemplazado por memcached.sess_binary_protocol a partir de memcached 3.0.0.



      [memcached.sess_lock_wait](#ini.memcached.sess-lock-wait)
      150000
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0. Eliminado a partir de memcached 3.0.0.



      [memcached.sess_prefix](#ini.memcached.sess-prefix)
      memc.sess.key.
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0.



      [memcached.sess_number_of_replicas](#ini.memcached.sess-number-of-replicas)
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.1.0.



      [memcached.sess_randomize_replica_read](#ini.memcached.sess-randomize-replica-read)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.1.0.



      [memcached.sess_remove_failed](#ini.memcached.sess-remove-failed)
      On
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.1.0. Reemplazado por memcached.sess_remove_failed_servers a partir de memcached 3.0.0.



      [memcached.compression_type](#ini.memcached.compression-type)
      fastlz
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0.



      [memcached.compression_factor](#ini.memcached.compression-factor)
      1.3
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0.



      [memcached.compression_threshold](#ini.memcached.compression-threshold)
      2000
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0.



      [memcached.serializer](#ini.memcached.serializer)
      igbinary
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 0.1.0.



      [memcached.use_sasl](#ini.memcached.use-sasl)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.2.0. Eliminado a partir de memcached 3.0.0.



      [memcached.default_binary_protocol](#ini.memcached.default-binary-protocol)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0.



      [memcached.default_connect_timeout](#ini.memcached.default-connect-timeout)
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0.



      [memcached.default_consistent_hash](#ini.memcached.default-consistent-hash)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0.



      [memcached.sess_binary_protocol](#ini.memcached.sess-binary-protocol)
      On
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0. Reemplaza memcached.sess_binary.



      [memcached.sess_connect_timeout](#ini.memcached.sess-connect-timeout)
       1000
       **[INI_ALL](#constant.ini-all)**
       Disponible a partir de memcached 2.2.0.



      [memcached.sess_consistent_hash_type](#ini.memcached.sess-consistent-hash-type)
      ketama
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.1.0.



      [memcached.sess_lock_expire](#ini.memcached.sess-lock-expire)
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.2.0.



      [memcached.sess_lock_retries](#ini.memcached.sess-lock-retries)
      5
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0.



      [memcached.sess_lock_wait_max](#ini.memcached.sess-lock-wait-max)
      150
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0. Por omisión a 150 a partir de memcached 3.1.0 (antes 2000).



      [memcached.sess_lock_wait_min](#ini.memcached.sess-lock-wait-min)
      150
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0. Por omisión a 150 a partir de memcached 3.1.0 (antes 1000).



      [memcached.sess_persistent](#ini.memcached.sess-persistent)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0.



      [memcached.sess_remove_failed_servers](#ini.memcached.sess-remove-failed-servers)
      Off
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0. Reemplaza memcached.sess_remove_failed.



      [memcached.sess_server_failure_limit](#ini.memcached.sess-server-failure-limit)
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 3.0.0.



      [memcached.sess_sasl_password](#ini.memcached.sess-sasl-password)
      null
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.2.0.



      [memcached.sess_sasl_username](#ini.memcached.sess-sasl-username)
      null
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de memcached 2.2.0.



      [memcached.store_retry_count](#ini.memcached.store-retry-count)
      0
      **[INI_ALL](#constant.ini-all)**

       Disponible a partir de memcached 2.2.0.
       Por omisión a 0 a partir de memcached 3.2.0
       (antes 2).



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      memcached.sess_locking
      [bool](#language.types.boolean)



       Utiliza los cerrojos de sesión. Los valores válidos son On y Off, el valor por omisión es On.







      memcached.sess_consistent_hash
      [bool](#language.types.boolean)



       Si se define como On, utiliza el hachado consistente (libketama) para la gestión de sesiones.
       Cuando se utiliza el hachado consistente, se pueden añadir o eliminar nodos de caché sin perturbar las claves existentes.
       El valor por omisión es On.







      memcached.sess_binary
      [bool](#language.types.boolean)



       Utiliza el modo binario para las sesiones memcached. Las réplicas de libmemcached solo funcionan
       si el modo binario está activado. El valor por omisión es Off.







      memcached.sess_lock_wait
      [int](#language.types.integer)



       La duración de espera del cerrojo de sesión en microsegundos. Tenga cuidado al definir este valor.
       Los valores válidos son enteros, donde 0 se interpreta como el valor por omisión.
       Los valores negativos reducen el bloqueo a un bloqueo de prueba.
       El valor por omisión es 150000.







      memcached.sess_prefix
      [string](#language.types.string)



       El prefijo de clave de sesión Memcached. Los valores válidos son strings de menos de 219 bytes.
       El valor por omisión es memc.sess.key.







      memcached.sess_number_of_replicas
      [int](#language.types.integer)



       Escribe los datos en un cierto número de servidores Memcached adicionales. Esto es lo que libmemcached llama "pobre hombre HA".
       Si este valor es positivo y sess_remove_failed_servers está activado,
       cuando un servidor Memcached falle, la sesión continuará estando disponible a partir de una réplica.
       Sin embargo, si el servidor Memcached en fallo vuelve a estar disponible, la sesión se leerá desde allí,
       lo que podría tener datos obsoletos o ninguna información en absoluto.
       El valor por omisión es 0.







      memcached.sess_randomize_replica_read
      [bool](#language.types.boolean)



       La sesión Memcached lee la replicación aleatoria.







      memcached.sess_remove_failed
      [int](#language.types.integer)



       Permite que el servidor Memcached en fallo sea eliminado automáticamente.







      memcached.compression_type
      [string](#language.types.string)



       Define el tipo de compresión, los valores válidos son: fastlz, zlib.
       El valor por omisión es fastlz.







      memcached.compression_factor
      [float](#language.types.float)



       El factor de compresión. Almacene el valor comprimido solo si el factor de compresión
       (ahorro) supera el límite definido. Almacene comprimido si:
       plain_len &gt; comp_len * factor. El valor por omisión es
       1.3 (23% de ahorro de espacio).







      memcached.compression_threshold
      [int](#language.types.integer)



       El umbral de compresión. No comprima los valores serializados por debajo de este umbral.
       El valor por omisión es 2000 bytes.







      memcached.serializer
      [string](#language.types.string)



       Define el serializador por omisión para los nuevos objetos Memcached. Los valores válidos son:
       php, igbinary, json,
       json_array, msgpack.





        json


          La serialización JSON estándar de PHP. Este serializador es rápido y compacto pero
          solo funciona con datos codificados en UTF-8 y no implementa completamente
          la serialización. Ver la extensión JSON. Disponible a partir de memcached 0.2.0.






        json_array


          Como json, pero decodifica en arrays. Disponible a partir de memcached 2.0.0.






        php


          El serializador estándar de PHP.






        igbinary


          Un serializador binario. Disponible a partir de memcached 0.1.4.






        msgpack


          Un serializador binario multi-lenguaje. Disponible a partir de memcached 2.2.0.







       El valor por omisión es igbinary si está disponible, luego msgpack si está disponible,
       luego de lo contrario php.







      memcached.use_sasl
      [bool](#language.types.boolean)



       Utilizar la autenticación SASL para las conexiones. Los valores válidos son On y Off.
       El valor por omisión es Off.







      memcached.default_binary_protocol
      [bool](#language.types.boolean)



       Define el protocolo memcached por omisión para las nuevas conexiones. (Para configurar el protocolo memcached para
       las conexiones utilizadas por las sesiones, utilice memcached.sess_binary_protocol en su lugar.)

       Si se define como On, el protocolo binario memcached se utiliza por omisión.
       Si se define como Off, el protocolo de texto memcached se utiliza.
       El valor por omisión es Off.







      memcached.default_connect_timeout
      [int](#language.types.integer)



       Define el tiempo de espera de conexión memcached por omisión para las nuevas conexiones.
      (Para configurar el tiempo de espera de conexión memcached para las sesiones, utilice memcached.sess_connect_timeout en su lugar.)

       En modo no bloqueante, esto cambia el valor del tiempo de espera.
       Durante la conexión del socket en milisegundos.
       Especificar -1 significa un tiempo de espera infinito.
       Especificar 0 significa utilizar el tiempo de espera de conexión por omisión de la biblioteca memcached.
       El valor por omisión es 0.







      memcached.default_consistent_hash
      [bool](#language.types.boolean)



       Define el hachado consistente por omisión para las nuevas conexiones.
       (Para configurar el hachado consistente para las conexiones utilizadas por las sesiones,
       utilice memcached.sess_consistent_hash en su lugar.)

       Si se define como On, el hachado consistente (libketama) se utiliza para la
       gestión de sesiones. Cuando se utiliza el hachado consistente, se pueden añadir o eliminar nodos de caché
       sin perturbar las claves existentes. El valor por omisión es Off.







      memcached.sess_binary_protocol
      [bool](#language.types.boolean)



       Utilizar el protocolo binario memcached para las sesiones memcached en lugar del protocolo de texto.
       Las réplicas de libmemcached solo funcionan si el modo binario está activado.
       Sin embargo, algunos proxies (como twemproxy) solo funcionarán si el protocolo binario está desactivado.
       El valor por omisión es On desde libmemcached 1.0.18.
       Antes de libmemcached 1.0.18, el valor por omisión era Off.



      **Nota**:

        En versiones anteriores de php-memcached, este parámetro se llamaba
        memcached.sess_binary.








      memcached.sess_connect_timeout
      [int](#language.types.integer)



       El valor del tiempo de espera de conexión memcached.
       En modo no bloqueante, esto cambia el valor del tiempo de espera durante
       la conexión del socket en milisegundos.
       Especificar -1 significa un tiempo de espera infinito.







      memcached.sess_consistent_hash_type
      [string](#language.types.string)



       Tipo de hachado consistente de sesión Memcached.
       Si se define como ketama, el hachado consistente (libketama)
       se utiliza para la gestión de sesiones.
       Si se define como ketama_weighted, el hachado consistente ponderado (libketama)
       se utiliza para la gestión de sesiones.
       El valor por omisión es ketama.
       Antes de php-memcached 3.0, el valor por omisión era ketama_weighted.







      memcached.sess_lock_expire
      [int](#language.types.integer)



       El tiempo, en segundos, antes de que un cerrojo se libere.
       Definir como 0 da el comportamiento por omisión,
       que es utilizar max_execution_time de PHP.
       El valor por omisión es 0.







      memcached.sess_lock_retries
      [int](#language.types.integer)



       El número de intentos de cerrojo de sesión, sin contar el primer intento.
       El valor por omisión es 5.







      memcached.sess_lock_wait_max
      [int](#language.types.integer)



       El tiempo máximo, en milisegundos, de espera entre los intentos de cerrojo de sesión.
       El valor por omisión es 150.







      memcached.sess_lock_wait_min
      [int](#language.types.integer)



       El tiempo mínimo, en milisegundos, de espera entre los intentos de cerrojo de sesión.
       Este valor se duplica en cada nuevo intento de cerrojo hasta que
       memcached.sess_lock_wait_max se alcance, después de lo cual cualquier nuevo intento tomará
       memcached.sess_lock_wait_max segundos.
       El valor por omisión es 150.







      memcached.sess_persistent
      [bool](#language.types.boolean)



       Si las conexiones memcached coinciden con el/los valor(es) de
       session.save_path deben ser reutilizadas después de la ejecución del script. No utilizar
       si algunos parámetros (por ejemplo, los parámetros SASL, sess_binary_protocol) serían sobrescritos entre las peticiones.
       El valor por omisión es Off.







      memcached.sess_remove_failed_servers
      [bool](#language.types.boolean)



       Permite que el servidor Memcached en fallo sea eliminado automáticamente.
       El valor por omisión es Off.



      **Nota**:

        En versiones anteriores de php-memcached, este parámetro se llamaba
        memcached.sess_remove_failed.








      memcached.sess_server_failure_limit
      [int](#language.types.integer)



       Definir este valor para permitir la eliminación automática
       del servidor después de un cierto número de intentos de conexión fallidos.
       El valor por omisión es 0.







      memcached.sess_sasl_password
      [string](#language.types.string)



       La contraseña SASL de sesión.
       El nombre de usuario y la contraseña deben ser definidos para activar SASL.







      memcached.sess_sasl_username
      [string](#language.types.string)



       El nombre de usuario SASL de sesión.
       El nombre de usuario y la contraseña deben ser definidos para activar SASL.







      memcached.store_retry_count
      [int](#language.types.integer)



       La cantidad de intentos para los comandos de almacenamiento fallidos.
       Este mecanismo permite un fallo transparente hacia los servidores secundarios cuando
       las operaciones set/increment/decrement/setMulti fallan en
       el servidor deseado en un entorno multi-servidor.
       El valor por omisión es 2.





# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**[Memcached::OPT_COMPRESSION](#memcached.constants.opt-compression)**

     Activa o desactiva la compresión del contenido. Si está
     activada, los elementos que excedan un tamaño (actualmente
     200 bytes), serán comprimidos durante el almacenamiento, y
     descomprimidos al recuperar, de manera transparente. El umbral puede ser configurado
     mediante el parámetro ini [memcached.compression_threshold](#ini.memcached.compression-threshold).

     Tipo: [bool](#language.types.boolean), por omisión: **[true](#constant.true)**.

**[Memcached::OPT_COMPRESSION_TYPE](#memcached.constants.opt-compression-type)**

     Especifica el algoritmo de compresión a utilizar, si la compresión está activada.
     Los algoritmos válidos son **[Memcached::COMPRESSION_FASTLZ](#memcached.constants.compression-fastlz)**,
     **[Memcached::COMPRESSION_ZLIB](#memcached.constants.compression-zlib)** y
     **[Memcached::COMPRESSION_ZSTD](#memcached.constants.compression-zstd)**.

    Tipo: [int](#language.types.integer), por omisión: **[Memcached::COMPRESSION_FASTLZ](#memcached.constants.compression-fastlz)**.

**[Memcached::COMPRESSION_FASTLZ](#memcached.constants.compression-fastlz)**

     El algoritmo de compresión FASTLZ.

**[Memcached::COMPRESSION_ZLIB](#memcached.constants.compression-zlib)**

    El algoritmo de compresión ZLIB.

**[Memcached::COMPRESSION_ZSTD](#memcached.constants.compression-zstd)**

     El algoritmo de compresión ZSTD.


     Disponible a partir de Memcached 3.3.0.

**[Memcached::OPT_COMPRESSION_LEVEL](#memcached.constants.opt-compression-level)**

     Especifica el nivel de compresión a utilizar, si la compresión está activada.


     - **[Memcached::COMPRESSION_FASTLZ](#memcached.constants.compression-fastlz)** no soporta niveles de compresión.

     - **[Memcached::COMPRESSION_ZSTD](#memcached.constants.compression-zstd)**: el nivel mínimo es -22 y el nivel máximo es 22.

     - **[Memcached::COMPRESSION_ZLIB](#memcached.constants.compression-zlib)**: el nivel mínimo es 0 y el nivel máximo es 9.


    Tipo: [int](#language.types.integer), por omisión: 3.

**[Memcached::OPT_SERIALIZER](#memcached.constants.opt-serializer)**

     Especifica la función de serialización a utilizar para los valores no
     escalares. Las funciones válidas son
     **[Memcached::SERIALIZER_PHP](#memcached.constants.serializer-php)**,
     **[Memcached::SERIALIZER_IGBINARY](#memcached.constants.serializer-igbinary)**,
     **[Memcached::SERIALIZER_JSON](#memcached.constants.serializer-json)**,
     **[Memcached::SERIALIZER_JSON_ARRAY](#memcached.constants.serializer-json-array)** y
     **[Memcached::SERIALIZER_MSGPACK](#memcached.constants.serializer-msgpack)**.


     Tipo: [int](#language.types.integer), por omisión: **[Memcached::SERIALIZER_IGBINARY](#memcached.constants.serializer-igbinary)** si está disponible,
     luego **[Memcached::SERIALIZER_MSGPACK](#memcached.constants.serializer-msgpack)** si está disponible,
     luego **[Memcached::SERIALIZER_PHP](#memcached.constants.serializer-php)**.

**[Memcached::SERIALIZER_PHP](#memcached.constants.serializer-php)**

     La función de serialización por defecto de PHP.

**[Memcached::SERIALIZER_IGBINARY](#memcached.constants.serializer-igbinary)**

     El serializador [igbinary](#book.igbinary).
     En lugar de una representación textual, esta función almacena las
     estructuras PHP en un formato compacto y binario, con un ahorro
     de tiempo y espacio.


      Este serializador solo es soportado si memcached está configurado con
      la opción **--enable-memcached-igbinary** y si la extensión
      [igbinary](#intro.igbinary) está cargada.


**[Memcached::SERIALIZER_JSON](#memcached.constants.serializer-json)**

    El serializador JSON. Este serializador deserializa el JSON en un objeto.

**[Memcached::SERIALIZER_JSON_ARRAY](#memcached.constants.serializer-json-array)**

     El serializador JSON en array.
     Este serializador deserializa el JSON en un array asociativo.

**[Memcached::SERIALIZER_MSGPACK](#memcached.constants.serializer-msgpack)**

     El serializador [» MessagePack](https://pecl.php.net/package/msgpack).


     Este serializador solo es soportado si memcached está configurado con
     la opción **--enable-memcached-msgpack** y si la extensión
     msgpack está cargada.

**[Memcached::OPT_PREFIX_KEY](#memcached.constants.opt-prefix-key)**

     Esta opción puede ser utilizada para crear un "dominio" para las claves.
     El valor especificado aquí será prefijado a cada clave. No puede ser
     más largo que 128 caracteres, y reducirá en consecuencia
     el tamaño máximo de clave disponible. El prefijo solo se aplica
     a las claves de elemento, y no a las claves de servidor.

    Tipo: [string](#language.types.string), por omisión: "".

**[Memcached::OPT_HASH](#memcached.constants.opt-hash)**

     Especifica el algoritmo de hash utilizado para las claves. Los valores válidos
     son proporcionados con las constantes **[Memcached::HASH_*](#memcached.constants.hash-default)**.
     Cada algoritmo de hash tiene sus ventajas y desventajas. Utilice
     el que se proporciona por omisión, si no comprende, o si no le importa.

    Tipo: [int](#language.types.integer), por omisión: **[Memcached::HASH_DEFAULT](#memcached.constants.hash-default)**

**[Memcached::HASH_DEFAULT](#memcached.constants.hash-default)**

     El algoritmo por omisión (Jenkins one-at-a-time)
     de hash.

**[Memcached::HASH_MD5](#memcached.constants.hash-md5)**

     El algoritmo de hash por MD5

**[Memcached::HASH_CRC](#memcached.constants.hash-crc)**

     El algoritmo de hash por CRC

**[Memcached::HASH_FNV1_64](#memcached.constants.hash-fnv1-64)**

     El algoritmo de hash por FNV1_64

**[Memcached::HASH_FNV1A_64](#memcached.constants.hash-fnv1a-64)**

     El algoritmo de hash por FNV1_64A

**[Memcached::HASH_FNV1_32](#memcached.constants.hash-fnv1-32)**

     El algoritmo de hash por FNV1_32

**[Memcached::HASH_FNV1A_32](#memcached.constants.hash-fnv1a-32)**

     El algoritmo de hash por FNV1_32A

**[Memcached::HASH_HSIEH](#memcached.constants.hash-hsieh)**

     El algoritmo de hash por Hsieh

**[Memcached::HASH_MURMUR](#memcached.constants.hash-murmur)**

     El algoritmo de hash por Murmur

**[Memcached::OPT_DISTRIBUTION](#memcached.constants.opt-distribution)**

     Especifica el método de distribución de claves en los servidores.
     Actualmente, esta opción soporta el módulo y el hash consistente.
     El hash consistente proporciona la mejor distribución, y permite
     añadir servidores al grupo con un mínimo de pérdidas de caché.

    Tipo: [int](#language.types.integer), por omisión: **[Memcached::DISTRIBUTION_MODULA](#memcached.constants.distribution-modula)**.

**[Memcached::DISTRIBUTION_MODULA](#memcached.constants.distribution-modula)**

     El algoritmo de distribución por módulo

**[Memcached::DISTRIBUTION_CONSISTENT](#memcached.constants.distribution-consistent)**

     El algoritmo de distribución por hash consistente

**[Memcached::DISTRIBUTION_VIRTUAL_BUCKET](#memcached.constants.distribution-virtual-bucket)**

     Algoritmo de distribución de clave de hash Virtual Bucket (también llamado vbucket).

**[Memcached::OPT_LIBKETAMA_COMPATIBLE](#memcached.constants.opt-libketama-compatible)**

     Activa o no la compatibilidad con el comportamiento tipo libketama.
     Cuando esta opción está activada, el algoritmo de hash es MD5,
     y la distribución es el hash consistente. Esto es práctico porque
     otros clientes que utilizan libketama (Python, Ruby, etc.) con
     la misma configuración de servidor serán capaces de utilizar las mismas
     claves, de manera transparente.



    **Nota**:



      Esta opción es altamente recomendada, si se quiere utilizar
      el hash consistente, y es probable que esté activada por omisión en futuras versiones.




    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_LIBKETAMA_HASH](#memcached.constants.opt-libketama-hash)**

     Especifica el algoritmo de hash para el mapeo del host.

    Tipo: [int](#language.types.integer).

**[Memcached::OPT_TCP_KEEPALIVE](#memcached.constants.opt-tcp-keepalive)**

     Activa el mantenimiento de la conexión TCP (keep-alive).

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_BUFFER_WRITES](#memcached.constants.opt-buffer-writes)**

     Activa o no la bufferización de entrada/salida. La bufferización
     hace que los comandos de almacenamiento se buffericen, en lugar de
     enviarse. Cualquier acción que lea datos hace que el buffer de escritura sea enviado al servidor remoto. El cierre de la
     conexión o su parada también forzarán el envío de los datos del buffer.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_BINARY_PROTOCOL](#memcached.constants.opt-binary-protocol)**

     Active esta opción para utilizar el protocolo binario.
     Tenga en cuenta que no puede cambiar esta opción para
     una conexión ya abierta.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_NO_BLOCK](#memcached.constants.opt-no-block)**

     Activa o no los transferencias asíncronas. Este es el modo de transferencia
     más rápido, para las funciones de almacenamiento.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_NOREPLY](#memcached.constants.opt-noreply)**

     Activa o desactiva la ignoración del resultado de los comandos de almacenamiento
     (set, add, replace, append, prepend, delete, increment, decrement, etc.).
     Los comandos de almacenamiento serán enviados sin pasar tiempo esperando
     una respuesta (no habría respuesta).
     Los comandos de recuperación como [Memcached::get()](#memcached.get)
     no son afectados por esta configuración.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_TCP_NODELAY](#memcached.constants.opt-tcp-nodelay)**

     Activa o no las conexiones sin retraso de los sockets (esto puede ser
     un aumento de rendimiento en algunos entornos.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_SOCKET_SEND_SIZE](#memcached.constants.opt-socket-send-size)**

     El tamaño máximo del buffer de envío por socket, en bytes.


     Tipo: [int](#language.types.integer), por omisión: varía según la configuración de la plataforma/núcleo.

**[Memcached::OPT_SOCKET_RECV_SIZE](#memcached.constants.opt-socket-recv-size)**

     El tamaño máximo del buffer de recepción por socket, en bytes.


     Tipo: [int](#language.types.integer), por omisión: varía según la configuración de la plataforma/núcleo.

**[Memcached::OPT_CONNECT_TIMEOUT](#memcached.constants.opt-connect-timeout)**

     En modo no bloqueante, esta opción configura el tiempo de espera
     durante la conexión del socket, en milisegundos.

    Tipo: [int](#language.types.integer), por omisión: 1000.

**[Memcached::OPT_RETRY_TIMEOUT](#memcached.constants.opt-retry-timeout)**

     La duración, en segundos, de espera antes de intentar nuevamente una
     conexión que ha fallado.

    Tipo: [int](#language.types.integer), por omisión: 2.

**[Memcached::OPT_DEAD_TIMEOUT](#memcached.constants.opt-dead-timeout)**

     La duración, en segundos, de espera antes de reintentar con los servidores muertos.
     0 significa ningún reintento.

    Tipo: [int](#language.types.integer), por omisión: 0.

**[Memcached::OPT_SEND_TIMEOUT](#memcached.constants.opt-send-timeout)**

     Tiempo de espera de envío para el socket, en microsegundos. En los casos
     donde se utiliza un socket no bloqueante, esto permitirá tener
     tiempos de espera en el envío de datos, de todos modos.

    Tipo: [int](#language.types.integer), por omisión: 0.

**[Memcached::OPT_RECV_TIMEOUT](#memcached.constants.opt-recv-timeout)**

     Tiempo de espera de recepción para el socket, en microsegundos. En los casos
     donde se utiliza un socket no bloqueante, esto permitirá tener
     tiempos de espera en la recepción de datos, de todos modos.

    Tipo: [int](#language.types.integer), por omisión: 0.

**[Memcached::OPT_POLL_TIMEOUT](#memcached.constants.opt-poll-timeout)**

     Tiempo de espera para la consulta de conexiones, en milisegundos.

    Tipo: [int](#language.types.integer), por omisión: 1000.

**[Memcached::OPT_CACHE_LOOKUPS](#memcached.constants.opt-cache-lookups)**

     Activa o no el caché de DNS.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_SERVER_FAILURE_LIMIT](#memcached.constants.opt-server-failure-limit)**

     Especifica el límite del número de fallos de conexión. El servidor será
     retirado de la lista después de tantos fallos de conexión consecutivos.

    Tipo: [int](#language.types.integer), por omisión: 5.

**[Memcached::OPT_SERVER_TIMEOUT_LIMIT](#memcached.constants.opt-server-timeout-limit)**

     Especifica el límite de tiempo de espera para los intentos de conexión al servidor.
     El servidor será eliminado después de este número de tiempos de espera continuos de conexión.

    Tipo: [int](#language.types.integer), por omisión: 0.

**[Memcached::OPT_AUTO_EJECT_HOSTS](#memcached.constants.opt-auto-eject-hosts)**

     Elimina los servidores desactivados de la lista. Para utilizar con
     **[Memcached::OPT_SERVER_FAILURE_LIMIT](#memcached.constants.opt-server-failure-limit)** y
     **[Memcached::OPT_SERVER_TIMEOUT_LIMIT](#memcached.constants.opt-server-timeout-limit)**.



    **Nota**:



      Esta opción es reemplazada por
      **[Memcached::OPT_REMOVE_FAILED_SERVERS](#memcached.constants.opt-remove-failed-servers)**.




    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_VERIFY_KEY](#memcached.constants.opt-verify-key)**

     Activa la verificación de claves por memcached.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_USE_UDP](#memcached.constants.opt-use-udp)**

     Utiliza UDP en lugar de TCP.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_NUMBER_OF_REPLICAS](#memcached.constants.opt-number-of-replicas)**

     Almacena este número de réplicas de cada elemento en diferentes servidores.

    Tipo: [int](#language.types.integer), por omisión: 0.

**[Memcached::OPT_RANDOMIZE_REPLICA_READS](#memcached.constants.opt-randomize-replica-reads)**

     Randomiza el servidor de lectura de réplica.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::OPT_REMOVE_FAILED_SERVERS](#memcached.constants.opt-remove-failed-servers)**

     Elimina los servidores desactivados de la lista. Para utilizar con
     **[Memcached::OPT_SERVER_FAILURE_LIMIT](#memcached.constants.opt-server-failure-limit)** y
     **[Memcached::OPT_SERVER_TIMEOUT_LIMIT](#memcached.constants.opt-server-timeout-limit)**.

    Tipo: [bool](#language.types.boolean), por omisión: **[false](#constant.false)**.

**[Memcached::HAVE_IGBINARY](#memcached.constants.have-igbinary)**

     Indica si el soporte de la función de serialización
     igbinary está activado.

    Tipo: [bool](#language.types.boolean).

**[Memcached::HAVE_JSON](#memcached.constants.have-json)**

     Indica si la función de serialización JSON
     está disponible.

    Tipo: [bool](#language.types.boolean).

**[Memcached::HAVE_MSGPACK](#memcached.constants.have-msgpack)**

    Indica si el soporte del serializador msgpack está disponible.
    Tipo: [bool](#language.types.boolean).


    Disponible a partir de Memcached 3.0.0.

**[Memcached::HAVE_ZSTD](#memcached.constants.have-zstd)**

    Indica si la soporte de la compresión ZSTD está disponible.
    Tipo: [bool](#language.types.boolean).


    Disponible a partir de Memcached 3.3.0.

**[Memcached::HAVE_ENCODING](#memcached.constants.have-encoding)**

     Indica si el cifrado de datos mediante
     [Memcached::setEncodingKey()](#memcached.setencodingkey) está soportado.

    Tipo: [bool](#language.types.boolean).


    Disponible a partir de Memcached 3.1.0.

**[Memcached::HAVE_SESSION](#memcached.constants.have-session)**

    Tipo: [bool](#language.types.boolean).


    Disponible a partir de Memcached 3.0.0.

**[Memcached::HAVE_SASL](#memcached.constants.have-sasl)**

    Tipo: [bool](#language.types.boolean).


    Disponible a partir de Memcached 3.0.0.

**[Memcached::GET_EXTENDED](#memcached.constants.get-extended)**

     Una bandera para [Memcached::get()](#memcached.get),
     [Memcached::getMulti()](#memcached.getmulti) y
     [Memcached::getMultiByKey()](#memcached.getmultibykey) para asegurar
     que los valores del token CAS también sean devueltos.



    Disponible a partir de Memcached 3.0.0.

**[Memcached::GET_PRESERVE_ORDER](#memcached.constants.get-preserve-order)**

    Una opción para [Memcached::getMulti()](#memcached.getmulti) y
     [Memcached::getMultiByKey()](#memcached.getmultibykey) para asegurar que las
     claves sean devueltas en el mismo orden que su orden de solicitud.
     Las claves inexistentes toman entonces el valor **[null](#constant.null)**.

**[Memcached::RES_SUCCESS](#memcached.constants.res-success)**

     La operación ha tenido éxito.

**[Memcached::RES_FAILURE](#memcached.constants.res-failure)**

     La operación ha fallado, de una manera u otra.

**[Memcached::RES_HOST_LOOKUP_FAILURE](#memcached.constants.res-host-lookup-failure)**

     La búsqueda DNS ha fallado.

**[Memcached::RES_UNKNOWN_READ_FAILURE](#memcached.constants.res-unknown-read-failure)**

     Fallo de lectura en la red.

**[Memcached::RES_PROTOCOL_ERROR](#memcached.constants.res-protocol-error)**

     Comando incorrecto en el protocolo memcached.

**[Memcached::RES_CLIENT_ERROR](#memcached.constants.res-client-error)**

     Error del lado del cliente.

**[Memcached::RES_SERVER_ERROR](#memcached.constants.res-server-error)**

     Error del lado del servidor.

**[Memcached::RES_WRITE_FAILURE](#memcached.constants.res-write-failure)**

     Fallo de escritura en la red.

**[Memcached::RES_DATA_EXISTS](#memcached.constants.res-data-exists)**

     Fallo de comparación y intercambio: el elemento que se intenta
     almacenar ha sido modificado desde la última lectura.

**[Memcached::RES_NOTSTORED](#memcached.constants.res-notstored)**

     El elemento no ha sido almacenado, pero no debido a un error. Esto es
     normal, y significa que una condición para un añadido "add" o
     un reemplazo "replace" no ha sido satisfecha, o
     que un elemento ha sido puesto en una cola de borrado.

**[Memcached::RES_NOTFOUND](#memcached.constants.res-notfound)**

     El elemento con esta clave no ha sido encontrado (con una operación
     "get" o "cas").

**[Memcached::RES_PARTIAL_READ](#memcached.constants.res-partial-read)**

     Error de lectura parcial en la red.

**[Memcached::RES_SOME_ERRORS](#memcached.constants.res-some-errors)**

     Han ocurrido errores durante una lectura múltiple.

**[Memcached::RES_NO_SERVERS](#memcached.constants.res-no-servers)**

     Lista de servidores vacía.

**[Memcached::RES_END](#memcached.constants.res-end)**

     Fin del conjunto de resultados.

**[Memcached::RES_ERRNO](#memcached.constants.res-errno)**

     Error del sistema.

**[Memcached::RES_BUFFERED](#memcached.constants.res-buffered)**

     La operación ha sido bufferizada.

**[Memcached::RES_TIMEOUT](#memcached.constants.res-timeout)**

     El tiempo de ejecución de la operación ha expirado.

**[Memcached::RES_BAD_KEY_PROVIDED](#memcached.constants.res-bad-key-provided)**

     Clave incorrecta.

**[Memcached::RES_STORED](#memcached.constants.res-stored)**

    Elemento almacenado.

**[Memcached::RES_DELETED](#memcached.constants.res-deleted)**

    Elemento eliminado.

**[Memcached::RES_STAT](#memcached.constants.res-stat)**

    Estadísticas.

**[Memcached::RES_ITEM](#memcached.constants.res-item)**

    Elemento.

**[Memcached::RES_NOT_SUPPORTED](#memcached.constants.res-not-supported)**

    No soportado.

**[Memcached::RES_FETCH_NOTFINISHED](#memcached.constants.res-fetch-notfinished)**

    Recuperación no terminada.

**[Memcached::RES_SERVER_MARKED_DEAD](#memcached.constants.res-server-marked-dead)**

    Servidor marcado como muerto.

**[Memcached::RES_UNKNOWN_STAT_KEY](#memcached.constants.res-unknown-stat-key)**

    Clave de estadística desconocida.

**[Memcached::RES_INVALID_HOST_PROTOCOL](#memcached.constants.res-invalid-host-protocol)**

    Protocolo de host inválido.

**[Memcached::RES_MEMORY_ALLOCATION_FAILURE](#memcached.constants.res-memory-allocation-failure)**

    Fallo de asignación de memoria.

**[Memcached::RES_CONNECTION_SOCKET_CREATE_FAILURE](#memcached.constants.res-connection-socket-create-failure)**

    No se puede crear un socket.

**[Memcached::RES_PAYLOAD_FAILURE](#memcached.constants.res-payload-failure)**

     Fallo de procesamiento: no se puede comprimir,
     descomprimir o serializar el valor.

**[Memcached::RES_AUTH_PROBLEM](#memcached.constants.res-auth-problem)**

    Disponible a partir de Memcached 3.0.0.

**[Memcached::RES_AUTH_FAILURE](#memcached.constants.res-auth-failure)**

    Disponible a partir de Memcached 3.0.0.

**[Memcached::RES_AUTH_CONTINUE](#memcached.constants.res-auth-continue)**

    Disponible a partir de Memcached 3.0.0.

**[Memcached::RES_E2BIG](#memcached.constants.res-e2big)**

    Disponible a partir de Memcached 3.0.0.

**[Memcached::RES_KEY_TOO_BIG](#memcached.constants.res-key-too-big)**

    Disponible a partir de Memcached 3.0.0.

**[Memcached::RES_SERVER_TEMPORARILY_DISABLED](#memcached.constants.res-server-temporarily-disabled)**

    Disponible a partir de Memcached 3.0.0.

**[Memcached::RES_SERVER_MEMORY_ALLOCATION_FAILURE](#memcached.constants.res-server-memory-allocation-failure)**

    Disponible a partir de Memcached 3.0.0.

# Tiempos de expiración

Algunos comandos de almacenamiento implican el envío de un valor de expiración (relativo a un
ítem o a una operación solicitada por el cliente) al servidor. En todos los
casos, el valor real enviado podría ser en tiempo Unix (un valor de tipo integer con el
número de segundos transcurridos desde el 1 de enero de 1970), o el número de segundos comenzando
desde el instante actual. En este caso, el número no debe exceder
de 60*60*24\*30 (que corresponde al número de segundos en 30 días); si se excede el valor
del tiempo de expiración, el servidor lo considerará como tiempo Unix en lugar del
número de segundos desde el instante actual.

Si el valor de la expiración es 0 (el predeterminado), el ítem
nunca caducará (aunque puede ser eliminado del servidor para hacer sitio
a otros ítems).

# Funciones de retorno

## Tabla de contenidos

- [Funciones de retorno de resultados](#memcached.callbacks.result)
- [Funciones de retorno para claves ausentes](#memcached.callbacks.read-through)

    ## Funciones de retorno de resultados

    Las funciones de retorno de resultados (tipo [callable](#language.types.callable))
    son invocadas por las funciones
    [Memcached::getDelayed()](#memcached.getdelayed) o
    [Memcached::getDelayedBykey()](#memcached.getdelayedbykey), para cada
    elemento del conjunto de resultados. Las funciones de retorno reciben un objeto
    Memcached y un array con la información sobre el elemento. La función de retorno
    no necesita devolver nada.

    **Ejemplo #1 Ejemplo de función de retorno de resultados**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);
$items = array(
    'key1' =&gt; 'value1',
    'key2' =&gt; 'value2',
    'key3' =&gt; 'value3'
);
$m-&gt;setMulti($items);
$m-&gt;getDelayed(array('key1', 'key3'), true, 'result_cb');

function result_cb($memc, $item)
{
    var_dump($item);
}
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
["key"]=&gt;
string(4) "key1"
["value"]=&gt;
string(6) "value1"
["cas"]=&gt;
float(49)
}
array(3) {
["key"]=&gt;
string(4) "key3"
["value"]=&gt;
string(6) "value3"
["cas"]=&gt;
float(50)
}

## Funciones de retorno para claves ausentes

Las funciones de retorno para claves ausentes son invocadas cuando un elemento no puede
ser leído en el servidor. La función de retorno recibe un objeto Memcached,
la clave solicitada, y un valor de variable por referencia. La función de retorno
es entonces responsable de asignar el valor, y luego devolver
**[true](#constant.true)** o **[false](#constant.false)**. Si la función de retorno devuelve **[true](#constant.true)**
Memcached almacenará el valor así creado en el servidor, y lo devolverá
a la función invocante. Solo [Memcached::get()](#memcached.get) y
[Memcached::getByKey()](#memcached.getbykey) soportan estas funciones,
ya que el protocolo memcache no proporciona ninguna información sobre la ausencia de
clave en una petición multiclave.

**Ejemplo #1 Funciones de retorno para claves ausentes**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$profile_info = $m-&gt;get('user:'.$user_id, 'user_info_cb');

function user_info_cb($memc, $key, &amp;$value)
{
$user_id = substr($key, 5);
/_ Lee un perfil en una base de datos _/
/_ ... _/
$value = $profile_info;
return true;
}
?&gt;

# Soporte para sesiones

Memcached proporciona un controlador personalizado de sesiones que puede emplearse para almacenar
sesiones de usuario en memcache. Utiliza internamente una instancia diferente para este
propósito, por lo que se puede utilizar una agrupación de servidores diferente si fuera necesario. Las
claves de sesiones se almacenan bajo el prefijo
memc.sess.key., por lo que hay que considerar esto si se utiliza
la misma agrupación de servidores para caché de sesiones y caché genérica.

     session.save_handler
     [string](#language.types.string)



      Establecer a memcached para activar el soporte para sesiones.








     session.save_path
     [string](#language.types.string)



      Define entradas nombre_host:puerto separadas por comas para
      utilizarlas en agrupaciones de servidores de sesiones, por ejemplo
      "sess1:11211, sess2:11211".


# La clase Memcached

(PECL memcached &gt;= 0.1.0)

## Introducción

    Representa una conexión con un servidor memcache.

## Sinopsis de la Clase

     ****




      class **Memcached**

     {

    /* Métodos */

public [\_\_construct](#memcached.construct)([?](#language.types.null)[string](#language.types.string) $persistent_id = **[null](#constant.null)**, [?](#language.types.null)[callable](#language.types.callable) $callback = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $connection_str = **[null](#constant.null)**)

    public [add](#memcached.add)([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

public [addByKey](#memcached.addbykey)(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)
public [addServer](#memcached.addserver)([string](#language.types.string) $host, [int](#language.types.integer) $port, [int](#language.types.integer) $weight = 0): [bool](#language.types.boolean)
public [addServers](#memcached.addservers)([array](#language.types.array) $servers): [bool](#language.types.boolean)
public [append](#memcached.append)([string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)
public [appendByKey](#memcached.appendbykey)([string](#language.types.string) $server_key, [string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)
public [cas](#memcached.cas)(
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $cas_token,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)
public [casByKey](#memcached.casbykey)(
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $cas_token,
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)
public [decrement](#memcached.decrement)(
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)
public [decrementByKey](#memcached.decrementbykey)(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)
public [delete](#memcached.delete)([string](#language.types.string) $key, [int](#language.types.integer) $time = 0): [bool](#language.types.boolean)
public [deleteByKey](#memcached.deletebykey)([string](#language.types.string) $server_key, [string](#language.types.string) $key, [int](#language.types.integer) $time = 0): [bool](#language.types.boolean)
public [deleteMulti](#memcached.deletemulti)([array](#language.types.array) $keys, [int](#language.types.integer) $time = 0): [array](#language.types.array)
public [deleteMultiByKey](#memcached.deletemultibykey)([string](#language.types.string) $server_key, [array](#language.types.array) $keys, [int](#language.types.integer) $time = 0): [array](#language.types.array)
public [fetch](#memcached.fetch)(): [array](#language.types.array)|[false](#language.types.singleton)
public [fetchAll](#memcached.fetchall)(): [array](#language.types.array)|[false](#language.types.singleton)
public [flush](#memcached.flush)([int](#language.types.integer) $delay = 0): [bool](#language.types.boolean)
public [get](#memcached.get)([string](#language.types.string) $key, [?](#language.types.null)[callable](#language.types.callable) $cache_cb = **[null](#constant.null)**, [int](#language.types.integer) $get_flags = 0): [mixed](#language.types.mixed)
public [getAllKeys](#memcached.getallkeys)(): [array](#language.types.array)|[false](#language.types.singleton)
public [getByKey](#memcached.getbykey)(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [?](#language.types.null)[callable](#language.types.callable) $cache_cb = **[null](#constant.null)**,
    [int](#language.types.integer) $get_flags = 0
): [mixed](#language.types.mixed)
public [getDelayed](#memcached.getdelayed)([array](#language.types.array) $keys, [bool](#language.types.boolean) $with_cas = **[false](#constant.false)**, [?](#language.types.null)[callable](#language.types.callable) $value_cb = **[null](#constant.null)**): [bool](#language.types.boolean)
public [getDelayedByKey](#memcached.getdelayedbykey)(
    [string](#language.types.string) $server_key,
    [array](#language.types.array) $keys,
    [bool](#language.types.boolean) $with_cas = **[false](#constant.false)**,
    [?](#language.types.null)[callable](#language.types.callable) $value_cb = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [getMulti](#memcached.getmulti)([array](#language.types.array) $keys, [int](#language.types.integer) $get_flags = 0): [array](#language.types.array)|[false](#language.types.singleton)
public [getMultiByKey](#memcached.getmultibykey)([string](#language.types.string) $server_key, [array](#language.types.array) $keys, [int](#language.types.integer) $get_flags = 0): [array](#language.types.array)|[false](#language.types.singleton)
public [getOption](#memcached.getoption)([int](#language.types.integer) $option): [mixed](#language.types.mixed)
public [getResultCode](#memcached.getresultcode)(): [int](#language.types.integer)
public [getResultMessage](#memcached.getresultmessage)(): [string](#language.types.string)
public [getServerByKey](#memcached.getserverbykey)([string](#language.types.string) $server_key): [array](#language.types.array)|[false](#language.types.singleton)
public [getServerList](#memcached.getserverlist)(): [array](#language.types.array)
public [getStats](#memcached.getstats)([?](#language.types.null)[string](#language.types.string) $type = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)
public [getVersion](#memcached.getversion)(): [array](#language.types.array)|[false](#language.types.singleton)
public [increment](#memcached.increment)(
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)
public [incrementByKey](#memcached.incrementbykey)(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)
public [isPersistent](#memcached.ispersistent)(): [bool](#language.types.boolean)
public [isPristine](#memcached.ispristine)(): [bool](#language.types.boolean)
public [prepend](#memcached.prepend)([string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)
public [prependByKey](#memcached.prependbykey)([string](#language.types.string) $server_key, [string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)
public [quit](#memcached.quit)(): [bool](#language.types.boolean)
public [replace](#memcached.replace)([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)
public [replaceByKey](#memcached.replacebykey)(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)
public [resetServerList](#memcached.resetserverlist)(): [bool](#language.types.boolean)
public [set](#memcached.set)([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)
public [setByKey](#memcached.setbykey)(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)
public [setEncodingKey](#memcached.setencodingkey)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [setMulti](#memcached.setmulti)([array](#language.types.array) $items, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)
public [setMultiByKey](#memcached.setmultibykey)([string](#language.types.string) $server_key, [array](#language.types.array) $items, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)
public [setOption](#memcached.setoption)([int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)
public [setOptions](#memcached.setoptions)([array](#language.types.array) $options): [bool](#language.types.boolean)
public [setSaslAuthData](#memcached.setsaslauthdata)([string](#language.types.string) $username, [string](#language.types.string) $password): [bool](#language.types.boolean)
public [touch](#memcached.touch)([string](#language.types.string) $key, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)
public [touchByKey](#memcached.touchbykey)([string](#language.types.string) $server_key, [string](#language.types.string) $key, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

}

# Memcached::add

(PECL memcached &gt;= 0.1.0)

Memcached::add — Añade un nuevo elemento bajo una nueva clave

### Descripción

public **Memcached::add**([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::add()** es similar a
[Memcached::set()](#memcached.set), pero la operación falla si
la clave key ya existe.

### Parámetros

     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) devuelve la constante
**[Memcached::RES_NOTSTORED](#memcached.constants.res-notstored)** si la clave ya existe.

### Ver también

    - [Memcached::addByKey()](#memcached.addbykey) - Añade un elemento en un servidor designado

    - [Memcached::set()](#memcached.set) - Almacena un elemento

    - [Memcached::replace()](#memcached.replace) - Remplaza un elemento bajo una clave

# Memcached::addByKey

(PECL memcached &gt;= 0.1.0)

Memcached::addByKey — Añade un elemento en un servidor designado

### Descripción

public **Memcached::addByKey**(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)

**Memcached::addByKey()** es funcionalmente equivalente
a [Memcached::add()](#memcached.add), pero la variable libre
server_key puede ser utilizada para dirigir
la clave key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) va devolver
la constante **[Memcached::RES_NOTSTORED](#memcached.constants.res-notstored)** si la clave ya existe.

### Ver también

    - [Memcached::add()](#memcached.add) - Añade un nuevo elemento bajo una nueva clave

    - [Memcached::set()](#memcached.set) - Almacena un elemento

    - [Memcached::replace()](#memcached.replace) - Remplaza un elemento bajo una clave

# Memcached::addServer

(PECL memcached &gt;= 0.1.0)

Memcached::addServer — Añade un servidor al grupo

### Descripción

public **Memcached::addServer**([string](#language.types.string) $host, [int](#language.types.integer) $port, [int](#language.types.integer) $weight = 0): [bool](#language.types.boolean)

**Memcached::addServer()** añade el servidor indicado
al grupo de servidores. No se establece ninguna conexión en ese momento, pero
si se utiliza la clave de distribución por hash consistente (a través
de **[Memcached::DISTRIBUTION_CONSISTENT](#memcached.constants.distribution-consistent)** o
**[Memcached::OPT_LIBKETAMA_COMPATIBLE](#memcached.constants.opt-libketama-compatible)**), ciertas estructuras
internas van a ser actualizadas. Por lo tanto, si es necesario añadir varios
servidores, se recomienda utilizar [Memcached::addServers()](#memcached.addservers)
para que la actualización ocurra una sola vez.

El mismo servidor puede aparecer varias veces en el grupo, ya que no se realiza
ninguna búsqueda de duplicados. Esto no es recomendado: en su lugar, utilice el
argumento weight para aumentar el peso de un servidor
en la selección.

### Parámetros

     host


       El nombre de host del servidor memcache. Si el nombre de host no es válido,
       las operaciones sobre los datos van a definir el código de resultado
       **[Memcached::RES_HOST_LOOKUP_FAILURE](#memcached.constants.res-host-lookup-failure)**. Desde
       la versión 2.0.0b1, este argumento también puede especificar la ruta
       hacia un socket Unix, por ejemplo; /ruta/hacia/memcached.sock
       para utilizar el socket de dominio Unix, y en este caso,
       el argumento port también debe ser definido a
       0.






     port


       El puerto en el que memcache funciona. Generalmente, es
       11211. Desde la versión 2.0.0b1, defina
       este argumento a 0 cuando se utilicen sockets
       de dominio Unix.






     weight


       El peso del servidor relativamente al peso total de todos los servidores. Esto
       controla la probabilidad de que un servidor sea seleccionado durante las operaciones.
       Esta opción solo se utiliza con la distribución consistente, y generalmente,
       esto corresponde al total de memoria disponible en este servidor.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::addServer()**

&lt;?php
$m = new Memcached();

/_ Añade dos servidores, y el segundo es dos veces
más solicitado que el primero _/
$m-&gt;addServer('mem1.domain.com', 11211, 33);
$m-&gt;addServer('mem2.domain.com', 11211, 67);
?&gt;

### Ver también

    - [Memcached::addServers()](#memcached.addservers) - Añade múltiples servidores al grupo

    - [Memcached::resetServerList()](#memcached.resetserverlist) - Elimina todos los servidores de la lista de servidores

# Memcached::addServers

(PECL memcached &gt;= 0.1.1)

Memcached::addServers — Añade múltiples servidores al grupo

### Descripción

public **Memcached::addServers**([array](#language.types.array) $servers): [bool](#language.types.boolean)

**Memcached::addServers()** añade los servidores
servers al grupo de servidores. Cada entrada
en servers debe ser un array, conteniendo
el nombre de host, y opcionalmente su peso. No se establece ninguna conexión
con el servidor en este momento.

El mismo servidor puede aparecer múltiples veces en el grupo, ya que
no se realiza ninguna verificación de duplicación. Esto no es recomendado.
En su lugar, es preferible utilizar el argumento
weight para aumentar el peso del servidor.

### Parámetros

     array


       Un array de servidores a añadir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::addServers()**

&lt;?php
$m = new Memcached();

$servers = array(
    array('mem1.domain.com', 11211, 33),
    array('mem2.domain.com', 11211, 67)
);
$m-&gt;addServers($servers);
?&gt;

### Ver también

    - [Memcached::addServer()](#memcached.addserver) - Añade un servidor al grupo

    - [Memcached::resetServerList()](#memcached.resetserverlist) - Elimina todos los servidores de la lista de servidores

# Memcached::append

(PECL memcached &gt;= 0.1.0)

Memcached::append — Añade datos a un elemento

### Descripción

public **Memcached::append**([string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)

**Memcached::append()** añade los datos de
value al final de un elemento existente. La razón por la que
value debe ser una cadena es que los otros tipos no soportan esta operación.

**Nota**:

    Si la constante **[Memcached::OPT_COMPRESSION](#memcached.constants.opt-compression)** está activada,
    la operación fallará, y se emitirá una advertencia, ya que no es posible prever
    datos comprimidos.

### Parámetros

     key


       La clave del elemento a sobrescribir.






     value


       La cadena a añadir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Devuelve **[null](#constant.null)** si la compresión está activada.

### Errores/Excepciones

Devuelve **[null](#constant.null)** y genera un **[E_WARNING](#constant.e-warning)**
si la compresión está activada.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::append()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);
$m-&gt;setOption(Memcached::OPT_COMPRESSION, false);

$m-&gt;set('foo', 'abc');
$m-&gt;append('foo', 'def');
var_dump($m-&gt;get('foo'));
?&gt;

    El ejemplo anterior mostrará:

string(6) "abcdef"

### Ver también

    - [Memcached::appendByKey()](#memcached.appendbykey) - Añade datos a un elemento

    - [Memcached::prepend()](#memcached.prepend) - Prefijo de datos a un elemento existente

# Memcached::appendByKey

(PECL memcached &gt;= 0.1.0)

Memcached::appendByKey — Añade datos a un elemento

### Descripción

public **Memcached::appendByKey**([string](#language.types.string) $server_key, [string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)

**Memcached::appendByKey()** es funcionalmente equivalente
a [Memcached::append()](#memcached.append), pero la variable libre
server_key puede ser utilizada para dirigir
la clave key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       La clave del elemento al que se añaden datos.






     value


       La cadena a añadir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Devuelve **[null](#constant.null)** si la compresión está activada.

### Errores/Excepciones

Devuelve **[null](#constant.null)** y genera un **[E_WARNING](#constant.e-warning)**
si la compresión está activada.

### Ver también

    - [Memcached::append()](#memcached.append) - Añade datos a un elemento

    - [Memcached::prepend()](#memcached.prepend) - Prefijo de datos a un elemento existente

# Memcached::cas

(PECL memcached &gt;= 0.1.0)

Memcached::cas — Comparar y cambiar un elemento

### Descripción

public **Memcached::cas**(
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $cas_token,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)

**Memcached::cas()** realiza una operación de
"check and set" (literalmente, verificar y asignar),
de manera que el elemento solo se almacena si ningún otro cliente
lo ha actualizado desde que fue leído por el cliente actual. La verificación
se realiza mediante el argumento cas_token que es un
valor único de 64 bits, asignado al elemento por memcached. Consulte la documentación
de **Memcached::get\*()** para saber cómo obtener este valor. Tenga en cuenta que este valor se representa como un número flotante, debido a limitaciones en el espacio de enteros de PHP.

### Parámetros

     cas_token


       Valor único asociado a un elemento existente. Generado por memcached.






     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) va devolver
la constante **[Memcached::RES_DATA_EXISTS](#memcached.constants.res-data-exists)** si el elemento que
se intenta almacenar ha sido modificado desde la última lectura.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::cas()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

do {
/_ Lee una IP y su CAS _/
$ips = $m-&gt;get('ip_block', null, $cas);
    /* Si la IP no existe aún, se crea y se realiza
       un añadido atómico que fallará si la IP ya ha sido añadida */
    if ($m-&gt;getResultCode() == Memcached::RES_NOTFOUND) {
$ips = array($\_SERVER['REMOTE_ADDR']);
$m-&gt;add('ip_block', $ips);
    /* De lo contrario, se añade la IP a la lista, y se almacena con la operación
       compare-and-swap y el token, que fallará si la lista ha sido actualizada */
    } else {
        $ips[] = $_SERVER['REMOTE_ADDR'];
        $m-&gt;cas($cas, 'ip_block', $ips);
    }
} while ($m-&gt;getResultCode() != Memcached::RES_SUCCESS);

?&gt;

### Ver también

    - [Memcached::casByKey()](#memcached.casbykey) - Comparar y cambiar un elemento en un servidor

# Memcached::casByKey

(PECL memcached &gt;= 0.1.0)

Memcached::casByKey — Comparar y cambiar un elemento en un servidor

### Descripción

public **Memcached::casByKey**(
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $cas_token,
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)

**Memcached::casByKey()** es funcionalmente equivalente
a [Memcached::cas()](#memcached.cas), pero la variable
server_key puede ser utilizada para dirigir
la clave key a un servidor específico.

### Parámetros

     cas_token


       Valor único, asociado a un elemento existente. Generado por memcache.






     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) va devolver
**[Memcached::RES_DATA_EXISTS](#memcached.constants.res-data-exists)** si el elemento que se intenta
almacenar ha sido modificado desde la última lectura.

### Ver también

    - [Memcached::cas()](#memcached.cas) - Comparar y cambiar un elemento

# Memcached::\_\_construct

(PECL memcached &gt;= 0.1.0)

Memcached::\_\_construct — Crea un objeto Memcached

### Descripción

public **Memcached::\_\_construct**([?](#language.types.null)[string](#language.types.string) $persistent_id = **[null](#constant.null)**, [?](#language.types.null)[callable](#language.types.callable) $callback = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $connection_str = **[null](#constant.null)**)

Crea un objeto Memcached que representa la conexión al servidor memcache.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     persistent_id


       Por omisión, las instancias Memcached son destruidas al final de la
       petición. Para crear un objeto que persiste entre las peticiones, utilice
       el argumento persistent_id para especificar un identificador
       único para la instancia. Todos los objetos creados con el mismo
       identificador persistent_id compartirán la misma conexión.






     callback









     connection_str








### Ejemplos

    **Ejemplo #1 Creación de un objeto Memcached**

&lt;?php
/_ Creación de un objeto clásico _/
$m = new Memcached();
echo get_class($m);

/_ Creación de un objeto persistente _/
$m2 = new Memcached('story_pool');
$m3 = new Memcached('story_pool');

/_ Ahora $m2 y $m3 comparten la misma conexión _/
?&gt;

# Memcached::decrement

(PECL memcached &gt;= 0.1.0)

Memcached::decrement — Disminuye un valor numérico

### Descripción

public **Memcached::decrement**(
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**Memcached::decrement()** disminuye el valor numérico
de offset unidades. Si el elemento no es numérico,
se emitirá un error. Si la operación intenta disminuir por debajo de 0,
el nuevo valor será 0. **Memcached::decrement()**
establecerá el elemento al valor del parámetro initial_value
si la clave no existe.

### Parámetros

     key


       La clave del elemento a disminuir.






     offset


       La cantidad con la que disminuir el elemento.






     initial_value


       El valor a utilizar para definir el elemento si no existe.






     expiry


       El tiempo de expiración en la definición del elemento.





### Valores devueltos

Devuelve el nuevo valor del elemento en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::decrement()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('counter', 5);
$n = $m-&gt;decrement('counter');
var_dump($n);

$n = $m-&gt;decrement('counter', 10);
var_dump($n);

var_dump($m-&gt;get('counter'));

$m-&gt;set('counter', 'abc');
$n = $m-&gt;increment('counter');
// ^ fallará debido a que el valor del elemento no es numérico
var_dump($n);
?&gt;

    El ejemplo anterior mostrará:

int(4)
int(0)
int(0)
bool(false)

### Ver también

    - [Memcached::increment()](#memcached.increment) - Incrementa numéricamente un elemento

    - [Memcached::incrementByKey()](#memcached.incrementbykey) - Incrementa un valor numérico de un elemento almacenado en un servidor específico

    - [Memcached::decrementByKey()](#memcached.decrementbykey) - Disminuye un valor numérico de un elemento almacenado en un servidor específico

# Memcached::decrementByKey

(PECL memcached &gt;= 2.0.0)

Memcached::decrementByKey — Disminuye un valor numérico de un elemento almacenado en un servidor específico

### Descripción

public **Memcached::decrementByKey**(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**Memcached::decrementByKey()** disminuye un valor numérico
de un elemento especificando el decremento mediante el argumento offset.
Si el valor del elemento no es numérico, se generará un error.
Si la operación disminuye el valor por debajo de 0, el nuevo valor será 0.
**Memcached::decrementByKey()** establecerá el elemento al valor
del argumento initial_value si la clave no existe.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       La clave del elemento a disminuir.






     offset


       El decremento a aplicar al valor del elemento.






     initial_value


       El valor a establecer si el elemento no existe.






     expiry


       El tiempo de expiración para la definición del elemento.





### Valores devueltos

Devuelve el nuevo valor del elemento en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [Memcached::decrement()](#memcached.decrement) - Disminuye un valor numérico

    - [Memcached::increment()](#memcached.increment) - Incrementa numéricamente un elemento

    - [Memcached::incrementByKey()](#memcached.incrementbykey) - Incrementa un valor numérico de un elemento almacenado en un servidor específico

# Memcached::delete

(PECL memcached &gt;= 0.1.0)

Memcached::delete — Elimina un elemento

### Descripción

public **Memcached::delete**([string](#language.types.string) $key, [int](#language.types.integer) $time = 0): [bool](#language.types.boolean)

Elimina el elemento representado por la clave key del servidor.

### Parámetros

     key


       La clave a eliminar.






     time


       La duración de eliminación en el servidor.



      **Nota**:
       As of memcached 1.3.0 (released 2009) this feature is no longer
       supported. Passing a non-zero time will cause
       the deletion to fail. [Memcached::getResultCode()](#memcached.getresultcode)
       will return **[MEMCACHED_INVALID_ARGUMENTS](#constant.memcached-invalid-arguments)**.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) devuelve
**[Memcached::RES_NOTFOUND](#memcached.constants.res-notfound)** si la clave no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::delete()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;delete('key1');
?&gt;

### Ver también

    - [Memcached::deleteByKey()](#memcached.deletebykey) - Elimina un elemento de un servidor específico

    - [Memcached::deleteMulti()](#memcached.deletemulti) - Elimina varios elementos

# Memcached::deleteByKey

(PECL memcached &gt;= 0.1.0)

Memcached::deleteByKey — Elimina un elemento de un servidor específico

### Descripción

public **Memcached::deleteByKey**([string](#language.types.string) $server_key, [string](#language.types.string) $key, [int](#language.types.integer) $time = 0): [bool](#language.types.boolean)

**Memcached::deleteByKey()** es funcionalmente equivalente a
[Memcached::delete()](#memcached.delete), excepto por la variable libre
server_key que puede ser utilizada para dirigir la variable
key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       La clave a eliminar.






     time


       La duración de espera para la eliminación.



      **Nota**:
       As of memcached 1.3.0 (released 2009) this feature is no longer
       supported. Passing a non-zero time will cause
       the deletion to fail. [Memcached::getResultCode()](#memcached.getresultcode)
       will return **[MEMCACHED_INVALID_ARGUMENTS](#constant.memcached-invalid-arguments)**.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) devuelve
**[Memcached::RES_NOTFOUND](#memcached.constants.res-notfound)** si la clave no existe.

### Ver también

    - [Memcached::delete()](#memcached.delete) - Elimina un elemento

    - [Memcached::deleteMulti()](#memcached.deletemulti) - Elimina varios elementos

    - [Memcached::deleteMultiByKey()](#memcached.deletemultibykey) - Elimina varios elementos de un servidor específico

# Memcached::deleteMulti

(PECL memcached &gt;= 2.0.0)

Memcached::deleteMulti — Elimina varios elementos

### Descripción

public **Memcached::deleteMulti**([array](#language.types.array) $keys, [int](#language.types.integer) $time = 0): [array](#language.types.array)

Elimina el array de claves keys del servidor.

### Parámetros

     keys


       Las claves a eliminar.






     time


       El tiempo de espera del servidor para eliminar los elementos.



      **Nota**:
       As of memcached 1.3.0 (released 2009) this feature is no longer
       supported. Passing a non-zero time will cause
       the deletion to fail. [Memcached::getResultCode()](#memcached.getresultcode)
       will return **[MEMCACHED_INVALID_ARGUMENTS](#constant.memcached-invalid-arguments)**.






### Valores devueltos

Returns an array indexed by keys. Each element
is **[true](#constant.true)** if the corresponding key was deleted, or one of the
**[Memcached::RES\_\*](#memcached.constants.res-success)** constants if the corresponding deletion
failed.

The [Memcached::getResultCode()](#memcached.getresultcode) will return
the result code for the last executed delete operation, that is, the delete
operation for the last element of keys.

### Ver también

    - [Memcached::delete()](#memcached.delete) - Elimina un elemento

    - [Memcached::deleteByKey()](#memcached.deletebykey) - Elimina un elemento de un servidor específico

    - [Memcached::deleteMultiByKey()](#memcached.deletemultibykey) - Elimina varios elementos de un servidor específico

# Memcached::deleteMultiByKey

(PECL memcached &gt;= 2.0.0)

Memcached::deleteMultiByKey — Elimina varios elementos de un servidor específico

### Descripción

public **Memcached::deleteMultiByKey**([string](#language.types.string) $server_key, [array](#language.types.array) $keys, [int](#language.types.integer) $time = 0): [array](#language.types.array)

**Memcached::deleteMultiByKey()** es funcionalmente idéntica
al método [Memcached::deleteMulti()](#memcached.deletemulti), excepto que
el argumento server_key puede ser utilizado para asociar
las claves keys con un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     keys


       Las claves a eliminar.






     time


       El tiempo de espera del servidor antes de eliminar los elementos.



      **Nota**:
       As of memcached 1.3.0 (released 2009) this feature is no longer
       supported. Passing a non-zero time will cause
       the deletion to fail. [Memcached::getResultCode()](#memcached.getresultcode)
       will return **[MEMCACHED_INVALID_ARGUMENTS](#constant.memcached-invalid-arguments)**.






### Valores devueltos

Returns an array indexed by keys. Each element
is **[true](#constant.true)** if the corresponding key was deleted, or one of the
**[Memcached::RES\_\*](#memcached.constants.res-success)** constants if the corresponding deletion
failed.

The [Memcached::getResultCode()](#memcached.getresultcode) will return
the result code for the last executed delete operation, that is, the delete
operation for the last element of keys.

### Ver también

    - [Memcached::delete()](#memcached.delete) - Elimina un elemento

    - [Memcached::deleteByKey()](#memcached.deletebykey) - Elimina un elemento de un servidor específico

    - [Memcached::deleteMulti()](#memcached.deletemulti) - Elimina varios elementos

# Memcached::fetch

(PECL memcached &gt;= 0.1.0)

Memcached::fetch — Lee el siguiente resultado

### Descripción

public **Memcached::fetch**(): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::fetch()** lee el siguiente resultado de la última
petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el siguiente resultado, o bien **[false](#constant.false)** en caso contrario.
El método [Memcached::getResultCode()](#memcached.getresultcode) va devolver
**[Memcached::RES_END](#memcached.constants.res-end)** si el conjunto de resultados ha finalizado.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::fetch()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('int', 99);
$m-&gt;set('string', 'a simple string');
$m-&gt;set('array', array(11, 12));

$m-&gt;getDelayed(array('int', 'array'), true);
while ($result = $m-&gt;fetch()) {
    var_dump($result);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
["key"]=&gt;
string(3) "int"
["value"]=&gt;
int(99)
["cas"]=&gt;
float(2363)
}
array(3) {
["key"]=&gt;
string(5) "array"
["value"]=&gt;
array(2) {
[0]=&gt;
int(11)
[1]=&gt;
int(12)
}
["cas"]=&gt;
float(2365)
}

### Ver también

    - [Memcached::fetchAll()](#memcached.fetchall) - Lee todos los demás elementos

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

# Memcached::fetchAll

(PECL memcached &gt;= 0.1.0)

Memcached::fetchAll — Lee todos los demás elementos

### Descripción

public **Memcached::fetchAll**(): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::fetchAll()** lee todos los elementos de la
última petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los resultados o **[false](#constant.false)** si ocurre un error.
Utilice [Memcached::getResultCode()](#memcached.getresultcode) si es necesario.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::fetchAll()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('int', 99);
$m-&gt;set('string', 'a simple string');
$m-&gt;set('array', array(11, 12));

$m-&gt;getDelayed(array('int', 'array'), true);
var_dump($m-&gt;fetchAll());
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
array(3) {
["key"]=&gt;
string(3) "int"
["value"]=&gt;
int(99)
["cas"]=&gt;
float(2363)
}
[1]=&gt;
array(3) {
["key"]=&gt;
string(5) "array"
["value"]=&gt;
array(2) {
[0]=&gt;
int(11)
[1]=&gt;
int(12)
}
["cas"]=&gt;
float(2365)
}
}

### Ver también

    - [Memcached::fetch()](#memcached.fetch) - Lee el siguiente resultado

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

# Memcached::flush

(PECL memcached &gt;= 0.1.0)

Memcached::flush — Invalida todos los elementos del caché

### Descripción

public **Memcached::flush**([int](#language.types.integer) $delay = 0): [bool](#language.types.boolean)

**Memcached::flush()** invalida todos los elementos del caché,
inmediatamente (por omisión), o después de un retraso de delay
segundos. Tras una invalidación, ningún elemento será devuelto en respuesta
a una orden de lectura (a menos que se almacene nuevamente bajo la misma clave,
después de la operación de **Memcached::flush()**).
Esta operación no libera la memoria ocupada por los elementos
existentes: esto se realizará gradualmente, con el almacenamiento de los nuevos
elementos.

### Parámetros

     delay


       El número de segundos de espera antes de la invalidación.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::flush()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

/_ invalida todos los elementos en 10 segundos _/
$m-&gt;flush(10);
?&gt;

# Memcached::get

(PECL memcached &gt;= 0.1.0)

Memcached::get — Lee un elemento

### Descripción

public **Memcached::get**([string](#language.types.string) $key, [?](#language.types.null)[callable](#language.types.callable) $cache_cb = **[null](#constant.null)**, [int](#language.types.integer) $get_flags = 0): [mixed](#language.types.mixed)

**Memcached::get()** lee un elemento que ha sido almacenado previamente
con la clave key. Si el elemento es encontrado, y que
get_flags es proporcionado **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)**,
el valor del token CAS del elemento también será retornado.
Ver [Memcached::cas()](#memcached.cas) para saber cómo utilizar los
tokens CAS. Una [función de retrollamada en caso de ausencia](#memcached.callbacks) puede ser
especificada con el parámetro cache_cb.

### Parámetros

     key


       La clave del elemento a leer.






     cache_cb


       Una función de retrollamada en caso de ausencia o **[null](#constant.null)**.






     get_flags


       Bandera para controlar el resultado retornado.
       Cuando **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)**
       es proporcionada, la función retornará también el token CAS.





### Valores devueltos

Retorna el valor almacenado en la caché, o bien **[false](#constant.false)** en caso contrario.
Si get_flags es definido a
**[Memcached::GET_EXTENDED](#memcached.constants.get-extended)**, un [array](#language.types.array) conteniendo
el valor y el token CAS es retornado en lugar de solo el valor.
El método [Memcached::getResultCode()](#memcached.getresultcode) retorna
**[Memcached::RES_NOTFOUND](#memcached.constants.res-notfound)** si la clave no existe.

### Historial de cambios

      Versión
      Descripción






      PECL memcached 3.0.0

       El parámetro &amp;cas_tokens ha sido eliminado.
       **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)** ha sido añadida y cuando es pasada
       como bandera asegura que los tokens CAS sean recuperados.



### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::get()** 1

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('foo', 100);
var_dump($m-&gt;get('foo'));
?&gt;

    El ejemplo anterior mostrará:

int(100)

    **Ejemplo #2 Ejemplo con Memcached::get()** 2

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

if (!($ip = $m-&gt;get('ip_block'))) {
    if ($m-&gt;getResultCode() == Memcached::RES_NOTFOUND) {
$ip = array();
$m-&gt;set('ip_block', $ip);
} else {
/_ log error _/
/_ ... _/
}
}
?&gt;

### Ver también

    - [Memcached::getByKey()](#memcached.getbykey) - Lee un elemento en un servidor específico

    - [Memcached::getMulti()](#memcached.getmulti) - Lee varios elementos

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

# Memcached::getAllKeys

(PECL memcached &gt;= 2.0.0)

Memcached::getAllKeys — Recupera todas las claves almacenadas en todos los servidores

### Descripción

public **Memcached::getAllKeys**(): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::getAllKeys()** consulta cada servidor memcache
y recupera un array que contiene todas las claves almacenadas en cada uno de ellos.
No se trata de una operación atómica, por lo que no proporciona una imagen
realmente consistente de las claves en el instante dado. Dado que memcache
no garantiza devolver todas las claves, no puede asegurarse de que todas las claves
hayan sido devueltas.

**Nota**:

    Este método está destinado a fines de depuración y no debe utilizarse a gran escala.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las claves almacenadas en todos los servidores en caso
de éxito o **[false](#constant.false)** si ocurre un error.

# Memcached::getByKey

(PECL memcached &gt;= 0.1.0)

Memcached::getByKey — Lee un elemento en un servidor específico

### Descripción

public **Memcached::getByKey**(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [?](#language.types.null)[callable](#language.types.callable) $cache_cb = **[null](#constant.null)**,
    [int](#language.types.integer) $get_flags = 0
): [mixed](#language.types.mixed)

**Memcached::getByKey()** es funcionalmente equivalente a
[Memcached::get()](#memcached.get), excepto que la variable libre
server_key puede ser utilizada para dirigir la clave
key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       La clave del elemento a leer.






     cache_cb


       Función de retrollamada en caso de ausencia, o **[null](#constant.null)**






     get_flags


       Bandera para controlar el resultado devuelto.
       Cuando **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)**
       es proporcionada, la función devolverá también el token CAS.





### Valores devueltos

Devuelve el valor almacenado en la caché, o **[false](#constant.false)** en caso contrario.
El método [Memcached::getResultCode()](#memcached.getresultcode) devuelve
**[Memcached::RES_NOTFOUND](#memcached.constants.res-notfound)** si la clave no existe.

### Historial de cambios

      Versión
      Descripción






      PECL memcached 3.0.0

       El parámetro &amp;cas_tokens ha sido eliminado.
       **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)** ha sido añadida y cuando se pasa
       como bandera asegura que los tokens CAS sean recuperados.



### Ver también

    - [Memcached::get()](#memcached.get) - Lee un elemento

    - [Memcached::getMulti()](#memcached.getmulti) - Lee varios elementos

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

# Memcached::getDelayed

(PECL memcached &gt;= 0.1.0)

Memcached::getDelayed — Lee varios elementos

### Descripción

public **Memcached::getDelayed**([array](#language.types.array) $keys, [bool](#language.types.boolean) $with_cas = **[false](#constant.false)**, [?](#language.types.null)[callable](#language.types.callable) $value_cb = **[null](#constant.null)**): [bool](#language.types.boolean)

**Memcached::getDelayed()** envía una orden a memcache para
leer varias claves que se especifican en el array keys.
El método no espera la respuesta y devuelve inmediatamente. Cuando se esté
listo para leer los elementos, se llaman los métodos [Memcached::fetch()](#memcached.fetch) o
[Memcached::fetchAll()](#memcached.fetchall). Si with_cas
es **[true](#constant.true)** también se leerá el CAS.

En lugar de leer los resultados explícitamente, se puede especificar una
[función de devolución de llamada de resultados](#memcached.callbacks) mediante
el argumento value_cb.

### Parámetros

     keys


       Un array de claves a leer.






     with_cas


       Si se deben leer los CAS.






     value_cb


       Una función de devolución de llamada de resultados, o **[null](#constant.null)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::getDelayed()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('int', 99);
$m-&gt;set('string', 'a simple string');
$m-&gt;set('array', array(11, 12));

$m-&gt;getDelayed(array('int', 'array'), true);
var_dump($m-&gt;fetchAll());
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
array(3) {
["key"]=&gt;
string(3) "int"
["value"]=&gt;
int(99)
["cas"]=&gt;
float(2363)
}
[1]=&gt;
array(3) {
["key"]=&gt;
string(5) "array"
["value"]=&gt;
array(2) {
[0]=&gt;
int(11)
[1]=&gt;
int(12)
}
["cas"]=&gt;
float(2365)
}
}

### Ver también

    - [Memcached::getDelayedByKey()](#memcached.getdelayedbykey) - Lee varios elementos en un servidor

    - [Memcached::fetch()](#memcached.fetch) - Lee el siguiente resultado

    - [Memcached::fetchAll()](#memcached.fetchall) - Lee todos los demás elementos

# Memcached::getDelayedByKey

(PECL memcached &gt;= 0.1.0)

Memcached::getDelayedByKey — Lee varios elementos en un servidor

### Descripción

public **Memcached::getDelayedByKey**(
    [string](#language.types.string) $server_key,
    [array](#language.types.array) $keys,
    [bool](#language.types.boolean) $with_cas = **[false](#constant.false)**,
    [?](#language.types.null)[callable](#language.types.callable) $value_cb = **[null](#constant.null)**
): [bool](#language.types.boolean)

**Memcached::getDelayedByKey()** es funcionalmente equivalente
a [Memcached::getDelayed()](#memcached.getdelayed), pero la variable libre
server_key puede ser utilizada para dirigir
la clave key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     keys


       Un array de claves a leer.






     with_cas


       Si también se deben leer los CAS.






     value_cb


       Una función de retrollamada de resultados, o **[null](#constant.null)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ver también

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

    - [Memcached::fetch()](#memcached.fetch) - Lee el siguiente resultado

    - [Memcached::fetchAll()](#memcached.fetchall) - Lee todos los demás elementos

# Memcached::getMulti

(PECL memcached &gt;= 0.1.0)

Memcached::getMulti — Lee varios elementos

### Descripción

public **Memcached::getMulti**([array](#language.types.array) $keys, [int](#language.types.integer) $get_flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::getMulti()** es similar al método
[Memcached::get()](#memcached.get), pero en lugar de un solo elemento,
puede leer varios elementos especificados por el array
keys.

**Nota**:

     Antes de la v3.0, un segundo argumento
     &amp;cas_tokens era utilizado.
     Era rellenado con los valores de los tokens CAS para los elementos encontrados.
     El parámetro &amp;cas_tokens fue eliminado
     en la v3.0 de la extensión.
     Fue reemplazado por un nuevo flag **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)**
     que debe ser utilizado como valor para get_flags.

El parámetro get_flags sirve para especificar opciones
adicionales para **Memcached::getMulti()**.
**[Memcached::GET_PRESERVE_ORDER](#memcached.constants.get-preserve-order)** garantiza que las
claves son devueltas en el mismo orden que el de su solicitud.
**[Memcached::GET_EXTENDED](#memcached.constants.get-extended)** garantiza que los
tokens CAS serán también recuperados.

### Parámetros

     keys


       Un array de claves a leer.






     get_flags


       Las opciones para esta operación.





### Valores devueltos

Devuelve un array de elementos leídos o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Historial de cambios

      Versión
      Descripción






      PECL memcached 3.0.0

       El parámetro &amp;cas_tokens fue eliminado.
       **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)** fue añadido y cuando se pasa
       como flag asegura que los tokens CAS son recuperados.



### Ejemplos

    **Ejemplo #1 Ejemplo de Memcached::getMulti()** para Memcached v3

&lt;?php
// Válido para la v3 de la extensión

$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$items = array(
    'key1' =&gt; 'value1',
    'key2' =&gt; 'value2',
    'key3' =&gt; 'value3'
);
$m-&gt;setMulti($items);
$result = $m-&gt;getMulti(array('key1', 'key3', 'badkey'));
var_dump($result);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(2) {
["key1"]=&gt;
string(6) "value1"
["key3"]=&gt;
string(6) "value3"
}

    **Ejemplo #2 Ejemplo de Memcached::getMulti()** para Memcached v1 y v2

&lt;?php
// Válido para la v1 y v2 de la extensión

$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$items = array(
    'key1' =&gt; 'value1',
    'key2' =&gt; 'value2',
    'key3' =&gt; 'value3'
);
$m-&gt;setMulti($items);
$result = $m-&gt;getMulti(array('key1', 'key3', 'badkey'), $cas);
var_dump($result, $cas);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(2) {
["key1"]=&gt;
string(6) "value1"
["key3"]=&gt;
string(6) "value3"
}
array(2) {
["key1"]=&gt;
float(2360)
["key3"]=&gt;
float(2362)
}

    **Ejemplo #3 Ejemplo de [Memcached::GET_PRESERVE_ORDER](#memcached.constants.get-preserve-order)** para Memcached v3

&lt;?php
// Válido para la v3 de la extensión

$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$data = array(
'foo' =&gt; 'foo-data',
'bar' =&gt; 'bar-data',
'baz' =&gt; 'baz-data',
'lol' =&gt; 'lol-data',
'kek' =&gt; 'kek-data',
);

$m-&gt;setMulti($data, 3600);

$keys = array_keys($data);
$keys[] = 'zoo';
$got = $m-&gt;getMulti($keys, Memcached::GET_PRESERVE_ORDER);

foreach ($got as $k =&gt; $v) {
    echo "$k $v\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

foo foo-data
bar bar-data
baz baz-data
lol lol-data
kek kek-data
zoo

    **Ejemplo #4 Ejemplo de [Memcached::GET_PRESERVE_ORDER](#memcached.constants.get-preserve-order)** para Memcached v1 y v2

&lt;?php
// Válido para la v1 y v2 de la extensión

$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$data = array(
'foo' =&gt; 'foo-data',
'bar' =&gt; 'bar-data',
'baz' =&gt; 'baz-data',
'lol' =&gt; 'lol-data',
'kek' =&gt; 'kek-data',
);

$m-&gt;setMulti($data, 3600);

$null = null;
$keys = array_keys($data);
$keys[] = 'zoo';
$got = $m-&gt;getMulti($keys, $null, Memcached::GET_PRESERVE_ORDER);

foreach ($got as $k =&gt; $v) {
    echo "$k $v\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

foo foo-data
bar bar-data
baz baz-data
lol lol-data
kek kek-data
zoo

### Ver también

    - [Memcached::getMultiByKey()](#memcached.getmultibykey) - Lee varios elementos de un servidor específico

    - [Memcached::get()](#memcached.get) - Lee un elemento

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

# Memcached::getMultiByKey

(PECL memcached &gt;= 0.1.0)

Memcached::getMultiByKey — Lee varios elementos de un servidor específico

### Descripción

public **Memcached::getMultiByKey**([string](#language.types.string) $server_key, [array](#language.types.array) $keys, [int](#language.types.integer) $get_flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::getMultiByKey()** es funcionalmente equivalente
a [Memcached::getMulti()](#memcached.getmulti), pero la variable libre
server_key puede ser utilizada para dirigir
la clave key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     keys


       Un array de claves a leer.






     get_flags


       Las opciones de la operación.






### Valores devueltos

Devuelve el array de elementos encontrados o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Historial de cambios

      Versión
      Descripción






      PECL memcached 3.0.0

       El parámetro &amp;cas_tokens ha sido eliminado.
       **[Memcached::GET_EXTENDED](#memcached.constants.get-extended)** ha sido añadida y cuando se pasa
       como flag asegura que los tokens CAS sean recuperados.



### Ver también

    - [Memcached::getMulti()](#memcached.getmulti) - Lee varios elementos

    - [Memcached::get()](#memcached.get) - Lee un elemento

    - [Memcached::getDelayed()](#memcached.getdelayed) - Lee varios elementos

# Memcached::getOption

(PECL memcached &gt;= 0.1.0)

Memcached::getOption — Lee una opción Memcached

### Descripción

public **Memcached::getOption**([int](#language.types.integer) $option): [mixed](#language.types.mixed)

Devuelve el valor de la opción Memcached
option. Estas opciones están definidas por
libmemcached, y otras son específicas de esta extensión.
Véase [constantes Memcached](#memcached.constants)
para más información.

### Parámetros

     option


       Una de las constantes Memcached::OPT_*.





### Valores devueltos

Devuelve el valor de la opción solicitada, o
bien **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Lectura de opciones Memcached**

&lt;?php
$m = new Memcached();
var_dump($m-&gt;getOption(Memcached::OPT_COMPRESSION));
var_dump($m-&gt;getOption(Memcached::OPT_POLL_TIMEOUT));
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
int(1000)

### Ver también

    - **Memcached::getOption()**

    - [Memcached::setOption()](#memcached.setoption) - Configura una opción Memcached

    - [Constantes Memcached](#memcached.constants)

# Memcached::getResultCode

(PECL memcached &gt;= 0.1.0)

Memcached::getResultCode — Devuelve el código de resultado de la última operación

### Descripción

public **Memcached::getResultCode**(): [int](#language.types.integer)

**Memcached::getResultCode()** devuelve una de las constantes
**[Memcached::RES\_\*](#memcached.constants.res-success)** que indica el estado del resultado
de la última operación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El código de resultado de la última operación Memcached.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::getResultCode()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;add('foo', 'bar');
if ($m-&gt;getResultCode() == Memcached::RES_NOTSTORED) {
/_ ... _/
}
?&gt;

# Memcached::getResultMessage

(PECL memcached &gt;= 1.0.0)

Memcached::getResultMessage — Devuelve un mensaje que describe el resultado de la última operación

### Descripción

public **Memcached::getResultMessage**(): [string](#language.types.string)

**Memcached::getResultMessage()** devuelve un string que
describe el código de resultado de la última operación Memcached ejecutada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Mensaje que describe el resultado de la última operación Memcached.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::getResultMessage()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;add('foo', 'bar'); // Éxito la primera vez
$m-&gt;add('foo', 'bar');
echo $m-&gt;getResultMessage(),"\n";
?&gt;

    El ejemplo anterior mostrará:

NOT STORED

# Memcached::getServerByKey

(PECL memcached &gt;= 0.1.0)

Memcached::getServerByKey — Dirige una clave a un servidor

### Descripción

public **Memcached::getServerByKey**([string](#language.types.string) $server_key): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::getServerByKey()** devuelve el servidor que debería
ser seleccionado por una clave server_key en las
operaciones de tipo **Memcached::\*ByKey()**.

### Parámetros

     server_key


       La clave de identificación del servidor.





### Valores devueltos

Devuelve un array que contiene 3 claves: host,
port, y weight en caso de éxito
o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::getServerByKey()**

&lt;?php
$m = new Memcached();
$m-&gt;addServers(array(
array('mem1.domain.com', 11211, 40),
array('mem2.domain.com', 11211, 40),
array('mem3.domain.com', 11211, 20),
));

$m-&gt;setOption(Memcached::OPT_LIBKETAMA_COMPATIBLE, true);

var_dump($m-&gt;getServerByKey('user'));
var_dump($m-&gt;getServerByKey('log'));
var_dump($m-&gt;getServerByKey('ip'));
?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
["host"]=&gt;
string(15) "mem3.domain.com"
["port"]=&gt;
int(11211)
["weight"]=&gt;
int(20)
}
array(3) {
["host"]=&gt;
string(15) "mem2.domain.com"
["port"]=&gt;
int(11211)
["weight"]=&gt;
int(40)
}
array(3) {
["host"]=&gt;
string(15) "mem2.domain.com"
["port"]=&gt;
int(11211)
["weight"]=&gt;
int(40)
}

# Memcached::getServerList

(PECL memcached &gt;= 0.1.0)

Memcached::getServerList — Lista los servidores del pool memcached

### Descripción

public **Memcached::getServerList**(): [array](#language.types.array)

**Memcached::getServerList()** devuelve la lista de todos los servidores
que están en su lista.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La lista de todos los servidores del pool.

### Ejemplos

    **Ejemplo #1 Ejemplo con [Memcached::getResultCode()](#memcached.getresultcode)**

&lt;?php
$m = new Memcached();
$m-&gt;addServers(array(
array('mem1.domain.com', 11211, 20),
array('mem2.domain.com', 11311, 80),
));
var_dump($m-&gt;getServerList());
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
array(3) {
["host"]=&gt;
string(15) "mem1.domain.com"
["port"]=&gt;
int(11211)
["weight"]=&gt;
int(20)
}
[1]=&gt;
array(3) {
["host"]=&gt;
string(15) "mem2.domain.com"
["port"]=&gt;
int(11311)
["weight"]=&gt;
int(80)
}
}

# Memcached::getStats

(PECL memcached &gt;= 0.1.0)

Memcached::getStats — Lee estadísticas del grupo de servidores

### Descripción

public **Memcached::getStats**([?](#language.types.null)[string](#language.types.string) $type = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::getStats()** devuelve un array que contiene
el estado de todas las máquinas en funcionamiento. Consúltese el
[» protocolo memcached](https://github.com/memcached/memcached/blob/master/doc/protocol.txt) para
más detalles sobre estas estadísticas.

### Parámetros

     type


       El tipo de estadísticas a recuperar.





### Valores devueltos

Un array de estadísticas de servidores, una entrada por servidor, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::getStats()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

print_r($m-&gt;getStats());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[localhost:11211] =&gt; Array
(
[pid] =&gt; 4933
[uptime] =&gt; 786123
[threads] =&gt; 1
[time] =&gt; 1233868010
[pointer_size] =&gt; 32
[rusage_user_seconds] =&gt; 0
[rusage_user_microseconds] =&gt; 140000
[rusage_system_seconds] =&gt; 23
[rusage_system_microseconds] =&gt; 210000
[curr_items] =&gt; 145
[total_items] =&gt; 2374
[limit_maxbytes] =&gt; 67108864
[curr_connections] =&gt; 2
[total_connections] =&gt; 151
[connection_structures] =&gt; 3
[bytes] =&gt; 20345
[cmd_get] =&gt; 213343
[cmd_set] =&gt; 2381
[get_hits] =&gt; 204223
[get_misses] =&gt; 9120
[evictions] =&gt; 0
[bytes_read] =&gt; 9092476
[bytes_written] =&gt; 15420512
[version] =&gt; 1.2.6
)

)

# Memcached::getVersion

(PECL memcached &gt;= 0.1.5)

Memcached::getVersion — Lee las informaciones de versión del pool de servidores

### Descripción

public **Memcached::getVersion**(): [array](#language.types.array)|[false](#language.types.singleton)

**Memcached::getVersion()** devuelve un array que contiene
las informaciones de versión disponibles de todos los servidores memcache.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Array de versiones de servidores, una por servidor.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::getVersion()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

print_r($m-&gt;getVersion());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[localhost:11211] =&gt; 1.2.6
)

# Memcached::increment

(PECL memcached &gt;= 0.1.0)

Memcached::increment — Incrementa numéricamente un elemento

### Descripción

public **Memcached::increment**(
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**Memcached::increment()** incrementa el valor numérico
de offset unidades. Si el elemento no es numérico,
se generará un error. **Memcached::increment()** establecerá
el elemento al valor del argumento initial_value si la
clave no existe.

### Parámetros

     key


       La clave del elemento a incrementar.






     offset


       La cantidad con la que aumentar el elemento.






     initial_value


       El valor a utilizar para definir el elemento si no existe.






     expiry


       El tiempo de expiración para definir el elemento.





### Valores devueltos

Devuelve el nuevo valor del elemento, en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con [Memcached::getResultCode()](#memcached.getresultcode)**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('counter', 0);
$m-&gt;increment('counter');
$n = $m-&gt;increment('counter', 10);
var_dump($n);

$m-&gt;set('counter', 'abc');
$n = $m-&gt;increment('counter');
// ^ fallará debido a que el valor del elemento no es numérico
var_dump($n);
?&gt;

    El ejemplo anterior mostrará:

int(11)
bool(false)

### Ver también

    - [Memcached::decrement()](#memcached.decrement) - Disminuye un valor numérico

    - [Memcached::decrementByKey()](#memcached.decrementbykey) - Disminuye un valor numérico de un elemento almacenado en un servidor específico

    - [Memcached::incrementByKey()](#memcached.incrementbykey) - Incrementa un valor numérico de un elemento almacenado en un servidor específico

# Memcached::incrementByKey

(PECL memcached &gt;= 2.0.0)

Memcached::incrementByKey — Incrementa un valor numérico de un elemento almacenado en un servidor específico

### Descripción

public **Memcached::incrementByKey**(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [int](#language.types.integer) $offset = 1,
    [int](#language.types.integer) $initial_value = 0,
    [int](#language.types.integer) $expiry = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**Memcached::incrementByKey()** incrementa un valor numérico
de un elemento especificando el incremento mediante el argumento offset.
Si el valor del elemento no es numérico, se emitirá un error.
**Memcached::incrementByKey()** establecerá el elemento al valor
del argumento initial_value si la clave no existe.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       La clave del elemento a incrementar.






     offset


       El incremento a utilizar sobre el valor del elemento.






     initial_value


       El valor a establecer si el elemento no existe.






     expiry


       El tiempo de expiración para la definición del elemento.





### Valores devueltos

Devuelve el nuevo valor del elemento en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [Memcached::decrement()](#memcached.decrement) - Disminuye un valor numérico

    - [Memcached::decrementByKey()](#memcached.decrementbykey) - Disminuye un valor numérico de un elemento almacenado en un servidor específico

    - [Memcached::increment()](#memcached.increment) - Incrementa numéricamente un elemento

# Memcached::isPersistent

(PECL memcached &gt;= 2.0.0)

Memcached::isPersistent — Verifica si una conexión persistente hacia memcache está en uso

### Descripción

public **Memcached::isPersistent**(): [bool](#language.types.boolean)

**Memcached::isPersistent()** verifica si las conexiones
a los servidores memcache son conexiones persistentes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la instancia Memcache utiliza una conexión persistente,
**[false](#constant.false)** en caso contrario.

### Ver también

    - [Memcached::isPristine()](#memcached.ispristine) - Verifica si la instancia ha sido creada recientemente

# Memcached::isPristine

(PECL memcached &gt;= 2.0.0)

Memcached::isPristine — Verifica si la instancia ha sido creada recientemente

### Descripción

public **Memcached::isPristine**(): [bool](#language.types.boolean)

**Memcached::isPristine()** verifica si la instancia Memcache
ha sido creada recientemente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la instancia ha sido creada recientemente, **[false](#constant.false)** en caso contrario.

### Ver también

    - [Memcached::isPersistent()](#memcached.ispersistent) - Verifica si una conexión persistente hacia memcache está en uso

# Memcached::prepend

(PECL memcached &gt;= 0.1.0)

Memcached::prepend — Prefijo de datos a un elemento existente

### Descripción

public **Memcached::prepend**([string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)

**Memcached::prepend()** añade los datos de
value al principio de un elemento existente. La razón por la que
value debe ser un string es que los otros tipos no soportan esta operación.

**Nota**:

    Si la constante **[Memcached::OPT_COMPRESSION](#memcached.constants.opt-compression)** está activada,
    la operación fallará y se emitirá una advertencia, ya que no es posible prependear datos comprimidos.

### Parámetros

     key


       La clave del elemento a prependear.






     value


       El string a prependear.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Devuelve **[null](#constant.null)** si la compresión está activada.

### Errores/Excepciones

Devuelve **[null](#constant.null)** y genera un **[E_WARNING](#constant.e-warning)**
si la compresión está activada.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::prepend()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);
$m-&gt;setOption(Memcached::OPT_COMPRESSION, false);

$m-&gt;set('foo', 'abc');
$m-&gt;prepend('foo', 'def');
var_dump($m-&gt;get('foo'));
?&gt;

    El ejemplo anterior mostrará:

string(6) "defabc"

### Ver también

    - [Memcached::prependByKey()](#memcached.prependbykey) - Prefija un elemento existente

    - [Memcached::append()](#memcached.append) - Añade datos a un elemento

# Memcached::prependByKey

(PECL memcached &gt;= 0.1.0)

Memcached::prependByKey — Prefija un elemento existente

### Descripción

public **Memcached::prependByKey**([string](#language.types.string) $server_key, [string](#language.types.string) $key, [string](#language.types.string) $value): [?](#language.types.null)[bool](#language.types.boolean)

**Memcached::prependByKey()** es funcionalmente equivalente
a [Memcached::prepend()](#memcached.prepend), pero la variable libre
server_key puede ser utilizada para dirigir
la clave key a un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       La clave del elemento a prefijar.






     value


       La cadena a prefijar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Devuelve **[null](#constant.null)** si la compresión está activada.

### Errores/Excepciones

Devuelve **[null](#constant.null)** y lanza un **[E_WARNING](#constant.e-warning)**
si la compresión está activada.

### Ver también

    - [Memcached::prepend()](#memcached.prepend) - Prefijo de datos a un elemento existente

    - [Memcached::append()](#memcached.append) - Añade datos a un elemento

# Memcached::quit

(PECL memcached &gt;= 2.0.0)

Memcached::quit — Cierra todas las conexiones abiertas

### Descripción

public **Memcached::quit**(): [bool](#language.types.boolean)

**Memcached::quit()** cierra todas las conexiones
abiertas con los servidores memcache.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Memcached::replace

(PECL memcached &gt;= 0.1.0)

Memcached::replace — Remplaza un elemento bajo una clave

### Descripción

public **Memcached::replace**([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::replace()** es similar a
[Memcached::set()](#memcached.set), pero la operación fallará
si la clave key no existe en el servidor.

### Parámetros

     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) devuelve
**[Memcached::RES_NOTFOUND](#memcached.constants.res-notfound)** si la clave no existe.

### Ver también

    - [Memcached::replaceByKey()](#memcached.replacebykey) - Remplaza un elemento específico en un servidor designado

    - [Memcached::set()](#memcached.set) - Almacena un elemento

    - [Memcached::add()](#memcached.add) - Añade un nuevo elemento bajo una nueva clave

# Memcached::replaceByKey

(PECL memcached &gt;= 0.1.0)

Memcached::replaceByKey — Remplaza un elemento específico en un servidor designado

### Descripción

public **Memcached::replaceByKey**(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)

**Memcached::replaceByKey()** es funcionalmente equivalente
a la función [Memcached::replace()](#memcached.replace), con la excepción de que
la variable libre server_key puede ser utilizada para dirigir la
clave key hacia un servidor específico. Esto es útil si se desea
mantener un grupo de variables agrupadas en un servidor.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
El método [Memcached::getResultCode()](#memcached.getresultcode) va devolver
**[Memcached::RES_NOTSTORED](#memcached.constants.res-notstored)** si la clave no existe.

### Ver también

    - [Memcached::replace()](#memcached.replace) - Remplaza un elemento bajo una clave

    - [Memcached::set()](#memcached.set) - Almacena un elemento

    - [Memcached::add()](#memcached.add) - Añade un nuevo elemento bajo una nueva clave

# Memcached::resetServerList

(PECL memcached &gt;= 2.0.0)

Memcached::resetServerList — Elimina todos los servidores de la lista de servidores

### Descripción

public **Memcached::resetServerList**(): [bool](#language.types.boolean)

**Memcached::resetserverlist()** elimina todos los servidores
de la lista de servidores conocidos, dejándola vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [Memcached::addServer()](#memcached.addserver) - Añade un servidor al grupo

    - [Memcached::addServers()](#memcached.addservers) - Añade múltiples servidores al grupo

# Memcached::set

(PECL memcached &gt;= 0.1.0)

Memcached::set — Almacena un elemento

### Descripción

public **Memcached::set**([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::set()** almacena el valor value
en un servidor memcache, con la clave de identificación key.
El argumento expiration permite controlar el tiempo de expiración
automática del valor.

El valor puede ser cualquier tipo de valor PHP, excepto una recurso, ya que estas
no pueden ser representadas en forma lineal. Si la opción
**[Memcached::OPT_COMPRESSION](#memcached.constants.opt-compression)** está activada, el valor serializado será
también comprimido antes del almacenamiento.

### Parámetros

     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::set()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$m-&gt;set('int', 99);
$m-&gt;set('string', 'a simple string');
$m-&gt;set('array', array(11, 12));
/* El 'object' será destruido en 5 minutos */
$m-&gt;set('object', new stdClass, time() + 300);

var_dump($m-&gt;get('int'));
var_dump($m-&gt;get('string'));
var_dump($m-&gt;get('array'));
var_dump($m-&gt;get('object'));
?&gt;

    Resultado del ejemplo anterior es similar a:

int(99)
string(15) "a simple string"
array(2) {
[0]=&gt;
int(11)
[1]=&gt;
int(12)
}
object(stdClass)#1 (0) {
}

### Ver también

    - [Memcached::setByKey()](#memcached.setbykey) - Almacena un elemento en un servidor específico

    - [Memcached::add()](#memcached.add) - Añade un nuevo elemento bajo una nueva clave

    - [Memcached::replace()](#memcached.replace) - Remplaza un elemento bajo una clave

# Memcached::setByKey

(PECL memcached &gt;= 0.1.0)

Memcached::setByKey — Almacena un elemento en un servidor específico

### Descripción

public **Memcached::setByKey**(
    [string](#language.types.string) $server_key,
    [string](#language.types.string) $key,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $expiration = 0
): [bool](#language.types.boolean)

**Memcached::setByKey()** es funcionalmente equivalente a
[Memcached::set()](#memcached.set), excepto que la variable libre
server_key puede ser utilizada para enviar la clave
key a un servidor específico. Esto es útil si se desea
agrupar ciertas claves en un servidor.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       The key under which to store the value.






     value


       The value to store.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::setByKey()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

/_ Conserva los bloques de IP en un servidor _/
$m-&gt;setByKey('api-cache', 'block-ip:169.254.253.252', 1);
$m-&gt;setByKey('api-cache', 'block-ip:169.127.127.202', 1);
?&gt;

### Ver también

    - [Memcached::set()](#memcached.set) - Almacena un elemento

# Memcached::setEncodingKey

(PECL memcached &gt;= 3.1.0)

Memcached::setEncodingKey — Establece la clave de cifrado AES para los datos en Memcached

### Descripción

public **Memcached::setEncodingKey**([string](#language.types.string) $key): [bool](#language.types.boolean)

Este método establece la clave de cifrado/descifrado AES para los datos escritos y leídos desde Memcached.

### Parámetros

    key


      La clave AES.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Memcached::get()](#memcached.get) - Lee un elemento

- [Memcached::add()](#memcached.add) - Añade un nuevo elemento bajo una nueva clave

- [Memcached::set()](#memcached.set) - Almacena un elemento

# Memcached::setMulti

(PECL memcached &gt;= 0.1.0)

Memcached::setMulti — Almacena varios elementos

### Descripción

public **Memcached::setMulti**([array](#language.types.array) $items, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::setMulti()** es similar a
[Memcached::set()](#memcached.set), y en lugar de almacenar un solo par
clave / valor, opera sobre varios elementos mediante
items. El tiempo de expiración expiration
se aplica a todos los elementos en su conjunto.

### Parámetros

     items


       An array of key/value pairs to store on the server.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ejemplos

    **Ejemplo #1 Ejemplo con Memcached::setMulti()**

&lt;?php
$m = new Memcached();
$m-&gt;addServer('localhost', 11211);

$items = array(
    'key1' =&gt; 'value1',
    'key2' =&gt; 'value2',
    'key3' =&gt; 'value3'
);
$m-&gt;setMulti($items, time() + 300);
?&gt;

### Ver también

    - [Memcached::setMultiByKey()](#memcached.setmultibykey) - Almacena varios elementos en un servidor

    - [Memcached::set()](#memcached.set) - Almacena un elemento

# Memcached::setMultiByKey

(PECL memcached &gt;= 0.1.0)

Memcached::setMultiByKey — Almacena varios elementos en un servidor

### Descripción

public **Memcached::setMultiByKey**([string](#language.types.string) $server_key, [array](#language.types.array) $items, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::setMultiByKey()** es el equivalente funcional
de [Memcached::setMulti()](#memcached.setmulti), con la excepción de que
el argumento libre server_key puede ser utilizado para
dirigir las claves de items hacia un servidor específico.
Esto es útil si se desea mantener ciertas claves agrupadas en un solo servidor.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     items


       An array of key/value pairs to store on the server.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ver también

    - [Memcached::setMulti()](#memcached.setmulti) - Almacena varios elementos

    - [Memcached::set()](#memcached.set) - Almacena un elemento

# Memcached::setOption

(PECL memcached &gt;= 0.1.0)

Memcached::setOption — Configura una opción Memcached

### Descripción

public **Memcached::setOption**([int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

**Memcached::setOption()** configura un valor de la opción Memcached
option con el valor value.
Algunas opciones corresponden a las definidas en libmemcached, y otras
son específicas de la extensión.

### Parámetros

     option


       Una de las constantes **[Memcached::OPT_*](#memcached.constants.opt-compression)**.
       Ver [Memcached Constants](#memcached.constants) para más información.






     value


       El valor a definir.



      **Nota**:



        Las opciones a continuación requieren que los valores sean especificados mediante constantes.



         -
          **[Memcached::OPT_HASH](#memcached.constants.opt-hash)** requiere valores
          **[Memcached::HASH_*](#memcached.constants.hash-default)**.


         -
          **[Memcached::OPT_DISTRIBUTION](#memcached.constants.opt-distribution)** requiere valores
          **[Memcached::DISTRIBUTION_*](#memcached.constants.distribution-modula)**.


         -
          **[Memcached::OPT_SERIALIZER](#memcached.constants.opt-serializer)** requiere valores
          **[Memcached::SERIALIZER_*](#memcached.constants.serializer-php)**.


         -
          **[Memcached::OPT_COMPRESSION_TYPE](#memcached.constants.opt-compression-type)** requiere valores
          **[Memcached::COMPRESSION_*](#memcached.constants.compression-fastlz)**.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Configuración de una opción Memcached**

&lt;?php
$m = new Memcached();
var_dump($m-&gt;getOption(Memcached::OPT_HASH) == Memcached::HASH_DEFAULT);
$m-&gt;setOption(Memcached::OPT_HASH, Memcached::HASH_MURMUR);
$m-&gt;setOption(Memcached::OPT_PREFIX_KEY, "widgets");
echo "El prefijo de la clave es ahora: ", $m-&gt;getOption(Memcached::OPT_PREFIX_KEY), "\n";
?&gt;

    El ejemplo anterior mostrará:

bool(true)
El prefijo de la clave es ahora: widgets

### Ver también

    - [Memcached::getOption()](#memcached.getoption) - Lee una opción Memcached

    - [Memcached::setOptions()](#memcached.setoptions) - Define opciones Memcache

    - [Las constantes Memcached](#memcached.constants)

# Memcached::setOptions

(PECL memcached &gt;= 2.0.0)

Memcached::setOptions — Define opciones Memcache

### Descripción

public **Memcached::setOptions**([array](#language.types.array) $options): [bool](#language.types.boolean)

**Memcached::setOptions()** es una variante del método
[Memcached::setOption()](#memcached.setoption) que acepta un array de opciones
a definir.

### Parámetros

    options


      Un array asociativo de opciones donde las claves representan la opción
      a definir, y los valores, el nuevo valor para la opción.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Definir opciones Memcache**

&lt;?php
$m = new Memcached();
var_dump($m-&gt;getOption(Memcached::OPT_HASH) == Memcached::HASH_DEFAULT);

$m-&gt;setOptions(array(Memcached::OPT_HASH =&gt; Memcached::HASH_MURMUR, Memcached::OPT_PREFIX_KEY =&gt; "widgets"));

var_dump($m-&gt;getOption(Memcached::OPT_HASH) == Memcached::HASH_DEFAULT);
echo "El prefijo de las claves es ahora: ", $m-&gt;getOption(Memcached::OPT_PREFIX_KEY), "\n";
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)
El prefijo de las claves es ahora: widgets

### Ver también

    - [Memcached::getOption()](#memcached.getoption) - Lee una opción Memcached

    - [Memcached::setOption()](#memcached.setoption) - Configura una opción Memcached

    - Las [constantes Memcache](#memcached.constants)

# Memcached::setSaslAuthData

(PECL memcached &gt;= 2.0.0)

Memcached::setSaslAuthData — Define las credenciales a utilizar para la autenticación

### Descripción

public **Memcached::setSaslAuthData**([string](#language.types.string) $username, [string](#language.types.string) $password): [bool](#language.types.boolean)

**Memcached::setSaslAuthData()** define el nombre de usuario
así como la contraseña a utilizar durante la autenticación
SASL con los servidores memcache.

- Este método solo está disponible cuando la extensión memcache
  ha sido compilada con soporte SASL.
- Para más información, consulte la sección sobre la [instalación de Memcache](#memcached.setup).

### Parámetros

     username


       El nombre de usuario a utilizar para la autenticación.






     password


       La contraseña a utilizar para la autenticación.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Memcached::touch

(PECL memcached &gt;= 2.0.0)

Memcached::touch — Define una nueva expiración en un elemento

### Descripción

public **Memcached::touch**([string](#language.types.string) $key, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::touch()** define un nuevo valor de expiración
para una clave dada.

### Parámetros

     key


       The key under which to store the value.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ver también

    - [Memcached::touchByKey()](#memcached.touchbykey) - Define una nueva expiración en un elemento de un servidor específico

# Memcached::touchByKey

(PECL memcached &gt;= 2.0.0)

Memcached::touchByKey — Define una nueva expiración en un elemento de un servidor específico

### Descripción

public **Memcached::touchByKey**([string](#language.types.string) $server_key, [string](#language.types.string) $key, [int](#language.types.integer) $expiration = 0): [bool](#language.types.boolean)

**Memcached::touchByKey()** es equivalente al método
[Memcached::touch()](#memcached.touch), excepto que el argumento
server_key puede ser utilizado para ligar la clave
key con un servidor específico.

### Parámetros

     server_key


       The key identifying the server to store the value on or retrieve it from. Instead of hashing on the actual key for the item, we hash on the server key when deciding which memcached server to talk to. This allows related items to be grouped together on a single server for efficiency with multi operations.






     key


       The key under which to store the value.






     expiration


       The expiration time, defaults to 0. See [Expiration Times](#memcached.expiration) for more info.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Use [Memcached::getResultCode()](#memcached.getresultcode) if necessary.

### Ver también

    - [Memcached::touch()](#memcached.touch) - Define una nueva expiración en un elemento

## Tabla de contenidos

- [Memcached::add](#memcached.add) — Añade un nuevo elemento bajo una nueva clave
- [Memcached::addByKey](#memcached.addbykey) — Añade un elemento en un servidor designado
- [Memcached::addServer](#memcached.addserver) — Añade un servidor al grupo
- [Memcached::addServers](#memcached.addservers) — Añade múltiples servidores al grupo
- [Memcached::append](#memcached.append) — Añade datos a un elemento
- [Memcached::appendByKey](#memcached.appendbykey) — Añade datos a un elemento
- [Memcached::cas](#memcached.cas) — Comparar y cambiar un elemento
- [Memcached::casByKey](#memcached.casbykey) — Comparar y cambiar un elemento en un servidor
- [Memcached::\_\_construct](#memcached.construct) — Crea un objeto Memcached
- [Memcached::decrement](#memcached.decrement) — Disminuye un valor numérico
- [Memcached::decrementByKey](#memcached.decrementbykey) — Disminuye un valor numérico de un elemento almacenado en un servidor específico
- [Memcached::delete](#memcached.delete) — Elimina un elemento
- [Memcached::deleteByKey](#memcached.deletebykey) — Elimina un elemento de un servidor específico
- [Memcached::deleteMulti](#memcached.deletemulti) — Elimina varios elementos
- [Memcached::deleteMultiByKey](#memcached.deletemultibykey) — Elimina varios elementos de un servidor específico
- [Memcached::fetch](#memcached.fetch) — Lee el siguiente resultado
- [Memcached::fetchAll](#memcached.fetchall) — Lee todos los demás elementos
- [Memcached::flush](#memcached.flush) — Invalida todos los elementos del caché
- [Memcached::get](#memcached.get) — Lee un elemento
- [Memcached::getAllKeys](#memcached.getallkeys) — Recupera todas las claves almacenadas en todos los servidores
- [Memcached::getByKey](#memcached.getbykey) — Lee un elemento en un servidor específico
- [Memcached::getDelayed](#memcached.getdelayed) — Lee varios elementos
- [Memcached::getDelayedByKey](#memcached.getdelayedbykey) — Lee varios elementos en un servidor
- [Memcached::getMulti](#memcached.getmulti) — Lee varios elementos
- [Memcached::getMultiByKey](#memcached.getmultibykey) — Lee varios elementos de un servidor específico
- [Memcached::getOption](#memcached.getoption) — Lee una opción Memcached
- [Memcached::getResultCode](#memcached.getresultcode) — Devuelve el código de resultado de la última operación
- [Memcached::getResultMessage](#memcached.getresultmessage) — Devuelve un mensaje que describe el resultado de la última operación
- [Memcached::getServerByKey](#memcached.getserverbykey) — Dirige una clave a un servidor
- [Memcached::getServerList](#memcached.getserverlist) — Lista los servidores del pool memcached
- [Memcached::getStats](#memcached.getstats) — Lee estadísticas del grupo de servidores
- [Memcached::getVersion](#memcached.getversion) — Lee las informaciones de versión del pool de servidores
- [Memcached::increment](#memcached.increment) — Incrementa numéricamente un elemento
- [Memcached::incrementByKey](#memcached.incrementbykey) — Incrementa un valor numérico de un elemento almacenado en un servidor específico
- [Memcached::isPersistent](#memcached.ispersistent) — Verifica si una conexión persistente hacia memcache está en uso
- [Memcached::isPristine](#memcached.ispristine) — Verifica si la instancia ha sido creada recientemente
- [Memcached::prepend](#memcached.prepend) — Prefijo de datos a un elemento existente
- [Memcached::prependByKey](#memcached.prependbykey) — Prefija un elemento existente
- [Memcached::quit](#memcached.quit) — Cierra todas las conexiones abiertas
- [Memcached::replace](#memcached.replace) — Remplaza un elemento bajo una clave
- [Memcached::replaceByKey](#memcached.replacebykey) — Remplaza un elemento específico en un servidor designado
- [Memcached::resetServerList](#memcached.resetserverlist) — Elimina todos los servidores de la lista de servidores
- [Memcached::set](#memcached.set) — Almacena un elemento
- [Memcached::setByKey](#memcached.setbykey) — Almacena un elemento en un servidor específico
- [Memcached::setEncodingKey](#memcached.setencodingkey) — Establece la clave de cifrado AES para los datos en Memcached
- [Memcached::setMulti](#memcached.setmulti) — Almacena varios elementos
- [Memcached::setMultiByKey](#memcached.setmultibykey) — Almacena varios elementos en un servidor
- [Memcached::setOption](#memcached.setoption) — Configura una opción Memcached
- [Memcached::setOptions](#memcached.setoptions) — Define opciones Memcache
- [Memcached::setSaslAuthData](#memcached.setsaslauthdata) — Define las credenciales a utilizar para la autenticación
- [Memcached::touch](#memcached.touch) — Define una nueva expiración en un elemento
- [Memcached::touchByKey](#memcached.touchbykey) — Define una nueva expiración en un elemento de un servidor específico

# La clase MemcachedException

(PECL memcached &gt;= 0.1.0)

## Introducción

    ## Sinopsis de la Clase




     ****




       class **MemcachedException**



       extends
        [RuntimeException](#class.runtimeexception)

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

- [Introducción](#intro.memcached)
- [Instalación/Configuración](#memcached.setup)<li>[Requerimientos](#memcached.requirements)
- [Instalación](#memcached.installation)
- [Configuración en tiempo de ejecución](#memcached.configuration)
  </li>- [Constantes predefinidas](#memcached.constants)
- [Tiempos de expiración](#memcached.expiration)
- [Funciones de retorno](#memcached.callbacks)<li>[Funciones de retorno de resultados](#memcached.callbacks.result)
- [Funciones de retorno para claves ausentes](#memcached.callbacks.read-through)
  </li>- [Soporte para sesiones](#memcached.sessions)
- [Memcached](#class.memcached) — La clase Memcached<li>[Memcached::add](#memcached.add) — Añade un nuevo elemento bajo una nueva clave
- [Memcached::addByKey](#memcached.addbykey) — Añade un elemento en un servidor designado
- [Memcached::addServer](#memcached.addserver) — Añade un servidor al grupo
- [Memcached::addServers](#memcached.addservers) — Añade múltiples servidores al grupo
- [Memcached::append](#memcached.append) — Añade datos a un elemento
- [Memcached::appendByKey](#memcached.appendbykey) — Añade datos a un elemento
- [Memcached::cas](#memcached.cas) — Comparar y cambiar un elemento
- [Memcached::casByKey](#memcached.casbykey) — Comparar y cambiar un elemento en un servidor
- [Memcached::\_\_construct](#memcached.construct) — Crea un objeto Memcached
- [Memcached::decrement](#memcached.decrement) — Disminuye un valor numérico
- [Memcached::decrementByKey](#memcached.decrementbykey) — Disminuye un valor numérico de un elemento almacenado en un servidor específico
- [Memcached::delete](#memcached.delete) — Elimina un elemento
- [Memcached::deleteByKey](#memcached.deletebykey) — Elimina un elemento de un servidor específico
- [Memcached::deleteMulti](#memcached.deletemulti) — Elimina varios elementos
- [Memcached::deleteMultiByKey](#memcached.deletemultibykey) — Elimina varios elementos de un servidor específico
- [Memcached::fetch](#memcached.fetch) — Lee el siguiente resultado
- [Memcached::fetchAll](#memcached.fetchall) — Lee todos los demás elementos
- [Memcached::flush](#memcached.flush) — Invalida todos los elementos del caché
- [Memcached::get](#memcached.get) — Lee un elemento
- [Memcached::getAllKeys](#memcached.getallkeys) — Recupera todas las claves almacenadas en todos los servidores
- [Memcached::getByKey](#memcached.getbykey) — Lee un elemento en un servidor específico
- [Memcached::getDelayed](#memcached.getdelayed) — Lee varios elementos
- [Memcached::getDelayedByKey](#memcached.getdelayedbykey) — Lee varios elementos en un servidor
- [Memcached::getMulti](#memcached.getmulti) — Lee varios elementos
- [Memcached::getMultiByKey](#memcached.getmultibykey) — Lee varios elementos de un servidor específico
- [Memcached::getOption](#memcached.getoption) — Lee una opción Memcached
- [Memcached::getResultCode](#memcached.getresultcode) — Devuelve el código de resultado de la última operación
- [Memcached::getResultMessage](#memcached.getresultmessage) — Devuelve un mensaje que describe el resultado de la última operación
- [Memcached::getServerByKey](#memcached.getserverbykey) — Dirige una clave a un servidor
- [Memcached::getServerList](#memcached.getserverlist) — Lista los servidores del pool memcached
- [Memcached::getStats](#memcached.getstats) — Lee estadísticas del grupo de servidores
- [Memcached::getVersion](#memcached.getversion) — Lee las informaciones de versión del pool de servidores
- [Memcached::increment](#memcached.increment) — Incrementa numéricamente un elemento
- [Memcached::incrementByKey](#memcached.incrementbykey) — Incrementa un valor numérico de un elemento almacenado en un servidor específico
- [Memcached::isPersistent](#memcached.ispersistent) — Verifica si una conexión persistente hacia memcache está en uso
- [Memcached::isPristine](#memcached.ispristine) — Verifica si la instancia ha sido creada recientemente
- [Memcached::prepend](#memcached.prepend) — Prefijo de datos a un elemento existente
- [Memcached::prependByKey](#memcached.prependbykey) — Prefija un elemento existente
- [Memcached::quit](#memcached.quit) — Cierra todas las conexiones abiertas
- [Memcached::replace](#memcached.replace) — Remplaza un elemento bajo una clave
- [Memcached::replaceByKey](#memcached.replacebykey) — Remplaza un elemento específico en un servidor designado
- [Memcached::resetServerList](#memcached.resetserverlist) — Elimina todos los servidores de la lista de servidores
- [Memcached::set](#memcached.set) — Almacena un elemento
- [Memcached::setByKey](#memcached.setbykey) — Almacena un elemento en un servidor específico
- [Memcached::setEncodingKey](#memcached.setencodingkey) — Establece la clave de cifrado AES para los datos en Memcached
- [Memcached::setMulti](#memcached.setmulti) — Almacena varios elementos
- [Memcached::setMultiByKey](#memcached.setmultibykey) — Almacena varios elementos en un servidor
- [Memcached::setOption](#memcached.setoption) — Configura una opción Memcached
- [Memcached::setOptions](#memcached.setoptions) — Define opciones Memcache
- [Memcached::setSaslAuthData](#memcached.setsaslauthdata) — Define las credenciales a utilizar para la autenticación
- [Memcached::touch](#memcached.touch) — Define una nueva expiración en un elemento
- [Memcached::touchByKey](#memcached.touchbykey) — Define una nueva expiración en un elemento de un servidor específico
  </li>- [MemcachedException](#class.memcachedexception) — La clase MemcachedException
