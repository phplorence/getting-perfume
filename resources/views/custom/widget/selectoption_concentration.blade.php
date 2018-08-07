<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 8/6/2018
 * Time: 4:53 PM
 */
?>
<div class="form-group">
    <label>Nồng độ</label>
    <select name="concentration" class="form-control">
        <?php foreach ($concentrations as $concentration) : ?>
        <option value="{{ $concentration->name }}">{{ $concentration->name }}</option>
        <?php endforeach ?>
    </select>
</div>
