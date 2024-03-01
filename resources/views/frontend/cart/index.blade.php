@extends('layouts.main')
  
@section('content')
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                 @php $total += $details['price'] * $details['quantity'] @endphp
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" class="card-img-top"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['title'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rs{{ $details['price'] }}</td>
                    <td data-th="Quantity">{{ $details['quantity'] }}</td>
                   
                    <td data-th="Subtotal" class="text-center">Rs{{ $details['price'] * $details['quantity'] }}</td>
                    </td>
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total Rs {{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-danger" data-totalAmount="{{ $total }}" id="checkout">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
  
@push('scripts')
<script type="text/javascript">
  
    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.sopping.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("rowId"), 
            },
            success: function (response) {
                
               window.location.reload();
            }
        });
    });
  
    $(".delete-product").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    ele.parents("tr").remove();
                    window.location.reload();
                }
            });
        }
    });
    $("#checkout").click(function (e) {
        e.preventDefault();
        console.log($(this));
         var totalAmount = $(this).attr('data-totalAmount');
        
        $.ajax({
            url: '{{ route('orders.store') }}',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}', 
                order_total: totalAmount,
            },
            success: function (response) {
                window.location.href = "{{ route('thanksyou') }}";
            }
        });
        
        
    });
  
</script>
@endpush