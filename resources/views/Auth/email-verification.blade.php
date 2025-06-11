@extends('layout.default')
@section('title', 'Email Verification')
@section('content')
    <!-- Header -->
    @include("layout.caseowner.header_before")
    <section class="bg-gray-100 text-gray-800">
        <div class="min-h-screen flex items-center justify-center">
            <div class="relative w-full h-screen">
                <img src="{{ asset('image/verificationpage.png') }}" alt="Verification Page"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    @include('layout.footer')

@endsection
