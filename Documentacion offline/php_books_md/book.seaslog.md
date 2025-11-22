# Seaslog

# Introducción

Seaslog es una extensión de registro eficiente, rápida y estable para PHP.

El registro, que generalmente es el registro de operaciones del sistema,
del software y de la aplicación.
A través del análisis del registro, puede facilitar a los usuarios comprender el funcionamiento del sistema,
del software y de la aplicación.
Si el registro de la aplicación es lo suficientemente rico,
también puede analizar el comportamiento operativo del usuario anterior, el tipo,
la distribución regional u otra información adicional. El registro de la aplicación también indica múltiples niveles al mismo tiempo,
puede obtener fácilmente el análisis del estado de salud de la aplicación,
encontrar rápidamente los problemas y localizarlos rápidamente, y resolver el problema, remediar la pérdida.

La función error_log, syslog que está integrada en PHP es potente y tiene un excelente rendimiento,
pero debido a varios defectos (error_log no tiene nivel de error, no tiene formato fijo, syslog independientemente del módulo,
y se mezcla con el registro del sistema), reduce mucho la flexibilidad y no puede satisfacer los requisitos de la aplicación.

La buena noticia es que existen varias bibliotecas de clases de registro de terceros establecidas
para compensar los defectos, como log4php, plog, monolog (por supuesto,
hay muchas aplicaciones en el desarrollo de proyectos de la clase de registro).

Por lo tanto, hay una biblioteca de registro que cumple con los siguientes requisitos:

        - Módulos, clasificación

        - Configuración simple (preferiblemente sin configuración)

        - Formato de registro claro y fácil de entender

        - Aplicación simple y buen rendimiento


    Seaslog cumple con estas demandas.

Lo que se proporciona actualmente:

        - En el proyecto PHP, registrar la especificación del registro y repidly.

        - Configurar el directorio de registro predeterminado y el módulo

        - Directorio de registro especificado y captura de la configuración actual

        - Análisis preliminar del marco de alerta temprana

        - Tampon de registro eficiente y depuración de tampon práctica

        - Seguir la especificación de la interfaz de registro PSR-3

        - Registrar automáticamente la información de error

        - Registrar automáticamente la información anormal

        - Soporte Conectar el puerto TCP, enviar con RFC5424

        - Soporte Conectar el puerto UDP, enviar con RFC5424

        - Soporte RequestId diferencia las solicitudes

        - Soporte para las personalizaciones de plantilla de registro

Ver más [» Document SeasLog](https://seasx.github.io/SeasLog/) en Github.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#seaslog.requirements)
- [Instalación](#seaslog.installation)
- [Configuración en tiempo de ejecución](#seaslog.configuration)
- [Tipos de recursos](#seaslog.resources)

    ## Requerimientos

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/seaslog](https://pecl.php.net/package/seaslog)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de Seaslog**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [seaslog.appender](#ini.seaslog.appender)
      1
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.appender_retry](#ini.seaslog.appender-retry)
      0
      **[INI_ALL](#constant.ini-all)**




      [seaslog.level](#ini.seaslog.level)
      8
      **[INI_ALL](#constant.ini-all)**




      [seaslog.remote_host](#ini.seaslog.remote-host)
      127.0.0.1
      **[INI_ALL](#constant.ini-all)**




      [seaslog.remote_port](#ini.seaslog.remote-port)
      514
      **[INI_ALL](#constant.ini-all)**




      [seaslog.remote_timeout](#ini.seaslog.remote-timeout)
      1
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.default_basepath](#ini.seaslog.default-basepath)
      /var/log/www
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.default_logger](#ini.seaslog.default-logger)
      default
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.default_template](#ini.seaslog.default-template)
      %T | %L | %P | %Q | %t | %M
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.default_datetime_format](#ini.seaslog.default-datetime-format)
      Y-m-d H:i:s
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.trace_error](#ini.seaslog.trace-error)
      1
      **[INI_ALL](#constant.ini-all)**




      [seaslog.trace_exception](#ini.seaslog.trace-exception)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.trace_notice](#ini.seaslog.trace-notice)
      0
      **[INI_ALL](#constant.ini-all)**




      [seaslog.trace_warning](#ini.seaslog.trace-warning)
      0
      **[INI_ALL](#constant.ini-all)**




      [seaslog.use_buffer](#ini.seaslog.use-buffer)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.buffer_size](#ini.seaslog.buffer-size)
      0
      **[INI_ALL](#constant.ini-all)**




      [seaslog.buffer_disabled_in_cli](#ini.seaslog.buffer-disabled-in-cli)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.disting_type](#ini.seaslog.disting-type)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.disting_folder](#ini.seaslog.disting-folder)
      1
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.disting_by_hour](#ini.seaslog.disting-by-hour)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [seaslog.recall_depth](#ini.seaslog.recall-depth)
      0
      **[INI_ALL](#constant.ini-all)**




      [seaslog.trim_wrap](#ini.seaslog.trim-wrap)
      0
      **[INI_ALL](#constant.ini-all)**




      [seaslog.ignore_warning](#ini.seaslog.ignore-warning)
      1
      **[INI_ALL](#constant.ini-all)**




      [seaslog.throw_exception](#ini.seaslog.throw-exception)
      1
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      seaslog.appender
      [int](#language.types.integer)



       Cambia el almacén de datos del registro. 1Fichero 2TCP 3UDP (Cambiar por omisión 1)




       Seaslog enviará el registro al servidor tcp://remote_host:remote_port o udp://remote_host:remote_port,
       cuando *seaslog.appender* está configurado a 2 (TCP) o 3 (UDP).




       Cuando *SeasLog* envía un registro a TCP/UDP, el estilo sigue la RFC5424.
       El {logInfo} es afectado por *seaslog.default_template*.





The log style finally formatted such as:
&lt;15&gt;1 2017-08-27T01:24:59+08:00 vagrant-ubuntu-trusty test/logger[27171]: 2016-06-25 00:59:43 | DEBUG | 21423 | 599157af4e937 | 1466787583.322 | this is a neeke debug
&lt;14&gt;1 2017-08-27T01:24:59+08:00 vagrant-ubuntu-trusty test/logger[27171]: 2016-06-25 00:59:43 | INFO | 21423 | 599157af4e937 | 1466787583.323 | this is a info log
&lt;13&gt;1 2017-08-27T01:24:59+08:00 vagrant-ubuntu-trusty test/logger[27171]: 2016-06-25 00:59:43 | NOTICE | 21423 | 599157af4e937 | 1466787583.324 | this is a notice log

      seaslog.appender_retry
      [int](#language.types.integer)



       El conteo de reintentos del registro.
       0 (No reintentar)







      seaslog.buffer_disabled_in_cli
      [int](#language.types.integer)



       Desactiva el búfer en el CLI. 1-Y 0-N (Por omisión)




       Activar el conmutador buffer_disabled_in_cli.
       El conmutador buffer_disabled_in_cli por omisión está desactivado.
       Si el conmutador buffer_disabled_in_cli está activado y se ejecuta en CLI,
       el parámetro seaslog.use_buffer será ignorado,
       Seaslog escribirá INMEDIATAMENTE en el almacén de datos.







      seaslog.buffer_size
      [int](#language.types.integer)



       Configura el tamaño del búfer con 100.
       El tamaño del búfer por omisión 0, esto significa no usar búfer.
       Si buffer_size &gt; 0, SeasLog reescribirá hacia abajo en el almacén de datos
       cuando el registro pregrabado en memoria es &gt;= a este buffer_size, luego refrescará el grupo de memoria.







      seaslog.default_basepath
      [string](#language.types.string)



       La ruta base del registro por omisión. Por omisión "/var/log/www".







      seaslog.default_datetime_format
      [string](#language.types.string)



       El formato de la fecha y la hora. Por omisión "Y-m-d H:i:s".







      seaslog.default_logger
      [string](#language.types.string)



       La ruta del registro por omisión. Por omisión "default".







      seaslog.disting_by_hour
      [int](#language.types.integer)



       El conmutador usa el registro con la hora. 1-Y 0-N (Por omisión)



      **Nota**:



        *seaslog.disting_by_hour = 1* El conmutador usa Logger DisTing por hora.
        Esto significa que SeasLog creará el fichero cada hora.








      seaslog.disting_folder
      [int](#language.types.integer)



       El conmutador usa el registro con la carpeta. 1-Y (Por omisión) 0-N



      **Nota**:



        *seaslog.disting_folder = 1* El conmutador usa Logger DisTing por carpeta.
        Esto significa que SeasLog creará el fichero deistic por carpeta,
        y cuando esta configuración está desactivada, SeasLog creará el fichero
        utilice el conector de subrayado Logger y Time como default_20180211.log.








      seaslog.disting_type
      [int](#language.types.integer)



       El conmutador usa el registro con el tipo. 1-Y 0-N (Por omisión)



      **Nota**:



        *seaslog.disting_type = 1* El conmutador usa Logger DisTing por tipo,
        esto significa que SeasLog creará el fichero deistic info\warn\error y otro tipo.








      seaslog.ignore_warning
      [int](#language.types.integer)



       El conmutador ignora las advertencias de SeasLog. 1-On (Por omisión) 0-Off



      **Nota**:



        *seaslog.ignore_warning = 1* Abrir una advertencia para ignorar SeasLog mismo.
        Cuando los permisos de directorio o los puertos del servidor de recepción están bloqueados, son ignorados;
        cuando están cerrados, se lanza una advertencia.








      seaslog.level
      [int](#language.types.integer)



       El nivel de registro. Por omisión 8 (Todos).
       0-EMERGENCY 1-ALERT 2-CRITICAL 3-ERROR 4-WARNING 5-NOTICE 6-INFO 7-DEBUG 8-TODOS



      **Nota**:



          Consejo: El elemento de configuración ha cambiado desde la versión 1.7.0.
          Antes de la versión 1.7.0, cuanto más pequeño es el valor, más registros se toman según el nivel:
          0-todos 1-depuración 2-info 3-avisos 4-advertencia 5-error 6-crítico 7-alerta 8-emergencia
          Antes de la versión 1.7.0, por omisión 0 (Todos).








      seaslog.recall_depth
      [int](#language.types.integer)



       La profundidad de llamada de la función. Esto afectará la variable LineNo en %F.
       Por omisión 0







      seaslog.remote_host
      [string](#language.types.string)



       Si se utiliza Record TCP o UDP, configure este host remoto. Por omisión "127.0.0.1"







      seaslog.remote_port
      [int](#language.types.integer)



       Si se utiliza Record TCP o UDP, configure este puerto remoto. Por omisión 514







      seaslog.remote_timeout
      [int](#language.types.integer)



       Si se utiliza Record TCP o UDP, configure este tiempo de espera remoto. Por omisión 1 segundo







      seaslog.throw_exception
      [int](#language.types.integer)



       El conmutador lanza la excepción SeasLog. 1-On (Por omisión) 0-Off



      **Nota**:



        *seaslog.throw_exception = 1* Abrir una excepción que lanza el SeasLog para lanzarse a sí mismo.
        Cuando los permisos de directorio o los puertos del servidor de recepción están bloqueados,
        lance una excepción; no lance una excepción cuando están cerrados.








      seaslog.trace_error
      [int](#language.types.integer)



       Registrar automáticamente el error final con el registro por omisión. 1-Y (Por omisión) 0-N







      seaslog.trace_exception
      [int](#language.types.integer)



       Registrar automáticamente la excepción con el registro por omisión. 1-Y 0-N (Por omisión)







      seaslog.trace_notice
      [int](#language.types.integer)



       Registrar automáticamente el aviso con el registro por omisión. 1-Y 0-N (Por omisión)







      seaslog.trace_warning
      [int](#language.types.integer)



       Registrar automáticamente la advertencia con el registro por omisión. 1-Y 0-N (Por omisión)







      seaslog.trim_wrap
      [int](#language.types.integer)



       Recortar los \n y \r en el mensaje del registro. 1-On 0-Off (Por omisión)







      seaslog.use_buffer
      [int](#language.types.integer)



       El conmutador usa el búfer del registro con la memoria. 1-Y 0-N (Por omisión)



      **Nota**:



        *seaslog.use_buffer = 1* Activa el conmutador use_buffer.
        El conmutador use_buffer por omisión está desactivado.
        Si el conmutador use_buffer está activado, SeasLog pregraba el registro con la memoria,
        y serán reescritos en el almacén de datos por solicitud de parada
        o salida del proceso php (PHP RSHUTDOWN o PHP MSHUTDOWN).








      seaslog.default_template
      [string](#language.types.string)



       La plantilla de registro por omisión.
       Por omisión "%T | %L | %P | %Q | %t | %M".



      **Nota**:



        Las siguientes variables por omisión se proporcionan,
        que pueden ser usadas directamente en la plantilla de registro y reemplazadas por un valor correspondiente
        cuando el registro es finalmente generado.




        La plantilla de registro por omisión es: seaslog.default_template = "%T | %L | %P | %Q | %t | %M",
        esto significa que el estilo de registro por omisión es: {dateTime} | {level} | {pid} | {uniqid} | {timeStamp} | {logInfo}




         Si se tiene una plantilla de registro personalizada, como: seaslog.default_template = "[%T]:%L %P %Q %t %M",
         esto significará que el estilo de registro ha sido personalizado como: [{dateTime}]:{level} {pid} {uniqid} {timeStamp} {logInfo}




          <caption>**Tabla de variables por omisión de Seaslog**</caption>



                Nombre de variable
                Descripción






                %L
                Nivel.



                %M
                Mensaje.



                %T
               Fecha y hora. Como 2017-08-16 19:15:02, afectado por seaslog.default_datetime_format.



                %t
               Marca de tiempo. Como 1502882102.862, preciso a la milésima de segundo.



                %Q
                El identificador de solicitud. Para distinguir una sola solicitud,
                no invocar la función SeasLog::setRequestId($string),
                el valor único generado por la función integrada static char *get_uniqid()
                cuando la solicitud es inicializada es usado.



                %H
                El nombre de host.



                %P
                El identificador del proceso.



                %D
               Dominio:Puerto. Como www.cloudwise.com:80; Con la Cli, como cli.



                %R
               El URI de la solicitud. Como /app/user/signin;
                Con la Cli, es el script de índice, como CliIndex.php.



                %m
               El método de la solicitud. Como Get; Con la Cli, es el script de comando, como /bin/bash.



                %I
               La IP del Cliente; Con la Cli es local.
                El valor de prioridad: HTTP_X_REAL_IP &gt; HTTP_X_FORWARDED_FOR &gt; REMOTE_ADDR



                %F
               Nombre del Fichero:Número de línea. Como UserService.php:118.



                %U
               Uso de la memoria. byte. Llamada zend_memory_usage.



                %u
               Uso máximo de la memoria. byte. Llamada zend_memory_peak_usage.



                %C
               TODO Clase::Acción. Como UserService::getUserInfo









## Tipos de recursos

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SEASLOG_VERSION](#constant.seaslog-version)**
     ([string](#language.types.string))








     **[SEASLOG_AUTHOR](#constant.seaslog-author)**
     ([string](#language.types.string))








     **[SEASLOG_ALL](#constant.seaslog-all)**
     ([string](#language.types.string))



     "ALL"





     **[SEASLOG_DEBUG](#constant.seaslog-debug)**
     ([string](#language.types.string))



     "DEBUG" - Información detallada de depuración. Información detallada sobre los eventos.





     **[SEASLOG_INFO](#constant.seaslog-info)**
     ([string](#language.types.string))



     "INFO" - Eventos interesantes. Énfasis en el proceso de ejecución de la aplicación.





     **[SEASLOG_NOTICE](#constant.seaslog-notice)**
     ([string](#language.types.string))



     "NOTICE" - Eventos normales pero significativos. Información más importante que el nivel INFO durante la ejecución.





     **[SEASLOG_WARNING](#constant.seaslog-warning)**
     ([string](#language.types.string))



     "WARNING" - Ocurrencias excepcionales que no son errores. Información aberrante potencial que requiere atención y debe ser reparada.





     **[SEASLOG_ERROR](#constant.seaslog-error)**
     ([string](#language.types.string))



     "ERROR" - Errores de funcionamiento que no requieren acción inmediata pero que deberían necesitarla típicamente.





     **[SEASLOG_CRITICAL](#constant.seaslog-critical)**
     ([string](#language.types.string))



     "CRITICAL" - Condiciones críticas. Requiere reparación inmediata, y el componente del programa está indisponible.





     **[SEASLOG_ALERT](#constant.seaslog-alert)**
     ([string](#language.types.string))



     "ALERT" - Acción debe ser tomada inmediatamente. Atención inmediata debe ser prestada al personal concernido para las reparaciones de emergencia.





     **[SEASLOG_EMERGENCY](#constant.seaslog-emergency)**
     ([string](#language.types.string))



     "EMERGENCY" - Sistema inutilizable.





     **[SEASLOG_DETAIL_ORDER_ASC](#constant.seaslog-detail-order-asc)**
     ([int](#language.types.integer))



     1





     **[SEASLOG_DETAIL_ORDER_DESC](#constant.seaslog-detail-order-desc)**
     ([int](#language.types.integer))



     2





     **[SEASLOG_APPENDER_FILE](#constant.seaslog-appender-file)**
     ([int](#language.types.integer))



     1





     **[SEASLOG_APPENDER_TCP](#constant.seaslog-appender-tcp)**
     ([int](#language.types.integer))



     2





     **[SEASLOG_APPENDER_UDP](#constant.seaslog-appender-udp)**
     ([int](#language.types.integer))



     3





     **[SEASLOG_CLOSE_LOGGER_STREAM_MOD_ALL](#constant.seaslog-close-logger-stream-mod-all)**
     ([int](#language.types.integer))



      1





     **[SEASLOG_CLOSE_LOGGER_STREAM_MOD_ASSIGN](#constant.seaslog-close-logger-stream-mod-assign)**
     ([int](#language.types.integer))



      2





     **[SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT](#constant.seaslog-request-variable-domain-port)**
     ([int](#language.types.integer))



      1





     **[SEASLOG_REQUEST_VARIABLE_REQUEST_URI](#constant.seaslog-request-variable-request-uri)**
     ([int](#language.types.integer))



      2





     **[SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD](#constant.seaslog-request-variable-request-method)**
     ([int](#language.types.integer))



      3





     **[SEASLOG_REQUEST_VARIABLE_CLIENT_IP](#constant.seaslog-request-variable-client-ip)**
     ([int](#language.types.integer))



      4


# Ejemplos

**Ejemplo #1 Obtener y definir la ruta de base**

&lt;?php
$basePath1 = SeasLog::getBasePath();

SeasLog::setBasePath('/log/base_test');
$basePath2 = SeasLog::getBasePath();

var_dump($basePath1,$basePath2);

?&gt;

Resultado del ejemplo anterior es similar a:

string(12) "/var/log/www"
string(14) "/log/base_test"

**Ejemplo #2 Obtener y definir el registro**

&lt;?php
$lastLogger1 = SeasLog::getLastLogger();

SeasLog::setLogger('testModule/app1');
$lastLogger2 = SeasLog::getLastLogger();

var_dump($lastLogger1,$lastLogger2);

?&gt;

Resultado del ejemplo anterior es similar a:

string(7) "default"
string(15) "testModule/app1"

**Ejemplo #3 Registro de escritura rápida**

&lt;?php
SeasLog::log(SEASLOG_ERROR,'this is a error test by ::log');
SeasLog::debug('this is a {userName} debug',array('{userName}' =&gt; 'neeke'));
SeasLog::info('this is a info log');
SeasLog::notice('this is a notice log');
SeasLog::warning('your {website} was down,please {action} it ASAP!',array('{website}' =&gt; 'github.com','{action}' =&gt; 'rboot'));
SeasLog::error('a error log');
SeasLog::critical('some thing was critical');
SeasLog::alert('yes this is a {messageName}',array('{messageName}' =&gt; 'alertMSG'));
SeasLog::emergency('Just now, the house next door was completely burnt out! {note}',array('{note}' =&gt; 'it`s a joke'));
?&gt;

Por omisión, _seaslog.default_template = "%T | %L | %P | %Q | %t | %M"_.
Esto significa que, por omisión, el estilo del registro es: `{dateTime} | {level} | {pid} | {uniqid} | {timeStamp} | {logInfo}`.

Resultado del ejemplo anterior es similar a:

_seaslog.appender = 1_

2014-07-27 08:53:52 | ERROR | 23625 | 599159975a9ff | 1406422432.786 | this is a error test by log
2014-07-27 08:53:52 | DEBUG | 23625 | 599159975a9ff | 1406422432.786 | this is a neeke debug
2014-07-27 08:53:52 | INFO | 23625 | 599159975a9ff | 1406422432.787 | this is a info log
2014-07-27 08:53:52 | NOTICE | 23625 | 599159975a9ff | 1406422432.787 | this is a notice log
2014-07-27 08:53:52 | WARNING | 23625 | 599159975a9ff | 1406422432.787 | your github.com was down,please rboot it ASAP!
2014-07-27 08:53:52 | ERROR | 23625 | 599159975a9ff | 1406422432.787 | a error log
2014-07-27 08:53:52 | CRITICAL | 23625 | 599159975a9ff | 1406422432.787 | some thing was critical
2014-07-27 08:53:52 | EMERGENCY | 23625 | 599159975a9ff | 1406422432.787 | Just now, the house next door was completely burnt out! it is a joke

Resultado del ejemplo anterior es similar a:

_seaslog.appender = 2_ or _seaslog.appender = 3_

The log style finally formatted such as:
&lt;15&gt;1 2017-08-27T01:24:59+08:00 vagrant-ubuntu-trusty test/logger[27171]: 2016-06-25 00:59:43 | DEBUG | 21423 | 599157af4e937 | 1466787583.322 | this is a neeke debug
&lt;14&gt;1 2017-08-27T01:24:59+08:00 vagrant-ubuntu-trusty test/logger[27171]: 2016-06-25 00:59:43 | INFO | 21423 | 599157af4e937 | 1466787583.323 | this is a info log
&lt;13&gt;1 2017-08-27T01:24:59+08:00 vagrant-ubuntu-trusty test/logger[27171]: 2016-06-25 00:59:43 | NOTICE | 21423 | 599157af4e937 | 1466787583.324 | this is a notice log

**Ejemplo #4 Contar rápidamente ciertos tipos de valores de registro**

_SeasLog_ recupera el conteo del valor `grep -wc` utilizando el tubo del sistema y lo devuelve a PHP (array o integer).

&lt;?php
$countResult1 = SeasLog::analyzerCount();
$countResult2 = SeasLog::analyzerCount(SEASLOG_WARNING);
$countResult3 = SeasLog::analyzerCount(SEASLOG_ERROR,date('Ymd',time()));

var_dump($countResult1,$countResult2,$countResult3);

?&gt;

Resultado del ejemplo anterior es similar a:

array(8) {
["DEBUG"]=&gt;
int(3)
["INFO"]=&gt;
int(3)
["NOTICE"]=&gt;
int(3)
["WARNING"]=&gt;
int(3)
["ERROR"]=&gt;
int(6)
["CRITICAL"]=&gt;
int(3)
["ALERT"]=&gt;
int(3)
["EMERGENCY"]=&gt;
int(3)
}
int(7)
int(1)

**Ejemplo #5 Obtener algunos tipos de lista de registros**

_SeasLog_ recupera la lista de valores de `grep -w` utilizando el tubo del sistema y la devuelve a PHP.

&lt;?php
$detailErrorArray = SeasLog::analyzerDetail(SEASLOG_ERROR);
var_dump($detailErrorArray);

var_dump(SeasLog::analyzerDetail(SEASLOG_ERROR,date('Ymd',time())));
?&gt;

Resultado del ejemplo anterior es similar a:

array(6) {
[0] =&gt;
string(83) "2014-02-24 00:14:02 | ERROR | 8568 | 599157af4e937 | 1393172042.717 | test error 3 "
[1] =&gt;
string(83) "2014-02-24 00:14:04 | ERROR | 8594 | 5991576584446 | 1393172044.104 | test error 3 "
[2] =&gt;
string(83) "2014-02-24 00:14:04 | ERROR | 8620 | 1502697015147 | 1393172044.862 | test error 3 "
[3] =&gt;
string(83) "2014-02-24 00:14:05 | ERROR | 8646 | 599159975a9ff | 1393172045.989 | test error 3 "
[4] =&gt;
string(83) "2014-02-24 00:14:07 | ERROR | 8672 | 599159986ec28 | 1393172047.882 | test error 3 "
[5] =&gt;
string(83) "2014-02-24 00:14:08 | ERROR | 8698 | 5991599981cec | 1393172048.736 | test error 3 "
}

array(2) {
[0] =&gt;
string(83) "2014-02-24 00:14:02 | ERROR | 8568 | 599157af4e937 | 1393172042.717 | test error 3 "
[1] =&gt;
string(83) "2014-02-24 00:14:04 | ERROR | 8594 | 5991576584446 | 1393172044.104 | test error 3 "
}

# Funciones de Seaslog

# seaslog_get_author

(PECL seaslog &gt;=1.0.0)

seaslog_get_author — Devuelve el autor de SeasLog.

### Descripción

**seaslog_get_author**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el autor de SeasLog como string.

### Ejemplos

**Ejemplo #1 Ejemplo de seaslog_get_author()**

&lt;?php

var_dump(seaslog_get_author());

?&gt;

Resultado del ejemplo anterior es similar a:

string(29) "Chitao.Gao [ neeke@php.net ]"

# seaslog_get_version

(PECL seaslog &gt;=1.0.0)

seaslog_get_version — Devuelve la versión de SeasLog.

### Descripción

**seaslog_get_version**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la versión de SeasLog (SEASLOG_VERSION) como string.

### Ejemplos

**Ejemplo #1 Ejemplo de seaslog_get_version()**

&lt;?php

var_dump(seaslog_get_version());

?&gt;

Resultado del ejemplo anterior es similar a:

string(5) "1.8.4"

## Tabla de contenidos

- [seaslog_get_author](#function.seaslog-get-author) — Devuelve el autor de SeasLog.
- [seaslog_get_version](#function.seaslog-get-version) — Devuelve la versión de SeasLog.

# La clase SeasLog

(PECL seaslog &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **SeasLog**

     {


    /* Métodos */

public static [alert](#seaslog.alert)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public static [analyzerCount](#seaslog.analyzercount)([string](#language.types.string) $level, [string](#language.types.string) $log_path = ?, [string](#language.types.string) $key_word = ?): [mixed](#language.types.mixed)
public static [analyzerDetail](#seaslog.analyzerdetail)(
    [string](#language.types.string) $level,
    [string](#language.types.string) $log_path = ?,
    [string](#language.types.string) $key_word = ?,
    [int](#language.types.integer) $start = ?,
    [int](#language.types.integer) $limit = ?,
    [int](#language.types.integer) $order = ?
): [mixed](#language.types.mixed)
public static [closeLoggerStream](#seaslog.closeloggerstream)([int](#language.types.integer) $model, [string](#language.types.string) $logger): [bool](#language.types.boolean)
public static [critical](#seaslog.critical)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public static [debug](#seaslog.debug)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public [\_\_destruct](#seaslog.destruct)()
public static [emergency](#seaslog.emergency)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public static [error](#seaslog.error)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public static [flushBuffer](#seaslog.flushbuffer)(): [bool](#language.types.boolean)
public static [Seaslog::getBasePath](#seaslog.getbasepath)(): [string](#language.types.string)
public static [getBuffer](#seaslog.getbuffer)(): [array](#language.types.array)
public static [getBufferEnabled](#seaslog.getbufferenabled)(): [bool](#language.types.boolean)
public static [getDatetimeFormat](#seaslog.getdatetimeformat)(): [string](#language.types.string)
public static [getLastLogger](#seaslog.getlastlogger)(): [string](#language.types.string)
public static [getRequestID](#seaslog.getrequestid)(): [string](#language.types.string)
public static [getRequestVariable](#seaslog.getrequestvariable)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public static [info](#seaslog.info)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public static [log](#seaslog.log)(
    [string](#language.types.string) $level,
    [string](#language.types.string) $message = ?,
    [array](#language.types.array) $content = ?,
    [string](#language.types.string) $logger = ?
): [bool](#language.types.boolean)
public static [notice](#seaslog.notice)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)
public static [setBasePath](#seaslog.setbasepath)([string](#language.types.string) $base_path): [bool](#language.types.boolean)
public static [setDatetimeFormat](#seaslog.setdatetimeformat)([string](#language.types.string) $format): [bool](#language.types.boolean)
public static [setLogger](#seaslog.setlogger)([string](#language.types.string) $logger): [bool](#language.types.boolean)
public static [setRequestID](#seaslog.setrequestid)([string](#language.types.string) $request_id): [bool](#language.types.boolean)
public static [setRequestVariable](#seaslog.setrequestvariable)([int](#language.types.integer) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)
public static [warning](#seaslog.warning)([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

}

# SeasLog::alert

(PECL seaslog &gt;=1.0.0)

SeasLog::alert — Registra la información del registro de alerta

### Descripción

public static **SeasLog::alert**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información del registro de alerta.

**Nota**:

        "ALERT" - Se debe tomar una acción inmediatamente.
        Se debe prestar atención inmediata al personal concernido para reparaciones de emergencia.


### Parámetros

    message


      El mensaje del registro.






    content


      El `message` contiene marcadores de posición que los implementadores reemplazan con valores del array de contenido.
      Por ejemplo, si el `message` es 'log info desde {NAME}' y el 'content' es 'array('NAME' =&gt; neeke)',
      la información del registro será 'log info desde neeke'.






    logger


      El `logger` causado por el tercer argumento sería utilizado a partir de ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Retorna TRUE en caso de éxito en el registro de la información del registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::alert()**

&lt;?php

var_dump(SeasLog::alert('log message'));

//con contenido
var_dump(SeasLog::alert('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::alert('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | ALERT | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | ALERT | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | ALERT | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::analyzerCount

(PECL seaslog &gt;=1.1.6)

SeasLog::analyzerCount — Devuelve el número de registros por nivel, ruta de acceso del registro y palabra clave

### Descripción

public static **SeasLog::analyzerCount**([string](#language.types.string) $level, [string](#language.types.string) $log_path = ?, [string](#language.types.string) $key_word = ?): [mixed](#language.types.mixed)

`SeasLog` obtiene el valor del contador de `grep -ai '{level}' | grep -aic '{key_word}'`
utiliza el pipe del sistema y devuelve a PHP (array o integer).

### Parámetros

    level


      String. El nivel de información del registro.






    log_path


      String. La ruta de acceso de la información del registro.






    key_word


      String. La palabra clave de búsqueda para la información del registro.


### Valores devueltos

    Si `level` es SEASLOG_ALL o está vacío, devuelve todos los niveles contados como `array`.
    Si `level` es SEASLOG_INFO o cualquier otro nivel, devuelve el contador como `integer`.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::analyzerCount()**

&lt;?php

$countResult1 = SeasLog::analyzerCount();

//con `level`
$countResult2 = SeasLog::analyzerCount(SEASLOG_DEBUG);

//con `level` y `log_path`
$countResult3 = SeasLog::analyzerCount(SEASLOG_ERROR,date('Ymd',time()));

//con `level` y `key_word`
$countResult4 = SeasLog::analyzerCount(SEASLOG_DEBUG,NULL,'accessToken');

var_dump($countResult1,$countResult2,$countResult3,$countResult4);

?&gt;

Resultado del ejemplo anterior es similar a:

array(8) {
["DEBUG"]=&gt;
int(180)
["INFO"]=&gt;
int(214)
["NOTICE"]=&gt;
int(0)
["WARNING"]=&gt;
int(0)
["ERROR"]=&gt;
int(228)
["CRITICAL"]=&gt;
int(244)
["ALERT"]=&gt;
int(1)
["EMERGENCY"]=&gt;
int(0)
}

int(180)

int(228)

int(29)

### Ver también

- [SeasLog::analyzerDetail()](#seaslog.analyzerdetail) - Devuelve los detalles del registro por nivel, ruta de registro, palabra clave, inicio, límite, orden

# SeasLog::analyzerDetail

(PECL seaslog &gt;=1.1.6)

SeasLog::analyzerDetail — Devuelve los detalles del registro por nivel, ruta de registro, palabra clave, inicio, límite, orden

### Descripción

public static **SeasLog::analyzerDetail**(
    [string](#language.types.string) $level,
    [string](#language.types.string) $log_path = ?,
    [string](#language.types.string) $key_word = ?,
    [int](#language.types.integer) $start = ?,
    [int](#language.types.integer) $limit = ?,
    [int](#language.types.integer) $order = ?
): [mixed](#language.types.mixed)

    `SeasLog` obtiene los resultados
    `grep -ai '{level}' | grep -ai '{key_word}' |  sed -n '{start},{limit}'p`
    utiliza el pipe del sistema y devuelve un array a PHP.

### Parámetros

    level


      String. El nivel de información del registro.






    log_path


      String. La ruta de la información del registro.






    key_word


      String. La palabra clave de búsqueda para la información del registro.






    start


      Integer. Por omisión, `1`.






    limit


      Integer. Por omisión, `20`.






    order


      Integer. Por omisión, [SEASLOG_DETAIL_ORDER_ASC](#constant.seaslog-detail-order-asc).
      Ver también:



         - [SEASLOG_DETAIL_ORDER_ASC](#constant.seaslog-detail-order-asc)

         - [SEASLOG_DETAIL_ORDER_DESC](#constant.seaslog-detail-order-desc)




### Valores devueltos

Devuelve los resultados en forma de array.

**Nota**:

     Cuando `start`,`limit` no es NULL y en Windows,
     SeasLog lanzará una excepción con el mensaje 'Param start and limit don't support Windows'.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::analyzerDetail()**

&lt;?php

$result1 = SeasLog::analyzerDetail(SEASLOG_ERROR);

//con `logger` y `key_word`
$result2 = SeasLog::analyzerDetail(SEASLOG_ERROR,'test/logger/','neeke');

//con `start` y `limit`
$result3 = SeasLog::analyzerDetail(SEASLOG_ERROR,'test/logger/','neeke',1,2);

var_dump($result1,$result2,$result3);
?&gt;

Resultado del ejemplo anterior es similar a:

array(20) {
[0]=&gt;
string(93) "2018-07-09 12:52:53 | ERROR | 12247 | 5b42ea2580e51 | 1531111973.528 | log message from neeke"
[1]=&gt;
string(93) "2018-07-09 12:52:54 | ERROR | 12256 | 5b42ea26d6657 | 1531111974.878 | log message from neeke"
[2]=&gt;
string(93) "2018-07-09 12:52:55 | ERROR | 12265 | 5b42ea277b8d4 | 1531111975.506 | log message from neeke"
[3]=&gt;
string(104) "2018-07-09 12:52:55 | ERROR | 12274 | 5b42ea27db5dc | 1531111975.898 | log message from the other people"
...
}

array(3) {
[0]=&gt;
string(93) "2018-07-09 12:52:53 | ERROR | 12247 | 5b42ea2580e51 | 1531111973.528 | log message from neeke"
[1]=&gt;
string(93) "2018-07-09 12:52:54 | ERROR | 12256 | 5b42ea26d6657 | 1531111974.878 | log message from neeke"
[2]=&gt;
string(93) "2018-07-09 12:52:55 | ERROR | 12265 | 5b42ea277b8d4 | 1531111975.506 | log message from neeke"
}

array(2) {
[0]=&gt;
string(93) "2018-07-09 12:52:53 | ERROR | 12247 | 5b42ea2580e51 | 1531111973.528 | log message from neeke"
[1]=&gt;
string(93) "2018-07-09 12:52:54 | ERROR | 12256 | 5b42ea26d6657 | 1531111974.878 | log message from neeke"
}

### Ver también

- [SeasLog::analyzerCount()](#seaslog.analyzercount) - Devuelve el número de registros por nivel, ruta de acceso del registro y palabra clave

# SeasLog::closeLoggerStream

(PECL seaslog &gt;=1.8.6)

SeasLog::closeLoggerStream — Libera manualmente el flujo de registro del registro

### Descripción

public static **SeasLog::closeLoggerStream**([int](#language.types.integer) $model, [string](#language.types.string) $logger): [bool](#language.types.boolean)

Libera manualmente el flujo de registro del registro.
SeasLog almacena en caché el gestor de flujo abierto por el registro para ahorrar en la carga adicional de la creación de un flujo. El gestor será liberado automáticamente al final de la petición.
Si en modo CLI, el proceso también liberará automáticamente cuando termine. O se pueden utilizar las siguientes funciones para liberar manualmente (la función de liberación manual debe actualizar SeasLog 1.8.6 o versión posterior).

### Parámetros

    model


      Una constante de entero.



       - [SEASLOG_CLOSE_LOGGER_STREAM_MOD_ALL](#constant.seaslog-close-logger-stream-mod-all)

       - [SEASLOG_CLOSE_LOGGER_STREAM_MOD_ASSIGN](#constant.seaslog-close-logger-stream-mod-assign)






    logger


      El nombre del registro.


### Valores devueltos

Devuelve TRUE en caso de éxito del flujo de registro liberado, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::closeLoggerStream()**

&lt;?php

var_dump(SeasLog::closeLoggerStream());
var_dump(SeasLog::closeLoggerStream(SEASLOG_CLOSE_LOGGER_STREAM_MOD_ALL));
var_dump(SeasLog::closeLoggerStream(SEASLOG_CLOSE_LOGGER_STREAM_MOD_ASSIGN, 'logger_name'));

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)

### Ver también

- [SeasLog::setLogger()](#seaslog.setlogger) - Define el nombre del registrador de SeasLog

- [SeasLog::getLastLogger()](#seaslog.getlastlogger) - Define el último registrador de SeasLog

# SeasLog::\_\_construct

(PECL seaslog &gt;=1.0.0)

SeasLog::\_\_construct — Descripción

### Descripción

public **SeasLog::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# SeasLog::critical

(PECL seaslog &gt;=1.0.0)

SeasLog::critical — Registra la información de registro crítica

### Descripción

public static **SeasLog::critical**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información de registro crítica.

**Nota**:

        "CRITICAL" - Condiciones críticas. Deben ser reparadas de inmediato, y el componente del programa no está disponible.


### Parámetros

    message


      El mensaje de registro.






    content


      El `message` contiene marcadores de posición que los implementadores reemplazan con valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado por el tercer parámetro sería utilizado ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información de registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::critical()**

&lt;?php

var_dump(SeasLog::critical('log message'));

//con contenido
var_dump(SeasLog::critical('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::critical('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | CRITICAL | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | CRITICAL | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | CRITICAL | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::debug

(PECL seaslog &gt;=1.0.0)

SeasLog::debug — Registra la información de depuración

### Descripción

public static **SeasLog::debug**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información de depuración.

**Nota**:

        "DEBUG" - Información de depuración detallada. Eventos de información detallados.


### Parámetros

    message


      El mensaje del registro.






    content


      El `message` contiene espacios reservados que los implementadores reemplazan por valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado como tercer argumento sería utilizado a partir de ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información de depuración, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::debug()**

&lt;?php

var_dump(SeasLog::debug('log message'));

//con contenido
var_dump(SeasLog::debug('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::debug('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | DEBUG | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | DEBUG | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | DEBUG | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::\_\_destruct

(PECL seaslog &gt;=1.0.0)

SeasLog::\_\_destruct — Descripción

### Descripción

public **SeasLog::\_\_destruct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::\_\_destruct()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# SeasLog::emergency

(PECL seaslog &gt;=1.0.0)

SeasLog::emergency — Registra la información del registro de emergencia

### Descripción

public static **SeasLog::emergency**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información del registro de emergencia.

**Nota**:

        "EMERGENCY" - El sistema es inutilizable.


### Parámetros

    message


      El mensaje del registro.






    content


      El `message` contiene espacios reservados que los implementadores reemplazan por valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado por el tercer parámetro sería utilizado a partir de ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información del registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::emergency()**

&lt;?php

var_dump(SeasLog::emergency('log message'));

//con contenido
var_dump(SeasLog::emergency('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::emergency('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | EMERGENCY | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | EMERGENCY | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | EMERGENCY | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::error

(PECL seaslog &gt;=1.0.0)

SeasLog::error — Registra la información del registro de errores

### Descripción

public static **SeasLog::error**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información del registro de errores.

**Nota**:

        "ERROR" - Errores de ejecución que no requieren acción inmediata pero que generalmente deberían ser tratados.


### Parámetros

    message


      El mensaje del registro.






    content


      El `message` contiene espacios reservados que los implementadores reemplazan con valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado como tercer parámetro sería utilizado ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información del registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::error()**

&lt;?php

var_dump(SeasLog::error('log message'));

//con contenido
var_dump(SeasLog::error('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::error('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | ERROR | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | ERROR | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | ERROR | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::flushBuffer

(PECL seaslog &gt;=1.0.0)

SeasLog::flushBuffer — Vacía el buffer de registros, lo vierte en el fichero del appender o lo envía a la API remota con TCP/UDP

### Descripción

public static **SeasLog::flushBuffer**(): [bool](#language.types.boolean)

    Vacía el buffer de registros por [seaslog.appender](#ini.seaslog.appender):
    vierte en el fichero, o envía a la API remota con TCP/UDP.

**Nota**:

     Ver también:
     [seaslog.appender_retry](#ini.seaslog.appender-retry)
     [seaslog.remote_host](#ini.seaslog.remote-host)
     [seaslog.remote_port](#ini.seaslog.remote-port)


### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve TRUE en caso de éxito del vaciado del buffer, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::flushBuffer()**

&lt;?php

SeasLog::info('info log');
SeasLog::debug('debug log');
var_dump(SeasLog::getBuffer());
var_dump(SeasLog::flushBuffer());
var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(79) "2018-07-07 10:47:58 | INFO | 71910 | 5b4029ded6009 | 1530931678.877 | info log
"
[1]=&gt;
string(81) "2018-07-07 10:47:58 | DEBUG | 71910 | 5b4029ded6009 | 1530931678.877 | debug log
"
}
}
bool(true)
array(0) {
}

### Ver también

- [seaslog.use_buffer](#ini.seaslog.use-buffer)

- [seaslog.buffer_size](#ini.seaslog.buffer-size)

- [seaslog.buffer_disabled_in_cli](#ini.seaslog.buffer-disabled-in-cli)

- [SeasLog::getBufferEnabled()](#seaslog.getbufferenabled) - Determina si el búfer está activado

- [SeasLog::getBuffer()](#seaslog.getbuffer) - Devuelve el búfer de registros en memoria como un array

# SeasLog::getBasePath

(PECL seaslog &gt;=1.0.0)

SeasLog::getBasePath — Devuelve la ruta base de SeasLog

### Descripción

public static **Seaslog::getBasePath**(): [string](#language.types.string)

    Utilizar la función **SeasLog::getBasePath()**
    para obtener el valor de [seaslog.default_basepath](#ini.seaslog.default-basepath)
    configurado en php.ini (seaslog.ini).




    Si se utiliza [Seaslog::setBasePath()](#seaslog.setbasepath), el resultado será modificado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve [seaslog.default_basepath](#ini.seaslog.default-basepath) como string.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getBasePath()**

&lt;?php

var_dump(SeasLog::getBasePath());

?&gt;

Resultado del ejemplo anterior es similar a:

string(12) "/var/log/www"

# SeasLog::getBuffer

(PECL seaslog &gt;=1.0.0)

SeasLog::getBuffer — Devuelve el búfer de registros en memoria como un array

### Descripción

public static **SeasLog::getBuffer**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array del búfer de registros en memoria.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getBuffer()**

&lt;?php

var_dump(SeasLog::info('info log'));
var_dump(SeasLog::debug('debug log'));
var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
array(1) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(79) "2018-07-07 10:43:32 | INFO | 71785 | 5b4028d4c58d5 | 1530931412.810 | info log
"
[1]=&gt;
string(81) "2018-07-07 10:43:32 | DEBUG | 71785 | 5b4028d4c58d5 | 1530931412.810 | debug log
"
}
}

### Ver también

- [seaslog.use_buffer](#ini.seaslog.use-buffer)

- [seaslog.buffer_size](#ini.seaslog.buffer-size)

- [seaslog.buffer_disabled_in_cli](#ini.seaslog.buffer-disabled-in-cli)

- [SeasLog::getBufferEnabled()](#seaslog.getbufferenabled) - Determina si el búfer está activado

- [SeasLog::flushBuffer()](#seaslog.flushbuffer) - Vacía el buffer de registros, lo vierte en el fichero del appender o lo envía a la API remota con TCP/UDP

# SeasLog::getBufferEnabled

(PECL seaslog &gt;=1.0.0)

SeasLog::getBufferEnabled — Determina si el búfer está activado

### Descripción

public static **SeasLog::getBufferEnabled**(): [bool](#language.types.boolean)

    Resulta de la combinación de [seaslog.use_buffer](#ini.seaslog.use-buffer)
    y [seaslog.buffer_disabled_in_cli](#ini.seaslog.buffer-disabled-in-cli).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve TRUE si [seaslog.use_buffer](#ini.seaslog.use-buffer) está activado.
Si [seaslog.buffer_disabled_in_cli](#ini.seaslog.buffer-disabled-in-cli) está activado, y el script se ejecuta en CLI,
el parámetro seaslog.use_buffer será ignorado, Seaslog escribirá en el almacén de datos INMEDIATAMENTE.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getBufferEnabled()**

&lt;?php

var_dump(SeasLog::getBufferEnabled());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)

### Ver también

- [seaslog.use_buffer](#ini.seaslog.use-buffer)

- [seaslog.buffer_size](#ini.seaslog.buffer-size)

- [seaslog.buffer_disabled_in_cli](#ini.seaslog.buffer-disabled-in-cli)

- [SeasLog::getBuffer()](#seaslog.getbuffer) - Devuelve el búfer de registros en memoria como un array

- [SeasLog::flushBuffer()](#seaslog.flushbuffer) - Vacía el buffer de registros, lo vierte en el fichero del appender o lo envía a la API remota con TCP/UDP

# SeasLog::getDatetimeFormat

(PECL seaslog &gt;=1.0.0)

SeasLog::getDatetimeFormat — Devuelve el formato de fecha y hora de SeasLog

### Descripción

public static **SeasLog::getDatetimeFormat**(): [string](#language.types.string)

    Devuelve el formato de fecha y hora de SeasLog.
    Utilice la función **SeasLog::getDatetimeFormat()** para obtener el valor de
    [seaslog.default_datetime_format](#ini.seaslog.default-datetime-format)
    configurado en php.ini (seaslog.ini).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el formato de fecha y hora de SeasLog
    [seaslog.default_datetime_format](#ini.seaslog.default-datetime-format).
    Utilice la función [SeasLog::setDatetimeFormat()](#seaslog.setdatetimeformat)
    para modificar este valor.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getDatetimeFormat()**

&lt;?php

var_dump(SeasLog::getDateTimeFormat());
var_dump(SeasLog::setDateTimeFormat('Ymd His'));
var_dump(SeasLog::getDateTimeFormat());

?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "Y-m-d H:i:s"
bool(true)
string(7) "Ymd His"

### Ver también

- [SeasLog::setDatetimeFormat()](#seaslog.setdatetimeformat) - Define el formato de fecha y hora de SeasLog

# SeasLog::getLastLogger

(PECL seaslog &gt;=1.0.0)

SeasLog::getLastLogger — Define el último registrador de SeasLog

### Descripción

public static **SeasLog::getLastLogger**(): [string](#language.types.string)

    Utiliza la función **SeasLog::getLastLogger()**
    para obtener el valor de [seaslog.default_logger](#ini.seaslog.default-logger)
    configurado en php.ini (seaslog.ini).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Utiliza la función [SeasLog::setLogger()](#seaslog.setlogger)
para modificar el valor de la función **SeasLog::getLastLogger()**.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getLastLogger()**

&lt;?php

var_dump(SeasLog::getLastLogger());
SeasLog::setLogger('theNewLogger');
var_dump(SeasLog::getLastLogger());
?&gt;

Resultado del ejemplo anterior es similar a:

string(7) "default"
string(12) "theNewLogger"

### Ver también

- [SeasLog::setLogger()](#seaslog.setlogger) - Define el nombre del registrador de SeasLog

# SeasLog::getRequestID

(PECL seaslog &gt;=1.0.0)

SeasLog::getRequestID — Devuelve las solicitudes diferenciadas por request_id de SeasLog

### Descripción

public static **SeasLog::getRequestID**(): [string](#language.types.string)

    Para diferenciar una sola solicitud, sin invocar la función
    [SeasLog::setRequestId()](#seaslog.setrequestid),
    el valor único generado por la función interna `static char *get_uniqid ()`
    se utiliza durante la inicialización de la solicitud.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cadena generada por la función interna `static char *get_uniqid ()`,
o definida por la función [SeasLog::setRequestId()](#seaslog.setrequestid).

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getRequestID()**

&lt;?php

var*dump(SeasLog::getRequestID());
var_dump(SeasLog::setRequestID('reqeust_id_test*'.time()));
var_dump(SeasLog::getRequestID());

?&gt;

Resultado del ejemplo anterior es similar a:

string(13) "5b3f21a209519"
bool(true)
string(26) "reqeust_id_test_1530864034"

### Ver también

- [SeasLog::setRequestID()](#seaslog.setrequestid) - Define los request_id de las peticiones diferenciadas de SeasLog

- La variable `%Q` en
  [Tabla de Variables Predeterminadas de Seaslog](#ini.seaslog.default-template).

# SeasLog::getRequestVariable

(PECL seaslog &gt;=1.9.0)

SeasLog::getRequestVariable — Devuelve la variable de petición de SeasLog

### Descripción

public static **SeasLog::getRequestVariable**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Devuelve la variable de petición de SeasLog.

### Parámetros

    key


      Un entero de constante.



       - [SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT](#constant.seaslog-request-variable-domain-port)

       - [SEASLOG_REQUEST_VARIABLE_REQUEST_URI](#constant.seaslog-request-variable-request-uri)

       - [SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD](#constant.seaslog-request-variable-request-method)

       - [SEASLOG_REQUEST_VARIABLE_CLIENT_IP](#constant.seaslog-request-variable-client-ip)




### Valores devueltos

Devuelve el valor de la variable de petición en caso de éxito.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::getRequestVariable()**

&lt;?php

$sDomainPort = 'domain:port';
$sRequestUri = 'uri';
$sRequestMethod = 'method';
$sClientIp = 'client_ip';

$iErrorKey = 1000;

$oSeasLog = new SeasLog();

var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT, $sDomainPort));
var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_URI, $sRequestUri));
var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD, $sRequestMethod));
var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_CLIENT_IP, $sClientIp));

var_dump($oSeasLog-&gt;setRequestVariable($iErrorKey,NULL));

var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT) == $sDomainPort);
var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_URI) == $sRequestUri);
var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD) == $sRequestMethod);
var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_CLIENT_IP) == $sClientIp);

var_dump($oSeasLog-&gt;getRequestVariable($iErrorKey));

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)

### Ver también

- [SeasLog::setRequestVariable()](#seaslog.setrequestvariable) - Define manualmente la variable de petición de SeasLog

# SeasLog::info

(PECL seaslog &gt;=1.0.0)

SeasLog::info — Registra la información de registro de nivel info

### Descripción

public static **SeasLog::info**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información de registro de nivel info.

**Nota**:

        "INFO" - Eventos interesantes. Destaca el proceso en curso de la aplicación.


### Parámetros

    message


      El mensaje de registro.






    content


      El `message` contiene espacios reservados que los implementadores reemplazan por valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `journal` pasado por el tercer parámetro sería utilizado ahora,
      como un journal temporal, cuando la función SeasLog::setLogger() es llamada en el contenido previo.
      Si `logger` es NULL o "", SeasLog utilizará el último journal definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito del registro de la información de registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::info()**

&lt;?php

var_dump(SeasLog::info('log message'));

//con contenido
var_dump(SeasLog::info('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con journal temporal
var_dump(SeasLog::info('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | INFO | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | INFO | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | INFO | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::log

(PECL seaslog &gt;=1.0.0)

SeasLog::log — La función de registro de la grabación común

### Descripción

public static **SeasLog::log**(
    [string](#language.types.string) $level,
    [string](#language.types.string) $message = ?,
    [array](#language.types.array) $content = ?,
    [string](#language.types.string) $logger = ?
): [bool](#language.types.boolean)

    La función de registro de la grabación común.

### Parámetros

    level


      Utilizar los niveles en:



        - [SEASLOG_DEBUG](#constant.seaslog-debug)

        - [SEASLOG_INFO](#constant.seaslog-info)

        - [SEASLOG_NOTICE](#constant.seaslog-notice)

        - [SEASLOG_WARNING](#constant.seaslog-warning)

        - [SEASLOG_ERROR](#constant.seaslog-error)

        - [SEASLOG_CRITICAL](#constant.seaslog-critical)

        - [SEASLOG_ALERT](#constant.seaslog-alert)

        - [SEASLOG_EMERGENCY](#constant.seaslog-emergency)


      O se puede crear un nuevo nivel de autoayuda.




    message


      El mensaje del registro.






    content


      El `message` contiene marcadores de posición que los implementadores reemplazan con valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado por el tercer argumento sería utilizado a partir de ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información de registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::log()**

&lt;?php

var_dump(SeasLog::log(SEASLOG_INFO,'info log'));
var_dump(SeasLog::getBuffer());

//crear un nuevo nivel de autoayuda.
var_dump(SeasLog::log('MySelfLevel','info log'));
var_dump(SeasLog::getBuffer());

//con `content`
var_dump(SeasLog::log('MySelfLevel','info log {NAME}',array('NAME' =&gt; 'neeke')));
var_dump(SeasLog::getBuffer());

//con `logger`
var_dump(SeasLog::log('MySelfLevel','info log {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));
var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
array(1) {
["/var/log/www/default/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(79) "2018-07-07 11:12:37 | INFO | 72427 | 5b402fa56a2ea | 1530933157.436 | info log
"
}
}

bool(true)
array(1) {
["/var/log/www/default/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(86) "2018-07-07 11:13:59 | MySelfLevel | 72470 | 5b402ff781c5e | 1530933239.532 | info log
"
}
}

bool(true)
array(1) {
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:28:12 | MySelfLevel | 72833 | 5b40334ce6a2f | 1530934092.946 | info log neeke
"
}
}

bool(true)
array(1) {
["/var/log/www/default/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(86) "2018-07-07 11:20:12 | INFO | 72616 | 5b40316c3641e | 1530933612.222 | info log neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

# SeasLog::notice

(PECL seaslog &gt;=1.0.0)

SeasLog::notice — Registra la información de registro de notificación

### Descripción

public static **SeasLog::notice**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información de registro de notificación.

**Nota**:

        "NOTICE" - Eventos normales pero significativos. La información que es más importante que el nivel INFO durante la ejecución.


### Parámetros

    message


      El mensaje del registro.






    content


      El `message` contiene marcadores de posición que los implementadores reemplazan por valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado por el tercer parámetro sería utilizado a partir de ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información del registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::notice()**

&lt;?php

var_dump(SeasLog::notice('log message'));

//con contenido
var_dump(SeasLog::notice('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::notice('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | NOTICE | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | NOTICE | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | NOTICE | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::warning()](#seaslog.warning) - Registra la información de registro de advertencia

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

# SeasLog::setBasePath

(PECL seaslog &gt;=1.0.0)

SeasLog::setBasePath — Define la ruta de base de SeasLog

### Descripción

public static **SeasLog::setBasePath**([string](#language.types.string) $base_path): [bool](#language.types.boolean)

    Define la ruta de base de SeasLog.

### Parámetros

    base_path


      Una string.


### Valores devueltos

Devuelve TRUE en caso de éxito al definir la ruta de base, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::setBasePath()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# SeasLog::setDatetimeFormat

(PECL seaslog &gt;=1.0.0)

SeasLog::setDatetimeFormat — Define el formato de fecha y hora de SeasLog

### Descripción

public static **SeasLog::setDatetimeFormat**([string](#language.types.string) $format): [bool](#language.types.boolean)

    Define el estilo de formato de fecha y hora de SeasLog.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    format


      String. Como `Y-m-d H:i:s` o `Ymd His`. Ver también el primer argumento `format` en [date()](#function.date).


### Valores devueltos

Devuelve TRUE en caso de éxito al definir el formato de fecha y hora, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::setDatetimeFormat()**

&lt;?php

var_dump(SeasLog::setDateTimeFormat('Ymd His'));

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)

### Ver también

- [SeasLog::getDateTimeFormat()](#seaslog.getdatetimeformat) - Devuelve el formato de fecha y hora de SeasLog

# SeasLog::setLogger

(PECL seaslog &gt;=1.0.0)

SeasLog::setLogger — Define el nombre del registrador de SeasLog

### Descripción

public static **SeasLog::setLogger**([string](#language.types.string) $logger): [bool](#language.types.boolean)

    Utilizar la función **SeasLog::setLogger()**
    para definir el valor de la función [SeasLog::getLastLogger()](#seaslog.getlastlogger).
    Esto significa que SeasLog registrará la información del registro en el directorio del registrador.

### Parámetros

    logger


      El nombre del registrador.


### Valores devueltos

Devuelve TRUE en caso de éxito en la creación del directorio del registrador, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::setLogger()**

&lt;?php

var_dump(SeasLog::setLogger('testModule/testLogger'));

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)

### Ver también

- [SeasLog::getLastLogger()](#seaslog.getlastlogger) - Define el último registrador de SeasLog

- [SeasLog::closeLoggerStream()](#seaslog.closeloggerstream) - Libera manualmente el flujo de registro del registro

# SeasLog::setRequestID

(PECL seaslog &gt;=1.0.0)

SeasLog::setRequestID — Define los request_id de las peticiones diferenciadas de SeasLog

### Descripción

public static **SeasLog::setRequestID**([string](#language.types.string) $request_id): [bool](#language.types.boolean)

    Para distinguir una sola petición, sin invocar la función
    **SeasLog::setRequestId()**,
    el valor único generado por la función interna `static char *get_uniqid ()
    se utiliza durante la inicialización de la petición.

### Parámetros

    request_id


      String.


### Valores devueltos

Devuelve TRUE en caso de éxito en la definición, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::setRequestID()**

&lt;?php

var_dump(SeasLog::setRequestID(time() . rand()));

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)

### Ver también

- [SeasLog::getRequestID()](#seaslog.getrequestid) - Devuelve las solicitudes diferenciadas por request_id de SeasLog

# SeasLog::setRequestVariable

(PECL seaslog &gt;=1.9.0)

SeasLog::setRequestVariable — Define manualmente la variable de petición de SeasLog

### Descripción

public static **SeasLog::setRequestVariable**([int](#language.types.integer) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

Define manualmente la variable de petición de SeasLog.

### Parámetros

    key


      Constante int.



       - [SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT](#constant.seaslog-request-variable-domain-port)

       - [SEASLOG_REQUEST_VARIABLE_REQUEST_URI](#constant.seaslog-request-variable-request-uri)

       - [SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD](#constant.seaslog-request-variable-request-method)

       - [SEASLOG_REQUEST_VARIABLE_CLIENT_IP](#constant.seaslog-request-variable-client-ip)






    value


      El valor de la variable de petición.


### Valores devueltos

Devuelve TRUE en caso de éxito de la definición, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::setRequestVariable()**

&lt;?php

$sDomainPort = 'domain:port';
$sRequestUri = 'uri';
$sRequestMethod = 'method';
$sClientIp = 'client_ip';

$iErrorKey = 1000;

$oSeasLog = new SeasLog();

var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT, $sDomainPort));
var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_URI, $sRequestUri));
var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD, $sRequestMethod));
var_dump($oSeasLog-&gt;setRequestVariable(SEASLOG_REQUEST_VARIABLE_CLIENT_IP, $sClientIp));

var_dump($oSeasLog-&gt;setRequestVariable($iErrorKey,NULL));

var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_DOMAIN_PORT) == $sDomainPort);
var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_URI) == $sRequestUri);
var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_REQUEST_METHOD) == $sRequestMethod);
var_dump($oSeasLog-&gt;getRequestVariable(SEASLOG_REQUEST_VARIABLE_CLIENT_IP) == $sClientIp);

var_dump($oSeasLog-&gt;getRequestVariable($iErrorKey));

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)

### Ver también

- [SeasLog::getRequestVariable()](#seaslog.getrequestvariable) - Devuelve la variable de petición de SeasLog

# SeasLog::warning

(PECL seaslog &gt;=1.0.0)

SeasLog::warning — Registra la información de registro de advertencia

### Descripción

public static **SeasLog::warning**([string](#language.types.string) $message, [array](#language.types.array) $content = ?, [string](#language.types.string) $logger = ?): [bool](#language.types.boolean)

    Registra la información de registro de advertencia.

**Nota**:

        "WARNING" - Ocurrencias excepcionales que no son errores.
        Información potencialmente aberrante que requiere atención y debe ser reparada.


### Parámetros

    message


      El mensaje del registro.






    content


      El `message` contiene marcadores de posición que los implementadores reemplazan con valores del array de contenido.
      Por ejemplo, si `message` es `log info from {NAME}` y `content` es `array('NAME' =&gt; neeke)`,
      la información de registro será `log info from neeke`.






    logger


      El `registro` pasado como tercer argumento sería utilizado ahora,
      como un registro temporal, cuando la función SeasLog::setLogger() es llamada en el contenido anterior.
      Si `logger` es NULL o "", SeasLog utilizará el último registro definido por [SeasLog::setLogger()](#seaslog.setlogger).


### Valores devueltos

Devuelve TRUE en caso de éxito en el registro de la información de registro, FALSE en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de SeasLog::warning()**

&lt;?php

var_dump(SeasLog::warning('log message'));

//con contenido
var_dump(SeasLog::warning('log message from {NAME}',array('NAME' =&gt; 'neeke')));

//con registro temporal
var_dump(SeasLog::warning('log message from {NAME}',array('NAME' =&gt; 'neeke'),'tmp_logger'));

var_dump(SeasLog::getBuffer());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
array(2) {
["/var/log/www/default/20180707.log"]=&gt;
array(2) {
[0]=&gt;
string(81) "2018-07-07 11:45:49 | WARNING | 73263 | 5b40376d1067c | 1530935149.68 | log message
"
[1]=&gt;
string(92) "2018-07-07 11:45:49 | WARNING | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
["/var/log/www/tmp_logger/20180707.log"]=&gt;
array(1) {
[0]=&gt;
string(92) "2018-07-07 11:45:49 | WARNING | 73263 | 5b40376d1067c | 1530935149.68 | log message from neeke
"
}
}

### Ver también

- [seaslog.default_template](#ini.seaslog.default-template)

- [SeasLog::debug()](#seaslog.debug) - Registra la información de depuración

- [SeasLog::info()](#seaslog.info) - Registra la información de registro de nivel info

- [SeasLog::notice()](#seaslog.notice) - Registra la información de registro de notificación

- [SeasLog::error()](#seaslog.error) - Registra la información del registro de errores

- [SeasLog::critical()](#seaslog.critical) - Registra la información de registro crítica

- [SeasLog::alert()](#seaslog.alert) - Registra la información del registro de alerta

- [SeasLog::emergency()](#seaslog.emergency) - Registra la información del registro de emergencia

- [SeasLog::log()](#seaslog.log) - La función de registro de la grabación común

## Tabla de contenidos

- [SeasLog::alert](#seaslog.alert) — Registra la información del registro de alerta
- [SeasLog::analyzerCount](#seaslog.analyzercount) — Devuelve el número de registros por nivel, ruta de acceso del registro y palabra clave
- [SeasLog::analyzerDetail](#seaslog.analyzerdetail) — Devuelve los detalles del registro por nivel, ruta de registro, palabra clave, inicio, límite, orden
- [SeasLog::closeLoggerStream](#seaslog.closeloggerstream) — Libera manualmente el flujo de registro del registro
- [SeasLog::\_\_construct](#seaslog.construct) — Descripción
- [SeasLog::critical](#seaslog.critical) — Registra la información de registro crítica
- [SeasLog::debug](#seaslog.debug) — Registra la información de depuración
- [SeasLog::\_\_destruct](#seaslog.destruct) — Descripción
- [SeasLog::emergency](#seaslog.emergency) — Registra la información del registro de emergencia
- [SeasLog::error](#seaslog.error) — Registra la información del registro de errores
- [SeasLog::flushBuffer](#seaslog.flushbuffer) — Vacía el buffer de registros, lo vierte en el fichero del appender o lo envía a la API remota con TCP/UDP
- [SeasLog::getBasePath](#seaslog.getbasepath) — Devuelve la ruta base de SeasLog
- [SeasLog::getBuffer](#seaslog.getbuffer) — Devuelve el búfer de registros en memoria como un array
- [SeasLog::getBufferEnabled](#seaslog.getbufferenabled) — Determina si el búfer está activado
- [SeasLog::getDatetimeFormat](#seaslog.getdatetimeformat) — Devuelve el formato de fecha y hora de SeasLog
- [SeasLog::getLastLogger](#seaslog.getlastlogger) — Define el último registrador de SeasLog
- [SeasLog::getRequestID](#seaslog.getrequestid) — Devuelve las solicitudes diferenciadas por request_id de SeasLog
- [SeasLog::getRequestVariable](#seaslog.getrequestvariable) — Devuelve la variable de petición de SeasLog
- [SeasLog::info](#seaslog.info) — Registra la información de registro de nivel info
- [SeasLog::log](#seaslog.log) — La función de registro de la grabación común
- [SeasLog::notice](#seaslog.notice) — Registra la información de registro de notificación
- [SeasLog::setBasePath](#seaslog.setbasepath) — Define la ruta de base de SeasLog
- [SeasLog::setDatetimeFormat](#seaslog.setdatetimeformat) — Define el formato de fecha y hora de SeasLog
- [SeasLog::setLogger](#seaslog.setlogger) — Define el nombre del registrador de SeasLog
- [SeasLog::setRequestID](#seaslog.setrequestid) — Define los request_id de las peticiones diferenciadas de SeasLog
- [SeasLog::setRequestVariable](#seaslog.setrequestvariable) — Define manualmente la variable de petición de SeasLog
- [SeasLog::warning](#seaslog.warning) — Registra la información de registro de advertencia

- [Introducción](#intro.seaslog)
- [Instalación/Configuración](#seaslog.setup)<li>[Requerimientos](#seaslog.requirements)
- [Instalación](#seaslog.installation)
- [Configuración en tiempo de ejecución](#seaslog.configuration)
- [Tipos de recursos](#seaslog.resources)
  </li>- [Constantes predefinidas](#seaslog.constants)
- [Ejemplos](#seaslog.examples)
- [Funciones de Seaslog](#ref.seaslog)<li>[seaslog_get_author](#function.seaslog-get-author) — Devuelve el autor de SeasLog.
- [seaslog_get_version](#function.seaslog-get-version) — Devuelve la versión de SeasLog.
  </li>- [SeasLog](#class.seaslog) — La clase SeasLog<li>[SeasLog::alert](#seaslog.alert) — Registra la información del registro de alerta
- [SeasLog::analyzerCount](#seaslog.analyzercount) — Devuelve el número de registros por nivel, ruta de acceso del registro y palabra clave
- [SeasLog::analyzerDetail](#seaslog.analyzerdetail) — Devuelve los detalles del registro por nivel, ruta de registro, palabra clave, inicio, límite, orden
- [SeasLog::closeLoggerStream](#seaslog.closeloggerstream) — Libera manualmente el flujo de registro del registro
- [SeasLog::\_\_construct](#seaslog.construct) — Descripción
- [SeasLog::critical](#seaslog.critical) — Registra la información de registro crítica
- [SeasLog::debug](#seaslog.debug) — Registra la información de depuración
- [SeasLog::\_\_destruct](#seaslog.destruct) — Descripción
- [SeasLog::emergency](#seaslog.emergency) — Registra la información del registro de emergencia
- [SeasLog::error](#seaslog.error) — Registra la información del registro de errores
- [SeasLog::flushBuffer](#seaslog.flushbuffer) — Vacía el buffer de registros, lo vierte en el fichero del appender o lo envía a la API remota con TCP/UDP
- [SeasLog::getBasePath](#seaslog.getbasepath) — Devuelve la ruta base de SeasLog
- [SeasLog::getBuffer](#seaslog.getbuffer) — Devuelve el búfer de registros en memoria como un array
- [SeasLog::getBufferEnabled](#seaslog.getbufferenabled) — Determina si el búfer está activado
- [SeasLog::getDatetimeFormat](#seaslog.getdatetimeformat) — Devuelve el formato de fecha y hora de SeasLog
- [SeasLog::getLastLogger](#seaslog.getlastlogger) — Define el último registrador de SeasLog
- [SeasLog::getRequestID](#seaslog.getrequestid) — Devuelve las solicitudes diferenciadas por request_id de SeasLog
- [SeasLog::getRequestVariable](#seaslog.getrequestvariable) — Devuelve la variable de petición de SeasLog
- [SeasLog::info](#seaslog.info) — Registra la información de registro de nivel info
- [SeasLog::log](#seaslog.log) — La función de registro de la grabación común
- [SeasLog::notice](#seaslog.notice) — Registra la información de registro de notificación
- [SeasLog::setBasePath](#seaslog.setbasepath) — Define la ruta de base de SeasLog
- [SeasLog::setDatetimeFormat](#seaslog.setdatetimeformat) — Define el formato de fecha y hora de SeasLog
- [SeasLog::setLogger](#seaslog.setlogger) — Define el nombre del registrador de SeasLog
- [SeasLog::setRequestID](#seaslog.setrequestid) — Define los request_id de las peticiones diferenciadas de SeasLog
- [SeasLog::setRequestVariable](#seaslog.setrequestvariable) — Define manualmente la variable de petición de SeasLog
- [SeasLog::warning](#seaslog.warning) — Registra la información de registro de advertencia
  </li>
