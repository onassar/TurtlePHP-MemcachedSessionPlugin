<?php

    /**
     * Namespace
     * 
     */
    namespace Plugin\MemcachedSession;

    /**
     * Plugin Config Data
     * 
     */
    $expiry = 0;
    $host = '.' . ($_SERVER['HTTP_HOST']);
    $name = 'session';
    $servers = array();
    $server = array('127.0.0.1', '11211');
    array_push($servers, $server);
    $pluginConfigData = compact('expiry', 'host', 'name', 'servers');

    /**
     * Storage
     * 
     */
    $key = 'TurtlePHP-MemcachedSessionPlugin';
    \Plugin\Config::add($key, $pluginConfigData);
