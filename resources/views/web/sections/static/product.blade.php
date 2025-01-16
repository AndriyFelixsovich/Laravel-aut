@extends('main')

@section('title', 'Головна')

@section('header')
    @include('web.layout.header')
@endsection

@section('content')
    <h1>{{ __('Категорії товару') }}</h1>
    <div class="mb-4 d-flex justify-content-end">
        @if (request()->get('collection'))
            <a class="text-decoration-none text-white  bg-primary px-2 py-2 rounded" href="{{ route('allProducts') }}" >Clear</a>
        @endif
    </div>

    <div class="d-flex flex-wrap">

        @foreach ($collections as $collection)
           <div class="p-2">
               <a class="text-decoration-none text-white  bg-danger px-2 py-2 rounded" href="?collection={{ $collection->id }}">{{ $collection->name }}</a></div>
        @endforeach

    </div>
    <h2>{{ __('Продукти') }}</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 mt-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img class="card-img-top rounded" src="{{ $product->imageUrl() }}"/>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->short_text }}</p>
                        <p class="card-price">{{ __('Ціна') }}: {{ $product->price }}</p>
                        <a href="{{ route('product.addToCart', $product) }}" class="btn btn-primary">
                            {{ __('Додати до кошика') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
@endsection
