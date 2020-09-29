<?php
    $title = "View Posts";
?> 

@extends('layouts.app')

@section('content')

    <table class="table" style="background-color: #fff; border-radius: 2.5px;">
        <thead>
            <th style="text-align: center;">
                Thumbnail
            </th>
            <th style="text-align: center;">
                Title
            </th>
            <th style="text-align: center;">
                Category
            </th>
            <th style="text-align: center;">
                Action
            </th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <tr>
                        <td style="text-align: center;">
                            <img data-src="{{ asset($post->featured) }}" alt="{{$post->slug}}" height="75" width="auto" style="border-radius: 2.5px;" class="lozad">
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{$post->title}}<br/>
                            Tag(s):
                                @if(count($post->tags) > 0)
                                    @foreach($post->tags as $tag)
                                        @if(!$loop->last)
                                            {{$tag->tag}},
                                        @else
                                            {{$tag->tag}}
                                        @endif
                                    @endforeach
                                @endif
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{$post->category->name}}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="{{ route('post.edit', ['slug' => $post->slug]) }}" class="btn btn-info btn-xs">Edit</a>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs" onclick="if (!confirm('Are you sure?')) event.preventDefault();">Trash</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center;">
                        No published post.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div align="center">
        {{ $posts->links() }}
    </div>

@stop
