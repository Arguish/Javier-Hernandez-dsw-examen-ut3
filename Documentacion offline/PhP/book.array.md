# Los arrays en PHP

## Introducción
Las funciones de arrays permiten trabajar y manipular arrays de diversas formas. Los arrays son esenciales para el almacenamiento, la gestión y las operaciones sobre conjuntos de variables. Se admiten arrays simples y multidimensionales, creados por el usuario o por funciones. Existen funciones específicas para bases de datos que permiten llenar arrays desde consultas, así como funciones que devuelven arrays.

Consulta la sección sobre [arrays](#language.types.array) y [operadores sobre arrays](#language.operators.array) para más detalles.

## Constantes predefinidas
- `CASE_LOWER`, `CASE_UPPER`: Para cambiar la casse de las claves.
- Constantes de ordenación: `SORT_ASC`, `SORT_DESC`, `SORT_REGULAR`, `SORT_NUMERIC`, `SORT_STRING`, `SORT_LOCALE_STRING`, `SORT_NATURAL`, `SORT_FLAG_CASE`.
- Banderas de filtro: `ARRAY_FILTER_USE_KEY`, `ARRAY_FILTER_USE_BOTH`.
- Otras: `COUNT_NORMAL`, `COUNT_RECURSIVE`, `EXTR_OVERWRITE`, `EXTR_SKIP`, etc.

## Ordenación de arrays
PHP dispone de numerosas funciones para ordenar arrays:
- Por valor: `asort()`, `arsort()`, `rsort()`, `sort()`, `shuffle()`, `uasort()`, `usort()`, `natcasesort()`, `natsort()`
- Por clave: `ksort()`, `krsort()`, `uksort()`
- Orden definido por el usuario: `uasort()`, `uksort()`, `usort()`

## Funciones principales
- `array()`: Crea un array.
- `array_all($array, $callback)`: Verifica si todos los elementos cumplen la condición.
- `array_any($array, $callback)`: Verifica si al menos un elemento cumple la condición.
- `array_change_key_case($array, $case)`: Cambia la casse de las claves.
- `array_chunk($array, $length, $preserve_keys = false)`: Divide un array en partes.
- `array_column($array, $column_key, $index_key = null)`: Devuelve los valores de una columna.
- `array_combine($keys, $values)`: Crea un array a partir de dos arrays.
- `array_count_values($array)`: Cuenta las ocurrencias de cada valor.
- `array_diff($array, ...$arrays)`: Calcula la diferencia entre arrays.
- `array_diff_assoc($array, ...$arrays)`: Diferencia considerando claves.
- `array_diff_key($array, ...$arrays)`: Diferencia por claves.

## Ejemplo
```php
<?php
$fruits = array(
    "fruits" => array("a" => "orange", "b" => "banana", "c" => "apple"),
    "numbers" => array(1, 2, 3, 4, 5, 6),
    "holes" => array("first", 5 => "second", "third")
);
print_r($fruits);
?>
```

## Referencias
- [Documentación oficial Arrays](https://www.php.net/manual/es/book.array.php)
