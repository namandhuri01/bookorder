@extends('layouts.main')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($books as $book)
                    <div class="col-md-3 col-6 mb-4">
                        <div class="card">
                            <img src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="{{ $book->title }}" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">{{ $book->title }}</h4>
                                    <div class="rating d-flex ml-3">
                                        <span><input id="input-1-ltr-star-xs" class="restaurant_rating rating-loading" value="{{$book->rating_total}}" dir="ltr" data-size="xs"></span>
                                            {{-- <span>({{$user->rating_total}})</span> --}}
                                    </div>
                                <p>{{ $book->author }}</p>
                                <p class="card-text"><strong>Price: </strong> Rs{{ $book->price }}</p>
                                <p class="btn-holder"><a href="#!" data-book-id="{{$book->id}}" class="btn btn-outline-danger addToCart">Add to cart</a> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script>
    $(".addToCart").click(function (e) {
        e.preventDefault();
        var ele = $(this).data('book-id');
        $.ajax({
            url: '{{ route('addbook.to.cart', ':id') }}'.replace(':id', ele),
            method: "get",
            data: {
                _token: '{{ csrf_token() }}', 
            },
            success: function (response) {
               
            }
        });
    });
</script>
@endpush