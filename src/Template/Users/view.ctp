<?php
    $this->assign('title', 'ユーザー情報 - お通じ記録カレンダーアプリ');
?>

<h1><?= $this->request->getSession()->read('Auth.User.name').'さんのページ' ?></h1>

<?php
    echo $this->Html->link('退会',[
        'controller' => 'Users',
        'action' => 'delete',
    ], array('class' => 'delete-link'));
?>