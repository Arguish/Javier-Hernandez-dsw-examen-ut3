# RRDtool

# Introducción

La extensión PECL/rrd proporciona enlaces a la biblioteca en C RRDtool.
RRDtool es el estándar de código abierto de la industria, datos de registro de alto rendimiento
y la representación gráfica del sistema para datos de series de tiempo.

La página principal de RRDtool es [» http://www.mrtg.org/rrdtool/](http://www.mrtg.org/rrdtool/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#rrd.requirements)
- [Instalación](#rrd.installation)

    ## Requerimientos

    Es necesario instalar primero la biblioteca librrd para
    utilizar la extensión PECL/rrd. Verifique si su distribución
    favorita de Linux ofrece el paquete librrd-dev.
    PECL/rrd ha sido probado con librrd 1.4.3, las versiones anteriores o más recientes
    pueden o no funcionar.

    **Advertencia**

        Librrd y, por lo tanto, la extensión misma no son, en la mayoría de los casos, seguras para hilos.
        Existen muchos estados globales y compartidos en librrd. Puede ser
        peligroso utilizar esta extensión en entornos multihilo como
        Apache 2 mpm worker. Si existen varias peticiones en paralelo, una de ellas
        puede modificar el estado global de la biblioteca librrd, afectando así
        a las otras peticiones en ejecución.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/rrd](https://pecl.php.net/package/rrd).

# Ejemplos

## Tabla de contenidos

- [Ejemplo procedural PECL/rrd](#rrd.examples-procedural)
- [Ejemplo OOP PECL/rrd](#rrd.examples-oop)

    ## Ejemplo procedural PECL/rrd

    **Ejemplo #1 Procedimiento de utilización de rrd**

&lt;?php
$rrdFile = dirname(**FILE**) . "/speed.rrd";

//crear el archivo rrd
rrd_create($rrdFile,
array(
"--start",920804400,
"DS:speed:COUNTER:600:U:U",
"RRA:AVERAGE:0.5:1:24",
"RRA:AVERAGE:0.5:6:10"
)
);

//actualizar el archivo rrd
rrd_update($rrdFile,
array(
"920804700:12345",
"920805000:12357"
)
);

//gráfico de salida
rrd_graph(dirname(**FILE**) . "/speed.png",
array(
"--start", "920804400",
"--end", "920808000",
"--vertical-label", "m/s",
"DEF:myspeed=$rrdFile:speed:AVERAGE",
"CDEF:realspeed=myspeed,1000,\*",
"LINE2:realspeed#FF0000"
)
);
?&gt;

## Ejemplo OOP PECL/rrd

    **Ejemplo #1 Procedimiento de utilización de OOP rrd**

&lt;?php
$rrdFile = dirname(__FILE__) . "/speed.rrd";
$outputPngFile = dirname(**FILE**) . "/speed.png";

$creator = new RRDCreator($rrdFile, "now -10d", 500);
$creator-&gt;addDataSource("speed:COUNTER:600:U:U");
$creator-&gt;addArchive("AVERAGE:0.5:1:24");
$creator-&gt;addArchive("AVERAGE:0.5:6:10");
$creator-&gt;save();

$updater = new RRDUpdater($rrdFile);
$updater-&gt;update(array("speed" =&gt; "12345"), "920804700");
$updater-&gt;update(array("speed" =&gt; "12357"), "920805000");

$graphObj = new RRDGraph($outputPngFile);
$graphObj-&gt;setOptions(
    array(
        "--start" =&gt; "920804400",
        "--end" =&gt; 920808000,
        "--vertical-label" =&gt; "m/s",
        "DEF:myspeed=$rrdFile:speed:AVERAGE",
"CDEF:realspeed=myspeed,1000,\*",
"LINE2:realspeed#FF0000"
)
);
$graphObj-&gt;save();
?&gt;

# Funciones RRD

# rrd_create

(PECL rrd &gt;= 0.9.0)

rrd_create — Crea un archivo de base de datos rrd

### Descripción

**rrd_create**([string](#language.types.string) $filename, [array](#language.types.array) $options): [bool](#language.types.boolean)

Crea el archivo de base de datos RDD.

### Parámetros

    filename


      Nombre de archivo para el nuevo archivo de base de datos rrd.






    options


      Opciones para la creación del archivo de base de datos rrd - lista de cadenas. Ver página de manual de creación de archivos de base de datos rrd
      para obtener una lista completa de opciones.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rrd_error

(PECL rrd &gt;= 0.9.0)

rrd_error — Obtener el último mensaje de error

### Descripción

**rrd_error**(): [string](#language.types.string)

Devuelve el último mensaje de error global rrd.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Último mensaje de error.

# rrd_fetch

(PECL rrd &gt;= 0.9.0)

rrd_fetch — Recuperar los datos de gráfico como un array

### Descripción

**rrd_fetch**([string](#language.types.string) $filename, [array](#language.types.array) $options): [array](#language.types.array)

Obtiene datos para la salida gráfica del archivo desde la base de datos RRD como un array. Esta función
tiene el mismo resultado que [rrd_graph()](#function.rrd-graph), pero los datos obtenidos son
devueltos como una matriz, no se crea el archivo de imagen.

### Parámetros

    filename


      Nombre de archivo de la base de datos RRD.






    options


      Array de opciones para la resolución solicitada.


### Valores devueltos

Devuelve información acerca de los datos del gráfico recuperados.

# rrd_first

(PECL rrd &gt;= 0.9.0)

rrd_first — Obtiene la marca de tiempo UNIX de la primera muestra desde el archivo rrd

### Descripción

**rrd_first**([string](#language.types.string) $file, [int](#language.types.integer) $raaindex = 0): [int](#language.types.integer)

Devuelve la primera muestra de datos desde la especificada RRA del archivo RRD.

### Parámetros

    file


      Nombre del archivo de la base de datos RRD.






    raaindex


      El índice numérico de la RRA que se va a examinar. El valor por defecto es 0.


### Valores devueltos

Número entero de timestamp Unix, o **[false](#constant.false)** si ocurre un error.

# rrd_graph

(PECL rrd &gt;= 0.9.0)

rrd_graph — Crea la imagen de un conjunto de datos

### Descripción

**rrd_graph**([string](#language.types.string) $filename, [array](#language.types.array) $options): [array](#language.types.array)

Crea la imagen de un conjunto de datos particulares desde el archivo de RRD.

### Parámetros

    filename


      El nombre del archivo de salida del gráfico. Este generalmente tiene una terminación
      .png, .svg o
      .eps, dependiendo del formato de salida que desee.






    options


      Las opciones para la generación de la imagen. Consulte la página del manual de gráficos rrd para conocer todas
      las posibles opciones. Todas las opciones (definiciones de datos, definiciones de variables, etc.)
      son permitidas.


### Valores devueltos

Array con información sobre la imagen generada es devuelto, o **[false](#constant.false)** si ocurre un error.

# rrd_info

(PECL rrd &gt;= 0.9.0)

rrd_info — Obtiene información sobre el archivo rrd

### Descripción

**rrd_info**([string](#language.types.string) $filename): [array](#language.types.array)

Devuelve información acerca sobre determinado archivo de base de datos RRD.

### Parámetros

    file


      Nombre del archivo de base de datos RRD.


### Valores devueltos

Array con información sobre el fichero RRD solicitado, o **[false](#constant.false)** si ocurre un error.

# rrd_last

(PECL rrd &gt;= 0.9.0)

rrd_last — Obtiene la marca de tiempo UNIX de la última muestra

### Descripción

**rrd_last**([string](#language.types.string) $filename): [int](#language.types.integer)

Devuelve la marca de tiempo UNIX (UNIX timestamp) de la actualización más reciente de la base de datos RRD.

### Parámetros

    filename


      Nombre de archivo de la base de datos RRD.


### Valores devueltos

Devuelve un número entero como marca de tiempo Unix de los datos más recientes de la base de datos RRD.

# rrd_lastupdate

(PECL rrd &gt;= 0.9.0)

rrd_lastupdate — Obtiene información sobre los últimos datos actualizados

### Descripción

**rrd_lastupdate**([string](#language.types.string) $filename): [array](#language.types.array)

Obtiene un array de la marca de tiempo UNIX y de los valores almacenados para cada fecha en la actualización
más reciente del archivo de base de datos RRD.

### Parámetros

    file


      Nombre del archivo de la base de datos RRD.


### Valores devueltos

Array de información sobre la última actualización, o **[false](#constant.false)** si ocurre un error.

# rrd_restore

(PECL rrd &gt;= 0.9.0)

rrd_restore — Restaura el archivo RRD desde el XML dump

### Descripción

**rrd_restore**([string](#language.types.string) $xml_file, [string](#language.types.string) $rrd_file, [array](#language.types.array) $options = ?): [bool](#language.types.boolean)

Restaura el archivo RRD desde el XML dump.

### Parámetros

    xml_file


      Nombre del archivo XML con el dump del archivo de la base de datos RRD original.






    rrd_file


      Nombre del archivo de la base de datos RRD restaurada.






    options


      Array de opciones para la restauración. Consulte la página de manual de restauración rrd.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rrd_tune

(PECL rrd &gt;= 0.9.0)

rrd_tune — Cambia algunas opciones de cabecera del archivo de base de datos RRD database

### Descripción

**rrd_tune**([string](#language.types.string) $filename, [array](#language.types.array) $options): [bool](#language.types.boolean)

Cambia algunas opciones de cabecera del archivo de base de datos RRD. Por ejemplo, cambia el nombre de la fuente
de los datos, etc

### Parámetros

    filename


      Nombre de archivo de la base de datos RRD.






    options


      Opciones con las propiedades del archivo de la base de datos RDD que serán cambiadas. Consulte la página
      del manual rrd tune para mayor detalle.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rrd_update

(PECL rrd &gt;= 0.9.0)

rrd_update — Actualizar la base de datos RRD

### Descripción

**rrd_update**([string](#language.types.string) $filename, [array](#language.types.array) $options): [bool](#language.types.boolean)

Actualiza el archivo de base de datos RRD. Los datos de entrada es el tiempo interpolado de acuerdo
con las propiedades del archivo de base de datos RRD.

### Parámetros

    filename


      Nombre de archivo de la base de datos RRD. Esta base de datos será actualizada.






    options


      Opciones para actualizar la base de datos RRD. Esta es una lista de cadenas. Ver página del manual
      de actualización rrd para conocer el listado de opciones.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# rrd_version

(PECL rrd &gt;= 1.0.0)

rrd_version — Obtiene información acerca de la biblioteca subyacente rrdtool

### Descripción

**rrd_version**(): [string](#language.types.string)

Devuelve información acerca de la biblioteca subyacente rrdtool.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

String con el número de versión, por ejemplo, rrdtool "1.4.3".

# rrd_xport

(PECL rrd &gt;= 0.9.0)

rrd_xport — Exporta la información acerca de la base de datos RRD

### Descripción

**rrd_xport**([array](#language.types.array) $options): [array](#language.types.array)

Exporta la información sobre el archivo de base de datos RRD. Estos datos se pueden convertir
a archivo XML a través del espacio de usuario PHP script y posteriormente restaurarlo de nuevo como un
archivo de base de datos RRD.

### Parámetros

    options


      Array de opciones para la exportación, consulte la página del manual rrd xport.


### Valores devueltos

Array con información sobre el fichero de base de datos RRD, o **[false](#constant.false)** si ocurre un error.

# rrdc_disconnect

(PECL rrd &gt;= 1.1.2)

rrdc_disconnect — Cierra todas las conexiones al demonio de caché rrd

### Descripción

**rrdc_disconnect**(): [void](language.types.void.html)

Cierra todas las conexiones al demonio de caché rrd.

Esta función es llamada automáticamente cuando el proceso
global PHP finaliza. Esto depende de la API utilizada. Por ejemplo,
esta función es llamada automáticamente al final de un script
de línea de comandos.

Depende del usuario decidir si llamar a esta función al final de
cada petición o no.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [rrd_create](#function.rrd-create) — Crea un archivo de base de datos rrd
- [rrd_error](#function.rrd-error) — Obtener el último mensaje de error
- [rrd_fetch](#function.rrd-fetch) — Recuperar los datos de gráfico como un array
- [rrd_first](#function.rrd-first) — Obtiene la marca de tiempo UNIX de la primera muestra desde el archivo rrd
- [rrd_graph](#function.rrd-graph) — Crea la imagen de un conjunto de datos
- [rrd_info](#function.rrd-info) — Obtiene información sobre el archivo rrd
- [rrd_last](#function.rrd-last) — Obtiene la marca de tiempo UNIX de la última muestra
- [rrd_lastupdate](#function.rrd-lastupdate) — Obtiene información sobre los últimos datos actualizados
- [rrd_restore](#function.rrd-restore) — Restaura el archivo RRD desde el XML dump
- [rrd_tune](#function.rrd-tune) — Cambia algunas opciones de cabecera del archivo de base de datos RRD database
- [rrd_update](#function.rrd-update) — Actualizar la base de datos RRD
- [rrd_version](#function.rrd-version) — Obtiene información acerca de la biblioteca subyacente rrdtool
- [rrd_xport](#function.rrd-xport) — Exporta la información acerca de la base de datos RRD
- [rrdc_disconnect](#function.rrdc-disconnect) — Cierra todas las conexiones al demonio de caché rrd

# La clase RRDCreator

(PECL rrd &gt;= 0.9.0)

## Introducción

    Clase para crear archivos de base de datos
    RRD.

## Sinopsis de la Clase

    ****




      class **RRDCreator**

     {


    /* Métodos */

public [\_\_construct](#rrdcreator.construct)([string](#language.types.string) $path, [string](#language.types.string) $startTime = ?, [int](#language.types.integer) $step = 0)

    public [addArchive](#rrdcreator.addarchive)([string](#language.types.string) $description): [void](language.types.void.html)

public [addDataSource](#rrdcreator.adddatasource)([string](#language.types.string) $description): [void](language.types.void.html)
public [save](#rrdcreator.save)(): [bool](#language.types.boolean)

}

# RRDCreator::addArchive

(PECL rrd &gt;= 0.9.0)

RRDCreator::addArchive — Añade RRA - archivo de valores de datos para cada fuente de datos

### Descripción

public **RRDCreator::addArchive**([string](#language.types.string) $description): [void](language.types.void.html)

Añade definición RRA por descripción de archivo. Archivo consta de un
número de valores de datos o estadísticas para cada una de las fuentes de datos definidas (DS).
Las fuentes de datos son definidos a través del método [RRDCreator::addDataSource()](#rrdcreator.adddatasource).
Es necesario llamar a este método para cada archivo solicitado.

### Parámetros

    description


      Definición del archivo - RRA. Esta tiene el mismo formato que la definición RRA en el
      comando rrd create. Ver página de manual de rrd create para obtener más detalles.


### Valores devueltos

No se retorna ningún valor.

# RRDCreator::addDataSource

(PECL rrd &gt;= 0.9.0)

RRDCreator::addDataSource — Añade una definición de fuente de datos para la base de datos RRD

### Descripción

public **RRDCreator::addDataSource**([string](#language.types.string) $description): [void](language.types.void.html)

RRD puede aceptar entradas desde diversas fuentes de datos (DS), es decir,
tráfico entrante y saliente. Este método añade una fuente de datos
mediante su descripción. Debe llamarse a este método para cada
fuente de datos.

### Parámetros

    description


      Definición de la fuente de datos (DS). El formato es idéntico a la
      definición de un DS en el comando de creación RRD. Consúltese la página
      del manual de creación RRD para más detalles.


### Valores devueltos

No se retorna ningún valor.

# RRDCreator::\_\_construct

(PECL rrd &gt;= 0.9.0)

RRDCreator::\_\_construct — Crea una nueva instancia [RRDCreator](#class.rrdcreator)

### Descripción

public **RRDCreator::\_\_construct**([string](#language.types.string) $path, [string](#language.types.string) $startTime = ?, [int](#language.types.integer) $step = 0)

Crea una nueva instancia [RRDCreator](#class.rrdcreator).

### Parámetros

    path


      Ruta de acceso al nuevo fichero de base de datos RRD creado.






    startTime


      Fecha/hora para el primer valor de la base de datos RRD.
      Este argumento admite todos los formatos que son admitidos por la llamada
      de creación RRD.






    intstep


      Intervalo base, en segundos, de inserción de datos en la base de datos
      RRD.


# RRDCreator::save

(PECL rrd &gt;= 0.9.0)

RRDCreator::save — Guarda la base de datos RRD en un archivo

### Descripción

public **RRDCreator::save**(): [bool](#language.types.boolean)

Guarda la base de datos RRD en un archivo, cuyo nombre es definido por [RRDCreator::\_\_construct()](#rrdcreator.construct).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [RRDCreator::addArchive](#rrdcreator.addarchive) — Añade RRA - archivo de valores de datos para cada fuente de datos
- [RRDCreator::addDataSource](#rrdcreator.adddatasource) — Añade una definición de fuente de datos para la base de datos RRD
- [RRDCreator::\_\_construct](#rrdcreator.construct) — Crea una nueva instancia RRDCreator
- [RRDCreator::save](#rrdcreator.save) — Guarda la base de datos RRD en un archivo

# La clase RRDGraph

(PECL rrd &gt;= 0.9.0)

## Introducción

    Clase para exportar los datos desde una base de datos
    RRD hacia un fichero de imagen.

## Sinopsis de la Clase

    ****




      class **RRDGraph**

     {


    /* Métodos */

public [\_\_construct](#rrdgraph.construct)([string](#language.types.string) $path)

    public [save](#rrdgraph.save)(): [array](#language.types.array)

public [saveVerbose](#rrdgraph.saveverbose)(): [array](#language.types.array)
public [setOptions](#rrdgraph.setoptions)([array](#language.types.array) $options): [void](language.types.void.html)

}

# RRDGraph::\_\_construct

(PECL rrd &gt;= 0.9.0)

RRDGraph::\_\_construct — Crea una nueva instancia [RRDGraph](#class.rrdgraph)

### Descripción

public **RRDGraph::\_\_construct**([string](#language.types.string) $path)

Crea una nueva instancia [RRDGraph](#class.rrdgraph). Esta instancia es responsable
de la representación del resultado de la consulta a la base de datos RRD en la imagen.

### Parámetros

    path


      Ruta completa para la nueva imagen creada.


# RRDGraph::save

(PECL rrd &gt;= 0.9.0)

RRDGraph::save — Guarda el resultado de una consulta en una imagen

### Descripción

public **RRDGraph::save**(): [array](#language.types.array)

Guarda el resultado de una consulta de base de datos RRD en una
imagen definida por el método
[RRDGraph::\_\_construct()](#rrdgraph.construct).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene información sobre la imagen generada, o **[false](#constant.false)** si ocurre un error.

# RRDGraph::saveVerbose

(PECL rrd &gt;= 0.9.0)

RRDGraph::saveVerbose — Guarda una consulta de base de datos RRD en la imagen y devuelve
las informaciones verbosas sobre el gráfico generado.

### Descripción

public **RRDGraph::saveVerbose**(): [array](#language.types.array)

Guarda la consulta de base de datos RRD en el fichero de imagen definido
por el método [RRDGraph::\_\_construct()](#rrdgraph.construct) y devuelve
las informaciones verbosas sobre el gráfico generado; si "-" es utilizado
como nombre de fichero de imagen, los datos de la imagen
serán también devueltos en el array resultante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene las informaciones detalladas sobre la imagen
generada, o **[false](#constant.false)** si ocurre un error.

# RRDGraph::setOptions

(PECL rrd &gt;= 0.9.0)

RRDGraph::setOptions — Establece las opciones para la exportación gráfica rrd

### Descripción

public **RRDGraph::setOptions**([array](#language.types.array) $options): [void](language.types.void.html)

### Parámetros

    options


      Lista de las opciones para la generación de imágenes a partir del archivo de base de datos RRD. Esta puede
      ser una lista de cadenas o lista de cadenas con claves para una mejor legibilidad. Consulte
      las páginas del manual rrd graph para conocer la lista de opciones disponibles.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de RRDGraph::setOptions()**

&lt;?php
$graphObj-&gt;setOptions(array(
    "--start" =&gt; "920804400",
    "--end" =&gt; 920808000,
    "--vertical-label" =&gt; "m/s",
    "DEF:myspeed=$rrdFile:speed:AVERAGE",
"CDEF:realspeed=myspeed,1000,\*",
"LINE2:realspeed#FF0000"
));
?&gt;

    **Ejemplo #2 Establecer varias opciones de color**

&lt;?php
$graphObj-&gt;setOptions(array(
    "--start" =&gt; "920804400",
    "--end" =&gt; 920808000,
    "--vertical-label" =&gt; "m/s",
    "--color=BACK#00000000",
    "--color=GRID#00000000",
    "--color=MGRID#00000000",
    "DEF:myspeed=$rrdFile:speed:AVERAGE",
"CDEF:realspeed=myspeed,1000,\*",
"LINE2:realspeed#FF0000"
));
?&gt;

    No emplee la sintaxis de valor de clave para la misma opción rrd. Es más legible, pero
    no fucniona.

&lt;?php
$graphObj-&gt;setOptions(array(
"--color" =&gt; "BACK#00000000",
"--color" =&gt; "GRID#00000000",
"--color" =&gt; "MGRID#00000000"
));
?&gt;

    En PHP es lo mismo que

&lt;?php
$graphObj-&gt;setOptions(array(
"--color" =&gt; "MGRID#00000000"
));
?&gt;

## Tabla de contenidos

- [RRDGraph::\_\_construct](#rrdgraph.construct) — Crea una nueva instancia RRDGraph
- [RRDGraph::save](#rrdgraph.save) — Guarda el resultado de una consulta en una imagen
- [RRDGraph::saveVerbose](#rrdgraph.saveverbose) — Guarda una consulta de base de datos RRD en la imagen y devuelve
  las informaciones verbosas sobre el gráfico generado.
- [RRDGraph::setOptions](#rrdgraph.setoptions) — Establece las opciones para la exportación gráfica rrd

# La clase RRDUpdater

(PECL rrd &gt;= 0.9.0)

## Introducción

    Clase para actualizar un archivo de base de datos
    RRD.

## Sinopsis de la Clase

    ****




      class **RRDUpdater**

     {


    /* Métodos */

public [\_\_construct](#rrdupdater.construct)([string](#language.types.string) $path)

    public [update](#rrdupdater.update)([array](#language.types.array) $values, [string](#language.types.string) $time
      = time()
    ): [bool](#language.types.boolean)

}

# RRDUpdater::\_\_construct

(PECL rrd &gt;= 0.9.0)

RRDUpdater::\_\_construct — Crea una nueva instancia [RRDUpdater](#class.rrdupdater)

### Descripción

public **RRDUpdater::\_\_construct**([string](#language.types.string) $path)

Crea una nueva instancia RRDUpdater. Esta instancia se encarga
de la actualización del archivo de base de datos RRD.

### Parámetros

    path


      Ruta del sistema de archivos hacia el archivo de
      base de datos RRD a actualizar.


# RRDUpdater::update

(PECL rrd &gt;= 0.9.0)

RRDUpdater::update — Actualiza el archivo de base de datos RRD

### Descripción

    public **RRDUpdater::update**([array](#language.types.array) $values, [string](#language.types.string) $time
      = time()
    ): [bool](#language.types.boolean)

Actualiza el archivo RRD definido a través de [RRDUpdater::\_\_construct()](#rrdupdater.construct).
El archivo se actualiza con un valor específico.

### Parámetros

     values


       Los datos de actualización. Key del array es el nombre del origen de datos.






     time


       Valor del tiempo para la actualización del RRD con unos datos particulares. El valor predeterminado
       es la hora actual.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Throws a [Exception](#class.exception) on error.

### Ejemplos

    **Ejemplo #1 Ejemplos de RRDUpdater::update()**

&lt;?php
$updator = new RRDUpdater("speed.rrd");
//actualiza el dato de origen "speed" con el valor "12411"
//para un tiempo definido por timestamp "920807700"
$updator-&gt;update(array("speed" =&gt; "12411"), "920807700");
?&gt;

## Tabla de contenidos

- [RRDUpdater::\_\_construct](#rrdupdater.construct) — Crea una nueva instancia RRDUpdater
- [RRDUpdater::update](#rrdupdater.update) — Actualiza el archivo de base de datos RRD

- [Introducción](#intro.rrd)
- [Instalación/Configuración](#rrd.setup)<li>[Requerimientos](#rrd.requirements)
- [Instalación](#rrd.installation)
  </li>- [Ejemplos](#rrd.examples)<li>[Ejemplo procedural PECL/rrd](#rrd.examples-procedural)
- [Ejemplo OOP PECL/rrd](#rrd.examples-oop)
  </li>- [Funciones RRD](#ref.rrd)<li>[rrd_create](#function.rrd-create) — Crea un archivo de base de datos rrd
- [rrd_error](#function.rrd-error) — Obtener el último mensaje de error
- [rrd_fetch](#function.rrd-fetch) — Recuperar los datos de gráfico como un array
- [rrd_first](#function.rrd-first) — Obtiene la marca de tiempo UNIX de la primera muestra desde el archivo rrd
- [rrd_graph](#function.rrd-graph) — Crea la imagen de un conjunto de datos
- [rrd_info](#function.rrd-info) — Obtiene información sobre el archivo rrd
- [rrd_last](#function.rrd-last) — Obtiene la marca de tiempo UNIX de la última muestra
- [rrd_lastupdate](#function.rrd-lastupdate) — Obtiene información sobre los últimos datos actualizados
- [rrd_restore](#function.rrd-restore) — Restaura el archivo RRD desde el XML dump
- [rrd_tune](#function.rrd-tune) — Cambia algunas opciones de cabecera del archivo de base de datos RRD database
- [rrd_update](#function.rrd-update) — Actualizar la base de datos RRD
- [rrd_version](#function.rrd-version) — Obtiene información acerca de la biblioteca subyacente rrdtool
- [rrd_xport](#function.rrd-xport) — Exporta la información acerca de la base de datos RRD
- [rrdc_disconnect](#function.rrdc-disconnect) — Cierra todas las conexiones al demonio de caché rrd
  </li>- [RRDCreator](#class.rrdcreator) — La clase RRDCreator<li>[RRDCreator::addArchive](#rrdcreator.addarchive) — Añade RRA - archivo de valores de datos para cada fuente de datos
- [RRDCreator::addDataSource](#rrdcreator.adddatasource) — Añade una definición de fuente de datos para la base de datos RRD
- [RRDCreator::\_\_construct](#rrdcreator.construct) — Crea una nueva instancia RRDCreator
- [RRDCreator::save](#rrdcreator.save) — Guarda la base de datos RRD en un archivo
  </li>- [RRDGraph](#class.rrdgraph) — La clase RRDGraph<li>[RRDGraph::__construct](#rrdgraph.construct) — Crea una nueva instancia RRDGraph
- [RRDGraph::save](#rrdgraph.save) — Guarda el resultado de una consulta en una imagen
- [RRDGraph::saveVerbose](#rrdgraph.saveverbose) — Guarda una consulta de base de datos RRD en la imagen y devuelve
  las informaciones verbosas sobre el gráfico generado.
- [RRDGraph::setOptions](#rrdgraph.setoptions) — Establece las opciones para la exportación gráfica rrd
  </li>- [RRDUpdater](#class.rrdupdater) — La clase RRDUpdater<li>[RRDUpdater::__construct](#rrdupdater.construct) — Crea una nueva instancia RRDUpdater
- [RRDUpdater::update](#rrdupdater.update) — Actualiza el archivo de base de datos RRD
  </li>
