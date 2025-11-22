# Solr de Apache

# Introducción

La extensión Solr permite comunicarse de manera efectiva con el servidor Solr de Apache en PHP.

La extensión Solr es una biblioteca extremadamente rápida, de pequeño tamaño, y con abundantes características que permite a los desarrolladores de PHP comunicarse de manera efectiva con las instancias del servidor Solr.

Las versiones 1.x de la Extensión PECL soportan el Servidor Solr de Apache 1.3-3.x

Las versiones 2.x de la Extensión PECL soportan el Servidor Solr de Apache 4.0+

Hay herramientas internas para añadir documentos y realizar actualizaciones al servidor solr.

También contiene herramientas que permiten realizar consultas avanzadas al servidor cuando se buscan documentos.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#solr.requirements)
- [Instalación](#solr.installation)

    ## Requerimientos

    Las extensiones libxml y curl deben activarse asimismo
    para disponibilizar la extensión Apache Solr.

    Se requiere libxml2 en versión 2.6.31 y posteriores.

    Se requiere libcurl en versión 7.18.0 y posteriores.

    Las versiones de biblioteca mencionadas son necesarias y
    intentar modificar el código para compilar esta extensión
    con bibliotecas de versión diferente no se recomienda.
    Esto podría fallar con errores que podrían ser
    muy difíciles de depurar.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/solr](https://pecl.php.net/package/solr).

    Para obtener ayuda y soporte, visite el grupo google de
    la extensión.
    [» Extensión Apache Solr PHP](https://groups.google.com/forum/#!forum/php-solr)

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

    **Nota**:

        El módulo Solr puede ser compilado en modo de depuración pasando
        la opción de configuración **--enable-solr-debug**.




        Durante una compilación manual, asegúrese de incluir el soporte

    curl y libxml.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SOLR_MAJOR_VERSION](#constant.solr-major-version)**
     ([int](#language.types.integer))








     **[SOLR_MINOR_VERSION](#constant.solr-minor-version)**
     ([int](#language.types.integer))








     **[SOLR_PATCH_VERSION](#constant.solr-patch-version)**
     ([int](#language.types.integer))








     **[SOLR_EXTENSION_VERSION](#constant.solr-extension-version)**
     ([string](#language.types.string))





# Funciones de Solr

# solr_get_version

(PECL solr &gt;= 0.9.1)

solr_get_version — Devuelve la versión actual de la extensión Apache Solr

### Descripción

**solr_get_version**(): [string](#language.types.string)

Esta función devuelve la versión actual de la extensión como una cadena.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

Esta función no lanza errores o excepciones.

### Ejemplos

    **Ejemplo #1 Ejemplo de solr_get_version()**

&lt;?php

$versión_solr = solr_get_version();

print $versión_solr;

?&gt;

    Resultado del ejemplo anterior es similar a:

0.9.6

### Ver también

    - [SolrUtils::getSolrVersion()](#solrutils.getsolrversion) - Devuelve la versión actual de la extensión Solr

## Tabla de contenidos

- [solr_get_version](#function.solr-get-version) — Devuelve la versión actual de la extensión Apache Solr

# Ejemplos

Ejemplos de cómo usar la extensión Apache Solr de PHP

**Ejemplo #1 Contenido del archivo BootStrap**

&lt;?php

/_ Nombre de dominio del servidor Solr _/
define('SOLR_SERVER_HOSTNAME', 'solr.example.com');

/_ Si ejecutar en modo seguro _/
define('SOLR_SECURE', true);

/_ Puerto HTTP para la conexión _/
define('SOLR_SERVER_PORT', ((SOLR_SECURE) ? 8443 : 8983));

/_ Nomre de Usuario de Autenticación Básica de HTTP _/
define('SOLR_SERVER_USERNAME', 'admin');

/_ Contraseña de Autenticación Básica de HTTP _/
define('SOLR_SERVER_PASSWORD', 'changeit');

/_ Tiempo límite de conexión de HTTP _/
/_ Es el tiempo máximo en segundos permitido para la operación de transferencia de datos de http. El valor predeterminado es 30 seg. _/
define('SOLR_SERVER_TIMEOUT', 10);

/_ Nombre de archivo a una clave + certificado privados con formato PEM (concatenado en ese ornden _/
define('SOLR_SSL_CERT', 'certs/combo.pem');

/_ Nombre de archivo a un certificado privado con formato PEM _/
define('SOLR_SSL_CERT_ONLY', 'certs/solr.crt');

/_ Nombre de archivo a una clave privada con formato PEM _/
define('SOLR_SSL_KEY', 'certs/solr.key');

/_ Contraseña para el archivo de clave privada con formato PEM _/
define('SOLR_SSL_KEYPASSWORD', 'StrongAndSecurePassword');

/_ Nombre del archivo que mantiene uno o más certificados CA para ser verificados con su par _/
define('SOLR_SSL_CAINFO', 'certs/cacert.crt');

/_ Nombre del directorio que mantiene múltiples certificados CA para ser verificados con su par _/
define('SOLR_SSL_CAPATH', 'certs/');

?&gt;

**Ejemplo #2 Añadir un documento al índice**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$doc = new SolrInputDocument();

$doc-&gt;addField('id', 334455);
$doc-&gt;addField('cat', 'Software');
$doc-&gt;addField('cat', 'Lucene');

$respuestaActualización = $cliente-&gt;addDocument($doc);

print_r($respuestaActualización-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 446
)

)

**Ejemplo #3 Fusionar un documento con otro documento**

&lt;?php

include "bootstrap.php";

$doc = new SolrDocument();

$segundo_doc = new SolrDocument();

$doc-&gt;addField('id', 1123);

$doc-&gt;features = "PHP Client Side";
$doc-&gt;features = "Fast development cycles";

$doc['cat'] = 'Software';
$doc['cat'] = 'Custom Search';
$doc-&gt;cat = 'Information Technology';

$segundo_doc-&gt;addField('cat', 'Lucene Search');

$segundo_doc-&gt;merge($doc, true);

print_r($segundo_doc-&gt;toArray());

?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[document_boost] =&gt; 0
[field_count] =&gt; 3
[fields] =&gt; Array
(
[0] =&gt; SolrDocumentField Object
(
[name] =&gt; cat
[boost] =&gt; 0
[values] =&gt; Array
(
[0] =&gt; Software
[1] =&gt; Custom Search
[2] =&gt; Information Technology
)

                )

            [1] =&gt; SolrDocumentField Object
                (
                    [name] =&gt; id
                    [boost] =&gt; 0
                    [values] =&gt; Array
                        (
                            [0] =&gt; 1123
                        )

                )

            [2] =&gt; SolrDocumentField Object
                (
                    [name] =&gt; features
                    [boost] =&gt; 0
                    [values] =&gt; Array
                        (
                            [0] =&gt; PHP Client Side
                            [1] =&gt; Fast development cycles
                        )

                )

        )

)

**Ejemplo #4 Buscar documentos - respuestas de SolrObject**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setQuery('lucene');

$consulta-&gt;setStart(0);

$consulta-&gt;setRows(50);

$consulta-&gt;addField('cat')-&gt;addField('features')-&gt;addField('id')-&gt;addField('timestamp');

$respuesta_consulta = $cliente-&gt;query($consulta);

$respuesta = $respuesta_consulta-&gt;getResponse();

print_r($respuesta);

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
[params] =&gt; SolrObject Object
(
[wt] =&gt; xml
[rows] =&gt; 50
[start] =&gt; 0
[indent] =&gt; on
[q] =&gt; lucene
[fl] =&gt; cat,features,id,timestamp
[version] =&gt; 2.2
)

        )

    [response] =&gt; SolrObject Object
        (
            [numFound] =&gt; 3
            [start] =&gt; 0
            [docs] =&gt; Array
                (
                    [0] =&gt; SolrObject Object
                        (
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; Software
                                    [1] =&gt; Lucene
                                )

                            [id] =&gt; 334456
                        )

                    [1] =&gt; SolrObject Object
                        (
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; Software
                                    [1] =&gt; Lucene
                                )

                            [id] =&gt; 334455
                        )

                    [2] =&gt; SolrObject Object
                        (
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; software
                                    [1] =&gt; search
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; Advanced Full-Text Search Capabilities using Lucene
                                    [1] =&gt; Optimized for High Volume Web Traffic
                                    [2] =&gt; Standards Based Open Interfaces - XML and HTTP
                                    [3] =&gt; Comprehensive HTML Administration Interfaces
                                    [4] =&gt; Scalability - Efficient Replication to other Solr Search Servers
                                    [5] =&gt; Flexible and Adaptable with XML configuration and Schema
                                    [6] =&gt; Good unicode support: héllo (hello with an accent over the e)
                                )

                            [id] =&gt; SOLR1000
                            [timestamp] =&gt; 2009-09-04T20:38:55.906
                        )

                )

        )

)

**Ejemplo #5 Buscar documentos - respuestas de SolrDocument**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setQuery('lucene');

$consulta-&gt;setStart(0);

$consulta-&gt;setRows(50);

$consulta-&gt;addField('cat')-&gt;addField('features')-&gt;addField('id')-&gt;addField('timestamp');

$respuesta_consulta = $cliente-&gt;query($consulta);

$respuesta_consulta-&gt;setParseMode(SolrQueryResponse::PARSE_SOLR_DOC);

$respuesta = $respuesta_consulta-&gt;getResponse();

print_r($respuesta);

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
[params] =&gt; SolrObject Object
(
[wt] =&gt; xml
[rows] =&gt; 50
[start] =&gt; 0
[indent] =&gt; on
[q] =&gt; lucene
[fl] =&gt; cat,features,id,timestamp
[version] =&gt; 2.2
)

        )

    [response] =&gt; SolrObject Object
        (
            [numFound] =&gt; 3
            [start] =&gt; 0
            [docs] =&gt; Array
                (
                    [0] =&gt; SolrDocument Object
                        (
                            [_hashtable_index:SolrDocument:private] =&gt; 19740
                        )

                    [1] =&gt; SolrDocument Object
                        (
                            [_hashtable_index:SolrDocument:private] =&gt; 25485
                        )

                    [2] =&gt; SolrDocument Object
                        (
                            [_hashtable_index:SolrDocument:private] =&gt; 25052
                        )

                )

        )

)

**Ejemplo #6 Ejemplo sencillo de TermsComponent - básico**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setTerms(true);

$consulta-&gt;setTermsField('cat');

$respuestaActualización = $cliente-&gt;query($consulta);

print_r($respuestaActualización-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 2
)

    [terms] =&gt; SolrObject Object
        (
            [cat] =&gt; SolrObject Object
                (
                    [electronics] =&gt; 14
                    [Lucene] =&gt; 4
                    [Software] =&gt; 4
                    [memory] =&gt; 3
                    [card] =&gt; 2
                    [connector] =&gt; 2
                    [drive] =&gt; 2
                    [graphics] =&gt; 2
                    [hard] =&gt; 2
                    [monitor] =&gt; 2
                )

        )

)

**Ejemplo #7 Ejemplo sencillo de TermsComponent - usar un prefijo**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setTerms(true);

/_ Devolver sólo los términos que empiecen con $prefijo _/
$prefijo = 'c';

$consulta-&gt;setTermsField('cat')-&gt;setTermsPrefix($prefijo);

$respuestaActualización = $cliente-&gt;query($consulta);

print_r($respuestaActualización-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
)

    [terms] =&gt; SolrObject Object
        (
            [cat] =&gt; SolrObject Object
                (
                    [card] =&gt; 2
                    [connector] =&gt; 2
                    [camera] =&gt; 1
                    [copier] =&gt; 1
                )

        )

)

**Ejemplo #8 Ejemplo sencillo de TermsComponent - especificar una frecuencia mínima**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setTerms(true);

/_ Devolver sólo los términos que empiecen con $prefijo _/
$prefijo = 'c';

/_ Devolver sólo los términos con una frecuencia de 2 o mayor _/
$frecuencia_mín = 2;

$consulta-&gt;setTermsField('cat')-&gt;setTermsPrefix($prefijo)-&gt;setTermsMinCount($frecuencia_mín);

$respuestaActualización = $cliente-&gt;query($consulta);

print_r($respuestaActualización-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 0
)

    [terms] =&gt; SolrObject Object
        (
            [cat] =&gt; SolrObject Object
                (
                    [card] =&gt; 2
                    [connector] =&gt; 2
                )

        )

)

**Ejemplo #9 Ejemplo sencillo de Facet**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery('_:_');

$consulta-&gt;setFacet(true);

$consulta-&gt;addFacetField('cat')-&gt;addFacetField('name')-&gt;setFacetMinCount(2);

$respuestaActualización = $cliente-&gt;query($consulta);

$array_respuesta = $respuestaActualización-&gt;getResponse();

$datos_faceta = $array_respuesta-&gt;facet_counts-&gt;facet_fields;

print_r($datos_faceta);

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[cat] =&gt; SolrObject Object
(
[electronics] =&gt; 14
[memory] =&gt; 3
[Lucene] =&gt; 2
[Software] =&gt; 2
[card] =&gt; 2
[connector] =&gt; 2
[drive] =&gt; 2
[graphics] =&gt; 2
[hard] =&gt; 2
[monitor] =&gt; 2
[search] =&gt; 2
[software] =&gt; 2
)

    [name] =&gt; SolrObject Object
        (
            [gb] =&gt; 6
            [1] =&gt; 3
            [184] =&gt; 3
            [2] =&gt; 3
            [3200] =&gt; 3
            [400] =&gt; 3
            [500] =&gt; 3
            [ddr] =&gt; 3
            [i] =&gt; 3
            [ipod] =&gt; 3
            [memori] =&gt; 3
            [pc] =&gt; 3
            [pin] =&gt; 3
            [pod] =&gt; 3
            [sdram] =&gt; 3
            [system] =&gt; 3
            [unbuff] =&gt; 3
            [canon] =&gt; 2
            [corsair] =&gt; 2
            [drive] =&gt; 2
            [hard] =&gt; 2
            [mb] =&gt; 2
            [n] =&gt; 2
            [power] =&gt; 2
            [retail] =&gt; 2
            [video] =&gt; 2
            [x] =&gt; 2
        )

)

**Ejemplo #10 Ejemplo sencillo de Facet - con sobrescritura de campo opcional para mincount**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery('_:_');

$consulta-&gt;setFacet(true);

$consulta-&gt;addFacetField('cat')-&gt;addFacetField('name')-&gt;setFacetMinCount(2)-&gt;setFacetMinCount(4, 'name');

$respuestaActualización = $cliente-&gt;query($consulta);

$array_respuesta = $respuestaActualización-&gt;getResponse();

$datos_faceta = $array_respuesta-&gt;facet_counts-&gt;facet_fields;

print_r($datos_faceta);

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[cat] =&gt; SolrObject Object
(
[electronics] =&gt; 14
[memory] =&gt; 3
[Lucene] =&gt; 2
[Software] =&gt; 2
[card] =&gt; 2
[connector] =&gt; 2
[drive] =&gt; 2
[graphics] =&gt; 2
[hard] =&gt; 2
[monitor] =&gt; 2
[search] =&gt; 2
[software] =&gt; 2
)

    [name] =&gt; SolrObject Object
        (
            [gb] =&gt; 6
        )

)

**Ejemplo #11 Ejemplo de fecha de faceta**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$client = new SolrClient($opciones);

$consulta = new SolrQuery('_:_');

$consulta-&gt;setFacet(true);

$consulta-&gt;addFacetDateField('manufacturedate_dt');

$consulta-&gt;setFacetDateStart('2006-02-13T00:00:00Z');

$consulta-&gt;setFacetDateEnd('2012-02-13T00:00:00Z');

$consulta-&gt;setFacetDateGap('+1YEAR');

$consulta-&gt;setFacetDateHardEnd(1);

$consulta-&gt;addFacetDateOther('before');

$respuestaActualización = $client-&gt;query($consulta);

$array_respuesta = $respuestaActualización-&gt;getResponse();

$datos_faceta = $array_respuesta-&gt;facet_counts-&gt;facet_dates;

print_r($datos_faceta);

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[manufacturedate_dt] =&gt; SolrObject Object
(
[2006-02-13T00:00:00Z] =&gt; 9
[2007-02-13T00:00:00Z] =&gt; 0
[2008-02-13T00:00:00Z] =&gt; 0
[2009-02-13T00:00:00Z] =&gt; 0
[2010-02-13T00:00:00Z] =&gt; 0
[2011-02-13T00:00:00Z] =&gt; 0
[gap] =&gt; +1YEAR
[start] =&gt; 2006-02-13T00:00:00Z
[end] =&gt; 2012-02-13T00:00:00Z
[before] =&gt; 2
)

)

**Ejemplo #12 Conectar a un Servidor con SSL Habilitado**

&lt;?php

include "bootstrap.php";

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'timeout' =&gt; SOLR_SERVER_TIMEOUT,
'secure' =&gt; SOLR_SECURE,
'ssl_cert' =&gt; SOLR_SSL_CERT_ONLY,
'ssl_key' =&gt; SOLR_SSL_KEY,
'ssl_keypassword' =&gt; SOLR_SSL_KEYPASSWORD,
'ssl_cainfo' =&gt; SOLR_SSL_CAINFO,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery('_:_');

$consulta-&gt;setFacet(true);

$consulta-&gt;addFacetField('cat')-&gt;addFacetField('name')-&gt;setFacetMinCount(2)-&gt;setFacetMinCount(4, 'name');

$respuestaActualización = $cliente-&gt;query($consulta);

$array_respuesta = $respuestaActualización-&gt;getResponse();

$datos_faceta = $array_respuesta-&gt;facet_counts-&gt;facet_fields;

print_r($datos_faceta);

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[cat] =&gt; SolrObject Object
(
[electronics] =&gt; 14
[memory] =&gt; 3
[Lucene] =&gt; 2
[Software] =&gt; 2
[card] =&gt; 2
[connector] =&gt; 2
[drive] =&gt; 2
[graphics] =&gt; 2
[hard] =&gt; 2
[monitor] =&gt; 2
[search] =&gt; 2
[software] =&gt; 2
)

    [name] =&gt; SolrObject Object
        (
            [gb] =&gt; 6
        )

)

        **Ejemplo #13 Colapsar un [SolrQuery](#class.solrquery)**




&lt;?php
include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_PATH
);

$client = new SolrClient($options);

$query = new SolrQuery('_:_');

$collapseFunction = new SolrCollapseFunction('manu_id_s');

$collapseFunction
-&gt;setSize(2)
-&gt;setNullPolicy(SolrCollapseFunction::NULLPOLICY_IGNORE);

$query
-&gt;collapse($collapseFunction)
-&gt;setRows(4);

$queryResponse = $client-&gt;query($query);

$response = $queryResponse-&gt;getResponse();

print_r($response);
?&gt;

        Resultado del ejemplo anterior es similar a:





SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
[params] =&gt; SolrObject Object
(
[q] =&gt; _:_
[indent] =&gt; on
[fq] =&gt; {!collapse field=manu_id_s size=2 nullPolicy=ignore}
[rows] =&gt; 4
[version] =&gt; 2.2
[wt] =&gt; xml
)

        )

    [response] =&gt; SolrObject Object
        (
            [numFound] =&gt; 14
            [start] =&gt; 0
            [docs] =&gt; Array
                (
                    [0] =&gt; SolrObject Object
                        (
                            [id] =&gt; SP2514N
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Samsung SpinPoint P120 SP2514N - hard drive - 250 GB - ATA-133
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Samsung Electronics Co. Ltd.
                                )

                            [manu_id_s] =&gt; samsung
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; hard drive
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; 7200RPM, 8MB cache, IDE Ultra ATA-133
                                    [1] =&gt; NoiseGuard, SilentSeek technology, Fluid Dynamic Bearing (FDB) motor
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 92
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 6
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [manufacturedate_dt] =&gt; 2006-02-13T15:26:37Z
                            [store] =&gt; Array
                                (
                                    [0] =&gt; 35.0752,-97.032
                                )

                            [_version_] =&gt; 1510294336412057600
                        )

                    [1] =&gt; SolrObject Object
                        (
                            [id] =&gt; 6H500F0
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Maxtor DiamondMax 11 - hard drive - 500 GB - SATA-300
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Maxtor Corp.
                                )

                            [manu_id_s] =&gt; maxtor
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; hard drive
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; SATA 3.0Gb/s, NCQ
                                    [1] =&gt; 8.5ms seek
                                    [2] =&gt; 16MB cache
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 350
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 6
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 45.17614,-93.87341
                                )

                            [manufacturedate_dt] =&gt; 2006-02-13T15:26:37Z
                            [_version_] =&gt; 1510294336449806336
                        )

                    [2] =&gt; SolrObject Object
                        (
                            [id] =&gt; F8V7067-APL-KIT
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Belkin Mobile Power Cord for iPod w/ Dock
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Belkin
                                )

                            [manu_id_s] =&gt; belkin
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; connector
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; car power adapter, white
                                )

                            [weight] =&gt; Array
                                (
                                    [0] =&gt; 4
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 19.95
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt;
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 45.18014,-93.87741
                                )

                            [manufacturedate_dt] =&gt; 2005-08-01T16:30:25Z
                            [_version_] =&gt; 1510294336458194944
                        )

                    [3] =&gt; SolrObject Object
                        (
                            [id] =&gt; MA147LL/A
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Apple 60 GB iPod with Video Playback Black
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Apple Computer Inc.
                                )

                            [manu_id_s] =&gt; apple
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; music
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; iTunes, Podcasts, Audiobooks
                                    [1] =&gt; Stores up to 15,000 songs, 25,000 photos, or 150 hours of video
                                    [2] =&gt; 2.5-inch, 320x240 color TFT LCD display with LED backlight
                                    [3] =&gt; Up to 20 hours of battery life
                                    [4] =&gt; Plays AAC, MP3, WAV, AIFF, Audible, Apple Lossless, H.264 video
                                    [5] =&gt; Notes, Calendar, Phone book, Hold button, Date display, Photo wallet, Built-in games, JPEG photo playback, Upgradeable firmware, USB 2.0 compatibility, Playback speed control, Rechargeable capability, Battery level indication
                                )

                            [includes] =&gt; Array
                                (
                                    [0] =&gt; earbud headphones, USB cable
                                )

                            [weight] =&gt; Array
                                (
                                    [0] =&gt; 5.5
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 399
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 10
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 37.7752,-100.0232
                                )

                            [manufacturedate_dt] =&gt; 2005-10-12T08:00:00Z
                            [_version_] =&gt; 1510294336562003968
                        )

                )

        )

)

**Ejemplo #14 Ejemplo de conseguir el tiempo real Solr(RTG) [SolrClient::getById()](#solrclient.getbyid)**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_PATH
);

$client = new SolrClient($options);
$response = $client-&gt;getById('GB18030TEST');
print_r($response-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[doc] =&gt; SolrObject Object
(
[id] =&gt; GB18030TEST
[name] =&gt; Array
(
[0] =&gt; Test with some GB18030 encoded characters
)

            [features] =&gt; Array
                (
                    [0] =&gt; No accents here
                    [1] =&gt; 这是一个功能
                    [2] =&gt; This is a feature (translated)
                    [3] =&gt; 这份文件是很有光泽
                    [4] =&gt; This document is very shiny (translated)
                )

            [price] =&gt; Array
                (
                    [0] =&gt; 0
                )

            [inStock] =&gt; Array
                (
                    [0] =&gt; 1
                )

            [_version_] =&gt; 1510294336239042560
        )

)

# La clase SolrUtils

(PECL solr &gt;= 0.9.2)

## Introducción

    Contiene métodos de utilidad para recuperar la versión de la extensión actual y preparar frases de consultas.

También contiene métodos para escapar cadenas de consultas y analizar respuestas XML.

## Sinopsis de la Clase

    ****




      abstract
      class **SolrUtils**

     {


    /* Métodos */

public static [digestXmlResponse](#solrutils.digestxmlresponse)([string](#language.types.string) $xmlresponse, [int](#language.types.integer) $parse_mode = 0): [SolrObject](#class.solrobject)
public static [escapeQueryChars](#solrutils.escapequerychars)([string](#language.types.string) $str): [string](#language.types.string)|[false](#language.types.singleton)
public static [getSolrVersion](#solrutils.getsolrversion)(): [string](#language.types.string)
public static [queryPhrase](#solrutils.queryphrase)([string](#language.types.string) $str): [string](#language.types.string)

}

# SolrUtils::digestXmlResponse

(PECL solr &gt;= 0.9.2)

SolrUtils::digestXmlResponse — Convierte una cadena de respuesta XML a un objeto SolrObject

### Descripción

public static **SolrUtils::digestXmlResponse**([string](#language.types.string) $xmlresponse, [int](#language.types.integer) $parse_mode = 0): [SolrObject](#class.solrobject)

Este método convierte una cadena de respuesta XML del servidor Apache Solr a un objeto SolrObject. Lanza una excepción SolrException si hubo un error.

### Parámetros

     xmlresponse


       La cadena de respuesta XML del servidor Solr.






     parse_mode


       Use SolrResponse::PARSE_SOLR_OBJ o SolrResponse::PARSE_SOLR_DOC





### Valores devueltos

Devuelve el objeto SolrObject que representa la respuesta XML.

Si el parámetro parse_mode setá establecido a SolrResponse::PARSE_SOLR_OBJ Solr los documentos serán analizados como instancias de SolrObject.

si está establecido a SolrResponse::PARSE_SOLR_DOC, serán analizados como instancias de SolrDocument.

# SolrUtils::escapeQueryChars

(PECL solr &gt;= 0.9.2)

SolrUtils::escapeQueryChars — Escapa un string de consulta lucene

### Descripción

public static **SolrUtils::escapeQueryChars**([string](#language.types.string) $str): [string](#language.types.string)|[false](#language.types.singleton)

Lucene soporta el escape de caracteres especiales que son parte de la sintaxis de la consulta.

La lista actual de caracteres especiales es:

-   - &amp;&amp; || ! ( ) { } [ ] ^ " ~ \* ? : \ /

    Estos caracteres son parte de la sintaxis de la consulta y deben ser escapados

    ### Parámetros

    str

         Este es el string de consulta a ser escapda.

    ### Valores devueltos

    Devuelve el string escapado o **[false](#constant.false)** si ocurre un error.

    # SolrUtils::getSolrVersion

    (PECL solr &gt;= 0.9.2)

SolrUtils::getSolrVersion — Devuelve la versión actual de la extensión Solr

### Descripción

public static **SolrUtils::getSolrVersion**(): [string](#language.types.string)

Devuelve la versión actual de Solr.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La versión actual de la extensión Apache Solr.

# SolrUtils::queryPhrase

(PECL solr &gt;= 0.9.2)

SolrUtils::queryPhrase — Prepara una frase desde una cadena lucene sin escapar

### Descripción

public static **SolrUtils::queryPhrase**([string](#language.types.string) $str): [string](#language.types.string)

Prepara una frase desde una cadena lucene sin escapar.

### Parámetros

     str


       La frase lucene.





### Valores devueltos

Devuelve la frase entre comillas dobles.

## Tabla de contenidos

- [SolrUtils::digestXmlResponse](#solrutils.digestxmlresponse) — Convierte una cadena de respuesta XML a un objeto SolrObject
- [SolrUtils::escapeQueryChars](#solrutils.escapequerychars) — Escapa un string de consulta lucene
- [SolrUtils::getSolrVersion](#solrutils.getsolrversion) — Devuelve la versión actual de la extensión Solr
- [SolrUtils::queryPhrase](#solrutils.queryphrase) — Prepara una frase desde una cadena lucene sin escapar

# La clase SolrInputDocument

(PECL solr &gt;= 0.9.2)

## Introducción

    Esta clase representa un documento Solr que está a punto de ser enviado al índice de Solr.

## Sinopsis de la Clase

    ****




      final
      class **SolrInputDocument**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SORT_DEFAULT](#solrinputdocument.constants.sort-default) = 1;

    const
     [int](#language.types.integer)
      [SORT_ASC](#solrinputdocument.constants.sort-asc) = 1;

    const
     [int](#language.types.integer)
      [SORT_DESC](#solrinputdocument.constants.sort-desc) = 2;

    const
     [int](#language.types.integer)
      [SORT_FIELD_NAME](#solrinputdocument.constants.sort-field-name) = 1;

    const
     [int](#language.types.integer)
      [SORT_FIELD_VALUE_COUNT](#solrinputdocument.constants.sort-field-value-count) = 2;

    const
     [int](#language.types.integer)
      [SORT_FIELD_BOOST_VALUE](#solrinputdocument.constants.sort-field-boost-value) = 4;


    /* Métodos */

public [\_\_construct](#solrinputdocument.construct)()

    public [addChildDocument](#solrinputdocument.addchilddocument)([SolrInputDocument](#class.solrinputdocument) $child): [void](language.types.void.html)

public [addChildDocuments](#solrinputdocument.addchilddocuments)([array](#language.types.array) &amp;$docs): [void](language.types.void.html)
public [addField](#solrinputdocument.addfield)([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue, [float](#language.types.float) $fieldBoostValue = 0.0): [bool](#language.types.boolean)
public [clear](#solrinputdocument.clear)(): [bool](#language.types.boolean)
public [\_\_clone](#solrinputdocument.clone)(): [void](language.types.void.html)
public [deleteField](#solrinputdocument.deletefield)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [fieldExists](#solrinputdocument.fieldexists)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [getBoost](#solrinputdocument.getboost)(): [float](#language.types.float)
public [getChildDocuments](#solrinputdocument.getchilddocuments)(): [array](#language.types.array)
public [getChildDocumentsCount](#solrinputdocument.getchilddocumentscount)(): [int](#language.types.integer)
public [getField](#solrinputdocument.getfield)([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)
public [getFieldBoost](#solrinputdocument.getfieldboost)([string](#language.types.string) $fieldName): [float](#language.types.float)
public [getFieldCount](#solrinputdocument.getfieldcount)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getFieldNames](#solrinputdocument.getfieldnames)(): [array](#language.types.array)
public [hasChildDocuments](#solrinputdocument.haschilddocuments)(): [bool](#language.types.boolean)
public [merge](#solrinputdocument.merge)([SolrInputDocument](#class.solrinputdocument) $sourceDoc, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**): [bool](#language.types.boolean)
public [reset](#solrinputdocument.reset)(): [bool](#language.types.boolean)
public [setBoost](#solrinputdocument.setboost)([float](#language.types.float) $documentBoostValue): [bool](#language.types.boolean)
public [setFieldBoost](#solrinputdocument.setfieldboost)([string](#language.types.string) $fieldName, [float](#language.types.float) $fieldBoostValue): [bool](#language.types.boolean)
public [sort](#solrinputdocument.sort)([int](#language.types.integer) $sortOrderBy, [int](#language.types.integer) $sortDirection = SolrInputDocument::SORT_ASC): [bool](#language.types.boolean)
public [toArray](#solrinputdocument.toarray)(): [array](#language.types.array)

    public [__destruct](#solrinputdocument.destruct)()

}

## Constantes predefinidas

    ## Constantes de la Clase SolrInputDocument




      **[SolrInputDocument::SORT_DEFAULT](#solrinputdocument.constants.sort-default)**

       Ordena los campos de forma ascendente.






      **[SolrInputDocument::SORT_ASC](#solrinputdocument.constants.sort-asc)**

       Ordena los campos de forma ascendente.






      **[SolrInputDocument::SORT_DESC](#solrinputdocument.constants.sort-desc)**

       Ordena los campos de forma descendente






      **[SolrInputDocument::SORT_FIELD_NAME](#solrinputdocument.constants.sort-field-name)**

       Ordena los campos por nombre






      **[SolrInputDocument::SORT_FIELD_VALUE_COUNT](#solrinputdocument.constants.sort-field-value-count)**

       Ordena los campos según el número de valores.






      **[SolrInputDocument::SORT_FIELD_BOOST_VALUE](#solrinputdocument.constants.sort-field-boost-value)**

       Ordena los campos según el valor de boost.





# SolrInputDocument::addChildDocument

(PECL solr &gt;= 2.3.0)

SolrInputDocument::addChildDocument — Añade un documento hijo para la indexación de bloque

### Descripción

public **SolrInputDocument::addChildDocument**([SolrInputDocument](#class.solrinputdocument) $child): [void](language.types.void.html)

    Añade un documento hijo para la indexación de bloque con documentos anidados.

### Parámetros

    child


      Un objeto [SolrInputDocument](#class.solrinputdocument).


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [SolrIllegalArgumentException](#class.solrillegalargumentexception) en caso de fallo.

Lanza una [SolrException](#class.solrexception) en caso de fallo interno.

### Ejemplos

**Ejemplo #1 Ejemplo de SolrInputDocument::addChildDocument()**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_STORE_PATH,
);

$client = new SolrClient($options);

$product = new SolrInputDocument();

$product-&gt;addField('id', 'P-BLACK');
$product-&gt;addField('cat', 'tshirt');
$product-&gt;addField('cat', 'polo');
$product-&gt;addField('content_type', 'product');

$small = new SolrInputDocument();
$small-&gt;addField('id', 'TS-BLK-S');
$small-&gt;addField('content_type', 'sku');
$small-&gt;addField('size', 'S');
$small-&gt;addField('inventory', 100);

$medium = new SolrInputDocument();
$medium-&gt;addField('id', 'TS-BLK-M');
$medium-&gt;addField('content_type', 'sku');
$medium-&gt;addField('size', 'M');
$medium-&gt;addField('inventory', 200);

$large = new SolrInputDocument();
$large-&gt;addField('id', 'TS-BLK-L');
$large-&gt;addField('content_type', 'sku');
$large-&gt;addField('size', 'L');
$large-&gt;addField('inventory', 300);

// añade un documento hijo
$product-&gt;addChildDocument($small);
$product-&gt;addChildDocument($medium);
$product-&gt;addChildDocument($large);

// añade el bloque de documento producto al índice
$updateResponse = $client-&gt;addDocument(
$product,
true, // sobrescribir si el documento existe
10000 // commit en los 10 segundos
);

print_r($updateResponse-&gt;getResponse());

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 5
)
)

### Ver también

- [SolrInputDocument::addChildDocuments()](#solrinputdocument.addchilddocuments) - Añade un array de documentos hijos

- [SolrInputDocument::hasChildDocuments()](#solrinputdocument.haschilddocuments) - Devuelve true si el documento tiene documentos hijos

- [SolrInputDocument::getChildDocuments()](#solrinputdocument.getchilddocuments) - Devuelve un array de documentos hijos (SolrInputDocument)

- [SolrInputDocument::getChildDocumentsCount()](#solrinputdocument.getchilddocumentscount) - Devuelve el número de documentos hijos

# SolrInputDocument::addChildDocuments

(PECL solr &gt;= 2.3.0)

SolrInputDocument::addChildDocuments — Añade un array de documentos hijos

### Descripción

public **SolrInputDocument::addChildDocuments**([array](#language.types.array) &amp;$docs): [void](language.types.void.html)

    Añade un array de documentos hijos al documento de entrada actual.

### Parámetros

    docs


      Un [array](#language.types.array) de objetos [SolrInputDocument](#class.solrinputdocument).


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [SolrIllegalArgumentException](#class.solrillegalargumentexception) en caso de error.

Lanza una [SolrException](#class.solrexception) en caso de error interno.

### Ejemplos

**Ejemplo #1 Ejemplo de SolrInputDocument::addChildDocuments()**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_STORE_PATH,
);

$client = new SolrClient($options);

$product = new SolrInputDocument();

$product-&gt;addField('id', 'P-BLACK');
$product-&gt;addField('cat', 'tshirt');
$product-&gt;addField('cat', 'polo');
$product-&gt;addField('content_type', 'product');

$small = new SolrInputDocument();
$small-&gt;addField('id', 'TS-BLK-S');
$small-&gt;addField('content_type', 'sku');
$small-&gt;addField('size', 'S');
$small-&gt;addField('inventory', 100);

$medium = new SolrInputDocument();
$medium-&gt;addField('id', 'TS-BLK-M');
$medium-&gt;addField('content_type', 'sku');
$medium-&gt;addField('size', 'M');
$medium-&gt;addField('inventory', 200);

$large = new SolrInputDocument();
$large-&gt;addField('id', 'TS-BLK-L');
$large-&gt;addField('content_type', 'sku');
$large-&gt;addField('size', 'L');
$large-&gt;addField('inventory', 300);

// añade los documentos hijos
$skus = [$small, $medium, $large];
$product-&gt;addChildDocuments($skus);

// añade el bloque de documento producto al índice
$updateResponse = $client-&gt;addDocument(
$product,
true, // sobrescribe si el documento existe
10000 // valida el commit en 10 segundos
);

print_r($updateResponse-&gt;getResponse());

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 5
)
)

### Ver también

- [SolrInputDocument::addChildDocument()](#solrinputdocument.addchilddocument) - Añade un documento hijo para la indexación de bloque

- [SolrInputDocument::hasChildDocuments()](#solrinputdocument.haschilddocuments) - Devuelve true si el documento tiene documentos hijos

- [SolrInputDocument::getChildDocuments()](#solrinputdocument.getchilddocuments) - Devuelve un array de documentos hijos (SolrInputDocument)

- [SolrInputDocument::getChildDocumentsCount()](#solrinputdocument.getchilddocumentscount) - Devuelve el número de documentos hijos

# SolrInputDocument::addField

(PECL solr &gt;= 0.9.2)

SolrInputDocument::addField — Añade un campo al documento

### Descripción

public **SolrInputDocument::addField**([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue, [float](#language.types.float) $fieldBoostValue = 0.0): [bool](#language.types.boolean)

Para múltiples campos, si se especifica un valor boost válido, el valor especificado será multiplicado por el valor boost actual para este campo.

### Parámetros

     fieldName


       El nombre del campo






     fieldValue


       El valor del campo






     fieldBoostValue


      El boost de tiempo del índice. Ya que este valor no puede ser negativo, se pueden pasar aún valores menores que 1.0 pero deben ser mayores que cero.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::clear

(PECL solr &gt;= 0.9.2)

SolrInputDocument::clear — Restablece el documento de entrada

### Descripción

public **SolrInputDocument::clear**(): [bool](#language.types.boolean)

Restablece el documento borrando todos los campos y restableciendo el boost del documento a cero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::\_\_clone

(PECL solr &gt;= 0.9.2)

SolrInputDocument::\_\_clone — Crea una copia de un objeto SolrDocument

### Descripción

public **SolrInputDocument::\_\_clone**(): [void](language.types.void.html)

No se debería llamar directamente. Se usa para crear una copia profunda de un objeto SolrInputDocument.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Crea una nueva instancia de SolrInputDocument.

# SolrInputDocument::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrInputDocument::\_\_construct — Constructor

### Descripción

public **SolrInputDocument::\_\_construct**()

Constructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

# SolrInputDocument::deleteField

(PECL solr &gt;= 0.9.2)

SolrInputDocument::deleteField — Elimina un campo del documento

### Descripción

public **SolrInputDocument::deleteField**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Elimina un campo del documento.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrInputDocument::\_\_destruct — Destructor

### Descripción

public **SolrInputDocument::\_\_destruct**()

Destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

# SolrInputDocument::fieldExists

(PECL solr &gt;= 0.9.2)

SolrInputDocument::fieldExists — Comprueba si existe un campo

### Descripción

public **SolrInputDocument::fieldExists**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Comprueba si existe un campo

### Parámetros

     fieldName


       Nombre del campo.





### Valores devueltos

Devuelve **[true](#constant.true)** si se encontró el campo y **[false](#constant.false)** si no se encontró.

# SolrInputDocument::getBoost

(PECL solr &gt;= 0.9.2)

SolrInputDocument::getBoost — Recupera el valor boost actual del documento

### Descripción

public **SolrInputDocument::getBoost**(): [float](#language.types.float)

Recupera el valor boost actual del documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el valor boost en caso de éxito y **[false](#constant.false)** en caso de fallo.

# SolrInputDocument::getChildDocuments

(PECL solr &gt;= 2.3.0)

SolrInputDocument::getChildDocuments — Devuelve un array de documentos hijos (SolrInputDocument)

### Descripción

public **SolrInputDocument::getChildDocuments**(): [array](#language.types.array)

    Devuelve un array de documentos hijos (SolrInputDocument)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrInputDocument::addChildDocument()](#solrinputdocument.addchilddocument) - Añade un documento hijo para la indexación de bloque

- [SolrInputDocument::addChildDocuments()](#solrinputdocument.addchilddocuments) - Añade un array de documentos hijos

- [SolrInputDocument::hasChildDocuments()](#solrinputdocument.haschilddocuments) - Devuelve true si el documento tiene documentos hijos

- [SolrInputDocument::getChildDocumentsCount()](#solrinputdocument.getchilddocumentscount) - Devuelve el número de documentos hijos

# SolrInputDocument::getChildDocumentsCount

(PECL solr &gt;= 2.3.0)

SolrInputDocument::getChildDocumentsCount — Devuelve el número de documentos hijos

### Descripción

public **SolrInputDocument::getChildDocumentsCount**(): [int](#language.types.integer)

    Devuelve el número de documentos hijos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrInputDocument::addChildDocument()](#solrinputdocument.addchilddocument) - Añade un documento hijo para la indexación de bloque

- [SolrInputDocument::addChildDocuments()](#solrinputdocument.addchilddocuments) - Añade un array de documentos hijos

- [SolrInputDocument::hasChildDocuments()](#solrinputdocument.haschilddocuments) - Devuelve true si el documento tiene documentos hijos

- [SolrInputDocument::getChildDocuments()](#solrinputdocument.getchilddocuments) - Devuelve un array de documentos hijos (SolrInputDocument)

# SolrInputDocument::getField

(PECL solr &gt;= 0.9.2)

SolrInputDocument::getField — Recupera un campo por su nombre

### Descripción

public **SolrInputDocument::getField**([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)

Recupera un campo del documento.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Devuelve un objeto SolrDocumentField en caso de éxito y **[false](#constant.false)** en caso de error.

# SolrInputDocument::getFieldBoost

(PECL solr &gt;= 0.9.2)

SolrInputDocument::getFieldBoost — Recupera el valor boost de un campo en particular

### Descripción

public **SolrInputDocument::getFieldBoost**([string](#language.types.string) $fieldName): [float](#language.types.float)

Recupera el valor boost de un campo en particular.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Devuelve el valor boost del campo o **[false](#constant.false)** si hubo un error.

# SolrInputDocument::getFieldCount

(PECL solr &gt;= 0.9.2)

SolrInputDocument::getFieldCount — Devuelve el número de campos del documento

### Descripción

public **SolrInputDocument::getFieldCount**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de campos del documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::getFieldNames

(PECL solr &gt;= 0.9.2)

SolrInputDocument::getFieldNames — Devuelve una matriz que contiene todos los campos del documento

### Descripción

public **SolrInputDocument::getFieldNames**(): [array](#language.types.array)

Devuelve una matriz que contiene todos los campos del documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[false](#constant.false)** en caso de fallo.

# SolrInputDocument::hasChildDocuments

(PECL solr &gt;= 2.3.0)

SolrInputDocument::hasChildDocuments — Devuelve true si el documento tiene documentos hijos

### Descripción

public **SolrInputDocument::hasChildDocuments**(): [bool](#language.types.boolean)

    Verifica si el documento tiene documentos hijos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrInputDocument::addChildDocument()](#solrinputdocument.addchilddocument) - Añade un documento hijo para la indexación de bloque

- [SolrInputDocument::addChildDocuments()](#solrinputdocument.addchilddocuments) - Añade un array de documentos hijos

- [SolrInputDocument::getChildDocuments()](#solrinputdocument.getchilddocuments) - Devuelve un array de documentos hijos (SolrInputDocument)

- [SolrInputDocument::getChildDocumentsCount()](#solrinputdocument.getchilddocumentscount) - Devuelve el número de documentos hijos

# SolrInputDocument::merge

(PECL solr &gt;= 0.9.2)

SolrInputDocument::merge — Fusiona un documento con otro

### Descripción

public **SolrInputDocument::merge**([SolrInputDocument](#class.solrinputdocument) $sourceDoc, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**): [bool](#language.types.boolean)

Fusiona un documento con otro.

### Parámetros

     sourceDoc


       El documento fuente.






     overwrite


       Si esto es **[true](#constant.true)** reemplazará los campos coincidentes del documento destino.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. En el futuro, esto será modificado para que devuelva el número de campos del documento nuevo.

# SolrInputDocument::reset

(PECL solr &gt;= 0.9.2)

SolrInputDocument::reset — Alias de [SolrInputDocument::clear()](#solrinputdocument.clear)

### Descripción

public **SolrInputDocument::reset**(): [bool](#language.types.boolean)

Este es un alias de SolrInputDocument::clear

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::setBoost

(PECL solr &gt;= 0.9.2)

SolrInputDocument::setBoost — Establece el valor boost de este documento

### Descripción

public **SolrInputDocument::setBoost**([float](#language.types.float) $documentBoostValue): [bool](#language.types.boolean)

Establece el valor boost de este documento.

### Parámetros

     documentBoostValue


       El valor boost de tiempo del índice de este documento.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::setFieldBoost

(PECL solr &gt;= 0.9.2)

SolrInputDocument::setFieldBoost — Establece el valor boost de tiempo del índice de un campo

### Descripción

public **SolrInputDocument::setFieldBoost**([string](#language.types.string) $fieldName, [float](#language.types.float) $fieldBoostValue): [bool](#language.types.boolean)

Establece el valor boost de tiempo del índice de un campo. Esto reemplaza el valor boost acutal de este campo.

### Parámetros

     fieldName


       El nombre del campo.






     fieldBoostValue


       El valor boost de tiempo del índice.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::sort

(PECL solr &gt;= 0.9.2)

SolrInputDocument::sort — Ordena los campos dentro de un documento

### Descripción

public **SolrInputDocument::sort**([int](#language.types.integer) $sortOrderBy, [int](#language.types.integer) $sortDirection = SolrInputDocument::SORT_ASC): [bool](#language.types.boolean)

Los campos se cambian de lugar según el criterio y la dirección de ordenación especificados

Los campos pueden ser ordenados por valor boost, nombre de campo y número de valores.

El parámetro $order_by debe ser:

- SolrInputDocument::SORT_FIELD_NAME
- SolrInputDocument::SORT_FIELD_BOOST_VALUE
- SolrInputDocument::SORT_FIELD_VALUE_COUNT

La dirección de ordenación puede ser:

- SolrInputDocument::SORT_DEFAULT
- SolrInputDocument::SORT_ASC
- SolrInputDocument::SORT_DESC

### Parámetros

     sortOrderBy


       El criterio de ordenación






     sortDirection


       La dirección de ordenación





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrInputDocument::toArray

(PECL solr &gt;= 0.9.2)

SolrInputDocument::toArray — Devuelve una matriz como representación del documento de entrada

### Descripción

public **SolrInputDocument::toArray**(): [array](#language.types.array)

Devuelve una matriz como representación del documento de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene los campos. Devuelve **[false](#constant.false)** en caso de error.

## Tabla de contenidos

- [SolrInputDocument::addChildDocument](#solrinputdocument.addchilddocument) — Añade un documento hijo para la indexación de bloque
- [SolrInputDocument::addChildDocuments](#solrinputdocument.addchilddocuments) — Añade un array de documentos hijos
- [SolrInputDocument::addField](#solrinputdocument.addfield) — Añade un campo al documento
- [SolrInputDocument::clear](#solrinputdocument.clear) — Restablece el documento de entrada
- [SolrInputDocument::\_\_clone](#solrinputdocument.clone) — Crea una copia de un objeto SolrDocument
- [SolrInputDocument::\_\_construct](#solrinputdocument.construct) — Constructor
- [SolrInputDocument::deleteField](#solrinputdocument.deletefield) — Elimina un campo del documento
- [SolrInputDocument::\_\_destruct](#solrinputdocument.destruct) — Destructor
- [SolrInputDocument::fieldExists](#solrinputdocument.fieldexists) — Comprueba si existe un campo
- [SolrInputDocument::getBoost](#solrinputdocument.getboost) — Recupera el valor boost actual del documento
- [SolrInputDocument::getChildDocuments](#solrinputdocument.getchilddocuments) — Devuelve un array de documentos hijos (SolrInputDocument)
- [SolrInputDocument::getChildDocumentsCount](#solrinputdocument.getchilddocumentscount) — Devuelve el número de documentos hijos
- [SolrInputDocument::getField](#solrinputdocument.getfield) — Recupera un campo por su nombre
- [SolrInputDocument::getFieldBoost](#solrinputdocument.getfieldboost) — Recupera el valor boost de un campo en particular
- [SolrInputDocument::getFieldCount](#solrinputdocument.getfieldcount) — Devuelve el número de campos del documento
- [SolrInputDocument::getFieldNames](#solrinputdocument.getfieldnames) — Devuelve una matriz que contiene todos los campos del documento
- [SolrInputDocument::hasChildDocuments](#solrinputdocument.haschilddocuments) — Devuelve true si el documento tiene documentos hijos
- [SolrInputDocument::merge](#solrinputdocument.merge) — Fusiona un documento con otro
- [SolrInputDocument::reset](#solrinputdocument.reset) — Alias de SolrInputDocument::clear
- [SolrInputDocument::setBoost](#solrinputdocument.setboost) — Establece el valor boost de este documento
- [SolrInputDocument::setFieldBoost](#solrinputdocument.setfieldboost) — Establece el valor boost de tiempo del índice de un campo
- [SolrInputDocument::sort](#solrinputdocument.sort) — Ordena los campos dentro de un documento
- [SolrInputDocument::toArray](#solrinputdocument.toarray) — Devuelve una matriz como representación del documento de entrada

# La clase SolrDocument

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa un documento Solr recuperado de una respuesta a una consulta.

## Sinopsis de la Clase

    ****




      final
      class **SolrDocument**


     implements
       [ArrayAccess](#class.arrayaccess),  [Iterator](#class.iterator),  [Serializable](#class.serializable) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SORT_DEFAULT](#solrdocument.constants.sort-default) = 1;

    const
     [int](#language.types.integer)
      [SORT_ASC](#solrdocument.constants.sort-asc) = 1;

    const
     [int](#language.types.integer)
      [SORT_DESC](#solrdocument.constants.sort-desc) = 2;

    const
     [int](#language.types.integer)
      [SORT_FIELD_NAME](#solrdocument.constants.sort-field-name) = 1;

    const
     [int](#language.types.integer)
      [SORT_FIELD_VALUE_COUNT](#solrdocument.constants.sort-field-value-count) = 2;

    const
     [int](#language.types.integer)
      [SORT_FIELD_BOOST_VALUE](#solrdocument.constants.sort-field-boost-value) = 4;


    /* Métodos */

public [\_\_construct](#solrdocument.construct)()

    public [addField](#solrdocument.addfield)([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue): [bool](#language.types.boolean)

public [clear](#solrdocument.clear)(): [bool](#language.types.boolean)
public [\_\_clone](#solrdocument.clone)(): [void](language.types.void.html)
public [current](#solrdocument.current)(): [SolrDocumentField](#class.solrdocumentfield)
public [deleteField](#solrdocument.deletefield)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [fieldExists](#solrdocument.fieldexists)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [\_\_get](#solrdocument.get)([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)
public [getChildDocuments](#solrdocument.getchilddocuments)(): [array](#language.types.array)
public [getChildDocumentsCount](#solrdocument.getchilddocumentscount)(): [int](#language.types.integer)
public [getField](#solrdocument.getfield)([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)
public [getFieldCount](#solrdocument.getfieldcount)(): [int](#language.types.integer)
public [getFieldNames](#solrdocument.getfieldnames)(): [array](#language.types.array)
public [getInputDocument](#solrdocument.getinputdocument)(): [SolrInputDocument](#class.solrinputdocument)
public [hasChildDocuments](#solrdocument.haschilddocuments)(): [bool](#language.types.boolean)
public [\_\_isset](#solrdocument.isset)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [key](#solrdocument.key)(): [string](#language.types.string)
public [merge](#solrdocument.merge)([SolrDocument](#class.solrdocument) $sourceDoc, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**): [bool](#language.types.boolean)
public [next](#solrdocument.next)(): [void](language.types.void.html)
public [offsetExists](#solrdocument.offsetexists)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [offsetGet](#solrdocument.offsetget)([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)
public [offsetSet](#solrdocument.offsetset)([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue): [void](language.types.void.html)
public [offsetUnset](#solrdocument.offsetunset)([string](#language.types.string) $fieldName): [void](language.types.void.html)
public [reset](#solrdocument.reset)(): [bool](#language.types.boolean)
public [rewind](#solrdocument.rewind)(): [void](language.types.void.html)
public [serialize](#solrdocument.serialize)(): [string](#language.types.string)
public [\_\_set](#solrdocument.set)([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue): [bool](#language.types.boolean)
public [sort](#solrdocument.sort)([int](#language.types.integer) $sortOrderBy, [int](#language.types.integer) $sortDirection = SolrDocument::SORT_ASC): [bool](#language.types.boolean)
public [toArray](#solrdocument.toarray)(): [array](#language.types.array)
public [unserialize](#solrdocument.unserialize)([string](#language.types.string) $serialized): [void](language.types.void.html)
public [\_\_unset](#solrdocument.unset)([string](#language.types.string) $fieldName): [bool](#language.types.boolean)
public [valid](#solrdocument.valid)(): [bool](#language.types.boolean)

    public [__destruct](#solrdocument.destruct)()

}

## Constantes predefinidas

     **[SolrDocument::SORT_DEFAULT](#solrdocument.constants.sort-default)**

      Modo predeterminado para ordenar los campos dentro de un documento.






     **[SolrDocument::SORT_ASC](#solrdocument.constants.sort-asc)**

      Ordena los campos de forma ascendente






     **[SolrDocument::SORT_DESC](#solrdocument.constants.sort-desc)**

      Ordena los campos de forma descendente






     **[SolrDocument::SORT_FIELD_NAME](#solrdocument.constants.sort-field-name)**

      Ordena los campos por nombre de campo.






     **[SolrDocument::SORT_FIELD_VALUE_COUNT](#solrdocument.constants.sort-field-value-count)**

      Ordena los campos según el número de valores de cada campo.






     **[SolrDocument::SORT_FIELD_BOOST_VALUE](#solrdocument.constants.sort-field-boost-value)**

      Ordena los campos según sus valores boost.




# SolrDocument::addField

(PECL solr &gt;= 0.9.2)

SolrDocument::addField — añade un campo al documento

### Descripción

public **SolrDocument::addField**([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue): [bool](#language.types.boolean)

Este método añade un campo a la instancia de SolrDocument.

### Parámetros

     fieldName


       El nombre del campo






     fieldValue


       El valor del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::clear

(PECL solr &gt;= 0.9.2)

SolrDocument::clear — Borra todos los campos del documento

### Descripción

public **SolrDocument::clear**(): [bool](#language.types.boolean)

Reinicia el objeto actual. Deshecha todos los campos y reinicia el boost del documento a cero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::\_\_clone

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_clone — Crea una copia de un objeto SolrDocument

### Descripción

public **SolrDocument::\_\_clone**(): [void](language.types.void.html)

Crea una copia de un objeto SolrDocument. No se debe llamar directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

# SolrDocument::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_construct — Constructor

### Descripción

public **SolrDocument::\_\_construct**()

Constructor de SolrDocument

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# SolrDocument::current

(PECL solr &gt;= 0.9.2)

SolrDocument::current — Recupera el campo actual

### Descripción

public **SolrDocument::current**(): [SolrDocumentField](#class.solrdocumentfield)

Recupera el campo actual

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el campo

# SolrDocument::deleteField

(PECL solr &gt;= 0.9.2)

SolrDocument::deleteField — Elimina un campo del documento

### Descripción

public **SolrDocument::deleteField**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Elimina un campo del documento.

### Parámetros

     fieldName


       Nombre del campo





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_destruct — Destructor

### Descripción

public **SolrDocument::\_\_destruct**()

Destructor de SolrDocument.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# SolrDocument::fieldExists

(PECL solr &gt;= 0.9.2)

SolrDocument::fieldExists — Comprueba si existe un campo en el documento

### Descripción

public **SolrDocument::fieldExists**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Comprueba si el campo solicitado es un nombre de campo válido del documento.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Devuelve **[true](#constant.true)** si el campo está presente y **[false](#constant.false)** si no lo está.

# SolrDocument::\_\_get

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_get — Acceder al campo como una propiedad

### Descripción

public **SolrDocument::\_\_get**([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)

Método mágico para acceder al campo como si fuera una propiedad.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Devuelve una instancia de SolrDocumentField.

# SolrDocument::getChildDocuments

(PECL solr &gt;= 2.3.0)

SolrDocument::getChildDocuments — Devuelve un array de documentos hijos (SolrDocument)

### Descripción

public **SolrDocument::getChildDocuments**(): [array](#language.types.array)

    Devuelve un array de documentos hijos (SolrDocument)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrDocument::hasChildDocuments()](#solrdocument.haschilddocuments) - Verifica si el documento tiene documentos hijos

- [SolrDocument::getChildDocumentsCount()](#solrdocument.getchilddocumentscount) - Devuelve el número de documentos hijos

# SolrDocument::getChildDocumentsCount

(PECL solr &gt;= 2.3.0)

SolrDocument::getChildDocumentsCount — Devuelve el número de documentos hijos

### Descripción

public **SolrDocument::getChildDocumentsCount**(): [int](#language.types.integer)

    Devuelve el número de documentos hijos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrDocument::hasChildDocuments()](#solrdocument.haschilddocuments) - Verifica si el documento tiene documentos hijos

- [SolrDocument::getChildDocuments()](#solrdocument.getchilddocuments) - Devuelve un array de documentos hijos (SolrDocument)

# SolrDocument::getField

(PECL solr &gt;= 0.9.2)

SolrDocument::getField — Recupera un campo según su nombre

### Descripción

public **SolrDocument::getField**([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)

Recupera un campo según su nombre.

### Parámetros

     fieldName


       Nombre del campo.





### Valores devueltos

Devuelve un objeto SolrDocumentField en caso de éxito y **[false](#constant.false)** en caso de fallo.

# SolrDocument::getFieldCount

(PECL solr &gt;= 0.9.2)

SolrDocument::getFieldCount — Devuelve el número de campos de este documento

### Descripción

public **SolrDocument::getFieldCount**(): [int](#language.types.integer)

Devuelve el número de campos de este documento. Los campo multi valor sólo se cuentan una vez.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[false](#constant.false)** en caso de fallo.

# SolrDocument::getFieldNames

(PECL solr &gt;= 0.9.2)

SolrDocument::getFieldNames — Devuelve una matriz con los nombres de campos del documento

### Descripción

public **SolrDocument::getFieldNames**(): [array](#language.types.array)

Devuelve una matriz con los nombres de campos del documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene los nombres de los campos de este documento.

# SolrDocument::getInputDocument

(PECL solr &gt;= 0.9.2)

SolrDocument::getInputDocument — Devuelve un SolrInputDocument equivalente al objeto

### Descripción

public **SolrDocument::getInputDocument**(): [SolrInputDocument](#class.solrinputdocument)

Devuelve un SolrInputDocument equivalente al objeto. Esto es útil si se desea reenviar/actualizar un documento recuperado desde una consulta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto SolrInputDocument en caso de éxito y **[null](#constant.null)** en caso de fallo.

# SolrDocument::hasChildDocuments

(PECL solr &gt;= 2.3.0)

SolrDocument::hasChildDocuments — Verifica si el documento tiene documentos hijos

### Descripción

public **SolrDocument::hasChildDocuments**(): [bool](#language.types.boolean)

    Indica si el documento tiene documentos hijos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrDocument::getChildDocuments()](#solrdocument.getchilddocuments) - Devuelve un array de documentos hijos (SolrDocument)

- [SolrDocument::getChildDocumentsCount()](#solrdocument.getchilddocumentscount) - Devuelve el número de documentos hijos

# SolrDocument::\_\_isset

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_isset — Comprueba si existe un campo

### Descripción

public **SolrDocument::\_\_isset**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Comprueba si existe un campo

### Parámetros

     fieldName


       Nombre del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::key

(PECL solr &gt;= 0.9.2)

SolrDocument::key — Recupera la clave actual

### Descripción

public **SolrDocument::key**(): [string](#language.types.string)

Recupera la clave actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la clave actual.

# SolrDocument::merge

(PECL solr &gt;= 0.9.2)

SolrDocument::merge — Fusiona la fuente con el objeto SolrDocument actual

### Descripción

public **SolrDocument::merge**([SolrDocument](#class.solrdocument) $sourceDoc, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**): [bool](#language.types.boolean)

Fusiona la fuente con el objeto SolrDocument actual.

### Parámetros

     sourceDoc


       El documento fuente.






     overwrite


      Si esto es **[true](#constant.true)** los campos con el mismo nombre que los del documento destino serán sobrescritos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::next

(PECL solr &gt;= 0.9.2)

SolrDocument::next — Mueve el puntero interno al siguiente campo

### Descripción

public **SolrDocument::next**(): [void](language.types.void.html)

Mueve el puntero interno al siguiente campo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método no devuelve ningún valor.

# SolrDocument::offsetExists

(PECL solr &gt;= 0.9.2)

SolrDocument::offsetExists — Comprueba si existe un campo en particular

### Descripción

public **SolrDocument::offsetExists**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Comprueba si existe un campo en particular. Se usa cuando un objeto es tratado como una matriz.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::offsetGet

(PECL solr &gt;= 0.9.2)

SolrDocument::offsetGet — Recupera un campo

### Descripción

public **SolrDocument::offsetGet**([string](#language.types.string) $fieldName): [SolrDocumentField](#class.solrdocumentfield)

Se usa para recuperar un campo cuando el objeto es tratado como una matriz.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Devuelve un objeto SolrDocumentField.

# SolrDocument::offsetSet

(PECL solr &gt;= 0.9.2)

SolrDocument::offsetSet — Añade un campo al documento

### Descripción

public **SolrDocument::offsetSet**([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue): [void](language.types.void.html)

Se usa cuando el objeto es tratado como una matriz para añadir un campo al documento.

### Parámetros

     fieldName


       El nombre del campo.






     fieldValue


       El valor del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::offsetUnset

(PECL solr &gt;= 0.9.2)

SolrDocument::offsetUnset — Elimina un campo

### Descripción

public **SolrDocument::offsetUnset**([string](#language.types.string) $fieldName): [void](language.types.void.html)

Elimina un campo del documento.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

No se devuelve ningún valor.

# SolrDocument::reset

(PECL solr &gt;= 0.9.2)

SolrDocument::reset — Alias de [SolrDocument::clear()](#solrdocument.clear)

### Descripción

public **SolrDocument::reset**(): [bool](#language.types.boolean)

Este es un alias de SolrDocument::clear()

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::rewind

(PECL solr &gt;= 0.9.2)

SolrDocument::rewind — Reinicia el puntero interno al principio

### Descripción

public **SolrDocument::rewind**(): [void](language.types.void.html)

Reinicia el puntero interno al principio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método no devuelve ningún valor.

# SolrDocument::serialize

(PECL solr &gt;= 0.9.2)

SolrDocument::serialize — Usado para serialización personalizada

### Descripción

public **SolrDocument::serialize**(): [string](#language.types.string)

Usado para serialización personalizada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que representa el documento Solr serializado.

# SolrDocument::\_\_set

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_set — Añade otro campo al documento

### Descripción

public **SolrDocument::\_\_set**([string](#language.types.string) $fieldName, [string](#language.types.string) $fieldValue): [bool](#language.types.boolean)

Añade otro campo al documento. Se usa para establecer el campo como propiedades nuevas.

### Parámetros

     fieldName


       Nombre del campo.






     fieldValue


       Valor del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::sort

(PECL solr &gt;= 0.9.2)

SolrDocument::sort — Ordena los campos del documento

### Descripción

public **SolrDocument::sort**([int](#language.types.integer) $sortOrderBy, [int](#language.types.integer) $sortDirection = SolrDocument::SORT_ASC): [bool](#language.types.boolean)

Los campos se cambian de lugar según el criterio y la dirección de ordenación especificados

Los campos pueden ser ordenados por valor boost, nombre de campo y número de valores.

El parámetro sortOrderBy debe ser:

- SolrDocument::SORT_FIELD_NAME
- SolrDocument::SORT_FIELD_BOOST_VALUE
- SolrDocument::SORT_FIELD_VALUE_COUNT

El parámetro sortDirection puede ser:

- SolrDocument::SORT_DEFAULT
- SolrDocument::SORT_ASC
- SolrDocument::SORT_DESC

La ordenación predeterminada es de manera ascendente.

### Parámetros

     sortOrderBy


       El criterio de ordenación.






     sortDirection


       La dirección de ordenación.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::toArray

     (PECL solr &gt;= 0.9.2)

SolrDocument::toArray — Devuelve una matriz como representación de un documento

### Descripción

public **SolrDocument::toArray**(): [array](#language.types.array)

Devuelve una matriz como representación de un documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz como representación de un documento.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrDocument::toArray()**

&lt;?php

$doc = new SolrDocument();

$doc-&gt;addField('id', 1123);

$doc-&gt;features = "PHP Client Side";
$doc-&gt;features = "Fast development cycles";

$doc['cat'] = 'Software';
$doc['cat'] = 'Custom Search';
$doc-&gt;cat = 'Information Technology';

print_r($doc-&gt;toArray());

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[document_boost] =&gt; 0
[field_count] =&gt; 3
[fields] =&gt; Array
(
[0] =&gt; SolrDocumentField Object
(
[name] =&gt; id
[boost] =&gt; 0
[values] =&gt; Array
(
[0] =&gt; 1123
)

                )

            [1] =&gt; SolrDocumentField Object
                (
                    [name] =&gt; features
                    [boost] =&gt; 0
                    [values] =&gt; Array
                        (
                            [0] =&gt; PHP Client Side
                            [1] =&gt; Fast development cycles
                        )

                )

            [2] =&gt; SolrDocumentField Object
                (
                    [name] =&gt; cat
                    [boost] =&gt; 0
                    [values] =&gt; Array
                        (
                            [0] =&gt; Software
                            [1] =&gt; Custom Search
                            [2] =&gt; Information Technology
                        )

                )

        )

)

# SolrDocument::unserialize

(PECL solr &gt;= 0.9.2)

SolrDocument::unserialize — Serialización personalizada de objetos SolrDocument

### Descripción

public **SolrDocument::unserialize**([string](#language.types.string) $serialized): [void](language.types.void.html)

Serialización personalizada de objetos SolrDocument

### Parámetros

     serialized


       Una representación XML del documento.





### Valores devueltos

Nada.

# SolrDocument::\_\_unset

(PECL solr &gt;= 0.9.2)

SolrDocument::\_\_unset — Elimina un campo del documento

### Descripción

public **SolrDocument::\_\_unset**([string](#language.types.string) $fieldName): [bool](#language.types.boolean)

Elimina un campo del documento cuando al campo se accede como una propiedad del objeto.

### Parámetros

     fieldName


       El nombre del campo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrDocument::valid

(PECL solr &gt;= 0.9.2)

SolrDocument::valid — Comprueba si la posición actual del puntero interno es aún válida

### Descripción

public **SolrDocument::valid**(): [bool](#language.types.boolean)

Comprueba si la posición actual del puntero interno es aún válida. Se usa durante operaciones foreach.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** si la posición actual ya no es válida.

## Tabla de contenidos

- [SolrDocument::addField](#solrdocument.addfield) — añade un campo al documento
- [SolrDocument::clear](#solrdocument.clear) — Borra todos los campos del documento
- [SolrDocument::\_\_clone](#solrdocument.clone) — Crea una copia de un objeto SolrDocument
- [SolrDocument::\_\_construct](#solrdocument.construct) — Constructor
- [SolrDocument::current](#solrdocument.current) — Recupera el campo actual
- [SolrDocument::deleteField](#solrdocument.deletefield) — Elimina un campo del documento
- [SolrDocument::\_\_destruct](#solrdocument.destruct) — Destructor
- [SolrDocument::fieldExists](#solrdocument.fieldexists) — Comprueba si existe un campo en el documento
- [SolrDocument::\_\_get](#solrdocument.get) — Acceder al campo como una propiedad
- [SolrDocument::getChildDocuments](#solrdocument.getchilddocuments) — Devuelve un array de documentos hijos (SolrDocument)
- [SolrDocument::getChildDocumentsCount](#solrdocument.getchilddocumentscount) — Devuelve el número de documentos hijos
- [SolrDocument::getField](#solrdocument.getfield) — Recupera un campo según su nombre
- [SolrDocument::getFieldCount](#solrdocument.getfieldcount) — Devuelve el número de campos de este documento
- [SolrDocument::getFieldNames](#solrdocument.getfieldnames) — Devuelve una matriz con los nombres de campos del documento
- [SolrDocument::getInputDocument](#solrdocument.getinputdocument) — Devuelve un SolrInputDocument equivalente al objeto
- [SolrDocument::hasChildDocuments](#solrdocument.haschilddocuments) — Verifica si el documento tiene documentos hijos
- [SolrDocument::\_\_isset](#solrdocument.isset) — Comprueba si existe un campo
- [SolrDocument::key](#solrdocument.key) — Recupera la clave actual
- [SolrDocument::merge](#solrdocument.merge) — Fusiona la fuente con el objeto SolrDocument actual
- [SolrDocument::next](#solrdocument.next) — Mueve el puntero interno al siguiente campo
- [SolrDocument::offsetExists](#solrdocument.offsetexists) — Comprueba si existe un campo en particular
- [SolrDocument::offsetGet](#solrdocument.offsetget) — Recupera un campo
- [SolrDocument::offsetSet](#solrdocument.offsetset) — Añade un campo al documento
- [SolrDocument::offsetUnset](#solrdocument.offsetunset) — Elimina un campo
- [SolrDocument::reset](#solrdocument.reset) — Alias de SolrDocument::clear
- [SolrDocument::rewind](#solrdocument.rewind) — Reinicia el puntero interno al principio
- [SolrDocument::serialize](#solrdocument.serialize) — Usado para serialización personalizada
- [SolrDocument::\_\_set](#solrdocument.set) — Añade otro campo al documento
- [SolrDocument::sort](#solrdocument.sort) — Ordena los campos del documento
- [SolrDocument::toArray](#solrdocument.toarray) — Devuelve una matriz como representación de un documento
- [SolrDocument::unserialize](#solrdocument.unserialize) — Serialización personalizada de objetos SolrDocument
- [SolrDocument::\_\_unset](#solrdocument.unset) — Elimina un campo del documento
- [SolrDocument::valid](#solrdocument.valid) — Comprueba si la posición actual del puntero interno es aún válida

# La clase SolrDocumentField

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa un campo de un documento Solr. Todas sus propiedades son de sólo lectura.

## Sinopsis de la Clase

    ****




      final
      class **SolrDocumentField**

     {

    /* Propiedades */

     public
     readonly
     [string](#language.types.string)
      [$name](#solrdocumentfield.props.name);

    public
     readonly
     [float](#language.types.float)
      [$boost](#solrdocumentfield.props.boost);

    public
     readonly
     [array](#language.types.array)
      [$values](#solrdocumentfield.props.values);



    /* Métodos */

public [\_\_construct](#solrdocumentfield.construct)()

    public [__destruct](#solrdocumentfield.destruct)()

}

## Propiedades

     name

      El nombre del campo.





     boost

      El valor de boost del campo





     values

      Una matriz de valores para este campo




# SolrDocumentField::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrDocumentField::\_\_construct — Constructor

### Descripción

public **SolrDocumentField::\_\_construct**()

Constructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

# SolrDocumentField::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrDocumentField::\_\_destruct — Destructor

### Descripción

public **SolrDocumentField::\_\_destruct**()

Destructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

## Tabla de contenidos

- [SolrDocumentField::\_\_construct](#solrdocumentfield.construct) — Constructor
- [SolrDocumentField::\_\_destruct](#solrdocumentfield.destruct) — Destructor

# La clase SolrObject

(PECL solr &gt;= 0.9.2)

## Introducción

    Es un objeto a cuyas propiedades también se pueden acceder usando la sintaxis de array. Todas sus propiedades son de sólo lectura.

## Sinopsis de la Clase

    ****




      final
      class **SolrObject**


     implements
       [ArrayAccess](#class.arrayaccess) {


    /* Métodos */

public [\_\_construct](#solrobject.construct)()

    public [getPropertyNames](#solrobject.getpropertynames)(): [array](#language.types.array)

public [offsetExists](#solrobject.offsetexists)([string](#language.types.string) $property_name): [bool](#language.types.boolean)
public [offsetGet](#solrobject.offsetget)([string](#language.types.string) $property_name): [mixed](#language.types.mixed)
public [offsetSet](#solrobject.offsetset)([string](#language.types.string) $property_name, [string](#language.types.string) $property_value): [void](language.types.void.html)
public [offsetUnset](#solrobject.offsetunset)([string](#language.types.string) $property_name): [void](language.types.void.html)

    public [__destruct](#solrobject.destruct)()

}

# SolrObject::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrObject::\_\_construct — Crea un objeto Solr

### Descripción

public **SolrObject::\_\_construct**()

Crea un objeto Solr.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrObject::__construct()**

&lt;?php
/_ ... _/
?&gt;

    Resultado del ejemplo anterior es similar a:

...

# SolrObject::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrObject::\_\_destruct — Destructor

### Descripción

public **SolrObject::\_\_destruct**()

El destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

# SolrObject::getPropertyNames

(PECL solr &gt;= 0.9.2)

SolrObject::getPropertyNames — Devuelve una matriz de todos los nombres de las propiedades

### Descripción

public **SolrObject::getPropertyNames**(): [array](#language.types.array)

Devuelve una matriz de todos los nombres de las propiedades.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz.

# SolrObject::offsetExists

(PECL solr &gt;= 0.9.2)

SolrObject::offsetExists — Comprueba si la propiedad existe

### Descripción

public **SolrObject::offsetExists**([string](#language.types.string) $property_name): [bool](#language.types.boolean)

Comprueba si la propiedad existe. Se usa cuando el objeto es tratado como una matriz.

### Parámetros

     property_name


       El nombre de la propiedad.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrObject::offsetGet

(PECL solr &gt;= 0.9.2)

SolrObject::offsetGet — Usado para recuperar una propiedad

### Descripción

public **SolrObject::offsetGet**([string](#language.types.string) $property_name): [mixed](#language.types.mixed)

Usado para obtener el valor de una propiedad. Se utiliza cuando un objeto es tratado como una matriz.

### Parámetros

     property_name


       Nombre de la propiedad.





### Valores devueltos

Devuelve el valor de la propiedad.

# SolrObject::offsetSet

(PECL solr &gt;= 0.9.2)

SolrObject::offsetSet — Establece el valor de una propiedad

### Descripción

public **SolrObject::offsetSet**([string](#language.types.string) $property_name, [string](#language.types.string) $property_value): [void](language.types.void.html)

Establece el valor de una propiedad. Se usa cuando el objeto es tratado como una matriz. Este objeto es de sólo lectura. Esto nunva debería intentarse.

### Parámetros

     property_name


       El nombre de la propiedad.






     property_value


       El nuevo valor.





### Valores devueltos

Nada.

# SolrObject::offsetUnset

(PECL solr &gt;= 0.9.2)

SolrObject::offsetUnset — Desestablece el valor de la propiedad

### Descripción

public **SolrObject::offsetUnset**([string](#language.types.string) $property_name): [void](language.types.void.html)

Desestablece el valor de la propiedad. Se emplea cuando el objeto es tratado como un array. Este objeto es de sólo lectura. Esto nunca debe intentarse.

### Parámetros

     property_name


       El nombre de la propiedad.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrObject::offsetUnset()**

&lt;?php
/_ ... _/
?&gt;

    Resultado del ejemplo anterior es similar a:

...

## Tabla de contenidos

- [SolrObject::\_\_construct](#solrobject.construct) — Crea un objeto Solr
- [SolrObject::\_\_destruct](#solrobject.destruct) — Destructor
- [SolrObject::getPropertyNames](#solrobject.getpropertynames) — Devuelve una matriz de todos los nombres de las propiedades
- [SolrObject::offsetExists](#solrobject.offsetexists) — Comprueba si la propiedad existe
- [SolrObject::offsetGet](#solrobject.offsetget) — Usado para recuperar una propiedad
- [SolrObject::offsetSet](#solrobject.offsetset) — Establece el valor de una propiedad
- [SolrObject::offsetUnset](#solrobject.offsetunset) — Desestablece el valor de la propiedad

# La clase SolrClient

(PECL solr &gt;= 0.9.2)

## Introducción

    Usada para enviar solicitudes al servidor Solr. Actualmente no está soportado clonar y serializar instancias de SolrClient.

## Sinopsis de la Clase

    ****




      final
      class **SolrClient**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SEARCH_SERVLET_TYPE](#solrclient.constants.search-servlet-type) = 1;

    const
     [int](#language.types.integer)
      [UPDATE_SERVLET_TYPE](#solrclient.constants.update-servlet-type) = 2;

    const
     [int](#language.types.integer)
      [THREADS_SERVLET_TYPE](#solrclient.constants.threads-servlet-type) = 4;

    const
     [int](#language.types.integer)
      [PING_SERVLET_TYPE](#solrclient.constants.ping-servlet-type) = 8;

    const
     [int](#language.types.integer)
      [TERMS_SERVLET_TYPE](#solrclient.constants.terms-servlet-type) = 16;

    const
     [int](#language.types.integer)
      [SYSTEM_SERVLET_TYPE](#solrclient.constants.system-servlet-type) = 32;

    const
     [string](#language.types.string)
      [DEFAULT_SEARCH_SERVLET](#solrclient.constants.default-search-servlet) = select;

    const
     [string](#language.types.string)
      [DEFAULT_UPDATE_SERVLET](#solrclient.constants.default-update-servlet) = update;

    const
     [string](#language.types.string)
      [DEFAULT_THREADS_SERVLET](#solrclient.constants.default-threads-servlet) = admin/threads;

    const
     [string](#language.types.string)
      [DEFAULT_PING_SERVLET](#solrclient.constants.default-ping-servlet) = admin/ping;

    const
     [string](#language.types.string)
      [DEFAULT_TERMS_SERVLET](#solrclient.constants.default-terms-servlet) = terms;

    const
     [string](#language.types.string)
      [DEFAULT_SYSTEM_SERVLET](#solrclient.constants.default-system-servlet) = admin/system;


    /* Métodos */

public [\_\_construct](#solrclient.construct)([array](#language.types.array) $clientOptions)

    public [addDocument](#solrclient.adddocument)([SolrInputDocument](#class.solrinputdocument) $doc, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**, [int](#language.types.integer) $commitWithin = 0): [SolrUpdateResponse](#class.solrupdateresponse)

public [addDocuments](#solrclient.adddocuments)([array](#language.types.array) $docs, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**, [int](#language.types.integer) $commitWithin = 0): [void](language.types.void.html)
public [commit](#solrclient.commit)([bool](#language.types.boolean) $softCommit = **[false](#constant.false)**, [bool](#language.types.boolean) $waitSearcher = **[true](#constant.true)**, [bool](#language.types.boolean) $expungeDeletes = **[false](#constant.false)**): [SolrUpdateResponse](#class.solrupdateresponse)
public [deleteById](#solrclient.deletebyid)([string](#language.types.string) $id): [SolrUpdateResponse](#class.solrupdateresponse)
public [deleteByIds](#solrclient.deletebyids)([array](#language.types.array) $ids): [SolrUpdateResponse](#class.solrupdateresponse)
public [deleteByQueries](#solrclient.deletebyqueries)([array](#language.types.array) $queries): [SolrUpdateResponse](#class.solrupdateresponse)
public [deleteByQuery](#solrclient.deletebyquery)([string](#language.types.string) $query): [SolrUpdateResponse](#class.solrupdateresponse)
public [getById](#solrclient.getbyid)([string](#language.types.string) $id): [SolrQueryResponse](#class.solrqueryresponse)
public [getByIds](#solrclient.getbyids)([array](#language.types.array) $ids): [SolrQueryResponse](#class.solrqueryresponse)
public [getDebug](#solrclient.getdebug)(): [string](#language.types.string)
public [getOptions](#solrclient.getoptions)(): [array](#language.types.array)
public [optimize](#solrclient.optimize)([int](#language.types.integer) $maxSegments = 1, [bool](#language.types.boolean) $softCommit = **[true](#constant.true)**, [bool](#language.types.boolean) $waitSearcher = **[true](#constant.true)**): [SolrUpdateResponse](#class.solrupdateresponse)
public [ping](#solrclient.ping)(): [SolrPingResponse](#class.solrpingresponse)
public [query](#solrclient.query)([SolrParams](#class.solrparams) $query): [SolrQueryResponse](#class.solrqueryresponse)
public [request](#solrclient.request)([string](#language.types.string) $raw_request): [SolrUpdateResponse](#class.solrupdateresponse)
public [rollback](#solrclient.rollback)(): [SolrUpdateResponse](#class.solrupdateresponse)
public [setResponseWriter](#solrclient.setresponsewriter)([string](#language.types.string) $responseWriter): [void](language.types.void.html)
public [setServlet](#solrclient.setservlet)([int](#language.types.integer) $type, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [system](#solrclient.system)(): [void](language.types.void.html)
public [threads](#solrclient.threads)(): [void](language.types.void.html)

    public [__destruct](#solrclient.destruct)()

}

## Constantes predefinidas

     **[SolrClient::SEARCH_SERVLET_TYPE](#solrclient.constants.search-servlet-type)**

      Usado cuando se actualiza servlet de búsqueda.






     **[SolrClient::UPDATE_SERVLET_TYPE](#solrclient.constants.update-servlet-type)**

      Usado cuando se actualiza el servlet de actualización.






     **[SolrClient::THREADS_SERVLET_TYPE](#solrclient.constants.threads-servlet-type)**

      Usado cuando se actualiza el servlet de hilos.






     **[SolrClient::PING_SERVLET_TYPE](#solrclient.constants.ping-servlet-type)**

      Usado cuando se actualiza el servlet de ping.






     **[SolrClient::TERMS_SERVLET_TYPE](#solrclient.constants.terms-servlet-type)**

      Usado cuando se actualiza el servlet de términos.






     **[SolrClient::SYSTEM_SERVLET_TYPE](#solrclient.constants.system-servlet-type)**

      Usado cuando se obtiene información del sistema desde el servlet de sistema.






     **[SolrClient::DEFAULT_SEARCH_SERVLET](#solrclient.constants.default-search-servlet)**

      Este es el valor inicial del servlet de búsqueda.






     **[SolrClient::DEFAULT_UPDATE_SERVLET](#solrclient.constants.default-update-servlet)**

      Este es el valor inicial del servlet de actualizacion.






     **[SolrClient::DEFAULT_THREADS_SERVLET](#solrclient.constants.default-threads-servlet)**

      Este es el valor inicial del servlet de hilos.






     **[SolrClient::DEFAULT_PING_SERVLET](#solrclient.constants.default-ping-servlet)**

      Este es el valor inicial del servlet de ping.






     **[SolrClient::DEFAULT_TERMS_SERVLET](#solrclient.constants.default-terms-servlet)**

      Este es el valor inicial del servlet de términos usados por TermsComponent






     **[SolrClient::DEFAULT_SYSTEM_SERVLET](#solrclient.constants.default-system-servlet)**

      Este es el valor inicial del servlet del sistema usado para obtener información de Solr Server




# SolrClient::addDocument

(PECL solr &gt;= 0.9.2)

SolrClient::addDocument — Añade un documento al índice

### Descripción

public **SolrClient::addDocument**([SolrInputDocument](#class.solrinputdocument) $doc, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**, [int](#language.types.integer) $commitWithin = 0): [SolrUpdateResponse](#class.solrupdateresponse)

Este método añade un documento al índice.

### Parámetros

     doc


       La instancia de SolrInputDocument.






     overwrite


       Si sobrescribir el documento existente o no. Si es **[false](#constant.false)** existirán duplicados (varios documento con el mismo ID).




      **Advertencia**

        En Solr &lt; 2.0 de PECL se usó $allowDups en lugar de $overwrite, que tiene la misma funcionalidad con la bandera booleana opuesta.




        $allowDups = false es lo mismo que $overwrite = true







     commitWithin


       Número de milisegundos dentro de los que autoconsignar este documento. Disponible desde Solr 1.4. El valor predeterminado (0) significa deshabilitado.




       Cuando se especifica este valor, deja el control de cúando realizar la consignación
       al mismo Solr, optimizando el número de consignaciones a un mínimo mientras aún se cumple
       con los requisitos
       de latencia de actualizaciones, por lo que Solr realizará automáticamente una consignación
       cuando la agregación más antigua en el búfer venza.





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) o lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el servidor de Solr falló al procesar la petición.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::addDocument()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$doc = new SolrInputDocument();

$doc-&gt;addField('id', 334455);
$doc-&gt;addField('cat', 'Software');
$doc-&gt;addField('cat', 'Lucene');

$respuestaActualización = $cliente-&gt;addDocument($doc);

// se ha de consignar los cambios a escribir is no se usó $commitWithin
$client-&gt;commit();

print_r($respuestaActualización-&gt;getResponse());

?&gt;

    Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
)

)

    **Ejemplo #2 Ejemplo 2 de SolrClient::addDocument()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$doc = new SolrInputDocument();

$doc-&gt;addField('id', 334455);
$doc-&gt;addField('cat', 'Software');
$doc-&gt;addField('cat', 'Lucene');

// No es necesario llamar a commit() ya que se proporciona $commitWithin, por lo que Solr Server autoconsignará en 10 segundos
$respuestaActualización = $cliente-&gt;addDocument($doc, false, 10000);

print_r($updateResponse-&gt;getResponse());

?&gt;

    Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
)

)

### Ver también

    - [SolrClient::addDocuments()](#solrclient.adddocuments) - Añade una colección de instancias de SolrInputDocument al índice

    - [SolrClient::commit()](#solrclient.commit) - Finaliza todas las añadiduras/eliminaciones hechas al índice

# SolrClient::addDocuments

(PECL solr &gt;= 0.9.2)

SolrClient::addDocuments — Añade una colección de instancias de SolrInputDocument al índice

### Descripción

public **SolrClient::addDocuments**([array](#language.types.array) $docs, [bool](#language.types.boolean) $overwrite = **[true](#constant.true)**, [int](#language.types.integer) $commitWithin = 0): [void](language.types.void.html)

Añade una colección de documentos al índice.

### Parámetros

     docs


       Una array que contiene la colección de instancias de SolrInputDocument. Este array debe ser una variable real.






     overwrite


       Si sobrescribir el documento existente o no. Si es **[false](#constant.false)** existirán duplicados (varios documento con el mismo ID).




      **Advertencia**

        En Solr &lt; 2.0 de PECL se usó $allowDups en lugar de $overwrite, que tiene la misma funcionalidad con la bandera booleana opuesta.




        $allowDups = false es lo mismo que $overwrite = true







     commitWithin


       Número de milisegundos dentro de los que autoconsignar este documento. Disponible desde Solr 1.4. El valor predeterminado (0) significa deshabilitado.




       Cuando se especifica este valor, deja el control de cúando realizar la consignación
       al mismo Solr, optimizando el número de consignaciones a un mínimo mientras aún se cumple
       con los requisitos
       de latencia de actualizaciones, por lo que Solr realizará automáticamente una consignación
       cuando la agregación más antigua en el búfer venza.





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) o lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::addDocuments()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$doc = new SolrInputDocument();

$doc-&gt;addField('id', 334455);
$doc-&gt;addField('cat', 'Software');
$doc-&gt;addField('cat', 'Lucene');

$doc2 = clone $doc;

$doc2-&gt;deleteField('id');
$doc2-&gt;addField('id', 334456);

$docs = array($doc, $doc2);

$respuestaActualización = $cliente-&gt;addDocuments($docs);

// no se escribirán los cambios en disco hasta que se proporcione $commitWithin o se llame a SolrClient::commit

print_r($respuestaActualización-&gt;getResponse());

?&gt;

    Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 2
)

)

### Ver también

    - [SolrClient::addDocument()](#solrclient.adddocument) - Añade un documento al índice

    - [SolrClient::commit()](#solrclient.commit) - Finaliza todas las añadiduras/eliminaciones hechas al índice

# SolrClient::commit

(PECL solr &gt;= 0.9.2)

SolrClient::commit — Finaliza todas las añadiduras/eliminaciones hechas al índice

### Descripción

public **SolrClient::commit**([bool](#language.types.boolean) $softCommit = **[false](#constant.false)**, [bool](#language.types.boolean) $waitSearcher = **[true](#constant.true)**, [bool](#language.types.boolean) $expungeDeletes = **[false](#constant.false)**): [SolrUpdateResponse](#class.solrupdateresponse)

Este método finaliza todas las añadiduras/eliminaciones hechas al índice.

### Parámetros

     softCommit


       Refresca la 'vista' del índice para un mayor rendimiento, pero si sin garantizar "on-disk". (Solr4.0+)




       Una consignación suave es mucho más rápida ya que solamente hace visibles los cabios de índices y usa fsync con los ficheros de índices o escribe un nuevo descriptor de índice.
       Si la JVM falla o hay una bajada de tensión, los cambios acaecidos después de la úlitma consignación dura se perderán.
       Las búsquedas que tengan requisitos cercanos al tiempo real (que requieren que los cambios de índices estén rápidamente visibles para búsquedas) necesitarán más a menudo consignas suaves, y menos frecuentemente duras.






     waitSearcher


       Bloqueo hasta que un nuevo buscador sea abierto y registrado como el buscador de consultas principal, haciendo los cambios visibles.






     expungeDeletes


       Mezcla segmentos con eliminaciones para desechar. (Solr1.4+)





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) en caso de éxito o lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Historial de cambios

       Versión
       Descripción






       PECL solr 1.1.0, PECL solr 2.0.0

        Se eliminó el parámetro $maxSegments.




       PECL solr 2.0.0b

        Cambio en la API: SolrClient::commit ([ int $maxSegments = 0 [, bool $softCommit = false [, bool $waitSearcher = true[, bool $expungeDeletes = false ]]] )





       PECL solr 0.9.2

        Firma: SolrClient::commit ([ int $maxSegments = 1 [, bool $waitFlush = true [, bool $waitSearcher = true ]]] ).
        $waitFlush: Bloquea hasta que los cambios de índices sean volcados a disco.





### Notas

**Advertencia**

    Solr &gt;= 2.0 de PECL solamente soporta Solr Server &gt;= 4.0

### Ver también

    - [SolrClient::optimize()](#solrclient.optimize) - Defragmenta el índice

    - [SolrClient::rollback()](#solrclient.rollback) - Revierte todos los añadidos/eliminados hechos en el índice desde el último envío

# SolrClient::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrClient::\_\_construct — Constructor para el objeto SolrClient

### Descripción

public **SolrClient::\_\_construct**([array](#language.types.array) $clientOptions)

Constructor para el objeto SolrClient

### Parámetros

     clientOptions


       Esto es una matriz que contiene una de las siguientes claves:





- secure (Valor booleano que indica si conectarse o no en modo seguro)
- hostname (El nombre del host para el servidor Solr)
- port (El número de puerto)
- path (La ruta del servidor solr)
- wt (El nombre del autor de la respuesta p.ej. xml, json)
- login (EL nombre de usuario para la Autenticación HTTP, si la hubiera)
- password (La contraseña de la Autenticación HTTP)
- proxy_host (El nombre del host para el servidor proxy, si lo hubiera)
- proxy_port (El puerto del servidor proxy)
- proxy_login (El nombre de usuario del proxy)
- proxy_password (La contraseña del proxy)
- timeout (El tiempo máximo en segundos permitido para la operación de transferencia de datos http. Por defecto es 30 segundos)
- ssl_cert (Nombre de fichero a un archvio con formato PEM que contiene la clave + certificado privados (concatenado en ese orden) )
- ssl_key (Nombre de fichero a un fichero de clave privada con formato PEM)
- ssl_keypassword (Contraseña para la clave privada)
- ssl_cainfo (Nombre del fichero que mantiene uno o más certificados CA para ser verificados con su par)
- ssl_capath (Nombre del directorio que mantiene múltiples certificados CA para ser verificados con su par)

Por favor, observe que si el fichero ssl_cert solamente contiene el certificado privado, se tiene que especificar un fichero ssl_key distinto

La opción ssl_keypassword es necesaria si las opciones ssl_cert o ssl_key están establecidas.

### Errores/Excepciones

Lanza una [SolrIllegalArgumentException](#class.solrillegalargumentexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::__construct()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_PATH_TO_SOLR,
'wt' =&gt; 'xml',
);

$cliente = new SolrClient($opciones);

$doc = new SolrInputDocument();

$doc-&gt;addField('id', 334455);
$doc-&gt;addField('cat', 'Software');
$doc-&gt;addField('cat', 'Lucene');

$respuestaActualización = $cliente-&gt;addDocument($doc);

?&gt;

    Resultado del ejemplo anterior es similar a:

### Ver también

    - [SolrClient::getOptions()](#solrclient.getoptions) - Devuelve las opciones de cliente establecidas internamente

# SolrClient::deleteById

(PECL solr &gt;= 0.9.2)

SolrClient::deleteById — Eliminar por Id

### Descripción

public **SolrClient::deleteById**([string](#language.types.string) $id): [SolrUpdateResponse](#class.solrupdateresponse)

Elimina el documento con el ID especificado, donde ID es el valor del campo uniqueKey declarado en el esquema.

### Parámetros

     id


       El valor del campo uniqueKey declarado en el esquema





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) en caso de éxito y lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Ver también

    - [SolrClient::deleteByIds()](#solrclient.deletebyids) - Elimina mediante Ids

    - [SolrClient::deleteByQuery()](#solrclient.deletebyquery) - Elimina todos los documentos que coincidan con la consulta dada

    - [SolrClient::deleteByQueries()](#solrclient.deletebyqueries) - Elimina todos los documentos que coincidan con cualquiera de las consultas

# SolrClient::deleteByIds

(PECL solr &gt;= 0.9.2)

SolrClient::deleteByIds — Elimina mediante Ids

### Descripción

public **SolrClient::deleteByIds**([array](#language.types.array) $ids): [SolrUpdateResponse](#class.solrupdateresponse)

Elimina una colección de documentos con el conjunto de ids especificado.

### Parámetros

     ids


       Una matriz de IDs que representa el campo uniqueKey declarado en el esquema para cada documento a ser eliminado. Debe ser una variable de PHP real.





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) en caso de éxito y lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Ver también

    - [SolrClient::deleteById()](#solrclient.deletebyid) - Eliminar por Id

    - [SolrClient::deleteByQuery()](#solrclient.deletebyquery) - Elimina todos los documentos que coincidan con la consulta dada

    - [SolrClient::deleteByQueries()](#solrclient.deletebyqueries) - Elimina todos los documentos que coincidan con cualquiera de las consultas

# SolrClient::deleteByQueries

(PECL solr &gt;= 0.9.2)

SolrClient::deleteByQueries — Elimina todos los documentos que coincidan con cualquiera de las consultas

### Descripción

public **SolrClient::deleteByQueries**([array](#language.types.array) $queries): [SolrUpdateResponse](#class.solrupdateresponse)

Elimina todos los documentos que coincidan con cualquiera de las consultas

### Parámetros

     queries


       La matriz de consultas. Debe ser una variable de php real.





### Valores devueltos

Devuelve un objeto SolrUpdateResponse en caso de éxito y lanza una SolrClientException en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Ver también

    - [SolrClient::deleteById()](#solrclient.deletebyid) - Eliminar por Id

    - [SolrClient::deleteByIds()](#solrclient.deletebyids) - Elimina mediante Ids

    - [SolrClient::deleteByQuery()](#solrclient.deletebyquery) - Elimina todos los documentos que coincidan con la consulta dada

# SolrClient::deleteByQuery

(PECL solr &gt;= 0.9.2)

SolrClient::deleteByQuery — Elimina todos los documentos que coincidan con la consulta dada

### Descripción

public **SolrClient::deleteByQuery**([string](#language.types.string) $query): [SolrUpdateResponse](#class.solrupdateresponse)

Elimina todos los documentos que coincidan con la consulta dada.

### Parámetros

     query


       La consulta





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) en caso de éxito y lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrQuery::deleteByQuery()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

//Esto borrará el índice por completo
$cliente-&gt;deleteByQuery("*:*");
$cliente-&gt;commit();

?&gt;

### Ver también

    - [SolrClient::deleteById()](#solrclient.deletebyid) - Eliminar por Id

    - [SolrClient::deleteByIds()](#solrclient.deletebyids) - Elimina mediante Ids

    - [SolrClient::deleteByQueries()](#solrclient.deletebyqueries) - Elimina todos los documentos que coincidan con cualquiera de las consultas

# SolrClient::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrClient::\_\_destruct — Destructor para SolrClient

### Descripción

public **SolrClient::\_\_destruct**()

Destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Destructor para SolrClient

### Ver también

    - [SolrClient::__construct()](#solrclient.construct) - Constructor para el objeto SolrClient

# SolrClient::getById

(PECL solr &gt;= 2.2.0)

SolrClient::getById — Devuelve un documento por su identificador. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)

### Descripción

public **SolrClient::getById**([string](#language.types.string) $id): [SolrQueryResponse](#class.solrqueryresponse)

    Devuelve un documento por su identificador. Utiliza la búsqueda en tiempo real de Solr.

### Parámetros

    id


      El identificador del documento.


### Valores devueltos

[SolrQueryResponse](#class.solrqueryresponse)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrClient::getById()**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_PATH
);

$client = new SolrClient($options);
$response = $client-&gt;getById('GB18030TEST');
print_r($response-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[doc] =&gt; SolrObject Object
(
[id] =&gt; GB18030TEST
[name] =&gt; Array
(
[0] =&gt; Test with some GB18030 encoded characters
)

            [features] =&gt; Array
                (
                    [0] =&gt; No accents here
                    [1] =&gt; 这是一个功能
                    [2] =&gt; This is a feature (translated)
                    [3] =&gt; 这份文件是很有光泽
                    [4] =&gt; This document is very shiny (translated)
                )

            [price] =&gt; Array
                (
                    [0] =&gt; 0
                )

            [inStock] =&gt; Array
                (
                    [0] =&gt; 1
                )

            [_version_] =&gt; 1510294336239042560
        )

)

### Ver también

- [SolrClient::getByIds()](#solrclient.getbyids) - Devuelve documentos por sus identificadores. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)

# SolrClient::getByIds

(PECL solr &gt;= 2.2.0)

SolrClient::getByIds — Devuelve documentos por sus identificadores. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)

### Descripción

public **SolrClient::getByIds**([array](#language.types.array) $ids): [SolrQueryResponse](#class.solrqueryresponse)

    Devuelve los documentos por sus identificadores. Utiliza la búsqueda en tiempo real de Solr.

### Parámetros

    ids


      Los identificadores de los documentos.


### Valores devueltos

[SolrQueryResponse](#class.solrqueryresponse)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrClient::getByIds()**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_PATH
);

$client = new SolrClient($options);
$response = $client-&gt;getByIds(['GB18030TEST', '6H500F0']);

print_r($response-&gt;getResponse());

?&gt;

Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[response] =&gt; SolrObject Object
(
[numFound] =&gt; 2
[start] =&gt; 0
[docs] =&gt; Array
(
[0] =&gt; SolrObject Object
(
[id] =&gt; GB18030TEST
[name] =&gt; Array
(
[0] =&gt; Test with some GB18030 encoded characters
)

                            [features] =&gt; Array
                                (
                                    [0] =&gt; No accents here
                                    [1] =&gt; 这是一个功能
                                    [2] =&gt; This is a feature (translated)
                                    [3] =&gt; 这份文件是很有光泽
                                    [4] =&gt; This document is very shiny (translated)
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 0
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [_version_] =&gt; 1510294336239042560
                        )

                    [1] =&gt; SolrObject Object
                        (
                            [id] =&gt; 6H500F0
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Maxtor DiamondMax 11 - hard drive - 500 GB - SATA-300
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Maxtor Corp.
                                )

                            [manu_id_s] =&gt; maxtor
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; hard drive
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; SATA 3.0Gb/s, NCQ
                                    [1] =&gt; 8.5ms seek
                                    [2] =&gt; 16MB cache
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 350
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 6
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 45.17614,-93.87341
                                )

                            [manufacturedate_dt] =&gt; 2006-02-13T15:26:37Z
                            [_version_] =&gt; 1510294336449806336
                        )

                )

        )

)

### Ver también

- [SolrClient::getById()](#solrclient.getbyid) - Devuelve un documento por su identificador. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)

# SolrClient::getDebug

(PECL solr &gt;= 0.9.7)

SolrClient::getDebug — Devuelve la información de depuración para el último intento de conexión

### Descripción

public **SolrClient::getDebug**(): [string](#language.types.string)

Devuelve la información de depuración para el último intento de conexión

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y null si no hay nada que devolver.

# SolrClient::getOptions

(PECL solr &gt;= 0.9.6)

SolrClient::getOptions — Devuelve las opciones de cliente establecidas internamente

### Descripción

public **SolrClient::getOptions**(): [array](#language.types.array)

Devuelve las opciones de cliente establecidas internamente. Muy útil para depurar. Los valores devueltos son de sólo lectura y sólo se pueden establecer cuando el objeto es instanciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene todas las opciones para el objeto SolrClient establecido internamente.

### Ver también

    - [SolrClient::__construct()](#solrclient.construct) - Constructor para el objeto SolrClient

# SolrClient::optimize

(PECL solr &gt;= 0.9.2)

SolrClient::optimize — Defragmenta el índice

### Descripción

public **SolrClient::optimize**([int](#language.types.integer) $maxSegments = 1, [bool](#language.types.boolean) $softCommit = **[true](#constant.true)**, [bool](#language.types.boolean) $waitSearcher = **[true](#constant.true)**): [SolrUpdateResponse](#class.solrupdateresponse)

Defragmenta el índice para un rendimiento de búsquda más rápido.

### Parámetros

     maxSegments


       Optimiza como máximo este número de segmentos. Desde Solr 1.3






     softCommit


       Refresca la 'vista' del índice para un mayor rendimiento, pero si sin garantizar "on-disk". (Solr4.0+)






     waitSearcher


       Bloqueo hasta que un nuevo buscador sea abierto y registrado como el buscador de consultas principal, haciendo los cambios visibles.





### Valores devueltos

Devuelve un objeto SolrUpdateResponse en caso de éxito y lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

### Notas

**Advertencia**

    Solr &gt;= 2.0 de PECL solamente soporta Solr Server &gt;= 4.0




    Antes de Solr 2.0 de PECL, este método solía aceptar estos argumentos: "int $maxSegments, bool $waitFlush, bool $waitSearcher".

### Ver también

    - [SolrClient::commit()](#solrclient.commit) - Finaliza todas las añadiduras/eliminaciones hechas al índice

    - [SolrClient::rollback()](#solrclient.rollback) - Revierte todos los añadidos/eliminados hechos en el índice desde el último envío

# SolrClient::ping

(PECL solr &gt;= 0.9.2)

SolrClient::ping — Comprueba si el servidor Solr está todavía activo

### Descripción

public **SolrClient::ping**(): [SolrPingResponse](#class.solrpingresponse)

Comprueba si el servidor Solr está todavía activo. Envía una petición HEAD al servidor Apache Solr.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [SolrPingResponse](#class.solrpingresponse) en caso de éxito y lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al satisfacer la petición.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::ping()**

&lt;?php
$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$client = new SolrClient($options);

$pingresponse = $client-&gt;ping();

?&gt;

    Resultado del ejemplo anterior es similar a:

# SolrClient::query

(PECL solr &gt;= 0.9.2)

SolrClient::query — Envía una consulta al servidor

### Descripción

public **SolrClient::query**([SolrParams](#class.solrparams) $query): [SolrQueryResponse](#class.solrqueryresponse)

Envía una consulta al servidor.

### Parámetros

     query


       Un objeto SolrParam. Se recomienda usar [SolrQuery](#class.solrquery) para consultas avanzadas.





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) en caso de éxito o lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al satisfacer la consulta.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::query()**

&lt;?php

$opciones = array
(
'hostname' =&gt; 'localhost',
'login' =&gt; 'username',
'password' =&gt; 'password',
'port' =&gt; '8983',
);

$cliente = new Solrç($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setQuery('lucene');

$consulta-&gt;setStart(0);

$consulta-&gt;setRows(50);

$consulta-&gt;addField('cat')-&gt;addField('features')-&gt;addField('id')-&gt;addField('timestamp');

$respuesta_consulta = $cliente-&gt;query($consulta);

$response = $respuesta_consulta-&gt;getResponse();

print_r($response);

?&gt;

    Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 3
[params] =&gt; SolrObject Object
(
[fl] =&gt; cat,features,id,timestamp
[indent] =&gt; on
[start] =&gt; 0
[q] =&gt; lucene
[wt] =&gt; xml
[version] =&gt; 2.2
[rows] =&gt; 50
)

        )

    [response] =&gt; SolrObject Object
        (
            [numFound] =&gt; 1
            [start] =&gt; 0
            [docs] =&gt; Array
                (
                    [0] =&gt; SolrObject Object
                        (
                            [id] =&gt; SOLR1000
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; software
                                    [1] =&gt; search
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; Advanced Full-Text Search Capabilities using Lucene
                                    [1] =&gt; Optimized for High Volume Web Traffic
                                    [2] =&gt; Standards Based Open Interfaces - XML and HTTP
                                    [3] =&gt; Comprehensive HTML Administration Interfaces
                                    [4] =&gt; Scalability - Efficient Replication to other Solr Search Servers
                                    [5] =&gt; Flexible and Adaptable with XML configuration and Schema
                                    [6] =&gt; Good unicode support: héllo (hello with an accent over the e)
                                )

                        )

                )

        )

)

# SolrClient::request

(PECL solr &gt;= 0.9.2)

SolrClient::request — Envía una petición de actualización sin formato

### Descripción

public **SolrClient::request**([string](#language.types.string) $raw_request): [SolrUpdateResponse](#class.solrupdateresponse)

Envía una petición de actualización XML sin formato al servidor

### Parámetros

     raw_request


       Una cadena XML con la solicitud sin formato al servidor.





### Valores devueltos

Devuelve un objeto [SolrUpdateResponse](#class.solrupdateresponse) en caso de éxito. Lanza una excepción en caso de error.

### Errores/Excepciones

Lanza una [SolrIllegalArgumentException](#class.solrillegalargumentexception) si raw_request es un string vacío.

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al satisfacer la consulta.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::request()**

&lt;?php
$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$respuesta_actualización = $cliente-&gt;request("&lt;commit/&gt;");

$respuesta = $respuesta_actualización-&gt;getResponse();

print_r($respuesta);
?&gt;

    Resultado del ejemplo anterior es similar a:

...

# SolrClient::rollback

(PECL solr &gt;= 0.9.2)

SolrClient::rollback — Revierte todos los añadidos/eliminados hechos en el índice desde el último envío

### Descripción

public **SolrClient::rollback**(): [SolrUpdateResponse](#class.solrupdateresponse)

Revierte todos los añadidos/eliminados hechos en el índice desde el último envío. No llama a ningún escuchador de eventos ni crea un buscador nuevo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto SolrUpdateResponse en caso de éxito o lanza una excepción SolrClientException en caso de fallo.

### Ver también

    - [SolrClient::commit()](#solrclient.commit) - Finaliza todas las añadiduras/eliminaciones hechas al índice

    - [SolrClient::optimize()](#solrclient.optimize) - Defragmenta el índice

# SolrClient::setResponseWriter

(PECL solr &gt;= 0.9.11)

SolrClient::setResponseWriter — Establece el autor de la respuesta usado para preparar la respuesta de Solr

### Descripción

public **SolrClient::setResponseWriter**([string](#language.types.string) $responseWriter): [void](language.types.void.html)

Establece el autor de la respuesta usado para preparar la respuesta de Solr

### Parámetros

     responseWriter

      Uno de los siguientes autores:



       - json

       - phps

       - xml




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrClient::setResponseWriter()**

&lt;?php

// Esta es mi clase personalizada para los objetos
class SolrClass
{
public $\_propiedades = array();

public function \_\_get($nombre_propiedad) {

      if (property_exists($this, $nombre_propiedad)) {

          return $this-&gt;$nombre_propiedad;

      } else if (isset($_propiedades[$nombre_propiedad])) {

          return $_propiedades[$nombre_propiedad];
      }

      return null;

}
}

$opciones = array
(
'hostname' =&gt; 'localhost',
'port' =&gt; 8983,
'path' =&gt; '/solr/core1'
);

$cliente = new SolrClient($opciones);

$cliente-&gt;setResponseWriter("json");

//$respuesta = $cliente-&gt;ping();

$consulta = new SolrQuery();

$consulta-&gt;setQuery("_:_");

$consulta-&gt;set("objectClassName", "SolrClass");

$consulta-&gt;set("objectPropertiesStorageMode", 1); // 0 para propiedades independientes, 1 para combinadas

try
{

$respuesta = $cliente-&gt;query($consulta);

$resp = $respuesta-&gt;getResponse();

print_r($respuesta);

print_r($resp);

} catch (Exception $e) {

print_r($e);

}

?&gt;

# SolrClient::setServlet

(PECL solr &gt;= 0.9.2)

SolrClient::setServlet — Cambia el servlet especificado a un nuevo valor

### Descripción

public **SolrClient::setServlet**([int](#language.types.integer) $type, [string](#language.types.string) $value): [bool](#language.types.boolean)

Cambia el servlet especificado a un nuevo valor

### Parámetros

     type

      Uno de los siguientes tipos:




- SolrClient::SEARCH_SERVLET_TYPE
- SolrClient::UPDATE_SERVLET_TYPE
- SolrClient::THREADS_SERVLET_TYPE
- SolrClient::PING_SERVLET_TYPE
- SolrClient::TERMS_SERVLET_TYPE

    value

    El nuevo valor para el servlet

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrClient::system

(PECL solr &gt;= 2.0.0)

SolrClient::system — Obtener información del Servidor Solr

### Descripción

public **SolrClient::system**(): [void](language.types.void.html)

Obtener información del Servidor Solr

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [SolrGenericResponse](#class.solrgenericresponse) en caso de éxito.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló, o si hubo un problema con la conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor Solr falló al satisfacer la consulta.

# SolrClient::threads

(PECL solr &gt;= 0.9.2)

SolrClient::threads — Verifica el estado de los hilos

### Descripción

public **SolrClient::threads**(): [void](language.types.void.html)

Verifica el estado de los hilos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto SolrGenericResponse.

### Errores/Excepciones

Lanza una [SolrClientException](#class.solrclientexception) si el cliente falló o hubo un problema de conexión.

Lanza una [SolrServerException](#class.solrserverexception) si el Servidor de Solr falló al procesar la petición.

## Tabla de contenidos

- [SolrClient::addDocument](#solrclient.adddocument) — Añade un documento al índice
- [SolrClient::addDocuments](#solrclient.adddocuments) — Añade una colección de instancias de SolrInputDocument al índice
- [SolrClient::commit](#solrclient.commit) — Finaliza todas las añadiduras/eliminaciones hechas al índice
- [SolrClient::\_\_construct](#solrclient.construct) — Constructor para el objeto SolrClient
- [SolrClient::deleteById](#solrclient.deletebyid) — Eliminar por Id
- [SolrClient::deleteByIds](#solrclient.deletebyids) — Elimina mediante Ids
- [SolrClient::deleteByQueries](#solrclient.deletebyqueries) — Elimina todos los documentos que coincidan con cualquiera de las consultas
- [SolrClient::deleteByQuery](#solrclient.deletebyquery) — Elimina todos los documentos que coincidan con la consulta dada
- [SolrClient::\_\_destruct](#solrclient.destruct) — Destructor para SolrClient
- [SolrClient::getById](#solrclient.getbyid) — Devuelve un documento por su identificador. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)
- [SolrClient::getByIds](#solrclient.getbyids) — Devuelve documentos por sus identificadores. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)
- [SolrClient::getDebug](#solrclient.getdebug) — Devuelve la información de depuración para el último intento de conexión
- [SolrClient::getOptions](#solrclient.getoptions) — Devuelve las opciones de cliente establecidas internamente
- [SolrClient::optimize](#solrclient.optimize) — Defragmenta el índice
- [SolrClient::ping](#solrclient.ping) — Comprueba si el servidor Solr está todavía activo
- [SolrClient::query](#solrclient.query) — Envía una consulta al servidor
- [SolrClient::request](#solrclient.request) — Envía una petición de actualización sin formato
- [SolrClient::rollback](#solrclient.rollback) — Revierte todos los añadidos/eliminados hechos en el índice desde el último envío
- [SolrClient::setResponseWriter](#solrclient.setresponsewriter) — Establece el autor de la respuesta usado para preparar la respuesta de Solr
- [SolrClient::setServlet](#solrclient.setservlet) — Cambia el servlet especificado a un nuevo valor
- [SolrClient::system](#solrclient.system) — Obtener información del Servidor Solr
- [SolrClient::threads](#solrclient.threads) — Verifica el estado de los hilos

# La clase SolrResponse

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una respuesta del servidor Solr.

## Sinopsis de la Clase

    ****




      abstract
      class **SolrResponse**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [PARSE_SOLR_OBJ](#solrresponse.constants.parse-solr-obj) = 0;

    const
     [int](#language.types.integer)
      [PARSE_SOLR_DOC](#solrresponse.constants.parse-solr-doc) = 1;


    /* Propiedades */
    protected
     [int](#language.types.integer)
      [$http_status](#solrresponse.props.http-status);

    protected
     [int](#language.types.integer)
      [$parser_mode](#solrresponse.props.parser-mode);

    protected
     [bool](#language.types.boolean)
      [$success](#solrresponse.props.success);

    protected
     [string](#language.types.string)
      [$http_status_message](#solrresponse.props.http-status-message);

    protected
     [string](#language.types.string)
      [$http_request_url](#solrresponse.props.http-request-url);

    protected
     [string](#language.types.string)
      [$http_raw_request_headers](#solrresponse.props.http-raw-request-headers);

    protected
     [string](#language.types.string)
      [$http_raw_request](#solrresponse.props.http-raw-request);

    protected
     [string](#language.types.string)
      [$http_raw_response_headers](#solrresponse.props.http-raw-response-headers);

    protected
     [string](#language.types.string)
      [$http_raw_response](#solrresponse.props.http-raw-response);

    protected
     [string](#language.types.string)
      [$http_digested_response](#solrresponse.props.http-digested-response);



    /* Métodos */

public [getDigestedResponse](#solrresponse.getdigestedresponse)(): [string](#language.types.string)
public [getHttpStatus](#solrresponse.gethttpstatus)(): [int](#language.types.integer)
public [getHttpStatusMessage](#solrresponse.gethttpstatusmessage)(): [string](#language.types.string)
public [getRawRequest](#solrresponse.getrawrequest)(): [string](#language.types.string)
public [getRawRequestHeaders](#solrresponse.getrawrequestheaders)(): [string](#language.types.string)
public [getRawResponse](#solrresponse.getrawresponse)(): [string](#language.types.string)
public [getRawResponseHeaders](#solrresponse.getrawresponseheaders)(): [string](#language.types.string)
public [getRequestUrl](#solrresponse.getrequesturl)(): [string](#language.types.string)
public [getResponse](#solrresponse.getresponse)(): [SolrObject](#class.solrobject)
public [setParseMode](#solrresponse.setparsemode)([int](#language.types.integer) $parser_mode = 0): [bool](#language.types.boolean)
public [success](#solrresponse.success)(): [bool](#language.types.boolean)

}

## Propiedades

     http_status

      El estado http de la resupuesta.





     parser_mode

      Modo de analizar los documentos, si como instancias de SolrObject o de SolrDocument.





     success

      ¿Ocurrió un error durante la solicitud?





     http_status_message

      Messaje detallado del estado http





     http_request_url

      La URL solicitada





     http_raw_request_headers

      Una cadena de cabeceras en bruto enviada durante la solicitud





     http_raw_request

      La solicitud en bruto enviada al servidor





     http_raw_response_headers

      Las cabeceras de resupuesta del servidor Solr





     http_raw_response

      El mensaje de respuesta del servidor





     http_digested_response

      La respuesta en formato serializado de PHP.




## Constantes predefinidas

    ## Constantes de la Clase SolrResponse




      **[SolrResponse::PARSE_SOLR_OBJ](#solrresponse.constants.parse-solr-obj)**

       Los documentos deberían ser analizados como instancias de SolrObject






      **[SolrResponse::PARSE_SOLR_DOC](#solrresponse.constants.parse-solr-doc)**

       Los documentos deberían ser analizados como instancias de SolrDocument.





# SolrResponse::getDigestedResponse

(PECL solr &gt;= 0.9.2)

SolrResponse::getDigestedResponse — Devuelve la respueste XML como información de PHP serializada

### Descripción

public **SolrResponse::getDigestedResponse**(): [string](#language.types.string)

Devuelve la respueste XML como información de PHP serializada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la respueste XML como información de PHP serializada

# SolrResponse::getHttpStatus

(PECL solr &gt;= 0.9.2)

SolrResponse::getHttpStatus — Devuelve el estado HTTP de la respuesta

### Descripción

public **SolrResponse::getHttpStatus**(): [int](#language.types.integer)

Devuelve el estado HTTP de la respuesta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el estado HTTP de la respuesta.

# SolrResponse::getHttpStatusMessage

(PECL solr &gt;= 0.9.2)

SolrResponse::getHttpStatusMessage — Devuelve más detalles del estado HTTP

### Descripción

public **SolrResponse::getHttpStatusMessage**(): [string](#language.types.string)

Devuelve más detalles del estado HTTP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve más detalles del estado HTTP

# SolrResponse::getRawRequest

(PECL solr &gt;= 0.9.2)

SolrResponse::getRawRequest — Devuelve la respuesta en bruto enviada al servidor Solr

### Descripción

public **SolrResponse::getRawRequest**(): [string](#language.types.string)

Devuelve la respuesta en bruto enviada al servidor Solr.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la respuesta en bruto enviada al servidor Solr

# SolrResponse::getRawRequestHeaders

(PECL solr &gt;= 0.9.2)

SolrResponse::getRawRequestHeaders — Devuelve las cabeceras de respuesta sin tratar enviadas al servidor Solr

### Descripción

public **SolrResponse::getRawRequestHeaders**(): [string](#language.types.string)

Devuelve las cabeceras de respuesta sin tratar enviadas al servidor Solr,

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las cabeceras de respuesta sin tratar enviadas al servidor Solr

# SolrResponse::getRawResponse

(PECL solr &gt;= 0.9.2)

SolrResponse::getRawResponse — Devuelve la respuesta sin tratar del servidor

### Descripción

public **SolrResponse::getRawResponse**(): [string](#language.types.string)

Devuelve la respuesta sin tratar del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la respuesta sin tratar del servidor.

# SolrResponse::getRawResponseHeaders

(PECL solr &gt;= 0.9.2)

SolrResponse::getRawResponseHeaders — Devuelve las cabeceras de respuesta sin tratar del servidor

### Descripción

public **SolrResponse::getRawResponseHeaders**(): [string](#language.types.string)

Devuelve las cabeceras de respuesta sin tratar del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las cabeceras de respuesta sin tratar del servidor.

# SolrResponse::getRequestUrl

(PECL solr &gt;= 0.9.2)

SolrResponse::getRequestUrl — Devuelve la URL completa a la que se envió la respuesta

### Descripción

public **SolrResponse::getRequestUrl**(): [string](#language.types.string)

Devuelve la URL completa a la que se envió la respuesta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la URL completa a la que se envió la respuesta

# SolrResponse::getResponse

(PECL solr &gt;= 0.9.2)

SolrResponse::getResponse — Devuelve un objeto SolrObject que representa la respuesta XML del servidor

### Descripción

public **SolrResponse::getResponse**(): [SolrObject](#class.solrobject)

Devuelve un objeto SolrObject que representa la respuesta XML del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto SolrObject que representa la respuesta XML del servidor

# SolrResponse::setParseMode

(PECL solr &gt;= 0.9.2)

SolrResponse::setParseMode — Establece el modo de análisis

### Descripción

public **SolrResponse::setParseMode**([int](#language.types.integer) $parser_mode = 0): [bool](#language.types.boolean)

Establece el modo de análisis.

### Parámetros

     parser_mode


       SolrResponse::PARSE_SOLR_DOC analiza los documentos en instancias de SolrDocument. SolrResponse::PARSE_SOLR_OBJ convierte un documento a un objeto SolrObjects.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# SolrResponse::success

(PECL solr &gt;= 0.9.2)

SolrResponse::success — ¿Tuvo éxito la petición?

### Descripción

public **SolrResponse::success**(): [bool](#language.types.boolean)

Se usa para verificar si la petición al servidor tuvo éxito.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si se tuvo éxito y **[false](#constant.false)** si no lo tuvo.

## Tabla de contenidos

- [SolrResponse::getDigestedResponse](#solrresponse.getdigestedresponse) — Devuelve la respueste XML como información de PHP serializada
- [SolrResponse::getHttpStatus](#solrresponse.gethttpstatus) — Devuelve el estado HTTP de la respuesta
- [SolrResponse::getHttpStatusMessage](#solrresponse.gethttpstatusmessage) — Devuelve más detalles del estado HTTP
- [SolrResponse::getRawRequest](#solrresponse.getrawrequest) — Devuelve la respuesta en bruto enviada al servidor Solr
- [SolrResponse::getRawRequestHeaders](#solrresponse.getrawrequestheaders) — Devuelve las cabeceras de respuesta sin tratar enviadas al servidor Solr
- [SolrResponse::getRawResponse](#solrresponse.getrawresponse) — Devuelve la respuesta sin tratar del servidor
- [SolrResponse::getRawResponseHeaders](#solrresponse.getrawresponseheaders) — Devuelve las cabeceras de respuesta sin tratar del servidor
- [SolrResponse::getRequestUrl](#solrresponse.getrequesturl) — Devuelve la URL completa a la que se envió la respuesta
- [SolrResponse::getResponse](#solrresponse.getresponse) — Devuelve un objeto SolrObject que representa la respuesta XML del servidor
- [SolrResponse::setParseMode](#solrresponse.setparsemode) — Establece el modo de análisis
- [SolrResponse::success](#solrresponse.success) — ¿Tuvo éxito la petición?

# La clase SolrQueryResponse

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una respuesta a una solicitud de consulta.

## Sinopsis de la Clase

    ****




      final
      class **SolrQueryResponse**



      extends
       [SolrResponse](#class.solrresponse)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [PARSE_SOLR_OBJ](#solrqueryresponse.constants.parse-solr-obj) = 0;

    const
     [int](#language.types.integer)
      [PARSE_SOLR_DOC](#solrqueryresponse.constants.parse-solr-doc) = 1;


    /* Propiedades heredadas */
    const
     [int](#language.types.integer)
      [SolrResponse::PARSE_SOLR_OBJ](#solrresponse.constants.parse-solr-obj) = 0;

const
[int](#language.types.integer)
[SolrResponse::PARSE_SOLR_DOC](#solrresponse.constants.parse-solr-doc) = 1;
protected
[int](#language.types.integer)
[$http_status](#solrresponse.props.http-status);
protected
[int](#language.types.integer)
[$parser_mode](#solrresponse.props.parser-mode);
protected
[bool](#language.types.boolean)
[$success](#solrresponse.props.success);
protected
[string](#language.types.string)
[$http_status_message](#solrresponse.props.http-status-message);
protected
[string](#language.types.string)
[$http_request_url](#solrresponse.props.http-request-url);
protected
[string](#language.types.string)
[$http_raw_request_headers](#solrresponse.props.http-raw-request-headers);
protected
[string](#language.types.string)
[$http_raw_request](#solrresponse.props.http-raw-request);
protected
[string](#language.types.string)
[$http_raw_response_headers](#solrresponse.props.http-raw-response-headers);
protected
[string](#language.types.string)
[$http_raw_response](#solrresponse.props.http-raw-response);
protected
[string](#language.types.string)
[$http_digested_response](#solrresponse.props.http-digested-response);

    /* Métodos */

public [\_\_construct](#solrqueryresponse.construct)()

    public [__destruct](#solrqueryresponse.destruct)()


    /* Métodos heredados */
    public [SolrResponse::getDigestedResponse](#solrresponse.getdigestedresponse)(): [string](#language.types.string)

public [SolrResponse::getHttpStatus](#solrresponse.gethttpstatus)(): [int](#language.types.integer)
public [SolrResponse::getHttpStatusMessage](#solrresponse.gethttpstatusmessage)(): [string](#language.types.string)
public [SolrResponse::getRawRequest](#solrresponse.getrawrequest)(): [string](#language.types.string)
public [SolrResponse::getRawRequestHeaders](#solrresponse.getrawrequestheaders)(): [string](#language.types.string)
public [SolrResponse::getRawResponse](#solrresponse.getrawresponse)(): [string](#language.types.string)
public [SolrResponse::getRawResponseHeaders](#solrresponse.getrawresponseheaders)(): [string](#language.types.string)
public [SolrResponse::getRequestUrl](#solrresponse.getrequesturl)(): [string](#language.types.string)
public [SolrResponse::getResponse](#solrresponse.getresponse)(): [SolrObject](#class.solrobject)
public [SolrResponse::setParseMode](#solrresponse.setparsemode)([int](#language.types.integer) $parser_mode = 0): [bool](#language.types.boolean)
public [SolrResponse::success](#solrresponse.success)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## Constantes de la Clase SolrQueryResponse




      **[SolrQueryResponse::PARSE_SOLR_OBJ](#solrqueryresponse.constants.parse-solr-obj)**

       Los documentos deberían ser analizados como instancias de SolrObject






      **[SolrQueryResponse::PARSE_SOLR_DOC](#solrqueryresponse.constants.parse-solr-doc)**

       Los documentos deberían ser analizados como instancias de SolrDocument.





# SolrQueryResponse::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrQueryResponse::\_\_construct — Constructor

### Descripción

public **SolrQueryResponse::\_\_construct**()

Constructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

# SolrQueryResponse::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrQueryResponse::\_\_destruct — Destructor

### Descripción

public **SolrQueryResponse::\_\_destruct**()

Destructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

## Tabla de contenidos

- [SolrQueryResponse::\_\_construct](#solrqueryresponse.construct) — Constructor
- [SolrQueryResponse::\_\_destruct](#solrqueryresponse.destruct) — Destructor

# La clase SolrUpdateResponse

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una respuesta de una solicitud de actualización.

## Sinopsis de la Clase

    ****




      final
      class **SolrUpdateResponse**



      extends
       [SolrResponse](#class.solrresponse)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [PARSE_SOLR_OBJ](#solrupdateresponse.constants.parse-solr-obj) = 0;

    const
     [int](#language.types.integer)
      [PARSE_SOLR_DOC](#solrupdateresponse.constants.parse-solr-doc) = 1;


    /* Propiedades heredadas */
    const
     [int](#language.types.integer)
      [SolrResponse::PARSE_SOLR_OBJ](#solrresponse.constants.parse-solr-obj) = 0;

const
[int](#language.types.integer)
[SolrResponse::PARSE_SOLR_DOC](#solrresponse.constants.parse-solr-doc) = 1;
protected
[int](#language.types.integer)
[$http_status](#solrresponse.props.http-status);
protected
[int](#language.types.integer)
[$parser_mode](#solrresponse.props.parser-mode);
protected
[bool](#language.types.boolean)
[$success](#solrresponse.props.success);
protected
[string](#language.types.string)
[$http_status_message](#solrresponse.props.http-status-message);
protected
[string](#language.types.string)
[$http_request_url](#solrresponse.props.http-request-url);
protected
[string](#language.types.string)
[$http_raw_request_headers](#solrresponse.props.http-raw-request-headers);
protected
[string](#language.types.string)
[$http_raw_request](#solrresponse.props.http-raw-request);
protected
[string](#language.types.string)
[$http_raw_response_headers](#solrresponse.props.http-raw-response-headers);
protected
[string](#language.types.string)
[$http_raw_response](#solrresponse.props.http-raw-response);
protected
[string](#language.types.string)
[$http_digested_response](#solrresponse.props.http-digested-response);

    /* Métodos */

public [\_\_construct](#solrupdateresponse.construct)()

    public [__destruct](#solrupdateresponse.destruct)()


    /* Métodos heredados */
    public [SolrResponse::getDigestedResponse](#solrresponse.getdigestedresponse)(): [string](#language.types.string)

public [SolrResponse::getHttpStatus](#solrresponse.gethttpstatus)(): [int](#language.types.integer)
public [SolrResponse::getHttpStatusMessage](#solrresponse.gethttpstatusmessage)(): [string](#language.types.string)
public [SolrResponse::getRawRequest](#solrresponse.getrawrequest)(): [string](#language.types.string)
public [SolrResponse::getRawRequestHeaders](#solrresponse.getrawrequestheaders)(): [string](#language.types.string)
public [SolrResponse::getRawResponse](#solrresponse.getrawresponse)(): [string](#language.types.string)
public [SolrResponse::getRawResponseHeaders](#solrresponse.getrawresponseheaders)(): [string](#language.types.string)
public [SolrResponse::getRequestUrl](#solrresponse.getrequesturl)(): [string](#language.types.string)
public [SolrResponse::getResponse](#solrresponse.getresponse)(): [SolrObject](#class.solrobject)
public [SolrResponse::setParseMode](#solrresponse.setparsemode)([int](#language.types.integer) $parser_mode = 0): [bool](#language.types.boolean)
public [SolrResponse::success](#solrresponse.success)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## Constantes de la Clase SolrUpdateResponse




      **[SolrUpdateResponse::PARSE_SOLR_OBJ](#solrupdateresponse.constants.parse-solr-obj)**

       Los documentos deberían ser analizados como instancias de SolrObject






      **[SolrUpdateResponse::PARSE_SOLR_DOC](#solrupdateresponse.constants.parse-solr-doc)**

       Los documentos deberían ser analizados como instancias de SolrDocument.





# SolrUpdateResponse::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrUpdateResponse::\_\_construct — Constructor

### Descripción

public **SolrUpdateResponse::\_\_construct**()

Constructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

# SolrUpdateResponse::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrUpdateResponse::\_\_destruct — Destructor

### Descripción

public **SolrUpdateResponse::\_\_destruct**()

Destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

## Tabla de contenidos

- [SolrUpdateResponse::\_\_construct](#solrupdateresponse.construct) — Constructor
- [SolrUpdateResponse::\_\_destruct](#solrupdateresponse.destruct) — Destructor

# La clase SolrPingResponse

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una respuesta a una petición ping al servidor

## Sinopsis de la Clase

    ****




      final
      class **SolrPingResponse**



      extends
       [SolrResponse](#class.solrresponse)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [PARSE_SOLR_OBJ](#solrpingresponse.constants.parse-solr-obj) = 0;

    const
     [int](#language.types.integer)
      [PARSE_SOLR_DOC](#solrpingresponse.constants.parse-solr-doc) = 1;


    /* Propiedades */


    /* Métodos */

public [\_\_construct](#solrpingresponse.construct)()

    public [getResponse](#solrpingresponse.getresponse)(): [string](#language.types.string)

    public [__destruct](#solrpingresponse.destruct)()


    /* Métodos heredados */
    public [SolrResponse::getDigestedResponse](#solrresponse.getdigestedresponse)(): [string](#language.types.string)

public [SolrResponse::getHttpStatus](#solrresponse.gethttpstatus)(): [int](#language.types.integer)
public [SolrResponse::getHttpStatusMessage](#solrresponse.gethttpstatusmessage)(): [string](#language.types.string)
public [SolrResponse::getRawRequest](#solrresponse.getrawrequest)(): [string](#language.types.string)
public [SolrResponse::getRawRequestHeaders](#solrresponse.getrawrequestheaders)(): [string](#language.types.string)
public [SolrResponse::getRawResponse](#solrresponse.getrawresponse)(): [string](#language.types.string)
public [SolrResponse::getRawResponseHeaders](#solrresponse.getrawresponseheaders)(): [string](#language.types.string)
public [SolrResponse::getRequestUrl](#solrresponse.getrequesturl)(): [string](#language.types.string)
public [SolrResponse::getResponse](#solrresponse.getresponse)(): [SolrObject](#class.solrobject)
public [SolrResponse::setParseMode](#solrresponse.setparsemode)([int](#language.types.integer) $parser_mode = 0): [bool](#language.types.boolean)
public [SolrResponse::success](#solrresponse.success)(): [bool](#language.types.boolean)

}

## Propiedades

     http_status

      El estado http de la resupuesta.





     parser_mode

      Modo de analizar los documentos, si como instancias de SolrObject o de SolrDocument.





     success

      ¿Ocurrió un error durante la solicitud?





     http_status_message

      Messaje detallado del estado http





     http_request_url

      La URL solicitada





     http_raw_request_headers

      Una cadena de cabeceras en bruto enviada durante la solicitud





     http_raw_request

      La solicitud en bruto enviada al servidor





     http_raw_response_headers

      Las cabeceras de resupuesta del servidor Solr





     http_raw_response

      El mensaje de respuesta del servidor





     http_digested_response

      La respuesta en formato serializado de PHP.




## Constantes predefinidas

    ## Constantes de la Clase SolrPingResponse




      **[SolrPingResponse::PARSE_SOLR_OBJ](#solrpingresponse.constants.parse-solr-obj)**

       Los documentos deberían ser analizados como instancias de SolrObject






      **[SolrPingResponse::PARSE_SOLR_DOC](#solrpingresponse.constants.parse-solr-doc)**

       Los documentos deberían ser analizados como instancias de SolrDocument.





# SolrPingResponse::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrPingResponse::\_\_construct — Constructor

### Descripción

public **SolrPingResponse::\_\_construct**()

Constructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

# SolrPingResponse::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrPingResponse::\_\_destruct — Destructor

### Descripción

public **SolrPingResponse::\_\_destruct**()

Destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

# SolrPingResponse::getResponse

(PECL solr &gt;= 0.9.2)

SolrPingResponse::getResponse — Devuelve la respuesta del servidor

### Descripción

public **SolrPingResponse::getResponse**(): [string](#language.types.string)

Devuelve la respuesta del servidor. Esto debería estar vacío ya que la petición es una petición HEAD.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena vacía.

## Tabla de contenidos

- [SolrPingResponse::\_\_construct](#solrpingresponse.construct) — Constructor
- [SolrPingResponse::\_\_destruct](#solrpingresponse.destruct) — Destructor
- [SolrPingResponse::getResponse](#solrpingresponse.getresponse) — Devuelve la respuesta del servidor

# La clase SolrGenericResponse

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una respuesta del servidor Solr.

## Sinopsis de la Clase

    ****




      final
      class **SolrGenericResponse**



      extends
       [SolrResponse](#class.solrresponse)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [PARSE_SOLR_OBJ](#solrgenericresponse.constants.parse-solr-obj) = 0;

    const
     [int](#language.types.integer)
      [PARSE_SOLR_DOC](#solrgenericresponse.constants.parse-solr-doc) = 1;


    /* Propiedades heredadas */
    const
     [int](#language.types.integer)
      [SolrResponse::PARSE_SOLR_OBJ](#solrresponse.constants.parse-solr-obj) = 0;

const
[int](#language.types.integer)
[SolrResponse::PARSE_SOLR_DOC](#solrresponse.constants.parse-solr-doc) = 1;
protected
[int](#language.types.integer)
[$http_status](#solrresponse.props.http-status);
protected
[int](#language.types.integer)
[$parser_mode](#solrresponse.props.parser-mode);
protected
[bool](#language.types.boolean)
[$success](#solrresponse.props.success);
protected
[string](#language.types.string)
[$http_status_message](#solrresponse.props.http-status-message);
protected
[string](#language.types.string)
[$http_request_url](#solrresponse.props.http-request-url);
protected
[string](#language.types.string)
[$http_raw_request_headers](#solrresponse.props.http-raw-request-headers);
protected
[string](#language.types.string)
[$http_raw_request](#solrresponse.props.http-raw-request);
protected
[string](#language.types.string)
[$http_raw_response_headers](#solrresponse.props.http-raw-response-headers);
protected
[string](#language.types.string)
[$http_raw_response](#solrresponse.props.http-raw-response);
protected
[string](#language.types.string)
[$http_digested_response](#solrresponse.props.http-digested-response);

    /* Métodos */

public [\_\_construct](#solrgenericresponse.construct)()

    public [__destruct](#solrgenericresponse.destruct)()


    /* Métodos heredados */
    public [SolrResponse::getDigestedResponse](#solrresponse.getdigestedresponse)(): [string](#language.types.string)

public [SolrResponse::getHttpStatus](#solrresponse.gethttpstatus)(): [int](#language.types.integer)
public [SolrResponse::getHttpStatusMessage](#solrresponse.gethttpstatusmessage)(): [string](#language.types.string)
public [SolrResponse::getRawRequest](#solrresponse.getrawrequest)(): [string](#language.types.string)
public [SolrResponse::getRawRequestHeaders](#solrresponse.getrawrequestheaders)(): [string](#language.types.string)
public [SolrResponse::getRawResponse](#solrresponse.getrawresponse)(): [string](#language.types.string)
public [SolrResponse::getRawResponseHeaders](#solrresponse.getrawresponseheaders)(): [string](#language.types.string)
public [SolrResponse::getRequestUrl](#solrresponse.getrequesturl)(): [string](#language.types.string)
public [SolrResponse::getResponse](#solrresponse.getresponse)(): [SolrObject](#class.solrobject)
public [SolrResponse::setParseMode](#solrresponse.setparsemode)([int](#language.types.integer) $parser_mode = 0): [bool](#language.types.boolean)
public [SolrResponse::success](#solrresponse.success)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## Constantes de la Clase SolrGenericResponse




      **[SolrGenericResponse::PARSE_SOLR_OBJ](#solrgenericresponse.constants.parse-solr-obj)**

       Los documentos deberían ser analizados como instancias de SolrObject






      **[SolrGenericResponse::PARSE_SOLR_DOC](#solrgenericresponse.constants.parse-solr-doc)**

       Los documentos deberían ser analizados como instancias de SolrDocument.





# SolrGenericResponse::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrGenericResponse::\_\_construct — Constructor

### Descripción

public **SolrGenericResponse::\_\_construct**()

Constructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

# SolrGenericResponse::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrGenericResponse::\_\_destruct — Destructor

### Descripción

public **SolrGenericResponse::\_\_destruct**()

Destructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

## Tabla de contenidos

- [SolrGenericResponse::\_\_construct](#solrgenericresponse.construct) — Constructor
- [SolrGenericResponse::\_\_destruct](#solrgenericresponse.destruct) — Destructor

# La clase SolrParams

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una colección de pares nombre-valor enviado al servidor Solr durante una petición.

## Sinopsis de la Clase

    ****




      abstract
      class **SolrParams**


     implements
       [Serializable](#class.serializable) {



    /* Métodos */

final public [add](#solrparams.add)([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)
public [addParam](#solrparams.addparam)([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)
final public [get](#solrparams.get)([string](#language.types.string) $param_name): [mixed](#language.types.mixed)
final public [getParam](#solrparams.getparam)([string](#language.types.string) $param_name = ?): [mixed](#language.types.mixed)
final public [getParams](#solrparams.getparams)(): [array](#language.types.array)
final public [getPreparedParams](#solrparams.getpreparedparams)(): [array](#language.types.array)
final public [serialize](#solrparams.serialize)(): [string](#language.types.string)
final public [set](#solrparams.set)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [setParam](#solrparams.setparam)([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)
final public [toString](#solrparams.tostring)([bool](#language.types.boolean) $url_encode = **[false](#constant.false)**): [string](#language.types.string)
final public [unserialize](#solrparams.unserialize)([string](#language.types.string) $serialized): [void](language.types.void.html)

}

# SolrParams::add

(PECL solr &gt;= 0.9.2)

SolrParams::add — Alias de [SolrParams::addParam()](#solrparams.addparam)

### Descripción

final public **SolrParams::add**([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)

Esto es un alias de SolrParams::addParam

### Parámetros

     name


       El nombre del parámetro






     value


      El valor del parámetro





### Valores devueltos

Devuelve una instancia de SolrParams en caso de éxito

# SolrParams::addParam

(PECL solr &gt;= 0.9.2)

SolrParams::addParam — Añade un parámetro al objeto

### Descripción

public **SolrParams::addParam**([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)

Añade un parámetro al objeto. Se usa para parámetros que pueden ser especificados múltiples veces.

### Parámetros

     name


       Nombre del parámetro






     value


       alor del parámetro





### Valores devueltos

Devuelve un objeto SolrParam an caso de éxito y **[false](#constant.false)** en caso de error.

# SolrParams::get

(PECL solr &gt;= 0.9.2)

SolrParams::get — Alias de [SolrParams::getParam()](#solrparams.getparam)

### Descripción

final public **SolrParams::get**([string](#language.types.string) $param_name): [mixed](#language.types.mixed)

Este es una alias de SolrParams::getParam

### Parámetros

     param_name


       El nombre del parámetro





### Valores devueltos

Devuelve una matriz o una cadena, dependiendo del tipo de parámetro

# SolrParams::getParam

(PECL solr &gt;= 0.9.2)

SolrParams::getParam — Devuelve el valor de un parámetro

### Descripción

final public **SolrParams::getParam**([string](#language.types.string) $param_name = ?): [mixed](#language.types.mixed)

Devuelve el valor de un parámetro.

### Parámetros

     param_name


       Nombre del parámetro.





### Valores devueltos

Devuelve un [string](#language.types.string) o un array según el tipo del parámetro.

# SolrParams::getParams

(PECL solr &gt;= 0.9.2)

SolrParams::getParams — Devuelve una matriz de parámetros URL no codificados

### Descripción

final public **SolrParams::getParams**(): [array](#language.types.array)

Devuelve una matriz de parámetros URL no codificados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz de parámetros URL no codificados

# SolrParams::getPreparedParams

(PECL solr &gt;= 0.9.2)

SolrParams::getPreparedParams — Devuelve una matriz de parámetros URL codificados

### Descripción

final public **SolrParams::getPreparedParams**(): [array](#language.types.array)

Devuelve una matriz de parámetros URL codificados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz de parámetros URL codificados

# SolrParams::serialize

(PECL solr &gt;= 0.9.2)

SolrParams::serialize — Usado para serialización personalizada

### Descripción

final public **SolrParams::serialize**(): [string](#language.types.string)

Usado para serialización personalizada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Usado para serialización personalizada

# SolrParams::set

(PECL solr &gt;= 0.9.2)

SolrParams::set — Alias de [SolrParams::setParam()](#solrparams.setparam)

### Descripción

final public **SolrParams::set**([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

Un alas de SolrParams::setParam

### Parámetros

     name


       El nombre del parámetro






     value


       El valor del parámatro





### Valores devueltos

Devuelve una instancia del objeto SolrParams en caso de éxito

# SolrParams::setParam

(PECL solr &gt;= 0.9.2)

SolrParams::setParam — Establece el parámetro al valor especificado

### Descripción

public **SolrParams::setParam**([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)

Establece el parámetro de consulta al valor especificado. Es usado para parámetros que sólo pueden ser especificados una vez. Subsiguientes llamadas con el mismo parámetro sobrescribirá el valor existente.

### Parámetros

     name


       Nomvre del parámetro






     value


       Valor del parámetro





### Valores devueltos

Devuelve un objeto SolrParam en caso de éxito y **[false](#constant.false)** sobre el valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrParams::setParam()**

&lt;?php

$parámetro = new SolrParams();

$parámetro-&gt;setParam('q', 'solr')-&gt;setParam('rows', 2);

?&gt;

    Resultado del ejemplo anterior es similar a:

# SolrParams::toString

(PECL solr &gt;= 0.9.2)

SolrParams::toString — Devuelve todos los parámetros de los pares nombre-valor del objeto

### Descripción

final public **SolrParams::toString**([bool](#language.types.boolean) $url_encode = **[false](#constant.false)**): [string](#language.types.string)

Devuelve todos los parámetros de los pares nombre-valor del objeto.

### Parámetros

     url_encode


       Si devolver o no valores de URL codificados





### Valores devueltos

Devuelve un string en caso de éxito y **[false](#constant.false)** en caso de fallo.

# SolrParams::unserialize

(PECL solr &gt;= 0.9.2)

SolrParams::unserialize — Usado para serialización personalizada

### Descripción

final public **SolrParams::unserialize**([string](#language.types.string) $serialized): [void](language.types.void.html)

Usado para serialización personalizada

### Parámetros

     serialized


      La representación serializada del objeto





### Valores devueltos

Nada

## Tabla de contenidos

- [SolrParams::add](#solrparams.add) — Alias de SolrParams::addParam
- [SolrParams::addParam](#solrparams.addparam) — Añade un parámetro al objeto
- [SolrParams::get](#solrparams.get) — Alias de SolrParams::getParam
- [SolrParams::getParam](#solrparams.getparam) — Devuelve el valor de un parámetro
- [SolrParams::getParams](#solrparams.getparams) — Devuelve una matriz de parámetros URL no codificados
- [SolrParams::getPreparedParams](#solrparams.getpreparedparams) — Devuelve una matriz de parámetros URL codificados
- [SolrParams::serialize](#solrparams.serialize) — Usado para serialización personalizada
- [SolrParams::set](#solrparams.set) — Alias de SolrParams::setParam
- [SolrParams::setParam](#solrparams.setparam) — Establece el parámetro al valor especificado
- [SolrParams::toString](#solrparams.tostring) — Devuelve todos los parámetros de los pares nombre-valor del objeto
- [SolrParams::unserialize](#solrparams.unserialize) — Usado para serialización personalizada

# La clase SolrModifiableParams

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una colección de pares nombre-valore enviados al servidor Solr durante una petición.

## Sinopsis de la Clase

    ****




      class **SolrModifiableParams**



      extends
       [SolrParams](#class.solrparams)


     implements
       [Serializable](#class.serializable) {


    /* Métodos */

public [\_\_construct](#solrmodifiableparams.construct)()

    public [__destruct](#solrmodifiableparams.destruct)()


    /* Métodos heredados */
    final public [SolrParams::add](#solrparams.add)([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)

public [SolrParams::addParam](#solrparams.addparam)([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)
final public [SolrParams::get](#solrparams.get)([string](#language.types.string) $param_name): [mixed](#language.types.mixed)
final public [SolrParams::getParam](#solrparams.getparam)([string](#language.types.string) $param_name = ?): [mixed](#language.types.mixed)
final public [SolrParams::getParams](#solrparams.getparams)(): [array](#language.types.array)
final public [SolrParams::getPreparedParams](#solrparams.getpreparedparams)(): [array](#language.types.array)
final public [SolrParams::serialize](#solrparams.serialize)(): [string](#language.types.string)
final public [SolrParams::set](#solrparams.set)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [SolrParams::setParam](#solrparams.setparam)([string](#language.types.string) $name, [string](#language.types.string) $value): [SolrParams](#class.solrparams)
final public [SolrParams::toString](#solrparams.tostring)([bool](#language.types.boolean) $url_encode = **[false](#constant.false)**): [string](#language.types.string)
final public [SolrParams::unserialize](#solrparams.unserialize)([string](#language.types.string) $serialized): [void](language.types.void.html)

}

# SolrModifiableParams::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrModifiableParams::\_\_construct — Constructor

### Descripción

public **SolrModifiableParams::\_\_construct**()

Constructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

# SolrModifiableParams::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrModifiableParams::\_\_destruct — Destructor

### Descripción

public **SolrModifiableParams::\_\_destruct**()

Destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada

## Tabla de contenidos

- [SolrModifiableParams::\_\_construct](#solrmodifiableparams.construct) — Constructor
- [SolrModifiableParams::\_\_destruct](#solrmodifiableparams.destruct) — Destructor

# La clase SolrQuery

(PECL solr &gt;= 0.9.2)

## Introducción

    Representa una colección de pares nombre-valor enviados al servidor Solr durante una petición.

## Sinopsis de la Clase

    ****




      class **SolrQuery**



      extends
       [SolrModifiableParams](#class.solrmodifiableparams)


     implements
       [Serializable](#class.serializable) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [ORDER_ASC](#solrquery.constants.order-asc) = 0;

    const
     [int](#language.types.integer)
      [ORDER_DESC](#solrquery.constants.order-desc) = 1;

    const
     [int](#language.types.integer)
      [FACET_SORT_INDEX](#solrquery.constants.facet-sort-index) = 0;

    const
     [int](#language.types.integer)
      [FACET_SORT_COUNT](#solrquery.constants.facet-sort-count) = 1;

    const
     [int](#language.types.integer)
      [TERMS_SORT_INDEX](#solrquery.constants.terms-sort-index) = 0;

    const
     [int](#language.types.integer)
      [TERMS_SORT_COUNT](#solrquery.constants.terms-sort-count) = 1;


    /* Propiedades */


    /* Métodos */

public [\_\_construct](#solrquery.construct)([string](#language.types.string) $q = ?)

    public [addExpandFilterQuery](#solrquery.addexpandfilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)

public [addExpandSortField](#solrquery.addexpandsortfield)([string](#language.types.string) $field, [string](#language.types.string) $order = ?): [SolrQuery](#class.solrquery)
public [addFacetDateField](#solrquery.addfacetdatefield)([string](#language.types.string) $dateField): [SolrQuery](#class.solrquery)
public [addFacetDateOther](#solrquery.addfacetdateother)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [addFacetField](#solrquery.addfacetfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [addFacetQuery](#solrquery.addfacetquery)([string](#language.types.string) $facetQuery): [SolrQuery](#class.solrquery)
public [addField](#solrquery.addfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [addFilterQuery](#solrquery.addfilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)
public [addGroupField](#solrquery.addgroupfield)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [addGroupFunction](#solrquery.addgroupfunction)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [addGroupQuery](#solrquery.addgroupquery)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [addGroupSortField](#solrquery.addgroupsortfield)([string](#language.types.string) $field, [int](#language.types.integer) $order = ?): [SolrQuery](#class.solrquery)
public [addHighlightField](#solrquery.addhighlightfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [addMltField](#solrquery.addmltfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [addMltQueryField](#solrquery.addmltqueryfield)([string](#language.types.string) $field, [float](#language.types.float) $boost): [SolrQuery](#class.solrquery)
public [addSortField](#solrquery.addsortfield)([string](#language.types.string) $field, [int](#language.types.integer) $order = SolrQuery::ORDER_DESC): [SolrQuery](#class.solrquery)
public [addStatsFacet](#solrquery.addstatsfacet)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [addStatsField](#solrquery.addstatsfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [collapse](#solrquery.collapse)([SolrCollapseFunction](#class.solrcollapsefunction) $collapseFunction): [SolrQuery](#class.solrquery)
public [getExpand](#solrquery.getexpand)(): [bool](#language.types.boolean)
public [getExpandFilterQueries](#solrquery.getexpandfilterqueries)(): [array](#language.types.array)
public [getExpandQuery](#solrquery.getexpandquery)(): [array](#language.types.array)
public [getExpandRows](#solrquery.getexpandrows)(): [int](#language.types.integer)
public [getExpandSortFields](#solrquery.getexpandsortfields)(): [array](#language.types.array)
public [getFacet](#solrquery.getfacet)(): [bool](#language.types.boolean)
public [getFacetDateEnd](#solrquery.getfacetdateend)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getFacetDateFields](#solrquery.getfacetdatefields)(): [array](#language.types.array)
public [getFacetDateGap](#solrquery.getfacetdategap)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getFacetDateHardEnd](#solrquery.getfacetdatehardend)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getFacetDateOther](#solrquery.getfacetdateother)([string](#language.types.string) $field_override = ?): [array](#language.types.array)
public [getFacetDateStart](#solrquery.getfacetdatestart)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getFacetFields](#solrquery.getfacetfields)(): [array](#language.types.array)
public [getFacetLimit](#solrquery.getfacetlimit)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getFacetMethod](#solrquery.getfacetmethod)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getFacetMinCount](#solrquery.getfacetmincount)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getFacetMissing](#solrquery.getfacetmissing)([string](#language.types.string) $field_override = ?): [bool](#language.types.boolean)
public [getFacetOffset](#solrquery.getfacetoffset)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getFacetPrefix](#solrquery.getfacetprefix)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getFacetQueries](#solrquery.getfacetqueries)(): [array](#language.types.array)
public [getFacetSort](#solrquery.getfacetsort)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getFields](#solrquery.getfields)(): [array](#language.types.array)
public [getFilterQueries](#solrquery.getfilterqueries)(): [array](#language.types.array)
public [getGroup](#solrquery.getgroup)(): [bool](#language.types.boolean)
public [getGroupCachePercent](#solrquery.getgroupcachepercent)(): [int](#language.types.integer)
public [getGroupFacet](#solrquery.getgroupfacet)(): [bool](#language.types.boolean)
public [getGroupFields](#solrquery.getgroupfields)(): [array](#language.types.array)
public [getGroupFormat](#solrquery.getgroupformat)(): [string](#language.types.string)
public [getGroupFunctions](#solrquery.getgroupfunctions)(): [array](#language.types.array)
public [getGroupLimit](#solrquery.getgrouplimit)(): [int](#language.types.integer)
public [getGroupMain](#solrquery.getgroupmain)(): [bool](#language.types.boolean)
public [getGroupNGroups](#solrquery.getgroupngroups)(): [bool](#language.types.boolean)
public [getGroupOffset](#solrquery.getgroupoffset)(): [int](#language.types.integer)
public [getGroupQueries](#solrquery.getgroupqueries)(): [array](#language.types.array)
public [getGroupSortFields](#solrquery.getgroupsortfields)(): [array](#language.types.array)
public [getGroupTruncate](#solrquery.getgrouptruncate)(): [bool](#language.types.boolean)
public [getHighlight](#solrquery.gethighlight)(): [bool](#language.types.boolean)
public [getHighlightAlternateField](#solrquery.gethighlightalternatefield)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getHighlightFields](#solrquery.gethighlightfields)(): [array](#language.types.array)
public [getHighlightFormatter](#solrquery.gethighlightformatter)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getHighlightFragmenter](#solrquery.gethighlightfragmenter)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getHighlightFragsize](#solrquery.gethighlightfragsize)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getHighlightHighlightMultiTerm](#solrquery.gethighlighthighlightmultiterm)(): [bool](#language.types.boolean)
public [getHighlightMaxAlternateFieldLength](#solrquery.gethighlightmaxalternatefieldlength)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getHighlightMaxAnalyzedChars](#solrquery.gethighlightmaxanalyzedchars)(): [int](#language.types.integer)
public [getHighlightMergeContiguous](#solrquery.gethighlightmergecontiguous)([string](#language.types.string) $field_override = ?): [bool](#language.types.boolean)
public [getHighlightQuery](#solrquery.gethighlightquery)(): [string](#language.types.string)
public [getHighlightRegexMaxAnalyzedChars](#solrquery.gethighlightregexmaxanalyzedchars)(): [int](#language.types.integer)
public [getHighlightRegexPattern](#solrquery.gethighlightregexpattern)(): [string](#language.types.string)
public [getHighlightRegexSlop](#solrquery.gethighlightregexslop)(): [float](#language.types.float)
public [getHighlightRequireFieldMatch](#solrquery.gethighlightrequirefieldmatch)(): [bool](#language.types.boolean)
public [getHighlightSimplePost](#solrquery.gethighlightsimplepost)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getHighlightSimplePre](#solrquery.gethighlightsimplepre)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [getHighlightSnippets](#solrquery.gethighlightsnippets)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [getHighlightUsePhraseHighlighter](#solrquery.gethighlightusephrasehighlighter)(): [bool](#language.types.boolean)
public [getMlt](#solrquery.getmlt)(): [bool](#language.types.boolean)
public [getMltBoost](#solrquery.getmltboost)(): [bool](#language.types.boolean)
public [getMltCount](#solrquery.getmltcount)(): [int](#language.types.integer)
public [getMltFields](#solrquery.getmltfields)(): [array](#language.types.array)
public [getMltMaxNumQueryTerms](#solrquery.getmltmaxnumqueryterms)(): [int](#language.types.integer)
public [getMltMaxNumTokens](#solrquery.getmltmaxnumtokens)(): [int](#language.types.integer)
public [getMltMaxWordLength](#solrquery.getmltmaxwordlength)(): [int](#language.types.integer)
public [getMltMinDocFrequency](#solrquery.getmltmindocfrequency)(): [int](#language.types.integer)
public [getMltMinTermFrequency](#solrquery.getmltmintermfrequency)(): [int](#language.types.integer)
public [getMltMinWordLength](#solrquery.getmltminwordlength)(): [int](#language.types.integer)
public [getMltQueryFields](#solrquery.getmltqueryfields)(): [array](#language.types.array)
public [getQuery](#solrquery.getquery)(): [string](#language.types.string)
public [getRows](#solrquery.getrows)(): [int](#language.types.integer)
public [getSortFields](#solrquery.getsortfields)(): [array](#language.types.array)
public [getStart](#solrquery.getstart)(): [int](#language.types.integer)
public [getStats](#solrquery.getstats)(): [bool](#language.types.boolean)
public [getStatsFacets](#solrquery.getstatsfacets)(): [array](#language.types.array)
public [getStatsFields](#solrquery.getstatsfields)(): [array](#language.types.array)
public [getTerms](#solrquery.getterms)(): [bool](#language.types.boolean)
public [getTermsField](#solrquery.gettermsfield)(): [string](#language.types.string)
public [getTermsIncludeLowerBound](#solrquery.gettermsincludelowerbound)(): [bool](#language.types.boolean)
public [getTermsIncludeUpperBound](#solrquery.gettermsincludeupperbound)(): [bool](#language.types.boolean)
public [getTermsLimit](#solrquery.gettermslimit)(): [int](#language.types.integer)
public [getTermsLowerBound](#solrquery.gettermslowerbound)(): [string](#language.types.string)
public [getTermsMaxCount](#solrquery.gettermsmaxcount)(): [int](#language.types.integer)
public [getTermsMinCount](#solrquery.gettermsmincount)(): [int](#language.types.integer)
public [getTermsPrefix](#solrquery.gettermsprefix)(): [string](#language.types.string)
public [getTermsReturnRaw](#solrquery.gettermsreturnraw)(): [bool](#language.types.boolean)
public [getTermsSort](#solrquery.gettermssort)(): [int](#language.types.integer)
public [getTermsUpperBound](#solrquery.gettermsupperbound)(): [string](#language.types.string)
public [getTimeAllowed](#solrquery.gettimeallowed)(): [int](#language.types.integer)
public [removeExpandFilterQuery](#solrquery.removeexpandfilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)
public [removeExpandSortField](#solrquery.removeexpandsortfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeFacetDateField](#solrquery.removefacetdatefield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeFacetDateOther](#solrquery.removefacetdateother)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [removeFacetField](#solrquery.removefacetfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeFacetQuery](#solrquery.removefacetquery)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [removeField](#solrquery.removefield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeFilterQuery](#solrquery.removefilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)
public [removeHighlightField](#solrquery.removehighlightfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeMltField](#solrquery.removemltfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeMltQueryField](#solrquery.removemltqueryfield)([string](#language.types.string) $queryField): [SolrQuery](#class.solrquery)
public [removeSortField](#solrquery.removesortfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [removeStatsFacet](#solrquery.removestatsfacet)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [removeStatsField](#solrquery.removestatsfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [setEchoHandler](#solrquery.setechohandler)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setEchoParams](#solrquery.setechoparams)([string](#language.types.string) $type): [SolrQuery](#class.solrquery)
public [setExpand](#solrquery.setexpand)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [setExpandQuery](#solrquery.setexpandquery)([string](#language.types.string) $q): [SolrQuery](#class.solrquery)
public [setExpandRows](#solrquery.setexpandrows)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [setExplainOther](#solrquery.setexplainother)([string](#language.types.string) $query): [SolrQuery](#class.solrquery)
public [setFacet](#solrquery.setfacet)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setFacetDateEnd](#solrquery.setfacetdateend)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetDateGap](#solrquery.setfacetdategap)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetDateHardEnd](#solrquery.setfacetdatehardend)([bool](#language.types.boolean) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetDateStart](#solrquery.setfacetdatestart)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetEnumCacheMinDefaultFrequency](#solrquery.setfacetenumcachemindefaultfrequency)([int](#language.types.integer) $frequency, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetLimit](#solrquery.setfacetlimit)([int](#language.types.integer) $limit, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetMethod](#solrquery.setfacetmethod)([string](#language.types.string) $method, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetMinCount](#solrquery.setfacetmincount)([int](#language.types.integer) $mincount, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetMissing](#solrquery.setfacetmissing)([bool](#language.types.boolean) $flag, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetOffset](#solrquery.setfacetoffset)([int](#language.types.integer) $offset, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetPrefix](#solrquery.setfacetprefix)([string](#language.types.string) $prefix, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setFacetSort](#solrquery.setfacetsort)([int](#language.types.integer) $facetSort, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setGroup](#solrquery.setgroup)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [setGroupCachePercent](#solrquery.setgroupcachepercent)([int](#language.types.integer) $percent): [SolrQuery](#class.solrquery)
public [setGroupFacet](#solrquery.setgroupfacet)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [setGroupFormat](#solrquery.setgroupformat)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [setGroupLimit](#solrquery.setgrouplimit)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [setGroupMain](#solrquery.setgroupmain)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [setGroupNGroups](#solrquery.setgroupngroups)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [setGroupOffset](#solrquery.setgroupoffset)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [setGroupTruncate](#solrquery.setgrouptruncate)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [setHighlight](#solrquery.sethighlight)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setHighlightAlternateField](#solrquery.sethighlightalternatefield)([string](#language.types.string) $field, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightFormatter](#solrquery.sethighlightformatter)([string](#language.types.string) $formatter, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightFragmenter](#solrquery.sethighlightfragmenter)([string](#language.types.string) $fragmenter, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightFragsize](#solrquery.sethighlightfragsize)([int](#language.types.integer) $size, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightHighlightMultiTerm](#solrquery.sethighlighthighlightmultiterm)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setHighlightMaxAlternateFieldLength](#solrquery.sethighlightmaxalternatefieldlength)([int](#language.types.integer) $fieldLength, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightMaxAnalyzedChars](#solrquery.sethighlightmaxanalyzedchars)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [setHighlightMergeContiguous](#solrquery.sethighlightmergecontiguous)([bool](#language.types.boolean) $flag, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightQuery](#solrquery.sethighlightquery)([string](#language.types.string) $q): [SolrQuery](#class.solrquery)
public [setHighlightRegexMaxAnalyzedChars](#solrquery.sethighlightregexmaxanalyzedchars)([int](#language.types.integer) $maxAnalyzedChars): [SolrQuery](#class.solrquery)
public [setHighlightRegexPattern](#solrquery.sethighlightregexpattern)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [setHighlightRegexSlop](#solrquery.sethighlightregexslop)([float](#language.types.float) $factor): [SolrQuery](#class.solrquery)
public [setHighlightRequireFieldMatch](#solrquery.sethighlightrequirefieldmatch)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setHighlightSimplePost](#solrquery.sethighlightsimplepost)([string](#language.types.string) $simplePost, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightSimplePre](#solrquery.sethighlightsimplepre)([string](#language.types.string) $simplePre, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightSnippets](#solrquery.sethighlightsnippets)([int](#language.types.integer) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [setHighlightUsePhraseHighlighter](#solrquery.sethighlightusephrasehighlighter)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setMlt](#solrquery.setmlt)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setMltBoost](#solrquery.setmltboost)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setMltCount](#solrquery.setmltcount)([int](#language.types.integer) $count): [SolrQuery](#class.solrquery)
public [setMltMaxNumQueryTerms](#solrquery.setmltmaxnumqueryterms)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [setMltMaxNumTokens](#solrquery.setmltmaxnumtokens)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [setMltMaxWordLength](#solrquery.setmltmaxwordlength)([int](#language.types.integer) $maxWordLength): [SolrQuery](#class.solrquery)
public [setMltMinDocFrequency](#solrquery.setmltmindocfrequency)([int](#language.types.integer) $minDocFrequency): [SolrQuery](#class.solrquery)
public [setMltMinTermFrequency](#solrquery.setmltmintermfrequency)([int](#language.types.integer) $minTermFrequency): [SolrQuery](#class.solrquery)
public [setMltMinWordLength](#solrquery.setmltminwordlength)([int](#language.types.integer) $minWordLength): [SolrQuery](#class.solrquery)
public [setOmitHeader](#solrquery.setomitheader)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setQuery](#solrquery.setquery)([string](#language.types.string) $query): [SolrQuery](#class.solrquery)
public [setRows](#solrquery.setrows)([int](#language.types.integer) $rows): [SolrQuery](#class.solrquery)
public [setShowDebugInfo](#solrquery.setshowdebuginfo)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setStart](#solrquery.setstart)([int](#language.types.integer) $start): [SolrQuery](#class.solrquery)
public [setStats](#solrquery.setstats)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setTerms](#solrquery.setterms)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setTermsField](#solrquery.settermsfield)([string](#language.types.string) $fieldname): [SolrQuery](#class.solrquery)
public [setTermsIncludeLowerBound](#solrquery.settermsincludelowerbound)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setTermsIncludeUpperBound](#solrquery.settermsincludeupperbound)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setTermsLimit](#solrquery.settermslimit)([int](#language.types.integer) $limit): [SolrQuery](#class.solrquery)
public [setTermsLowerBound](#solrquery.settermslowerbound)([string](#language.types.string) $lowerBound): [SolrQuery](#class.solrquery)
public [setTermsMaxCount](#solrquery.settermsmaxcount)([int](#language.types.integer) $frequency): [SolrQuery](#class.solrquery)
public [setTermsMinCount](#solrquery.settermsmincount)([int](#language.types.integer) $frequency): [SolrQuery](#class.solrquery)
public [setTermsPrefix](#solrquery.settermsprefix)([string](#language.types.string) $prefix): [SolrQuery](#class.solrquery)
public [setTermsReturnRaw](#solrquery.settermsreturnraw)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [setTermsSort](#solrquery.settermssort)([int](#language.types.integer) $sortType): [SolrQuery](#class.solrquery)
public [setTermsUpperBound](#solrquery.settermsupperbound)([string](#language.types.string) $upperBound): [SolrQuery](#class.solrquery)
public [setTimeAllowed](#solrquery.settimeallowed)([int](#language.types.integer) $timeAllowed): [SolrQuery](#class.solrquery)

    public [__destruct](#solrquery.destruct)()


    /* Métodos heredados */
    public [SolrModifiableParams::__construct](#solrmodifiableparams.construct)()

    public [SolrModifiableParams::__destruct](#solrmodifiableparams.destruct)()

}

## Constantes predefinidas

     **[SolrQuery::ORDER_ASC](#solrquery.constants.order-asc)**

      Se usa para especificar la forma de ordenación debería se ascendente






     **[SolrQuery::ORDER_DESC](#solrquery.constants.order-desc)**

      Se usa para especificar la forma de ordenación debería se descendente






     **[SolrQuery::FACET_SORT_INDEX](#solrquery.constants.facet-sort-index)**

      Se usa para especificar que la faceta debería ordenarse según el índice






     **[SolrQuery::FACET_SORT_COUNT](#solrquery.constants.facet-sort-count)**

      Se usa para especificar que la faceta debería ordenarse según la cuenta






     **[SolrQuery::TERMS_SORT_INDEX](#solrquery.constants.terms-sort-index)**

      Usado en TermsComponent






     **[SolrQuery::TERMS_SORT_COUNT](#solrquery.constants.terms-sort-count)**

      Usado en TermsComponent




# SolrQuery::addExpandFilterQuery

(PECL solr &gt;= 2.2.0)

SolrQuery::addExpandFilterQuery — Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

### Descripción

public **SolrQuery::addExpandFilterQuery**([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)

    Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal.

### Parámetros

    fq





### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setExpand()](#solrquery.setexpand) - Activa/desactiva el componente Expand

- [SolrQuery::addExpandSortField()](#solrquery.addexpandsortfield) - Ordena los documentos en los grupos extendidos (parámetro expand.sort)

- [SolrQuery::removeExpandSortField()](#solrquery.removeexpandsortfield) - Elimina un campo de ordenación de expansión del parámetro expand.sort

- [SolrQuery::setExpandRows()](#solrquery.setexpandrows) - Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

- [SolrQuery::setExpandQuery()](#solrquery.setexpandquery) - Define el parámetro expand.q

- [SolrQuery::removeExpandFilterQuery()](#solrquery.removeexpandfilterquery) - Elimina una consulta de filtro de extensión

# SolrQuery::addExpandSortField

(PECL solr &gt;= 2.2.0)

SolrQuery::addExpandSortField — Ordena los documentos en los grupos extendidos (parámetro expand.sort)

### Descripción

public **SolrQuery::addExpandSortField**([string](#language.types.string) $field, [string](#language.types.string) $order = ?): [SolrQuery](#class.solrquery)

    Ordena los documentos en los grupos extendidos (parámetro expand.sort).

### Parámetros

    field


      El nombre del campo






    order


      Orden ASC/DESC, utiliza las constantes SolrQuery::ORDER_*.




         Valor por omisión: SolrQuery::ORDER_DESC


### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setExpand()](#solrquery.setexpand) - Activa/desactiva el componente Expand

- [SolrQuery::removeExpandSortField()](#solrquery.removeexpandsortfield) - Elimina un campo de ordenación de expansión del parámetro expand.sort

- [SolrQuery::setExpandRows()](#solrquery.setexpandrows) - Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

- [SolrQuery::setExpandQuery()](#solrquery.setexpandquery) - Define el parámetro expand.q

- [SolrQuery::addExpandFilterQuery()](#solrquery.addexpandfilterquery) - Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

- [SolrQuery::removeExpandFilterQuery()](#solrquery.removeexpandfilterquery) - Elimina una consulta de filtro de extensión

# SolrQuery::addFacetDateField

(PECL solr &gt;= 0.9.2)

SolrQuery::addFacetDateField — Mapea a facet.date

### Descripción

public **SolrQuery::addFacetDateField**([string](#language.types.string) $dateField): [SolrQuery](#class.solrquery)

Este método permite especificar un campo que debería ser tratado como una faceta.

Se puede usar mútiples veces con diferentes nombres de campos para indicar mútiples campos de facetas

### Parámetros

     dateField


       El nombre del campo de fecha.





### Valores devueltos

Devuelve un objeto SolrQuery.

# SolrQuery::addFacetDateOther

(PECL solr &gt;= 0.9.2)

SolrQuery::addFacetDateOther — Añade otro parámetro facet.date.other

### Descripción

public **SolrQuery::addFacetDateOther**([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece el parámetro facet.date.other. Acepta la sobrescritura opcional de campos

### Parámetros

     value


       El valor a usar.






     field_override


       El nombre del campo para la sobrescritura.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

# SolrQuery::addFacetField

(PECL solr &gt;= 0.9.2)

SolrQuery::addFacetField — Añade otro campo a la faceta

### Descripción

public **SolrQuery::addFacetField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Añade otro campo a la faceta

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrQuery::addFacetField()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setQuery($consulta);

$consulta-&gt;addField('price')-&gt;addField('color');

$consulta-&gt;setFacet(true);

$consulta-&gt;addFacetField('price')-&gt;addFacetField('color');

$respuesta_consulta = $cliente-&gt;query($consulta);

$respuesta = $respuesta_consulta-&gt;getResponse();

print_r($respuesta['facet_counts']['facet_fields']);

?&gt;

    Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[color] =&gt; SolrObject Object
(
[blue] =&gt; 20
[green] =&gt; 100
)

)

# SolrQuery::addFacetQuery

(PECL solr &gt;= 0.9.2)

SolrQuery::addFacetQuery — Añade una consulta de faceta

### Descripción

public **SolrQuery::addFacetQuery**([string](#language.types.string) $facetQuery): [SolrQuery](#class.solrquery)

Añade una consulta de faceta

### Parámetros

     facetQuery


       La consulta de faceta





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

### Ejemplos

    **Ejemplo #1 Ejemplo de [SolrQuery::addFacetField()](#solrquery.addfacetfield)**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery('_:_');

$consulta-&gt;setFacet(true);

$consulta-&gt;addFacetQuery('price:[* TO 500]')-&gt;addFacetQuery('price:[500 TO *]');

$respuesta_consulta = $cliente-&gt;query($consulta);

$respuesta = $respuesta_consulta-&gt;getResponse();

print_r($respuesta-&gt;facet_counts-&gt;facet_queries);

?&gt;

    Resultado del ejemplo anterior es similar a:

SolrObject Object
(
[price:[* TO 500]] =&gt; 14
[price:[500 TO *]] =&gt; 2
)

# SolrQuery::addField

(PECL solr &gt;= 0.9.2)

SolrQuery::addField — Especifica qué campos devolver en el resultado

### Descripción

public **SolrQuery::addField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Este método se usa para especificar un conjunto de campos a devolver, restingiendo así la cantidad de información en la respuesta.

Puede ser llamado múltiples veces, una por cada nombre de campo.

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual

# SolrQuery::addFilterQuery

(PECL solr &gt;= 0.9.2)

SolrQuery::addFilterQuery — Especifica una consulta de filtro

### Descripción

public **SolrQuery::addFilterQuery**([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)

Especifica una consulta de filtro

### Parámetros

     fq


       La consulta de filtro





### Valores devueltos

Devuelve el objeto SolrQuery actual.

### Ejemplos

    **Ejemplo #1 Ejemplo de SolrQuery::addFilterQuery()**

&lt;?php

$opciones = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
);

$cliente = new SolrClient($opciones);

$consulta = new SolrQuery();

$consulta-&gt;setQuery('_:_');

$consulta-&gt;addFilterQuery('color:blue,green');

$respuesta_consulta = $cliente-&gt;query($consulta);

$respuesta = $respuesta_consulta-&gt;getResponse();

print_r($respuesta['facet_counts']['facet_fields']);

?&gt;

    Resultado del ejemplo anterior es similar a:

&amp;fq=color:blue,green

# SolrQuery::addGroupField

(PECL solr &gt;= 2.2.0)

SolrQuery::addGroupField — Añade un campo a utilizar para agrupar los resultados

### Descripción

public **SolrQuery::addGroupField**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

    El nombre del campo por el cual agrupar los resultados. El campo debe ser de valor único, y estar
    indexado o ser un tipo de campo que tenga una fuente de valor y funcione en una consulta de función,
    tal como ExternalFileField. Asimismo, debe ser un campo basado en string, tal como StrField o TextField.
    Utiliza el parámetro group.field.

### Parámetros

    value


      El nombre del campo.


### Valores devueltos

Devuelve una instancia de [SolrQuery](#class.solrquery).

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::addGroupFunction

(PECL solr &gt;= 2.2.0)

SolrQuery::addGroupFunction — Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

### Descripción

public **SolrQuery::addGroupFunction**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

     Añade una función de grupo (argumento group.func)
     Permite agrupar los resultados según los valores únicos de una consulta de función.

### Parámetros

    value





### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::addGroupQuery

(PECL solr &gt;= 2.2.0)

SolrQuery::addGroupQuery — Permite agrupar los documentos que coinciden con la consulta dada

### Descripción

public **SolrQuery::addGroupQuery**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

    Permite agrupar los documentos que coinciden con la consulta dada.
    Añade la consulta al parámetro group.query

### Parámetros

    value





### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::addGroupSortField

(PECL solr &gt;= 2.2.0)

SolrQuery::addGroupSortField — Añade un campo de ordenación de grupo (argumento group.sort)

### Descripción

public **SolrQuery::addGroupSortField**([string](#language.types.string) $field, [int](#language.types.integer) $order = ?): [SolrQuery](#class.solrquery)

    Permite ordenar los documentos de grupo, utilizando el campo de ordenación de grupo (argumento group.sort).

### Parámetros

    field


      El nombre del campo






    order


      Orden ASC/DESC, utiliza las constantes SolrQuery::ORDER_*.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de SolrQuery::addGroupSortField()**

&lt;?php

$solrQuery = new SolrQuery('*:*');
$solrQuery
-&gt;setGroup(true)
-&gt;addGroupSortField('price', SolrQuery::ORDER_ASC);

echo $solrQuery;
?&gt;

Resultado del ejemplo anterior es similar a:

q=_:_&amp;group=true&amp;group.sort=price asc

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::addHighlightField

(PECL solr &gt;= 0.9.2)

SolrQuery::addHighlightField — Mapea a hl.fl

### Descripción

public **SolrQuery::addHighlightField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Mapea a hl.fl. Se usa para especificar que los trozos resaltados deberían ser generados para un campo en particular

### Parámetros

     field


       Nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

# SolrQuery::addMltField

(PECL solr &gt;= 0.9.2)

SolrQuery::addMltField — Establece un campo para usarlo para similitud

### Descripción

public **SolrQuery::addMltField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Mapea a mlt.fl. Especifica que un campo debería ser usado para similitud.

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

# SolrQuery::addMltQueryField

(PECL solr &gt;= 0.9.2)

SolrQuery::addMltQueryField — Mapea a mlt.qf

### Descripción

public **SolrQuery::addMltQueryField**([string](#language.types.string) $field, [float](#language.types.float) $boost): [SolrQuery](#class.solrquery)

Mapea a mlt.qf. Se usa para especificar campos de consultas y sus boosts

### Parámetros

     field


       El nombre del campo






     boost


       Su valor boost





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

# SolrQuery::addSortField

(PECL solr &gt;= 0.9.2)

SolrQuery::addSortField — Usado para controlar cómo deberían ordenarse los resultados

### Descripción

public **SolrQuery::addSortField**([string](#language.types.string) $field, [int](#language.types.integer) $order = SolrQuery::ORDER_DESC): [SolrQuery](#class.solrquery)

Usado para controlar cómo deberían ordenarse los resultados.

### Parámetros

     field


       El nombre del campo






     order


       La dirección de ordenación. Debería ser SolrQuery::ORDER_ASC o SolrQuery::ORDER_DESC.





### Valores devueltos

Devuelve el objeto SolrQuery actual.

# SolrQuery::addStatsFacet

(PECL solr &gt;= 0.9.2)

SolrQuery::addStatsFacet — Recupera una devolución de subresultados para valores dentro de la faceta dada

### Descripción

public **SolrQuery::addStatsFacet**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Recupera una devolución de subresultados para valores dentro de la faceta dada. Mapea al campo stats.facet

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

# SolrQuery::addStatsField

(PECL solr &gt;= 0.9.2)

SolrQuery::addStatsField — Mapea al parámetro stats.field

### Descripción

public **SolrQuery::addStatsField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Mapea al parámetro stats.field. Este método añade otro parámetro stats.field.

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usa el valor de retorno.

# SolrQuery::collapse

(No version information available, might only be in Git)

SolrQuery::collapse — Reduce el resultado a un solo documento por grupo

### Descripción

public **SolrQuery::collapse**([SolrCollapseFunction](#class.solrcollapsefunction) $collapseFunction): [SolrQuery](#class.solrquery)

     Reduce el resultado a un solo documento por grupo antes de transmitirlo
     a los demás componentes de búsqueda.




     De esta manera, todos los componentes posteriores (faceteo, resaltado, etc...)
     funcionarán con el resultado reducido.

### Parámetros

     collapseFunction








### Valores devueltos

Devuelve el objeto [SolrQuery](#class.solrquery) actual

### Ejemplos

**Ejemplo #1 Ejemplo de SolrQuery::collapse()**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_PATH
);

$client = new SolrClient($options);

$query = new SolrQuery('_:_');

$collapseFunction = new SolrCollapseFunction('manu_id_s');

$collapseFunction
-&gt;setSize(2)
-&gt;setNullPolicy(SolrCollapseFunction::NULLPOLICY_IGNORE);

$query
-&gt;collapse($collapseFunction)
-&gt;setRows(4);

$queryResponse = $client-&gt;query($query);

$response = $queryResponse-&gt;getResponse();

print_r($response);

?&gt;

Resultado del ejemplo anterior es similar a:

            SolrObject Object

(
[responseHeader] =&gt; SolrObject Object
(
[status] =&gt; 0
[QTime] =&gt; 1
[params] =&gt; SolrObject Object
(
[q] =&gt; _:_
[indent] =&gt; on
[fq] =&gt; {!collapse field=manu_id_s size=2 nullPolicy=ignore}
[rows] =&gt; 4
[version] =&gt; 2.2
[wt] =&gt; xml
)

        )

    [response] =&gt; SolrObject Object
        (
            [numFound] =&gt; 14
            [start] =&gt; 0
            [docs] =&gt; Array
                (
                    [0] =&gt; SolrObject Object
                        (
                            [id] =&gt; SP2514N
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Samsung SpinPoint P120 SP2514N - hard drive - 250 GB - ATA-133
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Samsung Electronics Co. Ltd.
                                )

                            [manu_id_s] =&gt; samsung
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; hard drive
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; 7200RPM, 8MB cache, IDE Ultra ATA-133
                                    [1] =&gt; NoiseGuard, SilentSeek technology, Fluid Dynamic Bearing (FDB) motor
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 92
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 6
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [manufacturedate_dt] =&gt; 2006-02-13T15:26:37Z
                            [store] =&gt; Array
                                (
                                    [0] =&gt; 35.0752,-97.032
                                )

                            [_version_] =&gt; 1510294336412057600
                        )

                    [1] =&gt; SolrObject Object
                        (
                            [id] =&gt; 6H500F0
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Maxtor DiamondMax 11 - hard drive - 500 GB - SATA-300
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Maxtor Corp.
                                )

                            [manu_id_s] =&gt; maxtor
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; hard drive
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; SATA 3.0Gb/s, NCQ
                                    [1] =&gt; 8.5ms seek
                                    [2] =&gt; 16MB cache
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 350
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 6
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 45.17614,-93.87341
                                )

                            [manufacturedate_dt] =&gt; 2006-02-13T15:26:37Z
                            [_version_] =&gt; 1510294336449806336
                        )

                    [2] =&gt; SolrObject Object
                        (
                            [id] =&gt; F8V7067-APL-KIT
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Belkin Mobile Power Cord for iPod w/ Dock
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Belkin
                                )

                            [manu_id_s] =&gt; belkin
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; connector
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; car power adapter, white
                                )

                            [weight] =&gt; Array
                                (
                                    [0] =&gt; 4
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 19.95
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt;
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 45.18014,-93.87741
                                )

                            [manufacturedate_dt] =&gt; 2005-08-01T16:30:25Z
                            [_version_] =&gt; 1510294336458194944
                        )

                    [3] =&gt; SolrObject Object
                        (
                            [id] =&gt; MA147LL/A
                            [name] =&gt; Array
                                (
                                    [0] =&gt; Apple 60 GB iPod with Video Playback Black
                                )

                            [manu] =&gt; Array
                                (
                                    [0] =&gt; Apple Computer Inc.
                                )

                            [manu_id_s] =&gt; apple
                            [cat] =&gt; Array
                                (
                                    [0] =&gt; electronics
                                    [1] =&gt; music
                                )

                            [features] =&gt; Array
                                (
                                    [0] =&gt; iTunes, Podcasts, Audiobooks
                                    [1] =&gt; Stores up to 15,000 songs, 25,000 photos, or 150 hours of video
                                    [2] =&gt; 2.5-inch, 320x240 color TFT LCD display with LED backlight
                                    [3] =&gt; Up to 20 hours of battery life
                                    [4] =&gt; Plays AAC, MP3, WAV, AIFF, Audible, Apple Lossless, H.264 video
                                    [5] =&gt; Notes, Calendar, Phone book, Hold button, Date display, Photo wallet, Built-in games, JPEG photo playback, Upgradeable firmware, USB 2.0 compatibility, Playback speed control, Rechargeable capability, Battery level indication
                                )

                            [includes] =&gt; Array
                                (
                                    [0] =&gt; earbud headphones, USB cable
                                )

                            [weight] =&gt; Array
                                (
                                    [0] =&gt; 5.5
                                )

                            [price] =&gt; Array
                                (
                                    [0] =&gt; 399
                                )

                            [popularity] =&gt; Array
                                (
                                    [0] =&gt; 10
                                )

                            [inStock] =&gt; Array
                                (
                                    [0] =&gt; 1
                                )

                            [store] =&gt; Array
                                (
                                    [0] =&gt; 37.7752,-100.0232
                                )

                            [manufacturedate_dt] =&gt; 2005-10-12T08:00:00Z
                            [_version_] =&gt; 1510294336562003968
                        )

                )

        )

)

# SolrQuery::\_\_construct

(PECL solr &gt;= 0.9.2)

SolrQuery::\_\_construct — Constructor

### Descripción

public **SolrQuery::\_\_construct**([string](#language.types.string) $q = ?)

Constructor.

### Parámetros

     q


       Consulta de búsqueda opcional





### Valores devueltos

Ninguno.

### Errores/Excepciones

Emite una [SolrIllegalArgumentException](#class.solrillegalargumentexception) en caso de proporcionar un parámetro no válido.

### Historial de cambios

       Versión
       Descripción






       PECL solr 2.0.0

        Si q fuera inválido, se lanza una
        [SolrIllegalArgumentException](#class.solrillegalargumentexception). Anteriormente se emitía un error.





# SolrQuery::\_\_destruct

(PECL solr &gt;= 0.9.2)

SolrQuery::\_\_destruct — Destructor

### Descripción

public **SolrQuery::\_\_destruct**()

Destructor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Nada.

# SolrQuery::getExpand

(PECL solr &gt;= 2.2.0)

SolrQuery::getExpand — Devuelve true si la extensión de grupo está activada

### Descripción

public **SolrQuery::getExpand**(): [bool](#language.types.boolean)

    Devuelve **[true](#constant.true)** si la extensión de grupo está activada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve si la extensión de grupo está activada.

# SolrQuery::getExpandFilterQueries

(PECL solr &gt;= 2.2.0)

SolrQuery::getExpandFilterQueries — Devuelve las consultas de filtro de expansión

### Descripción

public **SolrQuery::getExpandFilterQueries**(): [array](#language.types.array)

Devuelve las consultas de filtro de expansión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las consultas de filtro de expansión.

# SolrQuery::getExpandQuery

(PECL solr &gt;= 2.2.0)

SolrQuery::getExpandQuery — Devuelve el parámetro de consulta de expansión expand.q

### Descripción

public **SolrQuery::getExpandQuery**(): [array](#language.types.array)

    Devuelve el parámetro de consulta de expansión expand.q.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la consulta de expansión.

# SolrQuery::getExpandRows

(PECL solr &gt;= 2.2.0)

SolrQuery::getExpandRows — Devuelve el número de filas a mostrar en cada grupo (expand.rows)

### Descripción

public **SolrQuery::getExpandRows**(): [int](#language.types.integer)

    Devuelve el número de filas a mostrar en cada grupo (expand.rows).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de filas.

# SolrQuery::getExpandSortFields

(PECL solr &gt;= 2.2.0)

SolrQuery::getExpandSortFields — Devuelve un array de campos

### Descripción

public **SolrQuery::getExpandSortFields**(): [array](#language.types.array)

    Devuelve un array de campos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de campos.

# SolrQuery::getFacet

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacet — Devuelve el valor del parámetro facet

### Descripción

public **SolrQuery::getFacet**(): [bool](#language.types.boolean)

Devuelve el valor del parámetro facet.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un boolean en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetDateEnd

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetDateEnd — Devuelve el valor del parámetro facet.date.end

### Descripción

public **SolrQuery::getFacetDateEnd**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el valor del parámetro facet.date.end. Este método acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetDateFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetDateFields — Devuelve todos los campos de facet.date

### Descripción

public **SolrQuery::getFacetDateFields**(): [array](#language.types.array)

Devuelve todos los campos de facet.date

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve todos los campos de facet.date como matriz o **[null](#constant.null)** si no se estableció nada

# SolrQuery::getFacetDateGap

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetDateGap — Devuelve el valor del parámetro facet.date.gap

### Descripción

public **SolrQuery::getFacetDateGap**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el valor del parámetro facet.date.gap. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estabelció

# SolrQuery::getFacetDateHardEnd

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetDateHardEnd — Devuelve el valor del parámetro facet.date.hardend

### Descripción

public **SolrQuery::getFacetDateHardEnd**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el valor del parámetro facet.date.hardend. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetDateOther

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetDateOther — Devuelve el valor del parámetro facet.date.other

### Descripción

public **SolrQuery::getFacetDateOther**([string](#language.types.string) $field_override = ?): [array](#language.types.array)

Devuelve el valor del parámetro facet.date.other. Este método acepta una sobrescritura opcional de campos.

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un [array](#language.types.array) en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getFacetDateStart

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetDateStart — Devuelve el límite inferior del primer rango de datos para todas las facetas de fecha de este campo

### Descripción

public **SolrQuery::getFacetDateStart**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el límite inferior del primer rango de datos para todas las facetas de fecha de este campo. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetFields — Devuelve todos los campos facet

### Descripción

public **SolrQuery::getFacetFields**(): [array](#language.types.array)

Devuelve todos los campos facet

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz de todos los campos y **[null](#constant.null)** si no se estableció nada

# SolrQuery::getFacetLimit

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetLimit — Devuelve el número máximo de restricciones que deberían ser devueltas por los campos facet

### Descripción

public **SolrQuery::getFacetLimit**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve el número máximo de restricciones que deberían ser devueltas por los campos facet. Este método acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo a sobrescribir.





### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetMethod

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetMethod — Devuelve el valor del parámetro facet.method

### Descripción

public **SolrQuery::getFacetMethod**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el valor del parámetro facet.method. Acepta una sobrescritura opcional de campos.

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se establece

# SolrQuery::getFacetMinCount

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetMinCount — Devuelve el mínimo de facetas que deberían ser incluidas en la respuesta

### Descripción

public **SolrQuery::getFacetMinCount**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve el mínimo de facetas que deberían ser incluidas en la respuesta. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetMissing

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetMissing — Devuelve el estado acutual del parámetro facet.missing

### Descripción

public **SolrQuery::getFacetMissing**([string](#language.types.string) $field_override = ?): [bool](#language.types.boolean)

Devuelve el estado acutual del parámetro facet.missing. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetOffset

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetOffset — Devuelve un índice dentro de la lista de restricciones para ser usado en paginación

### Descripción

public **SolrQuery::getFacetOffset**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve un índice dentro de la lista de restricciones para ser usado en paginación. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo a sobrescribir.





### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getFacetPrefix

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetPrefix — Devuelve el prefijo de faceta

### Descripción

public **SolrQuery::getFacetPrefix**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el prefijo de faceta

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getFacetQueries

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetQueries — Devuelve todas las consultas de facetas

### Descripción

public **SolrQuery::getFacetQueries**(): [array](#language.types.array)

Devuelve todas las consultas de facetas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getFacetSort

(PECL solr &gt;= 0.9.2)

SolrQuery::getFacetSort — Devuelve el tipo de ordenación de la faceta

### Descripción

public **SolrQuery::getFacetSort**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve un entero (SolrQuery::FACET_SORT_INDEX o SolrQuery::FACET_SORT_COUNT)

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un entero (SolrQuery::FACET_SORT_INDEX o SolrQuery::FACET_SORT_COUNT) en caso de éxito o **[null](#constant.null)** si no se estableció.

# SolrQuery::getFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getFields — Devuelve la lista de campos que serán devueltos en la respuesta

### Descripción

public **SolrQuery::getFields**(): [array](#language.types.array)

Devuelve la lista de campos que serán devueltos en la respuesta

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getFilterQueries

(PECL solr &gt;= 0.9.2)

SolrQuery::getFilterQueries — Devuelve una matriz de consultas de filtro

### Descripción

public **SolrQuery::getFilterQueries**(): [array](#language.types.array)

Devuelve una matriz de consultas de filtro. Éstas son consultas que se pueden usar para restringir el superconjunto de documentos que pueden ser devueltos, sin influenciar en el resutlado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getGroup

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroup — Indica si el agrupamiento está activado

### Descripción

public **SolrQuery::getGroup**(): [bool](#language.types.boolean)

    Se devuelve true si el agrupamiento está activado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

# SolrQuery::getGroupCachePercent

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupCachePercent — Devuelve el valor del porcentaje de caché de grupo

### Descripción

public **SolrQuery::getGroupCachePercent**(): [int](#language.types.integer)

    Devuelve el valor del porcentaje de caché de grupo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::getGroupFacet

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupFacet — Devuelve el valor del parámetro group.facet

### Descripción

public **SolrQuery::getGroupFacet**(): [bool](#language.types.boolean)

    Devuelve el valor del parámetro group.facet.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

# SolrQuery::getGroupFields

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupFields — Devuelve los campos de grupo (valores del argumento group.field)

### Descripción

public **SolrQuery::getGroupFields**(): [array](#language.types.array)

    Devuelve los campos de grupo (valores del argumento group.field).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

# SolrQuery::getGroupFormat

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupFormat — Devuelve el valor de group.format

### Descripción

public **SolrQuery::getGroupFormat**(): [string](#language.types.string)

    Devuelve el valor de group.format.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

# SolrQuery::getGroupFunctions

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupFunctions — Devuelve las funciones de grupo (valores del argumento group.func)

### Descripción

public **SolrQuery::getGroupFunctions**(): [array](#language.types.array)

    Devuelve las funciones de grupo (valores del argumento group.func).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

# SolrQuery::getGroupLimit

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupLimit — Devuelve el valor de group.limit

### Descripción

public **SolrQuery::getGroupLimit**(): [int](#language.types.integer)

    Devuelve el valor de group.limit.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

# SolrQuery::getGroupMain

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupMain — Devuelve el valor de group.main

### Descripción

public **SolrQuery::getGroupMain**(): [bool](#language.types.boolean)

    Devuelve el valor de group.main.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

# SolrQuery::getGroupNGroups

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupNGroups — Devuelve el valor de group.ngroups

### Descripción

public **SolrQuery::getGroupNGroups**(): [bool](#language.types.boolean)

    Devuelve el valor de group.ngroups.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

# SolrQuery::getGroupOffset

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupOffset — Devuelve el valor de group.offset

### Descripción

public **SolrQuery::getGroupOffset**(): [int](#language.types.integer)

    Devuelve el valor de group.offset.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

# SolrQuery::getGroupQueries

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupQueries — Devuelve todos los valores del parámetro group.query

### Descripción

public **SolrQuery::getGroupQueries**(): [array](#language.types.array)

    Devuelve todos los valores del parámetro group.query.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[array](#language.types.array)

### Ver también

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

# SolrQuery::getGroupSortFields

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupSortFields — Devuelve el valor de group.sort

### Descripción

public **SolrQuery::getGroupSortFields**(): [array](#language.types.array)

    Devuelve el valor de group.sort.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

# SolrQuery::getGroupTruncate

(PECL solr &gt;= 2.2.0)

SolrQuery::getGroupTruncate — Devuelve el valor de group.truncate

### Descripción

public **SolrQuery::getGroupTruncate**(): [bool](#language.types.boolean)

    Devuelve el valor de group.truncate.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

# SolrQuery::getHighlight

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlight — Devuelve el estado del parámtero hl

### Descripción

public **SolrQuery::getHighlight**(): [bool](#language.types.boolean)

Devuelve un booleano que indica si se deben generar fragmentos destacados en la respuesta de la consulta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getHighlightAlternateField

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightAlternateField — Devuelve el campo remarcado para usarlo como copia de seguridad o como predeterminado

### Descripción

public **SolrQuery::getHighlightAlternateField**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el campo remarcado para usarlo como copia de seguridad o como predeterminado. Acepta una sobrescritura opcional.

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightFields — Devuelve todos los campos que Solr debería generar para remarcación de trozos

### Descripción

public **SolrQuery::getHighlightFields**(): [array](#language.types.array)

Devuelve todos los campos que Solr debería generar para remarcación de trozos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightFormatter

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightFormatter — Devuelve el formateador de la salida remarcada

### Descripción

public **SolrQuery::getHighlightFormatter**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el formateador de la salida remarcada

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightFragmenter

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightFragmenter — Devuelve el generador de trozos de texto para el texto remarcado

### Descripción

public **SolrQuery::getHighlightFragmenter**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el generador de trozos de texto para el texto remarcado. Acepta una sobrescritura opcional de campos.

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightFragsize

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightFragsize — Devuelve el número de caracteres de fragmentos a considerar para remarcación

### Descripción

public **SolrQuery::getHighlightFragsize**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve el número de caracteres de fragmentos a considerar para remarcación. Cero implica que no hay fragmentos. Debería usarse el camplo completo.

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un entero en caso de éxito o **[null](#constant.null)** si no se estableció

# SolrQuery::getHighlightHighlightMultiTerm

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightHighlightMultiTerm — Devuelve si habilitar o no la remarcación de consultas range/wildcard/fuzzy/prefix

### Descripción

public **SolrQuery::getHighlightHighlightMultiTerm**(): [bool](#language.types.boolean)

Devuelve si habilitar o no la remarcación de consultas range/wildcard/fuzzy/prefix

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció

# SolrQuery::getHighlightMaxAlternateFieldLength

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightMaxAlternateFieldLength — Devuelve el número máximo de caracteres del campo a devolver

### Descripción

public **SolrQuery::getHighlightMaxAlternateFieldLength**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve el número máximo de caracteres del campo a devolver

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightMaxAnalyzedChars

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightMaxAnalyzedChars — Devuelve el número máximo de caracteres de un documento para buscar trozos adecuados

### Descripción

public **SolrQuery::getHighlightMaxAnalyzedChars**(): [int](#language.types.integer)

Devuelve el número máximo de caracteres de un documento para buscar trozos adecuados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightMergeContiguous

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightMergeContiguous — Devuelve si colapsar o no fragmentos contiguos en un único fragmento

### Descripción

public **SolrQuery::getHighlightMergeContiguous**([string](#language.types.string) $field_override = ?): [bool](#language.types.boolean)

Devuelve si colapsar o no fragmentos contiguos en un único fragmento. Acepta una sobrescritura opcional de campos.

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightQuery

(PECL solr &gt;= 2.7.0)

SolrQuery::getHighlightQuery — Devuelve la consulta de resaltado (hl.q)

### Descripción

public **SolrQuery::getHighlightQuery**(): [string](#language.types.string)

Devuelve la consulta de resaltado previamente definida.
Este parámetro permite resaltar términos o campos diferentes de los utilizados para recuperar los documentos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cadena de consulta de resaltado actual, o null si no está definida.

# SolrQuery::getHighlightRegexMaxAnalyzedChars

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightRegexMaxAnalyzedChars — Devuelve el número máximo de caracteres de un campo cuando se usa el fragmentador de expresiones regulares

### Descripción

public **SolrQuery::getHighlightRegexMaxAnalyzedChars**(): [int](#language.types.integer)

Devuelve el número máximo de caracteres de un campo cuando se usa el fragmentador de expresiones regulares

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightRegexPattern

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightRegexPattern — Devuelve la expresión regular para la fragmentación

### Descripción

public **SolrQuery::getHighlightRegexPattern**(): [string](#language.types.string)

Devuelve la expresión regular para la fragmentación

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightRegexSlop

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightRegexSlop — Devuelve el factor de desviación del tamaño de fragmento ideal

### Descripción

public **SolrQuery::getHighlightRegexSlop**(): [float](#language.types.float)

Devuelve el factor por el que el fragmentador de expresiones regulares puede desviar desde el tamaño de fragmeto ideal para acomodar la expresión regular

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [float](#language.types.float) en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightRequireFieldMatch

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightRequireFieldMatch — Devuelve si un campo será remarcado solamente si la consulta coincide con este campo en particular

### Descripción

public **SolrQuery::getHighlightRequireFieldMatch**(): [bool](#language.types.boolean)

Devuelve si un campo será remarcado solamente si la consulta coincide con este campo en particular.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightSimplePost

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightSimplePost — Devuelve el texto que aparece después de un término remarcado

### Descripción

public **SolrQuery::getHighlightSimplePost**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el texto que aparece después de un término remarcado. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightSimplePre

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightSimplePre — Devuelve el texto que aparece antes de un término remarcado

### Descripción

public **SolrQuery::getHighlightSimplePre**([string](#language.types.string) $field_override = ?): [string](#language.types.string)

Devuelve el texto que aparece antes de un término remarcado. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightSnippets

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightSnippets — Devuelve el número máximo de trozos remarcados a generar por campo

### Descripción

public **SolrQuery::getHighlightSnippets**([string](#language.types.string) $field_override = ?): [int](#language.types.integer)

Devuelve el número máximo de trozos remarcados a generar por campo. Acepta una sobrescritura opcional de campos

### Parámetros

     field_override


       El nombre del campo





### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getHighlightUsePhraseHighlighter

(PECL solr &gt;= 0.9.2)

SolrQuery::getHighlightUsePhraseHighlighter — Devuelve el estado del parámetro hl.usePhraseHighlighter

### Descripción

public **SolrQuery::getHighlightUsePhraseHighlighter**(): [bool](#language.types.boolean)

Devuelve si usar o no SpanScorer para remarcar términos de frases sólo cuando aparezcan dentro de la frase de consulta en el documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMlt

(PECL solr &gt;= 0.9.2)

SolrQuery::getMlt — Devuelve si los resultados MoreLikeThis deberían o no ser habilitados

### Descripción

public **SolrQuery::getMlt**(): [bool](#language.types.boolean)

Devuelve si los resultados MoreLikeThis deberían o no ser habilitados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltBoost

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltBoost — Devuelve si la consulta será impulsada (boost) o no mediante la relevancia del térmido de interés

### Descripción

public **SolrQuery::getMltBoost**(): [bool](#language.types.boolean)

Devuelve si la consulta será impulsada (boost) o no mediante la relevancia del térmido de interés

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltCount

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltCount — Devuelve el número de documentos similares a devolver para cada resultado

### Descripción

public **SolrQuery::getMltCount**(): [int](#language.types.integer)

Devuelve el número de documentos similares a devolver para cada resultado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltFields — Devuelve todos los campos a usar para similitud

### Descripción

public **SolrQuery::getMltFields**(): [array](#language.types.array)

Devuelve todos los campos a usar para similitud

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltMaxNumQueryTerms

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltMaxNumQueryTerms — Devuelve el número máximo de términos de consultas que serán incluidos en cualquier consulta generada

### Descripción

public **SolrQuery::getMltMaxNumQueryTerms**(): [int](#language.types.integer)

Devuelve el número máximo de términos de consultas que serán incluidos en cualquier consulta generada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltMaxNumTokens

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltMaxNumTokens — Devuelve el número máximo de tokens a analizar en cada campo del documento que no esté almacenado con soporte TermVector

### Descripción

public **SolrQuery::getMltMaxNumTokens**(): [int](#language.types.integer)

Devuelve el número máximo de tokens a analizar en cada campo del documento que no esté almacenado con soporte TermVector

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltMaxWordLength

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltMaxWordLength — Devuelve la longitud máxima de palabra de las palabras que serán ignoradas

### Descripción

public **SolrQuery::getMltMaxWordLength**(): [int](#language.types.integer)

Devuelve la longitud máxima de palabra de las palabras que serán ignoradas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltMinDocFrequency

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltMinDocFrequency — Devuelve el umbral de frecuencia en el que las palabras que no ocurran en por lo menos tantos documentos como este serán ignoradas

### Descripción

public **SolrQuery::getMltMinDocFrequency**(): [int](#language.types.integer)

Devuelve el umbral de frecuencia en el que las palabras que no ocurran en por lo menos tantos documentos como este serán ignoradas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltMinTermFrequency

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltMinTermFrequency — Devuelve la frecuencia bajo la cual los términos serán ignorados en el documento fuente

### Descripción

public **SolrQuery::getMltMinTermFrequency**(): [int](#language.types.integer)

Devuelve la frecuencia bajo la cual los términos serán ignorados en el documento fuente

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltMinWordLength

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltMinWordLength — Devuelve la longitud máxima de palabra bajo la cual las palabras serán ignoradas

### Descripción

public **SolrQuery::getMltMinWordLength**(): [int](#language.types.integer)

Devuelve la longitud máxima de palabra bajo la cual las palabras serán ignoradas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getMltQueryFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getMltQueryFields — Devuelve los campos de consultas y sus boosts

### Descripción

public **SolrQuery::getMltQueryFields**(): [array](#language.types.array)

Devuelve los campos de consultas y sus boosts

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getQuery

(PECL solr &gt;= 0.9.2)

SolrQuery::getQuery — Devuelve la consulta principal

### Descripción

public **SolrQuery::getQuery**(): [string](#language.types.string)

Devuelve la consulta de búsqueda principal

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getRows

(PECL solr &gt;= 0.9.2)

SolrQuery::getRows — Devuelve el número máximo de documentos

### Descripción

public **SolrQuery::getRows**(): [int](#language.types.integer)

Devuelve el número máximo de documentos del conjunto de resultados completo del cliente para cada consulta

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getSortFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getSortFields — Devuelve todos los campos de ordenación

### Descripción

public **SolrQuery::getSortFields**(): [array](#language.types.array)

Devuelve todos los campos de ordenación

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció ningún parámetro.

# SolrQuery::getStart

(PECL solr &gt;= 0.9.2)

SolrQuery::getStart — Devuelve el índice del conjunto de resultados completo

### Descripción

public **SolrQuery::getStart**(): [int](#language.types.integer)

Devuelve el índice del conjunto de resultados completo para las consultas donde el conjunto de documentos devueltos debería comenzar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getStats

(PECL solr &gt;= 0.9.2)

SolrQuery::getStats — Devuelve si están habilitadas o no las estadísticas

### Descripción

public **SolrQuery::getStats**(): [bool](#language.types.boolean)

Devuelve si están habilitadas o no las estadísticas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getStatsFacets

(PECL solr &gt;= 0.9.2)

SolrQuery::getStatsFacets — Devuelve todas las estadísticas de las facetas que fueron establecidas

### Descripción

public **SolrQuery::getStatsFacets**(): [array](#language.types.array)

Devuelve todas las estadísticas de las facetas que fueron establecidas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getStatsFields

(PECL solr &gt;= 0.9.2)

SolrQuery::getStatsFields — Devuelve todas las estadísticas de los campos

### Descripción

public **SolrQuery::getStatsFields**(): [array](#language.types.array)

Devuelve todas las estadísticas de los campos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTerms

(PECL solr &gt;= 0.9.2)

SolrQuery::getTerms — Devuelve si está habilitado o no TermsComponent

### Descripción

public **SolrQuery::getTerms**(): [bool](#language.types.boolean)

Devuelve si está habilitado o no TermsComponent

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsField

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsField — Devuelve el campo desde el cuál los términos son recuperados

### Descripción

public **SolrQuery::getTermsField**(): [string](#language.types.string)

Devuelve el campo desde el cuál los términos son recuperados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsIncludeLowerBound

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsIncludeLowerBound — Devuelve si incluir o no el límite inferior en el conjunto de resultados

### Descripción

public **SolrQuery::getTermsIncludeLowerBound**(): [bool](#language.types.boolean)

Devuelve si incluir o no el límite inferior en el conjunto de resultados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsIncludeUpperBound

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsIncludeUpperBound — Devuelve si incluir o no el término de límite superior en el conjunto de resultados

### Descripción

public **SolrQuery::getTermsIncludeUpperBound**(): [bool](#language.types.boolean)

Devuelve si incluir o no el término de límite superior en el conjunto de resultados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsLimit

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsLimit — Devuelve el número máximo de términos que debería devolver Solr

### Descripción

public **SolrQuery::getTermsLimit**(): [int](#language.types.integer)

Devuelve el número máximo de términos que debería devolver Solr

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsLowerBound

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsLowerBound — Devuelve el término en el que comenzar

### Descripción

public **SolrQuery::getTermsLowerBound**(): [string](#language.types.string)

Devuelve el término en el que comenzar

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsMaxCount

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsMaxCount — Devuelve la frecuencia de documento máxima

### Descripción

public **SolrQuery::getTermsMaxCount**(): [int](#language.types.integer)

Devuelve la frecuencia de documento máxima

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsMinCount

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsMinCount — Devuelve la frecuencia de documento mínima a devolver para ser incluido

### Descripción

public **SolrQuery::getTermsMinCount**(): [int](#language.types.integer)

Devuelve la frecuencia de documento mínima a devolver para ser incluido

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsPrefix

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsPrefix — Devuelve el prefijo del término

### Descripción

public **SolrQuery::getTermsPrefix**(): [string](#language.types.string)

Devuelve el prefijo por el que los términos coincedentes deben ser restringidos. Restringirá las coincidencias sólo de los términos que empiecen con el prefijo

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsReturnRaw

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsReturnRaw — Si devolver o no caracteres en bruto

### Descripción

public **SolrQuery::getTermsReturnRaw**(): [bool](#language.types.boolean)

Devuelve un booleano indicando si devolver o no caracteres en bruto del término indexado, sin tener en cuenta si es legible por humanos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un booleano en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsSort

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsSort — Devuelve un entero indicando cómo son ordenados los términos

### Descripción

public **SolrQuery::getTermsSort**(): [int](#language.types.integer)

SolrQuery::TERMS_SORT_INDEX indica que los términos son devueltos por orden de índice. SolrQuery::TERMS_SORT_COUNT implica que los términos son ordenados según la frecuencia del término (la más alta cuenta como la primera)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTermsUpperBound

(PECL solr &gt;= 0.9.2)

SolrQuery::getTermsUpperBound — Devuelve el término en donde parar

### Descripción

public **SolrQuery::getTermsUpperBound**(): [string](#language.types.string)

Devuelve el término en donde parar

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::getTimeAllowed

(PECL solr &gt;= 0.9.2)

SolrQuery::getTimeAllowed — Devuelve el tiempo en milisegundos permitido para que la consulta finalice

### Descripción

public **SolrQuery::getTimeAllowed**(): [int](#language.types.integer)

Devuelve el tiempo en milisegundos permitido para que la consulta finalice.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero en caso de éxito y **[null](#constant.null)** si no se estableció.

# SolrQuery::removeExpandFilterQuery

(PECL solr &gt;= 2.2.0)

SolrQuery::removeExpandFilterQuery — Elimina una consulta de filtro de extensión

### Descripción

public **SolrQuery::removeExpandFilterQuery**([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)

    Elimina una consulta de filtro de extensión.

### Parámetros

    fq





### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setExpand()](#solrquery.setexpand) - Activa/desactiva el componente Expand

- [SolrQuery::addExpandSortField()](#solrquery.addexpandsortfield) - Ordena los documentos en los grupos extendidos (parámetro expand.sort)

- [SolrQuery::removeExpandSortField()](#solrquery.removeexpandsortfield) - Elimina un campo de ordenación de expansión del parámetro expand.sort

- [SolrQuery::setExpandRows()](#solrquery.setexpandrows) - Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

- [SolrQuery::setExpandQuery()](#solrquery.setexpandquery) - Define el parámetro expand.q

- [SolrQuery::addExpandFilterQuery()](#solrquery.addexpandfilterquery) - Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

# SolrQuery::removeExpandSortField

(PECL solr &gt;= 2.2.0)

SolrQuery::removeExpandSortField — Elimina un campo de ordenación de expansión del parámetro expand.sort

### Descripción

public **SolrQuery::removeExpandSortField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

    Se elimina un campo de ordenación de expansión del parámetro expand.sort.

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setExpand()](#solrquery.setexpand) - Activa/desactiva el componente Expand

- [SolrQuery::addExpandSortField()](#solrquery.addexpandsortfield) - Ordena los documentos en los grupos extendidos (parámetro expand.sort)

- [SolrQuery::setExpandRows()](#solrquery.setexpandrows) - Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

- [SolrQuery::setExpandQuery()](#solrquery.setexpandquery) - Define el parámetro expand.q

- [SolrQuery::addExpandFilterQuery()](#solrquery.addexpandfilterquery) - Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

- [SolrQuery::removeExpandFilterQuery()](#solrquery.removeexpandfilterquery) - Elimina una consulta de filtro de extensión

# SolrQuery::removeFacetDateField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeFacetDateField — Elimina uno de los campos de faceta de fecha

### Descripción

public **SolrQuery::removeFacetDateField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

El nombre del campo

### Parámetros

     field


       El nombre del campo de fecha a eliminar





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeFacetDateOther

(PECL solr &gt;= 0.9.2)

SolrQuery::removeFacetDateOther — Elimina uno de los parámetros facet.date.other

### Descripción

public **SolrQuery::removeFacetDateOther**([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Elimina uno de los parámetros facet.date.other.

### Parámetros

     value


       El valor






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeFacetField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeFacetField — Elimina uno de los parámetros facet.date

### Descripción

public **SolrQuery::removeFacetField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Elimina uno de los parámetros facet.date.

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeFacetQuery

(PECL solr &gt;= 0.9.2)

SolrQuery::removeFacetQuery — Elimina uno de los parámetros facet.query

### Descripción

public **SolrQuery::removeFacetQuery**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

Elimina uno de los parámetros facet.query.

### Parámetros

     value


       El valor





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeField — Elimina un campo de la lista de campos

### Descripción

public **SolrQuery::removeField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Elimina un campo de la lista de campos

### Parámetros

     field


       Nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeFilterQuery

(PECL solr &gt;= 0.9.2)

SolrQuery::removeFilterQuery — Elimina una consulta de filtro

### Descripción

public **SolrQuery::removeFilterQuery**([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)

Elimina una consulta de filtro.

### Parámetros

     fq


       La consulta de filtro a eliminar





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeHighlightField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeHighlightField — Elimina uno de los campos usados para remarcación

### Descripción

public **SolrQuery::removeHighlightField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Elimina uno de los campos usados para remarcación.

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeMltField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeMltField — Elimina uno de los campos moreLikeThis

### Descripción

public **SolrQuery::removeMltField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Elimina uno de los campos moreLikeThis.

### Parámetros

     field


       Nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeMltQueryField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeMltQueryField — Elimina uno de los campos de consulta moreLikeThis

### Descripción

public **SolrQuery::removeMltQueryField**([string](#language.types.string) $queryField): [SolrQuery](#class.solrquery)

Elimina uno de los campos de consulta moreLikeThis.

### Parámetros

     queryField


       El campo de consulta





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeSortField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeSortField — Elimina uno de los campos de ordenación

### Descripción

public **SolrQuery::removeSortField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Elimina uno de los campos de ordenación.

### Parámetros

     field


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeStatsFacet

(PECL solr &gt;= 0.9.2)

SolrQuery::removeStatsFacet — Elimina uno de los parámetros stats.facet

### Descripción

public **SolrQuery::removeStatsFacet**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

Elimina uno de los parámetros stats.facet

### Parámetros

     value


       El valor





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::removeStatsField

(PECL solr &gt;= 0.9.2)

SolrQuery::removeStatsField — Elimina uno de los parámetros stats.field

### Descripción

public **SolrQuery::removeStatsField**([string](#language.types.string) $field): [SolrQuery](#class.solrquery)

Elimina uno de los parámetros stats.field

### Parámetros

     field


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setEchoHandler

(PECL solr &gt;= 0.9.2)

SolrQuery::setEchoHandler — Conmuta el parámetro echoHandler

### Descripción

public **SolrQuery::setEchoHandler**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Si está establecido a true, Solr coloca los nombres de los gestores usados en la respuesta al cliente para propósitos de depuración.

### Parámetros

     flag


       **[true](#constant.true)** o **[false](#constant.false)**





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setEchoParams

(PECL solr &gt;= 0.9.2)

SolrQuery::setEchoParams — Determina qué tipo de parámetros incluir en la respuesta

### Descripción

public **SolrQuery::setEchoParams**([string](#language.types.string) $type): [SolrQuery](#class.solrquery)

Ordena a Solr qué tipos de parámetros de solicitud deberían ser incluidos en la respuesta para propósitos de depuración, valores legales incluidos:

- none - no incluir ningún parámetro de solicitud para la depuración
- explicit - incluir los parámetros explícitamete especificados por el cliente en la solicitud
- all - incluir todos los parámetros involucrados en esta solicitud, los especificados explícitamente por el cliente, o los implícitos debido a la configuración del gestor de solicitudes.

    ### Parámetros

    type

         El tipo de parámetros a incluir

    ### Valores devueltos

    Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

    # SolrQuery::setExpand

    (PECL solr &gt;= 2.2.0)

SolrQuery::setExpand — Activa/desactiva el componente Expand

### Descripción

public **SolrQuery::setExpand**([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)

    Activa/desactiva el componente Expand.

### Parámetros

    value


      Un flag booleano


### Valores devueltos

[SolrQuery](#class.solrquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrQuery::setExpand()**

&lt;?php

$query = new SolrQuery('lucene');

$query
-&gt;setExpand(true)
-&gt;setExpandRows(50)
-&gt;setExpandQuery('text:product')
-&gt;addExpandFilterQuery('manu:apple')
-&gt;addExpandFilterQuery('inStock:true')
-&gt;addExpandSortField('score', SolrQuery::ORDER_DESC)
-&gt;addExpandSortField('title', SolrQuery::ORDER_ASC);

echo $query.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;expand=true&amp;expand.rows=50&amp;expand.q=text:product&amp;expand.fq=manu:apple&amp;expand.fq=inStock:true&amp;expand.sort=score desc,title asc

### Ver también

- [SolrQuery::addExpandSortField()](#solrquery.addexpandsortfield) - Ordena los documentos en los grupos extendidos (parámetro expand.sort)

- [SolrQuery::removeExpandSortField()](#solrquery.removeexpandsortfield) - Elimina un campo de ordenación de expansión del parámetro expand.sort

- [SolrQuery::setExpandRows()](#solrquery.setexpandrows) - Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

- [SolrQuery::setExpandQuery()](#solrquery.setexpandquery) - Define el parámetro expand.q

- [SolrQuery::addExpandFilterQuery()](#solrquery.addexpandfilterquery) - Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

- [SolrQuery::removeExpandFilterQuery()](#solrquery.removeexpandfilterquery) - Elimina una consulta de filtro de extensión

# SolrQuery::setExpandQuery

(PECL solr &gt;= 2.2.0)

SolrQuery::setExpandQuery — Define el parámetro expand.q

### Descripción

public **SolrQuery::setExpandQuery**([string](#language.types.string) $q): [SolrQuery](#class.solrquery)

    Define el parámetro expand.q.




    Sobrescribe el parámetro principal q,
    determina qué documentos incluir en el grupo principal.

### Parámetros

    q





### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setExpand()](#solrquery.setexpand) - Activa/desactiva el componente Expand

- [SolrQuery::addExpandSortField()](#solrquery.addexpandsortfield) - Ordena los documentos en los grupos extendidos (parámetro expand.sort)

- [SolrQuery::removeExpandSortField()](#solrquery.removeexpandsortfield) - Elimina un campo de ordenación de expansión del parámetro expand.sort

- [SolrQuery::setExpandRows()](#solrquery.setexpandrows) - Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

- [SolrQuery::addExpandFilterQuery()](#solrquery.addexpandfilterquery) - Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

- [SolrQuery::removeExpandFilterQuery()](#solrquery.removeexpandfilterquery) - Elimina una consulta de filtro de extensión

# SolrQuery::setExpandRows

(PECL solr &gt;= 2.2.0)

SolrQuery::setExpandRows — Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

### Descripción

public **SolrQuery::setExpandRows**([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)

    Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5

### Parámetros

    value





### Valores devueltos

[SolrQuery](#class.solrquery)

### Ver también

- [SolrQuery::setExpand()](#solrquery.setexpand) - Activa/desactiva el componente Expand

- [SolrQuery::addExpandSortField()](#solrquery.addexpandsortfield) - Ordena los documentos en los grupos extendidos (parámetro expand.sort)

- [SolrQuery::removeExpandSortField()](#solrquery.removeexpandsortfield) - Elimina un campo de ordenación de expansión del parámetro expand.sort

- [SolrQuery::setExpandQuery()](#solrquery.setexpandquery) - Define el parámetro expand.q

- [SolrQuery::addExpandFilterQuery()](#solrquery.addexpandfilterquery) - Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal

- [SolrQuery::removeExpandFilterQuery()](#solrquery.removeexpandfilterquery) - Elimina una consulta de filtro de extensión

# SolrQuery::setExplainOther

(PECL solr &gt;= 0.9.2)

SolrQuery::setExplainOther — Establece el parámetro de consulta común explainOther

### Descripción

public **SolrQuery::setExplainOther**([string](#language.types.string) $query): [SolrQuery](#class.solrquery)

Establece el parámetro de consulta común explainOther

### Parámetros

     query


       La consulta Lucene para identificar un conjuntos de documentos





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacet

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacet — Mapea al parámetro facet. Habilita o deshabilta las facetas

### Descripción

public **SolrQuery::setFacet**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Habilita o deshabilta las facetas.

### Parámetros

     value


       **[true](#constant.true)** habilita las facetas y **[false](#constant.false)** las deshabilita.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetDateEnd

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetDateEnd — Mapea a facet.date.end

### Descripción

public **SolrQuery::setFacetDateEnd**([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Mapea a facet.date.end

### Parámetros

     value


       Véase facet.date.end






     field_override


       Nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetDateGap

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetDateGap — Mapea a facet.date.gap

### Descripción

public **SolrQuery::setFacetDateGap**([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Mapea a facet.date.gap

### Parámetros

     value


       Véase facet.date.gap






     field_override


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetDateHardEnd

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetDateHardEnd — Mapea a facet.date.hardend

### Descripción

public **SolrQuery::setFacetDateHardEnd**([bool](#language.types.boolean) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Mapea a facet.date.hardend

### Parámetros

     value


       Véase facet.date.hardend






     field_override


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetDateStart

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetDateStart — Mapea a facet.date.start

### Descripción

public **SolrQuery::setFacetDateStart**([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Mapea a facet.date.start

### Parámetros

     value


       Véase facet.date.start






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetEnumCacheMinDefaultFrequency

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetEnumCacheMinDefaultFrequency — Establece la frecuencia de documento mínima usada para determinar la cuenta de términos

### Descripción

public **SolrQuery::setFacetEnumCacheMinDefaultFrequency**([int](#language.types.integer) $frequency, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece la frecuencia de documento mínima usada para determinar la cuenta de términos

### Parámetros

     value


       La frecuencia mínima






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetLimit

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetLimit — Mapea a facet.limit

### Descripción

public **SolrQuery::setFacetLimit**([int](#language.types.integer) $limit, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Mapea a facet.limit. Establece el número máximo de restricciones que deberían ser devueltas por los campos de facetas.

### Parámetros

     limit


       El número máximo de restricciones






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetMethod

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetMethod — Especifica el tipo de algoritmo a usar cuando se hace una faceta a un campo

### Descripción

public **SolrQuery::setFacetMethod**([string](#language.types.string) $method, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Especifica el tipo de algoritmo a usar cuando se hace una faceta a un campo. Este método acepta la sobrescritura opcional de campos.

### Parámetros

     method


       El método a usar.






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetMinCount

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetMinCount — Mapea a facet.mincount

### Descripción

public **SolrQuery::setFacetMinCount**([int](#language.types.integer) $mincount, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece el mínimo de campos de faceta que deberían ser incluidos en la respuesta

### Parámetros

     mincount


       El mínimo






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetMissing

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetMissing — Mapea a facet.missing

### Descripción

public **SolrQuery::setFacetMissing**([bool](#language.types.boolean) $flag, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Usado para indicar que además de las restricciones basdas en términos de un campo de faceta, debería ser computada una cuenta de todos los resultados coincidentes que no tienen valor para el campo

### Parámetros

     flag


       **[true](#constant.true)** activa esta característica. **[false](#constant.false)** la desactiva.






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetOffset

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetOffset — Establece el índice de la lista de restricciones para tener en cuenta la paginación

### Descripción

public **SolrQuery::setFacetOffset**([int](#language.types.integer) $offset, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece el índice de la lista de restricciones para tener en cuenta la paginación.

### Parámetros

     offset


       El índice






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetPrefix

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetPrefix — Especifica un prefijo de cadena con el que limitar los términos a los que hacer una faceta

### Descripción

public **SolrQuery::setFacetPrefix**([string](#language.types.string) $prefix, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Especifica un prefijo de cadena con el que limitar los términos a los que hacer una faceta.

### Parámetros

     prefix


       La cadena de prefijo






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setFacetSort

(PECL solr &gt;= 0.9.2)

SolrQuery::setFacetSort — Determina el orden de las restricciones de campos de faceta

### Descripción

public **SolrQuery::setFacetSort**([int](#language.types.integer) $facetSort, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Determina el orden de las restricciones de campos de faceta

### Parámetros

     facetSort


       Use SolrQuery::FACET_SORT_INDEX para ordenar por índice o SolrQuery::FACET_SORT_COUNT para ordenar por cuenta.






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setGroup

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroup — Activa/desactiva el agrupamiento de resultados (parámetro group)

### Descripción

public **SolrQuery::setGroup**([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)

    Activa/desactiva el agrupamiento de resultados (parámetro group).

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::getGroup()](#solrquery.getgroup) - Indica si el agrupamiento está activado

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupCachePercent

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupCachePercent — Define el porcentaje de caché para el agrupamiento de resultados

### Descripción

public **SolrQuery::setGroupCachePercent**([int](#language.types.integer) $percent): [SolrQuery](#class.solrquery)

    Definir este parámetro con un número mayor que 0 activa la caché para el agrupamiento de resultados.
    El agrupamiento de resultados ejecuta dos búsquedas; esta opción almacena en caché la segunda búsqueda. El valor por omisión del servidor es 0.

    Las pruebas han demostrado que la caché de grupo solo mejora el tiempo de búsqueda con consultas booleanas, genéricas y difusas. Para consultas simples como las consultas de término o "match all",
    la caché de grupo degrada el rendimiento.
    Parámetro group.cache.percent

### Parámetros

    percent





### Valores devueltos

### Errores/Excepciones

Genera una [SolrIllegalArgumentException](#class.solrillegalargumentexception) si se ha pasado un argumento inválido.

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

# SolrQuery::setGroupFacet

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupFacet — Define el parámetro group.facet

### Descripción

public **SolrQuery::setGroupFacet**([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)

    Determina si las facetas agrupadas deben ser calculadas para los campos facetados especificados en los parámetros facet.field.
    Las facetas agrupadas se calculan en función del primer grupo especificado.

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupFormat

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupFormat — Define el formato de grupo, la estructura de resultado (argumento group.format)

### Descripción

public **SolrQuery::setGroupFormat**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

    Define el argumento group.format.
    Si este argumento se establece en simple, los documentos agrupados se presentan en una sola lista plana, y los argumentos start y rows afectan al número de documentos en lugar de los grupos.
    Valores aceptados: grouped/simple

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupLimit

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupLimit — Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

### Descripción

public **SolrQuery::setGroupLimit**([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)

    Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupMain

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupMain — Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

### Descripción

public **SolrQuery::setGroupMain**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

    Si **[true](#constant.true)**, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple.

### Parámetros

    value


      Si **[true](#constant.true)**, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta.


### Valores devueltos

Devuelve una instancia de [SolrQuery](#class.solrquery).

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- **SolrQuery::setGroupMain()**

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupNGroups

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupNGroups — Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

### Descripción

public **SolrQuery::setGroupNGroups**([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)

    Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados.

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupOffset

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupOffset — Define el parámetro group.offset

### Descripción

public **SolrQuery::setGroupOffset**([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)

    Define el parámetro group.offset.

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupTruncate()](#solrquery.setgrouptruncate) - Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setGroupTruncate

(PECL solr &gt;= 2.2.0)

SolrQuery::setGroupTruncate — Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta

### Descripción

public **SolrQuery::setGroupTruncate**([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)

    Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta.
    El valor por omisión del servidor es false.
    Parámetro group.truncate

### Parámetros

    value





### Valores devueltos

### Ver también

- [SolrQuery::setGroup()](#solrquery.setgroup) - Activa/desactiva el agrupamiento de resultados (parámetro group)

- [SolrQuery::addGroupField()](#solrquery.addgroupfield) - Añade un campo a utilizar para agrupar los resultados

- [SolrQuery::addGroupFunction()](#solrquery.addgroupfunction) - Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)

- [SolrQuery::addGroupQuery()](#solrquery.addgroupquery) - Permite agrupar los documentos que coinciden con la consulta dada

- [SolrQuery::addGroupSortField()](#solrquery.addgroupsortfield) - Añade un campo de ordenación de grupo (argumento group.sort)

- [SolrQuery::setGroupFacet()](#solrquery.setgroupfacet) - Define el parámetro group.facet

- [SolrQuery::setGroupOffset()](#solrquery.setgroupoffset) - Define el parámetro group.offset

- [SolrQuery::setGroupLimit()](#solrquery.setgrouplimit) - Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1

- [SolrQuery::setGroupMain()](#solrquery.setgroupmain) - Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple

- [SolrQuery::setGroupNGroups()](#solrquery.setgroupngroups) - Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados

- [SolrQuery::setGroupFormat()](#solrquery.setgroupformat) - Define el formato de grupo, la estructura de resultado (argumento group.format)

- [SolrQuery::setGroupCachePercent()](#solrquery.setgroupcachepercent) - Define el porcentaje de caché para el agrupamiento de resultados

# SolrQuery::setHighlight

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlight — Habilita o deshabilita la remarcación

### Descripción

public **SolrQuery::setHighlight**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Establecerlo a **[true](#constant.true)** habilita los trozos remarcados para ser generados en la respuesta de consulta.

Establecerlo a **[false](#constant.false)** deshabilita la remarcación

### Parámetros

     flag


       Habilita o deshabilita la remarcación





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightAlternateField

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightAlternateField — Especifica el campo de copia de seguridad a usar

### Descripción

public **SolrQuery::setHighlightAlternateField**([string](#language.types.string) $field, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Si un trozo no se puede generar debido a que no hay términos coincidentes, se puede especificar un campo para usarlo como copia de seguridad del sumario predeterminado

### Parámetros

     field


       El nombre del campo de copia de seguridad






     field_override


       El nombre del campo que se va a sobrescribir.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightFormatter

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightFormatter — Especifica un formateador para la salida resaltada

### Descripción

public **SolrQuery::setHighlightFormatter**([string](#language.types.string) $formatter, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Especifica un formateador para la salida resaltada.

### Parámetros

     formatter


       Actualmente, el único valor es "simple".






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve una instancia de [SolrQuery](#class.solrquery).

# SolrQuery::setHighlightFragmenter

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightFragmenter — Establece el generador de trozos de código para texto remarcado

### Descripción

public **SolrQuery::setHighlightFragmenter**([string](#language.types.string) $fragmenter, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Especifica un generador de trozos de código para texto remarcado.

### Parámetros

     fragmenter


       El fragmentador estándar es el hueco. Otra opción son las expresiones regulares, que intentan crear fragmentos que se parecen a ciertas expresiones regulares






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightFragsize

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightFragsize — El tamaño de los fragmentos a considerara para remarcación

### Descripción

public **SolrQuery::setHighlightFragsize**([int](#language.types.integer) $size, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece el tamaño, en caracteres, de los fragmentos a considerara para remarcación. "0" indica que debería usarse el campo completo (sin fragmentación).

### Parámetros

     size


       El tamaño, en caracteres, de los fragmentos a considerara para remarcación






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightHighlightMultiTerm

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightHighlightMultiTerm — Usa SpanScorer para remarcar términos de frases

### Descripción

public **SolrQuery::setHighlightHighlightMultiTerm**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Usa SpanScorer para remarcar términos de frases sólo cuando aparecen dentro de la frase de consulta del documento.

### Parámetros

     flag


       Si usar o no SpanScorer para remarcar términos de frases sólo cuando aparecen dentro de la frase de consulta del documento.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightMaxAlternateFieldLength

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightMaxAlternateFieldLength — Establece el número máximo de caracteres del campo a devolver

### Descripción

public **SolrQuery::setHighlightMaxAlternateFieldLength**([int](#language.types.integer) $fieldLength, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Si SolrQuery::setHighlightAlternateField() se le pasó el valor **[true](#constant.true)**, este parámetro especifica el número máximo de caracteres del campo a devolver

Cualquier valor menor o igual que 0 significa ilimitado.

### Parámetros

     fieldLength


       La longitud del campo






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightMaxAnalyzedChars

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightMaxAnalyzedChars — Especifica el número de caracteres de un documento para buscar trozos apropiados

### Descripción

public **SolrQuery::setHighlightMaxAnalyzedChars**([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)

Especifica el número de caracteres de un documento para buscar trozos apropiados

### Parámetros

     value


       El número de caracteres de un documento para buscar trozos apropiados





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightMergeContiguous

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightMergeContiguous — Si colapsar o no fragmentos contiguos en un único fragmento

### Descripción

public **SolrQuery::setHighlightMergeContiguous**([bool](#language.types.boolean) $flag, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Si colapsar o no fragmentos contiguos en un único fragmento.

### Parámetros

     value


       Si colapsar o no fragmentos contiguos en un único fragmento






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightQuery

(PECL solr &gt;= 2.7.0)

SolrQuery::setHighlightQuery — Una consulta designada para la resaltación (hl.q)

### Descripción

public **SolrQuery::setHighlightQuery**([string](#language.types.string) $q): [SolrQuery](#class.solrquery)

Una consulta a utilizar para la resaltación.
Este parámetro permite resaltar términos o campos diferentes de los utilizados para recuperar los documentos.

El valor por omisión si no está definido: el valor del parámetro q de la consulta

Referencia del parámetro Solr: hl.q

### Parámetros

     q


       La consulta de resaltación





### Valores devueltos

Devuelve el objeto [SolrQuery](#class.solrquery) actual, si el valor devuelto es utilizado.

# SolrQuery::setHighlightRegexMaxAnalyzedChars

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightRegexMaxAnalyzedChars — Especifica el número máximo de caracteres a analizar

### Descripción

public **SolrQuery::setHighlightRegexMaxAnalyzedChars**([int](#language.types.integer) $maxAnalyzedChars): [SolrQuery](#class.solrquery)

Especifica el número máximo de caracteres a analizar de un campo cuando se usa el fragmentador de expresiones regulares

### Parámetros

     maxAnalyzedChars


       El número máximo de caracteres a analizar de un campo cuando se usa el fragmentador de expresiones regulares





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightRegexPattern

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightRegexPattern — Especifica la expresión regular para la fragmentación

### Descripción

public **SolrQuery::setHighlightRegexPattern**([string](#language.types.string) $value): [SolrQuery](#class.solrquery)

Especifica la expresión regular para la fragmentación. Esto podría usarse para extraer sentencias

### Parámetros

     value


       La expresión regular para la fragmentación. Esto podría usarse para extraer sentencias





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightRegexSlop

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightRegexSlop — Establece el factor por el cual el fragmentador de expresiones regulares puede desviarse del tamaño de fragmento ideal

### Descripción

public **SolrQuery::setHighlightRegexSlop**([float](#language.types.float) $factor): [SolrQuery](#class.solrquery)

El factor por el cual el fragmentador de expresiones regulares puede desviarse del tamaño de fragmento ideal (especificado por SolrQuery::setHighlightFragsize) para acomodar la expresión regular

### Parámetros

     factor


       El factor por el cual el fragmentador de expresiones regulares puede desviarse del tamaño de fragmento ideal





### Valores devueltos

Devuelve el objeto SolrQuery actual si se usó el valor de retorno.

# SolrQuery::setHighlightRequireFieldMatch

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightRequireFieldMatch — Requerir la coincicencia de campos durante el remarcado

### Descripción

public **SolrQuery::setHighlightRequireFieldMatch**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Si es **[true](#constant.true)**, un campo sólo será remarcado si la consulta coincide con este campo en particular.

Esto sólo funciona si SolrQuery::setHighlightUsePhraseHighlighter() se estableció a **[true](#constant.true)**

### Parámetros

     flag


       **[true](#constant.true)** o **[false](#constant.false)**





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightSimplePost

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightSimplePost — Define el texto que debe aparecer después de un término resaltado

### Descripción

public **SolrQuery::setHighlightSimplePost**([string](#language.types.string) $simplePost, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Define el texto que debe aparecer después de un término resaltado.

### Parámetros

     simplePost


       Define el texto que debe aparecer después de un término resaltado.





El valor por omisión es &lt;/em&gt;

     field_override


       El nombre del campo.





### Valores devueltos

Devuelve una instancia de [SolrQuery](#class.solrquery).

# SolrQuery::setHighlightSimplePre

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightSimplePre — Establece el texto que aparece antes de un término remarcado

### Descripción

public **SolrQuery::setHighlightSimplePre**([string](#language.types.string) $simplePre, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece el texto que aparece antes de un término remarcado.

The default is &lt;em&gt;

### Parámetros

     simplePre


       El texto que aparece antes de un término remarcado






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightSnippets

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightSnippets — Establece el número máximo de trozos remarcados para generar por campo

### Descripción

public **SolrQuery::setHighlightSnippets**([int](#language.types.integer) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)

Establece el número máximo de trozos remarcados para generar por campo

### Parámetros

     value


       El número máximo de trozos remarcados para generar por campo






     field_override


       El nombre del campo.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setHighlightUsePhraseHighlighter

(PECL solr &gt;= 0.9.2)

SolrQuery::setHighlightUsePhraseHighlighter — Si remarcar o no términos de frases sólo cuando aparecen en la frase de consulta

### Descripción

public **SolrQuery::setHighlightUsePhraseHighlighter**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Establece si usar o no SpanScorer para remarcar o no términos de frases sólo cuando aparecen en la frase de consulta del documento

### Parámetros

     value


       Si usar o no SpanScorer para remarcar o no términos de frases sólo cuando aparecen en la frase de consulta del documento





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMlt

(PECL solr &gt;= 0.9.2)

SolrQuery::setMlt — Habilita o deshabilita moreLikeThis

### Descripción

public **SolrQuery::setMlt**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Habilita o deshabilita moreLikeThis

### Parámetros

     flag


       **[true](#constant.true)** lo habilita y **[false](#constant.false)** lo desactiva.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltBoost

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltBoost — Establecer si la consulta será impulsada (boost) por la relevancia del término de interés

### Descripción

public **SolrQuery::setMltBoost**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Establecer si la consulta será impulsada (boost) por la relevancia del término de interés

### Parámetros

     value


       Establece a **[true](#constant.true)** o **[false](#constant.false)**





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltCount

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltCount — Establece el número de documentos similares a devolver en cada resultado

### Descripción

public **SolrQuery::setMltCount**([int](#language.types.integer) $count): [SolrQuery](#class.solrquery)

Establece el número de documentos similares a devolver en cada resultado

### Parámetros

     count


       El número de documentos similares a devolver en cada resultado





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltMaxNumQueryTerms

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltMaxNumQueryTerms — Establece el número máximo de términos de consulta incluidos

### Descripción

public **SolrQuery::setMltMaxNumQueryTerms**([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)

Establece el número máximo de términos de consulta que serán incluidos en cualquier consulta generada.

### Parámetros

     value


       El número máximo de términos de consulta que serán incluidos en cualquier consulta generada





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltMaxNumTokens

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltMaxNumTokens — Especifica el número máximo de tokens a analizar

### Descripción

public **SolrQuery::setMltMaxNumTokens**([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)

Especifica el número máximo de tokens a analizar en cada campo de documento de ejemplo que no esté almacenado con soporte TermVector.

### Parámetros

     value


       El número máximo de tokens a analizar





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltMaxWordLength

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltMaxWordLength — Establece la longitud de palabra máxima

### Descripción

public **SolrQuery::setMltMaxWordLength**([int](#language.types.integer) $maxWordLength): [SolrQuery](#class.solrquery)

Establece la longitud de palabra máxima sobre la que las palabras serán ignoradas.

### Parámetros

     maxWordLength


       La longitud de palabra máxima sobre la que las palabras serán ignoradas





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltMinDocFrequency

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltMinDocFrequency — Establece la frecuencia de mltMinDoc

### Descripción

public **SolrQuery::setMltMinDocFrequency**([int](#language.types.integer) $minDocFrequency): [SolrQuery](#class.solrquery)

La frecuencia en la que las palabras que no ocurran en por lo menos tantos documentos como este serán ignoradas.

### Parámetros

     minDocFrequency


       Establece la frecuencia en la que las palabras que no ocurran en por lo menos tantos documentos como este serán ignoradas.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltMinTermFrequency

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltMinTermFrequency — Establece la frecuencia bajo la cual los términos serán ignorados en los documentos fuente

### Descripción

public **SolrQuery::setMltMinTermFrequency**([int](#language.types.integer) $minTermFrequency): [SolrQuery](#class.solrquery)

Establece la frecuencia bajo la cual los términos serán ignorados en los documentos fuente

### Parámetros

     minTermFrequency


       La frecuencia bajo la cual los términos serán ignorados en los documentos fuente





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setMltMinWordLength

(PECL solr &gt;= 0.9.2)

SolrQuery::setMltMinWordLength — Establece la longitud de palabra mínima

### Descripción

public **SolrQuery::setMltMinWordLength**([int](#language.types.integer) $minWordLength): [SolrQuery](#class.solrquery)

Establece la longitud de palabra mínima bajo la cual las palabras serán ignoradas.

### Parámetros

     minWordLength


       La longitud de palabra mínima bajo la cual las palabras serán ignoradas.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setOmitHeader

(PECL solr &gt;= 0.9.2)

SolrQuery::setOmitHeader — Excluye la cabecera de los resultados devueltos

### Descripción

public **SolrQuery::setOmitHeader**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Excluye la cabecera de los resultados devueltos.

### Parámetros

     flag


       **[true](#constant.true)** excluye la cabecera del resultado





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setQuery

(PECL solr &gt;= 0.9.2)

SolrQuery::setQuery — Establece la consulta de búsqueda

### Descripción

public **SolrQuery::setQuery**([string](#language.types.string) $query): [SolrQuery](#class.solrquery)

Establece la consulta de búsqueda.

### Parámetros

     query


       La consulta de búsqueda





### Valores devueltos

Devuelve el objeto SolrQuery actual

# SolrQuery::setRows

(PECL solr &gt;= 0.9.2)

SolrQuery::setRows — Especifica el número máximo de filas a devolver en el resultado

### Descripción

public **SolrQuery::setRows**([int](#language.types.integer) $rows): [SolrQuery](#class.solrquery)

Especifica el número máximo de filas a devolver en el resultado

### Parámetros

     rows


       El número máximo de filas a devolver





### Valores devueltos

Devuelve el objeto SolrQuery actual.

# SolrQuery::setShowDebugInfo

(PECL solr &gt;= 0.9.2)

SolrQuery::setShowDebugInfo — Bandera para mostrar información de depuración

### Descripción

public **SolrQuery::setShowDebugInfo**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Si mostrar o no información de depuración

### Parámetros

     flag


       Si mostrar o no información de depuración. **[true](#constant.true)** o **[false](#constant.false)**





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setStart

(PECL solr &gt;= 0.9.2)

SolrQuery::setStart — Especifica el número de filas que se van a saltar

### Descripción

public **SolrQuery::setStart**([int](#language.types.integer) $start): [SolrQuery](#class.solrquery)

Especifica el número de filas que se van a saltar. Útil en paginación de resultados.

### Parámetros

     start


       El número de filas a saltar.





### Valores devueltos

Devuelve el objeto SolrQuery actual.

# SolrQuery::setStats

(PECL solr &gt;= 0.9.2)

SolrQuery::setStats — Habilita o deshablita el componente de estadísticas

### Descripción

public **SolrQuery::setStats**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Habilita o deshablita el componente de estadísticas.

### Parámetros

     flag


       **[true](#constant.true)** habilita el componente de estadísticas y **[false](#constant.false)** lo deshabilita.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTerms

(PECL solr &gt;= 0.9.2)

SolrQuery::setTerms — Habilita o deshablita TermsComponent

### Descripción

public **SolrQuery::setTerms**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Habilita o deshablita TermsComponent

### Parámetros

     flag


       **[true](#constant.true)** lo habilita. **[false](#constant.false)** lo desactiva





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsField

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsField — Establece el nombre del campo del que obtener los términos

### Descripción

public **SolrQuery::setTermsField**([string](#language.types.string) $fieldname): [SolrQuery](#class.solrquery)

Establece el nombre del campo del que obtener los términos

### Parámetros

     fieldname


       El nombre del campo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsIncludeLowerBound

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsIncludeLowerBound — Incluir el término de límite inferior en el conjunto de resultados

### Descripción

public **SolrQuery::setTermsIncludeLowerBound**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Incluir el término de límite inferior en el conjunto de resultados.

### Parámetros

     flag


       Incluir el término de límite inferior en el conjunto de resultados





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsIncludeUpperBound

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsIncludeUpperBound — Incluir el término de límite superior en el conjunto de resultados

### Descripción

public **SolrQuery::setTermsIncludeUpperBound**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Incluir el término de límite superior en el conjunto de resultados.

### Parámetros

     flag


       **[true](#constant.true)** o **[false](#constant.false)**





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsLimit

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsLimit — Establece el número máximo de términos a devolver

### Descripción

public **SolrQuery::setTermsLimit**([int](#language.types.integer) $limit): [SolrQuery](#class.solrquery)

Establece el número máximo de términos a devolver

### Parámetros

     limit


       El número máximo de términos a devolver. Si el límite es negativo se devolverán todos los términos.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsLowerBound

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsLowerBound — Especifica el término de donde empezar

### Descripción

public **SolrQuery::setTermsLowerBound**([string](#language.types.string) $lowerBound): [SolrQuery](#class.solrquery)

Especifica el término de donde empezar

### Parámetros

     lowerBound


       El término límite inferior





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsMaxCount

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsMaxCount — Establece la frecuencia máxima de documentos

### Descripción

public **SolrQuery::setTermsMaxCount**([int](#language.types.integer) $frequency): [SolrQuery](#class.solrquery)

Establece la frecuencia máxima de documentos.

### Parámetros

     frequency


       La frecuencia máxima de documentos.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsMinCount

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsMinCount — Establece la frecuencia mínima de documentos

### Descripción

public **SolrQuery::setTermsMinCount**([int](#language.types.integer) $frequency): [SolrQuery](#class.solrquery)

Establece la frecuencia mínima de documentos a devolver para ser incluidos

### Parámetros

     frequency


       La frecuencia mínima





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsPrefix

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsPrefix — Restringe las coincidencias de términos que comienzan con el prefijo

### Descripción

public **SolrQuery::setTermsPrefix**([string](#language.types.string) $prefix): [SolrQuery](#class.solrquery)

Restringe las coincidencias de términos que comienzan con el prefijo

### Parámetros

     prefix


       Restringe las coincidencias de términos que comienzan con el prefijo





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsReturnRaw

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsReturnRaw — Devuelve los caracteres en bruto del término indexado

### Descripción

public **SolrQuery::setTermsReturnRaw**([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)

Si es true, devuelve los caracteres en bruto del término indexado, sin tener en cuenta si es legible por humanos.

### Parámetros

     value


       **[true](#constant.true)** o **[false](#constant.false)**





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsSort

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsSort — Especifica cómo ordenar los términos devueltos

### Descripción

public **SolrQuery::setTermsSort**([int](#language.types.integer) $sortType): [SolrQuery](#class.solrquery)

Si se usa SolrQuery::TERMS_SORT_COUNT, ordena los términos según la frecuencia del término (la mayor primero). Si se usa SolrQuery::TERMS_SORT_INDEX, devuelve los términos ordenados por índice

### Parámetros

     sortType


       SolrQuery::TERMS_SORT_INDEX o SolrQuery::TERMS_SORT_COUNT





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTermsUpperBound

(PECL solr &gt;= 0.9.2)

SolrQuery::setTermsUpperBound — Establece el término en el que parar

### Descripción

public **SolrQuery::setTermsUpperBound**([string](#language.types.string) $upperBound): [SolrQuery](#class.solrquery)

Establece el término en el que parar

### Parámetros

     upperBound


       El término en el que parar





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

# SolrQuery::setTimeAllowed

(PECL solr &gt;= 0.9.2)

SolrQuery::setTimeAllowed — El tiempo permitido para que la búsqueda finalice

### Descripción

public **SolrQuery::setTimeAllowed**([int](#language.types.integer) $timeAllowed): [SolrQuery](#class.solrquery)

El tiempo permitido para que la búsqueda finalice. Este valor sólo se aplica a la búsqueda y no a las solicitudes en general. Se mide en milisegundos. Los valores menores o iguales a cero implican la no restricción de tiempo. Se pueden devolver resultados parciales, si los hubiera.

### Parámetros

     timeAllowed


       El tiempo permitido para que la búsqueda finalice.





### Valores devueltos

Devuelve el objeto SolrQuery actual, si se usó el valor de retorno.

## Tabla de contenidos

- [SolrQuery::addExpandFilterQuery](#solrquery.addexpandfilterquery) — Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal
- [SolrQuery::addExpandSortField](#solrquery.addexpandsortfield) — Ordena los documentos en los grupos extendidos (parámetro expand.sort)
- [SolrQuery::addFacetDateField](#solrquery.addfacetdatefield) — Mapea a facet.date
- [SolrQuery::addFacetDateOther](#solrquery.addfacetdateother) — Añade otro parámetro facet.date.other
- [SolrQuery::addFacetField](#solrquery.addfacetfield) — Añade otro campo a la faceta
- [SolrQuery::addFacetQuery](#solrquery.addfacetquery) — Añade una consulta de faceta
- [SolrQuery::addField](#solrquery.addfield) — Especifica qué campos devolver en el resultado
- [SolrQuery::addFilterQuery](#solrquery.addfilterquery) — Especifica una consulta de filtro
- [SolrQuery::addGroupField](#solrquery.addgroupfield) — Añade un campo a utilizar para agrupar los resultados
- [SolrQuery::addGroupFunction](#solrquery.addgroupfunction) — Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)
- [SolrQuery::addGroupQuery](#solrquery.addgroupquery) — Permite agrupar los documentos que coinciden con la consulta dada
- [SolrQuery::addGroupSortField](#solrquery.addgroupsortfield) — Añade un campo de ordenación de grupo (argumento group.sort)
- [SolrQuery::addHighlightField](#solrquery.addhighlightfield) — Mapea a hl.fl
- [SolrQuery::addMltField](#solrquery.addmltfield) — Establece un campo para usarlo para similitud
- [SolrQuery::addMltQueryField](#solrquery.addmltqueryfield) — Mapea a mlt.qf
- [SolrQuery::addSortField](#solrquery.addsortfield) — Usado para controlar cómo deberían ordenarse los resultados
- [SolrQuery::addStatsFacet](#solrquery.addstatsfacet) — Recupera una devolución de subresultados para valores dentro de la faceta dada
- [SolrQuery::addStatsField](#solrquery.addstatsfield) — Mapea al parámetro stats.field
- [SolrQuery::collapse](#solrquery.collapse) — Reduce el resultado a un solo documento por grupo
- [SolrQuery::\_\_construct](#solrquery.construct) — Constructor
- [SolrQuery::\_\_destruct](#solrquery.destruct) — Destructor
- [SolrQuery::getExpand](#solrquery.getexpand) — Devuelve true si la extensión de grupo está activada
- [SolrQuery::getExpandFilterQueries](#solrquery.getexpandfilterqueries) — Devuelve las consultas de filtro de expansión
- [SolrQuery::getExpandQuery](#solrquery.getexpandquery) — Devuelve el parámetro de consulta de expansión expand.q
- [SolrQuery::getExpandRows](#solrquery.getexpandrows) — Devuelve el número de filas a mostrar en cada grupo (expand.rows)
- [SolrQuery::getExpandSortFields](#solrquery.getexpandsortfields) — Devuelve un array de campos
- [SolrQuery::getFacet](#solrquery.getfacet) — Devuelve el valor del parámetro facet
- [SolrQuery::getFacetDateEnd](#solrquery.getfacetdateend) — Devuelve el valor del parámetro facet.date.end
- [SolrQuery::getFacetDateFields](#solrquery.getfacetdatefields) — Devuelve todos los campos de facet.date
- [SolrQuery::getFacetDateGap](#solrquery.getfacetdategap) — Devuelve el valor del parámetro facet.date.gap
- [SolrQuery::getFacetDateHardEnd](#solrquery.getfacetdatehardend) — Devuelve el valor del parámetro facet.date.hardend
- [SolrQuery::getFacetDateOther](#solrquery.getfacetdateother) — Devuelve el valor del parámetro facet.date.other
- [SolrQuery::getFacetDateStart](#solrquery.getfacetdatestart) — Devuelve el límite inferior del primer rango de datos para todas las facetas de fecha de este campo
- [SolrQuery::getFacetFields](#solrquery.getfacetfields) — Devuelve todos los campos facet
- [SolrQuery::getFacetLimit](#solrquery.getfacetlimit) — Devuelve el número máximo de restricciones que deberían ser devueltas por los campos facet
- [SolrQuery::getFacetMethod](#solrquery.getfacetmethod) — Devuelve el valor del parámetro facet.method
- [SolrQuery::getFacetMinCount](#solrquery.getfacetmincount) — Devuelve el mínimo de facetas que deberían ser incluidas en la respuesta
- [SolrQuery::getFacetMissing](#solrquery.getfacetmissing) — Devuelve el estado acutual del parámetro facet.missing
- [SolrQuery::getFacetOffset](#solrquery.getfacetoffset) — Devuelve un índice dentro de la lista de restricciones para ser usado en paginación
- [SolrQuery::getFacetPrefix](#solrquery.getfacetprefix) — Devuelve el prefijo de faceta
- [SolrQuery::getFacetQueries](#solrquery.getfacetqueries) — Devuelve todas las consultas de facetas
- [SolrQuery::getFacetSort](#solrquery.getfacetsort) — Devuelve el tipo de ordenación de la faceta
- [SolrQuery::getFields](#solrquery.getfields) — Devuelve la lista de campos que serán devueltos en la respuesta
- [SolrQuery::getFilterQueries](#solrquery.getfilterqueries) — Devuelve una matriz de consultas de filtro
- [SolrQuery::getGroup](#solrquery.getgroup) — Indica si el agrupamiento está activado
- [SolrQuery::getGroupCachePercent](#solrquery.getgroupcachepercent) — Devuelve el valor del porcentaje de caché de grupo
- [SolrQuery::getGroupFacet](#solrquery.getgroupfacet) — Devuelve el valor del parámetro group.facet
- [SolrQuery::getGroupFields](#solrquery.getgroupfields) — Devuelve los campos de grupo (valores del argumento group.field)
- [SolrQuery::getGroupFormat](#solrquery.getgroupformat) — Devuelve el valor de group.format
- [SolrQuery::getGroupFunctions](#solrquery.getgroupfunctions) — Devuelve las funciones de grupo (valores del argumento group.func)
- [SolrQuery::getGroupLimit](#solrquery.getgrouplimit) — Devuelve el valor de group.limit
- [SolrQuery::getGroupMain](#solrquery.getgroupmain) — Devuelve el valor de group.main
- [SolrQuery::getGroupNGroups](#solrquery.getgroupngroups) — Devuelve el valor de group.ngroups
- [SolrQuery::getGroupOffset](#solrquery.getgroupoffset) — Devuelve el valor de group.offset
- [SolrQuery::getGroupQueries](#solrquery.getgroupqueries) — Devuelve todos los valores del parámetro group.query
- [SolrQuery::getGroupSortFields](#solrquery.getgroupsortfields) — Devuelve el valor de group.sort
- [SolrQuery::getGroupTruncate](#solrquery.getgrouptruncate) — Devuelve el valor de group.truncate
- [SolrQuery::getHighlight](#solrquery.gethighlight) — Devuelve el estado del parámtero hl
- [SolrQuery::getHighlightAlternateField](#solrquery.gethighlightalternatefield) — Devuelve el campo remarcado para usarlo como copia de seguridad o como predeterminado
- [SolrQuery::getHighlightFields](#solrquery.gethighlightfields) — Devuelve todos los campos que Solr debería generar para remarcación de trozos
- [SolrQuery::getHighlightFormatter](#solrquery.gethighlightformatter) — Devuelve el formateador de la salida remarcada
- [SolrQuery::getHighlightFragmenter](#solrquery.gethighlightfragmenter) — Devuelve el generador de trozos de texto para el texto remarcado
- [SolrQuery::getHighlightFragsize](#solrquery.gethighlightfragsize) — Devuelve el número de caracteres de fragmentos a considerar para remarcación
- [SolrQuery::getHighlightHighlightMultiTerm](#solrquery.gethighlighthighlightmultiterm) — Devuelve si habilitar o no la remarcación de consultas range/wildcard/fuzzy/prefix
- [SolrQuery::getHighlightMaxAlternateFieldLength](#solrquery.gethighlightmaxalternatefieldlength) — Devuelve el número máximo de caracteres del campo a devolver
- [SolrQuery::getHighlightMaxAnalyzedChars](#solrquery.gethighlightmaxanalyzedchars) — Devuelve el número máximo de caracteres de un documento para buscar trozos adecuados
- [SolrQuery::getHighlightMergeContiguous](#solrquery.gethighlightmergecontiguous) — Devuelve si colapsar o no fragmentos contiguos en un único fragmento
- [SolrQuery::getHighlightQuery](#solrquery.gethighlightquery) — Devuelve la consulta de resaltado (hl.q)
- [SolrQuery::getHighlightRegexMaxAnalyzedChars](#solrquery.gethighlightregexmaxanalyzedchars) — Devuelve el número máximo de caracteres de un campo cuando se usa el fragmentador de expresiones regulares
- [SolrQuery::getHighlightRegexPattern](#solrquery.gethighlightregexpattern) — Devuelve la expresión regular para la fragmentación
- [SolrQuery::getHighlightRegexSlop](#solrquery.gethighlightregexslop) — Devuelve el factor de desviación del tamaño de fragmento ideal
- [SolrQuery::getHighlightRequireFieldMatch](#solrquery.gethighlightrequirefieldmatch) — Devuelve si un campo será remarcado solamente si la consulta coincide con este campo en particular
- [SolrQuery::getHighlightSimplePost](#solrquery.gethighlightsimplepost) — Devuelve el texto que aparece después de un término remarcado
- [SolrQuery::getHighlightSimplePre](#solrquery.gethighlightsimplepre) — Devuelve el texto que aparece antes de un término remarcado
- [SolrQuery::getHighlightSnippets](#solrquery.gethighlightsnippets) — Devuelve el número máximo de trozos remarcados a generar por campo
- [SolrQuery::getHighlightUsePhraseHighlighter](#solrquery.gethighlightusephrasehighlighter) — Devuelve el estado del parámetro hl.usePhraseHighlighter
- [SolrQuery::getMlt](#solrquery.getmlt) — Devuelve si los resultados MoreLikeThis deberían o no ser habilitados
- [SolrQuery::getMltBoost](#solrquery.getmltboost) — Devuelve si la consulta será impulsada (boost) o no mediante la relevancia del térmido de interés
- [SolrQuery::getMltCount](#solrquery.getmltcount) — Devuelve el número de documentos similares a devolver para cada resultado
- [SolrQuery::getMltFields](#solrquery.getmltfields) — Devuelve todos los campos a usar para similitud
- [SolrQuery::getMltMaxNumQueryTerms](#solrquery.getmltmaxnumqueryterms) — Devuelve el número máximo de términos de consultas que serán incluidos en cualquier consulta generada
- [SolrQuery::getMltMaxNumTokens](#solrquery.getmltmaxnumtokens) — Devuelve el número máximo de tokens a analizar en cada campo del documento que no esté almacenado con soporte TermVector
- [SolrQuery::getMltMaxWordLength](#solrquery.getmltmaxwordlength) — Devuelve la longitud máxima de palabra de las palabras que serán ignoradas
- [SolrQuery::getMltMinDocFrequency](#solrquery.getmltmindocfrequency) — Devuelve el umbral de frecuencia en el que las palabras que no ocurran en por lo menos tantos documentos como este serán ignoradas
- [SolrQuery::getMltMinTermFrequency](#solrquery.getmltmintermfrequency) — Devuelve la frecuencia bajo la cual los términos serán ignorados en el documento fuente
- [SolrQuery::getMltMinWordLength](#solrquery.getmltminwordlength) — Devuelve la longitud máxima de palabra bajo la cual las palabras serán ignoradas
- [SolrQuery::getMltQueryFields](#solrquery.getmltqueryfields) — Devuelve los campos de consultas y sus boosts
- [SolrQuery::getQuery](#solrquery.getquery) — Devuelve la consulta principal
- [SolrQuery::getRows](#solrquery.getrows) — Devuelve el número máximo de documentos
- [SolrQuery::getSortFields](#solrquery.getsortfields) — Devuelve todos los campos de ordenación
- [SolrQuery::getStart](#solrquery.getstart) — Devuelve el índice del conjunto de resultados completo
- [SolrQuery::getStats](#solrquery.getstats) — Devuelve si están habilitadas o no las estadísticas
- [SolrQuery::getStatsFacets](#solrquery.getstatsfacets) — Devuelve todas las estadísticas de las facetas que fueron establecidas
- [SolrQuery::getStatsFields](#solrquery.getstatsfields) — Devuelve todas las estadísticas de los campos
- [SolrQuery::getTerms](#solrquery.getterms) — Devuelve si está habilitado o no TermsComponent
- [SolrQuery::getTermsField](#solrquery.gettermsfield) — Devuelve el campo desde el cuál los términos son recuperados
- [SolrQuery::getTermsIncludeLowerBound](#solrquery.gettermsincludelowerbound) — Devuelve si incluir o no el límite inferior en el conjunto de resultados
- [SolrQuery::getTermsIncludeUpperBound](#solrquery.gettermsincludeupperbound) — Devuelve si incluir o no el término de límite superior en el conjunto de resultados
- [SolrQuery::getTermsLimit](#solrquery.gettermslimit) — Devuelve el número máximo de términos que debería devolver Solr
- [SolrQuery::getTermsLowerBound](#solrquery.gettermslowerbound) — Devuelve el término en el que comenzar
- [SolrQuery::getTermsMaxCount](#solrquery.gettermsmaxcount) — Devuelve la frecuencia de documento máxima
- [SolrQuery::getTermsMinCount](#solrquery.gettermsmincount) — Devuelve la frecuencia de documento mínima a devolver para ser incluido
- [SolrQuery::getTermsPrefix](#solrquery.gettermsprefix) — Devuelve el prefijo del término
- [SolrQuery::getTermsReturnRaw](#solrquery.gettermsreturnraw) — Si devolver o no caracteres en bruto
- [SolrQuery::getTermsSort](#solrquery.gettermssort) — Devuelve un entero indicando cómo son ordenados los términos
- [SolrQuery::getTermsUpperBound](#solrquery.gettermsupperbound) — Devuelve el término en donde parar
- [SolrQuery::getTimeAllowed](#solrquery.gettimeallowed) — Devuelve el tiempo en milisegundos permitido para que la consulta finalice
- [SolrQuery::removeExpandFilterQuery](#solrquery.removeexpandfilterquery) — Elimina una consulta de filtro de extensión
- [SolrQuery::removeExpandSortField](#solrquery.removeexpandsortfield) — Elimina un campo de ordenación de expansión del parámetro expand.sort
- [SolrQuery::removeFacetDateField](#solrquery.removefacetdatefield) — Elimina uno de los campos de faceta de fecha
- [SolrQuery::removeFacetDateOther](#solrquery.removefacetdateother) — Elimina uno de los parámetros facet.date.other
- [SolrQuery::removeFacetField](#solrquery.removefacetfield) — Elimina uno de los parámetros facet.date
- [SolrQuery::removeFacetQuery](#solrquery.removefacetquery) — Elimina uno de los parámetros facet.query
- [SolrQuery::removeField](#solrquery.removefield) — Elimina un campo de la lista de campos
- [SolrQuery::removeFilterQuery](#solrquery.removefilterquery) — Elimina una consulta de filtro
- [SolrQuery::removeHighlightField](#solrquery.removehighlightfield) — Elimina uno de los campos usados para remarcación
- [SolrQuery::removeMltField](#solrquery.removemltfield) — Elimina uno de los campos moreLikeThis
- [SolrQuery::removeMltQueryField](#solrquery.removemltqueryfield) — Elimina uno de los campos de consulta moreLikeThis
- [SolrQuery::removeSortField](#solrquery.removesortfield) — Elimina uno de los campos de ordenación
- [SolrQuery::removeStatsFacet](#solrquery.removestatsfacet) — Elimina uno de los parámetros stats.facet
- [SolrQuery::removeStatsField](#solrquery.removestatsfield) — Elimina uno de los parámetros stats.field
- [SolrQuery::setEchoHandler](#solrquery.setechohandler) — Conmuta el parámetro echoHandler
- [SolrQuery::setEchoParams](#solrquery.setechoparams) — Determina qué tipo de parámetros incluir en la respuesta
- [SolrQuery::setExpand](#solrquery.setexpand) — Activa/desactiva el componente Expand
- [SolrQuery::setExpandQuery](#solrquery.setexpandquery) — Define el parámetro expand.q
- [SolrQuery::setExpandRows](#solrquery.setexpandrows) — Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5
- [SolrQuery::setExplainOther](#solrquery.setexplainother) — Establece el parámetro de consulta común explainOther
- [SolrQuery::setFacet](#solrquery.setfacet) — Mapea al parámetro facet. Habilita o deshabilta las facetas
- [SolrQuery::setFacetDateEnd](#solrquery.setfacetdateend) — Mapea a facet.date.end
- [SolrQuery::setFacetDateGap](#solrquery.setfacetdategap) — Mapea a facet.date.gap
- [SolrQuery::setFacetDateHardEnd](#solrquery.setfacetdatehardend) — Mapea a facet.date.hardend
- [SolrQuery::setFacetDateStart](#solrquery.setfacetdatestart) — Mapea a facet.date.start
- [SolrQuery::setFacetEnumCacheMinDefaultFrequency](#solrquery.setfacetenumcachemindefaultfrequency) — Establece la frecuencia de documento mínima usada para determinar la cuenta de términos
- [SolrQuery::setFacetLimit](#solrquery.setfacetlimit) — Mapea a facet.limit
- [SolrQuery::setFacetMethod](#solrquery.setfacetmethod) — Especifica el tipo de algoritmo a usar cuando se hace una faceta a un campo
- [SolrQuery::setFacetMinCount](#solrquery.setfacetmincount) — Mapea a facet.mincount
- [SolrQuery::setFacetMissing](#solrquery.setfacetmissing) — Mapea a facet.missing
- [SolrQuery::setFacetOffset](#solrquery.setfacetoffset) — Establece el índice de la lista de restricciones para tener en cuenta la paginación
- [SolrQuery::setFacetPrefix](#solrquery.setfacetprefix) — Especifica un prefijo de cadena con el que limitar los términos a los que hacer una faceta
- [SolrQuery::setFacetSort](#solrquery.setfacetsort) — Determina el orden de las restricciones de campos de faceta
- [SolrQuery::setGroup](#solrquery.setgroup) — Activa/desactiva el agrupamiento de resultados (parámetro group)
- [SolrQuery::setGroupCachePercent](#solrquery.setgroupcachepercent) — Define el porcentaje de caché para el agrupamiento de resultados
- [SolrQuery::setGroupFacet](#solrquery.setgroupfacet) — Define el parámetro group.facet
- [SolrQuery::setGroupFormat](#solrquery.setgroupformat) — Define el formato de grupo, la estructura de resultado (argumento group.format)
- [SolrQuery::setGroupLimit](#solrquery.setgrouplimit) — Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1
- [SolrQuery::setGroupMain](#solrquery.setgroupmain) — Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple
- [SolrQuery::setGroupNGroups](#solrquery.setgroupngroups) — Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados
- [SolrQuery::setGroupOffset](#solrquery.setgroupoffset) — Define el parámetro group.offset
- [SolrQuery::setGroupTruncate](#solrquery.setgrouptruncate) — Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta
- [SolrQuery::setHighlight](#solrquery.sethighlight) — Habilita o deshabilita la remarcación
- [SolrQuery::setHighlightAlternateField](#solrquery.sethighlightalternatefield) — Especifica el campo de copia de seguridad a usar
- [SolrQuery::setHighlightFormatter](#solrquery.sethighlightformatter) — Especifica un formateador para la salida resaltada
- [SolrQuery::setHighlightFragmenter](#solrquery.sethighlightfragmenter) — Establece el generador de trozos de código para texto remarcado
- [SolrQuery::setHighlightFragsize](#solrquery.sethighlightfragsize) — El tamaño de los fragmentos a considerara para remarcación
- [SolrQuery::setHighlightHighlightMultiTerm](#solrquery.sethighlighthighlightmultiterm) — Usa SpanScorer para remarcar términos de frases
- [SolrQuery::setHighlightMaxAlternateFieldLength](#solrquery.sethighlightmaxalternatefieldlength) — Establece el número máximo de caracteres del campo a devolver
- [SolrQuery::setHighlightMaxAnalyzedChars](#solrquery.sethighlightmaxanalyzedchars) — Especifica el número de caracteres de un documento para buscar trozos apropiados
- [SolrQuery::setHighlightMergeContiguous](#solrquery.sethighlightmergecontiguous) — Si colapsar o no fragmentos contiguos en un único fragmento
- [SolrQuery::setHighlightQuery](#solrquery.sethighlightquery) — Una consulta designada para la resaltación (hl.q)
- [SolrQuery::setHighlightRegexMaxAnalyzedChars](#solrquery.sethighlightregexmaxanalyzedchars) — Especifica el número máximo de caracteres a analizar
- [SolrQuery::setHighlightRegexPattern](#solrquery.sethighlightregexpattern) — Especifica la expresión regular para la fragmentación
- [SolrQuery::setHighlightRegexSlop](#solrquery.sethighlightregexslop) — Establece el factor por el cual el fragmentador de expresiones regulares puede desviarse del tamaño de fragmento ideal
- [SolrQuery::setHighlightRequireFieldMatch](#solrquery.sethighlightrequirefieldmatch) — Requerir la coincicencia de campos durante el remarcado
- [SolrQuery::setHighlightSimplePost](#solrquery.sethighlightsimplepost) — Define el texto que debe aparecer después de un término resaltado
- [SolrQuery::setHighlightSimplePre](#solrquery.sethighlightsimplepre) — Establece el texto que aparece antes de un término remarcado
- [SolrQuery::setHighlightSnippets](#solrquery.sethighlightsnippets) — Establece el número máximo de trozos remarcados para generar por campo
- [SolrQuery::setHighlightUsePhraseHighlighter](#solrquery.sethighlightusephrasehighlighter) — Si remarcar o no términos de frases sólo cuando aparecen en la frase de consulta
- [SolrQuery::setMlt](#solrquery.setmlt) — Habilita o deshabilita moreLikeThis
- [SolrQuery::setMltBoost](#solrquery.setmltboost) — Establecer si la consulta será impulsada (boost) por la relevancia del término de interés
- [SolrQuery::setMltCount](#solrquery.setmltcount) — Establece el número de documentos similares a devolver en cada resultado
- [SolrQuery::setMltMaxNumQueryTerms](#solrquery.setmltmaxnumqueryterms) — Establece el número máximo de términos de consulta incluidos
- [SolrQuery::setMltMaxNumTokens](#solrquery.setmltmaxnumtokens) — Especifica el número máximo de tokens a analizar
- [SolrQuery::setMltMaxWordLength](#solrquery.setmltmaxwordlength) — Establece la longitud de palabra máxima
- [SolrQuery::setMltMinDocFrequency](#solrquery.setmltmindocfrequency) — Establece la frecuencia de mltMinDoc
- [SolrQuery::setMltMinTermFrequency](#solrquery.setmltmintermfrequency) — Establece la frecuencia bajo la cual los términos serán ignorados en los documentos fuente
- [SolrQuery::setMltMinWordLength](#solrquery.setmltminwordlength) — Establece la longitud de palabra mínima
- [SolrQuery::setOmitHeader](#solrquery.setomitheader) — Excluye la cabecera de los resultados devueltos
- [SolrQuery::setQuery](#solrquery.setquery) — Establece la consulta de búsqueda
- [SolrQuery::setRows](#solrquery.setrows) — Especifica el número máximo de filas a devolver en el resultado
- [SolrQuery::setShowDebugInfo](#solrquery.setshowdebuginfo) — Bandera para mostrar información de depuración
- [SolrQuery::setStart](#solrquery.setstart) — Especifica el número de filas que se van a saltar
- [SolrQuery::setStats](#solrquery.setstats) — Habilita o deshablita el componente de estadísticas
- [SolrQuery::setTerms](#solrquery.setterms) — Habilita o deshablita TermsComponent
- [SolrQuery::setTermsField](#solrquery.settermsfield) — Establece el nombre del campo del que obtener los términos
- [SolrQuery::setTermsIncludeLowerBound](#solrquery.settermsincludelowerbound) — Incluir el término de límite inferior en el conjunto de resultados
- [SolrQuery::setTermsIncludeUpperBound](#solrquery.settermsincludeupperbound) — Incluir el término de límite superior en el conjunto de resultados
- [SolrQuery::setTermsLimit](#solrquery.settermslimit) — Establece el número máximo de términos a devolver
- [SolrQuery::setTermsLowerBound](#solrquery.settermslowerbound) — Especifica el término de donde empezar
- [SolrQuery::setTermsMaxCount](#solrquery.settermsmaxcount) — Establece la frecuencia máxima de documentos
- [SolrQuery::setTermsMinCount](#solrquery.settermsmincount) — Establece la frecuencia mínima de documentos
- [SolrQuery::setTermsPrefix](#solrquery.settermsprefix) — Restringe las coincidencias de términos que comienzan con el prefijo
- [SolrQuery::setTermsReturnRaw](#solrquery.settermsreturnraw) — Devuelve los caracteres en bruto del término indexado
- [SolrQuery::setTermsSort](#solrquery.settermssort) — Especifica cómo ordenar los términos devueltos
- [SolrQuery::setTermsUpperBound](#solrquery.settermsupperbound) — Establece el término en el que parar
- [SolrQuery::setTimeAllowed](#solrquery.settimeallowed) — El tiempo permitido para que la búsqueda finalice

# La clase SolrDisMaxQuery

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

    ****




      class **SolrDisMaxQuery**



      extends
       [SolrQuery](#class.solrquery)


     implements
       [Serializable](#class.serializable) {


    /* Propiedades heredadas */

     const
     [int](#language.types.integer)
      [SolrQuery::ORDER_ASC](#solrquery.constants.order-asc) = 0;

const
[int](#language.types.integer)
[SolrQuery::ORDER_DESC](#solrquery.constants.order-desc) = 1;
const
[int](#language.types.integer)
[SolrQuery::FACET_SORT_INDEX](#solrquery.constants.facet-sort-index) = 0;
const
[int](#language.types.integer)
[SolrQuery::FACET_SORT_COUNT](#solrquery.constants.facet-sort-count) = 1;
const
[int](#language.types.integer)
[SolrQuery::TERMS_SORT_INDEX](#solrquery.constants.terms-sort-index) = 0;
const
[int](#language.types.integer)
[SolrQuery::TERMS_SORT_COUNT](#solrquery.constants.terms-sort-count) = 1;

    /* Métodos */

public [\_\_construct](#solrdismaxquery.construct)([string](#language.types.string) $q = ?)

    public [addBigramPhraseField](#solrdismaxquery.addbigramphrasefield)([string](#language.types.string) $field, [string](#language.types.string) $boost, [string](#language.types.string) $slop = ?): [SolrDisMaxQuery](#class.solrdismaxquery)

public [addBoostQuery](#solrdismaxquery.addboostquery)([string](#language.types.string) $field, [string](#language.types.string) $value, [string](#language.types.string) $boost = ?): [SolrDisMaxQuery](#class.solrdismaxquery)
public [addPhraseField](#solrdismaxquery.addphrasefield)([string](#language.types.string) $field, [string](#language.types.string) $boost, [string](#language.types.string) $slop = ?): [SolrDisMaxQuery](#class.solrdismaxquery)
public [addQueryField](#solrdismaxquery.addqueryfield)([string](#language.types.string) $field, [string](#language.types.string) $boost = ?): [SolrDisMaxQuery](#class.solrdismaxquery)
public [addTrigramPhraseField](#solrdismaxquery.addtrigramphrasefield)([string](#language.types.string) $field, [string](#language.types.string) $boost, [string](#language.types.string) $slop = ?): [SolrDisMaxQuery](#class.solrdismaxquery)
public [addUserField](#solrdismaxquery.adduserfield)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [removeBigramPhraseField](#solrdismaxquery.removebigramphrasefield)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [removeBoostQuery](#solrdismaxquery.removeboostquery)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [removePhraseField](#solrdismaxquery.removephrasefield)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [removeQueryField](#solrdismaxquery.removequeryfield)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [removeTrigramPhraseField](#solrdismaxquery.removetrigramphrasefield)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [removeUserField](#solrdismaxquery.removeuserfield)([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setBigramPhraseFields](#solrdismaxquery.setbigramphrasefields)([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setBigramPhraseSlop](#solrdismaxquery.setbigramphraseslop)([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setBoostFunction](#solrdismaxquery.setboostfunction)([string](#language.types.string) $function): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setBoostQuery](#solrdismaxquery.setboostquery)([string](#language.types.string) $q): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setMinimumMatch](#solrdismaxquery.setminimummatch)([string](#language.types.string) $value): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setPhraseFields](#solrdismaxquery.setphrasefields)([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setPhraseSlop](#solrdismaxquery.setphraseslop)([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setQueryAlt](#solrdismaxquery.setqueryalt)([string](#language.types.string) $q): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setQueryPhraseSlop](#solrdismaxquery.setqueryphraseslop)([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setTieBreaker](#solrdismaxquery.settiebreaker)([string](#language.types.string) $tieBreaker): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setTrigramPhraseFields](#solrdismaxquery.settrigramphrasefields)([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setTrigramPhraseSlop](#solrdismaxquery.settrigramphraseslop)([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)
public [setUserFields](#solrdismaxquery.setuserfields)([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)
public [useDisMaxQueryParser](#solrdismaxquery.usedismaxqueryparser)(): [SolrDisMaxQuery](#class.solrdismaxquery)
public [useEDisMaxQueryParser](#solrdismaxquery.useedismaxqueryparser)(): [SolrDisMaxQuery](#class.solrdismaxquery)

    /* Métodos heredados */
    public [SolrQuery::addExpandFilterQuery](#solrquery.addexpandfilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)

public [SolrQuery::addExpandSortField](#solrquery.addexpandsortfield)([string](#language.types.string) $field, [string](#language.types.string) $order = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::addFacetDateField](#solrquery.addfacetdatefield)([string](#language.types.string) $dateField): [SolrQuery](#class.solrquery)
public [SolrQuery::addFacetDateOther](#solrquery.addfacetdateother)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::addFacetField](#solrquery.addfacetfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::addFacetQuery](#solrquery.addfacetquery)([string](#language.types.string) $facetQuery): [SolrQuery](#class.solrquery)
public [SolrQuery::addField](#solrquery.addfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::addFilterQuery](#solrquery.addfilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)
public [SolrQuery::addGroupField](#solrquery.addgroupfield)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::addGroupFunction](#solrquery.addgroupfunction)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::addGroupQuery](#solrquery.addgroupquery)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::addGroupSortField](#solrquery.addgroupsortfield)([string](#language.types.string) $field, [int](#language.types.integer) $order = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::addHighlightField](#solrquery.addhighlightfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::addMltField](#solrquery.addmltfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::addMltQueryField](#solrquery.addmltqueryfield)([string](#language.types.string) $field, [float](#language.types.float) $boost): [SolrQuery](#class.solrquery)
public [SolrQuery::addSortField](#solrquery.addsortfield)([string](#language.types.string) $field, [int](#language.types.integer) $order = SolrQuery::ORDER_DESC): [SolrQuery](#class.solrquery)
public [SolrQuery::addStatsFacet](#solrquery.addstatsfacet)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::addStatsField](#solrquery.addstatsfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::collapse](#solrquery.collapse)([SolrCollapseFunction](#class.solrcollapsefunction) $collapseFunction): [SolrQuery](#class.solrquery)
public [SolrQuery::getExpand](#solrquery.getexpand)(): [bool](#language.types.boolean)
public [SolrQuery::getExpandFilterQueries](#solrquery.getexpandfilterqueries)(): [array](#language.types.array)
public [SolrQuery::getExpandQuery](#solrquery.getexpandquery)(): [array](#language.types.array)
public [SolrQuery::getExpandRows](#solrquery.getexpandrows)(): [int](#language.types.integer)
public [SolrQuery::getExpandSortFields](#solrquery.getexpandsortfields)(): [array](#language.types.array)
public [SolrQuery::getFacet](#solrquery.getfacet)(): [bool](#language.types.boolean)
public [SolrQuery::getFacetDateEnd](#solrquery.getfacetdateend)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getFacetDateFields](#solrquery.getfacetdatefields)(): [array](#language.types.array)
public [SolrQuery::getFacetDateGap](#solrquery.getfacetdategap)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getFacetDateHardEnd](#solrquery.getfacetdatehardend)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getFacetDateOther](#solrquery.getfacetdateother)([string](#language.types.string) $field_override = ?): [array](#language.types.array)
public [SolrQuery::getFacetDateStart](#solrquery.getfacetdatestart)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getFacetFields](#solrquery.getfacetfields)(): [array](#language.types.array)
public [SolrQuery::getFacetLimit](#solrquery.getfacetlimit)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getFacetMethod](#solrquery.getfacetmethod)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getFacetMinCount](#solrquery.getfacetmincount)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getFacetMissing](#solrquery.getfacetmissing)([string](#language.types.string) $field_override = ?): [bool](#language.types.boolean)
public [SolrQuery::getFacetOffset](#solrquery.getfacetoffset)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getFacetPrefix](#solrquery.getfacetprefix)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getFacetQueries](#solrquery.getfacetqueries)(): [array](#language.types.array)
public [SolrQuery::getFacetSort](#solrquery.getfacetsort)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getFields](#solrquery.getfields)(): [array](#language.types.array)
public [SolrQuery::getFilterQueries](#solrquery.getfilterqueries)(): [array](#language.types.array)
public [SolrQuery::getGroup](#solrquery.getgroup)(): [bool](#language.types.boolean)
public [SolrQuery::getGroupCachePercent](#solrquery.getgroupcachepercent)(): [int](#language.types.integer)
public [SolrQuery::getGroupFacet](#solrquery.getgroupfacet)(): [bool](#language.types.boolean)
public [SolrQuery::getGroupFields](#solrquery.getgroupfields)(): [array](#language.types.array)
public [SolrQuery::getGroupFormat](#solrquery.getgroupformat)(): [string](#language.types.string)
public [SolrQuery::getGroupFunctions](#solrquery.getgroupfunctions)(): [array](#language.types.array)
public [SolrQuery::getGroupLimit](#solrquery.getgrouplimit)(): [int](#language.types.integer)
public [SolrQuery::getGroupMain](#solrquery.getgroupmain)(): [bool](#language.types.boolean)
public [SolrQuery::getGroupNGroups](#solrquery.getgroupngroups)(): [bool](#language.types.boolean)
public [SolrQuery::getGroupOffset](#solrquery.getgroupoffset)(): [int](#language.types.integer)
public [SolrQuery::getGroupQueries](#solrquery.getgroupqueries)(): [array](#language.types.array)
public [SolrQuery::getGroupSortFields](#solrquery.getgroupsortfields)(): [array](#language.types.array)
public [SolrQuery::getGroupTruncate](#solrquery.getgrouptruncate)(): [bool](#language.types.boolean)
public [SolrQuery::getHighlight](#solrquery.gethighlight)(): [bool](#language.types.boolean)
public [SolrQuery::getHighlightAlternateField](#solrquery.gethighlightalternatefield)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getHighlightFields](#solrquery.gethighlightfields)(): [array](#language.types.array)
public [SolrQuery::getHighlightFormatter](#solrquery.gethighlightformatter)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getHighlightFragmenter](#solrquery.gethighlightfragmenter)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getHighlightFragsize](#solrquery.gethighlightfragsize)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getHighlightHighlightMultiTerm](#solrquery.gethighlighthighlightmultiterm)(): [bool](#language.types.boolean)
public [SolrQuery::getHighlightMaxAlternateFieldLength](#solrquery.gethighlightmaxalternatefieldlength)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getHighlightMaxAnalyzedChars](#solrquery.gethighlightmaxanalyzedchars)(): [int](#language.types.integer)
public [SolrQuery::getHighlightMergeContiguous](#solrquery.gethighlightmergecontiguous)([string](#language.types.string) $field_override = ?): [bool](#language.types.boolean)
public [SolrQuery::getHighlightQuery](#solrquery.gethighlightquery)(): [string](#language.types.string)
public [SolrQuery::getHighlightRegexMaxAnalyzedChars](#solrquery.gethighlightregexmaxanalyzedchars)(): [int](#language.types.integer)
public [SolrQuery::getHighlightRegexPattern](#solrquery.gethighlightregexpattern)(): [string](#language.types.string)
public [SolrQuery::getHighlightRegexSlop](#solrquery.gethighlightregexslop)(): [float](#language.types.float)
public [SolrQuery::getHighlightRequireFieldMatch](#solrquery.gethighlightrequirefieldmatch)(): [bool](#language.types.boolean)
public [SolrQuery::getHighlightSimplePost](#solrquery.gethighlightsimplepost)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getHighlightSimplePre](#solrquery.gethighlightsimplepre)([string](#language.types.string) $field_override = ?): [string](#language.types.string)
public [SolrQuery::getHighlightSnippets](#solrquery.gethighlightsnippets)([string](#language.types.string) $field_override = ?): [int](#language.types.integer)
public [SolrQuery::getHighlightUsePhraseHighlighter](#solrquery.gethighlightusephrasehighlighter)(): [bool](#language.types.boolean)
public [SolrQuery::getMlt](#solrquery.getmlt)(): [bool](#language.types.boolean)
public [SolrQuery::getMltBoost](#solrquery.getmltboost)(): [bool](#language.types.boolean)
public [SolrQuery::getMltCount](#solrquery.getmltcount)(): [int](#language.types.integer)
public [SolrQuery::getMltFields](#solrquery.getmltfields)(): [array](#language.types.array)
public [SolrQuery::getMltMaxNumQueryTerms](#solrquery.getmltmaxnumqueryterms)(): [int](#language.types.integer)
public [SolrQuery::getMltMaxNumTokens](#solrquery.getmltmaxnumtokens)(): [int](#language.types.integer)
public [SolrQuery::getMltMaxWordLength](#solrquery.getmltmaxwordlength)(): [int](#language.types.integer)
public [SolrQuery::getMltMinDocFrequency](#solrquery.getmltmindocfrequency)(): [int](#language.types.integer)
public [SolrQuery::getMltMinTermFrequency](#solrquery.getmltmintermfrequency)(): [int](#language.types.integer)
public [SolrQuery::getMltMinWordLength](#solrquery.getmltminwordlength)(): [int](#language.types.integer)
public [SolrQuery::getMltQueryFields](#solrquery.getmltqueryfields)(): [array](#language.types.array)
public [SolrQuery::getQuery](#solrquery.getquery)(): [string](#language.types.string)
public [SolrQuery::getRows](#solrquery.getrows)(): [int](#language.types.integer)
public [SolrQuery::getSortFields](#solrquery.getsortfields)(): [array](#language.types.array)
public [SolrQuery::getStart](#solrquery.getstart)(): [int](#language.types.integer)
public [SolrQuery::getStats](#solrquery.getstats)(): [bool](#language.types.boolean)
public [SolrQuery::getStatsFacets](#solrquery.getstatsfacets)(): [array](#language.types.array)
public [SolrQuery::getStatsFields](#solrquery.getstatsfields)(): [array](#language.types.array)
public [SolrQuery::getTerms](#solrquery.getterms)(): [bool](#language.types.boolean)
public [SolrQuery::getTermsField](#solrquery.gettermsfield)(): [string](#language.types.string)
public [SolrQuery::getTermsIncludeLowerBound](#solrquery.gettermsincludelowerbound)(): [bool](#language.types.boolean)
public [SolrQuery::getTermsIncludeUpperBound](#solrquery.gettermsincludeupperbound)(): [bool](#language.types.boolean)
public [SolrQuery::getTermsLimit](#solrquery.gettermslimit)(): [int](#language.types.integer)
public [SolrQuery::getTermsLowerBound](#solrquery.gettermslowerbound)(): [string](#language.types.string)
public [SolrQuery::getTermsMaxCount](#solrquery.gettermsmaxcount)(): [int](#language.types.integer)
public [SolrQuery::getTermsMinCount](#solrquery.gettermsmincount)(): [int](#language.types.integer)
public [SolrQuery::getTermsPrefix](#solrquery.gettermsprefix)(): [string](#language.types.string)
public [SolrQuery::getTermsReturnRaw](#solrquery.gettermsreturnraw)(): [bool](#language.types.boolean)
public [SolrQuery::getTermsSort](#solrquery.gettermssort)(): [int](#language.types.integer)
public [SolrQuery::getTermsUpperBound](#solrquery.gettermsupperbound)(): [string](#language.types.string)
public [SolrQuery::getTimeAllowed](#solrquery.gettimeallowed)(): [int](#language.types.integer)
public [SolrQuery::removeExpandFilterQuery](#solrquery.removeexpandfilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)
public [SolrQuery::removeExpandSortField](#solrquery.removeexpandsortfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeFacetDateField](#solrquery.removefacetdatefield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeFacetDateOther](#solrquery.removefacetdateother)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::removeFacetField](#solrquery.removefacetfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeFacetQuery](#solrquery.removefacetquery)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::removeField](#solrquery.removefield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeFilterQuery](#solrquery.removefilterquery)([string](#language.types.string) $fq): [SolrQuery](#class.solrquery)
public [SolrQuery::removeHighlightField](#solrquery.removehighlightfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeMltField](#solrquery.removemltfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeMltQueryField](#solrquery.removemltqueryfield)([string](#language.types.string) $queryField): [SolrQuery](#class.solrquery)
public [SolrQuery::removeSortField](#solrquery.removesortfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::removeStatsFacet](#solrquery.removestatsfacet)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::removeStatsField](#solrquery.removestatsfield)([string](#language.types.string) $field): [SolrQuery](#class.solrquery)
public [SolrQuery::setEchoHandler](#solrquery.setechohandler)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setEchoParams](#solrquery.setechoparams)([string](#language.types.string) $type): [SolrQuery](#class.solrquery)
public [SolrQuery::setExpand](#solrquery.setexpand)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setExpandQuery](#solrquery.setexpandquery)([string](#language.types.string) $q): [SolrQuery](#class.solrquery)
public [SolrQuery::setExpandRows](#solrquery.setexpandrows)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setExplainOther](#solrquery.setexplainother)([string](#language.types.string) $query): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacet](#solrquery.setfacet)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetDateEnd](#solrquery.setfacetdateend)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetDateGap](#solrquery.setfacetdategap)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetDateHardEnd](#solrquery.setfacetdatehardend)([bool](#language.types.boolean) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetDateStart](#solrquery.setfacetdatestart)([string](#language.types.string) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetEnumCacheMinDefaultFrequency](#solrquery.setfacetenumcachemindefaultfrequency)([int](#language.types.integer) $frequency, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetLimit](#solrquery.setfacetlimit)([int](#language.types.integer) $limit, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetMethod](#solrquery.setfacetmethod)([string](#language.types.string) $method, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetMinCount](#solrquery.setfacetmincount)([int](#language.types.integer) $mincount, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetMissing](#solrquery.setfacetmissing)([bool](#language.types.boolean) $flag, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetOffset](#solrquery.setfacetoffset)([int](#language.types.integer) $offset, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetPrefix](#solrquery.setfacetprefix)([string](#language.types.string) $prefix, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setFacetSort](#solrquery.setfacetsort)([int](#language.types.integer) $facetSort, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroup](#solrquery.setgroup)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupCachePercent](#solrquery.setgroupcachepercent)([int](#language.types.integer) $percent): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupFacet](#solrquery.setgroupfacet)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupFormat](#solrquery.setgroupformat)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupLimit](#solrquery.setgrouplimit)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupMain](#solrquery.setgroupmain)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupNGroups](#solrquery.setgroupngroups)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupOffset](#solrquery.setgroupoffset)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setGroupTruncate](#solrquery.setgrouptruncate)([bool](#language.types.boolean) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlight](#solrquery.sethighlight)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightAlternateField](#solrquery.sethighlightalternatefield)([string](#language.types.string) $field, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightFormatter](#solrquery.sethighlightformatter)([string](#language.types.string) $formatter, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightFragmenter](#solrquery.sethighlightfragmenter)([string](#language.types.string) $fragmenter, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightFragsize](#solrquery.sethighlightfragsize)([int](#language.types.integer) $size, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightHighlightMultiTerm](#solrquery.sethighlighthighlightmultiterm)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightMaxAlternateFieldLength](#solrquery.sethighlightmaxalternatefieldlength)([int](#language.types.integer) $fieldLength, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightMaxAnalyzedChars](#solrquery.sethighlightmaxanalyzedchars)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightMergeContiguous](#solrquery.sethighlightmergecontiguous)([bool](#language.types.boolean) $flag, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightQuery](#solrquery.sethighlightquery)([string](#language.types.string) $q): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightRegexMaxAnalyzedChars](#solrquery.sethighlightregexmaxanalyzedchars)([int](#language.types.integer) $maxAnalyzedChars): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightRegexPattern](#solrquery.sethighlightregexpattern)([string](#language.types.string) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightRegexSlop](#solrquery.sethighlightregexslop)([float](#language.types.float) $factor): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightRequireFieldMatch](#solrquery.sethighlightrequirefieldmatch)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightSimplePost](#solrquery.sethighlightsimplepost)([string](#language.types.string) $simplePost, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightSimplePre](#solrquery.sethighlightsimplepre)([string](#language.types.string) $simplePre, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightSnippets](#solrquery.sethighlightsnippets)([int](#language.types.integer) $value, [string](#language.types.string) $field_override = ?): [SolrQuery](#class.solrquery)
public [SolrQuery::setHighlightUsePhraseHighlighter](#solrquery.sethighlightusephrasehighlighter)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setMlt](#solrquery.setmlt)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltBoost](#solrquery.setmltboost)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltCount](#solrquery.setmltcount)([int](#language.types.integer) $count): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltMaxNumQueryTerms](#solrquery.setmltmaxnumqueryterms)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltMaxNumTokens](#solrquery.setmltmaxnumtokens)([int](#language.types.integer) $value): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltMaxWordLength](#solrquery.setmltmaxwordlength)([int](#language.types.integer) $maxWordLength): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltMinDocFrequency](#solrquery.setmltmindocfrequency)([int](#language.types.integer) $minDocFrequency): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltMinTermFrequency](#solrquery.setmltmintermfrequency)([int](#language.types.integer) $minTermFrequency): [SolrQuery](#class.solrquery)
public [SolrQuery::setMltMinWordLength](#solrquery.setmltminwordlength)([int](#language.types.integer) $minWordLength): [SolrQuery](#class.solrquery)
public [SolrQuery::setOmitHeader](#solrquery.setomitheader)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setQuery](#solrquery.setquery)([string](#language.types.string) $query): [SolrQuery](#class.solrquery)
public [SolrQuery::setRows](#solrquery.setrows)([int](#language.types.integer) $rows): [SolrQuery](#class.solrquery)
public [SolrQuery::setShowDebugInfo](#solrquery.setshowdebuginfo)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setStart](#solrquery.setstart)([int](#language.types.integer) $start): [SolrQuery](#class.solrquery)
public [SolrQuery::setStats](#solrquery.setstats)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setTerms](#solrquery.setterms)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsField](#solrquery.settermsfield)([string](#language.types.string) $fieldname): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsIncludeLowerBound](#solrquery.settermsincludelowerbound)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsIncludeUpperBound](#solrquery.settermsincludeupperbound)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsLimit](#solrquery.settermslimit)([int](#language.types.integer) $limit): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsLowerBound](#solrquery.settermslowerbound)([string](#language.types.string) $lowerBound): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsMaxCount](#solrquery.settermsmaxcount)([int](#language.types.integer) $frequency): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsMinCount](#solrquery.settermsmincount)([int](#language.types.integer) $frequency): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsPrefix](#solrquery.settermsprefix)([string](#language.types.string) $prefix): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsReturnRaw](#solrquery.settermsreturnraw)([bool](#language.types.boolean) $flag): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsSort](#solrquery.settermssort)([int](#language.types.integer) $sortType): [SolrQuery](#class.solrquery)
public [SolrQuery::setTermsUpperBound](#solrquery.settermsupperbound)([string](#language.types.string) $upperBound): [SolrQuery](#class.solrquery)
public [SolrQuery::setTimeAllowed](#solrquery.settimeallowed)([int](#language.types.integer) $timeAllowed): [SolrQuery](#class.solrquery)

}

## Constantes predefinidas

     **[SolrDisMaxQuery::ORDER_ASC](#solrdismaxquery.constants.order-asc)**

      Empleada para especificar que la ordenación debería ser ascendente (Duplicada para una migración sencilla)






     **[SolrDisMaxQuery::ORDER_DESC](#solrdismaxquery.constants.order-desc)**

      Empleada para especificar que la ordenación debería ser descendente (Duplicada para una migración sencilla)






     **[SolrDisMaxQuery::FACET_SORT_INDEX](#solrdismaxquery.constants.facet-sort-index)**

      Empleada para especificar que la faceta debería ordenarse por índice (Duplicada para una migración sencilla)






     **[SolrDisMaxQuery::FACET_SORT_COUNT](#solrdismaxquery.constants.facet-sort-count)**

      Empleada para especificar que la faceta debería ordenarse por cuenta (Duplicada para una migración sencilla)






     **[SolrDisMaxQuery::TERMS_SORT_INDEX](#solrdismaxquery.constants.terms-sort-index)**

      Empleada en TermsComponent (Duplicada para una migración sencilla)






     **[SolrDisMaxQuery::TERMS_SORT_COUNT](#solrdismaxquery.constants.terms-sort-count)**

      Empleada en TermsComponent (Duplicada para una migración sencilla)




# SolrDisMaxQuery::addBigramPhraseField

(No version information available, might only be in Git)

SolrDisMaxQuery::addBigramPhraseField — Añade un campo de bigrama de frase (argumento pf2)

### Descripción

public **SolrDisMaxQuery::addBigramPhraseField**([string](#language.types.string) $field, [string](#language.types.string) $boost, [string](#language.types.string) $slop = ?): [SolrDisMaxQuery](#class.solrdismaxquery)

    Añade un campo de bigrama de frase (argumento pf2)
    Formato de salida: campo~slop^boost OU campo^boost
    Slop es opcional

### Parámetros

    field









    boost









    slop





### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::addBigramPhraseField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery
-&gt;addBigramPhraseField('cat', 2, 5.1)
-&gt;addBigramPhraseField('feature', 4.5)
;
echo $dismaxQuery;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;pf2=cat~5.1^2 feature^4.5

### Ver también

- [SolrDisMaxQuery::removeBigramPhraseField()](#solrdismaxquery.removebigramphrasefield) - Elimina un campo de bigrama de frase (argumento pf2)

- [SolrDisMaxQuery::setBigramPhraseFields()](#solrdismaxquery.setbigramphrasefields) - Define los campos de frase bigrama y sus boosts (y márgenes) utilizando el argumento pf2

- [SolrDisMaxQuery::setBigramPhraseSlop()](#solrdismaxquery.setbigramphraseslop) - Define el margen de Bigram Phrase (parámetro ps2)

# SolrDisMaxQuery::addBoostQuery

(No version information available, might only be in Git)

SolrDisMaxQuery::addBoostQuery — Añade un campo de consulta de boost con valor y boost opcionales (argumento bq)

### Descripción

public **SolrDisMaxQuery::addBoostQuery**([string](#language.types.string) $field, [string](#language.types.string) $value, [string](#language.types.string) $boost = ?): [SolrDisMaxQuery](#class.solrdismaxquery)

    Añade un campo de consulta de boost con valor [y boost] (argumento bq)

### Parámetros

    field









    value









    boost





### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::addBoostQuery()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery
-&gt;addBoostQuery('cat', 'clothing', 2)
-&gt;addBoostQuery('cat', 'electronics', 5.1)
;
echo $dismaxQuery.PHP_EOL;
?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;bq=cat:clothing^2 cat:electronics^5.1

### Ver también

- [SolrDisMaxQuery::removeBoostQuery()](#solrdismaxquery.removeboostquery) - Elimina una parte de consulta de boost por nombre de campo (bq)

- [SolrDisMaxQuery::setBoostQuery()](#solrdismaxquery.setboostquery) - Define directamente el parámetro de consulta de boost (bq)

# SolrDisMaxQuery::addPhraseField

(No version information available, might only be in Git)

SolrDisMaxQuery::addPhraseField — Añade una frase de campo (argumento pf)

### Descripción

public **SolrDisMaxQuery::addPhraseField**([string](#language.types.string) $field, [string](#language.types.string) $boost, [string](#language.types.string) $slop = ?): [SolrDisMaxQuery](#class.solrdismaxquery)

    Añade una frase de campo (argumento pf)

### Parámetros

    field


      El nombre del campo






    boost









    slop





### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::addPhraseField()**

&lt;?php
$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery
-&gt;addPhraseField('cat', 3, 1)
-&gt;addPhraseField('third', 4, 2)
-&gt;addPhraseField('source', 55)
;
echo $dismaxQuery;
?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;pf=cat~1^3 third~2^4 source^55

### Ver también

- [SolrDisMaxQuery::removePhraseField()](#solrdismaxquery.removephrasefield) - Elimina un campo de frase (argumento pf)

- [SolrDisMaxQuery::setPhraseFields()](#solrdismaxquery.setphrasefields) - Define los campos de frase y sus boosts (y slops) utilizando el parámetro pf2

# SolrDisMaxQuery::addQueryField

(No version information available, might only be in Git)

SolrDisMaxQuery::addQueryField — Añade un campo de consulta con boost opcional (argumento qf)

### Descripción

public **SolrDisMaxQuery::addQueryField**([string](#language.types.string) $field, [string](#language.types.string) $boost = ?): [SolrDisMaxQuery](#class.solrdismaxquery)

    Añade un campo de consulta con boost opcional (argumento qf)

### Parámetros

    field


      El nombre del campo






    boost


      El boost opcional. Aumenta la relevancia de los documentos con términos coincidentes.


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::addQueryField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery
-&gt;addQueryField("location", 4)
-&gt;addQueryField("price")
-&gt;addQueryField("sku")
-&gt;addQueryField("title",3.4)
;
echo $dismaxQuery;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;qf=location^4 price sku title^3.4

### Ver también

- [SolrDisMaxQuery::removeQueryField()](#solrdismaxquery.removequeryfield) - Elimina un campo de consulta (argumento qf)

# SolrDisMaxQuery::addTrigramPhraseField

(No version information available, might only be in Git)

SolrDisMaxQuery::addTrigramPhraseField — Añade un campo de trigramas de frase (argumento pf3)

### Descripción

public **SolrDisMaxQuery::addTrigramPhraseField**([string](#language.types.string) $field, [string](#language.types.string) $boost, [string](#language.types.string) $slop = ?): [SolrDisMaxQuery](#class.solrdismaxquery)

    Añade un campo de trigramas de frase (argumento pf3)

### Parámetros

    field


      El nombre del campo






    boost


      El boost del campo






    slop


      La tolerancia del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::addTrigramPhraseField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery
-&gt;addTrigramPhraseField('cat', 2, 5.1)
-&gt;addTrigramPhraseField('feature', 4.5)
;
echo $dismaxQuery.PHP_EOL;

?&gt;

El ejemplo anterior mostrará:

q=lucene&amp;defType=%s&amp;pf3=cat~5.1^2 feature^4.5

### Ver también

- [SolrDisMaxQuery::removeTrigramPhraseField()](#solrdismaxquery.removetrigramphrasefield) - Elimina un campo de frase de trigramas (argumento pf3)

- [SolrDisMaxQuery::setTrigramPhraseFields()](#solrdismaxquery.settrigramphrasefields) - Define directamente los campos de trigramas de frase (argumento pf3)

- [SolrDisMaxQuery::setTrigramPhraseSlop()](#solrdismaxquery.settrigramphraseslop) - Define el margen de trigramas de frase (parámetro ps3)

# SolrDisMaxQuery::addUserField

(No version information available, might only be in Git)

SolrDisMaxQuery::addUserField — Añade un campo al parámetro de campo usuario (uf)

### Descripción

public **SolrDisMaxQuery::addUserField**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Añade un campo al parámetro de campo usuario (uf)

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::addUserField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery
-&gt;addUserField('cat')
-&gt;addUserField('text')
-&gt;addUserField('\*\_dt');

echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;uf=cat text \*\_dt

### Ver también

- [SolrDisMaxQuery::removeUserField()](#solrdismaxquery.removeuserfield) - Elimina un campo del parámetro de campo de usuario (uf)

- [SolrDisMaxQuery::setUserFields()](#solrdismaxquery.setuserfields) - Define el parámetro de campos de usuario (uf)

# SolrDisMaxQuery::\_\_construct

(No version information available, might only be in Git)

SolrDisMaxQuery::\_\_construct — Constructor de clase

### Descripción

public **SolrDisMaxQuery::\_\_construct**([string](#language.types.string) $q = ?)

    Constructor de clase que inicializa el objeto y define el parámetro q si se proporciona

### Parámetros

    q


      El parámetro de búsqueda (parámetro q)


### Valores devueltos

### Errores/Excepciones

Genera una excepción [SolrIllegalArgumentException](#class.solrillegalargumentexception) si se ha pasado un parámetro inválido.

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::\_\_construct()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
echo $dismaxQuery;

?&gt;

El ejemplo anterior mostrará:

q=lucene&amp;defType=edismax

# SolrDisMaxQuery::removeBigramPhraseField

(No version information available, might only be in Git)

SolrDisMaxQuery::removeBigramPhraseField — Elimina un campo de bigrama de frase (argumento pf2)

### Descripción

public **SolrDisMaxQuery::removeBigramPhraseField**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Elimina un campo de bigrama de frase (argumento pf2) que fue previamente añadido utilizando [SolrDisMaxQuery::addBigramPhraseField()](#solrdismaxquery.addbigramphrasefield)

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::removeBigramPhraseField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery
-&gt;addBigramPhraseField('cat', 2, 5.1)
-&gt;addBigramPhraseField('feature', 4.5)
;
echo $dismaxQuery.PHP_EOL;

// elimina el campo cat de pf2
$dismaxQuery
-&gt;removeBigramPhraseField('cat');
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;pf2=cat~5.1^2 feature^4.5
q=lucene&amp;defType=edismax&amp;pf2=feature^4.5

### Ver también

- [SolrDisMaxQuery::addBigramPhraseField()](#solrdismaxquery.addbigramphrasefield) - Añade un campo de bigrama de frase (argumento pf2)

- [SolrDisMaxQuery::setBigramPhraseFields()](#solrdismaxquery.setbigramphrasefields) - Define los campos de frase bigrama y sus boosts (y márgenes) utilizando el argumento pf2

- [SolrDisMaxQuery::setBigramPhraseSlop()](#solrdismaxquery.setbigramphraseslop) - Define el margen de Bigram Phrase (parámetro ps2)

# SolrDisMaxQuery::removeBoostQuery

(No version information available, might only be in Git)

SolrDisMaxQuery::removeBoostQuery — Elimina una parte de consulta de boost por nombre de campo (bq)

### Descripción

public **SolrDisMaxQuery::removeBoostQuery**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Elimina una parte de consulta de boost por nombre de campo, solo si [SolrDisMaxQuery::addBoostQuery()](#solrdismaxquery.addboostquery) ha sido utilizado.

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::removeBoostQuery()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery
-&gt;addBoostQuery('cat', 'electronics', 5.1)
-&gt;addBoostQuery('cat', 'hard drive')
;
echo $dismaxQuery.PHP_EOL;
// elimina la parte de consulta de boost con el campo 'cat'
$dismaxQuery
-&gt;removeBoostQuery('cat');
echo $dismaxQuery . PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;bq=cat:electronics^5.1 cat:hard drive
q=lucene&amp;defType=edismax&amp;bq=cat:hard drive

### Ver también

- [SolrDisMaxQuery::addBoostQuery()](#solrdismaxquery.addboostquery) - Añade un campo de consulta de boost con valor y boost opcionales (argumento bq)

- [SolrDisMaxQuery::setBoostQuery()](#solrdismaxquery.setboostquery) - Define directamente el parámetro de consulta de boost (bq)

# SolrDisMaxQuery::removePhraseField

(No version information available, might only be in Git)

SolrDisMaxQuery::removePhraseField — Elimina un campo de frase (argumento pf)

### Descripción

public **SolrDisMaxQuery::removePhraseField**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Elimina un campo de frase (argumento pf) que fue añadido previamente utilizando SolrDisMaxQuery::addPhraseField

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::removePhraseField()**

&lt;?php
$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery
-&gt;addPhraseField('first', 3, 1)
-&gt;addPhraseField('second', 4, 1)
-&gt;addPhraseField('cat', 55);
echo $dismaxQuery . PHP_EOL;
echo $dismaxQuery-&gt;removePhraseField('second');
?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;pf=first~1^3 second~1^4 cat^55
q=lucene&amp;defType=edismax&amp;pf=first~1^3 cat^55

### Ver también

- [SolrDisMaxQuery::addPhraseField()](#solrdismaxquery.addphrasefield) - Añade una frase de campo (argumento pf)

- [SolrDisMaxQuery::setPhraseFields()](#solrdismaxquery.setphrasefields) - Define los campos de frase y sus boosts (y slops) utilizando el parámetro pf2

# SolrDisMaxQuery::removeQueryField

(No version information available, might only be in Git)

SolrDisMaxQuery::removeQueryField — Elimina un campo de consulta (argumento qf)

### Descripción

public **SolrDisMaxQuery::removeQueryField**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Elimina un campo de consulta (argumento qf) añadido por [SolrDisMaxQuery::addQueryField()](#solrdismaxquery.addqueryfield)




    qf: Durante la construcción de DisjunctionMaxQueries a partir de la consulta del usuario, especifica los campos a buscar y los boosts para estos campos.

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::removeQueryField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery
-&gt;addQueryField('first', 3)
-&gt;addQueryField('second', 0.2)
-&gt;addQueryField('cat');
echo $dismaxQuery . PHP_EOL;
// elimina el campo 'second'
echo $dismaxQuery-&gt;removeQueryField('second');
?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;qf=first^3 second^0.2 cat
q=lucene&amp;defType=edismax&amp;qf=first^3 cat

### Ver también

- [SolrDisMaxQuery::addQueryField()](#solrdismaxquery.addqueryfield) - Añade un campo de consulta con boost opcional (argumento qf)

# SolrDisMaxQuery::removeTrigramPhraseField

(No version information available, might only be in Git)

SolrDisMaxQuery::removeTrigramPhraseField — Elimina un campo de frase de trigramas (argumento pf3)

### Descripción

public **SolrDisMaxQuery::removeTrigramPhraseField**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Elimina un campo de frase de trigramas (argumento pf3)

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::removeTrigramPhraseField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery
-&gt;addTrigramPhraseField('cat', 2, 5.1)
-&gt;addTrigramPhraseField('feature', 4.5)
;
echo $dismaxQuery.PHP_EOL;
// inverso
$dismaxQuery
-&gt;removeTrigramPhraseField('cat');
echo $dismaxQuery.PHP_EOL;

?&gt;

El ejemplo anterior mostrará:

q=lucene&amp;defType=%s&amp;pf3=cat~5.1^2 feature^4.5
q=lucene&amp;defType=%s&amp;pf3=feature^4.5

### Ver también

- [SolrDisMaxQuery::addTrigramPhraseField()](#solrdismaxquery.addtrigramphrasefield) - Añade un campo de trigramas de frase (argumento pf3)

- [SolrDisMaxQuery::setTrigramPhraseFields()](#solrdismaxquery.settrigramphrasefields) - Define directamente los campos de trigramas de frase (argumento pf3)

- [SolrDisMaxQuery::setTrigramPhraseSlop()](#solrdismaxquery.settrigramphraseslop) - Define el margen de trigramas de frase (parámetro ps3)

# SolrDisMaxQuery::removeUserField

(No version information available, might only be in Git)

SolrDisMaxQuery::removeUserField — Elimina un campo del parámetro de campo de usuario (uf)

### Descripción

public **SolrDisMaxQuery::removeUserField**([string](#language.types.string) $field): [SolrDisMaxQuery](#class.solrdismaxquery)

    Elimina un campo del parámetro de campo de usuario (uf)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    field


      El nombre del campo


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::removeUserField()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery
-&gt;addUserField('cat')
-&gt;addUserField('text')
-&gt;addUserField('\*\_dt')
;
echo $dismaxQuery.PHP_EOL;

// elimina el campo llamado 'text'
$dismaxQuery
-&gt;removeUserField('text');
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=%s&amp;uf=cat text _\_dt
q=lucene&amp;defType=%s&amp;uf=cat _\_dt

### Ver también

- [SolrDisMaxQuery::addUserField()](#solrdismaxquery.adduserfield) - Añade un campo al parámetro de campo usuario (uf)

- [SolrDisMaxQuery::setUserFields()](#solrdismaxquery.setuserfields) - Define el parámetro de campos de usuario (uf)

# SolrDisMaxQuery::setBigramPhraseFields

(No version information available, might only be in Git)

SolrDisMaxQuery::setBigramPhraseFields — Define los campos de frase bigrama y sus boosts (y márgenes) utilizando el argumento pf2

### Descripción

public **SolrDisMaxQuery::setBigramPhraseFields**([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define los campos de frase bigrama (pf2) y sus boosts (y márgenes)

### Parámetros

    fields


      Los boosts de campos (los márgenes)


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setBigramPhraseFields()**

&lt;?php
$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery-&gt;setBigramPhraseFields("cat~5.1^2 feature^4.5");
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;pf2=cat~5.1^2 feature^4.5

### Ver también

- [SolrDisMaxQuery::setBigramPhraseSlop()](#solrdismaxquery.setbigramphraseslop) - Define el margen de Bigram Phrase (parámetro ps2)

- **SolrDisMaxQuery::addBigramPhraseFields()**

- [SolrDisMaxQuery::removeBigramPhraseField()](#solrdismaxquery.removebigramphrasefield) - Elimina un campo de bigrama de frase (argumento pf2)

- [SolrDisMaxQuery::setTrigramPhraseFields()](#solrdismaxquery.settrigramphrasefields) - Define directamente los campos de trigramas de frase (argumento pf3)

# SolrDisMaxQuery::setBigramPhraseSlop

(No version information available, might only be in Git)

SolrDisMaxQuery::setBigramPhraseSlop — Define el margen de Bigram Phrase (parámetro ps2)

### Descripción

public **SolrDisMaxQuery::setBigramPhraseSlop**([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el margen de Bigram Phrase (parámetro ps2). Un margen por omisión para los campos de frase Bigram.

### Parámetros

    slop





### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setBigramPhraseSlop()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');

$dismaxQuery-&gt;setBigramPhraseSlop(5);
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;ps2=5

# SolrDisMaxQuery::setBoostFunction

(No version information available, might only be in Git)

SolrDisMaxQuery::setBoostFunction — Define una función de Boost (argumento bf)

### Descripción

public **SolrDisMaxQuery::setBoostFunction**([string](#language.types.string) $function): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define una función de Boost (argumento bf).




    Las funciones (con boosts opcionales) que serán incluidas en la
    petición del usuario para influir en el score. Cualquier función soportada
    nativamente por Solr puede ser utilizada, con un valor de boost. Por ejemplo:




    recip(rord(myfield),1,2,3)^1.5

### Parámetros

    function





### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setBoostFunction()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');

$boostRecentDocsFunction = "recip(ms(NOW,mydatefield),3.16e-11,1,1)";
$dismaxQuery-&gt;setBoostFunction($boostRecentDocsFunction);

echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;bf=recip(ms(NOW,mydatefield),3.16e-11,1,1)

# SolrDisMaxQuery::setBoostQuery

(No version information available, might only be in Git)

SolrDisMaxQuery::setBoostQuery — Define directamente el parámetro de consulta de boost (bq)

### Descripción

public **SolrDisMaxQuery::setBoostQuery**([string](#language.types.string) $q): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el parámetro de consulta de boost (bq)

### Parámetros

    q


       consulta


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setBoostQuery()**

&lt;?php
$dismaxQuery = new SolrDisMaxQuery("lucene");

$dismaxQuery-&gt;setBoostQuery('cat:electronics manu:local^2');
echo $dismaxQuery.PHP_EOL;
?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;bq=cat:electronics manu:local^2

### Ver también

- [SolrDisMaxQuery::addBoostQuery()](#solrdismaxquery.addboostquery) - Añade un campo de consulta de boost con valor y boost opcionales (argumento bq)

- [SolrDisMaxQuery::removeBoostQuery()](#solrdismaxquery.removeboostquery) - Elimina una parte de consulta de boost por nombre de campo (bq)

# SolrDisMaxQuery::setMinimumMatch

(No version information available, might only be in Git)

SolrDisMaxQuery::setMinimumMatch — Define el mínimo "Should" Match (mm)

### Descripción

public **SolrDisMaxQuery::setMinimumMatch**([string](#language.types.string) $value): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el parámetro de coincidencia mínima "Should" (mm). Si el operador de consulta por omisión es AND, entonces mm=100%, si el operador de consulta por omisión (q.op) es OR, entonces mm=0%.

### Parámetros

    value


      El valor/expresión de coincidencia mínima


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setMinimumMatch()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery("lucene");
// 75% de las cláusulas de consulta deben coincidir
$dismaxQuery-&gt;setMinimumMatch("75%");
echo $dismaxQuery . PHP_EOL;

?&gt;

El ejemplo anterior mostrará:

q=lucene&amp;defType=edismax&amp;mm=75%

# SolrDisMaxQuery::setPhraseFields

(No version information available, might only be in Git)

SolrDisMaxQuery::setPhraseFields — Define los campos de frase y sus boosts (y slops) utilizando el parámetro pf2

### Descripción

public **SolrDisMaxQuery::setPhraseFields**([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define los campos de frase (pf) y sus boosts (y slops)

### Parámetros

    fields


      Los campos, los boosts [, slops]


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setPhraseFields()**

&lt;?php
$dismaxQuery = new SolrDisMaxQuery("lucene");
$dismaxQuery-&gt;setPhraseFields("cat~5.1^2 feature^4.5");
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;pf=cat~5.1^2 feature^4.5

### Ver también

- **SolrDisMaxQuery::addPhraseFields()**

- [SolrDisMaxQuery::removePhraseField()](#solrdismaxquery.removephrasefield) - Elimina un campo de frase (argumento pf)

# SolrDisMaxQuery::setPhraseSlop

(No version information available, might only be in Git)

SolrDisMaxQuery::setPhraseSlop — Define el margen por defecto en las consultas de frase (parámetro ps)

### Descripción

public **SolrDisMaxQuery::setPhraseSlop**([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el margen por defecto en las consultas de frase construidas con los campos "pf", "pf2" y/o "pf3" (afecta al boosting).
    parámetro "ps"

### Parámetros

    slop





### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setPhraseSlop()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');

$dismaxQuery-&gt;setPhraseSlop(4);
echo $dismaxQuery.PHP_EOL;

?&gt;

El ejemplo anterior mostrará:

q=lucene&amp;defType=edismax&amp;ps=4

# SolrDisMaxQuery::setQueryAlt

(No version information available, might only be in Git)

SolrDisMaxQuery::setQueryAlt — Define la consulta alternativa (parámetro q.alt)

### Descripción

public **SolrDisMaxQuery::setQueryAlt**([string](#language.types.string) $q): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define la consulta alternativa (parámetro q.alt)




    Cuando el parámetro *q* principal no está especificado o está vacío, el parámetro *q.alt* es utilizado

### Parámetros

    q


      la cadena de consulta


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setQueryAlt()**

&lt;?php

$dismaxQuery = new DisMaxQuery();
$dismaxQuery-&gt;setQueryAlt('_:_');

?&gt;

Resultado del ejemplo anterior es similar a:

defType=edismax&amp;q.alt=_:_&amp;q=

# SolrDisMaxQuery::setQueryPhraseSlop

(No version information available, might only be in Git)

SolrDisMaxQuery::setQueryPhraseSlop — Especifica la cantidad de tolerancia permitida en las consultas de frase explícitamente incluidas en la cadena de consulta del usuario (parámetro qf)

### Descripción

public **SolrDisMaxQuery::setQueryPhraseSlop**([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)

    La cantidad de tolerancia en las consultas de frase explícitamente incluidas en la cadena de consulta del usuario con el parámetro *qf*.




    La tolerancia se refiere al número de posiciones que debe moverse un token respecto a otro token para coincidir con una frase especificada en una consulta.

### Parámetros

    slop


      La cantidad de tolerancia


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setQueryPhraseSlop()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery();
$dismaxQuery-&gt;setQueryPhraseSlop(3);
echo $dismaxQuery;
?&gt;

Resultado del ejemplo anterior es similar a:

defType=edismax&amp;qs=3

# SolrDisMaxQuery::setTieBreaker

(No version information available, might only be in Git)

SolrDisMaxQuery::setTieBreaker — Define el parámetro de Tie Breaker (parámetro tie)

### Descripción

public **SolrDisMaxQuery::setTieBreaker**([string](#language.types.string) $tieBreaker): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el parámetro de Tie Breaker (parámetro tie)

### Parámetros

    tieBreaker


        El parámetro *tie* especifica un valor float (que debería ser algo mucho menor que 1) para ser utilizado como briseur d'égalité en las consultas DisMax.


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setTieBreaker()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery();
$dismaxQuery-&gt;setTieBreaker(0.1);

echo $dismaxQuery;

?&gt;

El ejemplo anterior mostrará:

defType=edismax&amp;tie=0.1

# SolrDisMaxQuery::setTrigramPhraseFields

(No version information available, might only be in Git)

SolrDisMaxQuery::setTrigramPhraseFields — Define directamente los campos de trigramas de frase (argumento pf3)

### Descripción

public **SolrDisMaxQuery::setTrigramPhraseFields**([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define directamente los campos de trigramas de frase (argumento pf3)

### Parámetros

    fields


      Los campos de trigramas de frase


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setTrigramPhraseFields()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery-&gt;setTrigramPhraseFields('cat~5.1^2 feature^4.5');
echo $dismaxQuery.PHP_EOL;

?&gt;

El ejemplo anterior mostrará:

q=lucene&amp;defType=edismax&amp;pf3=cat~5.1^2 feature^4.5

### Ver también

- [SolrDisMaxQuery::addTrigramPhraseField()](#solrdismaxquery.addtrigramphrasefield) - Añade un campo de trigramas de frase (argumento pf3)

- [SolrDisMaxQuery::removeTrigramPhraseField()](#solrdismaxquery.removetrigramphrasefield) - Elimina un campo de frase de trigramas (argumento pf3)

- [SolrDisMaxQuery::setTrigramPhraseSlop()](#solrdismaxquery.settrigramphraseslop) - Define el margen de trigramas de frase (parámetro ps3)

# SolrDisMaxQuery::setTrigramPhraseSlop

(No version information available, might only be in Git)

SolrDisMaxQuery::setTrigramPhraseSlop — Define el margen de trigramas de frase (parámetro ps3)

### Descripción

public **SolrDisMaxQuery::setTrigramPhraseSlop**([string](#language.types.string) $slop): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el margen de trigramas de frase (parámetro ps3)

### Parámetros

    slop


      El margen de frase


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setTrigramPhraseSlop()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery-&gt;setTrigramPhraseSlop(2);
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;ps3=2

### Ver también

- [SolrDisMaxQuery::addTrigramPhraseField()](#solrdismaxquery.addtrigramphrasefield) - Añade un campo de trigramas de frase (argumento pf3)

- [SolrDisMaxQuery::removeTrigramPhraseField()](#solrdismaxquery.removetrigramphrasefield) - Elimina un campo de frase de trigramas (argumento pf3)

- [SolrDisMaxQuery::setTrigramPhraseFields()](#solrdismaxquery.settrigramphrasefields) - Define directamente los campos de trigramas de frase (argumento pf3)

# SolrDisMaxQuery::setUserFields

(No version information available, might only be in Git)

SolrDisMaxQuery::setUserFields — Define el parámetro de campos de usuario (uf)

### Descripción

public **SolrDisMaxQuery::setUserFields**([string](#language.types.string) $fields): [SolrDisMaxQuery](#class.solrdismaxquery)

    Define el parámetro de campos de usuario (uf)




    Campos de usuario: Especifica los campos de esquema que el usuario final está autorizado a consultar.

### Parámetros

    fields


        Los nombres de los campos separados por un espacio




        Este parámetro admite caracteres comodín.


### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::setUserFields()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery('lucene');
$dismaxQuery-&gt;setUserFields('field1 field2 \*\_txt');
echo $dismaxQuery.PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

q=lucene&amp;defType=edismax&amp;uf=field1 field2 \*\_txt

### Ver también

- [SolrDisMaxQuery::addUserField()](#solrdismaxquery.adduserfield) - Añade un campo al parámetro de campo usuario (uf)

- [SolrDisMaxQuery::removeUserField()](#solrdismaxquery.removeuserfield) - Elimina un campo del parámetro de campo de usuario (uf)

# SolrDisMaxQuery::useDisMaxQueryParser

(No version information available, might only be in Git)

SolrDisMaxQuery::useDisMaxQueryParser — Cambia el QueryParser para que sea el DisMax Query Parser

### Descripción

public **SolrDisMaxQuery::useDisMaxQueryParser**(): [SolrDisMaxQuery](#class.solrdismaxquery)

    Cambia el QueryParser para que sea el DisMax Query Parser

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::useDisMaxQueryParser()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery();
$dismaxQuery-&gt;useDisMaxQueryParser();
echo $dismaxQuery;
?&gt;

Resultado del ejemplo anterior es similar a:

defType=dismax

### Ver también

- **SolrDisMaxQuery::useDisMaxQueryParser()**

# SolrDisMaxQuery::useEDisMaxQueryParser

(No version information available, might only be in Git)

SolrDisMaxQuery::useEDisMaxQueryParser — Cambia el QueryParser para que sea el EDisMax Query Parser

### Descripción

public **SolrDisMaxQuery::useEDisMaxQueryParser**(): [SolrDisMaxQuery](#class.solrdismaxquery)

    Cambia el QueryParser para que sea el EDisMax Query Parser. Por omisión, el constructor de consultas utiliza edismax. Si ha sido cambiado utilizando [SolrDisMaxQuery::useDisMaxQueryParser()](#solrdismaxquery.usedismaxqueryparser), puede ser revertido utilizando este método.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[SolrDisMaxQuery](#class.solrdismaxquery)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrDisMaxQuery::useEDisMaxQueryParser()**

&lt;?php

$dismaxQuery = new SolrDisMaxQuery();
$dismaxQuery-&gt;useEDisMaxQueryParser();
echo $dismaxQuery;

?&gt;

Resultado del ejemplo anterior es similar a:

defType=edismax

## Tabla de contenidos

- [SolrDisMaxQuery::addBigramPhraseField](#solrdismaxquery.addbigramphrasefield) — Añade un campo de bigrama de frase (argumento pf2)
- [SolrDisMaxQuery::addBoostQuery](#solrdismaxquery.addboostquery) — Añade un campo de consulta de boost con valor y boost opcionales (argumento bq)
- [SolrDisMaxQuery::addPhraseField](#solrdismaxquery.addphrasefield) — Añade una frase de campo (argumento pf)
- [SolrDisMaxQuery::addQueryField](#solrdismaxquery.addqueryfield) — Añade un campo de consulta con boost opcional (argumento qf)
- [SolrDisMaxQuery::addTrigramPhraseField](#solrdismaxquery.addtrigramphrasefield) — Añade un campo de trigramas de frase (argumento pf3)
- [SolrDisMaxQuery::addUserField](#solrdismaxquery.adduserfield) — Añade un campo al parámetro de campo usuario (uf)
- [SolrDisMaxQuery::\_\_construct](#solrdismaxquery.construct) — Constructor de clase
- [SolrDisMaxQuery::removeBigramPhraseField](#solrdismaxquery.removebigramphrasefield) — Elimina un campo de bigrama de frase (argumento pf2)
- [SolrDisMaxQuery::removeBoostQuery](#solrdismaxquery.removeboostquery) — Elimina una parte de consulta de boost por nombre de campo (bq)
- [SolrDisMaxQuery::removePhraseField](#solrdismaxquery.removephrasefield) — Elimina un campo de frase (argumento pf)
- [SolrDisMaxQuery::removeQueryField](#solrdismaxquery.removequeryfield) — Elimina un campo de consulta (argumento qf)
- [SolrDisMaxQuery::removeTrigramPhraseField](#solrdismaxquery.removetrigramphrasefield) — Elimina un campo de frase de trigramas (argumento pf3)
- [SolrDisMaxQuery::removeUserField](#solrdismaxquery.removeuserfield) — Elimina un campo del parámetro de campo de usuario (uf)
- [SolrDisMaxQuery::setBigramPhraseFields](#solrdismaxquery.setbigramphrasefields) — Define los campos de frase bigrama y sus boosts (y márgenes) utilizando el argumento pf2
- [SolrDisMaxQuery::setBigramPhraseSlop](#solrdismaxquery.setbigramphraseslop) — Define el margen de Bigram Phrase (parámetro ps2)
- [SolrDisMaxQuery::setBoostFunction](#solrdismaxquery.setboostfunction) — Define una función de Boost (argumento bf)
- [SolrDisMaxQuery::setBoostQuery](#solrdismaxquery.setboostquery) — Define directamente el parámetro de consulta de boost (bq)
- [SolrDisMaxQuery::setMinimumMatch](#solrdismaxquery.setminimummatch) — Define el mínimo "Should" Match (mm)
- [SolrDisMaxQuery::setPhraseFields](#solrdismaxquery.setphrasefields) — Define los campos de frase y sus boosts (y slops) utilizando el parámetro pf2
- [SolrDisMaxQuery::setPhraseSlop](#solrdismaxquery.setphraseslop) — Define el margen por defecto en las consultas de frase (parámetro ps)
- [SolrDisMaxQuery::setQueryAlt](#solrdismaxquery.setqueryalt) — Define la consulta alternativa (parámetro q.alt)
- [SolrDisMaxQuery::setQueryPhraseSlop](#solrdismaxquery.setqueryphraseslop) — Especifica la cantidad de tolerancia permitida en las consultas de frase explícitamente incluidas en la cadena de consulta del usuario (parámetro qf)
- [SolrDisMaxQuery::setTieBreaker](#solrdismaxquery.settiebreaker) — Define el parámetro de Tie Breaker (parámetro tie)
- [SolrDisMaxQuery::setTrigramPhraseFields](#solrdismaxquery.settrigramphrasefields) — Define directamente los campos de trigramas de frase (argumento pf3)
- [SolrDisMaxQuery::setTrigramPhraseSlop](#solrdismaxquery.settrigramphraseslop) — Define el margen de trigramas de frase (parámetro ps3)
- [SolrDisMaxQuery::setUserFields](#solrdismaxquery.setuserfields) — Define el parámetro de campos de usuario (uf)
- [SolrDisMaxQuery::useDisMaxQueryParser](#solrdismaxquery.usedismaxqueryparser) — Cambia el QueryParser para que sea el DisMax Query Parser
- [SolrDisMaxQuery::useEDisMaxQueryParser](#solrdismaxquery.useedismaxqueryparser) — Cambia el QueryParser para que sea el EDisMax Query Parser

# La clase SolrCollapseFunction

(PECL solr &gt;= 2.2.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **SolrCollapseFunction**

     {

    /* Constantes */

     const
     [string](#language.types.string)
      [NULLPOLICY_IGNORE](#solrcollapsefunction.constants.nullpolicy-ignore) = ignore;

    const
     [string](#language.types.string)
      [NULLPOLICY_EXPAND](#solrcollapsefunction.constants.nullpolicy-expand) = expand;

    const
     [string](#language.types.string)
      [NULLPOLICY_COLLAPSE](#solrcollapsefunction.constants.nullpolicy-collapse) = collapse;


    /* Métodos */

public [\_\_construct](#solrcollapsefunction.construct)([string](#language.types.string) $field = ?)

    public [getField](#solrcollapsefunction.getfield)(): [string](#language.types.string)

public [getHint](#solrcollapsefunction.gethint)(): [string](#language.types.string)
public [getMax](#solrcollapsefunction.getmax)(): [string](#language.types.string)
public [getMin](#solrcollapsefunction.getmin)(): [string](#language.types.string)
public [getNullPolicy](#solrcollapsefunction.getnullpolicy)(): [string](#language.types.string)
public [getSize](#solrcollapsefunction.getsize)(): [int](#language.types.integer)
public [setField](#solrcollapsefunction.setfield)([string](#language.types.string) $fieldName): [SolrCollapseFunction](#class.solrcollapsefunction)
public [setHint](#solrcollapsefunction.sethint)([string](#language.types.string) $hint): [SolrCollapseFunction](#class.solrcollapsefunction)
public [setMax](#solrcollapsefunction.setmax)([string](#language.types.string) $max): [SolrCollapseFunction](#class.solrcollapsefunction)
public [setMin](#solrcollapsefunction.setmin)([string](#language.types.string) $min): [SolrCollapseFunction](#class.solrcollapsefunction)
public [setNullPolicy](#solrcollapsefunction.setnullpolicy)([string](#language.types.string) $nullPolicy): [SolrCollapseFunction](#class.solrcollapsefunction)
public [setSize](#solrcollapsefunction.setsize)([int](#language.types.integer) $size): [SolrCollapseFunction](#class.solrcollapsefunction)
public [\_\_toString](#solrcollapsefunction.tostring)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[SolrCollapseFunction::NULLPOLICY_IGNORE](#solrcollapsefunction.constants.nullpolicy-ignore)**








     **[SolrCollapseFunction::NULLPOLICY_EXPAND](#solrcollapsefunction.constants.nullpolicy-expand)**








     **[SolrCollapseFunction::NULLPOLICY_COLLAPSE](#solrcollapsefunction.constants.nullpolicy-collapse)**






# SolrCollapseFunction::\_\_construct

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::\_\_construct — Constructor

### Descripción

public **SolrCollapseFunction::\_\_construct**([string](#language.types.string) $field = ?)

    Función de construcción de Collapse.

### Parámetros

    field


        El nombre del campo a reducir.




        Para reducir un resultado, el tipo de campo debe ser un string, un integer o un float.


### Ejemplos

**Ejemplo #1 Ejemplo de SolrCollapseFunction::\_\_construct()**

&lt;?php

include "bootstrap.php";

$options = array
(
'hostname' =&gt; SOLR_SERVER_HOSTNAME,
'login' =&gt; SOLR_SERVER_USERNAME,
'password' =&gt; SOLR_SERVER_PASSWORD,
'port' =&gt; SOLR_SERVER_PORT,
'path' =&gt; SOLR_SERVER_PATH
);

$client = new SolrClient($options);

$query = new SolrQuery('_:_');

$func = new SolrCollapseFunction('field_name');

$func-&gt;setMax('sum(cscore(),field(some_other_field))');
$func-&gt;setSize(100);
$func-&gt;setNullPolicy(SolrCollapseFunction::NULLPOLICY_EXPAND);

$query-&gt;collapse($func);

$queryResponse = $client-&gt;query($query);

$response = $queryResponse-&gt;getResponse();

print_r($response);

?&gt;

### Ver también

- [SolrQuery::collapse()](#solrquery.collapse) - Reduce el resultado a un solo documento por grupo

# SolrCollapseFunction::getField

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::getField — Devuelve el campo sobre el cual se realiza la reducción

### Descripción

public **SolrCollapseFunction::getField**(): [string](#language.types.string)

    Devuelve el campo sobre el cual se realiza la reducción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrCollapseFunction::setField()](#solrcollapsefunction.setfield) - Define el campo sobre el cual se realiza la reducción

# SolrCollapseFunction::getHint

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::getHint — Devuelve el índice de reducción

### Descripción

public **SolrCollapseFunction::getHint**(): [string](#language.types.string)

    Devuelve el índice de reducción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrCollapseFunction::setHint()](#solrcollapsefunction.sethint) - Define el índice de reducción

# SolrCollapseFunction::getMax

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::getMax — Devuelve el argumento max

### Descripción

public **SolrCollapseFunction::getMax**(): [string](#language.types.string)

    Devuelve el argumento max.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrCollapseFunction::setMax()](#solrcollapsefunction.setmax) - Selecciona los encabezados de grupo por el valor máximo de un campo numérico o una consulta de función

# SolrCollapseFunction::getMin

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::getMin — Devuelve el argumento min

### Descripción

public **SolrCollapseFunction::getMin**(): [string](#language.types.string)

    Devuelve el argumento min.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrCollapseFunction::setMin()](#solrcollapsefunction.setmin) - Define el tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente

# SolrCollapseFunction::getNullPolicy

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::getNullPolicy — Devuelve la política de null

### Descripción

public **SolrCollapseFunction::getNullPolicy**(): [string](#language.types.string)

    Devuelve la política de null utilizada o null

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrCollapseFunction::setNullPolicy()](#solrcollapsefunction.setnullpolicy) - Define la política NULL

# SolrCollapseFunction::getSize

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::getSize — Devuelve el argumento de tamaño

### Descripción

public **SolrCollapseFunction::getSize**(): [int](#language.types.integer)

    Devuelve el tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [SolrCollapseFunction::setSize()](#solrcollapsefunction.setsize) - Define la tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente

# SolrCollapseFunction::setField

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::setField — Define el campo sobre el cual se realiza la reducción

### Descripción

public **SolrCollapseFunction::setField**([string](#language.types.string) $fieldName): [SolrCollapseFunction](#class.solrcollapsefunction)

    El campo sobre el cual se realiza la reducción.

    Para reducir un resultado, el tipo de campo debe ser un string, un integer o un float.

### Parámetros

    fieldName





### Valores devueltos

[SolrCollapseFunction](#class.solrcollapsefunction)

# SolrCollapseFunction::setHint

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::setHint — Define el índice de reducción

### Descripción

public **SolrCollapseFunction::setHint**([string](#language.types.string) $hint): [SolrCollapseFunction](#class.solrcollapsefunction)

    Define el índice de reducción.

### Parámetros

    hint


      Actualmente, solo existe un índice disponible "top_fc", que significa top level FieldCache


### Valores devueltos

[SolrCollapseFunction](#class.solrcollapsefunction)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrCollapseFunction::setHint()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# SolrCollapseFunction::setMax

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::setMax — Selecciona los encabezados de grupo por el valor máximo de un campo numérico o una consulta de función

### Descripción

public **SolrCollapseFunction::setMax**([string](#language.types.string) $max): [SolrCollapseFunction](#class.solrcollapsefunction)

    Selecciona los encabezados de grupo por el valor máximo de un campo numérico o una consulta de función.

### Parámetros

    max





### Valores devueltos

[SolrCollapseFunction](#class.solrcollapsefunction)

### Ejemplos

**Ejemplo #1 Ejemplo de SolrCollapseFunction::setMax()**

&lt;?php

$func = new SolrCollapseFunction('field_name');

$func-&gt;setMax('sum(cscore(),field(some_field))');

$query = new SolrQuery('_:_');

$query-&gt;collapse($func);

?&gt;

# SolrCollapseFunction::setMin

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::setMin — Define el tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente

### Descripción

public **SolrCollapseFunction::setMin**([string](#language.types.string) $min): [SolrCollapseFunction](#class.solrcollapsefunction)

    Define el tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente

### Parámetros

    min





### Valores devueltos

[SolrCollapseFunction](#class.solrcollapsefunction)

# SolrCollapseFunction::setNullPolicy

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::setNullPolicy — Define la política NULL

### Descripción

public **SolrCollapseFunction::setNullPolicy**([string](#language.types.string) $nullPolicy): [SolrCollapseFunction](#class.solrcollapsefunction)

    Define la política NULL. Una de las 3 políticas definidas como constantes de clase debe ser pasada.
    Acepta las políticas ignore, expand o collapse.

### Parámetros

    nullPolicy





### Valores devueltos

[SolrCollapseFunction](#class.solrcollapsefunction)

# SolrCollapseFunction::setSize

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::setSize — Define la tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente

### Descripción

public **SolrCollapseFunction::setSize**([int](#language.types.integer) $size): [SolrCollapseFunction](#class.solrcollapsefunction)

    Define la tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente.

### Parámetros

    size





### Valores devueltos

[SolrCollapseFunction](#class.solrcollapsefunction)

# SolrCollapseFunction::\_\_toString

(PECL solr &gt;= 2.2.0)

SolrCollapseFunction::\_\_toString — Devuelve un string que representa la función de reducción construida

### Descripción

public **SolrCollapseFunction::\_\_toString**(): [string](#language.types.string)

    Devuelve un string que representa la función de reducción construida

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [SolrCollapseFunction::\_\_construct](#solrcollapsefunction.construct) — Constructor
- [SolrCollapseFunction::getField](#solrcollapsefunction.getfield) — Devuelve el campo sobre el cual se realiza la reducción
- [SolrCollapseFunction::getHint](#solrcollapsefunction.gethint) — Devuelve el índice de reducción
- [SolrCollapseFunction::getMax](#solrcollapsefunction.getmax) — Devuelve el argumento max
- [SolrCollapseFunction::getMin](#solrcollapsefunction.getmin) — Devuelve el argumento min
- [SolrCollapseFunction::getNullPolicy](#solrcollapsefunction.getnullpolicy) — Devuelve la política de null
- [SolrCollapseFunction::getSize](#solrcollapsefunction.getsize) — Devuelve el argumento de tamaño
- [SolrCollapseFunction::setField](#solrcollapsefunction.setfield) — Define el campo sobre el cual se realiza la reducción
- [SolrCollapseFunction::setHint](#solrcollapsefunction.sethint) — Define el índice de reducción
- [SolrCollapseFunction::setMax](#solrcollapsefunction.setmax) — Selecciona los encabezados de grupo por el valor máximo de un campo numérico o una consulta de función
- [SolrCollapseFunction::setMin](#solrcollapsefunction.setmin) — Define el tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente
- [SolrCollapseFunction::setNullPolicy](#solrcollapsefunction.setnullpolicy) — Define la política NULL
- [SolrCollapseFunction::setSize](#solrcollapsefunction.setsize) — Define la tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente
- [SolrCollapseFunction::\_\_toString](#solrcollapsefunction.tostring) — Devuelve un string que representa la función de reducción construida

# La clase SolrException

(PECL solr &gt;= 0.9.2)

## Introducción

    Esta es la clase base para todas las excepciones lanzadas por las clases de la extensión Solr.

## Sinopsis de la Clase

    ****




      class **SolrException**



      extends
       [Exception](#class.exception)

     {

    /* Propiedades */

     protected
     [int](#language.types.integer)
      [$sourceline](#solrexception.props.sourceline);

    protected
     [string](#language.types.string)
      [$sourcefile](#solrexception.props.sourcefile);

    protected
     [string](#language.types.string)
      [$zif_name](#solrexception.props.zif-name);


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

public [getInternalInfo](#solrexception.getinternalinfo)(): [array](#language.types.array)

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

     sourceline

      La línea del archivo del espacio c donde se generó la excepción





     sourcefile

      El archivo fuente del espacio c donde se generó la excepción





     zif_name

      La función espacio c donde se generó la excepción




# SolrException::getInternalInfo

(PECL solr &gt;= 0.9.2)

SolrException::getInternalInfo — Devuelve información interna de donde se lanzó la excepción

### Descripción

public **SolrException::getInternalInfo**(): [array](#language.types.array)

Devuelve información interna de donde se lanzó la excepción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene información interna de donde el error fue lanzado. Usado únicamente para depurar por desarrolladores de extensiones.

## Tabla de contenidos

- [SolrException::getInternalInfo](#solrexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción

# La clase SolrClientException

(PECL solr &gt;= 0.9.2)

## Introducción

    Una excepción lanzada cuando existe un error al hacer una solicitud al servidor desde el cliente.

## Sinopsis de la Clase

    ****




      class **SolrClientException**



      extends
       [SolrException](#class.solrexception)

     {


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

    protected
     [int](#language.types.integer)
      [$sourceline](#solrexception.props.sourceline);

protected
[string](#language.types.string)
[$sourcefile](#solrexception.props.sourcefile);
protected
[string](#language.types.string)
[$zif_name](#solrexception.props.zif-name);

    /* Métodos */

public [getInternalInfo](#solrclientexception.getinternalinfo)(): [array](#language.types.array)

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

    public [SolrException::getInternalInfo](#solrexception.getinternalinfo)(): [array](#language.types.array)

}

# SolrClientException::getInternalInfo

(PECL solr &gt;= 0.9.2)

SolrClientException::getInternalInfo — Devuelve información interna de donde se lanzó la excepción

### Descripción

public **SolrClientException::getInternalInfo**(): [array](#language.types.array)

Devuelve información interna de donde se lanzó la excepción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene información interna de donde el error fue lanzado. Usado únicamente para depurar por desarrolladores de extensiones.

## Tabla de contenidos

- [SolrClientException::getInternalInfo](#solrclientexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción

# La clase SolrServerException

(PECL Solr &gt;= 1.1.0, &gt;=2.0.0)

## Introducción

    Una excepción lanzada cuando hay un error producido por el propio servidor Solr.

## Sinopsis de la Clase

    ****




      class **SolrServerException**



      extends
       [SolrException](#class.solrexception)

     {


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

    protected
     [int](#language.types.integer)
      [$sourceline](#solrexception.props.sourceline);

protected
[string](#language.types.string)
[$sourcefile](#solrexception.props.sourcefile);
protected
[string](#language.types.string)
[$zif_name](#solrexception.props.zif-name);

    /* Métodos */

public [getInternalInfo](#solrserverexception.getinternalinfo)(): [array](#language.types.array)

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

    public [SolrException::getInternalInfo](#solrexception.getinternalinfo)(): [array](#language.types.array)

}

# SolrServerException::getInternalInfo

(PECL solr &gt;= 1.1.0, &gt;=2.0.0)

SolrServerException::getInternalInfo — Devuelve información interna de dónde fue lanzada la excepción

### Descripción

public **SolrServerException::getInternalInfo**(): [array](#language.types.array)

Devuelve información interna de dónde fue lanzada la excepción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene información interna de dónde se lanzó la excepción. Utilizado solamente con propósitos de depuración para desarrolladores de extensiones.

## Tabla de contenidos

- [SolrServerException::getInternalInfo](#solrserverexception.getinternalinfo) — Devuelve información interna de dónde fue lanzada la excepción

# La clase SolrIllegalArgumentException

(PECL solr &gt;= 0.9.2)

## Introducción

    Este objeto es lanzado cuando un argumento ilegal o no válido es pasado al método.

## Sinopsis de la Clase

    ****




      class **SolrIllegalArgumentException**



      extends
       [SolrException](#class.solrexception)

     {

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

    protected
     [int](#language.types.integer)
      [$sourceline](#solrexception.props.sourceline);

protected
[string](#language.types.string)
[$sourcefile](#solrexception.props.sourcefile);
protected
[string](#language.types.string)
[$zif_name](#solrexception.props.zif-name);

    /* Métodos */

public [getInternalInfo](#solrillegalargumentexception.getinternalinfo)(): [array](#language.types.array)

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

    public [SolrException::getInternalInfo](#solrexception.getinternalinfo)(): [array](#language.types.array)

}

# SolrIllegalArgumentException::getInternalInfo

(PECL solr &gt;= 0.9.2)

SolrIllegalArgumentException::getInternalInfo — Devuelve información interna de donde se lanzó la excepción

### Descripción

public **SolrIllegalArgumentException::getInternalInfo**(): [array](#language.types.array)

Devuelve información interna de donde se lanzó la excepción.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene información interna de donde el error fue lanzado. Usado únicamente para depurar por desarrolladores de extensiones.

## Tabla de contenidos

- [SolrIllegalArgumentException::getInternalInfo](#solrillegalargumentexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción

# La clase SolrIllegalOperationException

(PECL solr &gt;= 0.9.2)

## Introducción

    Este objeto es lanzado cuando una operación ilegal o no soportada es realizada sobre un objeto.

## Sinopsis de la Clase

    ****




      class **SolrIllegalOperationException**



      extends
       [SolrException](#class.solrexception)

     {

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

    protected
     [int](#language.types.integer)
      [$sourceline](#solrexception.props.sourceline);

protected
[string](#language.types.string)
[$sourcefile](#solrexception.props.sourcefile);
protected
[string](#language.types.string)
[$zif_name](#solrexception.props.zif-name);

    /* Métodos */

public [getInternalInfo](#solrillegaloperationexception.getinternalinfo)(): [array](#language.types.array)

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

    public [SolrException::getInternalInfo](#solrexception.getinternalinfo)(): [array](#language.types.array)

}

# SolrIllegalOperationException::getInternalInfo

(PECL solr &gt;= 0.9.2)

SolrIllegalOperationException::getInternalInfo — Devuelve información interna de donde se lanzó la excepción

### Descripción

public **SolrIllegalOperationException::getInternalInfo**(): [array](#language.types.array)

Devuelve información interna de donde se lanzó la excepción.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz que contiene información interna de donde el error fue lanzado. Usado únicamente para depurar por desarrolladores de extensiones.

## Tabla de contenidos

- [SolrIllegalOperationException::getInternalInfo](#solrillegaloperationexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción

# La clase SolrMissingMandatoryParameterException

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

    ****




      class **SolrMissingMandatoryParameterException**



      extends
       [SolrException](#class.solrexception)

     {

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

    protected
     [int](#language.types.integer)
      [$sourceline](#solrexception.props.sourceline);

protected
[string](#language.types.string)
[$sourcefile](#solrexception.props.sourcefile);
protected
[string](#language.types.string)
[$zif_name](#solrexception.props.zif-name);

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

    public [SolrException::getInternalInfo](#solrexception.getinternalinfo)(): [array](#language.types.array)

}

- [Introducción](#intro.solr)
- [Instalación/Configuración](#solr.setup)<li>[Requerimientos](#solr.requirements)
- [Instalación](#solr.installation)
  </li>- [Constantes predefinidas](#solr.constants)
- [Funciones de Solr](#ref.solr)<li>[solr_get_version](#function.solr-get-version) — Devuelve la versión actual de la extensión Apache Solr
  </li>- [Ejemplos](#solr.examples)
- [SolrUtils](#class.solrutils) — La clase SolrUtils<li>[SolrUtils::digestXmlResponse](#solrutils.digestxmlresponse) — Convierte una cadena de respuesta XML a un objeto SolrObject
- [SolrUtils::escapeQueryChars](#solrutils.escapequerychars) — Escapa un string de consulta lucene
- [SolrUtils::getSolrVersion](#solrutils.getsolrversion) — Devuelve la versión actual de la extensión Solr
- [SolrUtils::queryPhrase](#solrutils.queryphrase) — Prepara una frase desde una cadena lucene sin escapar
  </li>- [SolrInputDocument](#class.solrinputdocument) — La clase SolrInputDocument<li>[SolrInputDocument::addChildDocument](#solrinputdocument.addchilddocument) — Añade un documento hijo para la indexación de bloque
- [SolrInputDocument::addChildDocuments](#solrinputdocument.addchilddocuments) — Añade un array de documentos hijos
- [SolrInputDocument::addField](#solrinputdocument.addfield) — Añade un campo al documento
- [SolrInputDocument::clear](#solrinputdocument.clear) — Restablece el documento de entrada
- [SolrInputDocument::\_\_clone](#solrinputdocument.clone) — Crea una copia de un objeto SolrDocument
- [SolrInputDocument::\_\_construct](#solrinputdocument.construct) — Constructor
- [SolrInputDocument::deleteField](#solrinputdocument.deletefield) — Elimina un campo del documento
- [SolrInputDocument::\_\_destruct](#solrinputdocument.destruct) — Destructor
- [SolrInputDocument::fieldExists](#solrinputdocument.fieldexists) — Comprueba si existe un campo
- [SolrInputDocument::getBoost](#solrinputdocument.getboost) — Recupera el valor boost actual del documento
- [SolrInputDocument::getChildDocuments](#solrinputdocument.getchilddocuments) — Devuelve un array de documentos hijos (SolrInputDocument)
- [SolrInputDocument::getChildDocumentsCount](#solrinputdocument.getchilddocumentscount) — Devuelve el número de documentos hijos
- [SolrInputDocument::getField](#solrinputdocument.getfield) — Recupera un campo por su nombre
- [SolrInputDocument::getFieldBoost](#solrinputdocument.getfieldboost) — Recupera el valor boost de un campo en particular
- [SolrInputDocument::getFieldCount](#solrinputdocument.getfieldcount) — Devuelve el número de campos del documento
- [SolrInputDocument::getFieldNames](#solrinputdocument.getfieldnames) — Devuelve una matriz que contiene todos los campos del documento
- [SolrInputDocument::hasChildDocuments](#solrinputdocument.haschilddocuments) — Devuelve true si el documento tiene documentos hijos
- [SolrInputDocument::merge](#solrinputdocument.merge) — Fusiona un documento con otro
- [SolrInputDocument::reset](#solrinputdocument.reset) — Alias de SolrInputDocument::clear
- [SolrInputDocument::setBoost](#solrinputdocument.setboost) — Establece el valor boost de este documento
- [SolrInputDocument::setFieldBoost](#solrinputdocument.setfieldboost) — Establece el valor boost de tiempo del índice de un campo
- [SolrInputDocument::sort](#solrinputdocument.sort) — Ordena los campos dentro de un documento
- [SolrInputDocument::toArray](#solrinputdocument.toarray) — Devuelve una matriz como representación del documento de entrada
  </li>- [SolrDocument](#class.solrdocument) — La clase SolrDocument<li>[SolrDocument::addField](#solrdocument.addfield) — añade un campo al documento
- [SolrDocument::clear](#solrdocument.clear) — Borra todos los campos del documento
- [SolrDocument::\_\_clone](#solrdocument.clone) — Crea una copia de un objeto SolrDocument
- [SolrDocument::\_\_construct](#solrdocument.construct) — Constructor
- [SolrDocument::current](#solrdocument.current) — Recupera el campo actual
- [SolrDocument::deleteField](#solrdocument.deletefield) — Elimina un campo del documento
- [SolrDocument::\_\_destruct](#solrdocument.destruct) — Destructor
- [SolrDocument::fieldExists](#solrdocument.fieldexists) — Comprueba si existe un campo en el documento
- [SolrDocument::\_\_get](#solrdocument.get) — Acceder al campo como una propiedad
- [SolrDocument::getChildDocuments](#solrdocument.getchilddocuments) — Devuelve un array de documentos hijos (SolrDocument)
- [SolrDocument::getChildDocumentsCount](#solrdocument.getchilddocumentscount) — Devuelve el número de documentos hijos
- [SolrDocument::getField](#solrdocument.getfield) — Recupera un campo según su nombre
- [SolrDocument::getFieldCount](#solrdocument.getfieldcount) — Devuelve el número de campos de este documento
- [SolrDocument::getFieldNames](#solrdocument.getfieldnames) — Devuelve una matriz con los nombres de campos del documento
- [SolrDocument::getInputDocument](#solrdocument.getinputdocument) — Devuelve un SolrInputDocument equivalente al objeto
- [SolrDocument::hasChildDocuments](#solrdocument.haschilddocuments) — Verifica si el documento tiene documentos hijos
- [SolrDocument::\_\_isset](#solrdocument.isset) — Comprueba si existe un campo
- [SolrDocument::key](#solrdocument.key) — Recupera la clave actual
- [SolrDocument::merge](#solrdocument.merge) — Fusiona la fuente con el objeto SolrDocument actual
- [SolrDocument::next](#solrdocument.next) — Mueve el puntero interno al siguiente campo
- [SolrDocument::offsetExists](#solrdocument.offsetexists) — Comprueba si existe un campo en particular
- [SolrDocument::offsetGet](#solrdocument.offsetget) — Recupera un campo
- [SolrDocument::offsetSet](#solrdocument.offsetset) — Añade un campo al documento
- [SolrDocument::offsetUnset](#solrdocument.offsetunset) — Elimina un campo
- [SolrDocument::reset](#solrdocument.reset) — Alias de SolrDocument::clear
- [SolrDocument::rewind](#solrdocument.rewind) — Reinicia el puntero interno al principio
- [SolrDocument::serialize](#solrdocument.serialize) — Usado para serialización personalizada
- [SolrDocument::\_\_set](#solrdocument.set) — Añade otro campo al documento
- [SolrDocument::sort](#solrdocument.sort) — Ordena los campos del documento
- [SolrDocument::toArray](#solrdocument.toarray) — Devuelve una matriz como representación de un documento
- [SolrDocument::unserialize](#solrdocument.unserialize) — Serialización personalizada de objetos SolrDocument
- [SolrDocument::\_\_unset](#solrdocument.unset) — Elimina un campo del documento
- [SolrDocument::valid](#solrdocument.valid) — Comprueba si la posición actual del puntero interno es aún válida
  </li>- [SolrDocumentField](#class.solrdocumentfield) — La clase SolrDocumentField<li>[SolrDocumentField::__construct](#solrdocumentfield.construct) — Constructor
- [SolrDocumentField::\_\_destruct](#solrdocumentfield.destruct) — Destructor
  </li>- [SolrObject](#class.solrobject) — La clase SolrObject<li>[SolrObject::__construct](#solrobject.construct) — Crea un objeto Solr
- [SolrObject::\_\_destruct](#solrobject.destruct) — Destructor
- [SolrObject::getPropertyNames](#solrobject.getpropertynames) — Devuelve una matriz de todos los nombres de las propiedades
- [SolrObject::offsetExists](#solrobject.offsetexists) — Comprueba si la propiedad existe
- [SolrObject::offsetGet](#solrobject.offsetget) — Usado para recuperar una propiedad
- [SolrObject::offsetSet](#solrobject.offsetset) — Establece el valor de una propiedad
- [SolrObject::offsetUnset](#solrobject.offsetunset) — Desestablece el valor de la propiedad
  </li>- [SolrClient](#class.solrclient) — La clase SolrClient<li>[SolrClient::addDocument](#solrclient.adddocument) — Añade un documento al índice
- [SolrClient::addDocuments](#solrclient.adddocuments) — Añade una colección de instancias de SolrInputDocument al índice
- [SolrClient::commit](#solrclient.commit) — Finaliza todas las añadiduras/eliminaciones hechas al índice
- [SolrClient::\_\_construct](#solrclient.construct) — Constructor para el objeto SolrClient
- [SolrClient::deleteById](#solrclient.deletebyid) — Eliminar por Id
- [SolrClient::deleteByIds](#solrclient.deletebyids) — Elimina mediante Ids
- [SolrClient::deleteByQueries](#solrclient.deletebyqueries) — Elimina todos los documentos que coincidan con cualquiera de las consultas
- [SolrClient::deleteByQuery](#solrclient.deletebyquery) — Elimina todos los documentos que coincidan con la consulta dada
- [SolrClient::\_\_destruct](#solrclient.destruct) — Destructor para SolrClient
- [SolrClient::getById](#solrclient.getbyid) — Devuelve un documento por su identificador. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)
- [SolrClient::getByIds](#solrclient.getbyids) — Devuelve documentos por sus identificadores. Utiliza la funcionalidad de búsqueda en tiempo real de Solr (Solr Realtime Get - RTG)
- [SolrClient::getDebug](#solrclient.getdebug) — Devuelve la información de depuración para el último intento de conexión
- [SolrClient::getOptions](#solrclient.getoptions) — Devuelve las opciones de cliente establecidas internamente
- [SolrClient::optimize](#solrclient.optimize) — Defragmenta el índice
- [SolrClient::ping](#solrclient.ping) — Comprueba si el servidor Solr está todavía activo
- [SolrClient::query](#solrclient.query) — Envía una consulta al servidor
- [SolrClient::request](#solrclient.request) — Envía una petición de actualización sin formato
- [SolrClient::rollback](#solrclient.rollback) — Revierte todos los añadidos/eliminados hechos en el índice desde el último envío
- [SolrClient::setResponseWriter](#solrclient.setresponsewriter) — Establece el autor de la respuesta usado para preparar la respuesta de Solr
- [SolrClient::setServlet](#solrclient.setservlet) — Cambia el servlet especificado a un nuevo valor
- [SolrClient::system](#solrclient.system) — Obtener información del Servidor Solr
- [SolrClient::threads](#solrclient.threads) — Verifica el estado de los hilos
  </li>- [SolrResponse](#class.solrresponse) — La clase SolrResponse<li>[SolrResponse::getDigestedResponse](#solrresponse.getdigestedresponse) — Devuelve la respueste XML como información de PHP serializada
- [SolrResponse::getHttpStatus](#solrresponse.gethttpstatus) — Devuelve el estado HTTP de la respuesta
- [SolrResponse::getHttpStatusMessage](#solrresponse.gethttpstatusmessage) — Devuelve más detalles del estado HTTP
- [SolrResponse::getRawRequest](#solrresponse.getrawrequest) — Devuelve la respuesta en bruto enviada al servidor Solr
- [SolrResponse::getRawRequestHeaders](#solrresponse.getrawrequestheaders) — Devuelve las cabeceras de respuesta sin tratar enviadas al servidor Solr
- [SolrResponse::getRawResponse](#solrresponse.getrawresponse) — Devuelve la respuesta sin tratar del servidor
- [SolrResponse::getRawResponseHeaders](#solrresponse.getrawresponseheaders) — Devuelve las cabeceras de respuesta sin tratar del servidor
- [SolrResponse::getRequestUrl](#solrresponse.getrequesturl) — Devuelve la URL completa a la que se envió la respuesta
- [SolrResponse::getResponse](#solrresponse.getresponse) — Devuelve un objeto SolrObject que representa la respuesta XML del servidor
- [SolrResponse::setParseMode](#solrresponse.setparsemode) — Establece el modo de análisis
- [SolrResponse::success](#solrresponse.success) — ¿Tuvo éxito la petición?
  </li>- [SolrQueryResponse](#class.solrqueryresponse) — La clase SolrQueryResponse<li>[SolrQueryResponse::__construct](#solrqueryresponse.construct) — Constructor
- [SolrQueryResponse::\_\_destruct](#solrqueryresponse.destruct) — Destructor
  </li>- [SolrUpdateResponse](#class.solrupdateresponse) — La clase SolrUpdateResponse<li>[SolrUpdateResponse::__construct](#solrupdateresponse.construct) — Constructor
- [SolrUpdateResponse::\_\_destruct](#solrupdateresponse.destruct) — Destructor
  </li>- [SolrPingResponse](#class.solrpingresponse) — La clase SolrPingResponse<li>[SolrPingResponse::__construct](#solrpingresponse.construct) — Constructor
- [SolrPingResponse::\_\_destruct](#solrpingresponse.destruct) — Destructor
- [SolrPingResponse::getResponse](#solrpingresponse.getresponse) — Devuelve la respuesta del servidor
  </li>- [SolrGenericResponse](#class.solrgenericresponse) — La clase SolrGenericResponse<li>[SolrGenericResponse::__construct](#solrgenericresponse.construct) — Constructor
- [SolrGenericResponse::\_\_destruct](#solrgenericresponse.destruct) — Destructor
  </li>- [SolrParams](#class.solrparams) — La clase SolrParams<li>[SolrParams::add](#solrparams.add) — Alias de SolrParams::addParam
- [SolrParams::addParam](#solrparams.addparam) — Añade un parámetro al objeto
- [SolrParams::get](#solrparams.get) — Alias de SolrParams::getParam
- [SolrParams::getParam](#solrparams.getparam) — Devuelve el valor de un parámetro
- [SolrParams::getParams](#solrparams.getparams) — Devuelve una matriz de parámetros URL no codificados
- [SolrParams::getPreparedParams](#solrparams.getpreparedparams) — Devuelve una matriz de parámetros URL codificados
- [SolrParams::serialize](#solrparams.serialize) — Usado para serialización personalizada
- [SolrParams::set](#solrparams.set) — Alias de SolrParams::setParam
- [SolrParams::setParam](#solrparams.setparam) — Establece el parámetro al valor especificado
- [SolrParams::toString](#solrparams.tostring) — Devuelve todos los parámetros de los pares nombre-valor del objeto
- [SolrParams::unserialize](#solrparams.unserialize) — Usado para serialización personalizada
  </li>- [SolrModifiableParams](#class.solrmodifiableparams) — La clase SolrModifiableParams<li>[SolrModifiableParams::__construct](#solrmodifiableparams.construct) — Constructor
- [SolrModifiableParams::\_\_destruct](#solrmodifiableparams.destruct) — Destructor
  </li>- [SolrQuery](#class.solrquery) — La clase SolrQuery<li>[SolrQuery::addExpandFilterQuery](#solrquery.addexpandfilterquery) — Sobrescribe la consulta de filtro principal, determina qué documentos incluir en el grupo principal
- [SolrQuery::addExpandSortField](#solrquery.addexpandsortfield) — Ordena los documentos en los grupos extendidos (parámetro expand.sort)
- [SolrQuery::addFacetDateField](#solrquery.addfacetdatefield) — Mapea a facet.date
- [SolrQuery::addFacetDateOther](#solrquery.addfacetdateother) — Añade otro parámetro facet.date.other
- [SolrQuery::addFacetField](#solrquery.addfacetfield) — Añade otro campo a la faceta
- [SolrQuery::addFacetQuery](#solrquery.addfacetquery) — Añade una consulta de faceta
- [SolrQuery::addField](#solrquery.addfield) — Especifica qué campos devolver en el resultado
- [SolrQuery::addFilterQuery](#solrquery.addfilterquery) — Especifica una consulta de filtro
- [SolrQuery::addGroupField](#solrquery.addgroupfield) — Añade un campo a utilizar para agrupar los resultados
- [SolrQuery::addGroupFunction](#solrquery.addgroupfunction) — Permite agrupar los resultados según los valores únicos de una consulta de función (argumento group.func)
- [SolrQuery::addGroupQuery](#solrquery.addgroupquery) — Permite agrupar los documentos que coinciden con la consulta dada
- [SolrQuery::addGroupSortField](#solrquery.addgroupsortfield) — Añade un campo de ordenación de grupo (argumento group.sort)
- [SolrQuery::addHighlightField](#solrquery.addhighlightfield) — Mapea a hl.fl
- [SolrQuery::addMltField](#solrquery.addmltfield) — Establece un campo para usarlo para similitud
- [SolrQuery::addMltQueryField](#solrquery.addmltqueryfield) — Mapea a mlt.qf
- [SolrQuery::addSortField](#solrquery.addsortfield) — Usado para controlar cómo deberían ordenarse los resultados
- [SolrQuery::addStatsFacet](#solrquery.addstatsfacet) — Recupera una devolución de subresultados para valores dentro de la faceta dada
- [SolrQuery::addStatsField](#solrquery.addstatsfield) — Mapea al parámetro stats.field
- [SolrQuery::collapse](#solrquery.collapse) — Reduce el resultado a un solo documento por grupo
- [SolrQuery::\_\_construct](#solrquery.construct) — Constructor
- [SolrQuery::\_\_destruct](#solrquery.destruct) — Destructor
- [SolrQuery::getExpand](#solrquery.getexpand) — Devuelve true si la extensión de grupo está activada
- [SolrQuery::getExpandFilterQueries](#solrquery.getexpandfilterqueries) — Devuelve las consultas de filtro de expansión
- [SolrQuery::getExpandQuery](#solrquery.getexpandquery) — Devuelve el parámetro de consulta de expansión expand.q
- [SolrQuery::getExpandRows](#solrquery.getexpandrows) — Devuelve el número de filas a mostrar en cada grupo (expand.rows)
- [SolrQuery::getExpandSortFields](#solrquery.getexpandsortfields) — Devuelve un array de campos
- [SolrQuery::getFacet](#solrquery.getfacet) — Devuelve el valor del parámetro facet
- [SolrQuery::getFacetDateEnd](#solrquery.getfacetdateend) — Devuelve el valor del parámetro facet.date.end
- [SolrQuery::getFacetDateFields](#solrquery.getfacetdatefields) — Devuelve todos los campos de facet.date
- [SolrQuery::getFacetDateGap](#solrquery.getfacetdategap) — Devuelve el valor del parámetro facet.date.gap
- [SolrQuery::getFacetDateHardEnd](#solrquery.getfacetdatehardend) — Devuelve el valor del parámetro facet.date.hardend
- [SolrQuery::getFacetDateOther](#solrquery.getfacetdateother) — Devuelve el valor del parámetro facet.date.other
- [SolrQuery::getFacetDateStart](#solrquery.getfacetdatestart) — Devuelve el límite inferior del primer rango de datos para todas las facetas de fecha de este campo
- [SolrQuery::getFacetFields](#solrquery.getfacetfields) — Devuelve todos los campos facet
- [SolrQuery::getFacetLimit](#solrquery.getfacetlimit) — Devuelve el número máximo de restricciones que deberían ser devueltas por los campos facet
- [SolrQuery::getFacetMethod](#solrquery.getfacetmethod) — Devuelve el valor del parámetro facet.method
- [SolrQuery::getFacetMinCount](#solrquery.getfacetmincount) — Devuelve el mínimo de facetas que deberían ser incluidas en la respuesta
- [SolrQuery::getFacetMissing](#solrquery.getfacetmissing) — Devuelve el estado acutual del parámetro facet.missing
- [SolrQuery::getFacetOffset](#solrquery.getfacetoffset) — Devuelve un índice dentro de la lista de restricciones para ser usado en paginación
- [SolrQuery::getFacetPrefix](#solrquery.getfacetprefix) — Devuelve el prefijo de faceta
- [SolrQuery::getFacetQueries](#solrquery.getfacetqueries) — Devuelve todas las consultas de facetas
- [SolrQuery::getFacetSort](#solrquery.getfacetsort) — Devuelve el tipo de ordenación de la faceta
- [SolrQuery::getFields](#solrquery.getfields) — Devuelve la lista de campos que serán devueltos en la respuesta
- [SolrQuery::getFilterQueries](#solrquery.getfilterqueries) — Devuelve una matriz de consultas de filtro
- [SolrQuery::getGroup](#solrquery.getgroup) — Indica si el agrupamiento está activado
- [SolrQuery::getGroupCachePercent](#solrquery.getgroupcachepercent) — Devuelve el valor del porcentaje de caché de grupo
- [SolrQuery::getGroupFacet](#solrquery.getgroupfacet) — Devuelve el valor del parámetro group.facet
- [SolrQuery::getGroupFields](#solrquery.getgroupfields) — Devuelve los campos de grupo (valores del argumento group.field)
- [SolrQuery::getGroupFormat](#solrquery.getgroupformat) — Devuelve el valor de group.format
- [SolrQuery::getGroupFunctions](#solrquery.getgroupfunctions) — Devuelve las funciones de grupo (valores del argumento group.func)
- [SolrQuery::getGroupLimit](#solrquery.getgrouplimit) — Devuelve el valor de group.limit
- [SolrQuery::getGroupMain](#solrquery.getgroupmain) — Devuelve el valor de group.main
- [SolrQuery::getGroupNGroups](#solrquery.getgroupngroups) — Devuelve el valor de group.ngroups
- [SolrQuery::getGroupOffset](#solrquery.getgroupoffset) — Devuelve el valor de group.offset
- [SolrQuery::getGroupQueries](#solrquery.getgroupqueries) — Devuelve todos los valores del parámetro group.query
- [SolrQuery::getGroupSortFields](#solrquery.getgroupsortfields) — Devuelve el valor de group.sort
- [SolrQuery::getGroupTruncate](#solrquery.getgrouptruncate) — Devuelve el valor de group.truncate
- [SolrQuery::getHighlight](#solrquery.gethighlight) — Devuelve el estado del parámtero hl
- [SolrQuery::getHighlightAlternateField](#solrquery.gethighlightalternatefield) — Devuelve el campo remarcado para usarlo como copia de seguridad o como predeterminado
- [SolrQuery::getHighlightFields](#solrquery.gethighlightfields) — Devuelve todos los campos que Solr debería generar para remarcación de trozos
- [SolrQuery::getHighlightFormatter](#solrquery.gethighlightformatter) — Devuelve el formateador de la salida remarcada
- [SolrQuery::getHighlightFragmenter](#solrquery.gethighlightfragmenter) — Devuelve el generador de trozos de texto para el texto remarcado
- [SolrQuery::getHighlightFragsize](#solrquery.gethighlightfragsize) — Devuelve el número de caracteres de fragmentos a considerar para remarcación
- [SolrQuery::getHighlightHighlightMultiTerm](#solrquery.gethighlighthighlightmultiterm) — Devuelve si habilitar o no la remarcación de consultas range/wildcard/fuzzy/prefix
- [SolrQuery::getHighlightMaxAlternateFieldLength](#solrquery.gethighlightmaxalternatefieldlength) — Devuelve el número máximo de caracteres del campo a devolver
- [SolrQuery::getHighlightMaxAnalyzedChars](#solrquery.gethighlightmaxanalyzedchars) — Devuelve el número máximo de caracteres de un documento para buscar trozos adecuados
- [SolrQuery::getHighlightMergeContiguous](#solrquery.gethighlightmergecontiguous) — Devuelve si colapsar o no fragmentos contiguos en un único fragmento
- [SolrQuery::getHighlightQuery](#solrquery.gethighlightquery) — Devuelve la consulta de resaltado (hl.q)
- [SolrQuery::getHighlightRegexMaxAnalyzedChars](#solrquery.gethighlightregexmaxanalyzedchars) — Devuelve el número máximo de caracteres de un campo cuando se usa el fragmentador de expresiones regulares
- [SolrQuery::getHighlightRegexPattern](#solrquery.gethighlightregexpattern) — Devuelve la expresión regular para la fragmentación
- [SolrQuery::getHighlightRegexSlop](#solrquery.gethighlightregexslop) — Devuelve el factor de desviación del tamaño de fragmento ideal
- [SolrQuery::getHighlightRequireFieldMatch](#solrquery.gethighlightrequirefieldmatch) — Devuelve si un campo será remarcado solamente si la consulta coincide con este campo en particular
- [SolrQuery::getHighlightSimplePost](#solrquery.gethighlightsimplepost) — Devuelve el texto que aparece después de un término remarcado
- [SolrQuery::getHighlightSimplePre](#solrquery.gethighlightsimplepre) — Devuelve el texto que aparece antes de un término remarcado
- [SolrQuery::getHighlightSnippets](#solrquery.gethighlightsnippets) — Devuelve el número máximo de trozos remarcados a generar por campo
- [SolrQuery::getHighlightUsePhraseHighlighter](#solrquery.gethighlightusephrasehighlighter) — Devuelve el estado del parámetro hl.usePhraseHighlighter
- [SolrQuery::getMlt](#solrquery.getmlt) — Devuelve si los resultados MoreLikeThis deberían o no ser habilitados
- [SolrQuery::getMltBoost](#solrquery.getmltboost) — Devuelve si la consulta será impulsada (boost) o no mediante la relevancia del térmido de interés
- [SolrQuery::getMltCount](#solrquery.getmltcount) — Devuelve el número de documentos similares a devolver para cada resultado
- [SolrQuery::getMltFields](#solrquery.getmltfields) — Devuelve todos los campos a usar para similitud
- [SolrQuery::getMltMaxNumQueryTerms](#solrquery.getmltmaxnumqueryterms) — Devuelve el número máximo de términos de consultas que serán incluidos en cualquier consulta generada
- [SolrQuery::getMltMaxNumTokens](#solrquery.getmltmaxnumtokens) — Devuelve el número máximo de tokens a analizar en cada campo del documento que no esté almacenado con soporte TermVector
- [SolrQuery::getMltMaxWordLength](#solrquery.getmltmaxwordlength) — Devuelve la longitud máxima de palabra de las palabras que serán ignoradas
- [SolrQuery::getMltMinDocFrequency](#solrquery.getmltmindocfrequency) — Devuelve el umbral de frecuencia en el que las palabras que no ocurran en por lo menos tantos documentos como este serán ignoradas
- [SolrQuery::getMltMinTermFrequency](#solrquery.getmltmintermfrequency) — Devuelve la frecuencia bajo la cual los términos serán ignorados en el documento fuente
- [SolrQuery::getMltMinWordLength](#solrquery.getmltminwordlength) — Devuelve la longitud máxima de palabra bajo la cual las palabras serán ignoradas
- [SolrQuery::getMltQueryFields](#solrquery.getmltqueryfields) — Devuelve los campos de consultas y sus boosts
- [SolrQuery::getQuery](#solrquery.getquery) — Devuelve la consulta principal
- [SolrQuery::getRows](#solrquery.getrows) — Devuelve el número máximo de documentos
- [SolrQuery::getSortFields](#solrquery.getsortfields) — Devuelve todos los campos de ordenación
- [SolrQuery::getStart](#solrquery.getstart) — Devuelve el índice del conjunto de resultados completo
- [SolrQuery::getStats](#solrquery.getstats) — Devuelve si están habilitadas o no las estadísticas
- [SolrQuery::getStatsFacets](#solrquery.getstatsfacets) — Devuelve todas las estadísticas de las facetas que fueron establecidas
- [SolrQuery::getStatsFields](#solrquery.getstatsfields) — Devuelve todas las estadísticas de los campos
- [SolrQuery::getTerms](#solrquery.getterms) — Devuelve si está habilitado o no TermsComponent
- [SolrQuery::getTermsField](#solrquery.gettermsfield) — Devuelve el campo desde el cuál los términos son recuperados
- [SolrQuery::getTermsIncludeLowerBound](#solrquery.gettermsincludelowerbound) — Devuelve si incluir o no el límite inferior en el conjunto de resultados
- [SolrQuery::getTermsIncludeUpperBound](#solrquery.gettermsincludeupperbound) — Devuelve si incluir o no el término de límite superior en el conjunto de resultados
- [SolrQuery::getTermsLimit](#solrquery.gettermslimit) — Devuelve el número máximo de términos que debería devolver Solr
- [SolrQuery::getTermsLowerBound](#solrquery.gettermslowerbound) — Devuelve el término en el que comenzar
- [SolrQuery::getTermsMaxCount](#solrquery.gettermsmaxcount) — Devuelve la frecuencia de documento máxima
- [SolrQuery::getTermsMinCount](#solrquery.gettermsmincount) — Devuelve la frecuencia de documento mínima a devolver para ser incluido
- [SolrQuery::getTermsPrefix](#solrquery.gettermsprefix) — Devuelve el prefijo del término
- [SolrQuery::getTermsReturnRaw](#solrquery.gettermsreturnraw) — Si devolver o no caracteres en bruto
- [SolrQuery::getTermsSort](#solrquery.gettermssort) — Devuelve un entero indicando cómo son ordenados los términos
- [SolrQuery::getTermsUpperBound](#solrquery.gettermsupperbound) — Devuelve el término en donde parar
- [SolrQuery::getTimeAllowed](#solrquery.gettimeallowed) — Devuelve el tiempo en milisegundos permitido para que la consulta finalice
- [SolrQuery::removeExpandFilterQuery](#solrquery.removeexpandfilterquery) — Elimina una consulta de filtro de extensión
- [SolrQuery::removeExpandSortField](#solrquery.removeexpandsortfield) — Elimina un campo de ordenación de expansión del parámetro expand.sort
- [SolrQuery::removeFacetDateField](#solrquery.removefacetdatefield) — Elimina uno de los campos de faceta de fecha
- [SolrQuery::removeFacetDateOther](#solrquery.removefacetdateother) — Elimina uno de los parámetros facet.date.other
- [SolrQuery::removeFacetField](#solrquery.removefacetfield) — Elimina uno de los parámetros facet.date
- [SolrQuery::removeFacetQuery](#solrquery.removefacetquery) — Elimina uno de los parámetros facet.query
- [SolrQuery::removeField](#solrquery.removefield) — Elimina un campo de la lista de campos
- [SolrQuery::removeFilterQuery](#solrquery.removefilterquery) — Elimina una consulta de filtro
- [SolrQuery::removeHighlightField](#solrquery.removehighlightfield) — Elimina uno de los campos usados para remarcación
- [SolrQuery::removeMltField](#solrquery.removemltfield) — Elimina uno de los campos moreLikeThis
- [SolrQuery::removeMltQueryField](#solrquery.removemltqueryfield) — Elimina uno de los campos de consulta moreLikeThis
- [SolrQuery::removeSortField](#solrquery.removesortfield) — Elimina uno de los campos de ordenación
- [SolrQuery::removeStatsFacet](#solrquery.removestatsfacet) — Elimina uno de los parámetros stats.facet
- [SolrQuery::removeStatsField](#solrquery.removestatsfield) — Elimina uno de los parámetros stats.field
- [SolrQuery::setEchoHandler](#solrquery.setechohandler) — Conmuta el parámetro echoHandler
- [SolrQuery::setEchoParams](#solrquery.setechoparams) — Determina qué tipo de parámetros incluir en la respuesta
- [SolrQuery::setExpand](#solrquery.setexpand) — Activa/desactiva el componente Expand
- [SolrQuery::setExpandQuery](#solrquery.setexpandquery) — Define el parámetro expand.q
- [SolrQuery::setExpandRows](#solrquery.setexpandrows) — Define el número de filas a mostrar en cada grupo (expand.rows). Valor por omisión del servidor 5
- [SolrQuery::setExplainOther](#solrquery.setexplainother) — Establece el parámetro de consulta común explainOther
- [SolrQuery::setFacet](#solrquery.setfacet) — Mapea al parámetro facet. Habilita o deshabilta las facetas
- [SolrQuery::setFacetDateEnd](#solrquery.setfacetdateend) — Mapea a facet.date.end
- [SolrQuery::setFacetDateGap](#solrquery.setfacetdategap) — Mapea a facet.date.gap
- [SolrQuery::setFacetDateHardEnd](#solrquery.setfacetdatehardend) — Mapea a facet.date.hardend
- [SolrQuery::setFacetDateStart](#solrquery.setfacetdatestart) — Mapea a facet.date.start
- [SolrQuery::setFacetEnumCacheMinDefaultFrequency](#solrquery.setfacetenumcachemindefaultfrequency) — Establece la frecuencia de documento mínima usada para determinar la cuenta de términos
- [SolrQuery::setFacetLimit](#solrquery.setfacetlimit) — Mapea a facet.limit
- [SolrQuery::setFacetMethod](#solrquery.setfacetmethod) — Especifica el tipo de algoritmo a usar cuando se hace una faceta a un campo
- [SolrQuery::setFacetMinCount](#solrquery.setfacetmincount) — Mapea a facet.mincount
- [SolrQuery::setFacetMissing](#solrquery.setfacetmissing) — Mapea a facet.missing
- [SolrQuery::setFacetOffset](#solrquery.setfacetoffset) — Establece el índice de la lista de restricciones para tener en cuenta la paginación
- [SolrQuery::setFacetPrefix](#solrquery.setfacetprefix) — Especifica un prefijo de cadena con el que limitar los términos a los que hacer una faceta
- [SolrQuery::setFacetSort](#solrquery.setfacetsort) — Determina el orden de las restricciones de campos de faceta
- [SolrQuery::setGroup](#solrquery.setgroup) — Activa/desactiva el agrupamiento de resultados (parámetro group)
- [SolrQuery::setGroupCachePercent](#solrquery.setgroupcachepercent) — Define el porcentaje de caché para el agrupamiento de resultados
- [SolrQuery::setGroupFacet](#solrquery.setgroupfacet) — Define el parámetro group.facet
- [SolrQuery::setGroupFormat](#solrquery.setgroupformat) — Define el formato de grupo, la estructura de resultado (argumento group.format)
- [SolrQuery::setGroupLimit](#solrquery.setgrouplimit) — Especifica el número de resultados a devolver para cada grupo. Valor por omisión del servidor 1
- [SolrQuery::setGroupMain](#solrquery.setgroupmain) — Si es verdadero, el resultado del primer comando de agrupación de campo se utiliza como lista de resultados principal en la respuesta, utilizando group.format=simple
- [SolrQuery::setGroupNGroups](#solrquery.setgroupngroups) — Si es verdadero, Solr incluye el número de grupos que han coincidido con la consulta en los resultados
- [SolrQuery::setGroupOffset](#solrquery.setgroupoffset) — Define el parámetro group.offset
- [SolrQuery::setGroupTruncate](#solrquery.setgrouptruncate) — Si es verdadero, los conteos de facetas se basan en el documento más relevante de cada grupo correspondiente a la consulta
- [SolrQuery::setHighlight](#solrquery.sethighlight) — Habilita o deshabilita la remarcación
- [SolrQuery::setHighlightAlternateField](#solrquery.sethighlightalternatefield) — Especifica el campo de copia de seguridad a usar
- [SolrQuery::setHighlightFormatter](#solrquery.sethighlightformatter) — Especifica un formateador para la salida resaltada
- [SolrQuery::setHighlightFragmenter](#solrquery.sethighlightfragmenter) — Establece el generador de trozos de código para texto remarcado
- [SolrQuery::setHighlightFragsize](#solrquery.sethighlightfragsize) — El tamaño de los fragmentos a considerara para remarcación
- [SolrQuery::setHighlightHighlightMultiTerm](#solrquery.sethighlighthighlightmultiterm) — Usa SpanScorer para remarcar términos de frases
- [SolrQuery::setHighlightMaxAlternateFieldLength](#solrquery.sethighlightmaxalternatefieldlength) — Establece el número máximo de caracteres del campo a devolver
- [SolrQuery::setHighlightMaxAnalyzedChars](#solrquery.sethighlightmaxanalyzedchars) — Especifica el número de caracteres de un documento para buscar trozos apropiados
- [SolrQuery::setHighlightMergeContiguous](#solrquery.sethighlightmergecontiguous) — Si colapsar o no fragmentos contiguos en un único fragmento
- [SolrQuery::setHighlightQuery](#solrquery.sethighlightquery) — Una consulta designada para la resaltación (hl.q)
- [SolrQuery::setHighlightRegexMaxAnalyzedChars](#solrquery.sethighlightregexmaxanalyzedchars) — Especifica el número máximo de caracteres a analizar
- [SolrQuery::setHighlightRegexPattern](#solrquery.sethighlightregexpattern) — Especifica la expresión regular para la fragmentación
- [SolrQuery::setHighlightRegexSlop](#solrquery.sethighlightregexslop) — Establece el factor por el cual el fragmentador de expresiones regulares puede desviarse del tamaño de fragmento ideal
- [SolrQuery::setHighlightRequireFieldMatch](#solrquery.sethighlightrequirefieldmatch) — Requerir la coincicencia de campos durante el remarcado
- [SolrQuery::setHighlightSimplePost](#solrquery.sethighlightsimplepost) — Define el texto que debe aparecer después de un término resaltado
- [SolrQuery::setHighlightSimplePre](#solrquery.sethighlightsimplepre) — Establece el texto que aparece antes de un término remarcado
- [SolrQuery::setHighlightSnippets](#solrquery.sethighlightsnippets) — Establece el número máximo de trozos remarcados para generar por campo
- [SolrQuery::setHighlightUsePhraseHighlighter](#solrquery.sethighlightusephrasehighlighter) — Si remarcar o no términos de frases sólo cuando aparecen en la frase de consulta
- [SolrQuery::setMlt](#solrquery.setmlt) — Habilita o deshabilita moreLikeThis
- [SolrQuery::setMltBoost](#solrquery.setmltboost) — Establecer si la consulta será impulsada (boost) por la relevancia del término de interés
- [SolrQuery::setMltCount](#solrquery.setmltcount) — Establece el número de documentos similares a devolver en cada resultado
- [SolrQuery::setMltMaxNumQueryTerms](#solrquery.setmltmaxnumqueryterms) — Establece el número máximo de términos de consulta incluidos
- [SolrQuery::setMltMaxNumTokens](#solrquery.setmltmaxnumtokens) — Especifica el número máximo de tokens a analizar
- [SolrQuery::setMltMaxWordLength](#solrquery.setmltmaxwordlength) — Establece la longitud de palabra máxima
- [SolrQuery::setMltMinDocFrequency](#solrquery.setmltmindocfrequency) — Establece la frecuencia de mltMinDoc
- [SolrQuery::setMltMinTermFrequency](#solrquery.setmltmintermfrequency) — Establece la frecuencia bajo la cual los términos serán ignorados en los documentos fuente
- [SolrQuery::setMltMinWordLength](#solrquery.setmltminwordlength) — Establece la longitud de palabra mínima
- [SolrQuery::setOmitHeader](#solrquery.setomitheader) — Excluye la cabecera de los resultados devueltos
- [SolrQuery::setQuery](#solrquery.setquery) — Establece la consulta de búsqueda
- [SolrQuery::setRows](#solrquery.setrows) — Especifica el número máximo de filas a devolver en el resultado
- [SolrQuery::setShowDebugInfo](#solrquery.setshowdebuginfo) — Bandera para mostrar información de depuración
- [SolrQuery::setStart](#solrquery.setstart) — Especifica el número de filas que se van a saltar
- [SolrQuery::setStats](#solrquery.setstats) — Habilita o deshablita el componente de estadísticas
- [SolrQuery::setTerms](#solrquery.setterms) — Habilita o deshablita TermsComponent
- [SolrQuery::setTermsField](#solrquery.settermsfield) — Establece el nombre del campo del que obtener los términos
- [SolrQuery::setTermsIncludeLowerBound](#solrquery.settermsincludelowerbound) — Incluir el término de límite inferior en el conjunto de resultados
- [SolrQuery::setTermsIncludeUpperBound](#solrquery.settermsincludeupperbound) — Incluir el término de límite superior en el conjunto de resultados
- [SolrQuery::setTermsLimit](#solrquery.settermslimit) — Establece el número máximo de términos a devolver
- [SolrQuery::setTermsLowerBound](#solrquery.settermslowerbound) — Especifica el término de donde empezar
- [SolrQuery::setTermsMaxCount](#solrquery.settermsmaxcount) — Establece la frecuencia máxima de documentos
- [SolrQuery::setTermsMinCount](#solrquery.settermsmincount) — Establece la frecuencia mínima de documentos
- [SolrQuery::setTermsPrefix](#solrquery.settermsprefix) — Restringe las coincidencias de términos que comienzan con el prefijo
- [SolrQuery::setTermsReturnRaw](#solrquery.settermsreturnraw) — Devuelve los caracteres en bruto del término indexado
- [SolrQuery::setTermsSort](#solrquery.settermssort) — Especifica cómo ordenar los términos devueltos
- [SolrQuery::setTermsUpperBound](#solrquery.settermsupperbound) — Establece el término en el que parar
- [SolrQuery::setTimeAllowed](#solrquery.settimeallowed) — El tiempo permitido para que la búsqueda finalice
  </li>- [SolrDisMaxQuery](#class.solrdismaxquery) — La clase SolrDisMaxQuery<li>[SolrDisMaxQuery::addBigramPhraseField](#solrdismaxquery.addbigramphrasefield) — Añade un campo de bigrama de frase (argumento pf2)
- [SolrDisMaxQuery::addBoostQuery](#solrdismaxquery.addboostquery) — Añade un campo de consulta de boost con valor y boost opcionales (argumento bq)
- [SolrDisMaxQuery::addPhraseField](#solrdismaxquery.addphrasefield) — Añade una frase de campo (argumento pf)
- [SolrDisMaxQuery::addQueryField](#solrdismaxquery.addqueryfield) — Añade un campo de consulta con boost opcional (argumento qf)
- [SolrDisMaxQuery::addTrigramPhraseField](#solrdismaxquery.addtrigramphrasefield) — Añade un campo de trigramas de frase (argumento pf3)
- [SolrDisMaxQuery::addUserField](#solrdismaxquery.adduserfield) — Añade un campo al parámetro de campo usuario (uf)
- [SolrDisMaxQuery::\_\_construct](#solrdismaxquery.construct) — Constructor de clase
- [SolrDisMaxQuery::removeBigramPhraseField](#solrdismaxquery.removebigramphrasefield) — Elimina un campo de bigrama de frase (argumento pf2)
- [SolrDisMaxQuery::removeBoostQuery](#solrdismaxquery.removeboostquery) — Elimina una parte de consulta de boost por nombre de campo (bq)
- [SolrDisMaxQuery::removePhraseField](#solrdismaxquery.removephrasefield) — Elimina un campo de frase (argumento pf)
- [SolrDisMaxQuery::removeQueryField](#solrdismaxquery.removequeryfield) — Elimina un campo de consulta (argumento qf)
- [SolrDisMaxQuery::removeTrigramPhraseField](#solrdismaxquery.removetrigramphrasefield) — Elimina un campo de frase de trigramas (argumento pf3)
- [SolrDisMaxQuery::removeUserField](#solrdismaxquery.removeuserfield) — Elimina un campo del parámetro de campo de usuario (uf)
- [SolrDisMaxQuery::setBigramPhraseFields](#solrdismaxquery.setbigramphrasefields) — Define los campos de frase bigrama y sus boosts (y márgenes) utilizando el argumento pf2
- [SolrDisMaxQuery::setBigramPhraseSlop](#solrdismaxquery.setbigramphraseslop) — Define el margen de Bigram Phrase (parámetro ps2)
- [SolrDisMaxQuery::setBoostFunction](#solrdismaxquery.setboostfunction) — Define una función de Boost (argumento bf)
- [SolrDisMaxQuery::setBoostQuery](#solrdismaxquery.setboostquery) — Define directamente el parámetro de consulta de boost (bq)
- [SolrDisMaxQuery::setMinimumMatch](#solrdismaxquery.setminimummatch) — Define el mínimo "Should" Match (mm)
- [SolrDisMaxQuery::setPhraseFields](#solrdismaxquery.setphrasefields) — Define los campos de frase y sus boosts (y slops) utilizando el parámetro pf2
- [SolrDisMaxQuery::setPhraseSlop](#solrdismaxquery.setphraseslop) — Define el margen por defecto en las consultas de frase (parámetro ps)
- [SolrDisMaxQuery::setQueryAlt](#solrdismaxquery.setqueryalt) — Define la consulta alternativa (parámetro q.alt)
- [SolrDisMaxQuery::setQueryPhraseSlop](#solrdismaxquery.setqueryphraseslop) — Especifica la cantidad de tolerancia permitida en las consultas de frase explícitamente incluidas en la cadena de consulta del usuario (parámetro qf)
- [SolrDisMaxQuery::setTieBreaker](#solrdismaxquery.settiebreaker) — Define el parámetro de Tie Breaker (parámetro tie)
- [SolrDisMaxQuery::setTrigramPhraseFields](#solrdismaxquery.settrigramphrasefields) — Define directamente los campos de trigramas de frase (argumento pf3)
- [SolrDisMaxQuery::setTrigramPhraseSlop](#solrdismaxquery.settrigramphraseslop) — Define el margen de trigramas de frase (parámetro ps3)
- [SolrDisMaxQuery::setUserFields](#solrdismaxquery.setuserfields) — Define el parámetro de campos de usuario (uf)
- [SolrDisMaxQuery::useDisMaxQueryParser](#solrdismaxquery.usedismaxqueryparser) — Cambia el QueryParser para que sea el DisMax Query Parser
- [SolrDisMaxQuery::useEDisMaxQueryParser](#solrdismaxquery.useedismaxqueryparser) — Cambia el QueryParser para que sea el EDisMax Query Parser
  </li>- [SolrCollapseFunction](#class.solrcollapsefunction) — La clase SolrCollapseFunction<li>[SolrCollapseFunction::__construct](#solrcollapsefunction.construct) — Constructor
- [SolrCollapseFunction::getField](#solrcollapsefunction.getfield) — Devuelve el campo sobre el cual se realiza la reducción
- [SolrCollapseFunction::getHint](#solrcollapsefunction.gethint) — Devuelve el índice de reducción
- [SolrCollapseFunction::getMax](#solrcollapsefunction.getmax) — Devuelve el argumento max
- [SolrCollapseFunction::getMin](#solrcollapsefunction.getmin) — Devuelve el argumento min
- [SolrCollapseFunction::getNullPolicy](#solrcollapsefunction.getnullpolicy) — Devuelve la política de null
- [SolrCollapseFunction::getSize](#solrcollapsefunction.getsize) — Devuelve el argumento de tamaño
- [SolrCollapseFunction::setField](#solrcollapsefunction.setfield) — Define el campo sobre el cual se realiza la reducción
- [SolrCollapseFunction::setHint](#solrcollapsefunction.sethint) — Define el índice de reducción
- [SolrCollapseFunction::setMax](#solrcollapsefunction.setmax) — Selecciona los encabezados de grupo por el valor máximo de un campo numérico o una consulta de función
- [SolrCollapseFunction::setMin](#solrcollapsefunction.setmin) — Define el tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente
- [SolrCollapseFunction::setNullPolicy](#solrcollapsefunction.setnullpolicy) — Define la política NULL
- [SolrCollapseFunction::setSize](#solrcollapsefunction.setsize) — Define la tamaño inicial de las estructuras de datos de reducción al reducir sobre un campo numérico únicamente
- [SolrCollapseFunction::\_\_toString](#solrcollapsefunction.tostring) — Devuelve un string que representa la función de reducción construida
  </li>- [SolrException](#class.solrexception) — La clase SolrException<li>[SolrException::getInternalInfo](#solrexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción
  </li>- [SolrClientException](#class.solrclientexception) — La clase SolrClientException<li>[SolrClientException::getInternalInfo](#solrclientexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción
  </li>- [SolrServerException](#class.solrserverexception) — La clase SolrServerException<li>[SolrServerException::getInternalInfo](#solrserverexception.getinternalinfo) — Devuelve información interna de dónde fue lanzada la excepción
  </li>- [SolrIllegalArgumentException](#class.solrillegalargumentexception) — La clase SolrIllegalArgumentException<li>[SolrIllegalArgumentException::getInternalInfo](#solrillegalargumentexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción
  </li>- [SolrIllegalOperationException](#class.solrillegaloperationexception) — La clase SolrIllegalOperationException<li>[SolrIllegalOperationException::getInternalInfo](#solrillegaloperationexception.getinternalinfo) — Devuelve información interna de donde se lanzó la excepción
  </li>- [SolrMissingMandatoryParameterException](#class.solrmissingmandatoryparameterexception) — La clase SolrMissingMandatoryParameterException
