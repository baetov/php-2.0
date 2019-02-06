<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 08.01.2019
 * Time: 10:52
 */

namespace app\controllers;
use app\engine\Db;
use app\model\Products;
use app\model\Basket;
use app\engine\Request;


class BasketController extends Controller
{
    public function actionIndex() {

        echo $this->render('basket', [
            'products' => Basket::getBasket(session_id())]);
    }

    public function actionDelete() {

        $basket = Basket::getOne((new Request())->getParams()['id']);
        if (session_id() == $basket->session) {
            $basket->delete();
        }
        echo json_encode(['response' => 1]);
    }
}