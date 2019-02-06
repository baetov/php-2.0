<?php
namespace app\model;
use app\engine\Db;

abstract class DbModel extends Models
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [":id" => $id], static::class);

    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete()
    {
        //TODO удаление
        //обратите внимание, что не нужно тут передавать id удаляемого объекта
        //обеспечьте удаление себя типа так $Product->delete()
        //т.е. объект чтобы удалил в таблице в БД самого себя, id уже есть в public свойстве удаляемого объекта
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }
    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == "db" || $key == "id") continue;
            $columns[] = "`$key`";
            $params[":{$key}"] = $value;
        }

        $columns = implode(", ", $columns);
        $value = implode(", ", array_keys($params));

        $tableName = static :: getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$value})";

        $this->db->execute($sql, $params);

        $this->id = $this->db->lastInsertId();

    }

    public function save()
    {
        if (property_exists($this,$this->id)){
            return $this->update();
        }
        else {
            return $this->insert();
        }
    }

    public function update()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];
        $par = [];

        foreach ($this as $key => $value) {
            if($key == 'db'){
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $combine = array_combine($columns,array_keys ($params));
        foreach ($combine as $key => $val){
            $par[] = "$key=$val, ";
        }
        $placeholders = implode($par);
        $sql = "UPDATE {$tableName} SET {$placeholders}";
        $this->db->execute($sql, $params);

    }



    abstract static public function getTableName();

}