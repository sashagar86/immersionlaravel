<div class="form-group">
    <label class="form-label" for="example-select">{{ __('Status') }}</label>
    <select class="form-control" id="example-select" name="status">
        @foreach($statuses as $key => $status)
            <option value="{{ $key }}" {{ (old('status') === $key || (!empty($user) && $key === $user->status)) ? 'selected' : '' }}>{{ $status }}</option>
        @endforeach
    </select>
</div>
