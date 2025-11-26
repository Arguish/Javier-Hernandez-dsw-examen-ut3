# Gearman

# Introducción

[» Gearman](http://gearman.org) es un marco de referencia base genérico para distribuir
tareas a múltiples máquinas o múltiples procesos. Permite a una aplicación ejecutar tareas
en paralelo, distribuir la carga de cálculo y realizar llamadas de funciones entre varios lenguajes.
Este marco de referencia base puede ser utilizado en numerosas aplicaciones, desde sitios web de alta disponibilidad hasta el transporte de eventos de replicación de bases de datos.

Esta extensión proporciona clases para escribir clientes o agentes Gearman.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#gearman.requirements)
- [Instalación](#gearman.installation)

    ## Requerimientos

    Esta extensión requiere las bibliotecas
    [» libgearman](http://gearman.org/getting-started/),
    [» libevent](http://libevent.org/) y
    [» uuid](http://www.ossp.org/pkg/lib/uuid/) así como un
    servidor Gearman.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/gearman](https://pecl.php.net/package/gearman)

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Valores de retorno. Siempre se debe buscar una cadena de caracteres de error en
[GearmanClient::error()](#gearmanclient.error) o **GearmanWorker()** ya que
pueden estar disponibles más detalles:

     **[GEARMAN_SUCCESS](#constant.gearman-success)**
     ([int](#language.types.integer))



      Cualquier acción realizada ha sido exitosa.





     **[GEARMAN_IO_WAIT](#constant.gearman-io-wait)**
     ([int](#language.types.integer))



      En modo no bloqueante, se ha alcanzado un evento que habría sido bloqueante.





     **[GEARMAN_ERRNO](#constant.gearman-errno)**
     ([int](#language.types.integer))



      Un error del sistema. Se debe buscar en **GearmanClient::errno()** o
      **GearmanWorker::errno()** el código de error del sistema que se ha
      devuelto.





     **[GEARMAN_NO_ACTIVE_FDS](#constant.gearman-no-active-fds)**
     ([int](#language.types.integer))



      [GearmanClient::wait()](#gearmanclient.wait) o **GearmanWorker()** ha
      sido llamado sin conexión.





     **[GEARMAN_UNEXPECTED_PACKET](#constant.gearman-unexpected-packet)**
     ([int](#language.types.integer))



      Indica que algo grave ha ocurrido en gearmand. Solo se aplica a
      [GearmanWorker](#class.gearmanworker).





     **[GEARMAN_GETADDRINFO](#constant.gearman-getaddrinfo)**
     ([int](#language.types.integer))



      La resolución DNS ha fallado (host o puerto inválido, etc).





     **[GEARMAN_NO_SERVERS](#constant.gearman-no-servers)**
     ([int](#language.types.integer))



      No se ha realizado ninguna llamada a [GearmanClient::addServer()](#gearmanclient.addserver) antes de enviar una
      tarea.





     **[GEARMAN_LOST_CONNECTION](#constant.gearman-lost-connection)**
     ([int](#language.types.integer))



      Se ha perdido la conexión durante una solicitud.





     **[GEARMAN_MEMORY_ALLOCATION_FAILURE](#constant.gearman-memory-allocation-failure)**
     ([int](#language.types.integer))



      La asignación de memoria ha fallado (no hay memoria disponible).





     **[GEARMAN_SERVER_ERROR](#constant.gearman-server-error)**
     ([int](#language.types.integer))



      Algo ha salido mal con el servidor Gearman que no ha podido procesar
      la solicitud como debería.





     **[GEARMAN_WORK_DATA](#constant.gearman-work-data)**
     ([int](#language.types.integer))



      Un código de error de notificación obtenido con [GearmanClient::returnCode()](#gearmanclient.returncode)
      al utilizar [GearmanClient::do()](#gearmanclient.do). Se envía para actualizar al
      cliente con los datos de la tarea actual. Un agente lo utiliza cuando necesita enviar actualizaciones,
      enviar resultados parciales o vaciar datos durante tareas largas.





     **[GEARMAN_WORK_WARNING](#constant.gearman-work-warning)**
     ([int](#language.types.integer))



      Un código de error de notificación obtenido con [GearmanClient::returnCode()](#gearmanclient.returncode)
      al utilizar [GearmanClient::do()](#gearmanclient.do). Actualiza al cliente con
      un aviso. El comportamiento es el mismo que con **[GEARMAN_WORK_DATA](#constant.gearman-work-data)**, excepto
      que debería ser tratado como un aviso en lugar de los datos de una respuesta normal.





     **[GEARMAN_WORK_STATUS](#constant.gearman-work-status)**
     ([int](#language.types.integer))



      Un código de error de notificación obtenido con [GearmanClient::returnCode()](#gearmanclient.returncode)
      al utilizar [GearmanClient::do()](#gearmanclient.do). Se envía para actualizar el estado
      de una tarea larga. Utilice [GearmanClient::doStatus()](#gearmanclient.dostatus) para obtener el porcentaje
      de completación de la tarea.





     **[GEARMAN_WORK_EXCEPTION](#constant.gearman-work-exception)**
     ([int](#language.types.integer))



      Un código de error de notificación obtenido con [GearmanClient::returnCode()](#gearmanclient.returncode)
      al utilizar [GearmanClient::do()](#gearmanclient.do). Indica que una tarea ha fallado
      al lanzar una excepción dada.





     **[GEARMAN_WORK_FAIL](#constant.gearman-work-fail)**
     ([int](#language.types.integer))



      Un código de error de notificación obtenido con [GearmanClient::returnCode()](#gearmanclient.returncode)
      al utilizar [GearmanClient::do()](#gearmanclient.do). Indica que una tarea ha fallado.





     **[GEARMAN_COULD_NOT_CONNECT](#constant.gearman-could-not-connect)**
     ([int](#language.types.integer))



      Fallo al conectar con los servidores.





     **[GEARMAN_INVALID_FUNCTION_NAME](#constant.gearman-invalid-function-name)**
     ([int](#language.types.integer))



      Intento de referencia a una función con un nombre NULL o uso de la interfaz de devolución de llamada
      sin especificar las devoluciones de llamada.





     **[GEARMAN_INVALID_WORKER_FUNCTION](#constant.gearman-invalid-worker-function)**
     ([int](#language.types.integer))



      Intento de referencia a una función con una función de devolución de llamada NULL.





     **[GEARMAN_NO_REGISTERED_FUNCTIONS](#constant.gearman-no-registered-functions)**
     ([int](#language.types.integer))



      Cuando un agente recibe una tarea para una función que no ha referenciado.





     **[GEARMAN_NO_JOBS](#constant.gearman-no-jobs)**
     ([int](#language.types.integer))



      Para un agente no bloqueante, cuando [GearmanWorker::work()](#gearmanworker.work) no tiene ninguna tarea
      activa.





     **[GEARMAN_ECHO_DATA_CORRUPTION](#constant.gearman-echo-data-corruption)**
     ([int](#language.types.integer))



      Después de [GearmanClient::echo()](#gearmanclient.echo) o [GearmanWorker::echo()](#gearmanworker.echo),
      los datos devueltos no coinciden con los datos enviados.





     **[GEARMAN_NEED_WORKLOAD_FN](#constant.gearman-need-workload-fn)**
     ([int](#language.types.integer))



      Cuando el cliente ha optado por distribuir la carga de trabajo en una tarea, pero no ha
      especificado una función de retorno de la carga de trabajo.





     **[GEARMAN_PAUSE](#constant.gearman-pause)**
     ([int](#language.types.integer))



      Para la interfaz de tarea cliente no bloqueante, puede ser devuelto desde el retorno de la tarea
      para "pausar" la llamada y el retorno de [GearmanClient::runTasks()](#gearmanclient.runtasks).
      Llame de nuevo a [GearmanClient::runTasks()](#gearmanclient.runtasks) para continuar.





     **[GEARMAN_UNKNOWN_STATE](#constant.gearman-unknown-state)**
     ([int](#language.types.integer))



      Error de estado interno del cliente/agente.





     **[GEARMAN_SEND_BUFFER_TOO_SMALL](#constant.gearman-send-buffer-too-small)**
     ([int](#language.types.integer))



      Error interno: intentó vaciar más datos de los posibles en un paquete atómico,
      debido a tamaños de búfer codificados en el código.





     **[GEARMAN_TIMEOUT](#constant.gearman-timeout)**
     ([int](#language.types.integer))



      Se ha alcanzado el límite de tiempo del agente/cliente.


Las opciones [GearmanClient](#class.gearmanclient):

     **[GEARMAN_CLIENT_GENERATE_UNIQUE](#constant.gearman-client-generate-unique)**
     ([int](#language.types.integer))



      Genera un identificador único (UUID) para cada tarea.






     **[GEARMAN_CLIENT_NON_BLOCKING](#constant.gearman-client-non-blocking)**
     ([int](#language.types.integer))



      Inicia el cliente en modo no bloqueante.





     **[GEARMAN_CLIENT_UNBUFFERED_RESULT](#constant.gearman-client-unbuffered-result)**
     ([int](#language.types.integer))



      Permite al cliente leer los datos por paquetes en lugar de que la biblioteca los almacene
      en búfer y los transmita.





     **[GEARMAN_CLIENT_FREE_TASKS](#constant.gearman-client-free-tasks)**
     ([int](#language.types.integer))



      Libera automáticamente los objetos de las tareas una vez que estas se han completado. Es la configuración por
      defecto de esta extensión para evitar fugas de memoria.


Las opciones [GearmanWorker](#class.gearmanworker):

     **[GEARMAN_WORKER_NON_BLOCKING](#constant.gearman-worker-non-blocking)**
     ([int](#language.types.integer))



      Inicia el agente en modo no bloqueante.





     **[GEARMAN_WORKER_GRAB_UNIQ](#constant.gearman-worker-grab-uniq)**
     ([int](#language.types.integer))



      Devuelve el identificador único asignado al cliente además del descriptor de tarea.


Configuración base de Gearman:

     **[GEARMAN_DEFAULT_TCP_HOST](#constant.gearman-default-tcp-host)**
     ([string](#language.types.string))








     **[GEARMAN_DEFAULT_TCP_PORT](#constant.gearman-default-tcp-port)**
     ([int](#language.types.integer))








     **[GEARMAN_DEFAULT_SOCKET_TIMEOUT](#constant.gearman-default-socket-timeout)**
     ([int](#language.types.integer))








     **[GEARMAN_DEFAULT_SOCKET_SEND_SIZE](#constant.gearman-default-socket-send-size)**
     ([int](#language.types.integer))








     **[GEARMAN_DEFAULT_SOCKET_RECV_SIZE](#constant.gearman-default-socket-recv-size)**
     ([int](#language.types.integer))








     **[GEARMAN_MAX_ERROR_SIZE](#constant.gearman-max-error-size)**
     ([int](#language.types.integer))








     **[GEARMAN_PACKET_HEADER_SIZE](#constant.gearman-packet-header-size)**
     ([int](#language.types.integer))








     **[GEARMAN_JOB_HANDLE_SIZE](#constant.gearman-job-handle-size)**
     ([int](#language.types.integer))








     **[GEARMAN_OPTION_SIZE](#constant.gearman-option-size)**
     ([int](#language.types.integer))








     **[GEARMAN_UNIQUE_SIZE](#constant.gearman-unique-size)**
     ([int](#language.types.integer))








     **[GEARMAN_MAX_COMMAND_ARGS](#constant.gearman-max-command-args)**
     ([int](#language.types.integer))








     **[GEARMAN_ARGS_BUFFER_SIZE](#constant.gearman-args-buffer-size)**
     ([int](#language.types.integer))








     **[GEARMAN_SEND_BUFFER_SIZE](#constant.gearman-send-buffer-size)**
     ([int](#language.types.integer))








     **[GEARMAN_RECV_BUFFER_SIZE](#constant.gearman-recv-buffer-size)**
     ([int](#language.types.integer))








     **[GEARMAN_WORKER_WAIT_TIMEOUT](#constant.gearman-worker-wait-timeout)**
     ([int](#language.types.integer))





# Ejemplos

## Tabla de contenidos

- [Uso básico](#gearman.examples-reverse)
- [Cliente y trabajador básicos en Gearman, trabajo en segundo plano](#gearman.examples-reverse-bg)
- [Cliente y trabajador básicos, enviando tareas](#gearman.examples-reverse-task)

    ## Uso básico

    **Ejemplo #1 Cliente y trabajador básicos en Gearman**

    Este ejemplo muestra un cliente y un trabajador muy sencillo. El cliente
    envía un string al servidor de trabajos, y el trabajador da la vuelta al
    string y lo envía de vuelta. El trabajo se realiza de forma síncrona.

&lt;?php

# Se crea el objeto cliente

$gmclient= new GearmanClient();

# Se añade el servidor por defecto (localhost).

$gmclient-&gt;addServer();

echo "Sending job\n";

# Enviamos trabajo "reverse"

do
{
$result = $gmclient-&gt;do("reverse", "Hello!");

# Comprobación de varios paquetes de retorno y errores

switch($gmclient-&gt;returnCode())
  {
    case GEARMAN_WORK_DATA:
      echo "Data: $result\n";
      break;
    case GEARMAN_WORK_STATUS:
      list($numerator, $denominator)= $gmclient-&gt;doStatus();
      echo "Status: $numerator/$denominator complete\n";
break;
case GEARMAN_WORK_FAIL:
echo "Failed\n";
exit;
case GEARMAN_SUCCESS:
break;
default:
echo "RET: " . $gmclient-&gt;returnCode() . "\n";
      exit;
  }
}
while($gmclient-&gt;returnCode() != GEARMAN_SUCCESS);

?&gt;

&lt;?php

echo "Starting\n";

# Se crea el objeto del trabajador

$gmworker= new GearmanWorker();

# Se añade el servidor por defecto (localhost).

$gmworker-&gt;addServer();

# Registro de la función "reverse" en el servidor. Cambiar la función del

# trabajador a "reverse_fn_fast" para un trabajo más rápido sin mensajes de

# estado.

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Waiting for job...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
echo "Received job: " . $job-&gt;handle() . "\n";

$workload = $job-&gt;workload();
$workload_size = $job-&gt;workloadSize();

echo "Workload: $workload ($workload_size)\n";

# Este bucle de estado no es necesario, sólo es para mostrar cómo funciona

for ($x= 0; $x &lt; $workload_size; $x++)
  {
    echo "Sending status: " . ($x + 1) . "/$workload_size complete\n";
    $job-&gt;sendStatus($x, $workload_size);
sleep(1);
}

$result= strrev($workload);
echo "Result: $result\n";

# Retornamos lo que hay que enviar de vuelta al cliente

return $result;
}

# Una forma mucho más sencilla y que da menos información sería:

function reverse_fn_fast($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

    Resultado del ejemplo anterior es similar a:

% php reverse_worker.php
Starting
Waiting for job...
Received job: H:foo.local:36
Workload: Hello! (6)
Sending status: 1/6 complete
Sending status: 2/6 complete
Sending status: 3/6 complete
Sending status: 4/6 complete
Sending status: 5/6 complete
Sending status: 6/6 complete
Result: !olleH

% php reverse_client.php
Starting
Sending job
Status: 1/6 complete
Status: 2/6 complete
Status: 3/6 complete
Status: 4/6 complete
Status: 5/6 complete
Status: 6/6 complete
Success: !olleH

## Cliente y trabajador básicos en Gearman, trabajo en segundo plano

    **Ejemplo #1 Cliente y trabajador básicos en Gearman, trabajo en segundo plano**



     Este ejemplo muestra un trabajador y un cliente muy sencillos. El cliente
     envía un string al servidor de trabajos como trabajo en segundo plano, y
     el trabajador da la vuelta al string. Notar que como el trabajo se
     realiza de forma asíncrona, el cliente no espera a que se complete el
     trabajo y termina (y, por tanto, el cliente nunca recibe los resultados).

&lt;?php

# Creación del objeto cliente

$gmclient= new GearmanClient();

# Se añade el servidor por defecto (localhost)

$gmclient-&gt;addServer();

# Ejecutar el cliente "reverse" en segundo plano

$job_handle = $gmclient-&gt;doBackground("reverse", "this is a test");

if ($gmclient-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "bad return code\n";
exit;
}

echo "done!\n";

?&gt;

&lt;?php

echo "Starting\n";

# Creación del objeto trabajador

$gmworker= new GearmanWorker();

# Se añade el servidor por defecto (localhost).

$gmworker-&gt;addServer();

# Registro de la función "reverse" en el servidor. Cambiar la funcion del

# trabajador a "reverse_fn_fast" para usar un trabajador más rápido sin

# mostrar mensajes de estado

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Waiting for job...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
echo "Received job: " . $job-&gt;handle() . "\n";

$workload = $job-&gt;workload();
$workload_size = $job-&gt;workloadSize();

echo "Workload: $workload ($workload_size)\n";

# Este bucle de estado no es necesario, únicamente muestra cómo funciona

for ($x= 0; $x &lt; $workload_size; $x++)
  {
    echo "Sending status: " . ($x + 1) . "/$workload_size complete\n";
    $job-&gt;sendStatus($x, $workload_size);
sleep(1);
}

$result= strrev($workload);
echo "Result: $result\n";

# Retorna lo que se quiere enviar de vuelta al cliente

return $result;
}

# Una versión mucho más sencilla y que muestra menos información del proceso sería:

function reverse_fn_fast($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

    Resultado del ejemplo anterior es similar a:

% php reverse_worker.php
Starting
Waiting for job...
Received job: H:foo.local:41
Workload: this is a test (14)
1/14 complete
2/14 complete
3/14 complete
4/14 complete
5/14 complete
6/14 complete
7/14 complete
8/14 complete
9/14 complete
10/14 complete
11/14 complete
12/14 complete
13/14 complete
14/14 complete
Result: tset a si siht

% php reverse_client_bg.php
done!

## Cliente y trabajador básicos, enviando tareas

    **Ejemplo #1 Cliente y trabajador básicos, enviando tareas**



     En este ejemplo, se extiende el cliente básico que da la vuelta al texto
     para ejecutar dos tareas en paralelo. El trabajador "reverse" es idéntico
     excepto la parte del envío del datos durante el proceso.

&lt;?php

# Creación del cliente Gearman

$gmc= new GearmanClient();

# Añade el servidor por defecto (localhost)

$gmc-&gt;addServer();

# Registra alguna llamadas de retorno

$gmc-&gt;setCreatedCallback("reverse_created");
$gmc-&gt;setDataCallback("reverse_data");
$gmc-&gt;setStatusCallback("reverse_status");
$gmc-&gt;setCompleteCallback("reverse_complete");
$gmc-&gt;setFailCallback("reverse_fail");

# Asignación de datos arbitrarios para la aplicación

$data['foo'] = 'bar';

# Añade dos tareas

$task= $gmc-&gt;addTask("reverse", "foo", $data);
$task2= $gmc-&gt;addTaskLow("reverse", "bar", NULL);

# Ejecuta las tareas en paralelo (se asumen múltiples trabajadores)

if (! $gmc-&gt;runTasks())
{
echo "ERROR " . $gmc-&gt;error() . "\n";
exit;
}

echo "DONE\n";

function reverse_created($task)
{
echo "CREATED: " . $task-&gt;jobHandle() . "\n";
}

function reverse_status($task)
{
echo "STATUS: " . $task-&gt;jobHandle() . " - " . $task-&gt;taskNumerator() .
"/" . $task-&gt;taskDenominator() . "\n";
}

function reverse_complete($task)
{
echo "COMPLETE: " . $task-&gt;jobHandle() . ", " . $task-&gt;data() . "\n";
}

function reverse_fail($task)
{
echo "FAILED: " . $task-&gt;jobHandle() . "\n";
}

function reverse_data($task)
{
echo "DATA: " . $task-&gt;data() . "\n";
}

?&gt;

&lt;?php

echo "Starting\n";

# Creación del objeto trabajador

$gmworker= new GearmanWorker();

# Añade el servidor por defecto (localhost).

$gmworker-&gt;addServer();

# Registra la función "reverse" en el servidor. Cambiar la función a

# "reverse_fn_fast" para obtener un worker más rápido que no genera

# informacion del proceso

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Waiting for job...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
echo "Received job: " . $job-&gt;handle() . "\n";

$workload = $job-&gt;workload();
$workload_size = $job-&gt;workloadSize();

echo "Workload: $workload ($workload_size)\n";

# Este bucle de estado no es necesario, sólo es para mostrar cómo funciona

for ($x= 0; $x &lt; $workload_size; $x++)
  {
    echo "Sending status: " . ($x + 1) . "/$workload_size complete\n";
    $job-&gt;sendStatus($x+1, $workload_size);
    $job-&gt;sendData(substr($workload, $x, 1));
sleep(1);
}

$result= strrev($workload);
echo "Result: $result\n";

# Retornamos lo que queremos enviar de vuelta al cliente

return $result;
}

# Una versión mucho más sencilla y que muestra menos información del proceso sería:

function reverse_fn_fast($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

    Resultado del ejemplo anterior es similar a:

% php reverse_worker.php
Starting
Waiting for job...
Received job: H:foo.local:45
Workload: foo (3)
1/3 complete
2/3 complete
3/3 complete
Result: oof
Received job: H:foo.local:44
Workload: bar (3)
1/3 complete
2/3 complete
3/3 complete
Result: rab

% php reverse_client_task.php
CREATED: H:foo.local:44
CREATED: H:foo.local:45
STATUS: H:foo.local:45 - 1/3
DATA: f
STATUS: H:foo.local:45 - 2/3
DATA: o
STATUS: H:foo.local:45 - 3/3
DATA: o
COMPLETE: H:foo.local:45, oof
STATUS: H:foo.local:44 - 1/3
DATA: b
STATUS: H:foo.local:44 - 2/3
DATA: a
STATUS: H:foo.local:44 - 3/3
DATA: r
COMPLETE: H:foo.local:44, rab
DONE

# La clase GearmanClient

(PECL gearman &gt;= 0.5.0)

## Introducción

    Representa una clase para conectarse a un servidor de tareas Gearman y someterle peticiones
    para aplicar funciones sobre los datos proporcionados. La función aplicada debe formar parte de
    las referenciadas por un agente Gearman y los datos procesados permanecen opacos desde el punto
    de vista del servidor de tareas.

## Sinopsis de la Clase

     class **GearmanClient**
     {

    /* Métodos */

public [\_\_construct](#gearmanclient.construct)()

    public [addOptions](#gearmanclient.addoptions)([int](#language.types.integer) $option): [bool](#language.types.boolean)

public [addServer](#gearmanclient.addserver)([string](#language.types.string) $host = **[null](#constant.null)**, [int](#language.types.integer) $port = 0, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)
public [addServers](#gearmanclient.addservers)([string](#language.types.string) $servers = **[null](#constant.null)**, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)
public [addTask](#gearmanclient.addtask)(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [addTaskBackground](#gearmanclient.addtaskbackground)(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [addTaskHigh](#gearmanclient.addtaskhigh)(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [addTaskHighBackground](#gearmanclient.addtaskhighbackground)(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [addTaskLow](#gearmanclient.addtasklow)(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [addTaskLowBackground](#gearmanclient.addtasklowbackground)(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [addTaskStatus](#gearmanclient.addtaskstatus)([string](#language.types.string) $job_handle, [mixed](#language.types.mixed) $context = **[null](#constant.null)**): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)
public [clearCallbacks](#gearmanclient.clearcallbacks)(): [bool](#language.types.boolean)
public [context](#gearmanclient.context)(): [string](#language.types.string)
public [doBackground](#gearmanclient.dobackground)([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)
public [doHigh](#gearmanclient.dohigh)([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)
public [doHighBackground](#gearmanclient.dohighbackground)([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)
public [doJobHandle](#gearmanclient.dojobhandle)(): [string](#language.types.string)
public [doLow](#gearmanclient.dolow)([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)
public [doLowBackground](#gearmanclient.dolowbackground)([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)
public [doNormal](#gearmanclient.donormal)([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)
public [doStatus](#gearmanclient.dostatus)(): [array](#language.types.array)
public [error](#gearmanclient.error)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getErrno](#gearmanclient.geterrno)(): [int](#language.types.integer)
public [jobStatus](#gearmanclient.jobstatus)([string](#language.types.string) $job_handle): [array](#language.types.array)
public [ping](#gearmanclient.ping)([string](#language.types.string) $workload): [bool](#language.types.boolean)
public [removeOptions](#gearmanclient.removeoptions)([int](#language.types.integer) $option): [bool](#language.types.boolean)
public [returnCode](#gearmanclient.returncode)(): [int](#language.types.integer)
public [runTasks](#gearmanclient.runtasks)(): [bool](#language.types.boolean)
public [setCompleteCallback](#gearmanclient.setcompletecallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setContext](#gearmanclient.setcontext)([string](#language.types.string) $data): [bool](#language.types.boolean)
public [setCreatedCallback](#gearmanclient.setcreatedcallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setDataCallback](#gearmanclient.setdatacallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setExceptionCallback](#gearmanclient.setexceptioncallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setFailCallback](#gearmanclient.setfailcallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setOptions](#gearmanclient.setoptions)([int](#language.types.integer) $option): [bool](#language.types.boolean)
public [setStatusCallback](#gearmanclient.setstatuscallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setTimeout](#gearmanclient.settimeout)([int](#language.types.integer) $timeout): [bool](#language.types.boolean)
public [setWarningCallback](#gearmanclient.setwarningcallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [setWorkloadCallback](#gearmanclient.setworkloadcallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [timeout](#gearmanclient.timeout)(): [int](#language.types.integer)
public [wait](#gearmanclient.wait)(): [bool](#language.types.boolean)

}

# GearmanClient::addOptions

(PECL gearman &gt;= 0.6.0)

GearmanClient::addOptions — Añade opciones al cliente

### Descripción

public **GearmanClient::addOptions**([int](#language.types.integer) $option): [bool](#language.types.boolean)

Añade una o varias opciones a las ya existentes.

### Parámetros

     option


       Las opciones a añadir.
       Una de las constantes siguientes o la combinación de constantes utilizando
       el operador de manipulación de bits (|):
       **[GEARMAN_CLIENT_GENERATE_UNIQUE](#constant.gearman-client-generate-unique)**,
       **[GEARMAN_CLIENT_NON_BLOCKING](#constant.gearman-client-non-blocking)**,
       **[GEARMAN_CLIENT_UNBUFFERED_RESULT](#constant.gearman-client-unbuffered-result)** o
       **[GEARMAN_CLIENT_FREE_TASKS](#constant.gearman-client-free-tasks)**.





### Valores devueltos

Devuelve siempre **[true](#constant.true)**.

# GearmanClient::addServer

(PECL gearman &gt;= 0.5.0)

GearmanClient::addServer — Añade un servidor de tareas al cliente

### Descripción

public **GearmanClient::addServer**([string](#language.types.string) $host = **[null](#constant.null)**, [int](#language.types.integer) $port = 0, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)

Añade un servidor de tareas a una lista de servidores que pueden ser utilizados para realizar una tarea.
No se realiza ninguna entrada/salida en un socket aquí; el servidor es simplemente añadido a la lista.

### Parámetros

     host


       El nombre de host del servidor de trabajos.






     port


       El puerto del servidor de trabajos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Añadir dos servidores**

&lt;?php

# Crea nuestro objeto cliente.

$gmclient= new GearmanClient();

# Añade dos servidores de tareas, el primero escuchando en el puerto por omisión, 4730

$gmclient-&gt;addServer("10.0.0.1");
$gmclient-&gt;addServer("10.0.0.2", 7003);

?&gt;

### Ver también

    - [GearmanClient::addServers()](#gearmanclient.addservers) - Añade una lista de servidores de tareas al cliente

# GearmanClient::addServers

(PECL gearman &gt;= 0.5.0)

GearmanClient::addServers — Añade una lista de servidores de tareas al cliente

### Descripción

public **GearmanClient::addServers**([string](#language.types.string) $servers = **[null](#constant.null)**, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)

Añade una lista de servidores de tareas que pueden ser utilizados para realizar una tarea.
No se realiza ninguna entrada/salida en un socket aquí; los servidores son simplemente añadidos a la lista completa de servidores.

### Parámetros

     servers


       Una lista de servidores, separados por comas, cada uno especificado según el formato 'host:port'.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Añadir dos servidores**

&lt;?php

# Crea nuestro objeto cliente.

$gmclient= new GearmanClient();

# Añade varios servidores de tareas, el primero escuchando en el puerto por defecto, 4730

$gmclient-&gt;addServers("10.0.0.1,10.0.0.2:7003");

?&gt;

### Ver también

    - [GearmanClient::addServer()](#gearmanclient.addserver) - Añade un servidor de tareas al cliente

# GearmanClient::addTask

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTask — Añade una tarea para ser ejecutada en paralelo

### Descripción

public **GearmanClient::addTask**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Añade una tarea para ser ejecutada en paralelo con otras tareas. Esta
método debe ser llamado para todas las tareas a ejecutar en paralelo, y
posteriormente, debe llamarse al método [GearmanClient::runTasks()](#gearmanclient.runtasks) para ejecutar las
tareas. Tenga en cuenta que es necesario contar con suficientes agentes disponibles para ejecutar
en paralelo todas las tareas.

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     context


       Contexto de la aplicación a asociar con una tarea






     unique_key


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)**
si la tarea no pudo ser añadida.

### Ejemplos

    **Ejemplo #1 Añadir 2 tareas**

&lt;?php

# Crea un cliente gearman

$gmclient= new GearmanClient();

# Añade el servidor de trabajos por defecto

$gmclient-&gt;addServer();

# Define una función a llamar cuando el trabajo está completo

$gmclient-&gt;setCompleteCallback("complete");

# Añade una tarea que ejecuta la función "reverse" sobre la cadena "Hello World!"

$gmclient-&gt;addTask("reverse", "Hello World!", null, "1");

# Añade otra tarea que ejecuta la función "reverse" sobre la cadena "!dlroW olleH"

$gmclient-&gt;addTask("reverse", "!dlroW olleH", null, "2");

# Ejecuta las tareas

$gmclient-&gt;runTasks();

function complete($task)
{
print "Completado : " . $task-&gt;unique() . ", " . $task-&gt;data() . "\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Completado : 2, Hello World!
Completado : 1, !dlroW olleH

    **Ejemplo #2 Añadir 2 tareas pasando el contexto de la aplicación**

&lt;?php

$client = new GearmanClient();
$client-&gt;addServer();

# Define una función a llamar cuando el trabajo está completo

$client-&gt;setCompleteCallback("reverse_complete");

# Añade algunas tareas que contienen un marcador en el lugar donde debe colocarse el resultado

$results = array();
$client-&gt;addTask("reverse", "Hello World!", $results, "t1");
$client-&gt;addTask("reverse", "!dlroW olleH", $results, "t2");

$client-&gt;runTasks();

# El resultado debe estar ahora contenido en las funciones de devolución de llamada

foreach ($results as $id =&gt; $result)
echo $id . ": " . $result['handle'] . ", " . $result['data'] . "\n";

function reverse_complete($task, $results)
{
   $results[$task-&gt;unique()] = array("handle"=&gt;$task-&gt;jobHandle(), "data"=&gt;$task-&gt;data());
}

?&gt;

    Resultado del ejemplo anterior es similar a:

t2: H.foo:21, Hello World!
t1: H:foo:22, !dlroW olleH

### Ver también

    - [GearmanClient::addTaskHigh()](#gearmanclient.addtaskhigh) - Añade una tarea de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLow()](#gearmanclient.addtasklow) - Añade una tarea de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskBackground()](#gearmanclient.addtaskbackground) - Añade una tarea de fondo para su ejecución en paralelo

    - [GearmanClient::addTaskHighBackground()](#gearmanclient.addtaskhighbackground) - Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLowBackground()](#gearmanclient.addtasklowbackground) - Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::runTasks()](#gearmanclient.runtasks) - Ejecuta una lista de tareas en paralelo

# GearmanClient::addTaskBackground

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTaskBackground — Añade una tarea de fondo para su ejecución en paralelo

### Descripción

public **GearmanClient::addTaskBackground**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Añade una tarea de fondo para su ejecución en paralelo con otras tareas.
Llámese a este método para todas las tareas que deban ejecutarse en paralelo, y
luego, llámese al método [GearmanClient::runTasks()](#gearmanclient.runtasks) para realizar las tareas.

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     context


       Contexto de la aplicación a asociar con una tarea






     unique_key


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** si la tarea
no pudo ser añadida.

### Ejemplos

    **Ejemplo #1 2 tareas, una de ellas en segundo plano**



     Este ejemplo muestra la diferencia entre la ejecución en segundo plano
     y una ejecución normal. El cliente añade 2 tareas que deben ejecutar
     la misma función, pero una ha sido añadida con el método
     **addTaskBackground()**. Se define una función de retorno
     para monitorear el progreso del trabajo. Un agente simple con un retraso
     artificial reporta el progreso y el cliente lo procesa mediante la función de retorno.
     Se ejecutan 2 agentes en este ejemplo. Obsérvese que la tarea en segundo plano
     no es mostrada por el cliente.

&lt;?php

# El script del cliente

# Crea un cliente Gearman

$gmc= new GearmanClient();

# Añade un servidor de trabajos por omisión

$gmc-&gt;addServer();

# Define 2 funciones de retorno para monitorear el progreso

$gmc-&gt;setCompleteCallback("reverse_complete");
$gmc-&gt;setStatusCallback("reverse_status");

# Añade una tarea para la función "reverse"

$task= $gmc-&gt;addTask("reverse", "Hello World!", null, "1");

# Añade otra tarea, pero esta vez, en segundo plano

$task= $gmc-&gt;addTaskBackground("reverse", "!dlroW olleH", null, "2");

if (! $gmc-&gt;runTasks())
{
echo "ERROR " . $gmc-&gt;error() . "\n";
exit;
}

echo "HECHO\n";

function reverse_status($task)
{
echo "ESTADO : " . $task-&gt;unique() . ", " . $task-&gt;jobHandle() . " - " . $task-&gt;taskNumerator() .
"/" . $task-&gt;taskDenominator() . "\n";
}

function reverse_complete($task)
{
echo "TERMINADO : " . $task-&gt;unique() . ", " . $task-&gt;data() . "\n";
}

?&gt;

&lt;?php

# El script del agente

echo "Inicio\n";

# Crea un agente.

$gmworker= new GearmanWorker();

# Añade un servidor por omisión (localhost).

$gmworker-&gt;addServer();

# Registra la función "reverse" en este servidor.

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Esperando trabajo...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
echo "Trabajo recibido : " . $job-&gt;handle() . "\n";

$workload = $job-&gt;workload();
$workload_size = $job-&gt;workloadSize();

echo "Carga del agente : $workload ($workload_size)\n";

# Este ciclo no es necesario, pero ayuda a entender el funcionamiento

for ($x= 0; $x &lt; $workload_size; $x++)
  {
    echo "Enviando estado : " . ($x + 1) . "/$workload_size complete\n";
    $job-&gt;sendStatus($x+1, $workload_size);
    $job-&gt;sendData(substr($workload, $x, 1));
sleep(1);
}

$result= strrev($workload);
echo "Resultado : $result\n";

# Se devuelve al cliente lo que se desee.

return $result;
}

?&gt;

     El agente muestra, para los 2 trabajos :

Trabajo recibido : H:foo.local:65
Carga del agente : !dlroW olleH (12)
1/12 complete
Trabajo recibido : H:foo.local:66
Carga del agente : Hello World! (12)
Enviando estado : 1/12 complete
Enviando estado : 2/12 complete
Enviando estado : 2/12 complete
Enviando estado : 3/12 complete
Enviando estado : 3/12 complete
Enviando estado : 4/12 complete
Enviando estado : 4/12 complete
Enviando estado : 5/12 complete
Enviando estado : 5/12 complete
Enviando estado : 6/12 complete
Enviando estado : 6/12 complete
Enviando estado : 7/12 complete
Enviando estado : 7/12 complete
Enviando estado : 8/12 complete
Enviando estado : 8/12 complete
Enviando estado : 9/12 complete
Enviando estado : 9/12 complete
Enviando estado : 10/12 complete
Enviando estado : 10/12 complete
Enviando estado : 11/12 complete
Enviando estado : 11/12 complete
Enviando estado : 12/12 complete
Enviando estado : 12/12 complete
Resultado : !dlroW olleH
Resultado : Hello World!

     Salida del cliente :

ESTADO : 1, H:foo.local:66 - 1/12
ESTADO : 1, H:foo.local:66 - 2/12
ESTADO : 1, H:foo.local:66 - 3/12
ESTADO : 1, H:foo.local:66 - 4/12
ESTADO : 1, H:foo.local:66 - 5/12
ESTADO : 1, H:foo.local:66 - 6/12
ESTADO : 1, H:foo.local:66 - 7/12
ESTADO : 1, H:foo.local:66 - 8/12
ESTADO : 1, H:foo.local:66 - 9/12
ESTADO : 1, H:foo.local:66 - 10/12
ESTADO : 1, H:foo.local:66 - 11/12
ESTADO : 1, H:foo.local:66 - 12/12
TERMINADO : 1, !dlroW olleH
HECHO

### Ver también

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

    - [GearmanClient::addTaskHigh()](#gearmanclient.addtaskhigh) - Añade una tarea de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLow()](#gearmanclient.addtasklow) - Añade una tarea de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskHighBackground()](#gearmanclient.addtaskhighbackground) - Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLowBackground()](#gearmanclient.addtasklowbackground) - Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::runTasks()](#gearmanclient.runtasks) - Ejecuta una lista de tareas en paralelo

# GearmanClient::addTaskHigh

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTaskHigh — Añade una tarea de alta prioridad para ser ejecutada en paralelo

### Descripción

public **GearmanClient::addTaskHigh**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Añade una tarea de alta prioridad para ser ejecutada en paralelo con otras tareas.
Esta método debe ser llamado para que todas las tareas se ejecuten simultáneamente, luego
[GearmanClient::runTasks()](#gearmanclient.runtasks) debe ser llamado para realizar el trabajo. Las tareas con alta prioridad
serán seleccionadas de la cola antes que las de prioridad más baja.

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     context


       Contexto de la aplicación a asociar con una tarea






     unique_key


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** si la tarea no puede ser añadida.

### Ejemplos

    **Ejemplo #1 Una tarea de alta prioridad junto con dos tareas normales**



     Se añade una tarea de alta prioridad junto con otras dos tareas. Un solo agente
     está disponible, de forma que las tareas se ejecutan una a una, con la de alta prioridad
     en primer lugar.

&lt;?php

# crea el cliente Gearman

$gmc= new GearmanClient();

# añade el servidor por defecto

$gmc-&gt;addServer();

# establece el retorno cuando la tarea está completada

$gmc-&gt;setCompleteCallback("inverse_complete");

# añade tareas, una de ellas con alta prioridad

$task= $gmc-&gt;addTask("inverse", "Bonjour le monde!", null, "1");
$task= $gmc-&gt;addTaskHigh("inverse", "!ednom el ruojnoB", null, "2");
$task= $gmc-&gt;addTask("inverse", "Bonjour le monde!", null, "3");

if (! $gmc-&gt;runTasks())
{
echo "ERROR " . $gmc-&gt;error() . "\n";
exit;
}
echo "Hecho\n";

function inverse_complete($task)
{
echo "Completada : " . $task-&gt;unique() . ", " . $task-&gt;data() . "\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Completada : 2, Bonjour le monde!
Completada : 3, !ednom el ruojnoB
Completada : 1, !ednom el ruojnoB
Hecho

### Ver también

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

    - [GearmanClient::addTaskLow()](#gearmanclient.addtasklow) - Añade una tarea de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskBackground()](#gearmanclient.addtaskbackground) - Añade una tarea de fondo para su ejecución en paralelo

    - [GearmanClient::addTaskHighBackground()](#gearmanclient.addtaskhighbackground) - Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLowBackground()](#gearmanclient.addtasklowbackground) - Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::runTasks()](#gearmanclient.runtasks) - Ejecuta una lista de tareas en paralelo

# GearmanClient::addTaskHighBackground

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTaskHighBackground — Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo

### Descripción

public **GearmanClient::addTaskHighBackground**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo con otras tareas.
Esta método debe ser llamado para que todas las tareas sean ejecutadas simultáneamente, luego
[GearmanClient::runTasks()](#gearmanclient.runtasks) debe ser llamado para realizar el trabajo. Las tareas con alta prioridad
serán seleccionadas de la cola antes que las de prioridad más baja.

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     context


       Contexto de la aplicación a asociar con una tarea






     unique_key


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** si la tarea no puede ser añadida.

### Ver también

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

    - [GearmanClient::addTaskHigh()](#gearmanclient.addtaskhigh) - Añade una tarea de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLow()](#gearmanclient.addtasklow) - Añade una tarea de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskBackground()](#gearmanclient.addtaskbackground) - Añade una tarea de fondo para su ejecución en paralelo

    - [GearmanClient::addTaskLowBackground()](#gearmanclient.addtasklowbackground) - Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::runTasks()](#gearmanclient.runtasks) - Ejecuta una lista de tareas en paralelo

# GearmanClient::addTaskLow

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTaskLow — Añade una tarea de baja prioridad para ser ejecutada en paralelo

### Descripción

public **GearmanClient::addTaskLow**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Añade una tarea de baja prioridad para ser ejecutada en paralelo con otras tareas.
Esta método debe ser llamado para que todas las tareas se ejecuten simultáneamente, luego
debe llamarse a [GearmanClient::runTasks()](#gearmanclient.runtasks) para realizar el trabajo. Las tareas con baja prioridad
serán seleccionadas de la cola después de las de mayor prioridad.

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     context


       Contexto de la aplicación a asociar con una tarea






     unique_key


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** si la tarea no puede ser añadida.

### Ejemplos

    **Ejemplo #1 Una tarea de baja prioridad junto con dos tareas normales**

Se añade una tarea de baja prioridad junto con otras dos tareas. Solo hay un agente
disponible, por lo que las tareas se ejecutan una tras otra, con la de baja prioridad
al final.

&lt;?php

# crea el cliente Gearman

$gmc= new GearmanClient();

# añade el servidor por defecto

$gmc-&gt;addServer();

# establece la devolución de llamada cuando la tarea está completada

$gmc-&gt;setCompleteCallback("inverse_complete");

# añade tareas, una de ellas con baja prioridad

$task= $gmc-&gt;addTask("inverse", "¡Hola mundo!", null, "1");
$task= $gmc-&gt;addTaskLow("inverse", "!ednom el ruojnoB", null, "2");
$task= $gmc-&gt;addTask("inverse", "¡Hola mundo!", null, "3");

if (! $gmc-&gt;runTasks())
{
echo "ERROR " . $gmc-&gt;error() . "\n";
exit;
}
echo "Hecho\n";

function inverse_complete($task)
{
echo "Completada : " . $task-&gt;unique() . ", " . $task-&gt;data() . "\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Completada : 3, !ednom el ruojnoB
Completada : 1, !ednom el ruojnoB
Completada : 2, ¡Hola mundo!
Hecho

### Ver también

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

    - [GearmanClient::addTaskHigh()](#gearmanclient.addtaskhigh) - Añade una tarea de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskBackground()](#gearmanclient.addtaskbackground) - Añade una tarea de fondo para su ejecución en paralelo

    - [GearmanClient::addTaskHighBackground()](#gearmanclient.addtaskhighbackground) - Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLowBackground()](#gearmanclient.addtasklowbackground) - Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::runTasks()](#gearmanclient.runtasks) - Ejecuta una lista de tareas en paralelo

# GearmanClient::addTaskLowBackground

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTaskLowBackground — Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo

### Descripción

public **GearmanClient::addTaskLowBackground**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $workload,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $unique_key = **[null](#constant.null)**
): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo con otras tareas.
Esta método debe ser llamado para que todas las tareas sean ejecutadas simultáneamente, luego
[GearmanClient::runTasks()](#gearmanclient.runtasks) debe ser llamado para realizar el trabajo. Las tareas con baja prioridad
serán seleccionadas de la cola después de las de mayor prioridad.

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     context


       Contexto de la aplicación a asociar con una tarea






     unique_key


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** si la tarea no puede ser añadida.

### Ver también

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

    - [GearmanClient::addTaskHigh()](#gearmanclient.addtaskhigh) - Añade una tarea de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskLow()](#gearmanclient.addtasklow) - Añade una tarea de baja prioridad para ser ejecutada en paralelo

    - [GearmanClient::addTaskBackground()](#gearmanclient.addtaskbackground) - Añade una tarea de fondo para su ejecución en paralelo

    - [GearmanClient::addTaskHighBackground()](#gearmanclient.addtaskhighbackground) - Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo

    - [GearmanClient::runTasks()](#gearmanclient.runtasks) - Ejecuta una lista de tareas en paralelo

# GearmanClient::addTaskStatus

(PECL gearman &gt;= 0.5.0)

GearmanClient::addTaskStatus — Añade una tarea para obtener el estado

### Descripción

public **GearmanClient::addTaskStatus**([string](#language.types.string) $job_handle, [mixed](#language.types.mixed) $context = **[null](#constant.null)**): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Utilizado para solicitar el estado al servidor Gearman, que llamará al retorno de estado
especificado (mediante [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback)).

### Parámetros

     job_handle


       El descriptor para la tarea cuyo estado se desea obtener






     context


       Los datos a pasar al retorno de estado, generalmente una referencia a un array o a un objeto





### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Supervisar la finalización de múltiples tareas en segundo plano**



     Un retraso artificial se introduce en el agente de este ejemplo para simular un
     proceso largo. Solo se lanza un agente en este ejemplo.

&lt;?php

/_ crea nuestro objeto _/
$gmclient= new GearmanClient();

/_ añade el servidor por omisión _/
$gmclient-&gt;addServer();

/_ lanza una tarea en segundo plano y guarda los descriptores _/
$handles = array();
$handles[0] = $gmclient-&gt;doBackground("inverse", "¡Hola mundo!");
$handles[1] = $gmclient-&gt;doBackground("inverse", "!ednom el ruojnoB");

$gmclient-&gt;setStatusCallback("inverse_estado");

/_ Consulta al servidor para ver cuándo las tareas en segundo plano terminan; _/
/_ un método mejor consiste en llamar a los retornos de evento _/
do
{
/_ Utiliza la variable de contexto para saber cuántas tareas se han completado _/
$done = 0;
   $gmclient-&gt;addTaskStatus($handles[0], $done);
   $gmclient-&gt;addTaskStatus($handles[1], $done);
   $gmclient-&gt;runTasks();
   echo "Completado: $done\n";
   sleep(1);
}
while ($done != 2);

function inverse_estado($task, $done)
{
   if (!$task-&gt;isKnown())
$done++;
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 0
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 1
Completado: 2

### Ver también

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

# GearmanClient::clearCallbacks

(PECL gearman &gt;= 0.5.0)

GearmanClient::clearCallbacks — Elimina todas las funciones de retrollamada de las tareas

### Descripción

public **GearmanClient::clearCallbacks**(): [bool](#language.types.boolean)

Elimina todas las funciones de retrollamada de las tareas previamente definidas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Siempre devuelve **[true](#constant.true)**.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::clone

(PECL gearman &gt;= 0.5.0)

GearmanClient::clone — Crea una copia de un objeto [GearmanClient](#class.gearmanclient)

### Descripción

public **GearmanClient::clone**(): [GearmanClient](#class.gearmanclient)

Crea una copia de un objeto [GearmanClient](#class.gearmanclient).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [GearmanClient](#class.gearmanclient) en caso de éxito, **[false](#constant.false)** si hay fallo.

# GearmanClient::\_\_construct

(PECL gearman &gt;= 0.5.0)

GearmanClient::\_\_construct — Crea una instancia GearmanClient

### Descripción

public **GearmanClient::\_\_construct**()

Crea una instancia [GearmanClient](#class.gearmanclient) que representa un cliente
que se conecta a un servidor de tareas y registra tareas a ejecutar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [GearmanClient](#class.gearmanclient).

### Ver también

    - [GearmanClient::clone()](#gearmanclient.clone) - Crea una copia de un objeto GearmanClient

# GearmanClient::context

(PECL gearman &gt;= 0.6.0)

GearmanClient::context — Recupera el contexto de la aplicación

### Descripción

public **GearmanClient::context**(): [string](#language.types.string)

Recupera el contexto de la aplicación previamente definido
con el método [GearmanClient::setContext()](#gearmanclient.setcontext).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los datos de contexto idénticos a los definidos
con la función [GearmanClient::setContext()](#gearmanclient.setcontext)

### Ver también

    - [GearmanClient::setContext()](#gearmanclient.setcontext) - Define el contexto de una aplicación

# GearmanClient::data

(PECL gearman &lt;= 0.5.0)

GearmanClient::data — Retorna los datos de aplicación (obsoleto)

### Descripción

public **GearmanClient::data**(): [string](#language.types.string)

Obtiene los datos de aplicación fijados anteriormente con
[GearmanClient::setData()](#gearmanclient.setdata).

**Nota**:

    Este método fue reemplazado por
    [GearmanClient::setContext()](#gearmanclient.setcontext) en la versión 0.6.0 de la
    extensión Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El mismo string de datos que fue establecido con
[GearmanClient::setData()](#gearmanclient.setdata)

### Ver también

    - [GearmanClient::setData()](#gearmanclient.setdata) - Establece los datos de aplicación (obsoleto)

# GearmanClient::do

(PECL gearman &gt;= 0.5.0)

GearmanClient::do — Ejecuta una sola tarea y retorna el resultado [obsoleto]

### Descripción

public **GearmanClient::do**([string](#language.types.string) $function_name, [string](#language.types.string) $workload, [string](#language.types.string) $unique = ?): [string](#language.types.string)

El método **GearmanClient::do()** es obsoleto desde
pecl/gearman 1.0.0. Use [GearmanClient::doNormal()](#gearmanclient.donormal).

### Parámetros

     function_name


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Un string representando el resultado de la tarea ejecutada.

### Ejemplos

    **Ejemplo #1 Envío de un trabajo con retorno inmediato**

&lt;?php

# Código del cliente

echo "Starting\n";

# Creación del objeto cliente

$gmclient= new GearmanClient();

# Adición del servidor por defecto (localhost).

$gmclient-&gt;addServer();

echo "Sending job\n";

$result = $gmclient-&gt;doNormal("reverse", "Hello!");

echo "Success: $result\n";

?&gt;

&lt;?php

echo "Starting\n";

# Creación del objeto trabajador

$gmworker= new GearmanWorker();

# Adición del servidor por defecto (localhost).

$gmworker-&gt;addServer();

# Registra la función "reverse" en el servidor. Cambiar la función del trabajador

# a "reverse_fn_fast" para usar un trabajar más rápido que no genera salida.

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Waiting for job...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Starting
Sending job
Success: !olleH

    **Ejemplo #2 Envío de un trabajo y obtención del estado incremental**



     Se envía un trabajo y el script comprueba constantemente mediante un bucle
     la información de estado. El trabajador tiene un retardo artificial que
     provoca un trabajo de larga duración y envía el estado y datos según se van
     procesando.
     Cada llamada a **GearmanClient::do()** produce información
     de estado del trabajo en ejecución.

&lt;?php

# Código del cliente

# Creamos el objeto cliente

$gmclient= new GearmanClient();

# Añadimos el servidor por defecto (localhost).

$gmclient-&gt;addServer();

echo "Sending job\n";

# Enviamos trabajo "reverse"

do
{
$result = $gmclient-&gt;doNormal("reverse", "Hello!");

# Comprobamos llegada de posibles paquetes y errores

switch($gmclient-&gt;returnCode())
  {
    case GEARMAN_WORK_DATA:
      echo "Data: $result\n";
      break;
    case GEARMAN_WORK_STATUS:
      list($numerator, $denominator)= $gmclient-&gt;doStatus();
      echo "Status: $numerator/$denominator complete\n";
break;
case GEARMAN_WORK_FAIL:
echo "Failed\n";
exit;
case GEARMAN_SUCCESS:
break;
default:
echo "RET: " . $gmclient-&gt;returnCode() . "\n";
      echo "Error: " . $gmclient-&gt;error() . "\n";
      echo "Errno: " . $gmclient-&gt;getErrno() . "\n";
      exit;
  }
}
while($gmclient-&gt;returnCode() != GEARMAN_SUCCESS);

echo "Success: $result\n";

?&gt;

&lt;?php

# Código del trabajador

echo "Starting\n";

# Creamos el objeto trabajador

$gmworker= new GearmanWorker();

# Añadimos servidor por defecto (localhost).

$gmworker-&gt;addServer();

# Registramos la función "reverse" en el servidor

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Waiting for job...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
echo "Received job: " . $job-&gt;handle() . "\n";

$workload = $job-&gt;workload();
$workload_size = $job-&gt;workloadSize();

echo "Workload: $workload ($workload_size)\n";

# Este bucle para comprobar el estado no es necesario, tan sólo muestra como funciona

for ($x= 0; $x &lt; $workload_size; $x++)
  {
    echo "Sending status: " + $x + 1 . "/$workload_size complete\n";
$job-&gt;sendStatus($x+1, $workload_size);
    $job-&gt;sendData(substr($workload, $x, 1));
sleep(1);
}

$result= strrev($workload);
echo "Result: $result\n";

# Retornamos lo que queremos enviar al cliente

return $result;
}

?&gt;

    Resultado del ejemplo anterior es similar a:



     Worker output:

Starting
Waiting for job...
Received job: H:foo.local:106
Workload: Hello! (6)
1/6 complete
2/6 complete
3/6 complete
4/6 complete
5/6 complete
6/6 complete
Result: !olleH

     Client output:

Starting
Sending job
Status: 1/6 complete
Data: H
Status: 2/6 complete
Data: e
Status: 3/6 complete
Data: l
Status: 4/6 complete
Data: l
Status: 5/6 complete
Data: o
Status: 6/6 complete
Data: !
Success: !olleH

### Ver también

    - [GearmanClient::doHigh()](#gearmanclient.dohigh) - Ejecuta una sola tarea con prioridad alta

    - [GearmanClient::doLow()](#gearmanclient.dolow) - Ejecuta una sola tarea con prioridad baja

    - [GearmanClient::doBackground()](#gearmanclient.dobackground) - Ejecuta una tarea en segundo plano

    - [GearmanClient::doHighBackground()](#gearmanclient.dohighbackground) - Ejecuta una tarea con prioridad alta en segundo plano

    - [GearmanClient::doLowBackground()](#gearmanclient.dolowbackground) - Ejecuta una tarea en prioridad baja en segundo plano

# GearmanClient::doBackground

(PECL gearman &gt;= 0.5.0)

GearmanClient::doBackground — Ejecuta una tarea en segundo plano

### Descripción

public **GearmanClient::doBackground**([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)

Ejecuta una tarea en segundo plano, devuelve el gestor de trabajos
que podrá ser utilizado para recuperar el estado de la tarea en curso.

### Parámetros

     function


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

El gestor de trabajos para la tarea enviada.

### Ejemplos

    **Ejemplo #1 Envía y supervisa un trabajo en segundo plano**



     El agente de este ejemplo tiene un retraso artificial introducido para simular
     un trabajo cuya ejecución tarda mucho tiempo. El script del
     cliente verifica periódicamente el estado del trabajo en curso.

&lt;?php

/_ Crea un cliente _/
$gmclient= new GearmanClient();

/_ Añade un servidor por omisión _/
$gmclient-&gt;addServer();

/_ Ejecuta el cliente _/
$job_handle = $gmclient-&gt;doBackground("reverse", "this is a test");

if ($gmclient-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "Código de retorno erróneo\n";
exit;
}

$done = false;
do
{
   sleep(3);
   $stat = $gmclient-&gt;jobStatus($job_handle);
if (!$stat[0]) // la tarea es conocida por lo que no está terminada
      $done = true;
   echo "Ejecución : " . ($stat[1] ? "true" : "false") . ", numerador : " . $stat[2] . ", denominador : " . $stat[3] . "\n";
}
while(!$done);

echo "hecho !\n";

?&gt;

    Resultado del ejemplo anterior es similar a:

Ejecución : true, numerador : 3, denominador : 14
Ejecución : true, numerador : 6, denominador : 14
Ejecución : true, numerador : 9, denominador : 14
Ejecución : true, numerador : 12, denominador : 14
Ejecución : false, numerador : 0, denominador : 0
hecho !

### Ver también

    - [GearmanClient::doNormal()](#gearmanclient.donormal) - Ejecuta una tarea y devuelve el resultado

    - [GearmanClient::doHigh()](#gearmanclient.dohigh) - Ejecuta una sola tarea con prioridad alta

    - [GearmanClient::doLow()](#gearmanclient.dolow) - Ejecuta una sola tarea con prioridad baja

    - [GearmanClient::doHighBackground()](#gearmanclient.dohighbackground) - Ejecuta una tarea con prioridad alta en segundo plano

    - [GearmanClient::doLowBackground()](#gearmanclient.dolowbackground) - Ejecuta una tarea en prioridad baja en segundo plano

# GearmanClient::doHigh

(PECL gearman &gt;= 0.5.0)

GearmanClient::doHigh — Ejecuta una sola tarea con prioridad alta

### Descripción

public **GearmanClient::doHigh**([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)

Ejecuta una sola tarea con prioridad alta y devuelve una representación
del resultado en forma de [string](#language.types.string). Corresponde a las funciones
[GearmanClient](#class.gearmanclient) y [GearmanWorker](#class.gearmanworker) acordar
el formato del resultado. Las tareas con prioridad alta se ejecutarán antes que aquellas
con prioridad normal o baja en la cola de espera.

### Parámetros

     function


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

El resultado de la tarea en forma de [string](#language.types.string).

### Ver también

    - [GearmanClient::doNormal()](#gearmanclient.donormal) - Ejecuta una tarea y devuelve el resultado

    - [GearmanClient::doLow()](#gearmanclient.dolow) - Ejecuta una sola tarea con prioridad baja

    - [GearmanClient::doBackground()](#gearmanclient.dobackground) - Ejecuta una tarea en segundo plano

    - [GearmanClient::doHighBackground()](#gearmanclient.dohighbackground) - Ejecuta una tarea con prioridad alta en segundo plano

    - [GearmanClient::doLowBackground()](#gearmanclient.dolowbackground) - Ejecuta una tarea en prioridad baja en segundo plano

# GearmanClient::doHighBackground

(PECL gearman &gt;= 0.5.0)

GearmanClient::doHighBackground — Ejecuta una tarea con prioridad alta en segundo plano

### Descripción

public **GearmanClient::doHighBackground**([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)

Ejecuta una tarea con prioridad alta en segundo plano, y devuelve
un manejador de trabajo que puede ser utilizado para recuperar
el estado de la tarea. Las tareas con prioridad alta serán ejecutadas
antes que las normales y las bajas de la cola.

### Parámetros

     function


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

El manejador de trabajo de la tarea añadida.

### Ver también

    - [GearmanClient::doNormal()](#gearmanclient.donormal) - Ejecuta una tarea y devuelve el resultado

    - [GearmanClient::doHigh()](#gearmanclient.dohigh) - Ejecuta una sola tarea con prioridad alta

    - [GearmanClient::doLow()](#gearmanclient.dolow) - Ejecuta una sola tarea con prioridad baja

    - [GearmanClient::doBackground()](#gearmanclient.dobackground) - Ejecuta una tarea en segundo plano

    - [GearmanClient::doLowBackground()](#gearmanclient.dolowbackground) - Ejecuta una tarea en prioridad baja en segundo plano

# GearmanClient::doJobHandle

(PECL gearman &gt;= 0.5.0)

GearmanClient::doJobHandle — Obtiene el manejador de trabajos para la tarea en curso

### Descripción

public **GearmanClient::doJobHandle**(): [string](#language.types.string)

Obtiene el manejador de trabajos para la tarea en curso. Puede ser
utilizado durante múltiples llamadas al método [GearmanClient::doNormal()](#gearmanclient.donormal).
El manejador de trabajos puede entonces ser utilizado para recuperar las
informaciones sobre la tarea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El manejador de trabajos para la tarea en curso.

### Ver también

    - [GearmanClient::jobStatus()](#gearmanclient.jobstatus) - Recupera el estado de un trabajo en segundo plano

# GearmanClient::doLow

(PECL gearman &gt;= 0.5.0)

GearmanClient::doLow — Ejecuta una sola tarea con prioridad baja

### Descripción

public **GearmanClient::doLow**([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)

Ejecuta una sola tarea con prioridad baja y devuelve una representación en forma de [string](#language.types.string) del resultado. Es responsabilidad de los métodos
[GearmanClient](#class.gearmanclient) y [GearmanWorker](#class.gearmanworker) validar
el formato del resultado. Las tareas con prioridad normal o alta serán tratadas con preferencia frente a las tareas con prioridad baja en la cola de espera.

### Parámetros

     function


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Una representación en forma de [string](#language.types.string) del resultado de la tarea en curso.

### Ver también

    - [GearmanClient::doNormal()](#gearmanclient.donormal) - Ejecuta una tarea y devuelve el resultado

    - [GearmanClient::doHigh()](#gearmanclient.dohigh) - Ejecuta una sola tarea con prioridad alta

    - [GearmanClient::doBackground()](#gearmanclient.dobackground) - Ejecuta una tarea en segundo plano

    - [GearmanClient::doHighBackground()](#gearmanclient.dohighbackground) - Ejecuta una tarea con prioridad alta en segundo plano

    - [GearmanClient::doLowBackground()](#gearmanclient.dolowbackground) - Ejecuta una tarea en prioridad baja en segundo plano

# GearmanClient::doLowBackground

(PECL gearman &gt;= 0.5.0)

GearmanClient::doLowBackground — Ejecuta una tarea en prioridad baja en segundo plano

### Descripción

public **GearmanClient::doLowBackground**([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)

Ejecuta una tarea en prioridad baja en segundo plano, luego, devuelve
el gestor de trabajos que podrá ser utilizado para recuperar el estado
de la tarea en curso. Las tareas con prioridad normal y alta tendrán
prioridad sobre aquellas con prioridad baja en la cola.

### Parámetros

     function


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

El gestor de trabajos de la tarea enviada.

### Ver también

    - [GearmanClient::doNormal()](#gearmanclient.donormal) - Ejecuta una tarea y devuelve el resultado

    - [GearmanClient::doHigh()](#gearmanclient.dohigh) - Ejecuta una sola tarea con prioridad alta

    - [GearmanClient::doLow()](#gearmanclient.dolow) - Ejecuta una sola tarea con prioridad baja

    - [GearmanClient::doBackground()](#gearmanclient.dobackground) - Ejecuta una tarea en segundo plano

    - [GearmanClient::doHighBackground()](#gearmanclient.dohighbackground) - Ejecuta una tarea con prioridad alta en segundo plano

# GearmanClient::doNormal

(No version information available, might only be in Git)

GearmanClient::doNormal — Ejecuta una tarea y devuelve el resultado

### Descripción

public **GearmanClient::doNormal**([string](#language.types.string) $function, [string](#language.types.string) $workload, [?](#language.types.null)[string](#language.types.string) $unique = **[null](#constant.null)**): [string](#language.types.string)

Ejecuta una tarea y devuelve una [string](#language.types.string) que representa
el resultado. Corresponde a las clases [GearmanClient](#class.gearmanclient)
y [GearmanWorker](#class.gearmanworker) aceptar el formato del resultado.

### Parámetros

     function


       Una función registrada que el trabajador va a ejecutar






     workload


       Datos serializados a analizar






     unique


       Un identificador único utilizado para identificar una tarea particular





### Valores devueltos

Una [string](#language.types.string) que representa el resultado de la tarea ejecutada.

### Ejemplos

    **Ejemplo #1 Envío de una tarea con retorno inmediato**

&lt;?php

?&gt;

&lt;?php

# Código del cliente

echo "Inicio\n";

# Creación del objeto cliente.

$gmclient= new GearmanClient();

# Adición del servidor por omisión (localhost).

$gmclient-&gt;addServer();

echo "Envío de la tarea\n";

$result = $gmclient-&gt;doNormal("reverse", "Hello!");

echo "Éxito: $result\n";

?&gt;

&lt;?php

echo "Inicio\n";

# Creación del objeto worker.

$gmworker= new GearmanWorker();

# Adición del servidor por omisión (localhost).

$gmworker-&gt;addServer();

# Registro de la función "reverse" con el servidor. Modifica la función worker

# a "reverse_fn_fast" para un worker más rápido sin salida.

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Esperando una tarea...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Inicio
Envío de la tarea
Éxito: !olleH

    **Ejemplo #2 Envío de una tarea y recuperación incremental del estado**



     Una tarea es enviada y el script se ejecuta en bucle para recuperar las
     informaciones de estado. El worker tiene un retraso artificial que lo convierte en una tarea larga
     y envía el estado y los datos cuando la ejecución ocurre.
     Cada subllamada a la función **GearmanClient::doNormal()**
     produce informaciones de estado sobre la tarea en curso.

&lt;?php

# Código del cliente

# Creación del objeto cliente.

$gmclient= new GearmanClient();

# Adición del servidor por omisión (localhost).

$gmclient-&gt;addServer();

echo "Envío de la tarea\n";

# Envío de la tarea reverse

do
{
$result = $gmclient-&gt;doNormal("reverse", "Hello!");

# Verifica los paquetes devueltos así como los errores.

switch($gmclient-&gt;returnCode())
  {
    case GEARMAN_WORK_DATA:
      echo "Datos: $result\n";
      break;
    case GEARMAN_WORK_STATUS:
      list($numerator, $denominator)= $gmclient-&gt;doStatus();
      echo "Estado: $numerator/$denominator completado\n";
break;
case GEARMAN_WORK_FAIL:
echo "Fallo\n";
exit;
case GEARMAN_SUCCESS:
break;
default:
echo "RET: " . $gmclient-&gt;returnCode() . "\n";
      echo "Error: " . $gmclient-&gt;error() . "\n";
      echo "Errno: " . $gmclient-&gt;getErrno() . "\n";
      exit;
  }
}
while($gmclient-&gt;returnCode() != GEARMAN_SUCCESS);

echo "Éxito: $result\n";

?&gt;

&lt;?php

# Código del worker

echo "Inicio\n";

# Creación del objeto worker.

$gmworker= new GearmanWorker();

# Adición del servidor por omisión (localhost).

$gmworker-&gt;addServer();

# Registro de la función "reverse" con el servidor.

$gmworker-&gt;addFunction("reverse", "reverse_fn");

print "Esperando una tarea...\n";
while($gmworker-&gt;work())
{
  if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

function reverse_fn($job)
{
echo "Tarea recibida: " . $job-&gt;handle() . "\n";

$workload = $job-&gt;workload();
$workload_size = $job-&gt;workloadSize();

echo "Workload: $workload ($workload_size)\n";

# Este bucle de estado no es necesario, solo muestra cómo funciona

for ($x= 0; $x &lt; $workload_size; $x++)
  {
    echo "Envío del estado: " + $x + 1 . "/$workload_size completado\n";
$job-&gt;sendStatus($x+1, $workload_size);
    $job-&gt;sendData(substr($workload, $x, 1));
sleep(1);
}

$result= strrev($workload);
echo "Resultado: $result\n";

# Devuelve lo que se desea devolver al cliente.

return $result;
}

?&gt;

    Resultado del ejemplo anterior es similar a:



     Salida del worker:

Inicio
Esperando una tarea...
Tarea recibida: H:foo.local:106
Workload: Hello! (6)
1/6 completado
2/6 completado
3/6 completado
4/6 completado
5/6 completado
6/6 completado
Resultado: !olleH

     Salida del cliente:

Inicio
Envío de la tarea
Estado: 1/6 completado
Datos: H
Estado: 2/6 completado
Datos: e
Estado: 3/6 completado
Datos: l
Estado: 4/6 completado
Datos: l
Estado: 5/6 completado
Datos: o
Estado: 6/6 completado
Datos: !
Éxito: !olleH

### Ver también

    - [GearmanClient::doHigh()](#gearmanclient.dohigh) - Ejecuta una sola tarea con prioridad alta

    - [GearmanClient::doLow()](#gearmanclient.dolow) - Ejecuta una sola tarea con prioridad baja

    - [GearmanClient::doBackground()](#gearmanclient.dobackground) - Ejecuta una tarea en segundo plano

    - [GearmanClient::doHighBackground()](#gearmanclient.dohighbackground) - Ejecuta una tarea con prioridad alta en segundo plano

    - [GearmanClient::doLowBackground()](#gearmanclient.dolowbackground) - Ejecuta una tarea en prioridad baja en segundo plano

# GearmanClient::doStatus

(PECL gearman &gt;= 0.5.0)

GearmanClient::doStatus — Recupera el estado de la tarea en curso

### Descripción

public **GearmanClient::doStatus**(): [array](#language.types.array)

Devuelve el estado de la tarea en curso. Puede ser utilizado durante
múltiples llamadas al método [GearmanClient::doNormal()](#gearmanclient.donormal).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que representa el porcentaje de realización proporcionado en forma
de fracción, donde el primer elemento es el numerador, y el segundo,
el denominador.

### Ejemplos

    **Ejemplo #1 Recupera el estado de un trabajo cuya ejecución tarda tiempo**



     El agente en este ejemplo tiene un retraso artificial añadido durante la ejecución de la
     función. Después de cada retraso, llama al método [GearmanJob::status()](#gearmanjob.status)
     del cual el cliente recupera la información.

&lt;?php

echo "Inicio\n";

# Crea un cliente.

$gmclient= new GearmanClient();

# Añade un servidor por defecto (localhost).

$gmclient-&gt;addServer();

echo "Envío de un trabajo\n";

# Envío del trabajo

do
{
$result = $gmclient-&gt;doNormal("reverse", "Hello!");

# Verifica los diferentes paquetes y errores devueltos.

switch($gmclient-&gt;returnCode())
  {
    case GEARMAN_WORK_DATA:
      break;
    case GEARMAN_WORK_STATUS:
      # Recupera el estado del trabajo en curso
      list($numerator, $denominator)= $gmclient-&gt;doStatus();
      echo "Estado : $numerator/$denominator complete\n";
break;
case GEARMAN_WORK_FAIL:
echo "Fallo \n";
exit;
case GEARMAN_SUCCESS:
break;
default:
echo "RET : " . $gmclient-&gt;returnCode() . "\n";
      exit;
  }
}
while($gmclient-&gt;returnCode() != GEARMAN_SUCCESS);

echo "Éxito : $result\n";

?&gt;

    Resultado del ejemplo anterior es similar a:

Inicio
Envío de un trabajo
Estado : 1/6 complete
Estado : 2/6 complete
Estado : 3/6 complete
Estado : 4/6 complete
Estado : 5/6 complete
Estado : 6/6 complete
Éxito : !olleH

### Ver también

    - [GearmanClient::doNormal()](#gearmanclient.donormal) - Ejecuta una tarea y devuelve el resultado

    - [GearmanJob::status()](#gearmanjob.status) - Envía el estado (obsoleto)

# GearmanClient::echo

(PECL gearman &gt;= 0.5.0)

GearmanClient::echo — Envía datos a todos los servidores de trabajo para ver si retornan [obsoleto]

### Descripción

public **GearmanClient::echo**([string](#language.types.string) $workload): [bool](#language.types.boolean)

El método **GearmanClient::echo()** es obsoleto desde
pecl/gearman 1.0.0. Use [GearmanClient::ping()](#gearmanclient.ping).

### Parámetros

     workload


       Datos arbitrarios serializados a ser retornados





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# GearmanClient::error

(PECL gearman &gt;= 0.5.0)

GearmanClient::error — Devuelve el último error encontrado en forma de [string](#language.types.string)

### Descripción

public **GearmanClient::error**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el último error encontrado en forma de [string](#language.types.string).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [string](#language.types.string) legible por humanos que representa el último error ocurrido,
o **[false](#constant.false)** si no hay mensaje de error disponible.

### Ver también

    - [GearmanClient::getErrno()](#gearmanclient.geterrno) - Obtiene el valor de errno

# GearmanClient::getErrno

(PECL gearman &gt;= 0.5.0)

GearmanClient::getErrno — Obtiene el valor de errno

### Descripción

public **GearmanClient::getErrno**(): [int](#language.types.integer)

Devuelve el valor de errno en el caso de un valor de retorno GEARMAN_ERRNO.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor de errno de Gearman válido.

### Ver también

    - [GearmanClient::error()](#gearmanclient.error) - Devuelve el último error encontrado en forma de string

# GearmanClient::jobStatus

# gearman_job_status

(PECL gearman &gt;= 0.5.0)

GearmanClient::jobStatus -- gearman_job_status — Recupera el estado de un trabajo en segundo plano

### Descripción

Estilo orientado a objetos (método) :

public **GearmanClient::jobStatus**([string](#language.types.string) $job_handle): [array](#language.types.array)

Recupera el estado de un trabajo en segundo plano para el gestor de
trabajos proporcionado. Las informaciones de estado especifican si el trabajo es conocido,
si el trabajo está actualmente en ejecución, así como el porcentaje
de realización.

### Parámetros

     job_handle


       El manejador de trabajos asignado por el servidor Gearman





### Valores devueltos

Un array que contiene las informaciones de estado para el trabajo
correspondiente al gestor de trabajos proporcionado. El primer elemento es un
bool indicando si el trabajo es conocido, el segundo es un bool indicando
si el trabajo está en ejecución, el tercero y el cuarto corresponden al numerador y denominador del porcentaje de realización.

### Ejemplos

    **Ejemplo #1 Supervisa el estado de un trabajo en segundo plano que tarda en ejecutarse**

&lt;?php

/_ Crea un cliente _/
$gmclient= new GearmanClient();

/_ Añade un servidor por defecto _/
$gmclient-&gt;addServer();

/_ Ejecuta el cliente _/
$job_handle = $gmclient-&gt;doBackground("reverse", "this is a test");

if ($gmclient-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "Código de retorno incorrecto\n";
exit;
}

$done = false;
do
{
   sleep(3);
   $stat = $gmclient-&gt;jobStatus($job_handle);
if (!$stat[0]) // el trabajo es conocido, significando que no ha terminado
      $done = true;
   echo "Ejecución : " . ($stat[1] ? "true" : "false") . ", numerador : " . $stat[2] . ", denominador : " . $stat[3] . "\n";
}
while(!$done);

echo "hecho !\n";

?&gt;

     Resultado del ejemplo anterior es similar a:




Ejecución : true, numerador : 3, denominador : 14
Ejecución : true, numerador : 6, denominador : 14
Ejecución : true, numerador : 9, denominador : 14
Ejecución : true, numerador : 12, denominador : 14
Ejecución : false, numerador : 0, denominador : 0
hecho !

### Ver también

    - [GearmanClient::doStatus()](#gearmanclient.dostatus) - Recupera el estado de la tarea en curso

# GearmanClient::ping

(No version information available, might only be in Git)

GearmanClient::ping — Envío de datos a todos los servidores de tareas para verificar que siguen en funcionamiento

### Descripción

public **GearmanClient::ping**([string](#language.types.string) $workload): [bool](#language.types.boolean)

Envío de datos arbitrarios a todos los servidores de tareas para
verificar que siguen en funcionamiento. Los datos enviados no son
utilizados ni analizados en ningún caso. La utilidad principal de
esta función es durante las pruebas y la depuración.

### Parámetros

     workload


       Algunos datos arbitrarios que serán devueltos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# GearmanClient::removeOptions

(PECL gearman &gt;= 0.6.0)

GearmanClient::removeOptions — Elimina las opciones del cliente

### Descripción

public **GearmanClient::removeOptions**([int](#language.types.integer) $option): [bool](#language.types.boolean)

Elimina una o varias opciones.

### Parámetros

     option


       Las opciones a eliminar.





### Valores devueltos

Siempre devuelve **[true](#constant.true)**.

# GearmanClient::returnCode

(PECL gearman &gt;= 0.5.0)

GearmanClient::returnCode — Obtiene el último código Gearman devuelto

### Descripción

public **GearmanClient::returnCode**(): [int](#language.types.integer)

Devuelve el último código Gearman devuelto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un código de retorno Gearman válido.

# GearmanClient::runTasks

(PECL gearman &gt;= 0.5.0)

GearmanClient::runTasks — Ejecuta una lista de tareas en paralelo

### Descripción

public **GearmanClient::runTasks**(): [bool](#language.types.boolean)

Para un conjunto de tareas previamente añadidas con los métodos [GearmanClient::addTask()](#gearmanclient.addtask),
[GearmanClient::addTaskHigh()](#gearmanclient.addtaskhigh), [GearmanClient::addTaskLow()](#gearmanclient.addtasklow),
[GearmanClient::addTaskBackground()](#gearmanclient.addtaskbackground), [GearmanClient::addTaskHighBackground()](#gearmanclient.addtaskhighbackground), o
[GearmanClient::addTaskLowBackground()](#gearmanclient.addtasklowbackground), este método
inicia la ejecución de las tareas en paralelo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

# GearmanClient::setClientCallback

(PECL gearman &lt;= 0.5.0)

GearmanClient::setClientCallback — Define una función de retrollamada cuando se recibe un paquete de datos para una tarea (obsoleto)

### Descripción

public **GearmanClient::setClientCallback**([callable](#language.types.callable) $callback): [void](language.types.void.html)

Define una función de retrollamada cuando se recibe un paquete de datos para una tarea.

**Nota**:

    Este método ha sido reemplazado por el método
    [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) desde
    la versión 0.6.0 de la extensión Gearman.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setCompleteCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setCompleteCallback — Define una función a llamar una vez finalizada la tarea

### Descripción

public **GearmanClient::setCompleteCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada a ejecutar cuando una [GearmanTask](#class.gearmantask)
finaliza, o cuando [GearmanJob::sendComplete()](#gearmanjob.sendcomplete) es
llamado por el worker (dependiendo de lo que ocurra primero).

Esta función de retrollamada se ejecuta únicamente durante la ejecución de una [GearmanTask](#class.gearmantask) mediante [GearmanClient::runTasks()](#gearmanclient.runtasks).
No se utiliza para trabajos individuales.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setContext

(PECL gearman &gt;= 0.6.0)

GearmanClient::setContext — Define el contexto de una aplicación

### Descripción

public **GearmanClient::setContext**([string](#language.types.string) $data): [bool](#language.types.boolean)

Define una cadena arbitraria para proporcionar como contexto de
la aplicación que podrá ser recuperada más tarde mediante el método
[GearmanClient::context()](#gearmanclient.context).

### Parámetros

     data


       Datos de contexto





### Valores devueltos

Siempre devuelve **[true](#constant.true)**.

### Ver también

    - [GearmanClient::context()](#gearmanclient.context) - Recupera el contexto de la aplicación

# GearmanClient::setCreatedCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setCreatedCallback — Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

### Descripción

public **GearmanClient::setCreatedCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada a llamar cuando una tarea es colocada en la cola
del servidor de trabajos gearman.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setData

(PECL gearman &lt;= 0.5.0)

GearmanClient::setData — Establece los datos de aplicación (obsoleto)

### Descripción

public **GearmanClient::setData**([string](#language.types.string) $data): [bool](#language.types.boolean)

Establece datos arbitrarios para la aplicación que pueden ser leídos
posteriormente con [GearmanClient::data()](#gearmanclient.data).

**Nota**:

    Este método ha sido reemplazado por **GearmanCient::setContext()**
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

     data







### Valores devueltos

Siempre retorna **[true](#constant.true)**.

### Ver también

    - [GearmanClient::data()](#gearmanclient.data) - Retorna los datos de aplicación (obsoleto)

# GearmanClient::setDataCallback

(PECL gearman &gt;= 0.6.0)

GearmanClient::setDataCallback — Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

### Descripción

public **GearmanClient::setDataCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setExceptionCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setExceptionCallback — Define una función de retrollamada para las excepciones emitidas por el agente

### Descripción

public **GearmanClient::setExceptionCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Especifica una función de retrollamada a llamar cuando un agente emite una excepción.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setFailCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setFailCallback — Define una función de retrollamada a llamar cuando un trabajo falla

### Descripción

public **GearmanClient::setFailCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada a utilizar cuando una tarea falla.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setOptions

(PECL gearman &gt;= 0.5.0)

GearmanClient::setOptions — Define las opciones del cliente

### Descripción

public **GearmanClient::setOptions**([int](#language.types.integer) $option): [bool](#language.types.boolean)

Define una o varias opciones del cliente.

### Parámetros

     option


       Las opciones a definir.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

# GearmanClient::setStatusCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setStatusCallback — Define una función de retorno para recolectar los estados de una tarea

### Descripción

public **GearmanClient::setStatusCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retorno para utilizar al recuperar las
informaciones de estado actualizadas desde el agente.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setTimeout

(PECL gearman &gt;= 0.6.0)

GearmanClient::setTimeout — Establece el tiempo de espera de una actividad del socket I/O

### Descripción

public **GearmanClient::setTimeout**([int](#language.types.integer) $timeout): [bool](#language.types.boolean)

Establece el tiempo de espera de una actividad del socket I/O.

### Parámetros

     timeout


       Un intervalo de tiempo, en milisegundos.





### Valores devueltos

Siempre devuelve **[true](#constant.true)**.

# GearmanClient::setWarningCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setWarningCallback — Define una función de retrollamada al emitir una alerta desde el agente

### Descripción

public **GearmanClient::setWarningCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada a llamar cuando un agente lanza una alerta.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWorkloadCallback()](#gearmanclient.setworkloadcallback) - Define una función de retrollamada al recibir actualizaciones de datos incrementales

# GearmanClient::setWorkloadCallback

(PECL gearman &gt;= 0.5.0)

GearmanClient::setWorkloadCallback — Define una función de retrollamada al recibir actualizaciones de datos incrementales

### Descripción

public **GearmanClient::setWorkloadCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada a llamar cuando un agente necesita enviar datos antes
de finalizar un trabajo. Un agente puede hacerlo cuando debe enviar actualizaciones,
enviar resultados parciales, o enviar datos en tiempo real durante la ejecución
de trabajos que requieren mucho tiempo.

**Nota**:

El callback solo será disparado para las tareas que son añadidas (por ejemplo llamando a [GearmanClient::addTask()](#gearmanclient.addtask))
después de la llamada a este método.

### Parámetros

callback

Una función o método a llamar.
Debe retornar un valor válido [de retorno Gearman](#gearman.constants).

Si no se proporciona una instrucción de retorno, el valor por omisión será **[GEARMAN_SUCCESS](#constant.gearman-success)**.

callback([GearmanTask](#class.gearmantask) $task, [mixed](#language.types.mixed) $context): [int](#language.types.integer)

    task


      La tarea para la cual se llama este callback.






    context


      Todo lo que se pasó a [GearmanClient::addTask()](#gearmanclient.addtask) (o método equivalente) como context.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::setDataCallback()](#gearmanclient.setdatacallback) - Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea

    - [GearmanClient::setCompleteCallback()](#gearmanclient.setcompletecallback) - Define una función a llamar una vez finalizada la tarea

    - [GearmanClient::setCreatedCallback()](#gearmanclient.setcreatedcallback) - Define una función de retrollamada a llamar cuando una tarea es colocada en la cola

    - [GearmanClient::setExceptionCallback()](#gearmanclient.setexceptioncallback) - Define una función de retrollamada para las excepciones emitidas por el agente

    - [GearmanClient::setFailCallback()](#gearmanclient.setfailcallback) - Define una función de retrollamada a llamar cuando un trabajo falla

    - [GearmanClient::setStatusCallback()](#gearmanclient.setstatuscallback) - Define una función de retorno para recolectar los estados de una tarea

    - [GearmanClient::setWarningCallback()](#gearmanclient.setwarningcallback) - Define una función de retrollamada al emitir una alerta desde el agente

# GearmanClient::timeout

(PECL gearman &gt;= 0.6.0)

GearmanClient::timeout — Obtiene el valor del tiempo de espera de actividad del socket I/O

### Descripción

public **GearmanClient::timeout**(): [int](#language.types.integer)

Devuelve el valor del tiempo de espera, en milisegundos, para una actividad del socket I/O.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El tiempo de espera, en milisegundos, para una actividad I/O.
Un valor negativo indica que el tiempo de espera es infinito.

### Ver también

    - [GearmanClient::setTimeout()](#gearmanclient.settimeout) - Establece el tiempo de espera de una actividad del socket I/O

# GearmanClient::wait

(PECL gearman &gt;= 0.6.0)

GearmanClient::wait — Espera la actividad de E/S en todas las conexiones de un cliente

### Descripción

public **GearmanClient::wait**(): [bool](#language.types.boolean)

Esto espera la actividad de cualquiera de los servidores conectados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** en caso de éxito, **[false](#constant.false)** en caso de error.

### Ver también

    - [GearmanWorker::wait()](#gearmanworker.wait) - Espera una actividad de uno o varios servidores de trabajos

## Tabla de contenidos

- [GearmanClient::addOptions](#gearmanclient.addoptions) — Añade opciones al cliente
- [GearmanClient::addServer](#gearmanclient.addserver) — Añade un servidor de tareas al cliente
- [GearmanClient::addServers](#gearmanclient.addservers) — Añade una lista de servidores de tareas al cliente
- [GearmanClient::addTask](#gearmanclient.addtask) — Añade una tarea para ser ejecutada en paralelo
- [GearmanClient::addTaskBackground](#gearmanclient.addtaskbackground) — Añade una tarea de fondo para su ejecución en paralelo
- [GearmanClient::addTaskHigh](#gearmanclient.addtaskhigh) — Añade una tarea de alta prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskHighBackground](#gearmanclient.addtaskhighbackground) — Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskLow](#gearmanclient.addtasklow) — Añade una tarea de baja prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskLowBackground](#gearmanclient.addtasklowbackground) — Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskStatus](#gearmanclient.addtaskstatus) — Añade una tarea para obtener el estado
- [GearmanClient::clearCallbacks](#gearmanclient.clearcallbacks) — Elimina todas las funciones de retrollamada de las tareas
- [GearmanClient::clone](#gearmanclient.clone) — Crea una copia de un objeto GearmanClient
- [GearmanClient::\_\_construct](#gearmanclient.construct) — Crea una instancia GearmanClient
- [GearmanClient::context](#gearmanclient.context) — Recupera el contexto de la aplicación
- [GearmanClient::data](#gearmanclient.data) — Retorna los datos de aplicación (obsoleto)
- [GearmanClient::do](#gearmanclient.do) — Ejecuta una sola tarea y retorna el resultado [obsoleto]
- [GearmanClient::doBackground](#gearmanclient.dobackground) — Ejecuta una tarea en segundo plano
- [GearmanClient::doHigh](#gearmanclient.dohigh) — Ejecuta una sola tarea con prioridad alta
- [GearmanClient::doHighBackground](#gearmanclient.dohighbackground) — Ejecuta una tarea con prioridad alta en segundo plano
- [GearmanClient::doJobHandle](#gearmanclient.dojobhandle) — Obtiene el manejador de trabajos para la tarea en curso
- [GearmanClient::doLow](#gearmanclient.dolow) — Ejecuta una sola tarea con prioridad baja
- [GearmanClient::doLowBackground](#gearmanclient.dolowbackground) — Ejecuta una tarea en prioridad baja en segundo plano
- [GearmanClient::doNormal](#gearmanclient.donormal) — Ejecuta una tarea y devuelve el resultado
- [GearmanClient::doStatus](#gearmanclient.dostatus) — Recupera el estado de la tarea en curso
- [GearmanClient::echo](#gearmanclient.echo) — Envía datos a todos los servidores de trabajo para ver si retornan [obsoleto]
- [GearmanClient::error](#gearmanclient.error) — Devuelve el último error encontrado en forma de string
- [GearmanClient::getErrno](#gearmanclient.geterrno) — Obtiene el valor de errno
- [GearmanClient::jobStatus](#gearmanclient.jobstatus) — Recupera el estado de un trabajo en segundo plano
- [GearmanClient::ping](#gearmanclient.ping) — Envío de datos a todos los servidores de tareas para verificar que siguen en funcionamiento
- [GearmanClient::removeOptions](#gearmanclient.removeoptions) — Elimina las opciones del cliente
- [GearmanClient::returnCode](#gearmanclient.returncode) — Obtiene el último código Gearman devuelto
- [GearmanClient::runTasks](#gearmanclient.runtasks) — Ejecuta una lista de tareas en paralelo
- [GearmanClient::setClientCallback](#gearmanclient.setclientcallback) — Define una función de retrollamada cuando se recibe un paquete de datos para una tarea (obsoleto)
- [GearmanClient::setCompleteCallback](#gearmanclient.setcompletecallback) — Define una función a llamar una vez finalizada la tarea
- [GearmanClient::setContext](#gearmanclient.setcontext) — Define el contexto de una aplicación
- [GearmanClient::setCreatedCallback](#gearmanclient.setcreatedcallback) — Define una función de retrollamada a llamar cuando una tarea es colocada en la cola
- [GearmanClient::setData](#gearmanclient.setdata) — Establece los datos de aplicación (obsoleto)
- [GearmanClient::setDataCallback](#gearmanclient.setdatacallback) — Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea
- [GearmanClient::setExceptionCallback](#gearmanclient.setexceptioncallback) — Define una función de retrollamada para las excepciones emitidas por el agente
- [GearmanClient::setFailCallback](#gearmanclient.setfailcallback) — Define una función de retrollamada a llamar cuando un trabajo falla
- [GearmanClient::setOptions](#gearmanclient.setoptions) — Define las opciones del cliente
- [GearmanClient::setStatusCallback](#gearmanclient.setstatuscallback) — Define una función de retorno para recolectar los estados de una tarea
- [GearmanClient::setTimeout](#gearmanclient.settimeout) — Establece el tiempo de espera de una actividad del socket I/O
- [GearmanClient::setWarningCallback](#gearmanclient.setwarningcallback) — Define una función de retrollamada al emitir una alerta desde el agente
- [GearmanClient::setWorkloadCallback](#gearmanclient.setworkloadcallback) — Define una función de retrollamada al recibir actualizaciones de datos incrementales
- [GearmanClient::timeout](#gearmanclient.timeout) — Obtiene el valor del tiempo de espera de actividad del socket I/O
- [GearmanClient::wait](#gearmanclient.wait) — Espera la actividad de E/S en todas las conexiones de un cliente

# La clase GearmanJob

(PECL gearman &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

     class **GearmanJob**
     {

    /* Métodos */

public [functionName](#gearmanjob.functionname)(): [false](#language.types.singleton)|[string](#language.types.string)
public [handle](#gearmanjob.handle)(): [false](#language.types.singleton)|[string](#language.types.string)
public [returnCode](#gearmanjob.returncode)(): [int](#language.types.integer)
public [sendComplete](#gearmanjob.sendcomplete)([string](#language.types.string) $result): [bool](#language.types.boolean)
public [sendData](#gearmanjob.senddata)([string](#language.types.string) $data): [bool](#language.types.boolean)
public [sendException](#gearmanjob.sendexception)([string](#language.types.string) $exception): [bool](#language.types.boolean)
public [sendFail](#gearmanjob.sendfail)(): [bool](#language.types.boolean)
public [sendStatus](#gearmanjob.sendstatus)([int](#language.types.integer) $numerator, [int](#language.types.integer) $denominator): [bool](#language.types.boolean)
public [sendWarning](#gearmanjob.sendwarning)([string](#language.types.string) $warning): [bool](#language.types.boolean)
public [setReturn](#gearmanjob.setreturn)([int](#language.types.integer) $gearman_return_t): [bool](#language.types.boolean)
public [unique](#gearmanjob.unique)(): [false](#language.types.singleton)|[string](#language.types.string)
public [workload](#gearmanjob.workload)(): [string](#language.types.string)
public [workloadSize](#gearmanjob.workloadsize)(): [int](#language.types.integer)

}

# GearmanJob::complete

(PECL gearman &lt;= 0.5.0)

GearmanJob::complete — Envía el resultado y el estado completo (obsoleto)

### Descripción

public **GearmanJob::complete**([string](#language.types.string) $result): [bool](#language.types.boolean)

Envía los datos que han resultado del proceso y actualiza el estado a completo
para este trabajo.

**Nota**:

    Este método ha sido reemplazado por [GearmanJob::sendComplete()](#gearmanjob.sendcomplete)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

     result


       Los datos que han resultado en formato serializado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::sendFail()](#gearmanjob.sendfail) - Envía un estado de fallo

    - [GearmanJob::setReturn()](#gearmanjob.setreturn) - Define un valor de retorno

# GearmanJob::\_\_construct

(PECL gearman &gt;= 0.5.0)

GearmanJob::\_\_construct — Crea una instancia de GearmanJob

### Descripción

public **GearmanJob::\_\_construct**()

Crea una instancia de [GearmanJob](#class.gearmanjob) que representa un trabajo
que un trabajador debe completar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [GearmanJob](#class.gearmanjob).

# GearmanJob::data

(PECL gearman &lt;= 0.5.0)

GearmanJob::data — Envía datos para un trabajo en ejecución (obsoleto)

### Descripción

public **GearmanJob::data**([string](#language.types.string) $data): [bool](#language.types.boolean)

Envía datos al servidor de trabajos (y a cualquier cliente a la escucha)
para este trabajo.

**Nota**:

    Este método ha sido reemplazado por [GearmanJob::sendData()](#gearmanjob.senddata)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

     data


       Datos arbitrarios serializados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::workload()](#gearmanjob.workload) - Obtiene la carga de trabajo

    - [GearmanTask::data()](#gearmantask.data) - Recupera los datos devueltos por una tarea

# GearmanJob::exception

(PECL gearman &lt;= 0.5.0)

GearmanJob::exception — Envía una excepción para un trabajo en ejecución (obsoleto)

### Descripción

public **GearmanJob::exception**([string](#language.types.string) $exception): [bool](#language.types.boolean)

Envía la excepción indicada cuando este trabajo está siendo ejecutado.

**Nota**:

    Este método ha sido reemplazado por [GearmanJob::sendException()](#gearmanjob.sendexception)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

     exception


       Descripción de la excepción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::setReturn()](#gearmanjob.setreturn) - Define un valor de retorno

    - [GearmanJob::sendStatus()](#gearmanjob.sendstatus) - Envía un estado

    - [GearmanJob::sendWarning()](#gearmanjob.sendwarning) - Envía una alerta

# GearmanJob::fail

(PECL gearman &lt;= 0.5.0)

GearmanJob::fail — Envía el estado de fallo (obsoleto)

### Descripción

public **GearmanJob::fail**(): [bool](#language.types.boolean)

Envía el estado de fallo para este trabajo, indicando que el trabajo ha fallado
por razones conocidas (en contraposición a un fallo debido al lanzamiento de
una excepción).

**Nota**:

    Este método ha sido reemplazado por [GearmanJob::sendFail()](#gearmanjob.sendfail)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::sendException()](#gearmanjob.sendexception) - Envía una excepción para un trabajo en ejecución

    - [GearmanJob::setReturn()](#gearmanjob.setreturn) - Define un valor de retorno

    - [GearmanJob::sendStatus()](#gearmanjob.sendstatus) - Envía un estado

    - [GearmanJob::sendWarning()](#gearmanjob.sendwarning) - Envía una alerta

# GearmanJob::functionName

(PECL gearman &gt;= 0.5.0)

GearmanJob::functionName — Obtiene el nombre de la función

### Descripción

public **GearmanJob::functionName**(): [false](#language.types.singleton)|[string](#language.types.string)

Devuelve el nombre de la función para este trabajo. Es la función ejecutada
por el agente para ejecutar el trabajo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la función, o **[false](#constant.false)** si el trabajo no ha sido inicializado.

### Ver también

    - [GearmanTask::function()](#gearmantask.function) - Obtiene el nombre de la función asociada (obsoleto)

# GearmanJob::handle

(PECL gearman &gt;= 0.5.0)

GearmanJob::handle — Obtiene el manejador de trabajos

### Descripción

public **GearmanJob::handle**(): [false](#language.types.singleton)|[string](#language.types.string)

Devuelve el manejador de trabajos asignado por el servidor de trabajos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un manejador de trabajos, o **[false](#constant.false)** si el trabajo no ha sido inicializado.

### Ver también

    - [GearmanTask::jobHandle()](#gearmantask.jobhandle) - Obtiene el manejador de trabajos

# GearmanJob::returnCode

(PECL gearman &gt;= 0.5.0)

GearmanJob::returnCode — Obtiene el último código devuelto

### Descripción

public **GearmanJob::returnCode**(): [int](#language.types.integer)

Devuelve el último código devuelto por el servidor de trabajos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un código de retorno válido de Gearman.

### Ver también

    - [GearmanTask::returnCode()](#gearmantask.returncode) - Obtiene el último código devuelto

# GearmanJob::sendComplete

(PECL gearman &gt;= 0.6.0)

GearmanJob::sendComplete — Envía el resultado junto con el estado completo

### Descripción

public **GearmanJob::sendComplete**([string](#language.types.string) $result): [bool](#language.types.boolean)

Envía los datos del resultado junto con el estado completo actualizado para este trabajo.

### Parámetros

     result


       Los datos serializados del resultado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::sendFail()](#gearmanjob.sendfail) - Envía un estado de fallo

    - [GearmanJob::setReturn()](#gearmanjob.setreturn) - Define un valor de retorno

# GearmanJob::sendData

(PECL gearman &gt;= 0.6.0)

GearmanJob::sendData — Envía los datos para un trabajo en ejecución

### Descripción

public **GearmanJob::sendData**([string](#language.types.string) $data): [bool](#language.types.boolean)

Envía los datos al servidor de trabajos (y a todos los clientes que escuchen)
para este trabajo.

### Parámetros

     data


       Datos serializados arbitrarios.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::workload()](#gearmanjob.workload) - Obtiene la carga de trabajo

    - [GearmanTask::data()](#gearmantask.data) - Recupera los datos devueltos por una tarea

# GearmanJob::sendException

(PECL gearman &gt;= 0.6.0)

GearmanJob::sendException — Envía una excepción para un trabajo en ejecución

### Descripción

public **GearmanJob::sendException**([string](#language.types.string) $exception): [bool](#language.types.boolean)

Envía la excepción proporcionada durante la ejecución de este trabajo.

### Parámetros

     exception


       Una descripción de excepción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::setReturn()](#gearmanjob.setreturn) - Define un valor de retorno

    - [GearmanJob::sendStatus()](#gearmanjob.sendstatus) - Envía un estado

    - [GearmanJob::sendWarning()](#gearmanjob.sendwarning) - Envía una alerta

# GearmanJob::sendFail

(PECL gearman &gt;= 0.6.0)

GearmanJob::sendFail — Envía un estado de fallo

### Descripción

public **GearmanJob::sendFail**(): [bool](#language.types.boolean)

Envía un estado de fallo para este trabajo, indicando que el trabajo ha fallado
de forma inesperada (a diferencia de un error que emite una excepción).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::sendException()](#gearmanjob.sendexception) - Envía una excepción para un trabajo en ejecución

    - [GearmanJob::setReturn()](#gearmanjob.setreturn) - Define un valor de retorno

    - [GearmanJob::sendStatus()](#gearmanjob.sendstatus) - Envía un estado

    - [GearmanJob::sendWarning()](#gearmanjob.sendwarning) - Envía una alerta

# GearmanJob::sendStatus

(PECL gearman &gt;= 0.6.0)

GearmanJob::sendStatus — Envía un estado

### Descripción

public **GearmanJob::sendStatus**([int](#language.types.integer) $numerator, [int](#language.types.integer) $denominator): [bool](#language.types.boolean)

Envía información de estado al servidor de trabajos
así como a todos los clientes que estén escuchando. Utilícese esta función
para especificar el porcentaje de realización del trabajo actual.

### Parámetros

     numerator


       El numerador de la tasa de realización, en forma de fracción.






     denominator


       El denominador de la tasa de realización, en forma de fracción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::jobStatus()](#gearmanclient.jobstatus) - Recupera el estado de un trabajo en segundo plano

    - [GearmanTask::taskDenominator()](#gearmantask.taskdenominator) - Obtiene el denominador de la tasa de realización

    - [GearmanTask::taskNumerator()](#gearmantask.tasknumerator) - Obtiene el numerador de la tasa de realización

# GearmanJob::sendWarning

(PECL gearman &gt;= 0.6.0)

GearmanJob::sendWarning — Envía una alerta

### Descripción

public **GearmanJob::sendWarning**([string](#language.types.string) $warning): [bool](#language.types.boolean)

Envía una alerta para este trabajo durante su ejecución.

### Parámetros

     warning


       Un mensaje de alerta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::sendComplete()](#gearmanjob.sendcomplete) - Envía el resultado junto con el estado completo

    - [GearmanJob::sendException()](#gearmanjob.sendexception) - Envía una excepción para un trabajo en ejecución

    - [GearmanJob::sendFail()](#gearmanjob.sendfail) - Envía un estado de fallo

# GearmanJob::setReturn

(PECL gearman &gt;= 0.5.0)

GearmanJob::setReturn — Define un valor de retorno

### Descripción

public **GearmanJob::setReturn**([int](#language.types.integer) $gearman_return_t): [bool](#language.types.boolean)

Define un valor de retorno para este trabajo, indicando la forma en que
terminó este trabajo.

### Parámetros

     gearman_return_t


       Un valor de retorno válido de Gearman.





### Valores devueltos

# GearmanJob::status

(PECL gearman &lt;= 0.5.0)

GearmanJob::status — Envía el estado (obsoleto)

### Descripción

public **GearmanJob::status**([int](#language.types.integer) $numerator, [int](#language.types.integer) $denominator): [bool](#language.types.boolean)

Envía información de estado al servidor de trabajo y a cualquier cliente a la
escucha. Usar para especificar qué porcentaje del trabajo ha sido completado.

**Nota**:

    Este método ha sido reemplazado por [GearmanJob::sendStatus()](#gearmanjob.sendstatus)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

     numerator


       El numerador del porcentaje completado, expresado como una fracción.






     denominator


       El denominador del porcentaje completado, expresado como una fracción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanClient::jobStatus()](#gearmanclient.jobstatus) - Recupera el estado de un trabajo en segundo plano

    - [GearmanTask::taskDenominator()](#gearmantask.taskdenominator) - Obtiene el denominador de la tasa de realización

    - [GearmanTask::taskNumerator()](#gearmantask.tasknumerator) - Obtiene el numerador de la tasa de realización

# GearmanJob::unique

(PECL gearman &gt;= 0.5.0)

GearmanJob::unique — Obtiene el identificador único

### Descripción

public **GearmanJob::unique**(): [false](#language.types.singleton)|[string](#language.types.string)

Devuelve el identificador único para este trabajo.
El identificador es asignado por el cliente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El identificador único, o **[false](#constant.false)** si el trabajo no ha sido inicializado.

### Ver también

    - [GearmanClient::do()](#gearmanclient.do) - Ejecuta una sola tarea y retorna el resultado [obsoleto]

    - [GearmanTask::uuid()](#gearmantask.uuid) - Recupera el identificador único para una tarea (obsoleto)

# GearmanJob::warning

(PECL gearman &lt;= 0.5.0)

GearmanJob::warning — Envía un aviso (obsoleto)

### Descripción

public **GearmanJob::warning**([string](#language.types.string) $warning): [bool](#language.types.boolean)

Envía un aviso para el trabajo mientras está en ejecución.

**Nota**:

    Este método ha sido reemplazado por [GearmanJob::sendWarning()](#gearmanjob.sendwarning)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

     warning


       Un mensaje de aviso.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [GearmanJob::sendComplete()](#gearmanjob.sendcomplete) - Envía el resultado junto con el estado completo

    - [GearmanJob::sendException()](#gearmanjob.sendexception) - Envía una excepción para un trabajo en ejecución

    - [GearmanJob::sendFail()](#gearmanjob.sendfail) - Envía un estado de fallo

# GearmanJob::workload

(PECL gearman &gt;= 0.5.0)

GearmanJob::workload — Obtiene la carga de trabajo

### Descripción

public **GearmanJob::workload**(): [string](#language.types.string)

Obtiene la carga para este trabajo. Son los datos serializados
a analizar por el agente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los datos serializados.

### Ver también

    - [GearmanClient::do()](#gearmanclient.do) - Ejecuta una sola tarea y retorna el resultado [obsoleto]

    - [GearmanJob::workloadSize()](#gearmanjob.workloadsize) - Obtiene el tamaño de la carga de trabajo

# GearmanJob::workloadSize

(PECL gearman &gt;= 0.5.0)

GearmanJob::workloadSize — Obtiene el tamaño de la carga de trabajo

### Descripción

public **GearmanJob::workloadSize**(): [int](#language.types.integer)

Devuelve el tamaño de la carga para este trabajo (los datos que el agente debe procesar)
en bytes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El tamaño, en bytes.

### Ver también

    - [GearmanJob::workload()](#gearmanjob.workload) - Obtiene la carga de trabajo

## Tabla de contenidos

- [GearmanJob::complete](#gearmanjob.complete) — Envía el resultado y el estado completo (obsoleto)
- [GearmanJob::\_\_construct](#gearmanjob.construct) — Crea una instancia de GearmanJob
- [GearmanJob::data](#gearmanjob.data) — Envía datos para un trabajo en ejecución (obsoleto)
- [GearmanJob::exception](#gearmanjob.exception) — Envía una excepción para un trabajo en ejecución (obsoleto)
- [GearmanJob::fail](#gearmanjob.fail) — Envía el estado de fallo (obsoleto)
- [GearmanJob::functionName](#gearmanjob.functionname) — Obtiene el nombre de la función
- [GearmanJob::handle](#gearmanjob.handle) — Obtiene el manejador de trabajos
- [GearmanJob::returnCode](#gearmanjob.returncode) — Obtiene el último código devuelto
- [GearmanJob::sendComplete](#gearmanjob.sendcomplete) — Envía el resultado junto con el estado completo
- [GearmanJob::sendData](#gearmanjob.senddata) — Envía los datos para un trabajo en ejecución
- [GearmanJob::sendException](#gearmanjob.sendexception) — Envía una excepción para un trabajo en ejecución
- [GearmanJob::sendFail](#gearmanjob.sendfail) — Envía un estado de fallo
- [GearmanJob::sendStatus](#gearmanjob.sendstatus) — Envía un estado
- [GearmanJob::sendWarning](#gearmanjob.sendwarning) — Envía una alerta
- [GearmanJob::setReturn](#gearmanjob.setreturn) — Define un valor de retorno
- [GearmanJob::status](#gearmanjob.status) — Envía el estado (obsoleto)
- [GearmanJob::unique](#gearmanjob.unique) — Obtiene el identificador único
- [GearmanJob::warning](#gearmanjob.warning) — Envía un aviso (obsoleto)
- [GearmanJob::workload](#gearmanjob.workload) — Obtiene la carga de trabajo
- [GearmanJob::workloadSize](#gearmanjob.workloadsize) — Obtiene el tamaño de la carga de trabajo

# La clase GearmanTask

(PECL gearman &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

     class **GearmanTask**
     {

    /* Métodos */

public [\_\_construct](#gearmantask.construct)()

    public [data](#gearmantask.data)(): [false](#language.types.singleton)|[string](#language.types.string)

public [dataSize](#gearmantask.datasize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [functionName](#gearmantask.functionname)(): [false](#language.types.singleton)|[string](#language.types.string)
public [isKnown](#gearmantask.isknown)(): [bool](#language.types.boolean)
public [isRunning](#gearmantask.isrunning)(): [bool](#language.types.boolean)
public [jobHandle](#gearmantask.jobhandle)(): [false](#language.types.singleton)|[string](#language.types.string)
public [recvData](#gearmantask.recvdata)([int](#language.types.integer) $data_len): [false](#language.types.singleton)|[array](#language.types.array)
public [returnCode](#gearmantask.returncode)(): [int](#language.types.integer)
public [sendWorkload](#gearmantask.sendworkload)([string](#language.types.string) $data): [int](#language.types.integer)|[false](#language.types.singleton)
public [taskDenominator](#gearmantask.taskdenominator)(): [false](#language.types.singleton)|[int](#language.types.integer)
public [taskNumerator](#gearmantask.tasknumerator)(): [false](#language.types.singleton)|[int](#language.types.integer)
public [unique](#gearmantask.unique)(): [false](#language.types.singleton)|[string](#language.types.string)

}

# GearmanTask::\_\_construct

(PECL gearman &gt;= 0.5.0)

GearmanTask::\_\_construct — Crea una instancia GearmanTask

### Descripción

public **GearmanTask::\_\_construct**()

Crea una instancia [GearmanTask](#class.gearmantask) que representa una tarea
a enviar al servidor de tareas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask).

# GearmanTask::create

(PECL gearman &lt;= 0.5.0)

GearmanTask::create — Crea una tarea (deprecado)

### Descripción

public **GearmanTask::create**(): [GearmanTask](#class.gearmantask)|[false](#language.types.singleton)

Devuelve un nuevo objeto [GearmanTask](#class.gearmantask).

**Nota**:

    Este método fue eliminado desde la versión
    0.6.0 de la extensión Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [GearmanTask](#class.gearmantask) o **[false](#constant.false)** si ocurre un error.

# GearmanTask::data

(PECL gearman &gt;= 0.5.0)

GearmanTask::data — Recupera los datos devueltos por una tarea

### Descripción

public **GearmanTask::data**(): [false](#language.types.singleton)|[string](#language.types.string)

Devuelve los datos devueltos por una tarea por un agente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los datos serializados, o **[false](#constant.false)** si no hay datos.

### Ver también

    - [GearmanTask::dataSize()](#gearmantask.datasize) - Obtiene el tamaño de los datos devueltos

# GearmanTask::dataSize

(PECL gearman &gt;= 0.5.0)

GearmanTask::dataSize — Obtiene el tamaño de los datos devueltos

### Descripción

public **GearmanTask::dataSize**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tamaño de los datos devueltos de una tarea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El tamaño de los datos, o **[false](#constant.false)** si no hay datos.

### Ver también

    - [GearmanTask::data()](#gearmantask.data) - Recupera los datos devueltos por una tarea

# GearmanTask::function

(PECL gearman &lt;= 0.5.0)

GearmanTask::function — Obtiene el nombre de la función asociada (obsoleto)

### Descripción

public **GearmanTask::function**(): [string](#language.types.string)

Retorna el nombre de la función que esta tarea tiene asociada con, por ejemplo, la función
que el trabajador de Gearman llama.

**Nota**:

    Este método ha sido reemplazado por [GearmanTask::functionName()](#gearmantask.functionname)
    en la versión 0.6.0 de la extensión Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la función.

# GearmanTask::functionName

(PECL gearman &gt;= 0.6.0)

GearmanTask::functionName — Obtiene el nombre de la función asociada

### Descripción

public **GearmanTask::functionName**(): [false](#language.types.singleton)|[string](#language.types.string)

Devuelve el nombre de la función asociada a esta tarea, es decir,
la función llamada por el agente Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un nombre de función, o **[false](#constant.false)** si la tarea no ha sido creada aún.

# GearmanTask::isKnown

(PECL gearman &gt;= 0.5.0)

GearmanTask::isKnown — Verifica si una tarea es conocida

### Descripción

public **GearmanTask::isKnown**(): [bool](#language.types.boolean)

Obtiene las informaciones de estado si la tarea es conocida en el servidor
de trabajos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la tarea es conocida, **[false](#constant.false)** en caso contrario.

# GearmanTask::isRunning

(PECL gearman &gt;= 0.5.0)

GearmanTask::isRunning — Verifica si la tarea está actualmente en funcionamiento

### Descripción

public **GearmanTask::isRunning**(): [bool](#language.types.boolean)

Indica si la tarea está actualmente en funcionamiento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la tarea está en funcionamiento, **[false](#constant.false)** en caso contrario.

# GearmanTask::jobHandle

# gearman_job_handle

(PECL gearman &gt;= 0.5.0)

GearmanTask::jobHandle -- gearman_job_handle — Obtiene el manejador de trabajos

### Descripción

public **GearmanTask::jobHandle**(): [false](#language.types.singleton)|[string](#language.types.string)

Obtiene el manejador de trabajos para esta tarea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El manejador de trabajos, o **[false](#constant.false)** si la tarea no ha sido creada aún.

### Ver también

    - [GearmanClient::doJobHandle()](#gearmanclient.dojobhandle) - Obtiene el manejador de trabajos para la tarea en curso

# GearmanTask::recvData

(PECL gearman &gt;= 0.5.0)

GearmanTask::recvData — Lee el trabajo o los datos devueltos por una tarea en un buffer

### Descripción

public **GearmanTask::recvData**([int](#language.types.integer) $data_len): [false](#language.types.singleton)|[array](#language.types.array)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     data_len


       Longitud de los datos a leer.





### Valores devueltos

Un array cuyo primer elemento es la longitud de los datos
leídos, y el segundo, el buffer de datos.
Devuelve **[false](#constant.false)** si la lectura falla.

### Ver también

    - [GearmanTask::sendData()](#gearmantask.senddata) - Envía datos para una tarea (deprecado)

# GearmanTask::returnCode

(PECL gearman &gt;= 0.5.0)

GearmanTask::returnCode — Obtiene el último código devuelto

### Descripción

public **GearmanTask::returnCode**(): [int](#language.types.integer)

Devuelve el último código devuelto por Gearman para una tarea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un código de retorno válido de Gearman.

### Ver también

    - [GearmanClient::returnCode()](#gearmanclient.returncode) - Obtiene el último código Gearman devuelto

# GearmanTask::sendData

(PECL gearman &lt;= 0.5.0)

GearmanTask::sendData — Envía datos para una tarea (deprecado)

### Descripción

public **GearmanTask::sendData**([string](#language.types.string) $data): [int](#language.types.integer)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     data


       Datos a enviar al agente.





### Valores devueltos

La longitud de los datos enviados, o **[false](#constant.false)** si el envío
ha fallado.

### Ver también

    - [GearmanTask::recvData()](#gearmantask.recvdata) - Lee el trabajo o los datos devueltos por una tarea en un buffer

# GearmanTask::sendWorkload

(PECL gearman &gt;= 0.6.0)

GearmanTask::sendWorkload — Envía los datos para una tarea

### Descripción

public **GearmanTask::sendWorkload**([string](#language.types.string) $data): [int](#language.types.integer)|[false](#language.types.singleton)

**Advertencia**
Esta función es _EXPERIMENTAL_. El comportamiento de esta función, su nombre, y toda la
documentación alrededor de esta función puede cambiar sin previo aviso en una próxima versión de PHP.
Esta función debe ser utilizada bajo su propio riesgo.

### Parámetros

     data


       Datos a enviar al agente.





### Valores devueltos

La longitud de los datos a enviar, o **[false](#constant.false)**
si el envío falla.

### Ver también

    - [GearmanTask::recvData()](#gearmantask.recvdata) - Lee el trabajo o los datos devueltos por una tarea en un buffer

# GearmanTask::taskDenominator

(PECL gearman &gt;= 0.5.0)

GearmanTask::taskDenominator — Obtiene el denominador de la tasa de realización

### Descripción

public **GearmanTask::taskDenominator**(): [false](#language.types.singleton)|[int](#language.types.integer)

Devuelve el denominador de la tasa de realización de la tarea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un número entre 0 y 100, o **[false](#constant.false)** si no puede ser determinado.

### Ver también

    - [GearmanTask::taskNumerator()](#gearmantask.tasknumerator) - Obtiene el numerador de la tasa de realización

# GearmanTask::taskNumerator

(PECL gearman &gt;= 0.5.0)

GearmanTask::taskNumerator — Obtiene el numerador de la tasa de realización

### Descripción

public **GearmanTask::taskNumerator**(): [false](#language.types.singleton)|[int](#language.types.integer)

Devuelve el numerador de la tasa de realización de la tarea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un número entre 0 y 100, o **[false](#constant.false)** si no puede ser determinado.

### Ver también

    - [GearmanTask::taskDenominator()](#gearmantask.taskdenominator) - Obtiene el denominador de la tasa de realización

# GearmanTask::unique

(PECL gearman &gt;= 0.6.0)

GearmanTask::unique — Obtiene el identificador único de la tarea

### Descripción

public **GearmanTask::unique**(): [false](#language.types.singleton)|[string](#language.types.string)

Devuelve el identificador único de la tarea. Este es asignado por el método
[GearmanClient](#class.gearmanclient), a diferencia del gestor de trabajos que es definido por el servidor de trabajos Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El identificador único, o **[false](#constant.false)** si no se ha asignado ningún identificador.

### Ver también

    - [GearmanClient::do()](#gearmanclient.do) - Ejecuta una sola tarea y retorna el resultado [obsoleto]

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

# GearmanTask::uuid

(PECL gearman &lt;= 0.5.0)

GearmanTask::uuid — Recupera el identificador único para una tarea (obsoleto)

### Descripción

public **GearmanTask::uuid**(): [string](#language.types.string)

Devuelve el identificador único para una tarea. Es asignado por el
método [GearmanClient](#class.gearmanclient), a diferencia del gestor
de trabajos que es definido por el servidor de trabajos Gearman.

**Nota**:

    Este método ha sido reemplazado por el método
    [GearmanTask::unique()](#gearmantask.unique) desde la versión
    0.6.0 de la extensión Gearman.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El identificador único, o **[false](#constant.false)** si ningún identificador está asignado.

### Ver también

    - [GearmanClient::do()](#gearmanclient.do) - Ejecuta una sola tarea y retorna el resultado [obsoleto]

    - [GearmanClient::addTask()](#gearmanclient.addtask) - Añade una tarea para ser ejecutada en paralelo

## Tabla de contenidos

- [GearmanTask::\_\_construct](#gearmantask.construct) — Crea una instancia GearmanTask
- [GearmanTask::create](#gearmantask.create) — Crea una tarea (deprecado)
- [GearmanTask::data](#gearmantask.data) — Recupera los datos devueltos por una tarea
- [GearmanTask::dataSize](#gearmantask.datasize) — Obtiene el tamaño de los datos devueltos
- [GearmanTask::function](#gearmantask.function) — Obtiene el nombre de la función asociada (obsoleto)
- [GearmanTask::functionName](#gearmantask.functionname) — Obtiene el nombre de la función asociada
- [GearmanTask::isKnown](#gearmantask.isknown) — Verifica si una tarea es conocida
- [GearmanTask::isRunning](#gearmantask.isrunning) — Verifica si la tarea está actualmente en funcionamiento
- [GearmanTask::jobHandle](#gearmantask.jobhandle) — Obtiene el manejador de trabajos
- [GearmanTask::recvData](#gearmantask.recvdata) — Lee el trabajo o los datos devueltos por una tarea en un buffer
- [GearmanTask::returnCode](#gearmantask.returncode) — Obtiene el último código devuelto
- [GearmanTask::sendData](#gearmantask.senddata) — Envía datos para una tarea (deprecado)
- [GearmanTask::sendWorkload](#gearmantask.sendworkload) — Envía los datos para una tarea
- [GearmanTask::taskDenominator](#gearmantask.taskdenominator) — Obtiene el denominador de la tasa de realización
- [GearmanTask::taskNumerator](#gearmantask.tasknumerator) — Obtiene el numerador de la tasa de realización
- [GearmanTask::unique](#gearmantask.unique) — Obtiene el identificador único de la tarea
- [GearmanTask::uuid](#gearmantask.uuid) — Recupera el identificador único para una tarea (obsoleto)

# La clase GearmanWorker

(PECL gearman &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

     class **GearmanWorker**
     {

    /* Métodos */

public [\_\_construct](#gearmanworker.construct)()

    public [addFunction](#gearmanworker.addfunction)(

    [string](#language.types.string) $function_name,
    [callable](#language.types.callable) $function,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [int](#language.types.integer) $timeout = 0
): [bool](#language.types.boolean)
public [addOptions](#gearmanworker.addoptions)([int](#language.types.integer) $option): [true](#language.types.singleton)
public [addServer](#gearmanworker.addserver)([string](#language.types.string) $host = **[null](#constant.null)**, [int](#language.types.integer) $port = 0, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)
public [addServers](#gearmanworker.addservers)([string](#language.types.string) $servers = **[null](#constant.null)**, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)
public [error](#gearmanworker.error)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getErrno](#gearmanworker.geterrno)(): [int](#language.types.integer)
public [options](#gearmanworker.options)(): [int](#language.types.integer)
public [register](#gearmanworker.register)([string](#language.types.string) $function_name, [int](#language.types.integer) $timeout = 0): [bool](#language.types.boolean)
public [removeOptions](#gearmanworker.removeoptions)([int](#language.types.integer) $option): [true](#language.types.singleton)
public [returnCode](#gearmanworker.returncode)(): [int](#language.types.integer)
public [setId](#gearmanworker.setid)([string](#language.types.string) $id): [bool](#language.types.boolean)
public [setOptions](#gearmanworker.setoptions)([int](#language.types.integer) $option): [true](#language.types.singleton)
public [setTimeout](#gearmanworker.settimeout)([int](#language.types.integer) $timeout): [true](#language.types.singleton)
public [timeout](#gearmanworker.timeout)(): [int](#language.types.integer)
public [unregister](#gearmanworker.unregister)([string](#language.types.string) $function_name): [bool](#language.types.boolean)
public [unregisterAll](#gearmanworker.unregisterall)(): [bool](#language.types.boolean)
public [wait](#gearmanworker.wait)(): [bool](#language.types.boolean)
public [work](#gearmanworker.work)(): [bool](#language.types.boolean)

}

# GearmanWorker::addFunction

(PECL gearman &gt;= 0.5.0)

GearmanWorker::addFunction — Registra y añade una función de retrollamada

### Descripción

public **GearmanWorker::addFunction**(
    [string](#language.types.string) $function_name,
    [callable](#language.types.callable) $function,
    [mixed](#language.types.mixed) $context = **[null](#constant.null)**,
    [int](#language.types.integer) $timeout = 0
): [bool](#language.types.boolean)

Registra una función de retrollamada con el servidor de trabajos
y especifica una retrollamada correspondiente a esta función. Opcionalmente,
fija datos de contexto de la aplicación a utilizar cuando
la función de retrollamada es llamada, así como un tiempo límite de ejecución.

### Parámetros

     function_name


       El nombre de la función a registrar con el servidor de trabajos






     function


       Una función de retrollamada a llamar cuando un trabajo es enviado






     context


       Una referencia a datos de contexto de la aplicación
       que pueden ser modificados por la función del agente.






     timeout


       Un intervalo de tiempo, en segundos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Agente simple que utiliza datos de contexto de la aplicación**

&lt;?php

# Crea un agente Gearman

$worker= new GearmanWorker();

# Añade el servidor por omisión (localhost)

$worker-&gt;addServer();

# Define una variable que contiene los datos de la aplicación

$count= 0;

# Añade la función "reverse"

$worker-&gt;addFunction("reverse", "reverse_cb", $count);

# Inicia el agente

while ($worker-&gt;work());

function reverse_cb($job, &amp;$count)
{
$count++;
  return "$count: " . strrev($job-&gt;workload());
}

?&gt;

     La ejecución de un cliente que envía 2 trabajos para la función reverse mostrará
     algo como:

1: olleh
2: dlrow

### Ver también

    - [GearmanClient::do()](#gearmanclient.do) - Ejecuta una sola tarea y retorna el resultado [obsoleto]

# GearmanWorker::addOptions

(PECL gearman &gt;= 0.6.0)

GearmanWorker::addOptions — Añadir opciones al trabajador

### Descripción

public **GearmanWorker::addOptions**([int](#language.types.integer) $option): [true](#language.types.singleton)

Añade una o varias opciones al trabajador.

### Parámetros

     option


       Las opciones a añadir





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ver también

    - [GearmanWorker::options()](#gearmanworker.options) - Obtiene las opciones del agente

    - [GearmanClient::setOptions()](#gearmanclient.setoptions) - Define las opciones del cliente

    - [GearmanClient::removeOptions()](#gearmanclient.removeoptions) - Elimina las opciones del cliente

# GearmanWorker::addServer

(PECL gearman &gt;= 0.5.0)

GearmanWorker::addServer — Añade un servidor de trabajos

### Descripción

public **GearmanWorker::addServer**([string](#language.types.string) $host = **[null](#constant.null)**, [int](#language.types.integer) $port = 0, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)

Añade un servidor de trabajos a este agente. Será añadido a una lista de
servidores a utilizar para ejecutar los trabajos.
No se realiza ninguna operación de I/O de socket aquí.

### Parámetros

     host


       El nombre de host del servidor de trabajos.






     port


       El puerto del servidor de trabajos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Añadir servidores Gearman**

&lt;?php
$worker= new GearmanWorker();
$worker-&gt;addServer("10.0.0.1");
$worker-&gt;addServer("10.0.0.2", 7003);
?&gt;

### Ver también

    - [GearmanWorker::addServers()](#gearmanworker.addservers) - Añade múltiples servidores de trabajos

# GearmanWorker::addServers

(PECL gearman &gt;= 0.5.0)

GearmanWorker::addServers — Añade múltiples servidores de trabajos

### Descripción

public **GearmanWorker::addServers**([string](#language.types.string) $servers = **[null](#constant.null)**, [bool](#language.types.boolean) $setupExceptionHandler = **[true](#constant.true)**): [bool](#language.types.boolean)

Añade uno o múltiples servidores de trabajos al agente.
Serán añadidos a una lista de servidores que podrán
ser utilizados para ejecutar trabajos. No se realiza
ninguna operación de I/O de socket aquí.

### Parámetros

     servers


       Una lista de servidores de trabajos separados por comas, en formato
       host:port. Si el puerto no se especifica, se utilizará el valor por omisión
       4730.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Añadir 2 servidores de trabajos**

&lt;?php

$worker= new GearmanWorker();
$worker-&gt;addServers("10.0.0.1,10.0.0.2:7003");

?&gt;

### Ver también

    - [GearmanWorker::addServer()](#gearmanworker.addserver) - Añade un servidor de trabajos

# GearmanWorker::clone

(PECL gearman &gt;= 0.5.0)

GearmanWorker::clone — Crea una copia del trabajador

### Descripción

public **GearmanWorker::clone**(): [void](language.types.void.html)

Crea una copia del trabajador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [GearmanWorker](#class.gearmanworker)

# GearmanWorker::\_\_construct

(PECL gearman &gt;= 0.5.0)

GearmanWorker::\_\_construct — Crea una instancia GearmanWorker

### Descripción

public **GearmanWorker::\_\_construct**()

Crea una nueva instancia de [GearmanWorker](#class.gearmanworker)
que representa un agente que se conecta al servidor de trabajos y acepta
tareas a ejecutar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [GearmanWorker](#class.gearmanworker).

### Ver también

    - [GearmanWorker::clone()](#gearmanworker.clone) - Crea una copia del trabajador

# GearmanWorker::echo

(PECL gearman &gt;= 0.6.0)

GearmanWorker::echo — Comprueba la respuesta de un servidor de trabajo

### Descripción

public **GearmanWorker::echo**([string](#language.types.string) $workload): [bool](#language.types.boolean)

Envía datos a todos los servidores de trabajo para comprobar si los retornan. Esta es
una función de prueba para ver si los servidores de trabajo están respondiendo de
forma adecuada.

### Parámetros

     workload


       Datos arbitrarios serializados





### Valores devueltos

Valor de retorno estándar de Gearman.

### Ver también

    - [GearmanClient::echo()](#gearmanclient.echo) - Envía datos a todos los servidores de trabajo para ver si retornan [obsoleto]

# GearmanWorker::error

(PECL gearman &gt;= 0.5.0)

GearmanWorker::error — Obtiene el último error ocurrido

### Descripción

public **GearmanWorker::error**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el último error ocurrido, en forma de [string](#language.types.string).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una [string](#language.types.string) legible por humanos que representa el último error ocurrido,
o **[false](#constant.false)** si no hay mensaje de error disponible.

### Ver también

    - [GearmanWorker::getErrno()](#gearmanworker.geterrno) - Obtiene el valor de errno

# GearmanWorker::getErrno

(PECL gearman &gt;= 0.5.0)

GearmanWorker::getErrno — Obtiene el valor de errno

### Descripción

public **GearmanWorker::getErrno**(): [int](#language.types.integer)

Devuelve el valor de errno en caso de que el valor de retorno
sea GEARMAN_ERRNO.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor errno válido.

### Ver también

    - [GearmanWorker::error()](#gearmanworker.error) - Obtiene el último error ocurrido

# GearmanWorker::options

(PECL gearman &gt;= 0.6.0)

GearmanWorker::options — Obtiene las opciones del agente

### Descripción

public **GearmanWorker::options**(): [int](#language.types.integer)

Obtiene las opciones previamente definidas para el agente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Las opciones actualmente definidas para el agente.

### Ver también

    - [GearmanWorker::setOptions()](#gearmanworker.setoptions) - Define las opciones del trabajador

# GearmanWorker::register

(PECL gearman &gt;= 0.6.0)

GearmanWorker::register — Registra una función en un servidor de trabajos

### Descripción

public **GearmanWorker::register**([string](#language.types.string) $function_name, [int](#language.types.integer) $timeout = 0): [bool](#language.types.boolean)

Se registra un nombre de función con un servidor de trabajos con un tiempo máximo de ejecución opcional.
Este tiempo especifica el número de segundos que el servidor debe esperar antes de marcar una tarea como fallida.
Si este tiempo se establece en cero, no habrá ningún límite.

### Parámetros

     function_name


       El nombre de la función a registrar con el servidor de trabajos.






     timeout


       Un intervalo de tiempo, en segundos.





### Valores devueltos

Un valor de retorno estándar de Gearman.

### Ver también

    - [GearmanWorker::unregister()](#gearmanworker.unregister) - Elimina una función de los servidores de trabajos

    - [GearmanWorker::unregisterAll()](#gearmanworker.unregisterall) - Elimina todas las funciones de los servidores de trabajos

# GearmanWorker::removeOptions

(PECL gearman &gt;= 0.6.0)

GearmanWorker::removeOptions — Elimina opciones del agente

### Descripción

public **GearmanWorker::removeOptions**([int](#language.types.integer) $option): [true](#language.types.singleton)

Elimina una o varias opciones del agente.

### Parámetros

     option


       Las opciones a eliminar





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ver también

    - [GearmanWorker::options()](#gearmanworker.options) - Obtiene las opciones del agente

    - [GearmanWorker::setOptions()](#gearmanworker.setoptions) - Define las opciones del trabajador

    - [GearmanWorker::addOptions()](#gearmanworker.addoptions) - Añadir opciones al trabajador

# GearmanWorker::returnCode

(PECL gearman &gt;= 0.5.0)

GearmanWorker::returnCode — Obtiene el último código Gearman devuelto

### Descripción

public **GearmanWorker::returnCode**(): [int](#language.types.integer)

Devuelve el último código Gearman devuelto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un código de retorno Gearman válido.

### Ver también

    - [GearmanWorker::error()](#gearmanworker.error) - Obtiene el último error ocurrido

    - [GearmanWorker::getErrno()](#gearmanworker.geterrno) - Obtiene el valor de errno

# GearmanWorker::setId

(No version information available, might only be in Git)

GearmanWorker::setId — Define un identificador para el worker

### Descripción

public **GearmanWorker::setId**([string](#language.types.string) $id): [bool](#language.types.boolean)

Asigna un identificador al worker, permitiendo así que pueda ser identificado cuando
gearman solicita la lista de workers disponibles.

### Parámetros

    id


      Un identificador.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con GearmanWorker::setId()**

    Define un identificador para un worker simple.

&lt;?php
$worker= new GearmanWorker();
$worker-&gt;setId('test');
?&gt;

Resultado del ejemplo anterior es similar a:

Run the following command:
gearadmin --workers

Output:
30 ::3a3a:3361:3361:3a33%976303667 - : test

# GearmanWorker::setOptions

(PECL gearman &gt;= 0.5.0)

GearmanWorker::setOptions — Define las opciones del trabajador

### Descripción

public **GearmanWorker::setOptions**([int](#language.types.integer) $option): [true](#language.types.singleton)

Define una o más opciones del trabajador.

### Parámetros

     option


       Las opciones a definir.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ver también

    - [GearmanWorker::options()](#gearmanworker.options) - Obtiene las opciones del agente

    - [GearmanWorker::addOptions()](#gearmanworker.addoptions) - Añadir opciones al trabajador

    - [GearmanWorker::removeOptions()](#gearmanworker.removeoptions) - Elimina opciones del agente

    - [GearmanClient::setOptions()](#gearmanclient.setoptions) - Define las opciones del cliente

# GearmanWorker::setTimeout

(PECL gearman &gt;= 0.6.0)

GearmanWorker::setTimeout — Define el tiempo de espera máximo de actividad del socket I/O

### Descripción

public **GearmanWorker::setTimeout**([int](#language.types.integer) $timeout): [true](#language.types.singleton)

Define el intervalo de tiempo para esperar actividad del socket I/O.

### Parámetros

     timeout


       Un intervalo de tiempo, en milisegundos. Un valor negativo indica
       que el tiempo de espera será infinito.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Un agente simple que espera 5 segundos**

&lt;?php

echo "Inicio\n";

# Crea un nuevo agente.

$gmworker= new GearmanWorker();

# Añade un servidor por omisión (localhost).

$gmworker-&gt;addServer();

# Registra una función "reverse" con el servidor.

$gmworker-&gt;addFunction("reverse", "reverse_fn");

# Define el tiempo de espera a 5 segundos

$gmworker-&gt;setTimeout(5000);

echo "Esperando trabajo...\n";
while(@$gmworker-&gt;work() || $gmworker-&gt;returnCode() == GEARMAN_TIMEOUT)
{
  if ($gmworker-&gt;returnCode() == GEARMAN_TIMEOUT)
{ # Normalmente, debería realizarse alguna tarea útil aquí...
echo "Tiempo de espera expirado. Esperando el próximo trabajo...\n";
continue;
}

if ($gmworker-&gt;returnCode() != GEARMAN_SUCCESS)
{
echo "return_code: " . $gmworker-&gt;returnCode() . "\n";
break;
}
}

echo "Hecho\n";

function reverse_fn($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

     La ejecución de un agente sin ningún trabajo enviado generará una salida
     que se asemejará a algo como:

Inicio
Esperando trabajo...
Tiempo de espera expirado. Esperando el próximo trabajo...
Tiempo de espera expirado. Esperando el próximo trabajo...
Tiempo de espera expirado. Esperando el próximo trabajo...

### Ver también

    - [GearmanWorker::timeout()](#gearmanworker.timeout) - Obtiene el tiempo de espera de la actividad del socket I/O

# GearmanWorker::timeout

(PECL gearman &gt;= 0.6.0)

GearmanWorker::timeout — Obtiene el tiempo de espera de la actividad del socket I/O

### Descripción

public **GearmanWorker::timeout**(): [int](#language.types.integer)

Devuelve el tiempo de espera actual, en milisegundos, de la actividad
del socket I/O.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un período de tiempo, en milisegundos. Un valor negativo indica
que el tiempo de espera es infinito.

### Ver también

    - [GearmanWorker::setTimeout()](#gearmanworker.settimeout) - Define el tiempo de espera máximo de actividad del socket I/O

# GearmanWorker::unregister

(PECL gearman &gt;= 0.6.0)

GearmanWorker::unregister — Elimina una función de los servidores de trabajos

### Descripción

public **GearmanWorker::unregister**([string](#language.types.string) $function_name): [bool](#language.types.boolean)

Elimina una función de los servidores de trabajos, haciendo que ningún trabajo
sea enviado al agente para esta función.

### Parámetros

     function_name


       El nombre de una función a eliminar del servidor de trabajos.





### Valores devueltos

Un valor de retorno estándar de Gearman.

### Ver también

    - [GearmanWorker::register()](#gearmanworker.register) - Registra una función en un servidor de trabajos

    - [GearmanWorker::unregisterAll()](#gearmanworker.unregisterall) - Elimina todas las funciones de los servidores de trabajos

# GearmanWorker::unregisterAll

(PECL gearman &gt;= 0.6.0)

GearmanWorker::unregisterAll — Elimina todas las funciones de los servidores de trabajos

### Descripción

public **GearmanWorker::unregisterAll**(): [bool](#language.types.boolean)

Elimina todas las funciones previamente registradas, asegurando así
que ningún trabajo será enviado al agente con estas funciones.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor de retorno estándar de Gearman.

### Ver también

    - [GearmanWorker::register()](#gearmanworker.register) - Registra una función en un servidor de trabajos

    - [GearmanWorker::unregister()](#gearmanworker.unregister) - Elimina una función de los servidores de trabajos

# GearmanWorker::wait

(PECL gearman &gt;= 0.6.0)

GearmanWorker::wait — Espera una actividad de uno o varios servidores de trabajos

### Descripción

public **GearmanWorker::wait**(): [bool](#language.types.boolean)

Pone a espera al agente de una actividad de uno o varios servidores de trabajos durante
un funcionamiento en modo I/O no bloqueante. En caso de fallo, se emitirá una advertencia de nivel
**[E_WARNING](#constant.e-warning)** con el contenido del último error Gearman ocurrido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejecutar un agente en modo no bloqueante**

&lt;?php

echo "Inicio\n";

# Crea un nuevo agente

$worker= new GearmanWorker();

# Hace al agente no bloqueante

$worker-&gt;addOptions(GEARMAN_WORKER_NON_BLOCKING);

# Añade un servidor por defecto (localhost, puerto 4730)

$worker-&gt;addServer();

# Añade una función "reverse"

$worker-&gt;addFunction('reverse', 'reverse_fn');

# Intenta obtener un trabajo

while (@$worker-&gt;work() ||
       $worker-&gt;returnCode() == GEARMAN_IO_WAIT ||
       $worker-&gt;returnCode() == GEARMAN_NO_JOBS)
{
  if ($worker-&gt;returnCode() == GEARMAN_SUCCESS)
continue;

echo "Esperando el primer trabajo...\n";
if (!@$worker-&gt;wait())
  {
    if ($worker-&gt;returnCode() == GEARMAN_NO_ACTIVE_FDS)
{ # No estamos conectados a ningún servidor; por lo tanto, esperamos un poco # antes de intentar una reconexión.
sleep(5);
continue;
}
break;
}
}

echo "Error del agente: " . $worker-&gt;error() . "\n";

function reverse_fn($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

### Ver también

    - [GearmanWorker::work()](#gearmanworker.work) - Atender y ejecutar un trabajo

# GearmanWorker::work

(PECL gearman &gt;= 0.5.0)

GearmanWorker::work — Atender y ejecutar un trabajo

### Descripción

public **GearmanWorker::work**(): [bool](#language.types.boolean)

Espera un trabajo y llama a la función de devolución de llamada correspondiente.
Emite una advertencia de tipo **[E_WARNING](#constant.e-warning)** que contiene
el último error de Gearman si el código devuelto no es una
de las siguientes constantes: **[GEARMAN_SUCCESS](#constant.gearman-success)**, **[GEARMAN_IO_WAIT](#constant.gearman-io-wait)**,
o **[GEARMAN_WORK_FAIL](#constant.gearman-work-fail)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con GearmanWorker::work()**

&lt;?php

# Crea un agente

$worker = new GearmanWorker();

# Añade un servidor de trabajos por omisión (localhost)

$worker-&gt;addServer();

# Añade la función "reverse"

$worker-&gt;addFunction("reverse", "my_reverse_function");

# Inicia la escucha del agente para obtener un trabajo

while ($worker-&gt;work());

function my_reverse_function($job)
{
  return strrev($job-&gt;workload());
}

?&gt;

### Ver también

    - [GearmanWorker::addFunction()](#gearmanworker.addfunction) - Registra y añade una función de retrollamada

## Tabla de contenidos

- [GearmanWorker::addFunction](#gearmanworker.addfunction) — Registra y añade una función de retrollamada
- [GearmanWorker::addOptions](#gearmanworker.addoptions) — Añadir opciones al trabajador
- [GearmanWorker::addServer](#gearmanworker.addserver) — Añade un servidor de trabajos
- [GearmanWorker::addServers](#gearmanworker.addservers) — Añade múltiples servidores de trabajos
- [GearmanWorker::clone](#gearmanworker.clone) — Crea una copia del trabajador
- [GearmanWorker::\_\_construct](#gearmanworker.construct) — Crea una instancia GearmanWorker
- [GearmanWorker::echo](#gearmanworker.echo) — Comprueba la respuesta de un servidor de trabajo
- [GearmanWorker::error](#gearmanworker.error) — Obtiene el último error ocurrido
- [GearmanWorker::getErrno](#gearmanworker.geterrno) — Obtiene el valor de errno
- [GearmanWorker::options](#gearmanworker.options) — Obtiene las opciones del agente
- [GearmanWorker::register](#gearmanworker.register) — Registra una función en un servidor de trabajos
- [GearmanWorker::removeOptions](#gearmanworker.removeoptions) — Elimina opciones del agente
- [GearmanWorker::returnCode](#gearmanworker.returncode) — Obtiene el último código Gearman devuelto
- [GearmanWorker::setId](#gearmanworker.setid) — Define un identificador para el worker
- [GearmanWorker::setOptions](#gearmanworker.setoptions) — Define las opciones del trabajador
- [GearmanWorker::setTimeout](#gearmanworker.settimeout) — Define el tiempo de espera máximo de actividad del socket I/O
- [GearmanWorker::timeout](#gearmanworker.timeout) — Obtiene el tiempo de espera de la actividad del socket I/O
- [GearmanWorker::unregister](#gearmanworker.unregister) — Elimina una función de los servidores de trabajos
- [GearmanWorker::unregisterAll](#gearmanworker.unregisterall) — Elimina todas las funciones de los servidores de trabajos
- [GearmanWorker::wait](#gearmanworker.wait) — Espera una actividad de uno o varios servidores de trabajos
- [GearmanWorker::work](#gearmanworker.work) — Atender y ejecutar un trabajo

# La clase GearmanException

(PECL gearman &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

     ****


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

    /* Métodos */


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

- [Introducción](#intro.gearman)
- [Instalación/Configuración](#gearman.setup)<li>[Requerimientos](#gearman.requirements)
- [Instalación](#gearman.installation)
  </li>- [Constantes predefinidas](#gearman.constants)
- [Ejemplos](#gearman.examples)<li>[Uso básico](#gearman.examples-reverse)
- [Cliente y trabajador básicos en Gearman, trabajo en segundo plano](#gearman.examples-reverse-bg)
- [Cliente y trabajador básicos, enviando tareas](#gearman.examples-reverse-task)
  </li>- [GearmanClient](#class.gearmanclient) — La clase GearmanClient<li>[GearmanClient::addOptions](#gearmanclient.addoptions) — Añade opciones al cliente
- [GearmanClient::addServer](#gearmanclient.addserver) — Añade un servidor de tareas al cliente
- [GearmanClient::addServers](#gearmanclient.addservers) — Añade una lista de servidores de tareas al cliente
- [GearmanClient::addTask](#gearmanclient.addtask) — Añade una tarea para ser ejecutada en paralelo
- [GearmanClient::addTaskBackground](#gearmanclient.addtaskbackground) — Añade una tarea de fondo para su ejecución en paralelo
- [GearmanClient::addTaskHigh](#gearmanclient.addtaskhigh) — Añade una tarea de alta prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskHighBackground](#gearmanclient.addtaskhighbackground) — Añade una tarea de fondo de alta prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskLow](#gearmanclient.addtasklow) — Añade una tarea de baja prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskLowBackground](#gearmanclient.addtasklowbackground) — Añade una tarea de fondo de baja prioridad para ser ejecutada en paralelo
- [GearmanClient::addTaskStatus](#gearmanclient.addtaskstatus) — Añade una tarea para obtener el estado
- [GearmanClient::clearCallbacks](#gearmanclient.clearcallbacks) — Elimina todas las funciones de retrollamada de las tareas
- [GearmanClient::clone](#gearmanclient.clone) — Crea una copia de un objeto GearmanClient
- [GearmanClient::\_\_construct](#gearmanclient.construct) — Crea una instancia GearmanClient
- [GearmanClient::context](#gearmanclient.context) — Recupera el contexto de la aplicación
- [GearmanClient::data](#gearmanclient.data) — Retorna los datos de aplicación (obsoleto)
- [GearmanClient::do](#gearmanclient.do) — Ejecuta una sola tarea y retorna el resultado [obsoleto]
- [GearmanClient::doBackground](#gearmanclient.dobackground) — Ejecuta una tarea en segundo plano
- [GearmanClient::doHigh](#gearmanclient.dohigh) — Ejecuta una sola tarea con prioridad alta
- [GearmanClient::doHighBackground](#gearmanclient.dohighbackground) — Ejecuta una tarea con prioridad alta en segundo plano
- [GearmanClient::doJobHandle](#gearmanclient.dojobhandle) — Obtiene el manejador de trabajos para la tarea en curso
- [GearmanClient::doLow](#gearmanclient.dolow) — Ejecuta una sola tarea con prioridad baja
- [GearmanClient::doLowBackground](#gearmanclient.dolowbackground) — Ejecuta una tarea en prioridad baja en segundo plano
- [GearmanClient::doNormal](#gearmanclient.donormal) — Ejecuta una tarea y devuelve el resultado
- [GearmanClient::doStatus](#gearmanclient.dostatus) — Recupera el estado de la tarea en curso
- [GearmanClient::echo](#gearmanclient.echo) — Envía datos a todos los servidores de trabajo para ver si retornan [obsoleto]
- [GearmanClient::error](#gearmanclient.error) — Devuelve el último error encontrado en forma de string
- [GearmanClient::getErrno](#gearmanclient.geterrno) — Obtiene el valor de errno
- [GearmanClient::jobStatus](#gearmanclient.jobstatus) — Recupera el estado de un trabajo en segundo plano
- [GearmanClient::ping](#gearmanclient.ping) — Envío de datos a todos los servidores de tareas para verificar que siguen en funcionamiento
- [GearmanClient::removeOptions](#gearmanclient.removeoptions) — Elimina las opciones del cliente
- [GearmanClient::returnCode](#gearmanclient.returncode) — Obtiene el último código Gearman devuelto
- [GearmanClient::runTasks](#gearmanclient.runtasks) — Ejecuta una lista de tareas en paralelo
- [GearmanClient::setClientCallback](#gearmanclient.setclientcallback) — Define una función de retrollamada cuando se recibe un paquete de datos para una tarea (obsoleto)
- [GearmanClient::setCompleteCallback](#gearmanclient.setcompletecallback) — Define una función a llamar una vez finalizada la tarea
- [GearmanClient::setContext](#gearmanclient.setcontext) — Define el contexto de una aplicación
- [GearmanClient::setCreatedCallback](#gearmanclient.setcreatedcallback) — Define una función de retrollamada a llamar cuando una tarea es colocada en la cola
- [GearmanClient::setData](#gearmanclient.setdata) — Establece los datos de aplicación (obsoleto)
- [GearmanClient::setDataCallback](#gearmanclient.setdatacallback) — Define una función de retrollamada a llamar cuando se recibe un paquete de datos para una tarea
- [GearmanClient::setExceptionCallback](#gearmanclient.setexceptioncallback) — Define una función de retrollamada para las excepciones emitidas por el agente
- [GearmanClient::setFailCallback](#gearmanclient.setfailcallback) — Define una función de retrollamada a llamar cuando un trabajo falla
- [GearmanClient::setOptions](#gearmanclient.setoptions) — Define las opciones del cliente
- [GearmanClient::setStatusCallback](#gearmanclient.setstatuscallback) — Define una función de retorno para recolectar los estados de una tarea
- [GearmanClient::setTimeout](#gearmanclient.settimeout) — Establece el tiempo de espera de una actividad del socket I/O
- [GearmanClient::setWarningCallback](#gearmanclient.setwarningcallback) — Define una función de retrollamada al emitir una alerta desde el agente
- [GearmanClient::setWorkloadCallback](#gearmanclient.setworkloadcallback) — Define una función de retrollamada al recibir actualizaciones de datos incrementales
- [GearmanClient::timeout](#gearmanclient.timeout) — Obtiene el valor del tiempo de espera de actividad del socket I/O
- [GearmanClient::wait](#gearmanclient.wait) — Espera la actividad de E/S en todas las conexiones de un cliente
  </li>- [GearmanJob](#class.gearmanjob) — La clase GearmanJob<li>[GearmanJob::complete](#gearmanjob.complete) — Envía el resultado y el estado completo (obsoleto)
- [GearmanJob::\_\_construct](#gearmanjob.construct) — Crea una instancia de GearmanJob
- [GearmanJob::data](#gearmanjob.data) — Envía datos para un trabajo en ejecución (obsoleto)
- [GearmanJob::exception](#gearmanjob.exception) — Envía una excepción para un trabajo en ejecución (obsoleto)
- [GearmanJob::fail](#gearmanjob.fail) — Envía el estado de fallo (obsoleto)
- [GearmanJob::functionName](#gearmanjob.functionname) — Obtiene el nombre de la función
- [GearmanJob::handle](#gearmanjob.handle) — Obtiene el manejador de trabajos
- [GearmanJob::returnCode](#gearmanjob.returncode) — Obtiene el último código devuelto
- [GearmanJob::sendComplete](#gearmanjob.sendcomplete) — Envía el resultado junto con el estado completo
- [GearmanJob::sendData](#gearmanjob.senddata) — Envía los datos para un trabajo en ejecución
- [GearmanJob::sendException](#gearmanjob.sendexception) — Envía una excepción para un trabajo en ejecución
- [GearmanJob::sendFail](#gearmanjob.sendfail) — Envía un estado de fallo
- [GearmanJob::sendStatus](#gearmanjob.sendstatus) — Envía un estado
- [GearmanJob::sendWarning](#gearmanjob.sendwarning) — Envía una alerta
- [GearmanJob::setReturn](#gearmanjob.setreturn) — Define un valor de retorno
- [GearmanJob::status](#gearmanjob.status) — Envía el estado (obsoleto)
- [GearmanJob::unique](#gearmanjob.unique) — Obtiene el identificador único
- [GearmanJob::warning](#gearmanjob.warning) — Envía un aviso (obsoleto)
- [GearmanJob::workload](#gearmanjob.workload) — Obtiene la carga de trabajo
- [GearmanJob::workloadSize](#gearmanjob.workloadsize) — Obtiene el tamaño de la carga de trabajo
  </li>- [GearmanTask](#class.gearmantask) — La clase GearmanTask<li>[GearmanTask::__construct](#gearmantask.construct) — Crea una instancia GearmanTask
- [GearmanTask::create](#gearmantask.create) — Crea una tarea (deprecado)
- [GearmanTask::data](#gearmantask.data) — Recupera los datos devueltos por una tarea
- [GearmanTask::dataSize](#gearmantask.datasize) — Obtiene el tamaño de los datos devueltos
- [GearmanTask::function](#gearmantask.function) — Obtiene el nombre de la función asociada (obsoleto)
- [GearmanTask::functionName](#gearmantask.functionname) — Obtiene el nombre de la función asociada
- [GearmanTask::isKnown](#gearmantask.isknown) — Verifica si una tarea es conocida
- [GearmanTask::isRunning](#gearmantask.isrunning) — Verifica si la tarea está actualmente en funcionamiento
- [GearmanTask::jobHandle](#gearmantask.jobhandle) — Obtiene el manejador de trabajos
- [GearmanTask::recvData](#gearmantask.recvdata) — Lee el trabajo o los datos devueltos por una tarea en un buffer
- [GearmanTask::returnCode](#gearmantask.returncode) — Obtiene el último código devuelto
- [GearmanTask::sendData](#gearmantask.senddata) — Envía datos para una tarea (deprecado)
- [GearmanTask::sendWorkload](#gearmantask.sendworkload) — Envía los datos para una tarea
- [GearmanTask::taskDenominator](#gearmantask.taskdenominator) — Obtiene el denominador de la tasa de realización
- [GearmanTask::taskNumerator](#gearmantask.tasknumerator) — Obtiene el numerador de la tasa de realización
- [GearmanTask::unique](#gearmantask.unique) — Obtiene el identificador único de la tarea
- [GearmanTask::uuid](#gearmantask.uuid) — Recupera el identificador único para una tarea (obsoleto)
  </li>- [GearmanWorker](#class.gearmanworker) — La clase GearmanWorker<li>[GearmanWorker::addFunction](#gearmanworker.addfunction) — Registra y añade una función de retrollamada
- [GearmanWorker::addOptions](#gearmanworker.addoptions) — Añadir opciones al trabajador
- [GearmanWorker::addServer](#gearmanworker.addserver) — Añade un servidor de trabajos
- [GearmanWorker::addServers](#gearmanworker.addservers) — Añade múltiples servidores de trabajos
- [GearmanWorker::clone](#gearmanworker.clone) — Crea una copia del trabajador
- [GearmanWorker::\_\_construct](#gearmanworker.construct) — Crea una instancia GearmanWorker
- [GearmanWorker::echo](#gearmanworker.echo) — Comprueba la respuesta de un servidor de trabajo
- [GearmanWorker::error](#gearmanworker.error) — Obtiene el último error ocurrido
- [GearmanWorker::getErrno](#gearmanworker.geterrno) — Obtiene el valor de errno
- [GearmanWorker::options](#gearmanworker.options) — Obtiene las opciones del agente
- [GearmanWorker::register](#gearmanworker.register) — Registra una función en un servidor de trabajos
- [GearmanWorker::removeOptions](#gearmanworker.removeoptions) — Elimina opciones del agente
- [GearmanWorker::returnCode](#gearmanworker.returncode) — Obtiene el último código Gearman devuelto
- [GearmanWorker::setId](#gearmanworker.setid) — Define un identificador para el worker
- [GearmanWorker::setOptions](#gearmanworker.setoptions) — Define las opciones del trabajador
- [GearmanWorker::setTimeout](#gearmanworker.settimeout) — Define el tiempo de espera máximo de actividad del socket I/O
- [GearmanWorker::timeout](#gearmanworker.timeout) — Obtiene el tiempo de espera de la actividad del socket I/O
- [GearmanWorker::unregister](#gearmanworker.unregister) — Elimina una función de los servidores de trabajos
- [GearmanWorker::unregisterAll](#gearmanworker.unregisterall) — Elimina todas las funciones de los servidores de trabajos
- [GearmanWorker::wait](#gearmanworker.wait) — Espera una actividad de uno o varios servidores de trabajos
- [GearmanWorker::work](#gearmanworker.work) — Atender y ejecutar un trabajo
  </li>- [GearmanException](#class.gearmanexception) — La clase GearmanException
