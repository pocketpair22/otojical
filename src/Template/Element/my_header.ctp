<header>
    <h1 class="header-title">お通じ記録カレンダーアプリ</h1>

    <div class="header-link">
        <?php if ($this->request->getSession()->read('Auth.User.id')): ?>
            <p class="header-link-parts"><?php echo 'ログイン中:'.$this->request->getSession()->read('Auth.User.name').'さん' ?></p>
            <?php
            echo $this->Html->link('トップ',[
                'controller' => 'Posts',
                'action' => 'index',
            ],array('class' => 'header-link-parts'));
            echo $this->Html->link('カレンダー',[
                'controller' => 'Posts',
                'action' => 'poststable',
            ],array('class' => 'header-link-parts'));
            echo $this->Html->link('ユーザー情報',[
                'controller' => 'Users',
                'action' => 'view',
            ],array('class' => 'header-link-parts'));
            echo $this->Html->link('ログアウト',[
                'controller' => 'Users',
                'action' => 'logout',
            ],array('class' => 'header-link-parts'));
            ?>

        <?php else: ?>
            <?php
            echo $this->Html->link('トップ',[
                'controller' => 'Posts',
                'action' => 'index',
            ],array('class' => 'header-link-parts'));
            echo $this->Html->link('新規登録',[
                'controller' => 'Users',
                'action' => 'add',
            ],array('class' => 'header-link-parts'));
            echo $this->Html->link('ログイン',[
                'controller' => 'Users',
                'action' => 'login',
            ],array('class' => 'header-link-parts'));
            ?>
        <?php endif; ?>
    </div>
</header>