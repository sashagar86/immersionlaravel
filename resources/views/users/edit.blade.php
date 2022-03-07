@extends('layouts.app')

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> {{ __('Edit User') }}
        </h1>
    </div>

    <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">

            @if ($template == 'general' || !$template)
                <div class="col-xl-6">
                    @include('users.partials.general')
                </div>
            @endif


            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>{{ __('Security and media') }}</h2>
                        </div>
                        <div class="panel-content">
                            @if ($template == 'security' || !$template)
                                @include('users.partials.security')
                            @endif
                            @if ($template == 'status' || !$template)
                                @include('users.partials.status')
                            @endif
                            @if ($template == 'media' || !$template)
                                @include('users.partials.media')
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if ($template == 'socials' || !$template)
                <div class="col-xl-12">
                    @include('users.partials.socials')
                </div>
            @endif
        </div>

        <div class="col-md-12 mt-3 d-flex flex-row-reverse">
            <button class="btn btn-success">{{ __('Update user') }}</button>
        </div>
    </form>
@endsection
