@extends('layouts.master')

@section('navbar')

@stop

@section('content')

    <div class="row" style="margin-top: 200px">
        
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <form class="form-horizontal" role="form" method="POST">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group" style="text-align: center">
                    <div class="col-sm-12">
                      <input type="email" name="email" class="form-control login-form-up" id="email" placeholder="Email">
                    </div>
                    <div class="col-sm-12">
                      <input type="password" name="password" class="form-control login-form-center" id="password" placeholder="Password">
                    </div>
                    <div class="col-sm-12">
                      <input type="password" name="password_confirmation" class="form-control login-form-down" id="password" placeholder="Repeat password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6" style="text-align: right"><button type="submit" class="btn btn-primary btn-sm">Register</button></div>
                </div>
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>

@stop