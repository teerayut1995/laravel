@extends('layouts.master')

@section('title', $category->category_name_th)

@section('style')
@endsection

@section('content')
<h1>{{$category->id}}</h1>
@endsection

@section('script')
@endsection