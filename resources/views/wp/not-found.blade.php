@extends('layouts.master')

@section('content')
    <div class="container flex justify-center items-center h-[40vh]">
        <section class="my-12 text-center">
            <h1 class="text--xl">404</h1>
            <p>Sorry, the page you are looking for could not be found.</p>
            <p><a href="{{home_url()}}" class="btn btn-red">Back to Home</a></p>
        </section>
    </div>
@endsection
