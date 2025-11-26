# OPcache

# Introducción

OPcache mejora el rendimiento de PHP almacenando el código de bytes de un script precompilado en
la memoria compartida, eliminando así la necesidad de que PHP cargue y analice los script
en cada petición.

Esta extensión está incluída en PHP 5.5.0 y posteriores, y está
[» disponible en PECL](https://pecl.php.net/package/ZendOpcache)
para las versiones 5.2, 5.3 y 5.4 de PHP.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#opcache.installation)
- [Configuración en tiempo de ejecución](#opcache.configuration)

## Instalación

OPcache solo puede ser compilado como una extensión compartida.
Si se ha desactivado la compilación de extensiones por omisión con
**--disable-all**, es necesario compilar PHP con
la opción **--enable-opcache** para que OPcache
esté disponible.

Una vez compilado, puede utilizarse la directiva de configuración
[zend_extension](#ini.zend-extension) para cargar
la extensión OPcache en PHP. Esto puede realizarse con
zend_extension=/full/path/to/opcache.so en plataformas
no-Windows, y zend_extension=C:\path\to\php_opcache.dll
en Windows.

**Nota**:

Si se desea utilizar OPcache con
[» Xdebug](http://xdebug.org/), debe cargarse
OPcache antes que Xdebug.

### Configuración php.ini recomendada

La siguiente configuración es generalmente recomendada, ya que
proporciona un buen rendimiento :

opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=60
opcache.fast_shutdown=1 ; anterior a PHP 7.2.0
opcache.enable_cli=1

Asimismo, podría ser deseable desactivar
[opcache.save_comments](#ini.opcache.save-comments)
y activar
[opcache.enable_file_override](#ini.opcache.enable-file-override),
sin embargo, tenga en cuenta que debe probarse el código antes de utilizarlo en
producción, ya que podría romper frameworks y aplicaciones,
especialmente en casos donde se utilicen anotaciones de comentarios
de documentación.

En Windows, [opcache.file_cache_fallback](#ini.opcache.file-cache-fallback)
debe estar activado, y [opcache.file_cache](#ini.opcache.file-cache)
debe definirse a una carpeta existente y escribible.

Una lista completa de directivas de configuración soportadas por OPcache
[está disponible](#opcache.configuration).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de OPcache**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [opcache.enable](#ini.opcache.enable)
      1
      **[INI_ALL](#constant.ini-all)**
       



      [opcache.enable_cli](#ini.opcache.enable-cli)
      0
      **[INI_SYSTEM](#constant.ini-system)**
      Entre PHP 7.1.2 y 7.1.6 inclusive, el valor por omisión era 1



      [opcache.memory_consumption](#ini.opcache.memory-consumption)
      "128"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.interned_strings_buffer](#ini.opcache.interned-strings-buffer)
      "8"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.max_accelerated_files](#ini.opcache.max-accelerated-files)
      "10000"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.max_wasted_percentage](#ini.opcache.max-wasted-percentage)
      "5"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.use_cwd](#ini.opcache.use-cwd)
      1
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.validate_timestamps](#ini.opcache.validate-timestamps)
      1
      **[INI_ALL](#constant.ini-all)**
       



      [opcache.revalidate_freq](#ini.opcache.revalidate-freq)
      "2"
      **[INI_ALL](#constant.ini-all)**
       



      [opcache.revalidate_path](#ini.opcache.revalidate-path)
      0
      **[INI_ALL](#constant.ini-all)**
       



      [opcache.save_comments](#ini.opcache.save-comments)
      1
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.fast_shutdown](#ini.opcache.fast-shutdown)
      0
      **[INI_SYSTEM](#constant.ini-system)**
      Eliminado en PHP 7.2.0.



      [opcache.enable_file_override](#ini.opcache.enable-file-override)
      0
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.optimization_level](#ini.opcache.optimization-level)
      "0x7FFEBFFF"
      **[INI_SYSTEM](#constant.ini-system)**
      Modificado desde 0x7FFFBFFF en PHP 7.3.0



      [opcache.inherited_hack](#ini.opcache.inherited-hack)
      1
      **[INI_SYSTEM](#constant.ini-system)**
      Eliminado en PHP 7.3.0



      [opcache.dups_fix](#ini.opcache.dups-fix)
      0
      **[INI_ALL](#constant.ini-all)**
       



      [opcache.blacklist_filename](#ini.opcache.blacklist-filename)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.max_file_size](#ini.opcache.max-file-size)
      0
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.consistency_checks](#ini.opcache.consistency-checks)
      0
      **[INI_ALL](#constant.ini-all)**
      &gt;Desactivado a partir de PHP 8.1.18 y 8.2.5. Eliminado a partir de PHP 8.3.0.



      [opcache.force_restart_timeout](#ini.opcache.force-restart-timeout)
      "180"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.error_log](#ini.opcache.error-log)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.log_verbosity_level](#ini.opcache.log-verbosity-level)
      1
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.record_warnings](#ini.opcache.record-warnings)
      0
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0.



      [opcache.preferred_memory_model](#ini.opcache.preferred-memory-model)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.protect_memory](#ini.opcache.protect-memory)
      0
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.mmap_base](#ini.opcache.mmap-base)
      **[null](#constant.null)**
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.restrict_api](#ini.opcache.restrict-api)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.file_update_protection](#ini.opcache.file_update_protection)
      "2"
      **[INI_ALL](#constant.ini-all)**
       



      [opcache.huge_code_pages](#ini.opcache.huge_code_pages)
      0
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.lockfile_path](#ini.opcache.lockfile_path)
      "/tmp"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.opt_debug_level](#ini.opcache.opt_debug_level)
      0
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 7.1.0



      [opcache.file_cache](#ini.opcache.file-cache)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.file_cache_only](#ini.opcache.file-cache-only)
      0
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.file_cache_consistency_checks](#ini.opcache.file-cache-consistency-checks)
      1
      **[INI_SYSTEM](#constant.ini-system)**
       



      [opcache.file_cache_fallback](#ini.opcache.file-cache-fallback)
      1
      **[INI_SYSTEM](#constant.ini-system)**
      Solo para Windows.



      [opcache.validate_permission](#ini.opcache.validate-permission)
      0
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 7.0.14



      [opcache.validate_root](#ini.opcache.validate-root)
      0
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 7.0.14



      [opcache.preload](#ini.opcache.preload)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 7.4.0



      [opcache.preload_user](#ini.opcache.preload-user)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 7.4.0



      [opcache.cache_id](#ini.opcache.cache-id)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
      Solo para Windows. Disponible a partir de PHP 7.4.0



      [opcache.jit](#ini.opcache.jit)
      "disable"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0. Antes de PHP 8.4.0, el valor predeterminado era "tracing".



      [opcache.jit_buffer_size](#ini.opcache.jit-buffer-size)
      64M
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0. Antes de PHP 8.4.0, el valor predeterminado era 0.



      [opcache.jit_debug](#ini.opcache.jit-debug)
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_bisect_limit](#ini.opcache.jit-bisect-limit)
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_prof_threshold](#ini.opcache.jit-prof-threshold)
      "0.005"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_root_traces](#ini.opcache.jit-max-root-traces)
      "1024"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_side_traces](#ini.opcache.jit-max-side-traces)
      "128"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_exit_counters](#ini.opcache.jit-max-exit-counters)
      "8192"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_hot_loop](#ini.opcache.jit-hot-loop)
      "64"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_hot_func](#ini.opcache.jit-hot-func)
      "127"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_hot_return](#ini.opcache.jit-hot-return)
      "8"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_hot_side_exit](#ini.opcache.jit-hot-side-exit)
      "8"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_blacklist_root_trace](#ini.opcache.jit-blacklist-root-trace)
      "16"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_blacklist_side_trace](#ini.opcache.jit-blacklist-side-trace)
      "8"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_loop_unrolls](#ini.opcache.jit-max-loop-unrolls)
      "8"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_recursive_calls](#ini.opcache.jit-max-recursive-calls)
      "2"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_recursive_returns](#ini.opcache.jit-max-recursive-return)
      "2"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0



      [opcache.jit_max_polymorphic_calls](#ini.opcache.jit-max-polymorphic-calls)
      "2"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.0.0


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     opcache.enable
     [bool](#language.types.boolean)



      Activa el cache de opcode. Cuando está desactivado, el código no es
      ni optimizado, ni almacenado en caché. La configuración de opcache.enable
      no puede ser activada durante la ejecución mediante la función
      [ini_set()](#function.ini-set), solo puede ser desactivada. Intentar activarla
      en un script generará una advertencia.







     opcache.enable_cli
     [bool](#language.types.boolean)



      Activa el cache de opcode para la versión CLI de PHP.







     opcache.memory_consumption
     [int](#language.types.integer)



      El tamaño de la memoria compartida utilizada por OPcache, en megabytes.
      El valor mínimo permisible es "8",
      que se fuerza si se define un valor más pequeño.







     opcache.interned_strings_buffer
     [int](#language.types.integer)



      La cantidad de memoria utilizada para almacenar cadenas internas, en megabytes.
      El valor máximo es de 32767 en arquitecturas de 64 bits, y de 4095 en arquitecturas de 32 bits.



     **Nota**:

       Antes de PHP 8.4.0, el valor máximo era de 4095 megabytes en todas las arquitecturas.








     opcache.max_accelerated_files
     [int](#language.types.integer)



      El número máximo de claves (y por lo tanto, de scripts) en la tabla de hash de OPcache.
      El valor actualmente utilizado será el primer número del conjunto de
      números primos
      { 223, 463, 983, 1979, 3907, 7963, 16229, 32531, 65407, 130987, 262237, 524521, 1048793 }
      que sea mayor o igual que el valor configurado. El valor mínimo es 200.
      El valor máximo es 100000 en PHP &lt; 5.5.6, y 1000000 en versiones
      posteriores.
      Los valores fuera de este intervalo se ajustan al intervalo permitido.







     opcache.max_wasted_percentage
     [int](#language.types.integer)



      El porcentaje máximo de memoria desperdiciada permitido antes de que se
      programe un reinicio, si no hay suficiente memoria disponible.
      El valor máximo permisible es "50",
      que se fuerza si se define un valor más grande.







     opcache.use_cwd
     [bool](#language.types.boolean)



      Si está activado, OPcache añade el directorio de trabajo actual a la clave del script,
      eliminando así posibles colisiones entre archivos con el mismo nombre base. Desactivar esta funcionalidad mejora
      el rendimiento, pero puede romper aplicaciones existentes.







     opcache.validate_timestamps
     [bool](#language.types.boolean)



      Si está activado, OPcache verificará las actualizaciones de los scripts cada
      [opcache.revalidate_freq](#ini.opcache.revalidate-freq)
      segundos. Cuando esta directiva está desactivada, debe reinicializarse
      OPcache manualmente mediante la función [opcache_reset()](#function.opcache-reset),
      la función [opcache_invalidate()](#function.opcache-invalidate) o reiniciando el servidor
      web para que los cambios en el sistema de archivos surtan efecto.


**Nota**:

        OPcache puede validar siempre el timestamp de un archivo durante la compilación si las opciones
        [opcache.file_update_protection](#ini.opcache.file_update_protection)
        o [opcache.max_file_size](#ini.opcache.max-file-size)
        están definidas en valores no nulos.









     opcache.revalidate_freq
     [int](#language.types.integer)



      La frecuencia de verificación del timestamp del script para detectar
      posibles actualizaciones, en segundos. El valor 0
      hará que OPcache verifique las actualizaciones en cada petición.




      Esta directiva de configuración se ignora si
      [opcache.validate_timestamps](#ini.opcache.validate-timestamps)
      está desactivado.







     opcache.revalidate_path
     [bool](#language.types.boolean)



      Si está desactivado, los archivos en caché existentes que usan el mismo
      [include_path](#ini.include-path) serán reutilizados.
      También, si un archivo con el mismo nombre está en otro lugar en el
      include_path, no será encontrado.







     opcache.save_comments
     [bool](#language.types.boolean)



      Si está desactivado, todos los comentarios de documentación serán eliminados
      del cache de opcode para reducir el tamaño del código optimizado.
      La desactivación de esta directiva puede romper aplicaciones
      y frameworks que dependen del análisis de comentarios
      para anotaciones, como Doctrine, Zend Framework 2 y PHPUnit.







     opcache.fast_shutdown
     [bool](#language.types.boolean)



      Si está activado, se utilizará una secuencia de cierre rápida, que no libera
      cada bloque asignado, sino que se basa en el gestor de memoria
      del Zend Engine para desasignar el conjunto entero de variables de la petición, en masa.




      Esta directiva fue eliminada en PHP 7.2.0. Una variante de la
      secuencia de cierre rápido fue integrada en PHP y será utilizada automáticamente
      si es posible.







     opcache.enable_file_override
     [bool](#language.types.boolean)



      Cuando está activado, el cache de opcode será verificado para saber si un archivo
      ya ha sido almacenado en caché cuando se llaman a las funciones [file_exists()](#function.file-exists),
      [is_file()](#function.is-file) y [is_readable()](#function.is-readable). Esto puede aumentar el rendimiento de las aplicaciones que verifican la existencia
      y la legibilidad de los scripts PHP, pero puede devolver datos obsoletos si
      [opcache.validate_timestamps](#ini.opcache.validate-timestamps)
      está desactivado.







     opcache.optimization_level
     [int](#language.types.integer)



      El valor por omisión consiste en aplicar todas las optimizaciones seguras.
      Cambiar el valor por omisión es principalmente útil para depurar/desarrollar el optimizador
      (ver también [opcache.opt_debug_level](#ini.opcache.opt_debug_level)).







     opcache.inherited_hack
     [bool](#language.types.boolean)



      Esta directiva de configuración se ignora.







     opcache.dups_fix
     [bool](#language.types.boolean)



      Este hack solo debe ser activado como solución de contorno para errores
      "Cannot redeclare class".







     opcache.blacklist_filename
     [string](#language.types.string)



      La ubicación de almacenamiento del archivo que gestiona la lista negra de OPcache.
      Un archivo de lista negra es un archivo de texto que contiene nombres
      de archivos que no deben ser acelerados; uno por línea.
      Se permiten comodines, y también se pueden proporcionar prefijos. Las líneas
      que comienzan con punto y coma
      se consideran comentarios y serán ignoradas.




      Un archivo de lista negra simple se ve así:






; Coincide con un archivo específico.
/var/www/broken.php
; Un prefijo que coincide con todos los archivos que comienzan con x.
/var/www/x
; Una coincidencia con comodín.
/var/www/\*-broken.php

     opcache.max_file_size
     [int](#language.types.integer)



      El tamaño máximo del archivo que puede ser almacenado en caché, en bytes.
      Si es 0, todos los archivos podrán ser almacenados en caché.







     opcache.consistency_checks
     [int](#language.types.integer)



      Si es diferente de cero, OPcache verificará la suma de comprobación
      del caché cada N peticiones, donde N es el valor de esta directiva
      de configuración. Esto solo debe ser activado durante el depurado, sabiendo
      que afecta significativamente al rendimiento.



     **Nota**:



       Desactivado a partir de PHP 8.1.18 y 8.2.5. Eliminado a partir de PHP 8.3.0.








     opcache.force_restart_timeout
     [int](#language.types.integer)



      La duración de espera para el inicio de un reinicio programado, si el
      caché no está activado, en segundos. Si este tiempo de espera se alcanza,
      entonces OPcache asume que algo está mal, y matará los
      procesos que gestionan los bloqueos en el caché para permitir un
      reinicio.




      Si
      [opcache.log_verbosity_level](#ini.opcache.log-verbosity-level)
      es 2 o más, se registrará una advertencia en el registro de errores
      cuando ocurra este comportamiento.




      Esta directiva no es soportada en Windows.







     opcache.error_log
     [string](#language.types.string)



      El registro de errores para errores de OPcache. Una cadena vacía será vista como
      stderr, y los errores serán enviados a la salida
      estándar de errores (que será el registro de errores del servidor web en la
      mayoría de los casos).







     opcache.log_verbosity_level
     [int](#language.types.integer)



      El nivel de verbosidad de los registros. Por omisión, solo los errores fatales
      (nivel 0) y los errores (nivel 1) serán registrados. Los otros
      niveles disponibles son las alertas (nivel 2), los mensajes
      informativos (nivel 3), y los mensajes de depuración (nivel 4).







     opcache.record_warnings
     [bool](#language.types.boolean)



      Si esta opción está activada, OPcache registrará los avisos de compilación
      y los reproducirá en el próximo include, incluso si se sirve desde el caché.







     opcache.preferred_memory_model
     [string](#language.types.string)



      El modelo de memoria preferido para OPcache, a utilizar. Si se deja vacío,
      OPcache elegirá el modelo más apropiado, que es la mejor
      forma de hacerlo en la mayoría de los casos.




      Los valores posibles son mmap, shm,
      posix y win32.







     opcache.protect_memory
     [bool](#language.types.boolean)



      Protege la memoria compartida de escrituras no autorizadas durante la ejecución
      de los scripts. Esto solo es útil para el depurado interno.







     opcache.mmap_base
     [string](#language.types.string)



      La base utilizada para los segmentos de memoria compartida en Windows.
      Todos los procesos PHP deben enlazar la memoria compartida en el mismo espacio
      de direcciones. El uso de esta directiva permite corregir los errores
      "Unable to reattach to base address".







     opcache.restrict_api
     [string](#language.types.string)



      Permite la llamada a las funciones de la API de OPcache solo desde
      scripts PHP cuyo camino comienza con una cadena específica.
      El valor por omisión, "", significa "sin restricciones".







     opcache.file_update_protection
     [string](#language.types.string)



      Impide el almacenamiento en caché de archivos que datan menos que este número de segundos.
      Esto protege del almacenamiento en caché de archivos actualizados incompletamente.
      Si todas las actualizaciones de archivos son atómicas, el rendimiento
      puede ser aumentado definiéndolo a 0.
      Esto permitirá almacenar en caché los archivos inmediatamente.







     opcache.huge_code_pages
     [bool](#language.types.boolean)



      Activa o desactiva la copia de código PHP (segmento de texto) en HUGE PAGES.
      Esto debería mejorar el rendimiento, pero requiere una configuración
      adecuada del sistema operativo.
      Disponible en Linux a partir de PHP 7.0.0,
      y en FreeBSD a partir de PHP 7.4.0.







     opcache.lockfile_path
     [string](#language.types.string)



      Ruta absoluta utilizada para guardar los archivos de bloqueo compartidos (solo para *nix)







     opcache.opt_debug_level
     [string](#language.types.string)



      Produce un volcado de opcode para depurar los diferentes pasos de optimización.
      0x10000 mostrará los opcodes tal como el compilador los produce antes de que se produzca
      cualquier optimización, mientras que 0x20000 mostrará los códigos optimizados.







     opcache.file_cache
     [string](#language.types.string)



      Activa y define el directorio de caché de segundo nivel. Esto debería
      mejorar el rendimiento cuando la memoria SHM está llena, al reiniciar
      el servidor o reinicializar SMH.
      El valor por omisión "" desactiva el almacenamiento en caché basado en archivos.







     opcache.file_cache_only
     [bool](#language.types.boolean)



      Activa o desactiva el almacenamiento en caché del opcode en la memoria compartida.



     **Nota**:



       Antes de PHP 8.1.0, desactivar esta directiva con un archivo de
       caché ya lleno requiere el vaciado manual de la caché.








     opcache.file_cache_consistency_checks
     [bool](#language.types.boolean)



      Activa o desactiva la validación de la suma de comprobación cuando el script
      se carga desde el caché de archivos.







     opcache.file_cache_fallback
     [bool](#language.types.boolean)



      Sugiere opcache.file_cache_only=1 para un proceso determinado que ha fallado al
      unirse a la memoria compartida (solo para Windows).
      Se requiere el caché de archivos activado explícitamente.



     **Precaución**

       Desactivar esta opción de configuración puede impedir que los procesos
       se inicien,
       y por lo tanto se desaconseja.








     opcache.validate_permission
     [bool](#language.types.boolean)



      Valida los permisos de los archivos almacenados en caché con respecto al
      usuario actual.







     opcache.validate_root
     [bool](#language.types.boolean)



      Impide las colisiones de nombres en entornos `chroot`. Esto debería
      ser activado en todos los entornos `chroot` para impedir el acceso
      a archivos fuera del chroot.







     opcache.preload
     [string](#language.types.string)



      Especifica un script PHP que será compilado y ejecutado al iniciar el servidor,
      y que puede precargar otros archivos, ya sea mediante [include](#function.include)
      o utilizando la función [opcache_compile_file()](#function.opcache-compile-file). Todas
      las entidades (por ejemplo funciones y clases) definidas en estos archivos estarán
      disponibles para las peticiones listas para usar, hasta que el servidor se apague.



     **Nota**:



       El precargado no es soportado en Windows.








     opcache.preload_user
     [string](#language.types.string)



      Permite que el precargado se ejecute como usuario del sistema
      especificado. Esto es útil para servidores que se inician como root
      antes de cambiar a un usuario del sistema no privilegiado. El precargado
      como root no está permitido por omisión por razones de seguridad,
      a menos que esta directiva esté explícitamente definida como root.
      A partir de PHP 8.3.0, esta directiva ya no necesita ser definida para permitir el precargado
      al ejecutarse como root con CLI SAPI o [phpdbg SAPI](#book.phpdbg).







     opcache.cache_id
     [string](#language.types.string)



      En Windows, todos los procesos que ejecutan el mismo PHP
      SAPI bajo el mismo usuario con el mismo ID
      de caché comparten una instancia única de OPcache.
      El valor del ID de caché puede ser elegido libremente.



     **Sugerencia**

       Para IIS, diferentes grupos de aplicaciones pueden tener su propia
       instancia OPcache utilizando la variable de entorno
       APP_POOL_ID como opcache.cache_id.
       For IIS, different application pools can have their own OPcache instance
       by using the environment variable APP_POOL_ID as
       opcache.cache_id.








     opcache.jit
     [string](#language.types.string)|[int](#language.types.integer)



      Para un uso típico, esta opción acepta una de las cuatro siguientes valores string:




      - disable: Desactivado completamente, no puede ser activado durante el tiempo de ejecución.

      - off:  Desactivado, pero puede ser activado durante el tiempo de ejecución.

      -
       tracing/on: Utiliza el tracing JIT.
       Activado por omisión y recomendado para la mayoría de los usuarios.


      - function: Utiliza el function JIT.



      Para un uso avanzado, esta opción acepta un entero de 4 dígitos
      CRTO, donde los dígitos significan:




        C (Banderas de optimización específica del CPU)


          - 0: Desactiva las optimizaciones específicas del CPU.

          - 1: Activa el uso de AVX, si el CPU lo soporta.





        R (asignación de registros)


          - 0: No realiza ninguna asignación de registros

          - 1: Realiza asignaciones de registros a nivel de bloque.

          - 2: Realiza asignaciones de registros globales.





        T (disparador)


          - 0: Compila todas las funciones al cargar el script.

          - 1: Compila las funciones en su primera ejecución.

          -
           2: Perfila las funciones en la primera petición y compila las funciones
           más calientes justo después.


          - 3: Perfila a la volada y compila las funciones calientes.

          - 4: Actualmente no utilizado.

          -
           5: Utiliza el tracing JIT. Perfila a la volada y
           compila las trazas para los segmentos de código caliente.






        O (nivel de optimización)


          - 0: Sin JIT.

          - 1: JIT mínimo (llama a los manejadores estándar de la VM).

          - 2: Inlinea los manejadores de la VM.

          - 3: Utiliza la inferencia de tipos.

          - 4: Utiliza un grafo de llamadas.

          - 5: Optimiza el script entero.





      El modo "tracing" corresponde a CRTO = 1254,
      el modo "function" corresponde a CRTO = 1205.





     opcache.jit_buffer_size
     [int](#language.types.integer)



      La cantidad de memoria compartida reservada para código compilado JIT. Un valor de cero desactiva el JIT.



     Cuando un [int](#language.types.integer) es utilizado,

su valor es medido en bytes. También puede utilizar la notación abreviada
como se describe en esta
[entrada de la FAQ.](#faq.using.shorthandbytes).

     opcache.jit_debug
     [int](#language.types.integer)



      Una máscara de bits que especifica qué salida de depuración de JIT activar
      Para los valores posibles, consulte [» zend_jit.h](https://github.com/php/php-src/blob/master/ext/opcache/jit/zend_jit.h)
      (ver las definiciones de macro que comienzan con ZEND_JIT_DEBUG).







     opcache.jit_bisect_limit
     [int](#language.types.integer)



      Opción de depuración que desactiva la compilación JIT después de la compilación de un cierto número
      de funciones.
      Esto puede ser útil para bisectar la fuente de una mala compilación JIT.
      Nota: esta opción solo funciona cuando el disparador JIT está definido
      a 0 (compilación al cargar el script) o 1 (compilación a la primera ejecución),
      por ejemplo, opcache.jit=1215.
      Ver más en la opción [opcache.jit](#ini.opcache.jit).







     opcache.jit_prof_threshold
     [float](#language.types.float)



      Al utilizar el modo de disparador "perfilar las funciones en la primera petición",
      este límite determina si una función es considerada caliente. El número de llamadas a la función
      dividido por el número de llamadas a todas las funciones debe ser superior a este límite.
      Por ejemplo, un límite de 0.005 significa que una función que corresponde a más de 0.5% de todas
      las llamadas será compilada JIT.







     opcache.jit_max_root_traces
     [int](#language.types.integer)



      Número máximo de trazas raíz (root traces). La traza raíz es un flujo de ejecución que toma
      primero un camino a través del código, que es una unidad de la compilación JIT. JIT no compilara
      nuevo código si alcanza este límite.







     opcache.jit_max_side_traces
     [int](#language.types.integer)



      Número máximo de trazas laterales (side trace) que una traza raíz puede tener.
      La traza lateral es otro flujo de ejecución que no sigue el camino de la traza
      raíz compilada. Las trazas laterales pertenecientes a la misma traza raíz no serán compiladas
      si se alcanza este límite.







     opcache.jit_max_exit_counters
     [int](#language.types.integer)



      Número máximo de contadores de salida de traza lateral. Esto limita el número total de
      trazas laterales que puede haber, a través de todas las trazas raíz.







     opcache.jit_hot_loop
     [int](#language.types.integer)



      Después de cuántas iteraciones un bucle es considerado caliente.
      El rango de valores válidos es [0,255] ;
      para cualquier parámetro fuera de este rango, por ejemplo -1 o 256, se utilizará el valor por omisión en su lugar.
      Especialmente, un valor nulo desactivará el JIT para trazar y compilar todos los bucles.







     opcache.jit_hot_func
     [int](#language.types.integer)



      Después de cuántas llamadas una función es considerada caliente.
      El rango de valores válidos es [0,255] ;
      para cualquier parámetro fuera de este rango, por ejemplo -1 o 256, se utilizará el valor por omisión en su lugar.
      Especialmente, un valor nulo desactivará el JIT para trazar y compilar todas las funciones.







     opcache.jit_hot_return
     [int](#language.types.integer)



      Después de cuántos retornos un retorno es considerado caliente.
      El rango de valores válidos es [0,255] ;
      para cualquier parámetro fuera de este rango, por ejemplo -1 o 256, se utilizará el valor por omisión en su lugar.
      Especialmente, un valor nulo desactivará el JIT para trazar y compilar todos los retornos.







     opcache.jit_hot_side_exit
     [int](#language.types.integer)



      Después de cuántas salidas, una salida lateral es considerada caliente.
      El rango de valores válidos es [0,255] ;
      para cualquier parámetro fuera de este rango, por ejemplo -1 o 256, se utilizará el valor por omisión en su lugar.
      Especialmente, un valor nulo desactivará el JIT para trazar y compilar todas las salidas laterales.







     opcache.jit_blacklist_root_trace
     [int](#language.types.integer)



      Número máximo de intentos de compilación de una traza raíz antes de que esta sea excluida.







     opcache.jit_blacklist_side_trace
     [int](#language.types.integer)



      Número máximo de intentos de compilación de una traza lateral antes de que esta sea excluida.







     opcache.jit_max_loop_unrolls
     [int](#language.types.integer)



      Número máximo de intentos para desenrollar un bucle en una traza lateral,
      intentando alcanzar la traza raíz y cerrar el bucle exterior.







     opcache.jit_max_recursive_calls
     [int](#language.types.integer)




      Número máximo de llamadas recursivas desenrolladas en un bucle.







     opcache.jit_max_recursive_returns
     [int](#language.types.integer)




      Número máximo de retornos recursivos desenrollados en un bucle.







     opcache.jit_max_polymorphic_calls
     [int](#language.types.integer)



      Número máximo de intentos para inlinear una llamada polimórfica (dinámica o método).
      Llamadas por encima de este límite son tratadas como megamórficas y no son inlineadas.


# Precarga

A partir de PHP 7.4.0, PHP puede ser configurado para precargar scripts en el opcache cuando el motor
se inicia. Todas las funciones, clases, interfaces o traits (pero no las constantes) de estos ficheros se volverán
entonces disponibles globalmente para todas las peticiones sin necesidad de ser explícitamente incluidas. Esto intercambia
la comodidad y el rendimiento (ya que el código está siempre disponible) por el uso de la memoria base. Asimismo,
requiere reiniciar el proceso PHP para eliminar los scripts precargados, lo que significa que esta funcionalidad
solo es práctica en producción, no en un entorno de desarrollo.

Tenga en cuenta que el compromiso óptimo entre rendimiento y memoria puede variar según la aplicación.
"Precargar todo" puede ser la estrategia más simple, pero no necesariamente la mejor. Además,
la precarga solo es útil cuando hay un proceso persistente de una petición a otra. Esto significa
que aunque pueda funcionar en un script CLI si el opcache está activado, generalmente es inútil. La excepción
es al utilizar la precarga en las [bibliotecas FFI](#ffi.examples-complete).

**Nota**:

La precarga no está soportada en Windows.

La configuración de la precarga implica dos pasos, y requiere que el opcache esté activado.
En primer lugar, defina el valor [opcache.preload](#ini.opcache.preload)
en php.ini:

opcache.preload=preload.php

preload.php es un fichero arbitrario que se ejecutará una vez al inicio del servidor
(PHP-FPM, mod_php, etc.) y cargará código en memoria persistente. En los servidores que se inician como
root antes de cambiar a un usuario del sistema no privilegiado, o si PHP se ejecuta como root
(no recomendado), el valor [opcache.preload_user](#ini.opcache.preload-user)
puede especificar el usuario del sistema para ejecutar la precarga. La ejecución de la precarga como root no está permitida
por defecto. Defina opcache.preload_user=root para permitirlo explícitamente.

En el script preload.php, cualquier fichero referenciado por [include](#function.include),
[include_once](#function.include-once), [require](#function.require), [require_once](#function.require-once), o
[opcache_compile_file()](#function.opcache-compile-file) serán analizados en la memoria persistente. En el siguiente ejemplo,
todos los ficheros .php del directorio src serán precargados, excepto si son
un fichero Test.

&lt;?php
$directory = new RecursiveDirectoryIterator(__DIR__ . '/src');
$fullTree = new RecursiveIteratorIterator($directory);
$phpFiles = new RegexIterator($fullTree, '/.+((?&lt;!Test)+\.php$)/i', RecursiveRegexIterator::GET_MATCH);

foreach ($phpFiles as $key =&gt; $file) {
require_once $file[0];
}
?&gt;

[include](#function.include) y [opcache_compile_file()](#function.opcache-compile-file) funcionarán ambos, pero tienen
implicaciones diferentes en la forma en que el código es gestionado.

- [include](#function.include) ejecutará el código del fichero,
  mientras que [opcache_compile_file()](#function.opcache-compile-file) no lo hará. Esto significa que solo el primero soporta
  la declaración condicional (las funciones declaradas dentro de un bloque if).

- Debido a que [include](#function.include) ejecutará el código, los ficheros incluidos de manera
  anidada también serán analizados y sus declaraciones precargadas.

- [opcache_compile_file()](#function.opcache-compile-file) puede cargar ficheros en cualquier orden. Es decir, si
  a.php define la clase A y b.php define la clase
  B que extiende A, entonces [opcache_compile_file()](#function.opcache-compile-file) puede
  cargar estos dos ficheros en cualquier orden. Al utilizar [include](#function.include), sin embargo,
  a.php _debe_ ser incluido primero.

- En ambos casos, si un script posterior incluye un fichero que ya ha sido precargado, entonces
  su contenido siempre se ejecutará, pero los símbolos que define no se volverán a definir. El uso de
  [include_once](#function.include-once) no evitará que el fichero sea incluido una segunda vez. Puede ser necesario
  cargar un fichero nuevamente para incluir las constantes globales definidas en él, ya que no son
  gestionadas por la precarga.

Cuál enfoque es el mejor depende, por lo tanto, del comportamiento deseado. Con código que utilizaría de otro modo un
cargador automático, [opcache_compile_file()](#function.opcache-compile-file) permite una mayor flexibilidad. Con código que sería
cargado manualmente de otro modo, [include](#function.include) será más robusto.

# Funciones de OPcache

# opcache_compile_file

(PHP 5 &gt;= 5.5.5, PHP 7, PHP 8, PECL ZendOpcache &gt; 7.0.2)

opcache_compile_file — Compila y almacena en caché un script PHP sin ejecutarlo

### Descripción

**opcache_compile_file**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Esta función compila un script PHP y lo añade a la caché de opcode sin ejecutarlo.
Esto puede ser utilizado para llenar una caché después de un reinicio del servidor
precargando los ficheros que van a ser utilizados.

### Parámetros

    filename


      La ruta de acceso al fichero PHP a compilar y almacenar en caché.


### Valores devueltos

Devuelve **[true](#constant.true)** si filename ha sido compilado con éxito
o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si filename no puede ser cargado o compilado, se genera un error de tipo
**[E_WARNING](#constant.e-warning)**. Puede utilizarse
[@](#language.operators.errorcontrol) para suprimirlo.

### Ver también

    - [opcache_invalidate()](#function.opcache-invalidate) - Invalida un script almacenado en caché

# opcache_get_configuration

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8, PECL ZendOpcache &gt; 7.0.2)

opcache_get_configuration — Recupera la información de configuración del caché

### Descripción

**opcache_get_configuration**(): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve la información de configuración de la instancia
del caché.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de información, incluyendo ini, lista negra y versión.

### Errores/Excepciones

Si opcache.restrict_api es utilizado y la ruta de acceso actual
viola las reglas, se emitirá una advertencia de nivel E_WARNING;
no se devolverá ninguna información de estado.

### Ver también

    - [opcache_get_status()](#function.opcache-get-status) - Obtiene información sobre el estado del caché

# opcache_get_status

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8, PECL ZendOpcache &gt; 7.0.2)

opcache_get_status — Obtiene información sobre el estado del caché

### Descripción

**opcache_get_status**([bool](#language.types.boolean) $include_scripts = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve información sobre el estado de la instancia del caché en memoria.
No devuelve información sobre el caché de ficheros.

### Parámetros

    include_scripts


      Incluye información específica de los scripts.


### Valores devueltos

Devuelve un array de información, que opcionalmente contiene información específica de estado de un script,
o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si opcache.restrict_api está en uso y la ruta actual viola las reglas, se emitirá una advertencia E_WARNING;
no se devolverá ninguna información de estado.

### Historial de cambios

      Versión
      Descripción






      PHP 8.3.0

       opcache_get_status()['scripts'][n]['revalidate']
       contiene ahora un timestamp Unix que indica cuándo se prevé la próxima revalidación del timestamp de los scripts,
       según lo dictado por la directiva INI [opcache.revalidate_freq](#ini.opcache.revalidate-freq).



### Ejemplos

**Ejemplo #1 Un ejemplo de opcache_get_status()**

&lt;?php
var_dump(opcache_get_status());
?&gt;

Resultado del ejemplo anterior es similar a:

array(9) {
'opcache_enabled' =&gt;
bool(true)
'cache_full' =&gt;
bool(false)
'restart_pending' =&gt;
bool(false)
'restart_in_progress' =&gt;
bool(false)
'memory_usage' =&gt;
array(4) {
'used_memory' =&gt;
int(9167936)
'free_memory' =&gt;
int(125049792)
'wasted_memory' =&gt;
int(0)
'current_wasted_percentage' =&gt;
double(0)
}
'interned_strings_usage' =&gt;
array(4) {
'buffer_size' =&gt;
int(8388608)
'used_memory' =&gt;
int(2593616)
'free_memory' =&gt;
int(5794992)
'number_of_strings' =&gt;
int(10358)
}
'opcache_statistics' =&gt;
array(13) {
'num_cached_scripts' =&gt;
int(0)
'num_cached_keys' =&gt;
int(0)
'max_cached_keys' =&gt;
int(16229)
'hits' =&gt;
int(0)
'start_time' =&gt;
int(1733310010)
'last_restart_time' =&gt;
int(0)
'oom_restarts' =&gt;
int(0)
'hash_restarts' =&gt;
int(0)
'manual_restarts' =&gt;
int(0)
'misses' =&gt;
int(0)
'blacklist_misses' =&gt;
int(0)
'blacklist_miss_ratio' =&gt;
double(0)
'opcache_hit_rate' =&gt;
double(0)
}
'scripts' =&gt;
array(0) {
}
'jit' =&gt;
array(7) {
'enabled' =&gt;
bool(false)
'on' =&gt;
bool(false)
'kind' =&gt;
int(5)
'opt_level' =&gt;
int(4)
'opt_flags' =&gt;
int(6)
'buffer_size' =&gt;
int(0)
'buffer_free' =&gt;
int(0)
}
}

### Ver también

    - [opcache_get_configuration()](#function.opcache-get-configuration) - Recupera la información de configuración del caché

# opcache_invalidate

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8, PECL ZendOpcache &gt;= 7.0.0)

opcache_invalidate — Invalida un script almacenado en caché

### Descripción

**opcache_invalidate**([string](#language.types.string) $filename, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [bool](#language.types.boolean)

Esta función invalida un script particular desde el caché opcode.
Si el argumento force no está definido o vale **[false](#constant.false)**,
el script solo se invalidará si la fecha/hora de modificación del script
es más reciente que el opcode en caché.
Esta función solo invalida el caché en memoria y no el caché de ficheros.

### Parámetros

    filename


      La ruta de acceso al script a invalidar.






    force


      Si vale **[true](#constant.true)**, el script se invalidará independientemente de si
      la invalidación es necesaria o no.


### Valores devueltos

Devuelve **[true](#constant.true)** si el caché opcode para el filename
ha sido invalidado, o si no había nada que invalidar, o bien **[false](#constant.false)**
si el caché opcode está desactivado.

### Ver también

    - [opcache_compile_file()](#function.opcache-compile-file) - Compila y almacena en caché un script PHP sin ejecutarlo

    - [opcache_reset()](#function.opcache-reset) - Reinicia el contenido del cache opcode

# opcache_is_script_cached

(PHP 5 &gt;= 5.5.11, PHP 7, PHP 8, PECL ZendOpcache &gt;= 7.0.4)

opcache_is_script_cached — Indica si un script está en el caché de OPCache

### Descripción

**opcache_is_script_cached**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Esta función verifica si un script PHP ha sido almacenado en el caché de OPCache.
Esto puede ser utilizado para detectar fácilmente las "alertas" del caché para
un script en particular.
Esta función solo verifica el caché en memoria, no el caché de ficheros.

### Parámetros

    filename


      La ruta de acceso al script PHP a verificar.


### Valores devueltos

Retorna **[true](#constant.true)** si el script filename está presente en el
caché de OPCache, **[false](#constant.false)** en caso contrario.

### Ver también

    - [opcache_compile_file()](#function.opcache-compile-file) - Compila y almacena en caché un script PHP sin ejecutarlo

# opcache_reset

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8, PECL ZendOpcache &gt;= 7.0.0)

opcache_reset — Reinicia el contenido del cache opcode

### Descripción

**opcache_reset**(): [bool](#language.types.boolean)

Esta función reinicia el cache opcode en su totalidad.
Tras la llamada a la función **opcache_reset()**,
todos los scripts serán recargados y reanalizados en sus próximos
llamados. Esta función solo reinicia el cache en memoria,
no el cache de los ficheros.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el cache opcode ha sido reiniciado, o **[false](#constant.false)**
si el cache opcode está desactivado o si el reinicio está pendiente o en curso (ver [opcache_get_status()](#function.opcache-get-status)).

### Ver también

    - [opcache_get_status()](#function.opcache-get-status) - Obtiene información sobre el estado del caché

## Tabla de contenidos

- [opcache_compile_file](#function.opcache-compile-file) — Compila y almacena en caché un script PHP sin ejecutarlo
- [opcache_get_configuration](#function.opcache-get-configuration) — Recupera la información de configuración del caché
- [opcache_get_status](#function.opcache-get-status) — Obtiene información sobre el estado del caché
- [opcache_invalidate](#function.opcache-invalidate) — Invalida un script almacenado en caché
- [opcache_is_script_cached](#function.opcache-is-script-cached) — Indica si un script está en el caché de OPCache
- [opcache_reset](#function.opcache-reset) — Reinicia el contenido del cache opcode

- [Introducción](#intro.opcache)
- [Instalación/Configuración](#opcache.setup)<li>[Instalación](#opcache.installation)
- [Configuración en tiempo de ejecución](#opcache.configuration)
  </li>- [Precarga](#opcache.preloading)
- [Funciones de OPcache](#ref.opcache)<li>[opcache_compile_file](#function.opcache-compile-file) — Compila y almacena en caché un script PHP sin ejecutarlo
- [opcache_get_configuration](#function.opcache-get-configuration) — Recupera la información de configuración del caché
- [opcache_get_status](#function.opcache-get-status) — Obtiene información sobre el estado del caché
- [opcache_invalidate](#function.opcache-invalidate) — Invalida un script almacenado en caché
- [opcache_is_script_cached](#function.opcache-is-script-cached) — Indica si un script está en el caché de OPCache
- [opcache_reset](#function.opcache-reset) — Reinicia el contenido del cache opcode
  </li>
