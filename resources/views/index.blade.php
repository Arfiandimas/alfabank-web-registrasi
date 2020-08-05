@extends('layouts.master')
@section('konten')

  @include('components/header')
  @include('components/hero')
  <main id="main">
    @include('components/about')
    @include('components/service')
    @include('components/feature')
    @include('components/register')
    @include('components/portfolio')
    @include('components/pricing')
    @include('components/faq')
    @include('components/team')
    @include('components/contact')



  </main><!-- End #main -->
  @include('components/footer')
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

@endsection