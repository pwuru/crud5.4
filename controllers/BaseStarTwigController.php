<?php
class BaseStarTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext(); 
        // создаем запрос к БД
        $query = $this->pdo->query("SELECT DISTINCT type FROM star_wars_characters ORDER BY 1");
            // стягиваем данные
        $types = $query->fetchAll();
            // создаем глобальную переменную в $twig, которая будет достпна из любого шаблона
        $context['types'] = $types;

        return $context;
    }
}