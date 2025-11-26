# Formato de formulario

# Introducción

Forms Data Format (FDF) es un formato de formulario para documentos
PDF. La documentación (en inglés) puede ser leída en
[» http://www.adobe.com/devnet/acrobat/fdftoolkit.html](http://www.adobe.com/devnet/acrobat/fdftoolkit.html)
para más detalles sobre los pormenores.

El espíritu de FDF es similar al de los formularios HTML. Las
diferencias radican en los medios de transmisión de los
datos al servidor, cuando el botón "submit" (enviar) es
presionado (lo cual es del ámbito de Form Data Format) y el formato de
formulario en sí mismo (que es más bien del ámbito de Portable Document
Format, PDF). Gestionar datos FDF es uno de los objetivos de las
funciones FDF. Pero hay otros. También es posible tomar un
formulario PDF y prellenar los campos sin modificar el
formulario en sí. En este caso, se creará un documento FDF
([fdf_create()](#function.fdf-create)), se llenarán los campos
([fdf_set_value()](#function.fdf-set-value)) y se asociará a un fichero PDF
([fdf_set_file()](#function.fdf-set-file)). Finalmente, todo será enviado
al cliente, con el tipo MIME application/vnd.fdf. El módulo "Acrobat reader"
del navegador reconocerá este tipo MIME y leerá el fichero
PDF, luego lo llenará con FDF.

Si se edita un fichero FDF con un editor de texto, se encontrará
un catálogo de objetos con el nombre de FDF. Este objeto
puede contener entradas tales como Fields,
F, Status etc.
Las entradas más comúnmente utilizadas son
Fields, que indica una lista de campos de control,
y F que contiene el nombre del fichero PDF al que
pertenecen estos datos. Estas entradas son designadas en la documentación
PDF bajo el nombre de /F-Key o /Status-Key.
La modificación de estas entradas es posible con las funciones
[fdf_set_file()](#function.fdf-set-file) y [fdf_set_status()](#function.fdf-set-status).
Los campos son modificables con las funciones
[fdf_set_value()](#function.fdf-set-value), [fdf_set_opt()](#function.fdf-set-opt) etc.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#fdf.requirements)
- [Instalación](#fdf.installation)
- [Tipos de recursos](#fdf.resources)

    ## Requerimientos

    Se necesitará el SDK de FDF toolkit, disponible en el sitio
    [» http://www.adobe.com/devnet/acrobat/fdftoolkit.html](http://www.adobe.com/devnet/acrobat/fdftoolkit.html).
    Desde PHP 4.3.0, se necesitará la versión 5.0 del SDK.
    La biblioteca FDF toolkit está disponible como una biblioteca compilada, editada por Adobe, en los sistemas operativos Win32,
    Linux, Solaris y AIX.

## Instalación

Esta extensión es considerada no mantenida y muerta.
Sin embargo, el código fuente sigue disponible desde el
SVN de
PECL aquí:
[» https://svn.php.net/viewvc/pecl/fdf](https://svn.php.net/viewvc/pecl/fdf).

Esta extensión ya no se proporciona con PHP.

**Nota**:

Si se encuentran problemas durante la configuración de FDF con soporte fdftk, verifique que el fichero de encabezado
fdftk.h y la biblioteca
libfdftk.so estén en su lugar. El script
**configure** soporta la jerarquía de directorios de la distribución
FDF SDK y la organización clásica DIR/include y
DIR/lib: por lo tanto, se puede utilizar uno u otro
directamente con la distribución descomprimida, o bien incluyendo el
fichero de encabezado y la biblioteca apropiada en su sistema, es decir,
en /usr/local/include y
/usr/local/lib. Solo queda configurar
con **--with-fdftk=/usr/local**.

**Nota**:
**Nota para usuarios Win32**

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
fdftk.dll

## Tipos de recursos

La mayoría de las funciones FDF requieren un recurso de tipo
fdf como primer argumento. Un recurso
fdf es una estructura que representa un
fichero FDF abierto. Se pueden crear recursos fdf
con las funciones [fdf_create()](#function.fdf-create),
[fdf_open()](#function.fdf-open) y [fdf_open_string()](#function.fdf-open-string).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[FDFValue](#constant.fdfvalue)**
    ([int](#language.types.integer))









    **[FDFStatus](#constant.fdfstatus)**
    ([int](#language.types.integer))









    **[FDFFile](#constant.fdffile)**
    ([int](#language.types.integer))









    **[FDFID](#constant.fdfid)**
    ([int](#language.types.integer))









    **[FDFFf](#constant.fdfff)**
    ([int](#language.types.integer))









    **[FDFSetFf](#constant.fdfsetff)**
    ([int](#language.types.integer))









    **[FDFClearFf](#constant.fdfclearff)**
    ([int](#language.types.integer))









    **[FDFFlags](#constant.fdfflags)**
    ([int](#language.types.integer))









    **[FDFSetF](#constant.fdfsetf)**
    ([int](#language.types.integer))









    **[FDFClrF](#constant.fdfclrf)**
    ([int](#language.types.integer))









    **[FDFAP](#constant.fdfap)**
    ([int](#language.types.integer))









    **[FDFAS](#constant.fdfas)**
    ([int](#language.types.integer))









    **[FDFAction](#constant.fdfaction)**
    ([int](#language.types.integer))









    **[FDFAA](#constant.fdfaa)**
    ([int](#language.types.integer))









    **[FDFAPRef](#constant.fdfapref)**
    ([int](#language.types.integer))









    **[FDFIF](#constant.fdfif)**
    ([int](#language.types.integer))









    **[FDFEnter](#constant.fdfenter)**
    ([int](#language.types.integer))









    **[FDFExit](#constant.fdfexit)**
    ([int](#language.types.integer))









    **[FDFDown](#constant.fdfdown)**
    ([int](#language.types.integer))









    **[FDFUp](#constant.fdfup)**
    ([int](#language.types.integer))









    **[FDFFormat](#constant.fdfformat)**
    ([int](#language.types.integer))









    **[FDFValidate](#constant.fdfvalidate)**
    ([int](#language.types.integer))









    **[FDFKeystroke](#constant.fdfkeystroke)**
    ([int](#language.types.integer))









    **[FDFCalculate](#constant.fdfcalculate)**
    ([int](#language.types.integer))









    **[FDFNormalAP](#constant.fdfnormalap)**
    ([int](#language.types.integer))









    **[FDFRolloverAP](#constant.fdfrolloverap)**
    ([int](#language.types.integer))









    **[FDFDownAP](#constant.fdfdownap)**
    ([int](#language.types.integer))

# Ejemplos

Los siguientes ejemplos muestran cómo evaluar los datos
del formulario.

**Ejemplo #1 Evaluar un documento FDF**

&lt;?php
// Abrir un fichero FDF desde una string proporcionada por la extensión PDF
// El formulario PDF contiene varios campos de texto con los nombres
// volume, date, comment, publisher, preparer y dos casillas de verificación
// show_publisher y show_preparer.
$fdf = fdf_open_string($HTTP_FDF_DATA);
$volume = fdf_get_value($fdf, "volume");
echo 'El campo Volume contiene el valor: "&lt;strong&gt;' . $volume . '&lt;/strong&gt;"&lt;br /&gt;';

$date = fdf_get_value($fdf, "date");
echo 'El valor del campo date era "&lt;strong&gt;' . $date . '&lt;/strong&gt;"&lt;br /&gt;';

$comment = fdf_get_value($fdf, "comment");
echo 'El valor del campo comment era "&lt;strong&gt;' . $comment . '&lt;/strong&gt;"&lt;br /&gt;';

if (fdf_get_value($fdf, "show_publisher") == "On") {
  $publisher = fdf_get_value($fdf, "publisher");
echo "El valor del campo Publisher era: '&lt;strong&gt;" . $publisher . "&lt;/strong&gt;&lt;br /&gt;";
} else
echo 'El valor del campo Publisher no debe ser mostrado.&lt;br /&gt;';

if (fdf_get_value($fdf, "show_preparer") == "On") {
  $preparer = fdf_get_value($fdf, "preparer");
echo 'El valor del campo Preparer era "&lt;strong&gt;' . $preparer . '&lt;/strong&gt;"&lt;br /&gt;';
} else
  echo 'El valor del campo Preparer no debe ser mostrado.&lt;br /&gt;';
fdf_close($fdf);
?&gt;

# Funciones FDF

# fdf_add_doc_javascript

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_add_doc_javascript — Añade código javascript a un documento FDF

### Descripción

**fdf_add_doc_javascript**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $script_name, [string](#language.types.string) $script_code): [bool](#language.types.boolean)

Añade el código javascript script_code
al documento fdfdoc, que Acrobat añadirá a los scripts de
nivel de documento, una vez importado el FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     script_name


       El nombre del script.






     script_code


       El código del script. Se recomienda encarecidamente utilizar '\r' como
       separador de líneas en el código script_code.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Adición de código JavaScript a un documento FDF**

&lt;?php
$fdf = fdf_create();
fdf_add_doc_javascript($fdf, "PlusOne", "function PlusOne(x)\r{\r return x+1;\r}\r");
fdf_save($fdf);
?&gt;

     Este ejemplo creará un documento FDF como el siguiente:

%FDF-1.2
%âãÏÓ
1 0 obj
&lt;&lt;
/FDF &lt;&lt; /JavaScript &lt;&lt; /Doc [ (PlusOne)(function PlusOne\(x\)\r{\r return x+1;\r}\r)] &gt;&gt; &gt;&gt;
&gt;&gt;
endobj
trailer
&lt;&lt;
/Root 1 0 R

&gt;&gt;
%%EOF

# fdf_add_template

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_add_template — Añade una plantilla en el documento FDF

### Descripción

**fdf_add_template**(
    [resource](#language.types.resource) $fdf_document,
    [int](#language.types.integer) $newpage,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $template,
    [int](#language.types.integer) $rename
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# fdf_close

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_close — Cierra un documento FDF

### Descripción

**fdf_close**([resource](#language.types.resource) $fdf_document): [void](language.types.void.html)

Cierra el documento FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [fdf_open()](#function.fdf-open) - Abre un documento FDF

# fdf_create

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_create — Crea un nuevo documento FDF

### Descripción

**fdf_create**(): [resource](#language.types.resource)

Crea un nuevo documento FDF.

Esta función es necesaria para aquellos que desean prellenar
los campos de un formulario en un fichero PDF.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un gestor de documento FDF, o **[false](#constant.false)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Prellemar un formulario PDF**

&lt;?php
$outfdf = fdf_create();
fdf_set_value($outfdf, "volume", $volume, 0);

fdf_set_file($outfdf, "http:/testfdf/resultlabel.pdf");
fdf_save($outfdf, "outtest.fdf");
fdf_close($outfdf);
Header("Content-type: application/vnd.fdf");
$fp = fopen("outtest.fdf", "r");
fpassthru($fp);
unlink("outtest.fdf");
?&gt;

### Ver también

    - [fdf_close()](#function.fdf-close) - Cierra un documento FDF

    - [fdf_save()](#function.fdf-save) - Guarda un documento FDF

    - [fdf_open()](#function.fdf-open) - Abre un documento FDF

# fdf_enum_values

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_enum_values — Llama a una función de usuario para cada valor FDF

### Descripción

**fdf_enum_values**([resource](#language.types.resource) $fdf_document, [callable](#language.types.callable) $function, [mixed](#language.types.mixed) $userdata = ?): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# fdf_errno

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_errno — Devuelve el código de error de la última operación FDF

### Descripción

**fdf_errno**(): [int](#language.types.integer)

Recupera el código de error de la última operación FDF.

Un mensaje de error es accesible a través de la función
[fdf_error()](#function.fdf-error) function.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de error en forma de [int](#language.types.integer) o 0 si no ha ocurrido
ningún error.

### Ver también

    - [fdf_error()](#function.fdf-error) - Devuelve el mensaje de error FDF

# fdf_error

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_error — Devuelve el mensaje de error FDF

### Descripción

**fdf_error**([int](#language.types.integer) $error_code = -1): [string](#language.types.string)

Devuelve el mensaje de error FDF.

### Parámetros

     error_code


       Un código de error obtenido con la función
       [fdf_errno()](#function.fdf-errno). Si no se proporciona, esta función
       utiliza el código de error interno definido por la última operación.





### Valores devueltos

Devuelve el mensaje de error en forma de un [string](#language.types.string) o
la cadena no error si no hay ninguno.

### Ver también

    - [fdf_errno()](#function.fdf-errno) - Devuelve el código de error de la última operación FDF

# fdf_get_ap

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_ap — Lee la apariencia de un campo

### Descripción

**fdf_get_ap**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $field,
    [int](#language.types.integer) $face,
    [string](#language.types.string) $filename
): [bool](#language.types.boolean)

Lee la apariencia del campo field (es decir, el valor
de la clave /AP) y la almacena en el fichero filename.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     field








     face


       Los valores posibles son **[FDFNormalAP](#constant.fdfnormalap)**,
       **[FDFRolloverAP](#constant.fdfrolloverap)** y **[FDFDownAP](#constant.fdfdownap)**.






     filename


       La apariencia será almacenada en este parámetro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# fdf_get_attachment

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_attachment — Extrae un fichero integrado en un documento FDF

### Descripción

**fdf_get_attachment**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $fieldname, [string](#language.types.string) $savepath): [array](#language.types.array)

Extrae el fichero fieldname
subido a través del campo "file selection",
luego lo almacena en el fichero savepath.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     fieldname








     savepath


       Puede ser el nombre de un fichero o bien un directorio en el cual el
       fichero subido será creado bajo su nombre original. Cualquier fichero
       ya existente con el mismo nombre será sobrescrito.



      **Nota**:



        Parece que no hay otra manera de conocer el nombre del fichero subido
        que almacenarlo en un directorio con savepath y
        luego leer su nombre en el directorio.






### Valores devueltos

El array devuelto contiene los siguientes campos:

    -
     path - ruta de almacenamiento del directorio


    -
     size - tamaño del fichero almacenado en bytes


    -
     type - Tipo MIMI del fichero, si fue proporcionado en el documento FDF

### Ejemplos

    **Ejemplo #1 Almacenamiento de un fichero subido**

&lt;?php
$fdf = fdf_open_string($HTTP_FDF_DATA);
$data = fdf_get_attachment($fdf, "filename", "/tmpdir");
echo "El fichero subido es almacenado en $data[path]";
?&gt;

# fdf_get_encoding

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_encoding — Lee el valor de la clave /Encoding

### Descripción

**fdf_get_encoding**([resource](#language.types.resource) $fdf_document): [string](#language.types.string)

Recupera el valor de la clave /Encoding.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).





### Valores devueltos

Devuelve la codificación, en forma de un [string](#language.types.string). Una cadena vacía
es devuelta si el esquema PDFDocEncoding/Unicode
es utilizado.

### Ver también

    - [fdf_set_encoding()](#function.fdf-set-encoding) - Modifica la codificación de caracteres

# fdf_get_file

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_file — Lee el valor de la clave /F

### Descripción

**fdf_get_file**([resource](#language.types.resource) $fdf_document): [string](#language.types.string)

Lee el valor de la clave /F.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).





### Valores devueltos

Devuelve el valor de la clave, en forma de [string](#language.types.string).

### Ver también

    - [fdf_set_file()](#function.fdf-set-file) - Crea un documento PDF para mostrar datos FDF

# fdf_get_flags

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_flags — Lee los atributos de un campo FDF

### Descripción

**fdf_get_flags**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $fieldname, [int](#language.types.integer) $whichflags): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# fdf_get_opt

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECLv)

fdf_get_opt — Lee un valor en un array de valores de un campo FDF

### Descripción

**fdf_get_opt**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $fieldname, [int](#language.types.integer) $element = -1): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# fdf_get_status

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_status — Lee el valor de la clave /STATUS

### Descripción

**fdf_get_status**([resource](#language.types.resource) $fdf_document): [string](#language.types.string)

Lee el valor de la clave /STATUS.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).





### Valores devueltos

Devuelve el valor de la clave, en forma de [string](#language.types.string).

### Ver también

    - [fdf_set_status()](#function.fdf-set-status) - Establece el valor de la clave /STATUS

# fdf_get_value

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_value — Devuelve el valor de un campo FDF

### Descripción

**fdf_get_value**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $fieldname, [int](#language.types.integer) $which = -1): [mixed](#language.types.mixed)

Devuelve el valor de un campo FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string).






     which


       Los elementos de un campo array pueden ser leídos proporcionando este
       argumento opcional, en forma de un entero cuyo valor mínimo será 0. Para los campos que no son arrays, este argumento
       opcional será ignorado.





### Valores devueltos

Devuelve el valor del campo.

### Ver también

    - [fdf_set_value()](#function.fdf-set-value) - Modifica el valor de un campo FDF

# fdf_get_version

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_get_version — Lee el número de versión de la API FDF

### Descripción

**fdf_get_version**([resource](#language.types.resource) $fdf_document = ?): [string](#language.types.string)

Devuelve el número de versión FDF para el documento
fdf_document, para la API
si no se proporciona ningún argumento.

### Parámetros

     fdf_document


       El gestor de documento, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).





### Valores devueltos

Devuelve la versión, en forma de [string](#language.types.string).
Para la versión actual del FDF toolkit 5.0, el número de versión es
5.0 y el número de versión del documento es
1.2, 1.3 o 1.4.

### Ver también

    - [fdf_set_version()](#function.fdf-set-version) - Modifica el número de versión del fichero FDF

# fdf_header

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVNf)

fdf_header — Emite las cabeceras HTTP específicas de FDF

### Descripción

**fdf_header**(): [void](language.types.void.html)

**fdf_header()** es una función de conveniencia,
para emitir las cabeceras HTTP específicas de FDF. Permite
enviar el tipo Content-type:
con el valor application/vnd.fdf.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# fdf_next_field_name

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_next_field_name — Lee el nombre del siguiente campo FDF

### Descripción

**fdf_next_field_name**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $fieldname = ?): [string](#language.types.string)

Lee el nombre del siguiente campo FDF. Este nombre podrá ser utilizado en varias funciones.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string). Si no se proporciona,
       se devolverá el primer campo.





### Valores devueltos

Devuelve el nombre del campo, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Detectar todos los nombres de un formulario FDF**

&lt;?php
$fdf = fdf_open($HTTP_FDF_DATA);
for ($field = fdf_next_field_name($fdf);
$field != "";
    $field = fdf_next_field_name($fdf, $field)) {
echo "field: $field\n";
}
?&gt;

### Ver también

    - [fdf_get_value()](#function.fdf-get-value) - Devuelve el valor de un campo FDF

# fdf_open

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_open — Abre un documento FDF

### Descripción

**fdf_open**([string](#language.types.string) $filename): [resource](#language.types.resource)

Abre un documento FDF.

Asimismo, se puede utilizar la función
[fdf_open_string()](#function.fdf-open-string) para procesar el resultado
de un formulario PDF enviado mediante un método POST.

### Parámetros

     filename


       Ruta hacia el fichero FDF. Este fichero debe contener los datos
       tal como son devueltos por un formulario PDF o creados utilizando las funciones
       [fdf_create()](#function.fdf-create) y [fdf_save()](#function.fdf-save).





### Valores devueltos

Devuelve un gestor de documento FDF, o **[false](#constant.false)**
en caso de error.

### Ejemplos

    **Ejemplo #1 Acceder a los datos del formulario**

&lt;?php
// Guarda el fichero FDF en un fichero temporal.
$fdffp = fopen("test.fdf", "w");
fwrite($fdffp, $HTTP_FDF_DATA, strlen($HTTP_FDF_DATA));
fclose($fdffp);

// Abre el fichero temporal y utiliza los datos.
$fdf = fdf_open("test.fdf");
/* ... */
fdf_close($fdf);
?&gt;

### Ver también

    - [fdf_open_string()](#function.fdf-open-string) - Lee un documento FDF a partir de un string

    - [fdf_close()](#function.fdf-close) - Cierra un documento FDF

    - [fdf_create()](#function.fdf-create) - Crea un nuevo documento FDF

    - [fdf_save()](#function.fdf-save) - Guarda un documento FDF

# fdf_open_string

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_open_string — Lee un documento FDF a partir de un [string](#language.types.string)

### Descripción

**fdf_open_string**([string](#language.types.string) $fdf_data): [resource](#language.types.resource)

Lee un documento FDF a partir de un [string](#language.types.string).

Se puede utilizar **fdf_open_string()** con la variable
$HTTP_FDF_DATA para procesar datos
de formularios provenientes de clientes remotos.

### Parámetros

     fdf_data


       Los datos, como devueltos desde un formulario PDF
       o creados utilizando las funciones
       [fdf_create()](#function.fdf-create) y
       [fdf_save_string()](#function.fdf-save-string).





### Valores devueltos

Devuelve un gestor de documento FDF, o **[false](#constant.false)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Acceso a los datos de formulario FDF**

&lt;?php
$fdf = fdf_open_string($HTTP_FDF_DATA);
/_ ... _/
fdf_close($fdf);
?&gt;

### Ver también

    - [fdf_open()](#function.fdf-open) - Abre un documento FDF

    - [fdf_close()](#function.fdf-close) - Cierra un documento FDF

    - [fdf_create()](#function.fdf-create) - Crea un nuevo documento FDF

    - [fdf_save_string()](#function.fdf-save-string) - Devuelve un documento FDF en forma de string

# fdf_remove_item

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_remove_item — Configura el marco FDF de destino para el formulario

### Descripción

**fdf_remove_item**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $fieldname, [int](#language.types.integer) $item): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# fdf_save

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_save — Guarda un documento FDF

### Descripción

**fdf_save**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $filename = ?): [bool](#language.types.boolean)

Guarda un documento FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     filename


       Si se proporciona, el FDF resultante será escrito en este parámetro.
       De lo contrario, esta función escribirá el FDF en la salida estándar de PHP.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_close()](#function.fdf-close) - Cierra un documento FDF

    - [fdf_create()](#function.fdf-create) - Crea un nuevo documento FDF

    - [fdf_save_string()](#function.fdf-save-string) - Devuelve un documento FDF en forma de string

# fdf_save_string

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_save_string — Devuelve un documento FDF en forma de [string](#language.types.string)

### Descripción

**fdf_save_string**([resource](#language.types.resource) $fdf_document): [string](#language.types.string)

Devuelve un documento FDF en forma de [string](#language.types.string).

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).





### Valores devueltos

Devuelve el documento, en forma de [string](#language.types.string), o
**[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Leer un documento FDF en forma de [string](#language.types.string)**

&lt;?php
$fdf = fdf_create();
fdf_set_value($fdf, "foo", "bar");
$str = fdf_save_string($fdf);
fdf_close($fdf);
echo $str;
?&gt;

    El ejemplo anterior mostrará:

%FDF-1.2
%âãÏÓ
1 0 obj
&lt;&lt;
/FDF &lt;&lt; /Fields 2 0 R &gt;&gt;
&gt;&gt;
endobj
2 0 obj
[
&lt;&lt; /T (foo)/V (bar)&gt;&gt;
]
endobj
trailer
&lt;&lt;
/Root 1 0 R

&gt;&gt;
%%EOF

### Ver también

    - [fdf_open_string()](#function.fdf-open-string) - Lee un documento FDF a partir de un string

    - [fdf_close()](#function.fdf-close) - Cierra un documento FDF

    - [fdf_create()](#function.fdf-create) - Crea un nuevo documento FDF

    - [fdf_save()](#function.fdf-save) - Guarda un documento FDF

# fdf_set_ap

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_ap — Fija la apariencia de un campo FDF

### Descripción

**fdf_set_ap**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $field_name,
    [int](#language.types.integer) $face,
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $page_number
): [bool](#language.types.boolean)

Fija la apariencia de un campo FDF (es decir, el valor de la clave
/AP).

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     field_name








     face


       Los valores posibles son: **[FDFNormalAP](#constant.fdfnormalap)**,
       **[FDFRolloverAP](#constant.fdfrolloverap)** y
       **[FDFDownAP](#constant.fdfdownap)**.






     filename








     page_number







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# fdf_set_encoding

(PHP 4 &gt;= 4.0.7, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_encoding — Modifica la codificación de caracteres

### Descripción

**fdf_set_encoding**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $encoding): [bool](#language.types.boolean)

Modifica la codificación de caracteres del documento FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     encoding


       El nombre de la codificación. Los siguientes valores son soportados:
       "Shift-JIS", "UHC",
       "GBK" y "BigFive".




       Un [string](#language.types.string) vacío reemplaza el valor por omisión de la codificación al
       esquema PDFDocEncoding/Unicode.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# fdf_set_file

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_file — Crea un documento PDF para mostrar datos FDF

### Descripción

**fdf_set_file**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $url, [string](#language.types.string) $target_frame = ?): [bool](#language.types.boolean)

Crea un documento PDF para mostrar datos FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     url


       Debe ser proporcionado en forma de URL absoluta.






     target_frame


       Utilice este parámetro para especificar la frame en la que se mostrará el documento. También es posible definir el valor por omisión de este parámetro utilizando la función [fdf_set_target_frame()](#function.fdf-set-target-frame).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Pasar datos FDF a un segundo formulario**

&lt;?php
/_ Configura el encabezado para Adobe FDF _/
fdf_header();

/_ Inicia un nuevo fichero FDF _/
$fdf = fdf_create();

/_ Asigna al campo "foo" el valor de "bar" _/
fdf_set_value($fdf, "foo", "bar");

/_ Indica al cliente que muestre los datos FDF con "fdf_form.pdf" _/
fdf_set_file($fdf, "http://www.example.com/fdf_form.pdf");

/_ Muestra el FDF _/
fdf_save($fdf);

/_ Limpia _/
fdf_close($fdf);
?&gt;

### Ver también

    - [fdf_get_file()](#function.fdf-get-file) - Lee el valor de la clave /F

    - [fdf_set_target_frame()](#function.fdf-set-target-frame) - Configura el marco de destino para la visualización del formulario

# fdf_set_flags

(PHP 4 &gt;= 4.0.2, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_flags — Modifica una opción de un campo

### Descripción

**fdf_set_flags**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $fieldname,
    [int](#language.types.integer) $whichFlags,
    [int](#language.types.integer) $newFlags
): [bool](#language.types.boolean)

Modifica una opción de un campo.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string).






     whichFlags








     newFlags







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_set_opt()](#function.fdf-set-opt) - Modifica una opción de un campo

# fdf_set_javascript_action

(PHP 4 &gt;= 4.0.2, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_javascript_action — Modifica la acción javascript de un campo

### Descripción

**fdf_set_javascript_action**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $fieldname,
    [int](#language.types.integer) $trigger,
    [string](#language.types.string) $script
): [bool](#language.types.boolean)

Modifica la acción javascript de un campo dado.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string).






     trigger








     script







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_set_submit_form_action()](#function.fdf-set-submit-form-action) - Modifica la acción de un formulario

# fdf_set_on_import_javascript

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_on_import_javascript — Añade código Javascript para ser ejecutado cuando Acrobat abre un FDF

### Descripción

**fdf_set_on_import_javascript**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $script, [bool](#language.types.boolean) $before_data_import): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Ver también

    - [fdf_add_doc_javascript()](#function.fdf-add-doc-javascript) - Añade código javascript a un documento FDF

    - [fdf_set_javascript_action()](#function.fdf-set-javascript-action) - Modifica la acción javascript de un campo

# fdf_set_opt

(PHP 4 &gt;= 4.0.2, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_opt — Modifica una opción de un campo

### Descripción

**fdf_set_opt**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $fieldname,
    [int](#language.types.integer) $element,
    [string](#language.types.string) $str1,
    [string](#language.types.string) $str2
): [bool](#language.types.boolean)

Modifica una opción de un campo dado.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string).






     element








     str1








     str2







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_set_flags()](#function.fdf-set-flags) - Modifica una opción de un campo

# fdf_set_status

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_status — Establece el valor de la clave /STATUS

### Descripción

**fdf_set_status**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $status): [bool](#language.types.boolean)

Establece el valor de la clave /STATUS. Cuando un cliente
recibe un FDF con un estado establecido, su valor se presentará en una caja de alerta.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     status







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_get_status()](#function.fdf-get-status) - Lee el valor de la clave /STATUS

# fdf_set_submit_form_action

(PHP 4 &gt;= 4.0.2, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_submit_form_action — Modifica la acción de un formulario

### Descripción

**fdf_set_submit_form_action**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $fieldname,
    [int](#language.types.integer) $trigger,
    [string](#language.types.string) $script,
    [int](#language.types.integer) $flags
): [bool](#language.types.boolean)

Modifica la acción de un formulario.

### Parámetros

     fdf_document


       El gestor de documento, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string).






     trigger








     script








     flags







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_set_javascript_action()](#function.fdf-set-javascript-action) - Modifica la acción javascript de un campo

# fdf_set_target_frame

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_target_frame — Configura el marco de destino para la visualización del formulario

### Descripción

**fdf_set_target_frame**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $frame_name): [bool](#language.types.boolean)

Configura el marco de destino para la visualización del resultado
PDF definido por **fdf_save_file()**.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     frame_name


       El nombre del marco, en forma de [string](#language.types.string).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - **fdf_save_file()**

# fdf_set_value

(PHP 4, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_value — Modifica el valor de un campo FDF

### Descripción

**fdf_set_value**(
    [resource](#language.types.resource) $fdf_document,
    [string](#language.types.string) $fieldname,
    [mixed](#language.types.mixed) $value,
    [int](#language.types.integer) $isName = ?
): [bool](#language.types.boolean)

Modifica el valor de un campo FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     fieldname


       Nombre del campo FDF, en forma de [string](#language.types.string).






     value


       Este parámetro debe ser almacenado como un string incluso si es un array. En este caso, todos los elementos del array serán almacenados como un array de valores.






     isName

      **Nota**:



        En versiones anteriores de la suite FDF, el último parámetro determinaba si el valor del campo debía ser convertido en un nombre PDF (isname = 1) o posicionado como un string (isname = 0).




        El valor ya no está en la suite actual, versión 5.0. Por razones de compatibilidad, esto sigue siendo soportado como un parámetro opcional, pero ignorado internamente.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_get_value()](#function.fdf-get-value) - Devuelve el valor de un campo FDF

    - [fdf_remove_item()](#function.fdf-remove-item) - Configura el marco FDF de destino para el formulario

# fdf_set_version

(PHP 4 &gt;= 4.3.0, PHP 5 &lt; 5.3.0, PECL fdf SVN)

fdf_set_version — Modifica el número de versión del fichero FDF

### Descripción

**fdf_set_version**([resource](#language.types.resource) $fdf_document, [string](#language.types.string) $version): [bool](#language.types.boolean)

Modifica el número de versión del documento FDF actual.

Algunas funcionalidades soportadas por esta extensión solo están disponibles para las nuevas versiones de FDF.

### Parámetros

     fdf_document


       El gestor de documento FDF, devuelto por la función
       [fdf_create()](#function.fdf-create), la función
       [fdf_open()](#function.fdf-open) o la función
       [fdf_open_string()](#function.fdf-open-string).






     version


       El número de versión. Para el toolkit FDF actual, puede ser
       1.2, 1.3 o
       1.4.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fdf_get_version()](#function.fdf-get-version) - Lee el número de versión de la API FDF

## Tabla de contenidos

- [fdf_add_doc_javascript](#function.fdf-add-doc-javascript) — Añade código javascript a un documento FDF
- [fdf_add_template](#function.fdf-add-template) — Añade una plantilla en el documento FDF
- [fdf_close](#function.fdf-close) — Cierra un documento FDF
- [fdf_create](#function.fdf-create) — Crea un nuevo documento FDF
- [fdf_enum_values](#function.fdf-enum-values) — Llama a una función de usuario para cada valor FDF
- [fdf_errno](#function.fdf-errno) — Devuelve el código de error de la última operación FDF
- [fdf_error](#function.fdf-error) — Devuelve el mensaje de error FDF
- [fdf_get_ap](#function.fdf-get-ap) — Lee la apariencia de un campo
- [fdf_get_attachment](#function.fdf-get-attachment) — Extrae un fichero integrado en un documento FDF
- [fdf_get_encoding](#function.fdf-get-encoding) — Lee el valor de la clave /Encoding
- [fdf_get_file](#function.fdf-get-file) — Lee el valor de la clave /F
- [fdf_get_flags](#function.fdf-get-flags) — Lee los atributos de un campo FDF
- [fdf_get_opt](#function.fdf-get-opt) — Lee un valor en un array de valores de un campo FDF
- [fdf_get_status](#function.fdf-get-status) — Lee el valor de la clave /STATUS
- [fdf_get_value](#function.fdf-get-value) — Devuelve el valor de un campo FDF
- [fdf_get_version](#function.fdf-get-version) — Lee el número de versión de la API FDF
- [fdf_header](#function.fdf-header) — Emite las cabeceras HTTP específicas de FDF
- [fdf_next_field_name](#function.fdf-next-field-name) — Lee el nombre del siguiente campo FDF
- [fdf_open](#function.fdf-open) — Abre un documento FDF
- [fdf_open_string](#function.fdf-open-string) — Lee un documento FDF a partir de un string
- [fdf_remove_item](#function.fdf-remove-item) — Configura el marco FDF de destino para el formulario
- [fdf_save](#function.fdf-save) — Guarda un documento FDF
- [fdf_save_string](#function.fdf-save-string) — Devuelve un documento FDF en forma de string
- [fdf_set_ap](#function.fdf-set-ap) — Fija la apariencia de un campo FDF
- [fdf_set_encoding](#function.fdf-set-encoding) — Modifica la codificación de caracteres
- [fdf_set_file](#function.fdf-set-file) — Crea un documento PDF para mostrar datos FDF
- [fdf_set_flags](#function.fdf-set-flags) — Modifica una opción de un campo
- [fdf_set_javascript_action](#function.fdf-set-javascript-action) — Modifica la acción javascript de un campo
- [fdf_set_on_import_javascript](#function.fdf-set-on-import-javascript) — Añade código Javascript para ser ejecutado cuando Acrobat abre un FDF
- [fdf_set_opt](#function.fdf-set-opt) — Modifica una opción de un campo
- [fdf_set_status](#function.fdf-set-status) — Establece el valor de la clave /STATUS
- [fdf_set_submit_form_action](#function.fdf-set-submit-form-action) — Modifica la acción de un formulario
- [fdf_set_target_frame](#function.fdf-set-target-frame) — Configura el marco de destino para la visualización del formulario
- [fdf_set_value](#function.fdf-set-value) — Modifica el valor de un campo FDF
- [fdf_set_version](#function.fdf-set-version) — Modifica el número de versión del fichero FDF

- [Introducción](#intro.fdf)
- [Instalación/Configuración](#fdf.setup)<li>[Requerimientos](#fdf.requirements)
- [Instalación](#fdf.installation)
- [Tipos de recursos](#fdf.resources)
  </li>- [Constantes predefinidas](#fdf.constants)
- [Ejemplos](#fdf.examples)
- [Funciones FDF](#ref.fdf)<li>[fdf_add_doc_javascript](#function.fdf-add-doc-javascript) — Añade código javascript a un documento FDF
- [fdf_add_template](#function.fdf-add-template) — Añade una plantilla en el documento FDF
- [fdf_close](#function.fdf-close) — Cierra un documento FDF
- [fdf_create](#function.fdf-create) — Crea un nuevo documento FDF
- [fdf_enum_values](#function.fdf-enum-values) — Llama a una función de usuario para cada valor FDF
- [fdf_errno](#function.fdf-errno) — Devuelve el código de error de la última operación FDF
- [fdf_error](#function.fdf-error) — Devuelve el mensaje de error FDF
- [fdf_get_ap](#function.fdf-get-ap) — Lee la apariencia de un campo
- [fdf_get_attachment](#function.fdf-get-attachment) — Extrae un fichero integrado en un documento FDF
- [fdf_get_encoding](#function.fdf-get-encoding) — Lee el valor de la clave /Encoding
- [fdf_get_file](#function.fdf-get-file) — Lee el valor de la clave /F
- [fdf_get_flags](#function.fdf-get-flags) — Lee los atributos de un campo FDF
- [fdf_get_opt](#function.fdf-get-opt) — Lee un valor en un array de valores de un campo FDF
- [fdf_get_status](#function.fdf-get-status) — Lee el valor de la clave /STATUS
- [fdf_get_value](#function.fdf-get-value) — Devuelve el valor de un campo FDF
- [fdf_get_version](#function.fdf-get-version) — Lee el número de versión de la API FDF
- [fdf_header](#function.fdf-header) — Emite las cabeceras HTTP específicas de FDF
- [fdf_next_field_name](#function.fdf-next-field-name) — Lee el nombre del siguiente campo FDF
- [fdf_open](#function.fdf-open) — Abre un documento FDF
- [fdf_open_string](#function.fdf-open-string) — Lee un documento FDF a partir de un string
- [fdf_remove_item](#function.fdf-remove-item) — Configura el marco FDF de destino para el formulario
- [fdf_save](#function.fdf-save) — Guarda un documento FDF
- [fdf_save_string](#function.fdf-save-string) — Devuelve un documento FDF en forma de string
- [fdf_set_ap](#function.fdf-set-ap) — Fija la apariencia de un campo FDF
- [fdf_set_encoding](#function.fdf-set-encoding) — Modifica la codificación de caracteres
- [fdf_set_file](#function.fdf-set-file) — Crea un documento PDF para mostrar datos FDF
- [fdf_set_flags](#function.fdf-set-flags) — Modifica una opción de un campo
- [fdf_set_javascript_action](#function.fdf-set-javascript-action) — Modifica la acción javascript de un campo
- [fdf_set_on_import_javascript](#function.fdf-set-on-import-javascript) — Añade código Javascript para ser ejecutado cuando Acrobat abre un FDF
- [fdf_set_opt](#function.fdf-set-opt) — Modifica una opción de un campo
- [fdf_set_status](#function.fdf-set-status) — Establece el valor de la clave /STATUS
- [fdf_set_submit_form_action](#function.fdf-set-submit-form-action) — Modifica la acción de un formulario
- [fdf_set_target_frame](#function.fdf-set-target-frame) — Configura el marco de destino para la visualización del formulario
- [fdf_set_value](#function.fdf-set-value) — Modifica el valor de un campo FDF
- [fdf_set_version](#function.fdf-set-version) — Modifica el número de versión del fichero FDF
  </li>
