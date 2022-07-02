## Задача №2
Имеется строка:
`https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3`
Напишите функцию, которая:
 - удалит параметры со значением “3”;
 - отсортирует параметры по значению;
 - добавит параметр url со значением из переданной ссылки без параметров (в примере: `/test/index.html`);
 - сформирует и вернёт валидный URL на корень указанного в ссылке хоста.
В указанном примере функцией должно быть возвращено:
`https://www.somehost.com/?param4=1&param3=2&param1=4&url=%2Ftest%2Findex.html`

## Решение

Пример кода в файле `example.php`
В нем реалозиванна функция, которая принимает два параметра строку и значение которое нужно отфильтровать
```php 
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
```
При выполнение кода
```php 
echo "Request URL: {$URL}\n";
$URL = filterUrl($URL, "3");
echo "Response URL: {$URL}\n";
```
Получаем результат
```bash 
php two/example.php
Request URL: https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5
Response URL: https://www.somehost.com/?param1=4&param3=2&param4=1&param5=&url=%2Ftest%2Findex.html
```
