# mqseries

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

Esta extensión proporciona una interfaz de comunicación con los servidores de cola
de IBM WebSphere MQ.

La interfaz imita la API del cliente C de WebSphere MQ Series tanto como sea posible,
utilizando las mismas convenciones de nombres y funcionalidades. Para comprender
el funcionamiento de esta extensión, se requiere un conocimiento mínimo de la
interfaz C.

Para las opciones MQ, estructuras MQ, resultados MQ, etc., consulte la "Guía de
programación de aplicaciones WebSphere MQ" y la "Referencia de programación de
aplicaciones WebSphere MQ".

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mqseries.requirements)
- [Instalación](#mqseries.configure)
- [Configuración en tiempo de ejecución](#mqseries.ini)
- [Tipos de recursos](#mqseries.resources)

    ## Requerimientos

    Una instalación funcional de IBM WebSphere MQ. Para la compilación de la extensión,
    el SDK de IBM WebSphere MQ también es necesario.

    **Nota**:

    Debe preverse que al funcionar con el cliente IBM WebSphere MQ,
    ciertos métodos no están disponibles. Esto no es un problema con
    la extensión, sino simplemente la forma de funcionar de
    WebSphere MQ Client Interface.

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí: [» https://pecl.php.net/package/mqseries](https://pecl.php.net/package/mqseries).

**Nota**:

El nombre oficial de esta extensión es _mqseries_.

Existen dos formas de conectarse al gestor de colas. Dependen de cómo se haya compilado la extensión.

    -

      En primer lugar, y también por omisión, se encuentra la biblioteca mqic. Al compilar y enlazar la extensión con las bibliotecas IBM WebSphere MQSeries, es posible conectarse al gestor de colas mediante la interfaz cliente. Las conexiones remotas también son posibles de esta manera.





    -

      La otra forma es compilar y enlazar las bibliotecas mqm. Al utilizar estas bibliotecas, es posible emplear el gestor de transacciones del servidor de colas.


Actualmente, la selección de estas bibliotecas se realiza modificando el fichero config.m4.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

Esta extensión no define ninguna directiva de configuración.

## Tipos de recursos

Esta extensión define un recurso de conexión y de object_handle.

Las funciones [mqseries_conn()](#function.mqseries-conn) y [mqseries_connx()](#function.mqseries-connx) definen
recursos de conexión.

La función [mqseries_open()](#function.mqseries-open) define un recurso de object_handle.

# Constantes predefinidas

Para cada constante WebSphere MQ, existe un equivalente en mqseries.

Para las definiciones y el uso, consulte el
"WebSphere MQ Application Programming Guide" y "WebSphere MQ
Application Programming Reference red books".

El nombre de las constantes mqseries se forma prefijando el nombre de la constante
WebSphere MQ con MQSERIES\_. Por ejemplo, las constantes
de CompletionCode son:

   <caption>**Constantes mqseries**</caption>
   
    
     
      Constante PHP
      Constante MQ


      MQSERIES_MQCC_OK
      MQCC_OK



      MQSERIES_MQCC_WARNING
      MQCC_WARNING



      MQSERIES_MQCC_FAILED
      MQCC_FAILED



      MQSERIES_MQCC_UNKNOWN
      MQCC_UNKNOWN


# Funciones de mqseries

# mqseries_back

(PECL mqseries &gt;= 0.10.0)

mqseries_back — MQSeries MQBACK

### Descripción

**mqseries_back**([resource](#language.types.resource) $hconn, [resource](#language.types.resource) &amp;$compCode, [resource](#language.types.resource) &amp;$reason): [void](language.types.void.html)

**mqseries_back()** indica al gestor de colas que
todos los mensajes leídos y escritos desde el último punto de sincronización
deben ser anulados. Los mensajes que forman parte de una unidad de trabajo
serán eliminados. Los mensajes leídos como unidad de trabajo serán reinsertados en
la cola.

El uso de
**mqseries_back()** funciona asimismo en conjunción con
[mqseries_begin()](#function.mqseries-begin) y únicamente al conectarse
directamente al gestor de colas: no funciona a través de
la interfaz mqclient.

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_back()**

&lt;?php
mqseries_back($conn, $comp_code, $reason);

    if ($comp_code !== MQSERIES_MQCC_OK) {
        printf("CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
    }

?&gt;

### Notas

**Nota**:

    **mqseries_back()** no funciona cuando un
    cliente MQSeries Client se conecta al Queue Manager.

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

    - [mqseries_begin()](#function.mqseries-begin) - MQseries MQBEGIN

# mqseries_begin

(PECL mqseries &gt;= 0.10.0)

mqseries_begin — MQseries MQBEGIN

### Descripción

**mqseries_begin**(
    [resource](#language.types.resource) $hconn,
    [array](#language.types.array) $beginOptions,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_begin()** inicia una unidad de trabajo, coordinada
por el gestor de colas, e involucrando finalmente gestores de recursos externos.

Al utilizar
**mqseries_begin()** se inicia una unidad de trabajo.
Finalmente, [mqseries_back()](#function.mqseries-back) o [mqseries_cmit()](#function.mqseries-cmit)
terminarán la unidad de trabajo.

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_begin()**

&lt;?php
$mqbo = array();
    mqseries_begin( $conn,
                    $mqbo,
                    $comp_code,
                    $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
/_ reason code 2121 es una advertencia, para más información ver el manual de referencia de MQSeries._/
if ($reason !== 2121) {
            printf("CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
}
}
?&gt;

### Notas

**Nota**:

    **mqseries_begin()** no funciona cuando un
    cliente MQSeries Client se conecta al gestor de colas.

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

    - [mqseries_back()](#function.mqseries-back) - MQSeries MQBACK

    - [mqseries_cmit()](#function.mqseries-cmit) - MQSeries MQCMIT

# mqseries_close

(PECL mqseries &gt;= 0.10.0)

mqseries_close — MQSeries MQCLOSE

### Descripción

**mqseries_close**(
    [resource](#language.types.resource) $hconn,
    [resource](#language.types.resource) $hobj,
    [int](#language.types.integer) $options,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_close()** libera el acceso a un objeto y es la operación inversa
de la función [mqseries_open()](#function.mqseries-open).

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      hObj


      Gestor de objeto.


      Este recurso representa el objeto a utilizar.






      options









      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_close()**

&lt;?php
mqseries_close($conn, $obj, MQSERIES_MQCO_NONE, $comp_code, $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
printf("close CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
}
?&gt;

### Ver también

    - [mqseries_open()](#function.mqseries-open) - MQSeries MQOPEN

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

# mqseries_cmit

(PECL mqseries &gt;= 0.10.0)

mqseries_cmit — MQSeries MQCMIT

### Descripción

**mqseries_cmit**([resource](#language.types.resource) $hconn, [resource](#language.types.resource) &amp;$compCode, [resource](#language.types.resource) &amp;$reason): [void](language.types.void.html)

**mqseries_cmit()** indica al gestor de colas que la aplicación
ha alcanzado un punto de sincronización, y que todos los mensajes que han sido
leídos y escritos desde el último punto de sincronización han sido hechos permanentes.
Los mensajes colocados en la cola como unidad de trabajo son ahora
accesibles a otras aplicaciones. Los mensajes leídos como unidad de trabajo son
ahora destruidos.

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_cmit()**

&lt;?php
mqseries_cmit($conn, $comp_code, $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
printf("cmit CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
}
?&gt;

### Notas

**Nota**:

    [mqseries_back()](#function.mqseries-back) no funciona cuando un
    cliente MQSeries Client se conecta al gestor de colas.

### Ver también

    - [mqseries_begin()](#function.mqseries-begin) - MQseries MQBEGIN

    - [mqseries_back()](#function.mqseries-back) - MQSeries MQBACK

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

# mqseries_conn

(PECL mqseries &gt;= 0.10.0)

mqseries_conn — MQSeries MQCONN

### Descripción

**mqseries_conn**(
    [string](#language.types.string) $qManagerName,
    [resource](#language.types.resource) &amp;$hconn,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_conn()** establece la conexión con el gestor de colas.
Proporciona un recurso de conexión, que es utilizado por las demás funciones
de la extensión.

### Parámetros

      qManagerName


      Nombre del gestor de colas.


      Nombre del gestor de colas con el que la aplicación desea conectarse.






      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_conn()**

&lt;?php
mqseries_conn('WMQ1', $conn, $comp_code, $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
printf("conn CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
exit;
}
?&gt;

### Ver también

    - [mqseries_disc()](#function.mqseries-disc) - MQSeries MQDISC

# mqseries_connx

(PECL mqseries &gt;= 0.10.0)

mqseries_connx — MQSeries MQCONNX

### Descripción

**mqseries_connx**(
    [string](#language.types.string) $qManagerName,
    [array](#language.types.array) &amp;$connOptions,
    [resource](#language.types.resource) &amp;$hconn,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

La llamada a
**mqseries_connx()**
(MQCONNX) conecta un programa de aplicación a un gestor de colas.
Proporciona un descriptor de conexión del gestor de colas,
que es utilizado por la aplicación en llamadas MQ posteriores.

La llamada a **mqseries_connx()** es como la llamada a
[mqseries_conn()](#function.mqseries-conn) (MQCONN), con la excepción de que MQCONNX
permite especificar opciones para controlar el funcionamiento de la llamada.

### Parámetros

      qManagerName


      Nombre del gestor de colas.


      Nombre del gestor de colas con el que la aplicación desea conectarse.






      connOps


      Opciones que controlan las acciones de la función


      Véase también la estructura MQCNO.







      hConn


      Gestor de conexión.


      Este gestor representa la conexión al gestor de colas.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1
     Ejemplo con mqseries_connx()**

&lt;?php
$mqcno = array(
'Version' =&gt; MQSERIES_MQCNO_VERSION_2,
'Options' =&gt; MQSERIES_MQCNO_STANDARD_BINDING,
'MQCD' =&gt; array('ChannelName' =&gt; 'MQNX9420.CLIENT',
'ConnectionName' =&gt; 'localhost',
'TransportType' =&gt; MQSERIES_MQXPT_TCP)
);

    mqseries_connx('MQNX9420', $mqcno, $conn, $comp_code,$reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
        printf("Connx CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
        exit;
    }

?&gt;

    **Ejemplo #2
     Ejemplo con mqseries_connx()** utilizando una
     conexión SSL y una URL OCSP Responder

&lt;?php
$mqcno = array(
'Version' =&gt; 4, //MQCNO_VERSION_4
'Options' =&gt; MQSERIES_MQCNO_STANDARD_BINDING,
'MQCD' =&gt; array(
'Version' =&gt; 7, //MQCD_VERSION_7
'ConnectionName' =&gt; 'localhost',
'TransportType' =&gt; MQSERIES_MQXPT_TCP,
'ChannelName' =&gt; 'CONNECTIONCHANNEL',
'SSLCipherSpec' =&gt; 'NULL_SHA'
),
'MQSCO' =&gt; array(
'KeyRepository' =&gt; '/var/mqm/qmgrs/QUEUEMGR/ssl/key', //Ruta local donde se puede encontrar la carpeta que contiene la clave SSL
'MQAIR' =&gt; array(
'Version' =&gt; 2, //MQAIR_VERSION_2
'AuthInfoType' =&gt; 2, //MQAIT_OCSP
'OCSPResponderURL' =&gt; 'http://dummy.OCSP.responder'
)
)
);

    mqseries_connx('QUEUEMGR', $mqcno, $conn, $comp_code,$reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
        printf("Connx CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
        exit;
    }

?&gt;

### Ver también

    - [mqseries_disc()](#function.mqseries-disc) - MQSeries MQDISC

# mqseries_disc

(PECL mqseries &gt;= 0.10.0)

mqseries_disc — MQSeries MQDISC

### Descripción

**mqseries_disc**([resource](#language.types.resource) $hconn, [resource](#language.types.resource) &amp;$compCode, [resource](#language.types.resource) &amp;$reason): [void](language.types.void.html)

**mqseries_disc()** cierra la conexión entre el gestor de colas y la aplicación. Es lo opuesto a [mqseries_conn()](#function.mqseries-conn) y [mqseries_connx()](#function.mqseries-connx).

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_disc()**

&lt;?php
mqseries_disc($conn, $comp_code, $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
printf("disc CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
}
?&gt;

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

# mqseries_get

(PECL mqseries &gt;= 0.10.0)

mqseries_get — MQSeries MQGET

### Descripción

**mqseries_get**(
    [resource](#language.types.resource) $hConn,
    [resource](#language.types.resource) $hObj,
    [array](#language.types.array) &amp;$md,
    [array](#language.types.array) &amp;$gmo,
    [int](#language.types.integer) &amp;$bufferLength,
    [string](#language.types.string) &amp;$msg,
    [int](#language.types.integer) &amp;$data_length,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_get()** lee un mensaje de una cola local,
que ha sido abierta con la función [mqseries_open()](#function.mqseries-open).

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      hObj


      Gestor de objeto.


      Este recurso representa el objeto a utilizar.






      md


      Recurso de mensaje (MQMD).






      gmo


      Opciones de mensaje






      bufferLength


      Tamaño esperado del buffer de resultado






      msg



       Buffer que contiene el mensaje leído desde el objeto.







      data_length


      Tamaño real del buffer






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_get()**

&lt;?php
// Abre la conexión hacia el gestor de colas
mqseries_conn('WMQ1', $conn, $comp_code, $reason);
// $conn contiene ahora la referencia a la conexión al gestor de colas.

// Abre la conexión hacia la cola de prueba testq
mqseries_open(
$conn,
array('ObjectName' =&gt; 'TESTQ'),
MQSERIES_MQOO_INPUT_AS_Q_DEF | MQSERIES_MQOO_FAIL_IF_QUIESCING | MQSERIES_MQOO_OUTPUT,
$obj,
$comp_code,
$reason);
// $obj contiene ahora la referencia al objeto (TESTQ)

// Define un descriptor de mensaje vacío.
$mdg = array();
// Define las opciones de recuperación de mensajes
$gmo = array('Options' =&gt; MQSERIES_MQGMO_FAIL_IF_QUIESCING | MQSERIES_MQGMO_WAIT, 'WaitInterval' =&gt; 3000);

// Recupera los mensajes desde la cola
mqseries_get($conn, $obj, $mdg, $gmo, 255, $msg, $data_length, $comp_code, $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
printf("GET CompCode:%d Reason:%d Text:%s&lt;br&gt;", $comp_code, $reason, mqseries_strerror($reason));
}

// Cierra la referencia al objeto $obj
    mqseries_close($conn, $obj, MQSERIES_MQCO_NONE, $comp_code, $reason);

// Desconecta del gestor de colas
mqseries_disc($conn, $comp_code, $reason);

?&gt;

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

    - [mqseries_open()](#function.mqseries-open) - MQSeries MQOPEN

    - [mqseries_put()](#function.mqseries-put) - MQSeries MQPUT

# mqseries_inq

(PECL mqseries &gt;= 0.10.0)

mqseries_inq — MQSeries MQINQ

### Descripción

**mqseries_inq**(
    [resource](#language.types.resource) $hconn,
    [resource](#language.types.resource) $hobj,
    [int](#language.types.integer) $selectorCount,
    [array](#language.types.array) $selectors,
    [int](#language.types.integer) $intAttrCount,
    [resource](#language.types.resource) &amp;$intAttr,
    [int](#language.types.integer) $charAttrLength,
    [resource](#language.types.resource) &amp;$charAttr,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_inq()** devuelve un array de enteros y un
conjunto de strings que representan un objeto.

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      hObj


      Gestor de objeto.


      Este recurso representa el objeto a utilizar.






      selectorCount


      Número de selectores.






      selectors


      Array de atributos de selectores.






      intAttrLength


      Número de atributos enteros.






      intAttr


      Array de atributos enteros.






      charAttrLength


      Tamaño del buffer de atributos de carácter.






      charAttr


      Atributo de carácter.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_inq()**

&lt;?php
$int_attr = array();
$char_attr = "";

    mqseries_inq($conn, $obj, 1, array(MQSERIES_MQCA_Q_MGR_NAME), 0, $int_attr, 48, $char_attr, $comp_code, $reason);

    if ($comp_code !== MQSERIES_MQCC_OK) {
        printf("INQ CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
    } else {
        echo "INQ QManager name result ".$char_attr."&lt;br&gt;\n";
    }

?&gt;

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

    - [mqseries_open()](#function.mqseries-open) - MQSeries MQOPEN

# mqseries_open

(PECL mqseries &gt;= 0.10.0)

mqseries_open — MQSeries MQOPEN

### Descripción

**mqseries_open**(
    [resource](#language.types.resource) $hconn,
    [array](#language.types.array) &amp;$objDesc,
    [int](#language.types.integer) $option,
    [resource](#language.types.resource) &amp;$hobj,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_open()** establece el acceso a un objeto.

### Parámetros

      hConn


      Gestor de conexión.


      Este recurso representa la conexión al gestor de colas.






      objDesc


      Recurso de objeto.






      options


      Opciones que controlan las acciones de la función.






      hObj


      Gestor de objeto.


      Este recurso representa el objeto a utilizar.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_open()**

&lt;?php
$mqods = array('ObjectName' =&gt; 'TESTQ');
    mqseries_open(
                $conn,
                $mqods,
                MQSERIES_MQOO_INPUT_AS_Q_DEF | MQSERIES_MQOO_FAIL_IF_QUIESCING | MQSERIES_MQOO_OUTPUT,
                $obj,
                $comp_code,
                $reason);
    if ($comp_code !== MQSERIES_MQCC_OK) {
printf("open CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
exit;
}
?&gt;

### Ver también

    - [mqseries_close()](#function.mqseries-close) - MQSeries MQCLOSE

# mqseries_put

(PECL mqseries &gt;= 0.10.0)

mqseries_put — MQSeries MQPUT

### Descripción

**mqseries_put**(
    [resource](#language.types.resource) $hConn,
    [resource](#language.types.resource) $hObj,
    [array](#language.types.array) &amp;$md,
    [array](#language.types.array) &amp;$pmo,
    [string](#language.types.string) $message,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

**mqseries_put()** añade un mensaje a una cola o a una lista de distribución. La cola o la lista de distribución deben estar abiertas.

### Parámetros

      hConn


      Gestor de conexión.


      Esta referencia representa la conexión al gestor de colas.






      hObj


      Gestor de objeto.


      Esta referencia representa el objeto a utilizar.






      md


      Recurso de mensaje (MQMD).






      pmo


      Opción de adición de mensaje.






      message


      El mensaje a colocar en la cola.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_put()**

&lt;?php
// Abre una conexión hacia el gestor de colas
mqseries_conn('WMQ1', $conn, $comp_code, $reason);
// $conn contiene ahora la referencia a la conexión al gestor de colas.

// Abre la conexión hacia la cola testq
mqseries_open(
$conn,
array('ObjectName' =&gt; 'TESTQ'),
MQSERIES_MQOO_INPUT_AS_Q_DEF | MQSERIES_MQOO_FAIL_IF_QUIESCING | MQSERIES_MQOO_OUTPUT,
$obj,
$comp_code,
$reason);
// $obj contiene ahora la referencia al objeto (TESTQ)

// Define el array de descripción del mensaje. Verifica manualmente las referencias a MQSeries.
$md = array(
'Version' =&gt; MQSERIES_MQMD_VERSION_1,
'Expiry' =&gt; MQSERIES_MQEI_UNLIMITED,
'Report' =&gt; MQSERIES_MQRO_NONE,
'MsgType' =&gt; MQSERIES_MQMT_DATAGRAM,
'Format' =&gt; MQSERIES_MQFMT_STRING,
'Priority' =&gt; 1,
'Persistence' =&gt; MQSERIES_MQPER_PERSISTENT);

// Define las opciones de transmisión de mensajes.
$pmo = array('Options' =&gt; MQSERIES_MQPMO_NEW_MSG_ID|MQSERIES_MQPMO_SYNCPOINT);

// Coloca el mensaje 'Ping' en la cola.
mqseries_put($conn, $obj, $md, $pmo, 'Ping', $comp_code, $reason);

    if ($comp_code !== MQSERIES_MQCC_OK) {
        printf("put CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
    }

// Cierra la referencia al objeto $obj
    mqseries_close($conn, $obj, MQSERIES_MQCO_NONE, $comp_code, $reason);

// Desconecta el gestor de colas.
mqseries_disc($conn, $comp_code, $reason);

?&gt;

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

    - [mqseries_open()](#function.mqseries-open) - MQSeries MQOPEN

    - [mqseries_get()](#function.mqseries-get) - MQSeries MQGET

# mqseries_put1

(PECL mqseries &gt;= 0.10.0)

mqseries_put1 — MQSeries MQPUT1

### Descripción

**mqseries_put1**(
    [resource](#language.types.resource) $hconn,
    [resource](#language.types.resource) &amp;$objDesc,
    [resource](#language.types.resource) &amp;$msgDesc,
    [resource](#language.types.resource) &amp;$pmo,
    [string](#language.types.string) $buffer,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

La llamada a **mqseries_put1()**
(MQPUT1) añade un mensaje a una cola. La cola no necesita estar abierta.

Se pueden utilizar tanto llamadas a [mqseries_put()](#function.mqseries-put)
como a **mqseries_put1()** para añadir mensajes
a una cola; qué llamada utilizar depende de las circunstancias.
Utilizar la llamada a [mqseries_put()](#function.mqseries-put) (MQPUT) para añadir varios
mensajes a la misma cola.
Utilizar la llamada a **mqseries_put1()** (MQPUT1) para añadir un
solo mensaje a una cola.
Esta llamada engloba las llamadas a MQOPEN, MQPUT y MQCLOSE en una sola llamada,
minimizando el número de llamadas a emitir.

### Parámetros

      hConn


      Gestor de conexión.


      Este gestor representa la conexión al gestor de colas.






      objDesc


      Descripteur del objeto (MQOD).



       Esta estructura identifica la cola en la que se añadirá el mensaje.







      msgDesc


      Descripteur del mensaje (MQMD).






      pmo


      Opciones de adición del mensaje (MQPMO).







      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [mqseries_conn()](#function.mqseries-conn) - MQSeries MQCONN

    - [mqseries_connx()](#function.mqseries-connx) - MQSeries MQCONNX

    - [mqseries_open()](#function.mqseries-open) - MQSeries MQOPEN

    - [mqseries_get()](#function.mqseries-get) - MQSeries MQGET

# mqseries_set

(PECL mqseries &gt;= 0.10.0)

mqseries_set — MQSeries MQSET

### Descripción

**mqseries_set**(
    [resource](#language.types.resource) $hConn,
    [resource](#language.types.resource) $hObj,
    [int](#language.types.integer) $selectorCount,
    [array](#language.types.array) $selectors,
    [int](#language.types.integer) $intAttrCount,
    [array](#language.types.array) $intAttrs,
    [int](#language.types.integer) $charAttrLength,
    [array](#language.types.array) $charAttrs,
    [resource](#language.types.resource) &amp;$compCode,
    [resource](#language.types.resource) &amp;$reason
): [void](language.types.void.html)

La llamada a **mqseries_set()**
(MQSET) se utiliza para modificar los atributos de un objeto representado
por un manejador. El objeto debe ser una cola.

### Parámetros

      hConn


      Manejador de conexión.


      Este manejador representa la conexión al gestor de colas.






      hObj


      Manejador de objeto.


      Este manejador representa el objeto a utilizar.






      selectorCount


      Conteo de selectores.






      selectors


      Array de atributos de los selectores.






      intAttrCount


      Conteo de atributos enteros.






      intAttrs


      Array de atributos enteros.






      charAttrLength


      Longitud del búfer de atributos de caracteres.






      charAttrs


      Atributos de caracteres.






      compCode


      Código de finalización.






      reason


      La razón que califica el compCode.




### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [mqseries_inq()](#function.mqseries-inq) - MQSeries MQINQ

# mqseries_strerror

(PECL mqseries &gt;= 0.10.0)

mqseries_strerror — Devuelve el mensaje de error correspondiente al código de resultado

### Descripción

**mqseries_strerror**([int](#language.types.integer) $reason): [string](#language.types.string)

**mqseries_strerror()**
devuelve el mensaje de error correspondiente al código de resultado.

### Parámetros

      reason


      La razón que califica el compCode.




### Valores devueltos

La cadena de representación de la razón del mensaje de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con mqseries_strerror()**

&lt;?php
if ($comp_code !== MQSERIES_MQCC_OK) {
        printf("open CompCode:%d Reason:%d Text:%s&lt;br&gt;\n", $comp_code, $reason, mqseries_strerror($reason));
exit;
}
?&gt;

    El ejemplo anterior mostrará:

Connx CompCode:2 Reason:2059 Text:Queue manager not available for connection.

## Tabla de contenidos

- [mqseries_back](#function.mqseries-back) — MQSeries MQBACK
- [mqseries_begin](#function.mqseries-begin) — MQseries MQBEGIN
- [mqseries_close](#function.mqseries-close) — MQSeries MQCLOSE
- [mqseries_cmit](#function.mqseries-cmit) — MQSeries MQCMIT
- [mqseries_conn](#function.mqseries-conn) — MQSeries MQCONN
- [mqseries_connx](#function.mqseries-connx) — MQSeries MQCONNX
- [mqseries_disc](#function.mqseries-disc) — MQSeries MQDISC
- [mqseries_get](#function.mqseries-get) — MQSeries MQGET
- [mqseries_inq](#function.mqseries-inq) — MQSeries MQINQ
- [mqseries_open](#function.mqseries-open) — MQSeries MQOPEN
- [mqseries_put](#function.mqseries-put) — MQSeries MQPUT
- [mqseries_put1](#function.mqseries-put1) — MQSeries MQPUT1
- [mqseries_set](#function.mqseries-set) — MQSeries MQSET
- [mqseries_strerror](#function.mqseries-strerror) — Devuelve el mensaje de error correspondiente al código de resultado

- [Introducción](#intro.mqseries)
- [Instalación/Configuración](#mqseries.setup)<li>[Requerimientos](#mqseries.requirements)
- [Instalación](#mqseries.configure)
- [Configuración en tiempo de ejecución](#mqseries.ini)
- [Tipos de recursos](#mqseries.resources)
  </li>- [Constantes predefinidas](#mqseries.constants)
- [Funciones de mqseries](#ref.mqseries)<li>[mqseries_back](#function.mqseries-back) — MQSeries MQBACK
- [mqseries_begin](#function.mqseries-begin) — MQseries MQBEGIN
- [mqseries_close](#function.mqseries-close) — MQSeries MQCLOSE
- [mqseries_cmit](#function.mqseries-cmit) — MQSeries MQCMIT
- [mqseries_conn](#function.mqseries-conn) — MQSeries MQCONN
- [mqseries_connx](#function.mqseries-connx) — MQSeries MQCONNX
- [mqseries_disc](#function.mqseries-disc) — MQSeries MQDISC
- [mqseries_get](#function.mqseries-get) — MQSeries MQGET
- [mqseries_inq](#function.mqseries-inq) — MQSeries MQINQ
- [mqseries_open](#function.mqseries-open) — MQSeries MQOPEN
- [mqseries_put](#function.mqseries-put) — MQSeries MQPUT
- [mqseries_put1](#function.mqseries-put1) — MQSeries MQPUT1
- [mqseries_set](#function.mqseries-set) — MQSeries MQSET
- [mqseries_strerror](#function.mqseries-strerror) — Devuelve el mensaje de error correspondiente al código de resultado
  </li>
