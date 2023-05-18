<?php

$this->pageTitle = 'Página inicial';

$this->breadcrumbs = array(
    'Início',
);
if (Yii::app()->user->isGuest) {
    
    echo "<h1>Bem-vindo(a) à minha página inicial!</h1><br>";
    echo "<h2>Faça login para acessar o blog</h2><br>";
    
} else {
    
    echo "<h1>Bem-vindo(a) à minha página inicial!</h1><br>";

    
    foreach ($posts as $post):
    $url = Yii::app()->createUrl('site/comments',array('id'=>$post['id']));
    echo  "<div class=\"post\">
            <h2> {$post['title']} </h2>
            <h4> {$post['description']} </h4>
        </div>";
    echo  "<div class=\"comment\">
        <h5><a href=\"{$url}\"> comentarios </a></h5>
    </div>";
    endforeach; 

    $url_newPost = Yii::app()->createUrl('site/post',array('id'=>$post['id']));
    echo  "<div class=\"new\">
    <h5><a class=\"btn btn-primary\" href=\"{$url_newPost}\"> <button>Novo Post</button> </a></h5>
    </div>"; 

}
 
 ?>