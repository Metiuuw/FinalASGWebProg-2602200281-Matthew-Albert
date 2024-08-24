@extends('layout.navbar')

@section('title', 'Request')
@section('activeRequest', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <h1>@lang('request.friend')</h1>
            @foreach ($friendRequest as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                            class="card-img-top img-fluid" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->fields_of_work }}</p>
                            <form method="POST" action="{{ route('friend.store') }}" class="mb-2">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $user->request_id }}">
                                <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary w-100"
                                    style="background-color:green">@lang('request.accept')</button>
                            </form>
                            <form method="POST" action="{{ route('friend-request.destroy', $user->request_id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">@lang('request.decline')</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
