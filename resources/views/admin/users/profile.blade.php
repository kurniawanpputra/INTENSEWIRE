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
            Edit Profile
        </div>

        <div class="panel-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <label for="name">E-Mail</label>
                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="name">Picture</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
                <div class="form-group">
                    <label for="name">Facebook</label>
                    <input type="text" class="form-control" name="fb" value="{{Auth::user()->profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="name">Youtube</label>
                    <input type="text" class="form-control" name="yt" value="{{Auth::user()->profile->youtube}}">
                </div>
                <div class="form-group">
                    <label for="name">About</label>
                    <textarea name="about" cols="6" rows="6" class="form-control">{{Auth::user()->profile->about}}</textarea>
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
