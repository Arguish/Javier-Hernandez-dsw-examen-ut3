# Mhash

# Introducción

Estas funciones han sido previstas para funcionar con
[» mhash](http://mhash.sourceforge.net/). Mhash puede ser utilizada para crear una
suma de verificación, un hash y mucho más.

Este conjunto de funciones representa una interfaz con la biblioteca mhash.
Mhash acepta un gran número de algoritmos diferentes, tales como MD5,
SHA1, GOST y muchos otros. Para una lista completa de los hashes soportados,
refiérase a la [página sobre las constantes](#mhash.constants).
La regla general es que se puede acceder a un algoritmo desde PHP con la constante
**[MHASH_hashname](#constant.mhash-hashname)**. Por ejemplo, para acceder al algoritmo TIGER,
se puede utilizar la constante PHP **[MHASH_TIGER](#constant.mhash-tiger)**.

**Nota**:

    Esta extensión está obsoleta. Utilice la extensión
    [Hash](#book.hash) en su lugar.

**Nota**:

    A partir de PHP 7.0.0 la extensión Mhash ha sido completamente integrada en
    la extensión [Hash](#book.hash). Por consiguiente, ya no es
    posible detectar el soporte de Mhash gracias a **
    extension_loaded()**; utilice [function_exists()](#function.function-exists) en
    su lugar. Además, Mhash ya no es señalado por **
    get_loaded_extensions()** y las funcionalidades relacionadas.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mhash.requirements)
- [Instalación](#mhash.installation)

    ## Requerimientos

    Para utilizarlo, descargue las distribuciones de mhash desde
    este [» sitio web](http://mhash.sourceforge.net/) y siga las instrucciones
    de instalación incluidas.

## Instalación

Será necesario compilar PHP con la opción
**--with-mhash[=DIR]**
para activar esta extensión. DIR es la ruta
del directorio de instalación de la biblioteca MHASH.

Desde PHP 5.3.0, la extensión mhash es emulada a través de la extensión
[Hash](#ref.hash). Asimismo, la opción que permite
especificar el directorio de instalación de mhash ya no tiene
efecto, y esta extensión requiere la instalación de la extensión hash
para funcionar.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

A continuación se presenta una lista de los modos que son soportados por mhash.
Si un modo no está listado aquí, pero está listado en la documentación
mhash como soportado, se puede considerar que esta lista
no está actualizada.

    **[MHASH_ADLER32](#constant.mhash-adler32)**
    ([int](#language.types.integer))







    **[MHASH_CRC32](#constant.mhash-crc32)**
    ([int](#language.types.integer))







    **[MHASH_CRC32B](#constant.mhash-crc32b)**
    ([int](#language.types.integer))







    **[MHASH_CRC32C](#constant.mhash-crc32c)**
    ([int](#language.types.integer))


    Disponible a partir de PHP 7.4.0.




    **[MHASH_FNV132](#constant.mhash-fnv132)**
    ([int](#language.types.integer))







    **[MHASH_FNV1A32](#constant.mhash-fnv1a32)**
    ([int](#language.types.integer))







    **[MHASH_FNV164](#constant.mhash-fnv164)**
    ([int](#language.types.integer))







    **[MHASH_FNV1A64](#constant.mhash-fnv1a64)**
    ([int](#language.types.integer))







    **[MHASH_GOST](#constant.mhash-gost)**
    ([int](#language.types.integer))







    **[MHASH_HAVAL128](#constant.mhash-haval128)**
    ([int](#language.types.integer))







    **[MHASH_HAVAL160](#constant.mhash-haval160)**
    ([int](#language.types.integer))







    **[MHASH_HAVAL192](#constant.mhash-haval192)**
    ([int](#language.types.integer))







    **[MHASH_HAVAL224](#constant.mhash-haval224)**
    ([int](#language.types.integer))







    **[MHASH_HAVAL256](#constant.mhash-haval256)**
    ([int](#language.types.integer))







    **[MHASH_JOAAT](#constant.mhash-joaat)**
    ([int](#language.types.integer))







    **[MHASH_MD2](#constant.mhash-md2)**
    ([int](#language.types.integer))







    **[MHASH_MD4](#constant.mhash-md4)**
    ([int](#language.types.integer))







    **[MHASH_MD5](#constant.mhash-md5)**
    ([int](#language.types.integer))







    **[MHASH_MURMUR3A](#constant.mhash-murmur3a)**
    ([int](#language.types.integer))


    Disponible desde PHP 8.1.0.




    **[MHASH_MURMUR3C](#constant.mhash-murmur3c)**
    ([int](#language.types.integer))


    Disponible desde PHP 8.1.0.




         **[MHASH_MURMUR3F](#constant.mhash-murmur3f)**
         ([int](#language.types.integer))


         Disponible desde PHP 8.1.0.




         **[MHASH_RIPEMD128](#constant.mhash-ripemd128)**
         ([int](#language.types.integer))







         **[MHASH_RIPEMD160](#constant.mhash-ripemd160)**
         ([int](#language.types.integer))







         **[MHASH_RIPEMD256](#constant.mhash-ripemd256)**
         ([int](#language.types.integer))







         **[MHASH_RIPEMD320](#constant.mhash-ripemd320)**
         ([int](#language.types.integer))







         **[MHASH_SHA1](#constant.mhash-sha1)**
         ([int](#language.types.integer))







         **[MHASH_SHA224](#constant.mhash-sha224)**
         ([int](#language.types.integer))







         **[MHASH_SHA256](#constant.mhash-sha256)**
         ([int](#language.types.integer))







         **[MHASH_SHA384](#constant.mhash-sha384)**
         ([int](#language.types.integer))







         **[MHASH_SHA512](#constant.mhash-sha512)**
         ([int](#language.types.integer))







         **[MHASH_SNEFRU128](#constant.mhash-snefru128)**
         ([int](#language.types.integer))







         **[MHASH_SNEFRU256](#constant.mhash-snefru256)**
         ([int](#language.types.integer))







         **[MHASH_TIGER](#constant.mhash-tiger)**
         ([int](#language.types.integer))







         **[MHASH_TIGER128](#constant.mhash-tiger128)**
         ([int](#language.types.integer))







         **[MHASH_TIGER160](#constant.mhash-tiger160)**
         ([int](#language.types.integer))







         **[MHASH_WHIRLPOOL](#constant.mhash-whirlpool)**
         ([int](#language.types.integer))





# Ejemplos

**Ejemplo #1 Calcule el MD5 y el hmac, luego lo muestra como un hexadecimal**

&lt;?php
$input = "what do ya want for nothing?";
$hash = mhash(MHASH_MD5, $input);
echo "El hash vale " . bin2hex($hash) . "&lt;br /&gt;\n";
$hash = mhash(MHASH_MD5, $input, "Jefe");
echo "El hmac vale " . bin2hex($hash) . "&lt;br /&gt;\n";
?&gt;

El ejemplo anterior mostrará:

El hash vale d03cb659cbf9192dcd066272249f8412
El hmac vale 750c783e6ab0b503eaa86e310a5db738

# Funciones Mhash

# mhash

(PHP 4, PHP 5, PHP 7, PHP 8)

mhash — Calcula un hash

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**mhash**([int](#language.types.integer) $algo, [string](#language.types.string) $data, [?](#language.types.null)[string](#language.types.string) $key = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**mhash()** aplica la función de hash
algo a los datos data.

### Parámetros

     algo


       El identificador del hash. Uno de los constantes
       **[MHASH_hashname](#constant.mhash-hashname)**.






     data


       La entrada del usuario, en forma de [string](#language.types.string).






     key


       Especificado, la función devolverá el HMAC resultante. HMAC es un hash indexado
       utilizado para la identificación de mensaje, o bien un simple informe de
       mensaje, según la clave especificada. Algunos algoritmos soportados en
       mhash no son compatibles con el modo HMAC.





### Valores devueltos

Devuelve el hash resultante (también llamado "digest") o HMAC, en forma de
[string](#language.types.string) o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido deprecada.
        Utilizar las [funciones hash_*()](#ref.hash) en su lugar.




       8.0.0

        key es ahora nullable.





# mhash_count

(PHP 4, PHP 5, PHP 7, PHP 8)

mhash_count — Recupera el identificador máximo de hash

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**mhash_count**(): [int](#language.types.integer)

Recupera el identificador máximo de hash.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de hash máximo.
Los hashes están numerados de 0 hasta este identificador.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido deprecada.
        Utilizar las [funciones hash_*()](#ref.hash) en su lugar.





### Ejemplos

    **Ejemplo #1 Recorrer la lista de hashes**

&lt;?php

$nr = mhash_count();

for ($i = 0; $i &lt;= $nr; $i++) {
    echo sprintf("El tamaño de bloque de %s es %d\n",
        mhash_get_hash_name($i),
mhash_get_block_size($i));
}
?&gt;

# mhash_get_block_size

(PHP 4, PHP 5, PHP 7, PHP 8)

mhash_get_block_size — Devuelve el tamaño del bloque del hash

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**mhash_get_block_size**([int](#language.types.integer) $algo): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tamaño del bloque del algo especificado.

### Parámetros

     algo


       El identificador del hash. Una de las constantes **[MHASH_hashname](#constant.mhash-hashname)**.





### Valores devueltos

Devuelve el tamaño, en bytes, o **[false](#constant.false)** si el algo
no existe.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido deprecada.
        Utilizar las [funciones hash_*()](#ref.hash) en su lugar.





### Ejemplos

    **Ejemplo #1 Ejemplo con mhash_get_block_size()**

&lt;?php

echo mhash_get_block_size(MHASH_MD5); // 16

?&gt;

# mhash_get_hash_name

(PHP 4, PHP 5, PHP 7, PHP 8)

mhash_get_hash_name — Devuelve el nombre del hash

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**mhash_get_hash_name**([int](#language.types.integer) $algo): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre del algo especificado.

### Parámetros

     algo


       El identificador del hash. Una de las constantes **[MHASH_hashname](#constant.mhash-hashname)**.





### Valores devueltos

Devuelve el nombre del hash o **[false](#constant.false)** si el hash no existe.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido deprecada.
        Utilizar las [funciones hash_*()](#ref.hash) en su lugar.





### Ejemplos

    **Ejemplo #1 Ejemplo con mhash_get_hash_name()**

&lt;?php

echo mhash_get_hash_name(MHASH_MD5); // MD5

?&gt;

# mhash_keygen_s2k

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

mhash_keygen_s2k — Genera una clave

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**mhash_keygen_s2k**(
    [int](#language.types.integer) $algo,
    [string](#language.types.string) $password,
    [string](#language.types.string) $salt,
    [int](#language.types.integer) $length
): [string](#language.types.string)|[false](#language.types.singleton)

Genera una clave según el algo proporcionado,
utilizando la contraseña password
proporcionada.

Esta función utiliza el algoritmo Salted S2K, especificado
en OpenPGP ([» RFC 2440](https://datatracker.ietf.org/doc/html/rfc2440)).

Es importante tener en cuenta que las contraseñas proporcionadas por los usuarios
no son recomendadas para generar claves criptográficas,
dado que los usuarios normales recuerdan contraseñas que pueden teclear. Estas contraseñas
utilizan solo 6 a 7 de los 8 bits de un carácter (o incluso menos). Se recomienda encarecidamente
aplicar una función de transformación (como esta) a una contraseña de usuario.

### Parámetros

     algo


       El identificador del hash utilizado para crear la clave.
       Una de las constantes **[MHASH_hashname](#constant.mhash-hashname)**.






     password


       Contraseña proporcionada por el usuario.






     salt


       Debe ser diferente y suficientemente aleatorio para cada
       clave que se genera, a fin de crear claves diferentes.
       Dado que el parámetro salt
       debe ser conocido cuando se verifican las claves, es una
       buena idea añadirlo a la clave. El parámetro salt debe tener
       una longitud de 8 bytes, y se rellenará con ceros si se proporciona uno de menor tamaño.






     length


       La longitud de la clave, en bytes.





### Valores devueltos

Devuelve la clave generada, en forma de [string](#language.types.string), o
**[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido deprecada.
        Utilizar las [funciones hash_*()](#ref.hash) en su lugar.





## Tabla de contenidos

- [mhash](#function.mhash) — Calcula un hash
- [mhash_count](#function.mhash-count) — Recupera el identificador máximo de hash
- [mhash_get_block_size](#function.mhash-get-block-size) — Devuelve el tamaño del bloque del hash
- [mhash_get_hash_name](#function.mhash-get-hash-name) — Devuelve el nombre del hash
- [mhash_keygen_s2k](#function.mhash-keygen-s2k) — Genera una clave

- [Introducción](#intro.mhash)
- [Instalación/Configuración](#mhash.setup)<li>[Requerimientos](#mhash.requirements)
- [Instalación](#mhash.installation)
  </li>- [Constantes predefinidas](#mhash.constants)
- [Ejemplos](#mhash.examples)
- [Funciones Mhash](#ref.mhash)<li>[mhash](#function.mhash) — Calcula un hash
- [mhash_count](#function.mhash-count) — Recupera el identificador máximo de hash
- [mhash_get_block_size](#function.mhash-get-block-size) — Devuelve el tamaño del bloque del hash
- [mhash_get_hash_name](#function.mhash-get-hash-name) — Devuelve el nombre del hash
- [mhash_keygen_s2k](#function.mhash-keygen-s2k) — Genera una clave
  </li>
