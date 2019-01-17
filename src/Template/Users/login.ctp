<?php
    $this->assign('title', 'ログイン - お通じ記録カレンダーアプリ');
?>

<h1>ログイン</h1>

<?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login'], 'type' => 'post']) ?>
<fieldset>
    <legend><?= 'ユーザ名とパスワードを入力してください' ?></legend>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>