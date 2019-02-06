<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 08.01.2019
 * Time: 8:52
 */

namespace app\controllers;


use app\engine\Render;
use app\interfaces\IRenderer;
use app\model\Basket;
use app\model\Users;

abstract class Controller implements IRenderer
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
        else
            echo "404";
    }
    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderTemplate($template, $params),
                'count' => Basket::getCount(session_id()),
                'auth' => Users::isAuth(),
                'username' => Users::getUser(),
                'isAdmin' => Users::isAdmin()
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
}