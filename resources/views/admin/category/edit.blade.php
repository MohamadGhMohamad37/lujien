@extends('admin.layout.app')

@section('title', __('pages.edit_categories'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">{{ __('pages.edit_categories') }}</h4>

                    <form action="{{ route('categories.update', ['lang' => $lang, 'category' => $category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name English -->
                        <div class="mb-3">
                            <label for="name_en" class="form-label">{{ __('pages.name_en') }}</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                   id="name_en" name="name_en" value="{{ old('name_en', $category->name_en) }}" required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name Arabic -->
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">{{ __('pages.name_ar') }}</label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                   id="name_ar" name="name_ar" value="{{ old('name_ar', $category->name_ar) }}">
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description English -->
                        <div class="mb-3">
                            <label for="desc_en" class="form-label">{{ __('pages.desc_en') }}</label>
                            <textarea id="desc_en" name="desc_en" class="form-control tinymce-editor">{{ old('desc_en', $category->desc_en) }}</textarea>
                            @error('desc_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Arabic -->
                        <div class="mb-3">
                            <label for="desc_ar" class="form-label">{{ __('pages.desc_ar') }}</label>
                            <textarea id="desc_ar" name="desc_ar" class="form-control tinymce-editor">{{ old('desc_ar', $category->desc_ar) }}</textarea>
                            @error('desc_ar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('pages.update') }}</button>
                        <a href="{{ route('categories.index', ['lang' => $lang]) }}" class="btn btn-secondary">{{ __('pages.cancel') }}</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('admin/assets/js/editor.init.js') }}"></script>
<script src="{{ asset('admin/assets/js/form-editor.init.js') }}"></script>
<script src="{{ asset('admin/assets/js/tinymce/tinymce.min.js') }}"></script>
@endsection
