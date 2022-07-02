<?php

namespace Simple\Interface;

use Simple\Class\Article;

/**
 * Интерфейс управления статьями пользоваетля
 */
interface ArticleInterface {

    /**
     * Создаем новую статью для текущего пользователя
     * @return Article
     */
    public function createArticle(): Article;

    /**
     * Получает статьи текущего пользователя
     * @return array
     */
    public function getArticleList(): array;
}
