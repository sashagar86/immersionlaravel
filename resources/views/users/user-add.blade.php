@extends('layouts.app')

@section('content')

<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-plus-circle'></i> {{ __('Add User') }}
    </h1>
</div>

<form action="{{ route('user.create') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xl-6">
            @include('users.partials.general')
        </div>
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container">
                    <div class="panel-hdr">
                        <h2>{{ __('Security and media') }}</h2>
                    </div>
                    <div class="panel-content">
                        @include('users.partials.security')
                        @include('users.partials.status')
                        @include('users.partials.media')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            @include('users.partials.socials')
        </div>
    </div>

    <div class="col-md-12 mt-3 d-flex flex-row-reverse">
        <button class="btn btn-success">{{ __('Create user') }}</button>
    </div>
</form>
@endsection
