<h2 class="write">Viết Bình Luận
        @if($errors->has('commentable_type'))
            <sup class="text-danger" id="message">{{ $errors->get('commentable_type') }}</sup>
        @endif
        @if($errors->has('commentable_id'))
            <sup class="text-danger" id="message">{{ $errors->get('commentable_id') }}</sup>
        @endif
    </h2>
    <form method="POST" action="{{ url('comments') }}">
        @csrf
        @honeypot
        <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
        <input type="hidden" name="commentable_id" value="{{ $model->id }}" />
        @if(isset($guest_commenting) and $guest_commenting == true)
            <div class="form-group required col-sm-6">
                <label class="control-label" for="message">Nhập Email :</label>
                <input class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" type="email">
                @error('guest_email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group required col-sm-12">
                <label class="control-label" for="message">Nội dung bình luận :</label>
                <textarea class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" rows="3"></textarea>
                @error('guest_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif

        <div class="form-group required col-sm-12">
                <label class="control-label" for="message">Nội dung bình luận :</label>
                <textarea class="form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                <div class="invalid-feedback">
                    Nội dung bình luận không được bỏ trống!
                </div>
            </div>

        <div class="buttons si-button">
            <div class="pull-left">
                <input id='button-review' class="btn btn-primary" type="submit" value="Gửi" />
            </div>
        </div>
    </form>
    <br />
