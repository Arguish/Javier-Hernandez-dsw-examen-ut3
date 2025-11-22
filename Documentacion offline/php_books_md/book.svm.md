# Support Vector Machine

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

LibSVM es un solucionador eficiente para problemas de clasificación y regresión SVM. La extensión SVM se presenta como una interfaz PHP sencilla de utilizar en scripts PHP.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#svm.requirements)
- [Instalación](#svm.installation)

    ## Requerimientos

    LIBSVM es requerido, y está disponible a través de algunos gestores de paquetes
    - libsvm-devel para el sistema basado en RPM o libsvm-dev para los basados en
      Debian. Como alternativa, está disponible directamente desde el sitio web.
      Si está instalando desde el [» Website Oficial](http://www.csie.ntu.edu.tw/~cjlin/libsvm)
      algunos pasos son necesarios ya que el paquete no se instala automáticamente.
      Por ejemplo, suponiendo que la última versión es la 3.1:

wget http://www.csie.ntu.edu.tw/~cjlin/cgi-bin/libsvm.cgi?+http://www.csie.ntu.edu.tw/~cjlin/libsvm+tar.gz
tar xvzf libsvm-3.1.tar.gz
cd libsvm-3.1
make lib
cp libsvm.so.1 /usr/lib
ln -s libsvm.so.1 libsvm.so
ldconfig
ldconfig --print | grep libsvm

Este último paso debe mostrar LIBSVM está instalado.

## Instalación

    Información sobre la instalación de estas extensiones PECL
        puede ser encontrada en el capítulo del manual titulado [Instalación

de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/svm](https://pecl.php.net/package/svm)

# Ejemplos

El proceso básico consiste en definir argumentos, someter datos de entrenamiento para la generación de un modelo y,
posteriormente, realizar predicciones basadas en este modelo. Existe un conjunto predeterminado de argumentos que
deberían proporcionar resultados con la mayoría de las entradas, por lo que se comenzará examinando estos datos.

Los datos se someten a través de un fichero, un flujo o un array. Si se proporcionan a través de un fichero o un
flujo, deben contener una línea por ejemplo de entrenamiento, la cual debe estar formateada como una clase entera
(generalmente 1 y -1), seguida de una serie de pares clave/característica en orden creciente de características. Las
características son enteros y los valores son números de punto flotante en el rango 0-1. Por ejemplo:

-1 1:0.43 3:0.12 9284:0.2

En un problema de clasificación de documentos, por ejemplo, relacionado con el spam, cada línea debe representar un
documento. Debe haber 2 clases, -1 para el spam y 1 para el ham. Cada característica representa palabras y los valores
representan la importancia de estas palabras en el documento (por ejemplo, la frecuencia de aparición de estas
palabras en el documento, con el total en el rango adecuado). Las características con valor 0 (es decir, la palabra no
aparece en absoluto en el documento) simplemente no se incluirán.

En el modo array, los datos deben pasarse en forma de arrays de arrays. Cada subarray debe tener la clase como primer
elemento, más pares clave =&gt; valor para las características/valor.

Estos datos se pasan a la función de entrenamiento de la clase SVM, que devolverá un modelo SVM en caso de éxito.

Una vez generado el modelo, puede utilizarse para realizar predicciones sobre datos no vistos previamente. Estos
pueden pasarse en forma de array a la función de predicción del modelo, en el mismo formato que antes, pero sin la
etiqueta. La respuesta será la clase.

Los modelos pueden guardarse y restaurarse según sea necesario, utilizando las funciones de guardado y carga, que
toman como argumento la ruta al fichero correspondiente.

**Ejemplo #1 Entrenamiento desde un array**

    &lt;?php

$data = array(
array(-1, 1 =&gt; 0.43, 3 =&gt; 0.12, 9284 =&gt; 0.2),
array(1, 1 =&gt; 0.22, 5 =&gt; 0.01, 94 =&gt; 0.11),
);

$svm = new SVM();
$model = $svm-&gt;train($data);

$data = array(1 =&gt; 0.43, 3 =&gt; 0.12, 9284 =&gt; 0.2);
$result = $model-&gt;predict($data);
var_dump($result);
$model-&gt;save('model.svm');
?&gt;

Resultado del ejemplo anterior es similar a:

int(-1)

**Ejemplo #2 Entrenamiento desde un fichero**

    &lt;?php

$svm = new SVM();
$model = $svm-&gt;train("traindata.txt");
?&gt;

# La clase SVM

(PECL svm &gt;= 0.1.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **SVM**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [C_SVC](#svm.constants.c-svc) = 0;

    const
     [int](#language.types.integer)
      [NU_SVC](#svm.constants.nu-svc) = 1;

    const
     [int](#language.types.integer)
      [ONE_CLASS](#svm.constants.one-class) = 2;

    const
     [int](#language.types.integer)
      [EPSILON_SVR](#svm.constants.epsilon-svr) = 3;

    const
     [int](#language.types.integer)
      [NU_SVR](#svm.constants.nu-svr) = 4;

    const
     [int](#language.types.integer)
      [KERNEL_LINEAR](#svm.constants.kernel-linear) = 0;

    const
     [int](#language.types.integer)
      [KERNEL_POLY](#svm.constants.kernel-poly) = 1;

    const
     [int](#language.types.integer)
      [KERNEL_RBF](#svm.constants.kernel-rbf) = 2;

    const
     [int](#language.types.integer)
      [KERNEL_SIGMOID](#svm.constants.kernel-sigmoid) = 3;

    const
     [int](#language.types.integer)
      [KERNEL_PRECOMPUTED](#svm.constants.kernel-precomputed) = 4;

    const
     [int](#language.types.integer)
      [OPT_TYPE](#svm.constants.opt-type) = 101;

    const
     [int](#language.types.integer)
      [OPT_KERNEL_TYPE](#svm.constants.opt-kernel-type) = 102;

    const
     [int](#language.types.integer)
      [OPT_DEGREE](#svm.constants.opt-degree) = 103;

    const
     [int](#language.types.integer)
      [OPT_SHRINKING](#svm.constants.opt-shrinking) = 104;

    const
     [int](#language.types.integer)
      [OPT_PROPABILITY](#svm.constants.opt-probability) = 105;

    const
     [int](#language.types.integer)
      [OPT_GAMMA](#svm.constants.opt-gamma) = 201;

    const
     [int](#language.types.integer)
      [OPT_NU](#svm.constants.opt-nu) = 202;

    const
     [int](#language.types.integer)
      [OPT_EPS](#svm.constants.opt-eps) = 203;

    const
     [int](#language.types.integer)
      [OPT_P](#svm.constants.opt-p) = 204;

    const
     [int](#language.types.integer)
      [OPT_COEF_ZERO](#svm.constants.opt-coef-zero) = 205;

    const
     [int](#language.types.integer)
      [OPT_C](#svm.constants.opt-c) = 206;

    const
     [int](#language.types.integer)
      [OPT_CACHE_SIZE](#svm.constants.opt-cache-size) = 207;


    /* Métodos */

public [\_\_construct](#svm.construct)()

    public [svm::crossvalidate](#svm.crossvalidate)([array](#language.types.array) $problem, [int](#language.types.integer) $number_of_folds): [float](#language.types.float)

public [getOptions](#svm.getoptions)(): [array](#language.types.array)
public [setOptions](#svm.setoptions)([array](#language.types.array) $params): [bool](#language.types.boolean)
public [svm::train](#svm.train)([array](#language.types.array) $problem, [array](#language.types.array) $weights = ?): [SVMModel](#class.svmmodel)

}

## Constantes predefinidas

    ## SVM Constants




      **[SVM::C_SVC](#svm.constants.c-svc)**

       El tipo básico C_SVC SVM. Es el tipo por defecto. Un buen punto de partida.






      **[SVM::NU_SVC](#svm.constants.nu-svc)**

       El tipo NU_SVC usa una diferente y más flexible ponderación de errores.






      **[SVM::ONE_CLASS](#svm.constants.one-class)**

       Una clase de tipo SVM. Guía simplemente a una clase, usando valores extremos como ejemplos negativos.






      **[SVM::EPSILON_SVR](#svm.constants.epsilon-svr)**

       Un tipo SVM para regresión (prediciento un valor más que símplemente una clase)






      **[SVM::NU_SVR](#svm.constants.nu-svr)**

       Un tipo de regresión SVM al estilo NU.






      **[SVM::KERNEL_LINEAR](#svm.constants.kernel-linear)**

       Un núcleo muy simple, puede funcionar bien con problemas de clasificación de documentos grandes.






      **[SVM::KERNEL_POLY](#svm.constants.kernel-poly)**

       Un núcleo polinómico






      **[SVM::KERNEL_RBF](#svm.constants.kernel-rbf)**

       El común nucleo Gaussiano RBD. Maneja bien problemas no lineales y es un buen estándar para la clasificación.






      **[SVM::KERNEL_SIGMOID](#svm.constants.kernel-sigmoid)**

       Un núcleo basado en la función sigmoid. Usando esta, SVM se hace muy similar a sigmoid de dos capas basado en redes neuronales.






      **[SVM::KERNEL_PRECOMPUTED](#svm.constants.kernel-precomputed)**

       Un núcleo precalculado - actualmente sin soporte.






      **[SVM::OPT_TYPE](#svm.constants.opt-type)**

       La clave de opciones para el tipo SVM






      **[SVM::OPT_KERNEL_TYPE](#svm.constants.opt-kernel-type)**

       La clave opcional para el tipo de núcleo






      **[SVM::OPT_DEGREE](#svm.constants.opt-degree)**








      **[SVM::OPT_SHRINKING](#svm.constants.opt-shrinking)**

       Parámetro de formación, booleano, para cualquier uso de reducciones heurísticas.






      **[SVM::OPT_PROBABILITY](#svm.constants.opt-probability)**

       Parámetro de formación, booleano, para recaudar y estimar el uso de probabilidades.






      **[SVM::OPT_GAMMA](#svm.constants.opt-gamma)**

       Parámetro algorítmico para usar Poly, RBF y Sigmoid como tipos de núcleo.






      **[SVM::OPT_NU](#svm.constants.opt-nu)**

       La clave de opción para el parámetro NU, solo usado en tipos NU_ SVM.






      **[SVM::OPT_EPS](#svm.constants.opt-eps)**

       La clave para la opción del parámetro Epsilon, Usada en regresiones epsilon.






      **[SVM::OPT_P](#svm.constants.opt-p)**

       Parámetro de formación usado por regresiones Episilon SVR






      **[SVM::OPT_COEF_ZERO](#svm.constants.opt-coef-zero)**

       Parámetro para el algoritmo de núcleos poly y sigmoid






      **[SVM::OPT_C](#svm.constants.opt-c)**

       La opción para el parámetro de coste que controla la compensación entre errores y generalidad - efectivamente la sanción por la clasificación errónea de los ejemplos de formación.






      **[SVM::OPT_CACHE_SIZE](#svm.constants.opt-cache-size)**

       Tamaño de la memoria caché, en MB.





# SVM::\_\_construct

(PECL svm &gt;= 0.1.0)

SVM::\_\_construct — Construir un nuevo objeto SVM

### Descripción

public **SVM::\_\_construct**()

Construye un nuevo objeto SVM listo para aceptar datos de entrenamiento.

### Parámetros

Esta función no contiene ningún parámetro.

### Errores/Excepciones

Lanza una **SVMException** si la libreria
libsvm no puede ser cargada.

# SVM::crossvalidate

(PECL svm &gt;= 0.1.0)

SVM::crossvalidate — Test los argumentos de entrenamiento en los subconjuntos de datos de entrenamiento

### Descripción

public **svm::crossvalidate**([array](#language.types.array) $problem, [int](#language.types.integer) $number_of_folds): [float](#language.types.float)

Puede ser utilizado para probar la efectividad del conjunto de argumentos
actual en los subconjuntos de datos de entrenamiento. Al proporcionar un
problema así como n "plis", la función separará el conjunto del problema en
n subconjuntos, y comenzará entrenamientos sucesivos en los subconjuntos.
Aunque la precisión sea generalmente más baja que la de un SVM entrenado
con los conjuntos de datos proporcionados, el porcentaje correcto retornado
debería ser suficientemente útil para probar diferentes argumentos de entrenamiento.

### Parámetros

     problem


       Los datos del problema. Puede estar en forma de array, de una URL
       hacia un archivo SVMLight, o de un flujo hacia un recurso de datos
       SVMLight abierto.






     number_of_folds


       El número de conjuntos en los que los datos deben ser divididos
       y probados. Un número alto significa que los conjuntos de entrenamiento
       serán más pequeños y menos fiables. 5 es un buen comienzo.





### Valores devueltos

El porcentaje correcto, expresado como un número de punto flotante en el
intervalo 0-1. En el caso de un núcleo NU_SVC o EPSILON_SVR, el error cuadrático
medio será retornado.

### Ver también

    - [SVM::train()](#svm.train) - Crea un modelo SVMModel basado en los datos de entrenamiento

# SVM::getOptions

(PECL svm &gt;= 0.1.0)

SVM::getOptions — Devuelve los argumentos de entrenamiento actuales

### Descripción

public **SVM::getOptions**(): [array](#language.types.array)

Recupera un array que contiene los argumentos de entrenamiento.
Estos argumentos tendrán como claves las constantes SVM predefinidas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene los argumentos de configuración.

# SVM::setOptions

(PECL svm &gt;= 0.1.0)

SVM::setOptions — Define argumentos de entrenamiento

### Descripción

public **SVM::setOptions**([array](#language.types.array) $params): [bool](#language.types.boolean)

Define uno o más argumentos de entrenamiento.

### Parámetros

     params


       Un array de argumentos de entrenamiento, cuyos
       claves son las constantes SVM.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, y lanza una excepción
SVMException si ocurre un error.

# SVM::train

(PECL svm &gt;= 0.1.0)

SVM::train — Crea un modelo SVMModel basado en los datos de entrenamiento

### Descripción

public **svm::train**([array](#language.types.array) $problem, [array](#language.types.array) $weights = ?): [SVMModel](#class.svmmodel)

Entrena una máquina vectorial basada en los datos de entrenamiento
proporcionados.

### Parámetros

     problem


       El problema puede ser proporcionado de 3 maneras. Un array, donde las
       datos deben comenzar por la etiqueta de la clase (habitualmente
       1 o -1), seguido por una serie de datos en forma de pares
       dimensión/dato. Una URL hacia un archivo que contiene un problema
       en formato SVM Light, donde cada línea comienza con un nuevo ejemplo
       de entrenamiento, el inicio de cada línea contiene la clase (1 o -1)
       seguido de una serie de valores de datos separados por una tabulación
       en forma clave:valor. Un flujo abierto que apunta hacia una fuente
       de datos formateada como en el archivo anterior.






     weights


       Los pesos son conjuntos opcionales de parámetros de ponderación para
       las diferentes clases, para ayudar en el conteo para conjuntos de
       entrenamiento desequilibrados. Por ejemplo, si las clases son 1 y -1, y
       que -1 tiene más ejemplos significativos que el primero, el peso para -1
       podría ser de 0.5. Los pesos deben estar en el intervalo 0-1.





### Valores devueltos

Devuelve un modelo SVMModel que puede ser utilizado para clasificar
datos previamente no vistos.
Lanza una excepción SVMException si ocurre un error.

## Tabla de contenidos

- [SVM::\_\_construct](#svm.construct) — Construir un nuevo objeto SVM
- [SVM::crossvalidate](#svm.crossvalidate) — Test los argumentos de entrenamiento en los subconjuntos de datos de entrenamiento
- [SVM::getOptions](#svm.getoptions) — Devuelve los argumentos de entrenamiento actuales
- [SVM::setOptions](#svm.setoptions) — Define argumentos de entrenamiento
- [SVM::train](#svm.train) — Crea un modelo SVMModel basado en los datos de entrenamiento

# La clase SVMModel

(PECL svm &gt;= 0.1.0)

## Introducción

    El SVMModel es el resultado final del proceso de formación.
    Puede ser utilizado para clasificar los datos nunca antes vistos.

## Sinopsis de la Clase

    ****




      class **SVMModel**

     {


    /* Métodos */

public [\_\_construct](#svmmodel.construct)([string](#language.types.string) $filename = ?)

    public [checkProbabilityModel](#svmmodel.checkprobabilitymodel)(): [bool](#language.types.boolean)

public [getLabels](#svmmodel.getlabels)(): [array](#language.types.array)
public [getNrClass](#svmmodel.getnrclass)(): [integer](#language.types.integer)
public [getSvmType](#svmmodel.getsvmtype)(): [integer](#language.types.integer)
public [getSvrProbability](#svmmodel.getsvrprobability)(): [float](#language.types.float)
public [load](#svmmodel.load)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [predict](#svmmodel.predict)([array](#language.types.array) $data): [float](#language.types.float)
public [predict_probability](#svmmodel.predict-probability)([array](#language.types.array) $data): [float](#language.types.float)
public [save](#svmmodel.save)([string](#language.types.string) $filename): [bool](#language.types.boolean)

}

# SVMModel::checkProbabilityModel

(PECL svm &gt;= 0.1.5)

SVMModel::checkProbabilityModel — Devuelve **[true](#constant.true)** si el modelo tiene información probabilística

### Descripción

public **SVMModel::checkProbabilityModel**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el modelo tiene información probabilística.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un bool.

# SVMModel::\_\_construct

(PECL svm &gt;= 0.1.0)

SVMModel::\_\_construct — Construye un nuevo objeto SVMModel

### Descripción

public **SVMModel::\_\_construct**([string](#language.types.string) $filename = ?)

Construye un nuevo objeto SVMModel. Los modelos se construyen generalmente
desde la función SVM::train, mientras que los modelos guardados pueden ser
restaurados directamente.

### Parámetros

     filename


       El nombre del archivo para el modelo guardado a cargar.





### Errores/Excepciones

Lanza una excepción **SVMException** si ocurre un error.

### Ver también

    - [SVMModel::load()](#svmmodel.load) - Cargar un modelo SVM guardado

# SVMModel::getLabels

(PECL svm &gt;= 0.1.5)

SVMModel::getLabels — Recupera los labels utilizados para entrenar el modelo

### Descripción

public **SVMModel::getLabels**(): [array](#language.types.array)

Devuelve un array de labels utilizados para entrenar el modelo.
Para los casos de regresión y para las clases móviles solas,
un array vacío es devuelto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de labels.

### Ver también

    - [SVMModel::getNrClass()](#svmmodel.getnrclass) - Devuelve el número de clases utilizadas para entrenar el modelo

# SVMModel::getNrClass

(PECL svm &gt;= 0.1.5)

SVMModel::getNrClass — Devuelve el número de clases utilizadas para entrenar el modelo

### Descripción

public **SVMModel::getNrClass**(): [integer](#language.types.integer)

Devuelve el número de clases utilizadas para entrenar el
modelo; devolverá 2 para una sola clase y para los modelos de regresión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de clases, en forma de un entero.

# SVMModel::getSvmType

(PECL svm &gt;= 0.1.5)

SVMModel::getSvmType — Recupera el tipo SVM utilizado para entrenar el modelo

### Descripción

public **SVMModel::getSvmType**(): [integer](#language.types.integer)

Devuelve un entero representando el tipo del modelo SVM utilizado, i.e. SVM::C_SVC.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tipo SVM en forma de un entero.

# SVMModel::getSvrProbability

(PECL svm &gt;= 0.1.5)

SVMModel::getSvrProbability — Recupera el valor sigma para los tipos de regresión

### Descripción

public **SVMModel::getSvrProbability**(): [float](#language.types.float)

Para los modelos de regresión, devuelve un valor sigma;
Si no hay información de probabilidad o el modelo
no es SVR, 0 será devuelto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un valor sigma.

# SVMModel::load

(PECL svm &gt;= 0.1.00.1.0)

SVMModel::load — Cargar un modelo SVM guardado

### Descripción

public **SVMModel::load**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Cargar un archivo de un modelo listo para la clasificación o regresión.

### Parámetros

     filename


       El nombre del modelo.





### Valores devueltos

Lanza SVMException en caso de error.
Devuelve true en caso de éxito.

### Ver también

    - [SVMModel::save()](#svmmodel.save) - Guardar un modelo en un archivo

# SVMModel::predict

(PECL svm &gt;= 0.1.0)

SVMModel::predict — Predice un valor para datos anteriores no vistos

### Descripción

public **SVMModel::predict**([array](#language.types.array) $data): [float](#language.types.float)

Esta función acepta un array de datos y trata de predecir
el valor de la clase o de la regresión, según el modelo extraído
desde los datos previamente entrenados.

### Parámetros

     data


       El array a clasificar. Esto puede ser una serie de pares clave =&gt; valor
       en orden creciente de las claves, pero no necesariamente continuo.





### Valores devueltos

Devuelve el valor predicho. Esto puede ser un label de clase
en el caso de una clasificación, un valor real en el caso
de una regresión. Lanza una excepción SVMException en caso de error.

### Ver también

    - [SVM::train()](#svm.train) - Crea un modelo SVMModel basado en los datos de entrenamiento

# SVMModel::predict_probability

(PECL svm &gt;= 0.1.4)

SVMModel::predict_probability — Devuelve las probabilidades para los datos anteriores no presentados

### Descripción

public **SVMModel::predict_probability**([array](#language.types.array) $data): [float](#language.types.float)

Esta función acepta un array de datos y trata de predecir la clase,
como con las funciones de predicción. Además, sin embargo, esta función devuelve
un array de probabilidades, una por clase del modelo, que representa
la probabilidad estimada de que los datos proporcionados sean un miembro de esa clase.
Necesita que el modelo a utilizar sea tratado con el parámetro de probabilidad
establecido en **[true](#constant.true)**.

### Parámetros

     data


       El array a clasificar. Esto debe ser una serie de pares clave=&gt;valor
       cuyos índices están en orden creciente, pero no necesariamente continuo.






     probabilities


       El valor proporcionado será completado con las probabilidades.
       Esto puede ser **[null](#constant.null)** en el caso de que el modelo no contenga
       información de probabilidad, o un array en el que los
       índices sean los nombres de clase y los valores, las probabilidades.





### Valores devueltos

Devuelve el valor predicho. Esto será un label de clase en el caso
de una clasificación, un valor real en el caso de una regresión.
Lanza una excepción de tipo SVMException en caso de error.

### Ver también

    - **SVM::predict()**

# SVMModel::save

(PECL svm &gt;= 0.1.0)

SVMModel::save — Guardar un modelo en un archivo

### Descripción

public **SVMModel::save**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Guardar los datos del modelo en un archivo, para su uso posterior.

### Parámetros

     filename


       El archivo para guardar el modelo.





### Valores devueltos

Lanza SVMException en caso de error.
Devuelve true en caso de éxito.

### Ver también

    - [SVMModel::load()](#svmmodel.load) - Cargar un modelo SVM guardado

## Tabla de contenidos

- [SVMModel::checkProbabilityModel](#svmmodel.checkprobabilitymodel) — Devuelve true si el modelo tiene información probabilística
- [SVMModel::\_\_construct](#svmmodel.construct) — Construye un nuevo objeto SVMModel
- [SVMModel::getLabels](#svmmodel.getlabels) — Recupera los labels utilizados para entrenar el modelo
- [SVMModel::getNrClass](#svmmodel.getnrclass) — Devuelve el número de clases utilizadas para entrenar el modelo
- [SVMModel::getSvmType](#svmmodel.getsvmtype) — Recupera el tipo SVM utilizado para entrenar el modelo
- [SVMModel::getSvrProbability](#svmmodel.getsvrprobability) — Recupera el valor sigma para los tipos de regresión
- [SVMModel::load](#svmmodel.load) — Cargar un modelo SVM guardado
- [SVMModel::predict](#svmmodel.predict) — Predice un valor para datos anteriores no vistos
- [SVMModel::predict_probability](#svmmodel.predict-probability) — Devuelve las probabilidades para los datos anteriores no presentados
- [SVMModel::save](#svmmodel.save) — Guardar un modelo en un archivo

- [Introducción](#intro.svm)
- [Instalación/Configuración](#svm.setup)<li>[Requerimientos](#svm.requirements)
- [Instalación](#svm.installation)
  </li>- [Ejemplos](#svm.examples)
- [SVM](#class.svm) — La clase SVM<li>[SVM::\_\_construct](#svm.construct) — Construir un nuevo objeto SVM
- [SVM::crossvalidate](#svm.crossvalidate) — Test los argumentos de entrenamiento en los subconjuntos de datos de entrenamiento
- [SVM::getOptions](#svm.getoptions) — Devuelve los argumentos de entrenamiento actuales
- [SVM::setOptions](#svm.setoptions) — Define argumentos de entrenamiento
- [SVM::train](#svm.train) — Crea un modelo SVMModel basado en los datos de entrenamiento
  </li>- [SVMModel](#class.svmmodel) — La clase SVMModel<li>[SVMModel::checkProbabilityModel](#svmmodel.checkprobabilitymodel) — Devuelve true si el modelo tiene información probabilística
- [SVMModel::\_\_construct](#svmmodel.construct) — Construye un nuevo objeto SVMModel
- [SVMModel::getLabels](#svmmodel.getlabels) — Recupera los labels utilizados para entrenar el modelo
- [SVMModel::getNrClass](#svmmodel.getnrclass) — Devuelve el número de clases utilizadas para entrenar el modelo
- [SVMModel::getSvmType](#svmmodel.getsvmtype) — Recupera el tipo SVM utilizado para entrenar el modelo
- [SVMModel::getSvrProbability](#svmmodel.getsvrprobability) — Recupera el valor sigma para los tipos de regresión
- [SVMModel::load](#svmmodel.load) — Cargar un modelo SVM guardado
- [SVMModel::predict](#svmmodel.predict) — Predice un valor para datos anteriores no vistos
- [SVMModel::predict_probability](#svmmodel.predict-probability) — Devuelve las probabilidades para los datos anteriores no presentados
- [SVMModel::save](#svmmodel.save) — Guardar un modelo en un archivo
  </li>
