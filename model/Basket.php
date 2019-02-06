<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 24.12.2018
 * Time: 5:05
 */

namespace app\model;
use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session;
    public $productId;

    /**
     * Basket constructor.
     * @param $id
     * @param $session
     * @param $productId
     */
    public function __construct($id = null, $session = null, $productId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->session = $session;
        $this->productId = $productId;

    }

    public static function getBasket($session){
        $sql = "SELECT `products`.`id` as id_prod,`cart`.`id` as id_basket,`products`.`name`,`products`.`img`,`products`.`description`,`products`.`price` FROM `cart`,`products` WHERE `products`.`id` = `cart`.`productId` AND session = :session ";
       return Db::getInstance()->queryAll($sql,['session' => $session]);
    }
    public static function getCount($session) {
        $sql = "SELECT count(*) as count FROM `cart` WHERE `session` = :session";
        return Db::getInstance()->queryOne($sql, ['session' => $session])['count'];
    }


    public static function getTableName()
    {
        return "cart";
    }
}