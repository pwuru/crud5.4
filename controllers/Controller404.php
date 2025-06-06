<?php
require_once "BaseStarTwigController.php";

class Controller404 extends TwigBaseController {
    public $template = "404.twig"; 
    public $title = "Страница не найдена";

    public function get()
    {
        http_response_code(404);
        parent::get();
    }
}