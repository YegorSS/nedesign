<?php



$mailbox = yii::$app->imap->connection;

$mailIds = $mailbox->searchMailBox('ALL');

// Prints all Mail ids.
foreach($mailIds as $mailId)
{
    // Returns Mail contents
    $mail = $mailbox->getMail($mailId); 

    // Returns mail attachements if any or else empty array
    $attachment = $mail->getAttachments();

echo $mail->textHtml ? $mail->textHtml : $mail->textPlain;

echo '<hr>';
}
