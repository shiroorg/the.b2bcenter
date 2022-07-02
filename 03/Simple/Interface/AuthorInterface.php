<?php

namespace Simple\Interface;

use Simple\Class\User;

/**
 * Интерфейс будет имплемитироваться для статей
 */
interface AuthorInterface
{

    /**
     * Установка нового автора статьи
     * @param User $User
     * @return void
     */
    public function changeAuthor(User $User): void;

    /**
     * Получаем автора статьи
     * @return int
     */
    public function getAuthor(): int;

}
