# SNMP

# Introducción

La extensión SNMP proporciona un conjunto de herramientas muy simple y fácil
de usar para controlar dispositivos remotos a través del Simple Network
Management Protocol.

Dado que es un contenedor de la biblioteca Net-SNMP,
todos los conceptos básicos son los mismos y las funciones PHP cambian su
comportamiento dependiendo de los archivos de configuración de Net-SNMP y
las variables de entorno.

Puede encontrar más información sobre Net-SNMP en
[» http://www.net-snmp.org/](http://www.net-snmp.org/)

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#snmp.requirements)
- [Instalación](#snmp.installation)

    ## Requerimientos

    Para utilizar las funciones SNMP, es necesario instalar el
    paquete [» NET-SNMP](http://www.net-snmp.org/).
    Las funciones SNMPv3 solo están disponibles cuando el paquete
    [» OpenSSL](http://www.openssl.org/) está instalado.

    La versión Net-SNMP 5.3+ es necesaria para
    las instalaciones en Unix, y la versión Net-SNMP 5.4+ para Windows.

## Instalación

La distribución Windows de [» Net-SNMP](http://www.net-snmp.org/) contiene los ficheros SNMP en la
carpeta mibs. Esta carpeta debe ser incluida
en las variables de entorno de Windows, como MIBDIRS, con el valor
de la ruta completa hacia la carpeta mibs
: i.e. c:\usr\mibs.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Para [snmp_set_oid_output_format()](#function.snmp-set-oid-output-format)**

    **[SNMP_OID_OUTPUT_SUFFIX](#constant.snmp-oid-output-suffix)**
    ([int](#language.types.integer))








    **[SNMP_OID_OUTPUT_MODULE](#constant.snmp-oid-output-module)**
    ([int](#language.types.integer))








    **[SNMP_OID_OUTPUT_FULL](#constant.snmp-oid-output-full)**
    ([int](#language.types.integer))








    **[SNMP_OID_OUTPUT_NUMERIC](#constant.snmp-oid-output-numeric)**
    ([int](#language.types.integer))








    **[SNMP_OID_OUTPUT_UCD](#constant.snmp-oid-output-ucd)**
    ([int](#language.types.integer))








    **[SNMP_OID_OUTPUT_NONE](#constant.snmp-oid-output-none)**
    ([int](#language.types.integer))

**Para [snmp_set_valueretrieval()](#function.snmp-set-valueretrieval)**

    **[SNMP_VALUE_LIBRARY](#constant.snmp-value-library)**
    ([int](#language.types.integer))









    **[SNMP_VALUE_PLAIN](#constant.snmp-value-plain)**
    ([int](#language.types.integer))









    **[SNMP_VALUE_OBJECT](#constant.snmp-value-object)**
    ([int](#language.types.integer))

**Tipos SNMP como devueltos si SNMP_VALUE_OBJECT ha sido utilizado
con [snmp_set_valueretrieval()](#function.snmp-set-valueretrieval)
**

    **[SNMP_BIT_STR](#constant.snmp-bit-str)**
    ([int](#language.types.integer))









    **[SNMP_OCTET_STR](#constant.snmp-octet-str)**
    ([int](#language.types.integer))









    **[SNMP_OPAQUE](#constant.snmp-opaque)**
    ([int](#language.types.integer))









    **[SNMP_NULL](#constant.snmp-null)**
    ([int](#language.types.integer))









    **[SNMP_OBJECT_ID](#constant.snmp-object-id)**
    ([int](#language.types.integer))









    **[SNMP_IPADDRESS](#constant.snmp-ipaddress)**
    ([int](#language.types.integer))









    **[SNMP_COUNTER](#constant.snmp-counter)**
    ([int](#language.types.integer))









    **[SNMP_UNSIGNED](#constant.snmp-unsigned)**
    ([int](#language.types.integer))









    **[SNMP_TIMETICKS](#constant.snmp-timeticks)**
    ([int](#language.types.integer))









    **[SNMP_UINTEGER](#constant.snmp-uinteger)**
    ([int](#language.types.integer))









    **[SNMP_INTEGER](#constant.snmp-integer)**
    ([int](#language.types.integer))









    **[SNMP_COUNTER64](#constant.snmp-counter64)**
    ([int](#language.types.integer))

# Funciones SNMP

# snmp_get_quick_print

(PHP 4, PHP 5, PHP 7, PHP 8)

snmp_get_quick_print —
Lee el valor actual de la opción quick_print de la biblioteca NET-SNMP

### Descripción

**snmp_get_quick_print**(): [bool](#language.types.boolean)

**snmp_get_quick_print()** devuelve el valor actual,
almacenado en la biblioteca NET-SNMP, de la opción quick_print.
Por omisión, quick_print está desactivada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si quick_print está activa, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp_get_quick_print()**

&lt;?php
$quickprint = snmp_get_quick_print();
?&gt;

### Ver también

    - [snmp_set_quick_print()](#function.snmp-set-quick-print) - Escribe el valor actual de la opción enable de la biblioteca NET-SNMP para una descripción completa
     sobre lo que hace quick_print.

# snmp_get_valueretrieval

(PHP 4 &gt;= 4.3.3, PHP 5, PHP 7, PHP 8)

snmp_get_valueretrieval —
Devuelve el método con el cual los valores SNMP serán devueltos

### Descripción

**snmp_get_valueretrieval**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una combinación de constantes ( **[SNMP_VALUE_LIBRARY](#constant.snmp-value-library)** o
**[SNMP_VALUE_PLAIN](#constant.snmp-value-plain)** ) con eventualmente una
definición de SNMP_VALUE_OBJECT.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp_get_valueretrieval()**

&lt;?php
$ret = snmpget('localhost', 'public', 'IF-MIB::ifName.1');
if (snmp_get_valueretrieval() &amp; SNMP_VALUE_OBJECT) {
echo $ret-&gt;value;
} else {
echo $ret;
}
?&gt;

### Ver también

    -
     [snmp_set_valueretrieval()](#function.snmp-set-valueretrieval) - Especifica el método con el cual los valores SNMP serán devueltos


    - [Constantes predefinidas](#snmp.constants)

# snmp_read_mib

(PHP 5, PHP 7, PHP 8)

snmp_read_mib —
Lee y analiza un fichero MIB en el árbol activo MIB

### Descripción

**snmp_read_mib**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Esta función se utiliza para cargar MIBs adicionales, es decir,
específicas de los fabricantes, de modo que los OIDs legibles por humanos como
VENDOR-MIB::foo.1 en lugar de los OIDs numéricos puedan ser utilizados.

El orden de carga de los MIBs es importante; la biblioteca Net-SNMP
mostrará alertas si los objetos referenciados no pueden ser resueltos.

### Parámetros

     filename
     El nombre del fichero MIB.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp_read_mib()**

&lt;?php
print_r( snmprealwalk('localhost', 'public', '.1.3.6.1.2.1.2.3.4.5') );

snmp_read_mib('./FOO-BAR-MIB.txt');
print_r( snmprealwalk('localhost', 'public', 'FOO-BAR-MIB::someTable') );
?&gt;

El ejemplo a continuación mostrará algo como:

Array
(
[iso.3.6.1.2.1.2.3.4.5.0] =&gt; Gauge32: 6
)
Array
(
[FOO-BAR-MIB::someTable.0] =&gt; Gauge32: 6
)

# snmp_set_enum_print

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

snmp_set_enum_print —
Devuelve todos los valores que son enumeraciones con su valor de enumeración en lugar del entero

### Descripción

**snmp_set_enum_print**([bool](#language.types.boolean) $enable): [true](#language.types.singleton)

Esta función permite alternar si snmpwalk/snmpget etc.
debe buscar automáticamente los valores enumerados en el MIB
y los devuelve con su string legible por humanos.

### Parámetros

    enable


      Dado que el valor es interpretado como un bool por
      la biblioteca Net-SNMP library, puede valer "0" o "1".


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp_set_enum_print()**

&lt;?php
snmp_set_enum_print(0);
echo snmpget('localhost', 'public', 'IF-MIB::ifOperStatus.3') . "\n";
snmp_set_enum_print(1);
echo snmpget('localhost', 'public', 'IF-MIB::ifOperStatus.3') . "\n";
?&gt;

El ejemplo anterior mostrará:

INTEGER: up(1)
INTEGER: 1

# snmp_set_oid_numeric_print

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

snmp_set_oid_numeric_print — Alias de [snmp_set_oid_output_format()](#function.snmp-set-oid-output-format)

### Descripción

Esta función es un alias de: [snmp_set_oid_output_format()](#function.snmp-set-oid-output-format).

### Ver también

    - [snmp_set_oid_output_format()](#function.snmp-set-oid-output-format) - Define el formato de salida OID

# snmp_set_oid_output_format

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

snmp_set_oid_output_format — Define el formato de salida OID

### Descripción

**snmp_set_oid_output_format**([int](#language.types.integer) $format): [true](#language.types.singleton)

**snmp_set_oid_output_format()** define
el formato de salida para que sea completo o numérico.

### Parámetros

     format


       <caption>**Representación OID .1.3.6.1.2.1.1.3.0 para varios valores de format**</caption>


         **[SNMP_OID_OUTPUT_FULL](#constant.snmp-oid-output-full)**.iso.org.dod.internet.mgmt.mib-2.system.sysUpTime.sysUpTimeInstance

         **[SNMP_OID_OUTPUT_NUMERIC](#constant.snmp-oid-output-numeric)**.1.3.6.1.2.1.1.3.0

         **[SNMP_OID_OUTPUT_MODULE](#constant.snmp-oid-output-module)**DISMAN-EVENT-MIB::sysUpTimeInstance

         **[SNMP_OID_OUTPUT_SUFFIX](#constant.snmp-oid-output-suffix)**sysUpTimeInstance

         **[SNMP_OID_OUTPUT_UCD](#constant.snmp-oid-output-ucd)**system.sysUpTime.sysUpTimeInstance

         **[SNMP_OID_OUTPUT_NONE](#constant.snmp-oid-output-none)**Undefined







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con [snmprealwalk()](#function.snmprealwalk)**

&lt;?php

snmp_read_mib("/usr/share/mibs/netsnmp/NET-SNMP-TC");

// por omisión o SNMP_OID_OUTPUT_MODULE
print_r( snmprealwalk('localhost', 'public', 'RFC1213-MIB::sysObjectID') );

snmp_set_oid_output_format(SNMP_OID_OUTPUT_NUMERIC);
print_r( snmprealwalk('localhost', 'public', 'RFC1213-MIB::sysObjectID') );

snmp_set_oid_output_format(SNMP_OID_OUTPUT_FULL);
print_r( snmprealwalk('localhost', 'public', 'RFC1213-MIB::sysObjectID') );
?&gt;

     El ejemplo anterior mostrará:

Array
(
[RFC1213-MIB::sysObjectID.0] =&gt; OID: NET-SNMP-TC::linux
)
Array
(
[.1.3.6.1.2.1.1.2.0] =&gt; OID: .1.3.6.1.4.1.8072.3.2.10
)
Array
(
[.iso.org.dod.internet.mgmt.mib-2.system.sysObjectID.0] =&gt; OID: .iso.org.dod.internet.private.enterprises.netSnmp.netSnmpEnumerations.netSnmpAgentOIDs.linux
)

# snmp_set_quick_print

(PHP 4, PHP 5, PHP 7, PHP 8)

snmp_set_quick_print — Escribe el valor actual de la opción enable de la biblioteca NET-SNMP

### Descripción

**snmp_set_quick_print**([bool](#language.types.boolean) $enable): [true](#language.types.singleton)

Fija el valor de la opción enable de la biblioteca NET-SNMP. Cuando
tiene el valor de (1), la biblioteca SNMP devolverá
valores 'rápidos'. Esto significa que solo se devolverá el valor. Cuando la opción enable no está
activada (por omisión), la biblioteca NET-SNMP mostrará
otra información (como la dirección IP (IpAddress) o OID).
Además, si quick_print no está activada, la biblioteca también mostrará valores hexadecimales adicionales para todas las
cadenas de tres caracteres o menos.

Por omisión, NET-SNMP devuelve valores
detallados, y quick_print sirve para devolver solo el valor.

Actualmente, las cadenas siempre se devuelven
con comillas adicionales. Esto se corregirá
posteriormente.

### Parámetros

     enable







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

Modificar enable es más frecuente
cuando se utilizan los valores devueltos que cuando se muestran.

    **Ejemplo #1 Ejemplo con snmp_set_quick_print()**

&lt;?php
snmp_set_quick_print(0);
$a = snmpget("127.0.0.1", "public", ".1.3.6.1.2.1.2.2.1.9.1");
echo "$a\n";
snmp_set_quick_print(1);
$a = snmpget("127.0.0.1", "public", ".1.3.6.1.2.1.2.2.1.9.1");
echo "$a\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

'Timeticks: (0) 0:00:00.00'
'0:00:00.00'

### Ver también

    - [snmp_get_quick_print()](#function.snmp-get-quick-print) - Lee el valor actual de la opción quick_print de la biblioteca NET-SNMP

# snmp_set_valueretrieval

(PHP 4 &gt;= 4.3.3, PHP 5, PHP 7, PHP 8)

snmp_set_valueretrieval —
Especifica el método con el cual los valores SNMP serán devueltos

### Descripción

**snmp_set_valueretrieval**([int](#language.types.integer) $method): [true](#language.types.singleton)

### Parámetros

      method



       <caption>**types**</caption>



          SNMP_VALUE_LIBRARY

           Los valores devueltos serán aquellos devueltos por la biblioteca
           Net-SNMP.




          SNMP_VALUE_PLAIN

           Los valores devueltos serán brutos, sin la información
           del tipo SNMP.




          SNMP_VALUE_OBJECT

           Los valores devueltos serán objetos con las propiedades
           value y type, donde la segunda es una de las constantes
           **[SNMP_OCTET_STR](#constant.snmp-octet-str)**, **[SNMP_COUNTER](#constant.snmp-counter)** etc.
           La forma en que la value es devuelta se basa
           en el uso de la constante
           **[SNMP_VALUE_LIBRARY](#constant.snmp-value-library)** o de
           la constante **[SNMP_VALUE_PLAIN](#constant.snmp-value-plain)**.









### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp_set_valueretrieval()**

&lt;?php
snmp_set_valueretrieval(SNMP_VALUE_LIBRARY);
$ret = snmpget('localhost', 'public', 'IF-MIB::ifName.1');
// $ret = "STRING: lo"

snmp_set_valueretrieval(SNMP_VALUE_PLAIN);
$ret = snmpget('localhost', 'public', 'IF-MIB::ifName.1');
// $ret = "lo";

snmp_set_valueretrieval(SNMP_VALUE_OBJECT);
$ret = snmpget('localhost', 'public', 'IF-MIB::ifName.1');
// stdClass Object
// (
// [type] =&gt; 4 &lt;-- SNMP_OCTET_STR, ver las constantes
// [value] =&gt; lo
// )

snmp_set_valueretrieval(SNMP_VALUE_OBJECT | SNMP_VALUE_PLAIN);
$ret = snmpget('localhost', 'public', 'IF-MIB::ifName.1');
// stdClass Object
// (
// [type] =&gt; 4 &lt;-- SNMP_OCTET_STR, ver las constantes
// [value] =&gt; lo
// )

snmp_set_valueretrieval(SNMP_VALUE_OBJECT | SNMP_VALUE_LIBRARY);
$ret = snmpget('localhost', 'public', 'IF-MIB::ifName.1');
// stdClass Object
// (
// [type] =&gt; 4 &lt;-- SNMP_OCTET_STR, ver las constantes
// [value] =&gt; STRING: lo
// )

?&gt;

### Ver también

    -
     [snmp_get_valueretrieval()](#function.snmp-get-valueretrieval) - Devuelve el método con el cual los valores SNMP serán devueltos


    - [Constantes predefinidas](#snmp.constants)

# snmp2_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

snmp2_get — Recupera un objeto SNMP

### Descripción

**snmp2_get**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [mixed](#language.types.mixed)

La función **snmp2_get()** se utiliza para leer
el valor de un objeto SNMP especificado por el parámetro
object_id.

### Parámetros

    hostname


      El agente SNMP.






    community


      La comunidad de lectura.






    object_id


      El identificador del objeto SNMP.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra el tiempo límite.


### Valores devueltos

Devuelve el valor del objeto SNMP
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp2_get()**

&lt;?php
$syscontact = snmp2_get("127.0.0.1", "public", "system.SysContact.0");
?&gt;

### Ver también

    - [snmp2_set()](#function.snmp2-set) - Define el valor de un objeto SNMP

# snmp2_getnext

(PHP &gt;= 5.2.0, PHP 7, PHP 8)

snmp2_getnext — Recupera el objeto SNMP que sigue inmediatamente
al identificador del objeto proporcionado

### Descripción

**snmp2_getnext**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [mixed](#language.types.mixed)

La función **snmp2_get_next()** se utiliza para leer
el valor del objeto SNMP que sigue inmediatamente
al objeto object_id especificado.

### Parámetros

    hostname


      El nombre de host del agente SNMP (servidor).






    community


      La comunidad de lectura.






    object_id


      El identificador del objeto SNMP
      que precede al deseado.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra un tiempo límite.


### Valores devueltos

Devuelve el valor del objeto SNMP
en caso de éxito, o **[false](#constant.false)** si ocurre un error.
En caso de error, se emitirá una alerta de tipo
E_WARNING.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp2_get_next()**

&lt;?php
$nameOfSecondInterface = snmp2_get_next('localhost', 'public', 'IF-MIB::ifName.1');
?&gt;

### Ver también

    - [snmp2_get()](#function.snmp2-get) - Recupera un objeto SNMP

    - [snmp2_walk()](#function.snmp2-walk) - Recupera todos los objetos SNMP desde un agente

# snmp2_real_walk

(PHP &gt;= 5.2.0, PHP 7, PHP 8)

snmp2_real_walk — Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos

### Descripción

**snmp2_real_walk**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

La función **snmp2_real_walk()** se utiliza para
recorrer un número de objetos SNMP comenzando por
el objeto identificado por object_id y devuelve
no solo sus valores, sino también los identificadores de sus objetos.

### Parámetros

    hostname


      El nombre de host del agente SNMP (servidor).






    community


      La comunidad de lectura.






    object_id


      El identificador del objeto SNMP
      que precede al deseado.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que el tiempo límite
      ocurra.


### Valores devueltos

Devuelve un array asociativo de identificadores de objetos
SNMP así como sus valores en caso de éxito
o **[false](#constant.false)** si ocurre un error.
En caso de error, se emitirá una alerta de tipo
E_WARNING.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp2_real_walk()**

&lt;?php
print_r(snmp2_real_walk("localhost", "public", "IF-MIB::ifName"));
?&gt;

     El ejemplo anterior mostrará algo como:

Array
(
[IF-MIB::ifName.1] =&gt; STRING: lo
[IF-MIB::ifName.2] =&gt; STRING: eth0
[IF-MIB::ifName.3] =&gt; STRING: eth2
[IF-MIB::ifName.4] =&gt; STRING: sit0
[IF-MIB::ifName.5] =&gt; STRING: sixxs
)

### Ver también

    - [snmp2_walk()](#function.snmp2-walk) - Recupera todos los objetos SNMP desde un agente

# snmp2_set

(PHP &gt;= 5.2.0, PHP 7, PHP 8)

snmp2_set — Define el valor de un objeto SNMP

### Descripción

**snmp2_set**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [array](#language.types.array)|[string](#language.types.string) $type,
    [array](#language.types.array)|[string](#language.types.string) $value,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [bool](#language.types.boolean)

La función **snmp2_set()** se utiliza para
definir el valor de un objeto SNMP
especificado por su identificador object_id.

### Parámetros

    hostname


      El nombre del host del agente SNMP (servidor).






    community


      La comunidad de escritura.






    object_id


      El identificador del objeto SNMP.






    type



El MIB define el tipo de cada identificador de objeto. Debe
ser especificado como un carácter simple de la lista siguiente.

<caption>**tipos**</caption>

        =El tipo es recuperado desde el MIB

        iINTEGER

        uINTEGER

        sSTRING

        xHEX STRING

        dDECIMAL STRING

        nNULLOBJ

        oOBJID

        tTIMETICKS

        aIPADDRESS

        bBITS

Si la constante **[OPAQUE_SPECIAL_TYPES](#constant.opaque-special-types)** ha sido definida durante
la compilación de la biblioteca SNMP, los caracteres siguientes
también estarán disponibles:

<caption>**tipos**</caption>

        Uint64 sin signo

        Iint64 con signo

        Ffloat

        Ddouble








La mayoría de estos valores utilizan el tipo ASN.1 correspondiente. 's', 'x', 'd' y 'b'
son todas formas diferentes de especificar el valor OCTET STRING y el tipo sin signo
'u' también es utilizado para manejar los valores Gauge32.

Si los archivos MIB son cargados en el árbol MIB con "snmp_read_mib" o especificándolos
en la configuración de libsnmp, '=' podrá ser utilizado como parámetro
de tipo para todos los identificadores de objetos, ya que el tipo puede ser leído automáticamente desde el MIB.

Nota que hay 2 formas de definir una variable de tipo BITS como i.e.
"SYNTAX BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":

-       Utilizando el tipo "b" y una lista de octetos. Este método no es
        recomendado ya que la petición GET para un mismo OID retornará i.e. 0xF8.

-       Utilizando el tipo "x" y un número hexadecimal pero sin(!) el prefijo usual
        "0x".

Consúltese la sección sobre ejemplos para más detalles.

    value


      El nuevo valor.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra el tiempo límite.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si el host SNMP rechaza el tipo de datos, se emitirá una alerta de tipo
E_WARNING, como "Warning: Error in packet. Reason: (badValue) The value given has the wrong type or length.".
Si se especifica un OID desconocido o inválido, la alerta emitida contendrá
probablemente esto: "Could not add variable".

### Ejemplos

**Ejemplo #1 Ejemplo con snmp2_set()**

&lt;?php
snmp2_set("localhost", "public", "IF-MIB::ifAlias.3", "s", "foo");
?&gt;

    **Ejemplo #2 Ejemplo con snmp2_set()** para configurar el identificador del objeto SNMP BITS

&lt;?php
snmp2_set("localhost", "public", 'FOO-MIB::bar.42', 'b', '0 1 2 3 4');
// or
snmp2_set("localhost", "public", 'FOO-MIB::bar.42', 'x', 'F0');
?&gt;

### Ver también

    - [snmp2_get()](#function.snmp2-get) - Recupera un objeto SNMP

# snmp2_walk

(PHP &gt;= 5.2.0, PHP 7, PHP 8)

snmp2_walk — Recupera todos los objetos SNMP desde un agente

### Descripción

**snmp2_walk**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

La función **snmp2_walk()** se utiliza para leer todos
los valores desde un agente SNMP especificado por
el parámetro hostname.

### Parámetros

    hostname


      El agente SNMP (servidor).






    community


      La comunidad de lectura.






    object_id


      Si **[null](#constant.null)**, object_id será la raíz
      del árbol de objetos SNMP y todos
      los objetos de este árbol serán devueltos en forma
      de un array.




      Si object_id está especificado, todos los
      objetos SNMP bajo este
      object_id serán devueltos.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra un tiempo límite.


### Valores devueltos

Devuelve un array de valores de objeto SNMP
comenzando por el objeto object_id
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmp2_walk()**

&lt;?php
$a = snmp2_walk("127.0.0.1", "public", "");

foreach ($a as $val) {
    echo "$val\n";
}

?&gt;

La función anterior debería devolver todos los objetos
SNMP desde el agente SNMP
funcionando localmente. Un paso siguiente recorre los valores
con un bucle.

### Ver también

    - [snmp2_real_walk()](#function.snmp2-real-walk) - Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos

# snmp3_get

(PHP 4, PHP 5, PHP 7, PHP 8)

snmp3_get — Recupera un objeto SNMP

### Descripción

**snmp3_get**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $security_name,
    [string](#language.types.string) $security_level,
    [string](#language.types.string) $auth_protocol,
    [string](#language.types.string) $auth_passphrase,
    [string](#language.types.string) $privacy_protocol,
    [string](#language.types.string) $privacy_passphrase,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [mixed](#language.types.mixed)

La función **snmp3_get()** se utiliza para leer
el valor de un objeto SNMP especificado por
el identificador object_id.

### Parámetros

    hostname


      El nombre del host del agente SNMP (servidor).






    security_name


      El nombre de la seguridad, habitualmente, el nombre de usuario.






    security_level


      El nivel de seguridad (noAuthNoPriv|authNoPriv|authPriv).






    auth_protocol


      El protocolo de autenticación (MD5 or SHA)






    auth_passphrase


      La frase secreta de autenticación.






    privacy_protocol


      El protocolo de autenticación ("MD5", "SHA",
      "SHA256" o "SHA512").






    privacy_passphrase


      La frase secreta privada.






    object_id


      El identificador del objeto SNMP.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de tiempo límite.


### Valores devueltos

Devuelve el valor del objeto SNMP
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        El parámetro auth_protocol acepta ahora
        "SHA256" y "SHA512"
        cuando es soportado por libnetsnmp.





### Ejemplos

    **Ejemplo #1 Ejemplo con snmp3_get()**

&lt;?php
$nameOfSecondInterface = snmp3_get('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'IF-MIB::ifName.2');
?&gt;

### Ver también

    - [snmp3_set()](#function.snmp3-set) - Define el valor de un objeto SNMP

# snmp3_getnext

(PHP 5, PHP 7, PHP 8)

snmp3_getnext — Recupera el objeto SNMP que sigue inmediatamente al objeto proporcionado

### Descripción

**snmp3_getnext**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $security_name,
    [string](#language.types.string) $security_level,
    [string](#language.types.string) $auth_protocol,
    [string](#language.types.string) $auth_passphrase,
    [string](#language.types.string) $privacy_protocol,
    [string](#language.types.string) $privacy_passphrase,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [mixed](#language.types.mixed)

La función **snmp3_getnext()** se utiliza para leer
el valor de un objeto SNMP que sigue inmediatamente
al especificado por el identificador object_id.

### Parámetros

    hostname


      El nombre de host del agente
      SNMP (servidor).






    security_name


      El nombre de la seguridad, habitualmente, el nombre de usuario.






    security_level


      El grado de seguridad (noAuthNoPriv|authNoPriv|authPriv).






    auth_protocol


      El protocolo de autenticación (MD5 o SHA).






    auth_passphrase


      La frase secreta de autenticación.






    privacy_protocol


      El protocolo de autenticación ("MD5", "SHA",
      "SHA256" o "SHA512").






    privacy_passphrase


      La frase secreta privada.






    object_id


      El identificador del objeto SNMP.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra un tiempo límite.


### Valores devueltos

Devuelve el valor del objeto SNMP en caso
de éxito o **[false](#constant.false)** si ocurre un error.
En caso de error, se emitirá una alerta de tipo
E_WARNING.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        El parámetro auth_protocol acepta ahora
        "SHA256" y "SHA512"
        cuando es soportado por libnetsnmp.





### Ejemplos

    **Ejemplo #1 Ejemplo con snmp3_getnext()**

&lt;?php
$nameOfSecondInterface = snmp3_getnext('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'IF-MIB::ifName.1');
?&gt;

### Ver también

    - [snmp3_get()](#function.snmp3-get) - Recupera un objeto SNMP

    - [snmp3_walk()](#function.snmp3-walk) - Recupera todos los objetos SNMP desde un agente

# snmp3_real_walk

(PHP 4, PHP 5, PHP 7, PHP 8)

snmp3_real_walk — Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos

### Descripción

**snmp3_real_walk**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $security_name,
    [string](#language.types.string) $security_level,
    [string](#language.types.string) $auth_protocol,
    [string](#language.types.string) $auth_passphrase,
    [string](#language.types.string) $privacy_protocol,
    [string](#language.types.string) $privacy_passphrase,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

La función **snmp3_real_walk()** se utiliza para recorrer un número de objetos SNMP comenzando por el objeto cuyo identificador es object_id y devuelve no solo sus valores, sino también los identificadores de los objetos asociados.

### Parámetros

    hostname


      El nombre del host del agente SNMP (servidor).






    security_name


      El nombre de seguridad, generalmente el nombre de usuario.






    security_level


      El nivel de seguridad (noAuthNoPriv|authNoPriv|authPriv).






    auth_protocol


      El protocolo de autenticación (MD5 o SHA).






    auth_passphrase


      La frase secreta de autenticación.






    privacy_protocol


      El protocolo de privacidad ("MD5", "SHA", "SHA256" o "SHA512").






    privacy_passphrase


      La frase secreta privada.






    object_id


      El identificador del objeto SNMP.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra un tiempo límite.


### Valores devueltos

Devuelve un array asociativo de identificadores de objetos SNMP junto con sus valores en caso de éxito, o **[false](#constant.false)** si ocurre un error. En caso de error, se emite una alerta de nivel E_WARNING.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        El parámetro auth_protocol acepta ahora "SHA256" y "SHA512" cuando es soportado por libnetsnmp.





### Ejemplos

    **Ejemplo #1 Ejemplo con snmp3_real_walk()**

&lt;?php
var_export(snmp3_real_walk('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'IF-MIB::ifName'));
?&gt;

     El ejemplo anterior mostrará algo como:

array (
'IF-MIB::ifName.1' =&gt; 'STRING: lo',
'IF-MIB::ifName.2' =&gt; 'STRING: eth0',
'IF-MIB::ifName.3' =&gt; 'STRING: eth2',
'IF-MIB::ifName.4' =&gt; 'STRING: sit0',
'IF-MIB::ifName.5' =&gt; 'STRING: sixxs',
)

### Ver también

    -
     [snmpwalk()](#function.snmpwalk) - Recibe todos los objetos SNMP de un agente

# snmp3_set

(PHP 4, PHP 5, PHP 7, PHP 8)

snmp3_set — Define el valor de un objeto SNMP

### Descripción

**snmp3_set**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $security_name,
    [string](#language.types.string) $security_level,
    [string](#language.types.string) $auth_protocol,
    [string](#language.types.string) $auth_passphrase,
    [string](#language.types.string) $privacy_protocol,
    [string](#language.types.string) $privacy_passphrase,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [array](#language.types.array)|[string](#language.types.string) $type,
    [array](#language.types.array)|[string](#language.types.string) $value,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [bool](#language.types.boolean)

**snmp3_set()** se utiliza para definir el
valor de un objeto SNMP especificado por
el parámetro object_id.

Aunque el nivel de seguridad no utilice autenticación
o protocolo privado por contraseña, se deben especificar valores válidos.

### Parámetros

    hostname


      El nombre del host del agente SNMP (servidor).






    security_name


      El nombre de seguridad, generalmente, el nombre de usuario.






    security_level


      El nivel de seguridad (noAuthNoPriv|authNoPriv|authPriv).






    auth_protocol


      El protocolo de autenticación (MD5 o SHA).






    auth_passphrase


      La frase secreta para la autenticación.






    privacy_protocol


      El protocolo privado (DES o AES).






    privacy_passphrase


      La frase secreta privada.






    object_id


      El identificador del objeto SNMP.






    type



El MIB define el tipo de cada identificador de objeto. Debe
ser especificado como un carácter simple de la lista siguiente.

<caption>**tipos**</caption>

        =El tipo es recuperado desde el MIB

        iINTEGER

        uINTEGER

        sSTRING

        xHEX STRING

        dDECIMAL STRING

        nNULLOBJ

        oOBJID

        tTIMETICKS

        aIPADDRESS

        bBITS

Si la constante **[OPAQUE_SPECIAL_TYPES](#constant.opaque-special-types)** ha sido definida durante
la compilación de la biblioteca SNMP, los caracteres siguientes
también estarán disponibles:

<caption>**tipos**</caption>

        Uint64 sin signo

        Iint64 con signo

        Ffloat

        Ddouble








La mayoría de estos valores utilizan el tipo ASN.1 correspondiente. 's', 'x', 'd' y 'b'
son todas formas diferentes de especificar el valor OCTET STRING y el tipo sin signo
'u' también es utilizado para manejar los valores Gauge32.

Si los archivos MIB son cargados en el árbol MIB con "snmp_read_mib" o especificándolos
en la configuración de libsnmp, '=' podrá ser utilizado como parámetro
de tipo para todos los identificadores de objetos, ya que el tipo puede ser leído automáticamente desde el MIB.

Nota que hay 2 formas de definir una variable de tipo BITS como i.e.
"SYNTAX BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":

-       Utilizando el tipo "b" y una lista de octetos. Este método no es
        recomendado ya que la petición GET para un mismo OID retornará i.e. 0xF8.

-       Utilizando el tipo "x" y un número hexadecimal pero sin(!) el prefijo usual
        "0x".

Consúltese la sección sobre ejemplos para más detalles.

    value


      El nuevo valor.






    timeout


      El número de milisegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que se alcance el tiempo límite.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si el host SNMP rechaza el tipo de datos, se muestra una alerta de tipo
E_WARNING como "Warning: Error in packet. Reason: (badValue) The value given has the wrong type or length."
Si se especifica un OID desconocido o inválido, la alerta será probablemente
"Could not add variable".

### Ejemplos

**Ejemplo #1 Ejemplo con snmp3_set()**

&lt;?php
snmp3_set('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'IF-MIB::ifAlias.3', 's', "foo");
?&gt;

**Ejemplo #2 Ejemplo con snmp3_set()** para configurar el identificador del objeto SNMP BITS

&lt;?php
snmp3_set('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'FOO-MIB::bar.42', 'b', '0 1 2 3 4');
// or
snmp3_set('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'FOO-MIB::bar.42', 'x', 'F0');
?&gt;

# snmp3_walk

(PHP 4, PHP 5, PHP 7, PHP 8)

snmp3_walk — Recupera todos los objetos SNMP desde un agente

### Descripción

**snmp3_walk**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $security_name,
    [string](#language.types.string) $security_level,
    [string](#language.types.string) $auth_protocol,
    [string](#language.types.string) $auth_passphrase,
    [string](#language.types.string) $privacy_protocol,
    [string](#language.types.string) $privacy_passphrase,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

La función **snmp3_walk()** se utiliza para leer
todos los valores desde un agente SNMP especificado
por el parámetro host.

Aunque el nivel de seguridad no utilice un protocolo
de autenticación, se deben especificar valores válidos.

### Parámetros

    hostname


      El nombre del host del agente SNMP (servidor).






    security_name


      El nombre de la seguridad, habitualmente, el nombre del usuario.






    security_level


      El nivel de seguridad (noAuthNoPriv|authNoPriv|authPriv).






    auth_protocol


      El protocolo de autenticación ("MD5", "SHA",
      "SHA256" o "SHA512").






    auth_passphrase


      La frase secreta de autenticación.






    privacy_protocol


      El protocolo privado (DES o AES).






    privacy_passphrase


      La frase secreta privada.






    object_id


      Si vale **[null](#constant.null)**, object_id será la raíz
      del árbol de objetos SNMP y todos los
      objetos subyacentes se devuelven en forma de array.




      Si object_id está especificado,
      todos los objetos SNMP bajo el objeto
      object_id serán devueltos.






    timeout


      El número de microsegundos antes del primer tiempo límite.






    retries


      El número de intentos en caso de que ocurra el tiempo límite.


### Valores devueltos

Devuelve un array de valores de objetos SNMP
comenzando desde el objeto object_id
como raíz, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        El parámetro auth_protocol acepta ahora
        "SHA256" y "SHA512"
        cuando es soportado por libnetsnmp.





### Ejemplos

    **Ejemplo #1 Ejemplo con snmp3_walk()**

&lt;?php
$ret = snmp3_walk('localhost', 'james', 'authPriv', 'SHA', 'secret007', 'AES', 'secret007', 'IF-MIB::ifName');
var_export($ret);
?&gt;

La llamada a la función anterior devolverá todos los objetos
SNMP desde el agente
SNMP ejecutándose en localhost:

array (
0 =&gt; 'STRING: lo',
1 =&gt; 'STRING: eth0',
2 =&gt; 'STRING: eth2',
3 =&gt; 'STRING: sit0',
4 =&gt; 'STRING: sixxs',
)

### Ver también

    - [snmp3_real_walk()](#function.snmp3-real-walk) - Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos

# snmpget

(PHP 4, PHP 5, PHP 7, PHP 8)

snmpget — Recibe un objeto SNMP

### Descripción

**snmpget**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [mixed](#language.types.mixed)

**snmpget()** se utiliza para leer un valor de un objeto
SNMP representado por object_id.

### Parámetros

     hostname


       El agente SNMP.






     community


       La comunidad de lectura.






     object_id


       El objeto SNMP.






     timeout


       El número de microsegundos desde el primer timeout.






     retries


       El número de intentos cuando ocurre el tiempo límite máximo de espera.





### Valores devueltos

Devuelve el valor del objeto SNMP en caso de éxito, **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmpget()**

&lt;?php
$syscontact = snmpget("127.0.0.1", "public", "system.SysContact.0");
?&gt;

### Ver también

    - [snmpset()](#function.snmpset) - Define el valor de un objeto SNMP

# snmpgetnext

(PHP 5, PHP 7, PHP 8)

snmpgetnext — Recupera un objeto SNMP que sigue inmediatamente
al objeto proporcionado

### Descripción

**snmpgetnext**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [mixed](#language.types.mixed)

La función **snmpgetnext()** se utiliza
para leer el valor de un objeto SNMP que sigue inmediatamente
al objeto cuyo identificador es especificado por el parámetro
object_id.

### Parámetros

     hostname
     El nombre del host del agente SNMP (servidor).




     community
     La comunidad de lectura.




     object_id
     El identificador del objeto SNMP que precede al deseado.




     timeout
     El número de microsegundos antes del primer tiempo límite.




     retries
     El número de intentos en caso de que ocurra un tiempo límite.

### Valores devueltos

Devuelve el valor del objeto SNMP en caso de éxito
o **[false](#constant.false)** si ocurre un error.
En caso de error, se emitirá una alerta de tipo
E_WARNING.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmpgetnext()**

&lt;?php
$nameOfSecondInterface = snmpgetnext('localhost', 'public', 'IF-MIB::ifName.1');
?&gt;

### Ver también

    - [snmpget()](#function.snmpget) - Recibe un objeto SNMP

    - [snmpwalk()](#function.snmpwalk) - Recibe todos los objetos SNMP de un agente

# snmprealwalk

(PHP 4, PHP 5, PHP 7, PHP 8)

snmprealwalk — Devuelve todos los objetos, incluyendo los identificadores respectivos incluidos en el objeto

### Descripción

**snmprealwalk**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

La función **snmprealwalk()** se utiliza para
recorrer objetos SNMP, comenzando en el objeto identificado
por object_id y devuelve no solo los valores sino también
los identificadores de los objetos.

### Parámetros

     hostname
     El nombre del host del agente SNMP (servidor).




     community
     La comunidad de lectura.




     object_id
     El identificador del objeto SNMP
     que precede al deseado.




     timeout
     El número de microsegundos antes del primer tiempo límite.




     retries
     El número de intentos en caso de que ocurra el tiempo límite.

### Valores devueltos

Devuelve un array asociativo de identificadores de objetos
SNMP así como sus valores en caso de éxito
o **[false](#constant.false)** si ocurre un error.
En caso de error, se emitirá una alerta de tipo
E_WARNING.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmprealwalk()**

&lt;?php
print_r(snmprealwalk("localhost", "public", "IF-MIB::ifName"));
?&gt;

     El código anterior producirá una salida similar a:

Array
(
[IF-MIB::ifName.1] =&gt; STRING: lo
[IF-MIB::ifName.2] =&gt; STRING: eth0
[IF-MIB::ifName.3] =&gt; STRING: eth2
[IF-MIB::ifName.4] =&gt; STRING: sit0
[IF-MIB::ifName.5] =&gt; STRING: sixxs
)

### Ver también

    - [snmpwalk()](#function.snmpwalk) - Recibe todos los objetos SNMP de un agente

# snmpset

(PHP 4, PHP 5, PHP 7, PHP 8)

snmpset — Define el valor de un objeto SNMP

### Descripción

**snmpset**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [array](#language.types.array)|[string](#language.types.string) $type,
    [array](#language.types.array)|[string](#language.types.string) $value,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [bool](#language.types.boolean)

**snmpset()** se utiliza para definir el valor del objeto SNMP
especificado por object_id.

### Parámetros

     hostname


       El nombre de host del agente SNMP (servidor).






     community


       La comunidad de lectura.






     object_id


       El identificador del objeto SNMP.






     type



El MIB define el tipo de cada identificador de objeto. Debe
ser especificado como un carácter simple de la lista siguiente.

<caption>**tipos**</caption>

        =El tipo es recuperado desde el MIB

        iINTEGER

        uINTEGER

        sSTRING

        xHEX STRING

        dDECIMAL STRING

        nNULLOBJ

        oOBJID

        tTIMETICKS

        aIPADDRESS

        bBITS

Si la constante **[OPAQUE_SPECIAL_TYPES](#constant.opaque-special-types)** ha sido definida durante
la compilación de la biblioteca SNMP, los caracteres siguientes
también estarán disponibles:

<caption>**tipos**</caption>

        Uint64 sin signo

        Iint64 con signo

        Ffloat

        Ddouble








La mayoría de estos valores utilizan el tipo ASN.1 correspondiente. 's', 'x', 'd' y 'b'
son todas formas diferentes de especificar el valor OCTET STRING y el tipo sin signo
'u' también es utilizado para manejar los valores Gauge32.

Si los archivos MIB son cargados en el árbol MIB con "snmp_read_mib" o especificándolos
en la configuración de libsnmp, '=' podrá ser utilizado como parámetro
de tipo para todos los identificadores de objetos, ya que el tipo puede ser leído automáticamente desde el MIB.

Nota que hay 2 formas de definir una variable de tipo BITS como i.e.
"SYNTAX BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":

-       Utilizando el tipo "b" y una lista de octetos. Este método no es
        recomendado ya que la petición GET para un mismo OID retornará i.e. 0xF8.

-       Utilizando el tipo "x" y un número hexadecimal pero sin(!) el prefijo usual
        "0x".

Consúltese la sección sobre ejemplos para más detalles.

     value


       El nuevo valor.






     timeout


       El número de microsegundos desde el primer timeout.






     retries


       El número de intentos antes de alcanzar el tiempo máximo de espera.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si el host SNMP rechaza el tipo de datos, se mostrará una alerta de tipo
E_WARNING como
"Warning: Error in packet. Reason: (badValue) The value given has the
wrong type or length." Si se especifica un OID desconocido o inválido, el contenido de la alerta será
probablemente "Could not add variable".

### Ejemplos

**Ejemplo #1 Ejemplo con snmpset()**

&lt;?php
snmpset("localhost", "public", "IF-MIB::ifAlias.3", "s", "foo");
?&gt;

**Ejemplo #2 Ejemplo con snmpset()** para configurar el identificador del objeto SNMP BITS

&lt;?php
snmpset("localhost", "public", 'FOO-MIB::bar.42', 'b', '0 1 2 3 4');
// or
snmpset("localhost", "public", 'FOO-MIB::bar.42', 'x', 'F0');
?&gt;

### Ver también

    - [snmpget()](#function.snmpget) - Recibe un objeto SNMP

# snmpwalk

(PHP 4, PHP 5, PHP 7, PHP 8)

snmpwalk — Recibe todos los objetos SNMP de un agente

### Descripción

**snmpwalk**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

**snmpwalk()** se utiliza para leer todos los valores de un
agente SNMP especificado por hostname.

### Parámetros

     hostname


       El agente SNMP (servidor).






     community


       La comunidad de lectura.






     object_id


       Si **[null](#constant.null)**, object_id se toma como raíz de los
       objetos SNMP y todos los objetos de este árbol se devuelven en forma de array.




       Si object_id está especificado, todos los objetos SNMP
       que siguen a este object_id se devuelven.






     timeout


       El número de microsegundos desde el primer timeout.






     retries


       El número de intentos en caso de que ocurra el tiempo límite.





### Valores devueltos

Devuelve un array de valores del objeto SNMP, comenzando por
object_id o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmpwalk()**

&lt;?php
$a = snmpwalk("127.0.0.1", "public", "");

foreach ($a as $val) {
    echo "$val\n";
}

?&gt;

La llamada a la función anterior devolverá todos los objetos SNMP
desde el agente SNMP ejecutado en el host local. Se recorren los valores
mediante un bucle.

### Ver también

    - [snmprealwalk()](#function.snmprealwalk) - Devuelve todos los objetos, incluyendo los identificadores respectivos incluidos en el objeto

# snmpwalkoid

(PHP 4, PHP 5, PHP 7, PHP 8)

snmpwalkoid — Solicitud de información de árbol sobre una entidad de la red

### Descripción

**snmpwalkoid**(
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [array](#language.types.array)|[string](#language.types.string) $object_id,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
): [array](#language.types.array)|[false](#language.types.singleton)

**snmpwalkoid()** se utiliza para leer todos los
identificadores de objetos así como sus valores respectivos desde el agente SNMP
especificado por hostname.

La existencia de **snmpwalkoid()** y
[snmpwalk()](#function.snmpwalk) tiene razones históricas.
Ambas funciones proporcionan compatibilidades ascendentes.
Utilice en su lugar la función [snmprealwalk()](#function.snmprealwalk).

### Parámetros

     hostname


       El agente SNMP.






     community


       La comunidad de lectura.






     object_id


       Si **[null](#constant.null)**, object_id se toma como raíz de los
       objetos SNMP y todos los objetos de este árbol se devuelven en forma de array.




       Si object_id se especifica, todos los objetos SNMP
       siguientes a este object_id se devuelven.






     timeout


       El número de microsegundos desde el primer timeout.






     retries


       El número de intentos en caso de que ocurra el tiempo límite
       máximo.





### Valores devueltos

Devuelve un array asociativo que contiene los identificadores de los objetos así
como sus valores respectivos, a partir de
object_id, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con snmpwalkoid()**

&lt;?php
$a = snmpwalkoid("127.0.0.1", "public", "");
for (reset($a); $i = key($a); next($a)) {
    echo "$i: $a[$i]&lt;br /&gt;\n";
}
?&gt;

La llamada a la función anterior devolverá todos los objetos SNMP
desde el agente SNMP ejecutado en el host local. Se recorren los valores
mediante un bucle.

### Ver también

    - [snmpwalk()](#function.snmpwalk) - Recibe todos los objetos SNMP de un agente

## Tabla de contenidos

- [snmp_get_quick_print](#function.snmp-get-quick-print) — Lee el valor actual de la opción quick_print de la biblioteca NET-SNMP
- [snmp_get_valueretrieval](#function.snmp-get-valueretrieval) — Devuelve el método con el cual los valores SNMP serán devueltos
- [snmp_read_mib](#function.snmp-read-mib) — Lee y analiza un fichero MIB en el árbol activo MIB
- [snmp_set_enum_print](#function.snmp-set-enum-print) — Devuelve todos los valores que son enumeraciones con su valor de enumeración en lugar del entero
- [snmp_set_oid_numeric_print](#function.snmp-set-oid-numeric-print) — Alias de snmp_set_oid_output_format
- [snmp_set_oid_output_format](#function.snmp-set-oid-output-format) — Define el formato de salida OID
- [snmp_set_quick_print](#function.snmp-set-quick-print) — Escribe el valor actual de la opción enable de la biblioteca NET-SNMP
- [snmp_set_valueretrieval](#function.snmp-set-valueretrieval) — Especifica el método con el cual los valores SNMP serán devueltos
- [snmp2_get](#function.snmp2-get) — Recupera un objeto SNMP
- [snmp2_getnext](#function.snmp2-getnext) — Recupera el objeto SNMP que sigue inmediatamente
  al identificador del objeto proporcionado
- [snmp2_real_walk](#function.snmp2-real-walk) — Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos
- [snmp2_set](#function.snmp2-set) — Define el valor de un objeto SNMP
- [snmp2_walk](#function.snmp2-walk) — Recupera todos los objetos SNMP desde un agente
- [snmp3_get](#function.snmp3-get) — Recupera un objeto SNMP
- [snmp3_getnext](#function.snmp3-getnext) — Recupera el objeto SNMP que sigue inmediatamente al objeto proporcionado
- [snmp3_real_walk](#function.snmp3-real-walk) — Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos
- [snmp3_set](#function.snmp3-set) — Define el valor de un objeto SNMP
- [snmp3_walk](#function.snmp3-walk) — Recupera todos los objetos SNMP desde un agente
- [snmpget](#function.snmpget) — Recibe un objeto SNMP
- [snmpgetnext](#function.snmpgetnext) — Recupera un objeto SNMP que sigue inmediatamente
  al objeto proporcionado
- [snmprealwalk](#function.snmprealwalk) — Devuelve todos los objetos, incluyendo los identificadores respectivos incluidos en el objeto
- [snmpset](#function.snmpset) — Define el valor de un objeto SNMP
- [snmpwalk](#function.snmpwalk) — Recibe todos los objetos SNMP de un agente
- [snmpwalkoid](#function.snmpwalkoid) — Solicitud de información de árbol sobre una entidad de la red

# La clase SNMP

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

    Representa una sesión SNMP.

## Sinopsis de la Clase

     class **SNMP**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [VERSION_1](#snmp.constants.version-1);

    public
     const
     [int](#language.types.integer)
      [VERSION_2c](#snmp.constants.version-2c);

    public
     const
     [int](#language.types.integer)
      [VERSION_2C](#snmp.constants.version-2c);

    public
     const
     [int](#language.types.integer)
      [VERSION_3](#snmp.constants.version-3);

    public
     const
     [int](#language.types.integer)
      [ERRNO_NOERROR](#snmp.constants.errno-noerror);

    public
     const
     [int](#language.types.integer)
      [ERRNO_ANY](#snmp.constants.errno-any);

    public
     const
     [int](#language.types.integer)
      [ERRNO_GENERIC](#snmp.constants.errno-generic);

    public
     const
     [int](#language.types.integer)
      [ERRNO_TIMEOUT](#snmp.constants.errno-timeout);

    public
     const
     [int](#language.types.integer)
      [ERRNO_ERROR_IN_REPLY](#snmp.constants.errno-error-in-reply);

    public
     const
     [int](#language.types.integer)
      [ERRNO_OID_NOT_INCREASING](#snmp.constants.errno-oid-not-increasing);

    public
     const
     [int](#language.types.integer)
      [ERRNO_OID_PARSING_ERROR](#snmp.constants.errno-oid-parsing-error);

    public
     const
     [int](#language.types.integer)
      [ERRNO_MULTIPLE_SET_QUERIES](#snmp.constants.errno-multiple-set-queries);


    /* Propiedades */
    public
     readonly
     [array](#language.types.array)
      [$info](#snmp.props.info);

    public
     ?[int](#language.types.integer)
      [$max_oids](#snmp.props.max-oids);

    public
     [int](#language.types.integer)
      [$valueretrieval](#snmp.props.valueretrieval);

    public
     [bool](#language.types.boolean)
      [$quick_print](#snmp.props.quick-print);

    public
     [bool](#language.types.boolean)
      [$enum_print](#snmp.props.enum-print);

    public
     [int](#language.types.integer)
      [$oid_output_format](#snmp.props.oid-output-format);

    public
     [bool](#language.types.boolean)
      [$oid_increasing_check](#snmp.props.oid-increasing-check);

    public
     [int](#language.types.integer)
      [$exceptions_enabled](#snmp.props.exceptions-enabled);


    /* Métodos */

public [\_\_construct](#snmp.construct)(
    [int](#language.types.integer) $version,
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
)

    public [close](#snmp.close)(): [bool](#language.types.boolean)

public [get](#snmp.get)([array](#language.types.array)|[string](#language.types.string) $objectId, [bool](#language.types.boolean) $preserveKeys = **[false](#constant.false)**): [mixed](#language.types.mixed)
public [getErrno](#snmp.geterrno)(): [int](#language.types.integer)
public [getError](#snmp.geterror)(): [string](#language.types.string)
public [getnext](#snmp.getnext)([array](#language.types.array)|[string](#language.types.string) $objectId): [mixed](#language.types.mixed)
public [set](#snmp.set)([array](#language.types.array)|[string](#language.types.string) $objectId, [array](#language.types.array)|[string](#language.types.string) $type, [array](#language.types.array)|[string](#language.types.string) $value): [bool](#language.types.boolean)
public [setSecurity](#snmp.setsecurity)(
    [string](#language.types.string) $securityLevel,
    [string](#language.types.string) $authProtocol = "",
    [string](#language.types.string) $authPassphrase = "",
    [string](#language.types.string) $privacyProtocol = "",
    [string](#language.types.string) $privacyPassphrase = "",
    [string](#language.types.string) $contextName = "",
    [string](#language.types.string) $contextEngineId = ""
): [bool](#language.types.boolean)
public [walk](#snmp.walk)(
    [array](#language.types.array)|[string](#language.types.string) $objectId,
    [bool](#language.types.boolean) $suffixAsKey = **[false](#constant.false)**,
    [int](#language.types.integer) $maxRepetitions = -1,
    [int](#language.types.integer) $nonRepeaters = -1
): [array](#language.types.array)|[false](#language.types.singleton)

}

## Propiedades

     max_oids

      Número máximo de OID por solicitud GET/SET/GETBULK





     valueretrieval

      Controla la forma en que se devolverán los valores SNMP






          **[SNMP_VALUE_LIBRARY](#constant.snmp-value-library)**

           Los valores se devolverán de la misma forma que la biblioteca
           Net-SNMP.




          **[SNMP_VALUE_PLAIN](#constant.snmp-value-plain)**

           Los valores se devolverán en valor pleno, sin la información de tipo SNMP.




          **[SNMP_VALUE_OBJECT](#constant.snmp-value-object)**

           Los valores se devolverán en forma de objetos con las propiedades
           "value" y "type", donde el tipo podrá ser una constante SNMP_OCTET_STR,
           SNMP_COUNTER etc... La forma en que se devuelve la "value" se basa
           en la constante definida: **[SNMP_VALUE_LIBRARY](#constant.snmp-value-library)** o
           **[SNMP_VALUE_PLAIN](#constant.snmp-value-plain)**.










     quick_print

      Valor del parámetro quick_print en la biblioteca NET-SNMP



       Define el valor del parámetro quick_print en la biblioteca NET-SNMP.
       Cuando está definido (1), la biblioteca SNMP devolverá valores rápidamente
       imprimibles. Esto significa únicamente que los valores serán impresos. Cuando el
       parámetro quick_print no está definido (por defecto), la biblioteca
       NET-SNMP imprimirá información adicional incluyendo el tipo
       de la valor (i.e. IpAddress o OID). Además, si quick_print no está activado, la biblioteca
       imprimirá los valores hexadecimales para todas las cadenas que contengan hasta 3 caracteres.






     enum_print


       Controla la forma en que se imprimen los valores enum.




       Permite indicar a walk/get etc. si deben buscar automáticamente
       los valores enum en el MIIB y devolverlos además de sus
       cadenas legibles por humanos.






     oid_output_format

      Controla el formato de salida OID



       <caption>**Representación OID .1.3.6.1.2.1.1.3.0 para diversos
        valores de oid_output_format**</caption>


         **[SNMP_OID_OUTPUT_FULL](#constant.snmp-oid-output-full)**La forma completa, como "iso.org.dod...."

         **[SNMP_OID_OUTPUT_NUMERIC](#constant.snmp-oid-output-numeric)**La forma numérica, como ".1.3.6.1.4.1.8072.3.2.10"

         **[SNMP_OID_OUTPUT_MODULE](#constant.snmp-oid-output-module)**La forma corta, como "NET-SNMP-TC::linux"

         **[SNMP_OID_OUTPUT_SUFFIX](#constant.snmp-oid-output-suffix)**TBD

         **[SNMP_OID_OUTPUT_UCD](#constant.snmp-oid-output-ucd)**TBD

         **[SNMP_OID_OUTPUT_NONE](#constant.snmp-oid-output-none)**TBD








     oid_increasing_check

      Controla la verificación de la desactivación para el aumento
       de la OID durante el recorrido del árbol OID



       Algunos agentes SNMP son conocidos por devolver OIDs
       en el orden incorrecto, pero pueden continuar el recorrido.
       Otros agentes devuelven OIDs en el orden incorrecto y pueden
       conducir al método [SNMP::walk()](#snmp.walk) en un bucle infinito
       hasta que se alcance el límite de memoria. La biblioteca PHP SNMP,
       por defecto, realiza la verificación del aumento de la OID y detiene
       el recorrido del árbol OID cuando detecta una posible bucle
       emitiendo una alerta.
       Defina la variable oid_increasing_check a **[false](#constant.false)**
       para desactivar esta verificación.






     exceptions_enabled


       Controla qué excepción SNMPException será emitida en lugar
       de las alertas. Utilizar el operador OR de las constantes
       **[SNMP::ERRNO_*](#snmp.constants.errno-noerror)**.
       Por defecto, todas las excepciones SNMP están desactivadas.






     info


       Propiedad de solo lectura que contiene la configuración del agente remoto: nombre de host,
       puerto, tiempo de espera por defecto, número de recuperación por defecto




## Constantes predefinidas

    ## Tipos de errores SNMP




      **[SNMP::ERRNO_NOERROR](#snmp.constants.errno-noerror)**

       No ha ocurrido ningún error específico SNMP.






      **[SNMP::ERRNO_GENERIC](#snmp.constants.errno-generic)**

       Ha ocurrido un error SNMP genérico.






      **[SNMP::ERRNO_TIMEOUT](#snmp.constants.errno-timeout)**

       Solicitud al agente SNMP alcanza el tiempo de espera.






      **[SNMP::ERRNO_ERROR_IN_REPLY](#snmp.constants.errno-error-in-reply)**

       El agente SNMP devuelve un error en la respuesta.






      **[SNMP::ERRNO_OID_NOT_INCREASING](#snmp.constants.errno-oid-not-increasing)**


        El agente SNMP no incrementa más el OID
        durante la ejecución del comando WALK (BULK).
        Esto indica que hay un problema con el agente
        SNMP.







      **[SNMP::ERRNO_OID_PARSING_ERROR](#snmp.constants.errno-oid-parsing-error)**


        La biblioteca falla al analizar el OID (y/o el tipo
        para el comando SET). No se realiza ninguna solicitud.







      **[SNMP::ERRNO_MULTIPLE_SET_QUERIES](#snmp.constants.errno-multiple-set-queries)**


        La biblioteca utilizará varias solicitudes para la operación SET
        solicitada. Esto significa que la operación se realizará de forma
        no transaccional y que los fragmentos siguientes podrán fallar
        si se proporciona un tipo o valor incorrecto.







      **[SNMP::ERRNO_ANY](#snmp.constants.errno-any)**


        Todos los códigos operador OR de las constantes SNMP::ERRNO_*.









    ## Versiones del protocolo SNMP




      **[SNMP::VERSION_1](#snmp.constants.version-1)**








      **[SNMP::VERSION_2C](#snmp.constants.version-2c)**, **[SNMP::VERSION_2c](#snmp.constants.version-2c)**








      **[SNMP::VERSION_3](#snmp.constants.version-3)**







# SNMP::close

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::close — Cerrar sesión SNMP

### Descripción

public **SNMP::close**(): [bool](#language.types.boolean)

Libera previamente asignado un objeto de sesión SNMP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de SNMP::close()**

&lt;?php
$session = new SNMP(SNMP::VERSION_1, "127.0.0.1", "public");

# ...

# get, walk, etc va aquí

# ...

$session-&gt;close();
?&gt;

### Ver también

- [SNMP::\_\_construct()](#snmp.construct) - Crea una instancia SNMP que representa la sesión con el agente remoto SNMP

# SNMP::\_\_construct

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::\_\_construct — Crea una instancia SNMP que representa la sesión con el agente remoto SNMP

### Descripción

public **SNMP::\_\_construct**(
    [int](#language.types.integer) $version,
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $community,
    [int](#language.types.integer) $timeout = -1,
    [int](#language.types.integer) $retries = -1
)

Crea una instancia SNMP que representa una sesión con un agente SNMP remoto.

### Parámetros

    version


      Versión del protocolo SNMP:
      **[SNMP::VERSION_1](#snmp.constants.version-1)**,
      **[SNMP::VERSION_2C](#snmp.constants.version-2c)**,
      **[SNMP::VERSION_3](#snmp.constants.version-3)**.






    hostname


      El agente SNMP. El parámetro hostname
      puede ser prefijado con el puerto del agente opcional SNMP
      después de una coma. Las direcciones IPV6 deben estar rodeadas de corchetes ([])
      si se utilizan puertos adicionales. Si FQDN se utiliza para el parámetro
      hostname, será resuelto por la extensión PHP SNMP,
      y no por el motor Net-SNMP. El uso de direcciones IPV6
      al utilizar FQDN puede ser forzado rodeando FQDN con corchetes.
      A continuación se muestran algunos ejemplos:





        IPv4 con puerto por defecto127.0.0.1

        IPv6 con puerto por defecto::1 o [::1]

        IPv4 con puerto específico127.0.0.1:1161

        IPv6 con puerto específico[::1]:1161

        FQDN con puerto por defectohost.domain

        FQDN con puerto específicohost.domain:1161

        FQDN con puerto por defecto, forzando el uso de direcciones IPV6[host.domain]

        FQDN con puerto específico, forzando el uso de direcciones IPV6[host.domain]:1161









    community


      Especifica el nivel de seguridad para la version dada.
      El objetivo de la cadena de acceso community es específico
      a la versión de SNMP:








          **[SNMP::VERSION_1](#snmp.constants.version-1)**


          public para permiso de solo lectura o
          private para lectura-escritura





          **[SNMP::VERSION_2C](#snmp.constants.version-2c)**


          public para permiso de solo lectura o
          private para lectura-escritura





          **[SNMP::VERSION_3](#snmp.constants.version-3)**


          Nombre de seguridad SNMPv3, puede ser uno de los siguientes:
          noAuthNoPriv,
          authNoPriv (se requiere una contraseña de autenticación y un protocolo de autenticación), o
          authPriv (se requiere una contraseña y un protocolo de autenticación, así como una contraseña y un protocolo de confidencialidad)








      SNMPv3 requiere la configuración de los parámetros de sesión relacionados con la seguridad
      con el método [SNMP::setSecurity()](#snmp.setsecurity).




     timeout


       El número de microsegundos antes del primer tiempo límite.






     retries


       El número de intentos cuando ocurre un tiempo límite.





### Errores/Excepciones

**SNMP::\_\_construct()** lanza una excepción cuando
los parámetros son incorrectos o la versión del protocolo SNMP
es desconocida.

### Ejemplos

**Ejemplo #1 Recuperación de la ubicación física del host**

&lt;?php

$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
$sysdescr = $session-&gt;get("sysDescr.0");
echo "$sysdescr\n";

?&gt;

Resultado del ejemplo anterior es similar a:

STRING: Test server

### Ver también

- [SNMP::close()](#snmp.close) - Cerrar sesión SNMP

# SNMP::get

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::get — Recupera un objeto SNMP

### Descripción

public **SNMP::get**([array](#language.types.array)|[string](#language.types.string) $objectId, [bool](#language.types.boolean) $preserveKeys = **[false](#constant.false)**): [mixed](#language.types.mixed)

Recupera un objeto SNMP especificado por el identificador
objectId utilizando una solicitud GET.

### Parámetros

Si objectId es una [string](#language.types.string), entonces **SNMP::get()**
devolverá un objeto SNMP en forma de [string](#language.types.string). Si
objectId es un array, todos los objetos SNMP solicitados
serán devueltos en forma de array asociativo de identificadores de objetos
SNMP y sus valores.

     objectId


       El o los objetos SNMP (OID)






     preserve_keys


       Cuando objectId es un array, y el parámetro
       preserve_keys está definido a **[true](#constant.true)**, las claves en el resultado
       serán tomadas exactamente del objeto objectId, de lo contrario,
       la propiedad SNMP::oid_output_format será utilizada para determinar
       el formato de las claves.





### Valores devueltos

Devuelve los objetos SNMP solicitados, en forma
de strings o arrays, según el tipo del parámetro
objectId, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

    Este método no lanza excepciones por omisión.
    Para activar el lanzamiento de excepciones SNMPException cuando
    ocurren errores de la biblioteca,
    el parámetro de la clase SNMP exceptions_enabled
    debe ser definido al valor correspondiente. Ver las [
    explicaciones sobre SNMP::$exceptions_enabled](#snmp.props.exceptions-enabled)
    para más detalles.

### Ejemplos

**Ejemplo #1 Un solo objeto SNMP**

    Un solo objeto SNMP puede ser solicitado de 2 maneras:
    en forma de [string](#language.types.string), devolviendo así un valor en forma de
    [string](#language.types.string) también, o un array conteniendo un solo elemento, devolviendo
    así un array asociativo.

&lt;?php
$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
  $sysdescr = $session-&gt;get("sysDescr.0");
  echo "$sysdescr\n";
$sysdescr = $session-&gt;get(array("sysDescr.0"));
  print_r($sysdescr);
?&gt;

Resultado del ejemplo anterior es similar a:

STRING: Test server
Array
(
[SNMPv2-MIB::sysDescr.0] =&gt; STRING: Test server
)

**Ejemplo #2 Varios objetos SNMP**

$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
  $results = $session-&gt;get(array("sysDescr.0", "sysName.0"));
  print_r($results);
$session-&gt;close();

Resultado del ejemplo anterior es similar a:

Array
(
[SNMPv2-MIB::sysDescr.0] =&gt; STRING: Test server
[SNMPv2-MIB::sysName.0] =&gt; STRING: myhost.nodomain
)

### Ver también

- [SNMP::getErrno()](#snmp.geterrno) - Get last error code

- [SNMP::getError()](#snmp.geterror) - Obtiene el último mensaje de error

# SNMP::getErrno

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::getErrno — Get last error code

### Descripción

public **SNMP::getErrno**(): [int](#language.types.integer)

Devuelve código de error de la última solicitud SNMP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve uno de los valores de error que se describe en el capítulo constantes.

### Ejemplos

**Ejemplo #1 Ejemplo de SNMP::getErrno()**

&lt;?php
$session = new SNMP(SNMP::VERSION_2c, '127.0.0.1', 'boguscommunity');
var_dump(@$session-&gt;get('.1.3.6.1.2.1.1.1.0'));
var_dump($session-&gt;getErrno() == SNMP::ERRNO_TIMEOUT);
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

- [SNMP::getError()](#snmp.geterror) - Obtiene el último mensaje de error

# SNMP::getError

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::getError — Obtiene el último mensaje de error

### Descripción

public **SNMP::getError**(): [string](#language.types.string)

Devuelve un string con el error de la última solicitud SNMP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

String describing error from last SNMP request.
String que describe el error de la última solicitud SNMP.

### Ejemplos

**Ejemplo #1 Ejemplo de SNMP::getError()**

&lt;?php
$session = new SNMP(SNMP::VERSION_2c, '127.0.0.1', 'boguscommunity');
var_dump(@$session-&gt;get('.1.3.6.1.2.1.1.1.0'));
var_dump($session-&gt;getError());
?&gt;

El ejemplo anterior mostrará:

bool(false)
string(26) "No response from 127.0.0.1"

### Ver también

- [SNMP::getErrno()](#snmp.geterrno) - Get last error code

# SNMP::getnext

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::getnext — Recupera un objeto SNMP que sigue al identificador de objeto proporcionado

### Descripción

public **SNMP::getnext**([array](#language.types.array)|[string](#language.types.string) $objectId): [mixed](#language.types.mixed)

Recupera un objeto SNMP que sigue al objeto especificado por el
argumento objectId.

### Parámetros

Si objectId es una [string](#language.types.string), entonces
[SNMP::get()](#snmp.get) devolverá un objeto
SNMP en forma de [string](#language.types.string).
Si objectId es un array, todos los
objetos SNMP solicitados serán devueltos en forma de
un array asociativo de identificadores de objetos
SNMP así como sus valores.

     objectId


       El o los objetos SNMP (OID).





### Valores devueltos

Devuelve los objetos SNMP solicitados en forma de
una [string](#language.types.string) o de un array, según el tipo del argumento
objectId o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

    Este método no lanza excepciones por omisión.
    Para activar el lanzamiento de excepciones SNMPException cuando
    ocurren errores de la biblioteca,
    el parámetro de la clase SNMP exceptions_enabled
    debe ser definido al valor correspondiente. Ver las [
    explicaciones sobre SNMP::$exceptions_enabled](#snmp.props.exceptions-enabled)
    para más detalles.

### Ejemplos

**Ejemplo #1 Un solo objeto SNMP**

    Un solo objeto SNMP puede ser solicitado de 2 maneras:
    como una cadena, devolviendo así un valor en forma de cadena,
    o como un array que contiene solo un elemento, devolviendo así
    un array asociativo.

&lt;?php
$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
  $nsysdescr = $session-&gt;getnext("sysDescr.0");
  echo "$nsysdescr\n";
$nsysdescr = $session-&gt;getnext(array("sysDescr.0"));
  print_r($nsysdescr);
?&gt;

Resultado del ejemplo anterior es similar a:

OID: NET-SNMP-MIB::netSnmpAgentOIDs.8
Array
(
[SNMPv2-MIB::sysObjectID.0] =&gt; OID: NET-SNMP-MIB::netSnmpAgentOIDs.8
)

**Ejemplo #2 Varios objetos SNMP**

&lt;?php
$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
  $results = $session-&gt;getnext(array("sysDescr.0", "sysName.0"));
  print_r($results);
$session-&gt;close();
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[SNMPv2-MIB::sysObjectID.0] =&gt; OID: NET-SNMP-MIB::netSnmpAgentOIDs.8
[SNMPv2-MIB::sysLocation.0] =&gt; STRING: Nowhere
)

### Ver también

- [SNMP::getErrno()](#snmp.geterrno) - Get last error code

- [SNMP::getError()](#snmp.geterror) - Obtiene el último mensaje de error

# SNMP::set

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::set — Define el valor de un objeto SNMP

### Descripción

public **SNMP::set**([array](#language.types.array)|[string](#language.types.string) $objectId, [array](#language.types.array)|[string](#language.types.string) $type, [array](#language.types.array)|[string](#language.types.string) $value): [bool](#language.types.boolean)

Solicita al agente remoto SNMP que defina el valor
de uno o varios objetos SNMP especificados por su identificador
objectId.

### Parámetros

    Si objectId es un [string](#language.types.string), entonces
    los parámetros type y value
    deben ser también un [string](#language.types.string). Si objectId
    es un [array](#language.types.array), el parámetro value debe ser un
    array de igual tamaño que contenga los valores correspondientes, y el
    parámetro type podrá ser un [string](#language.types.string) (su valor será utilizado para todas las parejas
    objectId-value) o bien
    un array de igual tamaño con pares OID-valor. Cuando se proporciona
    otra combinación de parámetros, pueden emitirse alertas de nivel
    E_WARNING con una descripción detallada.




    objectId


      El identificador del objeto SNMP.




      Cuando el número de OIDs en el array object_id es superior
      a la propiedad max_oids del objeto, el método deberá utilizar varias
      solicitudes para realizar las actualizaciones solicitadas. En este caso,
      la verificación del tipo y del valor se realiza por partes,
      por lo que la segunda solicitud (y otras sub-solicitudes) fallará
      debido a un tipo o valor incorrecto para el OID solicitado.
      Para detectar este comportamiento, se emite una alerta cuando el número
      de OIDs en el array object_id es superior a la propiedad max_oids.






    type



El MIB define el tipo de cada identificador de objeto. Debe
ser especificado como un carácter simple de la lista siguiente.

<caption>**tipos**</caption>

        =El tipo es recuperado desde el MIB

        iINTEGER

        uINTEGER

        sSTRING

        xHEX STRING

        dDECIMAL STRING

        nNULLOBJ

        oOBJID

        tTIMETICKS

        aIPADDRESS

        bBITS

Si la constante **[OPAQUE_SPECIAL_TYPES](#constant.opaque-special-types)** ha sido definida durante
la compilación de la biblioteca SNMP, los caracteres siguientes
también estarán disponibles:

<caption>**tipos**</caption>

        Uint64 sin signo

        Iint64 con signo

        Ffloat

        Ddouble








La mayoría de estos valores utilizan el tipo ASN.1 correspondiente. 's', 'x', 'd' y 'b'
son todas formas diferentes de especificar el valor OCTET STRING y el tipo sin signo
'u' también es utilizado para manejar los valores Gauge32.

Si los archivos MIB son cargados en el árbol MIB con "snmp_read_mib" o especificándolos
en la configuración de libsnmp, '=' podrá ser utilizado como parámetro
de tipo para todos los identificadores de objetos, ya que el tipo puede ser leído automáticamente desde el MIB.

Nota que hay 2 formas de definir una variable de tipo BITS como i.e.
"SYNTAX BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":

-       Utilizando el tipo "b" y una lista de octetos. Este método no es
        recomendado ya que la petición GET para un mismo OID retornará i.e. 0xF8.

-       Utilizando el tipo "x" y un número hexadecimal pero sin(!) el prefijo usual
        "0x".

Consúltese la sección sobre ejemplos para más detalles.

    value


      El nuevo valor.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

    Este método no lanza excepciones por omisión.
    Para activar el lanzamiento de excepciones SNMPException cuando
    ocurren errores de la biblioteca,
    el parámetro de la clase SNMP exceptions_enabled
    debe ser definido al valor correspondiente. Ver las [
    explicaciones sobre SNMP::$exceptions_enabled](#snmp.props.exceptions-enabled)
    para más detalles.

### Ejemplos

**Ejemplo #1 Define un solo identificador de objeto SNMP**

&lt;?php
$session = new SNMP(SNMP_VERSION_2C, "127.0.0.1", "private");
$session-&gt;set('SNMPv2-MIB::sysContact.0', 's', "Nobody");
?&gt;

**Ejemplo #2 Define varios valores utilizando una sola llamada al método SNMP::set()**
call

&lt;?php
$session = new SNMP(SNMP_VERSION_2C, "127.0.0.1", "private");
$session-&gt;set(array('SNMPv2-MIB::sysContact.0', 'SNMPv2-MIB::sysLocation.0'), array('s', 's'), array("Nobody", "Nowhere"));
// o
$session-&gt;set(array('SNMPv2-MIB::sysContact.0', 'SNMPv2-MIB::sysLocation.0'), 's', array("Nobody", "Nowhere"));
?&gt;

**Ejemplo #3 Ejemplo con SNMP::set()** para configurar el identificador de objeto SNMP BITS

&lt;?php
$session = new SNMP(SNMP_VERSION_2C, "127.0.0.1", "private");
$session-&gt;set('FOO-MIB::bar.42', 'b', '0 1 2 3 4');
// o
$session-&gt;set('FOO-MIB::bar.42', 'x', 'F0');
?&gt;

### Ver también

    - [SNMP::get()](#snmp.get) - Recupera un objeto SNMP

# SNMP::setSecurity

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::setSecurity — Configura los parámetros de seguridad de las sesiones SNMPv3

### Descripción

public **SNMP::setSecurity**(
    [string](#language.types.string) $securityLevel,
    [string](#language.types.string) $authProtocol = "",
    [string](#language.types.string) $authPassphrase = "",
    [string](#language.types.string) $privacyProtocol = "",
    [string](#language.types.string) $privacyPassphrase = "",
    [string](#language.types.string) $contextName = "",
    [string](#language.types.string) $contextEngineId = ""
): [bool](#language.types.boolean)

Configura los parámetros de seguridad de las sesiones del protocolo SNMPv3.

### Parámetros

    securityLevel


      el nivel de seguridad (noAuthNoPriv|authNoPriv|authPriv)






    authProtocol


      el protocolo de autenticación (MD5 o SHA)






    authPassphrase


      la frase de paso para la autenticación






    privacyProtocol


      el protocolo privado (DES o AES)






    privacyPassphrase


      la frase de paso para el protocolo privado






    contextName


      el nombre del contexto






    contextEngineId


      el contexto EngineID


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SNMP::setSecurity()**

&lt;?php
$session = new SNMP(SNMP_VERSION_3, $hostname, $rwuser, $timeout, $retries);
$session-&gt;setSecurity('authPriv', 'MD5', $auth_pass, 'AES', $priv_pass, '', 'aeeeff');
?&gt;

### Ver también

- [SNMP::\_\_construct()](#snmp.construct) - Crea una instancia SNMP que representa la sesión con el agente remoto SNMP

# SNMP::walk

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SNMP::walk — Recupera el sub-objeto de un objeto SNMP

### Descripción

public **SNMP::walk**(
    [array](#language.types.array)|[string](#language.types.string) $objectId,
    [bool](#language.types.boolean) $suffixAsKey = **[false](#constant.false)**,
    [int](#language.types.integer) $maxRepetitions = -1,
    [int](#language.types.integer) $nonRepeaters = -1
): [array](#language.types.array)|[false](#language.types.singleton)

**SNMP::walk()** se utiliza para leer el sub-objeto SNMP cuya profundidad está
especificada por el argumento object_id.

### Parámetros

    objectId


      Raíz del sub-objeto a leer






    suffixAsKey


      Por omisión, la notación completa del OID se utiliza para las
      claves en el array resultante. Si se establece en **[true](#constant.true)**, el prefijo
      del sub-objeto será eliminado de las claves, dejando solo el
      sufijo de object_id.






    nonRepeaters


      Especifica el número de variables proporcionadas que no deben ser repetidas.
      Por omisión, este valor será utilizado desde el objeto
      SNMP.






    maxRepetitions


      Especifica el número máximo de iteraciones sobre las variables repetidas.
      Por omisión, este valor será utilizado desde el objeto
      SNMP.


### Valores devueltos

Devuelve un array asociativo de identificadores de objetos SNMP
así como sus valores en caso de éxito o **[false](#constant.false)** si ocurre un error.
Cuando ocurre un error SNMP, **SNMP::get_errno()** y
**SNMP::get_error()** pueden ser utilizadas para recuperar
respectivamente el número del error (específico de la extensión SNMP, ver las constantes de la
clase) así como el mensaje de error.

### Errores/Excepciones

    Este método no lanza excepciones por omisión.
    Para activar el lanzamiento de excepciones SNMPException cuando
    ocurren errores de la biblioteca,
    el parámetro de la clase SNMP exceptions_enabled
    debe ser definido al valor correspondiente. Ver las [
    explicaciones sobre SNMP::$exceptions_enabled](#snmp.props.exceptions-enabled)
    para más detalles.

### Ejemplos

**Ejemplo #1 Ejemplo con SNMP::walk()**

&lt;?php
$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
  $fulltree = $session-&gt;walk(".");
  print_r($fulltree);
$session-&gt;close();
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[SNMPv2-MIB::sysDescr.0] =&gt; STRING: Test server
[SNMPv2-MIB::sysObjectID.0] =&gt; OID: NET-SNMP-MIB::netSnmpAgentOIDs.8
[DISMAN-EVENT-MIB::sysUpTimeInstance] =&gt; Timeticks: (1150681750) 133 days, 4:20:17.50
[SNMPv2-MIB::sysContact.0] =&gt; STRING: Nobody
[SNMPv2-MIB::sysName.0] =&gt; STRING: server.localdomain
...
)

**Ejemplo #2 Ejemplo con el argumento suffixAsKey**

    El argumento suffixAsKey puede ser utilizado al fusionar
    varios sub-objetos SNMP en uno solo. Este ejemplo enlaza
    los nombres de interfaces y sus tipos.

&lt;?php
$session = new SNMP(SNMP_VERSION_1, "127.0.0.1", "public");
  $session-&gt;valueretrieval = SNMP_VALUE_PLAIN;
  $ifDescr = $session-&gt;walk(".1.3.6.1.2.1.2.2.1.2", TRUE);
  $session-&gt;valueretrieval = SNMP_VALUE_LIBRARY;
  $ifType = $session-&gt;walk(".1.3.6.1.2.1.2.2.1.3", TRUE);
  print_r($ifDescr);
print_r($ifType);
  $result = array();
  foreach($ifDescr as $i =&gt; $n) {
    $result[$n] = $ifType[$i];
}
print_r($result);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[1] =&gt; igb0
[2] =&gt; igb1
[3] =&gt; ipfw0
[4] =&gt; lo0
[5] =&gt; lagg0
)
Array
(
[1] =&gt; INTEGER: ieee8023adLag(161)
[2] =&gt; INTEGER: ieee8023adLag(161)
[3] =&gt; INTEGER: ethernetCsmacd(6)
[4] =&gt; INTEGER: softwareLoopback(24)
[5] =&gt; INTEGER: ethernetCsmacd(6)
)
Array
(
[igb0] =&gt; INTEGER: ieee8023adLag(161)
[igb1] =&gt; INTEGER: ieee8023adLag(161)
[ipfw0] =&gt; INTEGER: ethernetCsmacd(6)
[lo0] =&gt; INTEGER: softwareLoopback(24)
[lagg0] =&gt; INTEGER: ethernetCsmacd(6)
)

### Ver también

- [SNMP::getErrno()](#snmp.geterrno) - Get last error code

- [SNMP::getError()](#snmp.geterror) - Obtiene el último mensaje de error

## Tabla de contenidos

- [SNMP::close](#snmp.close) — Cerrar sesión SNMP
- [SNMP::\_\_construct](#snmp.construct) — Crea una instancia SNMP que representa la sesión con el agente remoto SNMP
- [SNMP::get](#snmp.get) — Recupera un objeto SNMP
- [SNMP::getErrno](#snmp.geterrno) — Get last error code
- [SNMP::getError](#snmp.geterror) — Obtiene el último mensaje de error
- [SNMP::getnext](#snmp.getnext) — Recupera un objeto SNMP que sigue al identificador de objeto proporcionado
- [SNMP::set](#snmp.set) — Define el valor de un objeto SNMP
- [SNMP::setSecurity](#snmp.setsecurity) — Configura los parámetros de seguridad de las sesiones SNMPv3
- [SNMP::walk](#snmp.walk) — Recupera el sub-objeto de un objeto SNMP

# La clase SNMPException

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

    Representa un error lanzado por SNMP. No se debe lanzar una excepción **SNMPException**
    desde su código.
    Ver las [excepciones](#language.exceptions)
    para más información sobre las excepciones en PHP.

## Sinopsis de la Clase

     class **SNMPException**



     extends
      [RuntimeException](#class.runtimeexception)
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

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

     code


       Código de error de la biblioteca SNMP.
       Utilizar la función [Exception::getCode()](#exception.getcode)
       para acceder a él.





- [Introducción](#intro.snmp)
- [Instalación/Configuración](#snmp.setup)<li>[Requerimientos](#snmp.requirements)
- [Instalación](#snmp.installation)
  </li>- [Constantes predefinidas](#snmp.constants)
- [Funciones SNMP](#ref.snmp)<li>[snmp_get_quick_print](#function.snmp-get-quick-print) — Lee el valor actual de la opción quick_print de la biblioteca NET-SNMP
- [snmp_get_valueretrieval](#function.snmp-get-valueretrieval) — Devuelve el método con el cual los valores SNMP serán devueltos
- [snmp_read_mib](#function.snmp-read-mib) — Lee y analiza un fichero MIB en el árbol activo MIB
- [snmp_set_enum_print](#function.snmp-set-enum-print) — Devuelve todos los valores que son enumeraciones con su valor de enumeración en lugar del entero
- [snmp_set_oid_numeric_print](#function.snmp-set-oid-numeric-print) — Alias de snmp_set_oid_output_format
- [snmp_set_oid_output_format](#function.snmp-set-oid-output-format) — Define el formato de salida OID
- [snmp_set_quick_print](#function.snmp-set-quick-print) — Escribe el valor actual de la opción enable de la biblioteca NET-SNMP
- [snmp_set_valueretrieval](#function.snmp-set-valueretrieval) — Especifica el método con el cual los valores SNMP serán devueltos
- [snmp2_get](#function.snmp2-get) — Recupera un objeto SNMP
- [snmp2_getnext](#function.snmp2-getnext) — Recupera el objeto SNMP que sigue inmediatamente
  al identificador del objeto proporcionado
- [snmp2_real_walk](#function.snmp2-real-walk) — Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos
- [snmp2_set](#function.snmp2-set) — Define el valor de un objeto SNMP
- [snmp2_walk](#function.snmp2-walk) — Recupera todos los objetos SNMP desde un agente
- [snmp3_get](#function.snmp3-get) — Recupera un objeto SNMP
- [snmp3_getnext](#function.snmp3-getnext) — Recupera el objeto SNMP que sigue inmediatamente al objeto proporcionado
- [snmp3_real_walk](#function.snmp3-real-walk) — Devuelve todos los objetos incluyendo los identificadores de sus respectivos objetos
- [snmp3_set](#function.snmp3-set) — Define el valor de un objeto SNMP
- [snmp3_walk](#function.snmp3-walk) — Recupera todos los objetos SNMP desde un agente
- [snmpget](#function.snmpget) — Recibe un objeto SNMP
- [snmpgetnext](#function.snmpgetnext) — Recupera un objeto SNMP que sigue inmediatamente
  al objeto proporcionado
- [snmprealwalk](#function.snmprealwalk) — Devuelve todos los objetos, incluyendo los identificadores respectivos incluidos en el objeto
- [snmpset](#function.snmpset) — Define el valor de un objeto SNMP
- [snmpwalk](#function.snmpwalk) — Recibe todos los objetos SNMP de un agente
- [snmpwalkoid](#function.snmpwalkoid) — Solicitud de información de árbol sobre una entidad de la red
  </li>- [SNMP](#class.snmp) — La clase SNMP<li>[SNMP::close](#snmp.close) — Cerrar sesión SNMP
- [SNMP::\_\_construct](#snmp.construct) — Crea una instancia SNMP que representa la sesión con el agente remoto SNMP
- [SNMP::get](#snmp.get) — Recupera un objeto SNMP
- [SNMP::getErrno](#snmp.geterrno) — Get last error code
- [SNMP::getError](#snmp.geterror) — Obtiene el último mensaje de error
- [SNMP::getnext](#snmp.getnext) — Recupera un objeto SNMP que sigue al identificador de objeto proporcionado
- [SNMP::set](#snmp.set) — Define el valor de un objeto SNMP
- [SNMP::setSecurity](#snmp.setsecurity) — Configura los parámetros de seguridad de las sesiones SNMPv3
- [SNMP::walk](#snmp.walk) — Recupera el sub-objeto de un objeto SNMP
  </li>- [SNMPException](#class.snmpexception) — La clase SNMPException
