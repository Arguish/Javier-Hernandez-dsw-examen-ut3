# Estadísticas

# Introducción

**Advertencia**
Esta extensión es _no mantenida_.

Esta es la extensión estadística. Contiene algunas decenas de funciones
útiles para los cálculos estadísticos. Es una envoltura alrededor de 2 bibliotecas
científicas, a saber, DCDFLIB (Library of C routines for Cumulative
Distributions Functions, Inverses, and Other parameters) por B. Brown &amp;
J. Lavato y RANDLIB por Barry Brown, James Lavato &amp; Kathy Russell.
Incluye las funciones CD y PD.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#stats.requirements)
- [Instalación](#stats.installation)

    ## Requerimientos

    No se requiere ninguna biblioteca externa. La extensión se entrega con las bibliotecas utilizadas.

    ## Instalación

        Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.




        Esta extensión es considerada no mantenida y muerta.
            Sin embargo, el código fuente sigue disponible desde el

    SVN de
    PECL aquí:
    [» https://pecl.php.net/package/stats](https://pecl.php.net/package/stats).

        Los binarios Windows
            (los archivos DLL)
            para esta extensión PECL están disponibles en el sitio web PECL.

# Funciones de Statistic

# stats_absolute_deviation

(PECL stats &gt;= 1.0.0)

stats_absolute_deviation — Devuelve la desviación absoluta de un array de valores

### Descripción

**stats_absolute_deviation**([array](#language.types.array) $a): [float](#language.types.float)

Devuelve la desviación absoluta de los valores en a.

### Parámetros

     a


       El array de entrada





### Valores devueltos

Devuelve la desviación absoluta de los valores en a,
o **[false](#constant.false)** si a está vacío o no es un array.

# stats_cdf_beta

(PECL stats &gt;= 1.0.0)

stats_cdf_beta — Calcula un parámetro de la distribución beta en función de otros valores

### Descripción

**stats_cdf_beta**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución beta. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, alpha, y beta designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los parámetros de forma de la distribución beta, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       alpha
       beta



       2
       x
       CDF
       alpha
       beta



       3
       alpha
       x
       CDF
       beta



       4
       beta
       x
       CDF
       alpha




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, alpha, o beta, determinado por which.

# stats_cdf_binomial

(PECL stats &gt;= 1.0.0)

stats_cdf_binomial — Calcula un argumento de la distribución binomial en función de los otros valores

### Descripción

**stats_cdf_binomial**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los argumentos,
de la distribución binomial. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, n, y p designan la función de distribución acumulativa, el número de éxitos,
el número de intentos, y la tasa de éxito para cada intento, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       n
       p



       2
       x
       CDF
       n
       p



       3
       n
       x
       CDF
       p



       4
       p
       x
       CDF
       n




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, n, o p, determinado por which.

# stats_cdf_cauchy

(PECL stats &gt;= 1.0.0)

stats_cdf_cauchy — Calcula un parámetro de la distribución de Cauchy en función de otros valores

### Descripción

**stats_cdf_cauchy**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución de Cauchy. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, x0, y gamma designan la función de distribución acumulativa, el valor de la variable aleatoria,
el parámetro de localización y el parámetro de escala de la distribución de Cauchy, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       x0
       gamma



       2
       x
       CDF
       x0
       gamma



       3
       x0
       x
       CDF
       gamma



       4
       gamma
       x
       CDF
       x0




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, x0, o gamma, determinado por which.

# stats_cdf_chisquare

(PECL stats &gt;= 1.0.0)

stats_cdf_chisquare — Calcula un parámetro de la distribución del chi-cuadrado en función de los otros valores

### Descripción

**stats_cdf_chisquare**([float](#language.types.float) $par1, [float](#language.types.float) $par2, [int](#language.types.integer) $which): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución del chi-cuadrado. El tipo del valor de retorno y los parámetros (par1
y par2) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, y k designan la función de distribución acumulativa, el valor de la variable aleatoria,
y el grado de libertad de la distribución del chi-cuadrado, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2






       1
       CDF
       x
       k



       2
       x
       CDF
       k



       3
       k
       x
       CDF




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, o k, determinado por which.

# stats_cdf_exponential

(PECL stats &gt;= 1.0.0)

stats_cdf_exponential — Calcula un parámetro de la distribución exponencial en función de otros valores

### Descripción

**stats_cdf_exponential**([float](#language.types.float) $par1, [float](#language.types.float) $par2, [int](#language.types.integer) $which): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución exponencial. El tipo del valor de retorno y los parámetros (par1
y par2) son determinados por
which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, y lambda designan la función de distribución acumulativa, el valor de la variable aleatoria,
y el parámetro de tasa de la distribución exponencial, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2






       1
       CDF
       x
       lambda



       2
       x
       CDF
       lambda



       3
       lambda
       x
       CDF




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, o lambda, determinado por which.

# stats_cdf_f

(PECL stats &gt;= 1.0.0)

stats_cdf_f — Calcula un parámetro de la distribución F en función de otros valores

### Descripción

**stats_cdf_f**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución F. El tipo de la valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, d1, y d2 designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los grados de libertad de la distribución F, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       d1
       d2



       2
       x
       CDF
       d1
       d2



       3
       d1
       x
       CDF
       d2



       4
       d2
       x
       CDF
       d1




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, d1, o d2, determinado por which.

# stats_cdf_gamma

(PECL stats &gt;= 1.0.0)

stats_cdf_gamma — Calcula un parámetro de la distribución gamma en función de los otros valores

### Descripción

**stats_cdf_gamma**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución gamma. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, k, y theta designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los parámetros de forma y escala de la distribución gamma, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       k
       theta



       2
       x
       CDF
       k
       theta



       3
       k
       x
       CDF
       theta



       4
       theta
       x
       CDF
       k




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, k, o theta, determinado por which.

# stats_cdf_laplace

(PECL stats &gt;= 1.0.0)

stats_cdf_laplace — Calcula un parámetro de la distribución de Laplace en función de los otros valores

### Descripción

**stats_cdf_laplace**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución de Laplace. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, mu, y b designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los parámetros de localización y escala de la distribución de Laplace, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       mu
       b



       2
       x
       CDF
       mu
       b



       3
       mu
       x
       CDF
       b



       4
       b
       x
       CDF
       mu




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, mu, o b, determinado por which.

# stats_cdf_logistic

(PECL stats &gt;= 1.0.0)

stats_cdf_logistic — Calcula un parámetro de la distribución logística en función de otros valores

### Descripción

**stats_cdf_logistic**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución logística. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, mu, y s designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los parámetros de localización y escala de la distribución logística, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       mu
       s



       2
       x
       CDF
       mu
       s



       3
       mu
       x
       CDF
       s



       4
       s
       x
       CDF
       mu




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, mu, o s, determinado por which.

# stats_cdf_negative_binomial

(PECL stats &gt;= 1.0.0)

stats_cdf_negative_binomial — Calcula un parámetro de la distribución binomial negativa en función de los otros valores

### Descripción

**stats_cdf_negative_binomial**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución binomial negativa. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, r, y p designan la función de distribución acumulativa, el número de fallos, el número de éxitos,
y la tasa de éxito para cada intento, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       r
       p



       2
       x
       CDF
       r
       p



       3
       r
       x
       CDF
       p



       4
       p
       x
       CDF
       r




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, r, o p, determinado por which.

# stats_cdf_noncentral_chisquare

(PECL stats &gt;= 1.0.0)

stats_cdf_noncentral_chisquare — Calcula un argumento de la distribución del chi-cuadrado no central en función de otros valores

### Descripción

**stats_cdf_noncentral_chisquare**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución binomial. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, k, y lambda designan la función de distribución acumulativa, el valor de la variable aleatoria,
el grado de libertad y el argumento de no centralidad de la distribución del chi-cuadrado no central, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       k
       lambda



       2
       x
       CDF
       k
       lambda



       3
       k
       x
       CDF
       lambda



       4
       lambda
       x
       CDF
       k




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, k, o lambda, determinado por which.

# stats_cdf_noncentral_f

(PECL stats &gt;= 1.0.0)

stats_cdf_noncentral_f — Calcula un parámetro de la distribución F no central en función de los otros valores

### Descripción

**stats_cdf_noncentral_f**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [float](#language.types.float) $par4,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución F no central. El tipo de la valor de retorno y los parámetros (par1,
par2, par3, y par4) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, nu1, nu2, y lambda designan la función de distribución acumulativa, el valor de la variable aleatoria,
los grados de libertad y el parámetro de no centralidad de la distribución F no central, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3
       par4






       1
       CDF
       x
       nu1
       nu2
       lambda



       2
       x
       CDF
       nu1
       nu2
       lambda



       3
       nu1
       x
       CDF
       nu2
       lambda



       4
       nu2
       x
       CDF
       nu1
       lambda



       5
       lambda
       x
       CDF
       nu1
       nu2




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     par4


       El cuarto parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, nu1, nu2, o lambda, determinado por which.

# stats_cdf_noncentral_t

(PECL stats &gt;= 1.0.0)

stats_cdf_noncentral_t — Calcula un parámetro de la distribución t no central en función de los otros valores

### Descripción

**stats_cdf_noncentral_t**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución t no central. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, nu, y mu designan la función de distribución acumulativa, el valor de la variable aleatoria,
los grados de libertad y el parámetro de no centralidad de la distribución, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       nu
       mu



       2
       x
       CDF
       nu
       mu



       3
       nu
       x
       CDF
       mu



       4
       mu
       x
       CDF
       nu




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, nu, o mu, determinado por which.

# stats_cdf_normal

(PECL stats &gt;= 1.0.0)

stats_cdf_normal — Calcule un parámetro de la distribución normal en función de los otros valores

### Descripción

**stats_cdf_normal**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución normal. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, mu, y sigma designan la función de distribución acumulativa, el valor de la variable aleatoria,
la media y la desviación estándar de la distribución normal, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       mu
       sigma



       2
       x
       CDF
       mu
       sigma



       3
       mu
       x
       CDF
       sigma



       4
       sigma
       x
       CDF
       mu




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, mu, o sigma, determinado por which.

# stats_cdf_poisson

(PECL stats &gt;= 1.0.0)

stats_cdf_poisson — Calcula un parámetro de la distribución de Poisson en función de los otros valores

### Descripción

**stats_cdf_poisson**([float](#language.types.float) $par1, [float](#language.types.float) $par2, [int](#language.types.integer) $which): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros, de la distribución de Poisson.
El tipo del valor de retorno y los parámetros (par1 y par2) son
determinados por which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, y lambda designan la función de distribución acumulativa, el valor de la variable aleatoria,
y el parámetro de la distribución de Poisson, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2






       1
       CDF
       x
       lambda



       2
       x
       CDF
       lambda



       3
       lambda
       x
       CDF




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, o lambda, determinado por which.

# stats_cdf_t

(PECL stats &gt;= 1.0.0)

stats_cdf_t — Calcula un parámetro de la distribución t en función de los otros valores

### Descripción

**stats_cdf_t**([float](#language.types.float) $par1, [float](#language.types.float) $par2, [int](#language.types.integer) $which): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución t. El tipo del valor de retorno y los parámetros (par1
y par2) son determinados por which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, y nu designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los grados de libertad de la distribución t, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2






       1
       CDF
       x
       nu



       2
       x
       CDF
       nu



       3
       nu
       x
       CDF




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, o nu, determinado por which.

# stats_cdf_uniform

(PECL stats &gt;= 1.0.0)

stats_cdf_uniform — Calcula un parámetro de la distribución uniforme en función de otros valores

### Descripción

**stats_cdf_uniform**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución uniforme. El tipo del valor de retorno y los parámetros (par1,
par2, y par3) son determinados por
which.

La tabla siguiente lista el valor de retorno y los parámetros por which.
CDF, x, a, y b designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los límites inferior y superior de la distribución uniforme, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       a
       b



       2
       x
       CDF
       a
       b



       3
       a
       x
       CDF
       b



       4
       b
       x
       CDF
       a




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, a, o b, determinado por which.

# stats_cdf_weibull

(PECL stats &gt;= 1.0.0)

stats_cdf_weibull — Calcula un parámetro de la distribución de Weibull en función de otros valores

### Descripción

**stats_cdf_weibull**(
    [float](#language.types.float) $par1,
    [float](#language.types.float) $par2,
    [float](#language.types.float) $par3,
    [int](#language.types.integer) $which
): [float](#language.types.float)

Devuelve la función de distribución acumulativa, su inversa, o uno de los parámetros,
de la distribución de Weibull. El tipo de la valor de retorno y los parámetros
(par1, par2, y par3)
son determinados por which.

La siguiente tabla lista el valor de retorno y los parámetros por which.
CDF, x, k, y lambda designan la función de distribución acumulativa, el valor de la variable aleatoria,
y los parámetros de forma y escala de la distribución de Weibull, respectivamente.

    <caption>**Valor de retorno y parámetros**</caption>



       which
       Valor de retorno
       par1
       par2
       par3






       1
       CDF
       x
       k
       lambda



       2
       x
       CDF
       k
       lambda



       3
       k
       x
       CDF
       lambda



       4
       lambda
       x
       CDF
       k




### Parámetros

     par1


       El primer parámetro






     par2


       El segundo parámetro






     par3


       El tercer parámetro






     which


       El flag para determinar qué debe ser calculado





### Valores devueltos

Devuelve CDF, x, k, o lambda, determinado por which.

# stats_covariance

(PECL stats &gt;= 1.0.0)

stats_covariance — Calcula la covarianza de dos conjuntos de datos

### Descripción

**stats_covariance**([array](#language.types.array) $a, [array](#language.types.array) $b): [float](#language.types.float)

Devuelve la covarianza de a y b.

### Parámetros

     a


       El primer array






     b


       El segundo array





### Valores devueltos

Devuelve la covarianza de a y b,
o **[false](#constant.false)** en caso de fallo.

# stats_dens_beta

(PECL stats &gt;= 1.0.0)

stats_dens_beta — La función de densidad de probabilidad de la distribución beta

### Descripción

**stats_dens_beta**([float](#language.types.float) $x, [float](#language.types.float) $a, [float](#language.types.float) $b): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución beta cuyos parámetros de forma
son a y b.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     a


       El parámetro de forma de la distribución






     b


       El parámetro de forma de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_cauchy

(PECL stats &gt;= 1.0.0)

stats_dens_cauchy — La función de densidad de probabilidad de la distribución de Cauchy

### Descripción

**stats_dens_cauchy**([float](#language.types.float) $x, [float](#language.types.float) $ave, [float](#language.types.float) $stdev): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución de Cauchy cuyos parámetros de
ubicación y escala son ave y stdev.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     ave


       El parámetro de ubicación de la distribución






     stdev


       El parámetro de escala de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_chisquare

(PECL stats &gt;= 1.0.0)

stats_dens_chisquare — La función de densidad de probabilidad de la distribución chi-cuadrado

### Descripción

**stats_dens_chisquare**([float](#language.types.float) $x, [float](#language.types.float) $dfr): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución chi-cuadrado con grados de
libertad dfr.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     dfr


       Los grados de libertad de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_exponential

(PECL stats &gt;= 1.0.0)

stats_dens_exponential — La función de densidad de probabilidad de la distribución exponencial

### Descripción

**stats_dens_exponential**([float](#language.types.float) $x, [float](#language.types.float) $scale): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución exponencial cuya escala es
scale.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     scale


       La escala de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_f

(PECL stats &gt;= 1.0.0)

stats_dens_f — La función de densidad de probabilidad de la distribución F

### Descripción

**stats_dens_f**([float](#language.types.float) $x, [float](#language.types.float) $dfr1, [float](#language.types.float) $dfr2): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución F cuyos grados de libertad son
dfr1 y dfr2.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     dfr1


       El grado de libertad de la distribución






     dfr2


       El grado de libertad de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_gamma

(PECL stats &gt;= 1.0.0)

stats_dens_gamma — La función de densidad de probabilidad de la distribución gamma

### Descripción

**stats_dens_gamma**([float](#language.types.float) $x, [float](#language.types.float) $shape, [float](#language.types.float) $scale): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución gamma cuyo parámetro de forma
es shape y el parámetro de escala es scale.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     shape


       El parámetro de forma de la distribución






     scale


       El parámetro de escala de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_laplace

(PECL stats &gt;= 1.0.0)

stats_dens_laplace — La función de densidad de probabilidad de la distribución de Laplace

### Descripción

**stats_dens_laplace**([float](#language.types.float) $x, [float](#language.types.float) $ave, [float](#language.types.float) $stdev): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución de Laplace cuyo parámetro de
localización es ave y el parámetro de escala es
stdev.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     ave


       El parámetro de localización de la distribución






     stdev


       El parámetro de escala de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de fallo.

# stats_dens_logistic

(PECL stats &gt;= 1.0.0)

stats_dens_logistic — La función de densidad de probabilidad de la distribución logística

### Descripción

**stats_dens_logistic**([float](#language.types.float) $x, [float](#language.types.float) $ave, [float](#language.types.float) $stdev): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución logística cuyo parámetro de
localización es ave y el parámetro de escala es
stdev.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     ave


       El parámetro de localización de la distribución






     stdev


       El parámetro de escala de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_normal

(PECL stats &gt;= 1.0.0)

stats_dens_normal — La función de densidad de probabilidad de la distribución normal

### Descripción

**stats_dens_normal**([float](#language.types.float) $x, [float](#language.types.float) $ave, [float](#language.types.float) $stdev): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde
la variable aleatoria sigue la distribución normal con media
ave y desviación estándar
stdev.

### Parámetros

     x


       El valor en el que se calcula la densidad de probabilidad






     ave


       La media de la distribución






     stdev


       La desviación estándar de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_pmf_binomial

(PECL stats &gt;= 1.0.0)

stats_dens_pmf_binomial — La función de masa de probabilidad de la distribución binomial

### Descripción

**stats_dens_pmf_binomial**([float](#language.types.float) $x, [float](#language.types.float) $n, [float](#language.types.float) $pi): [float](#language.types.float)

Devuelve la masa de probabilidad en x, donde la variable aleatoria
sigue la distribución binomial cuyo número de ensayos es n
y la tasa de éxito es pi.

### Parámetros

     x


       El valor en el cual se calcula la masa de probabilidad






     n


       El número de ensayos de la distribución






     pi


       La tasa de éxito de la distribución





### Valores devueltos

La masa de probabilidad en x o **[false](#constant.false)** en caso de fallo.

# stats_dens_pmf_hypergeometric

(PECL stats &gt;= 1.0.0)

stats_dens_pmf_hypergeometric — La función de masa de probabilidad de la distribución hipergeométrica

### Descripción

**stats_dens_pmf_hypergeometric**(
    [float](#language.types.float) $n1,
    [float](#language.types.float) $n2,
    [float](#language.types.float) $N1,
    [float](#language.types.float) $N2
): [float](#language.types.float)

Devuelve la masa de probabilidad en n1, donde la variable aleatoria
sigue la distribución hipergeométrica cuyo número de fallos es
n2, el número de muestras de éxito es N1,
y el número de muestras de fallos es N2.

### Parámetros

     n1


       El número de éxitos, a partir del cual se calcula la masa de probabilidad






     n2


       El número de fallos de la distribución






     N1


       El número de muestras de éxito de la distribución






     N2


       El número de muestras de fallos de la distribución





### Valores devueltos

La masa de probabilidad en n1 o **[false](#constant.false)** en caso de error.

# stats_dens_pmf_negative_binomial

(PECL stats &gt;= 1.0.0)

stats_dens_pmf_negative_binomial — La función de masa de probabilidad de la distribución binomial negativa

### Descripción

**stats_dens_pmf_negative_binomial**([float](#language.types.float) $x, [float](#language.types.float) $n, [float](#language.types.float) $pi): [float](#language.types.float)

Devuelve la masa de probabilidad en x, donde
la variable aleatoria sigue la distribución binomial negativa cuyo
número de éxitos es n y la tasa de éxito es
pi.

### Parámetros

     x


       El valor en el cual se calcula la masa de probabilidad






     n


       El número de éxitos de la distribución






     pi


       La tasa de éxito de la distribución





### Valores devueltos

La masa de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_pmf_poisson

(PECL stats &gt;= 1.0.0)

stats_dens_pmf_poisson — La función de masa de probabilidad de la distribución de Poisson

### Descripción

**stats_dens_pmf_poisson**([float](#language.types.float) $x, [float](#language.types.float) $lb): [float](#language.types.float)

Devuelve la masa de probabilidad en x, donde la variable aleatoria
sigue la distribución de Poisson cuyo parámetro es lb.

### Parámetros

     x


       El valor en el cual se calcula la masa de probabilidad






     lb


       El parámetro de la distribución de Poisson





### Valores devueltos

La masa de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_t

(PECL stats &gt;= 1.0.0)

stats_dens_t — La función de densidad de probabilidad de la distribución t

### Descripción

**stats_dens_t**([float](#language.types.float) $x, [float](#language.types.float) $dfr): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde la variable
aleatoria sigue la distribución t cuyo grado de libertad es dfr.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     dfr


       El grado de libertad de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_uniform

(PECL stats &gt;= 1.0.0)

stats_dens_uniform — La función de densidad de probabilidad de la distribución uniforme

### Descripción

**stats_dens_uniform**([float](#language.types.float) $x, [float](#language.types.float) $a, [float](#language.types.float) $b): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde la variable
aleatoria sigue la distribución uniforme cuyo límite inferior es
a y el límite superior es b.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     a


       El límite inferior de la distribución






     b


       El límite superior de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_dens_weibull

(PECL stats &gt;= 1.0.0)

stats_dens_weibull — La función de densidad de probabilidad de la distribución de Weibull

### Descripción

**stats_dens_weibull**([float](#language.types.float) $x, [float](#language.types.float) $a, [float](#language.types.float) $b): [float](#language.types.float)

Devuelve la densidad de probabilidad en x, donde la variable
aleatoria sigue la distribución de Weibull cuyo parámetro de forma es
a y el parámetro de escala es b.

### Parámetros

     x


       El valor en el cual se calcula la densidad de probabilidad






     a


       El parámetro de forma de la distribución






     b


       El parámetro de escala de la distribución





### Valores devueltos

La densidad de probabilidad en x o **[false](#constant.false)** en caso de error.

# stats_harmonic_mean

(PECL stats &gt;= 1.0.0)

stats_harmonic_mean — Devuelve la media armónica de un array de valores

### Descripción

**stats_harmonic_mean**([array](#language.types.array) $a): number

Devuelve la media armónica de los valores de a.

### Parámetros

     a


       El array de entrada





### Valores devueltos

Devuelve la media armónica de los valores de a,
o **[false](#constant.false)** si a está vacío o no es un array.

# stats_kurtosis

(PECL stats &gt;= 1.0.0)

stats_kurtosis — Calcula el kurtosis de los datos en el array

### Descripción

**stats_kurtosis**([array](#language.types.array) $a): [float](#language.types.float)

Devuelve el kurtosis de los valores en a.

### Parámetros

     a


       El array de entrada





### Valores devueltos

Devuelve el kurtosis de los valores en a,
o **[false](#constant.false)** si a está vacío o no es un array.

# stats_rand_gen_beta

(PECL stats &gt;= 1.0.0)

stats_rand_gen_beta — Genera una desviación aleatoria de la distribución beta

### Descripción

**stats_rand_gen_beta**([float](#language.types.float) $a, [float](#language.types.float) $b): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución beta con los parámetros A y
B. La densidad de la beta es x^(a-1) \* (1-x)^(b-1) / B(a, b) para 0 &lt; x
&lt;. Método R. C. H. Cheng.

### Parámetros

     a


       El parámetro de forma de la distribución beta






     b


       El parámetro de forma de la distribución beta





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_chisquare

(PECL stats &gt;= 1.0.0)

stats_rand_gen_chisquare — Genera una desviación aleatoria de la distribución chi-cuadrado

### Descripción

**stats_rand_gen_chisquare**([float](#language.types.float) $df): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución chi-cuadrado donde los grados de
libertad son df.

### Parámetros

     df


       Los grados de libertad





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_exponential

(PECL stats &gt;= 1.0.0)

stats_rand_gen_exponential — Genera una desviación aleatoria de la distribución exponencial

### Descripción

**stats_rand_gen_exponential**([float](#language.types.float) $av): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución exponencial cuya escala es
av.

### Parámetros

     av


       El parámetro de escala





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_f

(PECL stats &gt;= 1.0.0)

stats_rand_gen_f — Genera una desviación aleatoria de la distribución F

### Descripción

**stats_rand_gen_f**([float](#language.types.float) $dfn, [float](#language.types.float) $dfd): [float](#language.types.float)

Genera una desviación aleatoria de la distribución F (ratio de varianza) con
"dfn" grados de libertad en el numerador y "dfd" grados de libertad en
el denominador. Método: genera directamente el ratio de variables chi-cuadrado.

### Parámetros

     dfn


       El grado de libertad en el numerador






     dfd


       El grado de libertad en el denominador





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_funiform

(PECL stats &gt;= 1.0.0)

stats_rand_gen_funiform — Genera un flotante uniforme entre low (exclusivo) y high (exclusivo)

### Descripción

**stats_rand_gen_funiform**([float](#language.types.float) $low, [float](#language.types.float) $high): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución uniforme entre
low y high.

### Parámetros

     low


       El umbral inferior (exclusivo)






     high


       El umbral superior (exclusivo)





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_gamma

(PECL stats &gt;= 1.0.0)

stats_rand_gen_gamma — Genera una desviación aleatoria de la distribución gamma

### Descripción

**stats_rand_gen_gamma**([float](#language.types.float) $a, [float](#language.types.float) $r): [float](#language.types.float)

Genera una desviación aleatoria de la distribución gamma cuya densidad es
(A**R)/Gamma(R) \* X**(R-1) * Exp(-A*X).

### Parámetros

     a


       El parámetro de localización de la distribución gamma (a
       &gt; 0).






     r


       El parámetro de forma de la distribución gamma (r &gt;
       0).





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_ibinomial

(PECL stats &gt;= 1.0.0)

stats_rand_gen_ibinomial — Genera una desviación aleatoria de la distribución binomial

### Descripción

**stats_rand_gen_ibinomial**([int](#language.types.integer) $n, [float](#language.types.float) $pp): [int](#language.types.integer)

Devuelve una desviación aleatoria de la distribución binomial donde el número de ensayos es n
y la probabilidad de evento en cada ensayo es pp.

### Parámetros

     n


       El número de ensayos






     pp


       La probabilidad de un evento en cada ensayo





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_ibinomial_negative

(PECL stats &gt;= 1.0.0)

stats_rand_gen_ibinomial_negative — Genera una desviación aleatoria de la distribución binomial negativa

### Descripción

**stats_rand_gen_ibinomial_negative**([int](#language.types.integer) $n, [float](#language.types.float) $p): [int](#language.types.integer)

Devuelve una desviación aleatoria de la distribución binomial negativa donde el número de éxitos es
n y la tasa de éxito es p.

### Parámetros

     n


       El número de éxitos.






     p


       La tasa de éxito.





### Valores devueltos

Una desviación aleatoria, que es el número de fracasos.

# stats_rand_gen_int

(PECL stats &gt;= 1.0.0)

stats_rand_gen_int — Genera un integer aleatorio entre 1 y 2147483562

### Descripción

**stats_rand_gen_int**(): [int](#language.types.integer)

Devuelve un integer aleatorio entre 1 y 2147483562

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un integer aleatorio

# stats_rand_gen_ipoisson

(PECL stats &gt;= 1.0.0)

stats_rand_gen_ipoisson — Genera una sola desviación aleatoria de la distribución de Poisson

### Descripción

**stats_rand_gen_ipoisson**([float](#language.types.float) $mu): [int](#language.types.integer)

Devuelve una desviación aleatoria de la distribución de Poisson con el argumento mu.

### Parámetros

     mu


       El argumento de la distribución de Poisson





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_iuniform

(PECL stats &gt;= 1.0.0)

stats_rand_gen_iuniform — Devuelve un integer aleatorio uniformemente distribuido entre LOW (incluido) y HIGH (incluido)

### Descripción

**stats_rand_gen_iuniform**([int](#language.types.integer) $low, [int](#language.types.integer) $high): [int](#language.types.integer)

Devuelve un integer aleatorio uniformemente distribuido entre low (incluido) y
high (incluido).

### Parámetros

     low


       El umbral inferior






     high


       El umbral superior





### Valores devueltos

Un integer aleatorio

# stats_rand_gen_noncentral_chisquare

(PECL stats &gt;= 1.0.0)

stats_rand_gen_noncentral_chisquare — Genera una desviación aleatoria de la distribución chi-cuadrado no central

### Descripción

**stats_rand_gen_noncentral_chisquare**([float](#language.types.float) $df, [float](#language.types.float) $xnonc): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución chi-cuadrado no central con los grados de libertad,
df, y el parámetro de no centralidad, xnonc.

### Parámetros

     df


       Los grados de libertad






     xnonc


       El parámetro de no centralidad





### Valores devueltos

Un valor aleatorio

# stats_rand_gen_noncentral_f

(PECL stats &gt;= 1.0.0)

stats_rand_gen_noncentral_f — Genera una desviación aleatoria de la distribución F no central

### Descripción

**stats_rand_gen_noncentral_f**([float](#language.types.float) $dfn, [float](#language.types.float) $dfd, [float](#language.types.float) $xnonc): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución F no central con los grados de libertad,
dfn (numerador) y dfd (denominador), y el parámetro de no centralidad,
xnonc.

### Parámetros

     dfn


       Los grados de libertad del numerador






     dfd


       Los grados de libertad del denominador






     xnonc


       El parámetro de no centralidad





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_noncentral_t

(PECL stats &gt;= 1.0.0)

stats_rand_gen_noncentral_t — Genera una única desviación aleatoria de la distribución t no central

### Descripción

**stats_rand_gen_noncentral_t**([float](#language.types.float) $df, [float](#language.types.float) $xnonc): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución t no central con los grados de libertad,
df, y el parámetro de no centralidad, xnonc.

### Parámetros

     df


       Los grados de libertad






     xnonc


       El parámetro de no centralidad





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_normal

(PECL stats &gt;= 1.0.0)

stats_rand_gen_normal — Genera una desviación aleatoria de la distribución normal

### Descripción

**stats_rand_gen_normal**([float](#language.types.float) $av, [float](#language.types.float) $sd): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución normal con la media, av, y la desviación estándar,
sd.

### Parámetros

     av


       La media de la distribución normal






     sd


       La desviación estándar de la distribución normal





### Valores devueltos

Una desviación aleatoria

# stats_rand_gen_t

(PECL stats &gt;= 1.0.0)

stats_rand_gen_t — Genera una sola desviación aleatoria de la distribución t

### Descripción

**stats_rand_gen_t**([float](#language.types.float) $df): [float](#language.types.float)

Devuelve una desviación aleatoria de la distribución t con los grados de libertad, df.

### Parámetros

     df


       Los grados de libertad





### Valores devueltos

Una desviación aleatoria

# stats_rand_get_seeds

(PECL stats &gt;= 1.0.0)

stats_rand_get_seeds — Devuelve los valores de la semilla del generador de números aleatorios

### Descripción

**stats_rand_get_seeds**(): [array](#language.types.array)

Devuelve las semillas actuales del generador de números aleatorios

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de dos enteros.

# stats_rand_phrase_to_seeds

(PECL stats &gt;= 1.0.0)

stats_rand_phrase_to_seeds — Genera dos semillas para el generador de números aleatorios RGN

### Descripción

**stats_rand_phrase_to_seeds**([string](#language.types.string) $phrase): [array](#language.types.array)

Genera dos semillas para el generador de números aleatorios a partir de una phrase.

### Parámetros

     phrase


       La frase de entrada





### Valores devueltos

Devuelve un array de dos enteros.

# stats_rand_ranf

(PECL stats &gt;= 1.0.0)

stats_rand_ranf — Genera un número flotante aleatorio entre 0 y 1

### Descripción

**stats_rand_ranf**(): [float](#language.types.float)

Devuelve un número flotante aleatorio de una distribución uniforme entre 0 (exclusivo) y 1 (exclusivo).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un número flotante aleatorio

# stats_rand_setall

(PECL stats &gt;= 1.0.0)

stats_rand_setall — Define los valores de la semilla para el generador aleatorio

### Descripción

**stats_rand_setall**([int](#language.types.integer) $iseed1, [int](#language.types.integer) $iseed2): [void](language.types.void.html)

Define iseed1 y iseed2 como valores de la semilla para el generador aleatorio
utilizado en las funciones estadísticas.

### Parámetros

     iseed1


       El valor utilizado como semilla aleatoria






     iseed2


       El valor utilizado como semilla aleatoria





### Valores devueltos

No se devuelve ningún valor.

# stats_skew

(PECL stats &gt;= 1.0.0)

stats_skew — Calcula la asimetría de los datos en una tabla

### Descripción

**stats_skew**([array](#language.types.array) $a): [float](#language.types.float)

Devuelve la asimetría de los valores en a.

### Parámetros

     a


       El array de entradas





### Valores devueltos

Devuelve la asimetría de los valores en a,
o **[false](#constant.false)** si a está vacío o no es un array.

# stats_standard_deviation

(PECL stats &gt;= 1.0.0)

stats_standard_deviation — Devuelve la desviación estándar

### Descripción

**stats_standard_deviation**([array](#language.types.array) $a, [bool](#language.types.boolean) $sample = **[false](#constant.false)**): [float](#language.types.float)

Devuelve la desviación estándar de los valores en a.

### Parámetros

     a


       El array de datos para el cual se calcula la desviación estándar. Es de notar que todos
       los valores del array serán convertidos en [float](#language.types.float).






     sample


       Indica si a representa una muestra de la
       población; por omisión es **[false](#constant.false)**.





### Valores devueltos

Devuelve la desviación estándar en caso de éxito; **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

Lanza una **[E_WARNING](#constant.e-warning)** cuando hay menos de 2
valores en a.

# stats_stat_binomial_coef

(PECL stats &gt;= 1.0.0)

stats_stat_binomial_coef — Devuelve un coeficiente binomial

### Descripción

**stats_stat_binomial_coef**([int](#language.types.integer) $x, [int](#language.types.integer) $n): [float](#language.types.float)

Devuelve el coeficiente binomial de n elegido x.

### Parámetros

     x


       El número de elecciones en el conjunto






     n


       El número de elementos en el conjunto





### Valores devueltos

Devuelve el coeficiente binomial

# stats_stat_correlation

(PECL stats &gt;= 1.0.0)

stats_stat_correlation — Devuelve el coeficiente de correlación de Pearson de dos conjuntos de datos

### Descripción

**stats_stat_correlation**([array](#language.types.array) $arr1, [array](#language.types.array) $arr2): [float](#language.types.float)

Devuelve el coeficiente de correlación de Pearson entre arr1 y arr2.

### Parámetros

     arr1


       El primer array






     arr2


       El segundo array





### Valores devueltos

Devuelve el coeficiente de correlación de Pearson entre arr1 y arr2,
o **[false](#constant.false)** en caso de fallo.

# stats_stat_factorial

(PECL stats &gt;= 1.0.0)

stats_stat_factorial — Devuelve el factorial de un entero

### Descripción

**stats_stat_factorial**([int](#language.types.integer) $n): [float](#language.types.float)

Devuelve el factorial de un entero, n.

### Parámetros

    n


      Un entero


### Valores devueltos

El factorial de n.

# stats_stat_independent_t

(PECL stats &gt;= 1.0.0)

stats_stat_independent_t — Devuelve el valor t de la prueba t para dos muestras independientes

### Descripción

**stats_stat_independent_t**([array](#language.types.array) $arr1, [array](#language.types.array) $arr2): [float](#language.types.float)

Devuelve el valor t de la prueba t para dos muestras independientes entre
arr1 y arr2.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     arr1


       El primer conjunto de valores






     arr2


       El segundo conjunto de valores





### Valores devueltos

Devuelve el valor t, o **[false](#constant.false)** en caso de fallo.

# stats_stat_innerproduct

(PECL stats &gt;= 1.0.0)

stats_stat_innerproduct — Devuelve el producto interno de dos vectores

### Descripción

**stats_stat_innerproduct**([array](#language.types.array) $arr1, [array](#language.types.array) $arr2): [float](#language.types.float)

Devuelve el producto interno de arr1 y arr2.

### Parámetros

     arr1


       El primer array






     arr2


       El segundo array





### Valores devueltos

Devuelve el producto interno de arr1 y arr2,
o **[false](#constant.false)** en caso de error.

# stats_stat_paired_t

(PECL stats &gt;= 1.0.0)

stats_stat_paired_t — Devuelve el valor t de la prueba t dependiente de dos muestras emparejadas

### Descripción

**stats_stat_paired_t**([array](#language.types.array) $arr1, [array](#language.types.array) $arr2): [float](#language.types.float)

Devuelve el valor t de la prueba t dependiente de dos muestras emparejadas para las muestras
arr1 y arr2.

### Parámetros

     arr1


       La primera muestra






     arr2


       La segunda muestra





### Valores devueltos

Devuelve el valor t, o **[false](#constant.false)** en caso de fallo.

# stats_stat_percentile

(PECL stats &gt;= 1.0.0)

stats_stat_percentile — Devuelve el valor del percentil

### Descripción

**stats_stat_percentile**([array](#language.types.array) $arr, [float](#language.types.float) $perc): [float](#language.types.float)

Devuelve el valor del perc-ésimo percentil del conjunto de datos arr.

### Parámetros

     arr


       El array de entrada






     perc


       El percentil





### Valores devueltos

Devuelve el percentil del conjunto de datos.

# stats_stat_powersum

(PECL stats &gt;= 1.0.0)

stats_stat_powersum — Devuelve la suma de las potencias de un vector

### Descripción

**stats_stat_powersum**([array](#language.types.array) $arr, [float](#language.types.float) $power): [float](#language.types.float)

Devuelve la suma de la power-ésima potencia de un vector representado como un array arr.

### Parámetros

     arr


       El array de entrada






     power


       La potencia





### Valores devueltos

Devuelve la suma de las potencias del conjunto de datos.

# stats_variance

(PECL stats &gt;= 1.0.0)

stats_variance — Devuelve la varianza

### Descripción

**stats_variance**([array](#language.types.array) $a, [bool](#language.types.boolean) $sample = **[false](#constant.false)**): [float](#language.types.float)

Devuelve la varianza de los valores en a.

### Parámetros

     a


       El array de datos para el cual se calcula la varianza. Se debe tener en cuenta que todos
       los valores del array serán convertidos en [float](#language.types.float).






     sample


       Indica si a representa una muestra de la
       población; por omisión es **[false](#constant.false)**.





### Valores devueltos

Devuelve la varianza en caso de éxito; **[false](#constant.false)** en caso de fallo.

## Tabla de contenidos

- [stats_absolute_deviation](#function.stats-absolute-deviation) — Devuelve la desviación absoluta de un array de valores
- [stats_cdf_beta](#function.stats-cdf-beta) — Calcula un parámetro de la distribución beta en función de otros valores
- [stats_cdf_binomial](#function.stats-cdf-binomial) — Calcula un argumento de la distribución binomial en función de los otros valores
- [stats_cdf_cauchy](#function.stats-cdf-cauchy) — Calcula un parámetro de la distribución de Cauchy en función de otros valores
- [stats_cdf_chisquare](#function.stats-cdf-chisquare) — Calcula un parámetro de la distribución del chi-cuadrado en función de los otros valores
- [stats_cdf_exponential](#function.stats-cdf-exponential) — Calcula un parámetro de la distribución exponencial en función de otros valores
- [stats_cdf_f](#function.stats-cdf-f) — Calcula un parámetro de la distribución F en función de otros valores
- [stats_cdf_gamma](#function.stats-cdf-gamma) — Calcula un parámetro de la distribución gamma en función de los otros valores
- [stats_cdf_laplace](#function.stats-cdf-laplace) — Calcula un parámetro de la distribución de Laplace en función de los otros valores
- [stats_cdf_logistic](#function.stats-cdf-logistic) — Calcula un parámetro de la distribución logística en función de otros valores
- [stats_cdf_negative_binomial](#function.stats-cdf-negative-binomial) — Calcula un parámetro de la distribución binomial negativa en función de los otros valores
- [stats_cdf_noncentral_chisquare](#function.stats-cdf-noncentral-chisquare) — Calcula un argumento de la distribución del chi-cuadrado no central en función de otros valores
- [stats_cdf_noncentral_f](#function.stats-cdf-noncentral-f) — Calcula un parámetro de la distribución F no central en función de los otros valores
- [stats_cdf_noncentral_t](#function.stats-cdf-noncentral-t) — Calcula un parámetro de la distribución t no central en función de los otros valores
- [stats_cdf_normal](#function.stats-cdf-normal) — Calcule un parámetro de la distribución normal en función de los otros valores
- [stats_cdf_poisson](#function.stats-cdf-poisson) — Calcula un parámetro de la distribución de Poisson en función de los otros valores
- [stats_cdf_t](#function.stats-cdf-t) — Calcula un parámetro de la distribución t en función de los otros valores
- [stats_cdf_uniform](#function.stats-cdf-uniform) — Calcula un parámetro de la distribución uniforme en función de otros valores
- [stats_cdf_weibull](#function.stats-cdf-weibull) — Calcula un parámetro de la distribución de Weibull en función de otros valores
- [stats_covariance](#function.stats-covariance) — Calcula la covarianza de dos conjuntos de datos
- [stats_dens_beta](#function.stats-dens-beta) — La función de densidad de probabilidad de la distribución beta
- [stats_dens_cauchy](#function.stats-dens-cauchy) — La función de densidad de probabilidad de la distribución de Cauchy
- [stats_dens_chisquare](#function.stats-dens-chisquare) — La función de densidad de probabilidad de la distribución chi-cuadrado
- [stats_dens_exponential](#function.stats-dens-exponential) — La función de densidad de probabilidad de la distribución exponencial
- [stats_dens_f](#function.stats-dens-f) — La función de densidad de probabilidad de la distribución F
- [stats_dens_gamma](#function.stats-dens-gamma) — La función de densidad de probabilidad de la distribución gamma
- [stats_dens_laplace](#function.stats-dens-laplace) — La función de densidad de probabilidad de la distribución de Laplace
- [stats_dens_logistic](#function.stats-dens-logistic) — La función de densidad de probabilidad de la distribución logística
- [stats_dens_normal](#function.stats-dens-normal) — La función de densidad de probabilidad de la distribución normal
- [stats_dens_pmf_binomial](#function.stats-dens-pmf-binomial) — La función de masa de probabilidad de la distribución binomial
- [stats_dens_pmf_hypergeometric](#function.stats-dens-pmf-hypergeometric) — La función de masa de probabilidad de la distribución hipergeométrica
- [stats_dens_pmf_negative_binomial](#function.stats-dens-pmf-negative-binomial) — La función de masa de probabilidad de la distribución binomial negativa
- [stats_dens_pmf_poisson](#function.stats-dens-pmf-poisson) — La función de masa de probabilidad de la distribución de Poisson
- [stats_dens_t](#function.stats-dens-t) — La función de densidad de probabilidad de la distribución t
- [stats_dens_uniform](#function.stats-dens-uniform) — La función de densidad de probabilidad de la distribución uniforme
- [stats_dens_weibull](#function.stats-dens-weibull) — La función de densidad de probabilidad de la distribución de Weibull
- [stats_harmonic_mean](#function.stats-harmonic-mean) — Devuelve la media armónica de un array de valores
- [stats_kurtosis](#function.stats-kurtosis) — Calcula el kurtosis de los datos en el array
- [stats_rand_gen_beta](#function.stats-rand-gen-beta) — Genera una desviación aleatoria de la distribución beta
- [stats_rand_gen_chisquare](#function.stats-rand-gen-chisquare) — Genera una desviación aleatoria de la distribución chi-cuadrado
- [stats_rand_gen_exponential](#function.stats-rand-gen-exponential) — Genera una desviación aleatoria de la distribución exponencial
- [stats_rand_gen_f](#function.stats-rand-gen-f) — Genera una desviación aleatoria de la distribución F
- [stats_rand_gen_funiform](#function.stats-rand-gen-funiform) — Genera un flotante uniforme entre low (exclusivo) y high (exclusivo)
- [stats_rand_gen_gamma](#function.stats-rand-gen-gamma) — Genera una desviación aleatoria de la distribución gamma
- [stats_rand_gen_ibinomial](#function.stats-rand-gen-ibinomial) — Genera una desviación aleatoria de la distribución binomial
- [stats_rand_gen_ibinomial_negative](#function.stats-rand-gen-ibinomial-negative) — Genera una desviación aleatoria de la distribución binomial negativa
- [stats_rand_gen_int](#function.stats-rand-gen-int) — Genera un integer aleatorio entre 1 y 2147483562
- [stats_rand_gen_ipoisson](#function.stats-rand-gen-ipoisson) — Genera una sola desviación aleatoria de la distribución de Poisson
- [stats_rand_gen_iuniform](#function.stats-rand-gen-iuniform) — Devuelve un integer aleatorio uniformemente distribuido entre LOW (incluido) y HIGH (incluido)
- [stats_rand_gen_noncentral_chisquare](#function.stats-rand-gen-noncentral-chisquare) — Genera una desviación aleatoria de la distribución chi-cuadrado no central
- [stats_rand_gen_noncentral_f](#function.stats-rand-gen-noncentral-f) — Genera una desviación aleatoria de la distribución F no central
- [stats_rand_gen_noncentral_t](#function.stats-rand-gen-noncentral-t) — Genera una única desviación aleatoria de la distribución t no central
- [stats_rand_gen_normal](#function.stats-rand-gen-normal) — Genera una desviación aleatoria de la distribución normal
- [stats_rand_gen_t](#function.stats-rand-gen-t) — Genera una sola desviación aleatoria de la distribución t
- [stats_rand_get_seeds](#function.stats-rand-get-seeds) — Devuelve los valores de la semilla del generador de números aleatorios
- [stats_rand_phrase_to_seeds](#function.stats-rand-phrase-to-seeds) — Genera dos semillas para el generador de números aleatorios RGN
- [stats_rand_ranf](#function.stats-rand-ranf) — Genera un número flotante aleatorio entre 0 y 1
- [stats_rand_setall](#function.stats-rand-setall) — Define los valores de la semilla para el generador aleatorio
- [stats_skew](#function.stats-skew) — Calcula la asimetría de los datos en una tabla
- [stats_standard_deviation](#function.stats-standard-deviation) — Devuelve la desviación estándar
- [stats_stat_binomial_coef](#function.stats-stat-binomial-coef) — Devuelve un coeficiente binomial
- [stats_stat_correlation](#function.stats-stat-correlation) — Devuelve el coeficiente de correlación de Pearson de dos conjuntos de datos
- [stats_stat_factorial](#function.stats-stat-factorial) — Devuelve el factorial de un entero
- [stats_stat_independent_t](#function.stats-stat-independent-t) — Devuelve el valor t de la prueba t para dos muestras independientes
- [stats_stat_innerproduct](#function.stats-stat-innerproduct) — Devuelve el producto interno de dos vectores
- [stats_stat_paired_t](#function.stats-stat-paired-t) — Devuelve el valor t de la prueba t dependiente de dos muestras emparejadas
- [stats_stat_percentile](#function.stats-stat-percentile) — Devuelve el valor del percentil
- [stats_stat_powersum](#function.stats-stat-powersum) — Devuelve la suma de las potencias de un vector
- [stats_variance](#function.stats-variance) — Devuelve la varianza

- [Introducción](#intro.stats)
- [Instalación/Configuración](#stats.setup)<li>[Requerimientos](#stats.requirements)
- [Instalación](#stats.installation)
  </li>- [Funciones de Statistic](#ref.stats)<li>[stats_absolute_deviation](#function.stats-absolute-deviation) — Devuelve la desviación absoluta de un array de valores
- [stats_cdf_beta](#function.stats-cdf-beta) — Calcula un parámetro de la distribución beta en función de otros valores
- [stats_cdf_binomial](#function.stats-cdf-binomial) — Calcula un argumento de la distribución binomial en función de los otros valores
- [stats_cdf_cauchy](#function.stats-cdf-cauchy) — Calcula un parámetro de la distribución de Cauchy en función de otros valores
- [stats_cdf_chisquare](#function.stats-cdf-chisquare) — Calcula un parámetro de la distribución del chi-cuadrado en función de los otros valores
- [stats_cdf_exponential](#function.stats-cdf-exponential) — Calcula un parámetro de la distribución exponencial en función de otros valores
- [stats_cdf_f](#function.stats-cdf-f) — Calcula un parámetro de la distribución F en función de otros valores
- [stats_cdf_gamma](#function.stats-cdf-gamma) — Calcula un parámetro de la distribución gamma en función de los otros valores
- [stats_cdf_laplace](#function.stats-cdf-laplace) — Calcula un parámetro de la distribución de Laplace en función de los otros valores
- [stats_cdf_logistic](#function.stats-cdf-logistic) — Calcula un parámetro de la distribución logística en función de otros valores
- [stats_cdf_negative_binomial](#function.stats-cdf-negative-binomial) — Calcula un parámetro de la distribución binomial negativa en función de los otros valores
- [stats_cdf_noncentral_chisquare](#function.stats-cdf-noncentral-chisquare) — Calcula un argumento de la distribución del chi-cuadrado no central en función de otros valores
- [stats_cdf_noncentral_f](#function.stats-cdf-noncentral-f) — Calcula un parámetro de la distribución F no central en función de los otros valores
- [stats_cdf_noncentral_t](#function.stats-cdf-noncentral-t) — Calcula un parámetro de la distribución t no central en función de los otros valores
- [stats_cdf_normal](#function.stats-cdf-normal) — Calcule un parámetro de la distribución normal en función de los otros valores
- [stats_cdf_poisson](#function.stats-cdf-poisson) — Calcula un parámetro de la distribución de Poisson en función de los otros valores
- [stats_cdf_t](#function.stats-cdf-t) — Calcula un parámetro de la distribución t en función de los otros valores
- [stats_cdf_uniform](#function.stats-cdf-uniform) — Calcula un parámetro de la distribución uniforme en función de otros valores
- [stats_cdf_weibull](#function.stats-cdf-weibull) — Calcula un parámetro de la distribución de Weibull en función de otros valores
- [stats_covariance](#function.stats-covariance) — Calcula la covarianza de dos conjuntos de datos
- [stats_dens_beta](#function.stats-dens-beta) — La función de densidad de probabilidad de la distribución beta
- [stats_dens_cauchy](#function.stats-dens-cauchy) — La función de densidad de probabilidad de la distribución de Cauchy
- [stats_dens_chisquare](#function.stats-dens-chisquare) — La función de densidad de probabilidad de la distribución chi-cuadrado
- [stats_dens_exponential](#function.stats-dens-exponential) — La función de densidad de probabilidad de la distribución exponencial
- [stats_dens_f](#function.stats-dens-f) — La función de densidad de probabilidad de la distribución F
- [stats_dens_gamma](#function.stats-dens-gamma) — La función de densidad de probabilidad de la distribución gamma
- [stats_dens_laplace](#function.stats-dens-laplace) — La función de densidad de probabilidad de la distribución de Laplace
- [stats_dens_logistic](#function.stats-dens-logistic) — La función de densidad de probabilidad de la distribución logística
- [stats_dens_normal](#function.stats-dens-normal) — La función de densidad de probabilidad de la distribución normal
- [stats_dens_pmf_binomial](#function.stats-dens-pmf-binomial) — La función de masa de probabilidad de la distribución binomial
- [stats_dens_pmf_hypergeometric](#function.stats-dens-pmf-hypergeometric) — La función de masa de probabilidad de la distribución hipergeométrica
- [stats_dens_pmf_negative_binomial](#function.stats-dens-pmf-negative-binomial) — La función de masa de probabilidad de la distribución binomial negativa
- [stats_dens_pmf_poisson](#function.stats-dens-pmf-poisson) — La función de masa de probabilidad de la distribución de Poisson
- [stats_dens_t](#function.stats-dens-t) — La función de densidad de probabilidad de la distribución t
- [stats_dens_uniform](#function.stats-dens-uniform) — La función de densidad de probabilidad de la distribución uniforme
- [stats_dens_weibull](#function.stats-dens-weibull) — La función de densidad de probabilidad de la distribución de Weibull
- [stats_harmonic_mean](#function.stats-harmonic-mean) — Devuelve la media armónica de un array de valores
- [stats_kurtosis](#function.stats-kurtosis) — Calcula el kurtosis de los datos en el array
- [stats_rand_gen_beta](#function.stats-rand-gen-beta) — Genera una desviación aleatoria de la distribución beta
- [stats_rand_gen_chisquare](#function.stats-rand-gen-chisquare) — Genera una desviación aleatoria de la distribución chi-cuadrado
- [stats_rand_gen_exponential](#function.stats-rand-gen-exponential) — Genera una desviación aleatoria de la distribución exponencial
- [stats_rand_gen_f](#function.stats-rand-gen-f) — Genera una desviación aleatoria de la distribución F
- [stats_rand_gen_funiform](#function.stats-rand-gen-funiform) — Genera un flotante uniforme entre low (exclusivo) y high (exclusivo)
- [stats_rand_gen_gamma](#function.stats-rand-gen-gamma) — Genera una desviación aleatoria de la distribución gamma
- [stats_rand_gen_ibinomial](#function.stats-rand-gen-ibinomial) — Genera una desviación aleatoria de la distribución binomial
- [stats_rand_gen_ibinomial_negative](#function.stats-rand-gen-ibinomial-negative) — Genera una desviación aleatoria de la distribución binomial negativa
- [stats_rand_gen_int](#function.stats-rand-gen-int) — Genera un integer aleatorio entre 1 y 2147483562
- [stats_rand_gen_ipoisson](#function.stats-rand-gen-ipoisson) — Genera una sola desviación aleatoria de la distribución de Poisson
- [stats_rand_gen_iuniform](#function.stats-rand-gen-iuniform) — Devuelve un integer aleatorio uniformemente distribuido entre LOW (incluido) y HIGH (incluido)
- [stats_rand_gen_noncentral_chisquare](#function.stats-rand-gen-noncentral-chisquare) — Genera una desviación aleatoria de la distribución chi-cuadrado no central
- [stats_rand_gen_noncentral_f](#function.stats-rand-gen-noncentral-f) — Genera una desviación aleatoria de la distribución F no central
- [stats_rand_gen_noncentral_t](#function.stats-rand-gen-noncentral-t) — Genera una única desviación aleatoria de la distribución t no central
- [stats_rand_gen_normal](#function.stats-rand-gen-normal) — Genera una desviación aleatoria de la distribución normal
- [stats_rand_gen_t](#function.stats-rand-gen-t) — Genera una sola desviación aleatoria de la distribución t
- [stats_rand_get_seeds](#function.stats-rand-get-seeds) — Devuelve los valores de la semilla del generador de números aleatorios
- [stats_rand_phrase_to_seeds](#function.stats-rand-phrase-to-seeds) — Genera dos semillas para el generador de números aleatorios RGN
- [stats_rand_ranf](#function.stats-rand-ranf) — Genera un número flotante aleatorio entre 0 y 1
- [stats_rand_setall](#function.stats-rand-setall) — Define los valores de la semilla para el generador aleatorio
- [stats_skew](#function.stats-skew) — Calcula la asimetría de los datos en una tabla
- [stats_standard_deviation](#function.stats-standard-deviation) — Devuelve la desviación estándar
- [stats_stat_binomial_coef](#function.stats-stat-binomial-coef) — Devuelve un coeficiente binomial
- [stats_stat_correlation](#function.stats-stat-correlation) — Devuelve el coeficiente de correlación de Pearson de dos conjuntos de datos
- [stats_stat_factorial](#function.stats-stat-factorial) — Devuelve el factorial de un entero
- [stats_stat_independent_t](#function.stats-stat-independent-t) — Devuelve el valor t de la prueba t para dos muestras independientes
- [stats_stat_innerproduct](#function.stats-stat-innerproduct) — Devuelve el producto interno de dos vectores
- [stats_stat_paired_t](#function.stats-stat-paired-t) — Devuelve el valor t de la prueba t dependiente de dos muestras emparejadas
- [stats_stat_percentile](#function.stats-stat-percentile) — Devuelve el valor del percentil
- [stats_stat_powersum](#function.stats-stat-powersum) — Devuelve la suma de las potencias de un vector
- [stats_variance](#function.stats-variance) — Devuelve la varianza
  </li>
