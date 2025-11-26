# LZF

# Introducción

LZF es un algoritmo de compresión muy rápido, ideal para ahorrar espacio con
solamente un ligero costo de velocidad. Puede optimizarse para velocidad o espacio a
la hora de compilar. Esta extensión utiliza la librería [» liblzf](http://oldhome.schmorp.de/marc/liblzf.html)
por Marc Lehmann para sus operaciones.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#lzf.installation)

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.
Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/lzf](https://pecl.php.net/package/lzf).

Para utilizar estas funciones, PHP debe ser compilado con soporte para
LZF mediante la opción de configuración
**--with-lzf[=DIR]**.
Asimismo, puede especificarse la opción
**--enable-lzf-better-compression**
para optimizar LZF en términos de espacio, aunque esto puede afectar negativamente a la velocidad.

Los usuarios de Windows deben activar la biblioteca
php_lzf.dll en el php.ini
para poder utilizar estas funciones.

# Funciones LZF

# lzf_compress

(PECL lzf &gt;= 0.1.0)

lzf_compress —
Compresión LZF

### Descripción

**lzf_compress**([string](#language.types.string) $data): [string](#language.types.string)

**lzf_compress()** comprime el string
data dado utilizando codificación LZF.

### Parámetros

     data


       El string a comprimir.





### Valores devueltos

Devuelve los datos comprimidos o **[false](#constant.false)** si ocurrió un error.

### Ver también

    - [lzf_decompress()](#function.lzf-decompress) - Descompresión LZF

# lzf_decompress

(PECL lzf &gt;= 0.1.0)

lzf_decompress —
Descompresión LZF

### Descripción

**lzf_decompress**([string](#language.types.string) $data): [string](#language.types.string)

[lzf_compress()](#function.lzf-compress) descomprime la cadena
data dada que contiene los datos codificados en lzf.

### Parámetros

     data


       La cadena comprimida.





### Valores devueltos

Devuelve los datos descomprimidos o **[false](#constant.false)** si ocurrió un error.

### Ver también

    - [lzf_compress()](#function.lzf-compress) - Compresión LZF

# lzf_optimized_for

(PECL lzf &gt;= 1.0.0)

lzf_optimized_for —
Determina para qué fue optimizada la extensión LZF

### Descripción

**lzf_optimized_for**(): [int](#language.types.integer)

Determina para qué fue optimizada la extensión LZF durante la compilación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve 1 si LZF fue optimizada para velocidad, 0 para compresión.

## Tabla de contenidos

- [lzf_compress](#function.lzf-compress) — Compresión LZF
- [lzf_decompress](#function.lzf-decompress) — Descompresión LZF
- [lzf_optimized_for](#function.lzf-optimized-for) — Determina para qué fue optimizada la extensión LZF

- [Introducción](#intro.lzf)
- [Instalación/Configuración](#lzf.setup)<li>[Instalación](#lzf.installation)
  </li>- [Funciones LZF](#ref.lzf)<li>[lzf_compress](#function.lzf-compress) — Compresión LZF
- [lzf_decompress](#function.lzf-decompress) — Descompresión LZF
- [lzf_optimized_for](#function.lzf-optimized-for) — Determina para qué fue optimizada la extensión LZF
  </li>
