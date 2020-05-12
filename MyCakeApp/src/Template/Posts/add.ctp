<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('一覧画面', ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= '投稿画面' ?></legend>
        <?php
            echo 'チケット' . $this->Form->text('name');
            echo 'チケットURL' . $this->Form->text('tiket');
            echo 'Pull Request' . $this->Form->text('url');
            echo '編集ファイル' . $this->Form->text('file');
            echo '内容' . $this->Form->textarea('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
