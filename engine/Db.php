<?php
namespace app\engine;
use app\traits\Tsingletone;

class Db
{
    use Tsingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    private  $connection = null;


    private function getConnection() {

        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->preparePdoString(),
                $this->config['login'],
                $this->config['password']
                );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }


        return $this->connection;
    }


    private function preparePdoString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
            );
    }


    private function query($sql, $params = []) {
        $statement = $this->getConnection()->prepare($sql);
        $statement->execute($params);
        //В $statement будет в виде объекта результат выполнения запроса
        return $statement;
    }


    public function execute($sql, $params = []) {
        $statement = $this->query($sql, $params);
        return $statement->rowCount();
    }

    public function queryOne($sql, $params = []) {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
        //fetchAll() вернет нам в виде ассоциотивного массива результаты запроса
    }

    public function queryObject($sql,$params = [],$class){
        $getObj = $this->query($sql, $params);
        $getObj->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::ERRMODE_EXCEPTION);
        return $getObj->fetch();
    }
    public function lastInsertID(){
        return $this->connection->lastInsertId();
}

}