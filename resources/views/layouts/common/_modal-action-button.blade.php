<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 5/10/2023
 * Time: 12:10 PM
 */


?>

<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    @if(isset($extra_buttons))
                {!! $extra_buttons !!}
    @endif

    @if(isset($show_edit) && $show_edit)
        <a class="dropdown-item edit-subject" href="#"  onclick="edit(this,{{$model->id}},{{auth()->user()->user_type}})" ><i class="fa fa-pencil"></i> Edit</a>
    @endif

    @if(isset($show_delete) && $show_delete)
        <a class="dropdown-item" href="#" onclick="delete_item({{$model->id}})">
            <i class="fa fa-trash"></i> Delete</a>
    @endif

</div>
