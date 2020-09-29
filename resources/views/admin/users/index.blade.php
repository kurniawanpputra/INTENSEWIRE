<?php
    $title = "View Users";
?> 

@extends('layouts.app')

@section('content')

    <table class="table" style="background-color: #fff; border-radius: 2.5px; overflow-x: auto;">
        <thead>
            <th style="text-align: center;">
                Picture
            </th>
            <th style="text-align: center;">
                Name
            </th>
            <th style="text-align: center;">
                Action
            </th>
        </thead>

        <tbody>
            @if($users->count() > 0)
                @foreach($users as $user)
                    <tr>
                        <td style="text-align: center;">
                            <img data-src="{{ asset($user->profile->avatar) }}" alt="{{ strtolower($user->name) }}-profile-picture" height="75" width="auto" style="border-radius: 2.5px;" class="lozad">
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($user->admin)
                                {{$user->name}}<br/>(Super Admin)
                            @else
                                {{$user->name}}<br/>(Admin)
                            @endif
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($user->admin)
                                @if($user->id != Auth::user()->id)
                                    <a href="{{ route('user.removeadmin', ['id' => $user->id]) }}" class="btn btn-warning btn-xs">Basic Admin</a>
                                @else
                                    <a class="btn btn-default btn-xs" disabled>Basic Admin</a>
                                @endif
                            @else
                                <a href="{{ route('user.makeadmin', ['id' => $user->id]) }}" class="btn btn-primary btn-xs">Super Admin</a>
                            @endif
                        
                            @if($user->id != Auth::user()->id)
                                <a href="{{ route('user.remove', ['id' => $user->id]) }}" class="btn btn-danger btn-xs" onclick="if (!confirm('Are you sure?')) event.preventDefault();">Remove</a>
                            @else
                                <a class="btn btn-default btn-xs" disabled>Remove</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center;">
                        No user(s) available.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div align="center">
        {{ $users->links() }}
    </div>

@stop


