# Network

# Introducción

Provee diversas funciones de red.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#network.requirements)
- [Tipos de recursos](#network.resources)

    ## Requerimientos

    Las funciones [checkdnsrr()](#function.checkdnsrr), [getmxrr()](#function.getmxrr) y
    [dns_get_record()](#function.dns-get-record) requieren Bind bajo Linux.

    ## Tipos de recursos

    Esta extensión define un recurso de puntero de fichero, devuelto
    por las funciones [fsockopen()](#function.fsockopen) y [pfsockopen()](#function.pfsockopen).

# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

**
flags disponibles para
[openlog()](#function.openlog)
**

    **[LOG_CONS](#constant.log-cons)**
    ([int](#language.types.integer))



     Si ocurre un error al enviar los datos al registro del sistema,
     escribir directamente en la consola del sistema.






    **[LOG_NDELAY](#constant.log-ndelay)**
    ([int](#language.types.integer))



     Abrir inmediatamente la conexión al registro.






    **[LOG_ODELAY](#constant.log-odelay)**
    ([int](#language.types.integer))



     Retrasar la apertura de la conexión hasta el registro del primer mensaje.
     Este es el comportamiento por omisión.






    **[LOG_NOWAIT](#constant.log-nowait)**
    ([int](#language.types.integer))









    **[LOG_PERROR](#constant.log-perror)**
    ([int](#language.types.integer))



     Registrar también los mensajes en **[STDERR](#constant.stderr)**.






    **[LOG_PID](#constant.log-pid)**
    ([int](#language.types.integer))



     Incluir el ID de proceso (PID) con cada mensaje de registro.

**
facility disponibles para
[openlog()](#function.openlog)
**

    **[LOG_AUTH](#constant.log-auth)**
    ([int](#language.types.integer))



     Para los mensajes de seguridad o autorización.

    **Nota**:

      Utilizar **[LOG_AUTHPRIV](#constant.log-authpriv)** en su lugar cuando esté disponible.









    **[LOG_AUTHPRIV](#constant.log-authpriv)**
    ([int](#language.types.integer))



     Para los mensajes de seguridad o autorización privados.






    **[LOG_CRON](#constant.log-cron)**
    ([int](#language.types.integer))



     Para los mensajes del demonio de planificación.
     Por ejemplo, **cron** o **at**.






    **[LOG_DAEMON](#constant.log-daemon)**
    ([int](#language.types.integer))



     Para los mensajes de los demonios del sistema.






    **[LOG_KERN](#constant.log-kern)**
    ([int](#language.types.integer))



     Para los mensajes del núcleo.






    **[LOG_LOCAL0](#constant.log-local0)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL1](#constant.log-local1)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL2](#constant.log-local2)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL3](#constant.log-local3)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL4](#constant.log-local4)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL5](#constant.log-local5)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL6](#constant.log-local6)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LOCAL7](#constant.log-local7)**
    ([int](#language.types.integer))



     Reservado para uso local.

    **Advertencia**

      No disponible en Windows.









    **[LOG_LPR](#constant.log-lpr)**
    ([int](#language.types.integer))



     Para los mensajes provenientes del subsistema de la impresora en línea.






    **[LOG_MAIL](#constant.log-mail)**
    ([int](#language.types.integer))



     Para los mensajes provenientes del subsistema de mensajería.






    **[LOG_NEWS](#constant.log-news)**
    ([int](#language.types.integer))



     Para los mensajes provenientes del subsistema de noticias USENET.






    **[LOG_SYSLOG](#constant.log-syslog)**
    ([int](#language.types.integer))



     Para los mensajes generados internamente por **syslogd**.






    **[LOG_USER](#constant.log-user)**
    ([int](#language.types.integer))



     Para los mensajes genéricos a nivel de usuario.






    **[LOG_UUCP](#constant.log-uucp)**
    ([int](#language.types.integer))



     Para los mensajes provenientes del subsistema UUCP.

**
Prioridades disponibles para
[syslog()](#function.syslog)
**

Las constantes de prioridad se listan desde la urgencia hasta los mensajes de depuración.

    **[LOG_EMERG](#constant.log-emerg)**
    ([int](#language.types.integer))



     Urgencia, el sistema es inutilizable.
     Esto corresponde a una condición de pánico.
     Normalmente se difunde a todos los procesos.






    **[LOG_ALERT](#constant.log-alert)**
    ([int](#language.types.integer))



     Alerta, se requiere una acción inmediata.
     Por ejemplo, una base de datos del sistema corrupta.






    **[LOG_CRIT](#constant.log-crit)**
    ([int](#language.types.integer))



     Crítico, se requiere una acción.
     Por ejemplo, un error de hardware.






    **[LOG_ERR](#constant.log-err)**
    ([int](#language.types.integer))



     Mensajes de error.






    **[LOG_WARNING](#constant.log-warning)**
    ([int](#language.types.integer))



     Mensajes de advertencia.






    **[LOG_NOTICE](#constant.log-notice)**
    ([int](#language.types.integer))



     Mensajes de notificación, correspondientes a condiciones que no son errores,
     pero que pueden requerir un tratamiento especial.






    **[LOG_INFO](#constant.log-info)**
    ([int](#language.types.integer))



     Mensajes informativos.






    **[LOG_DEBUG](#constant.log-debug)**
    ([int](#language.types.integer))



     Mensajes de depuración que contienen información generalmente útil solo
     durante la depuración de un programa.

**
Tipos disponibles para
[dns_get_record()](#function.dns-get-record)
**

    **[DNS_ANY](#constant.dns-any)**
    ([int](#language.types.integer))



     Todo registro de recurso.
     En la mayoría de los sistemas, esto devuelve todos los registros de recursos,
     sin embargo, debido a las particularidades de rendimiento de
     libresolv entre plataformas, esto no está garantizado.


     El más lento **[DNS_ALL](#constant.dns-all)** recolectará todos los registros de manera más fiable.






    **[DNS_ALL](#constant.dns-all)**
    ([int](#language.types.integer))



     Consulta iterativa al servidor de nombres para cada tipo de registro disponible.






    **[DNS_A](#constant.dns-a)**
    ([int](#language.types.integer))



     Registro de dirección IPv4.






    **[DNS_AAAA](#constant.dns-aaaa)**
    ([int](#language.types.integer))



     Recurso de dirección IPv6.






    **[DNS_A6](#constant.dns-a6)**
    ([int](#language.types.integer))



     Definido en las primeras especificaciones IPv6, pero degradado a histórico por
     [» RFC 6563](https://datatracker.ietf.org/doc/html/rfc6563).






    **[DNS_CAA](#constant.dns-caa)**
    ([int](#language.types.integer))



     Recurso de autorización de autoridad de certificación.
     Disponible a partir de PHP 7.0.16 y 7.1.2.

    **Advertencia**

      No disponible en Windows.









    **[DNS_CNAME](#constant.dns-cname)**
    ([int](#language.types.integer))



     Recurso de alias (Nombre canónico).






    **[DNS_HINFO](#constant.dns-hinfo)**
    ([int](#language.types.integer))



     Recurso de información del host.
     Para más explicaciones y significados de estos valores, consulte la página de IANA sobre
     [» Nombres de sistemas operativos](http://www.iana.org/assignments/operating-system-names).






    **[DNS_MX](#constant.dns-mx)**
    ([int](#language.types.integer))



     Recurso de intercambiador de correo.






    **[DNS_NAPTR](#constant.dns-naptr)**
    ([int](#language.types.integer))



     Puntero de autoridad de nombre.






    **[DNS_NS](#constant.dns-ns)**
    ([int](#language.types.integer))



     Recurso del servidor de nombres autoritario.






    **[DNS_PTR](#constant.dns-ptr)**
    ([int](#language.types.integer))



     Recurso de puntero.






    **[DNS_SOA](#constant.dns-soa)**
    ([int](#language.types.integer))



     Recurso de inicio de autoridad.






    **[DNS_SRV](#constant.dns-srv)**
    ([int](#language.types.integer))



     Localizador de servicio.






    **[DNS_TXT](#constant.dns-txt)**
    ([int](#language.types.integer))



     Recurso de texto.

# Funciones de red

# checkdnsrr

(PHP 4, PHP 5, PHP 7, PHP 8)

checkdnsrr — Resolución DNS de una dirección IP

### Descripción

**checkdnsrr**([string](#language.types.string) $hostname, [string](#language.types.string) $type = "MX"): [bool](#language.types.boolean)

Busca el registro DNS de tipo
type correspondiente al host
hostname.

### Parámetros

     hostname


       hostname puede ser una dirección IP en formato
       numérico o un nombre de host.






     type


       type puede ser uno de los siguientes valores: A, MX, NS, SOA,
       PTR, CNAME, AAAA, A6, SRV, NAPTR, TXT o ANY.





### Valores devueltos

Devuelve **[true](#constant.true)** si se ha encontrado un registro, y **[false](#constant.false)** en caso de error o si no se ha encontrado ningún registro.

### Notas

**Nota**:

    Para compatibilidad con Windows antes de su implementación,
    pruebe la clase [» PEAR](https://pear.php.net/):
    [» Net_DNS](https://pear.php.net/package/Net_DNS).

### Ver también

    - [dns_get_record()](#function.dns-get-record) - Lee los datos DNS asociados a un host

    - [getmxrr()](#function.getmxrr) - Devuelve los registros MX de un host

    - [gethostbyaddr()](#function.gethostbyaddr) - Devuelve el nombre de host correspondiente a una IP

    - [gethostbyname()](#function.gethostbyname) - Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado

    - [gethostbynamel()](#function.gethostbynamel) - Devuelve la lista de direcciones IPv4 correspondientes a un host

    - la página del manual man named(8)

# closelog

(PHP 4, PHP 5, PHP 7, PHP 8)

closelog — Cierra la conexión al registro del sistema

### Descripción

**closelog**(): [true](#language.types.singleton)

**closelog()** cierra el puntero utilizado para
escribir en el registro del sistema. El uso de
**closelog()** es opcional.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ver también

    - [syslog()](#function.syslog) - Genera un mensaje en el historial del sistema

    - [openlog()](#function.openlog) - Abre la conexión al historial del sistema

# dns_check_record

(PHP 5, PHP 7, PHP 8)

dns_check_record — Alias de [checkdnsrr()](#function.checkdnsrr)

### Descripción

Esta función es un alias de:
[checkdnsrr()](#function.checkdnsrr).

# dns_get_mx

(PHP 5, PHP 7, PHP 8)

dns_get_mx — Alias de [getmxrr()](#function.getmxrr)

### Descripción

Esta función es un alias de: [getmxrr()](#function.getmxrr).

# dns_get_record

(PHP 5, PHP 7, PHP 8)

dns_get_record — Lee los datos DNS asociados a un host

### Descripción

**dns_get_record**(
    [string](#language.types.string) $hostname,
    [int](#language.types.integer) $type = **[DNS_ANY](#constant.dns-any)**,
    [array](#language.types.array) &amp;$authoritative_name_servers = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$additional_records = **[null](#constant.null)**,
    [bool](#language.types.boolean) $raw = **[false](#constant.false)**
): [array](#language.types.array)|[false](#language.types.singleton)

Lee los datos DNS asociados al host hostname.

### Parámetros

     hostname


       hostname debe ser un nombre de host DNS válido, como
       www.example.com. Las resoluciones inversas pueden
       realizarse con la notación in-addr.arpa, pero la función
       [gethostbyaddr()](#function.gethostbyaddr) es más eficiente para realizar resoluciones inversas.



      **Nota**:



        En términos de estándares DNS, las direcciones de correo electrónico se proporcionan en el formato
        usuario.host (por ejemplo: webmaster.example.com
        en lugar del formato webmaster@example.com). No se debe olvidar
        verificar esta dirección y modificarla si es necesario antes de pasarla a la función [mail()](#function.mail).







     type


       Por omisión, **dns_get_record()** buscará todos los
       recursos asociados a hostname.
       Para limitar la consulta, se debe utilizar una de las constantes
       **[DNS_*](#constant.dns-any)**.






     authoritative_name_servers


       Pasado por referencia, y, si se proporciona, recibirá los
       registros de recursos para los
       *Authoritative Name Servers*.






     additional_records


       Pasado por referencia, y, si se proporciona, recibirá todos los
       *registros adicionales*.






     raw


       El type será interpretado como un ID de tipo DNS sin tratar
       (no se pueden utilizar las constantes DNS_*).
       El valor de retorno contendrá una clave data,
       que debe ser analizada manualmente.





### Valores devueltos

**dns_get_record()** retorna un array de arrays
asociativos, o **[false](#constant.false)** si ocurre un error.
Cada array contiene _como mínimo_ los índices siguientes:

    <caption>**Atributos básicos DNS**</caption>



       Atributo
       Significado






       host

        El registro del espacio de nombres DNS que es descrito por los otros
        datos.




       class

        **dns_get_record()** solo retorna la clase de registro
        Internet y, como tal, este índice siempre valdrá IN.




       type

        String que contiene el tipo de registro. Los atributos
        adicionales también estarán disponibles en el array según el
        valor de este tipo. Consulte la tabla a continuación.




       ttl

        "Time To Live": duración antes de la expiración del registro.
        Este valor es *diferente* de la duración original antes de la expiración,
        sino que es este valor menos la duración desde la última consulta
        al servidor DNS responsable.












    <caption>**Otros índices disponibles según el tipo DNS**</caption>



       Tipo
       Valor adicional






       A

        ip: una dirección IPv4, en formato numérico.




       MX

        pri: prioridad del servidor de correo.
        Los números bajos indican una prioridad alta.
        target: FQDN del servidor de correo.
        Ver también [dns_get_mx()](#function.dns-get-mx).




       CNAME

        target: FQDN del nombre del espacio DNS que sirve
        como alias para este registro.




       NS

        target: FQDN del nombre del servidor que es responsable
        de este nombre de dominio.




       PTR

        target: nombre de dominio al que apunta este registro.




       TXT

        txt: string asociado arbitrariamente
        a este registro.




       HINFO

        cpu: número IANA que designa el procesador de la máquina
        referenciada por este registro.
        os: número IANA que designa el sistema operativo
        de la máquina referenciada por este registro.
        Ver [» Operating System Names](http://www.iana.org/assignments/operating-system-names)
        para conocer el significado de estos valores.




       CAA

        flags: Un campo de bits de un octeto: actualmente solo el bit 0 está definido,
        significando 'critical' (crítico); los otros bits están reservados y deben ser ignorados.
        tag: El nombre del tag CAA (string alfanumérico ASCII).
        value: El valor del tag CAA (string binario, puede utilizar subformatos).
        Para más información ver: [» RFC 6844](https://datatracker.ietf.org/doc/html/rfc6844)




       SOA

        mname: FQDN de la fuente de este registro.
        rname: dirección de correo electrónico del contacto administrativo de
        este dominio.
        serial: número de serie del nombre de dominio.
        refresh: intervalo de actualización (en segundos)
        que los servidores de nombres secundarios deben utilizar para almacenar en caché este nombre de dominio.
        retry: duración (en segundos) de espera después de una actualización
        fallida, antes de hacer un segundo intento.
        expire: duración máxima (en segundos) de conservación
        de una copia de los datos de zona sin poder hacer una actualización.
        minimum-ttl: duración mínima (en segundos) durante la cual un
        cliente conserva datos de zona antes de que envíe una nueva
        consulta. Esta configuración puede ser anulada por otros registros.




       AAAA

        ipv6: dirección IPv6




       A6

        masklen: longitud (en octetos) a heredar desde
        el objetivo especificado por chain.
        ipv6: dirección para que este registro específico se fusione
        con chain.
        chain: el registro padre a fusionar con los datos
        ipv6.




       SRV

        pri: (prioridad) las prioridades más bajas deben
        ser utilizadas primero.
        weight: clasificación para elegir aleatoriamente entre los
        servidores targets.
        target y port: nombre de host y
        puerto donde el servicio está disponible.
        Para más información, ver: [» RFC 2782](https://datatracker.ietf.org/doc/html/rfc2782)




       NAPTR

        order y pref: equivalente a
        pri y weight arriba.
        flags, services, regex,
        y replacement: parámetros como se definen
        en la [» RFC 2915](https://datatracker.ietf.org/doc/html/rfc2915).





### Historial de cambios

       Versión
       Descripción






       7.0.16, 7.1.2

        Se agregó soporte para registros de tipo CAA.





### Ejemplos

    **Ejemplo #1 Ejemplo con dns_get_record()**

&lt;?php
$result = dns_get_record("php.net");
print_r($result);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[host] =&gt; php.net
[type] =&gt; MX
[pri] =&gt; 5
[target] =&gt; pair2.php.net
[class] =&gt; IN
[ttl] =&gt; 6765
)

    [1] =&gt; Array
        (
            [host] =&gt; php.net
            [type] =&gt; A
            [ip] =&gt; 64.246.30.37
            [class] =&gt; IN
            [ttl] =&gt; 8125
        )

)

    **Ejemplo #2 Ejemplo con dns_get_record()** y DNS_ANY



     Como es muy común buscar la IP de un servidor,
     una vez que el campo MX ha sido resuelto, **dns_get_record()**
     retornará también un array en el parámetro additional_records
     que contendrá los registros asociados. authoritative_name_servers
     también es retornado conteniendo una lista de los servidores de autoridad.

&lt;?php
/_ Solicita todos ("ANY") los registros para php.net,
luego crea los arrays $authns y $addtl
conteniendo una lista de nombres de servidores, y todos
los registros que van con ellos
_/
$result = dns_get_record("php.net", DNS_ANY, $authns, $addtl);
echo "Result = ";
print_r($result);
echo "Auth NS = ";
print_r($authns);
echo "Additional = ";
print_r($addtl);
?&gt;

    Resultado del ejemplo anterior es similar a:

Result = Array
(
[0] =&gt; Array
(
[host] =&gt; php.net
[type] =&gt; MX
[pri] =&gt; 5
[target] =&gt; pair2.php.net
[class] =&gt; IN
[ttl] =&gt; 6765
)

    [1] =&gt; Array
        (
            [host] =&gt; php.net
            [type] =&gt; A
            [ip] =&gt; 64.246.30.37
            [class] =&gt; IN
            [ttl] =&gt; 8125
        )

)
Auth NS = Array
(
[0] =&gt; Array
(
[host] =&gt; php.net
[type] =&gt; NS
[target] =&gt; remote1.easydns.com
[class] =&gt; IN
[ttl] =&gt; 10722
)

    [1] =&gt; Array
        (
            [host] =&gt; php.net
            [type] =&gt; NS
            [target] =&gt; remote2.easydns.com
            [class] =&gt; IN
            [ttl] =&gt; 10722
        )

    [2] =&gt; Array
        (
            [host] =&gt; php.net
            [type] =&gt; NS
            [target] =&gt; ns1.easydns.com
            [class] =&gt; IN
            [ttl] =&gt; 10722
        )

    [3] =&gt; Array
        (
            [host] =&gt; php.net
            [type] =&gt; NS
            [target] =&gt; ns2.easydns.com
            [class] =&gt; IN
            [ttl] =&gt; 10722
        )

)
Additional = Array
(
[0] =&gt; Array
(
[host] =&gt; pair2.php.net
[type] =&gt; A
[ip] =&gt; 216.92.131.5
[class] =&gt; IN
[ttl] =&gt; 6766
)

    [1] =&gt; Array
        (
            [host] =&gt; remote1.easydns.com
            [type] =&gt; A
            [ip] =&gt; 64.39.29.212
            [class] =&gt; IN
            [ttl] =&gt; 100384
        )

    [2] =&gt; Array
        (
            [host] =&gt; remote2.easydns.com
            [type] =&gt; A
            [ip] =&gt; 212.100.224.80
            [class] =&gt; IN
            [ttl] =&gt; 81241
        )

    [3] =&gt; Array
        (
            [host] =&gt; ns1.easydns.com
            [type] =&gt; A
            [ip] =&gt; 216.220.40.243
            [class] =&gt; IN
            [ttl] =&gt; 81241
        )

    [4] =&gt; Array
        (
            [host] =&gt; ns2.easydns.com
            [type] =&gt; A
            [ip] =&gt; 216.220.40.244
            [class] =&gt; IN
            [ttl] =&gt; 81241
        )

)

### Ver también

    - [dns_get_mx()](#function.dns-get-mx) - Alias de getmxrr

    - [dns_check_record()](#function.dns-check-record) - Alias de checkdnsrr

# fsockopen

(PHP 4, PHP 5, PHP 7, PHP 8)

fsockopen — Abre un socket de conexión Internet o Unix

### Descripción

**fsockopen**(
    [string](#language.types.string) $hostname,
    [int](#language.types.integer) $port = -1,
    [int](#language.types.integer) &amp;$error_code = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$error_message = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $timeout = **[null](#constant.null)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

Inicializa una conexión por socket al recurso especificado por
hostname.

PHP soporta los objetivos en los dominios Internet y Unix como se describe en
[Lista de los modos de transporte de sockets disponibles](#transports). Una lista de los tipos de transportes también puede
ser encontrada utilizando la función [stream_get_transports()](#function.stream-get-transports).

El socket se abrirá por omisión en modo bloqueante. Se puede
cambiar de modo utilizando: [stream_set_blocking()](#function.stream-set-blocking).

La función [stream_socket_client()](#function.stream-socket-client) es similar
pero proporciona más opciones, incluyendo la conexión no bloqueante
y la posibilidad de proporcionar un contexto de flujo.

### Parámetros

     hostname


       Si el soporte OpenSSL [está
       instalado](#openssl.installation), se puede prefijar hostname
       con ssl:// o tls:// para utilizar
       una conexión cliente SSL o TLS sobre TCP/IP para conectarse al host
       remoto.






     port


       El número del puerto. Este argumento puede ser omitido e ignorado
       utilizando el valor -1 para los transportes
       que no utilizan puertos, como unix://.






     error_code


       Si se proporciona, contiene el número del error del sistema que ocurre
       durante la llamada al sistema connect().




       Si el valor devuelto por error_code es
       0 y la función devuelve **[false](#constant.false)**, puede ser una indicación
       de que el error ocurrió antes de la llamada a connect(). La mayoría de las veces,
       esto se debe a un problema de inicialización del socket.






     error_message


       El mensaje de error, en forma de [string](#language.types.string).






     timeout


       El tiempo máximo de espera, en segundos. Si es **[null](#constant.null)** el parámetro php.ini
       [default_socket_timeout](#ini.default-socket-timeout) es utilizado.



      **Nota**:



        Si se necesita establecer un tiempo límite para leer/escribir datos a través de este socket, utilice la función
        [stream_set_timeout()](#function.stream-set-timeout), ya que el argumento
        timeout de la función
        **fsockopen()** se aplica únicamente durante la conexión del socket.






### Valores devueltos

**fsockopen()** devuelve un puntero de fichero que puede
ser utilizado con otras funciones de ficheros, tales como
[fgets()](#function.fgets), [fgetss()](#function.fgetss),
[fputs()](#function.fputs), [fclose()](#function.fclose) y
[feof()](#function.feof). Si la llamada falla, la función devuelve
**[false](#constant.false)**.

### Errores/Excepciones

Lanza una alerta de tipo **[E_WARNING](#constant.e-warning)** si el argumento
hostname no es un dominio válido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       timeout es ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con fsockopen()**

&lt;?php
$fp = fsockopen("www.example.com", 80, $errno, $errstr, 30);
if (!$fp) {
echo "$errstr ($errno)&lt;br /&gt;\n";
} else {
$out = "GET / HTTP/1.1\r\n";
$out .= "Host: www.example.com\r\n";
$out .= "Connection: Close\r\n\r\n";

    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);

}
?&gt;

    **Ejemplo #2 Uso de una conexión UDP**



     El ejemplo a continuación describe cómo leer la fecha y la hora gracias a
     un servicio UDP "daytime" (puerto 13), en su propia máquina.

&lt;?php
$fp = fsockopen("udp://127.0.0.1", 13, $errno, $errstr);
if (!$fp) {
echo "ERROR: $errno - $errstr&lt;br /&gt;\n";
} else {
    fwrite($fp, "\n");
echo fread($fp, 26);
    fclose($fp);
}
?&gt;

### Notas

**Nota**:

    Dependiendo de los entornos, el tipo 'dominio Unix' o la opción
    timeout no siempre están disponibles.

**Advertencia**

    Los sockets UDP parecen haber sido abiertos sin error,
    incluso si el host remoto no es accesible. El error aparece entonces
    solo cuando se intenta leer/escribir en el socket.
    La razón de esto es que UDP es un protocolo "connectionless",
    lo que significa que el sistema no intentará establecer un enlace para el socket
    hasta que no deba recibir/enviar datos.

**Nota**: Al especificar direcciones
IPv6 en formato numérico (ej. fe80::1) se debe colocar la dirección IP
entre corchetes. Por ejemplo: tcp://[fe80::1]:80.

### Ver también

    - [pfsockopen()](#function.pfsockopen) - Se abre un socket de conexión Internet o Unix persistente

    - [stream_socket_client()](#function.stream-socket-client) - Abre una conexión de socket de Internet o Unix

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

    - [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

    - [fclose()](#function.fclose) - Cierra un fichero

    - [feof()](#function.feof) - Prueba el final del archivo

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - La [extensión Curl](#ref.curl)

# gethostbyaddr

(PHP 4, PHP 5, PHP 7, PHP 8)

gethostbyaddr — Devuelve el nombre de host correspondiente a una IP

### Descripción

**gethostbyaddr**([string](#language.types.string) $ip): [string](#language.types.string)|[false](#language.types.singleton)

**gethostbyaddr()** devuelve el nombre de host
correspondiente a la IP ip.

### Parámetros

     ip


       La dirección IP del host.





### Valores devueltos

Devuelve el nombre del host en caso de éxito, la ip sin modificar en caso de fallo
o **[false](#constant.false)** si se proporciona una entrada mal formada.

### Ejemplos

    **Ejemplo #1 Ejemplo con gethostbyaddr()**

&lt;?php
$hostname = gethostbyaddr($\_SERVER['REMOTE_ADDR']);

echo $hostname;
?&gt;

### Ver también

    - [gethostbyname()](#function.gethostbyname) - Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado

    - [gethostbynamel()](#function.gethostbynamel) - Devuelve la lista de direcciones IPv4 correspondientes a un host

# gethostbyname

(PHP 4, PHP 5, PHP 7, PHP 8)

gethostbyname —
Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado

### Descripción

**gethostbyname**([string](#language.types.string) $hostname): [string](#language.types.string)

Devuelve la dirección IPv4 del host de Internet especificado por
hostname.

### Parámetros

     hostname


       El nombre de host.





### Valores devueltos

Devuelve la dirección IPv4 o un string que contiene el hostname
sin modificar en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo simple de gethostbyname()**

&lt;?php
$ip = gethostbyname('www.example.com');

echo $ip;
?&gt;

### Ver también

    - [gethostbyaddr()](#function.gethostbyaddr) - Devuelve el nombre de host correspondiente a una IP

    - [gethostbynamel()](#function.gethostbynamel) - Devuelve la lista de direcciones IPv4 correspondientes a un host

    - [inet_pton()](#function.inet-pton) - Convierte una dirección IP legible en su representación in_addr

    - [inet_ntop()](#function.inet-ntop) - Convierte un paquete de direcciones internet en una representación legible por humanos

# gethostbynamel

(PHP 4, PHP 5, PHP 7, PHP 8)

gethostbynamel — Devuelve la lista de direcciones IPv4 correspondientes a un host

### Descripción

**gethostbynamel**([string](#language.types.string) $hostname): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve la lista de direcciones IPv4 correspondientes al host hostname.

### Parámetros

     hostname


       El nombre del host.





### Valores devueltos

Devuelve un array de direcciones IPv4, o **[false](#constant.false)** si
hostname no pudo ser resuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con gethostbynamel()**

&lt;?php
$hosts = gethostbynamel('www.example.com');
print_r($hosts);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 192.0.34.166
)

### Ver también

    - [gethostbyname()](#function.gethostbyname) - Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado

    - [gethostbyaddr()](#function.gethostbyaddr) - Devuelve el nombre de host correspondiente a una IP

    - [checkdnsrr()](#function.checkdnsrr) - Resolución DNS de una dirección IP

    - [getmxrr()](#function.getmxrr) - Devuelve los registros MX de un host

    - La página del manual named(8)

# gethostname

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

gethostname — Lee el nombre del host

### Descripción

**gethostname**(): [string](#language.types.string)|[false](#language.types.singleton)

**gethostname()** lee el nombre de host estándar
para la máquina host.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string con el nombre de host, en caso de éxito y
de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con gethostname()**

&lt;?php
echo gethostname(); // debe mostrar i.e : sandie
?&gt;

### Ver también

    - [gethostbyname()](#function.gethostbyname) - Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado

    - [gethostbyaddr()](#function.gethostbyaddr) - Devuelve el nombre de host correspondiente a una IP

    - [php_uname()](#function.php-uname) - Devuelve información sobre el sistema operativo

# getmxrr

(PHP 4, PHP 5, PHP 7, PHP 8)

getmxrr — Devuelve los registros MX de un host

### Descripción

**getmxrr**([string](#language.types.string) $hostname, [array](#language.types.array) &amp;$hosts, [array](#language.types.array) &amp;$weights = **[null](#constant.null)**): [bool](#language.types.boolean)

Realiza una búsqueda DNS para obtener los registros
MX del host hostname.

### Parámetros

     hostname


       El nombre de host de Internet.






     hosts


       La lista de registros MX se coloca en el array
       hosts.






     weights


       Si se proporciona el array weights,
       será rellenado con la información de pesos.





### Valores devueltos

Devuelve **[true](#constant.true)** si se encuentran registros, y
**[false](#constant.false)** si ocurre un error, o si la búsqueda
falla.

### Notas

**Nota**:

    Esta función no debe utilizarse para verificar direcciones.
    Solo se devuelven los servidores de correo listados en los registros
    DNS. Según la [» RFC 2821](https://datatracker.ietf.org/doc/html/rfc2821),
    cuando no se lista ningún servidor de correo, hostname
    debe usarse como servidor de correo, con prioridad 0.

**Nota**:

    Para compatibilidad con versiones no soportadas,
    utilice la clase [» PEAR](https://pear.php.net/):
    [» Net_DNS](https://pear.php.net/package/Net_DNS).

### Ver también

    - [checkdnsrr()](#function.checkdnsrr) - Resolución DNS de una dirección IP

    - [dns_get_record()](#function.dns-get-record) - Lee los datos DNS asociados a un host

    - [gethostbyname()](#function.gethostbyname) - Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado

    - [gethostbynamel()](#function.gethostbynamel) - Devuelve la lista de direcciones IPv4 correspondientes a un host

    - [gethostbyaddr()](#function.gethostbyaddr) - Devuelve el nombre de host correspondiente a una IP

    - la página del manual named(8)

# getprotobyname

(PHP 4, PHP 5, PHP 7, PHP 8)

getprotobyname — Devuelve el número de protocolo asociado a un nombre de protocolo

### Descripción

**getprotobyname**([string](#language.types.string) $protocol): [int](#language.types.integer)|[false](#language.types.singleton)

**getprotobyname()** devuelve el número de
protocolo asociado con el nombre de protocolo
protocol, como en /etc/protocols.

### Parámetros

     protocol


       El nombre del protocolo.





### Valores devueltos

Devuelve el número del protocolo, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con getprotobyname()**

&lt;?php
$protocol = 'tcp';
$get_prot = getprotobyname($protocol);
if ($get_prot === FALSE) {
echo 'Protocolo inválido';
} else {
echo 'Protocolo #' . $get_prot;
}
?&gt;

### Ver también

    - [getprotobynumber()](#function.getprotobynumber) - Devuelve el nombre de protocolo asociado a un número de protocolo

# getprotobynumber

(PHP 4, PHP 5, PHP 7, PHP 8)

getprotobynumber — Devuelve el nombre de protocolo asociado a un número de protocolo

### Descripción

**getprotobynumber**([int](#language.types.integer) $protocol): [string](#language.types.string)|[false](#language.types.singleton)

**getprotobynumber()** devuelve el nombre
de protocolo asociado al protocolo protocol,
como se describe en /etc/protocols.

### Parámetros

     protocol


       El número del protocolo.





### Valores devueltos

Devuelve el nombre del protocolo, en forma de [string](#language.types.string) o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [getprotobyname()](#function.getprotobyname) - Devuelve el número de protocolo asociado a un nombre de protocolo

# getservbyname

(PHP 4, PHP 5, PHP 7, PHP 8)

getservbyname — Devuelve el número de puerto asociado a un servicio de Internet y un protocolo

### Descripción

**getservbyname**([string](#language.types.string) $service, [string](#language.types.string) $protocol): [int](#language.types.integer)|[false](#language.types.singleton)

**getservbyname()** devuelve el número de
puerto asociado al servicio service
y al protocolo protocol, como en
/etc/services.

### Parámetros

     service


       El nombre del servicio de Internet, en forma de [string](#language.types.string).






     protocol


       protocol puede ser "tcp"
       o "udp" (en minúsculas).





### Valores devueltos

Devuelve el número del puerto, o **[false](#constant.false)** si service o
protocol no se encuentra.

### Ejemplos

    **Ejemplo #1 Ejemplo con getservbyname()**

&lt;?php
$services = array('http', 'ftp', 'ssh', 'telnet', 'imap',
'smtp', 'nicname', 'gopher', 'finger', 'pop3', 'www');

foreach ($services as $service) {
    $port = getservbyname($service, 'tcp');
echo $service . ": " . $port . "&lt;br /&gt;\n";
}
?&gt;

### Ver también

    - [getservbyport()](#function.getservbyport) - Devuelve el servicio de Internet que corresponde al puerto y protocolo

    -
     [» http://www.iana.org/assignments/port-numbers](http://www.iana.org/assignments/port-numbers)
     para una lista completa de los números de puerto.

# getservbyport

(PHP 4, PHP 5, PHP 7, PHP 8)

getservbyport — Devuelve el servicio de Internet que corresponde al puerto y protocolo

### Descripción

**getservbyport**([int](#language.types.integer) $port, [string](#language.types.string) $protocol): [string](#language.types.string)|[false](#language.types.singleton)

**getservbyport()** busca el servicio de Internet asociado al puerto
port para el protocolo protocol
como en /etc/services.

### Parámetros

     port


       El número del puerto.






     protocol


       protocol puede ser "tcp"
       o "udp" (en minúsculas).





### Valores devueltos

Devuelve el nombre del servicio de Internet, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [getservbyname()](#function.getservbyname) - Devuelve el número de puerto asociado a un servicio de Internet y un protocolo

# header

(PHP 4, PHP 5, PHP 7, PHP 8)

header — Envía un encabezado HTTP bruto

### Descripción

**header**([string](#language.types.string) $header, [bool](#language.types.boolean) $replace = **[true](#constant.true)**, [int](#language.types.integer) $response_code = 0): [void](language.types.void.html)

**header()** permite especificar el encabezado HTTP
string al enviar los ficheros HTML.
Consúltese [» HTTP/1.1
Specification](https://datatracker.ietf.org/doc/html/rfc2616) para obtener más información sobre los encabezados
HTTP.

Nunca se olvide que **header()** debe ser llamada
antes de que se envíe cualquier contenido, ya sea por líneas HTML habituales en el fichero,
o por salidas PHP. Un error muy común es leer un fichero con
[include](#function.include) o
[require](#function.require),
y dejar espacios o líneas vacías, que producirán una salida antes de que la función **header()**
sea llamada. El mismo problema existe con los ficheros
PHP/HTML estándar.

&lt;html&gt;
&lt;?php
/\* Esto producirá un error. Observe la salida anterior,

- que se encuentra antes de la llamada a la función header() \*/
  header('Location: http://www.example.com/');
  exit;
  ?&gt;

### Parámetros

     header


       El encabezado.




       Existen dos encabezados especiales. El primero comienza con la cadena
       "HTTP/" (insensible a mayúsculas/minúsculas), que se utiliza
       para indicar el estado HTTP a enviar. Por ejemplo, si se ha configurado
       Apache para utilizar scripts PHP para manejar las peticiones hacia ficheros
       inexistentes (utilizando la directiva ErrorDocument),
       asegúrese de que el script genere un código de estado correcto.









&lt;?php
// Este ejemplo ilustra el caso especial "HTTP/"
// Alternativas mejores en casos típicos de uso incluyen:
// 1. header($\_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
// (para sobrescribir mensajes de estado HTTP para clientes que aún usan HTTP/1.0)
// 2. http_response_code(404); (para usar el mensaje por defecto)
header("HTTP/1.1 404 Not Found");
?&gt;

       El segundo tipo de llamada especial es "Location:".
       No solo devuelve un encabezado al cliente, sino que además
       envía un estado REDIRECT (302) al navegador
       siempre que no se haya enviado un código de estado 201 o 3xx.









&lt;?php
header("Location: http://www.example.com/"); /_ Redirección del navegador _/

/_ Asegúrese de que el código siguiente no se ejecute una vez realizada la redirección. _/
exit;
?&gt;

     replace


       El argumento opcional replace indica
       si la función **header()** debe reemplazar
       un encabezado previamente enviado, o bien añadir otro encabezado
       del mismo tipo. Por omisión, un nuevo encabezado sobrescribirá el
       anterior, pero si se pasa **[false](#constant.false)** en este argumento, se pueden
       forzar múltiples encabezados para un mismo tipo de encabezado.
       Por ejemplo:









&lt;?php
header('WWW-Authenticate: Negotiate');
header('WWW-Authenticate: NTLM', false);
?&gt;

     response_code


       Fuerza el código de respuesta HTTP al valor especificado. Tenga en cuenta que este
       argumento solo tiene efecto si header
       no está vacío.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Cuando falla el intento de enviar un encabezado,
**header()** genera un error de nivel
**[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Caja de descarga**



     Si se desea que los usuarios reciban una alerta para guardar
     los ficheros generados, como si se genera un
     fichero PDF, se puede utilizar el encabezado
     [» Content-Disposition](https://datatracker.ietf.org/doc/html/rfc2183) para
     proporcionar un nombre de fichero por defecto, a mostrar en el
     diálogo de guardado.

&lt;?php
// Se desea mostrar un pdf
header('Content-Type: application/pdf');

// Será nombrado downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.pdf"');

// El origen del PDF original.pdf
readfile('original.pdf');
?&gt;

    **Ejemplo #2 Directivas concernientes a la caché**



     Los scripts PHP generan a menudo HTML dinámico,
     que no debe ser almacenado en caché, ni por el cliente, ni por los
     proxy intermedios. Se puede forzar la desactivación de la
     caché de muchos clientes y proxy con:

&lt;?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
?&gt;

**Nota**:

       Puede darse cuenta de que sus páginas nunca son almacenadas en caché incluso si se utilizan todos los encabezados anteriores.
       Existe toda una colección de parámetros que los usuarios pueden modificar en su navegador para cambiar el
       comportamiento por defecto de la caché. Al enviar los encabezados anteriores, se pueden imponer sus propias valores.




       Además, los parámetros [session_cache_limiter()](#function.session-cache-limiter) y
       session.cache_limiter pueden ser utilizados para
       generar los encabezados de caché correctos, cuando se utilizan sesiones.











    **Ejemplo #3 Configurar una cookie**



     [setcookie()](#function.setcookie) ofrece un medio práctico de configurar cookies.
     Para definir una cookie con atributos no soportados por [setcookie()](#function.setcookie),
     **header()** puede ser utilizado.




     Por ejemplo, el código siguiente define una cookie que incluye un atributo
     Partitioned.

&lt;?php
header('Set-Cookie: name=value; Secure; Path=/; SameSite=None; Partitioned;');
?&gt;

### Notas

**Nota**:

Los encabezados solo serán accesibles y se mostrarán cuando se utilice un SAPI que los soporte.

**Nota**:

    Se puede utilizar el sistema de caché (output buffering)
    para evitar este problema. Todo el texto generado será almacenado en buffer en el servidor hasta que se envíe. Se pueden
    utilizar las funciones [ob_start()](#function.ob-start) y
    [ob_end_flush()](#function.ob-end-flush) en los scripts, o modificando la directiva de configuración output_buffering
    en el fichero php.ini o los ficheros
    de configuración del servidor.

**Nota**:

    El código de estado HTTP debe ser siempre el primero en enviarse al cliente,
    en relación con la actual **header()** que puede ser el primero
    o no. El estado puede ser sobrescrito llamando a **header()**
    con un nuevo estado en cualquier momento, incluso si el encabezado HTTP ya ha sido enviado.

**Nota**:

    La mayoría de los clientes modernos aceptan URIs relativas como argumento de
    [» Location:](http://tools.ietf.org/html/rfc7231#section-7.1.2),
    pero algunos clientes más antiguos exigen una URI absoluta
    incluyendo el protocolo, el host y la ruta absoluta. Se puede utilizar generalmente las variables globales [$_SERVER['HTTP_HOST']](#reserved.variables.server),
    [$_SERVER['PHP_SELF']](#reserved.variables.server) y [dirname()](#function.dirname) para
    construir una URI absoluta:





&lt;?php
/_ Redirección hacia una página diferente del mismo directorio _/
$host  = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'mypage.php';
header("Location: http://$host$uri/$extra");
exit;
?&gt;

**Nota**:

    El ID de sesión no es pasado con el encabezado Location incluso si
    [session.use_trans_sid](#ini.session.use-trans-sid)
    está activado. Debe ser pasado manualmente utilizando la constante
    **[SID](#constant.sid)**.

### Ver también

    - [headers_sent()](#function.headers-sent) - Indica si los encabezados HTTP ya han sido enviados

    - [setcookie()](#function.setcookie) - Envía una cookie

    - [http_response_code()](#function.http-response-code) - Obtiene o define el código de respuesta HTTP

    - [header_remove()](#function.header-remove) - Elimina un encabezado HTTP

    - [headers_list()](#function.headers-list) - Devuelve la lista de los encabezados de respuesta del script actual

    -
     La sección sobre la'[autenticación
      HTTP](#features.http-auth)

# header_register_callback

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

header_register_callback — Llamar a una función de cabecera

### Descripción

**header_register_callback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Registra una función que será llamada cuando PHP comienza a enviar la salida.

El callback se ejecuta inmediatamente después de PHP
prepara todos los encabezados que van a ser enviados, y antes de cualquier otra salida es enviado,
crea una ventana para manipular las cabeceras de salida antes de ser enviado.

### Parámetros

    callback


      Función llamada justo antes de que se envíen los encabezados.
      No tiene parámetros y el valor de retorno se ignora.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 header_register_callback()** example

&lt;?php

header('Content-Type: text/plain');
header('X-Test: foo');

function foo() {
foreach (headers_list() as $header) {
   if (strpos($header, 'X-Powered-By:') !== false) {
header_remove('X-Powered-By');
}
header_remove('X-Test');
}
}

$result = header_register_callback('foo');
echo "a";
?&gt;

Resultado del ejemplo anterior es similar a:

Content-Type: text/plain

a

### Notas

La función **header_register_callback()** es ejecutada cuando las
cabeceras están a punto de ser enviadas, por lo que cualquier salida de esta función
puede romper de salida.

**Nota**:

Los encabezados solo serán accesibles y se mostrarán cuando se utilice un SAPI que los soporte.

### Ver también

- [headers_list()](#function.headers-list) - Devuelve la lista de los encabezados de respuesta del script actual

- [header_remove()](#function.header-remove) - Elimina un encabezado HTTP

- [header()](#function.header) - Envía un encabezado HTTP bruto

# header_remove

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

header_remove — Elimina un encabezado HTTP

### Descripción

**header_remove**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [void](language.types.void.html)

Elimina un encabezado HTTP previamente añadido con
[header()](#function.header).

### Parámetros

     name


       El nombre del encabezado a eliminar. Si es **[null](#constant.null)**, todos los encabezados definidos previamente son eliminados.



      **Nota**:

        Este argumento no distingue entre mayúsculas y minúsculas.






### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       name ahora es nullable.



### Ejemplos

    **Ejemplo #1 Eliminar un encabezado HTTP con header_remove()**

&lt;?php
header("X-Foo: Bar");
header("X-Bar: Baz");
header_remove("X-Foo");
?&gt;

    Resultado del ejemplo anterior es similar a:

X-Bar: Baz

    **Ejemplo #2 Eliminar todos los encabezados HTTP con header_remove()**

&lt;?php
header("X-Foo: Bar");
header("X-Bar: Baz");
header_remove();
?&gt;

    Resultado del ejemplo anterior es similar a:

### Notas

**Precaución**

    Esta función elimina *todos* los encabezados
    configurados por PHP, incluyendo cookies, sesiones y los encabezados
    X-Powered-By.

**Nota**:

Los encabezados solo serán accesibles y se mostrarán cuando se utilice un SAPI que los soporte.

### Ver también

    - [header()](#function.header) - Envía un encabezado HTTP bruto

    - [headers_sent()](#function.headers-sent) - Indica si los encabezados HTTP ya han sido enviados

# headers_list

(PHP 5, PHP 7, PHP 8)

headers_list — Devuelve la lista de los encabezados de respuesta del script actual

### Descripción

**headers_list**(): [array](#language.types.array)

**headers_list()** devuelve un array con la lista de los encabezados
que serán transmitidos al navegador. Para determinar si estos encabezados han
sido ya enviados o no, utilice la función [headers_sent()](#function.headers-sent).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de encabezados indexado numéricamente.

### Ejemplos

    **Ejemplo #1 Ejemplo con headers_list()**

&lt;?php

/_ setcookie() va añadir un encabezado _/
setcookie('foo', 'bar');

/_ Define un encabezado de respuesta
Será ignorado por la mayoría de los navegadores _/
header("Example-Test: foo");

/_ Especificación de la respuesta en texto simple _/
header('Content-Type: text/plain; charset=UTF-8');

/_ ¿Cuáles son los encabezados que serán enviados? _/
var_dump(headers_list());

?&gt;

    Resultado del ejemplo anterior es similar a:

array(4) {
[0]=&gt;
string(19) "Set-Cookie: foo=bar"
[1]=&gt;
string(17) "Example-Test: foo"
[2]=&gt;
string(39) "Content-Type: text/plain; charset=UTF-8"
}

### Notas

**Nota**:

Los encabezados solo serán accesibles y se mostrarán cuando se utilice un SAPI que los soporte.

### Ver también

    - [headers_sent()](#function.headers-sent) - Indica si los encabezados HTTP ya han sido enviados

    - [header()](#function.header) - Envía un encabezado HTTP bruto

    - [setcookie()](#function.setcookie) - Envía una cookie

    - [apache_response_headers()](#function.apache-response-headers) - Recupera todos los encabezados de respuesta HTTP

    - [http_response_code()](#function.http-response-code) - Obtiene o define el código de respuesta HTTP

# headers_sent

(PHP 4, PHP 5, PHP 7, PHP 8)

headers_sent — Indica si los encabezados HTTP ya han sido enviados

### Descripción

**headers_sent**([string](#language.types.string) &amp;$filename = **[null](#constant.null)**, [int](#language.types.integer) &amp;$line = **[null](#constant.null)**): [bool](#language.types.boolean)

Verifica si los encabezados HTTP ya han sido enviados.

No es posible enviar más encabezados con la función [header()](#function.header)
una vez que el bloque de encabezados ha sido cerrado. Mediante esta función, se puede
al menos evitar la visualización de los errores HTTP relacionados. Otra
opción consiste en utilizar el [control de salida](#ref.outcontrol).

### Parámetros

     filename


       Si los argumentos opcionales filename
       y line son proporcionados, **headers_sent()**
       va a colocar el nombre del archivo fuente y el número de línea que iniciaron
       la salida, en las variables filename
       y line.



      **Nota**:



        Si la salida comenzó antes de la ejecución del archivo fuente PHP (por ejemplo debido a un error de inicio),
        el argumento nombre del archivo será definido como una cadena vacía.







     line


       El número de línea donde ocurrió la salida.





### Valores devueltos

**headers_sent()** devuelve **[false](#constant.false)** si ningún encabezado
ha sido enviado, o **[true](#constant.true)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con headers_sent()**

&lt;?php

// Si ningún encabezado ha sido enviado, enviemos uno
if (!headers_sent()) {
header('Location: http://www.example.com/');
exit;
}

// Aquí hay un ejemplo de uso de los argumentos opcionales de archivo y línea.
// Tenga en cuenta que $filename y $linenum son transmitidos para su uso posterior.
// No los asigne antes de utilizarlos.
if (!headers_sent($filename, $linenum)) {
header('Location: http://www.example.com/');
exit;

// Probablemente se generará un error aquí
} else {

echo "Los encabezados ya han sido enviados, desde el archivo $filename en la línea $linenum\n" .
"Por lo tanto, no es posible redirigirlo automáticamente, así que por favor
haga clic &lt;a href=\"http://www.example.com\"&gt;aquí&lt;/a&gt;.\n";
exit;
}

?&gt;

### Notas

**Nota**:

Los encabezados solo serán accesibles y se mostrarán cuando se utilice un SAPI que los soporte.

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [trigger_error()](#function.trigger-error) - Desencadena un error de usuario

    - [headers_list()](#function.headers-list) - Devuelve la lista de los encabezados de respuesta del script actual

    -
     [header()](#function.header) - Envía un encabezado HTTP bruto para más detalles sobre los aspectos.

# http_clear_last_response_headers

(PHP 8 &gt;= 8.4.0)

http_clear_last_response_headers — Borra los encabezados de respuesta HTTP almacenados

### Descripción

**http_clear_last_response_headers**(): [void](language.types.void.html)

Borra los encabezados de respuesta HTTP almacenados mediante
[la envoltura HTTP](#wrappers.http).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [http_get_last_response_headers()](#function.http-get-last-response-headers) - Obtiene los últimos encabezados de respuesta HTTP

# http_get_last_response_headers

(PHP 8 &gt;= 8.4.0)

http_get_last_response_headers — Obtiene los últimos encabezados de respuesta HTTP

### Descripción

**http_get_last_response_headers**(): [?](#language.types.null)[array](#language.types.array)

Obtiene un [array](#language.types.array) que contiene los últimos encabezados de
respuesta HTTP recibidos a través de
[la envoltura HTTP](#wrappers.http).
Si no hay ninguno, se devuelve **[null](#constant.null)** en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) indexado de los encabezados HTTP
que fueron recibidos al utilizar
[la envoltura HTTP](#wrappers.http).
Si no hay ninguno, se devuelve **[null](#constant.null)** en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo de http_get_last_response_headers()**

    Descripción.

&lt;?php
file_get_contents("http://example.com");
var_dump(http_get_last_response_headers());
?&gt;

Resultado del ejemplo anterior es similar a:

array(14) {
[0]=&gt;
string(15) "HTTP/1.1 200 OK"
[1]=&gt;
string(20) "Accept-Ranges: bytes"
[2]=&gt;
string(11) "Age: 326940"
[3]=&gt;
string(29) "Cache-Control: max-age=604800"
[4]=&gt;
string(38) "Content-Type: text/html; charset=UTF-8"
[5]=&gt;
string(35) "Date: Mon, 11 Nov 2024 13:34:09 GMT"
[6]=&gt;
string(23) "Etag: "3147526947+gzip""
[7]=&gt;
string(38) "Expires: Mon, 18 Nov 2024 13:34:09 GMT"
[8]=&gt;
string(44) "Last-Modified: Thu, 17 Oct 2019 07:18:26 GMT"
[9]=&gt;
string(24) "Server: ECAcc (nyd/D16C)"
[10]=&gt;
string(21) "Vary: Accept-Encoding"
[11]=&gt;
string(12) "X-Cache: HIT"
[12]=&gt;
string(20) "Content-Length: 1256"
[13]=&gt;
string(17) "Connection: close"
}

### Ver también

- [http_clear_last_response_headers()](#function.http-clear-last-response-headers) - Borra los encabezados de respuesta HTTP almacenados

# http_response_code

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

http_response_code — Obtiene o define el código de respuesta HTTP

### Descripción

**http_response_code**([int](#language.types.integer) $response_code = 0): [int](#language.types.integer)|[bool](#language.types.boolean)

Obtiene o define el código de estado de respuesta HTTP.

### Parámetros

     response_code


       El argumento opcional response_code definirá el código de respuesta.





### Valores devueltos

Si response_code es proporcionado, en ese caso el código de estado
anterior será devuelto. Si response_code no es proporcionado,
entonces el código de estado actual será devuelto. Ambos valores serán por omisión
el código de estado 200 si se utiliza en un entorno de servidor web.

**[false](#constant.false)** será devuelto si response_code no es proporcionado
y no es invocado en un entorno de servidor web (por ejemplo desde
una aplicación CLI) **[true](#constant.true)** será devuelto si
response_code es proporcionado y no es invocado en un
entorno de servidor web (pero únicamente si ningún estado de respuesta anterior
ha sido definido).

### Ejemplos

    **Ejemplo #1 Utilizar http_response_code()** en un entorno de servidor web

&lt;?php

// Obtener el código de respuesta actual y definir uno nuevo
var_dump(http_response_code(404));

// Obtener el nuevo código de respuesta
var_dump(http_response_code());
?&gt;

    El ejemplo anterior mostrará:

int(200)
int(404)

    **Ejemplo #2 Utilizar http_response_code()** en un entorno CLI

&lt;?php

// Obtener el código de respuesta por omisión
var_dump(http_response_code());

// Definir un código de respuesta
http_response_code(404);

// Obtener el nuevo código de respuesta
var_dump(http_response_code());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)
int(201)

### Ver también

    - [header()](#function.header) - Envía un encabezado HTTP bruto

    - [headers_list()](#function.headers-list) - Devuelve la lista de los encabezados de respuesta del script actual

# inet_ntop

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

inet_ntop — Convierte un paquete de direcciones internet en una representación legible por humanos

### Descripción

**inet_ntop**([string](#language.types.string) $ip): [string](#language.types.string)|[false](#language.types.singleton)

Convierte una dirección IPv4 de 32 bits o IPv6 de 128 bits (si PHP ha sido
compilado con soporte IPv6) en un string que representa una familia de direcciones.

### Parámetros

     ip


       Una dirección IPv4 de 32 bits o IPv6 de 128 bits.





### Valores devueltos

Devuelve una representación de la dirección, en forma de un [string](#language.types.string) o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con inet_ntop()**

&lt;?php
$packed = chr(127) . chr(0) . chr(0) . chr(1);
$expanded = inet_ntop($packed);

/_ Muestra: 127.0.0.1 _/
echo $expanded;

$packed = str_repeat(chr(0), 15) . chr(1);
$expanded = inet_ntop($packed);

/_ Muestra: ::1 _/
echo $expanded;
?&gt;

### Ver también

    - [long2ip()](#function.long2ip) - Convierte un entero largo (IPv4) a su notación decimal con puntos

    - [ip2long()](#function.ip2long) - Convierte una cadena que contiene una dirección (IPv4) en notación decimal con puntos en una dirección entera larga

    - [inet_pton()](#function.inet-pton) - Convierte una dirección IP legible en su representación in_addr

# inet_pton

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

inet_pton — Convierte una dirección IP legible en su representación in_addr

### Descripción

**inet_pton**([string](#language.types.string) $ip): [string](#language.types.string)|[false](#language.types.singleton)

Convierte una dirección IPv4 o IPv6 (si PHP ha sido compilado con el
soporte IPv6) legible por humanos en una estructura binaria
adecuada de familia de direcciones de 32 bits o 128 bits.

### Parámetros

     ip


       Una dirección IPv4 o IPv6.





### Valores devueltos

Devuelve la representación in_addr de la dirección
proporcionada por el argumento ip o **[false](#constant.false)**
si el argumento ip proporcionado tiene una sintaxis
inválida (por ejemplo, una dirección IPv4 sin punto, o una dirección
IPv6 sin dos puntos).

### Ejemplos

    **Ejemplo #1 Ejemplo con inet_pton()**

&lt;?php
$in_addr = inet_pton('127.0.0.1');

$in6_addr = inet_pton('::1');
?&gt;

### Ver también

    - [ip2long()](#function.ip2long) - Convierte una cadena que contiene una dirección (IPv4) en notación decimal con puntos en una dirección entera larga

    - [long2ip()](#function.long2ip) - Convierte un entero largo (IPv4) a su notación decimal con puntos

    - [inet_ntop()](#function.inet-ntop) - Convierte un paquete de direcciones internet en una representación legible por humanos

# ip2long

(PHP 4, PHP 5, PHP 7, PHP 8)

ip2long — Convierte una cadena que contiene una dirección (IPv4) en notación decimal con puntos en una dirección entera larga

### Descripción

**ip2long**([string](#language.types.string) $ip): [int](#language.types.integer)|[false](#language.types.singleton)

La función **ip2long()** genera una representación
en entero largo de una dirección IPv4 desde su formato estándar
(notación decimal con puntos)

**ip2long()** también funciona con direcciones IP
incompletas. Leer [» http://ps-2.kev009.com/wisclibrary/aix52/usr/share/man/info/en_US/a_doc_lib/libs/commtrf2/inet_addr.htm](http://ps-2.kev009.com/wisclibrary/aix52/usr/share/man/info/en_US/a_doc_lib/libs/commtrf2/inet_addr.htm)
para más información.

### Parámetros

     ip


       Una dirección en formato estándar.





### Valores devueltos

Devuelve el entero largo, o **[false](#constant.false)** si ip
es inválido.

### Ejemplos

    **Ejemplo #1 Ejemplo con ip2long()**

&lt;?php
$ip = gethostbyname('www.example.com');
$out = "Las URL siguientes son equivalentes :&lt;br /&gt;\n";
$out .= 'http://www.example.com/, http://' . $ip . '/, and http://' . sprintf("%u", ip2long($ip)) . "/&lt;br /&gt;\n";
echo $out;
?&gt;

    **Ejemplo #2 Mostrar una dirección IP**



     Este segundo ejemplo muestra cómo mostrar una dirección convertida
     a través de la función [printf()](#function.printf):

&lt;?php
$ip   = gethostbyname('www.example.com');
$long = ip2long($ip);

if ($long == -1 || $long === FALSE) {
    echo 'IP inválida, por favor intente de nuevo';
} else {
    echo $ip   . "\n";            // 192.0.34.166
    echo $long . "\n";            // 3221234342 (-1073732954 en los sistemas de 32-bit, debido al desbordamiento de entero)
    printf("%u\n", ip2long($ip)); // 3221234342
}
?&gt;

### Notas

**Nota**:

    Como los [int](#language.types.integer) PHP son firmados y muchas direcciones IP
    resultarán en enteros negativos en las arquitecturas de 32-bits, se
    debe utilizar el patrón "%u" de la función [sprintf()](#function.sprintf)
    o de la función [printf()](#function.printf) para obtener la representación
    en forma de [string](#language.types.string) de una dirección IP no firmada.

**Nota**:

    **ip2long()** devolverá -1 para la IP
    255.255.255.255 en los sistemas de 32-bits debido al
    desbordamiento del valor entero.

### Ver también

    - [long2ip()](#function.long2ip) - Convierte un entero largo (IPv4) a su notación decimal con puntos

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

# long2ip

(PHP 4, PHP 5, PHP 7, PHP 8)

long2ip — Convierte un entero largo (IPv4) a su notación decimal con puntos

### Descripción

**long2ip**([int](#language.types.integer) $ip): [string](#language.types.string)

La función **long2ip()** genera una dirección Internet
en notación decimal con puntos (formato aaa.bbb.ccc.ddd)
a partir de su representación como entero largo.

### Parámetros

     ip


       Una representación adecuada de una dirección en forma de entero largo





### Valores devueltos

Devuelve la dirección IP Internet, en forma de [string](#language.types.string).

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El tipo de retorno se cambió de [string](#language.types.string)|[false](#language.types.singleton) a [string](#language.types.string).




      7.1.0

       El tipo del argumento ip fue
       modificado de [string](#language.types.string) a [int](#language.types.integer).



### Notas

**Nota**:

    En arquitecturas de 32 bits, convertir la representación de direcciones IP de
    [string](#language.types.string) a [int](#language.types.integer) no dará resultados
    correctos para los números que exceden **[PHP_INT_MAX](#constant.php-int-max)**.

### Ver también

    - [ip2long()](#function.ip2long) - Convierte una cadena que contiene una dirección (IPv4) en notación decimal con puntos en una dirección entera larga

# net_get_interfaces

(PHP 7 &gt;= 7.3, PHP 8)

net_get_interfaces — Devuelve las interfaces de red

### Descripción

**net_get_interfaces**(): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve una enumeración de las interfaces de red (adaptadores) en la máquina local.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) asociativo donde la clave es el nombre de la interfaz
y el valor es un array asociativo de los atributos de la interfaz,
o **[false](#constant.false)** si ocurre un error.

Cada array asociativo de interfaz contiene:

    <caption>**Atributos de Interfaz**</caption>



       Nombre
       Descripción






       description

        Un valor de string opcional para la descripción de la interfaz.
        Solo Windows.




       mac

        Un valor de string opcional para la dirección MAC de la interfaz.
        Solo Windows.




       mtu

        Un valor integer para la unidad de transmisión máxima (MTU) de la interfaz.
        Solo Windows.




       unicast

        Un array de arrays asociativos, ver los atributos Unicast a continuación.




       up

        Un bool para el estado (on/off) de la interfaz.












    <caption>**Atributos de Unicast**</caption>



       Nombre
       Descripción






       flags

        Un valor integer.




       family

        Un valor integer.




       address

        Un valor string para la dirección en IPv4 o IPv6.




       netmask

        Un valor string para la máscara de subred en IPv4 o IPv6.





### Errores/Excepciones

Emite un error **[E_WARNING](#constant.e-warning)** en caso de fallo al obtener la información de la interfaz.

# openlog

(PHP 4, PHP 5, PHP 7, PHP 8)

openlog — Abre la conexión al historial del sistema

### Descripción

**openlog**([string](#language.types.string) $prefix, [int](#language.types.integer) $flags, [int](#language.types.integer) $facility): [true](#language.types.singleton)

**openlog()** abre la conexión al historial
del sistema.

El uso de **openlog()** es opcional. Esta
función será llamada automáticamente por la función [syslog()](#function.syslog)
si es necesario, en cuyo caso prefix valdrá por omisión
**[false](#constant.false)**.

### Parámetros

     prefix


       El string prefix será
       añadido a cada mensaje.






     flags


       Máscara de bits de las constantes siguientes:



        - **[LOG_CONS](#constant.log-cons)**

        - **[LOG_NDELAY](#constant.log-ndelay)**

        - **[LOG_ODELAY](#constant.log-odelay)**

        - **[LOG_NOWAIT](#constant.log-nowait)**

        - **[LOG_PERROR](#constant.log-perror)**

        - **[LOG_PID](#constant.log-pid)**






     facility


       El argumento facility se utiliza para especificar
       el tipo de programa que registra el mensaje.
       Esto permite al fichero de configuración especificar que los mensajes provenientes de diferentes
       instalaciones serán tratados de manera distinta.
       Debe ser una de las constantes siguientes:



        - **[LOG_AUTH](#constant.log-auth)**

        - **[LOG_AUTHPRIV](#constant.log-authpriv)**

        - **[LOG_CRON](#constant.log-cron)**

        - **[LOG_DAEMON](#constant.log-daemon)**

        - **[LOG_KERN](#constant.log-kern)**

        - **[LOG_LOCAL[0-7]](#constant.log-local0)**

        - **[LOG_LPR](#constant.log-lpr)**

        - **[LOG_MAIL](#constant.log-mail)**

        - **[LOG_NEWS](#constant.log-news)**

        - **[LOG_SYSLOG](#constant.log-syslog)**

        - **[LOG_USER](#constant.log-user)**

        - **[LOG_UUCP](#constant.log-uucp)**



      **Nota**:

        Este parámetro es ignorado en Windows.






### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       La función ahora siempre retorna **[true](#constant.true)**. Anteriormente, retornaba **[false](#constant.false)** en caso de fallo.



### Ver también

    - [syslog()](#function.syslog) - Genera un mensaje en el historial del sistema

    - [closelog()](#function.closelog) - Cierra la conexión al registro del sistema

# pfsockopen

(PHP 4, PHP 5, PHP 7, PHP 8)

pfsockopen — Se abre un socket de conexión Internet o Unix persistente

### Descripción

**pfsockopen**(
    [string](#language.types.string) $hostname,
    [int](#language.types.integer) $port = -1,
    [int](#language.types.integer) &amp;$error_code = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$error_message = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $timeout = **[null](#constant.null)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

**pfsockopen()** se comporta exactamente como
[fsockopen()](#function.fsockopen) pero la conexión abierta permanece abierta,
incluso después de finalizar el script. Es la versión
persistente de [fsockopen()](#function.fsockopen).

### Parámetros

Para más información sobre los argumentos, consúltese la
documentación sobre la función [fsockopen()](#function.fsockopen).

### Valores devueltos

**pfsockopen()** devuelve un puntero de fichero que puede
ser utilizado con otras funciones de fichero (como
[fgets()](#function.fgets), [fgetss()](#function.fgetss),
[fwrite()](#function.fwrite), [fclose()](#function.fclose), y
[feof()](#function.feof)), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       timeout ahora es nullable.



### Ver también

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

# request_parse_body

(PHP 8 &gt;= 8.4.0)

request_parse_body — Lee y analiza el cuerpo de la petición y devuelve el resultado

### Descripción

**request_parse_body**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [array](#language.types.array)

Esta función lee el cuerpo de la petición y lo analiza según
la cabecera Content-Type. Actualmente, se admiten dos tipos de
contenido:

- application/x-www-form-urlencoded

- multipart/form-data

Esta función se utiliza principalmente para analizar las peticiones
multipart/form-data con verbos HTTP distintos de
POST que no rellenan automáticamente las superglobales
[$\_POST](#reserved.variables.post) y [$\_FILES](#reserved.variables.files).

**Precaución**

    **request_parse_body()** consume el cuerpo de la petición sin
    almacenarlo en el búfer en el flujo php://input.

### Parámetros

    options


      El argumento options acepta un array asociativo
      para sobrescribir los parámetros globales de php.ini siguientes para
      el análisis del cuerpo de la petición.


      - max_file_uploads

      - max_input_vars

      - max_multipart_body_parts

      - post_max_size

      - upload_max_filesize



### Valores devueltos

**request_parse_body()** devuelve un array con el equivalente
de [$\_POST](#reserved.variables.post) en el índice 0 y
[$\_FILES](#reserved.variables.files) en el índice 1.

### Errores/Excepciones

Cuando el cuerpo de la petición no es válido
según la cabecera Content-Type,
se lanza una [RequestParseBodyException](#class.requestparsebodyexception).

Se lanza una [ValueError](#class.valueerror) cuando
options contiene claves no válidas,
o valores no válidos para la clave correspondiente.

### Ejemplos

**Ejemplo #1 Ejemplo de request_parse_body()**

&lt;?php
// Analiza la petición y almacena el resultado en las superglobales $_POST y $_FILES.
[$\_POST, $_FILES] = request_parse_body();
// Muestra el contenido de un fichero subido
echo file_get_contents($\_FILES['file_name']['tmp_name']);
?&gt;

**Ejemplo #2 Ejemplo de request_parse_body()** con opciones personalizadas

&lt;?php
// form.php

assert_logged_in();

// Solo para este formulario, se permite un tamaño de subida mayor.
[$_POST, $_FILES] = request_parse_body([
'post_max_size' =&gt; '10M',
'upload_max_filesize' =&gt; '10M',
]);

// Hacer algo con los ficheros subidos.
?&gt;

# setcookie

(PHP 4, PHP 5, PHP 7, PHP 8)

setcookie — Envía una cookie

### Descripción

**setcookie**(
    [string](#language.types.string) $name,
    [string](#language.types.string) $value = "",
    [int](#language.types.integer) $expires_or_options = 0,
    [string](#language.types.string) $path = "",
    [string](#language.types.string) $domain = "",
    [bool](#language.types.boolean) $secure = **[false](#constant.false)**,
    [bool](#language.types.boolean) $httponly = **[false](#constant.false)**
): [bool](#language.types.boolean)

Firma alternativa disponible a partir de PHP 7.3.0 (no soportado con parámetros nombrados):

**setcookie**([string](#language.types.string) $name, [string](#language.types.string) $value = "", [array](#language.types.array) $options = []): [bool](#language.types.boolean)

**setcookie()** define una cookie que será enviada
junto con el resto de los encabezados HTTP. Al igual que con otros encabezados, las cookies
deben ser enviadas _antes_ de cualquier otra salida
(esto es una restricción del protocolo HTTP, no de PHP). Esto impone
la necesidad de llamar a esta función antes de cualquier etiqueta &lt;html&gt;
o &lt;head&gt; y también de caracteres de espacio en blanco.

Una vez que las cookies han sido establecidas, estarán disponibles durante
el próximo cargado de página en el array [$\_COOKIE](#reserved.variables.cookies).
Los valores de las cookies
también pueden existir en la variable [$\_REQUEST](#reserved.variables.request).

### Parámetros

La [» RFC 6265](https://datatracker.ietf.org/doc/html/rfc6265) es la referencia para
la interpretación de los argumentos pasados a **setcookie()**.

     name


       El nombre de la cookie.






     value


        El valor de la cookie. Este valor se almacena en el ordenador del cliente;
        no se deben almacenar información importante.
        Si el argumento name vale 'cookiename',
        este valor es recuperado con [$_COOKIE['cookiename']](#reserved.variables.cookies).






     expires_or_options


       El tiempo después del cual la cookie expira. Esto es un timestamp Unix, por lo tanto,
       será un número de segundos desde la época Unix (1 de enero de 1970).
       Una forma de definir este valor es añadiendo el número de segundos antes
       de que la cookie expire al resultado de una llamada a [time()](#function.time).
       Por ejemplo time()+60*60*24*30 configurará la cookie para
       que expire en 30 días. Otra posibilidad es utilizar la función
       [mktime()](#function.mktime). Si no se especifica este argumento o si vale 0, la cookie expirará
       al final de la sesión (cuando el navegador se cierre).






**Nota**:

         Se notará que el argumento expires_or_options toma un
         timestamp único, y no la fecha en formato Día, DD-Mes-AAAA
         HH:MM:SS GMT, ya que PHP realiza la conversión internamente.








     path


       La ruta en el servidor donde la cookie estará disponible.
       Si el valor es '/', la cookie estará disponible
       en todo el dominio domain. Si el valor
       es '/foo/', la cookie estará únicamente disponible
       en el directorio /foo/ así como todos sus
       subdirectorios como /foo/bar/ en el dominio
       domain. El valor por omisión es el directorio
       actual donde la cookie fue definida.






     domain


       El (sub-)dominio para el cual la cookie está disponible. Definir esto a un
       subdominio (tal como 'www.example.com') hará que la cookie
       esté disponible para este subdominio así como todos sus subdominios
       (por ejemplo: w2.www.example.com). Para hacer que la cookie
       esté disponible en todo el dominio (así como todos sus subdominios), simplemente
       defina el valor con el nombre de dominio ('example.com',
       en este ejemplo).




       Los navegadores antiguos que continúan implementando la
       [» RFC 2109](https://datatracker.ietf.org/doc/html/rfc2109) (obsoleta)
       pueden requerir un . para hacer disponible
       todos los subdominios.






     secure


       Indica si la cookie debe ser transmitida únicamente a través de una
       conexión segura HTTPS desde el cliente. Cuando este argumento
       vale **[true](#constant.true)**, la cookie solo será enviada si la conexión es segura.
       Del lado del servidor, es responsabilidad del desarrollador enviar este tipo de cookie
       únicamente en conexiones seguras (por ejemplo, utilizando
       la variable [$_SERVER["HTTPS"]](#reserved.variables.server)).






     httponly


       Cuando este argumento vale **[true](#constant.true)**, la cookie solo será accesible por
       el protocolo HTTP. Esto significa que la cookie no será accesible
       vía lenguajes de script, como Javascript. Se ha sugerido que esta
       configuración permite limitar ataques XSS (aunque no es soportada por todos los navegadores),
       sin embargo este hecho es frecuentemente cuestionado.
       **[true](#constant.true)** o **[false](#constant.false)**






     options


       Un [array](#language.types.array) asociativo que puede tener como claves
       expires, path, domain,
       secure, httponly y samesite.
       Si otra clave está presente, se emite un error de nivel
       **[E_WARNING](#constant.e-warning)**. Los valores tienen el mismo significado que los descritos para los argumentos
       con el mismo nombre. El valor del elemento samesite debe
       ser None, Lax o Strict.
       Si una opción autorizada no es dada, entonces su valor por omisión será
       idéntico al valor por omisión de los argumentos explícitos. Si el elemento
       samesite es omitido, entonces el atributo SameSite de la cookie
       no será definido.






**Nota**:

         Para definir una cookie que incluye atributos que no figuran entre las claves listadas,
         utilice [header()](#function.header).







### Valores devueltos

Si algo fue enviado a la salida estándar antes de la llamada
a esta función, **setcookie()** fallará y
retornará **[false](#constant.false)**. Si **setcookie()** tiene éxito,
retornará **[true](#constant.true)**.
Esto no indica si el cliente acepta o no la cookie.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        La fecha de la cookie está en formato 'D, d M Y H:i:s \G\M\T';
        previamente era 'D, d-M-Y H:i:s T'.




       7.3.0

        Se añadió una firma alternativa que soporta un array
        de options. Esta firma soporta la definición del atributo SameSite de la cookie.





### Ejemplos

Los siguientes ejemplos demuestran algunas formas de enviar cookies.

    **Ejemplo #1 Ejemplo de envío de una cookie con setcookie()**

&lt;?php

$value = 'Valor de prueba';

setcookie("TestCookie", $value);
setcookie("TestCookie", $value, time()+3600); /_ expira en 1 hora _/
setcookie("TestCookie", $value, time()+3600, "/~rasmus/", "example.com", true);
?&gt;

Tenga en cuenta que la parte "valor" de la cookie será automáticamente
codificada URL al enviar la cookie y, al recibirla,
será automáticamente decodificada y asignada a la variable con el mismo nombre que la cookie. Si no desea
este comportamiento por omisión, puede utilizar la función
[setrawcookie()](#function.setrawcookie).
Para ver el resultado, pruebe los siguientes scripts:

&lt;?php
// Mostrar una cookie
echo $\_COOKIE["TestCookie"];

// Otro método para mostrar todas las cookies
print_r($\_COOKIE);
?&gt;

    **Ejemplo #2 Ejemplo de borrado de una cookie con setcookie()**



     Para borrar una cookie en el cliente, siempre debe asegurarse
     de que su fecha de expiración haya pasado, para activar
     el mecanismo del navegador cliente. Esto se hace de la siguiente manera:

&lt;?php
// Define la fecha de expiración a una hora antes de la fecha actual
setcookie("TestCookie", "", time() - 3600);
setcookie("TestCookie", "", time() - 3600, "/~rasmus/", "example.com", 1);
?&gt;

    **Ejemplo #3 setcookie()** y los arrays



     También puede utilizar cookies con arrays, utilizando la
     notación de arrays. Esto tiene el efecto de crear tantas
     cookies como elementos tenga su array, pero cuando
     las cookies sean recibidas por su script, los valores serán
     colocados en un array:

&lt;?php
// Define las cookies
setcookie("cookie[three]", "cookiethree");
setcookie("cookie[two]", "cookietwo");
setcookie("cookie[one]", "cookieone");

// Después del recargado de la página, las mostramos
if (isset($_COOKIE['cookie'])) {
    foreach ($\_COOKIE['cookie'] as $name =&gt; $value) {
        $name = htmlspecialchars($name);
$value = htmlspecialchars($value);
echo "$name : $value &lt;br /&gt;\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

three : cookiethree
two : cookietwo
one : cookieone

**Nota**:

     El uso de caracteres de separación como [ y
     ] como parte del nombre de la cookie no es respetuoso con la RFC 6265, sección 4, pero se asume que es soportado
     por los agentes de usuario, siguiendo la RFC 6265, sección 5.

### Notas

**Nota**:

    Puede utilizar un buffer de salida para poder
    enviar contenido antes de llamar a esta función, con la contrapartida
    de que toda su página será enviada de una vez. Puede hacer esto
    llamando a [ob_start()](#function.ob-start) y [ob_end_flush()](#function.ob-end-flush)
    en su script, o activando la directiva output_buffering
    en su archivo de configuración php.ini o en el archivo de configuración
    de su servidor.

Errores comunes:

    -

      Las cookies solo serán accesibles al cargar la próxima página,
      o al recargar la página actual. Para probar si una cookie
      ha sido definida con éxito, verifique la presencia de la cookie en el próximo
      cargado de página antes de que la cookie expire. El tiempo de expiración
      se define utilizando el argumento expires_or_options.
      Una forma sencilla de verificar el posicionamiento de la cookie es utilizar
      print_r($_COOKIE);.



    -

      Las cookies deben ser borradas con los mismos argumentos
      que los utilizados durante su creación. Si el argumento
      value es una cadena vacía y los otros argumentos son exactamente los mismos que en una llamada **setcookie()** previa,
      entonces la cookie será borrada del cliente.
      Internamente, el borrado se realiza posicionando el valor a
      'deleted' y la fecha de expiración a un año en el pasado.



    -

      Dado que la asignación de un valor valiendo **[false](#constant.false)** a una cookie
      intenta borrarla, no se debe utilizar un [bool](#language.types.boolean).
      En su lugar, utilice *0* para **[false](#constant.false)**
      y *1* para **[true](#constant.true)**.



    -

      Los nombres de las cookies pueden ser arrays de nombres y estarán
      disponibles en sus scripts PHP en forma de arrays, pero
      cookies diferentes serán colocadas en el cliente.
      Utilice [explode()](#function.explode) para colocar una cookie
      con nombres y valores múltiples. No se recomienda utilizar
      la función [serialize()](#function.serialize) para hacer esto, ya que
      puede llevar a problemas de seguridad.


Las llamadas múltiples a la función **setcookie()**
se realizarán en orden.

### Ver también

    - [header()](#function.header) - Envía un encabezado HTTP bruto

    - [setrawcookie()](#function.setrawcookie) - Envía un cookie sin codificar su valor en URL

    - [Sección sobre cookies](#features.cookies)

    - [» RFC 6265](https://datatracker.ietf.org/doc/html/rfc6265)

    - [» RFC 2109](https://datatracker.ietf.org/doc/html/rfc2109)

# setrawcookie

(PHP 5, PHP 7, PHP 8)

setrawcookie — Envía un cookie sin codificar su valor en URL

### Descripción

**setrawcookie**(
    [string](#language.types.string) $name,
    [string](#language.types.string) $value = ?,
    [int](#language.types.integer) $expires_or_options = 0,
    [string](#language.types.string) $path = ?,
    [string](#language.types.string) $domain = ?,
    [bool](#language.types.boolean) $secure = **[false](#constant.false)**,
    [bool](#language.types.boolean) $httponly = **[false](#constant.false)**
): [bool](#language.types.boolean)

Firma alternativa disponible a partir de PHP 7.3.0 (no soportado con argumentos nombrados):

**setrawcookie**([string](#language.types.string) $name, [string](#language.types.string) $value = ?, [array](#language.types.array) $options = []): [bool](#language.types.boolean)

**setrawcookie()** es idéntica a
[setcookie()](#function.setcookie) excepto que el valor del cookie no será
automáticamente codificado en URL al enviarlo al navegador.

### Parámetros

Para más información, consúltese la documentación de la
función [setcookie()](#function.setcookie).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        Se ha añadido una firma alternativa que soporta un array
        de options. Esta firma permite
        definir el atributo SameSite del cookie.





### Ver también

    - [setcookie()](#function.setcookie) - Envía una cookie

# socket_get_status

(PHP 4, PHP 5, PHP 7, PHP 8)

socket_get_status — Alias de [stream_get_meta_data()](#function.stream-get-meta-data)

### Descripción

Esta función es un alias de: [stream_get_meta_data()](#function.stream-get-meta-data).

# socket_set_blocking

(PHP 4, PHP 5, PHP 7, PHP 8)

socket_set_blocking — Alias de [stream_set_blocking()](#function.stream-set-blocking)

### Descripción

Esta función es un alias de: [stream_set_blocking()](#function.stream-set-blocking).

# socket_set_timeout

(PHP 4, PHP 5, PHP 7, PHP 8)

socket_set_timeout — Alias de [stream_set_timeout()](#function.stream-set-timeout)

### Descripción

Esta función es un alias de: [stream_set_timeout()](#function.stream-set-timeout).

# syslog

(PHP 4, PHP 5, PHP 7, PHP 8)

syslog — Genera un mensaje en el historial del sistema

### Descripción

**syslog**([int](#language.types.integer) $priority, [string](#language.types.string) $message): [true](#language.types.singleton)

**syslog()** genera un mensaje que
será registrado en el historial por el sistema.

Para más información sobre cómo configurar un gestor
de historial, consúltese el manual Unix, página 5
syslog.conf
(5). Otra información
sobre los sistemas de historial y sus opciones también
está disponible en el manual syslog
(3) de las máquinas Unix.

### Parámetros

     priority


       Una de las
       **[LOG_EMERG](#constant.log-emerg)**, **[LOG_ALERT](#constant.log-alert)**, **[LOG_CRIT](#constant.log-crit)**, **[LOG_ERR](#constant.log-err)**, **[LOG_WARNING](#constant.log-warning)**, **[LOG_NOTICE](#constant.log-notice)**, **[LOG_INFO](#constant.log-info)**, **[LOG_DEBUG](#constant.log-debug)**
       constantes.






     message


       El mensaje a enviar.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con syslog()**

&lt;?php
// apertura de syslog, adición del PID y envío simultáneo del
// mensaje a la salida estándar y a un mecanismo
// específico
openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

// algunas líneas de código

if (authorized_client()) {
// hacer algo
} else {
// cliente no autorizado!
// registro del intento
$access = date("Y/m/d H:i:s");
    syslog(LOG_WARNING, "Cliente no autorizado: $access {$\_SERVER['REMOTE_ADDR']} ({$\_SERVER['HTTP_USER_AGENT']})");
}

closelog();
?&gt;

### Notas

En Windows, el historial es gestionado por el registro de eventos.

**Nota**:

    El uso de **[LOG_LOCAL0](#constant.log-local0)** a
    LOG_LOCAL7 para el argumento
    facility de la función [openlog()](#function.openlog)
    no está disponible en Windows.

### Ver también

    - [openlog()](#function.openlog) - Abre la conexión al historial del sistema

    - [closelog()](#function.closelog) - Cierra la conexión al registro del sistema

    - Parámetro INI [syslog.filter](#ini.syslog.filter) (a partir de PHP 7.3)

## Tabla de contenidos

- [checkdnsrr](#function.checkdnsrr) — Resolución DNS de una dirección IP
- [closelog](#function.closelog) — Cierra la conexión al registro del sistema
- [dns_check_record](#function.dns-check-record) — Alias de checkdnsrr
- [dns_get_mx](#function.dns-get-mx) — Alias de getmxrr
- [dns_get_record](#function.dns-get-record) — Lee los datos DNS asociados a un host
- [fsockopen](#function.fsockopen) — Abre un socket de conexión Internet o Unix
- [gethostbyaddr](#function.gethostbyaddr) — Devuelve el nombre de host correspondiente a una IP
- [gethostbyname](#function.gethostbyname) — Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado
- [gethostbynamel](#function.gethostbynamel) — Devuelve la lista de direcciones IPv4 correspondientes a un host
- [gethostname](#function.gethostname) — Lee el nombre del host
- [getmxrr](#function.getmxrr) — Devuelve los registros MX de un host
- [getprotobyname](#function.getprotobyname) — Devuelve el número de protocolo asociado a un nombre de protocolo
- [getprotobynumber](#function.getprotobynumber) — Devuelve el nombre de protocolo asociado a un número de protocolo
- [getservbyname](#function.getservbyname) — Devuelve el número de puerto asociado a un servicio de Internet y un protocolo
- [getservbyport](#function.getservbyport) — Devuelve el servicio de Internet que corresponde al puerto y protocolo
- [header](#function.header) — Envía un encabezado HTTP bruto
- [header_register_callback](#function.header-register-callback) — Llamar a una función de cabecera
- [header_remove](#function.header-remove) — Elimina un encabezado HTTP
- [headers_list](#function.headers-list) — Devuelve la lista de los encabezados de respuesta del script actual
- [headers_sent](#function.headers-sent) — Indica si los encabezados HTTP ya han sido enviados
- [http_clear_last_response_headers](#function.http-clear-last-response-headers) — Borra los encabezados de respuesta HTTP almacenados
- [http_get_last_response_headers](#function.http-get-last-response-headers) — Obtiene los últimos encabezados de respuesta HTTP
- [http_response_code](#function.http-response-code) — Obtiene o define el código de respuesta HTTP
- [inet_ntop](#function.inet-ntop) — Convierte un paquete de direcciones internet en una representación legible por humanos
- [inet_pton](#function.inet-pton) — Convierte una dirección IP legible en su representación in_addr
- [ip2long](#function.ip2long) — Convierte una cadena que contiene una dirección (IPv4) en notación decimal con puntos en una dirección entera larga
- [long2ip](#function.long2ip) — Convierte un entero largo (IPv4) a su notación decimal con puntos
- [net_get_interfaces](#function.net-get-interfaces) — Devuelve las interfaces de red
- [openlog](#function.openlog) — Abre la conexión al historial del sistema
- [pfsockopen](#function.pfsockopen) — Se abre un socket de conexión Internet o Unix persistente
- [request_parse_body](#function.request-parse-body) — Lee y analiza el cuerpo de la petición y devuelve el resultado
- [setcookie](#function.setcookie) — Envía una cookie
- [setrawcookie](#function.setrawcookie) — Envía un cookie sin codificar su valor en URL
- [socket_get_status](#function.socket-get-status) — Alias de stream_get_meta_data
- [socket_set_blocking](#function.socket-set-blocking) — Alias de stream_set_blocking
- [socket_set_timeout](#function.socket-set-timeout) — Alias de stream_set_timeout
- [syslog](#function.syslog) — Genera un mensaje en el historial del sistema

- [Introducción](#intro.network)
- [Instalación/Configuración](#network.setup)<li>[Requerimientos](#network.requirements)
- [Tipos de recursos](#network.resources)
  </li>- [Constantes predefinidas](#network.constants)
- [Funciones de red](#ref.network)<li>[checkdnsrr](#function.checkdnsrr) — Resolución DNS de una dirección IP
- [closelog](#function.closelog) — Cierra la conexión al registro del sistema
- [dns_check_record](#function.dns-check-record) — Alias de checkdnsrr
- [dns_get_mx](#function.dns-get-mx) — Alias de getmxrr
- [dns_get_record](#function.dns-get-record) — Lee los datos DNS asociados a un host
- [fsockopen](#function.fsockopen) — Abre un socket de conexión Internet o Unix
- [gethostbyaddr](#function.gethostbyaddr) — Devuelve el nombre de host correspondiente a una IP
- [gethostbyname](#function.gethostbyname) — Obtener la dirección IPv4 que corresponde a un nombre de host de Internet dado
- [gethostbynamel](#function.gethostbynamel) — Devuelve la lista de direcciones IPv4 correspondientes a un host
- [gethostname](#function.gethostname) — Lee el nombre del host
- [getmxrr](#function.getmxrr) — Devuelve los registros MX de un host
- [getprotobyname](#function.getprotobyname) — Devuelve el número de protocolo asociado a un nombre de protocolo
- [getprotobynumber](#function.getprotobynumber) — Devuelve el nombre de protocolo asociado a un número de protocolo
- [getservbyname](#function.getservbyname) — Devuelve el número de puerto asociado a un servicio de Internet y un protocolo
- [getservbyport](#function.getservbyport) — Devuelve el servicio de Internet que corresponde al puerto y protocolo
- [header](#function.header) — Envía un encabezado HTTP bruto
- [header_register_callback](#function.header-register-callback) — Llamar a una función de cabecera
- [header_remove](#function.header-remove) — Elimina un encabezado HTTP
- [headers_list](#function.headers-list) — Devuelve la lista de los encabezados de respuesta del script actual
- [headers_sent](#function.headers-sent) — Indica si los encabezados HTTP ya han sido enviados
- [http_clear_last_response_headers](#function.http-clear-last-response-headers) — Borra los encabezados de respuesta HTTP almacenados
- [http_get_last_response_headers](#function.http-get-last-response-headers) — Obtiene los últimos encabezados de respuesta HTTP
- [http_response_code](#function.http-response-code) — Obtiene o define el código de respuesta HTTP
- [inet_ntop](#function.inet-ntop) — Convierte un paquete de direcciones internet en una representación legible por humanos
- [inet_pton](#function.inet-pton) — Convierte una dirección IP legible en su representación in_addr
- [ip2long](#function.ip2long) — Convierte una cadena que contiene una dirección (IPv4) en notación decimal con puntos en una dirección entera larga
- [long2ip](#function.long2ip) — Convierte un entero largo (IPv4) a su notación decimal con puntos
- [net_get_interfaces](#function.net-get-interfaces) — Devuelve las interfaces de red
- [openlog](#function.openlog) — Abre la conexión al historial del sistema
- [pfsockopen](#function.pfsockopen) — Se abre un socket de conexión Internet o Unix persistente
- [request_parse_body](#function.request-parse-body) — Lee y analiza el cuerpo de la petición y devuelve el resultado
- [setcookie](#function.setcookie) — Envía una cookie
- [setrawcookie](#function.setrawcookie) — Envía un cookie sin codificar su valor en URL
- [socket_get_status](#function.socket-get-status) — Alias de stream_get_meta_data
- [socket_set_blocking](#function.socket-set-blocking) — Alias de stream_set_blocking
- [socket_set_timeout](#function.socket-set-timeout) — Alias de stream_set_timeout
- [syslog](#function.syslog) — Genera un mensaje en el historial del sistema
  </li>
