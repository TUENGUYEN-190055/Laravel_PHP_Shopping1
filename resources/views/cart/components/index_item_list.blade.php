@if (isset($items))
<table class="table">
<tr>
<th></th>
<th>{{ __('Item Name') }}</th>
<th>{{ __('Price') }}</th>
<th>{{ __('Amount') }}</th>
<th></th>
</tr>
@foreach ($items as $item)
<tr>
<td><img src="{{ asset('images/now_printing.jpg') }}" width="50"></td>
<td>{{ $item->name }}</td>
<td>{{ $item->price }}</td>
<td>
<input type="number" name="user_items[{{ $item->id }}]"
value="{{ $user_items[$item->id]->amount }}"
class="form-control col-3 text-right">
</td>
<td>
<a href="{{ route('cart.remove', ['id' => $item->id]) }}"
class="btn btn-sm btn-danger">{{ __('Delete')
}}</a>
</td>
</tr>
@endforeach
</table>

<p class="lead text-right">
<label for="totalPrice">{{ __('Total Price') }} </label>
&yen; {{ $total_price }}
</p>
@endif