@extends('layouts.master')

@section('content')
    <div class="main-content wp-page">
        <article class="container article">
            <header class="article__header">
                <h1 class="mb-4 text-2xl italic font-extrabold text-center md:text-5xl">{{ $post->title }}</h1>
            </header>

            <div class="article__content">
                {!! $post->content !!}
            </div>
        </article>
    </div>

    <script>
	(function($) {
		$('.accordion-section').on('click', function(e) {
			if ($(e.currentTarget).hasClass('active')) {
				$('.accordion-section').removeClass('active');
				return;
			}
			$('.accordion-section').removeClass('active');
			$(e.currentTarget).addClass('active');
		});
	})(jQuery)
</script>
@endsection