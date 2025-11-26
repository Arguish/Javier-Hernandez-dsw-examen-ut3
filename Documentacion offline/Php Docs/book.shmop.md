# Memoria compartida

# Introducción

Shmop es un conjunto de funciones que permiten a PHP leer,
escribir, crear y borrar de forma sencilla segmentos de memoria compartida de tipo UNIX.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#shmop.installation)
- [Tipos de recursos](#shmop.resources)

## Instalación

Para utilizar shmop tendrá que compilar PHP con el parámetro
**--enable-shmop** en su
línea de configuración.

## Tipos de recursos

Anterior a PHP 8.0.0 esta extensión define el tipo de recurso
shmop que es un manejador para un bloque de memoria compartida.

# Ejemplos

## Tabla de contenidos

- [Uso básico](#shmop.examples-basic)

    ## Uso básico

    **Ejemplo #1 Resumen de las operaciones con Memoria Compartida**

&lt;?php

// Crear un segmento de memoria compartida de 100 bytes con un identificador igual a 0xff3
$shm_id = shmop_open(0xff3, "c", 0644, 100);
if (!$shm_id) {
echo "Couldn't create shared memory segment\n";
}

// Obtener tamaño del segmento de memoria compartida
$shm_size = shmop_size($shm_id);
echo "SHM Block Size: " . $shm_size . " has been created.\n";

// Escribir una cadena de prueba en la memoria compartida
$shm_bytes_written = shmop_write($shm_id, "my shared memory block", 0);
if ($shm_bytes_written != strlen("my shared memory block")) {
echo "Couldn't write the entire length of data\n";
}

// Ahora vamos a leer la cadena de texto
$my_string = shmop_read($shm_id, 0, $shm_size);
if (!$my_string) {
echo "Couldn't read from shared memory block\n";
}
echo "The data inside shared memory was: " . $my_string . "\n";

//Ahora vamos a eliminar y cerrar el segmento de memoria compartida
if (!shmop_delete($shm_id)) {
    echo "Couldn't mark shared memory block for deletion.";
}
shmop_close($shm_id);

?&gt;

# Funciones de memoria compartida

# shmop_close

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

shmop_close — Cierra un bloque de memoria compartida

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**shmop_close**([Shmop](#class.shmop) $shmop): [void](language.types.void.html)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

**shmop_close()** sirve para cerrar un bloque de
memoria compartida.

### Parámetros

     shmop


       El recurso de memoria compartida creado por
       [shmop_open()](#function.shmop-open).





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido declarada obsoleta, ya que no tiene ningún efecto.




      8.0.0

       shmop espera una instancia de [Shmop](#class.shmop)
       ahora; anteriormente se esperaba un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Cierre de un bloque de memoria compartida**

&lt;?php
shmop_close($shm_id);
?&gt;

Este ejemplo cierra el bloque de memoria compartida
identificado por $shm_id.

### Ver también

    - [shmop_open()](#function.shmop-open) - Crea o abre un bloque de memoria compartida

# shmop_delete

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

shmop_delete — Destruye un bloque de memoria compartida

### Descripción

**shmop_delete**([Shmop](#class.shmop) $shmop): [bool](#language.types.boolean)

**shmop_delete()** se utiliza para destruir un bloque de memoria compartida.

### Parámetros

     shmop


       El recurso de memoria compartida creado por
       [shmop_open()](#function.shmop-open).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       shmop ahora requiere una instancia de [Shmop](#class.shmop);
       anteriormente se esperaba un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Eliminación de un bloque de memoria compartida**

&lt;?php
shmop_delete($shm_id);
?&gt;

Este ejemplo elimina el bloque de memoria compartida
identificado por $shm_id.

# shmop_open

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

shmop_open — Crea o abre un bloque de memoria compartida

### Descripción

**shmop_open**(
    [int](#language.types.integer) $key,
    [string](#language.types.string) $mode,
    [int](#language.types.integer) $permissions,
    [int](#language.types.integer) $size
): [Shmop](#class.shmop)|[false](#language.types.singleton)

**shmop_open()** puede crear o abrir un bloque
de memoria compartida.

### Parámetros

     key


       Identificador del sistema para el bloque de memoria compartida.
       Este argumento puede ser pasado como un decimal o
       un hexadecimal.






     mode


       Se pueden utilizar:



        -

          "a" para acceso (utiliza SHM_RDONLY para shmat)
          utilice esta opción para abrir un bloque ya existente en modo solo lectura.



        -

          "c" para creación (utiliza IPC_CREATE)
          utilice esta opción para crear un nuevo bloque, o, si un
          segmento con el mismo identificador existe, intentar acceder a él en
          modo lectura y escritura.



        -

          "w" para acceso en lectura y escritura. Utilice
          esta opción cuando se deba acceder en lectura y
          escritura a un segmento de memoria compartida.
          Este es el caso más común.



        -

          "n" crea un nuevo segmento de memoria compartida
          (utiliza IPC_CREATE|IPC_EXCL). Utilice esta opción
          cuando se quiera crear un nuevo segmento de memoria
          compartida a menos que ya exista uno corrupto con la
          misma opción. Esto es muy útil por razones de seguridad, para evitar
          agujeros de seguridad que exploten la carrera por los recursos.








     permissions


       Los permisos que se otorgan a este bloque. Son
       los mismos que para los archivos. Estos permisos deben
       ser pasados en formato octal (i.e. 0644).






     size


       El tamaño del bloque de memoria compartida que se quiere crear, en bytes





**Nota**:

     Nota: Los tercer y cuarto argumentos deben ser pasados a 0 si se quiere abrir un bloque de memoria compartida ya existente.

### Valores devueltos

En caso de éxito, **shmop_open()** devuelve una
instancia de [Shmop](#class.shmop) que puede ser utilizada para acceder a la memoria que
se acaba de crear. **[false](#constant.false)** será devuelto en caso de fallo.

### Errores/Excepciones

Si mode es inválido, o si size es inferior o igual a cero,
se lanza una [ValueError](#class.valueerror).
En otros casos de fallo, se emite un **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       shmop ahora espera una instancia de [Shmop](#class.shmop)
       anteriormente se esperaba un [resource](#language.types.resource).




      8.0.0

       Si mode es inválido, o si size es inferior o igual a cero,
       se lanza una [ValueError](#class.valueerror); anteriormente, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar,
       y la función devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Crear un nuevo bloque de memoria compartida Shmop**

&lt;?php
$shm_key = ftok(__FILE__, 't');
$shm_id = shmop_open($shm_key, "c", 0644, 100);
?&gt;

Este ejemplo abre un nuevo bloque de memoria compartida,
cuyo identificador es devuelto por [ftok()](#function.ftok).

### Ver también

    - [shmop_close()](#function.shmop-close) - Cierra un bloque de memoria compartida

    - [shmop_delete()](#function.shmop-delete) - Destruye un bloque de memoria compartida

# shmop_read

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

shmop_read — Lee datos a partir de un bloque

### Descripción

**shmop_read**([Shmop](#class.shmop) $shmop, [int](#language.types.integer) $offset, [int](#language.types.integer) $size): [string](#language.types.string)

**shmop_read()** lee una cadena en un bloque de
memoria compartida.

### Parámetros

     shmop


       El identificador del bloque de memoria compartida, creado por la función
       [shmop_open()](#function.shmop-open)






     offset


       Posición desde la cual se debe comenzar a leer; debe ser superior o igual a cero
       e inferior o igual a la longitud real del segmento de memoria compartida.






     size


       El número de bytes a leer; debe ser superior o igual a cero,
       y la suma de offset y size
       debe ser inferior o igual a la longitud real del segmento de memoria compartida.
       0 lee shmop_size($shmid) - $start bytes.





### Valores devueltos

Devuelve los datos.

### Errores/Excepciones

Si offset o size están fuera del rango,
se lanza una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       shmop ahora requiere una instancia de [Shmop](#class.shmop)
       en lugar de un [resource](#language.types.resource).




      8.0.0

       Si offset o size están fuera de límite,
       se lanza una [ValueError](#class.valueerror); anteriormente se emitía una **[E_WARNING](#constant.e-warning)**
       y se devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Lee un bloque de memoria compartida**

&lt;?php
$shm_data = shmop_read($shm_id, 0, 50);
?&gt;

Este ejemplo lee 50 bytes del bloque de memoria compartida
y los coloca en $shm_data.

### Ver también

    - [shmop_write()](#function.shmop-write) - Escribir en un bloque de memoria compartida

# shmop_size

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

shmop_size — Leer el tamaño del bloque de memoria compartida

### Descripción

**shmop_size**([Shmop](#class.shmop) $shmop): [int](#language.types.integer)

**shmop_size()** sirve para conocer
el tamaño en bytes de un bloque de memoria compartida.

### Parámetros

     shmop


       El identificador del bloque de memoria compartido creado por la función
       [shmop_open()](#function.shmop-open)





### Valores devueltos

Devuelve un [int](#language.types.integer), que representa el número de bytes que ocupa
la memoria compartida.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       shmop espera ahora una instancia de [Shmop](#class.shmop)
       anteriormente se esperaba un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Lee el tamaño de un bloque de memoria compartida**

&lt;?php
$shm_size = shmop_size($shm_id);
?&gt;

Este ejemplo lee el tamaño del bloque identificado por
$shm_id, y lo coloca en $shm_size.

# shmop_write

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

shmop_write — Escribir en un bloque de memoria compartida

### Descripción

**shmop_write**([Shmop](#class.shmop) $shmop, [string](#language.types.string) $data, [int](#language.types.integer) $offset): [int](#language.types.integer)

**shmop_write()** escribe una cadena en
un bloque de memoria compartida.

### Parámetros

     shmop


       El identificador del bloque de memoria compartida, creado por la función
       [shmop_open()](#function.shmop-open)






     data


       Una cadena para escribir en el bloque de la memoria compartida






     offset


       Especifica la posición desde la cual los datos deben ser escritos
       en la memoria compartida. El offset debe ser superior o igual a cero
       e inferior o igual al tamaño real del segmento de memoria compartida.





### Valores devueltos

El tamaño de los datos escritos.

### Errores/Excepciones

Si offset está fuera de límite, o si un segmento de memoria compartida
de solo lectura debe ser escrito, se levanta una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Anterior a PHP 8.0.0, **[false](#constant.false)** era devuelto en caso de fallo.




      8.0.0

       shmop espera ahora una instancia de [Shmop](#class.shmop);
       anteriormente se esperaba un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Escribe un bloque de memoria compartida**

&lt;?php
$shm_bytes_written = shmop_write($shm_id, $my_string, 0);
?&gt;

Este ejemplo escribe los datos de la cadena
$my_string en un bloque de memoria
compartida. $shm_bytes_written
representará el número de bytes escritos.

### Ver también

    - [shmop_read()](#function.shmop-read) - Lee datos a partir de un bloque

## Tabla de contenidos

- [shmop_close](#function.shmop-close) — Cierra un bloque de memoria compartida
- [shmop_delete](#function.shmop-delete) — Destruye un bloque de memoria compartida
- [shmop_open](#function.shmop-open) — Crea o abre un bloque de memoria compartida
- [shmop_read](#function.shmop-read) — Lee datos a partir de un bloque
- [shmop_size](#function.shmop-size) — Leer el tamaño del bloque de memoria compartida
- [shmop_write](#function.shmop-write) — Escribir en un bloque de memoria compartida

# La clase Shmop

(PHP 8)

## Introducción

    Una clase opaca que reemplaza los recursos shmop a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **Shmop**
     {

}

- [Introducción](#intro.shmop)
- [Instalación/Configuración](#shmop.setup)<li>[Instalación](#shmop.installation)
- [Tipos de recursos](#shmop.resources)
  </li>- [Ejemplos](#shmop.examples)<li>[Uso básico](#shmop.examples-basic)
  </li>- [Funciones de memoria compartida](#ref.shmop)<li>[shmop_close](#function.shmop-close) — Cierra un bloque de memoria compartida
- [shmop_delete](#function.shmop-delete) — Destruye un bloque de memoria compartida
- [shmop_open](#function.shmop-open) — Crea o abre un bloque de memoria compartida
- [shmop_read](#function.shmop-read) — Lee datos a partir de un bloque
- [shmop_size](#function.shmop-size) — Leer el tamaño del bloque de memoria compartida
- [shmop_write](#function.shmop-write) — Escribir en un bloque de memoria compartida
  </li>- [Shmop](#class.shmop) — La clase Shmop
