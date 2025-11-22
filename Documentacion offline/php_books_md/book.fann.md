# FANN (Fast Artificial Neural Network - Red Neuronal Artificial Rápida)

# Introducción

Enlace de PHP para la biblioteca FANN (Fast Artificial Neural Network - Red Neuronal Artificial Rápida), la cual implementa
redes neuronales artificiales multicapa con soporte para redes completa y escasamente conectadas.
Incluye un marco de trabajo para el manejo sencillo de conjuntos de datos de entrenamiento.
Es sencilla de utilizar, es versátil, está bien documentada, y es rápida.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#fann.requirements)
- [Instalación](#fann.installation)
- [Tipos de recursos](#fann.resources)

    ## Requerimientos

    PHP &gt;= 5.2.0 y libfann &gt;= 2.1.0

    ## Instalación

    La extensión FANN PHP debería funcionar en todos los sistemas Linux.
    - [Instalación de la biblioteca FANN](#fann.installation.lib)
    - [Instalación PECL](#fann.installation.pecl)
    - [Manual de instalación](#fann.installation.manual)

    ## Instalación de la biblioteca FANN

    Antes de comenzar la instalación, asegúrese de que _libfann_ esté instalado
    en su sistema. Forma parte del repositorio principal en la mayoría de las distribuciones Linux
    (busque _fann_). Se necesita una versión de desarrollo.

    Si no está instalado, debe instalarse primero. Descárguelo desde el
    [» sitio oficial](http://leenissen.dk/fann/wp/) o obténgalo desde el repositorio de su
    distribución. Por ejemplo en Fedora:

$ sudo yum install fann-devel

    o en Ubuntu:

$ sudo apt-get install libfann-dev

    Si la biblioteca se reinstala manualmente, entonces todos los archivos antiguos de la biblioteca
    deben eliminarse antes de reinstalar, de lo contrario podría vincularse la versión antigua de la biblioteca.

## Instalación PECL

    Esta extensión está disponible en PECL. La instalación es muy sencilla. Ejecute simplemente:

$ sudo pecl install fann

## Manual de instalación

    Para los desarrolladores y las personas interesadas en los últimos cambios, se
    puede compilar el controlador a partir del código fuente más reciente en
    [» Github](https://github.com/bukka/php-fann).
    Vaya a Github y haga clic en el botón "Download ZIP". Luego ejecute:

$ unzip php-fann-master.zip
$ cd php-fann-master
$ phpize
$ ./configure
$ make all
$ sudo make install

    Aplique los siguientes cambios a php.ini:




    -

      Asegúrese de que la variable *extension_dir* apunte hacia
      el directorio que contiene *fann.so*. La construcción mostrará dónde
      instala el controlador PHP con una salida que se parece a:


Installing '/usr/lib/php/extensions/no-debug-non-zts-20060613/fann.so'

      Asegúrese de que sea el mismo que el directorio de extensión PHP ejecutando:



$ php -i | grep extension_dir
extension_dir =&gt; /usr/lib/php/extensions/no-debug-non-zts-20060613 =&gt;
/usr/lib/php/extensions/no-debug-non-zts-20060613

      Si no es así, cambie la variable *extension_dir* en php.ini o
      mueva *fann.so*.



    -

      Para cargar la extensión al iniciar PHP, añada una línea:



extension=fann.so

## Tipos de recursos

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Algoritmos de entrenamiento**

     **[FANN_TRAIN_INCREMENTAL](#constant.fann-train-incremental)**
     ([int](#language.types.integer))



      Algoritmo de retropropagación estándar, donde los pesos se actualizan después de cada patrón de entrenamiento.
      Esto significa que los pesos se actualizan muchas veces durante una única época. Por este motivo, algunos problemas
      entrenarán muy rápido con este algoritmo, mientras que problemas más avanzados no entrenarán muy bien.





     **[FANN_TRAIN_BATCH](#constant.fann-train-batch)**
     ([int](#language.types.integer))



      Algoritmo de retropropagación estándar, donde los pesos se actualizan después de calcular el error cuadrático medio
      para el conjunto de entrenamiento completo. Esto significa que los pesos solamente se actualizan una vez durante una época.
      Por este motivo, algunos problemas entrenarán más lento con este algoritmo. Aunque debido a que el error
      cuadrático medio se calcula más correctamente que en el entrenamiento incremental, algunos probleamas alcanzarán
      soluciones mejores con este algoritmo.





     **[FANN_TRAIN_RPROP](#constant.fann-train-rprop)**
     ([int](#language.types.integer))



      Un algoritmo de entrenamiento por lotes más avanzado que alcanza buenos resultados para muchos problemas. El
      algoritmo de entrenamiento RPROP es adaptativo, por lo que no emplea learning_rate. Sin embargo, se pueden
      establecer otros parámetros para cambiar la manera en que funciona el algoritmo RPROP, aunque solamente se recomienda
      para usuarios que sepan cómo funciona el algoritmo de entrenamiento RPROP. El algoritmo de entrenamiento RPROP
      está descrito por [Riedmiller y Braun, 1993], aunque el algoritmo real de aprendizaje utilizado aquí es
      el algoritmo de entrenamiento iRPROP-, el cual está descrito por [Igel y Husken, 2000], y es una variedad
      del algoritmo de entrenamiento RPROP estándar.





     **[FANN_TRAIN_QUICKPROP](#constant.fann-train-quickprop)**
     ([int](#language.types.integer))



      Un algoritmo de entrenamiento por lotes más avanzado que alcanza buenos resultados para muchos problemas.
      El algoritmo de entrenamiento quickprop emplea el parámetro learning_rate junto con otros parámetros más avanzados,
      aunque solamente se recomienda cambiar estos parámetros avanzados a usuarios  que sepan cómo funciona
      el algoritmo de entrenamiento quickprop. El algoritmo de entrenamiento quickprop está descrito por [Fahlman, 1988].





     **[FANN_TRAIN_SARPROP](#constant.fann-train-sarprop)**
     ([int](#language.types.integer))



      Algoritmo de entrenamiento más avanzado aún. Solamente para la versión 2.2


**Funciones de activación**

     **[FANN_LINEAR](#constant.fann-linear)**
     ([int](#language.types.integer))



      Función de activación lineal.





     **[FANN_THRESHOLD](#constant.fann-threshold)**
     ([int](#language.types.integer))



      Función de activación de umbral.





     **[FANN_THRESHOLD_SYMMETRIC](#constant.fann-threshold-symmetric)**
     ([int](#language.types.integer))



      Función de activación de umbral.





     **[FANN_SIGMOID](#constant.fann-sigmoid)**
     ([int](#language.types.integer))



      Función de activación sigmoide.





     **[FANN_SIGMOID_STEPWISE](#constant.fann-sigmoid-stepwise)**
     ([int](#language.types.integer))



      Aproximación lineal escalonada a la sigmoide.





     **[FANN_SIGMOID_SYMMETRIC](#constant.fann-sigmoid-symmetric)**
     ([int](#language.types.integer))



      Función de activación sigmoide simétrica, también conocida como tanh.





     **[FANN_SIGMOID_SYMMETRIC_STEPWISE](#constant.fann-sigmoid-symmetric-stepwise)**
     ([int](#language.types.integer))



      Aproximación lineal escalonada a la sigmoide simétrica.





     **[FANN_GAUSSIAN](#constant.fann-gaussian)**
     ([int](#language.types.integer))



      Función de activación gaussiana.





     **[FANN_GAUSSIAN_SYMMETRIC](#constant.fann-gaussian-symmetric)**
     ([int](#language.types.integer))



      Función de activación gaussiana simétrica.





     **[FANN_GAUSSIAN_STEPWISE](#constant.fann-gaussian-stepwise)**
     ([int](#language.types.integer))



      Función de activación gaussiana escalonada.





     **[FANN_ELLIOT](#constant.fann-elliot)**
     ([int](#language.types.integer))



      Función de activación rápida (igual que la sigmoide) definida por David Elliott.





     **[FANN_ELLIOT_SYMMETRIC](#constant.fann-elliot-symmetric)**
     ([int](#language.types.integer))



      Función de activación rápida (igual que la sigmoide simétrica) definida por David Elliott.





     **[FANN_LINEAR_PIECE](#constant.fann-linear-piece)**
     ([int](#language.types.integer))



      Función de activación lineal acotada.





     **[FANN_LINEAR_PIECE_SYMMETRIC](#constant.fann-linear-piece-symmetric)**
     ([int](#language.types.integer))



      Función de activación lineal acotada.





     **[FANN_SIN_SYMMETRIC](#constant.fann-sin-symmetric)**
     ([int](#language.types.integer))



      Función de activación sinusal periódica.





     **[FANN_COS_SYMMETRIC](#constant.fann-cos-symmetric)**
     ([int](#language.types.integer))



      Función de activación cosinusal periódica.





     **[FANN_SIN](#constant.fann-sin)**
     ([int](#language.types.integer))



      Función de activación sinusal periódica.





     **[FANN_COS](#constant.fann-cos)**
     ([int](#language.types.integer))



      Función de activación cosinusal periódica.


**Funciones de error utilizadas durante el entrenamiento**

     **[FANN_ERRORFUNC_LINEAR](#constant.fann-errorfunc-linear)**
     ([int](#language.types.integer))



      Función de error lineal estándar.





     **[FANN_ERRORFUNC_TANH](#constant.fann-errorfunc-tanh)**
     ([int](#language.types.integer))



      Función de erorr tanh, normalmente mejor, aunque puede requerir un índice de aprendizaje menor. Esta función de error
      dirige de forma agresiva las salidas que difieren mucho de las deseadas, mientras que no dirige las salidas que únicamente difieren más bien poco.
      No se recomienda para el entrenamiento en cascada o incremental.


**Criterios de parada utilizados durante el entrenamiento**

     **[FANN_STOPFUNC_MSE](#constant.fann-stopfunc-mse)**
     ([int](#language.types.integer))



      El criterio de parada el es valor del Error Cuadrático Medio (ECM - MSE por sus siglas en inglés).





     **[FANN_STOPFUNC_BIT](#constant.fann-stopfunc-bit)**
     ([int](#language.types.integer))



      El criterio de parada es el número de bit que fallan. El número de bit significa el número de neuronas de salida
      que difieren más del límite de fallo de bit (véanse fann_get_bit_fail_limit y fann_set_bit_fail_limit). Los bit se cuentan
      en todos los datos de entrenamiento, por lo que este número puede ser mayor que el número de datos de entrenamiento.


**Definición de los tipos de redes empleados por [fann_get_network_type()](#function.fann-get-network-type)**

     **[FANN_NETTYPE_LAYER](#constant.fann-nettype-layer)**
     ([int](#language.types.integer))



      Cada capa únicamente posee conexiones a la siguiente capa.





     **[FANN_NETTYPE_SHORTCUT](#constant.fann-nettype-shortcut)**
     ([int](#language.types.integer))



      Cada capa posee conexiones a todas las capas siguientes.


**Errores**

     **[FANN_E_NO_ERROR](#constant.fann-e-no-error)**
     ([int](#language.types.integer))



      Sin errores.





     **[FANN_E_CANT_OPEN_CONFIG_R](#constant.fann-e-cant-open-config-r)**
     ([int](#language.types.integer))



      No se puede abrir el fichero de configuración para lectura.





     **[FANN_E_CANT_OPEN_CONFIG_W](#constant.fann-e-cant-open-config-w)**
     ([int](#language.types.integer))



      No se puede abrir el fichero de configuración para escritura.





     **[FANN_E_WRONG_CONFIG_VERSION](#constant.fann-e-wrong-config-version)**
     ([int](#language.types.integer))



      Versión errónea del fichero de configuración.





     **[FANN_E_CANT_READ_CONFIG](#constant.fann-e-cant-read-config)**
     ([int](#language.types.integer))



      Error al leer información del fichero de configuración.





     **[FANN_E_CANT_READ_NEURON](#constant.fann-e-cant-read-neuron)**
     ([int](#language.types.integer))



      Error al leer información de neuronas desde el fichero de configuración.





     **[FANN_E_CANT_READ_CONNECTIONS](#constant.fann-e-cant-read-connections)**
     ([int](#language.types.integer))



      Error al leer conexiones desde el fichero de configuración.





     **[FANN_E_WRONG_NUM_CONNECTIONS](#constant.fann-e-wrong-num-connections)**
     ([int](#language.types.integer))



      Número de conexiones diferente del esperado.





     **[FANN_E_CANT_OPEN_TD_W](#constant.fann-e-cant-open-td-w)**
     ([int](#language.types.integer))



      No se puede abrir el fichero de datos de entrenamiento para escritura.





     **[FANN_E_CANT_OPEN_TD_R](#constant.fann-e-cant-open-td-r)**
     ([int](#language.types.integer))



      No se puede abrir el fichero de datos de entrenamiento para lectura.





     **[FANN_E_CANT_READ_TD](#constant.fann-e-cant-read-td)**
     ([int](#language.types.integer))



      Error al leer datos de entrenamiento desde el fichero.





     **[FANN_E_CANT_ALLOCATE_MEM](#constant.fann-e-cant-allocate-mem)**
     ([int](#language.types.integer))



      No se puede asignar memoria.





     **[FANN_E_CANT_TRAIN_ACTIVATION](#constant.fann-e-cant-train-activation)**
     ([int](#language.types.integer))



      No se puede entrenar con la función de activación seleccionada.





     **[FANN_E_CANT_USE_ACTIVATION](#constant.fann-e-cant-use-activation)**
     ([int](#language.types.integer))



      No se puede utilizar la función de activación seleccionada.





     **[FANN_E_TRAIN_DATA_MISMATCH](#constant.fann-e-train-data-mismatch)**
     ([int](#language.types.integer))



      Diferencias irreconciliables entre dos estructuras fann_train_data.





     **[FANN_E_CANT_USE_TRAIN_ALG](#constant.fann-e-cant-use-train-alg)**
     ([int](#language.types.integer))



      No se puede utilizar el algoritmo de entrenamiento seleccionado.





     **[FANN_E_TRAIN_DATA_SUBSET](#constant.fann-e-train-data-subset)**
     ([int](#language.types.integer))



      Intento de tomar un subconjunto que no está dentro del conjunto de entrenamiento.





     **[FANN_E_INDEX_OUT_OF_BOUND](#constant.fann-e-index-out-of-bound)**
     ([int](#language.types.integer))



      Índice fuera de los límites.





     **[FANN_E_SCALE_NOT_PRESENT](#constant.fann-e-scale-not-present)**
     ([int](#language.types.integer))



      No están presentes los parámetro de escala.





     **[FANN_E_INPUT_NO_MATCH](#constant.fann-e-input-no-match)**
     ([int](#language.types.integer))



      El número de neuronas de entrada en los datos de la Red Neuronal Artificial (RNA - ANN por sus siglas en inglés) no coinciden.





     **[FANN_E_OUTPUT_NO_MATCH](#constant.fann-e-output-no-match)**
     ([int](#language.types.integer))



      El número de neuronas de salida en los datos de la Red Neuronal Artificial (RNA - ANN por sus siglas en inglés) no coinciden.


# Ejemplos

## Tabla de contenidos

- [Entrenamiento XOR](#fann.examples-1)

    ## Entrenamiento XOR

    Este ejemplo muestra cómo entrenar datos para una función XOR

    **Ejemplo #1 Fichero xor.data**

4 2 1
-1 -1
-1
-1 1
1
1 -1
1
1 1
-1

    **Ejemplo #2 Entrenamiento sencillo**

&lt;?php
$num_entradas = 2;
$num*salidas = 1;
$num_capas = 3;
$num_neuronas_ocultas = 3;
$error_deseado = 0.001;
$máx*épocas = 500000;
$épocas_entre_informes = 1000;

$rna = fann_create_standard($num_capas, $num_entradas, $num_neuronas_ocultas, $num_salidas);

if ($rna) {
    fann_set_activation_function_hidden($rna, FANN_SIGMOID_SYMMETRIC);
fann_set_activation_function_output($rna, FANN_SIGMOID_SYMMETRIC);

    $nombre_fichero = dirname(__FILE__) . "/xor.data";
    if (fann_train_on_file($rna, $nombre_fichero, $máx_épocas, $épocas_entre_informes, $error_deseado))
        fann_save($rna, dirname(__FILE__) . "/xor_float.net");

    fann_destroy($rna);

}
?&gt;

Este ejemplo muestra cómo leer y ejecutar datos para una función XOR

    **Ejemplo #3 Prueba sencilla**

&lt;?php
$fichero_entrenamiento = (dirname(__FILE__) . "/xor_float.net");
if (!is_file($fichero_entrenamiento))
die("El fichero xor_float.net no ha sido creado. Ejecute simple_train.php para generarlo");

$rna = fann_create_from_file($fichero_entrenamiento);
if (!$rna)
die("No se pudo crear ANN");

$entrada = array(-1, 1);
$calc_out = fann_run($rna, $entrada);
printf("xor test (%f,%f) -&gt; %f\n", $entrada[0], $entrada[1], $calc_out[0]);
fann_destroy($rna);
?&gt;

# Funciones de Fann

# fann_cascadetrain_on_data

(PECL fann &gt;= 1.0.0)

fann_cascadetrain_on_data — Entrena un conjunto de datos completo, por un período de tiempo utilizando el algoritmo de entrenamiento Cascade2

### Descripción

**fann_cascadetrain_on_data**(
    [resource](#language.types.resource) $ann,
    [resource](#language.types.resource) $data,
    [int](#language.types.integer) $max_neurons,
    [int](#language.types.integer) $neurons_between_reports,
    [float](#language.types.float) $desired_error
): [bool](#language.types.boolean)

La fracción de cambio de salida en cascada es un número entre 0 y 1 que determina lo grande que debería
ser el cambio del valor de una fracción de [fann_get_MSE()](#function.fann-get-mse) en [fann_get_cascade_output_stagnation_epochs()](#function.fann-get-cascade-output-stagnation-epochs)
durante el entrenamiento de las conexiones de salida, para que el entrenamiento no se estanque. Si el entrenamiento se estanca,
el entrenamiento de las conexiones de salida finalizará y se prepararán nuevas candidatas.

Este entrenamiento emplea los parámetros establecidos en las funciones fann*set_cascade*..., aunque también emplea otro algoritmo de entrenamiento
debido a su algoritmo de entrenamiento interno. Este algoritmo se puede establecer a **[FANN_TRAIN_RPROP](#constant.fann-train-rprop)** o
**[FANN_TRAIN_QUICKPROP](#constant.fann-train-quickprop)** mediante [fann_set_training_algorithm()](#function.fann-set-training-algorithm), y los parámetros
establecidos para estos algoritmos de entrenamiento también afectarán al entrenamiento en cascada.

### Parámetros

    ann

     Recurso de red neuronal.





    data

     Recurso de datos de entrenamiento de la red neuronal.





    max_neurons


      El número máximo de neuronas a añadir a la red neuronal.






    neurons_between_reports


      El número de neuronas entre impresiones de informes de estado. Un valor de cero significa que no deberían imprimirse informes.






    desired_error


      El [fann_get_MSE()](#function.fann-get-mse) o [fann_get_bit_fail()](#function.fann-get-bit-fail) deseados,
      dependiendo de la función de parada elegida mediante [fann_set_train_stop_function()](#function.fann-set-train-stop-function).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_cascadetrain_on_file()](#function.fann-cascadetrain-on-file) - Entrena una red neuronal sobre un conjunto completo de datos durante un período de tiempo utilizando el algoritmo de entrenamiento Cascade2

# fann_cascadetrain_on_file

(PECL fann &gt;= 1.0.0)

fann_cascadetrain_on_file — Entrena una red neuronal sobre un conjunto completo de datos durante un período de tiempo utilizando el algoritmo de entrenamiento Cascade2

### Descripción

**fann_cascadetrain_on_file**(
    [resource](#language.types.resource) $ann,
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $max_neurons,
    [int](#language.types.integer) $neurons_between_reports,
    [float](#language.types.float) $desired_error
): [bool](#language.types.boolean)

Realiza la misma operación que [fann_cascadetrain_on_data()](#function.fann-cascadetrain-on-data), pero lee los datos de entrenamiento directamente desde un fichero.

### Parámetros

    ann

     Recurso de red neuronal.





    filename


      Un fichero que contiene los datos para el entrenamiento.






    max_neurons


      El número máximo de neuronas a añadir a la red neuronal.






    neurons_between_reports


      El número de neuronas entre la impresión de un informe de estado. Un valor de cero indica que no debe mostrarse ningún informe.






    desired_error


      La [fann_get_MSE()](#function.fann-get-mse) o [fann_get_bit_fail()](#function.fann-get-bit-fail) deseada,
      según la función de parada seleccionada por [fann_set_train_stop_function()](#function.fann-set-train-stop-function).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_cascadetrain_on_data()](#function.fann-cascadetrain-on-data) - Entrena un conjunto de datos completo, por un período de tiempo utilizando el algoritmo de entrenamiento Cascade2

# fann_clear_scaling_params

(PECL fann &gt;= 1.0.0)

fann_clear_scaling_params — Limpia los parámetros de escala

### Descripción

**fann_clear_scaling_params**([resource](#language.types.resource) $ann): [bool](#language.types.boolean)

Limpia los parámetros de escala.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

# fann_copy

(PECL fann &gt;= 1.0.0)

fann_copy — Crea una copia de una estructura fann

### Descripción

**fann_copy**([resource](#language.types.resource) $ann): [resource](#language.types.resource)

Crea una copia de una estructura fann.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Devuelve una copia de un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_test()](#function.fann-test) - Realiza una prueba con un conjunto de entradas y un conjunto de salidas deseadas

# fann_create_from_file

(PECL fann &gt;= 1.0.0)

fann_create_from_file — Construye una red neuronal de retropropagación desde un fichero de configuración

### Descripción

**fann_create_from_file**([string](#language.types.string) $configuration_file): [resource](#language.types.resource)

Construye una red neuronal de retropropagación desde un fichero de configuración, el cual ha sido guardado mediante [fann_save()](#function.fann-save).

### Parámetros

    configuration_file


      La ruta al fichero de configuración.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fann_save()](#function.fann-save) - Guarda la red completa a un fichero de configuración

# fann_create_shortcut

(PECL fann &gt;= 1.0.0)

fann_create_shortcut — Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

### Descripción

**fann_create_shortcut**(
    [int](#language.types.integer) $num_layers,
    [int](#language.types.integer) $num_neurons1,
    [int](#language.types.integer) $num_neurons2,
    [int](#language.types.integer) ...$num_neuronsN
): [resource](#language.types.resource)

Creates a standard backpropagation neural network, which is not fully connected and which also has shortcut connections.

Las conexiones de atajo son conexiones que saltan capas. Una red completamente conectada con conexiones de atajo es una red
donde todas las neuronas están conectadas a todas las neuronas de capas posteriores, incluyendo conexiones directas entre la capa de entrada y la de salida.

### Parámetros

    num_layers


      El número total de capas incluyendo la capa de entrada y de salida.






    num_neurons1


      El número de neuronas de la primera capa.






    num_neurons2


      El número de neuronas de la segunda capa.






    num_neuronsN


      El número de neuronas de la otras capas.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_create_shortcut_array()](#function.fann-create-shortcut-array) - Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

    - [fann_create_sparse()](#function.fann-create-sparse) - Crea una red neuronal de retropropagación estándar que no está conectada completamente

    - [fann_create_standard()](#function.fann-create-standard) - Crea una red neuronal de retropropagación estándar completamente conectada

# fann_create_shortcut_array

(PECL fann &gt;= 1.0.0)

fann_create_shortcut_array — Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

### Descripción

**fann_create_shortcut_array**([int](#language.types.integer) $num_layers, [array](#language.types.array) $layers): [resource](#language.types.resource)

Crea una red neuronal de retropropagación estándar que no está completamente conectada y que tiene conexiones de atajo, empleando un array con tamaños de capas.

### Parámetros

    num_layers


      El número total de capas incluyendo la capa de entrada y de salida.






    layers


      Un array con los tamaños de las capas.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_create_shortcut()](#function.fann-create-shortcut) - Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

    - [fann_create_sparse()](#function.fann-create-sparse) - Crea una red neuronal de retropropagación estándar que no está conectada completamente

    - [fann_create_standard()](#function.fann-create-standard) - Crea una red neuronal de retropropagación estándar completamente conectada

# fann_create_sparse

(PECL fann &gt;= 1.0.0)

fann_create_sparse — Crea una red neuronal de retropropagación estándar que no está conectada completamente

### Descripción

**fann_create_sparse**(
    [float](#language.types.float) $connection_rate,
    [int](#language.types.integer) $num_layers,
    [int](#language.types.integer) $num_neurons1,
    [int](#language.types.integer) $num_neurons2,
    [int](#language.types.integer) ...$num_neuronsN
): [resource](#language.types.resource)

Crea una red neuronal de retropropagación estándar que no está conectada completamente.

### Parámetros

    connection_rate


      El índice de conexión controla cuántas conexiones habrá en la red. Si el índice de conexión
      está establecido a 1, la red estará completamente conectada, aunque si está establecida a 0.5, solamente se establecerán
      la mitad de las conexiones. Un índice de conexión de 1 generará el mismo resultado que [fann_create_standard()](#function.fann-create-standard).






    num_layers


      El número total de capas incluyendo la capa de entrada y de salida.






    num_neurons1


      El número de neuronas de la primera capa.






    num_neurons2


      El número de neuronas de la segunda capa.






    num_neuronsN


      El número de neuronas de la otras capas.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_create_sparse_array()](#function.fann-create-sparse-array) - Crea una red neuronal de retropropagación estándar que no está completamente conectada empleando un array con tamaños de capas

    - [fann_create_standard()](#function.fann-create-standard) - Crea una red neuronal de retropropagación estándar completamente conectada

    - [fann_create_shortcut()](#function.fann-create-shortcut) - Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

# fann_create_sparse_array

(PECL fann &gt;= 1.0.0)

fann_create_sparse_array — Crea una red neuronal de retropropagación estándar que no está completamente conectada empleando un array con tamaños de capas

### Descripción

**fann_create_sparse_array**([float](#language.types.float) $connection_rate, [int](#language.types.integer) $num_layers, [array](#language.types.array) $layers): [resource](#language.types.resource)

Crea una red neuronal de retropropagación estándar que no está completamente conectada empleando un array con tamaños de capas

### Parámetros

    connection_rate


      El índice de conexión controla cuántas conexiones habrá en la red. Si el índice de conexión
      está establecido a 1, la red estará completamente conectada, aunque si está establecida a 0.5, solamente se establecerán
      la mitad de las conexiones. Un índice de conexión de 1 generará el mismo resultado que [fann_create_standard()](#function.fann-create-standard).






    num_layers


      El número total de capas incluyendo la capa de entrada y de salida.






    layers


      Un array con los tamaños de las capas.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_create_sparse()](#function.fann-create-sparse) - Crea una red neuronal de retropropagación estándar que no está conectada completamente

    - [fann_create_standard()](#function.fann-create-standard) - Crea una red neuronal de retropropagación estándar completamente conectada

    - [fann_create_shortcut()](#function.fann-create-shortcut) - Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

# fann_create_standard

(PECL fann &gt;= 1.0.0)

fann_create_standard — Crea una red neuronal de retropropagación estándar completamente conectada

### Descripción

**fann_create_standard**(
    [int](#language.types.integer) $num_layers,
    [int](#language.types.integer) $num_neurons1,
    [int](#language.types.integer) $num_neurons2,
    [int](#language.types.integer) ...$num_neuronsN
): [resource](#language.types.resource)

Crea una red neuronal de retropropagación estándar completamente conectada.

Habrá una neurona de tendencia en cada capa (excepto en la de salida),
y dicha neurona estará conectada a todas las neuronas de la siguiente capa.
Al ejecutar la red, los nodos de tendencia siempre emiten 1.

Para destruir una red neuronal, utilice la función [fann_destroy()](#function.fann-destroy).

### Parámetros

    num_layers


      El número total de capas incluyendo la capa de entrada y de salida.






    num_neurons1


      El número de neuronas de la primera capa.






    num_neurons2


      El número de neuronas de la segunda capa.






    num_neuronsN


      El número de neuronas de la otras capas.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_create_standard_array()](#function.fann-create-standard-array) - Crea una red neuronal de retropropagación estándar completamente conectada empleando un array con tamaños de capas

    - [fann_create_sparse()](#function.fann-create-sparse) - Crea una red neuronal de retropropagación estándar que no está conectada completamente

    - [fann_create_shortcut()](#function.fann-create-shortcut) - Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

# fann_create_standard_array

(PECL fann &gt;= 1.0.0)

fann_create_standard_array — Crea una red neuronal de retropropagación estándar completamente conectada empleando un array con tamaños de capas

### Descripción

**fann_create_standard_array**([int](#language.types.integer) $num_layers, [array](#language.types.array) $layers): [resource](#language.types.resource)

Crea una red neuronal de retropropagación estándar completamente conectada.

Habrá una neurona de tendencia en cada capa (excepto en la de salida),
y dicha neurona estará conectada a todas las neuronas de la siguiente capa.
Al ejecutar la red, los nodos de tendencia siempre emiten 1.

Para destruir una red neuronal, utilice la función [fann_destroy()](#function.fann-destroy).

### Parámetros

    num_layers


      El número total de capas incluyendo la capa de entrada y de salida.






    layers


      Un array con los tamaños de las capas.


### Valores devueltos

Devuelve un recurso de red neuronal en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_create_standard()](#function.fann-create-standard) - Crea una red neuronal de retropropagación estándar completamente conectada

    - [fann_create_sparse()](#function.fann-create-sparse) - Crea una red neuronal de retropropagación estándar que no está conectada completamente

    - [fann_create_shortcut()](#function.fann-create-shortcut) - Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo

# fann_create_train

(PECL fann &gt;= 1.0.0)

fann_create_train — Crea una estructura de datos de entrenamiento vacía

### Descripción

**fann_create_train**([int](#language.types.integer) $num_data, [int](#language.types.integer) $num_input, [int](#language.types.integer) $num_output): [resource](#language.types.resource)

Crea una estructura de datos de entrenamiento vacía.

### Parámetros

    num_data


      El número de datos de entrenamiento






    num_input


      El número de entradas por datos de entrenamiento






    num_output


      El número de salidas por datos de entrenamiento


### Valores devueltos

Devuelve un recurso de datos de entrenamiento en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_read_train_from_file()](#function.fann-read-train-from-file) - Lee un fichero que almacena datos de entrenamiento

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_destroy_train()](#function.fann-destroy-train) - Destruye los datos de entrenamiento

    - [fann_save_train()](#function.fann-save-train) - Guarda la estructura de entrenamiento en un fichero

# fann_create_train_from_callback

(PECL fann &gt;= 1.0.0)

fann_create_train_from_callback — Crea una estructura de datos de entrenamiento desde una función proporcionada por el usuario

### Descripción

**fann_create_train_from_callback**(
    [int](#language.types.integer) $num_data,
    [int](#language.types.integer) $num_input,
    [int](#language.types.integer) $num_output,
    [callable](#language.types.callable) $user_function
): [resource](#language.types.resource)

Crea una estructura de datos de entrenamiento desde una función proporcionada por el usuario. Debido a que los datos de entrenamiento se numeran (datos 1, datos 2...),
el usuario debe escribir una función que reciba el número del conjunto de datos de entrenamiento (entrada, salida) y que devuelva el conjunto.

### Parámetros

    num_data


      El número de datos de entrenamiento






    num_input


      El número de entradas por datos de entrenamiento






    num_output


      El número de salidas por datos de entrenamiento






    user_function


      La función proporcionada por elusuario con los siguientes parámetros:



       - num - El número del conjunto de datos de entrenamiento

       - num_input - El número de entradas por datos de entrenamiento

       - num_output - El número de salidas por datos de entrenamiento




      La función debería devolver un array asociativo con las claves input y output y
      con dos valores para la entrada y la salida.


### Valores devueltos

Devuelve un recurso de datos de entrenamiento en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de fann_create_train_from_callback()**

&lt;?php
function create_train_callback($num_data, $num_input, $num_output) {
return array(
"input" =&gt; array_fill(0, $num_input, 1),
"output" =&gt; array_fill(0, $num_output, 1),
);
}

$num_data = 3;
$num_input = 2;
$num_output = 1;
$train_data = fann_create_train_from_callback($num_data, $num_input, $num_output, "create_train_callback");
if ($train_data) {
// Hacer algo con $train_data
}
?&gt;

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_read_train_from_file()](#function.fann-read-train-from-file) - Lee un fichero que almacena datos de entrenamiento

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_destroy_train()](#function.fann-destroy-train) - Destruye los datos de entrenamiento

    - [fann_save_train()](#function.fann-save-train) - Guarda la estructura de entrenamiento en un fichero

# fann_descale_input

(PECL fann &gt;= 1.0.0)

fann_descale_input — Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados

### Descripción

**fann_descale_input**([resource](#language.types.resource) $ann, [array](#language.types.array) $input_vector): [bool](#language.types.boolean)

Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados.

### Parámetros

    ann

     Recurso de red neuronal.





    input_vector


      El vector de entrada a desescalar


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_scale_input()](#function.fann-scale-input) - Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados

    - [fann_descale_output()](#function.fann-descale-output) - Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados

# fann_descale_output

(PECL fann &gt;= 1.0.0)

fann_descale_output — Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados

### Descripción

**fann_descale_output**([resource](#language.types.resource) $ann, [array](#language.types.array) $output_vector): [bool](#language.types.boolean)

Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados.

### Parámetros

    ann

     Recurso de red neuronal.





    output_vector


      El vector de salida a desescalar


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_scale_output()](#function.fann-scale-output) - Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados

    - [fann_descale_input()](#function.fann-descale-input) - Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados

# fann_descale_train

(PECL fann &gt;= 1.0.0)

fann_descale_train — Descalar datos de entrada y salida basados en parámetros previamente calculados

### Descripción

**fann_descale_train**([resource](#language.types.resource) $ann, [resource](#language.types.resource) $train_data): [bool](#language.types.boolean)

Descalar datos de entrada y salida basados en parámetros previamente calculados.

### Parámetros

    ann

     Recurso de red neuronal.





    train_data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_scale_train()](#function.fann-scale-train) - Escalar datos de entrada y salida basados en parámetros previamente calculados

    - [fann_set_scaling_params()](#function.fann-set-scaling-params) - Calcular los parámetros de escala de entrada y salida para un uso futuro basados en datos de entrenamiento

# fann_destroy

(PECL fann &gt;= 1.0.0)

fann_destroy — Destruye la red por completo y libera adecuadamente toda la memoria asociada

### Descripción

**fann_destroy**([resource](#language.types.resource) $ann): [bool](#language.types.boolean)

Destruye la red por completo y libera adecuadamente toda la memoria asociada.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

# fann_destroy_train

(PECL fann &gt;= 1.0.0)

fann_destroy_train — Destruye los datos de entrenamiento

### Descripción

**fann_destroy_train**([resource](#language.types.resource) $train_data): [bool](#language.types.boolean)

Destruye los datos de entrenamiento.

### Parámetros

    train_data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

# fann_duplicate_train_data

(PECL fann &gt;= 1.0.0)

fann_duplicate_train_data — Devuelve una copia exacta de uno datos de entrenamiento de fann

### Descripción

**fann_duplicate_train_data**([resource](#language.types.resource) $data): [resource](#language.types.resource)

Devuelve una copia exacta de un [resource](#language.types.resource) de datos de entrenamiento de fann.

### Parámetros

    data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

Devuelve un recurso de datos de entrenamiento en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# fann_get_activation_function

(PECL fann &gt;= 1.0.0)

fann_get_activation_function — Devuelve la función de activación

### Descripción

**fann_get_activation_function**([resource](#language.types.resource) $ann, [int](#language.types.integer) $layer, [int](#language.types.integer) $neuron): [int](#language.types.integer)

Obtiene la función de activación para la neurona número the neuron en la capa número
layer, contando la capa de entrada como capa 0.

No es posible obtener funciones de activación para neuronas de la capa de entrada.

El valor devuelto es una de las constantes de [funciones de activación](#constants.fann-activation-funcs).

### Parámetros

    ann

     Recurso de red neuronal.





    layer


      El número de capa.






    neuron


      El número de neurona.


### Valores devueltos

Una constante de [funciones de aprendizaje](#constants.fann-train) o -1
si la neurona no está definida en la red neuronal, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_activation_function_layer()](#function.fann-set-activation-function-layer) - Establece la función de activación para todas las neuronas de la capa proporcionada

    - [fann_set_activation_function_hidden()](#function.fann-set-activation-function-hidden) - Establece la función de activación para todas las capas ocultas

    - [fann_set_activation_function_output()](#function.fann-set-activation-function-output) - Establece la función de activación para la capa de salida

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

# fann_get_activation_steepness

(PECL fann &gt;= 1.0.0)

fann_get_activation_steepness — Devuelve la pendiente de activación para el número de neurona y de capa proporcionados

### Descripción

**fann_get_activation_steepness**([resource](#language.types.resource) $ann, [int](#language.types.integer) $layer, [int](#language.types.integer) $neuron): [float](#language.types.float)

Obtiene la pendiente de activación para la neurona número neuron en la capa número
layer, contando la capa de entrada como capa 0.

No es posible obtener la pendiente de activación para neuronas de la capa de entrada.

La pendiente de una función de activación dice algo sobre cómo de rápido va la función de activación
del mínimo al máximo. Un valor alto para la función de activación proporcionará un entrenamiento más agresivo.

Cuando se entrenan redes neuronales donde los valores de salida deberían estar en los extremos
(normalmente 0 y 1, dependiendo de la función de activación), se puede emplear una función de activación (p.ej. 1.0).

La pendiente de activación predeterminada es 0.5.

### Parámetros

    ann

     Recurso de red neuronal.





    layer


      El número de capa






    neuron


      El número de neurona


### Valores devueltos

La pendiente de activación para la neurona o -1 si la neurona no está definida en la red neuronal, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

    - [fann_set_activation_steepness_layer()](#function.fann-set-activation-steepness-layer) - Establece la pendiente de activación para todas las neuronas del número de capa proporcionada

    - [fann_set_activation_steepness_hidden()](#function.fann-set-activation-steepness-hidden) - Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas

    - [fann_set_activation_steepness_output()](#function.fann-set-activation-steepness-output) - Establece la pendiente de activación de la capa de salida

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

# fann_get_bias_array

(PECL fann &gt;= 1.0.0)

fann_get_bias_array — Obtener el número de tendencias de cada capa de una red

### Descripción

**fann_get_bias_array**([resource](#language.types.resource) $ann): [array](#language.types.array)

Obtener el número de tendencias de cada capa de una red.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Un array con de números de tendencias en cada capa.

# fann_get_bit_fail

(PECL fann &gt;= 1.0.0)

fann_get_bit_fail — El número de bit fallidos

### Descripción

**fann_get_bit_fail**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de bit fallidos; es el número de neuronas de salida que difieren más del límte de fallo de bit
(véanse [fann_get_bit_fail_limit()](#function.fann-get-bit-fail-limit) y [fann_set_bit_fail_limit()](#function.fann-set-bit-fail-limit)).
Los bit se cuentan en todos los datos de entrenamiento, por lo que este número puede ser mayor que el número de datos de entrenamiento.

Este valor es reiniciado por [fann_reset_MSE()](#function.fann-reset-mse) y actualizado por las mismas funciones
que también actualizan el valor del ECM (p.ej., [fann_test_data()](#function.fann-test-data) y [fann_train_epoch()](#function.fann-train-epoch))

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de bit fallidos, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_reset_MSE()](#function.fann-reset-mse) - Reinicia el error cuadrático medio de la red

    - [fann_test_data()](#function.fann-test-data) - Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos

    - [fann_train_epoch()](#function.fann-train-epoch) - Entrenar una época con un conjunto de datos de entrenamiento

    - [fann_get_bit_fail_limit()](#function.fann-get-bit-fail-limit) - Devuelve el límite de fallo de bit empleado durante un entrenamiento

    - [fann_set_bit_fail_limit()](#function.fann-set-bit-fail-limit) - Establece el límite de fallo de bit empleado durante un entrenamiento

# fann_get_bit_fail_limit

(PECL fann &gt;= 1.0.0)

fann_get_bit_fail_limit — Devuelve el límite de fallo de bit empleado durante un entrenamiento

### Descripción

**fann_get_bit_fail_limit**([resource](#language.types.resource) $ann): [float](#language.types.float)

Devuelve el límite de fallo de bit empleado durante un entrenamiento.

El límite de fallo de bit se emplea durante un entrenamiento donde la [función de parada](#constants.fann-stopfunc)
esté establecida a **[FANN_STOPFUNC_BIT](#constant.fann-stopfunc-bit)**.

El límite es la diferencia máxima aceptada entre la salida provista y la salida real durante un entrenamiento.
Cada salida que diverja más que este límite se cuenta como un bit de error. Esta diferencia se dividide entre dos
al tratar con funciones de activación simétrica, por lo que las funciones de activación simétrica y no simétrica
pueden utilizar el mismo límite.

El límite de fallo de bit es 0.35.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El límite de fallo de bit, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_bit_fail_limit()](#function.fann-set-bit-fail-limit) - Establece el límite de fallo de bit empleado durante un entrenamiento

# fann_get_cascade_activation_functions

(PECL fann &gt;= 1.0.0)

fann_get_cascade_activation_functions — Devuelve las funciones de activación en cascada

### Descripción

**fann_get_cascade_activation_functions**([resource](#language.types.resource) $ann): [array](#language.types.array)

El array de funciones de activación en cascada es un array con las diferentes funciones de activación empleadas por las cadidatas.

Véase [fann_get_cascade_num_candidates()](#function.fann-get-cascade-num-candidates) para una descripción de las neuronas candidatas generadas por este array.

Las funciones de activación predeterminadas son **[FANN_SIGMOID](#constant.fann-sigmoid)**, **[FANN_SIGMOID_SYMMETRIC](#constant.fann-sigmoid-symmetric)**,
**[FANN_GAUSSIAN](#constant.fann-gaussian)**, **[FANN_GAUSSIAN_SYMMETRIC](#constant.fann-gaussian-symmetric)**, **[FANN_ELLIOT](#constant.fann-elliot)** y
**[FANN_ELLIOT_SYMMETRIC](#constant.fann-elliot-symmetric)**.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Las funciones de activación en cascada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_get_cascade_activation_functions_count()](#function.fann-get-cascade-activation-functions-count) - Devuelve el número de funciones de activación en cascada

    - [fann_set_cascade_activation_functions()](#function.fann-set-cascade-activation-functions) - Establece el array de funciones de activación de candidatas en cascada

# fann_get_cascade_activation_functions_count

(PECL fann &gt;= 1.0.0)

fann_get_cascade_activation_functions_count — Devuelve el número de funciones de activación en cascada

### Descripción

**fann_get_cascade_activation_functions_count**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de funciones de activación del array [fann_get_cascade_activation_functions()](#function.fann-get-cascade-activation-functions).

El número predeterminado de funciones de activación es 6.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de funciones de activación en cascada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_get_cascade_activation_functions()](#function.fann-get-cascade-activation-functions) - Devuelve las funciones de activación en cascada

    - [fann_set_cascade_activation_functions()](#function.fann-set-cascade-activation-functions) - Establece el array de funciones de activación de candidatas en cascada

# fann_get_cascade_activation_steepnesses

(PECL fann &gt;= 1.0.0)

fann_get_cascade_activation_steepnesses — Devuelve las pendientes de activación en cascada

### Descripción

**fann_get_cascade_activation_steepnesses**([resource](#language.types.resource) $ann): [array](#language.types.array)

El array de pendientes de activación en cascada es un array con las diferentes funciones de activación empleadas por las candidatas.

Véase [fann_get_cascade_num_candidates()](#function.fann-get-cascade-num-candidates) para una descripción de las neuronas candidatas generadas por este array.

Las pendientes de activación predeterminadas son {0.25, 0.50, 0.75, 1.00}.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Las pendientes de activación en cascada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_get_cascade_activation_steepnesses_count()](#function.fann-get-cascade-activation-steepnesses-count) - El número de pendientes de activación

    - [fann_set_cascade_activation_steepnesses()](#function.fann-set-cascade-activation-steepnesses) - Establece el array de pendientes de activación de candidatas en cascada

# fann_get_cascade_activation_steepnesses_count

(PECL fann &gt;= 1.0.0)

fann_get_cascade_activation_steepnesses_count — El número de pendientes de activación

### Descripción

**fann_get_cascade_activation_steepnesses_count**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de pendientes de activación del array [fann_get_cascade_activation_functions()](#function.fann-get-cascade-activation-functions).

El número de pendientes de activación predeterminado es 4.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de pendientes de activación, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_get_cascade_activation_steepnesses()](#function.fann-get-cascade-activation-steepnesses) - Devuelve las pendientes de activación en cascada

    - [fann_set_cascade_activation_functions()](#function.fann-set-cascade-activation-functions) - Establece el array de funciones de activación de candidatas en cascada

# fann_get_cascade_candidate_change_fraction

(PECL fann &gt;= 1.0.0)

fann_get_cascade_candidate_change_fraction — Devuelve la fracción de cambio de candidatas en cascada

### Descripción

**fann_get_cascade_candidate_change_fraction**([resource](#language.types.resource) $ann): [float](#language.types.float)

La fracción de cambio de candidatas en cascada es un número entre 0 y 1 que determina lo grande que debería ser el cambio del valor de una fracción de
[fann_get_MSE()](#function.fann-get-mse) en [fann_get_cascade_candidate_stagnation_epochs()](#function.fann-get-cascade-candidate-stagnation-epochs) durante el entrenamiento de las neuronas candidatas,
para que el entrenamiento no se estanque. Si el entrenamiento se estanca, el entrenamiento de las neuronas candidatas finalizará
y se seleccionarán nuevas candidatas.

Esto significa que si el ECM no cambia por una fracción de **fann_get_cascade_candidate_change_fraction()** durante
un período de [fann_get_cascade_candidate_stagnation_epochs()](#function.fann-get-cascade-candidate-stagnation-epochs), el entrenamiento de las neuronas candidatas se para
delbido a que el entrenamiento ha estancado.

Si la fracción de cambio de candidatas en cascada es baja, las neuronas candidatas serán entrenadas más, y si la fracción es alta, serán entrenadas menos.

La fracción de cambio de candidatas en cascada predeterminada es 0.01, que es equivalente a un cambio del 1% en el ECM.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

The cascade candidate change fraction, or **[false](#constant.false)** on error.

### Ver también

    - [fann_set_cascade_candidate_change_fraction()](#function.fann-set-cascade-candidate-change-fraction) - Establece la fracción de cambio de candidatas en cascada

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_get_cascade_candidate_stagnation_epochs()](#function.fann-get-cascade-candidate-stagnation-epochs) - Devuelve el número de épocas de estancamiento de candidatas en cascada

# fann_get_cascade_candidate_limit

(PECL fann &gt;= 1.0.0)

fann_get_cascade_candidate_limit — Devuelve el límite de candidatas

### Descripción

**fann_get_cascade_candidate_limit**([resource](#language.types.resource) $ann): [float](#language.types.float)

El límite de candidatas es un límite de cuánto podrían ser entrenadas las neuronas candidatas. El límite es un límite
de la proporción entre el ECM y la puntuación de la candidata.

Establecezca este valor a uno más bajo para evitar el sobreajuste, y a uno más alto si el sobreajuste no es un problema.

El límite de candidatas predetermiado es 1000.0.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El límite de candidatas, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_candidate_limit()](#function.fann-set-cascade-candidate-limit) - Establece el límite de candidatas

# fann_get_cascade_candidate_stagnation_epochs

(PECL fann &gt;= 1.0.0)

fann_get_cascade_candidate_stagnation_epochs — Devuelve el número de épocas de estancamiento de candidatas en cascada

### Descripción

**fann_get_cascade_candidate_stagnation_epochs**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de épocas de estancamiento de candidatas en cascada determina el número de entrenamiento de épocas permitido para continuar
sin cambiar el ECM por una fracción de [fann_get_cascade_candidate_change_fraction()](#function.fann-get-cascade-candidate-change-fraction).

Véase más información sobre este parámetro en [fann_get_cascade_candidate_change_fraction()](#function.fann-get-cascade-candidate-change-fraction).

El número de épocas de estancamiento de candidatas en cascada predeterminado es 12.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de épocas de estancamiento de candidatas en cascada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_candidate_stagnation_epochs()](#function.fann-set-cascade-candidate-stagnation-epochs) - Establece el número de épocas de estancamiento de candidatas en cascada

    - [fann_get_cascade_candidate_change_fraction()](#function.fann-get-cascade-candidate-change-fraction) - Devuelve la fracción de cambio de candidatas en cascada

# fann_get_cascade_max_cand_epochs

(PECL fann &gt;= 1.0.0)

fann_get_cascade_max_cand_epochs — Devuelve el máximo de épocas de candidatas

### Descripción

**fann_get_cascade_max_cand_epochs**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El máximo de épocas de cadidatas determina el número máximo de épocas que podrían ser entrenadas
las conexiones de entrada a las candidatas antes de añadir una nueva neurona candidata.

El máximo de épocas de candidatas predterminado es 150.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El máximo de épocas de candidtas, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_max_cand_epochs()](#function.fann-set-cascade-max-cand-epochs) - Establece el máximo de épocas de candidatas

# fann_get_cascade_max_out_epochs

(PECL fann &gt;= 1.0.0)

fann_get_cascade_max_out_epochs — Devuelve el máximo de épocas de salida

### Descripción

**fann_get_cascade_max_out_epochs**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El máximo de épocas de salida determina el número máximo de épocas que podrían ser entrenadas
las conexiones de salida después de añadir una nueva neurona candidata.

El máximo de épocas de salida predterminado es 150.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El máximo de épocas de salida, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_max_out_epochs()](#function.fann-set-cascade-max-out-epochs) - Establece el máximo de épocas de salida

# fann_get_cascade_min_cand_epochs

(PECL fann &gt;= 1.0.0)

fann_get_cascade_min_cand_epochs — Devuelve el mínimo de épocas de candidatas

### Descripción

**fann_get_cascade_min_cand_epochs**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El mínimo de épocas de cadidatas determina el número máximo de épocas que podrían ser entrenadas
las conexiones de entrada a las candidatas antes de añadir una nueva neurona candidata.

El mínimo de épocas de candidatas predterminado es 150.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El mínimo de épocas de candidtas, o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_set_cascade_min_cand_epochs()](#function.fann-set-cascade-min-cand-epochs) - Establece el mínimo de épocas de candidatas

# fann_get_cascade_min_out_epochs

(PECL fann &gt;= 1.0.0)

fann_get_cascade_min_out_epochs — Devuelve el mínimo de épocas de salida

### Descripción

**fann_get_cascade_min_out_epochs**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El mínimo de épocas de salida determina el número mínimo de épocas que deben ser entrenadas
las conexiones de salida después de añadir una nueva neurona candidata.

El mínimo de épocas de salida predterminado es 150.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El mínimo de épocas de salida, o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_set_cascade_min_out_epochs()](#function.fann-set-cascade-min-out-epochs) - Establece el mínimo de épocas de salida

# fann_get_cascade_num_candidate_groups

(PECL fann &gt;= 1.0.0)

fann_get_cascade_num_candidate_groups — Devuelve el número de grupos de candidatas

### Descripción

**fann_get_cascade_num_candidate_groups**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de grupos de candidatas es el número de grupos de candidatas idénticos que se emplearán durante un entrenamiento.

Este número se puede usar para tener más candidatas sin tener que definir nuevos parámetros para las candidatas.

Véase [fann_get_cascade_num_candidates()](#function.fann-get-cascade-num-candidates) para una descripción de
las neuronas candidatas generadas por este parámetro.

El número de grupos de candidatas predeterminado es 2.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de grupos de candidatas, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_num_candidate_groups()](#function.fann-set-cascade-num-candidate-groups) - Establece el número de grupos de candidatas

# fann_get_cascade_num_candidates

(PECL fann &gt;= 1.0.0)

fann_get_cascade_num_candidates — Devuelve el número de candidatas empleadas durante un entrenamiento

### Descripción

**fann_get_cascade_num_candidates**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de candidatas empleadas durante el entrenamiento (calculado multiplicando
[fann_get_cascade_activation_functions_count()](#function.fann-get-cascade-activation-functions-count),
[fann_get_cascade_activation_steepnesses_count()](#function.fann-get-cascade-activation-steepnesses-count) y
[fann_get_cascade_num_candidate_groups()](#function.fann-get-cascade-num-candidate-groups)).

Las candidatas reales están definidos por los array [fann_get_cascade_activation_functions()](#function.fann-get-cascade-activation-functions) y
[fann_get_cascade_activation_steepnesses()](#function.fann-get-cascade-activation-steepnesses). Estos array definen las funciones de activación y
las pendientes de activación empleadas por las neuronas candidatas. Si hay 2 funciones de activación en el array de funciones de activación y
3 pendientes en el array de pendientes, habrá 2x3=6 candidatas diferentes que serán entrenados. Estas 6 candidatas
diferentes se puedn copiar a varios grupos de candidatas, donde la única diferencia entre estos grupos es el peso inicial.
Si el número de grupos se establece a 2, el número de neuronas candidatas será 2x3x2=12.
El número de grupos de candidatas está definido por [fann_set_cascade_num_candidate_groups()](#function.fann-set-cascade-num-candidate-groups).

El número de candidatas predeterminado es 6x4x2 = 48

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de candidatas emleadas durante un entrenamiento, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_get_cascade_activation_functions()](#function.fann-get-cascade-activation-functions) - Devuelve las funciones de activación en cascada

    - [fann_get_cascade_activation_functions_count()](#function.fann-get-cascade-activation-functions-count) - Devuelve el número de funciones de activación en cascada

    - [fann_get_cascade_activation_steepnesses()](#function.fann-get-cascade-activation-steepnesses) - Devuelve las pendientes de activación en cascada

    - [fann_get_cascade_activation_steepnesses_count()](#function.fann-get-cascade-activation-steepnesses-count) - El número de pendientes de activación

    - [fann_get_cascade_num_candidate_groups()](#function.fann-get-cascade-num-candidate-groups) - Devuelve el número de grupos de candidatas

# fann_get_cascade_output_change_fraction

(PECL fann &gt;= 1.0.0)

fann_get_cascade_output_change_fraction — Devuelve la fracción de cambio de salida en cascada

### Descripción

**fann_get_cascade_output_change_fraction**([resource](#language.types.resource) $ann): [float](#language.types.float)

La fracción de cambio de salida en cascada es un número entre 0 y 1 que determina lo grande que debería ser el cambio del valor de una fracción de
[fann_get_MSE()](#function.fann-get-mse) en [fann_get_cascade_output_stagnation_epochs()](#function.fann-get-cascade-output-stagnation-epochs) durante el entrenamiento de las conexiones de salida,
para que el entrenamiento no se estanque. Si el entrenamiento se estanca, el entrenamiento de las conexiones de salida
finalizará y se prepararán nuevas candidatas.

Esto significa que si el ECM no cambia por una fracción de **fann_get_cascade_output_change_fraction()** durante
un período de [fann_get_cascade_output_stagnation_epochs()](#function.fann-get-cascade-output-stagnation-epochs), el entrenamiento de las conexiones de salida se
para delbido a que el entrenamiento ha estancado.

Si la fracción de cambio de salida en cascada es baja, las conexiones de salida serán entrenadas más, y si la fracción es alta,
serán entrenadas menos.

La fracción de cambio de salida en cascada predeterminada es 0.01, que es equivalente a un cambio del 1% en el ECM.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

La fracción de cambio de salida en cascada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_output_change_fraction()](#function.fann-set-cascade-output-change-fraction) - Establece la fracción de cambio de salida en cascada

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_get_cascade_output_stagnation_epochs()](#function.fann-get-cascade-output-stagnation-epochs) - Devuelve el número de épocas de estancamiento de salida en cascada

# fann_get_cascade_output_stagnation_epochs

(PECL fann &gt;= 1.0.0)

fann_get_cascade_output_stagnation_epochs — Devuelve el número de épocas de estancamiento de salida en cascada

### Descripción

**fann_get_cascade_output_stagnation_epochs**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El número de épocas de estacamiento de salida en cascada determina el número de épocas que se le permite al entrenamiento
continuar sin cambiar el ECM por una fracción de [fann_get_cascade_output_change_fraction()](#function.fann-get-cascade-output-change-fraction).

Véase más información sobre este parámetro en [fann_get_cascade_output_change_fraction()](#function.fann-get-cascade-output-change-fraction).

El número predeterminado de épocas de estancamiento de salida en cascada es 12.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de épocas de estancamiento de salida en cascada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_output_stagnation_epochs()](#function.fann-set-cascade-output-stagnation-epochs) - Establece el número de épocas de estancamiento de salida en cascada

    - [fann_get_cascade_output_change_fraction()](#function.fann-get-cascade-output-change-fraction) - Devuelve la fracción de cambio de salida en cascada

# fann_get_cascade_weight_multiplier

(PECL fann &gt;= 1.0.0)

fann_get_cascade_weight_multiplier — Devuelve el multiplicador de peso

### Descripción

**fann_get_cascade_weight_multiplier**([resource](#language.types.resource) $ann): [float](#language.types.float)

El multiplicador de peso es un parámetro que se emplea para multiplicar los pesos de la neurona candidata antes de añadir
la neurona a la red neuronal. Este parámetro está normalmente entre 0 y 1, y se emplea para hacer el entrenamiento un poco menos agresivo.

El multiplicador de peso predeterminado es 0.4.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El multiplicador de peso, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_cascade_weight_multiplier()](#function.fann-set-cascade-weight-multiplier) - Establece el multiplicador de peso

# fann_get_connection_array

(PECL fann &gt;= 1.0.0)

fann_get_connection_array — Obtener las conexiones de la red

### Descripción

**fann_get_connection_array**([resource](#language.types.resource) $ann): [array](#language.types.array)

Obtener las conexiones de la red.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Un array con las conexiones de la red.

# fann_get_connection_rate

(PECL fann &gt;= 1.0.0)

fann_get_connection_rate — Obtener el índice de conexión empleado al crear la red

### Descripción

**fann_get_connection_rate**([resource](#language.types.resource) $ann): [float](#language.types.float)

Obtener el índice de conexión empleado al crear la red.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El índice de conexión empleado al crear la red, o **[false](#constant.false)** en caso de error.

# fann_get_errno

(PECL fann &gt;= 1.0.0)

fann_get_errno — Devuelve el número del último error

### Descripción

**fann_get_errno**([resource](#language.types.resource) $errdat): [int](#language.types.integer)

Devuelve el número del último error.

### Parámetros

    errdat

     O bien un recurso de red neuronal, o un recurso de datos de entrenamiento de una red neuronal.

### Valores devueltos

El número de error, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_reset_errno()](#function.fann-reset-errno) - Reinicia el número del último error

    - [fann_get_errstr()](#function.fann-get-errstr) - Devuelve el string de último error

# fann_get_errstr

(PECL fann &gt;= 1.0.0)

fann_get_errstr — Devuelve el string de último error

### Descripción

**fann_get_errstr**([resource](#language.types.resource) $errdat): [string](#language.types.string)

Devuelve el string de último error.

### Parámetros

    errdat

     O bien un recurso de red neuronal, o un recurso de datos de entrenamiento de una red neuronal.

### Valores devueltos

El string del último error, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_reset_errstr()](#function.fann-reset-errstr) - Reinicia el string del último error

    - [fann_get_errno()](#function.fann-get-errno) - Devuelve el número del último error

# fann_get_layer_array

(PECL fann &gt;= 1.0.0)

fann_get_layer_array — Obtener el número de neuronas de cada capa de la red

### Descripción

**fann_get_layer_array**([resource](#language.types.resource) $ann): [array](#language.types.array)

Obtener el número de neuronas de cada capa de la red neuronal.

Las tendencias no se incluyen, coincidiendo así las capas con las funciones fann_create.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Un array de números de neuronas en cada capa.

# fann_get_learning_momentum

(PECL fann &gt;= 1.0.0)

fann_get_learning_momentum — Devuelve el momento del aprendizaje

### Descripción

**fann_get_learning_momentum**([resource](#language.types.resource) $ann): [float](#language.types.float)

El momento del aprendizaje se puede emplear para acelerar un entrenamiento **[FANN_TRAIN_INCREMENTAL](#constant.fann-train-incremental)**.
Sin embargo, un momento muy alto no beneficiará al entrenamiento. Establecer el momento a 0 es lo mismo que
no emplear el parmámetro del momento. El valor recomendado para el valor de este parámetro está entre 0.0 y 1.0.

El momento predeterminado es 0.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

El moemento del aprendizaje, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_learning_momentum()](#function.fann-set-learning-momentum) - Establece el momento del aprendizaje

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_get_learning_rate

(PECL fann &gt;= 1.0.0)

fann_get_learning_rate — Devuelve el índice de aprendizaje

### Descripción

**fann_get_learning_rate**([resource](#language.types.resource) $ann): [float](#language.types.float)

El índice de aprendizaje se emplea para determinar la agresividad de un entrenamiento para algunos de los algoritmo de entrenamiento
(**[FANN_TRAIN_INCREMENTAL](#constant.fann-train-incremental)**, **[FANN_TRAIN_BATCH](#constant.fann-train-batch)** y **[FANN_TRAIN_QUICKPROP](#constant.fann-train-quickprop)**).
Observe, sin embargo, que no se emplea en **[FANN_TRAIN_RPROP](#constant.fann-train-rprop)**.

El índice de aprendizaje predeterminado es 0.7.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El índice de aprendizaje, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_learning_rate()](#function.fann-set-learning-rate) - Establece el índice de aprendizaje

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_get_MSE

(PECL fann &gt;= 1.0.0)

fann_get_MSE — Lee el error cuadrático medio de la red

### Descripción

**fann_get_MSE**([resource](#language.types.resource) $ann): [float](#language.types.float)

Lee el error cuadrático medio de la red.

Este valor se calcula durante un entrenamiento o una prueba, por lo que a veces puede
estar un poco alejados si los pesos han cambiado desde el último cálculo de este valor.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El error cuadrático medio, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_test_data()](#function.fann-test-data) - Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos

# fann_get_network_type

(PECL fann &gt;= 1.0.0)

fann_get_network_type — Obtener el tipo de una red neuronal

### Descripción

**fann_get_network_type**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Obtener el tipo de una red neuronal.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Una constante de [tipo de red](#constants.fann-nettype), o **[false](#constant.false)** en caso de error.

# fann_get_num_input

(PECL fann &gt;= 1.0.0)

fann_get_num_input — Obtener el número de neuronas de entrada

### Descripción

**fann_get_num_input**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Obtener el número de neuronas de entrada.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de neuronas de entrada, o **[false](#constant.false)** en caso de error.

# fann_get_num_layers

(PECL fann &gt;= 1.0.0)

fann_get_num_layers — Obtener el número de capas de la red neuronal

### Descripción

**fann_get_num_layers**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Obtener el número de capas de la red neuronal.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de capas de la red neuronal, o **[false](#constant.false)** en caso de error.

# fann_get_num_output

(PECL fann &gt;= 1.0.0)

fann_get_num_output — Obtener el número de neuronas de salida

### Descripción

**fann_get_num_output**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Obtener el número de neuronas de salida.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número de neuronas de salida, o **[false](#constant.false)** en caso de error.

# fann_get_quickprop_decay

(PECL fann &gt;= 1.0.0)

fann_get_quickprop_decay — Devuelve la decadencia, que es un factor por el que los pesos deberían decrementar en cada iteración durante un entrenamiento quickprop

### Descripción

**fann_get_quickprop_decay**([resource](#language.types.resource) $ann): [float](#language.types.float)

La decadencia es un número pequeño negativo que es un factor por el que los pesos deberían decrementar en cada iteración
durante un entrenamiento quickprop. Se emplea para asegurarse de que los pesos no sean demasiado altos durante el entrenamiento.

La decadencia predeterminada es -0.0001.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

The decay, or **[false](#constant.false)** on error.

### Ver también

    - [fann_set_quickprop_decay()](#function.fann-set-quickprop-decay) - Establece el factor de decadencia de quickprop

# fann_get_quickprop_mu

(PECL fann &gt;= 1.0.0)

fann_get_quickprop_mu — Devuelve el factor mu

### Descripción

**fann_get_quickprop_mu**([resource](#language.types.resource) $ann): [float](#language.types.float)

El factor mu se emplea para aumentar y disminuir el tamaño del paso durante un entrenamiento quickprop. El factor mu debería
estar siempre por encima de 1, ya que, de lo contrario, lo disminuiría cuando se suponía que debía de aumentarlo.

El factor mu predeterminado es 1.75.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Ek factor mu, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_quickprop_mu()](#function.fann-set-quickprop-mu) - Establece el factor mu de quickprop

# fann_get_rprop_decrease_factor

(PECL fann &gt;= 1.0.0)

fann_get_rprop_decrease_factor — Devuelve el factor de disminución empleado durante un entrenamiento RPROP

### Descripción

**fann_get_rprop_decrease_factor**([resource](#language.types.resource) $ann): [float](#language.types.float)

El factor de disminución es un valor menor que 1, el cual se emplea para disminuir el tamaño del paso durante un entrenamiento RPROP.

El factor de disminución predeterminado es 0.5.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El factor de disminución, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_rprop_decrease_factor()](#function.fann-set-rprop-decrease-factor) - Establece el factor de disminución empleado durante un entrenamiento RPROP

# fann_get_rprop_delta_max

(PECL fann &gt;= 1.0.0)

fann_get_rprop_delta_max — Devuelve el tamaño de paso máximo

### Descripción

**fann_get_rprop_delta_max**([resource](#language.types.resource) $ann): [float](#language.types.float)

El tamaño de paso máximo es un número positivo que determina lo grande que podría ser el tamaño de paso máximo.

El valor predeterminado de delta máximo es 50.0.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El tamaño de paso máximo, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_rprop_delta_max()](#function.fann-set-rprop-delta-max) - Establece el tamaño de paso máximo

    - [fann_get_rprop_delta_min()](#function.fann-get-rprop-delta-min) - Devuelve el tamaño de paso mínimo

# fann_get_rprop_delta_min

(PECL fann &gt;= 1.0.0)

fann_get_rprop_delta_min — Devuelve el tamaño de paso mínimo

### Descripción

**fann_get_rprop_delta_min**([resource](#language.types.resource) $ann): [float](#language.types.float)

El tamaño de paso mínimo es un número positivo pequeño que determina lo pequeño que podría ser el tamaño de paso mínimo.

El valor predeterminado de delta mínimo es 0.0.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El tamaño de paso mínimo, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_rprop_delta_min()](#function.fann-set-rprop-delta-min) - Establece el tamaño de paso mínimo

# fann_get_rprop_delta_zero

(PECL fann &gt;= 1.0.0)

fann_get_rprop_delta_zero — Devuelve el tamaño de paso inicial

### Descripción

**fann_get_rprop_delta_zero**([resource](#language.types.resource) $ann): [int](#language.types.integer)

El tamaño de paso inicial es un número positivo que determina el tamaño de paso inicial.

El valor predeterminado de delta cero es 0.1.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El tamaño de paso inicial, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_rprop_delta_zero()](#function.fann-set-rprop-delta-zero) - Establece el tamaño de paso inicial

    - [fann_get_rprop_delta_min()](#function.fann-get-rprop-delta-min) - Devuelve el tamaño de paso mínimo

    - [fann_get_rprop_delta_max()](#function.fann-get-rprop-delta-max) - Devuelve el tamaño de paso máximo

# fann_get_rprop_increase_factor

(PECL fann &gt;= 1.0.0)

fann_get_rprop_increase_factor — Devuelve el factor de aumento empleado durante un entrenamiento RPROP

### Descripción

**fann_get_rprop_increase_factor**([resource](#language.types.resource) $ann): [float](#language.types.float)

El factor de aumento es un valor mayor que 1, el cual se emplea para aumentar el tamaño del paso durante un entrenamiento RPROP.

El factor de aumento predeterminado es 1.2.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El factor de aumento, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_rprop_increase_factor()](#function.fann-set-rprop-increase-factor) - Establece el factor de aumento empleado durante un entrenamiento RPROP

# fann_get_sarprop_step_error_shift

(PECL fann &gt;= 1.0.0)

fann_get_sarprop_step_error_shift — Devuelve el desplazamiento del error de paso de sarprop

### Descripción

**fann_get_sarprop_step_error_shift**([resource](#language.types.resource) $ann): [float](#language.types.float)

Devuelve el desplazamiento del error de paso de sarprop.

El desplazamiento del error de paso predeterminado es 1.385.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El desplazamiento del error de paso de sarprop , o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_set_sarprop_step_error_shift()](#function.fann-set-sarprop-step-error-shift) - Establece el desplazamiento del error de paso de sarprop

# fann_get_sarprop_step_error_threshold_factor

(PECL fann &gt;= 1.0.0)

fann_get_sarprop_step_error_threshold_factor — Devuelve el factor de umbral del error de paso de sarprop

### Descripción

**fann_get_sarprop_step_error_threshold_factor**([resource](#language.types.resource) $ann): [float](#language.types.float)

Devuelve el factor de umbral del error de paso de sarprop.

El factor predeterminado es 0.1.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El factor de umbral del error de paso de sarprop, o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_set_sarprop_step_error_threshold_factor()](#function.fann-set-sarprop-step-error-threshold-factor) - Establece el factor de umbral del error de paso de sarprop

# fann_get_sarprop_temperature

(PECL fann &gt;= 1.0.0)

fann_get_sarprop_temperature — Devuelve la temperatura de sarprop

### Descripción

**fann_get_sarprop_temperature**([resource](#language.types.resource) $ann): [float](#language.types.float)

Devuelve la temperatura de sarprop.

La temperatura predeterminada es 0.015.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

La temperatura de sarprop, o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_set_sarprop_temperature()](#function.fann-set-sarprop-temperature) - Establece la temperatura de sarprop

# fann_get_sarprop_weight_decay_shift

(PECL fann &gt;= 1.0.0)

fann_get_sarprop_weight_decay_shift — Devuelve el desplazamiento de decadencia del peso de sarprop

### Descripción

**fann_get_sarprop_weight_decay_shift**([resource](#language.types.resource) $ann): [float](#language.types.float)

Devuelve el desplazamiento de decadencia del peso de sarprop.

El valor de delta máximo es -6.644.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El desplazamiento de decadencia del peso de sarprop, o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_set_sarprop_weight_decay_shift()](#function.fann-set-sarprop-weight-decay-shift) - Establece el desplazamiento de decadencia del peso de sarprop

# fann_get_total_connections

(PECL fann &gt;= 1.0.0)

fann_get_total_connections — Obtener el número total de conexiones de la red completa

### Descripción

**fann_get_total_connections**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Obtener el número total de conexiones de la red completa.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número total de conexiones de la red completa, o **[false](#constant.false)** en caso de error.

# fann_get_total_neurons

(PECL fann &gt;= 1.0.0)

fann_get_total_neurons — Obtener el número total de neuronas de la red completa

### Descripción

**fann_get_total_neurons**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Obtener el número total de neuronas de la red completa. Este número también incluye las neuronas de tendencia,
por lo que una red 2-4-2 posee 2+4+2 +2(tendencias) = 10 neuronas.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

El número total de neuronas de la red completa, o **[false](#constant.false)** en caso de error.

# fann_get_train_error_function

(PECL fann &gt;= 1.0.0)

fann_get_train_error_function — Devuelve la función de error empleada durante un entrenamiento

### Descripción

**fann_get_train_error_function**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Devuelve la función de error empleada durante un entrenamiento.

Las funciones de error están descritas en las constantes de [funciones de error](#constants.fann-errorfunc).

La función de error predeteminada es **[FANN_ERRORFUNC_TANH](#constant.fann-errorfunc-tanh)**.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

La constante de [función de error](#constants.fann-errorfunc), o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_train_error_function()](#function.fann-set-train-error-function) - Establecer la función de error empleada durante un entrenamiento

# fann_get_train_stop_function

(PECL fann &gt;= 1.0.0)

fann_get_train_stop_function — Devuelve la función de parada empleada durante el entrenamiento

### Descripción

**fann_get_train_stop_function**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Devuelve la función de parada empleada durante el entrenamiento.

Las funciones de parada están descritas en las constantes de [funciones de parada](#constants.fann-stopfunc).

La función de parada predeterminada es **[FANN_STOPFUNC_MSE](#constant.fann-stopfunc-mse)**.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

La constante de [función de parada](#constants.fann-stopfunc), o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_train_stop_function()](#function.fann-set-train-stop-function) - Establece la función de parada empleada durante el entrenamiento

# fann_get_training_algorithm

(PECL fann &gt;= 1.0.0)

fann_get_training_algorithm — Devuelve el algoritmo de entrenamiento

### Descripción

**fann_get_training_algorithm**([resource](#language.types.resource) $ann): [int](#language.types.integer)

Devuelve el algoritmo de entrenamiento. Este algoritmo lo utilizan [fann_train_on_data()](#function.fann-train-on-data) y funciones asociadas.

Observe que este algoritmo también se emplea durante [fann_cascadetrain_on_data()](#function.fann-cascadetrain-on-data), aunque solamente
están permitidos **[FANN_TRAIN_RPROP](#constant.fann-train-rprop)** y **[FANN_TRAIN_QUICKPROP](#constant.fann-train-quickprop)** durante un entrenamiento en cascada.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

La constante de [Algoritmo de entrenamiento](#constants.fann-train), o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_init_weights

(PECL fann &gt;= 1.0.0)

fann_init_weights — Inicializar los pesos empleando el algoritmo de Widrow + Nguyen

### Descripción

**fann_init_weights**([resource](#language.types.resource) $ann, [resource](#language.types.resource) $train_data): [bool](#language.types.boolean)

Inicializar los pesos empleando el algoritmo de Widrow + Nguyen.

Esta función tiene un comportamiento similar a [fann_randomize_weights()](#function.fann-randomize-weights). Empleará el algoritmo desarrollado por
Derrick Nguyen y Bernard Widrow para establecer los pesos de tal forma que aceleren el entrenamiento. Esta técnica no siempre
funciona, por lo que en algunos casos puede ser menoes eficiente que una simple inicialización aleatoria.

El algoritmo requiere el acceso al rango de datos de entrada (por ejemplo, entradas mayores y menores), por lo que
acepta un segundo parámetro, data, que son los datos de entrenamiento que se emplearán para entrenar la red.

### Parámetros

    ann

     Recurso de red neuronal.





    train_data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

     - [fann_randomize_weights()](#function.fann-randomize-weights) - Dar a cada conexión un peso aleatorio entre min_weight y max_weight

     - [fann_read_train_from_file()](#function.fann-read-train-from-file) - Lee un fichero que almacena datos de entrenamiento

# fann_length_train_data

(PECL fann &gt;= 1.0.0)

fann_length_train_data — Devuelve el número de patrones de entrenamiento de los datos de entrenamiento

### Descripción

**fann_length_train_data**([resource](#language.types.resource) $data): [int](#language.types.integer)

Devuelve el número de patrones de entrenamiento del [resource](#language.types.resource) de datos de entrenamiento.

### Parámetros

    data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

El número de elementos del [resource](#language.types.resource) de datos de entrenamiento, o **[false](#constant.false)** en caso de error.

# fann_merge_train_data

(PECL fann &gt;= 1.0.0)

fann_merge_train_data — Funde los datos de entrenamiento

### Descripción

**fann_merge_train_data**([resource](#language.types.resource) $data1, [resource](#language.types.resource) $data2): [resource](#language.types.resource)

Funde los datos de data1 y data2 en un nuevo [resource](#language.types.resource) de datos de entrenamiento.

### Parámetros

    data1

     Recurso de datos de entrenamiento de la red neuronal.





    data2

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

El nuevo [resource](#language.types.resource) de datos de entrenamiento fundido, o **[false](#constant.false)** en caso de error.

# fann_num_input_train_data

(PECL fann &gt;= 1.0.0)

fann_num_input_train_data — Devuelve el número de entradas de cada patrón de entrenamiento de los datos de entrenamiento

### Descripción

**fann_num_input_train_data**([resource](#language.types.resource) $data): [int](#language.types.integer)

Devuelve el número de entradas de cada patrón de entrenamiento del [resource](#language.types.resource) de datos de entrenamiento.

### Parámetros

    data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

El número de entradas, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_length_train_data()](#function.fann-length-train-data) - Devuelve el número de patrones de entrenamiento de los datos de entrenamiento

    - [fann_num_output_train_data()](#function.fann-num-output-train-data) - Devuelve el número de salidas de cada patrón de entrenamiento de los datos de entrenamiento

# fann_num_output_train_data

(PECL fann &gt;= 1.0.0)

fann_num_output_train_data — Devuelve el número de salidas de cada patrón de entrenamiento de los datos de entrenamiento

### Descripción

**fann_num_output_train_data**([resource](#language.types.resource) $data): [int](#language.types.integer)

Devuelve el número de salidas de cada patrón de entrenamiento del [resource](#language.types.resource) de datos de entrenamiento.

### Parámetros

    data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

El número de salidas, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_length_train_data()](#function.fann-length-train-data) - Devuelve el número de patrones de entrenamiento de los datos de entrenamiento

    - [fann_num_input_train_data()](#function.fann-num-input-train-data) - Devuelve el número de entradas de cada patrón de entrenamiento de los datos de entrenamiento

# fann_print_error

(PECL fann &gt;= 1.0.0)

fann_print_error — Imprime el string de error

### Descripción

**fann_print_error**([resource](#language.types.resource) $errdat): [void](language.types.void.html)

Imprime el string de error.

### Parámetros

    errdat

     O bien un recurso de red neuronal, o un recurso de datos de entrenamiento de una red neuronal.

### Valores devueltos

No devuelve ningún valor.

### Ver también

    - [fann_get_errstr()](#function.fann-get-errstr) - Devuelve el string de último error

# fann_randomize_weights

(PECL fann &gt;= 1.0.0)

fann_randomize_weights — Dar a cada conexión un peso aleatorio entre min_weight y max_weight

### Descripción

**fann_randomize_weights**([resource](#language.types.resource) $ann, [float](#language.types.float) $min_weight, [float](#language.types.float) $max_weight): [bool](#language.types.boolean)

Dar a cada conexión un peso aleatorio entre min_weight y max_weight.

Desde el comienzo, los pesos son aleatorios, entre -0.1 y 0.1.

### Parámetros

    ann

     Recurso de red neuronal.





    min_weight


      El valor del peso máximo.






    max_weight


      El valor del peso mínimo.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_init_weights()](#function.fann-init-weights) - Inicializar los pesos empleando el algoritmo de Widrow + Nguyen

# fann_read_train_from_file

(PECL fann &gt;= 1.0.0)

fann_read_train_from_file — Lee un fichero que almacena datos de entrenamiento

### Descripción

**fann_read_train_from_file**([string](#language.types.string) $filename): [resource](#language.types.resource)

Lee un fichero que almacena datos de entrenamiento.

### Parámetros

    filename


      El fichero de entrada con el siguiente formato:





número_datos_entrenamiento número_entradas número_salidas
datos de entrada separados por un espacio
datos de salida separados por un espacio

.
.
.

datos de entrada separados por un espacio
datos de salida separados por un espacio

### Valores devueltos

Devuelve un recurso de datos de entrenamiento en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de fann_read_train_from_file()**

&lt;?php
$train_data = fann_read_train_from_file("xor.data");
if ($train_data) {
// Hacer algo con $train_data para la función XOR
}
?&gt;

    Contents of xor.data

4 2 1
-1 -1
-1
-1 1
1
1 -1
1
1 1
-1

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_destroy_train()](#function.fann-destroy-train) - Destruye los datos de entrenamiento

    - [fann_save_train()](#function.fann-save-train) - Guarda la estructura de entrenamiento en un fichero

# fann_reset_errno

(PECL fann &gt;= 1.0.0)

fann_reset_errno — Reinicia el número del último error

### Descripción

**fann_reset_errno**([resource](#language.types.resource) $errdat): [void](language.types.void.html)

Reinicia el número del último error.

### Parámetros

    errdat

     O bien un recurso de red neuronal, o un recurso de datos de entrenamiento de una red neuronal.

### Valores devueltos

No devuelve ningún valor.

### Ver también

    - [fann_get_errno()](#function.fann-get-errno) - Devuelve el número del último error

    - [fann_reset_errstr()](#function.fann-reset-errstr) - Reinicia el string del último error

# fann_reset_errstr

(PECL fann &gt;= 1.0.0)

fann_reset_errstr — Reinicia el string del último error

### Descripción

**fann_reset_errstr**([resource](#language.types.resource) $errdat): [void](language.types.void.html)

Reinicia el string del último error.

### Parámetros

    errdat

     O bien un recurso de red neuronal, o un recurso de datos de entrenamiento de una red neuronal.

### Valores devueltos

No devuelve ningún valor.

### Ver también

    - [fann_get_errstr()](#function.fann-get-errstr) - Devuelve el string de último error

    - [fann_reset_errno()](#function.fann-reset-errno) - Reinicia el número del último error

# fann_reset_MSE

(PECL fann &gt;= 1.0.0)

fann_reset_MSE — Reinicia el error cuadrático medio de la red

### Descripción

**fann_reset_MSE**([string](#language.types.string) $ann): [bool](#language.types.boolean)

Reinicia el error cuadrático medio de la red.

Esta función también reinicia el número de bit que fallan.

### Parámetros

    ann

     Recurso de red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_get_bit_fail()](#function.fann-get-bit-fail) - El número de bit fallidos

    - [fann_get_bit_fail_limit()](#function.fann-get-bit-fail-limit) - Devuelve el límite de fallo de bit empleado durante un entrenamiento

# fann_run

(PECL fann &gt;= 1.0.0)

fann_run — Ejecutará la entrada a través de la red neuronal

### Descripción

**fann_run**([resource](#language.types.resource) $ann, [array](#language.types.array) $input): [array](#language.types.array)

Ejecutará la entrada a través de la red neuronal, devolviendo un array de salidas, el número de las que son
iguales al número de neuronas de la capa de salida.

### Parámetros

    ann

     Recurso de red neuronal.





    input


      Un array de valores de entrada.


### Valores devueltos

Un array de valores de salida, o **[false](#constant.false)** en caso de error.

# fann_save

(PECL fann &gt;= 1.0.0)

fann_save — Guarda la red completa a un fichero de configuración

### Descripción

**fann_save**([resource](#language.types.resource) $ann, [string](#language.types.string) $configuration_file): [bool](#language.types.boolean)

Guarda la red completa a un fichero de configuración.

El fichero de configuración contiene toda la información sobre la red neuronal y habilita a
[fann_create_from_file()](#function.fann-create-from-file) para crear una copia exacta de la red neuronal
y de todos los parámetros asociados a dicha red.

Estos tres parámetros ([fann_set_callback()](#function.fann-set-callback), [fann_set_error_log()](#function.fann-set-error-log),
**fann_set_user_data()**) NO se guardan en el fichero porque no se pueden llevar a una ubicación
diferente de forma segura. Tampoco se guardan los parámetros temporales generados durante el entrenamiento,
como [fann_get_MSE()](#function.fann-get-mse).

### Parámetros

    ann

     Recurso de red neuronal.





    configuration_file


      La ruta al fichero de configuración.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_create_from_file()](#function.fann-create-from-file) - Construye una red neuronal de retropropagación desde un fichero de configuración

# fann_save_train

(PECL fann &gt;= 1.0.0)

fann_save_train — Guarda la estructura de entrenamiento en un fichero

### Descripción

**fann_save_train**([resource](#language.types.resource) $data, [string](#language.types.string) $file_name): [bool](#language.types.boolean)

Guarda la estructura de entrenamiento en un fichero, con el formato especificado en [fann_read_train_from_file()](#function.fann-read-train-from-file).

### Parámetros

    data

     Recurso de datos de entrenamiento de la red neuronal.





    file_name


      El nombre delfichero donde guardar los datos de entrenamiento.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_read_train_from_file()](#function.fann-read-train-from-file) - Lee un fichero que almacena datos de entrenamiento

# fann_scale_input

(PECL fann &gt;= 1.0.0)

fann_scale_input — Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados

### Descripción

**fann_scale_input**([resource](#language.types.resource) $ann, [array](#language.types.array) $input_vector): [bool](#language.types.boolean)

Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados.

### Parámetros

    ann

     Recurso de red neuronal.





    input_vector


      El vector de entrada a escalar


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_descale_input()](#function.fann-descale-input) - Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados

    - [fann_scale_output()](#function.fann-scale-output) - Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados

# fann_scale_input_train_data

(PECL fann &gt;= 1.0.0)

fann_scale_input_train_data — Escala las entradas de los datos de entrenamiento al rango especificado

### Descripción

**fann_scale_input_train_data**([resource](#language.types.resource) $train_data, [float](#language.types.float) $new_min, [float](#language.types.float) $new_max): [bool](#language.types.boolean)

Escala las entradas de los datos de entrenamiento al rango especificado.

### Parámetros

    train_data

     Recurso de datos de entrenamiento de la red neuronal.





    new_min


      El nuevo mínimo después de escalar las entradas de los datos de entrenamiento.






    new_max


      El nuevo máximo después de escalar las entradas de los datos de entrenamiento.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_scale_output_train_data()](#function.fann-scale-output-train-data) - Escala las salidas de los datos de entrenamiento al rango especificado

    - [fann_scale_train_data()](#function.fann-scale-train-data) - Escala la entradas y salidas de los datos de entrenamiento al rango especificado

# fann_scale_output

(PECL fann &gt;= 1.0.0)

fann_scale_output — Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados

### Descripción

**fann_scale_output**([resource](#language.types.resource) $ann, [array](#language.types.array) $output_vector): [bool](#language.types.boolean)

Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados.

### Parámetros

    ann

     Recurso de red neuronal.





    output_vector


      El vector de salida a escalar


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_descale_output()](#function.fann-descale-output) - Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados

    - [fann_scale_input()](#function.fann-scale-input) - Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados

# fann_scale_output_train_data

(PECL fann &gt;= 1.0.0)

fann_scale_output_train_data — Escala las salidas de los datos de entrenamiento al rango especificado

### Descripción

**fann_scale_output_train_data**([resource](#language.types.resource) $train_data, [float](#language.types.float) $new_min, [float](#language.types.float) $new_max): [bool](#language.types.boolean)

Escala las salidas de los datos de entrenamiento al rango especificado.

### Parámetros

    train_data

     Recurso de datos de entrenamiento de la red neuronal.





    new_min


      El nuevo mínimo después de escalar las salidas de los datos de entrenamiento.






    new_max


      El nuevo máximo después de escalar las salidas de los datos de entrenamiento.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_scale_input_train_data()](#function.fann-scale-input-train-data) - Escala las entradas de los datos de entrenamiento al rango especificado

    - [fann_scale_train_data()](#function.fann-scale-train-data) - Escala la entradas y salidas de los datos de entrenamiento al rango especificado

# fann_scale_train

(PECL fann &gt;= 1.0.0)

fann_scale_train — Escalar datos de entrada y salida basados en parámetros previamente calculados

### Descripción

**fann_scale_train**([resource](#language.types.resource) $ann, [resource](#language.types.resource) $train_data): [bool](#language.types.boolean)

Escalar datos de entrada y salida basados en parámetros previamente calculados.

### Parámetros

    ann

     Recurso de red neuronal.





    train_data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_descale_train()](#function.fann-descale-train) - Descalar datos de entrada y salida basados en parámetros previamente calculados

    - [fann_set_scaling_params()](#function.fann-set-scaling-params) - Calcular los parámetros de escala de entrada y salida para un uso futuro basados en datos de entrenamiento

# fann_scale_train_data

(PECL fann &gt;= 1.0.0)

fann_scale_train_data — Escala la entradas y salidas de los datos de entrenamiento al rango especificado

### Descripción

**fann_scale_train_data**([resource](#language.types.resource) $train_data, [float](#language.types.float) $new_min, [float](#language.types.float) $new_max): [bool](#language.types.boolean)

Escala la entradas y salidas de los datos de entrenamiento al rango especificado.

### Parámetros

    train_data

     Recurso de datos de entrenamiento de la red neuronal.





    new_min


      El nuevo mínimo después de escalar las entradas y salidas de los datos de entrenamiento.






    new_max


      El nuevo máximo después de escalar las entradas y salidas de los datos de entrenamiento.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_scale_output_train_data()](#function.fann-scale-output-train-data) - Escala las salidas de los datos de entrenamiento al rango especificado

    - [fann_scale_input_train_data()](#function.fann-scale-input-train-data) - Escala las entradas de los datos de entrenamiento al rango especificado

# fann_set_activation_function

(PECL fann &gt;= 1.0.0)

fann_set_activation_function — Establece la función de activación para la neurona y capa proporcionadas

### Descripción

**fann_set_activation_function**(
    [resource](#language.types.resource) $ann,
    [int](#language.types.integer) $activation_function,
    [int](#language.types.integer) $layer,
    [int](#language.types.integer) $neuron
): [bool](#language.types.boolean)

Establece la función de activación para la neurona número neuron en la capa número
layer, contando al capa de entrada como capa 0.

No es posible establecer funciones de activación para las neuronas de la capa de entrada.

Al elegir una función de activación, es importante observar que las funciones de activación tienen un rango diferente.
**[FANN_SIGMOID](#constant.fann-sigmoid)** está, p.ej., en el rango 0 - 1, mientras que **[FANN_SIGMOID_SYMMETRIC](#constant.fann-sigmoid-symmetric)** está
en el rango -1 - 1, y **[FANN_LINEAR](#constant.fann-linear)** no tiene límites.

The supplied activation_function value must be
one of the [activation functions](#constants.fann-activation-funcs) constants.

El valor devuelto es una de las constantes de [funciones de activación](#constants.fann-train).

### Parámetros

    ann

     Recurso de red neuronal.





    activation_function


      La constante de [funciones de activación](#constants.fann-activation-funcs).






    layer


      El número de capa.






    neuron


      El número de neurona.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_function_layer()](#function.fann-set-activation-function-layer) - Establece la función de activación para todas las neuronas de la capa proporcionada

    - [fann_set_activation_function_hidden()](#function.fann-set-activation-function-hidden) - Establece la función de activación para todas las capas ocultas

    - [fann_set_activation_function_output()](#function.fann-set-activation-function-output) - Establece la función de activación para la capa de salida

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

    - [fann_get_activation_function()](#function.fann-get-activation-function) - Devuelve la función de activación

# fann_set_activation_function_hidden

(PECL fann &gt;= 1.0.0)

fann_set_activation_function_hidden — Establece la función de activación para todas las capas ocultas

### Descripción

**fann_set_activation_function_hidden**([resource](#language.types.resource) $ann, [int](#language.types.integer) $activation_function): [bool](#language.types.boolean)

Establece la función de activación para todas las capas ocultas.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_function


      La constante de [funciones de activación](#constants.fann-activation-funcs).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

    - [fann_set_activation_function_layer()](#function.fann-set-activation-function-layer) - Establece la función de activación para todas las neuronas de la capa proporcionada

    - [fann_set_activation_function_output()](#function.fann-set-activation-function-output) - Establece la función de activación para la capa de salida

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

# fann_set_activation_function_layer

(PECL fann &gt;= 1.0.0)

fann_set_activation_function_layer — Establece la función de activación para todas las neuronas de la capa proporcionada

### Descripción

**fann_set_activation_function_layer**([resource](#language.types.resource) $ann, [int](#language.types.integer) $activation_function, [int](#language.types.integer) $layer): [bool](#language.types.boolean)

Establece la función de activación para todas las neuronas de la capa número layer, contanldo la capa de entrada como capa 0.

No es posible establecer funciones de activación para las neuronas de la capa de entrada.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_function


      La constante de [funciones de activación](#constants.fann-activation-funcs).






    layer


      El número de capa.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

    - [fann_set_activation_function_hidden()](#function.fann-set-activation-function-hidden) - Establece la función de activación para todas las capas ocultas

    - [fann_set_activation_function_output()](#function.fann-set-activation-function-output) - Establece la función de activación para la capa de salida

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

# fann_set_activation_function_output

(PECL fann &gt;= 1.0.0)

fann_set_activation_function_output — Establece la función de activación para la capa de salida

### Descripción

**fann_set_activation_function_output**([resource](#language.types.resource) $ann, [int](#language.types.integer) $activation_function): [bool](#language.types.boolean)

Establece la función de activación para la capa de salida.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_function


      La constante de [funciones de activación](#constants.fann-activation-funcs).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

    - [fann_set_activation_function_layer()](#function.fann-set-activation-function-layer) - Establece la función de activación para todas las neuronas de la capa proporcionada

    - [fann_set_activation_function_hidden()](#function.fann-set-activation-function-hidden) - Establece la función de activación para todas las capas ocultas

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

# fann_set_activation_steepness

(PECL fann &gt;= 1.0.0)

fann_set_activation_steepness — Establece la pendiente de activación el número de neurona y capa proporcionados

### Descripción

**fann_set_activation_steepness**(
    [resource](#language.types.resource) $ann,
    [float](#language.types.float) $activation_steepness,
    [int](#language.types.integer) $layer,
    [int](#language.types.integer) $neuron
): [bool](#language.types.boolean)

Establece la pendiente de activación en la neurona número neuron de la capa número layer,
contando la capa de entrada como capa 0.

No es posible establecer una pendiente de activación en la capa de entrada.

La pendiente de una función de activación dice algo sobre cómo de rápido va la función de activación
del mínimo al máximo. Un valor alto para la función de activación proporcionará un entrenamiento más agresivo.

Cuando se entrenan redes neuronales donde los valores de salida deberían estar en los extremos
(normalmente 0 y 1, dependiendo de la función de activación), se puede emplear una función de activación (p.ej. 1.0).

La pendiente de activación predeterminada es 0.5.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_steepness


      La pendiente de activación.






    layer


      El número de capa.






    neuron


      El número de neurona.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_steepness_layer()](#function.fann-set-activation-steepness-layer) - Establece la pendiente de activación para todas las neuronas del número de capa proporcionada

    - [fann_set_activation_steepness_hidden()](#function.fann-set-activation-steepness-hidden) - Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas

    - [fann_set_activation_steepness_output()](#function.fann-set-activation-steepness-output) - Establece la pendiente de activación de la capa de salida

    - [fann_get_activation_steepness()](#function.fann-get-activation-steepness) - Devuelve la pendiente de activación para el número de neurona y de capa proporcionados

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

# fann_set_activation_steepness_hidden

(PECL fann &gt;= 1.0.0)

fann_set_activation_steepness_hidden — Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas

### Descripción

**fann_set_activation_steepness_hidden**([resource](#language.types.resource) $ann, [float](#language.types.float) $activation_steepness): [bool](#language.types.boolean)

Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_steepness


      La pendiente de activación.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

    - [fann_set_activation_steepness_layer()](#function.fann-set-activation-steepness-layer) - Establece la pendiente de activación para todas las neuronas del número de capa proporcionada

    - [fann_set_activation_steepness_output()](#function.fann-set-activation-steepness-output) - Establece la pendiente de activación de la capa de salida

    - [fann_get_activation_steepness()](#function.fann-get-activation-steepness) - Devuelve la pendiente de activación para el número de neurona y de capa proporcionados

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

# fann_set_activation_steepness_layer

(PECL fann &gt;= 1.0.0)

fann_set_activation_steepness_layer — Establece la pendiente de activación para todas las neuronas del número de capa proporcionada

### Descripción

**fann_set_activation_steepness_layer**([resource](#language.types.resource) $ann, [float](#language.types.float) $activation_steepness, [int](#language.types.integer) $layer): [bool](#language.types.boolean)

Establece la pendiente de activación para todas las neuronas de la capa número layer,
contando la capa de entrada como capa 0.

No es posible establecer una pendiente de activación en la capa de entrada.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_steepness


      La pendiente de activación.






    layer


      El número de capa.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

    - [fann_set_activation_steepness_hidden()](#function.fann-set-activation-steepness-hidden) - Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas

    - [fann_set_activation_steepness_output()](#function.fann-set-activation-steepness-output) - Establece la pendiente de activación de la capa de salida

    - [fann_get_activation_steepness()](#function.fann-get-activation-steepness) - Devuelve la pendiente de activación para el número de neurona y de capa proporcionados

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

# fann_set_activation_steepness_output

(PECL fann &gt;= 1.0.0)

fann_set_activation_steepness_output — Establece la pendiente de activación de la capa de salida

### Descripción

**fann_set_activation_steepness_output**([resource](#language.types.resource) $ann, [float](#language.types.float) $activation_steepness): [bool](#language.types.boolean)

Establece la pendiente de activación de la capa de salida.

### Parámetros

    ann

     Recurso de red neuronal.





    activation_steepness


      La pendiente de activación.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_activation_steepness()](#function.fann-set-activation-steepness) - Establece la pendiente de activación el número de neurona y capa proporcionados

    - [fann_set_activation_steepness_layer()](#function.fann-set-activation-steepness-layer) - Establece la pendiente de activación para todas las neuronas del número de capa proporcionada

    - [fann_set_activation_steepness_hidden()](#function.fann-set-activation-steepness-hidden) - Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas

    - [fann_get_activation_steepness()](#function.fann-get-activation-steepness) - Devuelve la pendiente de activación para el número de neurona y de capa proporcionados

    - [fann_set_activation_function()](#function.fann-set-activation-function) - Establece la función de activación para la neurona y capa proporcionadas

# fann_set_bit_fail_limit

(PECL fann &gt;= 1.0.0)

fann_set_bit_fail_limit — Establece el límite de fallo de bit empleado durante un entrenamiento

### Descripción

**fann_set_bit_fail_limit**([resource](#language.types.resource) $ann, [float](#language.types.float) $bit_fail_limit): [bool](#language.types.boolean)

Establece el límite de fallo de bit empleado durante un entrenamiento.

### Parámetros

    ann

     Recurso de red neuronal.





    bit_fail_limit


      El límite de fallo de bit.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_bit_fail_limit()](#function.fann-get-bit-fail-limit) - Devuelve el límite de fallo de bit empleado durante un entrenamiento

# fann_set_callback

(PECL fann &gt;= 1.0.0)

fann_set_callback — Establece la función de retrollamada a emplear durante el entrenamiento

### Descripción

**fann_set_callback**([resource](#language.types.resource) $ann, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Establece la función de retrollamada a emplear durante el entrenamiento. Esto significa que es llamada desde
[fann_train_on_data()](#function.fann-train-on-data) o [fann_train_on_file()](#function.fann-train-on-file).

### Parámetros

    ann

     Recurso de red neuronal.





    callback


      La función de retrollamada proporcionada toma los siguientes parámetros:



       - ann - El [resource](#language.types.resource) de red neuronal

       - train - El [resource](#language.types.resource) de datos de entrenamiento
        o **[null](#constant.null)** si se llamada desde [fann_train_on_file()](#function.fann-train-on-file)

       - max_epochs - El número máximo de épocas que debería continuar el entrenamiento

       - epochs_between_reports - El número de épocas entre llamadas a esta función

       - desired_error - El [fann_get_MSE()](#function.fann-get-mse) deseado o
        [fann_get_bit_fail()](#function.fann-get-bit-fail), dependiendo de la función de parada elegida mediante
        [fann_set_train_stop_function()](#function.fann-set-train-stop-function)

       - epochs - La época actual




      La retrollamada debería devolver **[true](#constant.true)**. Si devuelve **[false](#constant.false)**, el entrenamiento finalizará.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_train_on_file()](#function.fann-train-on-file) - Entrena un conjunto de datos completo leído desde un fichero, por un período de tiempo

# fann_set_cascade_activation_functions

(PECL fann &gt;= 1.0.0)

fann_set_cascade_activation_functions — Establece el array de funciones de activación de candidatas en cascada

### Descripción

**fann_set_cascade_activation_functions**([resource](#language.types.resource) $ann, [array](#language.types.array) $cascade_activation_functions): [bool](#language.types.boolean)

Establece el array de funciones de activación de candidatas en cascada.

Véase [fann_get_cascade_num_candidates()](#function.fann-get-cascade-num-candidates) para una descripción de las neuronas candidatas generadas por este array.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_activation_functions


      El array de funciones de activación de candidatas en cascada.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_activation_functions_count()](#function.fann-get-cascade-activation-functions-count) - Devuelve el número de funciones de activación en cascada

    - **fann_set_cascade_activation_functions()**

# fann_set_cascade_activation_steepnesses

(PECL fann &gt;= 1.0.0)

fann_set_cascade_activation_steepnesses — Establece el array de pendientes de activación de candidatas en cascada

### Descripción

**fann_set_cascade_activation_steepnesses**([resource](#language.types.resource) $ann, [array](#language.types.array) $cascade_activation_steepnesses_count): [bool](#language.types.boolean)

Establece el array de pendientes de activación de candidatas en cascada.

Véase [fann_get_cascade_num_candidates()](#function.fann-get-cascade-num-candidates) para una descripción de las neuronas candidatas generadas por este array.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_activation_steepnesses_count


      El array de pendientes de activación de candidatas en cascada.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_activation_steepnesses()](#function.fann-get-cascade-activation-steepnesses) - Devuelve las pendientes de activación en cascada

    - [fann_get_cascade_activation_steepnesses_count()](#function.fann-get-cascade-activation-steepnesses-count) - El número de pendientes de activación

# fann_set_cascade_candidate_change_fraction

(PECL fann &gt;= 1.0.0)

fann_set_cascade_candidate_change_fraction — Establece la fracción de cambio de candidatas en cascada

### Descripción

**fann_set_cascade_candidate_change_fraction**([resource](#language.types.resource) $ann, [float](#language.types.float) $cascade_candidate_change_fraction): [bool](#language.types.boolean)

Establece la fracción de cambio de candidatas en cascada.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_candidate_change_fraction


      La fracción de cambio de candidatas en cascada.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_candidate_change_fraction()](#function.fann-get-cascade-candidate-change-fraction) - Devuelve la fracción de cambio de candidatas en cascada

# fann_set_cascade_candidate_limit

(PECL fann &gt;= 1.0.0)

fann_set_cascade_candidate_limit — Establece el límite de candidatas

### Descripción

**fann_set_cascade_candidate_limit**([resource](#language.types.resource) $ann, [float](#language.types.float) $cascade_candidate_limit): [bool](#language.types.boolean)

Establece el límite de candidatas.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_candidate_limit


      El límite de candidatas.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_candidate_limit()](#function.fann-get-cascade-candidate-limit) - Devuelve el límite de candidatas

# fann_set_cascade_candidate_stagnation_epochs

(PECL fann &gt;= 1.0.0)

fann_set_cascade_candidate_stagnation_epochs — Establece el número de épocas de estancamiento de candidatas en cascada

### Descripción

**fann_set_cascade_candidate_stagnation_epochs**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_candidate_stagnation_epochs): [bool](#language.types.boolean)

Establece el número de épocas de estancamiento de candidatas en cascada.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_candidate_stagnation_epochs


      El número de épocas de estancamiento de candidatas en cascada.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_candidate_stagnation_epochs()](#function.fann-get-cascade-candidate-stagnation-epochs) - Devuelve el número de épocas de estancamiento de candidatas en cascada

# fann_set_cascade_max_cand_epochs

(PECL fann &gt;= 1.0.0)

fann_set_cascade_max_cand_epochs — Establece el máximo de épocas de candidatas

### Descripción

**fann_set_cascade_max_cand_epochs**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_max_cand_epochs): [bool](#language.types.boolean)

Establece el máximo de épocas de candidatas.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_max_cand_epochs


      El máximo de épocas de candidatas.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_max_cand_epochs()](#function.fann-get-cascade-max-cand-epochs) - Devuelve el máximo de épocas de candidatas

# fann_set_cascade_max_out_epochs

(PECL fann &gt;= 1.0.0)

fann_set_cascade_max_out_epochs — Establece el máximo de épocas de salida

### Descripción

**fann_set_cascade_max_out_epochs**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_max_out_epochs): [bool](#language.types.boolean)

Establece el máximo de épocas de salida.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_max_out_epochs


      El máximo de épocas de salida.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_max_out_epochs()](#function.fann-get-cascade-max-out-epochs) - Devuelve el máximo de épocas de salida

# fann_set_cascade_min_cand_epochs

(PECL fann &gt;= 1.0.0)

fann_set_cascade_min_cand_epochs — Establece el mínimo de épocas de candidatas

### Descripción

**fann_set_cascade_min_cand_epochs**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_min_cand_epochs): [bool](#language.types.boolean)

Establece el mínimo de épocas de candidatas.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_min_cand_epochs


      El máximo de mínimo de candidatas.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_get_cascade_min_cand_epochs()](#function.fann-get-cascade-min-cand-epochs) - Devuelve el mínimo de épocas de candidatas

# fann_set_cascade_min_out_epochs

(PECL fann &gt;= 1.0.0)

fann_set_cascade_min_out_epochs — Establece el mínimo de épocas de salida

### Descripción

**fann_set_cascade_min_out_epochs**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_min_out_epochs): [bool](#language.types.boolean)

Establece el mínimo de épocas de salida.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_min_out_epochs


      El mínimo de épocas de salida.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_get_cascade_min_out_epochs()](#function.fann-get-cascade-min-out-epochs) - Devuelve el mínimo de épocas de salida

# fann_set_cascade_num_candidate_groups

(PECL fann &gt;= 1.0.0)

fann_set_cascade_num_candidate_groups — Establece el número de grupos de candidatas

### Descripción

**fann_set_cascade_num_candidate_groups**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_num_candidate_groups): [bool](#language.types.boolean)

Establece el número de grupos de candidatas.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_num_candidate_groups


      El número de grupos de candidatas.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_num_candidate_groups()](#function.fann-get-cascade-num-candidate-groups) - Devuelve el número de grupos de candidatas

# fann_set_cascade_output_change_fraction

(PECL fann &gt;= 1.0.0)

fann_set_cascade_output_change_fraction — Establece la fracción de cambio de salida en cascada

### Descripción

**fann_set_cascade_output_change_fraction**([resource](#language.types.resource) $ann, [float](#language.types.float) $cascade_output_change_fraction): [bool](#language.types.boolean)

Establece la fracción de cambio de salida en cascada.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_output_change_fraction


      La fracción de cambio de salida en cascada.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_output_change_fraction()](#function.fann-get-cascade-output-change-fraction) - Devuelve la fracción de cambio de salida en cascada

# fann_set_cascade_output_stagnation_epochs

(PECL fann &gt;= 1.0.0)

fann_set_cascade_output_stagnation_epochs — Establece el número de épocas de estancamiento de salida en cascada

### Descripción

**fann_set_cascade_output_stagnation_epochs**([resource](#language.types.resource) $ann, [int](#language.types.integer) $cascade_output_stagnation_epochs): [bool](#language.types.boolean)

Establece el número de épocas de estancamiento de salida en cascada.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_output_stagnation_epochs


      El número de épocas de estancamiento de salida en cascada.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_output_stagnation_epochs()](#function.fann-get-cascade-output-stagnation-epochs) - Devuelve el número de épocas de estancamiento de salida en cascada

# fann_set_cascade_weight_multiplier

(PECL fann &gt;= 1.0.0)

fann_set_cascade_weight_multiplier — Establece el multiplicador de peso

### Descripción

**fann_set_cascade_weight_multiplier**([resource](#language.types.resource) $ann, [float](#language.types.float) $cascade_weight_multiplier): [bool](#language.types.boolean)

Establece el multiplicador de peso.

### Parámetros

    ann

     Recurso de red neuronal.





    cascade_weight_multiplier


      El multiplicador de peso.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_cascade_weight_multiplier()](#function.fann-get-cascade-weight-multiplier) - Devuelve el multiplicador de peso

# fann_set_error_log

(PECL fann &gt;= 1.0.0)

fann_set_error_log — Establece dónde registrar los errores

### Descripción

**fann_set_error_log**([resource](#language.types.resource) $errdat, [string](#language.types.string) $log_file): [void](language.types.void.html)

Establece dónde registrar los errores.

### Parámetros

    errdat

     O bien un recurso de red neuronal, o un recurso de datos de entrenamiento de una red neuronal.





    log_file


      La ruta al fichero de registro.


### Valores devueltos

No devuelve ningún valor.

# fann_set_input_scaling_params

(PECL fann &gt;= 1.0.0)

fann_set_input_scaling_params — Calcular los parámetros de escala de entrada para un uso futuro basados en datos de entrenamiento

### Descripción

**fann_set_input_scaling_params**(
    [resource](#language.types.resource) $ann,
    [resource](#language.types.resource) $train_data,
    [float](#language.types.float) $new_input_min,
    [float](#language.types.float) $new_input_max
): [bool](#language.types.boolean)

Calcular los parámetros de escala de entrada para un uso futuro basados en datos de entrenamiento.

### Parámetros

    ann

     Recurso de red neuronal.





    train_data

     Recurso de datos de entrenamiento de la red neuronal.





    new_input_min


      El límite inferior deseado de los datos de entrada después de escalar (no seguido estrictamente)






    new_input_max


      El límite superior deseado de los datos de entrada después de escalar (no seguido estrictamente)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_output_scaling_params()](#function.fann-set-output-scaling-params) - Calcular los parámetros de escala de salida para un uso futuro basados en datos de entrenamiento

# fann_set_learning_momentum

(PECL fann &gt;= 1.0.0)

fann_set_learning_momentum — Establece el momento del aprendizaje

### Descripción

**fann_set_learning_momentum**([resource](#language.types.resource) $ann, [float](#language.types.float) $learning_momentum): [bool](#language.types.boolean)

Establece el momento del aprendizaje.

Hay más información disponible en [fann_get_learning_momentum()](#function.fann-get-learning-momentum).

### Parámetros

    ann

     Recurso de red neuronal.





    learning_momentum


      El momento del aprendizaje


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_learning_momentum()](#function.fann-get-learning-momentum) - Devuelve el momento del aprendizaje

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_set_learning_rate

(PECL fann &gt;= 1.0.0)

fann_set_learning_rate — Establece el índice de aprendizaje

### Descripción

**fann_set_learning_rate**([resource](#language.types.resource) $ann, [float](#language.types.float) $learning_rate): [bool](#language.types.boolean)

Establece el índice de aprendizaje.

Hay más información en [fann_get_learning_rate()](#function.fann-get-learning-rate).

### Parámetros

    ann

     Recurso de red neuronal.





    learning_rate


      El índice de aprendizaje.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_learning_rate()](#function.fann-get-learning-rate) - Devuelve el índice de aprendizaje

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_set_output_scaling_params

(PECL fann &gt;= 1.0.0)

fann_set_output_scaling_params — Calcular los parámetros de escala de salida para un uso futuro basados en datos de entrenamiento

### Descripción

**fann_set_output_scaling_params**(
    [resource](#language.types.resource) $ann,
    [resource](#language.types.resource) $train_data,
    [float](#language.types.float) $new_output_min,
    [float](#language.types.float) $new_output_max
): [bool](#language.types.boolean)

Calcular los parámetros de escala de salida para un uso futuro basados en datos de entrenamiento.

### Parámetros

    ann

     Recurso de red neuronal.





    train_data

     Recurso de datos de entrenamiento de la red neuronal.





    new_output_min


      El límite inferior deseado de los datos de salida después de escalar (no seguido estrictamente)






    new_output_max


      El límite superior deseado de los datos de salida después de escalar (no seguido estrictamente)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_input_scaling_params()](#function.fann-set-input-scaling-params) - Calcular los parámetros de escala de entrada para un uso futuro basados en datos de entrenamiento

# fann_set_quickprop_decay

(PECL fann &gt;= 1.0.0)

fann_set_quickprop_decay — Establece el factor de decadencia de quickprop

### Descripción

**fann_set_quickprop_decay**([resource](#language.types.resource) $ann, [float](#language.types.float) $quickprop_decay): [bool](#language.types.boolean)

Establece el factor de decadencia de quickprop.

### Parámetros

    ann

     Recurso de red neuronal.





    quickprop_decay


      El factor de decadencia de quickprop.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_quickprop_decay()](#function.fann-get-quickprop-decay) - Devuelve la decadencia, que es un factor por el que los pesos deberían decrementar en cada iteración durante un entrenamiento quickprop

# fann_set_quickprop_mu

(PECL fann &gt;= 1.0.0)

fann_set_quickprop_mu — Establece el factor mu de quickprop

### Descripción

**fann_set_quickprop_mu**([resource](#language.types.resource) $ann, [float](#language.types.float) $quickprop_mu): [bool](#language.types.boolean)

Establece el factor mu de quickprop.

### Parámetros

    ann

     Recurso de red neuronal.





    quickprop_mu


      El factor mu.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_quickprop_mu()](#function.fann-get-quickprop-mu) - Devuelve el factor mu

# fann_set_rprop_decrease_factor

(PECL fann &gt;= 1.0.0)

fann_set_rprop_decrease_factor — Establece el factor de disminución empleado durante un entrenamiento RPROP

### Descripción

**fann_set_rprop_decrease_factor**([resource](#language.types.resource) $ann, [float](#language.types.float) $rprop_decrease_factor): [bool](#language.types.boolean)

Establece el factor de disminución empleado durante un entrenamiento RPROP.

### Parámetros

    ann

     Recurso de red neuronal.





    rprop_decrease_factor


      El factor de disminución.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_rprop_decrease_factor()](#function.fann-get-rprop-decrease-factor) - Devuelve el factor de disminución empleado durante un entrenamiento RPROP

# fann_set_rprop_delta_max

(PECL fann &gt;= 1.0.0)

fann_set_rprop_delta_max — Establece el tamaño de paso máximo

### Descripción

**fann_set_rprop_delta_max**([resource](#language.types.resource) $ann, [float](#language.types.float) $rprop_delta_max): [bool](#language.types.boolean)

El tamaño de paso máximo es un número positivo que determina lo grande que podría ser el tamaño de paso máximo.

### Parámetros

    ann

     Recurso de red neuronal.





    rprop_delta_max


      El tamaño de paso máximo.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_rprop_delta_max()](#function.fann-get-rprop-delta-max) - Devuelve el tamaño de paso máximo

    - [fann_get_rprop_delta_min()](#function.fann-get-rprop-delta-min) - Devuelve el tamaño de paso mínimo

# fann_set_rprop_delta_min

(PECL fann &gt;= 1.0.0)

fann_set_rprop_delta_min — Establece el tamaño de paso mínimo

### Descripción

**fann_set_rprop_delta_min**([resource](#language.types.resource) $ann, [float](#language.types.float) $rprop_delta_min): [bool](#language.types.boolean)

El tamaño de paso mínimo es un número positivo pequeño que determina lo pequeño que podría ser el tamaño de paso mínimo.

### Parámetros

    ann

     Recurso de red neuronal.





    rprop_delta_min


      El tamaño de paso mínimo.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_rprop_delta_min()](#function.fann-get-rprop-delta-min) - Devuelve el tamaño de paso mínimo

# fann_set_rprop_delta_zero

(PECL fann &gt;= 1.0.0)

fann_set_rprop_delta_zero — Establece el tamaño de paso inicial

### Descripción

**fann_set_rprop_delta_zero**([resource](#language.types.resource) $ann, [float](#language.types.float) $rprop_delta_zero): [bool](#language.types.boolean)

El tamaño de paso inicial es un número positivo que determina el tamaño de paso inicial.

### Parámetros

    ann

     Recurso de red neuronal.





    rprop_delta_zero


      El tamaño de paso inicial.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_rprop_delta_zero()](#function.fann-get-rprop-delta-zero) - Devuelve el tamaño de paso inicial

    - [fann_get_rprop_delta_min()](#function.fann-get-rprop-delta-min) - Devuelve el tamaño de paso mínimo

    - [fann_get_rprop_delta_max()](#function.fann-get-rprop-delta-max) - Devuelve el tamaño de paso máximo

# fann_set_rprop_increase_factor

(PECL fann &gt;= 1.0.0)

fann_set_rprop_increase_factor — Establece el factor de aumento empleado durante un entrenamiento RPROP

### Descripción

**fann_set_rprop_increase_factor**([resource](#language.types.resource) $ann, [float](#language.types.float) $rprop_increase_factor): [bool](#language.types.boolean)

Establece el factor de aumento empleado durante un entrenamiento RPROP.

### Parámetros

    ann

     Recurso de red neuronal.





    rprop_increase_factor


      El aumento de disminución.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_rprop_increase_factor()](#function.fann-get-rprop-increase-factor) - Devuelve el factor de aumento empleado durante un entrenamiento RPROP

# fann_set_sarprop_step_error_shift

(PECL fann &gt;= 1.0.0)

fann_set_sarprop_step_error_shift — Establece el desplazamiento del error de paso de sarprop

### Descripción

**fann_set_sarprop_step_error_shift**([resource](#language.types.resource) $ann, [float](#language.types.float) $sarprop_step_error_shift): [bool](#language.types.boolean)

Establece el desplazamiento del error de paso de sarprop.

### Parámetros

    ann

     Recurso de red neuronal.





    sarprop_step_error_shift


      El desplazamiento del error de paso de sarprop.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_get_sarprop_step_error_shift()](#function.fann-get-sarprop-step-error-shift) - Devuelve el desplazamiento del error de paso de sarprop

# fann_set_sarprop_step_error_threshold_factor

(PECL fann &gt;= 1.0.0)

fann_set_sarprop_step_error_threshold_factor — Establece el factor de umbral del error de paso de sarprop

### Descripción

**fann_set_sarprop_step_error_threshold_factor**([resource](#language.types.resource) $ann, [float](#language.types.float) $sarprop_step_error_threshold_factor): [bool](#language.types.boolean)

Establece el factor de umbral del error de paso de sarprop.

### Parámetros

    ann

     Recurso de red neuronal.





    sarprop_step_error_threshold_factor


      El factor de umbral del error de paso de sarprop.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_get_sarprop_step_error_threshold_factor()](#function.fann-get-sarprop-step-error-threshold-factor) - Devuelve el factor de umbral del error de paso de sarprop

# fann_set_sarprop_temperature

(PECL fann &gt;= 1.0.0)

fann_set_sarprop_temperature — Establece la temperatura de sarprop

### Descripción

**fann_set_sarprop_temperature**([resource](#language.types.resource) $ann, [float](#language.types.float) $sarprop_temperature): [bool](#language.types.boolean)

Establece la temperatura de sarprop.

### Parámetros

    ann

     Recurso de red neuronal.





    sarprop_temperature


      La temperatura de sarprop.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_get_sarprop_temperature()](#function.fann-get-sarprop-temperature) - Devuelve la temperatura de sarprop

# fann_set_sarprop_weight_decay_shift

(PECL fann &gt;= 1.0.0)

fann_set_sarprop_weight_decay_shift — Establece el desplazamiento de decadencia del peso de sarprop

### Descripción

**fann_set_sarprop_weight_decay_shift**([resource](#language.types.resource) $ann, [float](#language.types.float) $sarprop_weight_decay_shift): [bool](#language.types.boolean)

Establece el desplazamiento de decadencia del peso de sarprop.

### Parámetros

    ann

     Recurso de red neuronal.





    sarprop_weight_decay_shift


      El desplazamiento de decadencia del peso de sarprop.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Notas

**Nota**:

Esta función ahora está disponible si la extensión fann ha sido compilada
con libfann &gt;= 2.2.

### Ver también

    - [fann_get_sarprop_weight_decay_shift()](#function.fann-get-sarprop-weight-decay-shift) - Devuelve el desplazamiento de decadencia del peso de sarprop

# fann_set_scaling_params

(PECL fann &gt;= 1.0.0)

fann_set_scaling_params — Calcular los parámetros de escala de entrada y salida para un uso futuro basados en datos de entrenamiento

### Descripción

**fann_set_scaling_params**(
    [resource](#language.types.resource) $ann,
    [resource](#language.types.resource) $train_data,
    [float](#language.types.float) $new_input_min,
    [float](#language.types.float) $new_input_max,
    [float](#language.types.float) $new_output_min,
    [float](#language.types.float) $new_output_max
): [bool](#language.types.boolean)

Calcular los parámetros de escala de entradas y salidas para un uso futuro basados en datos de entrenamiento.

### Parámetros

    ann

     Recurso de red neuronal.





    train_data

     Recurso de datos de entrenamiento de la red neuronal.





    new_input_min


      El límite inferior deseado de los datos de entrada después de escalar (no seguido estrictamente)






    new_input_max


      El límite superior deseado de los datos de entrada después de escalar (no seguido estrictamente)






    new_output_min


      El límite inferior deseado de los datos de salida después de escalar (no seguido estrictamente)






    new_output_max


      El límite superior deseado de los datos de salida después de escalar (no seguido estrictamente)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_set_input_scaling_params()](#function.fann-set-input-scaling-params) - Calcular los parámetros de escala de entrada para un uso futuro basados en datos de entrenamiento

    - [fann_set_output_scaling_params()](#function.fann-set-output-scaling-params) - Calcular los parámetros de escala de salida para un uso futuro basados en datos de entrenamiento

# fann_set_train_error_function

(PECL fann &gt;= 1.0.0)

fann_set_train_error_function — Establecer la función de error empleada durante un entrenamiento

### Descripción

**fann_set_train_error_function**([resource](#language.types.resource) $ann, [int](#language.types.integer) $error_function): [bool](#language.types.boolean)

Establecer la función de error empleada durante un entrenamiento.

Las funciones de error están descritas en las constantes de [funciones de error](#constants.fann-errorfunc).

### Parámetros

    ann

     Recurso de red neuronal.





    error_function


      La constante de [función de error](#constants.fann-errorfunc) .


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_train_error_function()](#function.fann-get-train-error-function) - Devuelve la función de error empleada durante un entrenamiento

# fann_set_train_stop_function

(PECL fann &gt;= 1.0.0)

fann_set_train_stop_function — Establece la función de parada empleada durante el entrenamiento

### Descripción

**fann_set_train_stop_function**([resource](#language.types.resource) $ann, [int](#language.types.integer) $stop_function): [bool](#language.types.boolean)

Establece la función de parada empleada durante el entrenamiento.

Las funciones de parada están descritas en las constantes de [funciones de parada](#constants.fann-stopfunc).

### Parámetros

    ann

     Recurso de red neuronal.





    stop_function


      La constante de [función de parada](#constants.fann-stopfunc).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_train_stop_function()](#function.fann-get-train-stop-function) - Devuelve la función de parada empleada durante el entrenamiento

# fann_set_training_algorithm

(PECL fann &gt;= 1.0.0)

fann_set_training_algorithm — Establece el algoritmo de entrenamiento

### Descripción

**fann_set_training_algorithm**([resource](#language.types.resource) $ann, [int](#language.types.integer) $training_algorithm): [bool](#language.types.boolean)

Establece el algoritmo de entrenamiento.

Hay más información disponible en [fann_get_training_algorithm()](#function.fann-get-training-algorithm).

### Parámetros

    ann

     Recurso de red neuronal.





    training_algorithm


      La constante de [Algoritno de entrenamiento](#constants.fann-train).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_get_training_algorithm()](#function.fann-get-training-algorithm) - Devuelve el algoritmo de entrenamiento

# fann_set_weight

(PECL fann &gt;= 1.0.0)

fann_set_weight — Establecer una conexión de la red

### Descripción

**fann_set_weight**(
    [resource](#language.types.resource) $ann,
    [int](#language.types.integer) $from_neuron,
    [int](#language.types.integer) $to_neuron,
    [float](#language.types.float) $weight
): [bool](#language.types.boolean)

Establecer una conexión de la red.

### Parámetros

    ann

     Recurso de red neuronal.





    from_neuron


      La neurona donde empiza la conexión.






    to_neuron


      La neurona donde finaliza la conexión.






    weight


      El peso de la conexión.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

# fann_set_weight_array

(PECL fann &gt;= 1.0.0)

fann_set_weight_array — Establecer las conexiones de la red

### Descripción

**fann_set_weight_array**([resource](#language.types.resource) $ann, [array](#language.types.array) $connections): [bool](#language.types.boolean)

Establecer las conexiones de la red.

Solamente se pueden cambiar los pesos. Las conexiones y los pesos se ignoran si no existen en la red.

### Parámetros

    ann

     Recurso de red neuronal.





    connections


      Un array de objetos [FANNConnection](#class.fannconnection)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

# fann_shuffle_train_data

(PECL fann &gt;= 1.0.0)

fann_shuffle_train_data — Mezcla los datos de entrenamiento, aleatorizando el orden

### Descripción

**fann_shuffle_train_data**([resource](#language.types.resource) $train_data): [bool](#language.types.boolean)

Mezcla los datos de entrenamiento, aleatorizando el orden. Es lo recomendado para entrenamientos incrementales,
mientras que no tiene influencia durante entrenamientos por lotes.

### Parámetros

    train_data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

# fann_subset_train_data

(PECL fann &gt;= 1.0.0)

fann_subset_train_data — Devuelve una copia de un subconjunto de los datos de entrenamiento

### Descripción

**fann_subset_train_data**([resource](#language.types.resource) $data, [int](#language.types.integer) $pos, [int](#language.types.integer) $length): [resource](#language.types.resource)

Devuelve una copia de un subconjunto del [resource](#language.types.resource) de datos de entrenamiento, empezando en la posición
pos y con length elementos hacia adelante.

fann_subset_train_data(train_data, 0, fann_length_train_data(train_data)) hace lo mismo que
[fann_duplicate_train_data()](#function.fann-duplicate-train-data)

### Parámetros

    data

     Recurso de datos de entrenamiento de la red neuronal.





    pos


      La posición de inicio.






    length


      El número de elementos a copiar.


### Valores devueltos

Devuelve un recurso de datos de entrenamiento en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fann_duplicate_train_data()](#function.fann-duplicate-train-data) - Devuelve una copia exacta de uno datos de entrenamiento de fann

# fann_test

(PECL fann &gt;= 1.0.0)

fann_test — Realiza una prueba con un conjunto de entradas y un conjunto de salidas deseadas

### Descripción

**fann_test**([resource](#language.types.resource) $ann, [array](#language.types.array) $input, [array](#language.types.array) $desired_output): [array](#language.types.array)

Realiza una prueba con un conjunto de entradas y un conjunto de salidas deseadas.
Esta operación actualiza el error cuadrático medio, pero
no modifica de ninguna manera la red.

### Parámetros

    ann

     Recurso de red neuronal.





    input


      Un array de entradas. Este array debe tener una longitud exacta
      de [fann_get_num_input()](#function.fann-get-num-input).






    desired_output


      Un array de salidas deseadas. Este array debe tener una longitud exacta
      de [fann_get_num_output()](#function.fann-get-num-output).


### Valores devueltos

Devuelve las salidas de prueba en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_test_data()](#function.fann-test-data) - Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos

    - [fann_train()](#function.fann-train) - Entrenar una iteración con un conjunto de entradas y un conjunto de salidas deseadas

    - [fann_get_num_input()](#function.fann-get-num-input) - Obtener el número de neuronas de entrada

    - [fann_get_num_output()](#function.fann-get-num-output) - Obtener el número de neuronas de salida

# fann_test_data

(PECL fann &gt;= 1.0.0)

fann_test_data — Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos

### Descripción

**fann_test_data**([resource](#language.types.resource) $ann, [resource](#language.types.resource) $data): [float](#language.types.float)

Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos.

Esta función actualiza el ECM y los valores de fallo de bit.

### Parámetros

    ann

     Recurso de red neuronal.





    data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

El ECM actualizado, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_train_epoch()](#function.fann-train-epoch) - Entrenar una época con un conjunto de datos de entrenamiento

    - [fann_get_bit_fail()](#function.fann-get-bit-fail) - El número de bit fallidos

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_train

(PECL fann &gt;= 1.0.0)

fann_train — Entrenar una iteración con un conjunto de entradas y un conjunto de salidas deseadas

### Descripción

**fann_train**([resource](#language.types.resource) $ann, [array](#language.types.array) $input, [array](#language.types.array) $desired_output): [bool](#language.types.boolean)

Entrenar una iteración con un conjunto de entradas y un conjunto de salidas deseadas. Este entrenamiento siempre es incremental,
ya que solamente está presente un patrón.

### Parámetros

    ann

     Recurso de red neuronal.





    input


      Un array de entradas. Este array debe ser exactamente de [fann_get_num_input()](#function.fann-get-num-input) de longitud.






    desired_output


      Un array de salidas deseadas. Este array debe ser exactamente de [fann_get_num_output()](#function.fann-get-num-output) de longitud.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_train_epoch()](#function.fann-train-epoch) - Entrenar una época con un conjunto de datos de entrenamiento

    - [fann_get_num_input()](#function.fann-get-num-input) - Obtener el número de neuronas de entrada

    - [fann_get_num_output()](#function.fann-get-num-output) - Obtener el número de neuronas de salida

# fann_train_epoch

(PECL fann &gt;= 1.0.0)

fann_train_epoch — Entrenar una época con un conjunto de datos de entrenamiento

### Descripción

**fann_train_epoch**([resource](#language.types.resource) $ann, [resource](#language.types.resource) $data): [float](#language.types.float)

Entrena una época con los datos de entrenamiento almacenados en data. Una época es
donde todos los datos de entrenamiento son considerados exactamente una vez.

Esta función devuelve el ECM tal como es calculado antes o durante el entrenamiento real.
No es el ECM real después de la época de entrenamiento, ya que calcularlo requerirá atravesar
el conjunto de entrenamiento completo una vez más. El empleo de este valor durante el entrenamiento es más que adecuado.

El algoritmo de entrenaiento empleado por esta función se elige mediante la función
[fann_set_training_algorithm()](#function.fann-set-training-algorithm).

### Parámetros

    ann

     Recurso de red neuronal.





    data

     Recurso de datos de entrenamiento de la red neuronal.

### Valores devueltos

El ECM, o **[false](#constant.false)** en caso de error.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_test_data()](#function.fann-test-data) - Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

# fann_train_on_data

(PECL fann &gt;= 1.0.0)

fann_train_on_data — Entrena un conjunto de datos completo por un período de tiempo

### Descripción

**fann_train_on_data**(
    [resource](#language.types.resource) $ann,
    [resource](#language.types.resource) $data,
    [int](#language.types.integer) $max_epochs,
    [int](#language.types.integer) $epochs_between_reports,
    [float](#language.types.float) $desired_error
): [bool](#language.types.boolean)

Entrena un conjunto de datos completo por un período de tiempo.

Este entrenamiento emplea el algoritmo de entrenamiento elegido mediante [fann_set_training_algorithm()](#function.fann-set-training-algorithm) y
los parámetros establecidos para estos algoritmos de entrenamiento.

### Parámetros

    ann

     Recurso de red neuronal.





    data

     Recurso de datos de entrenamiento de la red neuronal.





    max_epochs


      El número máximo de épocas que debería continuar el entrenamiento.






    epochs_between_reports


      El número de épocas entre llamadas a funciones de retrollamada. Un valor de cero significa que no se llamará a la función del usuario.






    desired_error


      El [fann_get_MSE()](#function.fann-get-mse) o [fann_get_bit_fail()](#function.fann-get-bit-fail) deseados, dependiendo de la función de parada
      elegida mediante [fann_set_train_stop_function()](#function.fann-set-train-stop-function).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_train_on_file()](#function.fann-train-on-file) - Entrena un conjunto de datos completo leído desde un fichero, por un período de tiempo

    - [fann_train_epoch()](#function.fann-train-epoch) - Entrenar una época con un conjunto de datos de entrenamiento

    - [fann_get_bit_fail()](#function.fann-get-bit-fail) - El número de bit fallidos

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_set_train_stop_function()](#function.fann-set-train-stop-function) - Establece la función de parada empleada durante el entrenamiento

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

    - [fann_set_callback()](#function.fann-set-callback) - Establece la función de retrollamada a emplear durante el entrenamiento

# fann_train_on_file

(PECL fann &gt;= 1.0.0)

fann_train_on_file — Entrena un conjunto de datos completo leído desde un fichero, por un período de tiempo

### Descripción

**fann_train_on_file**(
    [resource](#language.types.resource) $ann,
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $max_epochs,
    [int](#language.types.integer) $epochs_between_reports,
    [float](#language.types.float) $desired_error
): [bool](#language.types.boolean)

Entrena un conjunto de datos completo leído desde un fichero, por un período de tiempo.

Este entrenamiento emplea el algoritmo de entrenamiento elegido mediante [fann_set_training_algorithm()](#function.fann-set-training-algorithm) y
los parámetros establecidos para estos algoritmos de entrenamiento.

### Parámetros

    ann

     Recurso de red neuronal.





    filename


      El fichero que contiene los datos de entrenamiento.






    max_epochs


      El número máximo de épocas que debería continuar el entrenamiento.






    epochs_between_reports


      El número de épocas entre llamadas a funciones de retrollamada. Un valor de cero significa que no se llamará a la función del usuario.






    desired_error


      El [fann_get_MSE()](#function.fann-get-mse) o [fann_get_bit_fail()](#function.fann-get-bit-fail) deseados, dependiendo de la función de parada
      elegida mediante [fann_set_train_stop_function()](#function.fann-set-train-stop-function).


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

    - [fann_train_on_data()](#function.fann-train-on-data) - Entrena un conjunto de datos completo por un período de tiempo

    - [fann_train_epoch()](#function.fann-train-epoch) - Entrenar una época con un conjunto de datos de entrenamiento

    - [fann_get_bit_fail()](#function.fann-get-bit-fail) - El número de bit fallidos

    - [fann_get_MSE()](#function.fann-get-mse) - Lee el error cuadrático medio de la red

    - [fann_set_train_stop_function()](#function.fann-set-train-stop-function) - Establece la función de parada empleada durante el entrenamiento

    - [fann_set_training_algorithm()](#function.fann-set-training-algorithm) - Establece el algoritmo de entrenamiento

    - [fann_set_callback()](#function.fann-set-callback) - Establece la función de retrollamada a emplear durante el entrenamiento

## Tabla de contenidos

- [fann_cascadetrain_on_data](#function.fann-cascadetrain-on-data) — Entrena un conjunto de datos completo, por un período de tiempo utilizando el algoritmo de entrenamiento Cascade2
- [fann_cascadetrain_on_file](#function.fann-cascadetrain-on-file) — Entrena una red neuronal sobre un conjunto completo de datos durante un período de tiempo utilizando el algoritmo de entrenamiento Cascade2
- [fann_clear_scaling_params](#function.fann-clear-scaling-params) — Limpia los parámetros de escala
- [fann_copy](#function.fann-copy) — Crea una copia de una estructura fann
- [fann_create_from_file](#function.fann-create-from-file) — Construye una red neuronal de retropropagación desde un fichero de configuración
- [fann_create_shortcut](#function.fann-create-shortcut) — Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo
- [fann_create_shortcut_array](#function.fann-create-shortcut-array) — Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo
- [fann_create_sparse](#function.fann-create-sparse) — Crea una red neuronal de retropropagación estándar que no está conectada completamente
- [fann_create_sparse_array](#function.fann-create-sparse-array) — Crea una red neuronal de retropropagación estándar que no está completamente conectada empleando un array con tamaños de capas
- [fann_create_standard](#function.fann-create-standard) — Crea una red neuronal de retropropagación estándar completamente conectada
- [fann_create_standard_array](#function.fann-create-standard-array) — Crea una red neuronal de retropropagación estándar completamente conectada empleando un array con tamaños de capas
- [fann_create_train](#function.fann-create-train) — Crea una estructura de datos de entrenamiento vacía
- [fann_create_train_from_callback](#function.fann-create-train-from-callback) — Crea una estructura de datos de entrenamiento desde una función proporcionada por el usuario
- [fann_descale_input](#function.fann-descale-input) — Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados
- [fann_descale_output](#function.fann-descale-output) — Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados
- [fann_descale_train](#function.fann-descale-train) — Descalar datos de entrada y salida basados en parámetros previamente calculados
- [fann_destroy](#function.fann-destroy) — Destruye la red por completo y libera adecuadamente toda la memoria asociada
- [fann_destroy_train](#function.fann-destroy-train) — Destruye los datos de entrenamiento
- [fann_duplicate_train_data](#function.fann-duplicate-train-data) — Devuelve una copia exacta de uno datos de entrenamiento de fann
- [fann_get_activation_function](#function.fann-get-activation-function) — Devuelve la función de activación
- [fann_get_activation_steepness](#function.fann-get-activation-steepness) — Devuelve la pendiente de activación para el número de neurona y de capa proporcionados
- [fann_get_bias_array](#function.fann-get-bias-array) — Obtener el número de tendencias de cada capa de una red
- [fann_get_bit_fail](#function.fann-get-bit-fail) — El número de bit fallidos
- [fann_get_bit_fail_limit](#function.fann-get-bit-fail-limit) — Devuelve el límite de fallo de bit empleado durante un entrenamiento
- [fann_get_cascade_activation_functions](#function.fann-get-cascade-activation-functions) — Devuelve las funciones de activación en cascada
- [fann_get_cascade_activation_functions_count](#function.fann-get-cascade-activation-functions-count) — Devuelve el número de funciones de activación en cascada
- [fann_get_cascade_activation_steepnesses](#function.fann-get-cascade-activation-steepnesses) — Devuelve las pendientes de activación en cascada
- [fann_get_cascade_activation_steepnesses_count](#function.fann-get-cascade-activation-steepnesses-count) — El número de pendientes de activación
- [fann_get_cascade_candidate_change_fraction](#function.fann-get-cascade-candidate-change-fraction) — Devuelve la fracción de cambio de candidatas en cascada
- [fann_get_cascade_candidate_limit](#function.fann-get-cascade-candidate-limit) — Devuelve el límite de candidatas
- [fann_get_cascade_candidate_stagnation_epochs](#function.fann-get-cascade-candidate-stagnation-epochs) — Devuelve el número de épocas de estancamiento de candidatas en cascada
- [fann_get_cascade_max_cand_epochs](#function.fann-get-cascade-max-cand-epochs) — Devuelve el máximo de épocas de candidatas
- [fann_get_cascade_max_out_epochs](#function.fann-get-cascade-max-out-epochs) — Devuelve el máximo de épocas de salida
- [fann_get_cascade_min_cand_epochs](#function.fann-get-cascade-min-cand-epochs) — Devuelve el mínimo de épocas de candidatas
- [fann_get_cascade_min_out_epochs](#function.fann-get-cascade-min-out-epochs) — Devuelve el mínimo de épocas de salida
- [fann_get_cascade_num_candidate_groups](#function.fann-get-cascade-num-candidate-groups) — Devuelve el número de grupos de candidatas
- [fann_get_cascade_num_candidates](#function.fann-get-cascade-num-candidates) — Devuelve el número de candidatas empleadas durante un entrenamiento
- [fann_get_cascade_output_change_fraction](#function.fann-get-cascade-output-change-fraction) — Devuelve la fracción de cambio de salida en cascada
- [fann_get_cascade_output_stagnation_epochs](#function.fann-get-cascade-output-stagnation-epochs) — Devuelve el número de épocas de estancamiento de salida en cascada
- [fann_get_cascade_weight_multiplier](#function.fann-get-cascade-weight-multiplier) — Devuelve el multiplicador de peso
- [fann_get_connection_array](#function.fann-get-connection-array) — Obtener las conexiones de la red
- [fann_get_connection_rate](#function.fann-get-connection-rate) — Obtener el índice de conexión empleado al crear la red
- [fann_get_errno](#function.fann-get-errno) — Devuelve el número del último error
- [fann_get_errstr](#function.fann-get-errstr) — Devuelve el string de último error
- [fann_get_layer_array](#function.fann-get-layer-array) — Obtener el número de neuronas de cada capa de la red
- [fann_get_learning_momentum](#function.fann-get-learning-momentum) — Devuelve el momento del aprendizaje
- [fann_get_learning_rate](#function.fann-get-learning-rate) — Devuelve el índice de aprendizaje
- [fann_get_MSE](#function.fann-get-mse) — Lee el error cuadrático medio de la red
- [fann_get_network_type](#function.fann-get-network-type) — Obtener el tipo de una red neuronal
- [fann_get_num_input](#function.fann-get-num-input) — Obtener el número de neuronas de entrada
- [fann_get_num_layers](#function.fann-get-num-layers) — Obtener el número de capas de la red neuronal
- [fann_get_num_output](#function.fann-get-num-output) — Obtener el número de neuronas de salida
- [fann_get_quickprop_decay](#function.fann-get-quickprop-decay) — Devuelve la decadencia, que es un factor por el que los pesos deberían decrementar en cada iteración durante un entrenamiento quickprop
- [fann_get_quickprop_mu](#function.fann-get-quickprop-mu) — Devuelve el factor mu
- [fann_get_rprop_decrease_factor](#function.fann-get-rprop-decrease-factor) — Devuelve el factor de disminución empleado durante un entrenamiento RPROP
- [fann_get_rprop_delta_max](#function.fann-get-rprop-delta-max) — Devuelve el tamaño de paso máximo
- [fann_get_rprop_delta_min](#function.fann-get-rprop-delta-min) — Devuelve el tamaño de paso mínimo
- [fann_get_rprop_delta_zero](#function.fann-get-rprop-delta-zero) — Devuelve el tamaño de paso inicial
- [fann_get_rprop_increase_factor](#function.fann-get-rprop-increase-factor) — Devuelve el factor de aumento empleado durante un entrenamiento RPROP
- [fann_get_sarprop_step_error_shift](#function.fann-get-sarprop-step-error-shift) — Devuelve el desplazamiento del error de paso de sarprop
- [fann_get_sarprop_step_error_threshold_factor](#function.fann-get-sarprop-step-error-threshold-factor) — Devuelve el factor de umbral del error de paso de sarprop
- [fann_get_sarprop_temperature](#function.fann-get-sarprop-temperature) — Devuelve la temperatura de sarprop
- [fann_get_sarprop_weight_decay_shift](#function.fann-get-sarprop-weight-decay-shift) — Devuelve el desplazamiento de decadencia del peso de sarprop
- [fann_get_total_connections](#function.fann-get-total-connections) — Obtener el número total de conexiones de la red completa
- [fann_get_total_neurons](#function.fann-get-total-neurons) — Obtener el número total de neuronas de la red completa
- [fann_get_train_error_function](#function.fann-get-train-error-function) — Devuelve la función de error empleada durante un entrenamiento
- [fann_get_train_stop_function](#function.fann-get-train-stop-function) — Devuelve la función de parada empleada durante el entrenamiento
- [fann_get_training_algorithm](#function.fann-get-training-algorithm) — Devuelve el algoritmo de entrenamiento
- [fann_init_weights](#function.fann-init-weights) — Inicializar los pesos empleando el algoritmo de Widrow + Nguyen
- [fann_length_train_data](#function.fann-length-train-data) — Devuelve el número de patrones de entrenamiento de los datos de entrenamiento
- [fann_merge_train_data](#function.fann-merge-train-data) — Funde los datos de entrenamiento
- [fann_num_input_train_data](#function.fann-num-input-train-data) — Devuelve el número de entradas de cada patrón de entrenamiento de los datos de entrenamiento
- [fann_num_output_train_data](#function.fann-num-output-train-data) — Devuelve el número de salidas de cada patrón de entrenamiento de los datos de entrenamiento
- [fann_print_error](#function.fann-print-error) — Imprime el string de error
- [fann_randomize_weights](#function.fann-randomize-weights) — Dar a cada conexión un peso aleatorio entre min_weight y max_weight
- [fann_read_train_from_file](#function.fann-read-train-from-file) — Lee un fichero que almacena datos de entrenamiento
- [fann_reset_errno](#function.fann-reset-errno) — Reinicia el número del último error
- [fann_reset_errstr](#function.fann-reset-errstr) — Reinicia el string del último error
- [fann_reset_MSE](#function.fann-reset-mse) — Reinicia el error cuadrático medio de la red
- [fann_run](#function.fann-run) — Ejecutará la entrada a través de la red neuronal
- [fann_save](#function.fann-save) — Guarda la red completa a un fichero de configuración
- [fann_save_train](#function.fann-save-train) — Guarda la estructura de entrenamiento en un fichero
- [fann_scale_input](#function.fann-scale-input) — Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados
- [fann_scale_input_train_data](#function.fann-scale-input-train-data) — Escala las entradas de los datos de entrenamiento al rango especificado
- [fann_scale_output](#function.fann-scale-output) — Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados
- [fann_scale_output_train_data](#function.fann-scale-output-train-data) — Escala las salidas de los datos de entrenamiento al rango especificado
- [fann_scale_train](#function.fann-scale-train) — Escalar datos de entrada y salida basados en parámetros previamente calculados
- [fann_scale_train_data](#function.fann-scale-train-data) — Escala la entradas y salidas de los datos de entrenamiento al rango especificado
- [fann_set_activation_function](#function.fann-set-activation-function) — Establece la función de activación para la neurona y capa proporcionadas
- [fann_set_activation_function_hidden](#function.fann-set-activation-function-hidden) — Establece la función de activación para todas las capas ocultas
- [fann_set_activation_function_layer](#function.fann-set-activation-function-layer) — Establece la función de activación para todas las neuronas de la capa proporcionada
- [fann_set_activation_function_output](#function.fann-set-activation-function-output) — Establece la función de activación para la capa de salida
- [fann_set_activation_steepness](#function.fann-set-activation-steepness) — Establece la pendiente de activación el número de neurona y capa proporcionados
- [fann_set_activation_steepness_hidden](#function.fann-set-activation-steepness-hidden) — Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas
- [fann_set_activation_steepness_layer](#function.fann-set-activation-steepness-layer) — Establece la pendiente de activación para todas las neuronas del número de capa proporcionada
- [fann_set_activation_steepness_output](#function.fann-set-activation-steepness-output) — Establece la pendiente de activación de la capa de salida
- [fann_set_bit_fail_limit](#function.fann-set-bit-fail-limit) — Establece el límite de fallo de bit empleado durante un entrenamiento
- [fann_set_callback](#function.fann-set-callback) — Establece la función de retrollamada a emplear durante el entrenamiento
- [fann_set_cascade_activation_functions](#function.fann-set-cascade-activation-functions) — Establece el array de funciones de activación de candidatas en cascada
- [fann_set_cascade_activation_steepnesses](#function.fann-set-cascade-activation-steepnesses) — Establece el array de pendientes de activación de candidatas en cascada
- [fann_set_cascade_candidate_change_fraction](#function.fann-set-cascade-candidate-change-fraction) — Establece la fracción de cambio de candidatas en cascada
- [fann_set_cascade_candidate_limit](#function.fann-set-cascade-candidate-limit) — Establece el límite de candidatas
- [fann_set_cascade_candidate_stagnation_epochs](#function.fann-set-cascade-candidate-stagnation-epochs) — Establece el número de épocas de estancamiento de candidatas en cascada
- [fann_set_cascade_max_cand_epochs](#function.fann-set-cascade-max-cand-epochs) — Establece el máximo de épocas de candidatas
- [fann_set_cascade_max_out_epochs](#function.fann-set-cascade-max-out-epochs) — Establece el máximo de épocas de salida
- [fann_set_cascade_min_cand_epochs](#function.fann-set-cascade-min-cand-epochs) — Establece el mínimo de épocas de candidatas
- [fann_set_cascade_min_out_epochs](#function.fann-set-cascade-min-out-epochs) — Establece el mínimo de épocas de salida
- [fann_set_cascade_num_candidate_groups](#function.fann-set-cascade-num-candidate-groups) — Establece el número de grupos de candidatas
- [fann_set_cascade_output_change_fraction](#function.fann-set-cascade-output-change-fraction) — Establece la fracción de cambio de salida en cascada
- [fann_set_cascade_output_stagnation_epochs](#function.fann-set-cascade-output-stagnation-epochs) — Establece el número de épocas de estancamiento de salida en cascada
- [fann_set_cascade_weight_multiplier](#function.fann-set-cascade-weight-multiplier) — Establece el multiplicador de peso
- [fann_set_error_log](#function.fann-set-error-log) — Establece dónde registrar los errores
- [fann_set_input_scaling_params](#function.fann-set-input-scaling-params) — Calcular los parámetros de escala de entrada para un uso futuro basados en datos de entrenamiento
- [fann_set_learning_momentum](#function.fann-set-learning-momentum) — Establece el momento del aprendizaje
- [fann_set_learning_rate](#function.fann-set-learning-rate) — Establece el índice de aprendizaje
- [fann_set_output_scaling_params](#function.fann-set-output-scaling-params) — Calcular los parámetros de escala de salida para un uso futuro basados en datos de entrenamiento
- [fann_set_quickprop_decay](#function.fann-set-quickprop-decay) — Establece el factor de decadencia de quickprop
- [fann_set_quickprop_mu](#function.fann-set-quickprop-mu) — Establece el factor mu de quickprop
- [fann_set_rprop_decrease_factor](#function.fann-set-rprop-decrease-factor) — Establece el factor de disminución empleado durante un entrenamiento RPROP
- [fann_set_rprop_delta_max](#function.fann-set-rprop-delta-max) — Establece el tamaño de paso máximo
- [fann_set_rprop_delta_min](#function.fann-set-rprop-delta-min) — Establece el tamaño de paso mínimo
- [fann_set_rprop_delta_zero](#function.fann-set-rprop-delta-zero) — Establece el tamaño de paso inicial
- [fann_set_rprop_increase_factor](#function.fann-set-rprop-increase-factor) — Establece el factor de aumento empleado durante un entrenamiento RPROP
- [fann_set_sarprop_step_error_shift](#function.fann-set-sarprop-step-error-shift) — Establece el desplazamiento del error de paso de sarprop
- [fann_set_sarprop_step_error_threshold_factor](#function.fann-set-sarprop-step-error-threshold-factor) — Establece el factor de umbral del error de paso de sarprop
- [fann_set_sarprop_temperature](#function.fann-set-sarprop-temperature) — Establece la temperatura de sarprop
- [fann_set_sarprop_weight_decay_shift](#function.fann-set-sarprop-weight-decay-shift) — Establece el desplazamiento de decadencia del peso de sarprop
- [fann_set_scaling_params](#function.fann-set-scaling-params) — Calcular los parámetros de escala de entrada y salida para un uso futuro basados en datos de entrenamiento
- [fann_set_train_error_function](#function.fann-set-train-error-function) — Establecer la función de error empleada durante un entrenamiento
- [fann_set_train_stop_function](#function.fann-set-train-stop-function) — Establece la función de parada empleada durante el entrenamiento
- [fann_set_training_algorithm](#function.fann-set-training-algorithm) — Establece el algoritmo de entrenamiento
- [fann_set_weight](#function.fann-set-weight) — Establecer una conexión de la red
- [fann_set_weight_array](#function.fann-set-weight-array) — Establecer las conexiones de la red
- [fann_shuffle_train_data](#function.fann-shuffle-train-data) — Mezcla los datos de entrenamiento, aleatorizando el orden
- [fann_subset_train_data](#function.fann-subset-train-data) — Devuelve una copia de un subconjunto de los datos de entrenamiento
- [fann_test](#function.fann-test) — Realiza una prueba con un conjunto de entradas y un conjunto de salidas deseadas
- [fann_test_data](#function.fann-test-data) — Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos
- [fann_train](#function.fann-train) — Entrenar una iteración con un conjunto de entradas y un conjunto de salidas deseadas
- [fann_train_epoch](#function.fann-train-epoch) — Entrenar una época con un conjunto de datos de entrenamiento
- [fann_train_on_data](#function.fann-train-on-data) — Entrena un conjunto de datos completo por un período de tiempo
- [fann_train_on_file](#function.fann-train-on-file) — Entrena un conjunto de datos completo leído desde un fichero, por un período de tiempo

# La clase FANNConnection

(No version information available, might only be in Git)

## Introducción

    **FANNConnection** se emplea para la conexión de redes neuronales.
    Los objetos de esta clase se emplean en [fann_get_connection_array()](#function.fann-get-connection-array) y [fann_set_weight_array()](#function.fann-set-weight-array).

## Sinopsis de la Clase

    ****




      class **FANNConnection**

     {

    /* Propiedades */

     public
      [$from_neuron](#fannconnection.props.from-neuron);

    public
      [$to_neuron](#fannconnection.props.to-neuron);

    public
      [$weight](#fannconnection.props.weight);



    /* Métodos */

public [\_\_construct](#fannconnection.construct)([int](#language.types.integer) $from_neuron, [int](#language.types.integer) $to_neuron, [float](#language.types.float) $weight)

    public [getFromNeuron](#fannconnection.getfromneuron)(): [int](#language.types.integer)

public [getToNeuron](#fannconnection.gettoneuron)(): [int](#language.types.integer)
public [getWeight](#fannconnection.getweight)(): [void](language.types.void.html)
public [setWeight](#fannconnection.setweight)([float](#language.types.float) $weight): [void](language.types.void.html)

}

## Propiedades

     from_neuron

      La neurona donde empieza la conexión.





     to_neuron

      La neurona donde finaliza la conexión.





     weight

      El peso de la conexión.




# FANNConnection::\_\_construct

(PECL fann &gt;= 1.0.0)

FANNConnection::\_\_construct — El constructor de la conexión

### Descripción

public **FANNConnection::\_\_construct**([int](#language.types.integer) $from_neuron, [int](#language.types.integer) $to_neuron, [float](#language.types.float) $weight)

Crea una nueva conexión e inicializa sus parámetros. Después de crear la conexión, solamente se puede cambiar el peso.

### Parámetros

    from_neuron


      El número de posición de la neurona inicial.






    to_neuron


      El número de posición de la neurona terminal.






    weight


      El valor del peso de la conexión.


# FANNConnection::getFromNeuron

(PECL fann &gt;= 1.0.0)

FANNConnection::getFromNeuron — Devuelve las posiciones de la neurona inicial

### Descripción

public **FANNConnection::getFromNeuron**(): [int](#language.types.integer)

Devuelve las posiciones de la neurona inicial.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Las posiciones de la neurona inicial.

# FANNConnection::getToNeuron

(PECL fann &gt;= 1.0.0)

FANNConnection::getToNeuron — Devuelve las posiciones de la neurona terminal

### Descripción

public **FANNConnection::getToNeuron**(): [int](#language.types.integer)

Devuelve las posiciones de la neurona terminal.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Las posiciones de la neurona terminal.

# FANNConnection::getWeight

(PECL fann &gt;= 1.0.0)

FANNConnection::getWeight — Devuelve el peso de la conexión

### Descripción

public **FANNConnection::getWeight**(): [void](language.types.void.html)

Devuelve el peso de la conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El peso de la conexión.

# FANNConnection::setWeight

(PECL fann &gt;= 1.0.0)

FANNConnection::setWeight — Establece el peso de la conexión

### Descripción

public **FANNConnection::setWeight**([float](#language.types.float) $weight): [void](language.types.void.html)

Establece el peso de la conexión.

Este método es diferente de [fann_set_weight()](#function.fann-set-weight). No
actualiza el valor del peso de la red. El valor de la red se actualiza solamente
después de llamar a [fann_set_weight_array()](#function.fann-set-weight-array).

### Parámetros

     weight


       El peso de la conexión.





### Valores devueltos

No devuelve ningún valor.

## Tabla de contenidos

- [FANNConnection::\_\_construct](#fannconnection.construct) — El constructor de la conexión
- [FANNConnection::getFromNeuron](#fannconnection.getfromneuron) — Devuelve las posiciones de la neurona inicial
- [FANNConnection::getToNeuron](#fannconnection.gettoneuron) — Devuelve las posiciones de la neurona terminal
- [FANNConnection::getWeight](#fannconnection.getweight) — Devuelve el peso de la conexión
- [FANNConnection::setWeight](#fannconnection.setweight) — Establece el peso de la conexión

- [Introducción](#intro.fann)
- [Instalación/Configuración](#fann.setup)<li>[Requerimientos](#fann.requirements)
- [Instalación](#fann.installation)
- [Tipos de recursos](#fann.resources)
  </li>- [Constantes predefinidas](#fann.constants)
- [Ejemplos](#fann.examples)<li>[Entrenamiento XOR](#fann.examples-1)
  </li>- [Funciones de Fann](#ref.fann)<li>[fann_cascadetrain_on_data](#function.fann-cascadetrain-on-data) — Entrena un conjunto de datos completo, por un período de tiempo utilizando el algoritmo de entrenamiento Cascade2
- [fann_cascadetrain_on_file](#function.fann-cascadetrain-on-file) — Entrena una red neuronal sobre un conjunto completo de datos durante un período de tiempo utilizando el algoritmo de entrenamiento Cascade2
- [fann_clear_scaling_params](#function.fann-clear-scaling-params) — Limpia los parámetros de escala
- [fann_copy](#function.fann-copy) — Crea una copia de una estructura fann
- [fann_create_from_file](#function.fann-create-from-file) — Construye una red neuronal de retropropagación desde un fichero de configuración
- [fann_create_shortcut](#function.fann-create-shortcut) — Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo
- [fann_create_shortcut_array](#function.fann-create-shortcut-array) — Crea una red neuronal de retropropagación estándar que no está completamente conectada y que posee conexiones de atajo
- [fann_create_sparse](#function.fann-create-sparse) — Crea una red neuronal de retropropagación estándar que no está conectada completamente
- [fann_create_sparse_array](#function.fann-create-sparse-array) — Crea una red neuronal de retropropagación estándar que no está completamente conectada empleando un array con tamaños de capas
- [fann_create_standard](#function.fann-create-standard) — Crea una red neuronal de retropropagación estándar completamente conectada
- [fann_create_standard_array](#function.fann-create-standard-array) — Crea una red neuronal de retropropagación estándar completamente conectada empleando un array con tamaños de capas
- [fann_create_train](#function.fann-create-train) — Crea una estructura de datos de entrenamiento vacía
- [fann_create_train_from_callback](#function.fann-create-train-from-callback) — Crea una estructura de datos de entrenamiento desde una función proporcionada por el usuario
- [fann_descale_input](#function.fann-descale-input) — Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados
- [fann_descale_output](#function.fann-descale-output) — Escalar datos en un vector de entrada después de obtenerlo de una RNA basada en parámetros previamente calculados
- [fann_descale_train](#function.fann-descale-train) — Descalar datos de entrada y salida basados en parámetros previamente calculados
- [fann_destroy](#function.fann-destroy) — Destruye la red por completo y libera adecuadamente toda la memoria asociada
- [fann_destroy_train](#function.fann-destroy-train) — Destruye los datos de entrenamiento
- [fann_duplicate_train_data](#function.fann-duplicate-train-data) — Devuelve una copia exacta de uno datos de entrenamiento de fann
- [fann_get_activation_function](#function.fann-get-activation-function) — Devuelve la función de activación
- [fann_get_activation_steepness](#function.fann-get-activation-steepness) — Devuelve la pendiente de activación para el número de neurona y de capa proporcionados
- [fann_get_bias_array](#function.fann-get-bias-array) — Obtener el número de tendencias de cada capa de una red
- [fann_get_bit_fail](#function.fann-get-bit-fail) — El número de bit fallidos
- [fann_get_bit_fail_limit](#function.fann-get-bit-fail-limit) — Devuelve el límite de fallo de bit empleado durante un entrenamiento
- [fann_get_cascade_activation_functions](#function.fann-get-cascade-activation-functions) — Devuelve las funciones de activación en cascada
- [fann_get_cascade_activation_functions_count](#function.fann-get-cascade-activation-functions-count) — Devuelve el número de funciones de activación en cascada
- [fann_get_cascade_activation_steepnesses](#function.fann-get-cascade-activation-steepnesses) — Devuelve las pendientes de activación en cascada
- [fann_get_cascade_activation_steepnesses_count](#function.fann-get-cascade-activation-steepnesses-count) — El número de pendientes de activación
- [fann_get_cascade_candidate_change_fraction](#function.fann-get-cascade-candidate-change-fraction) — Devuelve la fracción de cambio de candidatas en cascada
- [fann_get_cascade_candidate_limit](#function.fann-get-cascade-candidate-limit) — Devuelve el límite de candidatas
- [fann_get_cascade_candidate_stagnation_epochs](#function.fann-get-cascade-candidate-stagnation-epochs) — Devuelve el número de épocas de estancamiento de candidatas en cascada
- [fann_get_cascade_max_cand_epochs](#function.fann-get-cascade-max-cand-epochs) — Devuelve el máximo de épocas de candidatas
- [fann_get_cascade_max_out_epochs](#function.fann-get-cascade-max-out-epochs) — Devuelve el máximo de épocas de salida
- [fann_get_cascade_min_cand_epochs](#function.fann-get-cascade-min-cand-epochs) — Devuelve el mínimo de épocas de candidatas
- [fann_get_cascade_min_out_epochs](#function.fann-get-cascade-min-out-epochs) — Devuelve el mínimo de épocas de salida
- [fann_get_cascade_num_candidate_groups](#function.fann-get-cascade-num-candidate-groups) — Devuelve el número de grupos de candidatas
- [fann_get_cascade_num_candidates](#function.fann-get-cascade-num-candidates) — Devuelve el número de candidatas empleadas durante un entrenamiento
- [fann_get_cascade_output_change_fraction](#function.fann-get-cascade-output-change-fraction) — Devuelve la fracción de cambio de salida en cascada
- [fann_get_cascade_output_stagnation_epochs](#function.fann-get-cascade-output-stagnation-epochs) — Devuelve el número de épocas de estancamiento de salida en cascada
- [fann_get_cascade_weight_multiplier](#function.fann-get-cascade-weight-multiplier) — Devuelve el multiplicador de peso
- [fann_get_connection_array](#function.fann-get-connection-array) — Obtener las conexiones de la red
- [fann_get_connection_rate](#function.fann-get-connection-rate) — Obtener el índice de conexión empleado al crear la red
- [fann_get_errno](#function.fann-get-errno) — Devuelve el número del último error
- [fann_get_errstr](#function.fann-get-errstr) — Devuelve el string de último error
- [fann_get_layer_array](#function.fann-get-layer-array) — Obtener el número de neuronas de cada capa de la red
- [fann_get_learning_momentum](#function.fann-get-learning-momentum) — Devuelve el momento del aprendizaje
- [fann_get_learning_rate](#function.fann-get-learning-rate) — Devuelve el índice de aprendizaje
- [fann_get_MSE](#function.fann-get-mse) — Lee el error cuadrático medio de la red
- [fann_get_network_type](#function.fann-get-network-type) — Obtener el tipo de una red neuronal
- [fann_get_num_input](#function.fann-get-num-input) — Obtener el número de neuronas de entrada
- [fann_get_num_layers](#function.fann-get-num-layers) — Obtener el número de capas de la red neuronal
- [fann_get_num_output](#function.fann-get-num-output) — Obtener el número de neuronas de salida
- [fann_get_quickprop_decay](#function.fann-get-quickprop-decay) — Devuelve la decadencia, que es un factor por el que los pesos deberían decrementar en cada iteración durante un entrenamiento quickprop
- [fann_get_quickprop_mu](#function.fann-get-quickprop-mu) — Devuelve el factor mu
- [fann_get_rprop_decrease_factor](#function.fann-get-rprop-decrease-factor) — Devuelve el factor de disminución empleado durante un entrenamiento RPROP
- [fann_get_rprop_delta_max](#function.fann-get-rprop-delta-max) — Devuelve el tamaño de paso máximo
- [fann_get_rprop_delta_min](#function.fann-get-rprop-delta-min) — Devuelve el tamaño de paso mínimo
- [fann_get_rprop_delta_zero](#function.fann-get-rprop-delta-zero) — Devuelve el tamaño de paso inicial
- [fann_get_rprop_increase_factor](#function.fann-get-rprop-increase-factor) — Devuelve el factor de aumento empleado durante un entrenamiento RPROP
- [fann_get_sarprop_step_error_shift](#function.fann-get-sarprop-step-error-shift) — Devuelve el desplazamiento del error de paso de sarprop
- [fann_get_sarprop_step_error_threshold_factor](#function.fann-get-sarprop-step-error-threshold-factor) — Devuelve el factor de umbral del error de paso de sarprop
- [fann_get_sarprop_temperature](#function.fann-get-sarprop-temperature) — Devuelve la temperatura de sarprop
- [fann_get_sarprop_weight_decay_shift](#function.fann-get-sarprop-weight-decay-shift) — Devuelve el desplazamiento de decadencia del peso de sarprop
- [fann_get_total_connections](#function.fann-get-total-connections) — Obtener el número total de conexiones de la red completa
- [fann_get_total_neurons](#function.fann-get-total-neurons) — Obtener el número total de neuronas de la red completa
- [fann_get_train_error_function](#function.fann-get-train-error-function) — Devuelve la función de error empleada durante un entrenamiento
- [fann_get_train_stop_function](#function.fann-get-train-stop-function) — Devuelve la función de parada empleada durante el entrenamiento
- [fann_get_training_algorithm](#function.fann-get-training-algorithm) — Devuelve el algoritmo de entrenamiento
- [fann_init_weights](#function.fann-init-weights) — Inicializar los pesos empleando el algoritmo de Widrow + Nguyen
- [fann_length_train_data](#function.fann-length-train-data) — Devuelve el número de patrones de entrenamiento de los datos de entrenamiento
- [fann_merge_train_data](#function.fann-merge-train-data) — Funde los datos de entrenamiento
- [fann_num_input_train_data](#function.fann-num-input-train-data) — Devuelve el número de entradas de cada patrón de entrenamiento de los datos de entrenamiento
- [fann_num_output_train_data](#function.fann-num-output-train-data) — Devuelve el número de salidas de cada patrón de entrenamiento de los datos de entrenamiento
- [fann_print_error](#function.fann-print-error) — Imprime el string de error
- [fann_randomize_weights](#function.fann-randomize-weights) — Dar a cada conexión un peso aleatorio entre min_weight y max_weight
- [fann_read_train_from_file](#function.fann-read-train-from-file) — Lee un fichero que almacena datos de entrenamiento
- [fann_reset_errno](#function.fann-reset-errno) — Reinicia el número del último error
- [fann_reset_errstr](#function.fann-reset-errstr) — Reinicia el string del último error
- [fann_reset_MSE](#function.fann-reset-mse) — Reinicia el error cuadrático medio de la red
- [fann_run](#function.fann-run) — Ejecutará la entrada a través de la red neuronal
- [fann_save](#function.fann-save) — Guarda la red completa a un fichero de configuración
- [fann_save_train](#function.fann-save-train) — Guarda la estructura de entrenamiento en un fichero
- [fann_scale_input](#function.fann-scale-input) — Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados
- [fann_scale_input_train_data](#function.fann-scale-input-train-data) — Escala las entradas de los datos de entrenamiento al rango especificado
- [fann_scale_output](#function.fann-scale-output) — Escalar datos en un vector de entrada antes de alimentarlo a una RNA basada en parámetros previamente calculados
- [fann_scale_output_train_data](#function.fann-scale-output-train-data) — Escala las salidas de los datos de entrenamiento al rango especificado
- [fann_scale_train](#function.fann-scale-train) — Escalar datos de entrada y salida basados en parámetros previamente calculados
- [fann_scale_train_data](#function.fann-scale-train-data) — Escala la entradas y salidas de los datos de entrenamiento al rango especificado
- [fann_set_activation_function](#function.fann-set-activation-function) — Establece la función de activación para la neurona y capa proporcionadas
- [fann_set_activation_function_hidden](#function.fann-set-activation-function-hidden) — Establece la función de activación para todas las capas ocultas
- [fann_set_activation_function_layer](#function.fann-set-activation-function-layer) — Establece la función de activación para todas las neuronas de la capa proporcionada
- [fann_set_activation_function_output](#function.fann-set-activation-function-output) — Establece la función de activación para la capa de salida
- [fann_set_activation_steepness](#function.fann-set-activation-steepness) — Establece la pendiente de activación el número de neurona y capa proporcionados
- [fann_set_activation_steepness_hidden](#function.fann-set-activation-steepness-hidden) — Establece la pendiente de la activación para todas las neuronas de todas las capas ocultas
- [fann_set_activation_steepness_layer](#function.fann-set-activation-steepness-layer) — Establece la pendiente de activación para todas las neuronas del número de capa proporcionada
- [fann_set_activation_steepness_output](#function.fann-set-activation-steepness-output) — Establece la pendiente de activación de la capa de salida
- [fann_set_bit_fail_limit](#function.fann-set-bit-fail-limit) — Establece el límite de fallo de bit empleado durante un entrenamiento
- [fann_set_callback](#function.fann-set-callback) — Establece la función de retrollamada a emplear durante el entrenamiento
- [fann_set_cascade_activation_functions](#function.fann-set-cascade-activation-functions) — Establece el array de funciones de activación de candidatas en cascada
- [fann_set_cascade_activation_steepnesses](#function.fann-set-cascade-activation-steepnesses) — Establece el array de pendientes de activación de candidatas en cascada
- [fann_set_cascade_candidate_change_fraction](#function.fann-set-cascade-candidate-change-fraction) — Establece la fracción de cambio de candidatas en cascada
- [fann_set_cascade_candidate_limit](#function.fann-set-cascade-candidate-limit) — Establece el límite de candidatas
- [fann_set_cascade_candidate_stagnation_epochs](#function.fann-set-cascade-candidate-stagnation-epochs) — Establece el número de épocas de estancamiento de candidatas en cascada
- [fann_set_cascade_max_cand_epochs](#function.fann-set-cascade-max-cand-epochs) — Establece el máximo de épocas de candidatas
- [fann_set_cascade_max_out_epochs](#function.fann-set-cascade-max-out-epochs) — Establece el máximo de épocas de salida
- [fann_set_cascade_min_cand_epochs](#function.fann-set-cascade-min-cand-epochs) — Establece el mínimo de épocas de candidatas
- [fann_set_cascade_min_out_epochs](#function.fann-set-cascade-min-out-epochs) — Establece el mínimo de épocas de salida
- [fann_set_cascade_num_candidate_groups](#function.fann-set-cascade-num-candidate-groups) — Establece el número de grupos de candidatas
- [fann_set_cascade_output_change_fraction](#function.fann-set-cascade-output-change-fraction) — Establece la fracción de cambio de salida en cascada
- [fann_set_cascade_output_stagnation_epochs](#function.fann-set-cascade-output-stagnation-epochs) — Establece el número de épocas de estancamiento de salida en cascada
- [fann_set_cascade_weight_multiplier](#function.fann-set-cascade-weight-multiplier) — Establece el multiplicador de peso
- [fann_set_error_log](#function.fann-set-error-log) — Establece dónde registrar los errores
- [fann_set_input_scaling_params](#function.fann-set-input-scaling-params) — Calcular los parámetros de escala de entrada para un uso futuro basados en datos de entrenamiento
- [fann_set_learning_momentum](#function.fann-set-learning-momentum) — Establece el momento del aprendizaje
- [fann_set_learning_rate](#function.fann-set-learning-rate) — Establece el índice de aprendizaje
- [fann_set_output_scaling_params](#function.fann-set-output-scaling-params) — Calcular los parámetros de escala de salida para un uso futuro basados en datos de entrenamiento
- [fann_set_quickprop_decay](#function.fann-set-quickprop-decay) — Establece el factor de decadencia de quickprop
- [fann_set_quickprop_mu](#function.fann-set-quickprop-mu) — Establece el factor mu de quickprop
- [fann_set_rprop_decrease_factor](#function.fann-set-rprop-decrease-factor) — Establece el factor de disminución empleado durante un entrenamiento RPROP
- [fann_set_rprop_delta_max](#function.fann-set-rprop-delta-max) — Establece el tamaño de paso máximo
- [fann_set_rprop_delta_min](#function.fann-set-rprop-delta-min) — Establece el tamaño de paso mínimo
- [fann_set_rprop_delta_zero](#function.fann-set-rprop-delta-zero) — Establece el tamaño de paso inicial
- [fann_set_rprop_increase_factor](#function.fann-set-rprop-increase-factor) — Establece el factor de aumento empleado durante un entrenamiento RPROP
- [fann_set_sarprop_step_error_shift](#function.fann-set-sarprop-step-error-shift) — Establece el desplazamiento del error de paso de sarprop
- [fann_set_sarprop_step_error_threshold_factor](#function.fann-set-sarprop-step-error-threshold-factor) — Establece el factor de umbral del error de paso de sarprop
- [fann_set_sarprop_temperature](#function.fann-set-sarprop-temperature) — Establece la temperatura de sarprop
- [fann_set_sarprop_weight_decay_shift](#function.fann-set-sarprop-weight-decay-shift) — Establece el desplazamiento de decadencia del peso de sarprop
- [fann_set_scaling_params](#function.fann-set-scaling-params) — Calcular los parámetros de escala de entrada y salida para un uso futuro basados en datos de entrenamiento
- [fann_set_train_error_function](#function.fann-set-train-error-function) — Establecer la función de error empleada durante un entrenamiento
- [fann_set_train_stop_function](#function.fann-set-train-stop-function) — Establece la función de parada empleada durante el entrenamiento
- [fann_set_training_algorithm](#function.fann-set-training-algorithm) — Establece el algoritmo de entrenamiento
- [fann_set_weight](#function.fann-set-weight) — Establecer una conexión de la red
- [fann_set_weight_array](#function.fann-set-weight-array) — Establecer las conexiones de la red
- [fann_shuffle_train_data](#function.fann-shuffle-train-data) — Mezcla los datos de entrenamiento, aleatorizando el orden
- [fann_subset_train_data](#function.fann-subset-train-data) — Devuelve una copia de un subconjunto de los datos de entrenamiento
- [fann_test](#function.fann-test) — Realiza una prueba con un conjunto de entradas y un conjunto de salidas deseadas
- [fann_test_data](#function.fann-test-data) — Prueba un conjunto de datos de entrenamiento y calcula el ECM de dichos datos
- [fann_train](#function.fann-train) — Entrenar una iteración con un conjunto de entradas y un conjunto de salidas deseadas
- [fann_train_epoch](#function.fann-train-epoch) — Entrenar una época con un conjunto de datos de entrenamiento
- [fann_train_on_data](#function.fann-train-on-data) — Entrena un conjunto de datos completo por un período de tiempo
- [fann_train_on_file](#function.fann-train-on-file) — Entrena un conjunto de datos completo leído desde un fichero, por un período de tiempo
  </li>- [FANNConnection](#class.fannconnection) — La clase FANNConnection<li>[FANNConnection::__construct](#fannconnection.construct) — El constructor de la conexión
- [FANNConnection::getFromNeuron](#fannconnection.getfromneuron) — Devuelve las posiciones de la neurona inicial
- [FANNConnection::getToNeuron](#fannconnection.gettoneuron) — Devuelve las posiciones de la neurona terminal
- [FANNConnection::getWeight](#fannconnection.getweight) — Devuelve el peso de la conexión
- [FANNConnection::setWeight](#fannconnection.setweight) — Establece el peso de la conexión
  </li>
