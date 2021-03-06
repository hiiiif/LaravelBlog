@extends('layouts.users')

@section('title'){{$user->name}}的最新动态 - @parent @stop

@section('container')
    @include('users._rightnav')
    <div class="panel-body remove-pd-h">
        @if(count($notifications))
            <div class="alert alert-info text-center clearfix">
                消息 && 通知
            </div>
            <ul class="list-group">
                {{-- */$i = 1;/* --}}
                @foreach($notifications as $notification)
                    <li class="list-group-item clearfix notification @if($i <= $count)bg-grey @endif @if($notification->is_system) text-{{ $notification->type }} @endif" data-id="{{ $notification->id }}">
                        <i class="fa fa-fw @if($notification->type == 'article') fa-file-o @elseif($notification->type == 'comment') fa-comment-o @elseif($notification->type == 'like') fa-thumbs-o-up @elseif($notification->type == 'collect') fa-bookmark-o @elseif($notification->type == 'info') fa-volume-up text-info @elseif($notification->type == 'warning') fa-info-circle text-warning @elseif($notification->type == 'danger') fa-warning text-danger @elseif($notification->type == 'follow') fa-user-plus @elseif($notification->type == 'unfollow') fa-user-times @else fa-bell-o @endif"></i> {!! $notification->body !!}
                        <span class="pull-right">
                            <i class="fa fa-calendar"></i> {{ $notification->created_at->diffForHumans() }}
                        </span>
                    </li>
                    {{-- */$i++;/* --}}
                @endforeach
                {!! $notifications->render() !!}
            </ul>
        @else
            <div class="alert alert-warning text-center">
                暂无消息 && 通知
            </div>
        @endif
    </div>
@stop