# COM y .Net (Windows)

# Introducción

COM es un acrónimo para Component Object Model;
es una capa orientada a objetos (y servicios asociados) sobre
DCE RPC (un estándar libre) que
define una convención de nomenclatura común que permite que el código escrito en
cualquier lenguaje se comunique con el código escrito en otro
lenguaje, siempre que ambos lenguajes sean compatibles con COM.
Los códigos no necesitan ser parte del mismo ejecutable. El código puede
ser cargado desde una DLL, encontrado en otro proceso que se ejecuta en el mismo
servidor, o, con DCOM (Distributed COM), encontrado en una máquina remota, sin que
su código necesite saber dónde se encuentra.

Hay una parte de COM conocida como OLE Automation que incluye un conjunto de
interfaces COM que permiten desvincularse de los objetos COM, para que puedan ser
descubiertos y llamados en tiempo de ejecución sin saber en el momento de la compilación
cómo funciona el objeto. La extensión COM de PHP utiliza las interfaces OLE Automation
para permitir la creación y llamada de objetos compatibles desde sus scripts. Técnicamente,
esto debería llamarse "la Extensión OLE Automation para PHP",
ya que no todos los objetos COM son necesariamente compatibles con OLE.

Ahora, ¿por qué se debería utilizar COM? COM es uno de los métodos más utilizados para
hacer que las aplicaciones y componentes se comuniquen en las plataformas Windows. Utilizando
COM, se puede abrir un documento de Microsoft Word, llenar un fichero de plantilla y guardarlo
para enviarlo por correo a su visitante. También se puede utilizar COM para realizar tareas
administrativas en su red y configurar IIS; estos son solo los usos más comunes, se puede hacer
mucho más con COM.

