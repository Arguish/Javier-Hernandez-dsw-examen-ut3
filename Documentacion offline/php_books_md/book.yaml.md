# Serialización de datos YAML

# Introducción

Esta extensión implementa el estándar de serialización de datos
[» YAML Ain't Markup Language (YAML)](http://www.yaml.org/). El análisis y
la creación son manejados por la biblioteca
[» LibYAML](http://pyyaml.org/wiki/LibYAML).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#yaml.requirements)
- [Instalación](#yaml.installation)
- [Configuración en tiempo de ejecución](#yaml.configuration)

    ## Requerimientos

    Esta extensión requiere la [» LibYAML C
    library](http://pyyaml.org/wiki/LibYAML) versión 0.1.0 o superior instalada.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/yaml](https://pecl.php.net/package/yaml).

    ## Configuración en tiempo de ejecución

    El comportamiento de estas funciones es
    afectado por la configuración en el archivo php.ini.

          <caption>**Opciones de configuración de Yaml**</caption>



                Nombre
                Por defecto
                Cambiable
                Historial de cambios






                [yaml.decode_binary](#ini.yaml.decode-binary)
                0
                **[INI_ALL](#constant.ini-all)**




               [yaml.decode_php](#ini.yaml.decode-php)
               0
               **[INI_ALL](#constant.ini-all)**
               Añadido en 1.2.0, antes de 2.0.0 el valor predeterminado era 1



                [yaml.decode_timestamp](#ini.yaml.decode-timestamp)
                0
                **[INI_ALL](#constant.ini-all)**




                [yaml.output_canonical](#ini.yaml.output-canonical)
                0
                **[INI_ALL](#constant.ini-all)**




                [yaml.output_indent](#ini.yaml.output-indent)
                2
                **[INI_ALL](#constant.ini-all)**




                [yaml.output_width](#ini.yaml.output-width)
                80
                **[INI_ALL](#constant.ini-all)**






    Aquí hay una aclaración sobre
    el uso de las directivas de configuración.

              yaml.decode_binary
              [boolean](#language.types.boolean)



                Off por omisión, pero puede estar activado el uso de entidades base64 codificadas binariamente que tenga explicitamente el tag "tag:yaml.org,2002:binary" para ser decodificado.







              yaml.decode_php
              [bool](#language.types.boolean)



                Desactivado por omisión, pero puede ser configurado como activado para que los objetos PHP serializados que tienen la etiqueta explícita "!php/object" sean deserializados.







              yaml.decode_timestamp
              [int](#language.types.integer)



               Controla la decodificación de los escalares "tag:yaml.org,2002:timestamp" tanto implícitos como explícitos
               en el flujo del documento YAML. La configuración predeterminada de 0 no aplicará ninguna
               decodificación. Una configuración de 1 utilizará [strtotime()](#function.strtotime)
               para analizar el valor de la marca de tiempo como una marca de tiempo Unix. Una configuración
               de 2 utilizará [date_create()](#function.date-create) para analizar el valor de la marca
               de tiempo como un objeto [DateTime](#class.datetime).







              yaml.output_canonical
              [bool](#language.types.boolean)



                Off por omisión, pero puede estar activado de manera convencional desde su salida.







              yaml.output_indent
              [int](#language.types.integer)



                Números de espacios para la identación. El valor debe comprender entre
                1 y 10.







              yaml.output_width
              [int](#language.types.integer)



                Establece el ancho de línea de preferencia. -1 significa sin límite.






# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Estilos de entidad escalar utilizables por los métodos
de retrollamada de [yaml_parse()](#function.yaml-parse)**

    **[YAML_ANY_SCALAR_STYLE](#constant.yaml-any-scalar-style)**
    ([int](#language.types.integer))








    **[YAML_PLAIN_SCALAR_STYLE](#constant.yaml-plain-scalar-style)**
    ([int](#language.types.integer))








    **[YAML_SINGLE_QUOTED_SCALAR_STYLE](#constant.yaml-single-quoted-scalar-style)**
    ([int](#language.types.integer))








    **[YAML_DOUBLE_QUOTED_SCALAR_STYLE](#constant.yaml-double-quoted-scalar-style)**
    ([int](#language.types.integer))








    **[YAML_LITERAL_SCALAR_STYLE](#constant.yaml-literal-scalar-style)**
    ([int](#language.types.integer))








    **[YAML_FOLDED_SCALAR_STYLE](#constant.yaml-folded-scalar-style)**
    ([int](#language.types.integer))

**Etiquetas comunes utilizables por los métodos
de retrollamada de [yaml_parse()](#function.yaml-parse).**

    **[YAML_NULL_TAG](#constant.yaml-null-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:null"





    **[YAML_BOOL_TAG](#constant.yaml-bool-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:bool"





    **[YAML_STR_TAG](#constant.yaml-str-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:str"





    **[YAML_INT_TAG](#constant.yaml-int-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:int"





    **[YAML_FLOAT_TAG](#constant.yaml-float-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:float"





    **[YAML_TIMESTAMP_TAG](#constant.yaml-timestamp-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:timestamp"





    **[YAML_SEQ_TAG](#constant.yaml-seq-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:seq"





    **[YAML_MAP_TAG](#constant.yaml-map-tag)**
    ([string](#language.types.string))



     "tag:yaml.org,2002:map"





    **[YAML_PHP_TAG](#constant.yaml-php-tag)**
    ([string](#language.types.string))



     "!php/object"

**Tipos de codificación para [yaml_emit()](#function.yaml-emit)**

    **[YAML_ANY_ENCODING](#constant.yaml-any-encoding)**
    ([int](#language.types.integer))



     Dejar que el emisor elija una codificación.





    **[YAML_UTF8_ENCODING](#constant.yaml-utf8-encoding)**
    ([int](#language.types.integer))



     Codificar como UTF8.





    **[YAML_UTF16LE_ENCODING](#constant.yaml-utf16le-encoding)**
    ([int](#language.types.integer))



     Codificar como UTF16LE.





    **[YAML_UTF16BE_ENCODING](#constant.yaml-utf16be-encoding)**
    ([int](#language.types.integer))



     Codificar como UTF16BE.

**Tipos de saltos de línea para [yaml_emit()](#function.yaml-emit)**

    **[YAML_ANY_BREAK](#constant.yaml-any-break)**
    ([int](#language.types.integer))



     Dejar que el emisor elija el carácter de salto de línea.





    **[YAML_CR_BREAK](#constant.yaml-cr-break)**
    ([int](#language.types.integer))



     Usar \r como carácter de salto (al estilo de Mac).





    **[YAML_LN_BREAK](#constant.yaml-ln-break)**
    ([int](#language.types.integer))



     Usar \n como carácter de salto (al estilo de Unix).





    **[YAML_CRLN_BREAK](#constant.yaml-crln-break)**
    ([int](#language.types.integer))



     Usar \r\n como cáracter de salto (al estilo de DOS).

# Ejemplos

**Ejemplo #1 Yaml Example**

&lt;?php
$addr = array(
    "given" =&gt; "Chris",
    "family"=&gt; "Dumars",
    "address"=&gt; array(
        "lines"=&gt; "458 Walkman Dr.
        Suite #292",
        "city"=&gt; "Royal Oak",
        "state"=&gt; "MI",
        "postal"=&gt; 48046,
      ),
  );
$invoice = array (
"invoice"=&gt; 34843,
"date"=&gt; "2001-01-23",
"bill-to"=&gt; $addr,
"ship-to"=&gt; $addr,
"product"=&gt; array(
array(
"sku"=&gt; "BL394D",
"quantity"=&gt; 4,
"description"=&gt; "Basketball",
"price"=&gt; 450,
),
array(
"sku"=&gt; "BL4438H",
"quantity"=&gt; 1,
"description"=&gt; "Super Hoop",
"price"=&gt; 2392,
),
),
"tax"=&gt; 251.42,
"total"=&gt; 4443.52,
"comments"=&gt; "Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338.",
);

// genera un representación de la factura en YAML
$yaml = yaml_emit($invoice);
var_dump($yaml);

// convierte lo anterior en YAML a una variable PHP
$parsed = yaml_parse($yaml);

// verifica que la comprobación de ida y vuelta a una extructura equivalente
var_dump($parsed == $invoice);
?&gt;

Resultado del ejemplo anterior es similar a:

string(631) "---
invoice: 34843
date: "2001-01-23"
bill-to:
given: Chris
family: Dumars
address:
lines: |-
458 Walkman Dr.
Suite #292
city: Royal Oak
state: MI
postal: 48046
ship-to:
given: Chris
family: Dumars
address:
lines: |-
458 Walkman Dr.
Suite #292
city: Royal Oak
state: MI
postal: 48046
product:

- sku: BL394D
  quantity: 4
  description: Basketball
  price: 450
- sku: BL4438H
  quantity: 1
  description: Super Hoop
  price: 2392
  tax: 251.420000
  total: 4443.520000
  comments: Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338.
  ...
  "
  bool(true)

# Callbacks

## Tabla de contenidos

- [Análisis de callbacks](#yaml.callbacks.parse)
- [Emitir callbacks](#yaml.callbacks.emit)

    ## Análisis de callbacks

    Los análisis de [callable](#language.types.callable)s son invocados por las funciones
    [yaml_parse()](#function.yaml-parse), [yaml_parse_file()](#function.yaml-parse-file) o
    [yaml_parse_url()](#function.yaml-parse-url) cuando encuentran una etiqueta YAML
    registrada. Al callback se le pasa el valor de la entidad de la etiqueta, la etiqueta,
    y los flags que indican el estilo escalar de la entidad. El callback debe
    devolver los datos que el convertidor YAML debe emitir para esta entidad.

    **Ejemplo #1 Ejemplo de análisis de callback**

&lt;?php
/\*\*

- Análisis de callback para un tag yaml.
- @param mixed $valor Datos del archivo yaml
- @param string $tag Etiqueta que desencadenó el callback
- @param int $flags Estilo escalar de la entidad (ver YAML\_\*\_SCALAR_STYLE)
- @return mixed Valor que el convertidor YAML debería emitir para el valor dado
  \*/
  function tag_callback ($valor, $tag, $flags) {
  var_dump(func_get_args()); // depurando
  return "Hola {$valor}";
  }

$yaml = &lt;&lt;&lt;YAML
saludo: !ejemplo/hola Mundo
YAML;

$resultado = yaml_parse($yaml, 0, $ndocs, array(
'!ejemplo/hola' =&gt; 'tag_callback',
));

var_dump($resultado);
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
string(5) "Mundo"
[1]=&gt;
string(14) "!ejemplo/hola"
[2]=&gt;
int(1)
}
array(1) {
["saludo"]=&gt;
string(11) "Hola Mundo"
}

## Emitir callbacks

Las emisiones de callbacks son invocadas cuando una instancia de una clase registrada es
emitida por la función [yaml_emit()](#function.yaml-emit) o la función
[yaml_emit_file()](#function.yaml-emit-file). El callback se pasa al objeto a
ser emitido. El callback debe devolver un array que contenga dos claves:
"tag" y "data".
El valor asociado con la clave "tag" debe
ser un string a ser usado como la etiqueta YAML en la salida. El valor asociado
con la clave "data" será encodeado como YAML
y será emitido en lugar del objeto interceptado.

**Ejemplo #1 Ejemplo de emisión de callback**

&lt;?php
class EmitExample {
public $data; // los datos podrían ser ajustables en cualquier tipo de pecl/yaml

public function \_\_construct ($d) {
$this-&gt;data = $d;
}

/\*\*

- Yaml emite la función de callback, referida a la llamada yaml_emit por el nombre de la clase.
-
- Se espera que devuelva un array con 2 valores:
-   - 'tag': etiqueta personalizada para esta serialización
-   - 'data': valor que se convierte a yaml (ya sea array, string, bool, número)
-
- @param object $obj Objeto a ser emitido
- @return array Etiqueta y datos sustitutivos a emitir
  \*/
  public static function yamlEmit (EmitExample $obj) {
  return array(
  'tag' =&gt; '!example/emit',
  'data' =&gt; $obj-&gt;data,
  );
  }
  }

$emit_callbacks = array(
'EmitExample' =&gt; array('EmitExample', 'yamlEmit')
);

$t = new EmitExample(array('a','b','c'));
$yaml = yaml_emit(
array(
'example' =&gt; $t,
  ),
  YAML_ANY_ENCODING,
  YAML_ANY_BREAK,
  $emit_callbacks
);
var_dump($yaml);
?&gt;

Resultado del ejemplo anterior es similar a:

string(43) "---
example: !example/emit

- a
- b
- c
  ...
  "

# Funciones de Yaml

# yaml_emit

(PECL yaml &gt;= 0.5.0)

yaml_emit — Devuelve la representación de un valor YAML

### Descripción

**yaml_emit**(
    [mixed](#language.types.mixed) $data,
    [int](#language.types.integer) $encoding = YAML_ANY_ENCODING,
    [int](#language.types.integer) $linebreak = YAML_ANY_BREAK,
    [array](#language.types.array) $callbacks = **[null](#constant.null)**
): [string](#language.types.string)

Genera una representación YAML de los datos en data proporcionados.

### Parámetros

     data


       La data se codifica. Puede ser de cualquier tipo excepto
       un [resource](#language.types.resource).






     encoding


       Salida de codificación de caracteres elegidos desde
       **[YAML_ANY_ENCODING](#constant.yaml-any-encoding)**,
       **[YAML_UTF8_ENCODING](#constant.yaml-utf8-encoding)**,
       **[YAML_UTF16LE_ENCODING](#constant.yaml-utf16le-encoding)**,
       **[YAML_UTF16BE_ENCODING](#constant.yaml-utf16be-encoding)**.






     linebreak


       Estilo de salida de línea de salto desde:
       **[YAML_ANY_BREAK](#constant.yaml-any-break)**,
       **[YAML_CR_BREAK](#constant.yaml-cr-break)**,
       **[YAML_LN_BREAK](#constant.yaml-ln-break)**,
       **[YAML_CRLN_BREAK](#constant.yaml-crln-break)**.






     callbacks


       Gestores de contenido para emitir nodos YAML. [array](#language.types.array) asociativo
       de referenciaciones de nombres de clase =&gt; [callable](#language.types.callable). Véase
       [emitir llamadas de retorno](#yaml.callbacks.emit) para más
       detalles.





### Valores devueltos

Devuelve un [string](#language.types.string) de YAML codificado si es correcto.

### Historial de cambios

       Versión
       Descripción






       PECL yaml 1.1.0

        Se añadió el parámetro callbacks.





### Ejemplos

    **Ejemplo #1 Ejemplo de yaml_emit()**

&lt;?php
$addr = array(
    "given" =&gt; "Chris",
    "family"=&gt; "Dumars",
    "address"=&gt; array(
        "lines"=&gt; "458 Walkman Dr.
        Suite #292",
        "city"=&gt; "Royal Oak",
        "state"=&gt; "MI",
        "postal"=&gt; 48046,
      ),
  );
$invoice = array (
"invoice"=&gt; 34843,
"date"=&gt; 980208000,
"bill-to"=&gt; $addr,
    "ship-to"=&gt; $addr,
    "product"=&gt; array(
        array(
            "sku"=&gt; "BL394D",
            "quantity"=&gt; 4,
            "description"=&gt; "Basketball",
            "price"=&gt; 450,
          ),
        array(
            "sku"=&gt; "BL4438H",
            "quantity"=&gt; 1,
            "description"=&gt; "Super Hoop",
            "price"=&gt; 2392,
          ),
      ),
    "tax"=&gt; 251.42,
    "total"=&gt; 4443.52,
    "comments"=&gt; "Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338.",
  );
var_dump(yaml_emit($invoice));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(628) "---
invoice: 34843
date: 980208000
bill-to:
given: Chris
family: Dumars
address:
lines: |-
458 Walkman Dr.
Suite #292
city: Royal Oak
state: MI
postal: 48046
ship-to:
given: Chris
family: Dumars
address:
lines: |-
458 Walkman Dr.
Suite #292
city: Royal Oak
state: MI
postal: 48046
product:

- sku: BL394D
  quantity: 4
  description: Basketball
  price: 450
- sku: BL4438H
  quantity: 1
  description: Super Hoop
  price: 2392
  tax: 251.420000
  total: 4443.520000
  comments: Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338.
  ...
  "

    ### Ver también

        - [yaml_emit_file()](#function.yaml-emit-file) - Enviar la representación YAML de un valor a un fichero

        - [yaml_parse()](#function.yaml-parse) - Analiza una secuencia de texto en formato YAML

    # yaml_emit_file

    (PECL yaml &gt;= 0.5.0)

yaml_emit_file — Enviar la representación YAML de un valor a un fichero

### Descripción

**yaml_emit_file**(
    [string](#language.types.string) $filename,
    [mixed](#language.types.mixed) $data,
    [int](#language.types.integer) $encoding = YAML_ANY_ENCODING,
    [int](#language.types.integer) $linebreak = YAML_ANY_BREAK,
    [array](#language.types.array) $callbacks = **[null](#constant.null)**
): [bool](#language.types.boolean)

Genera una representación YAML de data proporcionada
en el filename.

### Parámetros

     filename


       Ruta a el fichero.






     data


       La data se codifica. Puede ser de cualquier tipo excepto
       un [resource](#language.types.resource).






     encoding


       Salida de codificación de caracteres seleccionando entre
       **[YAML_ANY_ENCODING](#constant.yaml-any-encoding)**,
       **[YAML_UTF8_ENCODING](#constant.yaml-utf8-encoding)**,
       **[YAML_UTF16LE_ENCODING](#constant.yaml-utf16le-encoding)**,
       **[YAML_UTF16BE_ENCODING](#constant.yaml-utf16be-encoding)**.






     linebreak


       Salida del estilo de salto de línea seleccionando entre
       **[YAML_ANY_BREAK](#constant.yaml-any-break)**,
       **[YAML_CR_BREAK](#constant.yaml-cr-break)**,
       **[YAML_LN_BREAK](#constant.yaml-ln-break)**,
       **[YAML_CRLN_BREAK](#constant.yaml-crln-break)**.






     callbacks


       Manejadores de contenido para emitir nodos YAML. [array](#language.types.array)
       asociativo de nombre de clase de asignaciones =&gt; [callable](#language.types.callable). Véase
       [emit callbacks](#yaml.callbacks.emit) para más
       detalles.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL yaml 1.1.0

        El parámetro callbacks fue añadido.





### Ver también

    - [yaml_emit()](#function.yaml-emit) - Devuelve la representación de un valor YAML

    - [yaml_parse()](#function.yaml-parse) - Analiza una secuencia de texto en formato YAML

# yaml_parse

(PECL yaml &gt;= 0.4.0)

yaml_parse — Analiza una secuencia de texto en formato YAML

### Descripción

**yaml_parse**(
    [string](#language.types.string) $input,
    [int](#language.types.integer) $pos = 0,
    [int](#language.types.integer) &amp;$ndocs = ?,
    [array](#language.types.array) $callbacks = **[null](#constant.null)**
): [mixed](#language.types.mixed)

Convierte toda o parte de una secuencia de texto en YAML a una variable en PHP.

### Parámetros

     input


       La secuencia de texto ([string](#language.types.string)) a analizar en formato YAML.






     pos


       Documento YAML a extraer desde la secuencia de texto (-1 para analizar todos
       los documentos, 0 solo para el primer documento, etc).






     ndocs


       Si se facilita ndocs, se completará con el
       número de documentos encontrados en la secuencia de texto.






     callbacks


       Controlador de contenido para los nodos YAML. Es un [array](#language.types.array) asociativo de
       etiquetas YAML =&gt; asociando sus callback correspondientes. Ver
       [Analizar callbacks](#yaml.callbacks.parse) para más
       información.





### Valores devueltos

Devuelve el valor codificado de input en el formato
apropiado de PHP o **[false](#constant.false)** si ocurre un error. Si el valor de pos es -1 devolverá un
[array](#language.types.array) con una entrada por cada documento encontrado en el texto.

### Ejemplos

    **Ejemplo #1 Ejemplo de yaml_parse()**

&lt;?php
$yaml = &lt;&lt;&lt;EOD

---

invoice: 34843
date: "2001-01-23"
bill-to: &amp;id001
given: Chris
family: Dumars
address:
lines: |-
458 Walkman Dr.
Suite #292
city: Royal Oak
state: MI
postal: 48046
ship-to: \*id001
product:

- sku: BL394D
  quantity: 4
  description: Basketball
  price: 450
- sku: BL4438H
  quantity: 1
  description: Super Hoop
  price: 2392
  tax: 251.420000
  total: 4443.520000
  comments: Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338.
  ...
  EOD;

$parsed = yaml_parse($yaml);
var_dump($parsed);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(8) {
["invoice"]=&gt;
int(34843)
["date"]=&gt;
string(10) "2001-01-23"
["bill-to"]=&gt;
&amp;array(3) {
["given"]=&gt;
string(5) "Chris"
["family"]=&gt;
string(6) "Dumars"
["address"]=&gt;
array(4) {
["lines"]=&gt;
string(34) "458 Walkman Dr.
Suite #292"
["city"]=&gt;
string(9) "Royal Oak"
["state"]=&gt;
string(2) "MI"
["postal"]=&gt;
int(48046)
}
}
["ship-to"]=&gt;
&amp;array(3) {
["given"]=&gt;
string(5) "Chris"
["family"]=&gt;
string(6) "Dumars"
["address"]=&gt;
array(4) {
["lines"]=&gt;
string(34) "458 Walkman Dr.
Suite #292"
["city"]=&gt;
string(9) "Royal Oak"
["state"]=&gt;
string(2) "MI"
["postal"]=&gt;
int(48046)
}
}
["product"]=&gt;
array(2) {
[0]=&gt;
array(4) {
["sku"]=&gt;
string(6) "BL394D"
["quantity"]=&gt;
int(4)
["description"]=&gt;
string(10) "Basketball"
["price"]=&gt;
int(450)
}
[1]=&gt;
array(4) {
["sku"]=&gt;
string(7) "BL4438H"
["quantity"]=&gt;
int(1)
["description"]=&gt;
string(10) "Super Hoop"
["price"]=&gt;
int(2392)
}
}
["tax"]=&gt;
float(251.42)
["total"]=&gt;
float(4443.52)
["comments"]=&gt;
string(68) "Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338."
}

### Notas

**Advertencia**

    El procesamiento de las entradas de los usuarios no confiables con **yaml_parse()**
    es peligroso si el uso de [unserialize()](#function.unserialize) está habilitado para
    los nodos usando la etiqueta !php/object. Este comportamiento puede ser
    desactivado por el uso de el ajuste ini yaml.decode_php.

### Ver también

    - [yaml_parse_file()](#function.yaml-parse-file) - Analiza una secuencia de texto en formato YAML desde un fichero

    - [yaml_parse_url()](#function.yaml-parse-url) - Analiza una secuencia de texto Yaml desde una URL

    - [yaml_emit()](#function.yaml-emit) - Devuelve la representación de un valor YAML

# yaml_parse_file

(PECL yaml &gt;= 0.4.0)

yaml_parse_file — Analiza una secuencia de texto en formato YAML desde un fichero

### Descripción

**yaml_parse_file**(
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $pos = 0,
    [int](#language.types.integer) &amp;$ndocs = ?,
    [array](#language.types.array) $callbacks = **[null](#constant.null)**
): [mixed](#language.types.mixed)

Convierte toda o parte de una secuencia de texto en YAML a una variable en PHP.

### Parámetros

     filename


       Ruta del nombre del fichero.






     pos


       Documento YAML a extraer desde la secuencia de texto (-1 para analizar todos
       los documentos, 0 solo para el primer documento, etc).






     ndocs


       Si se facilita ndocs, se completará con el
       número de documentos encontrados en la secuencia de texto.






     callbacks


       Controlador de contenido para los nodos YAML. Es un [array](#language.types.array) asociativo de
       etiquetas YAML =&gt; asociando sus callback correspondientes. Ver
       [Analizar callbacks](#yaml.callbacks.parse) para más
       información.





### Valores devueltos

Devuelve el valor codificado de filename en el formato
apropiado de PHP o **[false](#constant.false)** si ocurre un error. Si el valor de pos es -1 devolverá un
[array](#language.types.array) con una entrada por cada documento encontrado en el texto.

### Notas

**Advertencia**

    El procesamiento de las entradas de los usuarios no confiables con **yaml_parse_file()**
    es peligroso si el uso de [unserialize()](#function.unserialize) está habilitado para
    los nodos usando la etiqueta !php/object. Este comportamiento puede ser
    desactivado por el uso de el ajuste ini yaml.decode_php.

### Ver también

    - [yaml_parse()](#function.yaml-parse) - Analiza una secuencia de texto en formato YAML

    - [yaml_parse_url()](#function.yaml-parse-url) - Analiza una secuencia de texto Yaml desde una URL

    - [yaml_emit()](#function.yaml-emit) - Devuelve la representación de un valor YAML

# yaml_parse_url

(PECL yaml &gt;= 0.4.0)

yaml_parse_url — Analiza una secuencia de texto Yaml desde una URL

### Descripción

**yaml_parse_url**(
    [string](#language.types.string) $url,
    [int](#language.types.integer) $pos = 0,
    [int](#language.types.integer) &amp;$ndocs = ?,
    [array](#language.types.array) $callbacks = **[null](#constant.null)**
): [mixed](#language.types.mixed)

Convierte toda o parte de una secuencia de texto en YAML a una variable en PHP.

### Parámetros

     url


       La dirección url debe tener el formato "scheme://...". PHP
       buscará el controlador de protocolos (también conocido como wrapper) para el
       esquema especificado. Si no hay wrappers registrados para este protocolo, PHP lanzará
       un aviso para ayudar a indentificar posibles problemas con el script y
       continuar como si el nombre del fichero hiciera referencia a un fichero normal.






     pos


       Documento YAML a extraer desde la secuencia de texto (-1 para analizar todos
       los documentos, 0 solo para el primer documento, etc).






     ndocs


       Si se facilita ndocs, se completará con el
       número de documentos encontrados en la secuencia de texto.






     callbacks


       Controlador de contenido para los nodos YAML. Es un [array](#language.types.array) asociativo de
       etiquetas YAML =&gt; asociando sus callback correspondientes. Ver
       [Analizar callbacks](#yaml.callbacks.parse) para más información





### Valores devueltos

Devuelve el valor codificado de url en el formato
apropiado de PHP o **[false](#constant.false)** si ocurre un error. Si el valor de pos es -1 devolverá un
[array](#language.types.array) con una entrada por cada documento encontrado en el texto.

### Notas

**Advertencia**

    El procesamiento de entradas de usuario no confiables con **yaml_parse_url()**
    es peligroso si el uso de [unserialize()](#function.unserialize) está habilitado para
    nodos que utilizan la etiqueta !php/object. Este comportamiento puede ser
    deshabilitado utilizando la configuración ini yaml.decode_php.

### Ver también

    - [yaml_parse()](#function.yaml-parse) - Analiza una secuencia de texto en formato YAML

    - [yaml_parse_file()](#function.yaml-parse-file) - Analiza una secuencia de texto en formato YAML desde un fichero

    - [yaml_emit()](#function.yaml-emit) - Devuelve la representación de un valor YAML

## Tabla de contenidos

- [yaml_emit](#function.yaml-emit) — Devuelve la representación de un valor YAML
- [yaml_emit_file](#function.yaml-emit-file) — Enviar la representación YAML de un valor a un fichero
- [yaml_parse](#function.yaml-parse) — Analiza una secuencia de texto en formato YAML
- [yaml_parse_file](#function.yaml-parse-file) — Analiza una secuencia de texto en formato YAML desde un fichero
- [yaml_parse_url](#function.yaml-parse-url) — Analiza una secuencia de texto Yaml desde una URL

- [Introducción](#intro.yaml)
- [Instalación/Configuración](#yaml.setup)<li>[Requerimientos](#yaml.requirements)
- [Instalación](#yaml.installation)
- [Configuración en tiempo de ejecución](#yaml.configuration)
  </li>- [Constantes predefinidas](#yaml.constants)
- [Ejemplos](#yaml.examples)
- [Callbacks](#yaml.callbacks)<li>[Análisis de callbacks](#yaml.callbacks.parse)
- [Emitir callbacks](#yaml.callbacks.emit)
  </li>- [Funciones de Yaml](#ref.yaml)<li>[yaml_emit](#function.yaml-emit) — Devuelve la representación de un valor YAML
- [yaml_emit_file](#function.yaml-emit-file) — Enviar la representación YAML de un valor a un fichero
- [yaml_parse](#function.yaml-parse) — Analiza una secuencia de texto en formato YAML
- [yaml_parse_file](#function.yaml-parse-file) — Analiza una secuencia de texto en formato YAML desde un fichero
- [yaml_parse_url](#function.yaml-parse-url) — Analiza una secuencia de texto Yaml desde una URL
  </li>
