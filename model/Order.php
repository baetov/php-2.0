<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 24.12.2018
 * Time: 5:09
 */

namespace app\model;
use app\engine\Db;


class Order extends DbModel
{
    public $id;
    public $session;
    public $username;
    public $email;

    /**
     * Order constructor.
     * @param $id
     * @param $session
     * @param $username
     * @param $email
     */
    public function __construct($id = null, $session = null, $username = null, $email = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->session = $session;
        $this->username = $username;
        $this->email = $email;
    }
    public  function getOrder($session)
    {
    $sql = "SELECT * FROM orders WHERE `session` = :session";
    return Db::getInstance()->queryAll($sql,['session' => $session ]);
    }
    public static function orderDetails($session)
    {
       return Basket::getBasket($session);
    }


    public static function getTableName()
    {
        return "orders";
    }
}