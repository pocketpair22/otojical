<?php
    $this->assign('title', 'お通じ記録カレンダーアプリ');
?>

<h2>お通じの記録をつけるアプリケーションです。</h2>

<h3>使い方</h3>

<p>ユーザーでない方は新規登録を行ってください。</p>
<p>ログインするとお通じの記録、記録の確認、つけた記録の編集を行うことが出来ます。</p>
<p>「今出た！」ボタンを押すと現在の時刻でお通じの記録をつけることが出来ます。</p>
<p>「前出た！」ボタンを押すと日付と時刻を指定して以前のお通じの記録をつけることが出来ます。</p>
<p>カレンダーの日付をクリックすると各記録の詳細ページに飛びます。</p>
<p>詳細ページから、時刻・メモの編集を行うことが出来ます。</p>

<?php if ($this->request->getSession()->read('Auth.User.id')): ?>
<?php
    echo $this->Html->link('カレンダー',[
        'controller' => 'Posts',
        'action' => 'poststable',
    ], array('class' => 'index-parts1'));
?>

<?php else: ?>
<?php
    echo $this->Html->link('新規登録',[
        'controller' => 'Users',
        'action' => 'add',
    ], array('class' => 'index-parts1'));
    echo $this->Html->link('ログイン',[
        'controller' => 'Users',
        'action' => 'login',
    ], array('class' => 'index-parts2'));
?>

<?php endif; ?>