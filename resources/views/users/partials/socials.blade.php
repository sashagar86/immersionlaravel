<div id="panel-1" class="panel">
    <div class="panel-container">
        <div class="panel-hdr">
            <h2>{{ __('Social Links') }}</h2>
        </div>
        <div class="panel-content">
            <div class="row">
                @foreach($socials as $social => $color)
                    <div class="col-md-4">
                        <!-- instagram -->
                        <div class="input-group input-group-lg bg-white shadow-inset-2 mb-2">
                            <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 py-1 px-3">
                                        <span class="icon-stack fs-xxl">
                                            <i class="base-7 icon-stack-3x" style="color: {{ $color }}"></i>
                                            <i class="fab fa-{{ $social }} icon-stack-1x text-white"></i>
                                        </span>
                                    </span>
                            </div>
                            <input type="text" class="form-control border-left-0 bg-transparent pl-0" name="{{ $social }}" value="{{old($social) ?? ($user->$social ?? '')}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
