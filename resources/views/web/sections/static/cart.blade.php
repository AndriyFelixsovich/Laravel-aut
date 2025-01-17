@extends('main')

@section('title', 'Cart')

@section('header')
    @include('web.layout.header')
@endsection

@section('content')
    <div class="conteiner">
       <h2> {{__('Загальна вартість')}} - {{ $cart->getTotal() }} </h2>
    </div>
    <div class="row">
        @if($cart->isEmpty())
            <h1>{{ __('Ваш кошик пустий') }}</h1>
        @else
            @foreach ($cart->get() as $item)
                <div class="col-sm-3 mt-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img class="card-img-top rounded" src="{{ $item->imageUrl() }}"/>
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->short_text }}</p>
                            <p class="card-price">{{ __('Ціна') }}: {{ $item->price }}</p>
                            <a href="{{ route('cart.remove', $item) }}" class="btn btn-primary">
                                {{ __('Видалити з кошика') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
