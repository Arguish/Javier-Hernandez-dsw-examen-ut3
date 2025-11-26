# Lua

# Introducción

"Lua es un lenguaje de programación muy potente, rápido, ligero e integrable."
Esta extensión incorpora el intérprete de Lua y ofrece una API Orientada a Objectos a las
variables y funciones de Lua.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#lua.requirements)
- [Instalación](#lua.installation)

    ## Requerimientos

    Para utilizar esta extensión, debe instalarse Lua, disponible en la página del [» proyecto Lua](http://www.lua.org/).

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/lua](https://pecl.php.net/package/lua).

# La clase Lua

(PECL lua &gt;=0.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Lua**

     {

    /* Constants */

     const
     [string](#language.types.string)
      [LUA_VERSION](#lua.constants.lua-version) = Lua 5.1.4;


    /* Métodos */

public [assign](#lua.assign)([string](#language.types.string) $name, [string](#language.types.string) $value): [mixed](#language.types.mixed)
public [call](#lua.call)([callable](#language.types.callable) $lua_func, [array](#language.types.array) $args = ?, [int](#language.types.integer) $use_self = 0): [mixed](#language.types.mixed)
public [\_\_call](#lua.call)([callable](#language.types.callable) $lua_func, [array](#language.types.array) $args = ?, [int](#language.types.integer) $use_self = 0): [mixed](#language.types.mixed)
public [\_\_construct](#lua.construct)([string](#language.types.string) $lua_script_file = NULL)
public [eval](#lua.eval)([string](#language.types.string) $statements): [mixed](#language.types.mixed)
public [getVersion](#lua.getversion)(): [string](#language.types.string)
public [include](#lua.include)([string](#language.types.string) $file): [mixed](#language.types.mixed)
public [registerCallback](#lua.registercallback)([string](#language.types.string) $name, [callable](#language.types.callable) $function): [mixed](#language.types.mixed)

}

## Constantes predefinidas

      **[Lua::LUA_VERSION](#lua.constants.lua-version)**







# Lua::assign

(PECL lua &gt;=0.9.0)

Lua::assign — Asigna una variable de PHP a Lua

### Descripción

public **Lua::assign**([string](#language.types.string) $name, [string](#language.types.string) $value): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

Devuelve $this o **[null](#constant.null)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de Lua::assign()**

&lt;?php
$lua = new Lua();
$lua-&gt;assign("php_var", array(1=&gt;1, 2, 3)); //índice de la tabla empieza en 1
$lua-&gt;eval(&lt;&lt;&lt;CODE
print(php_var);
CODE
);
?&gt;

El ejemplo anterior mostrará:

Array
(
[1] =&gt; 1
[2] =&gt; 2
[3] =&gt; 3
)

# Lua::call

# Lua::\_\_call

(PECL lua &gt;=0.9.0)

Lua::call -- Lua::\_\_call — Llama funciones de Lua

### Descripción

public **Lua::call**([callable](#language.types.callable) $lua_func, [array](#language.types.array) $args = ?, [int](#language.types.integer) $use_self = 0): [mixed](#language.types.mixed)

public **Lua::\_\_call**([callable](#language.types.callable) $lua_func, [array](#language.types.array) $args = ?, [int](#language.types.integer) $use_self = 0): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    lua_func


       Nombre de la función en Lua






    args


       Argumentos pasados a la función de Lua






    use_self


       Cuando se debe usar self


### Valores devueltos

Devuelve el resultado de la función llamada, **[null](#constant.null)** si los argumentos son inválidos o
**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de la función Lua::call()**

&lt;?php
$lua = new Lua();
$lua-&gt;eval(&lt;&lt;&lt;CODE
function dummy(foo, bar)
print(foo, ",", bar)
end
CODE
);
$lua-&gt;call("dummy", array("Lua", "geiliable\n"));
var_dump($lua-&gt;call(array("table", "concat"), array(array(1=&gt;1, 2=&gt;2, 3=&gt;3), "-")));
?&gt;

Resultado del ejemplo anterior es similar a:

Lua,geiliable
string(5) "1-2-3"

### Ver también

- [Lua::\_\_call](#object.call)

# Lua::\_\_construct

(PECL lua &gt;=0.9.0)

Lua::\_\_construct — Constructor Lua

### Descripción

public **Lua::\_\_construct**([string](#language.types.string) $lua_script_file = NULL)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    lua_script_file




### Valores devueltos

# Lua::eval

(PECL lua &gt;=0.9.0)

Lua::eval — Evalúa una cadena de texto como código Lua

### Descripción

public **Lua::eval**([string](#language.types.string) $statements): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    statements





### Valores devueltos

Devuelve el resultado del código evaluado, **[null](#constant.null)** si los parámetros son inválidos o **[false](#constant.false)** en
caseo de error.

### Ejemplos

**Ejemplo #1 Ejemplo de la función Lua::eval()**

&lt;?php
$lua = new Lua();
$lua-&gt;eval(&lt;&lt;&lt;CODE
print(2);
CODE
);
?&gt;

El ejemplo anterior mostrará:

2

# Lua::getVersion

(PECL lua &gt;=0.9.0)

Lua::getVersion — Obtiene la versión

### Descripción

public **Lua::getVersion**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve Lua::LUA_VERSION.

# Lua::include

(PECL lua &gt;=0.9.0)

Lua::include — Analiza un fichero script Lua

### Descripción

public **Lua::include**([string](#language.types.string) $file): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    file





### Valores devueltos

Devuelve el resultado del código incluido, **[null](#constant.null)** en caso que los argumentos pasados sean erróneos o **[false](#constant.false)**
para cualquier otro tipo de error.

# Lua::registerCallback

(No version information available, might only be in Git)

Lua::registerCallback — Registra una función PHP en Lua

### Descripción

public **Lua::registerCallback**([string](#language.types.string) $name, [callable](#language.types.callable) $function): [mixed](#language.types.mixed)

    Registra una función PHP en Lua con el nombre de función que se indique en "$name"

### Parámetros

    name









    function


      Una función de llamada de retorno válida PHP


### Valores devueltos

Devuelve $this, **[null](#constant.null)** en caso que los argumentos sean erróneos o **[false](#constant.false)** para
cualquier otro tipo de error.

### Ejemplos

**Ejemplo #1 Ejemplo de Lua::registerCallback()**

&lt;?php
$lua = new Lua();
$lua-&gt;registerCallback("echo", "var_dump");
$lua-&gt;eval(&lt;&lt;&lt;CODE
echo({1, 2, 3});
CODE
);
?&gt;

El ejemplo anterior mostrará:

array(3) {
[1]=&gt;
float(1)
[2]=&gt;
float(2)
[3]=&gt;
float(3)
}

## Tabla de contenidos

- [Lua::assign](#lua.assign) — Asigna una variable de PHP a Lua
- [Lua::call](#lua.call) — Llama funciones de Lua
- [Lua::\_\_construct](#lua.construct) — Constructor Lua
- [Lua::eval](#lua.eval) — Evalúa una cadena de texto como código Lua
- [Lua::getVersion](#lua.getversion) — Obtiene la versión
- [Lua::include](#lua.include) — Analiza un fichero script Lua
- [Lua::registerCallback](#lua.registercallback) — Registra una función PHP en Lua

# La clase LuaClosure

(PECL lua &gt;=0.9.0)

## Introducción

     LuaClosure es una clase contenedor para LUA_TFUNCTION que puede ser devuelta
     al llamar a la función Lua.

## Sinopsis de la Clase

    ****




      class **LuaClosure**

     {


    /* Métodos */

public [\_\_invoke](#luaclosure.invoke)([mixed](#language.types.mixed) ...$args): [void](language.types.void.html)

}

# LuaClosure::\_\_invoke

(PECL lua &gt;=0.9.0)

LuaClosure::\_\_invoke — Invoke luaclosure

### Descripción

public **LuaClosure::\_\_invoke**([mixed](#language.types.mixed) ...$args): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    args





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de LuaClosure::\_\_invoke()**

&lt;?php
$lua = new Lua();
$closure = $lua-&gt;eval(&lt;&lt;&lt;CODE
return (function ()
print("hello world")
end)
CODE
);

$lua-&gt;call($closure);
$closure();
?&gt;

El ejemplo anterior mostrará:

hello worldhello world

## Tabla de contenidos

- [LuaClosure::\_\_invoke](#luaclosure.invoke) — Invoke luaclosure

- [Introducción](#intro.lua)
- [Instalación/Configuración](#lua.setup)<li>[Requerimientos](#lua.requirements)
- [Instalación](#lua.installation)
  </li>- [Lua](#class.lua) — La clase Lua<li>[Lua::assign](#lua.assign) — Asigna una variable de PHP a Lua
- [Lua::call](#lua.call) — Llama funciones de Lua
- [Lua::\_\_construct](#lua.construct) — Constructor Lua
- [Lua::eval](#lua.eval) — Evalúa una cadena de texto como código Lua
- [Lua::getVersion](#lua.getversion) — Obtiene la versión
- [Lua::include](#lua.include) — Analiza un fichero script Lua
- [Lua::registerCallback](#lua.registercallback) — Registra una función PHP en Lua
  </li>- [LuaClosure](#class.luaclosure) — La clase LuaClosure<li>[LuaClosure::__invoke](#luaclosure.invoke) — Invoke luaclosure
  </li>
