<div class="form-group row">
    <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

    <div class="col-md-6">
        <select id="category_id" class="form-control" name="category_id">
            @foreach(\App\Models\Category::get() as $category)
                <option value="{{ $category->id }}" @if($medicine->category_id === $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

    <div class="col-md-6">
        <select id="company_id" class="form-control" name="company_id">
            @foreach(\App\Models\Company::get() as $company)
                <option value="{{ $company->id }}" @if($medicine->company_id === $company->id) selected @endif>{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ is_null($name = old('name')) ? $medicine ? $medicine->name : '' : $name}}">

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="short_text" class="col-md-4 col-form-label text-md-right">{{ __('Short Text') }}</label>

    <div class="col-md-6">
        <textarea id="short_text" type="text_area" class="form-control{{ $errors->has('short_text') ? ' is-invalid' : '' }}" name="short_text">{{ is_null($short_text = old('short_text')) ? $medicine ? $medicine->short_text : '' : $short_text  }}</textarea>

        @if ($errors->has('short_text'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('short_text') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="long_text" class="col-md-4 col-form-label text-md-right">{{ __('Long Text') }}</label>

    <div class="col-md-6">
        <textarea id="long_text" type="text_area" class="form-control{{ $errors->has('short_text') ? ' is-invalid' : '' }}" name="long_text">{{ is_null($long_text = old('long_text')) ? $medicine ? $medicine->long_text : '' : $long_text  }}</textarea>

        @if ($errors->has('long_text'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('long_text') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('Image url') }}</label>

    <div class="col-md-6">
        <input id="image_url" type="text" class="form-control{{ $errors->has('image_url') ? ' is-invalid' : '' }}" name="image_url" value="{{ is_null($image_url = old('image_url')) ? $medicine ? $medicine->image_url : '' : $image_url}}">

        @if ($errors->has('image_url'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_url') }}</strong>
                                    </span>
        @endif
        <img src="{{ $medicine->image_url }}" alt="" height="800" width="500" class="img-fluid mt-2">
        <div class="form-check row mt-5">
                <input type="checkbox" class="form-check-input" id="is_published" @if($medicine->is_published) checked value="1" @else value="0" @endif name="is_published">
                <label for="is_published" class="form-check-label">{{ __('Published') }}</label>
        </div>

    </div>

</div>




<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>
    </div>
</div>