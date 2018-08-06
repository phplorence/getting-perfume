<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 8/6/2018
 * Time: 4:53 PM
 */
?>
<div class="form-group">
    <label>Nhà pha chế</label>
    <select class="form-control">
        <?php foreach ($authors as $author) : ?>
        <option>{{ $author->name }}</option>
        <?php endforeach ?>
    </select>
</div>
