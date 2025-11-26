# Yaconf

# Introducción

Otro contenedor de configuraciones
(Yaconf) es un contenedor de configuraciones,
analiza los archivos INI, y almacena el resultado
en PHP cuando se inicia PHP, el resultado vive con el
todo el ciclo de vida de PHP.

Yaconf almacena todas las configuraciones como
string interno o array inmutable, eso significa que no se pueden
devolver, por lo que al recuperar las configuraciones
de Yaconf, podría considerarse como una copia cero, muy rápido.

Yaconf soporta secciones y hrencia de secciones
en los archivos del INI. si PHP se construye como una construcción no-ZTS,
Yaconf también soporta la recarga automática después de que se cambien
los archivos del INI.

Yaconf requiere PHP 7.0 o superior.

**Ejemplo #1 Ejemplo INI**

;Simple clave valor
key=valor

;Hash
hash.a=valor

;Array
arr.0=valor
;o
arr[]=valor

;Constante PHP
version=PHP_VERSION

;Variable de entorno
env=${PATH}

**Ejemplo #2 Ejemplo de secciones INI**

[SectionA]
key=valor
hash.a=valor

;SectionB hereda de SectionA
[SectionB:SectionA]
key=nuevo_valor ;Sobrescribe la clave de configuración en la SecciónA

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#yaconf.requirements)
- [Instalación](#yaconf.installation)
- [Configuración en tiempo de ejecución](#yaconf.configuration)
- [Tipos de recursos](#yaconf.resources)

    ## Requerimientos

    Yaconf requiere PHP 7.0 y superior.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/yaconf](https://pecl.php.net/package/yaconf).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Yaconf Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [yaconf.check_delay](#ini.yaconf.check-delay)
      300
      **[INI_SYSTEM](#constant.ini-system)**




      [yaconf.directory](#ini.yaconf.directory)
      /tmp/conf/
      **[INI_SYSTEM](#constant.ini-system)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      yaconf.check_delay
      [int](#language.types.integer)



        En que intervalo Yaconf detectará el cambio del archivo ini (por el directorio mtime),
        si se pone a cero, hay que reiniciar el php para recargar las configuraciones.







      yaconf.directory
      [string](#language.types.string)



        Ruta al directorio en el que se encuentran todos los archivos de configuración INI.





## Tipos de recursos

# La clase Yaconf

(PECL yaconf &gt;= 1.0.0)

## Introducción

    Yaconf es un contenedor de configuraciones,
    analiza los archivos del INI, almacena el resultado en
    cuando PHP se inicia, el resultado vive
    con todo el ciclo de vida de PHP.

## Sinopsis de la Clase

    ****




      class **Yaconf**

     {


    /* Métodos */

public static [get](#yaconf.get)([string](#language.types.string) $name, [mixed](#language.types.mixed) $default_value = NULL): [mixed](#language.types.mixed)
public static [has](#yaconf.has)([string](#language.types.string) $name): [bool](#language.types.boolean)

}

# Yaconf::get

(PECL yaconf &gt;= 1.0.0)

Yaconf::get — Recuperar un elemento

### Descripción

public static **Yaconf::get**([string](#language.types.string) $name, [mixed](#language.types.mixed) $default_value = NULL): [mixed](#language.types.mixed)

### Parámetros

    name


      Clave de configuración, la clave se ve como "filename.key", o "filename.sectionName,key".






    default_value


      si la clave no existe, Yaconf::get devolverá esto como resultado.


### Valores devueltos

Devuelve el resultado de configuración (string o array) si la clave existe,
devuelve default_value si no.

### Ejemplos

**Ejemplo #1 Ejemplo de INI()**

;filenmame foo.ini, colocado en el directorio que es yaconf.directoy
[SectionA]
;key value pair
key=val
;hash[a]=val
hash.a=val
;arr[0]=val
arr.0=val
;or
arr[]=val

;SectionB hereda SectionA
[SectionB:SectionA]
;reemplazar la clave de configuración en SectionA
key=new_val

Resultado del ejemplo anterior es similar a:

php7 -r 'var_dump(Yaconf::get("foo.SectionA.key"));'
//string(3) "val"

php7 -r 'var_dump(Yaconf::get("foo.SectionB.key"));'
//string(7) "new_val"

php7 -r 'var_dump(Yaconf::get("foo")["SectionA"]["hash"]);'
//array(1)

# Yaconf::has

(PECL yaconf &gt;= 1.0.0)

Yaconf::has — Determinar si un elemento existe

### Descripción

public static **Yaconf::has**([string](#language.types.string) $name): [bool](#language.types.boolean)

### Parámetros

    name





### Valores devueltos

## Tabla de contenidos

- [Yaconf::get](#yaconf.get) — Recuperar un elemento
- [Yaconf::has](#yaconf.has) — Determinar si un elemento existe

- [Introducción](#intro.yaconf)
- [Instalación/Configuración](#yaconf.setup)<li>[Requerimientos](#yaconf.requirements)
- [Instalación](#yaconf.installation)
- [Configuración en tiempo de ejecución](#yaconf.configuration)
- [Tipos de recursos](#yaconf.resources)
  </li>- [Yaconf](#class.yaconf) — La clase Yaconf<li>[Yaconf::get](#yaconf.get) — Recuperar un elemento
- [Yaconf::has](#yaconf.has) — Determinar si un elemento existe
  </li>
