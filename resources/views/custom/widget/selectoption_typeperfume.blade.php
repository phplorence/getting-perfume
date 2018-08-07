<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 8/6/2018
 * Time: 4:53 PM
 */
?>
<div class="form-group">
    <label>Loại sản phẩm (Nhãn hiệu)</label>
    <select name="typeperfume" class="form-control">
        <?php foreach ($typeperfumes as $typeperfume) : ?>
            <option value="{{ $typeperfume->name }}">{{ $typeperfume->name }}</option>
        <?php endforeach ?>
    </select>
</div>