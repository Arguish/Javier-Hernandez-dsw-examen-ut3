# OpenSSL

# Introducción

Esta extensión vincula funciones de la biblioteca
[» OpenSSL](http://www.openssl.org/) para el cifrado y
descifrado simétrico y asimétrico, PBKDF2, PKCS7, PKCS12, X509 y otras
operaciones criptográficas. Además, proporciona una implementación de flujo TLS.

OpenSSL ofrece muchas funcionalidades
que este módulo no ofrece actualmente. Algunas podrían ser añadidas
en el futuro.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#openssl.requirements)
- [Instalación](#openssl.installation)
- [Configuración en tiempo de ejecución](#openssl.configuration)
- [Tipos de recursos](#openssl.resources)

    ## Requerimientos

    Para poder utilizar las funciones OpenSSL, debe instalarse la biblioteca
    [» OpenSSL](http://www.openssl.org/).
    PHP 7.0 requiere OpenSSL &gt;= 0.9.8, &lt; 1.2. PHP 7.1-8.0 requieren
    OpenSSL &gt;= 1.0.1, &lt; 3.0. PHP &gt;= 8.1 requiere OpenSSL
    &gt;= 1.0.2, &lt; 4.0. PHP &gt;= 8.4 requiere OpenSSL
    &gt;= 1.1.1, &lt; 4.0.

    **Advertencia**

    Se recomienda encarecidamente utilizar la versión mantenida de OpenSSL para
    evitar ciertas vulnerabilidades en el servidor web.

## Instalación

Para utilizar el soporte OpenSSL de PHP, también debe compilarse PHP con la opción
de configuración **--with-openssl**.

La biblioteca OpenSSL también posee dependencias en tiempo de ejecución. Por ejemplo,
OpenSSL necesita acceder a un generador de números pseudo-aleatorios; en la mayoría
de las plataformas Unix (incluyendo Linux), debe tener acceso al dispositivo
/dev/urandom o /dev/random.

La opción de configuración
**--with-system-ciphers** está disponible
que hace que PHP utilice la lista de cifrado del sistema en lugar de los valores
por omisión codificados en el programa.

**Nota**:
**Nota para usuarios Win32**

Para hacer funcionar esta extensión, algunas bibliotecas
DLL deben estar disponibles a través del
PATH del sistema Windows. Lea la
F.A.Q titulada
"[Cómo agregar mi carpeta
PHP a mi PATH de Windows](#faq.installation.addtopath)" para más información. Copiar las bibliotecas DLL desde la
carpeta PHP a la carpeta del sistema de Windows también funciona (ya que la carpeta del sistema está por defecto en el
PATH del sistema), pero este método no es recomendado.
_Esta extensión requiere que los siguientes archivos estén en el
PATH:_
libeay32.dll,
o, a partir de OpenSSL 1.1, libcrypto-\*.dll

Además, si se ha previsto utilizar las funciones relativas a la generación
de claves y a los certificados, debe instalarse un fichero
openssl.cnf válido en el sistema.
Un fichero de configuración básico está incluido en las distribuciones de PHP
para win32 en el directorio extras/ssl.

PHP buscará el fichero openssl.cnf siguiendo la siguiente
táctica:

    -

      La variable de entorno OPENSSL_CONF, si está
      definida, será utilizada como ruta (incluyendo el fichero) hacia el
      fichero de configuración.



    -

      La variable de entorno SSLEAY_CONF, si está
      definida, será utilizada como ruta (incluyendo el fichero) hacia el
      fichero de configuración.



    -

      El fichero openssl.cnf se supondrá que se encuentra en
      el directorio de certificados, tal como se configuró durante la compilación
      de la biblioteca openssl. Esto significa generalmente C:\Program Files\Common Files\SSL\openssl.cnf (x64)
      o C:\Program Files (x86)\Common Files\SSL\openssl.cnf (x86), o,
      antes de PHP 7.4.0,
      c:\usr\local\ssl\openssl.cnf.


En su instalación, deberá decidirse si se va a instalar el fichero
de configuración en la ruta por omisión o si se va a
hacer en otro lugar y configurar una variable de entorno (posiblemente
por sitio virtual). Tenga en cuenta que es posible reemplazar la ruta por
omisión utilizando el parámetro options de las funciones
que requieren un fichero de configuración.

**Precaución**

    Asegúrese de que los usuarios no privilegiados no estén autorizados a
    modificar openssl.cnf.

A partir de OpenSSL 3.0.0, que se utiliza por omisión en Windows desde PHP 8.2.0, varios
algoritmos han sido considerados obsoletos. Estos algoritmos suelen haber caído en desuso,
han sido considerados no seguros por la comunidad criptográfica, o algo similar.
Estos algoritmos siguen disponibles a través del proveedor de algoritmos legacy
(extras/ssl/legacy.dll) ; su utilización se describe en la
sección [» configuración del proveedor](https://www.openssl.org/docs/manmaster/man5/config.html#Provider-Configuration)
del manual OpenSSL.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        La opción **--with-openssl[=DIR]** ya no acepta
        argumentos de directorio en favor del ajuste de la variable pkg-config
        PKG_CONFIG_PATH hacia la ubicación de OpenSSL, o especificando las variables OPENSSL_LIBS y
        OPENSSL_CFLAGS.





        La ruta de configuración por omisión de OpenSSL ha sido modificada de  C:\usr\local\ssl
        a C:\Program Files\Common Files\SSL y
        C:\Program Files (x86)\Common Files\SSL, respectivamente.





## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**openssl Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      openssl.cafile
      ""
      **[INI_PERDIR](#constant.ini-perdir)**
       



      openssl.capath
      ""
      **[INI_PERDIR](#constant.ini-perdir)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     openssl.cafile
     [string](#language.types.string)



      Ubicación del archivo Certificate Authority en el sistema de archivos local
      que debería ser utilizado con la opción de contexto verify_peer para autenticar
      la identidad del par remoto.







     openssl.capath
     [string](#language.types.string)



      Si cafile no está especificado o si el certificado no es encontrado allí, el
      directorio apuntado por capath es examinado para encontrar un certificado adecuado.
      capath debe ser un directorio de certificados correctamente hasheado.


Ver también las opciones del [contexto de flujo SSL](#context.ssl).

## Tipos de recursos

Antes de PHP 8.0.0, existían 3 tipos de recursos definidos en el
módulo OpenSSL:

    - OpenSSL key

    - OpenSSL X.509

    - OpenSSL X.509 CSR

# Constantes predefinidas

## Tabla de contenidos

- [Opciones de validación general](#openssl.purpose-check)
- [Opciones de relleno (Padding) para el cifrado asimétrico](#openssl.padding)
- [Tipos de clave](#openssl.key-types)
- [Constantes/opciones PKCS7](#openssl.pkcs7.flags)
- [Bandera/Constantes CMS](#openssl.cms.flags)
- [Algoritmo de firma](#openssl.signature-algos)
- [Cifrados](#openssl.ciphers)
- [Constantes de versión](#openssl.constversion)
- [Constantes de identificación del nombre del servidor](#openssl.constsni)
- [Otras constantes](#openssl.constants.other)

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

## Opciones de validación general

     **[X509_PURPOSE_SSL_CLIENT](#constant.x509-purpose-ssl-client)**
     ([int](#language.types.integer))









     **[X509_PURPOSE_SSL_SERVER](#constant.x509-purpose-ssl-server)**
     ([int](#language.types.integer))









     **[X509_PURPOSE_NS_SSL_SERVER](#constant.x509-purpose-ns-ssl-server)**
     ([int](#language.types.integer))









     **[X509_PURPOSE_SMIME_SIGN](#constant.x509-purpose-smime-sign)**
     ([int](#language.types.integer))









     **[X509_PURPOSE_SMIME_ENCRYPT](#constant.x509-purpose-smime-encrypt)**
     ([int](#language.types.integer))









     **[X509_PURPOSE_CRL_SIGN](#constant.x509-purpose-crl-sign)**
     ([int](#language.types.integer))









     **[X509_PURPOSE_ANY](#constant.x509-purpose-any)**
     ([int](#language.types.integer))






## Opciones de relleno (Padding) para el cifrado asimétrico

     **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**
     ([int](#language.types.integer))









     **[OPENSSL_SSLV23_PADDING](#constant.openssl-sslv23-padding)**
     ([int](#language.types.integer))









     **[OPENSSL_NO_PADDING](#constant.openssl-no-padding)**
     ([int](#language.types.integer))









     **[OPENSSL_PKCS1_OAEP_PADDING](#constant.openssl-pkcs1-oaep-padding)**
     ([int](#language.types.integer))






## Tipos de clave

      **[OPENSSL_KEYTYPE_RSA](#constant.openssl-keytype-rsa)**
      ([int](#language.types.integer))



      Tipo de clave RSA.





     **[OPENSSL_KEYTYPE_DSA](#constant.openssl-keytype-dsa)**
     ([int](#language.types.integer))



      Tipo de clave DSA.





     **[OPENSSL_KEYTYPE_DH](#constant.openssl-keytype-dh)**
     ([int](#language.types.integer))



      Tipo de clave DH (Diffie-Hellman).





      **[OPENSSL_KEYTYPE_EC](#constant.openssl-keytype-ec)**
      ([int](#language.types.integer))



       Tipo de clave de curva elíptica.





      **[OPENSSL_KEYTYPE_X25519](#constant.openssl-keytype-x25519)**
      ([int](#language.types.integer))



       Tipo de clave de curva X25519.
       Esta constante solo está disponible cuando PHP se compila con OpenSSL 3.0+.





      **[OPENSSL_KEYTYPE_ED25519](#constant.openssl-keytype-ed25519)**
      ([int](#language.types.integer))



       Tipo de clave de curva Ed25519.
       Esta constante solo está disponible cuando PHP se compila con OpenSSL 3.0+.





      **[OPENSSL_KEYTYPE_X448](#constant.openssl-keytype-x448)**
      ([int](#language.types.integer))



       Tipo de clave de curva X448.
       Esta constante solo está disponible cuando PHP se compila con OpenSSL 3.0+.





      **[OPENSSL_KEYTYPE_ED448](#constant.openssl-keytype-ed448)**
      ([int](#language.types.integer))



       Tipo de clave de curva Ed448.
       Esta constante solo está disponible cuando PHP se compila con OpenSSL 3.0+.



## Constantes/opciones PKCS7

    Las funciones S/MIME utilizan opciones que se especifican
    mediante un campo de bits. Los valores válidos son:



     <caption>**Constantes PKCS7**</caption>



        Constante
        Descripción







         **[PKCS7_TEXT](#constant.pkcs7-text)**
        ([int](#language.types.integer))


        Añade el texto en claro en los encabezados del mensaje
        firmado/cifrado. Al descifrar o verificar,
        se eliminan simplemente estos datos. Si el
        mensaje cifrado o firmado no es del tipo MIME, se producirá un error.





        **[PKCS7_BINARY](#constant.pkcs7-binary)**
        ([int](#language.types.integer))


        Normalmente, el mensaje se convierte al formato canónico
        que utiliza efectivamente CR y LF
        como fin de línea, como se solicita en las especificaciones de S/MIME.
        Cuando esta opción está activada, el mensaje no se convertirá. Esto es útil cuando se manipulan datos binarios que no están en formato MIME.





        **[PKCS7_NOINTERN](#constant.pkcs7-nointern)**
        ([int](#language.types.integer))


        Al verificar un mensaje, los certificados
        (si los hay) incluidos en el mensaje se utilizan normalmente
        para buscar el certificado de firma. Con esta opción, solo se utiliza
        el certificado especificado por el
        argumento untrusted_certificates_filename de la función
        [openssl_pkcs7_verify()](#function.openssl-pkcs7-verify). Los certificados proporcionados pueden seguir utilizándose,
        con un nivel de confianza reducido.





        **[PKCS7_NOVERIFY](#constant.pkcs7-noverify)**
        ([int](#language.types.integer))


        No verifica los certificados de los firmantes de un mensaje
        firmado.





        **[PKCS7_NOCHAIN](#constant.pkcs7-nochain)**
        ([int](#language.types.integer))


        No encadena las verificaciones de los certificados de los firmantes. Es decir, no utiliza los certificados
        contenidos en el mensaje.





        **[PKCS7_NOCERTS](#constant.pkcs7-nocerts)**
        ([int](#language.types.integer))


        Al firmar un mensaje, el certificado del firmante
        se incluye normalmente. Con esta opción, esto se desactiva. Esto reducirá el tamaño del mensaje,
        pero el verificador deberá tener una copia local del certificado
        del firmante (pasado al argumento
        untrusted_certificates_filename, con la función
        [openssl_pkcs7_verify()](#function.openssl-pkcs7-verify)).





        **[PKCS7_NOATTR](#constant.pkcs7-noattr)**
        ([int](#language.types.integer))


        Normalmente, cuando se firma un mensaje, se incluye un conjunto de atributos
        que contiene la hora de firma y el algoritmo simétrico
        soportado, en el mensaje. Con esta opción, no se incluye.





        **[PKCS7_DETACHED](#constant.pkcs7-detached)**
        ([int](#language.types.integer))


        Al firmar un mensaje, se utiliza la firma en texto claro, con el tipo MIME "multipart/signed".
        Este es el valor por defecto del argumento
        flags
        para la función [openssl_pkcs7_sign()](#function.openssl-pkcs7-sign).
        Si se anula esta opción, el mensaje se firmará de
        manera opaca, lo que resiste mejor a la traducción
        de los relés de correo (algunos antiguos servidores de correo corrompen los mensajes), pero impide la lectura por los clientes de correo que no conocen S/MIME.





        **[PKCS7_NOSIGS](#constant.pkcs7-nosigs)**
        ([int](#language.types.integer))


        No verifica las firmas de un mensaje





        **[PKCS7_NOOLDMIMETYPE](#constant.pkcs7-nooldmimetype)**
        ([int](#language.types.integer))


        Disponible a partir de PHP 8.3.0.
        Establece el encabezado HTTP Content-Type en application/pkcs7-mime en lugar de
        application/x-pkcs7-mime para cifrar un mensaje.





## Bandera/Constantes CMS

Las funciones CMS utilizan banderas que se especifican utilizando
una máscara de bits que incluye una o más de las siguientes opciones:

    <caption>**CMS CONSTANTS**</caption>



       Constantes
       Descripción







        **[OPENSSL_CMS_TEXT](#constant.openssl-cms-text)**
        ([int](#language.types.integer))


        Añade el encabezado content type text/plain al mensaje cifrado/firmado.
        Al descifrar/verificar, estos encabezados se eliminan de la
        salida, si el mensaje descifrado o verificado no es del tipo MIME
        text/plain entonces se producirá un error.





        **[OPENSSL_CMS_BINARY](#constant.openssl-cms-binary)**
        ([int](#language.types.integer))


        Normalmente el mensaje de entrada se convierte a su forma "canónica"
        que en realidad utiliza CR y LF
        como fin de línea: tal como se requiere por la especificación CMS. Cuando
        esta opción está presente, ninguna traducción se realiza. Esto es útil al manejar datos binarios que pueden no estar en formato CMS.





        **[OPENSSL_CMS_NOINTERN](#constant.openssl-cms-nointern)**
        ([int](#language.types.integer))


        Al verificar un mensaje, los certificados (si los hay)
        incluidos en el mensaje se utilizan normalmente para buscar el certificado
        de firma. Con esta opción, solo se utilizan los certificados especificados en
        el argumento untrusted_certificates_filename
        de [openssl_cms_verify()](#function.openssl-cms-verify).
        Los certificados proporcionados pueden seguir utilizándose como
        autoridades de certificación no fiables.





        **[OPENSSL_CMS_NOVERIFY](#constant.openssl-cms-noverify)**
        ([int](#language.types.integer))


        No verifica el certificado del firmante de un mensaje firmado.





        **[OPENSSL_CMS_NOCERTS](#constant.openssl-cms-nocerts)**
        ([int](#language.types.integer))


        Al firmar un mensaje el certificado del firmante se
        incluye normalmente, con esta opción se excluye. Esto reducirá
        el tamaño del mensaje firmado pero el verificador debe tener una copia
        del certificado del firmante disponible localmente (pasado utilizando
        untrusted_certificates_filename de
        [openssl_cms_verify()](#function.openssl-cms-verify) por ejemplo).





        **[OPENSSL_CMS_NOATTR](#constant.openssl-cms-noattr)**
        ([int](#language.types.integer))


        Normalmente cuando un mensaje es firmado, se incluyen un conjunto de atributos que
        incluyen la hora de firma y los algoritmos simétricos
        soportados. Con esta opción no se incluyen.





        **[OPENSSL_CMS_DETACHED](#constant.openssl-cms-detached)**
        ([int](#language.types.integer))


        Al firmar un mensaje, se utiliza la firma en texto claro
        con el tipo MIME "multipart/signed". Este es el
        comportamiento por defecto, si no se especifica ningún
        flags a [openssl_cms_sign()](#function.openssl-cms-sign).
        Si se desactiva esta opción, el mensaje se firmará utilizando
        una firma opaca, que es más resistente a la traducción por
        los relés de correo pero no puede ser leída por los agentes de correo que no
        soportan S/MIME.





        **[OPENSSL_CMS_NOSIGS](#constant.openssl-cms-nosigs)**
        ([int](#language.types.integer))

       No intenta verificar las firmas de un mensaje




        **[OPENSSL_CMS_OLDMIMETYPE](#constant.openssl-cms-oldmimetype)**
        ([int](#language.types.integer))


        Disponible a partir de PHP 8.3.0.
        Establece el encabezado HTTP Content-Type en application/x-pkcs7-mime en lugar de
        application/pkcs7-mime para cifrar un mensaje.





## Algoritmo de firma

     **[OPENSSL_ALGO_DSS1](#constant.openssl-algo-dss1)**
     ([int](#language.types.integer))









     **[OPENSSL_ALGO_SHA1](#constant.openssl-algo-sha1)**
     ([int](#language.types.integer))



      Utilizado como algoritmo por defecto para las funciones
      [openssl_sign()](#function.openssl-sign) y
      [openssl_verify()](#function.openssl-verify).





     **[OPENSSL_ALGO_SHA224](#constant.openssl-algo-sha224)**
     ([int](#language.types.integer))








     **[OPENSSL_ALGO_SHA256](#constant.openssl-algo-sha256)**
     ([int](#language.types.integer))








     **[OPENSSL_ALGO_SHA384](#constant.openssl-algo-sha384)**
     ([int](#language.types.integer))








     **[OPENSSL_ALGO_SHA512](#constant.openssl-algo-sha512)**
     ([int](#language.types.integer))








     **[OPENSSL_ALGO_RMD160](#constant.openssl-algo-rmd160)**
     ([int](#language.types.integer))








     **[OPENSSL_ALGO_MD5](#constant.openssl-algo-md5)**
     ([int](#language.types.integer))









     **[OPENSSL_ALGO_MD4](#constant.openssl-algo-md4)**
     ([int](#language.types.integer))









     **[OPENSSL_ALGO_MD2](#constant.openssl-algo-md2)**
     ([int](#language.types.integer))



      Esta constante solo está disponible cuando PHP se compila con soporte MD2. Es necesario
      pasar el CFLAG -DHAVE_OPENSSL_MD2_H al compilar PHP
      y pasar enable-md2 al compilar OpenSSL 1.0.0+.


## Cifrados

     **[OPENSSL_DEFAULT_STREAM_CIPHERS](#constant.openssl-default-stream-ciphers)**
     ([string](#language.types.string))



      Lista de cifrados por defecto.





     **[OPENSSL_CIPHER_RC2_40](#constant.openssl-cipher-rc2-40)**
     ([int](#language.types.integer))









     **[OPENSSL_CIPHER_RC2_128](#constant.openssl-cipher-rc2-128)**
     ([int](#language.types.integer))









     **[OPENSSL_CIPHER_RC2_64](#constant.openssl-cipher-rc2-64)**
     ([int](#language.types.integer))









     **[OPENSSL_CIPHER_DES](#constant.openssl-cipher-des)**
     ([int](#language.types.integer))









     **[OPENSSL_CIPHER_3DES](#constant.openssl-cipher-3des)**
     ([int](#language.types.integer))











     **[OPENSSL_CIPHER_AES_128_CBC](#constant.openssl-cipher-aes-128-cbc)**
     ([int](#language.types.integer))








     **[OPENSSL_CIPHER_AES_192_CBC](#constant.openssl-cipher-aes-192-cbc)**
     ([int](#language.types.integer))








     **[OPENSSL_CIPHER_AES_256_CBC](#constant.openssl-cipher-aes-256-cbc)**
     ([int](#language.types.integer))





## Constantes de versión

       **[OPENSSL_VERSION_TEXT](#constant.openssl-version-text)**
       ([string](#language.types.string))








     **[OPENSSL_VERSION_NUMBER](#constant.openssl-version-number)**
     ([int](#language.types.integer))





## Constantes de identificación del nombre del servidor

     **[OPENSSL_TLSEXT_SERVER_NAME](#constant.openssl-tlsext-server-name)**
     ([int](#language.types.integer))



      Si el soporte SNI está disponible o no.


**Nota**:

    Esta constante solo está disponible cuando PHP se compila con
    OpenSSL 0.9.8j o posterior

## Otras constantes

     **[OPENSSL_RAW_DATA](#constant.openssl-raw-data)**
     ([int](#language.types.integer))



      Si **[OPENSSL_RAW_DATA](#constant.openssl-raw-data)** está definida en
      [openssl_encrypt()](#function.openssl-encrypt) o [openssl_decrypt()](#function.openssl-decrypt),
      los datos devueltos se devuelven tal cual.
      Cuando esto no está especificado, los datos devueltos al llamador están
      codificados en Base64.





       **[OPENSSL_DONT_ZERO_PAD_KEY](#constant.openssl-dont-zero-pad-key)**
       ([int](#language.types.integer))



         Impide que [openssl_encrypt()](#function.openssl-encrypt) rellene las claves
         que son más cortas que la longitud de clave por defecto.





        **[OPENSSL_ZERO_PADDING](#constant.openssl-zero-padding)**
        ([int](#language.types.integer))



         Por defecto, las operaciones de cifrado se completan utilizando
         bloques estándar y el relleno se verifica y elimina
         al descifrar. Si la constante **[OPENSSL_ZERO_PADDING](#constant.openssl-zero-padding)**
         está definida en el argumento options de la función
         [openssl_encrypt()](#function.openssl-encrypt) o [openssl_decrypt()](#function.openssl-decrypt)
         entonces no se realizará ningún relleno, la cantidad total
         de datos cifrados deberá ser entonces un múltiplo del tamaño del bloque
         o bien se producirá un error.





     **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**
     ([int](#language.types.integer))



      Indica que la codificación es S/MIME.





     **[OPENSSL_ENCODING_DER](#constant.openssl-encoding-der)**
     ([int](#language.types.integer))



      Indica que la codificación es DER (Distinguished Encoding Rules).





     **[OPENSSL_ENCODING_PEM](#constant.openssl-encoding-pem)**
     ([int](#language.types.integer))



      Indica que la codificación es PEM (Privacy-Enhanced Mail).


# Parámetros de claves/certificados

Un gran número de funciones OpenSSL requieren una clave o un certificado como
parámetros. Los métodos siguientes pueden ser utilizados para obtenerlos:

- Certificados

     <li class="listitem">
      
       Una instancia de [OpenSSLCertificate](#class.opensslcertificate)
       (o anterior a PHP 8.0.0, un [resource](#language.types.resource) de tipo OpenSSL X.509)
       devuelta por [openssl_x509_read()](#function.openssl-x509-read)
      

    - Una cadena con el formato
      file://path/to/cert.pem;
      El fichero identificado debe contener un certificado,
      codificado en formato PEM.

    - Una cadena que contiene el contenido de un certificado, codificado
      en formato PEM, puede comenzar por -----BEGIN CERTIFICATE-----.

   </li>

- Solicitudes de firma de certificados (Certificate Signing Requests, abreviado CSRs)

     <li class="listitem">
      
       Una instancia de [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)
       (o anterior a PHP 8.0.0, un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR)
       devuelta por [openssl_csr_new()](#function.openssl-csr-new)
      

    - Una [string](#language.types.string) con el formato
      file://path/to/csr.pem; el fichero nombrado debe
      contener un CSR codificado en formato PEM.

    - Una [string](#language.types.string) que contiene el contenido de un CSR, codificado en formato PEM,
      puede comenzar por -----BEGIN CERTIFICATE REQUEST-----.

   </li>

- Claves públicas/privadas

     <li class="listitem">
      
       Una instancia de [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)
       (o anterior a PHP 8.0.0, un [resource](#language.types.resource) de tipo OpenSSL key)
       devuelta por [openssl_csr_new()](#function.openssl-csr-new)
      

    - Para las claves públicas únicamente: una instancia de [OpenSSLCertificate](#class.opensslcertificate)
      (o anterior a PHP 8.0.0, un [resource](#language.types.resource) de tipo OpenSSL X.509)

    - Una cadena con el formato:
      file://path/to/file.pem.
      El fichero debe contener una clave privada, o un certificado,
      codificado en formato PEM (puede contener ambos).

    - Una [string](#language.types.string) que contiene el contenido de un certificado/clave, codificado en formato PEM,
      puede comenzar por -----BEGIN PUBLIC KEY-----.

    - Para las claves privadas, también puede utilizarse la
      sintaxis array($key, $passphrase), donde
        $key
      representa una clave especificada por un
      fichero o una representación textual como se ha citado anteriormente, y $passphrase representa una
      cadena que contiene la frase de contraseña de esta clave privada.

   </li>
  


# Verificación de certificados

Cuando se llama a una función que va a verificar una firma o
un certificado, el argumento ca_info debe ser un
array que contenga los nombres de un directorio y un fichero que indiquen los
emisores de confianza. Si se especifica un directorio, debe ser correcto,
ya que **openssl** lo utilizará.

# Funciones de OpenSSL

# openssl_cipher_iv_length

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

openssl_cipher_iv_length — Obtiene la longitud del vector de inicialización cipher

### Descripción

**openssl_cipher_iv_length**([string](#language.types.string) $cipher_algo): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene la longitud del vector de inicialización cipher.

### Parámetros

    cipher_algo


      El método cipher. Consulte la función
      [openssl_get_cipher_methods()](#function.openssl-get-cipher-methods) para obtener una lista de valores
      potenciales.


### Valores devueltos

Devuelve la longitud cipher en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera un error de nivel **[E_WARNING](#constant.e-warning)** cuando
el algoritmo cipher es desconocido.

### Ejemplos

**Ejemplo #1 Ejemplo con openssl_cipher_iv_length()**

&lt;?php
$method = 'AES-128-CBC';
$ivlen = openssl_cipher_iv_length($method);

echo $ivlen;
?&gt;

Resultado del ejemplo anterior es similar a:

16

# openssl_cipher_key_length

(PHP 8 &gt;= 8.2.0)

openssl_cipher_key_length — Devuelve la longitud de la clave de cifrado

### Descripción

**openssl_cipher_key_length**([string](#language.types.string) $cipher_algo): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la longitud de la clave de cifrado.

### Parámetros

    cipher_algo


      El método de cifrado, ver [openssl_get_cipher_methods()](#function.openssl-get-cipher-methods) para una lista de valores potenciales.


### Valores devueltos

Devuelve la longitud de la clave de cifrado en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** cuando el algoritmo de cifrado
es desconocido.

### Ejemplos

**Ejemplo #1 Ejemplo de openssl_cipher_key_length()**

&lt;?php
$method = 'AES-128-CBC';

var_dump(openssl_cipher_key_length($method));
?&gt;

Resultado del ejemplo anterior es similar a:

int(16)

# openssl_cms_decrypt

(PHP 8)

openssl_cms_decrypt — Descifra un mensaje CMS

### Descripción

**openssl_cms_decrypt**(
    [string](#language.types.string) $input_filename,
    [string](#language.types.string) $output_filename,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $private_key = **[null](#constant.null)**,
    [int](#language.types.integer) $encoding = **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**
): [bool](#language.types.boolean)

Descifra un mensaje CMS.

### Parámetros

    input_filename


      El nombre de un fichero que contiene contenido cifrado.






    output_filename


      El nombre del fichero para depositar el contenido descifrado.






    certificate


      El nombre del fichero que contiene un certificado del destinatario.






    private_key


      El nombre del fichero que contiene una clave PKCS#8.






    encoding


      La codificación del fichero de entrada. Una de las constantes **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**,
      **[OPENSSL_ENCODING_DER](#constant.openssl-encoding-der)** o **[OPENSSL_ENCODING_PEM](#constant.openssl-encoding-pem)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# openssl_cms_encrypt

(PHP 8)

openssl_cms_encrypt — Cifra un mensaje CMS

### Descripción

**openssl_cms_encrypt**(
    [string](#language.types.string) $input_filename,
    [string](#language.types.string) $output_filename,
    [OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $certificate,
    [?](#language.types.null)[array](#language.types.array) $headers,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $encoding = **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**,
    [int](#language.types.integer) $cipher_algo = **[OPENSSL_CIPHER_AES_128_CBC](#constant.openssl-cipher-aes-128-cbc)**
): [bool](#language.types.boolean)

Esta función cifra el contenido para uno o varios destinatarios,
basado en los certificados que se le pasan.

### Parámetros

    input_filename


       El fichero a cifrar.






    output_filename


      El fichero de salida.






    certificate


      Los destinatarios a cifrar.






    headers


      Las cabeceras a incluir al utilizar S/MIME.






    flags


      Los flag a pasar a CMS_sign.






    encoding


      Una codificación de salida. Una de las constantes **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**,
      **[OPENSSL_ENCODING_DER](#constant.openssl-encoding-der)** o **[OPENSSL_ENCODING_PEM](#constant.openssl-encoding-pem)**.






    cipher_algo


      El cifrado a utilizar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El algoritmo de cifrado por omisión (cipher_algo) es ahora
       AES-128-CBC (**[OPENSSL_CIPHER_AES_128_CBC](#constant.openssl-cipher-aes-128-cbc)**). Anteriormente,
       se utilizaba PKCS7/CMS (**[OPENSSL_CIPHER_RC2_40](#constant.openssl-cipher-rc2-40)**).



# openssl_cms_read

(PHP 8)

openssl_cms_read — Exporta el fichero CMS a un array de certificados PEM

### Descripción

**openssl_cms_read**([string](#language.types.string) $input_filename, [array](#language.types.array) &amp;$certificates): [bool](#language.types.boolean)

Realiza la operación inversa de [openssl_pkcs7_read()](#function.openssl-pkcs7-read).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    input_filename









    certificates





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# openssl_cms_sign

(PHP 8)

openssl_cms_sign — Firma un fichero

### Descripción

**openssl_cms_sign**(
    [string](#language.types.string) $input_filename,
    [string](#language.types.string) $output_filename,
    [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [?](#language.types.null)[array](#language.types.array) $headers,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $encoding = **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**,
    [?](#language.types.null)[string](#language.types.string) $untrusted_certificates_filename = **[null](#constant.null)**
): [bool](#language.types.boolean)

Esta función firma un fichero con un certificado X.509 y una clave.

### Parámetros

    input_filename


      El nombre del fichero a firmar.






    output_filename


      El nombre del fichero para depositar los resultados.






    certificate


      El certificado de firma.
      Véase [Parámetros de clave/certificado](#openssl.certparams) para una lista de valores válidos.






    private_key


      La clave asociada al certificate.
      Véase [Parámetros de clave/certificado](#openssl.certparams) para una lista de valores válidos.






    headers


      Un array de encabezados a incluir en la salida S/MIME.






    flags


      Los flag a pasar a **cms_sign()**.






    encoding


      La codificación del fichero de salida. Una de las constantes **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**,
      **[OPENSSL_ENCODING_DER](#constant.openssl-encoding-der)** o **[OPENSSL_ENCODING_PEM](#constant.openssl-encoding-pem)**.






    untrusted_certificates_filename


      Los certificados intermedios a incluir en la firma.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de openssl_cms_sign()**

&lt;?php

openssl_cms_sign('input.txt', 'output.txt', 'file://cert.pem', 'file://privkey.pem', null, OPENSSL_CMS_BINARY, OPENSSL_ENCODING_DER, 'chain.pem');
?&gt;

# openssl_cms_verify

(PHP 8)

openssl_cms_verify — Verifica una firma CMS

### Descripción

**openssl_cms_verify**(
    [string](#language.types.string) $input_filename,
    [int](#language.types.integer) $flags = 0,
    [?](#language.types.null)[string](#language.types.string) $certificates = **[null](#constant.null)**,
    [array](#language.types.array) $ca_info = [],
    [?](#language.types.null)[string](#language.types.string) $untrusted_certificates_filename = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $pk7 = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $sigfile = **[null](#constant.null)**,
    [int](#language.types.integer) $encoding = **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**
): [bool](#language.types.boolean)

Esta función verifica una firma CMS, ya sea adjunta o desprendida, con la codificación especificada.

### Parámetros

    input_filename


      El fichero de entrada.






    flags


      Los flag a pasar a **cms_verify()**.






    certificates


      Un fichero con el certificado del firmante y eventualmente certificados intermedios.






    ca_info


      Un array que contiene certificados de autoridad auto-firmados.






    untrusted_certificates_filename


      Un fichero que contiene certificados intermedios adicionales.






    content


      Un fichero que apunta al contenido cuando las firmas están desprendidas.






    pk7









    sigfile


      Un fichero para guardar la firma.






    encoding


      La codificación del fichero de entrada. Una de las constantes **[OPENSSL_ENCODING_SMIME](#constant.openssl-encoding-smime)**,
      **[OPENSSL_ENCODING_DER](#constant.openssl-encoding-der)** o **[OPENSSL_ENCODING_PEM](#constant.openssl-encoding-pem)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# openssl_csr_export

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_csr_export — Exporta un CSR a un fichero o una variable

### Descripción

**openssl_csr_export**([OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)|[string](#language.types.string) $csr, [string](#language.types.string) &amp;$output, [bool](#language.types.boolean) $no_text = **[true](#constant.true)**): [bool](#language.types.boolean)

**openssl_csr_export()** toma la solicitud de firma de certificado representada por CSR y la almacena en formato PEM en output, que es pasado por referencia.

### Parámetros

csr

        Ver los [parámetros CSR](#openssl.certparams) para obtener una lista de los valores válidos.






     output

      En caso de éxito, esta cadena contendrá el CSR codificado en PEM





     no_text



El parámetro opcional notext afecta al nivel de verbosidad del display;
si vale **[false](#constant.false)**, se añadirán información legible por humanos en el display.
Por omisión, el parámetro notext vale **[true](#constant.true)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       csr ahora acepta una instancia de [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest); anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.



### Ejemplos

    **Ejemplo #1 Ejemplo de openssl_csr_export()**

&lt;?php
$subject = array(
    "commonName" =&gt; "example.com",
);
$private_key = openssl_pkey_new(array(
"private_key_bits" =&gt; 2048,
"private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));
$configargs = array(
    'digest_alg' =&gt; 'sha256WithRSAEncryption'
);
$csr = openssl_csr_new($subject, $private_key, $configargs);
openssl_csr_export($csr, $csr_string);
echo $csr_string;
?&gt;

### Ver también

    - [openssl_csr_export_to_file()](#function.openssl-csr-export-to-file) - Exporta una CSR a un fichero

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_csr_export_to_file

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_csr_export_to_file — Exporta una CSR a un fichero

### Descripción

**openssl_csr_export_to_file**([OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)|[string](#language.types.string) $csr, [string](#language.types.string) $output_filename, [bool](#language.types.boolean) $no_text = **[true](#constant.true)**): [bool](#language.types.boolean)

**openssl_csr_export_to_file()** toma la CSR representada por
el argumento csr y la guarda en formato PEM en el fichero
nombrado output_filename.

### Parámetros

csr

        Ver los [parámetros CSR](#openssl.certparams) para obtener una lista de los valores válidos.






     output_filename


       Ruta hacia el fichero de salida.






     no_text



El parámetro opcional notext afecta al nivel de verbosidad del display;
si vale **[false](#constant.false)**, se añadirán información legible por humanos en el display.
Por omisión, el parámetro notext vale **[true](#constant.true)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       csr ahora acepta una instancia de
       [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.



### Ejemplos

    **Ejemplo #1 Ejemplo de openssl_csr_export_to_file()**

&lt;?php
$subject = array(
    "commonName" =&gt; "example.com",
);
$private_key = openssl_pkey_new(array(
"private_key_bits" =&gt; 2048,
"private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));
$csr = openssl_csr_new($subject, $private_key, array('digest_alg' =&gt; 'sha384') );
openssl_pkey_export_to_file($private_key, 'example-priv.key');
// Al mismo tiempo que el sujeto, la CSR contiene la clave pública correspondiente a la clave privada
openssl_csr_export_to_file($csr, 'example-csr.pem');
?&gt;

### Ver también

    - [openssl_csr_export()](#function.openssl-csr-export) - Exporta un CSR a un fichero o una variable

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_csr_get_public_key

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

openssl_csr_get_public_key — Devuelve la clave pública de un CSR

### Descripción

**openssl_csr_get_public_key**([OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)|[string](#language.types.string) $csr, [bool](#language.types.boolean) $short_names = **[true](#constant.true)**): [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[false](#language.types.singleton)

**openssl_csr_get_public_key()** extrae la clave pública de la
csr y la prepara para su utilización por otras
funciones.

### Parámetros

csr

        Ver los [parámetros CSR](#openssl.certparams) para obtener una lista de los valores válidos.






     short_names

      **Advertencia**

        Este parámetro es ignorado






### Valores devueltos

Devuelve una [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) en caso de éxito,
o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) ; anteriormente se devolvía
       un [resource](#language.types.resource) de tipo OpenSSL key.




      8.0.0

       csr acepta ahora una instancia de
       [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.



### Ejemplos

    **Ejemplo #1 Ejemplo de openssl_csr_get_public_key()**

&lt;?php
$subject = array(
    "commonName" =&gt; "example.com",
);
$private_key = openssl_pkey_new(array(
"private_key_bits" =&gt; 2048,
"private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));
$csr = openssl_csr_new($subject, $private_key, array('digest_alg' =&gt; 'sha256') );
$public_key = openssl_csr_get_public_key($csr);
$info = openssl_pkey_get_details($public_key);
echo $info['key'];
?&gt;

### Ver también

    - [openssl_csr_get_subject()](#function.openssl-csr-get-subject) - Retorna el sujeto de una CSR

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_pkey_get_details()](#function.openssl-pkey-get-details) - Devuelve un array que contiene los detalles de la clave

    - [openssl_pkey_export_to_file()](#function.openssl-pkey-export-to-file) - Guarda una clave en formato ASCII en un fichero

    - [openssl_pkey_export()](#function.openssl-pkey-export) - Almacena una representación exportable de la clave en una cadena de caracteres

# openssl_csr_get_subject

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

openssl_csr_get_subject — Retorna el sujeto de una CSR

### Descripción

**openssl_csr_get_subject**([OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)|[string](#language.types.string) $csr, [bool](#language.types.boolean) $short_names = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

**openssl_csr_get_subject()** retorna las informaciones sobre el
nombre distintivo del sujeto codificado en el csr,
incluyendo los campos commonName (CN), organizationName (O), countryName (C) etc.

### Parámetros

csr

        Ver los [parámetros CSR](#openssl.certparams) para obtener una lista de los valores válidos.






     short_names


       short_names controla cómo los datos son indexados
       en el array - si short_names es **[true](#constant.true)** (por omisión)
       entonces los campos serán indexados con la forma corta del nombre, de lo contrario
       el nombre completo será utilizado - por ejemplo: CN es la forma corta de commonName.





### Valores devueltos

Retorna un [array](#language.types.array) asociativo con las descripciones de los sujetos,
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       csr ahora acepta una instancia de
       [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_csr_get_subject()**

&lt;?php
$subject = array(
    "countryName" =&gt; "CA",
    "stateOrProvinceName" =&gt; "Alberta",
    "localityName" =&gt; "Calgary",
    "organizationName" =&gt; "XYZ Widgets Inc",
    "organizationalUnitName" =&gt; "PHP Documentation Team",
    "commonName" =&gt; "Wez Furlong",
    "emailAddress" =&gt; "wez@example.com",
);
$private_key = openssl_pkey_new(array(
"private_key_bits" =&gt; 2048,
"private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));
$configargs = array(
    'digest_alg' =&gt; 'sha512WithRSAEncryption'
);
$csr = openssl_csr_new($subject, $privkey, $configargs);
print_r(openssl_csr_get_subject($csr));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[C] =&gt; CA
[ST] =&gt; Alberta
[L] =&gt; Calgary
[O] =&gt; XYZ Widgets Inc
[OU] =&gt; PHP Documentation Team
[CN] =&gt; Wez Furlong
[emailAddress] =&gt; wez@example.com
)

### Ver también

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_get_public_key()](#function.openssl-csr-get-public-key) - Devuelve la clave pública de un CSR

    - [openssl_x509_parse()](#function.openssl-x509-parse) - Analiza un certificado X509

# openssl_csr_new

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_csr_new — Genera una CSR

### Descripción

**openssl_csr_new**(
    [array](#language.types.array) $distinguished_names,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[OpenSSLAsymmetricKey](#class.opensslasymmetrickey) &amp;$private_key,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $extra_attributes = **[null](#constant.null)**
): [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)|[bool](#language.types.boolean)

**openssl_csr_new()** genera una nueva CSR
(requisición de firma de certificado), basada en la información proporcionada por distinguished_names.

**Nota**:

    Debe existir un archivo openssl.cnf válido e
    instalado para que esta función opere correctamente.
    Ver las notas encontradas en la [sección
    concerniente a la instalación](#openssl.installation) para más información.

### Parámetros

     distinguished_names


       El nombre distintivo (Distinguished Name) o los campos del sujeto a incluir
       en el certificado. El distinguished_names es
       un array asociativo cuyas claves representan los nombres de atributos
       de los Distinguished Names, y los valores pueden ser cadenas
       (para un valor único) o arrays (si se deben definir varios valores).






     private_key


       private_key debe ser una clave privada que haya sido
       generada por [openssl_pkey_new()](#function.openssl-pkey-new) (u obtenida de otro modo
       mediante alguna de las funciones de la familia openssl_pkey), o la variable **[null](#constant.null)**.
       Si su valor es una variable **[null](#constant.null)**, se genera una nueva clave privada
       según las options proporcionadas y se asigna a la variable
       suministrada. La parte pública correspondiente de la clave se utilizará
       para firmar la CSR.






     options


       Por omisión, se utiliza el archivo openssl.conf del sistema
       para inicializar la requisición; puede especificarse una sección
       del archivo de configuración configurando la clave config_section_section en
       options. También puede especificarse un archivo de
       configuración alternativo de OpenSSL configurando el valor de
       config con la ruta del archivo a utilizar.
       Si las claves siguientes están presentes en options, se
       comportan como sus equivalentes en openssl.conf, según la
       lista siguiente.



        <caption>**Sobrescribir configuración**</caption>



           options
           tipo
           Equivalente de openssl.conf
           descripción






           digest_alg
           [string](#language.types.string)
           default_md
           Método de digest o firma de hash, generalmente uno de [openssl_get_md_methods()](#function.openssl-get-md-methods)



           x509_extensions
           [string](#language.types.string)
           x509_extensions
           Selecciona qué extensión utilizar al crear un certificado x509



           req_extensions
           [string](#language.types.string)
           req_extensions
           Selecciona qué extensión utilizar al crear una CSR



           private_key_bits
           [int](#language.types.integer)
           default_bits
           Especifica la longitud en bits de la clave privada



           private_key_type
           [int](#language.types.integer)
           none
           Especifica el tipo de clave privada a crear. Puede ser uno
            de **[OPENSSL_KEYTYPE_DSA](#constant.openssl-keytype-dsa)**,
            **[OPENSSL_KEYTYPE_DH](#constant.openssl-keytype-dh)**,
            **[OPENSSL_KEYTYPE_RSA](#constant.openssl-keytype-rsa)** o
            **[OPENSSL_KEYTYPE_EC](#constant.openssl-keytype-ec)**.
            El valor por omisión es **[OPENSSL_KEYTYPE_RSA](#constant.openssl-keytype-rsa)**.




           encrypt_key
           [bool](#language.types.boolean)
           encrypt_key
           ¿Debe estar cifrada la clave (con contraseña) exportada?



           encrypt_key_cipher
           [int](#language.types.integer)
           none

            Una de las [constantes cipher](#openssl.ciphers).




           curve_name
           [string](#language.types.string)
           none

            Uno de [openssl_get_curve_names()](#function.openssl-get-curve-names).




           config
           [string](#language.types.string)
           N/A

            Ruta hacia su archivo openssl.conf alternativo.











     extra_attributes


       extra_attributes se utiliza para especificar
       atributos adicionales para la CSR. Se trata de un array asociativo
       cuyas claves se convierten en OID y se aplican como atributos
       de CSR.





### Valores devueltos

Devuelve la CSR en caso de éxito, **[true](#constant.true)** si
la creación de la CSR tiene éxito pero falla la firma o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El array asociativo distinguished_names ahora
       admite arrays como valores, permitiendo especificar varios
       valores para un mismo atributo.




      8.4.0

       El parámetro extra_attributes ahora define
       correctamente los atributos del CSR, en lugar de modificar el nombre distintivo
       del sujeto como hacía anteriormente de forma incorrecta.




      8.0.0

       csr ahora acepta una instancia de
       [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.




      8.0.0

       En caso de éxito, esta función ahora devuelve una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) ; anteriormente se devolvía una
       [resource](#language.types.resource) de tipo OpenSSL key.




      7.1.0

       options ahora admite curve_name.



### Ejemplos

    **Ejemplo #1 Creación de un certificado autosignado**

&lt;?php
// para certificados SSL de servidor, el commonName es el nombre de dominio a proteger
// para certificados de correo electrónico S/MIME el commonName es el propietario de la dirección de correo
// los campos de ubicación e identificación hacen referencia al propietario del dominio o al objeto del correo a proteger
$dn = array(
"countryName" =&gt; "GB",
"stateOrProvinceName" =&gt; "Somerset",
"localityName" =&gt; "Glastonbury",
"organizationName" =&gt; "The Brain Room Limited",
"organizationalUnitName" =&gt; "PHP Documentation Team",
"commonName" =&gt; "Wez Furlong",
"emailAddress" =&gt; "wez@example.com"
);

// Genera un nuevo par de claves privada (y pública)
$privkey = openssl_pkey_new(array(
"private_key_bits" =&gt; 2048,
"private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));

// Genera una requisición de firma de certificado
$csr = openssl_csr_new($dn, $privkey, array('digest_alg' =&gt; 'sha256'));

// Genera un certificado autosignado, válido durante 365 días
$x509 = openssl_csr_sign($csr, null, $privkey, $days=365, array('digest_alg' =&gt; 'sha256'));

// Guarde su clave privada, CSR y certificado autosignado para uso posterior
openssl_csr_export($csr, $csrout) and var_dump($csrout);
openssl_x509_export($x509, $certout) and var_dump($certout);
openssl_pkey_export($privkey, $pkeyout, "mypassword") and var_dump($pkeyout);

// Muestra los errores que han ocurrido
while (($e = openssl_error_string()) !== false) {
echo $e . "\n";
}
?&gt;

    **Ejemplo #2 Crear un certificado ECC autosignado (a partir de PHP 7.1.0)**

&lt;?php
$subject = array(
"commonName" =&gt; "docs.php.net",
);

// Genera un nuevo par de claves privada (y pública)
$private_key = openssl_pkey_new(array(
"private_key_type" =&gt; OPENSSL_KEYTYPE_EC,
"curve_name" =&gt; 'prime256v1',
));

// Genera una requisición de firma de certificado
$csr = openssl_csr_new($subject, $private_key, array('digest_alg' =&gt; 'sha384'));

// Genera un certificado EC autosignado
$x509 = openssl_csr_sign($csr, null, $private_key, $days=365, array('digest_alg' =&gt; 'sha384'));
openssl_x509_export_to_file($x509, 'ecc-cert.pem');
openssl_pkey_export_to_file($private_key, 'ecc-private.key');
?&gt;

### Ver también

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_csr_sign

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_csr_sign — Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

### Descripción

**openssl_csr_sign**(
    [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest)|[string](#language.types.string) $csr,
    [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string)|[null](#language.types.null) $ca_certificate,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [int](#language.types.integer) $days,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**,
    [int](#language.types.integer) $serial = 0,
    [?](#language.types.null)[string](#language.types.string) $serial_hex = **[null](#constant.null)**
): [OpenSSLCertificate](#class.opensslcertificate)|[false](#language.types.singleton)

**openssl_csr_sign()** genera un certificado x509 desde el CSR proporcionado.

**Nota**:

    Debe existir un archivo openssl.cnf válido e
    instalado para que esta función opere correctamente.
    Ver las notas encontradas en la [sección
    concerniente a la instalación](#openssl.installation) para más información.

### Parámetros

     csr


       Un CSR generado previamente por [openssl_csr_new()](#function.openssl-csr-new).
       Sin embargo, esto también puede ser la ruta hacia un CSR codificado en formato PEM si se especifica con
       file://path/to/csr o una cadena exportada generada por
       [openssl_csr_export()](#function.openssl-csr-export).






     ca_certificate


       El certificado generado será firmado por el certificado ca_certificate.
       Si ca_certificate es **[null](#constant.null)**, el certificado generado será autosignado.






     private_key


       private_key es la clave privada que corresponde al certificado
       ca_certificate.






     days


       days especifica la duración para la cual el certificado
       es válido, en número de días.






     options


       Se pueden ajustar las opciones de firma CSR con options.
       Consulte la función [openssl_csr_new()](#function.openssl-csr-new) para obtener más información sobre
       options.






     serial


       Un número de serie opcional para el certificado emitido. Si no se especifica,
       tendrá un valor de 0.






     serial_hex


       Una cadena hexadecimal opcional que representa el número de serie del
       certificado emitido. Si se define, tiene prioridad sobre el valor
       del parámetro serial. Si no se especifica
       o se define como **[null](#constant.null)**, se utiliza el valor del parámetro
       serial en su lugar.





### Valores devueltos

Devuelve una instancia de [OpenSSLCertificate](#class.opensslcertificate) en caso de éxito, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se ha añadido el parámetro serial_hex.




      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ; anteriormente se devolvía un
       [resource](#language.types.resource) de tipo OpenSSL X.509.




      8.0.0

       csr ahora acepta una instancia de
       [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest) ;
       anteriormente se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.




      8.0.0

       ca_certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.




      8.0.0

       ca_certificate ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o
       OpenSSL X.509.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_csr_sign()** - firmar una
     CSR (cómo ser su propia Autoridad de Certificación)

&lt;?php
// Supongamos que este script está configurado para recibir CSR que han
// sido pegados en un campo textarea desde otra página
$csrdata = $\_POST["CSR"];

// Vamos a firmar la solicitud con nuestro propio certificado, como
// "autoridad de certificación". Puede utilizarse cualquier certificado para firmar otro,
// pero el proceso es inútil a menos que el certificado de firma tenga la confianza de los usuarios
// que utilizarán el nuevo certificado firmado.

// Necesitamos nuestro certificado y la clave privada
$cacert = "file://path/to/ca.crt";
$privkey = array("file://path/to/ca.key", "la_clave_secreta_de_su_certificado");

$usercert = openssl_csr_sign($csrdata, $cacert, $privkey, 365, array('digest_alg'=&gt;'sha256') );

// Mostramos ahora el certificado generado, de forma que el usuario
// pueda copiarlo/pegarlo en su configuración local (como un
// archivo que contiene los certificados de su servidor SSL)
openssl_x509_export($usercert, $certout);
echo $certout;

// Muestra todos los errores ocurridos
while (($e = openssl_error_string()) !== false) {
echo $e . "\n";
}
?&gt;

# openssl_decrypt

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_decrypt — Descifrar los datos

### Descripción

**openssl_decrypt**(
    [string](#language.types.string) $data,
    [string](#language.types.string) $cipher_algo,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $passphrase,
    [int](#language.types.integer) $options = 0,
    [string](#language.types.string) $iv = "",
    [?](#language.types.null)[string](#language.types.string) $tag = **[null](#constant.null)**,
    [string](#language.types.string) $aad = ""
): [string](#language.types.string)|[false](#language.types.singleton)

Toma una cadena sin tratar o codificada en base64 y la descifra utilizando
el método y la frase de contraseña proporcionados.

### Parámetros

     data


       El mensaje cifrado a descifrar.






     cipher_algo


       El algoritmo de cifrado. Para obtener la lista de algoritmos de cifrado
       disponibles, utilizar [openssl_get_cipher_methods()](#function.openssl-get-cipher-methods).






     passphrase


       La frase de contraseña. Si la frase de contraseña es más corta de lo esperado, se completa silenciosamente
       con caracteres NUL; si la frase de contraseña es más larga de lo esperado,
       se trunca silenciosamente.



      **Precaución**

        No se utiliza ninguna función de derivación de clave para el parámetro passphrase
        como su nombre podría sugerir. La única operación utilizada es el relleno con caracteres
        NUL o la truncación si la longitud es diferente de la esperada.







    options


        El parámetro options puede
        tomar como valor
        **[OPENSSL_RAW_DATA](#constant.openssl-raw-data)** o
        **[OPENSSL_ZERO_PADDING](#constant.openssl-zero-padding)**
        o **[OPENSSL_DONT_ZERO_PAD_KEY](#constant.openssl-dont-zero-pad-key)**.






     iv


       Un vector de inicialización no-**[null](#constant.null)**. Si el VI es más corto de lo esperado, se completa con
       caracteres NUL y se emite un aviso; si la frase de contraseña es más larga
       de lo esperado, se trunca y se emite un aviso.






     tag


       La etiqueta de autenticación en modo de cifrado AEAD. Si es incorrecta, la autenticación falla y la función devuelve **[false](#constant.false)**.



      **Precaución**

        La longitud de tag no es verificada por la función.
        Es responsabilidad del llamador asegurarse de que la longitud del
        tag coincida con la longitud del tag recibido cuando
        [openssl_encrypt()](#function.openssl-encrypt) fue llamada. De lo contrario, el
        descifrado puede tener éxito si el inicio del tag proporcionado coincide con el inicio
        del verdadero tag.







     aad


       Datos adicionales autenticados.





### Valores devueltos

La cadena descifrada en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si se pasa un algoritmo
de cifrado desconocido a través de cipher_algo.

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si se pasa un valor
vacío como parámetro iv.

### Historial de cambios

      Versión
      Descripción






      8.1.0
      tag ahora es nullable.



      7.1.0
      Se añadieron los parámetros tag y aad.


### Ver también

    - [openssl_encrypt()](#function.openssl-encrypt) - Cifra los datos

# openssl_dh_compute_key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_dh_compute_key — Calcula un secreto compartido para un valor público de la clave DH pública remota y la clave DH local

### Descripción

**openssl_dh_compute_key**([string](#language.types.string) $public_key, [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) $private_key): [string](#language.types.string)|[false](#language.types.singleton)

El secreto compartido devuelto por **openssl_dh_compute_key()** se
utiliza a menudo como una clave de cifrado para comunicarse de forma secreta con
una parte remota. Esto es conocido como el intercambio de claves Diffie-Hellman.

**Precaución**

    Es importante utilizar los mismos parámetros DH para los pares de claves locales y remotas; de lo contrario, el
    secreto generado entre las dos partes no coincidirá.

**Nota**:

    ECDH solo es compatible a partir de PHP 8.1.0 *y* OpenSSL 3.0.0.

### Parámetros

     public_key


       Clave DH pública de la parte remota.






     private_key


       Una clave DH privada local, correspondiente a la clave pública a compartir con la parte remota.





### Valores devueltos

Devuelve el secreto compartido en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key.



### Ejemplos

    **Ejemplo #1 Calcular un secreto compartido**



     Primero, se genera localmente un par de claves DH pública/privada y se solicita a la parte remota que haga lo mismo. Se debe utilizar
     la utilidad de línea de comandos openssl

# generar un par de claves privada/pública

openssl dhparam -out dhparam.pem 2048
openssl genpkey -paramfile dhparam.pem -out privatekey.pem

# extraer solo la clave pública

openssl pkey -in privatekey.pem -pubout -out publickey.pem

     Ahora, envíe su clave pública a la parte remota. Utilice el comando openssl pkey para mostrar la clave pública que le
     será enviada por la parte remota.

openssl pkey -pubin -in remotepublickey.pem -text -noout

    Resultado del ejemplo anterior es similar a:

PKCS#3 DH Public-Key: (2048 bit)
public-key:
67:e5:e5:fa:e0:7b:0f:96:2c:dc:96:44:5f:50:02:
9e:8d:c2:6c:04:68:b0:d1:1d:75:66:fc:63:f5:e3:
42:30:b8:96:c1:45:cc:08:60:b4:21:3b:dd:ee:66:
88:db:77:d9:1e:11:89:d4:5c:f2:7a:f2:f1:fe:1c:
77:9d:6f:13:b8:b2:56:00:ef:cb:3b:60:79:74:02:
98:f5:f9:8e:3e:b5:62:08:de:ca:8c:c3:40:4a:80:
79:d5:43:06:17:a8:19:56:af:cc:95:5e:e2:32:2d:
d2:14:7b:76:5a:9a:f1:3c:76:76:35:cc:7b:c1:a5:
f4:39:e5:b6:ca:71:3f:7c:3f:97:e5:ab:86:c1:cd:
0e:e6:ee:04:c9:e6:2d:80:7e:59:c0:49:eb:b6:64:
4f:a8:f9:bb:a3:87:b3:3d:76:01:9e:2b:16:94:a4:
37:30:fb:35:e2:63:be:23:90:b9:ef:3f:46:46:04:
94:8f:60:79:7a:51:55:d6:1a:1d:f5:d9:7f:4a:3e:
aa:ac:b0:d0:82:cc:c2:e0:94:e0:54:c1:17:83:0b:
74:08:4d:5a:79:ae:ff:7f:1c:04:ab:23:39:4a:ae:
87:83:55:43:ab:7a:7c:04:9d:20:80:bb:af:5f:16:
a3:e3:20:b9:21:47:8c:f8:7f:a8:60:80:9e:61:77:
36
[...abbreviated...]

     Utilizar esta clave pública como argumento para **openssl_dh_compute_key()**
     para calcular el secreto compartido.

&lt;?php
$remote_public_key = '67e5e5fae07b0f962cdc96445f50029e8dc26c0468b0d11d7566fc63f5e34230b896c145cc0860b4213bddee6688db77d91e1189d45cf27af2f1fe1c779d6f13b8b25600efcb3b6079740298f5f98e3eb56208deca8cc3404a8079d5430617a81956afcc955ee2322dd2147b765a9af13c767635cc7bc1a5f439e5b6ca713f7c3f97e5ab86c1cd0ee6ee04c9e62d807e59c049ebb6644fa8f9bba387b33d76019e2b1694a43730fb35e263be2390b9ef3f464604948f60797a5155d61a1df5d97f4a3eaaacb0d082ccc2e094e054c117830b74084d5a79aeff7f1c04ab23394aae87835543ab7a7c049d2080bbaf5f16a3e320b921478cf87fa860809e617736';

$local_priv_key = openssl_pkey_get_private('file://privatekey.pem');

$shared_secret = openssl_dh_compute_key(hex2bin($remote_public_key), $local_priv_key);
echo bin2hex($shared_secret)."\n";
?&gt;

    **Ejemplo #2 Generar un par de claves DH pública/privada en PHP**


    Primero, generar el número primo DH

openssl dhparam -out dhparam.pem 2048
openssl dh -in dhparam.pem -noout -text

    Resultado del ejemplo anterior es similar a:

PKCS#3 DH Parameters: (2048 bit)
prime:
00:a3:25:1e:73:3f:44:b9:2b:ee:f4:9d:9f:37:6a:
4b:fd:1d:bd:f4:af:da:c8:10:77:59:41:c6:5f:73:
d2:88:29:39:cd:1c:5f:c3:9f:0f:22:d2:9c:20:c1:
e4:c0:18:03:b8:b6:d8:da:ad:3b:39:a6:da:8e:fe:
12:30:e9:03:5d:22:ba:ef:18:d2:7b:69:f9:5b:cb:
78:c6:0c:8c:6b:f2:49:92:c2:49:e0:45:77:72:b3:
55:36:30:f2:40:17:89:18:50:03:fa:2d:54:7a:7f:
34:4c:73:32:b6:88:14:51:14:be:80:57:95:e6:a3:
f6:51:ff:17:47:4f:15:d6:0e:6c:47:53:72:2c:2a:
4c:21:cb:7d:f3:49:97:c9:47:5e:40:33:7b:99:52:
7e:7a:f3:52:27:80:de:1b:26:6b:40:bb:14:11:0b:
fb:e6:d8:2f:cf:a0:06:2f:96:b9:1c:0b:b4:cb:d3:
a6:62:9c:48:67:f6:81:f2:c6:ff:45:03:0a:9d:67:
9d:ce:27:d9:6b:48:5d:ca:fb:c2:5d:84:9b:8b:cb:
40:c7:a4:0c:8a:6e:f4:ab:ba:b6:10:c3:b8:25:4d:
cf:60:96:f4:db:e8:00:1c:58:47:7a:fb:51:86:d1:
22:d7:4e:94:31:7a:d5:da:3d:53:de:da:bb:64:8d:
62:6b
generator: 2 (0x2)

     El número primo y los valores del generador se pasan como
     p y q en [openssl_pkey_new()](#function.openssl-pkey-new)

&lt;?php
$configargs = array();
$configargs['p'] = hex2bin('00a3251e733f44b92beef49d9f376a4bfd1dbdf4afdac810775941c65f73d2882939cd1c5fc39f0f22d29c20c1e4c01803b8b6d8daad3b39a6da8efe1230e9035d22baef18d27b69f95bcb78c60c8c6bf24992c249e0457772b3553630f2401789185003fa2d547a7f344c7332b688145114be805795e6a3f651ff17474f15d60e6c4753722c2a4c21cb7df34997c9475e40337b99527e7af3522780de1b266b40bb14110bfbe6d82fcfa0062f96b91c0bb4cbd3a6629c4867f681f2c6ff45030a9d679dce27d96b485dcafbc25d849b8bcb40c7a40c8a6ef4abbab610c3b8254dcf6096f4dbe8001c58477afb5186d122d74e94317ad5da3d53dedabb648d626b');
$configargs['g'] = hex2bin('02');
$private_key = openssl_pkey_new(array('dh' =&gt; $configargs));
openssl_pkey_export_to_file($private_key,'privatekey.pem',$passphrase='y0urp@s5phr@se');

$details = openssl_pkey_get_details($private_key);
$local_pub_key = $details['dh']['pub_key'];
echo bin2hex($local_pub_key)."\n";
// puede enviar su clave pública a la parte remota

$details = openssl_pkey_get_details(openssl_pkey_get_public("file://remotepublickey.pem"));
$remote_public_key = $details['dh']['pub_key'];
$shared_secret = openssl_dh_compute_key($remote_public_key, $private_key);
echo bin2hex($shared_secret)."\n";
?&gt;

### Ver también

    - [openssl_pkey_new()](#function.openssl-pkey-new) - Genera una nueva clave privada

    - [openssl_pkey_get_details()](#function.openssl-pkey-get-details) - Devuelve un array que contiene los detalles de la clave

    - [openssl_pkey_get_private()](#function.openssl-pkey-get-private) - Lee una clave privada

    - [openssl_pkey_get_public()](#function.openssl-pkey-get-public) - Extrae una clave pública de un certificado y la prepara

# openssl_digest

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_digest — Calcula un digest

### Descripción

**openssl_digest**([string](#language.types.string) $data, [string](#language.types.string) $digest_algo, [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Calcula un hash digest para los datos de entrada utilizando el método proporcionado.
Devuelve un string bruto o hexadecimal.

### Parámetros

     data


       Los datos.






     digest_algo


       El método digest a utilizar, por ejemplo "SHA256". Consulte
       [openssl_get_md_methods()](#function.openssl-get-md-methods) para obtener la lista de
       métodos de digest disponibles.






     binary


       Pase a **[true](#constant.true)** y se devolverá un dato bruto, de lo contrario el valor devuelto
       será hexadecimal.





### Valores devueltos

Devuelve el valor en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si se pasa un algoritmo desconocido
al argumento digest_algo.

### Ver también

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

# openssl_encrypt

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_encrypt — Cifra los datos

### Descripción

**openssl_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $data,
    [string](#language.types.string) $cipher_algo,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $passphrase,
    [int](#language.types.integer) $options = 0,
    [string](#language.types.string) $iv = "",
    [string](#language.types.string) &amp;$tag = **[null](#constant.null)**,
    [string](#language.types.string) $aad = "",
    [int](#language.types.integer) $tag_length = 16
): [string](#language.types.string)|[false](#language.types.singleton)

Cifra los datos pasados con el método y la frase de contraseña especificados. Devuelve un
[string](#language.types.string) bruto o codificado en base64.

### Parámetros

     data


       Los datos del mensaje en texto bruto a cifrar.






     cipher_algo


       El método de cifrado. Para una lista de los métodos de cifrado disponibles,
       utilizar [openssl_get_cipher_methods()](#function.openssl-get-cipher-methods).






     passphrase


       La frase de contraseña. Si la frase de contraseña es más corta de lo esperado, se rellena silenciosamente
       con caracteres NUL; si la frase de contraseña es más larga de lo esperado, se trunca silenciosamente.



      **Precaución**

        No se utiliza ninguna función de derivación de clave para el parámetro passphrase
        como su nombre podría sugerir. La única operación utilizada es el relleno con caracteres
        NUL o la truncación si la longitud es diferente de la esperada.







     options


       options es una disyunción a nivel de bits de los flags
       **[OPENSSL_RAW_DATA](#constant.openssl-raw-data)** y
       **[OPENSSL_ZERO_PADDING](#constant.openssl-zero-padding)**
       o **[OPENSSL_DONT_ZERO_PAD_KEY](#constant.openssl-dont-zero-pad-key)**.






     iv


       Un vector de inicialización no-**[null](#constant.null)**. Si el IV es más corto de lo esperado, se completa con
       caracteres NUL y se emite un aviso; si la frase de contraseña es más larga
       de lo esperado, se trunca y se emite un aviso.






     tag


       La etiqueta de autenticación pasada por referencia al utilizar el modo
       de cifrado AEAD (GCM o CCM).






     aad


       Datos adicionales autenticados.






     tag_length


       La longitud de la tag de autenticación.
       Su valor puede estar entre 4 y 16 para el modo GCM.





### Valores devueltos

Devuelve la cadena cifrada en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si se pasa un algoritmo de cifrado
desconocido como parámetro cipher_algo.

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si se pasa un valor
vacío como parámetro iv.

### Historial de cambios

      Versión
      Descripción






      7.1.0
      Se añadieron los parámetros tag, aad y tag_length.


### Ejemplos

    **Ejemplo #1 Ejemplo de cifrado autenticado AES en modo GCM para PHP 7.1+**

&lt;?php
//$key debería ser generado previamente de manera criptográfica, tal como openssl_random_pseudo_bytes
$plaintext = "message to be encrypted";
$cipher = "aes-128-gcm";
if (in_array($cipher, openssl_get_cipher_methods()))
{
$ivlen = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
    //guardar $cipher, $iv, y $tag para el descifrado posterior
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
echo $original_plaintext."\n";
}
?&gt;

    **Ejemplo #2 Ejemplo de cifrado autenticado AES en modo GCM anterior a PHP 7.1**

&lt;?php
//$key debería ser generado previamente de manera criptográfica, tal como openssl_random_pseudo_bytes
$plaintext = "message to be encrypted";
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

// descifrar más tarde ...
$c = base64_decode($ciphertext);
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = substr($c, 0, $ivlen);
$hmac = substr($c, $ivlen, $sha2len=32);
$ciphertext_raw = substr($c, $ivlen+$sha2len);
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
if (hash_equals($hmac, $calcmac))// comparación segura contra ataques de tiempo
{
echo $original_plaintext."\n";
}
?&gt;

### Ver también

    - [openssl_decrypt()](#function.openssl-decrypt) - Descifrar los datos

# openssl_error_string

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_error_string — Retorna el mensaje de error OpenSSL

### Descripción

**openssl_error_string**(): [string](#language.types.string)|[false](#language.types.singleton)

**openssl_error_string()** retorna el último error de
la biblioteca OpenSSL. Los mensajes de error son puestos en cola, y la función
**openssl_error_string()** debe ser llamada varias veces para mostrar
todos los errores. El último error será el más reciente en esta cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna un mensaje de error, en forma de [string](#language.types.string), o **[false](#constant.false)**
si no hay más mensajes que mostrar.

### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_error_string()**

&lt;?php
// Supongamos que se ha llamado a una función que ha generado un error
while ($msg = openssl_error_string())
echo $msg . "&lt;br /&gt;\n";
?&gt;

# openssl_free_key

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_free_key — Libera los recursos

### Descripción

[#[\Deprecated]](class.deprecated.html)
**openssl_free_key**([OpenSSLAsymmetricKey](#class.opensslasymmetrickey) $key): [void](language.types.void.html)

**openssl_free_key()** libera las claves
asociadas a key de la memoria.

### Parámetros

     key







### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función es ahora obsoleta ya que no tiene ningún efecto.




      8.0.0

       key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key.



# openssl_get_cert_locations

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

openssl_get_cert_locations — Obtener las ubicaciones de certificados disponibles

### Descripción

**openssl_get_cert_locations**(): [array](#language.types.array)

**openssl_get_cert_locations()** devuelve un array con
información sobre la ubicaciones de certificados disponibles donde buscar
certificados SSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con las ubicaciones de certificados disponibles.

### Ejemplos

    **Ejemplo #1 Ejemplo de openssl_get_cert_locations()**

&lt;?php
var_dump(openssl_get_cert_locations());
?&gt;

    El ejemplo anterior mostrará:

array(8) {
["default_cert_file"]=&gt;
string(21) "/usr/lib/ssl/cert.pem"
["default_cert_file_env"]=&gt;
string(13) "SSL_CERT_FILE"
["default_cert_dir"]=&gt;
string(18) "/usr/lib/ssl/certs"
["default_cert_dir_env"]=&gt;
string(12) "SSL_CERT_DIR"
["default_private_dir"]=&gt;
string(20) "/usr/lib/ssl/private"
["default_default_cert_area"]=&gt;
string(12) "/usr/lib/ssl"
["ini_cafile"]=&gt;
string(0) ""
["ini_capath"]=&gt;
string(0) ""
}

# openssl_get_cipher_methods

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_get_cipher_methods — Obtiene la lista de métodos de cifrado disponibles

### Descripción

**openssl_get_cipher_methods**([bool](#language.types.boolean) $aliases = **[false](#constant.false)**): [array](#language.types.array)

Obtiene la lista de métodos de cifrado disponibles.

### Parámetros

     aliases


       Pásese **[true](#constant.true)** si se desea que los alias de los métodos de cifrado
       sean incluidos en el array devuelto.





### Valores devueltos

Un [array](#language.types.array) de los métodos de cifrado disponibles.
Cabe señalar que antes de OpenSSL 1.1.1, los métodos de cifrado
se devolvían en mayúsculas y minúsculas; a partir de OpenSSL 1.1.1
solo se devuelve la variante en minúsculas.

### Ejemplos

    **Ejemplo #1 Ejemplo openssl_get_cipher_methods()**



     Muestra cómo son los ciphers disponibles, así como los alias
     disponibles.

&lt;?php
$ciphers             = openssl_get_cipher_methods();
$ciphers_and_aliases = openssl_get_cipher_methods(true);
$cipher_aliases      = array_diff($ciphers_and_aliases, $ciphers);

//ECB mode should be avoided
$ciphers = array_filter( $ciphers, function($n) { return stripos($n,"ecb")===FALSE; } );

//At least as early as Aug 2016, Openssl declared the following weak: RC2, RC4, DES, 3DES, MD5 based
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"des")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc2")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc4")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"md5")===FALSE; } );
$cipher_aliases = array_filter($cipher_aliases,function($c) { return stripos($c,"des")===FALSE; } );
$cipher_aliases = array_filter($cipher_aliases,function($c) { return stripos($c,"rc2")===FALSE; } );

print_r($ciphers);
print_r($cipher_aliases);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; aes-128-cbc
[1] =&gt; aes-128-cbc-hmac-sha1
[2] =&gt; aes-128-cbc-hmac-sha256
[3] =&gt; aes-128-ccm
[4] =&gt; aes-128-cfb
[5] =&gt; aes-128-cfb1
[6] =&gt; aes-128-cfb8
[7] =&gt; aes-128-ctr
[9] =&gt; aes-128-gcm
[10] =&gt; aes-128-ocb
[11] =&gt; aes-128-ofb
[12] =&gt; aes-128-xts
[13] =&gt; aes-192-cbc
[14] =&gt; aes-192-ccm
[15] =&gt; aes-192-cfb
[16] =&gt; aes-192-cfb1
[17] =&gt; aes-192-cfb8
[18] =&gt; aes-192-ctr
[20] =&gt; aes-192-gcm
[21] =&gt; aes-192-ocb
[22] =&gt; aes-192-ofb
[23] =&gt; aes-256-cbc
[24] =&gt; aes-256-cbc-hmac-sha1
[25] =&gt; aes-256-cbc-hmac-sha256
[26] =&gt; aes-256-ccm
[27] =&gt; aes-256-cfb
[28] =&gt; aes-256-cfb1
[29] =&gt; aes-256-cfb8
[30] =&gt; aes-256-ctr
[32] =&gt; aes-256-gcm
[33] =&gt; aes-256-ocb
[34] =&gt; aes-256-ofb
[35] =&gt; aes-256-xts
[36] =&gt; aria-128-cbc
[37] =&gt; aria-128-ccm
[38] =&gt; aria-128-cfb
[39] =&gt; aria-128-cfb1
[40] =&gt; aria-128-cfb8
[41] =&gt; aria-128-ctr
[43] =&gt; aria-128-gcm
[44] =&gt; aria-128-ofb
[45] =&gt; aria-192-cbc
[46] =&gt; aria-192-ccm
[47] =&gt; aria-192-cfb
[48] =&gt; aria-192-cfb1
[49] =&gt; aria-192-cfb8
[50] =&gt; aria-192-ctr
[52] =&gt; aria-192-gcm
[53] =&gt; aria-192-ofb
[54] =&gt; aria-256-cbc
[55] =&gt; aria-256-ccm
[56] =&gt; aria-256-cfb
[57] =&gt; aria-256-cfb1
[58] =&gt; aria-256-cfb8
[59] =&gt; aria-256-ctr
[61] =&gt; aria-256-gcm
[62] =&gt; aria-256-ofb
[63] =&gt; bf-cbc
[64] =&gt; bf-cfb
[66] =&gt; bf-ofb
[67] =&gt; camellia-128-cbc
[68] =&gt; camellia-128-cfb
[69] =&gt; camellia-128-cfb1
[70] =&gt; camellia-128-cfb8
[71] =&gt; camellia-128-ctr
[73] =&gt; camellia-128-ofb
[74] =&gt; camellia-192-cbc
[75] =&gt; camellia-192-cfb
[76] =&gt; camellia-192-cfb1
[77] =&gt; camellia-192-cfb8
[78] =&gt; camellia-192-ctr
[80] =&gt; camellia-192-ofb
[81] =&gt; camellia-256-cbc
[82] =&gt; camellia-256-cfb
[83] =&gt; camellia-256-cfb1
[84] =&gt; camellia-256-cfb8
[85] =&gt; camellia-256-ctr
[87] =&gt; camellia-256-ofb
[88] =&gt; cast5-cbc
[89] =&gt; cast5-cfb
[91] =&gt; cast5-ofb
[92] =&gt; chacha20
[93] =&gt; chacha20-poly1305
[111] =&gt; id-aes128-CCM
[112] =&gt; id-aes128-GCM
[113] =&gt; id-aes128-wrap
[114] =&gt; id-aes128-wrap-pad
[115] =&gt; id-aes192-CCM
[116] =&gt; id-aes192-GCM
[117] =&gt; id-aes192-wrap
[118] =&gt; id-aes192-wrap-pad
[119] =&gt; id-aes256-CCM
[120] =&gt; id-aes256-GCM
[121] =&gt; id-aes256-wrap
[122] =&gt; id-aes256-wrap-pad
[124] =&gt; idea-cbc
[125] =&gt; idea-cfb
[127] =&gt; idea-ofb
[137] =&gt; seed-cbc
[138] =&gt; seed-cfb
[140] =&gt; seed-ofb
[141] =&gt; sm4-cbc
[142] =&gt; sm4-cfb
[143] =&gt; sm4-ctr
[145] =&gt; sm4-ofb
)
Array
(
[36] =&gt; aes128
[37] =&gt; aes128-wrap
[38] =&gt; aes192
[39] =&gt; aes192-wrap
[40] =&gt; aes256
[41] =&gt; aes256-wrap
[69] =&gt; aria128
[70] =&gt; aria192
[71] =&gt; aria256
[72] =&gt; bf
[77] =&gt; blowfish
[99] =&gt; camellia128
[100] =&gt; camellia192
[101] =&gt; camellia256
[102] =&gt; cast
[103] =&gt; cast-cbc
[146] =&gt; idea
[164] =&gt; seed
[169] =&gt; sm4
)

### Ver también

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

# openssl_get_curve_names

(PHP 7 &gt;= 7.1.0, PHP 8)

openssl_get_curve_names — Obtiene la lista de nombres de curvas disponibles para ECC

### Descripción

**openssl_get_curve_names**(): [array](#language.types.array)|[false](#language.types.singleton)

Obtiene la lista de nombres de curvas disponibles para su uso en
la criptografía de curva elíptica (ECC) para las operaciones de
clave pública/privada. Las dos curvas más ampliamente
estandarizadas/soportadas son _prime256v1_
(NIST P-256) y _secp384r1_ (NIST P-384).

    <caption>**Equivalencias aproximadas de tamaños de claves de AES, RSA, DSA y ECC**</caption>



       Tamaño de clave simétrica AES (Bits)
       Tamaño de clave RSA y DSA (Bits)
       Tamaño de clave ECC (Bits)






       80
       1024
       160



       112
       2048
       224



       128
       3072
       256



       192
       7680
       384



       256
       15360
       512




[» NIST
recomienda utilizar curvas ECC que tengan al menos 256 bits](http://dx.doi.org/10.6028/NIST.SP.800-57pt1r4).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) de los nombres de curvas disponibles, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_get_curve_names()**

&lt;?php
$curve_names = openssl_get_curve_names();
print_r($curve_names);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; secp112r1
[1] =&gt; secp112r2
[2] =&gt; secp128r1
[3] =&gt; secp128r2
[4] =&gt; secp160k1
[5] =&gt; secp160r1
[6] =&gt; secp160r2
[7] =&gt; secp192k1
[8] =&gt; secp224k1
[9] =&gt; secp224r1
[10] =&gt; secp256k1
[11] =&gt; secp384r1
[12] =&gt; secp521r1
[13] =&gt; prime192v1
[14] =&gt; prime192v2
[15] =&gt; prime192v3
[16] =&gt; prime239v1
[17] =&gt; prime239v2
[18] =&gt; prime239v3
[19] =&gt; prime256v1
[20] =&gt; sect113r1
[21] =&gt; sect113r2
[22] =&gt; sect131r1
[23] =&gt; sect131r2
[24] =&gt; sect163k1
[25] =&gt; sect163r1
[26] =&gt; sect163r2
[27] =&gt; sect193r1
[28] =&gt; sect193r2
[29] =&gt; sect233k1
[30] =&gt; sect233r1
[31] =&gt; sect239k1
[32] =&gt; sect283k1
[33] =&gt; sect283r1
[34] =&gt; sect409k1
[35] =&gt; sect409r1
[36] =&gt; sect571k1
[37] =&gt; sect571r1
[38] =&gt; c2pnb163v1
[39] =&gt; c2pnb163v2
[40] =&gt; c2pnb163v3
[41] =&gt; c2pnb176v1
[42] =&gt; c2tnb191v1
[43] =&gt; c2tnb191v2
[44] =&gt; c2tnb191v3
[45] =&gt; c2pnb208w1
[46] =&gt; c2tnb239v1
[47] =&gt; c2tnb239v2
[48] =&gt; c2tnb239v3
[49] =&gt; c2pnb272w1
[50] =&gt; c2pnb304w1
[51] =&gt; c2tnb359v1
[52] =&gt; c2pnb368w1
[53] =&gt; c2tnb431r1
[54] =&gt; wap-wsg-idm-ecid-wtls1
[55] =&gt; wap-wsg-idm-ecid-wtls3
[56] =&gt; wap-wsg-idm-ecid-wtls4
[57] =&gt; wap-wsg-idm-ecid-wtls5
[58] =&gt; wap-wsg-idm-ecid-wtls6
[59] =&gt; wap-wsg-idm-ecid-wtls7
[60] =&gt; wap-wsg-idm-ecid-wtls8
[61] =&gt; wap-wsg-idm-ecid-wtls9
[62] =&gt; wap-wsg-idm-ecid-wtls10
[63] =&gt; wap-wsg-idm-ecid-wtls11
[64] =&gt; wap-wsg-idm-ecid-wtls12
[65] =&gt; Oakley-EC2N-3
[66] =&gt; Oakley-EC2N-4
[67] =&gt; brainpoolP160r1
[68] =&gt; brainpoolP160t1
[69] =&gt; brainpoolP192r1
[70] =&gt; brainpoolP192t1
[71] =&gt; brainpoolP224r1
[72] =&gt; brainpoolP224t1
[73] =&gt; brainpoolP256r1
[74] =&gt; brainpoolP256t1
[75] =&gt; brainpoolP320r1
[76] =&gt; brainpoolP320t1
[77] =&gt; brainpoolP384r1
[78] =&gt; brainpoolP384t1
[79] =&gt; brainpoolP512r1
[80] =&gt; brainpoolP512t1
)

# openssl_get_md_methods

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_get_md_methods — Obtiene la lista de métodos digest disponibles

### Descripción

**openssl_get_md_methods**([bool](#language.types.boolean) $aliases = **[false](#constant.false)**): [array](#language.types.array)

Obtiene la lista de métodos digest disponibles.

### Parámetros

     aliases


       Pásese **[true](#constant.true)** si se desean incluir los alias de digest en el array devuelto.





### Valores devueltos

Un [array](#language.types.array) de los métodos digest disponibles.

### Ejemplos

    **Ejemplo #1 Ejemplo openssl_get_md_methods()**



     Muestra cómo son los digests disponibles, así como los alias disponibles.

&lt;?php
$digests             = openssl_get_md_methods();
$digests_and_aliases = openssl_get_md_methods(true);
$digest_aliases      = array_diff($digests_and_aliases, $digests);

print_r($digests);

print_r($digest_aliases);

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; DSA
[1] =&gt; DSA-SHA
[2] =&gt; MD2
[3] =&gt; MD4
[4] =&gt; MD5
[5] =&gt; RIPEMD160
[6] =&gt; SHA
[7] =&gt; SHA1
[8] =&gt; SHA224
[9] =&gt; SHA256
[10] =&gt; SHA384
[11] =&gt; SHA512
[12] =&gt; dsaEncryption
[13] =&gt; dsaWithSHA
[14] =&gt; ecdsa-with-SHA1
[15] =&gt; md2
[16] =&gt; md4
[17] =&gt; md5
[18] =&gt; ripemd160
[19] =&gt; sha
[20] =&gt; sha1
[21] =&gt; sha224
[22] =&gt; sha256
[23] =&gt; sha384
[24] =&gt; sha512
)
Array
(
[2] =&gt; DSA-SHA1
[3] =&gt; DSA-SHA1-old
[4] =&gt; DSS1
[9] =&gt; RSA-MD2
[10] =&gt; RSA-MD4
[11] =&gt; RSA-MD5
[12] =&gt; RSA-RIPEMD160
[13] =&gt; RSA-SHA
[14] =&gt; RSA-SHA1
[15] =&gt; RSA-SHA1-2
[16] =&gt; RSA-SHA224
[17] =&gt; RSA-SHA256
[18] =&gt; RSA-SHA384
[19] =&gt; RSA-SHA512
[28] =&gt; dsaWithSHA1
[29] =&gt; dss1
[32] =&gt; md2WithRSAEncryption
[34] =&gt; md4WithRSAEncryption
[36] =&gt; md5WithRSAEncryption
[37] =&gt; ripemd
[39] =&gt; ripemd160WithRSA
[40] =&gt; rmd160
[43] =&gt; sha1WithRSAEncryption
[45] =&gt; sha224WithRSAEncryption
[47] =&gt; sha256WithRSAEncryption
[49] =&gt; sha384WithRSAEncryption
[51] =&gt; sha512WithRSAEncryption
[52] =&gt; shaWithRSAEncryption
[53] =&gt; ssl2-md5
[54] =&gt; ssl3-md5
[55] =&gt; ssl3-sha1
)

### Ver también

    - [openssl_digest()](#function.openssl-digest) - Calcula un digest

    - [openssl_get_cipher_methods()](#function.openssl-get-cipher-methods) - Obtiene la lista de métodos de cifrado disponibles

# openssl_get_privatekey

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_get_privatekey — Alias de [openssl_pkey_get_private()](#function.openssl-pkey-get-private)

### Descripción

Esta función es un alias de:
[openssl_pkey_get_private()](#function.openssl-pkey-get-private).

# openssl_get_publickey

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_get_publickey — Alias de [openssl_pkey_get_public()](#function.openssl-pkey-get-public)

### Descripción

Esta función es un alias de:
[openssl_pkey_get_public()](#function.openssl-pkey-get-public).

# openssl_open

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_open — Abre datos sellados

### Descripción

**openssl_open**(
    [string](#language.types.string) $data,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) &amp;$output,
    [string](#language.types.string) $encrypted_key,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [string](#language.types.string) $cipher_algo,
    [?](#language.types.null)[string](#language.types.string) $iv = **[null](#constant.null)**
): [bool](#language.types.boolean)

La **openssl_open()** abre (descifra) data utilizando una clave de envoltura
que se descifra a partir de encrypted_key utilizando
private_key. La descifrado se realiza mediante
cipher_algo y iv. El IV es requerido únicamente si el
método de cifrado lo exige. La función llena output con los datos
descifrados. La clave de envoltura generalmente se genera cuando los datos son sellados utilizando una clave pública
asociada a la clave privada. Consulte [openssl_seal()](#function.openssl-seal) para más información.

### Parámetros

     data


       Los datos sellados.






     output


       Si la llamada tiene éxito, los datos abiertos son
       devueltos en este parámetro.






     encrypted_key


       La clave simétrica cifrada que puede ser descifrada utilizando private_key






     private_key


       La clave privada utilizada para descifrar encrypted_key.






     cipher_algo


       El método de cifrado utilizado para el descifrado de data.


**Precaución**

         El valor por omisión para las versiones de PHP anteriores a 8.0 es ('RC4'), que es
         considerada como no segura. Se recomienda fuertemente especificar explícitamente un método de cifrado
         seguro.








     iv


       El vector de inicialización utilizado para el descifrado de data. Es requerido
       si el método de cifrado necesita un IV. Esto puede ser determinado llamando
       a [openssl_cipher_iv_length()](#function.openssl-cipher-iv-length) con cipher_algo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509 CSR.




      8.0.0

       cipher_algo ya no es un parámetro opcional.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_open()**

&lt;?php

// Se asume que $sealed, $env_key y $iv contienen los datos sellados,
// la clave de envoltura y el IV. Todos proporcionados por el remitente.

// Obtener la clave privada desde el archivo ubicado en private_key.pem
$pkey = openssl_get_privatekey("file://private_key.pem");

// Descifrado de los datos: se colocan en $open
if (openssl_open($sealed, $open, $env_key, $pkey, 'AES256', $iv)) {
echo "Aquí están los datos descifrados: ", $open;
} else {
echo "No se pudo descifrar los datos";
}

?&gt;

### Ver también

    - [openssl_seal()](#function.openssl-seal) - Sella datos

# openssl_pbkdf2

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

openssl_pbkdf2 — Genera una cadena PKCS5 v2 PBKDF2

### Descripción

**openssl_pbkdf2**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password,
    [string](#language.types.string) $salt,
    [int](#language.types.integer) $key_length,
    [int](#language.types.integer) $iterations,
    [string](#language.types.string) $digest_algo = "sha1"
): [string](#language.types.string)|[false](#language.types.singleton)

**openssl_pbkdf2()** calcula PBKDF2 (Password-Based Key Derivation Function 2),
una función de derivación de clave definida en PKCS5 v2.

### Parámetros

    password


      Contraseña desde la cual se genera la clave derivada.






    salt


      PBKDF2 recomienda un sal criptográfico de al menos 128 bits (16 octetos).






    key_length


      Longitud deseada de la clave de salida.






    iterations


      El número de iteraciones deseado.
      [» El NIST
      recomienda al menos 1 000](https://nvlpubs.nist.gov/nistpubs/Legacy/SP/nistspecialpublication800-132.pdf). A partir de 2023, el OWASP recomienda 600 000 iteraciones para
      PBKDF2-HMAC-SHA256 y 210 000 para PBKDF2-HMAC-SHA512.






    digest_algo


      Algoritmo de hash o digest opcional a partir de [openssl_get_md_methods()](#function.openssl-get-md-methods).
      Por omisión SHA-1. Se recomienda definirlo en SHA-256 o SHA-512.


### Valores devueltos

Devuelve una cadena binaria sin tratar o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_pbkdf2()**

&lt;?php
$password = 'password';
$salt = openssl_random_pseudo_bytes(16);
$keyLength = 20;
$iterations = 600000;
$generated_key = openssl_pbkdf2($password, $salt, $keyLength, $iterations, 'sha256');
echo bin2hex($generated_key)."\n";
echo base64_encode($generated_key)."\n";
?&gt;

### Ver también

    - **hash_pbkdf2()**

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

# openssl_pkcs12_export

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

openssl_pkcs12_export — Exporta un certificado compatible PKCS#12 a una variable

### Descripción

**openssl_pkcs12_export**(
    [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [string](#language.types.string) &amp;$output,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $passphrase,
    [array](#language.types.array) $options = []
): [bool](#language.types.boolean)

**openssl_pkcs12_export()** almacena un certificado
certificate en una cadena denominada
output en un formato PKCS#12.

### Parámetros

x509

        Ver los [parámetros clave/Certificados](#openssl.certparams)
        para una lista de valores válidos.






     output


       En caso de éxito, esta variable contendrá el PKCS#12.






     private_key


       Clave privada del archivo PKCS#12.
       Consulte [Public/Private Key Parameters](#openssl.certparams) para obtener la lista de valores válidos.






     passphrase


       Contraseña de cifrado para desbloquear el archivo PKCS#12.






     options


       Array opcional, las otras claves serán ignoradas.






           Clave
           Descripción






           "extracerts"
           Array de certificados adicionales o de un certificado único a incluir en el archivo PKCS#12.



           "friendly_name"
           cadena a utilizar para el certificado y la clave proporcionados









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.




      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



# openssl_pkcs12_export_to_file

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

openssl_pkcs12_export_to_file — Exporta un certificado compatible con PKCS#12

### Descripción

**openssl_pkcs12_export_to_file**(
    [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [string](#language.types.string) $output_filename,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $passphrase,
    [array](#language.types.array) $options = []
): [bool](#language.types.boolean)

**openssl_pkcs12_export_to_file()** almacena un certificado
certificate en un fichero denominado
output_filename en un formato de fichero PKCS#12.

### Parámetros

x509

        Ver los [parámetros clave/Certificados](#openssl.certparams)
        para una lista de valores válidos.






     output_filename


       Ruta de acceso al fichero de salida.






     private_key


       Clave privada del fichero PKCS#12.
       Ver [parámetros Clave/Certificado](#openssl.certparams)
       para una lista de valores válidos.






     passphrase


       Contraseña de cifrado para desbloquear el fichero PKCS#12.






     options


       Array opcional, las demás claves serán ignoradas.






           Clave
           Descripción






           "extracerts"

            array de certificados adicionales o un certificado único a incluir
            en el fichero PKCS#12.



           "friendly_name"
           [string](#language.types.string) a utilizar para el certificado y la clave proporcionados









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.




      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



# openssl_pkcs12_read

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

openssl_pkcs12_read — Lee un certificado PKCS#12 en un array

### Descripción

**openssl_pkcs12_read**([string](#language.types.string) $pkcs12, [array](#language.types.array) &amp;$certificates, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $passphrase): [bool](#language.types.boolean)

**openssl_pkcs12_read()** lee el certificado PKCS#12 proporcionado por el
argumento pkcs12 en un array denominado certificates.

### Parámetros

     pkcs12


       El contenido del almacén de certificados, no el nombre del fichero.






     certificates


       En caso de éxito, este array contendrá los datos del certificado.






     passphrase


       Frase de contraseña para desencriptar el archivo PKCS#12.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 openssl_pkcs12_read()** example

&lt;?php
if (!$cert_store = file_get_contents("/certs/file.p12")) {
echo "Error: No se pudo leer el fichero de certificado\n";
exit;
}

if (openssl_pkcs12_read($cert_store, $cert_info, "my_secret_pass")) {
    echo "Información del Certificado\n";
    print_r($cert_info);
} else {
echo "Error: No se pudo leer el almacén de certificados.\n";
exit;
}
?&gt;

# openssl_pkcs7_decrypt

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_pkcs7_decrypt — Descifra un mensaje S/MIME

### Descripción

**openssl_pkcs7_decrypt**(
    [string](#language.types.string) $input_filename,
    [string](#language.types.string) $output_filename,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $private_key = **[null](#constant.null)**
): [bool](#language.types.boolean)

Descifra el mensaje S/MIME contenido en el fichero
input_filename, utilizando el certificado y la clave privada asociados por
certificate y private_key.

### Parámetros

     input_filename








     output_filename


       El mensaje descifrado se escribe en el fichero especificado por este argumento.






     certificate








     private_key







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509 CSR.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_pkcs7_decrypt()**

&lt;?php
// $cert y $key contienen sus certificados y claves privadas
// Se asume que el mensaje está dirigido a usted
$infilename = "encrypted.msg"; // este fichero contiene su mensaje cifrado
$outfilename = "decrypted.msg"; // asegúrese de poder escribir en este fichero

if (openssl_pkcs7_decrypt($infilename, $outfilename, $cert, $key)) {
echo "descifrado !";
} else {
echo "Error al descifrar !";
}
?&gt;

# openssl_pkcs7_encrypt

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_pkcs7_encrypt — Cifra un mensaje S/MIME

### Descripción

**openssl_pkcs7_encrypt**(
    [string](#language.types.string) $input_filename,
    [string](#language.types.string) $output_filename,
    [OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $certificate,
    [?](#language.types.null)[array](#language.types.array) $headers,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $cipher_algo = **[OPENSSL_CIPHER_AES_128_CBC](#constant.openssl-cipher-aes-128-cbc)**
): [bool](#language.types.boolean)

**openssl_pkcs7_encrypt()** toma el contenido del fichero
input_filename y lo cifra utilizando un
cifrado RC2 de 40 bits, de manera que el mensaje solo pueda
ser leído por el poseedor de certificate.

### Parámetros

     input_filename








     output_filename








     certificate


       Puede ser un certificado X.509 o un array de certificados X.509.






     headers


       headers es un array de encabezados que serán
       añadidos al inicio del mensaje, una vez que los datos hayan sido
       cifrados.




       headers puede ser un array asociativo, donde
       las claves son los nombres de los encabezados, o bien un array indexado donde cada
       línea contiene un encabezado completo.






     flags


       flags puede ser utilizado para especificar
       opciones que afectarán al cifrado (ver las
       [constantes PKCS7](#openssl.pkcs7.flags)).






     cipher_algo


       Una de las [constantes cipher](#openssl.ciphers).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El algoritmo de cifrado por omisión (cipher_algo)
       es ahora AES-128-CBC (**[OPENSSL_CIPHER_AES_128_CBC](#constant.openssl-cipher-aes-128-cbc)**).
       Anteriormente, se utilizaba PKCS7/CMS (**[OPENSSL_CIPHER_RC2_40](#constant.openssl-cipher-rc2-40)**).




      8.0.0

       certificate acepta ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_pkcs7_encrypt()**

&lt;?php
// el mensaje que se desea cifrar y enviar a su agente secreto
// en misión, llamado "nighthawk". Tiene su certificado
// en el fichero "nighthawk.pem"
$data = &lt;&lt;&lt;EOD
Nighthawk,

Top secret, solo para sus ojos !

El enemigo se acerca! Reúnase en el café a las 8:30,
para su pasaporte falso.

HQ
EOD;

// Carga de la clave
$key = file_get_contents("nighthawk.pem");

// Guardado del mensaje en un fichero
$fp = fopen("msg.txt", "w");
fwrite($fp, $data);
fclose($fp);

// Cifrado del mensaje
if (openssl_pkcs7_encrypt("msg.txt", "enc.txt", $key,
array("To" =&gt; "nighthawk@example.com", // sintaxis en forma de clave
"From: HQ &lt;hq@example.com&gt;", // sintaxis en forma de índice
"Subject" =&gt; "Solo para sus ojos !"))) {
// mensaje cifrado - envíelo !
exec(ini_get("sendmail_path") . " &lt; enc.txt");
}
?&gt;

# openssl_pkcs7_read

(PHP 7 &gt;= 7.2.0, PHP 8)

openssl_pkcs7_read — Exporta el fichero PKCS7 a un array de certificados PEM

### Descripción

**openssl_pkcs7_read**([string](#language.types.string) $data, [array](#language.types.array) &amp;$certificates): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data


      El string de datos que debe ser analizado (en formato p7b).






    certificates


      Un array de certificados PEM desde los datos de entrada p7b.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Obtener un array PEM desde un fichero P7B**

&lt;?php

$file = 'certs.p7b';

$f = file_get_contents($file);
$p7 = array();
$r = openssl_pkcs7_read($f, $p7);

if ($r === false) {
    printf("ERROR: %s no es un fichero p7b válido".PHP_EOL, $file);
        for($e = openssl_error_string(), $i = 0; $e; $e = openssl_error_string(), $i++)
printf("SSL l%d: %s".PHP_EOL, $i, $e);
exit(1);
}

print_r($p7);
?&gt;

### Ver también

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_pkcs7_sign

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_pkcs7_sign — Firma un mensaje S/MIME

### Descripción

**openssl_pkcs7_sign**(
    [string](#language.types.string) $input_filename,
    [string](#language.types.string) $output_filename,
    [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [?](#language.types.null)[array](#language.types.array) $headers,
    [int](#language.types.integer) $flags = **[PKCS7_DETACHED](#constant.pkcs7-detached)**,
    [?](#language.types.null)[string](#language.types.string) $untrusted_certificates_filename = **[null](#constant.null)**
): [bool](#language.types.boolean)

**openssl_pkcs7_sign()** toma el contenido del fichero
input_filename y lo firma utilizando el
certificado y la clave privada contenidos en los argumentos
certificate y private_key.

### Parámetros

     input_filename


       El fichero de entrada que se tiene la intención de firmar digitalmente.






     output_filename


       El fichero donde se escribirá la firma digital.






     certificate


       El certificado X.509 utilizado para firmar digitalmente input_filename.
       Ver [parámetros Clave/Certificado](#openssl.certparams)
       para una lista de valores válidos.






     private_key


       private_key es la clave privada correspondiente a certificate.
       Ver [parámetros Clave Pública/Privada](#openssl.certparams)
       para una lista de valores válidos.






     headers


       headers es un array de encabezados que
       serán añadidos a los datos cifrados (ver la función
       [openssl_pkcs7_encrypt()](#function.openssl-pkcs7-encrypt) para más detalles sobre
       el formato del parámetro).






     flags


       flags puede ser utilizado para modificar la salida.
       Ver las [constantes PKCS7](#openssl.pkcs7.flags).






     untrusted_certificates_filename


       untrusted_certificates_filename especifica el nombre del fichero que contiene
       un conjunto de certificados adicionales a incluir en la
       firma, los cuales podrán ayudar al destinatario a verificar los
       datos que se utilizan.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509 CSR.




      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_pkcs7_sign()**

&lt;?php
// el mensaje que se quiere firmar, para que el destinatario esté seguro de que
// proviene de usted
$data = &lt;&lt;&lt;EOD

Usted está autorizado a gastar 10 000€ en gastos de viaje.

El PDG
EOD;
// guardar el mensaje en un fichero
$fp = fopen("msg.txt", "w");
fwrite($fp, $data);
fclose($fp);
// cifrarlo
if (openssl_pkcs7_sign("msg.txt", "signed.txt", "file://mycert.pem",
array("file://mycert.pem", "mypassphrase"),
array("To" =&gt; "joes@example.com", // sintaxis con clave
"From: HQ &lt;ceo@example.com&gt;", // sintaxis indexada
"Subject" =&gt; "Eyes only")
)) {
// mensaje firmado - ¡envíelo!
exec(ini_get("sendmail_path") . " &lt; signed.txt");
}
?&gt;

# openssl_pkcs7_verify

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_pkcs7_verify — Verifica la firma de un mensaje S/MIME

### Descripción

**openssl_pkcs7_verify**(
    [string](#language.types.string) $input_filename,
    [int](#language.types.integer) $flags,
    [?](#language.types.null)[string](#language.types.string) $signers_certificates_filename = **[null](#constant.null)**,
    [array](#language.types.array) $ca_info = [],
    [?](#language.types.null)[string](#language.types.string) $untrusted_certificates_filename = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $output_filename = **[null](#constant.null)**
): [bool](#language.types.boolean)|[int](#language.types.integer)

**openssl_pkcs7_verify()** lee el mensaje S/MIME contenido
en el fichero filename y examina la firma
digital.

### Parámetros

     input_filename


       Ruta hacia el mensaje.






     flags


       flags sirve para modificar la forma en que se verifica la firma.
       Consulte las [constantes PKCS7](#openssl.pkcs7.flags). Por
       omisión, el valor es: PKCS7_DETACHED.






     signers_certificates_filename


       Si el parámetro signers_certificates_filename es especificado, debe
       ser una cadena que contenga el nombre de un fichero que contiene el certificado
       del firmante, en formato PEM.






     ca_info


       Si el parámetro ca_info es especificado, debe
       contener la información sobre los certificados de confianza de terceros
       utilizados durante la verificación. Consulte
       [verificación de certificados](#openssl.cert.verification)
       para más detalles.






     untrusted_certificates_filename


       Si el parámetro untrusted_certificates_filename es especificado, debe
       representar el nombre de un fichero que contiene un conjunto de
       certificados utilizados como certificados de poca confianza.






     content


       Puede especificarse un nombre de fichero con el parámetro
       content que puede ser rellenado con los datos verificados,
       pero sin las informaciones de firma.






     output_filename








### Valores devueltos

Devuelve **[true](#constant.true)** si la firma es verificada, y **[false](#constant.false)**
en caso contrario (el mensaje ha sido modificado, o bien el certificado de firma es
inválido) o -1 si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       signers_certificates_filename, untrusted_certificates_filename,
       content y output_filename ahora son nullable.




      7.2.0

       Se ha añadido el parámetro output_filename.



### Notas

**Nota**:

    Tal como se especifica en la RFC 2045, las líneas
    no deben ser más largas que 76 caracteres
    en el parámetro input_filename.

# openssl_pkey_derive

(PHP 7 &gt;= 7.3.0, PHP 8)

openssl_pkey_derive — Calcula el secreto compartido para el valor público de la clave DH o ECDH remota y local

### Descripción

**openssl_pkey_derive**([OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $public_key, [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key = ?, [int](#language.types.integer) $key_length = 0): [string](#language.types.string)|[false](#language.types.singleton)

**openssl_pkey_derive()** toma un conjunto de public_key
y private_key y deriva un secreto compartido, para claves DH o EC.

### Parámetros

    public_key


      public_key es la clave pública para la derivación.
      Consulte [Parámetros de clave/certificado](#openssl.certparams) para una lista de valores válidos.






    private_key


      private_key es la clave privada para la derivación.
      Consulte [Parámetros de clave pública/privada](#openssl.certparams) para una lista de valores válidos.






    key_length


      Si no es nulo, intentará establecer la longitud deseada del secreto derivado.



     **Precaución**

       Este parámetro no debe utilizarse, ya que no funciona como se espera. Nunca devuelve un secreto
       más largo que el tamaño del primero. Si la longitud deseada es menor que el tamaño del
       primero, solo trunca la longitud para claves ECDH pero falla para claves DH.





### Valores devueltos

El secreto derivado en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de openssl_pkey_derive()**

&lt;?php
// Carga la clave privada
$priv = openssl_pkey_get_private("-----BEGIN PRIVATE KEY-----
MIICJgIBADCCARcGCSqGSIb3DQEDATCCAQgCggEBAJLxRCaZ933uW+AXmabHFDDy
upojBIRlbmQLJZfigDaSA1f9YOTsIv+WwVFTX/J1mtCyx9uBcz0Nt2kmVwxWuc2f
VtCEMPsmLsVXX7xRUFLpyX1Y1IYGBVXQOoOvLWYQjpZgnx47Pkh1Ok1+smffztfC
0DCNt4KorWrbsPcmqBejXHN79KvWFjZmXOksRiNu/Bn76RiqvofC4z8Ri3kHXQG2
197JGZzzFXHadGC3xbkg8UxsNbYhVMKbm0iANfafUH7/hoS9UjAVQYtvwe7YNiW/
HnyfVCrKwcc7sadd8Iphh+3lf5P1AhaQEAMytanrzq9RDXKBxuvpSJifRYasZYsC
AQIEggEEAoIBAGwAYC2E81Y1U2Aox0U7u1+vBcbht/OO87tutMvc4NTLf6NLPHsW
cPqBixs+3rSn4fADzAIvdLBmogjtiIZoB6qyHrllF/2xwTVGEeYaZIupQH3bMK2b
6eUvnpuu4Ytksiz6VpXBBRMrIsj3frM+zUtnq8vKUr+TbjV2qyKR8l3eNDwzqz30
dlbKh9kIhZafclHfRVfyp+fVSKPfgrRAcLUgAbsVjOjPeJ90xQ4DTMZ6vjiv6tHM
hkSjJIcGhRtSBzVF/cT38GyCeTmiIA/dRz2d70lWrqDQCdp9ArijgnpjNKAAulSY
CirnMsGZTDGmLOHg4xOZ5FEAzZI2sFNLlcw=
-----END PRIVATE KEY-----
");

// Carga la clave pública
$pub = openssl_pkey_get_public("-----BEGIN PUBLIC KEY-----
MIICJDCCARcGCSqGSIb3DQEDATCCAQgCggEBAJLxRCaZ933uW+AXmabHFDDyupoj
BIRlbmQLJZfigDaSA1f9YOTsIv+WwVFTX/J1mtCyx9uBcz0Nt2kmVwxWuc2fVtCE
MPsmLsVXX7xRUFLpyX1Y1IYGBVXQOoOvLWYQjpZgnx47Pkh1Ok1+smffztfC0DCN
t4KorWrbsPcmqBejXHN79KvWFjZmXOksRiNu/Bn76RiqvofC4z8Ri3kHXQG2197J
GZzzFXHadGC3xbkg8UxsNbYhVMKbm0iANfafUH7/hoS9UjAVQYtvwe7YNiW/Hnyf
VCrKwcc7sadd8Iphh+3lf5P1AhaQEAMytanrzq9RDXKBxuvpSJifRYasZYsCAQID
ggEFAAKCAQAiCSBpxvGgsTorxAWtcAlSmzAJnJxFgSPef0g7OjhESytnc8G2QYmx
ovMt5KVergcitztWh08hZQUdAYm4rI+zMlAFDdN8LWwBT/mGKSzRkWeprd8E7mvy
ucqC1YXCMqmIwPySvLQUB/Dl8kgau7BLAnIJm8VP+MVrn8g9gghD0qRCgPgtEaDV
vocfgnOU43rhKnIgO0cHOKtw2qybSFB8QuZrYugq4j8Bwkrzh6rdMMeyMl/ej5Aj
c0wamOzuBDtXt0T9+Fx3khHaowjCc7xJZRgZCxg43SbqMWJ9lUg94I7+LTX61Gyv
dtlkbGbtoDOnxeNnN93gwQZngGYZYciu
-----END PUBLIC KEY-----
");

// Salida de la versión hexadecimal de la clave derivada
echo bin2hex(openssl_pkey_derive($pub,$priv));

# openssl_pkey_export

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_pkey_export — Almacena una representación exportable de la clave en una cadena de caracteres

### Descripción

**openssl_pkey_export**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $key,
    [string](#language.types.string) &amp;$output,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $passphrase = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [bool](#language.types.boolean)

**openssl_pkey_export()** exporta la clave
key en formato de cadena PEM,
y la almacena en la variable output (que se pasa por referencia).

**Nota**:

    Debe existir un archivo openssl.cnf válido e
    instalado para que esta función opere correctamente.
    Ver las notas encontradas en la [sección
    concerniente a la instalación](#openssl.installation) para más información.

### Parámetros

     key








     output








     passphrase


       La clave puede estar protegida por la contraseña passphrase.






     options


       options puede ser utilizado para ajustar el proceso
       de exportación especificando o reemplazando las opciones del archivo
       de configuración de OpenSSL. Consulte [openssl_csr_new()](#function.openssl-csr-new)
       para más información sobre options.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



# openssl_pkey_export_to_file

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_pkey_export_to_file — Guarda una clave en formato ASCII en un fichero

### Descripción

**openssl_pkey_export_to_file**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $key,
    [string](#language.types.string) $output_filename,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $passphrase = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [bool](#language.types.boolean)

**openssl_pkey_export_to_file()** guarda la clave en formato ASCII
(PEM) key en el fichero
output_filename.

**Nota**:

    Debe existir un archivo openssl.cnf válido e
    instalado para que esta función opere correctamente.
    Ver las notas encontradas en la [sección
    concerniente a la instalación](#openssl.installation) para más información.

### Parámetros

     key








     output_filename


       Ruta del fichero de salida.






     passphrase


       La clave puede estar eventualmente protegida por una
       frase de contraseña.






     options


       options puede ser utilizado para ajustar el proceso
       de exportación especificando o reemplazando las opciones del archivo
       de configuración de OpenSSL. Véase [openssl_csr_new()](#function.openssl-csr-new)
       para más información sobre options.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



# openssl_pkey_free

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_pkey_free — Libera una clave privada

### Descripción

[#[\Deprecated]](class.deprecated.html)
**openssl_pkey_free**([OpenSSLAsymmetricKey](#class.opensslasymmetrickey) $key): [void](language.types.void.html)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

Libera una clave privada creada por la función
[openssl_pkey_new()](#function.openssl-pkey-new).

### Parámetros

     key


       Recurso que representa la clave.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función es ahora obsoleta ya que no tiene ningún efecto.




      8.0.0

       key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key.



# openssl_pkey_get_details

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

openssl_pkey_get_details — Devuelve un array que contiene los detalles de la clave

### Descripción

**openssl_pkey_get_details**([OpenSSLAsymmetricKey](#class.opensslasymmetrickey) $key): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve los detalles de la clave (bits, key, type).

### Parámetros

     key


       Recurso que contiene la clave.





### Valores devueltos

Devuelve un array con los detalles de la clave en caso de éxito,
o **[false](#constant.false)** en caso de fallo.
El array devuelto contiene los índices bits (número de bits),
key (representación en forma de [string](#language.types.string) de la clave pública)
y type (tipo de clave que es uno de
**[OPENSSL_KEYTYPE_RSA](#constant.openssl-keytype-rsa)**,
**[OPENSSL_KEYTYPE_DSA](#constant.openssl-keytype-dsa)**,
**[OPENSSL_KEYTYPE_DH](#constant.openssl-keytype-dh)**,
**[OPENSSL_KEYTYPE_EC](#constant.openssl-keytype-ec)**,
**[OPENSSL_KEYTYPE_X25519](#constant.openssl-keytype-x25519)**,
**[OPENSSL_KEYTYPE_ED25519](#constant.openssl-keytype-ed25519)**,
**[OPENSSL_KEYTYPE_X448](#constant.openssl-keytype-x448)**,
**[OPENSSL_KEYTYPE_ED448](#constant.openssl-keytype-ed448)**,
o -1 significando desconocido).

Dependiendo del tipo de claves utilizadas, pueden devolverse detalles adicionales.
Tenga en cuenta que algunos elementos pueden no estar siempre disponibles.

- **[OPENSSL_KEYTYPE_RSA](#constant.openssl-keytype-rsa)**, se devuelve una clave de array adicional llamada "rsa",
  que contiene los datos de la clave.

        Key
        Descripción






        "n"
        módulo



        "e"
        exponente público



        "d"
        exponente privado



        "p"
        número primo 1



        "q"
        número primo 2



        "dmp1"
        exponent1, d mod (p-1)



        "dmq1"
        exponent2, d mod (q-1)



        "iqmp"
        coeficiente, (inverso de q) mod p

- **[OPENSSL_KEYTYPE_DSA](#constant.openssl-keytype-dsa)**, se devuelve una clave de array adicional llamada "dsa",
  que contiene los datos de la clave.

        Key
        Descripción






        "p"
        número primo (público)



        "q"
        160-bit número sub-prime, q | p-1 (público)



        "g"
        generador del subgrupo (público)



        "priv_key"
        clave privada x



        "pub_key"
        clave pública y = g^x

- **[OPENSSL_KEYTYPE_DH](#constant.openssl-keytype-dh)**, se devuelve una clave de array adicional llamada "dh",
  que contiene los datos de la clave.

        Key
        Descripción






        "p"
        número primo (compartido)



        "g"
        generador de Z_p (compartido)



        "priv_key"
        valor privado DH x



        "pub_key"
        valor público DH g^x

- **[OPENSSL_KEYTYPE_X25519](#constant.openssl-keytype-x25519)**,
  **[OPENSSL_KEYTYPE_ED25519](#constant.openssl-keytype-ed25519)**,
  **[OPENSSL_KEYTYPE_X448](#constant.openssl-keytype-x448)**,
  o **[OPENSSL_KEYTYPE_ED448](#constant.openssl-keytype-ed448)**,
  se devuelve una clave adicional en el array llamada
  "x25519",
  "ed25519",
  "x448",
  o "ed448" respectivamente,
  que contiene los datos de la clave.

        Key
        Descripción






        "priv_key"
        clave privada



        "pub_key"
        clave pública

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se añadió el soporte para claves basadas en Curve25519 y Curve448.
       Más específicamente, se introdujeron los campos x25519, ed25519,
       x448 y ed448.




      8.0.0

       key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key.



# openssl_pkey_get_private

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_pkey_get_private — Lee una clave privada

### Descripción

**openssl_pkey_get_private**([#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key, [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $passphrase = **[null](#constant.null)**): [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[false](#language.types.singleton)

**openssl_pkey_get_private()** analiza la clave
private_key y la prepara para ser utilizada
por otras funciones.

### Parámetros

     private_key


       private_key puede ser uno de los siguientes valores:



        -

          una cadena en el formato file://path/to/file.pem.
          El fichero así designado debe contener una clave privada o
          un certificado en formato PEM (eventualmente ambos).



        -

          Una clave privada en formato PEM.








     passphrase


       El parámetro opcional passphrase debe ser utilizado si
       la clave especificada está cifrada (protegida por una contraseña).





### Valores devueltos

Devuelve una instancia de [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) en caso de éxito, o
**[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente se devolvía un [resource](#language.types.resource) de tipo OpenSSL key.




      8.0.0

       private_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.




      8.0.0

       passphrase es ahora nullable.



# openssl_pkey_get_public

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_pkey_get_public — Extrae una clave pública de un certificado y la prepara

### Descripción

**openssl_pkey_get_public**([OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $public_key): [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[false](#language.types.singleton)

**openssl_pkey_get_public()** extrae la clave pública
del certificado public_key y la prepara
para ser utilizada por otras funciones.

### Parámetros

     public_key


       public_key puede tener uno de los siguientes valores:



        -

          Una instancia de [OpenSSLAsymmetricKey](#class.opensslasymmetrickey).



        -

          Una cadena en el formato file://path/to/file.pem.
          El fichero designado debe contener una clave pública o
          un certificado en formato PEM (eventualmente ambos).



        -

          Una clave pública en formato PEM.







### Valores devueltos

Devuelve una instancia de [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente se devolvía un [resource](#language.types.resource) de tipo OpenSSL key.




      8.0.0

       public_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



# openssl_pkey_new

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_pkey_new — Genera una nueva clave privada

### Descripción

**openssl_pkey_new**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[false](#language.types.singleton)

**openssl_pkey_new()** genera una nueva clave privada.
Cómo obtener el componente público de la clave se demuestra en un ejemplo a continuación.

**Nota**:

    Debe existir un archivo openssl.cnf válido e
    instalado para que esta función opere correctamente.
    Ver las notas encontradas en la [sección
    concerniente a la instalación](#openssl.installation) para más información.

### Parámetros

     options


       Es posible afinar la generación de claves (por ejemplo, especificando
       el número de bits o los parámetros) mediante el argumento options.
       Estas opciones pueden ser parámetros específicos del algoritmo utilizados para la
       generación de claves, u opciones genéricas también utilizadas para la generación
       de CSR si no se especifican.
       Consulte [openssl_csr_new()](#function.openssl-csr-new) para obtener más información
       sobre el uso de options para un CSR.
       Entre estas opciones, solo private_key_bits,
       private_key_type, curve_name,
       y config se utilizan para la generación de claves.
       Las opciones específicas de un algoritmo se utilizan si el array asociativo incluye
       una de las claves específicas.



        -

          Clave "rsa" para definir los parámetros RSA.





             options
             type
             format
             requis
             description






             "n"
             [string](#language.types.string)
             número binario
             sí
             módulo



             "e"
             [string](#language.types.string)
             número binario
             no
             exponente público



             "d"
             [string](#language.types.string)
             número binario
             sí
             exponente privado



             "p"
             [string](#language.types.string)
             número binario
             no
             primer 1



             "q"
             [string](#language.types.string)
             número binario
             no
             primer 2



             "dmp1"
             [string](#language.types.string)
             número binario
             no
             exponent1, d mod (p-1)



             "dmq1"
             [string](#language.types.string)
             número binario
             no
             exponent2, d mod (q-1)



             "iqmp"
             [string](#language.types.string)
             número binario
             no
             coeficiente, (inverso de q) mod p








        -

          Clave "dsa" para definir los parámetros DSA.





             options
             type
             format
             requis
             description






             "p"
             [string](#language.types.string)
             número binario
             no
             número primo (público)



             "q"
             [string](#language.types.string)
             número binario
             no
             160 bits sub-prime, q | p-1 (público)



             "g"
             [string](#language.types.string)
             número binario
             no
             generador del subgrupo (público)



             "priv_key"
             [string](#language.types.string)
             clave PEM
             no
             clave privada x



             "pub_key"
             [string](#language.types.string)
             clave PEM
             no
             clave pública y = g^x








        -

          Clave "dh" para los parámetros DH (intercambio de claves Diffie–Hellman).





             Options
             Tipo
             Format
             Requis
             Descripción






             "p"
             [string](#language.types.string)
             número binario
             no
             número primo (compartido)



             "g"
             [string](#language.types.string)
             número binario
             no
             generador de Z_p (compartido)



             "priv_key"
             [string](#language.types.string)
             clave PEM
             no
             valor DH privado x



             "pub_key"
             [string](#language.types.string)
             clave PEM
             no
             valor DH público g^x








        -

          Clave "ec" para los parámetros de curva elíptica





             Options
             Tipo
             Format
             Requis
             Descripción






             "curve_name"
             [string](#language.types.string)
             nombre
             no
             nombre de la curva, ver [openssl_get_curve_names()](#function.openssl-get-curve-names)



             "p"
             [string](#language.types.string)
             número binario
             no
             número primo del campo para la curva sobre Fp



             "a"
             [string](#language.types.string)
             número binario
             no
             coeficiente a de la curva para Fp : y^2 mod p = x^3 + ax + b mod p



             "b"
             [string](#language.types.string)
             número binario
             no
             coeficiente b de la curva para Fp : y^2 mod p = x^3 + ax + b mod p



             "seed"
             [string](#language.types.string)
             número binario
             no
             número aleatorio opcional utilizado para generar el coeficiente b



             "generator"
             [string](#language.types.string)
             punto codificado en binario
             no
             punto generador de la curva



             "g_x"
             [string](#language.types.string)
             número binario
             no
             coordenada x del punto generador de la curva



             "g_y"
             [string](#language.types.string)
             número binario
             no
             coordenada y del punto generador de la curva



             "cofactor"
             [string](#language.types.string)
             número binario
             no
             cofactor de la curva



             "order"
             [string](#language.types.string)
             número binario
             no
             orden de la curva



             "x"
             [string](#language.types.string)
             número binario
             no
             coordenada x (pública)



             "y"
             [string](#language.types.string)
             número binario
             no
             coordenada y (pública)



             "d"
             [string](#language.types.string)
             número binario
             no
             clave privada








        -

          Claves "x25519", "x448",
          "ed25519", "ed448" para
          los parámetros Curve25519 y Curve448.





             Options
             Tipo
             Format
             Requis
             Descripción






             "priv_key"
             [string](#language.types.string)
             clave PEM
             no
             clave privada



             "pub_key"
             [string](#language.types.string)
             clave PEM
             no
             clave pública












### Valores devueltos

Devuelve una instancia de [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) en caso de éxito, **[false](#constant.false)**
en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se añadió el soporte para claves basadas en Curve25519 y Curve448 con la introducción de
       los campos x25519, ed25519, x448,
       y ed448.




      8.3.0

       Se añadió el soporte para la generación de claves EC con parámetros EC personalizados.
       Más específicamente, con la introducción de las opciones EC:
       p, a, b, seed,
       generator, g_x, g_y,
       cofactor, y order.




      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente, se devolvía un [resource](#language.types.resource) de tipo OpenSSL key.




      7.1.0

       Se añadió la opción curve_name
       para permitir la creación de claves EC.



### Ejemplos

**Ejemplo #1 Obtener la clave pública a partir de una clave privada**

&lt;?php

$private_key = openssl_pkey_new();
$public_key_pem = openssl_pkey_get_details($private_key)['key'];
echo $public_key_pem, PHP_EOL;

$public_key = openssl_pkey_get_public($public_key_pem);
var_dump($public_key);

?&gt;

Resultado del ejemplo anterior es similar a:

// Resultado antes de PHP 8.0.0; note que la función devuelve un recurso
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwknBFEherZe74BiRjTFA
hqwZ1SK7brwq7C/afnLXKhRR7jnrpfM0ypC46q8xz5UZswenZakJ7kd5fls+r4Bv
3P8XsKYLTh2m1GiWQhV1g77cNIN4qNWh70PiDO3fB2446o1LBgToQYuRZS5YQRfJ
rVD0ysgtVcCU9tjaey28HlgApOpYFTaaKPj2MBmEYpMC+kG2HhL12GfpHUi2eiXI
dXT2WskWHWvUrmQ7fJIfI92JlDokV62DH/q1oiedLs9OPNb0rL1aAmYdzaVN6XNH
x/o4Lh125v2vAPV9E3fZCDc/HDEUaahpjanMiCQEgEDp5Hr+CRkvERT5/ydN+p08
5wIDAQAB
-----END PUBLIC KEY-----
resource(6) of type (OpenSSL key)

// Resultado a partir de PHP 8.0.0; note que la función devuelve un objeto
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwknBFEherZe74BiRjTFA
hqwZ1SK7brwq7C/afnLXKhRR7jnrpfM0ypC46q8xz5UZswenZakJ7kd5fls+r4Bv
3P8XsKYLTh2m1GiWQhV1g77cNIN4qNWh70PiDO3fB2446o1LBgToQYuRZS5YQRfJ
rVD0ysgtVcCU9tjaey28HlgApOpYFTaaKPj2MBmEYpMC+kG2HhL12GfpHUi2eiXI
dXT2WskWHWvUrmQ7fJIfI92JlDokV62DH/q1oiedLs9OPNb0rL1aAmYdzaVN6XNH
x/o4Lh125v2vAPV9E3fZCDc/HDEUaahpjanMiCQEgEDp5Hr+CRkvERT5/ydN+p08
5wIDAQAB
-----END PUBLIC KEY-----

object(OpenSSLAsymmetricKey)#2 (0) {
}

**Ejemplo #2 Generación de una clave RSA a partir de parámetros**

&lt;?php

$nhex = "BBF82F090682CE9C2338AC2B9DA871F7368D07EED41043A440D6B6F07454F51F" .
"B8DFBAAF035C02AB61EA48CEEB6FCD4876ED520D60E1EC4619719D8A5B8B807F" .
"AFB8E0A3DFC737723EE6B4B7D93A2584EE6A649D060953748834B2454598394E" .
"E0AAB12D7B61A51F527A9A41F6C1687FE2537298CA2A8F5946F8E5FD091DBDCB";

$ehex = "11";
$dhex = "A5DAFC5341FAF289C4B988DB30C1CDF83F31251E0668B42784813801579641B2" .
"9410B3C7998D6BC465745E5C392669D6870DA2C082A939E37FDCB82EC93EDAC9" .
"7FF3AD5950ACCFBC111C76F1A9529444E56AAF68C56C092CD38DC3BEF5D20A93" .
"9926ED4F74A13EDDFBE1A1CECC4894AF9428C2B7B8883FE4463A4BC85B1CB3C1";

$phex = "EECFAE81B1B9B3C908810B10A1B5600199EB9F44AEF4FDA493B81A9E3D84F632" .
"124EF0236E5D1E3B7E28FAE7AA040A2D5B252176459D1F397541BA2A58FB6599";

$qhex = "C97FB1F027F453F6341233EAAAD1D9353F6C42D08866B1D05A0F2035028B9D86" .
"9840B41666B42E92EA0DA3B43204B5CFCE3352524D0416A5A441E700AF461503";

$dphex = "11";
$dqhex = "11";
$qinvhex = "b06c4fdabb6301198d265bdbae9423b380f271f73453885093077fcd39e2119f" .
"c98632154f5883b167a967bf402b4e9e2e0f9656e698ea3666edfb25798039f7";

$rsa= openssl_pkey_new([
    'rsa' =&gt; [
        'n' =&gt; hex2bin($nhex),
'e' =&gt; hex2bin($ehex),
        'd' =&gt; hex2bin($dhex),
'p' =&gt; hex2bin($phex),
        'q' =&gt; hex2bin($qhex),
'dmp1' =&gt; hex2bin($dphex),
        'dmq1' =&gt; hex2bin($dqhex),
'iqmp' =&gt; hex2bin($qinvhex),
    ],
]);
$details = openssl_pkey_get_details($rsa);
var_dump($details);

?&gt;

# openssl_private_decrypt

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_private_decrypt — Descifra datos con una clave privada

### Descripción

**openssl_private_decrypt**(
    [string](#language.types.string) $data,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) &amp;$decrypted_data,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [int](#language.types.integer) $padding = **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**
): [bool](#language.types.boolean)

**openssl_private_decrypt()** descifra
data que ha sido cifrada previamente con
[openssl_public_encrypt()](#function.openssl-public-encrypt), y almacena el resultado
en la variable decrypted_data.

Esta función puede ser utilizada, por ejemplo, para descifrar datos
que solo deben ser accesibles para el usuario.

### Parámetros

     data








     decrypted_data








     private_key


       private_key debe ser la clave privada
       utilizada para cifrar los datos.






     padding


       padding puede ser
       **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**,
       **[OPENSSL_SSLV23_PADDING](#constant.openssl-sslv23-padding)**,
       **[OPENSSL_PKCS1_OAEP_PADDING](#constant.openssl-pkcs1-oaep-padding)** o
       **[OPENSSL_NO_PADDING](#constant.openssl-no-padding)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



### Ver también

    - [openssl_public_encrypt()](#function.openssl-public-encrypt) - Cifra datos con una clave pública

    - [openssl_public_decrypt()](#function.openssl-public-decrypt) - Descifra datos con una clave pública

# openssl_private_encrypt

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_private_encrypt — Cifra datos con una clave privada

### Descripción

**openssl_private_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $data,
    [string](#language.types.string) &amp;$encrypted_data,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [int](#language.types.integer) $padding = **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**
): [bool](#language.types.boolean)

**openssl_private_encrypt()** cifra los datos
data con la clave privada private_key
y almacena el resultado en encrypted_data.
Los datos cifrados pueden ser descifrados con la función
[openssl_public_decrypt()](#function.openssl-public-decrypt).

Esta función puede ser utilizada para firmar los datos (o sus cifrados) para
demostrar que no han sido escritos por otra persona.

### Parámetros

     data








     encrypted_data








     private_key


       private_key debe ser la clave privada correspondiente
       a la clave pública que será utilizada para descifrar los datos.






     padding


       El parámetro padding puede ser
       **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)** o
       **[OPENSSL_NO_PADDING](#constant.openssl-no-padding)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



### Ver también

    - [openssl_public_encrypt()](#function.openssl-public-encrypt) - Cifra datos con una clave pública

    - [openssl_public_decrypt()](#function.openssl-public-decrypt) - Descifra datos con una clave pública

# openssl_public_decrypt

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_public_decrypt — Descifra datos con una clave pública

### Descripción

**openssl_public_decrypt**(
    [string](#language.types.string) $data,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) &amp;$decrypted_data,
    [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $public_key,
    [int](#language.types.integer) $padding = **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**
): [bool](#language.types.boolean)

**openssl_public_decrypt()** descifra los datos
data que han sido cifrados con la función
[openssl_private_encrypt()](#function.openssl-private-encrypt) y almacena el resultado en
decrypted_data.

Puede utilizarse esta función para verificar si el mensaje ha sido escrito por el
propietario de la clave privada.

### Parámetros

     data








     decrypted_data








     public_key


       public_key debe ser la clave pública que
       ha sido utilizada para cifrar los datos.






     padding


       padding puede ser
       **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**
       o **[OPENSSL_NO_PADDING](#constant.openssl-no-padding)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       public_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509
       .



### Ver también

    - [openssl_private_encrypt()](#function.openssl-private-encrypt) - Cifra datos con una clave privada

    - [openssl_private_decrypt()](#function.openssl-private-decrypt) - Descifra datos con una clave privada

# openssl_public_encrypt

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_public_encrypt — Cifra datos con una clave pública

### Descripción

**openssl_public_encrypt**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $data,
    [string](#language.types.string) &amp;$encrypted_data,
    [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $public_key,
    [int](#language.types.integer) $padding = **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**
): [bool](#language.types.boolean)

**openssl_public_encrypt()** cifra los datos
data con la clave pública
public_key y almacena el resultado en encrypted_data.
Los datos cifrados pueden ser descifrados con la función
[openssl_private_decrypt()](#function.openssl-private-decrypt).

Esta función puede ser utilizada para cifrar un mensaje que podrá ser leído
únicamente por el propietario de la clave privada. Puede ser igualmente utilizada
para almacenar datos seguros en una base de datos.

### Parámetros

     data








     encrypted_data


       Contendrá el resultado del cifrado.






     public_key


       public_key debe ser la clave pública correspondiente
       a la clave privada que será utilizada para descifrar los datos.






     padding


       padding puede ser
       **[OPENSSL_PKCS1_PADDING](#constant.openssl-pkcs1-padding)**,
       **[OPENSSL_SSLV23_PADDING](#constant.openssl-sslv23-padding)**,
       **[OPENSSL_PKCS1_OAEP_PADDING](#constant.openssl-pkcs1-oaep-padding)** o
       **[OPENSSL_NO_PADDING](#constant.openssl-no-padding)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       public_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



### Ver también

    - [openssl_private_encrypt()](#function.openssl-private-encrypt) - Cifra datos con una clave privada

    - [openssl_private_decrypt()](#function.openssl-private-decrypt) - Descifra datos con una clave privada

# openssl_random_pseudo_bytes

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

openssl_random_pseudo_bytes — Genera una cadena pseudo-aleatoria de octetos

### Descripción

**openssl_random_pseudo_bytes**([int](#language.types.integer) $length, [bool](#language.types.boolean) &amp;$strong_result = **[null](#constant.null)**): [string](#language.types.string)

Genera una [string](#language.types.string) pseudo-aleatoria de octetos, cuya longitud es
especificada por el argumento length.

Indica asimismo si el algoritmo fuerte de criptología ha sido utilizado para
producir estos octetos pseudo-aleatorios, utilizando el argumento
strong_result.

### Parámetros

     length


       El tamaño deseado para la cadena de octetos. Debe ser un número entero positivo
       inferior o igual a 2147483647. PHP intentará
       convertir este argumento a un entero no nulo para utilizarlo.






     strong_result


       Si se proporciona, determina si el algoritmo de criptología utilizado
       era criptológicamente fuerte, es decir, seguro para ser utilizado con GPG, contraseñas, etc. **[true](#constant.true)** si lo es, **[false](#constant.false)** en caso contrario.





### Valores devueltos

Devuelve la cadena de octetos generada.

### Errores/Excepciones

**openssl_random_pseudo_bytes()** lanza una [Exception](#class.exception) en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       strong_result ahora es nullable.




      7.4.0

       La función ya no devuelve **[false](#constant.false)** en caso de error, sino que lanza una [Exception](#class.exception) en su lugar.



### Ejemplos

    **Ejemplo #1 Ejemplo openssl_random_pseudo_bytes()**

&lt;?php
for ($i = 1; $i &lt;= 4; $i++) {
    $bytes = openssl_random_pseudo_bytes($i, $cstrong);
    $hex   = bin2hex($bytes);

    echo "Longitud : Octetos : $i y Hex: " . strlen($hex) . PHP_EOL;
    var_dump($hex);
    var_dump($cstrong);
    echo PHP_EOL;

}
?&gt;

    Resultado del ejemplo anterior es similar a:

Longitud : Octetos : 1 y Hex: 2
string(2) "42"
bool(true)

Longitud : Octetos : 2 y Hex: 4
string(4) "dc6e"
bool(true)

Longitud : Octetos : 3 y Hex: 6
string(6) "288591"
bool(true)

Longitud : Octetos : 4 y Hex: 8
string(8) "ab86d144"
bool(true)

### Ver también

- [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

- [bin2hex()](#function.bin2hex) - Convierte datos binarios en representación hexadecimal

- [crypt()](#function.crypt) - Hash de un solo sentido (indescifrable)

- [random_int()](#function.random-int) - Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

# openssl_seal

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_seal — Sella datos

### Descripción

**openssl_seal**(
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $data,
    [string](#language.types.string) &amp;$sealed_data,
    [array](#language.types.array) &amp;$encrypted_keys,
    [array](#language.types.array) $public_key,
    [string](#language.types.string) $cipher_algo,
    [string](#language.types.string) &amp;$iv = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

La **openssl_seal()** sella (cifra) data utilizando el
cipher_algo especificado con una clave secreta generada aleatoriamente. La clave es
posteriormente cifrada con cada una de las claves públicas en el array public_key,
y cada clave de envoltura cifrada es devuelta en encrypted_keys. Esto permite
enviar datos sellados a múltiples destinatarios (siempre que sus claves públicas estén disponibles).
Cada destinatario debe recibir tanto los datos sellados como la clave de envoltura que ha sido cifrada con
la clave pública del destinatario. El IV (vector de inicialización) es generado, y su valor es devuelto en
iv.

### Parámetros

     data


       Los datos a sellar






     sealed_data


       Los datos sellados.






     encrypted_keys


       Array de claves cifradas.






     public_key


       Array de instancias [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)
       que contienen las claves públicas.






     cipher_algo


       El método de cifrado.


**Precaución**

         El valor por omisión para versiones de PHP anteriores a 8.0 es ('RC4'), que se
         considera no segura. Se recomienda encarecidamente especificar explícitamente un método de cifrado
         seguro.








     iv


       El vector de inicialización para el descifrado de data. Es requerido si
       el método de cifrado necesita un IV. Esto puede ser determinado llamando a
       [openssl_cipher_iv_length()](#function.openssl-cipher-iv-length) con cipher_algo.



      **Precaución**

        El IV no puede ser definido explícitamente. Cualquier valor que se le asigne es sobrescrito por un valor
        generado aleatoriamente.






### Valores devueltos

Devuelve la longitud de los datos
sellados en caso de éxito, y **[false](#constant.false)** en caso contrario.
En caso de éxito, los datos sellados son
colocados en el parámetro sealed_data,
y las claves de envoltura en encrypted_keys.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       public_key ahora acepta un [array](#language.types.array)
       de instancias de [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente, se aceptaba un [array](#language.types.array) de [resource](#language.types.resource)s de tipo OpenSSL key.




      8.0.0

       cipher_algo ya no es un parámetro opcional.




      8.0.0

       iv ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_seal()**

&lt;?php

$data = "test";

// obtener las claves públicas
$pk1 = openssl_get_publickey("file://cert1.pem");
$pk2 = openssl_get_publickey("file://cert2.pem");

// sella el mensaje: solo los poseedores de $pk1 y $pk2 pueden descifrar
// el mensaje $sealed con las claves $ekeys[0] y $ekeys[1] (respectivamente).
openssl_seal($data, $sealed, $ekeys, array($pk1, $pk2));

if (openssl_seal($data, $sealed, $ekeys, array($pk1, $pk2), 'AES256', $iv) &gt; 0) {
// posiblemente almacenar los valores $sealed y $iv y utilizarlos más tarde en openssl_open
echo "éxito\n";
}
?&gt;

### Ver también

    - [openssl_open()](#function.openssl-open) - Abre datos sellados

# openssl_sign

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_sign — Firma los datos

### Descripción

**openssl_sign**(
    [string](#language.types.string) $data,
    [string](#language.types.string) &amp;$signature,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key,
    [string](#language.types.string)|[int](#language.types.integer) $algorithm = **[OPENSSL_ALGO_SHA1](#constant.openssl-algo-sha1)**
): [bool](#language.types.boolean)

**openssl_sign()** calcula la firma de los datos
data generando una firma digital criptográfica
utilizando la clave privada asociada con el parámetro
private_key. Tenga en cuenta que los datos en sí
no son cifrados.

### Parámetros

     data


       La cadena de datos que se desea firmar.






     signature


       Si la llamada a la función tiene éxito, la firma será
       devuelta en el parámetro
       signature.






     private_key


       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) - una clave, devuelta por la función
       [openssl_get_privatekey()](#function.openssl-get-privatekey)




       [string](#language.types.string) - una clave en formato PEM.






     algorithm


       [int](#language.types.integer) - uno de los [algoritmos de firma](#openssl.signature-algos).




       [string](#language.types.string) - una cadena válida devuelta por la función
       [openssl_get_md_methods()](#function.openssl-get-md-methods), por ejemplo: "sha256WithRSAEncryption" o "sha384".





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_sign()**

&lt;?php
// Se asume que $data contiene los datos a firmar

// lectura de la clave pública para cada destinatario
$pkeyid = openssl_pkey_get_private("file://src/openssl-0.9.6/demos/sign/key.pem");

// cálculo de la firma
openssl_sign($data, $signature, $pkeyid);

// libera las claves de la memoria
openssl_free_key($pkeyid);
?&gt;

    **Ejemplo #2 Ejemplo con openssl_sign()**

&lt;?php
//datos que se desean firmar
$data = 'my data';

//Crea una nueva clave privada y pública
$new_key_pair = openssl_pkey_new(array(
    "private_key_bits" =&gt; 2048,
    "private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));
openssl_pkey_export($new_key_pair, $private_key_pem);

$details = openssl_pkey_get_details($new_key_pair);
$public_key_pem = $details['key'];

//Creación de la firma
openssl_sign($data, $signature, $private_key_pem, OPENSSL_ALGO_SHA256);

//Guardado para uso posterior
file_put_contents('private_key.pem', $private_key_pem);
file_put_contents('public_key.pem', $public_key_pem);
file_put_contents('signature.dat', $signature);

//Verificación de la firma
$r = openssl_verify($data, $signature, $public_key_pem, "sha256WithRSAEncryption");
var_dump($r);
?&gt;

### Ver también

    - [openssl_verify()](#function.openssl-verify) - Verifica una firma

# openssl_spki_export

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

openssl_spki_export — Exporta un PEM válido formateado como una clave pública firmada

### Descripción

**openssl_spki_export**([string](#language.types.string) $spki): [string](#language.types.string)|[false](#language.types.singleton)

Exporta un PEM válido formateado como una clave pública firmada.

### Parámetros

     spki


       Una clave pública firmada válida





### Valores devueltos

Devuelve el PEM asociado formateado como clave pública, o **[false](#constant.false)** si se
produce un error.

### Errores/Excepciones

Emite una alerta de nivel **[E_WARNING](#constant.e-warning)** si un
argumento no válido es pasado mediante el parámetro
spki.

### Ejemplos

**Ejemplo #1 Ejemplo con openssl_spki_export()**

    Extrae el PEM asociado formateado como clave pública, o **[null](#constant.null)** en caso de fallo.

&lt;?php
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'challenge string');
$pubKey = openssl_spki_export(preg_replace('/SPKAC=/', '', $spkac));

if ($pubKey) {
echo $pubKey;
}
?&gt;

**Ejemplo #2 Ejemplo con openssl_spki_export()** desde &lt;keygen&gt;

    Extrae el PEM asociado formateado como clave pública, procedente de un elemento
    &lt;keygen&gt;

&lt;?php
$spkac = openssl_spki_export(preg_replace('/SPKAC=/', '', $_POST['spkac']));
if ($spkac != NULL) {
echo $spkac;
} else {
echo "La extracción de la clave pública ha fallado";
}
?&gt;
&lt;keygen name="spkac" challenge="challenge string" keytype="RSA"&gt;

### Ver también

    - [openssl_spki_new()](#function.openssl-spki-new) - Genera una clave pública firmada y realiza un desafío

    - [openssl_spki_verify()](#function.openssl-spki-verify) - Verifica una clave pública firmada y realiza un desafío

    - [openssl_spki_export_challenge()](#function.openssl-spki-export-challenge) - Exporta el challenge asociado con la clave pública firmada

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_spki_export_challenge

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

openssl_spki_export_challenge — Exporta el challenge asociado con la clave pública firmada

### Descripción

**openssl_spki_export_challenge**([string](#language.types.string) $spki): [string](#language.types.string)|[false](#language.types.singleton)

Exporta el challenge asociado con la clave pública firmada.

### Parámetros

     spki


       Una clave pública firmada válida





### Valores devueltos

Devuelve el challenge asociado en forma de string o
**[false](#constant.false)** en caso de error.

### Errores/Excepciones

Emite una advertencia de nivel **[E_WARNING](#constant.e-warning)** si se pasa un argumento
inválido a través del parámetro spki.

### Ejemplos

**Ejemplo #1 Ejemplo con openssl_spki_export_challenge()**

    Extrae el challenge asociado en forma de string o **[null](#constant.null)** en caso de error.

&lt;?php
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'challenge string');
$challenge = openssl_spki_export_challenge(preg_replace('/SPKAC=/', '', $spkac));
?&gt;

**Ejemplo #2 Ejemplo con openssl_spki_export_challenge()** desde &lt;keygen&gt;

    Extrae el challenge asociado de un elemento &lt;keygen&gt;

&lt;?php
$challenge = openssl_spki_export_challenge(preg_replace('/SPKAC=/', '', $\_POST['spkac']));
?&gt;
&lt;keygen name="spkac" challenge="challenge string" keytype="RSA"&gt;

### Ver también

    - [openssl_spki_new()](#function.openssl-spki-new) - Genera una clave pública firmada y realiza un desafío

    - [openssl_spki_verify()](#function.openssl-spki-verify) - Verifica una clave pública firmada y realiza un desafío

    - [openssl_spki_export()](#function.openssl-spki-export) - Exporta un PEM válido formateado como una clave pública firmada

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_spki_new

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

openssl_spki_new — Genera una clave pública firmada y realiza un desafío

### Descripción

**openssl_spki_new**([#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) $private_key, [string](#language.types.string) $challenge, [int](#language.types.integer) $digest_algo = **[OPENSSL_ALGO_MD5](#constant.openssl-algo-md5)**): [string](#language.types.string)|[false](#language.types.singleton)

Genera una clave pública firmada utilizando un algoritmo de hash
especificado.

### Parámetros

     private_key


       private_key debe ser una clave privada
       que haya sido previamente generada por la función
       [openssl_pkey_new()](#function.openssl-pkey-new) (o de lo contrario, obtenida desde
       una función de la familia openssl_pkey). La porción
       pública de la clave será utilizada para firmar el CSR.






     challenge


       El desafío asociado al SPKAC






     digest_algo


       El algoritmo digest. Ver openssl_get_md_method().





### Valores devueltos

Devuelve una clave pública firmada en forma de string o **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

Emite una alerta de nivel **[E_WARNING](#constant.e-warning)** si
un algoritmo con una firma desconocida es pasado mediante el
parámetro digest_algo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key.



### Ejemplos

**Ejemplo #1 Ejemplo con openssl_spki_new()**

    Genera un nuevo SPKAC con el digest por defecto (MD5)

&lt;?php
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'testing');

if ($spkac !== NULL) {
echo $spkac;
} else {
echo "La generación de SPKAC ha fallado";
}
?&gt;

Resultado del ejemplo anterior es similar a:

MIICRzCCAS8wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDM3V3sS4o4
mB9dczziRnjGAmSp+JwPrHoYMAFGvDNmZGyiWfU586X4BKs++BAj7e/FsAfno0Hd
hN9FwpCNFSox30L03nQvLYJE7f/WqigwBeMRT7Op/xvFks4sT70xP2HRYv4KqP9a
WRcKU6cFH8VxhFhqM2txEIxZKdFLaL28yT7bEDmcglf4JLDdgNMb9rET1dkgtKE6
dOaJHPGjf1uvnOH4YwkQr7n4sLUR3Kdbh0ZJAFuQVDZulo+LLzxBBkqJJcB6FhF+
oXCdHTKZnqAhpWDz+NXYytAmevab6IYm5TWPWsJUv1YKJA5lg2mXbbloIZlN9Mgc
i9fi03bdw+crAgMBAAEWB3Rlc3RpbmcwDQYJKoZIhvcNAQEEBQADggEBALyUvP/o
pPSoWBlorFyZ2RnGwKf9qMpE0q2IJP7G3oDR4LyK/m933DUiZ+YnqThrH/CWb4Ek
y5I3OCyl3S4wCuU1ibZZwDVwYShr5ELp0J9PEf7qMQZOhNsizoC7k+Czb2xB6hYW
sKfsfTKm3cXBtH3fdgc/Z1Z7VSWnAzYo38snqm72NTf5yFRnrQdphNNXi+kn1zHA
lxXRyFDXHOcYsOnwAWfyXFA4QDHQ0ezz0UoCY8gJXovcZb4GRYqOLUAsF2HcNboy
29WN8VqE29sL9QxVZFlwMcqyoLcNnyw38GvNvAGqSvzzbnEFP2MAQXJVe0H0hdp/
MML5G2iNVgNozAo=

### Ver también

    - [openssl_spki_verify()](#function.openssl-spki-verify) - Verifica una clave pública firmada y realiza un desafío

    - [openssl_spki_export_challenge()](#function.openssl-spki-export-challenge) - Exporta el challenge asociado con la clave pública firmada

    - [openssl_spki_export()](#function.openssl-spki-export) - Exporta un PEM válido formateado como una clave pública firmada

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_spki_verify

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

openssl_spki_verify — Verifica una clave pública firmada y realiza un desafío

### Descripción

**openssl_spki_verify**([string](#language.types.string) $spki): [bool](#language.types.boolean)

Verifica una clave pública firmada y realiza un desafío.

### Parámetros

     spki


       Una clave pública firmada válida





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una alerta de nivel **[E_WARNING](#constant.e-warning)** si un
argumento inválido es pasado al parámetro spkac.

### Ejemplos

**Ejemplo #1 Ejemplo con openssl_spki_verify()**

    Valida una clave pública firmada existente y realiza un desafío

&lt;?php
$pkey = openssl_pkey_new('secret password');
$spkac = openssl_spki_new($pkey, 'challenge string');

if (openssl_spki_verify(preg_replace('/SPKAC=/', '', $spkac))) {
echo $spkac;
} else {
echo "La validación SPKAC ha fallado";
}
?&gt;

**Ejemplo #2 Ejemplo con openssl_spki_verify()** desde &lt;keygen&gt;

    Valida una clave pública firmada existente procedente de un elemento &lt;keygen&gt;

&lt;?php
if (openssl_spki_verify(preg_replace('/SPKAC=/', '', $\_POST['spkac']))) {
echo $spkac;
} else {
echo "La validación SPKAC ha fallado";
}
?&gt;
&lt;keygen name="spkac" challenge="challenge string" keytype="RSA"&gt;

### Ver también

    - [openssl_spki_new()](#function.openssl-spki-new) - Genera una clave pública firmada y realiza un desafío

    - [openssl_spki_export_challenge()](#function.openssl-spki-export-challenge) - Exporta el challenge asociado con la clave pública firmada

    - [openssl_spki_export()](#function.openssl-spki-export) - Exporta un PEM válido formateado como una clave pública firmada

    - [openssl_get_md_methods()](#function.openssl-get-md-methods) - Obtiene la lista de métodos digest disponibles

    - [openssl_csr_new()](#function.openssl-csr-new) - Genera una CSR

    - [openssl_csr_sign()](#function.openssl-csr-sign) - Firma un CSR con otro certificado (o consigo mismo) y genera un certificado

# openssl_verify

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

openssl_verify — Verifica una firma

### Descripción

**openssl_verify**(
    [string](#language.types.string) $data,
    [string](#language.types.string) $signature,
    [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $public_key,
    [string](#language.types.string)|[int](#language.types.integer) $algorithm = **[OPENSSL_ALGO_SHA1](#constant.openssl-algo-sha1)**
): [int](#language.types.integer)|[false](#language.types.singleton)

**openssl_verify()** verifica que la firma
signature es correcta para los datos
data, y con la clave pública
public_key. Esta clave debe ser la clave
pública correspondiente a la clave privada utilizada durante la firma.

### Parámetros

     data


       La cadena de datos utilizada para generar la firma






     signature


       Una cadena binaria bruta, generada por la función
       [openssl_sign()](#function.openssl-sign) o similar






     public_key


       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) - una clave, retornada por la función
       [openssl_get_publickey()](#function.openssl-get-publickey)




       [string](#language.types.string) - una clave en formato PEM, por ejemplo: -----BEGIN PUBLIC KEY-----

MIIBCgK....

     algorithm


       [int](#language.types.integer) - una de las [firmas de algoritmos](#openssl.signature-algos).




       [string](#language.types.string) - una cadena válida retornada por la función [openssl_get_md_methods()](#function.openssl-get-md-methods),
       por ejemplo: "sha1WithRSAEncryption" o "sha512". Algoritmo por omisión: "OPENSSL_ALGO_SHA1".





### Valores devueltos

Retorna 1 si la firma es correcta, 0 si es
incorrecta y -1 o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       public_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_verify()**

&lt;?php
// Se asume que $data y $signature contienen los datos a firmar y
// la firma.

// Lectura de la clave pública desde el certificado
$pubkeyid = openssl_pkey_get_public("file://src/openssl-0.9.6/demos/sign/cert.pem");

// indica si la firma es correcta
$ok = openssl_verify($data, $signature, $pubkeyid);
if ($ok == 1) {
echo "Firma válida";
} elseif ($ok == 0) {
    echo "Firma errónea";
} else {
    echo "Error de verificación de la firma";
}
// libera las claves de la memoria
openssl_free_key($pubkeyid);
?&gt;

    **Ejemplo #2 Ejemplo con openssl_verify()**

&lt;?php
//Datos que se desean firmar
$data = 'my data';

//Crea una nueva clave privada y pública
$private_key_res = openssl_pkey_new(array(
    "private_key_bits" =&gt; 2048,
    "private_key_type" =&gt; OPENSSL_KEYTYPE_RSA,
));
$details = openssl_pkey_get_details($private_key_res);
$public_key_res = openssl_pkey_get_public($details['key']);

//Crea una firma
openssl_sign($data, $signature, $private_key_res, "sha256WithRSAEncryption");

//Verifica la firma
$ok = openssl_verify($data, $signature, $public_key_res, OPENSSL_ALGO_SHA256);
if ($ok == 1) {
echo "válida";
} elseif ($ok == 0) {
echo "inválida";
} else {
echo "error: ".openssl_error_string();
}
?&gt;

### Ver también

    - [openssl_sign()](#function.openssl-sign) - Firma los datos

# openssl_x509_check_private_key

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_x509_check_private_key — Verifica si una clave privada corresponde a un certificado

### Descripción

**openssl_x509_check_private_key**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate, [#[\SensitiveParameter]](class.sensitiveparameter.html) [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $private_key): [bool](#language.types.boolean)

Verifica si el argumento private_key proporcionado es la clave privada
que corresponde a certificate.

**Advertencia**

     Esta función no verifica si KEY es efectivamente una clave privada o no.
     Simplemente compara el material público (por ejemplo exponent y modulo
     de una clave RSA) y/o los parámetros de clave (por ejemplo los parámetros EC de una
     clave EC) de un par de claves.




     Esto significa, por ejemplo, que una clave pública podría ser proporcionada
     para private_key y la función puede devolver **[true](#constant.true)**.

### Parámetros

     certificate


       El certificado.






     private_key


       La clave privada.





### Valores devueltos

Devuelve **[true](#constant.true)** si private_key es la clave privada que corresponde a
certificate, o **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.




      8.0.0

       private_key ahora acepta una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509.



# openssl_x509_checkpurpose

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_x509_checkpurpose — Verifica el uso de un certificado

### Descripción

**openssl_x509_checkpurpose**(
    [OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate,
    [int](#language.types.integer) $purpose,
    [array](#language.types.array) $ca_info = [],
    [?](#language.types.null)[string](#language.types.string) $untrusted_certificates_file = **[null](#constant.null)**
): [bool](#language.types.boolean)|[int](#language.types.integer)

**openssl_x509_checkpurpose()** examina el certificado
especificado por certificate, para ver si puede ser
utilizado para una operación particular purpose.

### Parámetros

     certificate


       El certificado examinado.






     purpose





        <caption>**Uso de openssl_x509_checkpurpose()**</caption>



           Constante
           Descripción






           X509_PURPOSE_SSL_CLIENT

            ¿Puede el certificado ser utilizado con el cliente de una
            conexión SSL?




           X509_PURPOSE_SSL_SERVER

            ¿Puede el certificado ser utilizado con el servidor de una
            conexión SSL?




           X509_PURPOSE_NS_SSL_SERVER

            ¿Puede el certificado ser utilizado con un servidor
            Netscape de una conexión SSL?




           X509_PURPOSE_SMIME_SIGN

            ¿Puede el certificado ser utilizado para firmar correos en el
            estándar S/MIME?




           X509_PURPOSE_SMIME_ENCRYPT

            ¿Puede el certificado ser utilizado para
            cifrar un correo en formato S/MIME?




           X509_PURPOSE_CRL_SIGN

            ¿Puede el certificado ser utilizado para
            cifrar una lista de revocación de certificados?
            (CRL)?




           X509_PURPOSE_ANY

            ¿Puede el certificado ser utilizado para
            cualquiera de estos casos?







       Estas opciones no son campos de bits: solo puede pasarse una a la vez.




     ca_info


       ca_info debe ser un array de directorios/ficheros
       de CA de confianza como se describe en la
       [Verificación de certificados](#openssl.cert.verification).






     untrusted_certificates_file


       Si se especifica, es el nombre de un fichero en formato PEM que contiene los
       certificados que podrán ayudar durante la verificación del certificado,
       aunque se les deba otorgar una confianza limitada.





### Valores devueltos

Retorna **[true](#constant.true)** si el certificado puede ser utilizado para un propósito particular,
**[false](#constant.false)** si no puede serlo, o -1 si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.




      8.0.0

       untrusted_certificates_file ahora es nullable.



# openssl_x509_export

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_x509_export — Exporta un certificado a una cadena de caracteres

### Descripción

**openssl_x509_export**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate, [string](#language.types.string) &amp;$output, [bool](#language.types.boolean) $no_text = **[true](#constant.true)**): [bool](#language.types.boolean)

**openssl_x509_export()** almacena un certificado
certificate en el fichero
output en formato PEM.

### Parámetros

x509

        Ver los [parámetros clave/Certificados](#openssl.certparams)
        para una lista de valores válidos.






     output


       En caso de éxito, contendrá el PEM.






     no_text



El parámetro opcional notext afecta al nivel de verbosidad del display;
si vale **[false](#constant.false)**, se añadirán información legible por humanos en el display.
Por omisión, el parámetro notext vale **[true](#constant.true)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate acepta ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.



# openssl_x509_export_to_file

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

openssl_x509_export_to_file — Exporta un certificado a un archivo

### Descripción

**openssl_x509_export_to_file**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate, [string](#language.types.string) $output_filename, [bool](#language.types.boolean) $no_text = **[true](#constant.true)**): [bool](#language.types.boolean)

**openssl_x509_export_to_file()** almacena un certificado
certificate en el archivo
output_filename en formato PEM.

### Parámetros

x509

        Ver los [parámetros clave/Certificados](#openssl.certparams)
        para una lista de valores válidos.






     output_filename


       Ruta del archivo de salida.






     no_text



El parámetro opcional notext afecta al nivel de verbosidad del display;
si vale **[false](#constant.false)**, se añadirán información legible por humanos en el display.
Por omisión, el parámetro notext vale **[true](#constant.true)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate acepta ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.



# openssl_x509_fingerprint

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

openssl_x509_fingerprint — Calcula la huella digital o el resumen de un certificado X.509 dado

### Descripción

**openssl_x509_fingerprint**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate, [string](#language.types.string) $digest_algo = "sha1", [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

La función **openssl_x509_fingerprint()** devuelve el resumen
de un certificado certificate en forma de [string](#language.types.string).

### Parámetros

x509

        Ver los [parámetros clave/Certificados](#openssl.certparams)
        para una lista de valores válidos.






     digest_algo


       El método de resumen o el algoritmo de hash a utilizar, por ejemplo
       "sha256", uno de [openssl_get_md_methods()](#function.openssl-get-md-methods).






     binary


       Cuando se define como **[true](#constant.true)**, muestra los datos binarios sin tratar.
       **[false](#constant.false)** muestra en hexits minúsculas.





### Valores devueltos

Devuelve una [string](#language.types.string) que contiene la huella digital calculada del certificado en forma
de hexits minúsculas, a menos que binary esté definido como **[true](#constant.true)**
en cuyo caso se devuelve la representación binaria sin tratar del resumen del mensaje.

Devuelve **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.



# openssl_x509_free

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_x509_free — Libera los recursos tomados por un certificado

### Descripción

[#[\Deprecated]](class.deprecated.html)
**openssl_x509_free**([OpenSSLCertificate](#class.opensslcertificate) $certificate): [void](language.types.void.html)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

**openssl_x509_free()** libera los recursos de memoria tomados
por el certificado certificate.

### Parámetros

     certificate







### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función es ahora obsoleta ya que no tiene ningún efecto.




      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.



# openssl_x509_parse

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_x509_parse — Analiza un certificado X509

### Descripción

**openssl_x509_parse**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate, [bool](#language.types.boolean) $short_names = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

**openssl_x509_parse()** analiza el certificado X509
certificate, y devuelve las informaciones contenidas
en él, incluyendo el sujeto (subject), nombre (name),
emisor (issuer name), fechas de inicio y fin
(valid from date y valid to date),
etc.

### Parámetros

     certificate


       Certificado X509. Ver [parámetro de
       Clave/Certificado](#openssl.certparams) para una lista de valores válidos.






     short_names


       short_names controla la indexación de
       los datos en el array: si short_names vale
       **[true](#constant.true)** (valor por omisión), entonces los campos serán indexados
       con la forma corta de los nombres, de lo contrario, se utilizarán los nombres largos.
       (por ejemplo, CN es el nombre corto de
       commonName).





### Valores devueltos

_La estructura de los datos devueltos es
(intencionalmente) no documentada, ya que
está sujeta a cambios sin previo aviso._

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El análisis de un certificado sin segundos en UTCTime ya no es permitido para ninguna versión de OpenSSL.
       Esto ya estaba prohibido para OpenSSL versión 3.3+.




      8.0.0

       certificate ahora acepta una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.



# openssl_x509_read

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

openssl_x509_read — Analiza un certificado X.509 y devuelve un objeto

### Descripción

**openssl_x509_read**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate): [OpenSSLCertificate](#class.opensslcertificate)|[false](#language.types.singleton)

**openssl_x509_read()** analiza el certificado
certificate y devuelve un objeto
[OpenSSLCertificate](#class.opensslcertificate) para este.

### Parámetros

     certificate


       Certificado X509. Ver [parámetros clave/certificados](#openssl.certparams)
       para la lista de valores válidos.





### Valores devueltos

Devuelve un [OpenSSLCertificate](#class.opensslcertificate) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se devolvía un [resource](#language.types.resource) de tipo OpenSSL X.509.




      8.0.0

       certificate acepta ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate) ;
       anteriormente, se aceptaba un [resource](#language.types.resource) de tipo OpenSSL X.509.



# openssl_x509_verify

(PHP 7 &gt;= 7.4.0, PHP 8)

openssl_x509_verify — Verifica la firma digital de un certificado x509 con respecto a una clave pública

### Descripción

**openssl_x509_verify**([OpenSSLCertificate](#class.opensslcertificate)|[string](#language.types.string) $certificate, [OpenSSLAsymmetricKey](#class.opensslasymmetrickey)|[OpenSSLCertificate](#class.opensslcertificate)|[array](#language.types.array)|[string](#language.types.string) $public_key): [int](#language.types.integer)

La función **openssl_x509_verify()** verifica que el certificado
certificate ha sido firmado por la clave privada correspondiente a la clave
pública public_key.

### Parámetros

x509

        Ver los [parámetros clave/Certificados](#openssl.certparams)
        para una lista de valores válidos.






     public_key


       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) - una clave, devuelta por la función
       [openssl_get_publickey()](#function.openssl-get-publickey)




       [string](#language.types.string) - una clave con formato PEM, por ejemplo, -----BEGIN PUBLIC KEY-----

MIIBCgK....

### Valores devueltos

Devuelve 1 si la firma es correcta, 0 si es incorrecta y
-1 si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       certificate acepta ahora una instancia de
       [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, un [resource](#language.types.resource) de tipo OpenSSL X.509 era aceptado.




      8.0.0

       public_key acepta ahora una instancia de
       [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) o [OpenSSLCertificate](#class.opensslcertificate);
       anteriormente, un [resource](#language.types.resource) de tipo OpenSSL key o OpenSSL X.509
       era aceptado.



### Ejemplos

    **Ejemplo #1 Ejemplo con openssl_x509_verify()**

&lt;?php
$hostname = "news.php.net";
$ssloptions = array(
"capture_peer_cert" =&gt; true,
"capture_peer_cert_chain" =&gt; true,
"allow_self_signed"=&gt; false,
"CN_match" =&gt; $hostname,
"verify_peer" =&gt; true,
"SNI_enabled" =&gt; true,
"SNI_server_name" =&gt; $hostname,
);

$ctx = stream_context_create( array("ssl" =&gt; $ssloptions) );
$result = stream_socket_client("ssl://$hostname:443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $ctx);
$cont = stream_context_get_params($result);
$x509 = $cont["options"]["ssl"]["peer_certificate"];
$certparsed = openssl_x509_parse($x509);

foreach($cont["options"]["ssl"]["peer_certificate_chain"] as $chaincert)
{
    $chainparsed = openssl_x509_parse($chaincert);
$chain_public_key = openssl_get_publickey($chaincert);
$r = openssl_x509_verify($x509, $chain_public_key);
    if ($r==1)
{
echo $certparsed['subject']['CN'];
echo " fue firmado digitalmente por ";
echo $chainparsed['subject']['CN']."\n";
}
}
?&gt;

### Ver también

    - [openssl_verify()](#function.openssl-verify) - Verifica una firma

    - [openssl_get_publickey()](#function.openssl-get-publickey) - Alias de openssl_pkey_get_public

## Tabla de contenidos

- [openssl_cipher_iv_length](#function.openssl-cipher-iv-length) — Obtiene la longitud del vector de inicialización cipher
- [openssl_cipher_key_length](#function.openssl-cipher-key-length) — Devuelve la longitud de la clave de cifrado
- [openssl_cms_decrypt](#function.openssl-cms-decrypt) — Descifra un mensaje CMS
- [openssl_cms_encrypt](#function.openssl-cms-encrypt) — Cifra un mensaje CMS
- [openssl_cms_read](#function.openssl-cms-read) — Exporta el fichero CMS a un array de certificados PEM
- [openssl_cms_sign](#function.openssl-cms-sign) — Firma un fichero
- [openssl_cms_verify](#function.openssl-cms-verify) — Verifica una firma CMS
- [openssl_csr_export](#function.openssl-csr-export) — Exporta un CSR a un fichero o una variable
- [openssl_csr_export_to_file](#function.openssl-csr-export-to-file) — Exporta una CSR a un fichero
- [openssl_csr_get_public_key](#function.openssl-csr-get-public-key) — Devuelve la clave pública de un CSR
- [openssl_csr_get_subject](#function.openssl-csr-get-subject) — Retorna el sujeto de una CSR
- [openssl_csr_new](#function.openssl-csr-new) — Genera una CSR
- [openssl_csr_sign](#function.openssl-csr-sign) — Firma un CSR con otro certificado (o consigo mismo) y genera un certificado
- [openssl_decrypt](#function.openssl-decrypt) — Descifrar los datos
- [openssl_dh_compute_key](#function.openssl-dh-compute-key) — Calcula un secreto compartido para un valor público de la clave DH pública remota y la clave DH local
- [openssl_digest](#function.openssl-digest) — Calcula un digest
- [openssl_encrypt](#function.openssl-encrypt) — Cifra los datos
- [openssl_error_string](#function.openssl-error-string) — Retorna el mensaje de error OpenSSL
- [openssl_free_key](#function.openssl-free-key) — Libera los recursos
- [openssl_get_cert_locations](#function.openssl-get-cert-locations) — Obtener las ubicaciones de certificados disponibles
- [openssl_get_cipher_methods](#function.openssl-get-cipher-methods) — Obtiene la lista de métodos de cifrado disponibles
- [openssl_get_curve_names](#function.openssl-get-curve-names) — Obtiene la lista de nombres de curvas disponibles para ECC
- [openssl_get_md_methods](#function.openssl-get-md-methods) — Obtiene la lista de métodos digest disponibles
- [openssl_get_privatekey](#function.openssl-get-privatekey) — Alias de openssl_pkey_get_private
- [openssl_get_publickey](#function.openssl-get-publickey) — Alias de openssl_pkey_get_public
- [openssl_open](#function.openssl-open) — Abre datos sellados
- [openssl_pbkdf2](#function.openssl-pbkdf2) — Genera una cadena PKCS5 v2 PBKDF2
- [openssl_pkcs12_export](#function.openssl-pkcs12-export) — Exporta un certificado compatible PKCS#12 a una variable
- [openssl_pkcs12_export_to_file](#function.openssl-pkcs12-export-to-file) — Exporta un certificado compatible con PKCS#12
- [openssl_pkcs12_read](#function.openssl-pkcs12-read) — Lee un certificado PKCS#12 en un array
- [openssl_pkcs7_decrypt](#function.openssl-pkcs7-decrypt) — Descifra un mensaje S/MIME
- [openssl_pkcs7_encrypt](#function.openssl-pkcs7-encrypt) — Cifra un mensaje S/MIME
- [openssl_pkcs7_read](#function.openssl-pkcs7-read) — Exporta el fichero PKCS7 a un array de certificados PEM
- [openssl_pkcs7_sign](#function.openssl-pkcs7-sign) — Firma un mensaje S/MIME
- [openssl_pkcs7_verify](#function.openssl-pkcs7-verify) — Verifica la firma de un mensaje S/MIME
- [openssl_pkey_derive](#function.openssl-pkey-derive) — Calcula el secreto compartido para el valor público de la clave DH o ECDH remota y local
- [openssl_pkey_export](#function.openssl-pkey-export) — Almacena una representación exportable de la clave en una cadena de caracteres
- [openssl_pkey_export_to_file](#function.openssl-pkey-export-to-file) — Guarda una clave en formato ASCII en un fichero
- [openssl_pkey_free](#function.openssl-pkey-free) — Libera una clave privada
- [openssl_pkey_get_details](#function.openssl-pkey-get-details) — Devuelve un array que contiene los detalles de la clave
- [openssl_pkey_get_private](#function.openssl-pkey-get-private) — Lee una clave privada
- [openssl_pkey_get_public](#function.openssl-pkey-get-public) — Extrae una clave pública de un certificado y la prepara
- [openssl_pkey_new](#function.openssl-pkey-new) — Genera una nueva clave privada
- [openssl_private_decrypt](#function.openssl-private-decrypt) — Descifra datos con una clave privada
- [openssl_private_encrypt](#function.openssl-private-encrypt) — Cifra datos con una clave privada
- [openssl_public_decrypt](#function.openssl-public-decrypt) — Descifra datos con una clave pública
- [openssl_public_encrypt](#function.openssl-public-encrypt) — Cifra datos con una clave pública
- [openssl_random_pseudo_bytes](#function.openssl-random-pseudo-bytes) — Genera una cadena pseudo-aleatoria de octetos
- [openssl_seal](#function.openssl-seal) — Sella datos
- [openssl_sign](#function.openssl-sign) — Firma los datos
- [openssl_spki_export](#function.openssl-spki-export) — Exporta un PEM válido formateado como una clave pública firmada
- [openssl_spki_export_challenge](#function.openssl-spki-export-challenge) — Exporta el challenge asociado con la clave pública firmada
- [openssl_spki_new](#function.openssl-spki-new) — Genera una clave pública firmada y realiza un desafío
- [openssl_spki_verify](#function.openssl-spki-verify) — Verifica una clave pública firmada y realiza un desafío
- [openssl_verify](#function.openssl-verify) — Verifica una firma
- [openssl_x509_check_private_key](#function.openssl-x509-check-private-key) — Verifica si una clave privada corresponde a un certificado
- [openssl_x509_checkpurpose](#function.openssl-x509-checkpurpose) — Verifica el uso de un certificado
- [openssl_x509_export](#function.openssl-x509-export) — Exporta un certificado a una cadena de caracteres
- [openssl_x509_export_to_file](#function.openssl-x509-export-to-file) — Exporta un certificado a un archivo
- [openssl_x509_fingerprint](#function.openssl-x509-fingerprint) — Calcula la huella digital o el resumen de un certificado X.509 dado
- [openssl_x509_free](#function.openssl-x509-free) — Libera los recursos tomados por un certificado
- [openssl_x509_parse](#function.openssl-x509-parse) — Analiza un certificado X509
- [openssl_x509_read](#function.openssl-x509-read) — Analiza un certificado X.509 y devuelve un objeto
- [openssl_x509_verify](#function.openssl-x509-verify) — Verifica la firma digital de un certificado x509 con respecto a una clave pública

# La clase OpenSSLCertificate

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos OpenSSL X.509 a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **OpenSSLCertificate**
     {

}

# La clase OpenSSLCertificateSigningRequest

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos OpenSSL X.509 CSR a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **OpenSSLCertificateSigningRequest**
     {

}

# La clase OpenSSLAsymmetricKey

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos OpenSSL key a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **OpenSSLAsymmetricKey**
     {

}

- [Introducción](#intro.openssl)
- [Instalación/Configuración](#openssl.setup)<li>[Requerimientos](#openssl.requirements)
- [Instalación](#openssl.installation)
- [Configuración en tiempo de ejecución](#openssl.configuration)
- [Tipos de recursos](#openssl.resources)
  </li>- [Constantes predefinidas](#openssl.constants)<li>[Opciones de validación general](#openssl.purpose-check)
- [Opciones de relleno (Padding) para el cifrado asimétrico](#openssl.padding)
- [Tipos de clave](#openssl.key-types)
- [Constantes/opciones PKCS7](#openssl.pkcs7.flags)
- [Bandera/Constantes CMS](#openssl.cms.flags)
- [Algoritmo de firma](#openssl.signature-algos)
- [Cifrados](#openssl.ciphers)
- [Constantes de versión](#openssl.constversion)
- [Constantes de identificación del nombre del servidor](#openssl.constsni)
- [Otras constantes](#openssl.constants.other)
  </li>- [Parámetros de claves/certificados](#openssl.certparams)
- [Verificación de certificados](#openssl.cert.verification)
- [Funciones de OpenSSL](#ref.openssl)<li>[openssl_cipher_iv_length](#function.openssl-cipher-iv-length) — Obtiene la longitud del vector de inicialización cipher
- [openssl_cipher_key_length](#function.openssl-cipher-key-length) — Devuelve la longitud de la clave de cifrado
- [openssl_cms_decrypt](#function.openssl-cms-decrypt) — Descifra un mensaje CMS
- [openssl_cms_encrypt](#function.openssl-cms-encrypt) — Cifra un mensaje CMS
- [openssl_cms_read](#function.openssl-cms-read) — Exporta el fichero CMS a un array de certificados PEM
- [openssl_cms_sign](#function.openssl-cms-sign) — Firma un fichero
- [openssl_cms_verify](#function.openssl-cms-verify) — Verifica una firma CMS
- [openssl_csr_export](#function.openssl-csr-export) — Exporta un CSR a un fichero o una variable
- [openssl_csr_export_to_file](#function.openssl-csr-export-to-file) — Exporta una CSR a un fichero
- [openssl_csr_get_public_key](#function.openssl-csr-get-public-key) — Devuelve la clave pública de un CSR
- [openssl_csr_get_subject](#function.openssl-csr-get-subject) — Retorna el sujeto de una CSR
- [openssl_csr_new](#function.openssl-csr-new) — Genera una CSR
- [openssl_csr_sign](#function.openssl-csr-sign) — Firma un CSR con otro certificado (o consigo mismo) y genera un certificado
- [openssl_decrypt](#function.openssl-decrypt) — Descifrar los datos
- [openssl_dh_compute_key](#function.openssl-dh-compute-key) — Calcula un secreto compartido para un valor público de la clave DH pública remota y la clave DH local
- [openssl_digest](#function.openssl-digest) — Calcula un digest
- [openssl_encrypt](#function.openssl-encrypt) — Cifra los datos
- [openssl_error_string](#function.openssl-error-string) — Retorna el mensaje de error OpenSSL
- [openssl_free_key](#function.openssl-free-key) — Libera los recursos
- [openssl_get_cert_locations](#function.openssl-get-cert-locations) — Obtener las ubicaciones de certificados disponibles
- [openssl_get_cipher_methods](#function.openssl-get-cipher-methods) — Obtiene la lista de métodos de cifrado disponibles
- [openssl_get_curve_names](#function.openssl-get-curve-names) — Obtiene la lista de nombres de curvas disponibles para ECC
- [openssl_get_md_methods](#function.openssl-get-md-methods) — Obtiene la lista de métodos digest disponibles
- [openssl_get_privatekey](#function.openssl-get-privatekey) — Alias de openssl_pkey_get_private
- [openssl_get_publickey](#function.openssl-get-publickey) — Alias de openssl_pkey_get_public
- [openssl_open](#function.openssl-open) — Abre datos sellados
- [openssl_pbkdf2](#function.openssl-pbkdf2) — Genera una cadena PKCS5 v2 PBKDF2
- [openssl_pkcs12_export](#function.openssl-pkcs12-export) — Exporta un certificado compatible PKCS#12 a una variable
- [openssl_pkcs12_export_to_file](#function.openssl-pkcs12-export-to-file) — Exporta un certificado compatible con PKCS#12
- [openssl_pkcs12_read](#function.openssl-pkcs12-read) — Lee un certificado PKCS#12 en un array
- [openssl_pkcs7_decrypt](#function.openssl-pkcs7-decrypt) — Descifra un mensaje S/MIME
- [openssl_pkcs7_encrypt](#function.openssl-pkcs7-encrypt) — Cifra un mensaje S/MIME
- [openssl_pkcs7_read](#function.openssl-pkcs7-read) — Exporta el fichero PKCS7 a un array de certificados PEM
- [openssl_pkcs7_sign](#function.openssl-pkcs7-sign) — Firma un mensaje S/MIME
- [openssl_pkcs7_verify](#function.openssl-pkcs7-verify) — Verifica la firma de un mensaje S/MIME
- [openssl_pkey_derive](#function.openssl-pkey-derive) — Calcula el secreto compartido para el valor público de la clave DH o ECDH remota y local
- [openssl_pkey_export](#function.openssl-pkey-export) — Almacena una representación exportable de la clave en una cadena de caracteres
- [openssl_pkey_export_to_file](#function.openssl-pkey-export-to-file) — Guarda una clave en formato ASCII en un fichero
- [openssl_pkey_free](#function.openssl-pkey-free) — Libera una clave privada
- [openssl_pkey_get_details](#function.openssl-pkey-get-details) — Devuelve un array que contiene los detalles de la clave
- [openssl_pkey_get_private](#function.openssl-pkey-get-private) — Lee una clave privada
- [openssl_pkey_get_public](#function.openssl-pkey-get-public) — Extrae una clave pública de un certificado y la prepara
- [openssl_pkey_new](#function.openssl-pkey-new) — Genera una nueva clave privada
- [openssl_private_decrypt](#function.openssl-private-decrypt) — Descifra datos con una clave privada
- [openssl_private_encrypt](#function.openssl-private-encrypt) — Cifra datos con una clave privada
- [openssl_public_decrypt](#function.openssl-public-decrypt) — Descifra datos con una clave pública
- [openssl_public_encrypt](#function.openssl-public-encrypt) — Cifra datos con una clave pública
- [openssl_random_pseudo_bytes](#function.openssl-random-pseudo-bytes) — Genera una cadena pseudo-aleatoria de octetos
- [openssl_seal](#function.openssl-seal) — Sella datos
- [openssl_sign](#function.openssl-sign) — Firma los datos
- [openssl_spki_export](#function.openssl-spki-export) — Exporta un PEM válido formateado como una clave pública firmada
- [openssl_spki_export_challenge](#function.openssl-spki-export-challenge) — Exporta el challenge asociado con la clave pública firmada
- [openssl_spki_new](#function.openssl-spki-new) — Genera una clave pública firmada y realiza un desafío
- [openssl_spki_verify](#function.openssl-spki-verify) — Verifica una clave pública firmada y realiza un desafío
- [openssl_verify](#function.openssl-verify) — Verifica una firma
- [openssl_x509_check_private_key](#function.openssl-x509-check-private-key) — Verifica si una clave privada corresponde a un certificado
- [openssl_x509_checkpurpose](#function.openssl-x509-checkpurpose) — Verifica el uso de un certificado
- [openssl_x509_export](#function.openssl-x509-export) — Exporta un certificado a una cadena de caracteres
- [openssl_x509_export_to_file](#function.openssl-x509-export-to-file) — Exporta un certificado a un archivo
- [openssl_x509_fingerprint](#function.openssl-x509-fingerprint) — Calcula la huella digital o el resumen de un certificado X.509 dado
- [openssl_x509_free](#function.openssl-x509-free) — Libera los recursos tomados por un certificado
- [openssl_x509_parse](#function.openssl-x509-parse) — Analiza un certificado X509
- [openssl_x509_read](#function.openssl-x509-read) — Analiza un certificado X.509 y devuelve un objeto
- [openssl_x509_verify](#function.openssl-x509-verify) — Verifica la firma digital de un certificado x509 con respecto a una clave pública
  </li>- [OpenSSLCertificate](#class.opensslcertificate) — La clase OpenSSLCertificate
- [OpenSSLCertificateSigningRequest](#class.opensslcertificatesigningrequest) — La clase OpenSSLCertificateSigningRequest
- [OpenSSLAsymmetricKey](#class.opensslasymmetrickey) — La clase OpenSSLAsymmetricKey
