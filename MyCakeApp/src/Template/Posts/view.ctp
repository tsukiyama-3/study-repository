<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('編集画面', ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink('削除画面', ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link('一覧画面', ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link('投稿画面', ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posts view large-9 medium-8 columns content">
    <h3><?= h($post->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($post->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4>チケット名</h4>
        <?= $this->Text->autoParagraph(h($post->name)); ?>
    </div>
    <div class="row">
        <h4>チケットURL</h4>
        <?= $this->Text->autoParagraph(h($post->tiket)); ?>
    </div>
    <div class="row">
        <h4>Pull Request</h4>
        <?= $this->Text->autoParagraph(h($post->url)); ?>
    </div>
    <div class="row">
        <h4>内容</h4>
        <?= $this->Text->autoParagraph(h($post->content)); ?>
    </div>
    <div class="row">
        <h4>編集ファイル</h4>
        <?= $this->Text->autoParagraph(h($post->file)); ?>
    </div>
</div>
