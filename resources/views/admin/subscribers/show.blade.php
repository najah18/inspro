@extends('theme.default')

@section('content')
    <h1>{{ $subscriber->name }}</h1>
    <p>{{ $subscriber->description }}</p>
    <p><strong>Video:</strong> <a href="{{ $subscriber->video }}" target="_blank">{{ $subscriber->video }}</a></p>
    <p><strong>Category:</strong> {{ $subscriber->category->name }}</p>
@endsection
