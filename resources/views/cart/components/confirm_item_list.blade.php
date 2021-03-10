<table class="table">
    <tr>
        <th></th>
        <th>{{ __('Item Name') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Amount') }}</th>
    </tr>
    @if (isset($items))
    @foreach ($items as $item)
    <tr>
        <td><img src="{{ asset('images/now_printing.jpg') }}" width="50"></td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $user_items[$item->id]->amount }}</td>
    </tr>
    @endforeach
    @endif
</table>

<p class="lead text-right">
    <label for="totalPrice">{{ __('Total Price') }} </label>
    &yen; {{ $total_price }}
</p>