@extends('layouts.app')

@section('content')

    <ul>
        @forelse ($audits as $audit)
            <li>
                @lang('product.updated.metadata', $audit->getMetadata())

                @foreach ($audit->getModified() as $attribute => $modified)
                    <ul>
                        <li>@lang('product.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                    </ul>
                @endforeach
            </li>
        @empty
            <p>@lang('product.unavailable_audits')</p>
        @endforelse
    </ul>

@endsection
