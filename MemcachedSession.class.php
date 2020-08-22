<?php


    // Namespace overhead
    namespace TurtlePHP\Plugin;

    /**
     * MemcachedSession
     * 
     * Memcached Session plugin for TurtlePHP.
     * 
     * @author  Oliver Nassar <onassar@gmail.com>
     * @abstract
     * @extends Base
     */
    abstract class MemcachedSession extends Base
    {
        /**
         * _client
         * 
         * @access  public
         * @var     null|\SMSession (default: null)
         * @static
         */
        protected static $_client = null;

        /**
         * _configPath
         * 
         * @access  protected
         * @var     string (default: 'config.default.inc.php')
         * @static
         */
        protected static $_configPath = 'config.default.inc.php';

        /**
         * _initiated
         * 
         * @access  protected
         * @var     bool (default: false)
         * @static
         */
        protected static $_initiated = false;

        /**
         * _opened
         * 
         * @access  protected
         * @var     bool (default: false)
         * @static
         */
        protected static $_opened = false;

        /**
         * _checkDependencies
         * 
         * @access  protected
         * @static
         * @return  void
         */
        protected static function _checkDependencies(): void
        {
            static::_checkConfigPluginDependency();
            static::_checkSMSessionDependency();
        }

        /**
         * _setOpened
         * 
         * @access  protected
         * @static
         * @return  void
         */
        protected static function _setOpened(): void
        {
            static::$_opened = true;
        }

        /**
         * _setupClient
         * 
         * @access  protected
         * @static
         * @return  void
         */
        protected static function _setupClient(): void
        {
            $client = new \SMSession();
            if (HTTPS === true) {
                $client->setSecured();
            }
            $configData = static::_getConfigData();
            $client->setExpiry($configData['expiry']);
            $client->setName($configData['name']);
            $client->setHost($configData['host']);
            $client->addServers($configData['servers']);
            $client->open();
            static::$_client = $client;
        }

        /**
         * getClient
         * 
         * @access  public
         * @return  \SMSession
         */
        public static function getClient(): \SMSession
        {
            $client = static::$_client;
            return $client;
        }

        /**
         * open
         * 
         * @see     http://stackoverflow.com/questions/13633433/php-memcached-based-sessions-should-garbage-collection-be-disabled
         * @access  public
         * @static
         * @return  bool
         */
        public static function open(): bool
        {
            if (static::$_opened === true) {
                return false;
            }
            static::_setOpened();
            static::_setupClient();
            return true;
        }

        /**
         * init
         * 
         * @access  public
         * @static
         * @return  bool
         */
        public static function init(): bool
        {
            if (static::$_initiated === true) {
                return false;
            }
            parent::init();
            return true;
        }
    }

    // Config path loading
    $info = pathinfo(__DIR__);
    $parent = ($info['dirname']) . '/' . ($info['basename']);
    $configPath = ($parent) . '/config.inc.php';
    \TurtlePHP\Plugin\MemcachedSession::setConfigPath($configPath);
