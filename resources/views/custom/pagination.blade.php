<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 4/29/2018
 * Time: 8:09 PM
 */
?>
@if ($paginator->lastPage() > 1)
    <a href="{{ $paginator->url(1) }}"><button type="button" class="btn btn-default btn-sm" {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}><i class="fa fa-chevron-left"></i></button></a>
    <a href="{{ $paginator->url($paginator->currentPage()+1) }}"><button type="button" class="btn btn-default btn-sm" {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}><i class="fa fa-chevron-right"></i></button></a>
@endif
