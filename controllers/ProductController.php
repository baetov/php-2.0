<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 08.01.2019
 * Time: 8:36
 */

namespace app\controllers;
use app\model\Basket;
use app\model\Products;
use app\engine\Request;

class ProductController extends Controller
{

    public function actionBuy() {
        (new Basket(null, session_id(), (new Request())->getParams()['id']))->save();

        echo json_encode(['response' => 1]);



    }

    public function actionCatalog() {
        $products = Products::getAll();

        echo json_encode(['goods' => $products], JSON_NUMERIC_CHECK);
    }

    public function actionIndex() {

        echo $this->render('catalog', [
            'products' => Products::getAll(),
            'count' => Basket::getCount(session_id())

        ]);
    }

    public function actionCard() {

        $product = Products::getOne($_GET['id']);
        if (!$product) {
            throw new \Exception('Продукт не найден', 404);
        };
        echo $this->render('card', [
            'product' => $product,

        ]);
    }

}