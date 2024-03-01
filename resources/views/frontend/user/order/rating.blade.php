<form action="{{route('orders.rating.store',['orderId' => $orderId,'oderDetailId' => $detail->id])}}" method="POST" id="order_rating">
    @csrf
    <div class="form-group">
        <label for="input-2" class="control-label">{{__('Rate your experience for')}}</label>
        <div>
            <input id="input-1-ltr-star-xs" name="star_rating" class="kv-ltr-theme-svg-star rating-loading" value="3" dir="ltr" data-size="xs">
        </div>
    </div>
    <div class="form-group">
        <label for="review">Add your review</label>
        <textarea rows="4" class="form-control" id="review" name="review"></textarea>
    </div>
    <button type="submit" class="btn btn-green">Submit</button>
</form>