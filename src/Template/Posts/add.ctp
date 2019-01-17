<?php
    $this->assign('title', '前出た！ - お通じ記録カレンダーアプリ');
?>

<h1>前出た！</h1>

<?php
    $this->Form->templates([
        'dateWidget' => '{{year}} 年 {{month}} 月 {{day}} 日 {{hour}} : {{minute}}',
    ]);
?>

<?= $this->Form->create($newPost) ?>
<?= $this->Form->input('date_time', array('label' => '日付', 'monthNames' => false, 'error' => false)) ?>
<?= $this->Form->input('memo', array('label' => 'メモ', 'rows' => '3')) ?>
<?= $this->Form->button('投稿') ?>
<?= $this->Form->end() ?>