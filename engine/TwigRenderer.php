<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 11.01.2019
 * Time: 2:25
 */

namespace app\engine;


use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $templater;

    /**
     * TwigRenderer constructor.
     */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(TEMPLATES_DIR . "twig");
        $this->templater = new \Twig_Environment($loader);
    }


    public function renderTemplate($template, $params = [])
    {
        $template = $template . ".twig";
        return $this->templater->render($template, $params);
    }
}