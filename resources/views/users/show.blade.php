@extends('layouts.app')
@section('content')
    <main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-user'></i> {{ $user->name }}
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-6 m-auto">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="{{ $user->thumbnailAvatar }}" width="200" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3">
                                {{ $user->name }}
                            </h5>
                            @if ($user->vk || $user->instagram || $user->telegaram)
                                <div class="d-flex flex-row">
                                    @foreach ($socials as $social => $color)
                                        @if ($user->$social)
                                            <a href="{{$user->$social}}" class="mr-2 fs-xxl" style="color:{{ $color }}">
                                                <i class="fab fa-{{ $social }}"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            @if ($user->phone)
                                <a href="tel:{{ $user->phoneFormatted }}" class="mt-1 d-block fs-sm fw-400 text-dark">
                                    <i class="fas fa-mobile-alt text-muted mr-2"></i> {{$user->phone}}</a>
                            @endif

                            <a href="mailto:{{ $user->email }}" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mouse-pointer text-muted mr-2"></i> {{ $user->email }}</a>

                            @if($user->address)
                                <address class="fs-sm fw-400 mt-4 text-muted">
                                    <i class="fas fa-map-pin mr-2"></i> {{ $user->address }}</address>
                            @endif
                        </div>
                    </div>
                    @if(auth()->user()->canEdit || $user->id == auth()->user()->id)
                    <div class="col-12">
                        <div class="text-right">
                            <a href="/user/edit/{{ $user->id }}" class="btn btn-warning"><i class="fa fa-pencil"></i> {{ __('Edit') }}</a>
                            <a href="/user/delete/{{ $user->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Delete') }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
