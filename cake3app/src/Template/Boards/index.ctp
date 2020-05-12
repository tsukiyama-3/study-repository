<style>
.error { color: red; font-size: smaller; font-weight: bold;}
</style>
<h1>Databaseサンプル</h1>
<?= $this->Form->create($entity, ['url' => ['action' => 'addRecord']]) ?>
<fieldset>
    <div class="error"><?= $this->Form->error('name') ?></div>
    <?= $this->Form->text('name', ['type' =>'text']) ?>
    <div class="error"><?= $this->Form->error('title') ?></div>
    <?= $this->Form->text('title', ['type' => 'text']) ?>
    <div class="error"><?= $this->Form->error('content') ?></div>
    <?= $this->Form->textarea('content') ?>
</fieldset>
<?= $this->Form->button("送信") ?>
<?= $this->Form->end() ?>

<table>
    <?php foreach ($data as $obj): ?>
    <tr>
        <td><?= $obj ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
    var nameElement = document.querySelector('#name');
    nameElement.addEventListener('invalid', function(e) {
        if (nameElement.validity.valueMissing) {
            e.target.setCustomValidity("入力してね。");
        } else if (!nameElement.validity.valid) {
        }
    }, false);
</script>