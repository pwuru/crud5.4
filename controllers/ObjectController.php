<?php
require_once "BaseStarTwigController.php";

class ObjectController extends TwigBaseController {
    public $template = "";
    public $temp = "";

    public function get() {
        $show = $_GET['show'] ?? '';
        switch($show) {
            case 'image':
                $this->template = "base_image1.twig";
                $this->temp = "Картинка";
                break;
            case 'info':
                $this->template = "base_info1.twig";
                $this->temp = "Описание";
                break;
            default:
                $this->template = "objects.twig";
                $this->temp = "";
        }
        parent::get();
    }

    public function getContext(): array
    {
        $context = parent::getContext();   

        $query = $this->pdo->prepare("SELECT * FROM star_wars_characters WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); 
        
        $context['title_objects'] = $query->fetch();

        return $context;
    }
}