<h1>Databaseサンプル</h1>
<?= $this->Form->create($entity) ?>
<fieldset>
    <?= $this->Form->text("input") ?>
</fieldset>
<?= $this->Form->button("送信") ?>
<?= $this->Form->end() ?>

<table>
    <?php foreach ($data as $obj): ?>
    <tr>
        <td><?= print_r($obj) ?></td>
    </tr>
    <?php endforeach; ?>
</table>