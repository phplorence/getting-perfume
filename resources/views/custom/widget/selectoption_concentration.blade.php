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
    <select class="form-control">
        <script>
            console.log($concentration);
        </script>
        <?php foreach ($conentrations as $conentration) : ?>
        <option>{{!! $concentraion->name }}</option>
        <?php endforeach ?>
    </select>
</div>