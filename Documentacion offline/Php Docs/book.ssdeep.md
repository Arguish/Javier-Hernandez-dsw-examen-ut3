# Hash difuso ssdeep

# Introducción

ssdeep es una utilidad para crear y comparar hashes difusos
llamados también
[» contexto desencadenado por fragmentos
de hash](http://dfrws.org/2006/proceedings/12-Kornblum.pdf).

El hashing difuso puede hacer coincidir firmas que tienen "...secuencias de bytes idénticas, en el mismo orden, a pesar de que los bytes entre las secuencias pueden ser diferentes tanto en contenido como en longitud" ([» 
página del proyecto ssdeep](http://ssdeep.sourceforge.net)).

Esta extensión proporciona las funciones para crear y comparar hashes difusos

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ssdeep.requirements)
- [Instalación](#ssdeep.installation)

    ## Requerimientos

    Esta extensión requiere la biblioteca
    [» ssdeep](http://ssdeep.sourceforge.net).

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/ssdeep](https://pecl.php.net/package/ssdeep).

# Funciones ssdeep

# ssdeep_fuzzy_compare

(PECL ssdeep &gt;= 1.0.0)

ssdeep_fuzzy_compare — Calcula el puntaje de coincidencia entre 2 firmas de hash difuso

### Descripción

**ssdeep_fuzzy_compare**([string](#language.types.string) $signature1, [string](#language.types.string) $signature2): [int](#language.types.integer)

Calcula el puntaje de coincidencia entre la
signature1 y la
signature2 utilizando el [» 
contexto desencadenado por fragmentos de hashing](http://dfrws.org/2006/proceedings/12-Kornblum.pdf), y devuelve
el puntaje de coincidencia.

### Parámetros

    signature1


      La cadena que representa la primera firma de hash difuso.






    signature2


      La cadena que representa la segunda firma de hash difuso.


### Valores devueltos

Devuelve un entero entre 0 y 100 en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

# ssdeep_fuzzy_hash

(PECL ssdeep &gt;= 1.0.0)

ssdeep_fuzzy_hash — Crea un hash difuso desde un [string](#language.types.string)

### Descripción

**ssdeep_fuzzy_hash**([string](#language.types.string) $to_hash): [string](#language.types.string)

**ssdeep_fuzzy_hash()** calcula el hash de
to_hash utilizando el
[»  contexto desencadenado por
fragmentos de hashing](http://dfrws.org/2006/proceedings/12-Kornblum.pdf), y devuelve el hash correspondiente.

### Parámetros

    to_hash


      El [string](#language.types.string) de entrada


### Valores devueltos

Devuelve un [string](#language.types.string) si tiene éxito, **[false](#constant.false)** en caso contrario.

# ssdeep_fuzzy_hash_filename

(PECL ssdeep &gt;= 1.0.0)

ssdeep_fuzzy_hash_filename — Crea un hash difuso de un fichero

### Descripción

**ssdeep_fuzzy_hash_filename**([string](#language.types.string) $file_name): [string](#language.types.string)

**ssdeep_fuzzy_hash_filename()** calcula el hash
del fichero especificado por file_name
utilizando el [» contexto
desencadenado por trozos de hashing](http://dfrws.org/2006/proceedings/12-Kornblum.pdf), y devuelve el
hash correspondiente.

### Parámetros

    file_name


      El nombre del fichero a calcular el hash.


### Valores devueltos

Devuelve un [string](#language.types.string) si tiene éxito, o **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [ssdeep_fuzzy_compare](#function.ssdeep-fuzzy-compare) — Calcula el puntaje de coincidencia entre 2 firmas de hash difuso
- [ssdeep_fuzzy_hash](#function.ssdeep-fuzzy-hash) — Crea un hash difuso desde un string
- [ssdeep_fuzzy_hash_filename](#function.ssdeep-fuzzy-hash-filename) — Crea un hash difuso de un fichero

- [Introducción](#intro.ssdeep)
- [Instalación/Configuración](#ssdeep.setup)<li>[Requerimientos](#ssdeep.requirements)
- [Instalación](#ssdeep.installation)
  </li>- [Funciones ssdeep](#ref.ssdeep)<li>[ssdeep_fuzzy_compare](#function.ssdeep-fuzzy-compare) — Calcula el puntaje de coincidencia entre 2 firmas de hash difuso
- [ssdeep_fuzzy_hash](#function.ssdeep-fuzzy-hash) — Crea un hash difuso desde un string
- [ssdeep_fuzzy_hash_filename](#function.ssdeep-fuzzy-hash-filename) — Crea un hash difuso de un fichero
  </li>
