@extends('layouts.skeleton')
@section('title', 'Assign Permission')
@push('styles')

@endpush
@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Assign Permission</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">



                    </div>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <form action="{{  route('admin.rolePermission',$role->id) }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Assign Permission</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                                            <label  class="form-label">Role Name <span class="text-red">*</span></label>
                                            <input readonly type="text" value="{{ $role->name }}" class="form-control" name="name"
                                                placeholder="Enter Role Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label class="form-label">All Permission Name <span class="text-red">*</span></label>
                                            <select name="permission[]" id="" class=" filter-multi" multiple>
                                                @foreach ($permissionArray as $item)

                                                    <option {{$item['status']?'selected':''  }} value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" id="submit_btn" class="btn btn-primary float-end my-5"> {{ !isset($editRole)?"Create":"Update" }}
                                </button>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <!-- End Row -->

        </div>








    </div><!-- end app-content-->

@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
<script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>
@endpush
