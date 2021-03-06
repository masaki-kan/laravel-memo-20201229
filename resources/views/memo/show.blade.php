@extends('layouts.top')

@section('list')
<div>
@if(isset( $lists->title ))
<h3 class="d-block mb-2 list_title">{{ $lists->title }}</h3>
@else
<span class="d-block mb-2">{{ __('No title') }}</span>
@endif
<span class="d-block mb-2 url_text">{!! nl2br($introduction) !!}</span>
<span class="d-block ml-auto"><i class="fas fa-history"></i> {{ $lists->created_at->format('Y/m/d H:i:s') }}</span>
</div>

@endsection

@section('content')

<div class="d-flex d-lg-flex top_flex_r border-bottom mb-4">
<h2 class="mr-auto text-center">{{ __('新規メモ') }}</h2>
<p class="mr-2 mr-lg-2 ml-auto"><label for="update"><a><i class="fas fa-save"></i></a></label></p>
<p class=""><a href="{{ route('delete', $lists->id ) }}"><i class="fas fa-trash"></i></a></p>
</div>
<div class="p-2">
  <form action="{{ route('update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $lists->id }}">
  <div class=" bg-white mb-3">
    <input style="width:100%;border: none;" type="text" name="title" value="{{ $lists->title }}" placeholder="タイトルを記入する..">
  </div>
  <div class=" bg-white">
    <textarea type="text" name="content" rows="30" cols="" style="width:100%;border: none;" placeholder="内容を記入する..">{{ $lists->content }}</textarea>
  </div>
  <button type="submit" id="update" value="" style="display:none;">
  </form>
</div>


@endsection
