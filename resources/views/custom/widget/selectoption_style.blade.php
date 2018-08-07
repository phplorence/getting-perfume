<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 8/6/2018
 * Time: 4:53 PM
 */
?>
<div class="form-group">
    <label>Phong cách<span style="color:red;">(*)</span></label>
    <select name="style" id="style" class="form-control select2" multiple="multiple"
            style="width: 100%;">
        <?php foreach ($styles as $style) : ?>
        <option>{{ $style->name }}</option>
        <?php endforeach ?>
    </select>
</div>
