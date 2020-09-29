<?php
    $title = "Dashboard";
?> 

@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <div align="center">
                <img data-src="{{ asset(Auth::user()->profile->avatar) }}" alt="{{ strtolower(Auth::user()->name) }}-profile-picture" id="profile" class="lozad">
                <br/>
                You are logged in as <b>{{Auth::user()->name}}</b>
                <br/>
                Not you?
                
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Change account
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <br/>

            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        Published Posts
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$post_count}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">
                        Trashed Posts
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$trash_count}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        Total Admins
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$user_count}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        All Categories
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$category_count}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop
