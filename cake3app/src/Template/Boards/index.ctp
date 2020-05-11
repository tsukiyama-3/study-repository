<h1>Databaseサンプル</h1>
<?= $this->Form->create($entity, ['url' => ['action' => 'addRecord']]) ?>
<fieldset>
    <?= $this->Form->text("name") ?>
    <?= $this->Form->text("title") ?>
    <?= $this->Form->textarea("content") ?>
</fieldset>
<?= $this->Form->button("送信") ?>
<?= $this->Form->end() ?>

<table>
    <?php foreach ($data as $obj): ?>
    <tr>
        <td><?= $obj->id . ': ' . $obj->name . ' (' . $obj->title . ')' ?></td>
    </tr>
    <?php endforeach; ?>
</table>