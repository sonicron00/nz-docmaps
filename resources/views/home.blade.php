<!DOCTYPE html>
@extends('layouts.master')
@section('content')
    <img src="{{URL::asset('/images/trek.jpeg')}}" style="height: fit-content; opacity: 0.5;">

    <div id="app">
       <example-component></example-component>
    </div>
@endsection