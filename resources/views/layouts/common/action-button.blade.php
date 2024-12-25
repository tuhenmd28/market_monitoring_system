<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 5/10/2023
 * Time: 12:10 PM
 */

$deleteRoute = route($route . 'destroy', $model->id);
?>

<div class="btn-group xd-flex xjustify-content-around">



    @if (isset($view_button) && $view_button)
        <a  class="btn-sm btn btn-light-transparent" href="{{ route($route . 'show', $model->id) }}">
            <i style="pointer-events:none" data-toggle="tooltip" title="" class="fa fa-eye" data-original-title="View"></i>
        </a>
    @endif
    @if (isset($extra_buttons))
        {!! $extra_buttons !!}
    @endif

    
    <a class="btn-sm btn btn-warning-transparent" href="{{ route($route . 'edit', $model->id) }}">
        <i data-toggle="tooltip" title="Edit Routine" class="fa fa-edit" data-original-title="Edit"></i>
    </a>
    <a  class="btn-sm btn btn-danger-transparent" onclick="deleteConfirm({{ $model->id }}, '{{ $deleteRoute }}')">
        <i style="pointer-events:none" data-toggle="tooltip" title="Delete" class="fa fa-trash-o" data-original-title="Delete"></i>
    </a>



    @if (isset($last_button))
        {!! $last_button !!}
    @endif
</div>
