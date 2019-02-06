<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 11.01.2019
 * Time: 1:45
 */

namespace app\interfaces;


interface IRenderer
{
    public function renderTemplate($template, $params = []) ;
}