<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 14.01.2019
 * Time: 3:59
 */

namespace app\engine;



class RequestException extends \Exception {

}
class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;
    private $method;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }
    private function parseRequest(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $this->requestString);
        $this->controllerName = $url[1];
        $this->actionName = $url[2];
        $this->params = $_REQUEST;

    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

}