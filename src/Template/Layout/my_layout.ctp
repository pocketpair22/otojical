<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?></title> <!-- fetch()はviewから値を受け取る関数 -->
    <?= $this->Html->css('styles.css') ?>
</head>
<body>
    <?= $this->element('my_header') ?>
    <?= $this->Flash->render() ?>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
