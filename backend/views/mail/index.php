<?php

use yii\helpers\Html;
use yii\grid\GridView;



?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="mbox_toolbar clearfix">
                            <a href="#"><i class="icsw32-refresh"></i><span>Refresh</span></a>
                            <a href="#"><i class="icsw32-create-write"></i><span>Compose</span></a>
                            <a href="#"><i class="icsw32-pencil"></i><span>Answer</span></a>
                            <a href="#"><i class="icsw32-bended-arrow-right"></i><span>Forward</span></a>
                            <a href="#"><i class="icsw32-trashcan"></i><span>Delete</span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <div class="mbox_nav sidebar">
                            <ul id="pageNav">
                                <li class="current"><?= Html::a('INBOX', ['index', 'box' => 'INBOX']) ?><span class="pull-right badge badge-info">29</span></li>
                                <li><?= Html::a('Orders', ['index', 'box' => 'orders']) ?></li>
                                <li><a href="#">Sent</a></li>
                                <li><a href="#">Spam <span class="pull-right badge badge-important">6</span></a></li>
                                <li><a href="#">Trash</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <div class="w-box w-box-blue">
                            <div class="w-box-header">
                                <h4>Inbox</h4>
                                <i class="pull-right icon-mail"></i>
                            </div>
                            <div class="w-box-content">
                                <div class="mbox clearfix">
                                    <div class="mbox_content">
                                        <table id="dt_inbox" class="dataTables_full table table-striped" data-provides="rowlink">
                                            <thead>
                                                <tr>
                                                    <th class="table_checkbox"><input type="checkbox" name="select_msgs" class="select_msgs" data-tableid="dt_inbox" /></th>
                                                    <th><i class="splashy-star_empty"></i></th>
                                                    <th><i class="splashy-mail_light"></i></th>
                                                    <th>Тема</th>
                                                    <th>Отправитель</th>
                                                    <th>Дата</th>
                                                    <th>Размер</th>
                                                    <th><i class="icsw16-paperclip"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach($mails as $mail): ?>

                                            	<tr <?= $mail->seen ? false : 'class="unread"' ?>>
                                                    <td class="nolink"><input type="checkbox" name="msg_sel" class="select_msg" /></td>
                                                    <td class="nolink starSelect"><i class="splashy-star_<?= $mail->flagged ? 'full' : 'empty' ?> mbox_star"></i></td>
                                                    <td><i class="splashy-mail_light<?= $mail->seen ? '_stuffed' : false ?>"></i></td>
                                                    <td><?= Html::a($mail->subject, ['/mail/view', 'mailId' => $mail->uid]) ?></td>
                                                    <td><?= Html::encode($mail->from) ?></td>
                                                    <td><?= $mail->date ?></td>
                                                    <td><?= round($mail->size / 1000) ?> KB</td>
                                                    <td><i class="icsw16-paperclip"></i></td>
                                                </tr>
                                            <?php endforeach ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>