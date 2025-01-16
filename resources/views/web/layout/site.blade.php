@extends('main')

@section('title', 'Головна')

@section('header')
    @include('web.layout.header')
@endsection

@section('content')
    <h1>{{ __('Категорії товару') }}</h1>
    <div class="row">
        @foreach ($collections as $collection)
            <div class="col-sm-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $collection->name }}</h5>
                        <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h2>{{ __('Продукти') }}</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->short_text }}</p>
                        <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
