TurtlePHP-MemcachedSessionPlugin
======================

### Sample plugin loading:
``` php
require_once APP . '/vendors/PHP-SecureSessions/SMSession.class.php';
require_once APP . '/plugins/TurtlePHP-BasePlugin/Base.class.php';
require_once APP . '/plugins/TurtlePHP-MemcachedSessionPlugin/MemcachedSession.class.php';
$path = APP . '/config/plugins/memcachedSession.inc.php';
TurtlePHP\Plugin\MemcachedSession::setMemcachedSessionPath($path);
TurtlePHP\Plugin\MemcachedSession::init();
```
