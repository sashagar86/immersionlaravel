<div class="form-group">
    <label class="form-label" for="example-fileinput">{{ __('Upload avatar') }}</label>

    @if(!empty($user))
        <div class="form-group">
            <img src="{{$user->thumbnailAvatar}}" alt="" class="img-responsive" width="200">
        </div>
    @endif

    <input type="file" id="example-fileinput" class="form-control-file" name="image">
</div>
