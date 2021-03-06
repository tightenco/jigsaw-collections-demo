---
pagination:
  collection: posts
  perPage: 2
testvar: Successful!
---
@extends('_layouts.master')

@section('body')
<h2>Pagination</h2>

<div class="p-xs-y-3 border-b">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="text-uppercase text-dark-soft wt-light">
                Current page: {{ $pagination->currentPage }}
            </h4>
            <h4 class="text-uppercase text-dark-soft wt-light">
                Total pages: {{ $pagination->totalPages }}
            </h4>
            <h4 class="text-uppercase text-dark-soft">
                Test of a local variable: {{ $page->testvar }}
            </h4>
        </div>

        <div class="col-xs-6 text-right">
            @if ($previous = $pagination->previous)
                <a href="{{ $pagination->first }}"><icon class="chevron_left tight"></icon><icon class="chevron_left tight"></icon></a>
                <a href="{{ $previous }}"><icon class="chevron_left m-xs-x-3"></icon></a>
            @else
                <icon class="chevron_left disabled tight"></icon><icon class="chevron_left disabled tight"></icon>
                <icon class="chevron_left disabled m-xs-x-3"></icon>
            @endif

            @foreach ($pagination->pages as $number => $page_number)
                <a href="{{ $page_number }}" class="pagination__number {{ $pagination->currentPage == $number ? 'selected' : '' }}">{{ $number }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a href="{{ $next }}"><icon class="chevron_right m-xs-x-3"></icon></a>
                <a href="{{ $pagination->last }}"><icon class="chevron_right tight"></icon><icon class="chevron_right tight"></icon></a>
            @else
                <icon class="chevron_right disabled m-xs-x-3"></icon>
                <icon class="chevron_right disabled tight"></icon><icon class="chevron_right disabled tight"></icon>
            @endif
        </div>
    </div>
</div>

@foreach ($pagination->items as $post)
<div class="row">
    <div class="col-xs-12">
        <h3><a href="{{ $post->getUrl() }}">{{ $post->title }}</a></h3>
        <p class="text-sm">by {{ $post->author }} · {{ $post->dateFormatted() }} · Number {{ $post->number }}</p>
        <div class="p-xs-b-6 border-b">{!! $post->getContent() !!}</div>
    </div>
</div>
@endforeach

@endsection
