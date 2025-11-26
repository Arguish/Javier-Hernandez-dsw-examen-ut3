# Xpass

# Introducción

Esta extensión proporciona algoritmos hash de contraseñas utilizados por las
distribuciones de Linux, utilizando la biblioteca extendida crypt.

También proporciona funciones libxcrypt adicionales que faltan en PHP.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xpass.requirements)
- [Instalación vía PECL](#xpass.installation)

    ## Requerimientos

    Esta extensión requiere
    [» libxcrypt](https://github.com/besser82/libxcrypt)
    versión 4.4 o superior.

    ## Instalación vía PECL

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/xpass](https://pecl.php.net/package/xpass).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

La extensión Xpass proporciona diversos conjuntos de constantes.
Métodos de hash (**[CRYPT*PREFIX*\*](#constant.crypt-prefix-std-des)**) para el
parámetro prefix de [crypt_gensalt()](#function.crypt-gensalt).
Códigos de error (**[CRYPT*SALT*\*](#constant.crypt-salt-ok)**) devueltos por
[crypt_checksalt()](#function.crypt-checksalt).
Algoritmos de contraseña (**[PASSWORD\_\*](#constant.password-bcrypt)**) para el
parámetro algo de [password_hash()](#function.password-hash).

**Métodos de hash**

    **[CRYPT_PREFIX_STD_DES](#constant.crypt-prefix-std-des)**
    ([string](#language.types.string))



     El método de hash original de Unix V7, basado en el cifrado por bloques DES.
     Dado que DES es poco costoso en el hardware moderno,
     solo hay 4096 salts posibles y 2**56 contraseñas distintas,
     que se truncan a 8 caracteres,
     es posible encontrar cualquier contraseña hasheada con este método.
     No debería usarse excepto para soportar sistemas operativos antiguos
     que no soportan ningún otro algoritmo de generación de hash, debido a la debilidad de los hashes DES.





    **[CRYPT_PREFIX_EXT_DES](#constant.crypt-prefix-ext-des)**
    ([string](#language.types.string))



     Una extensión del DES tradicional, que elimina el límite de longitud,
     aumenta el tamaño del salt y hace el costo temporal ajustable.
     Proviene de BSDI BSD/OS y también está disponible en al menos NetBSD,
     OpenBSD y FreeBSD debido al uso de la biblioteca FreeSec de David Burren.
     Es mucho mejor que los hashes DES tradicionales y bigcrypt,
     pero aún no debería usarse para nuevos hashes.





    **[CRYPT_PREFIX_MD5](#constant.crypt-prefix-md5)**
    ([string](#language.types.string))



     Un hash basado en el algoritmo MD5, desarrollado originalmente por Poul-Henning Kamp para FreeBSD.
     Soportado en la mayoría de los Unix libres y versiones más recientes de Solaris.
     No tan débil como los hashes basados en DES,
     pero MD5 es tan poco costoso en el hardware moderno que no debería usarse para nuevos hashes.
     El costo de procesamiento no es ajustable.





    **[CRYPT_PREFIX_BLOWFISH](#constant.crypt-prefix-blowfish)**
    ([string](#language.types.string))



     Un hash basado en el cifrado por bloques Blowfish, modificado para tener un calendario de claves extra-costoso.
     Desarrollado originalmente por Niels Provos y David Mazieres para OpenBSD y también soportado en versiones recientes
     de FreeBSD y NetBSD, en Solaris 10 y más reciente, y en varias distribuciones GNU/*/Linux.





    **[CRYPT_PREFIX_SHA256](#constant.crypt-prefix-sha256)**
    ([string](#language.types.string))



     Un hash basado en SHA-2 con una salida de 256 bits, desarrollado originalmente por Ulrich Drepper para GNU libc.
     Soportado en Linux pero no común en otros lugares.
     Aceptable para nuevos hashes.
     El parámetro de costo de procesamiento por defecto es 5000,
     lo cual es demasiado bajo para el hardware moderno.





    **[CRYPT_PREFIX_SHA512](#constant.crypt-prefix-sha512)**
    ([string](#language.types.string))



     Un hash basado en SHA-2 con una salida de 512 bits, desarrollado originalmente por Ulrich Drepper para GNU libc.
     Soportado en Linux pero no común en otros lugares.
     Aceptable para nuevos hashes.
     El parámetro de costo de procesamiento por defecto es 5000,
     lo cual es demasiado bajo para el hardware moderno.





    **[CRYPT_PREFIX_SCRYPT](#constant.crypt-prefix-scrypt)**
    ([string](#language.types.string))



     Scrypt es una función de derivación de clave basada en contraseña creada por Colin Percival,
     originalmente para el servicio de respaldo en línea Tarsnap.
     El algoritmo fue diseñado específicamente para hacer costosas las ataques de hardware
     personalizados a gran escala al requerir grandes cantidades de memoria.
     En 2016, el algoritmo scrypt fue publicado por el IETF como RFC 7914.





    **[CRYPT_PREFIX_GOST_YESCRYPT](#constant.crypt-prefix-gost-yescrypt)**
    ([string](#language.types.string))



     Gost-yescrypt usa la salida de yescrypt como mensaje de entrada para HMAC con
     la función de hash GOST R 34.11-2012 (Streebog) con un resumen de 256 bits.
     Así, las propiedades criptográficas de yescrypt son suplantadas por las de la función de hash GOST.
     Este método de hash es útil en aplicaciones que requieren un hash de contraseña moderno,
     pero deben basarse en algoritmos GOST.
     La función de hash GOST R 34.11-2012 (Streebog) fue publicada por el IETF como RFC 6986.
     Aceptable para nuevos hashes si es necesario.





    **[CRYPT_PREFIX_YESCRYPT](#constant.crypt-prefix-yescrypt)**
    ([string](#language.types.string))



     Yescrypt es un esquema de hash de contraseña escalable diseñado por Solar Designer,
     que se basa en el scrypt de Colin Percival.
     Aunque la fuerza de yescrypt contra los ataques de adivinación de contraseñas proviene de su diseño de algoritmo,
     su seguridad criptográfica está garantizada por su uso de SHA-256 en la capa externa.
     La función de hash SHA-256 fue publicada por el NIST en el FIPS PUB 180-2
     (y sus revisiones posteriores como el FIPS PUB 180-4) y por el IETF como RFC 4634
     (y posteriormente RFC 6234).
     Recomendado para nuevos hashes.

**Código de error**

    **[CRYPT_SALT_OK](#constant.crypt-salt-ok)**
    ([int](#language.types.integer))



     No hay error.





    **[CRYPT_SALT_INVALID](#constant.crypt-salt-invalid)**
    ([int](#language.types.integer))



     Método de hash desconocido o parámetros inválidos.





    **[CRYPT_SALT_METHOD_DISABLED](#constant.crypt-salt-method-disabled)**
    ([int](#language.types.integer))



     El método de hash ya no está permitido para ser usado.





    **[CRYPT_SALT_METHOD_LEGACY](#constant.crypt-salt-method-legacy)**
    ([int](#language.types.integer))



     El método de hash ya no se considera lo suficientemente fuerte.





    **[CRYPT_SALT_TOO_CHEAP](#constant.crypt-salt-too-cheap)**
    ([int](#language.types.integer))



     El costo de los parámetros se considera demasiado bajo.

**Algoritmo de contraseña**

    **[PASSWORD_SHA512](#constant.password-sha512)**
    ([string](#language.types.string))



     **[PASSWORD_SHA512](#constant.password-sha512)** se usa para crear nuevos hashes
     de contraseña usando el algoritmo **[CRYPT_SHA512](#constant.crypt-sha512)**.





    **[PASSWORD_YESCRYPT](#constant.password-yescrypt)**
    ([string](#language.types.string))



     **[PASSWORD_YESCRYPT](#constant.password-yescrypt)** se usa para crear nuevos hashes
     de contraseña usando el algoritmo **[CRYPT_YESCRYPT](#constant.crypt-yescrypt)**.

# Funciones Xpass

# crypt_checksalt

(PECL xpass &gt;= 1.1.0)

crypt_checksalt — Valida un parámetro de hash de contraseña

### Descripción

**crypt_checksalt**([string](#language.types.string) $salt): [?](#language.types.null)[string](#language.types.string)

Verifica si la cadena de sal cumple con la configuración del sistema y señala si
el método de hash y los parámetros que especifica son aceptables. Está destinado a ser utilizado
para determinar si la contraseña del usuario debe ser rehasheada utilizando el método de hash
actualmente preferido.

### Parámetros

    salt


      La cadena de sal a verificar.


### Valores devueltos

Devuelve una de las constantes
**[CRYPT*SALT*\*](#constant.crypt-salt-*)**
como [int](#language.types.integer).

### Ejemplos

**Ejemplo #1 Un ejemplo de crypt_checksalt()**

&lt;?php
// Genera una sal para un método obsoleto
$salt = crypt_gensalt(CRYPT_PREFIX_STD_DES);
// Verifica la sal
$test = crypt_checksalt($salt);
var_dump($test === CRYPT_SALT_METHOD_LEGACY);

// Genera una sal para un método por defecto
$salt = crypt_gensalt();
// Verifica la sal
$test = crypt_checksalt($salt);
var_dump($test === CRYPT_SALT_OK);
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(true)

### Ver también

- [crypt_gensalt()](#function.crypt-gensalt) - Compila una cadena para usar como argumento de sal para crypt

# crypt_gensalt

(PECL xpass &gt;= 1.1.0)

crypt_gensalt — Compila una cadena para usar como argumento de sal para crypt

### Descripción

**crypt_gensalt**([string](#language.types.string) $prefix = **[null](#constant.null)**, [int](#language.types.integer) $count = 0): [?](#language.types.null)[string](#language.types.string)

Compila una cadena para usar como argumento de sal para [crypt()](#function.crypt).

### Parámetros

    prefix


      El método de hash a usar.
      Una de las constantes **[CRYPT_PREFIX_*](#constant.crypt-prefix-std-des)**.
      Si es **[null](#constant.null)**, se seleccionará el mejor método de hash disponible.




    count


      Controla el costo de procesamiento del hash;
      el rango válido y el significado exacto de count dependen del método de hash,
      pero números más grandes corresponden a hashes más costosos en
      términos de tiempo de CPU y posiblemente de uso de memoria.
      Si count es 0, se seleccionará un costo bajo por defecto.

### Valores devueltos

Devuelve una cadena con el parámetro, o **[null](#constant.null)** en caso de error.

### Ejemplos

**Ejemplo #1 Un ejemplo de crypt_gensalt()**

&lt;?php
// Genera la sal
$salt = crypt_gensalt(CRYPT_PREFIX_BLOWFISH);
// Hashea la contraseña
$hash = crypt("secret", $salt);
// Verifica el hash
$test = hash_equals(crypt("secret", $hash), $hash);
var_dump($salt, $hash, $test);
?&gt;

El ejemplo anterior mostrará:

string(29) "$2y$05$GcPykP.Am8C1.dGamdpwW."
string(60) "$2y$05$GcPykP.Am8C1.dGamdpwW.1RR.7uicWvJPZfJfCEizZHqVWwuaJLm"
bool(true)

### Ver también

- [crypt_preferred_method()](#function.crypt-preferred-method) - Devuelve el prefijo del método de hash preferido

- [crypt()](#function.crypt) - Hash de un solo sentido (indescifrable)

- [hash_equals()](#function.hash-equals) - Comparación de strings resistente a ataques temporales

# crypt_preferred_method

(PECL xpass &gt;= 1.1.0)

crypt_preferred_method — Devuelve el prefijo del método de hash preferido

### Descripción

**crypt_preferred_method**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el prefijo del método de hash preferido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena con el prefijo, o **[null](#constant.null)** en caso de error.

### Ejemplos

**Ejemplo #1 Un ejemplo de crypt_preferred_method()**

&lt;?php
var_dump(crypt_preferred_method());
?&gt;

El ejemplo anterior mostrará:

string(3) "$y$"

### Ver también

- [crypt_gensalt()](#function.crypt-gensalt) - Compila una cadena para usar como argumento de sal para crypt

## Tabla de contenidos

- [crypt_checksalt](#function.crypt-checksalt) — Valida un parámetro de hash de contraseña
- [crypt_gensalt](#function.crypt-gensalt) — Compila una cadena para usar como argumento de sal para crypt
- [crypt_preferred_method](#function.crypt-preferred-method) — Devuelve el prefijo del método de hash preferido

- [Introducción](#intro.xpass)
- [Instalación/Configuración](#xpass.setup)<li>[Requerimientos](#xpass.requirements)
- [Instalación vía PECL](#xpass.installation)
  </li>- [Constantes predefinidas](#xpass.constants)
- [Funciones Xpass](#ref.xpass)<li>[crypt_checksalt](#function.crypt-checksalt) — Valida un parámetro de hash de contraseña
- [crypt_gensalt](#function.crypt-gensalt) — Compila una cadena para usar como argumento de sal para crypt
- [crypt_preferred_method](#function.crypt-preferred-method) — Devuelve el prefijo del método de hash preferido
  </li>
