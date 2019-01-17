<?php
    $this->assign('title', '新規登録 - お通じ記録カレンダーアプリ');
?>

<h1>新規登録</h1>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= 'ユーザ名とパスワードを入力してください' ?></legend>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button('登録') ?>
<?= $this->Form->end() ?>