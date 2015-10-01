<?php

use yii\helpers\Html;

$mailIds = $mailbox->searchMailBox('ALL');

?>




<?php foreach($mailIds as $mailId): ?>


    <?php $mail = $mailbox->getMail($mailId); ?>

    
    От: <?= $mail->fromName ?> "<?= $mail->fromAddress ?>"<br>
    Тема: <?= $mail->subject ?>
    <?= Html::a('Перейти', ['view', 'mailId' => $mailId]) ?>
    <hr>
<?php endforeach ?>