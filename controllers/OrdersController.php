<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 22.01.2019
 * Time: 23:59
 */

namespace app\controllers;
use app\engine\Db;
use app\model\Basket;
use app\model\Order;
use app\engine\Request;


class OrdersController extends Controller
{
    public function actionIndex() {

        echo $this->render('orders', [
            'orders' => Order::getOrder(session_id())

        ]);
    }
    public function actionDetails() {

        echo $this->render('details', [
            'products' => Order::orderDetails(session_id())
        ]);
    }
    public function actionDelete() {
        $order = Order::getOne((new Request())->getParams()['id']);
        if (session_id() == $order->session){
            $order->delete();
        }

        echo json_encode(['response' => 1]);
    }
    public function actionAdd() {
      $name = (new Request())->getParams()['userName'];
      $email = (new Request())->getParams()['email'];

        (new Order(null,session_id(),$name,$email))->save();
        header("Location: /");
    }

}