# Reflexión

# Introducción

PHP incluye una API de reflexión completa que añade la capacidad de
introspeccionar clases, interfaces, funciones,
métodos y extensiones. Además, la API de reflexión ofrece formas de
recuperar comentarios de documentación para funciones, clases y métodos.

Tenga en cuenta que ciertas partes de la API interna
carecen del código necesario para trabajar con la extensión de Reflexión.
Por ejemplo, una clase interna de PHP podría carecer de datos de reflexión para
propiedades. Estos pocos casos se consideran errores, por lo que
deben ser descubiertos y corregidos.

# Ejemplos

Existen muchos ejemplos en la documentación de Reflection, por lo general
dentro de la documentación de \_\_construct de cada clase.

**Ejemplo #1 Ejemplo de Reflection desde Shell (un terminal)**

$ php --rf strlen
$ php --rc finfo
$ php --re json
$ php --ri dom

Resultado del ejemplo anterior es similar a:

Function [ &lt;internal:Core&gt; function strlen ] {

- Parameters [1] {
  Parameter #0 [ &lt;required&gt; $str ]
  }
  }

Class [ &lt;internal:fileinfo&gt; class finfo ] {

- Constants [0] {
  }

- Static properties [0] {
  }

- Static methods [0] {
  }

- Properties [0] {
  }

- Methods [4] {
  Method [ &lt;internal:fileinfo, ctor&gt; public method finfo ] {

          - Parameters [2] {
            Parameter #0 [ &lt;optional&gt; $options ]
            Parameter #1 [ &lt;optional&gt; $arg ]
          }
        }

        Method [ &lt;internal:fileinfo&gt; public method set_flags ] {

          - Parameters [1] {
            Parameter #0 [ &lt;required&gt; $options ]
          }
        }

        Method [ &lt;internal:fileinfo&gt; public method file ] {

          - Parameters [3] {
            Parameter #0 [ &lt;required&gt; $filename ]
            Parameter #1 [ &lt;optional&gt; $options ]
            Parameter #2 [ &lt;optional&gt; $context ]
          }
        }

        Method [ &lt;internal:fileinfo&gt; public method buffer ] {

          - Parameters [3] {
            Parameter #0 [ &lt;required&gt; $string ]
            Parameter #1 [ &lt;optional&gt; $options ]
            Parameter #2 [ &lt;optional&gt; $context ]
          }
        }

    }
    }

Extension [ &lt;persistent&gt; extension #23 json version 1.2.1 ] {

- Constants [10] {
  Constant [ integer JSON_HEX_TAG ] { 1 }
  Constant [ integer JSON_HEX_AMP ] { 2 }
  Constant [ integer JSON_HEX_APOS ] { 4 }
  Constant [ integer JSON_HEX_QUOT ] { 8 }
  Constant [ integer JSON_FORCE_OBJECT ] { 16 }
  Constant [ integer JSON_ERROR_NONE ] { 0 }
  Constant [ integer JSON_ERROR_DEPTH ] { 1 }
  Constant [ integer JSON_ERROR_STATE_MISMATCH ] { 2 }
  Constant [ integer JSON_ERROR_CTRL_CHAR ] { 3 }
  Constant [ integer JSON_ERROR_SYNTAX ] { 4 }
  }

- Functions {
  Function [ &lt;internal:json&gt; function json_encode ] {

          - Parameters [2] {
            Parameter #0 [ &lt;required&gt; $value ]
            Parameter #1 [ &lt;optional&gt; $options ]
          }
        }
        Function [ &lt;internal:json&gt; function json_decode ] {

          - Parameters [3] {
            Parameter #0 [ &lt;required&gt; $json ]
            Parameter #1 [ &lt;optional&gt; $assoc ]
            Parameter #2 [ &lt;optional&gt; $depth ]
          }
        }
        Function [ &lt;internal:json&gt; function json_last_error ] {

          - Parameters [0] {
          }
        }

    }
    }

dom

DOM/XML =&gt; enabled
DOM/XML API Version =&gt; 20031129
libxml Version =&gt; 2.7.3
HTML Support =&gt; enabled
XPath Support =&gt; enabled
XPointer Support =&gt; enabled
Schema Support =&gt; enabled
RelaxNG Support =&gt; enabled

# Extensión

Si se deseara crear versiones especializadas de las clases que vienen
incorporadas (por ejemplo, para crear HTML en color cuando se
exportan, parar tener variables de acceso rápido en lugar de usar métodos,
o parar crear métodos auxiliares), deberá
extender la clase.

**Ejemplo #1 Extendiendo las clases incorporadas**

&lt;?php
/\*\*

- Mi clase Reflection_Method
  \*/
  class My_Reflection_Method extends ReflectionMethod
  {
  public $visibility = array();

        public function __construct($o, $m)
        {
            parent::__construct($o, $m);
            $this-&gt;visibility = Reflection::getModifierNames($this-&gt;getModifiers());
        }

    }

/\*\*

- Clase demo #1
- \*/
  class T {
  protected function x() {}
  }

/\*\*

- Clase demo #2
- \*/
  class U extends T {
  function x() {}
  }

// Mostrar información
var_dump(new My_Reflection_Method('U', 'x'));
?&gt;

Resultado del ejemplo anterior es similar a:

object(My_Reflection_Method)#1 (3) {
["visibility"]=&gt;
array(1) {
[0]=&gt;
string(6) "public"
}
["name"]=&gt;
string(1) "x"
["class"]=&gt;
string(1) "U"
}

**Precaución**

Si se sobrescribe el constructor, no hay que olvidar llamar
en primer lugar al constructor de la clase padre.
Si esto fallara, se lanzará el siguiente error:
Fatal error: Internal error: Failed to retrieve the reflection object

# La clase Reflection

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase Reflection.

## Sinopsis de la Clase

     class **Reflection**
     {

    /* Métodos */

public static [export](#reflection.export)([Reflector](#class.reflector) $reflector, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)
public static [getModifierNames](#reflection.getmodifiernames)([int](#language.types.integer) $modifiers): [array](#language.types.array)

}

# Reflection::export

(PHP 5, PHP 7)

Reflection::export — Exporta

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.4.0.
Depender de esta función está altamente desaconsejado.

### Descripción

public static **Reflection::export**([Reflector](#class.reflector) $reflector, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)

Exporta una reflexión.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     reflector


       La reflexión a exportar.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

Si el parámetro return
está definido a **[true](#constant.true)**, la exportación será retornada en forma de [string](#language.types.string),
de lo contrario, **[null](#constant.null)** será retornado.

### Ver también

    - [Reflection::getModifierNames()](#reflection.getmodifiernames) - Obtiene los nombres de los modificadores

# Reflection::getModifierNames

(PHP 5, PHP 7, PHP 8)

Reflection::getModifierNames — Obtiene los nombres de los modificadores

### Descripción

public static **Reflection::getModifierNames**([int](#language.types.integer) $modifiers): [array](#language.types.array)

Obtiene los nombres de los modificadores.

### Parámetros

     modifiers


       Campo de bits (bitfield) de los modificadores a obtener.





### Valores devueltos

Un array de los nombres de los modificadores.

### Ejemplos

    **Ejemplo #1 Ejemplo Reflection::getModifierNames()**

&lt;?php
class Testing
{
final public static function foo()
{
return;
}

    public function bar()
    {
        return;
    }

}

$foo = new ReflectionMethod('Testing', 'foo');

echo "Modificadores para el método foo():\n";
echo $foo-&gt;getModifiers() . "\n";
echo implode(' ', Reflection::getModifierNames($foo-&gt;getModifiers())) . "\n";

$bar = new ReflectionMethod('Testing', 'bar');

echo "Modificadores para el método bar():\n";
echo $bar-&gt;getModifiers() . "\n";
echo implode(' ', Reflection::getModifierNames($bar-&gt;getModifiers()));

    Resultado del ejemplo anterior es similar a:

Modificadores para el método foo():
261
final public static
Modificadores para el método bar():
65792
public

### Ver también

    - [ReflectionClass::getModifiers()](#reflectionclass.getmodifiers) - Obtiene los modificadores de clase

    - [ReflectionClassConstant::getModifiers()](#reflectionclassconstant.getmodifiers) - Obtiene los modificadores de la constante de clase

    - [ReflectionMethod::getModifiers()](#reflectionmethod.getmodifiers) - Obtiene los modificadores del método

    - [ReflectionProperty::getModifiers()](#reflectionproperty.getmodifiers) - Obtiene los modificadores de propiedad

## Tabla de contenidos

- [Reflection::export](#reflection.export) — Exporta
- [Reflection::getModifierNames](#reflection.getmodifiernames) — Obtiene los nombres de los modificadores

# La clase ReflectionClass

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionClass** proporciona
    información sobre una clase.

## Sinopsis de la Clase

     class **ReflectionClass**



     implements
      [Reflector](#class.reflector) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IS_IMPLICIT_ABSTRACT](#reflectionclass.constants.is-implicit-abstract);

    public
     const
     [int](#language.types.integer)
      [IS_EXPLICIT_ABSTRACT](#reflectionclass.constants.is-explicit-abstract);

    public
     const
     [int](#language.types.integer)
      [IS_FINAL](#reflectionclass.constants.is-final);

    public
     const
     [int](#language.types.integer)
      [IS_READONLY](#reflectionclass.constants.is-readonly);

    public
     const
     [int](#language.types.integer)
      [SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize);

    public
     const
     [int](#language.types.integer)
      [SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor);


    /* Propiedades */
    public
     [string](#language.types.string)
      [$name](#reflectionclass.props.name);


    /* Métodos */

public [\_\_construct](#reflectionclass.construct)([object](#language.types.object)|[string](#language.types.string) $objectOrClass)

    public static [export](#reflectionclass.export)([mixed](#language.types.mixed) $argumento, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)

public [getAttributes](#reflectionclass.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [getConstant](#reflectionclass.getconstant)([string](#language.types.string) $name): [mixed](#language.types.mixed)
public [getConstants](#reflectionclass.getconstants)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [getConstructor](#reflectionclass.getconstructor)(): [?](#language.types.null)[ReflectionMethod](#class.reflectionmethod)
public [getDefaultProperties](#reflectionclass.getdefaultproperties)(): [array](#language.types.array)
public [getDocComment](#reflectionclass.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getEndLine](#reflectionclass.getendline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getExtension](#reflectionclass.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)
public [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getFileName](#reflectionclass.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getInterfaceNames](#reflectionclass.getinterfacenames)(): [array](#language.types.array)
public [getInterfaces](#reflectionclass.getinterfaces)(): [array](#language.types.array)
public [getLazyInitializer](#reflectionclass.getlazyinitializer)([object](#language.types.object) $object): [?](#language.types.null)[callable](#language.types.callable)
public [getMethod](#reflectionclass.getmethod)([string](#language.types.string) $name): [ReflectionMethod](#class.reflectionmethod)
public [getMethods](#reflectionclass.getmethods)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [getModifiers](#reflectionclass.getmodifiers)(): [int](#language.types.integer)
public [getName](#reflectionclass.getname)(): [string](#language.types.string)
public [getNamespaceName](#reflectionclass.getnamespacename)(): [string](#language.types.string)
public [getParentClass](#reflectionclass.getparentclass)(): [ReflectionClass](#class.reflectionclass)|[false](#language.types.singleton)
public [getProperties](#reflectionclass.getproperties)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [getProperty](#reflectionclass.getproperty)([string](#language.types.string) $name): [ReflectionProperty](#class.reflectionproperty)
public [getReflectionConstant](#reflectionclass.getreflectionconstant)([string](#language.types.string) $name): [ReflectionClassConstant](#class.reflectionclassconstant)|[false](#language.types.singleton)
public [getReflectionConstants](#reflectionclass.getreflectionconstants)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [getShortName](#reflectionclass.getshortname)(): [string](#language.types.string)
public [getStartLine](#reflectionclass.getstartline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getStaticProperties](#reflectionclass.getstaticproperties)(): [array](#language.types.array)
public [getStaticPropertyValue](#reflectionclass.getstaticpropertyvalue)([string](#language.types.string) $name, [mixed](#language.types.mixed) &amp;$def_value = ?): [mixed](#language.types.mixed)
public [getTraitAliases](#reflectionclass.gettraitaliases)(): [array](#language.types.array)
public [getTraitNames](#reflectionclass.gettraitnames)(): [array](#language.types.array)
public [getTraits](#reflectionclass.gettraits)(): [array](#language.types.array)
public [hasConstant](#reflectionclass.hasconstant)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [hasMethod](#reflectionclass.hasmethod)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [hasProperty](#reflectionclass.hasproperty)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [implementsInterface](#reflectionclass.implementsinterface)([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $interface): [bool](#language.types.boolean)
public [initializeLazyObject](#reflectionclass.initializelazyobject)([object](#language.types.object) $object): [object](#language.types.object)
public [inNamespace](#reflectionclass.innamespace)(): [bool](#language.types.boolean)
public [isAbstract](#reflectionclass.isabstract)(): [bool](#language.types.boolean)
public [isAnonymous](#reflectionclass.isanonymous)(): [bool](#language.types.boolean)
public [isCloneable](#reflectionclass.iscloneable)(): [bool](#language.types.boolean)
public [isEnum](#reflectionclass.isenum)(): [bool](#language.types.boolean)
public [isFinal](#reflectionclass.isfinal)(): [bool](#language.types.boolean)
public [isInstance](#reflectionclass.isinstance)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [isInstantiable](#reflectionclass.isinstantiable)(): [bool](#language.types.boolean)
public [isInterface](#reflectionclass.isinterface)(): [bool](#language.types.boolean)
public [isInternal](#reflectionclass.isinternal)(): [bool](#language.types.boolean)
public [isIterable](#reflectionclass.isiterable)(): [bool](#language.types.boolean)
public [isReadOnly](#reflectionclass.isreadonly)(): [bool](#language.types.boolean)
public [isSubclassOf](#reflectionclass.issubclassof)([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $class): [bool](#language.types.boolean)
public [isTrait](#reflectionclass.istrait)(): [bool](#language.types.boolean)
public [isUninitializedLazyObject](#reflectionclass.isuninitializedlazyobject)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [isUserDefined](#reflectionclass.isuserdefined)(): [bool](#language.types.boolean)
public [markLazyObjectAsInitialized](#reflectionclass.marklazyobjectasinitialized)([object](#language.types.object) $object): [object](#language.types.object)
public [newInstance](#reflectionclass.newinstance)([mixed](#language.types.mixed) ...$args): [object](#language.types.object)
public [newInstanceArgs](#reflectionclass.newinstanceargs)([array](#language.types.array) $args = []): [?](#language.types.null)[object](#language.types.object)
public [newInstanceWithoutConstructor](#reflectionclass.newinstancewithoutconstructor)(): [object](#language.types.object)
public [newLazyGhost](#reflectionclass.newlazyghost)([callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [object](#language.types.object)
public [newLazyProxy](#reflectionclass.newlazyproxy)([callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [object](#language.types.object)
public [resetAsLazyGhost](#reflectionclass.resetaslazyghost)([object](#language.types.object) $object, [callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [void](language.types.void.html)
public [resetAsLazyProxy](#reflectionclass.resetaslazyproxy)([object](#language.types.object) $object, [callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [void](language.types.void.html)
public [setStaticPropertyValue](#reflectionclass.setstaticpropertyvalue)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [\_\_toString](#reflectionclass.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       Nombre de la clase. Solo lectura, lanza una
       [ReflectionException](#class.reflectionexception) al intentar escribir.







       **[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize)**
       [int](#language.types.integer)



       Indica que [serialize()](#function.serialize) no debe desencadenar
       la inicialización de un objeto en carga perezosa.






       **[ReflectionClass::SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor)**
       [int](#language.types.integer)



       Indica que un destructor de objeto no debe ser llamado al reinicializarlo
       como objeto perezoso.



## Constantes predefinidas

    ## Modificadores de ReflectionClass





       **[ReflectionClass::IS_IMPLICIT_ABSTRACT](#reflectionclass.constants.is-implicit-abstract)**
       [int](#language.types.integer)



        Indica si la clase es [
        abstracta](#language.oop5.abstract) porque contiene métodos abstractos.








       **[ReflectionClass::IS_EXPLICIT_ABSTRACT](#reflectionclass.constants.is-explicit-abstract)**
       [int](#language.types.integer)



        Indica si la clase es [
        abstracta](#language.oop5.abstract) debido a su definición.








       **[ReflectionClass::IS_FINAL](#reflectionclass.constants.is-final)**
       [int](#language.types.integer)



        Indica si la clase es [final](#language.oop5.final).








       **[ReflectionClass::IS_READONLY](#reflectionclass.constants.is-readonly)**
       [int](#language.types.integer)



        Indica si la clase es [readonly](#language.oop5.basic.class.readonly).






## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       8.0.0

        [ReflectionClass::export()](#reflectionclass.export) ha sido eliminada.





# ReflectionClass::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionClass::\_\_construct — Construye una ReflectionClass

### Descripción

public **ReflectionClass::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $objectOrClass)

Construye un nuevo objeto [ReflectionClass](#class.reflectionclass).

### Parámetros

     objectOrClass


       Puede ser un [string](#language.types.string) que contenga el nombre de la clase a reflejar,
       o un [object](#language.types.object).





### Errores/Excepciones

Se lanza una [ReflectionException](#class.reflectionexception) si la clase a reflejar no existe.

### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass**

&lt;?php
$reflection = new ReflectionClass('Exception');
echo $reflection;
?&gt;

    Resultado del ejemplo anterior es similar a:

Class [ &lt;internal:Core&gt; class Exception implements Stringable, Throwable ] {

- Constants [0] {
  }

- Static properties [0] {
  }

- Static methods [0] {
  }

- Properties [7] {
  Property [ protected $message = '' ]
  Property [ private string $string = '' ]
  Property [ protected $code = 0 ]
  Property [ protected string $file = '' ]
  Property [ protected int $line = 0 ]
  Property [ private array $trace = [] ]
  Property [ private ?Throwable $previous = NULL ]
  }

- Methods [11] {
  Method [ &lt;internal:Core&gt; private method __clone ] {

          - Parameters [0] {
          }
          - Return [ void ]
        }

        Method [ &lt;internal:Core, ctor&gt; public method __construct ] {

          - Parameters [3] {
            Parameter #0 [ &lt;optional&gt; string $message = "" ]
            Parameter #1 [ &lt;optional&gt; int $code = 0 ]
            Parameter #2 [ &lt;optional&gt; ?Throwable $previous = null ]
          }
        }

        Method [ &lt;internal:Core&gt; public method __wakeup ] {

          - Parameters [0] {
          }
          - Tentative return [ void ]
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getMessage ] {

          - Parameters [0] {
          }
          - Return [ string ]
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getCode ] {

          - Parameters [0] {
          }
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getFile ] {

          - Parameters [0] {
          }
          - Return [ string ]
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getLine ] {

          - Parameters [0] {
          }
          - Return [ int ]
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getTrace ] {

          - Parameters [0] {
          }
          - Return [ array ]
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getPrevious ] {

          - Parameters [0] {
          }
          - Return [ ?Throwable ]
        }

        Method [ &lt;internal:Core, prototype Throwable&gt; final public method getTraceAsString ] {

          - Parameters [0] {
          }
          - Return [ string ]
        }

        Method [ &lt;internal:Core, prototype Stringable&gt; public method __toString ] {

          - Parameters [0] {
          }
          - Return [ string ]
        }

    }
    }

### Ver también

    - [ReflectionObject::__construct()](#reflectionobject.construct) - Construye un nuevo objeto ReflectionObject

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionClass::export

(PHP 5, PHP 7)

ReflectionClass::export — Exporta una clase

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionClass::export**([mixed](#language.types.mixed) $argumento, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)

Exporta una clase reflejada.

### Parámetros

     argumento


       La reflexión a exportar.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

Si el parámetro return
está definido a **[true](#constant.true)**, la exportación será retornada en forma de [string](#language.types.string),
de lo contrario, **[null](#constant.null)** será retornado.

### Ejemplos

     **Ejemplo #1 Uso básico de ReflectionClass::export()**




&lt;?php
class Apple {
public $var1;
public $var2 = 'Orange';

    public function type() {
        return 'Apple';
    }

}
ReflectionClass::export('Apple');
?&gt;

    Resultado del ejemplo anterior es similar a:

Class [ &lt;user&gt; class Apple ] {
@@ php shell code 1-8

- Constants [0] {
  }

- Static properties [0] {
  }

- Static methods [0] {
  }

- Properties [2] {
  Property [ &lt;default&gt; public $var1 ]
  Property [ &lt;default&gt; public $var2 ]
  }

- Methods [1] {
  Method [ &lt;user&gt; public method type ] {
  @@ php shell code 5 - 7
  }
  }
  }

### Ver también

    - [ReflectionClass::getName()](#reflectionclass.getname) - Obtiene el nombre de la clase

    - [ReflectionClass::__toString()](#reflectionclass.tostring) - Crea una representación textual del objeto

# ReflectionClass::getAttributes

(PHP 8)

ReflectionClass::getAttributes — Recupera los atributos de una clase

### Descripción

public **ReflectionClass::getAttributes**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Devuelve todos los atributos declarados en esta clase en forma de un array de objetos [ReflectionAttribute](#class.reflectionattribute).

### Parámetros

name

Filtrar los resultados para incluir únicamente las instancias
de [ReflectionAttribute](#class.reflectionattribute) para los atributos correspondientes a este nombre de clase.

flags

Flags para determinar cómo filtrar los resultados, si name es proporcionado.

El valor por omisión es 0 que solo retornará los resultados
para los atributos que son de la clase name.

La única otra opción disponible es utilizar **[ReflectionAttribute::IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof)**,
que utilizará instanceof para el filtrado.

### Valores devueltos

Un array de atributos, en forma de objetos de tipo [ReflectionAttribute](#class.reflectionattribute).

### Ejemplos

    **Ejemplo #1 Uso básico de ReflectionClass::getAttributes()**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Rouge {
}

#[Fruit] #[Rouge]
class Pomme {
}

$class = new ReflectionClass('Pomme');
$attributes = $class-&gt;getAttributes();
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
[1] =&gt; Rouge
)

    **Ejemplo #2 Filtrar los resultados por un nombre de clase**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Rouge {
}

#[Fruit] #[Rouge]
class Pomme {
}

$class = new ReflectionClass('Pomme');
$attributes = $class-&gt;getAttributes('Fruit');
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
)

    **Ejemplo #3 Filtrar los resultados por nombre de clase, con herencia**

&lt;?php
interface Couleur {
}

#[Attribute]
class Fruit {
}

#[Attribute]
class Rouge implements Couleur {
}

#[Fruit] #[Rouge]
class Pomme {
}

$class = new ReflectionClass('Pomme');
$attributes = $class-&gt;getAttributes(Couleur::class, ReflectionAttribute::IS_INSTANCEOF);
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Rouge
)

### Ver también

    - [ReflectionClassConstant::getAttributes()](#reflectionclassconstant.getattributes) - Verifica los atributos

    - [ReflectionFunctionAbstract::getAttributes()](#reflectionfunctionabstract.getattributes) - Devuelve los atributos

    - [ReflectionParameter::getAttributes()](#reflectionparameter.getattributes) - Devuelve los atributos

    - [ReflectionProperty::getAttributes()](#reflectionproperty.getattributes) - Devuelve los atributos

# ReflectionClass::getConstant

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getConstant — Obtiene una constante

### Descripción

public **ReflectionClass::getConstant**([string](#language.types.string) $name): [mixed](#language.types.mixed)

Obtiene una constante definida.

### Parámetros

     name


       El nombre de la constante de clase a obtener.





### Valores devueltos

Valor de la constante con el nombre name.
Devuelve **[false](#constant.false)** si la constante no ha sido encontrada en la clase.

### Ejemplos

    **Ejemplo #1 Uso de ReflectionClass::getConstant()**

&lt;?php

class Example {
const C1 = false;
const C2 = 'I am a constant';
}

$reflection = new ReflectionClass('Example');

var_dump($reflection-&gt;getConstant('C1'));
var_dump($reflection-&gt;getConstant('C2'));
var_dump($reflection-&gt;getConstant('C3'));
?&gt;

    El ejemplo anterior mostrará:

bool(false)
string(15) "I am a constant"
bool(false)

### Ver también

    - [ReflectionClass::getConstants()](#reflectionclass.getconstants) - Obtener constantes

# ReflectionClass::getConstants

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getConstants — Obtener constantes

### Descripción

public **ReflectionClass::getConstants**([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)

Obtiene todas las constantes definidas de una clase, independientemente de su visibilidad.

### Parámetros

    filter


      El filtro opcional, para filtrar las visibilidades constantes deseadas. Se configura utiliando
      las [constantes de ReflectionClassConstant](#reflectionclassconstant.constants.modifiers),
      y por omisión tiene todas las constantes visibles.


### Valores devueltos

Un [array](#language.types.array) de constantes.
El nombre de la constante en la clave, y en el valor, el valor de la constante.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Se añadió el parámetro filter.



### Ver también

    - [ReflectionClass::getConstant()](#reflectionclass.getconstant) - Obtiene una constante

# ReflectionClass::getConstructor

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getConstructor — Obtiene el constructor de una clase

### Descripción

public **ReflectionClass::getConstructor**(): [?](#language.types.null)[ReflectionMethod](#class.reflectionmethod)

Obtiene el constructor de una clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionMethod](#class.reflectionmethod) que refleja el constructor
de la clase, o **[null](#constant.null)** si la clase no tiene constructor.

### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass::getConstructor()**

&lt;?php
$class = new ReflectionClass('ReflectionClass');
$constructor = $class-&gt;getConstructor();
var_dump($constructor);
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionMethod)#2 (2) {
["name"]=&gt;
string(11) "\_\_construct"
["class"]=&gt;
string(15) "ReflectionClass"
}

### Ver también

    - [ReflectionClass::getName()](#reflectionclass.getname) - Obtiene el nombre de la clase

# ReflectionClass::getDefaultProperties

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getDefaultProperties — Obtiene las propiedades por defecto

### Descripción

public **ReflectionClass::getDefaultProperties**(): [array](#language.types.array)

Obtiene las propiedades por defecto de una clase (incluyendo las propiedades heredadas).

**Nota**:

    Este método funciona únicamente para las propiedades estáticas cuando se utiliza en clases internas.
    El valor por defecto de una propiedad de clase estática
    no puede ser monitoreado al utilizar este método en
    clases definidas por el usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) de propiedades por defecto donde la clave es el nombre de la
propiedad y el valor es el valor por defecto de la propiedad o **[null](#constant.null)**
si la propiedad no tiene valor por defecto.
La función no distingue entre propiedades estáticas y no estáticas y no considera la visibilidad.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getDefaultProperties()**

&lt;?php
class Bar {
protected $inheritedProperty = 'inheritedDefault';
}

class Foo extends Bar {
public $property = 'propertyDefault';
private $privateProperty = 'privatePropertyDefault';
public static $staticProperty = 'staticProperty';
public $defaultlessProperty;
}

$reflectionClass = new ReflectionClass('Foo');
var_dump($reflectionClass-&gt;getDefaultProperties());
?&gt;

    El ejemplo anterior mostrará:

array(5) {
["staticProperty"]=&gt;
string(14) "staticProperty"
["property"]=&gt;
string(15) "propertyDefault"
["privateProperty"]=&gt;
string(22) "privatePropertyDefault"
["defaultlessProperty"]=&gt;
NULL
["inheritedProperty"]=&gt;
string(16) "inheritedDefault"
}

### Ver también

    - [ReflectionClass::getProperties()](#reflectionclass.getproperties) - Obtiene las propiedades

    - [ReflectionClass::getStaticProperties()](#reflectionclass.getstaticproperties) - Obtiene las propiedades estáticas

    - [ReflectionClass::getProperty()](#reflectionclass.getproperty) - Obtiene un objeto ReflectionProperty para una propiedad de una clase

# ReflectionClass::getDocComment

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getDocComment — Recupera los comentarios de documentación

### Descripción

public **ReflectionClass::getDocComment**(): [string](#language.types.string)|[false](#language.types.singleton)

Recupera los comentarios de documentación desde una clase.
Los comentarios de documentación comienzan con /\*\*.
Si existen varios comentarios de documentación por encima de la definición
de la clase, se tomará el más cercano a la clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El comentario de documentación, si existe, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getDocComment()**

&lt;?php
/\*\*

- Una clase de prueba
-
- @param foo bar
- @return baz
  \*/
  class TestClass { }

$rc = new ReflectionClass('TestClass');
var_dump($rc-&gt;getDocComment());
?&gt;

    El ejemplo anterior mostrará:

string(61) "/\*\*

- Una clase de prueba
-
- @param foo bar
- @return baz
  \*/"

### Ver también

    - [ReflectionClass::getName()](#reflectionclass.getname) - Obtiene el nombre de la clase

# ReflectionClass::getEndLine

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getEndLine — Obtiene el final de una línea

### Descripción

public **ReflectionClass::getEndLine**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de la última línea desde una definición
de clase, definida por el usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de la última línea desde una definición
de clase, definida por el usuario, o **[false](#constant.false)** si
es desconocido.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getEndLine()**

&lt;?php
// Clase de prueba
class TestClass { }

$rc = new ReflectionClass('TestClass');

echo $rc-&gt;getEndLine();
?&gt;

    El ejemplo anterior mostrará:

3

### Ver también

    - [ReflectionClass::getStartLine()](#reflectionclass.getstartline) - Obtiene el número de línea de inicio

# ReflectionClass::getExtension

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getExtension — Obtiene un objeto [ReflectionExtension](#class.reflectionextension) para la extensión que define la clase

### Descripción

public **ReflectionClass::getExtension**(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)

Obtiene un objeto [ReflectionExtension](#class.reflectionextension) para la extensión
que define la clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionExtension](#class.reflectionextension) que representa la extensión
que define la clase, o **[null](#constant.null)** para las clases definidas por el usuario.

### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass::getExtension()**

&lt;?php
$class = new ReflectionClass('ReflectionClass');
$extension = $class-&gt;getExtension();
var_dump($extension);
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionExtension)#2 (1) {
["name"]=&gt;
string(10) "Reflection"
}

### Ver también

    - [ReflectionClass::getExtensionName()](#reflectionclass.getextensionname) - Obtiene el nombre de la extensión que define la clase

# ReflectionClass::getExtensionName

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getExtensionName — Obtiene el nombre de la extensión que define la clase

### Descripción

public [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre de la extensión que define la clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la extensión que define la clase, o **[false](#constant.false)** para las clases
definidas por el usuario.

### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass::getExtensionName()**

&lt;?php
$class = new ReflectionClass('ReflectionClass');
$extension = $class-&gt;getExtensionName();
var_dump($extension);
?&gt;

    El ejemplo anterior mostrará:

string(10) "Reflection"

### Ver también

    - [ReflectionClass::getExtension()](#reflectionclass.getextension) - Obtiene un objeto ReflectionExtension para la extensión que define la clase

# ReflectionClass::getFileName

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getFileName — Obtiene el nombre del fichero donde la clase ha sido declarada

### Descripción

public **ReflectionClass::getFileName**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre del fichero donde la clase ha sido declarada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Obtiene el nombre del fichero donde la clase ha sido declarada.
Si la clase es declarada en el núcleo de PHP o en una extensión PHP,
**[false](#constant.false)** es devuelto.

### Ver también

    - [ReflectionClass::getExtensionName()](#reflectionclass.getextensionname) - Obtiene el nombre de la extensión que define la clase

# ReflectionClass::getInterfaceNames

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionClass::getInterfaceNames — Obtiene los nombres de las interfaces

### Descripción

public **ReflectionClass::getInterfaceNames**(): [array](#language.types.array)

Obtiene los nombres de las interfaces.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array numérico cuyos valores son los nombres de las interfaces.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getInterfaceNames()**

&lt;?php
interface Foo { }

interface Bar { }

class Baz implements Foo, Bar { }

$rc1 = new ReflectionClass("Baz");

print_r($rc1-&gt;getInterfaceNames());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Foo
[1] =&gt; Bar
)

### Ver también

    - [ReflectionClass::getInterfaces()](#reflectionclass.getinterfaces) - Obtiene las interfaces

# ReflectionClass::getInterfaces

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getInterfaces — Obtiene las interfaces

### Descripción

public **ReflectionClass::getInterfaces**(): [array](#language.types.array)

Obtiene las interfaces.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) asociativo que contiene las interfaces, donde las claves
son los nombres de las interfaces y los valores los objetos
[ReflectionClass](#class.reflectionclass).

### Ejemplos

    **Ejemplo #1 &gt;Ejemplo con ReflectionClass::getInterfaces()**

&lt;?php
interface Foo { }

interface Bar { }

class Baz implements Foo, Bar { }

$rc1 = new ReflectionClass("Baz");

print_r($rc1-&gt;getInterfaces());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[Foo] =&gt; ReflectionClass Object
(
[name] =&gt; Foo
)

    [Bar] =&gt; ReflectionClass Object
        (
            [name] =&gt; Bar
        )

)

### Ver también

    - [ReflectionClass::getInterfaceNames()](#reflectionclass.getinterfacenames) - Obtiene los nombres de las interfaces

# ReflectionClass::getLazyInitializer

(PHP 8 &gt;= 8.4.0)

ReflectionClass::getLazyInitializer — Devuelve el inicializador perezoso

### Descripción

public **ReflectionClass::getLazyInitializer**([object](#language.types.object) $object): [?](#language.types.null)[callable](#language.types.callable)

Devuelve el inicializador perezoso o la fábrica asociada a
object.

### Parámetros

    object


      El objeto a partir del cual obtener el inicializador.


### Valores devueltos

Devuelve el inicializador si el objeto es un objeto perezoso no inicializado,
**[null](#constant.null)** en caso contrario.

### Ver también

- [Objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

# ReflectionClass::getMethod

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getMethod — Obtiene un [ReflectionMethod](#class.reflectionmethod) para un método de clase

### Descripción

public **ReflectionClass::getMethod**([string](#language.types.string) $name): [ReflectionMethod](#class.reflectionmethod)

Obtiene un [ReflectionMethod](#class.reflectionmethod) para un método de clase.

### Parámetros

     name


       El nombre del método a reflejar.





### Valores devueltos

Un objeto [ReflectionMethod](#class.reflectionmethod).

### Errores/Excepciones

Una excepción [ReflectionException](#class.reflectionexception) si el método no existe.

### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass::getMethod()**

&lt;?php
$class = new ReflectionClass('ReflectionClass');
$method = $class-&gt;getMethod('getMethod');
var_dump($method);
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionMethod)#2 (2) {
["name"]=&gt;
string(9) "getMethod"
["class"]=&gt;
string(15) "ReflectionClass"
}

### Ver también

    - [ReflectionClass::getMethods()](#reflectionclass.getmethods) - Obtiene un array de métodos

# ReflectionClass::getMethods

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getMethods — Obtiene un array de métodos

### Descripción

public **ReflectionClass::getMethods**([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)

Obtiene un array de los métodos de una clase.

### Parámetros

     filter


       Filtra los resultados para incluir únicamente los métodos con ciertos
       atributos. Por omisión, no se aplica ningún filtro.




       Cualquier disyunción a nivel de bits de
       **[ReflectionMethod::IS_STATIC](#reflectionmethod.constants.is-static)**,
       **[ReflectionMethod::IS_PUBLIC](#reflectionmethod.constants.is-public)**,
       **[ReflectionMethod::IS_PROTECTED](#reflectionmethod.constants.is-protected)**,
       **[ReflectionMethod::IS_PRIVATE](#reflectionmethod.constants.is-private)**,
       **[ReflectionMethod::IS_ABSTRACT](#reflectionmethod.constants.is-abstract)** y
       **[ReflectionMethod::IS_FINAL](#reflectionmethod.constants.is-final)**,
       de modo que se devuelven todos los métodos con *cualquiera* de los atributos proporcionados.



      **Nota**:

        Tenga en cuenta que otras operaciones a nivel de bits, por ejemplo
        ~ no funcionarán como se espera. En otras
        palabras, no es posible obtener todos los métodos no estáticos, por ejemplo.






### Valores devueltos

Un [array](#language.types.array) de objetos [ReflectionMethod](#class.reflectionmethod) que reflejan cada
método.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       filter ahora es nullable.



### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass::getMethods()**

&lt;?php
class Apple {
public function firstMethod() { }
final protected function secondMethod() { }
private static function thirdMethod() { }
}

$class = new ReflectionClass('Apple');
$methods = $class-&gt;getMethods();
var_dump($methods);
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
object(ReflectionMethod)#2 (2) {
["name"]=&gt;
string(11) "firstMethod"
["class"]=&gt;
string(5) "Apple"
}
[1]=&gt;
object(ReflectionMethod)#3 (2) {
["name"]=&gt;
string(12) "secondMethod"
["class"]=&gt;
string(5) "Apple"
}
[2]=&gt;
object(ReflectionMethod)#4 (2) {
["name"]=&gt;
string(11) "thirdMethod"
["class"]=&gt;
string(5) "Apple"
}
}

    **Ejemplo #2 Filtro de resultados desde ReflectionClass::getMethods()**

&lt;?php
class Apple {
public function firstMethod() { }
final protected function secondMethod() { }
private static function thirdMethod() { }
}

$class = new ReflectionClass('Apple');
$methods = $class-&gt;getMethods(ReflectionMethod::IS_STATIC | ReflectionMethod::IS_FINAL);
var_dump($methods);
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
object(ReflectionMethod)#2 (2) {
["name"]=&gt;
string(12) "secondMethod"
["class"]=&gt;
string(5) "Apple"
}
[1]=&gt;
object(ReflectionMethod)#3 (2) {
["name"]=&gt;
string(11) "thirdMethod"
["class"]=&gt;
string(5) "Apple"
}
}

### Ver también

    - [ReflectionClass::getMethod()](#reflectionclass.getmethod) - Obtiene un ReflectionMethod para un método de clase

    - [get_class_methods()](#function.get-class-methods) - Devuelve los nombres de los métodos de una clase

# ReflectionClass::getModifiers

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getModifiers — Obtiene los modificadores de clase

### Descripción

public **ReflectionClass::getModifiers**(): [int](#language.types.integer)

Devuelve un campo de bits de los modificadores de acceso para esta clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una máscara de bits de las [
constantes de modificadores](#reflectionclass.constants.modifiers).

### Ver también

    - [ReflectionClass::getProperties()](#reflectionclass.getproperties) - Obtiene las propiedades

    - [Reflection::getModifierNames()](#reflection.getmodifiernames) - Obtiene los nombres de los modificadores

# ReflectionClass::getName

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getName — Obtiene el nombre de la clase

### Descripción

public **ReflectionClass::getName**(): [string](#language.types.string)

Obtiene el nombre de la clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la clase.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getName()**

&lt;?php
namespace A\B;

class Foo { }

$function = new \ReflectionClass('stdClass');

var_dump($function-&gt;inNamespace());
var_dump($function-&gt;getName());
var_dump($function-&gt;getNamespaceName());
var_dump($function-&gt;getShortName());

$function = new \ReflectionClass('A\\B\\Foo');

var_dump($function-&gt;inNamespace());
var_dump($function-&gt;getName());
var_dump($function-&gt;getNamespaceName());
var_dump($function-&gt;getShortName());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
string(8) "stdClass"
string(0) ""
string(8) "stdClass"

bool(true)
string(7) "A\B\Foo"
string(3) "A\B"
string(3) "Foo"

### Ver también

    - [ReflectionClass::getNamespaceName()](#reflectionclass.getnamespacename) - Obtiene el espacio de nombres

# ReflectionClass::getNamespaceName

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionClass::getNamespaceName — Obtiene el espacio de nombres

### Descripción

public **ReflectionClass::getNamespaceName**(): [string](#language.types.string)

Obtiene el espacio de nombres.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El espacio de nombres.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getNamespaceName()**

&lt;?php
namespace A\B;

class Foo { }

$class = new \ReflectionClass('stdClass');

var_dump($class-&gt;inNamespace());
var_dump($class-&gt;getName());
var_dump($class-&gt;getNamespaceName());
var_dump($class-&gt;getShortName());

$class = new \ReflectionClass('A\\B\\Foo');

var_dump($class-&gt;inNamespace());
var_dump($class-&gt;getName());
var_dump($class-&gt;getNamespaceName());
var_dump($class-&gt;getShortName());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
string(8) "stdClass"
string(0) ""
string(8) "stdClass"

bool(true)
string(7) "A\B\Foo"
string(3) "A\B"
string(3) "Foo"

### Ver también

    - [ReflectionClass::getParentClass()](#reflectionclass.getparentclass) - Obtiene la clase padre

    - [Los espacios de nombres](#language.namespaces)

# ReflectionClass::getParentClass

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getParentClass — Obtiene la clase padre

### Descripción

public **ReflectionClass::getParentClass**(): [ReflectionClass](#class.reflectionclass)|[false](#language.types.singleton)

Obtiene la clase parental.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionClass](#class.reflectionclass) o **[false](#constant.false)** si no hay padre.

### Ver también

    - [ReflectionClass::__construct()](#reflectionclass.construct) - Construye una ReflectionClass

# ReflectionClass::getProperties

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getProperties — Obtiene las propiedades

### Descripción

public **ReflectionClass::getProperties**([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)

Obtiene las propiedades reflejadas.

### Parámetros

     filter


       El filtro, opcional, para filtrar los tipos de propiedades
       deseadas. Este filtro se configura utilizando las
       [constantes
        ReflectionProperty](#reflectionproperty.constants.modifiers), y por omisión, todos los tipos de propiedades
       son devueltos.





### Valores devueltos

Un array de objetos [ReflectionProperty](#class.reflectionproperty).

### Historial de cambios

      Versión
      Descripción






      7.2.0

       filter ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con ReflectionClass::getProperties()**

    Este ejemplo muestra el uso del parámetro opcional
    filter, que permite filtrar las
    propiedades privadas.

&lt;?php
class Foo {
public $foo = 1;
protected $bar = 2;
private $baz = 3;
}

$foo = new Foo();

$reflect = new ReflectionClass($foo);
$props = $reflect-&gt;getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

foreach ($props as $prop) {
print $prop-&gt;getName() . "\n";
}

var_dump($props);

?&gt;

Resultado del ejemplo anterior es similar a:

foo
bar
array(2) {
[0]=&gt;
object(ReflectionProperty)#3 (2) {
["name"]=&gt;
string(3) "foo"
["class"]=&gt;
string(3) "Foo"
}
[1]=&gt;
object(ReflectionProperty)#4 (2) {
["name"]=&gt;
string(3) "bar"
["class"]=&gt;
string(3) "Foo"
}
}

### Ver también

    - [ReflectionClass::getProperty()](#reflectionclass.getproperty) - Obtiene un objeto ReflectionProperty para una propiedad de una clase

    - [ReflectionProperty](#class.reflectionproperty)

    - Las [constantes
     de modificadores de ReflectionProperty](#reflectionproperty.constants.modifiers)

# ReflectionClass::getProperty

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getProperty — Obtiene un objeto [ReflectionProperty](#class.reflectionproperty) para una propiedad de una clase

### Descripción

public **ReflectionClass::getProperty**([string](#language.types.string) $name): [ReflectionProperty](#class.reflectionproperty)

Obtiene un objeto [ReflectionProperty](#class.reflectionproperty) para una propiedad
de una clase.

### Parámetros

     name


       El nombre de la propiedad.





### Valores devueltos

Un objeto [ReflectionProperty](#class.reflectionproperty).

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getProperty()**

&lt;?php
$class = new ReflectionClass('ReflectionClass');
$property = $class-&gt;getProperty('name');
var_dump($property);
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionProperty)#2 (2) {
["name"]=&gt;
string(4) "name"
["class"]=&gt;
string(15) "ReflectionClass"
}

### Ver también

    - [ReflectionClass::getProperties()](#reflectionclass.getproperties) - Obtiene las propiedades

# ReflectionClass::getReflectionConstant

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClass::getReflectionConstant — Obtiene un [ReflectionClassConstant](#class.reflectionclassconstant) para una constante de una clase

### Descripción

public **ReflectionClass::getReflectionConstant**([string](#language.types.string) $name): [ReflectionClassConstant](#class.reflectionclassconstant)|[false](#language.types.singleton)

Obtiene un [ReflectionClassConstant](#class.reflectionclassconstant) para una constante de clase.

### Parámetros

     name


       El nombre de la constante de clase.





### Valores devueltos

Un [ReflectionClassConstant](#class.reflectionclassconstant), o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ReflectionClass::getReflectionConstants()](#reflectionclass.getreflectionconstants) - Recupera las constantes de clase

    - [ReflectionClassConstant](#class.reflectionclassconstant)

# ReflectionClass::getReflectionConstants

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClass::getReflectionConstants — Recupera las constantes de clase

### Descripción

public **ReflectionClass::getReflectionConstants**([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)

Recupera las constantes reflejadas.

### Parámetros

    filter


      El filtro opcional, para filtrar las constantes con la visibilidad deseada. Esto se configura
      utilizando las
      [constantes ReflectionClassConstant](#reflectionclassconstant.constants.modifiers),
      y por omisión recupera todas las constantes independientemente de la visibilidad.


### Valores devueltos

Un array de objetos [ReflectionClassConstant](#class.reflectionclassconstant).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       filter ha sido añadido.



### Ejemplos

**Ejemplo #1 Ejemplo básico de ReflectionClass::getReflectionConstants()**

&lt;?php
class Foo {
public const FOO = 1;
protected const BAR = 2;
private const BAZ = 3;
}

$foo = new Foo();

$reflect = new ReflectionClass($foo);
$consts = $reflect-&gt;getReflectionConstants();

foreach ($consts as $const) {
print $const-&gt;getName() . "\n";
}

var_dump($consts);

?&gt;

Resultado del ejemplo anterior es similar a:

FOO
BAR
BAZ
array(3) {
[0]=&gt;
object(ReflectionClassConstant)#3 (2) {
["name"]=&gt;
string(3) "FOO"
["class"]=&gt;
string(3) "Foo"
}
[1]=&gt;
object(ReflectionClassConstant)#4 (2) {
["name"]=&gt;
string(3) "BAR"
["class"]=&gt;
string(3) "Foo"
}
[2]=&gt;
object(ReflectionClassConstant)#5 (2) {
["name"]=&gt;
string(3) "BAZ"
["class"]=&gt;
string(3) "Foo"
}
}

### Ver también

    - [ReflectionClass::getReflectionConstant()](#reflectionclass.getreflectionconstant) - Obtiene un ReflectionClassConstant para una constante de una clase

    - [ReflectionClassConstant](#class.reflectionclassconstant)

# ReflectionClass::getShortName

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionClass::getShortName — Obtiene el nombre corto de una clase

### Descripción

public **ReflectionClass::getShortName**(): [string](#language.types.string)

Obtiene el nombre corto de una clase, es decir, la parte sin el espacio de nombres.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre corto de la clase.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::getShortName()**

&lt;?php
namespace A\B;

class Foo { }

$function = new \ReflectionClass('stdClass');

var_dump($function-&gt;inNamespace());
var_dump($function-&gt;getName());
var_dump($function-&gt;getNamespaceName());
var_dump($function-&gt;getShortName());

$function = new \ReflectionClass('A\\B\\Foo');

var_dump($function-&gt;inNamespace());
var_dump($function-&gt;getName());
var_dump($function-&gt;getNamespaceName());
var_dump($function-&gt;getShortName());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
string(8) "stdClass"
string(0) ""
string(8) "stdClass"

bool(true)
string(7) "A\B\Foo"
string(3) "A\B"
string(3) "Foo"

### Ver también

    - [ReflectionClass::getName()](#reflectionclass.getname) - Obtiene el nombre de la clase

# ReflectionClass::getStartLine

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getStartLine — Obtiene el número de línea de inicio

### Descripción

public **ReflectionClass::getStartLine**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de línea de inicio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de línea de inicio, como [int](#language.types.integer), o **[false](#constant.false)** si es desconocido.

### Ver también

    - [ReflectionClass::getEndLine()](#reflectionclass.getendline) - Obtiene el final de una línea

# ReflectionClass::getStaticProperties

(PHP 5, PHP 7, PHP 8)

ReflectionClass::getStaticProperties — Obtiene las propiedades estáticas

### Descripción

public **ReflectionClass::getStaticProperties**(): [array](#language.types.array)

Obtiene las propiedades estáticas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Las propiedades estáticas, como un [array](#language.types.array).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       El tipo de retorno de **ReflectionClass::getStaticProperties()**
       ha sido modificado a [array](#language.types.array) en lugar de ?array.



### Ver también

    - [ReflectionClass::getStaticPropertyValue()](#reflectionclass.getstaticpropertyvalue) - Obtiene el valor de una propiedad estática

    - [ReflectionClass::setStaticPropertyValue()](#reflectionclass.setstaticpropertyvalue) - Define el valor de una propiedad estática pública

# ReflectionClass::getStaticPropertyValue

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionClass::getStaticPropertyValue — Obtiene el valor de una propiedad estática

### Descripción

public **ReflectionClass::getStaticPropertyValue**([string](#language.types.string) $name, [mixed](#language.types.mixed) &amp;$def_value = ?): [mixed](#language.types.mixed)

Obtiene el valor de una propiedad estática de esta clase.

### Parámetros

     name


       El nombre de la propiedad estática para la que devolver un valor.






     def_value


       Un valor predeterminado a devolver en caso de que la clase no declare propiedades
       estáticas con el name dado. Si la propiedad no
       existe y se omite este argumento, se
       lanza una [ReflectionException](#class.reflectionexception).





### Valores devueltos

El valor de la propiedad estática.

### Ejemplos

    **Ejemplo #1 Uso básico de ReflectionClass::getStaticPropertyValue()**

&lt;?php
class Apple {
public static $color = 'Rojo';
}

$class = new ReflectionClass('Apple');
var_dump($class-&gt;getStaticPropertyValue('color'));
?&gt;

    El ejemplo anterior mostrará:

string(4) "Rojo"

### Ver también

    - [ReflectionClass::getStaticProperties()](#reflectionclass.getstaticproperties) - Obtiene las propiedades estáticas

    - [ReflectionClass::setStaticPropertyValue()](#reflectionclass.setstaticpropertyvalue) - Define el valor de una propiedad estática pública

# ReflectionClass::getTraitAliases

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionClass::getTraitAliases — Devuelve un array de alias del trait

### Descripción

public **ReflectionClass::getTraitAliases**(): [array](#language.types.array)

Obtiene un array de alias de métodos definidos en la clase actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con los nuevos nombres de métodos como claves y los nombres
originales como valores (en formato "TraitName::original").

# ReflectionClass::getTraitNames

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionClass::getTraitNames — Devuelve un array de nombres de traits utilizados por esta clase

### Descripción

public **ReflectionClass::getTraitNames**(): [array](#language.types.array)

Devuelve los nombres de los traits utilizados por esta clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de nombres de traits en valores.

# ReflectionClass::getTraits

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionClass::getTraits — Devuelve un array de los traits utilizados por esta clase

### Descripción

public **ReflectionClass::getTraits**(): [array](#language.types.array)

Devuelve un array de los traits utilizados por esta clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con el nombre del trait como clave y las instancias
[ReflectionClass](#class.reflectionclass) de los traits en cuestión como valores.
Devuelve **[null](#constant.null)** en caso de error.

# ReflectionClass::hasConstant

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionClass::hasConstant — Verifica si una constante está definida

### Descripción

public **ReflectionClass::hasConstant**([string](#language.types.string) $name): [bool](#language.types.boolean)

Verifica si una constante específica está definida en una clase.

### Parámetros

     name


       Nombre de la constante a verificar.





### Valores devueltos

**[true](#constant.true)** si la constante está definida, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::hasConstant()**

&lt;?php
class Foo {
const c1 = 1;
}

$class = new ReflectionClass("Foo");

var_dump($class-&gt;hasConstant("c1"));
var_dump($class-&gt;hasConstant("c2"));
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

### Ver también

    - [ReflectionClass::hasMethod()](#reflectionclass.hasmethod) - Verifica si un método está definido

    - [ReflectionClass::hasProperty()](#reflectionclass.hasproperty) - Verifica si una propiedad está definida

# ReflectionClass::hasMethod

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionClass::hasMethod — Verifica si un método está definido

### Descripción

public **ReflectionClass::hasMethod**([string](#language.types.string) $name): [bool](#language.types.boolean)

Verifica si un método específico está definido en una clase.

### Parámetros

     name


       Nombre del método a verificar.





### Valores devueltos

**[true](#constant.true)** si el método está definido, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::hasMethod()**

&lt;?php
Class C {
public function publicFoo() {
return true;
}

    protected function protectedFoo() {
        return true;
    }

    private function privateFoo() {
        return true;
    }

    static function staticFoo() {
        return true;
    }

}

$rc = new ReflectionClass("C");

var_dump($rc-&gt;hasMethod('publicFoo'));

var_dump($rc-&gt;hasMethod('protectedFoo'));

var_dump($rc-&gt;hasMethod('privateFoo'));

var_dump($rc-&gt;hasMethod('staticFoo'));

// C no debería tener el método bar
var_dump($rc-&gt;hasMethod('bar'));

// Los nombres de los métodos no son sensibles a mayúsculas/minúsculas
var_dump($rc-&gt;hasMethod('PUBLICfOO'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
bool(true)

### Ver también

    - [ReflectionClass::hasConstant()](#reflectionclass.hasconstant) - Verifica si una constante está definida

    - [ReflectionClass::hasProperty()](#reflectionclass.hasproperty) - Verifica si una propiedad está definida

# ReflectionClass::hasProperty

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionClass::hasProperty — Verifica si una propiedad está definida

### Descripción

public **ReflectionClass::hasProperty**([string](#language.types.string) $name): [bool](#language.types.boolean)

Verifica si la propiedad especificada está definida.

### Parámetros

     name


       El nombre de la propiedad a verificar.





### Valores devueltos

**[true](#constant.true)** si la propiedad está definida, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::hasProperty()**

&lt;?php
class Foo {
public $p1;
protected $p2;
private $p3;

}

$obj = new ReflectionObject(new Foo());

var_dump($obj-&gt;hasProperty("p1"));
var_dump($obj-&gt;hasProperty("p2"));
var_dump($obj-&gt;hasProperty("p3"));
var_dump($obj-&gt;hasProperty("p4"));
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
bool(false)

### Ver también

    - [ReflectionClass::hasConstant()](#reflectionclass.hasconstant) - Verifica si una constante está definida

    - [ReflectionClass::hasMethod()](#reflectionclass.hasmethod) - Verifica si un método está definido

# ReflectionClass::implementsInterface

(PHP 5, PHP 7, PHP 8)

ReflectionClass::implementsInterface — Verifica si una clase implementa una interfaz

### Descripción

public **ReflectionClass::implementsInterface**([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $interface): [bool](#language.types.boolean)

Verifica si una clase implementa una interfaz.

### Parámetros

     interface


       El nombre de la interfaz.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

**ReflectionClass::implementsInterface()** lanza una
[ReflectionException](#class.reflectionexception) si interface
no es una interfaz.

### Ver también

    - [ReflectionClass::isInterface()](#reflectionclass.isinterface) - Verifica si una clase es una interfaz

    - [ReflectionClass::isSubclassOf()](#reflectionclass.issubclassof) - Verifica si la clase es una subclase

    - [interface_exists()](#function.interface-exists) - Verifica si una interfaz ha sido definida

    - [Las interfaces](#language.oop5.interfaces)

# ReflectionClass::initializeLazyObject

(PHP 8 &gt;= 8.4.0)

ReflectionClass::initializeLazyObject — Forzar la inicialización de un objeto perezoso

### Descripción

public **ReflectionClass::initializeLazyObject**([object](#language.types.object) $object): [object](#language.types.object)

Forzar la inicialización del object especificado. Este
método no tiene ningún efecto si el objeto no es perezoso o ya ha sido
inicializado. De lo contrario, la inicialización se realiza como se describe
en la [Secuencia
de inicialización](#language.oop5.lazy-objects.initialization-sequence).

**Nota**:

    En la mayoría de los casos, llamar a este método es innecesario, ya que los
    objetos perezosos se inicializan automáticamente cuando son observados o
    modificados.

### Parámetros

    object


      El objeto a inicializar.


### Valores devueltos

Si object es un proxy perezoso, devuelve su instancia
real. De lo contrario, devuelve object mismo.

### Ejemplos

**Ejemplo #1 Uso básico**

&lt;?php
class Example
{
public function \_\_construct(public int $prop) {
}
}

$reflector = new ReflectionClass(Example::class);

$object = $reflector-&gt;newLazyGhost(function ($object) {
echo "Initializer called\n";
$object-&gt;\_\_construct(1);
});

var_dump($object);

$reflector-&gt;initializeLazyObject($object);

var_dump($object);
?&gt;

El ejemplo anterior mostrará:

lazy ghost object(Example)#3 (0) {
["prop"]=&gt;
uninitialized(int)
}
Initializer called
object(Example)#3 (1) {
["prop"]=&gt;
int(1)
}

### Ver también

- [Objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

- [ReflectionClass::markLazyObjectAsInitialized()](#reflectionclass.marklazyobjectasinitialized) - Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica

- [ReflectionClass::isUninitializedLazyObject()](#reflectionclass.isuninitializedlazyobject) - Verifica si un objeto es perezoso y no inicializado

# ReflectionClass::inNamespace

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionClass::inNamespace — Verifica si una clase está definida en un espacio de nombres

### Descripción

public **ReflectionClass::inNamespace**(): [bool](#language.types.boolean)

Verifica si una clase está definida en un espacio de nombres.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase está en el espacio de nombres especificado o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::inNamespace()**

&lt;?php
namespace A\B;

class Foo { }

$function = new \ReflectionClass('stdClass');

var_dump($function-&gt;inNamespace());
var_dump($function-&gt;getName());
var_dump($function-&gt;getNamespaceName());
var_dump($function-&gt;getShortName());

$function = new \ReflectionClass('A\\B\\Foo');

var_dump($function-&gt;inNamespace());
var_dump($function-&gt;getName());
var_dump($function-&gt;getNamespaceName());
var_dump($function-&gt;getShortName());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
string(8) "stdClass"
string(0) ""
string(8) "stdClass"

bool(true)
string(7) "A\B\Foo"
string(3) "A\B"
string(3) "Foo"

### Ver también

    - [ReflectionClass::getNamespaceName()](#reflectionclass.getnamespacename) - Obtiene el espacio de nombres

    - [Los espacios de nombres PHP](#language.namespaces)

# ReflectionClass::isAbstract

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isAbstract — Verifica si una clase es abstracta

### Descripción

public **ReflectionClass::isAbstract**(): [bool](#language.types.boolean)

Verifica si una clase es abstracta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase es abstracta o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isAbstract()**

&lt;?php
class TestClass { }
abstract class TestAbstractClass { }

$testClass     = new ReflectionClass('TestClass');
$abstractClass = new ReflectionClass('TestAbstractClass');

var_dump($testClass-&gt;isAbstract());
var_dump($abstractClass-&gt;isAbstract());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [ReflectionClass::isInterface()](#reflectionclass.isinterface) - Verifica si una clase es una interfaz

    - [La abstracción de clase](#language.oop5.abstract)

# ReflectionClass::isAnonymous

(PHP 7, PHP 8)

ReflectionClass::isAnonymous — Verifica si la clase es anónima

### Descripción

public **ReflectionClass::isAnonymous**(): [bool](#language.types.boolean)

Verifica si una clase es una clase anónima.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase es anónima o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isAnonymous()**

&lt;?php
class TestClass {}
$anonClass = new class {};

$normalClass = new ReflectionClass('TestClass');
$anonClass = new ReflectionClass($anonClass);

var_dump($normalClass-&gt;isAnonymous());
var_dump($anonClass-&gt;isAnonymous());

?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [ReflectionClass::isFinal()](#reflectionclass.isfinal) - Verifica si una clase es final

# ReflectionClass::isCloneable

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionClass::isCloneable — Proporciona información sobre la propiedad de duplicación de la clase

### Descripción

public **ReflectionClass::isCloneable**(): [bool](#language.types.boolean)

Indica si esta clase es clonable.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la clase puede ser clonada, **[false](#constant.false)** en caso contrario.

### Ejemplos

     **Ejemplo #1 Uso básico de ReflectionClass::isCloneable()**




&lt;?php
class NotCloneable {
public $var1;

    private function __clone() {
    }

}

class Cloneable {
public $var1;
}

$notCloneable = new ReflectionClass('NotCloneable');
$cloneable = new ReflectionClass('Cloneable');

var_dump($notCloneable-&gt;isCloneable());
var_dump($cloneable-&gt;isCloneable());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

# ReflectionClass::isEnum

(PHP 8 &gt;= 8.1.0)

ReflectionClass::isEnum — Verifica si una clase es una enumeración

### Descripción

public **ReflectionClass::isEnum**(): [bool](#language.types.boolean)

Verifica si una clase es una [enumeración](#language.enumerations).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la clase es una [enumeración](#language.enumerations), de lo contrario **[false](#constant.false)**.

# ReflectionClass::isFinal

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isFinal — Verifica si una clase es final

### Descripción

public **ReflectionClass::isFinal**(): [bool](#language.types.boolean)

Verifica si una clase es final.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase es final o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isFinal()**

&lt;?php
class TestClass { }
final class TestFinalClass { }

$normalClass = new ReflectionClass('TestClass');
$finalClass = new ReflectionClass('TestFinalClass');

var_dump($normalClass-&gt;isFinal());
var_dump($finalClass-&gt;isFinal());

?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [ReflectionClass::isAbstract()](#reflectionclass.isabstract) - Verifica si una clase es abstracta

    - [Palabra clave Final](#language.oop5.final)

# ReflectionClass::isInstance

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isInstance — Verifica si una clase es una instancia de otra clase

### Descripción

public **ReflectionClass::isInstance**([object](#language.types.object) $object): [bool](#language.types.boolean)

Verifica si una clase es una instancia de otra clase.

### Parámetros

     object


       El objeto utilizado para la comparación.





### Valores devueltos

Retorna **[true](#constant.true)** si el objeto es una instancia de la clase, o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isInstance()**

&lt;?php

class Foo {}

$object = new Foo();

$reflection = new ReflectionClass('Foo');

if ($reflection-&gt;isInstance($object)) {
echo "Sí\n";
}

// Equivalente a
if ($object instanceof Foo) {
echo "Sí\n";
}

// Equivalente a
if (is_a($object, 'Foo')) {
echo "Sí";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Sí
Sí
Sí

### Ver también

    - [ReflectionClass::isInterface()](#reflectionclass.isinterface) - Verifica si una clase es una interfaz

    - [Operadores de tipos (instanceof)](#language.operators.type)

    - [Las interfaces](#language.oop5.interfaces)

    - [is_a()](#function.is-a) - Verifica si el objeto es de un cierto tipo o subtipo.

# ReflectionClass::isInstantiable

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isInstantiable — Verifica si una clase es instanciable

### Descripción

public **ReflectionClass::isInstantiable**(): [bool](#language.types.boolean)

Verifica si una clase es instanciable.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase es **instanciable** o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isInstantiable()**

&lt;?php
class C { }

interface iface {
function f1();
}

class ifaceImpl implements iface {
function f1() {}
}

abstract class abstractClass {
function f1() { }
abstract function f2();
}

class D extends abstractClass {
function f2() { }
}

trait T {
function f1() {}
}

class privateConstructor {
private function \_\_construct() { }
}

$classes = array(
"C",
"iface",
"ifaceImpl",
"abstractClass",
"D",
"T",
"privateConstructor",
);

foreach($classes as $class) {
    $reflectionClass = new ReflectionClass($class);
echo "¿Es la clase $class instanciable? ";
    var_dump($reflectionClass-&gt;isInstantiable());
}

?&gt;

    El ejemplo anterior mostrará:

¿Es C instanciable? bool(true)
¿Es iface instanciable? bool(false)
¿Es ifaceImpl instanciable? bool(true)
¿Es abstractClass instanciable? bool(false)
¿Es D instanciable? bool(true)
¿Es T instanciable? bool(false)
¿Es privateConstructor instanciable? bool(false)

### Ver también

    - [ReflectionClass::isInstance()](#reflectionclass.isinstance) - Verifica si una clase es una instancia de otra clase

# ReflectionClass::isInterface

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isInterface — Verifica si una clase es una interfaz

### Descripción

public **ReflectionClass::isInterface**(): [bool](#language.types.boolean)

Verifica si una clase es una interfaz.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase es una **interfaz** o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isInterface()**

&lt;?php
interface SomeInterface {
public function interfaceMethod();
}

$class = new ReflectionClass('SomeInterface');
var_dump($class-&gt;isInterface());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [ReflectionClass::isInstance()](#reflectionclass.isinstance) - Verifica si una clase es una instancia de otra clase

# ReflectionClass::isInternal

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isInternal — Verifica si una clase está definida como interna por una extensión

### Descripción

public **ReflectionClass::isInternal**(): [bool](#language.types.boolean)

Verifica si una clase está definida como interna por una extensión,
o forma parte del núcleo, en oposición a una clase definida por el usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase está definida internamente por una extensión o el núcleo (core), o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isInternal()**

&lt;?php
$internalclass = new ReflectionClass('ReflectionClass');

class Apple {}
$userclass = new ReflectionClass('Apple');

var_dump($internalclass-&gt;isInternal());
var_dump($userclass-&gt;isInternal());
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [ReflectionClass::isUserDefined()](#reflectionclass.isuserdefined) - Verifica si una clase ha sido definida en el espacio de usuario

# ReflectionClass::isIterable

(PHP 7 &gt;= 7.2.0, PHP 8)

ReflectionClass::isIterable — Verifica si esta clase es iterable

### Descripción

public **ReflectionClass::isIterable**(): [bool](#language.types.boolean)

Verifica si esta clase es iterable (es decir, que puede ser utilizada en [foreach](#control-structures.foreach)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la clase es iterable o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Uso simple de ReflectionClass::isIterable()**

&lt;?php

class IteratorClass implements Iterator
{
public function \_\_construct() {}

    public function key(): mixed {}

    public function current(): mixed {}

    public function next(): void {}

    public function valid(): bool {}

    public function rewind(): void {}

}

class DerivedClass extends IteratorClass {}

class NonIterator {}

function dump_iterable($class)
{
    $reflection = new ReflectionClass($class);
var_dump($reflection-&gt;isIterable());
}

$classes = ["ArrayObject", "IteratorClass", "DerivedClass", "NonIterator",];

foreach ($classes as $class) {
    echo "¿Es $class iterable? ";
    dump_iterable($class);
}
?&gt;

    El ejemplo anterior mostrará:

¿Es ArrayObject iterable? bool(true)
¿Es IteratorClass iterable? bool(true)
¿Es DerivedClass iterable? bool(true)
¿Es NonIterator iterable? bool(false)

### Ver también

    - [ReflectionClass::__construct()](#reflectionclass.construct) - Construye una ReflectionClass

# ReflectionClass::isIterateable

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isIterateable — Alias de [ReflectionClass::isIterable()](#reflectionclass.isiterable)

### Descripción

Alias de [ReflectionClass::isIterable()](#reflectionclass.isiterable)

A partir de PHP 7.2.0, en lugar del mal escrito **RefectionClass::isIterateable()**,
[ReflectionClass::isIterable()](#reflectionclass.isiterable) debe ser preferido.

# ReflectionClass::isReadOnly

(PHP 8 &gt;= 8.2.0)

ReflectionClass::isReadOnly — Verifica si una clase es de solo lectura

### Descripción

public **ReflectionClass::isReadOnly**(): [bool](#language.types.boolean)

Verifica si una clase es de [solo lectura](#language.oop5.basic.class.readonly).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la clase es de solo lectura, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isReadOnly()**

&lt;?php
class TestClass { }
readonly class TestReadOnlyClass { }

$normalClass = new ReflectionClass('TestClass');
$readonlyClass = new ReflectionClass('TestReadOnlyClass');

var_dump($normalClass-&gt;isReadOnly());
var_dump($readonlyClass-&gt;isReadOnly());

?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [ReflectionClass::isAbstract()](#reflectionclass.isabstract) - Verifica si una clase es abstracta

    - [Clase de solo lectura](#language.oop5.basic.class.readonly)

# ReflectionClass::isSubclassOf

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isSubclassOf — Verifica si la clase es una subclase

### Descripción

public **ReflectionClass::isSubclassOf**([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $class): [bool](#language.types.boolean)

Verifica si la clase es una subclase de la clase especificada o
implementa una interfaz especificada.

### Parámetros

     class


       Puede ser el nombre de la clase como [string](#language.types.string) o
       un objeto [ReflectionClass](#class.reflectionclass) de la clase a verificar.





### Valores devueltos

Retorna **[true](#constant.true)** si la clase es una subclase de la clase o interfaz especificada, o **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionClass::isInterface()](#reflectionclass.isinterface) - Verifica si una clase es una interfaz

    - [ReflectionClass::implementsInterface()](#reflectionclass.implementsinterface) - Verifica si una clase implementa una interfaz

    - [is_subclass_of()](#function.is-subclass-of) - Determina si un objeto es una subclase de una clase dada o la implementa

    - [get_parent_class()](#function.get-parent-class) - Devuelve el nombre de la clase padre de un objeto

# ReflectionClass::isTrait

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionClass::isTrait — Indica si se trata de un trait

### Descripción

public **ReflectionClass::isTrait**(): [bool](#language.types.boolean)

Determina si esta [ReflectionClass](#class.reflectionclass) es un trait.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es un trait, **[false](#constant.false)** en caso contrario.

# ReflectionClass::isUninitializedLazyObject

(PHP 8 &gt;= 8.4.0)

ReflectionClass::isUninitializedLazyObject — Verifica si un objeto es perezoso y no inicializado

### Descripción

public **ReflectionClass::isUninitializedLazyObject**([object](#language.types.object) $object): [bool](#language.types.boolean)

Verifica si un objeto es perezoso y no inicializado.

### Parámetros

    object


      El objeto a verificar.


### Valores devueltos

Devuelve **[true](#constant.true)** si object es un objeto perezoso y no inicializado
y **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Uso básico**

&lt;?php
class Example
{
public function \_\_construct(public int $prop) {
}
}

$reflector = new ReflectionClass(Example::class);

$object = $reflector-&gt;newLazyGhost(function ($object) {
echo "Initializer called\n";
$object-&gt;\_\_construct(1);
});

var_dump($reflector-&gt;isUninitializedLazyObject($object));

var_dump($object-&gt;prop);

var_dump($reflector-&gt;isUninitializedLazyObject($object));
?&gt;

El ejemplo anterior mostrará:

bool(true)
Initializer called
int(1)
bool(false)

### Ver también

    - [Objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

- [ReflectionClass::markLazyObjectAsInitialized()](#reflectionclass.marklazyobjectasinitialized) - Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica

- [ReflectionClass::initializeLazyObject()](#reflectionclass.initializelazyobject) - Forzar la inicialización de un objeto perezoso

# ReflectionClass::isUserDefined

(PHP 5, PHP 7, PHP 8)

ReflectionClass::isUserDefined — Verifica si una clase ha sido definida en el espacio de usuario

### Descripción

public **ReflectionClass::isUserDefined**(): [bool](#language.types.boolean)

Verifica si una clase ha sido definida en el espacio de usuario,
en lugar de internamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ReflectionClass::isInternal()](#reflectionclass.isinternal) - Verifica si una clase está definida como interna por una extensión

# ReflectionClass::markLazyObjectAsInitialized

(PHP 8 &gt;= 8.4.0)

ReflectionClass::markLazyObjectAsInitialized — Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica

### Descripción

public **ReflectionClass::markLazyObjectAsInitialized**([object](#language.types.object) $object): [object](#language.types.object)

Marca un objeto perezoso como inicializado sin llamar al inicializador o
a la fábrica. Esto no tiene ningún efecto si object no es
perezoso o ya está inicializado.

El efecto de la llamada a este método es el mismo que se describe para los objetos fantasma
(independientemente de la estrategia perezosa de object) en
[secuencia
de inicialización](#language.oop5.lazy-objects.initialization-sequence), excepto que no se llama al inicializador.
Después de esto, el objeto es indistinguible de un objeto que nunca fue perezoso y
fue creado con
[ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor),
excepto por el valor de las propiedades que ya han sido inicializadas con
[ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization)
o [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization).

### Parámetros

    object


      El objeto a marcar como inicializado.


### Valores devueltos

Devuelve object.

### Ejemplos

**Ejemplo #1 Marcar un objeto perezoso no inicializado como inicializado**

&lt;?php
class Example
{
public string $prop1;
public string $prop2;
public string $prop3 = 'default value';
}

$reflector = new ReflectionClass(Example::class);

$object = $reflector-&gt;newLazyGhost(function ($object) {
echo "Initializer called\n";
$object-&gt;prop1 = 'initialized';
});

$reflector-&gt;getProperty('prop1')
          -&gt;setRawValueWithoutLazyInitialization($object, 'prop1 value');

var_dump($object);

$reflector-&gt;markLazyObjectAsInitialized($object);

var_dump($object);
?&gt;

El ejemplo anterior mostrará:

lazy ghost object(Example)#3 (1) {
["prop1"]=&gt;
string(11) "prop1 value"
["prop2"]=&gt;
uninitialized(string)
["prop3"]=&gt;
uninitialized(string)
}
object(Example)#3 (2) {
["prop1"]=&gt;
string(11) "prop1 value"
["prop2"]=&gt;
uninitialized(string)
["prop3"]=&gt;
string(13) "default value"
}

**Ejemplo #2 Marcar un objeto perezoso inicializado como inicializado**

&lt;?php
class Example
{
public string $prop1;
public string $prop2;
public string $prop3 = 'default value';
}

$reflector = new ReflectionClass(Example::class);

$object = $reflector-&gt;newLazyGhost(function ($object) {
echo "Initializer called\n";
$object-&gt;prop1 = 'initialized';
});

$reflector-&gt;getProperty('prop1')
          -&gt;setRawValueWithoutLazyInitialization($object, 'prop1 value');

var_dump($object-&gt;prop3);
var_dump($object);

$reflector-&gt;markLazyObjectAsInitialized($object);

var_dump($object);
?&gt;

    El ejemplo anterior mostrará:

Initializer called
string(13) "default value"
object(Example)#3 (2) {
["prop1"]=&gt;
string(11) "initialized"
["prop2"]=&gt;
uninitialized(string)
["prop3"]=&gt;
string(13) "default value"
}
object(Example)#3 (2) {
["prop1"]=&gt;
string(11) "initialized"
["prop2"]=&gt;
uninitialized(string)
["prop3"]=&gt;
string(13) "default value"
}

### Ver también

- [Objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

- [ReflectionClass::initializeLazyObject()](#reflectionclass.initializelazyobject) - Forzar la inicialización de un objeto perezoso

- [ReflectionClass::isUninitializedLazyObject()](#reflectionclass.isuninitializedlazyobject) - Verifica si un objeto es perezoso y no inicializado

# ReflectionClass::newInstance

(PHP 5, PHP 7, PHP 8)

ReflectionClass::newInstance — Crear una nueva instancia de la clase utilizando los argumentos proporcionados

### Descripción

public **ReflectionClass::newInstance**([mixed](#language.types.mixed) ...$args): [object](#language.types.object)

Crear una nueva instancia de la clase utilizando los argumentos proporcionados a su constructor.

### Parámetros

     args


       Acepta un número variable de argumentos que son pasados al constructor,
       como en la función [call_user_func()](#function.call-user-func).





### Valores devueltos

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si el constructor no es público.

Una [ReflectionException](#class.reflectionexception) si la clase no tiene constructor
y el parámetro args contiene al menos un argumento.

### Ver también

    - [ReflectionClass::newInstanceArgs()](#reflectionclass.newinstanceargs) - Crear una nueva instancia utilizando los argumentos proporcionados

    - [ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor) - Crea una nueva instancia de la clase sin invocar el constructor

# ReflectionClass::newInstanceArgs

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

ReflectionClass::newInstanceArgs — Crear una nueva instancia utilizando los argumentos proporcionados

### Descripción

public **ReflectionClass::newInstanceArgs**([array](#language.types.array) $args = []): [?](#language.types.null)[object](#language.types.object)

Crear una nueva instancia de la clase utilizando
los argumentos proporcionados para pasarlos al constructor.

### Parámetros

     args


       Acepta un número variable de argumentos pasados al constructor,
       como en la función [call_user_func()](#function.call-user-func).





### Valores devueltos

Devuelve una nueva instancia de la clase, o **[null](#constant.null)** en caso de error.

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si el constructor no es público.

Una [ReflectionException](#class.reflectionexception) si la clase no tiene constructor
y el parámetro args contiene al menos un dato.

### Ejemplos

    **Ejemplo #1 Uso básico de ReflectionClass::newInstanceArgs()**

&lt;?php
$class = new ReflectionClass('ReflectionFunction');
$instance = $class-&gt;newInstanceArgs(array('substr'));
var_dump($instance);
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionFunction)#2 (1) {
["name"]=&gt;
string(6) "substr"
}

### Ver también

    - [ReflectionClass::newInstance()](#reflectionclass.newinstance) - Crear una nueva instancia de la clase utilizando los argumentos proporcionados

    - [ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor) - Crea una nueva instancia de la clase sin invocar el constructor

# ReflectionClass::newInstanceWithoutConstructor

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionClass::newInstanceWithoutConstructor — Crea una nueva instancia de la clase sin invocar el constructor

### Descripción

public **ReflectionClass::newInstanceWithoutConstructor**(): [object](#language.types.object)

Crea una nueva instancia de la clase sin invocar su constructor.

### Parámetros

### Valores devueltos

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si la clase es una clase
interna que no puede ser instanciada sin invocar su constructor.
Esta excepción está limitada únicamente a las clases internas que son
[finales](#language.oop5.final).

### Ver también

    - [ReflectionClass::newInstance()](#reflectionclass.newinstance) - Crear una nueva instancia de la clase utilizando los argumentos proporcionados

    - [ReflectionClass::newInstanceArgs()](#reflectionclass.newinstanceargs) - Crear una nueva instancia utilizando los argumentos proporcionados

# ReflectionClass::newLazyGhost

(PHP 8 &gt;= 8.4.0)

ReflectionClass::newLazyGhost — Crear una nueva instancia fantasma perezosa

### Descripción

public **ReflectionClass::newLazyGhost**([callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [object](#language.types.object)

Crear una nueva instancia fantasma perezosa de la clase, adjuntando
el initializer a esta. El constructor no es
llamado, y las propiedades no son definidas a su valor por defecto.
Sin embargo, el objeto será automáticamente inicializado invocando
el initializer la primera vez que su estado es observado
o modificado. Ver
[disparadores
de inicialización](#language.oop5.lazy-objects.initialization-triggers) y [
secuencia de inicialización](#language.oop5.lazy-objects.initialization-sequence).

### Parámetros

    initializer


      El inicializador es una función de retrollamada con la siguiente firma:





       initializer([object](#language.types.object) $object): [void](language.types.void.html)



        object


          El object en curso de inicialización. En este punto,
          el objeto ya no está marcado como perezoso, y acceder a él no desencadena
          la inicialización.






      La función initializer debe devolver **[null](#constant.null)** o no devolver nada.




    options


      options puede ser una combinación de los siguientes flags:





         **[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize)**



          Por omisión, la serialización de un objeto perezoso desencadena su
          inicialización. Definir este flag evita la inicialización, permitiendo
          que los objetos perezosos sean serializados sin ser inicializados.






### Valores devueltos

Devolver una instancia fantasma perezosa. Si el objeto no tiene propiedades,
o si todas sus propiedades son estáticas o virtuales, se devuelve una instancia normal
(no perezosa). Ver también
[Ciclo de vida de los objetos
perezosos](#language.oop5.lazy-objects.lifecycle).

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si la clase es interna o
extiende una clase interna, excepto [stdClass](#class.stdclass).

### Ejemplos

**Ejemplo #1 Uso básico**

&lt;?php

class Example {
public function **construct(public int $prop) {
echo **METHOD\_\_, "\n";
}
}

$reflector = new ReflectionClass(Example::class);
$object = $reflector-&gt;newLazyGhost(function (Example $object) {
$object-&gt;\_\_construct(1);
});

var_dump($object);
var_dump($object instanceof Example);

// Desencadena la inicialización, y obtiene la propiedad después de esto
var_dump($object-&gt;prop);

?&gt;

El ejemplo anterior mostrará:

lazy ghost object(Example)#3 (0) {
["prop"]=&gt;
uninitialized(int)
}
bool(true)
Example::\_\_construct
int(1)

### Ver también

- [Objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionClass::newLazyProxy()](#reflectionclass.newlazyproxy) - Crear una nueva instancia proxy perezosa

- [ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor) - Crea una nueva instancia de la clase sin invocar el constructor

- [ReflectionClass::resetAsLazyGhost()](#reflectionclass.resetaslazyghost) - Reinicia un objeto y lo marca como perezoso

- [ReflectionClass::markLazyObjectAsInitialized()](#reflectionclass.marklazyobjectasinitialized) - Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica

- [ReflectionClass::initializeLazyObject()](#reflectionclass.initializelazyobject) - Forzar la inicialización de un objeto perezoso

- [ReflectionClass::isUninitializedLazyObject()](#reflectionclass.isuninitializedlazyobject) - Verifica si un objeto es perezoso y no inicializado

- [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization) - Define el valor bruto de una propiedad sin activar la inicialización perezosa

- [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) - Marca una propiedad como no perezosa

- [ReflectionProperty::isLazy()](#reflectionproperty.islazy) - Verifica si una propiedad es perezosa

# ReflectionClass::newLazyProxy

(PHP 8 &gt;= 8.4.0)

ReflectionClass::newLazyProxy — Crear una nueva instancia proxy perezosa

### Descripción

public **ReflectionClass::newLazyProxy**([callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [object](#language.types.object)

Crear una nueva instancia proxy perezosa de la clase, adjuntando la
factory a la misma. El constructor no es
llamado, y las propiedades no son definidas a su valor por defecto. Cuando se
intenta observar o modificar el estado del proxy por primera vez, la función
fábrica es llamada para proporcionar una instancia real, que es luego adjuntada
al proxy. Después de esto, todas las interacciones posteriores con el proxy son
transmitidas a la instancia real. Ver
[disparadores
de inicialización](#language.oop5.lazy-objects.initialization-triggers) y [
secuencia de inicialización](#language.oop5.lazy-objects.initialization-sequence).

### Parámetros

    factory


      La fábrica es una función de devolución de llamada con la siguiente firma:





       factory([object](#language.types.object) $object): [object](#language.types.object)



        object


          El object en curso de inicialización. En este punto,
          el objeto ya no está marcado como perezoso, y acceder a él no dispara
          la inicialización.






      La función fábrica debe devolver un objeto, llamado *instancia real*,
      que es luego adjuntado al proxy. Esta instancia real no debe ser perezosa
      ni debe ser el proxy mismo. Si la instancia real no tiene la misma clase
      que el proxy, la clase del proxy debe ser una subclase de la clase de la
      instancia real, sin propiedades adicionales, y no debe sobrescribir los
      métodos **__destruct()** o **__clone()**.




    options

      options puede ser una combinación de los siguientes flags:





         **[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize)**



          Por omisión, la serialización de un objeto perezoso desencadena su
          inicialización. Definir este flag evita la inicialización, permitiendo
          que los objetos perezosos sean serializados sin ser inicializados.






### Valores devueltos

Devuelve una instancia proxy perezosa. Si el objeto no tiene propiedades, o si
todas sus propiedades son estáticas o virtuales, se devuelve una instancia normal
(no perezosa). Ver también
[Ciclo de vida de los objetos
perezosos](#language.oop5.lazy-objects.lifecycle).

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si la clase es interna o
extiende una clase interna, excepto [stdClass](#class.stdclass).

### Ejemplos

**Ejemplo #1 Uso básico**

&lt;?php
class Example {
public function **construct(public int $prop) {
echo **METHOD\_\_, "\n";
}
}

$reflector = new ReflectionClass(Example::class);
$object = $reflector-&gt;newLazyProxy(function (Example $object) {
$realInstance = new Example(1);
return $realInstance;
});

var_dump($object);
var_dump($object instanceof Example);

// Dispara la inicialización, y transmite la recuperación de la propiedad a la instancia real
var_dump($object-&gt;prop);

var_dump($object);
?&gt;

El ejemplo anterior mostrará:

lazy proxy object(Example)#3 (0) {
["prop"]=&gt;
uninitialized(int)
}
bool(true)
Example::\_\_construct
int(1)
lazy proxy object(Example)#3 (1) {
["instance"]=&gt;
object(Example)#4 (1) {
["prop"]=&gt;
int(1)
}
}

### Ver también

- [Objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

- [ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor) - Crea una nueva instancia de la clase sin invocar el constructor

- [ReflectionClass::resetAsLazyProxy()](#reflectionclass.resetaslazyproxy) - Reinicia un objeto y lo marca como perezoso

- [ReflectionClass::markLazyObjectAsInitialized()](#reflectionclass.marklazyobjectasinitialized) - Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica

- [ReflectionClass::initializeLazyObject()](#reflectionclass.initializelazyobject) - Forzar la inicialización de un objeto perezoso

- [ReflectionClass::isUninitializedLazyObject()](#reflectionclass.isuninitializedlazyobject) - Verifica si un objeto es perezoso y no inicializado

- [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization) - Define el valor bruto de una propiedad sin activar la inicialización perezosa

- [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) - Marca una propiedad como no perezosa

- [ReflectionProperty::isLazy()](#reflectionproperty.islazy) - Verifica si una propiedad es perezosa

# ReflectionClass::resetAsLazyGhost

(PHP 8 &gt;= 8.4.0)

ReflectionClass::resetAsLazyGhost — Reinicia un objeto y lo marca como perezoso

### Descripción

public **ReflectionClass::resetAsLazyGhost**([object](#language.types.object) $object, [callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [void](language.types.void.html)

Reinicia un objeto existente y lo marca como perezoso.

El destructor del objeto es llamado (si existe) a menos que se especifique el flag
**[ReflectionClass::SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor)**. En el caso particular donde el objeto es un proxy inicializado, la instancia real es desvinculada del proxy. Si la instancia real ya no es referenciada en otro lugar, su destructor es llamado independientemente del
flag **[SKIP_DESTRUCTOR](#constant.skip-destructor)**.

Las propiedades dinámicas son eliminadas, y el valor de las propiedades
declaradas en la clase es descartado como si [unset()](#function.unset) fuera
llamada, y marcadas como perezosas. Esto implica que si el objeto es una
instancia de una subclase con propiedades adicionales, estas propiedades
no son modificadas y no son marcadas como perezosas.
Las [propiedades
readonly](#language.oop5.properties.readonly-properties) no son modificadas y no son marcadas como perezosas si son final o si la clase misma
es final.

Si ninguna propiedad es marcada como perezosa, el objeto no es marcado como perezoso. Ver
también
[Ciclo de vida de los objetos
perezosos](#language.oop5.lazy-objects.lifecycle).

De lo contrario, después de la llamada a este método, el comportamiento del objeto es el mismo
que un objeto creado por
[ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) (excepto para
las propiedades de subclase y las propiedades readonly, como se describe anteriormente).

El objeto no es reemplazado por otro, y su identidad permanece inalterada. Las funcionalidades como [spl_object_id()](#function.spl-object-id),
[spl_object_hash()](#function.spl-object-hash),
[SplObjectStorage](#class.splobjectstorage), [WeakMap](#class.weakmap),
[WeakReference](#class.weakreference), o
[el operador de identidad
(===)](#language.oop5.object-comparison) no son afectadas.

### Parámetros

    object


      Un objeto no perezoso, o un objeto perezoso inicializado.




    initializer


      Una función de retrollamada con la misma firma y propósito que en
      [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost).




    options


      options puede ser una combinación de los siguientes flags:





         **[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize)**



          Por omisión, la serialización de un objeto perezoso desencadena su
          inicialización. Definir este flag evita la inicialización, permitiendo
          que los objetos perezosos sean serializados sin ser inicializados.





         **[ReflectionClass::SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor)**



          Por omisión, el destructor del objeto es llamado (si existe) antes de
          marcarlo como perezoso. Este flag desactiva este comportamiento,
          permitiendo que los objetos sean reiniciados como perezosos sin llamar
          al destructor.






### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si el objeto es perezoso y no
está inicializado.

Una [Error](#class.error) si el objeto está en proceso de inicialización, o si
las propiedades del objeto son iteradas con
[foreach](#control-structures.foreach).

### Ver también

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

- [ReflectionClass::resetAsLazyProxy()](#reflectionclass.resetaslazyproxy) - Reinicia un objeto y lo marca como perezoso

# ReflectionClass::resetAsLazyProxy

(PHP 8 &gt;= 8.4.0)

ReflectionClass::resetAsLazyProxy — Reinicia un objeto y lo marca como perezoso

### Descripción

public **ReflectionClass::resetAsLazyProxy**([object](#language.types.object) $object, [callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [void](language.types.void.html)

El comportamiento de este método es el mismo que
[ReflectionClass::resetAsLazyGhost()](#reflectionclass.resetaslazyghost) excepto que utiliza
la estrategia de proxy.

El object mismo se convierte en el proxy. De manera similar
a [ReflectionClass::resetAsLazyGhost()](#reflectionclass.resetaslazyghost), el objeto no es
reemplazado por otro, y su identidad no cambia, incluso después
de la inicialización. El proxy y la instancia real son objetos distintos, con
identidades distintas.

### Parámetros

    object


      Un objeto no perezoso, o un objeto perezoso inicializado.




    factory


      Una función de devolución de llamada con la misma firma y propósito que en
      [ReflectionClass::newLazyProxy()](#reflectionclass.newlazyproxy).




    options

      options puede ser una combinación de los siguientes flags:





         **[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize)**



          Por omisión, la serialización de un objeto perezoso desencadena su
          inicialización. Definir este flag evita la inicialización, permitiendo
          que los objetos perezosos sean serializados sin ser inicializados.





         **[ReflectionClass::SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor)**



          Por omisión, el destructor del objeto es llamado (si existe) antes de
          marcarlo como perezoso. Este flag desactiva este comportamiento,
          permitiendo que los objetos sean reiniciados como perezosos sin llamar
          al destructor.






### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si el objeto es perezoso y no
está inicializado.

Una [Error](#class.error) si el objeto está en proceso de inicialización, o si
las propiedades del objeto son iteradas con
[foreach](#control-structures.foreach).

### Ver también

- [ReflectionClass::newLazyProxy()](#reflectionclass.newlazyproxy) - Crear una nueva instancia proxy perezosa

- [ReflectionClass::resetAsLazyGhost()](#reflectionclass.resetaslazyghost) - Reinicia un objeto y lo marca como perezoso

# ReflectionClass::setStaticPropertyValue

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionClass::setStaticPropertyValue — Define el valor de una propiedad estática pública

### Descripción

public **ReflectionClass::setStaticPropertyValue**([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Define el valor de una propiedad estática pública.
Si la propiedad es privada o protegida, el método fallará.

[ReflectionProperty::setValue()](#reflectionproperty.setvalue) permite definir
el valor de las propiedades públicas, privadas y protegidas.

### Parámetros

     name


       El nombre de la propiedad.






     value


       El nuevo valor para la propiedad.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       El uso de **ReflectionClass::setStaticPropertyValue()** para definir
       una propiedad privada o protegida ahora produce un error fatal. Anteriormente, esto
       lanzaba una [ReflectionException](#class.reflectionexception).



### Ver también

    - [ReflectionClass::getStaticPropertyValue()](#reflectionclass.getstaticpropertyvalue) - Obtiene el valor de una propiedad estática

    - [ReflectionProperty::setValue()](#reflectionproperty.setvalue) - Define el valor de la propiedad

# ReflectionClass::\_\_toString

(PHP 5, PHP 7, PHP 8)

ReflectionClass::\_\_toString — Crea una representación textual del objeto

### Descripción

public **ReflectionClass::\_\_toString**(): [string](#language.types.string)

Crea una representación textual del objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación textual de la instancia actual de [ReflectionClass](#class.reflectionclass)

### Ejemplos

    **Ejemplo #1 Ejemplo para ReflectionClass::__toString()**

&lt;?php
$reflectionClass = new ReflectionClass('Exception');
echo $reflectionClass-&gt;\_\_toString();
?&gt;

    El ejemplo anterior mostrará:

Class [ &lt;internal:Core&gt; class Exception ] {

- Constants [0] {
  }

- Static properties [0] {
  }

- Static methods [0] {
  }

- Properties [7] {
  Property [ &lt;default&gt; protected $message ]
  Property [ &lt;default&gt; private $string ]
  Property [ &lt;default&gt; protected $code ]
  Property [ &lt;default&gt; protected $file ]
  Property [ &lt;default&gt; protected $line ]
  Property [ &lt;default&gt; private $trace ]
  Property [ &lt;default&gt; private $previous ]
  }

- Methods [10] {
  Method [ &lt;internal:Core&gt; final private method __clone ] {
  }

        Method [ &lt;internal:Core, ctor&gt; public method __construct ] {

          - Parameters [3] {
            Parameter #0 [ &lt;optional&gt; $message ]
            Parameter #1 [ &lt;optional&gt; $code ]
            Parameter #2 [ &lt;optional&gt; $previous ]
          }
        }

        Method [ &lt;internal:Core&gt; final public method getMessage ] {
        }

        Method [ &lt;internal:Core&gt; final public method getCode ] {
        }

        Method [ &lt;internal:Core&gt; final public method getFile ] {
        }

        Method [ &lt;internal:Core&gt; final public method getLine ] {
        }

        Method [ &lt;internal:Core&gt; final public method getTrace ] {
        }

        Method [ &lt;internal:Core&gt; final public method getPrevious ] {
        }

        Method [ &lt;internal:Core&gt; final public method getTraceAsString ] {
        }

        Method [ &lt;internal:Core&gt; public method __toString ] {
        }

    }
    }

### Ver también

    - [ReflectionClass::export()](#reflectionclass.export) - Exporta una clase

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionClass::\_\_construct](#reflectionclass.construct) — Construye una ReflectionClass
- [ReflectionClass::export](#reflectionclass.export) — Exporta una clase
- [ReflectionClass::getAttributes](#reflectionclass.getattributes) — Recupera los atributos de una clase
- [ReflectionClass::getConstant](#reflectionclass.getconstant) — Obtiene una constante
- [ReflectionClass::getConstants](#reflectionclass.getconstants) — Obtener constantes
- [ReflectionClass::getConstructor](#reflectionclass.getconstructor) — Obtiene el constructor de una clase
- [ReflectionClass::getDefaultProperties](#reflectionclass.getdefaultproperties) — Obtiene las propiedades por defecto
- [ReflectionClass::getDocComment](#reflectionclass.getdoccomment) — Recupera los comentarios de documentación
- [ReflectionClass::getEndLine](#reflectionclass.getendline) — Obtiene el final de una línea
- [ReflectionClass::getExtension](#reflectionclass.getextension) — Obtiene un objeto ReflectionExtension para la extensión que define la clase
- [ReflectionClass::getExtensionName](#reflectionclass.getextensionname) — Obtiene el nombre de la extensión que define la clase
- [ReflectionClass::getFileName](#reflectionclass.getfilename) — Obtiene el nombre del fichero donde la clase ha sido declarada
- [ReflectionClass::getInterfaceNames](#reflectionclass.getinterfacenames) — Obtiene los nombres de las interfaces
- [ReflectionClass::getInterfaces](#reflectionclass.getinterfaces) — Obtiene las interfaces
- [ReflectionClass::getLazyInitializer](#reflectionclass.getlazyinitializer) — Devuelve el inicializador perezoso
- [ReflectionClass::getMethod](#reflectionclass.getmethod) — Obtiene un ReflectionMethod para un método de clase
- [ReflectionClass::getMethods](#reflectionclass.getmethods) — Obtiene un array de métodos
- [ReflectionClass::getModifiers](#reflectionclass.getmodifiers) — Obtiene los modificadores de clase
- [ReflectionClass::getName](#reflectionclass.getname) — Obtiene el nombre de la clase
- [ReflectionClass::getNamespaceName](#reflectionclass.getnamespacename) — Obtiene el espacio de nombres
- [ReflectionClass::getParentClass](#reflectionclass.getparentclass) — Obtiene la clase padre
- [ReflectionClass::getProperties](#reflectionclass.getproperties) — Obtiene las propiedades
- [ReflectionClass::getProperty](#reflectionclass.getproperty) — Obtiene un objeto ReflectionProperty para una propiedad de una clase
- [ReflectionClass::getReflectionConstant](#reflectionclass.getreflectionconstant) — Obtiene un ReflectionClassConstant para una constante de una clase
- [ReflectionClass::getReflectionConstants](#reflectionclass.getreflectionconstants) — Recupera las constantes de clase
- [ReflectionClass::getShortName](#reflectionclass.getshortname) — Obtiene el nombre corto de una clase
- [ReflectionClass::getStartLine](#reflectionclass.getstartline) — Obtiene el número de línea de inicio
- [ReflectionClass::getStaticProperties](#reflectionclass.getstaticproperties) — Obtiene las propiedades estáticas
- [ReflectionClass::getStaticPropertyValue](#reflectionclass.getstaticpropertyvalue) — Obtiene el valor de una propiedad estática
- [ReflectionClass::getTraitAliases](#reflectionclass.gettraitaliases) — Devuelve un array de alias del trait
- [ReflectionClass::getTraitNames](#reflectionclass.gettraitnames) — Devuelve un array de nombres de traits utilizados por esta clase
- [ReflectionClass::getTraits](#reflectionclass.gettraits) — Devuelve un array de los traits utilizados por esta clase
- [ReflectionClass::hasConstant](#reflectionclass.hasconstant) — Verifica si una constante está definida
- [ReflectionClass::hasMethod](#reflectionclass.hasmethod) — Verifica si un método está definido
- [ReflectionClass::hasProperty](#reflectionclass.hasproperty) — Verifica si una propiedad está definida
- [ReflectionClass::implementsInterface](#reflectionclass.implementsinterface) — Verifica si una clase implementa una interfaz
- [ReflectionClass::initializeLazyObject](#reflectionclass.initializelazyobject) — Forzar la inicialización de un objeto perezoso
- [ReflectionClass::inNamespace](#reflectionclass.innamespace) — Verifica si una clase está definida en un espacio de nombres
- [ReflectionClass::isAbstract](#reflectionclass.isabstract) — Verifica si una clase es abstracta
- [ReflectionClass::isAnonymous](#reflectionclass.isanonymous) — Verifica si la clase es anónima
- [ReflectionClass::isCloneable](#reflectionclass.iscloneable) — Proporciona información sobre la propiedad de duplicación de la clase
- [ReflectionClass::isEnum](#reflectionclass.isenum) — Verifica si una clase es una enumeración
- [ReflectionClass::isFinal](#reflectionclass.isfinal) — Verifica si una clase es final
- [ReflectionClass::isInstance](#reflectionclass.isinstance) — Verifica si una clase es una instancia de otra clase
- [ReflectionClass::isInstantiable](#reflectionclass.isinstantiable) — Verifica si una clase es instanciable
- [ReflectionClass::isInterface](#reflectionclass.isinterface) — Verifica si una clase es una interfaz
- [ReflectionClass::isInternal](#reflectionclass.isinternal) — Verifica si una clase está definida como interna por una extensión
- [ReflectionClass::isIterable](#reflectionclass.isiterable) — Verifica si esta clase es iterable
- [ReflectionClass::isIterateable](#reflectionclass.isiterateable) — Alias de ReflectionClass::isIterable
- [ReflectionClass::isReadOnly](#reflectionclass.isreadonly) — Verifica si una clase es de solo lectura
- [ReflectionClass::isSubclassOf](#reflectionclass.issubclassof) — Verifica si la clase es una subclase
- [ReflectionClass::isTrait](#reflectionclass.istrait) — Indica si se trata de un trait
- [ReflectionClass::isUninitializedLazyObject](#reflectionclass.isuninitializedlazyobject) — Verifica si un objeto es perezoso y no inicializado
- [ReflectionClass::isUserDefined](#reflectionclass.isuserdefined) — Verifica si una clase ha sido definida en el espacio de usuario
- [ReflectionClass::markLazyObjectAsInitialized](#reflectionclass.marklazyobjectasinitialized) — Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica
- [ReflectionClass::newInstance](#reflectionclass.newinstance) — Crear una nueva instancia de la clase utilizando los argumentos proporcionados
- [ReflectionClass::newInstanceArgs](#reflectionclass.newinstanceargs) — Crear una nueva instancia utilizando los argumentos proporcionados
- [ReflectionClass::newInstanceWithoutConstructor](#reflectionclass.newinstancewithoutconstructor) — Crea una nueva instancia de la clase sin invocar el constructor
- [ReflectionClass::newLazyGhost](#reflectionclass.newlazyghost) — Crear una nueva instancia fantasma perezosa
- [ReflectionClass::newLazyProxy](#reflectionclass.newlazyproxy) — Crear una nueva instancia proxy perezosa
- [ReflectionClass::resetAsLazyGhost](#reflectionclass.resetaslazyghost) — Reinicia un objeto y lo marca como perezoso
- [ReflectionClass::resetAsLazyProxy](#reflectionclass.resetaslazyproxy) — Reinicia un objeto y lo marca como perezoso
- [ReflectionClass::setStaticPropertyValue](#reflectionclass.setstaticpropertyvalue) — Define el valor de una propiedad estática pública
- [ReflectionClass::\_\_toString](#reflectionclass.tostring) — Crea una representación textual del objeto

# La classe ReflectionClassConstant

(PHP 7 &gt;= 7.1.0, PHP 8)

## Introducción

    La classe **ReflectionClassConstant** proporciona
    información sobre una constante de clase.

## Sinopsis de la Clase

     class **ReflectionClassConstant**



     implements
      [Reflector](#class.reflector) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IS_PUBLIC](#reflectionclassconstant.constants.is-public);

    public
     const
     [int](#language.types.integer)
      [IS_PROTECTED](#reflectionclassconstant.constants.is-protected);

    public
     const
     [int](#language.types.integer)
      [IS_PRIVATE](#reflectionclassconstant.constants.is-private);

    public
     const
     [int](#language.types.integer)
      [IS_FINAL](#reflectionclassconstant.constants.is-final);


    /* Propiedades */
    public
     [string](#language.types.string)
      [$name](#reflectionclassconstant.props.name);

    public
     [string](#language.types.string)
      [$class](#reflectionclassconstant.props.class);


    /* Métodos */

public [\_\_construct](#reflectionclassconstant.construct)([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $constant)

    public static [export](#reflectionclassconstant.export)([mixed](#language.types.mixed) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

public [getAttributes](#reflectionclassconstant.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [getDeclaringClass](#reflectionclassconstant.getdeclaringclass)(): [ReflectionClass](#class.reflectionclass)
public [getDocComment](#reflectionclassconstant.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getModifiers](#reflectionclassconstant.getmodifiers)(): [int](#language.types.integer)
public [getName](#reflectionclassconstant.getname)(): [string](#language.types.string)
public [getType](#reflectionclassconstant.gettype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [getValue](#reflectionclassconstant.getvalue)(): [mixed](#language.types.mixed)
public [hasType](#reflectionclassconstant.hastype)(): [bool](#language.types.boolean)
public [isDeprecated](#reflectionclassconstant.isdeprecated)(): [bool](#language.types.boolean)
public [isEnumCase](#reflectionclassconstant.isenumcase)(): [bool](#language.types.boolean)
public [isFinal](#reflectionclassconstant.isfinal)(): [bool](#language.types.boolean)
public [isPrivate](#reflectionclassconstant.isprivate)(): [bool](#language.types.boolean)
public [isProtected](#reflectionclassconstant.isprotected)(): [bool](#language.types.boolean)
public [isPublic](#reflectionclassconstant.ispublic)(): [bool](#language.types.boolean)
public [\_\_toString](#reflectionclassconstant.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       Nombre de la constante de clase. Solo lectura, genera una
       [ReflectionException](#class.reflectionexception) al intentar modificarla.






     class


       Nombre de la clase donde se define la constante de clase. Solo lectura, genera una
       [ReflectionException](#class.reflectionexception) al intentar modificarla.





## Constantes predefinidas

    ## Modificadores de ReflectionClassConstant





       **[ReflectionClassConstant::IS_PUBLIC](#reflectionclassconstant.constants.is-public)**
       [int](#language.types.integer)



        Indica las constantes [public](#language.oop5.visibility).
        Anterior a PHP 7.4.0, el valor era 256.








       **[ReflectionClassConstant::IS_PROTECTED](#reflectionclassconstant.constants.is-protected)**
       [int](#language.types.integer)



        Indica las constantes [protected](#language.oop5.visibility).
        Anterior a PHP 7.4.0, el valor era 512.








       **[ReflectionClassConstant::IS_PRIVATE](#reflectionclassconstant.constants.is-private)**
       [int](#language.types.integer)



        Indica las constantes [private](#language.oop5.visibility).
        Anterior a PHP 7.4.0, el valor era 1024.








       **[ReflectionClassConstant::IS_FINAL](#reflectionclassconstant.constants.is-final)**
       [int](#language.types.integer)



        Indica las constantes [final](#language.oop5.final)
        Disponible a partir de PHP 8.1.0.







    **Nota**:



      El valor de estas constantes puede cambiar entre versiones de PHP.
      Se recomienda siempre utilizar las constantes y no depender de los valores directamente.


## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       8.0.0

        [ReflectionClassConstant::export()](#reflectionclassconstant.export) ha sido eliminada.





# ReflectionClassConstant::\_\_construct

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::\_\_construct — Construye una ReflectionClassConstant

### Descripción

public **ReflectionClassConstant::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $constant)

Construye un nuevo objeto [ReflectionClassConstant](#class.reflectionclassconstant).

### Parámetros

     class


       Puede ser un [string](#language.types.string) que contenga el nombre de la clase a reflejar, o un [object](#language.types.object).






     constant


       El nombre de la constante de clase.





### Errores/Excepciones

Se lanza una [Exception](#class.exception) en caso de que la constante de clase proporcionada no exista.

### Ver también

    - [Constructors](#language.oop5.decon.constructor)

# ReflectionClassConstant::export

(PHP 7 &gt;= 7.1.0)

ReflectionClassConstant::export — Exporta

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionClassConstant::export**([mixed](#language.types.mixed) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

Exporta una reflexión.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     class


       La reflexión a exportar.






     name


       El nombre de la constante de clase.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

### Ver también

    - [ReflectionClassConstant::__toString()](#reflectionclassconstant.tostring) - Devuelve la representación en forma de string del objeto ReflectionClassConstant

# ReflectionClassConstant::getAttributes

(PHP 8)

ReflectionClassConstant::getAttributes — Verifica los atributos

### Descripción

public **ReflectionClassConstant::getAttributes**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Verifica todos los atributos declarados en esta constante de clase en forma de un array de objetos [ReflectionAttribute](#class.reflectionattribute).

### Parámetros

name

Filtrar los resultados para incluir únicamente las instancias
de [ReflectionAttribute](#class.reflectionattribute) para los atributos correspondientes a este nombre de clase.

flags

Flags para determinar cómo filtrar los resultados, si name es proporcionado.

El valor por omisión es 0 que solo retornará los resultados
para los atributos que son de la clase name.

La única otra opción disponible es utilizar **[ReflectionAttribute::IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof)**,
que utilizará instanceof para el filtrado.

### Valores devueltos

Un array de atributos, en forma de objetos [ReflectionAttribute](#class.reflectionattribute).

### Ejemplos

    **Ejemplo #1 Uso simple**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

class Basket { #[Fruit] #[Red]
public const APPLE = 'apple';
}

$classConstant = new ReflectionClassConstant('Basket', 'APPLE');
$attributes = $classConstant-&gt;getAttributes();
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
[1] =&gt; Red
)

    **Ejemplo #2 Resultados filtrados por nombre de clase**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

class Basket { #[Fruit] #[Red]
public const APPLE = 'apple';
}

$classConstant = new ReflectionClassConstant('Basket', 'APPLE');
$attributes = $classConstant-&gt;getAttributes('Fruit');
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
)

    **Ejemplo #3 Resultados filtrados por nombre de clase, con herencia**

&lt;?php
interface Color {
}

#[Attribute]
class Fruit {
}

#[Attribute]
class Red implements Color {
}

class Basket { #[Fruit] #[Red]
public const APPLE = 'apple';
}

$classConstant = new ReflectionClassConstant('Basket', 'APPLE');
$attributes = $classConstant-&gt;getAttributes('Color', ReflectionAttribute::IS_INSTANCEOF);
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Red
)

### Ver también

    - [ReflectionClass::getAttributes()](#reflectionclass.getattributes) - Recupera los atributos de una clase

    - [ReflectionFunctionAbstract::getAttributes()](#reflectionfunctionabstract.getattributes) - Devuelve los atributos

    - [ReflectionParameter::getAttributes()](#reflectionparameter.getattributes) - Devuelve los atributos

    - [ReflectionProperty::getAttributes()](#reflectionproperty.getattributes) - Devuelve los atributos

# ReflectionClassConstant::getDeclaringClass

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::getDeclaringClass — Obtiene la clase declarante

### Descripción

public **ReflectionClassConstant::getDeclaringClass**(): [ReflectionClass](#class.reflectionclass)

Obtiene la clase declarante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionClass](#class.reflectionclass).

# ReflectionClassConstant::getDocComment

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::getDocComment — Obtiene el comentario de documentación

### Descripción

public **ReflectionClassConstant::getDocComment**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el comentario de documentación de una constante de clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El comentario de documentación si existe, de lo contrario **[false](#constant.false)**

# ReflectionClassConstant::getModifiers

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::getModifiers — Obtiene los modificadores de la constante de clase

### Descripción

public **ReflectionClassConstant::getModifiers**(): [int](#language.types.integer)

Devuelve un campo de bits de los modificadores de acceso para esta constante de clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación numérica de los modificadores.
El significado actual de estos modificadores se describe en las
[constantes predefinidas](#reflectionclassconstant.constants.modifiers).

### Ver también

    - [Reflection::getModifierNames()](#reflection.getmodifiernames) - Obtiene los nombres de los modificadores

# ReflectionClassConstant::getName

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::getName — Obtiene el nombre de la constante

### Descripción

public **ReflectionClassConstant::getName**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la constante.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Se lanza un [Error](#class.error) cuando la propiedad name no ha sido inicializada.
       Anteriormente, el método devolvía **[false](#constant.false)** en caso de fallo.



# ReflectionClassConstant::getType

(PHP 8 &gt;= 8.3.0)

ReflectionClassConstant::getType — Devuelve el tipo de una constante de clase

### Descripción

public **ReflectionClassConstant::getType**(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)

Devuelve el tipo asociado de una constante de clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [ReflectionType](#class.reflectiontype) si se especifica un tipo de constante, **[null](#constant.null)** en caso contrario.

### Ver también

- [ReflectionClassConstant::hasType()](#reflectionclassconstant.hastype) - Verifica si una constante de clase tiene un tipo

- [ReflectionType](#class.reflectiontype)

# ReflectionClassConstant::getValue

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::getValue — Obtiene el valor

### Descripción

public **ReflectionClassConstant::getValue**(): [mixed](#language.types.mixed)

Obtiene el valor de la constante de clase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de la constante de clase.

# ReflectionClassConstant::hasType

(PHP 8 &gt;= 8.3.0)

ReflectionClassConstant::hasType — Verifica si una constante de clase tiene un tipo

### Descripción

public **ReflectionClassConstant::hasType**(): [bool](#language.types.boolean)

Verifica si la constante de clase tiene un tipo asociado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si un tipo está especificado, de lo contrario **[false](#constant.false)**.

### Ver también

- [ReflectionClassConstant::getType()](#reflectionclassconstant.gettype) - Devuelve el tipo de una constante de clase

- [ReflectionType](#class.reflectiontype)

# ReflectionClassConstant::isDeprecated

(PHP 8 &gt;= 8.4.0)

ReflectionClassConstant::isDeprecated — Verifica la deprecación

### Descripción

public **ReflectionClassConstant::isDeprecated**(): [bool](#language.types.boolean)

Verifica si la constante de clase está deprecada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si está deprecada, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1
Ejemplo de ReflectionClassConstant::isDeprecated()**

&lt;?php
class Basket { #[\Deprecated(message: 'use Basket::APPLE instead')]
public const APLE = 'apple';

    public const APPLE = 'apple';

}
$classConstant = new ReflectionClassConstant('Basket', 'APLE');
var_dump($classConstant-&gt;isDeprecated());
?&gt;

El ejemplo anterior mostrará:

bool(true)

### Ver también

- [Deprecated](#class.deprecated)

- [ReflectionClassConstant::getDocComment()](#reflectionclassconstant.getdoccomment) - Obtiene el comentario de documentación

# ReflectionClassConstant::isEnumCase

(PHP 8 &gt;= 8.1.0)

ReflectionClassConstant::isEnumCase — Verifica si la constante de clase es un caso de enumeración

### Descripción

public **ReflectionClassConstant::isEnumCase**(): [bool](#language.types.boolean)

Verifica si la constante de clase es un caso de [enumeración](#language.enumerations).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la constante de clase es una enumeración; de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionClassConstant::isEnumCase()**

     Distingue entre los casos de enumeración y las constantes de clase regulares.

&lt;?php
enum Status
{
const BORING_CONSTANT = 'test';
const ENUM_VALUE = Status::PUBLISHED;

    case DRAFT;
    case PUBLISHED;
    case ARCHIVED;

}

$reflection = new ReflectionEnum(Status::class);
foreach ($reflection-&gt;getReflectionConstants() as $constant) {
    echo "{$constant-&gt;name} is ",
$constant-&gt;isEnumCase() ? "an enum case" : "a regular class constant",
PHP_EOL;
}
?&gt;

El ejemplo anterior mostrará:

BORING_CONSTANT is a regular class constant
ENUM_VALUE is a regular class constant
DRAFT is an enum case
PUBLISHED is an enum case
ARCHIVED is an enum case

### Ver también

- [ReflectionEnum](#class.reflectionenum)

# ReflectionClassConstant::isFinal

(PHP 8 &gt;= 8.1.0)

ReflectionClassConstant::isFinal — Verifica si la constante de clase es final

### Descripción

public **ReflectionClassConstant::isFinal**(): [bool](#language.types.boolean)

Verifica si la constante de clase es final.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la constante de clase es final, de lo contrario **[false](#constant.false)**

### Ver también

    - [ReflectionClassConstant::isPublic()](#reflectionclassconstant.ispublic) - Verifica si la constante de clase es pública

    - [ReflectionClassConstant::isPrivate()](#reflectionclassconstant.isprivate) - Verifica si la constante de clase es privada

    - [ReflectionClassConstant::isProtected()](#reflectionclassconstant.isprotected) - Verifica si la constante de clase es protegida

# ReflectionClassConstant::isPrivate

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::isPrivate — Verifica si la constante de clase es privada

### Descripción

public **ReflectionClassConstant::isPrivate**(): [bool](#language.types.boolean)

Verifica si la constante de clase es privada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la constante de clase es privada, de lo contrario **[false](#constant.false)**

### Ver también

    - [ReflectionClassConstant::isFinal()](#reflectionclassconstant.isfinal) - Verifica si la constante de clase es final

    - [ReflectionClassConstant::isPublic()](#reflectionclassconstant.ispublic) - Verifica si la constante de clase es pública

    - [ReflectionClassConstant::isProtected()](#reflectionclassconstant.isprotected) - Verifica si la constante de clase es protegida

# ReflectionClassConstant::isProtected

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::isProtected — Verifica si la constante de clase es protegida

### Descripción

public **ReflectionClassConstant::isProtected**(): [bool](#language.types.boolean)

Verifica si la constante de clase es protegida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la constante de clase es protegida, de lo contrario **[false](#constant.false)**

### Ver también

    - [ReflectionClassConstant::isFinal()](#reflectionclassconstant.isfinal) - Verifica si la constante de clase es final

    - [ReflectionClassConstant::isPublic()](#reflectionclassconstant.ispublic) - Verifica si la constante de clase es pública

    - [ReflectionClassConstant::isPrivate()](#reflectionclassconstant.isprivate) - Verifica si la constante de clase es privada

# ReflectionClassConstant::isPublic

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::isPublic — Verifica si la constante de clase es pública

### Descripción

public **ReflectionClassConstant::isPublic**(): [bool](#language.types.boolean)

Verifica si la constante de clase es pública.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la constante de clase es pública, de lo contrario **[false](#constant.false)**

### Ver también

    - [ReflectionClassConstant::isFinal()](#reflectionclassconstant.isfinal) - Verifica si la constante de clase es final

    - [ReflectionClassConstant::isPrivate()](#reflectionclassconstant.isprivate) - Verifica si la constante de clase es privada

    - [ReflectionClassConstant::isProtected()](#reflectionclassconstant.isprotected) - Verifica si la constante de clase es protegida

# ReflectionClassConstant::\_\_toString

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionClassConstant::\_\_toString — Devuelve la representación en forma de string del objeto ReflectionClassConstant

### Descripción

public **ReflectionClassConstant::\_\_toString**(): [string](#language.types.string)

Devuelve la representación en forma de string del objeto ReflectionClassConstant.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La representación en forma de string de esta instancia de [ReflectionClassConstant](#class.reflectionclassconstant).

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El comentario de documentación asociado es ahora incluido.



### Ver también

- [\_\_toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionClassConstant::\_\_construct](#reflectionclassconstant.construct) — Construye una ReflectionClassConstant
- [ReflectionClassConstant::export](#reflectionclassconstant.export) — Exporta
- [ReflectionClassConstant::getAttributes](#reflectionclassconstant.getattributes) — Verifica los atributos
- [ReflectionClassConstant::getDeclaringClass](#reflectionclassconstant.getdeclaringclass) — Obtiene la clase declarante
- [ReflectionClassConstant::getDocComment](#reflectionclassconstant.getdoccomment) — Obtiene el comentario de documentación
- [ReflectionClassConstant::getModifiers](#reflectionclassconstant.getmodifiers) — Obtiene los modificadores de la constante de clase
- [ReflectionClassConstant::getName](#reflectionclassconstant.getname) — Obtiene el nombre de la constante
- [ReflectionClassConstant::getType](#reflectionclassconstant.gettype) — Devuelve el tipo de una constante de clase
- [ReflectionClassConstant::getValue](#reflectionclassconstant.getvalue) — Obtiene el valor
- [ReflectionClassConstant::hasType](#reflectionclassconstant.hastype) — Verifica si una constante de clase tiene un tipo
- [ReflectionClassConstant::isDeprecated](#reflectionclassconstant.isdeprecated) — Verifica la deprecación
- [ReflectionClassConstant::isEnumCase](#reflectionclassconstant.isenumcase) — Verifica si la constante de clase es un caso de enumeración
- [ReflectionClassConstant::isFinal](#reflectionclassconstant.isfinal) — Verifica si la constante de clase es final
- [ReflectionClassConstant::isPrivate](#reflectionclassconstant.isprivate) — Verifica si la constante de clase es privada
- [ReflectionClassConstant::isProtected](#reflectionclassconstant.isprotected) — Verifica si la constante de clase es protegida
- [ReflectionClassConstant::isPublic](#reflectionclassconstant.ispublic) — Verifica si la constante de clase es pública
- [ReflectionClassConstant::\_\_toString](#reflectionclassconstant.tostring) — Devuelve la representación en forma de string del objeto ReflectionClassConstant

# La clase ReflectionConstant

(PHP 8 &gt;= 8.4.0)

## Introducción

    La clase **ReflectionConstant** proporciona
    información sobre una constante global.

## Sinopsis de la Clase

     final
     class **ReflectionConstant**



     implements
      [Reflector](#class.reflector) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$name](#reflectionconstant.props.name);


    /* Métodos */

public [\_\_construct](#reflectionconstant.construct)([string](#language.types.string) $name)

    public [getExtension](#reflectionconstant.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)

public [getExtensionName](#reflectionconstant.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getFileName](#reflectionconstant.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getName](#reflectionconstant.getname)(): [string](#language.types.string)
public [getNamespaceName](#reflectionconstant.getnamespacename)(): [string](#language.types.string)
public [getShortName](#reflectionconstant.getshortname)(): [string](#language.types.string)
public [getValue](#reflectionconstant.getvalue)(): [mixed](#language.types.mixed)
public [isDeprecated](#reflectionconstant.isdeprecated)(): [bool](#language.types.boolean)
public [\_\_toString](#reflectionconstant.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       El nombre de la constante. Solo lectura, lanza una
       [ReflectionException](#class.reflectionexception) en caso de intento de escritura.



## Ver también

    - [ReflectionClassConstant](#class.reflectionclassconstant)

# ReflectionConstant::\_\_construct

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::\_\_construct — Construye un ReflectionConstant

### Descripción

public **ReflectionConstant::\_\_construct**([string](#language.types.string) $name)

Construye un nuevo objeto [ReflectionConstant](#class.reflectionconstant).

### Parámetros

    name


      El nombre de la constante.


### Errores/Excepciones

Se lanza una [ReflectionException](#class.reflectionexception) si
la constante no existe.

### Ver también

- [Constructores](#language.oop5.decon.constructor)

# ReflectionConstant::getExtension

(PHP 8 &gt;= 8.5.0)

ReflectionConstant::getExtension — Devuelve la [ReflectionExtension](#class.reflectionextension) de la extensión definitoria

### Descripción

public **ReflectionConstant::getExtension**(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)

Devuelve un objeto [ReflectionExtension](#class.reflectionextension) para la extensión
que ha definido la constante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionExtension](#class.reflectionextension) que representa
la extensión que ha definido la constante, o **[null](#constant.null)** para las constantes definidas por el usuario.

### Ejemplos

**Ejemplo #1 Uso básico de ReflectionConstant::getExtension()**

&lt;?php
var_dump((new ReflectionConstant('SQLITE3_TEXT'))-&gt;getExtension());
?&gt;

El ejemplo anterior mostrará:

object(ReflectionExtension)#2 (1) {
["name"]=&gt;
string(7) "sqlite3"
}

### Ver también

- [ReflectionConstant::getExtensionName()](#reflectionconstant.getextensionname) - Devuelve el nombre de la extensión definitoria

# ReflectionConstant::getExtensionName

(PHP 8 &gt;= 8.5.0)

ReflectionConstant::getExtensionName — Devuelve el nombre de la extensión definitoria

### Descripción

public **ReflectionConstant::getExtensionName**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre de la extensión que ha definido la constante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la extensión que ha definido la constante, o **[false](#constant.false)** para las constantes definidas por el usuario.

### Ejemplos

**Ejemplo #1 Uso básico de ReflectionConstant::getExtensionName()**

&lt;?php
var_dump((new ReflectionConstant('SQLITE3_TEXT'))-&gt;getExtensionName());
?&gt;

El ejemplo anterior mostrará:

string(7) "sqlite3"

### Ver también

- [ReflectionConstant::getExtension()](#reflectionconstant.getextension) - Devuelve la ReflectionExtension de la extensión definitoria

# ReflectionConstant::getFileName

(PHP 8 &gt;= 8.5.0)

ReflectionConstant::getFileName — Devuelve el nombre del fichero que define

### Descripción

public **ReflectionConstant::getFileName**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre del fichero en el que se ha definido la constante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero en el que se ha definido la constante.
Si la constante está definida en el núcleo PHP o en una extensión PHP,
**[false](#constant.false)** es devuelto.

# ReflectionConstant::getName

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::getName — Devuelve el nombre

### Descripción

public **ReflectionConstant::getName**(): [string](#language.types.string)

Devuelve el nombre de la constante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la constante, que está compuesto por su espacio de nombres y su nombre.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionConstant::getName()**

&lt;?php
namespace Foo;

const BAR = 'bar';

echo (new \ReflectionConstant('Foo\BAR'))-&gt;getName();
?&gt;

El ejemplo anterior mostrará:

Foo\BAR

### Ver también

- [ReflectionConstant::getNamespaceName()](#reflectionconstant.getnamespacename) - Devuelve el nombre del espacio de nombres

# ReflectionConstant::getNamespaceName

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::getNamespaceName — Devuelve el nombre del espacio de nombres

### Descripción

public **ReflectionConstant::getNamespaceName**(): [string](#language.types.string)

Devuelve el nombre del espacio de nombres de la constante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del espacio de nombres, o una cadena vacía para el espacio de nombres global.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionConstant::getNamespaceName()**

&lt;?php
namespace Foo {
const BAR = 'bar';
var_dump((new \ReflectionConstant('Foo\BAR'))-&gt;getNamespaceName());
}

namespace {
const BAR = 'bar';
var_dump((new \ReflectionConstant('BAR'))-&gt;getNamespaceName());
}
?&gt;

El ejemplo anterior mostrará:

string(3) "Foo"
string(0) ""

# ReflectionConstant::getShortName

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::getShortName — Devuelve el nombre corto

### Descripción

public **ReflectionConstant::getShortName**(): [string](#language.types.string)

Devuelve el nombre corto de la constante, la parte sin el espacio de nombres.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre corto de la constante.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionConstant::getShortName()**

&lt;?php
namespace Foo;

const BAR = 'bar';

echo (new \ReflectionConstant('Foo\BAR'))-&gt;getName();
?&gt;

El ejemplo anterior mostrará:

BAR

### Ver también

- [ReflectionConstant::getName()](#reflectionconstant.getname) - Devuelve el nombre

# ReflectionConstant::getValue

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::getValue — Devuelve el valor

### Descripción

public **ReflectionConstant::getValue**(): [mixed](#language.types.mixed)

Devuelve el valor de la constante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de la constante.

### Ejemplos

**Ejemplo #1 Ejemplo de [ReflectionProperty::getValue()](#reflectionproperty.getvalue)**

&lt;?php
const FOO = 'foo';

var_dump((new \ReflectionConstant('FOO'))-&gt;getValue());
?&gt;

El ejemplo anterior mostrará:

string(3) "foo"

# ReflectionConstant::isDeprecated

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::isDeprecated — Verifica la deprecación

### Descripción

public **ReflectionConstant::isDeprecated**(): [bool](#language.types.boolean)

Verifica si la constante está deprecada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si está deprecada, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1
Ejemplo de ReflectionConstant::isDeprecated()**

&lt;?php
// E_STRICT está deprecado a partir de PHP 8.4
var_dump((new ReflectionConstant('E_STRICT'))-&gt;isDeprecated());
?&gt;

Salida del ejemplo anterior en PHP 8.4:

bool(true)

# ReflectionConstant::\_\_toString

(PHP 8 &gt;= 8.4.0)

ReflectionConstant::\_\_toString — Devuelve la representación en forma de string

### Descripción

public **ReflectionConstant::\_\_toString**(): [string](#language.types.string)

Devuelve la representación en forma de string
del objeto [ReflectionConstant](#class.reflectionconstant).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un string que representa esta instancia de [ReflectionConstant](#class.reflectionconstant).

### Ver también

- [\_\_toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionConstant::\_\_construct](#reflectionconstant.construct) — Construye un ReflectionConstant
- [ReflectionConstant::getExtension](#reflectionconstant.getextension) — Devuelve la ReflectionExtension de la extensión definitoria
- [ReflectionConstant::getExtensionName](#reflectionconstant.getextensionname) — Devuelve el nombre de la extensión definitoria
- [ReflectionConstant::getFileName](#reflectionconstant.getfilename) — Devuelve el nombre del fichero que define
- [ReflectionConstant::getName](#reflectionconstant.getname) — Devuelve el nombre
- [ReflectionConstant::getNamespaceName](#reflectionconstant.getnamespacename) — Devuelve el nombre del espacio de nombres
- [ReflectionConstant::getShortName](#reflectionconstant.getshortname) — Devuelve el nombre corto
- [ReflectionConstant::getValue](#reflectionconstant.getvalue) — Devuelve el valor
- [ReflectionConstant::isDeprecated](#reflectionconstant.isdeprecated) — Verifica la deprecación
- [ReflectionConstant::\_\_toString](#reflectionconstant.tostring) — Devuelve la representación en forma de string

# La clase ReflectionEnum

(PHP 8 &gt;= 8.1.0)

## Introducción

    La clase **ReflectionEnum** proporciona
    información sobre una enumeración.

## Sinopsis de la Clase

     class **ReflectionEnum**



     extends
      [ReflectionClass](#class.reflectionclass)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [ReflectionClass::IS_IMPLICIT_ABSTRACT](#reflectionclass.constants.is-implicit-abstract);

public
const
[int](#language.types.integer)
[ReflectionClass::IS_EXPLICIT_ABSTRACT](#reflectionclass.constants.is-explicit-abstract);
public
const
[int](#language.types.integer)
[ReflectionClass::IS_FINAL](#reflectionclass.constants.is-final);
public
const
[int](#language.types.integer)
[ReflectionClass::IS_READONLY](#reflectionclass.constants.is-readonly);
public
const
[int](#language.types.integer)
[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize);
public
const
[int](#language.types.integer)
[ReflectionClass::SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor);

    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$name](#reflectionclass.props.name);


    /* Métodos */

public [\_\_construct](#reflectionenum.construct)([object](#language.types.object)|[string](#language.types.string) $objectOrClass)

    public [getBackingType](#reflectionenum.getbackingtype)(): [?](#language.types.null)[ReflectionNamedType](#class.reflectionnamedtype)

public [getCase](#reflectionenum.getcase)([string](#language.types.string) $name): [ReflectionEnumUnitCase](#class.reflectionenumunitcase)
public [getCases](#reflectionenum.getcases)(): [array](#language.types.array)
public [hasCase](#reflectionenum.hascase)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [isBacked](#reflectionenum.isbacked)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public static [ReflectionClass::export](#reflectionclass.export)([mixed](#language.types.mixed) $argumento, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)

public [ReflectionClass::getAttributes](#reflectionclass.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [ReflectionClass::getConstant](#reflectionclass.getconstant)([string](#language.types.string) $name): [mixed](#language.types.mixed)
public [ReflectionClass::getConstants](#reflectionclass.getconstants)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getConstructor](#reflectionclass.getconstructor)(): [?](#language.types.null)[ReflectionMethod](#class.reflectionmethod)
public [ReflectionClass::getDefaultProperties](#reflectionclass.getdefaultproperties)(): [array](#language.types.array)
public [ReflectionClass::getDocComment](#reflectionclass.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClass::getEndLine](#reflectionclass.getendline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionClass::getExtension](#reflectionclass.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)
public [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClass::getFileName](#reflectionclass.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClass::getInterfaceNames](#reflectionclass.getinterfacenames)(): [array](#language.types.array)
public [ReflectionClass::getInterfaces](#reflectionclass.getinterfaces)(): [array](#language.types.array)
public [ReflectionClass::getLazyInitializer](#reflectionclass.getlazyinitializer)([object](#language.types.object) $object): [?](#language.types.null)[callable](#language.types.callable)
public [ReflectionClass::getMethod](#reflectionclass.getmethod)([string](#language.types.string) $name): [ReflectionMethod](#class.reflectionmethod)
public [ReflectionClass::getMethods](#reflectionclass.getmethods)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getModifiers](#reflectionclass.getmodifiers)(): [int](#language.types.integer)
public [ReflectionClass::getName](#reflectionclass.getname)(): [string](#language.types.string)
public [ReflectionClass::getNamespaceName](#reflectionclass.getnamespacename)(): [string](#language.types.string)
public [ReflectionClass::getParentClass](#reflectionclass.getparentclass)(): [ReflectionClass](#class.reflectionclass)|[false](#language.types.singleton)
public [ReflectionClass::getProperties](#reflectionclass.getproperties)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getProperty](#reflectionclass.getproperty)([string](#language.types.string) $name): [ReflectionProperty](#class.reflectionproperty)
public [ReflectionClass::getReflectionConstant](#reflectionclass.getreflectionconstant)([string](#language.types.string) $name): [ReflectionClassConstant](#class.reflectionclassconstant)|[false](#language.types.singleton)
public [ReflectionClass::getReflectionConstants](#reflectionclass.getreflectionconstants)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getShortName](#reflectionclass.getshortname)(): [string](#language.types.string)
public [ReflectionClass::getStartLine](#reflectionclass.getstartline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionClass::getStaticProperties](#reflectionclass.getstaticproperties)(): [array](#language.types.array)
public [ReflectionClass::getStaticPropertyValue](#reflectionclass.getstaticpropertyvalue)([string](#language.types.string) $name, [mixed](#language.types.mixed) &amp;$def_value = ?): [mixed](#language.types.mixed)
public [ReflectionClass::getTraitAliases](#reflectionclass.gettraitaliases)(): [array](#language.types.array)
public [ReflectionClass::getTraitNames](#reflectionclass.gettraitnames)(): [array](#language.types.array)
public [ReflectionClass::getTraits](#reflectionclass.gettraits)(): [array](#language.types.array)
public [ReflectionClass::hasConstant](#reflectionclass.hasconstant)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [ReflectionClass::hasMethod](#reflectionclass.hasmethod)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [ReflectionClass::hasProperty](#reflectionclass.hasproperty)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [ReflectionClass::implementsInterface](#reflectionclass.implementsinterface)([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $interface): [bool](#language.types.boolean)
public [ReflectionClass::initializeLazyObject](#reflectionclass.initializelazyobject)([object](#language.types.object) $object): [object](#language.types.object)
public [ReflectionClass::inNamespace](#reflectionclass.innamespace)(): [bool](#language.types.boolean)
public [ReflectionClass::isAbstract](#reflectionclass.isabstract)(): [bool](#language.types.boolean)
public [ReflectionClass::isAnonymous](#reflectionclass.isanonymous)(): [bool](#language.types.boolean)
public [ReflectionClass::isCloneable](#reflectionclass.iscloneable)(): [bool](#language.types.boolean)
public [ReflectionClass::isEnum](#reflectionclass.isenum)(): [bool](#language.types.boolean)
public [ReflectionClass::isFinal](#reflectionclass.isfinal)(): [bool](#language.types.boolean)
public [ReflectionClass::isInstance](#reflectionclass.isinstance)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [ReflectionClass::isInstantiable](#reflectionclass.isinstantiable)(): [bool](#language.types.boolean)
public [ReflectionClass::isInterface](#reflectionclass.isinterface)(): [bool](#language.types.boolean)
public [ReflectionClass::isInternal](#reflectionclass.isinternal)(): [bool](#language.types.boolean)
public [ReflectionClass::isIterable](#reflectionclass.isiterable)(): [bool](#language.types.boolean)
public [ReflectionClass::isReadOnly](#reflectionclass.isreadonly)(): [bool](#language.types.boolean)
public [ReflectionClass::isSubclassOf](#reflectionclass.issubclassof)([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $class): [bool](#language.types.boolean)
public [ReflectionClass::isTrait](#reflectionclass.istrait)(): [bool](#language.types.boolean)
public [ReflectionClass::isUninitializedLazyObject](#reflectionclass.isuninitializedlazyobject)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [ReflectionClass::isUserDefined](#reflectionclass.isuserdefined)(): [bool](#language.types.boolean)
public [ReflectionClass::markLazyObjectAsInitialized](#reflectionclass.marklazyobjectasinitialized)([object](#language.types.object) $object): [object](#language.types.object)
public [ReflectionClass::newInstance](#reflectionclass.newinstance)([mixed](#language.types.mixed) ...$args): [object](#language.types.object)
public [ReflectionClass::newInstanceArgs](#reflectionclass.newinstanceargs)([array](#language.types.array) $args = []): [?](#language.types.null)[object](#language.types.object)
public [ReflectionClass::newInstanceWithoutConstructor](#reflectionclass.newinstancewithoutconstructor)(): [object](#language.types.object)
public [ReflectionClass::newLazyGhost](#reflectionclass.newlazyghost)([callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [object](#language.types.object)
public [ReflectionClass::newLazyProxy](#reflectionclass.newlazyproxy)([callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [object](#language.types.object)
public [ReflectionClass::resetAsLazyGhost](#reflectionclass.resetaslazyghost)([object](#language.types.object) $object, [callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [void](language.types.void.html)
public [ReflectionClass::resetAsLazyProxy](#reflectionclass.resetaslazyproxy)([object](#language.types.object) $object, [callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [void](language.types.void.html)
public [ReflectionClass::setStaticPropertyValue](#reflectionclass.setstaticpropertyvalue)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [ReflectionClass::\_\_toString](#reflectionclass.tostring)(): [string](#language.types.string)

}

## Ver también

     - [Enumeraciones](#language.enumerations)

# ReflectionEnum::\_\_construct

(PHP 8 &gt;= 8.1.0)

ReflectionEnum::\_\_construct — Instancia un nuevo objeto [ReflectionEnum](#class.reflectionenum)

### Descripción

public **ReflectionEnum::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $objectOrClass)

### Parámetros

    objectOrClass


      Una instancia de enumeración o un nombre.


# ReflectionEnum::getBackingType

(PHP 8 &gt;= 8.1.0)

ReflectionEnum::getBackingType — Devuelve el tipo base de una enumeración, si está presente

### Descripción

public **ReflectionEnum::getBackingType**(): [?](#language.types.null)[ReflectionNamedType](#class.reflectionnamedtype)

Si la enumeración es una enumeración con valor base, este método devolverá una instancia
de [ReflectionType](#class.reflectiontype) para el tipo base de la enumeración.
Si no es una enumeración con valor base, devolverá null.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de [ReflectionNamedType](#class.reflectionnamedtype), o null
si la enumeración no tiene tipo base.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       El valor de retorno ahora es declarado como ?ReflectionNamedType. Anteriormente,
       ?ReflectionType era declarado.



### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::getBackingType()**

&lt;?php
enum Suit: string
{
case Hearts = 'H';
case Diamonds = 'D';
case Clubs = 'C';
case Spades = 'S';
}

$rEnum = new ReflectionEnum(Suit::class);

$rBackingType = $rEnum-&gt;getBackingType();

var_dump((string) $rBackingType);
?&gt;

    El ejemplo anterior mostrará:

string(6) "string"

### Ver también

    - [Enumeraciones](#language.enumerations)

    - [ReflectionEnum::isBacked()](#reflectionenum.isbacked) - Determina si una enumeración es una enumeración con valor base

# ReflectionEnum::getCase

(PHP 8 &gt;= 8.1.0)

ReflectionEnum::getCase — Devuelve un caso específico de una enumeración

### Descripción

public **ReflectionEnum::getCase**([string](#language.types.string) $name): [ReflectionEnumUnitCase](#class.reflectionenumunitcase)

Devuelve el objeto de reflexión para un caso específico de una enumeración por su nombre. Si el caso solicitado
no está definido, se lanza una [ReflectionException](#class.reflectionexception).

### Parámetros

    name


      El nombre del caso a recuperar.


### Valores devueltos

Una instancia de [ReflectionEnumUnitCase](#class.reflectionenumunitcase)
o [ReflectionEnumBackedCase](#class.reflectionenumbackedcase), según el caso.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::getCase()**

&lt;?php
enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

$rEnum = new ReflectionEnum(Suit::class);

$rCase = $rEnum-&gt;getCase('Clubs');

var_dump($rCase-&gt;getValue());
?&gt;

    El ejemplo anterior mostrará:

enum(Suit::Clubs)

### Ver también

    - [Enumeraciones](#language.enumerations)

    - [ReflectionEnum::getCases()](#reflectionenum.getcases) - Devuelve la lista de todos los casos de una enumeración

    - [ReflectionEnum::hasCase()](#reflectionenum.hascase) - Verifica un caso en una enumeración

    - [ReflectionEnum::isBacked()](#reflectionenum.isbacked) - Determina si una enumeración es una enumeración con valor base

# ReflectionEnum::getCases

(PHP 8 &gt;= 8.1.0)

ReflectionEnum::getCases — Devuelve la lista de todos los casos de una enumeración

### Descripción

public **ReflectionEnum::getCases**(): [array](#language.types.array)

Una enumeración puede contener cero o varios casos. Este método recupera todos los casos definidos,
en orden léxico (es decir, el orden en que aparecen en el código fuente).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos de reflexión de enumeración, uno por cada caso de la enumeración. Para una enumeración unitaria,
serán todas instancias de [ReflectionEnumUnitCase](#class.reflectionenumunitcase). Para una enumeración con valor base,
serán todas instancias de [ReflectionEnumBackedCase](#class.reflectionenumbackedcase).

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::getCases()**

&lt;?php
enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

$rEnum = new ReflectionEnum(Suit::class);

$cases = $rEnum-&gt;getCases();

foreach ($cases as $rCase) {
    var_dump($rCase-&gt;getValue());
}
?&gt;

    El ejemplo anterior mostrará:

enum(Suit::Hearts)
enum(Suit::Diamonds)
enum(Suit::Clubs)
enum(Suit::Spades)

### Ver también

    - [Enumeraciones](#language.enumerations)

    - [ReflectionEnum::getCase()](#reflectionenum.getcase) - Devuelve un caso específico de una enumeración

    - [ReflectionEnum::isBacked()](#reflectionenum.isbacked) - Determina si una enumeración es una enumeración con valor base

# ReflectionEnum::hasCase

(PHP 8 &gt;= 8.1.0)

ReflectionEnum::hasCase — Verifica un caso en una enumeración

### Descripción

public **ReflectionEnum::hasCase**([string](#language.types.string) $name): [bool](#language.types.boolean)

Determina si un caso dado está definido en una enumeración.

### Parámetros

    name


      El caso a verificar.


### Valores devueltos

**[true](#constant.true)** si el caso está definido, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::hasCase()**

&lt;?php
enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

$rEnum = new ReflectionEnum(Suit::class);

var_dump($rEnum-&gt;hasCase('Hearts'));
var_dump($rEnum-&gt;hasCase('Horseshoes'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [Enumeraciones](#language.enumerations)

    - [ReflectionEnum::getCase()](#reflectionenum.getcase) - Devuelve un caso específico de una enumeración

    - [ReflectionEnum::getCases()](#reflectionenum.getcases) - Devuelve la lista de todos los casos de una enumeración

# ReflectionEnum::isBacked

(PHP 8 &gt;= 8.1.0)

ReflectionEnum::isBacked — Determina si una enumeración es una enumeración con valor base

### Descripción

public **ReflectionEnum::isBacked**(): [bool](#language.types.boolean)

Una enumeración con valor base es una enumeración que tiene un equivalente escalar nativo, ya sea un
[string](#language.types.string) o un [int](#language.types.integer). No todas las enumeraciones tienen valor base.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la enumeración tiene un soporte escalar, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::isBacked()**

&lt;?php
enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

enum BackedSuit: string
{
case Hearts = 'H';
case Diamonds = 'D';
case Clubs = 'C';
case Spades = 'S';
}

var_dump((new ReflectionEnum(Suit::class))-&gt;isBacked());
var_dump((new ReflectionEnum(BackedSuit::class))-&gt;isBacked());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [Enumeraciones](#language.enumerations)

    - [ReflectionEnum::getBackingType()](#reflectionenum.getbackingtype) - Devuelve el tipo base de una enumeración, si está presente

## Tabla de contenidos

- [ReflectionEnum::\_\_construct](#reflectionenum.construct) — Instancia un nuevo objeto ReflectionEnum
- [ReflectionEnum::getBackingType](#reflectionenum.getbackingtype) — Devuelve el tipo base de una enumeración, si está presente
- [ReflectionEnum::getCase](#reflectionenum.getcase) — Devuelve un caso específico de una enumeración
- [ReflectionEnum::getCases](#reflectionenum.getcases) — Devuelve la lista de todos los casos de una enumeración
- [ReflectionEnum::hasCase](#reflectionenum.hascase) — Verifica un caso en una enumeración
- [ReflectionEnum::isBacked](#reflectionenum.isbacked) — Determina si una enumeración es una enumeración con valor base

# La clase ReflectionEnumUnitCase

(PHP 8 &gt;= 8.1.0)

## Introducción

    La clase **ReflectionEnumUnitCase** proporciona
    información acerca de un caso de enumeración unitaria, que no tiene equivalente escalar.

## Sinopsis de la Clase

     class **ReflectionEnumUnitCase**



     extends
      [ReflectionClassConstant](#class.reflectionclassconstant)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [ReflectionClassConstant::IS_PUBLIC](#reflectionclassconstant.constants.is-public);

public
const
[int](#language.types.integer)
[ReflectionClassConstant::IS_PROTECTED](#reflectionclassconstant.constants.is-protected);
public
const
[int](#language.types.integer)
[ReflectionClassConstant::IS_PRIVATE](#reflectionclassconstant.constants.is-private);
public
const
[int](#language.types.integer)
[ReflectionClassConstant::IS_FINAL](#reflectionclassconstant.constants.is-final);

    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$name](#reflectionclassconstant.props.name);

public
[string](#language.types.string)
[$class](#reflectionclassconstant.props.class);

    /* Métodos */

public [\_\_construct](#reflectionenumunitcase.construct)([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $constant)

    public [getEnum](#reflectionenumunitcase.getenum)(): [ReflectionEnum](#class.reflectionenum)

public [getValue](#reflectionenumunitcase.getvalue)(): [UnitEnum](#class.unitenum)

    /* Métodos heredados */
    public static [ReflectionClassConstant::export](#reflectionclassconstant.export)([mixed](#language.types.mixed) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

public [ReflectionClassConstant::getAttributes](#reflectionclassconstant.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [ReflectionClassConstant::getDeclaringClass](#reflectionclassconstant.getdeclaringclass)(): [ReflectionClass](#class.reflectionclass)
public [ReflectionClassConstant::getDocComment](#reflectionclassconstant.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClassConstant::getModifiers](#reflectionclassconstant.getmodifiers)(): [int](#language.types.integer)
public [ReflectionClassConstant::getName](#reflectionclassconstant.getname)(): [string](#language.types.string)
public [ReflectionClassConstant::getType](#reflectionclassconstant.gettype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [ReflectionClassConstant::getValue](#reflectionclassconstant.getvalue)(): [mixed](#language.types.mixed)
public [ReflectionClassConstant::hasType](#reflectionclassconstant.hastype)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isDeprecated](#reflectionclassconstant.isdeprecated)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isEnumCase](#reflectionclassconstant.isenumcase)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isFinal](#reflectionclassconstant.isfinal)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isPrivate](#reflectionclassconstant.isprivate)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isProtected](#reflectionclassconstant.isprotected)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isPublic](#reflectionclassconstant.ispublic)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::\_\_toString](#reflectionclassconstant.tostring)(): [string](#language.types.string)

}

## Ver también

     - [Enumeraciones](#language.enumerations)

     - [ReflectionEnumBackedCase](#class.reflectionenumbackedcase)

# ReflectionEnumUnitCase::\_\_construct

(PHP 8 &gt;= 8.1.0)

ReflectionEnumUnitCase::\_\_construct — Instancia un objeto [ReflectionEnumUnitCase](#class.reflectionenumunitcase)

### Descripción

public **ReflectionEnumUnitCase::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $constant)

### Parámetros

    class


      Una instancia de enumeración o un nombre.






    constant


      Un nombre de constante de enumeración.


# ReflectionEnumUnitCase::getEnum

(PHP 8 &gt;= 8.1.0)

ReflectionEnumUnitCase::getEnum — Devuelve la reflexión de la enumeración de este caso

### Descripción

public **ReflectionEnumUnitCase::getEnum**(): [ReflectionEnum](#class.reflectionenum)

Devuelve la reflexión de la enumeración de este caso.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de [ReflectionEnum](#class.reflectionenum) que describe la enumeración
a la que pertenece este caso.

### Ver también

    - [Enumeraciones](#language.enumerations)

# ReflectionEnumUnitCase::getValue

(PHP 8 &gt;= 8.1.0)

ReflectionEnumUnitCase::getValue — Devuelve el objeto del caso de enumeración descrito por este objeto de reflexión

### Descripción

public **ReflectionEnumUnitCase::getValue**(): [UnitEnum](#class.unitenum)

Devuelve el objeto del caso de enumeración descrito por este objeto de reflexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El caso de enumeración descrito por este objeto de reflexión.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::getValue()**

&lt;?php
enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

$rEnum = new ReflectionEnum(Suit::class);

$rCase = $rEnum-&gt;getCase('Diamonds');

var_dump($rCase-&gt;getValue());
?&gt;

    El ejemplo anterior mostrará:

enum(Suit::Diamonds)

### Ver también

    - [Enumeraciones](#language.enumerations)

## Tabla de contenidos

- [ReflectionEnumUnitCase::\_\_construct](#reflectionenumunitcase.construct) — Instancia un objeto ReflectionEnumUnitCase
- [ReflectionEnumUnitCase::getEnum](#reflectionenumunitcase.getenum) — Devuelve la reflexión de la enumeración de este caso
- [ReflectionEnumUnitCase::getValue](#reflectionenumunitcase.getvalue) — Devuelve el objeto del caso de enumeración descrito por este objeto de reflexión

# La clase ReflectionEnumBackedCase

(PHP 8 &gt;= 8.1.0)

## Introducción

    La clase **ReflectionEnumBackedCase** proporciona
    información acerca de un caso de enumeración con valor de base, que tiene un escalar equivalente.

## Sinopsis de la Clase

     class **ReflectionEnumBackedCase**



     extends
      [ReflectionEnumUnitCase](#class.reflectionenumunitcase)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [ReflectionClassConstant::IS_PUBLIC](#reflectionclassconstant.constants.is-public);

public
const
[int](#language.types.integer)
[ReflectionClassConstant::IS_PROTECTED](#reflectionclassconstant.constants.is-protected);
public
const
[int](#language.types.integer)
[ReflectionClassConstant::IS_PRIVATE](#reflectionclassconstant.constants.is-private);
public
const
[int](#language.types.integer)
[ReflectionClassConstant::IS_FINAL](#reflectionclassconstant.constants.is-final);

    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$name](#reflectionclassconstant.props.name);

public
[string](#language.types.string)
[$class](#reflectionclassconstant.props.class);

    /* Métodos */

public [\_\_construct](#reflectionenumbackedcase.construct)([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $constant)

    public [getBackingValue](#reflectionenumbackedcase.getbackingvalue)(): [int](#language.types.integer)|[string](#language.types.string)


    /* Métodos heredados */
    public [ReflectionEnumUnitCase::getEnum](#reflectionenumunitcase.getenum)(): [ReflectionEnum](#class.reflectionenum)

public [ReflectionEnumUnitCase::getValue](#reflectionenumunitcase.getvalue)(): [UnitEnum](#class.unitenum)

    public static [ReflectionClassConstant::export](#reflectionclassconstant.export)([mixed](#language.types.mixed) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

public [ReflectionClassConstant::getAttributes](#reflectionclassconstant.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [ReflectionClassConstant::getDeclaringClass](#reflectionclassconstant.getdeclaringclass)(): [ReflectionClass](#class.reflectionclass)
public [ReflectionClassConstant::getDocComment](#reflectionclassconstant.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClassConstant::getModifiers](#reflectionclassconstant.getmodifiers)(): [int](#language.types.integer)
public [ReflectionClassConstant::getName](#reflectionclassconstant.getname)(): [string](#language.types.string)
public [ReflectionClassConstant::getType](#reflectionclassconstant.gettype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [ReflectionClassConstant::getValue](#reflectionclassconstant.getvalue)(): [mixed](#language.types.mixed)
public [ReflectionClassConstant::hasType](#reflectionclassconstant.hastype)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isDeprecated](#reflectionclassconstant.isdeprecated)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isEnumCase](#reflectionclassconstant.isenumcase)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isFinal](#reflectionclassconstant.isfinal)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isPrivate](#reflectionclassconstant.isprivate)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isProtected](#reflectionclassconstant.isprotected)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::isPublic](#reflectionclassconstant.ispublic)(): [bool](#language.types.boolean)
public [ReflectionClassConstant::\_\_toString](#reflectionclassconstant.tostring)(): [string](#language.types.string)

}

## Ver también

     - [Enumeraciones](#language.enumerations)

     - [ReflectionEnumUnitCase](#class.reflectionenumunitcase)

# ReflectionEnumBackedCase::\_\_construct

(PHP 8 &gt;= 8.1.0)

ReflectionEnumBackedCase::\_\_construct — Instancia un objeto [ReflectionEnumBackedCase](#class.reflectionenumbackedcase)

### Descripción

public **ReflectionEnumBackedCase::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $constant)

### Parámetros

    class


      Una instancia de enumeración o un nombre.






    constant


      Un nombre de constante de enumeración.


# ReflectionEnumBackedCase::getBackingValue

(PHP 8 &gt;= 8.1.0)

ReflectionEnumBackedCase::getBackingValue — Devuelve el valor escalar de base de este caso de enumeración

### Descripción

public **ReflectionEnumBackedCase::getBackingValue**(): [int](#language.types.integer)|[string](#language.types.string)

Se devuelve el valor escalar de base de este caso de enumeración.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor escalar de base de este caso de enumeración.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionEnum::getBackingValue()**

&lt;?php
enum Suit: string
{
case Hearts = 'H';
case Diamonds = 'D';
case Clubs = 'C';
case Spades = 'S';
}

$rEnum = new ReflectionEnum(Suit::class);

$rCase = $rEnum-&gt;getCase('Spades');

var_dump($rCase-&gt;getBackingValue());
?&gt;

    El ejemplo anterior mostrará:

string(1) "S"

### Ver también

    - [Enumeraciones](#language.enumerations)

## Tabla de contenidos

- [ReflectionEnumBackedCase::\_\_construct](#reflectionenumbackedcase.construct) — Instancia un objeto ReflectionEnumBackedCase
- [ReflectionEnumBackedCase::getBackingValue](#reflectionenumbackedcase.getbackingvalue) — Devuelve el valor escalar de base de este caso de enumeración

# La clase ReflectionZendExtension

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

## Sinopsis de la Clase

     class **ReflectionZendExtension**



     implements
      [Reflector](#class.reflector) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$name](#reflectionzendextension.props.name);


    /* Métodos */

public [\_\_construct](#reflectionzendextension.construct)([string](#language.types.string) $name)

    private [__clone](#reflectionzendextension.clone)(): [void](language.types.void.html)

public static [export](#reflectionzendextension.export)([string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)
public [getAuthor](#reflectionzendextension.getauthor)(): [string](#language.types.string)
public [getCopyright](#reflectionzendextension.getcopyright)(): [string](#language.types.string)
public [getName](#reflectionzendextension.getname)(): [string](#language.types.string)
public [getURL](#reflectionzendextension.geturl)(): [string](#language.types.string)
public [getVersion](#reflectionzendextension.getversion)(): [string](#language.types.string)
public [\_\_toString](#reflectionzendextension.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       Nombre de la extensión. Solo lectura, genera
       [ReflectionException](#class.reflectionexception) al intentar escribir.





## Historial de cambios

       Versión
       Descripción






       8.0.0

        [ReflectionZendExtension::export()](#reflectionzendextension.export) ha sido eliminado.





# ReflectionZendExtension::\_\_clone

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::\_\_clone — Gestor de clonación

### Descripción

private **ReflectionZendExtension::\_\_clone**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método ya no es final.



# ReflectionZendExtension::\_\_construct

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::\_\_construct — Construye un objeto ReflectionZendExtension

### Descripción

public **ReflectionZendExtension::\_\_construct**([string](#language.types.string) $name)

Construye un nuevo objeto [ReflectionZendExtension](#class.reflectionzendextension).

### Parámetros

    name


      El nombre de la extensión.


### Errores/Excepciones

Se lanza una [ReflectionException](#class.reflectionexception) si la extensión a
reflejar no existe.

# ReflectionZendExtension::export

(PHP 5 &gt;= 5.4.0, PHP 7)

ReflectionZendExtension::export — Exportar

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionZendExtension::export**([string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    return





### Valores devueltos

### Ver también

    - [ReflectionClassConstant::__toString()](#reflectionclassconstant.tostring) - Devuelve la representación en forma de string del objeto ReflectionClassConstant

# ReflectionZendExtension::getAuthor

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::getAuthor — Obtiene el autor

### Descripción

public **ReflectionZendExtension::getAuthor**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ReflectionZendExtension::getCopyright

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::getCopyright — Obtiene el copyright

### Descripción

public **ReflectionZendExtension::getCopyright**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ReflectionZendExtension::getName

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::getName — Obtiene el nombre

### Descripción

public **ReflectionZendExtension::getName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ReflectionZendExtension::getURL

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::getURL — Obtiene la URL

### Descripción

public **ReflectionZendExtension::getURL**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ReflectionZendExtension::getVersion

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::getVersion — Obtiene la versión

### Descripción

public **ReflectionZendExtension::getVersion**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ReflectionZendExtension::\_\_toString

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionZendExtension::\_\_toString — Gestor de conversión a string

### Descripción

public **ReflectionZendExtension::\_\_toString**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [ReflectionZendExtension::\_\_clone](#reflectionzendextension.clone) — Gestor de clonación
- [ReflectionZendExtension::\_\_construct](#reflectionzendextension.construct) — Construye un objeto ReflectionZendExtension
- [ReflectionZendExtension::export](#reflectionzendextension.export) — Exportar
- [ReflectionZendExtension::getAuthor](#reflectionzendextension.getauthor) — Obtiene el autor
- [ReflectionZendExtension::getCopyright](#reflectionzendextension.getcopyright) — Obtiene el copyright
- [ReflectionZendExtension::getName](#reflectionzendextension.getname) — Obtiene el nombre
- [ReflectionZendExtension::getURL](#reflectionzendextension.geturl) — Obtiene la URL
- [ReflectionZendExtension::getVersion](#reflectionzendextension.getversion) — Obtiene la versión
- [ReflectionZendExtension::\_\_toString](#reflectionzendextension.tostring) — Gestor de conversión a string

# La clase ReflectionExtension

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionExtension** proporciona
    información sobre una extensión.

## Sinopsis de la Clase

     class **ReflectionExtension**



     implements
      [Reflector](#class.reflector) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$name](#reflectionextension.props.name);


    /* Métodos */

public [\_\_construct](#reflectionextension.construct)([string](#language.types.string) $name)

    private [__clone](#reflectionextension.clone)(): [void](language.types.void.html)

public static [export](#reflectionextension.export)([string](#language.types.string) $name, [string](#language.types.string) $return = **[false](#constant.false)**): [string](#language.types.string)
public [getClasses](#reflectionextension.getclasses)(): [array](#language.types.array)
public [getClassNames](#reflectionextension.getclassnames)(): [array](#language.types.array)
public [getConstants](#reflectionextension.getconstants)(): [array](#language.types.array)
public [getDependencies](#reflectionextension.getdependencies)(): [array](#language.types.array)
public [getFunctions](#reflectionextension.getfunctions)(): [array](#language.types.array)
public [getINIEntries](#reflectionextension.getinientries)(): [array](#language.types.array)
public [getName](#reflectionextension.getname)(): [string](#language.types.string)
public [getVersion](#reflectionextension.getversion)(): [?](#language.types.null)[string](#language.types.string)
public [info](#reflectionextension.info)(): [void](language.types.void.html)
public [isPersistent](#reflectionextension.ispersistent)(): [bool](#language.types.boolean)
public [isTemporary](#reflectionextension.istemporary)(): [bool](#language.types.boolean)
public [\_\_toString](#reflectionextension.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       Nombre de la extensión, idéntico a la llamada al método
       [ReflectionExtension::getName()](#reflectionextension.getname)





## Historial de cambios

       Versión
       Descripción






       8.0.0

        [ReflectionExtension::export()](#reflectionextension.export) ha sido eliminado.





# ReflectionExtension::\_\_clone

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::\_\_clone — Clonación

### Descripción

private **ReflectionExtension::\_\_clone**(): [void](language.types.void.html)

El método clone impide que un objeto sea clonado.
Los objetos de reflexión no pueden ser clonados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se devuelve ningún valor. Si se llama, se producirá un error fatal.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método ya no es final.



### Ver también

    - [ReflectionExtension::__construct()](#reflectionextension.construct) - Construye un nuevo objeto ReflectionExtension

    - [Clonación de objetos](#language.oop5.cloning)

# ReflectionExtension::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::\_\_construct — Construye un nuevo objeto ReflectionExtension

### Descripción

public **ReflectionExtension::\_\_construct**([string](#language.types.string) $name)

Construye un [object](#language.types.object) [ReflectionExtension](#class.reflectionextension).

### Parámetros

     name


       Nombre de la extensión.





### Errores/Excepciones

Lanza una [ReflectionException](#class.reflectionexception) si la extensión a
reflejar no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con [ReflectionExtension](#class.reflectionextension)**

&lt;?php
$ext = new ReflectionExtension('Reflection');

printf('Extensión: %s (versión: %s)', $ext-&gt;getName(), $ext-&gt;getVersion());
?&gt;

    Resultado del ejemplo anterior es similar a:

Extensión: Reflection (versión: 8.3.17)

### Ver también

    - [ReflectionExtension::info()](#reflectionextension.info) - Muestra información sobre la extensión

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionExtension::export

(PHP 5, PHP 7)

ReflectionExtension::export — Exportación

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionExtension::export**([string](#language.types.string) $name, [string](#language.types.string) $return = **[false](#constant.false)**): [string](#language.types.string)

Exporte una extensión reflejada. El formato de retorno de esta función
es idéntico al argumento CLI --re [extension].

### Parámetros

     name


       La reflexión a exportar.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

Si el parámetro return
está definido a **[true](#constant.true)**, la exportación será retornada en forma de [string](#language.types.string),
de lo contrario, **[null](#constant.null)** será retornado.

### Ver también

    - [ReflectionExtension::info()](#reflectionextension.info) - Muestra información sobre la extensión

    - [ReflectionExtension::__toString()](#reflectionextension.tostring) - Obtiene una representación textual

# ReflectionExtension::getClasses

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getClasses — Obtiene las clases

### Descripción

public **ReflectionExtension::getClasses**(): [array](#language.types.array)

Obtiene una lista de las clases de una extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos [ReflectionClass](#class.reflectionclass),
uno por cada clase definida en la extensión. Si no se define ninguna clase,
se devolverá un array vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getClasses()**

&lt;?php
$ext = new ReflectionExtension('XMLWriter');
var_dump($ext-&gt;getClasses());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
["XMLWriter"]=&gt;
object(ReflectionClass)#2 (1) {
["name"]=&gt;
string(9) "XMLWriter"
}
}

### Ver también

    - [ReflectionExtension::getClassNames()](#reflectionextension.getclassnames) - Obtiene los nombres de las clases

# ReflectionExtension::getClassNames

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getClassNames — Obtiene los nombres de las clases

### Descripción

public **ReflectionExtension::getClassNames**(): [array](#language.types.array)

Obtiene una lista de los nombres de clases definidas en la extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) de nombres de clases, como se definen en la extensión.
Si no se define ninguna clase, se devuelve un array vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getClassNames()**

&lt;?php
$ext = new ReflectionExtension('XMLWriter');
var_dump($ext-&gt;getClassNames());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
string(9) "XMLWriter"
}

### Ver también

    - [ReflectionExtension::getClasses()](#reflectionextension.getclasses) - Obtiene las clases

    - [ReflectionExtension::getName()](#reflectionextension.getname) - Obtiene el nombre de la extensión

# ReflectionExtension::getConstants

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getConstants — Obtiene las constantes

### Descripción

public **ReflectionExtension::getConstants**(): [array](#language.types.array)

Obtiene las constantes de una extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array asociativo cuyos claves son los nombres de las constantes.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getConstants()**

&lt;?php
$ext = new ReflectionExtension('DOM');

print_r($ext-&gt;getConstants());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[XML_ELEMENT_NODE] =&gt; 1
[XML_ATTRIBUTE_NODE] =&gt; 2
[XML_TEXT_NODE] =&gt; 3
[XML_CDATA_SECTION_NODE] =&gt; 4
[XML_ENTITY_REF_NODE] =&gt; 5
[XML_ENTITY_NODE] =&gt; 6
[XML_PI_NODE] =&gt; 7
[XML_COMMENT_NODE] =&gt; 8
[XML_DOCUMENT_NODE] =&gt; 9
[XML_DOCUMENT_TYPE_NODE] =&gt; 10
[XML_DOCUMENT_FRAG_NODE] =&gt; 11
[XML_NOTATION_NODE] =&gt; 12
[XML_HTML_DOCUMENT_NODE] =&gt; 13
[XML_DTD_NODE] =&gt; 14
[XML_ELEMENT_DECL_NODE] =&gt; 15
[XML_ATTRIBUTE_DECL_NODE] =&gt; 16
[XML_ENTITY_DECL_NODE] =&gt; 17
[XML_NAMESPACE_DECL_NODE] =&gt; 18
[XML_LOCAL_NAMESPACE] =&gt; 18
[XML_ATTRIBUTE_CDATA] =&gt; 1
[XML_ATTRIBUTE_ID] =&gt; 2
[XML_ATTRIBUTE_IDREF] =&gt; 3
[XML_ATTRIBUTE_IDREFS] =&gt; 4
[XML_ATTRIBUTE_ENTITY] =&gt; 6
[XML_ATTRIBUTE_NMTOKEN] =&gt; 7
[XML_ATTRIBUTE_NMTOKENS] =&gt; 8
[XML_ATTRIBUTE_ENUMERATION] =&gt; 9
[XML_ATTRIBUTE_NOTATION] =&gt; 10
[DOM_PHP_ERR] =&gt; 0
[DOM_INDEX_SIZE_ERR] =&gt; 1
[DOMSTRING_SIZE_ERR] =&gt; 2
[DOM_HIERARCHY_REQUEST_ERR] =&gt; 3
[DOM_WRONG_DOCUMENT_ERR] =&gt; 4
[DOM_INVALID_CHARACTER_ERR] =&gt; 5
[DOM_NO_DATA_ALLOWED_ERR] =&gt; 6
[DOM_NO_MODIFICATION_ALLOWED_ERR] =&gt; 7
[DOM_NOT_FOUND_ERR] =&gt; 8
[DOM_NOT_SUPPORTED_ERR] =&gt; 9
[DOM_INUSE_ATTRIBUTE_ERR] =&gt; 10
[DOM_INVALID_STATE_ERR] =&gt; 11
[DOM_SYNTAX_ERR] =&gt; 12
[DOM_INVALID_MODIFICATION_ERR] =&gt; 13
[DOM_NAMESPACE_ERR] =&gt; 14
[DOM_INVALID_ACCESS_ERR] =&gt; 15
[DOM_VALIDATION_ERR] =&gt; 16
)

### Ver también

    - [ReflectionExtension::getINIEntries()](#reflectionextension.getinientries) - Recupera las entradas ini de la extensión

# ReflectionExtension::getDependencies

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

ReflectionExtension::getDependencies — Obtiene las dependencias

### Descripción

public **ReflectionExtension::getDependencies**(): [array](#language.types.array)

Obtiene las dependencias, listando tanto las dependencias
requeridas como las dependencias en conflicto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) asociativo cuyas claves son las dependencias y como valores,
Required, Optional
o Conflicts.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getDependencies()**

&lt;?php
$dom = new ReflectionExtension('dom');

print_r($dom-&gt;getDependencies());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[libxml] =&gt; Required
[domxml] =&gt; Conflicts
)

### Ver también

    - **ReflectionClass::getVersion()**

# ReflectionExtension::getFunctions

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getFunctions — Obtiene las funciones de una extensión

### Descripción

public **ReflectionExtension::getFunctions**(): [array](#language.types.array)

Obtiene las funciones de una extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array asociativo de objetos [ReflectionFunction](#class.reflectionfunction),
para cada función definida en la extensión, cuyas claves son los
nombres de las funciones. Si no hay funciones definidas, se devuelve
un array vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getFunctions()**

&lt;?php
$dom = new ReflectionExtension('SimpleXML');

print_r($dom-&gt;getFunctions());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[simplexml_load_file] =&gt; ReflectionFunction Object
(
[name] =&gt; simplexml_load_file
)

    [simplexml_load_string] =&gt; ReflectionFunction Object
        (
            [name] =&gt; simplexml_load_string
        )

    [simplexml_import_dom] =&gt; ReflectionFunction Object
        (
            [name] =&gt; simplexml_import_dom
        )

)

### Ver también

    - [ReflectionExtension::getClasses()](#reflectionextension.getclasses) - Obtiene las clases

    - [get_extension_funcs()](#function.get-extension-funcs) - Lista las funciones de una extensión

# ReflectionExtension::getINIEntries

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getINIEntries — Recupera las entradas ini de la extensión

### Descripción

public **ReflectionExtension::getINIEntries**(): [array](#language.types.array)

Recupera las entradas ini de la extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array asociativo donde las claves son las entradas ini, y los valores
los valores de dichas entradas.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getINIEntries()**

&lt;?php
$ext = new ReflectionExtension('mysql');

print_r($ext-&gt;getINIEntries());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[mysql.allow_persistent] =&gt; 1
[mysql.max_persistent] =&gt; -1
[mysql.max_links] =&gt; -1
[mysql.default_host] =&gt;
[mysql.default_user] =&gt;
[mysql.default_password] =&gt;
[mysql.default_port] =&gt;
[mysql.default_socket] =&gt;
[mysql.connect_timeout] =&gt; 60
[mysql.trace_mode] =&gt;
[mysql.allow_local_infile] =&gt; 1
[mysql.cache_size] =&gt; 2000
)

### Ver también

    - [ini_get_all()](#function.ini-get-all) - Lee todos los valores de configuración

    - [ReflectionExtension::getConstants()](#reflectionextension.getconstants) - Obtiene las constantes

# ReflectionExtension::getName

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getName — Obtiene el nombre de la extensión

### Descripción

public **ReflectionExtension::getName**(): [string](#language.types.string)

Obtiene el nombre de la extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la extensión.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getName()**

&lt;?php
$ext = new ReflectionExtension('mysqli');
var_dump($ext-&gt;getName());
?&gt;

    Resultado del ejemplo anterior es similar a:

string(6) "mysqli"

### Ver también

    - [ReflectionExtension::getClassNames()](#reflectionextension.getclassnames) - Obtiene los nombres de las clases

# ReflectionExtension::getVersion

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::getVersion — Obtiene la versión de la extensión

### Descripción

public **ReflectionExtension::getVersion**(): [?](#language.types.null)[string](#language.types.string)

Obtiene la versión de la extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La versión de la extensión, o **[null](#constant.null)** si la extensión no tiene versión.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::getVersion()**

&lt;?php
$ext = new ReflectionExtension('mysqli');
var_dump($ext-&gt;getVersion());
?&gt;

    Resultado del ejemplo anterior es similar a:

string(3) "0.1"

### Ver también

    - [ReflectionExtension::info()](#reflectionextension.info) - Muestra información sobre la extensión

# ReflectionExtension::info

(PHP 5 &gt;= 5.2.4, PHP 7, PHP 8)

ReflectionExtension::info — Muestra información sobre la extensión

### Descripción

public **ReflectionExtension::info**(): [void](language.types.void.html)

Muestra el extracto "[phpinfo()](#function.phpinfo)" de la extensión proporcionada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Información sobre la extensión.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionExtension::info()**

&lt;?php
$ext = new ReflectionExtension('mysqli');
$ext-&gt;info();
?&gt;

    Resultado del ejemplo anterior es similar a:

mysqli

Soporte MysqlI =&gt; activado
Versión de la biblioteca de la API del cliente =&gt; mysqlnd 8.3.17
Conexiones persistentes activas =&gt; 0
Conexiones persistentes inactivas =&gt; 0
Conexiones activas =&gt; 0
Caché persistente =&gt; activado
put_hits =&gt; 0
put_misses =&gt; 0
get_hits =&gt; 0
get_misses =&gt; 0
size =&gt; 2000
free_items =&gt; 2000
references =&gt; 2

Directiva =&gt; Valor Local =&gt; Valor Maestro
mysqli.max_links =&gt; Ilimitado =&gt; Ilimitado
mysqli.max_persistent =&gt; Ilimitado =&gt; Ilimitado
mysqli.allow_persistent =&gt; On =&gt; On
mysqli.default_host =&gt; no value =&gt; no value
mysqli.default_user =&gt; no value =&gt; no value
mysqli.default_pw =&gt; no value =&gt; no value
mysqli.default_port =&gt; 3306 =&gt; 3306
mysqli.default_socket =&gt; no value =&gt; no value
mysqli.reconnect =&gt; Off =&gt; Off
mysqli.allow_local_infile =&gt; On =&gt; On
mysqli.cache_size =&gt; 2000 =&gt; 2000

### Ver también

    - [ReflectionExtension::getName()](#reflectionextension.getname) - Obtiene el nombre de la extensión

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

# ReflectionExtension::isPersistent

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionExtension::isPersistent — Verifica si la extensión es persistente

### Descripción

public **ReflectionExtension::isPersistent**(): [bool](#language.types.boolean)

Verifica si la extensión es persistente.

Una extensión es persistente cuando es cargada utilizando php.ini.
Una extensión es temporal, no persistente, cuando es cargada con [dl()](#function.dl).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** para las extensiones cargadas por el mecanismo de
[extensions](#ini.extension),
**[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionExtension::isTemporary()](#reflectionextension.istemporary) - Verifica si la extensión es temporal

# ReflectionExtension::isTemporary

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionExtension::isTemporary — Verifica si la extensión es temporal

### Descripción

public **ReflectionExtension::isTemporary**(): [bool](#language.types.boolean)

Verifica si la extensión es temporal.

Una extensión es temporal si es cargada con [dl()](#function.dl).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** para las extensiones cargadas por la función
[dl()](#function.dl),
**[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionExtension::isPersistent()](#reflectionextension.ispersistent) - Verifica si la extensión es persistente

# ReflectionExtension::\_\_toString

(PHP 5, PHP 7, PHP 8)

ReflectionExtension::\_\_toString — Obtiene una representación textual

### Descripción

public **ReflectionExtension::\_\_toString**(): [string](#language.types.string)

Exporta una extensión reflejada y devuelve el resultado en forma de [string](#language.types.string).
Este método es idéntico a [ReflectionExtension::export()](#reflectionextension.export)
con return definido como **[true](#constant.true)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la extensión reflejada en forma de string,
de la misma manera que [ReflectionExtension::export()](#reflectionextension.export).

### Ver también

    - [ReflectionExtension::__construct()](#reflectionextension.construct) - Construye un nuevo objeto ReflectionExtension

    - [ReflectionExtension::export()](#reflectionextension.export) - Exportación

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionExtension::\_\_clone](#reflectionextension.clone) — Clonación
- [ReflectionExtension::\_\_construct](#reflectionextension.construct) — Construye un nuevo objeto ReflectionExtension
- [ReflectionExtension::export](#reflectionextension.export) — Exportación
- [ReflectionExtension::getClasses](#reflectionextension.getclasses) — Obtiene las clases
- [ReflectionExtension::getClassNames](#reflectionextension.getclassnames) — Obtiene los nombres de las clases
- [ReflectionExtension::getConstants](#reflectionextension.getconstants) — Obtiene las constantes
- [ReflectionExtension::getDependencies](#reflectionextension.getdependencies) — Obtiene las dependencias
- [ReflectionExtension::getFunctions](#reflectionextension.getfunctions) — Obtiene las funciones de una extensión
- [ReflectionExtension::getINIEntries](#reflectionextension.getinientries) — Recupera las entradas ini de la extensión
- [ReflectionExtension::getName](#reflectionextension.getname) — Obtiene el nombre de la extensión
- [ReflectionExtension::getVersion](#reflectionextension.getversion) — Obtiene la versión de la extensión
- [ReflectionExtension::info](#reflectionextension.info) — Muestra información sobre la extensión
- [ReflectionExtension::isPersistent](#reflectionextension.ispersistent) — Verifica si la extensión es persistente
- [ReflectionExtension::isTemporary](#reflectionextension.istemporary) — Verifica si la extensión es temporal
- [ReflectionExtension::\_\_toString](#reflectionextension.tostring) — Obtiene una representación textual

# La clase ReflectionFunction

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionFunction** proporciona
    información sobre una función.

## Sinopsis de la Clase

     class **ReflectionFunction**



     extends
      [ReflectionFunctionAbstract](#class.reflectionfunctionabstract)
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IS_DEPRECATED](#reflectionfunction.constants.is-deprecated);


    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$name](#reflectionfunctionabstract.props.name);


    /* Métodos */

public [\_\_construct](#reflectionfunction.construct)([Closure](#class.closure)|[string](#language.types.string) $function)

    public static [export](#reflectionfunction.export)([string](#language.types.string) $name, [string](#language.types.string) $return = ?): [string](#language.types.string)

public [getClosure](#reflectionfunction.getclosure)(): [Closure](#class.closure)
public [invoke](#reflectionfunction.invoke)([mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public [invokeArgs](#reflectionfunction.invokeargs)([array](#language.types.array) $args): [mixed](#language.types.mixed)
public [isAnonymous](#reflectionfunction.isanonymous)(): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [isDisabled](#reflectionfunction.isdisabled)(): [bool](#language.types.boolean)
public [\_\_toString](#reflectionfunction.tostring)(): [string](#language.types.string)

    /* Métodos heredados */
    private [ReflectionFunctionAbstract::__clone](#reflectionfunctionabstract.clone)(): [void](language.types.void.html)

public [ReflectionFunctionAbstract::getAttributes](#reflectionfunctionabstract.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [ReflectionFunctionAbstract::getClosureCalledClass](#reflectionfunctionabstract.getclosurecalledclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [ReflectionFunctionAbstract::getClosureScopeClass](#reflectionfunctionabstract.getclosurescopeclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [ReflectionFunctionAbstract::getClosureThis](#reflectionfunctionabstract.getclosurethis)(): [?](#language.types.null)[object](#language.types.object)
public [ReflectionFunctionAbstract::getClosureUsedVariables](#reflectionfunctionabstract.getclosureusedvariables)(): [array](#language.types.array)
public [ReflectionFunctionAbstract::getDocComment](#reflectionfunctionabstract.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getEndLine](#reflectionfunctionabstract.getendline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getExtension](#reflectionfunctionabstract.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)
public [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getFileName](#reflectionfunctionabstract.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getName](#reflectionfunctionabstract.getname)(): [string](#language.types.string)
public [ReflectionFunctionAbstract::getNamespaceName](#reflectionfunctionabstract.getnamespacename)(): [string](#language.types.string)
public [ReflectionFunctionAbstract::getNumberOfParameters](#reflectionfunctionabstract.getnumberofparameters)(): [int](#language.types.integer)
public [ReflectionFunctionAbstract::getNumberOfRequiredParameters](#reflectionfunctionabstract.getnumberofrequiredparameters)(): [int](#language.types.integer)
public [ReflectionFunctionAbstract::getParameters](#reflectionfunctionabstract.getparameters)(): [array](#language.types.array)
public [ReflectionFunctionAbstract::getReturnType](#reflectionfunctionabstract.getreturntype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [ReflectionFunctionAbstract::getShortName](#reflectionfunctionabstract.getshortname)(): [string](#language.types.string)
public [ReflectionFunctionAbstract::getStartLine](#reflectionfunctionabstract.getstartline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getStaticVariables](#reflectionfunctionabstract.getstaticvariables)(): [array](#language.types.array)
public [ReflectionFunctionAbstract::getTentativeReturnType](#reflectionfunctionabstract.gettentativereturntype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [ReflectionFunctionAbstract::hasReturnType](#reflectionfunctionabstract.hasreturntype)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::hasTentativeReturnType](#reflectionfunctionabstract.hastentativereturntype)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::inNamespace](#reflectionfunctionabstract.innamespace)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isClosure](#reflectionfunctionabstract.isclosure)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isDeprecated](#reflectionfunctionabstract.isdeprecated)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isGenerator](#reflectionfunctionabstract.isgenerator)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isInternal](#reflectionfunctionabstract.isinternal)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isStatic](#reflectiofunctionabstract.isstatic)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isUserDefined](#reflectionfunctionabstract.isuserdefined)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isVariadic](#reflectionfunctionabstract.isvariadic)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::returnsReference](#reflectionfunctionabstract.returnsreference)(): [bool](#language.types.boolean)
abstract public [ReflectionFunctionAbstract::\_\_toString](#reflectionfunctionabstract.tostring)(): [void](language.types.void.html)

}

## Constantes predefinidas

    ## Modificadores de ReflectionFunction





       **[ReflectionFunction::IS_DEPRECATED](#reflectionfunction.constants.is-deprecated)**
       [int](#language.types.integer)



        Indica una función obsoleta.






## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       8.0.0

        [ReflectionFunction::export()](#reflectionfunction.export) ha sido eliminada.





# ReflectionFunction::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionFunction::\_\_construct — Construye un nuevo objeto ReflectionFunction

### Descripción

public **ReflectionFunction::\_\_construct**([Closure](#class.closure)|[string](#language.types.string) $function)

Construye un nuevo objeto [ReflectionFunction](#class.reflectionfunction).

### Parámetros

     function


       El nombre de la función a reflejar o una
       [fermeture](#functions.anonymous).





### Errores/Excepciones

Se lanza una excepción [ReflectionException](#class.reflectionexception) si el argumento function
contiene una función inválida.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionFunction::__construct()**

&lt;?php
/\*\*

- Un simple contador
-
- @return int
  \*/
  function counter1()
  {
  static $c = 0;
    return ++$c;
  }

/\*\*

- Otro simple contador
-
- @return int
  \*/
  $counter2 = function()
{
    static $d = 0;
    return ++$d;

};

function dumpReflectionFunction($func)
{
// Muestra información básica
printf(
"\n\n===&gt; La función '%s' '%s'\n".
" declarada en %s\n".
" líneas %d a %d\n",
$func-&gt;isInternal() ? 'interna' : 'definida por el usuario',
$func-&gt;getName(),
$func-&gt;getFileName(),
$func-&gt;getStartLine(),
$func-&gt;getEndline()
);

    // Muestra los comentarios de documentación
    printf("---&gt; Documentación:\n %s\n", var_export($func-&gt;getDocComment(), 1));

    // Muestra las variables estáticas existentes
    if ($statics = $func-&gt;getStaticVariables())
    {
        printf("---&gt; Variables estáticas: %s\n", var_export($statics, 1));
    }

}

// Crear una instancia de la clase ReflectionFunction
dumpReflectionFunction(new ReflectionFunction('counter1'));
dumpReflectionFunction(new ReflectionFunction($counter2));
?&gt;

    Resultado del ejemplo anterior es similar a:

===&gt; La función definida por el usuario 'counter1'
declarada en Z:\reflectcounter.php
líneas 7 a 11
---&gt; Documentación:
'/\*\*

- A simple counter
-
- @return int
  \*/'
  ---&gt; Variables estáticas: array (
  'c' =&gt; 0,
  )

===&gt; La función definida por el usuario '{closure}'
declarada en Z:\reflectcounter.php
líneas 18 a 23
---&gt; Documentación:
'/\*\*

- Another simple counter
-
- @return int
  \*/'
  ---&gt; Variables estáticas: array (
  'd' =&gt; 0,
  )

### Ver también

    - [ReflectionMethod::__construct()](#reflectionmethod.construct) - Construye un nuevo objeto ReflectionMethod

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionFunction::export

(PHP 5, PHP 7)

ReflectionFunction::export — Exporta una función

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionFunction::export**([string](#language.types.string) $name, [string](#language.types.string) $return = ?): [string](#language.types.string)

Exporta una función reflejada.

### Parámetros

     name


       La reflexión a exportar.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

Si el parámetro return
está definido a **[true](#constant.true)**, la exportación será retornada en forma de [string](#language.types.string),
de lo contrario, **[null](#constant.null)** será retornado.

### Ver también

    - [ReflectionFunction::invoke()](#reflectionfunction.invoke) - Invoca una función

    - [ReflectionFunction::__toString()](#reflectionfunction.tostring) - Devuelve una representación textual del objeto ReflectionFunction

# ReflectionFunction::getClosure

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionFunction::getClosure — Devuelve un cierre creado dinámicamente para la función

### Descripción

public **ReflectionFunction::getClosure**(): [Closure](#class.closure)

Obtiene un cierre creado dinámicamente para la función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [Closure](#class.closure) recién creado.

### Ver también

- [Sintaxis callable de primera clase](#functions.first_class_callable_syntax)

# ReflectionFunction::invoke

(PHP 5, PHP 7, PHP 8)

ReflectionFunction::invoke — Invoca una función

### Descripción

public **ReflectionFunction::invoke**([mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)

Invoca una función reflejada.

### Parámetros

     args


       La lista de argumentos a pasar a la función.
       Es posible pasar un número variable de argumentos
       a la función, como para la función
       [call_user_func()](#function.call-user-func).





### Valores devueltos

Retorna el resultado de la función invocada.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionFunction::invoke()**

&lt;?php
function title($title, $name)
{
return sprintf("%s. %s\r\n", $title, $name);
}

$function = new ReflectionFunction('title');

echo $function-&gt;invoke('Dr', 'Phil');
?&gt;

    El ejemplo anterior mostrará:

Dr. Phil

### Notas

**Nota**:

    **ReflectionFunction::invoke()** no puede ser utilizado
    cuando se esperan parámetros de referencia.
    [ReflectionFunction::invokeArgs()](#reflectionfunction.invokeargs) debe ser utilizado
    en su lugar (pasando las referencias en la lista de argumentos).

### Ver también

    - [ReflectionFunction::export()](#reflectionfunction.export) - Exporta una función

    - [__invoke()](#object.invoke)

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

# ReflectionFunction::invokeArgs

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionFunction::invokeArgs — Invoca los argumentos de una función

### Descripción

public **ReflectionFunction::invokeArgs**([array](#language.types.array) $args): [mixed](#language.types.mixed)

Invoca la función y le transmite los argumentos en forma de array.

### Parámetros

     args


       Los argumentos a utilizar durante la invocación, de manera similar al
       funcionamiento de [call_user_func_array()](#function.call-user-func-array).





### Valores devueltos

Retorna el resultado de la función invocada.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Las claves de args serán interpretadas como los
        nombres de los parámetros, en lugar de ser ignoradas silenciosamente.





### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionFunction::invokeArgs()**

&lt;?php
function title($title, $name)
{
return sprintf("%s. %s\r\n", $title, $name);
}

$function = new ReflectionFunction('title');

echo $function-&gt;invokeArgs(array('Dr', 'Phil'));
?&gt;

    El ejemplo anterior mostrará:

Dr. Phil

    **Ejemplo #2 Ejemplo para ReflectionFunction::invokeArgs()** con referencias

&lt;?php
function get_false_conditions(array $conditions, array &amp;$false_conditions)
{
foreach($conditions as $condition) {
       if(!$condition) {
$false_conditions[] = $condition;
}
}
}

$function_ref = new ReflectionFunction('get_false_conditions');

$conditions       = array(true, false, -1, 0, 1);
$false_conditions = array();

$function_ref-&gt;invokeArgs(array($conditions, &amp;$false_conditions));

var_dump($false_conditions);
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
bool(false)
[1]=&gt;
int(0)
}

### Notas

**Nota**:

    Si la función tiene argumentos que necesitan ser
        referencias, entonces deben ser pasados por referencia en la lista de argumentos.

### Ver también

    - [ReflectionFunction::invoke()](#reflectionfunction.invoke) - Invoca una función

    - [ReflectionFunctionAbstract::getNumberOfParameters()](#reflectionfunctionabstract.getnumberofparameters) - Obtiene el número de argumentos

    - [__invoke()](#object.invoke)

- [call_user_func_array()](#function.call-user-func-array) - Llama a una función de retorno con los argumentos agrupados en un array

    # ReflectionFunction::isAnonymous

    (PHP 8 &gt;= 8.2.0)

ReflectionFunction::isAnonymous — Verifica si la función es anónima

### Descripción

public **ReflectionFunction::isAnonymous**(): [bool](#language.types.boolean)

Verifica si la función es [anónima](#functions.anonymous).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la función es anónima, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionFunction::isAnonymous()**

&lt;?php

$rf = new ReflectionFunction(function() {});
var_dump($rf-&gt;isAnonymous());

$rf = new ReflectionFunction('strlen');
var_dump($rf-&gt;isAnonymous());
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [Funciones anónimas](#functions.anonymous)

# ReflectionFunction::isDisabled

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunction::isDisabled — Verifica si una función está deshabilitada

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **ReflectionFunction::isDisabled**(): [bool](#language.types.boolean)

Verifica si una función está deshabilitada, mediante la directiva
[disable_functions](#ini.disable-functions).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función está deshabilitada, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada, ya que no es posible construir un
       [ReflectionFunction](#class.reflectionfunction) para funciones deshabilitadas.



### Ver también

    - [ReflectionFunctionAbstract::isUserDefined()](#reflectionfunctionabstract.isuserdefined) - Verifica si la función está definida en el espacio de usuario

    - [Directiva disable_functions](#ini.disable-functions)

# ReflectionFunction::\_\_toString

(PHP 5, PHP 7, PHP 8)

ReflectionFunction::\_\_toString — Devuelve una representación textual del objeto ReflectionFunction

### Descripción

public **ReflectionFunction::\_\_toString**(): [string](#language.types.string)

Obtiene una representación textual legible por humanos
de la función, sus argumentos y su valor de retorno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La cadena.

### Ejemplos

    **Ejemplo #1 Ejemplo para ReflectionFunction::__toString()**

&lt;?php
function title($title, $name)
{
return sprintf("%s. %s\r\n", $title, $name);
}

echo new ReflectionFunction('title');
?&gt;

    Resultado del ejemplo anterior es similar a:

Function [ &lt;user&gt; function title ] {
@@ Command line code 1 - 1

- Parameters [2] {
  Parameter #0 [ &lt;required&gt; $title ]
  Parameter #1 [ &lt;required&gt; $name ]
  }
  }

### Ver también

    - [ReflectionFunction::export()](#reflectionfunction.export) - Exporta una función

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionFunction::\_\_construct](#reflectionfunction.construct) — Construye un nuevo objeto ReflectionFunction
- [ReflectionFunction::export](#reflectionfunction.export) — Exporta una función
- [ReflectionFunction::getClosure](#reflectionfunction.getclosure) — Devuelve un cierre creado dinámicamente para la función
- [ReflectionFunction::invoke](#reflectionfunction.invoke) — Invoca una función
- [ReflectionFunction::invokeArgs](#reflectionfunction.invokeargs) — Invoca los argumentos de una función
- [ReflectionFunction::isAnonymous](#reflectionfunction.isanonymous) — Verifica si la función es anónima
- [ReflectionFunction::isDisabled](#reflectionfunction.isdisabled) — Verifica si una función está deshabilitada
- [ReflectionFunction::\_\_toString](#reflectionfunction.tostring) — Devuelve una representación textual del objeto ReflectionFunction

# La clase ReflectionFunctionAbstract

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

## Introducción

    Una clase parente de [ReflectionFunction](#class.reflectionfunction), léase
    su descripción para más detalles.

## Sinopsis de la Clase

     abstract
     class **ReflectionFunctionAbstract**



     implements
      [Reflector](#class.reflector) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$name](#reflectionfunctionabstract.props.name);


    /* Métodos */

private [\_\_clone](#reflectionfunctionabstract.clone)(): [void](language.types.void.html)
public [getAttributes](#reflectionfunctionabstract.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [getClosureCalledClass](#reflectionfunctionabstract.getclosurecalledclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [getClosureScopeClass](#reflectionfunctionabstract.getclosurescopeclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [getClosureThis](#reflectionfunctionabstract.getclosurethis)(): [?](#language.types.null)[object](#language.types.object)
public [getClosureUsedVariables](#reflectionfunctionabstract.getclosureusedvariables)(): [array](#language.types.array)
public [getDocComment](#reflectionfunctionabstract.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getEndLine](#reflectionfunctionabstract.getendline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getExtension](#reflectionfunctionabstract.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)
public [getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getFileName](#reflectionfunctionabstract.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getName](#reflectionfunctionabstract.getname)(): [string](#language.types.string)
public [getNamespaceName](#reflectionfunctionabstract.getnamespacename)(): [string](#language.types.string)
public [getNumberOfParameters](#reflectionfunctionabstract.getnumberofparameters)(): [int](#language.types.integer)
public [getNumberOfRequiredParameters](#reflectionfunctionabstract.getnumberofrequiredparameters)(): [int](#language.types.integer)
public [getParameters](#reflectionfunctionabstract.getparameters)(): [array](#language.types.array)
public [getReturnType](#reflectionfunctionabstract.getreturntype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [getShortName](#reflectionfunctionabstract.getshortname)(): [string](#language.types.string)
public [getStartLine](#reflectionfunctionabstract.getstartline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getStaticVariables](#reflectionfunctionabstract.getstaticvariables)(): [array](#language.types.array)
public [getTentativeReturnType](#reflectionfunctionabstract.gettentativereturntype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [hasReturnType](#reflectionfunctionabstract.hasreturntype)(): [bool](#language.types.boolean)
public [hasTentativeReturnType](#reflectionfunctionabstract.hastentativereturntype)(): [bool](#language.types.boolean)
public [inNamespace](#reflectionfunctionabstract.innamespace)(): [bool](#language.types.boolean)
public [isClosure](#reflectionfunctionabstract.isclosure)(): [bool](#language.types.boolean)
public [isDeprecated](#reflectionfunctionabstract.isdeprecated)(): [bool](#language.types.boolean)
public [isGenerator](#reflectionfunctionabstract.isgenerator)(): [bool](#language.types.boolean)
public [isInternal](#reflectionfunctionabstract.isinternal)(): [bool](#language.types.boolean)
public [isStatic](#reflectiofunctionabstract.isstatic)(): [bool](#language.types.boolean)
public [isUserDefined](#reflectionfunctionabstract.isuserdefined)(): [bool](#language.types.boolean)
public [isVariadic](#reflectionfunctionabstract.isvariadic)(): [bool](#language.types.boolean)
public [returnsReference](#reflectionfunctionabstract.returnsreference)(): [bool](#language.types.boolean)
abstract public [\_\_toString](#reflectionfunctionabstract.tostring)(): [void](language.types.void.html)

}

## Propiedades

     name


       Nombre de la función. Solo lectura, genera
       [ReflectionException](#class.reflectionexception) al intentar escribir.





# ReflectionFunctionAbstract::\_\_clone

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::\_\_clone — Clona una función

### Descripción

private **ReflectionFunctionAbstract::\_\_clone**(): [void](language.types.void.html)

Clona una función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método ya no es final.



### Ver también

    - [La clonación de objetos](#language.oop5.cloning)

# ReflectionFunctionAbstract::getAttributes

(PHP 8)

ReflectionFunctionAbstract::getAttributes — Devuelve los atributos

### Descripción

public **ReflectionFunctionAbstract::getAttributes**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Devuelve todos los atributos declarados en esta función o método en forma de un array de objetos [ReflectionAttribute](#class.reflectionattribute).

### Parámetros

name

Filtrar los resultados para incluir únicamente las instancias
de [ReflectionAttribute](#class.reflectionattribute) para los atributos correspondientes a este nombre de clase.

flags

Flags para determinar cómo filtrar los resultados, si name es proporcionado.

El valor por omisión es 0 que solo retornará los resultados
para los atributos que son de la clase name.

La única otra opción disponible es utilizar **[ReflectionAttribute::IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof)**,
que utilizará instanceof para el filtrado.

### Valores devueltos

Un array de atributos, en forma de objetos [ReflectionAttribute](#class.reflectionattribute).

### Ejemplos

    **Ejemplo #1 Uso básico con un método de clase**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

class Factory { #[Fruit] #[Red]
public function makeApple(): string
{
return 'apple';
}
}

$method = new ReflectionMethod('Factory', 'makeApple');
$attributes = $method-&gt;getAttributes();
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
[1] =&gt; Red
)

    **Ejemplo #2 Uso básico con una función**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

#[Fruit] #[Red]
function makeApple(): string
{
return 'apple';
}

$function = new ReflectionFunction('makeApple');
$attributes = $function-&gt;getAttributes();
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
[1] =&gt; Red
)

    **Ejemplo #3 Resultados filtrados por nombre de clase**

&lt;?php #[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

#[Fruit] #[Red]
function makeApple(): string
{
return 'apple';
}

$function = new ReflectionFunction('makeApple');
$attributes = $function-&gt;getAttributes('Fruit');
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fruit
)

    **Ejemplo #4 Resultados filtrados por nombre de clase, con herencia**

&lt;?php
interface Color {
}

#[Attribute]
class Fruit {
}

#[Attribute]
class Red implements Color {
}

#[Fruit] #[Red]
function makeApple(): string
{
return 'apple';
}

$function = new ReflectionFunction('makeApple');
$attributes = $function-&gt;getAttributes('Color', ReflectionAttribute::IS_INSTANCEOF);
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Red
)

### Ver también

    - [ReflectionClass::getAttributes()](#reflectionclass.getattributes) - Recupera los atributos de una clase

    - [ReflectionClassConstant::getAttributes()](#reflectionclassconstant.getattributes) - Verifica los atributos

    - [ReflectionParameter::getAttributes()](#reflectionparameter.getattributes) - Devuelve los atributos

    - [ReflectionProperty::getAttributes()](#reflectionproperty.getattributes) - Devuelve los atributos

# ReflectionFunctionAbstract::getClosureCalledClass

(PHP 8 &gt;= 8.0.23, PHP 8 &gt;= 8.1.11)

ReflectionFunctionAbstract::getClosureCalledClass — Devuelve la clase correspondiente a static:: dentro de una función anónima

### Descripción

public **ReflectionFunctionAbstract::getClosureCalledClass**(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)

Devuelve la clase como [ReflectionClass](#class.reflectionclass) que
corresponde a la resolución del nombre de clase correspondiente a static:: dentro de la
[Closure](#class.closure).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una [ReflectionClass](#class.reflectionclass) correspondiente a la clase
representada por static:: en la [Closure](#class.closure).
Si la función no es una función anónima o si tiene un ámbito global, **[null](#constant.null)**
es devuelto en su lugar.

### Ejemplos

**Ejemplo #1
Ejemplo que ilustra la diferencia entre
ReflectionFunctionAbstract::getClosureCalledClass()**,
[ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass),
y [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis)
con una función anónima en el contexto del objeto

&lt;?php

class A
{
public function getClosure()
{
var_dump(self::class, static::class);
return function () {};
}
}

class B extends A {}

$b = new B();
$c = $b-&gt;getClosure();
$r = new ReflectionFunction($c);

var_dump($r-&gt;getClosureThis()); // $this === $b, ya que una función anónima no estática toma el contexto del objeto
var_dump($r-&gt;getClosureScopeClass()); // Corresponde a la resolución de self::class dentro de una función anónima
var_dump($r-&gt;getClosureCalledClass()); // Corresponde a la resolución de static::class dentro de una función anónima

?&gt;

El ejemplo anterior mostrará:

string(1) "A"
string(1) "B"
object(B)#1 (0) {
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "A"
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "B"
}

**Ejemplo #2
Ejemplo que ilustra la diferencia entre
ReflectionFunctionAbstract::getClosureCalledClass()**,
[ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass),
y [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis)
con una función anónima estática sin contexto de objeto

    &lt;?php

class A
{
public function getClosure()
{
var_dump(self::class, static::class);
return static function () {};
}
}

class B extends A {}

$b = new B();
$c = $b-&gt;getClosure();
$r = new ReflectionFunction($c);

var_dump($r-&gt;getClosureThis()); // NULL, ya que la pseudo-variable $this no está disponible en un contexto estático
var_dump($r-&gt;getClosureScopeClass()); // Corresponde a la resolución de self::class dentro de una función anónima
var_dump($r-&gt;getClosureCalledClass()); // Corresponde a la resolución de static::class dentro de una función anónima

?&gt;

El ejemplo anterior mostrará:

string(1) "A"
string(1) "B"
NULL
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "A"
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "B"
}

### Ver también

- [ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass) - Devuelve la clase correspondiente al contexto interno de una función anónima

- [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis) - Devuelve el objeto que corresponde a $this dentro de una closure

- [Late Static Bindings (Résolution statique a la volée)](#language.oop5.late-static-bindings)

# ReflectionFunctionAbstract::getClosureScopeClass

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getClosureScopeClass — Devuelve la clase correspondiente al contexto interno de una función anónima

### Descripción

public **ReflectionFunctionAbstract::getClosureScopeClass**(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)

Devuelve la clase en forma de [ReflectionClass](#class.reflectionclass) que
corresponde al contexto interno de la
[Closure](#class.closure).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una [ReflectionClass](#class.reflectionclass) correspondiente a la clase
cuyo contexto se utiliza dentro de la [Closure](#class.closure).
Si la función no es una función anónima o si tiene un contexto global,
**[null](#constant.null)** es devuelto en su lugar.

### Ejemplos

**Ejemplo #1
Ejemplo que ilustra la diferencia entre
[ReflectionFunctionAbstract::getClosureCalledClass()](#reflectionfunctionabstract.getclosurecalledclass),
ReflectionFunctionAbstract::getClosureScopeClass()**,
y [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis)
con una función anónima en el contexto del objeto

&lt;?php

class A
{
public function getClosure()
{
var_dump(self::class, static::class);
return function () {};
}
}

class B extends A {}

$b = new B();
$c = $b-&gt;getClosure();
$r = new ReflectionFunction($c);

var_dump($r-&gt;getClosureThis()); // $this === $b, ya que una función anónima no estática toma el contexto del objeto
var_dump($r-&gt;getClosureScopeClass()); // Corresponde a la resolución de self::class dentro de una función anónima
var_dump($r-&gt;getClosureCalledClass()); // Corresponde a la resolución de static::class dentro de una función anónima

?&gt;

El ejemplo anterior mostrará:

string(1) "A"
string(1) "B"
object(B)#1 (0) {
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "A"
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "B"
}

**Ejemplo #2
Ejemplo que ilustra la diferencia entre
[ReflectionFunctionAbstract::getClosureCalledClass()](#reflectionfunctionabstract.getclosurecalledclass),
ReflectionFunctionAbstract::getClosureScopeClass()**,
y [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis)
con una función anónima estática sin contexto de objeto

    &lt;?php

class A
{
public function getClosure()
{
var_dump(self::class, static::class);
return static function () {};
}
}

class B extends A {}

$b = new B();
$c = $b-&gt;getClosure();
$r = new ReflectionFunction($c);

var_dump($r-&gt;getClosureThis()); // NULL, ya que la pseudo-variable $this no está disponible en un contexto estático
var_dump($r-&gt;getClosureScopeClass()); // Corresponde a la resolución de self::class dentro de una función anónima
var_dump($r-&gt;getClosureCalledClass()); // Corresponde a la resolución de static::class dentro de una función anónima

?&gt;

El ejemplo anterior mostrará:

string(1) "A"
string(1) "B"
NULL
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "A"
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "B"
}

### Ver también

- [ReflectionFunctionAbstract::getClosureCalledClass()](#reflectionfunctionabstract.getclosurecalledclass) - Devuelve la clase correspondiente a static:: dentro de una función anónima

- [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis) - Devuelve el objeto que corresponde a $this dentro de una closure

- [Late Static Bindings (Résolution statique a la volée)](#language.oop5.late-static-bindings)

# ReflectionFunctionAbstract::getClosureThis

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getClosureThis — Devuelve el objeto que corresponde a $this dentro de una closure

### Descripción

public **ReflectionFunctionAbstract::getClosureThis**(): [?](#language.types.null)[object](#language.types.object)

Si la función es una closure no estática, recupera el objeto vinculado a
$this dentro de la closure.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la instancia de objeto representada por $this dentro
de la [Closure](#class.closure).
Si la función no es una closure o si no tiene un $this,
**[null](#constant.null)** es devuelto en su lugar.

### Ejemplos

**Ejemplo #1
Ejemplo que ilustra la diferencia entre
[ReflectionFunctionAbstract::getClosureCalledClass()](#reflectionfunctionabstract.getclosurecalledclass),
[ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass),
y ReflectionFunctionAbstract::getClosureThis()**
con una función anónima en el contexto del objeto

&lt;?php

class A
{
public function getClosure()
{
var_dump(self::class, static::class);
return function () {};
}
}

class B extends A {}

$b = new B();
$c = $b-&gt;getClosure();
$r = new ReflectionFunction($c);

var_dump($r-&gt;getClosureThis()); // $this === $b, ya que una función anónima no estática toma el contexto del objeto
var_dump($r-&gt;getClosureScopeClass()); // Corresponde a la resolución de self::class dentro de una función anónima
var_dump($r-&gt;getClosureCalledClass()); // Corresponde a la resolución de static::class dentro de una función anónima

?&gt;

El ejemplo anterior mostrará:

string(1) "A"
string(1) "B"
object(B)#1 (0) {
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "A"
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "B"
}

**Ejemplo #2
Ejemplo que ilustra la diferencia entre
[ReflectionFunctionAbstract::getClosureCalledClass()](#reflectionfunctionabstract.getclosurecalledclass),
[ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass),
y ReflectionFunctionAbstract::getClosureThis()**
con una función anónima estática sin contexto de objeto

    &lt;?php

class A
{
public function getClosure()
{
var_dump(self::class, static::class);
return static function () {};
}
}

class B extends A {}

$b = new B();
$c = $b-&gt;getClosure();
$r = new ReflectionFunction($c);

var_dump($r-&gt;getClosureThis()); // NULL, ya que la pseudo-variable $this no está disponible en un contexto estático
var_dump($r-&gt;getClosureScopeClass()); // Corresponde a la resolución de self::class dentro de una función anónima
var_dump($r-&gt;getClosureCalledClass()); // Corresponde a la resolución de static::class dentro de una función anónima

?&gt;

El ejemplo anterior mostrará:

string(1) "A"
string(1) "B"
NULL
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "A"
}
object(ReflectionClass)#4 (1) {
["name"]=&gt;
string(1) "B"
}

### Ver también

- [ReflectionFunctionAbstract::getClosureCalledClass()](#reflectionfunctionabstract.getclosurecalledclass) - Devuelve la clase correspondiente a static:: dentro de una función anónima

- [ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass) - Devuelve la clase correspondiente al contexto interno de una función anónima

- [Late Static Bindings (Résolution statique a la volée)](#language.oop5.late-static-bindings)

# ReflectionFunctionAbstract::getClosureUsedVariables

(PHP 8 &gt;= 8.1.0)

ReflectionFunctionAbstract::getClosureUsedVariables — Devuelve un array de las variables utilizadas en la Closure

### Descripción

public **ReflectionFunctionAbstract::getClosureUsedVariables**(): [array](#language.types.array)

Devuelve un [array](#language.types.array) de las variables utilizadas en la [Closure](#class.closure).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) de las variables utilizadas en la [Closure](#class.closure).

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionFunctionAbstract::getClosureUsedVariables()**

&lt;?php

$one = 1;
$two = 2;

$function = function() use ($one, $two) {
static $three = 3;
};

$reflector = new ReflectionFunction($function);

var_dump($reflector-&gt;getClosureUsedVariables());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(2) {
["one"]=&gt;
int(1)
["two"]=&gt;
int(2)
}

### Ver también

    - [ReflectionFunctionAbstract::getClosureScopeClass()](#reflectionfunctionabstract.getclosurescopeclass) - Devuelve la clase correspondiente al contexto interno de una función anónima

    - [ReflectionFunctionAbstract::getClosureThis()](#reflectionfunctionabstract.getclosurethis) - Devuelve el objeto que corresponde a $this dentro de una closure

# ReflectionFunctionAbstract::getDocComment

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getDocComment — Obtiene un comentario

### Descripción

public **ReflectionFunctionAbstract::getDocComment**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene un comentario desde una función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El comentario, si existe, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionFunctionAbstract::getStartLine()](#reflectionfunctionabstract.getstartline) - Obtiene el número de línea de inicio

# ReflectionFunctionAbstract::getEndLine

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getEndLine — Obtiene el número de la última línea

### Descripción

public **ReflectionFunctionAbstract::getEndLine**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de la última línea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de la última línea de una función definida en el espacio
de nombres del usuario, o bien **[false](#constant.false)** si este número no es conocido.

### Ver también

    - [ReflectionFunctionAbstract::getStartLine()](#reflectionfunctionabstract.getstartline) - Obtiene el número de línea de inicio

# ReflectionFunctionAbstract::getExtension

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getExtension — Obtiene las informaciones de una extensión

### Descripción

public **ReflectionFunctionAbstract::getExtension**(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)

Obtiene las informaciones de una extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Las informaciones de la extensión, en forma de objeto
[ReflectionExtension](#class.reflectionextension), o **[null](#constant.null)** para las funciones
definidas por el usuario.

### Ver también

    - [ReflectionFunctionAbstract::getExtensionName()](#reflectionfunctionabstract.getextensionname) - Obtiene el nombre de la extensión

# ReflectionFunctionAbstract::getExtensionName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getExtensionName — Obtiene el nombre de la extensión

### Descripción

public **ReflectionFunctionAbstract::getExtensionName**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre de la extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la extensión que define la función,
o **[false](#constant.false)** para las funciones definidas por el usuario.

### Ver también

    - [ReflectionFunctionAbstract::getExtension()](#reflectionfunctionabstract.getextension) - Obtiene las informaciones de una extensión

# ReflectionFunctionAbstract::getFileName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getFileName — Obtiene el nombre del fichero

### Descripción

public **ReflectionFunctionAbstract::getFileName**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre del fichero desde una función definida
en el espacio de usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero en el que la función ha sido definida.
Si la función es definida en el núcleo de PHP o una extensión PHP, **[false](#constant.false)**
es devuelto.

### Ver también

    - [ReflectionFunctionAbstract::getNamespaceName()](#reflectionfunctionabstract.getnamespacename) - Obtiene el espacio de nombres

# ReflectionFunctionAbstract::getName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getName — Obtiene el nombre de una función

### Descripción

public **ReflectionFunctionAbstract::getName**(): [string](#language.types.string)

Obtiene el nombre de una función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la función.

### Ver también

    - [ReflectionFunctionAbstract::getExtensionName()](#reflectionfunctionabstract.getextensionname) - Obtiene el nombre de la extensión

    - [ReflectionFunctionAbstract::isUserDefined()](#reflectionfunctionabstract.isuserdefined) - Verifica si la función está definida en el espacio de usuario

# ReflectionFunctionAbstract::getNamespaceName

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getNamespaceName — Obtiene el espacio de nombres

### Descripción

public **ReflectionFunctionAbstract::getNamespaceName**(): [string](#language.types.string)

Obtiene el espacio de nombres desde el cual la clase está definida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del espacio de nombres.

### Ver también

    - [ReflectionFunctionAbstract::getFileName()](#reflectionfunctionabstract.getfilename) - Obtiene el nombre del fichero

    - [Los espacios de nombres](#language.namespaces)

# ReflectionFunctionAbstract::getNumberOfParameters

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getNumberOfParameters — Obtiene el número de argumentos

### Descripción

public **ReflectionFunctionAbstract::getNumberOfParameters**(): [int](#language.types.integer)

Obtiene el número de argumentos definidos en la función; tanto los argumentos
requeridos como los opcionales.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de argumentos.

### Ver también

    - [ReflectionFunctionAbstract::getNumberOfRequiredParameters()](#reflectionfunctionabstract.getnumberofrequiredparameters) - Obtiene el número de argumentos requeridos

    - [func_num_args()](#function.func-num-args) - Devuelve el número de argumentos pasados a la función

# ReflectionFunctionAbstract::getNumberOfRequiredParameters

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getNumberOfRequiredParameters — Obtiene el número de argumentos requeridos

### Descripción

public **ReflectionFunctionAbstract::getNumberOfRequiredParameters**(): [int](#language.types.integer)

Obtiene el número de argumentos requeridos por una función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de argumentos requeridos.

### Ver también

    - [ReflectionFunctionAbstract::getNumberOfParameters()](#reflectionfunctionabstract.getnumberofparameters) - Obtiene el número de argumentos

# ReflectionFunctionAbstract::getParameters

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getParameters — Obtiene los parámetros

### Descripción

public **ReflectionFunctionAbstract::getParameters**(): [array](#language.types.array)

Obtiene los parámetros, en forma de un array de objetos
[ReflectionParameter](#class.reflectionparameter), en el orden en que están
definidos en el código fuente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los parámetros, en forma de objetos [ReflectionParameter](#class.reflectionparameter).

### Ver también

    - [ReflectionFunctionAbstract::getNumberOfParameters()](#reflectionfunctionabstract.getnumberofparameters) - Obtiene el número de argumentos

    - [func_get_args()](#function.func-get-args) - Devuelve los argumentos de una función en forma de array

# ReflectionFunctionAbstract::getReturnType

(PHP 7, PHP 8)

ReflectionFunctionAbstract::getReturnType — Obtiene el tipo de retorno definido para una función

### Descripción

public **ReflectionFunctionAbstract::getReturnType**(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)

Obtiene el tipo de retorno definido para una función reflejada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [ReflectionType](#class.reflectiontype) si un tipo de retorno está
definido, **[null](#constant.null)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionFunctionAbstract::getReturnType()**

&lt;?php

function to_int($param) : int {
return (int) $param;
}

$reflection1 = new ReflectionFunction('to_int');
echo $reflection1-&gt;getReturnType();

    El ejemplo anterior mostrará:

int

    **Ejemplo #2 Uso con funciones integradas**

&lt;?php

$reflection2 = new ReflectionFunction('array_merge');

var_dump($reflection2-&gt;getReturnType());

    El ejemplo anterior mostrará:

null

Este es el caso, ya que muchas funciones internas no definen un tipo para
sus argumentos o su valor de retorno. Por lo tanto, se recomienda evitar el uso
de este método con funciones integradas.

### Ver también

    - [ReflectionFunctionAbstract::hasReturnType()](#reflectionfunctionabstract.hasreturntype) - Verifica si la función tiene un tipo de retorno definido

    - [ReflectionType::__toString()](#reflectiontype.tostring) - Conversión a string

# ReflectionFunctionAbstract::getShortName

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getShortName — Obtiene el nombre corto de una función

### Descripción

public **ReflectionFunctionAbstract::getShortName**(): [string](#language.types.string)

Obtiene el nombre corto de una función (sin la parte correspondiente al espacio
de nombres).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre corto de la función.

### Ver también

    - [ReflectionFunctionAbstract::getNamespaceName()](#reflectionfunctionabstract.getnamespacename) - Obtiene el espacio de nombres

    - [Los espacios de nombres](#language.namespaces)

# ReflectionFunctionAbstract::getStartLine

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getStartLine — Obtiene el número de línea de inicio

### Descripción

public **ReflectionFunctionAbstract::getStartLine**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de línea de inicio de la función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de la línea de inicio, o **[false](#constant.false)** si es desconocido.

### Ver también

    - [ReflectionFunctionAbstract::getEndLine()](#reflectionfunctionabstract.getendline) - Obtiene el número de la última línea

# ReflectionFunctionAbstract::getStaticVariables

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::getStaticVariables — Obtiene las variables estáticas

### Descripción

public **ReflectionFunctionAbstract::getStaticVariables**(): [array](#language.types.array)

Obtiene las variables estáticas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de variables estáticas.

### Ver también

    - [ReflectionFunctionAbstract::getParameters()](#reflectionfunctionabstract.getparameters) - Obtiene los parámetros

# ReflectionFunctionAbstract::getTentativeReturnType

(PHP 8 &gt;= 8.1.0)

ReflectionFunctionAbstract::getTentativeReturnType — Devuelve el tipo de retorno provisional asociado con esta función

### Descripción

public **ReflectionFunctionAbstract::getTentativeReturnType**(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)

Devuelve el tipo de retorno provisional asociado con esta función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [ReflectionType](#class.reflectiontype) si se especifica un tipo de retorno provisional, de lo contrario **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionFunctionAbstract::getTentativeReturnType()**

&lt;?php

$method = new ReflectionMethod(\ArrayAccess::class, 'offsetGet');
var_dump($method-&gt;getTentativeReturnType());

    Resultado del ejemplo anterior es similar a:

object(ReflectionNamedType)#2 (0) {
}

### Ver también

    - [ReflectionFunctionAbstract::getReturnType()](#reflectionfunctionabstract.getreturntype) - Obtiene el tipo de retorno definido para una función

    - [ReflectionFunctionAbstract::hasTentativeReturnType()](#reflectionfunctionabstract.hastentativereturntype) - Indica si la función tiene un tipo de retorno provisional

    - [Compatibilidad de los tipos de retorno con las clases internas](#language.oop5.inheritance.internal-classes)

# ReflectionFunctionAbstract::hasReturnType

(PHP 7, PHP 8)

ReflectionFunctionAbstract::hasReturnType — Verifica si la función tiene un tipo de retorno definido

### Descripción

public **ReflectionFunctionAbstract::hasReturnType**(): [bool](#language.types.boolean)

Verifica si la función tiene un tipo de retorno definido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la función tiene un tipo de retorno definido, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionFunctionAbstract::hasReturnType()**

&lt;?php

function to_int($param) : int {
return (int) $param;
}

$reflection1 = new ReflectionFunction('to_int');
var_dump($reflection1-&gt;hasReturnType());

    El ejemplo anterior mostrará:

bool(true)

    **Ejemplo #2 Uso con funciones integradas**

&lt;?php

$reflection2 = new ReflectionFunction('array_merge');

var_dump($reflection2-&gt;hasReturnType());

    El ejemplo anterior mostrará:

bool(false)

Esto ocurre porque muchas funciones internas no definen un tipo para
sus argumentos o sus valores de retorno. Por lo tanto, se recomienda evitar el uso
de este método con funciones integradas.

### Ver también

    - [ReflectionFunctionAbstract::getReturnType()](#reflectionfunctionabstract.getreturntype) - Obtiene el tipo de retorno definido para una función

# ReflectionFunctionAbstract::hasTentativeReturnType

(PHP 8 &gt;= 8.1.0)

ReflectionFunctionAbstract::hasTentativeReturnType — Indica si la función tiene un tipo de retorno provisional

### Descripción

public **ReflectionFunctionAbstract::hasTentativeReturnType**(): [bool](#language.types.boolean)

Indica si la función tiene un tipo de retorno provisional.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la función tiene un tipo de retorno provisional, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionFunctionAbstract::hasTentativeReturnType()**

&lt;?php

$method = new ReflectionMethod(\ArrayAccess::class, 'offsetGet');
var_dump($method-&gt;hasTentativeReturnType());

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [ReflectionFunctionAbstract::getTentativeReturnType()](#reflectionfunctionabstract.gettentativereturntype) - Devuelve el tipo de retorno provisional asociado con esta función

    - [ReflectionFunctionAbstract::hasReturnType()](#reflectionfunctionabstract.hasreturntype) - Verifica si la función tiene un tipo de retorno definido

    - [Compatibilidad de los tipos de retorno con las clases internas](#language.oop5.inheritance.internal-classes)

# ReflectionFunctionAbstract::inNamespace

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::inNamespace — Verifica si una función está en un espacio de nombres

### Descripción

public **ReflectionFunctionAbstract::inNamespace**(): [bool](#language.types.boolean)

Verifica si una función está en un espacio de nombres.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función está en el espacio de nombres, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionFunctionAbstract::getNamespaceName()](#reflectionfunctionabstract.getnamespacename) - Obtiene el espacio de nombres

    - [Los espacios de nombres](#language.namespaces)

# ReflectionFunctionAbstract::isClosure

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::isClosure — Verifica si es una función anónima

### Descripción

public **ReflectionFunctionAbstract::isClosure**(): [bool](#language.types.boolean)

Verifica si la función reflejada es una [Closure](#class.closure).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la función es una [Closure](#class.closure), de lo contrario **[false](#constant.false)**

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionFunctionAbstract::isClosure()**

&lt;?php
// No es una función anónima
$function1 = 'str_replace';
$reflection1 = new ReflectionFunction($function1);
var_dump($reflection1-&gt;isClosure());

// Función anónima
$function2 = function () {};
$reflection2 = new ReflectionFunction($function2);
var_dump($reflection2-&gt;isClosure());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [ReflectionFunctionAbstract::isGenerator()](#reflectionfunctionabstract.isgenerator) - Verifica si la función es un generador

# ReflectionFunctionAbstract::isDeprecated

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::isDeprecated — Verifica si la función es obsoleta

### Descripción

public **ReflectionFunctionAbstract::isDeprecated**(): [bool](#language.types.boolean)

Verifica si la función es obsoleta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función es obsoleta, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1  Ejemplo con
     ReflectionFunctionAbstract::isDeprecated()**

&lt;?php
$rf = new ReflectionFunction('ereg');
var_dump($rf-&gt;isDeprecated());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [Deprecated](#class.deprecated)

    - [ReflectionFunctionAbstract::getDocComment()](#reflectionfunctionabstract.getdoccomment) - Obtiene un comentario

# ReflectionFunctionAbstract::isGenerator

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::isGenerator — Verifica si la función es un generador

### Descripción

public **ReflectionFunctionAbstract::isGenerator**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la función es un generador, **[false](#constant.false)** si no lo es, o **[null](#constant.null)** en caso de error.

# ReflectionFunctionAbstract::isInternal

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::isInternal — Verifica si la función es una función interna

### Descripción

public **ReflectionFunctionAbstract::isInternal**(): [bool](#language.types.boolean)

Verifica si la función es una función interna, en lugar
de una función definida en el espacio de usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función es una función interna, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionFunctionAbstract::isUserDefined()](#reflectionfunctionabstract.isuserdefined) - Verifica si la función está definida en el espacio de usuario

# ReflectionFunctionAbstract::isStatic

(PHP 5, PHP 7, PHP 8)

ReflectionFunctionAbstract::isStatic — Verifica si la función es estática

### Descripción

public **ReflectionFunctionAbstract::isStatic**(): [bool](#language.types.boolean)

Verifica si la función es estática.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función es estática, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método ha sido movido. Anteriormente, solo estaba definido en
       la clase [ReflectionMethod](#class.reflectionmethod).



### Ver también

    - [ReflectionMethod::isFinal()](#reflectionmethod.isfinal) - Verifica si el método es final

# ReflectionFunctionAbstract::isUserDefined

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::isUserDefined — Verifica si la función está definida en el espacio de usuario

### Descripción

public **ReflectionFunctionAbstract::isUserDefined**(): [bool](#language.types.boolean)

Verifica si la función está definida en el espacio de usuario,
en lugar de ser una función interna.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función ha sido definida en el espacio de usuario,
**[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionFunctionAbstract::isInternal()](#reflectionfunctionabstract.isinternal) - Verifica si la función es una función interna

# ReflectionFunctionAbstract::isVariadic

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::isVariadic — Verifica si la función es variádica

### Descripción

public **ReflectionFunctionAbstract::isVariadic**(): [bool](#language.types.boolean)

Verifica si la función es
[variádica](#functions.variable-arg-list).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la función es variádica, **[false](#constant.false)** en caso contrario.

# ReflectionFunctionAbstract::returnsReference

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::returnsReference — Verifica si la función devuelve una referencia

### Descripción

public **ReflectionFunctionAbstract::returnsReference**(): [bool](#language.types.boolean)

Verifica si la función devuelve una referencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la función devuelve una referencia, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionFunctionAbstract::isClosure()](#reflectionfunctionabstract.isclosure) - Verifica si es una función anónima

# ReflectionFunctionAbstract::\_\_toString

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ReflectionFunctionAbstract::\_\_toString — Obtiene una representación textual de un objeto ReflectionFunctionAbstract

### Descripción

abstract public **ReflectionFunctionAbstract::\_\_toString**(): [void](language.types.void.html)

Obtiene una representación textual legible por humanos
de la función, sus argumentos y su valor de retorno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [string](#language.types.string).

### Ver también

    - [ReflectionFunction::__toString()](#reflectionfunction.tostring) - Devuelve una representación textual del objeto ReflectionFunction

    - [ReflectionMethod::__toString()](#reflectionmethod.tostring) - Devuelve una representación textual del método

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionFunctionAbstract::\_\_clone](#reflectionfunctionabstract.clone) — Clona una función
- [ReflectionFunctionAbstract::getAttributes](#reflectionfunctionabstract.getattributes) — Devuelve los atributos
- [ReflectionFunctionAbstract::getClosureCalledClass](#reflectionfunctionabstract.getclosurecalledclass) — Devuelve la clase correspondiente a static:: dentro de una función anónima
- [ReflectionFunctionAbstract::getClosureScopeClass](#reflectionfunctionabstract.getclosurescopeclass) — Devuelve la clase correspondiente al contexto interno de una función anónima
- [ReflectionFunctionAbstract::getClosureThis](#reflectionfunctionabstract.getclosurethis) — Devuelve el objeto que corresponde a $this dentro de una closure
- [ReflectionFunctionAbstract::getClosureUsedVariables](#reflectionfunctionabstract.getclosureusedvariables) — Devuelve un array de las variables utilizadas en la Closure
- [ReflectionFunctionAbstract::getDocComment](#reflectionfunctionabstract.getdoccomment) — Obtiene un comentario
- [ReflectionFunctionAbstract::getEndLine](#reflectionfunctionabstract.getendline) — Obtiene el número de la última línea
- [ReflectionFunctionAbstract::getExtension](#reflectionfunctionabstract.getextension) — Obtiene las informaciones de una extensión
- [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname) — Obtiene el nombre de la extensión
- [ReflectionFunctionAbstract::getFileName](#reflectionfunctionabstract.getfilename) — Obtiene el nombre del fichero
- [ReflectionFunctionAbstract::getName](#reflectionfunctionabstract.getname) — Obtiene el nombre de una función
- [ReflectionFunctionAbstract::getNamespaceName](#reflectionfunctionabstract.getnamespacename) — Obtiene el espacio de nombres
- [ReflectionFunctionAbstract::getNumberOfParameters](#reflectionfunctionabstract.getnumberofparameters) — Obtiene el número de argumentos
- [ReflectionFunctionAbstract::getNumberOfRequiredParameters](#reflectionfunctionabstract.getnumberofrequiredparameters) — Obtiene el número de argumentos requeridos
- [ReflectionFunctionAbstract::getParameters](#reflectionfunctionabstract.getparameters) — Obtiene los parámetros
- [ReflectionFunctionAbstract::getReturnType](#reflectionfunctionabstract.getreturntype) — Obtiene el tipo de retorno definido para una función
- [ReflectionFunctionAbstract::getShortName](#reflectionfunctionabstract.getshortname) — Obtiene el nombre corto de una función
- [ReflectionFunctionAbstract::getStartLine](#reflectionfunctionabstract.getstartline) — Obtiene el número de línea de inicio
- [ReflectionFunctionAbstract::getStaticVariables](#reflectionfunctionabstract.getstaticvariables) — Obtiene las variables estáticas
- [ReflectionFunctionAbstract::getTentativeReturnType](#reflectionfunctionabstract.gettentativereturntype) — Devuelve el tipo de retorno provisional asociado con esta función
- [ReflectionFunctionAbstract::hasReturnType](#reflectionfunctionabstract.hasreturntype) — Verifica si la función tiene un tipo de retorno definido
- [ReflectionFunctionAbstract::hasTentativeReturnType](#reflectionfunctionabstract.hastentativereturntype) — Indica si la función tiene un tipo de retorno provisional
- [ReflectionFunctionAbstract::inNamespace](#reflectionfunctionabstract.innamespace) — Verifica si una función está en un espacio de nombres
- [ReflectionFunctionAbstract::isClosure](#reflectionfunctionabstract.isclosure) — Verifica si es una función anónima
- [ReflectionFunctionAbstract::isDeprecated](#reflectionfunctionabstract.isdeprecated) — Verifica si la función es obsoleta
- [ReflectionFunctionAbstract::isGenerator](#reflectionfunctionabstract.isgenerator) — Verifica si la función es un generador
- [ReflectionFunctionAbstract::isInternal](#reflectionfunctionabstract.isinternal) — Verifica si la función es una función interna
- [ReflectionFunctionAbstract::isStatic](#reflectiofunctionabstract.isstatic) — Verifica si la función es estática
- [ReflectionFunctionAbstract::isUserDefined](#reflectionfunctionabstract.isuserdefined) — Verifica si la función está definida en el espacio de usuario
- [ReflectionFunctionAbstract::isVariadic](#reflectionfunctionabstract.isvariadic) — Verifica si la función es variádica
- [ReflectionFunctionAbstract::returnsReference](#reflectionfunctionabstract.returnsreference) — Verifica si la función devuelve una referencia
- [ReflectionFunctionAbstract::\_\_toString](#reflectionfunctionabstract.tostring) — Obtiene una representación textual de un objeto ReflectionFunctionAbstract

# La clase ReflectionMethod

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionMethod** proporciona
    información sobre un método.

## Sinopsis de la Clase

     class **ReflectionMethod**



     extends
      [ReflectionFunctionAbstract](#class.reflectionfunctionabstract)
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IS_STATIC](#reflectionmethod.constants.is-static);

    public
     const
     [int](#language.types.integer)
      [IS_PUBLIC](#reflectionmethod.constants.is-public);

    public
     const
     [int](#language.types.integer)
      [IS_PROTECTED](#reflectionmethod.constants.is-protected);

    public
     const
     [int](#language.types.integer)
      [IS_PRIVATE](#reflectionmethod.constants.is-private);

    public
     const
     [int](#language.types.integer)
      [IS_ABSTRACT](#reflectionmethod.constants.is-abstract);

    public
     const
     [int](#language.types.integer)
      [IS_FINAL](#reflectionmethod.constants.is-final);


    /* Propiedades */
    public
     [string](#language.types.string)
      [$class](#reflectionmethod.props.class);


    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$name](#reflectionfunctionabstract.props.name);


    /* Métodos */

public [\_\_construct](#reflectionmethod.construct)([object](#language.types.object)|[string](#language.types.string) $objectOrMethod, [string](#language.types.string) $method)
public [\_\_construct](#reflectionmethod.construct)([string](#language.types.string) $classMethod)

    public static [createFromMethodName](#reflectionmethod.createfrommethodname)([string](#language.types.string) $method): static

public static [export](#reflectionmethod.export)([string](#language.types.string) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)
public [getClosure](#reflectionmethod.getclosure)([?](#language.types.null)[object](#language.types.object) $object = **[null](#constant.null)**): [Closure](#class.closure)
public [getDeclaringClass](#reflectionmethod.getdeclaringclass)(): [ReflectionClass](#class.reflectionclass)
public [getModifiers](#reflectionmethod.getmodifiers)(): [int](#language.types.integer)
public [getPrototype](#reflectionmethod.getprototype)(): [ReflectionMethod](#class.reflectionmethod)
public [hasPrototype](#reflectionmethod.hasprototype)(): [bool](#language.types.boolean)
public [invoke](#reflectionmethod.invoke)([?](#language.types.null)[object](#language.types.object) $object, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public [invokeArgs](#reflectionmethod.invokeargs)([?](#language.types.null)[object](#language.types.object) $object, [array](#language.types.array) $args): [mixed](#language.types.mixed)
public [isAbstract](#reflectionmethod.isabstract)(): [bool](#language.types.boolean)
public [isConstructor](#reflectionmethod.isconstructor)(): [bool](#language.types.boolean)
public [isDestructor](#reflectionmethod.isdestructor)(): [bool](#language.types.boolean)
public [isFinal](#reflectionmethod.isfinal)(): [bool](#language.types.boolean)
public [isPrivate](#reflectionmethod.isprivate)(): [bool](#language.types.boolean)
public [isProtected](#reflectionmethod.isprotected)(): [bool](#language.types.boolean)
public [isPublic](#reflectionmethod.ispublic)(): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [setAccessible](#reflectionmethod.setaccessible)([bool](#language.types.boolean) $accessible): [void](language.types.void.html)
public [\_\_toString](#reflectionmethod.tostring)(): [string](#language.types.string)

    /* Métodos heredados */
    private [ReflectionFunctionAbstract::__clone](#reflectionfunctionabstract.clone)(): [void](language.types.void.html)

public [ReflectionFunctionAbstract::getAttributes](#reflectionfunctionabstract.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [ReflectionFunctionAbstract::getClosureCalledClass](#reflectionfunctionabstract.getclosurecalledclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [ReflectionFunctionAbstract::getClosureScopeClass](#reflectionfunctionabstract.getclosurescopeclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [ReflectionFunctionAbstract::getClosureThis](#reflectionfunctionabstract.getclosurethis)(): [?](#language.types.null)[object](#language.types.object)
public [ReflectionFunctionAbstract::getClosureUsedVariables](#reflectionfunctionabstract.getclosureusedvariables)(): [array](#language.types.array)
public [ReflectionFunctionAbstract::getDocComment](#reflectionfunctionabstract.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getEndLine](#reflectionfunctionabstract.getendline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getExtension](#reflectionfunctionabstract.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)
public [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getFileName](#reflectionfunctionabstract.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getName](#reflectionfunctionabstract.getname)(): [string](#language.types.string)
public [ReflectionFunctionAbstract::getNamespaceName](#reflectionfunctionabstract.getnamespacename)(): [string](#language.types.string)
public [ReflectionFunctionAbstract::getNumberOfParameters](#reflectionfunctionabstract.getnumberofparameters)(): [int](#language.types.integer)
public [ReflectionFunctionAbstract::getNumberOfRequiredParameters](#reflectionfunctionabstract.getnumberofrequiredparameters)(): [int](#language.types.integer)
public [ReflectionFunctionAbstract::getParameters](#reflectionfunctionabstract.getparameters)(): [array](#language.types.array)
public [ReflectionFunctionAbstract::getReturnType](#reflectionfunctionabstract.getreturntype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [ReflectionFunctionAbstract::getShortName](#reflectionfunctionabstract.getshortname)(): [string](#language.types.string)
public [ReflectionFunctionAbstract::getStartLine](#reflectionfunctionabstract.getstartline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionFunctionAbstract::getStaticVariables](#reflectionfunctionabstract.getstaticvariables)(): [array](#language.types.array)
public [ReflectionFunctionAbstract::getTentativeReturnType](#reflectionfunctionabstract.gettentativereturntype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [ReflectionFunctionAbstract::hasReturnType](#reflectionfunctionabstract.hasreturntype)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::hasTentativeReturnType](#reflectionfunctionabstract.hastentativereturntype)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::inNamespace](#reflectionfunctionabstract.innamespace)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isClosure](#reflectionfunctionabstract.isclosure)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isDeprecated](#reflectionfunctionabstract.isdeprecated)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isGenerator](#reflectionfunctionabstract.isgenerator)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isInternal](#reflectionfunctionabstract.isinternal)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isStatic](#reflectiofunctionabstract.isstatic)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isUserDefined](#reflectionfunctionabstract.isuserdefined)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::isVariadic](#reflectionfunctionabstract.isvariadic)(): [bool](#language.types.boolean)
public [ReflectionFunctionAbstract::returnsReference](#reflectionfunctionabstract.returnsreference)(): [bool](#language.types.boolean)
abstract public [ReflectionFunctionAbstract::\_\_toString](#reflectionfunctionabstract.tostring)(): [void](language.types.void.html)

}

## Propiedades

     name

      Nombre del método





     class

      Nombre de la clase




## Constantes predefinidas

    ## Modificadores de ReflectionMethod





       **[ReflectionMethod::IS_STATIC](#reflectionmethod.constants.is-static)**
       [int](#language.types.integer)



        Indica que el método es estático
        Anterior a PHP 7.4.0, el valor era 1.








       **[ReflectionMethod::IS_PUBLIC](#reflectionmethod.constants.is-public)**
       [int](#language.types.integer)



        Indica que el método es público
        Anterior a PHP 7.4.0, el valor era 256.








       **[ReflectionMethod::IS_PROTECTED](#reflectionmethod.constants.is-protected)**
       [int](#language.types.integer)



        Indica que el método es protegido
        Anterior a PHP 7.4.0, el valor era 512.








       **[ReflectionMethod::IS_PRIVATE](#reflectionmethod.constants.is-private)**
       [int](#language.types.integer)



        Indica que el método es privado
        Anterior a PHP 7.4.0, el valor era 1024.








       **[ReflectionMethod::IS_ABSTRACT](#reflectionmethod.constants.is-abstract)**
       [int](#language.types.integer)



        Indica que el método es abstracto
        Anterior a PHP 7.4.0, el valor era 2.








       **[ReflectionMethod::IS_FINAL](#reflectionmethod.constants.is-final)**
       [int](#language.types.integer)



        Indica que el método es final
        Anterior a PHP 7.4.0, el valor era 4.







    **Nota**:



      El valor de estas constantes puede cambiar entre versiones de PHP.
      Se recomienda siempre utilizar las constantes
      y no depender de los valores directamente.


## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       8.0.0

        [ReflectionMethod::export()](#reflectionmethod.export) ha sido eliminada.





# ReflectionMethod::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::\_\_construct — Construye un nuevo objeto ReflectionMethod

### Descripción

public **ReflectionMethod::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $objectOrMethod, [string](#language.types.string) $method)

Firma alternativa (no soportada con argumentos nombrados):

public **ReflectionMethod::\_\_construct**([string](#language.types.string) $classMethod)

**Advertencia**

    La firma alternativa está obsoleta a partir de PHP 8.4.0,
    utilice [ReflectionMethod::createFromMethodName()](#reflectionmethod.createfrommethodname)
    en su lugar.

Construye un nuevo objeto [ReflectionMethod](#class.reflectionmethod).

### Parámetros

     objectOrMethod


       Nombre de clase -o instancia de esta- que contiene el método.






     method


       Nombre del método.






     classMethod


       Nombre de clase y de método delimitados por ::.





### Errores/Excepciones

Se emite una [ReflectionException](#class.reflectionexception) si el método considerado no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionMethod::__construct()**

&lt;?php
class Counter
{
private static $c = 0;

    /**
     * Contador que se incrementa
     *
     * @final
     * @static
     * @access  public
     * @return  int
     */
    final public static function increment()
    {
        return ++self::$c;
    }

}

// Crea una nueva instancia de la clase ReflectionMethod
$method = new ReflectionMethod('Counter', 'increment');

// Muestra información
printf(
"===&gt; The %s%s%s%s%s%s%s method '%s' (which is %s)\n" .
" declared in %s\n" .
" lines %d to %d\n" .
" having the modifiers %d[%s]\n",
$method-&gt;isInternal() ? 'internal' : 'user-defined',
        $method-&gt;isAbstract() ? ' abstract' : '',
        $method-&gt;isFinal() ? ' final' : '',
        $method-&gt;isPublic() ? ' public' : '',
        $method-&gt;isPrivate() ? ' private' : '',
        $method-&gt;isProtected() ? ' protected' : '',
        $method-&gt;isStatic() ? ' static' : '',
        $method-&gt;getName(),
        $method-&gt;isConstructor() ? 'the constructor' : 'a regular method',
        $method-&gt;getFileName(),
        $method-&gt;getStartLine(),
        $method-&gt;getEndline(),
        $method-&gt;getModifiers(),
        implode(' ', Reflection::getModifierNames($method-&gt;getModifiers()))
);

// Muestra el comentario de documentación
printf("---&gt; Documentation:\n %s\n", var_export($method-&gt;getDocComment(), true));

// Muestra las variables estáticas, si existen
if ($statics= $method-&gt;getStaticVariables()) {
    printf("---&gt; Static variables: %s\n", var_export($statics, true));
}

// Invoca el método
printf("---&gt; Invocation results in: ");
var_dump($method-&gt;invoke(NULL));
?&gt;

    Resultado del ejemplo anterior es similar a:

===&gt; The user-defined final public static method 'increment' (which is a regular method)
declared in /Users/philip/cvs/phpdoc/test.php
lines 14 to 17
having the modifiers 261[final public static]
---&gt; Documentation:
'/\*\*
_ Contador que se incrementa
_
_ @final
_ @static
_ @access public
_ @return int
\*/'
---&gt; Invocation results in: int(1)

### Ver también

    - [ReflectionMethod::export()](#reflectionmethod.export) - Exportación de un método de reflexión

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionMethod::createFromMethodName

(PHP 8 &gt;= 8.3.0)

ReflectionMethod::createFromMethodName — Crear una nueva ReflectionMethod

### Descripción

public static **ReflectionMethod::createFromMethodName**([string](#language.types.string) $method): static

Crear una nueva [ReflectionMethod](#class.reflectionmethod).

### Parámetros

     method


       Nombre de la clase y del método delimitados por ::.





### Valores devueltos

Devuelve una nueva [ReflectionMethod](#class.reflectionmethod) en caso de éxito.

### Errores/Excepciones

Se lanza una [ReflectionException](#class.reflectionexception) si el método dado no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionMethod::createFromMethodName()**

&lt;?php

class Foo {
public function bar() {

    }

}

$methodInfo = ReflectionMethod::createFromMethodName("Foo::bar");
var_dump($methodInfo);
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionMethod)#1 (2) {
["name"]=&gt;
string(3) "bar"
["class"]=&gt;
string(3) "Foo"
}

# ReflectionMethod::export

(PHP 5, PHP 7)

ReflectionMethod::export — Exportación de un método de reflexión

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionMethod::export**([string](#language.types.string) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)

Exporta un objeto ReflectionMethod.

### Parámetros

     class


       El nombre de la clase.






     name


       El nombre del método.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

Si el parámetro return
está definido a **[true](#constant.true)**, la exportación será retornada en forma de [string](#language.types.string),
de lo contrario, **[null](#constant.null)** será retornado.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido eliminada.




      7.4.0

       Esta función está obsoleta.



### Ver también

    - [ReflectionMethod::__construct()](#reflectionmethod.construct) - Construye un nuevo objeto ReflectionMethod

    - [ReflectionMethod::__toString()](#reflectionmethod.tostring) - Devuelve una representación textual del método

# ReflectionMethod::getClosure

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionMethod::getClosure — Devuelve una función anónima creada dinámicamente para el método

### Descripción

public **ReflectionMethod::getClosure**([?](#language.types.null)[object](#language.types.object) $object = **[null](#constant.null)**): [Closure](#class.closure)

Crea una función anónima que llamará a este método.

### Parámetros

    object


      Prohibido para los métodos estáticos, requerido para los demás métodos.


### Valores devueltos

Devuelve un objeto [Closure](#class.closure) recién creado.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si object
es **[null](#constant.null)** pero el método no es estático.

Genera una [ReflectionException](#class.reflectionexception) si
object no es una instancia de la clase de la que
este método fue declarado.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       object ahora es nullable.



### Ver también

- [Sintaxis callable de primera clase](#functions.first_class_callable_syntax)

# ReflectionMethod::getDeclaringClass

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::getDeclaringClass — Obtiene la declaración de la clase del método reflejado

### Descripción

public **ReflectionMethod::getDeclaringClass**(): [ReflectionClass](#class.reflectionclass)

Obtiene la declaración de la clase del método reflejado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionClass](#class.reflectionclass) que representa la clase
a la que pertenece el método reflejado.

### Ejemplos

    **Ejemplo #1 Ejemplo para ReflectionMethod::getDeclaringClass()**

&lt;?php
class HelloWorld {

    protected function sayHelloTo($name) {
        return 'Hello ' . $name;
    }

}

$reflectionMethod = new ReflectionMethod(new HelloWorld(), 'sayHelloTo');
var_dump($reflectionMethod-&gt;getDeclaringClass());
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionClass)#2 (1) {
["name"]=&gt;
string(10) "HelloWorld"
}

### Ver también

    - [ReflectionMethod::isAbstract()](#reflectionmethod.isabstract) - Verifica si el método es abstracto

# ReflectionMethod::getModifiers

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::getModifiers — Obtiene los modificadores del método

### Descripción

public **ReflectionMethod::getModifiers**(): [int](#language.types.integer)

Devuelve un campo de bits de modificadores de acceso
para este método.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación numérica de los modificadores.
El significado actual de estos modificadores se describe en las
[constantes predefinidas](#reflectionmethod.constants.modifiers).

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionMethod::getModifiers()**

&lt;?php
class Testing
{
final public static function foo()
{
return;
}
public function bar()
{
return;
}
}

$foo = new ReflectionMethod('Testing', 'foo');

echo "Modificadores para el método foo():\n";
echo $foo-&gt;getModifiers() . "\n";
echo implode(' ', Reflection::getModifierNames($foo-&gt;getModifiers())) . "\n";

$bar = new ReflectionMethod('Testing', 'bar');

echo "Modificadores para el método bar():\n";
echo $bar-&gt;getModifiers() . "\n";
echo implode(' ', Reflection::getModifierNames($bar-&gt;getModifiers()));
?&gt;

    Resultado del ejemplo anterior es similar a:

Modificadores para el método foo():
49
final public static
Modificadores para el método bar():
1
public

### Ver también

    - [Reflection::getModifierNames()](#reflection.getmodifiernames) - Obtiene los nombres de los modificadores

# ReflectionMethod::getPrototype

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionMethod::getPrototype — Obtiene el prototipo del método (si existe)

### Descripción

public **ReflectionMethod::getPrototype**(): [ReflectionMethod](#class.reflectionmethod)

Devuelve el prototipo del método.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionMethod](#class.reflectionmethod) instancia del método.

### Errores/Excepciones

Se lanzará una excepción [ReflectionException](#class.reflectionexception)
si el método no posee un prototipo.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionMethod::getPrototype()**

&lt;?php
class Hello {

    public function sayHelloTo($name) {
        return 'Hello ' . $name;
    }

}
class HelloWorld extends Hello {

    public function sayHelloTo($name) {
        return 'Hello world: ' . $name;
    }

}

$reflectionMethod = new ReflectionMethod('HelloWorld', 'sayHelloTo');
var_dump($reflectionMethod-&gt;getPrototype());
?&gt;

    El ejemplo anterior mostrará:

object(ReflectionMethod)#2 (2) {
["name"]=&gt;
string(10) "sayHelloTo"
["class"]=&gt;
string(5) "Hello"
}

### Ver también

    - [ReflectionMethod::getModifiers()](#reflectionmethod.getmodifiers) - Obtiene los modificadores del método

    - [ReflectionMethod::hasPrototype()](#reflectionmethod.hasprototype) - Indica si el método tiene un prototipo

# ReflectionMethod::hasPrototype

(PHP 8 &gt;= 8.2.0)

ReflectionMethod::hasPrototype — Indica si el método tiene un prototipo

### Descripción

public **ReflectionMethod::hasPrototype**(): [bool](#language.types.boolean)

Indica si el método tiene un prototipo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el método tiene un prototipo, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionMethod::hasPrototype()**

&lt;?php

class Hello
{
public function sayHelloTo($name)
    {
        return 'Hello '.$name;
}
}

class HelloWorld extends Hello
{
public function sayHelloTo($name)
    {
        return 'Hello world: '.$name;
}
}
$reflectionMethod = new ReflectionMethod('HelloWorld', 'sayHelloTo');
var_dump($reflectionMethod-&gt;hasPrototype());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [ReflectionMethod::getPrototype()](#reflectionmethod.getprototype) - Obtiene el prototipo del método (si existe)

# ReflectionMethod::invoke

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::invoke — Invoca

### Descripción

public **ReflectionMethod::invoke**([?](#language.types.null)[object](#language.types.object) $object, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)

Invoca un método reflejado.

### Parámetros

     object


       El objeto sobre el cual invocar el método. Para los métodos estáticos, se debe
       pasar [null](#language.types.null) como argumento.






     args


       Argumentos a pasar al método.
       Esto acepta un número variable de argumentos que serán pasados al método.





### Valores devueltos

Retorna el resultado del método.

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si object
no es una instancia de la clase de la cual el método fue declarado.

Una [ReflectionException](#class.reflectionexception) si la invocación del método falla.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionMethod::invoke()**

&lt;?php
class HelloWorld {

    public function sayHelloTo($name) {
        return 'Hello ' . $name;
    }

}

$reflectionMethod = new ReflectionMethod('HelloWorld', 'sayHelloTo');
echo $reflectionMethod-&gt;invoke(new HelloWorld(), 'Mike');
?&gt;

    El ejemplo anterior mostrará:

Hello Mike

### Notas

**Nota**:

    **ReflectionMethod::invoke()** no puede ser utilizado
    cuando se esperan argumentos por referencia.
    [ReflectionMethod::invokeArgs()](#reflectionmethod.invokeargs) debe ser utilizado
    en su lugar (pasando las referencias en la lista de argumentos).

### Ver también

    - [ReflectionMethod::invokeArgs()](#reflectionmethod.invokeargs) - Invoca los argumentos

    - [__invoke()](#object.invoke)

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

# ReflectionMethod::invokeArgs

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionMethod::invokeArgs — Invoca los argumentos

### Descripción

public **ReflectionMethod::invokeArgs**([?](#language.types.null)[object](#language.types.object) $object, [array](#language.types.array) $args): [mixed](#language.types.mixed)

Invoca el método reflejado y le pasa los argumentos
en forma de array.

### Parámetros

     object


       El objeto sobre el cual invocar el método. Si el método es estático, puede
       pasarse [null](#language.types.null) para este argumento.






     args


       Los argumentos a pasar al método, en forma de array.





### Valores devueltos

Devuelve el resultado del método.

### Errores/Excepciones

Una [ReflectionException](#class.reflectionexception) si object
no es una instancia de la clase prevista para este método.

Una [ReflectionException](#class.reflectionexception) si la invocación del método
falla.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Las claves de args serán interpretadas
        como los nombres de los argumentos, en lugar de ser ignoradas silenciosamente.





### Ejemplos

    **Ejemplo #1 Ejemplo para ReflectionMethod::invokeArgs()**

&lt;?php
class HelloWorld {

    public function sayHelloTo($name) {
        return 'Hello ' . $name;
    }

}

$reflectionMethod = new ReflectionMethod('HelloWorld', 'sayHelloTo');
echo $reflectionMethod-&gt;invokeArgs(new HelloWorld(), array('Mike'));
?&gt;

    El ejemplo anterior mostrará:

Hello Mike

### Notas

**Nota**:

    Si la función tiene argumentos que necesitan ser
        referencias, entonces deben ser pasados por referencia en la lista de argumentos.

### Ver también

    - [ReflectionMethod::invoke()](#reflectionmethod.invoke) - Invoca

    - [__invoke()](#object.invoke)

    - [call_user_func_array()](#function.call-user-func-array) - Llama a una función de retorno con los argumentos agrupados en un array

# ReflectionMethod::isAbstract

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isAbstract — Verifica si el método es abstracto

### Descripción

public **ReflectionMethod::isAbstract**(): [bool](#language.types.boolean)

Verifica si el método es abstracto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es abstracto, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionMethod::getDeclaringClass()](#reflectionmethod.getdeclaringclass) - Obtiene la declaración de la clase del método reflejado

# ReflectionMethod::isConstructor

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isConstructor — Verifica si el método es un constructor

### Descripción

public **ReflectionMethod::isConstructor**(): [bool](#language.types.boolean)

Verifica si el método es un constructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es un constructor; **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionMethod::__construct()](#reflectionmethod.construct) - Construye un nuevo objeto ReflectionMethod

    - [ReflectionMethod::isAbstract()](#reflectionmethod.isabstract) - Verifica si el método es abstracto

    - [ReflectionMethod::isDestructor()](#reflectionmethod.isdestructor) - Verifica si el método es un destructor

# ReflectionMethod::isDestructor

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isDestructor — Verifica si el método es un destructor

### Descripción

public **ReflectionMethod::isDestructor**(): [bool](#language.types.boolean)

Verifica si el método es un destructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es un destructor, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionMethod::isConstructor()](#reflectionmethod.isconstructor) - Verifica si el método es un constructor

# ReflectionMethod::isFinal

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isFinal — Verifica si el método es final

### Descripción

public **ReflectionMethod::isFinal**(): [bool](#language.types.boolean)

Verifica si el método es final.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es final, **[false](#constant.false)** en caso contrario.

### Ver también

    - **ReflectionMethod::isStatic()**

# ReflectionMethod::isPrivate

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isPrivate — Verifica si el método es privado

### Descripción

public **ReflectionMethod::isPrivate**(): [bool](#language.types.boolean)

Verifica si el método es privado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es privado, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionMethod::isPublic()](#reflectionmethod.ispublic) - Verifica si el método es público

# ReflectionMethod::isProtected

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isProtected — Verifica si el método es protegido

### Descripción

public **ReflectionMethod::isProtected**(): [bool](#language.types.boolean)

Verifica si el método es protegido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es protegido, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionMethod::isPrivate()](#reflectionmethod.isprivate) - Verifica si el método es privado

# ReflectionMethod::isPublic

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::isPublic — Verifica si el método es público

### Descripción

public **ReflectionMethod::isPublic**(): [bool](#language.types.boolean)

Verifica si el método es público.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el método es estático, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionMethod::isPrivate()](#reflectionmethod.isprivate) - Verifica si el método es privado

# ReflectionMethod::setAccessible

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8)

ReflectionMethod::setAccessible — Define la accesibilidad del método

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **ReflectionMethod::setAccessible**([bool](#language.types.boolean) $accessible): [void](language.types.void.html)

Activa la invocación de métodos protegidos y privados mediante el método
[ReflectionMethod::invoke()](#reflectionmethod.invoke).

**Nota**:

    A partir de PHP 8.1.0, la llamada a este método no tiene ningún efecto; todas las propiedades son accesibles por defecto.

### Parámetros

     accessible


       **[true](#constant.true)** para permitir la accesibilidad, o **[false](#constant.false)**.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Definición de una clase simple**

&lt;?php
class MyClass
{
private function foo()
{
return 'bar';
}
}
$method = new ReflectionMethod("MyClass", "foo");
$method-&gt;setAccessible(true);
$obj = new MyClass();
echo $method-&gt;invoke($obj);
echo $obj-&gt;foo();
?&gt;

Resultado del ejemplo anterior es similar a:

bar
Fatal error: Uncaught Error: Call to private method MyClass::foo() from global scope in /in/qdaZS:16

### Ver también

    - [ReflectionMethod::isPrivate()](#reflectionmethod.isprivate) - Verifica si el método es privado

    - [ReflectionMethod::isProtected()](#reflectionmethod.isprotected) - Verifica si el método es protegido

# ReflectionMethod::\_\_toString

(PHP 5, PHP 7, PHP 8)

ReflectionMethod::\_\_toString — Devuelve una representación textual del método

### Descripción

public **ReflectionMethod::\_\_toString**(): [string](#language.types.string)

Obtiene una representación textual del método.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación textual de este objeto [ReflectionMethod](#class.reflectionmethod).

### Ejemplos

    **Ejemplo #1 ReflectionMethod::__toString()** ejemplo

&lt;?php
class HelloWorld {

    public function sayHelloTo($name) {
        return 'Hello ' . $name;
    }

}

$reflectionMethod = new ReflectionMethod(new HelloWorld(), 'sayHelloTo');
echo $reflectionMethod;
?&gt;

    El ejemplo anterior mostrará:

Method [ &lt;user&gt; método público sayHelloTo ] {
@@ /var/www/examples/reflection.php 16 - 18

- Parámetros [1] {
  Parámetro #0 [ &lt;required&gt; $name ]
  }
  }

### Ver también

    - [ReflectionMethod::export()](#reflectionmethod.export) - Exportación de un método de reflexión

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionMethod::\_\_construct](#reflectionmethod.construct) — Construye un nuevo objeto ReflectionMethod
- [ReflectionMethod::createFromMethodName](#reflectionmethod.createfrommethodname) — Crear una nueva ReflectionMethod
- [ReflectionMethod::export](#reflectionmethod.export) — Exportación de un método de reflexión
- [ReflectionMethod::getClosure](#reflectionmethod.getclosure) — Devuelve una función anónima creada dinámicamente para el método
- [ReflectionMethod::getDeclaringClass](#reflectionmethod.getdeclaringclass) — Obtiene la declaración de la clase del método reflejado
- [ReflectionMethod::getModifiers](#reflectionmethod.getmodifiers) — Obtiene los modificadores del método
- [ReflectionMethod::getPrototype](#reflectionmethod.getprototype) — Obtiene el prototipo del método (si existe)
- [ReflectionMethod::hasPrototype](#reflectionmethod.hasprototype) — Indica si el método tiene un prototipo
- [ReflectionMethod::invoke](#reflectionmethod.invoke) — Invoca
- [ReflectionMethod::invokeArgs](#reflectionmethod.invokeargs) — Invoca los argumentos
- [ReflectionMethod::isAbstract](#reflectionmethod.isabstract) — Verifica si el método es abstracto
- [ReflectionMethod::isConstructor](#reflectionmethod.isconstructor) — Verifica si el método es un constructor
- [ReflectionMethod::isDestructor](#reflectionmethod.isdestructor) — Verifica si el método es un destructor
- [ReflectionMethod::isFinal](#reflectionmethod.isfinal) — Verifica si el método es final
- [ReflectionMethod::isPrivate](#reflectionmethod.isprivate) — Verifica si el método es privado
- [ReflectionMethod::isProtected](#reflectionmethod.isprotected) — Verifica si el método es protegido
- [ReflectionMethod::isPublic](#reflectionmethod.ispublic) — Verifica si el método es público
- [ReflectionMethod::setAccessible](#reflectionmethod.setaccessible) — Define la accesibilidad del método
- [ReflectionMethod::\_\_toString](#reflectionmethod.tostring) — Devuelve una representación textual del método

# La clase ReflectionNamedType

(PHP 7 &gt;= 7.1.0, PHP 8)

## Introducción

## Sinopsis de la Clase

     class **ReflectionNamedType**



     extends
      [ReflectionType](#class.reflectiontype)
     {

    /* Métodos */

public [getName](#reflectionnamedtype.getname)(): [string](#language.types.string)
public [isBuiltin](#reflectionnamedtype.isbuiltin)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [ReflectionType::allowsNull](#reflectiontype.allowsnull)(): [bool](#language.types.boolean)

public [ReflectionType::\_\_toString](#reflectiontype.tostring)(): [string](#language.types.string)

}

# ReflectionNamedType::getName

(PHP 7 &gt;= 7.1.0, PHP 8)

ReflectionNamedType::getName — Obtiene el nombre del tipo como string

### Descripción

public **ReflectionNamedType::getName**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Obtiene el nombre del tipo que está siendo reflejado.

### Ver también

    - [ReflectionType::__toString()](#reflectiontype.tostring) - Conversión a string

# ReflectionNamedType::isBuiltin

(PHP 7, PHP 8)

ReflectionNamedType::isBuiltin — Verifica si es un tipo integrado

### Descripción

public **ReflectionNamedType::isBuiltin**(): [bool](#language.types.boolean)

Verifica si el tipo es un tipo integrado en PHP. Un tipo integrado es todo
tipo que no es una clase, interfaz o trait.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si es un tipo integrado en PHP, de lo contrario **[false](#constant.false)**

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionNamedType::isBuiltin()**

&lt;?php
class SomeClass {}

function someFunction(string $param, SomeClass $param2, stdClass $param3) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParams = $reflectionFunc-&gt;getParameters();

var_dump($reflectionParams[0]-&gt;getType()-&gt;isBuiltin());
var_dump($reflectionParams[1]-&gt;getType()-&gt;isBuiltin());
var_dump($reflectionParams[2]-&gt;getType()-&gt;isBuiltin());

    El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(false)

Se observa que el método **ReflectionNamedType::isBuiltin()**
no distingue entre clases internas y de usuario. Para realizar
esta distinción, debe utilizarse el método [ReflectionClass::isInternal()](#reflectionclass.isinternal)
sobre el nombre de clase devuelto.

### Ver también

    - [ReflectionType::allowsNull()](#reflectiontype.allowsnull) - Verifica si null es admitido

    - [ReflectionType::__toString()](#reflectiontype.tostring) - Conversión a string

    - [ReflectionClass::isInternal()](#reflectionclass.isinternal) - Verifica si una clase está definida como interna por una extensión

    - [ReflectionParameter::getType()](#reflectionparameter.gettype) - Obtiene el tipo del parámetro

## Tabla de contenidos

- [ReflectionNamedType::getName](#reflectionnamedtype.getname) — Obtiene el nombre del tipo como string
- [ReflectionNamedType::isBuiltin](#reflectionnamedtype.isbuiltin) — Verifica si es un tipo integrado

# La clase ReflectionObject

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionObject** proporciona
    información sobre un objeto.

## Sinopsis de la Clase

     class **ReflectionObject**



     extends
      [ReflectionClass](#class.reflectionclass)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [ReflectionClass::IS_IMPLICIT_ABSTRACT](#reflectionclass.constants.is-implicit-abstract);

public
const
[int](#language.types.integer)
[ReflectionClass::IS_EXPLICIT_ABSTRACT](#reflectionclass.constants.is-explicit-abstract);
public
const
[int](#language.types.integer)
[ReflectionClass::IS_FINAL](#reflectionclass.constants.is-final);
public
const
[int](#language.types.integer)
[ReflectionClass::IS_READONLY](#reflectionclass.constants.is-readonly);
public
const
[int](#language.types.integer)
[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize);
public
const
[int](#language.types.integer)
[ReflectionClass::SKIP_DESTRUCTOR](#reflectionclass.constants.skip-destructor);

    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$name](#reflectionclass.props.name);


    /* Métodos */

public [\_\_construct](#reflectionobject.construct)([object](#language.types.object) $object)

    /* Métodos heredados */
    public static [ReflectionClass::export](#reflectionclass.export)([mixed](#language.types.mixed) $argumento, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)

public [ReflectionClass::getAttributes](#reflectionclass.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [ReflectionClass::getConstant](#reflectionclass.getconstant)([string](#language.types.string) $name): [mixed](#language.types.mixed)
public [ReflectionClass::getConstants](#reflectionclass.getconstants)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getConstructor](#reflectionclass.getconstructor)(): [?](#language.types.null)[ReflectionMethod](#class.reflectionmethod)
public [ReflectionClass::getDefaultProperties](#reflectionclass.getdefaultproperties)(): [array](#language.types.array)
public [ReflectionClass::getDocComment](#reflectionclass.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClass::getEndLine](#reflectionclass.getendline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionClass::getExtension](#reflectionclass.getextension)(): [?](#language.types.null)[ReflectionExtension](#class.reflectionextension)
public [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClass::getFileName](#reflectionclass.getfilename)(): [string](#language.types.string)|[false](#language.types.singleton)
public [ReflectionClass::getInterfaceNames](#reflectionclass.getinterfacenames)(): [array](#language.types.array)
public [ReflectionClass::getInterfaces](#reflectionclass.getinterfaces)(): [array](#language.types.array)
public [ReflectionClass::getLazyInitializer](#reflectionclass.getlazyinitializer)([object](#language.types.object) $object): [?](#language.types.null)[callable](#language.types.callable)
public [ReflectionClass::getMethod](#reflectionclass.getmethod)([string](#language.types.string) $name): [ReflectionMethod](#class.reflectionmethod)
public [ReflectionClass::getMethods](#reflectionclass.getmethods)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getModifiers](#reflectionclass.getmodifiers)(): [int](#language.types.integer)
public [ReflectionClass::getName](#reflectionclass.getname)(): [string](#language.types.string)
public [ReflectionClass::getNamespaceName](#reflectionclass.getnamespacename)(): [string](#language.types.string)
public [ReflectionClass::getParentClass](#reflectionclass.getparentclass)(): [ReflectionClass](#class.reflectionclass)|[false](#language.types.singleton)
public [ReflectionClass::getProperties](#reflectionclass.getproperties)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getProperty](#reflectionclass.getproperty)([string](#language.types.string) $name): [ReflectionProperty](#class.reflectionproperty)
public [ReflectionClass::getReflectionConstant](#reflectionclass.getreflectionconstant)([string](#language.types.string) $name): [ReflectionClassConstant](#class.reflectionclassconstant)|[false](#language.types.singleton)
public [ReflectionClass::getReflectionConstants](#reflectionclass.getreflectionconstants)([?](#language.types.null)[int](#language.types.integer) $filter = **[null](#constant.null)**): [array](#language.types.array)
public [ReflectionClass::getShortName](#reflectionclass.getshortname)(): [string](#language.types.string)
public [ReflectionClass::getStartLine](#reflectionclass.getstartline)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ReflectionClass::getStaticProperties](#reflectionclass.getstaticproperties)(): [array](#language.types.array)
public [ReflectionClass::getStaticPropertyValue](#reflectionclass.getstaticpropertyvalue)([string](#language.types.string) $name, [mixed](#language.types.mixed) &amp;$def_value = ?): [mixed](#language.types.mixed)
public [ReflectionClass::getTraitAliases](#reflectionclass.gettraitaliases)(): [array](#language.types.array)
public [ReflectionClass::getTraitNames](#reflectionclass.gettraitnames)(): [array](#language.types.array)
public [ReflectionClass::getTraits](#reflectionclass.gettraits)(): [array](#language.types.array)
public [ReflectionClass::hasConstant](#reflectionclass.hasconstant)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [ReflectionClass::hasMethod](#reflectionclass.hasmethod)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [ReflectionClass::hasProperty](#reflectionclass.hasproperty)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [ReflectionClass::implementsInterface](#reflectionclass.implementsinterface)([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $interface): [bool](#language.types.boolean)
public [ReflectionClass::initializeLazyObject](#reflectionclass.initializelazyobject)([object](#language.types.object) $object): [object](#language.types.object)
public [ReflectionClass::inNamespace](#reflectionclass.innamespace)(): [bool](#language.types.boolean)
public [ReflectionClass::isAbstract](#reflectionclass.isabstract)(): [bool](#language.types.boolean)
public [ReflectionClass::isAnonymous](#reflectionclass.isanonymous)(): [bool](#language.types.boolean)
public [ReflectionClass::isCloneable](#reflectionclass.iscloneable)(): [bool](#language.types.boolean)
public [ReflectionClass::isEnum](#reflectionclass.isenum)(): [bool](#language.types.boolean)
public [ReflectionClass::isFinal](#reflectionclass.isfinal)(): [bool](#language.types.boolean)
public [ReflectionClass::isInstance](#reflectionclass.isinstance)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [ReflectionClass::isInstantiable](#reflectionclass.isinstantiable)(): [bool](#language.types.boolean)
public [ReflectionClass::isInterface](#reflectionclass.isinterface)(): [bool](#language.types.boolean)
public [ReflectionClass::isInternal](#reflectionclass.isinternal)(): [bool](#language.types.boolean)
public [ReflectionClass::isIterable](#reflectionclass.isiterable)(): [bool](#language.types.boolean)
public [ReflectionClass::isReadOnly](#reflectionclass.isreadonly)(): [bool](#language.types.boolean)
public [ReflectionClass::isSubclassOf](#reflectionclass.issubclassof)([ReflectionClass](#class.reflectionclass)|[string](#language.types.string) $class): [bool](#language.types.boolean)
public [ReflectionClass::isTrait](#reflectionclass.istrait)(): [bool](#language.types.boolean)
public [ReflectionClass::isUninitializedLazyObject](#reflectionclass.isuninitializedlazyobject)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [ReflectionClass::isUserDefined](#reflectionclass.isuserdefined)(): [bool](#language.types.boolean)
public [ReflectionClass::markLazyObjectAsInitialized](#reflectionclass.marklazyobjectasinitialized)([object](#language.types.object) $object): [object](#language.types.object)
public [ReflectionClass::newInstance](#reflectionclass.newinstance)([mixed](#language.types.mixed) ...$args): [object](#language.types.object)
public [ReflectionClass::newInstanceArgs](#reflectionclass.newinstanceargs)([array](#language.types.array) $args = []): [?](#language.types.null)[object](#language.types.object)
public [ReflectionClass::newInstanceWithoutConstructor](#reflectionclass.newinstancewithoutconstructor)(): [object](#language.types.object)
public [ReflectionClass::newLazyGhost](#reflectionclass.newlazyghost)([callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [object](#language.types.object)
public [ReflectionClass::newLazyProxy](#reflectionclass.newlazyproxy)([callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [object](#language.types.object)
public [ReflectionClass::resetAsLazyGhost](#reflectionclass.resetaslazyghost)([object](#language.types.object) $object, [callable](#language.types.callable) $initializer, [int](#language.types.integer) $options = 0): [void](language.types.void.html)
public [ReflectionClass::resetAsLazyProxy](#reflectionclass.resetaslazyproxy)([object](#language.types.object) $object, [callable](#language.types.callable) $factory, [int](#language.types.integer) $options = 0): [void](language.types.void.html)
public [ReflectionClass::setStaticPropertyValue](#reflectionclass.setstaticpropertyvalue)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [ReflectionClass::\_\_toString](#reflectionclass.tostring)(): [string](#language.types.string)

}

## Historial de cambios

       Versión
       Descripción






       8.0.0

        [ReflectionObject::export()](#reflectionobject.export) ha sido eliminada.





# ReflectionObject::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionObject::\_\_construct — Construye un nuevo objeto ReflectionObject

### Descripción

public **ReflectionObject::\_\_construct**([object](#language.types.object) $object)

Construye un nuevo objeto [ReflectionObject](#class.reflectionobject).

### Parámetros

     object


       Una instancia de un objeto.





### Ver también

    - [ReflectionObject::export()](#reflectionobject.export) - Exportación

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionObject::export

(PHP 5, PHP 7)

ReflectionObject::export — Exportación

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionObject::export**([string](#language.types.string) $argumento, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

Exporte una reflexión.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     argumento


       La reflexión a exportar.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

Si el parámetro return
está definido a **[true](#constant.true)**, la exportación será retornada en forma de [string](#language.types.string),
de lo contrario, **[null](#constant.null)** será retornado.

### Ver también

    - [ReflectionObject::__construct()](#reflectionobject.construct) - Construye un nuevo objeto ReflectionObject

## Tabla de contenidos

- [ReflectionObject::\_\_construct](#reflectionobject.construct) — Construye un nuevo objeto ReflectionObject
- [ReflectionObject::export](#reflectionobject.export) — Exportación

# La clase ReflectionParameter

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionParameter** recupera las
    informaciones sobre los argumentos de las funciones o de los métodos.




    Para realizar una introspección sobre los argumentos de las funciones, primero
    se crea una instancia de la clase [ReflectionFunction](#class.reflectionfunction)
    o de la clase [ReflectionMethod](#class.reflectionmethod) y luego se utiliza
    el método [ReflectionFunctionAbstract::getParameters()](#reflectionfunctionabstract.getparameters)
    para recuperar un array de los argumentos.

## Sinopsis de la Clase

     class **ReflectionParameter**



     implements
      [Reflector](#class.reflector) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$name](#reflectionparameter.props.name);


    /* Métodos */

public [\_\_construct](#reflectionparameter.construct)([string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object) $function, [int](#language.types.integer)|[string](#language.types.string) $param)

    public [allowsNull](#reflectionparameter.allowsnull)(): [bool](#language.types.boolean)

public [canBePassedByValue](#reflectionparameter.canbepassedbyvalue)(): [bool](#language.types.boolean)
private [\_\_clone](#reflectionparameter.clone)(): [void](language.types.void.html)
public static [export](#reflectionparameter.export)([string](#language.types.string) $function, [string](#language.types.string) $parameter, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)
public [getAttributes](#reflectionparameter.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
[#[\Deprecated]](class.deprecated.html)
public [getClass](#reflectionparameter.getclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [getDeclaringClass](#reflectionparameter.getdeclaringclass)(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)
public [getDeclaringFunction](#reflectionparameter.getdeclaringfunction)(): [ReflectionFunctionAbstract](#class.reflectionfunctionabstract)
public [getDefaultValue](#reflectionparameter.getdefaultvalue)(): [mixed](#language.types.mixed)
public [getDefaultValueConstantName](#reflectionparameter.getdefaultvalueconstantname)(): [?](#language.types.null)[string](#language.types.string)
public [getName](#reflectionparameter.getname)(): [string](#language.types.string)
public [getPosition](#reflectionparameter.getposition)(): [int](#language.types.integer)
public [getType](#reflectionparameter.gettype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [hasType](#reflectionparameter.hastype)(): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [isArray](#reflectionparameter.isarray)(): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [isCallable](#reflectionparameter.iscallable)(): [bool](#language.types.boolean)
public [isDefaultValueAvailable](#reflectionparameter.isdefaultvalueavailable)(): [bool](#language.types.boolean)
public [isDefaultValueConstant](#reflectionparameter.isdefaultvalueconstant)(): [bool](#language.types.boolean)
public [isOptional](#reflectionparameter.isoptional)(): [bool](#language.types.boolean)
public [isPassedByReference](#reflectionparameter.ispassedbyreference)(): [bool](#language.types.boolean)
public [isPromoted](#reflectionparameter.ispromoted)(): [bool](#language.types.boolean)
public [isVariadic](#reflectionparameter.isvariadic)(): [bool](#language.types.boolean)
public [\_\_toString](#reflectionparameter.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       Nombre del argumento. Solo lectura, genera
       [ReflectionException](#class.reflectionexception) al intentar escribir.





## Historial de cambios

       Versión
       Descripción






       8.0.0

        [ReflectionParameter::export()](#reflectionparameter.export) ha sido eliminado.





# ReflectionParameter::allowsNull

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::allowsNull — Verifica si el valor **[null](#constant.null)** está permitido como valor del argumento

### Descripción

public **ReflectionParameter::allowsNull**(): [bool](#language.types.boolean)

Verifica si el valor **[null](#constant.null)** está permitido como valor del argumento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el valor **[null](#constant.null)** está permitido como valor del argumento, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionParameter::isOptional()](#reflectionparameter.isoptional) - Verifica si el parámetro es opcional

# ReflectionParameter::canBePassedByValue

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionParameter::canBePassedByValue — Verifica si el parámetro puede ser pasado por valor

### Descripción

public **ReflectionParameter::canBePassedByValue**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el parámetro puede ser pasado por valor,
**[false](#constant.false)** en caso contrario.
Devuelve **[null](#constant.null)** si ocurre un error.

# ReflectionParameter::\_\_clone

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::\_\_clone — Clonación

### Descripción

private **ReflectionParameter::\_\_clone**(): [void](language.types.void.html)

Clonación.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método ya no es final.



### Ver también

    - **ReflectionParameter::toString()**

    - [La clonación de objetos](#language.oop5.cloning)

# ReflectionParameter::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::\_\_construct — Constructor

### Descripción

public **ReflectionParameter::\_\_construct**([string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object) $function, [int](#language.types.integer)|[string](#language.types.string) $param)

Construye una instancia [ReflectionParameter](#class.reflectionparameter).

### Parámetros

     function


       La función desde la cual los parámetros son reflejados.






     param


       Puede ser un [int](#language.types.integer) que especifica la posición del parámetro (comenzando por
       cero), o el nombre del parámetro como [string](#language.types.string).





### Ejemplos

    **Ejemplo #1 Ejemplo con [ReflectionParameter](#class.reflectionparameter)**

&lt;?php
function foo($a, $b, $c) { }
function bar(Exception $a, &amp;$b, $c) { }
function baz(ReflectionFunction $a, $b = 1, $c = null) { }
function abc() { }

$reflect = new ReflectionFunction('foo');

echo $reflect;

foreach ($reflect-&gt;getParameters() as $i =&gt; $param) {
    printf(
        "-- Parameter #%d: %s {\n".
        "   Class: %s\n".
        "   Allows NULL: %s\n".
        "   Passed to by reference: %s\n".
        "   Is optional?: %s\n".
        "}\n",
        $i, // $param-&gt;getPosition() can be used
        $param-&gt;getName(),
        var_export($param-&gt;getClass(), 1),
var_export($param-&gt;allowsNull(), 1),
        var_export($param-&gt;isPassedByReference(), 1),
$param-&gt;isOptional() ? 'yes' : 'no'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Function [ &lt;user&gt; function foo ] {
@@ /Users/philip/cvs/phpdoc/a 2 - 2

- Parameters [3] {
  Parameter #0 [ &lt;required&gt; $a ]
  Parameter #1 [ &lt;required&gt; $b ]
  Parameter #2 [ &lt;required&gt; $c ]
  }
  }
  -- Parameter #0: a {
  Class: NULL
  Allows NULL: true
  Passed to by reference: false
  Is optional?: no
  }
  -- Parameter #1: b {
  Class: NULL
  Allows NULL: true
  Passed to by reference: false
  Is optional?: no
  }
  -- Parameter #2: c {
  Class: NULL
  Allows NULL: true
  Passed to by reference: false
  Is optional?: no
  }

### Ver también

    - [ReflectionFunctionAbstract::getParameters()](#reflectionfunctionabstract.getparameters) - Obtiene los parámetros

    - [ReflectionFunction::__construct()](#reflectionfunction.construct) - Construye un nuevo objeto ReflectionFunction

    - [ReflectionMethod::__construct()](#reflectionmethod.construct) - Construye un nuevo objeto ReflectionMethod

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionParameter::export

(PHP 5, PHP 7)

ReflectionParameter::export — Exportación

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionParameter::export**([string](#language.types.string) $function, [string](#language.types.string) $parameter, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

Exportación.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     function


       El nombre de la función.






     parameter


       El nombre del parámetro.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

La reflexión exportada.

### Ver también

    - [ReflectionParameter::__toString()](#reflectionparameter.tostring) - Obtiene una representación textual

# ReflectionParameter::getAttributes

(PHP 8)

ReflectionParameter::getAttributes — Devuelve los atributos

### Descripción

public **ReflectionParameter::getAttributes**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Devuelve todos los atributos declarados en este parámetro en forma de un array de objetos [ReflectionAttribute](#class.reflectionattribute).

### Parámetros

name

Filtrar los resultados para incluir únicamente las instancias
de [ReflectionAttribute](#class.reflectionattribute) para los atributos correspondientes a este nombre de clase.

flags

Flags para determinar cómo filtrar los resultados, si name es proporcionado.

El valor por omisión es 0 que solo retornará los resultados
para los atributos que son de la clase name.

La única otra opción disponible es utilizar **[ReflectionAttribute::IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof)**,
que utilizará instanceof para el filtrado.

### Valores devueltos

Un array de atributos, en forma de objetos [ReflectionAttribute](#class.reflectionattribute).

### Ejemplos

    **Ejemplo #1 Uso básico**



     &lt;?php

#[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

function fruitBasket( #[Fruit] #[Red]
string $apple
) { }

$reflection = new ReflectionFunction('fruitBasket');
$parameter = $reflection-&gt;getParameters()[0];
$attributes = $parameter-&gt;getAttributes();
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:



     Array

(
[0] =&gt; Fruit
[1] =&gt; Red
)

    **Ejemplo #2 Resultados filtrados por nombre de clase**



     &lt;?php

#[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

function fruitBasket( #[Fruit] #[Red]
string $apple
) { }

$reflection = new ReflectionFunction('fruitBasket');
$parameter = $reflection-&gt;getParameters()[0];
$attributes = $parameter-&gt;getAttributes('Fruit');
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:



     Array

(
[0] =&gt; Fruit
)

    **Ejemplo #3 Resultados filtrados por nombre de clase, con herencia**



     &lt;?php

interface Color {
}

#[Attribute]
class Fruit {
}

#[Attribute]
class Red implements Color {
}

function fruitBasket( #[Fruit] #[Red]
string $apple
) { }

$reflection = new ReflectionFunction('fruitBasket');
$parameter = $reflection-&gt;getParameters()[0];
$attributes = $parameter-&gt;getAttributes('Color', ReflectionAttribute::IS_INSTANCEOF);
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:



     Array

(
[0] =&gt; Red
)

### Ver también

    - [ReflectionClass::getAttributes()](#reflectionclass.getattributes) - Recupera los atributos de una clase

    - [ReflectionClassConstant::getAttributes()](#reflectionclassconstant.getattributes) - Verifica los atributos

    - [ReflectionFunctionAbstract::getAttributes()](#reflectionfunctionabstract.getattributes) - Devuelve los atributos

    - [ReflectionProperty::getAttributes()](#reflectionproperty.getattributes) - Devuelve los atributos

# ReflectionParameter::getClass

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::getClass — Obtiene un objeto [ReflectionClass](#class.reflectionclass) para el parámetro que se está reflejando o **[null](#constant.null)**

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **ReflectionParameter::getClass**(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)

Obtiene un objeto [ReflectionClass](#class.reflectionclass) para el parámetro que se está reflejando o **[null](#constant.null)**.

A partir de PHP 8.0.0 esta función está obsoleta y no se recomienda.
En su lugar, debe utilizarse [ReflectionParameter::getType()](#reflectionparameter.gettype)
para obtener la [ReflectionType](#class.reflectiontype) de este parámetro
y luego interrogar este objeto para determinar el tipo del parámetro.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionClass](#class.reflectionclass), o **[null](#constant.null)** si no se declara ningún tipo,
o el tipo declarado no es una clase o interfaz.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de la clase [ReflectionParameter](#class.reflectionparameter)**

&lt;?php
function foo(Exception $a) { }

$functionReflection = new ReflectionFunction('foo');
$parameters = $functionReflection-&gt;getParameters();
$aParameter = $parameters[0];

echo $aParameter-&gt;getClass()-&gt;name;
?&gt;

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada en favor de
       [ReflectionParameter::getType()](#reflectionparameter.gettype).



### Ver también

    - [ReflectionParameter::getDeclaringClass()](#reflectionparameter.getdeclaringclass) - Obtiene la clase declarante

# ReflectionParameter::getDeclaringClass

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

ReflectionParameter::getDeclaringClass — Obtiene la clase declarante

### Descripción

public **ReflectionParameter::getDeclaringClass**(): [?](#language.types.null)[ReflectionClass](#class.reflectionclass)

Obtiene la clase declarante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionClass](#class.reflectionclass) o **[null](#constant.null)** si se llama sobre una función.

### Ejemplos

    **Ejemplo #1 Obtención de la clase que declaró el método**

&lt;?php
class Foo
{
public function bar(\DateTime $datetime)
{
}
}

class Baz extends Foo
{
}

$param = new \ReflectionParameter(['Baz', 'bar'], 0);

var_dump($param-&gt;getDeclaringClass());

    El ejemplo anterior mostrará:

object(ReflectionClass)#2 (1) {
["name"]=&gt;
string(3) "Foo"
}

### Ver también

    - [ReflectionParameter::getClass()](#reflectionparameter.getclass) - Obtiene un objeto ReflectionClass para el parámetro que se está reflejando o null

# ReflectionParameter::getDeclaringFunction

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

ReflectionParameter::getDeclaringFunction — Obtiene la función declarante

### Descripción

public **ReflectionParameter::getDeclaringFunction**(): [ReflectionFunctionAbstract](#class.reflectionfunctionabstract)

Obtiene la función declarante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionFunction](#class.reflectionfunction).

### Ver también

    - [ReflectionParameter::getDeclaringClass()](#reflectionparameter.getdeclaringclass) - Obtiene la clase declarante

# ReflectionParameter::getDefaultValue

(PHP 5 &gt;= 5.0.3, PHP 7, PHP 8)

ReflectionParameter::getDefaultValue — Obtiene el valor por defecto del argumento

### Descripción

public **ReflectionParameter::getDefaultValue**(): [mixed](#language.types.mixed)

Obtiene el valor por defecto del argumento de una función o método
definido en el espacio de nombres del usuario o interno. Si el argumento no es opcional,
se emitirá una excepción [ReflectionException](#class.reflectionexception).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor por defecto del argumento.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Este método permite ahora obtener el valor por defecto de
        funciones y métodos de clase integrados. Anteriormente,
        [ReflectionException](#class.reflectionexception) era emitido.





### Ejemplos

    **Ejemplo #1 Obtener los valores por defecto de los argumentos de la función**

&lt;?php
function foo($test, $bar = 'baz')
{
echo $test . $bar;
}

$function = new ReflectionFunction('foo');

foreach ($function-&gt;getParameters() as $param) {
    echo 'Nombre : ' . $param-&gt;getName() . PHP_EOL;
    if ($param-&gt;isOptional()) {
echo 'Valor por defecto : ' . $param-&gt;getDefaultValue() . PHP_EOL;
}
echo PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Nombre : test

Nombre : bar
Valor por defecto : baz

### Ver también

    - [ReflectionParameter::isOptional()](#reflectionparameter.isoptional) - Verifica si el parámetro es opcional

    - [ReflectionParameter::isDefaultValueAvailable()](#reflectionparameter.isdefaultvalueavailable) - Verifica si un valor por defecto está disponible para el parámetro

    - [ReflectionParameter::getDefaultValueConstantName()](#reflectionparameter.getdefaultvalueconstantname) - Devuelve el nombre de la constante del valor por defecto si el valor es una constante o null

    - [ReflectionParameter::isPassedByReference()](#reflectionparameter.ispassedbyreference) - Verifica si el parámetro es pasado por referencia

# ReflectionParameter::getDefaultValueConstantName

(PHP 5 &gt;= 5.4.6, PHP 7, PHP 8)

ReflectionParameter::getDefaultValueConstantName — Devuelve el nombre de la constante del valor por defecto si el valor es una constante o null

### Descripción

public **ReflectionParameter::getDefaultValueConstantName**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el nombre de la constante que sirve como valor por defecto a un parámetro de una
función o método definido por el usuario o interno, si el valor por defecto es constante o nulo.
Si el parámetro no es opcional, se lanzará una excepción de tipo
[ReflectionException](#class.reflectionexception).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) en caso de éxito, o **[null](#constant.null)** en caso de fallo.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Este método permite ahora recuperar el nombre de la constante del
        valor por defecto de funciones y métodos de clase integrados. Anteriormente,
        [ReflectionException](#class.reflectionexception) era emitido.





### Ejemplos

    **Ejemplo #1
     Recuperar los nombres de las constantes que sirven como valores por defecto a los parámetros de una función
    **

&lt;?php
function foo($test, $bar = PHP_INT_MIN)
{
echo $test . $bar;
}

$function = new ReflectionFunction('foo');

foreach ($function-&gt;getParameters() as $param) {
    echo 'Nombre : ' . $param-&gt;getName() . PHP_EOL;
    if ($param-&gt;isOptional()) {
echo 'Valor por defecto : ' . $param-&gt;getDefaultValueConstantName() . PHP_EOL;
}
echo PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Nombre : test

Nombre : bar
Valor por defecto : PHP_INT_MIN

### Ver también

    - [ReflectionParameter::isOptional()](#reflectionparameter.isoptional) - Verifica si el parámetro es opcional

    - [ReflectionParameter::isDefaultValueConstant()](#reflectionparameter.isdefaultvalueconstant) - Verifica si el valor por defecto del argumento es una constante

    - [ReflectionParameter::getDefaultValue()](#reflectionparameter.getdefaultvalue) - Obtiene el valor por defecto del argumento

# ReflectionParameter::getName

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::getName — Obtiene el nombre del argumento

### Descripción

public **ReflectionParameter::getName**(): [string](#language.types.string)

Obtiene el nombre del argumento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del argumento reflejado.

### Ver también

    - **ReflectionParameter::getValue()**

# ReflectionParameter::getPosition

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

ReflectionParameter::getPosition — Obtiene la posición de un argumento

### Descripción

public **ReflectionParameter::getPosition**(): [int](#language.types.integer)

Obtiene la posición de un argumento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La posición del argumento, desde la izquierda hacia la derecha, y
comenzando en la posición #0.

### Ver también

    - [ReflectionParameter::getName()](#reflectionparameter.getname) - Obtiene el nombre del argumento

# ReflectionParameter::getType

(PHP 7, PHP 8)

ReflectionParameter::getType — Obtiene el tipo del parámetro

### Descripción

public **ReflectionParameter::getType**(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)

Obtiene el tipo asociado de un parámetro.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [ReflectionType](#class.reflectiontype) si se especifica un tipo de
parámetro, **[null](#constant.null)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Uso de ReflectionParameter::getType()** a partir de PHP 7.1.0



     A partir de PHP 7.1.0, [ReflectionType::__toString()](#reflectiontype.tostring) está obsoleto, y
     **ReflectionParameter::getType()** *puede* devolver una
     instancia de [ReflectionNamedType](#class.reflectionnamedtype). Para obtener el nombre del tipo de parámetro,
     **ReflectionNamedType()** está disponible en este caso.

&lt;?php
function someFunction(int $param, $param2) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParams = $reflectionFunc-&gt;getParameters();
$reflectionType1 = $reflectionParams[0]-&gt;getType();
$reflectionType2 = $reflectionParams[1]-&gt;getType();

assert($reflectionType1 instanceof ReflectionNamedType);
echo $reflectionType1-&gt;getName(), PHP_EOL;
var_dump($reflectionType2);
?&gt;

    El ejemplo anterior mostrará:

int
NULL

    **Ejemplo #2 Uso de ReflectionParameter::getType()** anterior a PHP 7.1.0

&lt;?php
function someFunction(int $param, $param2) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParams = $reflectionFunc-&gt;getParameters();
$reflectionType1 = $reflectionParams[0]-&gt;getType();
$reflectionType2 = $reflectionParams[1]-&gt;getType();

echo $reflectionType1, PHP_EOL;
var_dump($reflectionType2);
?&gt;

    Resultado del ejemplo anterior en PHP 7.0:

int
NULL

    **Ejemplo #3 Uso de ReflectionParameter::getType()** en PHP 8.0.0 y posteriores



     A partir de PHP 8.0.0, este método puede devolver una instancia de
     [ReflectionNamedType](#class.reflectionnamedtype) o de [ReflectionUnionType](#class.reflectionuniontype).
     Lo siguiente es una colección del primero. Para analizar un tipo,
     es a menudo práctico normalizarlo en un array de objetos
     [ReflectionNamedType](#class.reflectionnamedtype). La función siguiente devolverá
     un array de 0 o más instancias de
     [ReflectionNamedType](#class.reflectionnamedtype)

&lt;?php
function getAllTypes(ReflectionParameter $reflectionParameter): array
{
$reflectionType = $reflectionParameter-&gt;getType();

    if (!$reflectionType) return [];

    return $reflectionType instanceof ReflectionUnionType
        ? $reflectionType-&gt;getTypes()
        : [$reflectionType];

}
?&gt;

### Ver también

    - [ReflectionParameter::hasType()](#reflectionparameter.hastype) - Verifica si un parámetro tiene un tipo

    - [ReflectionType::__toString()](#reflectiontype.tostring) - Conversión a string

# ReflectionParameter::hasType

(PHP 7, PHP 8)

ReflectionParameter::hasType — Verifica si un parámetro tiene un tipo

### Descripción

public **ReflectionParameter::hasType**(): [bool](#language.types.boolean)

Verifica si el parámetro tiene un tipo asociado con este.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si se especifica un tipo, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionParameter::hasType()**

&lt;?php
function someFunction(string $param, $param2 = null) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParams = $reflectionFunc-&gt;getParameters();

var_dump($reflectionParams[0]-&gt;hasType());
var_dump($reflectionParams[1]-&gt;hasType());

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

### Ver también

    - [ReflectionParameter::getType()](#reflectionparameter.gettype) - Obtiene el tipo del parámetro

# ReflectionParameter::isArray

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

ReflectionParameter::isArray — Verifica si el parámetro espera un array

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

Ver el ejemplo a continuación para un método alternativo para obtener esta información.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **ReflectionParameter::isArray**(): [bool](#language.types.boolean)

Verifica si el parámetro espera un array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el parámetro espera un array, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada en favor del método
       [ReflectionParameter::getType()](#reflectionparameter.gettype).



### Ejemplos

    **Ejemplo #1 Equivalente en PHP 8.0.0**



     A partir de PHP 8.0.0, el siguiente código indica si un tipo soporta
     arrays, incluyendo aquellos que forman parte de una unión.

&lt;?php
function declaresArray(ReflectionParameter $reflectionParameter): bool
{
$reflectionType = $reflectionParameter-&gt;getType();

    if (!$reflectionType) return false;

    $types = $reflectionType instanceof ReflectionUnionType
        ? $reflectionType-&gt;getTypes()
        : [$reflectionType];

return in_array('array', array_map(fn(ReflectionNamedType $t) =&gt; $t-&gt;getName(), $types));
}
?&gt;

### Ver también

    - [ReflectionParameter::isOptional()](#reflectionparameter.isoptional) - Verifica si el parámetro es opcional

# ReflectionParameter::isCallable

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

ReflectionParameter::isCallable — Verifica si el parámetro es de tipo [callable](#language.types.callable)

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

Ver el ejemplo a continuación para un método alternativo para obtener esta información.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **ReflectionParameter::isCallable**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si el parámetro es de tipo [callable](#language.types.callable), **[false](#constant.false)**
si no lo es, o **[null](#constant.null)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ahora está obsoleta, reemplazada por
       [ReflectionParameter::getType()](#reflectionparameter.gettype).



### Ejemplos

    **Ejemplo #1 Equivalente PHP 8.0.0**



     A partir de PHP 8.0.0, el siguiente código indicará si un tipo soporta
     callables, incluyendo aquellos que forman parte de una unión.

&lt;?php
function declaresCallable(ReflectionParameter $reflectionParameter): bool
{
$reflectionType = $reflectionParameter-&gt;getType();

    if (!$reflectionType) return false;

    $types = $reflectionType instanceof ReflectionUnionType
        ? $reflectionType-&gt;getTypes()
        : [$reflectionType];

return in_array('callable', array_map(fn(ReflectionNamedType $t) =&gt; $t-&gt;getName(), $types));
}
?&gt;

# ReflectionParameter::isDefaultValueAvailable

(PHP 5 &gt;= 5.0.3, PHP 7, PHP 8)

ReflectionParameter::isDefaultValueAvailable — Verifica si un valor por defecto está disponible para el parámetro

### Descripción

public **ReflectionParameter::isDefaultValueAvailable**(): [bool](#language.types.boolean)

Verifica si un valor por defecto está disponible para el parámetro.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si un valor por defecto está disponible para el parámetro, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionParameter::getDefaultValue()](#reflectionparameter.getdefaultvalue) - Obtiene el valor por defecto del argumento

    - [ReflectionParameter::isDefaultValueConstant()](#reflectionparameter.isdefaultvalueconstant) - Verifica si el valor por defecto del argumento es una constante

    - [ReflectionParameter::getName()](#reflectionparameter.getname) - Obtiene el nombre del argumento

# ReflectionParameter::isDefaultValueConstant

(PHP 5 &gt;= 5.4.6, PHP 7, PHP 8)

ReflectionParameter::isDefaultValueConstant — Verifica si el valor por defecto del argumento es una constante

### Descripción

public **ReflectionParameter::isDefaultValueConstant**(): [bool](#language.types.boolean)

Verifica si el valor por defecto del argumento es una constante

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el valor por defecto es una constante, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionParameter::getDefaultValueConstantName()](#reflectionparameter.getdefaultvalueconstantname) - Devuelve el nombre de la constante del valor por defecto si el valor es una constante o null

    - [ReflectionParameter::isDefaultValueAvailable()](#reflectionparameter.isdefaultvalueavailable) - Verifica si un valor por defecto está disponible para el parámetro

# ReflectionParameter::isOptional

(PHP 5 &gt;= 5.0.3, PHP 7, PHP 8)

ReflectionParameter::isOptional — Verifica si el parámetro es opcional

### Descripción

public **ReflectionParameter::isOptional**(): [bool](#language.types.boolean)

Verifica si el parámetro es opcional.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el parámetro es opcional, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionParameter::getName()](#reflectionparameter.getname) - Obtiene el nombre del argumento

# ReflectionParameter::isPassedByReference

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::isPassedByReference — Verifica si el parámetro es pasado por referencia

### Descripción

public **ReflectionParameter::isPassedByReference**(): [bool](#language.types.boolean)

Verifica si el parámetro es pasado por referencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el parámetro es pasado por referencia, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionParameter::getName()](#reflectionparameter.getname) - Obtiene el nombre del argumento

# ReflectionParameter::isPromoted

(PHP 8)

ReflectionParameter::isPromoted — Verifica si un parámetro es promovido como propiedad

### Descripción

public **ReflectionParameter::isPromoted**(): [bool](#language.types.boolean)

Verifica si el parámetro es
[promovido](#language.oop5.decon.constructor.promotion)
como propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el parámetro es promovido como propiedad, **[false](#constant.false)** en caso contrario.

### Ver también

- [ReflectionProperty::isPromoted()](#reflectionproperty.ispromoted) - Verifica si la propiedad está promovida

# ReflectionParameter::isVariadic

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

ReflectionParameter::isVariadic — Verifica si el parámetro es variádico

### Descripción

public **ReflectionParameter::isVariadic**(): [bool](#language.types.boolean)

Verifica si el parámetro ha sido declarado como un
[parámetro variádico](#functions.variable-arg-list).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el parámetro es variádico, **[false](#constant.false)** en caso contrario.

# ReflectionParameter::\_\_toString

(PHP 5, PHP 7, PHP 8)

ReflectionParameter::\_\_toString — Obtiene una representación textual

### Descripción

public **ReflectionParameter::\_\_toString**(): [string](#language.types.string)

Obtiene una representación textual del parámetro.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La cadena.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionParameter::__toString()**

&lt;?php
echo new ReflectionParameter('substr', 0);
?&gt;

    Resultado del ejemplo anterior es similar a:

Parameter #0 [ &lt;required&gt; string $string ]

### Ver también

    - [ReflectionFunction::__toString()](#reflectionfunction.tostring) - Devuelve una representación textual del objeto ReflectionFunction

    - [ReflectionMethod::__toString()](#reflectionmethod.tostring) - Devuelve una representación textual del método

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionParameter::allowsNull](#reflectionparameter.allowsnull) — Verifica si el valor null está permitido como valor del argumento
- [ReflectionParameter::canBePassedByValue](#reflectionparameter.canbepassedbyvalue) — Verifica si el parámetro puede ser pasado por valor
- [ReflectionParameter::\_\_clone](#reflectionparameter.clone) — Clonación
- [ReflectionParameter::\_\_construct](#reflectionparameter.construct) — Constructor
- [ReflectionParameter::export](#reflectionparameter.export) — Exportación
- [ReflectionParameter::getAttributes](#reflectionparameter.getattributes) — Devuelve los atributos
- [ReflectionParameter::getClass](#reflectionparameter.getclass) — Obtiene un objeto ReflectionClass para el parámetro que se está reflejando o null
- [ReflectionParameter::getDeclaringClass](#reflectionparameter.getdeclaringclass) — Obtiene la clase declarante
- [ReflectionParameter::getDeclaringFunction](#reflectionparameter.getdeclaringfunction) — Obtiene la función declarante
- [ReflectionParameter::getDefaultValue](#reflectionparameter.getdefaultvalue) — Obtiene el valor por defecto del argumento
- [ReflectionParameter::getDefaultValueConstantName](#reflectionparameter.getdefaultvalueconstantname) — Devuelve el nombre de la constante del valor por defecto si el valor es una constante o null
- [ReflectionParameter::getName](#reflectionparameter.getname) — Obtiene el nombre del argumento
- [ReflectionParameter::getPosition](#reflectionparameter.getposition) — Obtiene la posición de un argumento
- [ReflectionParameter::getType](#reflectionparameter.gettype) — Obtiene el tipo del parámetro
- [ReflectionParameter::hasType](#reflectionparameter.hastype) — Verifica si un parámetro tiene un tipo
- [ReflectionParameter::isArray](#reflectionparameter.isarray) — Verifica si el parámetro espera un array
- [ReflectionParameter::isCallable](#reflectionparameter.iscallable) — Verifica si el parámetro es de tipo callable
- [ReflectionParameter::isDefaultValueAvailable](#reflectionparameter.isdefaultvalueavailable) — Verifica si un valor por defecto está disponible para el parámetro
- [ReflectionParameter::isDefaultValueConstant](#reflectionparameter.isdefaultvalueconstant) — Verifica si el valor por defecto del argumento es una constante
- [ReflectionParameter::isOptional](#reflectionparameter.isoptional) — Verifica si el parámetro es opcional
- [ReflectionParameter::isPassedByReference](#reflectionparameter.ispassedbyreference) — Verifica si el parámetro es pasado por referencia
- [ReflectionParameter::isPromoted](#reflectionparameter.ispromoted) — Verifica si un parámetro es promovido como propiedad
- [ReflectionParameter::isVariadic](#reflectionparameter.isvariadic) — Verifica si el parámetro es variádico
- [ReflectionParameter::\_\_toString](#reflectionparameter.tostring) — Obtiene una representación textual

# La clase ReflectionProperty

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **ReflectionProperty** proporciona
    información sobre las propiedades de las clases.

## Sinopsis de la Clase

     class **ReflectionProperty**



     implements
      [Reflector](#class.reflector) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IS_STATIC](#reflectionproperty.constants.is-static);

    public
     const
     [int](#language.types.integer)
      [IS_READONLY](#reflectionproperty.constants.is-readonly);

    public
     const
     [int](#language.types.integer)
      [IS_PUBLIC](#reflectionproperty.constants.is-public);

    public
     const
     [int](#language.types.integer)
      [IS_PROTECTED](#reflectionproperty.constants.is-protected);

    public
     const
     [int](#language.types.integer)
      [IS_PRIVATE](#reflectionproperty.constants.is-private);


     public
     const
     [int](#language.types.integer)
      [IS_ABSTRACT](#reflectionproperty.constants.is-abstract);

    public
     const
     [int](#language.types.integer)
      [IS_PROTECTED_SET](#reflectionproperty.constants.is-protected-set);

    public
     const
     [int](#language.types.integer)
      [IS_PRIVATE_SET](#reflectionproperty.constants.is-private-set);

    public
     const
     [int](#language.types.integer)
      [IS_VIRTUAL](#reflectionproperty.constants.is-virtual);

    public
     const
     [int](#language.types.integer)
      [IS_FINAL](#reflectionproperty.constants.is-final);


    /* Propiedades */
    public
     [string](#language.types.string)
      [$name](#reflectionproperty.props.name);

    public
     [string](#language.types.string)
      [$class](#reflectionproperty.props.class);


    /* Métodos */

public [\_\_construct](#reflectionproperty.construct)([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $property)

    private [__clone](#reflectionproperty.clone)(): [void](language.types.void.html)

public static [export](#reflectionproperty.export)([mixed](#language.types.mixed) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)
public [getAttributes](#reflectionproperty.getattributes)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)
public [getDeclaringClass](#reflectionproperty.getdeclaringclass)(): [ReflectionClass](#class.reflectionclass)
public [getDefaultValue](#reflectionproperty.getdefaultvalue)(): [mixed](#language.types.mixed)
public [getDocComment](#reflectionproperty.getdoccomment)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getHook](#reflectionproperty.gethook)([PropertyHookType](#enum.propertyhooktype) $type): [?](#language.types.null)[ReflectionMethod](#class.reflectionmethod)
public [getHooks](#reflectionproperty.gethooks)(): [array](#language.types.array)
public [getModifiers](#reflectionproperty.getmodifiers)(): [int](#language.types.integer)
public [getName](#reflectionproperty.getname)(): [string](#language.types.string)
public [getRawValue](#reflectionproperty.getrawvalue)([object](#language.types.object) $object): [mixed](#language.types.mixed)
public [getSettableType](#reflectionproperty.getsettabletype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [getType](#reflectionproperty.gettype)(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)
public [getValue](#reflectionproperty.getvalue)([?](#language.types.null)[object](#language.types.object) $object = **[null](#constant.null)**): [mixed](#language.types.mixed)
public [hasDefaultValue](#reflectionproperty.hasdefaultvalue)(): [bool](#language.types.boolean)
public [hasHook](#reflectionproperty.hashook)([PropertyHookType](#enum.propertyhooktype) $type): [bool](#language.types.boolean)
public [hasHooks](#reflectionproperty.hashooks)(): [bool](#language.types.boolean)
public [hasType](#reflectionproperty.hastype)(): [bool](#language.types.boolean)
public [isAbstract](#reflectionproperty.isabstract)(): [bool](#language.types.boolean)
public [isDefault](#reflectionproperty.isdefault)(): [bool](#language.types.boolean)
public [isDynamic](#reflectionproperty.isdynamic)(): [bool](#language.types.boolean)
public [isFinal](#reflectionproperty.isfinal)(): [bool](#language.types.boolean)
public [isInitialized](#reflectionproperty.isinitialized)([?](#language.types.null)[object](#language.types.object) $object = **[null](#constant.null)**): [bool](#language.types.boolean)
public [isLazy](#reflectionproperty.islazy)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [isPrivate](#reflectionproperty.isprivate)(): [bool](#language.types.boolean)
public [isPrivateSet](#reflectionproperty.isprivateset)(): [bool](#language.types.boolean)
public [isPromoted](#reflectionproperty.ispromoted)(): [bool](#language.types.boolean)
public [isProtected](#reflectionproperty.isprotected)(): [bool](#language.types.boolean)
public [isProtectedSet](#reflectionproperty.isprotectedset)(): [bool](#language.types.boolean)
public [isPublic](#reflectionproperty.ispublic)(): [bool](#language.types.boolean)
public [isReadOnly](#reflectionproperty.isreadonly)(): [bool](#language.types.boolean)
public [isStatic](#reflectionproperty.isstatic)(): [bool](#language.types.boolean)
public [isVirtual](#reflectionproperty.isvirtual)(): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [setAccessible](#reflectionproperty.setaccessible)([bool](#language.types.boolean) $accessible): [void](language.types.void.html)
public [setRawValue](#reflectionproperty.setrawvalue)([object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [setRawValueWithoutLazyInitialization](#reflectionproperty.setrawvaluewithoutlazyinitialization)([object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [setValue](#reflectionproperty.setvalue)([object](#language.types.object) $object, [?](#language.types.null)[object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [skipLazyInitialization](#reflectionproperty.skiplazyinitialization)([object](#language.types.object) $object): [void](language.types.void.html)
public [\_\_toString](#reflectionproperty.tostring)(): [string](#language.types.string)

}

## Propiedades

     name


       Nombre de la propiedad. Solo lectura, lanza una
       [ReflectionException](#class.reflectionexception) al intentar escribir.






     class


       Nombre de la clase donde se definió la propiedad. Solo lectura, lanza una
       [ReflectionException](#class.reflectionexception) al intentar escribir.





## Constantes predefinidas

    ## Modificadores de ReflectionProperty





       **[ReflectionProperty::IS_STATIC](#reflectionproperty.constants.is-static)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [static](#language.oop5.static).
        Anterior a PHP 7.4.0, el valor era 1.








       **[ReflectionProperty::IS_READONLY](#reflectionproperty.constants.is-readonly)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [readonly](#language.oop5.properties.readonly-properties).
        Disponible a partir de PHP 8.1.0.








       **[ReflectionProperty::IS_PUBLIC](#reflectionproperty.constants.is-public)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [pública](#language.oop5.visibility).
        Anterior a PHP 7.4.0, el valor era 256.








       **[ReflectionProperty::IS_PROTECTED](#reflectionproperty.constants.is-protected)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [protegida](#language.oop5.visibility).
        Anterior a PHP 7.4.0, el valor era 512.








       **[ReflectionProperty::IS_PRIVATE](#reflectionproperty.constants.is-private)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [privada](#language.oop5.visibility).
        Anterior a PHP 7.4.0, el valor era 1024.








       **[ReflectionProperty::IS_ABSTRACT](#reflectionproperty.constants.is-abstract)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [abstracta](#language.oop5.abstract).
        Disponible a partir de PHP 8.4.0.






       **[ReflectionProperty::IS_PROTECTED_SET](#reflectionproperty.constants.is-protected-set)**
       [int](#language.types.integer)



        Disponible a partir de PHP 8.4.0.






       **[ReflectionProperty::IS_PRIVATE_SET](#reflectionproperty.constants.is-private-set)**
       [int](#language.types.integer)



        Disponible a partir de PHP 8.4.0.






       **[ReflectionProperty::IS_VIRTUAL](#reflectionproperty.constants.is-virtual)**
       [int](#language.types.integer)



        Disponible a partir de PHP 8.4.0.






       **[ReflectionProperty::IS_FINAL](#reflectionproperty.constants.is-final)**
       [int](#language.types.integer)



        Indica que la propiedad es
        [final](#language.oop5.final).
        Disponible a partir de PHP 8.4.0.





    **Nota**:



      El valor de estas constantes puede cambiar entre versiones de PHP.
      Se recomienda siempre utilizar las constantes
      y no depender de los valores directamente.


## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       8.4.0

        Se añadieron **[ReflectionProperty::IS_VIRTUAL](#reflectionproperty.constants.is-virtual)**,
        **[ReflectionProperty::IS_PRIVATE_SET](#reflectionproperty.constants.is-private-set)**,
        **[ReflectionProperty::IS_PROTECTED_SET](#reflectionproperty.constants.is-protected-set)**,
        **[ReflectionProperty::IS_ABSTRACT](#reflectionproperty.constants.is-abstract)**,
        y **[ReflectionProperty::IS_FINAL](#reflectionproperty.constants.is-final)**.




       8.0.0

        [ReflectionProperty::export()](#reflectionproperty.export) ha sido eliminada.





# ReflectionProperty::\_\_clone

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::\_\_clone — Clonación

### Descripción

private **ReflectionProperty::\_\_clone**(): [void](language.types.void.html)

Clonación.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método ya no es final.



### Ver también

    - [ReflectionProperty::export()](#reflectionproperty.export) - Exporta

    - [Clonación de objetos](#language.oop5.cloning)

# ReflectionProperty::\_\_construct

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::\_\_construct — Construye un nuevo objeto ReflectionProperty

### Descripción

public **ReflectionProperty::\_\_construct**([object](#language.types.object)|[string](#language.types.string) $class, [string](#language.types.string) $property)

### Parámetros

     class


       Puede ser un string que contenga el nombre de la clase a introspeccionar,
       o un objeto.






     property


       El nombre de la propiedad a reflejar.





### Errores/Excepciones

Intentar recuperar o definir el valor de una propiedad
privada o protegida de una clase emitirá una excepción.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionProperty::__construct()**

&lt;?php

class Str
{
public $length = 5;
}

// Creación de una instancia de la clase ReflectionProperty
$prop = new ReflectionProperty('Str', 'length');

// Mostrar algunas informaciones
printf(
"===&gt; La%s%s%s%s propiedad '%s' (que fue %s)\n" .
" con los modificadores %s\n",
$prop-&gt;isPublic() ? ' pública' : '',
        $prop-&gt;isPrivate() ? ' privada' : '',
        $prop-&gt;isProtected() ? ' protegida' : '',
        $prop-&gt;isStatic() ? ' estática' : '',
        $prop-&gt;getName(),
        $prop-&gt;isDefault() ? 'declarada en tiempo de compilación' : 'creada en tiempo de ejecución',
        var_export(Reflection::getModifierNames($prop-&gt;getModifiers()), true)
);

// Creación de una instancia de Str
$obj= new Str();

// Obtiene el valor actual
printf("---&gt; Value is: ");
var_dump($prop-&gt;getValue($obj));

// Modifica el valor
$prop-&gt;setValue($obj, 10);
printf("---&gt; Setting value to 10, new value is: ");
var_dump($prop-&gt;getValue($obj));

// Muestra el objeto
var_dump($obj);

?&gt;

    Resultado del ejemplo anterior es similar a:

===&gt; La pública propiedad 'length' (que fue declarada en tiempo de compilación)
con los modificadores array (
0 =&gt; 'public',
)
---&gt; Value is: int(5)
---&gt; Setting value to 10, new value is: int(10)
object(Str)#2 (1) {
["length"]=&gt;
int(10)
}

    **Ejemplo #2 Obtención de un valor desde una propiedad privada o protegida utilizando la clase [ReflectionProperty](#class.reflectionproperty)**

&lt;?php

class Foo
{
public $x = 1;
protected $y = 2;
private $z = 3;
}

$obj = new Foo;

$prop = new ReflectionProperty('Foo', 'y');
$prop-&gt;setAccessible(true);
var_dump($prop-&gt;getValue($obj)); // int(2)

$prop = new ReflectionProperty('Foo', 'z');
$prop-&gt;setAccessible(true);
var_dump($prop-&gt;getValue($obj)); // int(2)

?&gt;

    Resultado del ejemplo anterior es similar a:

int(2)
int(3)

### Ver también

    - [ReflectionProperty::getName()](#reflectionproperty.getname) - Obtiene el nombre de la propiedad

    - [Los constructores](#language.oop5.decon.constructor)

# ReflectionProperty::export

(PHP 5, PHP 7)

ReflectionProperty::export — Exporta

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **ReflectionProperty::export**([mixed](#language.types.mixed) $class, [string](#language.types.string) $name, [bool](#language.types.boolean) $return = ?): [string](#language.types.string)

Exporta una reflexión.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     argumento


       La reflexión a exportar.






     name


       El nombre de la propiedad.






     return


       Definirlo a **[true](#constant.true)** retornará
        la exportación en lugar de emitirla. Definirlo a **[false](#constant.false)** (por omisión) hará lo contrario.





### Valores devueltos

### Ver también

    - [ReflectionProperty::__toString()](#reflectionproperty.tostring) - Obtiene una representación textual

# ReflectionProperty::getAttributes

(PHP 8)

ReflectionProperty::getAttributes — Devuelve los atributos

### Descripción

public **ReflectionProperty::getAttributes**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Devuelve todos los atributos declarados en esta propiedad de clase en forma de un array de objetos [ReflectionAttribute](#class.reflectionattribute).

### Parámetros

name

Filtrar los resultados para incluir únicamente las instancias
de [ReflectionAttribute](#class.reflectionattribute) para los atributos correspondientes a este nombre de clase.

flags

Flags para determinar cómo filtrar los resultados, si name es proporcionado.

El valor por omisión es 0 que solo retornará los resultados
para los atributos que son de la clase name.

La única otra opción disponible es utilizar **[ReflectionAttribute::IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof)**,
que utilizará instanceof para el filtrado.

### Valores devueltos

Un array de atributos, en forma de objetos [ReflectionAttribute](#class.reflectionattribute).

### Ejemplos

    **Ejemplo #1 Uso básico**



     &lt;?php

#[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

class Basket { #[Fruit] #[Red]
public string $apple = 'apple';
}

$property = new ReflectionProperty('Basket', 'apple');
$attributes = $property-&gt;getAttributes();
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:



     Array

(
[0] =&gt; Fruit
[1] =&gt; Red
)

    **Ejemplo #2 Resultados filtrados por nombre de clase**



     &lt;?php

#[Attribute]
class Fruit {
}

#[Attribute]
class Red {
}

class Basket { #[Fruit] #[Red]
public string $apple = 'apple';
}

$property = new ReflectionProperty('Basket', 'apple');
$attributes = $property-&gt;getAttributes('Fruit');
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:



     Array

(
[0] =&gt; Fruit
)

    **Ejemplo #3 Resultados filtrados por nombre de clase, con herencia**



     &lt;?php

interface Color {
}

#[Attribute]
class Fruit {
}

#[Attribute]
class Red implements Color {
}

class Basket { #[Fruit] #[Red]
public string $apple = 'apple';
}

$property = new ReflectionProperty('Basket', 'apple');
$attributes = $property-&gt;getAttributes('Color', ReflectionAttribute::IS_INSTANCEOF);
print_r(array_map(fn($attribute) =&gt; $attribute-&gt;getName(), $attributes));
?&gt;

    El ejemplo anterior mostrará:



     Array

(
[0] =&gt; Red
)

### Ver también

    - [ReflectionClass::getAttributes()](#reflectionclass.getattributes) - Recupera los atributos de una clase

    - [ReflectionClassConstant::getAttributes()](#reflectionclassconstant.getattributes) - Verifica los atributos

    - [ReflectionFunctionAbstract::getAttributes()](#reflectionfunctionabstract.getattributes) - Devuelve los atributos

    - [ReflectionParameter::getAttributes()](#reflectionparameter.getattributes) - Devuelve los atributos

# ReflectionProperty::getDeclaringClass

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::getDeclaringClass — Obtiene la clase declarante

### Descripción

public **ReflectionProperty::getDeclaringClass**(): [ReflectionClass](#class.reflectionclass)

Obtiene la clase declarante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [ReflectionClass](#class.reflectionclass).

### Ver también

    - [ReflectionProperty::getName()](#reflectionproperty.getname) - Obtiene el nombre de la propiedad

# ReflectionProperty::getDefaultValue

(PHP 8)

ReflectionProperty::getDefaultValue — Devuelve el valor por defecto definido para una propiedad

### Descripción

public **ReflectionProperty::getDefaultValue**(): [mixed](#language.types.mixed)

Devuelve el valor por defecto implícito o explícitamente definido para una propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor por defecto si la propiedad tiene un valor por defecto (incluyendo **[null](#constant.null)**).
Si no hay valor por defecto, entonces se devuelve **[null](#constant.null)**. No es posible diferenciar
un **[null](#constant.null)** por defecto de una propiedad tipada no inicializada.
Utilizar [ReflectionProperty::hasDefaultValue()](#reflectionproperty.hasdefaultvalue) para detectar la diferencia.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::getDefaultValue()**

&lt;?php
class Foo {
public $bar = 1;
public ?int $baz;
public int $boing = 0;
public function \_\_construct(public string $bak = "default") { }
}

$ro = new ReflectionClass(Foo::class);
var_dump($ro-&gt;getProperty('bar')-&gt;getDefaultValue());
var_dump($ro-&gt;getProperty('baz')-&gt;getDefaultValue());
var_dump($ro-&gt;getProperty('boing')-&gt;getDefaultValue());
var_dump($ro-&gt;getProperty('bak')-&gt;getDefaultValue());
?&gt;

El ejemplo anterior mostrará:

int(1)
NULL
int(0)
NULL

### Ver también

    - [ReflectionProperty::hasDefaultValue()](#reflectionproperty.hasdefaultvalue) - Verifica si la propiedad tiene un valor por omisión

# ReflectionProperty::getDocComment

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ReflectionProperty::getDocComment — Recupera el comentario de documentación de una propiedad

### Descripción

public **ReflectionProperty::getDocComment**(): [string](#language.types.string)|[false](#language.types.singleton)

Recupera el comentario de documentación de una propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El comentario de documentación si existe, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 ReflectionProperty::getDocComment()** ejemplo

&lt;?php
class Str
{
/\*\*
_ @var int El tamaño de la cadena de caracteres
_/
public $length = 5;
}

$prop = new ReflectionProperty('Str', 'length');

var_dump($prop-&gt;getDocComment());

?&gt;

    Resultado del ejemplo anterior es similar a:

string(53) "/\*\*
_ @var int El tamaño de la cadena de caracteres
_/"

    **Ejemplo #2 Múltiples declaraciones de propiedades**



     Si múltiples declaraciones de propiedades son precedidas por un único comentario de documentación,
     el comentario de documentación hace referencia únicamente a la primera propiedad.

&lt;?php
class Foo
{
/\*_ @var string _/
public $a, $b;
}
$class = new \ReflectionClass('Foo');
foreach ($class-&gt;getProperties() as $property) {
    echo $property-&gt;getName() . ': ' . var_export($property-&gt;getDocComment(), true) . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

a: '/\*_ @var string _/'
b: false

### Ver también

    - [ReflectionProperty::getModifiers()](#reflectionproperty.getmodifiers) - Obtiene los modificadores de propiedad

    - [ReflectionProperty::getName()](#reflectionproperty.getname) - Obtiene el nombre de la propiedad

    - [ReflectionProperty::getValue()](#reflectionproperty.getvalue) - Obtiene el valor de la propiedad

# ReflectionProperty::getHook

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::getHook — Devuelve un objeto de reflexión para un hook dado

### Descripción

public **ReflectionProperty::getHook**([PropertyHookType](#enum.propertyhooktype) $type): [?](#language.types.null)[ReflectionMethod](#class.reflectionmethod)

Devuelve la reflexión del hook de la propiedad, si está definido.

### Parámetros

    PropertyHookType


      El tipo de hook a solicitar.


### Valores devueltos

Si el hook solicitado está definido, se devuelve una instancia de [ReflectionMethod](#class.reflectionmethod).
De lo contrario, el método devolverá **[null](#constant.null)**

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::getHook()**

&lt;?php
class Example
{
public string $name { get =&gt; "Name here"; }
}

$rClass = new \ReflectionClass(Example::class);
$rProp = $rClass-&gt;getProperty('name');
var_dump($rProp-&gt;getHook(PropertyHookType::Get));
var_dump($rProp-&gt;getHook(PropertyHookType::Set));
?&gt;

El ejemplo anterior mostrará:

object(ReflectionMethod)#4 (2) {
["name"]=&gt;
string(10) "$name::get"
["class"]=&gt;
string(7) "Example"
}
NULL

### Ver también

- [ReflectionMethod](#class.reflectionmethod)

- [PropertyHookType](#enum.propertyhooktype)

# ReflectionProperty::getHooks

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::getHooks — Devuelve un array de todos los hooks en esta propiedad

### Descripción

public **ReflectionProperty::getHooks**(): [array](#language.types.array)

Devuelve una lista de todos los hooks en esta propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos [ReflectionMethod](#class.reflectionmethod) indexados por el hook al que corresponden.
Por ejemplo, una propiedad con hooks get y set devolverá
un array de 2 elementos con claves de string get y set,
cada una es un objeto [ReflectionMethod](#class.reflectionmethod).
El orden en que se devuelven es explícitamente indefinido.
Si no hay hooks definidos, se devuelve un array vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::getHooks()**

&lt;?php
class Example
{
public string $name { get =&gt; "Name here"; }

    public int $count;

}

$rClass = new \ReflectionClass(Example::class);

$rProp = $rClass-&gt;getProperty('name');
var_dump($rProp-&gt;getHooks());

$rProp = $rClass-&gt;getProperty('count');
var_dump($rProp-&gt;getHooks());
?&gt;

El ejemplo anterior mostrará:

array(1) {
["get"]=&gt;
object(ReflectionMethod)#3 (2) {
["name"]=&gt;
string(10) "$name::get"
["class"]=&gt;
string(7) "Example"
}
}
array(0) {
}

### Ver también

- [ReflectionMethod](#class.reflectionmethod)

- [ReflectionProperty::hasHooks()](#reflectionproperty.hashooks) - Indica si la propiedad tiene hooks definidos

# ReflectionProperty::getModifiers

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::getModifiers — Obtiene los modificadores de propiedad

### Descripción

public **ReflectionProperty::getModifiers**(): [int](#language.types.integer)

Obtiene los modificadores.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación numérica de los modificadores.
El significado actual de estos modificadores se describe en las
[constantes predefinidas](#reflectionproperty.constants.modifiers).

### Ver también

    - [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

    - [Reflection::getModifierNames()](#reflection.getmodifiernames) - Obtiene los nombres de los modificadores

# ReflectionProperty::getName

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::getName — Obtiene el nombre de la propiedad

### Descripción

public **ReflectionProperty::getName**(): [string](#language.types.string)

Obtiene el nombre de la propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la propiedad reflejada.

### Ver también

    - [ReflectionProperty::getValue()](#reflectionproperty.getvalue) - Obtiene el valor de la propiedad

# ReflectionProperty::getRawValue

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::getRawValue — Devuelve el valor de la propiedad, evitando un hook get si está definido

### Descripción

public **ReflectionProperty::getRawValue**([object](#language.types.object) $object): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el valor de una propiedad, evitando un hook get si está definido.

### Parámetros

    object


      El objeto a partir del cual recuperar un valor.


### Valores devueltos

El valor almacenado de la propiedad, evitando un hook get si está definido.

### Errores/Excepciones

Si la propiedad es virtual, se lanzará una [Error](#class.error),
ya que no hay valor bruto que recuperar.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::getRawValue()**

&lt;?php

class Example
{
public string $tag {
        get =&gt; strtolower($this-&gt;tag);
}
}

$example = new Example();
$example-&gt;tag = 'PHP';

$rClass = new \ReflectionClass(Example::class);
$rProp = $rClass-&gt;getProperty('tag');

// Esto pasaría por el hook get, produciendo "php".
echo $example-&gt;tag, PHP_EOL;
echo $rProp-&gt;getValue($example), PHP_EOL;

// Pero esto evitaría el hook y produciría "PHP"
echo $rProp-&gt;getRawValue($example);

?&gt;

El ejemplo anterior mostrará:

php
php
PHP

### Ver también

- [Visibilidad de propiedad asimétrica](#language.oop5.visibility-members-aviz)

# ReflectionProperty::getSettableType

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::getSettableType — Devuelve el tipo de argumento de un hook setter

### Descripción

public **ReflectionProperty::getSettableType**(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)

Devuelve el tipo de argumento de un hook set.
Si no se define ningún hook set, se comporta de manera idéntica
a [ReflectionProperty::getType()](#reflectionproperty.gettype).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

- Este método devuelve una instancia de [ReflectionType](#class.reflectiontype) que corresponde
  al tipo definible para la propiedad.

- Si existe un hook set que define un tipo explícito, este será devuelto.

- Si el hook no especifica un tipo, o si no existe, se devolverá el tipo de la propiedad, de manera idéntica a [ReflectionProperty::getType()](#reflectionproperty.gettype). Este valor puede ser **[null](#constant.null)** si la propiedad no está tipada.

- Si la propiedad es virtual y no tiene hook set, se devolverá una instancia de [ReflectionType](#class.reflectiontype)
  para never.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::getSettableType()**

&lt;?php

class Example
{
public string $basic {
        set =&gt; strtolower($value);
}

    public string $wider {
        set(string|Stringable $value) =&gt; (string) $value;
    }

    public string $virtual {
        get =&gt; 'Do not change this';
    }

    public $untyped = 'silly';

}

$rClass = new \ReflectionClass(Example::class);

var_dump($rClass-&gt;getProperty('basic')-&gt;getSettableType());
var_dump($rClass-&gt;getProperty('wider')-&gt;getSettableType());
var_dump($rClass-&gt;getProperty('virtual')-&gt;getSettableType());
var_dump($rClass-&gt;getProperty('untyped')-&gt;getSettableType());

?&gt;

El ejemplo anterior mostrará:

object(ReflectionNamedType)#3 (0) {
}
object(ReflectionUnionType)#2 (0) {
}
object(ReflectionNamedType)#3 (0) {
}
NULL

### Ver también

- [ReflectionProperty::getType()](#reflectionproperty.gettype) - Obtiene el tipo de una propiedad

# ReflectionProperty::getType

(PHP 7 &gt;= 7.4.0, PHP 8)

ReflectionProperty::getType — Obtiene el tipo de una propiedad

### Descripción

public **ReflectionProperty::getType**(): [?](#language.types.null)[ReflectionType](#class.reflectiontype)

Obtiene el tipo asociado a una propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una [ReflectionType](#class.reflectiontype) si la propiedad tiene un tipo,
y **[null](#constant.null)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::getType()**

&lt;?php
class User
{
public string $name;
}

$rp = new ReflectionProperty('User', 'name');
echo $rp-&gt;getType()-&gt;getName();
?&gt;

El ejemplo anterior mostrará:

string

### Ver también

- [ReflectionProperty::hasType()](#reflectionproperty.hastype) - Verifica si la propiedad tiene un tipo

- [ReflectionProperty::isInitialized()](#reflectionproperty.isinitialized) - Verifica si una propiedad está inicializada

# ReflectionProperty::getValue

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::getValue — Obtiene el valor de la propiedad

### Descripción

public **ReflectionProperty::getValue**([?](#language.types.null)[object](#language.types.object) $object = **[null](#constant.null)**): [mixed](#language.types.mixed)

Obtiene el valor de la propiedad.

### Parámetros

     object


       El objeto a utilizar en el caso de una propiedad no estática.
       Si se desea obtener el valor por defecto de la propiedad, debe utilizarse
       [ReflectionClass::getDefaultProperties()](#reflectionclass.getdefaultproperties) en su lugar.





### Valores devueltos

El valor actual de la propiedad.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Las propiedades privadas y protegidas son inmediatamente
       accesibles por [ReflectionProperty::setValue()](#reflectionproperty.setvalue).
       Anteriormente, debían ser hechas accesibles llamando
       [ReflectionProperty::setAccessible()](#reflectionproperty.setaccessible),
       de lo contrario se lanzaba una [ReflectionException](#class.reflectionexception).




      8.0.0

       object ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionProperty::getValue()**

&lt;?php
class Foo {
public static $staticProperty = 'foobar';

    public $property = 'barfoo';
    protected $privateProperty = 'foofoo';

}

$reflectionClass = new ReflectionClass('Foo');

var_dump($reflectionClass-&gt;getProperty('staticProperty')-&gt;getValue());
var_dump($reflectionClass-&gt;getProperty('property')-&gt;getValue(new Foo));

$reflectionProperty = $reflectionClass-&gt;getProperty('privateProperty');
$reflectionProperty-&gt;setAccessible(true); // Solo necesario antes de PHP 8.1.0.
var_dump($reflectionProperty-&gt;getValue(new Foo));
?&gt;

    El ejemplo anterior mostrará:

string(6) "foobar"
string(6) "barfoo"
string(6) "foofoo"

### Ver también

    - [ReflectionProperty::setValue()](#reflectionproperty.setvalue) - Define el valor de la propiedad

    - [ReflectionProperty::setAccessible()](#reflectionproperty.setaccessible) - Define la accesibilidad de una propiedad

    - [ReflectionClass::getDefaultProperties()](#reflectionclass.getdefaultproperties) - Obtiene las propiedades por defecto

    - [ReflectionClass::getStaticPropertyValue()](#reflectionclass.getstaticpropertyvalue) - Obtiene el valor de una propiedad estática

# ReflectionProperty::hasDefaultValue

(PHP 8)

ReflectionProperty::hasDefaultValue — Verifica si la propiedad tiene un valor por omisión

### Descripción

public **ReflectionProperty::hasDefaultValue**(): [bool](#language.types.boolean)

Verifica si la propiedad ha sido declarada con un valor por omisión, incluyendo un valor por omisión
implícito **[null](#constant.null)**. Retorna **[false](#constant.false)** para las propiedades tipadas sin valor por omisión
(o las propiedades dinámicas).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Si la propiedad tiene un valor por omisión (incluyendo **[null](#constant.null)**), **[true](#constant.true)** es retornado;
si la propiedad es tipada sin valor por omisión declarado o es una propiedad dinámica, **[false](#constant.false)** es retornado.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::hasDefaultValue()**

&lt;?php
class Foo {
public $bar;
public ?int $baz;
public ?int $foo = null;
public int $boing;

    public function __construct()
    {
        $this-&gt;ping = '';
    }

}

$ro = new ReflectionObject(new Foo());
var_dump($ro-&gt;getProperty('bar')-&gt;hasDefaultValue());
var_dump($ro-&gt;getProperty('baz')-&gt;hasDefaultValue());
var_dump($ro-&gt;getProperty('foo')-&gt;hasDefaultValue());
var_dump($ro-&gt;getProperty('boing')-&gt;hasDefaultValue());
var_dump($ro-&gt;getProperty('ping')-&gt;hasDefaultValue()); // Propiedad dinámica
var_dump($ro-&gt;getProperty('pong')-&gt;hasDefaultValue()); // Propiedad no definida
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(true)
bool(false)
bool(false)

Fatal error: Uncaught ReflectionException: Property Foo::$pong does not exist in example.php

### Ver también

- [ReflectionProperty::getDefaultValue()](#reflectionproperty.getdefaultvalue) - Devuelve el valor por defecto definido para una propiedad

# ReflectionProperty::hasHook

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::hasHook — Indica si la propiedad tiene un hook dado definido

### Descripción

public **ReflectionProperty::hasHook**([PropertyHookType](#enum.propertyhooktype) $type): [bool](#language.types.boolean)

Indica si la propiedad tiene un hook dado definido.

### Parámetros

    PropertyHookType


      El tipo de hook a verificar.


### Valores devueltos

Devuelve **[true](#constant.true)** si el hook está definido en esta propiedad, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::hasHook()**

&lt;?php
class Example
{
public string $name { get =&gt; "Name here"; }
}

$rClass = new \ReflectionClass(Example::class);
$rProp = $rClass-&gt;getProperty('name');
var_dump($rProp-&gt;hasHook(PropertyHookType::Get));
var_dump($rProp-&gt;hasHook(PropertyHookType::Set));
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

- [ReflectionMethod](#class.reflectionmethod)

- [PropertyHookType](#enum.propertyhooktype)

# ReflectionProperty::hasHooks

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::hasHooks — Indica si la propiedad tiene hooks definidos

### Descripción

public **ReflectionProperty::hasHooks**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Indica si la propiedad tiene hooks definidos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la propiedad tiene al menos un hook definido, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::hasHooks()**

&lt;?php
class Example
{
public string $name { get =&gt; "Name here"; }

    public string $none;

}

$rClass = new \ReflectionClass(Example::class);
var_dump($rClass-&gt;getProperty('name')-&gt;hasHooks());
var_dump($rClass-&gt;getProperty('none')-&gt;hasHooks());
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)

### Notas

**Nota**:

    Este método es equivalente a verificar [ReflectionProperty::getHooks()](#reflectionproperty.gethooks)
    con un array vacío.

### Ver también

- [ReflectionProperty::getHooks()](#reflectionproperty.gethooks) - Devuelve un array de todos los hooks en esta propiedad

# ReflectionProperty::hasType

(PHP 7 &gt;= 7.4.0, PHP 8)

ReflectionProperty::hasType — Verifica si la propiedad tiene un tipo

### Descripción

public **ReflectionProperty::hasType**(): [bool](#language.types.boolean)

Verifica si la propiedad tiene un tipo asociado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si se especifica un tipo, **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::hasType()**

&lt;?php
class User
{
public string $name;
}

$rp = new ReflectionProperty('User', 'name');
var_dump($rp-&gt;hasType());
?&gt;

El ejemplo anterior mostrará:

bool(true)

### Ver también

- [ReflectionProperty::getType()](#reflectionproperty.gettype) - Obtiene el tipo de una propiedad

- [ReflectionProperty::isInitialized()](#reflectionproperty.isinitialized) - Verifica si una propiedad está inicializada

# ReflectionProperty::isAbstract

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isAbstract — Determina si una propiedad es abstracta

### Descripción

public **ReflectionProperty::isAbstract**(): [bool](#language.types.boolean)

Determina si una propiedad es
[abstracta](#language.oop5.abstract).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la propiedad está marcada como abstract, de lo contrario **[false](#constant.false)**.

### Ver también

- [Propiedades abstractas](#language.oop5.abstract)

# ReflectionProperty::isDefault

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::isDefault — Verifica si la propiedad es la predeterminada

### Descripción

public **ReflectionProperty::isDefault**(): [bool](#language.types.boolean)

Verifica si la propiedad fue declarada durante la compilación o si
la propiedad fue declarada dinámicamente durante la ejecución.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad fue declarada durante la compilación o
**[false](#constant.false)** si fue declarada durante la ejecución.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionClass::isDefault()**

&lt;?php

#[\AllowDynamicProperties]
class Foo {
public $bar;
}

$o = new Foo();
$o-&gt;bar = 42;
$o-&gt;baz = 42;

$ro = new ReflectionObject($o);
var_dump($ro-&gt;getProperty('bar')-&gt;isDefault());
var_dump($ro-&gt;getProperty('baz')-&gt;isDefault());
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [ReflectionProperty::getValue()](#reflectionproperty.getvalue) - Obtiene el valor de la propiedad

# ReflectionProperty::isDynamic

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isDynamic — Verifica si la propiedad es una propiedad dinámica

### Descripción

public **ReflectionProperty::isDynamic**(): [bool](#language.types.boolean)

Verifica si la propiedad ha sido declarada en tiempo de ejecución, o si la
propiedad ha sido declarada en tiempo de compilación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad ha sido declarada en tiempo de ejecución, o **[false](#constant.false)** si
ha sido creada en tiempo de compilación.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::isDynamic()**

&lt;?php

#[\AllowDynamicProperties]
class Foo {
public $bar;
}

$o = new Foo();
$o-&gt;bar = 42;
$o-&gt;baz = 42;

$ro = new ReflectionObject($o);
var_dump($ro-&gt;getProperty('bar')-&gt;isDynamic());
var_dump($ro-&gt;getProperty('baz')-&gt;isDynamic());
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

- [ReflectionProperty::getValue()](#reflectionproperty.getvalue) - Obtiene el valor de la propiedad

# ReflectionProperty::isFinal

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isFinal — Determina si la propiedad es final o no

### Descripción

public **ReflectionProperty::isFinal**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve si la propiedad es
[final](#language.oop5.final).
Si la propiedad está marcada private(set),
entonces también será implícitamente final.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la propiedad está explícitamente marcada final,
o si es implícitamente final debido a ser private(set).
Devuelve **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::isFinal()**

&lt;?php
class Example
{
public string $name;

    final protected int $age;

    public private(set) string $job;

}

$rClass = new \ReflectionClass(Example::class);

var_dump($rClass-&gt;getProperty('name')-&gt;isFinal());
var_dump($rClass-&gt;getProperty('age')-&gt;isFinal());
var_dump($rClass-&gt;getProperty('job')-&gt;isFinal());
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)
bool(true)

### Ver también

- [Elementos de clase final](#language.oop5.final)

- [Visibilidad de propiedad asimétrica](#language.oop5.visibility-members-aviz)

# ReflectionProperty::isInitialized

(PHP 7 &gt;= 7.4.0, PHP 8)

ReflectionProperty::isInitialized — Verifica si una propiedad está inicializada

### Descripción

public **ReflectionProperty::isInitialized**([?](#language.types.null)[object](#language.types.object) $object = **[null](#constant.null)**): [bool](#language.types.boolean)

Verifica si una propiedad está inicializada.

### Parámetros

    object


      Si la propiedad no es estática, debe proporcionarse un objeto para
      recuperar la propiedad desde el mismo.


### Valores devueltos

Devuelve **[false](#constant.false)** para las propiedades tipadas antes de su inicialización,
y para las propiedades que han sido explícitamente [unset()](#function.unset).
Para todas las demás propiedades, **[true](#constant.true)** será devuelto.

### Errores/Excepciones

Lanza una [ReflectionException](#class.reflectionexception) si la propiedad es
inaccesible. Es posible hacer accesible una propiedad protegida o privada
utilizando
[ReflectionProperty::setAccessible()](#reflectionproperty.setaccessible).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       object ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::isInitialized()**

&lt;?php
class User
{
public string $name;
}

$rp = new ReflectionProperty('User', 'name');
$user = new User;
var_dump($rp-&gt;isInitialized($user));
$user-&gt;name = 'Nikita';
var_dump($rp-&gt;isInitialized($user));
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

- [ReflectionProperty::hasType()](#reflectionproperty.hastype) - Verifica si la propiedad tiene un tipo

# ReflectionProperty::isLazy

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isLazy — Verifica si una propiedad es perezosa

### Descripción

public **ReflectionProperty::isLazy**([object](#language.types.object) $object): [bool](#language.types.boolean)

Verifica si una propiedad es perezosa.

### Parámetros

    object


      El objeto sobre el cual verificar la propiedad.


### Valores devueltos

Devuelve **[true](#constant.true)** si la propiedad es perezosa, de lo contrario **[false](#constant.false)**.

### Ver también

- [objetos perezosos](#language.oop5.lazy-objects)

# ReflectionProperty::isPrivate

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::isPrivate — Verifica si la propiedad es privada

### Descripción

public **ReflectionProperty::isPrivate**(): [bool](#language.types.boolean)

Verifica si la propiedad es privada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad es privada, **[false](#constant.false)** en caso contrario.

**Nota**:

    Se debe tener en cuenta que esto se refiere únicamente a la visibilidad principal,
    y no a una [visibilidad de definición](#language.oop5.visibility-members-aviz),
    si está especificada.

### Ver también

    - [ReflectionProperty::isPublic()](#reflectionproperty.ispublic) - Verifica si la propiedad es pública

    - [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

    - [ReflectionProperty::isReadOnly()](#reflectionproperty.isreadonly) - Verifica si la propiedad es de solo lectura

    - [ReflectionProperty::isStatic()](#reflectionproperty.isstatic) - Verifica si la propiedad es estática

# ReflectionProperty::isPrivateSet

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isPrivateSet — Verifica si la propiedad es privada en escritura

### Descripción

public **ReflectionProperty::isPrivateSet**(): [bool](#language.types.boolean)

Verifica si la propiedad es privada en escritura.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad es private(set), de lo contrario **[false](#constant.false)**.

### Ver también

- [ReflectionProperty::isPublic()](#reflectionproperty.ispublic) - Verifica si la propiedad es pública

- [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

- [ReflectionProperty::isProtectedSet()](#reflectionproperty.isprotectedset) - Verifica si la propiedad es protected en escritura

- [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

- [ReflectionProperty::isReadOnly()](#reflectionproperty.isreadonly) - Verifica si la propiedad es de solo lectura

- [ReflectionProperty::isStatic()](#reflectionproperty.isstatic) - Verifica si la propiedad es estática

# ReflectionProperty::isPromoted

(PHP 8)

ReflectionProperty::isPromoted — Verifica si la propiedad está promovida

### Descripción

public **ReflectionProperty::isPromoted**(): [bool](#language.types.boolean)

Verifica si la propiedad está [promovida](#language.oop5.decon.constructor.promotion)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad está promovida, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionProperty::isPromoted()**

&lt;?php
class Foo {
public $baz;

    public function __construct(public $bar) {}

}

$o = new Foo(42);
$o-&gt;baz = 42;

$ro = new ReflectionObject($o);
var_dump($ro-&gt;getProperty('bar')-&gt;isPromoted());
var_dump($ro-&gt;getProperty('baz')-&gt;isPromoted());
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [ReflectionProperty::isDefault()](#reflectionproperty.isdefault) - Verifica si la propiedad es la predeterminada

    - [ReflectionProperty::isInitialized()](#reflectionproperty.isinitialized) - Verifica si una propiedad está inicializada

    - [ReflectionProperty::getValue()](#reflectionproperty.getvalue) - Obtiene el valor de la propiedad

# ReflectionProperty::isProtected

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::isProtected — Verifica si la propiedad es protegida

### Descripción

public **ReflectionProperty::isProtected**(): [bool](#language.types.boolean)

Verifica si la propiedad es protegida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad es protegida, **[false](#constant.false)** en caso contrario.

**Nota**:

    Tenga en cuenta que esto se refiere únicamente a la visibilidad principal,
    y no a una [visibilidad de definición](#language.oop5.visibility-members-aviz),
    si está especificada.

### Ver también

    - [ReflectionProperty::isPublic()](#reflectionproperty.ispublic) - Verifica si la propiedad es pública

    - [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

    - [ReflectionProperty::isReadOnly()](#reflectionproperty.isreadonly) - Verifica si la propiedad es de solo lectura

    - [ReflectionProperty::isStatic()](#reflectionproperty.isstatic) - Verifica si la propiedad es estática

# ReflectionProperty::isProtectedSet

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isProtectedSet — Verifica si la propiedad es protected en escritura

### Descripción

public **ReflectionProperty::isProtectedSet**(): [bool](#language.types.boolean)

Verifica si la propiedad es protected en escritura.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad es protected(set), de lo contrario **[false](#constant.false)**.

### Ver también

- [ReflectionProperty::isPublic()](#reflectionproperty.ispublic) - Verifica si la propiedad es pública

- [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

- [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

- [ReflectionProperty::isPrivateSet()](#reflectionproperty.isprivateset) - Verifica si la propiedad es privada en escritura

- [ReflectionProperty::isReadOnly()](#reflectionproperty.isreadonly) - Verifica si la propiedad es de solo lectura

- [ReflectionProperty::isStatic()](#reflectionproperty.isstatic) - Verifica si la propiedad es estática

# ReflectionProperty::isPublic

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::isPublic — Verifica si la propiedad es pública

### Descripción

public **ReflectionProperty::isPublic**(): [bool](#language.types.boolean)

Verifica si la propiedad es pública.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad está marcada como pública, **[false](#constant.false)** en caso contrario.

**Nota**:

    Tenga en cuenta que esto solo se refiere a la visibilidad principal,
    y no a una [visibilidad de definición](#language.oop5.visibility-members-aviz),
    si está especificada.

### Notas

**Nota**:

    Debe tenerse en cuenta que el hecho de que una propiedad sea pública
    no significa siempre que sea accesible en escritura. Una propiedad
    puede ser virtual sin gancho set, o podría ser
    readonly y haber sido ya escrita, o podría tener una
    [visibilidad set
    definida](#language.oop5.visibility-members-aviz) como no pública. En todos estos casos, este método devolverá
    true, pero la propiedad no será modificable.

### Ver también

    - [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

    - [ReflectionProperty::isProtectedSet()](#reflectionproperty.isprotectedset) - Verifica si la propiedad es protected en escritura

    - [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

    - [ReflectionProperty::isPrivateSet()](#reflectionproperty.isprivateset) - Verifica si la propiedad es privada en escritura

    - [ReflectionProperty::isReadOnly()](#reflectionproperty.isreadonly) - Verifica si la propiedad es de solo lectura

    - [ReflectionProperty::isStatic()](#reflectionproperty.isstatic) - Verifica si la propiedad es estática

# ReflectionProperty::isReadOnly

(PHP 8 &gt;= 8.1.0)

ReflectionProperty::isReadOnly — Verifica si la propiedad es de solo lectura

### Descripción

public **ReflectionProperty::isReadOnly**(): [bool](#language.types.boolean)

Verifica si la [propiedad es de solo lectura](#language.oop5.properties.readonly-properties).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    **[true](#constant.true)** si la propiedad es de solo lectura, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionProperty::isPublic()](#reflectionproperty.ispublic) - Verifica si la propiedad es pública

    - [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

    - [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

    - [ReflectionProperty::isStatic()](#reflectionproperty.isstatic) - Verifica si la propiedad es estática

# ReflectionProperty::isStatic

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::isStatic — Verifica si la propiedad es estática

### Descripción

public **ReflectionProperty::isStatic**(): [bool](#language.types.boolean)

Verifica si la propiedad es estática.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la propiedad es estática, **[false](#constant.false)** en caso contrario.

### Ver también

    - [ReflectionProperty::isPublic()](#reflectionproperty.ispublic) - Verifica si la propiedad es pública

    - [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

    - [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

    - [ReflectionProperty::isReadOnly()](#reflectionproperty.isreadonly) - Verifica si la propiedad es de solo lectura

# ReflectionProperty::isVirtual

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::isVirtual — Determina si la propiedad es virtual

### Descripción

public **ReflectionProperty::isVirtual**(): [bool](#language.types.boolean)

Determina si una propiedad es virtual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la propiedad es virtual, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 ReflectionProperty::isVirtual()** ejemplo

&lt;?php
class Example
{
// Ninguno de los hooks hace referencia a la propiedad,
// por lo que es virtual.
public string $name { get =&gt; "Nombre aquí"; }

    // Este hook hace referencia a la propiedad por su nombre,
    // por lo que no es virtual.
    public int $age {
        set {
            if ($value &lt;= 0) {
               throw new \InvalidArgumentException();
            }
            $this-&gt;age = $value;
        }
    }

    // Las propiedades no hookeadas siempre son no virtuales.
    public string $job;

}

$rClass = new \ReflectionClass(Example::class);

var_dump($rClass-&gt;getProperty('name')-&gt;isVirtual());
var_dump($rClass-&gt;getProperty('age')-&gt;isVirtual());
var_dump($rClass-&gt;getProperty('job')-&gt;isVirtual());
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(false)

### Ver también

- [Propiedad virtual](#language.oop5.property-hooks.virtual)

# ReflectionProperty::setAccessible

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ReflectionProperty::setAccessible — Define la accesibilidad de una propiedad

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **ReflectionProperty::setAccessible**([bool](#language.types.boolean) $accessible): [void](language.types.void.html)

Activa el acceso a una propiedad protegida o privada mediante los métodos
[ReflectionProperty::getValue()](#reflectionproperty.getvalue) y
[ReflectionProperty::setValue()](#reflectionproperty.setvalue).

**Nota**:

    A partir de PHP 8.1.0, la llamada a este método no tiene ningún efecto; todas las propiedades son accesibles por omisión.

### Parámetros

     accessible


       **[true](#constant.true)** para permitir el acceso, o **[false](#constant.false)**.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Definición de una clase simple**

&lt;?php
class MyClass
{
private $foo = 'bar';
}
$property = new ReflectionProperty("MyClass", "foo");
$property-&gt;setAccessible(true);
$obj = new MyClass();
echo $property-&gt;getValue($obj);
echo $obj-&gt;foo;
?&gt;

Resultado del ejemplo anterior es similar a:

bar
Fatal error: Uncaught Error: Cannot access private property MyClass::$foo in /in/WJqTv:12

### Ver también

    - [ReflectionProperty::isPrivate()](#reflectionproperty.isprivate) - Verifica si la propiedad es privada

    - [ReflectionProperty::isProtected()](#reflectionproperty.isprotected) - Verifica si la propiedad es protegida

# ReflectionProperty::setRawValue

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::setRawValue — Define la valor de una propiedad, omitiendo un hook de definición si está definido

### Descripción

public **ReflectionProperty::setRawValue**([object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Define la valor de una propiedad, omitiendo un hook set si está definido.

### Parámetros

    object


      El objeto sobre el cual definir la valor de la propiedad.




    value


      La valor a escribir. Debe ser siempre válida según el tipo de la propiedad.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Si la propiedad es virtual, se lanzará una [Error](#class.error),
ya que no hay valor bruto a definir.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionProperty::setRawValue()**

&lt;?php
class Example
{
public int $age {
        set {
            if ($value &lt;= 0) {
throw new \InvalidArgumentException();
}
$this-&gt;age = $value;
}
}
}

$example = new Example();

$rClass = new \ReflectionClass(Example::class);
$rProp = $rClass-&gt;getProperty('age');

// Esto pasaría por el hook set, y lanzaría una excepción.
$example-&gt;age = -2;
try {
    $example-&gt;age = -2;
} catch (InvalidArgumentException) {
    print "InvalidArgumentException para establecer la propiedad en -2\n";
}
try {
    $rProp-&gt;setValue($example, -2);
} catch (InvalidArgumentException) {
print "InvalidArgumentException para usar ReflectionProperty::setValue() con -2\n";
}

// Pero esto establecería $age a -2 sin error.
$rProp-&gt;setRawValue($example, -2);
echo $example-&gt;age;
?&gt;

El ejemplo anterior mostrará:

InvalidArgumentException para establecer la propiedad en -2
InvalidArgumentException para usar ReflectionProperty::setValue() con -2
-2

### Ver también

- [Visibilidad de propiedad asimétrica](#language.oop5.visibility-members-aviz)

# ReflectionProperty::setRawValueWithoutLazyInitialization

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::setRawValueWithoutLazyInitialization — Define el valor bruto de una propiedad sin activar la inicialización perezosa

### Descripción

public **ReflectionProperty::setRawValueWithoutLazyInitialization**([object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Define (cambia) el valor de la propiedad sin activar la inicialización perezosa
ni llamar a las funciones de gancho.
La propiedad se marca como no perezosa y puede ser accedida posteriormente sin
activar la inicialización perezosa.
La propiedad no debe ser dinámica, estática o virtual, y el objeto debe ser
una instancia de una clase definida por el usuario o [stdClass](#class.stdclass).

Si era la última propiedad perezosa, el objeto se marca como no perezoso y
se desvincula el inicializador o la función de fábrica.

### Parámetros

    object


      El objeto sobre el cual cambiar la propiedad.




    value


      El nuevo valor.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) - Marca una propiedad como no perezosa

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

# ReflectionProperty::setValue

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::setValue — Define el valor de la propiedad

### Descripción

public **ReflectionProperty::setValue**([object](#language.types.object) $object, [?](#language.types.null)[object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

public **ReflectionProperty::setValue**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Define (modifica) el valor de la propiedad.

**Nota**:

    Para definir los valores de las propiedades estáticas, utilice ReflectionProperty::setValue(null, $value).

### Parámetros

     object


       Para las propiedades estáticas, pase **[null](#constant.null)**.
       Para las propiedades no estáticas, pase el objeto.






     value


       El nuevo valor.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       La llamada a este método con un solo argumento está obsoleto,
       utilice en su lugar ReflectionProperty::setValue(null, $value)
       para las propiedades estáticas.




      8.1.0

       Las propiedades privadas y protegidas son inmediatamente
       accesibles por **ReflectionProperty::setValue()**.
       Anteriormente, debían ser hechas accesibles llamando
       a [ReflectionProperty::setAccessible()](#reflectionproperty.setaccessible),
       de lo contrario se lanzaba una [ReflectionException](#class.reflectionexception).



### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionProperty::setValue()**

&lt;?php
class Foo {
public static $staticProperty;

    public $property;
    protected $privateProperty;

}

$reflectionClass = new ReflectionClass('Foo');

// A partir de PHP 8.3, pasar null como primer argumento es requerido
// para acceder a las propiedades estáticas.
$reflectionProperty = $reflectionClass-&gt;getProperty('staticProperty');
$reflectionProperty-&gt;setValue(null, 'foo');
var_dump(Foo::$staticProperty);

$foo = new Foo;

$reflectionClass-&gt;getProperty('property')-&gt;setValue($foo, 'bar');
var_dump($foo-&gt;property);

$reflectionProperty = $reflectionClass-&gt;getProperty('privateProperty');
$reflectionProperty-&gt;setAccessible(true); // Solo necesario antes de PHP 8.1.0.
$reflectionProperty-&gt;setValue($foo, 'foobar');
var_dump($reflectionProperty-&gt;getValue($foo));
?&gt;

    El ejemplo anterior mostrará:

string(3) "foo"
string(3) "bar"
string(6) "foobar"

### Ver también

    - [ReflectionProperty::getValue()](#reflectionproperty.getvalue) - Obtiene el valor de la propiedad

    - [ReflectionProperty::setAccessible()](#reflectionproperty.setaccessible) - Define la accesibilidad de una propiedad

    - [ReflectionClass::setStaticPropertyValue()](#reflectionclass.setstaticpropertyvalue) - Define el valor de una propiedad estática pública

# ReflectionProperty::skipLazyInitialization

(PHP 8 &gt;= 8.4.0)

ReflectionProperty::skipLazyInitialization — Marca una propiedad como no perezosa

### Descripción

public **ReflectionProperty::skipLazyInitialization**([object](#language.types.object) $object): [void](language.types.void.html)

Marca una propiedad como no perezosa de modo que pueda ser
accedida directamente sin desencadenar la inicialización perezosa. La propiedad
es inicializada a su valor por defecto, si lo tiene.
La propiedad no debe ser dinámica, estática o virtual, y el objeto debe ser
una instancia de una clase definida por el usuario o [stdClass](#class.stdclass).

Si era la última propiedad perezosa, el objeto es marcado como no perezoso y
el inicializador o la función de fábrica es desvinculado.

### Parámetros

    object


      El objeto sobre el cual marcar la propiedad.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [objetos perezosos](#language.oop5.lazy-objects)

- [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization) - Define el valor bruto de una propiedad sin activar la inicialización perezosa

- [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) - Crear una nueva instancia fantasma perezosa

# ReflectionProperty::\_\_toString

(PHP 5, PHP 7, PHP 8)

ReflectionProperty::\_\_toString — Obtiene una representación textual

### Descripción

public **ReflectionProperty::\_\_toString**(): [string](#language.types.string)

Obtiene una representación textual de la propiedad.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación en forma de string de esta instancia de [ReflectionProperty](#class.reflectionproperty).

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El comentario de documentación adjunto es ahora incluido.



### Ver también

    - [__toString()](#object.tostring)

## Tabla de contenidos

- [ReflectionProperty::\_\_clone](#reflectionproperty.clone) — Clonación
- [ReflectionProperty::\_\_construct](#reflectionproperty.construct) — Construye un nuevo objeto ReflectionProperty
- [ReflectionProperty::export](#reflectionproperty.export) — Exporta
- [ReflectionProperty::getAttributes](#reflectionproperty.getattributes) — Devuelve los atributos
- [ReflectionProperty::getDeclaringClass](#reflectionproperty.getdeclaringclass) — Obtiene la clase declarante
- [ReflectionProperty::getDefaultValue](#reflectionproperty.getdefaultvalue) — Devuelve el valor por defecto definido para una propiedad
- [ReflectionProperty::getDocComment](#reflectionproperty.getdoccomment) — Recupera el comentario de documentación de una propiedad
- [ReflectionProperty::getHook](#reflectionproperty.gethook) — Devuelve un objeto de reflexión para un hook dado
- [ReflectionProperty::getHooks](#reflectionproperty.gethooks) — Devuelve un array de todos los hooks en esta propiedad
- [ReflectionProperty::getModifiers](#reflectionproperty.getmodifiers) — Obtiene los modificadores de propiedad
- [ReflectionProperty::getName](#reflectionproperty.getname) — Obtiene el nombre de la propiedad
- [ReflectionProperty::getRawValue](#reflectionproperty.getrawvalue) — Devuelve el valor de la propiedad, evitando un hook get si está definido
- [ReflectionProperty::getSettableType](#reflectionproperty.getsettabletype) — Devuelve el tipo de argumento de un hook setter
- [ReflectionProperty::getType](#reflectionproperty.gettype) — Obtiene el tipo de una propiedad
- [ReflectionProperty::getValue](#reflectionproperty.getvalue) — Obtiene el valor de la propiedad
- [ReflectionProperty::hasDefaultValue](#reflectionproperty.hasdefaultvalue) — Verifica si la propiedad tiene un valor por omisión
- [ReflectionProperty::hasHook](#reflectionproperty.hashook) — Indica si la propiedad tiene un hook dado definido
- [ReflectionProperty::hasHooks](#reflectionproperty.hashooks) — Indica si la propiedad tiene hooks definidos
- [ReflectionProperty::hasType](#reflectionproperty.hastype) — Verifica si la propiedad tiene un tipo
- [ReflectionProperty::isAbstract](#reflectionproperty.isabstract) — Determina si una propiedad es abstracta
- [ReflectionProperty::isDefault](#reflectionproperty.isdefault) — Verifica si la propiedad es la predeterminada
- [ReflectionProperty::isDynamic](#reflectionproperty.isdynamic) — Verifica si la propiedad es una propiedad dinámica
- [ReflectionProperty::isFinal](#reflectionproperty.isfinal) — Determina si la propiedad es final o no
- [ReflectionProperty::isInitialized](#reflectionproperty.isinitialized) — Verifica si una propiedad está inicializada
- [ReflectionProperty::isLazy](#reflectionproperty.islazy) — Verifica si una propiedad es perezosa
- [ReflectionProperty::isPrivate](#reflectionproperty.isprivate) — Verifica si la propiedad es privada
- [ReflectionProperty::isPrivateSet](#reflectionproperty.isprivateset) — Verifica si la propiedad es privada en escritura
- [ReflectionProperty::isPromoted](#reflectionproperty.ispromoted) — Verifica si la propiedad está promovida
- [ReflectionProperty::isProtected](#reflectionproperty.isprotected) — Verifica si la propiedad es protegida
- [ReflectionProperty::isProtectedSet](#reflectionproperty.isprotectedset) — Verifica si la propiedad es protected en escritura
- [ReflectionProperty::isPublic](#reflectionproperty.ispublic) — Verifica si la propiedad es pública
- [ReflectionProperty::isReadOnly](#reflectionproperty.isreadonly) — Verifica si la propiedad es de solo lectura
- [ReflectionProperty::isStatic](#reflectionproperty.isstatic) — Verifica si la propiedad es estática
- [ReflectionProperty::isVirtual](#reflectionproperty.isvirtual) — Determina si la propiedad es virtual
- [ReflectionProperty::setAccessible](#reflectionproperty.setaccessible) — Define la accesibilidad de una propiedad
- [ReflectionProperty::setRawValue](#reflectionproperty.setrawvalue) — Define la valor de una propiedad, omitiendo un hook de definición si está definido
- [ReflectionProperty::setRawValueWithoutLazyInitialization](#reflectionproperty.setrawvaluewithoutlazyinitialization) — Define el valor bruto de una propiedad sin activar la inicialización perezosa
- [ReflectionProperty::setValue](#reflectionproperty.setvalue) — Define el valor de la propiedad
- [ReflectionProperty::skipLazyInitialization](#reflectionproperty.skiplazyinitialization) — Marca una propiedad como no perezosa
- [ReflectionProperty::\_\_toString](#reflectionproperty.tostring) — Obtiene una representación textual

# La clase ReflectionType

(PHP 7, PHP 8)

## Introducción

    La clase **ReflectionType** proporciona
    información sobre el tipo de retorno de una función.
    La extensión Reflection declara los siguientes subtipos:



     - [ReflectionNamedType](#class.reflectionnamedtype) (disponible a partir de PHP 7.1.0)

     - [ReflectionUnionType](#class.reflectionuniontype) (disponible a partir de PHP 8.0.0)

     - [ReflectionIntersectionType](#class.reflectionintersectiontype) (disponible a partir de PHP 8.1.0)

## Sinopsis de la Clase

     abstract
     class **ReflectionType**



     implements
      [Stringable](#class.stringable) {

    /* Métodos */

public [allowsNull](#reflectiontype.allowsnull)(): [bool](#language.types.boolean)
public [\_\_toString](#reflectiontype.tostring)(): [string](#language.types.string)

}

## Historial de cambios

       Versión
       Descripción






       8.0.0

        **ReflectionType** se ha convertido en abstracta y **ReflectionType::isBuiltin()**
        ha sido movida a [ReflectionNamedType::isBuiltin()](#reflectionnamedtype.isbuiltin).





# ReflectionType::allowsNull

(PHP 7, PHP 8)

ReflectionType::allowsNull — Verifica si null es admitido

### Descripción

public **ReflectionType::allowsNull**(): [bool](#language.types.boolean)

Verifica si el argumento acepta **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si **[null](#constant.null)** es admitido, de lo contrario **[false](#constant.false)**

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionType::allowsNull()**

&lt;?php
function someFunction(string $param, stdClass $param2 = null) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParams = $reflectionFunc-&gt;getParameters();

var_dump($reflectionParams[0]-&gt;getType()-&gt;allowsNull());
var_dump($reflectionParams[1]-&gt;getType()-&gt;allowsNull());

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [ReflectionNamedType::isBuiltin()](#reflectionnamedtype.isbuiltin) - Verifica si es un tipo integrado

    - [ReflectionType::__toString()](#reflectiontype.tostring) - Conversión a string

    - [ReflectionParameter::getType()](#reflectionparameter.gettype) - Obtiene el tipo del parámetro

# ReflectionType::\_\_toString

(PHP 7, PHP 8)

ReflectionType::\_\_toString — Conversión a string

### Descripción

public **ReflectionType::\_\_toString**(): [string](#language.types.string)

Se recupera el nombre del tipo del argumento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Se devuelve el tipo del argumento.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **ReflectionType::__toString()** ha sido marcado como no obsoleto.




      7.1.0

       **ReflectionType::__toString()** ha sido marcado como obsoleto.



### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionType::__toString()**

&lt;?php
function someFunction(string $param) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParam = $reflectionFunc-&gt;getParameters()[0];

echo $reflectionParam-&gt;getType();

    Resultado del ejemplo anterior es similar a:

string

### Ver también

    - [ReflectionNamedType::getName()](#reflectionnamedtype.getname) - Obtiene el nombre del tipo como string

    - [ReflectionNamedType::isBuiltin()](#reflectionnamedtype.isbuiltin) - Verifica si es un tipo integrado

    - [ReflectionType::allowsNull()](#reflectiontype.allowsnull) - Verifica si null es admitido

    - [ReflectionUnionType::getTypes()](#reflectionuniontype.gettypes) - Devuelve los tipos incluidos en la unión

    - [ReflectionParameter::getType()](#reflectionparameter.gettype) - Obtiene el tipo del parámetro

## Tabla de contenidos

- [ReflectionType::allowsNull](#reflectiontype.allowsnull) — Verifica si null es admitido
- [ReflectionType::\_\_toString](#reflectiontype.tostring) — Conversión a string

# La clase ReflectionUnionType

(PHP 8)

## Introducción

## Sinopsis de la Clase

     class **ReflectionUnionType**



     extends
      [ReflectionType](#class.reflectiontype)
     {

    /* Métodos */

public [getTypes](#reflectionuniontype.gettypes)(): [array](#language.types.array)

    /* Métodos heredados */
    public [ReflectionType::allowsNull](#reflectiontype.allowsnull)(): [bool](#language.types.boolean)

public [ReflectionType::\_\_toString](#reflectiontype.tostring)(): [string](#language.types.string)

}

# ReflectionUnionType::getTypes

(PHP 8)

ReflectionUnionType::getTypes — Devuelve los tipos incluidos en la unión

### Descripción

public **ReflectionUnionType::getTypes**(): [array](#language.types.array)

Devuelve la reflexión de los tipos incluidos en la unión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos [ReflectionType](#class.reflectiontype).

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionUnionType::getTypes()**

&lt;?php
function someFunction(int|float $number) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParam = $reflectionFunc-&gt;getParameters()[0];

var_dump($reflectionParam-&gt;getType()-&gt;getTypes());

    Resultado del ejemplo anterior es similar a:

array(2) {
[0] =&gt;
class ReflectionNamedType#4(0) {
}
[1] =&gt;
class ReflectionNamedType#5(0) {
}
}

### Ver también

    - [ReflectionType::allowsNull()](#reflectiontype.allowsnull) - Verifica si null es admitido

    - [ReflectionParameter::getType()](#reflectionparameter.gettype) - Obtiene el tipo del parámetro

## Tabla de contenidos

- [ReflectionUnionType::getTypes](#reflectionuniontype.gettypes) — Devuelve los tipos incluidos en la unión

# La clase ReflectionGenerator

(PHP 7, PHP 8)

## Introducción

    La clase **ReflectionGenerator** proporciona
    información acerca de un generador.

## Sinopsis de la Clase

     final
     class **ReflectionGenerator**
     {

    /* Métodos */

public [\_\_construct](#reflectiongenerator.construct)([Generator](#class.generator) $generator)

    public [getExecutingFile](#reflectiongenerator.getexecutingfile)(): [string](#language.types.string)

public [getExecutingGenerator](#reflectiongenerator.getexecutinggenerator)(): [Generator](#class.generator)
public [getExecutingLine](#reflectiongenerator.getexecutingline)(): [int](#language.types.integer)
public [getFunction](#reflectiongenerator.getfunction)(): [ReflectionFunctionAbstract](#class.reflectionfunctionabstract)
public [getThis](#reflectiongenerator.getthis)(): [?](#language.types.null)[object](#language.types.object)
public [getTrace](#reflectiongenerator.gettrace)([int](#language.types.integer) $options = **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**): [array](#language.types.array)
public [isClosed](#reflectiongenerator.isclosed)(): [bool](#language.types.boolean)

}

## Historial de cambios

        Versión
        Descripción






        8.0.0

         La clase es final ahora.






# ReflectionGenerator::\_\_construct

(PHP 7, PHP 8)

ReflectionGenerator::\_\_construct — Construye un objeto ReflectionGenerator

### Descripción

public **ReflectionGenerator::\_\_construct**([Generator](#class.generator) $generator)

Construye un objeto [ReflectionGenerator](#class.reflectiongenerator).

### Parámetros

     generator


       Un objeto generator.





### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::__construct()**

&lt;?php

function gen()
{
yield 1;
}

$gen = gen();

$reflectionGen = new ReflectionGenerator($gen);

echo &lt;&lt;&lt; output
{$reflectionGen-&gt;getFunction()-&gt;name}
Line: {$reflectionGen-&gt;getExecutingLine()}
File: {$reflectionGen-&gt;getExecutingFile()}
output;

    Resultado del ejemplo anterior es similar a:

gen
Line: 5
File: /path/to/file/example.php

### Ver también

    - [ReflectionGenerator::getFunction()](#reflectiongenerator.getfunction) - Obtiene el nombre de función del generador

    - [ReflectionGenerator::getExecutingLine()](#reflectiongenerator.getexecutingline) - Obtiene la línea actualmente ejecutada del generador

    - [ReflectionGenerator::getExecutingFile()](#reflectiongenerator.getexecutingfile) - Obtiene el nombre de fichero del generador actualmente ejecutado

# ReflectionGenerator::getExecutingFile

(PHP 7, PHP 8)

ReflectionGenerator::getExecutingFile — Obtiene el nombre de fichero del generador actualmente ejecutado

### Descripción

public **ReflectionGenerator::getExecutingFile**(): [string](#language.types.string)

Obtiene la ruta completa y el nombre de fichero del generador actualmente ejecutado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta completa y el nombre de fichero del generador actualmente ejecutado.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::getExecutingFile()**

&lt;?php

class GenExample
{
public function gen()
{
yield 1;
}
}

$gen = (new GenExample)-&gt;gen();

$reflectionGen = new ReflectionGenerator($gen);

echo "File: {$reflectionGen-&gt;getExecutingFile()}";

    Resultado del ejemplo anterior es similar a:

File: /path/to/file/example.php

### Ver también

    - [ReflectionGenerator::getExecutingLine()](#reflectiongenerator.getexecutingline) - Obtiene la línea actualmente ejecutada del generador

    - [ReflectionGenerator::getExecutingGenerator()](#reflectiongenerator.getexecutinggenerator) - Obtiene el objeto Generator ejecutado

# ReflectionGenerator::getExecutingGenerator

(PHP 7, PHP 8)

ReflectionGenerator::getExecutingGenerator — Obtiene el objeto [Generator](#class.generator) ejecutado

### Descripción

public **ReflectionGenerator::getExecutingGenerator**(): [Generator](#class.generator)

Obtiene el objeto [Generator](#class.generator) ejecutado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el objeto [Generator](#class.generator) actualmente ejecutado.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::getExecutingGenerator()**

&lt;?php

class GenExample
{
public function gen()
{
yield 1;
}
}

$gen = (new GenExample)-&gt;gen();

$reflectionGen = new ReflectionGenerator($gen);

$gen2 = $reflectionGen-&gt;getExecutingGenerator();

var_dump($gen2 === $gen);
var_dump($gen2-&gt;current());

    Resultado del ejemplo anterior es similar a:

bool(true)
int(1);

### Ver también

    - [ReflectionGenerator::getExecutingLine()](#reflectiongenerator.getexecutingline) - Obtiene la línea actualmente ejecutada del generador

    - [ReflectionGenerator::getExecutingFile()](#reflectiongenerator.getexecutingfile) - Obtiene el nombre de fichero del generador actualmente ejecutado

# ReflectionGenerator::getExecutingLine

(PHP 7, PHP 8)

ReflectionGenerator::getExecutingLine — Obtiene la línea actualmente ejecutada del generador

### Descripción

public **ReflectionGenerator::getExecutingLine**(): [int](#language.types.integer)

Obtiene la línea actualmente ejecutada del generador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de línea de la declaración actualmente ejecutada en el generador.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::getExecutingLine()**

&lt;?php

class GenExample
{
public function gen()
{
yield 1;
}
}

$gen = (new GenExample)-&gt;gen();

$reflectionGen = new ReflectionGenerator($gen);

echo "Line: {$reflectionGen-&gt;getExecutingLine()}";

    Resultado del ejemplo anterior es similar a:

Line: 7

### Ver también

    - [ReflectionGenerator::getExecutingGenerator()](#reflectiongenerator.getexecutinggenerator) - Obtiene el objeto Generator ejecutado

    - [ReflectionGenerator::getExecutingFile()](#reflectiongenerator.getexecutingfile) - Obtiene el nombre de fichero del generador actualmente ejecutado

# ReflectionGenerator::getFunction

(PHP 7, PHP 8)

ReflectionGenerator::getFunction — Obtiene el nombre de función del generador

### Descripción

public **ReflectionGenerator::getFunction**(): [ReflectionFunctionAbstract](#class.reflectionfunctionabstract)

Permite obtener el nombre de función del generador devolviendo una
clase derivada de [ReflectionFunctionAbstract](#class.reflectionfunctionabstract).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una clase [ReflectionFunctionAbstract](#class.reflectionfunctionabstract). Esto
será [ReflectionFunction](#class.reflectionfunction) para las funciones, o
[ReflectionMethod](#class.reflectionmethod) para los métodos.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **ReflectionGenerator::getFunction()**
       puede ser ahora llamado después de que el generador haya sido cerrado.



### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::getFunction()**

&lt;?php

function gen()
{
yield 1;
}

$gen = gen();

$reflectionGen = new ReflectionGenerator($gen);

var_dump($reflectionGen-&gt;getFunction());

    Resultado del ejemplo anterior es similar a:

object(ReflectionFunction)#3 (1) {
["name"]=&gt;
string(3) "gen"
}

### Ver también

    - [ReflectionGenerator::getThis()](#reflectiongenerator.getthis) - Obtiene el valor de $this del generador

    - [ReflectionGenerator::getTrace()](#reflectiongenerator.gettrace) - Obtiene la traza del generador en ejecución

# ReflectionGenerator::getThis

(PHP 7, PHP 8)

ReflectionGenerator::getThis — Obtiene el valor de $this del generador

### Descripción

public **ReflectionGenerator::getThis**(): [?](#language.types.null)[object](#language.types.object)

Obtiene el valor de $this del generador al que tiene acceso.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el valor de $this, o **[null](#constant.null)** si el generador
no ha sido creado en un contexto de clase.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::getThis()**

&lt;?php

class GenExample
{
public function gen()
{
yield 1;
}
}

$gen = (new GenExample)-&gt;gen();

$reflectionGen = new ReflectionGenerator($gen);

var_dump($reflectionGen-&gt;getThis());

    Resultado del ejemplo anterior es similar a:

object(GenExample)#3 (0) {
}

### Ver también

    - [ReflectionGenerator::getFunction()](#reflectiongenerator.getfunction) - Obtiene el nombre de función del generador

    - [ReflectionGenerator::getTrace()](#reflectiongenerator.gettrace) - Obtiene la traza del generador en ejecución

# ReflectionGenerator::getTrace

(PHP 7, PHP 8)

ReflectionGenerator::getTrace — Obtiene la traza del generador en ejecución

### Descripción

public **ReflectionGenerator::getTrace**([int](#language.types.integer) $options = **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**): [array](#language.types.array)

Obtiene la traza del generador actualmente en ejecución.

### Parámetros

     options


       El valor de options puede ser cualquiera
       de los flags siguientes.







        <caption>**Opciones disponibles**</caption>



           Opción
           Descripción







            **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**


            Por omisión.





            **[DEBUG_BACKTRACE_IGNORE_ARGS](#constant.debug-backtrace-ignore-args)**


            No incluye las informaciones de los argumentos para las funciones en
            la traza de llamadas.










### Valores devueltos

Devuelve la traza del generador actualmente en ejecución.

### Ejemplos

    **Ejemplo #1 Ejemplo con ReflectionGenerator::getTrace()**

&lt;?php
function foo() {
yield 1;
}

function bar()
{
yield from foo();
}

function baz()
{
yield from bar();
}

$gen = baz();
$gen-&gt;valid(); // start the generator

var_dump((new ReflectionGenerator($gen))-&gt;getTrace());

    Resultado del ejemplo anterior es similar a:

array(2) {
[0]=&gt;
array(4) {
["file"]=&gt;
string(18) "example.php"
["line"]=&gt;
int(8)
["function"]=&gt;
string(3) "foo"
["args"]=&gt;
array(0) {
}
}
[1]=&gt;
array(4) {
["file"]=&gt;
string(18) "example.php"
["line"]=&gt;
int(12)
["function"]=&gt;
string(3) "bar"
["args"]=&gt;
array(0) {
}
}
}

### Ver también

    - [ReflectionGenerator::getFunction()](#reflectiongenerator.getfunction) - Obtiene el nombre de función del generador

    - [ReflectionGenerator::getThis()](#reflectiongenerator.getthis) - Obtiene el valor de $this del generador

# ReflectionGenerator::isClosed

(PHP 8 &gt;= 8.4.0)

ReflectionGenerator::isClosed — Verifica si la ejecución ha finalizado

### Descripción

public **ReflectionGenerator::isClosed**(): [bool](#language.types.boolean)

Indica si la ejecución ha alcanzado el final de la función, una instrucción de retorno o si se ha lanzado una excepción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Indica si el generador ha terminado su ejecución.

### Ejemplos

**Ejemplo #1 Ejemplo de ReflectionGenerator::isClosed()**

&lt;?php

function gen()
{
yield 'a';
yield 'a';
}

$gen = gen();
$reflectionGen = new ReflectionGenerator($gen);

foreach ($gen as $value) {
    echo $value, PHP_EOL;
    var_dump($reflectionGen-&gt;isClosed());
}

var_dump($reflectionGen-&gt;isClosed());

?&gt;

El ejemplo anterior mostrará:

a
bool(false)
a
bool(false)
bool(true)

## Tabla de contenidos

- [ReflectionGenerator::\_\_construct](#reflectiongenerator.construct) — Construye un objeto ReflectionGenerator
- [ReflectionGenerator::getExecutingFile](#reflectiongenerator.getexecutingfile) — Obtiene el nombre de fichero del generador actualmente ejecutado
- [ReflectionGenerator::getExecutingGenerator](#reflectiongenerator.getexecutinggenerator) — Obtiene el objeto Generator ejecutado
- [ReflectionGenerator::getExecutingLine](#reflectiongenerator.getexecutingline) — Obtiene la línea actualmente ejecutada del generador
- [ReflectionGenerator::getFunction](#reflectiongenerator.getfunction) — Obtiene el nombre de función del generador
- [ReflectionGenerator::getThis](#reflectiongenerator.getthis) — Obtiene el valor de $this del generador
- [ReflectionGenerator::getTrace](#reflectiongenerator.gettrace) — Obtiene la traza del generador en ejecución
- [ReflectionGenerator::isClosed](#reflectiongenerator.isclosed) — Verifica si la ejecución ha finalizado

# La clase ReflectionFiber

(PHP 8 &gt;= 8.1.0)

## Introducción

## Sinopsis de la Clase

     final
     class **ReflectionFiber**
     {

    /* Métodos */

public [\_\_construct](#reflectionfiber.construct)([Fiber](#class.fiber) $fiber)

    public [getCallable](#reflectionfiber.getcallable)(): [callable](#language.types.callable)

public [getExecutingFile](#reflectionfiber.getexecutingfile)(): [?](#language.types.null)[string](#language.types.string)
public [getExecutingLine](#reflectionfiber.getexecutingline)(): [?](#language.types.null)[int](#language.types.integer)
public [getFiber](#reflectionfiber.getfiber)(): [Fiber](#class.fiber)
public [getTrace](#reflectionfiber.gettrace)([int](#language.types.integer) $options = **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**): [array](#language.types.array)

}

# ReflectionFiber::\_\_construct

(PHP 8 &gt;= 8.1.0)

ReflectionFiber::\_\_construct — Construye un objeto ReflectionFiber

### Descripción

public **ReflectionFiber::\_\_construct**([Fiber](#class.fiber) $fiber)

Construye un objeto [ReflectionFiber](#class.reflectionfiber).

### Parámetros

    fiber


      La [Fiber](#class.fiber) a reflejar.


# ReflectionFiber::getCallable

(PHP 8 &gt;= 8.1.0)

ReflectionFiber::getCallable — Devuelve el callable utilizado para crear la Fibra

### Descripción

public **ReflectionFiber::getCallable**(): [callable](#language.types.callable)

Devuelve el callable utilizado para crear la [Fiber](#class.fiber). Si la [Fiber](#class.fiber) ha sido terminada, se
lanza una [Error](#class.error).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El callable utilizado para crear la [Fiber](#class.fiber).

# ReflectionFiber::getExecutingFile

(PHP 8 &gt;= 8.1.0)

ReflectionFiber::getExecutingFile — Devuelve el nombre del fichero del punto de ejecución actual

### Descripción

public **ReflectionFiber::getExecutingFile**(): [?](#language.types.null)[string](#language.types.string)

Devuelve la ruta completa y el nombre del fichero del punto de ejecución actual de la [Fiber](#class.fiber) reflejada.
Si la fibra no ha sido iniciada o ha finalizado, se lanza una [Error](#class.error).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La ruta completa y el nombre del fichero de la fibra reflejada.
Si la fibra reflejada se utiliza fuera de una función definida por el usuario, se devuelve **[null](#constant.null)**.

# ReflectionFiber::getExecutingLine

(PHP 8 &gt;= 8.1.0)

ReflectionFiber::getExecutingLine — Devuelve el número de línea del punto de ejecución actual

### Descripción

public **ReflectionFiber::getExecutingLine**(): [?](#language.types.null)[int](#language.types.integer)

Devuelve el número de línea del punto de ejecución actual de la [Fiber](#class.fiber) reflejada.
Si la fibra reflejada se utiliza fuera de una función definida por el usuario, **[null](#constant.null)** es devuelto.
Si la fibra no ha sido iniciada o ha finalizado, se lanza una [Error](#class.error).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de línea del punto de ejecución actual de la fibra.

# ReflectionFiber::getFiber

(PHP 8 &gt;= 8.1.0)

ReflectionFiber::getFiber — Devuelve la instancia de la Fibra reflejada

### Descripción

public **ReflectionFiber::getFiber**(): [Fiber](#class.fiber)

Devuelve la instancia de la [Fiber](#class.fiber) reflejada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La instancia de la [Fiber](#class.fiber) reflejada.

# ReflectionFiber::getTrace

(PHP 8 &gt;= 8.1.0)

ReflectionFiber::getTrace — Devuelve la traza de llamadas del punto de ejecución actual

### Descripción

public **ReflectionFiber::getTrace**([int](#language.types.integer) $options = **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**): [array](#language.types.array)

Devuelve la traza de llamadas del punto de ejecución actual de la [Fiber](#class.fiber) reflejada.

### Parámetros

     options


       El valor de options puede ser uno de los
       flags siguientes.







        <caption>**Opciones disponibles**</caption>



           Opción
           Descripción







            **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**


            Valor por defecto.





            **[DEBUG_BACKTRACE_IGNORE_ARGS](#constant.debug-backtrace-ignore-args)**


            No incluir la información de argumentos para las funciones en la
           traza de llamadas.










### Valores devueltos

La traza de llamadas del punto de ejecución actual de la fibra.

## Tabla de contenidos

- [ReflectionFiber::\_\_construct](#reflectionfiber.construct) — Construye un objeto ReflectionFiber
- [ReflectionFiber::getCallable](#reflectionfiber.getcallable) — Devuelve el callable utilizado para crear la Fibra
- [ReflectionFiber::getExecutingFile](#reflectionfiber.getexecutingfile) — Devuelve el nombre del fichero del punto de ejecución actual
- [ReflectionFiber::getExecutingLine](#reflectionfiber.getexecutingline) — Devuelve el número de línea del punto de ejecución actual
- [ReflectionFiber::getFiber](#reflectionfiber.getfiber) — Devuelve la instancia de la Fibra reflejada
- [ReflectionFiber::getTrace](#reflectionfiber.gettrace) — Devuelve la traza de llamadas del punto de ejecución actual

# La clase ReflectionIntersectionType

(PHP 8 &gt;= 8.1.0)

## Introducción

## Sinopsis de la Clase

     class **ReflectionIntersectionType**



     extends
      [ReflectionType](#class.reflectiontype)
     {

    /* Métodos */

public [getTypes](#reflectionintersectiontype.gettypes)(): [array](#language.types.array)

    /* Métodos heredados */
    public [ReflectionType::allowsNull](#reflectiontype.allowsnull)(): [bool](#language.types.boolean)

public [ReflectionType::\_\_toString](#reflectiontype.tostring)(): [string](#language.types.string)

}

# ReflectionIntersectionType::getTypes

(PHP 8 &gt;= 8.1.0)

ReflectionIntersectionType::getTypes — Devuelve los tipos incluidos en el tipo de intersección

### Descripción

public **ReflectionIntersectionType::getTypes**(): [array](#language.types.array)

Devuelve los tipos incluidos en el tipo de intersección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos [ReflectionType](#class.reflectiontype).

### Ejemplos

    **Ejemplo #1 Ejemplo de ReflectionIntersectionType::getTypes()**

&lt;?php

function someFunction(Iterator&amp;Countable $value) {}

$reflectionFunc = new ReflectionFunction('someFunction');
$reflectionParam = $reflectionFunc-&gt;getParameters()[0];

var_dump($reflectionParam-&gt;getType()-&gt;getTypes());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(2) {
[0] =&gt;
class ReflectionNamedType#4(0) {
}
[1] =&gt;
class ReflectionNamedType#5(0) {
}
}

### Ver también

    - [ReflectionType::allowsNull()](#reflectiontype.allowsnull) - Verifica si null es admitido

    - [ReflectionParameter::getType()](#reflectionparameter.gettype) - Obtiene el tipo del parámetro

## Tabla de contenidos

- [ReflectionIntersectionType::getTypes](#reflectionintersectiontype.gettypes) — Devuelve los tipos incluidos en el tipo de intersección

# La clase ReflectionReference

(PHP 7 &gt;= 7.4.0, PHP 8)

## Introducción

    La clase **ReflectionReference** proporciona
    información sobre una referencia.

## Sinopsis de la Clase

    ****




      final class **ReflectionReference**

     {


    /* Métodos */

public static [fromArrayElement](#reflectionreference.fromarrayelement)([array](#language.types.array) $array, [int](#language.types.integer)|[string](#language.types.string) $key): [?](#language.types.null)[ReflectionReference](#class.reflectionreference)
public [getId](#reflectionreference.getid)(): [string](#language.types.string)

}

# ReflectionReference::\_\_construct

(No version information available, might only be in Git)

ReflectionReference::\_\_construct — Constructor privado para impedir la instanciación directa

### Descripción

private **ReflectionReference::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

# ReflectionReference::fromArrayElement

(PHP 7 &gt;= 7.4.0, PHP 8)

ReflectionReference::fromArrayElement — Crear un ReflectionReference desde un elemento de un array

### Descripción

public static **ReflectionReference::fromArrayElement**([array](#language.types.array) $array, [int](#language.types.integer)|[string](#language.types.string) $key): [?](#language.types.null)[ReflectionReference](#class.reflectionreference)

Crear un [ReflectionReference](#class.reflectionreference) desde un elemento de un array.

### Parámetros

    array


      El array que contiene la referencia potencial.






    key


      La clave; sea un integer o un string.


### Valores devueltos

Devuelve una instancia de [ReflectionReference](#class.reflectionreference) si
$array[$key] es una referencia, o null en caso contrario.

### Errores/Excepciones

Si array no es un array, o key
no es un integer o string, se lanza una [TypeError](#class.typeerror).
Si $array[$key] no existe,
se lanza una [ReflectionException](#class.reflectionexception).

# ReflectionReference::getId

(PHP 7 &gt;= 7.4.0, PHP 8)

ReflectionReference::getId — Devuelve un ID único de una referencia

### Descripción

public **ReflectionReference::getId**(): [string](#language.types.string)

Devuelve un ID que es único para la referencia durante la vida útil de esta referencia.
Este ID puede ser utilizado para comparar referencias por igualdad, o para mantener un mapa de
referencias conocidas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) de formato no especificado.

### Ejemplos

**Ejemplo #1 Uso básico de ReflectionReference::getId()**

&lt;?php
$val1 = 'foo';
$val2 = 'bar';
$arr = [&amp;$val1, &amp;$val2, &amp;$val1];

$rr1 = ReflectionReference::fromArrayElement($arr, 0);
$rr2 = ReflectionReference::fromArrayElement($arr, 1);
$rr3 = ReflectionReference::fromArrayElement($arr, 2);

var_dump($rr1-&gt;getId() === $rr2-&gt;getId());
var_dump($rr1-&gt;getId() === $rr3-&gt;getId());
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)

## Tabla de contenidos

- [ReflectionReference::\_\_construct](#reflectionreference.construct) — Constructor privado para impedir la instanciación directa
- [ReflectionReference::fromArrayElement](#reflectionreference.fromarrayelement) — Crear un ReflectionReference desde un elemento de un array
- [ReflectionReference::getId](#reflectionreference.getid) — Devuelve un ID único de una referencia

# La clase ReflectionAttribute

(PHP 8)

## Introducción

    La clase **ReflectionAttribute** proporciona información sobre
    un [Atributo](#language.attributes).

## Sinopsis de la Clase

     class **ReflectionAttribute**



     implements
      [Reflector](#class.reflector) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof);


    /* Propiedades */
    public
     [string](#language.types.string)
      [$name](#reflectionattribute.props.name);


    /* Métodos */

private [\_\_construct](#reflectionattribute.construct)()

    public [getArguments](#reflectionattribute.getarguments)(): [array](#language.types.array)

public [getName](#reflectionattribute.getname)(): [string](#language.types.string)
public [getTarget](#reflectionattribute.gettarget)(): [int](#language.types.integer)
public [isRepeated](#reflectionattribute.isrepeated)(): [bool](#language.types.boolean)
public [newInstance](#reflectionattribute.newinstance)(): [object](#language.types.object)

}

## Propiedades

     name


       El nombre del atributo.



## Constantes predefinidas

    ## Banderas ReflectionAttribute





       **[ReflectionAttribute::IS_INSTANCEOF](#reflectionattribute.constants.is-instanceof)**
       [int](#language.types.integer)



        Devuelve los atributos con una
        verificación instanceof.







    **Nota**:



      Los valores de estas constantes pueden cambiar entre versiones de PHP.
      Se recomienda utilizar siempre las constantes y no confiar en los valores directamente.


## Historial de cambios

       Versión
       Descripción






       8.4.0

        Todas las constantes de clase ahora están tipadas.




       8.4.0

        Se añadió [ReflectionAttribute::$name](#reflectionattribute.props.name).





# ReflectionAttribute::\_\_construct

(PHP 8)

ReflectionAttribute::\_\_construct — Constructor privado para la desactivación de la instanciación

### Descripción

private **ReflectionAttribute::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

# ReflectionAttribute::getArguments

(PHP 8)

ReflectionAttribute::getArguments — Devuelve los argumentos pasados al atributo

### Descripción

public **ReflectionAttribute::getArguments**(): [array](#language.types.array)

Devuelve los argumentos pasados al atributo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los argumentos pasados al atributo.

# ReflectionAttribute::getName

(PHP 8)

ReflectionAttribute::getName — Devuelve el nombre del atributo

### Descripción

public **ReflectionAttribute::getName**(): [string](#language.types.string)

Devuelve el nombre del atributo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del atributo.

# ReflectionAttribute::getTarget

(PHP 8)

ReflectionAttribute::getTarget — Devuelve el objetivo del atributo como máscara de bits

### Descripción

public **ReflectionAttribute::getTarget**(): [int](#language.types.integer)

Devuelve el objetivo del atributo como máscara de bits.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Obtiene el objetivo del atributo en forma de máscara de bits
de las [\*_<a href="#constantes%20attribute.constants.target-_">constantes Attribute::TARGET\_\*](#attribute.constants)\*\*</a>.

# ReflectionAttribute::isRepeated

(PHP 8)

ReflectionAttribute::isRepeated — Indica si el atributo de este nombre ha sido repetido en elementos de código

### Descripción

public **ReflectionAttribute::isRepeated**(): [bool](#language.types.boolean)

Indica si el atributo de este nombre ha sido repetido en elementos de código.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** cuando el atributo está repetido, de lo contrario **[false](#constant.false)**.

# ReflectionAttribute::newInstance

(PHP 8)

ReflectionAttribute::newInstance — Instancia la clase del atributo representada por esta clase ReflectionAttribute y sus argumentos

### Descripción

public **ReflectionAttribute::newInstance**(): [object](#language.types.object)

Instancia la clase del atributo representada por esta clase ReflectionAttribute y sus argumentos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La nueva instancia del atributo.

## Tabla de contenidos

- [ReflectionAttribute::\_\_construct](#reflectionattribute.construct) — Constructor privado para la desactivación de la instanciación
- [ReflectionAttribute::getArguments](#reflectionattribute.getarguments) — Devuelve los argumentos pasados al atributo
- [ReflectionAttribute::getName](#reflectionattribute.getname) — Devuelve el nombre del atributo
- [ReflectionAttribute::getTarget](#reflectionattribute.gettarget) — Devuelve el objetivo del atributo como máscara de bits
- [ReflectionAttribute::isRepeated](#reflectionattribute.isrepeated) — Indica si el atributo de este nombre ha sido repetido en elementos de código
- [ReflectionAttribute::newInstance](#reflectionattribute.newinstance) — Instancia la clase del atributo representada por esta clase ReflectionAttribute y sus argumentos

# La interfaz Reflector

(PHP 5, PHP 7, PHP 8)

## Introducción

    **Reflector** es una interfaz implementada por todas
    las clases exportables Reflection.

## Sinopsis de la Interfaz

     interface **Reflector**

    extends
      [Stringable](#class.stringable) {

    /* Métodos heredados */

public [Stringable::\_\_toString](#stringable.tostring)(): [string](#language.types.string)

}

## Historial de cambios

       Versión
       Descripción






       8.0.0

        [Reflector::export()](#reflector.export) ha sido eliminado.




       8.0.0

        **Reflector** ahora extiende
        [Stringable](#class.stringable).
        Hereda [Stringable::__toString()](#stringable.tostring), reemplazando **Reflector::__toString()**.





## Ver también

     - [Reflector::export()](#reflector.export)

# Reflector::export

(PHP 5, PHP 7)

Reflector::export — Exporta

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

public static **Reflector::export**(): [string](#language.types.string)

Exporta.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido eliminada.




      7.4.0

       Esta función está obsoleta.



### Ver también

    - **Reflection::__toString()**

## Tabla de contenidos

- [Reflector::export](#reflector.export) — Exporta

# La clase ReflectionException

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase ReflectionException.

## Sinopsis de la Clase

     class **ReflectionException**



     extends
      [Exception](#class.exception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

# La enumeración PropertyHookType

(PHP 8 &gt;= 8.4)

## Introducción

    La enumeración **PropertyHookType** lista los tipos
    legales de [hook de propiedad](#language.oop5.property-hooks).

## Enum synopsis

    enum **PropertyHookType**

{

         case  Get
     ; //
      Indica un hook get.





         case  Set
     ; //
      Indica un hook set.


}

- [Introducción](#intro.reflection)
- [Ejemplos](#reflection.examples)
- [Extensión](#reflection.extending)
- [Reflection](#class.reflection) — La clase Reflection<li>[Reflection::export](#reflection.export) — Exporta
- [Reflection::getModifierNames](#reflection.getmodifiernames) — Obtiene los nombres de los modificadores
  </li>- [ReflectionClass](#class.reflectionclass) — La clase ReflectionClass<li>[ReflectionClass::__construct](#reflectionclass.construct) — Construye una ReflectionClass
- [ReflectionClass::export](#reflectionclass.export) — Exporta una clase
- [ReflectionClass::getAttributes](#reflectionclass.getattributes) — Recupera los atributos de una clase
- [ReflectionClass::getConstant](#reflectionclass.getconstant) — Obtiene una constante
- [ReflectionClass::getConstants](#reflectionclass.getconstants) — Obtener constantes
- [ReflectionClass::getConstructor](#reflectionclass.getconstructor) — Obtiene el constructor de una clase
- [ReflectionClass::getDefaultProperties](#reflectionclass.getdefaultproperties) — Obtiene las propiedades por defecto
- [ReflectionClass::getDocComment](#reflectionclass.getdoccomment) — Recupera los comentarios de documentación
- [ReflectionClass::getEndLine](#reflectionclass.getendline) — Obtiene el final de una línea
- [ReflectionClass::getExtension](#reflectionclass.getextension) — Obtiene un objeto ReflectionExtension para la extensión que define la clase
- [ReflectionClass::getExtensionName](#reflectionclass.getextensionname) — Obtiene el nombre de la extensión que define la clase
- [ReflectionClass::getFileName](#reflectionclass.getfilename) — Obtiene el nombre del fichero donde la clase ha sido declarada
- [ReflectionClass::getInterfaceNames](#reflectionclass.getinterfacenames) — Obtiene los nombres de las interfaces
- [ReflectionClass::getInterfaces](#reflectionclass.getinterfaces) — Obtiene las interfaces
- [ReflectionClass::getLazyInitializer](#reflectionclass.getlazyinitializer) — Devuelve el inicializador perezoso
- [ReflectionClass::getMethod](#reflectionclass.getmethod) — Obtiene un ReflectionMethod para un método de clase
- [ReflectionClass::getMethods](#reflectionclass.getmethods) — Obtiene un array de métodos
- [ReflectionClass::getModifiers](#reflectionclass.getmodifiers) — Obtiene los modificadores de clase
- [ReflectionClass::getName](#reflectionclass.getname) — Obtiene el nombre de la clase
- [ReflectionClass::getNamespaceName](#reflectionclass.getnamespacename) — Obtiene el espacio de nombres
- [ReflectionClass::getParentClass](#reflectionclass.getparentclass) — Obtiene la clase padre
- [ReflectionClass::getProperties](#reflectionclass.getproperties) — Obtiene las propiedades
- [ReflectionClass::getProperty](#reflectionclass.getproperty) — Obtiene un objeto ReflectionProperty para una propiedad de una clase
- [ReflectionClass::getReflectionConstant](#reflectionclass.getreflectionconstant) — Obtiene un ReflectionClassConstant para una constante de una clase
- [ReflectionClass::getReflectionConstants](#reflectionclass.getreflectionconstants) — Recupera las constantes de clase
- [ReflectionClass::getShortName](#reflectionclass.getshortname) — Obtiene el nombre corto de una clase
- [ReflectionClass::getStartLine](#reflectionclass.getstartline) — Obtiene el número de línea de inicio
- [ReflectionClass::getStaticProperties](#reflectionclass.getstaticproperties) — Obtiene las propiedades estáticas
- [ReflectionClass::getStaticPropertyValue](#reflectionclass.getstaticpropertyvalue) — Obtiene el valor de una propiedad estática
- [ReflectionClass::getTraitAliases](#reflectionclass.gettraitaliases) — Devuelve un array de alias del trait
- [ReflectionClass::getTraitNames](#reflectionclass.gettraitnames) — Devuelve un array de nombres de traits utilizados por esta clase
- [ReflectionClass::getTraits](#reflectionclass.gettraits) — Devuelve un array de los traits utilizados por esta clase
- [ReflectionClass::hasConstant](#reflectionclass.hasconstant) — Verifica si una constante está definida
- [ReflectionClass::hasMethod](#reflectionclass.hasmethod) — Verifica si un método está definido
- [ReflectionClass::hasProperty](#reflectionclass.hasproperty) — Verifica si una propiedad está definida
- [ReflectionClass::implementsInterface](#reflectionclass.implementsinterface) — Verifica si una clase implementa una interfaz
- [ReflectionClass::initializeLazyObject](#reflectionclass.initializelazyobject) — Forzar la inicialización de un objeto perezoso
- [ReflectionClass::inNamespace](#reflectionclass.innamespace) — Verifica si una clase está definida en un espacio de nombres
- [ReflectionClass::isAbstract](#reflectionclass.isabstract) — Verifica si una clase es abstracta
- [ReflectionClass::isAnonymous](#reflectionclass.isanonymous) — Verifica si la clase es anónima
- [ReflectionClass::isCloneable](#reflectionclass.iscloneable) — Proporciona información sobre la propiedad de duplicación de la clase
- [ReflectionClass::isEnum](#reflectionclass.isenum) — Verifica si una clase es una enumeración
- [ReflectionClass::isFinal](#reflectionclass.isfinal) — Verifica si una clase es final
- [ReflectionClass::isInstance](#reflectionclass.isinstance) — Verifica si una clase es una instancia de otra clase
- [ReflectionClass::isInstantiable](#reflectionclass.isinstantiable) — Verifica si una clase es instanciable
- [ReflectionClass::isInterface](#reflectionclass.isinterface) — Verifica si una clase es una interfaz
- [ReflectionClass::isInternal](#reflectionclass.isinternal) — Verifica si una clase está definida como interna por una extensión
- [ReflectionClass::isIterable](#reflectionclass.isiterable) — Verifica si esta clase es iterable
- [ReflectionClass::isIterateable](#reflectionclass.isiterateable) — Alias de ReflectionClass::isIterable
- [ReflectionClass::isReadOnly](#reflectionclass.isreadonly) — Verifica si una clase es de solo lectura
- [ReflectionClass::isSubclassOf](#reflectionclass.issubclassof) — Verifica si la clase es una subclase
- [ReflectionClass::isTrait](#reflectionclass.istrait) — Indica si se trata de un trait
- [ReflectionClass::isUninitializedLazyObject](#reflectionclass.isuninitializedlazyobject) — Verifica si un objeto es perezoso y no inicializado
- [ReflectionClass::isUserDefined](#reflectionclass.isuserdefined) — Verifica si una clase ha sido definida en el espacio de usuario
- [ReflectionClass::markLazyObjectAsInitialized](#reflectionclass.marklazyobjectasinitialized) — Marca un objeto perezoso como inicializado sin llamar al inicializador o a la fábrica
- [ReflectionClass::newInstance](#reflectionclass.newinstance) — Crear una nueva instancia de la clase utilizando los argumentos proporcionados
- [ReflectionClass::newInstanceArgs](#reflectionclass.newinstanceargs) — Crear una nueva instancia utilizando los argumentos proporcionados
- [ReflectionClass::newInstanceWithoutConstructor](#reflectionclass.newinstancewithoutconstructor) — Crea una nueva instancia de la clase sin invocar el constructor
- [ReflectionClass::newLazyGhost](#reflectionclass.newlazyghost) — Crear una nueva instancia fantasma perezosa
- [ReflectionClass::newLazyProxy](#reflectionclass.newlazyproxy) — Crear una nueva instancia proxy perezosa
- [ReflectionClass::resetAsLazyGhost](#reflectionclass.resetaslazyghost) — Reinicia un objeto y lo marca como perezoso
- [ReflectionClass::resetAsLazyProxy](#reflectionclass.resetaslazyproxy) — Reinicia un objeto y lo marca como perezoso
- [ReflectionClass::setStaticPropertyValue](#reflectionclass.setstaticpropertyvalue) — Define el valor de una propiedad estática pública
- [ReflectionClass::\_\_toString](#reflectionclass.tostring) — Crea una representación textual del objeto
  </li>- [ReflectionClassConstant](#class.reflectionclassconstant) — La classe ReflectionClassConstant<li>[ReflectionClassConstant::__construct](#reflectionclassconstant.construct) — Construye una ReflectionClassConstant
- [ReflectionClassConstant::export](#reflectionclassconstant.export) — Exporta
- [ReflectionClassConstant::getAttributes](#reflectionclassconstant.getattributes) — Verifica los atributos
- [ReflectionClassConstant::getDeclaringClass](#reflectionclassconstant.getdeclaringclass) — Obtiene la clase declarante
- [ReflectionClassConstant::getDocComment](#reflectionclassconstant.getdoccomment) — Obtiene el comentario de documentación
- [ReflectionClassConstant::getModifiers](#reflectionclassconstant.getmodifiers) — Obtiene los modificadores de la constante de clase
- [ReflectionClassConstant::getName](#reflectionclassconstant.getname) — Obtiene el nombre de la constante
- [ReflectionClassConstant::getType](#reflectionclassconstant.gettype) — Devuelve el tipo de una constante de clase
- [ReflectionClassConstant::getValue](#reflectionclassconstant.getvalue) — Obtiene el valor
- [ReflectionClassConstant::hasType](#reflectionclassconstant.hastype) — Verifica si una constante de clase tiene un tipo
- [ReflectionClassConstant::isDeprecated](#reflectionclassconstant.isdeprecated) — Verifica la deprecación
- [ReflectionClassConstant::isEnumCase](#reflectionclassconstant.isenumcase) — Verifica si la constante de clase es un caso de enumeración
- [ReflectionClassConstant::isFinal](#reflectionclassconstant.isfinal) — Verifica si la constante de clase es final
- [ReflectionClassConstant::isPrivate](#reflectionclassconstant.isprivate) — Verifica si la constante de clase es privada
- [ReflectionClassConstant::isProtected](#reflectionclassconstant.isprotected) — Verifica si la constante de clase es protegida
- [ReflectionClassConstant::isPublic](#reflectionclassconstant.ispublic) — Verifica si la constante de clase es pública
- [ReflectionClassConstant::\_\_toString](#reflectionclassconstant.tostring) — Devuelve la representación en forma de string del objeto ReflectionClassConstant
  </li>- [ReflectionConstant](#class.reflectionconstant) — La clase ReflectionConstant<li>[ReflectionConstant::__construct](#reflectionconstant.construct) — Construye un ReflectionConstant
- [ReflectionConstant::getExtension](#reflectionconstant.getextension) — Devuelve la ReflectionExtension de la extensión definitoria
- [ReflectionConstant::getExtensionName](#reflectionconstant.getextensionname) — Devuelve el nombre de la extensión definitoria
- [ReflectionConstant::getFileName](#reflectionconstant.getfilename) — Devuelve el nombre del fichero que define
- [ReflectionConstant::getName](#reflectionconstant.getname) — Devuelve el nombre
- [ReflectionConstant::getNamespaceName](#reflectionconstant.getnamespacename) — Devuelve el nombre del espacio de nombres
- [ReflectionConstant::getShortName](#reflectionconstant.getshortname) — Devuelve el nombre corto
- [ReflectionConstant::getValue](#reflectionconstant.getvalue) — Devuelve el valor
- [ReflectionConstant::isDeprecated](#reflectionconstant.isdeprecated) — Verifica la deprecación
- [ReflectionConstant::\_\_toString](#reflectionconstant.tostring) — Devuelve la representación en forma de string
  </li>- [ReflectionEnum](#class.reflectionenum) — La clase ReflectionEnum<li>[ReflectionEnum::__construct](#reflectionenum.construct) — Instancia un nuevo objeto ReflectionEnum
- [ReflectionEnum::getBackingType](#reflectionenum.getbackingtype) — Devuelve el tipo base de una enumeración, si está presente
- [ReflectionEnum::getCase](#reflectionenum.getcase) — Devuelve un caso específico de una enumeración
- [ReflectionEnum::getCases](#reflectionenum.getcases) — Devuelve la lista de todos los casos de una enumeración
- [ReflectionEnum::hasCase](#reflectionenum.hascase) — Verifica un caso en una enumeración
- [ReflectionEnum::isBacked](#reflectionenum.isbacked) — Determina si una enumeración es una enumeración con valor base
  </li>- [ReflectionEnumUnitCase](#class.reflectionenumunitcase) — La clase ReflectionEnumUnitCase<li>[ReflectionEnumUnitCase::__construct](#reflectionenumunitcase.construct) — Instancia un objeto ReflectionEnumUnitCase
- [ReflectionEnumUnitCase::getEnum](#reflectionenumunitcase.getenum) — Devuelve la reflexión de la enumeración de este caso
- [ReflectionEnumUnitCase::getValue](#reflectionenumunitcase.getvalue) — Devuelve el objeto del caso de enumeración descrito por este objeto de reflexión
  </li>- [ReflectionEnumBackedCase](#class.reflectionenumbackedcase) — La clase ReflectionEnumBackedCase<li>[ReflectionEnumBackedCase::__construct](#reflectionenumbackedcase.construct) — Instancia un objeto ReflectionEnumBackedCase
- [ReflectionEnumBackedCase::getBackingValue](#reflectionenumbackedcase.getbackingvalue) — Devuelve el valor escalar de base de este caso de enumeración
  </li>- [ReflectionZendExtension](#class.reflectionzendextension) — La clase ReflectionZendExtension<li>[ReflectionZendExtension::__clone](#reflectionzendextension.clone) — Gestor de clonación
- [ReflectionZendExtension::\_\_construct](#reflectionzendextension.construct) — Construye un objeto ReflectionZendExtension
- [ReflectionZendExtension::export](#reflectionzendextension.export) — Exportar
- [ReflectionZendExtension::getAuthor](#reflectionzendextension.getauthor) — Obtiene el autor
- [ReflectionZendExtension::getCopyright](#reflectionzendextension.getcopyright) — Obtiene el copyright
- [ReflectionZendExtension::getName](#reflectionzendextension.getname) — Obtiene el nombre
- [ReflectionZendExtension::getURL](#reflectionzendextension.geturl) — Obtiene la URL
- [ReflectionZendExtension::getVersion](#reflectionzendextension.getversion) — Obtiene la versión
- [ReflectionZendExtension::\_\_toString](#reflectionzendextension.tostring) — Gestor de conversión a string
  </li>- [ReflectionExtension](#class.reflectionextension) — La clase ReflectionExtension<li>[ReflectionExtension::__clone](#reflectionextension.clone) — Clonación
- [ReflectionExtension::\_\_construct](#reflectionextension.construct) — Construye un nuevo objeto ReflectionExtension
- [ReflectionExtension::export](#reflectionextension.export) — Exportación
- [ReflectionExtension::getClasses](#reflectionextension.getclasses) — Obtiene las clases
- [ReflectionExtension::getClassNames](#reflectionextension.getclassnames) — Obtiene los nombres de las clases
- [ReflectionExtension::getConstants](#reflectionextension.getconstants) — Obtiene las constantes
- [ReflectionExtension::getDependencies](#reflectionextension.getdependencies) — Obtiene las dependencias
- [ReflectionExtension::getFunctions](#reflectionextension.getfunctions) — Obtiene las funciones de una extensión
- [ReflectionExtension::getINIEntries](#reflectionextension.getinientries) — Recupera las entradas ini de la extensión
- [ReflectionExtension::getName](#reflectionextension.getname) — Obtiene el nombre de la extensión
- [ReflectionExtension::getVersion](#reflectionextension.getversion) — Obtiene la versión de la extensión
- [ReflectionExtension::info](#reflectionextension.info) — Muestra información sobre la extensión
- [ReflectionExtension::isPersistent](#reflectionextension.ispersistent) — Verifica si la extensión es persistente
- [ReflectionExtension::isTemporary](#reflectionextension.istemporary) — Verifica si la extensión es temporal
- [ReflectionExtension::\_\_toString](#reflectionextension.tostring) — Obtiene una representación textual
  </li>- [ReflectionFunction](#class.reflectionfunction) — La clase ReflectionFunction<li>[ReflectionFunction::__construct](#reflectionfunction.construct) — Construye un nuevo objeto ReflectionFunction
- [ReflectionFunction::export](#reflectionfunction.export) — Exporta una función
- [ReflectionFunction::getClosure](#reflectionfunction.getclosure) — Devuelve un cierre creado dinámicamente para la función
- [ReflectionFunction::invoke](#reflectionfunction.invoke) — Invoca una función
- [ReflectionFunction::invokeArgs](#reflectionfunction.invokeargs) — Invoca los argumentos de una función
- [ReflectionFunction::isAnonymous](#reflectionfunction.isanonymous) — Verifica si la función es anónima
- [ReflectionFunction::isDisabled](#reflectionfunction.isdisabled) — Verifica si una función está deshabilitada
- [ReflectionFunction::\_\_toString](#reflectionfunction.tostring) — Devuelve una representación textual del objeto ReflectionFunction
  </li>- [ReflectionFunctionAbstract](#class.reflectionfunctionabstract) — La clase ReflectionFunctionAbstract<li>[ReflectionFunctionAbstract::__clone](#reflectionfunctionabstract.clone) — Clona una función
- [ReflectionFunctionAbstract::getAttributes](#reflectionfunctionabstract.getattributes) — Devuelve los atributos
- [ReflectionFunctionAbstract::getClosureCalledClass](#reflectionfunctionabstract.getclosurecalledclass) — Devuelve la clase correspondiente a static:: dentro de una función anónima
- [ReflectionFunctionAbstract::getClosureScopeClass](#reflectionfunctionabstract.getclosurescopeclass) — Devuelve la clase correspondiente al contexto interno de una función anónima
- [ReflectionFunctionAbstract::getClosureThis](#reflectionfunctionabstract.getclosurethis) — Devuelve el objeto que corresponde a $this dentro de una closure
- [ReflectionFunctionAbstract::getClosureUsedVariables](#reflectionfunctionabstract.getclosureusedvariables) — Devuelve un array de las variables utilizadas en la Closure
- [ReflectionFunctionAbstract::getDocComment](#reflectionfunctionabstract.getdoccomment) — Obtiene un comentario
- [ReflectionFunctionAbstract::getEndLine](#reflectionfunctionabstract.getendline) — Obtiene el número de la última línea
- [ReflectionFunctionAbstract::getExtension](#reflectionfunctionabstract.getextension) — Obtiene las informaciones de una extensión
- [ReflectionFunctionAbstract::getExtensionName](#reflectionfunctionabstract.getextensionname) — Obtiene el nombre de la extensión
- [ReflectionFunctionAbstract::getFileName](#reflectionfunctionabstract.getfilename) — Obtiene el nombre del fichero
- [ReflectionFunctionAbstract::getName](#reflectionfunctionabstract.getname) — Obtiene el nombre de una función
- [ReflectionFunctionAbstract::getNamespaceName](#reflectionfunctionabstract.getnamespacename) — Obtiene el espacio de nombres
- [ReflectionFunctionAbstract::getNumberOfParameters](#reflectionfunctionabstract.getnumberofparameters) — Obtiene el número de argumentos
- [ReflectionFunctionAbstract::getNumberOfRequiredParameters](#reflectionfunctionabstract.getnumberofrequiredparameters) — Obtiene el número de argumentos requeridos
- [ReflectionFunctionAbstract::getParameters](#reflectionfunctionabstract.getparameters) — Obtiene los parámetros
- [ReflectionFunctionAbstract::getReturnType](#reflectionfunctionabstract.getreturntype) — Obtiene el tipo de retorno definido para una función
- [ReflectionFunctionAbstract::getShortName](#reflectionfunctionabstract.getshortname) — Obtiene el nombre corto de una función
- [ReflectionFunctionAbstract::getStartLine](#reflectionfunctionabstract.getstartline) — Obtiene el número de línea de inicio
- [ReflectionFunctionAbstract::getStaticVariables](#reflectionfunctionabstract.getstaticvariables) — Obtiene las variables estáticas
- [ReflectionFunctionAbstract::getTentativeReturnType](#reflectionfunctionabstract.gettentativereturntype) — Devuelve el tipo de retorno provisional asociado con esta función
- [ReflectionFunctionAbstract::hasReturnType](#reflectionfunctionabstract.hasreturntype) — Verifica si la función tiene un tipo de retorno definido
- [ReflectionFunctionAbstract::hasTentativeReturnType](#reflectionfunctionabstract.hastentativereturntype) — Indica si la función tiene un tipo de retorno provisional
- [ReflectionFunctionAbstract::inNamespace](#reflectionfunctionabstract.innamespace) — Verifica si una función está en un espacio de nombres
- [ReflectionFunctionAbstract::isClosure](#reflectionfunctionabstract.isclosure) — Verifica si es una función anónima
- [ReflectionFunctionAbstract::isDeprecated](#reflectionfunctionabstract.isdeprecated) — Verifica si la función es obsoleta
- [ReflectionFunctionAbstract::isGenerator](#reflectionfunctionabstract.isgenerator) — Verifica si la función es un generador
- [ReflectionFunctionAbstract::isInternal](#reflectionfunctionabstract.isinternal) — Verifica si la función es una función interna
- [ReflectionFunctionAbstract::isStatic](#reflectiofunctionabstract.isstatic) — Verifica si la función es estática
- [ReflectionFunctionAbstract::isUserDefined](#reflectionfunctionabstract.isuserdefined) — Verifica si la función está definida en el espacio de usuario
- [ReflectionFunctionAbstract::isVariadic](#reflectionfunctionabstract.isvariadic) — Verifica si la función es variádica
- [ReflectionFunctionAbstract::returnsReference](#reflectionfunctionabstract.returnsreference) — Verifica si la función devuelve una referencia
- [ReflectionFunctionAbstract::\_\_toString](#reflectionfunctionabstract.tostring) — Obtiene una representación textual de un objeto ReflectionFunctionAbstract
  </li>- [ReflectionMethod](#class.reflectionmethod) — La clase ReflectionMethod<li>[ReflectionMethod::__construct](#reflectionmethod.construct) — Construye un nuevo objeto ReflectionMethod
- [ReflectionMethod::createFromMethodName](#reflectionmethod.createfrommethodname) — Crear una nueva ReflectionMethod
- [ReflectionMethod::export](#reflectionmethod.export) — Exportación de un método de reflexión
- [ReflectionMethod::getClosure](#reflectionmethod.getclosure) — Devuelve una función anónima creada dinámicamente para el método
- [ReflectionMethod::getDeclaringClass](#reflectionmethod.getdeclaringclass) — Obtiene la declaración de la clase del método reflejado
- [ReflectionMethod::getModifiers](#reflectionmethod.getmodifiers) — Obtiene los modificadores del método
- [ReflectionMethod::getPrototype](#reflectionmethod.getprototype) — Obtiene el prototipo del método (si existe)
- [ReflectionMethod::hasPrototype](#reflectionmethod.hasprototype) — Indica si el método tiene un prototipo
- [ReflectionMethod::invoke](#reflectionmethod.invoke) — Invoca
- [ReflectionMethod::invokeArgs](#reflectionmethod.invokeargs) — Invoca los argumentos
- [ReflectionMethod::isAbstract](#reflectionmethod.isabstract) — Verifica si el método es abstracto
- [ReflectionMethod::isConstructor](#reflectionmethod.isconstructor) — Verifica si el método es un constructor
- [ReflectionMethod::isDestructor](#reflectionmethod.isdestructor) — Verifica si el método es un destructor
- [ReflectionMethod::isFinal](#reflectionmethod.isfinal) — Verifica si el método es final
- [ReflectionMethod::isPrivate](#reflectionmethod.isprivate) — Verifica si el método es privado
- [ReflectionMethod::isProtected](#reflectionmethod.isprotected) — Verifica si el método es protegido
- [ReflectionMethod::isPublic](#reflectionmethod.ispublic) — Verifica si el método es público
- [ReflectionMethod::setAccessible](#reflectionmethod.setaccessible) — Define la accesibilidad del método
- [ReflectionMethod::\_\_toString](#reflectionmethod.tostring) — Devuelve una representación textual del método
  </li>- [ReflectionNamedType](#class.reflectionnamedtype) — La clase ReflectionNamedType<li>[ReflectionNamedType::getName](#reflectionnamedtype.getname) — Obtiene el nombre del tipo como string
- [ReflectionNamedType::isBuiltin](#reflectionnamedtype.isbuiltin) — Verifica si es un tipo integrado
  </li>- [ReflectionObject](#class.reflectionobject) — La clase ReflectionObject<li>[ReflectionObject::__construct](#reflectionobject.construct) — Construye un nuevo objeto ReflectionObject
- [ReflectionObject::export](#reflectionobject.export) — Exportación
  </li>- [ReflectionParameter](#class.reflectionparameter) — La clase ReflectionParameter<li>[ReflectionParameter::allowsNull](#reflectionparameter.allowsnull) — Verifica si el valor null está permitido como valor del argumento
- [ReflectionParameter::canBePassedByValue](#reflectionparameter.canbepassedbyvalue) — Verifica si el parámetro puede ser pasado por valor
- [ReflectionParameter::\_\_clone](#reflectionparameter.clone) — Clonación
- [ReflectionParameter::\_\_construct](#reflectionparameter.construct) — Constructor
- [ReflectionParameter::export](#reflectionparameter.export) — Exportación
- [ReflectionParameter::getAttributes](#reflectionparameter.getattributes) — Devuelve los atributos
- [ReflectionParameter::getClass](#reflectionparameter.getclass) — Obtiene un objeto ReflectionClass para el parámetro que se está reflejando o null
- [ReflectionParameter::getDeclaringClass](#reflectionparameter.getdeclaringclass) — Obtiene la clase declarante
- [ReflectionParameter::getDeclaringFunction](#reflectionparameter.getdeclaringfunction) — Obtiene la función declarante
- [ReflectionParameter::getDefaultValue](#reflectionparameter.getdefaultvalue) — Obtiene el valor por defecto del argumento
- [ReflectionParameter::getDefaultValueConstantName](#reflectionparameter.getdefaultvalueconstantname) — Devuelve el nombre de la constante del valor por defecto si el valor es una constante o null
- [ReflectionParameter::getName](#reflectionparameter.getname) — Obtiene el nombre del argumento
- [ReflectionParameter::getPosition](#reflectionparameter.getposition) — Obtiene la posición de un argumento
- [ReflectionParameter::getType](#reflectionparameter.gettype) — Obtiene el tipo del parámetro
- [ReflectionParameter::hasType](#reflectionparameter.hastype) — Verifica si un parámetro tiene un tipo
- [ReflectionParameter::isArray](#reflectionparameter.isarray) — Verifica si el parámetro espera un array
- [ReflectionParameter::isCallable](#reflectionparameter.iscallable) — Verifica si el parámetro es de tipo callable
- [ReflectionParameter::isDefaultValueAvailable](#reflectionparameter.isdefaultvalueavailable) — Verifica si un valor por defecto está disponible para el parámetro
- [ReflectionParameter::isDefaultValueConstant](#reflectionparameter.isdefaultvalueconstant) — Verifica si el valor por defecto del argumento es una constante
- [ReflectionParameter::isOptional](#reflectionparameter.isoptional) — Verifica si el parámetro es opcional
- [ReflectionParameter::isPassedByReference](#reflectionparameter.ispassedbyreference) — Verifica si el parámetro es pasado por referencia
- [ReflectionParameter::isPromoted](#reflectionparameter.ispromoted) — Verifica si un parámetro es promovido como propiedad
- [ReflectionParameter::isVariadic](#reflectionparameter.isvariadic) — Verifica si el parámetro es variádico
- [ReflectionParameter::\_\_toString](#reflectionparameter.tostring) — Obtiene una representación textual
  </li>- [ReflectionProperty](#class.reflectionproperty) — La clase ReflectionProperty<li>[ReflectionProperty::__clone](#reflectionproperty.clone) — Clonación
- [ReflectionProperty::\_\_construct](#reflectionproperty.construct) — Construye un nuevo objeto ReflectionProperty
- [ReflectionProperty::export](#reflectionproperty.export) — Exporta
- [ReflectionProperty::getAttributes](#reflectionproperty.getattributes) — Devuelve los atributos
- [ReflectionProperty::getDeclaringClass](#reflectionproperty.getdeclaringclass) — Obtiene la clase declarante
- [ReflectionProperty::getDefaultValue](#reflectionproperty.getdefaultvalue) — Devuelve el valor por defecto definido para una propiedad
- [ReflectionProperty::getDocComment](#reflectionproperty.getdoccomment) — Recupera el comentario de documentación de una propiedad
- [ReflectionProperty::getHook](#reflectionproperty.gethook) — Devuelve un objeto de reflexión para un hook dado
- [ReflectionProperty::getHooks](#reflectionproperty.gethooks) — Devuelve un array de todos los hooks en esta propiedad
- [ReflectionProperty::getModifiers](#reflectionproperty.getmodifiers) — Obtiene los modificadores de propiedad
- [ReflectionProperty::getName](#reflectionproperty.getname) — Obtiene el nombre de la propiedad
- [ReflectionProperty::getRawValue](#reflectionproperty.getrawvalue) — Devuelve el valor de la propiedad, evitando un hook get si está definido
- [ReflectionProperty::getSettableType](#reflectionproperty.getsettabletype) — Devuelve el tipo de argumento de un hook setter
- [ReflectionProperty::getType](#reflectionproperty.gettype) — Obtiene el tipo de una propiedad
- [ReflectionProperty::getValue](#reflectionproperty.getvalue) — Obtiene el valor de la propiedad
- [ReflectionProperty::hasDefaultValue](#reflectionproperty.hasdefaultvalue) — Verifica si la propiedad tiene un valor por omisión
- [ReflectionProperty::hasHook](#reflectionproperty.hashook) — Indica si la propiedad tiene un hook dado definido
- [ReflectionProperty::hasHooks](#reflectionproperty.hashooks) — Indica si la propiedad tiene hooks definidos
- [ReflectionProperty::hasType](#reflectionproperty.hastype) — Verifica si la propiedad tiene un tipo
- [ReflectionProperty::isAbstract](#reflectionproperty.isabstract) — Determina si una propiedad es abstracta
- [ReflectionProperty::isDefault](#reflectionproperty.isdefault) — Verifica si la propiedad es la predeterminada
- [ReflectionProperty::isDynamic](#reflectionproperty.isdynamic) — Verifica si la propiedad es una propiedad dinámica
- [ReflectionProperty::isFinal](#reflectionproperty.isfinal) — Determina si la propiedad es final o no
- [ReflectionProperty::isInitialized](#reflectionproperty.isinitialized) — Verifica si una propiedad está inicializada
- [ReflectionProperty::isLazy](#reflectionproperty.islazy) — Verifica si una propiedad es perezosa
- [ReflectionProperty::isPrivate](#reflectionproperty.isprivate) — Verifica si la propiedad es privada
- [ReflectionProperty::isPrivateSet](#reflectionproperty.isprivateset) — Verifica si la propiedad es privada en escritura
- [ReflectionProperty::isPromoted](#reflectionproperty.ispromoted) — Verifica si la propiedad está promovida
- [ReflectionProperty::isProtected](#reflectionproperty.isprotected) — Verifica si la propiedad es protegida
- [ReflectionProperty::isProtectedSet](#reflectionproperty.isprotectedset) — Verifica si la propiedad es protected en escritura
- [ReflectionProperty::isPublic](#reflectionproperty.ispublic) — Verifica si la propiedad es pública
- [ReflectionProperty::isReadOnly](#reflectionproperty.isreadonly) — Verifica si la propiedad es de solo lectura
- [ReflectionProperty::isStatic](#reflectionproperty.isstatic) — Verifica si la propiedad es estática
- [ReflectionProperty::isVirtual](#reflectionproperty.isvirtual) — Determina si la propiedad es virtual
- [ReflectionProperty::setAccessible](#reflectionproperty.setaccessible) — Define la accesibilidad de una propiedad
- [ReflectionProperty::setRawValue](#reflectionproperty.setrawvalue) — Define la valor de una propiedad, omitiendo un hook de definición si está definido
- [ReflectionProperty::setRawValueWithoutLazyInitialization](#reflectionproperty.setrawvaluewithoutlazyinitialization) — Define el valor bruto de una propiedad sin activar la inicialización perezosa
- [ReflectionProperty::setValue](#reflectionproperty.setvalue) — Define el valor de la propiedad
- [ReflectionProperty::skipLazyInitialization](#reflectionproperty.skiplazyinitialization) — Marca una propiedad como no perezosa
- [ReflectionProperty::\_\_toString](#reflectionproperty.tostring) — Obtiene una representación textual
  </li>- [ReflectionType](#class.reflectiontype) — La clase ReflectionType<li>[ReflectionType::allowsNull](#reflectiontype.allowsnull) — Verifica si null es admitido
- [ReflectionType::\_\_toString](#reflectiontype.tostring) — Conversión a string
  </li>- [ReflectionUnionType](#class.reflectionuniontype) — La clase ReflectionUnionType<li>[ReflectionUnionType::getTypes](#reflectionuniontype.gettypes) — Devuelve los tipos incluidos en la unión
  </li>- [ReflectionGenerator](#class.reflectiongenerator) — La clase ReflectionGenerator<li>[ReflectionGenerator::__construct](#reflectiongenerator.construct) — Construye un objeto ReflectionGenerator
- [ReflectionGenerator::getExecutingFile](#reflectiongenerator.getexecutingfile) — Obtiene el nombre de fichero del generador actualmente ejecutado
- [ReflectionGenerator::getExecutingGenerator](#reflectiongenerator.getexecutinggenerator) — Obtiene el objeto Generator ejecutado
- [ReflectionGenerator::getExecutingLine](#reflectiongenerator.getexecutingline) — Obtiene la línea actualmente ejecutada del generador
- [ReflectionGenerator::getFunction](#reflectiongenerator.getfunction) — Obtiene el nombre de función del generador
- [ReflectionGenerator::getThis](#reflectiongenerator.getthis) — Obtiene el valor de $this del generador
- [ReflectionGenerator::getTrace](#reflectiongenerator.gettrace) — Obtiene la traza del generador en ejecución
- [ReflectionGenerator::isClosed](#reflectiongenerator.isclosed) — Verifica si la ejecución ha finalizado
  </li>- [ReflectionFiber](#class.reflectionfiber) — La clase ReflectionFiber<li>[ReflectionFiber::__construct](#reflectionfiber.construct) — Construye un objeto ReflectionFiber
- [ReflectionFiber::getCallable](#reflectionfiber.getcallable) — Devuelve el callable utilizado para crear la Fibra
- [ReflectionFiber::getExecutingFile](#reflectionfiber.getexecutingfile) — Devuelve el nombre del fichero del punto de ejecución actual
- [ReflectionFiber::getExecutingLine](#reflectionfiber.getexecutingline) — Devuelve el número de línea del punto de ejecución actual
- [ReflectionFiber::getFiber](#reflectionfiber.getfiber) — Devuelve la instancia de la Fibra reflejada
- [ReflectionFiber::getTrace](#reflectionfiber.gettrace) — Devuelve la traza de llamadas del punto de ejecución actual
  </li>- [ReflectionIntersectionType](#class.reflectionintersectiontype) — La clase ReflectionIntersectionType<li>[ReflectionIntersectionType::getTypes](#reflectionintersectiontype.gettypes) — Devuelve los tipos incluidos en el tipo de intersección
  </li>- [ReflectionReference](#class.reflectionreference) — La clase ReflectionReference<li>[ReflectionReference::__construct](#reflectionreference.construct) — Constructor privado para impedir la instanciación directa
- [ReflectionReference::fromArrayElement](#reflectionreference.fromarrayelement) — Crear un ReflectionReference desde un elemento de un array
- [ReflectionReference::getId](#reflectionreference.getid) — Devuelve un ID único de una referencia
  </li>- [ReflectionAttribute](#class.reflectionattribute) — La clase ReflectionAttribute<li>[ReflectionAttribute::__construct](#reflectionattribute.construct) — Constructor privado para la desactivación de la instanciación
- [ReflectionAttribute::getArguments](#reflectionattribute.getarguments) — Devuelve los argumentos pasados al atributo
- [ReflectionAttribute::getName](#reflectionattribute.getname) — Devuelve el nombre del atributo
- [ReflectionAttribute::getTarget](#reflectionattribute.gettarget) — Devuelve el objetivo del atributo como máscara de bits
- [ReflectionAttribute::isRepeated](#reflectionattribute.isrepeated) — Indica si el atributo de este nombre ha sido repetido en elementos de código
- [ReflectionAttribute::newInstance](#reflectionattribute.newinstance) — Instancia la clase del atributo representada por esta clase ReflectionAttribute y sus argumentos
  </li>- [Reflector](#class.reflector) — La interfaz Reflector<li>[Reflector::export](#reflector.export) — Exporta
  </li>- [ReflectionException](#class.reflectionexception) — La clase ReflectionException
- [PropertyHookType](#enum.propertyhooktype) — La enumeración PropertyHookType
