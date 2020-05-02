<h1>サンプル見出し</h1>
<p>
    <?= $result; ?>
</p>
<?= $this->Form->create(null, ['type' => 'post', 'url' => ['controller' => 'Hello', 'action' => 'index']]) ?>
    <?= $this->Form->text("HelloForm.text1") ?>
    <?= $this->Form->submit("送信") ?>
<?= $this->Form->end(); ?>