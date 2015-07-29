<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>


<h2>Каталог: </h2>


<div class="view unvisible">
    <?= $this->render('create_productform') ?>
  </div>




<?php \nterms\listjs\ListJs::begin([ 
    'search' => true,
    
    'clientOptions' => [
        'valueNames' => [
            'product',
        ],
    ],
]); ?>
<hr>

<ul class="list nav nav-list">
  <?php foreach($products as $product): ?>

  <li <?php echo $foo = ($product->id == $product_id) ? 'class="active"' : '' ?>>
    
    <a class="product" href='<?= Url::toRoute(['result', 'id' => $product->id]); ?>'>
      <i class="menu-icon fa fa-pencil-square-o"></i>
      <span class="menu-text"><?= $product->title ?></span>
      <b class="arrow fa fa-angle-down"></b>
    </a>
    
    
  </li>
    <a data-toggle="modal" data-target="#editproduct<?= $product->id ?>" class='view unvisible' href='<?= Url::toRoute(['editproduct', 'product_id' => $product->id]); ?>'><span class="glyphicon glyphicon-pencil"></span></a>
    <a class='view unvisible' href='<?= Url::toRoute(['deleteproduct', 'id' => $product->id]); ?>'><i class='ace-icon fa fa-trash-o bigger-130' onclick="return confirm('Вы уверенны?!')"></i></a>
  
  
<!-- Modal -->
    <div class="modal fade" id="editproduct<?= $product->id ?>" tabindex="-1" role="dialog" aria-labelledby="editproduct<?= $product->id ?>Label" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
         </div>
        </div>
      </div>
<!-- /Modal -->
  
  <?php endforeach; ?>
</ul>

<?php \nterms\listjs\ListJs::end(); ?>
<hr>



