# Gestor de procesos FastCGI

# Introducción

FPM (FastCGI Process Manager, gestor de procesos FastCGI)
es una alternativa a la implementación PHP FastCGI con funcionalidades adicionales útiles para sitios muy altamente cargados.

Este SAPI está incluido en PHP.

# Instalación/Configuración

La información sobre la instalación y configuración de FPM se puede encontrar
en la sección de [instalación y configuración ](#install.fpm) del
manual de PHP.

# Observabilidad

## Tabla de contenidos

- [Página de estado](#fpm.status)

## Página de estado

Esta página proporciona información sobre la configuración y el contenido de la página de estado de FPM. Ver también
[fpm_get_status()](#function.fpm-get-status).

### Configuración

La página de estado de FPM puede activarse definiendo el parámetro
[pm.status_path](#pm.status-path)
en la configuración del grupo de FPM.

**Precaución**

    Por razones de seguridad, la página de estado de FPM debería limitarse a las peticiones internas o a las direcciones IP de clientes conocidas, ya que la página revela las URLs de las peticiones y la información sobre los recursos disponibles.

Según la configuración del servidor web, puede ser necesario configurar el servidor web para
permitir las peticiones directamente a esta ruta, omitiendo los scripts PHP. Un ejemplo de configuración
para Apache con FPM escuchando en UDS y pm.status_path establecido en
/fpm-status:

    &lt;LocationMatch "/fpm-status"&gt;

Order Allow,Deny
Allow from 127.0.0.1
ProxyPass "unix:/var/run/php-fpm.sock|fcgi://localhost/fpm-status"
&lt;/LocationMatch&gt;

Tras el recarga o reinicio de FPM y del servidor web, la página de estado estará accesible desde
el navegador (siempre que la petición provenga de una dirección IP autorizada si se ha configurado la restricción de IP).

### Parámetros de la petición

El formato de la página de estado puede modificarse especificando uno de los siguientes parámetros de petición:

- html

- json

- openmetrics

- xml

Información adicional también puede devolverse utilizando el parámetro de petición full.

Ejemplo de URL de página de estado:

- https://localhost/fpm-status
- Salida breve en el formato de texto por defecto

- https://localhost/fpm-status?full
- Resultados completos en el formato de texto por defecto

- https://localhost/fpm-status?json
- Resultado conciso en formato JSON

- https://localhost/fpm-status?html&amp;full
- Resultados completos en formato HTML

### Información mostrada

Los valores de fecha y hora utilizan el formato de marca de tiempo Unix en las salidas JSON y XML,
de lo contrario utilizan el formato resultante del siguiente ejemplo
"03/Jun/2021:07:21:46 +0100".

   <caption>**Información básica - Siempre mostrada en la página de estado**</caption>
   
    
     
      Parámetro
      Descripción


      pool
      El nombre del grupo de procesos FPM.



      proccess manager
      El tipo de gestor de procesos - estático, dinámico o bajo demanda.



      start time
      Fecha y hora del último inicio del grupo de procesos.



      start since
      Tiempo en segundos transcurrido desde el último inicio del grupo de procesos.



      accepted conn
      Número total de conexiones aceptadas.



      listen queue
      Número de peticiones (backlog) en espera de un proceso libre.



      max listen queue
      El número máximo de peticiones vistas en la cola en un momento dado.



      listen queue len
      Tamaño máximo permitido de la cola.



      idle processes
      Número de procesos actualmente inactivos (en espera de peticiones).



      active processes
      Número de procesos que actualmente están procesando peticiones.



      total processes
      Número total de procesos en curso.



      max active processes
      Número máximo de procesos activos simultáneamente.



      max children reached

       ¿Se ha alcanzado ya el número máximo de procesos? Si es así, el valor mostrado es
       mayor o igual a 1, de lo contrario el valor mostrado es 0.




      slow requests

       El número total de peticiones que han alcanzado el tiempo de espera configurado de
       request_slowlog_timeout.




      memory peak

       El pico de uso de memoria desde el inicio de FPM.



   <caption>**Información por proceso - mostrada únicamente en modo de salida completa (full)**</caption>
   
    
     
      Parámetro
      Descripción


      pid
      El PID del sistema del proceso.



      state
      El estado del proceso - Idle, Running, ...



      start time
      La fecha/hora en que el proceso comenzó.



      start since
      El número de segundos transcurridos desde el inicio del proceso.



      requests
      El número total de peticiones servidas.



      request duration
      El tiempo total en microsegundos pasados procesando peticiones.



      request method
      El método HTTP de la última petición servida.



      request uri

       La URI de la última petición servida (tras el procesamiento por el servidor web, puede seguir siendo
       /index.php si se utiliza un patrón de redirección del controlador frontal).




      content length
      La longitud del cuerpo de la petición, en bytes, de la última petición.



      user
      El usuario HTTP (PHP_AUTH_USER) de la última petición.



      script

       La ruta completa del script ejecutado por la última petición. Será
       '-' si no es aplicable (por ejemplo, las peticiones de la página de estado).




      last request cpu

       El %cpu de la última petición. Será 0 si el proceso no está en reposo ya que el
       cálculo se realiza cuando el procesamiento de la petición ha finalizado.
       El valor puede superar el 100%, ya que el indicador mostrará el porcentaje total del tiempo de CPU utilizado en la última petición -
       tiene en cuenta los procesos en todos los núcleos, mientras que el 100% es para un solo núcleo.




      last request memory

       La cantidad máxima de memoria consumida por la última petición. Este valor será 0 si el proceso
       no está en reposo, ya que el cálculo se realiza cuando el procesamiento de la petición ha finalizado.



**Nota**:

    Todos los valores son específicos del grupo y se reinician cuando se reinicia FPM.

**Nota**:

    El formato de salida OpenMetrics utiliza diferentes tipos de parámetros para adaptarse mejor al formato OpenMetrics.
    Los parámetros y las descripciones de sus valores están incluidos en la salida del formato OpenMetrics.

### Historial de cambios

      Versión
      Descripción






      8.1.0
      Se añadió el formato openmetrics.


# FPM Funciones

# fastcgi_finish_request

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

fastcgi_finish_request — Descarga todos los datos de la respuesta al cliente

### Descripción

**fastcgi_finish_request**(): [bool](#language.types.boolean)

Esta función descarga todos los datos de la respuesta al cliente y finaliza
la solicitud. Esto permite que las tareas que consumen tiempo se realicen sin
dejar la conexión con el cliente abierta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# fpm_get_status

(PHP 7 &gt;= 7.3, PHP 8)

fpm_get_status — Devuelve el estado actual del pool FPM

### Descripción

**fpm_get_status**(): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve el estado completo del pool de FPM en forma de un array asociativo. Siempre
devuelve el estado completo, incluyendo las informaciones de estado por proceso. Ver el manual de la
[página de estado FPM](#fpm.status) para más detalles.

Tenga en cuenta que esta función solo estará definida si FPM se utiliza para servir el script.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Array asociativo que contiene el estado completo del pool FPM, o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [fastcgi_finish_request](#function.fastcgi-finish-request) — Descarga todos los datos de la respuesta al cliente
- [fpm_get_status](#function.fpm-get-status) — Devuelve el estado actual del pool FPM

- [Introducción](#intro.fpm)
- [Instalación/Configuración](#fpm.setup)
- [Observabilidad](#fpm.observability)<li>[Página de estado](#fpm.status)
  </li>- [FPM Funciones](#ref.fpm)<li>[fastcgi_finish_request](#function.fastcgi-finish-request) — Descarga todos los datos de la respuesta al cliente
- [fpm_get_status](#function.fpm-get-status) — Devuelve el estado actual del pool FPM
  </li>
