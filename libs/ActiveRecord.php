<?php
require_once 'libs/DB.php';
abstract class ActiveRecord
{
    protected static $table;
    protected $data = [];

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public static function getOneById($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $db = new DB();
        $db->setClassName(get_called_class());
        $result = $db->query($sql, [':id' => $id]);

        return $result[0];
    }

    /**
     * @param $fields array of fields to match
     * @return array of found records matched by $fields
     */
    public static function getByFields($fields){
        $substitutions = [];
        foreach ($fields as $key => $value){
            $substitutions[] = "$key=:$key";
        }
        $sql = 'SELECT * FROM ' . static::$table .
                ' WHERE '. implode(' AND ', $substitutions);

        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql, $fields);
    }

    public static function getAll($orderBy = '',$start = 0, $amount = 0)
    {
        if($orderBy != ''){
            $orderBy = " ORDER BY $orderBy desc";
        }

        $limit = "";
        if(isset($start) && isset($amount)){
            if($amount > 0){
                if($start<0)$start=0;
                $limit = " LIMIT $start, $amount";
            }
        }

        $sql = 'SELECT * FROM ' . static::$table . $orderBy . $limit;

        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql);
    }

    public static function count(){
        $sql = "SELECT COUNT(*) FROM " . static::$table;
        $db = new DB();
        return $db->count($sql)[0][0];
    }

    public function update(){
        $substitutions = [];
        $data = [];
        foreach ($this->data as $key => $value){
            $substitutions[":$key"] = $value;
            if($key == 'id'){
                continue;
            }
            $data[] ="$key=:$key";
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(",", $data) .
               ' WHERE id=:id';

        $db = new DB();
        $db->execute($sql, $substitutions);
    }
    public function insert(){
        $values = [];
        foreach ($this->data as $key => $value){
            if($key != 'id'){
                $values[":$key"] = $value;
            }
        }
        $fields = array_keys($this->data);
        $sql = 'INSERT INTO ' . static::$table . '(' . implode(",", $fields) . ') ' .
               'VALUES (' . implode(",", array_keys($values)) . ')';

        $db = new DB();
        $result = $db->execute($sql, $values);

        if($result == true){
            $this->id = $db->lastInsertId();
        }

        return $result;
    }

    public function save(){
        if(isset($this->id)){
            $this->update();
        }
        else {
            $this->insert();
        }
    }
    public function delete(){
        $sql = 'DELETE FROM' . static::$table . "WHERE id=:id";
        $db = new DB();
        return $db->execute($sql, [':id' => $this->id]);
    }
}