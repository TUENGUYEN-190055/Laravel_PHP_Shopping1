@if (isset($items))
<div class="row justify-content-center">
    @csrf
    <button class="btn btn-danger">{{ __('Order') }}</button>
    <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">{{ __('Back') }}</a>
</div>
@endif