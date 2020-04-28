@extends('layouts.secondary')

@section('content')
    <a class="btn btn-danger" onclick="return confirm('Are you sure? This cannot be undone!')" href="{{ route('deleteAccount') }}">Delete Account</a>
@endsection
