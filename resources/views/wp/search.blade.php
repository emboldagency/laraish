@php $query = get_search_query(); @endphp

@extends('layouts.master')
@section('title', 'Search results for "' . $query . '"')

@section('content')
    <div class="container">
        @if ($query && have_posts())
            <h1 class="py-4 text-lg italic font-extrabold leading-relaxed lg:text-4xl">Search results for <span>"{{ $query }}"</span></h1>
            <x-post-list :posts="$posts" />
        @else
            <h1>No results found for <span>"{{ $query }}"</span></h1>
        @endif

        @if (!$query || !have_posts())
        <form action="/" method="get" class="relative w-full overflow-hidden bg-white rounded-full">
            <div class="w-full pr-28">
            <input
                type="search"
                name="s"
                value=""
                placeholder="What are you looking for?"
                class="w-full px-4 py-2 rounded-full border-1 border-grey-400"
            />
            </div>
            <button type="submit" class="btn">
            Search
            </button>
        </form>
        @endif
    </div>
@endsection