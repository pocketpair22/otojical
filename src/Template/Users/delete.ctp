<?php
    $this->assign('title', '退会 - お通じ記録カレンダーアプリ');
?>

<p><?= $this->request->getSession()->read('Auth.User.name') ?>さんのユーザー情報を削除します。</p>
<p>一度削除すると復帰させることはできません。</p>
<p>よろしければ退会ボタンをクリックしてください。</p>

<div class="center">
    <?= $this->Form->create('null', array('type' => 'delete')) ?>
    <?= $this->Form->button('退会', array('class' => 'button')) ?>
    <?= $this->Form->end() ?>
</div>
