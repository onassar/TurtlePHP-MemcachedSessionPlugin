<?php

    // namespace
    namespace Plugin;

    // dependency check
    if (class_exists('\\Plugin\\Config') === false) {
        throw new \Exception(
            '*Config* class required. Please see ' .
            'https://github.com/onassar/TurtlePHP-ConfigPlugin'
        );
    }

    // dependency check
    if (class_exists('\\SMSession') === false) {
        throw new \Exception(
            '*SMSession* class required. Please see ' .
            'https://github.com/onassar/PHP-SecureSessions'
        );
    }

    /**
     * MemcachedSession
     * 
     * Memcached session plugin for TurtlePHP
     * 
     * @author  Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class MemcachedSession
    {
        /**
         * _client
         *
         * @var     SMSession
         * @access  public
         * @static
         */
        protected static $_client;

        /**
         * _configPath
         *
         * @var     string
         * @access  protected
         * @static
         */
        protected static $_configPath = 'config.default.inc.php';

        /**
         * getClient
         * 
         * @access  public
         * @return  SMSession
         */
        public static function getClient()
        {
            return self::$_client;
        }

        /**
         * open
         * 
         * @see     http://stackoverflow.com/questions/13633433/php-memcached-based-sessions-should-garbage-collection-be-disabled
         * @access  public
         * @static
         * @return  void
         */
        public static function open()
        {
            if (is_null(self::$_client) === true) {
                require_once self::$_configPath;
                $config = \Plugin\Config::retrieve(
                    'TurtlePHP-MemcachedSessionPlugin'
                );
                self::$_client = new \SMSession();
                if (HTTPS === true) {
                    self::$_client->setSecured();
                }
                self::$_client->setExpiry($config['expiry']);
                self::$_client->setName($config['name']);
                self::$_client->setHost($config['host']);
                self::$_client->addServers($config['servers']);
                self::$_client->open();
            }
        }

        /**
         * setConfigPath
         * 
         * @access  public
         * @param   string $path
         * @return  void
         */
        public static function setConfigPath($path)
        {
            self::$_configPath = $path;
        }
    }

    // Config
    $info = pathinfo(__DIR__);
    $parent = ($info['dirname']) . '/' . ($info['basename']);
    $configPath = ($parent) . '/config.inc.php';
    if (is_file($configPath) === true) {
        MemcachedSession::setConfigPath($configPath);
    }
