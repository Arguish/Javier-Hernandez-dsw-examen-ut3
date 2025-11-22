# UI

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

Esta extensión encapsula [» libui](https://github.com/andlabs/libui)
para proporcionar una API orientada a objetos destinada al desarrollo multiplataforma
de interfaces de usuario nativas con un aspecto y comportamiento auténticos.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ui.requirements)
- [Instalación](#ui.installation)

    ## Requerimientos

    La instalación requiere la biblioteca libui y PHP 7 o una versión más reciente.

    Esta extensión requiere la instalación de [» la biblioteca libui](https://github.com/andlabs/libui)
    versión 0.1.0 o una versión más reciente. Consulte la documentación de libui para obtener una lista de los requisitos previos.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/ui](https://pecl.php.net/package/ui).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

# Representa una posición (x,y)

(UI 0.9.9)

## Introducción

    Los puntos se utilizan en toda la interfaz de usuario para representar coordenadas en una pantalla, control o zona.

## Sinopsis de la Clase

    ****




      final
      class **UI\Point**

     {

    /* Propiedades */

     public
      [$x](#ui-point.props.x);

    public
      [$y](#ui-point.props.y);


    /* Constructor */

public [\_\_construct](#ui-point.construct)([float](#language.types.float) $x, [float](#language.types.float) $y)

    /* Métodos */
    public static [at](#ui-point.at)([float](#language.types.float) $point): [UI\Point](#class.ui-point)

public static [at](#ui-point.at)([UI\Size](#class.ui-size) $size): [UI\Point](#class.ui-point)
public [getX](#ui-point.getx)(): [float](#language.types.float)
public [getY](#ui-point.gety)(): [float](#language.types.float)
public [setX](#ui-point.setx)([float](#language.types.float) $point)
public [setY](#ui-point.sety)([float](#language.types.float) $point)

}

## Propiedades

     x


       Contiene la coordenada X, se puede leer/escribir directamente






     y


       Contiene la coordenada Y, se puede leer/escribir directamente





# UI\Point::at

(UI 1.0.2)

UI\Point::at — Tamaño de coerción

### Descripción

public static **UI\Point::at**([float](#language.types.float) $point): [UI\Point](#class.ui-point)

public static **UI\Point::at**([UI\Size](#class.ui-size) $size): [UI\Point](#class.ui-point)

Devolverá un objeto de punto UI donde x y y son iguales a los suministrados, ya sea en forma flotante o de tamaño UI.

### Parámetros

    point


      El valor de x y y






    size


      El tamaño a convertir


### Valores devueltos

El punto resultante

# UI\Point::\_\_construct

(UI 0.9.9)

UI\Point::\_\_construct — Construye un nuevo punto

### Descripción

public **UI\Point::\_\_construct**([float](#language.types.float) $x, [float](#language.types.float) $y)

Construye un nuevo punto usando nuevas coordenadas

### Parámetros

    x


      La nueva coordenada X






    y


      La nueva coordenada Y


# UI\Point::getX

(UI 0.9.9)

UI\Point::getX — Recupera X

### Descripción

public **UI\Point::getX**(): [float](#language.types.float)

Recupera la coordenada X

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La coordenada X actual

# UI\Point::getY

(UI 0.9.9)

UI\Point::getY — Recupera Y

### Descripción

public **UI\Point::getY**(): [float](#language.types.float)

Recupera la coordenada Y

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La coordenada Y actual

# UI\Point::setX

(UI 0.9.9)

UI\Point::setX — Establece X

### Descripción

public **UI\Point::setX**([float](#language.types.float) $point)

Establece la coordenada X

### Parámetros

    point


      La nueva coordenada X


### Valores devueltos

# UI\Point::setY

(UI 0.9.9)

UI\Point::setY — Establece Y

### Descripción

public **UI\Point::setY**([float](#language.types.float) $point)

Establece la coordenada Y

### Parámetros

    point


      La nueva coordenada Y


### Valores devueltos

## Tabla de contenidos

- [UI\Point::at](#ui-point.at) — Tamaño de coerción
- [UI\Point::\_\_construct](#ui-point.construct) — Construye un nuevo punto
- [UI\Point::getX](#ui-point.getx) — Recupera X
- [UI\Point::getY](#ui-point.gety) — Recupera Y
- [UI\Point::setX](#ui-point.setx) — Establece X
- [UI\Point::setY](#ui-point.sety) — Establece Y

# Représente des dimensions (largeur, hauteur)

(UI 0.9.9)

## Introducción

    Los tamaños se utilizan en toda la interfaz de usuario para representar el tamaño de una pantalla, control o zona.

## Sinopsis de la Clase

    ****




      final
      class **UI\Size**

     {

    /* Propiedades */

     public
      [$width](#ui-size.props.width);

    public
      [$height](#ui-size.props.height);


    /* Constructor */

public [\_\_construct](#ui-size.construct)([float](#language.types.float) $width, [float](#language.types.float) $height)

    /* Métodos */
    public [getHeight](#ui-size.getheight)(): [float](#language.types.float)

public [getWidth](#ui-size.getwidth)(): [float](#language.types.float)
public static [of](#ui-size.of)([float](#language.types.float) $size): [UI\Size](#class.ui-size)
public static [of](#ui-size.of)([UI\Point](#class.ui-point) $point): [UI\Size](#class.ui-size)
public [setHeight](#ui-size.setheight)([float](#language.types.float) $size)
public [setWidth](#ui-size.setwidth)([float](#language.types.float) $size)

}

## Propiedades

     width


       Contiene la anchura, se puede leer/escribir directamente






     height


       Contiene la altura, se puede leer/escribir directamente





# UI\Size::\_\_construct

(UI 0.9.9)

UI\Size::\_\_construct — Construye un nuevo tamaño

### Descripción

public **UI\Size::\_\_construct**([float](#language.types.float) $width, [float](#language.types.float) $height)

Construye un nuevo tamaño usando un nuevo ancho y alto

### Parámetros

    width


      El nuevo ancho






    height


      El nuevo alto


# UI\Size::getHeight

(UI 0.9.9)

UI\Size::getHeight — Recupera la altura

### Descripción

public **UI\Size::getHeight**(): [float](#language.types.float)

Recupera la altura

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La altura actual

# UI\Size::getWidth

(UI 0.9.9)

UI\Size::getWidth — Recupera el ancho

### Descripción

public **UI\Size::getWidth**(): [float](#language.types.float)

Recupera el ancho

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El ancho actual

# UI\Size::of

(UI 1.0.2)

UI\Size::of — Punto de coerción

### Descripción

public static **UI\Size::of**([float](#language.types.float) $size): [UI\Size](#class.ui-size)

public static **UI\Size::of**([UI\Point](#class.ui-point) $point): [UI\Size](#class.ui-size)

Devolverá un objeto de tamaño UI en el que el ancho y la altura son iguales a los suministrados, ya sea en forma flotante o en forma de UI.

### Parámetros

    size


      El valor de la anchura y la altura






    point


      El punto a convertir


### Valores devueltos

El tamaño resultante

# UI\Size::setHeight

(UI 0.9.9)

UI\Size::setHeight — Establece la altura

### Descripción

public **UI\Size::setHeight**([float](#language.types.float) $size)

Establece una nueva altura

### Parámetros

    size


      La nueva altura


### Valores devueltos

# UI\Size::setWidth

(UI 0.9.9)

UI\Size::setWidth — Establece el ancho

### Descripción

public **UI\Size::setWidth**([float](#language.types.float) $size)

Establece un nuevo ancho

### Parámetros

    size


      El nuevo ancho


### Valores devueltos

## Tabla de contenidos

- [UI\Size::\_\_construct](#ui-size.construct) — Construye un nuevo tamaño
- [UI\Size::getHeight](#ui-size.getheight) — Recupera la altura
- [UI\Size::getWidth](#ui-size.getwidth) — Recupera el ancho
- [UI\Size::of](#ui-size.of) — Punto de coerción
- [UI\Size::setHeight](#ui-size.setheight) — Establece la altura
- [UI\Size::setWidth](#ui-size.setwidth) — Establece el ancho

# Ventana

(UI 0.9.9)

## Introducción

    Representa una ventana de interfaz de usuario

## Sinopsis de la Clase

    ****




      class **UI\Window**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Propiedades */

     protected
      [$controls](#ui-window.props.controls);


    /* Constructor */

public [\_\_construct](#ui-window.construct)([string](#language.types.string) $title, Size $size, [bool](#language.types.boolean) $menu = **[false](#constant.false)**)

    /* Métodos */
    public [add](#ui-window.add)([UI\Control](#class.ui-control) $control)

public [error](#ui-window.error)([string](#language.types.string) $title, [string](#language.types.string) $msg)
public [getSize](#ui-window.getsize)(): [UI\Size](#class.ui-size)
public [getTitle](#ui-window.gettitle)(): [string](#language.types.string)
public [hasBorders](#ui-window.hasborders)(): [bool](#language.types.boolean)
public [hasMargin](#ui-window.hasmargin)(): [bool](#language.types.boolean)
public [isFullScreen](#ui-window.isfullscreen)(): [bool](#language.types.boolean)
public [msg](#ui-window.msg)([string](#language.types.string) $title, [string](#language.types.string) $msg)
protected [onClosing](#ui-window.onclosing)(): [int](#language.types.integer)
public [open](#ui-window.open)(): [string](#language.types.string)
public [save](#ui-window.save)(): [string](#language.types.string)
public [setBorders](#ui-window.setborders)([bool](#language.types.boolean) $borders)
public [setFullScreen](#ui-window.setfullscreen)([bool](#language.types.boolean) $full)
public [setMargin](#ui-window.setmargin)([bool](#language.types.boolean) $margin)
public [setSize](#ui-window.setsize)([UI\Size](#class.ui-size) $size)
public [setTitle](#ui-window.settitle)([string](#language.types.string) $title)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Propiedades

     controls


       Contiene controles, no debe manipularse directamente





# UI\Window::add

(UI 0.9.9)

UI\Window::add — Añade un control

### Descripción

public **UI\Window::add**([UI\Control](#class.ui-control) $control)

Añadirá un control a esta ventana

### Parámetros

    control


      El control a añadir


### Valores devueltos

# UI\Window::\_\_construct

(UI 0.9.9)

UI\Window::\_\_construct — Construye una nueva ventana

### Descripción

public **UI\Window::\_\_construct**([string](#language.types.string) $title, Size $size, [bool](#language.types.boolean) $menu = **[false](#constant.false)**)

Construirá una nueva ventana

### Parámetros

    title


      El título de la Ventana






    size


      El tamaño de la Ventana






    menu


      Interruptor del menú


# UI\Window::error

(UI 0.9.9)

UI\Window::error — Mostrar cuadro de error

### Descripción

public **UI\Window::error**([string](#language.types.string) $title, [string](#language.types.string) $msg)

Mostrará un cuadro de error

### Parámetros

    title


      El título del cuadro de error






    msg


      El mensaje para el cuadro de error


# UI\Window::getSize

(UI 0.9.9)

UI\Window::getSize — Obtiene el tamaño de la ventana

### Descripción

public **UI\Window::getSize**(): [UI\Size](#class.ui-size)

Devolverá el tamaño de esta ventana

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Window::getTitle

(UI 0.9.9)

UI\Window::getTitle — Obtiene el título

### Descripción

public **UI\Window::getTitle**(): [string](#language.types.string)

Recuperará el título de esta Ventana

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Window::hasBorders

(UI 0.9.9)

UI\Window::hasBorders — Detección del Borde

### Descripción

public **UI\Window::hasBorders**(): [bool](#language.types.boolean)

Detectará si se usan bordes en esta ventana

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Window::hasMargin

(UI 0.9.9)

UI\Window::hasMargin — Detección de Margen

### Descripción

public **UI\Window::hasMargin**(): [bool](#language.types.boolean)

Detectará si se usan márgenes en esta ventana

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Window::isFullScreen

(UI 0.9.9)

UI\Window::isFullScreen — Detección de pantalla completa

### Descripción

public **UI\Window::isFullScreen**(): [bool](#language.types.boolean)

Detectará si esta ventana se utiliza toda la pantalla

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Window::msg

(UI 0.9.9)

UI\Window::msg — Mostrar Cuadro de Mensajes

### Descripción

public **UI\Window::msg**([string](#language.types.string) $title, [string](#language.types.string) $msg)

Mostrará un cuadro de mensajes

### Parámetros

    title


      El título del cuadro de mensajes






    msg


      El mensaje


# UI\Window::onClosing

(UI 0.9.9)

UI\Window::onClosing — Cierre de la devolución de llamada

### Descripción

protected **UI\Window::onClosing**(): [int](#language.types.integer)

Debería destruir con agilidad esta ventana

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Window::open

(UI 0.9.9)

UI\Window::open — Abrir Diálogo

### Descripción

public **UI\Window::open**(): [string](#language.types.string)

Mostrará un diálogo de archivo abierto

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del archivo seleccionado para su apertura

# UI\Window::save

(UI 0.9.9)

UI\Window::save — Guarda Diálogo

### Descripción

public **UI\Window::save**(): [string](#language.types.string)

Mostrará un diálogo a guardar

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del archivo seleccionado para ser guardado

# UI\Window::setBorders

(UI 0.9.9)

UI\Window::setBorders — Uso de Bordes

### Descripción

public **UI\Window::setBorders**([bool](#language.types.boolean) $borders)

Habilitará o deshabilitará el uso de los bordes en esta ventana

### Parámetros

    borders





# UI\Window::setFullScreen

(UI 0.9.9)

UI\Window::setFullScreen — Uso de la pantalla completa

### Descripción

public **UI\Window::setFullScreen**([bool](#language.types.boolean) $full)

Activará o desactivará el uso de la pantalla completa para esta ventana

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    full





# UI\Window::setMargin

(UI 0.9.9)

UI\Window::setMargin — Uso del Margen

### Descripción

public **UI\Window::setMargin**([bool](#language.types.boolean) $margin)

Habilitará o deshabilitará el uso de los márgenes para esta Ventana

### Parámetros

    margin





# UI\Window::setSize

(UI 0.9.9)

UI\Window::setSize — Establece Tamaño

### Descripción

public **UI\Window::setSize**([UI\Size](#class.ui-size) $size)

Establecerá el tamaño de esta ventana

### Parámetros

    size





### Valores devueltos

# UI\Window::setTitle

(UI 0.9.9)

UI\Window::setTitle — Título de la Vetana

### Descripción

public **UI\Window::setTitle**([string](#language.types.string) $title)

Pondrá el título de esta ventana

### Parámetros

    title


      El nuevo título


## Tabla de contenidos

- [UI\Window::add](#ui-window.add) — Añade un control
- [UI\Window::\_\_construct](#ui-window.construct) — Construye una nueva ventana
- [UI\Window::error](#ui-window.error) — Mostrar cuadro de error
- [UI\Window::getSize](#ui-window.getsize) — Obtiene el tamaño de la ventana
- [UI\Window::getTitle](#ui-window.gettitle) — Obtiene el título
- [UI\Window::hasBorders](#ui-window.hasborders) — Detección del Borde
- [UI\Window::hasMargin](#ui-window.hasmargin) — Detección de Margen
- [UI\Window::isFullScreen](#ui-window.isfullscreen) — Detección de pantalla completa
- [UI\Window::msg](#ui-window.msg) — Mostrar Cuadro de Mensajes
- [UI\Window::onClosing](#ui-window.onclosing) — Cierre de la devolución de llamada
- [UI\Window::open](#ui-window.open) — Abrir Diálogo
- [UI\Window::save](#ui-window.save) — Guarda Diálogo
- [UI\Window::setBorders](#ui-window.setborders) — Uso de Bordes
- [UI\Window::setFullScreen](#ui-window.setfullscreen) — Uso de la pantalla completa
- [UI\Window::setMargin](#ui-window.setmargin) — Uso del Margen
- [UI\Window::setSize](#ui-window.setsize) — Establece Tamaño
- [UI\Window::setTitle](#ui-window.settitle) — Título de la Vetana

# Controlar

(UI 0.9.9)

## Introducción

    Esta clase es la clase base cerrada para todos los controles UI.

## Sinopsis de la Clase

    ****




      final
      class **UI\Control**

     {


    /* Métodos */

public [destroy](#ui-control.destroy)()
public [disable](#ui-control.disable)()
public [enable](#ui-control.enable)()
public [getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [hide](#ui-control.hide)()
public [isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [show](#ui-control.show)()

}

# UI\Control::destroy

(UI 0.9.9)

UI\Control::destroy — Destruye el control

### Descripción

public **UI\Control::destroy**()

Destruye este control

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::disable

(UI 0.9.9)

UI\Control::disable — Desactiva el control

### Descripción

public **UI\Control::disable**()

Desactiva este control

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::enable

(UI 0.9.9)

UI\Control::enable — Activa el control

### Descripción

public **UI\Control::enable**()

Activa este control

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::getParent

(UI 0.9.9)

UI\Control::getParent — Devuelve el control padre

### Descripción

public **UI\Control::getParent**(): [UI\Control](#class.ui-control)

Devuelve el control padre

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::getTopLevel

(UI 0.9.9)

UI\Control::getTopLevel — Devuelve el nivel más alto

### Descripción

public **UI\Control::getTopLevel**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::hide

(UI 0.9.9)

UI\Control::hide — Oculta el control

### Descripción

public **UI\Control::hide**()

Oculta este control

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::isEnabled

(UI 0.9.9)

UI\Control::isEnabled — Devuelve si el control está activado

### Descripción

public **UI\Control::isEnabled**(): [bool](#language.types.boolean)

Devuelve si este control está activado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::isVisible

(UI 0.9.9)

UI\Control::isVisible — Devuelve si el control es visible

### Descripción

public **UI\Control::isVisible**(): [bool](#language.types.boolean)

Devuelve si este control es visible

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Control::setParent

(UI 0.9.9)

UI\Control::setParent — Establece el control padre

### Descripción

public **UI\Control::setParent**([UI\Control](#class.ui-control) $parent)

Establece el control padre de este control

### Parámetros

    parent


      El control padre


### Valores devueltos

# UI\Control::show

(UI 0.9.9)

UI\Control::show — Muestra el control

### Descripción

public **UI\Control::show**()

Muestra este control

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [UI\Control::destroy](#ui-control.destroy) — Destruye el control
- [UI\Control::disable](#ui-control.disable) — Desactiva el control
- [UI\Control::enable](#ui-control.enable) — Activa el control
- [UI\Control::getParent](#ui-control.getparent) — Devuelve el control padre
- [UI\Control::getTopLevel](#ui-control.gettoplevel) — Devuelve el nivel más alto
- [UI\Control::hide](#ui-control.hide) — Oculta el control
- [UI\Control::isEnabled](#ui-control.isenabled) — Devuelve si el control está activado
- [UI\Control::isVisible](#ui-control.isvisible) — Devuelve si el control es visible
- [UI\Control::setParent](#ui-control.setparent) — Establece el control padre
- [UI\Control::show](#ui-control.show) — Muestra el control

# Menú

(UI 0.9.9)

## Introducción

    Los menús deben crearse antes de la primera ventana y pueden aparecer en cualquier ventana.

## Sinopsis de la Clase

    ****




      class **UI\Menu**

     {


     /* Constructor */

public [\_\_construct](#ui-menu.construct)([string](#language.types.string) $name)

    /* Métodos */
    public [append](#ui-menu.append)([string](#language.types.string) $name, [string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)

public [appendAbout](#ui-menu.appendabout)([string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)
public [appendCheck](#ui-menu.appendcheck)([string](#language.types.string) $name, [string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)
public [appendPreferences](#ui-menu.appendpreferences)([string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)
public [appendQuit](#ui-menu.appendquit)([string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)
public [appendSeparator](#ui-menu.appendseparator)()

}

# UI\Menu::append

(UI 0.9.9)

UI\Menu::append — Añade elemento de menú

### Descripción

public **UI\Menu::append**([string](#language.types.string) $name, [string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)

Añadirá un nuevo elemento del menú

### Parámetros

    name


      El nombre (texto) del nuevo elemento






    type


      El tipo para el nuevo elemento


### Valores devueltos

Un objeto construido del tipo dado

# UI\Menu::appendAbout

(UI 0.9.9)

UI\Menu::appendAbout — Añade elemento de menú Acerca de

### Descripción

public **UI\Menu::appendAbout**([string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)

Se añadirá un elemento del menú Acerca de

### Parámetros

    type


      El tipo para el nuevo elemento


### Valores devueltos

Un elemento del menú Acerca de construido del tipo dado

# UI\Menu::appendCheck

(UI 0.9.9)

UI\Menu::appendCheck — Añade un elemento de menú comprobable

### Descripción

public **UI\Menu::appendCheck**([string](#language.types.string) $name, [string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)

Se añadirá un elemento del menú comprobable

### Parámetros

    name


      El nombre (texto) del nuevo elemento






    type


      El tipo para el nuevo elemento


### Valores devueltos

    Un elemento de menú construido y comprobable del tipo dado

# UI\Menu::appendPreferences

(UI 0.9.9)

UI\Menu::appendPreferences — Añade elemento de menú de preferencias

### Descripción

public **UI\Menu::appendPreferences**([string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)

Se añadirá un elemento del menú de Preferencias

### Parámetros

    type


      El tipo para el nuevo elemento


### Valores devueltos

Un elemento de menú de Preferencias construido del tipo dado

# UI\Menu::appendQuit

(UI 0.9.9)

UI\Menu::appendQuit — Añade elemento de menú salir

### Descripción

public **UI\Menu::appendQuit**([string](#language.types.string) $type = UI\MenuItem::class): [UI\MenuItem](#class.ui-menuitem)

Se añadirá un elemento del menú de salida

### Parámetros

    type


      El tipo para el nuevo elemento


### Valores devueltos

Un elemento del menú de salida construido del tipo dado

# UI\Menu::appendSeparator

(UI 0.9.9)

UI\Menu::appendSeparator — Añade separador de elementos del menú

### Descripción

public **UI\Menu::appendSeparator**()

Se añadirá un separador

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Menu::\_\_construct

(UI 0.9.9)

UI\Menu::\_\_construct — Construye un nuevo menú

### Descripción

public **UI\Menu::\_\_construct**([string](#language.types.string) $name)

Construirá un nuevo menú

### Parámetros

    name


      El nombre (texto) del menú


## Tabla de contenidos

- [UI\Menu::append](#ui-menu.append) — Añade elemento de menú
- [UI\Menu::appendAbout](#ui-menu.appendabout) — Añade elemento de menú Acerca de
- [UI\Menu::appendCheck](#ui-menu.appendcheck) — Añade un elemento de menú comprobable
- [UI\Menu::appendPreferences](#ui-menu.appendpreferences) — Añade elemento de menú de preferencias
- [UI\Menu::appendQuit](#ui-menu.appendquit) — Añade elemento de menú salir
- [UI\Menu::appendSeparator](#ui-menu.appendseparator) — Añade separador de elementos del menú
- [UI\Menu::\_\_construct](#ui-menu.construct) — Construye un nuevo menú

# Elemento del menú

(UI 0.9.9)

## Introducción

    Los elementos de menú sólo pueden crearse mediante la función

## Sinopsis de la Clase

    ****




      class **UI\MenuItem**

     {


    /* Métodos */

public [disable](#ui-menuitem.disable)()
public [enable](#ui-menuitem.enable)()
public [isChecked](#ui-menuitem.ischecked)(): [bool](#language.types.boolean)
protected [onClick](#ui-menuitem.onclick)()
public [setChecked](#ui-menuitem.setchecked)([bool](#language.types.boolean) $checked)

}

# UI\MenuItem::disable

(UI 0.9.9)

UI\MenuItem::disable — Desactiva elemento del menú

### Descripción

public **UI\MenuItem::disable**()

Desactivará este elemento del menú

### Parámetros

Esta función no contiene ningún parámetro.

# UI\MenuItem::enable

(UI 0.9.9)

UI\MenuItem::enable — Activa elemento de menú

### Descripción

public **UI\MenuItem::enable**()

Activará este elemento del menú

### Parámetros

Esta función no contiene ningún parámetro.

# UI\MenuItem::isChecked

(UI 0.9.9)

UI\MenuItem::isChecked — Detecta Marcado

### Descripción

public **UI\MenuItem::isChecked**(): [bool](#language.types.boolean)

Detecta si este elemento del menú está marcado

### Parámetros

Esta función no contiene ningún parámetro.

# UI\MenuItem::onClick

(UI 0.9.9)

UI\MenuItem::onClick — Llamada de retorno On Click

### Descripción

protected **UI\MenuItem::onClick**()

Se ejecutará cuando se haga clic en este elemento del menú

### Parámetros

Esta función no contiene ningún parámetro.

# UI\MenuItem::setChecked

(UI 0.9.9)

UI\MenuItem::setChecked — Establece marcado

### Descripción

public **UI\MenuItem::setChecked**([bool](#language.types.boolean) $checked)

Establecerá el estado marcado de este elemento del menú

### Parámetros

    checked


      El nuevo estado


## Tabla de contenidos

- [UI\MenuItem::disable](#ui-menuitem.disable) — Desactiva elemento del menú
- [UI\MenuItem::enable](#ui-menuitem.enable) — Activa elemento de menú
- [UI\MenuItem::isChecked](#ui-menuitem.ischecked) — Detecta Marcado
- [UI\MenuItem::onClick](#ui-menuitem.onclick) — Llamada de retorno On Click
- [UI\MenuItem::setChecked](#ui-menuitem.setchecked) — Establece marcado

# Area

(UI 0.9.9)

## Introducción

    Una área (Area) representa un lienzo sobre el cual se puede dibujar y responder a los eventos de ratón y teclado.

## Sinopsis de la Clase

    ****




      class **UI\Area**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Ctrl](#ui-area.constants.ctrl);

    const
     [int](#language.types.integer)
      [Alt](#ui-area.constants.alt);

    const
     [int](#language.types.integer)
      [Shift](#ui-area.constants.shift);

    const
     [int](#language.types.integer)
      [Super](#ui-area.constants.super);

    const
     [int](#language.types.integer)
      [Down](#ui-area.constants.down);

    const
     [int](#language.types.integer)
      [Up](#ui-area.constants.up);


    /* Métodos */

protected [onDraw](#ui-area.ondraw)(
    [UI\Draw\Pen](#class.ui-draw-pen) $pen,
    [UI\Size](#class.ui-size) $areaSize,
    [UI\Point](#class.ui-point) $clipPoint,
    [UI\Size](#class.ui-size) $clipSize
)
protected [onKey](#ui-area.onkey)([string](#language.types.string) $key, [int](#language.types.integer) $ext, [int](#language.types.integer) $flags)
protected [onMouse](#ui-area.onmouse)([UI\Point](#class.ui-point) $areaPoint, [UI\Size](#class.ui-size) $areaSize, [int](#language.types.integer) $flags)
public [redraw](#ui-area.redraw)()
public [scrollTo](#ui-area.scrollto)([UI\Point](#class.ui-point) $point, [UI\Size](#class.ui-size) $size)
public [setSize](#ui-area.setsize)([UI\Size](#class.ui-size) $size)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Constantes predefinidas

     **[UI\Area::Ctrl](#ui-area.constants.ctrl)**


       Debe ser definido en los modificadores pasados a los eventos
       de teclado y ratón cuando la tecla CTRL está activa





     **[UI\Area::Alt](#ui-area.constants.alt)**


       Debe ser definido en los modificadores pasados a los eventos
       de teclado y ratón cuando la tecla ALT está activa





     **[UI\Area::Shift](#ui-area.constants.shift)**


       Debe ser definido en los modificadores pasados a los eventos
       de teclado y ratón cuando la tecla SHIFT está activa





     **[UI\Area::Super](#ui-area.constants.super)**








     **[UI\Area::Down](#ui-area.constants.down)**

      Debe ser definido en los modificadores pasados a los eventos de teclado y ratón






     **[UI\Area::Up](#ui-area.constants.up)**

      Debe ser definido en los modificadores pasados a los eventos de teclado y ratón




# UI\Area::onDraw

(UI 0.9.9)

UI\Area::onDraw — Retrollamada de dibujo

### Descripción

protected **UI\Area::onDraw**(
    [UI\Draw\Pen](#class.ui-draw-pen) $pen,
    [UI\Size](#class.ui-size) $areaSize,
    [UI\Point](#class.ui-point) $clipPoint,
    [UI\Size](#class.ui-size) $clipSize
)

Debe ser invocada cuando esta área necesita ser redibujada

### Parámetros

    pen


      Un lápiz adecuado para dibujar en esta área






    areaSize


      El tamaño del área






    clipPoint


      El punto de recorte del área






    clipSize


      El tamaño de recorte del área


# UI\Area::onKey

(UI 0.9.9)

UI\Area::onKey — Retrollamada de tecla

### Descripción

protected **UI\Area::onKey**([string](#language.types.string) $key, [int](#language.types.integer) $ext, [int](#language.types.integer) $flags)

Debe ser ejecutada en los eventos de tecla

### Parámetros

    key


      La tecla presionada






    ext


      La tecla extendida presionada






    flags


      Modificadores de eventos


### Valores devueltos

# UI\Area::onMouse

(UI 0.9.9)

UI\Area::onMouse — Retrollamada de ratón

### Descripción

protected **UI\Area::onMouse**([UI\Point](#class.ui-point) $areaPoint, [UI\Size](#class.ui-size) $areaSize, [int](#language.types.integer) $flags)

Debe ser ejecutada en los eventos de ratón

### Parámetros

    areaPoint


      Las coordenadas del evento






    areaSize


      El tamaño de la zona del evento






    flags


      Modificadores de eventos


# UI\Area::redraw

(UI 0.9.9)

UI\Area::redraw — Redibuja el área

### Descripción

public **UI\Area::redraw**()

Solicita que este área sea redibujada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Area::scrollTo

(UI 0.9.9)

UI\Area::scrollTo — Desplazamiento del área

### Descripción

public **UI\Area::scrollTo**([UI\Point](#class.ui-point) $point, [UI\Size](#class.ui-size) $size)

Desplaza este área

### Parámetros

    point


      El punto al que desplazarse






    size


      El tamaño del panel de desplazamiento


# UI\Area::setSize

(UI 0.9.9)

UI\Area::setSize — Establece el tamaño

### Descripción

public **UI\Area::setSize**([UI\Size](#class.ui-size) $size)

Establece el tamaño de este área

### Parámetros

    size


      El nuevo tamaño


## Tabla de contenidos

- [UI\Area::onDraw](#ui-area.ondraw) — Retrollamada de dibujo
- [UI\Area::onKey](#ui-area.onkey) — Retrollamada de tecla
- [UI\Area::onMouse](#ui-area.onmouse) — Retrollamada de ratón
- [UI\Area::redraw](#ui-area.redraw) — Redibuja el área
- [UI\Area::scrollTo](#ui-area.scrollto) — Desplazamiento del área
- [UI\Area::setSize](#ui-area.setsize) — Establece el tamaño

# Planificador de la ejecución

(UI 2.0.0)

## Introducción

    Esto se puede utilizar para programar la ejecución repetida de una función de devolución de llamada, útil para animaciones y actividades similares.

## Sinopsis de la Clase

    ****




      abstract
      class **UI\Executor**

     {


    /* Constructor */

public [\_\_construct](#ui-executor.construct)()
public [\_\_construct](#ui-executor.construct)([int](#language.types.integer) $microseconds)
public [\_\_construct](#ui-executor.construct)([int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds)

    /* Métodos */
    public [kill](#ui-executor.kill)(): [void](language.types.void.html)

abstract protected [onExecute](#ui-executor.onexecute)(): [void](language.types.void.html)
public [setInterval](#ui-executor.setinterval)([int](#language.types.integer) $microseconds): [bool](#language.types.boolean)
public [setInterval](#ui-executor.setinterval)([int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds): [bool](#language.types.boolean)

}

# UI\Executor::\_\_construct

(UI 2.0.0)

UI\Executor::\_\_construct — Construye un nuevo ejecutor

### Descripción

public **UI\Executor::\_\_construct**()

public **UI\Executor::\_\_construct**([int](#language.types.integer) $microseconds)

public **UI\Executor::\_\_construct**([int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds)

Construye un ejecutor con el intervalo dado, no empezará a ejecutarse hasta que se entre en el bucle principal

### Parámetros

    seconds


      El número de segundos entre ejecuciones






    microseconds


      El número de microsegundos entre ejecuciones


# UI\Executor::kill

(UI 2.0.0)

UI\Executor::kill — Detener el ejecutor

### Descripción

public **UI\Executor::kill**(): [void](language.types.void.html)

Detiene un ejecutor, el ejecutor no se puede reiniciar

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Executor::onExecute

(UI 2.0.0)

UI\Executor::onExecute — Función de devolución de llamada

### Descripción

abstract protected **UI\Executor::onExecute**(): [void](language.types.void.html)

Debe ponerse en cola repetidamente para su ejecución en el hilo principal

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Executor::setInterval

(UI 2.0.0)

UI\Executor::setInterval — Manipulación de intervalos

### Descripción

public **UI\Executor::setInterval**([int](#language.types.integer) $microseconds): [bool](#language.types.boolean)

public **UI\Executor::setInterval**([int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds): [bool](#language.types.boolean)

Define el nuevo intervalo. Un intervalo de 0 pondrá en pausa el ejecutor hasta que se defina un nuevo intervalo.

### Parámetros

    seconds









    microseconds





### Valores devueltos

Indicación de éxito

## Tabla de contenidos

- [UI\Executor::\_\_construct](#ui-executor.construct) — Construye un nuevo ejecutor
- [UI\Executor::kill](#ui-executor.kill) — Detener el ejecutor
- [UI\Executor::onExecute](#ui-executor.onexecute) — Función de devolución de llamada
- [UI\Executor::setInterval](#ui-executor.setinterval) — Manipulación de intervalos

# Cuadro de pestaña de control

(UI 0.9.9)

## Introducción

    Un cuadro de pestañas (Tab) es un contenedor de controles, cada pestaña contiene un título seleccionable por el usuario.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Tab**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Propiedades */

     protected
      [$controls](#ui-controls-tab.props.controls);


    /* Métodos */

public [append](#ui-controls-tab.append)([string](#language.types.string) $name, [UI\Control](#class.ui-control) $control): [int](#language.types.integer)
public [delete](#ui-controls-tab.delete)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [hasMargin](#ui-controls-tab.hasmargin)([int](#language.types.integer) $page): [bool](#language.types.boolean)
public [insertAt](#ui-controls-tab.insertat)([string](#language.types.string) $name, [int](#language.types.integer) $page, [UI\Control](#class.ui-control) $control)
public [pages](#ui-controls-tab.pages)(): [int](#language.types.integer)
public [setMargin](#ui-controls-tab.setmargin)([int](#language.types.integer) $page, [bool](#language.types.boolean) $margin)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Propiedades

     controls


       Contiene controles, no debe manipularse directamente





# UI\Controls\Tab::append

(UI 0.9.9)

UI\Controls\Tab::append — Añadir una página

### Descripción

public **UI\Controls\Tab::append**([string](#language.types.string) $name, [UI\Control](#class.ui-control) $control): [int](#language.types.integer)

Añade una nueva página a esta pestaña

### Parámetros

    name


      El nombre de la nueva página






    control


      Control de la nueva página


### Valores devueltos

Devuelve el índice del control añadido, puede ser 0

# UI\Controls\Tab::delete

(UI 0.9.9)

UI\Controls\Tab::delete — Elimina una página

### Descripción

public **UI\Controls\Tab::delete**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Elimina la página seleccionada de esta ficha

### Parámetros

    index


      El índice de la página que se va a eliminar


### Valores devueltos

Indicación de éxito

# UI\Controls\Tab::hasMargin

(UI 0.9.9)

UI\Controls\Tab::hasMargin — Detección de márgenes

### Descripción

public **UI\Controls\Tab::hasMargin**([int](#language.types.integer) $page): [bool](#language.types.boolean)

Detecta si el margen está activado en esta página

### Parámetros

    page


      El índice de páginas


### Valores devueltos

# UI\Controls\Tab::insertAt

(UI 0.9.9)

UI\Controls\Tab::insertAt — Inserta una página

### Descripción

public **UI\Controls\Tab::insertAt**([string](#language.types.string) $name, [int](#language.types.integer) $page, [UI\Control](#class.ui-control) $control)

Inserta una nueva página en esta pestaña

### Parámetros

    name


      El nombre de la nueva página






    page


      El índice para insertar antes






    control


      Control de la nueva página


# UI\Controls\Tab::pages

(UI 0.9.9)

UI\Controls\Tab::pages — Número de páginas

### Descripción

public **UI\Controls\Tab::pages**(): [int](#language.types.integer)

Devuelve el número de páginas de esta ficha

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de páginas de esta ficha

# UI\Controls\Tab::setMargin

(UI 0.9.9)

UI\Controls\Tab::setMargin — Define el margen

### Descripción

public **UI\Controls\Tab::setMargin**([int](#language.types.integer) $page, [bool](#language.types.boolean) $margin)

Define si se activa o no el margen en la página seleccionada.

### Parámetros

    page


      La página a seleccionar






    margin


      Cambio de margen


## Tabla de contenidos

- [UI\Controls\Tab::append](#ui-controls-tab.append) — Añadir una página
- [UI\Controls\Tab::delete](#ui-controls-tab.delete) — Elimina una página
- [UI\Controls\Tab::hasMargin](#ui-controls-tab.hasmargin) — Detección de márgenes
- [UI\Controls\Tab::insertAt](#ui-controls-tab.insertat) — Inserta una página
- [UI\Controls\Tab::pages](#ui-controls-tab.pages) — Número de páginas
- [UI\Controls\Tab::setMargin](#ui-controls-tab.setmargin) — Define el margen

# Casilla de control

(UI 0.9.9)

## Introducción

    Una casilla de verificación (Check) es una caja de verificación etiquetada

## Sinopsis de la Clase

    ****




      class **UI\Controls\Check**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Constructor */

public [\_\_construct](#ui-controls-check.construct)([string](#language.types.string) $text)

    /* Métodos */
    public [getText](#ui-controls-check.gettext)(): [string](#language.types.string)

public [isChecked](#ui-controls-check.ischecked)(): [bool](#language.types.boolean)
protected [onToggle](#ui-controls-check.ontoggle)()
public [setChecked](#ui-controls-check.setchecked)([bool](#language.types.boolean) $checked)
public [setText](#ui-controls-check.settext)([string](#language.types.string) $text)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Check::\_\_construct

(UI 0.9.9)

UI\Controls\Check::\_\_construct — Construye una nueva casilla de verificación

### Descripción

public **UI\Controls\Check::\_\_construct**([string](#language.types.string) $text)

Construye una nueva casilla de verificación

### Parámetros

    text


      El texto (etiqueta) para la casilla de verificación


# UI\Controls\Check::getText

(UI 0.9.9)

UI\Controls\Check::getText — Devuelve el texto

### Descripción

public **UI\Controls\Check::getText**(): [string](#language.types.string)

Devuelve el texto (etiqueta) para esta casilla de verificación

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El texto (etiqueta) actual

# UI\Controls\Check::isChecked

(UI 0.9.9)

UI\Controls\Check::isChecked — Detección de la casilla marcada

### Descripción

public **UI\Controls\Check::isChecked**(): [bool](#language.types.boolean)

Detecta el estado de esta casilla de verificación

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Check::onToggle

(UI 0.9.9)

UI\Controls\Check::onToggle — Función de devolución de llamada de alternancia

### Descripción

protected **UI\Controls\Check::onToggle**()

Debe ser ejecutada cuando el estado de esta casilla de verificación cambia

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Check::setChecked

(UI 0.9.9)

UI\Controls\Check::setChecked — Establece la casilla marcada

### Descripción

public **UI\Controls\Check::setChecked**([bool](#language.types.boolean) $checked)

Cambia el estado de esta casilla de verificación

### Parámetros

    checked


      El nuevo estado


# UI\Controls\Check::setText

(UI 0.9.9)

UI\Controls\Check::setText — Establece el texto

### Descripción

public **UI\Controls\Check::setText**([string](#language.types.string) $text)

Establece el texto (etiqueta) para esta casilla de verificación

### Parámetros

    text


      El nuevo texto (etiqueta)


## Tabla de contenidos

- [UI\Controls\Check::\_\_construct](#ui-controls-check.construct) — Construye una nueva casilla de verificación
- [UI\Controls\Check::getText](#ui-controls-check.gettext) — Devuelve el texto
- [UI\Controls\Check::isChecked](#ui-controls-check.ischecked) — Detección de la casilla marcada
- [UI\Controls\Check::onToggle](#ui-controls-check.ontoggle) — Función de devolución de llamada de alternancia
- [UI\Controls\Check::setChecked](#ui-controls-check.setchecked) — Establece la casilla marcada
- [UI\Controls\Check::setText](#ui-controls-check.settext) — Establece el texto

# Botón de control

(UI 0.9.9)

## Introducción

    Representa un botón (Button) cliquable etiquetado

## Sinopsis de la Clase

    ****




      class **UI\Controls\Button**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Constructor */

public [\_\_construct](#ui-controls-button.construct)([string](#language.types.string) $text)

    /* Métodos */
    public [getText](#ui-controls-button.gettext)(): [string](#language.types.string)

protected [onClick](#ui-controls-button.onclick)()
public [setText](#ui-controls-button.settext)([string](#language.types.string) $text)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Button::\_\_construct

(UI 0.9.9)

UI\Controls\Button::\_\_construct — Construye un nuevo botón

### Descripción

public **UI\Controls\Button::\_\_construct**([string](#language.types.string) $text)

Construye un nuevo botón

### Parámetros

    text


      El texto (etiqueta) de este botón


# UI\Controls\Button::getText

(UI 0.9.9)

UI\Controls\Button::getText — Devuelve el texto

### Descripción

public **UI\Controls\Button::getText**(): [string](#language.types.string)

Devuelve el texto (etiqueta) de este botón

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El texto (etiqueta) actual

# UI\Controls\Button::onClick

(UI 0.9.9)

UI\Controls\Button::onClick — Gestor de clic

### Descripción

protected **UI\Controls\Button::onClick**()

Debe ser ejecutado cuando este botón es clicado

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Button::setText

(UI 0.9.9)

UI\Controls\Button::setText — Establece el texto

### Descripción

public **UI\Controls\Button::setText**([string](#language.types.string) $text)

Establece el texto (etiqueta) de este botón

### Parámetros

    text


      El nuevo texto (etiqueta)


## Tabla de contenidos

- [UI\Controls\Button::\_\_construct](#ui-controls-button.construct) — Construye un nuevo botón
- [UI\Controls\Button::getText](#ui-controls-button.gettext) — Devuelve el texto
- [UI\Controls\Button::onClick](#ui-controls-button.onclick) — Gestor de clic
- [UI\Controls\Button::setText](#ui-controls-button.settext) — Establece el texto

# Botón de control de color

(UI 0.9.9)

## Introducción

    Un botón de color (ColorButton) es un botón que muestra un selector de color cuando se hace clic en él

## Sinopsis de la Clase

    ****




      class **UI\Controls\ColorButton**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Métodos */

public [getColor](#ui-controls-colorbutton.getcolor)(): UI\Color
protected [onChange](#ui-controls-colorbutton.onchange)()
public [setColor](#ui-controls-colorbutton.setcolor)([UI\Draw\Color](#class.ui-draw-color) $color)
public [setColor](#ui-controls-colorbutton.setcolor)([int](#language.types.integer) $color)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\ColorButton::getColor

(UI 0.9.9)

UI\Controls\ColorButton::getColor — Devuelve el color

### Descripción

public **UI\Controls\ColorButton::getColor**(): UI\Color

Devuelve el color actualmente seleccionado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Controls\ColorButton::onChange

(UI 0.9.9)

UI\Controls\ColorButton::onChange — Gestor de cambio

### Descripción

protected **UI\Controls\ColorButton::onChange**()

Debe ser ejecutado cuando el color seleccionado cambia

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\ColorButton::setColor

(UI 0.9.9)

UI\Controls\ColorButton::setColor — Establece el color

### Descripción

public **UI\Controls\ColorButton::setColor**([UI\Draw\Color](#class.ui-draw-color) $color)

public **UI\Controls\ColorButton::setColor**([int](#language.types.integer) $color)

Establece el color actualmente seleccionado

### Parámetros

    color


      El nuevo color


## Tabla de contenidos

- [UI\Controls\ColorButton::getColor](#ui-controls-colorbutton.getcolor) — Devuelve el color
- [UI\Controls\ColorButton::onChange](#ui-controls-colorbutton.onchange) — Gestor de cambio
- [UI\Controls\ColorButton::setColor](#ui-controls-colorbutton.setcolor) — Establece el color

# Etiqueta de Control

(UI 0.9.9)

## Introducción

    Una etiqueta (Label) es una línea de texto única, destinada a identificar, para el usuario, un elemento de la interfaz.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Label**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Constructor */

public [\_\_construct](#ui-controls-label.construct)([string](#language.types.string) $text)

    /* Métodos */
    public [getText](#ui-controls-label.gettext)(): [string](#language.types.string)

public [setText](#ui-controls-label.settext)([string](#language.types.string) $text)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Label::\_\_construct

(UI 0.9.9)

UI\Controls\Label::\_\_construct — Crea una nueva etiqueta

### Descripción

public **UI\Controls\Label::\_\_construct**([string](#language.types.string) $text)

Crea una nueva etiqueta

### Parámetros

    text


      El texto de esta etiqueta


# UI\Controls\Label::getText

(UI 0.9.9)

UI\Controls\Label::getText — Devuelve el texto

### Descripción

public **UI\Controls\Label::getText**(): [string](#language.types.string)

Devuelve el texto actual de esta etiqueta

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Controls\Label::setText

(UI 0.9.9)

UI\Controls\Label::setText — Define el texto

### Descripción

public **UI\Controls\Label::setText**([string](#language.types.string) $text)

Define el texto de esta etiqueta

### Parámetros

    text


      El nuevo texto


## Tabla de contenidos

- [UI\Controls\Label::\_\_construct](#ui-controls-label.construct) — Crea una nueva etiqueta
- [UI\Controls\Label::getText](#ui-controls-label.gettext) — Devuelve el texto
- [UI\Controls\Label::setText](#ui-controls-label.settext) — Define el texto

# Entrada de control

(UI 0.9.9)

## Introducción

    Una entrada (Entry) es un control de entrada de texto, adaptado para ingresar texto sin tratar, contraseñas, o términos de búsqueda.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Entry**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Normal](#ui-controls-entry.constants.normal);

    const
     [int](#language.types.integer)
      [Password](#ui-controls-entry.constants.password);

    const
     [int](#language.types.integer)
      [Search](#ui-controls-entry.constants.search);


    /* Constructor */

public [\_\_construct](#ui-controls-entry.construct)([int](#language.types.integer) $type = UI\Controls\Entry::Normal)

    /* Métodos */
    public [getText](#ui-controls-entry.gettext)(): [string](#language.types.string)

public [isReadOnly](#ui-controls-entry.isreadonly)(): [bool](#language.types.boolean)
protected [onChange](#ui-controls-entry.onchange)()
public [setReadOnly](#ui-controls-entry.setreadonly)([bool](#language.types.boolean) $readOnly)
public [setText](#ui-controls-entry.settext)([string](#language.types.string) $text)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Constantes predefinidas

     **[UI\Controls\Entry::Normal](#ui-controls-entry.constants.normal)**

      Una entrada normal simple






     **[UI\Controls\Entry::Password](#ui-controls-entry.constants.password)**

      Una entrada de contraseña






     **[UI\Controls\Entry::Search](#ui-controls-entry.constants.search)**

      Una entrada de búsqueda




# UI\Controls\Entry::\_\_construct

(UI 0.9.9)

UI\Controls\Entry::\_\_construct — Construye una nueva entrada

### Descripción

public **UI\Controls\Entry::\_\_construct**([int](#language.types.integer) $type = UI\Controls\Entry::Normal)

Crea una nueva entrada del tipo dado

### Parámetros

    type


      Entry::Normal, Entry::Password, o Entry::Search


# UI\Controls\Entry::getText

(UI 0.9.9)

UI\Controls\Entry::getText — Devuelve el texto

### Descripción

public **UI\Controls\Entry::getText**(): [string](#language.types.string)

Devuelve el texto actual de esta entrada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El texto actual

# UI\Controls\Entry::isReadOnly

(UI 0.9.9)

UI\Controls\Entry::isReadOnly — Detecta si la entrada es de sólo lectura

### Descripción

public **UI\Controls\Entry::isReadOnly**(): [bool](#language.types.boolean)

Detecta si esta entrada es de sólo lectura

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Controls\Entry::onChange

(UI 0.9.9)

UI\Controls\Entry::onChange — Gestor de cambios

### Descripción

protected **UI\Controls\Entry::onChange**()

Debe ejecutarse cuando cambia el texto de esta entrada

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Entry::setReadOnly

(UI 0.9.9)

UI\Controls\Entry::setReadOnly — Define si la entrada es de sólo lectura

### Descripción

public **UI\Controls\Entry::setReadOnly**([bool](#language.types.boolean) $readOnly)

Activa o desactiva el modo de sólo lectura para esta entrada

### Parámetros

    readOnly





# UI\Controls\Entry::setText

(UI 0.9.9)

UI\Controls\Entry::setText — Define el texto

### Descripción

public **UI\Controls\Entry::setText**([string](#language.types.string) $text)

Define el texto de esta entrada

### Parámetros

    text


      El nuevo texto


## Tabla de contenidos

- [UI\Controls\Entry::\_\_construct](#ui-controls-entry.construct) — Construye una nueva entrada
- [UI\Controls\Entry::getText](#ui-controls-entry.gettext) — Devuelve el texto
- [UI\Controls\Entry::isReadOnly](#ui-controls-entry.isreadonly) — Detecta si la entrada es de sólo lectura
- [UI\Controls\Entry::onChange](#ui-controls-entry.onchange) — Gestor de cambios
- [UI\Controls\Entry::setReadOnly](#ui-controls-entry.setreadonly) — Define si la entrada es de sólo lectura
- [UI\Controls\Entry::setText](#ui-controls-entry.settext) — Define el texto

# Entrada Multilínea de Control

(UI 0.9.9)

## Introducción

    Una entrada multilínea (Multiline Entry) es un control de entrada de texto capaz de contener múltiples líneas de texto, con o sin retorno de carro.

## Sinopsis de la Clase

    ****




      class **UI\Controls\MultilineEntry**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Wrap](#ui-controls-multilineentry.constants.wrap);

    const
     [int](#language.types.integer)
      [NoWrap](#ui-controls-multilineentry.constants.nowrap);


    /* Constructor */

public [\_\_construct](#ui-controls-multilineentry.construct)([int](#language.types.integer) $type = ?)

    /* Métodos */
    public [append](#ui-controls-multilineentry.append)([string](#language.types.string) $text)

public [getText](#ui-controls-multilineentry.gettext)(): [string](#language.types.string)
public [isReadOnly](#ui-controls-multilineentry.isreadonly)(): [bool](#language.types.boolean)
protected [onChange](#ui-controls-multilineentry.onchange)()
public [setReadOnly](#ui-controls-multilineentry.setreadonly)([bool](#language.types.boolean) $readOnly)
public [setText](#ui-controls-multilineentry.settext)([string](#language.types.string) $text)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Constantes predefinidas

     **[UI\Controls\MultilineEntry::Wrap](#ui-controls-multilineentry.constants.wrap)**

      Permitir que las líneas se devuelvan.






     **[UI\Controls\MultilineEntry::NoWrap](#ui-controls-multilineentry.constants.nowrap)**

      No permitir que las líneas se devuelvan.




# UI\Controls\MultilineEntry::append

(UI 0.9.9)

UI\Controls\MultilineEntry::append — Añadir un texto

### Descripción

public **UI\Controls\MultilineEntry::append**([string](#language.types.string) $text)

Añade el texto dado al texto de esta entrada multilínea

### Parámetros

    text


      El texto a añadir


# UI\Controls\MultilineEntry::\_\_construct

(UI 0.9.9)

UI\Controls\MultilineEntry::\_\_construct — Crea una nueva entrada multilínea

### Descripción

public **UI\Controls\MultilineEntry::\_\_construct**([int](#language.types.integer) $type = ?)

Crea una nueva entrada multilínea del tipo dado

### Parámetros

    type


      MultilineEntry::Wrap o MultilineEntry::NoWrap


# UI\Controls\MultilineEntry::getText

(UI 0.9.9)

UI\Controls\MultilineEntry::getText — Devuelve el texto

### Descripción

public **UI\Controls\MultilineEntry::getText**(): [string](#language.types.string)

Devuelve el texto de esta entrada multilínea

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\MultilineEntry::isReadOnly

(UI 0.9.9)

UI\Controls\MultilineEntry::isReadOnly — Devuelve si esta entrada multilínea es de sólo lectura

### Descripción

public **UI\Controls\MultilineEntry::isReadOnly**(): [bool](#language.types.boolean)

Detecta si esta entrada multilínea es de sólo lectura

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\MultilineEntry::onChange

(UI 0.9.9)

UI\Controls\MultilineEntry::onChange — Gestor de cambios

### Descripción

protected **UI\Controls\MultilineEntry::onChange**()

Debe ejecutarse cuando se modifica el texto de esta entrada multilínea

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\MultilineEntry::setReadOnly

(UI 0.9.9)

UI\Controls\MultilineEntry::setReadOnly — Define si esta entrada multilínea es de sólo lectura

### Descripción

public **UI\Controls\MultilineEntry::setReadOnly**([bool](#language.types.boolean) $readOnly)

Define si se activa o no el modo de sólo lectura en esta entrada multilínea.

### Parámetros

    readOnly





# UI\Controls\MultilineEntry::setText

(UI 0.9.9)

UI\Controls\MultilineEntry::setText — Define el texto

### Descripción

public **UI\Controls\MultilineEntry::setText**([string](#language.types.string) $text)

Define el texto de esta entrada multilínea

### Parámetros

    text


      Le nouveau texte


## Tabla de contenidos

- [UI\Controls\MultilineEntry::append](#ui-controls-multilineentry.append) — Añadir un texto
- [UI\Controls\MultilineEntry::\_\_construct](#ui-controls-multilineentry.construct) — Crea una nueva entrada multilínea
- [UI\Controls\MultilineEntry::getText](#ui-controls-multilineentry.gettext) — Devuelve el texto
- [UI\Controls\MultilineEntry::isReadOnly](#ui-controls-multilineentry.isreadonly) — Devuelve si esta entrada multilínea es de sólo lectura
- [UI\Controls\MultilineEntry::onChange](#ui-controls-multilineentry.onchange) — Gestor de cambios
- [UI\Controls\MultilineEntry::setReadOnly](#ui-controls-multilineentry.setreadonly) — Define si esta entrada multilínea es de sólo lectura
- [UI\Controls\MultilineEntry::setText](#ui-controls-multilineentry.settext) — Define el texto

# Caja de rotación de control

(UI 0.9.9)

## Introducción

    Una caja giratoria ( Spin ) es una caja de texto con un control arriba-abajo que cambia todo el valor de la caja, dentro de un rango definido.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Spin**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Constructor */

public [\_\_construct](#ui-controls-spin.construct)([int](#language.types.integer) $min, [int](#language.types.integer) $max)

    /* Métodos */
    public [getValue](#ui-controls-spin.getvalue)(): [int](#language.types.integer)

protected [onChange](#ui-controls-spin.onchange)()
public [setValue](#ui-controls-spin.setvalue)([int](#language.types.integer) $value)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Spin::\_\_construct

(UI 0.9.9)

UI\Controls\Spin::\_\_construct — Construye una nueva caja de rotación

### Descripción

public **UI\Controls\Spin::\_\_construct**([int](#language.types.integer) $min, [int](#language.types.integer) $max)

Construye una nueva caja de rotación con el rango dado

### Parámetros

    min


      El valor mínimo autorizado






    max


      El valor máximo autorizado


# UI\Controls\Spin::getValue

(UI 0.9.9)

UI\Controls\Spin::getValue — Devuelve el valor

### Descripción

public **UI\Controls\Spin::getValue**(): [int](#language.types.integer)

Devuelve el valor de esta casilla de rotación

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Spin::onChange

(UI 0.9.9)

UI\Controls\Spin::onChange — Gestor de cambios

### Descripción

protected **UI\Controls\Spin::onChange**()

Debe ejecutarse cuando cambia el valor de esta casilla de rotación

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Spin::setValue

(UI 0.9.9)

UI\Controls\Spin::setValue — Define el valor

### Descripción

public **UI\Controls\Spin::setValue**([int](#language.types.integer) $value)

Define el valor de esta casilla de rotación

### Parámetros

    value


      El nuevo valor


## Tabla de contenidos

- [UI\Controls\Spin::\_\_construct](#ui-controls-spin.construct) — Construye una nueva caja de rotación
- [UI\Controls\Spin::getValue](#ui-controls-spin.getvalue) — Devuelve el valor
- [UI\Controls\Spin::onChange](#ui-controls-spin.onchange) — Gestor de cambios
- [UI\Controls\Spin::setValue](#ui-controls-spin.setvalue) — Define el valor

# Control de Deslizamiento

(UI 0.9.9)

## Introducción

    Un control de deslizamiento (Slider) es un control que representa un rango y un valor actual dentro del rango. El elemento de deslizamiento del control (a veces llamado "pulgón") refleja el valor y puede ser ajustado dentro del rango.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Slider**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Constructor */

public [\_\_construct](#ui-controls-slider.construct)([int](#language.types.integer) $min, [int](#language.types.integer) $max)

    /* Métodos */
    public [getValue](#ui-controls-slider.getvalue)(): [int](#language.types.integer)

protected [onChange](#ui-controls-slider.onchange)()
public [setValue](#ui-controls-slider.setvalue)([int](#language.types.integer) $value)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Slider::\_\_construct

(UI 0.9.9)

UI\Controls\Slider::\_\_construct — Construye una nueva diapositiva

### Descripción

public **UI\Controls\Slider::\_\_construct**([int](#language.types.integer) $min, [int](#language.types.integer) $max)

Construye una nueva diapositiva con el rango dado

### Parámetros

    min


      El valor mínimo autorizado






    max


      El valor máximo autorizado


# UI\Controls\Slider::getValue

(UI 0.9.9)

UI\Controls\Slider::getValue — Devuelve el valor

### Descripción

public **UI\Controls\Slider::getValue**(): [int](#language.types.integer)

Devuelve el valor de este deslizador

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Slider::onChange

(UI 0.9.9)

UI\Controls\Slider::onChange — Gestor de cambios

### Descripción

protected **UI\Controls\Slider::onChange**()

Debe ejecutarse cuando cambia el valor de este deslizador

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Slider::setValue

(UI 0.9.9)

UI\Controls\Slider::setValue — Define el valor

### Descripción

public **UI\Controls\Slider::setValue**([int](#language.types.integer) $value)

Define el valor de este control deslizante

### Parámetros

    value


      El nuevo valor


## Tabla de contenidos

- [UI\Controls\Slider::\_\_construct](#ui-controls-slider.construct) — Construye una nueva diapositiva
- [UI\Controls\Slider::getValue](#ui-controls-slider.getvalue) — Devuelve el valor
- [UI\Controls\Slider::onChange](#ui-controls-slider.onchange) — Gestor de cambios
- [UI\Controls\Slider::setValue](#ui-controls-slider.setvalue) — Define el valor

# Control de Progreso

(UI 0.9.9)

## Introducción

    Un control de Progreso (Progress Control) es una barra de progreso familiar: representa el progreso en porcentaje, con un rango posible de 0 a 100 (inclusive).

## Sinopsis de la Clase

    ****




      class **UI\Controls\Progress**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Métodos */

public [getValue](#ui-controls-progress.getvalue)(): [int](#language.types.integer)
public [setValue](#ui-controls-progress.setvalue)([int](#language.types.integer) $value)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Progress::getValue

(UI 0.9.9)

UI\Controls\Progress::getValue — Devuelve el valor

### Descripción

public **UI\Controls\Progress::getValue**(): [int](#language.types.integer)

Devuelve el valor actual de esta barra de progreso

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Progress::setValue

(UI 0.9.9)

UI\Controls\Progress::setValue — Define el valor

### Descripción

public **UI\Controls\Progress::setValue**([int](#language.types.integer) $value)

Define el valor de esta barra de progreso

### Parámetros

    value


      Un número entero entre 0 y 100 (ambos inclusive)


## Tabla de contenidos

- [UI\Controls\Progress::getValue](#ui-controls-progress.getvalue) — Devuelve el valor
- [UI\Controls\Progress::setValue](#ui-controls-progress.setvalue) — Define el valor

# Separador de Control

(UI 0.9.9)

## Introducción

    Un separador (Separator) representa un control separador, no tiene otra función.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Separator**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Horizontal](#ui-controls-separator.constants.horizontal);

    const
     [int](#language.types.integer)
      [Vertical](#ui-controls-separator.constants.vertical);


    /* Constructor */

public [\_\_construct](#ui-controls-separator.construct)([int](#language.types.integer) $type = UI\Controls\Separator::Horizontal)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Constantes predefinidas

     **[UI\Controls\Separator::Horizontal](#ui-controls-separator.constants.horizontal)**

      Un separador horizontal.






     **[UI\Controls\Separator::Vertical](#ui-controls-separator.constants.vertical)**

      Un separador vertical.




# UI\Controls\Separator::\_\_construct

(UI 0.9.9)

UI\Controls\Separator::\_\_construct — Construye un nuevo separador

### Descripción

public **UI\Controls\Separator::\_\_construct**([int](#language.types.integer) $type = UI\Controls\Separator::Horizontal)

Construye un nuevo separador del tipo dado

### Parámetros

    type


      Separator::Horizonal o Separator::Vertical


## Tabla de contenidos

- [UI\Controls\Separator::\_\_construct](#ui-controls-separator.construct) — Construye un nuevo separador

# Caja de combinación de Control

(UI 0.9.9)

## Introducción

    Una caja de combinación (Combo) representa una lista de opciones, como el elemento select HTML familiar.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Combo**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Métodos */

public [append](#ui-controls-combo.append)([string](#language.types.string) $text)
public [getSelected](#ui-controls-combo.getselected)(): [int](#language.types.integer)
protected [onSelected](#ui-controls-combo.onselected)()
public [setSelected](#ui-controls-combo.setselected)([int](#language.types.integer) $index)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Combo::append

(UI 0.9.9)

UI\Controls\Combo::append — Añade una opción

### Descripción

public **UI\Controls\Combo::append**([string](#language.types.string) $text)

Añade una opción a esta lista desplegable.

### Parámetros

    text


      El texto para la nueva opción.


# UI\Controls\Combo::getSelected

(UI 0.9.9)

UI\Controls\Combo::getSelected — Devuelve la opción seleccionada

### Descripción

public **UI\Controls\Combo::getSelected**(): [int](#language.types.integer)

Devuelve el índice de la opción seleccionada en este cuadro de selección.

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Combo::onSelected

(UI 0.9.9)

UI\Controls\Combo::onSelected — Gestor de selección

### Descripción

protected **UI\Controls\Combo::onSelected**()

Debe ejecutarse cuando se selecciona una opción en este cuadro de selección.

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Combo::setSelected

(UI 0.9.9)

UI\Controls\Combo::setSelected — Establece la opción seleccionada

### Descripción

public **UI\Controls\Combo::setSelected**([int](#language.types.integer) $index)

Define la opción actualmente seleccionada en este cuadro de selección.

### Parámetros

    index


      Índice de la opción que debe seleccionarse


## Tabla de contenidos

- [UI\Controls\Combo::append](#ui-controls-combo.append) — Añade una opción
- [UI\Controls\Combo::getSelected](#ui-controls-combo.getselected) — Devuelve la opción seleccionada
- [UI\Controls\Combo::onSelected](#ui-controls-combo.onselected) — Gestor de selección
- [UI\Controls\Combo::setSelected](#ui-controls-combo.setselected) — Establece la opción seleccionada

# Cuadro combinado de control editable

(UI 0.9.9)

## Introducción

    Una boîte de combinaison éditable (Editable Combo) es un Combo que permite al usuario ingresar opciones personalizadas.

## Sinopsis de la Clase

    ****




      class **UI\Controls\EditableCombo**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Métodos */

public [append](#ui-controls-editablecombo.append)([string](#language.types.string) $text)
public [getText](#ui-controls-editablecombo.gettext)(): [string](#language.types.string)
protected [onChange](#ui-controls-editablecombo.onchange)()
public [setText](#ui-controls-editablecombo.settext)([string](#language.types.string) $text)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\EditableCombo::append

(UI 0.9.9)

UI\Controls\EditableCombo::append — Añade una opción

### Descripción

public **UI\Controls\EditableCombo::append**([string](#language.types.string) $text)

Añade una nueva opción a este cuadro de selección editable

### Parámetros

    text


      El texto de la nueva opción


# UI\Controls\EditableCombo::getText

(UI 0.9.9)

UI\Controls\EditableCombo::getText — Devuelve el texto

### Descripción

public **UI\Controls\EditableCombo::getText**(): [string](#language.types.string)

Devuelve el valor de la opción seleccionada actualmente en este cuadro de selección editable

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\EditableCombo::onChange

(UI 0.9.9)

UI\Controls\EditableCombo::onChange — Gestor de cambios

### Descripción

protected **UI\Controls\EditableCombo::onChange**()

Debe ejecutarse cuando cambia el valor de este cuadro de selección editable

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\EditableCombo::setText

(UI 0.9.9)

UI\Controls\EditableCombo::setText — Define el texto

### Descripción

public **UI\Controls\EditableCombo::setText**([string](#language.types.string) $text)

Define el texto de la opción seleccionada actualmente en este cuadro de selección editable

### Parámetros

    text


      El nuevo texto


## Tabla de contenidos

- [UI\Controls\EditableCombo::append](#ui-controls-editablecombo.append) — Añade una opción
- [UI\Controls\EditableCombo::getText](#ui-controls-editablecombo.gettext) — Devuelve el texto
- [UI\Controls\EditableCombo::onChange](#ui-controls-editablecombo.onchange) — Gestor de cambios
- [UI\Controls\EditableCombo::setText](#ui-controls-editablecombo.settext) — Define el texto

# Radio de Control

(UI 0.9.9)

## Introducción

    Una radio es un control de entrada de tipo botón de radio, familiar de las entradas de tipo radio en HTML.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Radio**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Métodos */

public [append](#ui-controls-radio.append)([string](#language.types.string) $text)
public [getSelected](#ui-controls-radio.getselected)(): [int](#language.types.integer)
protected [onSelected](#ui-controls-radio.onselected)()
public [setSelected](#ui-controls-radio.setselected)([int](#language.types.integer) $index)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

# UI\Controls\Radio::append

(UI 0.9.9)

UI\Controls\Radio::append — Añade una opción

### Descripción

public **UI\Controls\Radio::append**([string](#language.types.string) $text)

Añade una nueva opción a esta radio

### Parámetros

    text


      El texto (etiqueta) de la opción


# UI\Controls\Radio::getSelected

(UI 0.9.9)

UI\Controls\Radio::getSelected — Devuelve la opción seleccionada

### Descripción

public **UI\Controls\Radio::getSelected**(): [int](#language.types.integer)

Devuelve el índice de la opción seleccionada actualmente en esta radio

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Radio::onSelected

(UI 0.9.9)

UI\Controls\Radio::onSelected — Gestor de selección

### Descripción

protected **UI\Controls\Radio::onSelected**()

Debe ejecutarse cuando cambia la opción seleccionada en esta radio

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Radio::setSelected

(UI 0.9.9)

UI\Controls\Radio::setSelected — Establece la opción seleccionada

### Descripción

public **UI\Controls\Radio::setSelected**([int](#language.types.integer) $index)

Define la opción actualmente seleccionada en esta radio

### Parámetros

    index


      Índice de la opción que debe seleccionarse


## Tabla de contenidos

- [UI\Controls\Radio::append](#ui-controls-radio.append) — Añade una opción
- [UI\Controls\Radio::getSelected](#ui-controls-radio.getselected) — Devuelve la opción seleccionada
- [UI\Controls\Radio::onSelected](#ui-controls-radio.onselected) — Gestor de selección
- [UI\Controls\Radio::setSelected](#ui-controls-radio.setselected) — Establece la opción seleccionada

# Selector de Control

(UI 0.9.9)

## Introducción

    Un selector (Picker) representa un botón que, al ser clicado, presenta una interfaz nativa de selección de Fecha/Hora/FechaHora al usuario.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Picker**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Date](#ui-controls-picker.constants.date);

    const
     [int](#language.types.integer)
      [Time](#ui-controls-picker.constants.time);

    const
     [int](#language.types.integer)
      [DateTime](#ui-controls-picker.constants.datetime);


    /* Constructor */

public [\_\_construct](#ui-controls-picker.construct)([int](#language.types.integer) $type = UI\Controls\Picker::Date)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Constantes predefinidas

     **[UI\Controls\Picker::Date](#ui-controls-picker.constants.date)**

      Un selector de Fecha






     **[UI\Controls\Picker::Time](#ui-controls-picker.constants.time)**

      Un selector de Tiempo






     **[UI\Controls\Picker::DateTime](#ui-controls-picker.constants.datetime)**

      Un selector de Fecha y Tiempo




# UI\Controls\Picker::\_\_construct

(UI 0.9.9)

UI\Controls\Picker::\_\_construct — Crea un nuevo selector

### Descripción

public **UI\Controls\Picker::\_\_construct**([int](#language.types.integer) $type = UI\Controls\Picker::Date)

Crea un nuevo selector del tipo dado

### Parámetros

    type


      Picker::Date, Picker::Time, o Picker::DateTime


## Tabla de contenidos

- [UI\Controls\Picker::\_\_construct](#ui-controls-picker.construct) — Crea un nuevo selector

# Formulario de Control (Disposición)

(UI 0.9.9)

## Introducción

    Un formulario (Form) es un control que permite el arreglo de otros controles en una disposición familiar (el formulario).

## Sinopsis de la Clase

    ****




      class **UI\Controls\Form**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Propiedades */

     protected
      [$controls](#ui-controls-form.props.controls);


    /* Métodos */

public [append](#ui-controls-form.append)([string](#language.types.string) $label, [UI\Control](#class.ui-control) $control, [bool](#language.types.boolean) $stretchy = **[false](#constant.false)**): [int](#language.types.integer)
public [delete](#ui-controls-form.delete)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [isPadded](#ui-controls-form.ispadded)(): [bool](#language.types.boolean)
public [setPadded](#ui-controls-form.setpadded)([bool](#language.types.boolean) $padded)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Propiedades

     controls


       Contiene controles, no debe ser manipulado directamente





# UI\Controls\Form::append

(UI 0.9.9)

UI\Controls\Form::append — Añade un control

### Descripción

public **UI\Controls\Form::append**([string](#language.types.string) $label, [UI\Control](#class.ui-control) $control, [bool](#language.types.boolean) $stretchy = **[false](#constant.false)**): [int](#language.types.integer)

Añade el control al formulario y define la etiqueta

### Parámetros

    label


      El texto de la etiqueta






    control


      Un control






    stretchy


      Debe establecerse en true para estirar el control


### Valores devueltos

Devuelve el índice del control añadido, puede ser 0

# UI\Controls\Form::delete

(UI 0.9.9)

UI\Controls\Form::delete — Suprime un control

### Descripción

public **UI\Controls\Form::delete**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Suprime el control en el índice dado en este formulario

### Parámetros

    index


      El índice del control que se va a eliminar


### Valores devueltos

Indicación de éxito

# UI\Controls\Form::isPadded

(UI 0.9.9)

UI\Controls\Form::isPadded — Detección de relleno

### Descripción

public **UI\Controls\Form::isPadded**(): [bool](#language.types.boolean)

Detecta si el relleno está activado en este formulario

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Form::setPadded

(UI 0.9.9)

UI\Controls\Form::setPadded — Define el relleno

### Descripción

public **UI\Controls\Form::setPadded**([bool](#language.types.boolean) $padded)

Define si el relleno está activado o desactivado en este formulario

### Parámetros

    padded





## Tabla de contenidos

- [UI\Controls\Form::append](#ui-controls-form.append) — Añade un control
- [UI\Controls\Form::delete](#ui-controls-form.delete) — Suprime un control
- [UI\Controls\Form::isPadded](#ui-controls-form.ispadded) — Detección de relleno
- [UI\Controls\Form::setPadded](#ui-controls-form.setpadded) — Define el relleno

# Cuadrícula de Control (Disposición)

(UI 0.9.9)

## Introducción

    Una cuadrícula (Grid) es un control que permite el arreglo de los hijos en una cuadrícula.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Grid**



      extends
       [UI\Control](#class.ui-control)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Fill](#ui-controls-grid.constants.fill);

    const
     [int](#language.types.integer)
      [Start](#ui-controls-grid.constants.start);

    const
     [int](#language.types.integer)
      [Center](#ui-controls-grid.constants.center);

    const
     [int](#language.types.integer)
      [End](#ui-controls-grid.constants.end);

    const
     [int](#language.types.integer)
      [Leading](#ui-controls-grid.constants.leading);

    const
     [int](#language.types.integer)
      [Top](#ui-controls-grid.constants.top);

    const
     [int](#language.types.integer)
      [Trailing](#ui-controls-grid.constants.trailing);

    const
     [int](#language.types.integer)
      [Bottom](#ui-controls-grid.constants.bottom);


    /* Propiedades */
    protected
      [$controls](#ui-controls-grid.props.controls);


    /* Métodos */

public [append](#ui-controls-grid.append)(
    [UI\Control](#class.ui-control) $control,
    [int](#language.types.integer) $left,
    [int](#language.types.integer) $top,
    [int](#language.types.integer) $xspan,
    [int](#language.types.integer) $yspan,
    [bool](#language.types.boolean) $hexpand,
    [int](#language.types.integer) $halign,
    [bool](#language.types.boolean) $vexpand,
    [int](#language.types.integer) $valign
)
public [isPadded](#ui-controls-grid.ispadded)(): [bool](#language.types.boolean)
public [setPadded](#ui-controls-grid.setpadded)([bool](#language.types.boolean) $padding)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Constantes predefinidas

     **[UI\Controls\Grid::Fill](#ui-controls-grid.constants.fill)**

      Rellena el espacio disponible.






     **[UI\Controls\Grid::Start](#ui-controls-grid.constants.start)**

      Alinea al inicio.






     **[UI\Controls\Grid::Center](#ui-controls-grid.constants.center)**

      Centra en el espacio disponible.






     **[UI\Controls\Grid::End](#ui-controls-grid.constants.end)**

      Alinea al final.






     **[UI\Controls\Grid::Leading](#ui-controls-grid.constants.leading)**

      Alinea al inicio del texto.






     **[UI\Controls\Grid::Top](#ui-controls-grid.constants.top)**

      Alinea en la parte superior.






     **[UI\Controls\Grid::Trailing](#ui-controls-grid.constants.trailing)**

      Alinea al final del texto.






     **[UI\Controls\Grid::Bottom](#ui-controls-grid.constants.bottom)**

      Alinea en la parte inferior.




## Propiedades

     controls


       Contiene controles, no debe ser manipulado directamente.





# UI\Controls\Grid::append

(UI 0.9.9)

UI\Controls\Grid::append — Añade un control

### Descripción

public **UI\Controls\Grid::append**(
    [UI\Control](#class.ui-control) $control,
    [int](#language.types.integer) $left,
    [int](#language.types.integer) $top,
    [int](#language.types.integer) $xspan,
    [int](#language.types.integer) $yspan,
    [bool](#language.types.boolean) $hexpand,
    [int](#language.types.integer) $halign,
    [bool](#language.types.boolean) $vexpand,
    [int](#language.types.integer) $valign
)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    control


      El control a añadir






    left









    top









    xspan









    yspan









    hexpand









    halign









    vexpand









    valign





### Valores devueltos

# UI\Controls\Grid::isPadded

(UI 0.9.9)

UI\Controls\Grid::isPadded — Detección de relleno

### Descripción

public **UI\Controls\Grid::isPadded**(): [bool](#language.types.boolean)

Detecta si el relleno está activado en esta cuadrícula

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Grid::setPadded

(UI 0.9.9)

UI\Controls\Grid::setPadded — Define el relleno

### Descripción

public **UI\Controls\Grid::setPadded**([bool](#language.types.boolean) $padding)

Define si el relleno está activado o no en esta cuadrícula

### Parámetros

    padding





## Tabla de contenidos

- [UI\Controls\Grid::append](#ui-controls-grid.append) — Añade un control
- [UI\Controls\Grid::isPadded](#ui-controls-grid.ispadded) — Detección de relleno
- [UI\Controls\Grid::setPadded](#ui-controls-grid.setpadded) — Define el relleno

# Grupo de Control (Disposición)

(UI 0.9.9)

## Introducción

    Un grupo (Group) es un contenedor con título para los controles hijos.

## Sinopsis de la Clase

    ****




      class **UI\Controls\Group**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Propiedades */

     protected
      [$controls](#ui-controls-group.props.controls);


    /* Constructor */

public [\_\_construct](#ui-controls-group.construct)([string](#language.types.string) $title)

    /* Métodos */
    public [append](#ui-controls-group.append)([UI\Control](#class.ui-control) $control)

public [getTitle](#ui-controls-group.gettitle)(): [string](#language.types.string)
public [hasMargin](#ui-controls-group.hasmargin)(): [bool](#language.types.boolean)
public [setMargin](#ui-controls-group.setmargin)([bool](#language.types.boolean) $margin)
public [setTitle](#ui-controls-group.settitle)([string](#language.types.string) $title)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Propiedades

     controls


       Contiene controles, no debe ser manipulado directamente.





# UI\Controls\Group::append

(No version information available, might only be in Git)

UI\Controls\Group::append — Añade un control

### Descripción

public **UI\Controls\Group::append**([UI\Control](#class.ui-control) $control)

Añade un control a este grupo

### Parámetros

    control


      El control que debe añadirse


# UI\Controls\Group::\_\_construct

(UI 0.9.9)

UI\Controls\Group::\_\_construct — Crea un nuevo grupo

### Descripción

public **UI\Controls\Group::\_\_construct**([string](#language.types.string) $title)

Crea un nuevo grupo con el título indicado

### Parámetros

    title


      Texto de la etiqueta del título


# UI\Controls\Group::getTitle

(UI 0.9.9)

UI\Controls\Group::getTitle — Devuelve el título

### Descripción

public **UI\Controls\Group::getTitle**(): [string](#language.types.string)

Devuelve el título actual de este grupo

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El título actual

# UI\Controls\Group::hasMargin

(UI 0.9.9)

UI\Controls\Group::hasMargin — Detección de márgenes

### Descripción

public **UI\Controls\Group::hasMargin**(): [bool](#language.types.boolean)

Detecta si el margen está activado en este grupo

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Group::setMargin

(UI 0.9.9)

UI\Controls\Group::setMargin — Define el margen

### Descripción

public **UI\Controls\Group::setMargin**([bool](#language.types.boolean) $margin)

Define si el margen está activado o no en este grupo

### Parámetros

    margin





# UI\Controls\Group::setTitle

(UI 0.9.9)

UI\Controls\Group::setTitle — Define el título

### Descripción

public **UI\Controls\Group::setTitle**([string](#language.types.string) $title)

Define el título de este grupo

### Parámetros

    title


      El texto del nuevo título


## Tabla de contenidos

- [UI\Controls\Group::append](#ui-controls-group.append) — Añade un control
- [UI\Controls\Group::\_\_construct](#ui-controls-group.construct) — Crea un nuevo grupo
- [UI\Controls\Group::getTitle](#ui-controls-group.gettitle) — Devuelve el título
- [UI\Controls\Group::hasMargin](#ui-controls-group.hasmargin) — Detección de márgenes
- [UI\Controls\Group::setMargin](#ui-controls-group.setmargin) — Define el margen
- [UI\Controls\Group::setTitle](#ui-controls-group.settitle) — Define el título

# Caja de control (Disposición)

(UI 0.9.9)

## Introducción

    Una caja (Box) permite el arreglo de otros controles

## Sinopsis de la Clase

    ****




      class **UI\Controls\Box**



      extends
       [UI\Control](#class.ui-control)

     {


    /* Constantes */

     const
     [int](#language.types.integer)
      [Vertical](#ui-controls-box.constants.vertical);

    const
     [int](#language.types.integer)
      [Horizontal](#ui-controls-box.constants.horizontal);


    /* Propiedades */
    protected
      [$controls](#ui-controls-box.props.controls);


    /* Constructor */

public [\_\_construct](#ui-controls-box.construct)([int](#language.types.integer) $orientation = UI\Controls\Box::Horizontal)

    /* Métodos */
    public [append](#ui-controls-box.append)(Control $control, [bool](#language.types.boolean) $stretchy = **[false](#constant.false)**): [int](#language.types.integer)

public [delete](#ui-controls-box.delete)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [getOrientation](#ui-controls-box.getorientation)(): [int](#language.types.integer)
public [isPadded](#ui-controls-box.ispadded)(): [bool](#language.types.boolean)
public [setPadded](#ui-controls-box.setpadded)([bool](#language.types.boolean) $padded)

    /* Métodos heredados */
    public [UI\Control::destroy](#ui-control.destroy)()

public [UI\Control::disable](#ui-control.disable)()
public [UI\Control::enable](#ui-control.enable)()
public [UI\Control::getParent](#ui-control.getparent)(): [UI\Control](#class.ui-control)
public [UI\Control::getTopLevel](#ui-control.gettoplevel)(): [int](#language.types.integer)
public [UI\Control::hide](#ui-control.hide)()
public [UI\Control::isEnabled](#ui-control.isenabled)(): [bool](#language.types.boolean)
public [UI\Control::isVisible](#ui-control.isvisible)(): [bool](#language.types.boolean)
public [UI\Control::setParent](#ui-control.setparent)([UI\Control](#class.ui-control) $parent)
public [UI\Control::show](#ui-control.show)()

}

## Propiedades

     controls


       Contiene los controles, no debe ser manipulado directamente





## Constantes predefinidas

     **[UI\Controls\Box::Vertical](#ui-controls-box.constants.vertical)**








     **[UI\Controls\Box::Horizontal](#ui-controls-box.constants.horizontal)**






# UI\Controls\Box::append

(UI 0.9.9)

UI\Controls\Box::append — Añade un control

### Descripción

public **UI\Controls\Box::append**(Control $control, [bool](#language.types.boolean) $stretchy = **[false](#constant.false)**): [int](#language.types.integer)

Añade el control dado a esta caja

### Parámetros

    control


      El control a añadir






    stretchy


      Define si el control debe ser estirado


### Valores devueltos

Devuelve el índice del control añadido, puede ser 0

# UI\Controls\Box::\_\_construct

(UI 0.9.9)

UI\Controls\Box::\_\_construct — Construye una nueva caja

### Descripción

public **UI\Controls\Box::\_\_construct**([int](#language.types.integer) $orientation = UI\Controls\Box::Horizontal)

Construye una nueva caja

### Parámetros

    orientation


      Box::Horizontal o Box::Vertical


# UI\Controls\Box::delete

(UI 0.9.9)

UI\Controls\Box::delete — Elimina un control

### Descripción

public **UI\Controls\Box::delete**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Elimina el control en el índice dado de esta caja

### Parámetros

    index


      El índice del control a eliminar


### Valores devueltos

Indica el éxito

# UI\Controls\Box::getOrientation

(UI 0.9.9)

UI\Controls\Box::getOrientation — Devuelve la orientación

### Descripción

public **UI\Controls\Box::getOrientation**(): [int](#language.types.integer)

Devuelve la orientación de esta caja

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Box::isPadded

(UI 0.9.9)

UI\Controls\Box::isPadded — Detección del relleno

### Descripción

public **UI\Controls\Box::isPadded**(): [bool](#language.types.boolean)

Detecta si el relleno está activado en esta caja

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Controls\Box::setPadded

(UI 0.9.9)

UI\Controls\Box::setPadded — Establece el relleno

### Descripción

public **UI\Controls\Box::setPadded**([bool](#language.types.boolean) $padded)

Establece si el relleno está activado o no en esta caja

### Parámetros

    padded


      Indica si el relleno está activado


## Tabla de contenidos

- [UI\Controls\Box::append](#ui-controls-box.append) — Añade un control
- [UI\Controls\Box::\_\_construct](#ui-controls-box.construct) — Construye una nueva caja
- [UI\Controls\Box::delete](#ui-controls-box.delete) — Elimina un control
- [UI\Controls\Box::getOrientation](#ui-controls-box.getorientation) — Devuelve la orientación
- [UI\Controls\Box::isPadded](#ui-controls-box.ispadded) — Detección del relleno
- [UI\Controls\Box::setPadded](#ui-controls-box.setpadded) — Establece el relleno

# Lápiz de dibujo

(UI 0.9.9)

## Introducción

    El lápiz se pasa al evento de dibujo de zona y se utiliza para recortar, rellenar, dibujar y escribir trazados de dibujo.

## Sinopsis de la Clase

    ****




      final
      class **UI\Draw\Pen**

     {


    /* Métodos */

public [clip](#ui-draw-pen.clip)([UI\Draw\Path](#class.ui-draw-path) $path)
public [fill](#ui-draw-pen.fill)([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Brush](#class.ui-draw-brush) $with)
public [fill](#ui-draw-pen.fill)([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Color](#class.ui-draw-color) $with)
public [fill](#ui-draw-pen.fill)([UI\Draw\Path](#class.ui-draw-path) $path, [int](#language.types.integer) $with)
public [restore](#ui-draw-pen.restore)()
public [save](#ui-draw-pen.save)()
public [stroke](#ui-draw-pen.stroke)([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Brush](#class.ui-draw-brush) $with, [UI\Draw\Stroke](#class.ui-draw-stroke) $stroke)
public [stroke](#ui-draw-pen.stroke)([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Color](#class.ui-draw-color) $with, [UI\Draw\Stroke](#class.ui-draw-stroke) $stroke)
public [stroke](#ui-draw-pen.stroke)([UI\Draw\Path](#class.ui-draw-path) $path, [int](#language.types.integer) $with, [UI\Draw\Stroke](#class.ui-draw-stroke) $stroke)
public [transform](#ui-draw-pen.transform)([UI\Draw\Matrix](#class.ui-draw-matrix) $matrix)
public [write](#ui-draw-pen.write)([UI\Point](#class.ui-point) $point, [UI\Draw\Text\Layout](#class.ui-draw-text-layout) $layout)

}

# UI\Draw\Pen::clip

(UI 0.9.9)

UI\Draw\Pen::clip — Cortar un camino

### Descripción

public **UI\Draw\Pen::clip**([UI\Draw\Path](#class.ui-draw-path) $path)

Corta la ruta dada

### Parámetros

    path


      El camino a cortar


# UI\Draw\Pen::fill

(UI 0.9.9)

UI\Draw\Pen::fill — Llena una ruta

### Descripción

public **UI\Draw\Pen::fill**([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Brush](#class.ui-draw-brush) $with)

public **UI\Draw\Pen::fill**([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Color](#class.ui-draw-color) $with)

public **UI\Draw\Pen::fill**([UI\Draw\Path](#class.ui-draw-path) $path, [int](#language.types.integer) $with)

Llenará la ruta dada

### Parámetros

    path


      La ruta a llenar






    with


     El color o el pincel para rellenar


# UI\Draw\Pen::restore

(UI 0.9.9)

UI\Draw\Pen::restore — Restaura

### Descripción

public **UI\Draw\Pen::restore**()

Restaurará un bolígrafo previamente guardado

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Draw\Pen::save

(UI 0.9.9)

UI\Draw\Pen::save — Guarda

### Descripción

public **UI\Draw\Pen::save**()

Guardará el bolígrafo

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Draw\Pen::stroke

(UI 0.9.9)

UI\Draw\Pen::stroke — Traza una ruta

### Descripción

public **UI\Draw\Pen::stroke**([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Brush](#class.ui-draw-brush) $with, [UI\Draw\Stroke](#class.ui-draw-stroke) $stroke)

public **UI\Draw\Pen::stroke**([UI\Draw\Path](#class.ui-draw-path) $path, [UI\Draw\Color](#class.ui-draw-color) $with, [UI\Draw\Stroke](#class.ui-draw-stroke) $stroke)

public **UI\Draw\Pen::stroke**([UI\Draw\Path](#class.ui-draw-path) $path, [int](#language.types.integer) $with, [UI\Draw\Stroke](#class.ui-draw-stroke) $stroke)

Trazará la ruta dada

### Parámetros

    path


      La ruta del trazo






    with


      El color o el pincel con el que trazar






    stroke


      La configuración del trazo


# UI\Draw\Pen::transform

(UI 0.9.9)

UI\Draw\Pen::transform — Transformación de la matriz

### Descripción

public **UI\Draw\Pen::transform**([UI\Draw\Matrix](#class.ui-draw-matrix) $matrix)

Realizará la transformación de la matriz

### Parámetros

    matrix


      La matriz a usar


# UI\Draw\Pen::write

(UI 0.9.9)

UI\Draw\Pen::write — Dibuja el texto en el punto

### Descripción

public **UI\Draw\Pen::write**([UI\Point](#class.ui-point) $point, [UI\Draw\Text\Layout](#class.ui-draw-text-layout) $layout)

Dibujará la disposición del texto en el punto dado

### Parámetros

    point


      El punto a realizar el dibujo






    layout


      La disposición del texto a dibujar


## Tabla de contenidos

- [UI\Draw\Pen::clip](#ui-draw-pen.clip) — Cortar un camino
- [UI\Draw\Pen::fill](#ui-draw-pen.fill) — Llena una ruta
- [UI\Draw\Pen::restore](#ui-draw-pen.restore) — Restaura
- [UI\Draw\Pen::save](#ui-draw-pen.save) — Guarda
- [UI\Draw\Pen::stroke](#ui-draw-pen.stroke) — Traza una ruta
- [UI\Draw\Pen::transform](#ui-draw-pen.transform) — Transformación de la matriz
- [UI\Draw\Pen::write](#ui-draw-pen.write) — Dibuja el texto en el punto

# Dibujo del camino

(UI 0.9.9)

## Introducción

    Una ruta de dibujo guía al rotulador, indicándole dónde dibujar en un área.

## Sinopsis de la Clase

    ****




      class **UI\Draw\Path**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Winding](#ui-draw-path.constants.winding);

    const
     [int](#language.types.integer)
      [Alternate](#ui-draw-path.constants.alternate);


    /* Constructor */

public [\_\_construct](#ui-draw-path.construct)([int](#language.types.integer) $mode = UI\Draw\Path::Winding)

    /* Métodos */
    public [addRectangle](#ui-draw-path.addrectangle)([UI\Point](#class.ui-point) $point, [UI\Size](#class.ui-size) $size)

public [arcTo](#ui-draw-path.arcto)(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)
public [bezierTo](#ui-draw-path.bezierto)(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)
public [closeFigure](#ui-draw-path.closefigure)()
public [end](#ui-draw-path.end)()
public [lineTo](#ui-draw-path.lineto)(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)
public [newFigure](#ui-draw-path.newfigure)([UI\Point](#class.ui-point) $point)
public [newFigureWithArc](#ui-draw-path.newfigurewitharc)(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)

}

## Constantes predefinidas

     **[UI\Draw\Path::Winding](#ui-draw-path.constants.winding)**


       Este es el modo de trazado por defecto







     **[UI\Draw\Path::Alternate](#ui-draw-path.constants.alternate)**


       Este es el modo alternativo de diseño de la ruta





# UI\Draw\Path::addRectangle

(UI 0.9.9)

UI\Draw\Path::addRectangle — Dibuja un rectángulo

### Descripción

public **UI\Draw\Path::addRectangle**([UI\Point](#class.ui-point) $point, [UI\Size](#class.ui-size) $size)

Trazará la ruta de un rectángulo del tamaño dado, en el punto dado

### Parámetros

    point


      El punto de partida de la forma






    size


      El tamaño del rectángulo


# UI\Draw\Path::arcTo

(UI 0.9.9)

UI\Draw\Path::arcTo — Dibuja un arco

### Descripción

public **UI\Draw\Path::arcTo**(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)

Trazará la ruta para un arco

### Parámetros

    point


      El punto de partida del mapeo






    radius


      El radio del arco






    angle


      El ángulo del arco






    sweep


      El alcance del arco






    negative





### Valores devueltos

# UI\Draw\Path::bezierTo

(UI 0.9.9)

UI\Draw\Path::bezierTo — Dibujar una curva de Bézier

### Descripción

public **UI\Draw\Path::bezierTo**(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)

Dibujar una curva de Bézier

### Parámetros

    point


      El punto de partida de la ruta






    radius


      El radio de la curva






    angle


      El ángulo de la curva






    sweep


      La extensión de la curva






    negative





# UI\Draw\Path::closeFigure

(UI 0.9.9)

UI\Draw\Path::closeFigure — Cerrar Figura

### Descripción

public **UI\Draw\Path::closeFigure**()

Cerrará la figura actual

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Draw\Path::\_\_construct

(UI 0.9.9)

UI\Draw\Path::\_\_construct — Construye una nueva ruta

### Descripción

public **UI\Draw\Path::\_\_construct**([int](#language.types.integer) $mode = UI\Draw\Path::Winding)

Construirá una nueva ruta en el modo dado

### Parámetros

    mode


      Path::Winding o Path::Alternate


# UI\Draw\Path::end

(UI 0.9.9)

UI\Draw\Path::end — Finalizar Ruta

### Descripción

public **UI\Draw\Path::end**()

Finalizará esta ruta

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Draw\Path::lineTo

(UI 0.9.9)

UI\Draw\Path::lineTo — Dibuja una línea

### Descripción

public **UI\Draw\Path::lineTo**(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)

Trazará la ruta para una línea

### Parámetros

    point


      El punto de partida del mapeo






    radius









    angle









    sweep









    negative





### Valores devueltos

# UI\Draw\Path::newFigure

(UI 0.9.9)

UI\Draw\Path::newFigure — Dibuja figura

### Descripción

public **UI\Draw\Path::newFigure**([UI\Point](#class.ui-point) $point)

Trazará una nueva figura en el punto dado

### Parámetros

    point


      El punto de partida del mapeo


# UI\Draw\Path::newFigureWithArc

(UI 0.9.9)

UI\Draw\Path::newFigureWithArc — Dibuja figura con arco

### Descripción

public **UI\Draw\Path::newFigureWithArc**(
    [UI\Point](#class.ui-point) $point,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $angle,
    [float](#language.types.float) $sweep,
    [float](#language.types.float) $negative
)

### Parámetros

    point









    radius









    angle









    sweep









    negative





### Valores devueltos

## Tabla de contenidos

- [UI\Draw\Path::addRectangle](#ui-draw-path.addrectangle) — Dibuja un rectángulo
- [UI\Draw\Path::arcTo](#ui-draw-path.arcto) — Dibuja un arco
- [UI\Draw\Path::bezierTo](#ui-draw-path.bezierto) — Dibujar una curva de Bézier
- [UI\Draw\Path::closeFigure](#ui-draw-path.closefigure) — Cerrar Figura
- [UI\Draw\Path::\_\_construct](#ui-draw-path.construct) — Construye una nueva ruta
- [UI\Draw\Path::end](#ui-draw-path.end) — Finalizar Ruta
- [UI\Draw\Path::lineTo](#ui-draw-path.lineto) — Dibuja una línea
- [UI\Draw\Path::newFigure](#ui-draw-path.newfigure) — Dibuja figura
- [UI\Draw\Path::newFigureWithArc](#ui-draw-path.newfigurewitharc) — Dibuja figura con arco

# Matriz de dibujo

(UI 0.9.9)

## Introducción

## Sinopsis de la Clase

    ****




      class **UI\Draw\Matrix**

     {


    /* Métodos */

public [invert](#ui-draw-matrix.invert)()
public [isInvertible](#ui-draw-matrix.isinvertible)(): [bool](#language.types.boolean)
public [multiply](#ui-draw-matrix.multiply)([UI\Draw\Matrix](#class.ui-draw-matrix) $matrix): [UI\Draw\Matrix](#class.ui-draw-matrix)
public [rotate](#ui-draw-matrix.rotate)([UI\Point](#class.ui-point) $point, [float](#language.types.float) $amount)
public [scale](#ui-draw-matrix.scale)([UI\Point](#class.ui-point) $center, [UI\Point](#class.ui-point) $point)
public [skew](#ui-draw-matrix.skew)([UI\Point](#class.ui-point) $point, [UI\Point](#class.ui-point) $amount)
public [translate](#ui-draw-matrix.translate)([UI\Point](#class.ui-point) $point)

}

# UI\Draw\Matrix::invert

(UI 0.9.9)

UI\Draw\Matrix::invert — Invertir matriz

### Descripción

public **UI\Draw\Matrix::invert**()

Invertirá esta matriz

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Draw\Matrix::isInvertible

(UI 0.9.9)

UI\Draw\Matrix::isInvertible — Detección de invertido

### Descripción

public **UI\Draw\Matrix::isInvertible**(): [bool](#language.types.boolean)

Detectará si esta Matriz puede ser invertida

### Parámetros

Esta función no contiene ningún parámetro.

# UI\Draw\Matrix::multiply

(UI 0.9.9)

UI\Draw\Matrix::multiply — Multiplica la matriz

### Descripción

public **UI\Draw\Matrix::multiply**([UI\Draw\Matrix](#class.ui-draw-matrix) $matrix): [UI\Draw\Matrix](#class.ui-draw-matrix)

Multiplicará esta matriz con la matriz dada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La nueva matriz

# UI\Draw\Matrix::rotate

(UI 0.9.9)

UI\Draw\Matrix::rotate — Rota la matriz

### Descripción

public **UI\Draw\Matrix::rotate**([UI\Point](#class.ui-point) $point, [float](#language.types.float) $amount)

Rotar esta Matriz

### Parámetros

    point









    amount





# UI\Draw\Matrix::scale

(UI 0.9.9)

UI\Draw\Matrix::scale — Escala la Matriz

### Descripción

public **UI\Draw\Matrix::scale**([UI\Point](#class.ui-point) $center, [UI\Point](#class.ui-point) $point)

Escalará esta Matriz

### Parámetros

    center









    point





# UI\Draw\Matrix::skew

(UI 0.9.9)

UI\Draw\Matrix::skew — Inclina la Matriz

### Descripción

public **UI\Draw\Matrix::skew**([UI\Point](#class.ui-point) $point, [UI\Point](#class.ui-point) $amount)

Inclinará esta Matriz

### Parámetros

    point









    amount





# UI\Draw\Matrix::translate

(UI 0.9.9)

UI\Draw\Matrix::translate — Traduce la matriz

### Descripción

public **UI\Draw\Matrix::translate**([UI\Point](#class.ui-point) $point)

Traducirá esta Matriz

### Parámetros

    point





## Tabla de contenidos

- [UI\Draw\Matrix::invert](#ui-draw-matrix.invert) — Invertir matriz
- [UI\Draw\Matrix::isInvertible](#ui-draw-matrix.isinvertible) — Detección de invertido
- [UI\Draw\Matrix::multiply](#ui-draw-matrix.multiply) — Multiplica la matriz
- [UI\Draw\Matrix::rotate](#ui-draw-matrix.rotate) — Rota la matriz
- [UI\Draw\Matrix::scale](#ui-draw-matrix.scale) — Escala la Matriz
- [UI\Draw\Matrix::skew](#ui-draw-matrix.skew) — Inclina la Matriz
- [UI\Draw\Matrix::translate](#ui-draw-matrix.translate) — Traduce la matriz

# Representación en color

(UI 0.9.9)

## Introducción

    Representa un color RGBA, los canales individuales son accesibles a través de propiedades públicas.

## Sinopsis de la Clase

    ****




      class **UI\Draw\Color**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Red](#ui-draw-color.constants.red);

    const
     [int](#language.types.integer)
      [Green](#ui-draw-color.constants.green);

    const
     [int](#language.types.integer)
      [Blue](#ui-draw-color.constants.blue);

    const
     [int](#language.types.integer)
      [Alpha](#ui-draw-color.constants.alpha);


    /* Propiedades */
    public
      [$r](#ui-draw-color.props.r);

    public
      [$g](#ui-draw-color.props.g);

    public
      [$b](#ui-draw-color.props.b);

    public
      [$a](#ui-draw-color.props.a);


    /* Constructor */

public [\_\_construct](#ui-draw-color.construct)([UI\Draw\Color](#class.ui-draw-color) $color = ?)
public [\_\_construct](#ui-draw-color.construct)([int](#language.types.integer) $color = ?)

    /* Métodos */
    public [getChannel](#ui-draw-color.getchannel)([int](#language.types.integer) $channel): [float](#language.types.float)

public [setChannel](#ui-draw-color.setchannel)([int](#language.types.integer) $channel, [float](#language.types.float) $value): [void](language.types.void.html)

}

## Propiedades

     r

      Proporciona acceso al canal rojo





     g

      Proporciona acceso al canal verde





     b

      Proporciona acceso al canal azul





     a

      Proporciona acceso al canal alfa




## Constantes predefinidas

     **[UI\Draw\Color::Red](#ui-draw-color.constants.red)**

      Identifica el canal rojo






     **[UI\Draw\Color::Green](#ui-draw-color.constants.green)**

      Identifica el canal verde






     **[UI\Draw\Color::Blue](#ui-draw-color.constants.blue)**

      Identifica el canal azul






     **[UI\Draw\Color::Alpha](#ui-draw-color.constants.alpha)**

      Identifica el canal alfa




# UI\Draw\Color::\_\_construct

(UI 0.9.9)

UI\Draw\Color::\_\_construct — Construye un nuevo color

### Descripción

public **UI\Draw\Color::\_\_construct**([UI\Draw\Color](#class.ui-draw-color) $color = ?)

public **UI\Draw\Color::\_\_construct**([int](#language.types.integer) $color = ?)

Construirá un nuevo color

### Parámetros

    color


      Puede ser UI\Draw\Color o RRGGBBAA


# UI\Draw\Color::getChannel

(UI 0.9.9)

UI\Draw\Color::getChannel — Manipulación de color

### Descripción

public **UI\Draw\Color::getChannel**([int](#language.types.integer) $channel): [float](#language.types.float)

Recuperará el valor de un canal

### Parámetros

    channel


      La identidad del canal constante


### Valores devueltos

El valor actual del canal solicitado

# UI\Draw\Color::setChannel

(UI 0.9.9)

UI\Draw\Color::setChannel — Manipulación de color

### Descripción

public **UI\Draw\Color::setChannel**([int](#language.types.integer) $channel, [float](#language.types.float) $value): [void](language.types.void.html)

Pondrá el canal seleccionado en el valor dado

### Parámetros

    channel


      La identidad del canal constante






    value


      El nuevo valor para el canal seleccionado


### Valores devueltos

## Tabla de contenidos

- [UI\Draw\Color::\_\_construct](#ui-draw-color.construct) — Construye un nuevo color
- [UI\Draw\Color::getChannel](#ui-draw-color.getchannel) — Manipulación de color
- [UI\Draw\Color::setChannel](#ui-draw-color.setchannel) — Manipulación de color

# Dibujo lineal

(UI 0.9.9)

## Introducción

    Mantiene la configuración para que el Pen haga una línea

## Sinopsis de la Clase

    ****




      class **UI\Draw\Stroke**

     {


    /* Constructor */

public [\_\_construct](#ui-draw-stroke.construct)(
    [int](#language.types.integer) $cap = UI\Draw\Line\Cap::Flat,
    [int](#language.types.integer) $join = UI\Draw\Line\Join::Miter,
    [float](#language.types.float) $thickness = 1,
    [float](#language.types.float) $miterLimit = 10
)

    /* Métodos */
    public [getCap](#ui-draw-stroke.getcap)(): [int](#language.types.integer)

public [getJoin](#ui-draw-stroke.getjoin)(): [int](#language.types.integer)
public [getMiterLimit](#ui-draw-stroke.getmiterlimit)(): [float](#language.types.float)
public [getThickness](#ui-draw-stroke.getthickness)(): [float](#language.types.float)
public [setCap](#ui-draw-stroke.setcap)([int](#language.types.integer) $cap)
public [setJoin](#ui-draw-stroke.setjoin)([int](#language.types.integer) $join)
public [setMiterLimit](#ui-draw-stroke.setmiterlimit)([float](#language.types.float) $limit)
public [setThickness](#ui-draw-stroke.setthickness)([float](#language.types.float) $thickness)

}

# UI\Draw\Stroke::\_\_construct

(UI 0.9.9)

UI\Draw\Stroke::\_\_construct — Construye un nuevo trazo

### Descripción

public **UI\Draw\Stroke::\_\_construct**(
    [int](#language.types.integer) $cap = UI\Draw\Line\Cap::Flat,
    [int](#language.types.integer) $join = UI\Draw\Line\Join::Miter,
    [float](#language.types.float) $thickness = 1,
    [float](#language.types.float) $miterLimit = 10
)

Construirá un nuevo trazo

### Parámetros

    cap


      UI\Draw\Line\Cap::Flat, UI\Draw\Line\Cap::Round, o UI\Draw\Line\Cap::Square






    join


      UI\Draw\Line\Join::Miter, UI\Draw\Line\Join::Round, o UI\Draw\Line\Join::Bevel






    thickness


      El grosor del trazo






    miterLimit


      Límite de inglete (el valor por defecto es válido para todas las plataformas)


# UI\Draw\Stroke::getCap

(UI 0.9.9)

UI\Draw\Stroke::getCap — Devuelve el tipo de terminación de línea

### Descripción

public **UI\Draw\Stroke::getCap**(): [int](#language.types.integer)

Devuelve el tipo de terminación de este trazo

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

UI\Draw\Line\Cap::Flat, UI\Draw\Line\Cap::Round, o UI\Draw\Line\Cap::Square

# UI\Draw\Stroke::getJoin

(UI 0.9.9)

UI\Draw\Stroke::getJoin — Obtiene la unión de línea

### Descripción

public **UI\Draw\Stroke::getJoin**(): [int](#language.types.integer)

Recuperaremos el ajuste de la línea de unión de este trazo

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

UI\Draw\Line\Join::Miter, UI\Draw\Line\Join::Round, o UI\Draw\Line\Join::Bevel

# UI\Draw\Stroke::getMiterLimit

(UI 0.9.9)

UI\Draw\Stroke::getMiterLimit — Obtiene el límite de inglete

### Descripción

public **UI\Draw\Stroke::getMiterLimit**(): [float](#language.types.float)

Recuperará el límite de ingletes de este trazo

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El actual límite de ingletes

# UI\Draw\Stroke::getThickness

(UI 0.9.9)

UI\Draw\Stroke::getThickness — Obtiene el grosor

### Descripción

public **UI\Draw\Stroke::getThickness**(): [float](#language.types.float)

Recuperará el grosor de este trazo

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El grosor actual

# UI\Draw\Stroke::setCap

(UI 0.9.9)

UI\Draw\Stroke::setCap — Define la terminación de la línea

### Descripción

public **UI\Draw\Stroke::setCap**([int](#language.types.integer) $cap)

Define el final de esta línea

### Parámetros

    cap


      UI\Draw\Line\Cap::Flat, UI\Draw\Line\Cap::Round, o UI\Draw\Line\Cap::Square


# UI\Draw\Stroke::setJoin

(UI 0.9.9)

UI\Draw\Stroke::setJoin — Establece la línea de unión

### Descripción

public **UI\Draw\Stroke::setJoin**([int](#language.types.integer) $join)

Establecerá la línea de unión para este trazo

### Parámetros

    join


      UI\Draw\Line\Join::Miter, UI\Draw\Line\Join::Round, o UI\Draw\Line\Join::Bevel


### Valores devueltos

# UI\Draw\Stroke::setMiterLimit

(UI 0.9.9)

UI\Draw\Stroke::setMiterLimit — Establece el límite de ingletes

### Descripción

public **UI\Draw\Stroke::setMiterLimit**([float](#language.types.float) $limit)

Establece el límite de ingletes para este trazo

### Parámetros

    limit


      El nuevo límite


# UI\Draw\Stroke::setThickness

(UI 0.9.9)

UI\Draw\Stroke::setThickness — Establece el grosor

### Descripción

public **UI\Draw\Stroke::setThickness**([float](#language.types.float) $thickness)

Establecerá el grosor de este trazo

### Parámetros

    thickness


      El nuevo grosor


## Tabla de contenidos

- [UI\Draw\Stroke::\_\_construct](#ui-draw-stroke.construct) — Construye un nuevo trazo
- [UI\Draw\Stroke::getCap](#ui-draw-stroke.getcap) — Devuelve el tipo de terminación de línea
- [UI\Draw\Stroke::getJoin](#ui-draw-stroke.getjoin) — Obtiene la unión de línea
- [UI\Draw\Stroke::getMiterLimit](#ui-draw-stroke.getmiterlimit) — Obtiene el límite de inglete
- [UI\Draw\Stroke::getThickness](#ui-draw-stroke.getthickness) — Obtiene el grosor
- [UI\Draw\Stroke::setCap](#ui-draw-stroke.setcap) — Define la terminación de la línea
- [UI\Draw\Stroke::setJoin](#ui-draw-stroke.setjoin) — Establece la línea de unión
- [UI\Draw\Stroke::setMiterLimit](#ui-draw-stroke.setmiterlimit) — Establece el límite de ingletes
- [UI\Draw\Stroke::setThickness](#ui-draw-stroke.setthickness) — Establece el grosor

# Pinceles

(UI 0.9.9)

## Introducción

    Representa un pincel de color sólido

## Sinopsis de la Clase

    ****




      class **UI\Draw\Brush**

     {


    /* Constructor */

public [\_\_construct](#ui-draw-brush.construct)([UI\Draw\Color](#class.ui-draw-color) $color)
public [\_\_construct](#ui-draw-brush.construct)([int](#language.types.integer) $color)

    /* Métodos */
    public [getColor](#ui-draw-brush.getcolor)(): [UI\Draw\Color](#class.ui-draw-color)

public [setColor](#ui-draw-brush.setcolor)([UI\Draw\Color](#class.ui-draw-color) $color): [void](language.types.void.html)
public [setColor](#ui-draw-brush.setcolor)([int](#language.types.integer) $color): [void](language.types.void.html)

    }

# UI\Draw\Brush::\_\_construct

(UI 0.9.9)

UI\Draw\Brush::\_\_construct — Crea un nuevo pincel

### Descripción

public **UI\Draw\Brush::\_\_construct**([UI\Draw\Color](#class.ui-draw-color) $color)

public **UI\Draw\Brush::\_\_construct**([int](#language.types.integer) $color)

Construye un pincel sólido utilizando el color dado

### Parámetros

    color


      Puede ser un objeto UI\Draw\Color o un entero RRGGBBAA


# UI\Draw\Brush::getColor

(UI 0.9.9)

UI\Draw\Brush::getColor — Devuelve el color

### Descripción

public **UI\Draw\Brush::getColor**(): [UI\Draw\Color](#class.ui-draw-color)

Devuelve un objeto UI\Draw\Color para este pincel

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El color actual del pincel

# UI\Draw\Brush::setColor

(UI 0.9.9)

UI\Draw\Brush::setColor — Define el color

### Descripción

public **UI\Draw\Brush::setColor**([UI\Draw\Color](#class.ui-draw-color) $color): [void](language.types.void.html)

public **UI\Draw\Brush::setColor**([int](#language.types.integer) $color): [void](language.types.void.html)

Establece el color de este pincel al color suministrado

### Parámetros

    color


      Puede ser un objeto UI\Draw\Color o un entero RRGGBBAA


### Valores devueltos

## Tabla de contenidos

- [UI\Draw\Brush::\_\_construct](#ui-draw-brush.construct) — Crea un nuevo pincel
- [UI\Draw\Brush::getColor](#ui-draw-brush.getcolor) — Devuelve el color
- [UI\Draw\Brush::setColor](#ui-draw-brush.setcolor) — Define el color

# Pinceles de degradado

(UI 2.0.0)

## Introducción

     Abstracción para pinceles de degradado

## Sinopsis de la Clase

    ****




      abstract
      class **UI\Draw\Brush\Gradient**



      extends
       [UI\Draw\Brush](#class.ui-draw-brush)

     {


    /* Métodos */

public [addStop](#ui-draw-brush-gradient.addstop)([float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [int](#language.types.integer)
public [addStop](#ui-draw-brush-gradient.addstop)([float](#language.types.float) $position, [int](#language.types.integer) $color): [int](#language.types.integer)
public [delStop](#ui-draw-brush-gradient.delstop)([int](#language.types.integer) $index): [int](#language.types.integer)
public [setStop](#ui-draw-brush-gradient.setstop)([int](#language.types.integer) $index, [float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [bool](#language.types.boolean)
public [setStop](#ui-draw-brush-gradient.setstop)([int](#language.types.integer) $index, [float](#language.types.float) $position, [int](#language.types.integer) $color): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [UI\Draw\Brush::getColor](#ui-draw-brush.getcolor)(): [UI\Draw\Color](#class.ui-draw-color)

public [UI\Draw\Brush::setColor](#ui-draw-brush.setcolor)([UI\Draw\Color](#class.ui-draw-color) $color): [void](language.types.void.html)
public [UI\Draw\Brush::setColor](#ui-draw-brush.setcolor)([int](#language.types.integer) $color): [void](language.types.void.html)

}

# UI\Draw\Brush\Gradient::addStop

(UI 2.0.0)

UI\Draw\Brush\Gradient::addStop — Dejar de manipular

### Descripción

public **UI\Draw\Brush\Gradient::addStop**([float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [int](#language.types.integer)

public **UI\Draw\Brush\Gradient::addStop**([float](#language.types.float) $position, [int](#language.types.integer) $color): [int](#language.types.integer)

Añade un tope en la posición dada con el color dado

### Parámetros

    position


      La posición para la nueva parada






    color


      El color para la nueva parada puede ser un objeto UI\Draw\Color o un entero RRGGBBAA.


### Valores devueltos

Número total de paradas

# UI\Draw\Brush\Gradient::delStop

(UI 2.0.0)

UI\Draw\Brush\Gradient::delStop — Dejar de manipular

### Descripción

public **UI\Draw\Brush\Gradient::delStop**([int](#language.types.integer) $index): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    index





### Valores devueltos

Número total de paradas

# UI\Draw\Brush\Gradient::setStop

(UI 2.0.0)

UI\Draw\Brush\Gradient::setStop — Dejar de manipular

### Descripción

public **UI\Draw\Brush\Gradient::setStop**([int](#language.types.integer) $index, [float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [bool](#language.types.boolean)

public **UI\Draw\Brush\Gradient::setStop**([int](#language.types.integer) $index, [float](#language.types.float) $position, [int](#language.types.integer) $color): [bool](#language.types.boolean)

### Parámetros

    index


      El índice de la parada que debe definirse






    position


      Posición de parada






    color


      El color del tope puede ser un objeto UI\Draw\Color o un entero RRGGBBAA.


### Valores devueltos

Indicación de éxito

## Tabla de contenidos

- [UI\Draw\Brush\Gradient::addStop](#ui-draw-brush-gradient.addstop) — Dejar de manipular
- [UI\Draw\Brush\Gradient::delStop](#ui-draw-brush-gradient.delstop) — Dejar de manipular
- [UI\Draw\Brush\Gradient::setStop](#ui-draw-brush-gradient.setstop) — Dejar de manipular

# Gradiente lineal

(UI 2.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **UI\Draw\Brush\LinearGradient**



      extends
       [UI\Draw\Brush\Gradient](#class.ui-draw-brush-gradient)

     {


    /* Constructor */

public [\_\_construct](#ui-draw-brush-lineargradient.construct)([UI\Point](#class.ui-point) $start, [UI\Point](#class.ui-point) $end)

    /* Métodos heredados */
    public [UI\Draw\Brush\Gradient::addStop](#ui-draw-brush-gradient.addstop)([float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [int](#language.types.integer)

public [UI\Draw\Brush\Gradient::addStop](#ui-draw-brush-gradient.addstop)([float](#language.types.float) $position, [int](#language.types.integer) $color): [int](#language.types.integer)
public [UI\Draw\Brush\Gradient::delStop](#ui-draw-brush-gradient.delstop)([int](#language.types.integer) $index): [int](#language.types.integer)
public [UI\Draw\Brush\Gradient::setStop](#ui-draw-brush-gradient.setstop)([int](#language.types.integer) $index, [float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [bool](#language.types.boolean)
public [UI\Draw\Brush\Gradient::setStop](#ui-draw-brush-gradient.setstop)([int](#language.types.integer) $index, [float](#language.types.float) $position, [int](#language.types.integer) $color): [bool](#language.types.boolean)

}

# UI\Draw\Brush\LinearGradient::\_\_construct

(UI 2.0.0)

UI\Draw\Brush\LinearGradient::\_\_construct — Construye un gradiente lineal

### Descripción

public **UI\Draw\Brush\LinearGradient::\_\_construct**([UI\Point](#class.ui-point) $start, [UI\Point](#class.ui-point) $end)

Construye un nuevo gradiente lineal (linear gradient)

### Parámetros

    start









    end





## Tabla de contenidos

- [UI\Draw\Brush\LinearGradient::\_\_construct](#ui-draw-brush-lineargradient.construct) — Construye un gradiente lineal

# Gradiente radial

(UI 2.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **UI\Draw\Brush\RadialGradient**



      extends
       [UI\Draw\Brush\Gradient](#class.ui-draw-brush-gradient)

     {


    /* Constructor */

public [\_\_construct](#ui-draw-brush-radialgradient.construct)([UI\Point](#class.ui-point) $start, [UI\Point](#class.ui-point) $outer, [float](#language.types.float) $radius)

    /* Métodos heredados */
    public [UI\Draw\Brush\Gradient::addStop](#ui-draw-brush-gradient.addstop)([float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [int](#language.types.integer)

public [UI\Draw\Brush\Gradient::addStop](#ui-draw-brush-gradient.addstop)([float](#language.types.float) $position, [int](#language.types.integer) $color): [int](#language.types.integer)
public [UI\Draw\Brush\Gradient::delStop](#ui-draw-brush-gradient.delstop)([int](#language.types.integer) $index): [int](#language.types.integer)
public [UI\Draw\Brush\Gradient::setStop](#ui-draw-brush-gradient.setstop)([int](#language.types.integer) $index, [float](#language.types.float) $position, [UI\Draw\Color](#class.ui-draw-color) $color): [bool](#language.types.boolean)
public [UI\Draw\Brush\Gradient::setStop](#ui-draw-brush-gradient.setstop)([int](#language.types.integer) $index, [float](#language.types.float) $position, [int](#language.types.integer) $color): [bool](#language.types.boolean)

}

# UI\Draw\Brush\RadialGradient::\_\_construct

(UI 2.0.0)

UI\Draw\Brush\RadialGradient::\_\_construct — Construye un gradiente radial

### Descripción

public **UI\Draw\Brush\RadialGradient::\_\_construct**([UI\Point](#class.ui-point) $start, [UI\Point](#class.ui-point) $outer, [float](#language.types.float) $radius)

Crea un nuevo degradado radial (radial gradient)

### Parámetros

    start









    outer









    radius





## Tabla de contenidos

- [UI\Draw\Brush\RadialGradient::\_\_construct](#ui-draw-brush-radialgradient.construct) — Construye un gradiente radial

# Representa el diseño del texto

(UI 0.9.9)

## Introducción

    Un diseño de texto representa el diseño del texto que dibujará el lápiz.

## Sinopsis de la Clase

    ****




      class **UI\Draw\Text\Layout**

     {


    /* Constructor */

public [\_\_construct](#ui-draw-text-layout.construct)([string](#language.types.string) $text, [UI\Draw\Text\Font](#class.ui-draw-text-font) $font, [float](#language.types.float) $width)

    /* Métodos */
    public [setColor](#ui-draw-text-layout.setcolor)([UI\Draw\Color](#class.ui-draw-color) $color, [int](#language.types.integer) $start = 0, [int](#language.types.integer) $end = ?)

public [setColor](#ui-draw-text-layout.setcolor)([int](#language.types.integer) $color, [int](#language.types.integer) $start = 0, [int](#language.types.integer) $end = ?)
public [setWidth](#ui-draw-text-layout.setwidth)([float](#language.types.float) $width)

}

# UI\Draw\Text\Layout::\_\_construct

(UI 0.9.9)

UI\Draw\Text\Layout::\_\_construct — Construir un nuevo diseño de texto

### Descripción

public **UI\Draw\Text\Layout::\_\_construct**([string](#language.types.string) $text, [UI\Draw\Text\Font](#class.ui-draw-text-font) $font, [float](#language.types.float) $width)

Construirá un nuevo diseño de texto

### Parámetros

    text


      El texto para el diseño






    font


      El tipo de letra a utilizar para escribir






    width


      El ancho del diseño


# UI\Draw\Text\Layout::setColor

(UI 0.9.9)

UI\Draw\Text\Layout::setColor — Establece el color

### Descripción

public **UI\Draw\Text\Layout::setColor**([UI\Draw\Color](#class.ui-draw-color) $color, [int](#language.types.integer) $start = 0, [int](#language.types.integer) $end = ?)

public **UI\Draw\Text\Layout::setColor**([int](#language.types.integer) $color, [int](#language.types.integer) $start = 0, [int](#language.types.integer) $end = ?)

Establecerá el color para todo o un rango del texto en el diseño

### Parámetros

    color


      El color a usar






    start


      El carácter inicial






    end


      El carácter final, por defecto el final del string


# UI\Draw\Text\Layout::setWidth

(UI 0.9.9)

UI\Draw\Text\Layout::setWidth — Establece el ancho

### Descripción

public **UI\Draw\Text\Layout::setWidth**([float](#language.types.float) $width)

Establecerá el ancho del diseño del texto

### Parámetros

    width


      El nuevo ancho


## Tabla de contenidos

- [UI\Draw\Text\Layout::\_\_construct](#ui-draw-text-layout.construct) — Construir un nuevo diseño de texto
- [UI\Draw\Text\Layout::setColor](#ui-draw-text-layout.setcolor) — Establece el color
- [UI\Draw\Text\Layout::setWidth](#ui-draw-text-layout.setwidth) — Establece el ancho

# Representa una fuente

(UI 0.9.9)

## Introducción

    Carga una fuente descrita

## Sinopsis de la Clase

    ****




      class **UI\Draw\Text\Font**

     {


    /* Constructor */

public [\_\_construct](#ui-draw-text-font.construct)([UI\Draw\Text\Font\Descriptor](#class.ui-draw-text-font-descriptor) $descriptor)

    /* Métodos */
    public [getAscent](#ui-draw-text-font.getascent)(): [float](#language.types.float)

public [getDescent](#ui-draw-text-font.getdescent)(): [float](#language.types.float)
public [getLeading](#ui-draw-text-font.getleading)(): [float](#language.types.float)
public [getUnderlinePosition](#ui-draw-text-font.getunderlineposition)(): [float](#language.types.float)
public [getUnderlineThickness](#ui-draw-text-font.getunderlinethickness)(): [float](#language.types.float)

}

# UI\Draw\Text\Font::\_\_construct

(UI 0.9.9)

UI\Draw\Text\Font::\_\_construct — Construye una nueva fuente

### Descripción

public **UI\Draw\Text\Font::\_\_construct**([UI\Draw\Text\Font\Descriptor](#class.ui-draw-text-font-descriptor) $descriptor)

Construirá una nueva fuente usando el descriptor dado

### Parámetros

    descriptor


      El descriptor de la fuente


# UI\Draw\Text\Font::getAscent

(UI 1.0.3)

UI\Draw\Text\Font::getAscent — Métricas de la fuente

### Descripción

public **UI\Draw\Text\Font::getAscent**(): [float](#language.types.float)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font::getDescent

(UI 1.0.3)

UI\Draw\Text\Font::getDescent — Métricas de la fuente

### Descripción

public **UI\Draw\Text\Font::getDescent**(): [float](#language.types.float)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font::getLeading

(UI 1.0.3)

UI\Draw\Text\Font::getLeading — Métricas de la fuente

### Descripción

public **UI\Draw\Text\Font::getLeading**(): [float](#language.types.float)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font::getUnderlinePosition

(UI 1.0.3)

UI\Draw\Text\Font::getUnderlinePosition — Métricas de la fuente

### Descripción

public **UI\Draw\Text\Font::getUnderlinePosition**(): [float](#language.types.float)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font::getUnderlineThickness

(UI 1.0.3)

UI\Draw\Text\Font::getUnderlineThickness — Métricas de la fuente

### Descripción

public **UI\Draw\Text\Font::getUnderlineThickness**(): [float](#language.types.float)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [UI\Draw\Text\Font::\_\_construct](#ui-draw-text-font.construct) — Construye una nueva fuente
- [UI\Draw\Text\Font::getAscent](#ui-draw-text-font.getascent) — Métricas de la fuente
- [UI\Draw\Text\Font::getDescent](#ui-draw-text-font.getdescent) — Métricas de la fuente
- [UI\Draw\Text\Font::getLeading](#ui-draw-text-font.getleading) — Métricas de la fuente
- [UI\Draw\Text\Font::getUnderlinePosition](#ui-draw-text-font.getunderlineposition) — Métricas de la fuente
- [UI\Draw\Text\Font::getUnderlineThickness](#ui-draw-text-font.getunderlinethickness) — Métricas de la fuente

# Descriptor de fuente

(UI 0.9.9)

## Introducción

    Describe un tipo de letra

## Sinopsis de la Clase

    ****




      class **UI\Draw\Text\Font\Descriptor**

     {


    /* Constructor */

public [\_\_construct](#ui-draw-text-font-descriptor.construct)(
    [string](#language.types.string) $family,
    [float](#language.types.float) $size,
    [int](#language.types.integer) $weight = UI\Draw\Text\Font\Weight::Normal,
    [int](#language.types.integer) $italic = UI\Draw\Text\Font\Italic::Normal,
    [int](#language.types.integer) $stretch = UI\Draw\Text\Font\Stretch::Normal
)

    /* Métodos */
    public [getFamily](#ui-draw-text-font-descriptor.getfamily)(): [string](#language.types.string)

public [getItalic](#ui-draw-text-font-descriptor.getitalic)(): [int](#language.types.integer)
public [getSize](#ui-draw-text-font-descriptor.getsize)(): [float](#language.types.float)
public [getStretch](#ui-draw-text-font-descriptor.getstretch)(): [int](#language.types.integer)
public [getWeight](#ui-draw-text-font-descriptor.getweight)(): [int](#language.types.integer)

}

# UI\Draw\Text\Font\Descriptor::\_\_construct

(UI 0.9.9)

UI\Draw\Text\Font\Descriptor::\_\_construct — Crea un nuevo descriptor de fuente

### Descripción

public **UI\Draw\Text\Font\Descriptor::\_\_construct**(
    [string](#language.types.string) $family,
    [float](#language.types.float) $size,
    [int](#language.types.integer) $weight = UI\Draw\Text\Font\Weight::Normal,
    [int](#language.types.integer) $italic = UI\Draw\Text\Font\Italic::Normal,
    [int](#language.types.integer) $stretch = UI\Draw\Text\Font\Stretch::Normal
)

Crea un nuevo descriptor de fuente

### Parámetros

    family


      El nombre de una familia de fuentes válida






    size


      Tamaño preferido






    weight


      Una constante de UI\Draw\Text\Font\Weight






    italic


      Una constante de UI\Draw\Text\Font\Italic






    stretch


      Una constante de UI\Draw\Text\Font\Stretch


# UI\Draw\Text\Font\Descriptor::getFamily

(UI 1.0.3)

UI\Draw\Text\Font\Descriptor::getFamily — Devuelve la familia tipográfica

### Descripción

public **UI\Draw\Text\Font\Descriptor::getFamily**(): [string](#language.types.string)

Devuelve la familia tipográfica solicitado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font\Descriptor::getItalic

(UI 1.0.3)

UI\Draw\Text\Font\Descriptor::getItalic — Detección de estilos

### Descripción

public **UI\Draw\Text\Font\Descriptor::getItalic**(): [int](#language.types.integer)

Devuelve la constante del parámetro

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font\Descriptor::getSize

(UI 1.0.3)

UI\Draw\Text\Font\Descriptor::getSize — Detección de tamaño

### Descripción

public **UI\Draw\Text\Font\Descriptor::getSize**(): [float](#language.types.float)

Devuelve el tamaño solicitado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font\Descriptor::getStretch

(UI 1.0.3)

UI\Draw\Text\Font\Descriptor::getStretch — Detección de estilos

### Descripción

public **UI\Draw\Text\Font\Descriptor::getStretch**(): [int](#language.types.integer)

Devuelve la escalabilidad solicitada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\Draw\Text\Font\Descriptor::getWeight

(UI 1.0.3)

UI\Draw\Text\Font\Descriptor::getWeight — Detección de espesor

### Descripción

public **UI\Draw\Text\Font\Descriptor::getWeight**(): [int](#language.types.integer)

Devuelve el grosor solicitado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [UI\Draw\Text\Font\Descriptor::\_\_construct](#ui-draw-text-font-descriptor.construct) — Crea un nuevo descriptor de fuente
- [UI\Draw\Text\Font\Descriptor::getFamily](#ui-draw-text-font-descriptor.getfamily) — Devuelve la familia tipográfica
- [UI\Draw\Text\Font\Descriptor::getItalic](#ui-draw-text-font-descriptor.getitalic) — Detección de estilos
- [UI\Draw\Text\Font\Descriptor::getSize](#ui-draw-text-font-descriptor.getsize) — Detección de tamaño
- [UI\Draw\Text\Font\Descriptor::getStretch](#ui-draw-text-font-descriptor.getstretch) — Detección de estilos
- [UI\Draw\Text\Font\Descriptor::getWeight](#ui-draw-text-font-descriptor.getweight) — Detección de espesor

# UI Funciones

# UI\Draw\Text\Font\fontFamilies

(UI 0.9.9)

UI\Draw\Text\Font\fontFamilies — Obtiene las familias de fuentes

### Descripción

**UI\Draw\Text\Font\fontFamilies**(): [array](#language.types.array)

Devuelve un array de las familias de fuentes válidas para el sistema actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) de las familias de fuentes válidas para el sistema actual.

# UI\quit

(UI 2.0.0)

UI\quit — Sale de la boucle UI

### Descripción

**UI\quit**(): [void](language.types.void.html)

Debe hacer que la boucle principal se detenga

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# UI\run

(UI 2.0.0)

UI\run — Entra en la boucle UI

### Descripción

**UI\run**([int](#language.types.integer) $flags = ?): [void](language.types.void.html)

Debe hacer que PHP entre en la boucle principal. Por omisión, el control no será devuelto a la función llamadora.

### Parámetros

    flags


      Poner UI\Loop para devolver el control y UI\Wait para devolver el control después de la espera.


### Valores devueltos

## Tabla de contenidos

- [UI\Draw\Text\Font\fontFamilies](#function.ui-draw-text-font-fontfamilies) — Obtiene las familias de fuentes
- [UI\quit](#function.ui-quit) — Sale de la boucle UI
- [UI\run](#function.ui-run) — Entra en la boucle UI

# Configuración del grosor de la fuente

(UI 0.9.9)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **UI\Draw\Text\Font\Weight**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Thin](#ui-draw-text-font-weight.constants.thin);

    const
     [int](#language.types.integer)
      [UltraLight](#ui-draw-text-font-weight.constants.ultralight);

    const
     [int](#language.types.integer)
      [Light](#ui-draw-text-font-weight.constants.light);

    const
     [int](#language.types.integer)
      [Book](#ui-draw-text-font-weight.constants.book);

    const
     [int](#language.types.integer)
      [Normal](#ui-draw-text-font-weight.constants.normal);

    const
     [int](#language.types.integer)
      [Medium](#ui-draw-text-font-weight.constants.medium);

    const
     [int](#language.types.integer)
      [SemiBold](#ui-draw-text-font-weight.constants.semibold);

    const
     [int](#language.types.integer)
      [Bold](#ui-draw-text-font-weight.constants.bold);

    const
     [int](#language.types.integer)
      [UltraBold](#ui-draw-text-font-weight.constants.ultrabold);

    const
     [int](#language.types.integer)
      [Heavy](#ui-draw-text-font-weight.constants.heavy);

    const
     [int](#language.types.integer)
      [UltraHeavy](#ui-draw-text-font-weight.constants.ultraheavy);

}

## Constantes predefinidas

     **[UI\Draw\Text\Font\Weight::Thin](#ui-draw-text-font-weight.constants.thin)**





     **[UI\Draw\Text\Font\Weight::UltraLight](#ui-draw-text-font-weight.constants.ultralight)**





     **[UI\Draw\Text\Font\Weight::Light](#ui-draw-text-font-weight.constants.light)**





     **[UI\Draw\Text\Font\Weight::Book](#ui-draw-text-font-weight.constants.book)**





     **[UI\Draw\Text\Font\Weight::Normal](#ui-draw-text-font-weight.constants.normal)**





     **[UI\Draw\Text\Font\Weight::Medium](#ui-draw-text-font-weight.constants.medium)**





     **[UI\Draw\Text\Font\Weight::SemiBold](#ui-draw-text-font-weight.constants.semibold)**





     **[UI\Draw\Text\Font\Weight::Bold](#ui-draw-text-font-weight.constants.bold)**





     **[UI\Draw\Text\Font\Weight::UltraBold](#ui-draw-text-font-weight.constants.ultrabold)**





     **[UI\Draw\Text\Font\Weight::Heavy](#ui-draw-text-font-weight.constants.heavy)**





     **[UI\Draw\Text\Font\Weight::UltraHeavy](#ui-draw-text-font-weight.constants.ultraheavy)**




# Configuración de la fuente cursiva

(UI 0.9.9)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **UI\Draw\Text\Font\Italic**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Normal](#ui-draw-text-font-italic.constants.normal) = 0;

    const
     [int](#language.types.integer)
      [Oblique](#ui-draw-text-font-italic.constants.oblique) = 1;

    const
     [int](#language.types.integer)
      [Italic](#ui-draw-text-font-italic.constants.italic) = 2;


    }

## Constantes predefinidas

     **[UI\Draw\Text\Font\Italic::Normal](#ui-draw-text-font-italic.constants.normal)**





     **[UI\Draw\Text\Font\Italic::Oblique](#ui-draw-text-font-italic.constants.oblique)**





     **[UI\Draw\Text\Font\Italic::Italic](#ui-draw-text-font-italic.constants.italic)**




# Ajustes de estiramiento de fuentes

(UI 0.9.9)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **UI\Draw\Text\Font\Stretch**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [UltraCondensed](#ui-draw-text-font-stretch.constants.ultracondensed) = 0;

    const
     [int](#language.types.integer)
      [ExtraCondensed](#ui-draw-text-font-stretch.constants.extracondensed) = 1;

    const
     [int](#language.types.integer)
      [Condensed](#ui-draw-text-font-stretch.constants.condensed) = 2;

    const
     [int](#language.types.integer)
      [SemiCondensed](#ui-draw-text-font-stretch.constants.semicondensed) = 3;

    const
     [int](#language.types.integer)
      [Normal](#ui-draw-text-font-stretch.constants.normal) = 4;

    const
     [int](#language.types.integer)
      [SemiExpanded](#ui-draw-text-font-stretch.constants.semiexpanded) = 5;

    const
     [int](#language.types.integer)
      [Expanded](#ui-draw-text-font-stretch.constants.expanded) = 6;

    const
     [int](#language.types.integer)
      [ExtraExpanded](#ui-draw-text-font-stretch.constants.extraexpanded) = 7;

    const
     [int](#language.types.integer)
      [UltraExpanded](#ui-draw-text-font-stretch.constants.ultraexpanded) = 8;

}

## Constantes predefinidas

     **[UI\Draw\Text\Font\Stretch::UltraCondensed](#ui-draw-text-font-stretch.constants.ultracondensed)**





     **[UI\Draw\Text\Font\Stretch::ExtraCondensed](#ui-draw-text-font-stretch.constants.extracondensed)**





     **[UI\Draw\Text\Font\Stretch::Condensed](#ui-draw-text-font-stretch.constants.condensed)**





     **[UI\Draw\Text\Font\Stretch::SemiCondensed](#ui-draw-text-font-stretch.constants.semicondensed)**





     **[UI\Draw\Text\Font\Stretch::Normal](#ui-draw-text-font-stretch.constants.normal)**





     **[UI\Draw\Text\Font\Stretch::SemiExpanded](#ui-draw-text-font-stretch.constants.semiexpanded)**





     **[UI\Draw\Text\Font\Stretch::Expanded](#ui-draw-text-font-stretch.constants.expanded)**





     **[UI\Draw\Text\Font\Stretch::ExtraExpanded](#ui-draw-text-font-stretch.constants.extraexpanded)**





     **[UI\Draw\Text\Font\Stretch::UltraExpanded](#ui-draw-text-font-stretch.constants.ultraexpanded)**




# Parámetros de terminación de línea

(UI 0.9.9)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **UI\Draw\Line\Cap**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Flat](#ui-draw-line-cap.constants.flat);

    const
     [int](#language.types.integer)
      [Round](#ui-draw-line-cap.constants.round);

    const
     [int](#language.types.integer)
      [Square](#ui-draw-line-cap.constants.square);

}

## Constantes predefinidas

     **[UI\Draw\Line\Cap::Flat](#ui-draw-line-cap.constants.flat)**





     **[UI\Draw\Line\Cap::Round](#ui-draw-line-cap.constants.round)**





     **[UI\Draw\Line\Cap::Square](#ui-draw-line-cap.constants.square)**




# Parámetros de unión de líneas

(UI 0.9.9)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **UI\Draw\Line\Join**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Miter](#ui-draw-line-join.constants.miter);

    const
     [int](#language.types.integer)
      [Round](#ui-draw-line-join.constants.round);

    const
     [int](#language.types.integer)
      [Bevel](#ui-draw-line-join.constants.bevel);

}

## Constantes predefinidas

     **[UI\Draw\Line\Join::Miter](#ui-draw-line-join.constants.miter)**





     **[UI\Draw\Line\Join::Round](#ui-draw-line-join.constants.round)**





     **[UI\Draw\Line\Join::Bevel](#ui-draw-line-join.constants.bevel)**




# Identificadores clave

(UI 1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **UI\Key**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [Escape](#ui-key.constants.escape);

    const
     [int](#language.types.integer)
      [Insert](#ui-key.constants.insert);

    const
     [int](#language.types.integer)
      [Delete](#ui-key.constants.delete);

    const
     [int](#language.types.integer)
      [Home](#ui-key.constants.home);

    const
     [int](#language.types.integer)
      [End](#ui-key.constants.end);

    const
     [int](#language.types.integer)
      [PageUp](#ui-key.constants.pageup);

    const
     [int](#language.types.integer)
      [PageDown](#ui-key.constants.pagedown);

    const
     [int](#language.types.integer)
      [Up](#ui-key.constants.up);

    const
     [int](#language.types.integer)
      [Down](#ui-key.constants.down);

    const
     [int](#language.types.integer)
      [Left](#ui-key.constants.left);

    const
     [int](#language.types.integer)
      [Right](#ui-key.constants.right);

    const
     [int](#language.types.integer)
      [F1](#ui-key.constants.f1);

    const
     [int](#language.types.integer)
      [F2](#ui-key.constants.f2);

    const
     [int](#language.types.integer)
      [F3](#ui-key.constants.f3);

    const
     [int](#language.types.integer)
      [F4](#ui-key.constants.f4);

    const
     [int](#language.types.integer)
      [F5](#ui-key.constants.f5);

    const
     [int](#language.types.integer)
      [F6](#ui-key.constants.f6);

    const
     [int](#language.types.integer)
      [F7](#ui-key.constants.f7);

    const
     [int](#language.types.integer)
      [F8](#ui-key.constants.f8);

    const
     [int](#language.types.integer)
      [F9](#ui-key.constants.f9);

    const
     [int](#language.types.integer)
      [F10](#ui-key.constants.f10);

    const
     [int](#language.types.integer)
      [F11](#ui-key.constants.f11);

    const
     [int](#language.types.integer)
      [F12](#ui-key.constants.f12);

    const
     [int](#language.types.integer)
      [N0](#ui-key.constants.n0);

    const
     [int](#language.types.integer)
      [N1](#ui-key.constants.n1);

    const
     [int](#language.types.integer)
      [N2](#ui-key.constants.n2);

    const
     [int](#language.types.integer)
      [N3](#ui-key.constants.n3);

    const
     [int](#language.types.integer)
      [N4](#ui-key.constants.n4);

    const
     [int](#language.types.integer)
      [N5](#ui-key.constants.n5);

    const
     [int](#language.types.integer)
      [N6](#ui-key.constants.n6);

    const
     [int](#language.types.integer)
      [N7](#ui-key.constants.n7);

    const
     [int](#language.types.integer)
      [N8](#ui-key.constants.n8);

    const
     [int](#language.types.integer)
      [N9](#ui-key.constants.n9);

    const
     [int](#language.types.integer)
      [NDot](#ui-key.constants.ndot);

    const
     [int](#language.types.integer)
      [NEnter](#ui-key.constants.nenter);

    const
     [int](#language.types.integer)
      [NAdd](#ui-key.constants.nadd);

    const
     [int](#language.types.integer)
      [NSubtract](#ui-key.constants.nsubtract);

    const
     [int](#language.types.integer)
      [NMultiply](#ui-key.constants.nmultiply);

    const
     [int](#language.types.integer)
      [NDivide](#ui-key.constants.ndivide);

}

## Constantes predefinidas

     **[UI\Key::Escape](#ui-key.constants.escape)**





     **[UI\Key::Insert](#ui-key.constants.insert)**





     **[UI\Key::Delete](#ui-key.constants.delete)**





     **[UI\Key::Home](#ui-key.constants.home)**





     **[UI\Key::End](#ui-key.constants.end)**





     **[UI\Key::PageUp](#ui-key.constants.pageup)**





     **[UI\Key::PageDown](#ui-key.constants.pagedown)**





     **[UI\Key::Up](#ui-key.constants.up)**





     **[UI\Key::Down](#ui-key.constants.down)**





     **[UI\Key::Left](#ui-key.constants.left)**





     **[UI\Key::Right](#ui-key.constants.right)**





     **[UI\Key::F1](#ui-key.constants.f1)**





     **[UI\Key::F2](#ui-key.constants.f2)**





     **[UI\Key::F3](#ui-key.constants.f3)**





     **[UI\Key::F4](#ui-key.constants.f4)**





     **[UI\Key::F5](#ui-key.constants.f5)**





     **[UI\Key::F6](#ui-key.constants.f6)**





     **[UI\Key::F7](#ui-key.constants.f7)**





     **[UI\Key::F8](#ui-key.constants.f8)**





     **[UI\Key::F9](#ui-key.constants.f9)**





     **[UI\Key::F10](#ui-key.constants.f10)**





     **[UI\Key::F11](#ui-key.constants.f11)**





     **[UI\Key::F12](#ui-key.constants.f12)**





     **[UI\Key::N0](#ui-key.constants.n0)**





     **[UI\Key::N1](#ui-key.constants.n1)**





     **[UI\Key::N2](#ui-key.constants.n2)**





     **[UI\Key::N3](#ui-key.constants.n3)**





     **[UI\Key::N4](#ui-key.constants.n4)**





     **[UI\Key::N5](#ui-key.constants.n5)**





     **[UI\Key::N6](#ui-key.constants.n6)**





     **[UI\Key::N7](#ui-key.constants.n7)**





     **[UI\Key::N8](#ui-key.constants.n8)**





     **[UI\Key::N9](#ui-key.constants.n9)**





     **[UI\Key::NDot](#ui-key.constants.ndot)**





     **[UI\Key::NEnter](#ui-key.constants.nenter)**





     **[UI\Key::NAdd](#ui-key.constants.nadd)**





     **[UI\Key::NSubtract](#ui-key.constants.nsubtract)**





     **[UI\Key::NMultiply](#ui-key.constants.nmultiply)**





     **[UI\Key::NDivide](#ui-key.constants.ndivide)**




# InvalidArgumentException

(UI 1.0.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **UI\Exception\InvalidArgumentException**



      extends
       [InvalidArgumentException](#class.invalidargumentexception)


     implements
       [Throwable](#class.throwable) {

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

# RuntimeException

(UI 1.0.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **UI\Exception\RuntimeException**



      extends
       [RuntimeException](#class.runtimeexception)


     implements
       [Throwable](#class.throwable) {

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

- [Introducción](#intro.ui)
- [Instalación/Configuración](#ui.setup)<li>[Requerimientos](#ui.requirements)
- [Instalación](#ui.installation)
  </li>- [UI\Point](#class.ui-point) — Representa una posición (x,y)<li>[UI\Point::at](#ui-point.at) — Tamaño de coerción
- [UI\Point::\_\_construct](#ui-point.construct) — Construye un nuevo punto
- [UI\Point::getX](#ui-point.getx) — Recupera X
- [UI\Point::getY](#ui-point.gety) — Recupera Y
- [UI\Point::setX](#ui-point.setx) — Establece X
- [UI\Point::setY](#ui-point.sety) — Establece Y
  </li>- [UI\Size](#class.ui-size) — Représente des dimensions (largeur, hauteur)<li>[UI\Size::__construct](#ui-size.construct) — Construye un nuevo tamaño
- [UI\Size::getHeight](#ui-size.getheight) — Recupera la altura
- [UI\Size::getWidth](#ui-size.getwidth) — Recupera el ancho
- [UI\Size::of](#ui-size.of) — Punto de coerción
- [UI\Size::setHeight](#ui-size.setheight) — Establece la altura
- [UI\Size::setWidth](#ui-size.setwidth) — Establece el ancho
  </li>- [UI\Window](#class.ui-window) — Ventana<li>[UI\Window::add](#ui-window.add) — Añade un control
- [UI\Window::\_\_construct](#ui-window.construct) — Construye una nueva ventana
- [UI\Window::error](#ui-window.error) — Mostrar cuadro de error
- [UI\Window::getSize](#ui-window.getsize) — Obtiene el tamaño de la ventana
- [UI\Window::getTitle](#ui-window.gettitle) — Obtiene el título
- [UI\Window::hasBorders](#ui-window.hasborders) — Detección del Borde
- [UI\Window::hasMargin](#ui-window.hasmargin) — Detección de Margen
- [UI\Window::isFullScreen](#ui-window.isfullscreen) — Detección de pantalla completa
- [UI\Window::msg](#ui-window.msg) — Mostrar Cuadro de Mensajes
- [UI\Window::onClosing](#ui-window.onclosing) — Cierre de la devolución de llamada
- [UI\Window::open](#ui-window.open) — Abrir Diálogo
- [UI\Window::save](#ui-window.save) — Guarda Diálogo
- [UI\Window::setBorders](#ui-window.setborders) — Uso de Bordes
- [UI\Window::setFullScreen](#ui-window.setfullscreen) — Uso de la pantalla completa
- [UI\Window::setMargin](#ui-window.setmargin) — Uso del Margen
- [UI\Window::setSize](#ui-window.setsize) — Establece Tamaño
- [UI\Window::setTitle](#ui-window.settitle) — Título de la Vetana
  </li>- [UI\Control](#class.ui-control) — Controlar<li>[UI\Control::destroy](#ui-control.destroy) — Destruye el control
- [UI\Control::disable](#ui-control.disable) — Desactiva el control
- [UI\Control::enable](#ui-control.enable) — Activa el control
- [UI\Control::getParent](#ui-control.getparent) — Devuelve el control padre
- [UI\Control::getTopLevel](#ui-control.gettoplevel) — Devuelve el nivel más alto
- [UI\Control::hide](#ui-control.hide) — Oculta el control
- [UI\Control::isEnabled](#ui-control.isenabled) — Devuelve si el control está activado
- [UI\Control::isVisible](#ui-control.isvisible) — Devuelve si el control es visible
- [UI\Control::setParent](#ui-control.setparent) — Establece el control padre
- [UI\Control::show](#ui-control.show) — Muestra el control
  </li>- [UI\Menu](#class.ui-menu) — Menú<li>[UI\Menu::append](#ui-menu.append) — Añade elemento de menú
- [UI\Menu::appendAbout](#ui-menu.appendabout) — Añade elemento de menú Acerca de
- [UI\Menu::appendCheck](#ui-menu.appendcheck) — Añade un elemento de menú comprobable
- [UI\Menu::appendPreferences](#ui-menu.appendpreferences) — Añade elemento de menú de preferencias
- [UI\Menu::appendQuit](#ui-menu.appendquit) — Añade elemento de menú salir
- [UI\Menu::appendSeparator](#ui-menu.appendseparator) — Añade separador de elementos del menú
- [UI\Menu::\_\_construct](#ui-menu.construct) — Construye un nuevo menú
  </li>- [UI\MenuItem](#class.ui-menuitem) — Elemento del menú<li>[UI\MenuItem::disable](#ui-menuitem.disable) — Desactiva elemento del menú
- [UI\MenuItem::enable](#ui-menuitem.enable) — Activa elemento de menú
- [UI\MenuItem::isChecked](#ui-menuitem.ischecked) — Detecta Marcado
- [UI\MenuItem::onClick](#ui-menuitem.onclick) — Llamada de retorno On Click
- [UI\MenuItem::setChecked](#ui-menuitem.setchecked) — Establece marcado
  </li>- [UI\Area](#class.ui-area) — Area<li>[UI\Area::onDraw](#ui-area.ondraw) — Retrollamada de dibujo
- [UI\Area::onKey](#ui-area.onkey) — Retrollamada de tecla
- [UI\Area::onMouse](#ui-area.onmouse) — Retrollamada de ratón
- [UI\Area::redraw](#ui-area.redraw) — Redibuja el área
- [UI\Area::scrollTo](#ui-area.scrollto) — Desplazamiento del área
- [UI\Area::setSize](#ui-area.setsize) — Establece el tamaño
  </li>- [UI\Executor](#class.ui-executor) — Planificador de la ejecución<li>[UI\Executor::__construct](#ui-executor.construct) — Construye un nuevo ejecutor
- [UI\Executor::kill](#ui-executor.kill) — Detener el ejecutor
- [UI\Executor::onExecute](#ui-executor.onexecute) — Función de devolución de llamada
- [UI\Executor::setInterval](#ui-executor.setinterval) — Manipulación de intervalos
  </li>- [UI\Controls\Tab](#class.ui-controls-tab) — Cuadro de pestaña de control<li>[UI\Controls\Tab::append](#ui-controls-tab.append) — Añadir una página
- [UI\Controls\Tab::delete](#ui-controls-tab.delete) — Elimina una página
- [UI\Controls\Tab::hasMargin](#ui-controls-tab.hasmargin) — Detección de márgenes
- [UI\Controls\Tab::insertAt](#ui-controls-tab.insertat) — Inserta una página
- [UI\Controls\Tab::pages](#ui-controls-tab.pages) — Número de páginas
- [UI\Controls\Tab::setMargin](#ui-controls-tab.setmargin) — Define el margen
  </li>- [UI\Controls\Check](#class.ui-controls-check) — Casilla de control<li>[UI\Controls\Check::__construct](#ui-controls-check.construct) — Construye una nueva casilla de verificación
- [UI\Controls\Check::getText](#ui-controls-check.gettext) — Devuelve el texto
- [UI\Controls\Check::isChecked](#ui-controls-check.ischecked) — Detección de la casilla marcada
- [UI\Controls\Check::onToggle](#ui-controls-check.ontoggle) — Función de devolución de llamada de alternancia
- [UI\Controls\Check::setChecked](#ui-controls-check.setchecked) — Establece la casilla marcada
- [UI\Controls\Check::setText](#ui-controls-check.settext) — Establece el texto
  </li>- [UI\Controls\Button](#class.ui-controls-button) — Botón de control<li>[UI\Controls\Button::__construct](#ui-controls-button.construct) — Construye un nuevo botón
- [UI\Controls\Button::getText](#ui-controls-button.gettext) — Devuelve el texto
- [UI\Controls\Button::onClick](#ui-controls-button.onclick) — Gestor de clic
- [UI\Controls\Button::setText](#ui-controls-button.settext) — Establece el texto
  </li>- [UI\Controls\ColorButton](#class.ui-controls-colorbutton) — Botón de control de color<li>[UI\Controls\ColorButton::getColor](#ui-controls-colorbutton.getcolor) — Devuelve el color
- [UI\Controls\ColorButton::onChange](#ui-controls-colorbutton.onchange) — Gestor de cambio
- [UI\Controls\ColorButton::setColor](#ui-controls-colorbutton.setcolor) — Establece el color
  </li>- [UI\Controls\Label](#class.ui-controls-label) — Etiqueta de Control<li>[UI\Controls\Label::__construct](#ui-controls-label.construct) — Crea una nueva etiqueta
- [UI\Controls\Label::getText](#ui-controls-label.gettext) — Devuelve el texto
- [UI\Controls\Label::setText](#ui-controls-label.settext) — Define el texto
  </li>- [UI\Controls\Entry](#class.ui-controls-entry) — Entrada de control<li>[UI\Controls\Entry::__construct](#ui-controls-entry.construct) — Construye una nueva entrada
- [UI\Controls\Entry::getText](#ui-controls-entry.gettext) — Devuelve el texto
- [UI\Controls\Entry::isReadOnly](#ui-controls-entry.isreadonly) — Detecta si la entrada es de sólo lectura
- [UI\Controls\Entry::onChange](#ui-controls-entry.onchange) — Gestor de cambios
- [UI\Controls\Entry::setReadOnly](#ui-controls-entry.setreadonly) — Define si la entrada es de sólo lectura
- [UI\Controls\Entry::setText](#ui-controls-entry.settext) — Define el texto
  </li>- [UI\Controls\MultilineEntry](#class.ui-controls-multilineentry) — Entrada Multilínea de Control<li>[UI\Controls\MultilineEntry::append](#ui-controls-multilineentry.append) — Añadir un texto
- [UI\Controls\MultilineEntry::\_\_construct](#ui-controls-multilineentry.construct) — Crea una nueva entrada multilínea
- [UI\Controls\MultilineEntry::getText](#ui-controls-multilineentry.gettext) — Devuelve el texto
- [UI\Controls\MultilineEntry::isReadOnly](#ui-controls-multilineentry.isreadonly) — Devuelve si esta entrada multilínea es de sólo lectura
- [UI\Controls\MultilineEntry::onChange](#ui-controls-multilineentry.onchange) — Gestor de cambios
- [UI\Controls\MultilineEntry::setReadOnly](#ui-controls-multilineentry.setreadonly) — Define si esta entrada multilínea es de sólo lectura
- [UI\Controls\MultilineEntry::setText](#ui-controls-multilineentry.settext) — Define el texto
  </li>- [UI\Controls\Spin](#class.ui-controls-spin) — Caja de rotación de control<li>[UI\Controls\Spin::__construct](#ui-controls-spin.construct) — Construye una nueva caja de rotación
- [UI\Controls\Spin::getValue](#ui-controls-spin.getvalue) — Devuelve el valor
- [UI\Controls\Spin::onChange](#ui-controls-spin.onchange) — Gestor de cambios
- [UI\Controls\Spin::setValue](#ui-controls-spin.setvalue) — Define el valor
  </li>- [UI\Controls\Slider](#class.ui-controls-slider) — Control de Deslizamiento<li>[UI\Controls\Slider::__construct](#ui-controls-slider.construct) — Construye una nueva diapositiva
- [UI\Controls\Slider::getValue](#ui-controls-slider.getvalue) — Devuelve el valor
- [UI\Controls\Slider::onChange](#ui-controls-slider.onchange) — Gestor de cambios
- [UI\Controls\Slider::setValue](#ui-controls-slider.setvalue) — Define el valor
  </li>- [UI\Controls\Progress](#class.ui-controls-progress) — Control de Progreso<li>[UI\Controls\Progress::getValue](#ui-controls-progress.getvalue) — Devuelve el valor
- [UI\Controls\Progress::setValue](#ui-controls-progress.setvalue) — Define el valor
  </li>- [UI\Controls\Separator](#class.ui-controls-separator) — Separador de Control<li>[UI\Controls\Separator::__construct](#ui-controls-separator.construct) — Construye un nuevo separador
  </li>- [UI\Controls\Combo](#class.ui-controls-combo) — Caja de combinación de Control<li>[UI\Controls\Combo::append](#ui-controls-combo.append) — Añade una opción
- [UI\Controls\Combo::getSelected](#ui-controls-combo.getselected) — Devuelve la opción seleccionada
- [UI\Controls\Combo::onSelected](#ui-controls-combo.onselected) — Gestor de selección
- [UI\Controls\Combo::setSelected](#ui-controls-combo.setselected) — Establece la opción seleccionada
  </li>- [UI\Controls\EditableCombo](#class.ui-controls-editablecombo) — Cuadro combinado de control editable<li>[UI\Controls\EditableCombo::append](#ui-controls-editablecombo.append) — Añade una opción
- [UI\Controls\EditableCombo::getText](#ui-controls-editablecombo.gettext) — Devuelve el texto
- [UI\Controls\EditableCombo::onChange](#ui-controls-editablecombo.onchange) — Gestor de cambios
- [UI\Controls\EditableCombo::setText](#ui-controls-editablecombo.settext) — Define el texto
  </li>- [UI\Controls\Radio](#class.ui-controls-radio) — Radio de Control<li>[UI\Controls\Radio::append](#ui-controls-radio.append) — Añade una opción
- [UI\Controls\Radio::getSelected](#ui-controls-radio.getselected) — Devuelve la opción seleccionada
- [UI\Controls\Radio::onSelected](#ui-controls-radio.onselected) — Gestor de selección
- [UI\Controls\Radio::setSelected](#ui-controls-radio.setselected) — Establece la opción seleccionada
  </li>- [UI\Controls\Picker](#class.ui-controls-picker) — Selector de Control<li>[UI\Controls\Picker::__construct](#ui-controls-picker.construct) — Crea un nuevo selector
  </li>- [UI\Controls\Form](#class.ui-controls-form) — Formulario de Control (Disposición)<li>[UI\Controls\Form::append](#ui-controls-form.append) — Añade un control
- [UI\Controls\Form::delete](#ui-controls-form.delete) — Suprime un control
- [UI\Controls\Form::isPadded](#ui-controls-form.ispadded) — Detección de relleno
- [UI\Controls\Form::setPadded](#ui-controls-form.setpadded) — Define el relleno
  </li>- [UI\Controls\Grid](#class.ui-controls-grid) — Cuadrícula de Control (Disposición)<li>[UI\Controls\Grid::append](#ui-controls-grid.append) — Añade un control
- [UI\Controls\Grid::isPadded](#ui-controls-grid.ispadded) — Detección de relleno
- [UI\Controls\Grid::setPadded](#ui-controls-grid.setpadded) — Define el relleno
  </li>- [UI\Controls\Group](#class.ui-controls-group) — Grupo de Control (Disposición)<li>[UI\Controls\Group::append](#ui-controls-group.append) — Añade un control
- [UI\Controls\Group::\_\_construct](#ui-controls-group.construct) — Crea un nuevo grupo
- [UI\Controls\Group::getTitle](#ui-controls-group.gettitle) — Devuelve el título
- [UI\Controls\Group::hasMargin](#ui-controls-group.hasmargin) — Detección de márgenes
- [UI\Controls\Group::setMargin](#ui-controls-group.setmargin) — Define el margen
- [UI\Controls\Group::setTitle](#ui-controls-group.settitle) — Define el título
  </li>- [UI\Controls\Box](#class.ui-controls-box) — Caja de control (Disposición)<li>[UI\Controls\Box::append](#ui-controls-box.append) — Añade un control
- [UI\Controls\Box::\_\_construct](#ui-controls-box.construct) — Construye una nueva caja
- [UI\Controls\Box::delete](#ui-controls-box.delete) — Elimina un control
- [UI\Controls\Box::getOrientation](#ui-controls-box.getorientation) — Devuelve la orientación
- [UI\Controls\Box::isPadded](#ui-controls-box.ispadded) — Detección del relleno
- [UI\Controls\Box::setPadded](#ui-controls-box.setpadded) — Establece el relleno
  </li>- [UI\Draw\Pen](#class.ui-draw-pen) — Lápiz de dibujo<li>[UI\Draw\Pen::clip](#ui-draw-pen.clip) — Cortar un camino
- [UI\Draw\Pen::fill](#ui-draw-pen.fill) — Llena una ruta
- [UI\Draw\Pen::restore](#ui-draw-pen.restore) — Restaura
- [UI\Draw\Pen::save](#ui-draw-pen.save) — Guarda
- [UI\Draw\Pen::stroke](#ui-draw-pen.stroke) — Traza una ruta
- [UI\Draw\Pen::transform](#ui-draw-pen.transform) — Transformación de la matriz
- [UI\Draw\Pen::write](#ui-draw-pen.write) — Dibuja el texto en el punto
  </li>- [UI\Draw\Path](#class.ui-draw-path) — Dibujo del camino<li>[UI\Draw\Path::addRectangle](#ui-draw-path.addrectangle) — Dibuja un rectángulo
- [UI\Draw\Path::arcTo](#ui-draw-path.arcto) — Dibuja un arco
- [UI\Draw\Path::bezierTo](#ui-draw-path.bezierto) — Dibujar una curva de Bézier
- [UI\Draw\Path::closeFigure](#ui-draw-path.closefigure) — Cerrar Figura
- [UI\Draw\Path::\_\_construct](#ui-draw-path.construct) — Construye una nueva ruta
- [UI\Draw\Path::end](#ui-draw-path.end) — Finalizar Ruta
- [UI\Draw\Path::lineTo](#ui-draw-path.lineto) — Dibuja una línea
- [UI\Draw\Path::newFigure](#ui-draw-path.newfigure) — Dibuja figura
- [UI\Draw\Path::newFigureWithArc](#ui-draw-path.newfigurewitharc) — Dibuja figura con arco
  </li>- [UI\Draw\Matrix](#class.ui-draw-matrix) — Matriz de dibujo<li>[UI\Draw\Matrix::invert](#ui-draw-matrix.invert) — Invertir matriz
- [UI\Draw\Matrix::isInvertible](#ui-draw-matrix.isinvertible) — Detección de invertido
- [UI\Draw\Matrix::multiply](#ui-draw-matrix.multiply) — Multiplica la matriz
- [UI\Draw\Matrix::rotate](#ui-draw-matrix.rotate) — Rota la matriz
- [UI\Draw\Matrix::scale](#ui-draw-matrix.scale) — Escala la Matriz
- [UI\Draw\Matrix::skew](#ui-draw-matrix.skew) — Inclina la Matriz
- [UI\Draw\Matrix::translate](#ui-draw-matrix.translate) — Traduce la matriz
  </li>- [UI\Draw\Color](#class.ui-draw-color) — Representación en color<li>[UI\Draw\Color::__construct](#ui-draw-color.construct) — Construye un nuevo color
- [UI\Draw\Color::getChannel](#ui-draw-color.getchannel) — Manipulación de color
- [UI\Draw\Color::setChannel](#ui-draw-color.setchannel) — Manipulación de color
  </li>- [UI\Draw\Stroke](#class.ui-draw-stroke) — Dibujo lineal<li>[UI\Draw\Stroke::__construct](#ui-draw-stroke.construct) — Construye un nuevo trazo
- [UI\Draw\Stroke::getCap](#ui-draw-stroke.getcap) — Devuelve el tipo de terminación de línea
- [UI\Draw\Stroke::getJoin](#ui-draw-stroke.getjoin) — Obtiene la unión de línea
- [UI\Draw\Stroke::getMiterLimit](#ui-draw-stroke.getmiterlimit) — Obtiene el límite de inglete
- [UI\Draw\Stroke::getThickness](#ui-draw-stroke.getthickness) — Obtiene el grosor
- [UI\Draw\Stroke::setCap](#ui-draw-stroke.setcap) — Define la terminación de la línea
- [UI\Draw\Stroke::setJoin](#ui-draw-stroke.setjoin) — Establece la línea de unión
- [UI\Draw\Stroke::setMiterLimit](#ui-draw-stroke.setmiterlimit) — Establece el límite de ingletes
- [UI\Draw\Stroke::setThickness](#ui-draw-stroke.setthickness) — Establece el grosor
  </li>- [UI\Draw\Brush](#class.ui-draw-brush) — Pinceles<li>[UI\Draw\Brush::__construct](#ui-draw-brush.construct) — Crea un nuevo pincel
- [UI\Draw\Brush::getColor](#ui-draw-brush.getcolor) — Devuelve el color
- [UI\Draw\Brush::setColor](#ui-draw-brush.setcolor) — Define el color
  </li>- [UI\Draw\Brush\Gradient](#class.ui-draw-brush-gradient) — Pinceles de degradado<li>[UI\Draw\Brush\Gradient::addStop](#ui-draw-brush-gradient.addstop) — Dejar de manipular
- [UI\Draw\Brush\Gradient::delStop](#ui-draw-brush-gradient.delstop) — Dejar de manipular
- [UI\Draw\Brush\Gradient::setStop](#ui-draw-brush-gradient.setstop) — Dejar de manipular
  </li>- [UI\Draw\Brush\LinearGradient](#class.ui-draw-brush-lineargradient) — Gradiente lineal<li>[UI\Draw\Brush\LinearGradient::__construct](#ui-draw-brush-lineargradient.construct) — Construye un gradiente lineal
  </li>- [UI\Draw\Brush\RadialGradient](#class.ui-draw-brush-radialgradient) — Gradiente radial<li>[UI\Draw\Brush\RadialGradient::__construct](#ui-draw-brush-radialgradient.construct) — Construye un gradiente radial
  </li>- [UI\Draw\Text\Layout](#class.ui-draw-text-layout) — Representa el diseño del texto<li>[UI\Draw\Text\Layout::__construct](#ui-draw-text-layout.construct) — Construir un nuevo diseño de texto
- [UI\Draw\Text\Layout::setColor](#ui-draw-text-layout.setcolor) — Establece el color
- [UI\Draw\Text\Layout::setWidth](#ui-draw-text-layout.setwidth) — Establece el ancho
  </li>- [UI\Draw\Text\Font](#class.ui-draw-text-font) — Representa una fuente<li>[UI\Draw\Text\Font::__construct](#ui-draw-text-font.construct) — Construye una nueva fuente
- [UI\Draw\Text\Font::getAscent](#ui-draw-text-font.getascent) — Métricas de la fuente
- [UI\Draw\Text\Font::getDescent](#ui-draw-text-font.getdescent) — Métricas de la fuente
- [UI\Draw\Text\Font::getLeading](#ui-draw-text-font.getleading) — Métricas de la fuente
- [UI\Draw\Text\Font::getUnderlinePosition](#ui-draw-text-font.getunderlineposition) — Métricas de la fuente
- [UI\Draw\Text\Font::getUnderlineThickness](#ui-draw-text-font.getunderlinethickness) — Métricas de la fuente
  </li>- [UI\Draw\Text\Font\Descriptor](#class.ui-draw-text-font-descriptor) — Descriptor de fuente<li>[UI\Draw\Text\Font\Descriptor::__construct](#ui-draw-text-font-descriptor.construct) — Crea un nuevo descriptor de fuente
- [UI\Draw\Text\Font\Descriptor::getFamily](#ui-draw-text-font-descriptor.getfamily) — Devuelve la familia tipográfica
- [UI\Draw\Text\Font\Descriptor::getItalic](#ui-draw-text-font-descriptor.getitalic) — Detección de estilos
- [UI\Draw\Text\Font\Descriptor::getSize](#ui-draw-text-font-descriptor.getsize) — Detección de tamaño
- [UI\Draw\Text\Font\Descriptor::getStretch](#ui-draw-text-font-descriptor.getstretch) — Detección de estilos
- [UI\Draw\Text\Font\Descriptor::getWeight](#ui-draw-text-font-descriptor.getweight) — Detección de espesor
  </li>- [UI Funciones](#ref.ui)<li>[UI\Draw\Text\Font\fontFamilies](#function.ui-draw-text-font-fontfamilies) — Obtiene las familias de fuentes
- [UI\quit](#function.ui-quit) — Sale de la boucle UI
- [UI\run](#function.ui-run) — Entra en la boucle UI
  </li>- [UI\Draw\Text\Font\Weight](#class.ui-draw-text-font-weight) — Configuración del grosor de la fuente
- [UI\Draw\Text\Font\Italic](#class.ui-draw-text-font-italic) — Configuración de la fuente cursiva
- [UI\Draw\Text\Font\Stretch](#class.ui-draw-text-font-stretch) — Ajustes de estiramiento de fuentes
- [UI\Draw\Line\Cap](#class.ui-draw-line-cap) — Parámetros de terminación de línea
- [UI\Draw\Line\Join](#class.ui-draw-line-join) — Parámetros de unión de líneas
- [UI\Key](#class.ui-key) — Identificadores clave
- [UI\Exception\InvalidArgumentException](#class.ui-exception-invalidargumentexception) — InvalidArgumentException
- [UI\Exception\RuntimeException](#class.ui-exception-runtimeexception) — RuntimeException
