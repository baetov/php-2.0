<?php
use app\model\Products;


class ShopTest extends \PHPUnit\Framework\TestCase
    /**
     * @dataProvider nameProvider
     */
{
    public function testProduct() {
        $name = "Чай";
        $product = new Products(null, $name, null ,"китайский", "22");
        $this->assertEquals($name, $product->name);

    }




}
