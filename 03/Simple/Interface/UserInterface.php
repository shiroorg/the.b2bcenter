<?php

namespace Simple\Interface;

/**
 * Интерфейс будет имплемитироваться для пользователей
 */
interface UserInterface
{

    /**
     * Получаем индификатора пользователя
     * @return int
     */
    public function getId(): int;

}
