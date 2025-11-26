# var_representation

# Introducción

La extensión var_representation proporciona una alternativa compacta a [var_export()](#function.var-export) que escapa correctamente los caracteres de control.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#var-representation.installation)

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/var_representation](https://pecl.php.net/package/var_representation).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[VAR_REPRESENTATION_SINGLE_LINE](#constant.var-representation-single-line)**
     ([int](#language.types.integer))



      El flag [var_representation()](#function.var-representation) que indica que los saltos de línea
      no deben ser utilizados para el espaciado en las representaciones de variables.





     **[VAR_REPRESENTATION_UNESCAPED](#constant.var-representation-unescaped)**
     ([int](#language.types.integer))



      El flag de [var_representation()](#function.var-representation) que indica que los strings
      deben ser codificados como cadenas simples con caracteres de control no escapados.


# Funciones de var_representation

# var_representation

(PECL var_representation &gt;= 0.1.0)

var_representation — Devuelve una representación legible, corta y analizable de una variable

### Descripción

**var_representation**([mixed](#language.types.mixed) $value, [int](#language.types.integer) $flags = 0): [string](#language.types.string)

**var_representation()** (de la PECL var_representation) devuelve un string de caracteres con información estructurada sobre
la variable dada. Es similar a [var_export()](#function.var-export) con diferencias en la indentación, escape de strings y las representaciones de array.

### Parámetros

    value


       La variable para generar una representación.






    flags


       Una máscara de bits que consiste en
       **[VAR_REPRESENTATION_SINGLE_LINE](#constant.var-representation-single-line)**,
       **[VAR_REPRESENTATION_UNESCAPED](#constant.var-representation-unescaped)**.
       El comportamiento de estas constantes se describe en la página de las
       [constantes de var_representation](#var-representation.constants).


### Valores devueltos

Devuelve la representación de la variable.

### Ejemplos

    **Ejemplo #1 Ejemplo de var_representation()**

&lt;?php
$a = [1, 2, ['key' =&gt; 'value']];
echo var_representation($a), "\n";
echo var_representation($a, VAR_REPRESENTATION_SINGLE_LINE), "\n";
?&gt;

    El ejemplo anterior mostrará:

[
1,
2,
[
'key' =&gt; 'value',
],
]
[1, 2, ['key' =&gt; 'value']]

    **Ejemplo #2 Escapado de caracteres de control**

&lt;?php
echo var_representation("Content-Length: 123\r\n");
?&gt;

    El ejemplo anterior mostrará:

"Content-Length: 123\r\n"

    **Ejemplo #3 Exportar una [stdClass](#class.stdclass)**

&lt;?php
$person = new stdClass;
$person-&gt;name = 'ElePHPant ElePHPantsdotter';
$person-&gt;website = 'https://php.net/elephpant.php';

echo var_representation($person);
?&gt;

    El ejemplo anterior mostrará:

(object) [
'name' =&gt; 'ElePHPant ElePHPantsdotter',
'website' =&gt; 'https://php.net/elephpant.php',
]

    **Ejemplo #4 Exportar clases**

&lt;?php
class A { public $var; }
$a = new A;
$a-&gt;var = 5;
echo var_representation($a);
?&gt;

    El ejemplo anterior mostrará:

\A::\_\_set_state([
'var' =&gt; 5,
])

    **Ejemplo #5 Uso con [__set_state()](#object.set-state)**

&lt;?php
class A
{
public $var1;
public $var2;

    public static function __set_state($an_array)
    {
        $obj = new A;
        $obj-&gt;var1 = $an_array['var1'];
        $obj-&gt;var2 = $an_array['var2'];
        return $obj;
    }

}

$a = new A;
$a-&gt;var1 = 5;
$a-&gt;var2 = 'foo';

eval('$b = ' . var_representation($a) . ';'); // $b = \A::__set_state([
                                              //   'var1' =&gt; 5,
                                              //   'var2' =&gt; 'foo',
                                              // ]);
var_dump($b);
?&gt;

    El ejemplo anterior mostrará:

object(A)#2 (2) {
["var1"]=&gt;
int(5)
["var2"]=&gt;
string(3) "foo"
}

### Ver también

    - [var_export()](#function.var-export) - Devuelve el código PHP utilizado para generar una variable

## Tabla de contenidos

- [var_representation](#function.var-representation) — Devuelve una representación legible, corta y analizable de una variable

- [Introducción](#intro.var_representation)
- [Instalación/Configuración](#var-representation.setup)<li>[Instalación](#var-representation.installation)
  </li>- [Constantes predefinidas](#var-representation.constants)
- [Funciones de var_representation](#ref.var-representation)<li>[var_representation](#function.var-representation) — Devuelve una representación legible, corta y analizable de una variable
  </li>
