@extends('layout.navbar')

@section('title', 'Friend')
@section('activeFriend', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <h1>@lang('friend.friend')</h1>
            @foreach ($dataFriend as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                            class="card-img-top img-fluid" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->fields_of_work }}</p>
                            <a href="{{ route('message.show', $user->id) }}" class="btn btn-primary mt-auto w-100"
                                style="background-color:green">@lang('friend.message')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
