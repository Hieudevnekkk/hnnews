@extends('admin.layouts.master')

@section('title')
    Trang quản trị
@endsection

@section('content')
    @if (\Auth::user())
        <h3 class="mt-4"> Chào mừng, {{ \Auth::user()->name }} đến với trang quản trị!</h1>
    @endif
@endsection
