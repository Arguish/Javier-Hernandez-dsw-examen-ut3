# Apache

## Introducción

Estas funciones sólo están disponibles cuando se ejecuta PHP como módulo de Apache.

---

## Instalación/Configuración

### Instalación

Para instalar PHP en Apache, vea el capítulo de instalación.

### Configuración en tiempo de ejecución

El comportamiento del módulo de PHP de Apache está regido por los valores definidos en `php.ini`. Estos valores pueden ser sobreescritos por la configuración del `php_flag` en el fichero de configuración del servidor o por los ficheros `.htaccess` locales.

**Ejemplo:** Desactivar el intérprete de PHP en un directorio utilizando `.htaccess`:

```apacheconf
php_flag engine off
```

**Opciones de configuración de Apache:**
| Nombre | Por defecto | Cambiable | Historial de cambios |
|------------------|-------------|-----------|---------------------|
| engine | "1" | INI_ALL | |
| child_terminate | "0" | INI_ALL | |
| last_modified | "0" | INI_ALL | |
| xbithack | "0" | INI_ALL | |

Para más detalles sobre los modos INI\_\*, refiérase a "Dónde una directiva de configuración puede ser modificada".

#### Parámetros de configuración

-   **engine (bool):** Activa o desactiva la ejecución de PHP. Se usa para controlar la activación/desactivación de PHP en cada directorio o servidor virtual.
-   **child_terminate (bool):** Especifica si los scripts PHP pueden solicitar la finalización de los procesos hijos al finalizar la petición. Véase también `apache_child_terminate()`.
-   **last_modified (bool):** Envía la fecha de modificación de los scripts PHP con la cabecera 'Last-Modified:'.
-   **xbithack (bool):** Analiza los ficheros con bit de ejecución establecido para PHP, independientemente de la extensión.

---

## Funciones de Apache

### apache_child_terminate

Termina el proceso Apache después de esta petición.

**Descripción:**

```php
void apache_child_terminate()
```

Programa el proceso Apache para que se termine una vez finalizada la petición PHP actual. Útil para liberar memoria después de scripts intensivos. No implementada en Windows.

**Parámetros:** Ninguno
**Valores devueltos:** Ninguno
**Notas:** No disponible en Windows.
**Ver también:** `exit()`

---

### apache_get_modules

Devuelve la lista de módulos Apache cargados.

**Descripción:**

```php
array apache_get_modules()
```

Devuelve la lista de módulos Apache cargados.

**Ejemplo:**

```php
<?php
print_r(apache_get_modules());
?>
```

**Resultado:**

```
Array
(
    [0] => core
    [1] => http_core
    [2] => mod_so
    [3] => sapi_apache2
    [4] => mod_mime
    [5] => mod_rewrite
)
```

---

### apache_get_version

Obtiene la versión de Apache.

**Descripción:**

```php
string|false apache_get_version()
```

Devuelve la versión de Apache o `false` en caso de error.

**Ejemplo:**

```php
<?php
$version = apache_get_version();
echo "$version\n";
?>
```

**Resultado:**

```
Apache/1.3.29 (Unix) PHP/4.3.4
```

**Ver también:** `phpinfo()`

---

### apache_getenv

Lee una variable de proceso Apache.

**Descripción:**

```php
string|false apache_getenv(string $variable, bool $walk_to_top = false)
```

Recupera una variable de entorno de Apache.

**Parámetros:**

-   `variable`: La variable de entorno Apache.
-   `walk_to_top`: Si es `true`, recupera la variable de nivel superior.

**Ejemplo:**

```php
<?php
$ret = apache_getenv("SERVER_ADDR");
echo $ret;
?>
```

**Resultado:**

```
42.24.42.240
```

**Ver también:** `apache_setenv()`, `getenv()`, Superglobales

---

### apache_lookup_uri

Realiza una petición parcial para el URI especificado y devuelve toda la información relacionada.

**Descripción:**

```php
object|false apache_lookup_uri(string $filename)
```

Devuelve un objeto con información sobre el recurso solicitado.

**Propiedades del objeto:**

-   status, the_request, status_line, method, content_type, handler, uri, filename, path_info, args, boundary, no_cache, no_local_copy, allowed, send_bodyct, bytes_sent, byterange, clength, unparsed_uri, mtime, request_time

**Ejemplo:**

```php
<?php
$info = apache_lookup_uri('index.php?var=value');
print_r($info);
if (file_exists($info->filename)) {
    echo '¡El fichero existe!';
}
?>
```

**Resultado:**

```
stdClass Object
(
    [status] => 200
    [the_request] => GET /dir/file.php HTTP/1.1
    ...
)
¡El fichero existe!
```

---

### apache_note

Muestra o asigna la tabla de notas de Apache.

**Descripción:**

```php
string|false apache_note(string $note_name, ?string $note_value = null)
```

Permite pasar información entre módulos de Apache durante la misma petición.

**Ejemplo:**

```php
<?php
apache_note('name', 'Fredrik Ekengren');
// Llamada al script Perl
virtual("/perl/some_script.pl");
$result = apache_note("resultdata");
?>
```

**Ver también:** `virtual()`

---

### apache_request_headers

Recupera todos los encabezados HTTP de la petición.

**Descripción:**

```php
array apache_request_headers()
```

Devuelve un array asociativo con todos los encabezados HTTP de la petición actual.

**Ejemplo:**

```php
<?php
$headers = apache_request_headers();
foreach ($headers as $header => $value) {
    echo "$header: $value <br />\n";
}
?>
```

**Resultado:**

```
Accept: */*
Accept-Language: en-us
...
```

**Notas:** También pueden obtenerse valores de variables CGI comunes leyendo el entorno.
**Ver también:** `apache_response_headers()`

---

### apache_response_headers

Recupera todos los encabezados de respuesta HTTP.

**Descripción:**

```php
array apache_response_headers()
```

Devuelve un array de todos los encabezados de respuesta de Apache.

**Ejemplo:**

```php
<?php
print_r(apache_response_headers());
?>
```

**Resultado:**

```
Array
(
    [Accept-Ranges] => bytes
    [X-Powered-By] => PHP/4.3.8
)
```

**Ver también:** `apache_request_headers()`, `headers_sent()`, `headers_list()`

---

### apache_setenv

Establece una variable subprocess_env de Apache.

**Descripción:**

```php
bool apache_setenv(string $variable, string $value, bool $walk_to_top = false)
```

Establece el valor de la variable de entorno de Apache especificada.

**Ejemplo:**

```php
<?php
apache_setenv("VARIABLE_EJEMPLO", "Valor de ejemplo");
?>
```

**Notas:** No modifica la variable `$_SERVER`.
**Ver también:** `apache_getenv()`

---

### getallheaders

Recupera todos los encabezados de la petición HTTP.

**Descripción:**

```php
array getallheaders()
```

Alias de `apache_request_headers()`.

**Ejemplo:**

```php
<?php
foreach (getallheaders() as $name => $value) {
    echo "$name: $value\n";
}
?>
```

**Ver también:** `apache_response_headers()`

---

### virtual

Efectúa una subpetición Apache.

**Descripción:**

```php
bool virtual(string $uri)
```

Función específica de Apache para ejecutar subpeticiones, útil para analizar scripts CGI, archivos `.shtml`, etc.

**Notas:**

-   La cadena requerida funciona únicamente bajo Apache 2.
-   Las variables de entorno establecidas en el archivo solicitado no son visibles en el archivo llamador.
-   Se recomienda usar `include` o `require` para archivos PHP.

**Ver también:** `apache_note()`
