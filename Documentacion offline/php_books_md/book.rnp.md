# Rnp

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

Este módulo permite utilizar la biblioteca [» RNP](https://www.rnpgp.org/).
RNP es una biblioteca OpenPGP C++ de alto rendimiento utilizada por Mozilla Thunderbird.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#rnp.requirements)
- [Instalación](#rnp.installation)

    ## Requerimientos

    Para utilizar las funciones de la biblioteca RNP, es necesario instalar la
    [» biblioteca RNP](https://www.rnpgp.org/). La versión de la
    biblioteca RNP debe ser &gt;= 0.16.2.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/rnp](https://pecl.php.net/package/rnp)

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[RNP_KEYSTORE_GPG](#constant.rnp-keystore-gpg)**
     ([string](#language.types.string))



      Formato del almacén de claves "GPG".





     **[RNP_KEYSTORE_KBX](#constant.rnp-keystore-kbx)**
     ([string](#language.types.string))



      Formato del almacén de claves "KBX". Solo para claves públicas.
      Una caja de claves (keybox) es un formato de fichero utilizado para almacenar claves públicas con metadatos e índices.





     **[RNP_KEYSTORE_G10](#constant.rnp-keystore-g10)**
     ([string](#language.types.string))



      Formato del almacén de claves "G10". Para claves privadas.





     **[RNP_LOAD_SAVE_PUBLIC_KEYS](#constant.rnp-load-save-public-keys)**
     ([integer](#language.types.integer))



      Carga o guarda solo las claves públicas. Puede ser combinado con **[RNP_LOAD_SAVE_SECRET_KEYS](#constant.rnp-load-save-secret-keys)**
      para cargar tanto las claves públicas como privadas en el contexto FFI o guardarlas del contexto.





     **[RNP_LOAD_SAVE_SECRET_KEYS](#constant.rnp-load-save-secret-keys)**
     ([integer](#language.types.integer))



      Carga o guarda solo las claves secretas. Puede ser combinado con **[RNP_LOAD_SAVE_PUBLIC_KEYS](#constant.rnp-load-save-public-keys)**
      para cargar tanto las claves públicas como privadas en el contexto FFI o guardarlas del contexto.





     **[RNP_LOAD_SAVE_PERMISSIVE](#constant.rnp-load-save-permissive)**
     ([integer](#language.types.integer))



      Permite ignorar los paquetes de firma/clave/subclave incorrectos durante la importación de claves.





     **[RNP_LOAD_SAVE_SINGLE](#constant.rnp-load-save-single)**
     ([integer](#language.types.integer))



      Si se define, solo la primera clave será cargada.





     **[RNP_LOAD_SAVE_BASE64](#constant.rnp-load-save-base64)**
     ([integer](#language.types.integer))



      Permite la importación de claves codificadas en base64 (claves autocrypt).





     **[RNP_FEATURE_SYMM_ALG](#constant.rnp-feature-symm-alg)**
     ([string](#language.types.string))



      Lista los algoritmos de cifrado simétrico disponibles.





     **[RNP_FEATURE_AEAD_ALG](#constant.rnp-feature-aead-alg)**
     ([string](#language.types.string))



      Lista los algoritmos AEAD disponibles.





     **[RNP_FEATURE_PROT_MODE](#constant.rnp-feature-prot-mode)**
     ([string](#language.types.string))



      Lista los modos de protección disponibles.





     **[RNP_FEATURE_PK_ALG](#constant.rnp-feature-pk-alg)**
     ([string](#language.types.string))



      Lista los algoritmos de clave pública disponibles.





     **[RNP_FEATURE_HASH_ALG](#constant.rnp-feature-hash-alg)**
     ([string](#language.types.string))



      Lista los algoritmos de hash disponibles.





     **[RNP_FEATURE_COMP_ALG](#constant.rnp-feature-comp-alg)**
     ([string](#language.types.string))



      Lista los algoritmos de compresión disponibles.





     **[RNP_FEATURE_CURVE](#constant.rnp-feature-curve)**
     ([string](#language.types.string))



      Lista las curvas elípticas disponibles.





     **[RNP_DUMP_MPI](#constant.rnp-dump-mpi)**
     ([integer](#language.types.integer))



      Muestra los valores MPI (enteros multi-precisión).





     **[RNP_DUMP_RAW](#constant.rnp-dump-raw)**
     ([integer](#language.types.integer))



      Muestra también el contenido sin tratar del paquete.





     **[RNP_DUMP_GRIP](#constant.rnp-dump-grip)**
     ([integer](#language.types.integer))



      Muestra las huellas y los identificadores de clave.





     **[RNP_JSON_DUMP_MPI](#constant.rnp-json-dump-mpi)**
     ([integer](#language.types.integer))



      Muestra los valores MPI (enteros multi-precisión).





     **[RNP_JSON_DUMP_RAW](#constant.rnp-json-dump-raw)**
     ([integer](#language.types.integer))



      Muestra también el contenido sin tratar del paquete.





     **[RNP_JSON_DUMP_GRIP](#constant.rnp-json-dump-grip)**
     ([integer](#language.types.integer))



      Muestra las huellas y los identificadores de clave.





     **[RNP_ENCRYPT_NOWRAP](#constant.rnp-encrypt-nowrap)**
     ([integer](#language.types.integer))



      Permite el cifrado del mensaje firmado. El mensaje no está envuelto
      en un paquete de datos literales.





     **[RNP_KEY_EXPORT_ARMORED](#constant.rnp-key-export-armored)**
     ([integer](#language.types.integer))



      Activa la armadura ASCII de los datos exportados.





     **[RNP_KEY_EXPORT_PUBLIC](#constant.rnp-key-export-public)**
     ([integer](#language.types.integer))



      Exporta la clave pública.





     **[RNP_KEY_EXPORT_SECRET](#constant.rnp-key-export-secret)**
     ([integer](#language.types.integer))



      Exporta la clave secreta.





     **[RNP_KEY_EXPORT_SUBKEYS](#constant.rnp-key-export-subkeys)**
     ([integer](#language.types.integer))



      Si la clave principal es exportada, todas las subclaves lo serán también.





     **[RNP_KEY_EXPORT_BASE64](#constant.rnp-key-export-base64)**
     ([integer](#language.types.integer))



      Exporta la clave autocrypt codificada en base64 en lugar de binaria.





     **[RNP_KEY_REMOVE_PUBLIC](#constant.rnp-key-remove-public)**
     ([integer](#language.types.integer))



      Elimina la clave pública.





     **[RNP_KEY_REMOVE_SECRET](#constant.rnp-key-remove-secret)**
     ([integer](#language.types.integer))



      Elimina la clave secreta.





     **[RNP_KEY_REMOVE_SUBKEYS](#constant.rnp-key-remove-subkeys)**
     ([integer](#language.types.integer))



      Si la clave principal es eliminada, todas las subclaves lo serán también.


# Ejemplos

## Tabla de contenidos

- [Texto firmado en claro](#rnp.examples-clearsign)

    ## Texto firmado en claro

    Este ejemplo va a firmar en claro un texto dado.

    **Ejemplo #1 Ejemplo de firma RNP en claro**

&lt;?php
// inicializa el objeto FFI
$ffi = rnp_ffi_create('GPG', 'GPG');

// genera una clave RSA
$key = rnp_op_generate_key($ffi, 'test@example.com', 'RSA');

// firma
$data = "Example text to sign";
$signature = rnp_op_sign_cleartext($ffi, $data, array($key));

echo $signature;

// destruye el objeto FFI
rnp_ffi_destroy($ffi);
?&gt;

# Funciones de Rnp

# rnp_backend_string

(PECL rnp &gt;= 0.1.1)

rnp_backend_string — Devuelve el nombre de la biblioteca back-end de criptografía

### Descripción

**rnp_backend_string**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la biblioteca back-end de criptografía. Las bibliotecas de criptografía
soportadas son "Botan" y "OpenSSL".

# rnp_backend_version

(PECL rnp &gt;= 0.1.1)

rnp_backend_version — Devuelve la versión de la biblioteca back-end de criptografía

### Descripción

**rnp_backend_version**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La versión en forma de string.

# rnp_decrypt

(PECL rnp &gt;= 0.1.1)

rnp_decrypt — Desencripta un mensaje PGP

### Descripción

**rnp_decrypt**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $input): [string](#language.types.string)|[false](#language.types.singleton)

Las claves privadas utilizadas para el desencriptado deben ser cargadas en el objeto FFI antes de llamar a esta función.
Si se ha utilizado el cifrado por contraseña, el proveedor de contraseña debe ser definido llamando a
[rnp_ffi_set_pass_provider()](#function.rnp-ffi-set-pass-provider).

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    input


      El mensaje cifrado.


### Valores devueltos

El mensaje desencriptado en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_dump_packets

(PECL rnp &gt;= 0.1.1)

rnp_dump_packets — Muestra la información del flujo de paquetes OpenPGP en un formato legible por el ser humano

### Descripción

**rnp_dump_packets**([string](#language.types.string) $input, [int](#language.types.integer) $flags): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    input


      La cadena de entrada que contiene los datos OpenPGP, ya sea en formato binario o en formato ASCII-armored.






    flags


      Ver las constantes predefinidas **[RNP_DUMP_*](#constant.rnp-dump-mpi)**.


### Valores devueltos

Un texto que describe la secuencia de paquetes o **[false](#constant.false)** si ocurre un error.

# rnp_dump_packets_to_json

(PECL rnp &gt;= 0.1.1)

rnp_dump_packets_to_json — Muestra la información del flujo de paquetes OpenPGP en un string JSON

### Descripción

**rnp_dump_packets_to_json**([string](#language.types.string) $input, [int](#language.types.integer) $flags): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    input


      El string de entrada que contiene los datos OpenPGP, ya sea en formato binario o en formato ASCII-armored.






    flags


      Ver las constantes predefinidas **[RNP_JSON_DUMP_*](#constant.rnp-json-dump-mpi)**.


### Valores devueltos

Un string JSON con la información o **[false](#constant.false)** si ocurre un error

# rnp_ffi_create

(PECL rnp &gt;= 0.1.1)

rnp_ffi_create — Crear un objeto de nivel superior utilizado para interactuar con la biblioteca

### Descripción

**rnp_ffi_create**([string](#language.types.string) $pub_format, [string](#language.types.string) $sec_format): [RnpFFI](#class.rnpffi)|[false](#language.types.singleton)

### Parámetros

    pub_format


      El formato del llavero de claves públicas, RNP_KEYSTORE_GPG o
      otra constante RNP_KEYSTORE_*.






    sec_format


      El formato del llavero de claves secretas, RNP_KEYSTORE_GPG o
      otra constante RNP_KEYSTORE_*.


### Valores devueltos

Devuelve un objeto [RnpFFI](#class.rnpffi) en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_ffi_destroy

(PECL rnp &gt;= 0.1.1)

rnp_ffi_destroy — Destruye el objeto de nivel superior utilizado para interactuar con la biblioteca

### Descripción

**rnp_ffi_destroy**([RnpFFI](#class.rnpffi) $ffi): [void](language.types.void.html)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).


### Valores devueltos

# rnp_ffi_set_pass_provider

(PECL rnp &gt;= 0.1.1)

rnp_ffi_set_pass_provider — Define la función de retrollamada del proveedor de contraseña

### Descripción

**rnp_ffi_set_pass_provider**([RnpFFI](#class.rnpffi) $ffi, [callable](#language.types.callable) $password_callback): [bool](#language.types.boolean)

Define la función de retrollamada del proveedor de contraseña. Esta función puede solicitar la contraseña en una entrada estándar
(si el script PHP se ejecuta en un entorno de línea de comandos), mostrar un cuadro de diálogo GUI o proporcionar
la contraseña de todas las maneras posibles. Las contraseñas solicitadas se utilizan para cifrar o descifrar
las claves secretas o realizar operaciones de cifrado/descifrado simétricas.

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    password_callback


      La función que debe ser llamada para cada solicitud de contraseña. Tiene la siguiente firma:



       password_callback([string](#language.types.string) $key_fp, [string](#language.types.string) $pgp_context, [string](#language.types.string) &amp;$password): [bool](#language.types.boolean)


       - $key_fp - La huella de la clave, si corresponde. Puede estar vacío.

       - $pgp_context - Cadena que describe por qué se solicita la clave.

       - $password - Referencia de cadena donde debe almacenarse la contraseña proporcionada.


      La función de retrollamada debe devolver **[true](#constant.true)** si la contraseña se ha establecido correctamente o **[false](#constant.false)** si ocurre un error.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

       **Ejemplo #1 Ejemplo de una función de retrollamada simple**




&lt;?php
function password_callback(string $key_fp, string $pgp_context, string &amp;$password)
{
$password = "password";

    return true;

}

$ffi = rnp_ffi_create('GPG', 'GPG');

rnp_ffi_set_pass_provider($ffi, 'password_callback');

# rnp_import_keys

(PECL rnp &gt;= 0.1.1)

rnp_import_keys — Importa claves desde una string PHP hacia el llavero de claves y devuelve un JSON describiendo las claves nuevas o actualizadas

### Descripción

**rnp_import_keys**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $input, [int](#language.types.integer) $flags): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    input


      Los paquetes OpenPGP que contienen la o las claves a cargar. Puede ser binario o ASCII armored.






    flags


      Ver las constantes predefinidas **[RNP_LOAD_SAVE_*](#constant.rnp-load-save-public-keys)**.


### Valores devueltos

Una string JSON con la información sobre las claves nuevas y actualizadas en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_import_signatures

(PECL rnp &gt;= 0.1.1)

rnp_import_signatures — Importa firmas autónomas en el llavero de claves y devuelve un JSON que describe las claves actualizadas

### Descripción

**rnp_import_signatures**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $input, [int](#language.types.integer) $flags): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    input


      Los paquetes OpenPGP que contienen las firmas a importar. Puede ser binario o ASCII armado.






    flags


      Actualmente debe ser 0.


### Valores devueltos

La cadena JSON con información sobre las claves actualizadas en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_key_export

(PECL rnp &gt;= 0.1.1)

rnp_key_export — Exporta una clave

### Descripción

**rnp_key_export**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $key_fp, [int](#language.types.integer) $flags): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    key_fp


      La huella de la clave.






    flags


      Ver **[RNP_KEY_EXPORT_*](#constant.rnp-key-export-armored)** constantes predefinidas
      (excepto **[RNP_KEY_EXPORT_BASE64](#constant.rnp-key-export-base64)**).


### Valores devueltos

El paquete OpenPGP exportado de la clave (binario o ASCII-armored) en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_key_export_autocrypt

(PECL rnp &gt;= 0.1.1)

rnp_key_export_autocrypt —
Exporta la clave mínima para la funcionalidad autocrypt (solo 5 paquetes: clave, uid, firma,
subclave de cifrado, firma)

### Descripción

**rnp_key_export_autocrypt**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $key_fp,
    [string](#language.types.string) $subkey_fp,
    [string](#language.types.string) $uid,
    [int](#language.types.integer) $flags
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    key_fp


      La huella de la clave primaria.






    subkey_fp


      La subclave a exportar. Puede ser una string vacía
      para elegir la primera subclave apropiada.






    uid


      El identificador del usuario a exportar. Puede ser una string vacía
      si la clave exportada solo tiene un identificador.






    flags


      Solo **[RNP_KEY_EXPORT_BASE64](#constant.rnp-key-export-base64)** es actualmente soportado. Activarlo
      exportará los datos de la clave codificados en base64 en lugar de binario.


### Valores devueltos

Los paquetes OpenPGP de la clave exportada en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_key_export_revocation

(PECL rnp &gt;= 0.1.1)

rnp_key_export_revocation — Genera y exporta una firma de revocación de clave primaria

### Descripción

**rnp_key_export_revocation**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $key_fp,
    [int](#language.types.integer) $flags,
    [array](#language.types.array) $options = ?
): [string](#language.types.string)|[false](#language.types.singleton)

Notas: para revocar una clave, será necesario importar esta firma en el llavero de claves o utilizar
la función [rnp_key_revoke()](#function.rnp-key-revoke).

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    key_fp


      La huella de la clave primaria a revocar.






    flags


      **[RNP_KEY_EXPORT_ARMORED](#constant.rnp-key-export-armored)** o 0.






    options


      Un array asociativo con opciones.







         Key
         Tipo de datos
         Descripción






         "hash"
         string
         Define el algoritmo de hash utilizado en el cálculo de la firma.



         "code"
         string
         Código de razón de la revocación. Valores posibles: 'no', 'superseded', 'compromised',
          'retired'. Si no se define, se utilizará el valor 'no' por omisión.



         "reason"
         string
         Representación textual de la razón de la revocación.






### Valores devueltos

Revocación exportada en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_key_get_info

(PECL rnp &gt;= 0.1.1)

rnp_key_get_info — Devuelve información sobre la clave

### Descripción

**rnp_key_get_info**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $key_fp): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    key_fp


      La huella de la clave.


### Valores devueltos

Un array asociativo con información sobre la clave o **[false](#constant.false)** si ocurre un error.

      Key
      Tipo de datos
      Descripción






      "is_primary"
      boolean

       **[true](#constant.true)** si esta clave es la clave primaria.




      "is_sub"
      boolean

       **[true](#constant.true)** si esta clave es una subclave.




      "is_valid"
      boolean

       **[true](#constant.true)** si la clave pública es válida.
       Esto incluye las verificaciones de auto-firmas,
       las fechas de expiración, las revocaciones, etc.




      "is_revoked"
      boolean

       **[true](#constant.true)** si esta clave está revocada.




      "is_superseded"
      boolean

       **[true](#constant.true)** si esta clave está obsoleta. Presente solo si la clave está revocada.




      "is_compromised"
      boolean

       **[true](#constant.true)** si esta clave está comprometida. Presente solo si la clave está revocada.




      "is_retired"
      boolean

       **[true](#constant.true)** si esta clave está retirada. Presente solo si la clave está revocada.




      "is_expired"
      boolean

       **[true](#constant.true)** si esta clave está expirada.




      "have_secret"
      boolean

       **[true](#constant.true)** si esta clave tiene una parte secreta.




      "is_locked"
      boolean

       **[true](#constant.true)** si esta clave está actualmente bloqueada. Presente solo para claves secretas.




      "is_protected"
      boolean

       **[true](#constant.true)** si esta clave está protegida. Presente solo para claves secretas.
       Una clave protegida es una clave que está cifrada y puede ser almacenada de manera segura en memoria
       y bloqueada/desbloqueada según sea necesario.




      "have_public"
      boolean

       **[true](#constant.true)** si esta clave tiene una parte pública. En general, todas las claves tienen una parte pública.




      "valid_till"
      integer

       El timestamp hasta el cual la clave puede ser considerada válida.
       Nota: esto tendrá en cuenta no solo la expiración de la clave, sino también las revocaciones.
       Para la subclave primaria, el tiempo de validez de la clave pública también será verificado.




      "bits"
      integer

       El número de bits en la clave. Para las claves basadas en EC, esto contendrá el tamaño de la curva.




      "alg"
      string

       El algoritmo de nombre de clave.




      "subkeys"
      array

       Un array indexado que contiene información sobre las subclaves.
       Puede estar vacío si la clave primaria no tiene subclaves.




      "uids"
      array

       Un array indexado que contiene información sobre los identificadores de usuario.
       Puede estar vacío si la clave primaria no tiene identificadores de usuario.



# rnp_key_remove

(PECL rnp &gt;= 0.1.1)

rnp_key_remove — Elimina una clave de los llaveros

### Descripción

**rnp_key_remove**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $key_fp, [int](#language.types.integer) $flags): [bool](#language.types.boolean)

Nota: es necesario llamar a [rnp_save_keys()](#function.rnp-save-keys) para escribir los llaveros actualizados.

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    key_fp


      La huella de la clave.






    flags


      Ver **[RNP_KEY_REMOVE_*](#constant.rnp-key-remove-public)** constantes predefinidas. El flag
      **[RNP_KEY_REMOVE_SUBKEYS](#constant.rnp-key-remove-subkeys)** solo funcionará para
      la clave principal y eliminará también todas sus subclaves.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_key_revoke

(PECL rnp &gt;= 0.1.1)

rnp_key_revoke — Elimina una clave o una subclave generando y añadiendo una firma de revocación

### Descripción

**rnp_key_revoke**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $key_fp,
    [int](#language.types.integer) $flags,
    [array](#language.types.array) $options = ?
): [bool](#language.types.boolean)

Nota: es necesario llamar a [rnp_save_keys()](#function.rnp-save-keys) para escribir los ficheros de claves actualizados.

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    key_fp


      La huella de la clave.






    flags


      Actualmente debe ser 0.






    options


      Un array asociativo con opciones.







         Key
         Tipo de datos
         Descripción






         "hash"
         string
         Define el algoritmo de hash utilizado durante el cálculo de la firma.



         "code"
         string
         El código de revocación de la clave. Los valores posibles son 'no', 'superseded', 'compromised', 'retired'.
         Si no se define, se utilizará el valor 'no' por omisión.



         "reason"
         string
         Representación textual de la razón de la revocación.






### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_list_keys

(PECL rnp &gt;= 0.1.1)

rnp_list_keys — Enumera todas las claves presentes en un llavero de claves por tipo de identificador especificado

### Descripción

**rnp_list_keys**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $identifier_type): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    identifier_type


      La clave de tipo de identificador ("userid", "keyid", "grip", "fingerprint").


### Valores devueltos

Un array asociativo donde la clave es un string de identificador y el valor es una huella de clave PGP o **[false](#constant.false)** si ocurre un error.

# rnp_load_keys

(PECL rnp &gt;= 0.1.1)

rnp_load_keys — Carga las claves a partir de un string PHP

### Descripción

**rnp_load_keys**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $format,
    [string](#language.types.string) $input,
    [int](#language.types.integer) $flags
): [bool](#language.types.boolean)

Se debe tener en cuenta que para G10, la entrada debe ser un directorio (que ya debe existir).

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    format


      El formato de clave para los datos (GPG, KBX, G10).






    input


      Los paquetes OpenPGP que contienen la o las claves a cargar. Puede ser binario o ASCII armored.






    flags


      Ver la descripción de los flags **

RNP*LOAD_SAVE*\*\*\*.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error

# rnp_load_keys_from_path

(PECL rnp &gt;= 0.1.1)

rnp_load_keys_from_path — Carga claves a partir de la ruta especificada

### Descripción

**rnp_load_keys_from_path**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $format,
    [string](#language.types.string) $input_path,
    [int](#language.types.integer) $flags
): [bool](#language.types.boolean)

Es importante señalar que para G10, la entrada debe ser un directorio (que ya debe existir).

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    format


      El formato de clave para los datos (GPG, KBX, G10).






    input_path


      El fichero o directorio que contiene las claves.






    flags


      Ver la descripción de los flags **

RNP*LOAD_SAVE*\*\*\*.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_locate_key

(PECL rnp &gt;= 0.1.1)

rnp_locate_key — Búsqueda de la clave

### Descripción

**rnp_locate_key**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $identifier_type, [string](#language.types.string) $identifier): [string](#language.types.string)|[false](#language.types.singleton)

Nota: los identificadores válidos se verifican durante la búsqueda por identificador.

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    identifier_type


      Cadena de tipo de identificador: "userid", "keyid", "fingerprint", "grip".






    identifier


      El identificador del usuario OpenPGP (nombre y correo electrónico) para el tipo "userid", cadena hexadecimal
      que representa el identificador de clave, la huella digital o el grip de clave correspondiente.


### Valores devueltos

Devuelve la huella digital hexadecimal de la clave encontrada en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_op_encrypt

(PECL rnp &gt;= 0.1.1)

rnp_op_encrypt — Cifra un mensaje

### Descripción

**rnp_op_encrypt**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $message,
    [array](#language.types.array) $recipient_keys_fp,
    [array](#language.types.array) $options = ?
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    message


      El mensaje a cifrar.






    recipient_keys_fp


      Un array con las huellas de las claves del destinatario. Al menos una clave debe estar presente.






    options


      Un array asociativo con opciones.







         Key
         Tipo de dato
         Descripción






         "compression_alg"
         string
         Algoritmo de compresión. Las opciones
          "compression_alg" y "compression_level" deben estar ambas definidas
          para activar la compresión de los datos.




         "compression_level"
         integer
         El nivel de compresión, de 0 a 9. 0 desactiva la compresión.



         "armor"
         boolean
         Activa la salida ASCII armada. Desactivada por omisión.



         "add_signature"
         boolean
         El mensaje cifrado será también firmado.



         "hash"
         string
         Define el algoritmo de hash utilizado en el cálculo de la firma. La opción "add_signature" debe estar definida a **[true](#constant.true)**.



         "creation_time"
         integer
         Define la hora de creación de la firma en segundos desde el 1 de enero de 1970 UTC. Por omisión, se utiliza la hora actual.



         "expiration_time"
         integer
         Define el tiempo de expiración de la firma en segundos desde la hora de creación. El valor 0 se utiliza para marcar
          la firma como no expirante (valor por omisión).



         "password"
         string
         Añade una contraseña utilizada para cifrar los datos.



         "cipher"
         string

          Define el algoritmo de cifrado simétrico. Los valores posibles son "IDEA", "TRIPLEDES",
          "CAST5", "BLOWFISH", "AES128", "AES192", "AES256", "TWOFISH", "CAMELLIA128",
          "CAMELLIA192", "CAMELLIA256", "SM4".




         "aead"
         string

          Define el algoritmo de modo AEAD. Los valores posibles son "None" para desactivar AEAD, "EAX", "OCB".




         "aead_bits"
         integer
         Define la longitud del chunk para el modo AEAD en número de bits de tamaño de chunk. Debe estar comprendido entre 0 y 56.



         "flags"
         integer

          Define indicadores de cifrado adicionales. Los indicadores soportados son: RNP_ENCRYPT_NOWRAP - no envolver
          los datos en un paquete de datos literales. Esto permitiría cifrar datos ya firmados.




         "file_name"
         string
         Define el nombre de fichero almacenado internamente para los datos cifrados. El valor especial _CONSOLE puede ser utilizado para marcar
          el mensaje como "para sus ojos solamente", es decir, que no debe ser almacenado en ningún lugar sino solo mostrado
          al destinatario. Por omisión, es una cadena vacía.



         "file_mtime"
         integer
         Define la fecha de modificación del fichero de entrada en segundos desde el 1 de enero de 1970 UTC.






### Valores devueltos

Los datos cifrados en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_op_generate_key

(PECL rnp &gt;= 0.1.1)

rnp_op_generate_key — Genera una clave

### Descripción

**rnp_op_generate_key**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $userid,
    [string](#language.types.string) $key_alg,
    [string](#language.types.string) $sub_alg = ?,
    [array](#language.types.array) $options = ?
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    userid


      El identificador del usuario PGP - texto que debe representar
      el nombre y la dirección de correo electrónico del titular de la clave.






    key_alg


      La clave del algoritmo (es decir, 'RSA', 'DSA', etc).






    sub_alg


      El algoritmo de subclave. Si no está definido, la subclave no será generada.






    options


      Un array asociativo con opciones.







         Clave
         Tipo de datos
         Descripción






         "bits"
         integer
         El tamaño de la clave principal en bits. Aplicable únicamente a las claves RSA, DSA y El-Gamal.



         "hash"
         string
         Algoritmo de hash utilizado en la firma de la clave o la firma de ligadura de subclave.



         "dsa_qbits"
         integer
         Define el tamaño de un parámetro q para la clave DSA.
          Nota: se definirá un valor predeterminado adecuado, según el número de bits de la clave. Sin embargo, puede
          ser reemplazado si es necesario.



         "curve"
         string
         Define la curva utilizada para la clave ECC. Nota: esto se aplica únicamente a las claves ECDSA, ECDH y SM2.



         "request_password"
         boolean
         Activa la solicitud de contraseña a través del proveedor de contraseñas. Esta contraseña
          será utilizada para el cifrado de la clave. La función de retrollamada del proveedor de contraseñas debe ser definida previamente
          llamando a [rnp_ffi_set_pass_provider()](#function.rnp-ffi-set-pass-provider).
          Nota: este parámetro será ignorado si la contraseña ha sido definida a través de "password"



         "password"
         string
         Define la contraseña utilizada para cifrar los datos de la clave secreta.



         "expiration"
         integer
         Define el tiempo de expiración de la clave principal y la subclave en segundos.



         "sub_bits"
         integer
         El tamaño de la subclave en bits. Aplicable únicamente a las claves RSA, DSA y El-Gamal.



         "sub_hash"
         string
         Algoritmo de hash utilizado en la firma de la subclave o la firma de ligadura de subclave.



         "sub_curve"
         string
         Define la curva utilizada para la subclave ECC. Nota: esto se aplica únicamente a las claves ECDSA, ECDH y SM2.






### Valores devueltos

La huella de la clave principal generada o **[false](#constant.false)** si ocurre un error. Esta huella puede ser utilizada
más tarde para referenciar la clave en las operaciones de firma y cifrado. Los datos de la clave se almacenan en el contexto de memoria
FFI y pueden ser guardados utilizando
[rnp_save_keys()](#function.rnp-save-keys) o [rnp_save_keys_to_path()](#function.rnp-save-keys-to-path).

# rnp_op_sign

(PECL rnp &gt;= 0.1.1)

rnp_op_sign — Realiza una operación de firma sobre datos binarios, devuelve la o las firmas integradas

### Descripción

**rnp_op_sign**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $data,
    [array](#language.types.array) $keys_fp,
    [array](#language.types.array) $options = ?
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    data


      Datos a firmar.






    keys_fp


      Un array con las huellas de las claves. Al menos una clave debe ser proporcionada.
      Las claves deben estar presentes en ffi.






    options


      Un array asociativo con opciones.







         Key
         Tipo de datos
         Descripción






         "compression_alg"
         string
        Algoritmo de compresión. Las opciones
          "compression_alg" y "compression_level"
          deben ser ambas definidas para activar la compresión de datos.




         "compression_level"
         integer
         Nivel de compresión, 0-9. 0 desactiva la compresión.



         "armor"
         boolean
         Activa la salida ASCII armada. Desactivado por omisión.



         "hash"
         string
         Define el algoritmo de hash utilizado en el cálculo de la firma.



         "creation_time"
         integer
         Define la hora de creación de la firma en segundos desde el 1 de enero de 1970 UTC. Por omisión, se utiliza la hora actual.



         "expiration_time"
         integer
         Define el tiempo de expiración de la firma en segundos desde la hora de creación. El valor 0 se utiliza
          para marcar la firma como no expirante (valor por omisión).



         "file_name"
         string
         Define el nombre del fichero de entrada. El valor especial _CONSOLE puede ser utilizado para marcar el mensaje
          como 'para sus ojos solamente', es decir, que no debe ser almacenado en ningún lugar sino solo mostrado
          al destinatario. Por omisión, es una cadena vacía.



         "file_mtime"
         integer
         Define la fecha de modificación del fichero de entrada en segundos desde el 1 de enero de 1970 UTC.






### Valores devueltos

Los datos firmados con la(s) firma(s) integrada en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_op_sign_cleartext

(PECL rnp &gt;= 0.1.1)

rnp_op_sign_cleartext — Realiza una operación de firma sobre datos textuales, devuelve el mensaje firmado en claro

### Descripción

**rnp_op_sign_cleartext**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $data,
    [array](#language.types.array) $keys_fp,
    [array](#language.types.array) $options = ?
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    data


      Los datos a firmar.






    keys_fp


      El array con las huellas de las claves. Al menos una clave debe ser proporcionada.
      Las claves deben estar presentes en ffi.






    options


      Un array asociativo con opciones.







         Key
         Tipo de dato
         Descripción






         "armor"
         boolean
         Activa la salida ASCII armada. Desactivado por omisión.



         "hash"
         string
         Define el algoritmo de hash utilizado durante el cálculo de la firma.



         "creation_time"
         integer
         Define la hora de creación de la firma en segundos desde el 1 de enero de 1970 UTC. Por omisión, se utiliza la hora actual.



         "expiration_time"
         integer
         Define el tiempo de expiración de la firma en segundos desde la hora de creación. El valor 0 se utiliza para marcar
         la firma como no expirada (valor por omisión).






### Valores devueltos

El mensaje firmado en claro que contiene los datos fuente con
encabezados adicionales y la firma ASCII-armored en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_op_sign_detached

(PECL rnp &gt;= 0.1.1)

rnp_op_sign_detached — Realiza una operación de firma, devuelve la firma desvinculada

### Descripción

**rnp_op_sign_detached**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $data,
    [array](#language.types.array) $keys_fp,
    [array](#language.types.array) $options = ?
): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    data


      Los datos a firmar.






    keys_fp


      Un array con las huellas de las claves. Al menos una clave debe ser proporcionada.
      Las claves deben estar presentes en ffi.






    options


      Un array asociativo con opciones.







         Key
         Type de donnée
         Descripción






         "armor"
         boolean
         Activa la salida ASCII-armored. Desactivado por omisión.



         "hash"
         string
         Define el algoritmo de hash utilizado durante el cálculo de la firma.



         "creation_time"
         integer
         Define la hora de creación de la firma en segundos desde el 1 de enero de 1970 UTC. Por omisión, se utiliza la hora actual.



         "expiration_time"
         integer
         Define el tiempo de expiración de la firma en segundos desde la hora de creación. El valor 0 se utiliza
         para marcar la firma como no expirada (valor por omisión).






### Valores devueltos

Los datos de firma(s) desvinculados en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_op_verify

(PECL rnp &gt;= 0.1.1)

rnp_op_verify — Verifica las firmas integradas o en claro

### Descripción

**rnp_op_verify**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $data): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    data


      Los datos firmados.
      Signed data.


### Valores devueltos

Un array asociativo con información sobre los resultados de la verificación o **[false](#constant.false)** si ocurre un error.

      Key
      Tipo de datos
      Descripción






      "verification_status"
      string

       Resultados de la verificación global, ya sea la cadena "Success" o un mensaje de error apropiado.
       El resultado "Success" se define cuando al menos una firma es válida y se verifica con éxito.
       El resultado de la verificación individual para cada firma puede ser verificado en el array "signatures".




      "file_name"
      string
      El nombre del fichero.



      "file_mtime"
      integer
      Hora de modificación del fichero.



      "mode"
      string
      Modo de protección de los datos (cifrado) utilizado en el mensaje procesado.
      Los valores actualmente definidos son "none", "cfb", "cfb-mdc", "aead-ocb", "aead-eax".




      "cipher"
      string
      Cifrado simétrico utilizado para el cifrado de los datos.



      "valid_integrity"
      boolean
      **[true](#constant.true)** si la protección de la integridad del mensaje ha sido utilizada (es decir, MDC o AEAD) y ha sido
      validada con éxito.




      "signatures"
      array

       Un array asociativo que describe cada firma encontrada. Ver la descripción a continuación.



El subarray "signatures".

       Key
       Tipo de datos
       Descripción






      "verification_status"
      string
      Estado de verificación de la firma, ya sea la cadena "Success" o un mensaje de error apropiado.



      "creation_time"
      integer
      Hora de creación de la firma en segundos desde el 1 de enero de 1970 UTC.



      "expiration_time"
      integer
      El tiempo de expiración de la firma en segundos desde el tiempo de creación o 0 si la firma no expira nunca.



      "hash"
      string
      Algoritmo de hash utilizado para calcular la firma.



      "signing_key"
      string
      La huella de la clave utilizada para firmar. Puede ser "Not found" si la clave pública correspondiente no está cargada en el objeto FFI.



      "signature_type"
      string

      El tipo de firma. Los valores actualmente definidos son "binary", "text", "standalone", "certification (generic)", "certification (persona)",
      "certification (casual)", "certification (positive)", "subkey binding", "primary key binding", "direct", "key revocation",
      "subkey revocation", "certification revocation", "timestamp", "uknown: 0..255".



# rnp_op_verify_detached

(PECL rnp &gt;= 0.1.1)

rnp_op_verify_detached — Verifica las firmas desvinculadas

### Descripción

**rnp_op_verify_detached**([RnpFFI](#class.rnpffi) $ffi, [string](#language.types.string) $data, [string](#language.types.string) $signature): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    data


      Los datos fuente.






    signature


      Los datos de firma desvinculada.


### Valores devueltos

Un array asociativo con información sobre los resultados de la verificación o **[false](#constant.false)** si ocurre un error.

      Key
      Tipo de datos
      Descripción






      "verification_status"
      string

       Los resultados de la verificación global, ya sea la cadena "Success" o un mensaje de error apropiado.
       El resultado "Success" se define cuando al menos una firma es válida y verificada con éxito.
       Los resultados de verificación individuales para cada firma pueden ser verificados en el array "signatures".




      "file_name"
      string
      Nombre del fichero.



      "file_mtime"
      integer
      Hora de modificación del fichero.



      "mode"
      string
      Modo de protección de los datos (cifrado) utilizado en el mensaje procesado.
      Los valores actualmente definidos son "none", "cfb", "cfb-mdc", "aead-ocb", "aead-eax".




      "cipher"
      string
      Algoritmo de cifrado simétrico utilizado para el cifrado de los datos.



      "valid_integrity"
      boolean
      **[true](#constant.true)** si la protección de la integridad del mensaje ha sido utilizada (es decir, MDC o AEAD) y ha sido
      validada con éxito.




      "signatures"
      array

       Un array asociativo que describe cada firma encontrada. Ver la descripción a continuación.



Un subarray "signatures".

     Key
     Tipo de datos
     Descripción






    "verification_status"
    string
    Estado de verificación de la firma, ya sea la cadena "Success" o un mensaje de error apropiado.



    "creation_time"
    integer
    Hora de creación de la firma en segundos desde el 1 de enero de 1970 UTC.



    "expiration_time"
    integer
    Tiempo de expiración de la firma en segundos desde la hora de creación o 0 si la firma no expira nunca.



    "hash"
    string
    Algoritmo de hash utilizado para calcular la firma.



    "signing_key"
    string
    La huella de la clave utilizada para firmar. Puede ser "Not found" si la clave pública correspondiente no está cargada en el objeto FFI.



    "signature_type"
    string

     El tipo de firma. Los valores actualmente definidos son "binary", "text", "standalone", "certification (generic)", "certification (persona)",
     "certification (casual)", "certification (positive)", "subkey binding", "primary key binding", "direct", "key revocation",
     "subkey revocation", "certification revocation", "timestamp", "unknown: 0..255".

# rnp_save_keys

(PECL rnp &gt;= 0.1.1)

rnp_save_keys — Guarda las claves en una string PHP

### Descripción

**rnp_save_keys**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $format,
    [string](#language.types.string) &amp;$output,
    [int](#language.types.integer) $flags
): [bool](#language.types.boolean)

Se debe tener en cuenta que para G10, la salida debe ser un directorio (que ya debe existir).

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    format


      El formato de clave para los datos (GPG, KBX, G10).






    output


      Los paquetes de claves se guardarán en la string referenciada por output.






    flags


      Ver la descripción de los flags **

RNP*LOAD_SAVE*\*\*\*.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_save_keys_to_path

(PECL rnp &gt;= 0.1.1)

rnp_save_keys_to_path — Guarda las claves en la ruta especificada

### Descripción

**rnp_save_keys_to_path**(
    [RnpFFI](#class.rnpffi) $ffi,
    [string](#language.types.string) $format,
    [string](#language.types.string) $output_path,
    [int](#language.types.integer) $flags
): [bool](#language.types.boolean)

Guarda las claves presentes en el objeto FFI (cargadas o generadas) en el fichero o directorio especificado.

### Parámetros

    ffi


      El objeto FFI retornado por [rnp_ffi_create()](#function.rnp-ffi-create).






    format


      El formato de clave para los datos (GPG, KBX, G10).






    output_path


      La ruta del fichero o directorio donde las claves deben ser guardadas.






    flags


      Ver la descripción de los flags **

RNP*LOAD_SAVE*\*\*\*.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rnp_supported_features

(PECL rnp &gt;= 0.1.1)

rnp_supported_features — Devuelve las funcionalidades soportadas en formato JSON

### Descripción

**rnp_supported_features**([string](#language.types.string) $type): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el formato JSON que contiene un array de los valores de funcionalidades rnp soportadas (algoritmos, curvas, etc.) por tipo.

### Parámetros

    type


      Ver las constantes RNP_FEATURE_* para los valores soportados.


### Valores devueltos

Un string que contiene un array formateado en JSON de los algoritmos, curvas, etc. soportados o **[false](#constant.false)** si ocurre un error.

# rnp_version_string

(PECL rnp &gt;= 0.1.1)

rnp_version_string — La versión de la biblioteca RNP

### Descripción

**rnp_version_string**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el string de versión de la biblioteca RNP.

# rnp_version_string_full

(PECL rnp &gt;= 0.1.1)

rnp_version_string_full — La cadena de versión completa de la biblioteca RNP

### Descripción

**rnp_version_string_full**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cadena de versión completa de la biblioteca RNP.

## Tabla de contenidos

- [rnp_backend_string](#function.rnp-backend-string) — Devuelve el nombre de la biblioteca back-end de criptografía
- [rnp_backend_version](#function.rnp-backend-version) — Devuelve la versión de la biblioteca back-end de criptografía
- [rnp_decrypt](#function.rnp-decrypt) — Desencripta un mensaje PGP
- [rnp_dump_packets](#function.rnp-dump-packets) — Muestra la información del flujo de paquetes OpenPGP en un formato legible por el ser humano
- [rnp_dump_packets_to_json](#function.rnp-dump-packets-to-json) — Muestra la información del flujo de paquetes OpenPGP en un string JSON
- [rnp_ffi_create](#function.rnp-ffi-create) — Crear un objeto de nivel superior utilizado para interactuar con la biblioteca
- [rnp_ffi_destroy](#function.rnp-ffi-destroy) — Destruye el objeto de nivel superior utilizado para interactuar con la biblioteca
- [rnp_ffi_set_pass_provider](#function.rnp-ffi-set-pass-provider) — Define la función de retrollamada del proveedor de contraseña
- [rnp_import_keys](#function.rnp-import-keys) — Importa claves desde una string PHP hacia el llavero de claves y devuelve un JSON describiendo las claves nuevas o actualizadas
- [rnp_import_signatures](#function.rnp-import-signatures) — Importa firmas autónomas en el llavero de claves y devuelve un JSON que describe las claves actualizadas
- [rnp_key_export](#function.rnp-key-export) — Exporta una clave
- [rnp_key_export_autocrypt](#function.rnp-key-export-autocrypt) — Exporta la clave mínima para la funcionalidad autocrypt (solo 5 paquetes: clave, uid, firma,
  subclave de cifrado, firma)
- [rnp_key_export_revocation](#function.rnp-key-export-revocation) — Genera y exporta una firma de revocación de clave primaria
- [rnp_key_get_info](#function.rnp-key-get-info) — Devuelve información sobre la clave
- [rnp_key_remove](#function.rnp-key-remove) — Elimina una clave de los llaveros
- [rnp_key_revoke](#function.rnp-key-revoke) — Elimina una clave o una subclave generando y añadiendo una firma de revocación
- [rnp_list_keys](#function.rnp-list-keys) — Enumera todas las claves presentes en un llavero de claves por tipo de identificador especificado
- [rnp_load_keys](#function.rnp-load-keys) — Carga las claves a partir de un string PHP
- [rnp_load_keys_from_path](#function.rnp-load-keys-from-path) — Carga claves a partir de la ruta especificada
- [rnp_locate_key](#function.rnp-locate-key) — Búsqueda de la clave
- [rnp_op_encrypt](#function.rnp-op-encrypt) — Cifra un mensaje
- [rnp_op_generate_key](#function.rnp-op-generate-key) — Genera una clave
- [rnp_op_sign](#function.rnp-op-sign) — Realiza una operación de firma sobre datos binarios, devuelve la o las firmas integradas
- [rnp_op_sign_cleartext](#function.rnp-op-sign-cleartext) — Realiza una operación de firma sobre datos textuales, devuelve el mensaje firmado en claro
- [rnp_op_sign_detached](#function.rnp-op-sign-detached) — Realiza una operación de firma, devuelve la firma desvinculada
- [rnp_op_verify](#function.rnp-op-verify) — Verifica las firmas integradas o en claro
- [rnp_op_verify_detached](#function.rnp-op-verify-detached) — Verifica las firmas desvinculadas
- [rnp_save_keys](#function.rnp-save-keys) — Guarda las claves en una string PHP
- [rnp_save_keys_to_path](#function.rnp-save-keys-to-path) — Guarda las claves en la ruta especificada
- [rnp_supported_features](#function.rnp-supported-features) — Devuelve las funcionalidades soportadas en formato JSON
- [rnp_version_string](#function.rnp-version-string) — La versión de la biblioteca RNP
- [rnp_version_string_full](#function.rnp-version-string-full) — La cadena de versión completa de la biblioteca RNP

# La clase RnpFFI

(PECL rnp &gt;= 0.1.1)

## Introducción

## Sinopsis de la Clase

    ****




      class **RnpFFI**

     {

}

- [Introducción](#intro.rnp)
- [Instalación/Configuración](#rnp.setup)<li>[Requerimientos](#rnp.requirements)
- [Instalación](#rnp.installation)
  </li>- [Constantes predefinidas](#rnp.constants)
- [Ejemplos](#rnp.examples)<li>[Texto firmado en claro](#rnp.examples-clearsign)
  </li>- [Funciones de Rnp](#ref.rnp)<li>[rnp_backend_string](#function.rnp-backend-string) — Devuelve el nombre de la biblioteca back-end de criptografía
- [rnp_backend_version](#function.rnp-backend-version) — Devuelve la versión de la biblioteca back-end de criptografía
- [rnp_decrypt](#function.rnp-decrypt) — Desencripta un mensaje PGP
- [rnp_dump_packets](#function.rnp-dump-packets) — Muestra la información del flujo de paquetes OpenPGP en un formato legible por el ser humano
- [rnp_dump_packets_to_json](#function.rnp-dump-packets-to-json) — Muestra la información del flujo de paquetes OpenPGP en un string JSON
- [rnp_ffi_create](#function.rnp-ffi-create) — Crear un objeto de nivel superior utilizado para interactuar con la biblioteca
- [rnp_ffi_destroy](#function.rnp-ffi-destroy) — Destruye el objeto de nivel superior utilizado para interactuar con la biblioteca
- [rnp_ffi_set_pass_provider](#function.rnp-ffi-set-pass-provider) — Define la función de retrollamada del proveedor de contraseña
- [rnp_import_keys](#function.rnp-import-keys) — Importa claves desde una string PHP hacia el llavero de claves y devuelve un JSON describiendo las claves nuevas o actualizadas
- [rnp_import_signatures](#function.rnp-import-signatures) — Importa firmas autónomas en el llavero de claves y devuelve un JSON que describe las claves actualizadas
- [rnp_key_export](#function.rnp-key-export) — Exporta una clave
- [rnp_key_export_autocrypt](#function.rnp-key-export-autocrypt) — Exporta la clave mínima para la funcionalidad autocrypt (solo 5 paquetes: clave, uid, firma,
  subclave de cifrado, firma)
- [rnp_key_export_revocation](#function.rnp-key-export-revocation) — Genera y exporta una firma de revocación de clave primaria
- [rnp_key_get_info](#function.rnp-key-get-info) — Devuelve información sobre la clave
- [rnp_key_remove](#function.rnp-key-remove) — Elimina una clave de los llaveros
- [rnp_key_revoke](#function.rnp-key-revoke) — Elimina una clave o una subclave generando y añadiendo una firma de revocación
- [rnp_list_keys](#function.rnp-list-keys) — Enumera todas las claves presentes en un llavero de claves por tipo de identificador especificado
- [rnp_load_keys](#function.rnp-load-keys) — Carga las claves a partir de un string PHP
- [rnp_load_keys_from_path](#function.rnp-load-keys-from-path) — Carga claves a partir de la ruta especificada
- [rnp_locate_key](#function.rnp-locate-key) — Búsqueda de la clave
- [rnp_op_encrypt](#function.rnp-op-encrypt) — Cifra un mensaje
- [rnp_op_generate_key](#function.rnp-op-generate-key) — Genera una clave
- [rnp_op_sign](#function.rnp-op-sign) — Realiza una operación de firma sobre datos binarios, devuelve la o las firmas integradas
- [rnp_op_sign_cleartext](#function.rnp-op-sign-cleartext) — Realiza una operación de firma sobre datos textuales, devuelve el mensaje firmado en claro
- [rnp_op_sign_detached](#function.rnp-op-sign-detached) — Realiza una operación de firma, devuelve la firma desvinculada
- [rnp_op_verify](#function.rnp-op-verify) — Verifica las firmas integradas o en claro
- [rnp_op_verify_detached](#function.rnp-op-verify-detached) — Verifica las firmas desvinculadas
- [rnp_save_keys](#function.rnp-save-keys) — Guarda las claves en una string PHP
- [rnp_save_keys_to_path](#function.rnp-save-keys-to-path) — Guarda las claves en la ruta especificada
- [rnp_supported_features](#function.rnp-supported-features) — Devuelve las funcionalidades soportadas en formato JSON
- [rnp_version_string](#function.rnp-version-string) — La versión de la biblioteca RNP
- [rnp_version_string_full](#function.rnp-version-string-full) — La cadena de versión completa de la biblioteca RNP
  </li>- [RnpFFI](#class.rnpffi) — La clase RnpFFI
