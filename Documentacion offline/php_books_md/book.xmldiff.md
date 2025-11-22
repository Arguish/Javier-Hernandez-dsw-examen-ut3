# Diferencias y fusión de documentos XML

# Introducción

Esta extensión es capaz de calcular las diferencias de dos documentos XML y luego aplicarlas en el documento de origen. El diff es un documento XML que contiene en sus nodos, en formato legible por humanos, las instruciones para copiar/insertar/eliminar. Objetos del tipo DOMDocument, ficheros locales y strings en memoria pueden ser procesados.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xmldiff.requirements)
- [Instalación](#xmldiff.installation)

    ## Requerimientos

    libdiffmark - la versión 0.10 se incluye con la extensión. Si diffmark está disponible en los paquetes del sistema, su uso es altamente recomendado.

    Extensión libxml

    Extensión DOM

    ## Instalación

           Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.




        Información sobre la instalación de estas extensiones PECL
            puede ser encontrada en el capítulo del manual titulado [Instalación

    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/xmldiff](https://pecl.php.net/package/xmldiff).

# La clase XMLDiff\Base

(PECL xmldiff &gt;= 0.8.0)

## Introducción

    Clase abstracta, base para todas las clases de comparación en la extensión.

## Sinopsis de la Clase

    ****




      class **XMLDiff\Base**

     {


    /* Métodos */

public [\_\_construct](#xmldiff-base.construct)([string](#language.types.string) $nsname)

    abstract public [diff](#xmldiff-base.diff)([mixed](#language.types.mixed) $from, [mixed](#language.types.mixed) $to): [mixed](#language.types.mixed)

abstract public [merge](#xmldiff-base.merge)([mixed](#language.types.mixed) $src, [mixed](#language.types.mixed) $diff): [mixed](#language.types.mixed)

}

# XMLDiff\Base::\_\_construct

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\Base::\_\_construct — Constructor

### Descripción

public **XMLDiff\Base::\_\_construct**([string](#language.types.string) $nsname)

Constructor base para todas las clases de trabajadores en la extensión Xmldiff.

### Parámetros

    nsname


      Nombre del espacio de nombres personalizado para el documento de diferencias. El espacio de nombres por defecto es http://www.locus.cz/diffmark y eso es suficiente para evitar conflictos de nombres. Usa este parámetro si quieres cambiarlo por alguna razón.


# XMLDiff\Base::diff

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\Base::diff — Produce diferencias de dos documentos XML

### Descripción

abstract public **XMLDiff\Base::diff**([mixed](#language.types.mixed) $from, [mixed](#language.types.mixed) $to): [mixed](#language.types.mixed)

Método abstracto diferencial para ser aplicado por las clases hereditarias.

El propósito básico de este método es producir diferencias entre dos documentos. El orden paramétrico importa y producirá diferentes resultados.

### Parámetros

    from


      Documento fuente XML.






    to


      Documento XML de destino.


### Valores devueltos

Depende de la implementación.

# XMLDiff\Base::merge

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\Base::merge — Produce un nuevo documento XML basado en diferencias

### Descripción

abstract public **XMLDiff\Base::merge**([mixed](#language.types.mixed) $src, [mixed](#language.types.mixed) $diff): [mixed](#language.types.mixed)

Método de fusión abstracta para ser implementado por las clases hereditarias.

Básicamente el propósito del método es producir un nuevo documento XML basado en la información diferencial.

### Parámetros

    src


      Documento fuente XML.






    diff


      Documento producido por el método diferencial.


### Valores devueltos

Depende de la implementación.

## Tabla de contenidos

- [XMLDiff\Base::\_\_construct](#xmldiff-base.construct) — Constructor
- [XMLDiff\Base::diff](#xmldiff-base.diff) — Produce diferencias de dos documentos XML
- [XMLDiff\Base::merge](#xmldiff-base.merge) — Produce un nuevo documento XML basado en diferencias

# La clase XMLDiff\DOM

(PECL xmldiff &gt;= 0.8.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **XMLDiff\DOM**



      extends
       [XMLDiff\Base](#class.xmldiff-base)

     {


    /* Métodos */

public [diff](#xmldiff-dom.diff)([DOMDocument](#class.domdocument) $from, [DOMDocument](#class.domdocument) $to): [DOMDocument](#class.domdocument)
public [merge](#xmldiff-dom.merge)([DOMDocument](#class.domdocument) $src, [DOMDocument](#class.domdocument) $diff): [DOMDocument](#class.domdocument)

    /* Métodos heredados */
    abstract public [XMLDiff\Base::diff](#xmldiff-base.diff)([mixed](#language.types.mixed) $from, [mixed](#language.types.mixed) $to): [mixed](#language.types.mixed)

abstract public [XMLDiff\Base::merge](#xmldiff-base.merge)([mixed](#language.types.mixed) $src, [mixed](#language.types.mixed) $diff): [mixed](#language.types.mixed)

}

# XMLDiff\DOM::diff

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\DOM::diff — Diferencia dos objetos DOMDocument

### Descripción

public **XMLDiff\DOM::diff**([DOMDocument](#class.domdocument) $from, [DOMDocument](#class.domdocument) $to): [DOMDocument](#class.domdocument)

Diferencia dos instancias de DOMDocument y produce la nueva que contiene la información de la diferencia.

### Parámetros

    from


      Fuente del objeto DOMDocument.






    to


      Objeto de destino DOMDocument.


### Valores devueltos

DOMDocument con la información de diferencia o NULL.

# XMLDiff\DOM::merge

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\DOM::merge — Produce DOMDocument unido

### Descripción

public **XMLDiff\DOM::merge**([DOMDocument](#class.domdocument) $src, [DOMDocument](#class.domdocument) $diff): [DOMDocument](#class.domdocument)

Crear un nuevo DOMDocument basado en las diferencias.

### Parámetros

    src


      Objeto fuente DOMDocument.






    diff


      Objeto DOMDocument que contiene la información de diferencias.


### Valores devueltos

DOMDocument unido o NULL.

## Tabla de contenidos

- [XMLDiff\DOM::diff](#xmldiff-dom.diff) — Diferencia dos objetos DOMDocument
- [XMLDiff\DOM::merge](#xmldiff-dom.merge) — Produce DOMDocument unido

# La clase XMLDiff\Memory

(PECL xmldiff &gt;= 0.8.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **XMLDiff\Memory**



      extends
       [XMLDiff\Base](#class.xmldiff-base)

     {


    /* Métodos */

public [diff](#xmldiff-memory.diff)([string](#language.types.string) $from, [string](#language.types.string) $to): [string](#language.types.string)
public [merge](#xmldiff-memory.merge)([string](#language.types.string) $src, [string](#language.types.string) $diff): [string](#language.types.string)

    /* Métodos heredados */
    abstract public [XMLDiff\Base::diff](#xmldiff-base.diff)([mixed](#language.types.mixed) $from, [mixed](#language.types.mixed) $to): [mixed](#language.types.mixed)

abstract public [XMLDiff\Base::merge](#xmldiff-base.merge)([mixed](#language.types.mixed) $src, [mixed](#language.types.mixed) $diff): [mixed](#language.types.mixed)

}

# XMLDiff\Memory::diff

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\Memory::diff — Diferenciar dos documentos XML

### Descripción

public **XMLDiff\Memory::diff**([string](#language.types.string) $from, [string](#language.types.string) $to): [string](#language.types.string)

Diferenciar dos string que contienen documentos XML y producir la información diferencial.

### Parámetros

    from


      Documento fuente XML.






    to


      Documento XML de destino.


### Valores devueltos

String con el documento XML que contiene la información del diferencia o NULL.

# XMLDiff\Memory::merge

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\Memory::merge — Produce un documento XML unido

### Descripción

public **XMLDiff\Memory::merge**([string](#language.types.string) $src, [string](#language.types.string) $diff): [string](#language.types.string)

Crear un nuevo documento XML basado en diferencias y documento fuente.

### Parámetros

    src


      Documento fuente XML.






    diff


      Documento XML que contiene información de diferencias.


### Valores devueltos

String con el nuevo documento XML o NULL.

## Tabla de contenidos

- [XMLDiff\Memory::diff](#xmldiff-memory.diff) — Diferenciar dos documentos XML
- [XMLDiff\Memory::merge](#xmldiff-memory.merge) — Produce un documento XML unido

# La clase XMLDiff\File

(PECL xmldiff &gt;= 0.8.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **XMLDiff\File**



      extends
       [XMLDiff\Base](#class.xmldiff-base)

     {


    /* Métodos */

public [diff](#xmldiff-file.diff)([string](#language.types.string) $from, [string](#language.types.string) $to): [string](#language.types.string)
public [merge](#xmldiff-file.merge)([string](#language.types.string) $src, [string](#language.types.string) $diff): [string](#language.types.string)

    /* Métodos heredados */
    abstract public [XMLDiff\Base::diff](#xmldiff-base.diff)([mixed](#language.types.mixed) $from, [mixed](#language.types.mixed) $to): [mixed](#language.types.mixed)

abstract public [XMLDiff\Base::merge](#xmldiff-base.merge)([mixed](#language.types.mixed) $src, [mixed](#language.types.mixed) $diff): [mixed](#language.types.mixed)

}

# XMLDiff\File::diff

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\File::diff — Diferencia dos archivos XML

### Descripción

public **XMLDiff\File::diff**([string](#language.types.string) $from, [string](#language.types.string) $to): [string](#language.types.string)

Diferencia dos archivos XML locales y produce un string con la información de diferenciación.

### Parámetros

    from


      Path to the source document.






    to


      Ruta al documento fuente.


### Valores devueltos

String con el documento XML que contiene la información diferencial o NULL.

# XMLDiff\File::merge

(PECL xmldiff &gt;= 0.8.0)

XMLDiff\File::merge — Produce un documento XML unido

### Descripción

public **XMLDiff\File::merge**([string](#language.types.string) $src, [string](#language.types.string) $diff): [string](#language.types.string)

Crea un nuevo documento XML basado en diferencias y documento fuente.

### Parámetros

    src


      Ruta al documento XML de origen.






    diff


      Ruta al documento XML con la información de diferencia.


### Valores devueltos

String con el nuevo documento XML o NULL.

## Tabla de contenidos

- [XMLDiff\File::diff](#xmldiff-file.diff) — Diferencia dos archivos XML
- [XMLDiff\File::merge](#xmldiff-file.merge) — Produce un documento XML unido

- [Introducción](#intro.xmldiff)
- [Instalación/Configuración](#xmldiff.setup)<li>[Requerimientos](#xmldiff.requirements)
- [Instalación](#xmldiff.installation)
  </li>- [XMLDiff\Base](#class.xmldiff-base) — La clase XMLDiff\Base<li>[XMLDiff\Base::__construct](#xmldiff-base.construct) — Constructor
- [XMLDiff\Base::diff](#xmldiff-base.diff) — Produce diferencias de dos documentos XML
- [XMLDiff\Base::merge](#xmldiff-base.merge) — Produce un nuevo documento XML basado en diferencias
  </li>- [XMLDiff\DOM](#class.xmldiff-dom) — La clase XMLDiff\DOM<li>[XMLDiff\DOM::diff](#xmldiff-dom.diff) — Diferencia dos objetos DOMDocument
- [XMLDiff\DOM::merge](#xmldiff-dom.merge) — Produce DOMDocument unido
  </li>- [XMLDiff\Memory](#class.xmldiff-memory) — La clase XMLDiff\Memory<li>[XMLDiff\Memory::diff](#xmldiff-memory.diff) — Diferenciar dos documentos XML
- [XMLDiff\Memory::merge](#xmldiff-memory.merge) — Produce un documento XML unido
  </li>- [XMLDiff\File](#class.xmldiff-file) — La clase XMLDiff\File<li>[XMLDiff\File::diff](#xmldiff-file.diff) — Diferencia dos archivos XML
- [XMLDiff\File::merge](#xmldiff-file.merge) — Produce un documento XML unido
  </li>
