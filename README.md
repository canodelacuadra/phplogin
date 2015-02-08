# A PHP login script (MINIMAL VERSION)

He cogido este script muy interesante... sencillo y limpio,

Un simple, pero seguro script de inicio de sesión PHP. Usa el ultra moderno & futuro 5.5 PHP.
BLOWFISH hashing/salting functions (includes the official PHP 5.3 & PHP 5.4 compatibility pack, which makes those
functions available in those versions too). Follow the project on **[Twitter](https://twitter.com/simplephplogin)**,
**[Facebook](https://www.facebook.com/pages/PHP-Login-Script/461306677235868)** or
**[Google+](https://plus.google.com/104110071861201951660)** and have a look on the official support blog
**[Dev Metal](http://www.dev-metal.com)**. Ask questions in the [Official Support Forum](http://support-forum.php-login.net/).

**Este script es parte del proyecto php-Inicio de sesión, una colección de 4 scripts de inicio de sesión diferentes**.
Ver [php-login.net](http://www.php-login.net) para más información.


1. **Versión One-file :** Script de conexión completa en un solo archivo. Utiliza una base de datos SQLite en un archivo (no necesita MySQL ) y PDO.
  Funcionalidades: Register, login, logout.
   https://github.com/panique/php-login-one-file
2. **Versión mínima** Todas las funciones básicas en una limpia estructura, usa MySQL and mysqli.
   Funcionalidades: Register, login, logout.
   https://github.com/panique/php-login-minimal
3. **Versión avanzada** Similar a la mínima pero con más funcionalidades.
   Usa PDO, Captchas, mail sending via SMTP y mucho más.
   https://github.com/panique/php-login-advanced
3. **Professional version** Todo como una profesional estructura de framwork MVC perfecta para proyectos
   de aplicaciones reales. Funcionalidades adicionales como: URL rewriting, professional usage of controllers and actions, PDO, MySQL,
   mail sending via PHPMailer (SMTP or PHP's mail() function/linux sendmail), user profile pages, public user profiles,
   gravatars and local avatars, account upgrade/downgrade etc., login via Facebook, Composer integration, etc.
   https://github.com/panique/php-login



## Requisitos

- PHP 5.3.7+
- MySQL 5 database (please use a modern version of MySQL (5.5, 5.6, 5.7) as very old versions have a exotic bug that
[makes PDO injections possible](http://stackoverflow.com/q/134099/1114320).
- activated mysqli (last letter is an "i") extension (activated by default on most server setups)

## Instalación (quick setup)

Creación de una base de datos *login* and the tabla *users* via las órdenes SQL en el directorio `_install` .
Change mySQL database user and password in `config/db.php` (*DB_USER* and *DB_PASS*).

## Instalación (tutoriales)

- [Detailed tutorial for installation on Ubuntu 12.04 LTS](http://www.dev-metal.com/install-php-login-nets-1-minimal-login-script-ubuntu/)
- [Detailed tutorial for installation on Windows 7 and 8 (useful for development)](http://www.dev-metal.com/how-to-install-php-login-minimal-on-windows-7-8/)

## Noticia de Seguridad

Este script viene con un práctico .htaccess en la carpeta de vistas 
que niega el acceso directo a los archivos dentro de la carpeta 
(para que personas no los pueden procesar las vistas directamente).
 Sin embargo, estos archivos .htaccess sólo funcionan si ha configurado 
 'AllowOverride' 'Alls' en tu apache vhost configs. 
 Hay un montón de tutoriales en la web de cómo hacer esto.

## Enlaces interesantes

- [Una pequeña guía de funciones PHP 5.5  hashing de passwords y "library plugin" based PHP 5.3 & 5.4 implementation](http://www.dev-metal.com/use-php-5-5-password-hashing-functions/)
- [How to setup latest version of PHP 5.5 on Ubuntu 12.04 LTS](http://www.dev-metal.com/how-to-setup-latest-version-of-php-5-5-on-ubuntu-12-04-lts/). Same for Debian 7.0 / 7.1:
- [How to setup latest version of PHP 5.5 on Debian Wheezy 7.0/7.1 (and how to fix the GPG key error)](http://www.dev-metal.com/setup-latest-version-php-5-5-debian-wheezy-7-07-1-fix-gpg-key-error/)
- [Notes on password & hashing salting in upcoming PHP versions (PHP 5.5.x & 5.6 etc.)](https://github.com/panique/php-login/wiki/Notes-on-password-&-hashing-salting-in-upcoming-PHP-versions-%28PHP-5.5.x-&-5.6-etc.%29)
- [Some basic "benchmarks" of all PHP hash/salt algorithms](https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)

## Themes / User Interfaces / Styles

Bookmark the highly related partner-project "[php-login-styles](https://github.com/panique/php-login-styles)" which
will host beautiful themes for all the php-login versions. Currently this is only a placeholder,
the project starts in early 2014.

## Licencias

Licenciado bajo [MIT](http://www.opensource.org/licenses/mit-license.php).
 Puede utilizar este script gratis para cualquier proyecto comercial o privado.