Además, se soporta la instanciación y creación de ensamblados
.Net utilizando una capa de interoperabilidad COM proporcionada por Microsoft.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#com.requirements)
- [Instalación](#com.installation)
- [Configuración en tiempo de ejecución](#com.configuration)

    ## Requerimientos

    Las funciones COM solo están disponibles en las versiones de PHP para Windows.

    El soporte .Net requiere el gestor .Net.

    ## Instalación

    Esta extensión requiere la activación de php_com_dotnet.dll
    en el fichero php.ini para poder utilizar estas funciones.

    Es responsabilidad del usuario instalar los diversos objetos COM que se necesiten (como Ms Word); no es posible incluirlos todos en PHP.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

  <caption>**Opciones de configuración para COM**</caption>
  
   
    
     Nombre
     Por defecto
     Cambiable
     Historial de cambios


     [com.allow_dcom](#ini.com.allow-dcom)
     "0"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [com.autoregister_typelib](#ini.com.autoregister-typelib)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [com.autoregister_verbose](#ini.com.autoregister-verbose)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [com.autoregister_casesensitive](#ini.com.autoregister-casesensitive)
     "1"
     **[INI_ALL](#constant.ini-all)**
      



     [com.code_page](#ini.com.code-page)
     ""
     **[INI_ALL](#constant.ini-all)**
      



     [com.dotnet_version](#ini.com.dotnet-version)
     ""
     **[INI_SYSTEM](#constant.ini-system)**
     Disponible a partir de PHP 8.0.0



     [com.typelib_file](#ini.com.typelib-file)
     ""
     **[INI_SYSTEM](#constant.ini-system)**
      

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     com.allow_dcom



     Si esta directiva está activada, PHP tendrá permiso para operar como
     un cliente D-COM (Distributed COM) y permitirá a PHP instanciar objetos COM en un servidor remoto.








     com.autoregister_typelib



     Si esta directiva está activada, PHP intentará declarar constantes
     provenientes de la biblioteca typelibrary de los objetos [COM](#class.com) que instancia, si estos
     objetos implementan la interfaz requerida para obtener los datos solicitados.
     La sensibilidad de las constantes a la casse está controlada por la directiva
     de configuración php.ini [com.autoregister_casesensitive](#ini.com.autoregister-casesensitive).








     com.autoregister_verbose



     Cuando esta directiva está activada, cualquier problema encontrado durante
     la carga de una typelibrary durante la instanciación del objeto
     será reportado utilizando el mecanismo de errores de PHP. Por
     defecto, está desactivada, lo que no da ninguna indicación sobre
     el fallo de la operación durante una búsqueda o carga de
     la biblioteca de tipo.








     com.autoregister_casesensitive



     Esta directiva está activada por defecto y hace que las constantes
     encontradas en las bibliotecas de tipos autocargadas durante la instanciación de objetos [COM](#class.com) sean registradas en modo
     sensible a la casse. Véase [com_load_typelib()](#function.com-load-typelib)
     para más detalles.








     com.code_page



     Esta directiva permite especificar el code-page de los juegos de caracteres a
     utilizar al enviar y recibir cadenas hacia objetos COM.
     Si está vacía, PHP asumirá que se desea **[CP_ACP](#constant.cp-acp)**,
     que es el code-page sistema ANSI por defecto.




     Si el texto en sus scripts está codificado con un diferente codificación o juego
     de caracteres por defecto, configurar esta directiva evitará tener
     que pasar todo su código como parámetro del constructor de la clase [com](#class.com). Tenga en cuenta que al usar esta directiva (como cualquier
     configuración de PHP), su código PHP pierde portabilidad. Se debe
     utilizar el parámetro del constructor siempre que sea posible.








     com.dotnet_version



     La versión del framework .NET a utilizar para los objetos
     [dotnet](#class.dotnet). El valor de esta configuración
     corresponde a los tres primeros números del número de la versión del framework,
     separados por puntos, y precedidos por la letra v, i.e.
     v4.0.30319.








     com.typelib_file



     Cuando está configurada, esta directiva debe ser la ruta hacia un
     fichero que contiene una lista de bibliotecas a cargar al inicio.
     Cada línea será interpretada como el nombre de la biblioteca de tipos y
     cargada como si se hubiera utilizado [com_load_typelib()](#function.com-load-typelib).
     Las constantes serán registradas de forma persistente, para que la biblioteca
     solo sea cargada una vez. Si el nombre de una biblioteca de tipos
     termina con #cis o #case_insensitive,
     entonces las constantes de esa biblioteca de tipos serán registradas en modo
     insensible a la casse.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[CLSCTX_INPROC_SERVER](#constant.clsctx-inproc-server)**
    ([int](#language.types.integer))



     El código que crea y gestiona los objetos de esta clase es una DLL que
     se ejecuta en el mismo proceso que el llamante de la función especificando
     el contexto de clase.





    **[CLSCTX_INPROC_HANDLER](#constant.clsctx-inproc-handler)**
    ([int](#language.types.integer))



     El código que gestiona los objetos de esta clase es un gestorador
     en proceso. Se trata de una DLL que se ejecuta en el proceso cliente
     e implementa las estructuras del lado cliente de esta clase cuando
     las instancias de la clase son accesibles a distancia.





    **[CLSCTX_LOCAL_SERVER](#constant.clsctx-local-server)**
    ([int](#language.types.integer))



     El código EXE que crea y gestiona los objetos de esta clase se ejecuta
     en la misma máquina pero se carga en un espacio de procesos distinto.





    **[CLSCTX_REMOTE_SERVER](#constant.clsctx-remote-server)**
    ([int](#language.types.integer))



     Contexto distante. El código que crea y gestiona los objetos de esta clase
     se ejecuta en un ordenador diferente.





    **[CLSCTX_SERVER](#constant.clsctx-server)**
    ([int](#language.types.integer))



     Indica un código servidor, ya sea en proceso, local o distante. Esta
     definición hace un OU lógico entre **[CLSCTX_INPROC_SERVER](#constant.clsctx-inproc-server)**,
     **[CLSCTX_LOCAL_SERVER](#constant.clsctx-local-server)**, y
     **[CLSCTX_REMOTE_SERVER](#constant.clsctx-remote-server)**.





    **[CLSCTX_ALL](#constant.clsctx-all)**
    ([int](#language.types.integer))



     Indica todos los contextos de clase. Esta definición hace un OU lógico
     entre **[CLSCTX_INPROC_HANDLER](#constant.clsctx-inproc-handler)** y
     **[CLSCTX_SERVER](#constant.clsctx-server)**.





    **[VT_NULL](#constant.vt-null)**
    ([int](#language.types.integer))



     Referencia de puntero NULL.





    **[VT_EMPTY](#constant.vt-empty)**
    ([int](#language.types.integer))



     Una propiedad con un indicador de tipo **[VT_EMPTY](#constant.vt-empty)** no tiene
     datos asociados; es decir, el tamaño del valor es cero.





    **[VT_INT](#constant.vt-int)**
    ([int](#language.types.integer))



     Valor entero signado de 4 bytes (equivalente a
     **[VT_I4](#constant.vt-i4)**).





    **[VT_I1](#constant.vt-i1)**
    ([int](#language.types.integer))



     Entero signado de 1 byte.





    **[VT_I2](#constant.vt-i2)**
    ([int](#language.types.integer))



     Dos bytes representando un valor entero signado de 2 bytes.





    **[VT_I4](#constant.vt-i4)**
    ([int](#language.types.integer))



     Valor entero signado de 4 bytes.





    **[VT_I8](#constant.vt-i8)**
    ([int](#language.types.integer))



     Valor entero signado de 8 bytes.


     Solo en x64.





    **[VT_UINT](#constant.vt-uint)**
    ([int](#language.types.integer))



     Entero no signado de 4 bytes (equivalente a
     **[VT_UI4](#constant.vt-ui4)**).





    **[VT_UI1](#constant.vt-ui1)**
    ([int](#language.types.integer))



     Entero no signado de 1 byte.





    **[VT_UI2](#constant.vt-ui2)**
    ([int](#language.types.integer))



     Entero no signado de 2 bytes.





    **[VT_UI4](#constant.vt-ui4)**
    ([int](#language.types.integer))



     Entero no signado de 4 bytes.





    **[VT_UI8](#constant.vt-ui8)**
    ([int](#language.types.integer))



     Entero no signado de 8 bytes.


     Solo en x64





    **[VT_R4](#constant.vt-r4)**
    ([int](#language.types.integer))



     Valor en coma flotante IEEE 32 bits.





    **[VT_R8](#constant.vt-r8)**
    ([int](#language.types.integer))



     Valor en coma flotante IEEE 64 bits.





    **[VT_BOOL](#constant.vt-bool)**
    ([int](#language.types.integer))



     Valor bool.





    **[VT_ERROR](#constant.vt-error)**
    ([int](#language.types.integer))



     Código de error; contiene el código de estado asociado a
     el error.





    **[VT_CY](#constant.vt-cy)**
    ([int](#language.types.integer))



     Entero en complemento a dos de 8 bytes (escalado por 10 000).





    **[VT_DATE](#constant.vt-date)**
    ([int](#language.types.integer))



     Un número en coma flotante de 64 bits representando el número de días
     (no de segundos) transcurridos desde el 31 de diciembre de 1899.
     Por ejemplo, 1 de enero de 1900 es 2,0,
     2 de enero de 1900 es 3,0, etc.
     Este valor se almacena en la misma representación que **[VT_R8](#constant.vt-r8)**.





    **[VT_BSTR](#constant.vt-bstr)**
    ([int](#language.types.integer))



     Puntero hacia una cadena Unicode terminada por un carácter nulo.





    **[VT_DECIMAL](#constant.vt-decimal)**
    ([int](#language.types.integer))



     Una estructura decimal.





    **[VT_UNKNOWN](#constant.vt-unknown)**
    ([int](#language.types.integer))



     Un puntero hacia un objeto que implementa la interfaz IUnknown.





    **[VT_DISPATCH](#constant.vt-dispatch)**
    ([int](#language.types.integer))



     Un puntero hacia un puntero hacia un objeto especificado.





    **[VT_VARIANT](#constant.vt-variant)**
    ([int](#language.types.integer))



     Un indicador de tipo seguido del valor correspondiente.
     **[VT_VARIANT](#constant.vt-variant)** puede ser utilizado únicamente con
     **[VT_BYREF](#constant.vt-byref)**.





    **[VT_ARRAY](#constant.vt-array)**
    ([int](#language.types.integer))



     Si el indicador de tipo se combina con **[VT_ARRAY](#constant.vt-array)**
     por un operador OU, el valor es un puntero hacia un
     SAFEARRAY. **[VT_ARRAY](#constant.vt-array)**
     puede ser combinado por OU con los siguientes tipos de datos: **[VT_I1](#constant.vt-i1)**,
     **[VT_UI1](#constant.vt-ui1)**, **[VT_I2](#constant.vt-i2)**, **[VT_UI2](#constant.vt-ui2)**,
     **[VT_I4](#constant.vt-i4)**, **[VT_UI4](#constant.vt-ui4)**, **[VT_INT](#constant.vt-int)**,
     **[VT_UINT](#constant.vt-uint)**, **[VT_R4](#constant.vt-r4)**, **[VT_R8](#constant.vt-r8)**,
     **[VT_BOOL](#constant.vt-bool)**, **[VT_DECIMAL](#constant.vt-decimal)**, **[VT_ERROR](#constant.vt-error)**,
     **[VT_CY](#constant.vt-cy)**, **[VT_DATE](#constant.vt-date)**, **[VT_BSTR](#constant.vt-bstr)**,
     **[VT_DISPATCH](#constant.vt-dispatch)**, **[VT_UNKNOWN](#constant.vt-unknown)** y
     **[VT_VARIANT](#constant.vt-variant)**.





    **[VT_BYREF](#constant.vt-byref)**
    ([int](#language.types.integer))



     Si el indicador de tipo se combina con **[VT_BYREF](#constant.vt-byref)**
     por un operador OU, el valor es una referencia. Los tipos de referencia
     se interpretan como una referencia hacia datos, similar al tipo referencia en C++.





    **[CP_ACP](#constant.cp-acp)**
    ([int](#language.types.integer))



     Página de código ANSI por omisión.





    **[CP_MACCP](#constant.cp-maccp)**
    ([int](#language.types.integer))



     Página de código Macintosh.





    **[CP_OEMCP](#constant.cp-oemcp)**
    ([int](#language.types.integer))



     Página de código OEM por omisión.





    **[CP_UTF7](#constant.cp-utf7)**
    ([int](#language.types.integer))



     Unicode (UTF-7).





    **[CP_UTF8](#constant.cp-utf8)**
    ([int](#language.types.integer))



     Unicode (UTF-8).





    **[CP_SYMBOL](#constant.cp-symbol)**
    ([int](#language.types.integer))



     Traducciones SYMBOL.





    **[CP_THREAD_ACP](#constant.cp-thread-acp)**
    ([int](#language.types.integer))



     Página de código ANSI del hilo actual.





    **[VARCMP_LT](#constant.varcmp-lt)**
    ([int](#language.types.integer))



     El bstr de la izquierda es inferior al
     bstr de la derecha.





    **[VARCMP_EQ](#constant.varcmp-eq)**
    ([int](#language.types.integer))



     Los dos parámetros son iguales.





    **[VARCMP_GT](#constant.varcmp-gt)**
    ([int](#language.types.integer))



     El bstr de la izquierda es superior al
     bstr de la derecha.





    **[VARCMP_NULL](#constant.varcmp-null)**
    ([int](#language.types.integer))



     Una de las expresiones es NULL.





    **[NORM_IGNORECASE](#constant.norm-ignorecase)**
    ([int](#language.types.integer))



     Ignorar la sensibilidad a la casse.





    **[NORM_IGNORENONSPACE](#constant.norm-ignorenonspace)**
    ([int](#language.types.integer))



     Ignorar los caracteres sin chasse.





    **[NORM_IGNORESYMBOLS](#constant.norm-ignoresymbols)**
    ([int](#language.types.integer))



     Ignorar los símbolos.





    **[NORM_IGNOREWIDTH](#constant.norm-ignorewidth)**
    ([int](#language.types.integer))



     Ignorar la anchura de cadena.





    **[NORM_IGNOREKANATYPE](#constant.norm-ignorekanatype)**
    ([int](#language.types.integer))



     Ignorar el tipo Kana.





    **[NORM_IGNOREKASHIDA](#constant.norm-ignorekashida)**
    ([int](#language.types.integer))



     Ignorar los caracteres kashida en árabe.


     La disponibilidad depende de la biblioteca subyacente.





    **[DISP_E_DIVBYZERO](#constant.disp-e-divbyzero)**
    ([int](#language.types.integer))



     Un error de retorno que indica una división por cero.





    **[DISP_E_OVERFLOW](#constant.disp-e-overflow)**
    ([int](#language.types.integer))



     Un error que indica que un valor no ha podido ser convertido
     en su representación esperada.





    **[DISP_E_BADINDEX](#constant.disp-e-badindex)**
    ([int](#language.types.integer))



     Un error que indica que un índice de array no existe.





    **[DISP_E_PARAMNOTFOUND](#constant.disp-e-paramnotfound)**
    ([int](#language.types.integer))



     Un valor de retorno que indica que uno de los ID de parámetro
     no corresponde a un parámetro del método.





    **[MK_E_UNAVAILABLE](#constant.mk-e-unavailable)**
    ([int](#language.types.integer))



     Código de estado iMoniker COM, devuelto en errores donde la llamada
     de función ha fallado debido a una indisponibilidad.





    **[LOCALE_NEUTRAL](#constant.locale-neutral)**
    ([int](#language.types.integer))



     La configuración local neutra. Esta constante generalmente no se utiliza
     durante las llamadas a las API NLS. Utilizar en su lugar LOCALE_SYSTEM_DEFAULT.





    **[LOCALE_SYSTEM_DEFAULT](#constant.locale-system-default)**
    ([int](#language.types.integer))



     La configuración local por omisión del sistema operativo.

# Error y gestión de errores

Esta extensión lanzará instancias de la clase [com_exception](#class.com-exception)
para cualquier error fatal reportado por COM. Todas las excepciones COM tienen una
propiedad code que corresponde al valor de retorno HRESULT
de las diversas operaciones COM. Este código puede ser utilizado para elegir de forma
automática cómo gestionar esta excepción.

# Ejemplos

## Tabla de contenidos

- [For Each](#com.examples.foreach)
- [Arrays y propiedades a la manera de arrays de COM](#com.examples.arrays)

    ## For Each

    Se puede utilizar la estructura de control [foreach](#control-structures.foreach)
    de PHP para iterar a través del contenido de un IEnumVariant COM/OLE estándar.
    Esto significa que se puede utilizar [foreach](#control-structures.foreach) en los lugares donde
    se habría podido utilizar For Each en código VB/ASP.

    **Ejemplo #1 For Each en ASP**

&lt;%
Set domainObject = GetObject("WinNT://Domain")
For Each obj in domainObject
Response.Write obj.Name &amp; "&lt;br /&gt;"
Next
%&gt;

    **Ejemplo #2 Foreach en PHP**

&lt;?php
$domainObject = new COM("WinNT://Domain");
foreach ($domainObject as $obj) {
echo $obj-&gt;Name . "&lt;br /&gt;";
}
?&gt;

## Arrays y propiedades a la manera de arrays de COM

Varios objetos COM exponen sus propiedades como arrays, o utilizando una ruta de acceso a la manera de arrays.

Se puede:

    -

      Acceder a arrays multidimensionales o a propiedades COM que requieren múltiples argumentos como si se accediera a un array. También se pueden escribir estas propiedades utilizando esta técnica.





    -

      Iterar sobre los SafeArrays ("verdaderos" arrays) utilizando la estructura de control [foreach](#control-structures.foreach). Esto funciona
      porque un SafeArrays contiene información sobre su tamaño. Si una propiedad a la manera de arrays implementa IEnumVariant, entonces también se puede utilizar [foreach](#control-structures.foreach) para esta propiedad; consulte [For Each](#com.examples.foreach) para más información al respecto.


# La clase com

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

## Introducción

    La clase com permite instanciar un objeto COM compatible OLE y
    llamar a sus métodos y acceder a sus propiedades.

## Sinopsis de la Clase

     class **com**



     extends
      [variant](#class.variant)
     {

    /* Métodos */

public [\_\_construct](#com.construct)(
    [string](#language.types.string) $module_name,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $server_name = **[null](#constant.null)**,
    [int](#language.types.integer) $codepage = **[CP_ACP](#constant.cp-acp)**,
    [string](#language.types.string) $typelib = ""
)

}

## Métodos sobrecargados

    El objeto devuelto es un objeto sobrecargado, lo que significa que PHP no ve
    ningún método fijo como lo hace con las clases habituales;
    en lugar de eso, cada acceso a una propiedad o método se realiza
    a través de COM.




    PHP detectará automáticamente los métodos que aceptan
    argumentos por referencia, y convertirá automáticamente las variables
    PHP clásicas en una forma que pueda ser pasada por referencia.
    Esto significa que se pueden llamar a los métodos de forma natural;
    no se requiere ningún esfuerzo adicional en el código.

## Ejemplos com

     **Ejemplo #1 Ejemplo com (1)**




&lt;?php
// iniciar Word
$word = new com("word.application") or die("Unable to instantiate Word");
echo "Loaded Word, version {$word-&gt;Version}\n";

// traerlo al frente
$word-&gt;Visible = 1;

// abrir un documento vacío
$word-&gt;Documents-&gt;Add();

// hacer cosas
$word-&gt;Selection-&gt;TypeText("This is a test...");
$word-&gt;Documents[1]-&gt;SaveAs("Useless test.doc");

// cerrar Word
$word-&gt;Quit();

// liberar el objeto
$word = null;
?&gt;

     **Ejemplo #2 Ejemplo com (2)**




&lt;?php

$conn = new com("ADODB.Connection") or die("Cannot start ADO");
$conn-&gt;Open("Provider=SQLOLEDB; Data Source=localhost;
Initial Catalog=database; User ID=user; Password=password");

$rs = $conn-&gt;Execute("SELECT \* FROM sometable"); // Recordset

$num_columns = $rs-&gt;Fields-&gt;Count();
echo $num_columns . "\n";

for ($i=0; $i &lt; $num_columns; $i++) {
    $fld[$i] = $rs-&gt;Fields($i);
}

$rowcount = 0;
while (!$rs-&gt;EOF) {
for ($i=0; $i &lt; $num_columns; $i++) {
        echo $fld[$i]-&gt;value . "\t";
}
echo "\n";
$rowcount++; // incrementar rowcount
$rs-&gt;MoveNext();
}

$rs-&gt;Close();
$conn-&gt;Close();

$rs = null;
$conn = null;

?&gt;

# com::\_\_construct

(PHP 4 &gt; 4.1.0, PHP 5, PHP 7, PHP 8)

com::\_\_construct — Constructor de la clase com

### Descripción

public **com::\_\_construct**(
    [string](#language.types.string) $module_name,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $server_name = **[null](#constant.null)**,
    [int](#language.types.integer) $codepage = **[CP_ACP](#constant.cp-acp)**,
    [string](#language.types.string) $typelib = ""
)

Construye un nuevo objeto com.

### Parámetros

    module_name


      Puede ser un ProgID, Class ID o Moniker que nombra el componente a cargar.


      Un ProgID es típicamente el nombre de la aplicación o del DDL, seguido de un
      punto, seguido del nombre del objeto. Por ejemplo: Word.Application.


      Un Class ID es el UUID que identifica únicamente una clase dada.


      Un Moniker es una forma especial de nombramiento, similar en concepto a un
      esquema URL, que identifica un recurso y especifica cómo debería
      ser cargado. Por ejemplo, se puede iniciar Word y recuperar un objeto que represente un documento de Word especificando la ruta completa del
      documento de Word como nombre de módulo, o se puede usar
      LDAP: como Moniker para usar la interfaz ADSI a LDAP.




    server_name


      El nombre del servidor DCOM en el cual el componente debería ser cargado y
      ejecutado. Si **[null](#constant.null)**, el objeto es ejecutado utilizando el valor por defecto para
      la aplicación. El valor por defecto es típicamente ejecutar en la
      máquina local, sin embargo, el administrador puede haber configurado
      la aplicación para ser lanzada en una máquina diferente.


      Si se especifica un valor no-**[null](#constant.null)** para el servidor, PHP se negará
      a cargar el objeto a menos que la opción [com.allow_dcom](#ini.com.allow-dcom)
      php.ini esté definida como **[true](#constant.true)**.


      Si server_name es un [array](#language.types.array), debería contener
      los siguientes elementos (sensible a mayúsculas y minúsculas!). A notar que todos son
      opcionales (sin embargo, debe definir el Usuario y la Contraseña juntos); si omite el parámetro Server, se usará el servidor por defecto
      (como se mencionó anteriormente), y la instanciación del objeto no será afectada por la directiva php.ini [com.allow_dcom](#ini.com.allow-dcom).



       <caption>**Nombre de servidor DCOM**</caption>



          Clave
          Tipo
          Descripción






          Server
          [string](#language.types.string)
          El nombre del servidor



          Username
          [string](#language.types.string)
          El nombre de usuario para conectarse como.



          Password
          [string](#language.types.string)
          La contraseña para Username.



          Domain
          [string](#language.types.string)
          El dominio del servidor.



          Drapeaux
          [int](#language.types.integer)

           Una o más de las siguientes constantes, ensambladas juntas gracias al OU lógico:
           **[CLSCTX_INPROC_SERVER](#constant.clsctx-inproc-server)**,
           **[CLSCTX_INPROC_HANDLER](#constant.clsctx-inproc-handler)**,
           **[CLSCTX_LOCAL_SERVER](#constant.clsctx-local-server)**,
           **[CLSCTX_REMOTE_SERVER](#constant.clsctx-remote-server)**,
           **[CLSCTX_SERVER](#constant.clsctx-server)** y
           **[CLSCTX_ALL](#constant.clsctx-all)**.
           El valor por defecto si no se define aquí es
           **[CLSCTX_SERVER](#constant.clsctx-server)** si también se omite
           Server, o **[CLSCTX_REMOTE_SERVER](#constant.clsctx-remote-server)**
           si se define un servidor. Debe consultar la documentación
           de Microsoft para CoCreateInstance para más información sobre el significado de estas constantes; típicamente nunca
           las utilizará.











    codepage


      Define la codepage que se utiliza para convertir las [string](#language.types.string) en
      [string](#language.types.string) unicode y viceversa. La conversión se aplica cuando una
      [string](#language.types.string) PHP se pasa como parámetro o se devuelve desde un método de este objeto COM. La codepage es "pegajosa", lo que significa
      que se propagará a los objetos y variantes devueltos desde el objeto.


      Los valores posibles son:
      **[CP_ACP](#constant.cp-acp)** (utiliza la codepage ANSI del sistema por defecto
      - por defecto si se omite este parámetro),
      **[CP_MACCP](#constant.cp-maccp)**,
      **[CP_OEMCP](#constant.cp-oemcp)**, **[CP_SYMBOL](#constant.cp-symbol)**,
      **[CP_THREAD_ACP](#constant.cp-thread-acp)** (utiliza la codepage/configuración local definida para
      el hilo en ejecución), **[CP_UTF7](#constant.cp-utf7)**
      y **[CP_UTF8](#constant.cp-utf8)**. También puede utilizar el número para
      una codepage dada; consulte la documentación de Microsoft para más detalles sobre las codepages y sus valores numéricos.


## Tabla de contenidos

- [com::\_\_construct](#com.construct) — Constructor de la clase com

# La clase dotnet

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

## Introducción

    La clase dotnet permite instanciar una clase desde un ensamblado
    .NET y llamar y acceder a sus propiedades, si la clase y los métodos
    y las propiedades son
    [» visible para COM](https://docs.microsoft.com/dotnet/api/system.runtime.interopservices.comvisibleattribute).




    Ni la instanciación de clases estáticas ni la llamada de métodos estáticos es
    soportada.
    La instanciación de clases genéricas como
    System.Collections.Generic.List tampoco está soportada.




    Algunas clases .Net no implementan IDispatch, por lo que aunque pueden ser instanciadas, llamar a métodos o acceder a propiedades en estas clases no es soportado.

**Nota**:

     Se debe instalar el motor de ejecución .Net en el servidor web para aprovechar esta funcionalidad.

**Nota**:

     Anterior a PHP 8.0.0, el framework .Net 4.0 y versiones posteriores no son soportados por la clase
     **dotnet**. Si los ensamblados han sido registrados con
     **regasm.exe**, las clases pueden ser instanciadas como objetos [com](#class.com), sin embargo.
     A partir de PHP 8.0.0, el framework .Net 4.0 y las versiones posteriores son soportados
     a través de la directiva php.ini [com.dotnet_version](#ini.com.dotnet-version).

## Sinopsis de la Clase

     class **dotnet**



     extends
      [variant](#class.variant)
     {

    /* Métodos */

public [\_\_construct](#dotnet.construct)([string](#language.types.string) $assembly_name, [string](#language.types.string) $datatype_name, [int](#language.types.integer) $codepage = **[CP_ACP](#constant.cp-acp)**)

}

## Métodos sobrecargados

    El objeto devuelto es un objeto sobrecargado, lo que significa que PHP no ve
    los métodos fijados como lo hace con las clases normales; en su lugar, todo acceso a propiedades o métodos se pasa a través de COM y desde allí a DOTNET. En otras palabras, el objeto .Net se mapea a través de la capa de interoperabilidad COM proporcionada por el motor de ejecución .Net.




    Una vez que se ha creado un objeto dotnet, PHP lo trata de la misma manera
    que cualquier otro objeto COM; se aplican las mismas reglas.

## Ejemplos dotnet

     **Ejemplo #1 Ejemplo dotnet**




&lt;?php
$stack = new dotnet("mscorlib", "System.Collections.Stack");
$stack-&gt;Push(".Net");
$stack-&gt;Push("Hello ");
echo $stack-&gt;Pop() . $stack-&gt;Pop();
?&gt;

# dotnet::\_\_construct

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

dotnet::\_\_construct — Constructor de la clase dotnet

### Descripción

public **dotnet::\_\_construct**([string](#language.types.string) $assembly_name, [string](#language.types.string) $datatype_name, [int](#language.types.integer) $codepage = **[CP_ACP](#constant.cp-acp)**)

Construye un nuevo objeto dotnet.

### Parámetros

    assembly_name


      Especifica el ensamblado que debe ser cargado.




    datatype_name


      Especifica la clase en este ensamblado a instanciar.




    codepage


      Codepage a utilizar para las transformaciones de [string](#language.types.string) unicode;
      ver la clase [com](#class.com) para más detalles
      sobre los codepages.


## Tabla de contenidos

- [dotnet::\_\_construct](#dotnet.construct) — Constructor de la clase dotnet

# La clase variant

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

## Introducción

    El VARIANT es el equivalente COM de zval para PHP; es una estructura que
    puede contener un valor con un rango de diferentes tipos posibles. La clase variant proporcionada por la extensión COM permite tener más control sobre lo que PHP envía y recibe de COM.

## Sinopsis de la Clase

     class **variant**
     {

    /* Métodos */

public [\_\_construct](#variant.construct)([mixed](#language.types.mixed) $value = **[null](#constant.null)**, [int](#language.types.integer) $type = **[VT_EMPTY](#constant.vt-empty)**, [int](#language.types.integer) $codepage = **[CP_ACP](#constant.cp-acp)**)

}

## Ejemplos variant

     **Ejemplo #1 Ejemplo variant**




&lt;?php
$v = new variant(42);
print "El tipo es " . variant_get_type($v) . "&lt;br/&gt;";
print "El valor es " . $v . "&lt;br/&gt;";
?&gt;

**Nota**:

     Al devolver un valor o recuperar una propiedad variant, el variant se convierte en un valor PHP solo cuando hay una correspondencia directa entre los tipos que no produciría una pérdida de información. En todos los demás casos, el valor se devuelve como una instancia de la clase variant. Se puede forzar a PHP a convertir o evaluar el variant como un tipo PHP nativo utilizando los operadores de transtipado explícitamente, o implícitamente a una [string](#language.types.string) al mostrarlo gracias a [print](#function.print). Se puede utilizar la gran variedad de funciones variant para realizar operaciones aritméticas sin forzar una conversión y arriesgarse a una pérdida de datos.





    Véase también [variant_get_type()](#function.variant-get-type).

# variant::\_\_construct

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

variant::\_\_construct — Constructor de la clase variant

### Descripción

public **variant::\_\_construct**([mixed](#language.types.mixed) $value = **[null](#constant.null)**, [int](#language.types.integer) $type = **[VT_EMPTY](#constant.vt-empty)**, [int](#language.types.integer) $codepage = **[CP_ACP](#constant.cp-acp)**)

Construye un nuevo objeto variant.

### Parámetros

    value


      Valor inicial. Si se omite, o se establece en **[null](#constant.null)**, se crea un objeto VT_EMPTY vacío.




    type


      Especifica el tipo de contenido del objeto variant. Los valores posibles
      son una de las constantes **[VT_*](#constant.vt-null)** [Constantes predefinidas](#com.constants).


      PHP puede detectar los argumentos pasados por referencia automáticamente;
      No necesitan ser pasados como objetos variant.


      Consulte la biblioteca MSDN para obtener información
      adicional sobre el tipo VARIANT.




    codepage


      Especifica la codepage que se utiliza para convertir los [string](#language.types.string) a unicode. Vea el argumento con el mismo nombre en la clase
      [com](#class.com) para más información.


## Tabla de contenidos

- [variant::\_\_construct](#variant.construct) — Constructor de la clase variant

# La clase COMPersistHelper

(PHP 5, PHP 7, PHP 8)

## Introducción

    **COMPersistHelper** mejora la interoperabilidad de COM
    y PHP en lo que respecta a la directiva php.ini [open_basedir](#ini.open-basedir),
    y los [resource](#language.types.resource)s de stream.

## Sinopsis de la Clase

     final
     class **COMPersistHelper**
     {

    /* Métodos */

public [\_\_construct](#compersisthelper.construct)([?](#language.types.null)[variant](#class.variant) $variant = **[null](#constant.null)**)

    public [GetCurFileName](#compersisthelper.getcurfilename)(): [string](#language.types.string)|[false](#language.types.singleton)

public [GetMaxStreamSize](#compersisthelper.getmaxstreamsize)(): [int](#language.types.integer)
public [InitNew](#compersisthelper.initnew)(): [bool](#language.types.boolean)
public [LoadFromFile](#compersisthelper.loadfromfile)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [LoadFromStream](#compersisthelper.loadfromstream)([resource](#language.types.resource) $stream): [bool](#language.types.boolean)
public [SaveToFile](#compersisthelper.savetofile)([?](#language.types.null)[string](#language.types.string) $filename, [bool](#language.types.boolean) $remember = **[true](#constant.true)**): [bool](#language.types.boolean)
public [SaveToStream](#compersisthelper.savetostream)([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

}

# COMPersistHelper::\_\_construct

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::\_\_construct — Construye un objeto COMPersistHelper

### Descripción

public **COMPersistHelper::\_\_construct**([?](#language.types.null)[variant](#class.variant) $variant = **[null](#constant.null)**)

Construye un objeto de ayuda a la persistencia, generalmente asociado a un
variant.

### Parámetros

    variant


      Un objeto COM que implementa **IDispatch**.
      Para poder llamar con éxito a uno de los métodos de [COMPersistHelper](#class.compersisthelper),
      el objeto debe implementar **IPersistFile**, **IPersistStream**
      y/o **IPersistStreamInit**.


      Pasar **[null](#constant.null)** como variant solo es útil si el objeto debe ser
      cargado desde un stream llamando a [COMPersistHelper::LoadFromStream()](#compersisthelper.loadfromstream).


# COMPersistHelper::GetCurFileName

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::GetCurFileName — Devuelve el nombre del fichero actual

### Descripción

public **COMPersistHelper::GetCurFileName**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre del fichero actual asociado al objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero actual asociado al objeto.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistFile**,
o cuando la llamada al método **IPersistFile::GetCurFile()** ha fallado.

# COMPersistHelper::GetMaxStreamSize

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::GetMaxStreamSize — Devuelve el tamaño máximo del stream

### Descripción

public **COMPersistHelper::GetMaxStreamSize**(): [int](#language.types.integer)

Devuelve el tamaño del stream (en bytes) necesario para guardar el objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño del stream (en bytes) necesario para guardar el objeto.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistStream**
ni **IPersistStreamInit**, o cuando la llamada al
método **IPersistStream::GetSizeMax()** ha fallado.

# COMPersistHelper::InitNew

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::InitNew — Inicializa un objeto en un estado por omisión

### Descripción

public **COMPersistHelper::InitNew**(): [bool](#language.types.boolean)

Inicializa un objeto en un estado por omisión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistStreamInit**,
o cuando la llamada al método **IPersistStreamInit::Init()** ha fallado.

# COMPersistHelper::LoadFromFile

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::LoadFromFile — Carga un objeto desde un fichero

### Descripción

public **COMPersistHelper::LoadFromFile**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Abre el fichero especificado e inicializa un objeto a partir del contenido del fichero.

### Parámetros

    filename


      El nombre del fichero desde el cual cargar el objeto.




    flags


      El modo de acceso a utilizar al abrir el fichero. Los valores posibles son
      extraídos de la [» enumeración STGM](https://docs.microsoft.com/en-us/windows/win32/stg/stgm-constants).
      El método puede tratar este valor como una sugerencia, añadiendo permisos más restrictivos
      si es necesario. Si flags es 0,
      la implementación debe abrir el fichero utilizando los permisos por omisión.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistFile**,
o cuando la llamada al método **IPersistFile::Load()** ha fallado.

# COMPersistHelper::LoadFromStream

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::LoadFromStream — Carga un objeto desde un stream

### Descripción

public **COMPersistHelper::LoadFromStream**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Inicializa un objeto a partir del stream donde fue guardado previamente.

### Parámetros

    stream


      El stream [resource](#language.types.resource) desde el cual cargar el objeto.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistStream**,
o cuando la llamada al método **IPersistStream::Load()** falla.

# COMPersistHelper::SaveToFile

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::SaveToFile — Guarda un objeto en un fichero

### Descripción

public **COMPersistHelper::SaveToFile**([?](#language.types.null)[string](#language.types.string) $filename, [bool](#language.types.boolean) $remember = **[true](#constant.true)**): [bool](#language.types.boolean)

Guarda una copia del objeto en el fichero especificado.

### Parámetros

    filename


      El nombre del fichero en el que se guardará el objeto.




    remember


      Indica si el argumento filename debe ser utilizado como fichero de trabajo
      actual. Si **[true](#constant.true)**, filename se convierte en el fichero actual y el objeto debe
      borrar su indicador de modificación después de la guardado. Si **[false](#constant.false)**, esta operación de guardado
      es una operación "Guardar una copia como ...". En este caso, el fichero actual no se modifica y el objeto
      no debe borrar su indicador de modificación.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistFile**,
o cuando la llamada al método **IPersistFile::Save()** ha fallado.

### Ejemplos

**Ejemplo #1 Uso básico de COMPersistHelper::saveToFile()**

&lt;?php
$word = new COM('Word.Application');
$doc = $word-&gt;Documents-&gt;Add();
$ph = new COMPersistHelper($doc);
$ph-&gt;SaveToFile('C:\\Users\\cmb\\Documents\\my.docx');
$word-&gt;Quit();
?&gt;

# COMPersistHelper::SaveToStream

(PHP 5, PHP 7, PHP 8)

COMPersistHelper::SaveToStream — Guarda un objeto en un stream

### Descripción

public **COMPersistHelper::SaveToStream**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Guarda un objeto en el stream especificado.

### Parámetros

    stream


      El stream [resource](#language.types.resource) en el cual guardar el objeto.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [com_exception](#class.com-exception) si el objeto asociado no implementa
la interfaz COM **IPersistStream**,
y/o la interfaz **IPersistStreamInit**, o cuando la llamada
al método **IPersistStream::Save()** ha fallado.

## Tabla de contenidos

- [COMPersistHelper::\_\_construct](#compersisthelper.construct) — Construye un objeto COMPersistHelper
- [COMPersistHelper::GetCurFileName](#compersisthelper.getcurfilename) — Devuelve el nombre del fichero actual
- [COMPersistHelper::GetMaxStreamSize](#compersisthelper.getmaxstreamsize) — Devuelve el tamaño máximo del stream
- [COMPersistHelper::InitNew](#compersisthelper.initnew) — Inicializa un objeto en un estado por omisión
- [COMPersistHelper::LoadFromFile](#compersisthelper.loadfromfile) — Carga un objeto desde un fichero
- [COMPersistHelper::LoadFromStream](#compersisthelper.loadfromstream) — Carga un objeto desde un stream
- [COMPersistHelper::SaveToFile](#compersisthelper.savetofile) — Guarda un objeto en un fichero
- [COMPersistHelper::SaveToStream](#compersisthelper.savetostream) — Guarda un objeto en un stream

# La clase com_exception

(PHP 5, PHP 7, PHP 8)

## Introducción

## Sinopsis de la Clase

     final
     class **com_exception**



     extends
      [Exception](#class.exception)
     {

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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase com_safearray_proxy

(PHP 5, PHP 7, PHP 8)

## Introducción

    **com_safearray_proxy** es una clase interna
    utilizada para resolver los accesos a los arrays multi-dimensionales sobre los tipos SafeArray.

## Sinopsis de la Clase

     final
     class **com_safearray_proxy**
     {

}

# Funciones COM y .Net (Windows)

## Ver también

    Para obtener más información sobre los objetos COM, consulte las
    [» especificaciones COM](https://docs.microsoft.com/windows/desktop/com/component-object-model--com--portal).
    Se puede encontrar información útil en nuestra sección de preguntas frecuentes para [PHP y COM](#faq.com).
    Si se desea utilizar aplicaciones MS Office en el servidor, es necesario
    leer la información aquí: [» Consideraciones para
    la Automatización del lado-servidor de Office](http://support.microsoft.com/kb/257757).

# com_create_guid

(PHP 5, PHP 7, PHP 8)

com_create_guid — Genera un identificador único global (GUID)

### Descripción

**com_create_guid**(): [string](#language.types.string)|[false](#language.types.singleton)

Genera un identificador único global (GUID).

Un GUID se genera de la misma manera que DCE UUID, excepto por
el hecho de que la convención de Microsoft incluye el GUID en
un paréntesis.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el GUID, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ver también

    - **uuid_create()** en la extensión PECL uuid

# com_event_sink

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

com_event_sink — Conecta eventos de un objeto COM a un objeto PHP

### Descripción

**com_event_sink**([variant](#class.variant) $variant, [object](#language.types.object) $sink_object, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $sink_interface = **[null](#constant.null)**): [bool](#language.types.boolean)

Conecta eventos del objeto COM
variant a un objeto PHP
sink_object.

Sea prudente al utilizar esta funcionalidad;
si se hace algo similar al ejemplo
a continuación, no tiene sentido ejecutarlo en un servidor web.

### Parámetros

     variant








     sink_object


       sink_object debe ser una instancia de la clase
       con nombres de métodos que sigan el dispinterface deseado; se debe utilizar [com_print_typeinfo()](#function.com-print-typeinfo) para ayudar a generar una plantilla de clase para esto.






     sink_interface


       PHP debe ser capaz de utilizar el tipo por defecto de dispinterface
       especificado por la Typelib asociada con el objeto variant,
       pero se puede cambiar esto especificando en el parámetro
       sink_interface el dispinterface que se desea utilizar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       sink_interface ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo de conexiones de eventos COM**

&lt;?php
class IEEventSinker {
var $terminated = false;

function ProgressChange($progress, $progressmax) {
echo "Progreso de la descarga: $progress / $progressmax\n";
}

    function DocumentComplete(&amp;$dom, $url) {
      echo "Documento $url terminado\n";
    }

    function OnQuit() {
      echo "¡Salir!\n";
      $this-&gt;terminated = true;
    }

}
$ie = new COM("InternetExplorer.Application");
$sink = new IEEventSinker();
com_event_sink($ie, $sink, "DWebBrowserEvents2");
$ie-&gt;Visible = true;
$ie-&gt;Navigate("http://www.example.org");
while(!$sink-&gt;terminated) {
com_message_pump(4000);
}
$ie = null;
?&gt;

### Notas

**Precaución**

    Antes de PHP 8.0.0,
    llamar a [exit()](#function.exit) desde cualquier gestor de eventos no es soportado, y puede causar que PHP se bloquee. Esto puede evitarse lanzando una excepción desde un gestor de eventos, capturando la excepción en el código principal, y llamando a [exit()](#function.exit) allí.

### Ver también

    - [com_print_typeinfo()](#function.com-print-typeinfo) - Muestra una definición de clase PHP para una interfaz distribuible

    - [com_message_pump()](#function.com-message-pump) - Procesa un mensaje COM en un tiempo dado

# com_get_active_object

(PHP 5, PHP 7, PHP 8)

com_get_active_object — Devuelve un objeto que representa la instancia actual de un objeto COM

### Descripción

**com_get_active_object**([string](#language.types.string) $prog_id, [?](#language.types.null)[int](#language.types.integer) $codepage = **[null](#constant.null)**): [variant](#class.variant)

**com_get_active_object()** es similar a la creación de una
nueva instancia [com](#class.com) de un objeto COM, excepto que solo
devolverá un objeto al script si el objeto está actualmente instanciado. Las aplicaciones OLE utilizan algo conocido como
"Running Object Table" que permite a las aplicaciones conocidas
ser ejecutadas solo una vez; esta función expone la función
GetActiveObject() de la biblioteca COM para recuperar un objeto de una instancia en uso.

### Parámetros

     prog_id


       El parámetro prog_id debe ser el ProgID o el
       CLSID del objeto al que se desea acceder (por ejemplo,
       Word.Application).






     codepage


       utiliza las mismas reglas que en la [com](#class.com) clase.





### Valores devueltos

Si el objeto solicitado está en ejecución, la función devolverá
al script lo que cualquier otro objeto COM devolvería.

### Errores/Excepciones

Hay muchas razones por las cuales esta función puede fallar. En
esta situación, el código de error de la excepción debería ser
**[MK_E_UNAVAILABLE](#constant.mk-e-unavailable)**; se puede utilizar el método
getCode del objeto excepción para verificar el código de la excepción.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       codepage es ahora nullable.



### Notas

**Advertencia**

    Utilizar la función **com_get_active_object()** en un servidor
    web no siempre es la mejor idea. La mayoría de las aplicaciones COM/OLE no están diseñadas para manejar más de un cliente concurrente, como
    (¡¡y especialmente!!) Microsoft Office. Se debe leer las [» consideraciones para los
    automatismos lado-servidor para Office](http://support.microsoft.com/kb/257757)
    para obtener más información sobre los comportamientos generales.

# com_load_typelib

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

com_load_typelib — Carga un Typelib

### Descripción

**com_load_typelib**([string](#language.types.string) $typelib, [bool](#language.types.boolean) $case_insensitive = **[true](#constant.true)**): [bool](#language.types.boolean)

Carga un Typelib y registra su contenido en el motor, como si hubieran sido definidos
utilizando [define()](#function.define).

Tenga en cuenta que es más eficiente utilizar [com.typelib-file](#ini.com.typelib-file)
php.ini la opción de configuración para precargar y registrar las constantes, aunque esto
es menos flexible.

Si [com.autoregister-typelib](#ini.com.autoregister-typelib) está activado,
entonces PHP intentará registrar automáticamente las constantes asociadas al objeto COM
cuando se cree el objeto. Esto dependerá de la interfaz proporcionada por el propio objeto COM
y no siempre será posible.

### Parámetros

     typelib


       typelib puede ser uno de los siguientes valores:



        -

          El nombre de un fichero .tlb o el módulo ejecutable que contiene
          el Typelib.





        -

          El GUID del Typelib, seguido del número de versión; por ejemplo
          {00000200-0000-0010-8000-00AA006D2EA4},2,0.





        -

          El nombre del Typelib, e.g Microsoft OLE DB ActiveX Data
          Objects 1.0 Library.






       PHP intentará resolver el Typelib en este orden, y el proceso
       consumirá más recursos a medida que avance en la lista; la búsqueda del Typelib por su nombre se maneja físicamente
       enumerando el registro hasta que se encuentre un resultado.




     case_insensitive


       El parámetro case_insensitive se comporta de manera inversa
       al parámetro $case_insensitive de la función [define()](#function.define).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# com_message_pump

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

com_message_pump — Procesa un mensaje COM en un tiempo dado

### Descripción

**com_message_pump**([int](#language.types.integer) $timeout_milliseconds = 0): [bool](#language.types.boolean)

Procesa un mensaje COM esperando hasta timeout_milliseconds
milisegundos, o bien esperando a que un mensaje llegue a la cola.

El propósito de esta función es enrutar las llamadas COM entre los elementos y gestionar
las diferentes sincronizaciones. Esto permite que el script espere eficientemente los eventos
a desencadenar, mientras gestiona otros eventos o ejecuta otros scripts en segundo plano.
Debe ser utilizada en un bucle, como en el ejemplo de la función
[com_event_sink()](#function.com-event-sink), hasta que se haya terminado de utilizar los objetos COM relacionados con eventos.

### Parámetros

     timeout_milliseconds


       El tiempo de espera, en milisegundos.




       Si no se especifica un valor para el parámetro
       timeout_milliseconds, entonces será 0.
       Un valor de 0 significa que los mensajes serán procesados inmediatamente;
       si hay mensajes en la cola, serán distribuidos de inmediato;
       si no hay mensajes en la cola, la función devolverá **[false](#constant.false)**
       inmediatamente sin esperar.





### Valores devueltos

Si uno o más mensajes llegan antes de que expire el tiempo de espera,
serán distribuidos y la función devolverá **[true](#constant.true)**. Si el tiempo de espera
expira y no se procesa ningún mensaje, el valor devuelto será **[false](#constant.false)**.

# com_print_typeinfo

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

com_print_typeinfo — Muestra una definición de clase PHP para una interfaz distribuible

### Descripción

**com_print_typeinfo**([variant](#class.variant)|[string](#language.types.string) $variant, [?](#language.types.null)[string](#language.types.string) $dispatch_interface = **[null](#constant.null)**, [bool](#language.types.boolean) $display_sink = **[false](#constant.false)**): [bool](#language.types.boolean)

Ayuda a generar un esqueleto de clase para usarlo como sumidero de eventos. Asimismo, puede ser utilizado para generar una copia de seguridad de cualquier objeto COM, siempre que soporte suficientes interfaces de introspección y se conozca el nombre de la interfaz que se desea mostrar.

### Parámetros

     variant


       variant debe ser una instancia de un objeto COM o el nombre de una biblioteca de tipos (que debe ser resuelto de acuerdo con las reglas definidas en la función [com_load_typelib()](#function.com-load-typelib)).






     dispatch_interface


       El nombre de una interfaz descendiente IDispatch que se desea mostrar.






     display_sink


       Si el parámetro wantsink vale **[true](#constant.true)**, se mostrará la interfaz de sumidero correspondiente en su lugar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [com_event_sink()](#function.com-event-sink) - Conecta eventos de un objeto COM a un objeto PHP

    - [com_load_typelib()](#function.com-load-typelib) - Carga un Typelib

# variant_abs

(PHP 5, PHP 7, PHP 8)

variant_abs — Devuelve el valor absoluto de un variant

### Descripción

**variant_abs**([mixed](#language.types.mixed) $value): [variant](#class.variant)

Devuelve el valor absoluto de un variant.

### Parámetros

     value


       El variant.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el valor absoluto de value.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [abs()](#function.abs) - Valor absoluto

# variant_add

(PHP 5, PHP 7, PHP 8)

variant_add — Añade dos valores de variantes y devuelve el resultado

### Descripción

**variant_add**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Añade left a right según
las siguientes reglas (tomadas de la biblioteca MSDN), que corresponden a
las de Visual Basic:

    <caption>**Regla de adición de variantes**</caption>



      Si
      Entonces






      Ambas expresiones son strings
      Concatenación



      Una expresión es de tipo string y la otra es un carácter
      Adición



      Una expresión es numérica y la otra es un string
      Adición



      Ambas expresiones son numéricas
      Adición



      Una expresión es NULL
      NULL es devuelto



      Ambas expresiones están vacías
      El subtipo entero es devuelto


### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, **variant_add()**, en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el resultado.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de fallo.

### Ver también

    - [variant_sub()](#function.variant-sub) - Sustrae el valor del variant de la derecha del valor del de la izquierda

# variant_and

(PHP 5, PHP 7, PHP 8)

variant_and — Realiza un AND entre dos variantes y devuelve el resultado

### Descripción

**variant_and**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Realiza un AND a nivel de bits, según la tabla de verdad siguiente;
note que esto es diferente del AND normal.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Reglas del AND variant**</caption>



       Si left es
       Si right es
       entonces el resultado es





      **[true](#constant.true)****[true](#constant.true)****[true](#constant.true)**

      **[true](#constant.true)****[false](#constant.false)****[false](#constant.false)**

      **[true](#constant.true)****[null](#constant.null)****[null](#constant.null)**

      **[false](#constant.false)****[true](#constant.true)****[false](#constant.false)**

      **[false](#constant.false)****[false](#constant.false)****[false](#constant.false)**

      **[false](#constant.false)****[null](#constant.null)****[false](#constant.false)**

      **[null](#constant.null)****[true](#constant.true)****[null](#constant.null)**

      **[null](#constant.null)****[false](#constant.false)****[false](#constant.false)**

      **[null](#constant.null)****[null](#constant.null)****[null](#constant.null)**



### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [variant_or()](#function.variant-or) - Realiza una disyunción lógica sobre dos variantes

# variant_cast

(PHP 5, PHP 7, PHP 8)

variant_cast — Convierte un variant en un nuevo objeto variant de tipo diferente

### Descripción

**variant_cast**([variant](#class.variant) $variant, [int](#language.types.integer) $type): [variant](#class.variant)

Esta función crea una copia de variant y realiza
entonces una conversión para forzar la copia a tener el tipo dado por
type.

Esta función es en realidad la función VariantChangeType() de la biblioteca COM;
consulte MSDN para más información.

### Parámetros

     variant


       El variant.






     type


       type debe ser un tipo entre las constantes
       **[VT_*](#constant.vt-null)**.





### Valores devueltos

Devuelve un variant del type proporcionado.

### Ver también

    - [variant_set_type()](#function.variant-set-type) - Convierte un variant en otro tipo "in situ"

# variant_cat

(PHP 5, PHP 7, PHP 8)

variant_cat — Une dos valores variantes y devuelve el resultado

### Descripción

**variant_cat**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Une left con right
y devuelve el resultado.

Esta función es equivalente a
$left . $right.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el resultado de la concatenación.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [String](#language.operators.string) para el operador
     de concatenación

# variant_cmp

(PHP 5, PHP 7, PHP 8)

variant_cmp — Compara dos variantes

### Descripción

**variant_cmp**(
    [mixed](#language.types.mixed) $left,
    [mixed](#language.types.mixed) $right,
    [int](#language.types.integer) $locale_id = **[LOCALE_SYSTEM_DEFAULT](#constant.locale-system-default)**,
    [int](#language.types.integer) $flags = 0
): [int](#language.types.integer)

Compara left con right.

Esta función solo comparará valores escalares, no arrays ni registros variantes.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.






     locale_id


       Identificador de configuración local válido a utilizar durante las comparaciones de strings (esto afecta la colación del string).






     flags


       flags puede ser uno o varios de los siguientes valores, unidos con OR, y afecta las comparaciones de strings:



        <caption>**Opciones de comparación Variant**</caption>



           Valor
           Significado






           **[NORM_IGNORECASE](#constant.norm-ignorecase)**
           Compara con sensibilidad a mayúsculas y minúsculas



           **[NORM_IGNORENONSPACE](#constant.norm-ignorenonspace)**
           Ignora los caracteres no espaciadores



           **[NORM_IGNORESYMBOLS](#constant.norm-ignoresymbols)**
           Ignora los símbolos



           **[NORM_IGNOREWIDTH](#constant.norm-ignorewidth)**
           Ignora el ancho del string



           **[NORM_IGNOREKANATYPE](#constant.norm-ignorekanatype)**
           Ignora el tipo Kana



           **[NORM_IGNOREKASHIDA](#constant.norm-ignorekashida)**
           Ignora los caracteres árabes kashida









**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve uno de los siguientes valores:

    <caption>**Resultados de las comparaciones sobre variantes**</caption>



       Valor
       Significado






       **[VARCMP_LT](#constant.varcmp-lt)**
       left es menor que right



       **[VARCMP_EQ](#constant.varcmp-eq)**
       left es igual a right



       **[VARCMP_GT](#constant.varcmp-gt)**
       left es mayor que right



       **[VARCMP_NULL](#constant.varcmp-null)**
       left, right o ambos son **[null](#constant.null)**




# variant_date_from_timestamp

(PHP 5, PHP 7, PHP 8)

variant_date_from_timestamp — Devuelve una representación de fecha en variant de un timestamp Unix

### Descripción

**variant_date_from_timestamp**([int](#language.types.integer) $timestamp): [variant](#class.variant)

Convierte timestamp desde un timestamp Unix al tipo variant **[VT_DATE](#constant.vt-date)**. Esto permite una interoperabilidad más fácil entre los sistemas Unix de PHP y COM.

### Parámetros

     timestamp


       Un timestamp Unix.





### Valores devueltos

Devuelve un variant **[VT_DATE](#constant.vt-date)**.

### Ver también

    - [variant_date_to_timestamp()](#function.variant-date-to-timestamp) - Convierte un valor de fecha/hora variante en un timestamp Unix

    - [mktime()](#function.mktime) - Obtener la marca de tiempo Unix de una fecha

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

# variant_date_to_timestamp

(PHP 5, PHP 7, PHP 8)

variant_date_to_timestamp — Convierte un valor de fecha/hora variante en un timestamp Unix

### Descripción

**variant_date_to_timestamp**([variant](#class.variant) $variant): [?](#language.types.null)[int](#language.types.integer)

Convierte variant de un valor **[VT_DATE](#constant.vt-date)**
(o similar) en un timestamp Unix. Esto permite la interoperabilidad fácil
entre las partes Unix de PHP y COM.

### Parámetros

     variant


       El variant.





### Valores devueltos

Devuelve un timestamp Unix, o **[null](#constant.null)** en caso de fallo.

### Ver también

    - [variant_date_from_timestamp()](#function.variant-date-from-timestamp) - Devuelve una representación de fecha en variant de un timestamp Unix

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [strftime()](#function.strftime) - Formatea una fecha/hora local con la configuración local

# variant_div

(PHP 5, PHP 7, PHP 8)

variant_div — Devuelve el resultado de la división de dos variantes

### Descripción

**variant_div**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Divide left por right y
devuelve el resultado.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Regla de división de variantes**</caption>



       Si
       Entonces






       Ambas expresiones son strings, fechas, caracteres, bool
       Double es devuelto



       Una expresión es un string y la otra es un carácter
       División y double devueltos



       Una expresión es numérica y la otra es un string
       División y double devueltos



       Ambas expresiones son numéricas
       División y double devueltos



       Una de las expresiones es NULL
       NULL es devuelto



       right está vacío y
       left es cualquier cosa pero no vacío
       Una [com_exception](#class.com-exception) con código **[DISP_E_DIVBYZERO](#constant.disp-e-divbyzero)**
       es lanzada



       left está vacío y
        right es cualquier cosa pero no vacío.
       0 como double es devuelto



       Ambas expresiones están vacías
       Una [com_exception](#class.com-exception) con código **[DISP_E_OVERFLOW](#constant.disp-e-overflow)**
       es lanzada




### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de fallo.

### Ver también

    - [variant_idiv()](#function.variant-idiv) - Convierte variants en valores enteros y realiza una división

# variant_eqv

(PHP 5, PHP 7, PHP 8)

variant_eqv — Realiza una equivalencia de bits de dos variants

### Descripción

**variant_eqv**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Realiza una equivalencia de bits de dos variants.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Si cada bit en left es igual al bit correspondiente
en right entonces la función retorna **[true](#constant.true)**, de lo contrario
retorna **[false](#constant.false)**.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de fallo.

# variant_fix

(PHP 5, PHP 7, PHP 8)

variant_fix — Recupera la porción entera de un variant

### Descripción

**variant_fix**([mixed](#language.types.mixed) $value): [variant](#class.variant)

Recupera la porción entera de un variant.

### Parámetros

     value


       El variant.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Si value es negativo, el primer entero negativo
mayor o igual al variant es devuelto, de lo contrario esta función devuelve
la porción entera del valor de value.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [variant_int()](#function.variant-int) - Devuelve la parte entera de un variant

    - [variant_round()](#function.variant-round) - Redondea el variant al número especificado de decimales

    - [floor()](#function.floor) - Redondea hacia el entero inferior

    - [ceil()](#function.ceil) - Redondea al número superior

    - [round()](#function.round) - Redondea un número de punto flotante

# variant_get_type

(PHP 5, PHP 7, PHP 8)

variant_get_type — Devuelve el tipo de un objeto variant

### Descripción

**variant_get_type**([variant](#class.variant) $variant): [int](#language.types.integer)

Devuelve el tipo de un objeto variant.

### Parámetros

     variant


       El objeto variant.





### Valores devueltos

Devuelve un valor entero que indica el tipo
de variant, que puede ser una instancia
de [com](#class.com), [dotnet](#class.dotnet) o de
[variant](#class.variant). El valor de retorno puede ser comparado
a una de las constantes **[VT\_\*](#constant.vt-null)**.

El valor de retorno para los objetos COM y DOTNET será la mayoría
de las veces **[VT_DISPATCH](#constant.vt-dispatch)**; la única razón por la que
esta función funciona con estas clases es que COM y DOTNET son descendientes de VARIANT.

### Ver también

    - [variant_set_type()](#function.variant-set-type) - Convierte un variant en otro tipo "in situ"

# variant_idiv

(PHP 5, PHP 7, PHP 8)

variant_idiv — Convierte variants en valores enteros y realiza una división

### Descripción

**variant_idiv**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Convierte left y right en
valores enteros y realiza una división entera.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Reglas de divisiones internas de variants**</caption>



       Si
       Entonces






       Ambas expresiones son strings, fechas, caracteres, bool
       División y entero devueltos



       Una expresión es un string y la otra es un carácter
       División



       Una expresión es numérica y la otra es un string
       División



       Ambas expresiones son numéricas
       División



       Una de las expresiones es NULL
       NULL es devuelto



       Ambas expresiones están vacías
       Se lanza una [com_exception](#class.com-exception) con código **[DISP_E_DIVBYZERO](#constant.disp-e-divbyzero)**





### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de fallo.

### Ver también

    - [variant_div()](#function.variant-div) - Devuelve el resultado de la división de dos variantes

# variant_imp

(PHP 5, PHP 7, PHP 8)

variant_imp — Ejecuta una implicación a nivel de bits de dos variantes

### Descripción

**variant_imp**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Ejecuta una implicación a nivel de bits de dos variantes.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Tabla de implicación de variantes**</caption>



      Si left es
      Si right es
      entonces el resultado es





     **[true](#constant.true)****[true](#constant.true)****[true](#constant.true)**

     **[true](#constant.true)****[false](#constant.false)****[false](#constant.false)**

     **[true](#constant.true)****[null](#constant.null)****[true](#constant.true)**

     **[false](#constant.false)****[true](#constant.true)****[true](#constant.true)**

     **[false](#constant.false)****[false](#constant.false)****[true](#constant.true)**

     **[false](#constant.false)****[null](#constant.null)****[true](#constant.true)**

     **[null](#constant.null)****[true](#constant.true)****[true](#constant.true)**

     **[null](#constant.null)****[false](#constant.false)****[null](#constant.null)**

     **[null](#constant.null)****[null](#constant.null)****[null](#constant.null)**

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

# variant_int

(PHP 5, PHP 7, PHP 8)

variant_int — Devuelve la parte entera de un variant

### Descripción

**variant_int**([mixed](#language.types.mixed) $value): [variant](#class.variant)

Recupera la parte entera de un variant.

### Parámetros

     value


       El variant.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Si value es negativo, el primer entero negativo
inferior o igual a este variant es devuelto, de lo contrario esta función devuelve
la parte entera del valor de value.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [variant_fix()](#function.variant-fix) - Recupera la porción entera de un variant

    - [variant_round()](#function.variant-round) - Redondea el variant al número especificado de decimales

    - [floor()](#function.floor) - Redondea hacia el entero inferior

    - [ceil()](#function.ceil) - Redondea al número superior

    - [round()](#function.round) - Redondea un número de punto flotante

# variant_mod

(PHP 5, PHP 7, PHP 8)

variant_mod — Divide dos variantes y devuelve el resto

### Descripción

**variant_mod**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Divide left por right y
devuelve el resto.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el resto de la división.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [variant_div()](#function.variant-div) - Devuelve el resultado de la división de dos variantes

    - [variant_idiv()](#function.variant-idiv) - Convierte variants en valores enteros y realiza una división

# variant_mul

(PHP 5, PHP 7, PHP 8)

variant_mul — Multiplica los valores de dos variantes

### Descripción

**variant_mul**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Multiplica left por right.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





Los valores booleanos se convierten en -1 para **[false](#constant.false)** y en
0 para **[true](#constant.true)**
**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Reglas de multiplicación de variantes**</caption>



       Si
       Entonces






       Ambas expresiones son del tipo string, fecha, carácter o booleano
       Multiplicación



       Una expresión es un string y la otra es un carácter
       Multiplicación



       Una expresión es numérica y la otra es un string
       Multiplicación



       Ambas expresiones son numéricas
       Multiplicación



       Una de las expresiones es NULL
       NULL es devuelto



       Ambas expresiones están vacías
       Un string vacío es devuelto




### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de fallo.

### Ver también

    - [variant_div()](#function.variant-div) - Devuelve el resultado de la división de dos variantes

    - [variant_idiv()](#function.variant-idiv) - Convierte variants en valores enteros y realiza una división

# variant_neg

(PHP 5, PHP 7, PHP 8)

variant_neg — Realiza una negación lógica sobre un variant

### Descripción

**variant_neg**([mixed](#language.types.mixed) $value): [variant](#class.variant)

Realiza una negación lógica sobre value.

### Parámetros

     value


       El variant.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el resultado de la negación lógica.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

# variant_not

(PHP 5, PHP 7, PHP 8)

variant_not — Ejecuta una negación a nivel de bits sobre un variant

### Descripción

**variant_not**([mixed](#language.types.mixed) $value): [variant](#class.variant)

Ejecuta una negación a nivel de bits sobre el argumento value
y devuelve el resultado.

### Parámetros

     value


       El variant.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve la negación. Si value vale
**[null](#constant.null)**, el resultado será también **[null](#constant.null)**.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

# variant_or

(PHP 5, PHP 7, PHP 8)

variant_or — Realiza una disyunción lógica sobre dos variantes

### Descripción

**variant_or**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Realiza una operación a nivel de bits de tipo OR, según la tabla de verdad
siguiente. Téngase en cuenta que esto es diferente de la expresión OR normal.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Reglas del OR Variant**</caption>



       Si left es
       Si right es
       entonces el resultado es





      **[true](#constant.true)****[true](#constant.true)****[true](#constant.true)**

      **[true](#constant.true)****[false](#constant.false)****[true](#constant.true)**

      **[true](#constant.true)****[null](#constant.null)****[true](#constant.true)**

      **[false](#constant.false)****[true](#constant.true)****[true](#constant.true)**

      **[false](#constant.false)****[false](#constant.false)****[false](#constant.false)**

      **[false](#constant.false)****[null](#constant.null)****[null](#constant.null)**

      **[null](#constant.null)****[true](#constant.true)****[true](#constant.true)**

      **[null](#constant.null)****[false](#constant.false)****[null](#constant.null)**

      **[null](#constant.null)****[null](#constant.null)****[null](#constant.null)**



### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [variant_and()](#function.variant-and) - Realiza un AND entre dos variantes y devuelve el resultado

    - [variant_xor()](#function.variant-xor) - Ejecuta una exclusión lógica sobre dos variantes

# variant_pow

(PHP 5, PHP 7, PHP 8)

variant_pow — Devuelve el resultado de la función potencia con dos variantes

### Descripción

**variant_pow**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Devuelve el resultado de left elevado a la potencia
right.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el resultado de left elevado a la potencia
right.

### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [pow()](#function.pow) - Expresión exponencial

# variant_round

(PHP 5, PHP 7, PHP 8)

variant_round — Redondea el variant al número especificado de decimales

### Descripción

**variant_round**([mixed](#language.types.mixed) $value, [int](#language.types.integer) $decimals): [?](#language.types.null)[variant](#class.variant)

Devuelve el valor de value redondeado a
decimals decimales.

### Parámetros

     value


       El variant.






     decimals


       Número de decimales.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

Devuelve el valor redondeado, o **[null](#constant.null)** en caso de error.

### Ver también

    - [round()](#function.round) - Redondea un número de punto flotante

# variant_set

(PHP 5, PHP 7, PHP 8)

variant_set — Asigna un nuevo valor a un objeto variant

### Descripción

**variant_set**([variant](#class.variant) $variant, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Convierte value en un variant y lo asigna al objeto
variant. No se crea ningún nuevo objeto y el valor anterior de variant es liberado.

### Parámetros

     variant


       El variant.






     value







### Valores devueltos

No se retorna ningún valor.

# variant_set_type

(PHP 5, PHP 7, PHP 8)

variant_set_type — Convierte un variant en otro tipo "in situ"

### Descripción

**variant_set_type**([variant](#class.variant) $variant, [int](#language.types.integer) $type): [void](language.types.void.html)

Esta función es similar a [variant_cast()](#function.variant-cast) excepto que
el variant es modificado "in situ"; no se crea ningún nuevo variant. Los
argumentos de esta función tienen el mismo significado que los de
[variant_cast()](#function.variant-cast).

### Parámetros

     variant


       El variant.






     type







### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [variant_cast()](#function.variant-cast) - Convierte un variant en un nuevo objeto variant de tipo diferente

    - [variant_get_type()](#function.variant-get-type) - Devuelve el tipo de un objeto variant

# variant_sub

(PHP 5, PHP 7, PHP 8)

variant_sub — Sustrae el valor del variant de la derecha del valor del de la izquierda

### Descripción

**variant_sub**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Sustrae right de left.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Reglas de sustracción de los variants**</caption>



       Si
       Entonces






       Ambas expresiones son strings
       Sustracción



       Una expresión es un string y la otra es un carácter
       Sustracción



       Una expresión es numérica y la otra es un string
       Sustracción.



       Ambas expresiones son numéricas
       Sustracción



       Una de las expresiones es NULL
       NULL es devuelto



       Ambas expresiones están vacías
       Un string vacío es devuelto




### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de error.

### Ver también

    - [variant_add()](#function.variant-add) - Añade dos valores de variantes y devuelve el resultado

# variant_xor

(PHP 5, PHP 7, PHP 8)

variant_xor — Ejecuta una exclusión lógica sobre dos variantes

### Descripción

**variant_xor**([mixed](#language.types.mixed) $left, [mixed](#language.types.mixed) $right): [variant](#class.variant)

Ejecuta una exclusión lógica sobre dos variantes.

### Parámetros

     left


       El operando de la izquierda.






     right


       El operando de la derecha.





**Nota**:

    Al igual que para todas las funciones aritméticas, los parámetros para esta función
    pueden ser ya sea un tipo nativo de PHP (entero, string, float, bool o **[null](#constant.null)**), o una instancia de la clase COM, VARIANT o DOTNET. Los tipos nativos de PHP
    serán convertidos a VARIANT utilizando las mismas reglas que las encontradas en el
    constructor de la clase [variant](#class.variant). Los objetos COM y DOTNET
    tendrán el valor de su propiedad por defecto recuperado y utilizado como valor VARIANT.




    Las funciones aritméticas VARIANT están interfazadas con las funciones equivalentes de la biblioteca
    COM; para más información sobre estas funciones, consúltese la biblioteca MSDN. Las funciones PHP tienen nombres ligeramente diferentes:
    por ejemplo, [variant_add()](#function.variant-add), en PHP, corresponde a
    VarAdd() en la documentación MSDN.

### Valores devueltos

    <caption>**Reglas XOR para los Variant**</caption>



       Si left es
       Si right es
       entonces el resultado es





      **[true](#constant.true)****[true](#constant.true)****[false](#constant.false)**

      **[true](#constant.true)****[false](#constant.false)****[true](#constant.true)**

      **[false](#constant.false)****[true](#constant.true)****[true](#constant.true)**

      **[false](#constant.false)****[false](#constant.false)****[false](#constant.false)**

      **[null](#constant.null)****[null](#constant.null)****[null](#constant.null)**



### Errores/Excepciones

Lanza una [com_exception](#class.com-exception) en caso de fallo.

### Ver también

    - [variant_or()](#function.variant-or) - Realiza una disyunción lógica sobre dos variantes

    - [variant_and()](#function.variant-and) - Realiza un AND entre dos variantes y devuelve el resultado

## Tabla de contenidos

- [com_create_guid](#function.com-create-guid) — Genera un identificador único global (GUID)
- [com_event_sink](#function.com-event-sink) — Conecta eventos de un objeto COM a un objeto PHP
- [com_get_active_object](#function.com-get-active-object) — Devuelve un objeto que representa la instancia actual de un objeto COM
- [com_load_typelib](#function.com-load-typelib) — Carga un Typelib
- [com_message_pump](#function.com-message-pump) — Procesa un mensaje COM en un tiempo dado
- [com_print_typeinfo](#function.com-print-typeinfo) — Muestra una definición de clase PHP para una interfaz distribuible
- [variant_abs](#function.variant-abs) — Devuelve el valor absoluto de un variant
- [variant_add](#function.variant-add) — Añade dos valores de variantes y devuelve el resultado
- [variant_and](#function.variant-and) — Realiza un AND entre dos variantes y devuelve el resultado
- [variant_cast](#function.variant-cast) — Convierte un variant en un nuevo objeto variant de tipo diferente
- [variant_cat](#function.variant-cat) — Une dos valores variantes y devuelve el resultado
- [variant_cmp](#function.variant-cmp) — Compara dos variantes
- [variant_date_from_timestamp](#function.variant-date-from-timestamp) — Devuelve una representación de fecha en variant de un timestamp Unix
- [variant_date_to_timestamp](#function.variant-date-to-timestamp) — Convierte un valor de fecha/hora variante en un timestamp Unix
- [variant_div](#function.variant-div) — Devuelve el resultado de la división de dos variantes
- [variant_eqv](#function.variant-eqv) — Realiza una equivalencia de bits de dos variants
- [variant_fix](#function.variant-fix) — Recupera la porción entera de un variant
- [variant_get_type](#function.variant-get-type) — Devuelve el tipo de un objeto variant
- [variant_idiv](#function.variant-idiv) — Convierte variants en valores enteros y realiza una división
- [variant_imp](#function.variant-imp) — Ejecuta una implicación a nivel de bits de dos variantes
- [variant_int](#function.variant-int) — Devuelve la parte entera de un variant
- [variant_mod](#function.variant-mod) — Divide dos variantes y devuelve el resto
- [variant_mul](#function.variant-mul) — Multiplica los valores de dos variantes
- [variant_neg](#function.variant-neg) — Realiza una negación lógica sobre un variant
- [variant_not](#function.variant-not) — Ejecuta una negación a nivel de bits sobre un variant
- [variant_or](#function.variant-or) — Realiza una disyunción lógica sobre dos variantes
- [variant_pow](#function.variant-pow) — Devuelve el resultado de la función potencia con dos variantes
- [variant_round](#function.variant-round) — Redondea el variant al número especificado de decimales
- [variant_set](#function.variant-set) — Asigna un nuevo valor a un objeto variant
- [variant_set_type](#function.variant-set-type) — Convierte un variant en otro tipo "in situ"
- [variant_sub](#function.variant-sub) — Sustrae el valor del variant de la derecha del valor del de la izquierda
- [variant_xor](#function.variant-xor) — Ejecuta una exclusión lógica sobre dos variantes

- [Introducción](#intro.com)
- [Instalación/Configuración](#com.setup)<li>[Requerimientos](#com.requirements)
- [Instalación](#com.installation)
- [Configuración en tiempo de ejecución](#com.configuration)
  </li>- [Constantes predefinidas](#com.constants)
- [Error y gestión de errores](#com.error-handling)
- [Ejemplos](#com.examples)<li>[For Each](#com.examples.foreach)
- [Arrays y propiedades a la manera de arrays de COM](#com.examples.arrays)
  </li>- [com](#class.com) — La clase com<li>[com::__construct](#com.construct) — Constructor de la clase com
  </li>- [dotnet](#class.dotnet) — La clase dotnet<li>[dotnet::__construct](#dotnet.construct) — Constructor de la clase dotnet
  </li>- [variant](#class.variant) — La clase variant<li>[variant::__construct](#variant.construct) — Constructor de la clase variant
  </li>- [COMPersistHelper](#class.compersisthelper) — La clase COMPersistHelper<li>[COMPersistHelper::__construct](#compersisthelper.construct) — Construye un objeto COMPersistHelper
- [COMPersistHelper::GetCurFileName](#compersisthelper.getcurfilename) — Devuelve el nombre del fichero actual
- [COMPersistHelper::GetMaxStreamSize](#compersisthelper.getmaxstreamsize) — Devuelve el tamaño máximo del stream
- [COMPersistHelper::InitNew](#compersisthelper.initnew) — Inicializa un objeto en un estado por omisión
- [COMPersistHelper::LoadFromFile](#compersisthelper.loadfromfile) — Carga un objeto desde un fichero
- [COMPersistHelper::LoadFromStream](#compersisthelper.loadfromstream) — Carga un objeto desde un stream
- [COMPersistHelper::SaveToFile](#compersisthelper.savetofile) — Guarda un objeto en un fichero
- [COMPersistHelper::SaveToStream](#compersisthelper.savetostream) — Guarda un objeto en un stream
  </li>- [com_exception](#class.com-exception) — La clase com_exception
- [com_safearray_proxy](#class.com-safearray-proxy) — La clase com_safearray_proxy
- [Funciones COM y .Net (Windows)](#ref.com)<li>[com_create_guid](#function.com-create-guid) — Genera un identificador único global (GUID)
- [com_event_sink](#function.com-event-sink) — Conecta eventos de un objeto COM a un objeto PHP
- [com_get_active_object](#function.com-get-active-object) — Devuelve un objeto que representa la instancia actual de un objeto COM
- [com_load_typelib](#function.com-load-typelib) — Carga un Typelib
- [com_message_pump](#function.com-message-pump) — Procesa un mensaje COM en un tiempo dado
- [com_print_typeinfo](#function.com-print-typeinfo) — Muestra una definición de clase PHP para una interfaz distribuible
- [variant_abs](#function.variant-abs) — Devuelve el valor absoluto de un variant
- [variant_add](#function.variant-add) — Añade dos valores de variantes y devuelve el resultado
- [variant_and](#function.variant-and) — Realiza un AND entre dos variantes y devuelve el resultado
- [variant_cast](#function.variant-cast) — Convierte un variant en un nuevo objeto variant de tipo diferente
- [variant_cat](#function.variant-cat) — Une dos valores variantes y devuelve el resultado
- [variant_cmp](#function.variant-cmp) — Compara dos variantes
- [variant_date_from_timestamp](#function.variant-date-from-timestamp) — Devuelve una representación de fecha en variant de un timestamp Unix
- [variant_date_to_timestamp](#function.variant-date-to-timestamp) — Convierte un valor de fecha/hora variante en un timestamp Unix
- [variant_div](#function.variant-div) — Devuelve el resultado de la división de dos variantes
- [variant_eqv](#function.variant-eqv) — Realiza una equivalencia de bits de dos variants
- [variant_fix](#function.variant-fix) — Recupera la porción entera de un variant
- [variant_get_type](#function.variant-get-type) — Devuelve el tipo de un objeto variant
- [variant_idiv](#function.variant-idiv) — Convierte variants en valores enteros y realiza una división
- [variant_imp](#function.variant-imp) — Ejecuta una implicación a nivel de bits de dos variantes
- [variant_int](#function.variant-int) — Devuelve la parte entera de un variant
- [variant_mod](#function.variant-mod) — Divide dos variantes y devuelve el resto
- [variant_mul](#function.variant-mul) — Multiplica los valores de dos variantes
- [variant_neg](#function.variant-neg) — Realiza una negación lógica sobre un variant
- [variant_not](#function.variant-not) — Ejecuta una negación a nivel de bits sobre un variant
- [variant_or](#function.variant-or) — Realiza una disyunción lógica sobre dos variantes
- [variant_pow](#function.variant-pow) — Devuelve el resultado de la función potencia con dos variantes
- [variant_round](#function.variant-round) — Redondea el variant al número especificado de decimales
- [variant_set](#function.variant-set) — Asigna un nuevo valor a un objeto variant
- [variant_set_type](#function.variant-set-type) — Convierte un variant en otro tipo "in situ"
- [variant_sub](#function.variant-sub) — Sustrae el valor del variant de la derecha del valor del de la izquierda
- [variant_xor](#function.variant-xor) — Ejecuta una exclusión lógica sobre dos variantes
  </li>
