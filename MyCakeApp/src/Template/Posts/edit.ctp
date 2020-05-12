<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                '削除',
                ['action' => 'delete', $post->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
            )
        ?></li>
        <li><?= $this->Html->link('一覧画面', ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend>編集画面</legend>
        <?php
            echo $this->Form->control('name', [
                'label' => "チケット名",
                'type' => 'text'
            ]);
            echo $this->Form->control('tiket', [
                'label' => "チケットURL",
                'type' => 'text'
            ]);
            echo $this->Form->control('url', [
                'label' => 'Pull Request',
                'type' => 'text'
            ]);
            echo $this->Form->control('content', [
                'label' => '内容',
                'type' => 'textarea'
            ]);
            echo $this->Form->control('file', [
                'label' => '編集ファイル',
                'type' => 'textarea',
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button('送信') ?>
    <?= $this->Form->end() ?>
</div>
