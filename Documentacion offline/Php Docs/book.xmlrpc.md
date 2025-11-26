# XML-RPC

# Introducción

Estas funciones se pueden usar para escribir servidores y clientes XML-RPC.
Se puede encontrar más información acerca de XML-RPC en
[» http://www.xmlrpc.com/](http://www.xmlrpc.com/), y más
documentación sobre esta extensión y sus funciones en
[» http://xmlrpc-epi.sourceforge.net/](http://xmlrpc-epi.sourceforge.net/).

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xmlrpc.requirements)
- [Instalación](#xmlrpc.installation)
- [Tipos de recursos](#xmlrpc.resources)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

## Instalación

El XML-RPC soportado en PHP no está activado por defecto. Se necesita
usar la opción configuración de **--with-xmlrpc[=DIR]**
cuando es compilado el PHP para activar el soporte a XML-RPC support.

## Tipos de recursos

Ésta extensión define un recurso de servicio de XML-RPC devuelto por
[xmlrpc_server_create()](#function.xmlrpc-server-create).

# Funciones de XML-RPC

# xmlrpc_decode

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_decode — Decodifica el XML en los tipos de PHP nativos

### Descripción

**xmlrpc_decode**([string](#language.types.string) $xml, [string](#language.types.string) $encoding = "iso-8859-1"): [mixed](#language.types.mixed)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     xml


       La respuesta XML devuelta por el método XMLRPC.






     encoding


       Entrada de codificación que admite iconv.





### Valores devueltos

Devuelve o un arreglo, o un entero, o una cadena, o un booleano conforme
a la respuesta devuelta por el método XMLRPC.

### Ejemplos

Ver el ejemplo de [xmlrpc_encode_request()](#function.xmlrpc-encode-request).

### Ver también

    - [xmlrpc_encode_request()](#function.xmlrpc-encode-request) - Genera el XML para un método

    - [xmlrpc_is_fault()](#function.xmlrpc-is-fault) - Determina si el valor de un arreglo representa una falla del XMLRPC

# xmlrpc_decode_request

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_decode_request — Decodifica el XML en los tipos de PHP nativos

### Descripción

**xmlrpc_decode_request**([string](#language.types.string) $xml, [string](#language.types.string) &amp;$method, [string](#language.types.string) $encoding = ?): [mixed](#language.types.mixed)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_encode

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_encode — Genera XML para un valor PHP

### Descripción

**xmlrpc_encode**([mixed](#language.types.mixed) $value): [string](#language.types.string)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_encode_request

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_encode_request — Genera el XML para un método

### Descripción

**xmlrpc_encode_request**([string](#language.types.string) $method, [mixed](#language.types.mixed) $params, [array](#language.types.array) $output_options = ?): [string](#language.types.string)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     method


       Nombre del método a llamar.






     params


       Argumentos del método, compatibles con la firma del método.






     output_options


       Array que especifica las opciones de salida que puede contener (los valores
       por omisión están en negrita):



        - output_type: php, *xml*



        - verbosity: no_white_space, newlines_only, *pretty*



        - escaping: cdata, *non-ascii, non-print, markup*
          (puede ser un string con un valor o un array con varios valores)



        - version: simple, *xmlrpc*, soap 1.1, auto



        - encoding: *iso-8859-1*, otros juegos de caracteres soportados por iconv







### Valores devueltos

Devuelve un string que contiene la representación XML de la solicitud.

### Ejemplos

    **Ejemplo #1 Ejemplo con XMLRPC**

&lt;?php
$request = xmlrpc_encode_request("method", [1, 2, 3]);
$context = stream_context_create([
'http' =&gt; [
'method' =&gt; "POST",
'header' =&gt; "Content-Type: text/xml",
'content' =&gt; $request,
]
]);
$file = file_get_contents("http://www.example.com/xmlrpc", false, $context);
$response = xmlrpc_decode($file);
if ($response &amp;&amp; xmlrpc_is_fault($response)) {
    trigger_error("xmlrpc: $response[faultString] ($response[faultCode])");
} else {
print_r($response);
}
?&gt;

### Ver también

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

    - [file_get_contents()](#function.file-get-contents) - Lee todo un fichero en una cadena

    - [xmlrpc_decode()](#function.xmlrpc-decode) - Decodifica el XML en los tipos de PHP nativos

# xmlrpc_get_type

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_get_type — Obtiene el tipo del xmlrpc para un valor PHP

### Descripción

**xmlrpc_get_type**([mixed](#language.types.mixed) $value): [string](#language.types.string)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

Ésta función es específicamente útil para la base64 y las cadenas fecha-hora.

### Parámetros

     value


       valor de PHP





### Valores devueltos

Devuelve el tipo de XML-RPC.

### Ejemplos

    **Ejemplo #1 Ejemplo de tipo de XML-RPC**

&lt;?php
echo xmlrpc_get_type(null) . "\n"; // base64
echo xmlrpc_get_type(false) . "\n"; // boolean
echo xmlrpc_get_type(1) . "\n"; // int
echo xmlrpc_get_type(1.0) . "\n"; // double
echo xmlrpc_get_type("") . "\n"; // string
echo xmlrpc_get_type(array()) . "\n"; // array
echo xmlrpc_get_type(new stdClass) . "\n"; // array
echo xmlrpc_get_type(STDIN) . "\n"; // int
?&gt;

### Ver también

    - [xmlrpc_set_type()](#function.xmlrpc-set-type) - Establece el tipo del xmlrpc, base64 o fecha-hora, para un valor de cadena PHP

# xmlrpc_is_fault

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7)

xmlrpc_is_fault — Determina si el valor de un arreglo representa una falla del XMLRPC

### Descripción

**xmlrpc_is_fault**([array](#language.types.array) $arg): [bool](#language.types.boolean)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     arg


       El arreglo devuelto por [xmlrpc_decode()](#function.xmlrpc-decode).





### Valores devueltos

Devuelve **[true](#constant.true)** si embargo si el argumento significa fallo retorna, **[false](#constant.false)**. La descripción de
la falla o falta está disponible en $arg["faultString"], fault
el código está en $arg["faultCode"].

### Ejemplos

Ver ejemplo de[xmlrpc_encode_request()](#function.xmlrpc-encode-request).

### Ver también

    - [xmlrpc_decode()](#function.xmlrpc-decode) - Decodifica el XML en los tipos de PHP nativos

# xmlrpc_parse_method_descriptions

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_parse_method_descriptions — Decodifica el XML en una lista de las descripciones del método

### Descripción

**xmlrpc_parse_method_descriptions**([string](#language.types.string) $xml): [array](#language.types.array)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_server_add_introspection_data

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_server_add_introspection_data — Agrega una documentación introspectiva

### Descripción

**xmlrpc_server_add_introspection_data**([resource](#language.types.resource) $server, [array](#language.types.array) $desc): [int](#language.types.integer)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_server_call_method

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_server_call_method — Analiza los requerimientos del XML y las llamadas de los métodos

### Descripción

**xmlrpc_server_call_method**(
    [resource](#language.types.resource) $server,
    [string](#language.types.string) $xml,
    [mixed](#language.types.mixed) $user_data,
    [array](#language.types.array) $output_options = ?
): [string](#language.types.string)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_server_create

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_server_create — Crea un servidor xmlrpc

### Descripción

**xmlrpc_server_create**(): [resource](#language.types.resource)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_server_destroy

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_server_destroy — Destruye los recursos del servidor

### Descripción

**xmlrpc_server_destroy**([resource](#language.types.resource) $server): [bool](#language.types.boolean)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_server_register_introspection_callback

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_server_register_introspection_callback — Registra una función PHP para generar la documentación

### Descripción

**xmlrpc_server_register_introspection_callback**([resource](#language.types.resource) $server, [string](#language.types.string) $function): [bool](#language.types.boolean)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_server_register_method

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_server_register_method — Registra una función PHP para que el recurso del método coincida con method_name

### Descripción

**xmlrpc_server_register_method**([resource](#language.types.resource) $server, [string](#language.types.string) $method_name, [string](#language.types.string) $function): [bool](#language.types.boolean)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# xmlrpc_set_type

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7)

xmlrpc_set_type — Establece el tipo del xmlrpc, base64 o fecha-hora, para un valor de cadena PHP

### Descripción

**xmlrpc_set_type**([string](#language.types.string) &amp;$value, [string](#language.types.string) $type): [bool](#language.types.boolean)

Establece el tipo del xmlrpc, base64 o fecha-hora, para un valor de cadena PHP.

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     value


       Value to set the type






     type


       'base64' or 'datetime'





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
If successful, value is converted to an object.

### Errores/Excepciones

Issues E_WARNING with type unsupported by XMLRPC.

### Ejemplos

    **Ejemplo #1 A xmlrpc_set_type()** example

&lt;?php

$params = date("Ymd\TH:i:s", time());
xmlrpc_set_type($params, 'datetime');
echo xmlrpc_encode($params);

?&gt;

    Resultado del ejemplo anterior es similar a:

&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;params&gt;
&lt;param&gt;
&lt;value&gt;
&lt;dateTime.iso8601&gt;20090322T23:43:03&lt;/dateTime.iso8601&gt;
&lt;/value&gt;
&lt;/param&gt;
&lt;/params&gt;

## Tabla de contenidos

- [xmlrpc_decode](#function.xmlrpc-decode) — Decodifica el XML en los tipos de PHP nativos
- [xmlrpc_decode_request](#function.xmlrpc-decode-request) — Decodifica el XML en los tipos de PHP nativos
- [xmlrpc_encode](#function.xmlrpc-encode) — Genera XML para un valor PHP
- [xmlrpc_encode_request](#function.xmlrpc-encode-request) — Genera el XML para un método
- [xmlrpc_get_type](#function.xmlrpc-get-type) — Obtiene el tipo del xmlrpc para un valor PHP
- [xmlrpc_is_fault](#function.xmlrpc-is-fault) — Determina si el valor de un arreglo representa una falla del XMLRPC
- [xmlrpc_parse_method_descriptions](#function.xmlrpc-parse-method-descriptions) — Decodifica el XML en una lista de las descripciones del método
- [xmlrpc_server_add_introspection_data](#function.xmlrpc-server-add-introspection-data) — Agrega una documentación introspectiva
- [xmlrpc_server_call_method](#function.xmlrpc-server-call-method) — Analiza los requerimientos del XML y las llamadas de los métodos
- [xmlrpc_server_create](#function.xmlrpc-server-create) — Crea un servidor xmlrpc
- [xmlrpc_server_destroy](#function.xmlrpc-server-destroy) — Destruye los recursos del servidor
- [xmlrpc_server_register_introspection_callback](#function.xmlrpc-server-register-introspection-callback) — Registra una función PHP para generar la documentación
- [xmlrpc_server_register_method](#function.xmlrpc-server-register-method) — Registra una función PHP para que el recurso del método coincida con method_name
- [xmlrpc_set_type](#function.xmlrpc-set-type) — Establece el tipo del xmlrpc, base64 o fecha-hora, para un valor de cadena PHP

- [Introducción](#intro.xmlrpc)
- [Instalación/Configuración](#xmlrpc.setup)<li>[Requerimientos](#xmlrpc.requirements)
- [Instalación](#xmlrpc.installation)
- [Tipos de recursos](#xmlrpc.resources)
  </li>- [Funciones de XML-RPC](#ref.xmlrpc)<li>[xmlrpc_decode](#function.xmlrpc-decode) — Decodifica el XML en los tipos de PHP nativos
- [xmlrpc_decode_request](#function.xmlrpc-decode-request) — Decodifica el XML en los tipos de PHP nativos
- [xmlrpc_encode](#function.xmlrpc-encode) — Genera XML para un valor PHP
- [xmlrpc_encode_request](#function.xmlrpc-encode-request) — Genera el XML para un método
- [xmlrpc_get_type](#function.xmlrpc-get-type) — Obtiene el tipo del xmlrpc para un valor PHP
- [xmlrpc_is_fault](#function.xmlrpc-is-fault) — Determina si el valor de un arreglo representa una falla del XMLRPC
- [xmlrpc_parse_method_descriptions](#function.xmlrpc-parse-method-descriptions) — Decodifica el XML en una lista de las descripciones del método
- [xmlrpc_server_add_introspection_data](#function.xmlrpc-server-add-introspection-data) — Agrega una documentación introspectiva
- [xmlrpc_server_call_method](#function.xmlrpc-server-call-method) — Analiza los requerimientos del XML y las llamadas de los métodos
- [xmlrpc_server_create](#function.xmlrpc-server-create) — Crea un servidor xmlrpc
- [xmlrpc_server_destroy](#function.xmlrpc-server-destroy) — Destruye los recursos del servidor
- [xmlrpc_server_register_introspection_callback](#function.xmlrpc-server-register-introspection-callback) — Registra una función PHP para generar la documentación
- [xmlrpc_server_register_method](#function.xmlrpc-server-register-method) — Registra una función PHP para que el recurso del método coincida con method_name
- [xmlrpc_set_type](#function.xmlrpc-set-type) — Establece el tipo del xmlrpc, base64 o fecha-hora, para un valor de cadena PHP
  </li>
