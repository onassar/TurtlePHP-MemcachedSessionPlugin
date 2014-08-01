<?php

    /**
     * Namespace
     * 
     */
    namespace Plugin\MemcachedSession;

    /**
     * Data
     * 
     */

    // Cookie/session naming
    $name = 'session';

    // Storage
    $servers = array(
        array('127.0.0.1', '11211')
    );

    // Host for cookie
    $host = '.' . ($_SERVER['HTTP_HOST']);

    /**
     * Config storage
     * 
     */

    // Store
    \Plugin\Config::add(
        'TurtlePHP-MemcachedSessionPlugin',
        array(
            'name' => $name,
            'servers' => $servers,
            'host' => $host
        )
    );
