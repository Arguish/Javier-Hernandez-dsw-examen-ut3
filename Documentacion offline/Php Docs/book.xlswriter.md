# XLSWriter

# Introducción

Una eficiente y rápida extensión de exportación de archivos xlsx.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xlswriter.requirements)
- [Instalación](#xlswriter.installation)
- [Tipos de recursos](#xlswriter.resources)

    ## Requerimientos

    XLSWriter requiere PHP 7.0 y superior.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/xlswriter](https://pecl.php.net/package/xlswriter)

    ## Tipos de recursos

    Hay un recurso utilizado por la versión de procedimiento de la extensión
    XLSWriter: devuelto por **fileName()** o
    [\Vtiful\Kernel\Format](#class.vtiful-kernel-format).

# The Vtiful\Kernel\Excel class

(PECL xlswriter &gt;= 1.2.1)

## Introducción

    Crea archivos xlsx y fija las celdas y produce los archivos xlsx

## Sinopsis de la Clase

    ****




      class **Vtiful\Kernel\Excel**

     {


    /* Métodos */

public [\_\_construct](#vtiful-kernel-excel.construct)([array](#language.types.array) $config)

    public [addSheet](#vtiful-kernel-excel.addSheet)([string](#language.types.string) $sheetName)

public [autoFilter](#vtiful-kernel-excel.autoFilter)([string](#language.types.string) $scope)
public [constMemory](#vtiful-kernel-excel.constMemory)([string](#language.types.string) $fileName, [string](#language.types.string) $sheetName = ?)
public [data](#vtiful-kernel-excel.data)([array](#language.types.array) $data)
public [fileName](#vtiful-kernel-excel.filename)([string](#language.types.string) $fileName, [string](#language.types.string) $sheetName = ?)
public [getHandle](#vtiful-kernel-excel.getHandle)()
public [header](#vtiful-kernel-excel.header)([array](#language.types.array) $headerData)
public [insertFormula](#vtiful-kernel-excel.insertFormula)([int](#language.types.integer) $row, [int](#language.types.integer) $column, [string](#language.types.string) $formula)
public [insertImage](#vtiful-kernel-excel.insertImage)([int](#language.types.integer) $row, [int](#language.types.integer) $column, [string](#language.types.string) $localImagePath)
public [insertText](#vtiful-kernel-excel.insertText)(
    [int](#language.types.integer) $row,
    [int](#language.types.integer) $column,
    [int](#language.types.integer)|[float](#language.types.float)|[string](#language.types.string) $data,
    [string](#language.types.string) $format = ?
)
public [mergeCells](#vtiful-kernel-excel.mergeCells)([string](#language.types.string) $scope, [string](#language.types.string) $data)
public [output](#vtiful-kernel-excel.output)()
public [setColumn](#vtiful-kernel-excel.setColumn)([string](#language.types.string) $range, [float](#language.types.float) $width, [resource](#language.types.resource) $format = ?)
public [setRow](#vtiful-kernel-excel.setRow)([string](#language.types.string) $range, [float](#language.types.float) $height, [resource](#language.types.resource) $format = ?)

}

# Vtiful\Kernel\Excel::addSheet

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::addSheet — Vtiful\Kernel\Excel addSheet

### Descripción

public **Vtiful\Kernel\Excel::addSheet**([string](#language.types.string) $sheetName)

    Crea una nueva hoja de trabajo en el archivo xlsx.

### Parámetros

    sheetName


      Nombre de la hoja de trabajo


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$file = $fileObject-&gt;fileName('tutorial.xlsx', 'sheet_one')
-&gt;header(['name', 'age'])
-&gt;data([
['viest', 23],
['wjx', 23]
]);

$file-&gt;addSheet('sheet_two')
-&gt;header(['name', 'age'])
-&gt;data([
['james', 33],
['king', 33]
]);

$file-&gt;output();
?&gt;

# Vtiful\Kernel\Excel::autoFilter

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::autoFilter — Vtiful\Kernel\Excel autoFilter

### Descripción

public **Vtiful\Kernel\Excel::autoFilter**([string](#language.types.string) $scope)

    Añade el autofiltro a una hoja de trabajo.

### Parámetros

    scope


      Celda de inicio y final del string de coordenadas.


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$file = $excel-&gt;fileName('test.xlsx')
        -&gt;header(['name', 'age'])
        -&gt;data($data)
-&gt;autoFilter('A1:B11') // auto filter
-&gt;output();
?&gt;

# Vtiful\Kernel\Excel::constMemory

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::constMemory — Vtiful\Kernel\Excel constMemory

### Descripción

public **Vtiful\Kernel\Excel::constMemory**([string](#language.types.string) $fileName, [string](#language.types.string) $sheetName = ?)

    Escribe un archivo grande con un uso constante de la memoria.

### Parámetros

    fileName


      Nombre del archivo XLSX






    sheetName


      Nombre de la hoja de trabajo


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; '/home/viest'
];

$fileObject = new \Vtiful\Kernel\Excel($config);

$file = $instance-&gt;constMemory('tutorial.xlsx', 'sheet');
?&gt;

# Vtiful\Kernel\Excel::\_\_construct

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::\_\_construct — Vtiful\Kernel\Excel constructor

### Descripción

public **Vtiful\Kernel\Excel::\_\_construct**([array](#language.types.array) $config)

    [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel) constructor, crea un objeto de clase.

### Parámetros

    config


      Configuración de la exportación de archivos XLSX


### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; '/home/viest'
];

$excelObject = new \Vtiful\Kernel\Excel($config);
?&gt;

# Vtiful\Kernel\Excel::data

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::data — Vtiful\Kernel\Excel data

### Descripción

public **Vtiful\Kernel\Excel::data**([array](#language.types.array) $data)

    Escribe un dato en la hoja de trabajo.

### Parámetros

    data


      datos de la hoja de trabajo


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$file = $fileObject-&gt;fileName('tutorial.xlsx', 'sheet_one')
-&gt;header(['name', 'age'])
-&gt;data([
['viest', 23],
['wjx', 23],
]);
?&gt;

# Vtiful\Kernel\Excel::fileName

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::fileName — Vtiful\Kernel\Excel fileName

### Descripción

public **Vtiful\Kernel\Excel::fileName**([string](#language.types.string) $fileName, [string](#language.types.string) $sheetName = ?)

    Crear un nuevo archivo xlsx y crea una hoja de trabajo.

### Parámetros

    fileName


      Nombre del archivo XLSX






    sheetName


      Nombre de la hoja de trabajo


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; '/home/viest'
];

$fileObject = new \Vtiful\Kernel\Excel($config);

$file = $instance-&gt;fileName('tutorial.xlsx', 'sheet');
?&gt;

# Vtiful\Kernel\Excel::getHandle

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::getHandle — Vtiful\Kernel\Excel getHandle

### Descripción

public **Vtiful\Kernel\Excel::getHandle**()

    Consigue el manejo de los recursos de texto xlsx.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Recurso

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$file = $fileObject-&gt;fileName('tutorial.xlsx', 'sheet_one')
-&gt;header(['name', 'age']);

$handle = $file-&gt;getHandle();
?&gt;

# Vtiful\Kernel\Excel::header

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::header — Vtiful\Kernel\Excel header

### Descripción

public **Vtiful\Kernel\Excel::header**([array](#language.types.array) $headerData)

    Escribe un encabezado en la hoja de trabajo.

### Parámetros

    headerData


      datos de la cabecera de la hoja de trabajo


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$file = $fileObject-&gt;fileName('tutorial.xlsx', 'sheet_one')
-&gt;header(['name', 'age']);
?&gt;

# Vtiful\Kernel\Excel::insertFormula

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::insertFormula — Vtiful\Kernel\Excel insertFormula

### Descripción

public **Vtiful\Kernel\Excel::insertFormula**([int](#language.types.integer) $row, [int](#language.types.integer) $column, [string](#language.types.string) $formula)

    Inserta la fórmula de cálculo.

### Parámetros

    row


      fila de celdas






    column


      columna de celdas






    formula


      formula string


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);

$file = $excel-&gt;fileName("free.xlsx")
-&gt;header(['name', 'money']);

for($index = 1; $index &lt; 10; $index++) {
    $file-&gt;insertText($index, 0, 'viest');
$file-&gt;insertText($index, 1, 10);
}

$file-&gt;insertText(12, 0, "Total");
$file-&gt;insertFormula(12, 1, '=SUM(B2:B11)'); // insertar la fórmula

$file-&gt;output();

# Vtiful\Kernel\Excel::insertImage

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::insertImage — Vtiful\Kernel\Excel insertImage

### Descripción

public **Vtiful\Kernel\Excel::insertImage**([int](#language.types.integer) $row, [int](#language.types.integer) $column, [string](#language.types.string) $localImagePath)

    Inserta una imagen local en la celda.

### Parámetros

    row


      fila de celdas






    column


      columna de celdas






    localImagePath


      ruta de la imagen local


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);

$file = $excel-&gt;fileName("free.xlsx");

$file-&gt;insertImage(5, 0, '/vagrant/ASW-G-66.jpg');

$file-&gt;output();

# Vtiful\Kernel\Excel::insertText

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::insertText — Vtiful\Kernel\Excel insertText

### Descripción

public **Vtiful\Kernel\Excel::insertText**(
    [int](#language.types.integer) $row,
    [int](#language.types.integer) $column,
    [int](#language.types.integer)|[float](#language.types.float)|[string](#language.types.string) $data,
    [string](#language.types.string) $format = ?
)

    Escribe texto en una celda.

### Parámetros

    row


      fila de celdas






    column


      columna de celdas






    data


      los datos que se escribirán






    format


      Formato string


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);

$file = $excel-&gt;fileName("free.xlsx")
-&gt;header(['name', 'money']);

for ($index = 0; $index &lt; 10; $index++) {
    $file-&gt;insertText($index+1, 0, 'viest');
$file-&gt;insertText($index+1, 1, 10000, '#,##0');
}

$textFile-&gt;output();

# Vtiful\Kernel\Excel::mergeCells

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::mergeCells — Vtiful\Kernel\Excel mergeCells

### Descripción

public **Vtiful\Kernel\Excel::mergeCells**([string](#language.types.string) $scope, [string](#language.types.string) $data)

    Combinar Celdas.

### Parámetros

    scope


      strings de coordenadas de inicio y fin de la celda






    data


      datos string


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);

$excel-&gt;fileName("test.xlsx")
-&gt;mergeCells('A1:C1', 'Merge cells')
-&gt;output();

# Vtiful\Kernel\Excel::output

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::output — Vtiful\Kernel\Excel output

### Descripción

public **Vtiful\Kernel\Excel::output**()

    Salida del archivo xlsx al disco.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Ruta de archivo XLSX;

### Ejemplos

**Ejemplo #1 ejemplo**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$file = $fileObject-&gt;fileName('tutorial.xlsx', 'sheet_one')
-&gt;header(['name', 'age'])
-&gt;data([
['viest', 23],
['wjx', 23],
]);

$path = $file-&gt;output();
?&gt;

# Vtiful\Kernel\Excel::setColumn

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::setColumn — Vtiful\Kernel\Excel setColumn

### Descripción

public **Vtiful\Kernel\Excel::setColumn**([string](#language.types.string) $range, [float](#language.types.float) $width, [resource](#language.types.resource) $format = ?)

    Establece el formato de la columna.

### Parámetros

    range


      los string de coordenadas de inicio y fin de la celda






    width


      ancho de la columna






    format


      recurso de formato de celdas


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 Ejemplo de setColumn**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);
$excel-&gt;fileName('tutorial01.xlsx');

$format = new \Vtiful\Kernel\Format($excel-&gt;getHandle());
$boldStyle = $format-&gt;bold()-&gt;toResource();

$excel-&gt;header(['name', 'age'])
-&gt;data([['viest', 21]])
-&gt;setColumn('A:A', 200, $boldStyle)
-&gt;output();

# Vtiful\Kernel\Excel::setRow

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Excel::setRow — Vtiful\Kernel\Excel setRow

### Descripción

public **Vtiful\Kernel\Excel::setRow**([string](#language.types.string) $range, [float](#language.types.float) $height, [resource](#language.types.resource) $format = ?)

    Establece el formato de la fila.

### Parámetros

    range


      los strings de coordenadas de inicio y fin de la celda






    height


      altura de la fila






    format


      recurso de formato de celdas


### Valores devueltos

instancia [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel)

### Ejemplos

**Ejemplo #1 Ejemplo de setRow**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);
$excel-&gt;fileName('tutorial01.xlsx');

$format = new \Vtiful\Kernel\Format($excel-&gt;getHandle());
$boldStyle = $format-&gt;bold()-&gt;toResource();

$excel-&gt;header(['name', 'age'])
-&gt;data([['viest', 21]])
-&gt;setRow('A1', 20, $boldStyle)
-&gt;output();

## Tabla de contenidos

- [Vtiful\Kernel\Excel::addSheet](#vtiful-kernel-excel.addSheet) — Vtiful\Kernel\Excel addSheet
- [Vtiful\Kernel\Excel::autoFilter](#vtiful-kernel-excel.autoFilter) — Vtiful\Kernel\Excel autoFilter
- [Vtiful\Kernel\Excel::constMemory](#vtiful-kernel-excel.constMemory) — Vtiful\Kernel\Excel constMemory
- [Vtiful\Kernel\Excel::\_\_construct](#vtiful-kernel-excel.construct) — Vtiful\Kernel\Excel constructor
- [Vtiful\Kernel\Excel::data](#vtiful-kernel-excel.data) — Vtiful\Kernel\Excel data
- [Vtiful\Kernel\Excel::fileName](#vtiful-kernel-excel.filename) — Vtiful\Kernel\Excel fileName
- [Vtiful\Kernel\Excel::getHandle](#vtiful-kernel-excel.getHandle) — Vtiful\Kernel\Excel getHandle
- [Vtiful\Kernel\Excel::header](#vtiful-kernel-excel.header) — Vtiful\Kernel\Excel header
- [Vtiful\Kernel\Excel::insertFormula](#vtiful-kernel-excel.insertFormula) — Vtiful\Kernel\Excel insertFormula
- [Vtiful\Kernel\Excel::insertImage](#vtiful-kernel-excel.insertImage) — Vtiful\Kernel\Excel insertImage
- [Vtiful\Kernel\Excel::insertText](#vtiful-kernel-excel.insertText) — Vtiful\Kernel\Excel insertText
- [Vtiful\Kernel\Excel::mergeCells](#vtiful-kernel-excel.mergeCells) — Vtiful\Kernel\Excel mergeCells
- [Vtiful\Kernel\Excel::output](#vtiful-kernel-excel.output) — Vtiful\Kernel\Excel output
- [Vtiful\Kernel\Excel::setColumn](#vtiful-kernel-excel.setColumn) — Vtiful\Kernel\Excel setColumn
- [Vtiful\Kernel\Excel::setRow](#vtiful-kernel-excel.setRow) — Vtiful\Kernel\Excel setRow

# The Vtiful\Kernel\Format class

(PECL xlswriter &gt;= 1.2.1)

## Introducción

    Crea un objeto con formato de celda

## Sinopsis de la Clase

    ****




      class **Vtiful\Kernel\Format**

     {


    /* Constantes */

     const
     [int](#language.types.integer)
      [FORMAT_ALIGN_LEFT](#vtiful-kernel-format.constants.format-align-left) = 1;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_CENTER](#vtiful-kernel-format.constants.format-align-center) = 2;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_RIGHT](#vtiful-kernel-format.constants.format-align-right) = 3;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_FILL](#vtiful-kernel-format.constants.format-align-fill) = 4;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_JUSTIFY](#vtiful-kernel-format.constants.format-align-justify) = 5;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_CENTER_ACROSS](#vtiful-kernel-format.constants.format-align-center-across) = 6;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_DISTRIBUTED](#vtiful-kernel-format.constants.format-align-distributed) = 7;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_VERTICAL_TOP](#vtiful-kernel-format.constants.format-align-vertical-top) = 8;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_VERTICAL_BOTTOM](#vtiful-kernel-format.constants.format-align-vertical-bottom) = 9;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_VERTICAL_CENTER](#vtiful-kernel-format.constants.format-align-vertical-center) = 10;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_VERTICAL_JUSTIFY](#vtiful-kernel-format.constants.format-align-vertical-justify) = 11;

    const
     [int](#language.types.integer)
      [FORMAT_ALIGN_VERTICAL_DISTRIBUTED](#vtiful-kernel-format.constants.format-align-vertical-distributed) = 12;

    const
     [int](#language.types.integer)
      [UNDERLINE_SINGLE](#vtiful-kernel-format.constants.underline-single) = 1;

    const
     [int](#language.types.integer)
      [UNDERLINE_DOUBLE](#vtiful-kernel-format.constants.underline-double) = 2;

    const
     [int](#language.types.integer)
      [UNDERLINE_SINGLE_ACCOUNTING](#vtiful-kernel-format.constants.underline-single-accounting) = 3;

    const
     [int](#language.types.integer)
      [UNDERLINE_DOUBLE_ACCOUNTING](#vtiful-kernel-format.constants.underline-double-accounting) = 4;


    /* Métodos */

public [align](#vtiful-kernel-format.align)([resource](#language.types.resource) $handle, [int](#language.types.integer) $style)
public [bold](#vtiful-kernel-format.bold)([resource](#language.types.resource) $handle)
public [italic](#vtiful-kernel-format.italic)([resource](#language.types.resource) $handle)
public [underline](#vtiful-kernel-format.underline)([resource](#language.types.resource) $handle, [int](#language.types.integer) $style)

}

## Constantes predefinidas

     **[Vtiful\Kernel\Format::FORMAT_ALIGN_LEFT](#vtiful-kernel-format.constants.format-align-left)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_CENTER](#vtiful-kernel-format.constants.format-align-center)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_RIGHT](#vtiful-kernel-format.constants.format-align-right)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_FILL](#vtiful-kernel-format.constants.format-align-fill)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_JUSTIFY](#vtiful-kernel-format.constants.format-align-justify)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_CENTER_ACROSS](#vtiful-kernel-format.constants.format-align-center-across)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_DISTRIBUTED](#vtiful-kernel-format.constants.format-align-distributed)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_VERTICAL_TOP](#vtiful-kernel-format.constants.format-align-vertical-top)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_VERTICAL_BOTTOM](#vtiful-kernel-format.constants.format-align-vertical-bottom)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_VERTICAL_CENTER](#vtiful-kernel-format.constants.format-align-vertical-center)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_VERTICAL_JUSTIFY](#vtiful-kernel-format.constants.format-align-vertical-justify)**








     **[Vtiful\Kernel\Format::FORMAT_ALIGN_VERTICAL_DISTRIBUTED](#vtiful-kernel-format.constants.format-align-vertical-distributed)**








     **[Vtiful\Kernel\Format::UNDERLINE_SINGLE](#vtiful-kernel-format.constants.underline-single)**








     **[Vtiful\Kernel\Format::UNDERLINE_DOUBLE](#vtiful-kernel-format.constants.underline-double)**








     **[Vtiful\Kernel\Format::UNDERLINE_SINGLE_ACCOUNTING](#vtiful-kernel-format.constants.underline-single-accounting)**








     **[Vtiful\Kernel\Format::UNDERLINE_DOUBLE_ACCOUNTING](#vtiful-kernel-format.constants.underline-double-accounting)**






# Vtiful\Kernel\Format::align

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Format::align — Vtiful\Kernel\Format align

### Descripción

public **Vtiful\Kernel\Format::align**([resource](#language.types.resource) $handle, [int](#language.types.integer) $style)

    establece la alineación de la celda

### Parámetros

    handle


      manejador de archivos xlsx






    style


      constante [Vtiful\Kernel\Format](#class.vtiful-kernel-format)


### Valores devueltos

    Recurso

### Ejemplos

**Ejemplo #1 Ejemplo de estilo de alineación**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);
$excel-&gt;fileName('tutorial01.xlsx');

$format = new \Vtiful\Kernel\Format($excel-&gt;getHandle());
$alignStyle = $format-&gt;align(\Vtiful\Kernel\Format::FORMAT_ALIGN_LEFT)-&gt;toResource();

$excel-&gt;header(['name', 'age'])
-&gt;data([['viest', 21]])
-&gt;setColumn('A:A', 200, $alignStyle)
-&gt;output();
?&gt;

# Vtiful\Kernel\Format::bold

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Format::bold — Vtiful\Kernel\Format bold

### Descripción

public **Vtiful\Kernel\Format::bold**([resource](#language.types.resource) $handle)

    [Vtiful\Kernel\Format](#class.vtiful-kernel-format) formato en negrita

### Parámetros

    handle


      manejador de archivos xlsx


### Valores devueltos

    Recurso

### Ejemplos

**Ejemplo #1 Ejemplo de estilo negrita**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);
$excel-&gt;fileName('tutorial01.xlsx');

$format = new \Vtiful\Kernel\Format($excel-&gt;getHandle());
$boldStyle = $format-&gt;bold()-&gt;toResource();

$excel-&gt;header(['name', 'age'])
-&gt;data([['viest', 21]])
-&gt;setColumn('A:A', 200, $boldStyle)
-&gt;output();
?&gt;

# Vtiful\Kernel\Format::italic

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Format::italic — Vtiful\Kernel\Format italic

### Descripción

public **Vtiful\Kernel\Format::italic**([resource](#language.types.resource) $handle)

    [Vtiful\Kernel\Format](#class.vtiful-kernel-format) formato cursivo

### Parámetros

    handle


      manejador de archivos xlsx


### Valores devueltos

    Recurso

### Ejemplos

**Ejemplo #1 Ejemplo de estilo cursiva**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);
$excel-&gt;fileName('tutorial01.xlsx');

$format = new \Vtiful\Kernel\Format($excel-&gt;getHandle());
$italicStyle = $format-&gt;italic()-&gt;toResource();

$excel-&gt;header(['name', 'age'])
-&gt;data([['viest', 21]])
-&gt;setColumn('A:A', 200, $italicStyle)
-&gt;output();
?&gt;

# Vtiful\Kernel\Format::underline

(PECL xlswriter &gt;= 1.2.1)

Vtiful\Kernel\Format::underline — Vtiful\Kernel\Format underline

### Descripción

public **Vtiful\Kernel\Format::underline**([resource](#language.types.resource) $handle, [int](#language.types.integer) $style)

    [Vtiful\Kernel\Format](#class.vtiful-kernel-format) formato subrayado

### Parámetros

    handle


      manejador de archivos xlsx






    style


      constante [Vtiful\Kernel\Format](#class.vtiful-kernel-format)


### Valores devueltos

    Recurso

### Ejemplos

**Ejemplo #1 Ejemplo de estilo subrayado**

&lt;?php
$config = [
'path' =&gt; './tests'
];

$excel = new \Vtiful\Kernel\Excel($config);
$excel-&gt;fileName('tutorial01.xlsx');

$format = new \Vtiful\Kernel\Format($excel-&gt;getHandle());
$underlineStyle = $format-&gt;underline(\Vtiful\Kernel\Format::UNDERLINE_SINGLE)-&gt;toResource();

$excel-&gt;header(['name', 'age'])
-&gt;data([['viest', 21]])
-&gt;setColumn('A:A', 200, $underlineStyle)
-&gt;output();
?&gt;

## Tabla de contenidos

- [Vtiful\Kernel\Format::align](#vtiful-kernel-format.align) — Vtiful\Kernel\Format align
- [Vtiful\Kernel\Format::bold](#vtiful-kernel-format.bold) — Vtiful\Kernel\Format bold
- [Vtiful\Kernel\Format::italic](#vtiful-kernel-format.italic) — Vtiful\Kernel\Format italic
- [Vtiful\Kernel\Format::underline](#vtiful-kernel-format.underline) — Vtiful\Kernel\Format underline

- [Introducción](#intro.xlswriter)
- [Instalación/Configuración](#xlswriter.setup)<li>[Requerimientos](#xlswriter.requirements)
- [Instalación](#xlswriter.installation)
- [Tipos de recursos](#xlswriter.resources)
  </li>- [Vtiful\Kernel\Excel](#class.vtiful-kernel-excel) — The Vtiful\Kernel\Excel class<li>[Vtiful\Kernel\Excel::addSheet](#vtiful-kernel-excel.addSheet) — Vtiful\Kernel\Excel addSheet
- [Vtiful\Kernel\Excel::autoFilter](#vtiful-kernel-excel.autoFilter) — Vtiful\Kernel\Excel autoFilter
- [Vtiful\Kernel\Excel::constMemory](#vtiful-kernel-excel.constMemory) — Vtiful\Kernel\Excel constMemory
- [Vtiful\Kernel\Excel::\_\_construct](#vtiful-kernel-excel.construct) — Vtiful\Kernel\Excel constructor
- [Vtiful\Kernel\Excel::data](#vtiful-kernel-excel.data) — Vtiful\Kernel\Excel data
- [Vtiful\Kernel\Excel::fileName](#vtiful-kernel-excel.filename) — Vtiful\Kernel\Excel fileName
- [Vtiful\Kernel\Excel::getHandle](#vtiful-kernel-excel.getHandle) — Vtiful\Kernel\Excel getHandle
- [Vtiful\Kernel\Excel::header](#vtiful-kernel-excel.header) — Vtiful\Kernel\Excel header
- [Vtiful\Kernel\Excel::insertFormula](#vtiful-kernel-excel.insertFormula) — Vtiful\Kernel\Excel insertFormula
- [Vtiful\Kernel\Excel::insertImage](#vtiful-kernel-excel.insertImage) — Vtiful\Kernel\Excel insertImage
- [Vtiful\Kernel\Excel::insertText](#vtiful-kernel-excel.insertText) — Vtiful\Kernel\Excel insertText
- [Vtiful\Kernel\Excel::mergeCells](#vtiful-kernel-excel.mergeCells) — Vtiful\Kernel\Excel mergeCells
- [Vtiful\Kernel\Excel::output](#vtiful-kernel-excel.output) — Vtiful\Kernel\Excel output
- [Vtiful\Kernel\Excel::setColumn](#vtiful-kernel-excel.setColumn) — Vtiful\Kernel\Excel setColumn
- [Vtiful\Kernel\Excel::setRow](#vtiful-kernel-excel.setRow) — Vtiful\Kernel\Excel setRow
  </li>- [Vtiful\Kernel\Format](#class.vtiful-kernel-format) — The Vtiful\Kernel\Format class<li>[Vtiful\Kernel\Format::align](#vtiful-kernel-format.align) — Vtiful\Kernel\Format align
- [Vtiful\Kernel\Format::bold](#vtiful-kernel-format.bold) — Vtiful\Kernel\Format bold
- [Vtiful\Kernel\Format::italic](#vtiful-kernel-format.italic) — Vtiful\Kernel\Format italic
- [Vtiful\Kernel\Format::underline](#vtiful-kernel-format.underline) — Vtiful\Kernel\Format underline
  </li>
