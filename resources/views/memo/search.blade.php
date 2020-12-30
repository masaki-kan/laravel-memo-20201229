@extends('layouts.top')

@section('list')
<form action="{{ route('search') }}" method="GET">
@csrf
<div class="d-flex mb-3">
<div class="col-10">
<input type="text" name="input" value="" class="">
</div>
<div class="col-2">
<label for="search"><i class="fas fa-search"></i></label>
<input type="submit" id="search" style="display:none;">
</div>
</div>
</form>
<h2 class="mb-4 text-center">{{ __('メモリスト') }}</h2>

<div class="scrollx">

@foreach( $values as $value )
<div class="mb-3 bg-white p-2 list_b">
<a href="{{ route('list' , $value->id ) }}">
@if(isset($value->title) )
<span class="d-block mb-2 list_title">{{ $value->title }}</span>
<span class="d-block ml-auto"><i class="far fa-clock"></i> {{ $value->created_at->format('Y/m/d') }}</span>
@else
<span class="d-block mb-2">{{ __('No title') }}</span>
<span class="d-block ml-auto"><i class="far fa-clock"></i> {{ $value->created_at->format('Y/m/d') }}</span>
@endif
</a>
</div>
@endforeach

</div>
@endsection

@section('content')

<div class="d-flex d-lg-flex top_flex_r my-auto">
</div>

@endsection
