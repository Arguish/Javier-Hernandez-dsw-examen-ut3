# Igbinary

# Introducción

Igbinary es una mejora del proceso estándar de serialización de datos de PHP que no requiere
ningún cambio de configuración.
En lugar de la representación textual, consumidora de tiempo y espacio, utilizada por la función
[serialize()](#function.serialize) de PHP, igbinary almacena las estructuras de datos de PHP en un formato binario
compacto.
Los ahorros de memoria son significativos cuando memcached, APCu u otras herramientas de almacenamiento similares
basadas en memoria son utilizadas para los datos serializados.
Las reducciones características de los requisitos de almacenamiento son de aproximadamente 50%.
El porcentaje exacto depende de los datos.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#igbinary.installation)
- [Configuración en tiempo de ejecución](#igbinary.configuration)

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/igbinary](https://pecl.php.net/package/igbinary).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Igbinary Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [igbinary.compact_strings](#ini.igbinary.compact-strings)
      1
      **[INI_ALL](#constant.ini-all)**
       


   <caption>**Opciones de configuración de sesión que afectan al comportamiento de igbinary**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [session.save_handler](#ini.igbinary.save-handler)
      "files"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    igbinary.compact_strings
    [bool](#language.types.boolean)



     Activa o no el compactado de strings duplicados.
     El valor por omisión es On.








    session.save_handler
    [string](#language.types.string)



     Igbinary es utilizado como gestor de sesión al establecer el valor de esta opción a igbinary.

# Funciones de Igbinary

# igbinary_serialize

(PECL igbinary &gt;= 1.1.1)

igbinary_serialize — Genera una representación binaria almacenable y compacta de un valor

### Descripción

**igbinary_serialize**([mixed](#language.types.mixed) $value): [string](#language.types.string)|[false](#language.types.singleton)

Genera una representación almacenable de un valor.

Es una técnica práctica para almacenar o pasar valores PHP entre scripts, sin perder su estructura ni su tipo.

Para reconvertir la cadena sérializada en un valor PHP,
la función [igbinary_unserialize()](#function.igbinary-unserialize) puede ser utilizada.

### Parámetros

    value


       El valor a serializar. **igbinary_serialize()**
       gestiona todos los tipos excepto los recursos y ciertos objetos (confiere la nota a continuación).
       Incluso los [array](#language.types.array)x que contienen referencias a sí mismos pueden ser serializados con **igbinary_serialize()**.
       Las referencias circulares dentro de un [array](#language.types.array) o de un [object](#language.types.object) a serializar serán igualmente almacenadas.
       Cualquier otra referencia será perdida.




       Al serializar objetos, igbinary intentará llamar a los métodos mágicos
       [__serialize()](#object.serialize) o
       [__sleep()](#object.sleep) antes de la serialización.
       Esto permitirá al objeto realizar una limpieza de último momento, etc., antes de ser serializado.
       De igual manera, cuando el objeto es restaurado utilizando la función
       [igbinary_unserialize()](#function.igbinary-unserialize), uno de los métodos mágicos [__unserialize()](#object.unserialize)
       o [__wakeup()](#object.wakeup) es llamado.



      **Nota**:



        Los atributos privados de un objeto tendrán el nombre de la clase prefijado al nombre del atributo;
        los atributos protegidos serán prefijados con un asterisco '*'.
        Estos valores prefijados tienen caracteres nulos en ambos lados.






### Valores devueltos

Retorna una cadena de caracteres que contiene una representación del parámetro value
en forma de flujo de bytes que puede ser almacenado en cualquier lugar.

Es de notar que es una cadena binaria que puede incluir caracteres nulos, y debe por lo tanto ser almacenada y gestionada como tal.
Por ejemplo, en una base de datos, la salida de la función **igbinary_serialize()**
debe, en general, ser almacenada en un campo de tipo BLOB
en lugar de en un campo de tipo CHAR o TEXT.

### Ejemplos

    **Ejemplo #1 Ejemplo con igbinary_serialize()**

&lt;?php
$ser = igbinary_serialize(['test', 'test']);
echo urlencode($ser), "\n";
var_export(igbinary_unserialize($ser));
?&gt;

    El ejemplo anterior mostrará:

%00%00%00%02%14%02%06%00%11%04test%06%01%0E%00
array (
0 =&gt; 'test',
1 =&gt; 'test',
)

### Notas

**Nota**:

    Es de notar que muchos objetos internos de PHP no pueden ser serializados. Sin embargo, aquellos que pueden
    implementan ya sea la interfaz [Serializable](#class.serializable) o los métodos mágicos
    [__serialize()](#object.serialize)/[__unserialize()](#object.unserialize)
    o [__sleep()](#object.sleep)/[__wakeup()](#object.wakeup).
    Si una clase interna no cumple ninguna de estas condiciones, no puede ser serializada de manera fiable.




    Existen excepciones históricas a esta regla, donde objetos internos pueden ser serializados
    sin implementar ni la interfaz ni los métodos mágicos.

### Ver también

    - [serialize()](#function.serialize) - Genera una representación almacenable de un valor

    - [igbinary_unserialize()](#function.igbinary-unserialize) - Crea una variable PHP a partir de un valor serializado por igbinary_serialize

    - [var_export()](#function.var-export) - Devuelve el código PHP utilizado para generar una variable

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [Serialización de objetos](#language.oop5.serialization)

    - [__sleep()](#object.sleep)

    - [__wakeup()](#object.wakeup)

    - [__serialize()](#object.serialize)

    - [__unserialize()](#object.unserialize)

# igbinary_unserialize

(PECL igbinary &gt;= 1.1.1)

igbinary_unserialize —
Crea una variable PHP a partir de un valor serializado por [igbinary_serialize()](#function.igbinary-serialize)

### Descripción

**igbinary_unserialize**([string](#language.types.string) $str): [mixed](#language.types.mixed)

**igbinary_unserialize()** toma una variable serializada por
[igbinary_serialize()](#function.igbinary-serialize) y la convierte en una variable PHP.

**Advertencia**

    Las entradas de usuario no confiables no deben pasarse a la función
    **igbinary_unserialize()**.
    La deserialización puede resultar en la ejecución de código cargado y ejecutado durante la instanciación
    y el autochargado de objetos, y así, un usuario malintencionado puede ser capaz de explotar
    este comportamiento.
    En su lugar, un estándar de intercambio seguro como JSON (a través de [json_decode()](#function.json-decode) y
    [json_encode()](#function.json-encode)) debe usarse para pasar datos serializados al usuario.




    Si es indispensable deserializar datos serializados provenientes del exterior, la función
    [hash_hmac()](#function.hash-hmac) puede usarse para validar los datos.
    Es importante verificar que nadie haya alterado los datos.

**Advertencia**

    El protocolo de serialización por igbinary no permite distinguir entre los diferentes grupos de
    referencias. Todas las referencias PHP a un valor dado son vistas como miembros de un mismo
    grupo durante la deserialización, incluso si pertenecían a grupos diferentes antes de la
    serialización.

### Parámetros

    str


      La cadena serializada, generada por [igbinary_serialize()](#function.igbinary-serialize).




      Si la variable deserializada es un [object](#language.types.object), después de reconstruirla con éxito,
      PHP intentará automáticamente llamar a los métodos mágicos
      [__unserialize()](#object.unserialize) o
      [__wakeup()](#object.wakeup) (si alguno de ellos existe).






**Nota**:
**
La directiva [unserialize_callback_func](#ini.unserialize-callback-func)
**

        La función de retrollamada especificada en la directiva
        [unserialize_callback_func](#ini.unserialize-callback-func)
        es llamada cuando una clase no definida es deserializada.
        Si ninguna función de retrollamada es especificada, el objeto será instanciado
        como [__PHP_Incomplete_Class](#class.php-incomplete-class).






### Valores devueltos

El valor convertido es retornado por la función, y puede ser de tipo [bool](#language.types.boolean),
[int](#language.types.integer), [float](#language.types.float), [string](#language.types.string),
[array](#language.types.array), [object](#language.types.object), o de tipo [null](#language.types.null).

Si la cadena pasada no puede ser deserializada, esta función retorna **[false](#constant.false)** y
un diagnóstico **[E_NOTICE](#constant.e-notice)** o **[E_WARNING](#constant.e-warning)** es emitido.

### Errores/Excepciones

Los objetos pueden lanzar un [Throwable](#class.throwable) en su gestor de deserialización.

### Notas

**Advertencia**

    **[null](#constant.null)** o **[false](#constant.false)** es retornado ya sea en caso de error o después de deserializar
    el resultado de la serialización de **[null](#constant.null)** o **[false](#constant.false)**. Es posible discriminar entre estos dos casos
    especiales comparando el valor del parámetro str con el resultado de la ejecución
    de igbinary_serialize(null) o de igbinary_serialize(false)
    o bien atrapando un diagnóstico **[E_NOTICE](#constant.e-notice)**.

### Ver también

    - [unserialize()](#function.unserialize) - Crea una variable PHP a partir de un valor serializado

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

    - [hash_hmac()](#function.hash-hmac) - Genera un valor de clave de hash utilizando el método HMAC

    - [igbinary_serialize()](#function.igbinary-serialize) - Genera una representación binaria almacenable y compacta de un valor

    - [Autocargado de clases](#language.oop5.autoload)

    - [unserialize_callback_func](#ini.unserialize-callback-func)

    - [__wakeup()](#object.wakeup)

    - [__serialize()](#object.serialize)

    - [__unserialize()](#object.unserialize)

## Tabla de contenidos

- [igbinary_serialize](#function.igbinary-serialize) — Genera una representación binaria almacenable y compacta de un valor
- [igbinary_unserialize](#function.igbinary-unserialize) — Crea una variable PHP a partir de un valor serializado por igbinary_serialize

- [Introducción](#intro.igbinary)
- [Instalación/Configuración](#igbinary.setup)<li>[Instalación](#igbinary.installation)
- [Configuración en tiempo de ejecución](#igbinary.configuration)
  </li>- [Funciones de Igbinary](#ref.igbinary)<li>[igbinary_serialize](#function.igbinary-serialize) — Genera una representación binaria almacenable y compacta de un valor
- [igbinary_unserialize](#function.igbinary-unserialize) — Crea una variable PHP a partir de un valor serializado por igbinary_serialize
  </li>
