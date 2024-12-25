<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 5/10/2023
 * Time: 12:10 PM
 */

$deleteRoute = route($route.'destroy', $model->id);
if(isset($active_button) && $active_button){
    $changeStatusRoute = route($route.'active_inactive', $model->id);

}

if(isset($leave_button) && $leave_button){
    $leaveStatusRoute = route($route.'leave_status_change', $model->id);
}

?>
<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    @if(isset($extra_buttons))
            {!! $extra_buttons !!}
    @endif


    @if(isset($active_button) && $active_button)

            <a  href="#" class="dropdown-item {{$model->status == 1? 'text-danger': ''}}" onclick="statusConfirm({{$model->id}},'{{$changeStatusRoute}}')"  ><i class="fa fa-toggle-off me-1 font-weight-bold p-2 pb-3"></i>{{$model->status == 1? "Inactive" : "Active"}}</a>
    @endif
    @if(isset($view_button) && $view_button)
            <a class="dropdown-item" href="{{ route($route."show", $model->id) }}" ><i class="fa fa-eye me-1 font-weight-bold p-2"></i>View</a>
    @endif

    @if(isset($show_edit) && $show_edit)
        <a style="padding: 0.30rem auto !important" class="dropdown-item" href="{{ route($route."edit", $model->id) }}" ><i class="fa fa-pencil me-1 font-weight-bold p-2"></i> Edit</a>
    @endif

    @if(isset($show_delete) && $show_delete)
        <a class="dropdown-item" href="#" onclick="deleteConfirm({{$model->id}}, '{{$deleteRoute}}')"><i class="fa fa-trash me-1 font-weight-bold p-2 pb-3"></i> Delete</a>
    @endif

    @if(isset($last_button))
        {!! $last_button !!}
    @endif

    {{-- @if(isset($leave_button) && $leave_button)

    <a class="dropdown-item {{$model->status == 'submitted'? "text-success" : ''}}" onclick="leaveApproved({{$model->id}},'{{$leaveStatusRoute}}','{{$model->student->full_name}}')" href="#" ><i class="fa fa-toggle-off me-1 font-weight-bold p-2"></i>Approved</a>
@endif --}}

</div>
