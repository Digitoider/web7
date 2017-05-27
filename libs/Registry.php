<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.05.2017
 * Time: 23:54
 */
class Registry implements ArrayAccess {
    private $container = array();
    private static $instance;
    public function offsetSet($key, $value)
    {
        if(!$this->offsetExists($key))
            $this->container[$key] = $value;
        else
            trigger_error('Variable '. $key .' already defined', E_USER_WARNING);
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Registry();
        }
        return self::$instance;
    }
    private function __construct()
    {
    }

    public function offsetGet($key)
    {
        return $this->container[$key];
    }

    public function offsetExists($key)
    {
        return isset($this->container[$key]);
    }

    public function offsetUnset($key)
    {
        unset($this->container[$key]);
    }
}