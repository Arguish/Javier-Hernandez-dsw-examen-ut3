# Envolturas TCP

# Introducción

Las envolturas de TCP proporciona un mecanismo clásico de Unix que ha sido
diseñado para comprobar si el cliente remoto es capaz de conectarse a la dirección IP
dada.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#tcpwrap.installation)

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/tcpwrap](https://pecl.php.net/package/tcpwrap).

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

# TCP Funciones

# tcpwrap_check

(PECL tcpwrap &gt;= 0.1.0)

tcpwrap_check — Verificación Tcpwrap

### Descripción

**tcpwrap_check**(
    [string](#language.types.string) $daemon,
    [string](#language.types.string) $address,
    [string](#language.types.string) $user = ?,
    [bool](#language.types.boolean) $nodns = **[false](#constant.false)**
): [bool](#language.types.boolean)

**tcpwrap_check()** consulta los ficheros /etc/hosts.allow
y /etc/hosts.deny para verificar si el acceso al servicio
daemon está permitido o no para un cliente.

### Parámetros

     daemon


       El nombre del servicio.






     address


       La dirección remota del cliente. Puede ser una dirección IP o un nombre de
       dominio.






     user


       Un nombre de usuario, opcional.






     nodns


       Si address se asemeja a un nombre de dominio,
       DNS es utilizado para resolverlo en una dirección IP; defina
       nodns a **[true](#constant.true)** para evitar este comportamiento.





### Valores devueltos

Esta función devuelve **[true](#constant.true)** si el acceso debe ser autorizado, **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Rechazar todas las conexiones desde localhost**

    Si su fichero /etc/hosts.deny contiene :

php: 127.0.0.1

    Y su código se asemeja a :

&lt;?php
if (!tcpwrap_check('php', $\_SERVER['REMOTE_ADDR'])) {
die('No es bienvenido aquí');
}
?&gt;

### Ver también

Para más detalles, consulte la página man de hosts_access(3).

## Tabla de contenidos

- [tcpwrap_check](#function.tcpwrap-check) — Verificación Tcpwrap

- [Introducción](#intro.tcpwrap)
- [Instalación/Configuración](#tcpwrap.setup)<li>[Instalación](#tcpwrap.installation)
  </li>- [TCP Funciones](#ref.tcpwrap)<li>[tcpwrap_check](#function.tcpwrap-check) — Verificación Tcpwrap
  </li>
