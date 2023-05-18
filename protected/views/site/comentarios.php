<?php

$this->pageTitle = 'Página inicial';

$this->breadcrumbs = array(
    'Comentarios',
);
if (Yii::app()->user->isGuest) {
    
    echo "<h1>Bem-vindo(a) à minha página inicial!</h1><br>";
    echo "<h2>Faça login para acessar o blog</h2><br>";
    
} else {
    
    echo  "<div class=\"post\">
            <h1> {$post['title']} </h1>
            <h2> {$post['description']} </h2>
        </div>"; 
    
    foreach ($comments as $comment):
        echo  "<div class=\"comments\">
            <h4> {$comment} </h4>
        </div>"; 
    endforeach;

}
 
 ?>