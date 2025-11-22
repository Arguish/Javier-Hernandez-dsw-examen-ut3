# Conceptos básicos

# ¿Qué es PHP y qué puede hacer?

# ¿Qué es PHP?

PHP (oficialmente, este sigle es un acrónimo recursivo para
_PHP Hypertext Preprocessor_) es un lenguaje de scripts generalista
y Open Source, especialmente concebido para el desarrollo de aplicaciones
web. Puede ser integrado fácilmente al HTML.

Bien... pero ¿qué significa esto? Un ejemplo:

    **Ejemplo #1 Ejemplo de introducción**

&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Ejemplo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
echo "Hola, soy un script PHP!";
?&gt;

&lt;/body&gt;
&lt;/html&gt;

En lugar de utilizar toneladas de comandos para mostrar HTML (como en
C o en Perl), las páginas PHP contienen fragmentos HTML con código que hace "algo" (en este caso, mostrará
"Hola, soy un script PHP!").
El código PHP está incluido entre
[una etiqueta de inicio
&lt;?php y una etiqueta de fin ?&gt;](#language.basic-syntax.phpmode)
que permiten al servidor web pasar al modo PHP.

Lo que distingue a PHP de los lenguajes de script como JavaScript,
es que el código se ejecuta en el servidor, generando así el HTML, que
será luego enviado al cliente. El cliente solo recibe el
resultado del script, sin ningún medio de acceso al código
que produjo dicho resultado. Se puede configurar el servidor web para que analice todos los ficheros HTML como ficheros PHP.
Así, no hay manera de distinguir las páginas que son producidas
dinámicamente de las páginas estáticas. Un servidor web puede incluso ser configurado
para procesar todos los ficheros HTML con PHP, y no hay
manera para los usuarios de saber que PHP está siendo utilizado.

La gran ventaja de PHP es que es extremadamente simple para los
principiantes, pero ofrece funcionalidades avanzadas para los
expertos. No tema leer la larga lista de funcionalidades
PHP. Con PHP, casi todo el mundo puede comenzar rápidamente
y escribir scripts simples en poco tiempo.

Aunque el desarrollo de PHP está orientado hacia la programación
para sitios web, se puede hacer mucho más con PHP.
Lea la sección [¿Qué puede hacer PHP?](#intro-whatcando)
o el [tutorial de introducción](#tutorial) para pasar directamente
al aprendizaje de la programación web.

## ¿Qué puede hacer PHP?

Todo. PHP está principalmente concebido para servir como
lenguaje de script del lado del servidor, por lo que puede hacer todo lo que cualquier otro programa CGI puede hacer, como
recolectar datos de formularios, generar contenido dinámico,
o gestionar cookies. Pero PHP puede hacer mucho más.

Hay dos ámbitos diferentes donde PHP puede destacar.

    -

      Lenguaje de script del lado del servidor. Este es el uso más
      tradicional, y también el principal objetivo de PHP.
      Tres componentes son necesarios para explotarlo:
      un analizador PHP (CGI o módulo del servidor), un servidor
      web y un navegador web. Se debe ejecutar el servidor
      web en correlación con PHP. Se puede acceder
      al programa PHP con la ayuda del navegador web. Todo esto
      puede funcionar en una máquina local solo para experimentar
      la programación PHP. Vea la
      sección [de instalación](#install)
      para más información.



    -

      Lenguaje de programación en línea de comandos. Un script PHP puede ser
      ejecutado en línea de comandos,
      sin la ayuda del servidor web y de un navegador. Solo se necesita
      el ejecutable PHP. Este uso es ideal para los scripts que se ejecutan regularmente
      con un **cron** en Unix o Linux o
      un gestor de tareas (en Windows). Estos scripts
      también pueden ser utilizados para realizar operaciones en ficheros de texto. Vea la sección sobre el uso de PHP en
      [línea de comandos](#features.commandline)
      para más información.


PHP es [utilizable](#install) en la mayoría de los sistemas
operativos, como Linux, muchas variantes Unix (incluyendo HP-UX,
Solaris y OpenBSD), Microsoft Windows, macOS, RISC OS y otros más.
PHP también soporta la mayoría de los servidores web actuales como
Apache, IIS y muchos otros. Y esto incluye todos los servidores web
que pueden utilizar el binario PHP FastCGI, como lighttpd
y nginx. PHP funciona como módulo, o como procesador CGI.

Con PHP, los desarrolladores tienen la opción del sistema operativo y
del servidor web. Además, también tienen la opción de utilizar
la programación procedimental u orientada a objetos (OOP), o incluso una mezcla de
ambas.

Con PHP, no se limita a la producción de código HTML. Las capacidades de PHP incluyen
la creación de tipos de ficheros ricos, como imágenes o ficheros PDF, el cifrado de datos
y el envío de correos electrónicos. También puede generar fácilmente cualquier texto, como JSON
o XML. PHP puede generar automáticamente estos ficheros y guardarlos en
el sistema de ficheros en lugar de imprimirlos, formando así una caché del lado del servidor para
contenido dinámico.

Una de las fortalezas más significativas de PHP es que soporta
[enormemente bases de datos](#refs.database).
Escribir una página web que utilice una base de datos se vuelve
extremadamente simple, utilizando una de las extensiones específicas
para bases de datos (i.e., para [mysql](#book.mysqli)),
o utilizando una clase de abstracción como [PDO](#book.pdo),
o una conexión a cualquier base de datos que soporte la conexión
estándar abierta a través de la extensión [ODBC](#book.uodbc).
Otras bases de datos pueden utilizar la extensión
[cURL](#book.curl) o [sockets](#book.sockets)
como CouchDB.

PHP soporta numerosos protocolos como
LDAP, IMAP, SNMP, NNTP, POP3, HTTP, COM (en Windows) y
muchos otros. También puede abrir sockets de red,
e interactuar con cualquier otro protocolo. PHP soporta
el formato complejo WDDX, que permite la comunicación entre todos
los lenguajes web. En términos de interconexión, PHP también soporta
los objetos Java, y los utiliza de manera transparente
como objetos integrados.

PHP posee funcionalidades útiles en el
[tratamiento de texto](#refs.basic.text),
incluyendo las expresiones regulares compatibles con Perl ([PCRE](#book.pcre)),
así como un gran número de extensiones y utilidades para
[analizar y acceder a documentos XML](#refs.xml).
PHP estandariza todas las extensiones XML sobre la sólida base de [libxml2](#book.libxml),
y extiende el conjunto de funcionalidades añadiendo soporte para
[SimpleXML](#book.simplexml), [XMLReader](#book.xmlreader)
y [XMLWriter](#book.xmlwriter).

Muchas otras extensiones existen, categorizadas
[alfabéticamente](#extensions) y por [categoría](#funcref).
Y finalmente, existen [extensiones PECL](#install.pecl.intro) que pueden (o no) estar documentadas
en el manual PHP, como [» XDebug](http://xdebug.org/).

Esta página no es lo suficientemente grande para listar
todas las potentes funcionalidades de PHP. Lea la sección
sobre [la instalación de PHP](#install)
y estudie la [lista de funciones](#funcref)
para obtener más detalles sobre todas estas tecnologías.

# Una introducción a PHP

## Tabla de contenidos

- [Su primera página PHP](#tutorial.firstpage)
- [Trucos prácticos](#tutorial.useful)
- [Utilizar un formulario](#tutorial.forms)
- [¿Y después?](#tutorial.whatsnext)

    En esta sección, se pretende ilustrar los principios básicos
    de PHP en una breve introducción. Este capítulo trata únicamente
    de la creación de páginas web dinámicas con PHP, dejando de lado
    temporalmente las otras posibilidades de PHP. Consulte la sección
    [¿Qué puede hacer PHP?](#intro-whatcando) para
    más información.

    Las páginas web que utilizan PHP se tratan como páginas HTML clásicas,
    y se pueden crear, editar y borrar de la misma manera que normalmente se crean
    las páginas HTML clásicas.

    ## Su primera página PHP

    Este tutorial presupone que PHP ya está instalado.
    Las instrucciones de instalación se pueden encontrar en la
    [» página de descargas](https://www.php.net/downloads.php).

    Cree un fichero llamado hola.php
    con el siguiente contenido :

    **Ejemplo #1 Nuestro primer script PHP : hola.php**

&lt;?php

echo "¡Hola Mundo!";

?&gt;

      Usando su terminal, navegue hasta el directorio que contiene este fichero y
      inicie un servidor de desarrollo con el siguiente comando:





php -S localhost:8000

      Utilice su navegador para acceder al fichero utilizando la URL de su servidor web, terminando
      por la referencia al fichero /hola.php.
      De acuerdo con el comando ejecutado anteriormente, la URL será
      http://localhost:8000/hello.php.
      Si todo está correctamente configurado, este fichero será analizado por PHP
      y se verá el mensaje "¡Hola Mundo!" en su navegador.




      PHP puede ser integrado en una página web HTML normal. Esto significa que, en su documento HTML,
      se pueden escribir instrucciones PHP, como se demuestra en el siguiente ejemplo:





&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Prueba PHP&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;?php echo '&lt;p&gt;Hola mundo&lt;/p&gt;'; ?&gt;
&lt;/body&gt;
&lt;/html&gt;

      Esto producirá el siguiente resultado :





&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Prueba PHP&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;Hola mundo&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

    Este programa es extremadamente simple y no se necesita PHP
    para crear una página web como esta. Solo muestra
    Hola mundo, gracias a la función
    [echo](#function.echo)
    de PHP. Note que este fichero *no necesita ser ejecutable*
    ni nada más, en ningún caso. El servidor sabe que este fichero necesita ser interpretado
    por PHP, porque se utiliza la extensión ".php", y el servidor está configurado para
    pasarlos a PHP. Considere esto como una página HTML normal que contiene una serie
    de etiquetas especiales que le permitirán realizar muchas cosas interesantes.





    El punto importante de este ejemplo era mostrar el formato de las
    etiquetas especiales PHP. Hemos utilizado aquí
    &lt;?php para indicar el inicio de la etiqueta PHP.
    Luego, introdujimos los comandos PHP y cerramos las etiquetas
    PHP con ?&gt;. Se puede pasar del modo PHP
    al modo HTML y viceversa, de esta manera, y a su gusto. Para más
    información, lea la sección del manual sobre la
    [sintaxis básica de PHP](#language.basic-syntax).

**Nota**:
**Una nota sobre los retornos de línea**

     Los retornos de línea tienen un significado mínimo en HTML, sin embargo,
     siempre es una buena idea hacer que su HTML sea lo más bonito y cercano
     posible añadiendo retornos de línea. Un retorno de línea que sigue inmediatamente a una etiqueta de cierre PHP (?&gt;)
     será eliminado por PHP. Esto puede ser realmente muy útil cuando se insertan varios bloques PHP o ficheros incluidos que contienen PHP que
     no está destinado a mostrar nada. Al mismo tiempo, puede ser confuso. Se puede añadir un espacio después de la etiqueta de cierre
     PHP (?&gt;) para forzar el espacio y un retorno de línea a mostrarse, o se puede añadir explícitamente un retorno de línea
     en el último echo/print de su bloque PHP.

**Nota**:
**Una nota sobre los editores de texto**

     Existen muchos editores de texto y entornos de
     desarrollo (IDE) que se pueden utilizar para crear, editar
     y gestionar sus aplicaciones PHP. Una lista parcial de estas herramientas
     se mantiene en la dirección
     [» PHP Editor's List](http://en.wikipedia.org/wiki/List_of_PHP_editors).
     Si desea recomendar un editor en particular, visite
     esta página y pida al webmaster que añada su editor. Tener al menos
     un editor de texto con coloración de sintaxis es altamente recomendado.

**Nota**:
**Una nota sobre los procesadores de texto**

     Los procesadores de texto como StarOffice Writer, Microsoft Word y
     Abiword son muy malas opciones para editar scripts PHP.
     Si desea utilizar uno de ellos, a pesar de todo, para probar sus
     scripts, debe asegurarse de que guarda los ficheros en formato
     de texto solo (*plain text*) : de lo contrario, PHP no será capaz de leer
     y ejecutar estos scripts.






    Ahora que ha creado un script PHP que funciona, es el momento
    de crear el mejor script PHP ! Haga una llamada a la función
    [phpinfo()](#function.phpinfo) y verá mucha información
    interesante sobre su sistema y su configuración como las
    [variables predefinidas disponibles](#language.variables.predefined),
    los módulos PHP cargados así como la [configuración](#configuration).
    Tómese el tiempo para revisar esta información importante.







     **Ejemplo #2 Recuperación de la información del sistema desde PHP**




&lt;?php

phpinfo();

?&gt;

## Trucos prácticos

    Realicemos ahora algo más potente. Vamos
    a verificar el tipo de navegador que el visitante de nuestro sitio utiliza.
    Para ello, accederemos a la información que el navegador
    del visitante nos envía, durante su petición HTTP. Esta información
    se almacena en una [variable](#language.variables).
    Las variables son fáciles de identificar, ya que todas comienzan
    con un signo dólar. La variable que nos interesa aquí es
    [$_SERVER['HTTP_USER_AGENT']](#reserved.variables.server).

**Nota**:

     [$_SERVER](#reserved.variables.server) es una
     variable especial de PHP, que contiene toda la información
     relativa al servidor web. Es una variable reservada de PHP,
     y una superglobal. Consulte las páginas del manual que tratan de las
     [Auto-globales](#language.variables.superglobals)
     (también conocidas como super-globales).





    Para mostrar esta variable, simplemente se puede hacer :







    **Ejemplo #1 Mostrar el contenido de una variable (elemento de array)**

&lt;?php

echo $\_SERVER['HTTP_USER_AGENT'];

?&gt;

     Un resultado posible del script podría ser :

Mozilla/5.0 (Linux) Firefox/112.0

    Hay muchos [tipos](#language.types) de
    variables disponibles en PHP. En el ejemplo anterior, hemos mostrado
    un elemento de una variable [Array](#language.types.array).
    Los arrays pueden ser muy útiles.




    [$_SERVER](#reserved.variables.server) es simplemente una variable que está automáticamente
    disponible en su script. Una lista de todas las variables que están
    disponibles se proporciona en la sección
    [Variables reservadas](#reserved.variables) o también se puede obtener una lista completa leyendo la salida de la función
    [phpinfo()](#function.phpinfo) utilizada en el ejemplo de la sección anterior.




    Se pueden añadir varios comandos PHP en una etiqueta PHP, y crear
    pequeños bloques de código que realizan operaciones más complejas
    que un simple mostrado. Por ejemplo, si queremos verificar que el
    navegador es de la familia Firefox, se puede
    hacer esto :







     **Ejemplo #2 Ejemplo utilizando las
     [estructuras de control](#language.control-structures) y
     las [funciones](#language.functions)**




&lt;?php

if (str_contains($\_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
echo 'Está utilizando Firefox.';
}

?&gt;

      El resultado de este script, si está utilizando Firefox, será :





Está utilizando Firefox.

    Aquí, introducimos varios nuevos conceptos. Tenemos una
    estructura [if](#control-structures.if).
    Si está familiarizado con las sintaxis básicas del lenguaje C, esto
    no le sorprenderá. Si no conoce lo suficiente el lenguaje C o
    otro lenguaje cuya sintaxis sea similar a la anterior, sería mejor
    que leyera una introducción a PHP, y asimilara
    los primeros capítulos, o bien lea el capítulo dedicado a
    [la referencia del lenguaje](#langref).




    El segundo concepto que hemos introducido es la función [str_contains()](#function.str-contains).
    [str_contains()](#function.str-contains) es una función interna de PHP, que determina
    la presencia de una cadena dada en otra. En nuestro caso, hemos buscado la cadena "Firefox" en la cadena
    [$_SERVER['HTTP_USER_AGENT']](#reserved.variables.server).
    De lo contrario, devuelve **[false](#constant.false)**.
    Si devuelve **[true](#constant.true)** la estructura [if](#control-structures.if)
    recibe **[true](#constant.true)** y el código entre llaves {} se ejecuta. De lo contrario, el código no se
    ejecuta. No dude en
    experimentar con otros ejemplos, utilizando
    [if](#control-structures.if),
    [else](#control-structures.else), y otras
    funciones como [strtoupper()](#function.strtoupper) y
    [strlen()](#function.strlen). Cada página de la documentación también contiene ejemplos. Si no está seguro del uso de estas funciones, debe leer
    la página del manual
    "[cómo leer una definición de función](#about.prototypes)"
    así como la [sección sobre las funciones PHP](#language.functions).




    Ahora podemos avanzar y mostrarle cómo utilizar el modo PHP,
    en medio del código HTML :







     **Ejemplo #3 Pasar del modo PHP al modo HTML y viceversa**




&lt;?php
if (str_contains($\_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
?&gt;
&lt;h3&gt;str_contains() ha devuelto true&lt;/h3&gt;
&lt;p&gt;Está utilizando Firefox&lt;/p&gt;
&lt;?php
} else {
?&gt;
&lt;h3&gt;str_contains() ha devuelto false&lt;/h3&gt;
&lt;p&gt;No está utilizando Firefox&lt;/p&gt;
&lt;?php
}
?&gt;

      Un ejemplo de resultado obtenido en este script es :





&lt;h3&gt;str_contains() ha devuelto true&lt;/h3&gt;
&lt;p&gt;Está utilizando Firefox&lt;/p&gt;

    En lugar de utilizar un comando [echo](#function.echo), para mostrar
    texto, se puede utilizar código HTML puro. El punto importante a tener en cuenta
    aquí es que la lógica de programación se conserva. Solo uno de los dos
    bloques HTML se mostrará, según el resultado de la función [str_contains()](#function.str-contains).
    En otras palabras, depende de si la cadena Firefox
    ha sido encontrada o no.

## Utilizar un formulario

    Uno de los puntos fuertes de PHP es su capacidad para manejar formularios.
    El concepto básico que es importante entender es que todos los
    campos de un formulario estarán automáticamente disponibles en el
    script PHP de acción. Lea el capítulo del manual relativo a las
    [variables desde fuentes externas a PHP](#language.variables.external)
    para más información y ejemplos sobre cómo utilizar los
    formularios. Aquí hay un ejemplo de formulario HTML :







     **Ejemplo #1 Un formulario HTML simple**




&lt;form action="action.php" method="post"&gt;
&lt;label&gt;Su nombre :&lt;/label&gt;
&lt;input name="nombre" id="nombre" type="text" /&gt;

&lt;label&gt;Su edad :&lt;/label&gt;
&lt;input name="edad" id="edad" type="number" /&gt;&lt;/p&gt;

&lt;button type="submit"&gt;Validar&lt;/button&gt;
&lt;/form&gt;

    No hay nada especial en este formulario. Está en HTML
    puro, sin ninguna configuración especial. Cuando el visitante
    rellena el formulario, y hace clic en el botón OK, se llama al fichero action.php. En este
    fichero, se puede escribir el siguiente script :







     **Ejemplo #2 Mostrar datos de un formulario**




Hola, &lt;?php echo htmlspecialchars($\_POST['nombre']); ?&gt;.
Tienes &lt;?php echo (int) $\_POST['edad']; ?&gt; años.

      Aquí está el resultado que podría obtener, según
      los valores que haya introducido :





Hola Juan.
Tienes 29 años.

    Aparte de las partes [htmlspecialchars()](#function.htmlspecialchars) y
    (int), este script solo hace cosas evidentes.
    [htmlspecialchars()](#function.htmlspecialchars) se asegura de que todos los caracteres
    especiales HTML se codifiquen correctamente para evitar inyecciones
    de etiquetas HTML y de Javascript en sus páginas. Para la edad, dado que
    sabemos que es un entero, se puede
    [convertir](#language.types.typecasting) en un
    [int](#language.types.integer). También se puede pedir a PHP que lo haga
    automáticamente por usted utilizando la extensión
    [filter](#ref.filter).
    Las variables [$_POST['nombre']](#reserved.variables.post) y
    [$_POST['edad']](#reserved.variables.post) son creadas automáticamente por PHP.
    Un poco antes en este tutorial, hemos utilizado la variable
    [$_SERVER](#reserved.variables.server), una superglobal. Ahora, hemos introducido otra superglobal [$_POST](#reserved.variables.post)
    que contiene todos los datos enviados por el método POST. Tenga en cuenta que
    en nuestro formulario, hemos elegido el *método* POST.
    Si hubiéramos utilizado el *método* GET entonces nuestro formulario
    habría colocado esta información en la variable [$_GET](#reserved.variables.get),
    otra superglobal. También se puede utilizar la variable
    [$_REQUEST](#reserved.variables.request), si no desea preocuparse por el método utilizado. Contiene
    una mezcla de los datos de GET, POST, COOKIE y FILE.

## ¿Y después?

    Con lo que sabe, ahora es capaz de comprender
    lo esencial de la documentación PHP, y los diferentes scripts de ejemplo
    disponibles en los archivos.




    Diferentes presentaciones de las capacidades de PHP están disponibles en el
    sitio de las conferencias PHP :
    [» http://talks.php.net/](http://talks.php.net/).

- [Introducción](#introduction) — ¿Qué es PHP y qué puede hacer?
- [Una introducción a PHP](#tutorial)<li>[Su primera página PHP](#tutorial.firstpage)
- [Trucos prácticos](#tutorial.useful)
- [Utilizar un formulario](#tutorial.forms)
- [¿Y después?](#tutorial.whatsnext)
  </li>
