# Pspell

# Introducción

**Advertencia**

    Esta extensión está *DEPRECADA* y *SEPARADA* a partir de PHP 8.4.0.

La biblioteca pspell permite verificar la ortografía
de una palabra, y sugerir correcciones.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#pspell.requirements)
- [Instalación](#pspell.installation)
- [Tipos de recursos](#pspell.resources)

    ## Requerimientos

    Para compilar PHP con el soporte pspell, será necesario contar con la
    biblioteca aspell, disponible en [» http://aspell.net/](http://aspell.net/).

## Instalación

## PHP 8.4

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 8.4.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/pspell](https://pecl.php.net/package/pspell).

## PHP &lt; 8.4

Para activar esta extensión, compílese PHP con la opción
**--with-pspell[=dir]**.

**Nota**:
**Nota para los usuarios Win32**

    Para hacer funcionar esta extensión, algunas bibliotecas

DLL deben estar disponibles a través del
PATH del sistema Windows. Lea la
F.A.Q titulada
"[Cómo agregar mi carpeta
PHP a mi PATH de Windows](#faq.installation.addtopath)" para más información. Copiar las bibliotecas DLL desde la
carpeta PHP a la carpeta del sistema de Windows también funciona (ya que la carpeta del sistema está por defecto en el
PATH del sistema), pero este método no es recomendado.
_Esta extensión requiere que los siguientes archivos estén en el
PATH:_
aspell-15.dll desde la
carpeta bin de la instalación de aspell.

    El soporte Win32 requiere al menos la versión 0.50 de aspell.

## Tipos de recursos

Antes de PHP 8.1.0, existían dos tipos de [resource](#language.types.resource) en esta extensión.
El primero era el identificador de enlace al diccionario,
el segundo es un recurso que contiene la configuración pspell.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[PSPELL_FAST](#constant.pspell-fast)**
    ([int](#language.types.integer))









    **[PSPELL_NORMAL](#constant.pspell-normal)**
    ([int](#language.types.integer))









    **[PSPELL_BAD_SPELLERS](#constant.pspell-bad-spellers)**
    ([int](#language.types.integer))









    **[PSPELL_RUN_TOGETHER](#constant.pspell-run-together)**
    ([int](#language.types.integer))

# Funciones de Pspell

# pspell_add_to_personal

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_add_to_personal — Añade la palabra al diccionario personal

### Descripción

**pspell_add_to_personal**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary, [string](#language.types.string) $word): [bool](#language.types.boolean)

**pspell_add_to_personal()** añade una palabra al diccionario
personal. Si se utiliza [pspell_new_config()](#function.pspell-new-config) con
[pspell_config_personal()](#function.pspell-config-personal) para abrir el diccionario,
el diccionario personal podrá ser guardado posteriormente con
[pspell_save_wordlist()](#function.pspell-save-wordlist).

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).





     word


       La palabra añadida.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 pspell_add_to_personal()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
$pspell = pspell_new_config($pspell_config);

pspell_add_to_personal($pspell, "Vlad");
pspell_save_wordlist($pspell);
?&gt;

### Notas

**Nota**:

    Esta función solo funcionará si se dispone de pspell .11.2 y aspell .32.5
    o versiones posteriores.

# pspell_add_to_session

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_add_to_session — Añade la palabra al diccionario personal de la sesión actual

### Descripción

**pspell_add_to_session**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary, [string](#language.types.string) $word): [bool](#language.types.boolean)

**pspell_add_to_session()** añade una palabra al diccionario
personal asociado a la versión actual. Es una función
similar a [pspell_add_to_personal()](#function.pspell-add-to-personal).

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).





     word


       La palabra añadida.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pspell_check

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_check — Verifica un término

### Descripción

**pspell_check**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary, [string](#language.types.string) $word): [bool](#language.types.boolean)

**pspell_check()** verifica la ortografía de un término.

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).





     word


       El término a verificar.





### Valores devueltos

Devuelve **[true](#constant.true)** si la ortografía es correcta, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pspell_check()**

&lt;?php
$pspell = pspell_new ("fr");

if (pspell_check($pspell, "testt")) {
echo 'La ortografía es correcta';
} else {
echo 'Disculpe, ortografía incorrecta';
}
?&gt;

# pspell_clear_session

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_clear_session — Restablece la sesión actual

### Descripción

**pspell_clear_session**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary): [bool](#language.types.boolean)

**pspell_clear_session()** restablece la
sesión actual. El diccionario personal se vacía y, por ejemplo,
si se intenta guardarlo con [pspell_save_wordlist()](#function.pspell-save-wordlist),
no ocurrirá nada.

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con [pspell_add_to_personal()](#function.pspell-add-to-personal)**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
$pspell = pspell_new_config($pspell_config);

pspell_add_to_personal($pspell, "Vlad");
pspell_clear_session($pspell);
pspell_save_wordlist($pspell); //"Vlad" no será guardado
?&gt;

# pspell_config_create

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_create — Crea una configuración utilizada para abrir un diccionario

### Descripción

**pspell_config_create**(
    [string](#language.types.string) $language,
    [string](#language.types.string) $spelling = "",
    [string](#language.types.string) $jargon = "",
    [string](#language.types.string) $encoding = ""
): [PSpell\Config](#class.pspell-config)

Crea una configuración utilizada para abrir un diccionario.

**pspell_config_create()** tiene una sintaxis similar a
la de [pspell_new()](#function.pspell-new). De hecho, utilizar
**pspell_config_create()** seguido inmediatamente
por [pspell_new_config()](#function.pspell-new-config) producirá exactamente el
mismo resultado. Sin embargo, después de crear
una nueva configuración, también pueden utilizarse las funciones
**pspell*config*\*()** antes de llamar
a [pspell_new_config()](#function.pspell-new-config)
para aprovechar las funcionalidades avanzadas.

Para obtener más información y ejemplos, consúltese el manual en línea en el sitio
de pspell : [» http://aspell.net/](http://aspell.net/).

### Parámetros

     language


       El argumento de lenguaje language es el código
       de idioma en dos letras,
       definido en la norma ISO 639, y dos letras opcionales
       ISO 3166, después de un guión o un subrayado (_).






     spelling


       El argumento de ortografía spelling es
       necesario para los idiomas que tienen más de una ortografía,
       como el inglés. Los valores reconocidos son entonces 'american'
       (americano), 'british' (inglés), y 'canadian' (canadiense).






     jargon


       El argumento de jergas jargon contiene
       información adicional para distinguir dos diccionarios
       distintos para el mismo idioma y el mismo argumento
       de ortografía spelling.






     encoding


       El argumento de codificación encoding indica
       la codificación esperada para la respuesta.
       Los valores válidos son : 'utf-8', 'iso8859-*', 'koi8-r',
       'viscii', 'cp1252', 'machine unsigned 16', 'machine unsigned 32'.
       Este argumento no ha sido probado de
       manera exhaustiva, por lo que se recomienda precaución.





### Valores devueltos

Devuelve una instancia de [PSpell\Config](#class.pspell-config).

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [PSpell\Config](#class.pspell-config) ;
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 pspell_config_create()**

&lt;?php
$pspell_config = pspell_config_create("fr");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
pspell_config_repl($pspell_config, "/var/dictionaries/custom.repl");
$pspell = pspell_new_personal($pspell_config, "fr");
?&gt;

# pspell_config_data_dir

(PHP 5, PHP 7, PHP 8)

pspell_config_data_dir — Directorio que contiene los archivos de datos lingüísticos

### Descripción

**pspell_config_data_dir**([PSpell\Config](#class.pspell-config) $config, [string](#language.types.string) $directory): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pspell_config_dict_dir

(PHP 5, PHP 7, PHP 8)

pspell_config_dict_dir — Ubicación del archivo global de palabras

### Descripción

**pspell_config_dict_dir**([PSpell\Config](#class.pspell-config) $config, [string](#language.types.string) $directory): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pspell_config_ignore

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_ignore — Ignora las palabras de menos de N caracteres

### Descripción

**pspell_config_ignore**([PSpell\Config](#class.pspell-config) $config, [int](#language.types.integer) $min_length): [bool](#language.types.boolean)

     **pspell_config_ignore()** debe ser utilizada con una
     configuración antes de llamar a [pspell_new_config()](#function.pspell-new-config).
     Esta función permite al verificador ignorar las palabras cortas.

### Parámetros

     config

      Una instancia de [PSpell\Config](#class.pspell-config).





     min_length


       Las palabras de menos de min_length caracteres serán ignoradas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 pspell_config_ignore()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_ignore($pspell_config, 5);
$pspell = pspell_new_config($pspell_config);
pspell_check($pspell, "abcd"); // Esta palabra no provocará un error
?&gt;

# pspell_config_mode

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_mode — Cambia el modo de sugerencia

### Descripción

**pspell_config_mode**([PSpell\Config](#class.pspell-config) $config, [int](#language.types.integer) $mode): [bool](#language.types.boolean)

**pspell_config_mode()** debe ser llamada en una configuración
antes de [pspell_new_config()](#function.pspell-new-config). Esta función determina
el número de sugerencias que serán devueltas por
[pspell_suggest()](#function.pspell-suggest).

### Parámetros

     config

      Una instancia de [PSpell\Config](#class.pspell-config).





     mode


       El argumento de modo es el modo de trabajo del verificador
       ortográfico. Varios modos están disponibles:



        -

          **[PSPELL_FAST](#constant.pspell-fast)** - Modo rápido (menos sugerencias)



        -

          **[PSPELL_NORMAL](#constant.pspell-normal)** - Modo normal (más sugerencias)



        -

          **[PSPELL_BAD_SPELLERS](#constant.pspell-bad-spellers)** - Modo lento (muchas más sugerencias)







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pspell_config_mode()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_mode($pspell_config, PSPELL_FAST);
$pspell = pspell_new_config($pspell_config);
pspell_check($pspell, "thecat");
?&gt;

# pspell_config_personal

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_personal — Selecciona el fichero que contiene el diccionario personal

### Descripción

**pspell_config_personal**([PSpell\Config](#class.pspell-config) $config, [string](#language.types.string) $filename): [bool](#language.types.boolean)

Selecciona el fichero que contiene el diccionario personal. El diccionario personal será
cargado y utilizado además del diccionario estándar, una vez que se haya llamado
a [pspell_new_config()](#function.pspell-new-config). El fichero es también donde
[pspell_save_wordlist()](#function.pspell-save-wordlist) guardará el diccionario personal.

**pspell_config_personal()** debe ser llamada
en una configuración antes de llamar a [pspell_new_config()](#function.pspell-new-config).

### Parámetros

     config

      Una instancia de [PSpell\Config](#class.pspell-config).





     filename


       El diccionario personal. Si el fichero no existe, será creado.
       El fichero debe ser accesible en escritura para el usuario que invoca PHP (ej. nobody).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 pspell_config_personal()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
$pspell = pspell_new_config($pspell_config);
pspell_check($pspell, "thecat");
?&gt;

### Notas

**Nota**:

    Esta función solo funcionará con pspell .11.2 y aspell .32.5
    o versiones posteriores.

# pspell_config_repl

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_repl — Selecciona el archivo que contiene los pares de reemplazo

### Descripción

**pspell_config_repl**([PSpell\Config](#class.pspell-config) $config, [string](#language.types.string) $filename): [bool](#language.types.boolean)

Selecciona el archivo que contiene los pares de reemplazo.

Los pares de reemplazo mejoran la calidad del verificador. Cuando una palabra
está mal escrita y no se encuentra ninguna sugerencia válida en el diccionario,
[pspell_store_replacement()](#function.pspell-store-replacement) se utilizará para registrar un
par de reemplazo y [pspell_save_wordlist()](#function.pspell-save-wordlist) para
guardar el diccionario con los pares de reemplazo.

**pspell_config_repl()** debe ser utilizado con una configuración
antes de llamar a [pspell_new_config()](#function.pspell-new-config).

### Parámetros

     config

      Una instancia de [PSpell\Config](#class.pspell-config).





     filename


       El archivo debe ser accesible en escritura para el usuario que invoca PHP (ej. nobody).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 pspell_config_repl()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
pspell_config_repl($pspell_config, "/var/dictionaries/custom.repl");
$pspell = pspell_new_config($pspell_config);
pspell_check($pspell, "thecat");
?&gt;

### Notas

**Nota**:

    Esta función solo funcionará con pspell .11.2 y aspell .32.5
    o versiones posteriores.

# pspell_config_runtogether

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_runtogether — Considera dos palabras unidas como un compuesto

### Descripción

**pspell_config_runtogether**([PSpell\Config](#class.pspell-config) $config, [bool](#language.types.boolean) $allow): [bool](#language.types.boolean)

Esta función indica si dos palabras unidas deben ser tratadas como
un compuesto válido. Así "lechat" será tratado como un compuesto válido aunque
debería haber un espacio entre estas dos palabras. Modificar esta configuración solo afecta
a los resultados devueltos por [pspell_check()](#function.pspell-check);
[pspell_suggest()](#function.pspell-suggest) siempre devolverá sugerencias.

**pspell_config_runtogether()** debe ser llamada en una configuración
antes de [pspell_new_config()](#function.pspell-new-config).

### Parámetros

     config

      Una instancia de [PSpell\Config](#class.pspell-config).





     allow


       **[true](#constant.true)** si dos palabras unidas deben ser tratadas como un compuesto válido,
       **[false](#constant.false)** en caso contrario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 pspell_config_runtogether()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_runtogether($pspell_config, true);
$pspell = pspell_new_config($pspell_config);
pspell_check($pspell, "thecat");
?&gt;

# pspell_config_save_repl

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_config_save_repl — Determina si se deben guardar los pares de reemplazo
con el diccionario

### Descripción

**pspell_config_save_repl**([PSpell\Config](#class.pspell-config) $config, [bool](#language.types.boolean) $save): [bool](#language.types.boolean)

**pspell_config_save_repl()** determina si
[pspell_save_wordlist()](#function.pspell-save-wordlist) debe guardar los pares de reemplazo
con el diccionario. Generalmente, no es necesario utilizar esta función ya que,
si [pspell_config_repl()](#function.pspell-config-repl) se utiliza, los
pares de reemplazo serán guardados de todas formas por
[pspell_save_wordlist()](#function.pspell-save-wordlist), y, si no es así,
no lo serán.

**pspell_config_save_repl()** debe ser llamada
en una configuración antes de llamar a [pspell_new_config()](#function.pspell-new-config).

### Parámetros

     config

      Una instancia de [PSpell\Config](#class.pspell-config).





     save


       **[true](#constant.true)** si los pares de reemplazo deben ser guardados, **[false](#constant.false)** en caso contrario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Notas

**Nota**:

    Esta función solo funcionará con pspell .11.2 y aspell .32.5
    o versiones posteriores.

# pspell_new

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_new — Carga un nuevo diccionario

### Descripción

**pspell_new**(
    [string](#language.types.string) $language,
    [string](#language.types.string) $spelling = "",
    [string](#language.types.string) $jargon = "",
    [string](#language.types.string) $encoding = "",
    [int](#language.types.integer) $mode = 0
): [PSpell\Dictionary](#class.pspell-dictionary)|[false](#language.types.singleton)

**pspell_new()** abre un nuevo diccionario y
devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary), para ser utilizada con otras
funciones pspell.

Para más información y ejemplos, consúltese el sitio
[» http://aspell.net/](http://aspell.net/).

### Parámetros

     language


       El argumento de idioma spelling se compone de
       las dos letras del código de idioma ISO 639, y del código opcional de país ISO
       3166, separados por un '_'.






     spelling


       Este argumento es necesario para los idiomas
       que tienen más de una ortografía, como el inglés o el francés.
       Los valores reconocidos son
       'american', 'british', y 'canadian'.






     jargon


       El argumento jargon contiene
       información adicional para distinguir dos listas de
       palabras que tienen el mismo marcado de idioma y ortografía.






     encoding


       El argumento encoding es el tipo de codificación de las palabras.
       Los valores válidos son 'utf-8', 'iso8859-*', 'koi8-r', 'viscii',
       'cp1252', 'machine unsigned 16', 'machine unsigned 32'. Este argumento no ha sido probado de
       forma exhaustiva, por lo que se recomienda precaución al
       utilizarlo.






     mode


       El argumento mode es el modo de funcionamiento del
       corrector ortográfico. Varios modos están disponibles :



        -

          **[PSPELL_FAST](#constant.pspell-fast)** - Modo rápido (menos
          sugerencias)



        -

          **[PSPELL_NORMAL](#constant.pspell-normal)** - Modo normal (más sugerencias)



        -

          **[PSPELL_BAD_SPELLERS](#constant.pspell-bad-spellers)** - Modo lento (muchas más sugerencias)



        -

          **[PSPELL_RUN_TOGETHER](#constant.pspell-run-together)** - Considera que
          palabras unidas forman un compuesto válido.
          Así, "lechat" será un compuesto válido.
          Esta opción modifica únicamente los resultados devueltos por
          [pspell_check()](#function.pspell-check); [pspell_suggest()](#function.pspell-suggest)
          siempre devolverá sugerencias.




       mode es una máscara construida a partir de las constantes
       listadas anteriormente. Sin embargo, **[PSPELL_FAST](#constant.pspell-fast)**,
       **[PSPELL_NORMAL](#constant.pspell-normal)** y
       **[PSPELL_BAD_SPELLERS](#constant.pspell-bad-spellers)** son mutuamente excluyentes :
       no se deben utilizar a la vez.



### Valores devueltos

Devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary) ;
       anteriormente se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 pspell_new()**

&lt;?php
$pspell = pspell_new("en", "", "", "",
(PSPELL_FAST|PSPELL_RUN_TOGETHER));
?&gt;

# pspell_new_config

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_new_config — Carga un nuevo diccionario con los parámetros especificados en una configuración

### Descripción

**pspell_new_config**([PSpell\Config](#class.pspell-config) $config): [PSpell\Dictionary](#class.pspell-dictionary)|[false](#language.types.singleton)

**pspell_new_config()** abre un nuevo diccionario con
los ajustes de la configuración config, creada con
[pspell_config_create()](#function.pspell-config-create) y modificada con las funciones
**pspell*config*\*()**. Este método proporciona
la máxima flexibilidad, y dispone de todas las funcionalidades ofrecidas por
[pspell_new()](#function.pspell-new) y
[pspell_new_personal()](#function.pspell-new-personal).

### Parámetros

     config


       La config es la que es devuelta por
       [pspell_config_create()](#function.pspell-config-create) cuando la configuración es
       creada.





### Valores devueltos

Devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary) en caso de éxito, o **[false](#constant.false)** si ocurre un error

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro config ahora espera una instancia de
[PSpell\Config](#class.pspell-config) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.1.0

       Ahora devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary);
       anteriormente se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 pspell_new_config()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
pspell_config_repl($pspell_config, "/var/dictionaries/custom.repl");
$pspell = pspell_new_config($pspell_config);
?&gt;

# pspell_new_personal

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_new_personal — Carga un nuevo diccionario con un diccionario personal

### Descripción

**pspell_new_personal**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $language,
    [string](#language.types.string) $spelling = "",
    [string](#language.types.string) $jargon = "",
    [string](#language.types.string) $encoding = "",
    [int](#language.types.integer) $mode = 0
): [PSpell\Dictionary](#class.pspell-dictionary)|[false](#language.types.singleton)

**pspell_new_personal()** carga un nuevo diccionario con
un diccionario personal. Este último puede ser modificado y guardado con
[pspell_save_wordlist()](#function.pspell-save-wordlist). Sin embargo, las parejas de
reemplazo no serán guardadas. Para ello, debe
crearse una configuración que utilice [pspell_config_create()](#function.pspell-config-create),
seleccionarse el archivo de destino del diccionario personal con
[pspell_config_personal()](#function.pspell-config-personal), seleccionarse el archivo de parejas
de reemplazo con
[pspell_config_repl()](#function.pspell-config-repl) y abrirse un nuevo diccionario con
[pspell_new_config()](#function.pspell-new-config).

Para obtener más información y ejemplos, consúltese el manual en línea en el sitio
web de pspell : [» http://aspell.net/](http://aspell.net/).

### Parámetros

     filename


       El archivo donde se añadirán las palabras del diccionario personal.
       Debe ser una ruta absoluta, que comience con '/' ya que, de lo contrario,
       será relativa a $HOME, que es "/root" en la mayoría de los sistemas, y
       probablemente no sea lo deseado.






     language


       El parámetro de idioma language es el
       código de idioma ISO 639 de dos letras, seguido de dos letras opcionales
       ISO 3166, después de un guión o un subrayado (_).






     spelling


     El parámetro de ortografía spelling es necesario para los idiomas
     que tienen más de una ortografía, como el inglés. Los valores reconocidos son entonces 'american'
     (americano), 'british' (británico), y 'canadian' (canadiense).






     jargon


       Información adicional para distinguir dos diccionarios distintos para
       el mismo idioma y el mismo parámetro de ortografía spelling.






     encoding


       La codificación esperada para la respuesta. Los valores válidos son :
       utf-8, iso8859-*,
       koi8-r, viscii,
       cp1252, machine unsigned 16,
       machine unsigned 32.






     mode


       El modo de funcionamiento del corrector ortográfico. Varios modos están disponibles :



        -

          **[PSPELL_FAST](#constant.pspell-fast)** - Modo rápido (menos
          sugerencias)



        -

          **[PSPELL_NORMAL](#constant.pspell-normal)** - Modo normal (más sugerencias)



        -

          **[PSPELL_BAD_SPELLERS](#constant.pspell-bad-spellers)** -  Modo lento (muchas más
          sugerencias)



        -

          **[PSPELL_RUN_TOGETHER](#constant.pspell-run-together)** - Considera las palabras
          unidas como legales. De este modo, "lechat" será una palabra compuesta legal,
          aunque debería haber un espacio entre las dos palabras. Cambiar esta configuración
          solo afecta al resultado devuelto por
          [pspell_check()](#function.pspell-check); [pspell_suggest()](#function.pspell-suggest)
          continuará devolviendo las sugerencias.




       El modo es una máscara construida desde las diferentes constantes listadas a continuación.
       Sin embargo, las constantes **[PSPELL_FAST](#constant.pspell-fast)**,
       **[PSPELL_NORMAL](#constant.pspell-normal)** y
       **[PSPELL_BAD_SPELLERS](#constant.pspell-bad-spellers)** son mutuamente excluyentes, por lo que
       solo debe seleccionarse una de ellas.



### Valores devueltos

Devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [PSpell\Dictionary](#class.pspell-dictionary);
       anteriormente se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 pspell_new_personal()**

&lt;?php
$pspell = pspell_new_personal ("/var/dictionaries/custom.pws",
"en", "", "", "", PSPELL_FAST|PSPELL_RUN_TOGETHER);
?&gt;

# pspell_save_wordlist

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_save_wordlist — Guarda el diccionario personal en un archivo

### Descripción

**pspell_save_wordlist**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary): [bool](#language.types.boolean)

**pspell_save_wordlist()** guarda el diccionario personal de
la sesión actual. La localización de los ficheros debe haber sido especificada con
[pspell_config_personal()](#function.pspell-config-personal) y (eventualmente)
[pspell_config_repl()](#function.pspell-config-repl).

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 [pspell_add_to_personal()](#function.pspell-add-to-personal)**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/tmp/dicts/newdict");
$pspell = pspell_new_config($pspell_config);

pspell_add_to_personal($pspell, "Vlad");
pspell_save_wordlist($pspell);
?&gt;

### Notas

**Nota**:

    Esta función solo funcionará con pspell .11.2 y aspell .32.5
    o versiones posteriores.

# pspell_store_replacement

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_store_replacement — Registra un par de sustitución para una palabra

### Descripción

**pspell_store_replacement**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary, [string](#language.types.string) $misspelled, [string](#language.types.string) $correct): [bool](#language.types.boolean)

**pspell_store_replacement()** registra un par de sustitución para
una palabra de forma que esta sugerencia sea devuelta por
[pspell_suggest()](#function.pspell-suggest) más tarde. Para poder utilizar esta función,
se debe utilizar
[pspell_new_personal()](#function.pspell-new-personal) para abrir el diccionario.
Para poder guardar permanentemente los pares de sustitución, se debe
utilizar [pspell_config_personal()](#function.pspell-config-personal) y
[pspell_config_repl()](#function.pspell-config-repl) para indicar el lugar de
guardado de los diccionarios personales, y [pspell_save_wordlist()](#function.pspell-save-wordlist)
para registrar los cambios en el disco.

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).





     misspelled


       La palabra mal escrita.






     correct


       La ortografía correcta de la palabra misspelled.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 pspell_store_replacement()**

&lt;?php
$pspell_config = pspell_config_create("en");
pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
pspell_config_repl($pspell_config, "/var/dictionaries/custom.repl");
$pspell = pspell_new_config($pspell_config);

pspell_store_replacement($pspell, $misspelled, $correct);
pspell_save_wordlist($pspell);
?&gt;

### Notas

**Nota**:

    Esta función solo funcionará con pspell .11.2 y aspell .32.5
    o versiones posteriores.

# pspell_suggest

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

pspell_suggest — Sugiere la ortografía de una palabra

### Descripción

**pspell_suggest**([PSpell\Dictionary](#class.pspell-dictionary) $dictionary, [string](#language.types.string) $word): [array](#language.types.array)|[false](#language.types.singleton)

**pspell_suggest()** devuelve un array de sugerencias
para la palabra word.

### Parámetros

     dictionary

      Una instancia de [PSpell\Dictionary](#class.pspell-dictionary).





     word


       La palabra probada.





### Valores devueltos

Devuelve un array de sugerencias para la palabra word.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro dictionary ahora espera una instancia de
[PSpell\Dictionary](#class.pspell-dictionary) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pspell_suggest()**

&lt;?php
$pspell = pspell_new("en");

if (!pspell_check($pspell, "testt")) {
    $suggestions = pspell_suggest($pspell, "testt");

    foreach ($suggestions as $suggestion) {
        echo "Ortografías sugeridas: $suggestion&lt;br /&gt;";
    }

}
?&gt;

## Tabla de contenidos

- [pspell_add_to_personal](#function.pspell-add-to-personal) — Añade la palabra al diccionario personal
- [pspell_add_to_session](#function.pspell-add-to-session) — Añade la palabra al diccionario personal de la sesión actual
- [pspell_check](#function.pspell-check) — Verifica un término
- [pspell_clear_session](#function.pspell-clear-session) — Restablece la sesión actual
- [pspell_config_create](#function.pspell-config-create) — Crea una configuración utilizada para abrir un diccionario
- [pspell_config_data_dir](#function.pspell-config-data-dir) — Directorio que contiene los archivos de datos lingüísticos
- [pspell_config_dict_dir](#function.pspell-config-dict-dir) — Ubicación del archivo global de palabras
- [pspell_config_ignore](#function.pspell-config-ignore) — Ignora las palabras de menos de N caracteres
- [pspell_config_mode](#function.pspell-config-mode) — Cambia el modo de sugerencia
- [pspell_config_personal](#function.pspell-config-personal) — Selecciona el fichero que contiene el diccionario personal
- [pspell_config_repl](#function.pspell-config-repl) — Selecciona el archivo que contiene los pares de reemplazo
- [pspell_config_runtogether](#function.pspell-config-runtogether) — Considera dos palabras unidas como un compuesto
- [pspell_config_save_repl](#function.pspell-config-save-repl) — Determina si se deben guardar los pares de reemplazo
  con el diccionario
- [pspell_new](#function.pspell-new) — Carga un nuevo diccionario
- [pspell_new_config](#function.pspell-new-config) — Carga un nuevo diccionario con los parámetros especificados en una configuración
- [pspell_new_personal](#function.pspell-new-personal) — Carga un nuevo diccionario con un diccionario personal
- [pspell_save_wordlist](#function.pspell-save-wordlist) — Guarda el diccionario personal en un archivo
- [pspell_store_replacement](#function.pspell-store-replacement) — Registra un par de sustitución para una palabra
- [pspell_suggest](#function.pspell-suggest) — Sugiere la ortografía de una palabra

# The PSpell\Dictionary class

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    pspell a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **PSpell\Dictionary**
     {

}

# The PSpell\Config class

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    pspell config a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **PSpell\Config**
     {

}

- [Introducción](#intro.pspell)
- [Instalación/Configuración](#pspell.setup)<li>[Requerimientos](#pspell.requirements)
- [Instalación](#pspell.installation)
- [Tipos de recursos](#pspell.resources)
  </li>- [Constantes predefinidas](#pspell.constants)
- [Funciones de Pspell](#ref.pspell)<li>[pspell_add_to_personal](#function.pspell-add-to-personal) — Añade la palabra al diccionario personal
- [pspell_add_to_session](#function.pspell-add-to-session) — Añade la palabra al diccionario personal de la sesión actual
- [pspell_check](#function.pspell-check) — Verifica un término
- [pspell_clear_session](#function.pspell-clear-session) — Restablece la sesión actual
- [pspell_config_create](#function.pspell-config-create) — Crea una configuración utilizada para abrir un diccionario
- [pspell_config_data_dir](#function.pspell-config-data-dir) — Directorio que contiene los archivos de datos lingüísticos
- [pspell_config_dict_dir](#function.pspell-config-dict-dir) — Ubicación del archivo global de palabras
- [pspell_config_ignore](#function.pspell-config-ignore) — Ignora las palabras de menos de N caracteres
- [pspell_config_mode](#function.pspell-config-mode) — Cambia el modo de sugerencia
- [pspell_config_personal](#function.pspell-config-personal) — Selecciona el fichero que contiene el diccionario personal
- [pspell_config_repl](#function.pspell-config-repl) — Selecciona el archivo que contiene los pares de reemplazo
- [pspell_config_runtogether](#function.pspell-config-runtogether) — Considera dos palabras unidas como un compuesto
- [pspell_config_save_repl](#function.pspell-config-save-repl) — Determina si se deben guardar los pares de reemplazo
  con el diccionario
- [pspell_new](#function.pspell-new) — Carga un nuevo diccionario
- [pspell_new_config](#function.pspell-new-config) — Carga un nuevo diccionario con los parámetros especificados en una configuración
- [pspell_new_personal](#function.pspell-new-personal) — Carga un nuevo diccionario con un diccionario personal
- [pspell_save_wordlist](#function.pspell-save-wordlist) — Guarda el diccionario personal en un archivo
- [pspell_store_replacement](#function.pspell-store-replacement) — Registra un par de sustitución para una palabra
- [pspell_suggest](#function.pspell-suggest) — Sugiere la ortografía de una palabra
  </li>- [PSpell\Dictionary](#class.pspell-dictionary) — The PSpell\Dictionary class
- [PSpell\Config](#class.pspell-config) — The PSpell\Config class
