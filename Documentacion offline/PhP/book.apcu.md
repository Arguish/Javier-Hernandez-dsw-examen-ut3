# APC User Cache

## Introducción
APCu es un array asociativo almacenado en memoria para PHP. Las claves son de tipo `string` y los valores pueden ser variables PHP de cualquier tipo. APCu solo gestiona la caché de variables del espacio de usuario.

La caché APCu es por proceso bajo Windows, por lo que al utilizar un SAPI basado en procesos (en lugar de en hilos), no será compartida entre diferentes procesos.

APCu es APC sin la caché de código operativo. La primera versión es 4.0.0, fue un ramificado del código de la cabeza de la rama principal de APC de la época. El soporte para PHP 7 está disponible a partir de APCu 5.0.0. El soporte para PHP 8 está disponible a partir de APCu 5.1.19.

## Instalación/Configuración
- Información sobre la instalación de estas extensiones PECL puede ser encontrada en el manual de [Instalación de extensiones PECL](https://pecl.php.net/package/apcu).
- Para retrocompatibilidad con APC en PHP 7, existe el módulo separado [apcu-bc](https://pecl.php.net/apcu_bc).
- En Windows, APCu requiere un directorio temporal donde el servidor web pueda escribir.

## Configuración en tiempo de ejecución
El comportamiento de APCu se configura en el archivo `php.ini`. El parámetro más importante es `apc.shm_size`, que define el tamaño de memoria asignado. El script `apc.php` puede analizar el funcionamiento interno de APCu.

### Opciones principales:
- `apc.enabled`: Activa o desactiva APCu.
- `apc.shm_segments`: Número de segmentos de memoria compartida.
- `apc.shm_size`: Tamaño de cada segmento de memoria compartida.
- `apc.entries_hint`: Indicio sobre el número de variables distintas a almacenar.
- `apc.ttl`: Tiempo de vida de las entradas en caché.
- `apc.gc_ttl`: Tiempo de vida en la lista de recolección de basura.
- `apc.mmap_file_mask`: Máscara para MMAP.
- `apc.slam_defense`: Defensa contra múltiples procesos.
- `apc.enable_cli`: Activa APCu en CLI.
- `apc.serializer`: Serializador de terceros.
- `apc.coredump_unmap`: Gestión de señales para core dump.
- `apc.preload_path`: Ruta de precarga.
- `apc.use_request_time`: Usa el tiempo de inicio de la solicitud para TTL.

## Constantes predefinidas
APCu define varias constantes para iteradores y listas, como `APC_ITER_ALL`, `APC_ITER_KEY`, `APC_LIST_ACTIVE`, etc.

## Funciones principales
- `apcu_add($key, $var, $ttl = 0)`: Almacena una variable en caché si no existe.
- `apcu_cache_info($limited = false)`: Recupera información y metadatos del almacén de datos.
- `apcu_cas($key, $old, $new)`: Actualiza un valor si coincide con el valor antiguo.
- `apcu_clear_cache()`: Limpia el caché.
- `apcu_dec($key, $step = 1, &$success = null, $ttl = 0)`: Disminuye un valor almacenado.

## Ejemplo
```php
<?php
$bar = 'BAR';
apcu_add('foo', $bar);
var_dump(apcu_fetch('foo'));
?>
```

## Referencias
- [Documentación oficial APCu](https://www.php.net/manual/es/book.apcu.php)
- [GitHub APCu](https://github.com/krakjoe/apcu)
