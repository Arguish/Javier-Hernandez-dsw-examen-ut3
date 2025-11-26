# Gettext

# Introducción

Las funciones de gettext implementan una API de Soporte de Lenguaje Nativo (NLS de las siglas en inglés Native Language Support)
la cual se puede utilizar para internacionalizar las aplicaciones de PHP.
Por favor, consulte la documentación de gettext para su sistema para obtener una
explicación detallada de estas funciones o vea la documentación en
[» http://www.gnu.org/software/gettext/manual/gettext.html](http://www.gnu.org/software/gettext/manual/gettext.html).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#gettext.requirements)
- [Instalación](#gettext.installation)

    ## Requerimientos

    Para utilizar estas funciones, es necesario descargar e instalar las bibliotecas
    GNU gettext desde [» http://www.gnu.org/software/gettext/gettext.html](http://www.gnu.org/software/gettext/gettext.html).

## Instalación

Para incluir soporte para GNU gettext en su instalación de PHP, debe añadir la opción
**--with-gettext[=DIR]** donde DIR es el directorio de
la instalación de gettext, por omisión es /usr/local.

# Funciones de Gettext

# \_

(PHP 4, PHP 5, PHP 7, PHP 8)

\_ — Alias de [gettext()](#function.gettext)

### Descripción

Esta función es un alias de:
[gettext()](#function.gettext).

# bind_textdomain_codeset

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

bind_textdomain_codeset — Especifica o recupera el juego de caracteres utilizado para los mensajes del dominio DOMAIN

### Descripción

**bind_textdomain_codeset**([string](#language.types.string) $domain, [?](#language.types.null)[string](#language.types.string) $codeset = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**bind_textdomain_codeset()** permite recuperar o definir
la codificación en la cual los mensajes de domain serán
devueltos por [gettext()](#function.gettext) y funciones similares.

### Parámetros

     domain


       El dominio.






     codeset


       El juego de caracteres.
       Si **[null](#constant.null)**, la codificación actualmente definida es devuelta.





### Valores devueltos

Una [string](#language.types.string) en caso de éxito.

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror) si domain
es una [string](#language.types.string) vacía.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Lanza ahora una [ValueError](#class.valueerror) si domain
       es una [string](#language.types.string) vacía.




      8.4.0

       codeset es ahora opcional.
       Anteriormente, este parámetro debía siempre ser especificado.




      8.0.3

       codeset es ahora nullable.
       Anteriormente, no era posible recuperar la codificación actualmente definida.



### Notas

**Nota**:

    La información **bind_textdomain_codeset()** es mantenida por proceso,
    y no por hilo.

# bindtextdomain

(PHP 4, PHP 5, PHP 7, PHP 8)

bindtextdomain — Especifica o recupera la ruta de un dominio

### Descripción

**bindtextdomain**([string](#language.types.string) $domain, [?](#language.types.null)[string](#language.types.string) $directory = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

La función **bindtextdomain()** define o recupera la ruta
de un dominio.

### Parámetros

     domain


       El dominio.






     directory


       La ruta hacia el directorio.
       Una cadena vacía significa el directorio actual.
       Si **[null](#constant.null)**, se devuelve el directorio actualmente definido.





### Valores devueltos

La ruta completa para el domain actualmente definido,
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       directory ahora es opcional.
       Anteriormente, este parámetro debía ser siempre especificado.




      8.0.3

       directory ahora es nullable.
       Anteriormente, no era posible recuperar el directorio actualmente definido.



### Ejemplos

    **Ejemplo #1 Ejemplo con bindtextdomain()**

&lt;?php

$domain = 'myapp';
echo bindtextdomain($domain, '/usr/share/myapp/locale');

?&gt;

    El ejemplo anterior mostrará:

/usr/share/myapp/locale

### Notas

**Nota**:

    La información **bindtextdomain()** se mantiene por proceso,
    y no por hilo.

# dcgettext

(PHP 4, PHP 5, PHP 7, PHP 8)

dcgettext — Reemplaza el dominio durante una búsqueda

### Descripción

**dcgettext**([string](#language.types.string) $domain, [string](#language.types.string) $message, [int](#language.types.integer) $category): [string](#language.types.string)

Permite reemplazar el dominio actual durante la búsqueda de un mensaje.

### Parámetros

     domain


       El dominio






     message


       El mensaje






     category


       La categoría





### Valores devueltos

Una [string](#language.types.string) en caso de éxito.

### Ver también

    - [gettext()](#function.gettext) - Busca un mensaje en el dominio actual

# dcngettext

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

dcngettext — Versión plural de dcgettext

### Descripción

**dcngettext**(
    [string](#language.types.string) $domain,
    [string](#language.types.string) $singular,
    [string](#language.types.string) $plural,
    [int](#language.types.integer) $count,
    [int](#language.types.integer) $category
): [string](#language.types.string)

Permite reemplazar el dominio actual para una búsqueda simple en plural de un mensaje.

### Parámetros

     domain


       El dominio






     singular








     plural








     count








     category







### Valores devueltos

Una [string](#language.types.string) en caso de éxito.

### Ver también

    - [ngettext()](#function.ngettext) - Versión plural de gettext

# dgettext

(PHP 4, PHP 5, PHP 7, PHP 8)

dgettext — Reemplaza el dominio actual

### Descripción

**dgettext**([string](#language.types.string) $domain, [string](#language.types.string) $message): [string](#language.types.string)

**dgettext()** reemplaza el dominio actual
domain para una búsqueda simple en
message.

### Parámetros

     domain


       El dominio






     message


       El mensaje





### Valores devueltos

Un string en caso de éxito.

### Errores/Excepciones

    Lanza una [ValueError](#class.valueerror) si domain
    es un string vacío.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Ahora lanza una [ValueError](#class.valueerror) si domain
        es un string vacío.





### Ver también

     - [gettext()](#function.gettext) - Busca un mensaje en el dominio actual

# dngettext

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

dngettext — Versión plural de dgettext

### Descripción

**dngettext**(
    [string](#language.types.string) $domain,
    [string](#language.types.string) $singular,
    [string](#language.types.string) $plural,
    [int](#language.types.integer) $count
): [string](#language.types.string)

**dngettext()** permite reemplazar el dominio actual
domain para una búsqueda simple en plural
de un mensaje.

### Parámetros

     domain


       El dominio






     singular








     plural








     count







### Valores devueltos

Un [string](#language.types.string) en caso de éxito.

### Errores/Excepciones

    Genera una [ValueError](#class.valueerror) si domain
    es un [string](#language.types.string) vacío.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Genera ahora una [ValueError](#class.valueerror) si domain
       es un [string](#language.types.string) vacío.



### Ver también

    - [ngettext()](#function.ngettext) - Versión plural de gettext

# gettext

(PHP 4, PHP 5, PHP 7, PHP 8)

gettext — Busca un mensaje en el dominio actual

### Descripción

**gettext**([string](#language.types.string) $message): [string](#language.types.string)

Busca un mensaje en el dominio actual.

### Parámetros

     message


       El mensaje a traducir.





### Valores devueltos

Devuelve un string traducido, si se encuentra uno en la tabla
de traducción, o bien el mensaje message,
si no se encuentra.

### Ejemplos

    **Ejemplo #1 Ejemplo con gettext()**

&lt;?php
// Selección del alemán
putenv('LC_ALL=de_DE');
setlocale(LC_ALL, 'de_DE');

// Especifica la localización de las tablas de traducción
bindtextdomain("myPHPApp", "./locale");

// Elige el dominio
textdomain("myPHPApp");

// La traducción se busca en ./locale/de_DE/LC_MESSAGES/myPHPApp.mo

// Mostrar un mensaje de prueba
echo gettext("Bienvenue dans mon application PHP");

// O utiliza el alias _() para reemplazar gettext()
echo _("Passez une bonne journée");
?&gt;

### Notas

**Nota**:

    Puede utilizarse el carácter guión bajo (_) como alias de esta función.

**Nota**:

    Definir un idioma no es suficiente para algunos
    sistemas operativos y puede ser necesario utilizar la función
    [putenv()](#function.putenv) para definir la configuración local actual.

### Ver también

    - [_()](#function.-) - Alias de gettext

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

# ngettext

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ngettext — Versión plural de gettext

### Descripción

**ngettext**([string](#language.types.string) $singular, [string](#language.types.string) $plural, [int](#language.types.integer) $count): [string](#language.types.string)

Versión plural de [gettext()](#function.gettext). Algunas lenguas tienen más de una forma
de mensajes plurales dependiendo del contador.

### Parámetros

     singular


       El ID singular del mensaje.






     plural


       El ID plural del mensaje.






     count


       El número (es decir, número de elementos) para determinar la traducción del
       número gramatical respectivo.





### Valores devueltos

Devuelve un mensaje plural identificado por
msgid1 y msgid2
para el contador n.

### Ejemplos

    **Ejemplo #1 Ejemplo con ngettext()**

&lt;?php

setlocale(LC_ALL, 'cs_CZ');
printf(ngettext("%d window", "%d windows", 1), 1); // 1 okno
printf(ngettext("%d window", "%d windows", 2), 2); // 2 okna
printf(ngettext("%d window", "%d windows", 5), 5); // 5 oken

?&gt;

# textdomain

(PHP 4, PHP 5, PHP 7, PHP 8)

textdomain — Define el dominio por defecto

### Descripción

**textdomain**([?](#language.types.null)[string](#language.types.string) $domain = **[null](#constant.null)**): [string](#language.types.string)

Esta función define el dominio de búsqueda a utilizar durante las llamadas
a [gettext()](#function.gettext). Este
dominio depende generalmente de la aplicación.

### Parámetros

     domain


       El nuevo dominio de mensajes, o **[null](#constant.null)** para recuperar
       la configuración actual sin modificaciones.





### Valores devueltos

Esta función devuelve el mensaje actual del dominio en caso de éxito,
después de una posible modificación.

### Errores/Excepciones

    Genera una [ValueError](#class.valueerror) si domain
    es un [string](#language.types.string) vacío.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Genera ahora una [ValueError](#class.valueerror) si domain
       es un [string](#language.types.string) vacío.




      8.4.0

       domain ahora es opcional.
       Anteriormente, este argumento debía especificarse siempre.



### Notas

**Nota**:

    La información de **textdomain()** se mantiene por proceso,
    y no por hilo.

## Tabla de contenidos

- [\_](#function.-) — Alias de gettext
- [bind_textdomain_codeset](#function.bind-textdomain-codeset) — Especifica o recupera el juego de caracteres utilizado para los mensajes del dominio DOMAIN
- [bindtextdomain](#function.bindtextdomain) — Especifica o recupera la ruta de un dominio
- [dcgettext](#function.dcgettext) — Reemplaza el dominio durante una búsqueda
- [dcngettext](#function.dcngettext) — Versión plural de dcgettext
- [dgettext](#function.dgettext) — Reemplaza el dominio actual
- [dngettext](#function.dngettext) — Versión plural de dgettext
- [gettext](#function.gettext) — Busca un mensaje en el dominio actual
- [ngettext](#function.ngettext) — Versión plural de gettext
- [textdomain](#function.textdomain) — Define el dominio por defecto

- [Introducción](#intro.gettext)
- [Instalación/Configuración](#gettext.setup)<li>[Requerimientos](#gettext.requirements)
- [Instalación](#gettext.installation)
  </li>- [Funciones de Gettext](#ref.gettext)<li>[_](#function.-) — Alias de gettext
- [bind_textdomain_codeset](#function.bind-textdomain-codeset) — Especifica o recupera el juego de caracteres utilizado para los mensajes del dominio DOMAIN
- [bindtextdomain](#function.bindtextdomain) — Especifica o recupera la ruta de un dominio
- [dcgettext](#function.dcgettext) — Reemplaza el dominio durante una búsqueda
- [dcngettext](#function.dcngettext) — Versión plural de dcgettext
- [dgettext](#function.dgettext) — Reemplaza el dominio actual
- [dngettext](#function.dngettext) — Versión plural de dgettext
- [gettext](#function.gettext) — Busca un mensaje en el dominio actual
- [ngettext](#function.ngettext) — Versión plural de gettext
- [textdomain](#function.textdomain) — Define el dominio por defecto
  </li>
