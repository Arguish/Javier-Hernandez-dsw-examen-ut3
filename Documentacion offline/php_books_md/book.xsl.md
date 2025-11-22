# XSL

# Introducción

La extensión XSL implementa el estándar XSL, realizando [» transformaciones XSLT](http://www.w3.org/TR/xslt) usando la [» biblioteca libxslt](https://gitlab.gnome.org/GNOME/libxslt/-/wikis/home)

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xsl.requirements)
- [Instalación](#xsl.installation)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

Esta extensión usa libxslt disponible en
[» https://gitlab.gnome.org/GNOME/libxslt/-/wikis/home](https://gitlab.gnome.org/GNOME/libxslt/-/wikis/home). Se requiere una
versión de libxslt 1.1.0 o superior.

## Instalación

PHP incluye la extensión XSL por defecto y puede ser activada añadiendo
el argumento **--with-xsl[=DIR]** en la línea
de configuración. DIR es el directorio de instalación de libxslt.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[XSL_CLONE_AUTO](#constant.xsl-clone-auto)**
    ([int](#language.types.integer))








    **[XSL_CLONE_NEVER](#constant.xsl-clone-never)**
    ([int](#language.types.integer))








    **[XSL_CLONE_ALWAYS](#constant.xsl-clone-always)**
    ([int](#language.types.integer))








    **[LIBXSLT_VERSION](#constant.libxslt-version)**
    ([int](#language.types.integer))



     versión libxslt como 10117.





    **[LIBXSLT_DOTTED_VERSION](#constant.libxslt-dotted-version)**
    ([string](#language.types.string))



     versión de libxslt como la 1.1.17.





    **[LIBEXSLT_VERSION](#constant.libexslt-version)**
    ([int](#language.types.integer))



     versión de libexslt como la 813.





    **[LIBEXSLT_DOTTED_VERSION](#constant.libexslt-dotted-version)**
    ([string](#language.types.string))



     versión de libexslt como la 1.1.17.





    **[XSL_SECPREF_NONE](#constant.xsl-secpref-none)**
    ([int](#language.types.integer))



     Desactivar todas las restricciones de seguridad.





    **[XSL_SECPREF_READ_FILE](#constant.xsl-secpref-read-file)**
    ([int](#language.types.integer))



     Deshabilita la lectura de archivos.





    **[XSL_SECPREF_WRITE_FILE](#constant.xsl-secpref-write-file)**
    ([int](#language.types.integer))



     Deshabilita la escritura de archivos.





    **[XSL_SECPREF_CREATE_DIRECTORY](#constant.xsl-secpref-create-directory)**
    ([int](#language.types.integer))



     No permite crear directorios.





    **[XSL_SECPREF_READ_NETWORK](#constant.xsl-secpref-read-network)**
    ([int](#language.types.integer))



     No permite leer los archivos de la red.





    **[XSL_SECPREF_WRITE_NETWORK](#constant.xsl-secpref-write-network)**
    ([int](#language.types.integer))



     Deshabilita la escritura de archivos de red.





    **[XSL_SECPREF_DEFAULT](#constant.xsl-secpref-default)**
    ([int](#language.types.integer))



     Deshabilita todo acceso de escritura, es decir, una máscara de bits de
     **[XSL_SECPREF_WRITE_NETWORK](#constant.xsl-secpref-write-network)** |
     **[XSL_SECPREF_CREATE_DIRECTORY](#constant.xsl-secpref-create-directory)** |
     **[XSL_SECPREF_WRITE_FILE](#constant.xsl-secpref-write-file)**.

# Ejemplos

## Tabla de contenidos

- [Ficheros collection.xml y collection.xsl de ejemplo](#xsl.examples-collection)
- [Manejo de errores con las funciones de manejo de errores de libxml](#xsl.examples-errors)

    ## Ficheros collection.xml y collection.xsl de ejemplo

    Muchos ejemplos en esta referencia requieren tanto un fichero XML como
    un XSL. Se usará collection.xml y
    collection.xsl que contienen el siguiente código:

    **Ejemplo #1 collection.xml**

&lt;collection&gt;
&lt;cd&gt;
&lt;title&gt;Fight for your mind&lt;/title&gt;
&lt;artist&gt;Ben Harper&lt;/artist&gt;
&lt;year&gt;1995&lt;/year&gt;
&lt;/cd&gt;
&lt;cd&gt;
&lt;title&gt;Electric Ladyland&lt;/title&gt;
&lt;artist&gt;Jimi Hendrix&lt;/artist&gt;
&lt;year&gt;1997&lt;/year&gt;
&lt;/cd&gt;
&lt;/collection&gt;

    **Ejemplo #2 collection.xsl**

&lt;xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"&gt;
&lt;xsl:param name="owner" select="'Nicolas Eliaszewicz'"/&gt;
&lt;xsl:output method="html" encoding="iso-8859-1" indent="no"/&gt;
&lt;xsl:template match="collection"&gt;
Hey! Welcome to &lt;xsl:value-of select="$owner"/&gt;'s sweet CD collection!
&lt;xsl:apply-templates/&gt;
&lt;/xsl:template&gt;
&lt;xsl:template match="cd"&gt;
&lt;h1&gt;&lt;xsl:value-of select="title"/&gt;&lt;/h1&gt;
&lt;h2&gt;by &lt;xsl:value-of select="artist"/&gt; - &lt;xsl:value-of select="year"/&gt;&lt;/h2&gt;
&lt;hr /&gt;
&lt;/xsl:template&gt;
&lt;/xsl:stylesheet&gt;

## Manejo de errores con las funciones de manejo de errores de libxml

libxml ofrece una serie de funciones para el manejo de errores, que pueden ser empleadas
para capturar y tratar los errores en el procesamiento de XSLT.

    **Ejemplo #1 fruits.xml**


    Un archivo XML válido.

&lt;fruits&gt;
&lt;fruit&gt;Apple&lt;/fruit&gt;
&lt;fruit&gt;Banana&lt;/fruit&gt;
&lt;fruit&gt;Cherry&lt;/fruit&gt;
&lt;/fruits&gt;

    **Ejemplo #2 fruits.xsl**


    Contiene una expresión selectiva no válida.

&lt;xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"&gt;
&lt;xsl:output method="html" encoding="utf-8" indent="no"/&gt;
&lt;xsl:template match="fruits"&gt;
&lt;ul&gt;
&lt;xsl:apply-templates/&gt;
&lt;/ul&gt;
&lt;/xsl:template&gt;
&lt;xsl:template match="fruit"&gt;
&lt;li&gt;&lt;xsl:value-of select="THIS IS A DELIBERATE ERROR!"/&gt;&lt;/li&gt;
&lt;/xsl:template&gt;
&lt;/xsl:stylesheet&gt;

    **Ejemplo #3 Errores de compaginación e impresión**



     El siguiente ejemplo captura y muestra los errores de libxml que se producen al llamar a
     [XSLTProcessor::importStyleSheet()](#xsltprocessor.importstylesheet) on una hoja de
     estilo que contiene un error.

&lt;?php

$xmldoc = new DOMDocument();
$xsldoc = new DOMDocument();
$xsl = new XSLTProcessor();

$xmldoc-&gt;loadXML('fruits.xml');
$xsldoc-&gt;loadXML('fruits.xsl');

libxml_use_internal_errors(true);
$result = $xsl-&gt;importStyleSheet($xsldoc);
if (!$result) {
    foreach (libxml_get_errors() as $error) {
        echo "Libxml error: {$error-&gt;message}\n";
}
}
libxml_use_internal_errors(false);

if ($result) {
    echo $xsl-&gt;transformToXML($xmldoc);
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Libxml error: Invalid expression

Libxml error: compilation error: file fruits.xsl line 9 element value-of
Libxml error: xsl:value-of : could not compile select expression 'THIS IS A DELIBERATE ERROR!'

# La clase XSLTProcessor

(PHP 5, PHP 7, PHP 8)

## Introducción

## Sinopsis de la Clase

     class **XSLTProcessor**
     {

    /* Propiedades */

     public
     [bool](#language.types.boolean)
      [$doXInclude](#xsltprocessor.props.doxinclude) = false;

    public
     [bool](#language.types.boolean)
      [$cloneDocument](#xsltprocessor.props.clonedocument) = false;

    public
     [int](#language.types.integer)
      [$maxTemplateDepth](#xsltprocessor.props.maxtemplatedepth);

    public
     [int](#language.types.integer)
      [$maxTemplateVars](#xsltprocessor.props.maxtemplatevars);


    /* Métodos */

public [getParameter](#xsltprocessor.getparameter)([string](#language.types.string) $namespace, [string](#language.types.string) $name): [string](#language.types.string)|[false](#language.types.singleton)
public [getSecurityPrefs](#xsltprocessor.getsecurityprefs)(): [int](#language.types.integer)
public [hasExsltSupport](#xsltprocessor.hasexsltsupport)(): [bool](#language.types.boolean)
public [importStylesheet](#xsltprocessor.importstylesheet)([object](#language.types.object) $stylesheet): [bool](#language.types.boolean)
public [registerPHPFunctionNS](#xsltprocessor.registerphpfunctionns)([string](#language.types.string) $namespaceURI, [string](#language.types.string) $name, [callable](#language.types.callable) $callable): [void](language.types.void.html)
public [registerPHPFunctions](#xsltprocessor.registerphpfunctions)([array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $functions = **[null](#constant.null)**): [void](language.types.void.html)
public [removeParameter](#xsltprocessor.removeparameter)([string](#language.types.string) $namespace, [string](#language.types.string) $name): [bool](#language.types.boolean)
public [setParameter](#xsltprocessor.setparameter)([string](#language.types.string) $namespace, [string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [setParameter](#xsltprocessor.setparameter)([string](#language.types.string) $namespace, [array](#language.types.array) $options): [bool](#language.types.boolean)
public [setProfiling](#xsltprocessor.setprofiling)([?](#language.types.null)[string](#language.types.string) $filename): [true](#language.types.singleton)
public [setSecurityPrefs](#xsltprocessor.setsecurityprefs)([int](#language.types.integer) $preferences): [int](#language.types.integer)
public [transformToDoc](#xsltprocessor.transformtodoc)([object](#language.types.object) $document, [?](#language.types.null)[string](#language.types.string) $returnClass = **[null](#constant.null)**): [object](#language.types.object)|[false](#language.types.singleton)
public [transformToUri](#xsltprocessor.transformtouri)([object](#language.types.object) $document, [string](#language.types.string) $uri): [int](#language.types.integer)
public [transformToXml](#xsltprocessor.transformtoxml)([object](#language.types.object) $document): [string](#language.types.string)|[null](#language.types.null)|[false](#language.types.singleton)

}

## Propiedades

     doXInclude


       Indica si los xIncludes deben ser realizados.




     cloneDocument


       Indica si la transformación debe realizarse en un clon del documento.




     maxTemplateDepth


       La profundidad máxima de recursión de los modelos.




     maxTemplateVars


       El número máximo de variables en el modelo.



## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las propiedades doXInclude
        y cloneDocument
        están ahora explícitamente definidas en la clase.




       8.4.0

        Propiedades añadidas maxTemplateDepth
        y maxTemplateVars.





# XSLTProcessor::\_\_construct

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::\_\_construct — Crea un nuevo objeto XSLTProcessor

### Descripción

**XSLTProcessor::\_\_construct**()

Crea un nuevo objeto [XSLTProcessor](#class.xsltprocessor).

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

    **Ejemplo #1 Creando un [XSLTProcessor](#class.xsltprocessor)**

&lt;?php

$xsldoc = new DOMDocument();
$xsldoc-&gt;load($xsl_filename);

$xmldoc = new DOMDocument();
$xmldoc-&gt;load($xml_filename);

$xsl = new XSLTProcessor();
$xsl-&gt;importStyleSheet($xsldoc);
echo $xsl-&gt;transformToXML($xmldoc);

?&gt;

# XSLTProcessor::getParameter

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::getParameter — Obtiene el valor de un parámetro

### Descripción

public **XSLTProcessor::getParameter**([string](#language.types.string) $namespace, [string](#language.types.string) $name): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene un parámetro si ha sido previamente establecido por
[XSLTProcessor::setParameter()](#xsltprocessor.setparameter).

### Parámetros

     namespace


       La URI del namespace del parámetro XSLT.






     name


       El nombre local del parámetro XSLT.





### Valores devueltos

El valor del parámetro (como un string), o **[false](#constant.false)** si no está definido.

### Ver también

    - [XSLTProcessor::setParameter()](#xsltprocessor.setparameter) - Define el valor de un parámetro

    - [XSLTProcessor::removeParameter()](#xsltprocessor.removeparameter) - Elimina un parámetro

# XSLTProcessor::getSecurityPrefs

(PHP &gt;= 5.4.0, PHP 7, PHP 8)

XSLTProcessor::getSecurityPrefs — Obtiene las preferencias de seguridad

### Descripción

public **XSLTProcessor::getSecurityPrefs**(): [int](#language.types.integer)

Obtiene las preferencias de seguridad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

A bitmask consisting of **[XSL_SECPREF_READ_FILE](#constant.xsl-secpref-read-file)**,
**[XSL_SECPREF_WRITE_FILE](#constant.xsl-secpref-write-file)**,
**[XSL_SECPREF_CREATE_DIRECTORY](#constant.xsl-secpref-create-directory)**,
**[XSL_SECPREF_READ_NETWORK](#constant.xsl-secpref-read-network)**,
**[XSL_SECPREF_WRITE_NETWORK](#constant.xsl-secpref-write-network)**.

# XSLTProcessor::hasExsltSupport

(PHP 5 &gt;= 5.0.4, PHP 7, PHP 8)

XSLTProcessor::hasExsltSupport — Determina si PHP tiene soporte para EXSLT

### Descripción

public **XSLTProcessor::hasExsltSupport**(): [bool](#language.types.boolean)

Este método determina si PHP se compiló con la [» librería EXSLT](https://gitlab.gnome.org/GNOME/libxslt/-/wikis/home).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Comprobando si tiene EXSLT**

&lt;?php

$proc = new XSLTProcessor;
if (!$proc-&gt;hasExsltSupport()) {
die('EXSLT no disponible');
}

// aquí las líneas de código con EXSLT..

?&gt;

# XSLTProcessor::importStylesheet

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::importStylesheet — Importa una hoja de estilo

### Descripción

public **XSLTProcessor::importStylesheet**([object](#language.types.object) $stylesheet): [bool](#language.types.boolean)

Este método importa una hoja de estilo en el
[XSLTProcessor](#class.xsltprocessor) para transformaciones.

### Parámetros

     stylesheet


       La hoja de estilo importada como objeto
       [Dom\Document](#class.dom-document),
       [DOMDocument](#class.domdocument) u objeto
       [SimpleXMLElement](#class.simplexmlelement).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una excepción de tipo [TypeError](#class.typeerror) si
stylesheet no es un objeto XML.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Añadido soporte para [Dom\Document](#class.dom-document).




      8.4.0

       Ahora lanza una excepción de tipo [TypeError](#class.typeerror)
       en lugar de [ValueError](#class.valueerror) si
       stylesheet no es un objeto XML.



# XSLTProcessor::registerPHPFunctionNS

(PHP &gt;= 8.4.0)

XSLTProcessor::registerPHPFunctionNS — Registra una función PHP como una función XSLT en un espacio de nombres

### Descripción

public **XSLTProcessor::registerPHPFunctionNS**([string](#language.types.string) $namespaceURI, [string](#language.types.string) $name, [callable](#language.types.callable) $callable): [void](language.types.void.html)

Este método permite usar una función PHP como una función XSLT en hojas de estilo XSL.

### Parámetros

    namespaceURI


      El URI del espacio de nombres.




    name


      La función local dentro del espacio de nombres.




    callable


      La función PHP a llamar cuando se invoca la función XSL en la hoja de estilo.
      Cuando se pasa una lista de nodos como parámetro a la función de devolución de llamada,
      el argumento se convierte en un array que contiene los nodos DOM correspondientes.


### Errores/Excepciones

- Lanza una [ValueError](#class.valueerror) si
  el nombre de un callback no es válido.

-

Levanta una excepción [ValueError](#class.valueerror) si
options contiene una opción inválida.

- Levanta una excepción [ValueError](#class.valueerror) si
  overrideEncoding utiliza un codificado desconocido.
    - Lanza una [TypeError](#class.typeerror) si
      un callback dado no es llamable.

    ### Valores devueltos

    No se retorna ningún valor.

    ### Ejemplos

    **Ejemplo #1 Llamada simple a una función PHP desde una hoja de estilo**

&lt;?php
$xml = &lt;&lt;&lt;EOB
&lt;allusers&gt;
&lt;user&gt;
 &lt;uid&gt;bob&lt;/uid&gt;
&lt;/user&gt;
&lt;user&gt;
 &lt;uid&gt;joe&lt;/uid&gt;
&lt;/user&gt;
&lt;/allusers&gt;
EOB;
$xsl = &lt;&lt;&lt;EOB
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:my="urn:my.ns"&gt;
&lt;xsl:output method="html" encoding="utf-8" indent="yes"/&gt;
&lt;xsl:template match="allusers"&gt;
&lt;html&gt;&lt;body&gt;
&lt;h2&gt;&lt;xsl:value-of select="my:count(user/uid)" /&gt; users&lt;/h2&gt;
&lt;table&gt;
&lt;xsl:for-each select="user"&gt;
&lt;tr&gt;
&lt;td&gt;
&lt;xsl:value-of select="my:uppercase(string(uid))"/&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/xsl:for-each&gt;
&lt;/table&gt;
&lt;/body&gt;&lt;/html&gt;
&lt;/xsl:template&gt;
&lt;/xsl:stylesheet&gt;
EOB;
$xmldoc = new DOMDocument();
$xmldoc-&gt;loadXML($xml);
$xsldoc = new DOMDocument();
$xsldoc-&gt;loadXML($xsl);

$proc = new XSLTProcessor();
$proc-&gt;registerPHPFunctionNS('urn:my.ns', 'uppercase', strtoupper(...));
$proc-&gt;registerPHPFunctionNS('urn:my.ns', 'count', fn (array $arg1) =&gt; count($arg1));
$proc-&gt;importStyleSheet($xsldoc);
echo $proc-&gt;transformToXML($xmldoc);
?&gt;

### Ver también

- [DOMXPath::registerPhpFunctionNS()](#domxpath.registerphpfunctionns) - Registra una función PHP como una función XPath en un espacio de nombres

- [DOMXPath::registerPhpFunctions()](#domxpath.registerphpfunctions) - Registra una función PHP como función XPath

- [XSLTProcessor::registerPhpFunctions()](#xsltprocessor.registerphpfunctions) - Activa el uso de PHP en las hojas de estilo XSLT

# XSLTProcessor::registerPHPFunctions

(PHP 5 &gt;= 5.0.4, PHP 7, PHP 8)

XSLTProcessor::registerPHPFunctions — Activa el uso de PHP en las hojas de estilo XSLT

### Descripción

public **XSLTProcessor::registerPHPFunctions**([array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $functions = **[null](#constant.null)**): [void](language.types.void.html)

Este método permite utilizar las funciones PHP como funciones XSLT en las hojas de estilo XSL.

### Parámetros

     functions


       Utilice este parámetro para restringir las funciones PHP accesibles desde XSLT.




       Este parámetro puede ser uno de los siguientes:
       un [string](#language.types.string) (nombre de una función),
       un [array](#language.types.array) indexado que contiene nombres de funciones,
       o un [array](#language.types.array) asociativo donde las claves representan el nombre de la función
       y el valor asociado es un [callable](#language.types.callable).





### Errores/Excepciones

- Lanza una [ValueError](#class.valueerror) si
  el nombre de un callback no es válido.

-

Levanta una excepción [ValueError](#class.valueerror) si
options contiene una opción inválida.

- Levanta una excepción [ValueError](#class.valueerror) si
  overrideEncoding utiliza un codificado desconocido.
    - Lanza una [TypeError](#class.typeerror) si
      un callback dado no es llamable.

    ### Valores devueltos

    No se retorna ningún valor.

    ### Historial de cambios

        Versión
        Descripción






         8.4.0

          Los nombres de callback inválidos ahora lanzan una
          [ValueError](#class.valueerror).
          Pasar una entrada no llamable ahora lanza una
          [TypeError](#class.typeerror).




        8.4.0

         Ahora es posible utilizar [callable](#language.types.callable) como callbacks
         cuando se utiliza functions con entradas de tipo [array](#language.types.array).

    ### Ejemplos

    **Ejemplo #1 Sencilla llamada a una función PHP desde una hoja de estilo**

&lt;?php
$xml = &lt;&lt;&lt;EOB
&lt;allusers&gt;
 &lt;user&gt;
  &lt;uid&gt;bob&lt;/uid&gt;
 &lt;/user&gt;
 &lt;user&gt;
  &lt;uid&gt;joe&lt;/uid&gt;
 &lt;/user&gt;
&lt;/allusers&gt;
EOB;
$xsl = &lt;&lt;&lt;EOB
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:php="http://php.net/xsl"&gt;
&lt;xsl:output method="html" encoding="utf-8" indent="yes"/&gt;
&lt;xsl:template match="allusers"&gt;
&lt;html&gt;&lt;body&gt;
&lt;h2&gt;Users&lt;/h2&gt;
&lt;table&gt;
&lt;xsl:for-each select="user"&gt;
&lt;tr&gt;&lt;td&gt;
&lt;xsl:value-of
select="php:function('ucfirst',string(uid))"/&gt;
&lt;/td&gt;&lt;/tr&gt;
&lt;/xsl:for-each&gt;
&lt;/table&gt;
&lt;/body&gt;&lt;/html&gt;
&lt;/xsl:template&gt;
&lt;/xsl:stylesheet&gt;
EOB;
$xmldoc = new DOMDocument();
$xmldoc-&gt;loadXML($xml);
$xsldoc = new DOMDocument();
$xsldoc-&gt;loadXML($xsl);

$proc = new XSLTProcessor();
$proc-&gt;registerPHPFunctions();
$proc-&gt;importStyleSheet($xsldoc);
echo $proc-&gt;transformToXML($xmldoc);
?&gt;

### Ver también

- [DOMXPath::registerPhpFunctions()](#domxpath.registerphpfunctions) - Registra una función PHP como función XPath

# XSLTProcessor::removeParameter

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::removeParameter — Elimina un parámetro

### Descripción

public **XSLTProcessor::removeParameter**([string](#language.types.string) $namespace, [string](#language.types.string) $name): [bool](#language.types.boolean)

Elimina un parámetro, si ya existía. Esto hará que el procesador use
el valor por defecto para el parámetro como está especificado en la
hoja de estilos.

### Parámetros

     namespace


       La URI del namespace para el parámetro XSLT.






     name


       Nombre local del parámetro XSLT.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XSLTProcessor::setParameter()](#xsltprocessor.setparameter) - Define el valor de un parámetro

    - [XSLTProcessor::getParameter()](#xsltprocessor.getparameter) - Obtiene el valor de un parámetro

# XSLTProcessor::setParameter

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::setParameter — Define el valor de un parámetro

### Descripción

public **XSLTProcessor::setParameter**([string](#language.types.string) $namespace, [string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

public **XSLTProcessor::setParameter**([string](#language.types.string) $namespace, [array](#language.types.array) $options): [bool](#language.types.boolean)

Especifica el valor de uno o varios parámetros para ser utilizados en una
subsecuencia de transformación con [XSLTProcessor](#class.xsltprocessor).
Si el parámetro no existe en la hoja de estilo, será ignorado.

### Parámetros

     namespace


       La URI del espacio de nombres del parámetro XSLT.






     name


       El nombre local del parámetro XSLT.






     value


       El nuevo valor del parámetro XSLT.






     options


       Un array de pares nombre =&gt; valor.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una excepción de tipo [ValueError](#class.valueerror) si alguno
de los argumentos contiene bytes nulos.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Ahora lanza una una excepción de tipo [ValueError](#class.valueerror)
       si alguno de los argumentos contiene bytes nulos, en lugar de truncar silenciosamente.




      8.4.0

       Ahora es posible definir un valor de parámetro que contenga
       tanto comillas simples como dobles. Antes de PHP 8.4.0, esto generaba una advertencia.



### Ejemplos

    **Ejemplo #1 Modificación del propietario antes de la transformación**

&lt;?php

$collections = array(
'Marc Rutkowski' =&gt; 'marc',
'Olivier Parmentier' =&gt; 'olivier'
);

$xsl = new DOMDocument;
$xsl-&gt;load('collection.xsl');

// Configurar el transformador
$proc = new XSLTProcessor;
$proc-&gt;importStyleSheet($xsl); // adjuntar las reglas xsl

foreach ($collections as $name =&gt; $file) {
// Cargar la fuente XML
$xml = new DOMDocument;
$xml-&gt;load('collection\_' . $file . '.xml');

    $proc-&gt;setParameter('', 'owner', $name);
    $proc-&gt;transformToURI($xml, 'file:///tmp/' . $file . '.html');

}

?&gt;

### Ver también

    - [XSLTProcessor::getParameter()](#xsltprocessor.getparameter) - Obtiene el valor de un parámetro

    - [XSLTProcessor::removeParameter()](#xsltprocessor.removeparameter) - Elimina un parámetro

# XSLTProcessor::setProfiling

(PHP &gt;= 5.3.0, PHP 7, PHP 8)

XSLTProcessor::setProfiling — Establece el fichero de salida para la información resultado del proceso

### Descripción

public **XSLTProcessor::setProfiling**([?](#language.types.null)[string](#language.types.string) $filename): [true](#language.types.singleton)

Establece el nombre del fichero de salida para la información
generada del propio procesado de la hoja de estilos.

### Parámetros

     filename


       Ruta al fichero donde volcar la información.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de salida de información**

&lt;?php
// Load the XML source
$xml = new DOMDocument;
$xml-&gt;load('collection.xml');

$xsl = new DOMDocument;
$xsl-&gt;load('collection.xsl');

// Configuración del procesador
$proc = new XSLTProcessor;
$proc-&gt;setProfiling('profiling.txt');
$proc-&gt;importStyleSheet($xsl); // adjunta las reglas xsl

echo trim($proc-&gt;transformToDoc($xml)-&gt;firstChild-&gt;wholeText);
?&gt;

     Este código generará la siguiente información en el
     fichero profiling.txt:

number match name mode Calls Tot 100us Avg

    0                   cd                                    2      3      1
    1           collection                                    1      1      1

                         Total                                3      4

# XSLTProcessor::setSecurityPrefs

(PHP &gt;= 5.4.0, PHP 7, PHP 8)

XSLTProcessor::setSecurityPrefs — Establece las preferencias de seguridad

### Descripción

public **XSLTProcessor::setSecurityPrefs**([int](#language.types.integer) $preferences): [int](#language.types.integer)

Establece las preferencias de seguridad.

### Parámetros

     preferences


       Las nuevas preferencias de seguridad. Las siguientes constantes pueden ser ORed:
       **[XSL_SECPREF_READ_FILE](#constant.xsl-secpref-read-file)**,
       **[XSL_SECPREF_WRITE_FILE](#constant.xsl-secpref-write-file)**,
       **[XSL_SECPREF_CREATE_DIRECTORY](#constant.xsl-secpref-create-directory)**,
       **[XSL_SECPREF_READ_NETWORK](#constant.xsl-secpref-read-network)**,
       **[XSL_SECPREF_WRITE_NETWORK](#constant.xsl-secpref-write-network)**. Alternativamente,
       **[XSL_SECPREF_NONE](#constant.xsl-secpref-none)** o se puede pasar
       **[XSL_SECPREF_DEFAULT](#constant.xsl-secpref-default)**.





### Valores devueltos

Devuelve las antiguas preferencias de seguridad.

# XSLTProcessor::transformToDoc

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::transformToDoc — Transforma en un documento

### Descripción

public **XSLTProcessor::transformToDoc**([object](#language.types.object) $document, [?](#language.types.null)[string](#language.types.string) $returnClass = **[null](#constant.null)**): [object](#language.types.object)|[false](#language.types.singleton)

Transforma el nodo fuente en un documento (por ejemplo, [DOMDocument](#class.domdocument))
aplicando la hoja de estilo dada por el método
[XSLTProcessor::importStylesheet()](#xsltprocessor.importstylesheet).

### Parámetros

     document


       El [Dom\Document](#class.dom-document), [DOMDocument](#class.domdocument), [SimpleXMLElement](#class.simplexmlelement) o un objeto compatible con libxml
       a transformar.






     returnClass


       Este parámetro opcional puede ser utilizado para que
       **XSLTProcessor::transformToDoc()**
       devuelva un objeto de la clase especificada.
       Esta clase debe extender la clase de document,
       o ser la misma clase que la de document.





### Errores/Excepciones

Los siguientes errores pueden ocurrir al utilizar una expresión que invoca
retrollamadas PHP.

- Lanza una [Error](#class.error) si
  una retrollamada PHP es invocada pero ninguna retrollamada está registrada,
  o si la retrollamada nombrada no está registrada.

- Lanza una [TypeError](#class.typeerror) si
  la sintaxis php:function es utilizada y el nombre del gestor
  no es un string.

- Lanza una [Error](#class.error) si
  un objeto no-DOM es devuelto por una retrollamada.

### Valores devueltos

El documento resultante o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






       8.4.0

         Ahora lanza una [Error](#class.error) si la retrollamada
         no puede ser invocada, en lugar de emitir una advertencia.




      8.4.0

       Añade soporte para [Dom\Document](#class.dom-document).



### Ejemplos

    **Ejemplo #1 Transformación en [DOMDocument](#class.domdocument)**

&lt;?php

// Carga de la fuente XML
$xml = new DOMDocument;
$xml-&gt;load('collection.xml');

$xsl = new DOMDocument;
$xsl-&gt;load('collection.xsl');

// Configuración del transformador
$proc = new XSLTProcessor;
$proc-&gt;importStyleSheet($xsl); // adjuntar las reglas xsl

echo trim($proc-&gt;transformToDoc($xml)-&gt;firstChild-&gt;wholeText);

?&gt;

    El ejemplo anterior mostrará:

¡Hola! Bienvenido a la increíble colección de CD de Nicolas Eliaszewicz.

    **Ejemplo #2 Transformación en [Dom\Document](#class.dom-document)**

&lt;?php

$xml = Dom\XMLDocument::createFromFile('collection.xml');
$xsl = Dom\XMLDocument::createFromFile('collection.xsl');

// Configuración del transformador
$proc = new XSLTProcessor;
$proc-&gt;importStyleSheet($xsl); // adjuntar las reglas xsl

echo trim($proc-&gt;transformToDoc($xml)-&gt;firstChild-&gt;wholeText);

?&gt;

    El ejemplo anterior mostrará:

¡Hola! Bienvenido a la increíble colección de CD de Nicolas Eliaszewicz.

### Ver también

    - [XSLTProcessor::transformToUri()](#xsltprocessor.transformtouri) - Transforma en URI

    - [XSLTProcessor::transformToXml()](#xsltprocessor.transformtoxml) - Transformar en XML

# XSLTProcessor::transformToUri

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::transformToUri — Transforma en URI

### Descripción

public **XSLTProcessor::transformToUri**([object](#language.types.object) $document, [string](#language.types.string) $uri): [int](#language.types.integer)

Transforma el nodo fuente en una URI aplicando la hoja de estilo dada por
el método [XSLTProcessor::importStylesheet()](#xsltprocessor.importstylesheet).

### Parámetros

     document


       El [Dom\Document](#class.dom-document), [DOMDocument](#class.domdocument), [SimpleXMLElement](#class.simplexmlelement) u objeto compatible con libxml
       a transformar.






     uri


       La URL para la transformación.





### Errores/Excepciones

Los siguientes errores pueden ocurrir al utilizar una expresión que invoca
retrollamadas PHP.

- Lanza una [Error](#class.error) si
  una retrollamada PHP es invocada pero ninguna retrollamada está registrada,
  o si la retrollamada nombrada no está registrada.

- Lanza una [TypeError](#class.typeerror) si
  la sintaxis php:function es utilizada y el nombre del gestor
  no es un string.

- Lanza una [Error](#class.error) si
  un objeto no-DOM es devuelto por una retrollamada.

### Valores devueltos

Devuelve el número de bytes escritos o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






       8.4.0

         Ahora lanza una [Error](#class.error) si la retrollamada
         no puede ser invocada, en lugar de emitir una advertencia.




      8.4.0

       Añade soporte para [Dom\Document](#class.dom-document).



### Ejemplos

    **Ejemplo #1 Transformación en un fichero HTML**

&lt;?php

// Carga del fuente XML
$xml = new DOMDocument;
$xml-&gt;load('collection.xml');

$xsl = new DOMDocument;
$xsl-&gt;load('collection.xsl');

// Configuración del transformador
$proc = new XSLTProcessor;
$proc-&gt;importStyleSheet($xsl); // adjuntar las reglas xsl

$proc-&gt;transformToURI($xml, 'file:///tmp/out.html');

?&gt;

    **Ejemplo #2 Transformación en un fichero HTML utilizando [Dom\Document](#class.dom-document)**

&lt;?php

    $xml = Dom\XMLDocument::createFromFile('collection.xml');
    $xsl = Dom\XMLDocument::createFromFile('collection.xsl');

    // Configura el transformador
    $proc = new XSLTProcessor;
    $proc-&gt;importStyleSheet($xsl); // adjuntar las reglas XSL

    $proc-&gt;transformToURI($xml, 'file:///tmp/out.html');

?&gt;

### Ver también

    - [XSLTProcessor::transformToDoc()](#xsltprocessor.transformtodoc) - Transforma en un documento

    - [XSLTProcessor::transformToXml()](#xsltprocessor.transformtoxml) - Transformar en XML

# XSLTProcessor::transformToXml

(PHP 5, PHP 7, PHP 8)

XSLTProcessor::transformToXml — Transformar en XML

### Descripción

public **XSLTProcessor::transformToXml**([object](#language.types.object) $document): [string](#language.types.string)|[null](#language.types.null)|[false](#language.types.singleton)

Transforma el nodo fuente en una cadena aplicando una hoja de estilo dada
por el método [xsltprocessor::importStylesheet()](#xsltprocessor.importstylesheet).

### Parámetros

     document


       El [Dom\Document](#class.dom-document), [DOMDocument](#class.domdocument), [SimpleXMLElement](#class.simplexmlelement) o un objeto compatible con libxml
       a transformar.






     returnClass


       Este parámetro opcional puede ser utilizado para que
       [XSLTProcessor::transformToDoc()](#xsltprocessor.transformtodoc)
       devuelva un objeto de la clase especificada.
       Esta clase debe extender la clase de document,
       o ser la misma clase que la de document.





### Errores/Excepciones

Los siguientes errores pueden ocurrir al utilizar una expresión que invoca
retrollamadas PHP.

- Lanza una [Error](#class.error) si
  una retrollamada PHP es invocada pero ninguna retrollamada está registrada,
  o si la retrollamada nombrada no está registrada.

- Lanza una [TypeError](#class.typeerror) si
  la sintaxis php:function es utilizada y el nombre del gestor
  no es un string.

- Lanza una [Error](#class.error) si
  un objeto no-DOM es devuelto por una retrollamada.

### Valores devueltos

El resultado de la transformación como una cadena de caracteres o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






       8.4.0

         Ahora lanza una [Error](#class.error) si la retrollamada
         no puede ser invocada, en lugar de emitir una advertencia.




      8.4.0

       Añade soporte para [Dom\Document](#class.dom-document).



### Ejemplos

      **Ejemplo #1 Transformación en una cadena**




&lt;?php

// Cargar la fuente XML
$xml = new DOMDocument;
$xml-&gt;load('collection.xml');

$xsl = new DOMDocument;
$xsl-&gt;load('collection.xsl');

// Configurar el transformador
$proc = new XSLTProcessor;
$proc-&gt;importStyleSheet($xsl); // adjuntar las reglas XSL

echo $proc-&gt;transformToXML($xml);

?&gt;

      El ejemplo anterior mostrará:




¡Hola! Bienvenido a la increíble colección de CD de Nicolas Eliaszewicz !

&lt;h1&gt;Fight for your mind&lt;/h1&gt;&lt;h2&gt;por Ben Harper - 1995&lt;/h2&gt;&lt;hr&gt;
&lt;h1&gt;Electric Ladyland&lt;/h1&gt;&lt;h2&gt;por Jimi Hendrix - 1997&lt;/h2&gt;&lt;hr&gt;

      **Ejemplo #2 Transformación en una cadena utilizando [Dom\Document](#class.dom-document)**




&lt;?php

$xml = Dom\XMLDocument::createFromFile('collection.xml');
$xsl = Dom\XMLDocument::createFromFile('collection.xsl');

// Configurar el transformador
$proc = new XSLTProcessor;
$proc-&gt;importStyleSheet($xsl); // adjuntar las reglas XSL

echo $proc-&gt;transformToXML($xml);

?&gt;

      El ejemplo anterior mostrará:




¡Hola! Bienvenido a la increíble colección de CD de Nicolas Eliaszewicz !

&lt;h1&gt;Fight for your mind&lt;/h1&gt;&lt;h2&gt;por Ben Harper - 1995&lt;/h2&gt;&lt;hr&gt;
&lt;h1&gt;Electric Ladyland&lt;/h1&gt;&lt;h2&gt;por Jimi Hendrix - 1997&lt;/h2&gt;&lt;hr&gt;

### Ver también

    - [XSLTProcessor::transformToDoc()](#xsltprocessor.transformtodoc) - Transforma en un documento

    - [XSLTProcessor::transformToUri()](#xsltprocessor.transformtouri) - Transforma en URI

## Tabla de contenidos

- [XSLTProcessor::\_\_construct](#xsltprocessor.construct) — Crea un nuevo objeto XSLTProcessor
- [XSLTProcessor::getParameter](#xsltprocessor.getparameter) — Obtiene el valor de un parámetro
- [XSLTProcessor::getSecurityPrefs](#xsltprocessor.getsecurityprefs) — Obtiene las preferencias de seguridad
- [XSLTProcessor::hasExsltSupport](#xsltprocessor.hasexsltsupport) — Determina si PHP tiene soporte para EXSLT
- [XSLTProcessor::importStylesheet](#xsltprocessor.importstylesheet) — Importa una hoja de estilo
- [XSLTProcessor::registerPHPFunctionNS](#xsltprocessor.registerphpfunctionns) — Registra una función PHP como una función XSLT en un espacio de nombres
- [XSLTProcessor::registerPHPFunctions](#xsltprocessor.registerphpfunctions) — Activa el uso de PHP en las hojas de estilo XSLT
- [XSLTProcessor::removeParameter](#xsltprocessor.removeparameter) — Elimina un parámetro
- [XSLTProcessor::setParameter](#xsltprocessor.setparameter) — Define el valor de un parámetro
- [XSLTProcessor::setProfiling](#xsltprocessor.setprofiling) — Establece el fichero de salida para la información resultado del proceso
- [XSLTProcessor::setSecurityPrefs](#xsltprocessor.setsecurityprefs) — Establece las preferencias de seguridad
- [XSLTProcessor::transformToDoc](#xsltprocessor.transformtodoc) — Transforma en un documento
- [XSLTProcessor::transformToUri](#xsltprocessor.transformtouri) — Transforma en URI
- [XSLTProcessor::transformToXml](#xsltprocessor.transformtoxml) — Transformar en XML

- [Introducción](#intro.xsl)
- [Instalación/Configuración](#xsl.setup)<li>[Requerimientos](#xsl.requirements)
- [Instalación](#xsl.installation)
  </li>- [Constantes predefinidas](#xsl.constants)
- [Ejemplos](#xsl.examples)<li>[Ficheros collection.xml y collection.xsl de ejemplo](#xsl.examples-collection)
- [Manejo de errores con las funciones de manejo de errores de libxml](#xsl.examples-errors)
  </li>- [XSLTProcessor](#class.xsltprocessor) — La clase XSLTProcessor<li>[XSLTProcessor::__construct](#xsltprocessor.construct) — Crea un nuevo objeto XSLTProcessor
- [XSLTProcessor::getParameter](#xsltprocessor.getparameter) — Obtiene el valor de un parámetro
- [XSLTProcessor::getSecurityPrefs](#xsltprocessor.getsecurityprefs) — Obtiene las preferencias de seguridad
- [XSLTProcessor::hasExsltSupport](#xsltprocessor.hasexsltsupport) — Determina si PHP tiene soporte para EXSLT
- [XSLTProcessor::importStylesheet](#xsltprocessor.importstylesheet) — Importa una hoja de estilo
- [XSLTProcessor::registerPHPFunctionNS](#xsltprocessor.registerphpfunctionns) — Registra una función PHP como una función XSLT en un espacio de nombres
- [XSLTProcessor::registerPHPFunctions](#xsltprocessor.registerphpfunctions) — Activa el uso de PHP en las hojas de estilo XSLT
- [XSLTProcessor::removeParameter](#xsltprocessor.removeparameter) — Elimina un parámetro
- [XSLTProcessor::setParameter](#xsltprocessor.setparameter) — Define el valor de un parámetro
- [XSLTProcessor::setProfiling](#xsltprocessor.setprofiling) — Establece el fichero de salida para la información resultado del proceso
- [XSLTProcessor::setSecurityPrefs](#xsltprocessor.setsecurityprefs) — Establece las preferencias de seguridad
- [XSLTProcessor::transformToDoc](#xsltprocessor.transformtodoc) — Transforma en un documento
- [XSLTProcessor::transformToUri](#xsltprocessor.transformtouri) — Transforma en URI
- [XSLTProcessor::transformToXml](#xsltprocessor.transformtoxml) — Transformar en XML
  </li>
