<h1>サンプル見出し</h1>
<p>
    <?= $result; ?>
</p>
<?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'index']]) ?>
    <?= $this->Form->checkbox('HelloForm.check1', ['checked' => true]) ?>
    <?= $this->Form->label('HelloForm.check1') ?>
    <?= $this->Form->submit("送信") ?>
<?= $this->Form->end(); ?>