@extends('layouts.app')

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <h1>
                Update Product
            </h1>

            <form method="POST" action="/products/{{ $product->id }}">

                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" for="title">Name</label>

                    <div class="control">
                        <input class="input"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ $product->name }}">

                        @if ($errors->has('title'))
                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
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
                               value="{{ $product->quantity }}">

                        @if ($errors->has('quantity'))
                            <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="price">price</label>

                    <div class="control">
                        <input class="input"
                               type="number"
                               name="price"
                               id="price"
                               value="{{ $product->price }}">

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
