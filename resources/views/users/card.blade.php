<div class="col-xl-4">
    <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="{{ $user->name }}">
        <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
            <div class="d-flex flex-row align-items-center">
                                    <span class="status status-success mr-3">
                                        <span class="rounded-circle profile-image d-block " style="background-image:url('{{ $user->thumbnailAvatar }}'); background-size: cover;"></span>
                                    </span>
                <div class="info-card-text flex-1">
                    <a href="{{ route('user.view', $user->id) }}" class="fs-xl text-truncate text-truncate-lg text-info">
                        {{ $user->name }}
                    </a>

                    @if(auth()->check() && (auth()->user()->canEdit || $user->id == auth()->user()->id))
                    <a href="{{ route('user.view', $user->id) }}" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                        <i class="fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                    </a>
                    <div class="dropdown-menu">
                            <a class="dropdown-item" href="/user/edit/{{ $user->id }}/general">
                                <i class="fa fa-edit"></i>
                                Редактировать</a>
                            <a class="dropdown-item" href="/user/edit/{{$user->id}}/security">
                                <i class="fa fa-lock"></i>
                                Безопасность</a>
                            <a class="dropdown-item" href="/user/edit/{{ $user->id }}/status">
                                <i class="fa fa-sun"></i>
                                Установить статус</a>
                            <a class="dropdown-item" href="/user/edit/{{ $user->id }}/media">
                                <i class="fa fa-camera"></i>
                                Загрузить аватар
                            </a>
                            <a href="/user/delete/{{ $user->id }}" class="dropdown-item" onclick="return confirm('are you sure?');">
                                <i class="fa fa-window-close"></i>
                                Удалить
                            </a>
                    </div>
                    @endif
                @if ($user->position)
                        <span class="text-truncate text-truncate-xl">{{ $user->position }}</span>
                    @endif
                </div>
                <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                    <span class="collapsed-hidden">+</span>
                    <span class="collapsed-reveal">-</span>
                </button>
            </div>
        </div>
        <div class="card-body p-0 collapse show">
            <div class="p-3">
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
    </div>
</div>
