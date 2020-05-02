<h1>サンプル見出し</h1>
<p>
    <?= $result; ?>
</p>
<?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'index']]) ?>
    <?= $this->Form->radio('HelloForm.radio1',
    [
        ['text' => 'ウィンドウズ', 'value' => 'Windows'],
        ['text' => 'リナックス', 'value' => 'Linux'],
        ['text' => 'マックOS', 'value' => 'macOS'],
    ],
    ['label' => true, 'value' => 'Linux']) ?>
    <?= $this->Form->submit("送信") ?>
<?= $this->Form->end(); ?>