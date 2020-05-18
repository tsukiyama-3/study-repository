<h1>Peopleサンプル</h1>
<?php foreach ($data as $obj): ?>
    <pre><?php print_r($obj->toArray()) ?></pre>
<?php endforeach; ?>