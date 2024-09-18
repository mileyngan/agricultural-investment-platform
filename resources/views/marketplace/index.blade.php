@extends('layouts.app')

@section('content')
<div class="marketplace-container">
    <h1>WOM Invest Marketplace</h1>
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p class="price">${{ number_format($product->price, 2) }}</p>
            <p>Sold by: <a href="{{ route('firm.show', $product->firm) }}">{{ $product->firm->name }}</a></p>
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" required>
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
            <div class="product-comments">
                <h4>Comments</h4>
                @foreach($product->comments as $comment)
                <div class="comment">
                    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                @endforeach
                <form action="{{ route('comment.store', $product) }}" method="POST" class="comment-form">
                    @csrf
                    <textarea name="content" rows="2" required placeholder="Leave a comment"></textarea>
                    <button type="submit" class="btn btn-secondary">Post Comment</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection