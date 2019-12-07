@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('partials.profile1')
            </div>
            <div class="col-md-6">
                @include('partials.feed')
            </div>
            <div class="col-md-3">
                @include('partials.tags')
                <br>

            </div>
        </div>
    </div>
@endsection
