@extends('layouts.app')

@section('content')
    <h1 class="flex text-center align-content-center justify-center text-xl">404</h1>
    <a class="flex text-center align-content-center justify-center" href="{{ route('tasks.index') }}">You are lost. Click here to return home! ∪･ｪ･∪</a>
@endsection
