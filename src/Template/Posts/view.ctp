<?php
    $this->assign('title', h($post->date_time->format('Y年 m月d日 H:i')).' - お通じ記録カレンダーアプリ');
?>

<h1>
    <?= h($post->date_time->format('Y年 m月d日 H:i')) ?>
</h1>

<?php if ($post->memo): ?>
<h2 class="memo-title">memo</h2>
<p class="memo"><?= h($post->memo) ?></p>
<?php endif; ?>

<?= $this->Html->link('編集', ['action'=>'edit', $post->id], array('class' => 'index-parts1')) ?>
<?=
    $this->Form->postLink(
        '削除',
        ['action' => 'delete', $post->id],
        ['confirm' => 'この投稿を削除してもよろしいですか？', 'class' => 'index-parts2']
    );
?>