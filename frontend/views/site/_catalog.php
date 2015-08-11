<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>

<div class='container'>
<div class='row'>
<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style='margin-left: -30px'>
<div>
<?php
            NavBar::begin([
                'options' => [
                    'class' => 'nav nav__primary clearfix',
                ],
            ]);
            $menuItems[] = ['label' => 'Главная', 'url' => ['/site/index']];
            //$menuItems[] = ['label' => '1design', 'url' => ['#']];
            foreach($categories->where(['type' => 'post'])->all() as $category){
              $posts = $category->getPosts()->where(['active' => true])->all();
              if(count($posts) > 5 ){
                $postItem[] = ['label' => '<input class="searchlist" >'];
              }
              
              foreach($posts as $post){
                $postItem[] = ['label' => $post->header_meny, 'url' => ['site/post', 'alias' => $post->alias], 'options' => ['class' => 'post']];
              }
                if(isset($postItem)){
                $menuItems[] =  ['label' => $category->header_meny, 'url' => ['site/category', 'id' => $category->id], 'items' => $postItem];
                unset($postItem);
                }else{
                  $menuItems[] =  ['label' => $category->header_meny, 'url' => ['site/category', 'id' => $category->id]];
                }
                
            }

            foreach($categories->where(['type' => 'news'])->all() as $newscategory){
              
                $newsItem[] = ['label' => $newscategory->header_meny, 'url' => ['site/category', 'id' => $newscategory->id], 'options' => ['class' => 'dropitem']];
              
                
            }


            
            $menuItems[] = ['label' => 'Новости', 'url' => ['#'], 'items' => $newsItem];
            $menuItems[] = ['label' => 'Контакты', 'url' => ['/site/contact']];
            $menuItems[] = ['label' => 'О компании', 'url' => ['/site/about']];
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav list navbar-collapse'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            
           
            
            NavBar::end();
        ?>
</div>
</div>
</div>
</div>