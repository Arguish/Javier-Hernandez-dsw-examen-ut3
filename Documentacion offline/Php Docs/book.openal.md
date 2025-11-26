# Vinculaciones de audio del OpenAL

# Introducción

Vinculaciones de audio independientes de la plataforma.
Requiere la [» biblioteca OpenAL](https://www.openal.org/).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#openal.installation)
- [Tipos de recursos](#openal.resources)

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/openal](https://pecl.php.net/package/openal).

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

## Tipos de recursos

Esta extensión define cuatro tipos de recursos:
_Open AL(Device)_ - Devuelto por [openal_device_open()](#function.openal-device-open),
_Open AL(Context)_ - Devuelto por [openal_context_create()](#function.openal-context-create),
_Open AL(Buffer)_ - Devuelto por [openal_buffer_create()](#function.openal-buffer-create),
y _Open AL(Source)_ - Devuelto por [openal_source_create()](#function.openal-source-create).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[ALC_FREQUENCY](#constant.alc-frequency)**
     ([int](#language.types.integer))



     Atributo de contexto





    **[ALC_REFRESH](#constant.alc-refresh)**
     ([int](#language.types.integer))



     Atributo de contexto





    **[ALC_SYNC](#constant.alc-sync)**
     ([int](#language.types.integer))



     Atributo de contexto





    **[AL_FREQUENCY](#constant.al-frequency)**
     ([int](#language.types.integer))



     Configuración del buffer





    **[AL_BITS](#constant.al-bits)**
     ([int](#language.types.integer))



     Configuración del buffer





    **[AL_CHANNELS](#constant.al-channels)**
     ([int](#language.types.integer))



     Configuración del buffer





    **[AL_SIZE](#constant.al-size)**
     ([int](#language.types.integer))



     Configuración del buffer





    **[AL_BUFFER](#constant.al-buffer)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Entero)





    **[AL_SOURCE_RELATIVE](#constant.al-source-relative)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Entero)





    **[AL_SOURCE_STATE](#constant.al-source-state)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Entero)





    **[AL_PITCH](#constant.al-pitch)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_GAIN](#constant.al-gain)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_MIN_GAIN](#constant.al-min-gain)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_MAX_GAIN](#constant.al-max-gain)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_MAX_DISTANCE](#constant.al-max-distance)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_ROLLOFF_FACTOR](#constant.al-rolloff-factor)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_CONE_OUTER_GAIN](#constant.al-cone-outer-gain)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_CONE_INNER_ANGLE](#constant.al-cone-inner-angle)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_CONE_OUTER_ANGLE](#constant.al-cone-outer-angle)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_REFERENCE_DISTANCE](#constant.al-reference-distance)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número de punto flotante)





    **[AL_POSITION](#constant.al-position)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número vectorial de punto flotante)





    **[AL_VELOCITY](#constant.al-velocity)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número vectorial de punto flotante)





    **[AL_DIRECTION](#constant.al-direction)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número vectorial de punto flotante)





    **[AL_ORIENTATION](#constant.al-orientation)**
     ([int](#language.types.integer))



     Configuración de la fuente/escucha (Número vectorial de punto flotante)





    **[AL_FORMAT_MONO8](#constant.al-format-mono8)**
     ([int](#language.types.integer))



     Formato PCM





    **[AL_FORMAT_MONO16](#constant.al-format-mono16)**
     ([int](#language.types.integer))



     Formato PCM





    **[AL_FORMAT_STEREO8](#constant.al-format-stereo8)**
     ([int](#language.types.integer))



     Formato PCM





    **[AL_FORMAT_STEREO16](#constant.al-format-stereo16)**
     ([int](#language.types.integer))



     Formato PCM





    **[AL_INITIAL](#constant.al-initial)**
     ([int](#language.types.integer))



     Estado de la Fuente





    **[AL_PLAYING](#constant.al-playing)**
     ([int](#language.types.integer))



     Estado de la Fuente





    **[AL_PAUSED](#constant.al-paused)**
     ([int](#language.types.integer))



     Estado de la Fuente





    **[AL_STOPPED](#constant.al-stopped)**
     ([int](#language.types.integer))



     Estado de la Fuente





    **[AL_LOOPING](#constant.al-looping)**
     ([int](#language.types.integer))



     Estado de la Fuente





    **[AL_TRUE](#constant.al-true)**
     ([int](#language.types.integer))



     Valor booleano reconocido por OpenAL





    **[AL_FALSE](#constant.al-false)**
     ([int](#language.types.integer))



     Valor booleano reconocido por OpenAL

# Funciones de OpenAL

# openal_buffer_create

(PECL openal &gt;= 0.1.0)

openal_buffer_create — Genera un buffer OpenAL

### Descripción

**openal_buffer_create**(): [resource](#language.types.resource)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**openal_buffer_create()** devuelve un recurso
[Open AL(Buffer)](#openal.resources) o **[false](#constant.false)** en caso de error.

### Ver también

    - [openal_buffer_loadwav()](#function.openal-buffer-loadwav) - Carga un archivo .wav dentro de un buffer

    - [openal_buffer_data()](#function.openal-buffer-data) - Carga un buffer con datos

# openal_buffer_data

(PECL openal &gt;= 0.1.0)

openal_buffer_data —
Carga un buffer con datos

### Descripción

**openal_buffer_data**(
    [resource](#language.types.resource) $buffer,
    [int](#language.types.integer) $format,
    [string](#language.types.string) $data,
    [int](#language.types.integer) $freq
): [bool](#language.types.boolean)

### Parámetros

    buffer


      Un recurso [Open AL(Buffer)](#openal.resources)
      (previamente creado por [openal_buffer_create()](#function.openal-buffer-create)).






    format


      Formato de data, uno de:
      **[AL_FORMAT_MONO8](#constant.al-format-mono8)**,
      **[AL_FORMAT_MONO16](#constant.al-format-mono16)**,
      **[AL_FORMAT_STEREO8](#constant.al-format-stereo8)** y
      **[AL_FORMAT_STEREO16](#constant.al-format-stereo16)**






    data


      Bloque de datos de audio binario en el format y el
      freq especificado.






    freq


      Frecuencia de data dados en Hz.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_buffer_loadwav()](#function.openal-buffer-loadwav) - Carga un archivo .wav dentro de un buffer

    - [openal_stream()](#function.openal-stream) - Inicia el streaming de una fuente

# openal_buffer_destroy

(PECL openal &gt;= 0.1.0)

openal_buffer_destroy —
Destruye un buffer OpenAL

### Descripción

**openal_buffer_destroy**([resource](#language.types.resource) $buffer): [bool](#language.types.boolean)

### Parámetros

    buffer


      Un recurso [Open AL(Buffer)](#openal.resources)
      (previamente creado por [openal_buffer_create()](#function.openal-buffer-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_buffer_create()](#function.openal-buffer-create) - Genera un buffer OpenAL

# openal_buffer_get

(PECL openal &gt;= 0.1.0)

openal_buffer_get — Obtiene las propiedades del buffer OpenAL

### Descripción

**openal_buffer_get**([resource](#language.types.resource) $buffer, [int](#language.types.integer) $property): [int](#language.types.integer)|[false](#language.types.singleton)

### Parámetros

    buffer


      Un recurso [Open AL(Buffer)](#openal.resources)
      (creado previamente por [openal_buffer_create()](#function.openal-buffer-create)).






    property


      Una propiedad específica, una de las siguientes:
      **[AL_FREQUENCY](#constant.al-frequency)**,
      **[AL_BITS](#constant.al-bits)**,
      **[AL_CHANNELS](#constant.al-channels)** y
      **[AL_SIZE](#constant.al-size)**.


### Valores devueltos

Devuelve un valor entero apropiado para la propiedad solicitada
property o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_buffer_create()](#function.openal-buffer-create) - Genera un buffer OpenAL

# openal_buffer_loadwav

(PECL openal &gt;= 0.1.0)

openal_buffer_loadwav —
Carga un archivo .wav dentro de un buffer

### Descripción

**openal_buffer_loadwav**([resource](#language.types.resource) $buffer, [string](#language.types.string) $wavfile): [bool](#language.types.boolean)

### Parámetros

    buffer


      Un recurso [Open AL(Buffer)](#openal.resources)
      (previamente creado por [openal_buffer_create()](#function.openal-buffer-create)).






    wavfile


      Ruta al archivo .wav en
      el sistema de archivo *local*.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_buffer_data()](#function.openal-buffer-data) - Carga un buffer con datos

    - [openal_stream()](#function.openal-stream) - Inicia el streaming de una fuente

# openal_context_create

(PECL openal &gt;= 0.1.0)

openal_context_create —
Crea un contexto de procesamiento de audio

### Descripción

**openal_context_create**([resource](#language.types.resource) $device): [resource](#language.types.resource)

### Parámetros

    device


      Un recurso [Open AL(Device)](#openal.resources)
      (previamente creado por [openal_device_open()](#function.openal-device-open)).


### Valores devueltos

Devuelve un recurso [Open AL(Context)](#openal.resources) en éxito o
**[false](#constant.false)** en fallo.

### Ver también

    - [openal_device_open()](#function.openal-device-open) - Inicia la capa de audio del OpenAL

    - [openal_context_destroy()](#function.openal-context-destroy) - Destruye un contexto

# openal_context_current

(PECL openal &gt;= 0.1.0)

openal_context_current —
Crea el corriente contexto especificado

### Descripción

**openal_context_current**([resource](#language.types.resource) $context): [bool](#language.types.boolean)

### Parámetros

    context


      Un recurso [Open AL(Context)](#openal.resources)
      (previamente creado por [openal_context_create()](#function.openal-context-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_context_create()](#function.openal-context-create) - Crea un contexto de procesamiento de audio

# openal_context_destroy

(PECL openal &gt;= 0.1.0)

openal_context_destroy —
Destruye un contexto

### Descripción

**openal_context_destroy**([resource](#language.types.resource) $context): [bool](#language.types.boolean)

### Parámetros

    context


      Un recurso [Open AL(Context)](#openal.resources)
      (previamente creado por [openal_context_create()](#function.openal-context-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_context_create()](#function.openal-context-create) - Crea un contexto de procesamiento de audio

# openal_context_process

(PECL openal &gt;= 0.1.0)

openal_context_process —
Procesa un contexto especificado

### Descripción

**openal_context_process**([resource](#language.types.resource) $context): [bool](#language.types.boolean)

### Parámetros

    context


      Un recurso [Open AL(Context)](#openal.resources)
      (previamente creado por [openal_context_create()](#function.openal-context-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_context_create()](#function.openal-context-create) - Crea un contexto de procesamiento de audio

    - [openal_context_current()](#function.openal-context-current) - Crea el corriente contexto especificado

    - [openal_context_suspend()](#function.openal-context-suspend) - Suspende el contexto especificado

# openal_context_suspend

(PECL openal &gt;= 0.1.0)

openal_context_suspend —
Suspende el contexto especificado

### Descripción

**openal_context_suspend**([resource](#language.types.resource) $context): [bool](#language.types.boolean)

### Parámetros

    context


      Un recurso [Open AL(Context)](#openal.resources)
      (previamente creado por [openal_context_create()](#function.openal-context-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_context_create()](#function.openal-context-create) - Crea un contexto de procesamiento de audio

    - [openal_context_current()](#function.openal-context-current) - Crea el corriente contexto especificado

    - [openal_context_process()](#function.openal-context-process) - Procesa un contexto especificado

# openal_device_close

(PECL openal &gt;= 0.1.0)

openal_device_close —
Cierra un dispositivo OpenAL

### Descripción

**openal_device_close**([resource](#language.types.resource) $device): [bool](#language.types.boolean)

### Parámetros

    device


      Un recurso [Open AL(Device)](#openal.resources)
      (previamente creado por [openal_device_open()](#function.openal-device-open))
      para ser cerrado.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_device_open()](#function.openal-device-open) - Inicia la capa de audio del OpenAL

# openal_device_open

(PECL openal &gt;= 0.1.0)

openal_device_open —
Inicia la capa de audio del OpenAL

### Descripción

**openal_device_open**([string](#language.types.string) $device_desc = ?): [resource](#language.types.resource)

### Parámetros

    device_desc


      Abre un dispositivo de audio especiado opcionalmente por device_desc.
      Si device_desc no está especificado el primer dispositivo de
      audio disponible será usado.


### Valores devueltos

Devuelve un recurso [Open AL(Device)](#openal.resources) en éxito o
**[false](#constant.false)** en fallo.

### Ver también

    - [openal_device_close()](#function.openal-device-close) - Cierra un dispositivo OpenAL

    - [openal_context_create()](#function.openal-context-create) - Crea un contexto de procesamiento de audio

# openal_listener_get

(PECL openal &gt;= 0.1.0)

openal_listener_get —
Devuelve una propiedad de oyente

### Descripción

**openal_listener_get**([int](#language.types.integer) $property): [mixed](#language.types.mixed)

### Parámetros

    property


      Propiedad para recuperar, una de:
      **[AL_GAIN](#constant.al-gain)** (float),
      **[AL_POSITION](#constant.al-position)** (array(float,float,float)),
      **[AL_VELOCITY](#constant.al-velocity)** (array(float,float,float)) y
      **[AL_ORIENTATION](#constant.al-orientation)** (array(float,float,float)).


### Valores devueltos

Devuelve un flotante o un arreglo de flotantes (como apropiado) o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_listener_set()](#function.openal-listener-set) - Establece una propiedad de oyente

# openal_listener_set

(PECL openal &gt;= 0.1.0)

openal_listener_set —
Establece una propiedad de oyente

### Descripción

**openal_listener_set**([int](#language.types.integer) $property, [mixed](#language.types.mixed) $setting): [bool](#language.types.boolean)

### Parámetros

    property


      Propiedad a establecer, una de:
      **[AL_GAIN](#constant.al-gain)** (float),
      **[AL_POSITION](#constant.al-position)** (array(float,float,float)),
      **[AL_VELOCITY](#constant.al-velocity)** (array(float,float,float)) y
      **[AL_ORIENTATION](#constant.al-orientation)** (array(float,float,float)).






    setting


      Valor a establecer, ya sea flotante, o un arreglo de flotantes como apropiado.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_listener_get()](#function.openal-listener-get) - Devuelve una propiedad de oyente

# openal_source_create

(PECL openal &gt;= 0.1.0)

openal_source_create — Genera un recurso de fuente

### Descripción

**openal_source_create**(): [resource](#language.types.resource)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un recurso [Open AL(Source)](#openal.resources)
o **[false](#constant.false)** en caso de error.

### Ver también

    - [openal_source_set()](#function.openal-source-set) - Establece la propiedad de la fuente

    - [openal_source_play()](#function.openal-source-play) - Empieza la reproducción de la fuente

    - [openal_source_destroy()](#function.openal-source-destroy) - Destruye una fuente de recursos

# openal_source_destroy

(PECL openal &gt;= 0.1.0)

openal_source_destroy —
Destruye una fuente de recursos

### Descripción

**openal_source_destroy**([resource](#language.types.resource) $source): [bool](#language.types.boolean)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_create()](#function.openal-source-create) - Genera un recurso de fuente

# openal_source_get

(PECL openal &gt;= 0.1.0)

openal_source_get —
Recupera una propiedad de una fuente del OpenAL

### Descripción

**openal_source_get**([resource](#language.types.resource) $source, [int](#language.types.integer) $property): [mixed](#language.types.mixed)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).






    property


      Propiedad para obtener, una de:
      **[AL_SOURCE_RELATIVE](#constant.al-source-relative)** (int),
      **[AL_SOURCE_STATE](#constant.al-source-state)** (int),
      **[AL_PITCH](#constant.al-pitch)** (float),
      **[AL_GAIN](#constant.al-gain)** (float),
      **[AL_MIN_GAIN](#constant.al-min-gain)** (float),
      **[AL_MAX_GAIN](#constant.al-max-gain)** (float),
      **[AL_MAX_DISTANCE](#constant.al-max-distance)** (float),
      **[AL_ROLLOFF_FACTOR](#constant.al-rolloff-factor)** (float),
      **[AL_CONE_OUTER_GAIN](#constant.al-cone-outer-gain)** (float),
      **[AL_CONE_INNER_ANGLE](#constant.al-cone-inner-angle)** (float),
      **[AL_CONE_OUTER_ANGLE](#constant.al-cone-outer-angle)** (float),
      **[AL_REFERENCE_DISTANCE](#constant.al-reference-distance)** (float),
      **[AL_POSITION](#constant.al-position)** (array(float,float,float)),
      **[AL_VELOCITY](#constant.al-velocity)** (array(float,float,float)),
      **[AL_DIRECTION](#constant.al-direction)** (array(float,float,float)).


### Valores devueltos

Devuelve el tipo asociado con la propiedad que se recupera
o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_create()](#function.openal-source-create) - Genera un recurso de fuente

    - [openal_source_set()](#function.openal-source-set) - Establece la propiedad de la fuente

    - [openal_source_play()](#function.openal-source-play) - Empieza la reproducción de la fuente

# openal_source_pause

(PECL openal &gt;= 0.1.0)

openal_source_pause —
Pausa la fuente

### Descripción

**openal_source_pause**([resource](#language.types.resource) $source): [bool](#language.types.boolean)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_stop()](#function.openal-source-stop) - Detiene la reproducción de la fuente

    - [openal_source_play()](#function.openal-source-play) - Empieza la reproducción de la fuente

    - [openal_source_rewind()](#function.openal-source-rewind) - Rebobina la fuente

# openal_source_play

(PECL openal &gt;= 0.1.0)

openal_source_play —
Empieza la reproducción de la fuente

### Descripción

**openal_source_play**([resource](#language.types.resource) $source): [bool](#language.types.boolean)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_stop()](#function.openal-source-stop) - Detiene la reproducción de la fuente

    - [openal_source_pause()](#function.openal-source-pause) - Pausa la fuente

    - [openal_source_rewind()](#function.openal-source-rewind) - Rebobina la fuente

# openal_source_rewind

(PECL openal &gt;= 0.1.0)

openal_source_rewind —
Rebobina la fuente

### Descripción

**openal_source_rewind**([resource](#language.types.resource) $source): [bool](#language.types.boolean)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_stop()](#function.openal-source-stop) - Detiene la reproducción de la fuente

    - [openal_source_pause()](#function.openal-source-pause) - Pausa la fuente

    - [openal_source_play()](#function.openal-source-play) - Empieza la reproducción de la fuente

# openal_source_set

(PECL openal &gt;= 0.1.0)

openal_source_set —
Establece la propiedad de la fuente

### Descripción

**openal_source_set**([resource](#language.types.resource) $source, [int](#language.types.integer) $property, [mixed](#language.types.mixed) $setting): [bool](#language.types.boolean)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).






    property


      Propiedad para establecer, una de:
      **[AL_BUFFER](#constant.al-buffer)** (OpenAL(Source)),
      **[AL_LOOPING](#constant.al-looping)** (bool),
      **[AL_SOURCE_RELATIVE](#constant.al-source-relative)** (int),
      **[AL_SOURCE_STATE](#constant.al-source-state)** (int),
      **[AL_PITCH](#constant.al-pitch)** (float),
      **[AL_GAIN](#constant.al-gain)** (float),
      **[AL_MIN_GAIN](#constant.al-min-gain)** (float),
      **[AL_MAX_GAIN](#constant.al-max-gain)** (float),
      **[AL_MAX_DISTANCE](#constant.al-max-distance)** (float),
      **[AL_ROLLOFF_FACTOR](#constant.al-rolloff-factor)** (float),
      **[AL_CONE_OUTER_GAIN](#constant.al-cone-outer-gain)** (float),
      **[AL_CONE_INNER_ANGLE](#constant.al-cone-inner-angle)** (float),
      **[AL_CONE_OUTER_ANGLE](#constant.al-cone-outer-angle)** (float),
      **[AL_REFERENCE_DISTANCE](#constant.al-reference-distance)** (float),
      **[AL_POSITION](#constant.al-position)** (array(float,float,float)),
      **[AL_VELOCITY](#constant.al-velocity)** (array(float,float,float)),
      **[AL_DIRECTION](#constant.al-direction)** (array(float,float,float)).






    setting


      El valor para asignar a la property especifica.
      Consulta la descripción de la property
      para una descripción de el valor(es) esperando.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_create()](#function.openal-source-create) - Genera un recurso de fuente

    - [openal_source_get()](#function.openal-source-get) - Recupera una propiedad de una fuente del OpenAL

    - [openal_source_play()](#function.openal-source-play) - Empieza la reproducción de la fuente

# openal_source_stop

(PECL openal &gt;= 0.1.0)

openal_source_stop —
Detiene la reproducción de la fuente

### Descripción

**openal_source_stop**([resource](#language.types.resource) $source): [bool](#language.types.boolean)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_play()](#function.openal-source-play) - Empieza la reproducción de la fuente

    - [openal_source_pause()](#function.openal-source-pause) - Pausa la fuente

    - [openal_source_rewind()](#function.openal-source-rewind) - Rebobina la fuente

# openal_stream

(PECL openal &gt;= 0.1.0)

openal_stream — Inicia el streaming de una fuente

### Descripción

**openal_stream**([resource](#language.types.resource) $source, [int](#language.types.integer) $format, [int](#language.types.integer) $rate): [resource](#language.types.resource)|[false](#language.types.singleton)

### Parámetros

    source


      Un recurso [Open AL(Source)](#openal.resources)
      (previamente creado por [openal_source_create()](#function.openal-source-create)).






    format


      El formato del argumento data, uno de los siguientes:
      **[AL_FORMAT_MONO8](#constant.al-format-mono8)**,
      **[AL_FORMAT_MONO16](#constant.al-format-mono16)**,
      **[AL_FORMAT_STEREO8](#constant.al-format-stereo8)** y
      **[AL_FORMAT_STEREO16](#constant.al-format-stereo16)**.






    rate


      La frecuencia de los datos a streamear, en Hz.


### Valores devueltos

Devuelve un recurso de streaming o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [openal_source_create()](#function.openal-source-create) - Genera un recurso de fuente

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

## Tabla de contenidos

- [openal_buffer_create](#function.openal-buffer-create) — Genera un buffer OpenAL
- [openal_buffer_data](#function.openal-buffer-data) — Carga un buffer con datos
- [openal_buffer_destroy](#function.openal-buffer-destroy) — Destruye un buffer OpenAL
- [openal_buffer_get](#function.openal-buffer-get) — Obtiene las propiedades del buffer OpenAL
- [openal_buffer_loadwav](#function.openal-buffer-loadwav) — Carga un archivo .wav dentro de un buffer
- [openal_context_create](#function.openal-context-create) — Crea un contexto de procesamiento de audio
- [openal_context_current](#function.openal-context-current) — Crea el corriente contexto especificado
- [openal_context_destroy](#function.openal-context-destroy) — Destruye un contexto
- [openal_context_process](#function.openal-context-process) — Procesa un contexto especificado
- [openal_context_suspend](#function.openal-context-suspend) — Suspende el contexto especificado
- [openal_device_close](#function.openal-device-close) — Cierra un dispositivo OpenAL
- [openal_device_open](#function.openal-device-open) — Inicia la capa de audio del OpenAL
- [openal_listener_get](#function.openal-listener-get) — Devuelve una propiedad de oyente
- [openal_listener_set](#function.openal-listener-set) — Establece una propiedad de oyente
- [openal_source_create](#function.openal-source-create) — Genera un recurso de fuente
- [openal_source_destroy](#function.openal-source-destroy) — Destruye una fuente de recursos
- [openal_source_get](#function.openal-source-get) — Recupera una propiedad de una fuente del OpenAL
- [openal_source_pause](#function.openal-source-pause) — Pausa la fuente
- [openal_source_play](#function.openal-source-play) — Empieza la reproducción de la fuente
- [openal_source_rewind](#function.openal-source-rewind) — Rebobina la fuente
- [openal_source_set](#function.openal-source-set) — Establece la propiedad de la fuente
- [openal_source_stop](#function.openal-source-stop) — Detiene la reproducción de la fuente
- [openal_stream](#function.openal-stream) — Inicia el streaming de una fuente

- [Introducción](#intro.openal)
- [Instalación/Configuración](#openal.setup)<li>[Instalación](#openal.installation)
- [Tipos de recursos](#openal.resources)
  </li>- [Constantes predefinidas](#openal.constants)
- [Funciones de OpenAL](#ref.openal)<li>[openal_buffer_create](#function.openal-buffer-create) — Genera un buffer OpenAL
- [openal_buffer_data](#function.openal-buffer-data) — Carga un buffer con datos
- [openal_buffer_destroy](#function.openal-buffer-destroy) — Destruye un buffer OpenAL
- [openal_buffer_get](#function.openal-buffer-get) — Obtiene las propiedades del buffer OpenAL
- [openal_buffer_loadwav](#function.openal-buffer-loadwav) — Carga un archivo .wav dentro de un buffer
- [openal_context_create](#function.openal-context-create) — Crea un contexto de procesamiento de audio
- [openal_context_current](#function.openal-context-current) — Crea el corriente contexto especificado
- [openal_context_destroy](#function.openal-context-destroy) — Destruye un contexto
- [openal_context_process](#function.openal-context-process) — Procesa un contexto especificado
- [openal_context_suspend](#function.openal-context-suspend) — Suspende el contexto especificado
- [openal_device_close](#function.openal-device-close) — Cierra un dispositivo OpenAL
- [openal_device_open](#function.openal-device-open) — Inicia la capa de audio del OpenAL
- [openal_listener_get](#function.openal-listener-get) — Devuelve una propiedad de oyente
- [openal_listener_set](#function.openal-listener-set) — Establece una propiedad de oyente
- [openal_source_create](#function.openal-source-create) — Genera un recurso de fuente
- [openal_source_destroy](#function.openal-source-destroy) — Destruye una fuente de recursos
- [openal_source_get](#function.openal-source-get) — Recupera una propiedad de una fuente del OpenAL
- [openal_source_pause](#function.openal-source-pause) — Pausa la fuente
- [openal_source_play](#function.openal-source-play) — Empieza la reproducción de la fuente
- [openal_source_rewind](#function.openal-source-rewind) — Rebobina la fuente
- [openal_source_set](#function.openal-source-set) — Establece la propiedad de la fuente
- [openal_source_stop](#function.openal-source-stop) — Detiene la reproducción de la fuente
- [openal_stream](#function.openal-stream) — Inicia el streaming de una fuente
  </li>
