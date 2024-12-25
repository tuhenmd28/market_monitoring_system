<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 5/10/2023
 * Time: 12:10 PM
 */

$deleteRoute = route($route.'destroy', $model->return_code);
?>
<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
    @if(isset($extra_buttons))
            {!! $extra_buttons !!}
    @endif

    @if(isset($view_button) && $view_button)
            <a class="dropdown-item" href="{{ route($route."show", $model->return_code) }}" ><i class="fa fa-eye"></i> View</a>
    @endif

    <a class="dropdown-item" href="{{ route($route."edit", $model->return_code) }}" ><i class="fa fa-pencil"></i> Edit</a>

    <a class="dropdown-item" href="#" onclick="deleteConfirm({{$model->id}}, '{{$deleteRoute}}')"><i class="fa fa-trash"></i> Delete</a>

    @if(isset($last_button))
        {!! $last_button !!}
    @endif


</div>
