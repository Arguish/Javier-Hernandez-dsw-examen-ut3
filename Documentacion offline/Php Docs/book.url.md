# URLs

# Introducción

Tratar con cadenas URL: codificación, decodificaicón y conversión.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Las siguientes constantes están pensadas para usarse con
[parse_url()](#function.parse-url).

    **[PHP_URL_SCHEME](#constant.php-url-scheme)**
    ([int](#language.types.integer))









     **[PHP_URL_HOST](#constant.php-url-host)**
     ([int](#language.types.integer))



      Muestra el nombre del host del URL analizado.





     **[PHP_URL_PORT](#constant.php-url-port)**
     ([int](#language.types.integer))



      Muestra el puerto del URL analizado.





     **[PHP_URL_USER](#constant.php-url-user)**
     ([int](#language.types.integer))



      Muestra el usuario del URL analizado.





     **[PHP_URL_PASS](#constant.php-url-pass)**
     ([int](#language.types.integer))



      Muestra la contraseña del URL analizado.





     **[PHP_URL_PATH](#constant.php-url-path)**
     ([int](#language.types.integer))



      Muestra la ruta del URL analizado.





     **[PHP_URL_QUERY](#constant.php-url-query)**
     ([int](#language.types.integer))



      Muestra el string de consulta del URL analizado.





     **[PHP_URL_FRAGMENT](#constant.php-url-fragment)**
     ([int](#language.types.integer))



      Muestra el fragmento (string después del símbolo #) del URL analizado.


Las siguientes constantes están pensadas para utilizarlas con
[http_build_query()](#function.http-build-query).

    **[PHP_QUERY_RFC1738](#constant.php-query-rfc1738)**
    ([int](#language.types.integer))



     Codificación realizada por
     [» RFC 1738](https://datatracker.ietf.org/doc/html/rfc1738) y el
     tipo de media application/x-www-form-urlencoded, lo que
     implica que los espacios están codificados como signos "más" (+).





     **[PHP_QUERY_RFC3986](#constant.php-query-rfc3986)**
     ([int](#language.types.integer))



      La codificación se lleva a cabo según el [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986),
      y los espacios se cofificarán con porcentajes (%20).


# Funciones de URL

# base64_decode

(PHP 4, PHP 5, PHP 7, PHP 8)

base64_decode — Decodifica datos codificados con MIME base64

### Descripción

**base64_decode**([string](#language.types.string) $string, [bool](#language.types.boolean) $strict = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Decodifica los datos en string codificados en base64.

### Parámetros

     string


       Los datos codificados.





strict

    Si el parámetro strict está establecido a **[true](#constant.true)**,
    la función **base64_decode()** devolverá
    **[false](#constant.false)** si la entrada contiene algún carácter que no es del alfabeto de
    base64. De lo contrario, los caracteres no válidos serán descartados silenciosamente.

### Valores devueltos

Devuelve los datos decodificados o **[false](#constant.false)** si ocurre un error. Los datos devueltos
pueden estar en formato binario.

### Ejemplos

    **Ejemplo #1 Ejemplo de base64_decode()**

&lt;?php
$str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
echo base64_decode($str);
?&gt;

    El ejemplo anterior mostrará:

Estos datos son una cadena codificada.

### Ver también

    - [base64_encode()](#function.base64-encode) - Codifica datos con MIME base64

    - [» RFC 2045](https://datatracker.ietf.org/doc/html/rfc2045) section 6.8

# base64_encode

(PHP 4, PHP 5, PHP 7, PHP 8)

base64_encode — Codifica datos con MIME base64

### Descripción

**base64_encode**([string](#language.types.string) $string): [string](#language.types.string)

Codifica string en base64.

Este tipo de codificación está diseñado para que datos binarios sobrepasen capas de transporte
que no son de 8-bits 100%, como por ejemplo el cuerpo de un E-Mail.

La codificación en Base64 hace que los datos sean un 33% más largos que
los datos originales.

### Parámetros

     string


       Datos a codificar.





### Valores devueltos

Los datos codificados, como un string.

### Ejemplos

    **Ejemplo #1 Ejemplo de base64_encode()**

&lt;?php
$str = 'This is an encoded string';
echo base64_encode($str);
?&gt;

    El ejemplo anterior mostrará:

VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==

### Ver también

    - [base64_decode()](#function.base64-decode) - Decodifica datos codificados con MIME base64

    - [chunk_split()](#function.chunk-split) - Divide un string

    - [convert_uuencode()](#function.convert-uuencode) - Codifica un string utilizando el algoritmo uuencode

    - [» RFC 2045](https://datatracker.ietf.org/doc/html/rfc2045) section 6.8

# get_headers

(PHP 5, PHP 7, PHP 8)

get_headers — Devuelve todos los encabezados enviados por el servidor en respuesta a una petición HTTP

### Descripción

**get_headers**([string](#language.types.string) $url, [bool](#language.types.boolean) $associative = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**get_headers()** devuelve un array con los encabezados enviados por el
servidor en respuesta a una petición HTTP.

### Parámetros

     url


       La URL de destino.






     associative


       Si el argumento opcional associative está definido como **[true](#constant.true)**,
       **get_headers()** analiza la respuesta y define los índices del array.






     context


       Un contexto de recurso válido creado con
       [stream_context_create()](#function.stream-context-create), o **[null](#constant.null)** para utilizar el contexto por omisión.





### Valores devueltos

Devuelve un array indexado o asociativo que contiene los encabezados, o **[false](#constant.false)**
en caso de error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        associative ha sido cambiado de [int](#language.types.integer) a [bool](#language.types.boolean).




       7.1.0

        El argumento context ha sido añadido.





### Ejemplos

    **Ejemplo #1 Ejemplo con get_headers()**

&lt;?php
$url = 'http://www.example.com';

print_r(get_headers($url));

print_r(get_headers($url, true));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; HTTP/1.1 200 OK
[1] =&gt; Date: Sat, 29 May 2004 12:28:13 GMT
[2] =&gt; Server: Apache/1.3.27 (Unix) (Red-Hat/Linux)
[3] =&gt; Last-Modified: Wed, 08 Jan 2003 23:11:55 GMT
[4] =&gt; ETag: "3f80f-1b6-3e1cb03b"
[5] =&gt; Accept-Ranges: bytes
[6] =&gt; Content-Length: 438
[7] =&gt; Connection: close
[8] =&gt; Content-Type: text/html
)

Array
(
[0] =&gt; HTTP/1.1 200 OK
[Date] =&gt; Sat, 29 May 2004 12:28:14 GMT
[Server] =&gt; Apache/1.3.27 (Unix) (Red-Hat/Linux)
[Last-Modified] =&gt; Wed, 08 Jan 2003 23:11:55 GMT
[ETag] =&gt; "3f80f-1b6-3e1cb03b"
[Accept-Ranges] =&gt; bytes
[Content-Length] =&gt; 438
[Connection] =&gt; close
[Content-Type] =&gt; text/html
)

    **Ejemplo #2 Ejemplo con get_headers()** utilizando HEAD

&lt;?php
// Por omisión, get_headers utiliza una petición GET para recuperar los
// encabezados. Si se desea enviar una petición HEAD, puede hacerse
// utilizando un contexto de flujo:
$context = stream_context_create(
    [
        'http' =&gt; array(
            'method' =&gt; 'HEAD'
        )
    ]
);
$headers = get_headers('http://example.com', false, $context);
?&gt;

### Ver también

    - [apache_request_headers()](#function.apache-request-headers) - Recupera todos los encabezados HTTP de la petición

# get_meta_tags

(PHP 4, PHP 5, PHP 7, PHP 8)

get_meta_tags — Extrae todas las etiquetas meta de un fichero HTML

### Descripción

**get_meta_tags**([string](#language.types.string) $filename, [bool](#language.types.boolean) $use_include_path = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

**get_meta_tags()** abre el fichero filename
y lo analiza línea por línea en busca de etiquetas
"meta". El análisis cesa al encontrar la etiqueta
&lt;/head&gt;.

### Parámetros

     filename


       La ruta de acceso a un fichero HTML, en forma de [string](#language.types.string). Puede ser
       un fichero local o una URL.







        **Ejemplo #1 Lo que analiza la función get_meta_tags()**




&lt;meta name="author" content="name"&gt;
&lt;meta name="keywords" content="php documentation"&gt;
&lt;meta name="DESCRIPTION" content="a php manual"&gt;
&lt;meta name="geo.position" content="49.33;-86.59"&gt;
&lt;/head&gt; &lt;!-- cesa el análisis aquí --&gt;

     use_include_path


       Si el argumento opcional
       use_include_path vale **[true](#constant.true)**,
       **get_meta_tags()** buscará también el fichero
       en el [include_path](#ini.include-path).
       Este argumento se utiliza para ficheros locales, no para URLs.





### Valores devueltos

Devuelve un array que contiene todas las etiquetas meta analizadas.

El valor de la propiedad se utilizará como clave del array,
y su valor como valor correspondiente de la clave. Así se podrá
recorrer fácilmente este array con las funciones
estándar de array. Los caracteres especiales presentes en
el valor serán reemplazados por un guion bajo ("\_"),
y el resto se convertirá a minúsculas. Si dos etiquetas meta poseen
el mismo nombre, solo se devolverá la última.

Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #2 Lo que devuelve la función get_meta_tags()**

&lt;?php
// Supongamos que las etiquetas anteriores están disponibles en example.com
$tags = get_meta_tags('http://www.example.com/');

// Observe que las claves están en minúsculas, y
// el . ha sido reemplazado por \_ en la clave
echo $tags['author']; // name
echo $tags['keywords']; // php documentation
echo $tags['description']; // a php manual
echo $tags['geo_position']; // 49.33;-86.59
?&gt;

### Notas

**Nota**:

    Solo se analizarán las etiquetas meta con un atributo name.
    Las comillas no son necesarias.

### Ver también

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

# http_build_query

(PHP 5, PHP 7, PHP 8)

http_build_query — Genera una string de consulta con codificación URL

### Descripción

**http_build_query**(
    [array](#language.types.array)|[object](#language.types.object) $data,
    [string](#language.types.string) $numeric_prefix = "",
    [?](#language.types.null)[string](#language.types.string) $arg_separator = **[null](#constant.null)**,
    [int](#language.types.integer) $encoding_type = **[PHP_QUERY_RFC1738](#constant.php-query-rfc1738)**
): [string](#language.types.string)

Genera una string con codificación URL, construida a partir del array
indexado o asociativo data.

### Parámetros

     data


       Puede ser un array o un objeto que contiene propiedades.




       Si data es un array, entonces puede
       ser un array de una o varias dimensiones.




       Si data es un objeto, entonces solo los
       atributos públicos serán utilizados en el resultado.






     numeric_prefix


       Si se utilizan índices numéricos en
       el array base y numeric_prefix es proporcionado,
       será utilizado para prefijar los nombres de los índices para los elementos del array
       base solamente.




       Esto permite generar nombres de variables válidos si
       los datos son luego decodificados por PHP o una aplicación CGI.






     arg_separator


       El separador de argumentos. Si no está definido o es **[null](#constant.null)**,
       [arg_separator.output](#ini.arg-separator.output) es
       utilizado para separar los argumentos.






     encoding_type


       Por omisión, vale **[PHP_QUERY_RFC1738](#constant.php-query-rfc1738)**.




       Si encoding_type vale
       **[PHP_QUERY_RFC1738](#constant.php-query-rfc1738)**,
       entonces la codificación se realiza conforme a la
       [» RFC 1738](https://datatracker.ietf.org/doc/html/rfc1738)
       y los espacios del tipo de medio
       application/x-www-form-urlencoded, que
       se ve afectado por esta elección, serán codificados en forma
       de un signo más (+).




       Si encoding_type vale
       **[PHP_QUERY_RFC3986](#constant.php-query-rfc3986)**, entonces la codificación
       se realiza conforme a la
       [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986), y los
       espacios serán codificados como signo de porcentaje (%20).





### Valores devueltos

Devuelve una [string](#language.types.string) codificada URL.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Antes de PHP 8.4.0, las propiedades [BackedEnum](#class.backedenum) de
       data se convertían en objetos, en lugar de sus equivalentes escalares.




      8.0.0

       arg_separator ahora puede ser nullable.



### Ejemplos

**Ejemplo #1 Uso simple de http_build_query()**

&lt;?php
$data = array(
'foo' =&gt; 'bar',
'baz' =&gt; 'boom',
'cow' =&gt; 'milk',
'null' =&gt; null,
'php' =&gt; 'hypertext processor'
);

echo http_build_query($data) . "\n";
echo http_build_query($data, '', '&amp;amp;');

?&gt;

El ejemplo anterior mostrará:

foo=bar&amp;baz=boom&amp;cow=milk&amp;php=hypertext+processor
foo=bar&amp;amp;baz=boom&amp;amp;cow=milk&amp;amp;php=hypertext+processor

**Ejemplo #2 http_build_query()** con array indexado

&lt;?php
$data = array('foo', 'bar', 'baz', null, 'boom', 'cow' =&gt; 'milk', 'php' =&gt; 'hypertext processor');

echo http*build_query($data) . "\n";
echo http_build_query($data, 'myvar*');
?&gt;

El ejemplo anterior mostrará:

0=foo&amp;1=bar&amp;2=baz&amp;4=boom&amp;cow=milk&amp;php=hypertext+processor
myvar_0=foo&amp;myvar_1=bar&amp;myvar_2=baz&amp;myvar_4=boom&amp;cow=milk&amp;php=hypertext+processor

**Ejemplo #3 http_build_query()** con array complejo

&lt;?php
$data = array(
'user' =&gt; array(
'name' =&gt; 'Bob Smith',
'age' =&gt; 47,
'sex' =&gt; 'M',
'dob' =&gt; '5/12/1956'
),
'pastimes' =&gt; array('golf', 'opera', 'poker', 'rap'),
'children' =&gt; array(
'bobby' =&gt; array('age'=&gt;12, 'sex'=&gt;'M'),
'sally' =&gt; array('age'=&gt;8, 'sex'=&gt;'F')
),
'CEO'
);

echo http*build_query($data, 'flags*');
?&gt;

    El ejemplo anterior mostrará: (en varias líneas para mayor legibilidad)

user%5Bname%5D=Bob+Smith&amp;user%5Bage%5D=47&amp;user%5Bsex%5D=M&amp;
user%5Bdob%5D=5%2F12%2F1956&amp;pastimes%5B0%5D=golf&amp;pastimes%5B1%5D=opera&amp;
pastimes%5B2%5D=poker&amp;pastimes%5B3%5D=rap&amp;children%5Bbobby%5D%5Bage%5D=12&amp;
children%5Bbobby%5D%5Bsex%5D=M&amp;children%5Bsally%5D%5Bage%5D=8&amp;
children%5Bsally%5D%5Bsex%5D=F&amp;flags_0=CEO

**Nota**:

      Solo los elementos indexados numéricamente ("CEO")
      en el array base son prefijados. Los otros índices numéricos en
      otros niveles no necesitan serlo para tener nombres válidos.


**Ejemplo #4 Uso de http_build_query()** con un objeto

&lt;?php
class parentClass {
public $pub = 'publicParent';
protected $prot = 'protectedParent';
private $priv = 'privateParent';
public $pub_bar = null;
protected $prot_bar = null;
private $priv_bar = null;

    public function __construct(){
        $this-&gt;pub_bar  = new childClass();
        $this-&gt;prot_bar = new childClass();
        $this-&gt;priv_bar = new childClass();
    }

}

class childClass {
public $pub = 'publicChild';
protected $prot = 'protectedChild';
private $priv = 'privateChild';
}

$parent = new parentClass();

echo http_build_query($parent);
?&gt;

El ejemplo anterior mostrará:

pub=publicParent&amp;pub_bar%5Bpub%5D=publicChild

### Ver también

    - [parse_str()](#function.parse-str) - Analiza una string como una cadena de consulta URL

    - [parse_url()](#function.parse-url) - Analiza una URL y devuelve sus componentes

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

    - [array_walk()](#function.array-walk) - Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array

# parse_url

(PHP 4, PHP 5, PHP 7, PHP 8)

parse_url — Analiza una URL y devuelve sus componentes

### Descripción

**parse_url**([string](#language.types.string) $url, [int](#language.types.integer) $component = -1): [int](#language.types.integer)|[string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Esta función analiza una URL y devuelve un array asociativo que contiene
todos los elementos presentes en la misma.
Los valores de los elementos del array _NO ESTÁN_ decodificados de la URL.

Esta función **no está**
diseñada para validar la URL proporcionada, solo la divide en las partes enumeradas
a continuación. Las URL parciales e inválidas también son aceptadas, la función
**parse_url()** hará todo lo posible para analizarlas correctamente.

**Precaución**

    Esta función puede no proporcionar resultados correctos para URL relativas o inválidas y los resultados pueden no coincidir con
    el comportamiento estándar de los clientes HTTP.
    Si se deben analizar URL provenientes de la entrada del usuario,
    se requieren verificaciones adicionales, por ejemplo utilizando
    [filter_var()](#function.filter-var) con el filtro
    **[FILTER_VALIDATE_URL](#constant.filter-validate-url)**.

### Parámetros

     url


       La URL a analizar.








     component


       Puede ser una de las constantes entre **[PHP_URL_SCHEME](#constant.php-url-scheme)**,
       **[PHP_URL_HOST](#constant.php-url-host)**, **[PHP_URL_PORT](#constant.php-url-port)**,
       **[PHP_URL_USER](#constant.php-url-user)**, **[PHP_URL_PASS](#constant.php-url-pass)**,
       **[PHP_URL_PATH](#constant.php-url-path)**, **[PHP_URL_QUERY](#constant.php-url-query)**
       o **[PHP_URL_FRAGMENT](#constant.php-url-fragment)** para recuperar únicamente
       una parte de la URL como string (excepto cuando
       se proporciona **[PHP_URL_PORT](#constant.php-url-port)**; en este caso, el valor devuelto
       será un [int](#language.types.integer)).





### Valores devueltos

Para URL realmente mal formadas, **parse_url()** puede devolver
**[false](#constant.false)**.

Si el parámetro component se omite, se devuelve un [array](#language.types.array)
asociativo. Al menos un elemento estará presente en el array. Estas
son las claves potenciales de este array:

    -

      scheme - por ejemplo http



    -

      host



    -

      port



    -

      user



    -

      pass



    -

      path



    -

      query - después del signo de interrogación "?"



    -

      fragment - después del símbolo de almohadilla "#"


Si el parámetro component está especificado, **parse_url()**
devuelve un [string](#language.types.string) (o un [int](#language.types.integer) en el caso de uso de la
constante **[PHP_URL_PORT](#constant.php-url-port)**) en lugar de un [array](#language.types.array). Si el componente
solicitado no existe en la URL, **[null](#constant.null)** será devuelto.
A partir de PHP 8.0.0, **parse_url()** distingue entre los
fragmentos y consultas ausentes y vacíos:

http://example.com/foo → query = null, fragment = null
http://example.com/foo? → query = "", fragment = null
http://example.com/foo# → query = null, fragment = ""
http://example.com/foo?# → query = "", fragment = ""

Anteriormente todos los casos resultaban en la consulta y el fragmento siendo **[null](#constant.null)**.

Cabe señalar que los caracteres de control (ver [ctype_cntrl()](#function.ctype-cntrl))
en los componentes son reemplazados por un guion bajo
(\_).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **parse_url()** distingue ahora entre los fragmentos
       y consultas ausentes y vacíos.



### Ejemplos

    **Ejemplo #1 Ejemplo con parse_url()**

&lt;?php
$url = 'http://username:password@hostname:9090/path?arg=value#anchor';

var_dump(parse_url($url));
var_dump(parse_url($url, PHP_URL_SCHEME));
var_dump(parse_url($url, PHP_URL_USER));
var_dump(parse_url($url, PHP_URL_PASS));
var_dump(parse_url($url, PHP_URL_HOST));
var_dump(parse_url($url, PHP_URL_PORT));
var_dump(parse_url($url, PHP_URL_PATH));
var_dump(parse_url($url, PHP_URL_QUERY));
var_dump(parse_url($url, PHP_URL_FRAGMENT));
?&gt;

    El ejemplo anterior mostrará:

array(8) {
["scheme"]=&gt;
string(4) "http"
["host"]=&gt;
string(8) "hostname"
["port"]=&gt;
int(9090)
["user"]=&gt;
string(8) "username"
["pass"]=&gt;
string(8) "password"
["path"]=&gt;
string(5) "/path"
["query"]=&gt;
string(9) "arg=value"
["fragment"]=&gt;
string(6) "anchor"
}
string(4) "http"
string(8) "username"
string(8) "password"
string(8) "hostname"
int(9090)
string(5) "/path"
string(9) "arg=value"
string(6) "anchor"

    **Ejemplo #2 Ejemplo con la función parse_url()** sin esquema

&lt;?php
$url = '//www.example.com/path?googleguy=googley';

// Antes de PHP 5.4.7, la ruta sería "//www.example.com/path"
var_dump(parse_url($url));
?&gt;

    El ejemplo anterior mostrará:

array(3) {
["host"]=&gt;
string(15) "www.example.com"
["path"]=&gt;
string(5) "/path"
["query"]=&gt;
string(17) "googleguy=googley"
}

### Notas

**Nota**:

    **parse_url()** fue creada específicamente para analizar URL
    y no URI. Sin embargo, por razones de compatibilidad adyacente, PHP
    hace una excepción para el esquema file:// donde los triples slashs
    (file:///...) están permitidos. Todos los demás esquemas son inválidos.

### Ver también

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

    - [parse_str()](#function.parse-str) - Analiza una string como una cadena de consulta URL

    - [http_build_query()](#function.http-build-query) - Genera una string de consulta con codificación URL

    - [dirname()](#function.dirname) - Devuelve la ruta de la carpeta padre

    - [basename()](#function.basename) - Devuelve el nombre del componente final de una ruta

    - [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986)

# rawurldecode

(PHP 4, PHP 5, PHP 7, PHP 8)

rawurldecode — Decodificar cadenas codificadas estilo URL

### Descripción

**rawurldecode**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve una cadena en donde las con secuencias con signos de porcentaje
(%) seguidos de dos dígitos hexadecimales, son
reemplazados con caracteres literales.

### Parámetros

     string


       La URL a ser decodificada.





### Valores devueltos

Devuelve la URL decodificada, como una cadena.

### Ejemplos

    **Ejemplo #1 Ejemplo de rawurldecode()**

&lt;?php

echo rawurldecode('foo%20bar%40baz'); // foo bar@baz

?&gt;

### Notas

**Nota**:

    **rawurldecode()** no decodifica los símbolos más ('+')
    como espacios. [urldecode()](#function.urldecode) lo hace.

### Ver también

    - [rawurlencode()](#function.rawurlencode) - Codificar estilo URL de acuerdo al RFC 3986

    - [urldecode()](#function.urldecode) - Decodifica una cadena cifrada como URL

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

    - [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986)

# rawurlencode

(PHP 4, PHP 5, PHP 7, PHP 8)

rawurlencode — Codificar estilo URL de acuerdo al RFC 3986

### Descripción

**rawurlencode**([string](#language.types.string) $string): [string](#language.types.string)

Codifica la cadena dada de acuerdo al [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986).

### Parámetros

     string


       La URL a ser codificada.





### Valores devueltos

Devuelve una cadena en donde todos los caracteres no-alfanuméricos,
excepto -\_.~, son reemplazados con un signo de
porcentaje (%) seguido de dos dígitos hexadecimales.
Este es el tipo de codificación descrito en el [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986) para evitar que caracteres
literales sean interpretados como delimitadores de URL especiales, y para
evitar que las URLs sean modificadas por medios de transmisión con
conversiones de caracteres (como algunos sistemas de correo electrónico).

### Ejemplos

    **Ejemplo #1 Inclusión de una contraseña en una URL FTP**

&lt;?php
echo '&lt;a href="ftp://user:', rawurlencode('foo @+%/'),
'@ftp.example.com/x.txt"&gt;';
?&gt;

    El ejemplo anterior mostrará:

&lt;a href="ftp://user:foo%20%40%2B%25%2F@ftp.example.com/x.txt"&gt;

O, si pasa información en un componente PATH_INFO de la URL:

    **Ejemplo #2 Ejemplo 2 de rawurlencode()**

&lt;?php
echo '&lt;a href="http://example.com/department_list_script/',
rawurlencode('sales and marketing/Miami'), '"&gt;';
?&gt;

    El ejemplo anterior mostrará:

&lt;a href="http://example.com/department_list_script/sales%20and%20marketing%2FMiami"&gt;

### Ver también

    - [rawurldecode()](#function.rawurldecode) - Decodificar cadenas codificadas estilo URL

    - [urldecode()](#function.urldecode) - Decodifica una cadena cifrada como URL

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

    - [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986)

# urldecode

(PHP 4, PHP 5, PHP 7, PHP 8)

urldecode — Decodifica una cadena cifrada como URL

### Descripción

**urldecode**([string](#language.types.string) $string): [string](#language.types.string)

Decodifica cualquier cifrado tipo
%## en la cadena dada.
Los símbolos ('+') son
decodificados como el caracter espacio.

### Parámetros

     string


       La cadena a ser decodificada.





### Valores devueltos

Devuelve la cadena decodificada.

### Ejemplos

    **Ejemplo #1 Ejemplo de urldecode()**

&lt;?php
$query = "my=apples&amp;are=green+and+red";

foreach (explode('&amp;', $query) as $chunk) {
$param = explode("=", $chunk);

    if ($param) {
        printf("Value for parameter \"%s\" is \"%s\"&lt;br/&gt;\n", urldecode($param[0]), urldecode($param[1]));
    }

}
?&gt;

### Notas

**Advertencia**

    Las superglobales [$_GET](#reserved.variables.get) y [$_REQUEST](#reserved.variables.request)
    ya están decodificadas. El uso de **urldecode()** en un elemento
    en [$_GET](#reserved.variables.get) o [$_REQUEST](#reserved.variables.request) puede tener
    resultados inesperados y peligrosos.

### Ver también

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

    - [rawurlencode()](#function.rawurlencode) - Codificar estilo URL de acuerdo al RFC 3986

    - [rawurldecode()](#function.rawurldecode) - Decodificar cadenas codificadas estilo URL

    - [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986)

# urlencode

(PHP 4, PHP 5, PHP 7, PHP 8)

urlencode — Codifica como URL una cadena

### Descripción

**urlencode**([string](#language.types.string) $string): [string](#language.types.string)

Esta función es conveniente cuando se codifica una cadena a ser usada
como la parte de consulta de una URL, como método práctico para pasar
variables a la siguiente página.

### Parámetros

     string


       La cadena a ser codificada.





### Valores devueltos

Devuelve una cadena en la que todos los caracteres no-alfanuméricos
excepto -\_. han sido reemplazados con un signo de
porcentaje (%) seguido por dos dígitos hexadecimales y
los espacios son codificados como signos de suma (+).
Esta es la misma codificación usada en los datos publicados desde un
formulario WWW, es decir, el mismo mecanismo usado para el tipo de medios
application/x-www-form-urlencoded. Este mecanismo
difiere de la codificación en el [» RFC
3986](https://datatracker.ietf.org/doc/html/rfc3986) (vea [rawurlencode()](#function.rawurlencode)) en que, por razones
históricas, los espacios son codificados como signos de suma (+).

### Ejemplos

    **Ejemplo #1 Ejemplo de urlencode()**

&lt;?php
$userinput = 'Data123!@-_ +';
echo "UserInput: $userinput\n";
echo '&lt;a href="mycgi?foo=', urlencode($userinput), '"&gt;';
?&gt;

    El ejemplo anterior mostrará:

UserInput: Data123!@-_ +
&lt;a href="mycgi?foo=Data123%21%40-_+%2B"&gt;

    **Ejemplo #2 Ejemplo de urlencode()** y ejemplo de [htmlentities()](#function.htmlentities)

&lt;?php
$foo = 'Data123!@-_ +';
$bar = "Not the same content as $foo";
echo "foo: $foo\n";
echo "bar: $bar\n";
$query_string = 'foo=' . urlencode($foo) . '&amp;bar=' . urlencode($bar);
echo '&lt;a href="mycgi?' . htmlentities($query_string) . '"&gt;';
?&gt;

    El ejemplo anterior mostrará:

foo: Data123!@-_ +
bar: Not the same content as Data123!@-_ +
&lt;a href="mycgi?foo=Data123%21%40-_+%2B&amp;amp;bar=Not+the+same+content+as+Data123%21%40-_+%2B"&gt;

### Notas

**Nota**:

    Tenga cuidado con las variables que puedan coincidir con entidades HTML.
    Secuencias como &amp;amp, &amp;copy y &amp;pound son procesadas por el
    navegador y la entidad real es usada en lugar del nombre de variable
    deseado. Este es un problema obvio sobre el cual el consorcio W3 ha
    estado alertando a las personas por años. La referencia esta aquí: [» http://www.w3.org/TR/html4/appendix/notes.html#h-B.2.2](http://www.w3.org/TR/html4/appendix/notes.html#h-B.2.2).




    PHP soporta la modificación del separador de argumentos al punto-y-coma
    sugerido por el W3C a través de la directiva .ini arg_separator.
    Desafortunadamente, la mayoría de agentes de usuario no envían datos de
    formularios en este formato separado por punto-y-coma. Una forma más
    portable es usar &amp;amp; en lugar de &amp; como separador. No es
    necesario modificar el valor arg_separator de PHP para esto. Déjelo como
    &amp;, y simplemente codifique sus URLs usando
    [htmlentities()](#function.htmlentities) o
    [htmlspecialchars()](#function.htmlspecialchars).

### Ver también

    - [urldecode()](#function.urldecode) - Decodifica una cadena cifrada como URL

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [rawurlencode()](#function.rawurlencode) - Codificar estilo URL de acuerdo al RFC 3986

    - [rawurldecode()](#function.rawurldecode) - Decodificar cadenas codificadas estilo URL

    - [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986)

## Tabla de contenidos

- [base64_decode](#function.base64-decode) — Decodifica datos codificados con MIME base64
- [base64_encode](#function.base64-encode) — Codifica datos con MIME base64
- [get_headers](#function.get-headers) — Devuelve todos los encabezados enviados por el servidor en respuesta a una petición HTTP
- [get_meta_tags](#function.get-meta-tags) — Extrae todas las etiquetas meta de un fichero HTML
- [http_build_query](#function.http-build-query) — Genera una string de consulta con codificación URL
- [parse_url](#function.parse-url) — Analiza una URL y devuelve sus componentes
- [rawurldecode](#function.rawurldecode) — Decodificar cadenas codificadas estilo URL
- [rawurlencode](#function.rawurlencode) — Codificar estilo URL de acuerdo al RFC 3986
- [urldecode](#function.urldecode) — Decodifica una cadena cifrada como URL
- [urlencode](#function.urlencode) — Codifica como URL una cadena

- [Introducción](#intro.url)
- [Constantes predefinidas](#url.constants)
- [Funciones de URL](#ref.url)<li>[base64_decode](#function.base64-decode) — Decodifica datos codificados con MIME base64
- [base64_encode](#function.base64-encode) — Codifica datos con MIME base64
- [get_headers](#function.get-headers) — Devuelve todos los encabezados enviados por el servidor en respuesta a una petición HTTP
- [get_meta_tags](#function.get-meta-tags) — Extrae todas las etiquetas meta de un fichero HTML
- [http_build_query](#function.http-build-query) — Genera una string de consulta con codificación URL
- [parse_url](#function.parse-url) — Analiza una URL y devuelve sus componentes
- [rawurldecode](#function.rawurldecode) — Decodificar cadenas codificadas estilo URL
- [rawurlencode](#function.rawurlencode) — Codificar estilo URL de acuerdo al RFC 3986
- [urldecode](#function.urldecode) — Decodifica una cadena cifrada como URL
- [urlencode](#function.urlencode) — Codifica como URL una cadena
  </li>
