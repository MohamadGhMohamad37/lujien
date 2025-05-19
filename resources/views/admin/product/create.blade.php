@extends('admin.layout.app')

@section('title', __('pages.create_product'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">{{ __('pages.create_product') }}</h4>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <form action="{{ route('products.store', ['lang' => $lang]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name EN -->
                        <div class="mb-3">
                            <label for="name_en" class="form-label">{{ __('pages.name_en') }}</label>
                            <input type="text" name="name_en" id="name_en"
                                class="form-control @error('name_en') is-invalid @enderror"
                                value="{{ old('name_en') }}" required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name AR -->
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">{{ __('pages.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar"
                                class="form-control @error('name_ar') is-invalid @enderror"
                                value="{{ old('name_ar') }}" required>
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description EN -->
                        <div class="mb-3">
                            <label for="desc_en" class="form-label">{{ __('pages.desc_en') }}</label>
                            <textarea name="desc_en" id="desc_en"
                                class="form-control tinymce-editor @error('desc_en') is-invalid @enderror">{{ old('desc_en') }}</textarea>
                            @error('desc_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description AR -->
                        <div class="mb-3">
                            <label for="desc_ar" class="form-label">{{ __('pages.desc_ar') }}</label>
                            <textarea name="desc_ar" id="desc_ar"
                                class="form-control tinymce-editor @error('desc_ar') is-invalid @enderror">{{ old('desc_ar') }}</textarea>
                            @error('desc_ar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('pages.price') }}</label>
                            <input type="number" step="0.01" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Discount Price -->
                        <div class="mb-3">
                            <label for="discount_price" class="form-label">{{ __('pages.discount_price') }}</label>
                            <input type="number" step="0.01" name="discount_price" id="discount_price"
                                class="form-control @error('discount_price') is-invalid @enderror"
                                value="{{ old('discount_price') }}">
                            @error('discount_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Color -->
                        <div class="mb-3">
                                <div id="colors-wrapper">
                                    <div class="color-input-group">
                                        <input type="text" name="colors[]" placeholder="Color Name" class="form-control mb-2" />
                                        <input type="color" name="color_codes[]" class="form-control mb-2" />
                                    </div>
                                </div>
                                <button type="button" onclick="addColorField()">Add Another Color</button>

                                <script>
                                    function addColorField() {
                                        const wrapper = document.getElementById('colors-wrapper');
                                        const group = document.createElement('div');
                                        group.classList.add('color-input-group');
                                        group.innerHTML = `
                                            <input type="text" name="colors[]" placeholder="Color Name" class="form-control mb-2" />
                                            <input type="color" name="color_codes[]" class="form-control mb-2" />
                                        `;
                                        wrapper.appendChild(group);
                                    }
                                </script>

                            @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Size -->
                        <div class="mb-3">
                            <label for="size" class="form-label">{{ __('pages.size') }}</label>
<div id="size-wrapper">
    <input type="text" name="size[]" class="form-control mb-2" placeholder="ex: S">
</div>
<button type="button" class="btn btn-sm btn-success mb-3" onclick="addSizeField()">Add Another</button>

                            @error('size')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
<script>
    function addSizeField() {
        const wrapper = document.getElementById('size-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'size[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'ex: M';
        wrapper.appendChild(input);
    }
</script>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">{{ __('pages.category') }}</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">{{ __('pages.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->{'name_' . app()->getLocale()} }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Main Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('pages.main_image') }}</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gallery Images -->
                        <div class="mb-3">
                            <label for="images" class="form-label">{{ __('pages.gallery_images') }}</label>
                            <input type="file" name="images[]" id="images" multiple
                                class="form-control @error('images.*') is-invalid @enderror">
                            @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-success">{{ __('pages.save') }}</button>
                        <a href="{{ route('products.index', ['lang' => $lang]) }}" class="btn btn-secondary">{{ __('pages.cancel') }}</a>

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
