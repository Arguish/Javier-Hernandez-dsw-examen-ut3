# Componere

# Introducción

Componere (latin, English: compose) se dirige a los entornos de producción y proporciona una API para
composición de las clases, parches y moldeado.

##### Composición:

     [Componere\Definition](#class.componere-definition) se utiliza para definir (o redefinir) una clase en tiempo de ejecución;
     La clase puede entonces registrarse, y en caso de redefinición reemplaza a la clase original
     durante todo el tiempo que la clase [Componere\Definition](#class.componere-definition) exista.


public [Componere\Definition::\_\_construct](#componere-definition.construct)([string](#language.types.string) $name)
public [Componere\Definition::\_\_construct](#componere-definition.construct)([string](#language.types.string) $name, [string](#language.types.string) $parent)
public [Componere\Definition::\_\_construct](#componere-definition.construct)([string](#language.types.string) $name, [array](#language.types.array) $interfaces)
public [Componere\Definition::\_\_construct](#componere-definition.construct)([string](#language.types.string) $name, [string](#language.types.string) $parent, [array](#language.types.array) $interfaces)

##### Parcheado:

     [Componere\Patch](#class.componere-patch) se utiliza para cambiar la clase de una instancia específica de un objeto en tiempo de ejecución;
     Tras su aplicación, el parche permanecerá aplicado durante todo el tiempo que la clase [Componere\Patch](#class.componere-patch) exista, y puede ser revertido explícitamente.


public [Componere\Patch::\_\_construct](#componere-patch.construct)([object](#language.types.object) $instance)
public [Componere\Patch::\_\_construct](#componere-patch.construct)([object](#language.types.object) $instance, [array](#language.types.array) $interfaces)

##### Moldeado:

     **Componere\** Las funciones de moldeado pueden moldear entre tipos compatibles definidos por el usuario;
     Donde compatible significa **Type** es sub o super al tipo de object.


[Componere\cast](#componere.cast)([string](#language.types.string) $type, [object](#language.types.object) $object): [object](#language.types.object)

     [Componere\cast_by_ref](#componere.cast_by_ref)([string](#language.types.string) $type, [object](#language.types.object) $object): [object](#language.types.object)

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#componere.requirements)
- [Instalación](#componere.installation)

    ## Requerimientos

    Se requiere Reflection

    ## Instalación

    La fuente de Componere y las liberaciones están disponibles en
    [» github](https://github.com/krakjoe/componere)

# La clase Componere\Abstract\Definition

(Componere 2 &gt;= 2.1.0)

## Introducción

    Esta abstracta final representa una entrada de clase, y no debe ser usado por el programador.

## Sinopsis de la Clase

    ****




      final
      abstract
      class **Componere\Abstract\Definition**

     {


    /* Métodos */

public [addInterface](#componere-abstract-definition.addinterface)([string](#language.types.string) $interface): Definition
public [addMethod](#componere-abstract-definition.addmethod)([string](#language.types.string) $name, [Componere\Method](#class.componere-method) $method): Definition
public [addTrait](#componere-abstract-definition.addtrait)([string](#language.types.string) $trait): Definition
public [getReflector](#componere-abstract-definition.getreflector)(): [ReflectionClass](#class.reflectionclass)

}

# Componere\Abstract\Definition::addInterface

(Componere 2 &gt;= 2.1.0)

Componere\Abstract\Definition::addInterface — Añadir Interface

### Descripción

public **Componere\Abstract\Definition::addInterface**([string](#language.types.string) $interface): Definition

    Implementará la interface dada en la definición actual

### Parámetros

    interface


      El nombre de una interface insensible a las mayúsculas y minúsculas


### Valores devueltos

La definición actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition se registró

# Componere\Abstract\Definition::addMethod

(Componere 2 &gt;= 2.1.0)

Componere\Abstract\Definition::addMethod — Añadir método

### Descripción

public **Componere\Abstract\Definition::addMethod**([string](#language.types.string) $name, [Componere\Method](#class.componere-method) $method): Definition

    Creará o anulará un método en la definición actual.

### Parámetros

    name


      El nombre del método insensible a las mayúsculas y minúsculas






    method


      [Componere\Method](#class.componere-method) que no se haya añadido previamente a otra Definition


### Valores devueltos

La Definition actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition se registró

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si el método se añadió a otra definición

# Componere\Abstract\Definition::addTrait

(Componere 2 &gt;= 2.1.0)

Componere\Abstract\Definition::addTrait — Añadir rasgo

### Descripción

public **Componere\Abstract\Definition::addTrait**([string](#language.types.string) $trait): Definition

    Usará el rasgo dado para la definición actual

### Parámetros

    trait


      El nombre del rasgo insensible a las mayúsculas y minúsculas


### Valores devueltos

La definición actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition se registró

# Componere\Abstract\Definition::getReflector

(Componere 2 &gt;= 2.1.0)

Componere\Abstract\Definition::getReflector — Reflection

### Descripción

public **Componere\Abstract\Definition::getReflector**(): [ReflectionClass](#class.reflectionclass)

Creará o devolverá una clase Reflection

### Valores devueltos

Una clase Reflection para la definición actual (en caché)

## Tabla de contenidos

- [Componere\Abstract\Definition::addInterface](#componere-abstract-definition.addinterface) — Añadir Interface
- [Componere\Abstract\Definition::addMethod](#componere-abstract-definition.addmethod) — Añadir método
- [Componere\Abstract\Definition::addTrait](#componere-abstract-definition.addtrait) — Añadir rasgo
- [Componere\Abstract\Definition::getReflector](#componere-abstract-definition.getreflector) — Reflection

# La clase Componere\Definition

(Componere 2 &gt;= 2.1.0)

## Introducción

    La clase Definition permite al programador construir y registrar un tipo en tiempo de ejecución.




    En caso de que una Definition reemplace una clase existente, la clase existente será restaurada cuando la Definition sea destruida.

## Sinopsis de la Clase

     ****





      final
      class **Componere\Definition**



      extends
       [Componere\Abstract\Definition](#class.componere-abstract-definition)

     {


    /* Constructores */

public [\_\_construct](#componere-definition.construct)([string](#language.types.string) $name)
public [\_\_construct](#componere-definition.construct)([string](#language.types.string) $name, [string](#language.types.string) $parent)
public [\_\_construct](#componere-definition.construct)([string](#language.types.string) $name, [array](#language.types.array) $interfaces)
public [\_\_construct](#componere-definition.construct)([string](#language.types.string) $name, [string](#language.types.string) $parent, [array](#language.types.array) $interfaces)

    /* Métodos */
    public [addConstant](#componere-definition.addconstant)([string](#language.types.string) $name, [Componere\Value](#class.componere-value) $value): Definition

public [addProperty](#componere-definition.addproperty)([string](#language.types.string) $name, [Componere\Value](#class.componere-value) $value): Definition
public [register](#componere-definition.register)(): [void](language.types.void.html)
public [isRegistered](#componere-definition.isregistered)(): [bool](#language.types.boolean)
public [getClosure](#componere-definition.getclosure)([string](#language.types.string) $name): [Closure](#class.closure)
public [getClosures](#componere-definition.getclosures)(): [array](#language.types.array)

    /* Métodos heredados */
    public [Componere\Abstract\Definition::addInterface](#componere-abstract-definition.addinterface)([string](#language.types.string) $interface): Definition

public [Componere\Abstract\Definition::addMethod](#componere-abstract-definition.addmethod)([string](#language.types.string) $name, [Componere\Method](#class.componere-method) $method): Definition
public [Componere\Abstract\Definition::addTrait](#componere-abstract-definition.addtrait)([string](#language.types.string) $trait): Definition
public [Componere\Abstract\Definition::getReflector](#componere-abstract-definition.getreflector)(): [ReflectionClass](#class.reflectionclass)

}

# Componere\Definition::\_\_construct

(Componere 2 &gt;= 2.1.0)

Componere\Definition::\_\_construct — Constructor Definition

### Descripción

public **Componere\Definition::\_\_construct**([string](#language.types.string) $name)

public **Componere\Definition::\_\_construct**([string](#language.types.string) $name, [string](#language.types.string) $parent)

public **Componere\Definition::\_\_construct**([string](#language.types.string) $name, [array](#language.types.array) $interfaces)

public **Componere\Definition::\_\_construct**([string](#language.types.string) $name, [string](#language.types.string) $parent, [array](#language.types.array) $interfaces)

### Parámetros

    name


      Un nombre de clase insensible a las mayúsculas y minúsculas






    parent


      Un nombre de clase insensible a las mayúsculas y minúsculas






    interfaces


      Un array de nombres de clase insensibles a las mayúsculas y minúsculas


### Exceptions

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si se intenta reemplazar una clase interna

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si se intenta sustituir una interface

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si se intenta reemplazar un rasgo

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si una clase en interfaces no se puede encontrar

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si una clase en interfaces no es una interface

# Componere\Definition::addConstant

(Componere 2 &gt;= 2.1.0)

Componere\Definition::addConstant — Añade constante

### Descripción

public **Componere\Definition::addConstant**([string](#language.types.string) $name, [Componere\Value](#class.componere-value) $value): Definition

Declarará una constante de clase en la definición actual

### Parámetros

    name


      El nombre de la constante que distingue entre mayúsculas y minúsculas






    value


      El valor de la constante, no debe ser indefinido o estático


### Valores devueltos

La definición actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition fué registrado

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si name ya está declarada como una constante

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si value es estática

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si value no está definida

# Componere\Definition::addProperty

(Componere 2 &gt;= 2.1.0)

Componere\Definition::addProperty — Añade propiedad

### Descripción

public **Componere\Definition::addProperty**([string](#language.types.string) $name, [Componere\Value](#class.componere-value) $value): Definition

Declarará una propiedad de clase sobre la definición actual

### Parámetros

    name


      El nombre de la propiedad distingue mayúsculas y minúsculas






    value


      El valor por omisión de la propiedad


### Valores devueltos

La definición actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition se registró

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si name ya está declarada como una propiedad

# Componere\Definition::register

(Componere 2 &gt;= 2.1.0)

Componere\Definition::register — Registro

### Descripción

public **Componere\Definition::register**(): [void](language.types.void.html)

Registrará la Definition actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition fué registrada

# Componere\Definition::isRegistered

(Componere 2 &gt;= 2.1.0)

Componere\Definition::isRegistered — Detección del estado

### Descripción

public **Componere\Definition::isRegistered**(): [bool](#language.types.boolean)

Deberá detectar el estado de registro de Definition

### Valores devueltos

Devolverá true si Definition está registrada

# Componere\Definition::getClosure

(Componere 2 &gt;= 2.1.0)

Componere\Definition::getClosure — Obtener Cierre

### Descripción

public **Componere\Definition::getClosure**([string](#language.types.string) $name): [Closure](#class.closure)

Devolverá un cierre para el método especificado por el nombre

### Parámetros

    name


      El nombre del método insensible a las mayúsculas y minúsculas


### Valores devueltos

Un cierre vinculado al alcance correcto

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition se registró

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si name no se pudo encontrar

# Componere\Definition::getClosures

(Componere 2 &gt;= 2.1.0)

Componere\Definition::getClosures — Obtener Cierres

### Descripción

public **Componere\Definition::getClosures**(): [array](#language.types.array)

Devolverá un array de cierres

### Valores devueltos

Devolverá todos los métodos como un array de objetos de cierre vinculados al alcance correcto

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si Definition se registró

## Tabla de contenidos

- [Componere\Definition::\_\_construct](#componere-definition.construct) — Constructor Definition
- [Componere\Definition::addConstant](#componere-definition.addconstant) — Añade constante
- [Componere\Definition::addProperty](#componere-definition.addproperty) — Añade propiedad
- [Componere\Definition::register](#componere-definition.register) — Registro
- [Componere\Definition::isRegistered](#componere-definition.isregistered) — Detección del estado
- [Componere\Definition::getClosure](#componere-definition.getclosure) — Obtener Cierre
- [Componere\Definition::getClosures](#componere-definition.getclosures) — Obtener Cierres

# La clase Componere\Patch

(Componere 2 &gt;= 2.1.0)

## Introducción

    La clase Patch permite al programador cambiar el tipo de una instancia en tiempo de ejecución sin registrar una nueva Definition




    Cuando se destruye un parche se revierte, de modo que los casos que fueron parcheados durante la vida del Parche son restaurados a su tipo formal.

## Sinopsis de la Clase

    ****




      final
      class **Componere\Patch**



      extends
       [Componere\Abstract\Definition](#class.componere-abstract-definition)

     {


    /* Constructors */

public [\_\_construct](#componere-patch.construct)([object](#language.types.object) $instance)
public [\_\_construct](#componere-patch.construct)([object](#language.types.object) $instance, [array](#language.types.array) $interfaces)

    /* Métodos */
    public [apply](#componere-patch.apply)(): [void](language.types.void.html)

public [revert](#componere-patch.revert)(): [void](language.types.void.html)
public [isApplied](#componere-patch.isapplied)(): [bool](#language.types.boolean)
public [derive](#componere-patch.derive)([object](#language.types.object) $instance): Patch
public [getClosure](#componere-patch.getclosure)([string](#language.types.string) $name): [Closure](#class.closure)
public [getClosures](#componere-patch.getclosures)(): [array](#language.types.array)

    /* Métodos heredados */
    public [Componere\Abstract\Definition::addInterface](#componere-abstract-definition.addinterface)([string](#language.types.string) $interface): Definition

public [Componere\Abstract\Definition::addMethod](#componere-abstract-definition.addmethod)([string](#language.types.string) $name, [Componere\Method](#class.componere-method) $method): Definition
public [Componere\Abstract\Definition::addTrait](#componere-abstract-definition.addtrait)([string](#language.types.string) $trait): Definition
public [Componere\Abstract\Definition::getReflector](#componere-abstract-definition.getreflector)(): [ReflectionClass](#class.reflectionclass)

}

# Componere\Patch::\_\_construct

(Componere 2 &gt;= 2.1.0)

Componere\Patch::\_\_construct — Constructor Patch

### Descripción

public **Componere\Patch::\_\_construct**([object](#language.types.object) $instance)

public **Componere\Patch::\_\_construct**([object](#language.types.object) $instance, [array](#language.types.array) $interfaces)

### Parámetros

    instance


      El objetivo de este Patch






    interfaces


      Un array  de nombres de clase insensibles a las mayúsculas y minúsculas


### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si una clase en interfaces no se puede encontrar

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si una clase en interfaces no es una interface

# Componere\Patch::apply

(Componere 2 &gt;= 2.1.0)

Componere\Patch::apply — Aplicación

### Descripción

public **Componere\Patch::apply**(): [void](language.types.void.html)

Aplicará el parche actual

# Componere\Patch::revert

(Componere 2 &gt;= 2.1.0)

Componere\Patch::revert — Reversión

### Descripción

public **Componere\Patch::revert**(): [void](language.types.void.html)

Revertirá el parche actual

# Componere\Patch::isApplied

(Componere 2 &gt;= 2.1.0)

Componere\Patch::isApplied — Detección del estado

### Descripción

public **Componere\Patch::isApplied**(): [bool](#language.types.boolean)

# Componere\Patch::derive

(Componere 2 &gt;= 2.1.1)

Componere\Patch::derive — Derivación del parche

### Descripción

public **Componere\Patch::derive**([object](#language.types.object) $instance): Patch

Derivará un Patch (parche) para la instance (instancia) dada

### Parámetros

    instance


      El objetivo del Parche derivado


### Valores devueltos

Patch (parche) para la instance (instancia) derivada del Patch (parche) actual

### Exceptions

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si instance no es compatible

# Componere\Patch::getClosure

(Componere 2 &gt;= 2.1.0)

Componere\Patch::getClosure — Obtener Cierre

### Descripción

public **Componere\Patch::getClosure**([string](#language.types.string) $name): [Closure](#class.closure)

Devolverá un cierre para el método especificado por el nombre

### Parámetros

    name


      El nombre del método insensible a las mayúsculas y minúsculas


### Valores devueltos

Un cierre vinculado al ámbito y objeto correctos

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si name no se pudo encontrar

# Componere\Patch::getClosures

(Componere 2 &gt;= 2.1.0)

Componere\Patch::getClosures — Obtener Cierres

### Descripción

public **Componere\Patch::getClosures**(): [array](#language.types.array)

Devolverá un array de Cierres

### Valores devueltos

    Devolverá todos los métodos como un array de objetos de cierre unidos al ámbito y objeto correctos

## Tabla de contenidos

- [Componere\Patch::\_\_construct](#componere-patch.construct) — Constructor Patch
- [Componere\Patch::apply](#componere-patch.apply) — Aplicación
- [Componere\Patch::revert](#componere-patch.revert) — Reversión
- [Componere\Patch::isApplied](#componere-patch.isapplied) — Detección del estado
- [Componere\Patch::derive](#componere-patch.derive) — Derivación del parche
- [Componere\Patch::getClosure](#componere-patch.getclosure) — Obtener Cierre
- [Componere\Patch::getClosures](#componere-patch.getclosures) — Obtener Cierres

# La clase Componere\Method

(Componere 2 &gt;= 2.1.0)

## Introducción

    Un método representa una función con banderas de accesibilidad modificables

## Sinopsis de la Clase

    ****




      final
      class **Componere\Method**

     {


    /* Constructor */

public [\_\_construct](#componere-method.construct)([Closure](#class.closure) $closure)

    /* Métodos */
    public [setPrivate](#componere-method.setprivate)(): Method

public [setProtected](#componere-method.setprotected)(): Method
public [setStatic](#componere-method.setstatic)(): Method
public [getReflector](#componere-method.getreflector)(): [ReflectionMethod](#class.reflectionmethod)

}

# Componere\Method::\_\_construct

(Componere 2 &gt;= 2.1.0)

Componere\Method::\_\_construct — Constructor Method

### Descripción

public **Componere\Method::\_\_construct**([Closure](#class.closure) $closure)

### Parámetros

    closure





# Componere\Method::setPrivate

(Componere 2 &gt;= 2.1.0)

Componere\Method::setPrivate — Modificación de la accesibilidad

### Descripción

public **Componere\Method::setPrivate**(): Method

### Valores devueltos

El método actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si el nivel de acceso fue establecido previamente

# Componere\Method::setProtected

(Componere 2 &gt;= 2.1.0)

Componere\Method::setProtected — Modificación de la accesibilidad

### Descripción

public **Componere\Method::setProtected**(): Method

### Valores devueltos

El método actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si el nivel de acceso fue establecido previamente

# Componere\Method::setStatic

(Componere 2 &gt;= 2.1.0)

Componere\Method::setStatic — Modificación de la accesibilidad

### Descripción

public **Componere\Method::setStatic**(): Method

### Valores devueltos

El método actual

# Componere\Method::getReflector

(Componere 2 &gt;= 2.1.0)

Componere\Method::getReflector — Reflection

### Descripción

public **Componere\Method::getReflector**(): [ReflectionMethod](#class.reflectionmethod)

Creará o devolverá un Método de Reflection

### Valores devueltos

Un método de Reflection para el método actual (en caché)

## Tabla de contenidos

- [Componere\Method::\_\_construct](#componere-method.construct) — Constructor Method
- [Componere\Method::setPrivate](#componere-method.setprivate) — Modificación de la accesibilidad
- [Componere\Method::setProtected](#componere-method.setprotected) — Modificación de la accesibilidad
- [Componere\Method::setStatic](#componere-method.setstatic) — Modificación de la accesibilidad
- [Componere\Method::getReflector](#componere-method.getreflector) — Reflection

# La clase Componere\Value

(Componere 2 &gt;= 2.1.0)

## Introducción

    Una clase Value representa una variable PHP de todos los tipos, incluyendo las indefinidas

## Sinopsis de la Clase

    ****




      final
      class **Componere\Value**

     {


    /* Constructor */

public [\_\_construct](#componere-value.construct)([mixed](#language.types.mixed) $default = ?)

    /* Métodos */
    public [setPrivate](#componere-value.setprivate)(): Value

public [setProtected](#componere-value.setprotected)(): Value
public [setStatic](#componere-value.setstatic)(): Value
public [isPrivate](#componere-value.isprivate)(): [bool](#language.types.boolean)
public [isProtected](#componere-value.isprotected)(): [bool](#language.types.boolean)
public [isStatic](#componere-value.isstatic)(): [bool](#language.types.boolean)
public [hasDefault](#componere-value.hasdefault)(): [bool](#language.types.boolean)

}

# Componere\Value::\_\_construct

(Componere 2 &gt;= 2.1.0)

Componere\Value::\_\_construct — Constructor Value

### Descripción

public **Componere\Value::\_\_construct**([mixed](#language.types.mixed) $default = ?)

### Parámetros

    default





### Exceptions

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si default no tiene un valor adecuado

# Componere\Value::setPrivate

(Componere 2 &gt;= 2.1.0)

Componere\Value::setPrivate — Modificación de la accesibilidad

### Descripción

public **Componere\Value::setPrivate**(): Value

### Valores devueltos

El valor actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si el nivel de acceso fue establecido previamente

# Componere\Value::setProtected

(Componere 2 &gt;= 2.1.0)

Componere\Value::setProtected — Modificación de la accesibilidad

### Descripción

public **Componere\Value::setProtected**(): Value

### Valores devueltos

El valor actual

### Exceptions

**Advertencia**

    Lanzará [RuntimeException](#class.runtimeexception) si el nivel de acceso fue establecido previamente

# Componere\Value::setStatic

(Componere 2 &gt;= 2.1.0)

Componere\Value::setStatic — Modificación de la accesibilidad

### Descripción

public **Componere\Value::setStatic**(): Value

### Valores devueltos

El valor actual

# Componere\Value::isPrivate

(Componere 2 &gt;= 2.1.0)

Componere\Value::isPrivate — Detección de accesibilidad

### Descripción

public **Componere\Value::isPrivate**(): [bool](#language.types.boolean)

# Componere\Value::isProtected

(Componere 2 &gt;= 2.1.0)

Componere\Value::isProtected — Detección de accesibilidad

### Descripción

public **Componere\Value::isProtected**(): [bool](#language.types.boolean)

# Componere\Value::isStatic

(Componere 2 &gt;= 2.1.0)

Componere\Value::isStatic — Detección de accesibilidad

### Descripción

public **Componere\Value::isStatic**(): [bool](#language.types.boolean)

# Componere\Value::hasDefault

(Componere 2 &gt;= 2.1.0)

Componere\Value::hasDefault — Interacción de Value

### Descripción

public **Componere\Value::hasDefault**(): [bool](#language.types.boolean)

## Tabla de contenidos

- [Componere\Value::\_\_construct](#componere-value.construct) — Constructor Value
- [Componere\Value::setPrivate](#componere-value.setprivate) — Modificación de la accesibilidad
- [Componere\Value::setProtected](#componere-value.setprotected) — Modificación de la accesibilidad
- [Componere\Value::setStatic](#componere-value.setstatic) — Modificación de la accesibilidad
- [Componere\Value::isPrivate](#componere-value.isprivate) — Detección de accesibilidad
- [Componere\Value::isProtected](#componere-value.isprotected) — Detección de accesibilidad
- [Componere\Value::isStatic](#componere-value.isstatic) — Detección de accesibilidad
- [Componere\Value::hasDefault](#componere-value.hasdefault) — Interacción de Value

# Funciones Componere

# Componere\cast

(Componere 2 &gt;= 2.1.2)

Componere\cast — Moldeado

### Descripción

**Componere\cast**([string](#language.types.string) $type, [object](#language.types.object) $object): [object](#language.types.object)

### Parámetros

    type


      Un tipo definido por el usuario






    object


      Un objeto con un tipo definido por el usuario compatible con **Type**


### Valores devueltos

Un [object](#language.types.object) de tipo **Type**, moldeado de object

### Errores/Excepciones

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si el tipo de object es o se deriva de una clase interna

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** es una interface

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** es un rasgo

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** es una abstracta

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** no es compatible con el tipo de object

### Ver también

    - [Componere\cast_by_ref](#componere.cast_by_ref)

# Componere\cast_by_ref

(Componere 2 &gt;= 2.1.2)

Componere\cast_by_ref — Moldeado

### Descripción

**Componere\cast_by_ref**([string](#language.types.string) $type, [object](#language.types.object) $object): [object](#language.types.object)

### Parámetros

    **type**


      Un tipo definido por el usuario






    object


      Un objeto con un tipo definido por el usuario compatible con **Type**


### Valores devueltos

Un [object](#language.types.object) de tipo **Type**, moldeado de object, donde los miembros son referencias a miembros de object

### Errores/Excepciones

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si el tipo de object es o se deriva de una clase interna

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** es una interface

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** es un rasgo

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** es una abstracta

**Advertencia**

    Lanzará [InvalidArgumentException](#class.invalidargumentexception) si **Type** no es compatible con el tipo de object

### Ver también

    - [Componere\cast](#componere.cast)

## Tabla de contenidos

- [Componere\cast](#componere.cast) — Moldeado
- [Componere\cast_by_ref](#componere.cast_by_ref) — Moldeado

- [Introducción](#intro.componere)
- [Instalación/Configuración](#componere.setup)<li>[Requerimientos](#componere.requirements)
- [Instalación](#componere.installation)
  </li>- [Componere\Abstract\Definition](#class.componere-abstract-definition) — La clase Componere\Abstract\Definition<li>[Componere\Abstract\Definition::addInterface](#componere-abstract-definition.addinterface) — Añadir Interface
- [Componere\Abstract\Definition::addMethod](#componere-abstract-definition.addmethod) — Añadir método
- [Componere\Abstract\Definition::addTrait](#componere-abstract-definition.addtrait) — Añadir rasgo
- [Componere\Abstract\Definition::getReflector](#componere-abstract-definition.getreflector) — Reflection
  </li>- [Componere\Definition](#class.componere-definition) — La clase Componere\Definition<li>[Componere\Definition::__construct](#componere-definition.construct) — Constructor Definition
- [Componere\Definition::addConstant](#componere-definition.addconstant) — Añade constante
- [Componere\Definition::addProperty](#componere-definition.addproperty) — Añade propiedad
- [Componere\Definition::register](#componere-definition.register) — Registro
- [Componere\Definition::isRegistered](#componere-definition.isregistered) — Detección del estado
- [Componere\Definition::getClosure](#componere-definition.getclosure) — Obtener Cierre
- [Componere\Definition::getClosures](#componere-definition.getclosures) — Obtener Cierres
  </li>- [Componere\Patch](#class.componere-patch) — La clase Componere\Patch<li>[Componere\Patch::__construct](#componere-patch.construct) — Constructor Patch
- [Componere\Patch::apply](#componere-patch.apply) — Aplicación
- [Componere\Patch::revert](#componere-patch.revert) — Reversión
- [Componere\Patch::isApplied](#componere-patch.isapplied) — Detección del estado
- [Componere\Patch::derive](#componere-patch.derive) — Derivación del parche
- [Componere\Patch::getClosure](#componere-patch.getclosure) — Obtener Cierre
- [Componere\Patch::getClosures](#componere-patch.getclosures) — Obtener Cierres
  </li>- [Componere\Method](#class.componere-method) — La clase Componere\Method<li>[Componere\Method::__construct](#componere-method.construct) — Constructor Method
- [Componere\Method::setPrivate](#componere-method.setprivate) — Modificación de la accesibilidad
- [Componere\Method::setProtected](#componere-method.setprotected) — Modificación de la accesibilidad
- [Componere\Method::setStatic](#componere-method.setstatic) — Modificación de la accesibilidad
- [Componere\Method::getReflector](#componere-method.getreflector) — Reflection
  </li>- [Componere\Value](#class.componere-value) — La clase Componere\Value<li>[Componere\Value::__construct](#componere-value.construct) — Constructor Value
- [Componere\Value::setPrivate](#componere-value.setprivate) — Modificación de la accesibilidad
- [Componere\Value::setProtected](#componere-value.setprotected) — Modificación de la accesibilidad
- [Componere\Value::setStatic](#componere-value.setstatic) — Modificación de la accesibilidad
- [Componere\Value::isPrivate](#componere-value.isprivate) — Detección de accesibilidad
- [Componere\Value::isProtected](#componere-value.isprotected) — Detección de accesibilidad
- [Componere\Value::isStatic](#componere-value.isstatic) — Detección de accesibilidad
- [Componere\Value::hasDefault](#componere-value.hasdefault) — Interacción de Value
  </li>- [Funciones Componere](#reference.componere)<li>[Componere\cast](#componere.cast) — Moldeado
- [Componere\cast_by_ref](#componere.cast_by_ref) — Moldeado
  </li>
