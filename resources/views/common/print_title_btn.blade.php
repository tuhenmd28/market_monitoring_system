<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 9/21/2019
 * Time: 2:31 PM
 */
?>

<div class="box-header with-border px-5">
    <a href="{{ route(Route::current()->getName()) == $full_url ? $full_url."?" : $full_url."&" }}type=print" class="btn btn-primary  btn-sm  pull-right " id="btn-print"> <i class="fa fa-print"></i> Print </a>
{{--    <a href="{{ route(Route::current()->getName()) == $full_url ? $full_url."?" : $full_url."&" }}type=download" class="btn btn-success  pull-right  btn-sm"> <i class="fa fa-download"></i> Download </a>--}}
</div>
