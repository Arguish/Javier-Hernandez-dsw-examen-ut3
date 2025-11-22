# GNU PG

# Introducción

Este módulo permite interactuar con
[» gnupg](http://www.gnupg.org/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#gnupg.requirements)
- [Instalación](#gnupg.installation)

    ## Requerimientos

    Esta extensión requiere la [» biblioteca gpgme](http://www.gnupg.org/related_software/gpgme/).

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/gnupg](https://pecl.php.net/package/gnupg).

# Constantes predefinidas

    **[GNUPG_SIG_MODE_NORMAL](#constant.gnupg-sig-mode-normal)**
    ([int](#language.types.integer))









    **[GNUPG_SIG_MODE_DETACH](#constant.gnupg-sig-mode-detach)**
    ([int](#language.types.integer))









    **[GNUPG_SIG_MODE_CLEAR](#constant.gnupg-sig-mode-clear)**
    ([int](#language.types.integer))









    **[GNUPG_VALIDITY_UNKNOWN](#constant.gnupg-validity-unknown)**
    ([int](#language.types.integer))









    **[GNUPG_VALIDITY_UNDEFINED](#constant.gnupg-validity-undefined)**
    ([int](#language.types.integer))









    **[GNUPG_VALIDITY_NEVER](#constant.gnupg-validity-never)**
    ([int](#language.types.integer))









    **[GNUPG_VALIDITY_MARGINAL](#constant.gnupg-validity-marginal)**
    ([int](#language.types.integer))









    **[GNUPG_VALIDITY_FULL](#constant.gnupg-validity-full)**
    ([int](#language.types.integer))









    **[GNUPG_VALIDITY_ULTIMATE](#constant.gnupg-validity-ultimate)**
    ([int](#language.types.integer))









    **[GNUPG_PROTOCOL_OpenPGP](#constant.gnupg-protocol-openpgp)**
    ([int](#language.types.integer))









    **[GNUPG_PROTOCOL_CMS](#constant.gnupg-protocol-cms)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_VALID](#constant.gnupg-sigsum-valid)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_GREEN](#constant.gnupg-sigsum-green)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_RED](#constant.gnupg-sigsum-red)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_KEY_REVOKED](#constant.gnupg-sigsum-key-revoked)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_KEY_EXPIRED](#constant.gnupg-sigsum-key-expired)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_KEY_MISSING](#constant.gnupg-sigsum-key-missing)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_SIG_EXPIRED](#constant.gnupg-sigsum-sig-expired)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_CRL_MISSING](#constant.gnupg-sigsum-crl-missing)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_CRL_TOO_OLD](#constant.gnupg-sigsum-crl-too-old)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_BAD_POLICY](#constant.gnupg-sigsum-bad-policy)**
    ([int](#language.types.integer))









    **[GNUPG_SIGSUM_SYS_ERROR](#constant.gnupg-sigsum-sys-error)**
    ([int](#language.types.integer))









    **[GNUPG_ERROR_WARNING](#constant.gnupg-error-warning)**
    ([int](#language.types.integer))









    **[GNUPG_ERROR_EXCEPTION](#constant.gnupg-error-exception)**
    ([int](#language.types.integer))









    **[GNUPG_ERROR_SILENT](#constant.gnupg-error-silent)**
    ([int](#language.types.integer))

# Ejemplos

## Tabla de contenidos

- [Firma de texto (clearsign)](#gnupg.examples-clearsign)

    ## Firma de texto (clearsign)

    Ejemplo que firma un texto dado.

    **Ejemplo #1 Ejemplo de firma (clearsign) gnupg mediante funciones**

&lt;?php
// Inicializamos gnupg
$res = gnupg_init();
// Esto realmente no es necesario, clearsign es el valor por defecto
gnupg_setsignmode($res,GNUPG_SIG_MODE_CLEAR);
// Añade clave con la contraseña 'test' para firmar
gnupg_addsignkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
// Firma
$signed = gnupg_sign($res,"just a test");
echo $signed;
?&gt;

**Ejemplo #2 Ejemplo de firma gnupg (clearsign) mediante orientación a objetos**

&lt;?php
// Instanciamos la clase
$gnupg = new gnupg();
// Esto realmente no es necesario, clearsign es el valor por defecto
$gnupg-&gt;setsignmode(gnupg::SIG_MODE_CLEAR);
// Añade clave con la contraseña 'test' para firmar
$gnupg-&gt;addsignkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
// Firma
$signed = $gnupg-&gt;sign("just a test");
echo $signed;
?&gt;

**Ejemplo #3 keylistiterator**

    Esta extensión trae también un Iterator para un juego de claves

&lt;?php
// Crea un nuevo Iterator para listar todas las claves públicas que coinciden
// con 'example'
$iterator = new gnupg_keylistiterator("example");
foreach($iterator as $fingerprint =&gt; $userid){
    echo $fingerprint." -&gt; ".$userid."\n";
}
?&gt;

# Funciones GnuPG

# Notas

    Esta extensión utiliza el trousseau del usuario actual. Este trousseau se
    encuentra normalmente en ~./.gnupg/.
    Para especificar una ubicación diferente, registrar la ruta del trousseau en la variable de entorno GNUPGHOME. Ver
    [putenv](#function.putenv) para más información sobre cómo realizar esto.




    Algunas funciones requieren la especificación de una clave. Esta especificación puede ser algo que haga referencia a una clave única (userid, key-id, fingerprint, ...).
    Esta documentación utiliza los fingerprint en todos los ejemplos.

**Nota**:

     Como alternativa a las funciones que utilizan explícitamente los
     [resource](#language.types.resource), también puede utilizarse un estilo orientado a objetos mediante objetos **GnuPG**.

# gnupg_adddecryptkey

(PECL gnupg &gt;= 0.5)

gnupg_adddecryptkey — Añade una clave para descifrado

### Descripción

**gnupg_adddecryptkey**([resource](#language.types.resource) $identifier, [string](#language.types.string) $fingerprint, [string](#language.types.string) $passphrase): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     fingerprint

      La huella de la clave.





     passphrase


       La frase de contraseña (similar a la contraseña, pero más larga).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_adddecryptkey()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_adddecryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_adddecryptkey()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;adddecryptkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
?&gt;

# gnupg_addencryptkey

(PECL gnupg &gt;= 0.5)

gnupg_addencryptkey — Añade una clave para cifrado

### Descripción

**gnupg_addencryptkey**([resource](#language.types.resource) $identifier, [string](#language.types.string) $fingerprint): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     fingerprint

      La huella de la clave.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_addencryptkey()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_addencryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC");
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_addencryptkey()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;addencryptkey("8660281B6051D071D94B5B230549F9DC851566DC");
?&gt;

# gnupg_addsignkey

(PECL gnupg &gt;= 0.5)

gnupg_addsignkey — Añade una clave para firmar

### Descripción

**gnupg_addsignkey**([resource](#language.types.resource) $identifier, [string](#language.types.string) $fingerprint, [string](#language.types.string) $passphrase = ?): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     fingerprint

      La huella de la clave.





     passphrase


       La frase de contraseña (similar a la contraseña, pero más larga).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_addsignkey()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_addsignkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_addsignkey()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;addsignkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
?&gt;

# gnupg_cleardecryptkeys

(PECL gnupg &gt;= 0.5)

gnupg_cleardecryptkeys — Elimina todas las claves que fueron fijadas para el descifrado anteriormente

### Descripción

**gnupg_cleardecryptkeys**([resource](#language.types.resource) $identifier): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_cleardecryptkeys()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_cleardecryptkeys($res);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_cleardecryptkeys()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;cleardecryptkeys();
?&gt;

# gnupg_clearencryptkeys

(PECL gnupg &gt;= 0.5)

gnupg_clearencryptkeys — Elimina todas las claves que fueron establecidas para cifrado con anterioridad

### Descripción

**gnupg_clearencryptkeys**([resource](#language.types.resource) $identifier): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_clearencryptkeys()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_clearencryptkeys($res);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_clearencryptkeys()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;clearencryptkeys();
?&gt;

# gnupg_clearsignkeys

(PECL gnupg &gt;= 0.5)

gnupg_clearsignkeys — Elimina todas las claves que fueron fijadas para firma previamente

### Descripción

**gnupg_clearsignkeys**([resource](#language.types.resource) $identifier): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_clearsignkeys()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_clearsignkeys($res);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_clearsignkeys()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;clearsignkeys();
?&gt;

# gnupg_decrypt

(PECL gnupg &gt;= 0.1)

gnupg_decrypt — Descifra un texto dado

### Descripción

**gnupg_decrypt**([resource](#language.types.resource) $identifier, [string](#language.types.string) $text): [string](#language.types.string)|[false](#language.types.singleton)

Descifra un texto dado con las claves que se han establecido con [gnupg_adddecryptkey](#function.gnupg-adddecryptkey)
previamente.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     text


       El texto a descifrar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_decrypt()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_adddecryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
$plain = gnupg_decrypt($res,$encrypted_text);
echo $plain;
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_decrypt()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;adddecryptkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
$plain = $gpg-&gt;decrypt($encrypted_text);
echo $plain;
?&gt;

# gnupg_decryptverify

(PECL gnupg &gt;= 0.2)

gnupg_decryptverify — Descifra y verifica un texto dado

### Descripción

**gnupg_decryptverify**([resource](#language.types.resource) $identifier, [string](#language.types.string) $text, [string](#language.types.string) &amp;$plaintext): [array](#language.types.array)|[false](#language.types.singleton)

Descifra y verifica un texto dado y devuelve las informaciones sobre
la firma.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     text


       El texto a descifrar.






     plaintext


       El argumento plaintext se rellena con el texto
       descifrado.





### Valores devueltos

En caso de éxito, esta función devuelve las informaciones sobre la
firma y rellena el argumento plaintext con el
texto descifrado. En caso de fallo, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_decryptverify()** (Estilo procedimental)

&lt;?php
$plaintext = "";
$res = gnupg_init();
gnupg_adddecryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
$info = gnupg_decryptverify($res,$text,$plaintext);
print_r($info);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_decryptverify()** (Estilo orientado a objetos)

&lt;?php
$plaintext = "";
$gpg = new gnupg();
$gpg-&gt;adddecryptkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
$info = $gpg-&gt;decryptverify($text,$plaintext);
print_r($info);
?&gt;

# gnupg_deletekey

(PECL gnupg &gt;= 0.5)

gnupg_deletekey — Elimina una clave del llavero

### Descripción

**gnupg_deletekey**([resource](#language.types.resource) $identifier, [string](#language.types.string) $key, [bool](#language.types.boolean) $allow_secret): [bool](#language.types.boolean)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     key


       La clave a eliminar.






     allow_secret


       Especifica si se deben eliminar las claves secretas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo procedimental gnupg_deletekey()**

&lt;?php
$res = gnupg_init();
gnupg_deletekey($res, "8660281B6051D071D94B5B230549F9DC851566DC");
?&gt;

    **Ejemplo #2 Ejemplo orientado a objetos gnupg_deletekey()**

&lt;?php
$gpg = new gnupg();
$gpg-&gt;deletekey("8660281B6051D071D94B5B230549F9DC851566DC");
?&gt;

# gnupg_encrypt

(PECL gnupg &gt;= 0.1)

gnupg_encrypt — Cifra un texto dado

### Descripción

**gnupg_encrypt**([resource](#language.types.resource) $identifier, [string](#language.types.string) $plaintext): [string](#language.types.string)|[false](#language.types.singleton)

Cifra el argumento plaintext con las claves que han
sido establecidas con [gnupg_addencryptkey](#function.gnupg-addencryptkey)
previamente y devuelve el texto cifrado.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     plaintext


       El texto a cifrar.





### Valores devueltos

En caso de éxito, esta función devuelve el texto cifrado.
En caso de error, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_encrypt()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_addencryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC");
$enc = gnupg_encrypt($res, "juste un test");
echo $enc;
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_encrypt()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;addencryptkey("8660281B6051D071D94B5B230549F9DC851566DC");
$enc = $gpg-&gt;encrypt("juste un test");
echo $enc;
?&gt;

# gnupg_encryptsign

(PECL gnupg &gt;= 0.2)

gnupg_encryptsign — Cifra y firma un texto dado

### Descripción

**gnupg_encryptsign**([resource](#language.types.resource) $identifier, [string](#language.types.string) $plaintext): [string](#language.types.string)|[false](#language.types.singleton)

Cifra y firma el parámetro plaintext con las
claves que han sido establecidas con
[gnupg_addsignkey](#function.gnupg-addsignkey) y [gnupg_addencryptkey](#function.gnupg-addencryptkey)
previamente y devuelve el texto cifrado y firmado.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     plaintext


       El texto a cifrar.





### Valores devueltos

En caso de éxito, esta función devuelve el texto firmado y cifrado.
En caso de fallo, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_encryptsign()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_addencryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC");
gnupg_addsignkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
$enc = gnupg_encryptsign($res, "juste un test");
echo $enc;
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_encryptsign()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;addencryptkey("8660281B6051D071D94B5B230549F9DC851566DC");
$gpg-&gt;addsignkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
$enc = $gpg-&gt;encryptsign("juste un test");
echo $enc;
?&gt;

# gnupg_export

(PECL gnupg &gt;= 0.1)

gnupg_export — Exporta una clave

### Descripción

**gnupg_export**([resource](#language.types.resource) $identifier, [string](#language.types.string) $fingerprint): [string](#language.types.string)|[false](#language.types.singleton)

Exporta la clave fingerprint.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     fingerprint

      La huella de la clave.




### Valores devueltos

En caso de éxito, esta función devuelve los datos de la clave.
En caso de fallo, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_export()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
$export = gnupg_export($res,"8660281B6051D071D94B5B230549F9DC851566DC");
echo $export;
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_export()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$export = $gpg-&gt;export("8660281B6051D071D94B5B230549F9DC851566DC");
?&gt;

# gnupg_getengineinfo

(PECL gnupg &gt;= 1.5)

gnupg_getengineinfo — Devuelve la información del motor

### Descripción

**gnupg_getengineinfo**([resource](#language.types.resource) $identifier): [array](#language.types.array)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Devuelve un array que contiene la información del motor compuesto por protocol,
file_name y home_dir.

### Ejemplos

    **Ejemplo #1 Ejemplo procedimental gnupg_getengineinfo()**

&lt;?php
$res = gnupg_init();
print_r(gnupg_getengineinfo($res));
?&gt;

    El ejemplo anterior mostrará:

array(3) {
["protocol"]=&gt;
int(0)
["file_name"]=&gt;
string(12) "/usr/bin/gpg"
["home_dir"]=&gt;
string(0) ""
}

    **Ejemplo #2 Ejemplo orientado a objetos gnupg_getengineinfo()**

&lt;?php
$gpg = new gnupg(["file_name" =&gt; "/usr/bin/gpg2", "home_dir" =&gt; "/var/www/.gnupg"]);
print_r($gpg-&gt;getengineinfo());
?&gt;

    El ejemplo anterior mostrará:

array(3) {
["protocol"]=&gt;
int(0)
["file_name"]=&gt;
string(13) "/usr/bin/gpg2"
["home_dir"]=&gt;
string(15) "/var/www/.gnupg"
}

# gnupg_geterror

(PECL gnupg &gt;= 0.1)

gnupg_geterror — Devuelve el texto de error, si una función falla

### Descripción

**gnupg_geterror**([resource](#language.types.resource) $identifier): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Devuelve el texto de error si se ha producido un error, en caso contrario devuelve
**[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_geterror()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
echo gnupg_geterror($res);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_geterror()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
echo $gpg-&gt;geterror();
?&gt;

# gnupg_geterrorinfo

(PECL gnupg &gt;= 1.5)

gnupg_geterrorinfo — Devuelve la información de error

### Descripción

**gnupg_geterrorinfo**([resource](#language.types.resource) $identifier): [array](#language.types.array)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Devuelve un array con la información de error.

### Ejemplos

    **Ejemplo #1 Ejemplo procedimental gnupg_geterrorinfo()**

&lt;?php
$res = gnupg_init();
// esto es llamado sin error
print_r(gnupg_geterrorinfo($res));
?&gt;

    El ejemplo anterior mostrará:

array(4) {
["generic_message"]=&gt;
bool(false)
["gpgme_code"]=&gt;
int(0)
["gpgme_source"]=&gt;
string(18) "Unspecified source"
["gpgme_message"]=&gt;
string(7) "Success"
}

    **Ejemplo #2 Ejemplo orientado a objetos gnupg_geterrorinfo()**

&lt;?php
$gpg = new gnupg();
// llamada con error
$gpg-&gt;decrypt('abc');
// la información de error debe ser mostrada
print_r($gpg-&gt;geterrorinfo());
?&gt;

    El ejemplo anterior mostrará:

array(4) {
["generic_message"]=&gt;
string(14) "decrypt failed"
["gpgme_code"]=&gt;
int(117440570)
["gpgme_source"]=&gt;
string(5) "GPGME"
["gpgme_message"]=&gt;
string(7) "No data"
}

# gnupg_getprotocol

(PECL gnupg &gt;= 0.1)

gnupg_getprotocol — Devuelve el protocolo activo actual para todas las operaciones

### Descripción

**gnupg_getprotocol**([resource](#language.types.resource) $identifier): [int](#language.types.integer)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

### Valores devueltos

Devuelve el protocolo activo actual, que puede ser uno de estos:
**[GNUPG_PROTOCOL_OpenPGP](#constant.gnupg-protocol-openpgp)** o
**[GNUPG_PROTOCOL_CMS](#constant.gnupg-protocol-cms)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_getprotocol()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
echo gnupg_getprotocol($res);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_getprotocol()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
echo $gpg-&gt;getprotocol();
?&gt;

# gnupg_gettrustlist

(PECL gnupg &gt;= 0.5)

gnupg_gettrustlist — Busca los elementos de confianza

### Descripción

**gnupg_gettrustlist**([resource](#language.types.resource) $identifier, [string](#language.types.string) $pattern): [?](#language.types.null)[array](#language.types.array)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     pattern


       Una expresión para limitar la lista de elementos de confianza a los elementos que coinciden con el patrón.





### Valores devueltos

En caso de éxito, esta función devuelve un array de elementos de confianza.
En caso de error, esta función devuelve **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Ejemplo procedimental gnupg_gettrustlist()**

&lt;?php
$res = gnupg_init();
$items = gnupg_gettrustlist($res);
print_r($items);
?&gt;

    **Ejemplo #2 Ejemplo orientado a objetos gnupg_gettrustlist()**

&lt;?php
$gpg = new gnupg();
$items = $gpg-&gt;gettrustlist();
print_r($items);
?&gt;

# gnupg_import

(PECL gnupg &gt;= 0.3)

gnupg_import — Importa una clave

### Descripción

**gnupg_import**([resource](#language.types.resource) $identifier, [string](#language.types.string) $keydata): [array](#language.types.array)|[false](#language.types.singleton)

Importa la clave keydata y devuelve un array con
la información sobre el proceso de importación.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     keydata


       La clave a importar.





### Valores devueltos

En caso de éxito, esta función devuelve un array de información sobre
el proceso de importación.
En caso de fallo, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_import()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
$info = gnupg_import($res,$keydata);
print_r($info);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_import()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$info = $gpg-&gt;import($keydata);
print_r($info);
?&gt;

# gnupg_init

(PECL gnupg &gt;= 0.4)

gnupg_init — Inicializa una conexión

### Descripción

**gnupg_init**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [resource](#language.types.resource)

### Parámetros

     options


       Debe ser un array asociativo. Se utiliza para modificar la configuración
       por omisión del motor criptográfico.



        <caption>**Sustitución de la configuración**</caption>



           Clave
           Tipo
           Descripción






           file_name
           [string](#language.types.string)

            Es el nombre de fichero del programa ejecutable que implementa
            este protocolo, que generalmente es la ruta del ejecutable gpg.




           home_dir
           [string](#language.types.string)

            Es el nombre del directorio de configuración.
            También sustituye a la variable de entorno GNUPGHOME
            que se utiliza con el mismo propósito.










### Valores devueltos

Un recurso de conexión GnuPG, utilizado por otras funciones GnuPG.

### Historial de cambios

      Versión
      Descripción






      PECL gnupg 1.5.0

       Se ha añadido el argumento options.



### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_init()** con configuración por omisión (Estilo procedimental)

&lt;?php
$res = gnupg_init();
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_init()** con nombre de fichero y directorio de origen sobrescritos (Estilo procedimental)

&lt;?php
$res = gnupg_init(["file_name" =&gt; "/usr/bin/gpg2", "home_dir" =&gt; "/var/www/.gnupg"]);
?&gt;

    **Ejemplo #3 Ejemplo con gnupg_init()** con configuración por omisión (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
?&gt;

    **Ejemplo #4 Ejemplo con gnupg_init()** con nombre de fichero y directorio de origen sobrescritos (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg(["file_name" =&gt; "/usr/bin/gpg2", "home_dir" =&gt; "/var/www/.gnupg"]);
?&gt;

# gnupg_keyinfo

(PECL gnupg &gt;= 0.1)

gnupg_keyinfo — Retorna un array con las informaciones acerca de todas las
claves que coinciden con el patrón dado

### Descripción

**gnupg_keyinfo**([resource](#language.types.resource) $identifier, [string](#language.types.string) $pattern): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     pattern


       La máscara a utilizar sobre las claves.





### Valores devueltos

Retorna un array con las informaciones acerca de todas las claves que
coinciden con el patrón dado o retorna **[false](#constant.false)** si ha ocurrido un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_keyinfo()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
$info = gnupg_keyinfo($res, 'test');
print_r($info);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_keyinfo()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$info = $gpg-&gt;keyinfo("test");
print_r($info);
?&gt;

# gnupg_listsignatures

(PECL gnupg &gt;= 0.5)

gnupg_listsignatures — Lista las firmas de clave

### Descripción

**gnupg_listsignatures**([resource](#language.types.resource) $identifier, [string](#language.types.string) $keyid): [?](#language.types.null)[array](#language.types.array)

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     keyid


       El identificador de clave para listar las firmas.





### Valores devueltos

En caso de éxito, esta función devuelve un array de firmas de clave.
En caso de error, esta función devuelve **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Ejemplo procedimental gnupg_listsignatures()**

&lt;?php
$res = gnupg_init();
$signatures = gnupg_listsignatures($res, "8660281B6051D071D94B5B230549F9DC851566DC");
print_r($signatures);
?&gt;

    **Ejemplo #2 Ejemplo orientado a objetos gnupg_listsignatures()**

&lt;?php
$gpg = new gnupg();
$signatures = $gpg-&gt;listsignatures("8660281B6051D071D94B5B230549F9DC851566DC");
print_r($signatures);
?&gt;

# gnupg_setarmor

(PECL gnupg &gt;= 0.1)

gnupg_setarmor — Cambia la salida blindada

### Descripción

**gnupg_setarmor**([resource](#language.types.resource) $identifier, [int](#language.types.integer) $armor): [bool](#language.types.boolean)

Cambia la salida blindada.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     armor


       Pase un valor entero diferente de cero a esta función para activar
       la salida blindada (valor por omisión).
       Pase 0 para desactivar la salida blindada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_setarmor()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_setarmor($res,1); // Activa la salida blindada;
gnupg_setarmor($res,0); // Desactiva la salida blindada;
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_setarmor()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;setarmor(1); // Activa la salida blindada;
$gpg-&gt;setarmor(0); // Desactiva la salida blindada;
?&gt;

# gnupg_seterrormode

(PECL gnupg &gt;= 0.6)

gnupg_seterrormode — Establece el modo para error_reporting

### Descripción

**gnupg_seterrormode**([resource](#language.types.resource) $identifier, [int](#language.types.integer) $errormode): [void](language.types.void.html)

Establece el modo para [error_reporting](#ini.error-reporting).

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     errormode


       El modo de error.




       errormode acepta una constante que indica qué tipo de
       error_reporting debe ser utilizado. Los valores posibles son
       **[GNUPG_ERROR_WARNING](#constant.gnupg-error-warning)**,
       **[GNUPG_ERROR_EXCEPTION](#constant.gnupg-error-exception)** y
       **[GNUPG_ERROR_SILENT](#constant.gnupg-error-silent)**.
       Por omisión **[GNUPG_ERROR_SILENT](#constant.gnupg-error-silent)**.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_seterrormode()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_seterrormode($res, GNUPG_ERROR_WARNING); // emite un PHP-Warning en caso de error
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_seterrormode()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;seterrormode(gnupg::ERROR_EXCEPTION); // lanza una excepción en caso de error
?&gt;

# gnupg_setsignmode

(PECL gnupg &gt;= 0.1)

gnupg_setsignmode — Establece el modo para firmar

### Descripción

**gnupg_setsignmode**([resource](#language.types.resource) $identifier, [int](#language.types.integer) $signmode): [bool](#language.types.boolean)

Establece el modo para firmar.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     sigmode


       El modo de firma.




       signmode acepta una constante que indica qué tipo de
       firma debe ser producida. Los valores posibles son:
       **[GNUPG_SIG_MODE_NORMAL](#constant.gnupg-sig-mode-normal)**,
       **[GNUPG_SIG_MODE_DETACH](#constant.gnupg-sig-mode-detach)** y
       **[GNUPG_SIG_MODE_CLEAR](#constant.gnupg-sig-mode-clear)**.
       Por omisión, se utiliza **[GNUPG_SIG_MODE_CLEAR](#constant.gnupg-sig-mode-clear)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_setsignmode()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_setsignmode($res, GNUPG_SIG_MODE_DETACH); // produce una firma desvinculada
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_setsignmode()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;setsignmode(gnupg::SIG_MODE_DETACH); // produce una firma desvinculada
?&gt;

# gnupg_sign

(PECL gnupg &gt;= 0.1)

gnupg_sign — Firma un texto dado

### Descripción

**gnupg_sign**([resource](#language.types.resource) $identifier, [string](#language.types.string) $plaintext): [string](#language.types.string)|[false](#language.types.singleton)

Firma el argumento plaintext con las claves que
fueron establecidas con [gnupg_addsignkey](#function.gnupg-addsignkey) previamente
y devuelve el texto firmado o la firma, dependiendo de lo que fue
establecido con
[gnupg_setsignmode](#function.gnupg-setsignmode).

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     plaintext


       El texto a firmar.





### Valores devueltos

En caso de éxito, esta función devuelve el texto firmado o la firma.
En caso de fallo, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_sign()** (Estilo procedimental)

&lt;?php
$res = gnupg_init();
gnupg_addsignkey($res,"8660281B6051D071D94B5B230549F9DC851566DC","test");
$signed = gnupg_sign($res, "juste un test");
echo $signed;
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_sign()** (Estilo orientado a objetos)

&lt;?php
$gpg = new gnupg();
$gpg-&gt;addsignkey("8660281B6051D071D94B5B230549F9DC851566DC","test");
$signed = $gpg-&gt;sign("just a test");
echo $signed;
?&gt;

# gnupg_verify

(PECL gnupg &gt;= 0.1)

gnupg_verify — Verifica un texto firmado

### Descripción

**gnupg_verify**(
    [resource](#language.types.resource) $identifier,
    [string](#language.types.string) $signed_text,
    [string](#language.types.string) $signature,
    [string](#language.types.string) &amp;$plaintext = ?
): [array](#language.types.array)|[false](#language.types.singleton)

Verifica el argumento signed_text y devuelve las
informaciones acerca de la firma.

### Parámetros

     identifier

      El identificador gnupg, generado por una llamada

a la función [gnupg_init()](#function.gnupg-init) o a la función
**gnupg**.

     signed_text


       El texto firmado.






     signature


       La firma. Para verificar un texto firmado en claro, se establece la firma
       a **[false](#constant.false)**.






     plaintext


       El texto. Si este argumento opcional es pasado, se rellena con el plaintext.





### Valores devueltos

En caso de éxito, esta función devuelve informaciones acerca de la
firma.
En caso de fallo, esta función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gnupg_verify()** (Estilo procedimental)

&lt;?php
$plaintext = "";
$res = gnupg_init();
// firmado en claro
$info = gnupg_verify($res,$signed_text,false,$plaintext);
print_r($info);
// firma separada
$info = gnupg_verify($res,$signed_text,$signature);
print_r($info);
?&gt;

    **Ejemplo #2 Ejemplo con gnupg_verify()** (Estilo orientado a objetos)

&lt;?php
$plaintext = "";
$gpg = new gnupg();
// firmado en claro
$info = $gpg-&gt;verify($signed_text,false,$plaintext);
print_r($info);
// firma separada
$info = $gpg-&gt;verify($signed_text,$signature);
print_r($info);
?&gt;

## Tabla de contenidos

- [gnupg_adddecryptkey](#function.gnupg-adddecryptkey) — Añade una clave para descifrado
- [gnupg_addencryptkey](#function.gnupg-addencryptkey) — Añade una clave para cifrado
- [gnupg_addsignkey](#function.gnupg-addsignkey) — Añade una clave para firmar
- [gnupg_cleardecryptkeys](#function.gnupg-cleardecryptkeys) — Elimina todas las claves que fueron fijadas para el descifrado anteriormente
- [gnupg_clearencryptkeys](#function.gnupg-clearencryptkeys) — Elimina todas las claves que fueron establecidas para cifrado con anterioridad
- [gnupg_clearsignkeys](#function.gnupg-clearsignkeys) — Elimina todas las claves que fueron fijadas para firma previamente
- [gnupg_decrypt](#function.gnupg-decrypt) — Descifra un texto dado
- [gnupg_decryptverify](#function.gnupg-decryptverify) — Descifra y verifica un texto dado
- [gnupg_deletekey](#function.gnupg-deletekey) — Elimina una clave del llavero
- [gnupg_encrypt](#function.gnupg-encrypt) — Cifra un texto dado
- [gnupg_encryptsign](#function.gnupg-encryptsign) — Cifra y firma un texto dado
- [gnupg_export](#function.gnupg-export) — Exporta una clave
- [gnupg_getengineinfo](#function.gnupg-getengineinfo) — Devuelve la información del motor
- [gnupg_geterror](#function.gnupg-geterror) — Devuelve el texto de error, si una función falla
- [gnupg_geterrorinfo](#function.gnupg-geterrorinfo) — Devuelve la información de error
- [gnupg_getprotocol](#function.gnupg-getprotocol) — Devuelve el protocolo activo actual para todas las operaciones
- [gnupg_gettrustlist](#function.gnupg-gettrustlist) — Busca los elementos de confianza
- [gnupg_import](#function.gnupg-import) — Importa una clave
- [gnupg_init](#function.gnupg-init) — Inicializa una conexión
- [gnupg_keyinfo](#function.gnupg-keyinfo) — Retorna un array con las informaciones acerca de todas las
  claves que coinciden con el patrón dado
- [gnupg_listsignatures](#function.gnupg-listsignatures) — Lista las firmas de clave
- [gnupg_setarmor](#function.gnupg-setarmor) — Cambia la salida blindada
- [gnupg_seterrormode](#function.gnupg-seterrormode) — Establece el modo para error_reporting
- [gnupg_setsignmode](#function.gnupg-setsignmode) — Establece el modo para firmar
- [gnupg_sign](#function.gnupg-sign) — Firma un texto dado
- [gnupg_verify](#function.gnupg-verify) — Verifica un texto firmado

- [Introducción](#intro.gnupg)
- [Instalación/Configuración](#gnupg.setup)<li>[Requerimientos](#gnupg.requirements)
- [Instalación](#gnupg.installation)
  </li>- [Constantes predefinidas](#gnupg.constants)
- [Ejemplos](#gnupg.examples)<li>[Firma de texto (clearsign)](#gnupg.examples-clearsign)
  </li>- [Funciones GnuPG](#ref.gnupg)<li>[gnupg_adddecryptkey](#function.gnupg-adddecryptkey) — Añade una clave para descifrado
- [gnupg_addencryptkey](#function.gnupg-addencryptkey) — Añade una clave para cifrado
- [gnupg_addsignkey](#function.gnupg-addsignkey) — Añade una clave para firmar
- [gnupg_cleardecryptkeys](#function.gnupg-cleardecryptkeys) — Elimina todas las claves que fueron fijadas para el descifrado anteriormente
- [gnupg_clearencryptkeys](#function.gnupg-clearencryptkeys) — Elimina todas las claves que fueron establecidas para cifrado con anterioridad
- [gnupg_clearsignkeys](#function.gnupg-clearsignkeys) — Elimina todas las claves que fueron fijadas para firma previamente
- [gnupg_decrypt](#function.gnupg-decrypt) — Descifra un texto dado
- [gnupg_decryptverify](#function.gnupg-decryptverify) — Descifra y verifica un texto dado
- [gnupg_deletekey](#function.gnupg-deletekey) — Elimina una clave del llavero
- [gnupg_encrypt](#function.gnupg-encrypt) — Cifra un texto dado
- [gnupg_encryptsign](#function.gnupg-encryptsign) — Cifra y firma un texto dado
- [gnupg_export](#function.gnupg-export) — Exporta una clave
- [gnupg_getengineinfo](#function.gnupg-getengineinfo) — Devuelve la información del motor
- [gnupg_geterror](#function.gnupg-geterror) — Devuelve el texto de error, si una función falla
- [gnupg_geterrorinfo](#function.gnupg-geterrorinfo) — Devuelve la información de error
- [gnupg_getprotocol](#function.gnupg-getprotocol) — Devuelve el protocolo activo actual para todas las operaciones
- [gnupg_gettrustlist](#function.gnupg-gettrustlist) — Busca los elementos de confianza
- [gnupg_import](#function.gnupg-import) — Importa una clave
- [gnupg_init](#function.gnupg-init) — Inicializa una conexión
- [gnupg_keyinfo](#function.gnupg-keyinfo) — Retorna un array con las informaciones acerca de todas las
  claves que coinciden con el patrón dado
- [gnupg_listsignatures](#function.gnupg-listsignatures) — Lista las firmas de clave
- [gnupg_setarmor](#function.gnupg-setarmor) — Cambia la salida blindada
- [gnupg_seterrormode](#function.gnupg-seterrormode) — Establece el modo para error_reporting
- [gnupg_setsignmode](#function.gnupg-setsignmode) — Establece el modo para firmar
- [gnupg_sign](#function.gnupg-sign) — Firma un texto dado
- [gnupg_verify](#function.gnupg-verify) — Verifica un texto firmado
  </li>
