# PHP CommonMark Extension

## Introducción

La extensión CommonMark proporciona funciones y clases para analizar, renderizar y manipular documentos Markdown en PHP.

---

## Tabla de Contenidos
- [Instalación y Configuración](#instalacion-y-configuracion)
- [Constantes Predefinidas](#constantes-predefinidas)
- [Clases Principales](#clases-principales)
- [Funciones de CommonMark](#funciones-de-commonmark)
- [Ejemplo de Uso](#ejemplo-de-uso)

---

## Instalación y Configuración

### Requerimientos
- PHP >= 7.0
- Extensión CommonMark

### Instalación

Instala la extensión usando PECL o compila desde el código fuente.

### Configuración en tiempo de ejecución

Asegúrate de habilitar la extensión en tu archivo `php.ini`.

---

## Constantes Predefinidas

La extensión define varias constantes para controlar el análisis y renderizado:
- `CommonMark\Parser\Normal`
- `CommonMark\Parser\Normalize`
- `CommonMark\Parser\ValidateUTF8`
- `CommonMark\Parser\Smart`
- `CommonMark\Render\Normal`
- `CommonMark\Render\SourcePos`
- `CommonMark\Render\HardBreaks`
- `CommonMark\Render\Safe`
- `CommonMark\Render\NoBreaks`

---

## Clases Principales

### CommonMark\Node
Representa un nodo en el árbol de sintaxis Markdown.

### CommonMark\CQL
Permite ejecutar consultas sobre el árbol de nodos.

#### Métodos
- `__construct(string $query)` — Construcción de CQL
- `__invoke(CommonMark\Node $root, callable $handler)` — Ejecución de CQL

### CommonMark\Parser
Analiza contenido Markdown y genera nodos.

---

## Funciones de CommonMark

### CommonMark\Parse
Analiza una cadena Markdown y devuelve el nodo raíz.
```php
CommonMark\Parse(string $content, int $options = ?): CommonMark\Node
```

### CommonMark\Render
Renderiza un nodo en diferentes formatos.
```php
CommonMark\Render(CommonMark\Node $node, int $options = ?, int $width = ?): string
```

### CommonMark\Render\HTML
Renderiza el nodo como HTML.
```php
CommonMark\Render\HTML(CommonMark\Node $node, int $options = ?): string
```

### CommonMark\Render\Latex
Renderiza el nodo como LaTeX.
```php
CommonMark\Render\Latex(CommonMark\Node $node, int $options = ?, int $width = ?): string
```

### CommonMark\Render\Man
Renderiza el nodo como página de manual.
```php
CommonMark\Render\Man(CommonMark\Node $node, int $options = ?, int $width = ?): string
```

### CommonMark\Render\XML
Renderiza el nodo como XML.
```php
CommonMark\Render\XML(CommonMark\Node $node, int $options = ?): string
```

---

## Ejemplo de Uso

```php
$content = "# Título\nTexto de ejemplo.";
$node = CommonMark\Parse($content);
$html = CommonMark\Render\HTML($node);
echo $html;
```

---

*Para más detalles, consulta la documentación oficial de la extensión CommonMark para PHP.*
