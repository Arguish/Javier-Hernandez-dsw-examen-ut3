# RpmInfo

# Introducción

Esta extensión permite recuperar información a partir de ficheros RPM
o de la base de datos de los RPM instalados.

Asimismo proporciona una envoltura de flujo rpm para recuperar el contenido de los RPM
(desde la versión 1.0.0 con librpm &gt;= 4.13).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#rpminfo.requirements)
- [Instalación mediante PECL](#rpminfo.installation)

    ## Requerimientos

    Esta extensión requiere la versión 4.11.3 o superior de [» librpm](https://rpm.org/).

    ## Instalación mediante PECL

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/rpminfo](https://pecl.php.net/package/rpminfo).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Constantes diversas**

    **[RPMVERSION](#constant.rpmversion)**
    ([string](#language.types.string))



     La versión de la biblioteca RPM.

**RPM Senses**

    **[RPMSENSE_ANY](#constant.rpmsense-any)**
    ([int](#language.types.integer))








    **[RPMSENSE_LESS](#constant.rpmsense-less)**
    ([int](#language.types.integer))








    **[RPMSENSE_GREATER](#constant.rpmsense-greater)**
    ([int](#language.types.integer))








    **[RPMSENSE_EQUAL](#constant.rpmsense-equal)**
    ([int](#language.types.integer))








    **[RPMSENSE_POSTTRANS](#constant.rpmsense-posttrans)**
    ([int](#language.types.integer))








    **[RPMSENSE_PREREQ](#constant.rpmsense-prereq)**
    ([int](#language.types.integer))








    **[RPMSENSE_PRETRANS](#constant.rpmsense-pretrans)**
    ([int](#language.types.integer))








    **[RPMSENSE_INTERP](#constant.rpmsense-interp)**
    ([int](#language.types.integer))








    **[RPMSENSE_SCRIPT_PRE](#constant.rpmsense-script-pre)**
    ([int](#language.types.integer))








    **[RPMSENSE_SCRIPT_POST](#constant.rpmsense-script-post)**
    ([int](#language.types.integer))








    **[RPMSENSE_SCRIPT_PREUN](#constant.rpmsense-script-preun)**
    ([int](#language.types.integer))








    **[RPMSENSE_SCRIPT_POSTUN](#constant.rpmsense-script-postun)**
    ([int](#language.types.integer))








    **[RPMSENSE_SCRIPT_VERIFY](#constant.rpmsense-script-verify)**
    ([int](#language.types.integer))








    **[RPMSENSE_FIND_REQUIRES](#constant.rpmsense-find-requires)**
    ([int](#language.types.integer))








    **[RPMSENSE_FIND_PROVIDES](#constant.rpmsense-find-provides)**
    ([int](#language.types.integer))








    **[RPMSENSE_TRIGGERIN](#constant.rpmsense-triggerin)**
    ([int](#language.types.integer))








    **[RPMSENSE_TRIGGERUN](#constant.rpmsense-triggerun)**
    ([int](#language.types.integer))








    **[RPMSENSE_TRIGGERPOSTUN](#constant.rpmsense-triggerpostun)**
    ([int](#language.types.integer))








    **[RPMSENSE_MISSINGOK](#constant.rpmsense-missingok)**
    ([int](#language.types.integer))








    **[RPMSENSE_RPMLIB](#constant.rpmsense-rpmlib)**
    ([int](#language.types.integer))








    **[RPMSENSE_TRIGGERPREIN](#constant.rpmsense-triggerprein)**
    ([int](#language.types.integer))








    **[RPMSENSE_KEYRING](#constant.rpmsense-keyring)**
    ([int](#language.types.integer))








    **[RPMSENSE_CONFIG](#constant.rpmsense-config)**
    ([int](#language.types.integer))

**RPM Mire**

    **[RPMMIRE_DEFAULT](#constant.rpmmire-default)**
    ([int](#language.types.integer))



     Modelo de búsqueda en una expresión regular con
     \., .*,
     y ^...$ añadidos.





    **[RPMMIRE_STRCMP](#constant.rpmmire-strcmp)**
    ([int](#language.types.integer))



     El modelo de búsqueda es una [string](#language.types.string),
     utilizando strcmp(3).





    **[RPMMIRE_REGEX](#constant.rpmmire-regex)**
    ([int](#language.types.integer))



     El modelo de búsqueda es una expresión regular,
     utilizando regcomp(3).





    **[RPMMIRE_GLOB](#constant.rpmmire-glob)**
    ([int](#language.types.integer))



     El modelo de búsqueda es una expresión global,
     utilizando fnmatch(3).

**RPM tags**

    **[RPMTAG_ARCH](#constant.rpmtag-arch)**
    ([int](#language.types.integer))








    **[RPMTAG_ARCHSUFFIX](#constant.rpmtag-archsuffix)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.18





    **[RPMTAG_ARCHIVESIZE](#constant.rpmtag-archivesize)**
    ([int](#language.types.integer))








    **[RPMTAG_BASENAMES](#constant.rpmtag-basenames)**
    ([int](#language.types.integer))



     El nombre (no la ruta) de los ficheros, con el índice de la base de datos.





    **[RPMTAG_BUGURL](#constant.rpmtag-bugurl)**
    ([int](#language.types.integer))








    **[RPMTAG_BUILDARCHS](#constant.rpmtag-buildarchs)**
    ([int](#language.types.integer))








    **[RPMTAG_BUILDHOST](#constant.rpmtag-buildhost)**
    ([int](#language.types.integer))








    **[RPMTAG_BUILDTIME](#constant.rpmtag-buildtime)**
    ([int](#language.types.integer))








    **[RPMTAG_C](#constant.rpmtag-c)**
    ([int](#language.types.integer))








    **[RPMTAG_CHANGELOGNAME](#constant.rpmtag-changelogname)**
    ([int](#language.types.integer))








    **[RPMTAG_CHANGELOGTEXT](#constant.rpmtag-changelogtext)**
    ([int](#language.types.integer))








    **[RPMTAG_CHANGELOGTIME](#constant.rpmtag-changelogtime)**
    ([int](#language.types.integer))








    **[RPMTAG_CLASSDICT](#constant.rpmtag-classdict)**
    ([int](#language.types.integer))








    **[RPMTAG_CONFLICTFLAGS](#constant.rpmtag-conflictflags)**
    ([int](#language.types.integer))








    **[RPMTAG_CONFLICTNAME](#constant.rpmtag-conflictname)**
    ([int](#language.types.integer))



     Dependencias conflictivas, con el índice de la base de datos.





    **[RPMTAG_CONFLICTNEVRS](#constant.rpmtag-conflictnevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_CONFLICTS](#constant.rpmtag-conflicts)**
    ([int](#language.types.integer))








    **[RPMTAG_CONFLICTVERSION](#constant.rpmtag-conflictversion)**
    ([int](#language.types.integer))








    **[RPMTAG_COOKIE](#constant.rpmtag-cookie)**
    ([int](#language.types.integer))








    **[RPMTAG_DBINSTANCE](#constant.rpmtag-dbinstance)**
    ([int](#language.types.integer))








    **[RPMTAG_DEPENDSDICT](#constant.rpmtag-dependsdict)**
    ([int](#language.types.integer))








    **[RPMTAG_DESCRIPTION](#constant.rpmtag-description)**
    ([int](#language.types.integer))








    **[RPMTAG_DIRINDEXES](#constant.rpmtag-dirindexes)**
    ([int](#language.types.integer))








    **[RPMTAG_DIRNAMES](#constant.rpmtag-dirnames)**
    ([int](#language.types.integer))



     El directorio de los ficheros, con el índice de la base de datos.





    **[RPMTAG_DISTRIBUTION](#constant.rpmtag-distribution)**
    ([int](#language.types.integer))








    **[RPMTAG_DISTTAG](#constant.rpmtag-disttag)**
    ([int](#language.types.integer))








    **[RPMTAG_DISTURL](#constant.rpmtag-disturl)**
    ([int](#language.types.integer))








    **[RPMTAG_DSAHEADER](#constant.rpmtag-dsaheader)**
    ([int](#language.types.integer))








    **[RPMTAG_E](#constant.rpmtag-e)**
    ([int](#language.types.integer))








    **[RPMTAG_ENCODING](#constant.rpmtag-encoding)**
    ([int](#language.types.integer))








    **[RPMTAG_ENHANCEFLAGS](#constant.rpmtag-enhanceflags)**
    ([int](#language.types.integer))








    **[RPMTAG_ENHANCENAME](#constant.rpmtag-enhancename)**
    ([int](#language.types.integer))



     Dependencia débil, con el índice de la base de datos, requiere librpm &gt;= 4.13.





    **[RPMTAG_ENHANCENEVRS](#constant.rpmtag-enhancenevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_ENHANCES](#constant.rpmtag-enhances)**
    ([int](#language.types.integer))








    **[RPMTAG_ENHANCEVERSION](#constant.rpmtag-enhanceversion)**
    ([int](#language.types.integer))








    **[RPMTAG_EPOCH](#constant.rpmtag-epoch)**
    ([int](#language.types.integer))








    **[RPMTAG_EPOCHNUM](#constant.rpmtag-epochnum)**
    ([int](#language.types.integer))








    **[RPMTAG_EVR](#constant.rpmtag-evr)**
    ([int](#language.types.integer))








    **[RPMTAG_EXCLUDEARCH](#constant.rpmtag-excludearch)**
    ([int](#language.types.integer))








    **[RPMTAG_EXCLUDEOS](#constant.rpmtag-excludeos)**
    ([int](#language.types.integer))








    **[RPMTAG_EXCLUSIVEARCH](#constant.rpmtag-exclusivearch)**
    ([int](#language.types.integer))








    **[RPMTAG_EXCLUSIVEOS](#constant.rpmtag-exclusiveos)**
    ([int](#language.types.integer))








    **[RPMTAG_FILECAPS](#constant.rpmtag-filecaps)**
    ([int](#language.types.integer))








    **[RPMTAG_FILECLASS](#constant.rpmtag-fileclass)**
    ([int](#language.types.integer))








    **[RPMTAG_FILECOLORS](#constant.rpmtag-filecolors)**
    ([int](#language.types.integer))








    **[RPMTAG_FILECONTEXTS](#constant.rpmtag-filecontexts)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEDEPENDSN](#constant.rpmtag-filedependsn)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEDEPENDSX](#constant.rpmtag-filedependsx)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEDEVICES](#constant.rpmtag-filedevices)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEDIGESTALGO](#constant.rpmtag-filedigestalgo)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEDIGESTS](#constant.rpmtag-filedigests)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEFLAGS](#constant.rpmtag-fileflags)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEGROUPNAME](#constant.rpmtag-filegroupname)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEINODES](#constant.rpmtag-fileinodes)**
    ([int](#language.types.integer))








    **[RPMTAG_FILELANGS](#constant.rpmtag-filelangs)**
    ([int](#language.types.integer))








    **[RPMTAG_FILELINKTOS](#constant.rpmtag-filelinktos)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEMD5S](#constant.rpmtag-filemd5s)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEMODES](#constant.rpmtag-filemodes)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEMTIMES](#constant.rpmtag-filemtimes)**
    ([int](#language.types.integer))








    **[RPMTAG_FILENAMES](#constant.rpmtag-filenames)**
    ([int](#language.types.integer))








    **[RPMTAG_FILENLINKS](#constant.rpmtag-filenlinks)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEPROVIDE](#constant.rpmtag-fileprovide)**
    ([int](#language.types.integer))








    **[RPMTAG_FILERDEVS](#constant.rpmtag-filerdevs)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEREQUIRE](#constant.rpmtag-filerequire)**
    ([int](#language.types.integer))








    **[RPMTAG_FILESIGNATURELENGTH](#constant.rpmtag-filesignaturelength)**
    ([int](#language.types.integer))








    **[RPMTAG_FILESIGNATURES](#constant.rpmtag-filesignatures)**
    ([int](#language.types.integer))








    **[RPMTAG_FILESIZES](#constant.rpmtag-filesizes)**
    ([int](#language.types.integer))








    **[RPMTAG_FILESTATES](#constant.rpmtag-filestates)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERCONDS](#constant.rpmtag-filetriggerconds)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERFLAGS](#constant.rpmtag-filetriggerflags)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERINDEX](#constant.rpmtag-filetriggerindex)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERNAME](#constant.rpmtag-filetriggername)**
    ([int](#language.types.integer))



     El nombre del fichero desencadenante, con el índice de la base de datos, requiere librpm &gt;= 4.13.





    **[RPMTAG_FILETRIGGERPRIORITIES](#constant.rpmtag-filetriggerpriorities)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERSCRIPTFLAGS](#constant.rpmtag-filetriggerscriptflags)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERSCRIPTPROG](#constant.rpmtag-filetriggerscriptprog)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERSCRIPTS](#constant.rpmtag-filetriggerscripts)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERTYPE](#constant.rpmtag-filetriggertype)**
    ([int](#language.types.integer))








    **[RPMTAG_FILETRIGGERVERSION](#constant.rpmtag-filetriggerversion)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEUSERNAME](#constant.rpmtag-fileusername)**
    ([int](#language.types.integer))








    **[RPMTAG_FILEVERIFYFLAGS](#constant.rpmtag-fileverifyflags)**
    ([int](#language.types.integer))








    **[RPMTAG_FSCONTEXTS](#constant.rpmtag-fscontexts)**
    ([int](#language.types.integer))








    **[RPMTAG_GIF](#constant.rpmtag-gif)**
    ([int](#language.types.integer))








    **[RPMTAG_GROUP](#constant.rpmtag-group)**
    ([int](#language.types.integer))



     El grupo de paquete, con el índice de la base de datos.





    **[RPMTAG_HDRID](#constant.rpmtag-hdrid)**
    ([int](#language.types.integer))



     Obsoleto, utilizar **[RPMTAG_SHA1HEADER](#constant.rpmtag-sha1header)** en su lugar. Eliminado en librpm 6.





    **[RPMTAG_HEADERCOLOR](#constant.rpmtag-headercolor)**
    ([int](#language.types.integer))








    **[RPMTAG_HEADERI18NTABLE](#constant.rpmtag-headeri18ntable)**
    ([int](#language.types.integer))








    **[RPMTAG_HEADERIMAGE](#constant.rpmtag-headerimage)**
    ([int](#language.types.integer))








    **[RPMTAG_HEADERIMMUTABLE](#constant.rpmtag-headerimmutable)**
    ([int](#language.types.integer))








    **[RPMTAG_HEADERREGIONS](#constant.rpmtag-headerregions)**
    ([int](#language.types.integer))








    **[RPMTAG_HEADERSIGNATURES](#constant.rpmtag-headersignatures)**
    ([int](#language.types.integer))








    **[RPMTAG_ICON](#constant.rpmtag-icon)**
    ([int](#language.types.integer))








    **[RPMTAG_INSTALLCOLOR](#constant.rpmtag-installcolor)**
    ([int](#language.types.integer))








    **[RPMTAG_INSTALLTID](#constant.rpmtag-installtid)**
    ([int](#language.types.integer))



     El identificador de transacción de instalación, con el índice de la base de datos.





    **[RPMTAG_INSTALLTIME](#constant.rpmtag-installtime)**
    ([int](#language.types.integer))








    **[RPMTAG_INSTFILENAMES](#constant.rpmtag-instfilenames)**
    ([int](#language.types.integer))



     La ruta de los ficheros, con el índice de la base de datos.





    **[RPMTAG_INSTPREFIXES](#constant.rpmtag-instprefixes)**
    ([int](#language.types.integer))








    **[RPMTAG_LICENSE](#constant.rpmtag-license)**
    ([int](#language.types.integer))








    **[RPMTAG_LONGARCHIVESIZE](#constant.rpmtag-longarchivesize)**
    ([int](#language.types.integer))








    **[RPMTAG_LONGFILESIZES](#constant.rpmtag-longfilesizes)**
    ([int](#language.types.integer))








    **[RPMTAG_LONGSIGSIZE](#constant.rpmtag-longsigsize)**
    ([int](#language.types.integer))








    **[RPMTAG_LONGSIZE](#constant.rpmtag-longsize)**
    ([int](#language.types.integer))








    **[RPMTAG_MODULARITYLABEL](#constant.rpmtag-modularitylabel)**
    ([int](#language.types.integer))








    **[RPMTAG_N](#constant.rpmtag-n)**
    ([int](#language.types.integer))








    **[RPMTAG_NAME](#constant.rpmtag-name)**
    ([int](#language.types.integer))



     El nombre del paquete, con el índice de la base de datos.





    **[RPMTAG_NEVR](#constant.rpmtag-nevr)**
    ([int](#language.types.integer))








    **[RPMTAG_NEVRA](#constant.rpmtag-nevra)**
    ([int](#language.types.integer))








    **[RPMTAG_NOPATCH](#constant.rpmtag-nopatch)**
    ([int](#language.types.integer))








    **[RPMTAG_NOSOURCE](#constant.rpmtag-nosource)**
    ([int](#language.types.integer))








    **[RPMTAG_NVR](#constant.rpmtag-nvr)**
    ([int](#language.types.integer))








    **[RPMTAG_NVRA](#constant.rpmtag-nvra)**
    ([int](#language.types.integer))








    **[RPMTAG_O](#constant.rpmtag-o)**
    ([int](#language.types.integer))








    **[RPMTAG_OBSOLETEFLAGS](#constant.rpmtag-obsoleteflags)**
    ([int](#language.types.integer))








    **[RPMTAG_OBSOLETENAME](#constant.rpmtag-obsoletename)**
    ([int](#language.types.integer))



     Paquete obsoleto, con el índice de la base de datos.





    **[RPMTAG_OBSOLETENEVRS](#constant.rpmtag-obsoletenevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_OBSOLETES](#constant.rpmtag-obsoletes)**
    ([int](#language.types.integer))








    **[RPMTAG_OBSOLETEVERSION](#constant.rpmtag-obsoleteversion)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDENHANCES](#constant.rpmtag-oldenhances)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDENHANCESFLAGS](#constant.rpmtag-oldenhancesflags)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDENHANCESNAME](#constant.rpmtag-oldenhancesname)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDENHANCESVERSION](#constant.rpmtag-oldenhancesversion)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDFILENAMES](#constant.rpmtag-oldfilenames)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDSUGGESTS](#constant.rpmtag-oldsuggests)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDSUGGESTSFLAGS](#constant.rpmtag-oldsuggestsflags)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDSUGGESTSNAME](#constant.rpmtag-oldsuggestsname)**
    ([int](#language.types.integer))








    **[RPMTAG_OLDSUGGESTSVERSION](#constant.rpmtag-oldsuggestsversion)**
    ([int](#language.types.integer))








    **[RPMTAG_OPTFLAGS](#constant.rpmtag-optflags)**
    ([int](#language.types.integer))








    **[RPMTAG_ORDERFLAGS](#constant.rpmtag-orderflags)**
    ([int](#language.types.integer))








    **[RPMTAG_ORDERNAME](#constant.rpmtag-ordername)**
    ([int](#language.types.integer))








    **[RPMTAG_ORDERVERSION](#constant.rpmtag-orderversion)**
    ([int](#language.types.integer))








    **[RPMTAG_ORIGBASENAMES](#constant.rpmtag-origbasenames)**
    ([int](#language.types.integer))








    **[RPMTAG_ORIGDIRINDEXES](#constant.rpmtag-origdirindexes)**
    ([int](#language.types.integer))








    **[RPMTAG_ORIGDIRNAMES](#constant.rpmtag-origdirnames)**
    ([int](#language.types.integer))








    **[RPMTAG_ORIGFILENAMES](#constant.rpmtag-origfilenames)**
    ([int](#language.types.integer))








    **[RPMTAG_OS](#constant.rpmtag-os)**
    ([int](#language.types.integer))








    **[RPMTAG_P](#constant.rpmtag-p)**
    ([int](#language.types.integer))








    **[RPMTAG_PACKAGER](#constant.rpmtag-packager)**
    ([int](#language.types.integer))








    **[RPMTAG_PATCH](#constant.rpmtag-patch)**
    ([int](#language.types.integer))








    **[RPMTAG_PATCHESFLAGS](#constant.rpmtag-patchesflags)**
    ([int](#language.types.integer))








    **[RPMTAG_PATCHESNAME](#constant.rpmtag-patchesname)**
    ([int](#language.types.integer))








    **[RPMTAG_PATCHESVERSION](#constant.rpmtag-patchesversion)**
    ([int](#language.types.integer))








    **[RPMTAG_PAYLOADCOMPRESSOR](#constant.rpmtag-payloadcompressor)**
    ([int](#language.types.integer))








    **[RPMTAG_PAYLOADDIGEST](#constant.rpmtag-payloaddigest)**
    ([int](#language.types.integer))








    **[RPMTAG_PAYLOADDIGESTALT](#constant.rpmtag-payloaddigestalt)**
    ([int](#language.types.integer))



     Con librpm &gt;= 4.16.





    **[RPMTAG_PAYLOADDIGESTALGO](#constant.rpmtag-payloaddigestalgo)**
    ([int](#language.types.integer))








    **[RPMTAG_PAYLOADFLAGS](#constant.rpmtag-payloadflags)**
    ([int](#language.types.integer))








    **[RPMTAG_PAYLOADFORMAT](#constant.rpmtag-payloadformat)**
    ([int](#language.types.integer))








    **[RPMTAG_PKGID](#constant.rpmtag-pkgid)**
    ([int](#language.types.integer))



     Obsoleto, utilizar **[RPMTAG_SIGMD5](#constant.rpmtag-sigmd5)** en su lugar. Eliminado en librpm 6.





    **[RPMTAG_PLATFORM](#constant.rpmtag-platform)**
    ([int](#language.types.integer))








    **[RPMTAG_POLICIES](#constant.rpmtag-policies)**
    ([int](#language.types.integer))








    **[RPMTAG_POLICYFLAGS](#constant.rpmtag-policyflags)**
    ([int](#language.types.integer))








    **[RPMTAG_POLICYNAMES](#constant.rpmtag-policynames)**
    ([int](#language.types.integer))








    **[RPMTAG_POLICYTYPES](#constant.rpmtag-policytypes)**
    ([int](#language.types.integer))








    **[RPMTAG_POLICYTYPESINDEXES](#constant.rpmtag-policytypesindexes)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTIN](#constant.rpmtag-postin)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTINFLAGS](#constant.rpmtag-postinflags)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTINPROG](#constant.rpmtag-postinprog)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTTRANS](#constant.rpmtag-posttrans)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTTRANSFLAGS](#constant.rpmtag-posttransflags)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTTRANSPROG](#constant.rpmtag-posttransprog)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTUN](#constant.rpmtag-postun)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTUNFLAGS](#constant.rpmtag-postunflags)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTUNPROG](#constant.rpmtag-postunprog)**
    ([int](#language.types.integer))








    **[RPMTAG_POSTUNTRANS](#constant.rpmtag-postuntrans)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_POSTUNTRANSFLAGS](#constant.rpmtag-postuntransflags)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_POSTUNTRANSPROG](#constant.rpmtag-postuntransprog)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_PREFIXES](#constant.rpmtag-prefixes)**
    ([int](#language.types.integer))








    **[RPMTAG_PREIN](#constant.rpmtag-prein)**
    ([int](#language.types.integer))








    **[RPMTAG_PREINFLAGS](#constant.rpmtag-preinflags)**
    ([int](#language.types.integer))








    **[RPMTAG_PREINPROG](#constant.rpmtag-preinprog)**
    ([int](#language.types.integer))








    **[RPMTAG_PRETRANS](#constant.rpmtag-pretrans)**
    ([int](#language.types.integer))








    **[RPMTAG_PRETRANSFLAGS](#constant.rpmtag-pretransflags)**
    ([int](#language.types.integer))








    **[RPMTAG_PRETRANSPROG](#constant.rpmtag-pretransprog)**
    ([int](#language.types.integer))








    **[RPMTAG_PREUN](#constant.rpmtag-preun)**
    ([int](#language.types.integer))








    **[RPMTAG_PREUNFLAGS](#constant.rpmtag-preunflags)**
    ([int](#language.types.integer))








    **[RPMTAG_PREUNPROG](#constant.rpmtag-preunprog)**
    ([int](#language.types.integer))








    **[RPMTAG_PREUNTRANS](#constant.rpmtag-preuntrans)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_PREUNTRANSFLAGS](#constant.rpmtag-preuntransflags)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_PREUNTRANSPROG](#constant.rpmtag-preuntransprog)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_PROVIDEFLAGS](#constant.rpmtag-provideflags)**
    ([int](#language.types.integer))








    **[RPMTAG_PROVIDENAME](#constant.rpmtag-providename)**
    ([int](#language.types.integer))



     Las dependencias proporcionadas, con el índice de la base de datos.





    **[RPMTAG_PROVIDENEVRS](#constant.rpmtag-providenevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_PROVIDES](#constant.rpmtag-provides)**
    ([int](#language.types.integer))








    **[RPMTAG_PROVIDEVERSION](#constant.rpmtag-provideversion)**
    ([int](#language.types.integer))








    **[RPMTAG_PUBKEYS](#constant.rpmtag-pubkeys)**
    ([int](#language.types.integer))








    **[RPMTAG_R](#constant.rpmtag-r)**
    ([int](#language.types.integer))








    **[RPMTAG_RECOMMENDFLAGS](#constant.rpmtag-recommendflags)**
    ([int](#language.types.integer))








    **[RPMTAG_RECOMMENDNAME](#constant.rpmtag-recommendname)**
    ([int](#language.types.integer))



     Las dependencias débiles recomendadas, con el índice de la base de datos, requiere librpm &gt;= 4.13.





    **[RPMTAG_RECOMMENDNEVRS](#constant.rpmtag-recommendnevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_RECOMMENDS](#constant.rpmtag-recommends)**
    ([int](#language.types.integer))








    **[RPMTAG_RECOMMENDVERSION](#constant.rpmtag-recommendversion)**
    ([int](#language.types.integer))








    **[RPMTAG_RECONTEXTS](#constant.rpmtag-recontexts)**
    ([int](#language.types.integer))








    **[RPMTAG_RELEASE](#constant.rpmtag-release)**
    ([int](#language.types.integer))








    **[RPMTAG_REMOVETID](#constant.rpmtag-removetid)**
    ([int](#language.types.integer))








    **[RPMTAG_REQUIREFLAGS](#constant.rpmtag-requireflags)**
    ([int](#language.types.integer))








    **[RPMTAG_REQUIRENAME](#constant.rpmtag-requirename)**
    ([int](#language.types.integer))



     Las dependencias requeridas, con el índice de la base de datos.





    **[RPMTAG_REQUIRENEVRS](#constant.rpmtag-requirenevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_REQUIRES](#constant.rpmtag-requires)**
    ([int](#language.types.integer))








    **[RPMTAG_REQUIREVERSION](#constant.rpmtag-requireversion)**
    ([int](#language.types.integer))








    **[RPMTAG_RPMVERSION](#constant.rpmtag-rpmversion)**
    ([int](#language.types.integer))








    **[RPMTAG_RSAHEADER](#constant.rpmtag-rsaheader)**
    ([int](#language.types.integer))








    **[RPMTAG_SHA1HEADER](#constant.rpmtag-sha1header)**
    ([int](#language.types.integer))



     La firma SHA1, con el índice de la base de datos.





    **[RPMTAG_SHA256HEADER](#constant.rpmtag-sha256header)**
    ([int](#language.types.integer))








    **[RPMTAG_SIGGPG](#constant.rpmtag-siggpg)**
    ([int](#language.types.integer))








    **[RPMTAG_SIGMD5](#constant.rpmtag-sigmd5)**
    ([int](#language.types.integer))



     La firma MD5, con el índice de la base de datos.





    **[RPMTAG_SIGPGP](#constant.rpmtag-sigpgp)**
    ([int](#language.types.integer))








    **[RPMTAG_SIGSIZE](#constant.rpmtag-sigsize)**
    ([int](#language.types.integer))








    **[RPMTAG_SIZE](#constant.rpmtag-size)**
    ([int](#language.types.integer))








    **[RPMTAG_SOURCE](#constant.rpmtag-source)**
    ([int](#language.types.integer))








    **[RPMTAG_SOURCEPACKAGE](#constant.rpmtag-sourcepackage)**
    ([int](#language.types.integer))








    **[RPMTAG_SOURCEPKGID](#constant.rpmtag-sourcepkgid)**
    ([int](#language.types.integer))








    **[RPMTAG_SOURCERPM](#constant.rpmtag-sourcerpm)**
    ([int](#language.types.integer))








    **[RPMTAG_SPEC](#constant.rpmtag-spec)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.18





    **[RPMTAG_SUGGESTFLAGS](#constant.rpmtag-suggestflags)**
    ([int](#language.types.integer))








    **[RPMTAG_SUGGESTNAME](#constant.rpmtag-suggestname)**
    ([int](#language.types.integer))



     El directorio de los ficheros, con el índice de la base de datos.





    **[RPMTAG_SUGGESTNEVRS](#constant.rpmtag-suggestnevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_SUGGESTS](#constant.rpmtag-suggests)**
    ([int](#language.types.integer))








    **[RPMTAG_SUGGESTVERSION](#constant.rpmtag-suggestversion)**
    ([int](#language.types.integer))








    **[RPMTAG_SUMMARY](#constant.rpmtag-summary)**
    ([int](#language.types.integer))








    **[RPMTAG_SUPPLEMENTFLAGS](#constant.rpmtag-supplementflags)**
    ([int](#language.types.integer))








    **[RPMTAG_SUPPLEMENTNAME](#constant.rpmtag-supplementname)**
    ([int](#language.types.integer))



     Las dependencias débiles, con el índice de la base de datos, requiere librpm &gt;= 4.13.





    **[RPMTAG_SUPPLEMENTNEVRS](#constant.rpmtag-supplementnevrs)**
    ([int](#language.types.integer))








    **[RPMTAG_SUPPLEMENTS](#constant.rpmtag-supplements)**
    ([int](#language.types.integer))








    **[RPMTAG_SUPPLEMENTVERSION](#constant.rpmtag-supplementversion)**
    ([int](#language.types.integer))








    **[RPMTAG_SYSUSERS](#constant.rpmtag-sysusers)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.19





    **[RPMTAG_TRANSFILETRIGGERCONDS](#constant.rpmtag-transfiletriggerconds)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERFLAGS](#constant.rpmtag-transfiletriggerflags)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERINDEX](#constant.rpmtag-transfiletriggerindex)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERNAME](#constant.rpmtag-transfiletriggername)**
    ([int](#language.types.integer))



     El nombre del desencadenador de fichero de transacción, con el índice de la base de datos, requiere librpm &gt;= 4.13.





    **[RPMTAG_TRANSFILETRIGGERPRIORITIES](#constant.rpmtag-transfiletriggerpriorities)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERSCRIPTFLAGS](#constant.rpmtag-transfiletriggerscriptflags)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERSCRIPTPROG](#constant.rpmtag-transfiletriggerscriptprog)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERSCRIPTS](#constant.rpmtag-transfiletriggerscripts)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERTYPE](#constant.rpmtag-transfiletriggertype)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSFILETRIGGERVERSION](#constant.rpmtag-transfiletriggerversion)**
    ([int](#language.types.integer))








    **[RPMTAG_TRANSLATIONURL](#constant.rpmtag-translationurl)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.18





    **[RPMTAG_TRIGGERCONDS](#constant.rpmtag-triggerconds)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERFLAGS](#constant.rpmtag-triggerflags)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERINDEX](#constant.rpmtag-triggerindex)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERNAME](#constant.rpmtag-triggername)**
    ([int](#language.types.integer))



     El nombre del desencadenador, con el índice de la base de datos.





    **[RPMTAG_TRIGGERSCRIPTFLAGS](#constant.rpmtag-triggerscriptflags)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERSCRIPTPROG](#constant.rpmtag-triggerscriptprog)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERSCRIPTS](#constant.rpmtag-triggerscripts)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERTYPE](#constant.rpmtag-triggertype)**
    ([int](#language.types.integer))








    **[RPMTAG_TRIGGERVERSION](#constant.rpmtag-triggerversion)**
    ([int](#language.types.integer))








    **[RPMTAG_UPSTREAMRELEASES](#constant.rpmtag-upstreamreleases)**
    ([int](#language.types.integer))



     Requiere librpm &gt;= 4.18





    **[RPMTAG_URL](#constant.rpmtag-url)**
    ([int](#language.types.integer))








    **[RPMTAG_V](#constant.rpmtag-v)**
    ([int](#language.types.integer))








    **[RPMTAG_VCS](#constant.rpmtag-vcs)**
    ([int](#language.types.integer))








    **[RPMTAG_VENDOR](#constant.rpmtag-vendor)**
    ([int](#language.types.integer))








    **[RPMTAG_VERBOSE](#constant.rpmtag-verbose)**
    ([int](#language.types.integer))








    **[RPMTAG_VERIFYSCRIPT](#constant.rpmtag-verifyscript)**
    ([int](#language.types.integer))








    **[RPMTAG_VERIFYSCRIPTFLAGS](#constant.rpmtag-verifyscriptflags)**
    ([int](#language.types.integer))








    **[RPMTAG_VERIFYSCRIPTPROG](#constant.rpmtag-verifyscriptprog)**
    ([int](#language.types.integer))








    **[RPMTAG_VERITYSIGNATUREALGO](#constant.rpmtag-veritysignaturealgo)**
    ([int](#language.types.integer))



     Con librpm &gt;= 4.17.





    **[RPMTAG_VERITYSIGNATURES](#constant.rpmtag-veritysignatures)**
    ([int](#language.types.integer))



     Con librpm &gt;= 4.17.





    **[RPMTAG_VERSION](#constant.rpmtag-version)**
    ([int](#language.types.integer))








    **[RPMTAG_XPM](#constant.rpmtag-xpm)**
    ([int](#language.types.integer))

# Funciones de RpmInfo

# rpmaddtag

(PECL rpminfo &gt;= 0.5.0)

rpmaddtag — Añade un tag recuperado en una consulta

### Descripción

**rpmaddtag**([int](#language.types.integer) $tag): [bool](#language.types.boolean)

Añade un tag recuperado en una consulta previa.

### Parámetros

    tag


      Una de las constantes **[RPMTAG_*](#constant.rpmtag-arch)**, ver la página de las [constantes rpminfo](#rpminfo.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [rpminfo()](#function.rpminfo) - Devuelve información de un fichero RPM

- [rpmdbinfo()](#function.rpmdbinfo) - Devuelve la información de un RPM instalado

- [rpmdbsearch()](#function.rpmdbsearch) - Busca paquetes RPM

# rpmdbinfo

(PECL rpminfo &gt;= 0.2.0)

rpmdbinfo — Devuelve la información de un RPM instalado

### Descripción

**rpmdbinfo**([string](#language.types.string) $nevr, [bool](#language.types.boolean) $full = **[false](#constant.false)**): [?](#language.types.null)[array](#language.types.array)

Recupera la información sobre un paquete instalado, desde la base de datos RPM del sistema.

### Parámetros

    nevr


      El nombre con opcionalmente el epoch, la versión y la release.




    full


      Si es **[true](#constant.true)**, se recupera toda la información de cabecera del fichero, de lo contrario, solo un conjunto mínimo.


### Valores devueltos

Un [array](#language.types.array) de [array](#language.types.array) de información o NULL en caso de error.

### Ejemplos

**Ejemplo #1 Un ejemplo de rpmdbinfo()**

&lt;?php
rpmaddtag(RPMTAG_INSTALLTIME);
$info = rpmdbinfo("php-pecl-rpminfo");
print_r($info);
?&gt;

El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[Name] =&gt; php-pecl-rpminfo
[Version] =&gt; 0.4.2
[Release] =&gt; 1.fc31
[Summary] =&gt; RPM information
[Installtime] =&gt; 1586244687
[Arch] =&gt; x86_64
)
)

### Ver también

- [rpmaddtag()](#function.rpmaddtag) - Añade un tag recuperado en una consulta

# rpmdbsearch

(PECL rpminfo &gt;= 0.3.0)

rpmdbsearch — Busca paquetes RPM

### Descripción

**rpmdbsearch**(
    [string](#language.types.string) $pattern,
    [int](#language.types.integer) $rpmtag = RPMTAG_NAME,
    [int](#language.types.integer) $rpmmire = -1,
    [bool](#language.types.boolean) $full = **[false](#constant.false)**
): [?](#language.types.null)[array](#language.types.array)

Busca paquetes en la base de datos RPM del sistema.

### Parámetros

    pattern


      El valor a buscar.




    rpmtag


      El criterio de búsqueda, una de las constantes
      **[RPMTAG_*](#constant.rpmtag-arch)**.




    rpmmire


      El tipo de patrón, una de las constantes
      **[RPMMIRE_*](#constant.rpmmire-default)**.
      Cuando &lt; 0 el criterio debe ser igual al valor, y el índice de la base de datos es utilizado si es posible.




    full


      Si **[true](#constant.true)** toda la información de encabezado para el fichero es recuperada, de lo contrario solo un conjunto mínimo.


### Valores devueltos

Un [array](#language.types.array) de [array](#language.types.array) de información o **[null](#constant.null)** en caso de error.

### Ejemplos

**Ejemplo #1 Búsqueda del paquete que posee un fichero**

&lt;?php
$info = rpmdbsearch("/usr/bin/php", RPMTAG_INSTFILENAMES);
print_r($info);
?&gt;

El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[Name] =&gt; php-cli
[Version] =&gt; 7.4.4
[Release] =&gt; 1.fc32
[Summary] =&gt; Interfaz de línea de comandos para PHP
[Arch] =&gt; x86_64
)

)

### Ver también

- [rpmaddtag()](#function.rpmaddtag) - Añade un tag recuperado en una consulta

# rpmdefine

(PECL rpminfo &gt;= 1.2.0)

rpmdefine — Define o cambia el valor de una macro RPM

### Descripción

**rpmdefine**([string](#language.types.string) $text): [bool](#language.types.boolean)

Define o cambia el valor de una macro RPM.

Puede ser utilizado para seleccionar la ruta de acceso de la base de datos y el motor a utilizar
en lugar del predeterminado del sistema.

### Parámetros

    text


      El nombre de la macro, las opciones, el cuerpo.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Un ejemplo de rpmdefine()**

&lt;?php
// utiliza una base de datos antigua (bdb) de un chroot EL-8
rpmdefine("\_dbpath /var/lib/mock/almalinux-8-x86_64/root/var/lib/rpm");
rpmdefine("\_db_backend bdb_ro");
print_r(rpmdbinfo("almalinux-release")[0]["Summary"]);

// utiliza una base de datos nueva (sqlite) de un chroot Fedora-41
rpmdefine("\_dbpath /var/lib/mock/fedora-41-x86_64/root/usr/lib/sysimage/rpm");
rpmdefine("\_db_backend sqlite");
print_r(rpmdbinfo("fedora-release")[0]["Summary"]);
?&gt;

El ejemplo anterior mostrará:

AlmaLinux release file
Fedora release files

### Ver también

- [rpmexpand()](#function.rpmexpand) - Obtiene el valor expandido de una macro RPM

- [rpmdbinfo()](#function.rpmdbinfo) - Devuelve la información de un RPM instalado

# rpmexpand

(PECL rpminfo &gt;= 1.2.0)

rpmexpand — Obtiene el valor expandido de una macro RPM

### Descripción

**rpmexpand**([string](#language.types.string) $text): [string](#language.types.string)

Obtiene el valor expandido de una macro RPM.

### Parámetros

    text


      El texto con las macros RPM a expandir.


### Valores devueltos

Un [string](#language.types.string) con la(s) macro(s) expandida(s) concatenada(s).

### Ejemplos

**Ejemplo #1 Un ejemplo de rpmexpand()**

&lt;?php
$distro = rpmexpand("%{?fedora:Fedora %{fedora}}%{?rhel:Enterprise Linux %{rhel}}");
print_r($distro);
?&gt;

El ejemplo anterior mostrará:

Fedora 41

### Ver también

- [rpmexpandnumeric()](#function.rpmexpandnumeric) - Obtiene el valor numérico de una macro RPM

# rpmexpandnumeric

(PECL rpminfo &gt;= 1.2.0)

rpmexpandnumeric — Obtiene el valor numérico de una macro RPM

### Descripción

**rpmexpandnumeric**([string](#language.types.string) $text): [int](#language.types.integer)

Obtiene el valor numérico de una macro RPM.

### Parámetros

    text


      El texto con las macros RPM a expandir.


### Valores devueltos

La expansión de la macro como [int](#language.types.integer).
Los valores booleanos (Y o y retorna 1,
N o n retorna 0)
también están permitidos.
Una macro no definida retorna 0.

### Ejemplos

**Ejemplo #1 Un ejemplo rpmexpandnumeric()**

&lt;?php
$bits = rpmexpandnumeric("%__isa_bits");
print_r($bits);
?&gt;

El ejemplo anterior mostrará:

64

### Ver también

- [rpmexpand()](#function.rpmexpand) - Obtiene el valor expandido de una macro RPM

# rpmgetsymlink

(PECL rpminfo &gt;= 1.1.0)

rpmgetsymlink — Devuelve el destino de un enlace simbólico

### Descripción

**rpmgetsymlink**([string](#language.types.string) $path, [string](#language.types.string) $name): [?](#language.types.null)[string](#language.types.string)

Devuelve el destino de un enlace simbólico.

### Parámetros

    path


      La ruta de acceso del fichero RPM.




    name


      El nombre del fichero enlace simbólico.


### Valores devueltos

Un [string](#language.types.string) con el destino del enlace simbólico,
**[null](#constant.null)** en caso de error, o una cadena vacía si no es un enlace simbólico.

# rpminfo

(PECL rpminfo &gt;= 0.1.0)

rpminfo — Devuelve información de un fichero RPM

### Descripción

**rpminfo**([string](#language.types.string) $path, [bool](#language.types.boolean) $full = **[false](#constant.false)**, [string](#language.types.string) &amp;$error = ?): [?](#language.types.null)[array](#language.types.array)

Devuelve información sobre un fichero local, un paquete RPM.

### Parámetros

    path


      La ruta de acceso del fichero RPM.




    full


      Si **[true](#constant.true)**, se recupera toda la información de cabecera del fichero,
      de lo contrario, solo un conjunto mínimo.




    error


      Si se proporciona, recibirá el mensaje de error posible,
      y evitará una advertencia de ejecución.


### Valores devueltos

Un [array](#language.types.array) de información, o **[null](#constant.null)** en caso de error.

### Ejemplos

**Ejemplo #1 Un ejemplo de rpminfo()**

&lt;?php
rpmaddtag(RPMTAG_BUILDTIME);
$info = rpminfo("./php-pecl-rpminfo-0.4.2-1.el8.remi.7.4.x86_64.rpm");
print_r($info);
?&gt;

El ejemplo anterior mostrará:

Array
(
[Name] =&gt; php-pecl-rpminfo
[Version] =&gt; 0.4.2
[Release] =&gt; 1.el8
[Summary] =&gt; RPM information
[Buildtime] =&gt; 1586244821
[Arch] =&gt; x86_64
)

### Ver también

- [rpmaddtag()](#function.rpmaddtag) - Añade un tag recuperado en una consulta

# rpmvercmp

(PECL rpminfo &gt;= 0.1.0)

rpmvercmp — Comparación de versiones RPM

### Descripción

**rpmvercmp**([string](#language.types.string) $evr1, [string](#language.types.string) $evr2, [?](#language.types.null)[string](#language.types.string) $operator = **[null](#constant.null)**): [int](#language.types.integer)|[bool](#language.types.boolean)

Compara dos versiones de paquetes RPM.

### Parámetros

    evr1


      La primera cadena epoch:version-release.




    evr2


      La segunda cadena epoch:version-release.




    operator


      Un operador opcional.
      Los operadores posibles son:
      &lt;, lt, &lt;=, le, &gt;, gt, &gt;=, ge, ==, =, eq, !=, &lt;&gt;, ne.




      Este parámetro distingue mayúsculas y minúsculas, los valores deben estar en minúsculas.


### Valores devueltos

Devuelve -1 si evr1 es inferior a
evr2, 1 si evr1 es
superior a evr2, y 0 si son iguales.

Cuando se utiliza el argumento opcional operator, la función
devolverá **[true](#constant.true)** si la relación es la especificada por
el operador, en caso contrario **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      PECL rpminfo 0.7.0

       El operator opcional ha sido añadido.



## Tabla de contenidos

- [rpmaddtag](#function.rpmaddtag) — Añade un tag recuperado en una consulta
- [rpmdbinfo](#function.rpmdbinfo) — Devuelve la información de un RPM instalado
- [rpmdbsearch](#function.rpmdbsearch) — Busca paquetes RPM
- [rpmdefine](#function.rpmdefine) — Define o cambia el valor de una macro RPM
- [rpmexpand](#function.rpmexpand) — Obtiene el valor expandido de una macro RPM
- [rpmexpandnumeric](#function.rpmexpandnumeric) — Obtiene el valor numérico de una macro RPM
- [rpmgetsymlink](#function.rpmgetsymlink) — Devuelve el destino de un enlace simbólico
- [rpminfo](#function.rpminfo) — Devuelve información de un fichero RPM
- [rpmvercmp](#function.rpmvercmp) — Comparación de versiones RPM

- [Introducción](#intro.rpminfo)
- [Instalación/Configuración](#rpminfo.setup)<li>[Requerimientos](#rpminfo.requirements)
- [Instalación mediante PECL](#rpminfo.installation)
  </li>- [Constantes predefinidas](#rpminfo.constants)
- [Funciones de RpmInfo](#ref.rpminfo)<li>[rpmaddtag](#function.rpmaddtag) — Añade un tag recuperado en una consulta
- [rpmdbinfo](#function.rpmdbinfo) — Devuelve la información de un RPM instalado
- [rpmdbsearch](#function.rpmdbsearch) — Busca paquetes RPM
- [rpmdefine](#function.rpmdefine) — Define o cambia el valor de una macro RPM
- [rpmexpand](#function.rpmexpand) — Obtiene el valor expandido de una macro RPM
- [rpmexpandnumeric](#function.rpmexpandnumeric) — Obtiene el valor numérico de una macro RPM
- [rpmgetsymlink](#function.rpmgetsymlink) — Devuelve el destino de un enlace simbólico
- [rpminfo](#function.rpminfo) — Devuelve información de un fichero RPM
- [rpmvercmp](#function.rpmvercmp) — Comparación de versiones RPM
  </li>
