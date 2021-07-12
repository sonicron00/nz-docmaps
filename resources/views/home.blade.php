<!DOCTYPE html>
@extends('layouts.master')
@section('content')
    <p>This is my body content.</p>
    <img src="{{URL::asset('/images/trek.jpeg')}}" style="height: fit-content; opacity: 0.5;">
    @stop