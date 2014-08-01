<?php

    // modules namespace
    namespace Modules;

    /**
     * Sessions
     * 
     * @author   Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class Sessions
    {
        /**
         * getConfig
         * 
         * @access public
         * @static
         * @return array
         */
        public static function getConfig()
        {
            // configuration settings
            $config = \Plugin\Config::retrieve();
            $config = $config['TurtlePHP-SessionsModule'];
            return $config;
        }
    }
