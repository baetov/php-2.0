<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 11.01.2019
 * Time: 1:25
 */

namespace app\engine;


use app\interfaces\IRenderer;

class Render implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}