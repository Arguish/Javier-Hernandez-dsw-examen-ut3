# YAZ

# Introducción

Esta extensión ofrece una interface PHP a el kit de herramientas
YAZ que implementa el
[» Protocolo
Z39.50 para Recuperación de Información](http://www.loc.gov/z3950/agency/).
Con esta extensión se puede fácilmente implementar un origen Z39.50 (clientes)
que busca o escanea objetivos Z39.50 (servidores) en paralelo.

El modulo esconde la mayor parte de la complejidad de Z39.50 así que debería ser
bastante fácil a usar. Apoya de manera persistente conexiones apátridas muy similares
a esas ofrecidas por varias APIs RDB que están disponibles
para PHP. Significa que las sesiones son apátridas pero se comparten entre
usuarios, por lo tanto salvando la fase de pasos para la conexión e inicialización en más
casos.

YAZ está disponible [» http://www.indexdata.dk/yaz/](http://www.indexdata.dk/yaz/). Se puede encontrar nuevas noticias,
ejemplos de códigos, etc. Para esta extensión en [» http://www.indexdata.dk/phpyaz/](http://www.indexdata.dk/phpyaz/).

**Nota**:

    Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 5.0.0.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#yaz.requirements)
- [Instalación](#yaz.installation)

    ## Requerimientos

    Obtenga YAZ (admite ANSI/NISO Z39.50) e instálelo.
    YAZ se puede obtener desde el código fuente o en varios paquetes preconstruidos
    desde el [» archivo YAZ](http://ftp.indexdata.dk/pub/yaz/).
    Los sistemas como Debian GNU/Linux, Suse Linux, FreeBSD también tienen YAZ
    como parte de su distribución.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/yaz](https://pecl.php.net/package/yaz)

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

**Nota**:
**Información específica para usuarios Windows**

php_yaz.dll depende de
yaz.dll. El yaz.dll
es parte del ZIP Win32 del sitio de PHP. También es parte de
la instalación de Windows YAZ disponible del área
[» WIN32 YAZ](http://ftp.indexdata.dk/pub/yaz/win32/).

En Windows, no se debe olvidar agregar al PATH el directorio de PHP,
para que el sistema pueda encontrar el fichero yaz.dll.

**Advertencia**
Las extensiones [IMAP](#book.imap), [recode](#book.recode) y
[YAZ](#book.yaz)
no pueden ser utilizadas simultáneamente ya que utilizan un símbolo interno común.
Nota: Yaz 2.0 y superior ya no sufre de este problema.

# Ejemplos

PHP/YAZ mantiene la vía de conexión con los objetivos de
las (Asociaciones-Z). Un recurso representa una conexión a
objetivo.

El código debajo demuestra las características de la búsqueda en paralelo
del API. Cuando se invoca sin argumentos imprime una consulta de formulario; sino
(los argumentos son suministrados) busca los objetivos como son dados en el arreglo del
anfitrión.

**Ejemplo #1 Busqueda Paralela usando YAZ**

&lt;?php
$host=$\_REQUEST[anfitrion];
$query=$\_REQUEST[consulta];
$num_hosts = count($host);
if (empty($query) || count($host) == 0) {
echo '&lt;form method="get"&gt;
&lt;input type="checkbox"
name="host[]" value="bagel.indexdata.dk/gils" /&gt;
Prueba GILS
&lt;input type="checkbox"
name="host[]" value="localhost:9999/Default" /&gt;
Prueba local
&lt;input type="checkbox" checked="checked"
name="host[]" value="z3950.loc.gov:7090/voyager" /&gt;
Congresos de librería
&lt;br /&gt;
RPN Query:
&lt;input type="text" size="30" name="query" /&gt;
&lt;input type="submit" name="action" value="Buscar" /&gt;
&lt;/form&gt;
';
} else {
echo 'Se encontro para ' . htmlspecialchars($query) . '&lt;br /&gt;';
    for ($i = 0; $i &lt; $num_hosts; $i++) {
        $id[] = yaz_connect($host[$i]);
yaz_syntax($id[$i], "usmarc");
yaz_range($id[$i], 1, 10);
yaz_search($id[$i], "rpn", $query);
    }
    yaz_wait();
    for ($i = 0; $i &lt; $num_hosts; $i++) {
        echo '&lt;hr /&gt;' . $host[$i] . ':';
$error = yaz_error($id[$i]);
if (!empty($error)) {
            echo "Error: $error";
        } else {
            $hits = yaz_hits($id[$i]);
echo "Conteo de Resultado $hits";
        }
        echo '&lt;dl&gt;';
        for ($p = 1; $p &lt;= 10; $p++) {
            $rec = yaz_record($id[$i], $p, "string");
            if (empty($rec)) continue;
echo "&lt;dt&gt;&lt;b&gt;$p&lt;/b&gt;&lt;/dt&gt;&lt;dd&gt;";
            echo nl2br($rec);
echo "&lt;/dd&gt;";
}
echo '&lt;/dl&gt;';
}
}
?&gt;

# Funciones de YAZ

# yaz_addinfo

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_addinfo — Devuelve un error adicional de información

### Descripción

**yaz_addinfo**([resource](#language.types.resource) $id): [string](#language.types.string)

Devuelve un error adicional de información para el ultimo requerimiento al servidor.

Con algunos servidores, Ésta función puede devolver la misma cadena como
[yaz_error()](#function.yaz-error).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).





### Valores devueltos

Una cadena contiene el error adicional de información o una cadena vacia si la
ultima operación fue satisfactoria o si ninguna información fue proporcionada
por el servidor.

### Ver también

    - [yaz_error()](#function.yaz-error) - Devuelve la descripción del error

    - [yaz_errno()](#function.yaz-errno) - Devuelve el número de error

# yaz_ccl_conf

(PHP 4 &gt;= 4.0.5, PECL yaz &gt;= 0.9.0)

yaz_ccl_conf — Configura el analizador CCL

### Descripción

**yaz_ccl_conf**([resource](#language.types.resource) $id, [array](#language.types.array) $config): [void](language.types.void.html)

Ésta función configura la consulta analizadora CCL para un servidor con
definiciones de puntos de acceso (Calificadores CCL) y su asignación al RPN.

Para asignar una consulta especifica CCL al RPN después se llama la función
[yaz_ccl_parse()](#function.yaz-ccl-parse).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     config


       Un arreglo de configuración. Cada clave del arreglo es el nombre de un campo CCL
       y el correspondiente valor que mantiene una cadena que especifica una
       asignación al RPN.




       La asignación es una secuencia de el tipo de atributo, de los valores de los atributos pares.
       El tipo de atributo y el valor del atributo Attribute-type es separado por un signo
       (=). Cada par es separado por un epacio en blanco.




       La información adicional la puede encontrar en la página [» CCL](http://www.indexdata.dk/yaz/doc/tools.tkl#CCL).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

En cada ejemplo a continuación, el analizador CCL está configurado para soportar el árbol de los campos
CCL: ti, au y
isbn. Cada campo es asignado a su equivalente BIB-1.
Es asumida que la variable $id es la conexión ID.

**Ejemplo #1 Configuración del CCL**

&lt;?php
$fields = array(
  "ti" =&gt; "1=4",
  "au"   =&gt; "1=1",
  "isbn" =&gt; "1=7"
);
yaz_ccl_conf($id, $fields);
?&gt;

### Ver también

    - [yaz_ccl_parse()](#function.yaz-ccl-parse) - Inviocar el analizador Invoke CCL

# yaz_ccl_parse

(PHP 4 &gt;= 4.0.5, PECL yaz &gt;= 0.9.0)

yaz_ccl_parse — Inviocar el analizador Invoke CCL

### Descripción

**yaz_ccl_parse**([resource](#language.types.resource) $id, [string](#language.types.string) $query, [array](#language.types.array) &amp;$result): [bool](#language.types.boolean)

Esta función invoca un analizador CCL. Convierte una consulta dada CCL FIND a
una consulta RPN la cual puede ser pasada también a la función [yaz_search()](#function.yaz-search)
para ejecutar la búsqueda.

Para definir un conjunto de campos validos CCL llaman preferiblemente a [yaz_ccl_conf()](#function.yaz-ccl-conf)
para definirlo en la función.

### Parámetros

     id


       El recurso de la conexión retornado por [yaz_connect()](#function.yaz-connect).






     query


       La consulta CCL FIND.






     result


       Si la función fue ejecutada con éxito, Va a ser un arreglo conteniendo
       la consulta RPN valida dentro de la clave rpn.




       En caso de fallo, tres índices son establecidos en este arreglo para indicar la causa
       del fallo:



        -

          errorcode - El código de error CCL (entero)





        -

          errorstring - El error CCL de cadena





        -

          errorpos - aproxima la posición en una consulta de fallo
          (el entero es el carácter de posición)









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Análisis CCL**

    Se va a intentar hacer una búsqueda con CCL. En el ejemplo de abajo,
    $ccl es una consulta CCL.

&lt;?php

yaz_ccl_conf($id, $fields);  // ver el ejemplo para yaz_ccl_conf
if (!yaz_ccl_parse($id, $ccl, $cclresult)) {
    echo 'Error: ' . $cclresult["errorstring"];
} else {
    $rpn = $cclresult["rpn"];
    yaz_search($id, "rpn", $rpn);
}
?&gt;

# yaz_close

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_close — Close YAZ connection

### Descripción

**yaz_close**([resource](#language.types.resource) $id): [bool](#language.types.boolean)

Cierra la conexión dada por un parámetro id.

**Nota**:

    Esta función va solo a cerrar una conexión no persistente abierta por
    estableciendo la opción de persistent a **[false](#constant.false)** con
    [yaz_connect()](#function.yaz-connect).

### Parámetros

     id


       El recurso de conexión retornado por [yaz_connect()](#function.yaz-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [yaz_connect()](#function.yaz-connect) - Prepara una conexión a un servidor Z39.50

# yaz_connect

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_connect —
Prepara una conexión a un servidor Z39.50

### Descripción

**yaz_connect**([string](#language.types.string) $zurl, [mixed](#language.types.mixed) $options = ?): [mixed](#language.types.mixed)

Esta función devuelve un recurso de conexión en caso de éxito, cero en caso
de fallo.

**yaz_connect()** prepara una conexión a un servidor
Z39.50.
Esta función es no bloqueante y no intenta establecer
una conexión - únicamente prepara la conexión para que pueda ser realizada posteriormente cuando
se llame a la función [yaz_wait()](#function.yaz-wait).

**Nota**:

    El proxy [» YAZ ](http://www.indexdata.dk/yazproxy/) es un proxy
    Z39.50 disponible gratuitamente.

### Parámetros

     zurl


       Un string que toma la forma host[:port][/database].
       Si se omite el port, se utilizará el port 210. Si se omite database
       se utilizará Default .






     options


       Si se trata de un string, éste se trata como el string de autenticación Z39.50 V2
       (OpenAuth).




       Si se trata de un array, el contenido del array sirve como opciones.




         user


           Nombre de usuario para la autenticación.






         group


           Grupo para la autenticación.






         password


            Contraseña para la autenticación.






         cookie


           Cookie para la sesión (proxy YAZ).






         proxy


           Proxy para la conexión (proxy YAZ).






         persistent


           Un booleano. Si es **[true](#constant.true)** la conexión es persistente; Si es **[false](#constant.false)** la
           conexión no es persistente. Por defecto las conexiones son persistentes.



          **Nota**:



            Si se abre una conexión persistente, no se podrá cerrar
            posteriormente con la función [yaz_close()](#function.yaz-close).







         piggyback


           Un booleano. Si es **[true](#constant.true)** piggyback está activado para las búsquedas; Si es **[false](#constant.false)**
           piggyback está desactivado. Por defecto piggyback está activado.




           Activar piggyback es más eficiente y normalmente ahorra
           una ruta de ida y vuelta en la red para las cargas de los registros por primera vez. Sin embargo, unos
           pocos servidores Z39.50 no soportan piggyback o ignoran los
           nombres de los elementos configurados. Para ellos, se debe desactivar piggyback.






         charset


           Un string que especifica el mapa de caracteres que será utilizado como
           lenguaje y mapa de caracteres en la negociación Z39.50. Utilizar strings como:
           ISO-8859-1, UTF-8,
           UTF-16.




           Muchos servidores Z39.50 no soportan esta funcionalidad (y por ello, ésta es
           ignorada). Muchos servidores utilizan la codificación ISO-8859-1 para consultas y
           mensajes. Los registros MARC21/USMARC no están afectados por este parámetro







         preferredMessageSize


           Un entero que especifica el tamaño máximo de byte para todos los registros
           que se devolverán por el objetivo durante la recuperación. Ver el
           estandard [» Z39.50](http://www.loc.gov/z3950/agency/markup/04.html#3.2.1.1.4) para más
           información.



          **Nota**:



            Esta opción está soportada en PECL YAZ 1.0.5 o posteriores.








         maximumRecordSize


           Un entero que especifica el tamaño máximo de byte de un único registro
           a ser devuelto por un objetivo durante la recuperación. Esta
           entidad se denomina como un Exceptional-record-size en el
          standard [» Z39.50](http://www.loc.gov/z3950/agency/markup/04.html#3.2.1.1.4).



          **Nota**:



            Esta opción está soportada en PECL YAZ 1.0.5 o posteriores.











### Valores devueltos

Un recurso de conexión en caso de éxito, **[false](#constant.false)** en caso de error.

### Ver también

    - [yaz_close()](#function.yaz-close) - Close YAZ connection

# yaz_database

(PHP 4 &gt;= 4.0.6, PECL yaz &gt;= 0.9.0)

yaz_database —
Especifica las bases de datos dentro de una sesión

### Descripción

**yaz_database**([resource](#language.types.resource) $id, [string](#language.types.string) $databases): [bool](#language.types.boolean)

Esta función permite cambiar las bases de datos dentro de una sesión por
una o más bases de datos especificadas a ser usadas en la búsqueda, recuperación, etc.

- primordialmente a las bases de datos especificadas a ser llamadas
  [yaz_connect()](#function.yaz-connect).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     databases


       Una cadena conteniendo una o más bases de datos. Múltiple bases de datos son
       separadas por un signo de más+.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# yaz_element

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_element —
Especifica el nombre del elemento establecido para recuperar

### Descripción

**yaz_element**([resource](#language.types.resource) $id, [string](#language.types.string) $elementset): [bool](#language.types.boolean)

Esta función especifica el nombre del elemento establecido para recuperar.

Llama esta función antes de [yaz_search()](#function.yaz-search) o
[yaz_present()](#function.yaz-present) para especificar el nombre del elemento establecido para
los registros a ser recuperados.

**Nota**:

    Si la función parece no tener efecto, ve la descripción de la opción
    piggybacking en
    [yaz_connect()](#function.yaz-connect).

### Parámetros

     id


       El recurso de conexión retornado por [yaz_connect()](#function.yaz-connect).






     elementset


       Más servidores soportan F (para registros completos) y
       B (para registros breves).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# yaz_errno

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_errno — Devuelve el número de error

### Descripción

**yaz_errno**([resource](#language.types.resource) $id): [int](#language.types.integer)

Devuelve un número de error del servidor (la última solicitud) identificado por
id.

**yaz_errno()** debe ser llamado después de la actividad de
red para cada servidor - (después del retorno de [yaz_wait()](#function.yaz-wait)) para determinar
el éxito o el fracaso de la última operación (p. e.j. search).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).





### Valores devueltos

Devuelve un código de error. El código de error es un código de diagnóstico
Z39.50 (por lo general un diagnóstico de Bib-1) o el código de error del lado
del cliente que es generado por PHP/YAZ, como "Error de conexión", "Init rechazado", etc

### Ver también

    - [yaz_error()](#function.yaz-error) - Devuelve la descripción del error

    - [yaz_addinfo()](#function.yaz-addinfo) - Devuelve un error adicional de información

# yaz_error

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_error — Devuelve la descripción del error

### Descripción

**yaz_error**([resource](#language.types.resource) $id): [string](#language.types.string)

**yaz_error()** retorna un mensaje textual en Inglés
correspondiente al último error numérico como devuelto por
[yaz_errno()](#function.yaz-errno).

### Parámetros

     id


       El recurso de conexión retornado por [yaz_connect()](#function.yaz-connect).





### Valores devueltos

Devuelve un mensaje textual por el servidor (último requerimiento), identificado por
el parámetro id. Una cadenma vacia es retornada si la última operación
fue satisfactoria.

### Ver también

    - [yaz_errno()](#function.yaz-errno) - Devuelve el número de error

    - [yaz_addinfo()](#function.yaz-addinfo) - Devuelve un error adicional de información

# yaz_es

(PECL yaz &gt;= 0.9.0)

yaz_es —
Prepara para una solicitud de servicio extendido

### Descripción

**yaz_es**(
[resource](#language.types.resource) $id
,
[string](#language.types.string) $type
,
[array](#language.types.array) $args
): [void](language.types.void.html)

Esta función prepara para una solicitud de servicio extendido.
Los servicios extendidos es la familia de diversas facilidades Z39.50, tales como
actualización de registros, ordenado de ítem, administración de base de datos, etc.

**Nota**:

    Muchos servidores Z39.50 no soportan servicios extendidos.

La **yaz_es()** crea un paquete de solicitud de servicio
extendido y la pone en una cola de operaciones.
Se utiliza [yaz_wait()](#function.yaz-wait) para enviar la(s) solicitud(es) al servidor.
Después de completar [yaz_wait()](#function.yaz-wait) el resultado de
la operación del servicio extendido se debe esperar con
una llamada a [yaz_es_result()](#function.yaz-es-result).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     type


       Un string que representa el tipo de servicio extendido:
       itemorder (Ordenado de ítem),
       create (Crear base de datos),
       drop (Descartar base de datos),
       commit (Operación de cometer),
       update (Actualizar registro),
       xmlupdate (Actualizar XML).
       Cada tipo se especifica en la sección siguiente.







     args


       Un array con las opciones de servicio extendido, más
       opciones específicas del paquete. Las opciones son idénticas a
       las ofrecidas en la API C de ZOOM C. Consulte a los
       [» servicios extendidos](http://www.indexdata.dk/yaz/doc/zoom.tkl) de ZOOM.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Actualizar registro**

&lt;?php
$con = yaz_connect("myhost/database");
$args = array (
"record" =&gt; "&lt;gils&gt;&lt;title&gt;some title&lt;/title&gt;&lt;/gils&gt;",
"syntax" =&gt; "xml",
"action" =&gt; "specialUpdate"
);
yaz_es($con, "update", $args);
yaz_wait();
$result = yaz_es_result($id);
?&gt;

### Ver también

    - [yaz_es_result()](#function.yaz-es-result) - Resulados de Servicios Extendidos de Inspección

# yaz_es_result

(PHP 4 &gt;= 4.2.0, PECL yaz &gt;= 0.9.0)

yaz_es_result —
Resulados de Servicios Extendidos de Inspección

### Descripción

**yaz_es_result**([resource](#language.types.resource) $id): [array](#language.types.array)

Esta función inspecciona el último resultado de servicio extendido
retornado de un servidor. Un servicio extendido es iniciado
por cualquier **yaz_item_order()** o
[yaz_es()](#function.yaz-es).

### Parámetros

     id


       El resultado de conexión retornado por [yaz_connect()](#function.yaz-connect).





### Valores devueltos

Devuelve un arreglo con targetReference elemento
para la referencia en la operación del servicio extendido (generado
y retornado del servidor).

### Ver también

    - [yaz_es()](#function.yaz-es) - Prepara para una solicitud de servicio extendido

# yaz_get_option

(PECL yaz &gt;= 0.9.0)

yaz_get_option — Devuelve el valor de opción para la conexión

### Descripción

**yaz_get_option**([resource](#language.types.resource) $id, [string](#language.types.string) $name): [string](#language.types.string)

Devuelve el valor de la opción especificada con name.

### Parámetros

     id


       El recurso de conexión retornado por [yaz_connect()](#function.yaz-connect).






     name


       La opción del nombre.





### Valores devueltos

Devuelve el valor de la opción especificada o una cadena vacía si la opción
wno está establecida.

### Ver también

    -
     La descripción de [yaz_set_option()](#function.yaz-set-option) - Configura una o más opciones de la conexión para las opciones
     disponibles

# yaz_hits

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_hits — Devuelve el número de éxitos de la última búsqueda

### Descripción

**yaz_hits**([resource](#language.types.resource) $id, [array](#language.types.array) &amp;$searchresult = ?): [int](#language.types.integer)

**yaz_hits()**Devuelve el número de éxitos de la última
búsqueda.

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     searchresult


       Array de resultados para obtener información de resultados de búsqueda detallada.





### Valores devueltos

Devuelve el número de éxitos de la última búsqueda o 0 si no se ha
realizado ninguna búsqueda.

La matriz de resultados de búsqueda (si se suministra) contiene información
que es devuelta por un servidor Z39.50 en el formato SearchResult-1
parte de una respuesta de búsqueda.
El formato SearchResult-1 puede utilizarse para obtener información acerca de
recuentos de éxitos para varias partes de la consulta (subconsulta).
En particular, es posible obtener recuentos de éxitos para los términos de
búsqueda individuales en una consulta. Información para la primer subconsulta
está en $array[0], segunda subconsulta en $array[1], y así sucesivamente.

   <caption>**searchresult members**</caption>
   
    <col width="1*">
    <col width="2*">
    
     
      Elemento
      Descripción


      id
      Sub consulta ID2 (string)



      count
      Conteo resultados / éxitos (integer)



      subquery.term
      Término sub consulta(string)



      interpretation.term
      Interpretación de término de sub consulta (string)



      recommendation.term
      Término recomendado de sub consulta (string)


**Nota**:

    El centro de SearchResult requiere PECL YAZ 1.0.5
    o posterior y YAZ 2.1.9 o posterior.

**Nota**:

    Muy pocas implementaciones Z39.50 soportan la instalación de SearchResult.

# yaz_itemorder

(PHP 4 &gt;= 4.0.5, PECL yaz &gt;= 0.9.0)

yaz_itemorder —
Prepara para la solicitud Z39.50 Item Order con el paquete ILL-Request

### Descripción

**yaz_itemorder**([resource](#language.types.resource) $id, [array](#language.types.array) $args): [void](language.types.void.html)

Esta función prepara para una petición de tipo "Extended Services" utilizando el
"Profile" para "Use of Z39.50 Item Order Extended Service to
Transport ILL (Profile/1)". Ver [» aquí](http://www.collectionscanada.ca/iso/ill/stanprf.htm)
y la [» especificación](http://www.collectionscanada.ca/iso/ill/document/standard/z-ill-1a.pdf).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     args


       Debe ser un array asociativo con información sobre la solicitud
       de los elementos que serán enviados. La clave de la tabla hash es el nombre del
       camino de acceso ASN.1 correspondiente. Por ejemplo, el ISBN bajo el Item-ID
       tiene la clave item-id,ISBN.




       Los parámetros de la petición ILL son:





protocol-version-num
transaction-id,initial-requester-id,person-or-institution-symbol,person
transaction-id,initial-requester-id,person-or-institution-symbol,institution
transaction-id,initial-requester-id,name-of-person-or-institution,name-of-person
transaction-id,initial-requester-id,name-of-person-or-institution,name-of-institution
transaction-id,transaction-group-qualifier
transaction-id,transaction-qualifier
transaction-id,sub-transaction-qualifier
service-date-time,this,date
service-date-time,this,time
service-date-time,original,date
service-date-time,original,time
requester-id,person-or-institution-symbol,person
requester-id,person-or-institution-symbol,institution
requester-id,name-of-person-or-institution,name-of-person
requester-id,name-of-person-or-institution,name-of-institution
responder-id,person-or-institution-symbol,person
responder-id,person-or-institution-symbol,institution
responder-id,name-of-person-or-institution,name-of-person
responder-id,name-of-person-or-institution,name-of-institution
transaction-type
delivery-address,postal-address,name-of-person-or-institution,name-of-person
delivery-address,postal-address,name-of-person-or-institution,name-of-institution
delivery-address,postal-address,extended-postal-delivery-address
delivery-address,postal-address,street-and-number
delivery-address,postal-address,post-office-box
delivery-address,postal-address,city
delivery-address,postal-address,region
delivery-address,postal-address,country
delivery-address,postal-address,postal-code
delivery-address,electronic-address,telecom-service-identifier
delivery-address,electronic-address,telecom-service-addreess
billing-address,postal-address,name-of-person-or-institution,name-of-person
billing-address,postal-address,name-of-person-or-institution,name-of-institution
billing-address,postal-address,extended-postal-delivery-address
billing-address,postal-address,street-and-number
billing-address,postal-address,post-office-box
billing-address,postal-address,city
billing-address,postal-address,region
billing-address,postal-address,country
billing-address,postal-address,postal-code
billing-address,electronic-address,telecom-service-identifier
billing-address,electronic-address,telecom-service-addreess
ill-service-type
requester-optional-messages,can-send-RECEIVED
requester-optional-messages,can-send-RETURNED
requester-optional-messages,requester-SHIPPED
requester-optional-messages,requester-CHECKED-IN
search-type,level-of-service
search-type,need-before-date
search-type,expiry-date
search-type,expiry-flag
place-on-hold
client-id,client-name
client-id,client-status
client-id,client-identifier
item-id,item-type
item-id,call-number
item-id,author
item-id,title
item-id,sub-title
item-id,sponsoring-body
item-id,place-of-publication
item-id,publisher
item-id,series-title-number
item-id,volume-issue
item-id,edition
item-id,publication-date
item-id,publication-date-of-component
item-id,author-of-article
item-id,title-of-article
item-id,pagination
item-id,ISBN
item-id,ISSN
item-id,additional-no-letters
item-id,verification-reference-source
copyright-complicance
retry-flag
forward-flag
requester-note
forward-note

       También hay unos pocos parámetros que son parte del Paquete
       de Solicitud de Servicios Extendidos y el paquete ItemOrder:





package-name
user-id
contact-name
contact-phone
contact-email
itemorder-item

### Valores devueltos

No se retorna ningún valor.

# yaz_present

(PHP 4 &gt;= 4.0.5, PECL yaz &gt;= 0.9.0)

yaz_present —
Se prepara para la recuperación (Z39.50 presente)

### Descripción

**yaz_present**([resource](#language.types.resource) $id): [bool](#language.types.boolean)

Esta función se prepara para la recuperación de archivos después de una búsqueda exitosa.

La función [yaz_range()](#function.yaz-range) debe ser llamado antes de esta función
para especificar el rango de registros a ser recuperados.

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# yaz_range

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_range —
Específica un rango de registros a recuperar

### Descripción

**yaz_range**([resource](#language.types.resource) $id, [int](#language.types.integer) $start, [int](#language.types.integer) $number): [void](language.types.void.html)

Específica un rango de registros a recuperar.

Esta función debería ser llamada antes de [yaz_search()](#function.yaz-search) o
[yaz_present()](#function.yaz-present).

### Parámetros

     id


       El recurso de conexión retornado por [yaz_connect()](#function.yaz-connect).






     start


       Especifíca la posición del primer registro a ser recuperado. Los
       registros numéricos van de 1 a [yaz_hits()](#function.yaz-hits).






     number


       Específica un rango de registros a recuperar.





### Valores devueltos

No se retorna ningún valor.

# yaz_record

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_record — Devuelve un registro

### Descripción

**yaz_record**([resource](#language.types.resource) $id, [int](#language.types.integer) $pos, [string](#language.types.string) $type): [string](#language.types.string)

La función **yaz_record()** inspecciona un registro del
conjunto resultado actual que está en la posición especificada por el parámetro
pos.

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     pos


       La posición del registro. Las posiciones de los registros en el conjunto resultado están numeradas con 1,
       2, ... $hits donde $hits es el contador devuelto por  [yaz_hits()](#function.yaz-hits).






     type


       El parámetro type especifica la forma del
       registro devuelto.



      **Nota**:



        Es la aplicación responsable de asegurar
        realmente que los registros son devueltos en el formato correcto
        por el servidor Z39.50/SRW. El type indicado únicamente especifica una conversión
        que se realizará en el lado cliente (en PHP/YAZ).





       Además de la conversion del registro transferido a un string/array, PHP/YAZ
       también puede realizar una conversión de mapa de caracteres del
       registro. Esto es recomendado especialmente para USMARC/MARC21 puesto que
       éstos se devuelven habitualmente en el mapa de caracteres MARC-8 que no
       está soportado por navegadores, etc. Para especificar una conversión, añadir
       ; charset=from,
       to donde
       from es el mapa de caracteres original
       del registro y to es el mapa de caracteres
       resultante (desde el punto de vista PHP).





        string


          El registro se devuelve como un string de visualización simple.
          En este modo, todos los registros MARC se convierten a un formato línea a línea
          ya que  ISO2709 es difícilmente legible.
          Los registros XML y SUTRS se devuelven en su formato original.
          GRS-1 se devuelve en un (feo) formato línea a línea.




          Este formato es adecuado si los registros se mostrarán de forma
          rápida - para depuración - o porque no es factible realizar
          una visualización adecuada.






        xml


          El registro se devuelve como un string XML si es posible.
          En este modo, todos los registros MARC se convierten en
          [» MARCXML](http://www.loc.gov/standards/marcxml/).
          Los registros XML y SUTRS se devuelven en su formato original.
          GRS-1 no está soportado.




          Este formato es parecido a string excepto por los
          registros MARC que se convierten a MARCXML




          Este formato es adecuado si los registros se procesan posteriormente por un interpretador XML
          o un procesador XSLT .






        raw


          El registro se devuelve como un string en su formato original.
          Este tipo es adecuado para MARC, XML y SUTRS. No funciona con
          GRS-1.




          Los registros MARC se devuelven como un string ISO2709. XML y SUTRS son
          devueltos como strings.






        syntax


          La sintaxis del registro se devuelve como un string, p.e.
          USmarc, GRS-1,
          XML, etc.






        database


          El nombre de la base de datos asociada con el registro en la posición,
          se devuelve como un string.






        array


          El registro se devuelve como un array que refleja la estructura
          GRS-1. Este tipo es adecuado para MARC y GRS-1. XML, SUTRS
          no están soportados y si el registro actual es XML o SUTRS se
          devolverá un string vacío.




          El array devuelto consiste en una lista correspondiente a
          cada hoja/nodo interno de GRS-1. Cada lista de elementos consiste en
          una sublista con el primer elemento *path* y
          *data* (si los datos están disponibles).




          El camino de acceso, que es un string, contiene una lista de tres componentes (del
          registro estructurado GRS-1) de la raíz a la hoja. Cada componente es
          un par de tipo etiqueta/valor de etiqueta de la forma
          (type,
          value




          Las etiguqetas normalmente tienen un tipo tag 3.
          MARC también puede ser devuelto como un array (se convierten a
          GRS-1 internamente).








### Valores devueltos

Devuelve el registro que se encuentra en la posición pos o un string
vacío si no existe ningún registro en la posición indicada.

Si no hay registro en la posición indicada en la base de datos, se devolverá un string
vacío.

### Ejemplos

**Ejemplo #1 Array para registro GRS-1**

    Considerar este registro GRS-1 :

(4,52)Robert M. Pirsig
(4,70)
(4,90)
(2,7)Transworld Publishers, ltd.

    Este registro tiene dos nodos a nivel de raíz. El primer elemento del nivel raíz es
    (4,52) [tipo tag 4, valor de tag 52], y tiene datos Robert M.
    Pirsig. El segundo elemento en el nivel raíz (4,70) tiene un subárbol con
    un elemento simple (4,90). (4,90) tiene a su vez otro subárbol (2,7) con datos
    Transworld Publishers, ltd..


    Si este registro está presente en la posición $p, entonces

&lt;?php

$ar = yaz_record($id, $p, "array");
print_r($ar);

?&gt;

    will output:

Array
(
[0] =&gt; Array
(
[0] =&gt; (4,52)
[1] =&gt; Robert M. Pirsig
)
[1] =&gt; Array
(
[0] =&gt; (4,70)
)
[2] =&gt; Array
(
[0] =&gt; (4,70)(4,90)
)
[3] =&gt; Array
(
[0] =&gt; (4,70)(4,90)(2,7)
[1] =&gt; Transworld Publishers, ltd.
)
)

**Ejemplo #2 Trabajar con MARCXML**

    El siguiente fragmento de PHP devuelve un registro MARC21/USMARC como MARCXML.
    El registro original se devuelve en marc-8 (desconocido para muchos interpretadores XML),
    así que lo convertimos a UTF-8 (que todos los interpretadores XML deben soportar).

&lt;?php
$rec = yaz_record($id, $p, "xml; charset=marc-8,utf-8");
?&gt;

    El registro $rec puede ser procesado con el
    procesador Sablotron XSLT de la forma siguiente:

&lt;?php

$xslfile = 'display.xsl';
$processor = xslt_create();
$parms = array('/_xml' =&gt; $rec);
$res = xslt_process($processor, 'arg:/_xml', $xslfile, NULL, $parms);
xslt_free($processor);
$res = preg_replace("'&lt;/?html[^&gt;]\*&gt;'", '', $res);
echo $res;

?&gt;

# yaz_scan

(PHP 4 &gt;= 4.0.5, PECL yaz &gt;= 0.9.0)

yaz_scan — Prepara para un escaneo YAZ

### Descripción

**yaz_scan**(
    [resource](#language.types.resource) $id,
    [string](#language.types.string) $type,
    [string](#language.types.string) $startterm,
    [array](#language.types.array) $flags = ?
): [void](language.types.void.html)

Esta función prepara para una solicitud "Z39.50 Scan Request" en la conexión YAZ
especificada.

Para transferir realmente la "Scan Request" del servidor y recibir la
"Scan Response", debe llamarse [yaz_wait()](#function.yaz-wait). Después
de la finalización de la llamada a [yaz_wait()](#function.yaz-wait), llamar a
[yaz_error()](#function.yaz-error) y [yaz_scan_result()](#function.yaz-scan-result) para
gestionar la respuesta.

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     type


       Actualmente sólo está soportado el tipo rpn .






     startterm


       Punto de partida del escaneo.




       La forma en la que el punto de partida es especificado, viene dado por el parámetro
       type.




       La sintaxis de este parámetro es parecido al de la consulta RPN tal y como se describe en
       [yaz_search()](#function.yaz-search). Consiste en cero o más
       especificaciones del operador @attr, seguido de
       exactamente un token.






     flags


       Este parámetro opcional describe información adicional para controlar
       el comportamiento de la solicitud de escaneo. Tres índices se leen actualmente
       del array de marcas:
       number (número de términos solicitados),
       position (posición preferida del término) y
       stepSize (tamaño preferido del paso).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 función PHP que escanea títulos**

&lt;?php
function scan_titles($id, $startterm)
{
  yaz_scan($id, "rpn", "@attr 1=4 " . $startterm);
  yaz_wait();
  $errno = yaz_errno($id);
if ($errno == 0) {
    $ar = yaz_scan_result($id, $options);
    echo 'Scan ok; ';
    foreach ($options as $key =&gt; $val) {
      echo "$key = $val ";
    }
    echo '&lt;br /&gt;&lt;table&gt;';
    while (list($key, list($k, $term, $tcount)) = each($ar)) {
if (empty($k)) continue;
      echo "&lt;tr&gt;&lt;td&gt;$term&lt;/td&gt;&lt;td&gt;$tcount&lt;/td&gt;&lt;/tr&gt;";
    }
    echo '&lt;/table&gt;';
  } else {
    echo "Error de escaneo. Error: " . yaz_error($id) . "&lt;br /&gt;";
}
}
?&gt;

# yaz_scan_result

(PHP 4 &gt;= 4.0.5, PECL yaz &gt;= 0.9.0)

yaz_scan_result — Devuelve el resultado de un escaneado

### Descripción

**yaz_scan_result**([resource](#language.types.resource) $id, [array](#language.types.array) &amp;$result = ?): [array](#language.types.array)

**yaz_scan_result()** devuelve una tabla con los términos y la información
asociada tal y como fue recibida del servidor en la última función
[yaz_scan()](#function.yaz-scan) realizada.

### Parámetros

     id


       El recurso de conexión asociado por [yaz_connect()](#function.yaz-connect).






     result


       Si se indica, este array será modificado para contener información adicional
       tomada de la respuesta del scan:



        -

          number - Número de entradas devueltas





        -

          stepsize - Tamaño del paso





        -

          position - Posición del término





        -

          status - Estado del escaneo









### Valores devueltos

Devuelve un array (0..n-1) donde n es el número de elementos devuetos. Cada
valor es un par donde el primer elemento es el término, y el segundo es
el contador de resultados.

# yaz_schema

(PHP 4 &gt;= 4.2.0, PECL yaz &gt;= 0.9.0)

yaz_schema —
Especifica el esquema para la recuperación

### Descripción

**yaz_schema**([resource](#language.types.resource) $id, [string](#language.types.string) $schema): [void](language.types.void.html)

**yaz_schema()** especifica el esquema para la recuperación.

Esta función debe ser llamada antes de
[yaz_search()](#function.yaz-search) o [yaz_present()](#function.yaz-present).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     schema


       Debe ser especificado como un OID (identificador de objeto) notación de puntos
       sin tratar (como  1.2.840.10003.13.4 ) o
       como uno de los esquemas conocidos registrados: GILS-schema,
       Holdings, Zthes, ...





### Valores devueltos

No se retorna ningún valor.

# yaz_search

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_search — Prepara una búsqueda

### Descripción

**yaz_search**([resource](#language.types.resource) $id, [string](#language.types.string) $type, [string](#language.types.string) $query): [bool](#language.types.boolean)

**yaz_search()** prepara una búsqueda en la conexión
dada.

Como [yaz_connect()](#function.yaz-connect) esta función es no bloqueante y
únicamente prepara una búsqueda para ser ejecutada posteriormente cuando
se llame a la función [yaz_wait()](#function.yaz-wait) .

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     type


       Este parámetro representa el tipo de la consulta - únicamente "rpn"
       está soportado ahora, en cuyo caso el tercer argumento especifica una consulta de tipo
       Type-1 en notación de prefijo de consulta.






     query


       La consulta RPN es una representación textual de la consulta Type-1 tal y como está
       definida por el estandard Z39.50 . Sin embargo, en la representación del texto
       utilizada por YAZ se necesita una notación de prefijo, es decir que el operador
       precede a los operandos. El string de la consulta es una secuencia de tokens donde
       se ignora el espacio en blanco a menos que esté rodeado de dobles comillas. Los Tokens que empiecen
       con una arroba (@) se considerarán operadores,
       de otro modo, se tratarán como términos de búsqueda.




       <caption>**Operadores RPN**</caption>

        <col width="1*">
        <col width="2*">


          Sintaxis
          Descripción






          @and query1 query2
          intersección de las consultas query1 y query2



          @or query1 query2
          unión de las consultas query1 y query2



          @not query1 query2
          query1 y no query2



          @set name
          conjunto resultado de referencia



          @attrset set query

           especifica el conjunto de atributos para la consulta. Esta construcción sólo se permite
           una sola vez - en el inicio de la consulta




          @attr [set] type=value query

           aplica atributos a la consulta. El tipo y valor son enteros
           especificando el tipo del atributo y valor del atributo respectivamente.
           El conjunto, si se informa, especifica el conjunto atributo.








       Se muestra más información sobre atributos en el link
       [» Z39.50 Maintenance Agency](http://www.loc.gov/z3950/agency/defns/bib1.html)
       site.



      **Nota**:



        Si se desea utilizar una notación más amigable,
        utilizar el interpretador CCL - functiones [yaz_ccl_conf()](#function.yaz-ccl-conf) y
        [yaz_ccl_parse()](#function.yaz-ccl-parse).






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Query Examples**

    Se puede buscar por términos sencillos, como en el caso siguiente:

computer

    que busca documentos donde aparece "computer" . No se han especificado
    atributos.


    La consulta

"knuth donald"

    busca documentos donde aparece "knuth donald" (suponiendo que el
    servidor soporta búsqueda de frases).


    Esta consulta aplica dos atributos para la misma frase.

@attr 1=1003 @attr 4=1 "knuth donald"
El primer atributo es de tipo type 1 (usa Bib-1), el valor del atributo es 1003
(Autor).
El segundo atributo es de tipo type 4 (estructura), valor 1 (frase),
así que debe buscar documentos donde Donald Knuth es el autor.

    La consulta

@and @or a b @not @or c d e

    en notación infija tendría el aspecto: (a or b) and ((c or d) not
    e).


    Otro ejemplo, más complejo:

@attrset gils @and @attr 1=4 art @attr 1=2000 company

    La consulta utiliza el conjunto de atributos GILS . La consulta busca
    documentos en los que  art aparece en el título (GILS,BIB-1)
    y en los que company aparece como Distributor (GILS).

# yaz_set_option

(PECL yaz &gt;= 0.9.0)

yaz_set_option — Configura una o más opciones de la conexión

### Descripción

**yaz_set_option**([resource](#language.types.resource) $id, [string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

**yaz_set_option**([resource](#language.types.resource) $id, [array](#language.types.array) $options): [void](language.types.void.html)

Configura una o más opciones de la conexión dada.

### Parámetros

     id


       El recurso de conexión devuelta por [yaz_connect()](#function.yaz-connect).






     name o options


       Puede ser un string o un array.




       Si se informa un string, será el nombre de la opción a configurar. Será necesario
      especificar su value.




       Si se informa un array, será un array asociativo (nombre opción
       =&gt; valor opción).




       <caption>**Opciones de Conexión PHP/YAZ**</caption>

        <col width="2*">
        <col width="5*">


          Nombre
          Descripción






          implementationName
          nombre de la implementación del servidor



          implementationVersion
          versión de implementación del servidor



          implementationId
          ID de implementación del servidor



          schema

           esquema de recuperación. Por defecto, no se utiliza ningún esquema. Configurar esta
           opción es equivalente a utilizar la función
           [yaz_schema()](#function.yaz-schema)




          preferredRecordSyntax

           sintaxis del registro para la recuperación. Por defecto, no se utiliza sintaxis. Configurar
           esta opción es equivalente a utilizar la función
           [yaz_syntax()](#function.yaz-syntax)




          start

           desplazamiento para el primer registro a ser obtenido vía
           [yaz_search()](#function.yaz-search) o [yaz_present()](#function.yaz-present).
           El primer registro está numerado con un valor inicial de 0. El segundo registro tiene
           valor de inicio 1.
           Configurar esta opción en combinación con la opción
           count tiene el mismo efecto que llamar a
           [yaz_range()](#function.yaz-range) excepto que los registros están
           numerados a partir de de 1 con [yaz_range()](#function.yaz-range)




          count
          número máximo de registros a recuperar vía
           [yaz_search()](#function.yaz-search) o [yaz_present()](#function.yaz-present).




          elementSetName
          nombre del conjunto de elementos para la recuperación. Configurar esta opción es
           equivalente a llamar a [yaz_element()](#function.yaz-element).










     value


       El nuevo valor de la opción. Utilizar este parámetro únicamente si el argumento previo es
       un string.





### Valores devueltos

No se retorna ningún valor.

# yaz_sort

(PHP 4 &gt;= 4.0.7, PECL yaz &gt;= 0.9.0)

yaz_sort — Configura los criterios de búsqueda

### Descripción

**yaz_sort**([resource](#language.types.resource) $id, [string](#language.types.string) $criteria): [void](language.types.void.html)

Esta función configura los criterios de búsqueda y activa la ordenación Z39.50 .

LLamar a esta función _antes_ de [yaz_search()](#function.yaz-search).
Utilizar esta función por si sola no tiene ningún efecto. Cuando se usa en conjunción
con [yaz_search()](#function.yaz-search), una ordenación Z39.50 se enviará después de que la
respuesta de la búsqueda ha sido recibida y antes de que cualquier registro sea recuperado con
Z39.50 Present ([yaz_present()](#function.yaz-present).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     criteria


       Un string que toma la forma field1 flags1 field2
       flags2 donde field1 especifica los atributos primarios para
       ordenar, field2 los secundarios, etc..




       El campo especifica ya sea combinaciones de atributos numéricos consistentes
       de pares type=value separados por una coma (p.e. 1=4,2=1)
       ; o el campo debe especificar un string con el criterio (p.e.
       título). Los flags son secuencias de los caracteres
       siguientes que no pueden estar separados por ningún espacio.







        **Sort Flags**

         a


           Ordenar de forma ascendente






         d


           Ordenar de forma descendente






         i


           No diferenciar entre mayúsculas o minúsculas en la ordenación






         s


           Diferenciar entre mayúsculas o minúsculas en la ordenación









### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Criterios de Ordenación**

    Para ordenar con el título de atributo Bib1e, sin diferenciar mayúsculas o minúsculas, y de forma ascendente,
    utilizar el siguiente criterio de ordenación:

1=4 ia

    Si el criterio de ordenación secundario fuera el autor, diferenciando mayúsculas y minúsculas y
    de forma ascendente, se usaría:

1=4 ia 1=1003 sa

# yaz_syntax

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_syntax —
Especifica la sintaxis de registro preferida para la recuperación

### Descripción

**yaz_syntax**([resource](#language.types.resource) $id, [string](#language.types.string) $syntax): [void](language.types.void.html)

**yaz_syntax()** especifica la sintaxis de registro preferida para
la recuperación

Esta función debe ser llamada antes de [yaz_search()](#function.yaz-search) o
[yaz_present()](#function.yaz-present).

### Parámetros

     id


       El recurso de conexión devuelto por [yaz_connect()](#function.yaz-connect).






     syntax


       La sintaxis debe especificarse como un OID (identificador de objeto) en una
       notación de puntos sin tratar (como 1.2.840.10003.5.10) o como una
       de las sintaxis conocidas (sutrs, usmarc, grs1, xml, etc.).





### Valores devueltos

No se retorna ningún valor.

# yaz_wait

(PHP 4 &gt;= 4.0.1, PECL yaz &gt;= 0.9.0)

yaz_wait — Espera que las peticiones Z39.50 se completeten

### Descripción

**yaz_wait**([array](#language.types.array) &amp;$options = ?): [mixed](#language.types.mixed)

Esta función lleva a cabo en red (bloqueada) la actividad para la
solicitudes pendientes que han sido preparados por las funciones
[yaz_connect()](#function.yaz-connect), [yaz_search()](#function.yaz-search),
[yaz_present()](#function.yaz-present), [yaz_scan()](#function.yaz-scan) y
[yaz_itemorder()](#function.yaz-itemorder).

**yaz_wait()** devuelve cuando todos los servidores han
completado todas las solicitudes o abortado (en caso de error).

### Parámetros

     options


       Un array asociativo de opciones:




         timeout


           Establece el tiempo de espera en segundos. Si un servidor no ha respondido en el
           tiempo de espera se considera muerto y retorna **yaz_wait()**.
           El valor por omisión de tiempo de espera es de 15 segundos.






         event


           Un boolean.









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
En modo event, retorna un recource o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [yaz_addinfo](#function.yaz-addinfo) — Devuelve un error adicional de información
- [yaz_ccl_conf](#function.yaz-ccl-conf) — Configura el analizador CCL
- [yaz_ccl_parse](#function.yaz-ccl-parse) — Inviocar el analizador Invoke CCL
- [yaz_close](#function.yaz-close) — Close YAZ connection
- [yaz_connect](#function.yaz-connect) — Prepara una conexión a un servidor Z39.50
- [yaz_database](#function.yaz-database) — Especifica las bases de datos dentro de una sesión
- [yaz_element](#function.yaz-element) — Especifica el nombre del elemento establecido para recuperar
- [yaz_errno](#function.yaz-errno) — Devuelve el número de error
- [yaz_error](#function.yaz-error) — Devuelve la descripción del error
- [yaz_es](#function.yaz-es) — Prepara para una solicitud de servicio extendido
- [yaz_es_result](#function.yaz-es-result) — Resulados de Servicios Extendidos de Inspección
- [yaz_get_option](#function.yaz-get-option) — Devuelve el valor de opción para la conexión
- [yaz_hits](#function.yaz-hits) — Devuelve el número de éxitos de la última búsqueda
- [yaz_itemorder](#function.yaz-itemorder) — Prepara para la solicitud Z39.50 Item Order con el paquete ILL-Request
- [yaz_present](#function.yaz-present) — Se prepara para la recuperación (Z39.50 presente)
- [yaz_range](#function.yaz-range) — Específica un rango de registros a recuperar
- [yaz_record](#function.yaz-record) — Devuelve un registro
- [yaz_scan](#function.yaz-scan) — Prepara para un escaneo YAZ
- [yaz_scan_result](#function.yaz-scan-result) — Devuelve el resultado de un escaneado
- [yaz_schema](#function.yaz-schema) — Especifica el esquema para la recuperación
- [yaz_search](#function.yaz-search) — Prepara una búsqueda
- [yaz_set_option](#function.yaz-set-option) — Configura una o más opciones de la conexión
- [yaz_sort](#function.yaz-sort) — Configura los criterios de búsqueda
- [yaz_syntax](#function.yaz-syntax) — Especifica la sintaxis de registro preferida para la recuperación
- [yaz_wait](#function.yaz-wait) — Espera que las peticiones Z39.50 se completeten

- [Introducción](#intro.yaz)
- [Instalación/Configuración](#yaz.setup)<li>[Requerimientos](#yaz.requirements)
- [Instalación](#yaz.installation)
  </li>- [Ejemplos](#yaz.examples)
- [Funciones de YAZ](#ref.yaz)<li>[yaz_addinfo](#function.yaz-addinfo) — Devuelve un error adicional de información
- [yaz_ccl_conf](#function.yaz-ccl-conf) — Configura el analizador CCL
- [yaz_ccl_parse](#function.yaz-ccl-parse) — Inviocar el analizador Invoke CCL
- [yaz_close](#function.yaz-close) — Close YAZ connection
- [yaz_connect](#function.yaz-connect) — Prepara una conexión a un servidor Z39.50
- [yaz_database](#function.yaz-database) — Especifica las bases de datos dentro de una sesión
- [yaz_element](#function.yaz-element) — Especifica el nombre del elemento establecido para recuperar
- [yaz_errno](#function.yaz-errno) — Devuelve el número de error
- [yaz_error](#function.yaz-error) — Devuelve la descripción del error
- [yaz_es](#function.yaz-es) — Prepara para una solicitud de servicio extendido
- [yaz_es_result](#function.yaz-es-result) — Resulados de Servicios Extendidos de Inspección
- [yaz_get_option](#function.yaz-get-option) — Devuelve el valor de opción para la conexión
- [yaz_hits](#function.yaz-hits) — Devuelve el número de éxitos de la última búsqueda
- [yaz_itemorder](#function.yaz-itemorder) — Prepara para la solicitud Z39.50 Item Order con el paquete ILL-Request
- [yaz_present](#function.yaz-present) — Se prepara para la recuperación (Z39.50 presente)
- [yaz_range](#function.yaz-range) — Específica un rango de registros a recuperar
- [yaz_record](#function.yaz-record) — Devuelve un registro
- [yaz_scan](#function.yaz-scan) — Prepara para un escaneo YAZ
- [yaz_scan_result](#function.yaz-scan-result) — Devuelve el resultado de un escaneado
- [yaz_schema](#function.yaz-schema) — Especifica el esquema para la recuperación
- [yaz_search](#function.yaz-search) — Prepara una búsqueda
- [yaz_set_option](#function.yaz-set-option) — Configura una o más opciones de la conexión
- [yaz_sort](#function.yaz-sort) — Configura los criterios de búsqueda
- [yaz_syntax](#function.yaz-syntax) — Especifica la sintaxis de registro preferida para la recuperación
- [yaz_wait](#function.yaz-wait) — Espera que las peticiones Z39.50 se completeten
  </li>
