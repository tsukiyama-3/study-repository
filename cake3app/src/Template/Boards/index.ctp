<h1>Databaseサンプル</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>TITLE</th>
            <th>CONTENT</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $obj): ?>
            <tr>
                <td><?= $obj->id ?></td>
                <td><?= h($obj->name) ?></td>
                <td><?= h($obj->title) ?></td>
                <td><?= h($obj->content) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>