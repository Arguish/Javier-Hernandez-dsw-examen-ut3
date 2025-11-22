# Opciones e Información de PHP

# Introducción

Estas funciones permiten obtener mucha información sobre PHP,
p.ej., configuración en tiempo de ejecución, extensiones en uso, versión, y mucho más.
También se pueden encontrar funciones para establecer opciones al ejecutar PHP.
Aquí se puede encontrar la función probablemente más conocida de PHP

- [phpinfo()](#function.phpinfo) -.

# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#info.configuration)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [assert.active](#ini.assert.active)
     "1"
     **[INI_ALL](#constant.ini-all)**

      Obsoleto a partir de PHP 8.3.0




     [assert.bail](#ini.assert.bail)
     "0"
     **[INI_ALL](#constant.ini-all)**

      Obsoleto a partir de PHP 8.3.0




     [assert.warning](#ini.assert.warning)
     "1"
     **[INI_ALL](#constant.ini-all)**

      Obsoleto a partir de PHP 8.3.0




     [assert.callback](#ini.assert.callback)
     NULL
     **[INI_ALL](#constant.ini-all)**

      Obsoleto a partir de PHP 8.3.0




     [assert.quiet_eval](#ini.assert.quiet-eval)
     "0"
     **[INI_ALL](#constant.ini-all)**
     Eliminado a partir de PHP 8.0.0



     [assert.exception](#ini.assert.exception)
     "1"
     **[INI_ALL](#constant.ini-all)**

      Anterior a PHP 8.0.0, el valor por defecto es "0"
      Obsoleto a partir de PHP 8.3.0




     [enable_dl](#ini.enable-dl)
     "1"
     **[INI_SYSTEM](#constant.ini-system)**
     Esta funcionalidad obsoleta *será*

ciertamente _eliminada_ en el futuro.

     [max_execution_time](#ini.max-execution-time)
     "30"
     **[INI_ALL](#constant.ini-all)**
      



     [max_input_time](#ini.max-input-time)
     "-1"
     **[INI_PERDIR](#constant.ini-perdir)**
      



     [max_input_nesting_level](#ini.max-input-nesting-level)
     "64"
     **[INI_PERDIR](#constant.ini-perdir)**
      



     [max_input_vars](#ini.max-input-vars)
     1000
     **[INI_PERDIR](#constant.ini-perdir)**
      



     [zend.enable_gc](#ini.zend.enable-gc)
     "1"
     **[INI_ALL](#constant.ini-all)**
      



     [zend.max_allowed_stack_size](#ini.zend.max-allowed-stack-size)
     "0"
     **[INI_SYSTEM](#constant.ini-system)**
     Disponible a partir de PHP 8.3.0.



     [zend.reserved_stack_size](#ini.zend.reserved-stack-size)
     "0"
     **[INI_SYSTEM](#constant.ini-system)**
     Disponible a partir de PHP 8.3.0.



     [fiber.stack_size](#ini.fiber.stack-size)
      
     **[INI_ALL](#constant.ini-all)**
     Disponible a partir de PHP 8.1.0.

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     assert.active
     [bool](#language.types.boolean)



      Activa las evaluaciones de tipo [assert()](#function.assert).
      [zend.assertions](#ini.zend.assertions) debería ser
      utilizado en su lugar para controlar el comportamiento de [assert()](#function.assert).



      **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

     assert.bail
     [bool](#language.types.boolean)



      Termina el script si una aserción falla.



      **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

     assert.warning
     [bool](#language.types.boolean)



      Emite una alerta PHP para cada aserción que falle.



      **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

     assert.callback
     [string](#language.types.string)



      Función definida por el programador, a llamar para cada
      aserción fallida.



      **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

     assert.quiet_eval
     [bool](#language.types.boolean)


     **Advertencia**

Esta característica ha sido _ELIMINADA_ a partir de PHP 8.0.0.

      Utiliza la configuración actual de [error_reporting()](#function.error-reporting)
      durante las evaluaciones de aserciones. Si está activada, ningún error es
      mostrado (error_reporting(0) implícito) durante la evaluación. Si está desactivada,
      los errores son mostrados según la configuración de
      [error_reporting()](#function.error-reporting)








     assert.exception
     [bool](#language.types.boolean)



      Lanza una excepción [AssertionError](#class.assertionerror) cuando una
      aserción falla.








      enable_dl
      [bool](#language.types.boolean)



      Esta directiva permite activar o desactivar
      la carga dinámica de extensiones PHP con la función PHP [dl()](#function.dl).




      La razón principal para desactivar este sistema es la seguridad.
      Con la carga dinámica, es posible eludir
      las restricciones impuestas por
      [open_basedir](#ini.open-basedir).








     max_execution_time
      [int](#language.types.integer)



      Establece el tiempo máximo de ejecución de un script,
      en segundos. Esto evita que los scripts en
      bucles infinitos saturen el servidor. La configuración por
      defecto es de 30 segundos. Cuando PHP
      funciona desde la [línea
      de comando](#features.commandline), el valor por defecto es 0.




      En sistemas no-Windows, el tiempo máximo de ejecución no se ve afectado por
      llamadas al sistema como [sleep()](#function.sleep).
      Consulte la función [set_time_limit()](#function.set-time-limit)
      para más detalles.




      El servidor web puede tener otras configuraciones de tiempo límite
      de ejecución que también pueden interrumpir PHP. Apache tiene una directiva
      Timeout e IIS tiene una función CGI para ello.
      Por defecto, ambas valen 300 segundos. Consulte
      la documentación del servidor web para más detalles.








     max_input_time
      [int](#language.types.integer)



      Esta opción especifica la duración máxima para analizar
      los datos de entrada, como POST y GET.
      Esta duración se mide desde el momento en que PHP es invocado en el
      servidor hasta el inicio de la ejecución del script.
      El valor por defecto es -1, lo que significa que
      [max_execution_time](#ini.max-execution-time)
      es utilizado en su lugar. Establecer el valor a 0 para permitir una ejecución ilimitada.








     max_input_nesting_level
     [int](#language.types.integer)



      Define la profundidad máxima de las
      [variables de entrada](#language.variables.external) (es decir,
      [$_GET](#reserved.variables.get), [$_POST](#reserved.variables.post)..)








     max_input_vars
     [int](#language.types.integer)



      El número de [variables de entrada](#language.variables.external)
      que pueden ser aceptadas (este límite se aplica a las variables
      superglobales $_GET, $_POST y $_COOKIE, por separado). El uso de esta directiva
      permite limitar las posibilidades de ataque por denegación de servicio
      utilizando colisiones de hash. Si hay más variables de entrada que el número especificado por esta directiva, una
      alerta de tipo **[E_WARNING](#constant.e-warning)** será emitida, y las
      variables adicionales serán eliminadas de la solicitud.








     zend.enable_gc
     [bool](#language.types.boolean)



      Activa o desactiva la recolección de referencias circulares.







     zend.max_allowed_stack_size
     [int](#language.types.integer)



      La cantidad máxima de memoria de pila nativa (stack) permitida por el
      sistema operativo para el programa.
      Intentar consumir más de lo que el sistema permite generalmente resulta
      en un fallo brusco, sin información de depuración
      fácilmente disponible.
      Para facilitar la depuración, el motor lanza una
      [Error](#class.error)
      antes de que esto ocurra (cuando el programa utiliza más de
      [zend.max_allowed_stack_size](#ini.zend.max-allowed-stack-size)-[zend.reserved_stack_size](#ini.zend.reserved-stack-size)
      bytes de pila).




      La recursión en el código definido por el usuario no consume
      pila nativa. Sin embargo, las funciones internas y los métodos mágicos, sí
      consumen pila nativa.
      Una recursión muy profunda que involucre estas funciones puede hacer que el programa
      agote toda la memoria de pila disponible.




      Los valores posibles para este parámetro son:



       -
        0 :
        Detectar automáticamente la memoria de pila nativa máxima que el sistema
        operativo permite para el programa.
        Este es el valor por defecto.
        Cuando la detección es imposible, se utiliza un valor por defecto del sistema.


       -
        -1 : Desactiva la verificación del tamaño de la pila en el motor.


       -
        Entero positivo : Un tamaño fijo, en bytes.
        Establecer este valor demasiado alto equivale a desactivar la verificación de la
        tamaño de la pila.





      Como el tamaño de pila
      [de las fibers](#language.fibers)
      está determinado por
      [fiber.stack_size](#ini.fiber.stack-size),
      el valor de este parámetro es utilizado en lugar de
      [zend.max_allowed_stack_size](#ini.zend.max-allowed-stack-size)
      durante la verificación del uso de la pila durante la ejecución de una Fiber.



     **Nota**:



       Esto no tiene ninguna relación con los desbordamientos de búfer de pila
       *(stack buffer overflows)*, y no es una funcionalidad de seguridad.









     zend.reserved_stack_size
     [int](#language.types.integer)



      El tamaño reservado de la pila, en bytes.
      Este se resta de la
      [tamaño máximo de pila permitido](#ini.zend.max-allowed-stack-size),
      como un margen de seguridad, durante la verificación del tamaño de la pila.




      Los valores posibles para este parámetro son:



       -
        0 : Detectar automáticamente un tamaño razonable.


       -
        Entero positivo : Un tamaño fijo, en bytes.









     fiber.stack_size
     [int](#language.types.integer)



      El tamaño de la pila nativa, en bytes, asignada a cada
      [Fiber](#language.fibers).




      El valor por defecto es de 1 Mio en sistemas donde el tamaño de los punteros
      es inferior a 8 bytes, o de 2 Mio en caso contrario.


# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

       Constantes
       Descripción


**Constantes predefinidas de [phpcredits()](#function.phpcredits)**

    **[CREDITS_GROUP](#constant.credits-group)**
    ([int](#language.types.integer))



     Una lista de los desarrolladores principales





    **[CREDITS_GENERAL](#constant.credits-general)**
    ([int](#language.types.integer))



     Créditos generales. Diseño del lenguaje, conceptos,
     autores de PHP y módulo SAPI.





    **[CREDITS_SAPI](#constant.credits-sapi)**
    ([int](#language.types.integer))



     Una lista de las API de servidores, y sus autores.





    **[CREDITS_MODULES](#constant.credits-modules)**
    ([int](#language.types.integer))



     Una lista de las extensiones de PHP, y sus autores





    **[CREDITS_DOCS](#constant.credits-docs)**
    ([int](#language.types.integer))



     Los créditos del equipo de documentación





    **[CREDITS_FULLPAGE](#constant.credits-fullpage)**
    ([int](#language.types.integer))



     Generalmente utilizado combinado con otras opciones. Esta
     opción indica que debe generarse una página HTML completa.





    **[CREDITS_QA](#constant.credits-qa)**
    ([int](#language.types.integer))



     Los créditos para el grupo de aseguramiento de calidad.





    **[CREDITS_ALL](#constant.credits-all)**
    ([int](#language.types.integer))



     Todos los créditos. Es el equivalente a: CREDITS_DOCS
     | CREDITS_GENERAL | CREDITS_GROUP | CREDITS_MODULES | CREDITS_QA
     | CREDITS_FULLPAGE. Genera una página HTML completa
     y autónoma. Es el valor por omisión.







       Constantes
       Descripción


**Constantes de [phpinfo()](#function.phpinfo)**

    **[INFO_GENERAL](#constant.info-general)**
    ([int](#language.types.integer))



     La línea de configuración, la ruta del php.ini, la fecha de
     compilación, el sistema y más.





    **[INFO_CREDITS](#constant.info-credits)**
    ([int](#language.types.integer))



     Créditos de PHP. Véase también [phpcredits()](#function.phpcredits).





    **[INFO_CONFIGURATION](#constant.info-configuration)**
    ([int](#language.types.integer))



     Valores locales y de servidor de las directivas PHP. Véase también
     [ini_get()](#function.ini-get).





    **[INFO_MODULES](#constant.info-modules)**
    ([int](#language.types.integer))



     Los módulos cargados y sus configuraciones respectivas.





    **[INFO_ENVIRONMENT](#constant.info-environment)**
    ([int](#language.types.integer))



     Las variables de entorno, que también están disponibles
     en [$_ENV](#reserved.variables.environment).





    **[INFO_VARIABLES](#constant.info-variables)**
    ([int](#language.types.integer))



     Todas las  [
     variables predefinidas](#language.variables.predefined) : EGPCS
     (Entorno, GET, POST, Cookie, Servidor).





    **[INFO_LICENSE](#constant.info-license)**
    ([int](#language.types.integer))



     La licencia de PHP. Véase también la
     [» FAQ de la licencia](https://www.php.net/license/).





    **[INFO_ALL](#constant.info-all)**
    ([int](#language.types.integer))



     Muestra todos los valores citados anteriormente. Es el valor
     por omisión.







       Constantes
       Descripción


**Constantes modo INI**

    **[INI_USER](#constant.ini-user)**
    ([int](#language.types.integer))



     Esta entrada puede ser definida en los scripts de usuario (como con [ini_set()](#function.ini-set))
     o en el [registro de Windows](#configuration.changes.windows).
     La entrada puede ser definida en el fichero .user.ini.





    **[INI_PERDIR](#constant.ini-perdir)**
    ([int](#language.types.integer))



     Esta entrada puede ser definida en el fichero php.ini, .htaccess, httpd.conf o .user.ini.





    **[INI_SYSTEM](#constant.ini-system)**
    ([int](#language.types.integer))



     Esta entrada puede ser definida en el fichero php.ini o httpd.conf.





    **[INI_ALL](#constant.ini-all)**
    ([int](#language.types.integer))



     Esta entrada puede ser definida en cualquier lugar.

Las constantes de aserciones sirven con la función
[assert_options()](#function.assert-options).

       Constantes
       Descripción


**Constantes de [assert()](#function.assert)**

    **[ASSERT_ACTIVE](#constant.assert-active)**
    ([int](#language.types.integer))



     Activa la evaluación [assert()](#function.assert).



    **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

    **[ASSERT_CALLBACK](#constant.assert-callback)**
    ([int](#language.types.integer))



     Función de retrollamada de aserciones fallidas.



    **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

    **[ASSERT_BAIL](#constant.assert-bail)**
    ([int](#language.types.integer))



     Termina la ejecución de aserciones fallidas.



    **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

    **[ASSERT_EXCEPTION](#constant.assert-exception)**
    ([int](#language.types.integer))



     Lanza una [AssertionError](#class.assertionerror) para cada aserción fallida.



    **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

    **[ASSERT_WARNING](#constant.assert-warning)**
    ([int](#language.types.integer))



     Emite una alerta PHP para cada aserción fallida.



    **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

    **[ASSERT_QUIET_EVAL](#constant.assert-quiet-eval)**
    ([int](#language.types.integer))



     Desactiva el error_reporting durante la evaluación
     de las expresiones de aserción.


**Advertencia**
Esta característica ha sido _ELIMINADA_ a partir de PHP 8.0.0.

Las constantes siguientes solo están disponibles si el sistema de
alojamiento es Windows, y pueden proporcionar información
sobre las versiones, lo que permite detectar la presencia
de funcionalidades. Están disponibles desde PHP 5.3.0.

       Constantes
       Descripción


**Constantes particulares a Windows**

    **[PHP_WINDOWS_VERSION_MAJOR](#constant.php-windows-version-major)**
    ([int](#language.types.integer))



     La versión mayor de Windows, que puede ser 4
     (NT4/Me/98/95), 5 (XP/2003 R2/2003/2000) o 6 (Vista/2008/7/8/8.1).





    **[PHP_WINDOWS_VERSION_MINOR](#constant.php-windows-version-minor)**
    ([int](#language.types.integer))



     La versión menor de Windows, que puede ser 0
     (Vista/2008/2000/NT4/95), 1 (XP), 2
     (2003 R2/2003/XP x64), 10 (98) o 90 (ME).





    **[PHP_WINDOWS_VERSION_BUILD](#constant.php-windows-version-build)**
    ([int](#language.types.integer))



     El número de compilación de Windows (por ejemplo,
     Windows Vista con SP1 tiene el número 6001)





    **[PHP_WINDOWS_VERSION_PLATFORM](#constant.php-windows-version-platform)**
    ([int](#language.types.integer))



     La plataforma que PHP utiliza actualmente: este valor puede ser
     2 en Windows Vista/XP/2000/NT4, Server 2008/2003 y
     en Windows ME/98/95 este valor es 1.





    **[PHP_WINDOWS_VERSION_SP_MAJOR](#constant.php-windows-version-sp-major)**
    ([int](#language.types.integer))



     La versión mayor del paquete de servicio instalado: este valor es
     0 si ningún paquete de servicio está disponible. Por
     ejemplo, Windows XP con el paquete de servicio 3 da el valor
     3 a esta constante.





    **[PHP_WINDOWS_VERSION_SP_MINOR](#constant.php-windows-version-sp-minor)**
    ([int](#language.types.integer))



     La versión menor del paquete de servicio instalado. Este valor es
     0 si ningún paquete de servicio está instalado.





    **[PHP_WINDOWS_VERSION_SUITEMASK](#constant.php-windows-version-suitemask)**
    ([int](#language.types.integer))



     La máscara es un campo de bits que permite conocer la presencia
     de diferentes funcionalidades de Windows. Vea la tabla a continuación
     para conocer los diferentes campos.





    **[PHP_WINDOWS_VERSION_PRODUCTTYPE](#constant.php-windows-version-producttype)**
    ([int](#language.types.integer))



     Esta constante contiene el valor utilizado para determinar
     el valor de las constantes
     PHP_WINDOWS_NT_*.
     Este valor puede ser una de las constantes
     PHP_WINDOWS_NT_*,
     indicando el tipo de plataforma.





    **[PHP_WINDOWS_NT_DOMAIN_CONTROLLER](#constant.php-windows-nt-domain-controller)**
    ([int](#language.types.integer))



     El controlador de dominio.





    **[PHP_WINDOWS_NT_SERVER](#constant.php-windows-nt-server)**
    ([int](#language.types.integer))



     Un servidor de sistema (ej. Server 2008/2003/2000). Tenga en cuenta que
     si es un controlador de dominio, se indica en
     **[PHP_WINDOWS_NT_DOMAIN_CONTROLLER](#constant.php-windows-nt-domain-controller)**.





    **[PHP_WINDOWS_NT_WORKSTATION](#constant.php-windows-nt-workstation)**
    ([int](#language.types.integer))



     Un puesto de trabajo (ej. Vista/XP/2000/NT4)

La tabla a continuación presenta las funcionalidades que pueden ser
verificadas en el campo de bits de la constante
**[PHP_WINDOWS_VERSION_SUITEMASK](#constant.php-windows-version-suitemask)**.

  <caption>**Campos de la máscara Windows**</caption>
  
   
    
     Bits
     Descripción


     0x00000004
     Los componentes Microsoft BackOffice están instalados.



     0x00000400
     Windows Server 2003, Web Edition está instalado.



     0x00004000
     Windows Server 2003, Compute Cluster Edition está instalado.



     0x00000080

      Windows Server 2008 Datacenter, Windows Server 2003, Datacenter Edition o
      Windows 2000 Datacenter Server está instalado.




     0x00000002

      Windows Server 2008 Enterprise, Windows Server 2003, Enterprise Edition,
      Windows 2000 Advanced Server, o Windows NT Server 4.0 Enterprise Edition
      está instalado.




     0x00000040
     Windows XP Embedded está instalado.



     0x00000200

      Windows Vista Home Premium, Windows Vista Home Basic, o Windows XP Home
      Edition está instalado.




     0x00000100

      Remote Desktop es soportado, pero solo una sesión interactiva es
      soportada. Este valor está presente, a menos que el sistema no funcione
      en modo servidor de aplicación.




     0x00000001

      Microsoft Small Business Server fue instalado en el sistema, pero
      fue actualizado a una nueva versión de Windows.




     0x00000020

      Microsoft Small Business Server está instalado con la licencia cliente
      restringida.




     0x00002000
     Windows Storage Server 2003 R2 o Windows Storage Server 2003 está instalado.



     0x00000010

      Terminal Services está instalado. Este valor siempre está activado. Si este
      valor está activado, pero 0x00000100 no lo está, entonces
      el sistema funciona en modo de servidor de aplicación.




     0x00008000
     Windows Home Server está instalado.

# Funciones de Opciones/Info de PHP

# assert

(PHP 4, PHP 5, PHP 7, PHP 8)

assert — Verifica una aserción

### Descripción

**assert**([mixed](#language.types.mixed) $assertion, [Throwable](#class.throwable)|[string](#language.types.string)|[null](#language.types.null) $description = **[null](#constant.null)**): [bool](#language.types.boolean)

**assert()**
permite definir expectativas: aserciones que tienen efecto
en los entornos de desarrollo y prueba, pero que están optimizadas
para no tener costo en producción.

Las aserciones pueden ser utilizadas para ayudar en la depuración.
Un caso de uso para las aserciones es servir como verificaciones de coherencia
para precondiciones que deberían siempre ser **[true](#constant.true)**, y si no lo son,
esto indica errores de programación.
Otro caso de uso es garantizar la presencia de ciertas funcionalidades tales como
funciones de extensión o ciertos límites y funcionalidades del sistema.

Como las aserciones pueden ser configuradas para ser eliminadas, no deben
_ser_ utilizadas para operaciones normales en tiempo de ejecución,
tales como verificaciones de parámetros de entrada. En general, el código debe comportarse
como se espera incluso si la verificación de aserciones está desactivada.

**assert()** verificará que la expectativa dada en
assertion sea satisfecha.
Si no lo es y por lo tanto el resultado es **[false](#constant.false)**, tomará la acción apropiada
según la configuración de **assert()**.

El comportamiento de **assert()** está dictado por los siguientes parámetros INI:

    <caption>**Assert Opciones de configuración**</caption>



       Nombre
       Por defecto
       Descripción
       Historial de cambios






       [zend.assertions](#ini.zend.assertions)
       1


         -
          1 : genera y ejecuta el código (modo desarrollo)


         -
          0 : genera el código pero lo evita en tiempo de ejecución


         -
          -1 : no genera el código (modo producción)







       [assert.active](#ini.assert.active)
       **[true](#constant.true)**

        Si **[false](#constant.false)**, **assert()** no verifica la expectativa
        y siempre devuelve **[true](#constant.true)**, sin condición.


        Deprecado a partir de PHP 8.3.0.




       [assert.callback](#ini.assert.callback)
       **[null](#constant.null)**


         Una función definida por el usuario a llamar cuando una aserción falla.
         Su firma debería ser:



          **assert_callback**(

    [string](#language.types.string) $file,
    [int](#language.types.integer) $line,
    [null](#language.types.null) $assertion,
    [string](#language.types.string) $description = ?
): [void](language.types.void.html)

         Anterior a PHP 8.0.0, la firma de la función de devolución de llamada debería ser:


**assert_callback**(
    [string](#language.types.string) $file,
    [int](#language.types.integer) $line,
    [string](#language.types.string) $assertion,
    [string](#language.types.string) $description = ?
): [void](language.types.void.html)

         Deprecado a partir de PHP 8.3.0.





       [assert.exception](#ini.assert.exception)
       **[true](#constant.true)**

        Si **[true](#constant.true)**, lanzará una [AssertionError](#class.assertionerror) si la expectativa no es cumplida.


        Deprecado a partir de PHP 8.3.0.




       [assert.bail](#ini.assert.bail)
       **[false](#constant.false)**

        Si **[true](#constant.true)**, interrumpirá la ejecución del script PHP si la expectativa no es cumplida.


        Deprecado a partir de PHP 8.3.0.




       [assert.warning](#ini.assert.warning)
       **[true](#constant.true)**

        Si **[true](#constant.true)**, emitirá un **[E_WARNING](#constant.e-warning)** si la expectativa no es cumplida.
        Este parámetro INI es ineficaz si
        [assert.exception](#ini.assert.exception)
        está activado.


        Deprecado a partir de PHP 8.3.0.





### Parámetros

     assertion


       Esta es cualquier expresión que devuelve un valor, que será ejecutada
       y cuyo resultado será utilizado para indicar si la aserción tuvo éxito o falló.




      **Advertencia**

        Anterior a PHP 8.0.0, si assertion era una
        [string](#language.types.string), era interpretada como código PHP y ejecutada vía
        [eval()](#function.eval).
        Esta cadena era pasada a la función de devolución de llamada como tercer argumento.
        Este comportamiento estaba *DEPRECADO* en PHP 7.2.0,
        y es *ELIMINADO* a partir de PHP 8.0.0







     description


       Si description es una instancia de
       [Throwable](#class.throwable), será lanzada únicamente si
       assertion es ejecutada y falla.


**Nota**:

         A partir de PHP 8.0.0, esto se hace *antes* de llamar
         a la función de devolución de llamada de aserción eventualmente definida




       **Nota**:



         A partir de PHP 8.0.0, el objeto [object](#language.types.object) será lanzado independientemente de la configuración de
         [assert.exception](#ini.assert.exception).




       **Nota**:



         A partir de PHP 8.0.0, el parámetro
         [assert.bail](#ini.assert.bail)
         no tiene ningún efecto en este caso.






       Si description es una [string](#language.types.string), este mensaje
       será utilizado si se emite una excepción o advertencia.
       Una descripción opcional, que será incluida en el mensaje de fallo si
       la assertion falla.




       Si description es omitido.

       Se crea una descripción por defecto equivalente al código fuente de la llamada a
       **assert()** en tiempo de compilación.





### Valores devueltos

**assert()** siempre devolverá **[true](#constant.true)** si al menos una de las siguientes condiciones es verdadera:

- zend.assertions=0

- zend.assertions=-1

- assert.active=0

- assert.exception=1

- assert.bail=1

- Un objeto de excepción personalizado es pasado a description.

Si ninguna de las condiciones es verdadera, **assert()** devolverá **[true](#constant.true)** si
assertion es verdadero, y **[false](#constant.false)** de lo contrario.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Todas las configuraciones INI assert. han sido depreciadas.




       8.0.0

        La función **assert()** ya no evaluará argumentos de tipo string,
        en su lugar, serán tratados como cualquier otro argumento.
        assert($a == $b) debería ser utilizado en lugar de assert('$a == $b').
        La directiva assert.quiet_eval php.ini y la constante **[ASSERT_QUIET_EVAL](#constant.assert-quiet-eval)**
        también han sido eliminadas, ya que no tendrían ningún efecto.




       8.0.0

        Si description es una instancia de
        [Throwable](#class.throwable), el objeto es lanzado si la aserción falla, independientemente del valor de
        [assert.exception](#ini.assert.exception).




       8.0.0

        Si description es una instancia de
        [Throwable](#class.throwable), ninguna función de devolución de llamada de usuario
        es llamada incluso si está definida.




       8.0.0

        Declarar una función que se llame assert() dentro
        de un espacio de nombres ya no es permitido, y genera
        una **[E_COMPILE_ERROR](#constant.e-compile-error)**.




       7.3.0

        Declarar una función que se llame assert() dentro
        de un espacio de nombres se ha depreciado. Tales
        declaraciones generan ahora una **[E_DEPRECATED](#constant.e-deprecated)**.




       7.2.0

        El uso de una [string](#language.types.string) como assertion se
        ha depreciado. Esto emite ahora una advertencia
        **[E_DEPRECATED](#constant.e-deprecated)** cuando
        [assert.active](#ini.assert.active) y
        [zend.assertions](#ini.zend.assertions) están
        ambos definidos a 1.





### Ejemplos

    **Ejemplo #1 Ejemplo de assert()**

&lt;?php
assert(1 &gt; 2);
echo '¡Hola!';
?&gt;

     Si las aserciones están activadas ([zend.assertions=1](#ini.zend.assertions))
     el ejemplo anterior mostraría:

Fatal error: Uncaught AssertionError: assert(1 &gt; 2) in example.php:2
Stack trace:
#0 example.php(2): assert(false, 'assert(1 &gt; 2)')
#1 {main}
thrown in example.php on line 2

     Si las aserciones están desactivadas (zend.assertions=0 o zend.assertions=-1)
     el ejemplo anterior mostraría:

¡Hola!

    **Ejemplo #2 Uso de un mensaje personalizado**

&lt;?php
assert(1 &gt; 2, "Se esperaba que uno fuera mayor que dos");
echo '¡Hola!';
?&gt;

     Si las aserciones están activadas, el ejemplo anterior mostraría:
     el ejemplo anterior mostraría:

Fatal error: Uncaught AssertionError: Se esperaba que uno fuera mayor que dos in example.php:2
Stack trace:
#0 example.php(2): assert(false, 'Se esperaba que uno...')
#1 {main}
thrown in example.php on line 2

     Si las aserciones están desactivadas, el ejemplo anterior mostraría:
     el ejemplo anterior mostraría:

¡Hola!

     **Ejemplo #3 Uso de una clase de excepción personalizada**



      &lt;?php
      class ArithmeticAssertionError extends AssertionError {}

      assert(1 &gt; 2, new ArithmeticAssertionError("Se esperaba que uno fuera mayor que dos"));
      echo '¡Hola!';



     Si las aserciones están activadas, el ejemplo anterior mostraría:
     el ejemplo anterior mostraría:

Fatal error: Uncaught ArithmeticAssertionError: Se esperaba que uno fuera mayor que dos in example.php:4
Stack trace:
#0 {main}
thrown in example.php on line 4

      Si las aserciones están desactivadas, el ejemplo anterior mostraría:





¡Hola!

### Ver también

    - [assert_options()](#function.assert-options) - Define/recupere diferentes opciones de aserciones

# assert_options

(PHP 4, PHP 5, PHP 7, PHP 8)

assert_options — Define/recupere diferentes opciones de aserciones

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**assert_options**([int](#language.types.integer) $option, [mixed](#language.types.mixed) $value = ?): [mixed](#language.types.mixed)

**assert_options()** permite modificar las diversas
opciones de la función [assert()](#function.assert), o simplemente
conocer la configuración actual.

**Nota**:

    El uso de **assert_options()** no se recomienda
    en favor de definir y recuperar las directivas php.ini
    [zend.assertions](#ini.zend.assertions) y
    [assert.exception](#ini.assert.exception) con
    [ini_set()](#function.ini-set) y [ini_get()](#function.ini-get), respectivamente.

### Parámetros

     option





        <caption>**Opciones de aserciones**</caption>



           Opción
           Directiva
           Valor por omisión
           Descripción






           ASSERT_ACTIVE
           assert.active
           1

            Activa la evaluación de la función [assert()](#function.assert)




           ASSERT_EXCEPTION
           assert.exception
           1
           Lanza una [AssertionError](#class.assertionerror) para cada aserción fallida



           ASSERT_WARNING
           assert.warning
           1
           Genera una alerta PHP para cada aserción falsa



           ASSERT_BAIL
           assert.bail
           0
           Termina la ejecución en caso de aserción falsa



           ASSERT_QUIET_EVAL
           assert.quiet_eval
           0

            Desactiva el informe de error durante la evaluación de una aserción. Eliminada a partir de PHP 8.0.0




           ASSERT_CALLBACK
           assert.callback
           (**[null](#constant.null)**)

            Función de devolución de llamada del usuario, para el tratamiento de aserciones falsas











     value


       Un nuevo valor, opcional, para la opción.




       La función de devolución de llamada definida mediante **[ASSERT_CALLBACK](#constant.assert-callback)** o
       [assert.callback](#ini.assert.callback)
       debería tener la siguiente firma:



        **assert_callback**(

    [string](#language.types.string) $file,
    [int](#language.types.integer) $line,
    [?](#language.types.null)[string](#language.types.string) $assertion,
    [string](#language.types.string) $description = ?
): [void](language.types.void.html)

         file


           El fichero donde [assert()](#function.assert) fue llamado.




         line


           La línea donde [assert()](#function.assert) fue llamado.




         assertion


           Antes de PHP 8.0.0, el primer parámetro de la función [assert()](#function.assert) era la aserción pasada,
           pero solo cuando la aserción se proporcionaba como string.
           (Si la aserción era una condición booleana, este parámetro era una cadena vacía.)
           A partir de PHP 8.0.0, este parámetro es siempre **[null](#constant.null)**.




         description


           La descripción que se proporcionó a [assert()](#function.assert).







### Valores devueltos

Devuelve el valor original de la opción.

### Errores/Excepciones

Si option no es una opción válida, se lanza
una [ValueError](#class.valueerror).

### Historial de cambios

       Versión
       Descripción






       8.3.0

        **assert_option()** ahora está obsoleto.




       8.0.0

        Si option no es una opción válida,
        se lanza una [ValueError](#class.valueerror).
        Anteriormente, se devolvía **[false](#constant.false)**.





### Ejemplos

**Ejemplo #1 Ejemplo con assert_options()**

&lt;?php
// Esta es nuestra función para manejar
// los errores de aserción
function assert_failure($file, $line, $assertion, $message)
{
echo "La aserción $assertion en $file en la línea $line ha fallado: $message";
}

// Esta es nuestra función de prueba
function test_assert($parameter)
{
    assert(is_bool($parameter));
}

// Define nuestras opciones de aserción
assert_options(ASSERT_ACTIVE, true);
assert_options(ASSERT_BAIL, true);
assert_options(ASSERT_WARNING, false);
assert_options(ASSERT_CALLBACK, 'assert_failure');

// Una aserción que debe fallar
test_assert(1);

// Esto nunca se alcanza, ya que ASSERT_BAIL
// es true
echo 'Nunca alcanzado';
?&gt;

### Ver también

    - [assert()](#function.assert) - Verifica una aserción

# cli_get_process_title

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

cli_get_process_title — Devuelve el título del proceso actual

### Descripción

**cli_get_process_title**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el título del proceso actual, tal como se definió mediante la función
[cli_set_process_title()](#function.cli-set-process-title). Tenga en cuenta que este título puede
ser ligeramente diferente al que se muestra mediante los comandos
**ps** y **top**, según el sistema subyacente.

Esta función solo está disponible en modo
[CLI](#features.commandline).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el título del proceso actual, en forma de
una cadena de caracteres, o **[null](#constant.null)** si ocurre un error.

### Errores/Excepciones

Se generará una advertencia de nivel **[E_WARNING](#constant.e-warning)** si el sistema
subyacente no es compatible.

### Ejemplos

    **Ejemplo #1 Ejemplo con cli_get_process_title()**

&lt;?php
echo "Título del proceso: " . cli_get_process_title() . "\n";
?&gt;

### Ver también

    - [cli_set_process_title()](#function.cli-set-process-title) - Define el título del proceso

# cli_set_process_title

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

cli_set_process_title — Define el título del proceso

### Descripción

**cli_set_process_title**([string](#language.types.string) $title): [bool](#language.types.boolean)

Define el título del proceso visible con herramientas como
**top** y **ps**. Esta función
solo está disponible en modo
[CLI](#features.commandline).

### Parámetros

    title


      El nuevo título


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se generará una alerta de nivel **[E_WARNING](#constant.e-warning)** si el sistema
subyacente no es compatible.

### Ejemplos

    **Ejemplo #1 Ejemplo con cli_set_process_title()**

&lt;?php
$title = "Mi super script PHP";
$pid = getmypid(); // puede utilizarse para ver el título del proceso en ps

if (!cli_set_process_title($title)) {
    echo "No se puede definir el título del proceso para el PID $pid...\n";
    exit(1);
} else {
    echo "¡El título del proceso '$title' para el PID $pid ha sido definido correctamente!\n";
sleep(5);
}
?&gt;

### Ver también

    - [cli_get_process_title()](#function.cli-get-process-title) - Devuelve el título del proceso actual

# dl

(PHP 4, PHP 5, PHP 7, PHP 8)

dl — Carga una extensión PHP dinámicamente

### Descripción

**dl**([string](#language.types.string) $extension_filename): [bool](#language.types.boolean)

Carga la extensión PHP extension_filename
dinámicamente.

Utilice la función [extension_loaded()](#function.extension-loaded) para verificar
si una extensión está cargada o no. Esta función funciona tanto con
extensiones nativas como con extensiones cargadas dinámicamente
(vía el php.ini o **dl()**).

**Advertencia**

    Esta función solo está disponible para los SAPI CLI e integrados,
    y el SAPI CGI cuando se ejecuta desde la línea de comandos.

### Parámetros

     extension_filename


       Este parámetro es *solo* el nombre de archivo
       de la extensión, que depende de la plataforma. Por ejemplo la extensión
       [sockets](#ref.sockets) (si compilada como módulo compartido,
       y no por defecto), se llamará sockets.so
       bajo Unix, y php_sockets.dll bajo Windows.




       La carpeta desde la cual se cargan las extensiones depende de la
       plataforma:




       Windows - Si no se indica explícitamente en el archivo php.ini,
       la extensión se carga desde C:\php5\ por defecto.




       Unix - Si no se indica explícitamente en el archivo php.ini,
       la carpeta de extensiones depende de



        -

          Si PHP fue compilado con la opción --enable-debug
          o no



        -

          Si PHP fue compilado con soporte para ZTS
          (Zend Thread Safety) o no



        -

          de la constante interna ZEND_MODULE_API_NO
          (versión interna de API de módulo Zend, que en realidad es la fecha
          en que se realizó una modificación importante de la API, por ejemplo
          20010901)




       Considerando estos parámetros, la carpeta de extensiones será entonces
       &lt;install-dir&gt;/lib/php/extensions/ &lt;debug-or-not&gt;-&lt;zts-or-not&gt;-ZEND_MODULE_API_NO,
       por ejemplo
       /usr/local/php/lib/php/extensions/debug-non-zts-20010901
       o
       /usr/local/php/lib/php/extensions/no-debug-zts-20010901.



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Si la funcionalidad de carga de módulos no está
disponible, o ha sido desactivada (desactivando la directiva
[enable_dl](#ini.enable-dl)
en el php.ini) se emitirá un **[E_ERROR](#constant.e-error)** y
la ejecución del script será detenida. Si la función
**dl()** falla porque la biblioteca no pudo ser encontrada,
**dl()** retornará **[false](#constant.false)** y emitirá un mensaje de advertencia
**[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplos con dl()**

&lt;?php
// Carga para todas las plataformas
if (!extension_loaded('sqlite')) {
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
dl('php_sqlite.dll');
} else {
dl('sqlite.so');
}
}

// O usar la constante PHP*SHLIB_SUFFIX
if (!extension_loaded('sqlite')) {
$prefix = (PHP_SHLIB_SUFFIX === 'dll') ? 'php*' : '';
dl($prefix . 'sqlite.' . PHP_SHLIB_SUFFIX);
}
?&gt;

### Notas

**Nota**:

    **dl()** es sensible a mayúsculas/minúsculas en plataformas Unix.

### Ver también

    - [Directivas de carga de extensiones](#ini.extension)

    - [extension_loaded()](#function.extension-loaded) - Determina si una extensión está cargada o no

# extension_loaded

(PHP 4, PHP 5, PHP 7, PHP 8)

extension_loaded — Determina si una extensión está cargada o no

### Descripción

**extension_loaded**([string](#language.types.string) $extension): [bool](#language.types.boolean)

Determina si una extensión está cargada o no.

### Parámetros

     extension


       El nombre de la extensión. Este argumento no es sensible a mayúsculas/minúsculas.




       Los nombres de las diferentes extensiones PHP pueden ser conocidos
       utilizando la función [phpinfo()](#function.phpinfo) o bien
       si se utiliza la versión CGI o CLI
       de PHP, se puede utilizar la opción de línea de comandos
       -m para mostrar todas las extensiones disponibles :


$ php -m
[PHP Modules]
xml
tokenizer
standard
sockets
session
posix
pcre
overload
mysql
mbstring
ctype

[Zend Modules]

### Valores devueltos

Retorna **[true](#constant.true)** si la extensión
extension ha sido cargada, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con extension_loaded()**

&lt;?php
if (!extension_loaded('gd')) {
if (!dl('gd.so')) {
exit;
}
}
?&gt;

### Ver también

    - [get_loaded_extensions()](#function.get-loaded-extensions) - Devuelve la lista de todos los módulos compilados y cargados

    - [get_extension_funcs()](#function.get-extension-funcs) - Lista las funciones de una extensión

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

    - [dl()](#function.dl) - Carga una extensión PHP dinámicamente

    - [function_exists()](#function.function-exists) - Indica si una función está definida

# gc_collect_cycles

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

gc_collect_cycles — Fuerza la recolección de los ciclos de basura existentes

### Descripción

**gc_collect_cycles**(): [int](#language.types.integer)

Recogida de las fuerzas de los ciclos de basura existentes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de ciclos de recogida.

### Ver también

    - [Recolección de Basura](#features.gc)

# gc_disable

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

gc_disable — Desactiva el recolector de referencia circular

### Descripción

**gc_disable**(): [void](language.types.void.html)

Desactiva el recolector de referencia circular.
[zend.enable_gc](#ini.zend.enable-gc) a 0.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [Recolección de Basura](#features.gc)

# gc_enable

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

gc_enable — Activa el colector de referencia circular

### Descripción

**gc_enable**(): [void](language.types.void.html)

Activa el colector de referencia circular, estableciendo
[zend.enable_gc](#ini.zend.enable-gc) a 1.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [Garbage Collection](#features.gc)

# gc_enabled

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

gc_enabled — Devuelve el estado del colector de referencia circular

### Descripción

**gc_enabled**(): [bool](#language.types.boolean)

Devuelve el estado del colector de referencia circular.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el recolector de basura está activado, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de gc_enabled()**

&lt;?php
if(gc_enabled()) gc_collect_cycles();
?&gt;

### Ver también

    - [Recolección de Basura](#features.gc)

# gc_mem_caches

(PHP 7, PHP 8)

gc_mem_caches —
Libera memoria utilizada por el gestor de memoria de Zend Engine

### Descripción

**gc_mem_caches**(): [int](#language.types.integer)

Libera memoria utilizada por el gestor de memoria de Zend Engine.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de bytes liberados.

### Ver también

    - [Recolección de basura (Garbage Collection) ](#features.gc)

# gc_status

(PHP 7 &gt;= 7.3.0, PHP 8)

gc_status — Obtiene información sobre el recolector de basura

### Descripción

**gc_status**(): [array](#language.types.array)

Obtiene información sobre el estado actual del recolector de basura.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) asociativo con los siguientes elementos:

    -

      "runs"



    -

      "collected"



    -

      "threshold"



    -

      "roots"



    -

      "running"



    -

      "protected"



    -

      "full"



    -

      "buffer_size"



    -

      "application_time"



    -

      "collector_time"



    -

      "destructor_time"



    -

      "free_time"


### Historial de cambios

       Versión
       Descripción






       8.3.0

        **gc_status()** devuelve ahora los campos adicionales siguientes:
        "running", "protected",
        "full", "buffer_size",
        "application_time", "collector_time",
        "destructor_time", y "free_time".





### Ejemplos

    **Ejemplo #1 Uso de gc_status()**

&lt;?php

// crear el árbol de objetos que requiere la recolección de basura
$a = new stdClass();
$a-&gt;b = [];
for ($i = 0; $i &lt; 100000; $i++) {
    $b = new stdClass();
    $b-&gt;a = $a;
    $a-&gt;b[] = $b;
}
unset($a);
unset($b);
gc_collect_cycles();

var_dump(gc_status());

    Resultado del ejemplo anterior es similar a:

array(4) {
["runs"]=&gt;
int(5)
["collected"]=&gt;
int(100002)
["threshold"]=&gt;
int(50001)
["roots"]=&gt;
int(0)
}

    Resultado del ejemplo anterior en PHP 8.3 es similar a:

array(12) {
["running"]=&gt;
bool(false)
["protected"]=&gt;
bool(false)
["full"]=&gt;
bool(false)
["runs"]=&gt;
int(5)
["collected"]=&gt;
int(100002)
["threshold"]=&gt;
int(50001)
["buffer_size"]=&gt;
int(131072)
["roots"]=&gt;
int(0)
["application_time"]=&gt;
float(0.031182458)
["collector_time"]=&gt;
float(0.020106291)
["destructor_time"]=&gt;
float(0)
["free_time"]=&gt;
float(0.003707167)
}

### Ver también

    - [Recolector de basura (Garbage Collection)](#features.gc)

# get_cfg_var

(PHP 4, PHP 5, PHP 7, PHP 8)

get_cfg_var — Devuelve el valor de una opción de PHP

### Descripción

**get_cfg_var**([string](#language.types.string) $option): [string](#language.types.string)|[array](#language.types.array)|[false](#language.types.singleton)

Devuelve el valor de la opción option de configuración de PHP.

**get_cfg_var()** no devuelve las opciones que
fueron seleccionadas durante la compilación de PHP, ni
lee en el archivo de configuración de Apache.

Para verificar si el sistema utiliza el
[archivo de configuración](#configuration.file),
intente leer el valor de cfg_file_path. Si este valor está
disponible, entonces el archivo de configuración se utiliza.

### Parámetros

     option


       El nombre de la opción de configuración.





### Valores devueltos

Devuelve el valor actual de la opción PHP
option o bien **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

    - [ini_get_all()](#function.ini-get-all) - Lee todos los valores de configuración

# get_current_user

(PHP 4, PHP 5, PHP 7, PHP 8)

get_current_user — Devuelve el nombre del propietario del script actual

### Descripción

**get_current_user**(): [string](#language.types.string)

Devuelve el nombre del propietario del script actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del usuario, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo con get_current_user()**

&lt;?php
echo 'Propietario del script actual : ' . get_current_user();
?&gt;

    Resultado del ejemplo anterior es similar a:

Propietario del script actual : SYSTEM

### Ver también

    - [getmyuid()](#function.getmyuid) - Retorna el UID del propietario del script actual

    - [getmygid()](#function.getmygid) - Retorna el GID del propietario del script

    - [getmypid()](#function.getmypid) - Devuelve el número de proceso actual de PHP

    - [getmyinode()](#function.getmyinode) - Devuelve el inodo del script

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

# get_defined_constants

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

get_defined_constants — Devuelve la lista de constantes y sus valores

### Descripción

**get_defined_constants**([bool](#language.types.boolean) $categorize = **[false](#constant.false)**): [array](#language.types.array)

Devuelve los nombres y valores de las constantes ya definidas.
Esto incluye las constantes creadas por las extensiones, y aquellas
creadas con la función [define()](#function.define).

### Parámetros

     categorize


       Permite a esta función devolver un array multidimensional
       con las categorías como claves de la primera dimensión y las constantes
       junto con sus valores en la segunda dimensión.





&lt;?php
define("MY_CONSTANT", 1);
print_r(get_defined_constants(true));
?&gt;

        Resultado del ejemplo anterior es similar a:




Array
(
[Core] =&gt; Array
(
[E_ERROR] =&gt; 1
[E_WARNING] =&gt; 2
[E_PARSE] =&gt; 4
[E_NOTICE] =&gt; 8
[E_CORE_ERROR] =&gt; 16
[E_CORE_WARNING] =&gt; 32
[E_COMPILE_ERROR] =&gt; 64
[E_COMPILE_WARNING] =&gt; 128
[E_USER_ERROR] =&gt; 256
[E_USER_WARNING] =&gt; 512
[E_USER_NOTICE] =&gt; 1024
[E_ALL] =&gt; 2047
[TRUE] =&gt; 1
)

    [pcre] =&gt; Array
        (
            [PREG_PATTERN_ORDER] =&gt; 1
            [PREG_SET_ORDER] =&gt; 2
            [PREG_OFFSET_CAPTURE] =&gt; 256
            [PREG_SPLIT_NO_EMPTY] =&gt; 1
            [PREG_SPLIT_DELIM_CAPTURE] =&gt; 2
            [PREG_SPLIT_OFFSET_CAPTURE] =&gt; 4
            [PREG_GREP_INVERT] =&gt; 1
        )

    [user] =&gt; Array
        (
            [MY_CONSTANT] =&gt; 1
        )

)

### Valores devueltos

Devuelve un array de constantes en el formato "nombre de la constante"
=&gt; "valor de la constante", opcionalmente
agrupadas por el nombre de la extensión que registró la constante.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_defined_constants()**

&lt;?php
print_r(get_defined_constants());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[E_ERROR] =&gt; 1
[E_WARNING] =&gt; 2
[E_PARSE] =&gt; 4
[E_NOTICE] =&gt; 8
[E_CORE_ERROR] =&gt; 16
[E_CORE_WARNING] =&gt; 32
[E_COMPILE_ERROR] =&gt; 64
[E_COMPILE_WARNING] =&gt; 128
[E_USER_ERROR] =&gt; 256
[E_USER_WARNING] =&gt; 512
[E_USER_NOTICE] =&gt; 1024
[E_ALL] =&gt; 2047
[TRUE] =&gt; 1
)

### Ver también

    - [defined()](#function.defined) - Verifica si una constante con el nombre dado existe

    - [constant()](#function.constant) - Retorna el valor de una constante

    - [get_loaded_extensions()](#function.get-loaded-extensions) - Devuelve la lista de todos los módulos compilados y cargados

    - [get_defined_functions()](#function.get-defined-functions) - Lista todas las funciones definidas

    - [get_defined_vars()](#function.get-defined-vars) - Lista todas las variables definidas

# get_extension_funcs

(PHP 4, PHP 5, PHP 7, PHP 8)

get_extension_funcs — Lista las funciones de una extensión

### Descripción

**get_extension_funcs**([string](#language.types.string) $extension): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve el nombre de las funciones definidas en el módulo
extension.

### Parámetros

     extension


       El nombre del módulo.



      **Nota**:



        Este argumento debe estar en *minúsculas*.






### Valores devueltos

Devuelve un array que contiene todas las funciones, o **[false](#constant.false)**
si extension no es una extensión válida.

### Ejemplos

    **Ejemplo #1 Muestra todas las funciones XML**

&lt;?php
print_r(get_extension_funcs("xml"));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; xml_parser_create
[1] =&gt; xml_parser_create_ns
[2] =&gt; xml_set_object
[3] =&gt; xml_set_element_handler
[4] =&gt; xml_set_character_data_handler
[5] =&gt; xml_set_processing_instruction_handler
[6] =&gt; xml_set_default_handler
[7] =&gt; xml_set_unparsed_entity_decl_handler
[8] =&gt; xml_set_notation_decl_handler
[9] =&gt; xml_set_external_entity_ref_handler
[10] =&gt; xml_set_start_namespace_decl_handler
[11] =&gt; xml_set_end_namespace_decl_handler
[12] =&gt; xml_parse
[13] =&gt; xml_parse_into_struct
[14] =&gt; xml_get_error_code
[15] =&gt; xml_error_string
[16] =&gt; xml_get_current_line_number
[17] =&gt; xml_get_current_column_number
[18] =&gt; xml_get_current_byte_index
[19] =&gt; xml_parser_free
[20] =&gt; xml_parser_set_option
[21] =&gt; xml_parser_get_option
)

### Ver también

    - [get_loaded_extensions()](#function.get-loaded-extensions) - Devuelve la lista de todos los módulos compilados y cargados

    - [ReflectionExtension::getFunctions()](#reflectionextension.getfunctions) - Obtiene las funciones de una extensión

# get_include_path

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

get_include_path — Lee el valor de la directiva de configuración include_path

### Descripción

**get_include_path**(): [string](#language.types.string)|[false](#language.types.singleton)

Lee el valor de la directiva de configuración
[include_path](#ini.include-path).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_include_path()**

&lt;?php
echo get_include_path();

// O utilizar ini_get()
echo ini_get('include_path');
?&gt;

### Ver también

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

    - [restore_include_path()](#function.restore-include-path) - Restaura el valor de la directiva de configuración include_path

    - [set_include_path()](#function.set-include-path) - Modifica el valor de la directiva de configuración include_path

    - [include](#function.include) - include

# get_included_files

(PHP 4, PHP 5, PHP 7, PHP 8)

get_included_files — Devuelve un array con los nombres de los ficheros que son incluidos en un script

### Descripción

**get_included_files**(): [array](#language.types.array)

Devuelve un array que contiene los nombres de todos los ficheros que han sido
añadidos al script con las funciones
[include](#function.include),
[include_once](#function.include-once),
[require](#function.require) o
[require_once](#function.require-once).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene los nombres de todos los ficheros.

El script en curso es considerado como fichero incluido, por lo que será
listado junto con los otros ficheros a los que se hace referencia con
[include](#function.include) y las
funciones similares.

Los ficheros incluidos o requeridos varias veces solo se muestran una vez en
el array devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_included_files()**

&lt;?php
// Este fichero es abc.php

include 'test1.php';
include_once 'test2.php';
require 'test3.php';
require_once 'test4.php';

$included_files = get_included_files();

foreach ($included_files as $filename) {
    echo "$filename\n";
}

?&gt;

    El ejemplo anterior mostrará:

/path/to/abc.php
/path/to/test1.php
/path/to/test2.php
/path/to/test3.php
/path/to/test4.php

### Ver también

    - [include](#function.include) - include

    - [include_once](#function.include-once) - include_once

    - [require](#function.require) - require

    - [require_once](#function.require-once) - require_once

    - [get_required_files()](#function.get-required-files) - Alias de

get_included_files

# get_loaded_extensions

(PHP 4, PHP 5, PHP 7, PHP 8)

get_loaded_extensions — Devuelve la lista de todos los módulos compilados y cargados

### Descripción

**get_loaded_extensions**([bool](#language.types.boolean) $zend_extensions = **[false](#constant.false)**): [array](#language.types.array)

Devuelve un array que contiene los nombres de todos los módulos compilados
y cargados por la aplicación PHP actual.

### Parámetros

     zend_extensions


       Devuelve únicamente las extensiones Zend. Por omisión vale **[false](#constant.false)**
       y solo lista las extensiones PHP clásicas como mysqli por ejemplo.





### Valores devueltos

Devuelve un array indexado con los nombres de todos los módulos.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_loaded_extensions()**

&lt;?php
print_r(get_loaded_extensions());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Core
[1] =&gt; date
[2] =&gt; libxml
[3] =&gt; pcre
[4] =&gt; sqlite3
[5] =&gt; zlib
[6] =&gt; ctype
[7] =&gt; dom
[8] =&gt; fileinfo
[9] =&gt; filter
[10] =&gt; hash
[11] =&gt; json
[12] =&gt; mbstring
[13] =&gt; SPL
[14] =&gt; PDO
[15] =&gt; session
[16] =&gt; posix
[17] =&gt; Reflection
[18] =&gt; standard
[19] =&gt; SimpleXML
[20] =&gt; pdo_sqlite
[21] =&gt; Phar
[22] =&gt; tokenizer
[23] =&gt; xml
[24] =&gt; xmlreader
[25] =&gt; xmlwriter
[26] =&gt; gmp
[27] =&gt; iconv
[28] =&gt; intl
[29] =&gt; bcmath
[30] =&gt; sodium
[31] =&gt; Zend OPcache
)

### Ver también

    - [get_extension_funcs()](#function.get-extension-funcs) - Lista las funciones de una extensión

    - [extension_loaded()](#function.extension-loaded) - Determina si una extensión está cargada o no

    - [dl()](#function.dl) - Carga una extensión PHP dinámicamente

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

# get_magic_quotes_gpc

(PHP 4, PHP 5, PHP 7)

get_magic_quotes_gpc — Devuelve la configuración actual de la opción magic_quotes_gpc

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**get_magic_quotes_gpc**(): [false](#language.types.singleton)

Siempre devuelve **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Siempre devuelve **[false](#constant.false)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ha sido eliminada.




       7.4.0

        Esta función está obsoleta.





### Ver también

    - [addslashes()](#function.addslashes) - Añade barras invertidas en un string

    - [stripslashes()](#function.stripslashes) - Quita las barras de un string con comillas escapadas

    - [get_magic_quotes_runtime()](#function.get-magic-quotes-runtime) - Devuelve la configuración actual de la opción magic_quotes_runtime

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

# get_magic_quotes_runtime

(PHP 4, PHP 5, PHP 7)

get_magic_quotes_runtime — Devuelve la configuración actual de la opción magic_quotes_runtime

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**get_magic_quotes_runtime**(): [false](#language.types.singleton)

Siempre devuelve **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Siempre devuelve **[false](#constant.false)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ha sido eliminada.




       7.4.0

        Esta función está obsoleta.





### Ver también

    - [get_magic_quotes_gpc()](#function.get-magic-quotes-gpc) - Devuelve la configuración actual de la opción magic_quotes_gpc

# get_required_files

(PHP 4, PHP 5, PHP 7, PHP 8)

get_required_files — Alias de
[get_included_files()](#function.get-included-files)

### Descripción

Esta función es un alias de: [get_included_files()](#function.get-included-files).

# get_resources

(PHP 7, PHP 8)

get_resources — Devuelve los recursos activos

### Descripción

**get_resources**([?](#language.types.null)[string](#language.types.string) $type = **[null](#constant.null)**): [array](#language.types.array)

Devuelve un array de todos los recursos [resource](#language.types.resource) actualmente activos,
opcionalmente filtrados por el tipo de recurso.

**Nota**:

    Esta función está destinada a fines de depuración y prueba. No está pensada
    para ser utilizada en entornos de producción, y mucho menos para acceder o incluso manipular
    recursos que normalmente no son accesibles (por ejemplo, el recurso
    de flujo subyacente de las instancias de [SplFileObject](#class.splfileobject)).

### Parámetros

     type


       Si se define, esto hará que **get_resources()**
       devuelva solo los recursos del tipo dado.
       [Una lista de tipos de recursos está disponible.](#resource)




       Si se proporciona [string](#language.types.string) Unknown para el tipo,
       en ese caso solo se devolverán los recursos cuyo tipo es desconocido.




       Si se omite, se devolverán todos los recursos.





### Valores devueltos

Devuelve un [array](#language.types.array) de los recursos actualmente activos, indexados por el
número del recurso.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       type ahora es nullable.



### Ejemplos

    **Ejemplo #1 get_resources()** sin filtrar

&lt;?php
$fp = tmpfile();
var_dump(get_resources());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
[1]=&gt;
resource(1) of type (stream)
}

    **Ejemplo #2 get_resources()** filtrado

&lt;?php
$fp = tmpfile();
var_dump(get_resources('stream'));
var_dump(get_resources('curl'));
?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
[1]=&gt;
resource(1) of type (stream)
}
array(0) {
}

### Ver también

    - [get_loaded_extensions()](#function.get-loaded-extensions) - Devuelve la lista de todos los módulos compilados y cargados

    - [get_defined_constants()](#function.get-defined-constants) - Devuelve la lista de constantes y sus valores

    - [get_defined_functions()](#function.get-defined-functions) - Lista todas las funciones definidas

    - [get_defined_vars()](#function.get-defined-vars) - Lista todas las variables definidas

# getenv

(PHP 4, PHP 5, PHP 7, PHP 8)

getenv — Retorna el valor de una o todas las variables de entorno

### Descripción

**getenv**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**, [bool](#language.types.boolean) $local_only = **[false](#constant.false)**): [string](#language.types.string)|[array](#language.types.array)|[false](#language.types.singleton)

Retorna el valor de una o todas las variables de entorno.

Puede verse una lista completa de las variables de entorno
utilizando la función [phpinfo()](#function.phpinfo). Puede encontrarse
el significado de cada una de ellas consultando la
[» RFC 3875](https://datatracker.ietf.org/doc/html/rfc3875), en particular la sección
4.1 "Request Meta-Variables".

### Parámetros

     name


       El nombre de la variable como [string](#language.types.string) o **[null](#constant.null)**.






     local_only


       Cuando se establece en **[true](#constant.true)**, solo se retornan las variables de entorno locales, definidas por el sistema operativo o putenv. Esto solo tiene efecto
       cuando name es un [string](#language.types.string).





### Valores devueltos

Retorna el valor de la variable de entorno
name, o **[false](#constant.false)** si la variable
de entorno name no existe.
Si name es omitido, todas las variables
de entorno son retornadas como un [array](#language.types.array) asociativo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El name ahora es nullable.




      7.1.0

       name ahora puede ser omitido para recuperar
       un [array](#language.types.array) asociativo de todas las variables de entorno.




      7.0.9

       Se ha añadido el parámetro local_only.



### Ejemplos

    **Ejemplo #1 Ejemplo con getenv()**

&lt;?php
// Ejemplo de uso de getenv()
$ip = getenv('REMOTE_ADDR');

// O simplemente usar una Superglobal ($_SERVER o $_ENV)
$ip = $\_SERVER['REMOTE_ADDR'];

// Obtener de forma segura el valor de una variable de entorno,
// ignorando si ha sido definida por un SAPI o modificada con putenv
$ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR')
?&gt;

### Notas

**Advertencia**

    Si PHP se ejecuta en un SAPI como Fast CGI, esta función retornará
    siempre el valor de una variable de entorno definida por el SAPI,
    incluso si [putenv()](#function.putenv) ha sido utilizado para definir una variable
    de entorno local con el mismo nombre. El parámetro
    local_only debe ser utilizado para retornar los
    valores de variables de entorno definidas localmente.

### Ver también

    - [putenv()](#function.putenv) - Establece el valor de una variable de entorno

    - [apache_getenv()](#function.apache-getenv) - Lee una variable de proceso Apache

    - [Superglobales](#language.variables.superglobals)

# getlastmod

(PHP 4, PHP 5, PHP 7, PHP 8)

getlastmod — Devuelve la fecha de última modificación de la página

### Descripción

**getlastmod**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la fecha de última modificación del script principal
en ejecución.

Si se desea obtener la fecha de última modificación de un fichero
diferente, se debe utilizar la función [filemtime()](#function.filemtime).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la fecha de última modificación de la página.
El valor devuelto es un timestamp UNIX, utilizable
como argumento con la función [date()](#function.date).
Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con getlastmod()**

&lt;?php
// muestra por ejemplo 'Última modificación: April 20 2004 20:43:59.'
echo "Última modificación : " . date ("F d Y H:i:s.", getlastmod());
?&gt;

### Ver también

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [getmyuid()](#function.getmyuid) - Retorna el UID del propietario del script actual

    - [getmygid()](#function.getmygid) - Retorna el GID del propietario del script

    - [get_current_user()](#function.get-current-user) - Devuelve el nombre del propietario del script actual

    - [getmyinode()](#function.getmyinode) - Devuelve el inodo del script

    - [getmypid()](#function.getmypid) - Devuelve el número de proceso actual de PHP

    - [filemtime()](#function.filemtime) - Lee la fecha de última modificación del fichero

# getmygid

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

getmygid — Retorna el GID del propietario del script

### Descripción

**getmygid**(): [int](#language.types.integer)|[false](#language.types.singleton)

Retorna el GID del propietario del script.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el GID del propietario del script actual, o **[false](#constant.false)**
en caso de error.

### Ver también

    - [getmyuid()](#function.getmyuid) - Retorna el UID del propietario del script actual

    - [getmypid()](#function.getmypid) - Devuelve el número de proceso actual de PHP

    - [get_current_user()](#function.get-current-user) - Devuelve el nombre del propietario del script actual

    - [getmyinode()](#function.getmyinode) - Devuelve el inodo del script

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

# getmyinode

(PHP 4, PHP 5, PHP 7, PHP 8)

getmyinode — Devuelve el inodo del script

### Descripción

**getmyinode**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el inodo del script actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el inodo del script actual, en forma de [int](#language.types.integer),
o **[false](#constant.false)** en caso de error.

### Ver también

    - [getmygid()](#function.getmygid) - Retorna el GID del propietario del script

    - [getmyuid()](#function.getmyuid) - Retorna el UID del propietario del script actual

    - [getmypid()](#function.getmypid) - Devuelve el número de proceso actual de PHP

    - [get_current_user()](#function.get-current-user) - Devuelve el nombre del propietario del script actual

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

# getmypid

(PHP 4, PHP 5, PHP 7, PHP 8)

getmypid — Devuelve el número de proceso actual de PHP

### Descripción

**getmypid**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de proceso actual de PHP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de proceso actual de PHP, o **[false](#constant.false)**
en caso de error.

### Notas

**Advertencia**

    Los identificadores de proceso no son únicos,
    y constituyen una fuente de entropía baja. Se recomienda
    no utilizar los pid para garantizar la seguridad de un
    sistema.

### Ver también

    - [getmygid()](#function.getmygid) - Retorna el GID del propietario del script

    - [getmyuid()](#function.getmyuid) - Retorna el UID del propietario del script actual

    - [get_current_user()](#function.get-current-user) - Devuelve el nombre del propietario del script actual

    - [getmyinode()](#function.getmyinode) - Devuelve el inodo del script

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

# getmyuid

(PHP 4, PHP 5, PHP 7, PHP 8)

getmyuid — Retorna el UID del propietario del script actual

### Descripción

**getmyuid**(): [int](#language.types.integer)|[false](#language.types.singleton)

Retorna el UID del propietario del script actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el identificador del propietario
del script actual (UID) o **[false](#constant.false)** en caso de error.

### Ver también

    - [getmygid()](#function.getmygid) - Retorna el GID del propietario del script

    - [getmypid()](#function.getmypid) - Devuelve el número de proceso actual de PHP

    - [get_current_user()](#function.get-current-user) - Devuelve el nombre del propietario del script actual

    - [getmyinode()](#function.getmyinode) - Devuelve el inodo del script

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

# getopt

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

getopt — Lee las opciones pasadas en la línea de comandos

### Descripción

**getopt**([string](#language.types.string) $short_options, [array](#language.types.array) $long_options = [], [int](#language.types.integer) &amp;$rest_index = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**getopt()** lee las opciones pasadas en la línea de comandos.

### Parámetros

     short_options


       Cada carácter en esta cadena será utilizado como caracteres
       opcionales y deberá coincidir con las opciones pasadas, comenzando
       por un guión simple (-).


       Por ejemplo, una cadena opcional "x" coincidirá
       con la opción -x.


       Solo se permiten a-z, A-Z y 0-9.




     long_options


       Un array de opciones. Cada elemento de este array será utilizado como
       opción y deberá coincidir con las opciones pasadas, comenzando por un
       guión doble (--).


       Por ejemplo, un elemento longopts "opt"
       coincidirá con la opción --opt.




     rest_index


       Si el parámetro rest_index está presente, entonces el índice
       donde se detuvo el análisis de los argumentos será escrito en esta variable.



El parámetro short_options puede contener los siguientes elementos:

    - Caracteres individuales (no aceptan valor)

    - Caracteres seguidos por un dos-puntos (el parámetro requiere un valor)

    - Caracteres seguidos por dos dos-puntos (valor opcional)

Los valores opcionales son los primeros argumentos después de la cadena. Si
un valor es requerido, no importa si el valor está seguido de un espacio o
no. Ver la nota.
**Nota**:

     Los valores opcionales no aceptan el espacio como separador.

El array de valores long_options puede contener:

    - String (parámetro no acepta ningún valor)

    - String seguido de un dos-puntos (parámetro requiere un valor)

    - String seguido de dos dos-puntos (valor opcional)

**Nota**:

    El formato de los parámetros short_options y
    long_options es idéntico; la única diferencia es
    que long_options toma un array en opción (donde cada elemento
    es una opción) mientras que short_options toma una cadena
    (donde cada carácter es una opción).

### Valores devueltos

Esta función devuelve un array de opciones/argumentos, o **[false](#constant.false)** si ocurre un error.

**Nota**:

    El análisis de las opciones se detendrá cuando se encuentre la primera
    opción incorrecta, y todo lo que siga será ignorado.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        Se añadió el parámetro rest_index.





### Ejemplos

    **Ejemplo #1 Ejemplo con getopt()**: los fundamentos

&lt;?php
// Script example.php
$options = getopt("f:hp:");
var_dump($options);
?&gt;

shell&gt; php example.php -fvalue -h

    El ejemplo anterior mostrará:

array(2) {
["f"]=&gt;
string(5) "value"
["h"]=&gt;
bool(false)
}

    **Ejemplo #2 Segundo ejemplo con getopt()**: Introducción a las opciones largas

&lt;?php
// Script example.php
$shortopts  = "";
$shortopts .= "f:"; // Valor requerido
$shortopts .= "v::"; // Valor opcional
$shortopts .= "abc"; // Estas opciones no aceptan valor

$longopts  = array(
    "required:",     // Valor requerido
    "optional::",    // Valor opcional
    "option",        // Ningún valor
    "opt",           // Ningún valor
);
$options = getopt($shortopts, $longopts);
var_dump($options);
?&gt;

shell&gt; php example.php -f "value for f" -v -a --required value --optional="optional value" --option

    El ejemplo anterior mostrará:

array(6) {
["f"]=&gt;
string(11) "value for f"
["v"]=&gt;
bool(false)
["a"]=&gt;
bool(false)
["required"]=&gt;
string(5) "value"
["optional"]=&gt;
string(14) "optional value"
["option"]=&gt;
bool(false)
}

    **Ejemplo #3 Tercer ejemplo con getopt()**: Pasar múltiples opciones

&lt;?php
// Script example.php
$options = getopt("abc");
var_dump($options);
?&gt;

shell&gt; php example.php -aaac

    El ejemplo anterior mostrará:

array(2) {
["a"]=&gt;
array(3) {
[0]=&gt;
bool(false)
[1]=&gt;
bool(false)
[2]=&gt;
bool(false)
}
["c"]=&gt;
bool(false)
}

    **Ejemplo #4 Ejemplo de getopt()**: Utilizando rest_index

&lt;?php
// Script example.php
$rest_index = null;
$opts = getopt('a:b:', [], $rest_index);
$pos_args = array_slice($argv, $rest_index);
var_dump($pos_args);

shell&gt; php example.php -a 1 -b 2 -- test

    El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
string(4) "test"
}

### Ver también

    - [<a href="#reserved.variables.argv" class="classname">$argv](#reserved.variables.argv)</a>

# getrusage

(PHP 4, PHP 5, PHP 7, PHP 8)

getrusage — Devuelve el nivel de utilización de los recursos

### Descripción

**getrusage**([int](#language.types.integer) $mode = 0): [array](#language.types.array)|[false](#language.types.singleton)

Es una interfaz a la función del sistema **getrusage(2)**.
Devuelve un array asociativo que contiene las informaciones
devueltas por esta llamada al sistema.

### Parámetros

     mode


       Si mode es igual a 1,
       **getrusage()** será llamado con
       el argumento **[RUSAGE_CHILDREN](#constant.rusage-children)**.





### Valores devueltos

Devuelve un array asociativo que contiene los datos devueltos desde
la llamada al sistema. Todas las entradas son accesibles utilizando sus
nombres de campos documentados.
Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con getrusage()**

&lt;?php
$dat = getrusage();
echo $dat["ru_oublock"]; // número de operaciones de bloque de salida
echo $dat["ru_inblock"]; // número de operaciones de bloque de entrada
echo $dat["ru_msgsnd"]; // número de mensajes IPC enviados
echo $dat["ru_msgrcv"]; // número de mensajes IPC recibidos
echo $dat["ru_maxrss"]; // tamaño máximo del grupo de residentes
echo $dat["ru_ixrss"]; // tamaño de la memoria compartida integral
echo $dat["ru_idrss"]; // tamaño integral de los datos no compartidos
echo $dat["ru_minflt"]; // número de páginas recuperadas (falta de página menor)
echo $dat["ru_majflt"]; // número de faltas de página (falta de página mayor)
echo $dat["ru_nsignals"]; // número de señales recibidas
echo $dat["ru_nvcsw"]; // número de cambios de contexto voluntarios
echo $dat["ru_nivcsw"]; // número de cambios de contexto involuntarios
echo $dat["ru_nswap"]; // tamaño de la memoria swap
echo $dat["ru_utime.tv_usec"]; // tiempo de usuario utilizado (en microsegundos)
echo $dat["ru_utime.tv_sec"]; // tiempo de usuario utilizado (en segundos)
echo $dat["ru_stime.tv_usec"]; // tiempo de sistema utilizado (en microsegundos)
echo $dat["ru_stime.tv_sec"]; // tiempo de sistema utilizado (en segundos)
?&gt;

### Notas

**Nota**:

    Bajo Windows, la función **getrusage()** solo va a devolver
    los siguientes miembros:







     - "ru_stime.tv_sec"

     - "ru_stime.tv_usec"

     - "ru_utime.tv_sec"

     - "ru_utime.tv_usec"

     -
      "ru_majflt" (solo si mode vale
      **[RUSAGE_SELF](#constant.rusage-self)**)


     -
      "ru_maxrss" (solo si mode vale
      **[RUSAGE_SELF](#constant.rusage-self)**)





    Si **getrusage()** es llamado con el argumento mode
    valiendo 1 (**[RUSAGE_CHILDREN](#constant.rusage-children)**), entonces la utilización
    de los recursos para los hilos son recolectados (lo que significa que, internamente,
    la función es llamada con **[RUSAGE_THREAD](#constant.rusage-thread)**).

**Nota**:

    Bajo BeOS 2000, solo los siguientes miembros son devueltos:







     - "ru_stime.tv_sec"

     - "ru_stime.tv_usec"

     - "ru_utime.tv_sec"

     - "ru_utime.tv_usec"

### Ver también

    - La página del manual **getrusage(2)** de su sistema

# ini_alter

(PHP 4, PHP 5, PHP 7, PHP 8)

ini_alter — Alias de [ini_set()](#function.ini-set)

### Descripción

Esta función es un alias de: [ini_set()](#function.ini-set).

# ini_get

(PHP 4, PHP 5, PHP 7, PHP 8)

ini_get — Lee el valor de una opción de configuración

### Descripción

**ini_get**([string](#language.types.string) $option): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el valor de la opción de configuración
varname en caso de éxito.

### Parámetros

     option


       El nombre de la opción de configuración.





### Valores devueltos

Devuelve el valor de la opción de configuración
varname en caso de éxito, o un
[string](#language.types.string) vacío para los valores **[null](#constant.null)**. Devuelve **[false](#constant.false)**
si la opción de configuración no existe.

### Ejemplos

    **Ejemplo #1 Ejemplos con ini_get()**

&lt;?php

/\*
Nuestro archivo php.ini contiene las siguientes directivas:

display_errors = On
opcache.enable_cli = Off
post_max_size = 8M
\*/

echo 'display_errors = ' . ini_get('display_errors') . "\n";
echo 'opcache.enable_cli = ' . (int) ini_get('opcache.enable_cli') . "\n";
echo 'post_max_size = ' . ini_get('post_max_size') . "\n";
echo 'post_max_size + 1 = ' . (rtrim(ini_get('post_max_size'), 'KMG') + 1) . "\n";
echo 'post_max_size in bytes = ' . ini_parse_quantity(ini_get('post_max_size'));

?&gt;

    Resultado del ejemplo anterior es similar a:

display_errors = 1
opcache.enable_cli = 0
post_max_size = 8M
post_max_size+1 = 9
post_max_size in bytes = 8388608

### Notas

**Nota**:
**Lectura de valores booleanos**

    Una directiva de configuración con el valor off
    será devuelta en forma de cadena vacía o "0" mientras que
    el valor on devolverá "1".
    Esta función también puede devolver el valor literal
    del archivo INI.

**Nota**:
**Al leer los tamaños de memoria**

    Varias directivas que tratan sobre tamaño de memoria, como
    [upload_max_filesize](#ini.upload-max-filesize), están almacenadas
    en el archivo php.ini con una notación corta. **ini_get()**
    devuelve la cadena exacta almacenada en el archivo php.ini y
    *NO* su equivalente [int](#language.types.integer). Aplicar operaciones
    aritméticas clásicas sobre estos valores no conducirá a nada bueno. La función
    [ini_parse_quantity()](#function.ini-parse-quantity) puede ser utilizada para convertir
    la notación abreviada en bytes.

**Nota**:

    **ini_get()** no puede leer las opciones ini de tipo
    "array" como pdo.dsn.*, y devuelve **[false](#constant.false)** en este caso.

### Ver también

    - [get_cfg_var()](#function.get-cfg-var) - Devuelve el valor de una opción de PHP

    - [ini_get_all()](#function.ini-get-all) - Lee todos los valores de configuración

    - [ini_parse_quantity()](#function.ini-parse-quantity) - Devuelve el tamaño interpretado a partir de la sintaxis abreviada ini

    - [ini_restore()](#function.ini-restore) - Restaura el valor de la opción de configuración

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

# ini_get_all

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ini_get_all — Lee todos los valores de configuración

### Descripción

**ini_get_all**([?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**, [bool](#language.types.boolean) $details = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve todas las valores de configuración.

### Parámetros

     extension


       Un nombre de extensión, opcional. Si no es **[null](#constant.null)** o diferente de la [string](#language.types.string)
       core, esta función devolverá únicamente las
       opciones específicas de esta extensión.






     details


       Obtiene los detalles, o únicamente el valor actual de cada
       configuración. Por omisión, vale **[true](#constant.true)** (obtiene los detalles).





### Valores devueltos

Devuelve un array asociativo cuyas claves son los nombres de
las directivas.
Devuelve **[false](#constant.false)** y genera un error de nivel **[E_WARNING](#constant.e-warning)**
si la extension no existe.

Cuando el argumento details vale **[true](#constant.true)** (por defecto),
el array contendrá los valores global_value (definidos en
el archivo php.ini), local_value (definido eventualmente
con la función [ini_set()](#function.ini-set) o mediante un .htaccess), y
access (el grado de acceso).

Cuando el argumento details vale **[false](#constant.false)**, el valor
será el valor actual de la opción.

Ver el [manual](#configuration.changes.modes)
para más información sobre el significado del grado de acceso.

**Nota**:

    Es posible que una directiva tenga varios grados de acceso, y
    por eso access muestra los valores del máscara apropiados.

### Ejemplos

    **Ejemplo #1 Ejemplo con ini_get_all()**

&lt;?php
print_r(ini_get_all("pcre"));
print_r(ini_get_all());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[pcre.backtrack_limit] =&gt; Array
(
[global_value] =&gt; 100000
[local_value] =&gt; 100000
[access] =&gt; 7
)

    [pcre.recursion_limit] =&gt; Array
        (
            [global_value] =&gt; 100000
            [local_value] =&gt; 100000
            [access] =&gt; 7
        )

)
Array
(
[allow_call_time_pass_reference] =&gt; Array
(
[global_value] =&gt; 0
[local_value] =&gt; 0
[access] =&gt; 6
)

    [allow_url_fopen] =&gt; Array
        (
            [global_value] =&gt; 1
            [local_value] =&gt; 1
            [access] =&gt; 4
        )

    ...

)

    **Ejemplo #2 Desactiva el argumento details**

&lt;?php
print_r(ini_get_all("pcre", false)); // Añadido en PHP 5.3.0
print_r(ini_get_all(null, false)); // Añadido en PHP 5.3.0
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[pcre.backtrack_limit] =&gt; 100000
[pcre.recursion_limit] =&gt; 100000
)
Array
(
[allow_call_time_pass_reference] =&gt; 0
[allow_url_fopen] =&gt; 1
...
)

### Notas

**Nota**:

    **ini_get_all()** ignora las opciones ini "array" tales
    como pdo.dsn.*.

### Ver también

    - [Cómo modificar la configuración](#configuration.changes)

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

    - [ini_restore()](#function.ini-restore) - Restaura el valor de la opción de configuración

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

    - [get_loaded_extensions()](#function.get-loaded-extensions) - Devuelve la lista de todos los módulos compilados y cargados

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

    - [ReflectionExtension::getINIEntries()](#reflectionextension.getinientries) - Recupera las entradas ini de la extensión

# ini_parse_quantity

(PHP 8 &gt;= 8.2.0)

ini_parse_quantity — Devuelve el tamaño interpretado a partir de la sintaxis abreviada ini

### Descripción

**ini_parse_quantity**([string](#language.types.string) $shorthand): [int](#language.types.integer)

Devuelve el tamaño interpretado en bytes en caso de éxito a partir de una [sintaxis abreviada ini](#faq.using.shorthandbytes).

### Parámetros

     shorthand


       La sintaxis abreviada ini a interpretar, debe ser un número seguido de un multiplicador opcional.

       Los multiplicadores siguientes son soportados: k/K (1024),
       m/M (1048576),
       g/G (1073741824).

       El número puede ser un decimal, hexadecimal (prefijado por 0x o 0X),
       octal (prefijado por 0o, 0O o 0) o binario (prefijado por
       0b o 0B)





### Valores devueltos

Devuelve el tamaño interpretado en bytes en tanto que [int](#language.types.integer).

### Errores/Excepciones

Si el valor no puede ser interpretado, o si un multiplicador inválido es utilizado, un **[E_WARNING](#constant.e-warning)** es emitido.

### Ejemplos

    **Ejemplo #1 Algunos ejemplos de ini_parse_quantity()**

&lt;?php

var_dump(ini_parse_quantity('1024'));
var_dump(ini_parse_quantity('1024M'));
var_dump(ini_parse_quantity('512K'));
var_dump(ini_parse_quantity('0xFFk'));
var_dump(ini_parse_quantity('0b1010k'));
var_dump(ini_parse_quantity('0o1024'));
var_dump(ini_parse_quantity('01024'));
var_dump(ini_parse_quantity('Foobar'));
var_dump(ini_parse_quantity('10F'));

?&gt;

    El ejemplo anterior mostrará:

int(1024)
int(1073741824)
int(524288)
int(261120)
int(10240)
int(532)
int(532)

Warning: Invalid quantity "Foobar": no valid leading digits, interpreting as "0" for backwards compatibility
int(0)

Warning: Invalid quantity "10F": unknown multiplier "F", interpreting as "10" for backwards compatibility
int(10)

### Ver también

- [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

# ini_restore

(PHP 4, PHP 5, PHP 7, PHP 8)

ini_restore — Restaura el valor de la opción de configuración

### Descripción

**ini_restore**([string](#language.types.string) $option): [void](language.types.void.html)

Restaura el valor original de la opción de configuración
varname.

### Parámetros

     option


       El nombre de la opción de configuración.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ini_restore()**

&lt;?php
$setting = 'html_errors';

echo 'Valor actual de \'' . $setting . '\': ' . ini_get($setting), PHP_EOL;

ini_set($setting, ini_get($setting) ? 0 : 1);
echo 'Nuevo valor de \'' . $setting . '\': ' . ini_get($setting), PHP_EOL;

ini_restore($setting);
echo 'Valor original de \'' . $setting . '\': ' . ini_get($setting), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

Valor actual de 'html_errors': 1
Nuevo valor de 'html_errors': 0
Valor original de 'html_errors': 1

### Ver también

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

    - [ini_get_all()](#function.ini-get-all) - Lee todos los valores de configuración

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

# ini_set

(PHP 4, PHP 5, PHP 7, PHP 8)

ini_set — Modifica el valor de una opción de configuración

### Descripción

**ini_set**([string](#language.types.string) $option, [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float)|[bool](#language.types.boolean)|[null](#language.types.null) $value): [string](#language.types.string)|[false](#language.types.singleton)

Cambia el valor de la opción de configuración varname
y le asigna el valor de newvalue.
El valor de la opción de configuración será modificado durante toda
la ejecución del script y específicamente para este script. Volverá
a su valor por omisión al finalizar el script.

### Parámetros

     option






       Las opciones disponibles no pueden ser todas
       modificadas con **ini_set()**. La lista de
       todas las opciones disponibles se encuentra en el [apéndice](#ini.list).






     value


       El nuevo valor para la opción.





### Valores devueltos

Devuelve el valor anterior en caso de éxito, **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       value ahora acepta cualquier tipo de valor escalar (incluyendo **[null](#constant.null)**).
       Anteriormente, solo se aceptaban valores de tipo [string](#language.types.string).



### Ejemplos

    **Ejemplo #1 Define una opción de configuración**

&lt;?php
echo ini_get('display_errors');

if (!ini_get('display_errors')) {
ini_set('display_errors', '1');
}

echo ini_get('display_errors');
?&gt;

### Ver también

    - [get_cfg_var()](#function.get-cfg-var) - Devuelve el valor de una opción de PHP

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

    - [ini_get_all()](#function.ini-get-all) - Lee todos los valores de configuración

    - [ini_restore()](#function.ini-restore) - Restaura el valor de la opción de configuración

    -
     [Cómo modificar la configuración](#configuration.changes)

# memory_get_peak_usage

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

memory_get_peak_usage — Devuelve la cantidad máxima de memoria asignada por PHP

### Descripción

**memory_get_peak_usage**([bool](#language.types.boolean) $real_usage = **[false](#constant.false)**): [int](#language.types.integer)

Devuelve la cantidad máxima de memoria, en bytes, que ha sido asignada al script PHP.

### Parámetros

     real_usage


       Definir como **[true](#constant.true)** para obtener el tamaño real de la memoria asignada
       por el sistema. Si este argumento no está definido o vale **[false](#constant.false)**,
       solo se devolverá la memoria utilizada por emalloc().





### Valores devueltos

Devuelve la cantidad de memoria, en bytes.

### Ver también

    - [memory_get_usage()](#function.memory-get-usage) - Indica la cantidad de memoria utilizada por PHP

    - [memory_reset_peak_usage()](#function.memory-reset-peak-usage) - Reinicia el uso máximo de memoria

    - [memory_limit](#ini.memory-limit)

# memory_get_usage

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

memory_get_usage — Indica la cantidad de memoria utilizada por PHP

### Descripción

**memory_get_usage**([bool](#language.types.boolean) $real_usage = **[false](#constant.false)**): [int](#language.types.integer)

Devuelve la cantidad de memoria asignada a PHP en este momento.

### Parámetros

     real_usage


       Definir como **[true](#constant.true)** para obtener el tamaño total de la memoria asignada
       por el sistema. Si este argumento no está definido o es **[false](#constant.false)**,
       solo se retornará la memoria utilizada.





**Nota**:

PHP solo puede rastrear la memoria asignada por emalloc()

### Valores devueltos

Devuelve la cantidad de memoria, en bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo con memory_get_usage()**

&lt;?php
// Esto es solo un ejemplo. Los números a continuación
// variarán según los sistemas y las configuraciones

echo memory_get_usage() . "\n"; // 36640

$a = str_repeat("Hello", 4242);

echo memory_get_usage() . "\n"; // 57960

unset($a);

echo memory_get_usage() . "\n"; // 36744

?&gt;

### Ver también

    - [memory_get_peak_usage()](#function.memory-get-peak-usage) - Devuelve la cantidad máxima de memoria asignada por PHP

    - [memory_limit](#ini.memory-limit)

# memory_reset_peak_usage

(PHP 8 &gt;= 8.2.0)

memory_reset_peak_usage — Reinicia el uso máximo de memoria

### Descripción

**memory_reset_peak_usage**(): [void](language.types.void.html)

Reinicia el uso máximo de memoria devuelto por la
función [memory_get_peak_usage()](#function.memory-get-peak-usage).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de memory_reset_peak_usage()**

&lt;?php

var_dump(memory_get_peak_usage());

$a = str_repeat("Hello", 424242);
var_dump(memory_get_peak_usage());

unset($a);
memory_reset_peak_usage();

$a = str_repeat("Hello", 2424);
var_dump(memory_get_peak_usage());

?&gt;

    Resultado del ejemplo anterior es similar a:

int(422440)
int(2508672)
int(399208)

### Ver también

    - [memory_get_peak_usage()](#function.memory-get-peak-usage) - Devuelve la cantidad máxima de memoria asignada por PHP

# php_ini_loaded_file

(PHP 5 &gt;= 5.2.4, PHP 7, PHP 8)

php_ini_loaded_file — Obtiene la ruta de un archivo php.ini cargado

### Descripción

**php_ini_loaded_file**(): [string](#language.types.string)|[false](#language.types.singleton)

Verifica si un archivo php.ini está cargado y obtiene su ruta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La ruta del archivo php.ini cargado, o **[false](#constant.false)** si no se ha cargado ninguno.

### Ejemplos

    **Ejemplo #1 Ejemplo con php_ini_loaded_file()**

&lt;?php
$inipath = php_ini_loaded_file();

if ($inipath) {
echo 'php.ini cargado : ' . $inipath;
} else {
echo 'No se ha cargado ningún archivo php.ini';
}
?&gt;

    Resultado del ejemplo anterior es similar a:

php.ini cargado : /usr/local/php/php.ini

### Ver también

    - [php_ini_scanned_files()](#function.php-ini-scanned-files) - Devuelve la lista de ficheros .ini analizados en los directorios de configuración adicionales

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

    - [El archivo de configuración](#configuration.file)

# php_ini_scanned_files

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

php_ini_scanned_files — Devuelve la lista de ficheros .ini analizados en los directorios de configuración adicionales

### Descripción

**php_ini_scanned_files**(): [string](#language.types.string)|[false](#language.types.singleton)

**php_ini_scanned_files()** devuelve una lista de nombres de
ficheros de configuración analizados después de php.ini. Esta lista
está en formato CSV. Los directorios examinados son definidos por una opción de
configuración durante la compilación, y opcionalmente por una variable
de entorno durante la ejecución: más información está disponible en el
[guía de instalación](#configuration.file.scan).

Los ficheros de configuración devueltos incluyen la ruta completa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) donde los ficheros .ini están separados por comas en caso
de éxito. Cada coma es seguida por un retorno de línea. Si la directiva de
configuración **--with-config-file-scan-dir** no ha sido
definida y la variable de entorno
PHP_INI_SCAN_DIR no está definida, **[false](#constant.false)** es devuelto.
Si estaba definida y el directorio estaba vacío, una cadena vacía es devuelta.
Si un fichero es ilegible, el fichero será igualmente incluido en el
[string](#language.types.string) devuelto pero también provocará un error PHP.
Este error PHP será visible tanto durante la compilación como al utilizar
**php_ini_scanned_files()**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de lista devuelta por php_ini_scanned_files()**

&lt;?php
if ($filelist = php_ini_scanned_files()) {
    if (strlen($filelist) &gt; 0) {
$files = explode(',', $filelist);

        foreach ($files as $file) {
            echo "&lt;li&gt;" . trim($file) . "&lt;/li&gt;\n";
        }
    }

}
?&gt;

### Ver también

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

    - [php_ini_loaded_file()](#function.php-ini-loaded-file) - Obtiene la ruta de un archivo php.ini cargado

# php_sapi_name

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

php_sapi_name — Devuelve el tipo de interfaz utilizada entre el servidor web y PHP

### Descripción

**php_sapi_name**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una cadena en minúsculas que describe el tipo de interfaz
(la API, SAPI del servidor) que PHP utiliza. Por ejemplo, en PHP CLI,
esta cadena será "cli" mientras que con Apache, puede tener
varios valores diferentes según el SAPI exacto utilizado.
Las posibles valores se listan a continuación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tipo de la interfaz, en forma de
[string](#language.types.string) en minúsculas, o **[false](#constant.false)** si ocurre un error.

A continuación se muestra una lista no exhaustiva de los posibles valores :
apache,
apache2handler,
cgi (hasta PHP 5.3),
cgi-fcgi, cli, cli-server,
embed, fpm-fcgi,
litespeed,
phpdbg.

### Ejemplos

    **Ejemplo #1 Ejemplo con php_sapi_name()**



     Este ejemplo busca la subcadena cgi
     ya que también puede ser cgi-fcgi.

&lt;?php
$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) == 'cgi') {
echo "Se utiliza CGI PHP\n";
} else {
echo "No se utiliza CGI PHP\n";
}
?&gt;

### Notas

**Nota**:
**Un enfoque alternativo**

    La constante PHP **[PHP_SAPI](#constant.php-sapi)** tiene un valor
    idéntico a **php_sapi_name()**.

**Sugerencia**

# Un comportamiento inesperado

    El SAPI definido no debe ser ambiguo, ya que
    por ejemplo, en lugar de apache, puede ser
    definido como apache2handler.

### Ver también

    - [PHP_SAPI](#reserved.constants.core)

# php_uname

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

php_uname — Devuelve información sobre el sistema operativo

### Descripción

**php_uname**([string](#language.types.string) $mode = "a"): [string](#language.types.string)

**php_uname()** devuelve una descripción del sistema
operativo en el que se ejecuta PHP. Es la misma cadena que se ve
al principio de [phpinfo()](#function.phpinfo).
Si solo se desea conocer el nombre del sistema operativo, puede utilizarse
la constante **[PHP_OS](#constant.php-os)**, pero debe tenerse en cuenta que esta
constante contiene el nombre del sistema en el que PHP fue _compilado_.

    En algunas antiguas plataformas Unix, no es posible
    determinar las informaciones corrientes del SO, en cuyo caso esta función
    se limita a devolver el nombre del SO en el que PHP fue compilado.
    Esto solo ocurrirá si la biblioteca uname()
    no existe o no funciona.

### Parámetros

     mode


       mode es un solo carácter que define
       qué información se devolverá:



        -

          'a': Este es el valor por omisión. Devuelve las mismas
          informaciones que los modos individuales
          's', 'n', 'r', 'v', 'm'
          separadas por espacios.





        -

          's': nombre del sistema operativo.
          Por ejemplo, FreeBSD.



        -

          'n': nombre del host. Por ejemplo,
          localhost.example.com.



        -

          'r': nombre de la versión. Por ejemplo,
          5.1.2-RELEASE.



        -

          'v': información sobre la versión.
          Varía enormemente según el sistema operativo.



        -

          'm': tipo de máquina.
          Por ejemplo, i386.







### Valores devueltos

Devuelve la descripción, en forma de [string](#language.types.string).

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Levanta una excepción [ValueError](#class.valueerror) cuando
       se especifica un mode inválido.



### Ejemplos

    **Ejemplo #1 Ejemplos con php_uname()**

&lt;?php
echo php_uname();
echo PHP_OS;

/\* Salidas posibles:
Linux localhost 2.4.21-0.13mdk #1 Fri Mar 14 15:08:06 EST 2003 i686
Linux

FreeBSD localhost 3.2-RELEASE #15: Mon Dec 17 08:46:02 GMT 2001
FreeBSD

Windows NT XN1 5.1 build 2600
WINNT
\*/

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
echo 'El servidor se ejecuta en Windows !';
} else {
echo 'El servidor no se ejecuta en Windows !';
}

?&gt;

Existen también algunas
[constantes PHP
predefinidas](#language.constants.predefined) relacionadas que pueden resultar útiles, por ejemplo:

    **Ejemplo #2 Ejemplos con algunas constantes relacionadas con el sistema**

&lt;?php
// \*nix
echo DIRECTORY_SEPARATOR; // /
echo PHP_SHLIB_SUFFIX; // so
echo PATH_SEPARATOR; // :

// Win\*
echo DIRECTORY_SEPARATOR; // \
echo PHP_SHLIB_SUFFIX; // dll
echo PATH_SEPARATOR; // ;
?&gt;

### Ver también

    - [phpversion()](#function.phpversion) - Devuelve el número de la versión actual de PHP

    - [php_sapi_name()](#function.php-sapi-name) - Devuelve el tipo de interfaz utilizada entre el servidor web y PHP

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

# phpcredits

(PHP 4, PHP 5, PHP 7, PHP 8)

phpcredits — Muestra los créditos de PHP

### Descripción

**phpcredits**([int](#language.types.integer) $flags = **[CREDITS_ALL](#constant.credits-all)**): [true](#language.types.singleton)

Muestra la lista de desarrolladores de PHP, módulos, etc. Genera el
código HTML apropiado para insertar la información en una página.

### Parámetros

     flags


       Para generar una página personalizada sobre los créditos, debe utilizarse
       el argumento flags.







        <caption>**Argumentos predefinidos de phpcredits()**</caption>



           Nombre
           Descripción






           CREDITS_ALL

            Todos los créditos, equivalente a: **[CREDITS_DOCS](#constant.credits-docs)** +
            **[CREDITS_GENERAL](#constant.credits-general)** + **[CREDITS_GROUP](#constant.credits-group)** +
            **[CREDITS_MODULES](#constant.credits-modules)** + **[CREDITS_FULLPAGE](#constant.credits-fullpage)**.
            La función genera entonces una página HTML completa.




           CREDITS_DOCS
           Los créditos del grupo de documentación



           CREDITS_FULLPAGE

            En general, este argumento se utiliza con otras
            constantes. Indica que la página generada debe
            ser una página HTML completa, con todas las etiquetas
            necesarias.




           CREDITS_GENERAL

            Créditos Generales: diseño y concepción del lenguaje,
            autores de PHP y del módulo SAPI.




           CREDITS_GROUP
           Una lista de los desarrolladores principales



           CREDITS_MODULES

            Una lista de las extensiones de PHP y sus autores




           CREDITS_SAPI

            Una lista de las API de servidor para PHP y sus autores










### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con phpcredits()**

&lt;?php
phpcredits(CREDITS_GENERAL);
?&gt;

    **Ejemplo #2 Muestra los desarrolladores principales así como el grupo de documentación**

&lt;?php
phpcredits(CREDITS_GROUP | CREDITS_DOCS | CREDITS_FULLPAGE);
?&gt;

    **Ejemplo #3 Muestra todos los créditos**

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Mi página de créditos&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;?php
// Un poco de su código
phpcredits(CREDITS_ALL - CREDITS_FULLPAGE);
// Más de su código
?&gt;
&lt;/body&gt;
&lt;/html&gt;

### Notas

**Nota**:

    La función **phpcredits()** muestra texto plano
    en lugar de HTML cuando se utiliza en modo CLI.

### Ver también

    - [phpversion()](#function.phpversion) - Devuelve el número de la versión actual de PHP

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

# phpinfo

(PHP 4, PHP 5, PHP 7, PHP 8)

phpinfo — Muestra numerosas informaciones sobre la configuración de PHP

### Descripción

**phpinfo**([int](#language.types.integer) $flags = **[INFO_ALL](#constant.info-all)**): [true](#language.types.singleton)

Muestra numerosas informaciones sobre PHP,
relativas a su configuración actual: opciones de compilación, extensiones,
versión, informaciones sobre el servidor, y el entorno (cuando es
compilado como módulo), entorno PHP, informaciones sobre el sistema,
rutas, valores generales y locales de configuración, encabezados HTTP y
la licencia PHP.

Como todos los sistemas están configurados de manera diferente,
**phpinfo()** sirve generalmente para verificar la
[configuración](#configuration) así como las
[variables predefinidas](#language.variables.predefined),
para una plataforma dada.

**phpinfo()** es una buena herramienta de depuración, ya que
muestra el contenido de todas las variables EGPCS (Entorno, GET,
POST, Cookie, Servidor).

### Parámetros

     flags


       La visualización puede ser personalizada utilizando una o varias de
       las *constantes siguientes*. Estas son combinables con el
       [operador a nivel de bits](#language.operators.bitwise), y deben ser
       pasadas en el argumento flags. También se pueden
       sumar estas constantes.







        <caption>**Opciones de phpinfo()**</caption>



           Nombre de la constante
           Valor
           Descripción






           INFO_GENERAL
           1

            La línea de configuración, la ruta del php.ini, la fecha de
            compilación, el servidor web, el sistema, etc.




           INFO_CREDITS
           2

            Los créditos de PHP. Ver también [phpcredits()](#function.phpcredits).




           INFO_CONFIGURATION
           4

            Valores actuales locales y generales de las directivas PHP.
            Ver también la función [ini_get()](#function.ini-get).




           INFO_MODULES
           8

            Módulos cargados y su configuración específica. Ver también la
            función [get_loaded_extensions()](#function.get-loaded-extensions).




           INFO_ENVIRONMENT
           16

            Informaciones sobre las variables de entorno, que están
            disponibles en la variable [$_ENV](#reserved.variables.environment).




           INFO_VARIABLES
           32

            Muestra todas las
            [variables predefinidas](#language.variables.predefined),
            provenientes del entorno, el método GET, el método POST, las
            cookies y el servidor.




           INFO_LICENSE
           64

            La licencia PHP. Ver también
            [» la FAQ de la licencia](https://www.php.net/license/).




           INFO_ALL
           -1

            Muestra todas las informaciones mencionadas.










### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con phpinfo()**

&lt;?php

// Muestra todas las informaciones, como lo haría INFO_ALL
phpinfo();

// Muestra únicamente el módulo de información.
// phpinfo(8) proporcionaría las mismas informaciones.
phpinfo(INFO_MODULES);

?&gt;

### Notas

**Nota**:

    En las versiones anteriores a PHP 5.5, parte de las informaciones
    mostradas están desactivadas si la directiva
    [expose_php](#ini.expose-php) está configurada con
    el valor off. Esto incluye los logos PHP y Zend,
    así como los créditos.

**Nota**:

    **phpinfo()** muestra texto en lugar de HTML cuando
    se utiliza la versión CLI.

### Ver también

    - [phpversion()](#function.phpversion) - Devuelve el número de la versión actual de PHP

    - [phpcredits()](#function.phpcredits) - Muestra los créditos de PHP

    - [ini_get()](#function.ini-get) - Lee el valor de una opción de configuración

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

    - [get_loaded_extensions()](#function.get-loaded-extensions) - Devuelve la lista de todos los módulos compilados y cargados

    - [las variables predefinidas](#language.variables.predefined)

# phpversion

(PHP 4, PHP 5, PHP 7, PHP 8)

phpversion — Devuelve el número de la versión actual de PHP

### Descripción

**phpversion**([?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el número de la versión actual de PHP.

### Parámetros

     extension


       Un nombre de extensión, opcional.





### Valores devueltos

Devuelve la versión actual de PHP como un [string](#language.types.string).
Si se proporciona un argumento [string](#language.types.string) al parámetro
extension, **phpversion()**
devuelve la versión de esta extensión, o **[false](#constant.false)** si no hay
información de versión asociada o esta extensión no está activada.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       extension ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con phpversion()**

&lt;?php

// muestra el número de versión actual de PHP.
echo 'Versión actual de PHP: ' . phpversion();

// muestra por ejemplo '1.22.3' o nada si esta extensión no está activa
echo phpversion('tidy');
?&gt;

    **Ejemplo #2 Ejemplo con [PHP_VERSION_ID](#constant.php-version-id)**

&lt;?php

/\*\*

- PHP_VERSION_ID se define como un número, donde a mayor número,
- más reciente es la versión de PHP utilizada. Se define como en
- la expresión anterior:
-
- $version_id = $major_version _ 10000 + $minor_version _ 100 + $release_version;
-
- Ahora, con PHP_VERSION_ID, se pueden verificar las funcionalidades
- que esta versión de PHP puede tener, lo que evita usar version_compare()
- cada vez que se verifica si la versión actual de PHP puede no
- soportar una funcionalidad.
-
- Por ejemplo, aquí se pueden definir las constantes PHP\_\*\_VERSION que no
- están disponibles en versiones a partir de 5.2.7.
  \*/

if (PHP_VERSION_ID &lt; 50207) {
define('PHP_MAJOR_VERSION', $version[0]);
define('PHP_MINOR_VERSION', $version[1]);
define('PHP_RELEASE_VERSION', $version[2]);

    // etc.

}

?&gt;

### Notas

**Nota**:

    Esta información también está disponible a través de la constante
    predefinida **[PHP_VERSION](#constant.php-version)**. Más información
    sobre versiones, con las constantes **[PHP_VERSION_*](#constant.php-version-id)**.

**Nota**:

    Algunas extensiones pueden definir su propio número de versión.
    Sin embargo, la mayoría de las extensiones incluidas utilizarán la versión de PHP como número de versión.

### Ver también

    - [las constantes PHP_VERSION](#reserved.constants.core)

    - [version_compare()](#function.version-compare) - Comparar dos strings de versión en el formato de versiones de PHP

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

    - [phpcredits()](#function.phpcredits) - Muestra los créditos de PHP

    - [zend_version()](#function.zend-version) - Lee la versión actual del motor Zend

# putenv

(PHP 4, PHP 5, PHP 7, PHP 8)

putenv — Establece el valor de una variable de entorno

### Descripción

**putenv**([string](#language.types.string) $assignment): [bool](#language.types.boolean)

Agrega setting al entorno del servidor. La
variable de entorno existirá únicamente durante la petición actual. Al
final de la petición el entorno es recuperado a su estado original.

### Parámetros

     asignación


       El parámetro, como p.ej. "FOO=BAR"





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Definición de una variable de entorno**

&lt;?php
putenv("UNIQID=$uniqid");
?&gt;

### Ver también

    - [getenv()](#function.getenv) - Retorna el valor de una o todas las variables de entorno

    - [apache_setenv()](#function.apache-setenv) - Establece una variable subprocess_env de Apache

# restore_include_path

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7)

restore_include_path — Restaura el valor de la directiva de configuración include_path

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**restore_include_path**(): [void](language.types.void.html)

Restaura el valor de la directiva de configuración
[include_path](#ini.include-path)
a su valor original al inicio del script, tal como se indica
en el php.ini.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido eliminada.




      7.4.0

       Esta función está obsoleta.



### Ejemplos

    **Ejemplo #1 Ejemplo con restore_include_path()**

&lt;?php

echo get_include_path(); // .:/usr/local/lib/php

set_include_path('/inc');

echo get_include_path(); // /inc

restore_include_path();

// O usar ini_restore()
ini_restore('include_path');

echo get_include_path(); // .:/usr/local/lib/php

?&gt;

### Ver también

    - [ini_restore()](#function.ini-restore) - Restaura el valor de la opción de configuración

    - [get_include_path()](#function.get-include-path) - Lee el valor de la directiva de configuración include_path

    - [set_include_path()](#function.set-include-path) - Modifica el valor de la directiva de configuración include_path

    - [include](#function.include) - include

# set_include_path

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

set_include_path — Modifica el valor de la directiva de configuración include_path

### Descripción

**set_include_path**([string](#language.types.string) $include_path): [string](#language.types.string)|[false](#language.types.singleton)

Modifica el valor de la directiva de configuración
[include_path](#ini.include-path),
durante la ejecución del script en curso.

### Parámetros

     include_path


       El nuevo valor para la directiva de configuración
       [include_path](#ini.include-path)





### Valores devueltos

Devuelve el valor anterior de
[include_path](#ini.include-path) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con set_include_path()**

&lt;?php
set_include_path('/usr/lib/pear');

// O usar ini_set()
ini_set('include_path', '/usr/lib/pear');
?&gt;

    **Ejemplo #2 Añadir al camino de inclusión**



     Usando la constante **[PATH_SEPARATOR](#constant.path-separator)**, es
     posible extender el camino de inclusión según el sistema.




     En este ejemplo, se añade /usr/lib/pear
     al final del actual include_path.

&lt;?php
$path = '/usr/lib/pear';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?&gt;

### Ver también

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

    - [get_include_path()](#function.get-include-path) - Lee el valor de la directiva de configuración include_path

    - [restore_include_path()](#function.restore-include-path) - Restaura el valor de la directiva de configuración include_path

    - [include](#function.include) - include

# set_time_limit

(PHP 4, PHP 5, PHP 7, PHP 8)

set_time_limit — Establece el tiempo máximo de ejecución de un script

### Descripción

**set_time_limit**([int](#language.types.integer) $seconds): [bool](#language.types.boolean)

Establece el tiempo de expiración de un script, en segundos. Si se alcanza este límite,
el script se interrumpe y se genera un error fatal. El valor por omisión es
30 segundos o, si está definido, el valor de la directiva max_execution_time
en el php.ini.

    Cuando se invoca, **set_time_limit()** reinicia el contador.
    En otras palabras, si el límite por omisión es de 30 segundos, y después
    de 25 segundos de ejecución del script se realiza la llamada set_time_limit(20),
    entonces el script ejecutará un total de 45 segundos antes de finalizar.

### Parámetros

     seconds


       El tiempo máximo de ejecución, en segundos. Si es 0, no se establece límite alguno.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    La función **set_time_limit()** y la directiva de configuración
    [max_execution_time](#ini.max-execution-time) solo afectan al tiempo de ejecución del script en sí.
    Todo tiempo pasado fuera del script, como llamadas al sistema utilizando [system()](#function.system),
    operaciones en flujos, consultas a bases de datos, etc., no se tienen en cuenta al calcular la duración máxima de ejecución del script.
    Esto no es válido en Windows donde el tiempo medido es el tiempo real.

### Ver también

    - [max_execution_time](#ini.max-execution-time)

    - [max_input_time](#ini.max-input-time)

# sys_get_temp_dir

(PHP 5 &gt;= 5.2.1, PHP 7, PHP 8)

sys_get_temp_dir — Devuelve la ruta del directorio utilizado para los ficheros temporales

### Descripción

**sys_get_temp_dir**(): [string](#language.types.string)

Devuelve la ruta del directorio PHP donde se almacenan
los ficheros temporales por defecto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta del directorio temporal.

### Ejemplos

    **Ejemplo #1 Ejemplo con sys_get_temp_dir()**

&lt;?php
// Creación de un fichero temporal en el directorio
// de ficheros temporales, utilizando la función sys_get_temp_dir()
$temp_file = tempnam(sys_get_temp_dir(), 'Tux');

echo $temp_file;
?&gt;

    Resultado del ejemplo anterior es similar a:

C:\Windows\Temp\TuxA318.tmp

### Ver también

    - [tmpfile()](#function.tmpfile) - Crea un fichero temporal

    - [tempnam()](#function.tempnam) - Crea un fichero con un nombre único

# version_compare

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

version_compare — Comparar dos strings de versión en el formato de versiones de PHP

### Descripción

**version_compare**([string](#language.types.string) $version1, [string](#language.types.string) $version2, [?](#language.types.null)[string](#language.types.string) $operator = **[null](#constant.null)**): [int](#language.types.integer)|[bool](#language.types.boolean)

**version_compare()** compara dos versiones de PHP
estandarizadas.

**version_compare()** reemplaza inicialmente
\_, - y + por un
punto (.) en los strings de versión y también inserta
puntos antes y después de cualquier carácter no numérico para que, por ejemplo,
'4.3.5RC1' se convierta en '4.3.5.RC.1'. Luego, compara los fragmentos
de izquierda a derecha. Si una parte contiene caracteres alfabéticos,
estos son gestionados en el siguiente orden:
any string not found in this list &lt;
dev &lt; alpha =
a &lt; beta =
b &lt; RC =
rc &lt; # &lt;
pl = p. De esta manera, es posible
comparar no solo versiones de diferentes niveles,
como '4.1' y '4.1.2', sino también versiones
de desarrollo de PHP, en cualquier etapa.

### Parámetros

     version1


       Primer número de versión.






     version2


       Segundo número de versión.






     operator


       Un operador opcional. Los operadores posibles son:
       &lt;, lt,
       &lt;=, le, &gt;,
       gt, &gt;=, ge,
       ==, =, eq,
       !=, &lt;&gt;, ne
       respectivamente.




       Este parámetro es sensible a mayúsculas/minúsculas, por lo que los valores deben
       estar en minúsculas.





### Valores devueltos

Por omisión, **version_compare()** devuelve
-1 si la primera versión es inferior
a la segunda, 0 si son iguales, y
1 si la segunda es inferior a la primera.

Cuando se utiliza el parámetro opcional operator,
la función devuelve **[true](#constant.true)** si la relación es la especificada por el operador,
**[false](#constant.false)** en caso contrario.

### Ejemplos

Los ejemplos siguientes utilizan la constante
**[PHP_VERSION](#constant.php-version)**, sabiendo que contiene el valor
de la versión de PHP utilizada para ejecutar el código.

    **Ejemplo #1 Ejemplo con version_compare()**

&lt;?php
if (version_compare(PHP_VERSION, '7.0.0') &gt;= 0) {
echo 'Tengo al menos la versión 7.0.0 de PHP; mi versión: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.3.0') &gt;= 0) {
echo 'Tengo al menos la versión 5.3.0 de PHP; mi versión: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '&gt;=')) {
echo 'Tengo al menos la versión 5.0.0 de PHP; mi versión: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '&lt;')) {
echo 'Aún utilizo PHP 4; mi versión: ' . PHP_VERSION . "\n";
}
?&gt;

### Notas

**Nota**:

    La constante **[PHP_VERSION](#constant.php-version)** contiene la versión actual de PHP.

**Nota**:

    Tenga en cuenta que las versiones intermedias, como 5.3.0-dev, son
    consideradas inferiores a sus versiones finales (como 5.3.0).

**Nota**:

    Los strings especiales de versión como alpha y
    beta son sensibles a mayúsculas/minúsculas. Los strings de versión
    provenientes de fuentes arbitrarias que no siguen el estándar de PHP
    deben ser convertidos a minúsculas utilizando la función
    [strtolower()](#function.strtolower) antes de llamar a la función
    **version_compare()**.

### Ver también

    - [phpversion()](#function.phpversion) - Devuelve el número de la versión actual de PHP

    - [php_uname()](#function.php-uname) - Devuelve información sobre el sistema operativo

    - [function_exists()](#function.function-exists) - Indica si una función está definida

# zend_thread_id

(PHP 5, PHP 7, PHP 8)

zend_thread_id — Devuelve un identificador único del hilo actual

### Descripción

**zend_thread_id**(): [int](#language.types.integer)

Esta función devuelve un identificador único para el hilo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador del hilo, en forma de [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con zend_thread_id()**

&lt;?php
$thread_id = zend_thread_id();

echo 'ID del hilo actual : ' . $thread_id;
?&gt;

    Resultado del ejemplo anterior es similar a:

ID del hilo actual : 7864

### Notas

**Nota**:

    Esta función solo está disponible si PHP ha sido compilado con soporte ZTS
    (Zend Thread Safety) y el modo de depuración
    (--enable-debug).

# zend_version

(PHP 4, PHP 5, PHP 7, PHP 8)

zend_version — Lee la versión actual del motor Zend

### Descripción

**zend_version**(): [string](#language.types.string)

Devuelve una cadena que contiene el número de versión del motor de análisis Zend actualmente en uso.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de versión del motor Zend, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo con zend_version()**

&lt;?php
echo "Versión del motor Zend: " . zend_version();
?&gt;

    Resultado del ejemplo anterior es similar a:

Versión del motor Zend: 2.2.0

### Ver también

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

    - [phpcredits()](#function.phpcredits) - Muestra los créditos de PHP

    - [phpversion()](#function.phpversion) - Devuelve el número de la versión actual de PHP

## Tabla de contenidos

- [assert](#function.assert) — Verifica una aserción
- [assert_options](#function.assert-options) — Define/recupere diferentes opciones de aserciones
- [cli_get_process_title](#function.cli-get-process-title) — Devuelve el título del proceso actual
- [cli_set_process_title](#function.cli-set-process-title) — Define el título del proceso
- [dl](#function.dl) — Carga una extensión PHP dinámicamente
- [extension_loaded](#function.extension-loaded) — Determina si una extensión está cargada o no
- [gc_collect_cycles](#function.gc-collect-cycles) — Fuerza la recolección de los ciclos de basura existentes
- [gc_disable](#function.gc-disable) — Desactiva el recolector de referencia circular
- [gc_enable](#function.gc-enable) — Activa el colector de referencia circular
- [gc_enabled](#function.gc-enabled) — Devuelve el estado del colector de referencia circular
- [gc_mem_caches](#function.gc-mem-caches) — Libera memoria utilizada por el gestor de memoria de Zend Engine
- [gc_status](#function.gc-status) — Obtiene información sobre el recolector de basura
- [get_cfg_var](#function.get-cfg-var) — Devuelve el valor de una opción de PHP
- [get_current_user](#function.get-current-user) — Devuelve el nombre del propietario del script actual
- [get_defined_constants](#function.get-defined-constants) — Devuelve la lista de constantes y sus valores
- [get_extension_funcs](#function.get-extension-funcs) — Lista las funciones de una extensión
- [get_include_path](#function.get-include-path) — Lee el valor de la directiva de configuración include_path
- [get_included_files](#function.get-included-files) — Devuelve un array con los nombres de los ficheros que son incluidos en un script
- [get_loaded_extensions](#function.get-loaded-extensions) — Devuelve la lista de todos los módulos compilados y cargados
- [get_magic_quotes_gpc](#function.get-magic-quotes-gpc) — Devuelve la configuración actual de la opción magic_quotes_gpc
- [get_magic_quotes_runtime](#function.get-magic-quotes-runtime) — Devuelve la configuración actual de la opción magic_quotes_runtime
- [get_required_files](#function.get-required-files) — Alias de
  get_included_files
- [get_resources](#function.get-resources) — Devuelve los recursos activos
- [getenv](#function.getenv) — Retorna el valor de una o todas las variables de entorno
- [getlastmod](#function.getlastmod) — Devuelve la fecha de última modificación de la página
- [getmygid](#function.getmygid) — Retorna el GID del propietario del script
- [getmyinode](#function.getmyinode) — Devuelve el inodo del script
- [getmypid](#function.getmypid) — Devuelve el número de proceso actual de PHP
- [getmyuid](#function.getmyuid) — Retorna el UID del propietario del script actual
- [getopt](#function.getopt) — Lee las opciones pasadas en la línea de comandos
- [getrusage](#function.getrusage) — Devuelve el nivel de utilización de los recursos
- [ini_alter](#function.ini-alter) — Alias de ini_set
- [ini_get](#function.ini-get) — Lee el valor de una opción de configuración
- [ini_get_all](#function.ini-get-all) — Lee todos los valores de configuración
- [ini_parse_quantity](#function.ini-parse-quantity) — Devuelve el tamaño interpretado a partir de la sintaxis abreviada ini
- [ini_restore](#function.ini-restore) — Restaura el valor de la opción de configuración
- [ini_set](#function.ini-set) — Modifica el valor de una opción de configuración
- [memory_get_peak_usage](#function.memory-get-peak-usage) — Devuelve la cantidad máxima de memoria asignada por PHP
- [memory_get_usage](#function.memory-get-usage) — Indica la cantidad de memoria utilizada por PHP
- [memory_reset_peak_usage](#function.memory-reset-peak-usage) — Reinicia el uso máximo de memoria
- [php_ini_loaded_file](#function.php-ini-loaded-file) — Obtiene la ruta de un archivo php.ini cargado
- [php_ini_scanned_files](#function.php-ini-scanned-files) — Devuelve la lista de ficheros .ini analizados en los directorios de configuración adicionales
- [php_sapi_name](#function.php-sapi-name) — Devuelve el tipo de interfaz utilizada entre el servidor web y PHP
- [php_uname](#function.php-uname) — Devuelve información sobre el sistema operativo
- [phpcredits](#function.phpcredits) — Muestra los créditos de PHP
- [phpinfo](#function.phpinfo) — Muestra numerosas informaciones sobre la configuración de PHP
- [phpversion](#function.phpversion) — Devuelve el número de la versión actual de PHP
- [putenv](#function.putenv) — Establece el valor de una variable de entorno
- [restore_include_path](#function.restore-include-path) — Restaura el valor de la directiva de configuración include_path
- [set_include_path](#function.set-include-path) — Modifica el valor de la directiva de configuración include_path
- [set_time_limit](#function.set-time-limit) — Establece el tiempo máximo de ejecución de un script
- [sys_get_temp_dir](#function.sys-get-temp-dir) — Devuelve la ruta del directorio utilizado para los ficheros temporales
- [version_compare](#function.version-compare) — Comparar dos strings de versión en el formato de versiones de PHP
- [zend_thread_id](#function.zend-thread-id) — Devuelve un identificador único del hilo actual
- [zend_version](#function.zend-version) — Lee la versión actual del motor Zend

- [Introducción](#intro.info)
- [Instalación/Configuración](#info.setup)<li>[Configuración en tiempo de ejecución](#info.configuration)
  </li>- [Constantes predefinidas](#info.constants)
- [Funciones de Opciones/Info de PHP](#ref.info)<li>[assert](#function.assert) — Verifica una aserción
- [assert_options](#function.assert-options) — Define/recupere diferentes opciones de aserciones
- [cli_get_process_title](#function.cli-get-process-title) — Devuelve el título del proceso actual
- [cli_set_process_title](#function.cli-set-process-title) — Define el título del proceso
- [dl](#function.dl) — Carga una extensión PHP dinámicamente
- [extension_loaded](#function.extension-loaded) — Determina si una extensión está cargada o no
- [gc_collect_cycles](#function.gc-collect-cycles) — Fuerza la recolección de los ciclos de basura existentes
- [gc_disable](#function.gc-disable) — Desactiva el recolector de referencia circular
- [gc_enable](#function.gc-enable) — Activa el colector de referencia circular
- [gc_enabled](#function.gc-enabled) — Devuelve el estado del colector de referencia circular
- [gc_mem_caches](#function.gc-mem-caches) — Libera memoria utilizada por el gestor de memoria de Zend Engine
- [gc_status](#function.gc-status) — Obtiene información sobre el recolector de basura
- [get_cfg_var](#function.get-cfg-var) — Devuelve el valor de una opción de PHP
- [get_current_user](#function.get-current-user) — Devuelve el nombre del propietario del script actual
- [get_defined_constants](#function.get-defined-constants) — Devuelve la lista de constantes y sus valores
- [get_extension_funcs](#function.get-extension-funcs) — Lista las funciones de una extensión
- [get_include_path](#function.get-include-path) — Lee el valor de la directiva de configuración include_path
- [get_included_files](#function.get-included-files) — Devuelve un array con los nombres de los ficheros que son incluidos en un script
- [get_loaded_extensions](#function.get-loaded-extensions) — Devuelve la lista de todos los módulos compilados y cargados
- [get_magic_quotes_gpc](#function.get-magic-quotes-gpc) — Devuelve la configuración actual de la opción magic_quotes_gpc
- [get_magic_quotes_runtime](#function.get-magic-quotes-runtime) — Devuelve la configuración actual de la opción magic_quotes_runtime
- [get_required_files](#function.get-required-files) — Alias de
  get_included_files
- [get_resources](#function.get-resources) — Devuelve los recursos activos
- [getenv](#function.getenv) — Retorna el valor de una o todas las variables de entorno
- [getlastmod](#function.getlastmod) — Devuelve la fecha de última modificación de la página
- [getmygid](#function.getmygid) — Retorna el GID del propietario del script
- [getmyinode](#function.getmyinode) — Devuelve el inodo del script
- [getmypid](#function.getmypid) — Devuelve el número de proceso actual de PHP
- [getmyuid](#function.getmyuid) — Retorna el UID del propietario del script actual
- [getopt](#function.getopt) — Lee las opciones pasadas en la línea de comandos
- [getrusage](#function.getrusage) — Devuelve el nivel de utilización de los recursos
- [ini_alter](#function.ini-alter) — Alias de ini_set
- [ini_get](#function.ini-get) — Lee el valor de una opción de configuración
- [ini_get_all](#function.ini-get-all) — Lee todos los valores de configuración
- [ini_parse_quantity](#function.ini-parse-quantity) — Devuelve el tamaño interpretado a partir de la sintaxis abreviada ini
- [ini_restore](#function.ini-restore) — Restaura el valor de la opción de configuración
- [ini_set](#function.ini-set) — Modifica el valor de una opción de configuración
- [memory_get_peak_usage](#function.memory-get-peak-usage) — Devuelve la cantidad máxima de memoria asignada por PHP
- [memory_get_usage](#function.memory-get-usage) — Indica la cantidad de memoria utilizada por PHP
- [memory_reset_peak_usage](#function.memory-reset-peak-usage) — Reinicia el uso máximo de memoria
- [php_ini_loaded_file](#function.php-ini-loaded-file) — Obtiene la ruta de un archivo php.ini cargado
- [php_ini_scanned_files](#function.php-ini-scanned-files) — Devuelve la lista de ficheros .ini analizados en los directorios de configuración adicionales
- [php_sapi_name](#function.php-sapi-name) — Devuelve el tipo de interfaz utilizada entre el servidor web y PHP
- [php_uname](#function.php-uname) — Devuelve información sobre el sistema operativo
- [phpcredits](#function.phpcredits) — Muestra los créditos de PHP
- [phpinfo](#function.phpinfo) — Muestra numerosas informaciones sobre la configuración de PHP
- [phpversion](#function.phpversion) — Devuelve el número de la versión actual de PHP
- [putenv](#function.putenv) — Establece el valor de una variable de entorno
- [restore_include_path](#function.restore-include-path) — Restaura el valor de la directiva de configuración include_path
- [set_include_path](#function.set-include-path) — Modifica el valor de la directiva de configuración include_path
- [set_time_limit](#function.set-time-limit) — Establece el tiempo máximo de ejecución de un script
- [sys_get_temp_dir](#function.sys-get-temp-dir) — Devuelve la ruta del directorio utilizado para los ficheros temporales
- [version_compare](#function.version-compare) — Comparar dos strings de versión en el formato de versiones de PHP
- [zend_thread_id](#function.zend-thread-id) — Devuelve un identificador único del hilo actual
- [zend_version](#function.zend-version) — Lee la versión actual del motor Zend
  </li>
