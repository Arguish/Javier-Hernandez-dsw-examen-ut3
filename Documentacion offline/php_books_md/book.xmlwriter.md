# XMLWriter

# Introducción

Esta es la extensión XMLWriter. Envuelve a la API xmlWriter de libxml.

Esta extensión representa un escritor que provee medios no almacenados en caché
de sólo avance para la generación de flujos o ficheros con datos XML.

Esta extensión se puede usar con el estilo orientado a objetos o con el procedimental.
Cada método documentado describe la llamada procedimental alternativa.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xmlwriter.requirements)
- [Instalación](#xmlwriter.installation)
- [Tipos de recursos](#xmlwriter.resources)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

## Instalación

XMLWriter se envía con el código fuente de PHP.
Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-xmlwriter**

## Tipos de recursos

Antes de PHP 8.0.0, había un tipo de recurso utilizado por la versión procedimental de
XMLWriter: el devuelto por [xmlwriter_open_memory()](#xmlwriter.openmemory) o
[xmlwriter_open_uri()](#xmlwriter.openuri).

# Ejemplos

## Tabla de contenidos

- [Crear un simple documento XML](#example.xmlwriter-simple)
- [Trabajar con espacios de nombres XML](#example.xmlwriter-namespace)
- [Trabajando con el OO API](#example.xmlwriter-oop)

    ## Crear un simple documento XML

    Este ejemplo muestra cómo utilizar XMLWriter para crear un documento XML en memoria.

    **Ejemplo #1 Crear un simple documento XML**

&lt;?php

$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, ' ');

xmlwriter_start_document($xw, '1.0', 'UTF-8');

// A first element
xmlwriter_start_element($xw, 'tag1');

// Attribute 'att1' for element 'tag1'
xmlwriter_start_attribute($xw, 'att1');
xmlwriter_text($xw, 'valueofatt1');
xmlwriter_end_attribute($xw);

xmlwriter_write_comment($xw, 'this is a comment.');

// Start a child element
xmlwriter_start_element($xw, 'tag11');
xmlwriter_text($xw, 'This is a sample text, ä');
xmlwriter_end_element($xw); // tag11

xmlwriter_end_element($xw); // tag1

// CDATA
xmlwriter_start_element($xw, 'testc');
xmlwriter_write_cdata($xw, "This is cdata content");
xmlwriter_end_element($xw); // testc

xmlwriter_start_element($xw, 'testc');
xmlwriter_start_cdata($xw);
xmlwriter_text($xw, "test cdata2");
xmlwriter_end_cdata($xw);
xmlwriter_end_element($xw); // testc

// A processing instruction
xmlwriter_start_pi($xw, 'php');
xmlwriter_text($xw, '$foo=2;echo $foo;');
xmlwriter_end_pi($xw);

xmlwriter_end_document($xw);

echo xmlwriter_output_memory($xw);

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;tag1 att1="valueofatt1"&gt;
&lt;!--this is a comment.--&gt;
&lt;tag11&gt;This is a sample text, ä&lt;/tag11&gt;
&lt;/tag1&gt;
&lt;testc&gt;&lt;![CDATA[This is cdata content]]&gt;&lt;/testc&gt;
&lt;testc&gt;&lt;![CDATA[test cdata2]]&gt;&lt;/testc&gt;
&lt;?php $foo=2;echo $foo;?&gt;

## Trabajar con espacios de nombres XML

Este ejemplo muestra cómo crear elementos XML con espacio de nombres.

    **Ejemplo #1 Trabajar con espacios de nombres XML**

&lt;?php

$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, ' ');

xmlwriter_start_document($xw, '1.0', 'UTF-8');
// A first element
xmlwriter_start_element_ns($xw,'prefix', 'books', 'uri');
xmlwriter_start_attribute($xw, 'isbn');

xmlwriter_start_attribute_ns($xw, 'prefix', 'isbn', 'uri');
xmlwriter_end_attribute($xw);

xmlwriter_end_attribute($xw);

xmlwriter_text($xw, 'book1');
xmlwriter_end_element($xw);

xmlwriter_end_document($xw);

echo xmlwriter_output_memory($xw);

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;prefix:books isbn="" prefix:isbn="" xmlns:prefix="uri"&gt;book1&lt;/prefix:books&gt;

## Trabajando con el OO API

Este ejemplo muestra cómo trabajar con la API orientada a objetos de XMLWriter.

    **Ejemplo #1 Trabajando con el OO API**

&lt;?php

$xw = new XMLWriter();
$xw-&gt;openMemory();
$xw-&gt;startDocument("1.0");
$xw-&gt;startElement("book");
$xw-&gt;text("example");
$xw-&gt;endElement();
$xw-&gt;endDocument();
echo $xw-&gt;outputMemory();

    El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;book&gt;example&lt;/book&gt;

# La clase XMLWriter

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

## Introducción

## Sinopsis de la Clase

     class **XMLWriter**
     {

    /* Métodos */

public [endAttribute](#xmlwriter.endattribute)(): [bool](#language.types.boolean)
public [endCdata](#xmlwriter.endcdata)(): [bool](#language.types.boolean)
public [endComment](#xmlwriter.endcomment)(): [bool](#language.types.boolean)
public [endDocument](#xmlwriter.enddocument)(): [bool](#language.types.boolean)
public [endDtd](#xmlwriter.enddtd)(): [bool](#language.types.boolean)
public [endDtdAttlist](#xmlwriter.enddtdattlist)(): [bool](#language.types.boolean)
public [endDtdElement](#xmlwriter.enddtdelement)(): [bool](#language.types.boolean)
public [endDtdEntity](#xmlwriter.enddtdentity)(): [bool](#language.types.boolean)
public [endElement](#xmlwriter.endelement)(): [bool](#language.types.boolean)
public [endPi](#xmlwriter.endpi)(): [bool](#language.types.boolean)
public [flush](#xmlwriter.flush)([bool](#language.types.boolean) $empty = **[true](#constant.true)**): [string](#language.types.string)|[int](#language.types.integer)
public [fullEndElement](#xmlwriter.fullendelement)(): [bool](#language.types.boolean)
public [openMemory](#xmlwriter.openmemory)(): [bool](#language.types.boolean)
public [openUri](#xmlwriter.openuri)([string](#language.types.string) $uri): [bool](#language.types.boolean)
public [outputMemory](#xmlwriter.outputmemory)([bool](#language.types.boolean) $flush = **[true](#constant.true)**): [string](#language.types.string)
public [setIndent](#xmlwriter.setindent)([bool](#language.types.boolean) $enable): [bool](#language.types.boolean)
public [setIndentString](#xmlwriter.setindentstring)([string](#language.types.string) $indentation): [bool](#language.types.boolean)
public [startAttribute](#xmlwriter.startattribute)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [startAttributeNs](#xmlwriter.startattributens)([?](#language.types.null)[string](#language.types.string) $prefix, [string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $namespace): [bool](#language.types.boolean)
public [startCdata](#xmlwriter.startcdata)(): [bool](#language.types.boolean)
public [startComment](#xmlwriter.startcomment)(): [bool](#language.types.boolean)
public [startDocument](#xmlwriter.startdocument)([?](#language.types.null)[string](#language.types.string) $version = "1.0", [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $standalone = **[null](#constant.null)**): [bool](#language.types.boolean)
public [startDtd](#xmlwriter.startdtd)([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**): [bool](#language.types.boolean)
public [startDtdAttlist](#xmlwriter.startdtdattlist)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [startDtdElement](#xmlwriter.startdtdelement)([string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)
public [startDtdEntity](#xmlwriter.startdtdentity)([string](#language.types.string) $name, [bool](#language.types.boolean) $isParam): [bool](#language.types.boolean)
public [startElement](#xmlwriter.startelement)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [startElementNs](#xmlwriter.startelementns)([?](#language.types.null)[string](#language.types.string) $prefix, [string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $namespace): [bool](#language.types.boolean)
public [startPi](#xmlwriter.startpi)([string](#language.types.string) $target): [bool](#language.types.boolean)
public [text](#xmlwriter.text)([string](#language.types.string) $content): [bool](#language.types.boolean)
public static [toMemory](#xmlwriter.tomemory)(): static
public static [toStream](#xmlwriter.tostream)([resource](#language.types.resource) $stream): static
public static [toUri](#xmlwriter.touri)([string](#language.types.string) $uri): static
public [writeAttribute](#xmlwriter.writeattribute)([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [writeAttributeNs](#xmlwriter.writeattributens)(
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace,
    [string](#language.types.string) $value
): [bool](#language.types.boolean)
public [writeCdata](#xmlwriter.writecdata)([string](#language.types.string) $content): [bool](#language.types.boolean)
public [writeComment](#xmlwriter.writecomment)([string](#language.types.string) $content): [bool](#language.types.boolean)
public [writeDtd](#xmlwriter.writedtd)(
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [writeDtdAttlist](#xmlwriter.writedtdattlist)([string](#language.types.string) $name, [string](#language.types.string) $content): [bool](#language.types.boolean)
public [writeDtdElement](#xmlwriter.writedtdelement)([string](#language.types.string) $name, [string](#language.types.string) $content): [bool](#language.types.boolean)
public [writeDtdEntity](#xmlwriter.writedtdentity)(
    [string](#language.types.string) $name,
    [string](#language.types.string) $content,
    [bool](#language.types.boolean) $isParam = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $notationData = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [writeElement](#xmlwriter.writeelement)([string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**): [bool](#language.types.boolean)
public [writeElementNs](#xmlwriter.writeelementns)(
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [writePi](#xmlwriter.writepi)([string](#language.types.string) $target, [string](#language.types.string) $content): [bool](#language.types.boolean)
public [writeRaw](#xmlwriter.writeraw)([string](#language.types.string) $content): [bool](#language.types.boolean)

}

# XMLWriter::endAttribute

# xmlwriter_end_attribute

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endAttribute -- xmlwriter_end_attribute — Fin del atributo

### Descripción

Estilo orientado a objetos

public **XMLWriter::endAttribute**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_attribute**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza el atributo actual.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startAttribute()](#xmlwriter.startattribute) - Crea un atributo

    - [XMLWriter::startAttributeNs()](#xmlwriter.startattributens) - Crea un atributo para el espacio de nombres

    - [XMLWriter::writeAttribute()](#xmlwriter.writeattribute) - Escribe un atributo

    - [XMLWriter::writeAttributeNs()](#xmlwriter.writeattributens) - Escribe un atributo de un espacio de nombres

# XMLWriter::endCdata

# xmlwriter_end_cdata

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endCdata -- xmlwriter_end_cdata — Fin del actual CDATA

### Descripción

Estilo orientado a objetos

public **XMLWriter::endCdata**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_cdata**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza la actual sección CDATA.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startCdata()](#xmlwriter.startcdata) - Crea la etiqueta de inicio de CDATA

    - [XMLWriter::writeCdata()](#xmlwriter.writecdata) - Escribe un bloque CDATA

# XMLWriter::endComment

# xmlwriter_end_comment

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 1.0.0)

XMLWriter::endComment -- xmlwriter_end_comment — Crea un comentario final

### Descripción

Estilo orientado a objetos

public **XMLWriter::endComment**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_comment**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Crea un comentario final.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startComment()](#xmlwriter.startcomment) - Crea un comentario inicial

    - [XMLWriter::writeComment()](#xmlwriter.writecomment) - EScribe la etiqueta del comentario completa

# XMLWriter::endDocument

# xmlwriter_end_document

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endDocument -- xmlwriter_end_document — Finaliza el actual documento

### Descripción

Estilo orientado a objetos

public **XMLWriter::endDocument**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_document**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza el actual documento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDocument()](#xmlwriter.startdocument) - Crea un documento

# XMLWriter::endDtd

# xmlwriter_end_dtd

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endDtd -- xmlwriter_end_dtd — Finaliza la actual DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::endDtd**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_dtd**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza la actual DTD del documento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtd()](#xmlwriter.startdtd) - Crea la etiqueta DTD inicial

    - [XMLWriter::writeDtd()](#xmlwriter.writedtd) - Escribe una etiqueta completa del DTD

# XMLWriter::endDtdAttlist

# xmlwriter_end_dtd_attlist

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endDtdAttlist -- xmlwriter_end_dtd_attlist — Finaliza la actual attList DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::endDtdAttlist**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_dtd_attlist**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza la actual lista de atributos DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtdAttlist()](#xmlwriter.startdtdattlist) - Crea el DTD AttList inicial

    - [XMLWriter::writeDtdAttlist()](#xmlwriter.writedtdattlist) - Escribe la etiqueta completa del DTD AttList

# XMLWriter::endDtdElement

# xmlwriter_end_dtd_element

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endDtdElement -- xmlwriter_end_dtd_element — Finaliza el actual elemento DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::endDtdElement**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_dtd_element**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza el actual elemento DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtdElement()](#xmlwriter.startdtdelement) - Crea un elemento DTD

    - [XMLWriter::writeDtdElement()](#xmlwriter.writedtdelement) - Escribe la etiqueta completa de un elemento DTD

# XMLWriter::endDtdEntity

# xmlwriter_end_dtd_entity

(PHP 5 &gt;= 5.2.1, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endDtdEntity -- xmlwriter_end_dtd_entity — Finaliza el actual ente DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::endDtdEntity**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_dtd_entity**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza el actual ente DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtdEntity()](#xmlwriter.startdtdentity) - Crea un ente DTD inicial

    - [XMLWriter::writeDtdEntity()](#xmlwriter.writedtdentity) - Escribe una entidad DTD

# XMLWriter::endElement

# xmlwriter_end_element

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endElement -- xmlwriter_end_element — Finaliza el actual elemento

### Descripción

Estilo orientado a objetos

public **XMLWriter::endElement**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_element**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza el actual elemento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startElement()](#xmlwriter.startelement) - Crea la etiqueta del elemento inicial

    - [XMLWriter::writeElement()](#xmlwriter.writeelement) - Escribe una etiqueta completa del elemento

# XMLWriter::endPi

# xmlwriter_end_pi

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::endPi -- xmlwriter_end_pi — Finaliza el actual IP

### Descripción

Estilo orientado a objetos

public **XMLWriter::endPi**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_end_pi**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Finaliza la actual instrucción de procesamiento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startPi()](#xmlwriter.startpi) - Crea la etiqueta PI inicial

    - [XMLWriter::writePi()](#xmlwriter.writepi) - Escribe un IP

# XMLWriter::flush

# xmlwriter_flush

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 1.0.0)

XMLWriter::flush -- xmlwriter_flush — Vacía el búfer actual

### Descripción

Estilo orientado a objetos

public **XMLWriter::flush**([bool](#language.types.boolean) $empty = **[true](#constant.true)**): [string](#language.types.string)|[int](#language.types.integer)

Estilo procedimental

**xmlwriter_flush**([XMLWriter](#class.xmlwriter) $writer, [bool](#language.types.boolean) $empty = **[true](#constant.true)**): [string](#language.types.string)|[int](#language.types.integer)

Vacía el buffer actual.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     empty


       Si se debe vaciar el buffer o no.
       Por omisión, este parámetro vale **[true](#constant.true)**.





### Valores devueltos

Si se abrió el gestor de escritura en memoria,
esta función devuelve el buffer XML generado. Si se utiliza
una URI, esta función escribirá el buffer y devolverá
el número de bytes escritos.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

      8.0.0

       Esta función ya no puede devolver **[false](#constant.false)**.



# XMLWriter::fullEndElement

# xmlwriter_full_end_element

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL xmlwriter &gt;= 2.0.4)

XMLWriter::fullEndElement -- xmlwriter_full_end_element — Fin del elemento actual

### Descripción

Estilo orientado a objetos

public **XMLWriter::fullEndElement**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_full_end_element**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Fin del elemento XML actual. Escribe una etiqueta final aun si el elemento está vacío.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endElement()](#xmlwriter.endelement) - Finaliza el actual elemento

# XMLWriter::openMemory

# xmlwriter_open_memory

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::openMemory -- xmlwriter_open_memory — Crea un nuevo xmlwriter utilizando la memoria para la visualización del string

### Descripción

Estilo orientado a objetos

public **XMLWriter::openMemory**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_open_memory**(): [XMLWriter](#class.xmlwriter)|[false](#language.types.singleton)

Crea un nuevo objeto [XMLWriter](#class.xmlwriter),
utilizando la memoria para la visualización de las string.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Estilo orientado a objetos : Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Estilo procedimental : Devuelve una nueva instancia de [XMLWriter](#class.xmlwriter) para su uso
futuro con las funciones xmlwriter en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ahora devuelve una instancia de [XMLWriter](#class.xmlwriter) en caso de éxito.
       Anteriormente, un [resource](#language.types.resource) era devuelto en este caso.



### Ver también

    - [XMLWriter::openUri()](#xmlwriter.openuri) - Crea un nuevo XMLWriter, utilizando el URI fuente para la visualización

# XMLWriter::openUri

# xmlwriter_open_uri

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::openUri -- xmlwriter_open_uri — Crea un nuevo XMLWriter, utilizando el URI fuente para la visualización

### Descripción

Estilo orientado a objetos

public **XMLWriter::openUri**([string](#language.types.string) $uri): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_open_uri**([string](#language.types.string) $uri): [XMLWriter](#class.xmlwriter)|[false](#language.types.singleton)

Crea un nuevo XMLWriter, utilizando el uri para la visualización.

### Parámetros

     uri


       El URI del [resource](#language.types.resource) para la visualización.





### Valores devueltos

Estilo orientado a objetos : Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Estilo procedimental : Devuelve una nueva instancia de [XMLWriter](#class.xmlwriter) para su uso
futuro con las funciones xmlwriter en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ahora devuelve una instancia de [XMLWriter](#class.xmlwriter) en caso de éxito.
       Anteriormente, se devolvía un [resource](#language.types.resource) en este caso.



### Ejemplos

**Ejemplo #1 Escribir directamente XML**

    Es posible escribir directamente XML utilizando la
    [envoltura de flujo php://output](#wrappers.php.output).

&lt;?php
$out = new XMLWriter();
$out-&gt;openURI('php://output');
?&gt;

### Notas

**Nota**:

    En Windows, los ficheros abiertos con esta función están bloqueados hasta
    que el objeto XMLWriter sea liberado.

### Ver también

    - [XMLWriter::openMemory()](#xmlwriter.openmemory) - Crea un nuevo xmlwriter utilizando la memoria para la visualización del string

# XMLWriter::outputMemory

# xmlwriter_output_memory

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::outputMemory -- xmlwriter_output_memory — Devuelve el actual buffer

### Descripción

Estilo orientado a objetos

public **XMLWriter::outputMemory**([bool](#language.types.boolean) $flush = **[true](#constant.true)**): [string](#language.types.string)

Estilo procedimental

**xmlwriter_output_memory**([XMLWriter](#class.xmlwriter) $writer, [bool](#language.types.boolean) $flush = **[true](#constant.true)**): [string](#language.types.string)

Devuelve el buffer actual.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     flush


       Si se mantiene la salida del buffer o no. Por defecto es **[true](#constant.true)**.





### Valores devueltos

Devuelve el buffer actual como un string.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::flush()](#xmlwriter.flush) - Vacía el búfer actual

# XMLWriter::setIndent

# xmlwriter_set_indent

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::setIndent -- xmlwriter_set_indent — Activa o no la indentación

### Descripción

Estilo orientado a objetos

public **XMLWriter::setIndent**([bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_set_indent**([XMLWriter](#class.xmlwriter) $writer, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

Activa o no la indentación.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     enable


       Si se debe activar la indentación o no.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 XMLWriter::setIndent()** y diversos contenidos

    La activación de la indentación no es recomendada para contenido diverso,
    ya que el carácter de indentación también se insertará antes de los elementos en línea.

&lt;?php
$writer = new XMLWriter();
$writer-&gt;openMemory();
$writer-&gt;setIndent(2);
$writer-&gt;startDocument();
$writer-&gt;startElement('p');
$writer-&gt;text('before');
$writer-&gt;writeElement('a', 'element');
$writer-&gt;text('after');
$writer-&gt;endElement();
$writer-&gt;endDocument();
echo $writer-&gt;outputMemory();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;p&gt;before &lt;a&gt;element&lt;/a&gt;
after&lt;/p&gt;

### Notas

**Nota**:

    La indentación se reinicia cuando se abre un XMLWriter.

### Ver también

    - [XMLWriter::setIndentString()](#xmlwriter.setindentstring) - Define la string a utilizar para la indentación

# XMLWriter::setIndentString

# xmlwriter_set_indent_string

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::setIndentString -- xmlwriter_set_indent_string — Define la string a utilizar para la indentación

### Descripción

Estilo orientado a objetos

public **XMLWriter::setIndentString**([string](#language.types.string) $indentation): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_set_indent_string**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $indentation): [bool](#language.types.boolean)

Define la string que se utilizará para indentar cada elemento/atributo
de un documento XML.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     indentation


       La string para la indentación.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Notas

**Nota**:

    La indentación se reinicia cuando se abre un XMLWriter.

### Ver también

    - [XMLWriter::setIndent()](#xmlwriter.setindent) - Activa o no la indentación

# XMLWriter::startAttribute

# xmlwriter_start_attribute

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startAttribute -- xmlwriter_start_attribute — Crea un atributo

### Descripción

Estilo orientado a objetos

public **XMLWriter::startAttribute**([string](#language.types.string) $name): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_attribute**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name): [bool](#language.types.boolean)

Comienza un atributo.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Uso Básico de XMLWriter::startAttribute()**

&lt;?php
$writer = new XMLWriter;
$writer-&gt;openURI('php://output');
$writer-&gt;startDocument('1.0', 'UTF-8');
$writer-&gt;startElement('element');
$writer-&gt;startAttribute('attribute');
$writer-&gt;text('value');
$writer-&gt;endAttribute();
$writer-&gt;endElement();
$writer-&gt;endDocument();

Resultado del ejemplo anterior es similar a:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;element attribute="value"/&gt;

### Ver también

    - [XMLWriter::startAttributeNs()](#xmlwriter.startattributens) - Crea un atributo para el espacio de nombres

    - [XMLWriter::endAttribute()](#xmlwriter.endattribute) - Fin del atributo

    - [XMLWriter::writeAttribute()](#xmlwriter.writeattribute) - Escribe un atributo

    - [XMLWriter::writeAttributeNs()](#xmlwriter.writeattributens) - Escribe un atributo de un espacio de nombres

# XMLWriter::startAttributeNs

# xmlwriter_start_attribute_ns

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startAttributeNs -- xmlwriter_start_attribute_ns — Crea un atributo para el espacio de nombres

### Descripción

Estilo orientado a objetos

public **XMLWriter::startAttributeNs**([?](#language.types.null)[string](#language.types.string) $prefix, [string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $namespace): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_attribute_ns**(
    [XMLWriter](#class.xmlwriter) $writer,
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace
): [bool](#language.types.boolean)

Crea un atributo para el espacio de nombres.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     prefix


       El prefijo para el espacio de nombres.






     name


       El nombre del atributo.






     namespace


       La URI del espacio de nombres.
       Si el namespace vale **[null](#constant.null)**,
       la declaración del espacio de nombres será omitida.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

      8.0.0

       prefix es ahora nullable.



### Ver también

    - [XMLWriter::startAttribute()](#xmlwriter.startattribute) - Crea un atributo

    - [XMLWriter::endAttribute()](#xmlwriter.endattribute) - Fin del atributo

    - [XMLWriter::writeAttribute()](#xmlwriter.writeattribute) - Escribe un atributo

    - [XMLWriter::writeAttributeNs()](#xmlwriter.writeattributens) - Escribe un atributo de un espacio de nombres

# XMLWriter::startCdata

# xmlwriter_start_cdata

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startCdata -- xmlwriter_start_cdata — Crea la etiqueta de inicio de CDATA

### Descripción

Estilo orientado a objetos

public **XMLWriter::startCdata**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_cdata**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Inicia un CDATA.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endCdata()](#xmlwriter.endcdata) - Fin del actual CDATA

    - [XMLWriter::writeCdata()](#xmlwriter.writecdata) - Escribe un bloque CDATA

# XMLWriter::startComment

# xmlwriter_start_comment

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 1.0.0)

XMLWriter::startComment -- xmlwriter_start_comment — Crea un comentario inicial

### Descripción

Estilo orientado a objetos

public **XMLWriter::startComment**(): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_comment**([XMLWriter](#class.xmlwriter) $writer): [bool](#language.types.boolean)

Inicia un comentario.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endComment()](#xmlwriter.endcomment) - Crea un comentario final

    - [XMLWriter::writeComment()](#xmlwriter.writecomment) - EScribe la etiqueta del comentario completa

# XMLWriter::startDocument

# xmlwriter_start_document

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startDocument -- xmlwriter_start_document — Crea un documento

### Descripción

Estilo orientado a objetos

public **XMLWriter::startDocument**([?](#language.types.null)[string](#language.types.string) $version = "1.0", [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $standalone = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_document**(
    [XMLWriter](#class.xmlwriter) $writer,
    [?](#language.types.null)[string](#language.types.string) $version = "1.0",
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $standalone = **[null](#constant.null)**
): [bool](#language.types.boolean)

Comienza un documento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     version


       El número de versión del documento en la declaración XML.






     encoding


       La codificación del documento en la declaración XML.






     standalone


       yes o no.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Pasar un encoding que contenga bytes nulos
lanzará una excepción [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Pasar un encoding que contenga bytes nulos
       lanza ahora una excepción [ValueError](#class.valueerror).





8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endDocument()](#xmlwriter.enddocument) - Finaliza el actual documento

# XMLWriter::startDtd

# xmlwriter_start_dtd

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startDtd -- xmlwriter_start_dtd — Crea la etiqueta DTD inicial

### Descripción

Estilo orientado a objetos

public **XMLWriter::startDtd**([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_dtd**(
    [XMLWriter](#class.xmlwriter) $writer,
    [string](#language.types.string) $qualifiedName,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**
): [bool](#language.types.boolean)

Inicia un DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     qualifiedName


       El nombre calificado del tipo de documento a crear.






     publicId


       El identificador externo del subconjunto publico.






     systemId


       El identificador externo del subconjunto del sistema.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endDtd()](#xmlwriter.enddtd) - Finaliza la actual DTD

    - [XMLWriter::writeDtd()](#xmlwriter.writedtd) - Escribe una etiqueta completa del DTD

# XMLWriter::startDtdAttlist

# xmlwriter_start_dtd_attlist

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startDtdAttlist -- xmlwriter_start_dtd_attlist — Crea el DTD AttList inicial

### Descripción

Estilo orientado a objetos

public **XMLWriter::startDtdAttlist**([string](#language.types.string) $name): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_dtd_attlist**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name): [bool](#language.types.boolean)

Inicia una lista de atributo DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre de la lista de atributos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endDtdAttlist()](#xmlwriter.enddtdattlist) - Finaliza la actual attList DTD

    - [XMLWriter::writeDtdAttlist()](#xmlwriter.writedtdattlist) - Escribe la etiqueta completa del DTD AttList

# XMLWriter::startDtdElement

# xmlwriter_start_dtd_element

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startDtdElement -- xmlwriter_start_dtd_element — Crea un elemento DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::startDtdElement**([string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_dtd_element**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)

Comienza un elemento DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     qualifiedName


       El nombre cualificado del tipo de documento a crear.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endDtdElement()](#xmlwriter.enddtdelement) - Finaliza el actual elemento DTD

    - [XMLWriter::writeDtdElement()](#xmlwriter.writedtdelement) - Escribe la etiqueta completa de un elemento DTD

# XMLWriter::startDtdEntity

# xmlwriter_start_dtd_entity

(PHP 5 &gt;= 5.2.1, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startDtdEntity -- xmlwriter_start_dtd_entity — Crea un ente DTD inicial

### Descripción

Estilo orientado a objetos

public **XMLWriter::startDtdEntity**([string](#language.types.string) $name, [bool](#language.types.boolean) $isParam): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_dtd_entity**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name, [bool](#language.types.boolean) $isParam): [bool](#language.types.boolean)

Inicia un ente DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre de la entidad.






     isParam







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endDtdEntity()](#xmlwriter.enddtdentity) - Finaliza el actual ente DTD

    - [XMLWriter::writeDtdEntity()](#xmlwriter.writedtdentity) - Escribe una entidad DTD

# XMLWriter::startElement

# xmlwriter_start_element

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startElement -- xmlwriter_start_element — Crea la etiqueta del elemento inicial

### Descripción

Estilo orientado a objetos

public **XMLWriter::startElement**([string](#language.types.string) $name): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_element**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name): [bool](#language.types.boolean)

Inicia un elemento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre del elemento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endElement()](#xmlwriter.endelement) - Finaliza el actual elemento

    - [XMLWriter::writeElement()](#xmlwriter.writeelement) - Escribe una etiqueta completa del elemento

# XMLWriter::startElementNs

# xmlwriter_start_element_ns

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startElementNs -- xmlwriter_start_element_ns — Crea un elemento de un espacio de nombres

### Descripción

Estilo orientado a objetos

public **XMLWriter::startElementNs**([?](#language.types.null)[string](#language.types.string) $prefix, [string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $namespace): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_element_ns**(
    [XMLWriter](#class.xmlwriter) $writer,
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace
): [bool](#language.types.boolean)

Crea un elemento de un espacio de nombres.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     prefix


       El prefijo del espacio de nombres.
       Si el argumento prefix es **[null](#constant.null)**,
       el espacio de nombres será omitido.






     name


       El nombre del elemento.






     namespace


       La URI del espacio de nombres.
       Si el namespace es **[null](#constant.null)**,
       la declaración del espacio de nombres será omitida.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endElement()](#xmlwriter.endelement) - Finaliza el actual elemento

    - [XMLWriter::writeElementNs()](#xmlwriter.writeelementns) - Escribe un elemento de un espacio de nombres

# XMLWriter::startPi

# xmlwriter_start_pi

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::startPi -- xmlwriter_start_pi — Crea la etiqueta PI inicial

### Descripción

Estilo orientado a objetos

public **XMLWriter::startPi**([string](#language.types.string) $target): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_start_pi**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $target): [bool](#language.types.boolean)

Inicia una etiqueta para la instrucción de procesamiento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     target


       El objetivo de la instrucción de procesamiento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::endPi()](#xmlwriter.endpi) - Finaliza el actual IP

    - [XMLWriter::writePi()](#xmlwriter.writepi) - Escribe un IP

# XMLWriter::text

# xmlwriter_text

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::text -- xmlwriter_text — Escribe texto

### Descripción

Estilo orientado a objetos

public **XMLWriter::text**([string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_text**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe texto.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     content


       El contenido del texto.
       Los caracteres &lt;, &gt;,
       &amp; y " se escriben como
       referencias de entidades (c.à.d. &amp;lt;,
       &amp;gt;, &amp;amp; y
       &amp;quot;, respectivamente).
       Todos los otros caracteres ' incluidos se escriben
       literalmente. Para escribir los caracteres XML especiales literalmente, o
       para escribir referencias de entidades literales,
       [xmlwriter_write_raw()](#xmlwriter.writeraw) debe ser utilizado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

# XMLWriter::toMemory

(PHP 8 &gt;= 8.4.0)

XMLWriter::toMemory — Crear un nuevo [XMLWriter](#class.xmlwriter) utilizando la memoria para la salida de cadena

### Descripción

public static **XMLWriter::toMemory**(): static

Crear un nuevo [XMLWriter](#class.xmlwriter) utilizando la memoria para la salida de cadena.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [XMLWriter](#class.xmlwriter).

### Ver también

- [XMLWriter::toStream()](#xmlwriter.tostream) - Crear un nuevo XMLWriter utilizando un flujo para la salida

- [XMLWriter::toUri()](#xmlwriter.touri) - Crear un nuevo XMLWriter utilizando un URI para la salida

# XMLWriter::toStream

(PHP 8 &gt;= 8.4.0)

XMLWriter::toStream — Crear un nuevo [XMLWriter](#class.xmlwriter) utilizando un flujo para la salida

### Descripción

public static **XMLWriter::toStream**([resource](#language.types.resource) $stream): static

Crear un nuevo [XMLWriter](#class.xmlwriter) utilizando un flujo para la salida.

### Parámetros

    stream


      El flujo a utilizar para la salida.


### Valores devueltos

Devuelve un [XMLWriter](#class.xmlwriter).

### Errores/Excepciones

- Pasar un recurso que no sea un flujo a stream
  lanzará una [TypeError](#class.typeerror).

### Ver también

- [XMLWriter::toMemory()](#xmlwriter.tomemory) - Crear un nuevo XMLWriter utilizando la memoria para la salida de cadena

- [XMLWriter::toUri()](#xmlwriter.touri) - Crear un nuevo XMLWriter utilizando un URI para la salida

# XMLWriter::toUri

(PHP 8 &gt;= 8.4.0)

XMLWriter::toUri — Crear un nuevo [XMLWriter](#class.xmlwriter) utilizando un URI para la salida

### Descripción

public static **XMLWriter::toUri**([string](#language.types.string) $uri): static

Crear un nuevo [XMLWriter](#class.xmlwriter) utilizando un URI para la salida.

### Parámetros

     uri


       El URI del [resource](#language.types.resource) para la visualización.





### Valores devueltos

Devuelve un [XMLWriter](#class.xmlwriter).

### Ver también

- [XMLWriter::toMemory()](#xmlwriter.tomemory) - Crear un nuevo XMLWriter utilizando la memoria para la salida de cadena

- [XMLWriter::toStream()](#xmlwriter.tostream) - Crear un nuevo XMLWriter utilizando un flujo para la salida

# XMLWriter::writeAttribute

# xmlwriter_write_attribute

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeAttribute -- xmlwriter_write_attribute — Escribe un atributo

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeAttribute**([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_attribute**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

Escribe un atributo.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre del atributo.






     value


       El valor del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Mezclar Sub-elementos y Atributos**

    Al escribir sub-elementos con atributos mezclados, cualquier intento de escribir atributos después del primer sub-elemento fallará y devolverá false.

&lt;?php
$xml = new XMLWriter();
$xml-&gt;openMemory();

$xml-&gt;startElement('element');
$xml-&gt;writeAttribute('attr1', '0');
$xml-&gt;writeElement('subelem', '0');
var_dump($xml-&gt;writeAttribute('attr2', '0'));
$xml-&gt;endElement();

echo $xml-&gt;flush();
?&gt;

El ejemplo anterior mostrará:

bool(false)
&lt;element attr1="0"&gt;&lt;subelem&gt;0&lt;/subelem&gt;&lt;/element&gt;

### Ver también

    - [XMLWriter::writeAttributeNs()](#xmlwriter.writeattributens) - Escribe un atributo de un espacio de nombres

    - [XMLWriter::startAttribute()](#xmlwriter.startattribute) - Crea un atributo

    - [XMLWriter::startAttributeNs()](#xmlwriter.startattributens) - Crea un atributo para el espacio de nombres

    - [XMLWriter::endAttribute()](#xmlwriter.endattribute) - Fin del atributo

# XMLWriter::writeAttributeNs

# xmlwriter_write_attribute_ns

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeAttributeNs -- xmlwriter_write_attribute_ns — Escribe un atributo de un espacio de nombres

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeAttributeNs**(
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace,
    [string](#language.types.string) $value
): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_attribute_ns**(
    [XMLWriter](#class.xmlwriter) $writer,
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace,
    [string](#language.types.string) $value
): [bool](#language.types.boolean)

Escribe un atributo de un espacio de nombres.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     prefix


       El prefijo del espacio de nombres.
       Si el parámetro prefix vale **[null](#constant.null)**,
       el espacio de nombres será omitido.






     name


       El nombre del atributo.






     namespace


       La URI del espacio de nombres.
       Si el namespace vale **[null](#constant.null)**,
       la declaración del espacio de nombres será omitida.






     value


       El valor del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::writeAttribute()](#xmlwriter.writeattribute) - Escribe un atributo

    - [XMLWriter::startAttribute()](#xmlwriter.startattribute) - Crea un atributo

    - [XMLWriter::startAttributeNs()](#xmlwriter.startattributens) - Crea un atributo para el espacio de nombres

    - [XMLWriter::endAttribute()](#xmlwriter.endattribute) - Fin del atributo

# XMLWriter::writeCdata

# xmlwriter_write_cdata

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeCdata -- xmlwriter_write_cdata — Escribe un bloque CDATA

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeCdata**([string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_cdata**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe un bloque CDATA.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     content


       El contenido del bloque CDATA.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Uso Básico de xmlwriter_write_cdata()**

&lt;?php
// configurar el documento
$xml = new XmlWriter();
$xml-&gt;openMemory();
$xml-&gt;setIndent(true);
$xml-&gt;startDocument('1.0', 'UTF-8');
$xml-&gt;startElement('mydoc');
$xml-&gt;startElement('myele');

// Salida CData
$xml-&gt;startElement('mycdataelement');
$xml-&gt;writeCData("texto para incluir como CData");
$xml-&gt;endElement();

// finalizar el documento y salida
$xml-&gt;endElement();
$xml-&gt;endElement();
echo $xml-&gt;outputMemory(true);
?&gt;

El ejemplo anterior mostrará:

&lt;mydoc&gt;
&lt;myele&gt;
&lt;mycdataelement&gt;&lt;![CDATA[texto para incluir como CData]​]&gt;&lt;/mycdataelement&gt;
&lt;/myele&gt;
&lt;/mydoc&gt;

### Ver también

    - [XMLWriter::startCdata()](#xmlwriter.startcdata) - Crea la etiqueta de inicio de CDATA

    - [XMLWriter::endCdata()](#xmlwriter.endcdata) - Fin del actual CDATA

# XMLWriter::writeComment

# xmlwriter_write_comment

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeComment -- xmlwriter_write_comment — EScribe la etiqueta del comentario completa

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeComment**([string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_comment**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe un comentario completo.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     content


       El contenido del comentario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startComment()](#xmlwriter.startcomment) - Crea un comentario inicial

    - [XMLWriter::endComment()](#xmlwriter.endcomment) - Crea un comentario final

# XMLWriter::writeDtd

# xmlwriter_write_dtd

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeDtd -- xmlwriter_write_dtd — Escribe una etiqueta completa del DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeDtd**(
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**
): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_dtd**(
    [XMLWriter](#class.xmlwriter) $writer,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**
): [bool](#language.types.boolean)

Escribe un completo DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre del DTD.






     publicId


       El identificador del subcojunto externo publico.






     systemId


       El identificador externo del subconjunto del sistema.






     content


       El contenido del DTD.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtd()](#xmlwriter.startdtd) - Crea la etiqueta DTD inicial

    - [XMLWriter::endDtd()](#xmlwriter.enddtd) - Finaliza la actual DTD

# XMLWriter::writeDtdAttlist

# xmlwriter_write_dtd_attlist

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeDtdAttlist -- xmlwriter_write_dtd_attlist — Escribe la etiqueta completa del DTD AttList

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeDtdAttlist**([string](#language.types.string) $name, [string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_dtd_attlist**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe una lista del DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre de la lista del atributo del DTD.






     content


       El contenido de la lista del atributo del DTD.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtdAttlist()](#xmlwriter.startdtdattlist) - Crea el DTD AttList inicial

    - [XMLWriter::endDtdAttlist()](#xmlwriter.enddtdattlist) - Finaliza la actual attList DTD

# XMLWriter::writeDtdElement

# xmlwriter_write_dtd_element

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeDtdElement -- xmlwriter_write_dtd_element — Escribe la etiqueta completa de un elemento DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeDtdElement**([string](#language.types.string) $name, [string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_dtd_element**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe un elemento completo DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre del elemento DTD.






     content


       El contenido del elemento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startDtdElement()](#xmlwriter.startdtdelement) - Crea un elemento DTD

    - [XMLWriter::endDtdElement()](#xmlwriter.enddtdelement) - Finaliza el actual elemento DTD

# XMLWriter::writeDtdEntity

# xmlwriter_write_dtd_entity

(PHP 5 &gt;= 5.2.1, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeDtdEntity -- xmlwriter_write_dtd_entity — Escribe una entidad DTD

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeDtdEntity**(
    [string](#language.types.string) $name,
    [string](#language.types.string) $content,
    [bool](#language.types.boolean) $isParam = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $notationData = **[null](#constant.null)**
): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_dtd_entity**(
    [XMLWriter](#class.xmlwriter) $writer,
    [string](#language.types.string) $name,
    [string](#language.types.string) $content,
    [bool](#language.types.boolean) $isParam = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $publicId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $systemId = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $notationData = **[null](#constant.null)**
): [bool](#language.types.boolean)

Escribe una entidad DTD.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre de la entidad.






     content


       El contenido de la entidad.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

      8.0.0

       publicId, systemId y
       notationData son ahora nullable.



### Ver también

    - [XMLWriter::startDtdEntity()](#xmlwriter.startdtdentity) - Crea un ente DTD inicial

    - [XMLWriter::endDtdEntity()](#xmlwriter.enddtdentity) - Finaliza el actual ente DTD

# XMLWriter::writeElement

# xmlwriter_write_element

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeElement -- xmlwriter_write_element — Escribe una etiqueta completa del elemento

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeElement**([string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_element**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**): [bool](#language.types.boolean)

Escribe una etiqueta completa del elemento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     name


       El nombre del elemento.






     content


       Los contenidos del elemento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startElement()](#xmlwriter.startelement) - Crea la etiqueta del elemento inicial

    - [XMLWriter::endElement()](#xmlwriter.endelement) - Finaliza el actual elemento

    - [XMLWriter::writeElementNs()](#xmlwriter.writeelementns) - Escribe un elemento de un espacio de nombres

# XMLWriter::writeElementNs

# xmlwriter_write_element_ns

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writeElementNs -- xmlwriter_write_element_ns — Escribe un elemento de un espacio de nombres

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeElementNs**(
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**
): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_element_ns**(
    [XMLWriter](#class.xmlwriter) $writer,
    [?](#language.types.null)[string](#language.types.string) $prefix,
    [string](#language.types.string) $name,
    [?](#language.types.null)[string](#language.types.string) $namespace,
    [?](#language.types.null)[string](#language.types.string) $content = **[null](#constant.null)**
): [bool](#language.types.boolean)

Escribe un elemento de un espacio de nombres.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     prefix


       El prefijo del espacio de nombres.
       Si el argumento prefix vale **[null](#constant.null)**,
       el espacio de nombres será omitido.






     name


       El nombre del elemento.






     namespace


       La URI del espacio de nombres.
       Si el namespace vale **[null](#constant.null)**,
       la declaración del espacio de nombres será omitida.






     content


       El contenido del elemento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startElementNs()](#xmlwriter.startelementns) - Crea un elemento de un espacio de nombres

    - [XMLWriter::endElement()](#xmlwriter.endelement) - Finaliza el actual elemento

    - [XMLWriter::writeElement()](#xmlwriter.writeelement) - Escribe una etiqueta completa del elemento

# XMLWriter::writePi

# xmlwriter_write_pi

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL xmlwriter &gt;= 0.1.0)

XMLWriter::writePi -- xmlwriter_write_pi — Escribe un IP

### Descripción

Estilo orientado a objetos

public **XMLWriter::writePi**([string](#language.types.string) $target, [string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_pi**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $target, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe una instrucción de procesamiento.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     target


       El objetivo de la instrucción de procesamiento.






     content


       El contenido de la instrucción de procesamiento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::startPi()](#xmlwriter.startpi) - Crea la etiqueta PI inicial

    - [XMLWriter::endPi()](#xmlwriter.endpi) - Finaliza el actual IP

# XMLWriter::writeRaw

# xmlwriter_write_raw

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL xmlwriter &gt;= 2.0.4)

XMLWriter::writeRaw -- xmlwriter_write_raw — Escribe un texto sin formato del XML

### Descripción

Estilo orientado a objetos

public **XMLWriter::writeRaw**([string](#language.types.string) $content): [bool](#language.types.boolean)

Estilo procedimental

**xmlwriter_write_raw**([XMLWriter](#class.xmlwriter) $writer, [string](#language.types.string) $content): [bool](#language.types.boolean)

Escribe un texto sin formato del XML.

### Parámetros

writer
Únicamente para llamadas procedimentales.
La instancia [XMLWriter](#class.xmlwriter) que es modificada.
Este objeto proviene de una llamada a [xmlwriter_open_uri()](#xmlwriter.openuri)
o [xmlwriter_open_memory()](#xmlwriter.openmemory).

     content


       El string a escribir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

writer ahora espera una instancia de [XMLWriter](#class.xmlwriter)
anteriormente, se esperaba una [resource](#language.types.resource).

### Ver también

    - [XMLWriter::text()](#xmlwriter.text) - Escribe texto

## Tabla de contenidos

- [XMLWriter::endAttribute](#xmlwriter.endattribute) — Fin del atributo
- [XMLWriter::endCdata](#xmlwriter.endcdata) — Fin del actual CDATA
- [XMLWriter::endComment](#xmlwriter.endcomment) — Crea un comentario final
- [XMLWriter::endDocument](#xmlwriter.enddocument) — Finaliza el actual documento
- [XMLWriter::endDtd](#xmlwriter.enddtd) — Finaliza la actual DTD
- [XMLWriter::endDtdAttlist](#xmlwriter.enddtdattlist) — Finaliza la actual attList DTD
- [XMLWriter::endDtdElement](#xmlwriter.enddtdelement) — Finaliza el actual elemento DTD
- [XMLWriter::endDtdEntity](#xmlwriter.enddtdentity) — Finaliza el actual ente DTD
- [XMLWriter::endElement](#xmlwriter.endelement) — Finaliza el actual elemento
- [XMLWriter::endPi](#xmlwriter.endpi) — Finaliza el actual IP
- [XMLWriter::flush](#xmlwriter.flush) — Vacía el búfer actual
- [XMLWriter::fullEndElement](#xmlwriter.fullendelement) — Fin del elemento actual
- [XMLWriter::openMemory](#xmlwriter.openmemory) — Crea un nuevo xmlwriter utilizando la memoria para la visualización del string
- [XMLWriter::openUri](#xmlwriter.openuri) — Crea un nuevo XMLWriter, utilizando el URI fuente para la visualización
- [XMLWriter::outputMemory](#xmlwriter.outputmemory) — Devuelve el actual buffer
- [XMLWriter::setIndent](#xmlwriter.setindent) — Activa o no la indentación
- [XMLWriter::setIndentString](#xmlwriter.setindentstring) — Define la string a utilizar para la indentación
- [XMLWriter::startAttribute](#xmlwriter.startattribute) — Crea un atributo
- [XMLWriter::startAttributeNs](#xmlwriter.startattributens) — Crea un atributo para el espacio de nombres
- [XMLWriter::startCdata](#xmlwriter.startcdata) — Crea la etiqueta de inicio de CDATA
- [XMLWriter::startComment](#xmlwriter.startcomment) — Crea un comentario inicial
- [XMLWriter::startDocument](#xmlwriter.startdocument) — Crea un documento
- [XMLWriter::startDtd](#xmlwriter.startdtd) — Crea la etiqueta DTD inicial
- [XMLWriter::startDtdAttlist](#xmlwriter.startdtdattlist) — Crea el DTD AttList inicial
- [XMLWriter::startDtdElement](#xmlwriter.startdtdelement) — Crea un elemento DTD
- [XMLWriter::startDtdEntity](#xmlwriter.startdtdentity) — Crea un ente DTD inicial
- [XMLWriter::startElement](#xmlwriter.startelement) — Crea la etiqueta del elemento inicial
- [XMLWriter::startElementNs](#xmlwriter.startelementns) — Crea un elemento de un espacio de nombres
- [XMLWriter::startPi](#xmlwriter.startpi) — Crea la etiqueta PI inicial
- [XMLWriter::text](#xmlwriter.text) — Escribe texto
- [XMLWriter::toMemory](#xmlwriter.tomemory) — Crear un nuevo XMLWriter utilizando la memoria para la salida de cadena
- [XMLWriter::toStream](#xmlwriter.tostream) — Crear un nuevo XMLWriter utilizando un flujo para la salida
- [XMLWriter::toUri](#xmlwriter.touri) — Crear un nuevo XMLWriter utilizando un URI para la salida
- [XMLWriter::writeAttribute](#xmlwriter.writeattribute) — Escribe un atributo
- [XMLWriter::writeAttributeNs](#xmlwriter.writeattributens) — Escribe un atributo de un espacio de nombres
- [XMLWriter::writeCdata](#xmlwriter.writecdata) — Escribe un bloque CDATA
- [XMLWriter::writeComment](#xmlwriter.writecomment) — EScribe la etiqueta del comentario completa
- [XMLWriter::writeDtd](#xmlwriter.writedtd) — Escribe una etiqueta completa del DTD
- [XMLWriter::writeDtdAttlist](#xmlwriter.writedtdattlist) — Escribe la etiqueta completa del DTD AttList
- [XMLWriter::writeDtdElement](#xmlwriter.writedtdelement) — Escribe la etiqueta completa de un elemento DTD
- [XMLWriter::writeDtdEntity](#xmlwriter.writedtdentity) — Escribe una entidad DTD
- [XMLWriter::writeElement](#xmlwriter.writeelement) — Escribe una etiqueta completa del elemento
- [XMLWriter::writeElementNs](#xmlwriter.writeelementns) — Escribe un elemento de un espacio de nombres
- [XMLWriter::writePi](#xmlwriter.writepi) — Escribe un IP
- [XMLWriter::writeRaw](#xmlwriter.writeraw) — Escribe un texto sin formato del XML

- [Introducción](#intro.xmlwriter)
- [Instalación/Configuración](#xmlwriter.setup)<li>[Requerimientos](#xmlwriter.requirements)
- [Instalación](#xmlwriter.installation)
- [Tipos de recursos](#xmlwriter.resources)
  </li>- [Ejemplos](#xmlwriter.examples)<li>[Crear un simple documento XML](#example.xmlwriter-simple)
- [Trabajar con espacios de nombres XML](#example.xmlwriter-namespace)
- [Trabajando con el OO API](#example.xmlwriter-oop)
  </li>- [XMLWriter](#class.xmlwriter) — La clase XMLWriter<li>[XMLWriter::endAttribute](#xmlwriter.endattribute) — Fin del atributo
- [XMLWriter::endCdata](#xmlwriter.endcdata) — Fin del actual CDATA
- [XMLWriter::endComment](#xmlwriter.endcomment) — Crea un comentario final
- [XMLWriter::endDocument](#xmlwriter.enddocument) — Finaliza el actual documento
- [XMLWriter::endDtd](#xmlwriter.enddtd) — Finaliza la actual DTD
- [XMLWriter::endDtdAttlist](#xmlwriter.enddtdattlist) — Finaliza la actual attList DTD
- [XMLWriter::endDtdElement](#xmlwriter.enddtdelement) — Finaliza el actual elemento DTD
- [XMLWriter::endDtdEntity](#xmlwriter.enddtdentity) — Finaliza el actual ente DTD
- [XMLWriter::endElement](#xmlwriter.endelement) — Finaliza el actual elemento
- [XMLWriter::endPi](#xmlwriter.endpi) — Finaliza el actual IP
- [XMLWriter::flush](#xmlwriter.flush) — Vacía el búfer actual
- [XMLWriter::fullEndElement](#xmlwriter.fullendelement) — Fin del elemento actual
- [XMLWriter::openMemory](#xmlwriter.openmemory) — Crea un nuevo xmlwriter utilizando la memoria para la visualización del string
- [XMLWriter::openUri](#xmlwriter.openuri) — Crea un nuevo XMLWriter, utilizando el URI fuente para la visualización
- [XMLWriter::outputMemory](#xmlwriter.outputmemory) — Devuelve el actual buffer
- [XMLWriter::setIndent](#xmlwriter.setindent) — Activa o no la indentación
- [XMLWriter::setIndentString](#xmlwriter.setindentstring) — Define la string a utilizar para la indentación
- [XMLWriter::startAttribute](#xmlwriter.startattribute) — Crea un atributo
- [XMLWriter::startAttributeNs](#xmlwriter.startattributens) — Crea un atributo para el espacio de nombres
- [XMLWriter::startCdata](#xmlwriter.startcdata) — Crea la etiqueta de inicio de CDATA
- [XMLWriter::startComment](#xmlwriter.startcomment) — Crea un comentario inicial
- [XMLWriter::startDocument](#xmlwriter.startdocument) — Crea un documento
- [XMLWriter::startDtd](#xmlwriter.startdtd) — Crea la etiqueta DTD inicial
- [XMLWriter::startDtdAttlist](#xmlwriter.startdtdattlist) — Crea el DTD AttList inicial
- [XMLWriter::startDtdElement](#xmlwriter.startdtdelement) — Crea un elemento DTD
- [XMLWriter::startDtdEntity](#xmlwriter.startdtdentity) — Crea un ente DTD inicial
- [XMLWriter::startElement](#xmlwriter.startelement) — Crea la etiqueta del elemento inicial
- [XMLWriter::startElementNs](#xmlwriter.startelementns) — Crea un elemento de un espacio de nombres
- [XMLWriter::startPi](#xmlwriter.startpi) — Crea la etiqueta PI inicial
- [XMLWriter::text](#xmlwriter.text) — Escribe texto
- [XMLWriter::toMemory](#xmlwriter.tomemory) — Crear un nuevo XMLWriter utilizando la memoria para la salida de cadena
- [XMLWriter::toStream](#xmlwriter.tostream) — Crear un nuevo XMLWriter utilizando un flujo para la salida
- [XMLWriter::toUri](#xmlwriter.touri) — Crear un nuevo XMLWriter utilizando un URI para la salida
- [XMLWriter::writeAttribute](#xmlwriter.writeattribute) — Escribe un atributo
- [XMLWriter::writeAttributeNs](#xmlwriter.writeattributens) — Escribe un atributo de un espacio de nombres
- [XMLWriter::writeCdata](#xmlwriter.writecdata) — Escribe un bloque CDATA
- [XMLWriter::writeComment](#xmlwriter.writecomment) — EScribe la etiqueta del comentario completa
- [XMLWriter::writeDtd](#xmlwriter.writedtd) — Escribe una etiqueta completa del DTD
- [XMLWriter::writeDtdAttlist](#xmlwriter.writedtdattlist) — Escribe la etiqueta completa del DTD AttList
- [XMLWriter::writeDtdElement](#xmlwriter.writedtdelement) — Escribe la etiqueta completa de un elemento DTD
- [XMLWriter::writeDtdEntity](#xmlwriter.writedtdentity) — Escribe una entidad DTD
- [XMLWriter::writeElement](#xmlwriter.writeelement) — Escribe una etiqueta completa del elemento
- [XMLWriter::writeElementNs](#xmlwriter.writeelementns) — Escribe un elemento de un espacio de nombres
- [XMLWriter::writePi](#xmlwriter.writepi) — Escribe un IP
- [XMLWriter::writeRaw](#xmlwriter.writeraw) — Escribe un texto sin formato del XML
  </li>
