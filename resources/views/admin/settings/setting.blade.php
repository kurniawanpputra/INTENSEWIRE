<?php
    $title = "Edit Profile";
?> 

@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Settings
        </div>
        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" class="form-control" name="name" value="{{$setting->site_name}}">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" name="address" value="{{$setting->address}}">
                </div>
                <div class="form-group">
                    <label for="name">Contact Number</label>
                    <input type="text" class="form-control" name="phone" value="{{$setting->contact_number}}">
                </div>
                <div class="form-group">
                    <label for="name">Contact Email</label>
                    <input type="email" class="form-control" name="email" value="{{$setting->contact_email}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
