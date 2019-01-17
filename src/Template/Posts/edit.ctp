<?php
    $this->assign('title', '編集 - お通じ記録カレンダーアプリ');
?>

<h1>編集</h1>

<?php
    $this->Form->templates([
        'dateWidget' => '{{year}} 年 {{month}} 月 {{day}} 日 {{hour}} : {{minute}}',
    ]);
?>

<?= $this->Form->create($post) ?>
<?= $this->Form->input('date_time', array('label' => '日付', 'monthNames' => false)) ?>
<?= $this->Form->input('memo', array('label' => 'メモ', 'rows' => '3')) ?>
<?= $this->Form->button('編集') ?>
<?= $this->Form->end() ?>