@extends('layouts.main')
@section('content')
    <table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      
        @if(!empty($orders))
            @foreach($orders as $order)
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Order Id {{ $order->id }}</strong></h3></td>
                    </tr>
                @foreach($order->OrderDetails as $detail)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" class="card-img-top"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $detail->book->title }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rs{{$detail->price }}</td>
                        <td data-th="Quantity">{{ $detail->quantity }}</td>
                    
                        <td data-th="Subtotal" class="text-center">Rs{{ $detail->price * $detail->quantity }}</td>
                        </td>
                        <td>
                        @if($detail->review != null)
                            <div class="rating d-flex ml-3">
                                <span><input id="input-1-ltr-star-xs" class="restaurant_rating rating-loading" value="{{$detail->review->star_rating}}" dir="ltr" data-size="xs"></span>
                                {{-- <span>({{$user->rating_total}})</span> --}}
                            </div>
                        @else
                            <a class="text-dark ml-3 addRating" href="javascript:void(0)" data-url="{{ route('orders.rating.view',['orderId' => $order->id,'oderDetailId' => $detail->id]) }}">
                                <svg viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20" height="20" fill="currentColor">
                                    <title>{{__('Give Review')}}</title>
                                    <path d="M82.877,311.122c3.417,2.287,7.281,3.38,11.104,3.38c6.45,0,12.783-3.116,16.64-8.879  c32.317-48.292,86.34-77.123,144.511-77.123c57.999,0,111.933,28.699,144.273,76.77c6.167,9.165,18.594,11.596,27.758,5.43  c9.165-6.166,11.596-18.594,5.43-27.758c-25.839-38.406-62.885-66.745-105.219-81.905C352.762,180.298,369,148.761,369,113.5  c0-62.309-50.691-113-113-113s-113,50.691-113,113c0,35.008,16.002,66.347,41.076,87.091  c-42.996,15.104-80.599,43.786-106.698,82.786C71.235,292.557,73.697,304.979,82.877,311.122z M256,40.5c40.252,0,73,32.748,73,73  s-32.748,73-73,73s-73-32.748-73-73S215.748,40.5,256,40.5z M335.758,354.63l-29.816,21.509c-4.436,3.2-6.293,8.873-4.598,14.051  l12.007,34.802c0.507,1.55,0.702,3.064,0.637,4.508c-0.425,9.347-12.14,15.741-20.732,9.543l-29.815-21.515  c-2.218-1.6-4.829-2.4-7.44-2.4c-2.611,0-5.222,0.8-7.44,2.4l-29.815,21.515c-8.592,6.198-20.363-0.196-20.735-9.543  c-0.057-1.444,0.143-2.959,0.65-4.508l11.996-34.802c1.695-5.178-0.162-10.851-4.598-14.051l-29.816-21.509  c-9.92-7.156-4.822-24.13,7.44-24.13h36.854c5.484,0,10.344-2.111,12.038-7.289l11.388-35.027c1.895-5.789,6.966-8.684,12.038-8.684  c5.072,0,10.143,2.895,12.038,8.684l11.388,35.027c1.695,5.178,6.554,7.289,12.038,7.289h36.854  C340.58,330.5,345.678,347.474,335.758,354.63z M506.758,424.63l-29.816,21.509c-4.436,3.2-6.293,8.873-4.598,14.051l12.007,34.802  c0.507,1.55,0.702,3.064,0.637,4.508c-0.425,9.347-12.14,15.741-20.732,9.543l-29.815-21.515c-2.218-1.6-4.829-2.4-7.44-2.4  s-5.222,0.8-7.44,2.4l-29.815,21.515c-8.592,6.198-20.363-0.196-20.735-9.543c-0.057-1.444,0.143-2.959,0.65-4.508l11.996-34.802  c1.695-5.178-0.162-10.851-4.598-14.051l-29.816-21.509c-9.92-7.156-4.822-24.13,7.44-24.13h36.854  c5.484,0,10.344-2.111,12.038-7.289l11.388-35.027c1.895-5.789,6.966-8.684,12.038-8.684s10.143,2.895,12.038,8.684l11.388,35.027  c1.695,5.178,6.554,7.289,12.038,7.289h36.854C511.58,400.5,516.678,417.474,506.758,424.63z M164.758,424.63l-29.816,21.509  c-4.436,3.2-6.293,8.873-4.598,14.051l12.007,34.802c0.507,1.55,0.702,3.064,0.637,4.508c-0.425,9.347-12.14,15.741-20.732,9.543  L92.44,487.528c-2.218-1.6-4.829-2.4-7.44-2.4s-5.222,0.8-7.44,2.4l-29.815,21.515c-8.592,6.198-20.363-0.196-20.735-9.543  c-0.057-1.444,0.143-2.959,0.65-4.508l11.996-34.802c1.695-5.178-0.162-10.851-4.598-14.051L5.242,424.63  c-9.92-7.156-4.822-24.13,7.44-24.13h36.854c5.484,0,10.344-2.111,12.038-7.289l11.388-35.027c1.895-5.789,6.966-8.684,12.038-8.684  s10.143,2.895,12.038,8.684l11.388,35.027c1.695,5.178,6.554,7.289,12.038,7.289h36.854  C169.58,400.5,174.678,417.474,164.758,424.63z"/>
                                </svg>
                            </a>

                        @endif
                        </td>
                        
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total Rs {{ $order->order_total }}</strong></h3></td>
                    </tr>
            @endforeach
        @endif
    </tbody>
    
</table>
<div class="modal fade" id="addReviewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header header-custom">
                <h5 class="modal-title" id="staticBackdropLabel">{{__('Add Review')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-4 ratingModelBody">
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.addRating').on('click', function(){
        url = $(this).attr('data-url');
        $.ajax({
            url: url,
            success: function(resp) {
                $('#addReviewModel').find('.ratingModelBody').html(resp);
                $('#addReviewModel').modal('show');
                $('#addReviewModel').on('shown.bs.modal', function(e){ 
                    $(document).ready(function(){
                        $('.kv-ltr-theme-svg-star').rating({
                            hoverOnClear: false,
                            showClear: false, 
                            theme: 'krajee-svg',
                            starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Great', 4: 'Good', 5: 'Very Good'}
                        });
                    });

                });
            },
            error: function(xhr) {
            }
        });
    }); 
</script>
@endpush
