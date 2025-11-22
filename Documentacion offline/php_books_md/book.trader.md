# Análisis técnico para comerciantes

# Introducción

La extensión trader es una biblioteca de código abierto gratuita basada en TA-Lib.
Está dedicada a los desarrolladores de software de actividad comercial que requieren realizar
análisis técnicos de datos de mercado financiero. Al lado de muchos indicadores como ADX, MACD,
RSI, Estocástico, TRIX, están presentes el reconocimiento de patrones de velas y varias
funciones de vectores aritméticas y algebraicas.

Los cálculos se pueden realizar en dos modos: TA-Lib y Metastock. Cambiándolo usando
[trader_set_compat()](#function.trader-set-compat)
afectará la manera en que funcionan algunas funciones de trader.

Algunas funciones de trader proporcionan diferentes resultados dependiendo del "punto de inicio"
de los datos involucrados. Esto se refiere a menudo como que una función posee memoria.
Un ejemplo de tales funciones es la Media móvil exponencial. Es posible controlar el perido
inestable (la cantidad de datos a quitar) usando la función
[trader_set_unstable_period()](#function.trader-set-unstable-period).

Se puede encontrar documentación ampliada sobre indicadores, fórmulas e implementaciones
en otros lenguajes de programación en [» https://ta-lib.org/](https://ta-lib.org/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#trader.requirements)
- [Instalación](#trader.installation)
- [Configuración en tiempo de ejecución](#trader.configuration)

    ## Requerimientos

    La extensión trader se basa en
    [» TA-Lib](https://ta-lib.org/).
    TA-Lib está totalmente integrado en la extensión, por lo que no es
    necesaria ninguna biblioteca externa.

    ## Instalación

        Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.




        Información sobre la instalación de estas extensiones PECL
            puede ser encontrada en el capítulo del manual titulado [Instalación

    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/trader](https://pecl.php.net/package/trader).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Trader Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [trader.real_precision](#ini.trader.real-precision)
      3
      **[INI_ALL](#constant.ini-all)**
      Desde trader 0.2.1



      [trader.real_round_mode](#ini.trader.real-round-mode)
      HALF_DOWN
      **[INI_ALL](#constant.ini-all)**
      Desde trader 0.3.0


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     trader.real_precision
     [int](#language.types.integer)



      Todos los valores de los arrays devueltos serán redondeados a esta precisión.
      Sin enbargo, los cálculos dentro de TA-Lib se realizarán con valores no redondeados.







     trader.real_round_mode
     [string](#language.types.string)



      Controla la política de redondeo de números reales de trader. Los valores válidos son HALF_UP,
      HALF_DOWN, HALF_EVEN y HALF_ODD. El comportamiento es idéntico al de la función [round()](#function.round) usada con el argumento de modo.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[TRADER_MA_TYPE_SMA](#constant.trader-ma-type-sma)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_EMA](#constant.trader-ma-type-ema)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_WMA](#constant.trader-ma-type-wma)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_DEMA](#constant.trader-ma-type-dema)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_TEMA](#constant.trader-ma-type-tema)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_TRIMA](#constant.trader-ma-type-trima)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_KAMA](#constant.trader-ma-type-kama)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_MAMA](#constant.trader-ma-type-mama)**
     ([int](#language.types.integer))








     **[TRADER_MA_TYPE_T3](#constant.trader-ma-type-t3)**
     ([int](#language.types.integer))








     **[TRADER_REAL_MIN](#constant.trader-real-min)**
     ([float](#language.types.float))








     **[TRADER_REAL_MAX](#constant.trader-real-max)**
     ([float](#language.types.float))








     **[TRADER_FUNC_UNST_ADX](#constant.trader-func-unst-adx)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_ADXR](#constant.trader-func-unst-adxr)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_ATR](#constant.trader-func-unst-atr)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_CMO](#constant.trader-func-unst-cmo)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_DX](#constant.trader-func-unst-dx)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_EMA](#constant.trader-func-unst-ema)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_HT_DCPERIOD](#constant.trader-func-unst-ht-dcperiod)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_HT_DCPHASE](#constant.trader-func-unst-ht-dcphase)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_HT_PHASOR](#constant.trader-func-unst-ht-phasor)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_HT_SINE](#constant.trader-func-unst-ht-sine)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_HT_TRENDLINE](#constant.trader-func-unst-ht-trendline)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_HT_TRENDMODE](#constant.trader-func-unst-ht-trendmode)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_KAMA](#constant.trader-func-unst-kama)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_MAMA](#constant.trader-func-unst-mama)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_MFI](#constant.trader-func-unst-mfi)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_MINUS_DI](#constant.trader-func-unst-minus-di)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_MINUS_DM](#constant.trader-func-unst-minus-dm)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_NATR](#constant.trader-func-unst-natr)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_PLUS_DI](#constant.trader-func-unst-plus-di)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_PLUS_DM](#constant.trader-func-unst-plus-dm)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_RSI](#constant.trader-func-unst-rsi)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_STOCHRSI](#constant.trader-func-unst-stochrsi)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_T3](#constant.trader-func-unst-t3)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_ALL](#constant.trader-func-unst-all)**
     ([int](#language.types.integer))








     **[TRADER_FUNC_UNST_NONE](#constant.trader-func-unst-none)**
     ([int](#language.types.integer))








     **[TRADER_COMPATIBILITY_DEFAULT](#constant.trader-compatibility-default)**
     ([int](#language.types.integer))








     **[TRADER_COMPATIBILITY_METASTOCK](#constant.trader-compatibility-metastock)**
     ([int](#language.types.integer))








     **[TRADER_ERR_SUCCESS](#constant.trader-err-success)**
     ([int](#language.types.integer))








     **[TRADER_ERR_LIB_NOT_INITIALIZE](#constant.trader-err-lib-not-initialize)**
     ([int](#language.types.integer))








     **[TRADER_ERR_BAD_PARAM](#constant.trader-err-bad-param)**
     ([int](#language.types.integer))








     **[TRADER_ERR_ALLOC_ERR](#constant.trader-err-alloc-err)**
     ([int](#language.types.integer))








     **[TRADER_ERR_GROUP_NOT_FOUND](#constant.trader-err-group-not-found)**
     ([int](#language.types.integer))








     **[TRADER_ERR_FUNC_NOT_FOUND](#constant.trader-err-func-not-found)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INVALID_HANDLE](#constant.trader-err-invalid-handle)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INVALID_PARAM_HOLDER](#constant.trader-err-invalid-param-holder)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INVALID_PARAM_HOLDER_TYPE](#constant.trader-err-invalid-param-holder-type)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INVALID_PARAM_FUNCTION](#constant.trader-err-invalid-param-function)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INPUT_NOT_ALL_INITIALIZE](#constant.trader-err-input-not-all-initialize)**
     ([int](#language.types.integer))








     **[TRADER_ERR_OUTPUT_NOT_ALL_INITIALIZE](#constant.trader-err-output-not-all-initialize)**
     ([int](#language.types.integer))








     **[TRADER_ERR_OUT_OF_RANGE_START_INDEX](#constant.trader-err-out-of-range-start-index)**
     ([int](#language.types.integer))








     **[TRADER_ERR_OUT_OF_RANGE_END_INDEX](#constant.trader-err-out-of-range-end-index)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INVALID_LIST_TYPE](#constant.trader-err-invalid-list-type)**
     ([int](#language.types.integer))








     **[TRADER_ERR_BAD_OBJECT](#constant.trader-err-bad-object)**
     ([int](#language.types.integer))








     **[TRADER_ERR_NOT_SUPPORTED](#constant.trader-err-not-supported)**
     ([int](#language.types.integer))








     **[TRADER_ERR_INTERNAL_ERROR](#constant.trader-err-internal-error)**
     ([int](#language.types.integer))








     **[TRADER_ERR_UNKNOWN_ERROR](#constant.trader-err-unknown-error)**
     ([int](#language.types.integer))





# Funciones de Trader

# trader_acos

(PECL trader &gt;= 0.2.0)

trader_acos — Arcocoseno trigonométrico de vectores

### Descripción

**trader_acos**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el arcocoseno para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_ad

(PECL trader &gt;= 0.2.0)

trader_ad — Línea A/D Chaikin

### Descripción

**trader_ad**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [array](#language.types.array) $volume
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    volume


      Volumen intercambiado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_add

(PECL trader &gt;= 0.2.0)

trader_add — Suma aritmética de vectores

### Descripción

**trader_add**([array](#language.types.array) $real0, [array](#language.types.array) $real1): [array](#language.types.array)

Calcula la suma de vectores de real0 a
real1 y devuelve el vector resultante.

### Parámetros

    real0


      Array de valores reales.






    real1


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_adosc

(PECL trader &gt;= 0.2.0)

trader_adosc — Oscilador A/D Chaikin

### Descripción

**trader_adosc**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [array](#language.types.array) $volume,
    [int](#language.types.integer) $fastPeriod = ?,
    [int](#language.types.integer) $slowPeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    volume


      Volumen intercambiado, array de valores reales.






    fastPeriod


      Número de período para el MA rápido. Intervalo válido: 2 a 100000.






    slowPeriod


      Número de período para el MA. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_adx

(PECL trader &gt;= 0.2.0)

trader_adx — Índice de movimiento direccional medio

### Descripción

**trader_adx**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_adxr

(PECL trader &gt;= 0.2.0)

trader_adxr — Tasación del índice de movimiento direccional medio

### Descripción

**trader_adxr**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_apo

(PECL trader &gt;= 0.2.0)

trader_apo — Oscilador de precio absoluto

### Descripción

**trader_apo**(
    [array](#language.types.array) $real,
    [int](#language.types.integer) $fastPeriod = ?,
    [int](#language.types.integer) $slowPeriod = ?,
    [int](#language.types.integer) $mAType = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    fastPeriod


      Número de período para el MA rápido. Intervalo válido: 2 a 100000.






    slowPeriod


      Número de período para el MA. Intervalo válido: 2 a 100000.






    mAType


      Tipo de media móvil. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_aroon

(PECL trader &gt;= 0.2.0)

trader_aroon — Aroon

### Descripción

**trader_aroon**([array](#language.types.array) $high, [array](#language.types.array) $low, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_aroonosc

(PECL trader &gt;= 0.2.0)

trader_aroonosc — Oscilador Aroon

### Descripción

**trader_aroonosc**([array](#language.types.array) $high, [array](#language.types.array) $low, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_asin

(PECL trader &gt;= 0.2.0)

trader_asin — Arcoseno trigonométrico de vectores

### Descripción

**trader_asin**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el seno para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_atan

(PECL trader &gt;= 0.2.0)

trader_atan — Arcotangente trigonométrica de vectores

### Descripción

**trader_atan**([array](#language.types.array) $real): [array](#language.types.array)

Calcula la arcotangente para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_atr

(PECL trader &gt;= 0.2.0)

trader_atr — Rango verdadero medio

### Descripción

**trader_atr**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_avgprice

(PECL trader &gt;= 0.2.0)

trader_avgprice — Precio medio

### Descripción

**trader_avgprice**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_bbands

(PECL trader &gt;= 0.2.0)

trader_bbands — Bandas de Bollinger

### Descripción

**trader_bbands**(
    [array](#language.types.array) $real,
    [int](#language.types.integer) $timePeriod = ?,
    [float](#language.types.float) $nbDevUp = ?,
    [float](#language.types.float) $nbDevDn = ?,
    [int](#language.types.integer) $mAType = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.






    nbDevUp


      Multiplicador de desviación para la banda superior. Intervalo válido: [TRADER_REAL_MIN](#constant.trader-real-min) a [TRADER_REAL_MAX](#constant.trader-real-max).






    nbDevDn


      Multiplicador de desviación para la banda inferior. Intervalo válido: [TRADER_REAL_MIN](#constant.trader-real-min) a [TRADER_REAL_MAX](#constant.trader-real-max).






    mAType


      Tipo de media móvil. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_beta

(PECL trader &gt;= 0.2.0)

trader_beta — Beta

### Descripción

**trader_beta**([array](#language.types.array) $real0, [array](#language.types.array) $real1, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real0


      Array de valores reales.






    real1


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_bop

(PECL trader &gt;= 0.2.0)

trader_bop — Equilibrio de poder

### Descripción

**trader_bop**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cci

(PECL trader &gt;= 0.2.0)

trader_cci — Índice de Canal de Comodidad

### Descripción

**trader_cci**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl2crows

(PECL trader &gt;= 0.2.0)

trader_cdl2crows — Dos Cuervos

### Descripción

**trader_cdl2crows**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl3blackcrows

(PECL trader &gt;= 0.2.0)

trader_cdl3blackcrows — Tres Cuervos Negros

### Descripción

**trader_cdl3blackcrows**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl3inside

(PECL trader &gt;= 0.2.0)

trader_cdl3inside — Tres Velas Interiores Alcistas/Bajistas

### Descripción

**trader_cdl3inside**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl3linestrike

(PECL trader &gt;= 0.2.0)

trader_cdl3linestrike — Triple Golpe

### Descripción

**trader_cdl3linestrike**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl3outside

(PECL trader &gt;= 0.2.0)

trader_cdl3outside — Tres Velas Exteriores Alcistas/Bajistas

### Descripción

**trader_cdl3outside**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl3starsinsouth

(PECL trader &gt;= 0.2.0)

trader_cdl3starsinsouth — Tres Estrellas en el Sur

### Descripción

**trader_cdl3starsinsouth**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdl3whitesoldiers

(PECL trader &gt;= 0.2.0)

trader_cdl3whitesoldiers — Tres Soldados Blancos Avanzando

### Descripción

**trader_cdl3whitesoldiers**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlabandonedbaby

(PECL trader &gt;= 0.2.0)

trader_cdlabandonedbaby — Bebé Abandonado

### Descripción

**trader_cdlabandonedbaby**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdladvanceblock

(PECL trader &gt;= 0.2.0)

trader_cdladvanceblock — Avance en Bloque

### Descripción

**trader_cdladvanceblock**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlbelthold

(PECL trader &gt;= 0.2.0)

trader_cdlbelthold — Belt-hold

### Descripción

**trader_cdlbelthold**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlbreakaway

(PECL trader &gt;= 0.2.0)

trader_cdlbreakaway — Escape

### Descripción

**trader_cdlbreakaway**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlclosingmarubozu

(PECL trader &gt;= 0.2.0)

trader_cdlclosingmarubozu — Vela Cerrada Marubozu

### Descripción

**trader_cdlclosingmarubozu**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlconcealbabyswall

(PECL trader &gt;= 0.2.0)

trader_cdlconcealbabyswall — Pequeña Golondrina Escondida

### Descripción

**trader_cdlconcealbabyswall**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlcounterattack

(PECL trader &gt;= 0.2.0)

trader_cdlcounterattack — Contraataque

### Descripción

**trader_cdlcounterattack**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdldarkcloudcover

(PECL trader &gt;= 0.2.0)

trader_cdldarkcloudcover — Cubierta de Nube Oscura

### Descripción

**trader_cdldarkcloudcover**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdldoji

(PECL trader &gt;= 0.2.0)

trader_cdldoji — Doji

### Descripción

**trader_cdldoji**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdldojistar

(PECL trader &gt;= 0.2.0)

trader_cdldojistar — Estrella Doji

### Descripción

**trader_cdldojistar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdldragonflydoji

(PECL trader &gt;= 0.2.0)

trader_cdldragonflydoji — Doji Libélula

### Descripción

**trader_cdldragonflydoji**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlengulfing

(PECL trader &gt;= 0.2.0)

trader_cdlengulfing — Patrón envolvente

### Descripción

**trader_cdlengulfing**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdleveningdojistar

(PECL trader &gt;= 0.2.0)

trader_cdleveningdojistar — Estrella Vespertina Doji

### Descripción

**trader_cdleveningdojistar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdleveningstar

(PECL trader &gt;= 0.2.0)

trader_cdleveningstar — Estrella de Atardecer

### Descripción

**trader_cdleveningstar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlgapsidesidewhite

(PECL trader &gt;= 0.2.0)

trader_cdlgapsidesidewhite — Velas blancas paralelas de hueco alcista/bajista

### Descripción

**trader_cdlgapsidesidewhite**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlgravestonedoji

(PECL trader &gt;= 0.2.0)

trader_cdlgravestonedoji — Doji Lápida

### Descripción

**trader_cdlgravestonedoji**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlhammer

(PECL trader &gt;= 0.2.0)

trader_cdlhammer — Martillo

### Descripción

**trader_cdlhammer**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlhangingman

(PECL trader &gt;= 0.2.0)

trader_cdlhangingman — Hombre Colgado

### Descripción

**trader_cdlhangingman**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlharami

(PECL trader &gt;= 0.2.0)

trader_cdlharami — Patrón Harami

### Descripción

**trader_cdlharami**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlharamicross

(PECL trader &gt;= 0.2.0)

trader_cdlharamicross — Patrón Cruz Harami

### Descripción

**trader_cdlharamicross**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlhighwave

(PECL trader &gt;= 0.2.0)

trader_cdlhighwave — Vela de Onda Alta

### Descripción

**trader_cdlhighwave**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlhikkake

(PECL trader &gt;= 0.2.0)

trader_cdlhikkake — Patrón Hikkake

### Descripción

**trader_cdlhikkake**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlhikkakemod

(PECL trader &gt;= 0.2.0)

trader_cdlhikkakemod — Patrón Hikkake Modificado

### Descripción

**trader_cdlhikkakemod**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlhomingpigeon

(PECL trader &gt;= 0.2.0)

trader_cdlhomingpigeon — Paloma Mensajera

### Descripción

**trader_cdlhomingpigeon**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlidentical3crows

(PECL trader &gt;= 0.2.0)

trader_cdlidentical3crows — Tres Cuervos Idénticos

### Descripción

**trader_cdlidentical3crows**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlinneck

(PECL trader &gt;= 0.2.0)

trader_cdlinneck — Patrón Formación en el cuello

### Descripción

**trader_cdlinneck**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlinvertedhammer

(PECL trader &gt;= 0.2.0)

trader_cdlinvertedhammer — Martilllo Invertido

### Descripción

**trader_cdlinvertedhammer**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlkicking

(PECL trader &gt;= 0.2.0)

trader_cdlkicking — Patada

### Descripción

**trader_cdlkicking**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlkickingbylength

(PECL trader &gt;= 0.2.0)

trader_cdlkickingbylength — Patada - alza/baja determinada por el marubozu más largo

### Descripción

**trader_cdlkickingbylength**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlladderbottom

(PECL trader &gt;= 0.2.0)

trader_cdlladderbottom — Suelo de escalera

### Descripción

**trader_cdlladderbottom**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdllongleggeddoji

(PECL trader &gt;= 0.2.0)

trader_cdllongleggeddoji — Doji Zancudo

### Descripción

**trader_cdllongleggeddoji**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdllongline

(PECL trader &gt;= 0.2.0)

trader_cdllongline — Vela de Línea Larga

### Descripción

**trader_cdllongline**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlmarubozu

(PECL trader &gt;= 0.2.0)

trader_cdlmarubozu — Marubozu

### Descripción

**trader_cdlmarubozu**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlmatchinglow

(PECL trader &gt;= 0.2.0)

trader_cdlmatchinglow — Mínimos coincidentes

### Descripción

**trader_cdlmatchinglow**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlmathold

(PECL trader &gt;= 0.2.0)

trader_cdlmathold — Mat Hold

### Descripción

**trader_cdlmathold**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlmorningdojistar

(PECL trader &gt;= 0.2.0)

trader_cdlmorningdojistar — Lucero del Alba Doji

### Descripción

**trader_cdlmorningdojistar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlmorningstar

(PECL trader &gt;= 0.2.0)

trader_cdlmorningstar — Lucero del Alba

### Descripción

**trader_cdlmorningstar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [float](#language.types.float) $penetration = ?
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    penetration


      Porcentaje de penetración de una vela en otra vela.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlonneck

(PECL trader &gt;= 0.2.0)

trader_cdlonneck — Patrón Sobre el cuello

### Descripción

**trader_cdlonneck**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlpiercing

(PECL trader &gt;= 0.2.0)

trader_cdlpiercing — Patrón penetrante

### Descripción

**trader_cdlpiercing**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlrickshawman

(PECL trader &gt;= 0.2.0)

trader_cdlrickshawman — Calesero

### Descripción

**trader_cdlrickshawman**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlrisefall3methods

(PECL trader &gt;= 0.2.0)

trader_cdlrisefall3methods — Triple Formación Alcista/Bajista

### Descripción

**trader_cdlrisefall3methods**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlseparatinglines

(PECL trader &gt;= 0.2.0)

trader_cdlseparatinglines — Lineas Separadas

### Descripción

**trader_cdlseparatinglines**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlshootingstar

(PECL trader &gt;= 0.2.0)

trader_cdlshootingstar — Estrella Fugaz

### Descripción

**trader_cdlshootingstar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlshortline

(PECL trader &gt;= 0.2.0)

trader_cdlshortline — Vela de Línea Corta

### Descripción

**trader_cdlshortline**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlspinningtop

(PECL trader &gt;= 0.2.0)

trader_cdlspinningtop — Peonza

### Descripción

**trader_cdlspinningtop**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlstalledpattern

(PECL trader &gt;= 0.2.0)

trader_cdlstalledpattern — Patrón Añejo

### Descripción

**trader_cdlstalledpattern**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlsticksandwich

(PECL trader &gt;= 0.2.0)

trader_cdlsticksandwich — Bocadillo

### Descripción

**trader_cdlsticksandwich**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdltakuri

(PECL trader &gt;= 0.2.0)

trader_cdltakuri — Takuri (Libélula Doji con sombra muy larga)

### Descripción

**trader_cdltakuri**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdltasukigap

(PECL trader &gt;= 0.2.0)

trader_cdltasukigap — Hueco Tasuki

### Descripción

**trader_cdltasukigap**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlthrusting

(PECL trader &gt;= 0.2.0)

trader_cdlthrusting — Patrón de empuje

### Descripción

**trader_cdlthrusting**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdltristar

(PECL trader &gt;= 0.2.0)

trader_cdltristar — Patrón de tres estrellas

### Descripción

**trader_cdltristar**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlunique3river

(PECL trader &gt;= 0.2.0)

trader_cdlunique3river — Tres ríos únicos

### Descripción

**trader_cdlunique3river**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlupsidegap2crows

(PECL trader &gt;= 0.2.0)

trader_cdlupsidegap2crows — Dos Cuervos tras un Huevo al Alza

### Descripción

**trader_cdlupsidegap2crows**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cdlxsidegap3methods

(PECL trader &gt;= 0.2.0)

trader_cdlxsidegap3methods — Métodos de Tres Huevos al Alza/Baja

### Descripción

**trader_cdlxsidegap3methods**(
    [array](#language.types.array) $open,
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close
): [array](#language.types.array)

### Parámetros

    open


      Precio abierto, array de valores reales.






    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_ceil

(PECL trader &gt;= 0.2.0)

trader_ceil — Redondeo hacia arriba de vectores

### Descripción

**trader_ceil**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el siguiente entero mayor para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cmo

(PECL trader &gt;= 0.2.0)

trader_cmo — Oscilador de momento de Chande

### Descripción

**trader_cmo**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_correl

(PECL trader &gt;= 0.2.0)

trader_correl — Coeficiente de correlación de Pearson (r)

### Descripción

**trader_correl**([array](#language.types.array) $real0, [array](#language.types.array) $real1, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real0


      Array de valores reales.






    real1


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cos

(PECL trader &gt;= 0.2.0)

trader_cos — Coseno trigonométrico de vectores

### Descripción

**trader_cos**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el coseno para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_cosh

(PECL trader &gt;= 0.2.0)

trader_cosh — Coseno hiperbólico de un vector

### Descripción

**trader_cosh**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el coseno hiperbólico para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_dema

(PECL trader &gt;= 0.2.0)

trader_dema — Media móvil exponencial doble

### Descripción

**trader_dema**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_div

(PECL trader &gt;= 0.2.0)

trader_div — División aritmética de vectores

### Descripción

**trader_div**([array](#language.types.array) $real0, [array](#language.types.array) $real1): [array](#language.types.array)

Divide cada valor de real0 por el valor
correspondiente de real1 y devuelve el array resultante.

### Parámetros

    real0


      Array de valores reales.






    real1


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de fallo.

# trader_dx

(PECL trader &gt;= 0.2.0)

trader_dx — Índice de movimiento direccional

### Descripción

**trader_dx**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ema

(PECL trader &gt;= 0.2.0)

trader_ema — Media móvil exponencial

### Descripción

**trader_ema**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_errno

(PECL trader &gt;= 0.3.0)

trader_errno — Obtener el código de error

### Descripción

**trader_errno**(): [int](#language.types.integer)

Obtener el código de error de la última operación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de error identificado por una de las constantes [TRADER*ERR*\*](#trader.constants).

# trader_exp

(PECL trader &gt;= 0.2.0)

trader_exp — Exponencial aritmética de vectores

### Descripción

**trader_exp**([array](#language.types.array) $real): [array](#language.types.array)

Calcula **[e](#constant.e)** elevado a la potencia de cada valor de real. Devuelve un array con los datos calculados.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_floor

(PECL trader &gt;= 0.2.0)

trader_floor — Redondeo hacia abajo de vectores

### Descripción

**trader_floor**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el siguiente entero menor para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_get_compat

(PECL trader &gt;= 0.2.2)

trader_get_compat — Obtiene el modo de compatibilidad

### Descripción

**trader_get_compat**(): [int](#language.types.integer)

Obtiene el modo de compatibilidad que afecta a la forma de realizar los cálculos de todas las funciones de la extensión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el id del modo de compatibilidad que puede ser identificado por la serie de constantes de [TRADER*COMPATIBILITY*\*](#trader.constants).

# trader_get_unstable_period

(PECL trader &gt;= 0.2.2)

trader_get_unstable_period — Obtiene el periodo inestable

### Descripción

**trader_get_unstable_period**([int](#language.types.integer) $functionId): [int](#language.types.integer)

Obtiene el factor de periodo inestable para una función en particular.

### Parámetros

    functionId


      El ID de la función por la que leer el factor. Se debería usar la serie de constantes TRADER_FUNC_UNST_*.


### Valores devueltos

Devuelve el factor del periodo inestable para la función correspondiente.

# trader_ht_dcperiod

(PECL trader &gt;= 0.2.0)

trader_ht_dcperiod — Transformación de Hilbert - Período de ciclo dominante

### Descripción

**trader_ht_dcperiod**([array](#language.types.array) $real): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ht_dcphase

(PECL trader &gt;= 0.2.0)

trader_ht_dcphase — Transformación de Hilbert - Fase de ciclo dominante

### Descripción

**trader_ht_dcphase**([array](#language.types.array) $real): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ht_phasor

(PECL trader &gt;= 0.2.0)

trader_ht_phasor — Transformación de Hilbert - Componentes de un fasor

### Descripción

**trader_ht_phasor**([array](#language.types.array) $real): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ht_sine

(PECL trader &gt;= 0.2.0)

trader_ht_sine — Transformación de Hilbert - Sinusoide

### Descripción

**trader_ht_sine**([array](#language.types.array) $real): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ht_trendline

(PECL trader &gt;= 0.2.0)

trader_ht_trendline — Transformación de Hilbert - Línea de tendencia instantánea

### Descripción

**trader_ht_trendline**([array](#language.types.array) $real): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ht_trendmode

(PECL trader &gt;= 0.2.0)

trader_ht_trendmode — Transformación de Hilbert - Tendencia vs Modo de ciclo

### Descripción

**trader_ht_trendmode**([array](#language.types.array) $real): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_kama

(PECL trader &gt;= 0.2.0)

trader_kama — Media móvil adaptativa de Kaufman

### Descripción

**trader_kama**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_linearreg

(PECL trader &gt;= 0.2.0)

trader_linearreg — Regresión lineal

### Descripción

**trader_linearreg**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_linearreg_angle

(PECL trader &gt;= 0.2.0)

trader_linearreg_angle — Ángulo de regresión lineal

### Descripción

**trader_linearreg_angle**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_linearreg_intercept

(PECL trader &gt;= 0.2.0)

trader_linearreg_intercept — Intercepción de regresión lineal

### Descripción

**trader_linearreg_intercept**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_linearreg_slope

(PECL trader &gt;= 0.2.0)

trader_linearreg_slope — Pendiente de regresión lineal

### Descripción

**trader_linearreg_slope**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ln

(PECL trader &gt;= 0.2.0)

trader_ln — Logaritmo natural de vectores

### Descripción

**trader_ln**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el logaritmo natural para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_log10

(PECL trader &gt;= 0.2.0)

trader_log10 — Logaritmo en base 10 de vectores

### Descripción

**trader_log10**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el logaritmo en base 10 para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ma

(PECL trader &gt;= 0.2.0)

trader_ma — Media móvil

### Descripción

**trader_ma**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?, [int](#language.types.integer) $mAType = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.






    mAType


      Tipo de media móvil. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_macd

(PECL trader &gt;= 0.2.0)

trader_macd — Convergencia/divergencia de la media móvil

### Descripción

**trader_macd**(
    [array](#language.types.array) $real,
    [int](#language.types.integer) $fastPeriod = ?,
    [int](#language.types.integer) $slowPeriod = ?,
    [int](#language.types.integer) $signalPeriod = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    fastPeriod


      Número de período para el MA rápido. Intervalo válido: 2 a 100000.






    slowPeriod


      Número de período para el MA. Intervalo válido: 2 a 100000.






    signalPeriod


      Suavizado de la línea de señal (número de período). Intervalo válido: 1 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_macdext

(PECL trader &gt;= 0.2.0)

trader_macdext — MACD con tipo MA controlable

### Descripción

**trader_macdext**(
    [array](#language.types.array) $real,
    [int](#language.types.integer) $fastPeriod = ?,
    [int](#language.types.integer) $fastMAType = ?,
    [int](#language.types.integer) $slowPeriod = ?,
    [int](#language.types.integer) $slowMAType = ?,
    [int](#language.types.integer) $signalPeriod = ?,
    [int](#language.types.integer) $signalMAType = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    fastPeriod


      Número de período para el MA rápido. Intervalo válido: 2 a 100000.






    fastMAType


      Tipo de media móvil para MA rápido. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.






    slowPeriod


      Número de período para el MA. Intervalo válido: 2 a 100000.






    slowMAType


      Tipo de media móvil para MA lento. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.






    signalPeriod


      Suavizado de la línea de señal (número de período). Intervalo válido: 1 a 100000.






    signalMAType


      Tipo de media móvil para la línea de señal. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_macdfix

(PECL trader &gt;= 0.2.0)

trader_macdfix — Convergencia/divergencia fija 12/26 de la media móvil

### Descripción

**trader_macdfix**([array](#language.types.array) $real, [int](#language.types.integer) $signalPeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    signalPeriod


      Suavizado de la línea de señal (número de período). Intervalo válido: 1 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_mama

(PECL trader &gt;= 0.2.0)

trader_mama — Media móvil adaptativa MESA

### Descripción

**trader_mama**([array](#language.types.array) $real, [float](#language.types.float) $fastLimit = ?, [float](#language.types.float) $slowLimit = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    fastLimit


      Límite superior del algoritmo adaptativo. Intervalo válido: 0.01 a 0.99.






    slowLimit


      Límite inferior del algoritmo adaptativo. Intervalo válido: 0.01 a 0.99.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_mavp

(PECL trader &gt;= 0.2.0)

trader_mavp — Media móvil con periodo variable

### Descripción

**trader_mavp**(
    [array](#language.types.array) $real,
    [array](#language.types.array) $periods,
    [int](#language.types.integer) $minPeriod = ?,
    [int](#language.types.integer) $maxPeriod = ?,
    [int](#language.types.integer) $mAType = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    periods


      Array de valores reales.






    minPeriod


      Un valor inferior al mínimo será modificado a la período mínimo. Intervalo válido: 2 a 100000






    maxPeriod


      Un valor superior al mínimo será modificado a la período máximo. Intervalo válido: 2 a 100000






    mAType


      Tipo de media móvil. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_max

(PECL trader &gt;= 0.2.0)

trader_max — Valor mayor sobre un periodo especificado

### Descripción

**trader_max**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_maxindex

(PECL trader &gt;= 0.2.0)

trader_maxindex — Índice del valor mayor sobre un periodo especificado

### Descripción

**trader_maxindex**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_medprice

(PECL trader &gt;= 0.2.0)

trader_medprice — Precio medio

### Descripción

**trader_medprice**([array](#language.types.array) $high, [array](#language.types.array) $low): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_mfi

(PECL trader &gt;= 0.2.0)

trader_mfi — Índice de flujo de dinero

### Descripción

**trader_mfi**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [array](#language.types.array) $volume,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    volume


      Volumen intercambiado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_midpoint

(PECL trader &gt;= 0.2.0)

trader_midpoint — Punto medio sobre un periodo

### Descripción

**trader_midpoint**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_midprice

(PECL trader &gt;= 0.2.0)

trader_midprice — Precio de punto medio sobre un periodo

### Descripción

**trader_midprice**([array](#language.types.array) $high, [array](#language.types.array) $low, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_min

(PECL trader &gt;= 0.2.0)

trader_min — Valor más bajo sobre un periodo especificado

### Descripción

**trader_min**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_minindex

(PECL trader &gt;= 0.2.0)

trader_minindex — Índice del valor más bajo sobre un periodo especificado

### Descripción

**trader_minindex**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_minmax

(PECL trader &gt;= 0.2.0)

trader_minmax — Valores más altos y bajos sobre un periodo especificado

### Descripción

**trader_minmax**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_minmaxindex

(PECL trader &gt;= 0.2.0)

trader_minmaxindex — Índices de los valores más bajos y altos sobre un periodo especificado

### Descripción

**trader_minmaxindex**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_minus_di

(PECL trader &gt;= 0.2.0)

trader_minus_di — Indicador direccional menos

### Descripción

**trader_minus_di**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_minus_dm

(PECL trader &gt;= 0.2.0)

trader_minus_dm — Movimiento direccional menos

### Descripción

**trader_minus_dm**([array](#language.types.array) $high, [array](#language.types.array) $low, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_mom

(PECL trader &gt;= 0.2.0)

trader_mom — Momentum

### Descripción

**trader_mom**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_mult

(PECL trader &gt;= 0.2.0)

trader_mult — Multiplicación aritmética de vectores

### Descripción

**trader_mult**([array](#language.types.array) $real0, [array](#language.types.array) $real1): [array](#language.types.array)

Calcula el producto escalar de real0 con
real1 y devuelve el vector resultante.

### Parámetros

    real0


      Array de valores reales.






    real1


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_natr

(PECL trader &gt;= 0.2.0)

trader_natr — Rango verdadero de la media normalizada

### Descripción

**trader_natr**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_obv

(PECL trader &gt;= 0.2.0)

trader_obv — Volumen sobre balance

### Descripción

**trader_obv**([array](#language.types.array) $real, [array](#language.types.array) $volume): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    volume


      Volumen intercambiado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_plus_di

(PECL trader &gt;= 0.2.0)

trader_plus_di — Indicador direccional más

### Descripción

**trader_plus_di**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_plus_dm

(PECL trader &gt;= 0.2.0)

trader_plus_dm — Movimiento direccional más

### Descripción

**trader_plus_dm**([array](#language.types.array) $high, [array](#language.types.array) $low, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ppo

(PECL trader &gt;= 0.2.0)

trader_ppo — Oscilador de precio porcentual

### Descripción

**trader_ppo**(
    [array](#language.types.array) $real,
    [int](#language.types.integer) $fastPeriod = ?,
    [int](#language.types.integer) $slowPeriod = ?,
    [int](#language.types.integer) $mAType = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    fastPeriod


      Número de período para el MA rápido. Intervalo válido: 2 a 100000.






    slowPeriod


      Número de período para el MA. Intervalo válido: 2 a 100000.






    mAType


      Tipo de media móvil. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_roc

(PECL trader &gt;= 0.2.0)

trader_roc — Ritmo de cambio : ((precio/precioAnterior)-1)\*100

### Descripción

**trader_roc**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_rocp

(PECL trader &gt;= 0.2.0)

trader_rocp — Porcentaje del ritmo de cabio: (precio-precioAnterior)/precioAnterior

### Descripción

**trader_rocp**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_rocr

(PECL trader &gt;= 0.2.0)

trader_rocr — Ratio del ritmo de cambio: (precio/precioAnterior)

### Descripción

**trader_rocr**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_rocr100

(PECL trader &gt;= 0.2.0)

trader_rocr100 — Ratio del ritmo de cambio en escala 100: (precio/precioAnterior)\*100

### Descripción

**trader_rocr100**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_rsi

(PECL trader &gt;= 0.2.0)

trader_rsi — Índice de fuerza relativa

### Descripción

**trader_rsi**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sar

(PECL trader &gt;= 0.2.0)

trader_sar — Sistema parabólico

### Descripción

**trader_sar**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [float](#language.types.float) $acceleration = ?,
    [float](#language.types.float) $maximum = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    acceleration


      Factor de aceleración usado hasta el valor máximo. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    maximum


      Valor máximo del factor de aceleración. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sarext

(PECL trader &gt;= 0.2.0)

trader_sarext — Sistema parabólico - Extendido

### Descripción

**trader_sarext**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [float](#language.types.float) $startValue = ?,
    [float](#language.types.float) $offsetOnReverse = ?,
    [float](#language.types.float) $accelerationInitLong = ?,
    [float](#language.types.float) $accelerationLong = ?,
    [float](#language.types.float) $accelerationMaxLong = ?,
    [float](#language.types.float) $accelerationInitShort = ?,
    [float](#language.types.float) $accelerationShort = ?,
    [float](#language.types.float) $accelerationMaxShort = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    startValue


      Valor inicial y dirección. 0 para Auto, &gt;0 para Long, &lt;0 para Short. Rango válido de [TRADER_REAL_MIN](#constant.trader-real-min) hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    offsetOnReverse


      Índice de porcentaje añadido/eliminado a la parada inicial sobre el reverso short/long reversal. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    accelerationInitLong


      Valor inicial del factor de aceleración para la dirección Long. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    accelerationLong


      Factor de acelereción para la dirección Long. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    accelerationMaxLong


      Valor máximo del factor de aceleración para la dirección Long. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    accelerationInitShort


      Valor inicial del factor de aceleración para la dirección Short. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    accelerationShort


      Factor de aceleración para la dirección Short. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).






    accelerationMaxShort


      Valor máximo del factor de aceleración para la dirección Short. Rango válido de 0 hasta [TRADER_REAL_MAX](#constant.trader-real-max).


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_set_compat

(PECL trader &gt;= 0.2.2)

trader_set_compat — Establece el modo de compatibilidad

### Descripción

**trader_set_compat**([int](#language.types.integer) $compatId): [void](language.types.void.html)

Establece el modo de compatibilidad que afectará a la forma de realizar los cálculos de todas las funciones de la extensión.

### Parámetros

    compatId


      El ID de compatibilidad. Debería usarse la serie de constantes [TRADER_COMPATIBILITY_*](#trader.constants).


### Valores devueltos

No se retorna ningún valor.

# trader_set_unstable_period

(PECL trader &gt;= 0.2.2)

trader_set_unstable_period — Establece el periodo inestable

### Descripción

**trader_set_unstable_period**([int](#language.types.integer) $functionId, [int](#language.types.integer) $timePeriod): [void](language.types.void.html)

Factor de periodos inestables de influencia para funciones, las cuales son sensibles a él. Se puede encontrar más información sobre periodos inestables en la página de la documentación de la API [» TA-Lib](https://ta-lib.org/api/?h=unstable#Unstable+Period).

### Parámetros

    functionId


      El ID de la función para la cual debería establecerse el factor. Se pueden usar la serie de constantes TRADER_FUNC_UNST_* para afectar a la función correspondiente.






    timePeriod


      El valor de periodo inestable.


### Valores devueltos

No se retorna ningún valor.

# trader_sin

(PECL trader &gt;= 0.2.0)

trader_sin — Seno trigonométrico de vectores

### Descripción

**trader_sin**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el seno para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sinh

(PECL trader &gt;= 0.2.0)

trader_sinh — Seno hiperbólico de vectores

### Descripción

**trader_sinh**([array](#language.types.array) $real): [array](#language.types.array)

Calcula el seno hiperbólico para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sma

(PECL trader &gt;= 0.2.0)

trader_sma — Media móvil simple

### Descripción

**trader_sma**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sqrt

(PECL trader &gt;= 0.2.0)

trader_sqrt — Raíz cuadrada de vectores

### Descripción

**trader_sqrt**([array](#language.types.array) $real): [array](#language.types.array)

Calcula la raíz cuadrada de cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_stddev

(PECL trader &gt;= 0.2.0)

trader_stddev — Desviación estándar

### Descripción

**trader_stddev**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?, [float](#language.types.float) $nbDev = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.






    nbDev





### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_stoch

(PECL trader &gt;= 0.2.0)

trader_stoch — Estocástico

### Descripción

**trader_stoch**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $fastK_Period = ?,
    [int](#language.types.integer) $slowK_Period = ?,
    [int](#language.types.integer) $slowK_MAType = ?,
    [int](#language.types.integer) $slowD_Period = ?,
    [int](#language.types.integer) $slowD_MAType = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    fastK_Period


      Período de tiempo para construir la línea Fast-K. Intervalo válido: 1 a 100000.






    slowK_Period


      Suavizado para realizar la línea Slow-K. Intervalo válido: 1 a 100000, habitualmente definido a 3.






    slowK_MAType


      Tipo de media móvil para Slow-K. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.






    slowD_Period


      Suavizado para realizar la línea Slow-D. Intervalo válido: 1 a 100000.






    slowD_MAType


      Tipo de media móvil para Slow-D. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_stochf

(PECL trader &gt;= 0.2.0)

trader_stochf — Estocástico rápido

### Descripción

**trader_stochf**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $fastK_Period = ?,
    [int](#language.types.integer) $fastD_Period = ?,
    [int](#language.types.integer) $fastD_MAType = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    fastK_Period


      Período de tiempo para construir la línea Fast-K. Intervalo válido: 1 a 100000.






    fastD_Period


      Suavizado para realizar la línea Fast-D. Intervalo válido: 1 a 100000, habitualmente definido a 3.






    fastD_MAType


      Tipo de media móvil para Fast-D. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_stochrsi

(PECL trader &gt;= 0.2.0)

trader_stochrsi — Índice de fuerza relativa estocástica

### Descripción

**trader_stochrsi**(
    [array](#language.types.array) $real,
    [int](#language.types.integer) $timePeriod = ?,
    [int](#language.types.integer) $fastK_Period = ?,
    [int](#language.types.integer) $fastD_Period = ?,
    [int](#language.types.integer) $fastD_MAType = ?
): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.






    fastK_Period


      Período de tiempo para construir la línea Fast-K. Intervalo válido: 1 a 100000.






    fastD_Period


      Suavizado para realizar la línea Fast-D. Intervalo válido: 1 a 100000, habitualmente definido a 3.






    fastD_MAType


      Tipo de media móvil para Fast-D. Una constante de la serie [TRADER_MA_TYPE_*](#trader.constants) debe ser utilizada.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sub

(PECL trader &gt;= 0.2.0)

trader_sub — Sustracción artimética de vectores

### Descripción

**trader_sub**([array](#language.types.array) $real0, [array](#language.types.array) $real1): [array](#language.types.array)

Calcula la suma de vectores de real1 desde
real0 y devuelve el vector resultante.

### Parámetros

    real0


      Array de valores reales.






    real1


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_sum

(PECL trader &gt;= 0.2.0)

trader_sum — Sumatorio

### Descripción

**trader_sum**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_t3

(PECL trader &gt;= 0.2.0)

trader_t3 — Media móvil exponencial triple (T3)

### Descripción

**trader_t3**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?, [float](#language.types.float) $vFactor = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.






    vFactor


      Factor de volumen. Intervalo válido: 1 a 0.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_tan

(PECL trader &gt;= 0.2.0)

trader_tan — Tangente trigonométrica de vectores

### Descripción

**trader_tan**([array](#language.types.array) $real): [array](#language.types.array)

Calcula la tangente para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_tanh

(PECL trader &gt;= 0.2.0)

trader_tanh — Tangente hiperbólica trigonométrica de vectores

### Descripción

**trader_tanh**([array](#language.types.array) $real): [array](#language.types.array)

Calcula la tangente hiperbólica para cada valor de
real y devuelve el array resultante.

### Parámetros

    real


      Array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_tema

(PECL trader &gt;= 0.2.0)

trader_tema — Media móvil exponencial triple

### Descripción

**trader_tema**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_trange

(PECL trader &gt;= 0.2.0)

trader_trange — Rango verdadero

### Descripción

**trader_trange**([array](#language.types.array) $high, [array](#language.types.array) $low, [array](#language.types.array) $close): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_trima

(PECL trader &gt;= 0.2.0)

trader_trima — Media móvil triangular

### Descripción

**trader_trima**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_trix

(PECL trader &gt;= 0.2.0)

trader_trix — Ritmo de cambio de 1 día (RDC) de una MME suave triple

### Descripción

**trader_trix**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_tsf

(PECL trader &gt;= 0.2.0)

trader_tsf — Previsión de series de tiempo

### Descripción

**trader_tsf**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_typprice

(PECL trader &gt;= 0.2.0)

trader_typprice — Precio típico

### Descripción

**trader_typprice**([array](#language.types.array) $high, [array](#language.types.array) $low, [array](#language.types.array) $close): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_ultosc

(PECL trader &gt;= 0.2.0)

trader_ultosc — Oscilador final

### Descripción

**trader_ultosc**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod1 = ?,
    [int](#language.types.integer) $timePeriod2 = ?,
    [int](#language.types.integer) $timePeriod3 = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod1


      Número de barras para el primer periodo. Rango válido de 1 hasta 100000.






    timePeriod2


      Número de barras para el segundo periodo. Rango válido de 1 hasta 100000.






    timePeriod3


      Número de barras para el tercer periodo. Rango válido de 1 hasta 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_var

(PECL trader &gt;= 0.2.0)

trader_var — Varianza

### Descripción

**trader_var**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?, [float](#language.types.float) $nbDev = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.






    nbDev





### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_wclprice

(PECL trader &gt;= 0.2.0)

trader_wclprice — Precio de cierre ponderado

### Descripción

**trader_wclprice**([array](#language.types.array) $high, [array](#language.types.array) $low, [array](#language.types.array) $close): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_willr

(PECL trader &gt;= 0.2.0)

trader_willr — %R de Williams

### Descripción

**trader_willr**(
    [array](#language.types.array) $high,
    [array](#language.types.array) $low,
    [array](#language.types.array) $close,
    [int](#language.types.integer) $timePeriod = ?
): [array](#language.types.array)

### Parámetros

    high


      Precio alto, array de valores reales.






    low


      Precio bajo, array de valores reales.






    close


      Precio cerrado, array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

# trader_wma

(PECL trader &gt;= 0.2.0)

trader_wma — Media móvil ponderada

### Descripción

**trader_wma**([array](#language.types.array) $real, [int](#language.types.integer) $timePeriod = ?): [array](#language.types.array)

### Parámetros

    real


      Array de valores reales.






    timePeriod


      Número de período. Intervalo válido: 2 a 100000.


### Valores devueltos

Devuelve un array con los datos calculados o false en caso de error.

## Tabla de contenidos

- [trader_acos](#function.trader-acos) — Arcocoseno trigonométrico de vectores
- [trader_ad](#function.trader-ad) — Línea A/D Chaikin
- [trader_add](#function.trader-add) — Suma aritmética de vectores
- [trader_adosc](#function.trader-adosc) — Oscilador A/D Chaikin
- [trader_adx](#function.trader-adx) — Índice de movimiento direccional medio
- [trader_adxr](#function.trader-adxr) — Tasación del índice de movimiento direccional medio
- [trader_apo](#function.trader-apo) — Oscilador de precio absoluto
- [trader_aroon](#function.trader-aroon) — Aroon
- [trader_aroonosc](#function.trader-aroonosc) — Oscilador Aroon
- [trader_asin](#function.trader-asin) — Arcoseno trigonométrico de vectores
- [trader_atan](#function.trader-atan) — Arcotangente trigonométrica de vectores
- [trader_atr](#function.trader-atr) — Rango verdadero medio
- [trader_avgprice](#function.trader-avgprice) — Precio medio
- [trader_bbands](#function.trader-bbands) — Bandas de Bollinger
- [trader_beta](#function.trader-beta) — Beta
- [trader_bop](#function.trader-bop) — Equilibrio de poder
- [trader_cci](#function.trader-cci) — Índice de Canal de Comodidad
- [trader_cdl2crows](#function.trader-cdl2crows) — Dos Cuervos
- [trader_cdl3blackcrows](#function.trader-cdl3blackcrows) — Tres Cuervos Negros
- [trader_cdl3inside](#function.trader-cdl3inside) — Tres Velas Interiores Alcistas/Bajistas
- [trader_cdl3linestrike](#function.trader-cdl3linestrike) — Triple Golpe
- [trader_cdl3outside](#function.trader-cdl3outside) — Tres Velas Exteriores Alcistas/Bajistas
- [trader_cdl3starsinsouth](#function.trader-cdl3starsinsouth) — Tres Estrellas en el Sur
- [trader_cdl3whitesoldiers](#function.trader-cdl3whitesoldiers) — Tres Soldados Blancos Avanzando
- [trader_cdlabandonedbaby](#function.trader-cdlabandonedbaby) — Bebé Abandonado
- [trader_cdladvanceblock](#function.trader-cdladvanceblock) — Avance en Bloque
- [trader_cdlbelthold](#function.trader-cdlbelthold) — Belt-hold
- [trader_cdlbreakaway](#function.trader-cdlbreakaway) — Escape
- [trader_cdlclosingmarubozu](#function.trader-cdlclosingmarubozu) — Vela Cerrada Marubozu
- [trader_cdlconcealbabyswall](#function.trader-cdlconcealbabyswall) — Pequeña Golondrina Escondida
- [trader_cdlcounterattack](#function.trader-cdlcounterattack) — Contraataque
- [trader_cdldarkcloudcover](#function.trader-cdldarkcloudcover) — Cubierta de Nube Oscura
- [trader_cdldoji](#function.trader-cdldoji) — Doji
- [trader_cdldojistar](#function.trader-cdldojistar) — Estrella Doji
- [trader_cdldragonflydoji](#function.trader-cdldragonflydoji) — Doji Libélula
- [trader_cdlengulfing](#function.trader-cdlengulfing) — Patrón envolvente
- [trader_cdleveningdojistar](#function.trader-cdleveningdojistar) — Estrella Vespertina Doji
- [trader_cdleveningstar](#function.trader-cdleveningstar) — Estrella de Atardecer
- [trader_cdlgapsidesidewhite](#function.trader-cdlgapsidesidewhite) — Velas blancas paralelas de hueco alcista/bajista
- [trader_cdlgravestonedoji](#function.trader-cdlgravestonedoji) — Doji Lápida
- [trader_cdlhammer](#function.trader-cdlhammer) — Martillo
- [trader_cdlhangingman](#function.trader-cdlhangingman) — Hombre Colgado
- [trader_cdlharami](#function.trader-cdlharami) — Patrón Harami
- [trader_cdlharamicross](#function.trader-cdlharamicross) — Patrón Cruz Harami
- [trader_cdlhighwave](#function.trader-cdlhighwave) — Vela de Onda Alta
- [trader_cdlhikkake](#function.trader-cdlhikkake) — Patrón Hikkake
- [trader_cdlhikkakemod](#function.trader-cdlhikkakemod) — Patrón Hikkake Modificado
- [trader_cdlhomingpigeon](#function.trader-cdlhomingpigeon) — Paloma Mensajera
- [trader_cdlidentical3crows](#function.trader-cdlidentical3crows) — Tres Cuervos Idénticos
- [trader_cdlinneck](#function.trader-cdlinneck) — Patrón Formación en el cuello
- [trader_cdlinvertedhammer](#function.trader-cdlinvertedhammer) — Martilllo Invertido
- [trader_cdlkicking](#function.trader-cdlkicking) — Patada
- [trader_cdlkickingbylength](#function.trader-cdlkickingbylength) — Patada - alza/baja determinada por el marubozu más largo
- [trader_cdlladderbottom](#function.trader-cdlladderbottom) — Suelo de escalera
- [trader_cdllongleggeddoji](#function.trader-cdllongleggeddoji) — Doji Zancudo
- [trader_cdllongline](#function.trader-cdllongline) — Vela de Línea Larga
- [trader_cdlmarubozu](#function.trader-cdlmarubozu) — Marubozu
- [trader_cdlmatchinglow](#function.trader-cdlmatchinglow) — Mínimos coincidentes
- [trader_cdlmathold](#function.trader-cdlmathold) — Mat Hold
- [trader_cdlmorningdojistar](#function.trader-cdlmorningdojistar) — Lucero del Alba Doji
- [trader_cdlmorningstar](#function.trader-cdlmorningstar) — Lucero del Alba
- [trader_cdlonneck](#function.trader-cdlonneck) — Patrón Sobre el cuello
- [trader_cdlpiercing](#function.trader-cdlpiercing) — Patrón penetrante
- [trader_cdlrickshawman](#function.trader-cdlrickshawman) — Calesero
- [trader_cdlrisefall3methods](#function.trader-cdlrisefall3methods) — Triple Formación Alcista/Bajista
- [trader_cdlseparatinglines](#function.trader-cdlseparatinglines) — Lineas Separadas
- [trader_cdlshootingstar](#function.trader-cdlshootingstar) — Estrella Fugaz
- [trader_cdlshortline](#function.trader-cdlshortline) — Vela de Línea Corta
- [trader_cdlspinningtop](#function.trader-cdlspinningtop) — Peonza
- [trader_cdlstalledpattern](#function.trader-cdlstalledpattern) — Patrón Añejo
- [trader_cdlsticksandwich](#function.trader-cdlsticksandwich) — Bocadillo
- [trader_cdltakuri](#function.trader-cdltakuri) — Takuri (Libélula Doji con sombra muy larga)
- [trader_cdltasukigap](#function.trader-cdltasukigap) — Hueco Tasuki
- [trader_cdlthrusting](#function.trader-cdlthrusting) — Patrón de empuje
- [trader_cdltristar](#function.trader-cdltristar) — Patrón de tres estrellas
- [trader_cdlunique3river](#function.trader-cdlunique3river) — Tres ríos únicos
- [trader_cdlupsidegap2crows](#function.trader-cdlupsidegap2crows) — Dos Cuervos tras un Huevo al Alza
- [trader_cdlxsidegap3methods](#function.trader-cdlxsidegap3methods) — Métodos de Tres Huevos al Alza/Baja
- [trader_ceil](#function.trader-ceil) — Redondeo hacia arriba de vectores
- [trader_cmo](#function.trader-cmo) — Oscilador de momento de Chande
- [trader_correl](#function.trader-correl) — Coeficiente de correlación de Pearson (r)
- [trader_cos](#function.trader-cos) — Coseno trigonométrico de vectores
- [trader_cosh](#function.trader-cosh) — Coseno hiperbólico de un vector
- [trader_dema](#function.trader-dema) — Media móvil exponencial doble
- [trader_div](#function.trader-div) — División aritmética de vectores
- [trader_dx](#function.trader-dx) — Índice de movimiento direccional
- [trader_ema](#function.trader-ema) — Media móvil exponencial
- [trader_errno](#function.trader-errno) — Obtener el código de error
- [trader_exp](#function.trader-exp) — Exponencial aritmética de vectores
- [trader_floor](#function.trader-floor) — Redondeo hacia abajo de vectores
- [trader_get_compat](#function.trader-get-compat) — Obtiene el modo de compatibilidad
- [trader_get_unstable_period](#function.trader-get-unstable-period) — Obtiene el periodo inestable
- [trader_ht_dcperiod](#function.trader-ht-dcperiod) — Transformación de Hilbert - Período de ciclo dominante
- [trader_ht_dcphase](#function.trader-ht-dcphase) — Transformación de Hilbert - Fase de ciclo dominante
- [trader_ht_phasor](#function.trader-ht-phasor) — Transformación de Hilbert - Componentes de un fasor
- [trader_ht_sine](#function.trader-ht-sine) — Transformación de Hilbert - Sinusoide
- [trader_ht_trendline](#function.trader-ht-trendline) — Transformación de Hilbert - Línea de tendencia instantánea
- [trader_ht_trendmode](#function.trader-ht-trendmode) — Transformación de Hilbert - Tendencia vs Modo de ciclo
- [trader_kama](#function.trader-kama) — Media móvil adaptativa de Kaufman
- [trader_linearreg](#function.trader-linearreg) — Regresión lineal
- [trader_linearreg_angle](#function.trader-linearreg-angle) — Ángulo de regresión lineal
- [trader_linearreg_intercept](#function.trader-linearreg-intercept) — Intercepción de regresión lineal
- [trader_linearreg_slope](#function.trader-linearreg-slope) — Pendiente de regresión lineal
- [trader_ln](#function.trader-ln) — Logaritmo natural de vectores
- [trader_log10](#function.trader-log10) — Logaritmo en base 10 de vectores
- [trader_ma](#function.trader-ma) — Media móvil
- [trader_macd](#function.trader-macd) — Convergencia/divergencia de la media móvil
- [trader_macdext](#function.trader-macdext) — MACD con tipo MA controlable
- [trader_macdfix](#function.trader-macdfix) — Convergencia/divergencia fija 12/26 de la media móvil
- [trader_mama](#function.trader-mama) — Media móvil adaptativa MESA
- [trader_mavp](#function.trader-mavp) — Media móvil con periodo variable
- [trader_max](#function.trader-max) — Valor mayor sobre un periodo especificado
- [trader_maxindex](#function.trader-maxindex) — Índice del valor mayor sobre un periodo especificado
- [trader_medprice](#function.trader-medprice) — Precio medio
- [trader_mfi](#function.trader-mfi) — Índice de flujo de dinero
- [trader_midpoint](#function.trader-midpoint) — Punto medio sobre un periodo
- [trader_midprice](#function.trader-midprice) — Precio de punto medio sobre un periodo
- [trader_min](#function.trader-min) — Valor más bajo sobre un periodo especificado
- [trader_minindex](#function.trader-minindex) — Índice del valor más bajo sobre un periodo especificado
- [trader_minmax](#function.trader-minmax) — Valores más altos y bajos sobre un periodo especificado
- [trader_minmaxindex](#function.trader-minmaxindex) — Índices de los valores más bajos y altos sobre un periodo especificado
- [trader_minus_di](#function.trader-minus-di) — Indicador direccional menos
- [trader_minus_dm](#function.trader-minus-dm) — Movimiento direccional menos
- [trader_mom](#function.trader-mom) — Momentum
- [trader_mult](#function.trader-mult) — Multiplicación aritmética de vectores
- [trader_natr](#function.trader-natr) — Rango verdadero de la media normalizada
- [trader_obv](#function.trader-obv) — Volumen sobre balance
- [trader_plus_di](#function.trader-plus-di) — Indicador direccional más
- [trader_plus_dm](#function.trader-plus-dm) — Movimiento direccional más
- [trader_ppo](#function.trader-ppo) — Oscilador de precio porcentual
- [trader_roc](#function.trader-roc) — Ritmo de cambio : ((precio/precioAnterior)-1)\*100
- [trader_rocp](#function.trader-rocp) — Porcentaje del ritmo de cabio: (precio-precioAnterior)/precioAnterior
- [trader_rocr](#function.trader-rocr) — Ratio del ritmo de cambio: (precio/precioAnterior)
- [trader_rocr100](#function.trader-rocr100) — Ratio del ritmo de cambio en escala 100: (precio/precioAnterior)\*100
- [trader_rsi](#function.trader-rsi) — Índice de fuerza relativa
- [trader_sar](#function.trader-sar) — Sistema parabólico
- [trader_sarext](#function.trader-sarext) — Sistema parabólico - Extendido
- [trader_set_compat](#function.trader-set-compat) — Establece el modo de compatibilidad
- [trader_set_unstable_period](#function.trader-set-unstable-period) — Establece el periodo inestable
- [trader_sin](#function.trader-sin) — Seno trigonométrico de vectores
- [trader_sinh](#function.trader-sinh) — Seno hiperbólico de vectores
- [trader_sma](#function.trader-sma) — Media móvil simple
- [trader_sqrt](#function.trader-sqrt) — Raíz cuadrada de vectores
- [trader_stddev](#function.trader-stddev) — Desviación estándar
- [trader_stoch](#function.trader-stoch) — Estocástico
- [trader_stochf](#function.trader-stochf) — Estocástico rápido
- [trader_stochrsi](#function.trader-stochrsi) — Índice de fuerza relativa estocástica
- [trader_sub](#function.trader-sub) — Sustracción artimética de vectores
- [trader_sum](#function.trader-sum) — Sumatorio
- [trader_t3](#function.trader-t3) — Media móvil exponencial triple (T3)
- [trader_tan](#function.trader-tan) — Tangente trigonométrica de vectores
- [trader_tanh](#function.trader-tanh) — Tangente hiperbólica trigonométrica de vectores
- [trader_tema](#function.trader-tema) — Media móvil exponencial triple
- [trader_trange](#function.trader-trange) — Rango verdadero
- [trader_trima](#function.trader-trima) — Media móvil triangular
- [trader_trix](#function.trader-trix) — Ritmo de cambio de 1 día (RDC) de una MME suave triple
- [trader_tsf](#function.trader-tsf) — Previsión de series de tiempo
- [trader_typprice](#function.trader-typprice) — Precio típico
- [trader_ultosc](#function.trader-ultosc) — Oscilador final
- [trader_var](#function.trader-var) — Varianza
- [trader_wclprice](#function.trader-wclprice) — Precio de cierre ponderado
- [trader_willr](#function.trader-willr) — %R de Williams
- [trader_wma](#function.trader-wma) — Media móvil ponderada

- [Introducción](#intro.trader)
- [Instalación/Configuración](#trader.setup)<li>[Requerimientos](#trader.requirements)
- [Instalación](#trader.installation)
- [Configuración en tiempo de ejecución](#trader.configuration)
  </li>- [Constantes predefinidas](#trader.constants)
- [Funciones de Trader](#ref.trader)<li>[trader_acos](#function.trader-acos) — Arcocoseno trigonométrico de vectores
- [trader_ad](#function.trader-ad) — Línea A/D Chaikin
- [trader_add](#function.trader-add) — Suma aritmética de vectores
- [trader_adosc](#function.trader-adosc) — Oscilador A/D Chaikin
- [trader_adx](#function.trader-adx) — Índice de movimiento direccional medio
- [trader_adxr](#function.trader-adxr) — Tasación del índice de movimiento direccional medio
- [trader_apo](#function.trader-apo) — Oscilador de precio absoluto
- [trader_aroon](#function.trader-aroon) — Aroon
- [trader_aroonosc](#function.trader-aroonosc) — Oscilador Aroon
- [trader_asin](#function.trader-asin) — Arcoseno trigonométrico de vectores
- [trader_atan](#function.trader-atan) — Arcotangente trigonométrica de vectores
- [trader_atr](#function.trader-atr) — Rango verdadero medio
- [trader_avgprice](#function.trader-avgprice) — Precio medio
- [trader_bbands](#function.trader-bbands) — Bandas de Bollinger
- [trader_beta](#function.trader-beta) — Beta
- [trader_bop](#function.trader-bop) — Equilibrio de poder
- [trader_cci](#function.trader-cci) — Índice de Canal de Comodidad
- [trader_cdl2crows](#function.trader-cdl2crows) — Dos Cuervos
- [trader_cdl3blackcrows](#function.trader-cdl3blackcrows) — Tres Cuervos Negros
- [trader_cdl3inside](#function.trader-cdl3inside) — Tres Velas Interiores Alcistas/Bajistas
- [trader_cdl3linestrike](#function.trader-cdl3linestrike) — Triple Golpe
- [trader_cdl3outside](#function.trader-cdl3outside) — Tres Velas Exteriores Alcistas/Bajistas
- [trader_cdl3starsinsouth](#function.trader-cdl3starsinsouth) — Tres Estrellas en el Sur
- [trader_cdl3whitesoldiers](#function.trader-cdl3whitesoldiers) — Tres Soldados Blancos Avanzando
- [trader_cdlabandonedbaby](#function.trader-cdlabandonedbaby) — Bebé Abandonado
- [trader_cdladvanceblock](#function.trader-cdladvanceblock) — Avance en Bloque
- [trader_cdlbelthold](#function.trader-cdlbelthold) — Belt-hold
- [trader_cdlbreakaway](#function.trader-cdlbreakaway) — Escape
- [trader_cdlclosingmarubozu](#function.trader-cdlclosingmarubozu) — Vela Cerrada Marubozu
- [trader_cdlconcealbabyswall](#function.trader-cdlconcealbabyswall) — Pequeña Golondrina Escondida
- [trader_cdlcounterattack](#function.trader-cdlcounterattack) — Contraataque
- [trader_cdldarkcloudcover](#function.trader-cdldarkcloudcover) — Cubierta de Nube Oscura
- [trader_cdldoji](#function.trader-cdldoji) — Doji
- [trader_cdldojistar](#function.trader-cdldojistar) — Estrella Doji
- [trader_cdldragonflydoji](#function.trader-cdldragonflydoji) — Doji Libélula
- [trader_cdlengulfing](#function.trader-cdlengulfing) — Patrón envolvente
- [trader_cdleveningdojistar](#function.trader-cdleveningdojistar) — Estrella Vespertina Doji
- [trader_cdleveningstar](#function.trader-cdleveningstar) — Estrella de Atardecer
- [trader_cdlgapsidesidewhite](#function.trader-cdlgapsidesidewhite) — Velas blancas paralelas de hueco alcista/bajista
- [trader_cdlgravestonedoji](#function.trader-cdlgravestonedoji) — Doji Lápida
- [trader_cdlhammer](#function.trader-cdlhammer) — Martillo
- [trader_cdlhangingman](#function.trader-cdlhangingman) — Hombre Colgado
- [trader_cdlharami](#function.trader-cdlharami) — Patrón Harami
- [trader_cdlharamicross](#function.trader-cdlharamicross) — Patrón Cruz Harami
- [trader_cdlhighwave](#function.trader-cdlhighwave) — Vela de Onda Alta
- [trader_cdlhikkake](#function.trader-cdlhikkake) — Patrón Hikkake
- [trader_cdlhikkakemod](#function.trader-cdlhikkakemod) — Patrón Hikkake Modificado
- [trader_cdlhomingpigeon](#function.trader-cdlhomingpigeon) — Paloma Mensajera
- [trader_cdlidentical3crows](#function.trader-cdlidentical3crows) — Tres Cuervos Idénticos
- [trader_cdlinneck](#function.trader-cdlinneck) — Patrón Formación en el cuello
- [trader_cdlinvertedhammer](#function.trader-cdlinvertedhammer) — Martilllo Invertido
- [trader_cdlkicking](#function.trader-cdlkicking) — Patada
- [trader_cdlkickingbylength](#function.trader-cdlkickingbylength) — Patada - alza/baja determinada por el marubozu más largo
- [trader_cdlladderbottom](#function.trader-cdlladderbottom) — Suelo de escalera
- [trader_cdllongleggeddoji](#function.trader-cdllongleggeddoji) — Doji Zancudo
- [trader_cdllongline](#function.trader-cdllongline) — Vela de Línea Larga
- [trader_cdlmarubozu](#function.trader-cdlmarubozu) — Marubozu
- [trader_cdlmatchinglow](#function.trader-cdlmatchinglow) — Mínimos coincidentes
- [trader_cdlmathold](#function.trader-cdlmathold) — Mat Hold
- [trader_cdlmorningdojistar](#function.trader-cdlmorningdojistar) — Lucero del Alba Doji
- [trader_cdlmorningstar](#function.trader-cdlmorningstar) — Lucero del Alba
- [trader_cdlonneck](#function.trader-cdlonneck) — Patrón Sobre el cuello
- [trader_cdlpiercing](#function.trader-cdlpiercing) — Patrón penetrante
- [trader_cdlrickshawman](#function.trader-cdlrickshawman) — Calesero
- [trader_cdlrisefall3methods](#function.trader-cdlrisefall3methods) — Triple Formación Alcista/Bajista
- [trader_cdlseparatinglines](#function.trader-cdlseparatinglines) — Lineas Separadas
- [trader_cdlshootingstar](#function.trader-cdlshootingstar) — Estrella Fugaz
- [trader_cdlshortline](#function.trader-cdlshortline) — Vela de Línea Corta
- [trader_cdlspinningtop](#function.trader-cdlspinningtop) — Peonza
- [trader_cdlstalledpattern](#function.trader-cdlstalledpattern) — Patrón Añejo
- [trader_cdlsticksandwich](#function.trader-cdlsticksandwich) — Bocadillo
- [trader_cdltakuri](#function.trader-cdltakuri) — Takuri (Libélula Doji con sombra muy larga)
- [trader_cdltasukigap](#function.trader-cdltasukigap) — Hueco Tasuki
- [trader_cdlthrusting](#function.trader-cdlthrusting) — Patrón de empuje
- [trader_cdltristar](#function.trader-cdltristar) — Patrón de tres estrellas
- [trader_cdlunique3river](#function.trader-cdlunique3river) — Tres ríos únicos
- [trader_cdlupsidegap2crows](#function.trader-cdlupsidegap2crows) — Dos Cuervos tras un Huevo al Alza
- [trader_cdlxsidegap3methods](#function.trader-cdlxsidegap3methods) — Métodos de Tres Huevos al Alza/Baja
- [trader_ceil](#function.trader-ceil) — Redondeo hacia arriba de vectores
- [trader_cmo](#function.trader-cmo) — Oscilador de momento de Chande
- [trader_correl](#function.trader-correl) — Coeficiente de correlación de Pearson (r)
- [trader_cos](#function.trader-cos) — Coseno trigonométrico de vectores
- [trader_cosh](#function.trader-cosh) — Coseno hiperbólico de un vector
- [trader_dema](#function.trader-dema) — Media móvil exponencial doble
- [trader_div](#function.trader-div) — División aritmética de vectores
- [trader_dx](#function.trader-dx) — Índice de movimiento direccional
- [trader_ema](#function.trader-ema) — Media móvil exponencial
- [trader_errno](#function.trader-errno) — Obtener el código de error
- [trader_exp](#function.trader-exp) — Exponencial aritmética de vectores
- [trader_floor](#function.trader-floor) — Redondeo hacia abajo de vectores
- [trader_get_compat](#function.trader-get-compat) — Obtiene el modo de compatibilidad
- [trader_get_unstable_period](#function.trader-get-unstable-period) — Obtiene el periodo inestable
- [trader_ht_dcperiod](#function.trader-ht-dcperiod) — Transformación de Hilbert - Período de ciclo dominante
- [trader_ht_dcphase](#function.trader-ht-dcphase) — Transformación de Hilbert - Fase de ciclo dominante
- [trader_ht_phasor](#function.trader-ht-phasor) — Transformación de Hilbert - Componentes de un fasor
- [trader_ht_sine](#function.trader-ht-sine) — Transformación de Hilbert - Sinusoide
- [trader_ht_trendline](#function.trader-ht-trendline) — Transformación de Hilbert - Línea de tendencia instantánea
- [trader_ht_trendmode](#function.trader-ht-trendmode) — Transformación de Hilbert - Tendencia vs Modo de ciclo
- [trader_kama](#function.trader-kama) — Media móvil adaptativa de Kaufman
- [trader_linearreg](#function.trader-linearreg) — Regresión lineal
- [trader_linearreg_angle](#function.trader-linearreg-angle) — Ángulo de regresión lineal
- [trader_linearreg_intercept](#function.trader-linearreg-intercept) — Intercepción de regresión lineal
- [trader_linearreg_slope](#function.trader-linearreg-slope) — Pendiente de regresión lineal
- [trader_ln](#function.trader-ln) — Logaritmo natural de vectores
- [trader_log10](#function.trader-log10) — Logaritmo en base 10 de vectores
- [trader_ma](#function.trader-ma) — Media móvil
- [trader_macd](#function.trader-macd) — Convergencia/divergencia de la media móvil
- [trader_macdext](#function.trader-macdext) — MACD con tipo MA controlable
- [trader_macdfix](#function.trader-macdfix) — Convergencia/divergencia fija 12/26 de la media móvil
- [trader_mama](#function.trader-mama) — Media móvil adaptativa MESA
- [trader_mavp](#function.trader-mavp) — Media móvil con periodo variable
- [trader_max](#function.trader-max) — Valor mayor sobre un periodo especificado
- [trader_maxindex](#function.trader-maxindex) — Índice del valor mayor sobre un periodo especificado
- [trader_medprice](#function.trader-medprice) — Precio medio
- [trader_mfi](#function.trader-mfi) — Índice de flujo de dinero
- [trader_midpoint](#function.trader-midpoint) — Punto medio sobre un periodo
- [trader_midprice](#function.trader-midprice) — Precio de punto medio sobre un periodo
- [trader_min](#function.trader-min) — Valor más bajo sobre un periodo especificado
- [trader_minindex](#function.trader-minindex) — Índice del valor más bajo sobre un periodo especificado
- [trader_minmax](#function.trader-minmax) — Valores más altos y bajos sobre un periodo especificado
- [trader_minmaxindex](#function.trader-minmaxindex) — Índices de los valores más bajos y altos sobre un periodo especificado
- [trader_minus_di](#function.trader-minus-di) — Indicador direccional menos
- [trader_minus_dm](#function.trader-minus-dm) — Movimiento direccional menos
- [trader_mom](#function.trader-mom) — Momentum
- [trader_mult](#function.trader-mult) — Multiplicación aritmética de vectores
- [trader_natr](#function.trader-natr) — Rango verdadero de la media normalizada
- [trader_obv](#function.trader-obv) — Volumen sobre balance
- [trader_plus_di](#function.trader-plus-di) — Indicador direccional más
- [trader_plus_dm](#function.trader-plus-dm) — Movimiento direccional más
- [trader_ppo](#function.trader-ppo) — Oscilador de precio porcentual
- [trader_roc](#function.trader-roc) — Ritmo de cambio : ((precio/precioAnterior)-1)\*100
- [trader_rocp](#function.trader-rocp) — Porcentaje del ritmo de cabio: (precio-precioAnterior)/precioAnterior
- [trader_rocr](#function.trader-rocr) — Ratio del ritmo de cambio: (precio/precioAnterior)
- [trader_rocr100](#function.trader-rocr100) — Ratio del ritmo de cambio en escala 100: (precio/precioAnterior)\*100
- [trader_rsi](#function.trader-rsi) — Índice de fuerza relativa
- [trader_sar](#function.trader-sar) — Sistema parabólico
- [trader_sarext](#function.trader-sarext) — Sistema parabólico - Extendido
- [trader_set_compat](#function.trader-set-compat) — Establece el modo de compatibilidad
- [trader_set_unstable_period](#function.trader-set-unstable-period) — Establece el periodo inestable
- [trader_sin](#function.trader-sin) — Seno trigonométrico de vectores
- [trader_sinh](#function.trader-sinh) — Seno hiperbólico de vectores
- [trader_sma](#function.trader-sma) — Media móvil simple
- [trader_sqrt](#function.trader-sqrt) — Raíz cuadrada de vectores
- [trader_stddev](#function.trader-stddev) — Desviación estándar
- [trader_stoch](#function.trader-stoch) — Estocástico
- [trader_stochf](#function.trader-stochf) — Estocástico rápido
- [trader_stochrsi](#function.trader-stochrsi) — Índice de fuerza relativa estocástica
- [trader_sub](#function.trader-sub) — Sustracción artimética de vectores
- [trader_sum](#function.trader-sum) — Sumatorio
- [trader_t3](#function.trader-t3) — Media móvil exponencial triple (T3)
- [trader_tan](#function.trader-tan) — Tangente trigonométrica de vectores
- [trader_tanh](#function.trader-tanh) — Tangente hiperbólica trigonométrica de vectores
- [trader_tema](#function.trader-tema) — Media móvil exponencial triple
- [trader_trange](#function.trader-trange) — Rango verdadero
- [trader_trima](#function.trader-trima) — Media móvil triangular
- [trader_trix](#function.trader-trix) — Ritmo de cambio de 1 día (RDC) de una MME suave triple
- [trader_tsf](#function.trader-tsf) — Previsión de series de tiempo
- [trader_typprice](#function.trader-typprice) — Precio típico
- [trader_ultosc](#function.trader-ultosc) — Oscilador final
- [trader_var](#function.trader-var) — Varianza
- [trader_wclprice](#function.trader-wclprice) — Precio de cierre ponderado
- [trader_willr](#function.trader-willr) — %R de Williams
- [trader_wma](#function.trader-wma) — Media móvil ponderada
  </li>
