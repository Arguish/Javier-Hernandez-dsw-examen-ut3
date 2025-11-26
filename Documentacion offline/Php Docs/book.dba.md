# Capa de abstracción de base de datos (estilo dbm)

# Introducción

Estas funciones permiten el acceso a las bases de datos del estilo
Berkeley DB.

Se trata de una capa de abstracción general para varias bases
de datos, basadas en ficheros. Por esta razón
las funcionalidades se limitan a acciones comunes soportadas
por las bases de datos modernas, como
[» Oracle Berkeley DB](https://www.oracle.com/database/berkeley-db/db.html).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#dba.requirements)
- [Instalación](#dba.installation)
- [Configuración en tiempo de ejecución](#dba.configuration)
- [Tipos de recursos](#dba.resources)

    ## Requerimientos

    El comportamiento de ciertos aspectos depende de la implementación de la
    base de datos subyacente. Las funciones como
    [dba_optimize()](#function.dba-optimize) y [dba_sync()](#function.dba-sync)
    funcionan como se espera para una base de datos, mientras que pueden no hacer nada en otras. Deben descargarse e instalarse los gestores DBA soportados.

      <caption>**Lista de gestores DBA**</caption>
      
       
        
         Gestor
         Notas


         dbm

          DBM es la más antigua (la original) de las bases de datos
          de estilo Berkeley DB. Debería evitarse su uso
          si es posible. No se proporciona soporte para la compatibilidad de las funciones internas a DB2 y gdbm, ya que solo son compatibles a nivel de código fuente, pero no pueden manejar el formato original DBM.





         ndbm

          Ndbm es un nuevo tipo y más flexible que dbm. Sin embargo,
          presenta limitaciones arbitrarias de dbm
          (y por lo tanto, está obsoleto).





         gdbm

          Gdbm es un [» gestor de
          bases de datos GNU](https://ftp.gnu.org/pub/gnu/gdbm/).





         db2

          [» Oracle Berkeley
           DB 2](http://www.sleepycat.com/). Se describe como "un toolkit que proporciona
          soporte de alto rendimiento para bases de datos,
          tanto del lado cliente como del lado servidor."





         db3

          [» Oracle Berkeley DB
           3](http://www.sleepycat.com/).





         db4

          [» Oracle Berkeley DB
          4 o 5](http://www.sleepycat.com/). Esta opción puede
          utilizarse con BDB 5 a partir de PHP 5.3.3.





         cdb

          Cdb es un paquete rápido, ligero y fiable para crear y leer
          bases de datos constantes. Fue creado por el autor
          de qmail y puede encontrarse en
          [» http://cr.yp.to/cdb.html](http://cr.yp.to/cdb.html). Dado que es "constante",
          solo se soportarán las operaciones de lectura.
          También se soporta la escritura (y no la actualización)
          mediante la biblioteca interna cdb.





         cdb_make

          Se soporta la escritura (y no la actualización)
          de archivos cdb cuando se utiliza la biblioteca cdb.





         flatfile

          Esto está disponible por razones de compatibilidad con
          la extensión obsoleta dbm. Sin embargo, puede
          utilizarse cuando los archivos han sido creados en este formato.
          Ocurre cuando la configuración no ha logrado encontrar una
          biblioteca externa.





         inifile

          Esto está disponible para permitir la modificación de los
          archivos php.ini desde scripts PHP. Al utilizar archivos ini, pueden pasarse arrays de la forma
          (0=&gt;grupo,1=&gt;nombre_valor) o strings de la forma
          "[grupo]nombre_valor" donde el grupo es opcional. Dado que las
          funciones [dba_firstkey()](#function.dba-firstkey) y [dba_nextkey()](#function.dba-nextkey)
          devuelven un string representando la clave, existe una nueva función, [dba_key_split()](#function.dba-key-split),
          que permite convertir las claves en arrays sin pérdida.





         qdbm

          La biblioteca qdbm puede descargarse desde
          [» http://fallabs.com/qdbm/index.html](http://fallabs.com/qdbm/index.html).





         tcadb

          La biblioteca Tokyo Cabinet puede ser
          descargada desde [» http://fallabs.com/tokyocabinet/](http://fallabs.com/tokyocabinet/).




         lmdb

          Disponible a partir de PHP 7.2.0. La biblioteca Lightning
          Memory-Mapped Database puede ser descargada desde
           [» https://symas.com/lmdb/](https://symas.com/lmdb/).


    Al llamar a la función [dba_open()](#function.dba-open) o
    la función [dba_popen()](#function.dba-popen), debe proporcionarse uno de los
    nombres de gestor como argumento. La lista
    de gestores disponibles puede mostrarse utilizando
    la función [phpinfo()](#function.phpinfo) o la función
    [dba_handlers()](#function.dba-handlers).

## Instalación

Al utilizar la opción de compilación **--enable-dba=shared**,
puede compilarse un módulo dinámico que active el soporte
de las bases de datos de estilo DBM para PHP. Asimismo, debe añadirse el soporte
de al menos uno de los siguientes gestores, especificando la opción de
configuración **--with-XXXX** o
**--enable-XXXX** durante la configuración de
PHP.

**Advertencia**

Tras configurar y compilar PHP, deben ejecutarse las siguientes pruebas
desde la línea de comandos: php run-tests.php
ext/dba. Esto muestra si la combinación de controladores
funciona. Los más problemáticos son dbm y
ndbm que entran en conflicto con numerosas instalaciones.
Esto se debe a que en muchos sistemas, estas bibliotecas forman
parte de más de una biblioteca. La prueba de configuración impide
simplemente configurar descriptores cuya combinación es defectuosa
aunque funcionen correctamente por separado.

   <caption>**Gestores DBA soportados**</caption>
   
    
     
      Gestor
      Opción de configuración


      dbm


        Para activar el soporte de dbm, añada la opción
        de compilación **--with-dbm[=DIR]**.


**Nota**:

          dbm es una sobrecarga que suele dar lugar a fallos.
          Por tanto, solo debe utilizarse dbm si se está seguro de que
          funciona y se necesita este formato.










      ndbm


        Para activar el soporte de ndbm, añada la opción
        de compilación **--with-ndbm[=DIR]**.


**Nota**:

          ndbm es una sobrecarga que suele dar lugar a fallos.
          Por tanto, solo debe utilizarse ndbm si se está seguro de que
          funciona y se necesita este formato.










      gdbm

       Para activar el soporte de gdbm, añada la opción
       de compilación **--with-gdbm[=DIR]**.





      db2


        Para activar el soporte de Oracle Berkeley DB 2, añada la opción
        de compilación **--with-db2[=DIR]**.


**Nota**:

          db2 entra en conflicto con db3 y db4.










      db3


        Para activar el soporte de Oracle Berkeley DB 3, añada la opción
        de compilación **--with-db3[=DIR]**.


**Nota**:

          db3 entra en conflicto con db2 y db4.










      db4


        Para activar el soporte de Oracle Berkeley DB 4, añada la opción
        de compilación **--with-db4[=DIR]**.


**Nota**:

          db4 entra en conflicto con db2 y db3.




        **Nota**:



          Las bibliotecas db con versiones comprendidas entre 4.1 y 4.1.24 no pueden utilizarse con ninguna versión de PHP.




          El soporte DB5 se añadió en PHP 5.3.3.










      cdb


        Para activar el soporte de cdb, añada la opción
        de compilación **--with-cdb[=DIR]**.


**Nota**:

          Puede omitirse el uso de DIR, para aprovechar la biblioteca cdb proporcionada con PHP, que añade un gestor cdb_make, permite la creación de fichero
          cdb y permite el acceso a los ficheros cbd a través de la red con los flujos de PHP.










      flatfile


        Para activar el soporte de ficheros, añada la opción
        de compilación
       **--enable-flatfile**.
        Anteriormente a PHP 5.2.1 debía utilizarse la opción
        **--with-flatfile** en su lugar.


**Nota**:

          Esto se añadió para asegurar la compatibilidad con la extensión
          dbm que está obsoleta.
          Úsese este gestor solo cuando no pueda instalarse ningún otro gestor y no pueda utilizarse el gestor cdb integrado.










      inifile


        Para activar el soporte de inifile, añada la opción
        de compilación **--enable-inifile**.
        Anteriormente a PHP 5.2.1 debía utilizarse la opción
        **--with-inifile** en su lugar.


**Nota**:

          Esta opción se añadió para permitir leer y escribir en
          ficheros de inicialización de tipo Microsoft
          (.ini), como el php.ini por ejemplo.










      qdbm


        Para activar el soporte de qdbm, añada la opción de compilación
        **--with-qdbm[=DIR]**.


**Nota**:

          qdbm entra en conflicto con dbm y gdbm.




        **Nota**:



          La biblioteca qdbm puede descargarse desde
          [» http://fallabs.com/qdbm/index.html](http://fallabs.com/qdbm/index.html).










      tcadb


       Para activar el soporte de Tokyo Cabinet, añada la opción de compilación
       **--with-tcadb[=DIR]**.


**Nota**:

         La biblioteca Tokyo Cabinet puede ser
         descargada desde [» http://fallabs.com/tokyocabinet/](http://fallabs.com/tokyocabinet/).










      lmdb


        Para activar el soporte de Lightning Memory-Mapped Database añada
        la opción de configuración
        **--with-lmdb[=DIR]**.


**Nota**:

         Esto se añadió en PHP 7.2.0. La biblioteca
         Lightning Memory-Mapped Database puede descargarse desde
         [» https://symas.com/lmdb/](https://symas.com/lmdb/).








## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

    <caption>**Opciones de configuración DBA**</caption>



       Nombre
       Por defecto
       Cambiable
       Historial de cambios







        [dba.default_handler](#ini.dba.default_handler)

       DBA_DEFAULT
       **[INI_ALL](#constant.ini-all)**





Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      dba.default_handler
      [string](#language.types.string)



       El nombre del gestor por defecto





## Tipos de recursos

A partir de PHP 8.4.0, la mayoría de las funciones DBA operan sobre o devuelven recursos (por ejemplo, [dba_open()](#function.dba-open)
devuelve un identificador de enlace DBA positivo requerido por la mayoría de las funciones DBA).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[DBA_LMDB_USE_SUB_DIR](#constant.dba-lmdb-use-sub-dir)**
    ([int](#language.types.integer))



     Flag del controlador LMDB para permitir la creación de un subdirectorio para los ficheros de base de datos.
     Disponible a partir de PHP 8.2.0.







    **[DBA_LMDB_NO_SUB_DIR](#constant.dba-lmdb-no-sub-dir)**
    ([int](#language.types.integer))



     Flag del controlador LMDB para prohibir la creación de un subdirectorio para los ficheros de base de datos.
     Disponible a partir de PHP 8.2.0.

# Ejemplos

## Tabla de contenidos

- [Utilización](#dba.example)

    ## Utilización

    **Ejemplo #1 Ejemplo con DBA**

&lt;?php

$id = dba_open("/tmp/test.db", "n", "db2");

if (!$id) {
echo "dba_open ha fallado\n";
exit;
}

dba_replace("key", "¡Esto es un ejemplo!", $id);

if (dba_exists("key", $id)) {
echo dba_fetch("key", $id);
dba_delete("key", $id);
}

dba_close($id);
?&gt;

DBA gestiona datos binarios y no tiene límites arbitrarios.
Sin embargo, hereda todas las limitaciones definidas por
la implementación de la base de datos accedida.

Todas las bases de datos basadas en ficheros deben
proporcionar una forma de definir el modo de fichero de las nuevas
bases creadas. Este modo se pasa generalmente como cuarto argumento
de las funciones [dba_open()](#function.dba-open) o
[dba_popen()](#function.dba-popen).

Se puede acceder a todas las entradas de la base de datos de
forma lineal, utilizando las funciones [dba_firstkey()](#function.dba-firstkey)
y [dba_nextkey()](#function.dba-nextkey). No se puede modificar la
base de datos mientras se está leyendo.

    **Ejemplo #2 Lectura de una base de datos**

&lt;?php

// ...apertura de la base de datos...

$key = dba_firstkey($id);

while ($key !== false) {
    if (true) {          // se retiene la clave para realizar otras acciones más tarde
        $handle_later[] = $key;
    }
    $key = dba_nextkey($id);
}

foreach ($handle_later as $val) {
    dba_delete($val, $id);
}

?&gt;

# La clase Dba\Connection

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una clase totalmente opaca que reemplaza un recurso dba a partir de PHP 8.4.0.

## Sinopsis de la Clase

     final
     class **Dba\Connection**
     {

}

# Funciones de DBA

# dba_close

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_close — Cierra una base DBA

### Descripción

**dba_close**([Dba\Connection](#class.dba-connection) $dba): [void](language.types.void.html)

**dba_close()** cierra la conexión establecida con
la base de datos y libera todos los recursos del
handle.

### Parámetros

     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_open()](#function.dba-open) - Abre una base de datos DBA

    - [dba_popen()](#function.dba-popen) - Establece una conexión persistente a una base de datos DBA

# dba_delete

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_delete — Elimina una línea en una base DBA

### Descripción

**dba_delete**([string](#language.types.string)|[array](#language.types.array) $key, [Dba\Connection](#class.dba-connection) $dba): [bool](#language.types.boolean)

**dba_delete()** elimina la entrada
especificada por la clave key,
en la base identificada por handle.

### Parámetros

     key


       La clave de la entrada a eliminar.






     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_exists()](#function.dba-exists) - Verifica si una clave DBA existe

    - [dba_fetch()](#function.dba-fetch) - Lee los datos asociados a una clave DBA

    - [dba_insert()](#function.dba-insert) - Inserta una entrada DBA

    - [dba_replace()](#function.dba-replace) - Reemplaza o inserta una línea DBA

# dba_exists

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_exists — Verifica si una clave DBA existe

### Descripción

**dba_exists**([string](#language.types.string)|[array](#language.types.array) $key, [Dba\Connection](#class.dba-connection) $dba): [bool](#language.types.boolean)

**dba_exists()** verifica si la clave
key existe en la base identificada
por handle.

### Parámetros

     key


       La clave a verificar.






     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Retorna **[true](#constant.true)** si la clave existe, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_delete()](#function.dba-delete) - Elimina una línea en una base DBA

    - [dba_fetch()](#function.dba-fetch) - Lee los datos asociados a una clave DBA

    - [dba_insert()](#function.dba-insert) - Inserta una entrada DBA

    - [dba_replace()](#function.dba-replace) - Reemplaza o inserta una línea DBA

# dba_fetch

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_fetch — Lee los datos asociados a una clave DBA

### Descripción

**dba_fetch**([string](#language.types.string)|[array](#language.types.array) $key, [Dba\Connection](#class.dba-connection) $dba, [int](#language.types.integer) $skip = 0): [string](#language.types.string)|[false](#language.types.singleton)

Firma sobrecargada obsoleta a partir de 8.3.0:

**dba_fetch**([string](#language.types.string)|[array](#language.types.array) $key, [int](#language.types.integer) $skip, [resource](#language.types.resource) $dba): [string](#language.types.string)

**dba_fetch()** lee los datos especificados
por la clave key en la base identificada
por dba.

### Parámetros

     key


       La clave correspondiente a los datos.



      **Nota**:



        Al trabajar con ficheros .ini, esta función acepta
        arrays como claves donde el índice 0 es el grupo y el índice 1 es el nombre
        del valor. Ver la función [dba_key_split()](#function.dba-key-split).







     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).






     skip


       El número de pares clave-valor a ignorar al utilizar bases de datos cdb.
       Este valor es ignorado para todas las demás bases de datos que no admiten
       claves múltiples con el mismo nombre.





### Valores devueltos

Devuelve la cadena asociada si se encuentra el par clave/valor, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

      8.3.0

       La llamada a **dba_fetch()** con dba como
       tercer argumento es ahora obsoleta.




      8.2.0

       El argumento opcional "skip" de la función **dba_fetch()** ahora se coloca al final,
       conforme a la semántica PHP lado-usuario. La firma sobrecargada previamente
       sigue siendo aceptada pero desaconsejada.



### Ver también

    - [dba_exists()](#function.dba-exists) - Verifica si una clave DBA existe

    - [dba_delete()](#function.dba-delete) - Elimina una línea en una base DBA

    - [dba_insert()](#function.dba-insert) - Inserta una entrada DBA

    - [dba_replace()](#function.dba-replace) - Reemplaza o inserta una línea DBA

    - [dba_key_split()](#function.dba-key-split) - Transforma una representación de clave DBA por cadena en una

representación por array

# dba_firstkey

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_firstkey — Lee la primera clave DBA

### Descripción

**dba_firstkey**([Dba\Connection](#class.dba-connection) $dba): [string](#language.types.string)|[false](#language.types.singleton)

**dba_firstkey()** devuelve la primera clave
de la base de datos especificada por handle
y coloca el puntero interno de clave. Esto permitirá recorrer la base.

### Parámetros

     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Devuelve la clave en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_nextkey()](#function.dba-nextkey) - Lee la clave DBA siguiente

    - [dba_key_split()](#function.dba-key-split) - Transforma una representación de clave DBA por cadena en una

representación por array

    - Ejemplo 2 en los [ejemplos DBA](#dba.examples)

# dba_handlers

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

dba_handlers — Listar todos los gestores disponibles

### Descripción

**dba_handlers**([bool](#language.types.boolean) $full_info = **[false](#constant.false)**): [array](#language.types.array)

**dba_handlers()** lista todos los gestores soportados por esta
extensión.

### Parámetros

     full_info


       Activa/desactiva la mostración de la información completa en el resultado.





### Valores devueltos

Devuelve un array de gestores de bases de datos. Si full_info
está establecido a **[true](#constant.true)**, el array será asociativo con los nombres de los gestores como
claves y la información de su versión com valor. De otro modo, el resultado será
un array indexado de nombres de gestores.

**Nota**:

    Cuando se usa la biblioteca cdb interna verá
    cdb y cdb_make.

### Ejemplos

    **Ejemplo #1 Ejemplo de dba_handlers()**

&lt;?php

echo "Gestores de DBA disponibles:\n";
foreach (dba_handlers(true) as $nombre_gestor =&gt; $versión_gestor) {
  // limpiar las versiones
  $versión_gestor = str_replace('$', '', $versión_gestor);
echo " - $nombre_gestor: $versión_gestor\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Gestores de DBA disponibles:

- cdb: 0.75, Revision: 1.3.2.3
- cdb_make: 0.75, Revision: 1.2.2.4
- db2: Sleepycat Software: Berkeley DB 2.7.7: (08/20/99)
- inifile: 1.0, Revision: 1.6.2.3
- flatfile: 1.0, Revision: 1.5.2.4

# dba_insert

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_insert — Inserta una entrada DBA

### Descripción

**dba_insert**([string](#language.types.string)|[array](#language.types.array) $key, [string](#language.types.string) $value, [Dba\Connection](#class.dba-connection) $dba): [bool](#language.types.boolean)

**dba_insert()** inserta la entrada descrita
por la clave key y el valor
value en la base especificada
por handle.

### Parámetros

     key


       La clave de la entrada a insertar. Si esta clave ya existe en la base de datos,
       esta función fallará. Utilice la función [dba_replace()](#function.dba-replace)
       si se debe reemplazar una clave existente.






     value


       El valor a insertar.






     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_exists()](#function.dba-exists) - Verifica si una clave DBA existe

    - [dba_delete()](#function.dba-delete) - Elimina una línea en una base DBA

    - [dba_fetch()](#function.dba-fetch) - Lee los datos asociados a una clave DBA

    - [dba_replace()](#function.dba-replace) - Reemplaza o inserta una línea DBA

# dba_key_split

(PHP 5, PHP 7, PHP 8)

dba_key_split —
Transforma una representación de clave DBA por cadena en una
representación por array

### Descripción

**dba_key_split**([string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null) $key): [array](#language.types.array)|[false](#language.types.singleton)

**dba_key_split()** transforma una representación de
clave DBA por cadena en una representación por array.

### Parámetros

     key


       La clave en forma de string.





### Valores devueltos

Devuelve un array en la forma array(0 =&gt; group, 1 =&gt;
nom_valeur). Esta función devuelve **[false](#constant.false)** si
key es **[null](#constant.null)** o **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Pasar **[null](#constant.null)** o **[false](#constant.false)** a key
       está ahora deprecado.



### Ver también

    - [dba_firstkey()](#function.dba-firstkey) - Lee la primera clave DBA

    - [dba_nextkey()](#function.dba-nextkey) - Lee la clave DBA siguiente

    - [dba_fetch()](#function.dba-fetch) - Lee los datos asociados a una clave DBA

# dba_list

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

dba_list — Lista todos los ficheros de bases de datos DBA abiertos

### Descripción

**dba_list**(): [array](#language.types.array)

**dba_list()** lista todos los ficheros de bases de datos
DBA abiertos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array asociativo, bajo la forma
idressource =&gt; nomfichier.

# dba_nextkey

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_nextkey — Lee la clave DBA siguiente

### Descripción

**dba_nextkey**([Dba\Connection](#class.dba-connection) $dba): [string](#language.types.string)|[false](#language.types.singleton)

**dba_nextkey()** devuelve la clave siguiente,
en la base identificada por handle y
incrementa el puntero de clave.

### Parámetros

     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Devuelve la clave en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_firstkey()](#function.dba-firstkey) - Lee la primera clave DBA

    - [dba_key_split()](#function.dba-key-split) - Transforma una representación de clave DBA por cadena en una

representación por array

    - Ejemplo 2 en los [ejemplos DBA](#dba.examples)

# dba_open

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_open — Abre una base de datos DBA

### Descripción

**dba_open**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $mode,
    [?](#language.types.null)[string](#language.types.string) $handler = **[null](#constant.null)**,
    [int](#language.types.integer) $permission = 0644,
    [int](#language.types.integer) $map_size = 0,
    [?](#language.types.null)[int](#language.types.integer) $flags = **[null](#constant.null)**
): [Dba\Connection](#class.dba-connection)|[false](#language.types.singleton)

**dba_open()** establece una conexión a
la base identificada por path con el
modo mode y el identificador
handler.

### Parámetros

     path


       Ruta en el sistema de archivos.






     mode


       Puede ser r para solo lectura, w para
       lectura/escritura, c para lectura/escritura y creación si la base no existe,
       y n para creación, sobrescritura y acceso en lectura/escritura.
       La base de datos se crea en modo BTree; los otros modos (como Hash o Queue) no son soportados.




       Además, se puede elegir el método de bloqueo de la base con el
       carácter siguiente. Utilice l para bloquear la base con un
       fichero .lck, o d para bloquear
       la base misma. Es importante que las aplicaciones utilicen estas
       opciones de manera coherente.




       Si se desea probar la posibilidad de acceso sin esperar la disponibilidad del bloqueo,
       se puede añadir la letra t como tercer carácter. Cuando se está absolutamente seguro
       de que la base no requiere bloqueo, se puede utilizar el guión -
       en lugar de l o d.
       Cuando no se utiliza ni d, ni l ni
       -, dba bloqueará en modo d.



      **Nota**:



        Solo puede haber un tipo de escritura en la base. Cuando se utiliza dba en un servidor web,
        y varias peticiones HTTP realizan escrituras, estas solo pueden realizarse una tras otra. De igual
        manera, la lectura durante la escritura no es posible. La extensión dba utiliza un bloqueo para evitar
        estos problemas. A continuación se muestra la tabla de bloqueo:



         <caption>**Bloqueo DBA**</caption>



            ya abierta
            mode = "rl"
            mode = "rlt"
            mode = "wl"
            mode = "wlt"
            mode = "rd"
            mode = "rdt"
            mode = "wd"
            mode = "wdt"






            no abierta
            ok
            ok
            ok
            ok
            ok
            ok
            ok
            ok



            mode = "rl"
            ok
            ok
            esperando
            **[false](#constant.false)**
            ilegal
            ilegal
            ilegal
            ilegal



            mode = "wl"
            esperando
            **[false](#constant.false)**
            esperando
            **[false](#constant.false)**
            ilegal
            ilegal
            ilegal
            ilegal



            mode = "rd"
            ilegal
            ilegal
            ilegal
            ilegal
            ok
            ok
            esperando
            **[false](#constant.false)**



            mode = "wd"
            ilegal
            ilegal
            ilegal
            ilegal
            esperando
            **[false](#constant.false)**
            esperando
            **[false](#constant.false)**







         - ok: La segunda llamada tiene éxito.

         - esperando: La segunda llamada espera a que [dba_close()](#function.dba-close)
          sea llamada por el primer script.

         - false: La segunda llamada devuelve **[false](#constant.false)**.

         - ilegal: No se deben mezclar las opciones
          "l" y "d" para el parámetro
          mode.







     handler


       El nombre del [gestor](#dba.requirements)
       que debe ser utilizado para acceder a path.
       Se pasa a todos los parámetros opcionales dados a
       **dba_open()** y puede actuar en su nombre.
       Si el parámetro handler es **[null](#constant.null)**,
       entonces se invoca el gestor por defecto.






     permission


       Parámetro opcional de tipo [int](#language.types.integer) que se pasa al controlador. Tiene el mismo significado que
       el parámetro permissions de la función [chmod()](#function.chmod),
       y tiene un valor por omisión de 0644.




       Los controladores db1, db2,
       db3, db4, dbm,
       gdbm,
       Los controladores ndbm y lmdb soportan el
       parámetro permission.




       El controlador lmdb soporta dos parámetros adicionales.
       El primero permite definir el $filemode
       (ver descripción anterior), y el segundo permite definir la
       $mapsize, cuyo valor debería ser un múltiplo del tamaño de página del sistema operativo,
       o cero para utilizar la mapsize por defecto.
       El parámetro $mapsize es soportado a partir de
       PHP 7.3.14 y 7.4.2, respectivamente.






     map_size


       Parámetro opcional de tipo [int](#language.types.integer) que se pasa al controlador. Su valor debe ser un múltiplo del
       tamaño de página del sistema operativo, o cero para utilizar el tamaño de mappage por defecto.




       Solo el controlador lmdb acepta el parámetro map_size.






     flags


       Bandera a pasar a los controladores de base de datos. Si es **[null](#constant.null)**, se proporcionarán las banderas por defecto.
       Actualmente, solo el controlador LMDB soporta las siguientes banderas:
       **[DBA_LMDB_USE_SUB_DIR](#constant.dba-lmdb-use-sub-dir)** y
       **[DBA_LMDB_NO_SUB_DIR](#constant.dba-lmdb-no-sub-dir)**.





### Errores/Excepciones

**[false](#constant.false)** es devuelto y se emite un error de nivel **[E_WARNING](#constant.e-warning)** cuando
el parámetro handler es **[null](#constant.null)**, pero no hay ningún gestor por defecto disponible.

### Valores devueltos

Devuelve una instancia [Dba\Connection](#class.dba-connection) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Ahora devuelve una instancia de [Dba\Connection](#class.dba-connection);
       anteriormente se devolvía un [resource](#language.types.resource).




      8.2.0

       Se añade el parámetro flags.




      8.2.0

       El parámetro handler ahora es nullable.




      7.3.14, 7.4.2

       El controlador lmdb ahora soporta un parámetro
       adicional map_size.



### Ver también

    - [dba_popen()](#function.dba-popen) - Establece una conexión persistente a una base de datos DBA

    - [dba_close()](#function.dba-close) - Cierra una base DBA

# dba_optimize

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_optimize — Optimiza una base DBA

### Descripción

**dba_optimize**([Dba\Connection](#class.dba-connection) $dba): [bool](#language.types.boolean)

**dba_optimize()** optimiza la base de datos
identificada por handle.

### Parámetros

     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_sync()](#function.dba-sync) - Sincroniza una base de datos DBA

# dba_popen

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_popen — Establece una conexión persistente a una base de datos DBA

### Descripción

**dba_popen**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $mode,
    [?](#language.types.null)[string](#language.types.string) $handler = **[null](#constant.null)**,
    [int](#language.types.integer) $permission = 0644,
    [int](#language.types.integer) $map_size = 0,
    [?](#language.types.null)[int](#language.types.integer) $flags = **[null](#constant.null)**
): [Dba\Connection](#class.dba-connection)|[false](#language.types.singleton)

**dba_popen()** establece una conexión persistente
a la base identificada por path
con el modo mode, utilizando el identificador
handler.

### Parámetros

     path


       Ruta en el sistema de ficheros.






     mode


       Puede ser r para solo lectura, w para
       lectura/escritura, c para lectura/escritura y creación si la base no existe,
       y n para creación, sobrescritura y acceso en lectura/escritura.






     handler


       El nombre del
       [gestor](#dba.requirements) que debe ser
       utilizado para acceder a path. El gestor recibe todos los argumentos adicionales
       pasados a la función **dba_popen()**. Si el argumento handler es **[null](#constant.null)**,
       entonces se invoca el gestor por defecto.






     permission


       Argumento opcional de tipo entero ([int](#language.types.integer)) que se pasa al controlador. Tiene el mismo significado
       que el argumento permissions de la función [chmod()](#function.chmod),
       y su valor por omisión es 0644.




       Los controladores db1, db2,
       db3, db4, dbm,
       gdbm,
       ndbm y lmdb admiten el argumento
       permission.






     map_size


       Argumento opcional de tipo [int](#language.types.integer) que se pasa al controlador. Su valor debe ser un múltiplo de la
       tamaño de página del sistema operativo, o cero para utilizar el tamaño de mapa por omisión.




       El controlador lmdb acepta el argumento map_size.






     flags


       Permite pasar banderas a los controladores de base de datos. Actualmente, solo el controlador LMDB con
       las banderas **[DBA_LMDB_USE_SUB_DIR](#constant.dba-lmdb-use-sub-dir)** y **[DBA_LMDB_NO_SUB_DIR](#constant.dba-lmdb-no-sub-dir)** es soportado.





### Valores devueltos

Devuelve una instancia de [Dba\Connection](#class.dba-connection) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

El valor **[false](#constant.false)** es devuelto y un error de nivel **[E_WARNING](#constant.e-warning)** es emitido cuando
el argumento handler es **[null](#constant.null)**, pero no hay ningún gestor por defecto disponible.

### Historial de cambios

          Versión
          Descripción






         8.4.0

          Ahora devuelve una instancia de [Dba\Connection](#class.dba-connection);
          anteriormente se devolvía un [resource](#language.types.resource).




         8.2.0

            Se añadió el argumento flags.




          8.2.0

            El argumento handler ahora es nullable.




          7.3.14, 7.4.2

            El controlador lmdb ahora soporta un argumento
            adicional map_size.





### Ver también

    - [dba_open()](#function.dba-open) - Abre una base de datos DBA

    - [dba_close()](#function.dba-close) - Cierra una base DBA

# dba_replace

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_replace — Reemplaza o inserta una línea DBA

### Descripción

**dba_replace**([string](#language.types.string)|[array](#language.types.array) $key, [string](#language.types.string) $value, [Dba\Connection](#class.dba-connection) $dba): [bool](#language.types.boolean)

**dba_replace()** reemplaza o inserta una entrada,
para la clave key y con el valor
value en la base identificada por
dba.

### Parámetros

     key


       La clave de la entrada a reemplazar.






     value


       El valor utilizado para el reemplazo.






     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_exists()](#function.dba-exists) - Verifica si una clave DBA existe

    - [dba_delete()](#function.dba-delete) - Elimina una línea en una base DBA

    - [dba_fetch()](#function.dba-fetch) - Lee los datos asociados a una clave DBA

    - [dba_insert()](#function.dba-insert) - Inserta una entrada DBA

# dba_sync

(PHP 4, PHP 5, PHP 7, PHP 8)

dba_sync — Sincroniza una base de datos DBA

### Descripción

**dba_sync**([Dba\Connection](#class.dba-connection) $dba): [bool](#language.types.boolean)

**dba_sync()** sincroniza la base de datos
especificada por handle. Si es admisible,
esto probablemente iniciará una operación de reescritura física del fichero.

### Parámetros

     dba


       A [Dba\Connection](#class.dba-connection) instance, returned by [dba_open()](#function.dba-open) or [dba_popen()](#function.dba-popen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

The dba parameter expects a [Dba\Connection](#class.dba-connection)
instance now; previously, a valid dba [resource](#language.types.resource) was expected.

### Ver también

    - [dba_optimize()](#function.dba-optimize) - Optimiza una base DBA

## Tabla de contenidos

- [dba_close](#function.dba-close) — Cierra una base DBA
- [dba_delete](#function.dba-delete) — Elimina una línea en una base DBA
- [dba_exists](#function.dba-exists) — Verifica si una clave DBA existe
- [dba_fetch](#function.dba-fetch) — Lee los datos asociados a una clave DBA
- [dba_firstkey](#function.dba-firstkey) — Lee la primera clave DBA
- [dba_handlers](#function.dba-handlers) — Listar todos los gestores disponibles
- [dba_insert](#function.dba-insert) — Inserta una entrada DBA
- [dba_key_split](#function.dba-key-split) — Transforma una representación de clave DBA por cadena en una
  representación por array
- [dba_list](#function.dba-list) — Lista todos los ficheros de bases de datos DBA abiertos
- [dba_nextkey](#function.dba-nextkey) — Lee la clave DBA siguiente
- [dba_open](#function.dba-open) — Abre una base de datos DBA
- [dba_optimize](#function.dba-optimize) — Optimiza una base DBA
- [dba_popen](#function.dba-popen) — Establece una conexión persistente a una base de datos DBA
- [dba_replace](#function.dba-replace) — Reemplaza o inserta una línea DBA
- [dba_sync](#function.dba-sync) — Sincroniza una base de datos DBA

- [Introducción](#intro.dba)
- [Instalación/Configuración](#dba.setup)<li>[Requerimientos](#dba.requirements)
- [Instalación](#dba.installation)
- [Configuración en tiempo de ejecución](#dba.configuration)
- [Tipos de recursos](#dba.resources)
  </li>- [Constantes predefinidas](#dba.constants)
- [Ejemplos](#dba.examples)<li>[Utilización](#dba.example)
  </li>- [Dba\Connection](#class.dba-connection) — La clase Dba\Connection
- [Funciones de DBA](#ref.dba)<li>[dba_close](#function.dba-close) — Cierra una base DBA
- [dba_delete](#function.dba-delete) — Elimina una línea en una base DBA
- [dba_exists](#function.dba-exists) — Verifica si una clave DBA existe
- [dba_fetch](#function.dba-fetch) — Lee los datos asociados a una clave DBA
- [dba_firstkey](#function.dba-firstkey) — Lee la primera clave DBA
- [dba_handlers](#function.dba-handlers) — Listar todos los gestores disponibles
- [dba_insert](#function.dba-insert) — Inserta una entrada DBA
- [dba_key_split](#function.dba-key-split) — Transforma una representación de clave DBA por cadena en una
  representación por array
- [dba_list](#function.dba-list) — Lista todos los ficheros de bases de datos DBA abiertos
- [dba_nextkey](#function.dba-nextkey) — Lee la clave DBA siguiente
- [dba_open](#function.dba-open) — Abre una base de datos DBA
- [dba_optimize](#function.dba-optimize) — Optimiza una base DBA
- [dba_popen](#function.dba-popen) — Establece una conexión persistente a una base de datos DBA
- [dba_replace](#function.dba-replace) — Reemplaza o inserta una línea DBA
- [dba_sync](#function.dba-sync) — Sincroniza una base de datos DBA
  </li>
