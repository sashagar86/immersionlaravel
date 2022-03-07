<!-- email -->
<div class="form-group">
    <label class="form-label" for="simpleinput">{{ __('Email') }}</label>
    <input type="text" id="simpleinput" class="form-control" name="email" value="{{ old('email') ?? ($user->email ?? '') }}">
</div>

<!-- password -->
<div class="form-group">
    <label class="form-label" for="simpleinput">{{ __('Password') }}</label>
    <input type="password" id="simpleinput" class="form-control" name="password">
</div>
