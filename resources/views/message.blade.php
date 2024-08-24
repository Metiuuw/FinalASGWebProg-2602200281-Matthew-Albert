@extends('layout.navbar')

@section('title', 'Message')
@section('activeMessage', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <div class="rounded-circle">
                        <img class="rounded-circle" src="{{ asset('storage/' . $friend->profile_path) }}" alt=""
                            style="width: 115px; height: 110px">
                    </div>
                    <h2>{{ $friend->name }}</h2>
                    <h5>{{ $friend->fields_of_work }}</h5>
                </div>
                <div class="card chat-room shadow-sm">
                    <div class="card-body">
                        <div class="chat-messages" style="height: 400px; overflow-y: auto;">
                            @foreach ($messages as $msg)
                                <div
                                    class="d-flex {{ $msg->sender_id === auth()->user()->id ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                                    <div class="message p-3 rounded-3 {{ $msg->sender_id === auth()->user()->id ? 'bg-primary text-white' : 'bg-light' }}"
                                        style="max-width: 75%;">
                                        <p class="mb-0">{{ $msg->message }}</p>
                                        @if ($msg->created_at)
                                            <p class="text-muted">{{ $msg->created_at->format('H:i') }}</p>
                                        @else
                                            <p class="text-muted">--</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('message.store') }}" class="mt-3">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="new_message" class="form-control" placeholder="Enter your message"
                            required>
                        <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                        <button type="submit" class="btn btn-primary" style="background-color:green">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
