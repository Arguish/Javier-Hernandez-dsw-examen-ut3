# Yac

# Introducción

Yac (Otro caché), es un caché de datos de usuario de memoria compartida sin bloqueo, podría utilizarse para reemplazar el APC, el memcache local.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#yac.requirements)
- [Instalación](#yac.installation)
- [Configuración en tiempo de ejecución](#yac.configuration)
- [Tipos de recursos](#yac.resources)

    ## Requerimientos

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/yac](https://pecl.php.net/package/yac).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Yac Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [yac.compress_threshold](#ini.yac.compress-threshold)
      -1
      **[INI_SYSTEM](#constant.ini-system)**




      [yac.debug](#ini.yac.debug)
      0
      **[INI_ALL](#constant.ini-all)**




      [yac.enable](#ini.yac.enable)
      1
      **[INI_SYSTEM](#constant.ini-system)**




      [yac.enable_cli](#ini.yac.enable-cli)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [yac.keys_memory_size](#ini.yac.keys-memory-size)
      4M
      **[INI_SYSTEM](#constant.ini-system)**




      [yac.serializer](#ini.yac.serializer)
      php
      **[INI_SYSTEM](#constant.ini-system)**




      [yac.values_memory_size](#ini.yac.values-memory-size)
      64M
      **[INI_SYSTEM](#constant.ini-system)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      yac.compress_threshold
      [int](#language.types.integer)











      yac.debug
      [int](#language.types.integer)











      yac.enable
      [int](#language.types.integer)











      yac.enable_cli
      [int](#language.types.integer)











      yac.keys_memory_size
      [string](#language.types.string)











      yac.serializer
      [string](#language.types.string)











      yac.values_memory_size
      [string](#language.types.string)









## Tipos de recursos

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[YAC_VERSION](#constant.yac-version)**
     ([string](#language.types.string))








     **[YAC_MAX_KEY_LEN](#constant.yac-max-key-len)**
     ([int](#language.types.integer))



      La longitud máxima de una clave podría ser, es de 48 bytes.





     **[YAC_MAX_VALUE_RAW_LEN](#constant.yac-max-value-raw-len)**
     ([int](#language.types.integer))








     **[YAC_MAX_RAW_COMPRESSED_LEN](#constant.yac-max-raw-compressed-len)**
     ([int](#language.types.integer))








     **[YAC_SERIALIZER_PHP](#constant.yac-serializer-php)**
     ([int](#language.types.integer))



      Usa php serialize como serializador





     **[YAC_SERIALIZER_JSON](#constant.yac-serializer-json)**
     ([int](#language.types.integer))



      Usa json como serializador (requrie --enable-json)





     **[YAC_SERIALIZER_IGBINARY](#constant.yac-serializer-igbinary)**
     ([int](#language.types.integer))



      Usa igbinary como serializador (require --enable-igbinary)





     **[YAC_SERIALIZER_MSGPACK](#constant.yac-serializer-msgpack)**
     ([int](#language.types.integer))



      Usa msgpack como serializador (require --enable-msgpack)





     **[YAC_SERIALIZER](#constant.yac-serializer)**
     ([string](#language.types.string))



       Qué serializador está yac usando


# La clase Yac

(PECL yac &gt;= 1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yac**

     {

    /* Propiedades */

     protected
      [$_prefix](#yac.props.prefix);



    /* Métodos */

public [\_\_construct](#yac.construct)([string](#language.types.string) $prefix = "")

    public [add](#yac.add)([string](#language.types.string) $keys, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

public [add](#yac.add)([array](#language.types.array) $key_vals): [bool](#language.types.boolean)
public [delete](#yac.delete)([string](#language.types.string)|[array](#language.types.array) $keys, [int](#language.types.integer) $ttl = ?): [bool](#language.types.boolean)
public [dump](#yac.dump)([int](#language.types.integer) $$num): [mixed](#language.types.mixed)
public [flush](#yac.flush)(): [bool](#language.types.boolean)
public [get](#yac.get)([string](#language.types.string)|[array](#language.types.array) $key, [int](#language.types.integer) &amp;$cas = **[null](#constant.null)**): [mixed](#language.types.mixed)
public [\_\_get](#yac.getter)([string](#language.types.string) $key): [mixed](#language.types.mixed)
public [info](#yac.info)(): [array](#language.types.array)
public [set](#yac.set)([string](#language.types.string) $keys, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)
public [add](#yac.add)([array](#language.types.array) $key_vals): [bool](#language.types.boolean)
public [\_\_set](#yac.setter)([string](#language.types.string) $keys, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

}

## Propiedades

     _prefix






# Yac::add

(PECL yac &gt;= 1.0.0)

Yac::add — Guardar en caché

### Descripción

public **Yac::add**([string](#language.types.string) $keys, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

public **Yac::add**([array](#language.types.array) $key_vals): [bool](#language.types.boolean)

    Añadir un artículo al caché.

### Parámetros

    keys


       [string](#language.types.string) clave






    value


      valor mixto, Todo tipo de valor php podría ser almacenado excepto [resource](#language.types.resource)






    ttl


      tiempo de expiración


### Valores devueltos

[bool](#language.types.boolean), **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** en caso de fallar.

**Nota**:

     **Yac::add()** puede fallar si el casillero no se puede obtener,
     así que, si necesitas que el valor se almacene correctamente, puedes escribir códigos como:



      **Ejemplo #1 Asegúrate de que el artículo se almacene**



       while(!$yac-&gt;set("key", "vale));




# Yac::\_\_construct

(PECL yac &gt;= 1.0.0)

Yac::\_\_construct — Constructor

### Descripción

public **Yac::\_\_construct**([string](#language.types.string) $prefix = "")

    se utiliza un prefijo para preparar las claves, esto podría utilizarse para evitar conflictos entre aplicaciones.

### Parámetros

    prefix


       [string](#language.types.string) prefix


### Errores/Excepciones

Lanza una [Exception](#class.exception) si Yac no está habilitado. Lanza
[Exception](#class.exception) si prefix excede
la longitud máxima de clave de 48 (**[YAC_MAX_KEY_LEN](#constant.yac-max-key-len)**) bytes.

# Yac::delete

(PECL yac &gt;= 1.0.0)

Yac::delete — Eliminar los artículos de la memoria caché

### Descripción

public **Yac::delete**([string](#language.types.string)|[array](#language.types.array) $keys, [int](#language.types.integer) $ttl = ?): [bool](#language.types.boolean)

retira los artículos de la memoria caché

### Parámetros

    keys


      clave string, o array de multiples claves para ser removidas.






    ttl


      si se establece un retraso, la eliminación marcará los elementos como inválidos en ttl segundo.


### Valores devueltos

# Yac::dump

(PECL yac &gt;= 1.0.0)

Yac::dump — Volcar cache

### Descripción

public **Yac::dump**([int](#language.types.integer) $$num): [mixed](#language.types.mixed)

Volcar valores almacenados en caché

### Parámetros

    num


       El número máximo de artículos debe ser devuelto


### Valores devueltos

mixed

# Yac::flush

(PECL yac &gt;= 1.0.0)

Yac::flush — Limpiar el caché

### Descripción

public **Yac::flush**(): [bool](#language.types.boolean)

    Eliminar todos los valores almacenados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

bool, siempre true

# Yac::get

(PECL yac &gt;= 1.0.0)

Yac::get — Recuperar los valores de caché

### Descripción

public **Yac::get**([string](#language.types.string)|[array](#language.types.array) $key, [int](#language.types.integer) &amp;$cas = **[null](#constant.null)**): [mixed](#language.types.mixed)

    Recuperar los valores de caché

### Parámetros

    key


      claves [string](#language.types.string), o [array](#language.types.array) de multiples claves.






    cas


      Si no es **[null](#constant.null)**, se ajustará al caso del artículo recuperado.


### Valores devueltos

mixed en caso de éxito, false en caso de error

# Yac::\_\_get

(PECL yac &gt;= 1.0.0)

Yac::\_\_get — Getter

### Descripción

public **Yac::\_\_get**([string](#language.types.string) $key): [mixed](#language.types.mixed)

    Recupera los valores del caché

### Parámetros

    key


       clave [string](#language.types.string)


### Valores devueltos

mixed en caso de éxito, **[null](#constant.null)** en caso de error.

# Yac::info

(PECL yac &gt;= 1.0.0)

Yac::info — Estado del caché

### Descripción

public **Yac::info**(): [array](#language.types.array)

    Obtener el estado del sistema de caché

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array, consistente con:
"memory_size", "slots_memory_size", "values_memory_size", "segment_size", "segment_num",
"miss", "hits", "fails", "kicks", "recycles", "slots_size", "slots_used"

# Yac::set

(PECL yac &gt;= 1.0.0)

Yac::set — Guardar en el caché

### Descripción

public **Yac::set**([string](#language.types.string) $keys, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

public [Yac::add](#yac.add)([array](#language.types.array) $key_vals): [bool](#language.types.boolean)

    Añade un elemento a la caché, si la clave ya existe, se sobreescribe.

### Parámetros

    keys


       clave [string](#language.types.string)






    value


      valor mixed, Todo tipo de valor php podría ser almacenado excepto [resource](#language.types.resource)






    ttl


      tiempo de expiración


### Valores devueltos

el valor de sí mismo

# Yac::\_\_set

(PECL yac &gt;= 1.0.0)

Yac::\_\_set — Setter

### Descripción

public **Yac::\_\_set**([string](#language.types.string) $keys, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

    almacena un elemento en el caché

### Parámetros

    keys


       clave [string](#language.types.string)






    value


      valor mixed, Todo tipo de valor php podría ser almacenado excepto [resource](#language.types.resource)


### Valores devueltos

Siempre devuelve el valor de sí mismo

## Tabla de contenidos

- [Yac::add](#yac.add) — Guardar en caché
- [Yac::\_\_construct](#yac.construct) — Constructor
- [Yac::delete](#yac.delete) — Eliminar los artículos de la memoria caché
- [Yac::dump](#yac.dump) — Volcar cache
- [Yac::flush](#yac.flush) — Limpiar el caché
- [Yac::get](#yac.get) — Recuperar los valores de caché
- [Yac::\_\_get](#yac.getter) — Getter
- [Yac::info](#yac.info) — Estado del caché
- [Yac::set](#yac.set) — Guardar en el caché
- [Yac::\_\_set](#yac.setter) — Setter

- [Introducción](#intro.yac)
- [Instalación/Configuración](#yac.setup)<li>[Requerimientos](#yac.requirements)
- [Instalación](#yac.installation)
- [Configuración en tiempo de ejecución](#yac.configuration)
- [Tipos de recursos](#yac.resources)
  </li>- [Constantes predefinidas](#yac.constants)
- [Yac](#class.yac) — La clase Yac<li>[Yac::add](#yac.add) — Guardar en caché
- [Yac::\_\_construct](#yac.construct) — Constructor
- [Yac::delete](#yac.delete) — Eliminar los artículos de la memoria caché
- [Yac::dump](#yac.dump) — Volcar cache
- [Yac::flush](#yac.flush) — Limpiar el caché
- [Yac::get](#yac.get) — Recuperar los valores de caché
- [Yac::\_\_get](#yac.getter) — Getter
- [Yac::info](#yac.info) — Estado del caché
- [Yac::set](#yac.set) — Guardar en el caché
- [Yac::\_\_set](#yac.setter) — Setter
  </li>
