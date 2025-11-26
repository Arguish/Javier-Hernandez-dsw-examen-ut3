# HASH Message Digest Framework

# Introducción

Esta extensión proporciona funciones que pueden usarse para el procesamiento directo o
incremental de mensajes de longitud arbitraria utilizando una variedad de
algoritmos de hash, incluyendo la generación de valores HMAC
y derivaciones de claves incluyendo HKDF y
PBKDF2.

Existen aproximadamente tres categorías de algoritmos de hash, y una lista completa de
algoritmos puede encontrarse en la documentación de [hash_algos()](#function.hash-algos).

    -

      Algoritmos de suma de verificación (como "crc32b" o "adler32"):
      Estos se utilizan para calcular sumas de verificación, útiles en situaciones como cuando
      se deben detectar errores de transmisión. Suelen ser muy rápidos. Estos
      algoritmos a menudo generan valores que son fácilmente "adivinables" o pueden ser manipulados
      para crear colisiones, por lo que son completamente inadecuados para uso criptográfico.



    -

      Algoritmos no criptográficos (como la familia xxHash):
      Estos se utilizan a menudo para calcular valores hash para tablas hash, ya que están
      diseñados para ofrecer una buena distribución sobre entradas de string arbitrarias. También
      suelen ser rápidos, pero no son adecuados para uso criptográfico.



    -

      Algoritmos criptográficos (como la familia SHA-2):
      Estos están diseñados para generar valores hash que sean representativos de sus
      entradas pero que no sean adivinables ni propensos a colisiones. El rendimiento suele
      ser una preocupación secundaria, pero el hardware moderno a menudo admite un manejo especial
      para estos algoritmos que PHP intenta utilizar cuando está disponible.


      El Centro de Recursos de Seguridad Informática del NIST tiene
      [» una explicación de los algoritmos
      actualmente aprobados por los Estándares Federales de Procesamiento de Información
      de los Estados Unidos](https://csrc.nist.gov/projects/hash-functions).

     **Precaución**

       Algunos de los primeros algoritmos criptográficos, como "md4",
       "md5" y "sha1", han demostrado
       ser propensos a ataques de colisión y generalmente se recomienda no
       utilizarlos más para aplicaciones criptográficas.





Consulte también las [preguntas frecuentes sobre el Hashing Seguro de Contraseñas](#faq.passwords)
para obtener información sobre las mejores prácticas para el uso de funciones hash en el manejo
de contraseñas.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#hash.installation)
- [Tipos de recursos](#hash.resources)

    ## Instalación

    La extensión Hash es una extensión principal de PHP, por lo que siempre está habilitada.

    Antes de PHP 7.4.0, la extensión Hash se incluía y compilaba con PHP por defecto, pero podía deshabilitarse explícitamente usando **--disable-hash**.

    Antes de 5.1.2, la extensión Hash se instalaba como un
    [» módulo PECL](https://pecl.php.net/package/hash).

    ## Tipos de recursos

    Esta extensión define un recurso de Contexto de Hashing devuelto por
    [hash_init()](#function.hash-init).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[HASH_HMAC](#constant.hash-hmac)**
     ([int](#language.types.integer))



     Flag opcional para [hash_init()](#function.hash-init).
     Indica que el algoritmo de clave HMAC debe ser aplicado al contexto
     actual de hash.

# La clase HashContext

(PHP 7 &gt;= 7.2.0, PHP 8)

## Introducción

## Sinopsis de la Clase

     final
     class **HashContext**
     {

    /* Métodos */

private [\_\_construct](#hashcontext.construct)()

    public [__serialize](#hashcontext.serialize)(): [array](#language.types.array)

public [\_\_unserialize](#hashcontext.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

# HashContext::\_\_construct

(PHP 7 &gt;= 7.2.0, PHP 8)

HashContext::\_\_construct — Constructor privado para prohibir la instanciación directa

### Descripción

private **HashContext::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

# HashContext::\_\_serialize

(PHP 8)

HashContext::\_\_serialize — Serializa el objeto HashContext

### Descripción

public **HashContext::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# HashContext::\_\_unserialize

(PHP 8)

HashContext::\_\_unserialize — Deserializa el parámetro data en un objeto HashContext

### Descripción

public **HashContext::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data


      El valor que se está deserializando.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [HashContext::\_\_construct](#hashcontext.construct) — Constructor privado para prohibir la instanciación directa
- [HashContext::\_\_serialize](#hashcontext.serialize) — Serializa el objeto HashContext
- [HashContext::\_\_unserialize](#hashcontext.unserialize) — Deserializa el parámetro data en un objeto HashContext

# Funciones de hash

# hash

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash — Genera un valor de hachado (huella digital)

### Descripción

**hash**(
    [string](#language.types.string) $algo,
    [string](#language.types.string) $data,
    [bool](#language.types.boolean) $binary = **[false](#constant.false)**,
    [array](#language.types.array) $options = []
): [string](#language.types.string)

### Parámetros

     algo


       Nombre del algoritmo de hachado seleccionado (por ejemplo: "sha256").
       Para una lista de los algoritmos soportados ver [hash_algos()](#function.hash-algos).






     data


       Mensaje a hachar.






     binary


       Cuando vale **[true](#constant.true)**, la salida será datos binarios sin tratar.
       Cuando vale **[false](#constant.false)**, la salida será dígitos hexadecimales en
       minúscula.






     options


       Un array de opciones para los diversos algoritmos de hachado.
       Actualmente, solo el parámetro "seed" es
       soportado para las variantes MurmurHash.





### Valores devueltos

Devuelve un string que contiene la huella digital calculada
en dígitos hexadecimales minúsculos a menos que
binary esté fijado a **[true](#constant.true)**. En este caso, la
representación binaria sin tratar de la huella digital es devuelta.

### Historial de cambios

       Versión
       Descripción






       8.1.0
       El parámetro options ha sido añadido.



       8.0.0

        **hash()** ahora lanza una excepción
        [ValueError](#class.valueerror) si el algo
        es desconocido; anteriormente, **[false](#constant.false)** era devuelto en su lugar.





### Ejemplos

    **Ejemplo #1 Ejemplo con hash()**

&lt;?php
echo hash('sha256', 'The quick brown fox jumped over the lazy dog.');
?&gt;

    El ejemplo anterior mostrará:

68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483

### Ver también

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_file()](#function.hash-file) - Genera un valor de hash utilizando el contenido de un fichero dado

    - [hash_hmac()](#function.hash-hmac) - Genera un valor de clave de hash utilizando el método HMAC

# hash_algos

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_algos — Devuelve una lista de los algoritmos de hash registrados

### Descripción

**hash_algos**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado numéricamente que contiene la lista de algoritmos
de hash disponibles.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Se ha añadido soporte para MurmurHash3 y xxHash.




       7.4.0

        Se ha añadido soporte para crc32c.




       7.1.0

        Se ha añadido soporte para sha512/224, sha512/256, sha3-224, sha3-256, sha3-384 y
        sha3-512.





### Ejemplos

    **Ejemplo #1 Ejemplo con hash_algos()**



     A partir de PHP 8.1.0, **hash_algos()** devolverá la siguiente lista
     de algoritmos:

&lt;?php
print_r(hash_algos());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; md2
[1] =&gt; md4
[2] =&gt; md5
[3] =&gt; sha1
[4] =&gt; sha224
[5] =&gt; sha256
[6] =&gt; sha384
[7] =&gt; sha512/224
[8] =&gt; sha512/256
[9] =&gt; sha512
[10] =&gt; sha3-224
[11] =&gt; sha3-256
[12] =&gt; sha3-384
[13] =&gt; sha3-512
[14] =&gt; ripemd128
[15] =&gt; ripemd160
[16] =&gt; ripemd256
[17] =&gt; ripemd320
[18] =&gt; whirlpool
[19] =&gt; tiger128,3
[20] =&gt; tiger160,3
[21] =&gt; tiger192,3
[22] =&gt; tiger128,4
[23] =&gt; tiger160,4
[24] =&gt; tiger192,4
[25] =&gt; snefru
[26] =&gt; snefru256
[27] =&gt; gost
[28] =&gt; gost-crypto
[29] =&gt; adler32
[30] =&gt; crc32
[31] =&gt; crc32b
[32] =&gt; crc32c
[33] =&gt; fnv132
[34] =&gt; fnv1a32
[35] =&gt; fnv164
[36] =&gt; fnv1a64
[37] =&gt; joaat
[38] =&gt; murmur3a
[39] =&gt; murmur3c
[40] =&gt; murmur3f
[41] =&gt; xxh32
[42] =&gt; xxh64
[43] =&gt; xxh3
[44] =&gt; xxh128
[45] =&gt; haval128,3
[46] =&gt; haval160,3
[47] =&gt; haval192,3
[48] =&gt; haval224,3
[49] =&gt; haval256,3
[50] =&gt; haval128,4
[51] =&gt; haval160,4
[52] =&gt; haval192,4
[53] =&gt; haval224,4
[54] =&gt; haval256,4
[55] =&gt; haval128,5
[56] =&gt; haval160,5
[57] =&gt; haval192,5
[58] =&gt; haval224,5
[59] =&gt; haval256,5
)

### Ver también

- [hash()](#function.hash) - Genera un valor de hachado (huella digital)

- [hash_hmac_algos()](#function.hash-hmac-algos) - Devuelve una lista de algoritmos de hash registrados adecuados para hash_hmac

# hash_copy

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

hash_copy — Copia un contexto de hachado

### Descripción

**hash_copy**([HashContext](#class.hashcontext) $context): [HashContext](#class.hashcontext)

### Parámetros

     context


       Contexto de hachado, retornado por la función
       [hash_init()](#function.hash-init).





### Valores devueltos

Retorna una copia del contexto de hachado Hashing Context.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Acepta y retorna una clase [HashContext](#class.hashcontext) en lugar de un recurso.





### Ejemplos

    **Ejemplo #1 Ejemplo con hash_copy()**

&lt;?php
$context = hash_init("sha256");
hash_update($context, "The quick brown fox ");

/_ copia el contexto para poder continuar utilizándolo _/
$copy_context = hash_copy($context);

echo hash_final($context), "\n";

hash_update($copy_context, "jumped over the lazy dog.");
echo hash_final($copy_context), "\n";
?&gt;

    El ejemplo anterior mostrará:

b29d66e56ed90cce9b0165c43fedec612b60a071974d8be4513e18580d55b5bd
68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483

# hash_equals

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

hash_equals — Comparación de strings resistente a ataques temporales

### Descripción

**hash_equals**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $known_string, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $user_string): [bool](#language.types.boolean)

Verifica si dos strings son iguales sin revelar información
sobre el contenido de known_string mediante el tiempo de ejecución.

Esta función puede ser utilizada para mitigar ataques temporales.
La ejecución de una comparación regular con === tomará más
o menos tiempo dependiendo de si las dos valores son diferentes o no y
según la posición en la que la primera diferencia pueda ser encontrada,
dejando así filtrar información sobre el contenido
de la known_string secreta.

**Precaución**

    Es importante pasar el string proporcionado por el usuario como segundo
    argumento en lugar del primero.

### Parámetros

    known_string


      El string conocido que debe ser mantenido en secreto.






    user_string


      El string proporcionado por el usuario a comparar.


### Valores devueltos

    Retorna **[true](#constant.true)** si los dos strings son iguales, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo dehash_equals()**

&lt;?php
$secretKey = '8uRhAeH89naXfFXKGOEj';

// Value and signature are provided by the user, e.g. within the URL
// and retrieved using $_GET.
$value = 'username=rasmuslerdorf';
$signature = '8c35009d3b50caf7f5d2c1e031842e6b7823a1bb781d33c5237cd27b57b5f327';

if (hash_equals(hash_hmac('sha256', $value, $secretKey), $signature)) {
echo "The value is correctly signed.", PHP_EOL;
} else {
echo "The value was tampered with.", PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

The value is correctly signed.

### Notas

**Nota**:

    Ambos argumentos deben tener la misma longitud para ser comparados con éxito.
    Cuando se pasan argumentos de longitud diferente, **[false](#constant.false)** es retornado inmediatamente y
    la longitud del string conocido puede ser revelada en caso de ataque temporal.

### Ver también

    - [hash_hmac()](#function.hash-hmac) - Genera un valor de clave de hash utilizando el método HMAC

# hash_file

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_file — Genera un valor de hash utilizando el contenido de un fichero dado

### Descripción

**hash_file**(
    [string](#language.types.string) $algo,
    [string](#language.types.string) $filename,
    [bool](#language.types.boolean) $binary = **[false](#constant.false)**,
    [array](#language.types.array) $options = []
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

     algo


       Nombre del algoritmo de hash seleccionado (por ejemplo: "sha256").
       Para una lista de los algoritmos disponibles ver [hash_algos()](#function.hash-algos).






     filename


       URL que indica la ubicación del fichero que será hasheado;
       Soporta los envolventes [fopen()](#function.fopen).






     binary


       Cuando vale **[true](#constant.true)**, la salida será datos binarios sin tratar.
       Cuando vale **[false](#constant.false)**, la salida será dígitos hexadecimales en
       minúscula.






     options


       Un array de opciones para los diversos algoritmos de hash.
       Actualmente, solo el parámetro "seed" es
       soportado para las variantes MurmurHash.





### Valores devueltos

Devuelve un string que contiene la huella digital calculada
en dígitos hexadecimales minúsculos a menos que
binary esté fijado a **[true](#constant.true)**. En este caso, la
representación binaria sin tratar de la huella digital es devuelta, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0
       El parámetro options ha sido añadido.




### Ejemplos

    **Ejemplo #1 Ejemplo con hash_file()**

&lt;?php
/_ Crea un fichero para calcular su huella digital _/
file_put_contents('example.txt', 'The quick brown fox jumped over the lazy dog.');

echo hash_file('sha256', 'example.txt');
?&gt;

    El ejemplo anterior mostrará:

68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483

### Ver también

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_hmac_file()](#function.hash-hmac-file) - Genera un valor de clave de hash utilizando el método HMAC y el contenido de un fichero dado

# hash_final

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_final — Finaliza un hachaje incremental y devuelve el resultado de la huella digital

### Descripción

**hash_final**([HashContext](#class.hashcontext) $context, [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)

### Parámetros

     context


       Contexto de hachaje devuelto por [hash_init()](#function.hash-init).






     binary


       Cuando es **[true](#constant.true)**, la salida será datos brutos binarios.
       Cuando es **[false](#constant.false)**, la salida será dígitos hexadecimales en
       minúscula.





### Valores devueltos

Devuelve una cadena de caracteres que contiene la huella digital calculada
en dígitos hexadecimales en minúscula a menos que
binary esté fijado a **[true](#constant.true)**. En este caso, se devuelve
la representación bruta binaria de la huella digital.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Acepta una [HashContext](#class.hashcontext) en lugar de un recurso.





### Ver también

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_update()](#function.hash-update) - Añade datos en el contexto de hash activo

    - [hash_update_stream()](#function.hash-update-stream) - Introduce datos en un contexto de hash activo desde un flujo abierto

    - [hash_update_file()](#function.hash-update-file) - Se añaden datos en un contexto de hash activo a partir de un fichero

# hash_hkdf

(PHP 7 &gt;= 7.1.2, PHP 8)

hash_hkdf — Genera una derivación de clave HKDF a partir de una clave de entrada proporcionada

### Descripción

**hash_hkdf**(
    [string](#language.types.string) $algo,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key,
    [int](#language.types.integer) $length = 0,
    [string](#language.types.string) $info = "",
    [string](#language.types.string) $salt = ""
): [string](#language.types.string)

### Parámetros

     algo


       Nombre del algoritmo hash seleccionado (por ejemplo, "sha256").
       Para ver una lista de algoritmos soportados, consulte [hash_hmac_algos()](#function.hash-hmac-algos).


**Nota**:

         No se permiten funciones hash no criptográficas.








     key


       Material de clave de entrada (binario sin tratar). No puede estar vacío.






     length


       Longitud deseada de la salida en bytes.
       No puede ser mayor que 255 veces el tamaño de la función hash elegida.




       Si length es 0, la longitud de salida
       será por omisión el tamaño de la función hash elegida.






     info


       String de información específica de la aplicación/contexto.






     salt


       Salt a utilizar durante la derivación.




       Aunque es opcional, añadir un salt aleatorio mejora significativamente la robustez de HKDF.





### Valores devueltos

Devuelve un string que contiene una representación binaria sin tratar de la clave derivada
(también conocida como material de clave de salida - OKM).

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si key
está vacío, algo es desconocido/no criptográfico,
length es menor que 0 o demasiado grande
(mayor que 255 veces el tamaño de la función hash).

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Ahora lanza una excepción [ValueError](#class.valueerror) en caso de error.
        Anteriormente, se devolvía **[false](#constant.false)** y se emitía un mensaje
        **[E_WARNING](#constant.e-warning)**.





### Ejemplos

El ejemplo siguiente produce un par de claves separadas, adecuadas para crear
una construcción de tipo encrypt-then-HMAC, utilizando AES-256 y SHA-256 para
cifrado y autenticación respectivamente.

    **Ejemplo #1 Ejemplo de hash_hkdf()**

&lt;?php
// Generar una clave aleatoria y un salt para fortalecerla durante la derivación.
$inputKey = random_bytes(32);
$salt = random_bytes(16);

// Derivar un par de claves separadas, utilizando la misma entrada creada arriba.
$encryptionKey = hash_hkdf('sha256', $inputKey, 32, 'aes-256-encryption', $salt);
$authenticationKey = hash_hkdf('sha256', $inputKey, 32, 'sha-256-authentication', $salt);

var_dump($encryptionKey !== $authenticationKey); // bool(true)
?&gt;

### Ver también

    - **hash_pbkdf2()**

    - [» RFC 5869](https://datatracker.ietf.org/doc/html/rfc5869)

    - [» implementación en espacio de usuario](https://github.com/narfbg/hash_hkdf_compat)

# hash_hmac

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_hmac — Genera un valor de clave de hash utilizando el método HMAC

### Descripción

**hash_hmac**(
    [string](#language.types.string) $algo,
    [string](#language.types.string) $data,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key,
    [bool](#language.types.boolean) $binary = **[false](#constant.false)**
): [string](#language.types.string)

### Parámetros

     algo


       Nombre del algoritmo de hash seleccionado (por ejemplo: "sha256").
       Para una lista de los algoritmos soportados ver [hash_hmac_algos()](#function.hash-hmac-algos).


**Nota**:

         Las funciones de hash no criptográficas no están permitidas.








     data


       El mensaje que será hasheado.






     key


       Clave secreta compartida utilizada para generar la variación HMAC de
       la huella digital.






     binary


       Cuando es **[true](#constant.true)**, la salida será datos binarios sin tratar.
       Cuando es **[false](#constant.false)**, la salida será dígitos hexadecimales en
       minúscula.





### Valores devueltos

Retorna un string que contiene la huella digital calculada
en dígitos hexadecimales en minúscula a menos que
binary esté fijado a **[true](#constant.true)**. En este caso, la
representación binaria sin tratar de la huella digital es retornada.

### Errores/Excepciones

Levanta una excepción [ValueError](#class.valueerror) si
el argumento algo es desconocido o no es
una función de hash criptográfica.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        **hash_hmac()** ahora levanta una excepción
        [ValueError](#class.valueerror) si el algo
        es desconocido o no es una función de hash criptográfica ;
        anteriormente, **[false](#constant.false)** era retornado en su lugar.




       7.2.0

        El uso de funciones de hash no criptográficas (adler32,
        crc32, crc32b, fnv132, fnv1a32, fnv164, fnv1a64, joaat) ha sido desactivado.





### Ejemplos

    **Ejemplo #1 Ejemplo con hash_hmac()**

&lt;?php
echo hash_hmac('sha256', 'The quick brown fox jumped over the lazy dog.', 'secret');
?&gt;

    El ejemplo anterior mostrará:

9c5c42422b03f0ee32949920649445e417b2c634050833c5165704b825c2a53b

### Ver también

    - [hash_hmac_algos()](#function.hash-hmac-algos) - Devuelve una lista de algoritmos de hash registrados adecuados para hash_hmac

    - [hash_hmac_file()](#function.hash-hmac-file) - Genera un valor de clave de hash utilizando el método HMAC y el contenido de un fichero dado

    - [hash_equals()](#function.hash-equals) - Comparación de strings resistente a ataques temporales

# hash_hmac_algos

(PHP 7 &gt;= 7.2.0, PHP 8)

hash_hmac_algos — Devuelve una lista de algoritmos de hash registrados adecuados para hash_hmac

### Descripción

**hash_hmac_algos**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado numéricamente que contiene la lista de todos los
algoritmos de hash disponibles que son adecuados para [hash_hmac()](#function.hash-hmac).

### Ejemplos

**Ejemplo #1 Ejemplo con hash_hmac_algos()**

&lt;?php
print_r(hash_hmac_algos());

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; md2
[1] =&gt; md4
[2] =&gt; md5
[3] =&gt; sha1
[4] =&gt; sha224
[5] =&gt; sha256
[6] =&gt; sha384
[7] =&gt; sha512/224
[8] =&gt; sha512/256
[9] =&gt; sha512
[10] =&gt; sha3-224
[11] =&gt; sha3-256
[12] =&gt; sha3-384
[13] =&gt; sha3-512
[14] =&gt; ripemd128
[15] =&gt; ripemd160
[16] =&gt; ripemd256
[17] =&gt; ripemd320
[18] =&gt; whirlpool
[19] =&gt; tiger128,3
[20] =&gt; tiger160,3
[21] =&gt; tiger192,3
[22] =&gt; tiger128,4
[23] =&gt; tiger160,4
[24] =&gt; tiger192,4
[25] =&gt; snefru
[26] =&gt; snefru256
[27] =&gt; gost
[28] =&gt; gost-crypto
[29] =&gt; haval128,3
[30] =&gt; haval160,3
[31] =&gt; haval192,3
[32] =&gt; haval224,3
[33] =&gt; haval256,3
[34] =&gt; haval128,4
[35] =&gt; haval160,4
[36] =&gt; haval192,4
[37] =&gt; haval224,4
[38] =&gt; haval256,4
[39] =&gt; haval128,5
[40] =&gt; haval160,5
[41] =&gt; haval192,5
[42] =&gt; haval224,5
[43] =&gt; haval256,5
)

### Notas

**Nota**:

    Antes de PHP 7.2.0 la única forma de recuperar una lista de los algoritmos disponibles
    era llamar a [hash_algos()](#function.hash-algos) que también devolvía
    algoritmos que no son adecuados para [hash_hmac()](#function.hash-hmac).

### Ver también

- [hash_hmac()](#function.hash-hmac) - Genera un valor de clave de hash utilizando el método HMAC

- [hash_algos()](#function.hash-algos) - Devuelve una lista de los algoritmos de hash registrados

# hash_hmac_file

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_hmac_file — Genera un valor de clave de hash utilizando el método HMAC y el contenido de un fichero dado

### Descripción

**hash_hmac_file**(
    [string](#language.types.string) $algo,
    [string](#language.types.string) $filename,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key,
    [bool](#language.types.boolean) $binary = **[false](#constant.false)**
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

     algo


       Nombre del algoritmo de hash seleccionado (por ejemplo: "sha256").
       Para una lista de los algoritmos soportados ver [hash_hmac_algos()](#function.hash-hmac-algos).


**Nota**:

         Las funciones de hash no criptográficas no están autorizadas.








     filename


       URL que indica la ubicación del fichero que será hasheado;
       Soporta las envolturas [fopen()](#function.fopen).






     key


       Clave secreta compartida utilizada para generar la varianza HMAC de
       la huella digital.






     binary


       Cuando vale **[true](#constant.true)**, la salida será datos brutos binarios.
       Cuando vale **[false](#constant.false)**, la salida serán dígitos hexadecimales en
       minúscula.





### Valores devueltos

Devuelve una cadena de caracteres que contiene la huella digital calculada
en dígitos hexadecimales en minúscula a menos que
binary esté fijado a **[true](#constant.true)**. En este caso, se
devuelve la representación bruta binaria de la huella digital.
Devuelve **[false](#constant.false)** si el fichero filename no puede ser leído.

### Errores/Excepciones

Levanta una excepción [ValueError](#class.valueerror) si
el parámetro algo es desconocido o no es
una función de hash criptográfica.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        El uso de funciones de hash no criptográficas (adler32,
        crc32, crc32b, fnv132, fnv1a32, fnv164, fnv1a64, joaat) ha sido desactivado.




       8.0.0

        Levanta una excepción [ValueError](#class.valueerror) a partir de ahora si
        el parámetro algo es desconocido o no es
        una función de hash criptográfica; previamente, **[false](#constant.false)**
        era devuelto en su lugar.





### Ejemplos

    **Ejemplo #1 Ejemplo con hash_hmac_file()**

&lt;?php
/_ Crea un fichero para calcular su huella digital _/
file_put_contents('example.txt', 'The quick brown fox jumped over the lazy dog.');

echo hash_hmac_file('sha256', 'example.txt', 'secret');
?&gt;

    El ejemplo anterior mostrará:

9c5c42422b03f0ee32949920649445e417b2c634050833c5165704b825c2a53b

### Ver también

    - [hash_hmac()](#function.hash-hmac) - Genera un valor de clave de hash utilizando el método HMAC

    - [hash_hmac_algos()](#function.hash-hmac-algos) - Devuelve una lista de algoritmos de hash registrados adecuados para hash_hmac

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_equals()](#function.hash-equals) - Comparación de strings resistente a ataques temporales

# hash_init

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_init — Inicializa un contexto de hachado incremental

### Descripción

**hash_init**(
    [string](#language.types.string) $algo,
    [int](#language.types.integer) $flags = 0,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $key = "",
    [array](#language.types.array) $options = []
): [HashContext](#class.hashcontext)

### Parámetros

     algo


       Nombre del algoritmo de hachado seleccionado (por ejemplo: "sha256").
       Para una lista de los algoritmos soportados ver [hash_algos()](#function.hash-algos).


**Nota**:

         Las funciones de hachado no criptográficas no están permitidas si se especifica el flag **[HASH_HMAC](#constant.hash-hmac)**.








     flags


       Configuraciones opcionales para la generación del hachado, actualmente solo soporta
       una opción:
       **[HASH_HMAC](#constant.hash-hmac)**. Cuando esta opción es especificada, el parámetro
       key *debe* ser especificado.






     key


       Cuando **[HASH_HMAC](#constant.hash-hmac)** es especificada para flags,
       una clave secreta compartida que será utilizada con el método de hachado
       HMAC debe ser proporcionada en este parámetro.






     options


       Un array de opciones para los algoritmos diversos de hachado.
       Actualmente, solo el parámetro "seed" es
       soportado para las variantes MurmurHash.





### Valores devueltos

Retorna el contexto de hachado HashContext para su utilización con
[hash_update()](#function.hash-update), [hash_update_stream()](#function.hash-update-stream),
[hash_update_file()](#function.hash-update-file) y [hash_final()](#function.hash-final).

### Errores/Excepciones

- Levanta una excepción [ValueError](#class.valueerror) si el
  algo es desconocido, si es una función de
  hachado no criptográfica, o si key está vacío.

- Pasar opciones de configuración de tipo incorrecto en
  options emitirá ahora un error
  **[E_DEPRECATED](#constant.e-deprecated)**, ya que pueden ser mal interpretadas.
  Esto resultará en una excepción [ValueError](#class.valueerror) en el futuro.

### Historial de cambios

       Versión
       Descripción






       8.4.0
       Pasar opciones de un tipo incorrecto está ahora desaconsejado.



       8.1.0
       El parámetro options ha sido añadido.



       7.2.0
       El uso de funciones de hachado no criptográficas (adler32, crc32, crc32b, fnv132, fnv1a32, fnv164, fnv1a64, joaat) con **[HASH_HMAC](#constant.hash-hmac)** ha sido desactivado.



       7.2.0

        Retorna una [HashContext](#class.hashcontext) en lugar de un recurso.

       8.0.0

        Levanta una excepción [ValueError](#class.valueerror) ahora si el
        parámetro algo es desconocido o no es
        una función de hachado criptográfica, o si el parámetro
        key está vacío.
        Anteriormente, **[false](#constant.false)** era retornado y un mensaje
        **[E_WARNING](#constant.e-warning)** era emitido.





### Ejemplos

    **Ejemplo #1 Ejemplo de hachado incremental**

&lt;?php
$hash = hash('sha256', 'The quick brown fox jumped over the lazy dog.');

$ctx = hash_init('sha256');
hash_update($ctx, 'The quick brown fox ');
hash_update($ctx, 'jumped over the lazy dog.');
$incremental_hash = hash_final($ctx);

echo $incremental_hash, PHP_EOL;
var_dump($hash === $incremental_hash);
?&gt;

    El ejemplo anterior mostrará:

68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483
bool(true)

### Ver también

    - [hash_algos()](#function.hash-algos) - Devuelve una lista de los algoritmos de hash registrados

    - [hash_update()](#function.hash-update) - Añade datos en el contexto de hash activo

    - [hash_update_file()](#function.hash-update-file) - Se añaden datos en un contexto de hash activo a partir de un fichero

    - [hash_update_stream()](#function.hash-update-stream) - Introduce datos en un contexto de hash activo desde un flujo abierto

    - [hash_final()](#function.hash-final) - Finaliza un hachaje incremental y devuelve el resultado de la huella digital

# hash_pbkdf2

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

hash_pbkdf2 — Genera una clave PBKDF2 derivada de la contraseña proporcionada

### Descripción

**hash_pbkdf2**(
    [string](#language.types.string) $algo,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password,
    [string](#language.types.string) $salt,
    [int](#language.types.integer) $iterations,
    [int](#language.types.integer) $length = 0,
    [bool](#language.types.boolean) $binary = **[false](#constant.false)**,
    [array](#language.types.array) $options = []
): [string](#language.types.string)

### Parámetros

     algo


       Nombre del algoritmo de hash seleccionado (por ejemplo: "sha256").
       Para una lista de los algoritmos soportados ver [hash_hmac_algos()](#function.hash-hmac-algos).


**Nota**:

         Las funciones de hash no criptográficas no están permitidas.








     password


       La contraseña a utilizar para la derivación.






     salt


       El salt a utilizar para la derivación. Este valor debe
       ser generado aleatoriamente.






     iterations


       El número de iteraciones internas para efectuar la
       derivación.






     length


       La longitud de la cadena de salida. Si el parámetro
       binary vale **[true](#constant.true)**, este parámetro
       corresponderá a la longitud, en bytes, de la clave derivada; si
       el parámetro binary vale **[false](#constant.false)**,
       corresponderá al doble de la longitud, en bytes, de la clave
       derivada (ya que cada byte de la clave es devuelto sobre
       dos hexits).




       Si 0 es pasado, la salida completa del algoritmo
       elegido será utilizada.






     binary


       Cuando está definido a **[true](#constant.true)**, la función mostrará los datos
       binarios brutos. Si vale **[false](#constant.false)**, la visualización se hará
       en minúsculas.






     options


       Un array de opciones para los diferentes algoritmos de hash.
       Actualmente, solo la clave "seed" es
       soportada por las variantes MurmurHash.





### Valores devueltos

Devuelve una cadena que contiene la clave derivada en minúsculas,
a menos que el parámetro binary esté
posicionado a **[true](#constant.true)** en cuyo caso, la representación binaria bruta
de la clave derivada será devuelta.

### Errores/Excepciones

Una excepción [ValueError](#class.valueerror) si
el algoritmo no es conocido, si el parámetro iterations
es inferior o igual a 0, si la longitud
length es inferior o igual a 0
o si el salt es demasiado largo
(mayor que **[INT_MAX](#constant.int-max)** - 4).

### Historial de cambios

       Versión
       Descripción






       7.2.0

        El uso de funciones de hash no criptográficas (adler32,
        crc32, crc32b, fnv132, fnv1a32, fnv164, fnv1a64, joaat) ha sido desactivado.




      8.0.0

        Levanta una excepción [ValueError](#class.valueerror) ahora en
        caso de error.
        Anteriormente, **[false](#constant.false)** era devuelto y un mensaje
        **[E_WARNING](#constant.e-warning)** era emitido.





### Ejemplos

    **Ejemplo #1 Ejemplo con hash_pbkdf2()**

&lt;?php
$password = "password";
$iterations = 600000;

// Genera un salt criptográficamente seguro aleatorio usando la función random_bytes(),
$salt = random_bytes(16);

$hash = hash_pbkdf2("sha256", $password, $salt, $iterations, 20);
var_dump($hash);

// Para binario bruto, $length debe ser dividido por dos para resultados equivalentes
$hash = hash_pbkdf2("sha256", $password, $salt, $iterations, 10, true);
var_dump(bin2hex($hash));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(20) "120fb6cffcf8b32c43e7"
string(20) "120fb6cffcf8b32c43e7"

### Notas

**Precaución**

    El método PBKDF2 puede ser utilizado para hashear contraseñas
    para el almacenamiento. Sin embargo, debe tenerse en cuenta que
    la función [password_hash()](#function.password-hash) o la función
    [crypt()](#function.crypt) con la constante **[CRYPT_BLOWFISH](#constant.crypt-blowfish)**
    es mejor para este uso.

### Ver también

    - [password_hash()](#function.password-hash) - Crea una clave de hash para una contraseña

    - [hash_hkdf()](#function.hash-hkdf) - Genera una derivación de clave HKDF a partir de una clave de entrada proporcionada

    - [sodium_crypto_pwhash()](#function.sodium-crypto-pwhash) - Deriva una clave a partir de una contraseña, utilizando Argon2

# hash_update

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_update — Añade datos en el contexto de hash activo

### Descripción

**hash_update**([HashContext](#class.hashcontext) $context, [string](#language.types.string) $data): [true](#language.types.singleton)

### Parámetros

     context


       Contexto de hash devuelto por [hash_init()](#function.hash-init).






     data


       Mensaje que será incluido en la huella de hash.





### Valores devueltos

    Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Posee ahora un tipo de retorno [true](#language.types.singleton) en lugar de
        [bool](#language.types.boolean).




       7.2.0

        Acepta una [HashContext](#class.hashcontext) en lugar de un recurso.





### Ver también

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_update_file()](#function.hash-update-file) - Se añaden datos en un contexto de hash activo a partir de un fichero

    - [hash_update_stream()](#function.hash-update-stream) - Introduce datos en un contexto de hash activo desde un flujo abierto

    - [hash_final()](#function.hash-final) - Finaliza un hachaje incremental y devuelve el resultado de la huella digital

# hash_update_file

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_update_file — Se añaden datos en un contexto de hash activo a partir de un fichero

### Descripción

**hash_update_file**([HashContext](#class.hashcontext) $context, [string](#language.types.string) $filename, [?](#language.types.null)[resource](#language.types.resource) $stream_context = **[null](#constant.null)**): [bool](#language.types.boolean)

### Parámetros

     context


       Contexto de hash devuelto por [hash_init()](#function.hash-init).






     filename


       URL que indica la ubicación del fichero que será hasheado; admite las
       envolturas [fopen()](#function.fopen).






     stream_context


       Contexto de flujo devuelto por
       [stream_context_create()](#function.stream-context-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        stream_context ahora es nullable.




       7.2.0

        Acepta una [HashContext](#class.hashcontext) en lugar de un recurso.





### Ver también

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_update()](#function.hash-update) - Añade datos en el contexto de hash activo

    - [hash_update_stream()](#function.hash-update-stream) - Introduce datos en un contexto de hash activo desde un flujo abierto

    - [hash_final()](#function.hash-final) - Finaliza un hachaje incremental y devuelve el resultado de la huella digital

    - [hash_file()](#function.hash-file) - Genera un valor de hash utilizando el contenido de un fichero dado

# hash_update_stream

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL hash &gt;= 1.1)

hash_update_stream — Introduce datos en un contexto de hash activo desde un flujo abierto

### Descripción

**hash_update_stream**([HashContext](#class.hashcontext) $context, [resource](#language.types.resource) $stream, [int](#language.types.integer) $length = -1): [int](#language.types.integer)

### Parámetros

     context


       Contexto de hash devuelto por [hash_init()](#function.hash-init).






     stream


       Gestor de fichero abierto como el devuelto por cualquier función de creación de flujos.






     length


       Número máximo de caracteres a copiar desde stream
       al contexto de hash.





### Valores devueltos

Número real de bytes añadidos al contexto de hash desde stream.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Acepta [HashContext](#class.hashcontext) en lugar de resource.





### Ejemplos

    **Ejemplo #1 Ejemplo de hash_update_stream()**

&lt;?php
$fp = tmpfile();
fwrite($fp, 'jumped over the lazy dog.');
rewind($fp);

$ctx = hash_init('sha256');
hash_update($ctx, 'The quick brown fox ');
hash_update_stream($ctx, $fp);
echo hash_final($ctx);
?&gt;

    El ejemplo anterior mostrará:

68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483

### Ver también

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [hash_update()](#function.hash-update) - Añade datos en el contexto de hash activo

    - [hash_final()](#function.hash-final) - Finaliza un hachaje incremental y devuelve el resultado de la huella digital

## Tabla de contenidos

- [hash](#function.hash) — Genera un valor de hachado (huella digital)
- [hash_algos](#function.hash-algos) — Devuelve una lista de los algoritmos de hash registrados
- [hash_copy](#function.hash-copy) — Copia un contexto de hachado
- [hash_equals](#function.hash-equals) — Comparación de strings resistente a ataques temporales
- [hash_file](#function.hash-file) — Genera un valor de hash utilizando el contenido de un fichero dado
- [hash_final](#function.hash-final) — Finaliza un hachaje incremental y devuelve el resultado de la huella digital
- [hash_hkdf](#function.hash-hkdf) — Genera una derivación de clave HKDF a partir de una clave de entrada proporcionada
- [hash_hmac](#function.hash-hmac) — Genera un valor de clave de hash utilizando el método HMAC
- [hash_hmac_algos](#function.hash-hmac-algos) — Devuelve una lista de algoritmos de hash registrados adecuados para hash_hmac
- [hash_hmac_file](#function.hash-hmac-file) — Genera un valor de clave de hash utilizando el método HMAC y el contenido de un fichero dado
- [hash_init](#function.hash-init) — Inicializa un contexto de hachado incremental
- [hash_update](#function.hash-update) — Añade datos en el contexto de hash activo
- [hash_update_file](#function.hash-update-file) — Se añaden datos en un contexto de hash activo a partir de un fichero
- [hash_update_stream](#function.hash-update-stream) — Introduce datos en un contexto de hash activo desde un flujo abierto

- [Introducción](#intro.hash)
- [Instalación/Configuración](#hash.setup)<li>[Instalación](#hash.installation)
- [Tipos de recursos](#hash.resources)
  </li>- [Constantes predefinidas](#hash.constants)
- [HashContext](#class.hashcontext) — La clase HashContext<li>[HashContext::\_\_construct](#hashcontext.construct) — Constructor privado para prohibir la instanciación directa
- [HashContext::\_\_serialize](#hashcontext.serialize) — Serializa el objeto HashContext
- [HashContext::\_\_unserialize](#hashcontext.unserialize) — Deserializa el parámetro data en un objeto HashContext
  </li>- [hash_pbkdf2](#ref.hash) — Funciones de hash<li>[hash](#function.hash) — Genera un valor de hachado (huella digital)
- [hash_algos](#function.hash-algos) — Devuelve una lista de los algoritmos de hash registrados
- [hash_copy](#function.hash-copy) — Copia un contexto de hachado
- [hash_equals](#function.hash-equals) — Comparación de strings resistente a ataques temporales
- [hash_file](#function.hash-file) — Genera un valor de hash utilizando el contenido de un fichero dado
- [hash_final](#function.hash-final) — Finaliza un hachaje incremental y devuelve el resultado de la huella digital
- [hash_hkdf](#function.hash-hkdf) — Genera una derivación de clave HKDF a partir de una clave de entrada proporcionada
- [hash_hmac](#function.hash-hmac) — Genera un valor de clave de hash utilizando el método HMAC
- [hash_hmac_algos](#function.hash-hmac-algos) — Devuelve una lista de algoritmos de hash registrados adecuados para hash_hmac
- [hash_hmac_file](#function.hash-hmac-file) — Genera un valor de clave de hash utilizando el método HMAC y el contenido de un fichero dado
- [hash_init](#function.hash-init) — Inicializa un contexto de hachado incremental
- [hash_update](#function.hash-update) — Añade datos en el contexto de hash activo
- [hash_update_file](#function.hash-update-file) — Se añaden datos en un contexto de hash activo a partir de un fichero
- [hash_update_stream](#function.hash-update-stream) — Introduce datos en un contexto de hash activo desde un flujo abierto
  </li>
