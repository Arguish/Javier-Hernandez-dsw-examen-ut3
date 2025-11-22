# PHP COM y .Net (Windows)

## Introducción

La extensión COM y .Net permite a PHP interactuar con objetos COM y .Net en sistemas Windows. Proporciona clases y funciones para crear, manipular y comunicar con estos objetos.

---

## Tabla de Contenidos
- [Instalación y Configuración](#instalacion-y-configuracion)
- [Constantes Predefinidas](#constantes-predefinidas)
- [Gestión de Errores](#gestion-de-errores)
- [Ejemplos](#ejemplos)
- [Clases Principales](#clases-principales)
- [Funciones COM y .Net](#funciones-com-y-net)

---

## Instalación y Configuración

### Requerimientos
- PHP >= 5.0
- Sistema operativo Windows

### Instalación

La extensión COM está habilitada por defecto en Windows. Para .Net, asegúrate de tener el entorno adecuado.

### Configuración en tiempo de ejecución

Habilita la extensión en tu archivo `php.ini` si es necesario.

---

## Constantes Predefinidas

La extensión define constantes como:
- `VT_NULL`
- `VT_DISPATCH`
- `DISP_E_DIVBYZERO`

---

## Gestión de Errores

Las funciones pueden lanzar excepciones de tipo `com_exception` en caso de error.

---

## Ejemplos

### For Each
```php
foreach ($comObject as $item) {
    // Procesar $item
}
```

### Arrays y propiedades
```php
$value = $comObject->Property;
$array = $comObject->ArrayProperty;
```

---

## Clases Principales

### com
Representa un objeto COM.
- `__construct()` — Constructor de la clase com

### dotnet
Representa un objeto .Net.
- `__construct()` — Constructor de la clase dotnet

### variant
Representa un valor variante.
- `__construct()` — Constructor de la clase variant

### COMPersistHelper
Ayuda a gestionar la persistencia de objetos COM.
- Métodos: `GetCurFileName`, `GetMaxStreamSize`, `InitNew`, `LoadFromFile`, `LoadFromStream`, `SaveToFile`, `SaveToStream`

### com_exception
Excepción lanzada por errores COM.

### com_safearray_proxy
Proxy para arrays seguros COM.

---

## Funciones COM y .Net

### com_create_guid
Genera un identificador único global (GUID).

### com_event_sink
Conecta eventos de un objeto COM a un objeto PHP.

### com_get_active_object
Devuelve la instancia actual de un objeto COM.

### com_load_typelib
Carga un Typelib.

### com_message_pump
Procesa un mensaje COM en un tiempo dado.

### com_print_typeinfo
Muestra una definición de clase PHP para una interfaz distribuible.

### variant_abs
Devuelve el valor absoluto de un variant.

### variant_add
Suma dos variants y devuelve el resultado.

### variant_and
Realiza un AND entre dos variants.

### variant_cast
Convierte un variant en otro tipo.

### variant_cat
Concatena dos variants.

### variant_cmp
Compara dos variants.

### variant_date_from_timestamp
Convierte un timestamp Unix en una fecha variant.

### variant_date_to_timestamp
Convierte una fecha variant en un timestamp Unix.

### variant_div
Divide dos variants.

### variant_eqv
Equivalencia de bits de dos variants.

### variant_fix
Recupera la parte entera de un variant.

### variant_get_type
Devuelve el tipo de un variant.

### variant_idiv
Convierte variants en enteros y realiza una división.

### variant_imp
Implicación a nivel de bits de dos variants.

### variant_int
Devuelve la parte entera de un variant.

### variant_mod
Devuelve el resto de la división de dos variants.

### variant_mul
Multiplica dos variants.

### variant_neg
Negación lógica de un variant.

### variant_not
Negación a nivel de bits de un variant.

### variant_or
Disyunción lógica de dos variants.

### variant_pow
Potencia de dos variants.

### variant_round
Redondea un variant.

### variant_set
Asigna un nuevo valor a un variant.

### variant_set_type
Convierte un variant en otro tipo "in situ".

### variant_sub
Sustrae el valor de un variant de otro.

### variant_xor
Exclusión lógica de dos variants.

---

*Para más detalles, consulta la documentación oficial de PHP sobre COM y .Net.*
