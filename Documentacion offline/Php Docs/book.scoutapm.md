# ScoutAPM

# Introducción

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

La extensión ScoutAPM proporciona funcionalidades adicionales para la supervisión de aplicaciones en comparación con el uso de la biblioteca del espacio de usuario PHP básica.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#scoutapm.requirements)
- [Instalación](#scoutapm.installation)

    ## Requerimientos
    - PHP &gt;= 7.1.0
    - Windows no es actualmente soportado

    ## Instalación

    Esta extensión está disponible en PECL. Ejecute:

$ sudo pecl install scoutapm

Puede que sea necesario añadir Scout a su _php.ini_, por ejemplo:

extension=scoutapm.so

# Funciones de Scoutapm

# scoutapm_get_calls

(PECL scoutapm &gt;= 1.0.0)

scoutapm_get_calls — Devuelve una lista de llamadas instrumentadas que se han producido

### Descripción

**scoutapm_get_calls**(): [array](#language.types.array)

Devuelve una lista de todas las llamadas a funciones instrumentadas registradas desde la última vez que la función **scoutapm_get_calls()** fue llamada. La lista se borra cada vez que la función es llamada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**scoutapm_get_calls()** devuelve un array que contiene una lista
de todas las llamadas registradas a funciones instrumentadas.

### Ejemplos

**Ejemplo #1 Obtener las llamadas instrumentadas**

&lt;?php

file_get_contents('a.txt');
file_get_contents('b.txt');

print_r(scoutapm_get_calls());
?&gt;

    Resultado del ejemplo anterior es similar a:



     Array

(
[0] =&gt; Array
(
[function] =&gt; file_get_contents
[entered] =&gt; 1576839727.7934
[exited] =&gt; 1576839727.7935
[time_taken] =&gt; 2.7894973754883E-5
[argv] =&gt; Array
(
[0] =&gt; a.txt
)

        )

    [1] =&gt; Array
        (
            [function] =&gt; file_get_contents
            [entered] =&gt; 1576839727.7935
            [exited] =&gt; 1576839727.7935
            [time_taken] =&gt; 7.8678131103516E-6
            [argv] =&gt; Array
                (
                    [0] =&gt; b.txt
                )

        )

)

# scoutapm_list_instrumented_functions

(PECL scoutapm &gt;= 1.0.2)

scoutapm_list_instrumented_functions — Lista las funciones que scoutapm va a instrumentar.

### Descripción

**scoutapm_list_instrumented_functions**(): [array](#language.types.array)

Devuelve una lista de las funciones que la extensión va a instrumentar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**scoutapm_list_instrumented_functions()** devuelve un array
que contiene una lista de todas las funciones que la extensión scoutapm es capaz
de instrumentar en la instalación actual.

### Ejemplos

**Ejemplo #1 Obtener la lista de funciones que scoutapm va a instrumentar**

     &lt;?php

print_r(scoutapm_list_instrumented_functions());
?&gt;

    Resultado del ejemplo anterior es similar a:



     Array

(
[0] =&gt; file_get_contents
[1] =&gt; file_put_contents
[2] =&gt; fopen
[3] =&gt; fread
[4] =&gt; fwrite
[5] =&gt; pdo-&gt;exec
[6] =&gt; pdo-&gt;query
[7] =&gt; pdo-&gt;prepare
[8] =&gt; pdostatement-&gt;execute
)

## Tabla de contenidos

- [scoutapm_get_calls](#function.scoutapm-get-calls) — Devuelve una lista de llamadas instrumentadas que se han producido
- [scoutapm_list_instrumented_functions](#function.scoutapm-list-instrumented-functions) — Lista las funciones que scoutapm va a instrumentar.

- [Introducción](#intro.scoutapm)
- [Instalación/Configuración](#scoutapm.setup)<li>[Requerimientos](#scoutapm.requirements)
- [Instalación](#scoutapm.installation)
  </li>- [Funciones de Scoutapm](#ref.scoutapm)<li>[scoutapm_get_calls](#function.scoutapm-get-calls) — Devuelve una lista de llamadas instrumentadas que se han producido
- [scoutapm_list_instrumented_functions](#function.scoutapm-list-instrumented-functions) — Lista las funciones que scoutapm va a instrumentar.
  </li>
