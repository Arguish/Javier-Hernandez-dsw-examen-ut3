# Matemáticas de precisión arbitraria BCMath

## Introducción
BCMath permite realizar operaciones matemáticas de precisión arbitraria en PHP, admitiendo números de cualquier tamaño y precisión, representados como cadenas. Los números válidos son cadenas que coinciden con la expresión regular `/^[+-]?[0-9]*(\.[0-9]*)?$/`.

**Precaución:** Pasar valores de tipo `float` puede no tener el efecto deseado por la conversión a string y el uso de notación exponencial.

## Instalación/Configuración
- BCMath está disponible automáticamente en PHP para Windows.
- Se configura en `php.ini` con la opción `bcmath.scale` (número de decimales por defecto).

## Opciones principales
- `bcmath.scale`: Número de decimales para todas las funciones BCMath.

## Funciones principales
- `bcadd($num1, $num2, $scale = null)`: Suma dos números.
- `bcceil($num)`: Redondea al alza.
- `bccomp($num1, $num2, $scale = null)`: Compara dos números.
- `bcdiv($num1, $num2, $scale = null)`: Divide dos números.
- `bcdivmod($num1, $num2, $scale = null)`: Devuelve cociente y resto.
- `bcfloor($num)`: Redondea hacia abajo.
- `bcmod($num1, $num2, $scale = null)`: Devuelve el resto de la división.
- `bcmul($num1, $num2, $scale = null)`: Multiplica dos números.
- `bcpow($num, $exponent, $scale = null)`: Eleva un número a una potencia.
- `bcpowmod($num, $exponent, $modulus, $scale = null)`: Potencia y módulo.
- `bcround($num, $precision = 0, $mode = RoundingMode::HalfAwayFromZero)`: Redondea un número.
- `bcscale($scale)`: Define o recupera la precisión por defecto.
- `bcsqrt($num, $scale = null)`: Raíz cuadrada.

## Ejemplo
```php
<?php
$a = '1.234';
$b = '5';
echo bcadd($a, $b); // 6
?>
```

## Referencias
- [Documentación oficial BCMath](https://www.php.net/manual/es/book.bc.php)
