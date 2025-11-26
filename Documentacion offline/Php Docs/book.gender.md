# Determina el género de un nombre

# Introducción

La extensión PHP Gender es un puerto del programa gender.c
originalmente escrito por Joerg Michael. El objetivo principal de
este programa es encontrar el género de un nombre. La base de datos
actual contiene más de 40000 nombres de 54 países.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#gender.installation)

    ## Instalación

            Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.




         Información sobre la instalación de estas extensiones PECL
            puede ser encontrada en el capítulo del manual titulado [Instalación

    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/gender](https://pecl.php.net/package/gender).

# Ejemplos

## Tabla de contenidos

- [Ejemplo de uso.](#gender.example.admin)

    ## Ejemplo de uso.

    Ejemplo de uso de la clase Gender.

    **Ejemplo #1 Ejemplo de uso.**

&lt;?php

namespace Gender;

$género = new Gender;

$nombre = "Milene";
$país = Gender::FRANCE;

$resultado = $género-&gt;get($nombre, $país);

$datos = $género-&gt;country($país);

switch($resultado) {
case Gender::IS_FEMALE:
printf("El nombre %s es femenino en %s\n", $nombre, $datos['country']);
break;

    case Gender::IS_MOSTLY_FEMALE:
        printf("El nombre %s es habitualmente femenino en %s\n", $nombre, $datos['country']);
    break;


    case Gender::IS_MALE:
        printf("El nombre %s es masculino en %s\n", $nombre, $datos['country']);
    break;


    case Gender::IS_MOSTLY_MALE:
        printf("El nombre %s es habitualmente masculino en %s\n", $nombre, $datos['country']);
    break;


    case Gender::IS_UNISEX_NAME:
        printf("El nombre %s es unisex en %s\n", $nombre, $datos['country']);
    break;


    case Gender::IS_A_COUPLE:
        printf("El nombre %s es masculino y femenino en %s\n", $nombre, $datos['country']);
    break;


    case Gender::NAME_NOT_FOUND:
        printf("El nombre %s no se encontró en %s\n", $nombre, $datos['country']);
    break;


    case Gender::ERROR_IN_NAME:
        echo "¡Hay un error con el nombre proporcionado!\n";
    break;

    default:
        echo "¡Ocurrió un error!\n";
    break;

}

# La clase Gender\Gender

(PECL gender &gt;= 0.6.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Gender\Gender**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [IS_FEMALE](#gender-gender.constants.is-female) = 70;

    const
     [int](#language.types.integer)
      [IS_MOSTLY_FEMALE](#gender-gender.constants.is-mostly-female) = 102;

    const
     [int](#language.types.integer)
      [IS_MALE](#gender-gender.constants.is-male) = 77;

    const
     [int](#language.types.integer)
      [IS_MOSTLY_MALE](#gender-gender.constants.is-mostly-male) = 109;

    const
     [int](#language.types.integer)
      [IS_UNISEX_NAME](#gender-gender.constants.is-unisex-name) = 63;

    const
     [int](#language.types.integer)
      [IS_A_COUPLE](#gender-gender.constants.is-a-couple) = 67;

    const
     [int](#language.types.integer)
      [NAME_NOT_FOUND](#gender-gender.constants.name-not-found) = 32;

    const
     [int](#language.types.integer)
      [ERROR_IN_NAME](#gender-gender.constants.error-in-name) = 69;

    const
     [int](#language.types.integer)
      [ANY_COUNTRY](#gender-gender.constants.any-country) = 0;

    const
     [int](#language.types.integer)
      [BRITAIN](#gender-gender.constants.britain) = 1;

    const
     [int](#language.types.integer)
      [IRELAND](#gender-gender.constants.ireland) = 2;

    const
     [int](#language.types.integer)
      [USA](#gender-gender.constants.usa) = 3;

    const
     [int](#language.types.integer)
      [SPAIN](#gender-gender.constants.spain) = 4;

    const
     [int](#language.types.integer)
      [PORTUGAL](#gender-gender.constants.portugal) = 5;

    const
     [int](#language.types.integer)
      [ITALY](#gender-gender.constants.italy) = 6;

    const
     [int](#language.types.integer)
      [MALTA](#gender-gender.constants.malta) = 7;

    const
     [int](#language.types.integer)
      [FRANCE](#gender-gender.constants.france) = 8;

    const
     [int](#language.types.integer)
      [BELGIUM](#gender-gender.constants.belgium) = 9;

    const
     [int](#language.types.integer)
      [LUXEMBOURG](#gender-gender.constants.luxembourg) = 10;

    const
     [int](#language.types.integer)
      [NETHERLANDS](#gender-gender.constants.netherlands) = 11;

    const
     [int](#language.types.integer)
      [GERMANY](#gender-gender.constants.germany) = 12;

    const
     [int](#language.types.integer)
      [EAST_FRISIA](#gender-gender.constants.east-frisia) = 13;

    const
     [int](#language.types.integer)
      [AUSTRIA](#gender-gender.constants.austria) = 14;

    const
     [int](#language.types.integer)
      [SWISS](#gender-gender.constants.swiss) = 15;

    const
     [int](#language.types.integer)
      [ICELAND](#gender-gender.constants.iceland) = 16;

    const
     [int](#language.types.integer)
      [DENMARK](#gender-gender.constants.denmark) = 17;

    const
     [int](#language.types.integer)
      [NORWAY](#gender-gender.constants.norway) = 18;

    const
     [int](#language.types.integer)
      [SWEDEN](#gender-gender.constants.sweden) = 19;

    const
     [int](#language.types.integer)
      [FINLAND](#gender-gender.constants.finland) = 20;

    const
     [int](#language.types.integer)
      [ESTONIA](#gender-gender.constants.estonia) = 21;

    const
     [int](#language.types.integer)
      [LATVIA](#gender-gender.constants.latvia) = 22;

    const
     [int](#language.types.integer)
      [LITHUANIA](#gender-gender.constants.lithuania) = 23;

    const
     [int](#language.types.integer)
      [POLAND](#gender-gender.constants.poland) = 24;

    const
     [int](#language.types.integer)
      [CZECH_REP](#gender-gender.constants.czech-rep) = 25;

    const
     [int](#language.types.integer)
      [SLOVAKIA](#gender-gender.constants.slovakia) = 26;

    const
     [int](#language.types.integer)
      [HUNGARY](#gender-gender.constants.hungary) = 27;

    const
     [int](#language.types.integer)
      [ROMANIA](#gender-gender.constants.romania) = 28;

    const
     [int](#language.types.integer)
      [BULGARIA](#gender-gender.constants.bulgaria) = 29;

    const
     [int](#language.types.integer)
      [BOSNIA](#gender-gender.constants.bosnia) = 30;

    const
     [int](#language.types.integer)
      [CROATIA](#gender-gender.constants.croatia) = 31;

    const
     [int](#language.types.integer)
      [KOSOVO](#gender-gender.constants.kosovo) = 32;

    const
     [int](#language.types.integer)
      [MACEDONIA](#gender-gender.constants.macedonia) = 33;

    const
     [int](#language.types.integer)
      [MONTENEGRO](#gender-gender.constants.montenegro) = 34;

    const
     [int](#language.types.integer)
      [SERBIA](#gender-gender.constants.serbia) = 35;

    const
     [int](#language.types.integer)
      [SLOVENIA](#gender-gender.constants.slovenia) = 36;

    const
     [int](#language.types.integer)
      [ALBANIA](#gender-gender.constants.albania) = 37;

    const
     [int](#language.types.integer)
      [GREECE](#gender-gender.constants.greece) = 38;

    const
     [int](#language.types.integer)
      [RUSSIA](#gender-gender.constants.russia) = 39;

    const
     [int](#language.types.integer)
      [BELARUS](#gender-gender.constants.belarus) = 40;

    const
     [int](#language.types.integer)
      [MOLDOVA](#gender-gender.constants.moldova) = 41;

    const
     [int](#language.types.integer)
      [UKRAINE](#gender-gender.constants.ukraine) = 42;

    const
     [int](#language.types.integer)
      [ARMENIA](#gender-gender.constants.armenia) = 43;

    const
     [int](#language.types.integer)
      [AZERBAIJAN](#gender-gender.constants.azerbaijan) = 44;

    const
     [int](#language.types.integer)
      [GEORGIA](#gender-gender.constants.georgia) = 45;

    const
     [int](#language.types.integer)
      [KAZAKH_UZBEK](#gender-gender.constants.kazakh-uzbek) = 46;

    const
     [int](#language.types.integer)
      [TURKEY](#gender-gender.constants.turkey) = 47;

    const
     [int](#language.types.integer)
      [ARABIA](#gender-gender.constants.arabia) = 48;

    const
     [int](#language.types.integer)
      [ISRAEL](#gender-gender.constants.israel) = 49;

    const
     [int](#language.types.integer)
      [CHINA](#gender-gender.constants.china) = 50;

    const
     [int](#language.types.integer)
      [INDIA](#gender-gender.constants.india) = 51;

    const
     [int](#language.types.integer)
      [JAPAN](#gender-gender.constants.japan) = 52;

    const
     [int](#language.types.integer)
      [KOREA](#gender-gender.constants.korea) = 53;


    /* Métodos */

public [\_\_construct](#gender-gender.construct)([string](#language.types.string) $dsn = ?)

    public [connect](#gender-gender.connect)([string](#language.types.string) $dsn): [bool](#language.types.boolean)

public [country](#gender-gender.country)([int](#language.types.integer) $country): [array](#language.types.array)|[false](#language.types.singleton)
public [get](#gender-gender.get)([string](#language.types.string) $name, [int](#language.types.integer) $country = ?): [int](#language.types.integer)
public [isNick](#gender-gender.isnick)([string](#language.types.string) $name0, [string](#language.types.string) $name1, [int](#language.types.integer) $country = ?): [array](#language.types.array)
public [similarNames](#gender-gender.similarnames)([string](#language.types.string) $name, [int](#language.types.integer) $country = ?): [array](#language.types.array)

}

## Constantes predefinidas

     **[Gender\Gender::IS_FEMALE](#gender-gender.constants.is-female)**








     **[Gender\Gender::IS_MOSTLY_FEMALE](#gender-gender.constants.is-mostly-female)**








     **[Gender\Gender::IS_MALE](#gender-gender.constants.is-male)**








     **[Gender\Gender::IS_MOSTLY_MALE](#gender-gender.constants.is-mostly-male)**








     **[Gender\Gender::IS_UNISEX_NAME](#gender-gender.constants.is-unisex-name)**








     **[Gender\Gender::IS_A_COUPLE](#gender-gender.constants.is-a-couple)**








     **[Gender\Gender::NAME_NOT_FOUND](#gender-gender.constants.name-not-found)**








     **[Gender\Gender::ERROR_IN_NAME](#gender-gender.constants.error-in-name)**








     **[Gender\Gender::ANY_COUNTRY](#gender-gender.constants.any-country)**








     **[Gender\Gender::BRITAIN](#gender-gender.constants.britain)**








     **[Gender\Gender::IRELAND](#gender-gender.constants.ireland)**








     **[Gender\Gender::USA](#gender-gender.constants.usa)**








     **[Gender\Gender::SPAIN](#gender-gender.constants.spain)**








     **[Gender\Gender::PORTUGAL](#gender-gender.constants.portugal)**








     **[Gender\Gender::ITALY](#gender-gender.constants.italy)**








     **[Gender\Gender::MALTA](#gender-gender.constants.malta)**








     **[Gender\Gender::FRANCE](#gender-gender.constants.france)**








     **[Gender\Gender::BELGIUM](#gender-gender.constants.belgium)**








     **[Gender\Gender::LUXEMBOURG](#gender-gender.constants.luxembourg)**








     **[Gender\Gender::NETHERLANDS](#gender-gender.constants.netherlands)**








     **[Gender\Gender::GERMANY](#gender-gender.constants.germany)**








     **[Gender\Gender::EAST_FRISIA](#gender-gender.constants.east-frisia)**








     **[Gender\Gender::AUSTRIA](#gender-gender.constants.austria)**








     **[Gender\Gender::SWISS](#gender-gender.constants.swiss)**








     **[Gender\Gender::ICELAND](#gender-gender.constants.iceland)**








     **[Gender\Gender::DENMARK](#gender-gender.constants.denmark)**








     **[Gender\Gender::NORWAY](#gender-gender.constants.norway)**








     **[Gender\Gender::SWEDEN](#gender-gender.constants.sweden)**








     **[Gender\Gender::FINLAND](#gender-gender.constants.finland)**








     **[Gender\Gender::ESTONIA](#gender-gender.constants.estonia)**








     **[Gender\Gender::LATVIA](#gender-gender.constants.latvia)**








     **[Gender\Gender::LITHUANIA](#gender-gender.constants.lithuania)**








     **[Gender\Gender::POLAND](#gender-gender.constants.poland)**








     **[Gender\Gender::CZECH_REP](#gender-gender.constants.czech-rep)**








     **[Gender\Gender::SLOVAKIA](#gender-gender.constants.slovakia)**








     **[Gender\Gender::HUNGARY](#gender-gender.constants.hungary)**








     **[Gender\Gender::ROMANIA](#gender-gender.constants.romania)**








     **[Gender\Gender::BULGARIA](#gender-gender.constants.bulgaria)**








     **[Gender\Gender::BOSNIA](#gender-gender.constants.bosnia)**








     **[Gender\Gender::CROATIA](#gender-gender.constants.croatia)**








     **[Gender\Gender::KOSOVO](#gender-gender.constants.kosovo)**








     **[Gender\Gender::MACEDONIA](#gender-gender.constants.macedonia)**








     **[Gender\Gender::MONTENEGRO](#gender-gender.constants.montenegro)**








     **[Gender\Gender::SERBIA](#gender-gender.constants.serbia)**








     **[Gender\Gender::SLOVENIA](#gender-gender.constants.slovenia)**








     **[Gender\Gender::ALBANIA](#gender-gender.constants.albania)**








     **[Gender\Gender::GREECE](#gender-gender.constants.greece)**








     **[Gender\Gender::RUSSIA](#gender-gender.constants.russia)**








     **[Gender\Gender::BELARUS](#gender-gender.constants.belarus)**








     **[Gender\Gender::MOLDOVA](#gender-gender.constants.moldova)**








     **[Gender\Gender::UKRAINE](#gender-gender.constants.ukraine)**








     **[Gender\Gender::ARMENIA](#gender-gender.constants.armenia)**








     **[Gender\Gender::AZERBAIJAN](#gender-gender.constants.azerbaijan)**








     **[Gender\Gender::GEORGIA](#gender-gender.constants.georgia)**








     **[Gender\Gender::KAZAKH_UZBEK](#gender-gender.constants.kazakh-uzbek)**








     **[Gender\Gender::TURKEY](#gender-gender.constants.turkey)**








     **[Gender\Gender::ARABIA](#gender-gender.constants.arabia)**








     **[Gender\Gender::ISRAEL](#gender-gender.constants.israel)**








     **[Gender\Gender::CHINA](#gender-gender.constants.china)**








     **[Gender\Gender::INDIA](#gender-gender.constants.india)**








     **[Gender\Gender::JAPAN](#gender-gender.constants.japan)**








     **[Gender\Gender::KOREA](#gender-gender.constants.korea)**






# Gender\Gender::connect

(PECL gender &gt;= 0.6.0)

Gender\Gender::connect — Conexión a un diccionario externo

### Descripción

public **Gender\Gender::connect**([string](#language.types.string) $dsn): [bool](#language.types.boolean)

Conexión a un diccionario externo.
Actualmente, solo los flujos son soportados.

### Parámetros

      dsn


           DSN a abrir.






### Valores devueltos

Un booleano en caso de éxito o de fracaso.

# Gender\Gender::\_\_construct

(PECL gender &gt;= 0.6.0)

Gender\Gender::\_\_construct — Construye un objeto Gender

### Descripción

public **Gender\Gender::\_\_construct**([string](#language.types.string) $dsn = ?)

Crea un objeto Gender, conectándose, opcionalmente, a un
diccionario externo. Cuando no se proporciona ninguna base de datos,
se utilizarán los datos compilados internamente.

### Parámetros

      dsn


           DSN a abrir.






# Gender\Gender::country

(PECL gender &gt;= 0.8.0)

Gender\Gender::country — Obtiene la representación textual de un país

### Descripción

public **Gender\Gender::country**([int](#language.types.integer) $country): [array](#language.types.array)|[false](#language.types.singleton)

Obtiene la representación textual de un país desde
la constante de la clase Gender.

### Parámetros

    country


      Identificador del país (corresponde a una constante de la clase
      [Gender\Gender](#class.gender)).


### Valores devueltos

Devuelve un array que contiene los nombres cortos y largos
del país en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Gender\Gender::country()**

$gender = new Gender\Gender;
var_dump($gender-&gt;country(Gender\Gender::BRITAIN));

    El ejemplo anterior mostrará:

array(2) {
'country_short' =&gt;
string(2) "UK"
'country' =&gt;
string(13) "Great Britain"
}

# Gender\Gender::get

(PECL gender &gt;= 0.6.0)

Gender\Gender::get — Obtiene el género de un nombre

### Descripción

public **Gender\Gender::get**([string](#language.types.string) $name, [int](#language.types.integer) $country = ?): [int](#language.types.integer)

Obtiene el género de un nombre para un país específico.

### Parámetros

    name


      El nombre a verificar.






    country


      El identificador del país (una constante de la clase Gender).


### Valores devueltos

Devuelve el género del nombre.

# Gender\Gender::isNick

(PECL gender &gt;= 0.9.0)

Gender\Gender::isNick — Verifica si name0 es un alias de name1

### Descripción

public **Gender\Gender::isNick**([string](#language.types.string) $name0, [string](#language.types.string) $name1, [int](#language.types.integer) $country = ?): [array](#language.types.array)

Verifica si name0 es un alias de name1.

### Parámetros

    name0


      Nombre a verificar.






    name1


      Nombre a verificar.






    country


      Identificador del país, identificado por la constante de la
      clase Gender. Si se omite, ANY_COUNTRY será utilizado.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Gender\Gender::similarNames

(PECL gender &gt;= 0.9.0)

Gender\Gender::similarNames — Obtiene nombres similares

### Descripción

public **Gender\Gender::similarNames**([string](#language.types.string) $name, [int](#language.types.integer) $country = ?): [array](#language.types.array)

Obtiene nombres similares para el nombre y el país proporcionados.

### Parámetros

    name


      Nombre a verificar.






    country


      Identificador del país, identificado por la constante de clase
      Gender. Si se omite, se utilizará ANY_COUNTRY.


### Valores devueltos

Devuelve un array que contiene los nombres similares encontrados.

## Tabla de contenidos

- [Gender\Gender::connect](#gender-gender.connect) — Conexión a un diccionario externo
- [Gender\Gender::\_\_construct](#gender-gender.construct) — Construye un objeto Gender
- [Gender\Gender::country](#gender-gender.country) — Obtiene la representación textual de un país
- [Gender\Gender::get](#gender-gender.get) — Obtiene el género de un nombre
- [Gender\Gender::isNick](#gender-gender.isnick) — Verifica si name0 es un alias de name1
- [Gender\Gender::similarNames](#gender-gender.similarnames) — Obtiene nombres similares

- [Introducción](#intro.gender)
- [Instalación/Configuración](#gender.setup)<li>[Instalación](#gender.installation)
  </li>- [Ejemplos](#gender.examples)<li>[Ejemplo de uso.](#gender.example.admin)
  </li>- [Gender\Gender](#class.gender) — La clase Gender\Gender<li>[Gender\Gender::connect](#gender-gender.connect) — Conexión a un diccionario externo
- [Gender\Gender::\_\_construct](#gender-gender.construct) — Construye un objeto Gender
- [Gender\Gender::country](#gender-gender.country) — Obtiene la representación textual de un país
- [Gender\Gender::get](#gender-gender.get) — Obtiene el género de un nombre
- [Gender\Gender::isNick](#gender-gender.isnick) — Verifica si name0 es un alias de name1
- [Gender\Gender::similarNames](#gender-gender.similarnames) — Obtiene nombres similares
  </li>
