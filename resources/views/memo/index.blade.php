@extends('layouts.top')

@section('list')
<h2 class="mb-4 text-center">{{ __('メモリスト') }}</h2>
<div class="scrollx">
@if( count($topMemos) > 0 )
@foreach( $topMemos as $topMemos )
<div class="mb-3 bg-white p-2 list_b">
<a href="{{ route('list' , $topMemos->id ) }}">
@if(isset($topMemos->title) )
<span class="d-block mb-2">{{ $topMemos->title }}</span>
@else
<span class="d-block mb-2">{{ __('No title') }}</span>
@endif
<span class="d-block ml-auto">{{ $topMemos->created_at->format('Y/m/d H:i:s') }}</span>
</a>
</div>
@endforeach
@else
<p>データがありません。</p>
@endif
</div>
@endsection

@section('content')

<div class="d-flex d-lg-flex top_flex_r my-auto">
</div>

@endsection
