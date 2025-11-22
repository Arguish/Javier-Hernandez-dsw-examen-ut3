# PHP: Clases y Objetos

## Introducción

Esta sección documenta el uso de clases y objetos en PHP, incluyendo sintaxis, métodos, propiedades y ejemplos prácticos.

---

*Nota: El contenido completo se ha convertido desde el HTML original. Si necesitas una estructura específica, como tablas o ejemplos de código, por favor indícalo.*

---

## Tabla de Contenidos
- [Definición de Clases](#definicion-de-clases)
- [Propiedades y Métodos](#propiedades-y-metodos)
- [Constructores y Destructores](#constructores-y-destructores)
- [Herencia](#herencia)
- [Interfaces y Traits](#interfaces-y-traits)
- [Ejemplos](#ejemplos)

---

## Definición de Clases

Las clases en PHP se definen usando la palabra clave `class`:

```php
class MiClase {
    // Propiedades y métodos
}
```

## Propiedades y Métodos

Las propiedades son variables dentro de una clase. Los métodos son funciones que pertenecen a la clase.

```php
class Persona {
    public $nombre;
    public function saludar() {
        return "Hola, " . $this->nombre;
    }
}
```

## Constructores y Destructores

El constructor se define con `__construct` y el destructor con `__destruct`.

```php
class Ejemplo {
    public function __construct() {
        // Inicialización
    }
    public function __destruct() {
        // Limpieza
    }
}
```

## Herencia

PHP soporta herencia simple:

```php
class Animal {
    public function hacerSonido() {
        echo "Sonido genérico";
    }
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "Guau";
    }
}
```

## Interfaces y Traits

Las interfaces definen métodos que deben ser implementados. Los traits permiten reutilizar métodos en varias clases.

```php
interface Movible {
    public function mover();
}

trait Loggable {
    public function log($mensaje) {
        echo $mensaje;
    }
}
```

## Ejemplos

```php
class Vehiculo {
    public $marca;
    public function __construct($marca) {
        $this->marca = $marca;
    }
}

$auto = new Vehiculo("Toyota");
echo $auto->marca; // Toyota
```

---

*Para más detalles, consulta la documentación oficial de PHP sobre clases y objetos.*
