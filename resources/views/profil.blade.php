@extends('layouts.app')

@section('content')
{{-- this for Show Information About User Like Nmae, Emal... --}}
    <div class="container">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    User Information
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Age: {{ $user->age }}</p>
                    <p class="card-text">Location: {{ $user->city }} {{ $user->country }} </p>
                    <p class="card-text">Follower Count: {{ $followerCount }}</p>
                    <div class="row">
                        <div class="col">
                          <P>you can from here create new Posts:</P>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('create', ['id' => $user->id]) }}">{{ __('creat') }}</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
