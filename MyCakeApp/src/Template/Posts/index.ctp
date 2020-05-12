<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>
<nav class="large-1 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('投稿', ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="posts index large-11 medium-10 columns content">
    <h3>一覧画面</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col">チケット</th>
                <th scope="col">Pull Request</th>
                <th scope="col">内容</th>
                <th scope="col">使用ファイル</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $this->Html->link($this->Number->format($post->id), ['action' => 'view', $post->id]) ?></td>
                <td><?= $this->Html->link($post->name, $post->tiket) ?></td>
                <td><?= $this->Html->link($post->url, $post->url) ?></td>
                <td><?= $post->content ?></td>
                <td class="break-text"><?= $post->file ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
