@extends('main')

@section('title', 'Пости')

@section('header')
    @include('layouts.main')
@endsection

@section('content')
    <h1>{{__('Пости')}}</h1>
    <div class="row">
        @forelse($posts as $post)

            <div class="col-sm-3 mt-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        Autor: {{ $post->user->name}}

{{--                        @can('update', $post)--}}
                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">
                            {{ __('Edit') }}
                        </a>
{{--                        @endcan--}}

{{--                        @can('delete', $post)--}}
                            <form method="post" action="{{ route('posts.destroy',$post)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete') }}
                                </button>
                            </form>
{{--                        @endcan--}}

                    </div>
                </div>
            </div>

        @empty
<h2>Ще немає постів</h2>
        @endforelse
    </div>
@endsection
