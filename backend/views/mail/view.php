<?php

use yii\helpers\Html;

?>

<?= $mail->textHtml ? $mail->textHtml : $mail->textPlain ?>

<hr> 
<p>Вложенные файлы:</p>

<?php foreach($mail->getAttachments() as $file): ?>

<?= in_array(substr($file->name, -4, 4), ['.jpg','.gif','.png']) ? Html::img('@web/uploads/mail/'.$mail->id .'_'. $file->name). '<br>' : $file->name; ?>

<?php endforeach ?>