# Biblioteca de ortografía Enchant

# Introducción

Enchant es una implementación PHP de la
[» biblioteca Enchant](https://rrthomas.github.io/enchant/). Enchant
proporciona uniformidad y conformidad para todas las bibliotecas
de ortografía, e implementa ciertas funcionalidades que pueden
estar ausentes en una biblioteca. Todo debe "funcionar simplemente".

Enchant soporta las siguientes bibliotecas :

    -

      Aspell/Pspell (previsto para reemplazar Ispell)





    -

      Ispell (muy antiguo, puede ser considerado como estándar)





    -

      MySpell/Hunspell (un proyecto orientado a objetos, también utilizado por Mozilla)





    -

      Uspell (previsto originalmente para el yiddish, el hebreo y los idiomas
       de Europa del Este - alojado en el CVS de AbiWord bajo el módulo "uspell")





    -

      Hspell (Hebreo)





    -

      AppleSpell (Mac OSX)


# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#enchant.requirements)
- [Instalación](#enchant.installation)
- [Tipos de recursos](#enchant.resources)

    ## Requerimientos

    Esta versión utiliza las funciones de la
    [» biblioteca Enchant](https://rrthomas.github.io/enchant/) por
    Dom Lachowicz. Se debe utilizar Enchant 1.2.4 o superior.
    Enchant 2.0.0 o superior es únicamente soportado a partir de PHP 8.0.0.

    Enchant requiere asimismo [» Glib 2.6](http://ftp.gnome.org/pub/gnome/sources/glib/) o superior.
    Las bibliotecas Windows pre-compiladas están disponibles desde
    [» http://ftp.gnome.org/pub/gnome/binaries/win32/glib/](http://ftp.gnome.org/pub/gnome/binaries/win32/glib/).

## Instalación

Partiendo del principio de que las
[bibliothèques requises](#enchant.requirements)
están instaladas, los usuarios pueden activar enchant añadiendo la opción
**--with-enchant[=dir]**
durante la compilación de PHP.

Los usuarios de Windows deben activar php_enchant.dll
para poder utilizar esta extensión.

**Nota**:
**Configuración adicional en Windows**

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
libenchant.dll,
glib-2.dll,
gmodule-2.dll.

Además, es necesario copiar al menos uno de los proveedores proporcionados en
lib\enchant hacia \usr\local\lib\enchant-2,
(que es una ruta absoluta a partir de la raíz del _disco actual_).
Anterior a PHP 8.0.0, es decir, utilizando Enchant v1, los proveedores debían copiarse en
C:\enchant_plugins en su lugar,
donde esta ruta podía ser personalizada creando el valor de registro.

## Tipos de recursos

Anterior a PHP 8.0.0, existen dos tipos de recursos en esta extensión.
El primero es el broker (gestor de backends) y el
segundo es para el diccionario.

# Constantes predefinidas

     **[LIBENCHANT_VERSION](#constant.libenchant-version)**
     ([string](#language.types.string))



      La versión de libenchant.
      Disponible a partir de PHP 8.0.0.





     **[ENCHANT_MYSPELL](#constant.enchant-myspell)**
     ([int](#language.types.integer))



      Tipo de diccionario para MySpell. Utilizado con
      [enchant_broker_get_dict_path()](#function.enchant-broker-get-dict-path) y
      [enchant_broker_set_dict_path()](#function.enchant-broker-set-dict-path).
      Deprecado a partir de PHP 8.0.0.





     **[ENCHANT_ISPELL](#constant.enchant-ispell)**
     ([int](#language.types.integer))



      Tipo de diccionario para Ispell. Utilizado con
      [enchant_broker_get_dict_path()](#function.enchant-broker-get-dict-path) y
      [enchant_broker_set_dict_path()](#function.enchant-broker-set-dict-path).
      Deprecado a partir de PHP 8.0.0.


# Ejemplos

**Ejemplo #1 Ejemplos de Uso de Enchant**

&lt;?php
$etiqueta = 'en_US';
$r = enchant_broker_init();
$bprovides = enchant_broker_describe($r);
echo "El agente actual proporciona los siguientes entornos:\n";
print_r($bprovides);

$diccionarios = enchant_broker_list_dicts($r);
print_r($diccionarios);
if (enchant_broker_dict_exists($r,$etiqueta)) {
    $d = enchant_broker_request_dict($r, $etiqueta);
    $dprovides = enchant_dict_describe($d);
echo "el diccionario $etiqueta proporciona:\n";
    $palabra_correcta = enchant_dict_check($d, "soong");
print_r($dprovides);
    if (!$palabra_correcta) {
$sugerencias = enchant_dict_suggest($d, "soong");
echo "Sugerencias para 'soong':";
print_r($sugerencias);
    }
    enchant_broker_free_dict($d);
} else {
}
enchant_broker_free($r);
?&gt;

# Funciones de Enchant

# enchant_broker_describe

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0)

enchant_broker_describe — Enumera los proveedores Enchant

### Descripción

**enchant_broker_describe**([EnchantBroker](#class.enchantbroker) $broker): [array](#language.types.array)

Enumera los proveedores Enchant y muestra algunas informaciones sobre ellos.
Las mismas informaciones son proporcionadas mediante la función [phpinfo()](#function.phpinfo).

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).





### Valores devueltos

Devuelve un [array](#language.types.array) de los proveedores Enchant disponibles con sus detalles.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

      8.0.0

       Anterior a esta versión, esta función devolvía **[false](#constant.false)** en caso de error.



### Ejemplos

    **Ejemplo #1 Lista las interfaces proporcionadas por un patrocinador dado**

&lt;?php
$r = enchant_broker_init();
$bprovides = enchant_broker_describe($r);
echo "El patrocinador actual proporciona las siguientes interfaces :\n";
print_r($bprovides);

?&gt;

    Resultado del ejemplo anterior es similar a:

El patrocinador actual proporciona las siguientes interfaces :
Array
(
[0] =&gt; Array
(
[name] =&gt; aspell
[desc] =&gt; Aspell Provider
[file] =&gt; /usr/lib/enchant/libenchant_aspell.so
)

    [1] =&gt; Array
        (
            [name] =&gt; hspell
            [desc] =&gt; Hspell Provider
            [file] =&gt; /usr/lib/enchant/libenchant_hspell.so
        )

    [2] =&gt; Array
        (
            [name] =&gt; ispell
            [desc] =&gt; Ispell Provider
            [file] =&gt; /usr/lib/enchant/libenchant_ispell.so
        )

    [3] =&gt; Array
        (
            [name] =&gt; myspell
            [desc] =&gt; Myspell Provider
            [file] =&gt; /usr/lib/enchant/libenchant_myspell.so
        )

)

# enchant_broker_dict_exists

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_dict_exists — Verifica si un diccionario existe

### Descripción

**enchant_broker_dict_exists**([EnchantBroker](#class.enchantbroker) $broker, [string](#language.types.string) $tag): [bool](#language.types.boolean)

Verifica si un diccionario existe.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).






     tag


       lenguaje, en un formato como us_US, ch_DE, etc.





### Valores devueltos

Devuelve **[true](#constant.true)** si el lenguaje existe, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con enchant_broker_dict_exists()**

&lt;?php
$tag = 'en_US';
$r = enchant_broker_init();
if (enchant_broker_dict_exists($r,$tag)) {
echo $tag . " dictionary found.\n";
}
?&gt;

### Ver también

    - [enchant_broker_describe()](#function.enchant-broker-describe) - Enumera los proveedores Enchant

# enchant_broker_free

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_free — Libera los recursos del patrocinador así como sus diccionarios

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**enchant_broker_free**([EnchantBroker](#class.enchantbroker) $broker): [bool](#language.types.boolean)

Libera un patrocinador así como todos sus diccionarios.
A partir de PHP 8.0.0, se recomienda destruir el objeto en lugar de llamar a esta función.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada en favor de la desinicialización del objeto.





8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ver también

    - [enchant_broker_init()](#function.enchant-broker-init) - Crea un nuevo objeto sponsor

# enchant_broker_free_dict

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_free_dict — Libera un recurso de diccionario

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**enchant_broker_free_dict**([EnchantDictionary](#class.enchantdictionary) $dictionary): [bool](#language.types.boolean)

Libera un diccionario.
A partir de PHP 8.0.0, se recomienda destruir el objeto en lugar de llamar a esta función.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función está deprecada a favor de la desinicialización del objeto.




      8.0.0

       dictionary ahora espera una [EnchantDictionary](#class.enchantdictionary);
       anteriormente, se esperaba un [resource](#language.types.resource).



### Ver también

    - [enchant_broker_request_dict()](#function.enchant-broker-request-dict) - Crear un nuevo diccionario usando una etiqueta

    - [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict) - Crea un diccionario utilizando un archivo PWL

# enchant_broker_get_dict_path

(PHP 5 &gt;= 5.3.1, PHP 7, PHP 8, PECL enchant &gt;= 1.0.1)

enchant_broker_get_dict_path — Obtiene la ruta del directorio para un backend proporcionado

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**enchant_broker_get_dict_path**([EnchantBroker](#class.enchantbroker) $broker, [int](#language.types.integer) $type): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene la ruta del directorio para un backend proporcionado.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).






     type


       El tipo de diccionarios, es decir, **[ENCHANT_MYSPELL](#constant.enchant-myspell)**
       o **[ENCHANT_ISPELL](#constant.enchant-ispell)**.





### Valores devueltos

Devuelve la ruta del directorio del diccionario en
caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada.





8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Notas

**Nota**:

    Esta función solo está disponible si la extensión ha sido compilada con Enchant v1.

### Ver también

    - [enchant_broker_set_dict_path()](#function.enchant-broker-set-dict-path) - Define la ruta del directorio para un backend proporcionado

# enchant_broker_get_error

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_get_error — Devuelve el último error de un sponsor

### Descripción

**enchant_broker_get_error**([EnchantBroker](#class.enchantbroker) $broker): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el último error ocurrido para este sponsor.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).





### Valores devueltos

Devuelve el mensaje si se ha encontrado un error, o **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

# enchant_broker_init

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_init — Crea un nuevo objeto sponsor

### Descripción

**enchant_broker_init**(): [EnchantBroker](#class.enchantbroker)|[false](#language.types.singleton)

### Parámetros

### Valores devueltos

Devuelve un recurso de sponsor en caso de éxito, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de [EnchantBroker](#class.enchantbroker);
       anteriormente se devolvía un [resource](#language.types.resource).



### Ver también

    - [enchant_broker_free()](#function.enchant-broker-free) - Libera los recursos del patrocinador así como sus diccionarios

# enchant_broker_list_dicts

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 1.0.1)

enchant_broker_list_dicts — Devuelve una lista de todos los diccionarios disponibles

### Descripción

**enchant_broker_list_dicts**([EnchantBroker](#class.enchantbroker) $broker): [array](#language.types.array)

Devuelve una lista de todos los diccionarios disponibles junto con sus detalles.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).





### Valores devueltos

Devuelve un [array](#language.types.array) de diccionarios disponibles con sus detalles.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

      8.0.0

       Antes de esta versión, la función devolvía **[false](#constant.false)** en caso de error.



### Ejemplos

    **Ejemplo #1 Lista todos los diccionarios disponibles para un sponsor**

&lt;?php
$r = enchant_broker_init();
$dicts = enchant_broker_list_dicts($r);
print_r($dicts);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[lang_tag] =&gt; de
[provider_name] =&gt; aspell
[provider_desc] =&gt; Aspell Provider
[provider_file] =&gt; /usr/lib/enchant/libenchant_aspell.so
)

    [1] =&gt; Array
        (
            [lang_tag] =&gt; de_DE
            [provider_name] =&gt; aspell
            [provider_desc] =&gt; Aspell Provider
            [provider_file] =&gt; /usr/lib/enchant/libenchant_aspell.so
        )

    [3] =&gt; Array
        (
            [lang_tag] =&gt; en
            [provider_name] =&gt; aspell
            [provider_desc] =&gt; Aspell Provider
            [provider_file] =&gt; /usr/lib/enchant/libenchant_aspell.so
        )

    [4] =&gt; Array
        (
            [lang_tag] =&gt; en_GB
            [provider_name] =&gt; aspell
            [provider_desc] =&gt; Aspell Provider
            [provider_file] =&gt; /usr/lib/enchant/libenchant_aspell.so
        )

    [5] =&gt; Array
        (
            [lang_tag] =&gt; en_US
            [provider_name] =&gt; aspell
            [provider_desc] =&gt; Aspell Provider
            [provider_file] =&gt; /usr/lib/enchant/libenchant_aspell.so
        )

    [6] =&gt; Array
        (
            [lang_tag] =&gt; hi_IN
            [provider_name] =&gt; myspell
            [provider_desc] =&gt; Myspell Provider
            [provider_file] =&gt; /usr/lib/enchant/libenchant_myspell.so
        )

)

### Ver también

    - [enchant_broker_describe()](#function.enchant-broker-describe) - Enumera los proveedores Enchant

# enchant_broker_request_dict

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_request_dict — Crear un nuevo diccionario usando una etiqueta

### Descripción

**enchant_broker_request_dict**([EnchantBroker](#class.enchantbroker) $broker, [string](#language.types.string) $tag): [EnchantDictionary](#class.enchantdictionary)|[false](#language.types.singleton)

crea un nuevo diccionario usando una etiqueta, la etiqueta de idioma no vacía que
desea solicitar para un diccionario ("en_US", "de_DE", ...)

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).






     tag


       Una etiqueta que describe la configuración local, por ejemplo en_US, de_DE





### Valores devueltos

Devuelve un recurso de diccionario en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de [EnchantDictionary](#class.enchantdictionary);
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ejemplos

**Ejemplo #1 Un ejemplo de enchant_broker_request_dict()**

    Comprueba si existe un diccionario usando
    [enchant_broker_dict_exists()](#function.enchant-broker-dict-exists) y solicítalo.

&lt;?php
$tag = 'en_US';
$broker = enchant_broker_init();
if (enchant_broker_dict_exists($broker,$tag)) {
$dict = enchant_broker_request_dict($broker, $tag);
    var_dump($dict);
}
?&gt;

### Ver también

    - [enchant_dict_describe()](#function.enchant-dict-describe) - Describe un diccionario individual

    - [enchant_broker_dict_exists()](#function.enchant-broker-dict-exists) - Verifica si un diccionario existe

    - [enchant_broker_free_dict()](#function.enchant-broker-free-dict) - Libera un recurso de diccionario

# enchant_broker_request_pwl_dict

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_request_pwl_dict — Crea un diccionario utilizando un archivo PWL

### Descripción

**enchant_broker_request_pwl_dict**([EnchantBroker](#class.enchantbroker) $broker, [string](#language.types.string) $filename): [EnchantDictionary](#class.enchantdictionary)|[false](#language.types.singleton)

Crea un diccionario utilizando un archivo PWL. Un archivo PWL es un archivo
de palabras personales que contiene una palabra por línea.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).






     filename


       Ruta de acceso al archivo PWL.
       Si el archivo no existe, se creará uno nuevo, si es posible.





### Valores devueltos

Devuelve un recurso de diccionario en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de [EnchantDictionary](#class.enchantdictionary) ;
       anteriormente se devolvía una [resource](#language.types.resource).



### Ver también

    - [enchant_dict_describe()](#function.enchant-dict-describe) - Describe un diccionario individual

    - [enchant_broker_dict_exists()](#function.enchant-broker-dict-exists) - Verifica si un diccionario existe

    - [enchant_broker_free_dict()](#function.enchant-broker-free-dict) - Libera un recurso de diccionario

# enchant_broker_set_dict_path

(PHP 5 &gt;= 5.3.1, PHP 7, PHP 8, PECL enchant &gt;= 1.0.1)

enchant_broker_set_dict_path — Define la ruta del directorio para un backend proporcionado

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**enchant_broker_set_dict_path**([EnchantBroker](#class.enchantbroker) $broker, [int](#language.types.integer) $type, [string](#language.types.string) $path): [bool](#language.types.boolean)

Define la ruta del directorio para un backend proporcionado.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).






     type


       El tipo de los diccionarios, es decir, **[ENCHANT_MYSPELL](#constant.enchant-myspell)**
       o **[ENCHANT_ISPELL](#constant.enchant-ispell)**.






     path


       La ruta del directorio del diccionario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada.





8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Notas

**Nota**:

    Esta función solo está disponible si la extensión ha sido compilada con Enchant v1.

### Ver también

    - [enchant_broker_get_dict_path()](#function.enchant-broker-get-dict-path) - Obtiene la ruta del directorio para un backend proporcionado

# enchant_broker_set_ordering

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_broker_set_ordering — Declara una preferencia para un diccionario de un idioma

### Descripción

**enchant_broker_set_ordering**([EnchantBroker](#class.enchantbroker) $broker, [string](#language.types.string) $tag, [string](#language.types.string) $ordering): [bool](#language.types.boolean)

Declara una preferencia para un diccionario a utilizar para el idioma
especificado por el argumento tag.
El orden de los idiomas es una lista separada por comas.
El carácter especial "\*" puede ser utilizado como idioma para declarar
un orden por defecto para todos los idiomas que no declaren
explícitamente un orden.

### Parámetros

     broker


       An Enchant broker returned by [enchant_broker_init()](#function.enchant-broker-init).






     tag


       El idioma. El carácter "*" puede ser utilizado como idioma
       para declarar un orden por defecto para todos los idiomas
       que no declaren explícitamente un orden.






     ordering


       Lista de nombres de proveedores separada por comas





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

broker expects an [EnchantBroker](#class.enchantbroker) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

# enchant_dict_add

(PHP 8)

enchant_dict_add — Añadir una palabra a la lista personal de palabras

### Descripción

**enchant_dict_add**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $word): [void](language.types.void.html)

Añade una palabra a la lista personal de palabras del diccionario dado.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     word


       La palabra a añadir





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Añadir una palabra a una PWL**

&lt;?php

$filename = './my_word_list.pwl';
$word = 'Supercalifragilisticexpialidocious';

$broker = enchant_broker_init();
$dict = enchant_broker_request_pwl_dict($broker, $filename);

enchant_dict_add($dict, $word);

?&gt;

### Ver también

    - [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict) - Crea un diccionario utilizando un archivo PWL

    - [enchant_broker_request_dict()](#function.enchant-broker-request-dict) - Crear un nuevo diccionario usando una etiqueta

# enchant_dict_add_to_personal

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_add_to_personal — Alias de [enchant_dict_add()](#function.enchant-dict-add)

**Advertencia**Este alias está
_OBSOLETO_ en PHP 8.0.0.

### Descripción

Esta función es un alias de:
[enchant_dict_add()](#function.enchant-dict-add).

# enchant_dict_add_to_session

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_add_to_session — Añade una palabra a la sesión actual

### Descripción

**enchant_dict_add_to_session**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $word): [void](language.types.void.html)

Añade la palabra word al diccionario proporcionado.
Solo será añadida para la sesión actual.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     word


       La palabra a añadir





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ver también

    - [enchant_broker_request_dict()](#function.enchant-broker-request-dict) - Crear un nuevo diccionario usando una etiqueta

# enchant_dict_check

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_check — Verifica si una palabra está correctamente escrita

### Descripción

**enchant_dict_check**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $word): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si la palabra word está correctamente
escrita, **[false](#constant.false)** en caso contrario.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     word


       La palabra a verificar





### Valores devueltos

Devuelve **[true](#constant.true)** si la palabra está correctamente escrita, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

# enchant_dict_describe

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_describe — Describe un diccionario individual

### Descripción

**enchant_dict_describe**([EnchantDictionary](#class.enchantdictionary) $dictionary): [array](#language.types.array)

Devuelve los detalles del diccionario.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

      8.0.0

       Antes de esta versión, la función devolvía **[false](#constant.false)** en caso de error.



### Ejemplos

**Ejemplo #1 Ejemplo de enchant_dict_describe()**

    Comprueba si existe un diccionario usando
    [enchant_broker_dict_exists()](#function.enchant-broker-dict-exists) y muestra sus detalles.

&lt;?php
$tag = 'en_US';
$broker = enchant_broker_init();
if (enchant_broker_dict_exists($broker, $tag)) {
    $dict = enchant_broker_request_dict($broker, $tag);
    $dict_details = enchant_dict_describe($dict);
print_r($dict_details);
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[lang] =&gt; en_US
[name] =&gt; aspell
[desc] =&gt; Proveedor Aspell
[file] =&gt; /usr/lib/enchant/libenchant_aspell.so
)

# enchant_dict_get_error

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_get_error — Devuelve el último error de la sesión actual

### Descripción

**enchant_dict_get_error**([EnchantDictionary](#class.enchantdictionary) $dictionary): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el último error de la sesión actual.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).





### Valores devueltos

Devuelve el mensaje de error en forma de string,
o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

# enchant_dict_is_added

(PHP 8)

enchant_dict_is_added — Si el 'mot' existe o no en esta sesión de ortografía

### Descripción

**enchant_dict_is_added**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $word): [bool](#language.types.boolean)

Informa si la palabra ya existe o no en la sesión actual.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     word


       La palabra a buscar





### Valores devueltos

Devuelve **[true](#constant.true)** si la palabra existe o **[false](#constant.false)**

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ver también

    - [enchant_dict_add_to_session()](#function.enchant-dict-add-to-session) - Añade una palabra a la sesión actual

# enchant_dict_is_in_session

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_is_in_session — Alias de [enchant_dict_is_added()](#function.enchant-dict-is-added)

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

Esta función es un alias de:
[enchant_dict_is_added()](#function.enchant-dict-is-added).

# enchant_dict_quick_check

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant:0.2.0-1.0.1)

enchant_dict_quick_check — Verifica si la palabra está correctamente escrita y proporciona sugerencias

### Descripción

**enchant_dict_quick_check**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $word, [array](#language.types.array) &amp;$suggestions = **[null](#constant.null)**): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si la palabra está correctamente escrita, **[false](#constant.false)** si la variable de sugerencias es proporcionada,
y la llena con las sugerencias posibles.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     word


       La palabra a verificar






     suggestions


       Si la palabra no está correctamente escrita, esta variable contendrá
       un array de sugerencias.





### Valores devueltos

Devuelve **[true](#constant.true)** si la palabra está correctamente escrita, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con enchant_dict_quick_check()**

&lt;?php
$tag = 'en_US';
$r = enchant_broker_init();

if (enchant_broker_dict_exists($r,$tag)) {
$d = enchant_broker_request_dict($r, $tag);
    enchant_dict_quick_check($d, 'soong', $suggs);
    print_r($suggs);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; song
[1] =&gt; snog
[2] =&gt; soon
[3] =&gt; Sang
[4] =&gt; Sung
[5] =&gt; sang
[6] =&gt; sung
[7] =&gt; sponge
[8] =&gt; spongy
[9] =&gt; snag
[10] =&gt; snug
[11] =&gt; sonic
[12] =&gt; sing
[13] =&gt; songs
[14] =&gt; Son
[15] =&gt; Sonja
[16] =&gt; Synge
[17] =&gt; son
[18] =&gt; Sejong
[19] =&gt; sarong
[20] =&gt; sooner
[21] =&gt; Sony
[22] =&gt; sown
[23] =&gt; scone
[24] =&gt; song's
)

### Ver también

    - [enchant_dict_check()](#function.enchant-dict-check) - Verifica si una palabra está correctamente escrita

    - [enchant_dict_suggest()](#function.enchant-dict-suggest) - Devolverá una lista de valores si no se cumplen alguna de las precondiciones

# enchant_dict_store_replacement

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_store_replacement — Añade una ortografía para una palabra

### Descripción

**enchant_dict_store_replacement**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $misspelled, [string](#language.types.string) $correct): [void](language.types.void.html)

Añade una ortografía para misspelled utilizando correct.
Tenga en cuenta que si se reemplaza @mis por @cor, entonces es probable que las futuras ocurrencias
de @mis sean reemplazadas por @cor. Así, @cor será añadido a la lista de sugerencias.

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     misspelled


       La palabra a tratar






     correct


       La palabra correcta





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

# enchant_dict_suggest

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL enchant &gt;= 0.1.0 )

enchant_dict_suggest — Devolverá una lista de valores si no se cumplen alguna de las precondiciones

### Descripción

**enchant_dict_suggest**([EnchantDictionary](#class.enchantdictionary) $dictionary, [string](#language.types.string) $word): [array](#language.types.array)

### Parámetros

     dictionary


       An Enchant dictionary returned by [enchant_broker_request_dict()](#function.enchant-broker-request-dict)
       or [enchant_broker_request_pwl_dict()](#function.enchant-broker-request-pwl-dict).






     word


       Palabra para la que se generarán sugerencias.





### Valores devueltos

Devuelve un array de sugerencias si la palabra está mal escrita.

### Historial de cambios

      Versión
      Descripción







8.0.0

dictionary expects an [EnchantDictionary](#class.enchantdictionary) instance now;
previoulsy, a [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo de uso de enchant_dict_suggest()**

&lt;?php
$tag = 'en_US';
$r = enchant_broker_init();
if (enchant_broker_dict_exists($r,$tag)) {
$d = enchant_broker_request_dict($r, $tag);

    $wordcorrect = enchant_dict_check($d, "soong");
    if (!$wordcorrect) {
        $suggs = enchant_dict_suggest($d, "soong");
        echo "Sugerencias para 'soong':";
        print_r($suggs);
    }

}
?&gt;

### Ver también

    - [enchant_dict_check()](#function.enchant-dict-check) - Verifica si una palabra está correctamente escrita

    - [enchant_dict_quick_check()](#function.enchant-dict-quick-check) - Verifica si la palabra está correctamente escrita y proporciona sugerencias

## Tabla de contenidos

- [enchant_broker_describe](#function.enchant-broker-describe) — Enumera los proveedores Enchant
- [enchant_broker_dict_exists](#function.enchant-broker-dict-exists) — Verifica si un diccionario existe
- [enchant_broker_free](#function.enchant-broker-free) — Libera los recursos del patrocinador así como sus diccionarios
- [enchant_broker_free_dict](#function.enchant-broker-free-dict) — Libera un recurso de diccionario
- [enchant_broker_get_dict_path](#function.enchant-broker-get-dict-path) — Obtiene la ruta del directorio para un backend proporcionado
- [enchant_broker_get_error](#function.enchant-broker-get-error) — Devuelve el último error de un sponsor
- [enchant_broker_init](#function.enchant-broker-init) — Crea un nuevo objeto sponsor
- [enchant_broker_list_dicts](#function.enchant-broker-list-dicts) — Devuelve una lista de todos los diccionarios disponibles
- [enchant_broker_request_dict](#function.enchant-broker-request-dict) — Crear un nuevo diccionario usando una etiqueta
- [enchant_broker_request_pwl_dict](#function.enchant-broker-request-pwl-dict) — Crea un diccionario utilizando un archivo PWL
- [enchant_broker_set_dict_path](#function.enchant-broker-set-dict-path) — Define la ruta del directorio para un backend proporcionado
- [enchant_broker_set_ordering](#function.enchant-broker-set-ordering) — Declara una preferencia para un diccionario de un idioma
- [enchant_dict_add](#function.enchant-dict-add) — Añadir una palabra a la lista personal de palabras
- [enchant_dict_add_to_personal](#function.enchant-dict-add-to-personal) — Alias de enchant_dict_add
- [enchant_dict_add_to_session](#function.enchant-dict-add-to-session) — Añade una palabra a la sesión actual
- [enchant_dict_check](#function.enchant-dict-check) — Verifica si una palabra está correctamente escrita
- [enchant_dict_describe](#function.enchant-dict-describe) — Describe un diccionario individual
- [enchant_dict_get_error](#function.enchant-dict-get-error) — Devuelve el último error de la sesión actual
- [enchant_dict_is_added](#function.enchant-dict-is-added) — Si el 'mot' existe o no en esta sesión de ortografía
- [enchant_dict_is_in_session](#function.enchant-dict-is-in-session) — Alias de enchant_dict_is_added
- [enchant_dict_quick_check](#function.enchant-dict-quick-check) — Verifica si la palabra está correctamente escrita y proporciona sugerencias
- [enchant_dict_store_replacement](#function.enchant-dict-store-replacement) — Añade una ortografía para una palabra
- [enchant_dict_suggest](#function.enchant-dict-suggest) — Devolverá una lista de valores si no se cumplen alguna de las precondiciones

# La clase EnchantBroker

(PHP 8)

## Introducción

    Una clase totalmente opaca que reemplaza los recursos enchant_broker a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **EnchantBroker**
     {

}

# La clase EnchantDictionary

(PHP 8)

## Introducción

    Una clase totalmente opaca que reemplaza los recursos enchant_dict a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **EnchantDictionary**
     {

}

- [Introducción](#intro.enchant)
- [Instalación/Configuración](#enchant.setup)<li>[Requerimientos](#enchant.requirements)
- [Instalación](#enchant.installation)
- [Tipos de recursos](#enchant.resources)
  </li>- [Constantes predefinidas](#enchant.constants)
- [Ejemplos](#enchant.examples)
- [Funciones de Enchant](#ref.enchant)<li>[enchant_broker_describe](#function.enchant-broker-describe) — Enumera los proveedores Enchant
- [enchant_broker_dict_exists](#function.enchant-broker-dict-exists) — Verifica si un diccionario existe
- [enchant_broker_free](#function.enchant-broker-free) — Libera los recursos del patrocinador así como sus diccionarios
- [enchant_broker_free_dict](#function.enchant-broker-free-dict) — Libera un recurso de diccionario
- [enchant_broker_get_dict_path](#function.enchant-broker-get-dict-path) — Obtiene la ruta del directorio para un backend proporcionado
- [enchant_broker_get_error](#function.enchant-broker-get-error) — Devuelve el último error de un sponsor
- [enchant_broker_init](#function.enchant-broker-init) — Crea un nuevo objeto sponsor
- [enchant_broker_list_dicts](#function.enchant-broker-list-dicts) — Devuelve una lista de todos los diccionarios disponibles
- [enchant_broker_request_dict](#function.enchant-broker-request-dict) — Crear un nuevo diccionario usando una etiqueta
- [enchant_broker_request_pwl_dict](#function.enchant-broker-request-pwl-dict) — Crea un diccionario utilizando un archivo PWL
- [enchant_broker_set_dict_path](#function.enchant-broker-set-dict-path) — Define la ruta del directorio para un backend proporcionado
- [enchant_broker_set_ordering](#function.enchant-broker-set-ordering) — Declara una preferencia para un diccionario de un idioma
- [enchant_dict_add](#function.enchant-dict-add) — Añadir una palabra a la lista personal de palabras
- [enchant_dict_add_to_personal](#function.enchant-dict-add-to-personal) — Alias de enchant_dict_add
- [enchant_dict_add_to_session](#function.enchant-dict-add-to-session) — Añade una palabra a la sesión actual
- [enchant_dict_check](#function.enchant-dict-check) — Verifica si una palabra está correctamente escrita
- [enchant_dict_describe](#function.enchant-dict-describe) — Describe un diccionario individual
- [enchant_dict_get_error](#function.enchant-dict-get-error) — Devuelve el último error de la sesión actual
- [enchant_dict_is_added](#function.enchant-dict-is-added) — Si el 'mot' existe o no en esta sesión de ortografía
- [enchant_dict_is_in_session](#function.enchant-dict-is-in-session) — Alias de enchant_dict_is_added
- [enchant_dict_quick_check](#function.enchant-dict-quick-check) — Verifica si la palabra está correctamente escrita y proporciona sugerencias
- [enchant_dict_store_replacement](#function.enchant-dict-store-replacement) — Añade una ortografía para una palabra
- [enchant_dict_suggest](#function.enchant-dict-suggest) — Devolverá una lista de valores si no se cumplen alguna de las precondiciones
  </li>- [EnchantBroker](#class.enchantbroker) — La clase EnchantBroker
- [EnchantDictionary](#class.enchantdictionary) — La clase EnchantDictionary
