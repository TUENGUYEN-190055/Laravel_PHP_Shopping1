@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <Items></Items>

  </div>
</div>
@endsection


<!-- @foreach ($items as $item)
<div class="col-md-4 mb-2">
<div class="card">
<div class="card-header bg-white">
<img src="{{ asset('images/now_printing.jpg') }}" alt="" width="100%">
</div>

<div class="card-body">
<a href="">{{ $item['name'] }}</a>
<p>
¥{{ number_format($item['price']) }}
</p>
<p class="row justify-content-center">
<a href="{{ route('cart.add', ['id' => $item->id ]) }}" class="btn btn-outline-info">{{ __('Add Cart') }}</a>
</p>
</div>

</div>
</div>
@endforeach -->