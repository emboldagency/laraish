@extends('layouts.master')

@section('content')
    <header class="relative bg-center bg-no-repeat bg-cover post-header" @if($post->thumbnail) style="background-image: url('{{ $post->thumbnail->url }}');" @endif>
    <div class="absolute inset-0" style="background-color: #000; opacity: .6"></div>

    </header>
    <div style="background-image: url('{{ public_url('images/asphalt-texture.png') }}');">
        <div class="px-2 lg:px-0">
            <div id="post-title-block" class="container relative p-4 text-center bg-gray-600 lg:p-8" style="top: -2rem;">
                <span class="block pb-2 leading-none uppercase text-2xs text-red-default lg:text-xl lg:pb-4">@php the_category(', ') @endphp</span>
                <h1 class="text-2xl italic font-extrabold leading-tight text-white lg:text-4xl">{!! $post->title !!}</h1>
                <div class="pt-2 text-2xs text-gray-250">
                    <div>Posted <time datetime="{{ $post->dateTime }}">{{ the_time('m/d/y') }}</time> by {{ $post->author->nickname }}</span></div>
                    @if (get_the_modified_time('F jS, Y'))
                        <div class="text-white">Last updated on {{ get_the_modified_time('m/d/Y') }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container px-0 pb-12 bg-white main-content lg:px-16 xl:px-32">
            <article class="px-6 py-2 article lg:py-6">
                <div class="article__content">
                    {!! $post->content !!}
                </div>
            </article>
            <div id="share-author" class="lg:flex">
                <div class="px-6 lg:w-1/2 lg:flex lg:flex-col lg:pt-9 lg:border-t-2 lg:border-gray-150">
                    <div class="pb-6 lg:order-1">
                        @php
                            $tags = wp_get_post_tags($post->id)
                        @endphp
                        <span class="text-sm italic font-bold">Keywords</span>
                        <div class="text-xs font-bold text-red-default lg:pt-1">
                            @foreach ($tags as $tag)
                                <a class="hover:underline" href="{{ get_tag_link($tag) }}">{{ $tag->name }}</a>@if (! $loop->last),@endif
                            @endforeach
                        </div>
                    </div>
                    <div class="lg:order-0">
                        <span class="text-sm italic font-bold">Share this Article</span>
                        <div class="lg:pt-1">
                            @include('partials.social-share')
                        </div>
                    </div>
                </div>
                <div class="px-6 py-10 bg-gray-150 lg:w-1/2">

                    <div class="mb-6 font-extrabold text-md text-gray-175">Author: {{ $post->author->nickname }}</div>
                    <p class="pb-0 mb-0 text-sm">
                        @php $wordpress_is_silly = true @endphp
                        @if (! $wordpress_is_silly)
                            {{ the_author_meta('description') }}
                        @endif
                        Paul is the editor of OnAllCylinders. When he’s not writing, you’ll probably find him fixing oil leaks in a Jeep CJ-5 or watching a 1972 Corvette overheat. An avid motorcyclist, he spends the rest of his time synchronizing carburetors and cleaning chain lube off his left pant leg.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div style="background-image: url('{{ public_url('images/asphalt-texture.png') }}');" class="pb-12">
        <div style="background-image: url('{{ public_url('images/tread-marks.svg') }}');" class="pb-12 bg-white bg-repeat-x lg:hidden">
        </div>
        <div class="container px-0 bg-white comment-outer">
            <div style="background-color: #323032" class="px-0 pb-4 bg-cover lg:mx-16 lg:px-12">
                <h3 class="px-6 pt-4 text-lg text-white">Comments</h3>
            </div>
        </div>
        <div id="comment-section" class="container px-0 py-3 bg-white lg:px-16 xl:px-32">
            <div class="px-6">
                @php comments_template(); @endphp
            </div>
        </div>
    </div>
    <div style="background-image: url('{{ public_url('images/other-tire-back.jpg') }}');" class="pb-12 bg-cover lg:pb-16">
    </div>

    @php
        $categories  = get_the_category($post->ID);
        $category_id = false;
        if (! empty($categories)) {
            $category_id = $categories[0]->cat_ID;
        }
    @endphp

    @if ($category_id)
        @php
            $similar_posts = get_posts('numberposts=3&order=DESC&orderby=date&category=' . $category_id);
            $count = 0;
        @endphp
        <section id="similar-posts" class="mb-10">
            <div class="container">
                <h3 class="pt-6 pb-4 text-lg italic font-extrabold text-center lg:pt-8 lg:text-4xl">Similar Stories</h3>
                <div class="md:flex md:justify-between">
                    @foreach ($similar_posts as $post)
                        @php
                            setup_postdata($post);
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                        @endphp
                        <a class="flex flex-col mb-6 similar-story" href="{{ $post->guid }}" style="background-image: url('<?php echo $thumb[0]; ?>')">
                            <h3 class="w-full h-full px-6 pt-16 pb-6 text-sm font-extrabold leading-tight text-left text-white lg:pt-32 lg:pb-3 lg:text-xl" style="background-color: rgba(0,0,0,.5)">{!! $post->post_title !!}</h3>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection