# Mcrypt

# Introducción

**Advertencia**

Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.

Las alternativas a esta funcionalidad incluyen:

    -
     [Sodium](#book.sodium)
     (disponible a partir de PHP 7.2.0)


    -
     [OpenSSL](#book.openssl)

**Nota**:

    Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 7.2.0.

Estas funciones permiten acceder a la biblioteca
mcrypt, que dispone de una gran variedad de algoritmos
de cifrado, como DES, TripleDES, Blowfish (por omisión), 3-WAY,
SAFER-SK64, SAFER-SK128, TWOFISH, TEA, RC2 y GOST en modos CBC,
OFB, CFB y ECB. Asimismo, aceptan también RC6 e IDEA que son
considerados como "no libres".
CFB/OFB es de 8 bits por omisión.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mcrypt.requirements)
- [Instalación](#mcrypt.installation)
- [Configuración en tiempo de ejecución](#mcrypt.configuration)
- [Tipos de recursos](#mcrypt.resources)

    ## Requerimientos

    Estas funciones utilizan [» mcrypt](http://mcrypt.sourceforge.net/).
    Para utilizar esta biblioteca, descargue
    el fichero libmcrypt-x.x.tar.gz desde
    [» http://mcrypt.sourceforge.net/](http://mcrypt.sourceforge.net/)
    y siga las instrucciones de instalación proporcionadas.

    Se requiere la versión 2.5.6 o posterior de la biblioteca libmcrypt.

    Los usuarios de Windows encontrarán la biblioteca en la versión Windows
    de PHP 5.3. La versión binaria de Windows de PHP 5.3 utiliza la versión estática
    de la biblioteca MCrypt, no se necesita ninguna DLL.

    Si se compila PHP con la biblioteca libmcrypt 2.4.x,
    se admiten los siguientes algoritmos: "CAST", "LOKI97", "RIJNDAEL", "SAFERPLUS",
    "SERPENT" así como los siguientes cifrados: "ENIGMA" (cifrado), "PANAMA",
    "RC4" y "WAKE". Con libmcrypt 2.4.x otro modo de cifrado
    está disponible: "nOFB".

## Instalación

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 7.2.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/mcrypt](https://pecl.php.net/package/mcrypt).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración mcrypt**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [mcrypt.algorithms_dir](#ini.mcrypt.algorithms-dir)
     **[null](#constant.null)**
     **[INI_ALL](#constant.ini-all)**
      



     [mcrypt.modes_dir](#ini.mcrypt.modes-dir)
     **[null](#constant.null)**
     **[INI_ALL](#constant.ini-all)**
      

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     mcrypt.algorithms_dir
     [string](#language.types.string)



      El directorio que contiene los algoritmos. Por omisión es el directorio indicado durante la
      compilación de libmcrypt, típicamente se trata de
      */usr/local/lib/libmcrypt*. Consulte
      [mcrypt_list_algorithms()](#function.mcrypt-list-algorithms) para más detalles.







     mcrypt.modes_dir
     [string](#language.types.string)



      El directorio que contiene los modos. Por omisión es el directorio indicado durante la
      compilación de libmcrypt, típicamente se trata de
      */usr/local/lib/libmcrypt*. Consulte
      [mcrypt_list_modes()](#function.mcrypt-list-modes) para más detalles.


## Tipos de recursos

[mcrypt_module_open()](#function.mcrypt-module-open) devuelve un puntero de cifrado.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Mcrypt puede operar en 4 modos de cifrado (CBC,
OFB, CFB y ECB).
Si está vinculado contra libmcrypt-2.4.x o posterior, las funciones pueden
operar asimismo en modo nOFB y en modo STREAM.
A continuación se encuentra una lista con todos los modos de cifrado soportados con
las constantes que están definidas para el modo de cifrado. Para una referencia
más completa y discusiones, ver Applied Cryptography by Schneier (ISBN 0-471-11709-9).

- **[MCRYPT_MODE_ECB](#constant.mcrypt-mode-ecb)** (electronic codebook)
  es un modo de cifrado por bloques que generalmente es inapropiado para la mayoría
  de los usos. El uso de este modo está desaconsejado.

- **[MCRYPT_MODE_CBC](#constant.mcrypt-mode-cbc)** (cipher block chaining)
  es un modo de cifrado por bloques que es considerablemente más seguro que
  el modo ECB.

- **[MCRYPT_MODE_CFB](#constant.mcrypt-mode-cfb)** (cipher feedback,
  en modo de 8 bits) es un modo de cifrado por flujo.
  Se recomienda utilizar el modo NCFB en lugar
  del modo CFB.

- **[MCRYPT_MODE_OFB](#constant.mcrypt-mode-ofb)** (output feedback, en
  8 bits) es un modo de cifrado por flujo comparable a
  CFB, pero puede ser utilizado en aplicaciones donde la
  propagación de errores no puede ser tolerada.
  Se recomienda utilizar el modo NOFB en lugar
  del modo OFB.

- **[MCRYPT_MODE_NOFB](#constant.mcrypt-mode-nofb)** (output feedback,
  en modo de n bits) es comparable al modo OFB,
  pero opera sobre el tamaño de bloque completo del algoritmo.

- **[MCRYPT_MODE_STREAM](#constant.mcrypt-mode-stream)** es un modo adicional, para incluir
  algoritmos de flujo tales como "WAKE" o "RC4".

Mcrypt soporta otros modos de operación para los cuales no hay constantes
predefinidas.
Pueden ser utilizados pasando un [string](#language.types.string) en lugar de las constantes faltantes.

- "ctr" (counter mode) es un modo de cifrado por flujo.

- "ncfb" (cipher feedback,
  en modo de n bits) es comparable al modo CFB,
  pero opera sobre el tamaño de bloque completo del algoritmo.

A continuación se presentan algunos otros modos y métodos de compresión:

     **[MCRYPT_ENCRYPT](#constant.mcrypt-encrypt)**
     ([int](#language.types.integer))









     **[MCRYPT_DECRYPT](#constant.mcrypt-decrypt)**
     ([int](#language.types.integer))









     **[MCRYPT_DEV_RANDOM](#constant.mcrypt-dev-random)**
     ([int](#language.types.integer))









     **[MCRYPT_DEV_URANDOM](#constant.mcrypt-dev-urandom)**
     ([int](#language.types.integer))









     **[MCRYPT_RAND](#constant.mcrypt-rand)**
     ([int](#language.types.integer))






# Modos de cifrado Mcrypt

A continuación se presenta una lista no exhaustiva de los modos de cifrado de la extensión
mcrypt. Para disponer de una lista completa de los cifrados soportados,
consulte las definiciones en el fichero mcrypt.h. La regla
general con la API mcrypt-2.2.x es que se puede acceder al
modo de cifrado desde PHP con la constante MCRYPT_ciphername. Con
la biblioteca libmcrypt-2.4.x y libmcrypt-2.5.x, estas constantes funcionan
siempre, pero es posible especificar el nombre del cifrado en una cadena,
al llamar a [mcrypt_module_open()](#function.mcrypt-module-open).

- MCRYPT_3DES

- MCRYPT_ARCFOUR_IV (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_ARCFOUR (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_BLOWFISH

- MCRYPT_CAST_128

- MCRYPT_CAST_256

- MCRYPT_CRYPT

- MCRYPT_DES

- MCRYPT_DES_COMPAT (libmcrypt 2.2.x únicamente)

- MCRYPT_ENIGMA (libmcrypt &gt; 2.4.x únicamente, alias de MCRYPT_CRYPT)

- MCRYPT_GOST

- MCRYPT_IDEA (no libre)

- MCRYPT_LOKI97 (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_MARS (libmcrypt &gt; 2.4.x únicamente, no libre)

- MCRYPT_PANAMA (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_RIJNDAEL_128 (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_RIJNDAEL_192 (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_RIJNDAEL_256 (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_RC2

- MCRYPT_RC4 (libmcrypt 2.2.x únicamente)

- MCRYPT_RC6 (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_RC6_128 (libmcrypt 2.2.x únicamente)

- MCRYPT_RC6_192 (libmcrypt 2.2.x únicamente)

- MCRYPT_RC6_256 (libmcrypt 2.2.x únicamente)

- MCRYPT_SAFER64

- MCRYPT_SAFER128

- MCRYPT_SAFERPLUS (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_SERPENT(libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_SERPENT_128 (libmcrypt 2.2.x únicamente)

- MCRYPT_SERPENT_192 (libmcrypt 2.2.x únicamente)

- MCRYPT_SERPENT_256 (libmcrypt 2.2.x únicamente)

- MCRYPT_SKIPJACK (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_TEAN (libmcrypt 2.2.x únicamente)

- MCRYPT_THREEWAY

- MCRYPT_TRIPLEDES (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_TWOFISH (para las versiones antiguas de mcrypt 2.x o mcrypt &gt; 2.4.x )

- MCRYPT_TWOFISH128 (TWOFISHxxx está disponible en las nuevas versiones 2.x,
  pero no en las versiones 2.4.x)

- MCRYPT_TWOFISH192

- MCRYPT_TWOFISH256

- MCRYPT_WAKE (libmcrypt &gt; 2.4.x únicamente)

- MCRYPT_XTEA (libmcrypt &gt; 2.4.x únicamente)

Se debe (modo **[CFB](#constant.cfb)** y **[OFB](#constant.ofb)**)
o puede (modo **[CBC](#constant.cbc)**) proporcionar un vector de inicialización
(IV) para estos modos de cifrado. IV debe ser único, y tener el mismo
valor en el cifrado y en el descifrado. Para datos que serán
almacenados después del cifrado, se puede tomar el resultado de una
función como MD5, aplicada al nombre del fichero. De lo contrario,
se puede enviar IV con los datos cifrados, (consulte el capítulo
9.3 de Applied Cryptography by Schneier (ISBN 0-471-11709-9) de Schneier (ISBN 0-471-11709-9)
para más detalles sobre el tema).

# Funciones Mcrypt

# mcrypt_create_iv

(PHP 4, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_create_iv — Crea un vector de inicialización (IV) a partir de una fuente aleatoria

**Advertencia**

Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.

Las alternativas a esta función incluyen:

    - [random_bytes()](#function.random-bytes)

### Descripción

**mcrypt_create_iv**([int](#language.types.integer) $size, [int](#language.types.integer) $source = MCRYPT_DEV_URANDOM): [string](#language.types.string)

**mcrypt_create_iv()** crea un IV
(vector de inicialización) a partir de una fuente aleatoria.

El vector de inicialización es el único medio de proporcionar una inicialización
de reemplazo a los métodos de inicialización. Este vector no necesita
ser particularmente secreto, aunque es mejor que lo sea. Puede enviarse
con los documentos cifrados sin perder seguridad.

### Parámetros

     size


       El tamaño del vector.






     source


       La fuente de un IV. La fuente puede ser **[MCRYPT_RAND](#constant.mcrypt-rand)** (el generador
       de números aleatorios del sistema), **[MCRYPT_DEV_RANDOM](#constant.mcrypt-dev-random)**
       (lee los datos desde /dev/random) y
       **[MCRYPT_DEV_URANDOM](#constant.mcrypt-dev-urandom)** (lee los datos desde
       /dev/urandom). Antes de la versión 5.3.0,
       **[MCRYPT_RAND](#constant.mcrypt-rand)** era la única constante
       soportada por Windows.




       Tenga en cuenta que el valor por defecto de este parámetro era
       **[MCRYPT_DEV_RANDOM](#constant.mcrypt-dev-random)** antes de PHP 5.6.0.



      **Nota**:

        Tenga en cuenta que la constante **[MCRYPT_DEV_RANDOM](#constant.mcrypt-dev-random)**
        puede bloquearse mientras espera que haya más entropía disponible.






### Valores devueltos

Devuelve el vector de inicialización, o bien **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_create_iv()**

&lt;?php
$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
     $iv = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
?&gt;

### Ver también

    - [» http://www.ciphersbyritter.com/GLOSSARY.HTM#IV](http://www.ciphersbyritter.com/GLOSSARY.HTM#IV)

    - [» http://www.quadibloc.com/crypto/co0409.htm](http://www.quadibloc.com/crypto/co0409.htm)

    - Capítulo 9.3 de Applied Cryptography by Schneier (ISBN 0-471-11709-9)

    - [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# mcrypt_decrypt

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_decrypt — Descifra un texto con los parámetros dados

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_decrypt**(
    [string](#language.types.string) $cipher,
    [string](#language.types.string) $key,
    [string](#language.types.string) $data,
    [string](#language.types.string) $mode,
    [string](#language.types.string) $iv = ?
): [string](#language.types.string)|[false](#language.types.singleton)

Descifra los datos data y devuelve los datos descifrados.

### Parámetros

     cipher

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     key


       La clave utilizada durante el cifrado de los datos. Si el tamaño de la clave
       proporcionada no es soportado por el cipher, la función emitirá un
       warning y devolverá **[false](#constant.false)**






     data


       Los datos que serán descifrados utilizando los parámetros
       cipher y mode.
       Si el tamaño de los datos no corresponde a n * el tamaño del bloque,
       los datos serán completados con '\0'.






     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".





     iv

      Used for the initialization in CBC, CFB, OFB modes, and in some algorithms in STREAM mode. If the provided IV size is not supported by the chaining mode or no IV was provided, but the chaining mode requires one, the function will emit a warning and return **[false](#constant.false)**.




### Valores devueltos

Devuelve los datos descifrados en forma de [string](#language.types.string)
o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mcrypt_encrypt()](#function.mcrypt-encrypt) - Cifra un texto

# mcrypt_enc_get_algorithms_name

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_get_algorithms_name — Devuelve el nombre del algoritmo de cifrado

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_get_algorithms_name**([resource](#language.types.resource) $td): [string](#language.types.string)

**mcrypt_enc_get_algorithms_name()** devuelve el nombre de
el algoritmo utilizado por td.

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve el nombre del algoritmo actual, en forma de [string](#language.types.string)

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_enc_get_algorithms_name()**

&lt;?php
$td = mcrypt_module_open (MCRYPT_CAST_256, '', MCRYPT_MODE_CFB, '');
     echo mcrypt_enc_get_algorithms_name($td). "\n";

     $td = mcrypt_module_open ('cast-256', '', MCRYPT_MODE_CFB, '');
     echo mcrypt_enc_get_algorithms_name($td). "\n";
     ?&gt;


    El ejemplo anterior mostrará:

CAST-256
CAST-256

# mcrypt_enc_get_block_size

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_get_block_size — Devuelve el tamaño de bloque de un algoritmo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_get_block_size**([resource](#language.types.resource) $td): [int](#language.types.integer)

Obtiene el tamaño de bloque de un algoritmo.

### Parámetros

     td


       El gestor de ficheros.





### Valores devueltos

Devuelve el tamaño de bloque del algoritmo, en bytes.

# mcrypt_enc_get_iv_size

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_get_iv_size — Devuelve el tamaño del VI de un algoritmo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_get_iv_size**([resource](#language.types.resource) $td): [int](#language.types.integer)

Esta función devuelve el tamaño del VI del algoritmo designado
por td, en bytes. Si el valor devuelto
es 0, es que el algoritmo no requiere de VI. Un VI es
requerido en modo "cbc", "cfb" y
"ofb", y a veces en modo "stream".

### Parámetros

     td


       El gestor de ficheros.





### Valores devueltos

Devuelve el tamaño del IV, o 0 si el IV es ignorado por el algoritmo.

# mcrypt_enc_get_key_size

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_get_key_size — Devuelve el tamaño máximo de la clave para un modo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_get_key_size**([resource](#language.types.resource) $td): [int](#language.types.integer)

Devuelve el tamaño máximo de la clave para un modo dado.

### Parámetros

     td


       El gestor de fichero.





### Valores devueltos

Devuelve el tamaño máximo de la clave para el modo dado.

# mcrypt_enc_get_modes_name

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_get_modes_name — Devuelve el nombre del modo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_get_modes_name**([resource](#language.types.resource) $td): [string](#language.types.string)

Devuelve el nombre del modo.

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve el nombre, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_enc_get_modes_name()**

&lt;?php
$td = mcrypt_module_open (MCRYPT_CAST_256, '', MCRYPT_MODE_CFB, '');
echo mcrypt_enc_get_modes_name($td). "\n";

$td = mcrypt_module_open ('cast-256', '', 'ecb', '');
echo mcrypt_enc_get_modes_name($td). "\n";
?&gt;

    El ejemplo anterior mostrará:

CFB
ECB

# mcrypt_enc_get_supported_key_sizes

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_get_supported_key_sizes — Devuelve un array que contiene los tamaños de clave admitidos por un algoritmo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_get_supported_key_sizes**([resource](#language.types.resource) $td): [array](#language.types.array)

**mcrypt_enc_get_supported_key_sizes()** lee
los tamaños de clave soportados por el algoritmo actual del
recurso de cifrado td.

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve un array que contiene los tamaños de clave soportados por el algoritmo
designado por td. Si devuelve un array
vacío, es que todas las claves entre 1 y
[mcrypt_enc_get_key_size()](#function.mcrypt-enc-get-key-size) son admitidas por
el algoritmo.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_enc_get_supported_key_sizes()**

&lt;?php
$td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
    var_dump(mcrypt_enc_get_supported_key_sizes($td));
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
int(16)
[1]=&gt;
int(24)
[2]=&gt;
int(32)
}

# mcrypt_enc_is_block_algorithm

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_is_block_algorithm — Comprueba si el cifrado es por bloques en un algoritmo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_is_block_algorithm**([resource](#language.types.resource) $td): [bool](#language.types.boolean)

Comprueba si el cifrado es por bloques en un algoritmo.

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve **[true](#constant.true)** si el algoritmo utilizado es un algoritmo por bloques, y **[false](#constant.false)**
si es un algoritmo por flujo.

# mcrypt_enc_is_block_algorithm_mode

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_is_block_algorithm_mode — Comprueba si el modo de cifrado es por bloques

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_is_block_algorithm_mode**([resource](#language.types.resource) $td): [bool](#language.types.boolean)

Comprueba si el modo de cifrado es por bloques (por ejemplo,
**[false](#constant.false)** para un flujo, y **[true](#constant.true)** para "cbc", "cfb", "ofb").

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve **[true](#constant.true)** si este modo utiliza algoritmos por bloques, y **[false](#constant.false)** en caso contrario.

# mcrypt_enc_is_block_mode

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_is_block_mode — Comprueba si el modo devuelve los datos por bloques

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_is_block_mode**([resource](#language.types.resource) $td): [bool](#language.types.boolean)

Comprueba si el modo devuelve los datos por bloques (por ejemplo, **[true](#constant.true)** para "cbc"
y "ecb", y **[false](#constant.false)** para "cfb" y un flujo).

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve **[true](#constant.true)** si el modo devuelve bloques de bytes,
o bien **[false](#constant.false)** si solo devuelve bytes.

# mcrypt_enc_self_test

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_enc_self_test — Prueba un módulo abierto

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_enc_self_test**([resource](#language.types.resource) $td): [int](#language.types.integer)

Realiza una prueba del módulo abierto y designado por td.

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Devuelve 0 en caso de éxito o un [int](#language.types.integer) negativo en
caso de fallo.

# mcrypt_encrypt

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_encrypt — Cifra un texto

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_encrypt**(
    [string](#language.types.string) $cipher,
    [string](#language.types.string) $key,
    [string](#language.types.string) $data,
    [string](#language.types.string) $mode,
    [string](#language.types.string) $iv = ?
): [string](#language.types.string)|[false](#language.types.singleton)

**mcrypt_encrypt()** cifra los datos y devuelve
los datos cifrados.

### Parámetros

     cipher

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     key


       La clave con la que se cifrarán los datos. Si el tamaño de la clave
       proporcionada no es compatible con el cipher, la función emitirá un
       warning y devolverá **[false](#constant.false)**






     data


       Los datos que se cifrarán, con el cipher y el
       mode indicado.
       Si el tamaño de los datos no es un múltiplo del tamaño de bloque,
       los datos se rellenarán con caracteres '\0',
       según sea necesario.




       El texto cifrado devuelto puede ser más largo que el tamaño de los datos
       pasados como argumento a través de data.






     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".





     iv

      Used for the initialization in CBC, CFB, OFB modes, and in some algorithms in STREAM mode. If the provided IV size is not supported by the chaining mode or no IV was provided, but the chaining mode requires one, the function will emit a warning and return **[false](#constant.false)**.




### Valores devueltos

Devuelve los datos cifrados, como [string](#language.types.string) o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_encrypt()**

&lt;?php # --- CIFRADO ---

    # la clave debería ser un binario aleatorio, utilice la función scrypt, bcrypt
    # o PBKDF2 para convertir una cadena de caracteres en una clave.
    # La clave se especifica utilizando notación hexadecimal.
    $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");

    # Muestra el tamaño de la clave utilizada; claves de 16, 24 o 32 bytes para
    # AES-128, 192 y 256 respectivamente.
    $key_size =  strlen($key);
    echo "Tamaño de la clave: " . $key_size . "\n";

    $plaintext = "Esta cadena de caracteres ha sido cifrada en AES-256 / CBC / ZeroBytePadding.";

    # Crea un IV aleatorio para usar con el cifrado CBC
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    # Crea un texto cifrado compatible con AES (Rijndael block size = 128)
    # para mantener el texto confidencial.
    # Solo aplicable para entradas codificadas que nunca terminan
    # con el valor 00h (debido a la eliminación predeterminada de ceros finales)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

    # Se añade el IV al inicio del texto cifrado para hacerlo disponible para el descifrado
    $ciphertext = $iv . $ciphertext;

    # Codifica el texto cifrado resultante para que pueda ser representado por una cadena de caracteres
    $ciphertext_base64 = base64_encode($ciphertext);

    echo  $ciphertext_base64 . "\n";

    # === ADVERTENCIA ===

    # El texto cifrado resultante no contiene integridad ni autenticación
    # y no está protegido contra ataques de tipo "oracle padding".

    # --- DESCIFRADO ---

    $ciphertext_dec = base64_decode($ciphertext_base64);

    # Obtiene el IV, iv_size debe haber sido creado utilizando la función
    # mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);

    # Obtiene el texto del cipher (todo, excepto $iv_size del inicio)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # Se deben eliminar los caracteres de valor 00h del final del texto plano
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

    echo  $plaintext_dec . "\n";

?&gt;

    El ejemplo anterior mostrará:

Tamaño de la clave: 32
ENJW8mS2KaJoNB5E5CoSAAu0xARgsR1bdzFWpEn+poYw45q+73az5kYi4j+0haevext1dGrcW8Qi59txfCBV8BBj3bzRP3dFCp3CPQSJ8eU=
Esta cadena de caracteres ha sido cifrada en AES-256 / CBC / ZeroBytePadding.

### Ver también

    - [mcrypt_decrypt()](#function.mcrypt-decrypt) - Descifra un texto con los parámetros dados

    - [mcrypt_module_open()](#function.mcrypt-module-open) - Abre el módulo del algoritmo y del modo a utilizar

# mcrypt_generic

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_generic — Cifra los datos

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_generic**([resource](#language.types.resource) $td, [string](#language.types.string) $data): [string](#language.types.string)

**mcrypt_generic()** cifra los datos
data. Los datos se completan
con "\0" para obtener un tamaño múltiplo del tamaño
de un bloque. Devuelve los datos cifrados. Tenga en cuenta que la longitud
del string devuelto puede ser más larga que la
pasada como argumento, debido al relleno.

Si se desea almacenar los datos cifrados en una base de datos
asegúrese de almacenar el string completo devuelto por esta función,
de lo contrario el string no se descifrará correctamente. Si el string original
contiene 10 caracteres y el tamaño de un bloque es de 8 (utilice
[mcrypt_enc_get_block_size()](#function.mcrypt-enc-get-block-size) para determinar este tamaño),
se necesitará al menos 16 caracteres en el campo de la base de datos.
Tenga en cuenta que el string devuelto por [mdecrypt_generic()](#function.mdecrypt-generic) tendrá
16 caracteres de longitud... utilice rtrim($str, "\0")
para eliminar el relleno.

Por ejemplo, si se almacenan los datos en una base de datos MySQL,
recuerde que los campos de tipo VARCHAR eliminan automáticamente los
espacios adicionales durante la inserción. Como los datos cifrados pueden
terminar con un espacio (ASCII 32), los datos se dañarán por esta
eliminación. Almacene los datos en un campo de tipo TINYBLOB/TINYTEXT
(o más grande) para que todo funcione normalmente.

### Parámetros

     td


       El recurso de cifrado.




       El manejador de cifrado td debe ser
       inicializado con la función [mcrypt_generic_init()](#function.mcrypt-generic-init),
       con una clave y un VI, antes de llamar a esta función. Cuando el cifrado
       se realiza, se deben liberar los buffers llamando a la función
       [mcrypt_generic_deinit()](#function.mcrypt-generic-deinit).
       Consulte [mcrypt_module_open()](#function.mcrypt-module-open) para un ejemplo.






     data


       Los datos a cifrar.





### Valores devueltos

Devuelve los datos cifrados.

### Ver también

    - [mdecrypt_generic()](#function.mdecrypt-generic) - Desencripta los datos

    - [mcrypt_generic_init()](#function.mcrypt-generic-init) - Inicializa todos los buffers necesarios

    - [mcrypt_generic_deinit()](#function.mcrypt-generic-deinit) - Prepara el módulo para la descarga

# mcrypt_generic_deinit

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_generic_deinit — Prepara el módulo para la descarga

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_generic_deinit**([resource](#language.types.resource) $td): [bool](#language.types.boolean)

Prepara el módulo de cifrado td para la descarga.
Todos los búferes se vacían, pero el módulo no se descarga.
Se debe llamar a [mcrypt_module_close()](#function.mcrypt-module-close) manualmente
(aunque PHP lo hará por usted al final del script).

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mcrypt_module_open()](#function.mcrypt-module-open) - Abre el módulo del algoritmo y del modo a utilizar

    - [mcrypt_generic_init()](#function.mcrypt-generic-init) - Inicializa todos los buffers necesarios

# mcrypt_generic_init

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_generic_init — Inicializa todos los buffers necesarios

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_generic_init**([resource](#language.types.resource) $td, [string](#language.types.string) $key, [string](#language.types.string) $iv): [int](#language.types.integer)

Se debe llamar a **mcrypt_generic_init()**
antes de cada llamada a [mcrypt_generic()](#function.mcrypt-generic) o
[mdecrypt_generic()](#function.mdecrypt-generic).

### Parámetros

     td


       El recurso de cifrado.






     key


       El tamaño máximo de la clave debe ser el devuelto por
       [mcrypt_enc_get_key_size()](#function.mcrypt-enc-get-key-size) y todos los valores
       inferiores también serán válidos.






     iv


       El vector de inicialización (VI) debe tener el tamaño de un bloque,
       pero se debe leer su tamaño llamando a
       [mcrypt_enc_get_iv_size()](#function.mcrypt-enc-get-iv-size). VI es ignorado en modo
       ECB. VI DEBE existir en modos "CFB",
       "CBC", "STREAM", "nOFB"
       y "OFB". Debe ser aleatorio y único (pero no secreto).
       El mismo VI debe ser utilizado para el cifrado y el descifrado.
       Si no se desea utilizar, se puede rellenar con ceros, pero
       no se recomienda.





### Valores devueltos

Devuelve un valor negativo en caso de error: -3 si el tamaño
de la clave es incorrecto, -4 cuando hay un problema de asignación de
memoria y cualquier otro valor en caso de error desconocido. Si ocurre un
error, se muestra una alerta. **[false](#constant.false)** es devuelto si se pasan parámetros
incorrectos a la función.

### Ver también

    - [mcrypt_module_open()](#function.mcrypt-module-open) - Abre el módulo del algoritmo y del modo a utilizar

# mcrypt_get_block_size

(PHP 4, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_get_block_size — Devuelve el tamaño de bloques de un cifrado

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_get_block_size**([int](#language.types.integer) $cipher): [int](#language.types.integer)|[false](#language.types.singleton)

**mcrypt_get_block_size**([string](#language.types.string) $cipher, [string](#language.types.string) $mode): [int](#language.types.integer)|[false](#language.types.singleton)

El primer prototipo se utiliza cuando PHP está compilado con la biblioteca
libmcrypt 2.2.x, el segundo cuando está compilado con
libmcrypt 2.4.x o 2.5.x.

**mcrypt_get_block_size()** sirve para leer el tamaño
de bloques del cifrado cipher (en
combinación con un modo de cifrado).

Se recomienda utilizar la función
[mcrypt_enc_get_block_size()](#function.mcrypt-enc-get-block-size),
ya que utiliza el recurso devuelto por
[mcrypt_module_open()](#function.mcrypt-module-open).

### Parámetros

     cipher

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".




### Valores devueltos

Lee el tamaño de bloque, en forma de un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_get_block_size()**



     Este ejemplo muestra cómo utilizar esta función cuando PHP
     está compilado con libmcrypt 2.4.x y 2.5.x.

&lt;?php
echo mcrypt_get_block_size('tripledes', 'ecb'); // 8
?&gt;

### Ver también

    - [mcrypt_get_key_size()](#function.mcrypt-get-key-size) - Devuelve el tamaño de la clave de cifrado

    - [mcrypt_enc_get_block_size()](#function.mcrypt-enc-get-block-size) - Devuelve el tamaño de bloque de un algoritmo

    - [mcrypt_encrypt()](#function.mcrypt-encrypt) - Cifra un texto

# mcrypt_get_cipher_name

(PHP 4, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_get_cipher_name — Lee el nombre del cifrado utilizado

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_get_cipher_name**([int](#language.types.integer) $cipher): [string](#language.types.string)

**mcrypt_get_cipher_name**([string](#language.types.string) $cipher): [string](#language.types.string)

**mcrypt_get_cipher_name()** devuelve el nombre del cifrado
utilizado.

**mcrypt_get_cipher_name()** toma el número de
cifrado (con libmcrypt 2.2.x) o toma el nombre del cifrado
(con libmcrypt 2.4.x) como argumento, y devuelve el nombre del
cifrado, o **[false](#constant.false)**, si no existe.

### Parámetros

     cipher

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.




### Valores devueltos

Esta función devuelve el nombre del cipher o **[false](#constant.false)** si el cipher no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_get_cipher_name()**

&lt;?php
$cipher = MCRYPT_TripleDES;

echo mcrypt_get_cipher_name($cipher);
?&gt;

    El ejemplo anterior mostrará:

3DES

# mcrypt_get_iv_size

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_get_iv_size — Retorna el tamaño del VI utilizado por un par cifrado/modo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_get_iv_size**([string](#language.types.string) $cipher, [string](#language.types.string) $mode): [int](#language.types.integer)

**mcrypt_get_iv_size()** retorna el tamaño del
vector de inicialización (VI). Si el algoritmo no utiliza
un vector de inicialización, se retorna cero.

Es más útil utilizar la función [mcrypt_enc_get_iv_size()](#function.mcrypt-enc-get-iv-size),
ya que utiliza el recurso retornado por [mcrypt_module_open()](#function.mcrypt-module-open).

### Parámetros

     cipher

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".



       El VI es ignorado en modo ECB, ya que este modo no lo requiere.
       Debe tener el mismo VI (punto de partida) durante el cifrado
       y el descifrado, de lo contrario, el cifrado fallará.





### Valores devueltos

Retorna el tamaño del vector de inicialización (VI), en bytes.
En caso de error, la función retorna **[false](#constant.false)**. Si el vector de inicialización
no es necesario, se retorna 0.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_get_iv_size()**

&lt;?php
echo mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB) . "\n";

echo mcrypt_get_iv_size('des', 'ecb') . "\n";
?&gt;

### Ver también

    - [mcrypt_get_block_size()](#function.mcrypt-get-block-size) - Devuelve el tamaño de bloques de un cifrado

    - [mcrypt_enc_get_iv_size()](#function.mcrypt-enc-get-iv-size) - Devuelve el tamaño del VI de un algoritmo

    - [mcrypt_create_iv()](#function.mcrypt-create-iv) - Crea un vector de inicialización (IV) a partir de una fuente aleatoria

# mcrypt_get_key_size

(PHP 4, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_get_key_size — Devuelve el tamaño de la clave de cifrado

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_get_key_size**([int](#language.types.integer) $cipher): [int](#language.types.integer)|[false](#language.types.singleton)

**mcrypt_get_key_size**([string](#language.types.string) $cipher, [string](#language.types.string) $mode): [int](#language.types.integer)|[false](#language.types.singleton)

La primera sintaxis utiliza libmcrypt 2.2.x, y la segunda
libmcrypt 2.4.x o posterior.

**mcrypt_get_key_size()** se utiliza para obtener el tamaño de
la clave del cifrado cipher.

Es más interesante utilizar la función
[mcrypt_enc_get_key_size()](#function.mcrypt-enc-get-key-size) ya que utiliza el recurso
devuelto por la función [mcrypt_module_open()](#function.mcrypt-module-open).

### Parámetros

     cipher

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".




### Valores devueltos

Devuelve el tamaño máximo soportado para una clave del algoritmo, en bytes
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_get_key_size()**

&lt;?php
echo mcrypt_get_key_size('tripledes', 'ecb');
?&gt;

     El ejemplo anterior muestra el uso de la función
     cuando ha sido compilada con la biblioteca
     2.4.x o 2.5.x.



    El ejemplo anterior mostrará:

24

### Ver también

    - [mcrypt_get_block_size()](#function.mcrypt-get-block-size) - Devuelve el tamaño de bloques de un cifrado

    - [mcrypt_enc_get_key_size()](#function.mcrypt-enc-get-key-size) - Devuelve el tamaño máximo de la clave para un modo

    - [mcrypt_encrypt()](#function.mcrypt-encrypt) - Cifra un texto

# mcrypt_list_algorithms

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_list_algorithms — Lista todos los algoritmos de cifrado soportados

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_list_algorithms**([string](#language.types.string) $lib_dir = ini_get("mcrypt.algorithms_dir")): [array](#language.types.array)

Lista todos los algoritmos de cifrado de lib_dir.

### Parámetros

     lib_dir


       Especifica el directorio donde se encuentran los algoritmos. Si se omite,
       se utiliza el valor de la directiva mcrypt.algorithms_dir del fichero
       php.ini.





### Valores devueltos

Devuelve un array con los algoritmos soportados.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_list_algorithms()**

&lt;?php
$algorithms = mcrypt_list_algorithms();
print_r($algorithms);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; cast-128
[1] =&gt; gost
[2] =&gt; rijndael-128
[3] =&gt; twofish
[4] =&gt; arcfour
[5] =&gt; cast-256
[6] =&gt; loki97
[7] =&gt; rijndael-192
[8] =&gt; saferplus
[9] =&gt; wake
[10] =&gt; blowfish-compat
[11] =&gt; des
[12] =&gt; rijndael-256
[13] =&gt; serpent
[14] =&gt; xtea
[15] =&gt; blowfish
[16] =&gt; enigma
[17] =&gt; rc2
[18] =&gt; tripledes
)

# mcrypt_list_modes

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_list_modes — Lista todos los modos de cifrado soportados

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_list_modes**([string](#language.types.string) $lib_dir = ini_get("mcrypt.modes_dir")): [array](#language.types.array)

Lista todos los modos de cifrado de lib_dir.

### Parámetros

     lib_dir


       Especifica el directorio donde se encuentran todos los modos.
       Si se omite, se utiliza el valor de la directiva mcrypt.modes_dir
       en el php.ini.





### Valores devueltos

Devuelve un array con todos los modos soportados.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_list_modes()**

&lt;?php
$modes = mcrypt_list_modes();

foreach ($modes as $mode) {
    echo "$mode &lt;br /&gt;\n";
}
?&gt;

     El ejemplo anterior mostrará todos los modos soportados
     en el directorio por omisión. Si el modo no está definido
     por la directiva mcrypt.modes_dir del php.ini,
     se utilizará el directorio por omisión de mcrypt (el directorio
     /usr/local/lib/libmcrypt).

# mcrypt_module_close

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_close — Libera el módulo de cifrado

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_close**([resource](#language.types.resource) $td): [bool](#language.types.boolean)

Libera el módulo td.

### Parámetros

     td


       El recurso de cifrado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mcrypt_module_open()](#function.mcrypt-module-open) - Abre el módulo del algoritmo y del modo a utilizar

# mcrypt_module_get_algo_block_size

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_get_algo_block_size — Devuelve el tamaño de bloques de un algoritmo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_get_algo_block_size**([string](#language.types.string) $algorithm, [string](#language.types.string) $lib_dir = ?): [int](#language.types.integer)

Devuelve el tamaño de bloques de un algoritmo.

### Parámetros

     algorithm


       El nombre del algoritmo.






     lib_dir


       El parámetro opcional lib_dir contiene la
       ruta de acceso hasta el módulo del algoritmo en el sistema.





### Valores devueltos

Devuelve el tamaño de bloques de un algoritmo, en bytes.

# mcrypt_module_get_algo_key_size

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_get_algo_key_size — Devuelve el tamaño máximo de clave

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_get_algo_key_size**([string](#language.types.string) $algorithm, [string](#language.types.string) $lib_dir = ?): [int](#language.types.integer)

Devuelve el tamaño máximo de clave.

### Parámetros

     algorithm


       El nombre del algoritmo.






     lib_dir


       El parámetro opcional lib_dir contiene la ruta
       hasta el módulo del algoritmo en el sistema.





### Valores devueltos

Devuelve el tamaño máximo de la clave soportada por el algoritmo
algorithm.

# mcrypt_module_get_supported_key_sizes

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_get_supported_key_sizes — Devuelve un array que contiene los tamaños de claves soportados por el algoritmo abierto

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_get_supported_key_sizes**([string](#language.types.string) $algorithm, [string](#language.types.string) $lib_dir = ?): [array](#language.types.array)

Devuelve un array que contiene los tamaños de claves soportados por
el algoritmo de cifrado algorithm.
Si devuelve un array vacío, entonces todas las claves entre
1 y [mcrypt_module_get_algo_key_size()](#function.mcrypt-module-get-algo-key-size) son
soportadas por el algoritmo.

### Parámetros

     algorithm


       El algoritmo a utilizar.






     lib_dir


       El parámetro opcional
       lib_dir puede contener la ruta de acceso
       del directorio de instalación del módulo, en el sistema.





### Valores devueltos

Devuelve un array que contiene los tamaños de claves soportados por
el algoritmo de cifrado algorithm.
Si devuelve un array vacío, entonces todas las claves entre
1 y [mcrypt_module_get_algo_key_size()](#function.mcrypt-module-get-algo-key-size) son
soportadas por el algoritmo.

### Ver también

    - [mcrypt_enc_get_supported_key_sizes()](#function.mcrypt-enc-get-supported-key-sizes) - Devuelve un array que contiene los tamaños de clave admitidos por un algoritmo

# mcrypt_module_is_block_algorithm

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_is_block_algorithm — Indica si un algoritmo funciona por bloques

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_is_block_algorithm**([string](#language.types.string) $algorithm, [string](#language.types.string) $lib_dir = ?): [bool](#language.types.boolean)

**mcrypt_module_is_block_algorithm()** devuelve **[true](#constant.true)**
si algorithm es un algoritmo por bloques,
o **[false](#constant.false)** si es un algoritmo por flujo.

### Parámetros

     algorithm


       El algoritmo a verificar.






     lib_dir


       El parámetro opcional lib_dir
       puede contener la ruta donde se encuentran los módulos de los algoritmos
       en el disco del sistema.





### Valores devueltos

Devuelve **[true](#constant.true)** si el algoritmo especificado es un algoritmo por bloques
o **[false](#constant.false)** si es un algoritmo por flujo.

# mcrypt_module_is_block_algorithm_mode

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_is_block_algorithm_mode — Indica si un modo funciona por bloques

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_is_block_algorithm_mode**([string](#language.types.string) $mode, [string](#language.types.string) $lib_dir = ?): [bool](#language.types.boolean)

Esta función devuelve **[true](#constant.true)** si el modo debe ser utilizado
con un algoritmo por bloques, de lo contrario, devuelve **[false](#constant.false)**
(i.e. **[false](#constant.false)** para un flujo, y **[true](#constant.true)** para cbc, cfb, ofb).

### Parámetros

     mode


       El modo a verificar.






     lib_dir


       El argumento opcional lib_dir
       puede contener el directorio donde los módulos de algoritmo
       se encuentran en el sistema.





### Valores devueltos

Esta función devuelve **[true](#constant.true)** si el modo debe ser utilizado
con un algoritmo por bloques, de lo contrario, devuelve **[false](#constant.false)**
(i.e. **[false](#constant.false)** para un flujo, y **[true](#constant.true)** para cbc, cfb, ofb).

# mcrypt_module_is_block_mode

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_is_block_mode — Indica si un modo trabaja por bloques

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_is_block_mode**([string](#language.types.string) $mode, [string](#language.types.string) $lib_dir = ?): [bool](#language.types.boolean)

Esta función devuelve **[true](#constant.true)** si este modo proporciona bloques de bytes o
**[false](#constant.false)** si solo produce bytes.
(i.e. **[true](#constant.true)** para "cbc" y "ecb",
y **[false](#constant.false)** para "cfb" y "stream").

### Parámetros

     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".





     lib_dir


       El parámetro opcional lib_dir contiene
       la ruta de acceso hasta el módulo del algoritmo en el sistema.





### Valores devueltos

Esta función devuelve **[true](#constant.true)** si este modo proporciona bloques de bytes o
**[false](#constant.false)** si solo produce bytes.
(i.e. **[true](#constant.true)** para "cbc" y "ecb",
y **[false](#constant.false)** para "cfb" y "stream").

# mcrypt_module_open

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_open — Abre el módulo del algoritmo y del modo a utilizar

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_open**(
    [string](#language.types.string) $algorithm,
    [string](#language.types.string) $algorithm_directory,
    [string](#language.types.string) $mode,
    [string](#language.types.string) $mode_directory
): [resource](#language.types.resource)

**mcrypt_module_open()** abre el módulo del algoritmo
y del modo a utilizar. El nombre del algoritmo se especifica mediante el parámetro
algorithm (por ejemplo: "twofish"),
o bien una de las constantes **[MCRYPT_ciphername](#constant.mcrypt-ciphername)**. La biblioteca se cierra
al llamar a [mcrypt_module_close()](#function.mcrypt-module-close).

### Parámetros

     algorithm

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     algorithm_directory


       El parámetro algorithm_directory se utiliza
       para localizar el módulo de cifrado. Cuando se especifica un
       nombre de directorio, se utilizará. Si se especifica una cadena vacía
       (""), se utilizará el valor definido en la directiva
       mcrypt.algorithms_dir del fichero php.ini. Cuando no está definida, el directorio por omisión utilizado
       será aquel en el que se encuentre la biblioteca libmcrypt
       (habitualmente, /usr/local/lib/libmcrypt).






     mode

      One of the **[MCRYPT_MODE_modename](#constant.mcrypt-mode-modename)** constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".





     mode_directory


       El parámetro mode_directory se utiliza para localizar
       el módulo de cifrado. Si se especifica un nombre de directorio, se utilizará.
       Cuando se especifica una cadena vacía (""), se utilizará el valor
       de la directiva mcrypt.modes_dir del fichero php.ini.
       Si no está definida, el directorio por omisión utilizado
       será aquel en el que se encuentre la biblioteca libmcrypt
       (habitualmente /usr/local/lib/libmcrypt).





### Valores devueltos

Normalmente, esta función devuelve un descriptor de cifrado, o
**[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_module_open()**

&lt;?php
$td = mcrypt_module_open(MCRYPT_DES, '',
MCRYPT_MODE_ECB, '/usr/lib/mcrypt-modes');

$td = mcrypt_module_open('rijndael-256', '', 'ofb', '');
?&gt;

La primera línea del ejemplo anterior intentará abrir el cifrado
DES, en el directorio por omisión, y el modo ECB en el directorio
/usr/lib/mcrypt-modes. El segundo ejemplo utiliza
las cadenas como nombre para el cifrado y el modo. Esto solo funciona
si la extensión está compilada con libmcrypt 2.4.x o 2.5.x.

    **Ejemplo #2 Utilización de mcrypt_module_open()** para cifrar

&lt;?php
/_ Carga un cifrado _/
$td = mcrypt_module_open('rijndael-256', '', 'ofb', '');

/_ Crea el VI y determina el tamaño de la clave _/
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
$ks = mcrypt_enc_get_key_size($td);

/_ Crea la clave (ejemplo únicamente: MD5 no es un buen algoritmo de hash para esto) _/
$key = substr(hash('md5', 'very secret key'), 0, $ks);

/_ Inicializa el cifrado _/
mcrypt_generic_init($td, $key, $iv);

/_ Cifra los datos _/
$encrypted = mcrypt_generic($td, 'This is very important data');

/_ Libera el gestor de cifrado _/
mcrypt_generic_deinit($td);

/_ Inicializa el módulo de cifrado para el descifrado _/
mcrypt_generic_init($td, $key, $iv);

/_ Descifra los datos _/
$decrypted = mdecrypt_generic($td, $encrypted);

/_ Libera el gestor de descifrado y cierra el módulo _/
mcrypt_generic_deinit($td);
mcrypt_module_close($td);

/_ Muestra la cadena _/
echo trim($decrypted)."\n";
?&gt;

### Ver también

    - [mcrypt_module_close()](#function.mcrypt-module-close) - Libera el módulo de cifrado

    - [mcrypt_generic()](#function.mcrypt-generic) - Cifra los datos

    - [mdecrypt_generic()](#function.mdecrypt-generic) - Desencripta los datos

    - [mcrypt_generic_init()](#function.mcrypt-generic-init) - Inicializa todos los buffers necesarios

    - [mcrypt_generic_deinit()](#function.mcrypt-generic-deinit) - Prepara el módulo para la descarga

# mcrypt_module_self_test

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mcrypt_module_self_test — Prueba un modo

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mcrypt_module_self_test**([string](#language.types.string) $algorithm, [string](#language.types.string) $lib_dir = ?): [bool](#language.types.boolean)

Realiza una prueba sobre el algoritmo especificado.

### Parámetros

     algorithm

      One of the **[MCRYPT_ciphername](#constant.mcrypt-ciphername)** constants, or the name of the algorithm as string.





     lib_dir


       El argumento opcional lib_dir contiene
       la ruta de acceso hasta el módulo del algoritmo en el sistema.





### Valores devueltos

Devuelve **[true](#constant.true)** si la prueba funciona, y **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con mcrypt_module_self_test()**

&lt;?php
var_dump(mcrypt_module_self_test(MCRYPT_RIJNDAEL_128)) . "\n";
var_dump(mcrypt_module_self_test(MCRYPT_BOGUS_CYPHER));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

# mdecrypt_generic

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7 &lt; 7.2.0, PECL mcrypt &gt;= 1.0.0)

mdecrypt_generic — Desencripta los datos

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.1.0 y ha sido
_ELIMINADA_ a partir de PHP 7.2.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**mdecrypt_generic**([resource](#language.types.resource) $td, [string](#language.types.string) $data): [string](#language.types.string)

Desencripta los datos data. Tenga en cuenta que la longitud
del string desencriptado puede ser más larga que el string original, ya que
puede haber sido completado con caracteres.

### Parámetros

     td


       Un descriptor de cifrado, devuelto por la función
       [mcrypt_module_open()](#function.mcrypt-module-open)






     data


       Los datos cifrados.





### Valores devueltos

Devuelve el string desencriptado.

### Ejemplos

    **Ejemplo #1 Ejemplo con mdecrypt_generic()**

&lt;?php
/_ Datos _/
$key = 'Esta es una clave de cifrado muy larga, incluso demasiado larga';
$plain_text = 'Estos son datos importantes';

/_ Abre el módulo y crea un VI _/
$td = mcrypt_module_open('des', '', 'ecb', '');
$key = substr($key, 0, mcrypt_enc_get_key_size($td));
$iv_size = mcrypt_enc_get_iv_size($td);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

/_ Inicializa el módulo de cifrado _/
if (mcrypt_generic_init($td, $key, $iv) != -1) {

    /* Cifra los datos */
    $c_t = mcrypt_generic($td, $plain_text);
    mcrypt_generic_deinit($td);

    /* Reinicia los buffers para el descifrado */
    mcrypt_generic_init($td, $key, $iv);
    $p_t = mdecrypt_generic($td, $c_t);

    /* Limpia */
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);

}

if (strncmp($p_t, $plain_text, strlen($plain_text)) == 0) {
echo "ok\n";
} else {
echo "error\n";
}
?&gt;

El ejemplo anterior muestra cómo verificar que los datos antes
del cifrado son los mismos que después del
cifrado/descifrado. Es muy importante reiniciar
el buffer de cifrado con [mcrypt_generic_init()](#function.mcrypt-generic-init)
antes de descifrar los datos.

El gestor de descifrado debe ser siempre inicializado
por la función [mcrypt_generic_init()](#function.mcrypt-generic-init) con una clave
y un VI antes de llamar a esta función. Cuando el cifrado está hecho,
es necesario liberar los datos cifrados llamando
a [mcrypt_generic_deinit()](#function.mcrypt-generic-deinit).
Consulte [mcrypt_module_open()](#function.mcrypt-module-open) para un ejemplo.

### Ver también

    - [mcrypt_generic()](#function.mcrypt-generic) - Cifra los datos

    - [mcrypt_generic_init()](#function.mcrypt-generic-init) - Inicializa todos los buffers necesarios

    - [mcrypt_generic_deinit()](#function.mcrypt-generic-deinit) - Prepara el módulo para la descarga

## Tabla de contenidos

- [mcrypt_create_iv](#function.mcrypt-create-iv) — Crea un vector de inicialización (IV) a partir de una fuente aleatoria
- [mcrypt_decrypt](#function.mcrypt-decrypt) — Descifra un texto con los parámetros dados
- [mcrypt_enc_get_algorithms_name](#function.mcrypt-enc-get-algorithms-name) — Devuelve el nombre del algoritmo de cifrado
- [mcrypt_enc_get_block_size](#function.mcrypt-enc-get-block-size) — Devuelve el tamaño de bloque de un algoritmo
- [mcrypt_enc_get_iv_size](#function.mcrypt-enc-get-iv-size) — Devuelve el tamaño del VI de un algoritmo
- [mcrypt_enc_get_key_size](#function.mcrypt-enc-get-key-size) — Devuelve el tamaño máximo de la clave para un modo
- [mcrypt_enc_get_modes_name](#function.mcrypt-enc-get-modes-name) — Devuelve el nombre del modo
- [mcrypt_enc_get_supported_key_sizes](#function.mcrypt-enc-get-supported-key-sizes) — Devuelve un array que contiene los tamaños de clave admitidos por un algoritmo
- [mcrypt_enc_is_block_algorithm](#function.mcrypt-enc-is-block-algorithm) — Comprueba si el cifrado es por bloques en un algoritmo
- [mcrypt_enc_is_block_algorithm_mode](#function.mcrypt-enc-is-block-algorithm-mode) — Comprueba si el modo de cifrado es por bloques
- [mcrypt_enc_is_block_mode](#function.mcrypt-enc-is-block-mode) — Comprueba si el modo devuelve los datos por bloques
- [mcrypt_enc_self_test](#function.mcrypt-enc-self-test) — Prueba un módulo abierto
- [mcrypt_encrypt](#function.mcrypt-encrypt) — Cifra un texto
- [mcrypt_generic](#function.mcrypt-generic) — Cifra los datos
- [mcrypt_generic_deinit](#function.mcrypt-generic-deinit) — Prepara el módulo para la descarga
- [mcrypt_generic_init](#function.mcrypt-generic-init) — Inicializa todos los buffers necesarios
- [mcrypt_get_block_size](#function.mcrypt-get-block-size) — Devuelve el tamaño de bloques de un cifrado
- [mcrypt_get_cipher_name](#function.mcrypt-get-cipher-name) — Lee el nombre del cifrado utilizado
- [mcrypt_get_iv_size](#function.mcrypt-get-iv-size) — Retorna el tamaño del VI utilizado por un par cifrado/modo
- [mcrypt_get_key_size](#function.mcrypt-get-key-size) — Devuelve el tamaño de la clave de cifrado
- [mcrypt_list_algorithms](#function.mcrypt-list-algorithms) — Lista todos los algoritmos de cifrado soportados
- [mcrypt_list_modes](#function.mcrypt-list-modes) — Lista todos los modos de cifrado soportados
- [mcrypt_module_close](#function.mcrypt-module-close) — Libera el módulo de cifrado
- [mcrypt_module_get_algo_block_size](#function.mcrypt-module-get-algo-block-size) — Devuelve el tamaño de bloques de un algoritmo
- [mcrypt_module_get_algo_key_size](#function.mcrypt-module-get-algo-key-size) — Devuelve el tamaño máximo de clave
- [mcrypt_module_get_supported_key_sizes](#function.mcrypt-module-get-supported-key-sizes) — Devuelve un array que contiene los tamaños de claves soportados por el algoritmo abierto
- [mcrypt_module_is_block_algorithm](#function.mcrypt-module-is-block-algorithm) — Indica si un algoritmo funciona por bloques
- [mcrypt_module_is_block_algorithm_mode](#function.mcrypt-module-is-block-algorithm-mode) — Indica si un modo funciona por bloques
- [mcrypt_module_is_block_mode](#function.mcrypt-module-is-block-mode) — Indica si un modo trabaja por bloques
- [mcrypt_module_open](#function.mcrypt-module-open) — Abre el módulo del algoritmo y del modo a utilizar
- [mcrypt_module_self_test](#function.mcrypt-module-self-test) — Prueba un modo
- [mdecrypt_generic](#function.mdecrypt-generic) — Desencripta los datos

- [Introducción](#intro.mcrypt)
- [Instalación/Configuración](#mcrypt.setup)<li>[Requerimientos](#mcrypt.requirements)
- [Instalación](#mcrypt.installation)
- [Configuración en tiempo de ejecución](#mcrypt.configuration)
- [Tipos de recursos](#mcrypt.resources)
  </li>- [Constantes predefinidas](#mcrypt.constants)
- [Modos de cifrado Mcrypt](#mcrypt.ciphers)
- [Funciones Mcrypt](#ref.mcrypt)<li>[mcrypt_create_iv](#function.mcrypt-create-iv) — Crea un vector de inicialización (IV) a partir de una fuente aleatoria
- [mcrypt_decrypt](#function.mcrypt-decrypt) — Descifra un texto con los parámetros dados
- [mcrypt_enc_get_algorithms_name](#function.mcrypt-enc-get-algorithms-name) — Devuelve el nombre del algoritmo de cifrado
- [mcrypt_enc_get_block_size](#function.mcrypt-enc-get-block-size) — Devuelve el tamaño de bloque de un algoritmo
- [mcrypt_enc_get_iv_size](#function.mcrypt-enc-get-iv-size) — Devuelve el tamaño del VI de un algoritmo
- [mcrypt_enc_get_key_size](#function.mcrypt-enc-get-key-size) — Devuelve el tamaño máximo de la clave para un modo
- [mcrypt_enc_get_modes_name](#function.mcrypt-enc-get-modes-name) — Devuelve el nombre del modo
- [mcrypt_enc_get_supported_key_sizes](#function.mcrypt-enc-get-supported-key-sizes) — Devuelve un array que contiene los tamaños de clave admitidos por un algoritmo
- [mcrypt_enc_is_block_algorithm](#function.mcrypt-enc-is-block-algorithm) — Comprueba si el cifrado es por bloques en un algoritmo
- [mcrypt_enc_is_block_algorithm_mode](#function.mcrypt-enc-is-block-algorithm-mode) — Comprueba si el modo de cifrado es por bloques
- [mcrypt_enc_is_block_mode](#function.mcrypt-enc-is-block-mode) — Comprueba si el modo devuelve los datos por bloques
- [mcrypt_enc_self_test](#function.mcrypt-enc-self-test) — Prueba un módulo abierto
- [mcrypt_encrypt](#function.mcrypt-encrypt) — Cifra un texto
- [mcrypt_generic](#function.mcrypt-generic) — Cifra los datos
- [mcrypt_generic_deinit](#function.mcrypt-generic-deinit) — Prepara el módulo para la descarga
- [mcrypt_generic_init](#function.mcrypt-generic-init) — Inicializa todos los buffers necesarios
- [mcrypt_get_block_size](#function.mcrypt-get-block-size) — Devuelve el tamaño de bloques de un cifrado
- [mcrypt_get_cipher_name](#function.mcrypt-get-cipher-name) — Lee el nombre del cifrado utilizado
- [mcrypt_get_iv_size](#function.mcrypt-get-iv-size) — Retorna el tamaño del VI utilizado por un par cifrado/modo
- [mcrypt_get_key_size](#function.mcrypt-get-key-size) — Devuelve el tamaño de la clave de cifrado
- [mcrypt_list_algorithms](#function.mcrypt-list-algorithms) — Lista todos los algoritmos de cifrado soportados
- [mcrypt_list_modes](#function.mcrypt-list-modes) — Lista todos los modos de cifrado soportados
- [mcrypt_module_close](#function.mcrypt-module-close) — Libera el módulo de cifrado
- [mcrypt_module_get_algo_block_size](#function.mcrypt-module-get-algo-block-size) — Devuelve el tamaño de bloques de un algoritmo
- [mcrypt_module_get_algo_key_size](#function.mcrypt-module-get-algo-key-size) — Devuelve el tamaño máximo de clave
- [mcrypt_module_get_supported_key_sizes](#function.mcrypt-module-get-supported-key-sizes) — Devuelve un array que contiene los tamaños de claves soportados por el algoritmo abierto
- [mcrypt_module_is_block_algorithm](#function.mcrypt-module-is-block-algorithm) — Indica si un algoritmo funciona por bloques
- [mcrypt_module_is_block_algorithm_mode](#function.mcrypt-module-is-block-algorithm-mode) — Indica si un modo funciona por bloques
- [mcrypt_module_is_block_mode](#function.mcrypt-module-is-block-mode) — Indica si un modo trabaja por bloques
- [mcrypt_module_open](#function.mcrypt-module-open) — Abre el módulo del algoritmo y del modo a utilizar
- [mcrypt_module_self_test](#function.mcrypt-module-self-test) — Prueba un modo
- [mdecrypt_generic](#function.mdecrypt-generic) — Desencripta los datos
  </li>
