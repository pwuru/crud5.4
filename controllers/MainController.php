<?php
require_once "BaseStarTwigController.php";

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    
    // добавим метод getContext()
    public function getContext(): array
    {
        $context = parent::getContext();
        
        if (isset($_GET['type'])) {
        $query = $this->pdo->prepare("SELECT * FROM star_wars_characters WHERE type LIKE :type");
        $query->bindValue("type", "%{$_GET['type']}%");  // Добавил % по краям
        $query->execute();
}
        else {
            $query = $this->pdo->query("SELECT * FROM star_wars_characters");
        }
        
        $context['star_wars_characters'] = $query->fetchAll();

        return $context;
    }
}