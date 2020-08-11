<?php

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
    TurtlePHP\Plugin\Config::set($key, $pluginConfigData);
