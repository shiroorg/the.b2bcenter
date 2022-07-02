<?php

$URL = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5';

function filterUrl (string $url, string $filter): string {

    // Разбираем строку на части
    $query = parse_url($url);

    // Получаем параметры в формате массива
    parse_str($query['query'], $query['query']);

    // Убирием все совпадения в параметрах
    while(($position = array_search($filter, $query['query'])) !== FALSE)
    {
        unset($query['query'][$position]);
    }

    $query['query']['url'] = $query['path'];
    $query['query'] = http_build_query($query['query']);

    return "{$query['scheme']}://{$query['host']}/?{$query['query']}";
}

echo "Request URL: {$URL}\n";
$URL = filterUrl($URL, "3");
echo "Response URL: {$URL}\n";

