@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1>
            New Product
        </h1>

        <form method="POST" action="{{ route('products.store') }}">

            @csrf

            <div class="field">
                <label class="label" for="title">Name</label>

                <div class="control">
                    <input class="input"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="quantity">quantity</label>

                <div class="control">
                    <input class="input"
                           type="number"
                           name="quantity"
                           id="quantity"
                           value="{{ old('quantity') }}">

                    @if ($errors->has('quantity'))
                        <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for='price'>price</label>

                <div class="control">
                    <input class="input"
                           type="number"
                           name="price"
                           id="price"
                           value="{{ old('price') }}">

                    @if ($errors->has('price'))
                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
