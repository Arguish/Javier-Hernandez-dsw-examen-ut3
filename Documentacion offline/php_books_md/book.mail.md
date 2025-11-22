# Mail

# Introducción

La función [mail()](#function.mail) permite enviar correos.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mail.requirements)
- [Configuración en tiempo de ejecución](#mail.configuration)

    ## Requerimientos

    Para que la función [mail()](#function.mail) esté disponible,
    es necesario que PHP tenga acceso al servicio sendmail
    en el servidor durante la compilación. Si se utiliza otro programa de correo,
    como qmail o postfix,
    asegúrese de utilizar las API correctas. PHP comenzará a buscar sendmail en el PATH,
    y luego, en los siguientes directorios:
    /usr/bin:/usr/sbin:/usr/etc:/etc:/usr/ucblib:/usr/lib.
    Se recomienda encarecidamente tener sendmail disponible en el PATH. Además,
    el usuario que compile PHP debe tener los permisos necesarios para acceder al ejecutable sendmail.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración para el correo**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [mail.add_x_header](#ini.mail.add-x-header)
      "0"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [mail.mixed_lf_and_crlf](#ini.mail.mixed_lf_and_crlf)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**|**[INI_PERDIR](#constant.ini-perdir)**
      Disponible a partir de PHP 8.2.4



      [mail.log](#ini.mail.log)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**|**[INI_PERDIR](#constant.ini-perdir)**
       



     [mail.force_extra_parameters](#ini.mail.force_extra_parameters)
     NULL
     **[INI_SYSTEM](#constant.ini-system)**|**[INI_PERDIR](#constant.ini-perdir)**
      



      [SMTP](#ini.smtp)
      "localhost"
      **[INI_ALL](#constant.ini-all)**
       



      [smtp_port](#ini.smtp-port)
      "25"
      **[INI_ALL](#constant.ini-all)**
       



      [sendmail_from](#ini.sendmail-from)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [sendmail_path](#ini.sendmail-path)
      "/usr/sbin/sendmail -t -i"
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     mail.add_x_header
     [bool](#language.types.boolean)



      Se añade un encabezado X-PHP-Originating-Script que incluye
      el UID del script, seguido por el nombre del fichero.








     mail.log
     [string](#language.types.string)



      La ruta del registro de todos los llamados a la función [mail()](#function.mail).
      Las entradas del registro incluyen la ruta completa hacia el script, el número de la línea,
      las direcciones To así como los encabezados.








     mail.mixed_lf_and_crlf
     [bool](#language.types.boolean)



      Permite volver al indicador de fin de línea para los encabezados de correo electrónico y los cuerpos de mensaje en LF (Line Feed),
      imitando el comportamiento no conforme de PHP 7. Se proporciona como medida de compatibilidad
      para ciertos Agentes de Transferencia de Correo (MTA) no conformes que fallan al tratar correctamente CRLF
      (Retorno de carro + Line Feed) como indicador de fin de línea en los encabezados de correo electrónico y el contenido de los mensajes.








     mail.force_extra_parameters
     [string](#language.types.string)



      Permite forzar la adición del parámetro especificado como
      parámetro adicional para sendmail. Estos parámetros reemplazarán
      al quinto parámetro de la función [mail()](#function.mail).








     smtp
     [string](#language.types.string)



      Solo en Windows: nombre del host o dirección IP del SMTP que PHP debe utilizar
      para enviar un correo con la función [mail()](#function.mail).








     smtp_port
     [int](#language.types.integer)



      Solo en Windows: número de puerto a utilizar para conectarse
      al servidor SMTP al enviar correo con
      la función [mail()](#function.mail); por omisión, es 25.








     sendmail_from
     [string](#language.types.string)



      Solo en Windows: valor del campo "From:" que
      debe ser utilizado al enviar correo vía SMTP (solo en Windows).
      Esta directiva definirá también el encabezado "Return-Path:".








     sendmail_path
     [string](#language.types.string)



      Localización del programa **sendmail**: habitualmente
      /usr/sbin/sendmail o /usr/lib/sendmail.
      **configure** intenta detectar la presencia de sendmail
      por sí mismo, y asigna este resultado por omisión. En caso de
      problemas de localización, puede establecerse un nuevo valor por omisión aquí.




      Todo sistema que no utilice **sendmail** debe establecer esta
      directiva al camino del programa de sustitución que reemplaza al servidor de correo, si aquel existe. Por ejemplo, los usuarios de
      [» Qmail](http://cr.yp.to/qmail.html) pueden definirla a
     /var/qmail/bin/sendmail o
     /var/qmail/bin/qmail-inject.




      **qmail-inject** no requiere opciones para
      tratar correctamente el correo.




      Esta directiva funciona también en Windows. Si está definida, smtp,
      smtp_port y sendmail_from son
      ignorados y se ejecuta el comando especificado.


# Funciones de mail

# ezmlm_hash

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7)

ezmlm_hash — Calcula el hash solicitado por EZMLM

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**ezmlm_hash**([string](#language.types.string) $addr): [int](#language.types.integer)

**ezmlm_hash()** calcula el hash necesario
durante la gestión de listas de difusión EZMLM con una base
de datos MySQL.

### Parámetros

     addr


       La dirección de correo electrónico que debe ser hasheada.





### Valores devueltos

El valor del hash de addr.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido eliminada.




      7.2.0

       Esta función está obsoleta.



### Ejemplos

    **Ejemplo #1 Cálculo del hash y registro de un usuario de lista de
      difusión**

&lt;?php

     $user = "joecool@example.com";
     $hash = ezmlm_hash($user);
     $query = sprintf("INSERT INTO sample VALUES (%s, '%s')", $hash, $user);
     $db-&gt;query($query); // utilización de la interfaz PHPLIB

?&gt;

# mail

(PHP 4, PHP 5, PHP 7, PHP 8)

mail — Envío de correo

### Descripción

**mail**(
    [string](#language.types.string) $to,
    [string](#language.types.string) $subject,
    [string](#language.types.string) $message,
    [array](#language.types.array)|[string](#language.types.string) $additional_headers = [],
    [string](#language.types.string) $additional_params = ""
): [bool](#language.types.boolean)

Envía un correo.

### Parámetros

     to


       El o los destinatarios del correo.




       El formato de esta cadena debe corresponder con la
       [» RFC 2822](https://datatracker.ietf.org/doc/html/rfc2822). A continuación se muestran algunos ejemplos:



        - destinatario@example.com

        - destinatario@example.com, otro_destinatario@example.com

        - Destinatario <destinatario></destinatario>

        - Destinatario <destinatario>, Otro destinatario <otro_destinatario></otro_destinatario></destinatario>






     subject


       Asunto del correo a enviar.



      **Precaución**

        El asunto debe cumplir con la [» RFC 2047](https://datatracker.ietf.org/doc/html/rfc2047).







     message


       Mensaje a enviar.




       Cada línea debe estar separada por un carácter CRLF
       (\r\n). Las líneas no deben contener más de 70 caracteres.



      **Precaución**

        (Solo Windows) Cuando PHP se comunica directamente con un servidor
        SMTP, si se encuentra un punto al inicio de una línea, será eliminado.
        Para evitar este comportamiento, reemplace estas ocurrencias con dos puntos.


&lt;?php
$text = str_replace("\n.", "\n..", $text);
?&gt;

     additional_headers (opcional)


       [String](#language.types.string) o [array](#language.types.array) a insertar al final de los encabezados del correo.




       Este parámetro se utiliza típicamente para añadir encabezados adicionales
       (From, Cc y Bcc). Los encabezados adicionales deben estar
       separados por un carácter CRLF (\r\n).
       Si se utilizan datos externos para componer este encabezado, deben
       ser limpiados primero para evitar la inyección de datos no deseados
       en los encabezados.




       Si se pasa un [array](#language.types.array), sus claves son los nombres de los encabezados y
       sus valores son los valores de los encabezados respectivos.



      **Nota**:



        Al enviar un correo, el correo *debe*
        contener un encabezado From. Puede ser
        definido por el parámetro additional_headers,
        o puede ser un valor predeterminado definido en el php.ini.




        No hacerlo causará un mensaje de error similar a
        Warning: mail(): "sendmail_from" not
         set in php.ini or custom "From:" header missing.
        El encabezado From también define el encabezado
        Return-Path al enviar directamente vía SMTP (solo Windows).




      **Nota**:



        Si el mensaje no es recibido, intente utilizar únicamente un carácter
        LF (\n).
        Algunos agentes de transferencia de correo Unix (por ejemplo
        [» qmail](http://cr.yp.to/qmail.html))
        reemplazan automáticamente el carácter LF por el
        carácter CRLF
        (lo que equivale a duplicar el carácter CR
        si se utiliza el carácter CRLF).
        Esto debe ser un último recurso ya que no cumple
        con la [» RFC 2822](https://datatracker.ietf.org/doc/html/rfc2822).







     additional_params (opcional)


       El parámetro additional_params
       puede ser utilizado para pasar banderas adicionales como opciones
       a la línea de comandos configurada para ser utilizada para enviar los
       correos utilizando el parámetro de configuración sendmail_path.
       Por ejemplo, esto puede ser utilizado para definir la dirección
       del remitente del sobre al utilizar sendmail con la opción
       -f.




       Este parámetro es escapado por la función [escapeshellcmd()](#function.escapeshellcmd) internamente
       para prevenir la ejecución de un comando. La función [escapeshellcmd()](#function.escapeshellcmd)
       previene la ejecución de un comando, pero permite añadir parámetros adicionales.
       Por razones de seguridad, se recomienda al usuario limpiar este parámetro
       para evitar añadir parámetros no deseados al comando shell.




       Dado que la función [escapeshellcmd()](#function.escapeshellcmd) se aplica automáticamente,
       algunos caracteres permitidos en las direcciones de correo por las RFCs de internet ya no pueden
       ser utilizados. La función **mail()** no puede permitir estos caracteres,
       por lo tanto, en los programas donde su utilización es necesaria, debería utilizarse
       un método alternativo para el envío de correos (como el uso de un framework
       o una biblioteca.




       El usuario bajo el cual se ejecuta el servidor web debe ser añadido como usuario de confianza
       en la configuración de sendmail para que el encabezado X-Warning
       no sea añadido al mensaje cuando el remitente del sobre (-f) es
       definido utilizando este método. Para los usuarios de sendmail, este archivo es
       /etc/mail/trusted-users.





### Valores devueltos

Devuelve **[true](#constant.true)** si el correo ha sido aceptado para su entrega, **[false](#constant.false)** en caso contrario.

Es importante tener en cuenta que el hecho de que el correo haya sido aceptado para su entrega
no garantiza que llegue a su destino.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        El parámetro additional_headers ahora acepta
        [array](#language.types.array).





### Ejemplos

    **Ejemplo #1 Envío de un correo**



     Uso de la función **mail()** para enviar un correo simple:

&lt;?php
// El mensaje
$message = "Line 1\r\nLine 2\r\nLine 3";

// En caso de que nuestras líneas contengan más de 70 caracteres, las cortamos utilizando wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Envío del correo
mail('caffeinated@example.com', 'Mi Asunto', $message);
?&gt;

    **Ejemplo #2 Envío de un correo con encabezados adicionales**



     Añadir encabezados simples, especificando al MUA las direcciones
     "From" y "Reply-To":

&lt;?php
$to = 'persona@example.com';
$subject = 'el asunto';
$message = '¡Hola!';
$headers = 'From: webmaster@example.com' . "\r\n" .
'Reply-To: webmaster@example.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);

?&gt;

    **Ejemplo #3 Envío de un correo con un [array](#language.types.array) de encabezados adicionales**



     Este ejemplo envía el mismo correo que el ejemplo anterior, pero pasa
     los encabezados adicionales como un array (disponible desde PHP
     7.2.0).

&lt;?php
$to      = 'nadie@example.com';
$subject = 'el asunto';
$message = 'hola';
$headers = array(
'From' =&gt; 'webmaster@example.com',
'Reply-To' =&gt; 'webmaster@example.com',
'X-Mailer' =&gt; 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);
?&gt;

    **Ejemplo #4 Envío de un correo con un parámetro adicional de línea de comandos**



     El parámetro additional_params
     puede ser utilizado para pasar un parámetro adicional al programa configurado
     para ser utilizado para enviar los correos utilizando sendmail_path.

&lt;?php
mail('persona@example.com', 'el asunto', 'el mensaje', null,
'-fwebmaster@example.com');
?&gt;

    **Ejemplo #5 Envío de correo HTML**



     También es posible enviar correos HTML con la función
     **mail()**.

&lt;?php
// Varios destinatarios
$to = 'johny@example.com, sally@example.com'; // note la coma

     // Asunto
     $subject = 'Calendario de cumpleaños para Agosto';

     // mensaje
     $message = '
     &lt;html&gt;
      &lt;head&gt;
       &lt;title&gt;Calendario de cumpleaños para Agosto&lt;/title&gt;
      &lt;/head&gt;
      &lt;body&gt;
       &lt;p&gt;¡Aquí están los cumpleaños que se avecinan en el mes de Agosto!&lt;/p&gt;
       &lt;table&gt;
        &lt;tr&gt;
         &lt;th&gt;Persona&lt;/th&gt;&lt;th&gt;Día&lt;/th&gt;&lt;th&gt;Mes&lt;/th&gt;&lt;th&gt;Año&lt;/th&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
         &lt;td&gt;Josiane&lt;/td&gt;&lt;td&gt;3&lt;/td&gt;&lt;td&gt;Agosto&lt;/td&gt;&lt;td&gt;1970&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
         &lt;td&gt;Emma&lt;/td&gt;&lt;td&gt;26&lt;/td&gt;&lt;td&gt;Agosto&lt;/td&gt;&lt;td&gt;1973&lt;/td&gt;
        &lt;/tr&gt;
       &lt;/table&gt;
      &lt;/body&gt;
     &lt;/html&gt;
     ';

     // Para enviar un correo HTML, el encabezado Content-type debe ser definido
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // Encabezados adicionales
     $headers[] = 'To: Mary &lt;mary@example.com&gt;, Kelly &lt;kelly@example.com&gt;';
     $headers[] = 'From: Cumpleaños &lt;cumpleanos@example.com&gt;';
     $headers[] = 'Cc: cumpleanos_archivo@example.com';
     $headers[] = 'Bcc: cumpleanos_verif@example.com';

     // Envío
     mail($to, $subject, $message, implode("\r\n", $headers));

?&gt;

**Nota**:

     Si se planea enviar correos HTML u otros más complejos,
     se recomienda utilizar el paquete PEAR [» PEAR::Mail_Mime](https://pear.php.net/package/Mail_Mime).

### Notas

**Nota**:

    La implementación SMTP (solo en Windows) de la función
    **mail()** difiere significativamente de
    la implementación de sendmail. En primer lugar, no utiliza
    un programa local para componer los mensajes, sino que opera únicamente y
    directamente sobre los sockets, lo que significa que un MTA
    está necesariamente escuchando en un socket de red (que puede estar en la red local o en una máquina remota).




    En segundo lugar, los encabezados personalizados como
    From:,
    Cc:,
    Bcc: y
    Date: no son
    **interpretados** por el
    MTA en primer lugar, sino que son analizados por PHP.




    Además, el parámetro to no debe ser una dirección en el formato "Algo &lt;alguien@example.com&gt;".
    El comando mail no analizará correctamente esto al comunicarse con el MTA.

**Nota**:

    Es importante tener en cuenta que la función **mail()**
    no está recomendada para manejar grandes volúmenes de correos en un bucle.
    Esta función abre y cierra un socket SMTP para cada correo, lo que no es muy eficiente.




    Para enviar grandes volúmenes de correos, consulte los paquetes
    [» PEAR::Mail](https://pear.php.net/package/Mail) y
    [» PEAR::Mail_Queue](https://pear.php.net/package/Mail_Queue).

**Nota**:

    Las siguientes RFC pueden ser útiles:
    [» RFC 1896](https://datatracker.ietf.org/doc/html/rfc1896),
    [» RFC 2045](https://datatracker.ietf.org/doc/html/rfc2045),
    [» RFC 2046](https://datatracker.ietf.org/doc/html/rfc2046),
    [» RFC 2047](https://datatracker.ietf.org/doc/html/rfc2047),
    [» RFC 2048](https://datatracker.ietf.org/doc/html/rfc2048),
    [» RFC 2049](https://datatracker.ietf.org/doc/html/rfc2049) y
    [» RFC 2822](https://datatracker.ietf.org/doc/html/rfc2822).

### Ver también

    - [mb_send_mail()](#function.mb-send-mail) - Envía un correo electrónico codificado

    - [imap_mail()](#function.imap-mail) - Envía un mensaje de correo electrónico

    - [» PEAR::Mail](https://pear.php.net/package/Mail)

    - [» PEAR::Mail_Mime](https://pear.php.net/package/Mail_Mime)

## Tabla de contenidos

- [ezmlm_hash](#function.ezmlm-hash) — Calcula el hash solicitado por EZMLM
- [mail](#function.mail) — Envío de correo

- [Introducción](#intro.mail)
- [Instalación/Configuración](#mail.setup)<li>[Requerimientos](#mail.requirements)
- [Configuración en tiempo de ejecución](#mail.configuration)
  </li>- [Funciones de mail](#ref.mail)<li>[ezmlm_hash](#function.ezmlm-hash) — Calcula el hash solicitado por EZMLM
- [mail](#function.mail) — Envío de correo
  </li>
