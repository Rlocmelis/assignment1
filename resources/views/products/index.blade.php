@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <div>
                    @can('crud_table')
                    <div>
                        <div class="control">
                            <a href="{{ route('products.create') }}" class="align-items-center text-danger">Create</a>
                            <a href="{{ route('products.audits.index') }}" class="align-items-center text-danger">All Audits</a>
                        </div>
                    </div>
                    @endcan
                    @can('view_table')
                        <table style="width:100%">
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>VAT</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                   <td>{{ $product->VAT($product) }}</td>
                                    @can('crud_table')
                                    <td><a href="products/{{$product->id}}/edit">Edit</a></td>

                                    <td>
                                        <form action="{{ url('/products', ['id' => $product->id]) }}" method="post">
                                            <input class="btn btn-default" type="submit" value="Delete" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                        <td><a href="products/{{$product->id}}/audit">See Audits</a></td>
                                        @endcan
                                </tr>
                            @endforeach
                        </table>
                    @endcan
                </div>
            </div>

        </div>
    </div>
@endsection
