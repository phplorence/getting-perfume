<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 8/6/2018
 * Time: 4:53 PM
 */
?>
<div class="form-group">
    <label>Nhóm hương<span style="color:red;">(*)</span></label>
    <select class="form-control select2" multiple="multiple"
            style="width: 100%;">
        <?php foreach ($incenses as $incense) : ?>
        <option>{{ $incense->name }}</option>
        <?php endforeach ?>
    </select>
</div>

