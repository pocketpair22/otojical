<?php
    $this->assign('title', 'カレンダー - お通じ記録カレンダーアプリ');
?>

<h1 class="table-date"><?= h(date('Y年 m月', $date)) ?></h2>

<?php
    
    echo $this->Html->link('<-',[
        'controller' => 'Posts',
        'action' => 'poststable',
        'date' => strtotime('-1 month', $date)
    ], array('class' => 'last-month'));

    echo $this->Html->link('->',[
        'controller' => 'Posts',
        'action' => 'poststable',
        'date' => strtotime('+1 month', $date)
    ], array('class' => 'next-month'));
?>
<br>
<br>
<table>
    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>

    <tr>
    <?php $cnt = 0 ?>
    <?php foreach ($calendar as $key => $value): ?>

        <td class="calender">
        <?php $cnt++ ?>
        <?= $value['day'] ?>

        <ul>
            <?php foreach ($posts as $post): ?>
                <?php if (intval(substr($post['date_time'], 8, 2)) == $value['day']): ?>
                    <li><?= $this->Html->link(h(substr($post['date_time'], 11, 5)), ['action'=>'view', $post['id']]) ?></li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>

        </td>

    <?php if ($cnt == 7): ?>
    </tr>
    <tr>
    <?php $cnt = 0 ?>
    <?php endif ?>
    <?php endforeach ?>
    </tr>
</table>

<div class="post-buttons">
    <?= $this->Form->create($newPost, array('url' => array('action' => 'add'), 'type' => 'post')) ?>
    <?= $this->Form->hidden('date_time', ['value' => date('Y-m-d H:i:s')]) ?>
    <?= $this->Form->button('今出た！', array('class' => 'button1')) ?>
    <?= $this->Form->end() ?>

    <?= $this->Form->create($newPost, array('url' => array('action' => 'add'), 'type' => 'get')) ?>
    <?= $this->Form->button('前出た！', array('class' => 'button2')) ?>
    <?= $this->Form->end() ?>
</div>