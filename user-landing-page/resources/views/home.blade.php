@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    @include('layouts.header')

  
    {{-- About Section --}}
    @include('sections.about')

    {{-- Services Section --}}
    @include('sections.service')

    {{-- Portfolio Section --}}
    @include('sections.portfolio')

    {{-- Team Section --}}
    @include('sections.team')

    {{-- Blog Section --}}
    @include('sections.blog')

    @include('layouts.footer')
@endsection
