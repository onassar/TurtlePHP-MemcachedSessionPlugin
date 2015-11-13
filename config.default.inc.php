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

    // When does it expire
    $expiry = 0;

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
            'expiry' => $expiry,
            'name' => $name,
            'servers' => $servers,
            'host' => $host
        )
    );
