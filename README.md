TurtlePHP-MemcachedSessionPlugin
======================

``` php
require_once APP . '/vendors/PHP-SecureSessions/SMSession.class.php';
require_once APP . '/plugins/TurtlePHP-MemcachedSessionPlugin/MemcachedSession.class.php';
\Plugin\MemcachedSession::open();
```

``` php
...
\Plugin\MemcachedSession::setConfigPath('/path/to/config/file.inc.php');
\Plugin\MemcachedSession::open();
```
