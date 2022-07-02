<?php

namespace Simple\Class;

use Simple\Interface\AuthorInterface;

/**
 * Класс для работы со статьями
 */
class Article implements AuthorInterface
{

    /**
     * ID Автора статьи
     * @var int
     */
    protected int $AuthorId;

    /**
     * Автор статьи
     * @var User
     */
    protected User $Author;

    /**
     * Устанавлием автора для статьи
     * @param User $Author
     */
    public function __construct(User $Author)
    {

    }

    /**
     * Устанавлием нового автора для статьи
     * @param User $User
     * @return void
     */
    public function changeAuthor(User $User): void
    {

    }

    /**
     * Получаем автора статьи
     * @return int
     */
    public function getAuthor(): int
    {

    }
}
