<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>


            

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
              if(count($posts) > 7 ){
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
              
                $newsItem[] = ['label' => $newscategory->header_meny, 'url' => ['site/category', 'id' => $newscategory->id]];
              
                
            }


            
            $menuItems[] = ['label' => 'Новости', 'url' => ['#'], 'items' => $newsItem];
            $menuItems[] = ['label' => 'Контакты', 'url' => ['/site/contact']];
            $menuItems[] = ['label' => 'О компании', 'url' => ['/site/about']];
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav list'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            
           
            
            NavBar::end();
        ?>

