# Expresiones regulares (compatibles con Perl)

# Introducción

La sintaxis de los patrones utilizados en estas funciones se asemeja
mucho a la de Perl. Las expresiones estarán rodeadas
de delimitadores, como la barra (/), por ejemplo. Un delimitador puede
ser cualquier carácter, siempre que no sea alfanumérico, un carácter blanco,
la barra invertida (\) o el carácter nulo (\0).
Si un delimitador debe ser utilizado en
la expresión, deberá protegerse con una barra invertida.
Los delimitadores a la Perl (), {}, [], y &lt;&gt; también pueden ser utilizados.
Consulte la [sintaxis de los patrones](#reference.pcre.pattern.syntax)
para más explicaciones.

El delimitador final puede ser seguido de opciones que
afectarán la búsqueda. Consulte también
[opciones de búsqueda](#reference.pcre.pattern.modifiers).

**Nota**:

    Esta extensión mantiene un caché global por hilo de las expresiones
    regulares compiladas (hasta 4096).

**Advertencia**

    Deben tenerse en cuenta las limitaciones de PCRE.
    Consulte [» http://www.pcre.org/pcre.txt](http://www.pcre.org/pcre.txt) para más detalles.

La biblioteca PCRE es un conjunto de funciones que implementan las
expresiones regulares utilizando la misma sintaxis y semántica
que Perl 5 con solo algunas diferencias (ver más abajo). La implementación
actual corresponde a Perl 5.005.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#pcre.installation)
- [Configuración en tiempo de ejecución](#pcre.configuration)

## Instalación

La extensión PCRE es una extensión nativa de PHP, por lo que siempre está
activada. Por omisión, esta extensión se compila utilizando la
biblioteca PCRE empaquetada. Opcionalmente, puede utilizarse una
biblioteca PCRE externa pasando la opción de configuración
**--with-pcre-regex=DIR** donde
DIR es la ruta de acceso a los ficheros de la biblioteca PCRE.
Se recomienda utilizar PCRE 8.10 o más reciente;
a partir de PHP 7.3.0, PCRE2 es requerido.

La compilación Just In Time (JIT) de PCRE es soportada por omisión,
pudiendo ser desactivada con la opción de configuración
**--without-pcre-jit** a partir de PHP 7.0.12.

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

PCRE es un proyecto activo y a medida que cambia, las
funcionalidades de PHP también lo hacen. Es posible que algunas
partes del manual de PHP estén obsoletas y no cubran
las nuevas funcionalidades proporcionadas por PCRE. Para una lista de
modificaciones, consúltese el
[» registro de cambios de la biblioteca PCRE](http://www.pcre.org/original/changelog.txt)
así como el historial siguiente de la versión PCRE incluida en PHP:

   <caption>**Historial de actualizaciones de la biblioteca PCRE incluida en PHP**</caption>
   
    
     
      Versión PHP
      Versión PCRE actualizada
      Notas


      8.2.0
      10.40
       



      8.1.0
      10.39
       



      7.4.12, 8.0.0
      10.35
       



      7.4.6
      10.34
       



      7.4.0
      10.33
       



      7.3.0
      10.32
       



      7.2.0
      8.41
       



      7.0.3
      8.38
      Ver CVE-2015-8383, CVE-2015-8386, CVE-2015-8387, CVE-2015-8389, CVE-2015-8390, CVE-2015-8391, CVE-2015-8393, CVE-2015-8394



      7.0.0
      8.37
      Ver CVE-2015-2325, CVE-2015-2326


## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de PCRE**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [pcre.backtrack_limit](#ini.pcre.backtrack-limit)
      "1000000"
      **[INI_ALL](#constant.ini-all)**
       



      [pcre.recursion_limit](#ini.pcre.recursion-limit)
      "100000"
      **[INI_ALL](#constant.ini-all)**
       



      [pcre.jit](#ini.pcre.jit)
      "1"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     pcre.backtrack_limit
     [integer](#language.types.integer)



      Límite de retroceso de PCRE. Por defecto es 100000 para PHP &lt; 5.3.7.







     pcre.recursion_limit
     [integer](#language.types.integer)



      Límite de recursividad de PCRE. Por favor, observe que si establece este valor con un número
      alto se podría consumir toda la pila de procesos disponible y provocar finalmente el
      malfuncionamiento de PHP (a causa de alcanzar el límite del tamaño de la pila impuesto por el sistema
      operativo).







     pcre.jit
     [bool](#language.types.boolean)



      Si se va a utilizar la compilacion «just-in-time» de PCRE.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

  <caption>**Constantes PREG**</caption>
  
   
    
     Constantes
     Descripción
     Disponible a partir de


      **[PREG_PATTERN_ORDER](#constant.preg-pattern-order)**
      ([int](#language.types.integer))


      Ordena los resultados de forma que $matches[0] contenga los
      resultados que corresponden al patrón completo, $matches[1] los
      que corresponden a la primera paréntesis capturante y así sucesivamente. Esta
      constante se utiliza con [preg_match_all()](#function.preg-match-all).

      




      **[PREG_SET_ORDER](#constant.preg-set-order)**
      ([int](#language.types.integer))


      Los resultados se clasifican de tal
      forma que $matches[0] contiene la primera
      serie de resultados, $matches[1] la
      segunda, etc.
      Esta constante se utiliza con [preg_match_all()](#function.preg-match-all).

      




      **[PREG_OFFSET_CAPTURE](#constant.preg-offset-capture)**
      ([int](#language.types.integer))



       Si esta opción está activada, para cada coincidencia encontrada,
       el desplazamiento del byte correspondiente también será devuelto.
       Tenga en cuenta que esto modifica los valores de retorno: cada elemento del array
       se convierte en un array que contiene la cadena correspondiente en el offset 0
       y su desplazamiento en la cadena analizada en el offset 1.




      




      **[PREG_SPLIT_NO_EMPTY](#constant.preg-split-no-empty)**
      ([int](#language.types.integer))


      Si esta opción está activada, solo las sub-cadenas no vacías
      serán devueltas por [preg_split()](#function.preg-split).

      




      **[PREG_SPLIT_DELIM_CAPTURE](#constant.preg-split-delim-capture)**
      ([int](#language.types.integer))



       Ver la descripción de **[PREG_OFFSET_CAPTURE](#constant.preg-offset-capture)**.
       Esta bandera solo se utiliza con [preg_split()](#function.preg-split).




      




      **[PREG_SPLIT_OFFSET_CAPTURE](#constant.preg-split-offset-capture)**
      ([int](#language.types.integer))


      Si esta constante se utiliza con [preg_split()](#function.preg-split),
      el desplazamiento de inicio del resultado será devuelto, además de la cadena
      resultado. Tenga en cuenta que esto cambia la naturaleza del resultado devuelto a
      un array que contiene una cadena en el offset 0 y una cadena que contiene un desplazamiento en el offset 1.

      




      **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)**
      ([int](#language.types.integer))


      Esta constante solicita a [preg_match()](#function.preg-match) y
      [preg_match_all()](#function.preg-match-all)
      incluir los subpatrones sin coincidencia en $matches con un valor a **[null](#constant.null)**.
      Sin esta constante, los subpatrones sin coincidencia son devueltos con una cadena vacía, como si la coincidencia estuviera vacía.
      Definir esta constante permite distinguir estos dos casos.

     7.2.0




      **[PREG_NO_ERROR](#constant.preg-no-error)**
      ([int](#language.types.integer))


      Devuelto por la función [preg_last_error()](#function.preg-last-error)
      si no hay error.

     5.2.0




      **[PREG_INTERNAL_ERROR](#constant.preg-internal-error)**
      ([int](#language.types.integer))


      Devuelto por la función [preg_last_error()](#function.preg-last-error)
      si hay un error interno de PCRE.

     5.2.0




      **[PREG_BACKTRACK_LIMIT_ERROR](#constant.preg-backtrack-limit-error)**
      ([int](#language.types.integer))


      Devuelto por la función [preg_last_error()](#function.preg-last-error) si
      [el límite de retroceso](#ini.pcre.backtrack-limit)
      ha sido alcanzado.

     5.2.0




      **[PREG_RECURSION_LIMIT_ERROR](#constant.preg-recursion-limit-error)**
      ([int](#language.types.integer))


      Devuelto por la función [preg_last_error()](#function.preg-last-error) si
      [el límite de recursión](#ini.pcre.recursion-limit)
      ha sido alcanzado.

     5.2.0




      **[PREG_BAD_UTF8_ERROR](#constant.preg-bad-utf8-error)**
      ([int](#language.types.integer))


      Devuelto por la función [preg_last_error()](#function.preg-last-error)
      si el último error se debe a una malformación de los datos
      UTF-8 (solo durante la ejecución de una expresión en
      [modo UTF-8](#reference.pcre.pattern.modifiers)).

     5.2.0




      **[PREG_BAD_UTF8_OFFSET_ERROR](#constant.preg-bad-utf8-offset-error)**
      ([int](#language.types.integer))


      Devuelto por la función [preg_last_error()](#function.preg-last-error) si el desplazamiento
      no corresponde al inicio de un punto válido UTF-8 (solo cuando se
      ejecuta una expresión en [modo
      UTF-8](#reference.pcre.pattern.modifiers)).

     5.3.0




      **[PREG_JIT_STACKLIMIT_ERROR](#constant.preg-jit-stacklimit-error)**
      ([int](#language.types.integer))


      Devuelto por [preg_last_error()](#function.preg-last-error) si la última función
      PCRE falló debido al límite de la pila JIT.

     7.0.0




      **[PCRE_VERSION](#constant.pcre-version)**
      ([int](#language.types.integer))


      Versión PCRE junto con la fecha de publicación
      (es decir, "7.0 18-Dec-2006").

     5.2.4




      **[PCRE_VERSION_MAJOR](#constant.pcre-version-major)**
      ([int](#language.types.integer))


      Número de versión mayor de PCRE.

      




      **[PCRE_VERSION_MINOR](#constant.pcre-version-minor)**
      ([int](#language.types.integer))


      Número de versión menor de PCRE.

      




      **[PCRE_JIT_SUPPORT](#constant.pcre-jit-support)**
      ([bool](#language.types.boolean))


      Indica si el soporte JIT de PCRE está disponible.

      




      **[PREG_GREP_INVERT](#constant.preg-grep-invert)**
      ([int](#language.types.integer))


      Devuelve los elementos que no coinciden con un patrón dado.

      

# Ejemplos

**Ejemplo #1 Ejemplos de patrones válidos**

    - /&lt;\/\w+&gt;/

    - |(\d{3})-\d+|Sm

    - /^(?i)php[34]/

    - {^\s+(\s+)?$}

**Ejemplo #2 Ejemplos de patrones no válidos**

    -

      /href='(.*)' - falta el delimitador final



    -

      /\w+\s*\w+/J - modificador 'J' desconocido



    -

      1-\d3-\d3-\d4| - falta el delimitador inicial


# Patrones PCRE

## Tabla de contenidos

- [Sintaxis de expresiones regulares PCRE](#reference.pcre.pattern.syntax)
- [Opciones disponibles para las expresiones regulares](#reference.pcre.pattern.modifiers)
- [Diferencias con Perl](#reference.pcre.pattern.differences)

# Sintaxis de patrones

## Tabla de contenidos

- [Introducción](#regexp.introduction)
- [Delimitadores](#regexp.reference.delimiters)
- [Metacaracteres](#regexp.reference.meta)
- [Secuencias de escape](#regexp.reference.escape)
- [Propiedades de caracteres Unicode](#regexp.reference.unicode)
- [Anclajes](#regexp.reference.anchors)
- [Punto](#regexp.reference.dot)
- [Clases de caracteres](#regexp.reference.character-classes)
- [Alternancia](#regexp.reference.alternation)
- [Configuración de opciones internas](#regexp.reference.internal-options)
- [Subpatrones](#regexp.reference.subpatterns)
- [Repetición](#regexp.reference.repetition)
- [Referencias inversas](#regexp.reference.back-references)
- [Afirmaciones](#regexp.reference.assertions)
- [Subpatrones de una sola vez](#regexp.reference.onlyonce)
- [Subpatrones condicionales](#regexp.reference.conditional)
- [Comentarios](#regexp.reference.comments)
- [Patrones recursivos](#regexp.reference.recursive)
- [Rendimiento](#regexp.reference.performance)

    ## Introducción

    La sintaxis y semántica de las expresiones regulares
    soportadas por PCRE se describen en esta sección. Las expresiones regulares también se
    describen en la documentación de Perl y en varios
    otros libros, algunos de los cuales tienen ejemplos abundantes. El libro
    "Mastering Regular Expressions" de Jeffrey
    Friedl, publicado por O'Reilly (ISBN 1-56592-257-3), las cubre en gran detalle.
    La descripción aquí está destinada como documentación de referencia.

    Una expresión regular es un patrón que se compara con una
    cadena de sujeto de izquierda a derecha. La mayoría de los caracteres representan
    a sí mismos en un patrón, y coinciden con los
    caracteres correspondientes en el sujeto. Como ejemplo trivial, el patrón
    The quick brown fox
    coincide con una parte de una cadena de sujeto que es idéntica
    a sí misma.

    ## Delimitadores

    Al usar las funciones PCRE, es obligatorio que el patrón esté encerrado
    por _delimitadores_. Un delimitador puede ser cualquier carácter no alfanumérico,
    no barra invertida, no espacio en blanco.
    Los espacios en blanco iniciales antes de un delimitador válido se ignoran silenciosamente.

    Los delimitadores comúnmente utilizados son las barras inclinadas hacia adelante (/), signos de número
    (#) y tildes (~). Los siguientes son ejemplos de patrones delimitados válidos.

/foo bar/
#^[^0-9]$#
+php+
%[a-zA-Z0-9_-]%

También es posible usar
delimitadores de estilo de corchetes donde los corchetes de apertura y cierre son el delimitador de inicio y fin, respectivamente. (),
{}, [] y &lt;&gt;
son todos pares de delimitadores de estilo de corchetes válidos.

(this [is] a (pattern))
{this [is] a (pattern)}
[this [is] a (pattern)]
&lt;this [is] a (pattern)&gt;

Los delimitadores de estilo de corchetes no necesitan ser escapados cuando se usan como metacaracteres dentro del patrón, pero como con otros delimitadores deben ser escapados cuando se usan como caracteres literales.

Si el delimitador necesita coincidir dentro del patrón debe ser
escapado usando una barra invertida. Si el delimitador aparece con frecuencia dentro del
patrón, es una buena idea elegir otro delimitador para aumentar
la legibilidad.

/http:\/\//
#http://#

La función [preg_quote()](#function.preg-quote) puede ser utilizada para escapar una cadena
para inyectarla en un patrón y su segundo parámetro opcional puede ser utilizado
para especificar el delimitador a escapar.

Puede agregar [modificadores de patrón](#reference.pcre.pattern.modifiers) después del delimitador final. El siguiente es un ejemplo
de coincidencia sin distinción de mayúsculas y minúsculas:

#[a-z]#i

## Metacaracteres

El poder de las expresiones regulares proviene de la
capacidad de incluir alternativas y repeticiones en el
patrón. Estas se codifican en el patrón mediante el uso de
_metacaracteres_, que no se representan a sí mismos, sino que se interpretan de alguna manera especial.

Hay dos conjuntos diferentes de metacaracteres: aquellos que
se reconocen en cualquier parte del patrón excepto dentro de corchetes, y aquellos que se reconocen dentro de corchetes.
Fuera de corchetes, los metacaracteres son los siguientes:

     <caption>**Metacaracteres fuera de corchetes**</caption>



       MetacaracterDescripción






       \carácter de escape general con varios usos



       ^asegurar el inicio del sujeto (o línea, en modo multiline)



       $asegurar el final del sujeto o antes de un salto de línea de terminación (o final de línea, en modo multiline)



       .coincidir con cualquier carácter excepto salto de línea (por defecto)



       [inicio de definición de clase de caracteres



       ]fin de definición de clase de caracteres



       |inicio de rama alternativa



       (inicio de subpatrón



       )fin de subpatrón



       ?extiende el significado de (, también 0 o 1 cuantificador, también hace que los cuantificadores codiciosos sean perezosos (ver [repetición](#regexp.reference.repetition))



       *cuantificador 0 o más



       +cuantificador 1 o más



       {inicio de cuantificador min/max



       }fin de cuantificador min/max




Una parte de un patrón que está dentro de corchetes se llama
[clase de caracteres](#regexp.reference.character-classes). En una clase de caracteres los únicos
metacaracteres son:

     <caption>**Metacaracteres dentro de corchetes (*clases de caracteres*)**</caption>



       MetacaracterDescripción






       \carácter de escape general



       ^niega la clase, pero solo si es el primer carácter



       -indica rango de caracteres




Las siguientes secciones describen el uso de cada uno de los
metacaracteres.

## Secuencias de escape

El carácter de barra invertida tiene varios usos. En primer lugar, si está
seguido por un carácter no alfanumérico, elimina cualquier
significado especial que el carácter pueda tener. Este uso de
barra invertida como carácter de escape se aplica tanto dentro como fuera de clases de caracteres.

Por ejemplo, si desea coincidir con un carácter "\*", escribe
"\*" en el patrón. Esto se aplica ya sea que el
carácter siguiente sería interpretado de otra manera como un
metacarácter, por lo que siempre es seguro preceder un no alfanumérico
con "\" para especificar que representa a sí mismo. En
particular, si desea coincidir con una barra invertida, escribe "\\".

**Nota**:

    Las cadenas de PHP con comillas simples y dobles [tienen](#language.types.string.syntax) un significado especial de barra invertida. Por lo tanto, si \ debe coincidir con una expresión regular \\, entonces "\\\\" o '\\\\' debe usarse en el código PHP.

Si un patrón se compila con la
[opción PCRE_EXTENDED](#reference.pcre.pattern.modifiers),
el espacio en blanco en el patrón (excepto en una clase de caracteres) y
los caracteres entre un "#" fuera de una clase de caracteres y el siguiente carácter de nueva línea
se ignoran. Una barra invertida de escape puede usarse para incluir un
carácter de espacio en blanco o "#" como parte del patrón.

Un segundo uso de la barra invertida proporciona una manera de codificar
caracteres no imprimibles en patrones de manera visible. No hay restricción sobre la aparición de caracteres no imprimibles,
aparte del cero binario que termina un patrón,
pero cuando un patrón se está preparando mediante edición de texto, generalmente es
más fácil usar una de las siguientes secuencias de escape
que el carácter binario que representan:

     *\a*

      alarma, es decir, el carácter BEL (hex 07)



     *\cx*

      "control-x", donde x es cualquier carácter



     *\e*

      escape (hex 1B)



     *\f*

      salto de página (hex 0C)



     *\n*

      nueva línea (hex 0A)



     *\p{xx}*


       un carácter con la propiedad xx, ver
       [propiedades unicode](#regexp.reference.unicode)
       para más información




     *\P{xx}*


       un carácter sin la propiedad xx, ver
       [propiedades unicode](#regexp.reference.unicode)
       para más información




     *\r*

      retorno de carro (hex 0D)



     *\R*

      salto de línea: coincide con \n, \r y \r\n



     *\t*

      tabulador (hex 09)



     *\xhh*


       carácter con código hex hh




     *\ddd*

      carácter con código octal ddd, o referencia inversa


El efecto preciso de "\cx" es el siguiente:
si "x" es una letra minúscula, se convierte
a mayúscula. Luego se invierte el bit 6 del carácter (hex 40).
Así, "\cz" se convierte en hex 1A, pero
"\c{" se convierte en hex 3B, mientras que "\c;"
se convierte en hex 7B.

Después de "\x", se leen hasta dos dígitos hexadecimales (las letras pueden estar en mayúsculas o minúsculas).
En _modo UTF-8_, "\x{...}" está permitido, donde el contenido de las llaves es una cadena de dígitos hexadecimales. Se interpreta como un carácter UTF-8 cuyo número de código es el número hexadecimal dado. La secuencia de escape hexadecimal original,
\xhh, coincide con un carácter UTF-8 de dos bytes si el valor es mayor que 127.

Después de "\0" se leen hasta dos dígitos octales adicionales.
En ambos casos, si hay menos de dos dígitos, solo se usan los que
están presentes. Así, la secuencia "\0\x\07"
especifica dos ceros binarios seguidos de un carácter BEL. Asegúrese de
proporcionar dos dígitos después del cero inicial si el carácter
que sigue es él mismo un dígito octal.

El manejo de una barra invertida seguida de un dígito que no sea 0
es complicado. Fuera de una clase de caracteres, PCRE lo lee
y cualquier dígito siguiente como un número decimal. Si el número
es menor que 10, o si ha habido al menos esa cantidad de
paréntesis de apertura de captura anteriores en la expresión, la
secuencia completa se toma como una _referencia inversa_. Una descripción
de cómo funciona esto se da más adelante, después de la discusión
de subpatrones entre paréntesis.

Dentro de una clase de caracteres, o si el número decimal es
mayor que 9 y no ha habido tantas subpatrones de captura, PCRE vuelve a leer
hasta tres dígitos octales siguientes
a la barra invertida, y genera un solo byte a partir de
los 8 bits menos significativos del valor. Los dígitos posteriores se representan a sí mismos. Por ejemplo:

     *\040*
     es otra forma de escribir un espacio


     *\40*


       es lo mismo, siempre que haya menos de 40
       subpatrones de captura anteriores




     *\7*
     siempre es una referencia inversa


     *\11*


       podría ser una referencia inversa, o otra forma de
       escribir un tabulador




     *\011*
     siempre es un tabulador


     *\0113*
     es un tabulador seguido del carácter "3"


     *\113*


       es el carácter con código octal 113 (ya que no puede haber más de 99 referencias inversas)




     *\377*
     es un byte compuesto completamente de 1 bits


     *\81*


       es una referencia inversa, o un cero binario
       seguido de los dos caracteres "8" y "1"



Tenga en cuenta que los valores octales de 100 o más no deben introducirse con un cero inicial, ya que nunca se leen más de tres dígitos octales.

Todas las secuencias que definen un valor de un solo byte pueden usarse tanto dentro como fuera de clases de caracteres. Además,
dentro de una clase de caracteres, la secuencia "\b"
se interpreta como el carácter de retroceso (hex 08). Fuera de una clase de caracteres tiene un significado diferente (ver más abajo).

El tercer uso de la barra invertida es para especificar tipos de caracteres genéricos:

     *\d*
     cualquier dígito decimal


     *\D*
     cualquier carácter que no sea un dígito decimal


     *\h*
     cualquier carácter de espacio en blanco horizontal


     *\H*
     cualquier carácter que no sea un carácter de espacio en blanco horizontal


     *\s*
     cualquier carácter de espacio en blanco


     *\S*
     cualquier carácter que no sea un carácter de espacio en blanco


     *\v*
     cualquier carácter de espacio en blanco vertical


     *\V*
     cualquier carácter que no sea un carácter de espacio en blanco vertical


     *\w*
     cualquier carácter de "palabra"


     *\W*
     cualquier carácter "no palabra"

Cada par de secuencias de escape divide el conjunto completo de
caracteres en dos conjuntos disjuntos. Cualquier carácter
dado coincide con uno, y solo uno, de cada par.

Los caracteres de "espacio en blanco" son HT (9), LF (10), FF (12), CR (13),
y espacio (32). Sin embargo, si se está realizando una coincidencia específica de la configuración regional,
los caracteres con puntos de código en el rango 128-255 también pueden considerarse
como caracteres de espacio en blanco, por ejemplo, NBSP (A0).

Un carácter de "palabra" es cualquier letra o dígito o el carácter de subrayado,
es decir, cualquier carácter que pueda ser parte de
una "palabra" de Perl. La definición de letras y dígitos está
controlada por las tablas de caracteres de PCRE, y puede variar si se está realizando una coincidencia específica de la configuración regional. Por ejemplo, en la configuración regional "fr" (francés), algunos códigos de caracteres mayores que 128 se usan para letras acentuadas,
y estas coinciden con \w.

Estas secuencias de tipos de caracteres pueden aparecer tanto dentro como
fuera de clases de caracteres. Cada una coincide con un carácter de
tipo apropiado. Si el punto de coincidencia actual está al final
de la cadena de sujeto, todas fallan, ya que no hay carácter para coincidir.

El cuarto uso de la barra invertida es para ciertas afirmaciones simples.
Una afirmación especifica una condición que debe cumplirse
en un punto particular en una coincidencia, sin consumir ningún
carácter de la cadena de sujeto. El uso de subpatrones
para afirmaciones más complicadas se describe a continuación. Las
afirmaciones con barra invertida son

     *\b*
     límite de palabra


     *\B*
     no es un límite de palabra


     *\A*
     inicio del sujeto (independiente del modo multiline)


     *\Z*


       final del sujeto o salto de línea al final (independiente del
       modo multiline)




     *\z*
     final del sujeto (independiente del modo multiline)


     *\G*
     primera posición de coincidencia en el sujeto

Estas afirmaciones no pueden aparecer en clases de caracteres (pero
note que "\b" tiene un significado diferente, a saber, el carácter de retroceso, dentro de una clase de caracteres).

Un límite de palabra es una posición en la cadena de sujeto donde
el carácter actual y el carácter anterior no coinciden ambos
con \w o \W (es decir, uno coincide
con \w y el otro coincide
con \W), o el inicio o final de la cadena si el primer
o último carácter coincide con \w, respectivamente.

Las afirmaciones \A, \Z y
\z difieren de las afirmaciones tradicionales
de circunflejo y dólar (descritas en [anclajes](#regexp.reference.anchors) )
en que solo coinciden en el inicio y final exactos de la cadena de sujeto,
independientemente de las opciones establecidas. No se ven afectadas por las
opciones [PCRE_MULTILINE](#reference.pcre.pattern.modifiers) o
[PCRE_DOLLAR_ENDONLY](#reference.pcre.pattern.modifiers).
La diferencia entre \Z y
\z es que \Z coincide antes de un salto de línea que es el último carácter de la cadena así como al final de
la cadena, mientras que \z solo coincide al final.

La afirmación \G es verdadera solo cuando la posición de coincidencia actual está en el punto de inicio de la coincidencia, como se especifica por
el argumento offset de
[preg_match()](#function.preg-match). Difiere de \A
cuando el valor de offset no es cero.

\Q y \E pueden usarse para ignorar
metacaracteres de regexp en el patrón. Por ejemplo:
\w+\Q.$.\E$ coincidirá con uno o más caracteres de palabra,
seguido de literales .$. y anclado al final
   de la cadena. Tenga en cuenta que esto no cambia el comportamiento de
   los delimitadores; por ejemplo, el patrón #\Q#\E#$
no es válido, porque el segundo # marca el final del patrón, y el \E# se interpreta como modificadores inválidos.

\K puede usarse para restablecer el inicio de la coincidencia.
Por ejemplo, el patrón foo\Kbar coincide
con "foobar", pero informa que ha coincidido con "bar". El uso de
\K no interfiere con la configuración de subcadenas capturadas. Por ejemplo, cuando el patrón (foo)\Kbar
coincide con "foobar", la primera subcadena sigue configurada en "foo".

## Propiedades de caracteres Unicode

Desde 5.1.0, tres
secuencias de escape adicionales para coincidir con tipos de caracteres genéricos están disponibles
cuando se selecciona el _modo UTF-8_. Son:

    *\p{xx}*
    un carácter con la propiedad xx


    *\P{xx}*
    un carácter sin la propiedad xx


    *\X*
    una secuencia Unicode extendida

Los nombres de propiedades representados por xx arriba están limitados
a las propiedades generales de categoría Unicode. Cada carácter tiene exactamente una
de estas propiedades, especificada por una abreviatura de dos letras. Para compatibilidad con
Perl, la negación puede especificarse incluyendo una circunflejo entre la llave de apertura y el nombre de la propiedad. Por ejemplo, \p{^Lu}
es lo mismo que \P{Lu}.

Si solo se especifica una letra con \p o
\P, incluye todas las propiedades que comienzan con esa
letra. En este caso, en ausencia de negación, las llaves en la
secuencia de escape son opcionales; estos dos ejemplos tienen el mismo efecto:

\p{L}
\pL

   <caption>**Códigos de propiedades admitidos**</caption>
   
    
     
      Propiedad
      Coincide con
      Notas


      C
      Otro
       



      Cc
      Control
       



      Cf
      Formato
       



      Cn
      No asignado
       



      Co
      Uso privado
       



      Cs
      Sustituto
       



      L
      Letra

       Incluye las siguientes propiedades: Ll,
       Lm, Lo, Lt y
       Lu.




      Ll
      Letra minúscula
       



      Lm
      Letra modificadora
       



      Lo
      Otra letra
       



      Lt
      Letra con mayúscula inicial
       



      Lu
      Letra mayúscula
       



      M
      Marca
       



      Mc
      Marca de espacio
       



      Me
      Marca de cierre
       



      Mn
      Marca no espaciada
       



      N
      Número
       



      Nd
      Número decimal
       



      Nl
      Número de letra
       



      No
      Otro número
       



      P
      Puntuación
       



      Pc
      Puntuación de conexión
       



      Pd
      Puntuación de guión
       



      Pe
      Puntuación de cierre
       



      Pf
      Puntuación final
       



      Pi
      Puntuación inicial
       



      Po
      Otra puntuación
       



      Ps
      Puntuación de apertura
       



      S
      Símbolo
       



      Sc
      Símbolo de moneda
       



      Sk
      Símbolo modificador
       



      Sm
      Símbolo matemático
       



      So
      Otro símbolo
      Incluye emojis



      Z
      Separador
       



      Zl
      Separador de línea
       



      Zp
      Separador de párrafo
       



      Zs
      Separador de espacio
       


Las propiedades extendidas como InMusicalSymbols no
son soportadas por PCRE.

Especificar coincidencia sin distinción de mayúsculas y minúsculas no afecta estas secuencias de escape.
Por ejemplo, \p{Lu} siempre coincide solo con letras mayúsculas.

Los conjuntos de caracteres Unicode están definidos como pertenecientes a ciertos guiones. Un
carácter de uno de estos conjuntos puede coincidir usando un nombre de guión. Por
ejemplo:

- \p{Greek}

- \P{Han}

Aquellos que no son parte de un guión identificado se agrupan juntos como
Common. La lista actual de guiones es:

   <caption>**Guiones admitidos**</caption>
   
    
     
      Arabic
      Armenian
      Avestan
      Balinese
      Bamum


      Batak
      Bengali
      Bopomofo
      Brahmi
      Braille



      Buginese
      Buhid
      Canadian_Aboriginal
      Carian
      Chakma



      Cham
      Cherokee
      Common
      Coptic
      Cuneiform



      Cypriot
      Cyrillic
      Deseret
      Devanagari
      Egyptian_Hieroglyphs



      Ethiopic
      Georgian
      Glagolitic
      Gothic
      Greek



      Gujarati
      Gurmukhi
      Han
      Hangul
      Hanunoo



      Hebrew
      Hiragana
      Imperial_Aramaic
      Inherited
      Inscriptional_Pahlavi



      Inscriptional_Parthian
      Javanese
      Kaithi
      Kannada
      Katakana



      Kayah_Li
      Kharoshthi
      Khmer
      Lao
      Latin



      Lepcha
      Limbu
      Linear_B
      Lisu
      Lycian



      Lydian
      Malayalam
      Mandaic
      Meetei_Mayek
      Meroitic_Cursive



      Meroitic_Hieroglyphs
      Miao
      Mongolian
      Myanmar
      New_Tai_Lue



      Nko
      Ogham
      Old_Italic
      Old_Persian
      Old_South_Arabian



      Old_Turkic
      Ol_Chiki
      Oriya
      Osmanya
      Phags_Pa



      Phoenician
      Rejang
      Runic
      Samaritan
      Saurashtra



      Sharada
      Shavian
      Sinhala
      Sora_Sompeng
      Sundanese



      Syloti_Nagri
      Syriac
      Tagalog
      Tagbanwa
      Tai_Le



      Tai_Tham
      Tai_Viet
      Takri
      Tamil
      Telugu



      Thaana
      Thai
      Tibetan
      Tifinagh
      Ugaritic



      Vai
      Yi
       
       
       


La secuencia de escape \X coincide con un grupo de glifos extendidos de Unicode. Un grupo de glifos extendidos de Unicode es uno o más caracteres Unicode
que se combinan para formar un glifo. En efecto, esto puede considerarse como
el equivalente de Unicode de . ya que coincidirá con un
carácter compuesto, independientemente de cuántos caracteres individuales se
utilicen realmente para renderizarlo.

En versiones de PCRE anteriores a 8.32 (que corresponde a versiones de PHP anteriores a 5.4.14 cuando se usa la biblioteca PCRE incluida), \X
es equivalente a (?&gt;\PM\pM\*). Es decir, coincide con un carácter sin la propiedad "marca", seguido de cero o más caracteres
con la propiedad "marca", y trata la secuencia como un grupo atómico (ver más abajo). Los caracteres con la propiedad "marca" son típicamente acentos que afectan al carácter anterior.

Coincidir con caracteres por propiedad Unicode no es rápido, porque PCRE tiene
que buscar una estructura que contiene datos para más de quince mil
caracteres. Por eso las secuencias de escape tradicionales como
\d y \w no usan propiedades Unicode
en PCRE.

## Anclajes

Fuera de una clase de caracteres, en el modo de coincidencia predeterminado, el
carácter de circunflejo (^) es una afirmación que
es verdadera solo si el punto de coincidencia actual está al inicio
de la cadena de sujeto. Dentro de una clase de caracteres, el circunflejo (^)
tiene un significado completamente diferente (ver más abajo).

El circunflejo (^) no necesita ser el primer carácter
del patrón si se involucran varias alternativas, pero
debe ser la primera cosa en cada alternativa en la que aparezca
si el patrón alguna vez va a coincidir con esa rama. Si todas las alternativas posibles comienzan con un circunflejo (^), es decir,
si el patrón está restringido a coincidir solo al inicio del sujeto,
se dice que está "anclado". (También hay otras
construcciones que pueden causar que un patrón esté anclado.)

Un carácter de dólar ($) es una afirmación que es
   **[true](#constant.true)** solo si el punto de coincidencia actual está al final
   de la cadena de sujeto, o inmediatamente antes de un carácter de nueva línea que es el último
   carácter en la cadena (por defecto). El dólar ($)
no necesita ser el último carácter del patrón si se involucran varias alternativas, pero
debe ser el último elemento en cualquier rama
en la que aparezca. El dólar no tiene ningún significado especial en una
clase de caracteres.

El significado del dólar puede cambiarse para que solo coincida
al final muy exacto de la cadena, estableciendo la
[opción PCRE_DOLLAR_ENDONLY](#reference.pcre.pattern.modifiers)
en el momento de compilación o coincidencia. Esto no afecta la afirmación \Z.

Los significados de los caracteres de circunflejo y dólar cambian si la
[opción PCRE_MULTILINE](#reference.pcre.pattern.modifiers) está establecida. Cuando esto es así, coinciden inmediatamente después y
inmediatamente antes de un carácter "\n" interno, respectivamente, además de coincidir al inicio y final de la cadena de sujeto. Por ejemplo, el patrón /^abc$/ coincide con la cadena de sujeto "def\nabc" en modo multiline,
pero no de otra manera. Por lo tanto, los patrones que están anclados en modo de una sola línea porque todas las ramas comienzan con "^" no están anclados en modo multiline. La
[opción PCRE_DOLLAR_ENDONLY](#reference.pcre.pattern.modifiers)
se ignora si
[PCRE_MULTILINE](#reference.pcre.pattern.modifiers) está
establecido.

Tenga en cuenta que las secuencias \A, \Z y \z pueden usarse para coincidir
con el inicio y final del sujeto en ambos modos, y si todas
las ramas de un patrón comienzan con \A, siempre está anclado,
ya sea que [PCRE_MULTILINE](#reference.pcre.pattern.modifiers)
esté establecido o no.

## Punto

Fuera de una clase de caracteres, un punto en el patrón coincide con cualquier
carácter en el sujeto, incluyendo un carácter no imprimible,
pero no (por defecto) un salto de línea. Si la
[opción PCRE_DOTALL](#reference.pcre.pattern.modifiers) está establecida, entonces los puntos coinciden con saltos de línea también. El
manejo del punto es completamente independiente del manejo de circunflejo y dólar, la única relación siendo que ambos involucran caracteres de salto de línea. El punto no tiene ningún significado especial
en una clase de caracteres.

_\C_ puede usarse para coincidir con un solo byte. Tiene sentido
en _modo UTF-8_ donde el punto completo coincide con el carácter completo que puede consistir en múltiples bytes.

## Clases de caracteres

Un corchete de apertura introduce una clase de caracteres,
terminada por un corchete de cierre. Un corchete de cierre por sí solo no es especial. Si se requiere un corchete de cierre como miembro de la clase, debe ser
el primer carácter de datos en la clase (después de un circunflejo inicial, si está presente) o escapado con una barra invertida.

Una clase de caracteres coincide con un solo carácter en el sujeto;
el carácter debe estar en el conjunto de caracteres definido por
la clase, a menos que el primer carácter en la clase sea un
circunflejo, en cuyo caso el carácter del sujeto no debe estar en
el conjunto definido por la clase. Si se requiere un circunflejo como
miembro de la clase, asegúrese de que no sea el
primer carácter, o escápelo con una barra invertida.

Por ejemplo, la clase de caracteres [aeiou] coincide con cualquier vocal minúscula, mientras que [^aeiou] coincide con cualquier carácter que no sea
una vocal minúscula. Tenga en cuenta que un circunflejo es solo una
notación conveniente para especificar los caracteres que están en
la clase enumerando aquellos que no están. No es una
afirmación: aún consume un carácter de la cadena de sujeto,
y falla si el puntero actual está al final
de la cadena.

Cuando se establece la coincidencia sin distinción de mayúsculas y minúsculas, cualquier letra
en una clase representa tanto su versión mayúscula como minúscula,
por lo que, por ejemplo, una [aeiou] insensible coincide con "A"
así como con "a", y una [^aeiou] insensible no coincide
con "A", mientras que una versión sensible (con distinción de mayúsculas y minúsculas) sí.

El carácter de nueva línea nunca se trata de manera especial en
clases de caracteres, independientemente de la configuración de las opciones [PCRE_DOTALL](#reference.pcre.pattern.modifiers)
o [PCRE_MULTILINE](#reference.pcre.pattern.modifiers). Una clase como [^a] siempre coincide con una nueva línea.

El carácter de guión puede usarse para especificar un rango
de caracteres en una clase de caracteres. Por ejemplo, [d-m]
coincide con cualquier letra entre d y m, inclusive. Si se requiere un carácter de guión en una clase, debe escaparse con una
barra invertida o aparecer en una posición donde no pueda
interpretarse como indicación de un rango, típicamente como el primer o último
carácter en la clase.

No es posible tener el carácter literal "]" como el
carácter final de un rango. Un patrón como [W-]46] es
interpretado como una clase de dos caracteres ("W" y "-")
seguido de una cadena literal "46]", por lo que coincidiría con "W46]" o
"-46]". Sin embargo, si el "]" se escapa con una barra invertida, se interpreta como el final del rango, por lo que [W-\]46] es
interpretado como una sola clase que contiene un rango seguido de dos
caracteres separados. También se puede usar la representación octal o hexadecimal
de "]" para terminar un rango.

Los rangos operan en la secuencia de clasificación ASCII. También pueden usarse para caracteres especificados numéricamente, por ejemplo
[\000-\037]. Si se usa un rango que incluye letras cuando se establece la
coincidencia sin distinción de mayúsculas y minúsculas, coincide con
las letras en cualquier caso. Por ejemplo, [W-c] es equivalente a
[][\^_`wxyzabc], coincidiendo sin distinción de mayúsculas y minúsculas, y si se usan tablas de caracteres para la configuración regional "fr", [\xc8-\xcb] coincide
con caracteres E acentuados en ambos casos.

Los tipos de caracteres \d, \D, \s, \S, \w, y \W también
pueden aparecer en una clase de caracteres, y añaden los caracteres que
coinciden a la clase. Por ejemplo, [\dABCDEF] coincide con cualquier
dígito hexadecimal. Un circunflejo puede usarse convenientemente
con los tipos de caracteres mayúsculas para especificar un conjunto más
restringido de caracteres que el tipo minúscula correspondiente.
Por ejemplo, la clase [^\W_] coincide con cualquier letra o dígito,
pero no con el guión bajo.

Todos los caracteres no alfanuméricos excepto \, -, ^ (al inicio) y el terminador ] son no especiales en clases de caracteres, pero no causa daño si están escapados. El terminador del patrón es siempre especial y debe escaparse cuando se usa
dentro de una expresión.

Perl soporta la notación POSIX para clases de caracteres. Esta usa nombres
encerrados por [: y :] dentro
de los corchetes de apertura y cierre. PCRE también
soporta esta notación. Por ejemplo, [01[:alpha:]%]
coincide con "0", "1", cualquier carácter alfabético, o "%". Las clases de nombres soportadas son:

    <caption>**Clases de caracteres**</caption>


      alnumletras y dígitos

      alphaletras

      asciicódigos de caracteres 0 - 127

      blanksolo espacio o tabulación

      cntrlcaracteres de control

      digitdígitos decimales (igual que \d)

      graphcaracteres de impresión, excluyendo espacio

      lowerletras minúsculas

      printcaracteres de impresión, incluyendo espacio

      punctcaracteres de impresión, excluyendo letras y dígitos

      spaceespacio en blanco (no exactamente igual que \s)

      upperletras mayúsculas

      wordcaracteres de "palabra" (igual que \w)

      xdigitdígitos hexadecimales



Los caracteres space son HT (9), LF (10), VT (11), FF (12), CR (13),
y espacio (32). Observe que esta lista incluye el carácter VT (código
11). Esto hace que "space" sea diferente a \s, que no incluye VT (para compatibilidad con Perl).

El nombre word es una extensión de Perl, y blank es una extensión de GNU
de Perl 5.8. Otra extensión de Perl es la negación, que se indica
con un carácter ^ después de los dos puntos. Por ejemplo,
[12[:^digit:]] coincide con "1", "2", o cualquier no dígito.

En modo UTF-8, los caracteres con valores mayores que 128 no coinciden con ninguna
de las clases de caracteres POSIX.
A partir de libpcre 8.10, algunas clases de caracteres se cambian para usar
propiedades de caracteres Unicode, en cuyo caso la restricción mencionada no se aplica. Consulte el [» manual PCRE(3)](http://www.pcre.org/pcre.txt)
para obtener más detalles.

Las propiedades de caracteres Unicode pueden aparecer dentro de una clase de caracteres. No pueden ser parte de un rango. El carácter de guión después de una clase de caracteres Unicode coincidirá literalmente. Intentar terminar un rango con una propiedad de caracteres Unicode resultará en una advertencia.

## Alternancia

Los caracteres de barra vertical se usan para separar patrones alternativos.
Por ejemplo, el patrón
gilbert|sullivan
coincide con "gilbert" o "sullivan". Cualquier número de alternativas
puede aparecer, y se permite una alternativa vacía
(coincidiendo con la cadena vacía). El proceso de coincidencia intenta
cada alternativa en orden, de izquierda a derecha, y la primera
que tenga éxito se usa. Si las alternativas están dentro de un
subpatrón (definido más abajo), "éxito" significa coincidir con
el resto del patrón principal así como con la alternativa en el
subpatrón.

Es posible registrar cuál alternativa fue coincidente usando
(_MARK:NAME) o (_:NAME).
Cualquier número de verbos (*MARK) pueden aparecer y sus nombres no tienen que ser únicos. Cuando una coincidencia tiene éxito, el nombre de la última (*MARK:NAME) encontrada se colocará entre las coincidencias como si fuera un grupo de captura llamado MARK para que pueda leerse desde el matches de
[preg_match()](#function.preg-match) y se pasará al
callback de [preg_replace_callback()](#function.preg-replace-callback) etc.

## Configuración de opciones internas

La configuración de [PCRE_CASELESS](#reference.pcre.pattern.modifiers),
[PCRE_MULTILINE](#reference.pcre.pattern.modifiers),
[PCRE_DOTALL](#reference.pcre.pattern.modifiers),
[PCRE_UNGREEDY](#reference.pcre.pattern.modifiers),
[PCRE_EXTRA](#reference.pcre.pattern.modifiers),
[PCRE_EXTENDED](#reference.pcre.pattern.modifiers)
y PCRE_DUPNAMES puede cambiarse desde dentro del patrón mediante
una secuencia de letras de opciones de Perl encerradas entre "(?" y
")". Las letras de opciones son:

    <caption>**Letras de opciones internas**</caption>



       i
       para [PCRE_CASELESS](#reference.pcre.pattern.modifiers)



       m
       para [PCRE_MULTILINE](#reference.pcre.pattern.modifiers)



       s
       para [PCRE_DOTALL](#reference.pcre.pattern.modifiers)



       x
       para [PCRE_EXTENDED](#reference.pcre.pattern.modifiers)



       U
       para [PCRE_UNGREEDY](#reference.pcre.pattern.modifiers)



       X
       para [PCRE_EXTRA](#reference.pcre.pattern.modifiers)
        (ya no soportado a partir de PHP 7.3.0)



       J
       para [PCRE_INFO_JCHANGED](#reference.pcre.pattern.modifiers)




Por ejemplo, (?im) establece coincidencia sin distinción de mayúsculas y minúsculas, multiline. También es posible anular estas opciones precediendo la letra
con un guión, y una configuración combinada como
(?im-sx), que establece [PCRE_CASELESS](#reference.pcre.pattern.modifiers) y
[PCRE_MULTILINE](#reference.pcre.pattern.modifiers)
mientras anula [PCRE_DOTALL](#reference.pcre.pattern.modifiers) y
[PCRE_EXTENDED](#reference.pcre.pattern.modifiers),
también está permitido. Si una letra aparece tanto antes como después del
guión, la opción se anula.

Cuando ocurre un cambio de opción a nivel superior (es decir, no dentro
de paréntesis de subpatrón), el cambio se aplica al resto del
patrón que sigue. Por lo tanto, /ab(?i)c/ coincide solo con "abc"
y "abC".

Si un cambio de opción ocurre dentro de un subpatrón, el efecto
es diferente. Este es un cambio de comportamiento en Perl 5.005.
Un cambio de opción dentro de un subpatrón afecta solo a esa parte
del subpatrón que sigue, por lo que

(a(?i)b)c

coincide con "abc" y "aBc" y ninguna otra cadena (asumiendo [PCRE_CASELESS](#reference.pcre.pattern.modifiers) no se usa). De esta manera, las opciones pueden tener diferentes configuraciones en
diferentes partes del patrón. Cualquier cambio realizado en una alternativa se
lleva a las ramas posteriores dentro del mismo subpatrón. Por
ejemplo,

(a(?i)b|c)

coincide con "ab", "aB", "c", y "C", incluso cuando se coincide
con "C" la primera rama se abandona antes de la configuración de la opción.
Esto se debe a que los efectos de la configuración de las opciones ocurren al
tiempo de compilación. Habría un comportamiento muy extraño de otra manera.

Las opciones específicas de PCRE [PCRE_UNGREEDY](#reference.pcre.pattern.modifiers) y
[PCRE_EXTRA](#reference.pcre.pattern.modifiers) pueden
cambiarse de la misma manera que las opciones compatibles con Perl usando las letras U y X respectivamente. La configuración de la bandera
(?X) es especial en que siempre debe ocurrir antes en
el patrón que cualquiera de las características adicionales que activa,
incluso cuando está a nivel superior. Es mejor ponerla al principio.

## Subpatrones

Los subpatrones están delimitados por paréntesis (paréntesis redondos),
que pueden anidarse. Marcar una parte de un patrón como subpatrón
hace dos cosas:

- Localiza un conjunto de alternativas. Por ejemplo, el patrón
  cat(aract|erpillar|) coincide con una de las palabras "cat",
  "cataract", o "caterpillar". Sin los paréntesis, coincidiría
  con "cataract", "erpillar" o la cadena vacía.

- Establece el subpatrón como un subpatrón de captura (como se definió anteriormente).
  Cuando todo el patrón coincide, la porción de la cadena de sujeto
  que coincidió con el subpatrón se devuelve al llamador a través del
  argumento _ovector_ de **pcre_exec()**.
  Los paréntesis de apertura se cuentan de izquierda a derecha (comenzando desde 1) para
  obtener los números de los subpatrones de captura.

Por ejemplo, si la cadena "the red king" se compara con
el patrón

the ((red|white) (king|queen))

las subcadenas capturadas son "red king", "red", y "king",
y están numeradas 1, 2, y 3.

El hecho de que los paréntesis simples cumplan dos funciones no
siempre es útil. Hay momentos en los que se requiere un subpatrón de agrupación
sin un requisito de captura. Si un paréntesis de apertura es seguido por "?:", el subpatrón no
realiza ninguna captura, y no se cuenta al calcular el número de cualquier subpatrón de captura posterior. Por ejemplo, si la cadena "the white queen" se compara con
el patrón

the ((?:red|white) (king|queen))

las subcadenas capturadas son "white queen" y "queen", y
están numeradas 1 y 2. El número máximo de subcadenas capturadas
es 65535. Puede que no sea posible compilar patrones tan grandes,
sin embargo, dependiendo de las opciones de configuración de libpcre.

Como abreviatura conveniente, si se requieren configuraciones de opciones
al inicio de un subpatrón no de captura, las letras de opciones pueden aparecer entre
el "?" y el ":". Por lo tanto, los dos patrones

(?i:saturday|sunday)
(?:(?i)saturday|sunday)

coinciden exactamente con el mismo conjunto de cadenas. Debido a que las ramas alternativas se prueban de izquierda a derecha, y las opciones no se restablecen hasta que se alcanza el final del subpatrón, una configuración de opción en una rama afecta a las ramas posteriores, por lo que los patrones anteriores coinciden con "SUNDAY" así como con "Saturday".

Es posible nombrar un subpatrón usando la sintaxis
(?P&lt;name&gt;pattern). Este subpatrón luego
será indexado en el array de coincidencias por su posición numérica normal y
también por nombre. Hay dos sintaxis alternativas
(?&lt;name&gt;pattern) y (?'name'pattern).

A veces es necesario tener múltiples coincidencias alternativas
en una expresión regular. Normalmente, cada una de estas tendría
su propio número de referencia inversa, aunque solo una de ellas podría coincidir.
Para superar esto, la sintaxis (?| permite tener números duplicados. Considere el siguiente regex aplicado a la cadena Sunday:

(?:(Sat)ur|(Sun))day

Aquí Sun se almacena en la referencia inversa 2, mientras que
la referencia inversa 1 está vacía. Hacer coincidir Saturday produce
Sat en la referencia inversa 1 mientras que la referencia inversa 2 no existe. Cambiar el patrón para usar (?| resuelve este problema:

(?|(Sat)ur|(Sun))day

Usando este patrón, tanto Sun como Sat
se almacenarían en la referencia inversa 1.

## Repetición

La repetición se especifica mediante cuantificadores, que pueden seguir cualquiera
de los siguientes elementos:

    - un solo carácter, posiblemente escapado

    - el metacarácter .

    - una clase de caracteres

    - una referencia inversa (ver siguiente sección)

    - un subpatrón entre paréntesis (a menos que sea una afirmación -
     ver más abajo)

El cuantificador general de repetición especifica un número mínimo y máximo de coincidencias permitidas, dando los dos
números entre llaves (llaves), separados por una coma.
Los números deben ser menores que 65536, y el primero debe ser
menor o igual al segundo. Por ejemplo:

z{2,4}

coincide con "zz", "zzz", o "zzzz". Una llave de cierre por sí sola
no es un carácter especial. Si el segundo número se omite,
pero la coma está presente, no hay límite superior; si el
segundo número y la coma se omiten ambos, el cuantificador
especifica un número exacto de coincidencias requeridas. Por lo tanto

[aeiou]{3,}

coincide con al menos 3 vocales sucesivas, pero puede coincidir con
muchas más, mientras que

\d{8}

coincide con exactamente 8 dígitos.

Antes de PHP 8.4.0, una llave de apertura que
aparece en una posición donde no se permite un cuantificador, o
una que no coincide con la sintaxis de un cuantificador, se toma
como un carácter literal. Por ejemplo, {,6}
no es un cuantificador, sino una cadena literal de cuatro caracteres.

A partir de PHP 8.4.0, la extensión PCRE se incluye con la versión PCRE2 10.44,
que permite patrones como \d{,8} y se interpretan como \d{0,8}.

Además, a partir de PHP 8.4.0, los caracteres de espacio alrededor de los cuantificadores como
\d{0 , 8} y \d{ 0 , 8 } están permitidos.

El cuantificador {0} está permitido, lo que hace que la expresión se comporte como si el elemento anterior y el cuantificador no estuvieran presentes.

Para mayor comodidad (y compatibilidad histórica) los tres cuantificadores más comunes tienen abreviaturas de un solo carácter:

    <caption>**Cuantificadores de un solo carácter**</caption>



       *
       equivalente a {0,}



       +
       equivalente a {1,}



       ?
       equivalente a {0,1}




Es posible construir bucles infinitos siguiendo un subpatrón que puede coincidir con cero caracteres con un cuantificador que no tiene límite superior, por ejemplo:

(a?)\*

Versiones anteriores de Perl y PCRE solían dar un error en el momento de la compilación para tales patrones. Sin embargo, dado que hay casos en los que esto puede ser útil, tales patrones ahora son aceptados, pero si alguna repetición del subpatrón en realidad coincide con cero caracteres, el bucle se rompe a la fuerza.

Por defecto, los cuantificadores son "codiciosos", es decir, coinciden con la mayor cantidad posible (hasta el número máximo de veces permitido), sin causar que el resto del patrón
falle. El ejemplo clásico donde esto causa problemas es al intentar coincidir con comentarios en programas C. Estos aparecen entre
las secuencias /_ y _/ y dentro de la secuencia, los caracteres individuales

- y / pueden aparecer. Un intento de coincidir con comentarios C aplicando el patrón

/\*.\*\*/

a la cadena

/_ first comment _/ not comment /_ second comment _/

falla, porque coincide con toda la cadena debido a la codicia del elemento .\*.

Sin embargo, si un cuantificador es seguido por un signo de interrogación,
entonces se vuelve perezoso, y en su lugar coincide con el número mínimo de veces posible, por lo que el patrón

/\*.\*?\*/

hace lo correcto con los comentarios C. El significado de los varios cuantificadores no cambia de otra manera, solo el número preferido de coincidencias. No confunda este uso de
signo de interrogación con su uso como cuantificador por sí mismo.
Debido a que tiene dos usos, a veces puede aparecer duplicado, como en

\d??\d

que coincide con un dígito por preferencia, pero puede coincidir con dos si
esa es la única manera de que el resto del patrón coincida.

Si la [opción PCRE_UNGREEDY](#reference.pcre.pattern.modifiers)
está establecida (una opción que no
está disponible en Perl) entonces los cuantificadores no son codiciosos por defecto, pero los individuales pueden hacerse codiciosos siguiendo
con un signo de interrogación. En otras palabras, invierte el comportamiento por defecto.

Los cuantificadores seguidos de + son "poseídos". Consumen
tantos caracteres como sea posible y no regresan para hacer coincidir el resto del
patrón. Por lo tanto, ._abc coincide con "aabc" pero
._+abc no porque .\*+ consume toda la cadena. Los cuantificadores poseídos pueden usarse para acelerar el procesamiento.

Cuando un subpatrón entre paréntesis se cuantifica con un conteo de repetición mínimo que es mayor que 1 o con un máximo limitado,
se requiere más almacenamiento para el patrón compilado, en
proporción al tamaño del mínimo o máximo.

Si un patrón comienza con ._ o .{0,} y la [opción PCRE_DOTALL](#reference.pcre.pattern.modifiers) está establecida (equivalente a /s de Perl), lo que permite que el punto coincida con saltos de línea, entonces el patrón está implícitamente anclado,
porque lo que sigue se intentará contra cada posición de carácter en la cadena de sujeto, por lo que no tiene sentido volver a intentar la coincidencia general en cualquier posición después de la primera.
PCRE trata un patrón como si estuviera precedido por \A.
En casos donde se sabe que la cadena de sujeto no contiene saltos de línea, se obtiene una optimización estableciendo [PCRE_DOTALL](#reference.pcre.pattern.modifiers) cuando el patrón comienza con ._ para
obtener esta optimización, o
alternativamente usando ^ para indicar el anclaje explícitamente.

Cuando un subpatrón de captura se repite, el valor capturado es la subcadena que coincidió con la iteración final. Por ejemplo, después de

(tweedle[dume]{3}\s\*)+

ha coincidido con "tweedledum tweedledee" el valor de la subcadena capturada es "tweedledee". Sin embargo, si hay
subpatrones de captura anidados, los valores capturados correspondientes pueden haber sido establecidos en iteraciones anteriores. Por ejemplo,
después de

/(a|(b))+/

coincide con "aba" el valor de la segunda subcadena capturada es
"b".

## Referencias inversas

Fuera de una clase de caracteres, una barra invertida seguida de un dígito
mayor que 0 (y posiblemente otros dígitos) es una referencia inversa a un subpatrón de captura anterior (es decir, a su
izquierda) en el patrón, siempre que haya habido tantos subpatrones de apertura de captura anteriores.

Sin embargo, si el número decimal que sigue a la barra invertida es
menor que 10, siempre se toma como una referencia inversa, y causa un error solo si no hay tantos paréntesis de apertura de captura en todo el patrón. En otras palabras, los
paréntesis a los que se hace referencia no necesitan estar a la izquierda de la referencia para números menores que 10.
Una "referencia inversa hacia adelante" puede tener sentido cuando se involucra una repetición y el subpatrón a la derecha ha participado
en una iteración anterior. Consulte la sección
[secuencias de escape](#regexp.reference.escape) para obtener más detalles sobre el manejo de los dígitos que siguen a una barra invertida.

Una referencia inversa coincide con lo que realmente coincidió con el subpatrón de captura en la cadena de sujeto actual, en lugar de
cualquier cosa que coincida con el subpatrón mismo. Por lo tanto, el patrón

(sens|respons)e and \1ibility

coincide con "sense and sensibility" y "response and responsibility",
pero no con "sense and responsibility". Si la coincidencia sensible (con distinción de mayúsculas y minúsculas) está en vigor en el momento de la referencia inversa, entonces
el caso de las letras es relevante. Por ejemplo,

((?i)rah)\s+\1

coincide con "rah rah" y "RAH RAH", pero no con "RAH rah", incluso
aunque el subpatrón de captura original se coincidió sin distinción de mayúsculas y minúsculas.

Puede haber más de una referencia inversa al mismo subpatrón.
Si un subpatrón no se ha utilizado realmente en
una coincidencia particular, entonces cualquier referencia inversa a él siempre
falla. Por ejemplo, el patrón

(a|(bc))\2

siempre falla si comienza a coincidir con "a" en lugar de "bc".
Debido a que pueden haber hasta 99 referencias inversas, todos los dígitos
que siguen a la barra invertida se toman como parte de un número de referencia inversa potencial. Si el patrón continúa con un carácter de dígito,
entonces algún delimitador debe usarse para terminar la referencia inversa. Si la [opción PCRE_EXTENDED](#reference.pcre.pattern.modifiers) está establecida, esto puede ser espacio en blanco. De lo contrario, se puede usar un comentario vacío.

Una referencia inversa que ocurre dentro de los paréntesis a los que se refiere falla cuando el subpatrón se usa por primera vez, por lo que, por
ejemplo, (a\1) nunca coincide. Sin embargo, tales referencias pueden ser útiles dentro de subpatrones repetidos. Por ejemplo, el patrón

(a|b\1)+

coincide con cualquier número de "a" y también "aba", "ababba" etc. En cada iteración del subpatrón, la referencia inversa coincide
con la cadena de caracteres correspondiente a la iteración anterior.
Para que esto funcione, el patrón debe ser tal
que la primera iteración no necesite coincidir con la referencia inversa. Esto se puede hacer usando alternancia, como en el
ejemplo anterior, o por un cuantificador con un mínimo de cero.

La secuencia de escape \g puede usarse para referencias absolutas y relativas de subpatrones.
Esta secuencia de escape debe ir seguida de un número sin signo o un número negativo, opcionalmente encerrado entre llaves. Las secuencias \1,
\g1 y \g{1} son sinónimas
entre sí. El uso de este patrón con un número sin signo puede ayudar a eliminar la ambigüedad inherente al usar dígitos después de una barra invertida. La secuencia ayuda a distinguir referencias inversas de caracteres octales y también facilita tener una referencia inversa seguida de un número literal, por ejemplo \g{2}1.

El uso de la secuencia \g con un número negativo
significa una referencia relativa. Por ejemplo, (foo)(bar)\g{-1}
coincidiría con la secuencia "foobarbar" y (foo)(bar)\g{-2}
coincide con "foobarfoo". Esto puede ser útil en patrones largos como una alternativa a llevar la cuenta del número de subpatrones para referirse
a un subpatrón específico anterior.

Las referencias inversas a los subpatrones con nombre pueden lograrse mediante
(?P=name),
\k&lt;name&gt;, \k'name',
\k{name}, \g{name},
\g&lt;name&gt; o \g'name'.

## Afirmaciones

Una afirmación es una prueba sobre los caracteres que siguen o preceden al punto de coincidencia actual que no consume realmente ningún carácter. Las afirmaciones simples codificadas como \b,
\B, \A, \Z, \z, ^ y $ se describen en [secuencias de escape](#regexp.reference.escape). Las afirmaciones más complicadas se codifican como subpatrones. Hay dos
tipos: aquellos que _miran hacia adelante_ de la posición actual en la
cadena de sujeto, y aquellos que _miran hacia atrás_ de ella.

Un subpatrón de afirmación se coincide de la manera normal, excepto
que no hace que la posición de coincidencia actual cambie. _Afirmaciones de anticipación_ comienzan con (?= para afirmaciones positivas y (?! para afirmaciones negativas. Por ejemplo,

\w+(?=;)

coincide con una palabra seguida de un punto y coma, pero no incluye
el punto y coma en la coincidencia, y

foo(?!bar)

coincide con cualquier ocurrencia de "foo" que no esté seguida por
"bar". Tenga en cuenta que el patrón aparentemente similar

(?!foo)bar

no encuentra una ocurrencia de "bar" que esté precedida por algo que no sea "foo"; encuentra cualquier ocurrencia de "bar"
en absoluto, porque la afirmación (?!foo) es siempre **[true](#constant.true)**
cuando los siguientes tres caracteres son "bar". Se necesita una afirmación de retroceso para lograr este efecto.

_Afirmaciones de retroceso_ comienzan con (?&lt;= para afirmaciones positivas y (?&lt;! para afirmaciones negativas. Por ejemplo,

(?&lt;!foo)bar

sí encuentra una ocurrencia de "bar" que no está precedida por
"foo". El contenido de una afirmación de retroceso está restringido
de tal manera que todas las cadenas que coincide deben tener una longitud fija. Sin embargo, si hay varias alternativas, no todas tienen que tener la misma longitud fija. Por lo tanto

(?&lt;=bullock|donkey)

está permitido, pero

(?&lt;!dogs?|cats?)

causa un error en el momento de la compilación. Las ramas que coinciden con cadenas de diferentes longitudes están permitidas solo al nivel superior
de una afirmación de retroceso. Esto es una extensión en comparación con Perl 5.005, que requiere que todas las ramas coincidan con la misma longitud de cadena. Una afirmación como

(?&lt;=ab(c|de))

no está permitida, porque su única rama de nivel superior puede coincidir con dos longitudes diferentes, pero es aceptable si se reescribe para usar dos ramas de nivel superior:

(?&lt;=abc|abde)

La implementación de afirmaciones de retroceso es, para cada alternativa, mover temporalmente la posición actual hacia atrás por el ancho fijo y luego intentar coincidir. Si no hay suficientes caracteres antes de la posición actual, la coincidencia se considera fallida. Los retrocesos en conjunto con subpatrones de una sola vez pueden ser particularmente útiles para coincidir al final de las cadenas; se da un ejemplo al final
de la sección sobre subpatrones de una sola vez.

Varias afirmaciones (de cualquier tipo) pueden ocurrir en sucesión.
Por ejemplo,

(?&lt;=\d{3})(?&lt;!999)foo

coincide con "foo" precedido por tres dígitos que no son "999".
Observe que cada una de las afirmaciones se aplica independientemente
en el mismo punto de la cadena de sujeto. Primero hay una verificación de que los tres caracteres anteriores son todos dígitos,
luego hay una verificación de que los mismos tres caracteres no son "999". Este patrón no coincide con "foo" precedido por seis
caracteres, el primero de los cuales son dígitos y los últimos tres de los cuales no son "999". Por ejemplo, no coincide
con "123abcfoo". Un patrón para hacer eso es

(?&lt;=\d{3}...)(?&lt;!999)foo

Esta vez la primera afirmación mira los seis caracteres anteriores, verificando que los primeros tres son dígitos, y
luego la segunda afirmación verifica que los tres caracteres anteriores no son "999".

Las afirmaciones pueden anidarse en cualquier combinación. Por ejemplo,

(?&lt;=(?&lt;!foo)bar)baz

coincide con una ocurrencia de "baz" que es precedida por "bar"
que a su vez no es precedida por "foo", mientras que

(?&lt;=\d{3}...(?&lt;!999))foo

es otro patrón que coincide con "foo" precedido por tres
dígitos y cualquier tres caracteres que no son "999".

Los subpatrones de afirmación no son subpatrones de captura, y no pueden
repetirse, porque no tiene sentido afirmar lo mismo varias veces. Si cualquier tipo de afirmación contiene subpatrones de captura dentro de ella, estos se cuentan para los fines de numerar los subpatrones de captura en todo
el patrón. Sin embargo, la captura de subcadenas solo se lleva a cabo para afirmaciones positivas, porque no tiene sentido para afirmaciones negativas.

Las afirmaciones cuentan hacia el máximo de 200 subpatrones entre paréntesis.

## Subpatrones de una sola vez

Con la repetición de maximización y minimización, el fracaso de lo que sigue normalmente hace que el elemento repetido se reevalúe para ver si un número diferente de repeticiones permite que el resto del patrón coincida. A veces es útil
evitar esto, ya sea para cambiar la naturaleza de la coincidencia, o
para hacer que falle antes de lo que lo haría de otra manera, cuando el autor del patrón sabe que no hay punto en continuar.

Considere, por ejemplo, el patrón \d+foo cuando se aplica a
la línea de sujeto

123456bar

Después de coincidir con todos los 6 dígitos y luego fallar al coincidir con "foo",
la acción normal del coincidente es intentar nuevamente con solo 5
dígitos coincidiendo con el elemento \d+, y luego con 4, y así sucesivamente,
antes de fallar finalmente. Los subpatrones de una sola vez proporcionan el medio para especificar que una vez que una parte del patrón ha coincidido, no debe ser revaluada de esta manera, por lo que el coincidente se rendiría inmediatamente al fallar en coincidir con "foo"
la primera vez. La notación es otro tipo de paréntesis especial, comenzando con (?&gt; como en este ejemplo:

(?&gt;\d+)bar

Este tipo de paréntesis "bloquea" la parte del patrón que contiene una vez que ha coincidido, y un fallo más adelante en el patrón se impide retroceder hacia él.
Retroceder más allá de él, sin embargo, funciona como de costumbre.

Una descripción alternativa es que un subpatrón de este tipo
coincide con la cadena de caracteres que un patrón independiente idéntico coincidiría, si se anclara en el punto
actual en la cadena de sujeto.

Los subpatrones de una sola vez no son subpatrones de captura. Casos simples como el ejemplo anterior pueden pensarse como un repetidor maximizador que debe tragarse todo lo que pueda. Por lo tanto,
mientras que tanto \d+ como \d+? están dispuestos a ajustar el número de dígitos que coinciden para hacer que el resto del patrón coincida, (?&gt;\d+) solo puede coincidir con una secuencia completa de dígitos.

Esta construcción puede contener, por supuesto, subpatrones arbitrariamente complejos, y puede anidarse.

Los subpatrones de una sola vez pueden usarse en conjunto con afirmaciones de retroceso para especificar coincidencias eficientes al final de la cadena de sujeto. Considere un patrón simple como

abcd$

cuando se aplica a una cadena larga que no coincide. Dado que la coincidencia procede de izquierda a derecha, PCRE buscará cada "a" en el sujeto y luego verá si lo que sigue coincide con el resto del patrón. Si el patrón se especifica como

^.\*abcd$

entonces el .\* inicial coincide con toda la cadena al principio, pero
cuando esto falla (porque no hay un "a" siguiente), retrocede para coincidir con todo excepto el último carácter, luego todo excepto los dos últimos caracteres, y así sucesivamente. Una vez más, la búsqueda de "a" cubre toda la cadena, de derecha a izquierda, por lo que no estamos mejor. Sin embargo, si el patrón se escribe como

^(?&gt;.\*)(?&lt;=abcd)

entonces no puede haber retroceso para el elemento .\*; solo puede coincidir con toda la cadena. La afirmación de retroceso posterior realiza una sola prueba en los últimos cuatro caracteres. Si falla, la coincidencia falla inmediatamente. Para cadenas largas,
este enfoque hace una diferencia significativa en el tiempo de procesamiento.

Cuando un patrón contiene una repetición ilimitada dentro de un subpatrón que a su vez puede repetirse un número ilimitado de veces, el uso de un subpatrón de una sola vez es la única manera de evitar que algunas coincidencias fallidas tomen un tiempo muy largo. El patrón

(\D+|&lt;\d+&gt;)\*[!?]

coincide con un número ilimitado de subcadenas que consisten en no dígitos, o dígitos encerrados en &lt;&gt;, seguido de
! o ?. Cuando coincide, funciona rápidamente. Sin embargo, si se aplica a

aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

tarda mucho tiempo en informar el fallo. Esto se debe a
que la cadena puede dividirse entre las dos repeticiones de muchas maneras, y todas tienen que ser probadas antes de que se pueda informar el fallo. (El ejemplo usó [!?] en lugar de un solo carácter al final,
porque tanto PCRE como Perl tienen una optimización que permite un fallo rápido cuando se usa un solo carácter. Recuerdan el último carácter único que se requiere para una coincidencia, y fallan temprano si no está presente en la cadena.)
Si el patrón se cambia a

((?&gt;\D+)|&lt;\d+&gt;)\*[!?]

las secuencias de no dígitos no pueden romperse, y el fallo ocurre rápidamente.

## Subpatrones condicionales

Es posible hacer que el proceso de coincidencia obedezca un subpatrón
condicionalmente o elegir entre dos subpatrones alternativos,
dependiendo del resultado de una afirmación, o
si un subpatrón de captura anterior coincidió o no. Las
dos formas posibles de subpatrón condicional son

(?(condition)yes-pattern)
(?(condition)yes-pattern|no-pattern)

Si la condición se cumple, se usa el yes-pattern; de lo contrario
se usa el no-pattern (si está presente). Si hay
más de dos alternativas en el subpatrón, ocurre un error en el momento de la compilación.

Hay dos tipos de condiciones. Si el texto entre los
paréntesis consiste en una secuencia de dígitos, entonces la
condición se cumple si el subpatrón de captura de ese número ha coincidido anteriormente. Considere el siguiente patrón,
que contiene espacio en blanco no significativo para hacerlo
más legible (asumiendo la [opción PCRE_EXTENDED](#reference.pcre.pattern.modifiers)
y para dividirlo en tres partes para facilitar la discusión):

( \( )? [^()]+ (?(1) \) )

La primera parte coincide con un paréntesis de apertura opcional, y
si ese carácter está presente, lo establece como la primera subcadena capturada. La segunda parte coincide con uno o más caracteres que no son paréntesis. La tercera parte es un subpatrón condicional que prueba si el primer conjunto de paréntesis
coincidió o no. Si lo hicieron, es decir, si el sujeto comenzó con un paréntesis de apertura, la condición es **[true](#constant.true)**, y por lo tanto el yes-pattern se ejecuta y se requiere un paréntesis de cierre. De lo contrario, ya que no-pattern no está presente, el subpatrón coincide con nada. En otras palabras, este patrón coincide con una secuencia de caracteres no paréntesis, opcionalmente encerrada en paréntesis.

Si la condición es la cadena (R), se cumple si se ha realizado una llamada recursiva al patrón o subpatrón. En "nivel superior", la condición es falsa.

Si la condición no es una secuencia de dígitos o (R), debe ser una
afirmación. Esta puede ser una afirmación positiva o negativa de anticipación o retroceso. Considere este patrón, que nuevamente contiene espacio en blanco no significativo, y con las dos alternativas en la segunda línea:

(?(?=[^a-z]\*[a-z])
\d{2}-[a-z]{3}-\d{2} | \d{2}-\d{2}-\d{2} )

La condición es una afirmación positiva de anticipación que coincide con una secuencia opcional de caracteres no letras seguida de una letra. En otras palabras, prueba la presencia de al menos una
letra en el sujeto. Si se encuentra una letra, el sujeto se compara con la primera alternativa; de lo contrario, se compara con la segunda. Este patrón coincide con cadenas en una de las dos formas dd-aaa-dd o dd-dd-dd, donde aaa son letras y dd son dígitos.

## Comentarios

La secuencia (?# marca el inicio de un comentario que
continúa hasta el siguiente paréntesis de cierre. No se permiten paréntesis anidados. Los caracteres que componen un
comentario no participan en absoluto en la coincidencia del patrón.

Si la [opción PCRE_EXTENDED](#reference.pcre.pattern.modifiers) está establecida, un carácter # no escapado fuera de una clase de caracteres
introduce un comentario que continúa hasta el siguiente carácter de nueva línea en el patrón.

    **Ejemplo #1 Uso de comentarios en el patrón PCRE**

&lt;?php

$subject = 'test';

/_ (?# puede usarse para agregar comentarios sin habilitar PCRE_EXTENDED _/
$match = preg_match('/te(?# este es un comentario)st/', $subject);
var_dump($match);

/_ El espacio en blanco y # se trata como parte del patrón a menos que PCRE_EXTENDED esté habilitado _/
$match = preg_match('/te   #~~~~
st/', $subject);
var_dump($match);

/_ Cuando PCRE_EXTENDED está habilitado, todos los caracteres de espacio en blanco y cualquier cosa
que siga a un # no escapado en la misma línea se ignoran _/
$match = preg_match('/te    #~~~~
st/x', $subject);
var_dump($match);

    El ejemplo anterior mostrará:

int(1)
int(0)
int(1)

## Patrones recursivos

Considere el problema de hacer coincidir una cadena entre paréntesis,
permitiendo paréntesis anidados ilimitados. Sin el uso
de recursión, lo mejor que se puede hacer es usar un patrón
que coincide hasta una profundidad fija de anidamiento. No
es posible manejar una profundidad de anidamiento arbitraria. Perl 5.6 ha
proporcionado una instalación experimental que permite que las expresiones regulares sean recursivas (entre otras cosas). Se proporciona el elemento especial (?R) para el caso específico de recursión.
Este patrón PCRE resuelve el problema de los paréntesis (asumiendo
que la [opción PCRE_EXTENDED](#reference.pcre.pattern.modifiers) está establecida para que el espacio en blanco se
ignore):

\( ( (?&gt;[^()]+) | (?R) )\* \)

Primero coincide con un paréntesis de apertura. Luego coincide con cualquier
número de subcadenas que pueden ser una secuencia de caracteres no paréntesis, o una coincidencia recursiva del patrón mismo (es decir, una subcadena correctamente entre paréntesis). Finalmente hay un paréntesis de cierre.

Este ejemplo de patrón en particular contiene repeticiones ilimitadas anidadas, y por lo tanto el uso de un subpatrón de una sola vez para coincidir con cadenas de caracteres no paréntesis es importante al aplicar
el patrón a cadenas que no coinciden. Por ejemplo, cuando se aplica a

(aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa()

produce "no coincide" rápidamente. Sin embargo, si no se usa un subpatrón de una sola vez, la coincidencia tarda un tiempo muy largo
porque hay tantas formas diferentes en que las repeticiones + y \* pueden dividir el sujeto, y todas tienen que ser probadas antes de que se pueda informar el fallo.

Los valores establecidos para cualquier subpatrón de captura son aquellos del nivel más externo de la recursión en el que se establece el valor del subpatrón. Si el patrón anterior coincide con

(ab(cd)ef)

el valor para los paréntesis de captura es "ef", que es el último valor tomado en el nivel superior. Si se añaden más paréntesis, dando

\( ( ( (?&gt;[^()]+) | (?R) )\* ) \)
entonces la cadena que capturan
es "ab(cd)ef", el contenido de los paréntesis de nivel superior. Si hay más de 15 paréntesis de captura en un patrón,
PCRE tiene que obtener memoria adicional para almacenar datos durante una
recursión, lo cual hace mediante el uso de pcre_malloc, liberándola posteriormente mediante pcre_free. Si no se puede obtener memoria, solo guarda datos para los primeros 15 subpatrones de captura, ya que no hay forma de dar un error de memoria insuficiente desde dentro de una recursión.

(?1), (?2) y así sucesivamente pueden usarse para subpatrones recursivos también. También es posible usar subpatrones con nombre: (?P&gt;name) o
(?&amp;name).

Si la sintaxis para una referencia de subpatrón recursivo (ya sea por número o por nombre) se usa fuera de los paréntesis a los que se refiere, opera como una subrutina en un lenguaje de programación. Un ejemplo anterior señaló que el patrón
(sens|respons)e and \1ibility
coincide con "sense and sensibility" y "response and responsibility", pero
no con "sense and responsibility". Si en su lugar se usa el patrón
(sens|respons)e and (?1)ibility
sí coincide con "sense and responsibility" además de las otras dos cadenas. Tales referencias deben, sin embargo, seguir al subpatrón al que se refieren.

La longitud máxima de una cadena de sujeto es el número positivo más grande
que puede contener una variable entera. Sin embargo, PCRE usa recursión para
manejar subpatrones y repetición indefinida. Esto significa que el espacio de pila disponible puede limitar el tamaño de una cadena de sujeto que puede ser
procesada por ciertos patrones.

## Rendimiento

Ciertos elementos que pueden aparecer en patrones son más eficientes
que otros. Es más eficiente usar una clase de caracteres como [aeiou] que un conjunto de alternativas como (a|e|i|o|u).
En general, la construcción más simple que proporciona el
comportamiento requerido suele ser la más eficiente. El libro de Jeffrey
Friedl contiene mucha discusión sobre cómo optimizar expresiones regulares para un rendimiento eficiente.

Cuando un patrón comienza con .\* y la [opción PCRE_DOTALL](#reference.pcre.pattern.modifiers) está
establecida, el patrón está implícitamente anclado por PCRE, ya que
solo puede coincidir al inicio de una cadena de sujeto. Sin embargo, si
[PCRE_DOTALL](#reference.pcre.pattern.modifiers) no está establecida, PCRE no puede hacer esta optimización,
porque el metacarácter . no coincide entonces con un salto de línea,
y si la cadena de sujeto contiene saltos de línea, el patrón puede
coincidir desde el carácter inmediatamente después de uno de ellos
en lugar de desde el principio. Por ejemplo, el patrón

(.\*) second

coincide con la cadena de sujeto "first\nand second" (donde \n representa
un carácter de nueva línea) con la primera subcadena capturada siendo
"and". Para hacer esto, PCRE tiene que volver a intentar la coincidencia
comenzando después de cada salto de línea en el sujeto.

Si está utilizando un patrón como este con cadenas de sujeto que no contienen saltos de línea, el mejor rendimiento se obtiene estableciendo [PCRE_DOTALL](#reference.pcre.pattern.modifiers),
o comenzando el patrón con ^.\* para
indicar anclaje explícito. Esto ahorra a PCRE tener que escanear a lo largo del sujeto buscando un salto de línea para reiniciar.

Tenga cuidado con los patrones que contienen repeticiones indefinidas anidadas.
Estos pueden tardar mucho tiempo en ejecutarse cuando se aplican a una cadena
que no coincide. Considere el fragmento de patrón

(a+)\*

Esto puede coincidir con "aaaa" de 33 maneras diferentes, y este número
aumenta muy rápidamente a medida que la cadena se alarga. (La repetición \*
puede coincidir 0, 1, 2, 3 o 4 veces, y para cada uno de
esos casos excepto 0, las repeticiones + pueden coincidir con diferentes
números de veces.) Cuando el resto del patrón es tal que
toda la coincidencia va a fallar, PCRE en principio
tiene que probar cada variación posible, y esto puede tomar un
tiempo extremadamente largo.

Una optimización atrapa algunos de los casos más simples como
(a+)\*b
donde un carácter literal sigue. Antes de embarcarse en el
procedimiento de coincidencia estándar, PCRE verifica que hay una "b"
más adelante en el sujeto, y si no la hay, falla la coincidencia inmediatamente. Sin embargo, cuando no hay un carácter literal siguiente, esta optimización no puede usarse. Puede ver la diferencia comparando el comportamiento de

(a+)\*\d

con el patrón anterior. El primero da un fallo casi
instantáneamente cuando se aplica a una línea completa de caracteres "a",
mientras que el segundo tarda un tiempo apreciable con cadenas
más largas que unas 20 caracteres.

# Opciones de búsqueda

Las opciones de PCRE se listan a continuación. Los nombres entre
paréntesis son los nombres internos a PCRE.
Los espacios y los caracteres de nueva línea son ignorados
en los modificadores, los otros caracteres causan errores.

      *i* (PCRE_CASELESS)


        Realiza una búsqueda insensible a la casilla.




      *m* (PCRE_MULTILINE)


        Por omisión, PCRE trata la cadena sujeto como una sola
        línea (aunque esta cadena contenga retornos de carro).
        El metacarácter "inicio de línea" (^) solo será
        válido una vez, al inicio de la línea, y el
        metacarácter "fin de línea" ($) solo será válido
        al final de la cadena, o antes del retorno de carro
        final (a menos que se active la opción *D*).
        Es el mismo funcionamiento que en Perl.


        Cuando esta opción está activada, "inicio de línea" y
        "fin de línea" corresponderán entonces a los caracteres
        siguiente y precedente inmediatamente a
        un carácter de nueva línea, además del inicio
        y del final de la cadena. Es el mismo
        funcionamiento que la opción Perl /m. Si no hay ningún
        carácter de nueva línea "\n" en la cadena sujeto,
        o si no hay ninguna ocurrencia de ^ o $ en el patrón, esta opción
        no sirve de nada.




      *s* (PCRE_DOTALL)


        Con esta opción, el metacarácter punto (.)
        reemplaza cualquier carácter, incluyendo las nuevas
        líneas. Sin esta opción, el carácter punto no reemplaza
        las nuevas líneas. Esta opción es equivalente
        a la opción Perl /s. Una clase de caracteres
        negativa como [^a] aceptará siempre los
        caracteres de nuevas líneas, independientemente
        de esta opción.




      *x* (PCRE_EXTENDED)


        Con esta opción, los caracteres de espacio son
        ignorados, excepto cuando están escapados,
        o dentro de una clase de caracteres,
        y todos los caracteres entre # no escapados
        y fuera de una clase de caracteres, y el próximo
        carácter de nueva línea son ignorados. Es
        el equivalente Perl de la opción /x: permite añadir
        comentarios en los patrones complicados. Tenga en cuenta,
        sin embargo, que esto solo se aplica a los caracteres de
        datos. Los caracteres de espacio nunca deben
        aparecer en las secuencias especiales
        de un patrón, por ejemplo en la secuencia (?( que
        introduce un paréntesis condicional.




      *A* (PCRE_ANCHORED)


        Con esta opción, el patrón está anclado de forma forzada, es decir
        que el patrón debe aplicarse justo al inicio de la cadena sujeto
        para ser considerado encontrado. Es posible realizar el
        mismo efecto añadiendo los metacaracteres adecuados, lo cual es la
        única manera de hacerlo en Perl.




      *D* (PCRE_DOLLAR_ENDONLY)


        Con esta opción, el metacarácter $ solo será
        válido al final de la cadena sujeto. Sin
        esta opción, $ también es válido antes de una nueva línea,
        si esta última es el último carácter de
        la cadena. Esta opción es ignorada si la opción
        *m* está activada. No hay
        equivalente en Perl.




      *S*


        Cuando un patrón se utiliza varias veces, vale la pena
        pasar unos instantes más para analizarlo
        y optimizar el código para acelerar los
        tratamientos posteriores. Esta opción fuerza este
        análisis más exhaustivo. Actualmente, este análisis
        solo es útil para los patrones no anclados, que
        no comienzan por un carácter fijo.
        Desde PHP 7.3.0, esta bandera ya no tiene efecto.




      *U* (PCRE_UNGREEDY)


        Esta opción invierte la tendencia a la gula de las
        expresiones regulares. También puede invertirse
        esta tendencia caso por caso con un ? pero
        esto hará gula la secuencia. Esta opción no es compatible
        con Perl. También puede ponerse en el patrón con
        la opción (?U) en el
        [patrón](#regexp.reference.internal-options) o
        por un punto de interrogación antes del cuantificador (.e.g. .*?).

       **Nota**:



         No es generalmente posible hacer coincidir
         más que el límite de [pcre.backtrack_limit](#ini.pcre.backtrack-limit)
         caracteres en modo no gula.







      *X* (PCRE_EXTRA)


        Esta opción añade otras funcionalidades incompatibles
        con el PCRE de Perl. Todos los antislashs seguidos de una letra que
        no tendría un significado particular causan un error,
        permitiendo la reserva de estas combinaciones para futuras
        funcionalidades. Por omisión, como en Perl, los
        antislashs seguidos de una letra sin significado particular
        son tratados como valores literales. Actualmente,
        esta opción no activa otras funciones.




      *J* (PCRE_INFO_JCHANGED)


        La opción interna de configuración (?J) modifica la opción local PCRE_DUPNAMES.
        Permite la duplicación de nombres para los subpatrones.
        A partir de PHP 7.2.0 J también es soportado como modificador.




      *u* (PCRE_UTF8)


        Esta opción activa funcionalidades adicionales de PCRE que no son compatibles con Perl.
        La cadena de entrada y el patrón son tratados como cadenas UTF-8.
        Una cadena de entrada inválida tendrá como consecuencia una ausencia de coincidencia en las funciones preg_*.
        Un patrón inválido levantará un error de nivel **[E_WARNING](#constant.e-warning)**.
        Las secuencias UTF-8 de cinco y seis octetos son consideradas inválidas.




      *n* (PCRE_NO_AUTO_CAPTURE)


        Este modificador hace que los grupos simples (xyz) no sean capturantes.
        Solo los grupos nombrados como (?&lt;name&gt;xyz) son capturantes.
        Esto afecta únicamente a los grupos capturantes, siempre es posible
        utilizar referencias de subpatrón numeradas, y el array de
        coincidencias contendrá siempre resultados numerados.
        Disponible a partir de PHP 8.2.0




      *r* (PCRE2_EXTRA_CASELESS_RESTRICT)


        Cuando *u* (PCRE_UTF8) y *i* (PCRE_CASELESS)
        están activos, este modificador impide la coincidencia entre los caracteres ASCII y no-ASCII.


        Por ejemplo, preg_match('/\x{212A}/iu', "K") coincide con el símbolo Kelvin K (U+212A).
        Cuando *r* es utilizado (preg_match('/\x{212A}/iur', "K"), esto no coincide.


        Disponible a partir de PHP 8.4.0.




# Diferencias con Perl

Las diferencias descritas aquí se refieren a las que hay con Perl 5.005.

- Por defecto, un carácter espacio en blanco es cualquier carácter que
  la función isspace() de la biblioteca C reconoce, aunque es
  posible compilar PCRE con tablas de tipo de caracteres alternativas.
  Normalmente isspace() coincide con un espacio, salto de página, nueva línea,
  retorno de carro, tabulador horizontal y tabulador vertical. Perl 5 ya
  no incluye el tabulador vertical en su juego caracteres de espacios en blanco.
  De hecho, el carácter de escape \v, el cual estuvo en la documentación de Perl
  durante mucho tiempo, nunca fue reconocido. Sin embargo, el carácter
  mismo fue tratado como espacio en blanco al menos hasta 5.002.
  En 5.004 y 5.005 no coincide con \s.

- PCRE no permite los cuantificadores de repetición en declaraciones
  de búsqueda hacia delante. Perl las permite, pero no significan lo que
  se puede estar pensando. Por ejemplo, (?!a){3} no afirma que los
  tres caracteres siguientes no son "a". Simplemente afirma que el
  siguiente carácter no es "a" tres veces.

- Los sub-patrones de captura que tienen lugar dentro de declaraciones
  de búsqueda hacia delante negativas se cuentan, pero sus entradas en los
  índices del vector nunca se establecen. Perl establece sus variables
  numéricas desde cualquiera de los patrones que han coincidido antes de que
  la declaración falle al coincidir con algo (de ese modo teniendo éxito), pero
  sólo si la declaración de búsqueda hacia delante negativa contiene sólo una rama.

- Aunque los caracteres cero binario están soportados en la cadena objetivo,
  no están permitidos en un patrón de cadena porque es pasado como una
  cadena C normal, finalizada por cero. La secuencia de escape "\x00" se puede
  usar para representar un cero binario en un patrón.

- Las siguientes secuencias de escape de Perl no estás soportadas:
  \l, \u, \L, \U. De hecho, éstas están implementadas por
  el manejo de cadenas general de Perl y no son parte de su motor de
  comparación de patrones.

- La declaración \G de Perl no está soportada y no es
  relevante para las comparaciones de patrones individuales.

- Obviamente, PCRE no soporta la construcción de (?{código}) y
  (??{código}). Sin embargo, tiene soporte para patrones recursivos.

- Hay, a la hora de escribir, algunas singularidades en Perl
  5.005_02 concernientes con la configuración de las cadenas capturadas
  cuando una parte de un patrón se repite. Por ejemplo, al comparar
  "aba" con el patrón /^(a(b)?)+$/ establece $2 con el valor
     "b", pero al comparar "aabbaa" con /^(aa(bb)?)+$/ deja $2
     sin establecer. Sin embargo, si el patrón se cambia a
     /^(aa(b(b))?)+$/ entonces $2 (y $3) se establecen.
  En Perl 5.004 $2 es establecido en ambos casos, y esto también es **[true](#constant.true)**
  en PCRE. Si en el futuro Perl cambia a un estado de consistencia que es
  diferente, PCRE puede cambiar para seguir su ejemplo.

- Una discrepancia todavía no resuelta es que en Perl
  5.005_02 el patrón /^(a)?(?(1)a|b)+$/ coincide con la cadena
  "a", mientras que en PCRE no lo hace. Sin embargo, en Perl y en
  PCRE /^(a)?a/ coincide con "a" dejando $1 sin establecer.

- PCRE proporciona algunas extensiones para las herramientas de expresiones
  regulares de Perl:

<ol type="1">
       <li class="listitem">
        
         Aunque las declaraciones de búsqueda hacia atrás deben coincidir con cadenas de
         longitud fija, cada rama alternativa de una declaración de búsqueda hacia atrás
         puede coincidir con una longitud de cadena diferente. Perl 5.005 requiere que
         todas ellas tengan la misma longitud.
       


      -

        Si se aplica [PCRE_DOLLAR_ENDONLY](#reference.pcre.pattern.modifiers)
        y no se aplica [PCRE_MULTILINE](#reference.pcre.pattern.modifiers),
        el meta-carácter $ coincide sólo con el final absoluto de la cadena.



      -

        Si se aplica [PCRE_EXTRA](#reference.pcre.pattern.modifiers),
        una barra invertida seguida de una letra sin ningún significado especial fallará.



      -

        Si se aplica [PCRE_UNGREEDY](#reference.pcre.pattern.modifiers),
        la codicia de los cuantificadores de repetición se invierte,
        es decir, por defecto dejan de ser codiciosos, pero si son seguidos por un
        signo de interrogación lo serán.





   </li>
  </ol>


# Funciones de PCRE

# preg_filter

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

preg_filter — Búsqueda y reemplazo con una expresión regular

### Descripción

**preg_filter**(
    [string](#language.types.string)|[array](#language.types.array) $pattern,
    [string](#language.types.string)|[array](#language.types.array) $replacement,
    [string](#language.types.string)|[array](#language.types.array) $subject,
    [int](#language.types.integer) $limit = -1,
    [int](#language.types.integer) &amp;$count = **[null](#constant.null)**
): [string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null)

**preg_filter()** es idéntica a
[preg_replace()](#function.preg-replace), pero solo devuelve
las ocurrencias encontradas (eventualmente transformadas). Para más detalles sobre el funcionamiento
de esta función, véase [preg_replace()](#function.preg-replace).

### Parámetros

Los parámetros están descritos en la documentación de [preg_replace()](#function.preg-replace).

### Valores devueltos

Devuelve un [array](#language.types.array) si el parámetro subject
es de tipo [array](#language.types.array) o una [string](#language.types.string) en otro caso.

Si ninguna ocurrencia es encontrada o si ocurre un error,
un [array](#language.types.array) vacío será devuelto cuando el parámetro
subject es un [array](#language.types.array) o **[null](#constant.null)** en otro caso.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1
     Ejemplo de comparación de preg_filter()**
     con [preg_replace()](#function.preg-replace)

&lt;?php
$subject = array('1', 'a', '2', 'b', '3', 'A', 'B', '4');
$pattern = array('/\d/', '/[a-z]/', '/[1a]/');
$replace = array('A:$0', 'B:$0', 'C:$0');

echo "preg_filter devuelve\n";
print_r(preg_filter($pattern, $replace, $subject));

echo "preg_replace devuelve\n";
print_r(preg_replace($pattern, $replace, $subject));
?&gt;

    El ejemplo anterior mostrará:

preg_filter devuelve
Array
(
[0] =&gt; A:C:1
[1] =&gt; B:C:a
[2] =&gt; A:2
[3] =&gt; B:b
[4] =&gt; A:3
[7] =&gt; A:4
)
preg_replace devuelve
Array
(
[0] =&gt; A:C:1
[1] =&gt; B:C:a
[2] =&gt; A:2
[3] =&gt; B:b
[4] =&gt; A:3
[5] =&gt; A
[6] =&gt; B
[7] =&gt; A:4
)

### Ver también

    - Los [Patrones PCRE](#pcre.pattern)

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_replace_callback()](#function.preg-replace-callback) - Buscar y reemplazar mediante expresión regular estándar utilizando una función de retrollamada

    - [preg_grep()](#function.preg-grep) - Devuelve un array con los resultados de la búsqueda

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

# preg_grep

(PHP 4, PHP 5, PHP 7, PHP 8)

preg_grep — Devuelve un array con los resultados de la búsqueda

### Descripción

**preg_grep**([string](#language.types.string) $pattern, [array](#language.types.array) $array, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

**preg_grep()** devuelve un [array](#language.types.array) que contiene
los elementos de array
que satisfacen el patrón pattern.

### Parámetros

     pattern


       El patrón a buscar, en forma de [string](#language.types.string).






     array


       El array de entrada.






     flags


       Si esta opción tiene el valor **[PREG_GREP_INVERT](#constant.preg-grep-invert)**,
       esta función devuelve los elementos del array
       input que *no* coinciden
       con el patrón
       pattern.





### Valores devueltos

Devuelve un [array](#language.types.array) indexado, utilizando las claves del
array array de entrada, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con preg_grep()**

&lt;?php
$array = [ "4", M_PI, "2.74", 42 ];

// devuelve todos los elementos del array que contienen números de punto flotante
$fl_array = preg_grep("/^(\d+)?\.\d+$/", $array);

var_dump($fl_array);
?&gt;

### Ver también

    - Los [Patrones PCRE](#pcre.pattern)

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_match_all()](#function.preg-match-all) - Expresión regular global

    - [preg_filter()](#function.preg-filter) - Búsqueda y reemplazo con una expresión regular

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

# preg_last_error

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

preg_last_error — Devuelve el código de error de la última expresión PCRE ejecutada

### Descripción

**preg_last_error**(): [int](#language.types.integer)

Devuelve el código de error de la última expresión regular PCRE ejecutada.

    **Ejemplo #1 Ejemplo con preg_last_error()**

&lt;?php

preg_match('/(?:\D+|&lt;\d+&gt;)\*[!?]/', 'foobar foobar foobar');

if (preg_last_error() == PREG_BACKTRACK_LIMIT_ERROR) {
echo 'Backtrack limit was exhausted!';
}

?&gt;

    El ejemplo anterior mostrará:

Backtrack limit was exhausted!

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una de las siguientes constantes ([explicadas en esta página](#pcre.constants)):

    - **[PREG_NO_ERROR](#constant.preg-no-error)**

    - **[PREG_INTERNAL_ERROR](#constant.preg-internal-error)**

    - **[PREG_BACKTRACK_LIMIT_ERROR](#constant.preg-backtrack-limit-error)** (ver también [pcre.backtrack_limit](#ini.pcre.backtrack-limit))

    - **[PREG_RECURSION_LIMIT_ERROR](#constant.preg-recursion-limit-error)** (ver también [pcre.recursion_limit](#ini.pcre.recursion-limit))

    - **[PREG_BAD_UTF8_ERROR](#constant.preg-bad-utf8-error)**

    - **[PREG_BAD_UTF8_OFFSET_ERROR](#constant.preg-bad-utf8-offset-error)**

    - **[PREG_JIT_STACKLIMIT_ERROR](#constant.preg-jit-stacklimit-error)**

### Ver también

    - [preg_last_error_msg()](#function.preg-last-error-msg) - Devuelve el mensaje de error de la última ejecución de regex PCRE

# preg_last_error_msg

(PHP 8)

preg_last_error_msg — Devuelve el mensaje de error de la última ejecución de regex PCRE

### Descripción

**preg_last_error_msg**(): [string](#language.types.string)

Devuelve el mensaje de error de la última ejecución de regex PCRE.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el mensaje de error en caso de éxito, o "No error" si no se
ha producido ningún error.

### Ejemplos

    **Ejemplo #1 Ejemplo de preg_last_error_msg()**

&lt;?php

preg_match('/(?:\D+|&lt;\d+&gt;)\*[!?]/', 'foobar foobar foobar');

if (preg_last_error() !== PREG_NO_ERROR) {
echo preg_last_error_msg();
}

?&gt;

    El ejemplo anterior mostrará:

Backtrack limit exhausted

### Ver también

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

# preg_match

(PHP 4, PHP 5, PHP 7, PHP 8)

preg_match — Realiza una búsqueda de coincidencia con una expresión regular estándar

### Descripción

**preg_match**(
    [string](#language.types.string) $pattern,
    [string](#language.types.string) $subject,
    [array](#language.types.array) &amp;$matches = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Analiza subject para encontrar la expresión que
coincide con pattern.

### Parámetros

     pattern


       El patrón a buscar, en forma de [string](#language.types.string).






     subject


       La cadena de entrada.






     matches


       Si matches es proporcionado, será llenado con
       los resultados de la búsqueda. $matches[0] contendrá el
       texto que satisface el patrón completo, $matches[1] contendrá
       el texto que satisface la primera subexpresión capturante,
       etc.






     flags


       El parámetro flags puede ser una combinación de los siguientes flags:




         **[PREG_OFFSET_CAPTURE](#constant.preg-offset-capture)**


           Si esta opción está activada, todas las subcadenas que satisfacen
           el patrón también serán identificadas por su offset (en bytes). Tenga en cuenta que esto
           modifica el valor de matches que se convierte en
           un array donde cada elemento es un array que contiene la cadena
           que coincide con el patrón en el offset 0 así
           como el offset de la cadena en subject
           en el offset 1.





&lt;?php
preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
?&gt;

            El ejemplo anterior mostrará:




Array
(
[0] =&gt; Array
(
[0] =&gt; foobarbaz
[1] =&gt; 0
)

    [1] =&gt; Array
        (
            [0] =&gt; foo
            [1] =&gt; 0
        )

    [2] =&gt; Array
        (
            [0] =&gt; bar
            [1] =&gt; 3
        )

    [3] =&gt; Array
        (
            [0] =&gt; baz
            [1] =&gt; 6
        )

)

         **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)**


           Si este flag es pasado, los subpatrones no coincidentes son reportados como **[null](#constant.null)**;
           de lo contrario son reportados como [string](#language.types.string) vacío.





&lt;?php
preg_match('/(a)(b)_(c)/', 'ac', $matches);
var_dump($matches);
preg_match('/(a)(b)_(c)/', 'ac', $matches, PREG_UNMATCHED_AS_NULL);
var_dump($matches);
?&gt;

            El ejemplo anterior mostrará:




array(4) {
[0]=&gt;
string(2) "ac"
[1]=&gt;
string(1) "a"
[2]=&gt;
string(0) ""
[3]=&gt;
string(1) "c"
}
array(4) {
[0]=&gt;
string(2) "ac"
[1]=&gt;
string(1) "a"
[2]=&gt;
NULL
[3]=&gt;
string(1) "c"
}

     offset


       Normalmente, la búsqueda comienza al inicio de la cadena
       subject. El parámetro opcional
       offset puede ser utilizado para especificar
       una posición para el inicio de la búsqueda (en bytes).



      **Nota**:



        Utilizar el parámetro offset no es equivalente
        a pasar substr($subject, $offset) a
        [preg_match_all()](#function.preg-match-all) en lugar de la cadena
        subject, ya que
        pattern puede contener aserciones como
        *^*, *$* o
        *(?&lt;=x)*.
        Compare:





&lt;?php
$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
print_r($matches);
?&gt;

         El ejemplo anterior mostrará:




Array
(
)

          con este ejemplo:





&lt;?php
$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
?&gt;

          producirá:





Array
(
[0] =&gt; Array
(
[0] =&gt; def
[1] =&gt; 0
)

)

          Por lo tanto, para evitar el uso de [substr()](#function.substr), utilizar
          la aserción \G en lugar del ancla ^, o
          el modificador A, ambos funcionan con el parámetro offset.








### Valores devueltos

**preg_match()** devuelve 1 si el pattern
proporcionado coincide, 0 si no coincide, o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)** ahora es soportado para el
        parámetro $flags.





### Ejemplos

    **Ejemplo #1 Encontrar la cadena "php"**

&lt;?php
// El "i" después del delimitador del patrón indica que la búsqueda no será sensible a mayúsculas/minúsculas
if (preg_match("/php/i", "PHP es el mejor lenguaje de script del web.")) {
echo "Se encontró un resultado.";
} else {
echo "No se encontró ningún resultado.";
}
?&gt;

    **Ejemplo #2 Encontrar la palabra "web"**

&lt;?php
/_ \b, en el patrón, indica un límite de palabra, de forma que la palabra
"web" sea detectada, y no solo partes de palabras como
en "webbing" o "cobweb" _/
if (preg_match("/\bweb\b/i", "PHP es el mejor lenguaje de script del web.")) {
echo "La palabra fue encontrada.";
} else {
echo "La palabra no fue encontrada.";
}

echo "\n";

if (preg_match("/\bweb\b/i", "PHP es el mejor lenguaje de script del web.")) {
echo "La palabra fue encontrada.";
} else {
echo "La palabra no fue encontrada.";
}
?&gt;

    **Ejemplo #3 Leer un nombre de dominio en una URL**

&lt;?php
// detectar el nombre del host en la URL
preg_match('@^(?:http://)?([^/]+)@i',
"http://www.php.net/index.html", $matches);
$host = $matches[1];

// detectar los dos últimos segmentos del nombre del host
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo "El nombre de dominio es: {$matches[0]}\n";
?&gt;

    El ejemplo anterior mostrará:

El nombre de dominio es: php.net

    **Ejemplo #4 Uso de subpatrones nombrados**

&lt;?php

$str = 'foobar: 2008';

preg_match('/(?P&lt;name&gt;\w+): (?P&lt;digit&gt;\d+)/', $str, $matches);

/_ Alternativa _/
// preg_match('/(?&lt;name&gt;\w+): (?&lt;digit&gt;\d+)/', $str, $matches);

print_r($matches);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; foobar: 2008
[name] =&gt; foobar
[1] =&gt; foobar
[digit] =&gt; 2008
[2] =&gt; 2008
)

### Notas

**Sugerencia**

    No utilice **preg_match()** si solo desea
    saber si una cadena está contenida en otra.
    Utilice [strpos()](#function.strpos) en su lugar, ya que será más rápido.

### Ver también

    - [Patrones PCRE](#pcre.pattern)

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_match_all()](#function.preg-match-all) - Expresión regular global

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

    - [preg_last_error_msg()](#function.preg-last-error-msg) - Devuelve el mensaje de error de la última ejecución de regex PCRE

# preg_match_all

(PHP 4, PHP 5, PHP 7, PHP 8)

preg_match_all — Expresión regular global

### Descripción

**preg_match_all**(
    [string](#language.types.string) $pattern,
    [string](#language.types.string) $subject,
    [array](#language.types.array) &amp;$matches = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Analiza subject para encontrar la expresión
pattern y almacena los resultados en
matches, en el orden especificado por
flags.

Tras encontrar un primer resultado, la búsqueda continúa hasta
el final de la cadena.

### Parámetros

     pattern


       La máscara a buscar, en forma de [string](#language.types.string).






     subject


       La cadena de entrada.






     matches


       Array que contiene todos los resultados, en un array multidimensional ordenado
       según el parámetro flags.






     flags


       Puede ser una combinación de los siguientes valores
       (señalando que es incoherente usar
       **[PREG_PATTERN_ORDER](#constant.preg-pattern-order)** con
       **[PREG_SET_ORDER](#constant.preg-set-order)** ) :




         **[PREG_PATTERN_ORDER](#constant.preg-pattern-order)**


           El orden es tal que $matches[0] es un array que
           contiene los resultados que satisfacen la máscara
           completa, $matches[1] es un array que contiene los
           resultados que satisfacen la primera
           subexpresión capturante, etc.









&lt;?php
preg_match_all("|&lt;[^&gt;]+&gt;(.\*)&lt;/[^&gt;]+&gt;|U",
"&lt;b&gt;ejemplo : &lt;/b&gt;&lt;div align=left&gt;esto es una prueba&lt;/div&gt;",
$out, PREG_PATTERN_ORDER);
echo $out[0][0] . ", " . $out[0][1] . "\n";
echo $out[1][0] . ", " . $out[1][1] . "\n";
?&gt;

            El ejemplo anterior mostrará:




&lt;b&gt;ejemplo : &lt;/b&gt;, &lt;div align=left&gt;esto es una prueba&lt;/div&gt;
ejemplo : , esto es una prueba

             Así, $out[0] es un array que contiene los resultados que
             satisfacen la máscara completa, y $out[1] es un array que contiene
             las etiquetas entre &gt; y &lt;.






           Si la máscara contiene submáscaras nombradas, $matches
           contendrá además entradas que tendrán como claves los nombres de las submáscaras.




           Si la máscara contiene submáscaras nombradas duplicadas, solo la submáscara
           más a la derecha será registrada en $matches[NAME].





&lt;?php
preg_match_all(
'/(?J)(?&lt;match&gt;foo)|(?&lt;match&gt;bar)/',
'foo bar',
$matches,
    PREG_PATTERN_ORDER
);
print_r($matches['match']);
?&gt;

            El ejemplo anterior mostrará:




Array
(
[0] =&gt;
[1] =&gt; bar
)

         **[PREG_SET_ORDER](#constant.preg-set-order)**


           Los resultados se ordenan de tal forma que $matches[0]
           contiene la primera serie de resultados, $matches[1] contiene
           la segunda, etc.





&lt;?php
preg_match_all("|&lt;[^&gt;]+&gt;(.\*)&lt;/[^&gt;]+&gt;|U",
"&lt;b&gt;ejemplo : &lt;/b&gt;&lt;div align=\"left\"&gt;esto es una prueba&lt;/div&gt;",
$out, PREG_SET_ORDER);
echo $out[0][0] . ", " . $out[0][1] . "\n";
echo $out[1][0] . ", " . $out[1][1] . "\n";
?&gt;

            El ejemplo anterior mostrará:




&lt;b&gt;ejemplo : &lt;/b&gt;, ejemplo :
&lt;div align="left"&gt;esto es una prueba&lt;/div&gt;, esto es una prueba

         **[PREG_OFFSET_CAPTURE](#constant.preg-offset-capture)**


           Si este flag es pasado, todas las subcadenas que satisfacen
           la máscara también serán identificadas por su offset (en bytes).
           Tenga en cuenta que esto modifica el valor de matches en
           un array de arrays donde cada elemento es un array que contiene
           la subcadena satisfecha en el índice 0 y el índice de
           esta en la cadena subject en el índice 1.





&lt;?php
preg_match_all('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
?&gt;

            El ejemplo anterior mostrará:




Array
(
[0] =&gt; Array
(
[0] =&gt; Array
(
[0] =&gt; foobarbaz
[1] =&gt; 0
)

        )

    [1] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [0] =&gt; foo
                    [1] =&gt; 0
                )

        )

    [2] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [0] =&gt; bar
                    [1] =&gt; 3
                )

        )

    [3] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [0] =&gt; baz
                    [1] =&gt; 6
                )

        )

)

         **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)**


           Si este flag es pasado, las subexpresiones no satisfechas son reportadas como **[null](#constant.null)** ;
           de lo contrario, son reportadas como [string](#language.types.string) vacía.








       Si order es omitido,
       **[PREG_PATTERN_ORDER](#constant.preg-pattern-order)** es usado por defecto.






     offset


       Normalmente, la búsqueda comienza al inicio de la cadena
       subject. El parámetro opcional
       offset puede ser usado para especificar
       una posición para el inicio de la búsqueda (en bytes).



      **Nota**:



        Usar el parámetro offset no equivale
        a pasar substr($subject, $offset) a
        **preg_match_all()** en lugar de la cadena
        subject, ya que
        pattern puede contener aserciones como
        *^*, *$* o
        *(?&lt;=x)*. Consulte la documentación
        sobre la función [preg_match()](#function.preg-match) para ejemplos.






### Valores devueltos

Devuelve el número de resultados que satisfacen la máscara
completa, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)** es ahora soportado para el
        parámetro $flags.





### Ejemplos

    **Ejemplo #1 Extracción de todos los números de teléfono de un texto**

&lt;?php
preg_match_all("/\(? (\d{3})? \)? (?(1) [\-\s] ) \d{3}-\d{4}/x",
"Llamar al 555-1212 o 1-800-555-1212", $phones);
?&gt;

    **Ejemplo #2 Buscar pares de etiquetas HTML (voraz)**

&lt;?php
// Este ejemplo utiliza referencias hacia atrás (\\2).
// Indican al analizador que debe encontrar algo que ya ha identificado antes
// el número 2 indica que es el segundo juego de paréntesis
// capturante que debe ser usado (en este caso, ([\w]+)).
// La barra invertida es necesaria aquí, ya que la cadena está entre comillas dobles

$html = "&lt;b&gt;texto en negrita&lt;/b&gt;&lt;a href=howdy.html&gt;haz clic aquí&lt;/a&gt;";

preg_match_all("/(&lt;([\w]+)[^&gt;]_&gt;)(._?)(&lt;\/\\2&gt;)/", $html, $matches, PREG_SET_ORDER);

foreach ($matches as $val) {
echo "coincidencia: " . $val[0] . "\n";
echo "parte 1: " . $val[1] . "\n";
echo "parte 2: " . $val[2] . "\n";
echo "parte 3: " . $val[3] . "\n";
echo "parte 4: " . $val[4] . "\n\n";
}
?&gt;

    El ejemplo anterior mostrará:

coincidencia: &lt;b&gt;texto en negrita&lt;/b&gt;
parte 2: b
parte 3: texto en negrita
parte 4: &lt;/b&gt;

coincidencia: &lt;a href=howdy.html&gt;haz clic aquí&lt;/a&gt;
parte 1: &lt;a href=howdy.html&gt;
parte 2: a
parte 3: haz clic aquí
parte 4: &lt;/a&gt;

    **Ejemplo #3 Uso de una subexpresión nombrada**

&lt;?php

$str = &lt;&lt;&lt;FOO
a: 1
b: 2
c: 3
FOO;

preg_match_all('/(?P&lt;name&gt;\w+): (?P&lt;digit&gt;\d+)/', $str, $matches);

/_ Alternativa _/
// preg_match_all('/(?&lt;name&gt;\w+): (?&lt;digit&gt;\d+)/', $str, $matches);

print_r($matches);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[0] =&gt; a: 1
[1] =&gt; b: 2
[2] =&gt; c: 3
)

    [name] =&gt; Array
        (
            [0] =&gt; a
            [1] =&gt; b
            [2] =&gt; c
        )

    [1] =&gt; Array
        (
            [0] =&gt; a
            [1] =&gt; b
            [2] =&gt; c
        )

    [digit] =&gt; Array
        (
            [0] =&gt; 1
            [1] =&gt; 2
            [2] =&gt; 3
        )

    [2] =&gt; Array
        (
            [0] =&gt; 1
            [1] =&gt; 2
            [2] =&gt; 3
        )

)

### Ver también

    - [Máscaras PCRE](#pcre.pattern)

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

# preg_quote

(PHP 4, PHP 5, PHP 7, PHP 8)

preg_quote — Protección de caracteres especiales de expresiones regulares

### Descripción

**preg_quote**([string](#language.types.string) $str, [?](#language.types.null)[string](#language.types.string) $delimiter = **[null](#constant.null)**): [string](#language.types.string)

**preg_quote()** añade una barra invertida antes de cada carácter de la cadena str que forma parte de la sintaxis de expresiones regulares.
Esto es muy útil si se tiene una cadena que va a
servir como máscara, pero que es generada
durante la ejecución.

Los caracteres especiales que serán protegidos son los siguientes:
. \ + \* ? [ ^ ] $ ( ) { } = ! &lt; &gt; | : - #

Tenga en cuenta que / no es un carácter especial de expresión regular.

**Nota**:

    Tenga en cuenta que **preg_quote()** no está destinado a ser aplicado a
    las cadenas $replacement de [preg_replace()](#function.preg-replace) etc.

### Parámetros

     str


       La cadena de entrada.






     delimiter


       Si el argumento opcional delimiter es proporcionado,
       también será escapado. Esto es práctico para escapar
       el delimitador requerido por las funciones PCRE. La barra / es el
       delimitador más común.





### Valores devueltos

Retorna la cadena protegida.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        El carácter # ahora es protegido




       7.2.0

        delimiter ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con preg_quote()**

&lt;?php
$keywords = '$40 para un g3/400';
$keywords = preg_quote($keywords, '/');
echo $keywords; // retorna \$40 para un g3\/400
?&gt;

    **Ejemplo #2 Poner en cursiva una palabra en un texto**

&lt;?php
// En este ejemplo, preg_quote($word) sirve para evitar que los asteriscos
// tengan un valor especial en la expresión regular.

$textbody = "Este libro es *muy* difícil de encontrar.";
$word = "_muy_";
$textbody = preg_replace ("/" . preg_quote($word, '/') . "/",
"&lt;i&gt;" . $word . "&lt;/i&gt;",
$textbody);
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [Máscaras PCRE](#pcre.pattern)

    - [escapeshellcmd()](#function.escapeshellcmd) - Protege los caracteres especiales del Shell

# preg_replace

(PHP 4, PHP 5, PHP 7, PHP 8)

preg_replace — Buscar y reemplazar mediante expresión regular estándar

### Descripción

**preg_replace**(
    [string](#language.types.string)|[array](#language.types.array) $pattern,
    [string](#language.types.string)|[array](#language.types.array) $replacement,
    [string](#language.types.string)|[array](#language.types.array) $subject,
    [int](#language.types.integer) $limit = -1,
    [int](#language.types.integer) &amp;$count = **[null](#constant.null)**
): [string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null)

Analiza subject para encontrar la expresión
regular pattern y reemplaza los
resultados por replacement.

Para hacer coincidir una cadena exacta, en lugar de una expresión regular,
se recomienda el uso de [str_replace()](#function.str-replace) o [str_ireplace()](#function.str-ireplace)
en lugar de esta función.

### Parámetros

     pattern


       El patrón a buscar. Puede ser una cadena o un array de cadenas.




       También están disponibles varios [modificadores PCRE](#reference.pcre.pattern.modifiers).






     replacement


       La cadena o un array de cadenas para el reemplazo.
       Si este parámetro es una cadena y el parámetro pattern
       es un array, todos los patrones serán reemplazados por esta cadena.
       Si los parámetros pattern y
       replacement son arrays, cada
       pattern será reemplazado por su
       replacement asociado.
       Si replacement tiene menos elementos
       que pattern, entonces una cadena vacía es
       utilizada para el resto de los valores.




       replacement puede contener referencias
       de la forma \n o
       $n.
       Esta última forma es recomendada. Estas referencias serán reemplazadas
       por el texto capturado por la n-ésima parentesis
       capturante del patrón. n puede tomar valores de
       0 a 99, y \0 o $0, corresponden al texto que
       satisface el patrón completo. Los paréntesis abiertos son contados de izquierda a derecha (empezando por 1) para
       determinar el número de paréntesis capturante.
       Es de notar que en los [string](#language.types.string) literales los antislashs deben
       ser escapados.




       Cuando se trabaja con un patrón de reemplazo donde una referencia hacia atrás
       es seguida directamente por un número (i.e.: colocar un número literal inmediatamente
       después de una referencia hacia atrás), no se puede usar la sintaxis clásica
       \1 para la referencia hacia atrás. \11, por ejemplo,
       será confuso para la función **preg_replace()** en el sentido de que
       no sabrá si se desea la referencia hacia atrás \1 seguida del número
       1 o si se desea la referencia hacia atrás \11
       seguida de "nada". En este caso, la solución es usar la sintaxis ${1}1.
       Esto creará una referencia hacia atrás aislada $1, seguida del número
       literal 1.




       Cuando se usa la opción obsoleta e, esta función
       escapa algunos caracteres (', ",
       \ y NULL) en la cadena que reemplaza las referencias hacia atrás.
       Este comportamiento se justifica para asegurar que no ocurra ningún error de sintaxis
       al usar las referencias hacia atrás con comillas simples y dobles (e.g. 'strlen(\'$1\')+strlen("$2")').
       Asegúrese de estar familiarizado con la [sintaxis
       de las cadenas](#language.types.string) para saber exactamente a qué debe parecerse la cadena interpretada.






     subject


       La cadena o el array que contiene las cadenas a buscar y reemplazar.




       Si subject es un array, entonces la operación
       será aplicada a cada uno de los elementos del array, y el array será devuelto.




       Si el array subject es asociativo, entonces las claves
       serán preservadas en el valor devuelto.






     limit


       El número máximo de reemplazos para cada patrón en
       cada cadena subject. Por omisión, vale
       -1 (sin límite).






     count


       Si se proporciona, esta variable contendrá el número de reemplazos realizados.





### Valores devueltos

**preg_replace()** devuelve un array si el parámetro
subject es un array, o una cadena en caso contrario.

Si se encuentran coincidencias, el nuevo
subject será devuelto, de lo contrario
subject será devuelto sin cambios, o **[null](#constant.null)**
si ocurre un error.

### Errores/Excepciones

Utilizar la opción "\e" es un error; se emite una **[E_WARNING](#constant.e-warning)**
en este caso.

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Uso de referencias hacia atrás con literales numéricos**

&lt;?php
$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
?&gt;

    El ejemplo anterior mostrará:

April1,2003

    **Ejemplo #2 Uso de arrays indexados con preg_replace()**

&lt;?php
$string = 'Le renard marron agile saute par dessus le chien paresseux.';
$patterns = array();
$patterns[0] = '/agile/';
$patterns[1] = '/marron/';
$patterns[2] = '/renard/';
$replacements = array();
$replacements[2] = 'grizzly';
$replacements[1] = 'brun';
$replacements[0] = 'lent';
echo preg_replace($patterns, $replacements, $string);
?&gt;

    El ejemplo anterior mostrará:

Le lent brun grizzly saute par dessus le chien paresseux.

     Ordenando los patrones y los reemplazos, se debería obtener el resultado esperado.

&lt;?php
$string = 'Le renard marron agile saute par dessus le chien paresseux.';
$patterns = array();
$patterns[0] = '/agile/';
$patterns[1] = '/marron/';
$patterns[2] = '/renard/';
$replacements = array();
$replacements[2] = 'grizzly';
$replacements[1] = 'brun';
$replacements[0] = 'lent';
ksort($patterns);
ksort($replacements);
echo preg_replace($patterns, $replacements, $string);
?&gt;

    El ejemplo anterior mostrará:

Le grizzly brun lent saute par dessus le chien paresseux.

    **Ejemplo #3 Reemplazo de múltiples valores simultáneamente**

&lt;?php
$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/',
                   '/^\s*{(\w+)}\s*=/');
$replace = array ('\3/\4/\1\2', '$\1 =');
echo preg_replace($patterns, $replace, '{startDate} = 1999-5-27');
?&gt;

    El ejemplo anterior mostrará:

$startDate = 5/27/1999

    **Ejemplo #4 Eliminación de espacios**



     Este ejemplo elimina los espacios en exceso en una cadena.

&lt;?php
$str = 'foo   o';
$str = preg_replace('/\s\s+/', ' ', $str);
// Mostrará 'foo o'
echo $str;
?&gt;

    **Ejemplo #5 Uso del parámetro count**

&lt;?php
$count = 0;

echo preg_replace(array('/\d/', '/\s/'), '\*', 'xp 4 to', -1 , $count);
echo $count; //3
?&gt;

    El ejemplo anterior mostrará:

xp\*\*\*to
3

### Notas

**Nota**:

    Cuando se usan arrays con los parámetros
    pattern y
    replacement, las claves son tratadas
    en el orden en que aparecen en el array.
    Esto *no es necesariamente* lo mismo que
    el orden de los índices numéricos. Si se usan índices para
    identificar qué pattern debe ser
    reemplazado por qué replacement, se
    recomienda hacer un ordenamiento [ksort()](#function.ksort) en cada
    array antes de llamar a **preg_replace()**.

**Nota**:

    Cuando pattern y replacement
    son arrays, las reglas de coincidencia funcionarán de
    manera secuencial. Es decir, la segunda pareja
    pattern/replacement
    operará sobre la cadena de caracteres que resulta de la primera pareja
    pattern/replacement,
    y no sobre la cadena original. Si se desea simular reemplazos
    funcionando en paralelo, como el intercambio de dos valores, reemplace un
    patrón por un sustituto intermedio, luego en una pareja posterior,
    reemplace este marcador intermedio por el reemplazo deseado.

&lt;?php
$p = array('/a/', '/b/', '/c/');
$r = array('b', 'c', 'd');
print_r(preg_replace($p, $r, 'a'));
// imprime d
?&gt;

### Ver también

    - [Patrones PCRE](#pcre.pattern)

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_filter()](#function.preg-filter) - Búsqueda y reemplazo con una expresión regular

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [preg_replace_callback()](#function.preg-replace-callback) - Buscar y reemplazar mediante expresión regular estándar utilizando una función de retrollamada

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

    - [str_replace()](#function.str-replace) - Reemplaza todas las ocurrencias en una string

# preg_replace_callback

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

preg_replace_callback — Buscar y reemplazar mediante expresión regular estándar utilizando una función de retrollamada

### Descripción

**preg_replace_callback**(
    [string](#language.types.string)|[array](#language.types.array) $pattern,
    [callable](#language.types.callable) $callback,
    [string](#language.types.string)|[array](#language.types.array) $subject,
    [int](#language.types.integer) $limit = -1,
    [int](#language.types.integer) &amp;$count = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0
): [string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null)

El comportamiento de **preg_replace_callback()** es casi
idéntico al de [preg_replace()](#function.preg-replace), con la excepción de que
en lugar del argumento replacement, se debe
especificar una función de retrollamada callback
que será llamada con los elementos encontrados como argumentos.

### Parámetros

     pattern


       El patrón a buscar. Puede ser un [string](#language.types.string) o un array que contenga
       cadenas.






     callback


       La función de retrollamada que recibirá el array de elementos
       encontrados en la cadena subject.
       La función de retrollamada debe devolver la cadena de
       reemplazo. Esta es la firma de la función de retrollamada:







        handler([array](#language.types.array) $matches): [string](#language.types.string)



       Con frecuencia, la función callback se utiliza
       con **preg_replace_callback()** en un solo lugar.
       En este caso, puede simplemente utilizar una
       [función anónima](#functions.anonymous)
       para declarar una función de retrollamada para
       **preg_replace_callback()**.
       Al hacer esto, se concentran todas las rutinas relacionadas con
       el reemplazo en un solo lugar, y no se contamina el espacio de nombres de funciones con funciones de un solo uso.







        **Ejemplo #1 preg_replace_callback()** y
        función anónima




&lt;?php
// Un filtro de línea de comandos Unix para convertir la primera letra
// de los párrafos (que comienzan con "&lt;p&gt;") a minúscula

$fp = fopen("php://stdin", "r") or die("No se puede leer la línea de comandos");
while (!feof($fp)) {
$line = fgets($fp);
$line = preg_replace_callback(
        '|&lt;p&gt;\s*\w|',
        function ($matches) {
return strtolower($matches[0]);
        },
        $line
    );
    echo $line;
}
fclose($fp);
?&gt;

     subject


       La cadena o el array de cadenas a buscar y reemplazar.






     limit


       El número máximo de reemplazos para cada patrón
       en cada cadena subject.
       Por omisión, vale -1 (sin límite).






     count


       Si se proporciona, esta variable será rellenada con el número de reemplazos realizados.






     flags


       flags puede ser una combinación de los indicadores
       **[PREG_OFFSET_CAPTURE](#constant.preg-offset-capture)** y
       **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)**, que influyen en el formato
       del array de coincidencias.
       Consulte la descripción de [preg_match()](#function.preg-match) para más detalles.





### Valores devueltos

**preg_replace_callback()** devuelve un array si el argumento
subject es un [array](#language.types.array), o, de lo contrario, un [string](#language.types.string).
Si ocurre un error, el valor devuelto será **[null](#constant.null)**.

Si se encuentran coincidencias, se devuelve el nuevo sujeto, de lo contrario
subject se devuelve sin cambios.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        Se añadió el argumento flags.





### Ejemplos

    **Ejemplo #2 Ejemplo con preg_replace_callback()**

&lt;?php
// Este texto era cierto en 2002
// queremos actualizarlo para 2003
$text = "El primer abril es el 04/01/2002\n";
$text.= "La última navidad fue el 12/24/2001\n";

// Función de retrollamada
function next_year($matches)
{
  // como de costumbre: $matches[0] representa el valor total
  // $matches[1] representa el primer paréntesis capturante
  return $matches[1].($matches[2]+1);
}
echo preg_replace_callback(
"|(\d{2}/\d{2}/)(\d{4})|",
"next_year",
$text);

?&gt;

    El ejemplo anterior mostrará:

El primer abril es el 04/01/2003
La última navidad fue el 12/24/2002

    **Ejemplo #3 Ejemplo con preg_replace_callback()** utilizando una estructura recursiva
     para manejar BB code

&lt;?php
$input = "plain [indent] deep [indent] deeper [/indent] deep [/indent] plain";

function parseTagsRecursive($input)
{

    $regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#';

    if (is_array($input)) {
        $input = '&lt;div style="margin-left: 10px"&gt;'.$input[1].'&lt;/div&gt;';
    }

    return preg_replace_callback($regex, 'parseTagsRecursive', $input);

}

$output = parseTagsRecursive($input);

echo $output;
?&gt;

### Ver también

    - [Patrones PCRE](#pcre.pattern)

    - [preg_replace_callback_array()](#function.preg-replace-callback-array) - Realiza una búsqueda de coincidencia con una expresión regular y reemplaza mediante una función de devolución de llamada

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

    - [Las funciones anónimas](#functions.anonymous)

# preg_replace_callback_array

(PHP 7, PHP 8)

preg_replace_callback_array — Realiza una búsqueda de coincidencia con una expresión regular y reemplaza mediante una función de devolución de llamada

### Descripción

**preg_replace_callback_array**(
    [array](#language.types.array) $pattern,
    [string](#language.types.string)|[array](#language.types.array) $subject,
    [int](#language.types.integer) $limit = -1,
    [int](#language.types.integer) &amp;$count = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0
): [string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null)

El comportamiento de esta función es similar a
[preg_replace_callback()](#function.preg-replace-callback), con la excepción de que las funciones de devolución de llamada
se ejecutan para cada patrón.

### Parámetros

     pattern


       Un array asociativo que establece una relación entre los patrones (claves)
       y las funciones de devolución de llamada [callable](#language.types.callable) (valores).






     subject


       La [string](#language.types.string) o [array](#language.types.array) que contiene los [string](#language.types.string) a buscar y reemplazar.






     limit


       El número máximo de reemplazos para cada patrón en cada
       [string](#language.types.string) subject. Por omisión
       -1 (sin límite).






     count


       Si se proporciona, esta variable será rellenada con el número de
       reemplazos realizados.






     flags


       flags puede ser una combinación de los indicadores
       **[PREG_OFFSET_CAPTURE](#constant.preg-offset-capture)** y
       **[PREG_UNMATCHED_AS_NULL](#constant.preg-unmatched-as-null)**, que influyen en el formato
       del array de coincidencias.
       Ver la descripción de [preg_match()](#function.preg-match) para más detalles.





### Valores devueltos

**preg_replace_callback_array()** devuelve un array si
el parámetro subject es un array, o de lo contrario
una [string](#language.types.string). En caso de error, el valor devuelto es **[null](#constant.null)**.

Si se encuentran coincidencias, el nuevo sujeto será devuelto, de lo contrario
subject será devuelto sin cambios.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        El parámetro flags ha sido añadido.





### Ejemplos

    **Ejemplo #1 Ejemplo de preg_replace_callback_array()**

&lt;?php
$subject = 'Aaaaaa Bbb';

preg_replace_callback_array(
[
'~[a]+~i' =&gt; function ($match) {
            echo strlen($match[0]), ' coincidencias de "a" encontradas', PHP_EOL;
},
'~[b]+~i' =&gt; function ($match) {
            echo strlen($match[0]), ' coincidencias de "b" encontradas', PHP_EOL;
}
],
$subject
);
?&gt;

    El ejemplo anterior mostrará:

6 coincidencias de "a" encontradas
3 coincidencias de "b" encontradas

### Ver también

    - [Patrones PCRE](#pcre.pattern)

    - [preg_replace_callback()](#function.preg-replace-callback) - Buscar y reemplazar mediante expresión regular estándar utilizando una función de retrollamada

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

    - [Funciones anónimas](#functions.anonymous)

# preg_split

(PHP 4, PHP 5, PHP 7, PHP 8)

preg_split — Divide una cadena mediante expresión regular

### Descripción

**preg_split**(
    [string](#language.types.string) $pattern,
    [string](#language.types.string) $subject,
    [int](#language.types.integer) $limit = -1,
    [int](#language.types.integer) $flags = 0
): [array](#language.types.array)|[false](#language.types.singleton)

Divide una cadena mediante expresión regular.

### Parámetros

     pattern


       El patrón a buscar, en forma de [string](#language.types.string).






     subject


       La cadena de entrada.






     limit


       Si limit está especificado, entonces solo se devuelven
       las limit primeras sub-caenas con el resto de la cadena
       colocado en la última sub-caena.
       Un limit de -1 o 0 significa "sin límite".






     flags


       flags puede ser la combinación de las
       siguientes opciones (combinadas con el operador |):




         **[PREG_SPLIT_NO_EMPTY](#constant.preg-split-no-empty)**


          Si esta opción está activada, solo se devuelven las sub-caenas no vacías
          por **preg_split()**.




         **[PREG_SPLIT_DELIM_CAPTURE](#constant.preg-split-delim-capture)**


          Si esta opción está activada, las expresiones entre paréntesis entre
          los delimitadores de patrones también serán capturadas y devueltas.




         **[PREG_SPLIT_OFFSET_CAPTURE](#constant.preg-split-offset-capture)**


           Si esta opción está activada, para cada resultado, su posición será devuelta.
           Tenga en cuenta que esto cambia el valor devuelto a un array donde cada elemento es un
           array compuesto por la cadena encontrada en la posición 0
           y la posición de la cadena en subject en
           la posición 1.









### Valores devueltos

Devuelve un array que contiene las sub-caenas de subject,
separadas por las cadenas que coinciden con pattern, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el patrón regex pasado no se compila a una regex válida, se emite una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con preg_split()**: División de una cadena de búsqueda

&lt;?php
// divide la frase mediante comas y espacios
// lo que incluye los " ", \r, \t, \n y \f
$keywords = preg_split("/[\s,]+/", "lenguaje de marcado, programación");
print_r($keywords);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; lenguaje
[1] =&gt; de
[2] =&gt; marcado
[3] =&gt; programación
)

    **Ejemplo #2 Dividir una cadena en caracteres**

&lt;?php
$str = 'string';
$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; s
[1] =&gt; t
[2] =&gt; r
[3] =&gt; i
[4] =&gt; n
[5] =&gt; g
)

    **Ejemplo #3 Dividir una cadena y capturar las posiciones**

&lt;?php
$str = 'lenguaje de marcado, programación';
$chars = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
print_r($chars);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[0] =&gt; lenguaje
[1] =&gt; 0
)

    [1] =&gt; Array
        (
            [0] =&gt; de
            [1] =&gt; 8
        )

    [2] =&gt; Array
        (
            [0] =&gt; marcado,
            [1] =&gt; 12
        )

    [3] =&gt; Array
        (
            [0] =&gt; programación
            [1] =&gt; 22
        )

)

### Notas

**Sugerencia**

    Si no se necesita el poder de las expresiones regulares,
    pueden elegirse alternativas más rápidas (aunque más simples)
    como [explode()](#function.explode) o [str_split()](#function.str-split).

**Sugerencia**

    Si la búsqueda de una coincidencia falla, se devuelve un array que contiene
    un solo elemento que contiene la cadena de entrada.

### Ver también

    - [Patrones PCRE](#pcre.pattern)

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

    - [explode()](#function.explode) - Divide una string en segmentos

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [preg_match_all()](#function.preg-match-all) - Expresión regular global

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_last_error()](#function.preg-last-error) - Devuelve el código de error de la última expresión PCRE ejecutada

## Tabla de contenidos

- [preg_filter](#function.preg-filter) — Búsqueda y reemplazo con una expresión regular
- [preg_grep](#function.preg-grep) — Devuelve un array con los resultados de la búsqueda
- [preg_last_error](#function.preg-last-error) — Devuelve el código de error de la última expresión PCRE ejecutada
- [preg_last_error_msg](#function.preg-last-error-msg) — Devuelve el mensaje de error de la última ejecución de regex PCRE
- [preg_match](#function.preg-match) — Realiza una búsqueda de coincidencia con una expresión regular estándar
- [preg_match_all](#function.preg-match-all) — Expresión regular global
- [preg_quote](#function.preg-quote) — Protección de caracteres especiales de expresiones regulares
- [preg_replace](#function.preg-replace) — Buscar y reemplazar mediante expresión regular estándar
- [preg_replace_callback](#function.preg-replace-callback) — Buscar y reemplazar mediante expresión regular estándar utilizando una función de retrollamada
- [preg_replace_callback_array](#function.preg-replace-callback-array) — Realiza una búsqueda de coincidencia con una expresión regular y reemplaza mediante una función de devolución de llamada
- [preg_split](#function.preg-split) — Divide una cadena mediante expresión regular

- [Introducción](#intro.pcre)
- [Instalación/Configuración](#pcre.setup)<li>[Instalación](#pcre.installation)
- [Configuración en tiempo de ejecución](#pcre.configuration)
  </li>- [Constantes predefinidas](#pcre.constants)
- [Ejemplos](#pcre.examples)
- [Patrones PCRE](#pcre.pattern)<li>[Sintaxis de expresiones regulares PCRE](#reference.pcre.pattern.syntax) — Sintaxis de patrones
- [Opciones disponibles para las expresiones regulares](#reference.pcre.pattern.modifiers) — Opciones de búsqueda
- [Diferencias con Perl](#reference.pcre.pattern.differences)
  </li>- [Funciones de PCRE](#ref.pcre)<li>[preg_filter](#function.preg-filter) — Búsqueda y reemplazo con una expresión regular
- [preg_grep](#function.preg-grep) — Devuelve un array con los resultados de la búsqueda
- [preg_last_error](#function.preg-last-error) — Devuelve el código de error de la última expresión PCRE ejecutada
- [preg_last_error_msg](#function.preg-last-error-msg) — Devuelve el mensaje de error de la última ejecución de regex PCRE
- [preg_match](#function.preg-match) — Realiza una búsqueda de coincidencia con una expresión regular estándar
- [preg_match_all](#function.preg-match-all) — Expresión regular global
- [preg_quote](#function.preg-quote) — Protección de caracteres especiales de expresiones regulares
- [preg_replace](#function.preg-replace) — Buscar y reemplazar mediante expresión regular estándar
- [preg_replace_callback](#function.preg-replace-callback) — Buscar y reemplazar mediante expresión regular estándar utilizando una función de retrollamada
- [preg_replace_callback_array](#function.preg-replace-callback-array) — Realiza una búsqueda de coincidencia con una expresión regular y reemplaza mediante una función de devolución de llamada
- [preg_split](#function.preg-split) — Divide una cadena mediante expresión regular
  </li>
