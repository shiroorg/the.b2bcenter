## Задача №1
Имеется база со следующими таблицами:
```sql
CREATE TABLE `users` (
`id`         INT(11) NOT NULL AUTO_INCREMENT,
`name`       VARCHAR(255) DEFAULT NULL,
`gender`     INT(11) NOT NULL COMMENT '0 - не указан, 1 - мужчина, 2 - женщина.',
`birth_date` INT(11) NOT NULL COMMENT 'Дата в unixtime.',
PRIMARY KEY (`id`)
);

CREATE TABLE `phone_numbers` (
`id`      INT(11) NOT NULL AUTO_INCREMENT,
`user_id` INT(11) NOT NULL,
`phone`   VARCHAR(255) DEFAULT NULL,
PRIMARY KEY (`id`)
);
```
Напишите запрос, возвращающий имя и число указанных телефонных номеров девушек в возрасте от 18 до 22 лет.
Оптимизируйте таблицы и запрос при необходимости.

## Решение 
Так как нужно выводить имена, то групировать будет по даному полю (`users.name`). Поусловиям задачи у нас возможна ситуация когда имя будет `NULL`, в данном случаем следовало бы уточнить: "Нужно ли считать записими без имени"
```sql
SELECT u.name, count(p.phone) AS count
FROM users AS u
LEFT JOIN phone_numbers AS p ON u.id = p.user_id
WHERE u.gender = 2 AND TIMESTAMPDIFF(year, FROM_UNIXTIME(u.birth_date), NOW()) BETWEEN 18 AND 22
GROUP BY u.name
```
