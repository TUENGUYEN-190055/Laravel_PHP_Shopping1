@if (isset($items))
<div class="text-right">
    <div>
        <a href="{{ route('cart.confirm') }}" class="btn btn-primary">{{ __('Next') }}</a>
    </div>
</div>
@endif