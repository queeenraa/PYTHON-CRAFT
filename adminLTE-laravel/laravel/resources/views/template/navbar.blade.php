@extends('layout.master')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ Auth::user()->name }}</h5>
            <a href="{{ route('logout') }}" class="btn btn-primary"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
