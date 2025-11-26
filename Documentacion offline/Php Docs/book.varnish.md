# Varnish

# Introducción

Varnish Cache es un acelerador de aplicaciones web de última generación de
código abierto. La extensión permite interactuar con una instancia de varnish
en ejecución a través de un socket TCP o de memoria compartida.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#varnish.requirements)
- [Instalación](#varnish.installation)

    ## Requerimientos

    Para utilizar esta extensión, debe estar instalada una versión de Varnish Cache igual o superior a 3.0,
    disponible en la [» página de inicio de Varnish Cache](https://www.varnish-cache.org/).

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/varnish](https://pecl.php.net/package/varnish).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[VARNISH_STATUS_SYNTAX](#constant.varnish-status-syntax)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_UNKNOWN](#constant.varnish-status-unknown)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_UNIMPL](#constant.varnish-status-unimpl)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_TOOFEW](#constant.varnish-status-toofew)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_TOOMANY](#constant.varnish-status-toomany)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_PARAM](#constant.varnish-status-param)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_AUTH](#constant.varnish-status-auth)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_OK](#constant.varnish-status-ok)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_CANT](#constant.varnish-status-cant)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_COMMS](#constant.varnish-status-comms)**
     ([int](#language.types.integer))








     **[VARNISH_STATUS_CLOSE](#constant.varnish-status-close)**
     ([int](#language.types.integer))








     **[VARNISH_CONFIG_IDENT](#constant.varnish-config-ident)**
     ([string](#language.types.string))








     **[VARNISH_CONFIG_HOST](#constant.varnish-config-host)**
     ([string](#language.types.string))








     **[VARNISH_CONFIG_PORT](#constant.varnish-config-port)**
     ([string](#language.types.string))








     **[VARNISH_CONFIG_TIMEOUT](#constant.varnish-config-timeout)**
     ([string](#language.types.string))








     **[VARNISH_CONFIG_SECRET](#constant.varnish-config-secret)**
     ([string](#language.types.string))








     **[VARNISH_CONFIG_COMPAT](#constant.varnish-config-compat)**
     ([string](#language.types.string))








     **[VARNISH_COMPAT_2](#constant.varnish-compat-2)**
     ([int](#language.types.integer))








     **[VARNISH_COMPAT_3](#constant.varnish-compat-3)**
     ([int](#language.types.integer))





# Ejemplos

## Tabla de contenidos

- [Uso Básico de VarnishAdmin](#varnish.example.admin)
- [Uso básico de VarnishStat](#varnish.example.stat)
- [Uso básico de VarnishLog](#varnish.example.log)

    ## Uso Básico de VarnishAdmin

    El ejemplo muestra un uso sencillo de la funcionalidad de prohibición

    **Ejemplo #1 Prohibición de una URL**

&lt;?php

$args = array(
VARNISH_CONFIG_HOST =&gt; "::1",
VARNISH_CONFIG_PORT =&gt; 6082,
VARNISH_CONFIG_SECRET =&gt; "5174826b-8595-4958-aa7a-0609632ad7ca",
VARNISH_CONFIG_TIMEOUT =&gt; 300,
);

$va = new VarnishAdmin($args);

try {
if(!$va-&gt;connect()) {
throw new VarnishException("Conexión fallida\n");
}
} catch (VarnishException $e) {
echo $e-&gt;getMessage();
exit(3);
}

try {
if(!$va-&gt;auth()) {
throw new VarnishException("Autorización fallida\n");
}
} catch (VarnishException $e) {
echo $e-&gt;getMessage();
exit(3);
}

try {
$estado = $va-&gt;ban('req.url ~ "^/$"');
if (VARNISH_STATUS_OK != $estado) {
throw new VarnishException("El método ban devolvió el estado $estado\n");
}
} catch (VarnishException $e) {
echo $e-&gt;getMessage();
exit(3);
}

exit(0);

?&gt;

## Uso básico de VarnishStat

El ejemplo muestra la obtención de una instantánea de las estadísticas de varnish de
memoria compartida

**Ejemplo #1 Obtención de una instantánea de las estadísticas**

&lt;?php

$vs = new VarnishStat;

try {
$data = $vs-&gt;getSnapshot();
} catch (VarnishException $e) {
echo $e-&gt;getMessage();
exit(3);
}

exit(0);
?&gt;

## Uso básico de VarnishLog

El ejemplo muestra la lectura de líneas del registro de varnish de memoria compartida

**Ejemplo #1 Lectura del log de varnish en la memoria compartida**

&lt;?php

$vl = new VarnishLog;
while(1) {
    $line = $vl-&gt;getLine();
    printf("%s %d %s", VarnishLog::getTagName($line['tag']), $line['id'],
$line['data']);
}

exit(0);
?&gt;

# La clase VarnishAdmin

(PECL varnish &gt;= 0.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **VarnishAdmin**

     {


    /* Métodos */

public [auth](#varnishadmin.auth)(): [bool](#language.types.boolean)
public [ban](#varnishadmin.ban)([string](#language.types.string) $vcl_regex): [int](#language.types.integer)
public [banUrl](#varnishadmin.banurl)([string](#language.types.string) $vcl_regex): [int](#language.types.integer)
public [clearPanic](#varnishadmin.clearpanic)(): [int](#language.types.integer)
public [connect](#varnishadmin.connect)(): [bool](#language.types.boolean)
public [\_\_construct](#varnishadmin.construct)([array](#language.types.array) $args = ?)
public [disconnect](#varnishadmin.disconnect)(): [bool](#language.types.boolean)
public [getPanic](#varnishadmin.getpanic)(): [string](#language.types.string)
public [getParams](#varnishadmin.getparams)(): [array](#language.types.array)
public [isRunning](#varnishadmin.isrunning)(): [bool](#language.types.boolean)
public [setCompat](#varnishadmin.setcompat)([int](#language.types.integer) $compat): [void](language.types.void.html)
public [setHost](#varnishadmin.sethost)([string](#language.types.string) $host): [void](language.types.void.html)
public [setIdent](#varnishadmin.setident)([string](#language.types.string) $ident): [void](language.types.void.html)
public [setParam](#varnishadmin.setparam)([string](#language.types.string) $name, [string](#language.types.string)|[int](#language.types.integer) $value): [int](#language.types.integer)
public [setPort](#varnishadmin.setport)([int](#language.types.integer) $port): [void](language.types.void.html)
public [setSecret](#varnishadmin.setsecret)([string](#language.types.string) $secret): [void](language.types.void.html)
public [setTimeout](#varnishadmin.settimeout)([int](#language.types.integer) $timeout): [void](language.types.void.html)
public [start](#varnishadmin.start)(): [int](#language.types.integer)
public [stop](#varnishadmin.stop)(): [int](#language.types.integer)

}

# VarnishAdmin::auth

(PECL varnish &gt;= 0.3)

VarnishAdmin::auth — Autentificar en una instancia de varnish

### Descripción

public **VarnishAdmin::auth**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# VarnishAdmin::ban

(PECL varnish &gt;= 0.3)

VarnishAdmin::ban — Prohibe URLs usando una expresión VCL

### Descripción

public **VarnishAdmin::ban**([string](#language.types.string) $vcl_regex): [int](#language.types.integer)

### Parámetros

     vcl_regex


         expresión VCL de Varnish. Se basa en el comando de prohibición de varnish.





### Valores devueltos

Devuelve el estado de comando de varnish.

# VarnishAdmin::banUrl

(PECL varnish &gt;= 0.3)

VarnishAdmin::banUrl — Prohibe una URL usando una expresión VCL

### Descripción

public **VarnishAdmin::banUrl**([string](#language.types.string) $vcl_regex): [int](#language.types.integer)

### Parámetros

     vcl_regex


         Expresión regular de URL en sintaxis compatible con PCRE. Está basado en el
         comando de varnish ban.url.





### Valores devueltos

Devuelve el estado de comando varnish.

# VarnishAdmin::clearPanic

(PECL varnish &gt;= 0.4)

VarnishAdmin::clearPanic — Limpia mensajes de pánico de la instancia varnish

### Descripción

public **VarnishAdmin::clearPanic**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el estado de comando varnish.

# VarnishAdmin::connect

(PECL varnish &gt;= 0.3)

VarnishAdmin::connect — Conectarse a una interfaz de administración de instancias de varnish

### Descripción

public **VarnishAdmin::connect**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# VarnishAdmin::\_\_construct

(PECL varnish &gt;= 0.3)

VarnishAdmin::\_\_construct — VarnishAdmin constructor

### Descripción

public **VarnishAdmin::\_\_construct**([array](#language.types.array) $args = ?)

### Parámetros

    args


       Argumentos de configuración. Las posibles claves son:

VARNISH_CONFIG_IDENT - local varnish instance ident
VARNISH_CONFIG_HOST - varnish instance ip
VARNISH_CONFIG_PORT - varnish instance port
VARNISH_CONFIG_SECRET - varnish instance secret
VARNISH_CONFIG_TIMEOUT - connection read timeout
VARNISH_CONFIG_COMPAT - varnish major version compatibility

### Valores devueltos

### Ejemplos

**Ejemplo #1 ejemplo de VarnishAdmin::\_\_construct()**

&lt;?php
$args = array(
        VARNISH_CONFIG_HOST =&gt; "::1",
        VARNISH_CONFIG_PORT =&gt; 6082,
        VARNISH_CONFIG_SECRET =&gt; "5174826b-8595-4958-aa7a-0609632ad7ca",
        VARNISH_CONFIG_TIMEOUT =&gt; 300,
    );
    $va = new VarnishAdmin($args);
?&gt;

# VarnishAdmin::disconnect

(PECL varnish &gt;= 1.0.0)

VarnishAdmin::disconnect — Desconecta interfaz de administración de la instancia de varnish

### Descripción

public **VarnishAdmin::disconnect**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# VarnishAdmin::getPanic

(PECL varnish &gt;= 0.4)

VarnishAdmin::getPanic — Obtener el último mensaje de pánico en una instancia varnish

### Descripción

public **VarnishAdmin::getPanic**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el último mensaje de pánico en la instancia varnish actual.

# VarnishAdmin::getParams

(PECL varnish &gt;= 0.4)

VarnishAdmin::getParams — Busca los parámetros de configuración de la instancia varnish actual

### Descripción

public **VarnishAdmin::getParams**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con los parámetros de configuración varnish.

# VarnishAdmin::isRunning

(PECL varnish &gt;= 0.3)

VarnishAdmin::isRunning — Comprueba si el proceso varnish esclavo está actualmente en marcha

### Descripción

public **VarnishAdmin::isRunning**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# VarnishAdmin::setCompat

(PECL varnish &gt;= 0.9.2)

VarnishAdmin::setCompat — Establece el parámetro de configuración de la clase compacta

### Descripción

public **VarnishAdmin::setCompat**([int](#language.types.integer) $compat): [void](language.types.void.html)

### Parámetros

     compat


         Opción de compatibilidad de varnish.





### Valores devueltos

# VarnishAdmin::setHost

(PECL varnish &gt;= 0.8)

VarnishAdmin::setHost — Establece el parámetro de configuración del host de la clase

### Descripción

public **VarnishAdmin::setHost**([string](#language.types.string) $host): [void](language.types.void.html)

### Parámetros

     host


         Parámetro de configuración del host de la conexión.





### Valores devueltos

# VarnishAdmin::setIdent

(PECL varnish &gt;= 0.8)

VarnishAdmin::setIdent — Establece el parámetro de configuración de la identificación de la clase

### Descripción

public **VarnishAdmin::setIdent**([string](#language.types.string) $ident): [void](language.types.void.html)

### Parámetros

     ident


         Parámetro de configuración de la identificación de la conexión.





### Valores devueltos

# VarnishAdmin::setParam

(PECL varnish &gt;= 0.4)

VarnishAdmin::setParam — Establece los parámetros de configuración en la instancia varnish actual

### Descripción

public **VarnishAdmin::setParam**([string](#language.types.string) $name, [string](#language.types.string)|[int](#language.types.integer) $value): [int](#language.types.integer)

### Parámetros

     name


         Nombre del parámetro de configuración varnish.






     value


         Valor del parámetro de configuración varnish.





### Valores devueltos

Devuelve el estado de comando varnish.

# VarnishAdmin::setPort

(PECL varnish &gt;= 0.8)

VarnishAdmin::setPort — Establece el parámetro de configuración del puerto de clase

### Descripción

public **VarnishAdmin::setPort**([int](#language.types.integer) $port): [void](language.types.void.html)

### Parámetros

     port


         Parámetro de configuración del puerto de conexión.





### Valores devueltos

# VarnishAdmin::setSecret

(PECL varnish &gt;= 0.8)

VarnishAdmin::setSecret — Establece los parámetros secretos de configuración de la clase

### Descripción

public **VarnishAdmin::setSecret**([string](#language.types.string) $secret): [void](language.types.void.html)

### Parámetros

     secret


         Parámetro secreto de configuración de la conexión.





### Valores devueltos

# VarnishAdmin::setTimeout

(PECL varnish &gt;= 0.8)

VarnishAdmin::setTimeout — Configura el parámetro de tiempo de espera de la clase

### Descripción

public **VarnishAdmin::setTimeout**([int](#language.types.integer) $timeout): [void](language.types.void.html)

### Parámetros

     timeout


         Parámetro de configuración del tiempo de espera de la conexión.





### Valores devueltos

# VarnishAdmin::start

(PECL varnish &gt;= 0.3)

VarnishAdmin::start — Iniciar el proceso de varnish

### Descripción

public **VarnishAdmin::start**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el estado de comando varnish.

# VarnishAdmin::stop

(PECL varnish &gt;= 0.3)

VarnishAdmin::stop — Detener el proceso de varnish

### Descripción

public **VarnishAdmin::stop**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el estado de comando de varnish.

## Tabla de contenidos

- [VarnishAdmin::auth](#varnishadmin.auth) — Autentificar en una instancia de varnish
- [VarnishAdmin::ban](#varnishadmin.ban) — Prohibe URLs usando una expresión VCL
- [VarnishAdmin::banUrl](#varnishadmin.banurl) — Prohibe una URL usando una expresión VCL
- [VarnishAdmin::clearPanic](#varnishadmin.clearpanic) — Limpia mensajes de pánico de la instancia varnish
- [VarnishAdmin::connect](#varnishadmin.connect) — Conectarse a una interfaz de administración de instancias de varnish
- [VarnishAdmin::\_\_construct](#varnishadmin.construct) — VarnishAdmin constructor
- [VarnishAdmin::disconnect](#varnishadmin.disconnect) — Desconecta interfaz de administración de la instancia de varnish
- [VarnishAdmin::getPanic](#varnishadmin.getpanic) — Obtener el último mensaje de pánico en una instancia varnish
- [VarnishAdmin::getParams](#varnishadmin.getparams) — Busca los parámetros de configuración de la instancia varnish actual
- [VarnishAdmin::isRunning](#varnishadmin.isrunning) — Comprueba si el proceso varnish esclavo está actualmente en marcha
- [VarnishAdmin::setCompat](#varnishadmin.setcompat) — Establece el parámetro de configuración de la clase compacta
- [VarnishAdmin::setHost](#varnishadmin.sethost) — Establece el parámetro de configuración del host de la clase
- [VarnishAdmin::setIdent](#varnishadmin.setident) — Establece el parámetro de configuración de la identificación de la clase
- [VarnishAdmin::setParam](#varnishadmin.setparam) — Establece los parámetros de configuración en la instancia varnish actual
- [VarnishAdmin::setPort](#varnishadmin.setport) — Establece el parámetro de configuración del puerto de clase
- [VarnishAdmin::setSecret](#varnishadmin.setsecret) — Establece los parámetros secretos de configuración de la clase
- [VarnishAdmin::setTimeout](#varnishadmin.settimeout) — Configura el parámetro de tiempo de espera de la clase
- [VarnishAdmin::start](#varnishadmin.start) — Iniciar el proceso de varnish
- [VarnishAdmin::stop](#varnishadmin.stop) — Detener el proceso de varnish

# La clase VarnishStat

(PECL varnish &gt;= 0.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **VarnishStat**

     {


    /* Métodos */

public [\_\_construct](#varnishstat.construct)([array](#language.types.array) $args = ?)
public [getSnapshot](#varnishstat.getsnapshot)(): [array](#language.types.array)

}

# VarnishStat::\_\_construct

(PECL varnish &gt;= 0.3)

VarnishStat::\_\_construct — Constructor VarnishStat

### Descripción

public **VarnishStat::\_\_construct**([array](#language.types.array) $args = ?)

### Parámetros

    args


       Argumentos de configuración. Las claves posibles son:

VARNISH_CONFIG_IDENT - local varnish instance ident path

### Valores devueltos

# VarnishStat::getSnapshot

(PECL varnish &gt;= 0.3)

VarnishStat::getSnapshot — Obtener la instantánea actual de las estadísticas de instancia varnish

### Descripción

public **VarnishStat::getSnapshot**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Array con la instantánea de las estadísticas varnish. Las claves del array
son idénticas a los la herramienta varnishstat.

## Tabla de contenidos

- [VarnishStat::\_\_construct](#varnishstat.construct) — Constructor VarnishStat
- [VarnishStat::getSnapshot](#varnishstat.getsnapshot) — Obtener la instantánea actual de las estadísticas de instancia varnish

# La clase VarnishLog

(PECL varnish &gt;= 0.6)

## Introducción

## Sinopsis de la Clase

    ****




      class **VarnishLog**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [TAG_Debug](#varnishlog.constants.tag-debug) = 0;

    const
     [int](#language.types.integer)
      [TAG_Error](#varnishlog.constants.tag-error) = 1;

    const
     [int](#language.types.integer)
      [TAG_CLI](#varnishlog.constants.tag-cli) = 2;

    const
     [int](#language.types.integer)
      [TAG_StatSess](#varnishlog.constants.tag-statsess) = 3;

    const
     [int](#language.types.integer)
      [TAG_ReqEnd](#varnishlog.constants.tag-reqend) = 4;

    const
     [int](#language.types.integer)
      [TAG_SessionOpen](#varnishlog.constants.tag-sessionopen) = 5;

    const
     [int](#language.types.integer)
      [TAG_SessionClose](#varnishlog.constants.tag-sessionclose) = 6;

    const
     [int](#language.types.integer)
      [TAG_BackendOpen](#varnishlog.constants.tag-backendopen) = 7;

    const
     [int](#language.types.integer)
      [TAG_BackendXID](#varnishlog.constants.tag-backendxid) = 8;

    const
     [int](#language.types.integer)
      [TAG_BackendReuse](#varnishlog.constants.tag-backendreuse) = 9;

    const
     [int](#language.types.integer)
      [TAG_BackendClose](#varnishlog.constants.tag-backendclose) = 10;

    const
     [int](#language.types.integer)
      [TAG_HttpGarbage](#varnishlog.constants.tag-httpgarbage) = 11;

    const
     [int](#language.types.integer)
      [TAG_Backend](#varnishlog.constants.tag-backend) = 12;

    const
     [int](#language.types.integer)
      [TAG_Length](#varnishlog.constants.tag-length) = 13;

    const
     [int](#language.types.integer)
      [TAG_FetchError](#varnishlog.constants.tag-fetcherror) = 14;

    const
     [int](#language.types.integer)
      [TAG_RxRequest](#varnishlog.constants.tag-rxrequest) = 15;

    const
     [int](#language.types.integer)
      [TAG_RxResponse](#varnishlog.constants.tag-rxresponse) = 16;

    const
     [int](#language.types.integer)
      [TAG_RxStatus](#varnishlog.constants.tag-rxstatus) = 17;

    const
     [int](#language.types.integer)
      [TAG_RxURL](#varnishlog.constants.tag-rxurl) = 18;

    const
     [int](#language.types.integer)
      [TAG_RxProtocol](#varnishlog.constants.tag-rxprotocol) = 19;

    const
     [int](#language.types.integer)
      [TAG_RxHeader](#varnishlog.constants.tag-rxheader) = 20;

    const
     [int](#language.types.integer)
      [TAG_TxRequest](#varnishlog.constants.tag-txrequest) = 21;

    const
     [int](#language.types.integer)
      [TAG_TxResponse](#varnishlog.constants.tag-txresponse) = 22;

    const
     [int](#language.types.integer)
      [TAG_TxStatus](#varnishlog.constants.tag-txstatus) = 23;

    const
     [int](#language.types.integer)
      [TAG_TxURL](#varnishlog.constants.tag-txurl) = 24;

    const
     [int](#language.types.integer)
      [TAG_TxProtocol](#varnishlog.constants.tag-txprotocol) = 25;

    const
     [int](#language.types.integer)
      [TAG_TxHeader](#varnishlog.constants.tag-txheader) = 26;

    const
     [int](#language.types.integer)
      [TAG_ObjRequest](#varnishlog.constants.tag-objrequest) = 27;

    const
     [int](#language.types.integer)
      [TAG_ObjResponse](#varnishlog.constants.tag-objresponse) = 28;

    const
     [int](#language.types.integer)
      [TAG_ObjStatus](#varnishlog.constants.tag-objstatus) = 29;

    const
     [int](#language.types.integer)
      [TAG_ObjURL](#varnishlog.constants.tag-objurl) = 30;

    const
     [int](#language.types.integer)
      [TAG_ObjProtocol](#varnishlog.constants.tag-objprotocol) = 31;

    const
     [int](#language.types.integer)
      [TAG_ObjHeader](#varnishlog.constants.tag-objheader) = 32;

    const
     [int](#language.types.integer)
      [TAG_LostHeader](#varnishlog.constants.tag-lostheader) = 33;

    const
     [int](#language.types.integer)
      [TAG_TTL](#varnishlog.constants.tag-ttl) = 34;

    const
     [int](#language.types.integer)
      [TAG_Fetch_Body](#varnishlog.constants.tag-fetch-body) = 35;

    const
     [int](#language.types.integer)
      [TAG_VCL_acl](#varnishlog.constants.tag-vcl-acl) = 36;

    const
     [int](#language.types.integer)
      [TAG_VCL_call](#varnishlog.constants.tag-vcl-call) = 37;

    const
     [int](#language.types.integer)
      [TAG_VCL_trace](#varnishlog.constants.tag-vcl-trace) = 38;

    const
     [int](#language.types.integer)
      [TAG_VCL_return](#varnishlog.constants.tag-vcl-return) = 39;

    const
     [int](#language.types.integer)
      [TAG_VCL_error](#varnishlog.constants.tag-vcl-error) = 40;

    const
     [int](#language.types.integer)
      [TAG_ReqStart](#varnishlog.constants.tag-reqstart) = 41;

    const
     [int](#language.types.integer)
      [TAG_Hit](#varnishlog.constants.tag-hit) = 42;

    const
     [int](#language.types.integer)
      [TAG_HitPass](#varnishlog.constants.tag-hitpass) = 43;

    const
     [int](#language.types.integer)
      [TAG_ExpBan](#varnishlog.constants.tag-expban) = 44;

    const
     [int](#language.types.integer)
      [TAG_ExpKill](#varnishlog.constants.tag-expkill) = 45;

    const
     [int](#language.types.integer)
      [TAG_WorkThread](#varnishlog.constants.tag-workthread) = 46;

    const
     [int](#language.types.integer)
      [TAG_ESI_xmlerror](#varnishlog.constants.tag-esi-xmlerror) = 47;

    const
     [int](#language.types.integer)
      [TAG_Hash](#varnishlog.constants.tag-hash) = 48;

    const
     [int](#language.types.integer)
      [TAG_Backend_health](#varnishlog.constants.tag-backend-health) = 49;

    const
     [int](#language.types.integer)
      [TAG_VCL_Log](#varnishlog.constants.tag-vcl-log) = 50;

    const
     [int](#language.types.integer)
      [TAG_Gzip](#varnishlog.constants.tag-gzip) = 51;


    /* Métodos */

public [\_\_construct](#varnishlog.construct)([array](#language.types.array) $args = ?)
public [getLine](#varnishlog.getline)(): [array](#language.types.array)
public static [getTagName](#varnishlog.gettagname)([int](#language.types.integer) $index): [string](#language.types.string)

}

## Constantes predefinidas

     **[VarnishLog::TAG_Debug](#varnishlog.constants.tag-debug)**








     **[VarnishLog::TAG_Error](#varnishlog.constants.tag-error)**








     **[VarnishLog::TAG_CLI](#varnishlog.constants.tag-cli)**








     **[VarnishLog::TAG_StatSess](#varnishlog.constants.tag-statsess)**








     **[VarnishLog::TAG_ReqEnd](#varnishlog.constants.tag-reqend)**








     **[VarnishLog::TAG_SessionOpen](#varnishlog.constants.tag-sessionopen)**








     **[VarnishLog::TAG_SessionClose](#varnishlog.constants.tag-sessionclose)**








     **[VarnishLog::TAG_BackendOpen](#varnishlog.constants.tag-backendopen)**








     **[VarnishLog::TAG_BackendXID](#varnishlog.constants.tag-backendxid)**








     **[VarnishLog::TAG_BackendReuse](#varnishlog.constants.tag-backendreuse)**








     **[VarnishLog::TAG_BackendClose](#varnishlog.constants.tag-backendclose)**








     **[VarnishLog::TAG_HttpGarbage](#varnishlog.constants.tag-httpgarbage)**








     **[VarnishLog::TAG_Backend](#varnishlog.constants.tag-backend)**








     **[VarnishLog::TAG_Length](#varnishlog.constants.tag-length)**








     **[VarnishLog::TAG_FetchError](#varnishlog.constants.tag-fetcherror)**








     **[VarnishLog::TAG_RxRequest](#varnishlog.constants.tag-rxrequest)**








     **[VarnishLog::TAG_RxResponse](#varnishlog.constants.tag-rxresponse)**








     **[VarnishLog::TAG_RxStatus](#varnishlog.constants.tag-rxstatus)**








     **[VarnishLog::TAG_RxURL](#varnishlog.constants.tag-rxurl)**








     **[VarnishLog::TAG_RxProtocol](#varnishlog.constants.tag-rxprotocol)**








     **[VarnishLog::TAG_RxHeader](#varnishlog.constants.tag-rxheader)**








     **[VarnishLog::TAG_TxRequest](#varnishlog.constants.tag-txrequest)**








     **[VarnishLog::TAG_TxResponse](#varnishlog.constants.tag-txresponse)**








     **[VarnishLog::TAG_TxStatus](#varnishlog.constants.tag-txstatus)**








     **[VarnishLog::TAG_TxURL](#varnishlog.constants.tag-txurl)**








     **[VarnishLog::TAG_TxProtocol](#varnishlog.constants.tag-txprotocol)**








     **[VarnishLog::TAG_TxHeader](#varnishlog.constants.tag-txheader)**








     **[VarnishLog::TAG_ObjRequest](#varnishlog.constants.tag-objrequest)**








     **[VarnishLog::TAG_ObjResponse](#varnishlog.constants.tag-objresponse)**








     **[VarnishLog::TAG_ObjStatus](#varnishlog.constants.tag-objstatus)**








     **[VarnishLog::TAG_ObjURL](#varnishlog.constants.tag-objurl)**








     **[VarnishLog::TAG_ObjProtocol](#varnishlog.constants.tag-objprotocol)**








     **[VarnishLog::TAG_ObjHeader](#varnishlog.constants.tag-objheader)**








     **[VarnishLog::TAG_LostHeader](#varnishlog.constants.tag-lostheader)**








     **[VarnishLog::TAG_TTL](#varnishlog.constants.tag-ttl)**








     **[VarnishLog::TAG_Fetch_Body](#varnishlog.constants.tag-fetch-body)**








     **[VarnishLog::TAG_VCL_acl](#varnishlog.constants.tag-vcl-acl)**








     **[VarnishLog::TAG_VCL_call](#varnishlog.constants.tag-vcl-call)**








     **[VarnishLog::TAG_VCL_trace](#varnishlog.constants.tag-vcl-trace)**








     **[VarnishLog::TAG_VCL_return](#varnishlog.constants.tag-vcl-return)**








     **[VarnishLog::TAG_VCL_error](#varnishlog.constants.tag-vcl-error)**








     **[VarnishLog::TAG_ReqStart](#varnishlog.constants.tag-reqstart)**








     **[VarnishLog::TAG_Hit](#varnishlog.constants.tag-hit)**








     **[VarnishLog::TAG_HitPass](#varnishlog.constants.tag-hitpass)**








     **[VarnishLog::TAG_ExpBan](#varnishlog.constants.tag-expban)**








     **[VarnishLog::TAG_ExpKill](#varnishlog.constants.tag-expkill)**








     **[VarnishLog::TAG_WorkThread](#varnishlog.constants.tag-workthread)**








     **[VarnishLog::TAG_ESI_xmlerror](#varnishlog.constants.tag-esi-xmlerror)**








     **[VarnishLog::TAG_Hash](#varnishlog.constants.tag-hash)**








     **[VarnishLog::TAG_Backend_health](#varnishlog.constants.tag-backend-health)**








     **[VarnishLog::TAG_VCL_Log](#varnishlog.constants.tag-vcl-log)**








     **[VarnishLog::TAG_Gzip](#varnishlog.constants.tag-gzip)**






# VarnishLog::\_\_construct

(PECL varnish &gt;= 0.6)

VarnishLog::\_\_construct — Constructor de Varnishlog

### Descripción

public **VarnishLog::\_\_construct**([array](#language.types.array) $args = ?)

### Parámetros

    args


       Argumentos de configuración. Las posibles claves son:

VARNISH_CONFIG_IDENT - local varnish instance ident path

### Valores devueltos

# VarnishLog::getLine

(PECL varnish &gt;= 0.6)

VarnishLog::getLine — Obtiene la siguiente línea de registro

### Descripción

public **VarnishLog::getLine**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con los datos de la línea de registro.

# VarnishLog::getTagName

(PECL varnish &gt;= 0.6)

VarnishLog::getTagName — Obtener la etiqueta de registro representada por su índice

### Descripción

public static **VarnishLog::getTagName**([int](#language.types.integer) $index): [string](#language.types.string)

### Parámetros

     index


        Índice de etiqueta de registro.





### Valores devueltos

Devuelve el nombre de la etiqueta de registro como un [string](#language.types.string).

## Tabla de contenidos

- [VarnishLog::\_\_construct](#varnishlog.construct) — Constructor de Varnishlog
- [VarnishLog::getLine](#varnishlog.getline) — Obtiene la siguiente línea de registro
- [VarnishLog::getTagName](#varnishlog.gettagname) — Obtener la etiqueta de registro representada por su índice

- [Introducción](#intro.varnish)
- [Instalación/Configuración](#varnish.setup)<li>[Requerimientos](#varnish.requirements)
- [Instalación](#varnish.installation)
  </li>- [Constantes predefinidas](#varnish.constants)
- [Ejemplos](#varnish.examples)<li>[Uso Básico de VarnishAdmin](#varnish.example.admin)
- [Uso básico de VarnishStat](#varnish.example.stat)
- [Uso básico de VarnishLog](#varnish.example.log)
  </li>- [VarnishAdmin](#class.varnishadmin) — La clase VarnishAdmin<li>[VarnishAdmin::auth](#varnishadmin.auth) — Autentificar en una instancia de varnish
- [VarnishAdmin::ban](#varnishadmin.ban) — Prohibe URLs usando una expresión VCL
- [VarnishAdmin::banUrl](#varnishadmin.banurl) — Prohibe una URL usando una expresión VCL
- [VarnishAdmin::clearPanic](#varnishadmin.clearpanic) — Limpia mensajes de pánico de la instancia varnish
- [VarnishAdmin::connect](#varnishadmin.connect) — Conectarse a una interfaz de administración de instancias de varnish
- [VarnishAdmin::\_\_construct](#varnishadmin.construct) — VarnishAdmin constructor
- [VarnishAdmin::disconnect](#varnishadmin.disconnect) — Desconecta interfaz de administración de la instancia de varnish
- [VarnishAdmin::getPanic](#varnishadmin.getpanic) — Obtener el último mensaje de pánico en una instancia varnish
- [VarnishAdmin::getParams](#varnishadmin.getparams) — Busca los parámetros de configuración de la instancia varnish actual
- [VarnishAdmin::isRunning](#varnishadmin.isrunning) — Comprueba si el proceso varnish esclavo está actualmente en marcha
- [VarnishAdmin::setCompat](#varnishadmin.setcompat) — Establece el parámetro de configuración de la clase compacta
- [VarnishAdmin::setHost](#varnishadmin.sethost) — Establece el parámetro de configuración del host de la clase
- [VarnishAdmin::setIdent](#varnishadmin.setident) — Establece el parámetro de configuración de la identificación de la clase
- [VarnishAdmin::setParam](#varnishadmin.setparam) — Establece los parámetros de configuración en la instancia varnish actual
- [VarnishAdmin::setPort](#varnishadmin.setport) — Establece el parámetro de configuración del puerto de clase
- [VarnishAdmin::setSecret](#varnishadmin.setsecret) — Establece los parámetros secretos de configuración de la clase
- [VarnishAdmin::setTimeout](#varnishadmin.settimeout) — Configura el parámetro de tiempo de espera de la clase
- [VarnishAdmin::start](#varnishadmin.start) — Iniciar el proceso de varnish
- [VarnishAdmin::stop](#varnishadmin.stop) — Detener el proceso de varnish
  </li>- [VarnishStat](#class.varnishstat) — La clase VarnishStat<li>[VarnishStat::__construct](#varnishstat.construct) — Constructor VarnishStat
- [VarnishStat::getSnapshot](#varnishstat.getsnapshot) — Obtener la instantánea actual de las estadísticas de instancia varnish
  </li>- [VarnishLog](#class.varnishlog) — La clase VarnishLog<li>[VarnishLog::__construct](#varnishlog.construct) — Constructor de Varnishlog
- [VarnishLog::getLine](#varnishlog.getline) — Obtiene la siguiente línea de registro
- [VarnishLog::getTagName](#varnishlog.gettagname) — Obtener la etiqueta de registro representada por su índice
  </li>
