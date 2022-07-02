<?php

include 'Simple/Interface/ArticleInterface.php';
include 'Simple/Interface/AuthorInterface.php';
include 'Simple/Interface/UserInterface.php';
include 'Simple/Class/Article.php';
include 'Simple/Class/User.php';

use Simple\Class\User;

$User100 = new User(100);
$User200 = new User(200);

$post1 = $User100->createArticle();
$post2 = $User100->createArticle();
$post3 = $User100->createArticle();
$post4 = $User100->createArticle();
$post5 = $User100->createArticle();
$post6 = $User200->createArticle();
$post7 = $User200->createArticle();

$post2->changeAuthor($User200);

var_dump($User100->getArticleList());
var_dump($User200->getArticleList());
