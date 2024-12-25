<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 5/10/2023
 * Time: 12:06 PM
 */
$pageName = ucfirst(str_replace("_",' ',str_replace('-', " ", $name)));
?>
@extends('layouts.skeleton')
@section('title', $pageName)

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">{{ $pageName }}</div>
                </div>
                <div class="page-rightheader ms-md-auto">

                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">

                                <div class="card-header border-bottom-0">
                                    <h3 class="card-title">{{ $pageName }}</h3>
                                </div>

                                <div class="card-body">
                                    <h1 class="card-title">Coming Soon ...... </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>

    </div><!-- end app-content-->

@endsection
