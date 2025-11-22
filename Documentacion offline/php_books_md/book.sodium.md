# Sodium

# Introducción

Sodium es una biblioteca moderna y fácil de usar para el cifrado, descifrado, firmas y hashing de contraseñas, entre otros.
Su objetivo es proporcionar todas las operaciones básicas necesarias para la construcción de herramientas criptográficas de nivel superior.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#sodium.requirements)
- [Instalación](#sodium.installation)

    ## Requerimientos

    Esta extensión requiere [» libsodium](https://libsodium.org/)
    ≥ 1.0.8.

    ## Instalación

    A partir de PHP 7.2.0 esta extensión se proporciona con PHP. Para las versiones
    de PHP más antiguas esta extensión está disponible a través de PECL.

    ## Sistemas Linux

        Para poder utilizar esta extensión se debe compilar PHP con el soporte
        de sodium utilizando la opción de configuración
        **--with-sodium[=DIR]**.

    ## Windows

        Para poder utilizar esta extensión se debe añadir
        extension=php_sodium.dll al php.ini.

    ## Instalación a través de PECL

        Información sobre la instalación de estas extensiones PECL
            puede ser encontrada en el capítulo del manual titulado [Instalación

    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/libsodium](https://pecl.php.net/package/libsodium)

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SODIUM_LIBRARY_VERSION](#constant.sodium-library-version)**
     ([string](#language.types.string))








     **[SODIUM_LIBRARY_MAJOR_VERSION](#constant.sodium-library-major-version)**
     ([int](#language.types.integer))








     **[SODIUM_LIBRARY_MINOR_VERSION](#constant.sodium-library-minor-version)**
     ([int](#language.types.integer))








     **[SODIUM_BASE64_VARIANT_ORIGINAL](#constant.sodium-base64-variant-original)**
     ([int](#language.types.integer))








     **[SODIUM_BASE64_VARIANT_ORIGINAL_NO_PADDING](#constant.sodium-base64-variant-original-no-padding)**
     ([int](#language.types.integer))








     **[SODIUM_BASE64_VARIANT_URLSAFE](#constant.sodium-base64-variant-urlsafe)**
     ([int](#language.types.integer))








     **[SODIUM_BASE64_VARIANT_URLSAFE_NO_PADDING](#constant.sodium-base64-variant-urlsafe-no-padding)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_AEGIS128L_KEYBYTES](#constant.sodium-crypto-aead-aegis128l-keybytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS128L_NSECBYTES](#constant.sodium-crypto-aead-aegis128l-nsecbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS128L_NPUBBYTES](#constant.sodium-crypto-aead-aegis128l-npubbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS128L_ABYTES](#constant.sodium-crypto-aead-aegis128l-abytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS256_KEYBYTES](#constant.sodium-crypto-aead-aegis256-keybytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS256_NSECBYTES](#constant.sodium-crypto-aead-aegis256-nsecbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS256_NPUBBYTES](#constant.sodium-crypto-aead-aegis256-npubbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AEGIS256_ABYTES](#constant.sodium-crypto-aead-aegis256-abytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.4.0.





     **[SODIUM_CRYPTO_AEAD_AES256GCM_KEYBYTES](#constant.sodium-crypto-aead-aes256gcm-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_AES256GCM_NSECBYTES](#constant.sodium-crypto-aead-aes256gcm-nsecbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_AES256GCM_NPUBBYTES](#constant.sodium-crypto-aead-aes256gcm-npubbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_AES256GCM_ABYTES](#constant.sodium-crypto-aead-aes256gcm-abytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_KEYBYTES](#constant.sodium-crypto-aead-chacha20poly1305-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_NSECBYTES](#constant.sodium-crypto-aead-chacha20poly1305-nsecbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_NPUBBYTES](#constant.sodium-crypto-aead-chacha20poly1305-npubbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_ABYTES](#constant.sodium-crypto-aead-chacha20poly1305-abytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_KEYBYTES](#constant.sodium-crypto-aead-chacha20poly1305-ietf-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NSECBYTES](#constant.sodium-crypto-aead-chacha20poly1305-ietf-nsecbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES](#constant.sodium-crypto-aead-chacha20poly1305-ietf-npubbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_ABYTES](#constant.sodium-crypto-aead-chacha20poly1305-ietf-abytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_ABYTES](#constant.sodium-crypto-aead-xchacha20poly1305-ietf-abytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_KEYBYTES](#constant.sodium-crypto-aead-xchacha20poly1305-ietf-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES](#constant.sodium-crypto-aead-xchacha20poly1305-ietf-npubbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NSECBYTES](#constant.sodium-crypto-aead-xchacha20poly1305-ietf-nsecbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AUTH_BYTES](#constant.sodium-crypto-auth-bytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_AUTH_KEYBYTES](#constant.sodium-crypto-auth-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_SEALBYTES](#constant.sodium-crypto-box-sealbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_SECRETKEYBYTES](#constant.sodium-crypto-box-secretkeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_PUBLICKEYBYTES](#constant.sodium-crypto-box-publickeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_KEYPAIRBYTES](#constant.sodium-crypto-box-keypairbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_MACBYTES](#constant.sodium-crypto-box-macbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_NONCEBYTES](#constant.sodium-crypto-box-noncebytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_BOX_SEEDBYTES](#constant.sodium-crypto-box-seedbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KDF_BYTES_MIN](#constant.sodium-crypto-kdf-bytes-min)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KDF_BYTES_MAX](#constant.sodium-crypto-kdf-bytes-max)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KDF_CONTEXTBYTES](#constant.sodium-crypto-kdf-contextbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KDF_KEYBYTES](#constant.sodium-crypto-kdf-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KX_SEEDBYTES](#constant.sodium-crypto-kx-seedbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KX_SESSIONKEYBYTES](#constant.sodium-crypto-kx-sessionkeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KX_PUBLICKEYBYTES](#constant.sodium-crypto-kx-publickeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KX_SECRETKEYBYTES](#constant.sodium-crypto-kx-secretkeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_KX_KEYPAIRBYTES](#constant.sodium-crypto-kx-keypairbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_GENERICHASH_BYTES](#constant.sodium-crypto-generichash-bytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_GENERICHASH_BYTES_MIN](#constant.sodium-crypto-generichash-bytes-min)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_GENERICHASH_BYTES_MAX](#constant.sodium-crypto-generichash-bytes-max)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_GENERICHASH_KEYBYTES](#constant.sodium-crypto-generichash-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_GENERICHASH_KEYBYTES_MIN](#constant.sodium-crypto-generichash-keybytes-min)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_GENERICHASH_KEYBYTES_MAX](#constant.sodium-crypto-generichash-keybytes-max)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_ALG_ARGON2I13](#constant.sodium-crypto-pwhash-alg-argon2i13)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13](#constant.sodium-crypto-pwhash-alg-argon2id13)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_ALG_DEFAULT](#constant.sodium-crypto-pwhash-alg-default)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_SALTBYTES](#constant.sodium-crypto-pwhash-saltbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_STRPREFIX](#constant.sodium-crypto-pwhash-strprefix)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-opslimit-interactive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-memlimit-interactive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE](#constant.sodium-crypto-pwhash-opslimit-moderate)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE](#constant.sodium-crypto-pwhash-memlimit-moderate)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-opslimit-sensitive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-memlimit-sensitive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_SALTBYTES](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-saltbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_STRPREFIX](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-strprefix)**
     ([string](#language.types.string))








     **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_OPSLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-opslimit-interactive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_MEMLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-memlimit-interactive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_OPSLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-opslimit-sensitive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_MEMLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-memlimit-sensitive)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_CORE_RISTRETTO255_BYTES](#constant.sodium-crypto-core-ristretto255-bytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_CORE_RISTRETTO255_HASHBYTES](#constant.sodium-crypto-core-ristretto255-hashbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_CORE_RISTRETTO255_NONREDUCEDSCALARBYTES](#constant.sodium-crypto-core-ristretto255-nonreducedscalarbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_CORE_RISTRETTO255_SCALARBYTES](#constant.sodium-crypto-core-ristretto255-scalarbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_SCALARMULT_BYTES](#constant.sodium-crypto-scalarmult-bytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SCALARMULT_SCALARBYTES](#constant.sodium-crypto-scalarmult-scalarbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_BYTES](#constant.sodium-crypto-scalarmult-ristretto255-bytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_SCALARBYTES](#constant.sodium-crypto-scalarmult-ristretto255-scalarbytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_SHORTHASH_BYTES](#constant.sodium-crypto-shorthash-bytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SHORTHASH_KEYBYTES](#constant.sodium-crypto-shorthash-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETBOX_KEYBYTES](#constant.sodium-crypto-secretbox-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETBOX_MACBYTES](#constant.sodium-crypto-secretbox-macbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETBOX_NONCEBYTES](#constant.sodium-crypto-secretbox-noncebytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES](#constant.sodium-crypto-secretstream-xchacha20poly1305-abytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES](#constant.sodium-crypto-secretstream-xchacha20poly1305-headerbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES](#constant.sodium-crypto-secretstream-xchacha20poly1305-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_MESSAGEBYTES_MAX](#constant.sodium-crypto-secretstream-xchacha20poly1305-messagebytes-max)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-final)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_MESSAGE](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-message)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_PUSH](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-push)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_REKEY](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-rekey)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SIGN_BYTES](#constant.sodium-crypto-sign-bytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SIGN_SEEDBYTES](#constant.sodium-crypto-sign-seedbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES](#constant.sodium-crypto-sign-publickeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SIGN_SECRETKEYBYTES](#constant.sodium-crypto-sign-secretkeybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_SIGN_KEYPAIRBYTES](#constant.sodium-crypto-sign-keypairbytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_STREAM_NONCEBYTES](#constant.sodium-crypto-stream-noncebytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_STREAM_KEYBYTES](#constant.sodium-crypto-stream-keybytes)**
     ([int](#language.types.integer))








     **[SODIUM_CRYPTO_STREAM_XCHACHA20_KEYBYTES](#constant.sodium-crypto-stream-xchacha20-keybytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.





     **[SODIUM_CRYPTO_STREAM_XCHACHA20_NONCEBYTES](#constant.sodium-crypto-stream-xchacha20-noncebytes)**
     ([int](#language.types.integer))



      Disponible a partir de PHP 8.1.0.


# Sodium Funciones

# sodium_add

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_add — Suma grandes números

### Descripción

**sodium_add**([string](#language.types.string) &amp;$string1, [string](#language.types.string) $string2): [void](language.types.void.html)

Esto suma el argumento string2 a string1, sobrescribiendo
el valor almacenado en string1. Esta función asume que ambos argumentos
son strings binarios que representan enteros sin signo en bytes de orden bajo.

### Parámetros

    string1


      El string que representa un entero sin signo de longitud arbitraria en bytes de orden bajo.
      Este argumento se pasa por referencia y contendrá la suma de ambos argumentos.






    string2


      El string que representa un entero sin signo de longitud arbitraria en bytes de orden bajo.


### Valores devueltos

No se retorna ningún valor.

# sodium_base642bin

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_base642bin — Decodifica una cadena codificada en base64 en binario sin tratar.

### Descripción

**sodium_base642bin**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string, [int](#language.types.integer) $id, [string](#language.types.string) $ignore = ""): [string](#language.types.string)

Convierte una cadena codificada en base64 en binario sin tratar. A diferencia de [base64_decode()](#function.base64-decode),
**sodium_base642bin()** es de tiempo constante (una propiedad importante para cualquier código que
manipule entradas criptográficas, tales como textos en claro o claves) y soporta múltiples conjuntos de caracteres.

### Parámetros

    string


      [string](#language.types.string); Cadena codificada.






    id





       -
        **[SODIUM_BASE64_VARIANT_ORIGINAL](#constant.sodium-base64-variant-original)** para el estándar (A-Za-z0-9/\+)
        codificado en base64.


       -
        **[SODIUM_BASE64_VARIANT_ORIGINAL_NO_PADDING](#constant.sodium-base64-variant-original-no-padding)** para el estándar (A-Za-z0-9/\+)
        codificado en base64, sin caracteres de relleno =.


       -
        **[SODIUM_BASE64_VARIANT_URLSAFE](#constant.sodium-base64-variant-urlsafe)** para la codificación Base64 segura para URL (A-Za-z0-9\-_).


       -
        **[SODIUM_BASE64_VARIANT_URLSAFE_NO_PADDING](#constant.sodium-base64-variant-urlsafe-no-padding)** para la codificación Base64 segura para URL (A-Za-z0-9\-_),
        sin caracteres de relleno =.







    ignore


      Los caracteres a ignorar durante la decodificación (por ejemplo, los caracteres de espaciado).


### Valores devueltos

La cadena decodificada.

# sodium_bin2base64

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_bin2base64 — Codifica una string binaria bruta en base64.

### Descripción

**sodium_bin2base64**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string, [int](#language.types.integer) $id): [string](#language.types.string)

Convierte una string binaria bruta en una string codificada en base64. A diferencia de [base64_encode()](#function.base64-encode),
**sodium_bin2base64()** es de tiempo constante (una propiedad importante para cualquier código que
manipule entradas criptográficas, como textos en claro o claves) y admite varios conjuntos de caracteres.

### Parámetros

    string


      La string binaria bruta.






    id





       -
        **[SODIUM_BASE64_VARIANT_ORIGINAL](#constant.sodium-base64-variant-original)** para el estándar (A-Za-z0-9/\+)
        codificado en base64.


       -
        **[SODIUM_BASE64_VARIANT_ORIGINAL_NO_PADDING](#constant.sodium-base64-variant-original-no-padding)** para el estándar (A-Za-z0-9/\+)
        codificado en base64, sin caracteres de relleno =.


       -
        **[SODIUM_BASE64_VARIANT_URLSAFE](#constant.sodium-base64-variant-urlsafe)** para la codificación Base64 segura para URL (A-Za-z0-9\-_).


       -
        **[SODIUM_BASE64_VARIANT_URLSAFE_NO_PADDING](#constant.sodium-base64-variant-urlsafe-no-padding)** para la codificación Base64 segura para URL (A-Za-z0-9\-_),
        sin caracteres de relleno =.





### Valores devueltos

La string codificada en base64.

# sodium_bin2hex

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_bin2hex — Codificar en hexadecimal

### Descripción

**sodium_bin2hex**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string): [string](#language.types.string)

Convierte una cadena binaria bruta en una cadena codificada en hexadecimal. A diferencia de la función de codificación hexadecimal estándar,
**sodium_bin2hex()** es de tiempo constante (una propiedad importante para cualquier código que
manipule entradas criptográficas, como textos sin formato o claves).

### Parámetros

    string


      Una cadena binaria bruta.


### Valores devueltos

Una cadena codificada en hexadecimal.

# sodium_compare

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_compare — Comparar grandes números

### Descripción

**sodium_compare**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string1, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string2): [int](#language.types.integer)

Compara dos strings como si fueran enteros no signados de longitud arbitraria, en bytes de orden bajo, sin fuga de canal secundario.

### Parámetros

    string1


      Operando izquierdo






    string2


      Operando derecho


### Valores devueltos

Devuelve -1 si string1 es más pequeño que string2.

Devuelve 1 si string1 es más grande que string2.

Devuelve 0 si las dos strings son iguales.

# sodium_crypto_aead_aegis128l_decrypt

(PHP 8 &gt;= 8.4.0)

sodium_crypto_aead_aegis128l_decrypt — Verifica y luego descifra un mensaje con AEGIS-128L

### Descripción

**sodium_crypto_aead_aegis128l_decrypt**(
    [string](#language.types.string) $ciphertext,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)|[false](#language.types.singleton)

Verifica y luego descifra un mensaje con AEGIS-128L.

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_aead_aegis128l_encrypt()](#function.sodium-crypto-aead-aegis128l-encrypt).




    additional_data


      Además, datos autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.




    nonce


      Un número que debe ser utilizado una sola vez, por mensaje.




    key


      La clave de cifrado (128 bits).


### Valores devueltos

Devuelve el texto en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [sodium_crypto_aead_aegis128l_encrypt()](#function.sodium-crypto-aead-aegis128l-encrypt) - Cifra y autentica un mensaje con AEGIS-128L

- [sodium_crypto_aead_aegis128l_keygen()](#function.sodium-crypto-aead-aegis128l-keygen) - Genera una clave AEGIS-128L aleatoria

# sodium_crypto_aead_aegis128l_encrypt

(PHP 8 &gt;= 8.4.0)

sodium_crypto_aead_aegis128l_encrypt — Cifra y autentica un mensaje con AEGIS-128L

### Descripción

**sodium_crypto_aead_aegis128l_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Cifra y autentica un mensaje con AEGIS-128L.

### Parámetros

    message


      El mensaje en claro a cifrar.




    additional_data


      Datos adicionales autentificados. Esto se utiliza en la verificación de la etiqueta de autentificación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.




    nonce


      Un número que debe ser utilizado una sola vez, por mensaje.




    key


      La clave de cifrado (128 bits).


### Valores devueltos

Devuelve el texto cifrado y la etiqueta de autentificación como una cadena de bytes en bruto.

### Ver también

- [sodium_crypto_aead_aegis128l_decrypt()](#function.sodium-crypto-aead-aegis128l-decrypt) - Verifica y luego descifra un mensaje con AEGIS-128L

- [sodium_crypto_aead_aegis128l_keygen()](#function.sodium-crypto-aead-aegis128l-keygen) - Genera una clave AEGIS-128L aleatoria

# sodium_crypto_aead_aegis128l_keygen

(PHP 8 &gt;= 8.4.0)

sodium_crypto_aead_aegis128l_keygen — Genera una clave AEGIS-128L aleatoria

### Descripción

**sodium_crypto_aead_aegis128l_keygen**(): [string](#language.types.string)

Genera una clave aleatoria de 128 bits para ser utilizada con [sodium_crypto_aead_aegis128l_encrypt()](#function.sodium-crypto-aead-aegis128l-encrypt) y
[sodium_crypto_aead_aegis128l_decrypt()](#function.sodium-crypto-aead-aegis128l-decrypt).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 128 bits.

### Ver también

- [sodium_crypto_aead_aegis128l_decrypt()](#function.sodium-crypto-aead-aegis128l-decrypt) - Verifica y luego descifra un mensaje con AEGIS-128L

- [sodium_crypto_aead_aegis128l_encrypt()](#function.sodium-crypto-aead-aegis128l-encrypt) - Cifra y autentica un mensaje con AEGIS-128L

# sodium_crypto_aead_aegis256_decrypt

(PHP 8 &gt;= 8.4.0)

sodium_crypto_aead_aegis256_decrypt — Verifica y luego descifra un mensaje con AEGIS-256

### Descripción

**sodium_crypto_aead_aegis256_decrypt**(
    [string](#language.types.string) $ciphertext,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)|[false](#language.types.singleton)

Verifica y luego descifra un mensaje con AEGIS-256.

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_aead_aegis256_encrypt()](#function.sodium-crypto-aead-aegis256-encrypt).




    additional_data


      Además, datos autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.




    nonce


      Un número que debe ser utilizado una sola vez, por mensaje.




    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve el texto en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [sodium_crypto_aead_aegis256_encrypt()](#function.sodium-crypto-aead-aegis256-encrypt) - Cifra y autentica un mensaje con AEGIS-256

- [sodium_crypto_aead_aegis256_keygen()](#function.sodium-crypto-aead-aegis256-keygen) - Genera una clave AEGIS-256 aleatoria

# sodium_crypto_aead_aegis256_encrypt

(PHP 8 &gt;= 8.4.0)

sodium_crypto_aead_aegis256_encrypt — Cifra y autentica un mensaje con AEGIS-256

### Descripción

**sodium_crypto_aead_aegis256_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Cifra y autentica un mensaje con AEGIS-256.

### Parámetros

    message


      El mensaje en claro a cifrar.




    additional_data


      Datos adicionales autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.




    nonce


      Un número que debe ser utilizado una sola vez, por mensaje.




    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve el texto cifrado y la etiqueta de autenticación en forma de cadena de octetos sin tratar.

### Ver también

- [sodium_crypto_aead_aegis256_decrypt()](#function.sodium-crypto-aead-aegis256-decrypt) - Verifica y luego descifra un mensaje con AEGIS-256

- [sodium_crypto_aead_aegis256_keygen()](#function.sodium-crypto-aead-aegis256-keygen) - Genera una clave AEGIS-256 aleatoria

# sodium_crypto_aead_aegis256_keygen

(PHP 8 &gt;= 8.4.0)

sodium_crypto_aead_aegis256_keygen — Genera una clave AEGIS-256 aleatoria

### Descripción

**sodium_crypto_aead_aegis256_keygen**(): [string](#language.types.string)

Genera una clave aleatoria de 256 bits para ser utilizada con [sodium_crypto_aead_aegis256_encrypt()](#function.sodium-crypto-aead-aegis256-encrypt) y
[sodium_crypto_aead_aegis256_decrypt()](#function.sodium-crypto-aead-aegis256-decrypt).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 256 bits.

### Ver también

- [sodium_crypto_aead_aegis256_decrypt()](#function.sodium-crypto-aead-aegis256-decrypt) - Verifica y luego descifra un mensaje con AEGIS-256

- [sodium_crypto_aead_aegis256_encrypt()](#function.sodium-crypto-aead-aegis256-encrypt) - Cifra y autentica un mensaje con AEGIS-256

# sodium_crypto_aead_aes256gcm_decrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_aes256gcm_decrypt — Verifica y luego descifra un mensaje con AES-256-GCM

### Descripción

**sodium_crypto_aead_aes256gcm_decrypt**(
    [string](#language.types.string) $ciphertext,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)|[false](#language.types.singleton)

Verifica y luego descifra con AES-256-GCM.
Disponible únicamente si [sodium_crypto_aead_aes256gcm_is_available()](#function.sodium-crypto-aead-aes256gcm-is-available) devuelve **[true](#constant.true)**.

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_aead_aes256gcm_encrypt()](#function.sodium-crypto-aead-aes256gcm-encrypt)
      (cifrar y etiquetar, concatenados).






    additional_data


      Datos adicionales autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no es cifrado ni almacenado en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 12 bytes de largo.






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve el texto en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_aes256gcm_encrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_aes256gcm_encrypt — Cifra y autentica con AES-256-GCM

### Descripción

**sodium_crypto_aead_aes256gcm_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Cifra y autentica con AES-256-GCM.
Disponible únicamente si [sodium_crypto_aead_aes256gcm_is_available()](#function.sodium-crypto-aead-aes256gcm-is-available) devuelve **[true](#constant.true)**.

### Parámetros

    message


      El mensaje en texto claro a cifrar.






    additional_data


      Adicional, datos autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 12 bytes de largo.






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve el texto cifrado y la etiqueta de autenticación en forma de cadena de bytes binarios sin tratar. (Formato: texto cifrado, luego etiqueta.)

# sodium_crypto_aead_aes256gcm_is_available

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_aes256gcm_is_available — Verifica si el hardware soporta AES256-GCM

### Descripción

**sodium_crypto_aead_aes256gcm_is_available**(): [bool](#language.types.boolean)

El valor de retorno de esta función depende de si el hardware soporta o no el AES acelerado por hardware.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es seguro cifrar con AES-256-GCM, y **[false](#constant.false)** en caso contrario.

# sodium_crypto_aead_aes256gcm_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_aes256gcm_keygen — Genera una clave AES-256-GCM aleatoria

### Descripción

**sodium_crypto_aead_aes256gcm_keygen**(): [string](#language.types.string)

Genera una clave aleatoria para su uso con [sodium_crypto_aead_aes256gcm_encrypt()](#function.sodium-crypto-aead-aes256gcm-encrypt) y
[sodium_crypto_aead_aes256gcm_decrypt()](#function.sodium-crypto-aead-aes256gcm-decrypt).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 256 bits.

# sodium_crypto_aead_chacha20poly1305_decrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_chacha20poly1305_decrypt — Verifica y luego descifra con ChaCha20-Poly1305

### Descripción

**sodium_crypto_aead_chacha20poly1305_decrypt**(
    [string](#language.types.string) $ciphertext,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)|[false](#language.types.singleton)

Verifica y luego descifra con ChaCha20-Poly1305.

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_aead_chacha20poly1305_encrypt()](#function.sodium-crypto-aead-chacha20poly1305-encrypt)
      (cifrar y etiquetar, concatenados).






    additional_data


      Adicional, datos autentificados. Esto se utiliza en la verificación de la etiqueta de autentificación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 8 bytes de longitud.






    key


      La clave de cifrado. 256 bits.


### Valores devueltos

Devuelve el texto en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_chacha20poly1305_encrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_chacha20poly1305_encrypt — Cifra y autentica con ChaCha20-Poly1305

### Descripción

**sodium_crypto_aead_chacha20poly1305_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Cifra y autentica con ChaCha20-Poly1305.

### Parámetros

    message


      El mensaje en texto claro a cifrar.






    additional_data


      Adicional, datos autentificados. Esto se utiliza en la verificación de la etiqueta de autentificación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 8 bytes de largo.






    key


      La clave de cifrado. 256 bits.


### Valores devueltos

Devuelve la clave de cifrado y la etiqueta en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_chacha20poly1305_ietf_decrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_chacha20poly1305_ietf_decrypt — Verifica que el texto cifrado incluye una etiqueta válida

### Descripción

**sodium_crypto_aead_chacha20poly1305_ietf_decrypt**(
    [string](#language.types.string) $ciphertext,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)|[false](#language.types.singleton)

Verifica y luego descifra con ChaCha20-Poly1305 (variante IETF).

La variante IETF utiliza nonces de 96 bits y contadores internos de 32 bits, en lugar de 64 bits para ambos.

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_aead_chacha20poly1305_ietf_encrypt()](#function.sodium-crypto-aead-chacha20poly1305-ietf-encrypt)
      (texto cifrado y etiqueta, concatenados).






    additional_data


      Datos adicionales autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 12 bytes de largo.






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve el texto en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_chacha20poly1305_ietf_encrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_chacha20poly1305_ietf_encrypt — Cifra un mensaje

### Descripción

**sodium_crypto_aead_chacha20poly1305_ietf_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Cifra y autentifica con ChaCha20-Poly1305 (variante IETF).

La variante IETF utiliza nonces de 96 bits y contadores internos de 32 bits, en lugar de 64 bits para ambos.

### Parámetros

    message


      El mensaje en texto claro a cifrar.






    additional_data


      Datos adicionales autentificados. Esto se utiliza en la verificación de la etiqueta de autentificación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 12 bytes de largo.






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve la clave de cifrado y la etiqueta en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_chacha20poly1305_ietf_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_chacha20poly1305_ietf_keygen — Genera una clave ChaCha20-Poly1305 (IETF) aleatoria

### Descripción

**sodium_crypto_aead_chacha20poly1305_ietf_keygen**(): [string](#language.types.string)

Genera una clave aleatoria para su uso con [sodium_crypto_aead_chacha20poly1305_ietf_encrypt()](#function.sodium-crypto-aead-chacha20poly1305-ietf-encrypt) y
[sodium_crypto_aead_chacha20poly1305_ietf_decrypt()](#function.sodium-crypto-aead-chacha20poly1305-ietf-decrypt).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 256 bits.

# sodium_crypto_aead_chacha20poly1305_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_chacha20poly1305_keygen — Genera una clave ChaCha20-Poly1305 aleatoria

### Descripción

**sodium_crypto_aead_chacha20poly1305_keygen**(): [string](#language.types.string)

Genera una clave aleatoria para su uso con [sodium_crypto_aead_chacha20poly1305_encrypt()](#function.sodium-crypto-aead-chacha20poly1305-encrypt) y
[sodium_crypto_aead_chacha20poly1305_decrypt()](#function.sodium-crypto-aead-chacha20poly1305-decrypt).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 256 bits.

# sodium_crypto_aead_xchacha20poly1305_ietf_decrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_xchacha20poly1305_ietf_decrypt — (Preferido) Verificar y luego descifrar con XChaCha20-Poly1305

### Descripción

**sodium_crypto_aead_xchacha20poly1305_ietf_decrypt**(
    [string](#language.types.string) $ciphertext,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)|[false](#language.types.singleton)

Verificar y luego descifrar con ChaCha20-Poly1305 (variante de nonce extendido).

Generalmente, XChaCha20-Poly1305 es el mejor de los modos AEAD proporcionados para usar.

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_aead_xchacha20poly1305_ietf_encrypt()](#function.sodium-crypto-aead-xchacha20poly1305-ietf-encrypt)
      (texto cifrado y etiqueta, concatenados).






    additional_data


      Datos adicionales autenticados. Esto se usa en la verificación de la etiqueta de autenticación
      adjunta al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe usarse solo una vez, por mensaje. 24 bytes de largo.
      Este es un límite lo suficientemente grande para generar aleatoriamente (es decir, [random_bytes()](#function.random-bytes)).






    key


      Clave de cifrado (256 bits).


### Valores devueltos

Devuelve el texto plano en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_xchacha20poly1305_ietf_encrypt

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_xchacha20poly1305_ietf_encrypt — (Preferido) Cifra y luego autentica con XChaCha20-Poly1305

### Descripción

**sodium_crypto_aead_xchacha20poly1305_ietf_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data,
    [string](#language.types.string) $nonce,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Cifra y luego autentica con XChaCha20-Poly1305 (variante eXtended-nonce).

Generalmente, XChaCha20-Poly1305 es el mejor de los modos AEAD proporcionados para usar.

### Parámetros

    message


      El mensaje en texto claro a cifrar.






    additional_data


      Adicional, datos autenticados. Esto se utiliza en la verificación de la etiqueta de autenticación
      añadida al texto cifrado, pero no se cifra ni se almacena en el texto cifrado.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de largo.
      Este es un límite suficientemente grande para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve la clave de cifrado y la etiqueta en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_aead_xchacha20poly1305_ietf_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_aead_xchacha20poly1305_ietf_keygen — Genera una clave ChaCha20-Poly1305 aleatoria

### Descripción

**sodium_crypto_aead_xchacha20poly1305_ietf_keygen**(): [string](#language.types.string)

Genera una clave aleatoria para su uso con [sodium_crypto_aead_xchacha20poly1305_ietf_encrypt()](#function.sodium-crypto-aead-xchacha20poly1305-ietf-encrypt) y
[sodium_crypto_aead_xchacha20poly1305_ietf_decrypt()](#function.sodium-crypto-aead-xchacha20poly1305-ietf-decrypt).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 256 bits.

# sodium_crypto_auth

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_auth — Calcula una etiqueta para el mensaje

### Descripción

**sodium_crypto_auth**([string](#language.types.string) $message, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

El mensaje de autenticación simétrica a través de **sodium_crypto_auth()** proporciona
integridad, pero no confidencialidad.

A diferencia de las firmas digitales (por ejemplo [sodium_crypto_sign_detached()](#function.sodium-crypto-sign-detached)),
cualquier parte capaz de verificar un mensaje también es capaz de autenticar
sus propios mensajes. (De ahí, la autenticación simétrica.)

### Parámetros

    message


      El mensaje que se desea autenticar






    key


      La clave de autenticación


### Valores devueltos

La clave de autenticación

# sodium_crypto_auth_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_auth_keygen — Genera una clave aleatoria para sodium_crypto_auth

### Descripción

**sodium_crypto_auth_keygen**(): [string](#language.types.string)

Genera una clave aleatoria para su uso con [sodium_crypto_auth()](#function.sodium-crypto-auth) y [sodium_crypto_auth_verify()](#function.sodium-crypto-auth-verify).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave aleatoria de 256 bits.

# sodium_crypto_auth_verify

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_auth_verify — Verifica que la etiqueta es válida para el mensaje

### Descripción

**sodium_crypto_auth_verify**([string](#language.types.string) $mac, [string](#language.types.string) $message, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [bool](#language.types.boolean)

Verifica que la etiqueta es válida para un mensaje y una clave dados.

A diferencia de las firmas digitales (por ejemplo [sodium_crypto_sign_verify_detached()](#function.sodium-crypto-sign-verify-detached)),
cualquier parte capaz de verificar un mensaje también es capaz de autenticar
sus propios mensajes. (De ahí, la autenticación simétrica.)

### Parámetros

    mac


      Etiqueta de autenticación producida por [sodium_crypto_auth()](#function.sodium-crypto-auth)






    message


      Mensaje






    key


      La clave de autenticación


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_box

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box — Cifrado asimétrico autenticado

### Descripción

**sodium_crypto_box**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Cifra un mensaje utilizando criptografía asimétrica (clave pública).

El algoritmo utilizado por las funciones prefijadas por **sodium_crypto_box()** es
Diffie-Hellman sobre la curva de Montgomery, Curve25519; generalmente abreviado como
X25519.

### Parámetros

    message


      El mensaje a cifrar.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de largo.
      Este es un límite suficientemente grande para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key_pair


      Ver [sodium_crypto_box_keypair_from_secretkey_and_publickey()](#function.sodium-crypto-box-keypair-from-secretkey-and-publickey).
      Esto incluye la clave pública del remitente y la clave secreta del destinatario.


### Valores devueltos

Devuelve el mensaje cifrado (ciphertext más etiqueta de autenticación). El texto cifrado será
16 bytes más largo que el texto en claro, y una string binaria bruta. Ver [sodium_bin2base64()](#function.sodium-bin2base64)
para un encodaje seguro para el almacenamiento.

# sodium_crypto_box_keypair

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_keypair — Genera aleatoriamente una clave secreta y una clave pública correspondiente

### Descripción

**sodium_crypto_box_keypair**(): [string](#language.types.string)

Genera una clave secreta y una clave pública en una sola cadena.

Para extraer la clave secreta de esta cadena de clave unificada, ver [sodium_crypto_box_secretkey()](#function.sodium-crypto-box-secretkey).
Para extraer la clave pública de esta cadena de clave unificada, ver [sodium_crypto_box_publickey()](#function.sodium-crypto-box-publickey).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena que contiene tanto la clave secreta X25519 como la clave pública X25519 correspondiente.

# sodium_crypto_box_keypair_from_secretkey_and_publickey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_keypair_from_secretkey_and_publickey — Crear una pareja de claves unificada a partir de una clave secreta y una clave pública

### Descripción

**sodium_crypto_box_keypair_from_secretkey_and_publickey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key, [string](#language.types.string) $public_key): [string](#language.types.string)

Esta función existe para satisfacer los requisitos de la API de **crypto_box()**.
Pasar la clave secreta de una parte y la clave pública de la otra, y se obtendrá una "pareja de claves"
para la conversación.

### Parámetros

    secret_key


      La clave secreta.






    public_key


      La clave pública.


### Valores devueltos

Una pareja de claves X25519.

# sodium_crypto_box_open

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_open — Desencriptación autenticada con clave pública

### Descripción

**sodium_crypto_box_open**([string](#language.types.string) $ciphertext, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)|[false](#language.types.singleton)

Desencripta un mensaje utilizando criptografía asimétrica (clave pública).

### Parámetros

    ciphertext


      El mensaje cifrado a desencriptar.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de longitud.
      Es un límite suficientemente grande para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key_pair


      Ver [sodium_crypto_box_keypair_from_secretkey_and_publickey()](#function.sodium-crypto-box-keypair-from-secretkey-and-publickey).
      Debe incluir la clave pública del remitente y la clave secreta del destinatario.


### Valores devueltos

Devuelve el mensaje en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_box_publickey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_publickey — Extrae la clave pública de un par de claves crypto_box

### Descripción

**sodium_crypto_box_publickey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Dado un par de claves, se extrae únicamente la clave pública.

### Parámetros

    key_pair


      Un par de claves, tal como el generado por [sodium_crypto_box_keypair()](#function.sodium-crypto-box-keypair) o
      [sodium_crypto_box_seed_keypair()](#function.sodium-crypto-box-seed-keypair)


### Valores devueltos

La clave pública X25519.

# sodium_crypto_box_publickey_from_secretkey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_publickey_from_secretkey — Calcula la clave pública a partir de una clave secreta

### Descripción

**sodium_crypto_box_publickey_from_secretkey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key): [string](#language.types.string)

Dada una clave secreta, se calcula la clave pública correspondiente.

Esto solo funciona con el tipo de claves destinadas a ser utilizadas con **crypto_box()**
(que utiliza el intercambio de claves de Diffie-Hellman sobre la curva de Montgomery, Curve25519; abreviado X25519),
no con **crypto_sign()** (que utiliza el algoritmo de firma digital de Edwards sobre la curva de Edwards
con los parámetros correspondientes; abreviado Ed25519).

### Parámetros

    secret_key


      La clave secreta X25519


### Valores devueltos

La clave pública X25519.

# sodium_crypto_box_seal

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_seal — Cifrado anónimo con clave pública

### Descripción

**sodium_crypto_box_seal**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message, [string](#language.types.string) $public_key): [string](#language.types.string)

Cifra un mensaje de tal manera que solo el destinatario pueda descifrarlo.

A diferencia de [sodium_crypto_box()](#function.sodium-crypto-box), solo se necesita la clave pública
del destinatario para utilizar **sodium_crypto_box_seal()**. Una consecuencia de esta
comodidad, sin embargo, es que el texto cifrado no está vinculado a una clave pública estática,
y por lo tanto no está autenticado. De ahí el cifrado anónimo con clave pública.

**sodium_crypto_box_seal()** siempre proporciona la integridad del texto cifrado. Solo que no
la autenticación de la identidad del remitente.

Si también se necesita la autenticación del remitente, las funciones [sodium_crypto_sign()](#function.sodium-crypto-sign)
son probablemente el mejor punto de partida.

### Parámetros

    message


      El mensaje a cifrar.






    public_key


      La clave pública que corresponde a la única clave que puede descifrar el mensaje.


### Valores devueltos

Un texto cifrado en forma de (clave pública única, mensaje cifrado, etiqueta de autenticación).

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_box_seal()**

&lt;?php
$keypair = sodium_crypto_box_keypair();
$public_key = sodium_crypto_box_publickey($keypair);

// El texto en claro obfuscado para hacer el ejemplo más divertido
$plaintext_b64 = "V3JpdGluZyBzb2Z0d2FyZSBpbiBQSFAgY2FuIGJlIGEgZGVsaWdodCE=";
$decoded_plaintext = sodium_base642bin($plaintext_b64, SODIUM_BASE64_VARIANT_ORIGINAL);

$sealed = sodium_crypto_box_seal($decoded_plaintext, $public_key);
var_dump(base64_encode($sealed));

$opened = sodium_crypto_box_seal_open($sealed, $keypair);
var_dump($opened);
?&gt;

Resultado del ejemplo anterior es similar a:

string(120) "oRBXXAV4iQBrxlV4A21Bord8Yo/D8ZlrIIGNyaRCcGBfpz0map52I3xq6l+CST+1NSgQkbV+HiYyFjXWiWiaCGupGf+zl4bgWj/A9Adtem7Jt3h3emrMsLw="
string(41) "Writing software in PHP can be a delight!"

# sodium_crypto_box_seal_open

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_seal_open — Desencriptación anónima con clave pública

### Descripción

**sodium_crypto_box_seal_open**([string](#language.types.string) $ciphertext, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)|[false](#language.types.singleton)

Desencripta un mensaje que ha sido encriptado con [sodium_crypto_box_seal()](#function.sodium-crypto-box-seal)

### Parámetros

    ciphertext


      El mensaje encriptado






    key_pair


      La pareja de claves del destinatario. Debe incluir la clave secreta.


### Valores devueltos

El texto en claro en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 sodium_crypto_box_seal_open()** example

&lt;?php
// El texto encriptado no es sensible; base64_decode es suficiente
$sealed_b64 = "oRBXXAV4iQBrxlV4A21Bord8Yo/D8ZlrIIGNyaRCcGBfpz0map52I3xq6l+CST+1NSgQkbV+HiYyFjXWiWiaCGupGf+zl4bgWj/A9Adtem7Jt3h3emrMsLw=";
$sealed = base64_decode($sealed_b64);

// La pareja de claves contiene un secreto criptográfico; utilice un decodificador seguro en tiempo
$keypair_b64 = "KZkF8wnB7bnC2aXB3lFOqCTc0Z6MllvaQb9ASVG8o2/MsewkuE4u1uaEgTzSakeiYyIW8DGj+02/L3cWIbs9bQ==";
$keypair = sodium_base642bin($keypair_b64, SODIUM_BASE64_VARIANT_ORIGINAL);

$opened = sodium_crypto_box_seal_open($sealed, $keypair);
var_dump($opened);
?&gt;

Resultado del ejemplo anterior es similar a:

string(41) "Writing software in PHP can be a delight!"

# sodium_crypto_box_secretkey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_secretkey — Extrae la clave secreta de un par de claves crypto_box

### Descripción

**sodium_crypto_box_secretkey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Dado un par de claves, extrae únicamente la clave secreta.

### Parámetros

    key_pair


      Un par de claves, tal como el generado por [sodium_crypto_box_keypair()](#function.sodium-crypto-box-keypair) o
      [sodium_crypto_box_seed_keypair()](#function.sodium-crypto-box-seed-keypair)


### Valores devueltos

La clave secreta X25519

# sodium_crypto_box_seed_keypair

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_box_seed_keypair — Deriva de manera determinista el par de claves a partir de una sola clave

### Descripción

**sodium_crypto_box_seed_keypair**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $seed): [string](#language.types.string)

Adjunta la semilla para formar una clave secreta, deriva la clave pública y devuelve ambas como un par de claves.

Las funciones \*\_seed_keypair son ideales para generar un par de claves a partir de una contraseña y una sal. Utilice el resultado como seed para generar las claves deseadas.

### Parámetros

    seed


      Una entrada criptográfica. Debe ser de 32 bytes.


### Valores devueltos

Un par de claves X25519 (clave secreta y clave pública).

# sodium_crypto_core_ristretto255_add

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_add — Añade un elemento

### Descripción

**sodium_crypto_core_ristretto255_add**([string](#language.types.string) $p, [string](#language.types.string) $q): [string](#language.types.string)

Añade un elemento q a p.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    p


      Un elemento.






    q


      Un elemento.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_add()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_random();
$bar = sodium_crypto_core_ristretto255_random();

$value = sodium_crypto_core_ristretto255_add($foo, $bar);
$value = sodium_crypto_core_ristretto255_sub($value, $bar);

var_dump(hash_equals($foo, $value));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_random()](#function.sodium-crypto-core-ristretto255-random) - Genera una clave aleatoria

    - [sodium_crypto_core_ristretto255_sub()](#function.sodium-crypto-core-ristretto255-sub) - Sustrae un elemento

# sodium_crypto_core_ristretto255_from_hash

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_from_hash — Mapea un vector

### Descripción

**sodium_crypto_core_ristretto255_from_hash**([string](#language.types.string) $s): [string](#language.types.string)

Mapea un vector s de 64 bytes a un elemento de grupo.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    s


      Un vector de 64 bytes.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.
Returns a 32-byte random [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_from_hash()**

&lt;?php

$hashes = sodium_hex2bin(
    '5d1be09e3d0c82fc538112490e35701979d99e06ca3e2b5b54bffe8b4dc772c1' .
    '4d98b696a1bbfb5ca32c436cc61c16563790306c79eaca7705668b47dffe5bb6'
);
var_dump(sodium_bin2hex(sodium_crypto_core_ristretto255_from_hash($hashes)));
?&gt;

    El ejemplo anterior mostrará:

string(64) "3066f82a1a747d45120d1740f14358531a8f04bbffe6a819f86dfe50f44a0a46"

### Ver también

    - [sodium_hex2bin()](#function.sodium-hex2bin) - Decodifica una cadena binaria codificada en hexadecimal

    - [sodium_bin2hex()](#function.sodium-bin2hex) - Codificar en hexadecimal

    - **sodium_crypto_core_ristretto255_from_hash()**

# sodium_crypto_core_ristretto255_is_valid_point

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_is_valid_point — Determina si un punto está en la curva ristretto255

### Descripción

**sodium_crypto_core_ristretto255_is_valid_point**([string](#language.types.string) $s): [bool](#language.types.boolean)

Determina si un punto está en la curva ristretto255,
en forma canónica, en el subgrupo principal, y que el punto no tiene un orden pequeño.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    s


      Un punto en la curva elíptica.


### Valores devueltos

Devuelve **[true](#constant.true)** si s está en la curva ristretto255, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_is_valid_point()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_scalar_random();
$bar = sodium_crypto_scalarmult_ristretto255_base($foo);

var_dump(sodium_crypto_core_ristretto255_is_valid_point($bar));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

    - [sodium_crypto_scalarmult_ristretto255_base()](#function.sodium-crypto-scalarmult-ristretto255-base) - Calcula la clave pública a partir de una clave secreta

# sodium_crypto_core_ristretto255_random

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_random — Genera una clave aleatoria

### Descripción

**sodium_crypto_core_ristretto255_random**(): [string](#language.types.string)

Genera una clave aleatoria.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_random()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_random();
$bar = sodium_crypto_core_ristretto255_random();

$value = sodium_crypto_core_ristretto255_add($foo, $bar);
$value = sodium_crypto_core_ristretto255_sub($value, $bar);

var_dump(hash_equals($foo, $value));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_add()](#function.sodium-crypto-core-ristretto255-add) - Añade un elemento

    - [sodium_crypto_core_ristretto255_sub()](#function.sodium-crypto-core-ristretto255-sub) - Sustrae un elemento

# sodium_crypto_core_ristretto255_scalar_add

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_add — Añade un valor escalar

### Descripción

**sodium_crypto_core_ristretto255_scalar_add**([string](#language.types.string) $x, [string](#language.types.string) $y): [string](#language.types.string)

Añade un elemento y a x.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    x


      Escalar que representa la coordenada X.






    y


      Escalar que representa la coordenada Y.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_scalar_add()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_scalar_random();
$bar = sodium_crypto_core_ristretto255_scalar_random();

$value = sodium_crypto_core_ristretto255_scalar_add($foo, $bar);
$value = sodium_crypto_core_ristretto255_scalar_sub($value, $bar);

var_dump(hash_equals($foo, $value));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

    - [sodium_crypto_core_ristretto255_scalar_sub()](#function.sodium-crypto-core-ristretto255-scalar-sub) - Sustrae un valor escalar

# sodium_crypto_core_ristretto255_scalar_complement

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_complement — El propósito de sodium_crypto_core_ristretto255_scalar_complement

### Descripción

**sodium_crypto_core_ristretto255_scalar_complement**([string](#language.types.string) $s): [string](#language.types.string)

Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    s


      Valor escalar.


### Valores devueltos

Devuelve una string aleatoria de 32 bytes.

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

# sodium_crypto_core_ristretto255_scalar_invert

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_invert — Invierte un valor escalar

### Descripción

**sodium_crypto_core_ristretto255_scalar_invert**([string](#language.types.string) $s): [string](#language.types.string)

Invierte un valor escalar.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    s


      Valor escalar.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_scalar_invert()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_scalar_random();

$inverted = sodium_crypto_core_ristretto255_scalar_invert($foo);
$reInverted = sodium_crypto_core_ristretto255_scalar_invert($inverted);

var_dump(hash_equals($foo, $reInverted));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

# sodium_crypto_core_ristretto255_scalar_mul

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_mul — Multiplica un valor escalar

### Descripción

**sodium_crypto_core_ristretto255_scalar_mul**([string](#language.types.string) $x, [string](#language.types.string) $y): [string](#language.types.string)

Multiplica un valor escalar.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    x


      Escalar que representa la coordenada X.






    y


      Escalar que representa la coordenada Y.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

# sodium_crypto_core_ristretto255_scalar_negate

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_negate — Invierte el signo de un valor escalar

### Descripción

**sodium_crypto_core_ristretto255_scalar_negate**([string](#language.types.string) $s): [string](#language.types.string)

Invierte el signo de un valor escalar.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    s


      Valor escalar.


### Valores devueltos

Devuelve una string aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_scalar_negate()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_scalar_random();

$negate = sodium_crypto_core_ristretto255_scalar_negate($foo);
$reNegate = sodium_crypto_core_ristretto255_scalar_negate($negate);

var_dump(hash_equals($foo, $reNegate));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

# sodium_crypto_core_ristretto255_scalar_random

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_random — Genera una clave aleatoria

### Descripción

**sodium_crypto_core_ristretto255_scalar_random**(): [string](#language.types.string)

Genera una clave aleatoria.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_scalar_random()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_scalar_random();
$bar = sodium_crypto_core_ristretto255_scalar_random();

$value = sodium_crypto_core_ristretto255_scalar_add($foo, $bar);
$value = sodium_crypto_core_ristretto255_scalar_sub($value, $bar);

var_dump(hash_equals($foo, $value));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_add()](#function.sodium-crypto-core-ristretto255-scalar-add) - Añade un valor escalar

    - [sodium_crypto_core_ristretto255_scalar_sub()](#function.sodium-crypto-core-ristretto255-scalar-sub) - Sustrae un valor escalar

# sodium_crypto_core_ristretto255_scalar_reduce

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_reduce — Reduce un valor escalar

### Descripción

**sodium_crypto_core_ristretto255_scalar_reduce**([string](#language.types.string) $s): [string](#language.types.string)

Reduce un valor escalar.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    s


      Un valor escalar.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

# sodium_crypto_core_ristretto255_scalar_sub

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_scalar_sub — Sustrae un valor escalar

### Descripción

**sodium_crypto_core_ristretto255_scalar_sub**([string](#language.types.string) $x, [string](#language.types.string) $y): [string](#language.types.string)

Sustrae un escalar y de x.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    x


      Escalar, representando la coordenada X.






    y


      Escalar, representando la coordenada Y.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_scalar_sub()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_scalar_random();
$bar = sodium_crypto_core_ristretto255_scalar_random();

$value = sodium_crypto_core_ristretto255_scalar_add($foo, $bar);
$value = sodium_crypto_core_ristretto255_scalar_sub($value, $bar);

var_dump(hash_equals($foo, $value));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_scalar_random()](#function.sodium-crypto-core-ristretto255-scalar-random) - Genera una clave aleatoria

    - [sodium_crypto_core_ristretto255_scalar_add()](#function.sodium-crypto-core-ristretto255-scalar-add) - Añade un valor escalar

# sodium_crypto_core_ristretto255_sub

(PHP 8 &gt;= 8.1.0)

sodium_crypto_core_ristretto255_sub — Sustrae un elemento

### Descripción

**sodium_crypto_core_ristretto255_sub**([string](#language.types.string) $p, [string](#language.types.string) $q): [string](#language.types.string)

Sustrae un elemento q de p.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    p


      Un elemento.






    q


      Un elemento.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_core_ristretto255_sub()**

&lt;?php

$foo = sodium_crypto_core_ristretto255_random();
$bar = sodium_crypto_core_ristretto255_random();

$value = sodium_crypto_core_ristretto255_add($foo, $bar);
$value = sodium_crypto_core_ristretto255_sub($value, $bar);

var_dump(hash_equals($foo, $value));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_crypto_core_ristretto255_random()](#function.sodium-crypto-core-ristretto255-random) - Genera una clave aleatoria

    - [sodium_crypto_core_ristretto255_add()](#function.sodium-crypto-core-ristretto255-add) - Añade un elemento

# sodium_crypto_generichash

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_generichash — Devuelve un hash del mensaje

### Descripción

**sodium_crypto_generichash**([string](#language.types.string) $message, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key = "", [int](#language.types.integer) $length = **[SODIUM_CRYPTO_GENERICHASH_BYTES](#constant.sodium-crypto-generichash-bytes)**): [string](#language.types.string)

Hachea un mensaje con BLAKE2b.

### Parámetros

    message


      El mensaje a hachear.






    key


      (Opcional) Clave criptográfica. Sirve para la misma función que una clave HMAC, pero se utiliza como una sección reservada del estado interno de BLAKE2.






    length


      El tamaño de la salida.


### Valores devueltos

El hash criptográfico como una cadena binaria bruta. Si se desea una salida hexadecimal, el resultado puede ser pasado a [sodium_bin2hex()](#function.sodium-bin2hex).

# sodium_crypto_generichash_final

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_generichash_final — Completa el hachado

### Descripción

**sodium_crypto_generichash_final**([string](#language.types.string) &amp;$state, [int](#language.types.integer) $length = **[SODIUM_CRYPTO_GENERICHASH_BYTES](#constant.sodium-crypto-generichash-bytes)**): [string](#language.types.string)

El método de finalización para la API de hachado genérico en streaming.

### Parámetros

    state


      El estado de hachado devuelto por [sodium_crypto_generichash_init()](#function.sodium-crypto-generichash-init)






    length


      La longitud de la salida.


### Valores devueltos

El hachado criptográfico.

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_generichash_final()**

&lt;?php
$messages = [random_bytes(32), random_bytes(32), random_bytes(16)];
$state = sodium_crypto_generichash_init('', 32);
foreach ($messages as $message) {
    sodium_crypto_generichash_update($state, $message);
}

$final = sodium_crypto_generichash_final($state, 32);
var_dump(sodium_bin2hex($final));

$allAtOnce = sodium_crypto_generichash(implode('', $messages));
var_dump(sodium_bin2hex($allAtOnce));
?&gt;

Resultado del ejemplo anterior es similar a:

string(64) "a2939a9163cb7c796ec28e01028489e72475c136b2697ea59e3e760ab4a8ab20"
string(64) "a2939a9163cb7c796ec28e01028489e72475c136b2697ea59e3e760ab4a8ab20"

# sodium_crypto_generichash_init

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_generichash_init — Inicializa un hachage para el streaming

### Descripción

**sodium_crypto_generichash_init**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key = "", [int](#language.types.integer) $length = **[SODIUM_CRYPTO_GENERICHASH_BYTES](#constant.sodium-crypto-generichash-bytes)**): [string](#language.types.string)

El método de inicialización para la API de hachage genérico en streaming.

### Parámetros

    key


      La clave de hachage genérico.






    length


      El tamaño de la salida esperada de la función de hachage.


### Valores devueltos

Devuelve un estado de hachage, serializado en forma de una string binaria bruta.

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_generichash_init()**

&lt;?php
$messages = [random_bytes(32), random_bytes(32), random_bytes(16)];
$state = sodium_crypto_generichash_init('', 32);
foreach ($messages as $message) {
    sodium_crypto_generichash_update($state, $message);
}
$final = sodium_crypto_generichash_final($state, 32);
var_dump(sodium_bin2hex($final));
$allAtOnce = sodium_crypto_generichash(implode('', $messages));
var_dump(sodium_bin2hex($allAtOnce));
?&gt;

Resultado del ejemplo anterior es similar a:

string(64) "a2939a9163cb7c796ec28e01028489e72475c136b2697ea59e3e760ab4a8ab20"
string(64) "a2939a9163cb7c796ec28e01028489e72475c136b2697ea59e3e760ab4a8ab20"

# sodium_crypto_generichash_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_generichash_keygen — Genera una clave de hachaje genérico aleatoria

### Descripción

**sodium_crypto_generichash_keygen**(): [string](#language.types.string)

Genera una clave aleatoria para su uso con la API de hachaje genérico.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una clave aleatoria de 256 bits.

# sodium_crypto_generichash_update

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_generichash_update — Añade un mensaje a un hachaje

### Descripción

**sodium_crypto_generichash_update**([string](#language.types.string) &amp;$state, [string](#language.types.string) $message): [true](#language.types.singleton)

Añade un mensaje al estado de hachaje interno.

### Parámetros

    state


      El valor de retorno de [sodium_crypto_generichash_init()](#function.sodium-crypto-generichash-init).






    message


      Los datos a añadir al estado de hachaje.


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_generichash_update()**

&lt;?php
$messages = [random_bytes(32), random_bytes(32), random_bytes(16)];
$state = sodium_crypto_generichash_init();
foreach ($messages as $message) {
    sodium_crypto_generichash_update($state, $message);
}
$final = sodium_crypto_generichash_final($state);
var_dump(sodium_bin2hex($final));

$allAtOnce = sodium_crypto_generichash(implode('', $messages));
var_dump(sodium_bin2hex($allAtOnce));
?&gt;

Resultado del ejemplo anterior es similar a:

string(64) "e16e28bbbbcc39d9f5b1cbc33c41f1d217808640103e57a41f24870f79831e04"
string(64) "e16e28bbbbcc39d9f5b1cbc33c41f1d217808640103e57a41f24870f79831e04"

# sodium_crypto_kdf_derive_from_key

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kdf_derive_from_key — Deriva una subclave

### Descripción

**sodium_crypto_kdf_derive_from_key**(
    [int](#language.types.integer) $subkey_length,
    [int](#language.types.integer) $subkey_id,
    [string](#language.types.string) $context,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Deriva una subclave a partir de una clave raíz y un contexto adicional.

Similar a [hash_hkdf()](#function.hash-hkdf).

### Parámetros

    subkey_length


      La longitud de la clave a devolver (en bytes).






    subkey_id


      Devuelve la subclave N-ésima de una clave raíz dada. Útil para la búsqueda.






    context


      El contexto específico de la aplicación.






    key


      La clave raíz a partir de la cual se deriva la subclave.


### Valores devueltos

Una cadena de bytes pseudorandom (binario sin tratar).

# sodium_crypto_kdf_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kdf_keygen — Genera una clave raíz aleatoria para la interfaz KDF

### Descripción

**sodium_crypto_kdf_keygen**(): [string](#language.types.string)

Genera una clave aleatoria adecuada para servir como clave raíz para [sodium_crypto_kdf_derive_from_key()](#function.sodium-crypto-kdf-derive-from-key).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una clave aleatoria de 256 bits.

# sodium_crypto_kx_client_session_keys

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kx_client_session_keys — Calcula las claves de sesión del lado del cliente.

### Descripción

**sodium_crypto_kx_client_session_keys**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $client_key_pair, [string](#language.types.string) $server_key): [array](#language.types.array)

Calcula las claves de sesión del lado del cliente, utilizando el método de intercambio de claves X25519 + BLAKE2b.

### Parámetros

    client_key_pair


      Un par de claves crypto_kx, como las generadas por [sodium_crypto_kx_keypair()](#function.sodium-crypto-kx-keypair).






    server_key


      Una clave pública crypto_kx.


### Valores devueltos

Un array compuesto de dos strings. La primera debe ser utilizada para recibir datos del servidor. La segunda debe ser utilizada para enviar datos al servidor.

# sodium_crypto_kx_keypair

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kx_keypair — Crear una nueva pareja de claves sodium

### Descripción

**sodium_crypto_kx_keypair**(): [string](#language.types.string)

Crear una nueva pareja de claves sodium compuesta por la clave secreta (32 bytes)
seguida de la clave pública (32 bytes). Las claves pueden ser recuperadas llamando a
[sodium_crypto_kx_secretkey()](#function.sodium-crypto-kx-secretkey) y
[sodium_crypto_kx_publickey()](#function.sodium-crypto-kx-publickey), respectivamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la nueva pareja de claves en caso de éxito; lanza una excepción en caso contrario.

### Ejemplos

**Ejemplo #1 sodium_crypto_kx_keypair()** uso

    Crear una nueva pareja de claves y recuperar la clave secreta y la clave pública asociada.

&lt;?php
$keypair = sodium_crypto_kx_keypair();
$secret = sodium_crypto_kx_secretkey($keypair);
$public = sodium_crypto_kx_publickey($keypair);
printf("secret: %s\npublic: %s", sodium_bin2hex($secret), sodium_bin2hex($public));
?&gt;

Resultado del ejemplo anterior es similar a:

secret: e7c5c918fdc40762e6000542c0118f4368ce8fd242b0e48c1e17202797a25daf
public: d1f59fda8652caf40ed1a01d2b6f3802b60846986372cd8fa337b7c12c428b18

# sodium_crypto_kx_publickey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kx_publickey — Extrae la clave pública de un par de claves crypto_kx

### Descripción

**sodium_crypto_kx_publickey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Extrae la clave pública de un par de claves crypto_kx.

### Parámetros

    key_pair


      Un par de claves X25519, tal como el generado por
      [sodium_crypto_kx_keypair()](#function.sodium-crypto-kx-keypair).


### Valores devueltos

Una clave pública X25519.

# sodium_crypto_kx_secretkey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kx_secretkey — Extrae la clave secreta de un par de claves crypto_kx

### Descripción

**sodium_crypto_kx_secretkey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Extrae la clave secreta de un par de claves crypto_kx.

### Parámetros

    key_pair


      Un par de claves X25519, tal como el generado por
      [sodium_crypto_kx_keypair()](#function.sodium-crypto-kx-keypair).


### Valores devueltos

La clave secreta X25519.

# sodium_crypto_kx_seed_keypair

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kx_seed_keypair — Descripción

### Descripción

**sodium_crypto_kx_seed_keypair**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $seed): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    seed





### Valores devueltos

# sodium_crypto_kx_server_session_keys

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_kx_server_session_keys — Calcula las claves de sesión del lado del servidor.

### Descripción

**sodium_crypto_kx_server_session_keys**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $server_key_pair, [string](#language.types.string) $client_key): [array](#language.types.array)

Calcula las claves de sesión del lado del servidor, utilizando el método de intercambio de claves X25519 + BLAKE2b.

### Parámetros

    server_key_pair


      Un par de claves crypto_kx, como el generado por [sodium_crypto_kx_keypair()](#function.sodium-crypto-kx-keypair).






    client_key


      Una clave pública crypto_kx.


### Valores devueltos

Un array compuesto de dos strings. La primera debe ser utilizada para recibir datos del cliente. La segunda debe ser utilizada para enviar datos al cliente.

# sodium_crypto_pwhash

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash — Deriva una clave a partir de una contraseña, utilizando Argon2

### Descripción

**sodium_crypto_pwhash**(
    [int](#language.types.integer) $length,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password,
    [string](#language.types.string) $salt,
    [int](#language.types.integer) $opslimit,
    [int](#language.types.integer) $memlimit,
    [int](#language.types.integer) $algo = **[SODIUM_CRYPTO_PWHASH_ALG_DEFAULT](#constant.sodium-crypto-pwhash-alg-default)**
): [string](#language.types.string)

Esta función proporciona acceso de bajo nivel a la función de derivación de clave crypto_pwhash de libsodium. A menos que haya una razón específica para utilizar esta función, se deben utilizar las funciones [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str) o [password_hash()](#function.password-hash) en su lugar.

Una razón común para utilizar esta función es derivar las semillas para las claves criptográficas a partir de una contraseña y un salt, y luego utilizar estas semillas para generar las claves reales necesarias para un uso específico (por ejemplo, [sodium_crypto_sign_detached()](#function.sodium-crypto-sign-detached)).

### Parámetros

    length


      [int](#language.types.integer); La longitud del hash de la contraseña a generar, en bytes.






    password


      [string](#language.types.string); La contraseña para la cual generar un hash.






    salt


      Un salt para añadir a la contraseña antes del hash. El salt debe ser impredecible, idealmente generado a partir de una buena fuente de números aleatorios como [random_bytes()](#function.random-bytes), y tener una longitud de al menos **[SODIUM_CRYPTO_PWHASH_SALTBYTES](#constant.sodium-crypto-pwhash-saltbytes)** bytes.






    opslimit


      Representa una cantidad máxima de cálculos a realizar. Aumentar este número hará que la función requiera más ciclos de CPU para calcular una clave. Existen constantes disponibles para definir el límite de operaciones a valores adecuados según el uso previsto, en orden de fuerza: **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-opslimit-interactive)**, **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE](#constant.sodium-crypto-pwhash-opslimit-moderate)** y **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-opslimit-sensitive)**.






    memlimit


      La cantidad máxima de RAM que la función utilizará, en bytes. Existen constantes para ayudar a elegir un valor adecuado, en orden de tamaño: **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-memlimit-interactive)**, **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE](#constant.sodium-crypto-pwhash-memlimit-moderate)** y **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-memlimit-sensitive)**. Típicamente, estos valores deberían asociarse con los valores opslimit correspondientes.






    algo


      [int](#language.types.integer) Un número que indica el algoritmo de hash a utilizar. Por defecto **[SODIUM_CRYPTO_PWHASH_ALG_DEFAULT](#constant.sodium-crypto-pwhash-alg-default)** (el algoritmo actualmente recomendado, que puede cambiar de una versión de libsodium a otra), o explícitamente utilizando **[SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13](#constant.sodium-crypto-pwhash-alg-argon2id13)**, representando el algoritmo Argon2id versión 1.3.


### Valores devueltos

Devuelve la clave derivada. El valor de retorno es una cadena binaria del hash, no una representación codificada en ASCII, y no contiene información adicional sobre los parámetros utilizados para crear el hash, por lo que se deberá conservar esta información si alguna vez se necesita verificar la contraseña en el futuro. Utilice [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str) para evitar tener que hacer todo esto.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_pwhash()**

&lt;?php
//Requerido para conservar el salt si alguna vez necesitamos verificar esta contraseña
$salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);
//Utilizar bin2hex para mantener la salida legible
echo bin2hex(
sodium_crypto_pwhash(
16, // == 128 bits
'password',
$salt,
SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE,
SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13
)
);
?&gt;

    Resultado del ejemplo anterior es similar a:

a18f346ba57992eb7e4ae6abf3fd30ee

# sodium_crypto_pwhash_scryptsalsa208sha256

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash_scryptsalsa208sha256 — Deriva una clave a partir de una contraseña, utilizando scrypt

### Descripción

**sodium_crypto_pwhash_scryptsalsa208sha256**(
    [int](#language.types.integer) $length,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password,
    [string](#language.types.string) $salt,
    [int](#language.types.integer) $opslimit,
    [int](#language.types.integer) $memlimit
): [string](#language.types.string)

Esta es la contraparte scrypt de [sodium_crypto_pwhash()](#function.sodium-crypto-pwhash).

Una razón común para utilizar esta función es derivar las semillas para las claves criptográficas a partir de una contraseña y un salt,
y luego utilizar estas semillas para generar las claves reales necesarias para un uso específico (por ejemplo, [sodium_crypto_sign_detached()](#function.sodium-crypto-sign-detached)).

### Parámetros

    length


      La longitud del hash de la contraseña a generar, en bytes.






    password


      La contraseña para la cual se generará un hash.






    salt


      Un salt que se añadirá a la contraseña antes del hash. El salt debe ser impredecible, idealmente generado a partir de una buena fuente de números aleatorios como [random_bytes()](#function.random-bytes), y tener una longitud de al menos **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_SALTBYTES](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-saltbytes)** bytes.






    opslimit


      Representa una cantidad máxima de cálculos a realizar. Aumentar este número hará que la función requiera más ciclos de CPU para calcular una clave. Existen constantes disponibles para definir el límite de operaciones a valores apropiados según el uso previsto, en orden de fuerza: **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_OPSLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-opslimit-interactive)** y **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_OPSLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-opslimit-sensitive)**.






    memlimit


      La cantidad máxima de RAM que la función utilizará, en bytes. Existen constantes para ayudar a elegir un valor apropiado, en orden de tamaño: **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_MEMLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-memlimit-interactive)** y **[SODIUM_CRYPTO_PWHASH_SCRYPTSALSA208SHA256_MEMLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-scryptsalsa208sha256-memlimit-sensitive)**. Típicamente, estas deberían asociarse con los valores opslimit correspondientes.


### Valores devueltos

Una cadena de bytes de la longitud deseada.

# sodium_crypto_pwhash_scryptsalsa208sha256_str

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash_scryptsalsa208sha256_str — Devuelve un hachaje codificado en ASCII

### Descripción

**sodium_crypto_pwhash_scryptsalsa208sha256_str**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password, [int](#language.types.integer) $opslimit, [int](#language.types.integer) $memlimit): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    password









    opslimit









    memlimit





### Valores devueltos

# sodium_crypto_pwhash_scryptsalsa208sha256_str_verify

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash_scryptsalsa208sha256_str_verify — Verifica si la contraseña corresponde a una cadena de hachaje de contraseña

### Descripción

**sodium_crypto_pwhash_scryptsalsa208sha256_str_verify**([string](#language.types.string) $hash, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    hash









    password





### Valores devueltos

# sodium_crypto_pwhash_str

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash_str — Devuelve un hash codificado en ASCII

### Descripción

**sodium_crypto_pwhash_str**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password, [int](#language.types.integer) $opslimit, [int](#language.types.integer) $memlimit): [string](#language.types.string)

Utiliza un algoritmo de hachéo intensivo en CPU y memoria con un sel generado aleatoriamente, y límites de memoria y CPU para generar un hash codificado en ASCII adecuado para el almacenamiento de contraseñas.

### Parámetros

    password


      [string](#language.types.string); La contraseña para la cual se generará un hash.






    opslimit


      Representa una cantidad máxima de cálculos a realizar. Aumentar este número hará que la función requiera más ciclos de CPU para calcular una clave. Existen constantes disponibles para definir el límite de operaciones a valores apropiados según el uso previsto, en orden de fuerza: **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-opslimit-interactive)**, **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE](#constant.sodium-crypto-pwhash-opslimit-moderate)** y **[SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-opslimit-sensitive)**.






    memlimit


      La cantidad máxima de RAM que la función utilizará, en bytes. Existen constantes para ayudar a elegir un valor apropiado, en orden de tamaño: **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE](#constant.sodium-crypto-pwhash-memlimit-interactive)**, **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE](#constant.sodium-crypto-pwhash-memlimit-moderate)** y **[SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE](#constant.sodium-crypto-pwhash-memlimit-sensitive)**. Típicamente, estos valores deberían asociarse con los valores opslimit correspondientes.


### Valores devueltos

Devuelve el hash de la contraseña.

Para producir el mismo hash de contraseña a partir de la misma contraseña, los mismos valores para opslimit y memlimit deben ser utilizados.
Estos valores están integrados en el hash generado, por lo que todo lo necesario para verificar el hash está incluido. Esto permite
a la función [sodium_crypto_pwhash_str_verify()](#function.sodium-crypto-pwhash-str-verify) verificar el hash sin
necesidad de almacenamiento separado para los otros parámetros.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_pwhash_str()**

&lt;?php
$password = 'password';
echo sodium_crypto_pwhash_str(
$password,
SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
);

    Resultado del ejemplo anterior es similar a:

$argon2id$v=19$m=65536,t=2,p=1$oWIfdaXwWwhVmovOBc2NAQ$EbsZ+JnZyyavkafS0hoc4HdaOB0ILWZESAZ7kVGa+Iw

### Notas

**Nota**:

    Los hashes son calculados utilizando el algoritmo Argon2ID,
    proporcionando resistencia tanto a ataques GPU como a ataques por canales laterales.
    A diferencia de la función [password_hash()](#function.password-hash),
    no hay parámetro de sel (un sel es generado automáticamente),
    y los parámetros opslimit y
    memlimit no son opcionales.

### Ver también

    - [sodium_crypto_pwhash_str_verify()](#function.sodium-crypto-pwhash-str-verify) - Verifica que una contraseña corresponde a un hash

    - [sodium_crypto_pwhash()](#function.sodium-crypto-pwhash) - Deriva una clave a partir de una contraseña, utilizando Argon2

    - [password_hash()](#function.password-hash) - Crea una clave de hash para una contraseña

    - [password_verify()](#function.password-verify) - Verifica que una contraseña coincide con un hash

    - [» Libsodium Argon2 docs](https://download.libsodium.org/doc/password_hashing/the_argon2i_function.html)

# sodium_crypto_pwhash_str_needs_rehash

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash_str_needs_rehash — Determina si una contraseña debe ser rehacheada

### Descripción

**sodium_crypto_pwhash_str_needs_rehash**([string](#language.types.string) $password, [int](#language.types.integer) $opslimit, [int](#language.types.integer) $memlimit): [bool](#language.types.boolean)

Determina si una contraseña debe ser rehacheada, basado en el hachage actual opslimit y memlimit.

### Parámetros

    password


      El hachage de la contraseña






    opslimit


      La opslimit; ver [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str)






    memlimit


      La memlimit; ver [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str)


### Valores devueltos

Devuelve **[true](#constant.true)** si el memlimit/opslimit proporcionado no corresponde a lo que está almacenado en el hachage.
Devuelve **[false](#constant.false)** si corresponden.

# sodium_crypto_pwhash_str_verify

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_pwhash_str_verify — Verifica que una contraseña corresponde a un hash

### Descripción

**sodium_crypto_pwhash_str_verify**([string](#language.types.string) $hash, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password): [bool](#language.types.boolean)

Verifica que un hash de contraseña creado utilizando [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str) corresponde a una contraseña en texto claro dada. Tenga en cuenta que los argumentos están en el orden inverso de los mismos argumentos en la función similar [password_verify()](#function.password-verify).

### Parámetros

    hash


      Un hash creado por la función [password_hash()](#function.password-hash).






    password


      La contraseña del usuario.


### Valores devueltos

Devuelve **[true](#constant.true)** si la contraseña y el hash coinciden, o **[false](#constant.false)** en caso contrario.

### Notas

**Nota**:

    Los hashes se calculan utilizando el algoritmo Argon2ID, proporcionando resistencia tanto a los ataques GPU como a los ataques por canales laterales.

### Ver también

    - [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str) - Devuelve un hash codificado en ASCII

    - [password_hash()](#function.password-hash) - Crea una clave de hash para una contraseña

    - [password_verify()](#function.password-verify) - Verifica que una contraseña coincide con un hash

# sodium_crypto_scalarmult

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_scalarmult — Calcula un secreto compartido a partir de una clave secreta y una clave pública

### Descripción

**sodium_crypto_scalarmult**([string](#language.types.string) $n, [string](#language.types.string) $p): [string](#language.types.string)

Curva elíptica Diffie-Hellman. Calcula el escalar n veces el punto p, sobre una curva elíptica.

### Parámetros

    n


      Escalar, que es típicamente una clave secreta.






    p


      Un punto (coordenada x), que es típicamente una clave pública.


### Valores devueltos

Una string aleatoria de 32 bytes.

# sodium_crypto_scalarmult_base

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_scalarmult_base — Alias de [sodium_crypto_box_publickey_from_secretkey()](#function.sodium-crypto-box-publickey-from-secretkey)

### Descripción

Esta función es un alias de:
[sodium_crypto_box_publickey_from_secretkey()](#function.sodium-crypto-box-publickey-from-secretkey).

# sodium_crypto_scalarmult_ristretto255

(PHP 8 &gt;= 8.1.1)

sodium_crypto_scalarmult_ristretto255 — Calcula un secreto compartido

### Descripción

**sodium_crypto_scalarmult_ristretto255**([string](#language.types.string) $n, [string](#language.types.string) $p): [string](#language.types.string)

Calcula el escalar n veces el punto p.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    n


      Un escalar, que típicamente es una clave secreta.






    p


      Un punto (coordenada x), que típicamente es una clave pública.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ver también

    - [sodium_crypto_scalarmult_ristretto255_base()](#function.sodium-crypto-scalarmult-ristretto255-base) - Calcula la clave pública a partir de una clave secreta

# sodium_crypto_scalarmult_ristretto255_base

(PHP 8 &gt;= 8.1.1)

sodium_crypto_scalarmult_ristretto255_base — Calcula la clave pública a partir de una clave secreta

### Descripción

**sodium_crypto_scalarmult_ristretto255_base**([string](#language.types.string) $n): [string](#language.types.string)

Dada una clave secreta, calcula la clave pública correspondiente.
Disponible a partir de libsodium 1.0.18.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    n


      Una clave secreta.


### Valores devueltos

Devuelve una [string](#language.types.string) aleatoria de 32 bytes.

### Ver también

    - [sodium_crypto_scalarmult_ristretto255()](#function.sodium-crypto-scalarmult-ristretto255) - Calcula un secreto compartido

# sodium_crypto_secretbox

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretbox — Cifrado autenticado con una clave compartida

### Descripción

**sodium_crypto_secretbox**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

Cifra un mensaje con una clave simétrica (compartida).

### Parámetros

    message


      El mensaje en claro a cifrar.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de largo.
      Este es un límite suficientemente grande para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Devuelve la cadena cifrada.

### Errores/Excepciones

- Si nonce tiene una longitud de bytes diferente de
  [\*\*<a href="#constant.sodium-crypto-secretbox-noncebytes">SODIUM_CRYPTO_SECRETBOX_NONCEBYTES](#constant.sodium-crypto-secretbox-noncebytes)\*\*</a>
  (24 bytes), una [SodiumException](#class.sodiumexception) será lanzada.

- Si key tiene una longitud de bytes diferente de
  [\*\*<a href="#constant.sodium-crypto-secretbox-keybytes">SODIUM_CRYPTO_SECRETBOX_KEYBYTES](#constant.sodium-crypto-secretbox-keybytes)\*\*</a>
  (32 bytes), una [SodiumException](#class.sodiumexception) será lanzada.

- Lanza una [SodiumException](#class.sodiumexception) en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_secretbox()**

&lt;?php
// La $key debe ser mantenida confidencial
$key = sodium_crypto_secretbox_keygen();
// No reutilizar $nonce con la misma clave
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$plaintext = "mensaje a ser cifrado";
$ciphertext = sodium_crypto_secretbox($plaintext, $nonce, $key);

var_dump(bin2hex($ciphertext));
// El mismo nonce y la misma clave son necesarios para descifrar el $ciphertext
var_dump(sodium_crypto_secretbox_open($ciphertext, $nonce, $key));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(78) "3a1fa3e9f7b72ef8be51d40abf8e296c6899c185d07b18b4c93e7f26aa776d24c50852cd6b1076"
string(23) "mensaje a ser cifrado"

### Ver también

    - [sodium_crypto_secretbox_open()](#function.sodium-crypto-secretbox-open) - Desencriptación autenticada con una clave compartida

    - [sodium_crypto_secretbox_keygen()](#function.sodium-crypto-secretbox-keygen) - Genera una clave aleatoria para sodium_crypto_secretbox

    - [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# sodium_crypto_secretbox_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretbox_keygen — Genera una clave aleatoria para sodium_crypto_secretbox

### Descripción

**sodium_crypto_secretbox_keygen**(): [string](#language.types.string)

Genera una clave para ser utilizada con [sodium_crypto_secretbox()](#function.sodium-crypto-secretbox) y [sodium_crypto_secretbox_open()](#function.sodium-crypto-secretbox-open).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la string generada de bytes aleatorios criptográficamente seguros.

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_secretbox_keygen()**

&lt;?php
$key = sodium_crypto_secretbox_keygen();
var_dump( sodium_bin2hex( $key ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

string(64) "88bd1dc51ec81984f3ddc5a8f59a3d95b647e2da3e879f1b9ceb0abd89e7286c"

    **Ejemplo #2
     Comparar sodium_crypto_secretbox_keygen()**
     con [random_bytes()](#function.random-bytes)

&lt;?php
$key = sodium_crypto_secretbox_keygen();
$bytes = random_bytes( SODIUM_CRYPTO_SECRETBOX_KEYBYTES );
var_dump( mb_strlen( $key, '8bit' ) === mb_strlen( $bytes, '8bit' ) );
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [sodium_bin2hex()](#function.sodium-bin2hex) - Codificar en hexadecimal

    - [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# sodium_crypto_secretbox_open

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretbox_open — Desencriptación autenticada con una clave compartida

### Descripción

**sodium_crypto_secretbox_open**([string](#language.types.string) $ciphertext, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)|[false](#language.types.singleton)

Desencriptación de un mensaje cifrado con una clave simétrica (compartida).

### Parámetros

    ciphertext


      Debe estar en el formato proporcionado por [sodium_crypto_secretbox()](#function.sodium-crypto-secretbox)
      (concatenación del texto cifrado y del tag).






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de longitud.
      Este es un límite suficientemente grande para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key


      La clave de cifrado (256 bits).


### Valores devueltos

La cadena desencriptada en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

- Si nonce tiene una longitud de bytes diferente de
  [\*\*<a href="#constant.sodium-crypto-secretbox-noncebytes">SODIUM_CRYPTO_SECRETBOX_NONCEBYTES](#constant.sodium-crypto-secretbox-noncebytes)\*\*</a>
  (24 bytes), se lanzará una [SodiumException](#class.sodiumexception).

- Si key tiene una longitud de bytes diferente de
  [\*\*<a href="#constant.sodium-crypto-secretbox-keybytes">SODIUM_CRYPTO_SECRETBOX_KEYBYTES](#constant.sodium-crypto-secretbox-keybytes)\*\*</a>
  (32 bytes), se lanzará una [SodiumException](#class.sodiumexception).

### Ejemplos

    **Ejemplo #1 Ejemplo de sodium_crypto_secretbox_open()**

&lt;?php
// La $key debe ser mantenida confidencial
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
// No reutilizar $nonce con la misma clave
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$ciphertext = sodium_crypto_secretbox('mensaje a ser cifrado', $nonce, $key);

// El mismo nonce y la misma clave son necesarios para desencriptar el $ciphertext
$plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
if ($plaintext !== false) {
echo $plaintext . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

mensaje a ser cifrado

### Ver también

    - [sodium_crypto_secretbox()](#function.sodium-crypto-secretbox) - Cifrado autenticado con una clave compartida

    - [sodium_crypto_secretbox_keygen()](#function.sodium-crypto-secretbox-keygen) - Genera una clave aleatoria para sodium_crypto_secretbox

    - [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# sodium_crypto_secretstream_xchacha20poly1305_init_pull

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretstream_xchacha20poly1305_init_pull — Inicializa un contexto secretstream para el descifrado

### Descripción

**sodium_crypto_secretstream_xchacha20poly1305_init_pull**([string](#language.types.string) $header, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

Inicializa un contexto secretstream para el descifrado.

### Parámetros

    header


      La cabecera del secretstream. Debe ser uno de los valores producidos por
      [sodium_crypto_secretstream_xchacha20poly1305_init_push()](#function.sodium-crypto-secretstream-xchacha20poly1305-init-push).






    key


      La clave de cifrado (256 bits).


### Valores devueltos

El estado del secretstream.

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_secretstream_xchacha20poly1305_init_pull()**

&lt;?php
function decrypt_file(string $inputFilePath, string $outputFilePath, string $key): void
{
    $inputFile = fopen($inputFilePath, 'rb');
$outputFile = fopen($outputFilePath, 'wb');
$header = fread($inputFile, 24);

    $state = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $key);
    $inputFileSize = fstat($inputFile)['size'];

    // Descifra el fichero y escribe su contenido en el fichero de salida:
    for ($i = 24; $i &lt; $inputFileSize; $i += 8192) {
        $ctxt_chunk = fread($inputFile, 8192);

        // No se utiliza $tag, pero en protocolos reales, puede ser utilizado para cifrar, por ejemplo
        // desencadenar una nueva clave o indicar el final del fichero. Luego, durante el descifrado, se puede
        // verificar este comportamiento.
        [$ptxt_chunk, $tag] = sodium_crypto_secretstream_xchacha20poly1305_pull($state, $ctxt_chunk);
        fwrite($outputFile, $ptxt_chunk);
    }

    sodium_memzero($state);
    fclose($inputFile);
    fclose($outputFile);

}

// sodium_crypto_secretstream_xchacha20poly1305_keygen()
$key = sodium_base642bin('MS0lzb7HC+thY6jY01pkTE/cwsQxnRq0/2L1eL4Hxn8=', SODIUM_BASE64_VARIANT_ORIGINAL);

$example = sodium_hex2bin('971e33b255f0990ef3931caf761c59136efa77b434832f28ec719e3ff73f5aec38b3bba1574ab5b70a8844d8da36a668e802cfea2c');
file_put_contents('hello.enc', $example);
decrypt_file('hello.enc', 'hello.txt.decrypted', $key);
var_dump(file_get_contents('hello.txt.decrypted'));
?&gt;

Resultado del ejemplo anterior es similar a:

string(12) "Hello world!"

# sodium_crypto_secretstream_xchacha20poly1305_init_push

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretstream_xchacha20poly1305_init_push — Inicializa un contexto secretstream para el cifrado

### Descripción

**sodium_crypto_secretstream_xchacha20poly1305_init_push**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [array](#language.types.array)

Inicializa un contexto secretstream para el cifrado.

### Parámetros

    key


      La clave de cifrado. Ver [sodium_crypto_secretstream_xchacha20poly1305_keygen()](#function.sodium-crypto-secretstream-xchacha20poly1305-keygen).


### Valores devueltos

Un array con dos valores de string:

- El estado del secretstream, necesario para las próximas llamadas

- El encabezado del secretstream, que debe ser proporcionado al destinatario para que pueda extraer los datos

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_secretstream_xchacha20poly1305_init_push()**

&lt;?php
function encrypt_file(string $inputFilePath, string $outputFilePath, string $key): void
{
    [$state, $header] = sodium_crypto_secretstream_xchacha20poly1305_init_push($key);

    $inputFile = fopen($inputFilePath, 'rb');
    $outputFile = fopen($outputFilePath, 'wb');
    // Escribe el encabezado:
    fwrite($outputFile, $header);
    $inputFileSize = fstat($inputFile)['size'];

    // Cifra el fichero y escribe su contenido en el fichero de salida:
    for ($i = 0; $i &lt; $inputFileSize; $i += 8175) {
        $ptxt_chunk = fread($inputFile, 8175);
        $ctxt_chunk = sodium_crypto_secretstream_xchacha20poly1305_push($state, $ptxt_chunk);
        fwrite($outputFile, $ctxt_chunk);
    }

    sodium_memzero($state);
    fclose($inputFile);
    fclose($outputFile);

}

// sodium_crypto_secretstream_xchacha20poly1305_keygen()
$key = sodium_base642bin('MS0lzb7HC+thY6jY01pkTE/cwsQxnRq0/2L1eL4Hxn8=', SODIUM_BASE64_VARIANT_ORIGINAL);

file_put_contents('hello.txt', 'Hello world!');
encrypt_file('hello.txt', 'hello.txt.encrypted', $key);
var_dump(sodium_bin2hex(file_get_contents('hello.txt.encrypted')));
?&gt;

Resultado del ejemplo anterior es similar a:

string(106) "971e33b255f0990ef3931caf761c59136efa77b434832f28ec719e3ff73f5aec38b3bba1574ab5b70a8844d8da36a668e802cfea2c"

# sodium_crypto_secretstream_xchacha20poly1305_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretstream_xchacha20poly1305_keygen — Genera una clave secretstream aleatoria.

### Descripción

**sodium_crypto_secretstream_xchacha20poly1305_keygen**(): [string](#language.types.string)

Genera una clave secretstream aleatoria.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una string de bytes aleatorios.

# sodium_crypto_secretstream_xchacha20poly1305_pull

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretstream_xchacha20poly1305_pull — Desencripta un fragmento de datos de un flujo cifrado

### Descripción

**sodium_crypto_secretstream_xchacha20poly1305_pull**([string](#language.types.string) &amp;$state, [string](#language.types.string) $ciphertext, [string](#language.types.string) $additional_data = ""): [array](#language.types.array)|[false](#language.types.singleton)

Desencripta un fragmento de datos de un flujo cifrado.

### Parámetros

    state


      Ver [sodium_crypto_secretstream_xchacha20poly1305_init_pull()](#function.sodium-crypto-secretstream-xchacha20poly1305-init-pull)
      y [sodium_crypto_secretstream_xchacha20poly1305_init_push()](#function.sodium-crypto-secretstream-xchacha20poly1305-init-push)






    ciphertext


      El fragmento de texto cifrado a desencriptar.






    additional_data


      Opcional de datos adicionales a incluir en la etiqueta de autenticación.


### Valores devueltos

Un array con dos valores:

    -

      [string](#language.types.string); el fragmento de texto desencriptado.





    -

      [int](#language.types.integer); Una etiqueta opcional (si se proporciona al enviar). Valores posibles:



       <li>
        **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_MESSAGE](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-message)**:
        la etiqueta más común, que no añade información sobre la naturaleza del mensaje.


       -
        **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-final)**:
        indica que el mensaje marca el final del flujo, y borra la clave secreta utilizada para cifrar la secuencia anterior.


       -
        **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_PUSH](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-push)**:
        indica que el mensaje marca el final de un conjunto de mensajes, pero no el final del flujo.
        Por ejemplo, una enorme cadena JSON enviada en varios fragmentos puede utilizar esta etiqueta para indicar a la aplicación que
        la cadena está completa y que puede ser decodificada. Pero el flujo mismo no está cerrado, y otros datos pueden seguir.


       -
        **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_REKEY](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-rekey)**:
        "olvidar" la clave utilizada para cifrar este mensaje y los anteriores, y derivar una nueva clave secreta.




    </li>

# sodium_crypto_secretstream_xchacha20poly1305_push

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretstream_xchacha20poly1305_push — Cifra un fragmento de datos para que pueda ser descifrado en una API de streaming

### Descripción

**sodium_crypto_secretstream_xchacha20poly1305_push**(
    [string](#language.types.string) &amp;$state,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $additional_data = "",
    [int](#language.types.integer) $tag = **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_MESSAGE](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-message)**
): [string](#language.types.string)

Cifra un fragmento de datos para que pueda ser descifrado en una API de streaming.

### Parámetros

    state


      Ver [sodium_crypto_secretstream_xchacha20poly1305_init_pull()](#function.sodium-crypto-secretstream-xchacha20poly1305-init-pull)
      y [sodium_crypto_secretstream_xchacha20poly1305_init_push()](#function.sodium-crypto-secretstream-xchacha20poly1305-init-push)






    message









    additional_data









    tag


      Opcional. Puede ser utilizado para afirmar el comportamiento de descifrado
      (es decir, el reordenamiento o la indicación del último fragmento en un flujo).




      -
       **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_MESSAGE](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-message)**:
       la etiqueta más común, que no añade información sobre la naturaleza del mensaje.


      -
       **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-final)**:
       indica que el mensaje marca el final del flujo, y borra la clave secreta utilizada para cifrar la secuencia anterior.


      -
       **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_PUSH](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-push)**:
        indica que el mensaje marca el final de un conjunto de mensajes, pero no el final del flujo.
        Por ejemplo, una enorme cadena JSON enviada en varios fragmentos puede utilizar esta etiqueta para indicar a la aplicación que
        la cadena está completa y que puede ser decodificada. Pero el flujo mismo no está cerrado, y otros datos pueden seguir.


      -
       **[SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_REKEY](#constant.sodium-crypto-secretstream-xchacha20poly1305-tag-rekey)**:
       "olvidar" la clave utilizada para cifrar este mensaje y los anteriores, y derivar una nueva clave secreta.




### Valores devueltos

Devuelve el fragmento de texto cifrado.

# sodium_crypto_secretstream_xchacha20poly1305_rekey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_secretstream_xchacha20poly1305_rekey — Pivota explícitamente la clave en el estado secretstream

### Descripción

**sodium_crypto_secretstream_xchacha20poly1305_rekey**([string](#language.types.string) &amp;$state): [void](language.types.void.html)

Pivota explícitamente la clave en el estado secretstream. Reemplaza el valor pasado como argumento.

### Parámetros

    state


      El estado del secretstream.


### Valores devueltos

No se retorna ningún valor.

# sodium_crypto_shorthash

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_shorthash — Calcula un hachage corto de un mensaje y una clave

### Descripción

**sodium_crypto_shorthash**([string](#language.types.string) $message, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

**sodium_crypto_shorthash()** envuelve una función de hachaje llamada
SipHash-2-4, que es ideal para implementar tablas de hachaje que no son susceptibles
a ataques de denegación de servicio por colisión de hachaje (Hash-DoS).

SipHash-2-4 no es una función de hachaje criptográfico general.

### Parámetros

    message


      El mensaje a hachear.






    key


      La clave de hachaje.


### Valores devueltos

# sodium_crypto_shorthash_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_shorthash_keygen — Devuelve bytes aleatorios para la clave

### Descripción

**sodium_crypto_shorthash_keygen**(): [string](#language.types.string)

Devuelve una clave para su uso con [sodium_crypto_shorthash()](#function.sodium-crypto-shorthash).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# sodium_crypto_sign

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign — Firma un mensaje

### Descripción

**sodium_crypto_sign**([string](#language.types.string) $message, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key): [string](#language.types.string)

Firma un mensaje con una clave secreta, que puede ser verificada por la clave pública correspondiente.
Esta función adjunta la firma al mensaje. Ver [sodium_crypto_sign_detached()](#function.sodium-crypto-sign-detached)
para las firmas desvinculadas.

### Parámetros

    message


      El mensaje a firmar.






    secret_key


      La clave secreta. Ver [sodium_crypto_sign_secretkey()](#function.sodium-crypto-sign-secretkey)


### Valores devueltos

El mensaje firmado (no cifrado).

# sodium_crypto_sign_detached

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_detached — Firma el mensaje

### Descripción

**sodium_crypto_sign_detached**([string](#language.types.string) $message, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key): [string](#language.types.string)

Firma un mensaje con una clave secreta, que puede ser verificada por la clave pública correspondiente.
Esta función devuelve una firma desvinculada.

### Parámetros

    message


      El mensaje a firmar.






    secret_key


      La clave secreta. Ver [sodium_crypto_sign_secretkey()](#function.sodium-crypto-sign-secretkey)


### Valores devueltos

La firma criptográfica.

# sodium_crypto_sign_ed25519_pk_to_curve25519

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_ed25519_pk_to_curve25519 — Convierte una clave pública Ed25519 en una clave pública Curve25519

### Descripción

**sodium_crypto_sign_ed25519_pk_to_curve25519**([string](#language.types.string) $public_key): [string](#language.types.string)

Dada una clave pública Ed25519, calcula la clave pública X25519 biracionalmente equivalente.

### Parámetros

    public_key


      La clave pública adecuada para las funciones crypto_sign.


### Valores devueltos

La clave pública adecuada para las funciones crypto_box.

# sodium_crypto_sign_ed25519_sk_to_curve25519

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_ed25519_sk_to_curve25519 — Convierte una clave secreta Ed25519 en una clave secreta Curve25519

### Descripción

**sodium_crypto_sign_ed25519_sk_to_curve25519**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key): [string](#language.types.string)

Dada una clave secreta Ed25519, se calcula la clave secreta X25519 birationnelmente equivalente.

### Parámetros

    secret_key


      La clave secreta apropiada para las funciones crypto_sign.


### Valores devueltos

La clave secreta apropiada para las funciones crypto_box.

# sodium_crypto_sign_keypair

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_keypair — Genera aleatoriamente una clave secreta y una clave pública correspondiente

### Descripción

**sodium_crypto_sign_keypair**(): [string](#language.types.string)

Genera un par de claves Ed25519 aleatorias.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El par de claves Ed25519.

# sodium_crypto_sign_keypair_from_secretkey_and_publickey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_keypair_from_secretkey_and_publickey — Reúne una clave secreta y una clave pública

### Descripción

**sodium_crypto_sign_keypair_from_secretkey_and_publickey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key, [string](#language.types.string) $public_key): [string](#language.types.string)

Reúne una clave secreta y una clave pública.

### Parámetros

    secret_key


      La clave secreta Ed25519






    public_key


      La clave pública


### Valores devueltos

Un par de claves

# sodium_crypto_sign_open

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_open — Verifica que el mensaje firmado posee una firma válida

### Descripción

**sodium_crypto_sign_open**([string](#language.types.string) $signed_message, [string](#language.types.string) $public_key): [string](#language.types.string)|[false](#language.types.singleton)

Verifica la firma adjunta a un mensaje y devuelve el mensaje

### Parámetros

    signed_message


      Un mensaje firmado con [sodium_crypto_sign()](#function.sodium-crypto-sign)






    public_key


      Una clave pública Ed25519


### Valores devueltos

Devuelve el mensaje firmado original en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_sign_publickey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_publickey — Extrae la clave pública Ed25519 de un par de claves

### Descripción

**sodium_crypto_sign_publickey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Extrae la clave pública Ed25519 de un par de claves

### Parámetros

    key_pair


      Un par de claves Ed25519 (ver: [sodium_crypto_sign_keypair()](#function.sodium-crypto-sign-keypair))


### Valores devueltos

La clave pública Ed25519

# sodium_crypto_sign_publickey_from_secretkey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_publickey_from_secretkey — Extrae la clave pública Ed25519 de la clave secreta

### Descripción

**sodium_crypto_sign_publickey_from_secretkey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $secret_key): [string](#language.types.string)

Extrae la clave pública Ed25519 de la clave secreta

### Parámetros

    secret_key


      La clave secreta Ed25519


### Valores devueltos

La clave pública Ed25519

# sodium_crypto_sign_secretkey

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_secretkey — Extrae la clave secreta Ed25519 de un par de claves

### Descripción

**sodium_crypto_sign_secretkey**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key_pair): [string](#language.types.string)

Extrae la clave secreta Ed25519 de un par de claves

### Parámetros

    key_pair


      El par de claves Ed25519 (ver: [sodium_crypto_sign_keypair()](#function.sodium-crypto-sign-keypair))


### Valores devueltos

La clave secreta Ed25519

# sodium_crypto_sign_seed_keypair

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_seed_keypair — Deriva de manera determinista el par de claves a partir de una sola clave

### Descripción

**sodium_crypto_sign_seed_keypair**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $seed): [string](#language.types.string)

Adjunta la semilla para formar una clave secreta, deriva la clave pública y devuelve ambas como un par de claves.

Las funciones \*\_seed_keypair son ideales para generar un par de claves a partir de una contraseña y una sal. Utilice el resultado como seed para generar las claves deseadas.

### Parámetros

    seed


      Algunos datos criptográficos. Debe ser de 32 bytes.


### Valores devueltos

Un par de claves (clave secreta y clave pública)

# sodium_crypto_sign_verify_detached

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_sign_verify_detached — Verifica la firma de un mensaje

### Descripción

**sodium_crypto_sign_verify_detached**([string](#language.types.string) $signature, [string](#language.types.string) $message, [string](#language.types.string) $public_key): [bool](#language.types.boolean)

Verifica la firma de un mensaje

### Parámetros

    signature


      La firma criptográfica obtenida a partir de [sodium_crypto_sign_detached()](#function.sodium-crypto-sign-detached)






    message


      El mensaje a verificar






    public_key


      La clave pública Ed25519


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# sodium_crypto_stream

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_stream — Genera una secuencia de bytes determinista a partir de una semilla

### Descripción

**sodium_crypto_stream**([int](#language.types.integer) $length, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

Genera una secuencia de bytes determinista a partir de una semilla, utilizando el cifrado de flujo XSalsa20.

### Parámetros

    length


      El número de bytes a devolver.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de largo.
      Es un límite lo suficientemente grande como para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key


      La clave de cifrado (256 bits).


### Valores devueltos

Una cadena de bytes pseudoaleatorios.

# sodium_crypto_stream_keygen

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_stream_keygen — Genera una clave de cifrado aleatoria para sodium_crypto_stream

### Descripción

**sodium_crypto_stream_keygen**(): [string](#language.types.string)

Genera una clave para ser utilizada con [sodium_crypto_stream()](#function.sodium-crypto-stream) y [sodium_crypto_stream_xor()](#function.sodium-crypto-stream-xor).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave de cifrado (256 bits).

# sodium_crypto_stream_xchacha20

(PHP 8 &gt;= 8.1.0)

sodium_crypto_stream_xchacha20 — Desarrolla la clave y el nonce en un flujo de claves de bytes pseudoaleatorios

### Descripción

**sodium_crypto_stream_xchacha20**([int](#language.types.integer) $length, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

Desarrolla la clave y el nonce en un flujo de claves de bytes pseudoaleatorios.

### Parámetros

    length


      El número de bytes deseado.






    nonce


      Un nonce de 24 bytes.






    key


      Clave, posiblemente generada por la función [sodium_crypto_stream_xchacha20_keygen()](#function.sodium-crypto-stream-xchacha20-keygen).


### Valores devueltos

Devuelve un flujo pseudoaleatorio que puede ser utilizado con [sodium_crypto_stream_xchacha20_xor()](#function.sodium-crypto-stream-xchacha20-xor).

# sodium_crypto_stream_xchacha20_keygen

(PHP 8 &gt;= 8.1.0)

sodium_crypto_stream_xchacha20_keygen — Devuelve una clave aleatoria segura

### Descripción

**sodium_crypto_stream_xchacha20_keygen**(): [string](#language.types.string)

Devuelve una clave aleatoria segura para ser utilizada con [sodium_crypto_stream_xchacha20()](#function.sodium-crypto-stream-xchacha20).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clave segura de 32 bytes para ser utilizada con [sodium_crypto_stream_xchacha20()](#function.sodium-crypto-stream-xchacha20).

# sodium_crypto_stream_xchacha20_xor

(PHP 8 &gt;= 8.1.0)

sodium_crypto_stream_xchacha20_xor — Cifra un dato utilizando un nonce y una clave secreta (sin autenticación)

### Descripción

**sodium_crypto_stream_xchacha20_xor**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

Cifra un message utilizando un nonce
y una clave secreta key (sin autenticación).

**Precaución**

    Este cifrado no es autentificado y no previene ataques de texto cifrado elegido.
    Asegúrese de combinar el texto cifrado con un código de autenticación de mensaje,
    por ejemplo con la función [sodium_crypto_aead_xchacha20poly1305_ietf_encrypt()](#function.sodium-crypto-aead-xchacha20poly1305-ietf-encrypt),
    o [sodium_crypto_auth()](#function.sodium-crypto-auth).

### Parámetros

    message


      El mensaje a cifrar.






    nonce


      Un nonce de 24 bytes.






    key


      Clave, posiblemente generada por la función [sodium_crypto_stream_xchacha20_keygen()](#function.sodium-crypto-stream-xchacha20-keygen).


### Valores devueltos

El texto cifrado.

### Ver también

    - [sodium_crypto_stream_xchacha20_xor_ic()](#function.sodium-crypto-stream-xchacha20-xor-ic) - Cifra un mensaje utilizando un nonce y una clave secreta (sin autenticación)

# sodium_crypto_stream_xchacha20_xor_ic

(PHP 8 &gt;= 8.2.0)

sodium_crypto_stream_xchacha20_xor_ic — Cifra un mensaje utilizando un nonce y una clave secreta (sin autenticación)

### Descripción

**sodium_crypto_stream_xchacha20_xor_ic**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message,
    [string](#language.types.string) $nonce,
    [int](#language.types.integer) $counter,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key
): [string](#language.types.string)

Esta función es similar a [sodium_crypto_stream_xchacha20_xor()](#function.sodium-crypto-stream-xchacha20-xor)
pero añade la posibilidad de establecer el valor inicial del contador de bloques a un valor distinto de cero.
Esto permite acceder directamente a cualquier bloque sin tener que calcular los anteriores.

**Precaución**

    Este cifrado no está autenticado y no previene los ataques de texto cifrado elegido.
    Asegúrese de combinar el texto cifrado con un código de autenticación de mensaje,
    por ejemplo, con la función [sodium_crypto_aead_xchacha20poly1305_ietf_encrypt()](#function.sodium-crypto-aead-xchacha20poly1305-ietf-encrypt),
    o [sodium_crypto_auth()](#function.sodium-crypto-auth).

### Parámetros

    message


      El mensaje a cifrar.






    nonce


      Un nonce de 24 bytes.






    counter


      El valor inicial del contador de bloques.






    key


      Clave, posiblemente generada por la función [sodium_crypto_stream_xchacha20_keygen()](#function.sodium-crypto-stream-xchacha20-keygen).


### Valores devueltos

El texto cifrado, o o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de sodium_crypto_stream_xchacha20_xor_ic()**

&lt;?php
$n2 = random_bytes(SODIUM_CRYPTO_STREAM_XCHACHA20_NONCEBYTES);
$left = str_repeat("\x01", 64);
$right = str_repeat("\xfe", 64);

// Todo en una vez:
$stream7_unified = sodium_crypto_stream_xchacha20_xor($left . $right, $n2, $key);

// Por partes, con un contador inicial:
$stream7_left  = sodium_crypto_stream_xchacha20_xor_ic($left, $n2, 0, $key);
$stream7_right = sodium_crypto_stream_xchacha20_xor_ic($right, $n2, 1, $key);
$stream7_concat = $stream7_left . $stream7_right;

var_dump(strlen($stream7_concat));
var_dump($stream7_unified === $stream7_concat);
?&gt;

Resultado del ejemplo anterior es similar a:

int(128)
bool(true)

### Ver también

    - [sodium_crypto_stream_xchacha20_xor()](#function.sodium-crypto-stream-xchacha20-xor) - Cifra un dato utilizando un nonce y una clave secreta (sin autenticación)

# sodium_crypto_stream_xor

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_crypto_stream_xor — Cifra un mensaje sin autenticación

### Descripción

**sodium_crypto_stream_xor**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $message, [string](#language.types.string) $nonce, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key): [string](#language.types.string)

Esta función cifra un mensaje con XSalsa20, pero no proporciona ninguna garantía sobre
el texto cifrado.

### Parámetros

    message


      El mensaje a cifrar.






    nonce


      Un número que debe ser utilizado una sola vez, por mensaje. 24 bytes de largo.
      Es un límite suficientemente grande para ser generado aleatoriamente (i.e. [random_bytes()](#function.random-bytes)).






    key


      La clave de cifrado (256 bits).


### Valores devueltos

El mensaje cifrado.

# sodium_hex2bin

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_hex2bin — Decodifica una cadena binaria codificada en hexadecimal

### Descripción

**sodium_hex2bin**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string, [string](#language.types.string) $ignore = ""): [string](#language.types.string)

Decodifica una cadena binaria codificada en hexadecimal.

Al igual que [sodium_bin2hex()](#function.sodium-bin2hex), **sodium_hex2bin()**
son resistentes a ataques por canales secundarios, mientras que [hex2bin()](#function.hex2bin) no lo es.

### Parámetros

    string


      La representación hexadecimal de los datos.






    ignore


      Una cadena de caracteres opcional para los caracteres a ignorar.


### Valores devueltos

Devuelve la representación binaria de los datos de la cadena string.

# sodium_increment

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_increment — Incrementa un número grande

### Descripción

**sodium_increment**([string](#language.types.string) &amp;$string): [void](language.types.void.html)

Trata la string como un entero sin signo en little-endian, luego la incrementa en 1.
Tiempo constante.

### Parámetros

    string


      La string a incrementar.


### Valores devueltos

No se retorna ningún valor.

# sodium_memcmp

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_memcmp — Prueba la igualdad en tiempo constante

### Descripción

**sodium_memcmp**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string1, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string2): [int](#language.types.integer)

Compara dos strings en tiempo constante.

En la práctica, casi siempre se desea utilizar [hash_equals()](#function.hash-equals) en su lugar,
ya que proporciona la misma lógica pero devuelve un [bool](#language.types.boolean) en lugar de un
[int](#language.types.integer). Sin embargo, si se utiliza el valor de retorno de una comparación en un
cálculo que es sensible al tiempo, y se teme que las conversiones bool-to-int provoquen fugas de tiempo,
**sodium_memcmp()** es un reemplazo ideal.

### Parámetros

    string1


      La string a comparar






    string2


      La otra string a comparar


### Valores devueltos

Devuelve 0 si las dos strings son iguales; -1 en caso contrario.

# sodium_memzero

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_memzero — Sobrescribe una string con caracteres NUL

### Descripción

**sodium_memzero**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) &amp;$string): [void](language.types.void.html)

**sodium_memzero()** reemplaza por ceros la string pasada por referencia.

### Parámetros

    string


      String.


### Valores devueltos

No se retorna ningún valor.

# sodium_pad

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_pad — Añade datos de relleno

### Descripción

**sodium_pad**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string, [int](#language.types.integer) $block_size): [string](#language.types.string)

Rellena a la derecha una string hasta la longitud deseada. Seguro en términos de tiempo.

### Parámetros

    string


      La string sin rellenar.






    block_size


      La string será rellenada hasta que sea un múltiplo par del tamaño del bloque.


### Valores devueltos

La string rellenada.

# sodium_unpad

(PHP 7 &gt;= 7.2.0, PHP 8)

sodium_unpad — Elimina los datos de relleno

### Descripción

**sodium_unpad**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string, [int](#language.types.integer) $block_size): [string](#language.types.string)

Elimina los datos de relleno de una string. Seguro en términos de tiempo.

### Parámetros

    string


      La string rellena.






    block_size


      El tamaño del bloque para el relleno.


### Valores devueltos

La string sin relleno.

## Tabla de contenidos

- [sodium_add](#function.sodium-add) — Suma grandes números
- [sodium_base642bin](#function.sodium-base642bin) — Decodifica una cadena codificada en base64 en binario sin tratar.
- [sodium_bin2base64](#function.sodium-bin2base64) — Codifica una string binaria bruta en base64.
- [sodium_bin2hex](#function.sodium-bin2hex) — Codificar en hexadecimal
- [sodium_compare](#function.sodium-compare) — Comparar grandes números
- [sodium_crypto_aead_aegis128l_decrypt](#function.sodium-crypto-aead-aegis128l-decrypt) — Verifica y luego descifra un mensaje con AEGIS-128L
- [sodium_crypto_aead_aegis128l_encrypt](#function.sodium-crypto-aead-aegis128l-encrypt) — Cifra y autentica un mensaje con AEGIS-128L
- [sodium_crypto_aead_aegis128l_keygen](#function.sodium-crypto-aead-aegis128l-keygen) — Genera una clave AEGIS-128L aleatoria
- [sodium_crypto_aead_aegis256_decrypt](#function.sodium-crypto-aead-aegis256-decrypt) — Verifica y luego descifra un mensaje con AEGIS-256
- [sodium_crypto_aead_aegis256_encrypt](#function.sodium-crypto-aead-aegis256-encrypt) — Cifra y autentica un mensaje con AEGIS-256
- [sodium_crypto_aead_aegis256_keygen](#function.sodium-crypto-aead-aegis256-keygen) — Genera una clave AEGIS-256 aleatoria
- [sodium_crypto_aead_aes256gcm_decrypt](#function.sodium-crypto-aead-aes256gcm-decrypt) — Verifica y luego descifra un mensaje con AES-256-GCM
- [sodium_crypto_aead_aes256gcm_encrypt](#function.sodium-crypto-aead-aes256gcm-encrypt) — Cifra y autentica con AES-256-GCM
- [sodium_crypto_aead_aes256gcm_is_available](#function.sodium-crypto-aead-aes256gcm-is-available) — Verifica si el hardware soporta AES256-GCM
- [sodium_crypto_aead_aes256gcm_keygen](#function.sodium-crypto-aead-aes256gcm-keygen) — Genera una clave AES-256-GCM aleatoria
- [sodium_crypto_aead_chacha20poly1305_decrypt](#function.sodium-crypto-aead-chacha20poly1305-decrypt) — Verifica y luego descifra con ChaCha20-Poly1305
- [sodium_crypto_aead_chacha20poly1305_encrypt](#function.sodium-crypto-aead-chacha20poly1305-encrypt) — Cifra y autentica con ChaCha20-Poly1305
- [sodium_crypto_aead_chacha20poly1305_ietf_decrypt](#function.sodium-crypto-aead-chacha20poly1305-ietf-decrypt) — Verifica que el texto cifrado incluye una etiqueta válida
- [sodium_crypto_aead_chacha20poly1305_ietf_encrypt](#function.sodium-crypto-aead-chacha20poly1305-ietf-encrypt) — Cifra un mensaje
- [sodium_crypto_aead_chacha20poly1305_ietf_keygen](#function.sodium-crypto-aead-chacha20poly1305-ietf-keygen) — Genera una clave ChaCha20-Poly1305 (IETF) aleatoria
- [sodium_crypto_aead_chacha20poly1305_keygen](#function.sodium-crypto-aead-chacha20poly1305-keygen) — Genera una clave ChaCha20-Poly1305 aleatoria
- [sodium_crypto_aead_xchacha20poly1305_ietf_decrypt](#function.sodium-crypto-aead-xchacha20poly1305-ietf-decrypt) — (Preferido) Verificar y luego descifrar con XChaCha20-Poly1305
- [sodium_crypto_aead_xchacha20poly1305_ietf_encrypt](#function.sodium-crypto-aead-xchacha20poly1305-ietf-encrypt) — (Preferido) Cifra y luego autentica con XChaCha20-Poly1305
- [sodium_crypto_aead_xchacha20poly1305_ietf_keygen](#function.sodium-crypto-aead-xchacha20poly1305-ietf-keygen) — Genera una clave ChaCha20-Poly1305 aleatoria
- [sodium_crypto_auth](#function.sodium-crypto-auth) — Calcula una etiqueta para el mensaje
- [sodium_crypto_auth_keygen](#function.sodium-crypto-auth-keygen) — Genera una clave aleatoria para sodium_crypto_auth
- [sodium_crypto_auth_verify](#function.sodium-crypto-auth-verify) — Verifica que la etiqueta es válida para el mensaje
- [sodium_crypto_box](#function.sodium-crypto-box) — Cifrado asimétrico autenticado
- [sodium_crypto_box_keypair](#function.sodium-crypto-box-keypair) — Genera aleatoriamente una clave secreta y una clave pública correspondiente
- [sodium_crypto_box_keypair_from_secretkey_and_publickey](#function.sodium-crypto-box-keypair-from-secretkey-and-publickey) — Crear una pareja de claves unificada a partir de una clave secreta y una clave pública
- [sodium_crypto_box_open](#function.sodium-crypto-box-open) — Desencriptación autenticada con clave pública
- [sodium_crypto_box_publickey](#function.sodium-crypto-box-publickey) — Extrae la clave pública de un par de claves crypto_box
- [sodium_crypto_box_publickey_from_secretkey](#function.sodium-crypto-box-publickey-from-secretkey) — Calcula la clave pública a partir de una clave secreta
- [sodium_crypto_box_seal](#function.sodium-crypto-box-seal) — Cifrado anónimo con clave pública
- [sodium_crypto_box_seal_open](#function.sodium-crypto-box-seal-open) — Desencriptación anónima con clave pública
- [sodium_crypto_box_secretkey](#function.sodium-crypto-box-secretkey) — Extrae la clave secreta de un par de claves crypto_box
- [sodium_crypto_box_seed_keypair](#function.sodium-crypto-box-seed-keypair) — Deriva de manera determinista el par de claves a partir de una sola clave
- [sodium_crypto_core_ristretto255_add](#function.sodium-crypto-core-ristretto255-add) — Añade un elemento
- [sodium_crypto_core_ristretto255_from_hash](#function.sodium-crypto-core-ristretto255-from-hash) — Mapea un vector
- [sodium_crypto_core_ristretto255_is_valid_point](#function.sodium-crypto-core-ristretto255-is-valid-point) — Determina si un punto está en la curva ristretto255
- [sodium_crypto_core_ristretto255_random](#function.sodium-crypto-core-ristretto255-random) — Genera una clave aleatoria
- [sodium_crypto_core_ristretto255_scalar_add](#function.sodium-crypto-core-ristretto255-scalar-add) — Añade un valor escalar
- [sodium_crypto_core_ristretto255_scalar_complement](#function.sodium-crypto-core-ristretto255-scalar-complement) — El propósito de sodium_crypto_core_ristretto255_scalar_complement
- [sodium_crypto_core_ristretto255_scalar_invert](#function.sodium-crypto-core-ristretto255-scalar-invert) — Invierte un valor escalar
- [sodium_crypto_core_ristretto255_scalar_mul](#function.sodium-crypto-core-ristretto255-scalar-mul) — Multiplica un valor escalar
- [sodium_crypto_core_ristretto255_scalar_negate](#function.sodium-crypto-core-ristretto255-scalar-negate) — Invierte el signo de un valor escalar
- [sodium_crypto_core_ristretto255_scalar_random](#function.sodium-crypto-core-ristretto255-scalar-random) — Genera una clave aleatoria
- [sodium_crypto_core_ristretto255_scalar_reduce](#function.sodium-crypto-core-ristretto255-scalar-reduce) — Reduce un valor escalar
- [sodium_crypto_core_ristretto255_scalar_sub](#function.sodium-crypto-core-ristretto255-scalar-sub) — Sustrae un valor escalar
- [sodium_crypto_core_ristretto255_sub](#function.sodium-crypto-core-ristretto255-sub) — Sustrae un elemento
- [sodium_crypto_generichash](#function.sodium-crypto-generichash) — Devuelve un hash del mensaje
- [sodium_crypto_generichash_final](#function.sodium-crypto-generichash-final) — Completa el hachado
- [sodium_crypto_generichash_init](#function.sodium-crypto-generichash-init) — Inicializa un hachage para el streaming
- [sodium_crypto_generichash_keygen](#function.sodium-crypto-generichash-keygen) — Genera una clave de hachaje genérico aleatoria
- [sodium_crypto_generichash_update](#function.sodium-crypto-generichash-update) — Añade un mensaje a un hachaje
- [sodium_crypto_kdf_derive_from_key](#function.sodium-crypto-kdf-derive-from-key) — Deriva una subclave
- [sodium_crypto_kdf_keygen](#function.sodium-crypto-kdf-keygen) — Genera una clave raíz aleatoria para la interfaz KDF
- [sodium_crypto_kx_client_session_keys](#function.sodium-crypto-kx-client-session-keys) — Calcula las claves de sesión del lado del cliente.
- [sodium_crypto_kx_keypair](#function.sodium-crypto-kx-keypair) — Crear una nueva pareja de claves sodium
- [sodium_crypto_kx_publickey](#function.sodium-crypto-kx-publickey) — Extrae la clave pública de un par de claves crypto_kx
- [sodium_crypto_kx_secretkey](#function.sodium-crypto-kx-secretkey) — Extrae la clave secreta de un par de claves crypto_kx
- [sodium_crypto_kx_seed_keypair](#function.sodium-crypto-kx-seed-keypair) — Descripción
- [sodium_crypto_kx_server_session_keys](#function.sodium-crypto-kx-server-session-keys) — Calcula las claves de sesión del lado del servidor.
- [sodium_crypto_pwhash](#function.sodium-crypto-pwhash) — Deriva una clave a partir de una contraseña, utilizando Argon2
- [sodium_crypto_pwhash_scryptsalsa208sha256](#function.sodium-crypto-pwhash-scryptsalsa208sha256) — Deriva una clave a partir de una contraseña, utilizando scrypt
- [sodium_crypto_pwhash_scryptsalsa208sha256_str](#function.sodium-crypto-pwhash-scryptsalsa208sha256-str) — Devuelve un hachaje codificado en ASCII
- [sodium_crypto_pwhash_scryptsalsa208sha256_str_verify](#function.sodium-crypto-pwhash-scryptsalsa208sha256-str-verify) — Verifica si la contraseña corresponde a una cadena de hachaje de contraseña
- [sodium_crypto_pwhash_str](#function.sodium-crypto-pwhash-str) — Devuelve un hash codificado en ASCII
- [sodium_crypto_pwhash_str_needs_rehash](#function.sodium-crypto-pwhash-str-needs-rehash) — Determina si una contraseña debe ser rehacheada
- [sodium_crypto_pwhash_str_verify](#function.sodium-crypto-pwhash-str-verify) — Verifica que una contraseña corresponde a un hash
- [sodium_crypto_scalarmult](#function.sodium-crypto-scalarmult) — Calcula un secreto compartido a partir de una clave secreta y una clave pública
- [sodium_crypto_scalarmult_base](#function.sodium-crypto-scalarmult-base) — Alias de sodium_crypto_box_publickey_from_secretkey
- [sodium_crypto_scalarmult_ristretto255](#function.sodium-crypto-scalarmult-ristretto255) — Calcula un secreto compartido
- [sodium_crypto_scalarmult_ristretto255_base](#function.sodium-crypto-scalarmult-ristretto255-base) — Calcula la clave pública a partir de una clave secreta
- [sodium_crypto_secretbox](#function.sodium-crypto-secretbox) — Cifrado autenticado con una clave compartida
- [sodium_crypto_secretbox_keygen](#function.sodium-crypto-secretbox-keygen) — Genera una clave aleatoria para sodium_crypto_secretbox
- [sodium_crypto_secretbox_open](#function.sodium-crypto-secretbox-open) — Desencriptación autenticada con una clave compartida
- [sodium_crypto_secretstream_xchacha20poly1305_init_pull](#function.sodium-crypto-secretstream-xchacha20poly1305-init-pull) — Inicializa un contexto secretstream para el descifrado
- [sodium_crypto_secretstream_xchacha20poly1305_init_push](#function.sodium-crypto-secretstream-xchacha20poly1305-init-push) — Inicializa un contexto secretstream para el cifrado
- [sodium_crypto_secretstream_xchacha20poly1305_keygen](#function.sodium-crypto-secretstream-xchacha20poly1305-keygen) — Genera una clave secretstream aleatoria.
- [sodium_crypto_secretstream_xchacha20poly1305_pull](#function.sodium-crypto-secretstream-xchacha20poly1305-pull) — Desencripta un fragmento de datos de un flujo cifrado
- [sodium_crypto_secretstream_xchacha20poly1305_push](#function.sodium-crypto-secretstream-xchacha20poly1305-push) — Cifra un fragmento de datos para que pueda ser descifrado en una API de streaming
- [sodium_crypto_secretstream_xchacha20poly1305_rekey](#function.sodium-crypto-secretstream-xchacha20poly1305-rekey) — Pivota explícitamente la clave en el estado secretstream
- [sodium_crypto_shorthash](#function.sodium-crypto-shorthash) — Calcula un hachage corto de un mensaje y una clave
- [sodium_crypto_shorthash_keygen](#function.sodium-crypto-shorthash-keygen) — Devuelve bytes aleatorios para la clave
- [sodium_crypto_sign](#function.sodium-crypto-sign) — Firma un mensaje
- [sodium_crypto_sign_detached](#function.sodium-crypto-sign-detached) — Firma el mensaje
- [sodium_crypto_sign_ed25519_pk_to_curve25519](#function.sodium-crypto-sign-ed25519-pk-to-curve25519) — Convierte una clave pública Ed25519 en una clave pública Curve25519
- [sodium_crypto_sign_ed25519_sk_to_curve25519](#function.sodium-crypto-sign-ed25519-sk-to-curve25519) — Convierte una clave secreta Ed25519 en una clave secreta Curve25519
- [sodium_crypto_sign_keypair](#function.sodium-crypto-sign-keypair) — Genera aleatoriamente una clave secreta y una clave pública correspondiente
- [sodium_crypto_sign_keypair_from_secretkey_and_publickey](#function.sodium-crypto-sign-keypair-from-secretkey-and-publickey) — Reúne una clave secreta y una clave pública
- [sodium_crypto_sign_open](#function.sodium-crypto-sign-open) — Verifica que el mensaje firmado posee una firma válida
- [sodium_crypto_sign_publickey](#function.sodium-crypto-sign-publickey) — Extrae la clave pública Ed25519 de un par de claves
- [sodium_crypto_sign_publickey_from_secretkey](#function.sodium-crypto-sign-publickey-from-secretkey) — Extrae la clave pública Ed25519 de la clave secreta
- [sodium_crypto_sign_secretkey](#function.sodium-crypto-sign-secretkey) — Extrae la clave secreta Ed25519 de un par de claves
- [sodium_crypto_sign_seed_keypair](#function.sodium-crypto-sign-seed-keypair) — Deriva de manera determinista el par de claves a partir de una sola clave
- [sodium_crypto_sign_verify_detached](#function.sodium-crypto-sign-verify-detached) — Verifica la firma de un mensaje
- [sodium_crypto_stream](#function.sodium-crypto-stream) — Genera una secuencia de bytes determinista a partir de una semilla
- [sodium_crypto_stream_keygen](#function.sodium-crypto-stream-keygen) — Genera una clave de cifrado aleatoria para sodium_crypto_stream
- [sodium_crypto_stream_xchacha20](#function.sodium-crypto-stream-xchacha20) — Desarrolla la clave y el nonce en un flujo de claves de bytes pseudoaleatorios
- [sodium_crypto_stream_xchacha20_keygen](#function.sodium-crypto-stream-xchacha20-keygen) — Devuelve una clave aleatoria segura
- [sodium_crypto_stream_xchacha20_xor](#function.sodium-crypto-stream-xchacha20-xor) — Cifra un dato utilizando un nonce y una clave secreta (sin autenticación)
- [sodium_crypto_stream_xchacha20_xor_ic](#function.sodium-crypto-stream-xchacha20-xor-ic) — Cifra un mensaje utilizando un nonce y una clave secreta (sin autenticación)
- [sodium_crypto_stream_xor](#function.sodium-crypto-stream-xor) — Cifra un mensaje sin autenticación
- [sodium_hex2bin](#function.sodium-hex2bin) — Decodifica una cadena binaria codificada en hexadecimal
- [sodium_increment](#function.sodium-increment) — Incrementa un número grande
- [sodium_memcmp](#function.sodium-memcmp) — Prueba la igualdad en tiempo constante
- [sodium_memzero](#function.sodium-memzero) — Sobrescribe una string con caracteres NUL
- [sodium_pad](#function.sodium-pad) — Añade datos de relleno
- [sodium_unpad](#function.sodium-unpad) — Elimina los datos de relleno

# La clase SodiumException

(PHP 7 &gt;= 7.2.0, PHP 8)

## Introducción

    Excepción lanzada por las funciones sodium.

## Sinopsis de la Clase

     class **SodiumException**



     extends
      [Exception](#class.exception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

- [Introducción](#intro.sodium)
- [Instalación/Configuración](#sodium.setup)<li>[Requerimientos](#sodium.requirements)
- [Instalación](#sodium.installation)
  </li>- [Constantes predefinidas](#sodium.constants)
- [Sodium Funciones](#ref.sodium)<li>[sodium_add](#function.sodium-add) — Suma grandes números
- [sodium_base642bin](#function.sodium-base642bin) — Decodifica una cadena codificada en base64 en binario sin tratar.
- [sodium_bin2base64](#function.sodium-bin2base64) — Codifica una string binaria bruta en base64.
- [sodium_bin2hex](#function.sodium-bin2hex) — Codificar en hexadecimal
- [sodium_compare](#function.sodium-compare) — Comparar grandes números
- [sodium_crypto_aead_aegis128l_decrypt](#function.sodium-crypto-aead-aegis128l-decrypt) — Verifica y luego descifra un mensaje con AEGIS-128L
- [sodium_crypto_aead_aegis128l_encrypt](#function.sodium-crypto-aead-aegis128l-encrypt) — Cifra y autentica un mensaje con AEGIS-128L
- [sodium_crypto_aead_aegis128l_keygen](#function.sodium-crypto-aead-aegis128l-keygen) — Genera una clave AEGIS-128L aleatoria
- [sodium_crypto_aead_aegis256_decrypt](#function.sodium-crypto-aead-aegis256-decrypt) — Verifica y luego descifra un mensaje con AEGIS-256
- [sodium_crypto_aead_aegis256_encrypt](#function.sodium-crypto-aead-aegis256-encrypt) — Cifra y autentica un mensaje con AEGIS-256
- [sodium_crypto_aead_aegis256_keygen](#function.sodium-crypto-aead-aegis256-keygen) — Genera una clave AEGIS-256 aleatoria
- [sodium_crypto_aead_aes256gcm_decrypt](#function.sodium-crypto-aead-aes256gcm-decrypt) — Verifica y luego descifra un mensaje con AES-256-GCM
- [sodium_crypto_aead_aes256gcm_encrypt](#function.sodium-crypto-aead-aes256gcm-encrypt) — Cifra y autentica con AES-256-GCM
- [sodium_crypto_aead_aes256gcm_is_available](#function.sodium-crypto-aead-aes256gcm-is-available) — Verifica si el hardware soporta AES256-GCM
- [sodium_crypto_aead_aes256gcm_keygen](#function.sodium-crypto-aead-aes256gcm-keygen) — Genera una clave AES-256-GCM aleatoria
- [sodium_crypto_aead_chacha20poly1305_decrypt](#function.sodium-crypto-aead-chacha20poly1305-decrypt) — Verifica y luego descifra con ChaCha20-Poly1305
- [sodium_crypto_aead_chacha20poly1305_encrypt](#function.sodium-crypto-aead-chacha20poly1305-encrypt) — Cifra y autentica con ChaCha20-Poly1305
- [sodium_crypto_aead_chacha20poly1305_ietf_decrypt](#function.sodium-crypto-aead-chacha20poly1305-ietf-decrypt) — Verifica que el texto cifrado incluye una etiqueta válida
- [sodium_crypto_aead_chacha20poly1305_ietf_encrypt](#function.sodium-crypto-aead-chacha20poly1305-ietf-encrypt) — Cifra un mensaje
- [sodium_crypto_aead_chacha20poly1305_ietf_keygen](#function.sodium-crypto-aead-chacha20poly1305-ietf-keygen) — Genera una clave ChaCha20-Poly1305 (IETF) aleatoria
- [sodium_crypto_aead_chacha20poly1305_keygen](#function.sodium-crypto-aead-chacha20poly1305-keygen) — Genera una clave ChaCha20-Poly1305 aleatoria
- [sodium_crypto_aead_xchacha20poly1305_ietf_decrypt](#function.sodium-crypto-aead-xchacha20poly1305-ietf-decrypt) — (Preferido) Verificar y luego descifrar con XChaCha20-Poly1305
- [sodium_crypto_aead_xchacha20poly1305_ietf_encrypt](#function.sodium-crypto-aead-xchacha20poly1305-ietf-encrypt) — (Preferido) Cifra y luego autentica con XChaCha20-Poly1305
- [sodium_crypto_aead_xchacha20poly1305_ietf_keygen](#function.sodium-crypto-aead-xchacha20poly1305-ietf-keygen) — Genera una clave ChaCha20-Poly1305 aleatoria
- [sodium_crypto_auth](#function.sodium-crypto-auth) — Calcula una etiqueta para el mensaje
- [sodium_crypto_auth_keygen](#function.sodium-crypto-auth-keygen) — Genera una clave aleatoria para sodium_crypto_auth
- [sodium_crypto_auth_verify](#function.sodium-crypto-auth-verify) — Verifica que la etiqueta es válida para el mensaje
- [sodium_crypto_box](#function.sodium-crypto-box) — Cifrado asimétrico autenticado
- [sodium_crypto_box_keypair](#function.sodium-crypto-box-keypair) — Genera aleatoriamente una clave secreta y una clave pública correspondiente
- [sodium_crypto_box_keypair_from_secretkey_and_publickey](#function.sodium-crypto-box-keypair-from-secretkey-and-publickey) — Crear una pareja de claves unificada a partir de una clave secreta y una clave pública
- [sodium_crypto_box_open](#function.sodium-crypto-box-open) — Desencriptación autenticada con clave pública
- [sodium_crypto_box_publickey](#function.sodium-crypto-box-publickey) — Extrae la clave pública de un par de claves crypto_box
- [sodium_crypto_box_publickey_from_secretkey](#function.sodium-crypto-box-publickey-from-secretkey) — Calcula la clave pública a partir de una clave secreta
- [sodium_crypto_box_seal](#function.sodium-crypto-box-seal) — Cifrado anónimo con clave pública
- [sodium_crypto_box_seal_open](#function.sodium-crypto-box-seal-open) — Desencriptación anónima con clave pública
- [sodium_crypto_box_secretkey](#function.sodium-crypto-box-secretkey) — Extrae la clave secreta de un par de claves crypto_box
- [sodium_crypto_box_seed_keypair](#function.sodium-crypto-box-seed-keypair) — Deriva de manera determinista el par de claves a partir de una sola clave
- [sodium_crypto_core_ristretto255_add](#function.sodium-crypto-core-ristretto255-add) — Añade un elemento
- [sodium_crypto_core_ristretto255_from_hash](#function.sodium-crypto-core-ristretto255-from-hash) — Mapea un vector
- [sodium_crypto_core_ristretto255_is_valid_point](#function.sodium-crypto-core-ristretto255-is-valid-point) — Determina si un punto está en la curva ristretto255
- [sodium_crypto_core_ristretto255_random](#function.sodium-crypto-core-ristretto255-random) — Genera una clave aleatoria
- [sodium_crypto_core_ristretto255_scalar_add](#function.sodium-crypto-core-ristretto255-scalar-add) — Añade un valor escalar
- [sodium_crypto_core_ristretto255_scalar_complement](#function.sodium-crypto-core-ristretto255-scalar-complement) — El propósito de sodium_crypto_core_ristretto255_scalar_complement
- [sodium_crypto_core_ristretto255_scalar_invert](#function.sodium-crypto-core-ristretto255-scalar-invert) — Invierte un valor escalar
- [sodium_crypto_core_ristretto255_scalar_mul](#function.sodium-crypto-core-ristretto255-scalar-mul) — Multiplica un valor escalar
- [sodium_crypto_core_ristretto255_scalar_negate](#function.sodium-crypto-core-ristretto255-scalar-negate) — Invierte el signo de un valor escalar
- [sodium_crypto_core_ristretto255_scalar_random](#function.sodium-crypto-core-ristretto255-scalar-random) — Genera una clave aleatoria
- [sodium_crypto_core_ristretto255_scalar_reduce](#function.sodium-crypto-core-ristretto255-scalar-reduce) — Reduce un valor escalar
- [sodium_crypto_core_ristretto255_scalar_sub](#function.sodium-crypto-core-ristretto255-scalar-sub) — Sustrae un valor escalar
- [sodium_crypto_core_ristretto255_sub](#function.sodium-crypto-core-ristretto255-sub) — Sustrae un elemento
- [sodium_crypto_generichash](#function.sodium-crypto-generichash) — Devuelve un hash del mensaje
- [sodium_crypto_generichash_final](#function.sodium-crypto-generichash-final) — Completa el hachado
- [sodium_crypto_generichash_init](#function.sodium-crypto-generichash-init) — Inicializa un hachage para el streaming
- [sodium_crypto_generichash_keygen](#function.sodium-crypto-generichash-keygen) — Genera una clave de hachaje genérico aleatoria
- [sodium_crypto_generichash_update](#function.sodium-crypto-generichash-update) — Añade un mensaje a un hachaje
- [sodium_crypto_kdf_derive_from_key](#function.sodium-crypto-kdf-derive-from-key) — Deriva una subclave
- [sodium_crypto_kdf_keygen](#function.sodium-crypto-kdf-keygen) — Genera una clave raíz aleatoria para la interfaz KDF
- [sodium_crypto_kx_client_session_keys](#function.sodium-crypto-kx-client-session-keys) — Calcula las claves de sesión del lado del cliente.
- [sodium_crypto_kx_keypair](#function.sodium-crypto-kx-keypair) — Crear una nueva pareja de claves sodium
- [sodium_crypto_kx_publickey](#function.sodium-crypto-kx-publickey) — Extrae la clave pública de un par de claves crypto_kx
- [sodium_crypto_kx_secretkey](#function.sodium-crypto-kx-secretkey) — Extrae la clave secreta de un par de claves crypto_kx
- [sodium_crypto_kx_seed_keypair](#function.sodium-crypto-kx-seed-keypair) — Descripción
- [sodium_crypto_kx_server_session_keys](#function.sodium-crypto-kx-server-session-keys) — Calcula las claves de sesión del lado del servidor.
- [sodium_crypto_pwhash](#function.sodium-crypto-pwhash) — Deriva una clave a partir de una contraseña, utilizando Argon2
- [sodium_crypto_pwhash_scryptsalsa208sha256](#function.sodium-crypto-pwhash-scryptsalsa208sha256) — Deriva una clave a partir de una contraseña, utilizando scrypt
- [sodium_crypto_pwhash_scryptsalsa208sha256_str](#function.sodium-crypto-pwhash-scryptsalsa208sha256-str) — Devuelve un hachaje codificado en ASCII
- [sodium_crypto_pwhash_scryptsalsa208sha256_str_verify](#function.sodium-crypto-pwhash-scryptsalsa208sha256-str-verify) — Verifica si la contraseña corresponde a una cadena de hachaje de contraseña
- [sodium_crypto_pwhash_str](#function.sodium-crypto-pwhash-str) — Devuelve un hash codificado en ASCII
- [sodium_crypto_pwhash_str_needs_rehash](#function.sodium-crypto-pwhash-str-needs-rehash) — Determina si una contraseña debe ser rehacheada
- [sodium_crypto_pwhash_str_verify](#function.sodium-crypto-pwhash-str-verify) — Verifica que una contraseña corresponde a un hash
- [sodium_crypto_scalarmult](#function.sodium-crypto-scalarmult) — Calcula un secreto compartido a partir de una clave secreta y una clave pública
- [sodium_crypto_scalarmult_base](#function.sodium-crypto-scalarmult-base) — Alias de sodium_crypto_box_publickey_from_secretkey
- [sodium_crypto_scalarmult_ristretto255](#function.sodium-crypto-scalarmult-ristretto255) — Calcula un secreto compartido
- [sodium_crypto_scalarmult_ristretto255_base](#function.sodium-crypto-scalarmult-ristretto255-base) — Calcula la clave pública a partir de una clave secreta
- [sodium_crypto_secretbox](#function.sodium-crypto-secretbox) — Cifrado autenticado con una clave compartida
- [sodium_crypto_secretbox_keygen](#function.sodium-crypto-secretbox-keygen) — Genera una clave aleatoria para sodium_crypto_secretbox
- [sodium_crypto_secretbox_open](#function.sodium-crypto-secretbox-open) — Desencriptación autenticada con una clave compartida
- [sodium_crypto_secretstream_xchacha20poly1305_init_pull](#function.sodium-crypto-secretstream-xchacha20poly1305-init-pull) — Inicializa un contexto secretstream para el descifrado
- [sodium_crypto_secretstream_xchacha20poly1305_init_push](#function.sodium-crypto-secretstream-xchacha20poly1305-init-push) — Inicializa un contexto secretstream para el cifrado
- [sodium_crypto_secretstream_xchacha20poly1305_keygen](#function.sodium-crypto-secretstream-xchacha20poly1305-keygen) — Genera una clave secretstream aleatoria.
- [sodium_crypto_secretstream_xchacha20poly1305_pull](#function.sodium-crypto-secretstream-xchacha20poly1305-pull) — Desencripta un fragmento de datos de un flujo cifrado
- [sodium_crypto_secretstream_xchacha20poly1305_push](#function.sodium-crypto-secretstream-xchacha20poly1305-push) — Cifra un fragmento de datos para que pueda ser descifrado en una API de streaming
- [sodium_crypto_secretstream_xchacha20poly1305_rekey](#function.sodium-crypto-secretstream-xchacha20poly1305-rekey) — Pivota explícitamente la clave en el estado secretstream
- [sodium_crypto_shorthash](#function.sodium-crypto-shorthash) — Calcula un hachage corto de un mensaje y una clave
- [sodium_crypto_shorthash_keygen](#function.sodium-crypto-shorthash-keygen) — Devuelve bytes aleatorios para la clave
- [sodium_crypto_sign](#function.sodium-crypto-sign) — Firma un mensaje
- [sodium_crypto_sign_detached](#function.sodium-crypto-sign-detached) — Firma el mensaje
- [sodium_crypto_sign_ed25519_pk_to_curve25519](#function.sodium-crypto-sign-ed25519-pk-to-curve25519) — Convierte una clave pública Ed25519 en una clave pública Curve25519
- [sodium_crypto_sign_ed25519_sk_to_curve25519](#function.sodium-crypto-sign-ed25519-sk-to-curve25519) — Convierte una clave secreta Ed25519 en una clave secreta Curve25519
- [sodium_crypto_sign_keypair](#function.sodium-crypto-sign-keypair) — Genera aleatoriamente una clave secreta y una clave pública correspondiente
- [sodium_crypto_sign_keypair_from_secretkey_and_publickey](#function.sodium-crypto-sign-keypair-from-secretkey-and-publickey) — Reúne una clave secreta y una clave pública
- [sodium_crypto_sign_open](#function.sodium-crypto-sign-open) — Verifica que el mensaje firmado posee una firma válida
- [sodium_crypto_sign_publickey](#function.sodium-crypto-sign-publickey) — Extrae la clave pública Ed25519 de un par de claves
- [sodium_crypto_sign_publickey_from_secretkey](#function.sodium-crypto-sign-publickey-from-secretkey) — Extrae la clave pública Ed25519 de la clave secreta
- [sodium_crypto_sign_secretkey](#function.sodium-crypto-sign-secretkey) — Extrae la clave secreta Ed25519 de un par de claves
- [sodium_crypto_sign_seed_keypair](#function.sodium-crypto-sign-seed-keypair) — Deriva de manera determinista el par de claves a partir de una sola clave
- [sodium_crypto_sign_verify_detached](#function.sodium-crypto-sign-verify-detached) — Verifica la firma de un mensaje
- [sodium_crypto_stream](#function.sodium-crypto-stream) — Genera una secuencia de bytes determinista a partir de una semilla
- [sodium_crypto_stream_keygen](#function.sodium-crypto-stream-keygen) — Genera una clave de cifrado aleatoria para sodium_crypto_stream
- [sodium_crypto_stream_xchacha20](#function.sodium-crypto-stream-xchacha20) — Desarrolla la clave y el nonce en un flujo de claves de bytes pseudoaleatorios
- [sodium_crypto_stream_xchacha20_keygen](#function.sodium-crypto-stream-xchacha20-keygen) — Devuelve una clave aleatoria segura
- [sodium_crypto_stream_xchacha20_xor](#function.sodium-crypto-stream-xchacha20-xor) — Cifra un dato utilizando un nonce y una clave secreta (sin autenticación)
- [sodium_crypto_stream_xchacha20_xor_ic](#function.sodium-crypto-stream-xchacha20-xor-ic) — Cifra un mensaje utilizando un nonce y una clave secreta (sin autenticación)
- [sodium_crypto_stream_xor](#function.sodium-crypto-stream-xor) — Cifra un mensaje sin autenticación
- [sodium_hex2bin](#function.sodium-hex2bin) — Decodifica una cadena binaria codificada en hexadecimal
- [sodium_increment](#function.sodium-increment) — Incrementa un número grande
- [sodium_memcmp](#function.sodium-memcmp) — Prueba la igualdad en tiempo constante
- [sodium_memzero](#function.sodium-memzero) — Sobrescribe una string con caracteres NUL
- [sodium_pad](#function.sodium-pad) — Añade datos de relleno
- [sodium_unpad](#function.sodium-unpad) — Elimina los datos de relleno
  </li>- [SodiumException](#class.sodiumexception) — La clase SodiumException
