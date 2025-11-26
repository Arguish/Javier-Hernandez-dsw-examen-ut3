# Motor de integración V8 Javascript

# Introducción

Esta extensión incorpora el [» Motor V8 Javascript](http://code.google.com/p/v8/) en PHP.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#v8js.requirements)
- [Instalación](#v8js.installation)
- [Configuración en tiempo de ejecución](#v8js.configuration)

    ## Requerimientos

    La biblioteca y los encabezados de PHP y V8 instalados en las rutas adecuadas.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/v8js](https://pecl.php.net/package/v8js)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**V8js Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [v8js.max_disposed_contexts](#ini.v8js.max-disposed-contexts)
      25
      **[INI_ALL](#constant.ini-all)**




      [v8js.flags](#ini.v8js.flags)
       
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     v8js.max_disposed_contexts
     [int](#language.types.integer)



      Establece límite para contextos dispuestas antes de forzar V8 que hacer la recolección de basura.







     v8js.flags
     [string](#language.types.string)



      Establece V8 opciones de la línea de comandos. La lista de los indicadores disponibles se puede obtener en el modo CLI estableciendo este parámetro en
      --help. Ejemplo:





$ php -r 'ini_set("v8js.flags", "--help"); new V8Js;' | less

       **Nota**:



         Por estas banderas para ser eficaz en tiempo de ejecución de la ini_set () llamada se tiene que hacer antes de que los objetos se instancian V8Js!







# Ejemplos

Uso básico

**Ejemplo #1 Básica ejecución Javascript**

&lt;?php

$v8 = new V8Js();

/_ basic.js _/
$JS = &lt;&lt;&lt; EOT
len = print('¡Hola' + ' ' + 'Mundo!' + "\\n");
len;
EOT;

try {
var_dump($v8-&gt;executeString($JS, 'basic.js'));
} catch (V8JsException $e) {
  var_dump($e);
}

?&gt;

El ejemplo anterior mostrará:

¡Hola Mundo!
int(13)

# La clase [V8Js](#class.v8js)

(PECL v8js &gt;= 0.1.0)

## Introducción

    Esta es la clase principal para la extensión de V8Js. Cada instancia creada a partir de
    esta clase tiene su propio contexto en el que todo el Javascript es compilado y
    ejecutado.




    Véase [V8Js::__construct()](#v8js.construct) para más información.

## Sinopsis de la Clase

    ****




      class **V8Js**

     {

    /* Constantes */

     const
     [string](#language.types.string)
      [V8_VERSION](#v8js.constants.v8-version);

    const
     [int](#language.types.integer)
      [FLAG_NONE](#v8js.constants.flag-none) = 1;

    const
     [int](#language.types.integer)
      [FLAG_FORCE_ARRAY](#v8js.constants.flag-force-array) = 2;


    /* Métodos */

public [\_\_construct](#v8js.construct)(
    [string](#language.types.string) $object_name = "PHP",
    [array](#language.types.array) $variables = array(),
    [array](#language.types.array) $extensions = array(),
    [bool](#language.types.boolean) $report_uncaught_exceptions = **[true](#constant.true)**
)

    public [executeString](#v8js.executestring)([string](#language.types.string) $script, [string](#language.types.string) $identifier = "V8Js::executeString()", [int](#language.types.integer) $flags = **[V8Js::FLAG_NONE](#v8js.constants.flag-none)**): [mixed](#language.types.mixed)

public static [getExtensions](#v8js.getextensions)(): [array](#language.types.array)
public [getPendingException](#v8js.getpendingexception)(): [V8JsException](#class.v8jsexception)
public static [registerExtension](#v8js.registerextension)(
    [string](#language.types.string) $extension_name,
    [string](#language.types.string) $script,
    [array](#language.types.array) $dependencies = array(),
    [bool](#language.types.boolean) $auto_enable = **[false](#constant.false)**
): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[V8Js::V8_VERSION](#v8js.constants.v8-version)**

      La versión del motor de Javascript V8.






     **[V8Js::FLAG_NONE](#v8js.constants.flag-none)**

      No flags.






     **[V8Js::FLAG_FORCE_ARRAY](#v8js.constants.flag-force-array)**

      Obliga a todos los objetos JS a ser arrays asociativos en PHP.




# V8Js::\_\_construct

(PECL v8js &gt;= 0.1.0)

V8Js::\_\_construct — Construye un nuevo objeto [V8Js](#class.v8js)

### Descripción

public **V8Js::\_\_construct**(
    [string](#language.types.string) $object_name = "PHP",
    [array](#language.types.array) $variables = array(),
    [array](#language.types.array) $extensions = array(),
    [bool](#language.types.boolean) $report_uncaught_exceptions = **[true](#constant.true)**
)

Construye un nuevo objeto [V8Js](#class.v8js).

### Parámetros

    object_name


      El nombre del objeto pasado a Javascript.






    variables


      Una lista de variables PHP que estarán disponibles en Javascript. Debe ser un
      array asociativo en el formato array("nombre-para-js" =&gt; "nombre-de-la-variable-php").
      Por omisión, un array vacío.






    extensions


      Lista de extensiones registradas utilizando el método
      [V8Js::registerExtension()](#v8js.registerextension), que deben estar disponibles
      en el contexto Javascript del objeto [V8Js](#class.v8js) creado.


**Nota**:

        Las extensiones registradas de tal manera que estén automáticamente activas no necesitan ser listadas en este array.
        Además, si una extensión tiene dependencias, estas pueden ser omitidas. Por omisión, un array vacío.








    report_uncaught_exceptions


      Controla si las excepciones Javascript no capturadas se reportan inmediatamente o no.
      Por omisión, vale **[true](#constant.true)**. Si se establece en **[false](#constant.false)**, se puede acceder a la excepción no capturada
      utilizando el método [V8Js::getPendingException()](#v8js.getpendingexception).


# V8Js::executeString

(PECL v8js &gt;= 0.1.0)

V8Js::executeString — Ejecuta un string como código Javascript

### Descripción

public **V8Js::executeString**([string](#language.types.string) $script, [string](#language.types.string) $identifier = "V8Js::executeString()", [int](#language.types.integer) $flags = **[V8Js::FLAG_NONE](#v8js.constants.flag-none)**): [mixed](#language.types.mixed)

Compila y ejecuta el string pasado con script como código Javascript.

### Parámetros

    script


      El string de código que a ejecutar.






    identifier


      Identificador para el código ejecutado. Usado para depuración.






    flags


      Flags de ejecución. Este valor debe ser una de
      las constantes V8Js::FLAG_*, y por omisión es
      **[V8Js::FLAG_NONE](#v8js.constants.flag-none)**.



        -

          **[V8Js::FLAG_NONE](#v8js.constants.flag-none)** : ningún flag





        -

          **[V8Js::FLAG_FORCE_ARRAY](#v8js.constants.flag-force-array)** : fuerza a todos
          los objetos Javascript pasados a PHP a ser arrays asociativos








### Valores devueltos

Devuelve la última variable instanciada en el código Javascript, convertida en una variable PHP del tipo correspondiente.

# V8Js::getExtensions

(PECL v8js &gt;= 0.1.0)

V8Js::getExtensions — Devolver un array de extensiones registradas

### Descripción

public static **V8Js::getExtensions**(): [array](#language.types.array)

Esta función devuelve el array de extensiones Javascript registradas mediante [V8Js::registerExtension()](#v8js.registerextension).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de extensiones registradas o un array vacío si no hay ninguna.

# V8Js::getPendingException

(PECL v8js &gt;= 0.1.0)

V8Js::getPendingException — Devuelve la excepción de Javascript no capturada pendiente

### Descripción

public **V8Js::getPendingException**(): [V8JsException](#class.v8jsexception)

Devuelve cualquier excepción de Javascript no capturada pendiente de una o varias llamadas anteriores a [V8Js::executeString()](#v8js.executestring),
en forma de [V8JsException](#class.v8jsexception).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [V8JsException](#class.v8jsexception) o **[null](#constant.null)**.

# V8Js::registerExtension

(PECL v8js &gt;= 0.1.0)

V8Js::registerExtension — Registra extensiones Javascript para V8Js

### Descripción

public static **V8Js::registerExtension**(
    [string](#language.types.string) $extension_name,
    [string](#language.types.string) $script,
    [array](#language.types.array) $dependencies = array(),
    [bool](#language.types.boolean) $auto_enable = **[false](#constant.false)**
): [bool](#language.types.boolean)

Registra el código Javascript pasado por el argumento script
como extensión para ser utilizada en los contextos [V8Js](#class.v8js).

### Parámetros

    extension_name


      Nombre de la extensión a registrar.






    script


      El código Javascript a registrar.






    dependencies


      Un array de nombres de extensiones de las que depende la extensión que se está registrando.
      Cada una de ellas será activada automáticamente al cargar esta extensión.


**Nota**:

        Todas las extensiones, incluyendo las dependencias, deben ser registradas antes
        de la creación de cualquier objeto [V8Js](#class.v8js) que las utilice.








    auto_enable


      Si se establece en **[true](#constant.true)**, la extensión será activada automáticamente en todos los
      contextos [V8Js](#class.v8js).


### Valores devueltos

Devuelve **[true](#constant.true)** si la extensión se ha registrado con éxito, **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [V8Js::\_\_construct](#v8js.construct) — Construye un nuevo objeto V8Js
- [V8Js::executeString](#v8js.executestring) — Ejecuta un string como código Javascript
- [V8Js::getExtensions](#v8js.getextensions) — Devolver un array de extensiones registradas
- [V8Js::getPendingException](#v8js.getpendingexception) — Devuelve la excepción de Javascript no capturada pendiente
- [V8Js::registerExtension](#v8js.registerextension) — Registra extensiones Javascript para V8Js

# La clase [V8JsException](#class.v8jsexception)

(PECL v8js &gt;= 0.1.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **V8JsException**



      extends
       [Exception](#class.exception)

     {

    /* Propiedades */

     protected
      [$JsFileName](#v8jsexception.props.jsfilename);

    protected
      [$JsLineNumber](#v8jsexception.props.jslinenumber);

    protected
      [$JsSourceLine](#v8jsexception.props.jssourceline);

    protected
      [$JsTrace](#v8jsexception.props.jstrace);


    /* Propiedades heredadas */
    protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos */

final public [getJsFileName](#v8jsexception.getjsfilename)(): [string](#language.types.string)
final public [getJsLineNumber](#v8jsexception.getjslinenumber)(): [int](#language.types.integer)
final public [getJsSourceLine](#v8jsexception.getjssourceline)(): [string](#language.types.string)
final public [getJsTrace](#v8jsexception.getjstrace)(): [string](#language.types.string)

    /* Métodos heredados */
    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

## Propiedades

     JsFileName







     JsLineNumber







     JsSourceLine







     JsTrace






# V8JsException::getJsFileName

(PECL v8js &gt;= 0.1.0)

V8JsException::getJsFileName — El propósito getJsFileName

### Descripción

final public **V8JsException::getJsFileName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# V8JsException::getJsLineNumber

(PECL v8js &gt;= 0.1.0)

V8JsException::getJsLineNumber — El propósito getJsLineNumber

### Descripción

final public **V8JsException::getJsLineNumber**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# V8JsException::getJsSourceLine

(PECL v8js &gt;= 0.1.0)

V8JsException::getJsSourceLine — El propósito getJsSourceLine

### Descripción

final public **V8JsException::getJsSourceLine**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# V8JsException::getJsTrace

(PECL v8js &gt;= 0.1.0)

V8JsException::getJsTrace — El propósito getJsTrace

### Descripción

final public **V8JsException::getJsTrace**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [V8JsException::getJsFileName](#v8jsexception.getjsfilename) — El propósito getJsFileName
- [V8JsException::getJsLineNumber](#v8jsexception.getjslinenumber) — El propósito getJsLineNumber
- [V8JsException::getJsSourceLine](#v8jsexception.getjssourceline) — El propósito getJsSourceLine
- [V8JsException::getJsTrace](#v8jsexception.getjstrace) — El propósito getJsTrace

- [Introducción](#intro.v8js)
- [Instalación/Configuración](#v8js.setup)<li>[Requerimientos](#v8js.requirements)
- [Instalación](#v8js.installation)
- [Configuración en tiempo de ejecución](#v8js.configuration)
  </li>- [Ejemplos](#v8js.examples)
- [V8Js](#class.v8js) — La clase V8Js<li>[V8Js::\_\_construct](#v8js.construct) — Construye un nuevo objeto V8Js
- [V8Js::executeString](#v8js.executestring) — Ejecuta un string como código Javascript
- [V8Js::getExtensions](#v8js.getextensions) — Devolver un array de extensiones registradas
- [V8Js::getPendingException](#v8js.getpendingexception) — Devuelve la excepción de Javascript no capturada pendiente
- [V8Js::registerExtension](#v8js.registerextension) — Registra extensiones Javascript para V8Js
  </li>- [V8JsException](#class.v8jsexception) — La clase V8JsException<li>[V8JsException::getJsFileName](#v8jsexception.getjsfilename) — El propósito getJsFileName
- [V8JsException::getJsLineNumber](#v8jsexception.getjslinenumber) — El propósito getJsLineNumber
- [V8JsException::getJsSourceLine](#v8jsexception.getjssourceline) — El propósito getJsSourceLine
- [V8JsException::getJsTrace](#v8jsexception.getjstrace) — El propósito getJsTrace
  </li>
