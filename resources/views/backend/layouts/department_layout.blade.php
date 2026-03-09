@extends('backend.layouts.master')

@section('title', $title ?? 'Department - Admin')

@section('contents')
    @yield('department_content')
@endsection
