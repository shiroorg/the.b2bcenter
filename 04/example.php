<?php

/**
 * Получаем имена пользователей, id=name
 * @param string $user_ids
 * @return array
 */
function load_users_data(string $user_ids): array {

    $data = array();

    /**
     * Фильтруем и валидируем данные от возможных плохих записей
     */
    $ids = explode(',', $user_ids);
    foreach ($ids as $key => &$user_id) {
        $user_id = intval($user_id);

        //todo: Можно добавить доп. проверки при необходимости

        if($user_id === 0) {
            unset($ids[$key]);
        }
    }

    /** Если валидных данных нет */
    if(count($ids) == 0) {
        return array();
    }

    $ids = implode(',', $ids);
    $db = mysqli_connect("127.0.0.1", "root", "root", "testing");
    $sql = mysqli_query($db, "SELECT id,name FROM users WHERE id IN({$ids})");

    foreach ($sql->fetch_all() as $user) {
        $data[$user['0']] = $user[1];
    }

    return $data;
}

/*
 * Предположим что у нас пришла строка ввида: 1,0035,ау4435,2,17,48,0,er,134rew, `;SELECT * FROM users)';
 */
$data = load_users_data($_GET['user_ids']);
foreach ($data as $user_id=>$name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>\n";
}
/*
 * В итоге получим:
<a href="/show_user.php?id=1">Anna</a>
<a href="/show_user.php?id=2">Ivan</a>
<a href="/show_user.php?id=17">Nina</a>
<a href="/show_user.php?id=48">Nina</a>
<a href="/show_user.php?id=134">Olga</a>
 */
