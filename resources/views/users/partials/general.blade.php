<div id="panel-1" class="panel">
    <div class="panel-container">
        <div class="panel-hdr">
            <h2> {{ __('General Information') }}</h2>
        </div>
        <div class="panel-content">
            <!-- username -->
            <div class="form-group">
                <label class="form-label" for="simpleinput">{{ __('Name') }}</label>
                <input type="text" id="simpleinput" class="form-control" name="name" value="{{ old('name') ?? ($user->name ?? '') }}">
            </div>

            <!-- title -->
            <div class="form-group">
                <label class="form-label" for="simpleinput">{{ __('Position') }}</label>
                <input type="text" id="simpleinput" class="form-control" name="position" value="{{ old('position') ?? ($user->position ?? '') }}">
            </div>

            <!-- tel -->
            <div class="form-group">
                <label class="form-label" for="simpleinput">{{ __('Phone') }}</label>
                <input type="text" id="simpleinput" class="form-control" name="phone" value="{{ old('phone') ?? ($user->phone ?? '') }}">
            </div>

            <!-- address -->
            <div class="form-group">
                <label class="form-label" for="simpleinput">{{ __('Address') }}</label>
                <input type="text" id="simpleinput" class="form-control" name="address" value="{{ old('address') ?? ($user->address ?? '') }}">
            </div>
        </div>
    </div>

</div>
