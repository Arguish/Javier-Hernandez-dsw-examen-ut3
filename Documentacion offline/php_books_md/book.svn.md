# Subversion

# Introducción

Esta extensión implementa las funciones PHP para
[» Subversion](http://subversion.apache.org/) (SVN), un sistema de control
de versiones, permitiendo a los scripts PHP comunicarse con los repositorios SVN
y las copias de trabajo, sin utilizar directamente llamadas a los ejecutables
svn.

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#svn.requirements)
- [Instalación](#svn.installation)

    ## Requerimientos

    Los binarios de Subversion no son necesarios para usar esta
    extensión. Sin embargo, cuando compile la extensión, libsvn
    (las cabeceras de Subversion) debe estar disponible.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/svn](https://pecl.php.net/package/svn)

Si ./configure está teniendo problemas para encontrar los
archivos SVN (Por ejemplo, Subversion fue instalado con un prefijo de directorio
diferente), use
**./configure --with-svn=$USR_PATH**
para especificar el directorio donde
include/subversion-1/ está ubicado.

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

**Advertencia**

Si la extensión es compilada contra libsvn 1.3,
las funciones que trabajan con copias fallarán
cuando trabaje en copias creadas por Subversion 1.4.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[SVN_REVISION_HEAD](#constant.svn-revision-head)**
    ([int](#language.types.integer))



     Número mágico (-1) especificando la revisión HEAD

**Constantes usables con [svn_auth_set_parameter()](#function.svn-auth-set-parameter)**

    **[SVN_AUTH_PARAM_DEFAULT_USERNAME](#constant.svn-auth-param-default-username)**
    ([string](#language.types.string))



     Proiedad para el nombre de usuario por omisión a ser usada cuando realice una autenticación básica





    **[SVN_AUTH_PARAM_DEFAULT_PASSWORD](#constant.svn-auth-param-default-password)**
    ([string](#language.types.string))



     Propiedad para la clave por omisión a ser usada cuando realice una autenticación básica





    **[SVN_AUTH_PARAM_NON_INTERACTIVE](#constant.svn-auth-param-non-interactive)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_DONT_STORE_PASSWORDS](#constant.svn-auth-param-dont-store-passwords)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_NO_AUTH_CACHE](#constant.svn-auth-param-no-auth-cache)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_SSL_SERVER_FAILURES](#constant.svn-auth-param-ssl-server-failures)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_SSL_SERVER_CERT_INFO](#constant.svn-auth-param-ssl-server-cert-info)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_CONFIG](#constant.svn-auth-param-config)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_SERVER_GROUP](#constant.svn-auth-param-server-group)**
    ([string](#language.types.string))





    **[SVN_AUTH_PARAM_CONFIG_DIR](#constant.svn-auth-param-config-dir)**
    ([string](#language.types.string))





    **[PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS](#constant.php-svn-auth-param-ignore-ssl-verify-errors)**
    ([string](#language.types.string))



     Propiedad personalizada para ignorar los errores de verificación del certificado SSL

**Constantes del sistema de archivos**

    **[SVN_FS_CONFIG_FS_TYPE](#constant.svn-fs-config-fs-type)**
    ([string](#language.types.string))



     Llave de configuración que determina el tipo de sistema de archivos





    **[SVN_FS_TYPE_BDB](#constant.svn-fs-type-bdb)**
    ([string](#language.types.string))



     Sistema de archivos es una implemetación Berkeley-DB





    **[SVN_FS_TYPE_FSFS](#constant.svn-fs-type-fsfs)**
    ([string](#language.types.string))



     Implementación del sistema de ficheros nativo

**Constantes de propiedad reservadas**

    **[SVN_PROP_REVISION_DATE](#constant.svn-prop-revision-date)**
    ([string](#language.types.string))



     svn:date





    **[SVN_PROP_REVISION_ORIG_DATE](#constant.svn-prop-revision-orig-date)**
    ([string](#language.types.string))



     svn:original-date





    **[SVN_PROP_REVISION_AUTHOR](#constant.svn-prop-revision-author)**
    ([string](#language.types.string))



     svn:author





    **[SVN_PROP_REVISION_LOG](#constant.svn-prop-revision-log)**
    ([string](#language.types.string))



     svn:log

**constantes de trabajo con status de copias**

    **[SVN_WC_STATUS_NONE](#constant.svn-wc-status-none)**
    ([int](#language.types.integer))



     Status no existe





    **[SVN_WC_STATUS_UNVERSIONED](#constant.svn-wc-status-unversioned)**
    ([int](#language.types.integer))



     El artículo no está versionado en la copia de trabajo





    **[SVN_WC_STATUS_NORMAL](#constant.svn-wc-status-normal)**
    ([int](#language.types.integer))



     El artículo existe, nada más está ocurriendo





    **[SVN_WC_STATUS_ADDED](#constant.svn-wc-status-added)**
    ([int](#language.types.integer))



     El artículo está programado para su adición





    **[SVN_WC_STATUS_MISSING](#constant.svn-wc-status-missing)**
    ([int](#language.types.integer))



     El artículo está versionado pero la copia de trabajo está ausante





    **[SVN_WC_STATUS_DELETED](#constant.svn-wc-status-deleted)**
    ([int](#language.types.integer))



     El artículo está programado para ser borrado





    **[SVN_WC_STATUS_REPLACED](#constant.svn-wc-status-replaced)**
    ([int](#language.types.integer))



     El artículo fue borrado y luego re-agregado





    **[SVN_WC_STATUS_MODIFIED](#constant.svn-wc-status-modified)**
    ([int](#language.types.integer))



     El artículo (texto o propiedades) fue modificado





    **[SVN_WC_STATUS_MERGED](#constant.svn-wc-status-merged)**
    ([int](#language.types.integer))



     Las modificaciones locales del artículo fueron unidas con las modificaciones del repositorio





    **[SVN_WC_STATUS_CONFLICTED](#constant.svn-wc-status-conflicted)**
    ([int](#language.types.integer))



     Las modificaciones locales del artículo discreparon con las modificaciones de repositorio





    **[SVN_WC_STATUS_IGNORED](#constant.svn-wc-status-ignored)**
    ([int](#language.types.integer))



     El artículo está desversionado pero configurado para ser ignorado





    **[SVN_WC_STATUS_OBSTRUCTED](#constant.svn-wc-status-obstructed)**
    ([int](#language.types.integer))



     Artículo desversionado está en el camino de un recurso versionado





    **[SVN_WC_STATUS_EXTERNAL](#constant.svn-wc-status-external)**
    ([int](#language.types.integer))



     Rura desversionada que está poblada usando svn:externals





    **[SVN_WC_STATUS_INCOMPLETE](#constant.svn-wc-status-incomplete)**
    ([int](#language.types.integer))



     El directorio no contiene la lista completa de  entradas

**Node type constants**

    **[SVN_NODE_NONE](#constant.svn-node-none)**
    ([int](#language.types.integer))



     Ausente





    **[SVN_NODE_FILE](#constant.svn-node-file)**
    ([int](#language.types.integer))



     Archivo





    **[SVN_NODE_DIR](#constant.svn-node-dir)**
    ([int](#language.types.integer))



     Directorio





    **[SVN_NODE_UNKNOWN](#constant.svn-node-unknown)**
    ([int](#language.types.integer))



     Algo que la subversión no puede identificar

# Funciones SVN

# svn_add

(PECL svn &gt;= 0.1.0)

svn_add — Prevé la adición de un elemento en el directorio de trabajo

### Descripción

**svn_add**([string](#language.types.string) $path, [bool](#language.types.boolean) $recursive = **[true](#constant.true)**, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [bool](#language.types.boolean)

Añade un fichero, un directorio o un enlace simbólico, utilizando
la ruta path en el directorio de trabajo.
El elemento será añadido al repositorio en la próxima llamada a la función
[svn_commit()](#function.svn-commit) sobre la copia de trabajo.

### Parámetros

     path


       Ruta del elemento a añadir.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     recursive


       Si el elemento es un directorio, si se debe o no añadir
       recursivamente todo su contenido. Por omisión, vale **[true](#constant.true)**






     force


       Si vale **[true](#constant.true)**, Subversion buscará recursivamente en los directorios
       versionados existentes para añadir todos los ficheros que
       actualmente no están versionados. Por omisión, vale **[false](#constant.false)**





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con svn_add()**



     En un directorio de trabajo donde el comando **svn status**
     devuelve:

$ svn status
? foobar.txt

    ...este código:

&lt;?php
svn_add('foobar.txt');
?&gt;

     ...marcará el fichero foobar.txt como fichero a añadir
     en el directorio.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [» Documentación SVN sobre el comando "svn add"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.add.html)

# svn_auth_get_parameter

(PECL svn &gt;= 0.1.0)

svn_auth_get_parameter — Recupera un parámetro de identificación

### Descripción

**svn_auth_get_parameter**([string](#language.types.string) $key): [string](#language.types.string)

Recupera el parámetro de identificación cuya clave es
key.
Para una lista de claves válidas y sus significados, consulte
la [lista de constantes de identificación](#svn.constants.auth).

### Parámetros

     key


       Nombre de la clave. Utilice una [constante de identificación](#svn.constants.auth) definida
       por esta extensión para especificar una clave.





### Valores devueltos

Devuelve el valor del parámetro cuya clave es key;
devuelve **[null](#constant.null)** si el parámetro no existe.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_auth_set_parameter()](#function.svn-auth-set-parameter) - Especifica un parámetro de autenticación

    - [Constantes de identificación](#svn.constants.auth)

# svn_auth_set_parameter

(PECL svn &gt;= 0.1.0)

svn_auth_set_parameter — Especifica un parámetro de autenticación

### Descripción

**svn_auth_set_parameter**([string](#language.types.string) $key, [string](#language.types.string) $value): [void](language.types.void.html)

Especifica el parámetro de autenticación key con
el valor value.
Para una lista de claves válidas y sus significados,
consulte la [lista de
constantes de autenticación](#svn.constants.auth).

### Parámetros

     key


       Nombre de la clave. Utilice una [constante de autenticación](#svn.constants.auth)
       definida por esta extensión para especificar la clave.






     value


       Valor a establecer para la nueva clave. El formato del valor
       varía según el parámetro.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de autenticación**



     Este ejemplo configura SVN con el nombre de usuario "Bob" y
     la contraseña "abc123":

&lt;?php
svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, 'Bob');
svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, 'abc123');
?&gt;

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_auth_get_parameter()](#function.svn-auth-get-parameter) - Recupera un parámetro de identificación

    - [Constantes de autenticación](#svn.constants.auth)

# svn_blame

(PECL svn &gt;= 0.3.0)

svn_blame — Obtiene las acusaciones SVN de un archivo

### Descripción

**svn_blame**([string](#language.types.string) $repository_url, [int](#language.types.integer) $revision_no = SVN_REVISION_HEAD): [array](#language.types.array)

Obtiene las acusaciones SVN de un archivo desde una URL de repositorio.

### Parámetros

     repository_url


       La URL del repositorio.






     revision_no


       El número de revisión.





### Valores devueltos

Un [array](#language.types.array) con la información de acuses SVN separados por línea
incluyendo los números de revisión, número de línea, línea de codigo,
autor, y fecha.

### Ejemplos

    **Ejemplo #1 Ejemplo de svn_blame()**

&lt;?php
$svnurl = 'http://svn.example.org/svnroot/foo/trunk/index.php';

print_r( svn_blame($svnurl) );

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] = Array
(
[rev] = 1
[line_no] = 1
[line] = Hello World
[author] = joesmith
[date] = 2007-07-02T05:51:26.628396Z
)
[1] = Array
...

### Ver también

    - [svn_diff()](#function.svn-diff) - Comparar dos rutas de forma recursiva

    - **svn_logs()**

    - [svn_status()](#function.svn-status) - Obtiene el estado de los ficheros y directorios de la copia de trabajo

# svn_cat

(PECL svn &gt;= 0.1.0)

svn_cat — Recupera el contenido de un fichero del repositorio

### Descripción

**svn_cat**([string](#language.types.string) $repos_url, [int](#language.types.integer) $revision_no = ?): [string](#language.types.string)

Recupera el contenido del fichero apuntado por la URL repos_url
del repositorio, opcionalmente, en la revisión revision_no.

### Parámetros

     repos_url


       URL del elemento del repositorio.






     revision_no


       Número de revisión del elemento a recuperar; por omisión, es HEAD.





### Valores devueltos

Devuelve el contenido del elemento desde el repositorio en caso de éxito,
y **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo recupera el contenido de un fichero, en la revisión 28:

&lt;?php
$contents = svn_cat('http://www.example.com/svnroot/calc/gui.c', 28)
?&gt;

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - **svn_list()**

    - [» Documentación SVN sobre el comando "svn cat"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.cat.html)

# svn_checkout

(PECL svn &gt;= 0.1.0)

svn_checkout — Extrae una copia de trabajo desde un repositorio

### Descripción

**svn_checkout**(
    [string](#language.types.string) $repos,
    [string](#language.types.string) $targetpath,
    [int](#language.types.integer) $revision = ?,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Extrae una copia de trabajo desde el repositorio repos
hacia targetpath en la revisión revision.

### Parámetros

     repos


       URL del directorio en el repositorio a extraer.






     targetpath


       Ruta local del directorio en el cual se realiza la extracción



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     revision


       Número de revisión del repositorio a extraer. Por omisión, es
       HEAD, la revisión más reciente.






     flags


       Cualquier combinación de **[SVN_NON_RECURSIVE](#constant.svn-non-recursive)** y
       **[SVN_IGNORE_EXTERNALS](#constant.svn-ignore-externals)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo muestra cómo extraer un directorio desde un
     repositorio hacia un directorio llamado "calc":

&lt;?php
svn_checkout('http://www.example.com/svnroot/calc/trunk', dirname(**FILE**) . '/calc');
?&gt;

     El uso de dirname(__FILE__) es necesario
     para convertir la ruta relativa del directorio calc en una ruta absoluta.
     Si calc existe, asimismo se puede utilizar [realpath()](#function.realpath)
     para obtener una ruta absoluta.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_add()](#function.svn-add) - Prevé la adición de un elemento en el directorio de trabajo

    - [svn_commit()](#function.svn-commit) - Envía los cambios desde la copia local al repositorio

    - [svn_status()](#function.svn-status) - Obtiene el estado de los ficheros y directorios de la copia de trabajo

    - [svn_update()](#function.svn-update) - Actualiza la copia de trabajo

    - [» Documentación SVN sobre el comando "svn checkout"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.checkout.html)

# svn_cleanup

(PECL svn &gt;= 0.1.0)

svn_cleanup — Limpia, de forma recursiva, un directorio de trabajo, finalizando las operaciones incompletas y eliminando los bloqueos

### Descripción

**svn_cleanup**([string](#language.types.string) $workingdir): [bool](#language.types.boolean)

Limpia, de forma recursiva, un directorio de trabajo workingdir,
finalizando las operaciones incompletas y eliminando los bloqueos. Se debe utilizar
cuando la copia de trabajo ya no es funcional.

### Parámetros

     workingdir


       Ruta al directorio local de trabajo a limpiar.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo muestra cómo limpiar una copia de trabajo de
     un directorio llamado "help-me":

&lt;?php
svn_cleanup(realpath('help-me'));
?&gt;

     La función [realpath()](#function.realpath) debe ser llamada, debido a
     la mala gestión de las rutas relativas por parte de SVN.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - **update()**

    - [» Documentación SVN sobre el comando "svn cleanup"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.cleanup.html)

# svn_client_version

(PECL svn &gt;= 0.1.0)

svn_client_version — Obtiene la versión de las bibliotecas cliente SVN

### Descripción

**svn_client_version**(): [string](#language.types.string)

Obtiene la versión de las bibliotecas cliente SVN.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Número de la versión, habitualmente en el formato x.y.z.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**

&lt;?php
echo svn_client_version();
?&gt;

    Resultado del ejemplo anterior es similar a:

1.3.1

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_commit

(PECL svn &gt;= 0.1.0)

svn_commit — Envía los cambios desde la copia local al repositorio

### Descripción

**svn_commit**([string](#language.types.string) $log, [array](#language.types.array) $targets, [bool](#language.types.boolean) $recursive = **[true](#constant.true)**): [array](#language.types.array)

Envía los cambios realizados en los ficheros locales enumerados
por el array targets al repositorio, con el mensaje
log. Los directorios contenidos en el array
targets serán enviados recursivamente a menos que el
parámetro recursive haya sido definido como **[false](#constant.false)**.

**Nota**:

    Esta función no contiene ningún parámetro específico de identificación,
    por lo tanto, el nombre de usuario y la contraseña deben ser definidos
    utilizando la función [svn_auth_set_parameter()](#function.svn-auth-set-parameter)

### Parámetros

     log


       Mensaje de registro a utilizar durante el envío.






     targets


       Array de rutas locales de los ficheros a enviar.



      **Advertencia**

        Este parámetro debe ser un array; una string para un único
        objetivo no es aceptada.




      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     recursive


       Flag de tipo booleano para desactivar la recursividad
       al enviar directorios en el array targets.
       Por omisión, vale **[true](#constant.true)**.





### Valores devueltos

Devuelve un array, en el siguiente formato:

array(
0 =&gt; número (integer) de revisión del envío
1 =&gt; fecha y hora (formato ISO 8601) del envío
2 =&gt; nombre de usuario de la persona que envió
)

Devuelve **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo envía el directorio "calculator" al repositorio, utilizando
     como nombre de usuario "Bob" y como contraseña "abc123":

&lt;?php
svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, 'Bob');
svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, 'abc123');
var_dump(svn_commit('Mensaje de registro de Bob', array(realpath('calculator'))));
?&gt;

    El ejemplo anterior mostrará:

array(
0 =&gt; 1415,
1 =&gt; '2007-05-26T01:44:28.453125Z',
2 =&gt; 'Bob'
)

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_auth_set_parameter()](#function.svn-auth-set-parameter) - Especifica un parámetro de autenticación

    - [» Documentación SVN sobre el comando "svn commit"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.commit.html)

# svn_delete

(PECL svn &gt;= 0.4.0)

svn_delete — Elimina un elemento de un directorio de trabajo o de un repositorio

### Descripción

**svn_delete**([string](#language.types.string) $path, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [bool](#language.types.boolean)

Elimina un fichero, un directorio o un enlace simbólico, según el
path utilizado, desde un directorio de trabajo.
El elemento será eliminado del repositorio en la próxima llamada a la función
[svn_commit()](#function.svn-commit) en el directorio de trabajo.

### Parámetros

     path


       Ruta hacia el elemento a eliminar.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     force


       Si vale **[true](#constant.true)**, el fichero será eliminado incluso si tiene modificaciones locales.
       De lo contrario, las modificaciones locales harán fallar la función.
       Por omisión, vale **[false](#constant.false)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [» Documentación SVN sobre la eliminación](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.delete.html)

# svn_diff

(PECL svn &gt;= 0.1.0)

svn_diff — Comparar dos rutas de forma recursiva

### Descripción

**svn_diff**(
    [string](#language.types.string) $path1,
    [int](#language.types.integer) $rev1,
    [string](#language.types.string) $path2,
    [int](#language.types.integer) $rev2
): [array](#language.types.array)

Compara dos rutas, path1 y
path2, de forma recursiva.

**Nota**:

    No es una utilidad de comparación real. Solo los ficheros
    locales que están versionados pueden ser comparados: otros ficheros
    fallarán.

### Parámetros

     path1


       Primera ruta. Puede ser una URL hacia un fichero/directorio de un
       repositorio SVN o una ruta hacia un fichero/directorio local.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).


      **Advertencia**

        Si una ruta hacia un fichero local solo tiene barras invertidas y ninguna
        barra, esta extensión fallará. Reemplace siempre todas las barras invertidas
        con barras al utilizar esta función.







     rev1


       Número de revisión de la primera ruta. Utilice la constante
       **[SVN_REVISON_HEAD](#constant.svn-revison-head)** para especificar la revisión
       más reciente.






     path2


       Segunda ruta a comparar. Ver el argumento
       path1 para la descripción.






     rev2


       Número de revisión de la segunda ruta. Ver el argumento
       rev1 para la descripción.





### Valores devueltos

Devuelve un array que contiene 2 flujos: el primero representa la salida
de la comparación, y el segundo contiene los errores. Los flujos pueden
ser leídos utilizando la función [fread()](#function.fread). Devuelve
**[false](#constant.false)** o **[null](#constant.null)** si ocurre un error.

La salida del comparador puede, por omisión, estar en formato de comparación
unificado Subversion, pero un
[» motor externo de
comparación](http://svnbook.red-bean.com/en/1.2/svn.advanced.externaldifftools.html) puede ser utilizado, según la configuración SVN.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo muestra un uso básico de esta función y recupera
     el contenido desde los flujos:

&lt;?php
list($diff, $errors) = svn_diff(
    'http://www.example.com/svnroot/trunk/foo', SVN_REVISION_HEAD,
    'http://www.example.com/svnroot/branches/dev/foo', SVN_REVISION_HEAD
);
if (!$diff) exit;
$contents = '';
while (!feof($diff)) {
$contents .= fread($diff, 8192);
}
fclose($diff);
fclose($errors);
var_dump($contents);
?&gt;

    El ejemplo anterior mostrará:

# Index: http://www.example.com/svnroot/trunk/foo

--- http://www.example.com/svnroot/trunk/foo (.../foo) (revision 23)
+++ http://www.example.com/svnroot/branches/dev/foo (.../foo) (revision 27)
// further diff output

    **Ejemplo #2 Comparación de dos revisiones de una ruta del repositorio**



     Este ejemplo implementa un gestor que permite
     a un usuario comparar fácilmente dos revisiones de un elemento
     utilizando una ruta de repositorio externa (la sintaxis por omisión es verbosa):

&lt;?php
function svn_diff_same_item($path, $rev1, $rev2) {
    return svn_diff($path, $rev1, $path, $rev2);
}
?&gt;

    **Ejemplo #3 Comparación, más portable, de dos ficheros locales**



     Este ejemplo implementa un gestor para comparar
     dos ficheros locales, de forma más portable gestionando el problema de
     [realpath()](#function.realpath) y el error con las barras invertidas:

&lt;?php
function svn_diff_local($path1, $rev1, $path2, $rev2) {
    $path1 = str_replace('\\', '/', realpath($path1));
$path2 = str_replace('\\', '/', realpath($path2));
return svn_diff($path1, $rev1, $path2, $rev2);
}
?&gt;

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [» Documentación SVN sobre la orden "svn diff"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.diff.html)

# svn_export

(PECL svn &gt;= 0.3.0)

svn_export — Exporta el contenido de un directorio SVN

### Descripción

**svn_export**(
    [string](#language.types.string) $frompath,
    [string](#language.types.string) $topath,
    [bool](#language.types.boolean) $working_copy = **[true](#constant.true)**,
    [int](#language.types.integer) $revision_no = -1
): [bool](#language.types.boolean)

Exporta el contenido de una copia de trabajo o un repositorio en un
directorio 'limpio'.

### Parámetros

     frompath


       La ruta del repositorio actual.






     topath


       La ruta del nuevo repositorio.






     working_copy


       Si es **[true](#constant.true)**, exportará ficheros no cometidos de la copia de trabajo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de svn_export()**

&lt;?php
$working_dir     = '../';
$new_working_dir = '/home/user/devel/foo/trunk';

svn_export($working_dir, $new_working_dir);
?&gt;

### Ver también

    - [svn_import()](#function.svn-import) - Importa una ruta no versionada en un repositorio

# svn_fs_abort_txn

(PECL svn &gt;= 0.2.0)

svn_fs_abort_txn — Interrumpir una transacción

### Descripción

**svn_fs_abort_txn**([resource](#language.types.resource) $txn): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Detiene una transacción, retorna **[true](#constant.true)** si todo es correcto, **[false](#constant.false)** en caso contrario.

### Parámetros

     txn








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_apply_text

(PECL svn &gt;= 0.2.0)

svn_fs_apply_text — Crea y devuelve una secuencia que se utilizará para reemplazar

### Descripción

**svn_fs_apply_text**([resource](#language.types.resource) $root, [string](#language.types.string) $path): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crea y devuelve una secuencia que se utilizará para reemplazar

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_begin_txn2

(PECL svn &gt;= 0.2.0)

svn_fs_begin_txn2 — Crear una nueva transacción

### Descripción

**svn_fs_begin_txn2**([resource](#language.types.resource) $repos, [int](#language.types.integer) $rev): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crear una nueva transacción

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_change_node_prop

(PECL svn &gt;= 0.2.0)

svn_fs_change_node_prop — Retorna verdadero si todo está ok, falso en caso contrario

### Descripción

**svn_fs_change_node_prop**(
    [resource](#language.types.resource) $root,
    [string](#language.types.string) $path,
    [string](#language.types.string) $name,
    [string](#language.types.string) $value
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Retorna verdadero si todo está ok, falso en caso contrario

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_check_path

(PECL svn &gt;= 0.1.0)

svn_fs_check_path — Determina que tipo de elemento está apuntado por una ruta de acceso determinada, en un repositorio fsroot

### Descripción

**svn_fs_check_path**([resource](#language.types.resource) $fsroot, [string](#language.types.string) $path): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Determina que tipo de elemento está apuntado por una ruta de acceso determinada, en un repositorio fsroot

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_contents_changed

(PECL svn &gt;= 0.2.0)

svn_fs_contents_changed — Devuelve verdadero si el contenido es diferente, falso en caso contrario

### Descripción

**svn_fs_contents_changed**(
    [resource](#language.types.resource) $root1,
    [string](#language.types.string) $path1,
    [resource](#language.types.resource) $root2,
    [string](#language.types.string) $path2
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve verdadero si el contenido es diferente, falso en caso contrario

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_copy

(PECL svn &gt;= 0.2.0)

svn_fs_copy — Copia un fichero o un directorio

### Descripción

**svn_fs_copy**(
    [resource](#language.types.resource) $from_root,
    [string](#language.types.string) $from_path,
    [resource](#language.types.resource) $to_root,
    [string](#language.types.string) $to_path
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Copia un fichero o un directorio.

### Parámetros

     from_root









     from_path









     to_root









     to_path








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_delete

(PECL svn &gt;= 0.2.0)

svn_fs_delete — Elimina un fichero o un directorio

### Descripción

**svn_fs_delete**([resource](#language.types.resource) $root, [string](#language.types.string) $path): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Elimina un fichero o un directorio.

### Parámetros

     root









     path








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_dir_entries

(PECL svn &gt;= 0.1.0)

svn_fs_dir_entries — Enumera los directorios que hay bajo una ruta de acceso determinada; devuelve un array con los nombres de los directorios

### Descripción

**svn_fs_dir_entries**([resource](#language.types.resource) $fsroot, [string](#language.types.string) $path): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Enumera los directorios que hay bajo una ruta de acceso determinada; devuelve un array con los nombres de los directorios

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_file_contents

(PECL svn &gt;= 0.1.0)

svn_fs_file_contents — Devuelve un flujo de acceso al contenido de un fichero para una versión del sistema de ficheros dada

### Descripción

**svn_fs_file_contents**([resource](#language.types.resource) $fsroot, [string](#language.types.string) $path): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve un flujo de acceso al contenido de un fichero para una versión del sistema de ficheros dada

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_file_length

(PECL svn &gt;= 0.1.0)

svn_fs_file_length — Devuelve la longitud de un fichero para una versión dada de sistema de ficheros

### Descripción

**svn_fs_file_length**([resource](#language.types.resource) $fsroot, [string](#language.types.string) $path): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la longitud de un fichero para una versión dada de sistema de ficheros

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_is_dir

(PECL svn &gt;= 0.2.0)

svn_fs_is_dir — Determina si una ruta dada apunta a un directorio

### Descripción

**svn_fs_is_dir**([resource](#language.types.resource) $root, [string](#language.types.string) $path): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Determina si una ruta dada apunta a un directorio.

### Parámetros

     root









     path








### Valores devueltos

Devuelve **[true](#constant.true)** si la ruta apunta a un directorio, **[false](#constant.false)** en caso contrario.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_is_file

(PECL svn &gt;= 0.2.0)

svn_fs_is_file — Determina si una ruta dada apunta a un fichero

### Descripción

**svn_fs_is_file**([resource](#language.types.resource) $root, [string](#language.types.string) $path): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Determina si una ruta dada apunta a un fichero.

### Parámetros

     root









     path








### Valores devueltos

Devuelve **[true](#constant.true)** si la ruta apunta a un fichero, **[false](#constant.false)** en caso contrario.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_make_dir

(PECL svn &gt;= 0.2.0)

svn_fs_make_dir — Crea un nuevo directorio vacío

### Descripción

**svn_fs_make_dir**([resource](#language.types.resource) $root, [string](#language.types.string) $path): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crea un nuevo directorio.

### Parámetros

     root









     path








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_make_file

(PECL svn &gt;= 0.2.0)

svn_fs_make_file — Crea un nuevo fichero vacío

### Descripción

**svn_fs_make_file**([resource](#language.types.resource) $root, [string](#language.types.string) $path): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crea un nuevo fichero vacío.

### Parámetros

     root









     path








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_node_created_rev

(PECL svn &gt;= 0.1.0)

svn_fs_node_created_rev — Devuelve la revisión en la que la ruta de acceso bajo fsroot fue creado

### Descripción

**svn_fs_node_created_rev**([resource](#language.types.resource) $fsroot, [string](#language.types.string) $path): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la revisión en la que la ruta de acceso bajo fsroot fue creado

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_node_prop

(PECL svn &gt;= 0.1.0)

svn_fs_node_prop — Devuelve el valor de una propiedad de un nodo

### Descripción

**svn_fs_node_prop**([resource](#language.types.resource) $fsroot, [string](#language.types.string) $path, [string](#language.types.string) $propname): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el valor de una propiedad de un nodo

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_props_changed

(PECL svn &gt;= 0.2.0)

svn_fs_props_changed — Devuelve verdadero si las propiedades son diferentes, falso en caso contrario

### Descripción

**svn_fs_props_changed**(
    [resource](#language.types.resource) $root1,
    [string](#language.types.string) $path1,
    [resource](#language.types.resource) $root2,
    [string](#language.types.string) $path2
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve verdadero si las propiedades son diferentes, falso en caso contrario

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_revision_prop

(PECL svn &gt;= 0.1.0)

svn_fs_revision_prop — Recupera el valor de una propiedad con determinado nombre

### Descripción

**svn_fs_revision_prop**([resource](#language.types.resource) $fs, [int](#language.types.integer) $revnum, [string](#language.types.string) $propname): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Recupera el valor de una propiedad con determinado nombre

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_revision_root

(PECL svn &gt;= 0.1.0)

svn_fs_revision_root — Obtiene un gestor en una versión específica del repositorio 'root'

### Descripción

**svn_fs_revision_root**([resource](#language.types.resource) $fs, [int](#language.types.integer) $revnum): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Obtiene un gestor en una versión específica del repositorio 'root'

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_txn_root

(PECL svn &gt;= 0.2.0)

svn_fs_txn_root — Crea y retorna una transacción 'root'

### Descripción

**svn_fs_txn_root**([resource](#language.types.resource) $txn): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crea y retorna una transacción 'root'

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_fs_youngest_rev

(PECL svn &gt;= 0.1.0)

svn_fs_youngest_rev — Devuelve el número de la revisión más reciente del sistema de ficheros

### Descripción

**svn_fs_youngest_rev**([resource](#language.types.resource) $fs): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el número de la revisión más reciente del sistema de ficheros

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_import

(PECL svn &gt;= 0.2.0)

svn_import — Importa una ruta no versionada en un repositorio

### Descripción

**svn_import**([string](#language.types.string) $path, [string](#language.types.string) $url, [bool](#language.types.boolean) $nonrecursive): [bool](#language.types.boolean)

Entrega una ruta path no versionada en el
repositorio a la URL url. Si path
es un directorio y nonrecursive es **[false](#constant.false)**,
el directorio será importado recursivamente.

### Parámetros

     path


       Ruta hacia el fichero o directorio a importar.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     url


       URL del repositorio en el cual se importa.






     nonrecursive


       Si se debe o no realizar una importación recursiva.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo muestra un uso clásico de esta función. Para importar
     un directorio llamado "new-files" en el repositorio a la URL
     "http://www.example.com/svnroot/incoming/abc", se utiliza:

&lt;?php
svn_import(realpath('new-files'), 'http://www.example.com/svnroot/incoming/abc', false);
?&gt;

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_add()](#function.svn-add) - Prevé la adición de un elemento en el directorio de trabajo

    - [» Documentación SVN sobre el comando "svn import"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.import.html)

# svn_log

(PECL svn &gt;= 0.1.0)

svn_log — Recupera el mensaje de historial de una URL del repositorio

### Descripción

**svn_log**(
    [string](#language.types.string) $repos_url,
    [int](#language.types.integer) $start_revision = ?,
    [int](#language.types.integer) $end_revision = ?,
    [int](#language.types.integer) $limit = 0,
    [int](#language.types.integer) $flags = SVN_DISCOVER_CHANGED_PATHS | SVN_STOP_ON_COPY
): [array](#language.types.array)

**svn_log()** recupera el historial completo del elemento
correspondiente a la URL repos_url, o el historial de una revisión específica
si start_revision está especificado. Esta función es equivalente
al comando **svn log --verbose -r $start_revision $repos_url**.

### Parámetros

     repos_url


       URL en el repositorio del elemento del que se debe recuperar el historial.






     start_revision


       Número de revisión del primer historial a recuperar. Utilice
       la constante **[SVN_REVISION_HEAD](#constant.svn-revision-head)** para recuperar
       el historial de la revisión más reciente.






     end_revision


       Número de revisión del último historial a recuperar. Por omisión vale
       start_revision si está especificado, de lo contrario vale la
       constante **[SVN_REVISION_INITIAL](#constant.svn-revision-initial)**.






     limit


       Número de historiales a recuperar.






     flags


       Cualquier combinación de **[SVN_OMIT_MESSAGES](#constant.svn-omit-messages)**,
       **[SVN_DISCOVER_CHANGED_PATHS](#constant.svn-discover-changed-paths)** y
       **[SVN_STOP_ON_COPY](#constant.svn-stop-on-copy)**.





### Valores devueltos

En caso de éxito, esta función devuelve un array de ficheros
en el formato:

[0] =&gt; Array, ordenado del número de revisión más grande al más pequeño
(
[rev] =&gt; número de revisión
[author] =&gt; nombre del autor
[msg] =&gt; mensaje de historial
[date] =&gt; fecha, en formato ISO 8601, es decir, date('c')
[paths] =&gt; Array, describiendo los ficheros modificados
(
[0] =&gt; Array
(
[action] =&gt; letra, especificando la modificación
[path] =&gt; ruta absoluta del repositorio al fichero modificado
)
[1] =&gt; ...
)
)
[1] =&gt; ...

**Nota**:

    La salida será siempre un array indexado numéricamente de arrays,
    incluso si no hay ninguno, o solo un mensaje de historial.

El valor de action es una subparte de
[» la salida de estado
en la primera columna](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.status.html), donde los valores posibles son:

   <caption>**Acciones**</caption>
   
     
      
       Letra
       Descripción


       M
       El elemento ha sido modificado



       A
       El elemento ha sido añadido



       D
       El elemento ha sido eliminado



       R
       El elemento ha sido reemplazado




Si no se ha realizado ninguna modificación al elemento, se devolverá un array
vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo con svn_log()**

&lt;?php
print_r( svn_log('http://www.example.com/', 23) );
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[rev] =&gt; 23
[author] =&gt; 'joe'
[msg] =&gt; 'Add cheese and salami to our sandwich.'
[date] =&gt; '2007-04-06T16:00:27-04:00'
[paths] =&gt; Array
(
[0] =&gt; Array
(
[action] =&gt; 'M'
[path] =&gt; '/sandwich.txt'
)
)
)
)

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    -
     [» Documentación SVN para el comando "svn log"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.log.html)

# svn_ls

(PECL svn &gt;= 0.1.0)

svn_ls — Devuelve la lista del contenido de un directorio de un repositorio, opcionalmente en la revisión proporcionada

### Descripción

**svn_ls**(
    [string](#language.types.string) $repos_url,
    [int](#language.types.integer) $revision_no = SVN_REVISION_HEAD,
    [bool](#language.types.boolean) $recurse = **[false](#constant.false)**,
    [bool](#language.types.boolean) $peg = **[false](#constant.false)**
): [array](#language.types.array)

Esta función consulta la URL del repositorio y devuelve una lista de los ficheros y directorios, opcionalmente desde una revisión específica. Es el equivalente al comando **svn list $repos_url[@$revision_no]**.

**Nota**:

    Esta función no funciona con copias de trabajo. repos_url *DEBE* ser una URL de repositorio.

### Parámetros

     url


       URL del repositorio, por ejemplo **http://www.example.com/svnroot**. Para acceder a un repositorio local Subversion a través del sistema de ficheros, utilice el siguiente URI: **file:///home/user/svn-repos**.






     revision


       Número de revisión a utilizar. Si se omite, se utilizará HEAD.






     recurse


       Activa la recursividad.





### Valores devueltos

En caso de éxito, esta función devuelve un array de ficheros, listados de la siguiente forma:

[0] =&gt; Array
(
[created_rev] =&gt; número de revisión de la última edición
[last_author] =&gt; nombre del autor de la última edición
[size] =&gt; tamaño del fichero
[time] =&gt; fecha y hora de la última edición, en formato 'M d H:i' o 'M d Y', según la antigüedad del fichero
[time_t] =&gt; timestamp Unix de la última edición
[name] =&gt; nombre del fichero o directorio
[type] =&gt; tipo, puede ser 'file' o 'dir'
)
[1] =&gt; ...

### Ejemplos

    **Ejemplo #1 Ejemplo con svn_ls()**

&lt;?php
print_r( svn_ls('http://www.example.com/svnroot/') );
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[created_rev] =&gt; 20
[last_author] =&gt; Joe
[size] =&gt; 0
[time] =&gt; Apr 02 09:28
[time_t] =&gt; 1175520529
[name] =&gt; tags
[type] =&gt; dir
)
[1] =&gt; Array
(
[created_rev] =&gt; 23
[last_author] =&gt; Bob
[size] =&gt; 0
[time] =&gt; Apr 02 15:15
[time_t] =&gt; 1175541322
[name] =&gt; trunk
[type] =&gt; dir
)
)

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    -
     [» Documentación SVN sobre el comando "svn list"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.list.html)

# svn_mkdir

(PECL svn &gt;= 0.4.0)

svn_mkdir — Crea un directorio en la copia de trabajo actual o repositorio

### Descripción

**svn_mkdir**([string](#language.types.string) $path, [string](#language.types.string) $log_message = ?): [bool](#language.types.boolean)

Crea un directorio en la copia de trabajo o repositorio.

### Parámetros

     path


       La ruta a la copia de trabajo o repositorio.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [svn_add()](#function.svn-add) - Prevé la adición de un elemento en el directorio de trabajo

    - **svn_copy()**

# svn_repos_create

(PECL svn &gt;= 0.1.0)

svn_repos_create — Crea un nuevo repositorio de subversión

### Descripción

**svn_repos_create**([string](#language.types.string) $path, [array](#language.types.array) $config = ?, [array](#language.types.array) $fsconfig = ?): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crea un nuevo repositorio de subversión en un path determinado.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_repos_fs

(PECL svn &gt;= 0.1.0)

svn_repos_fs — Obtiene un gestor del sistema de ficheros para un repositorio

### Descripción

**svn_repos_fs**([resource](#language.types.resource) $repos): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Obtiene un gestor del sistema de ficheros para un repositorio

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_repos_fs_begin_txn_for_commit

(PECL svn &gt;= 0.2.0)

svn_repos_fs_begin_txn_for_commit — Crea una nueva transacción

### Descripción

**svn_repos_fs_begin_txn_for_commit**(
    [resource](#language.types.resource) $repos,
    [int](#language.types.integer) $rev,
    [string](#language.types.string) $author,
    [string](#language.types.string) $log_msg
): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Crea una nueva transacción

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_repos_fs_commit_txn

(PECL svn &gt;= 0.2.0)

svn_repos_fs_commit_txn — Consolida una transacción y devuelve la nueva revisión

### Descripción

**svn_repos_fs_commit_txn**([resource](#language.types.resource) $txn): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Consolida una transacción y devuelve la nueva revisión

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_repos_hotcopy

(PECL svn &gt;= 0.1.0)

svn_repos_hotcopy — Realiza una copia en caliente del repositorio en pathrepospath; y lo copia en destpath

### Descripción

**svn_repos_hotcopy**([string](#language.types.string) $repospath, [string](#language.types.string) $destpath, [bool](#language.types.boolean) $cleanlogs): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Realiza una copia en caliente del repositorio en pathrepospath; y lo copia en destpath

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_repos_open

(PECL svn &gt;= 0.1.0)

svn_repos_open — Abre una cerradura compartida en un repositorio

### Descripción

**svn_repos_open**([string](#language.types.string) $path): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Abre una cerradura compartida en un repositorio.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_repos_recover

(PECL svn &gt;= 0.1.0)

svn_repos_recover — Ejecuta los procesos de recuperación en el repositorio localizado en un path determinado

### Descripción

**svn_repos_recover**([string](#language.types.string) $path): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Ejecuta los procesos de recuperación en el repositorio localizado en un path determinado.

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

# svn_revert

(PECL svn &gt;= 0.3.0)

svn_revert — Deshace los cambios en la copia de trabajo

### Descripción

**svn_revert**([string](#language.types.string) $path, [bool](#language.types.boolean) $recursive = **[false](#constant.false)**): [bool](#language.types.boolean)

Deshace cualquier cambio local de la ruta en la copia de trabajo.

### Parámetros

     path


       La ruta del repositorio de trabajo.






     recursive


       Hacer cambios de forma recursiva, opcional.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [svn_delete()](#function.svn-delete) - Elimina un elemento de un directorio de trabajo o de un repositorio

    - [svn_export()](#function.svn-export) - Exporta el contenido de un directorio SVN

# svn_status

(PECL svn &gt;= 0.1.0)

svn_status — Obtiene el estado de los ficheros y directorios de la copia de trabajo

### Descripción

**svn_status**([string](#language.types.string) $path, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Devuelve el estado de los ficheros y directorios de la copia de trabajo, proporcionando
las modificaciones, adiciones, eliminaciones, así como otros cambios
de los elementos de la copia de trabajo.

### Parámetros

     path


       Ruta local al fichero o directorio del que se desea obtener el estado.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     flags


       Cualquier combinación de **[Svn::NON_RECURSIVE](#svn.constants.non-recursive)**,
       **[Svn::ALL](#svn.constants.all)** (independientemente del estado de modificación),
       **[Svn::SHOW_UPDATES](#svn.constants.show-updates)** (se añadirán entradas para elementos
       que no están actualizados), **[Svn::NO_IGNORE](#svn.constants.no-ignore)** (ignora las propiedades
       svn:ignore al analizar nuevos ficheros)
       y **[Svn::IGNORE_EXTERNALS](#svn.constants.ignore-externals)**.





### Valores devueltos

Devuelve un array indexado numéricamente de arrays asociativos
que detallan el estado de los elementos del repositorio:

Array (
[0] =&gt; Array (
// información sobre el elemento
)
[1] =&gt; ...
)

La información sobre un elemento es un array asociativo que puede contener
las siguientes claves:

    path


       Ruta al fichero/directorio de esta entrada en el sistema de ficheros
       local.




    text_status


       Estado del texto del elemento. Refiérase a las

[constantes de estado](#svn.constants.status) para los valores posibles.

    repos_text_status


       Estado del texto del elemento en el repositorio. Solo ocurre si
       update está definido como **[true](#constant.true)**.
       Refiérase a las

[constantes de estado](#svn.constants.status) para los valores posibles.

    prop_status


       Estado de la propiedad del elemento. Refiérase a las

[constantes de estado](#svn.constants.status) para los valores posibles.

    repos_prop_status


       Estado de la propiedad del elemento en el repositorio. Solo ocurre si
       update está definido como **[true](#constant.true)**. Refiérase a las

[constantes de estado](#svn.constants.status) para los valores posibles.

    locked


       Si el elemento está bloqueado. (Definido solo si **[true](#constant.true)**.)




    copied


       Si el elemento ha sido copiado o no (previsto para añadir con el registro).
       (Definido solo si **[true](#constant.true)**.)




    switched


       Si el elemento ha cambiado de repositorio de referencia,
       utilizando el comando switch.
       (Definido solo si **[true](#constant.true)**)



Estas claves solo están definidas si el elemento está versionado:

    name


       Nombre base del elemento en el repositorio.




    url


       URL del elemento en el repositorio.




    repos


       URL base del repositorio.




    revision


       Revisión del elemento en la copia de trabajo.




    kind


       Tipo del elemento, es decir, fichero o directorio. Refiérase a las [constantes de tipo](#svn.constants.type) para los valores posibles.




    schedule


       Acción prevista para el elemento, es decir, adición o eliminación.
       Las constantes para estos números mágicos no están disponibles,
       pueden ser emuladas utilizando:



&lt;?php
if (!defined('svn_wc_schedule_normal')) {
define('svn_wc_schedule_normal', 0); // nada especial
define('svn_wc_schedule_add', 1); // elemento a añadir
define('svn_wc_schedule_delete', 2); // elemento a eliminar
define('svn_wc_schedule_replace', 3); // elemento a añadir y eliminar
}
?&gt;

    deleted


       Si el elemento ha sido eliminado, pero las revisiones padre aún existen
       (Definido solo si **[true](#constant.true)**.)




    absent


       Si el elemento está ausente, pero Subversion sabe que debería
       estar aquí. (Definido solo si **[true](#constant.true)**.)




    incomplete


       Si la entrada del fichero para un directorio está incompleta.
       (Definido solo si **[true](#constant.true)**.)




    cmt_date


       Timestamp Unix de la fecha del último commit.
       (No afectado por el parámetro update).




    cmt_rev


       Revisión del último commit. (No afectado por el parámetro
       update).




    cmt_author


       Nombre del autor del último commit. (No afectado por el
       parámetro update).




    prop_time


       Timestamp Unix que representa la fecha/hora de la última actualización
       de las propiedades.




    text_time


       Timestamp Unix que representa la fecha/hora de la última actualización
       del texto.



### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo muestra un uso básico de esta función.

&lt;?php
print_r(svn_status(realpath('wc')));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array (
[0] =&gt; Array (
[path] =&gt; /home/bob/wc/sandwich.txt
[text_status] =&gt; 8 // el elemento ha sido modificado
[repos_text_status] =&gt; 1 // Ninguna información disponible, use update
[prop_status] =&gt; 3 // ningún cambio
[repos_prop_status] =&gt; 1 // Ninguna información disponible, use update
[name] =&gt; sandwich.txt
[url] =&gt; http://www.example.com/svnroot/deli/trunk/sandwich.txt
[repos] =&gt; http://www.example.com/svnroot/
[revision] =&gt; 123
[kind] =&gt; 1 // fichero
[schedule] =&gt; 0 // ninguna acción prevista
[cmt_date] =&gt; 1165543135
[cmt_rev] =&gt; 120
[cmt_author] =&gt; Alice
[prop_time] =&gt; 1180201728
[text_time] =&gt; 1180201729
)
)

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_update()](#function.svn-update) - Actualiza la copia de trabajo

    - [svn_log()](#function.svn-log) - Recupera el mensaje de historial de una URL del repositorio

    - [» Documentación SVN del comando "svn status"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.status.html)

# svn_update

(PECL svn &gt;= 0.1.0)

svn_update — Actualiza la copia de trabajo

### Descripción

**svn_update**([string](#language.types.string) $path, [int](#language.types.integer) $revno = SVN_REVISION_HEAD, [bool](#language.types.boolean) $recurse = **[true](#constant.true)**): [int](#language.types.integer)

Actualiza la copia de trabajo apuntada por la ruta path a la revisión revno. Si recurse vale **[true](#constant.true)**, los directorios se actualizarán recursivamente.

### Parámetros

     path


       Ruta hacia la copia de trabajo local.



      **Nota**: Los caminos relativos pueden ser resueltos
    si el directorio de trabajo actual es uno de los que contienen el binario PHP.
    Para utilizar el directorio de trabajo, utilice la función [realpath()](#function.realpath),
    o la instrucción dirname(__FILE__).





     revno


       Número de revisión hacia el cual actualizar; por omisión vale **[SVN_REVISION_HEAD](#constant.svn-revision-head)**.






     recurse


       Si se deben o no actualizar los directorios recursivamente.





### Valores devueltos

Devuelve el nuevo número de revisión en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso**



     Este ejemplo muestra un uso básico de esta función:

&lt;?php
echo svn_update(realpath('working-copy'));
?&gt;

    Resultado del ejemplo anterior es similar a:

234

### Notas

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Ver también

    - [svn_checkout()](#function.svn-checkout) - Extrae una copia de trabajo desde un repositorio

    - [svn_commit()](#function.svn-commit) - Envía los cambios desde la copia local al repositorio

    - [» Documentación SVN para el comando "svn update"](http://svnbook.red-bean.com/en/1.2/svn.ref.svn.c.update.html)

## Tabla de contenidos

- [svn_add](#function.svn-add) — Prevé la adición de un elemento en el directorio de trabajo
- [svn_auth_get_parameter](#function.svn-auth-get-parameter) — Recupera un parámetro de identificación
- [svn_auth_set_parameter](#function.svn-auth-set-parameter) — Especifica un parámetro de autenticación
- [svn_blame](#function.svn-blame) — Obtiene las acusaciones SVN de un archivo
- [svn_cat](#function.svn-cat) — Recupera el contenido de un fichero del repositorio
- [svn_checkout](#function.svn-checkout) — Extrae una copia de trabajo desde un repositorio
- [svn_cleanup](#function.svn-cleanup) — Limpia, de forma recursiva, un directorio de trabajo, finalizando las operaciones incompletas y eliminando los bloqueos
- [svn_client_version](#function.svn-client-version) — Obtiene la versión de las bibliotecas cliente SVN
- [svn_commit](#function.svn-commit) — Envía los cambios desde la copia local al repositorio
- [svn_delete](#function.svn-delete) — Elimina un elemento de un directorio de trabajo o de un repositorio
- [svn_diff](#function.svn-diff) — Comparar dos rutas de forma recursiva
- [svn_export](#function.svn-export) — Exporta el contenido de un directorio SVN
- [svn_fs_abort_txn](#function.svn-fs-abort-txn) — Interrumpir una transacción
- [svn_fs_apply_text](#function.svn-fs-apply-text) — Crea y devuelve una secuencia que se utilizará para reemplazar
- [svn_fs_begin_txn2](#function.svn-fs-begin-txn2) — Crear una nueva transacción
- [svn_fs_change_node_prop](#function.svn-fs-change-node-prop) — Retorna verdadero si todo está ok, falso en caso contrario
- [svn_fs_check_path](#function.svn-fs-check-path) — Determina que tipo de elemento está apuntado por una ruta de acceso determinada, en un repositorio fsroot
- [svn_fs_contents_changed](#function.svn-fs-contents-changed) — Devuelve verdadero si el contenido es diferente, falso en caso contrario
- [svn_fs_copy](#function.svn-fs-copy) — Copia un fichero o un directorio
- [svn_fs_delete](#function.svn-fs-delete) — Elimina un fichero o un directorio
- [svn_fs_dir_entries](#function.svn-fs-dir-entries) — Enumera los directorios que hay bajo una ruta de acceso determinada; devuelve un array con los nombres de los directorios
- [svn_fs_file_contents](#function.svn-fs-file-contents) — Devuelve un flujo de acceso al contenido de un fichero para una versión del sistema de ficheros dada
- [svn_fs_file_length](#function.svn-fs-file-length) — Devuelve la longitud de un fichero para una versión dada de sistema de ficheros
- [svn_fs_is_dir](#function.svn-fs-is-dir) — Determina si una ruta dada apunta a un directorio
- [svn_fs_is_file](#function.svn-fs-is-file) — Determina si una ruta dada apunta a un fichero
- [svn_fs_make_dir](#function.svn-fs-make-dir) — Crea un nuevo directorio vacío
- [svn_fs_make_file](#function.svn-fs-make-file) — Crea un nuevo fichero vacío
- [svn_fs_node_created_rev](#function.svn-fs-node-created-rev) — Devuelve la revisión en la que la ruta de acceso bajo fsroot fue creado
- [svn_fs_node_prop](#function.svn-fs-node-prop) — Devuelve el valor de una propiedad de un nodo
- [svn_fs_props_changed](#function.svn-fs-props-changed) — Devuelve verdadero si las propiedades son diferentes, falso en caso contrario
- [svn_fs_revision_prop](#function.svn-fs-revision-prop) — Recupera el valor de una propiedad con determinado nombre
- [svn_fs_revision_root](#function.svn-fs-revision-root) — Obtiene un gestor en una versión específica del repositorio 'root'
- [svn_fs_txn_root](#function.svn-fs-txn-root) — Crea y retorna una transacción 'root'
- [svn_fs_youngest_rev](#function.svn-fs-youngest-rev) — Devuelve el número de la revisión más reciente del sistema de ficheros
- [svn_import](#function.svn-import) — Importa una ruta no versionada en un repositorio
- [svn_log](#function.svn-log) — Recupera el mensaje de historial de una URL del repositorio
- [svn_ls](#function.svn-ls) — Devuelve la lista del contenido de un directorio de un repositorio, opcionalmente en la revisión proporcionada
- [svn_mkdir](#function.svn-mkdir) — Crea un directorio en la copia de trabajo actual o repositorio
- [svn_repos_create](#function.svn-repos-create) — Crea un nuevo repositorio de subversión
- [svn_repos_fs](#function.svn-repos-fs) — Obtiene un gestor del sistema de ficheros para un repositorio
- [svn_repos_fs_begin_txn_for_commit](#function.svn-repos-fs-begin-txn-for-commit) — Crea una nueva transacción
- [svn_repos_fs_commit_txn](#function.svn-repos-fs-commit-txn) — Consolida una transacción y devuelve la nueva revisión
- [svn_repos_hotcopy](#function.svn-repos-hotcopy) — Realiza una copia en caliente del repositorio en pathrepospath; y lo copia en destpath
- [svn_repos_open](#function.svn-repos-open) — Abre una cerradura compartida en un repositorio
- [svn_repos_recover](#function.svn-repos-recover) — Ejecuta los procesos de recuperación en el repositorio localizado en un path determinado
- [svn_revert](#function.svn-revert) — Deshace los cambios en la copia de trabajo
- [svn_status](#function.svn-status) — Obtiene el estado de los ficheros y directorios de la copia de trabajo
- [svn_update](#function.svn-update) — Actualiza la copia de trabajo

- [Introducción](#intro.svn)
- [Instalación/Configuración](#svn.setup)<li>[Requerimientos](#svn.requirements)
- [Instalación](#svn.installation)
  </li>- [Constantes predefinidas](#svn.constants)
- [Funciones SVN](#ref.svn)<li>[svn_add](#function.svn-add) — Prevé la adición de un elemento en el directorio de trabajo
- [svn_auth_get_parameter](#function.svn-auth-get-parameter) — Recupera un parámetro de identificación
- [svn_auth_set_parameter](#function.svn-auth-set-parameter) — Especifica un parámetro de autenticación
- [svn_blame](#function.svn-blame) — Obtiene las acusaciones SVN de un archivo
- [svn_cat](#function.svn-cat) — Recupera el contenido de un fichero del repositorio
- [svn_checkout](#function.svn-checkout) — Extrae una copia de trabajo desde un repositorio
- [svn_cleanup](#function.svn-cleanup) — Limpia, de forma recursiva, un directorio de trabajo, finalizando las operaciones incompletas y eliminando los bloqueos
- [svn_client_version](#function.svn-client-version) — Obtiene la versión de las bibliotecas cliente SVN
- [svn_commit](#function.svn-commit) — Envía los cambios desde la copia local al repositorio
- [svn_delete](#function.svn-delete) — Elimina un elemento de un directorio de trabajo o de un repositorio
- [svn_diff](#function.svn-diff) — Comparar dos rutas de forma recursiva
- [svn_export](#function.svn-export) — Exporta el contenido de un directorio SVN
- [svn_fs_abort_txn](#function.svn-fs-abort-txn) — Interrumpir una transacción
- [svn_fs_apply_text](#function.svn-fs-apply-text) — Crea y devuelve una secuencia que se utilizará para reemplazar
- [svn_fs_begin_txn2](#function.svn-fs-begin-txn2) — Crear una nueva transacción
- [svn_fs_change_node_prop](#function.svn-fs-change-node-prop) — Retorna verdadero si todo está ok, falso en caso contrario
- [svn_fs_check_path](#function.svn-fs-check-path) — Determina que tipo de elemento está apuntado por una ruta de acceso determinada, en un repositorio fsroot
- [svn_fs_contents_changed](#function.svn-fs-contents-changed) — Devuelve verdadero si el contenido es diferente, falso en caso contrario
- [svn_fs_copy](#function.svn-fs-copy) — Copia un fichero o un directorio
- [svn_fs_delete](#function.svn-fs-delete) — Elimina un fichero o un directorio
- [svn_fs_dir_entries](#function.svn-fs-dir-entries) — Enumera los directorios que hay bajo una ruta de acceso determinada; devuelve un array con los nombres de los directorios
- [svn_fs_file_contents](#function.svn-fs-file-contents) — Devuelve un flujo de acceso al contenido de un fichero para una versión del sistema de ficheros dada
- [svn_fs_file_length](#function.svn-fs-file-length) — Devuelve la longitud de un fichero para una versión dada de sistema de ficheros
- [svn_fs_is_dir](#function.svn-fs-is-dir) — Determina si una ruta dada apunta a un directorio
- [svn_fs_is_file](#function.svn-fs-is-file) — Determina si una ruta dada apunta a un fichero
- [svn_fs_make_dir](#function.svn-fs-make-dir) — Crea un nuevo directorio vacío
- [svn_fs_make_file](#function.svn-fs-make-file) — Crea un nuevo fichero vacío
- [svn_fs_node_created_rev](#function.svn-fs-node-created-rev) — Devuelve la revisión en la que la ruta de acceso bajo fsroot fue creado
- [svn_fs_node_prop](#function.svn-fs-node-prop) — Devuelve el valor de una propiedad de un nodo
- [svn_fs_props_changed](#function.svn-fs-props-changed) — Devuelve verdadero si las propiedades son diferentes, falso en caso contrario
- [svn_fs_revision_prop](#function.svn-fs-revision-prop) — Recupera el valor de una propiedad con determinado nombre
- [svn_fs_revision_root](#function.svn-fs-revision-root) — Obtiene un gestor en una versión específica del repositorio 'root'
- [svn_fs_txn_root](#function.svn-fs-txn-root) — Crea y retorna una transacción 'root'
- [svn_fs_youngest_rev](#function.svn-fs-youngest-rev) — Devuelve el número de la revisión más reciente del sistema de ficheros
- [svn_import](#function.svn-import) — Importa una ruta no versionada en un repositorio
- [svn_log](#function.svn-log) — Recupera el mensaje de historial de una URL del repositorio
- [svn_ls](#function.svn-ls) — Devuelve la lista del contenido de un directorio de un repositorio, opcionalmente en la revisión proporcionada
- [svn_mkdir](#function.svn-mkdir) — Crea un directorio en la copia de trabajo actual o repositorio
- [svn_repos_create](#function.svn-repos-create) — Crea un nuevo repositorio de subversión
- [svn_repos_fs](#function.svn-repos-fs) — Obtiene un gestor del sistema de ficheros para un repositorio
- [svn_repos_fs_begin_txn_for_commit](#function.svn-repos-fs-begin-txn-for-commit) — Crea una nueva transacción
- [svn_repos_fs_commit_txn](#function.svn-repos-fs-commit-txn) — Consolida una transacción y devuelve la nueva revisión
- [svn_repos_hotcopy](#function.svn-repos-hotcopy) — Realiza una copia en caliente del repositorio en pathrepospath; y lo copia en destpath
- [svn_repos_open](#function.svn-repos-open) — Abre una cerradura compartida en un repositorio
- [svn_repos_recover](#function.svn-repos-recover) — Ejecuta los procesos de recuperación en el repositorio localizado en un path determinado
- [svn_revert](#function.svn-revert) — Deshace los cambios en la copia de trabajo
- [svn_status](#function.svn-status) — Obtiene el estado de los ficheros y directorios de la copia de trabajo
- [svn_update](#function.svn-update) — Actualiza la copia de trabajo
  </li>
