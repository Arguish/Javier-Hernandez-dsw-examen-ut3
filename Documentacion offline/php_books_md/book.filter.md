# Filtrado de datos

# Introducción

Esta extensión provee filtros los cuales pueden ser utilizados para validar o sanear datos.
Esto es especialmente útil cuando la fuente de datos contiene datos desconocidos (o externos),
como entradas facilitadas por el usuario.
Por ejemplo, estos datos pueden venir de un formulario HTML.

Principalmente hay dos tipos de filtrado:
_validación_ y _saneamiento_.

Un filtro de validación se usa para comprobar si los datos cumplen ciertos criterios.
Estos filtros son identificados por las constantes
**[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**.
Por ejemplo, el filtro **[FILTER_VALIDATE_EMAIL](#constant.filter-validate-email)**
puede ser usado para determinar si los datos son una dirección de correo válida.
Sin embargo, nunca alterará los datos de entrada.

El saneamiento, por otro lado, "limpiará" los datos,
por lo tanto puede alterar los datos de entrada añadiendo o eliminando caracteres.
Estos filtros son identificados por las constantes
**[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**.
Por ejemplo, el filtro **[FILTER_SANITIZE_EMAIL](#constant.filter-sanitize-email)** eliminará
los caracteres que no son apropiados para una dirección de correo electrónico.
Sin embargo, los datos saneados no son validados para comprobar si son
una dirección de correo válida.

Muchos filtros soportan _flags_ opcionales que pueden ajustar
el comportamiento del filtro.
Estos flags son identificados por las constantes
**[FILTER*FLAG*\*](#constant.filter-flag-none)**.
Por ejemplo, usando el flag **[FILTER_FLAG_PATH_REQUIRED](#constant.filter-flag-path-required)** con
el filtro de validación **[FILTER_VALIDATE_URL](#constant.filter-validate-url)**
requiere que la URL tenga una ruta
(por ejemplo, /foo en https://example.org/foo).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#filter.installation)
- [Configuración en tiempo de ejecución](#filter.configuration)

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-filter**

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de filtros**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [filter.default](#ini.filter.default)
      "unsafe_raw"
      **[INI_PERDIR](#constant.ini-perdir)**
      Obsoleto a partir de PHP 8.1.0.



      [filter.default_flags](#ini.filter.default-flags)
      NULL
      **[INI_PERDIR](#constant.ini-perdir)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    filter.default
    [string](#language.types.string)



     Filtra todos los datos de [$_GET](#reserved.variables.get),
     [$_POST](#reserved.variables.post), [$_COOKIE](#reserved.variables.cookies),
     [$_REQUEST](#reserved.variables.request) y [$_SERVER](#reserved.variables.server).
     Es posible acceder a los datos originales a través de
     [filter_input()](#function.filter-input).




     Debe ser el nombre de un filtro que se puede determinar usando
     [filter_list()](#function.filter-list) y [filter_id()](#function.filter-id).



    **Nota**:

      Tenga cuidado con los flags por omisión para los filtros predeterminados.
      Debería establecerse de forma explicita.
      Por ejemplo, para configurar el filtro predeterminado para que se comporte exactamente igual que
      [htmlspecialchars()](#function.htmlspecialchars) las flags por omisión deben establecerse a
      0, como se muestra a continuación.
      [htmlspecialchars()](#function.htmlspecialchars) the default flags must be set to
      0, as shown in the example below.




      **Ejemplo #1 Configurando el filtro predeterminado para actuar como htmlspecialchars**




filter.default = full_special_chars
filter.default_flags = 0

    **Advertencia**

      Esta configuración INI está obsoleta a partir de PHP 8.1.0.









    filter.default_flags
    [int](#language.types.integer)



     Flags aplicadas cuando se establece que usen los valores por omisión del filtro.
     Esto se establece a **[FILTER_FLAG_NO_ENCODE_QUOTES](#constant.filter-flag-no-encode-quotes)**
     por omisión por razones de compatibilidad.
     Vea la lista de constantes para los flags disponibles.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Constantes de entrada**

Estas constantes son utilizadas por
[filter_input()](#function.filter-input) y
[filter_input_array()](#function.filter-input-array).

    **[INPUT_POST](#constant.input-post)**
    ([int](#language.types.integer))



     Variables [POST](#reserved.variables.post).





    **[INPUT_GET](#constant.input-get)**
    ([int](#language.types.integer))



     Variables [GET](#reserved.variables.get).





    **[INPUT_COOKIE](#constant.input-cookie)**
    ([int](#language.types.integer))



     Variables [COOKIE](#reserved.variables.cookies).





    **[INPUT_ENV](#constant.input-env)**
    ([int](#language.types.integer))



     Variables [ENV](#reserved.variables.environment).





    **[INPUT_SERVER](#constant.input-server)**
    ([int](#language.types.integer))



     Variables [SERVER](#reserved.variables.server).





    **[INPUT_SESSION](#constant.input-session)**
     ([int](#language.types.integer))



     Variables [SESSION](#reserved.variables.session).
     (Eliminado a partir de PHP 8.0.0; no estaba implementado previamente)





    **[INPUT_REQUEST](#constant.input-request)**
     ([int](#language.types.integer))



     Variables [REQUEST](#reserved.variables.request).
     (Eliminado a partir de PHP 8.0.0; no estaba implementado previamente)

**Flags genéricos de filtro**

    **[FILTER_FLAG_NONE](#constant.filter-flag-none)**
    ([int](#language.types.integer))



     Sin flags.





    **[FILTER_REQUIRE_SCALAR](#constant.filter-require-scalar)**
    ([int](#language.types.integer))



     Flag utilizado para requerir que la entrada del filtro sea un escalar.





    **[FILTER_REQUIRE_ARRAY](#constant.filter-require-array)**
    ([int](#language.types.integer))



     Flag utilizado para requerir que la entrada del filtro sea un [array](#language.types.array).





    **[FILTER_FORCE_ARRAY](#constant.filter-force-array)**
    ([int](#language.types.integer))



     Este flag envuelve las entradas escalares en un [array](#language.types.array) de un elemento
     para filtros que operan sobre arrays.





    **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**
    ([int](#language.types.integer))



     Usar **[null](#constant.null)** en lugar de **[false](#constant.false)** en caso de fallo.


     Utilizable con cualquier filtro de validación
     **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**.

**Flags de filtro de saneamiento**

    **[FILTER_FLAG_STRIP_LOW](#constant.filter-flag-strip-low)**
    ([int](#language.types.integer))



     Elimina caracteres con valor ASCII menor que 32.





    **[FILTER_FLAG_STRIP_HIGH](#constant.filter-flag-strip-high)**
    ([int](#language.types.integer))



     Elimina caracteres con valor ASCII mayor que 127.





    **[FILTER_FLAG_STRIP_BACKTICK](#constant.filter-flag-strip-backtick)**
    ([int](#language.types.integer))



     Elimina caracteres de comilla invertida (`).





    **[FILTER_FLAG_ENCODE_LOW](#constant.filter-flag-encode-low)**
    ([int](#language.types.integer))



     Codifica caracteres con valor ASCII menor que 32.





    **[FILTER_FLAG_ENCODE_HIGH](#constant.filter-flag-encode-high)**
    ([int](#language.types.integer))



     Codifica caracteres con valor ASCII mayor que 127.





    **[FILTER_FLAG_ENCODE_AMP](#constant.filter-flag-encode-amp)**
    ([int](#language.types.integer))



     Codifica &amp;.





    **[FILTER_FLAG_NO_ENCODE_QUOTES](#constant.filter-flag-no-encode-quotes)**
    ([int](#language.types.integer))



     Las comillas simples y dobles (' y ")
     no serán codificadas.





    **[FILTER_FLAG_EMPTY_STRING_NULL](#constant.filter-flag-empty-string-null)**
    ([int](#language.types.integer))




     Si el saneamiento de un string resulta en un string vacío,
     convierte el valor a **[null](#constant.null)**

**Filtros de validación**

    **[FILTER_VALIDATE_BOOL](#constant.filter-validate-bool)**
    ([int](#language.types.integer))



     Devuelve **[true](#constant.true)** para "1",
     1 incluyendo notaciones binarias, octales y hexadecimales, 1.0,
     "true", true,
     "on",
     y "yes".


     Devuelve **[false](#constant.false)** para "0",
     0 incluyendo notaciones binarias, octales y hexadecimales, 0.0,
     "false", false,
     "off",
     "no", y
     "".


     Los valores de string se comparan sin distinguir entre mayúsculas y minúsculas.
     El valor de retorno para valores no booleanos depende de
     **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**.
     Si está configurado, se devuelve **[null](#constant.null)**, de lo contrario se devuelve **[false](#constant.false)**.


     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.





     Disponible a partir de PHP 8.0.0.






    **[FILTER_VALIDATE_BOOLEAN](#constant.filter-validate-boolean)**
    ([int](#language.types.integer))



     Alias de **[FILTER_VALIDATE_BOOL](#constant.filter-validate-bool)**.
     El alias estaba disponible antes de la introducción de su nombre canónico
     en PHP 8.0.0.






    **[FILTER_VALIDATE_INT](#constant.filter-validate-int)**
    ([int](#language.types.integer))



     Valida si el valor es un entero,
     en caso de éxito se convierte al tipo [int](#language.types.integer).


    **Nota**:

      Los valores string son recortados usando [trim()](#function.trim)
      antes de la validación.






     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.




      min_range


        El valor solo es válido si es mayor o igual que el valor proporcionado.




      max_range


        El valor solo es válido si es menor o igual que el valor proporcionado.





     **Flags opcionales**


       **[FILTER_FLAG_ALLOW_OCTAL](#constant.filter-flag-allow-octal)**
       ([int](#language.types.integer))




        Permite enteros en notación octal
        (0[0-7]+).





       **[FILTER_FLAG_ALLOW_HEX](#constant.filter-flag-allow-hex)**
       ([int](#language.types.integer))



        Permite enteros en notación hexadecimal
        (0x[0-9a-fA-F]+).









    **[FILTER_VALIDATE_FLOAT](#constant.filter-validate-float)**
    ([int](#language.types.integer))



     Valida si el valor es un float,
     en caso de éxito se convierte al tipo [float](#language.types.float).


    **Nota**:

      Los valores string son recortados usando [trim()](#function.trim)
      antes de la validación.






     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.




      decimal







      min_range


        El valor solo es válido si es mayor o igual que el valor proporcionado.
        Disponible a partir de PHP 7.4.0.




      max_range


        El valor solo es válido si es menor o igual que el valor proporcionado.
        Disponible a partir de PHP 7.4.0.





     **Flags opcionales**


       **[FILTER_FLAG_ALLOW_THOUSAND](#constant.filter-flag-allow-thousand)**
       ([int](#language.types.integer))



        Acepta comas (,),
        que normalmente representan el separador de miles.








    **[FILTER_VALIDATE_REGEXP](#constant.filter-validate-regexp)**
    ([int](#language.types.integer))



     Valida el valor contra la expresión regular proporcionada por la
     opción regexp.



     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.




      regexp


        Expresión regular [compatible con Perl](#book.pcre).









    **[FILTER_VALIDATE_URL](#constant.filter-validate-url)**
    ([int](#language.types.integer))



     Valida si la URL es válido según
     [» RFC 2396](https://datatracker.ietf.org/doc/html/rfc2396).


     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.





     **Flags opcionales**


       **[FILTER_FLAG_SCHEME_REQUIRED](#constant.filter-flag-scheme-required)**
       ([int](#language.types.integer))



        Requiere que la URL contenga una parte de esquema.

       **Advertencia**

         *OBSOLETO* a partir de PHP 7.3.0 y
         *ELIMINADO* a partir de PHP 8.0.0.
         Esto se debe a que siempre está implícito por el
         filtro **[FILTER_VALIDATE_URL](#constant.filter-validate-url)**.








       **[FILTER_FLAG_HOST_REQUIRED](#constant.filter-flag-host-required)**
       ([int](#language.types.integer))



        Requiere que la URL contenga una parte de host.

       **Advertencia**

         *OBSOLETO* a partir de PHP 7.3.0 y
         *ELIMINADO* a partir de PHP 8.0.0.
         Esto se debe a que siempre está implícito por el
         filtro **[FILTER_VALIDATE_URL](#constant.filter-validate-url)**.








       **[FILTER_FLAG_PATH_REQUIRED](#constant.filter-flag-path-required)**
       ([int](#language.types.integer))



        Requiere que la URL contenga una parte de ruta.





       **[FILTER_FLAG_QUERY_REQUIRED](#constant.filter-flag-query-required)**
       ([int](#language.types.integer))



        Requiere que la URL contenga una parte de consulta.




    **Advertencia**

      Una URL válida puede no especificar el
      protocolo HTTP (http://).
      Por lo tanto, puede ser necesaria una validación adicional para determinar si la
      URL usa un protocolo esperado,
      por ejemplo, ssh:// o mailto:.




    **Advertencia**

      Este filtro solo funciona con URLs ASCII.
      Esto significa que los Nombres de Dominio Internacionalizados (IDN) siempre serán rechazados.








    **[FILTER_VALIDATE_DOMAIN](#constant.filter-validate-domain)**
    ([int](#language.types.integer))



     Valida si el nombre de dominio es válido según
     [» RFC 952](https://datatracker.ietf.org/doc/html/rfc952),
     [» RFC 1034](https://datatracker.ietf.org/doc/html/rfc1034),
     [» RFC 1035](https://datatracker.ietf.org/doc/html/rfc1035),
     [» RFC 1123](https://datatracker.ietf.org/doc/html/rfc1034),
     [» RFC 2732](https://datatracker.ietf.org/doc/html/rfc1034),
     y
     [» RFC 2181](https://datatracker.ietf.org/doc/html/rfc2181).


     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.





     **Flags opcionales**


       **[FILTER_FLAG_HOSTNAME](#constant.filter-flag-hostname)**
       ([int](#language.types.integer))



        Requiere que los nombres de host comiencen con un carácter alfanumérico y contengan
        solo caracteres alfanuméricos o guiones.








    **[FILTER_VALIDATE_EMAIL](#constant.filter-validate-email)**
    ([int](#language.types.integer))



     Valida si el valor es una dirección de correo electrónico "válida".



     La validación se realiza contra la sintaxis addr-spec
     en
     [» RFC 822](https://datatracker.ietf.org/doc/html/rfc822).
     Sin embargo, los comentarios, el plegado de espacios en blanco y los nombres de dominio sin puntos
     no están soportados, y por lo tanto serán rechazados.



     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.





     **Flags opcionales**


       **[FILTER_FLAG_EMAIL_UNICODE](#constant.filter-flag-email-unicode)**
       ([int](#language.types.integer))



        Acepta caracteres Unicode en la parte local.
        Disponible a partir de PHP 7.1.0.





    **Advertencia**

      La validación de correo electrónico es compleja y la única forma verdadera de confirmar que un correo electrónico
      es válido y existe es enviar un correo electrónico a la dirección.









    **[FILTER_VALIDATE_IP](#constant.filter-validate-ip)**
    ([int](#language.types.integer))



     Valida el valor como dirección IP.




     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.





     **Flags opcionales**


       **[FILTER_FLAG_IPV4](#constant.filter-flag-ipv4)**
       ([int](#language.types.integer))



        Permite direcciones IPv4.





       **[FILTER_FLAG_IPV6](#constant.filter-flag-ipv6)**
       ([int](#language.types.integer))



        Permite direcciones IPv6.





       **[FILTER_FLAG_NO_RES_RANGE](#constant.filter-flag-no-res-range)**
       ([int](#language.types.integer))



        Deniega direcciones reservadas.


        Estos son los rangos que están marcados como
        Reserved-By-Protocol en
        [» RFC 6890](https://datatracker.ietf.org/doc/html/rfc6890).


        Que para IPv4 corresponden a los siguientes rangos:
        0.0.0.0/8, 169.254.0.0/16, 127.0.0.0/8, 240.0.0.0/4.




        Y para IPv6 corresponden a los siguientes rangos:
        ::1/128, ::/128, ::FFFF:0:0/96, FE80::/10.







       **[FILTER_FLAG_NO_PRIV_RANGE](#constant.filter-flag-no-priv-range)**
       ([int](#language.types.integer))



        Deniega direcciones privadas.


        Estas son direcciones IPv4 que están en los siguientes rangos:
        10.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16.




        Estas son direcciones IPv6 que comienzan con
        FD o FC.





       **[FILTER_FLAG_GLOBAL_RANGE](#constant.filter-flag-global-range)**
       ([int](#language.types.integer))



        Solo permite direcciones globales.
        Estas se pueden encontrar en
        [» RFC 6890](https://datatracker.ietf.org/doc/html/rfc6890)
        donde el atributo Global es True.
        Disponible a partir de PHP 8.2.0.









    **[FILTER_VALIDATE_MAC](#constant.filter-validate-mac)**
    ([int](#language.types.integer))



     Valida si el valor es una dirección MAC.



     **Opciones disponibles**

      default


        Valor a devolver en caso de que el filtro falle.




**Filtros de saneamiento**

    **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**
    ([int](#language.types.integer))



     Este filtro no hace nada.


     Sin embargo, puede eliminar o codificar caracteres especiales si se usa junto con
     los flags de saneamiento de filtro **[FILTER_FLAG_STRIP_*](#constant.filter-flag-strip-low)**
     y **[FILTER_FLAG_ENCODE_*](#constant.filter-flag-encode-low)**.





    **[FILTER_DEFAULT](#constant.filter-default)**
    ([int](#language.types.integer))



     Alias de **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**.





    **[FILTER_SANITIZE_STRING](#constant.filter-sanitize-string)**
    ([int](#language.types.integer))



     Este filtro elimina etiquetas y codifica en HTML comillas dobles y simples.


     Opcionalmente puede eliminar o codificar caracteres especificados si se usa junto con
     los flags de saneamiento de filtro **[FILTER_FLAG_STRIP_*](#constant.filter-flag-strip-low)**
     y **[FILTER_FLAG_ENCODE_*](#constant.filter-flag-encode-low)**.


     El comportamiento de codificación de comillas puede desactivarse usando el
     flag de filtro **[FILTER_FLAG_NO_ENCODE_QUOTES](#constant.filter-flag-no-encode-quotes)**.

    **Advertencia**

      *Obsoleto* a partir de PHP 8.1.0,
      use [htmlspecialchars()](#function.htmlspecialchars) en su lugar.




    **Advertencia**

      La forma en que este filtro elimina etiquetas no es equivalente a
      [strip_tags()](#function.strip-tags).








    **[FILTER_SANITIZE_STRIPPED](#constant.filter-sanitize-stripped)**
    ([int](#language.types.integer))



     Alias de **[FILTER_SANITIZE_STRING](#constant.filter-sanitize-string)**.

    **Advertencia**

      *Obsoleto* a partir de PHP 8.1.0,
      use [htmlspecialchars()](#function.htmlspecialchars) en su lugar.








    **[FILTER_SANITIZE_ENCODED](#constant.filter-sanitize-encoded)**
    ([int](#language.types.integer))



     Este filtro codifica una cadena en URL.


     Opcionalmente puede eliminar o codificar caracteres especificados si se usa junto con
     los flags de saneamiento de filtro **[FILTER_FLAG_STRIP_*](#constant.filter-flag-strip-low)**
     y **[FILTER_FLAG_ENCODE_*](#constant.filter-flag-encode-low)**.





    **[FILTER_SANITIZE_SPECIAL_CHARS](#constant.filter-sanitize-special-chars)**
    ([int](#language.types.integer))



     Este filtro codifica en HTML
     ', ", &lt;, &gt;, &amp;
     y caracteres con un valor ASCII menor que 32.
     A diferencia del filtro **[FILTER_SANITIZE_FULL_SPECIAL_CHARS](#constant.filter-sanitize-full-special-chars)**, el
     filtro **[FILTER_SANITIZE_SPECIAL_CHARS](#constant.filter-sanitize-special-chars)** ignora el
     flag **[FILTER_FLAG_NO_ENCODE_QUOTES](#constant.filter-flag-no-encode-quotes)**.




     Opcionalmente puede eliminar caracteres especificados si se usa junto con
     los flags de saneamiento de filtro **[FILTER_FLAG_STRIP_*](#constant.filter-flag-strip-low)**,
     y puede codificar caracteres con valor ASCII
     mayor que 127 usando **[FILTER_FLAG_ENCODE_HIGH](#constant.filter-flag-encode-high)**.





    **[FILTER_SANITIZE_FULL_SPECIAL_CHARS](#constant.filter-sanitize-full-special-chars)**
    ([int](#language.types.integer))



     Este filtro es equivalente a llamar a [htmlspecialchars()](#function.htmlspecialchars)
     con **[ENT_QUOTES](#constant.ent-quotes)** configurado.


     El comportamiento de codificación de comillas puede desactivarse usando el
     flag de filtro **[FILTER_FLAG_NO_ENCODE_QUOTES](#constant.filter-flag-no-encode-quotes)**.

    **Advertencia**

      Al igual que [htmlspecialchars()](#function.htmlspecialchars), este filtro es consciente de la
      configuración INI [default_charset](#ini.default-charset).
      Si se detecta una secuencia de bytes que forma un carácter no válido
      en el juego de caracteres actual, entonces toda la cadena es rechazada
      resultando en que se devuelva una cadena vacía.








    **[FILTER_SANITIZE_EMAIL](#constant.filter-sanitize-email)**
    ([int](#language.types.integer))



     Sanea la cadena eliminando todos los caracteres excepto
     letras latinas ([a-zA-Z]),
     dígitos ([0-9]),
     y los caracteres especiales
     !#$%&amp;'*+-=?^_`{|}~@.[].





    **[FILTER_SANITIZE_URL](#constant.filter-sanitize-url)**
    ([int](#language.types.integer))



     Sanea la cadena eliminando todos los caracteres excepto
     letras latinas ([a-zA-Z]),
     dígitos ([0-9]),
     y los caracteres especiales
     $-_.+!*'(),{}|\\^~[]`&lt;&gt;#%";/?:@&amp;=.





    **[FILTER_SANITIZE_NUMBER_INT](#constant.filter-sanitize-number-int)**
    ([int](#language.types.integer))



     Sanea la cadena eliminando todos los caracteres excepto dígitos
     ([0-9]), signo más (+),
     y signo menos (-).





    **[FILTER_SANITIZE_NUMBER_FLOAT](#constant.filter-sanitize-number-float)**
    ([int](#language.types.integer))



     Sanea la cadena eliminando todos los caracteres excepto dígitos
     ([0-9]), signo más (+),
     y signo menos (-).



     **Flags opcionales**


       **[FILTER_FLAG_ALLOW_FRACTION](#constant.filter-flag-allow-fraction)**
       ([int](#language.types.integer))



        Acepta el carácter punto (.),
        que normalmente representa el separador entre las partes entera y
        fraccionaria.





       **[FILTER_FLAG_ALLOW_THOUSAND](#constant.filter-flag-allow-thousand)**
       ([int](#language.types.integer))



        Acepta el carácter coma (,),
        que normalmente representa el separador de miles.





       **[FILTER_FLAG_ALLOW_SCIENTIFIC](#constant.filter-flag-allow-scientific)**
       ([int](#language.types.integer))



        Acepta números en notación científica permitiendo los
        caracteres e y E.




    **Advertencia**

      Si no se usa el flag **[FILTER_FLAG_ALLOW_FRACTION](#constant.filter-flag-allow-fraction)**,
      entonces el separador decimal es eliminado, alterando el valor recibido.






&lt;?php
$number = '12.34';

var_dump(filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT));
var_dump(filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
?&gt;

      El ejemplo anterior mostrará:




string(4) "1234"
string(5) "12.34"

    **[FILTER_SANITIZE_ADD_SLASHES](#constant.filter-sanitize-add-slashes)**
    ([int](#language.types.integer))



     Aplica [addslashes()](#function.addslashes) a la entrada.
     Disponible a partir de PHP 7.3.0.






    **[FILTER_SANITIZE_MAGIC_QUOTES](#constant.filter-sanitize-magic-quotes)**
    ([int](#language.types.integer))



     Alias de **[FILTER_SANITIZE_ADD_SLASHES](#constant.filter-sanitize-add-slashes)**.

    **Advertencia**

      *OBSOLETO* a partir de PHP 7.3.0 y
      *ELIMINADO* a partir de PHP 8.0.0.


**Filtro definido por el usuario**

    **[FILTER_CALLBACK](#constant.filter-callback)**
    ([int](#language.types.integer))



     Este filtro delega el filtrado a una función definida por el usuario.
     El [callable](#language.types.callable) se pasa a través del
     parámetro options como el valor asociado a
     la clave 'options'.


     La retrollamada debe tener la siguiente firma:



      callback([string](#language.types.string) $value): [mixed](#language.types.mixed)



       value


         El valor que está siendo filtrado.





    **Nota**:

      El valor devuelto por la retrollamada será el valor devuelto por
      la función de filtro invocada.





     **Ejemplo #1
      Ejemplo de uso de [FILTER_CALLBACK](#constant.filter-callback)** para validar
      un nombre de inicio de sesión





&lt;?php
function validate_login(string $value): ?string
{
    if (strlen($value) &gt;= 5 &amp;&amp; ctype_alnum($value)) {
return $value;
}
return null;
}

$login = "val1dL0gin";
$filtered_login = filter_var($login, FILTER_CALLBACK, ['options' =&gt; 'validate_login']);
var_dump($filtered_login);

$login = "f&amp;ke login";
$filtered_login = filter_var($login, FILTER_CALLBACK, ['options' =&gt; 'validate_login']);
var_dump($filtered_login);
?&gt;

     El ejemplo anterior mostrará:




string(10) "val1dL0gin"
NULL

    **Advertencia**

      Este filtro no puede usarse con ningún otro flag de filtro, por ejemplo,
      **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**.


# Ejemplos

## Tabla de contenidos

- [Validación](#filter.examples.validation)
- [Saneamiento](#filter.examples.sanitization)

    ## Validación

    **Ejemplo #1 Validando direcciones de email con [filter_var()](#function.filter-var)**

&lt;?php
$email_a = 'joe@example.com';
$email_b = 'bogus';

if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
    echo "La dirección de email '$email_a' es válida.\n";
}
if (filter_var($email_b, FILTER_VALIDATE_EMAIL)) {
    echo "La dirección de email '$email_b' es válida.\n";
} else {
echo "La dirección de email no '$email_b' es válida.\n";
}
?&gt;

    El ejemplo anterior mostrará:

La dirección de email 'joe@example.com' es válida.
La dirección de email no 'bogus' es válida.

    **Ejemplo #2 Validando de direcciones IP con [filter_var()](#function.filter-var)**

&lt;?php
$ip_a = '127.0.0.1';
$ip_b = '42.42';

if (filter_var($ip_a, FILTER_VALIDATE_IP)) {
    echo "La dirección IP '$ip_a' es válida.";
}
if (filter_var($ip_b, FILTER_VALIDATE_IP)) {
    echo "La dirección IP '$ip_b' es válida.";
}
?&gt;

    El ejemplo anterior mostrará:

La dirección IP '127.0.0.1' es válida.

    **Ejemplo #3 Pasando opciones a [filter_var()](#function.filter-var)**

&lt;?php
$int_a = '1';
$int_b = '-1';
$int_c = '4';
$options = array(
'options' =&gt; array(
'min_range' =&gt; 0,
'max_range' =&gt; 3,
)
);
if (filter_var($int_a, FILTER_VALIDATE_INT, $options) !== FALSE) {
    echo "El entero A '$int_a' es válido (entre 0 y 3).\n";
}
if (filter_var($int_b, FILTER_VALIDATE_INT, $options) !== FALSE) {
    echo "El entero B '$int_b' es válido (entre 0 y 3).\n";
}
if (filter_var($int_c, FILTER_VALIDATE_INT, $options) !== FALSE) {
    echo "El entero C '$int_c' es válido (entre 0 y 3).\n";
}

$options['options']['default'] = 1;
if (($int_c = filter_var($int_c, FILTER_VALIDATE_INT, $options)) !== FALSE) {
    echo "El entero C '$int_c' es válido (entre 0 y 3).";
}
?&gt;

    El ejemplo anterior mostrará:

El entero A '1' es válido (entre 0 y 3).
El entero C '1' es válido (entre 0 y 3).

## Saneamiento

    **Ejemplo #1 Saneando y validando direcciones de email**

&lt;?php
$a = 'joe@example.org';
$b = 'bogus - at - example dot org';
$c = '(bogus@example.org)';

$sanitized_a = filter_var($a, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_a, FILTER_VALIDATE_EMAIL)) {
echo "Esta dirección de correo saneada (a) es válida.\n";
}

$sanitized_b = filter_var($b, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
echo "Esta dirección de correo saneada is considered valid.";
} else {
echo "Esta dirección de correo saneada (b) no es válida.\n";
}

$sanitized_c = filter_var($c, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_c, FILTER_VALIDATE_EMAIL)) {
echo "Esta dirección de correo saneada (c) es válida.\n";
echo "Antes: $c\n";
echo "Después: $sanitized_c\n";
}
?&gt;

    El ejemplo anterior mostrará:

Esta dirección de correo saneada (a) es válida.
Esta dirección de correo saneada (b) no es válida.
Esta dirección de correo saneada (c) es válida.
Antes: (bogus@example.org)
Después: bogus@example.org

# Funciones de Filter

# filter_has_var

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_has_var — Verifica si una variable de un tipo específico existe

### Descripción

**filter_has_var**([int](#language.types.integer) $input_type, [string](#language.types.string) $var_name): [bool](#language.types.boolean)

### Parámetros

     input_type


       Una constante entre **[INPUT_GET](#constant.input-get)**, **[INPUT_POST](#constant.input-post)**,
       **[INPUT_COOKIE](#constant.input-cookie)**, **[INPUT_SERVER](#constant.input-server)** o
       **[INPUT_ENV](#constant.input-env)**.






     var_name


       Nombre de la variable a verificar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# filter_id

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_id — Devuelve el ID del filtro al que pertenece un filtro con nombre

### Descripción

**filter_id**([string](#language.types.string) $name): [int](#language.types.integer)|[false](#language.types.singleton)

### Parámetros

     name


       Nombre del filtro a obtener el ID.





### Valores devueltos

ID del filtro en caso de éxito o **[false](#constant.false)** si el filtro no existe.

### Ver también

    - [filter_list()](#function.filter-list) - Devuelve una lista de todos los filtros soportados

# filter_input

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_input — Toma una variable externa concreta por su nombre y opcionalmente la filtra

### Descripción

**filter_input**(
    [int](#language.types.integer) $type,
    [string](#language.types.string) $var_name,
    [int](#language.types.integer) $filter = **[FILTER_DEFAULT](#constant.filter-default)**,
    [array](#language.types.array)|[int](#language.types.integer) $options = 0
): [mixed](#language.types.mixed)

### Parámetros

    type


      Una de las constantes **[INPUT_*](#constant.input-post)**.

     **Advertencia**

       El contenido de la superglobal que se está filtrando es el original
       "sin procesar" proporcionado por SAPI,
       antes de cualquier modificación del usuario a la superglobal.
       Para filtrar una superglobal modificada, utilice
       [filter_var_array()](#function.filter-var-array) en su lugar.







    var_name


      Nombre de una variable a filtrar dentro de la superglobal correspondiente
      type.




    filter


      El filtro a aplicar.
      Puede ser un filtro de validación usando una de las constantes
      **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**,
      un filtro de saneamiento usando una de las constantes
      **[FILTER_SANITIZE_*](#constant.filter-sanitize-string)**
      o **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**, o un filtro personalizado usando
      **[FILTER_CALLBACK](#constant.filter-callback)**.

     **Nota**:

       Por omisión es **[FILTER_DEFAULT](#constant.filter-default)**,
       que es un alias de **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**.
       Esto resultará en que no se aplique ningún filtro por omisión.







    options


      O bien un [array](#language.types.array) asociativo de opciones,
      o bien una máscara de bits de constantes de indicadores de filtro
       **[FILTER_FLAG_*](#constant.filter-flag-none)**.


      Si el filter acepta opciones,
      los indicadores pueden ser proporcionados usando el campo "flags" del array.


### Valores devueltos

En caso de éxito devuelve la variable filtrada.
Si la variable no está definida se devuelve **[false](#constant.false)**.
En caso de fallo se devuelve **[false](#constant.false)**,
a menos que se use el flag **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**,
en cuyo caso se devuelve **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de filter_input()**

&lt;?php
$search_html = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
$search_url = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_ENCODED);
echo "Has buscado $search_html.\n";
echo "&lt;a href='?search=$search_url'&gt;Busca de nuevo.&lt;/a&gt;";
?&gt;

    Resultado del ejemplo anterior es similar a:

Has buscado Me &amp;#38; son.
&lt;a href='?search=Me%20%26%20son'&gt;Busca de nuevo.&lt;/a&gt;

### Ver también

- [filter_input_array()](#function.filter-input-array) - Obtiene variables externas y opcionalmente las filtra

- [filter_var()](#function.filter-var) - Filtra una variable con el filtro que se indique

- [filter_var_array()](#function.filter-var-array) - Obtiene múltiple variables y opcionalmente las filtra

- Filtros de validación
  **[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**

- Filtros de saneación
  **[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**

# filter_input_array

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_input_array — Obtiene variables externas y opcionalmente las filtra

### Descripción

**filter_input_array**([int](#language.types.integer) $type, [array](#language.types.array)|[int](#language.types.integer) $options = **[FILTER_DEFAULT](#constant.filter-default)**, [bool](#language.types.boolean) $add_empty = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)|[null](#language.types.null)

Esta función es útil para recuperar muchos valores sin necesidad de
llamar repetidamente a [filter_input()](#function.filter-input).

### Parámetros

    type


      Una de las constantes **[INPUT_*](#constant.input-post)**.

     **Advertencia**

       El contenido de la superglobal que se está filtrando es el original
       "sin procesar" proporcionado por SAPI,
       antes de cualquier modificación del usuario a la superglobal.
       Para filtrar una superglobal modificada, utilice
       [filter_var_array()](#function.filter-var-array) en su lugar.







    options


      Ya sea un [array](#language.types.array) asociativo de opciones,
      o el filtro que se aplicará a cada entrada,
      que puede ser un filtro de validación mediante el uso de una de las constantes
      **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**
      o un filtro de saneamiento mediante el uso de una de las constantes
      **[FILTER_SANITIZE_*](#constant.filter-sanitize-string)**.


      La array de opciones es un array asociativo donde la clave corresponde
      a una clave en la matriz de datos array y el valor
      asociado es el filtro a aplicar a esta entrada,
      o un array asociativo que describe cómo y qué filtro se debe
      aplicar a esta entrada.


      El array asociativo que describe cómo se debe aplicar un filtro
      debe contener la clave 'filter' cuyo valor asociado
      es el filtro a aplicar, que puede ser uno de las constantes
      **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**,
      **[FILTER_SANITIZE_*](#constant.filter-sanitize-string)**,
      **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**, o
      **[FILTER_CALLBACK](#constant.filter-callback)**.
      Opcionalmente, puede contener la clave 'flags',
      que especifica los indicadores que se aplican al filtro,
      y la clave 'options', que especifica las opciones
      que se aplican al filtro.




    add_empty


      Añade claves faltantes como **[null](#constant.null)** al valor devuelto.


### Valores devueltos

En caso de éxito, un [array](#language.types.array) que contiene los valores de las variables solicitadas.

En caso de fallo, se devuelve **[false](#constant.false)**.
Excepto si el fallo es que el array de entrada designado por
type no está poblado, donde se devuelve **[null](#constant.null)**
si se usa el flag **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**.

Las entradas faltantes del array de entrada se rellenarán en el array
devuelto si add_empty es **[true](#constant.true)**.
En cuyo caso, las entradas faltantes se establecerán en **[null](#constant.null)**,
a menos que se use el flag **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**,
en cuyo caso será **[false](#constant.false)**.

Un valor del array devuelto será **[false](#constant.false)** si el filtro falla,
a menos que se use el flag **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**,
en cuyo caso será **[null](#constant.null)**.

### Notas

**Nota**:

    No hay una clave REQUEST_TIME en el array
    **[INPUT_SERVER](#constant.input-server)** porque este valor es insertado en
    [$_SERVER](#reserved.variables.server) posteriormente.

### Ver también

- [filter_input()](#function.filter-input) - Toma una variable externa concreta por su nombre y opcionalmente la filtra

- [filter_var()](#function.filter-var) - Filtra una variable con el filtro que se indique

- [filter_var_array()](#function.filter-var-array) - Obtiene múltiple variables y opcionalmente las filtra

- Filtros de validación
  **[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**

- Filtros de saneación
  **[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**

# filter_list

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_list — Devuelve una lista de todos los filtros soportados

### Descripción

**filter_list**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con los nombres de todos los filtros soportados, el array
are no such filters. Los índices de este array no son los IDs de los filtros,
estos se pueden obtener con [filter_id()](#function.filter-id) a partir de un nombre.

### Ejemplos

    **Ejemplo #1 Ejemplo de filter_list()**

&lt;?php
print_r(filter_list());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; int
[1] =&gt; boolean
[2] =&gt; float
[3] =&gt; validate_regexp
[4] =&gt; validate_url
[5] =&gt; validate_email
[6] =&gt; validate_ip
[7] =&gt; string
[8] =&gt; stripped
[9] =&gt; encoded
[10] =&gt; special_chars
[11] =&gt; unsafe_raw
[12] =&gt; email
[13] =&gt; url
[14] =&gt; number_int
[15] =&gt; number_float
[16] =&gt; magic_quotes
[17] =&gt; callback
)

# filter_var

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_var — Filtra una variable con el filtro que se indique

### Descripción

**filter_var**([mixed](#language.types.mixed) $value, [int](#language.types.integer) $filter = **[FILTER_DEFAULT](#constant.filter-default)**, [array](#language.types.array)|[int](#language.types.integer) $options = 0): [mixed](#language.types.mixed)

Filtra una variable usando un filtro de validación
**[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**,
un filtro de saneamiento
**[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**,
o un filtro definido por el usuario.

### Parámetros

    value


      Valor a filtrar.

     **Advertencia**

       Valores escalares son
       [convertidos a string](#language.types.string.casting)
       internamente antes de ser filtrados.







    filter


      El filtro a aplicar.
      Puede ser un filtro de validación usando una de las constantes
      **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**,
      un filtro de saneamiento usando una de las constantes
      **[FILTER_SANITIZE_*](#constant.filter-sanitize-string)**
      o **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**, o un filtro personalizado usando
      **[FILTER_CALLBACK](#constant.filter-callback)**.

     **Nota**:

       Por omisión es **[FILTER_DEFAULT](#constant.filter-default)**,
       que es un alias de **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**.
       Esto resultará en que no se aplique ningún filtro por omisión.







    options


      O bien un [array](#language.types.array) asociativo de opciones,
      o bien una máscara de bits de constantes de indicadores de filtro
       **[FILTER_FLAG_*](#constant.filter-flag-none)**.


      Si el filter acepta opciones,
      los indicadores pueden ser proporcionados usando el campo "flags" del array.


### Valores devueltos

En caso de éxito devuelve la variable filtrada.
En caso de fallo se devuelve **[false](#constant.false)**,
a menos que se use el flag **[FILTER_NULL_ON_FAILURE](#constant.filter-null-on-failure)**,
en cuyo caso se devuelve **[null](#constant.null)**.

### Ejemplos

**Ejemplo #1 Ejemplo de filter_var()**

&lt;?php
var_dump(filter_var('bob@example.com', FILTER_VALIDATE_EMAIL));
var_dump(filter_var('https://example.com', FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED));
?&gt;

El ejemplo anterior mostrará:

string(15) "bob@example.com"
bool(false)

**Ejemplo #2 Example validating entries of an array**

&lt;?php
$emails = [
"bob@example.com",
"test@example.local",
"invalidemail"
];

var_dump(filter_var($emails, FILTER_VALIDATE_EMAIL, FILTER_REQUIRE_ARRAY));
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(15) "bob@example.com"
[1]=&gt;
string(18) "test@example.local"
[2]=&gt;
bool(false)
}

**Ejemplo #3 Ejemplo de pasar un array para options**

&lt;?php

$options = [
'options' =&gt; [
'min_range' =&gt; 10,
],
'flags' =&gt; FILTER_FLAG_ALLOW_OCTAL,
];

var_dump(filter_var('0755', FILTER_VALIDATE_INT, $options));
var_dump(filter_var('011', FILTER_VALIDATE_INT, $options));

?&gt;

El ejemplo anterior mostrará:

int(493)
bool(false)

**Ejemplo #4 Proporcionar flags directamente o vía un [array](#language.types.array)**

&lt;?php

$str = 'string';

var_dump(filter_var($str, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE));
var_dump(filter_var($str, FILTER_VALIDATE_BOOLEAN, ['flags' =&gt; FILTER_NULL_ON_FAILURE]));

?&gt;

El ejemplo anterior mostrará:

NULL
NULL

### Ver también

- [filter_var_array()](#function.filter-var-array) - Obtiene múltiple variables y opcionalmente las filtra

- [filter_input()](#function.filter-input) - Toma una variable externa concreta por su nombre y opcionalmente la filtra

- [filter_input_array()](#function.filter-input-array) - Obtiene variables externas y opcionalmente las filtra

- Filtros de validación
  **[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**

- Filtros de saneación
  **[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**

# filter_var_array

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

filter_var_array — Obtiene múltiple variables y opcionalmente las filtra

### Descripción

**filter_var_array**([array](#language.types.array) $array, [array](#language.types.array)|[int](#language.types.integer) $options = **[FILTER_DEFAULT](#constant.filter-default)**, [bool](#language.types.boolean) $add_empty = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)|[null](#language.types.null)

Valida un [array](#language.types.array) asociativo de valores usando los
filtros de validación
**[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**,
filtros de saneación
**[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**,
o filtros definidos por el usuario

### Parámetros

    array


      Un array asociativo que contiene los datos a filtrar.




    options


      Ya sea un [array](#language.types.array) asociativo de opciones,
      o el filtro que se aplicará a cada entrada,
      que puede ser un filtro de validación mediante el uso de una de las constantes
      **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**
      o un filtro de saneamiento mediante el uso de una de las constantes
      **[FILTER_SANITIZE_*](#constant.filter-sanitize-string)**.


      La array de opciones es un array asociativo donde la clave corresponde
      a una clave en la matriz de datos array y el valor
      asociado es el filtro a aplicar a esta entrada,
      o un array asociativo que describe cómo y qué filtro se debe
      aplicar a esta entrada.


      El array asociativo que describe cómo se debe aplicar un filtro
      debe contener la clave 'filter' cuyo valor asociado
      es el filtro a aplicar, que puede ser uno de las constantes
      **[FILTER_VALIDATE_*](#constant.filter-validate-bool)**,
      **[FILTER_SANITIZE_*](#constant.filter-sanitize-string)**,
      **[FILTER_UNSAFE_RAW](#constant.filter-unsafe-raw)**, o
      **[FILTER_CALLBACK](#constant.filter-callback)**.
      Opcionalmente, puede contener la clave 'flags',
      que especifica los indicadores que se aplican al filtro,
      y la clave 'options', que especifica las opciones
      que se aplican al filtro.




    add_empty


      Añade claves faltantes como **[null](#constant.null)** al valor devuelto.


### Valores devueltos

En caso de éxito un array que contiene los valores de las variables que se
han pedido o **[false](#constant.false)** en caso de fallo. El valor del array será **[false](#constant.false)** si
el filtro falla o **[null](#constant.null)** si la variable no está definida.

### Ejemplos

    **Ejemplo #1 Ejemplo de filter_var_array()**

&lt;?php

$data = [
'product_id' =&gt; 'libgd&lt;script&gt;',
'component' =&gt; '10',
'versions' =&gt; '2.0.33',
'testscalar' =&gt; ['2', '23', '10', '12'],
'testarray' =&gt; '2',
];

$filters = [
'product_id' =&gt; FILTER_SANITIZE_ENCODED,
'component' =&gt; [
'filter' =&gt; FILTER_VALIDATE_INT,
'flags' =&gt; FILTER_FORCE_ARRAY,
'options' =&gt; [
'min_range' =&gt; 1,
'max_range' =&gt; 10,
],
],
'versions' =&gt; [
'filter' =&gt; FILTER_SANITIZE_ENCODED
],
'testscalar' =&gt; [
'filter' =&gt; FILTER_VALIDATE_INT,
'flags' =&gt; FILTER_REQUIRE_SCALAR,
],
'testarray' =&gt; [
'filter' =&gt; FILTER_VALIDATE_INT,
'flags' =&gt; FILTER_FORCE_ARRAY,
],
'doesnotexist' =&gt; FILTER_VALIDATE_INT,
];

var_dump(filter_var_array($data, $filters));

?&gt;

    El ejemplo anterior mostrará:

array(6) {
["product_id"]=&gt;
string(17) "libgd%3Cscript%3E"
["component"]=&gt;
array(1) {
[0]=&gt;
int(10)
}
["versions"]=&gt;
string(6) "2.0.33"
["testscalar"]=&gt;
bool(false)
["testarray"]=&gt;
array(1) {
[0]=&gt;
int(2)
}
["doesnotexist"]=&gt;
NULL
}

### Ver también

- [filter_input_array()](#function.filter-input-array) - Obtiene variables externas y opcionalmente las filtra

- [filter_var()](#function.filter-var) - Filtra una variable con el filtro que se indique

- [filter_input()](#function.filter-input) - Toma una variable externa concreta por su nombre y opcionalmente la filtra

- Filtros de validación
  **[FILTER*VALIDATE*\*](#constant.filter-validate-bool)**

- Filtros de saneación
  **[FILTER*SANITIZE*\*](#constant.filter-sanitize-string)**

## Tabla de contenidos

- [filter_has_var](#function.filter-has-var) — Verifica si una variable de un tipo específico existe
- [filter_id](#function.filter-id) — Devuelve el ID del filtro al que pertenece un filtro con nombre
- [filter_input](#function.filter-input) — Toma una variable externa concreta por su nombre y opcionalmente la filtra
- [filter_input_array](#function.filter-input-array) — Obtiene variables externas y opcionalmente las filtra
- [filter_list](#function.filter-list) — Devuelve una lista de todos los filtros soportados
- [filter_var](#function.filter-var) — Filtra una variable con el filtro que se indique
- [filter_var_array](#function.filter-var-array) — Obtiene múltiple variables y opcionalmente las filtra

- [Introducción](#intro.filter)
- [Instalación/Configuración](#filter.setup)<li>[Instalación](#filter.installation)
- [Configuración en tiempo de ejecución](#filter.configuration)
  </li>- [Constantes predefinidas](#filter.constants)
- [Ejemplos](#filter.examples)<li>[Validación](#filter.examples.validation)
- [Saneamiento](#filter.examples.sanitization)
  </li>- [Funciones de Filter](#ref.filter)<li>[filter_has_var](#function.filter-has-var) — Verifica si una variable de un tipo específico existe
- [filter_id](#function.filter-id) — Devuelve el ID del filtro al que pertenece un filtro con nombre
- [filter_input](#function.filter-input) — Toma una variable externa concreta por su nombre y opcionalmente la filtra
- [filter_input_array](#function.filter-input-array) — Obtiene variables externas y opcionalmente las filtra
- [filter_list](#function.filter-list) — Devuelve una lista de todos los filtros soportados
- [filter_var](#function.filter-var) — Filtra una variable con el filtro que se indique
- [filter_var_array](#function.filter-var-array) — Obtiene múltiple variables y opcionalmente las filtra
  </li>
