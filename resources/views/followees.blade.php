@extends('layouts.app')

@section('content')
<div style=" width: 100%;
             height: 100%;
             background: #f2f3f5;
             padding-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="margin-top:10px;">
                @include('partials.profile')
            </div>
            <div class="col-md-8" style="margin-top:10px;">
                @include('partials.followees')
            </div>
        </div>
    </div>
</div>
@endsection
