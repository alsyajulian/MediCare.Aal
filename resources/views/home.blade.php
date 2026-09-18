@extends('layouts.app')

@section('title', 'MediCare Hospital')

@section('content')

    @include('home.hero')
    @include('home.statistics')
    @include('home.about')
    @include('home.doctor-schedule')
    @include('home.registration')
    @include('home.departments')
    @include('home.services')
    @include('home.articles')
    @include('home.gallery')
    @include('home.contact')

@endsection