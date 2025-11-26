# Tabla de hachaje de contraseñas

# Introducción

La API de hachaje de contraseñas proporciona un gestor simple de utilizar
basado en la función [crypt()](#function.crypt) y otros algoritmos de
hachaje de contraseñas, facilitando la
creación y gestión de contraseñas de manera segura.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#password.requirements)
- [Instalación](#password.installation)

    ## Requerimientos

    No se requiere ninguna biblioteca externa para compilar esta extensión.

    Para el hachado de contraseñas Argon2, debe estar disponible
    [» libargon2](https://github.com/P-H-C/phc-winner-argon2) o, a partir de
    PHP 8.4.0, la versión OpenSSL 3.2 o superior. A partir de PHP 7.3.0, se requiere la versión
    20161029 o superior de libargon2 si se utiliza libargon2.

    ## Instalación

    No hay instalación necesaria para
    usar estas funciones, son parte del núcleo de PHP.

    Sin embargo, para activar el hachado de contraseñas Argon2, PHP debe ser compilado con
    soporte para libargon2 utilizando la opción de configuración
    **--with-password-argon2**
    o, a partir de PHP 8.4.0, con OpenSSL utilizando
    **--with-openssl** y
    **--with-openssl-argon2**.

    Anterior a PHP 8.1.0, era posible especificar el directorio argon2 con
    **--with-password-argon2[=DIR]**.

# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

     **[PASSWORD_BCRYPT](#constant.password-bcrypt)**
     ([string](#language.types.string))



      La constante **[PASSWORD_BCRYPT](#constant.password-bcrypt)** se utiliza para
      crear un nuevo hash de contraseña utilizando el algoritmo
      **[CRYPT_BLOWFISH](#constant.crypt-blowfish)**.




      Siempre ha devuelto el resultado del hash utilizando el formato
      crypt "$2y$", que siempre será un string de 60 caracteres de longitud.




      Opciones admitidas:




      -

        salt ([string](#language.types.string)) - permite proporcionar manualmente un salt a utilizar
        para el hash de la contraseña. Tenga en cuenta que esto sobrescribirá cualquier salt generado
        automáticamente.




        Si se omite, un salt aleatorio será generado por la función
        [password_hash()](#function.password-hash) para cada contraseña hasheada.
        Este es el propósito de la operación y a partir de PHP 7.0.0 la opción salt ha sido desaconsejada.





      -

        cost ([int](#language.types.integer)) - el costo algorítmico a utilizar.
        Ejemplos de estos valores pueden encontrarse en la página
        de documentación de la función [crypt()](#function.crypt).




        Si se omite, se utilizará un valor por defecto de 12.
        Es una buena base pero podría ser necesario aumentarlo según la arquitectura del hardware.










     **[PASSWORD_BCRYPT_DEFAULT_COST](#constant.password-bcrypt-default-cost)**
     ([int](#language.types.integer))














     **[PASSWORD_ARGON2I](#constant.password-argon2i)**
     ([string](#language.types.string))



      **[PASSWORD_ARGON2I](#constant.password-argon2i)** se utiliza para crear nuevos
      hashes de contraseña utilizando el algoritmo Argon2i.




      Opciones admitidas:




      -

        memory_cost ([int](#language.types.integer)) - Memoria máxima
        (en kibibytes) que puede ser utilizada para calcular el hash Argon2. Por defecto a
        **[PASSWORD_ARGON2_DEFAULT_MEMORY_COST](#constant.password-argon2-default-memory-cost)**.





      -

        time_cost ([int](#language.types.integer)) - Tiempo máximo de
        duración que puede tomar calcular el hash Argon2. Por defecto a
        **[PASSWORD_ARGON2_DEFAULT_TIME_COST](#constant.password-argon2-default-time-cost)**.





      -

        threads ([int](#language.types.integer)) - Número de hilos a
        utilizar para calcular el hash Argon2. Por defecto a
        **[PASSWORD_ARGON2_DEFAULT_THREADS](#constant.password-argon2-default-threads)**.
        Solo disponible con libargon2, y no con la implementación libsodium.







      Disponible a partir de PHP 7.2.0.







     **[PASSWORD_ARGON2ID](#constant.password-argon2id)**
     ([string](#language.types.string))



      **[PASSWORD_ARGON2ID](#constant.password-argon2id)** se utiliza para crear nuevos
      hashes de contraseña utilizando el algoritmo Argon2id. Admite las mismas opciones que
      [**<a href="#constant.password-argon2i">PASSWORD_ARGON2I](#constant.password-argon2i)**</a>.




      Disponible a partir de PHP 7.3.0.







     **[PASSWORD_ARGON2_DEFAULT_MEMORY_COST](#constant.password-argon2-default-memory-cost)**
     ([int](#language.types.integer))



      Cantidad de memoria por defecto (en bytes) que será utilizada al
      intentar calcular un hash.




      Disponible a partir de PHP 7.2.0.







     **[PASSWORD_ARGON2_DEFAULT_TIME_COST](#constant.password-argon2-default-time-cost)**
     ([int](#language.types.integer))



      Tiempo por defecto que se tomará para intentar calcular
      un hash.




      Disponible a partir de PHP 7.2.0.







     **[PASSWORD_ARGON2_DEFAULT_THREADS](#constant.password-argon2-default-threads)**
     ([int](#language.types.integer))



      Número por defecto de hilos que Argon2lib utilizará.
      No disponible con la implementación libsodium.




      Disponible a partir de PHP 7.2.0.







     **[PASSWORD_ARGON2_PROVIDER](#constant.password-argon2-provider)**
     ([string](#language.types.string))







      Disponible a partir de PHP 7.4.0.







     **[PASSWORD_DEFAULT](#constant.password-default)**
     ([string](#language.types.string))



      El algoritmo por defecto a utilizar para el hash si no se proporciona
      ningún algoritmo. Este valor puede cambiar en futuras versiones de PHP donde es probable
      que se admitan mejores algoritmos de hash.




      Es importante tener en cuenta que con el tiempo, esta constante puede cambiar.
      Por lo tanto, es crucial ser consciente de que la longitud del hash resultante puede variar.
      Por consiguiente, al utilizar **[PASSWORD_DEFAULT](#constant.password-default)**, el hash resultante
      debe almacenarse de una manera capaz de admitir hashes arbitrarios,
      la anchura recomendada es de 255 bytes.




      Actualmente, es un alias de **[PASSWORD_BCRYPT](#constant.password-bcrypt)**.


##### Historial de cambios

       Versión
       Descripción






       7.4.0

        Los valores para las constantes **[PASSWORD_BCRYPT](#constant.password-bcrypt)**,
        **[PASSWORD_ARGON2I](#constant.password-argon2i)**, **[PASSWORD_ARGON2ID](#constant.password-argon2id)**
        y **[PASSWORD_DEFAULT](#constant.password-default)** ahora son [string](#language.types.string)s.
        Anteriormente, eran [int](#language.types.integer)s.





# Funciones de hashing de contraseñas

# password_algos

(PHP 7 &gt;= 7.4.0, PHP 8)

password_algos — Obtiene todos los identificadores de los algoritmos de hash de contraseñas disponibles

### Descripción

**password_algos**(): [array](#language.types.array)

Devuelve una lista completa de todos los identificadores de los algoritmos
de hash de contraseñas registrados, en forma de un [array](#language.types.array) de [string](#language.types.string).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve todos los identificadores de los algoritmos de hash de contraseñas
disponibles.

### Ejemplos

**Ejemplo #1 Uso básico de la función password_algos()**

&lt;?php
print_r(password_algos());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 2y
[1] =&gt; argon2i
[2] =&gt; argon2id
)

# password_get_info

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

password_get_info — Devuelve información sobre el hash proporcionado

### Descripción

**password_get_info**([string](#language.types.string) $hash): [array](#language.types.array)

Cuando se le pasa un hash válido creado con un algoritmo soportado por
[password_hash()](#function.password-hash), esta función devolverá un array con
información sobre dicho hash.

### Parámetros

    hash


      Un hash creado por la función [password_hash()](#function.password-hash).


### Valores devueltos

Devuelve un array asociativo con tres elementos:

    -

      algo, que coincidirá con una
      [constante de algoritmo de contraseñas](#password.constants)



    -

      algoName, que tiene el nombre legible por humanos del
      algoritmo



    -

      options, que incluye las opciones
      proporcionadas al llamar a [password_hash()](#function.password-hash)


# password_hash

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

password_hash — Crea una clave de hash para una contraseña

### Descripción

**password_hash**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password, [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $algo, [array](#language.types.array) $options = []): [string](#language.types.string)

La función **password_hash()** crea un nuevo
hash utilizando un algoritmo de hash fuerte e irreversible.

Los siguientes algoritmos son actualmente soportados:

    -

      **[PASSWORD_DEFAULT](#constant.password-default)** - Uso del algoritmo bcrypt (por omisión desde
      PHP 5.5.0). Tenga en cuenta que esta constante está diseñada para cambiar con el tiempo, a medida
      que se añaden algoritmos más recientes y fuertes a PHP. Por esta razón, la longitud del resultado
      de este algoritmo puede cambiar con el tiempo, por lo que se recomienda almacenar el resultado en
      una columna de la base de datos que pueda contener al menos 60 caracteres
      (255 bytes puede ser una muy buena opción).



    -

      **[PASSWORD_BCRYPT](#constant.password-bcrypt)** - Uso del algoritmo bcrypt
      para crear la clave de hash. Esto creará una clave de hash estándar [crypt()](#function.crypt)
      utilizando el identificador $2y$.



    -

      **[PASSWORD_ARGON2I](#constant.password-argon2i)** - Utiliza el algoritmo de hash Argon2i para crear el hash.
      Este algoritmo solo está disponible si PHP ha sido compilado con el soporte de Argon2



    -

      **[PASSWORD_ARGON2ID](#constant.password-argon2id)** - Utiliza el algoritmo de hash Argon2id para crear el hash.
      Este algoritmo solo está disponible si PHP ha sido compilado con el soporte de Argon2


Opciones soportadas para **[PASSWORD_BCRYPT](#constant.password-bcrypt)**:

    -

      salt - para proporcionar manualmente un salt a utilizar durante el hash de
      la contraseña. Tenga en cuenta que esta opción evitará la generación automática.




      Si se omite, un salt aleatorio será generado por la función **password_hash()**
      para cada contraseña hash. Este es el modo de funcionamiento previsto.



     **Advertencia**

       La opción Salt está obsoleta. Es preferible utilizar simplemente
       el salt que se genera por omisión.
       A partir de PHP 8.0.0, un salt proporcionado explícitamente es ignorado.






    -

      cost - determina el costo algorítmico que debe ser utilizado.
      Ejemplos de estos valores pueden ser encontrados en la página de documentación
      de la función [crypt()](#function.crypt).




      Si se omite, el valor por omisión 12 será utilizado. Este es un buen compromiso,
      pero debe ser ajustado según el hardware utilizado.


Opciones soportadas para **[PASSWORD_ARGON2I](#constant.password-argon2i)** y **[PASSWORD_ARGON2ID](#constant.password-argon2id)**:

    -

      memory_cost ([int](#language.types.integer)) - Memoria máxima
      (en kilobytes binarios) que puede ser utilizada para calcular el hash Argon2. Por
      omisión a **[PASSWORD_ARGON2_DEFAULT_MEMORY_COST](#constant.password-argon2-default-memory-cost)**.





    -

      time_cost ([int](#language.types.integer)) - Duración máxima de
      tiempo que puede tomar para calcular el hash Argon2. Por
      omisión a **[PASSWORD_ARGON2_DEFAULT_TIME_COST](#constant.password-argon2-default-time-cost)**.





    -

      threads ([int](#language.types.integer)) - Número de hilos a
      utilizar para calcular el hash Argon2. Por omisión a **[PASSWORD_ARGON2_DEFAULT_THREADS](#constant.password-argon2-default-threads)**.



     **Advertencia**

       Solo disponible cuando PHP utiliza libargon2,
       y no la implementación libsodium.





### Parámetros

    password


      La contraseña del usuario.



     **Precaución**

       El uso de la constante **[PASSWORD_BCRYPT](#constant.password-bcrypt)**
       para el algoritmo hará que el parámetro
       password sea truncado a una longitud máxima de
       72 bytes.







    algo


      Una [constante del algoritmo

de contraseña](#password.constants) que representa el algoritmo a utilizar durante el hasheo de la contraseña.

    options


      Un array asociativo que contiene las opciones.

Ver también [las constantes del algoritmo de contraseña](#password.constants)
para la documentación sobre las opciones soportadas para cada algoritmo.

### Valores devueltos

Retorna la contraseña hash.

El algoritmo utilizado, el costo y el salt están contenidos en el hash retornado.
También, toda la información útil para verificar este último está incluida.
Esto permite que la función [password_verify()](#function.password-verify) verifique el
hash sin necesidad de almacenar por separado esta información.

### Historial de cambios

       Versión
       Descripción






        8.4.0

         El valor por omisión de la opción cost del
         algoritmo **[PASSWORD_BCRYPT](#constant.password-bcrypt)** ha sido aumentado de
         10 a 12.




       8.3.0

        **password_hash()** ahora asocia la excepción
        [Random\RandomException](#class.random-randomexception) subyacente a
        [Exception::$previous](#exception.props.previous) cuando una
        [ValueError](#class.valueerror) es lanzada debido a un fallo
        en la generación del salt.




       8.0.0

        **password_hash()** ya no retorna **[false](#constant.false)** en caso de fallo, una
        [ValueError](#class.valueerror) será lanzada si el algoritmo de hash de contraseña
        no es válido, o una [Error](#class.error) si el hash de contraseña falló por una razón desconocida.




       8.0.0

        algo ahora es nullable.




       7.4.0

        El parámetro algo ahora espera una [string](#language.types.string), pero
        sigue aceptando un [int](#language.types.integer) para mantener la compatibilidad hacia atrás.




       7.4.0

        La extensión sodium proporciona una implementación alternativa para las
        contraseñas Argon2.




       7.3.0

        Añadido el soporte para contraseñas Argon2id utilizando **[PASSWORD_ARGON2ID](#constant.password-argon2id)**.




       7.2.0

        Añadido el soporte para contraseñas Argon2i utilizando **[PASSWORD_ARGON2I](#constant.password-argon2i)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con password_hash()**

&lt;?php
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
?&gt;

    Resultado del ejemplo anterior es similar a:

$2y$12$4Umg0rCJwMswRw/l.SwHvuQV01coP0eWmGzd61QH2RvAOMANUBGC.

    **Ejemplo #2 Ejemplo con password_hash()** definiendo manualmente la opción cost

&lt;?php
$options = [
// Aumenta el costo de bcrypt de 12 a 13.
'cost' =&gt; 13,
];
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
?&gt;

    Resultado del ejemplo anterior es similar a:

$2y$13$xeDfQumlmdm0Sco.4qmH1OGfUUmOcuRmfae0dPJhjX1Bq0yYhqbNi

    **Ejemplo #3 Ejemplo con password_hash()** para encontrar un buen costo (cost)



     Este código realizará un benchmark de la máquina para determinar el costo máximo
     que puede ser utilizado sin degradar la experiencia del usuario. Se recomienda
     elegir el costo más alto posible sin ralentizar otras operaciones
     que la máquina debe ejecutar. 11 es una buena base, y un valor más
     alto es preferible si la máquina es suficientemente rápida. El código de abajo
     apunta a un tiempo de estiramiento ≤ 350 milisegundos, lo cual representa un retraso adecuado
     para sistemas que manejan conexiones interactivas.

&lt;?php
$timeTarget = 0.350; // 350 milisegundos

$cost = 11;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" =&gt; $cost]);
    $end = microtime(true);
} while (($end - $start) &lt; $timeTarget);

echo "Valor de 'cost' más apropiado: " . $cost - 1;
?&gt;

    Resultado del ejemplo anterior es similar a:

Valor de 'cost' más apropiado: 13

    **Ejemplo #4 Ejemplo con password_hash()** y Argon2i

&lt;?php
echo 'Argon2i hash: ' . password_hash('rasmuslerdorf', PASSWORD_ARGON2I);
?&gt;

    Resultado del ejemplo anterior es similar a:

Argon2i hash: $argon2i$v=19$m=1024,t=2,p=2$YzJBSzV4TUhkMzc3d3laeg$zqU/1IN0/AogfP4cmSJI1vc8lpXRW9/S0sYY2i2jHT0

### Notas

**Precaución**

    Se recomienda encarecidamente no proporcionar un salt explícito para esta función.
    Un salt seguro será generado automáticamente si no se especifica ningún salt.





    Como se mencionó anteriormente, el uso de la opción salt a partir de PHP 7.0.0
    generará una advertencia de deprecación. El soporte para un salt explícito fue eliminado
    a partir de PHP 8.0.0.

**Nota**:

    Se recomienda probar esta función en la máquina utilizada y ajustar el/los parámetro(s)
    de costo para que la ejecución de la función tome menos de 350 milisegundos para conexiones
    interactivas. El script del ejemplo anterior ayudará a elegir un costo bcrypt adecuado para la máquina dada.

**Nota**:

    La actualización de los algoritmos soportados por esta función (o el cambio al por omisión) debe seguir las siguientes reglas:







     -

       Cada nuevo algoritmo debe formar parte del núcleo de PHP durante al menos 1 versión completa
       antes de aspirar a convertirse en el algoritmo por omisión. También, si, por ejemplo, un nuevo
       algoritmo es añadido en la versión 7.5.5, no será elegible como algoritmo por omisión hasta
       PHP 7.7 (sabiendo que 7.6 será la primera versión completa). Pero si un algoritmo diferente ha sido
       añadido en 7.6.0, también será elegible como algoritmo por omisión
       a partir de la versión 7.7.0.



     -

       El algoritmo por omisión solo puede ser cambiado durante una versión completa (7.3.0, 8.0.0, etc...)
       y no durante una versión de revisión. La única excepción a este principio básico sería una
       emergencia, por ejemplo, al descubrir un bug crítico de seguridad
       en el algoritmo por omisión.



### Ver también

    - [password_verify()](#function.password-verify) - Verifica que una contraseña coincide con un hash

    - [password_needs_rehash()](#function.password-needs-rehash) - Verifica que el hash proporcionado cumple con el algoritmo y las opciones especificadas

    - [crypt()](#function.crypt) - Hash de un solo sentido (indescifrable)

    - [sodium_crypto_pwhash_str()](#function.sodium-crypto-pwhash-str) - Devuelve un hash codificado en ASCII

# password_needs_rehash

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

password_needs_rehash — Verifica que el hash proporcionado cumple con el algoritmo y las opciones especificadas

### Descripción

**password_needs_rehash**([string](#language.types.string) $hash, [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $algo, [array](#language.types.array) $options = []): [bool](#language.types.boolean)

Esta función verifica que el hash proporcionado corresponde al algoritmo
y a las opciones especificadas. Si no es así, el hash debería ser re-generado.

### Parámetros

    hash


      Un hash creado por la función [password_hash()](#function.password-hash).






    algo


      Una [constante del algoritmo

de contraseña](#password.constants) que representa el algoritmo a utilizar durante el hasheo de la contraseña.

    options


      Un array asociativo que contiene las opciones.

Ver también [las constantes del algoritmo de contraseña](#password.constants)
para la documentación sobre las opciones soportadas para cada algoritmo.

### Valores devueltos

Devuelve **[true](#constant.true)** si el hash debe ser re-generado para corresponder
a los parámetros algo y options
proporcionados, o **[false](#constant.false)** en caso contrario.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        El parámetro algo ahora espera una [string](#language.types.string), pero
        sigue aceptando un [int](#language.types.integer) para mantener la compatibilidad con versiones anteriores.





### Ejemplos

    **Ejemplo #1 Uso de password_needs_rehash()**

&lt;?php

$password = 'rasmuslerdorf';
$hash = '$2y$12$4Umg0rCJwMswRw/l.SwHvuQV01coP0eWmGzd61QH2RvAOMANUBGC.';

$algorithm = PASSWORD_BCRYPT;
// El parámetro cost de bcrypt puede evolucionar con el tiempo según las mejoras de hardware.
$options = ['cost' =&gt; 13];

// Primero se verifica que la contraseña coincide con el hash almacenado
if (password_verify($password, $hash)) {
    // Verifica si el algoritmo o las opciones han cambiado
    if (password_needs_rehash($hash, $algorithm, $options)) {
    if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
        // Se crea un nuevo hash para actualizar el anterior
        $newHash = password_hash($password, $algorithm, $options);

        // Actualizar la entrada del usuario con $newHash
    }

    // Ejecutar el inicio de sesión del usuario

}
?&gt;

# password_verify

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

password_verify — Verifica que una contraseña coincide con un hash

### Descripción

**password_verify**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password, [string](#language.types.string) $hash): [bool](#language.types.boolean)

Verifica que el hash proporcionado coincide con la contraseña proporcionada.
La función **password_verify()** es compatible con la función
[crypt()](#function.crypt). Por lo tanto, una contraseña hasheada por la función
[crypt()](#function.crypt) puede ser utilizada con la función
**password_verify()**.

Tenga en cuenta que la función [password_hash()](#function.password-hash) devuelve el algoritmo,
el "cost", y el salt como partes del hash devuelto. Sin embargo, toda la
información necesaria para verificar el hash está incluida. Esto permite
a la función verificar el hash sin necesidad de almacenamiento separado
para la información concerniente al algoritmo y al salt.

Esta función es segura contra ataques por tiempo.

### Parámetros

    password


      La contraseña del usuario.






    hash


      Un hash creado por la función [password_hash()](#function.password-hash).


### Valores devueltos

Devuelve **[true](#constant.true)** si la contraseña y el hash coinciden,
o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con password_verify()**



     Este es un ejemplo simplificado; se recomienda re-hashear una contraseña correcta
     si es necesario; ver la función [password_needs_rehash()](#function.password-needs-rehash) para un ejemplo.

&lt;?php
// Ver el ejemplo proporcionado en la página de la función password_hash()
// para saber de dónde proviene esto.
$hash = '$2y$12$4Umg0rCJwMswRw/l.SwHvuQV01coP0eWmGzd61QH2RvAOMANUBGC.';

if (password_verify('rasmuslerdorf', $hash)) {
echo 'La contraseña es válida !';
} else {
echo 'La contraseña es inválida.';
}
?&gt;

    El ejemplo anterior mostrará:

La contraseña es válida !

### Ver también

    - [password_needs_rehash()](#function.password-needs-rehash) - Verifica que el hash proporcionado cumple con el algoritmo y las opciones especificadas

    - [password_hash()](#function.password-hash) - Crea una clave de hash para una contraseña

    - [sodium_crypto_pwhash_str_verify()](#function.sodium-crypto-pwhash-str-verify) - Verifica que una contraseña corresponde a un hash

## Tabla de contenidos

- [password_algos](#function.password-algos) — Obtiene todos los identificadores de los algoritmos de hash de contraseñas disponibles
- [password_get_info](#function.password-get-info) — Devuelve información sobre el hash proporcionado
- [password_hash](#function.password-hash) — Crea una clave de hash para una contraseña
- [password_needs_rehash](#function.password-needs-rehash) — Verifica que el hash proporcionado cumple con el algoritmo y las opciones especificadas
- [password_verify](#function.password-verify) — Verifica que una contraseña coincide con un hash

- [Introducción](#intro.password)
- [Instalación/Configuración](#password.setup)<li>[Requerimientos](#password.requirements)
- [Instalación](#password.installation)
  </li>- [Constantes predefinidas](#password.constants)
- [Funciones de hashing de contraseñas](#ref.password)<li>[password_algos](#function.password-algos) — Obtiene todos los identificadores de los algoritmos de hash de contraseñas disponibles
- [password_get_info](#function.password-get-info) — Devuelve información sobre el hash proporcionado
- [password_hash](#function.password-hash) — Crea una clave de hash para una contraseña
- [password_needs_rehash](#function.password-needs-rehash) — Verifica que el hash proporcionado cumple con el algoritmo y las opciones especificadas
- [password_verify](#function.password-verify) — Verifica que una contraseña coincide con un hash
  </li>
