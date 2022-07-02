<?php

namespace Simple\Class;

use Simple\Interface\ArticleInterface;
use Simple\Interface\UserInterface;

/**
 * Класс для работы с пользователями
 */
class User implements ArticleInterface, UserInterface
{
    /**
     * Индификатор пользователя
     * @var int
     */
    protected int $Id;

    /**
     * Список ссылок на статьи пользователя
     * @var array
     */
    protected array $ArticleList;

    public function __construct(int $Id) {

    }

    /**
     * Получаем индификатора пользователя
     * @return int
     */
    public function getId(): int
    {

    }

    /**
     * Создаем новую статью для текущего пользователя
     * @return Article
     */
    public function createArticle(): Article
    {

    }

    /**
     * Получает статьи текущего пользователя
     * @return array
     */
    public function getArticleList(): array
    {

    }
}
