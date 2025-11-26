# Localización geográfica de las IPs

# Introducción

La extensión GeoIP permite localizar una dirección IP. La ciudad, el estado, el país,
la longitud, la latitud y otra información como el ISP y el tipo de conexión
pueden ser obtenidos gracias a GeoIP.

**Advertencia**

    Esta extensión no soporta las bases de datos "GeoIP2"
    actuales de MaxMind, únicamente los ficheros de base de datos "GeoIP Legacy".

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#geoip.requirements)
- [Instalación](#geoip.installation)
- [Configuración en tiempo de ejecución](#geoip.configuration)

    ## Requerimientos

    Esta extensión requiere la biblioteca GeoIP versión 1.4.0 o posterior.
    La última versión puede ser obtenida en
    [» http://www.maxmind.com/app/c](http://www.maxmind.com/app/c)
    y compilada por usted mismo.

    Por omisión, solo se puede acceder a la base de datos
    Free GeoIP Country o GeoLite
    City. Aunque este módulo puede funcionar con otros tipos
    de bases de datos, es necesario adquirir una licencia comercial en
    [» Maxmind](http://www.maxmind.com/).

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/geoip](https://pecl.php.net/package/geoip).

    ## Configuración en tiempo de ejecución

    El comportamiento de estas funciones es
    afectado por la configuración en el archivo php.ini.

          <caption>**GeoIP Opciones de configuración**</caption>



                Nombre
                Por defecto
                Cambiable
                Historial de cambios






                [geoip.custom_directory](#ini.geoip.custom-directory)
                ""
                **[INI_ALL](#constant.ini-all)**






    Aquí hay una aclaración sobre
    el uso de las directivas de configuración.

              geoip.custom_directory
              [string](#language.types.string)



                Vacío por omisión, pero puede ser utilizado para cargar una base
                de datos diferente de la incluida en la biblioteca.






# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[GEOIP_COUNTRY_EDITION](#constant.geoip-country-edition)**
     ([int](#language.types.integer))









    **[GEOIP_REGION_EDITION_REV0](#constant.geoip-region-edition-rev0)**
     ([int](#language.types.integer))









    **[GEOIP_CITY_EDITION_REV0](#constant.geoip-city-edition-rev0)**
     ([int](#language.types.integer))









    **[GEOIP_ORG_EDITION](#constant.geoip-org-edition)**
     ([int](#language.types.integer))









    **[GEOIP_ISP_EDITION](#constant.geoip-isp-edition)**
     ([int](#language.types.integer))









    **[GEOIP_CITY_EDITION_REV1](#constant.geoip-city-edition-rev1)**
     ([int](#language.types.integer))









    **[GEOIP_REGION_EDITION_REV1](#constant.geoip-region-edition-rev1)**
     ([int](#language.types.integer))









    **[GEOIP_PROXY_EDITION](#constant.geoip-proxy-edition)**
     ([int](#language.types.integer))









    **[GEOIP_ASNUM_EDITION](#constant.geoip-asnum-edition)**
     ([int](#language.types.integer))









    **[GEOIP_NETSPEED_EDITION](#constant.geoip-netspeed-edition)**
     ([int](#language.types.integer))









    **[GEOIP_DOMAIN_EDITION](#constant.geoip-domain-edition)**
     ([int](#language.types.integer))

Las constantes siguientes se utilizan para la velocidad de red:

    **[GEOIP_UNKNOWN_SPEED](#constant.geoip-unknown-speed)**
     ([int](#language.types.integer))







    **[GEOIP_DIALUP_SPEED](#constant.geoip-dialup-speed)**
     ([int](#language.types.integer))







    **[GEOIP_CABLEDSL_SPEED](#constant.geoip-cabledsl-speed)**
     ([int](#language.types.integer))







    **[GEOIP_CORPORATE_SPEED](#constant.geoip-corporate-speed)**
     ([int](#language.types.integer))

# Funciones GeoIP

# geoip_asnum_by_name

(PECL geoip &gt;= 1.1.0)

geoip_asnum_by_name — Recupera el ASN (Autonomous System Numbers)

### Descripción

**geoip_asnum_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_asnum_by_name()** recupera el ASN
(Autonomous System Numbers) asociado con la dirección IP.

### Parámetros

     hostname


       El nombre de host o la dirección IP.





### Valores devueltos

Devuelve el ASN en caso de éxito, o **[false](#constant.false)** si la dirección no puede
ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_asnum_by_name()**



     Este ejemplo mostrará el ASN para el host www.example.com.

&lt;?php
$asn = geoip_asnum_by_name('www.example.com');

if ($asn) {
echo 'El ASN es: ' . $asn;
}
?&gt;

    El ejemplo anterior mostrará:

El ASN es: AS15133 EdgeCast Networks, Inc

# geoip_continent_code_by_name

(PECL geoip &gt;= 1.0.3)

geoip_continent_code_by_name — Lee el código de continente de una IP

### Descripción

**geoip_continent_code_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

**geoip_continent_code_by_name()** devuelve el código de dos letras del continente correspondiente a un nombre de host o una dirección IP.

### Parámetros

     hostname


       El nombre de host o la dirección IP que se está estudiando.





### Valores devueltos

Devuelve el código de dos letras del nombre del continente, en caso de éxito,
y **[false](#constant.false)** si la dirección no ha podido ser encontrada en la base.

   <caption>**Códigos de continente**</caption>
   
    
     
      Código
      Nombre del continente


      AF
      África



      AN
      Antártida



      AS
      Asia



      EU
      Europa



      NA
      América del Norte



      OC
      Oceanía



      SA
      América del Sur


### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_continent_code_by_name()**



     Este script mostrará el continente del host example.com.

&lt;?php
$continent = geoip_continent_code_by_name('www.example.com');
if ($continent) {
echo 'Este host está situado en: ' . $continent;
}
?&gt;

    El ejemplo anterior mostrará:

Este host está situado en: NA

### Ver también

    - [geoip_country_code_by_name()](#function.geoip-country-code-by-name) - Recupera las dos letras del código del país

# geoip_country_code_by_name

(PECL geoip &gt;= 0.2.0)

geoip_country_code_by_name — Recupera las dos letras del código del país

### Descripción

**geoip_country_code_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

    La función **geoip_country_code_by_name()**
    devuelve las dos letras del código del país correspondiente al nombre del host o
    a la dirección IP.

### Parámetros

     hostname


       El nombre del host o la dirección IP





### Valores devueltos

Devuelve las dos letras del código del país ISO en caso de éxito, o
**[false](#constant.false)** si la dirección no pudo ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_country_code_by_name()**



     Este ejemplo muestra la localización del host example.com.

&lt;?php
$country = geoip_country_code_by_name('www.example.com');
if ($country) {
echo 'Localización de este host: ' . $country;
}
?&gt;

    El ejemplo anterior mostrará:

Localización de este host: US

### Notas

**Precaución**

    Consulte la página
    [» http://www.maxmind.com/en/iso3166](http://www.maxmind.com/en/iso3166)
    para una lista completa de los valores devueltos posibles, incluyendo
    los códigos especiales.

### Ver también

    - [geoip_country_code3_by_name()](#function.geoip-country-code3-by-name) - Recupera las tres letras del código del país

    - [geoip_country_name_by_name()](#function.geoip-country-name-by-name) - Recupera el nombre completo del país

# geoip_country_code3_by_name

(PECL geoip &gt;= 0.2.0)

geoip_country_code3_by_name — Recupera las tres letras del código del país

### Descripción

**geoip_country_code3_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_country_code3_by_name()**
devuelve las tres letras del código del país correspondiente al nombre del host o
a la dirección IP.

### Parámetros

     hostname


       El nombre del host o la dirección IP





### Valores devueltos

Devuelve las tres letras del código del país en caso de éxito, o **[false](#constant.false)**
si la dirección no pudo ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_country_code3_by_name()**



     Este ejemplo muestra dónde está localizado el host example.com.

&lt;?php
$country = geoip_country_code3_by_name('www.example.com');
if ($country) {
echo 'Localización de este host: ' . $country;
}
?&gt;

    El ejemplo anterior mostrará:

Localización de este host: USA

### Ver también

    - [geoip_country_code_by_name()](#function.geoip-country-code-by-name) - Recupera las dos letras del código del país

    - [geoip_country_name_by_name()](#function.geoip-country-name-by-name) - Recupera el nombre completo del país

# geoip_country_name_by_name

(PECL geoip &gt;= 0.2.0)

geoip_country_name_by_name — Recupera el nombre completo del país

### Descripción

**geoip_country_name_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_country_name_by_name()** devuelve
el nombre completo del país correspondiente al nombre del host o a la
dirección IP.

### Parámetros

     hostname


       El nombre del host o la dirección IP





### Valores devueltos

Devuelve el nombre del país en caso de éxito, o **[false](#constant.false)** si la dirección
no pudo ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_country_name_by_name()**



     Este ejemplo muestra la localización del host example.com.

&lt;?php
$country = geoip_country_name_by_name('www.example.com');
if ($country) {
echo 'Localización de este host: ' . $country;
}
?&gt;

    El ejemplo anterior mostrará:

Localización de este host: United States

### Ver también

    - [geoip_country_code_by_name()](#function.geoip-country-code-by-name) - Recupera las dos letras del código del país

    - [geoip_country_code3_by_name()](#function.geoip-country-code3-by-name) - Recupera las tres letras del código del país

# geoip_database_info

(PECL geoip &gt;= 0.2.0)

geoip_database_info — Recupera la información de la base de datos GeoIP

### Descripción

**geoip_database_info**([int](#language.types.integer) $database = GEOIP_COUNTRY_EDITION): [string](#language.types.string)

La función **geoip_database_info()** devuelve
la versión de la base de datos GeoIP tal como se define en el fichero binario.

Si esta función se llama sin argumento, devuelve la versión
de la GeoIP Free Country Edition.

### Parámetros

     database


       El tipo de base de datos, como entero. Se pueden utilizar
       [diversas constantes](#geoip.constants) definidas
       con esta extensión (ie: GEOIP_*_EDITION).






### Valores devueltos

Devuelve la versión correspondiente de la base de datos, o **[null](#constant.null)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_database_info()**



     Este ejemplo muestra la información contenida en la base de datos.

&lt;?php
print geoip_database_info(GEOIP_COUNTRY_EDITION);
?&gt;

    El ejemplo anterior mostrará:

GEO-106FREE 20060801 Build 1 Copyright (c) 2006 MaxMind LLC All Rights Reserved

# geoip_db_avail

(PECL geoip &gt;= 1.0.1)

geoip_db_avail — Verifica si la base de datos GeoIP está disponible

### Descripción

**geoip_db_avail**([int](#language.types.integer) $database): [bool](#language.types.boolean)

La función **geoip_db_avail()** verifica si la base
de datos correspondiente está disponible y puede ser abierta en el disco.

La función no indica si el fichero es una base de datos válida,
sino únicamente si es legible.

### Parámetros

     database


       El tipo de base de datos, en forma de un [int](#language.types.integer).
       Se pueden utilizar diversas [constantes](#geoip.constants),
       definidas con esta extensión (ie: GEOIP_*_EDITION).






### Valores devueltos

Devuelve **[true](#constant.true)** si la base de datos existe, **[false](#constant.false)** si no se encuentra,
o **[null](#constant.null)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_db_avail()**



     Esto mostrará la versión de la base de datos actual.

&lt;?php

if (geoip_db_avail(GEOIP_COUNTRY_EDITION))
print geoip_database_info(GEOIP_COUNTRY_EDITION);
?&gt;

    El ejemplo anterior mostrará:

GEO-106FREE 20080801 Build 1 Copyright (c) 2006 MaxMind LLC All Rights Reserved

# geoip_db_filename

(PECL geoip &gt;= 1.0.1)

geoip_db_filename — Devuelve el nombre del fichero que contiene la base de datos GeoIP especificada

### Descripción

**geoip_db_filename**([int](#language.types.integer) $database): [string](#language.types.string)

La función **geoip_db_filename()** devuelve el nombre
del fichero que contiene la base de datos GeoIP especificada.

La función no indica si el fichero existe o no en el disco, sino únicamente
el lugar en el que la biblioteca busca la base de datos.

### Parámetros

     database


       El tipo de base de datos, en forma de un [int](#language.types.integer). Se pueden
       utilizar diversas [constantes](#geoip.constants),
       definidas con esta extensión (ie: GEOIP_*_EDITION).






### Valores devueltos

Devuelve el nombre del fichero de la base de datos correspondiente, o
**[null](#constant.null)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_db_filename()**



     Esto mostrará el nombre del fichero correspondiente a la base de datos.

&lt;?php

print geoip_db_filename(GEOIP_COUNTRY_EDITION);

?&gt;

    El ejemplo anterior mostrará:

/usr/share/GeoIP/GeoIP.dat

# geoip_db_get_all_info

(PECL geoip &gt;= 1.0.1)

geoip_db_get_all_info — Devuelve información detallada sobre todos los tipos de bases de datos GeoIP

### Descripción

**geoip_db_get_all_info**(): [array](#language.types.array)

La función **geoip_db_get_all_info()** devuelve información
detallada, en forma de un array multidimensional, sobre
todos los tipos de bases de datos GeoIP.

Esta función está disponible incluso si no se ha instalado ninguna base de datos.
Simplemente listará las bases de datos como no disponibles.

Los nombres de las diferentes claves del array asociativo devuelto son los siguientes:

    -

      "available" : Booleano, indica si la base de datos está disponible (ver la función
      [geoip_db_avail()](#function.geoip-db-avail))



    -

      "description" : La descripción de la base de datos



    -

      "filename" : El nombre del fichero que contiene la base de datos en el disco (ver la función
      [geoip_db_filename()](#function.geoip-db-filename))


### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_db_get_all_info()**



     Esto mostrará un array que contiene toda la información.

&lt;?php
$infos = geoip_db_get_all_info();
if (is_array($infos)) {
var_dump($infos);
}
?&gt;

    El ejemplo anterior mostrará:

array(11) {
[1]=&gt;
array(3) {
["available"]=&gt;
bool(true)
["description"]=&gt;
string(21) "GeoIP Country Edition"
["filename"]=&gt;
string(32) "/usr/share/GeoIP/GeoIP.dat"
}

[ ... ]

[11]=&gt;
array(3) {
["available"]=&gt;
bool(false)
["description"]=&gt;
string(25) "GeoIP Domain Name Edition"
["filename"]=&gt;
string(38) "/usr/share/GeoIP/GeoIPDomain.dat"
}
}

    **Ejemplo #2 Ejemplo con geoip_db_get_all_info()**



     Se pueden utilizar diversas constantes como claves para recuperar solo
     partes de la información.

&lt;?php
$infos = geoip_db_get_all_info();
if ($infos[GEOIP_COUNTRY_EDITION]['available']) {
echo $infos[GEOIP_COUNTRY_EDITION]['description'];
}
?&gt;

    El ejemplo anterior mostrará:

GeoIP Country Edition

# geoip_domain_by_name

(PECL geoip &gt;= 1.1.0)

geoip_domain_by_name — Recupera el segundo nivel del nombre de dominio

### Descripción

**geoip_domain_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_domain_by_name()** devuelve el
segundo nivel del dominio asociado con un nombre de host o la dirección IP.

Esta función está actualmente disponible solo para los usuarios que
han comprado una edición comercial de GeoIP Domain. Se emitirá una alerta
si no se puede encontrar la base de datos correcta.

### Parámetros

     hostname


       El nombre de host o la dirección IP.





### Valores devueltos

Devuelve el nombre de dominio en caso de éxito, o **[false](#constant.false)** si la dirección
no puede ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_domain_by_name()**



     Este ejemplo mostrará el dominio asociado con la IP 61.106.139.1.

&lt;?php
$domain = geoip_domain_by_name('61.106.139.1');

if ($domain) {
echo 'El dominio es: '. $domain;
}

?&gt;

    El ejemplo anterior mostrará:

El dominio es: von.co.kr

# geoip_id_by_name

(PECL geoip &gt;= 0.2.0)

geoip_id_by_name — Recupera el tipo de conexión a Internet

### Descripción

**geoip_id_by_name**([string](#language.types.string) $hostname): [int](#language.types.integer)

La función **geoip_id_by_name()**
devuelve el tipo de conexión a Internet correspondiente al nombre del host o
a la dirección IP.

El valor devuelto es de tipo numérico y puede ser comparado con
las siguientes constantes:

    -

      GEOIP_UNKNOWN_SPEED



    -

      GEOIP_DIALUP_SPEED



    -

      GEOIP_CABLEDSL_SPEED



    -

      GEOIP_CORPORATE_SPEED


### Parámetros

     hostname


       El nombre del host o la dirección IP cuyo tipo de conexión debe ser examinado.





### Valores devueltos

Devuelve el tipo de conexión.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_id_by_name()**



     Este ejemplo muestra el tipo de conexión del host example.com.

&lt;?php
$netspeed = geoip_id_by_name('www.example.com');

echo 'La conexión es del tipo ';

switch ($netspeed) {
case GEOIP_DIALUP_SPEED:
echo 'dial-up';
break;
case GEOIP_CABLEDSL_SPEED:
echo 'cable o DSL';
break;
case GEOIP_CORPORATE_SPEED:
echo 'corporate';
break;
case GEOIP_UNKNOWN_SPEED:
default:
echo 'desconocido';
}
?&gt;

    El ejemplo anterior mostrará:

La conexión es del tipo corporate

# geoip_isp_by_name

(PECL geoip &gt;= 1.0.2)

geoip_isp_by_name — Recupera el nombre del proveedor de servicios de Internet

### Descripción

**geoip_isp_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_isp_by_name()** devuelve el nombre
del ISP al que está asignada la IP.

Esta función está actualmente disponible solo para los usuarios que han
adquirido una edición comercial de GeoIP ISP. Se emitirá una advertencia
si la base de datos no puede ser localizada.

### Parámetros

     hostname


       El nombre del host o la dirección IP.





### Valores devueltos

Devuelve el nombre del ISP en caso de éxito, o **[false](#constant.false)** si la dirección
no puede ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_isp_by_name()**



     Esto mostrará el nombre del ISP para el host example.com.

&lt;?php
$isp = geoip_isp_by_name('www.example.com');
if ($isp) {
echo 'La IP del host proviene del ISP: ' . $isp;
}
?&gt;

    El ejemplo anterior mostrará:

La IP del host proviene del ISP: ICANN c/o Internet Assigned Numbers Authority

# geoip_netspeedcell_by_name

(PECL geoip &gt;= 1.1.0)

geoip_netspeedcell_by_name — Recupera la velocidad de la conexión a Internet

### Descripción

**geoip_netspeedcell_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_netspeedcell_by_name()** devolverá
el tipo de conexión a Internet así como su velocidad, según un
nombre de host o una dirección IP.

Esta función solo está disponible al utilizar la versión
1.4.8 de la biblioteca GeoIP, o superiores.

Esta función está actualmente disponible únicamente para los usuarios
que han comprado una edición comercial de GeoIP NetSpeedCell. Se emitirá una alerta
si no se puede encontrar la base de datos correcta.

El valor devuelto será un string cuyos valores comunes son:

    -

      Cable/DSL



    -

      Dialup



    -

      Cellular



    -

      Corporate


### Parámetros

     hostname


       El nombre de host, o la dirección IP.





### Valores devueltos

Devuelve la velocidad de la conexión en caso de éxito, o **[false](#constant.false)** si
la dirección no puede ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_netspeedcell_by_name()**



     Este ejemplo mostrará la velocidad de la conexión del host example.com.

&lt;?php
$netspeed = geoip_netspeedcell_by_name('www.example.com');

if ($netspeed) {
echo 'El tipo de conexión es: '. $netspeed;
}
?&gt;

    El ejemplo anterior mostrará:

El tipo de conexión es: Corporate

# geoip_org_by_name

(PECL geoip &gt;= 0.2.0)

geoip_org_by_name — Recupera el nombre de la organización

### Descripción

**geoip_org_by_name**([string](#language.types.string) $hostname): [string](#language.types.string)

La función **geoip_org_by_name()** devuelve
el nombre de la organización a la que se asigna la dirección IP.

Esta función está actualmente disponible únicamente para los usuarios
que han adquirido una licencia comercial GeoIP Organization,
ISP o AS Edition.
Se emitirá una alerta si la base de datos no puede ser encontrada.

### Parámetros

     hostname


       El nombre del host o la dirección IP





### Valores devueltos

Devuelve el nombre de la organización en caso de éxito, o **[false](#constant.false)**
si la dirección no pudo ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_org_by_name()**



     Este ejemplo muestra el nombre de la organización para el host example.com.

&lt;?php
$org = geoip_org_by_name('www.example.com');
if ($org) {
echo 'Nombre de la organización : ' . $org;
}
?&gt;

    El ejemplo anterior mostrará:

Nombre de la organización : ICANN c/o Internet Assigned Numbers Authority

# geoip_record_by_name

(PECL geoip &gt;= 0.2.0)

geoip_record_by_name — Recupera la información registrada correspondiente al nombre del host o a la dirección IP, encontrada en la base de datos GeoIP

### Descripción

**geoip_record_by_name**([string](#language.types.string) $hostname): [array](#language.types.array)

La función **geoip_record_by_name()** devuelve
la información registrada correspondiente al nombre del host o
a la dirección IP.

Esta función está disponible para las bases de datos GeoLite City Edition y
la versión comercial GeoIP City Edition.
Se emitirá una alerta si la base de datos no ha podido ser encontrada.

Los nombres de las diferentes claves del array asociativo devuelto son los siguientes:

    -

      "continent_code" : Código del continente en 2 letras (disponible desde
      la versión 1.0.4 con libgeoip 1.4.3 o superior)



    -

      "country_code" : Las dos letras del código del país (Véase
      [geoip_country_code_by_name()](#function.geoip-country-code-by-name))



    -

      "country_code3" : Código del país en 3 letras (Véase la función
      [geoip_country_code3_by_name()](#function.geoip-country-code3-by-name))



    -

      "country_name" : Nombre del país (Véase la función
      [geoip_country_name_by_name()](#function.geoip-country-name-by-name))



    -

      "region" : El código de la región (ej: CA para California)



    -

      "city" : La ciudad.



    -

      "postal_code" : El código postal, FSA o Zip.



    -

      "latitude" : La latitud como [float](#language.types.float) firmado.



    -

      "longitude" : La longitud como [float](#language.types.float) firmado.



    -

      "dma_code" : Código de la zona de mercado (Solo para EE.UU.
      y Canadá)



    -

      "area_code" : El código PSTN (ej: 212)


### Parámetros

     hostname


       El nombre del host o la dirección IP





### Valores devueltos

Devuelve un array asociativo en caso de éxito, o **[false](#constant.false)** si la dirección
no ha podido ser encontrada en la base de datos.

### Historial de cambios

       Versión
       Descripción






       PECL geoip 1.0.4

        Adición de continent_code con la biblioteca GeoIP 1.4.3 o superior únicamente




       PECL geoip 1.0.3

        Adición de country_code3 y de country_name





### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_record_by_name()**



     Este ejemplo muestra el array que contiene el registro del host
     example.com.

&lt;?php
$record = geoip_record_by_name('www.example.com');
if ($record) {
print_r($record);
}
?&gt;

    El ejemplo anterior mostrará:

Array
(
[continent_code] =&gt; NA
[country_code] =&gt; US
[country_code3] =&gt; USA
[country_name] =&gt; United States
[region] =&gt; CA
[city] =&gt; Marina Del Rey
[postal_code] =&gt;
[latitude] =&gt; 33.9776992798
[longitude] =&gt; -118.435096741
[dma_code] =&gt; 803
[area_code] =&gt; 310
)

# geoip_region_by_name

(PECL geoip &gt;= 0.2.0)

geoip_region_by_name — Recupera el código del país y la región

### Descripción

**geoip_region_by_name**([string](#language.types.string) $hostname): [array](#language.types.array)

La función **geoip_region_by_name()** devuelve
el país y la región correspondientes al nombre del host o a la dirección IP.

Esta función está actualmente disponible únicamente para los usuarios
que han adquirido una licencia comercial GeoIP Region Edition. Se emitirá una alerta
si la base de datos no ha podido ser encontrada.

Los nombres de las diferentes claves del array devuelto son los siguientes:

    -

      "country_code" : Las dos letras del código del país (Ver la función
      [geoip_country_code_by_name()](#function.geoip-country-code-by-name))



    -

      "region" : El código de la región (ej: CA para California)


### Parámetros

     hostname


       El nombre del host o la dirección IP





### Valores devueltos

Devuelve un array asociativo en caso de éxito, o **[false](#constant.false)** si la dirección
no ha podido ser encontrada en la base de datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_region_by_name()**



     Este ejemplo muestra el array que contiene el código del país y la región
     del host example.com.

&lt;?php
$region = geoip_region_by_name('www.example.com');
if ($region) {
print_r($region);
}
?&gt;

    El ejemplo anterior mostrará:

Array
(
[country_code] =&gt; US
[region] =&gt; CA
)

# geoip_region_name_by_code

(PECL geoip &gt;= 1.0.4)

geoip_region_name_by_code — Devuelve el nombre de la región para un país y un código de región

### Descripción

**geoip_region_name_by_code**([string](#language.types.string) $country_code, [string](#language.types.string) $region_code): [string](#language.types.string)

**geoip_region_name_by_code()** devuelve el nombre de la región correspondiente
a un par país y región.

En los Estados Unidos de América, la región corresponde a la abreviatura de dos letras
del estado. En Canadá, esta región corresponde a la abreviatura de la provincia o del
territorio, tal como lo asigna Correos de Canadá.

Para el resto del mundo, GeoIP utiliza los códigos FIPS 10-4 para representar las regiones.
Se puede verificar el sitio [» http://www.maxmind.com/app/fips10_4](http://www.maxmind.com/app/fips10_4)
para obtener una lista detallada de los códigos FIPS 10-4.

Esta función está siempre disponible si se utiliza la versión 1.4.1 o superior de la biblioteca GeoIP. Los datos se obtienen directamente de la biblioteca GeoIP y no de una tabla de referencia.

### Parámetros

     country_code


       El código del país, en dos letras (véase
       [geoip_country_code_by_name()](#function.geoip-country-code-by-name))






     region_code


       El código de la región en dos letras (véase
       [geoip_region_by_name()](#function.geoip-region-by-name))





### Valores devueltos

Devuelve el nombre de la región en caso de éxito, o **[false](#constant.false)** si el país, la región o la combinación
de ambos no se encuentra.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_region_name_by_code()** para EE.UU. y Canadá



     Este script mostrará el nombre de la región para la región QC en CA.

&lt;?php
$region = geoip_region_name_by_code('CA', 'QC');
if ($region) {
echo 'Nombre de la región CA/QC: ' . $region;
}
?&gt;

    El ejemplo anterior mostrará:

Nombre de la región CA/QC: Quebec

    **Ejemplo #2 Ejemplo con geoip_region_name_by_code()** utilizando los códigos FIPS



     Este script mostrará el nombre de la región para la región 01 en JP (Japón).

&lt;?php
$region = geoip_region_name_by_code('JP', '01');
if ($region) {
echo 'Nombre de la región JP/01: ' . $region;
}
?&gt;

    El ejemplo anterior mostrará:

Nombre de la región JP/01: Aichi

# geoip_setup_custom_directory

(PECL geoip &gt;= 1.1.0)

geoip_setup_custom_directory — Define un directorio personalizado para la base de datos GeoIP

### Descripción

**geoip_setup_custom_directory**([string](#language.types.string) $path): [void](language.types.void.html)

La función **geoip_setup_custom_directory()**
modificará el directorio por omisión de la base de datos GeoIP.
Esto es equivalente a modificar la opción de configuración
[geoip.custom_directory](#ini.geoip.custom-directory).

### Parámetros

     path


       La ruta de acceso completa donde se encuentra la base de datos GeoIP en el disco.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_setup_custom_directory()**



     Este ejemplo modificará la ruta de acceso por omisión hacia la base de datos GeoIP.

&lt;?php

geoip_setup_custom_directory('/un/otro/ruta');

print geoip_db_filename(GEOIP_COUNTRY_EDITION);

?&gt;

    El ejemplo anterior mostrará:

/un/otro/ruta/GeoIP.dat

# geoip_time_zone_by_country_and_region

(PECL geoip &gt;= 1.0.4)

geoip_time_zone_by_country_and_region — Devuelve la zona horaria de ciertos países y regiones del mundo

### Descripción

**geoip_time_zone_by_country_and_region**([string](#language.types.string) $country_code, [string](#language.types.string) $region_code = ?): [string](#language.types.string)

**geoip_time_zone_by_country_and_region()** devuelve la zona horaria
correspondiente a un país y una región.

En los Estados Unidos de América, la región corresponde a la abreviatura de dos letras
del estado. En Canadá, esta región corresponde a la abreviatura de la provincia o del
territorio, tal como lo asigna Correos de Canadá.

Para el resto del mundo, GeoIP utiliza los códigos FIPS 10-4 para representar las regiones.
Se puede verificar el sitio [» http://www.maxmind.com/app/fips10_4](http://www.maxmind.com/app/fips10_4)
para una lista detallada de los códigos FIPS 10-4.

Esta función está siempre disponible si se utiliza GeoIP Library
versión 1.4.1 o más reciente. Los datos provienen directamente de GeoIP
Library y no de una tabla de referencia.

### Parámetros

     country_code


       El código del país, en dos letras (véase
       [geoip_country_code_by_name()](#function.geoip-country-code-by-name))






     region_code


       El código de región en dos letras (véase
       [geoip_region_by_name()](#function.geoip-region-by-name))





### Valores devueltos

Devuelve la zona horaria en caso de éxito, y **[false](#constant.false)** si el país,
la región o la combinación de ambos no se encuentra.

### Ejemplos

    **Ejemplo #1 Ejemplo con geoip_time_zone_by_country_and_region()** para EE.UU. y Canadá



     Este script mostrará la zona horaria de Quebec, Canadá.

&lt;?php
$timezone = geoip_time_zone_by_country_and_region('CA', 'QC');
if ($timezone) {
echo 'Zona horaria de CA/QC : ' . $timezone;
}
?&gt;

    El ejemplo anterior mostrará:

Zona horaria de CA/QC : America/Montreal

    **Ejemplo #2 Ejemplo con geoip_time_zone_by_country_and_region()** y los códigos FIPS



     Este script mostrará la zona horaria de Japón, región 01 (Aichi).

&lt;?php
$timezone = geoip_time_zone_by_country_and_region('JP', '01');
if ($timezone) {
echo 'Zona horaria de JP/01 : ' . $timezone;
}
?&gt;

    El ejemplo anterior mostrará:

Zona horaria de JP/01 : Asia/Tokyo

## Tabla de contenidos

- [geoip_asnum_by_name](#function.geoip-asnum-by-name) — Recupera el ASN (Autonomous System Numbers)
- [geoip_continent_code_by_name](#function.geoip-continent-code-by-name) — Lee el código de continente de una IP
- [geoip_country_code_by_name](#function.geoip-country-code-by-name) — Recupera las dos letras del código del país
- [geoip_country_code3_by_name](#function.geoip-country-code3-by-name) — Recupera las tres letras del código del país
- [geoip_country_name_by_name](#function.geoip-country-name-by-name) — Recupera el nombre completo del país
- [geoip_database_info](#function.geoip-database-info) — Recupera la información de la base de datos GeoIP
- [geoip_db_avail](#function.geoip-db-avail) — Verifica si la base de datos GeoIP está disponible
- [geoip_db_filename](#function.geoip-db-filename) — Devuelve el nombre del fichero que contiene la base de datos GeoIP especificada
- [geoip_db_get_all_info](#function.geoip-db-get-all-info) — Devuelve información detallada sobre todos los tipos de bases de datos GeoIP
- [geoip_domain_by_name](#function.geoip-domain-by-name) — Recupera el segundo nivel del nombre de dominio
- [geoip_id_by_name](#function.geoip-id-by-name) — Recupera el tipo de conexión a Internet
- [geoip_isp_by_name](#function.geoip-isp-by-name) — Recupera el nombre del proveedor de servicios de Internet
- [geoip_netspeedcell_by_name](#function.geoip-netspeedcell-by-name) — Recupera la velocidad de la conexión a Internet
- [geoip_org_by_name](#function.geoip-org-by-name) — Recupera el nombre de la organización
- [geoip_record_by_name](#function.geoip-record-by-name) — Recupera la información registrada correspondiente al nombre del host o a la dirección IP, encontrada en la base de datos GeoIP
- [geoip_region_by_name](#function.geoip-region-by-name) — Recupera el código del país y la región
- [geoip_region_name_by_code](#function.geoip-region-name-by-code) — Devuelve el nombre de la región para un país y un código de región
- [geoip_setup_custom_directory](#function.geoip-setup-custom-directory) — Define un directorio personalizado para la base de datos GeoIP
- [geoip_time_zone_by_country_and_region](#function.geoip-time-zone-by-country-and-region) — Devuelve la zona horaria de ciertos países y regiones del mundo

- [Introducción](#intro.geoip)
- [Instalación/Configuración](#geoip.setup)<li>[Requerimientos](#geoip.requirements)
- [Instalación](#geoip.installation)
- [Configuración en tiempo de ejecución](#geoip.configuration)
  </li>- [Constantes predefinidas](#geoip.constants)
- [Funciones GeoIP](#ref.geoip)<li>[geoip_asnum_by_name](#function.geoip-asnum-by-name) — Recupera el ASN (Autonomous System Numbers)
- [geoip_continent_code_by_name](#function.geoip-continent-code-by-name) — Lee el código de continente de una IP
- [geoip_country_code_by_name](#function.geoip-country-code-by-name) — Recupera las dos letras del código del país
- [geoip_country_code3_by_name](#function.geoip-country-code3-by-name) — Recupera las tres letras del código del país
- [geoip_country_name_by_name](#function.geoip-country-name-by-name) — Recupera el nombre completo del país
- [geoip_database_info](#function.geoip-database-info) — Recupera la información de la base de datos GeoIP
- [geoip_db_avail](#function.geoip-db-avail) — Verifica si la base de datos GeoIP está disponible
- [geoip_db_filename](#function.geoip-db-filename) — Devuelve el nombre del fichero que contiene la base de datos GeoIP especificada
- [geoip_db_get_all_info](#function.geoip-db-get-all-info) — Devuelve información detallada sobre todos los tipos de bases de datos GeoIP
- [geoip_domain_by_name](#function.geoip-domain-by-name) — Recupera el segundo nivel del nombre de dominio
- [geoip_id_by_name](#function.geoip-id-by-name) — Recupera el tipo de conexión a Internet
- [geoip_isp_by_name](#function.geoip-isp-by-name) — Recupera el nombre del proveedor de servicios de Internet
- [geoip_netspeedcell_by_name](#function.geoip-netspeedcell-by-name) — Recupera la velocidad de la conexión a Internet
- [geoip_org_by_name](#function.geoip-org-by-name) — Recupera el nombre de la organización
- [geoip_record_by_name](#function.geoip-record-by-name) — Recupera la información registrada correspondiente al nombre del host o a la dirección IP, encontrada en la base de datos GeoIP
- [geoip_region_by_name](#function.geoip-region-by-name) — Recupera el código del país y la región
- [geoip_region_name_by_code](#function.geoip-region-name-by-code) — Devuelve el nombre de la región para un país y un código de región
- [geoip_setup_custom_directory](#function.geoip-setup-custom-directory) — Define un directorio personalizado para la base de datos GeoIP
- [geoip_time_zone_by_country_and_region](#function.geoip-time-zone-by-country-and-region) — Devuelve la zona horaria de ciertos países y regiones del mundo
  </li>
