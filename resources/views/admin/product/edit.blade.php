@extends('admin.layout.app')

@section('title', __('pages.edit_product'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">{{ __('pages.edit_product') }}</h4>

                    <form action="{{ route('products.update', ['lang' => $lang, 'product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name EN -->
                        <div class="mb-3">
                            <label for="name_en" class="form-label">{{ __('pages.name_en') }}</label>
                            <input type="text" name="name_en" id="name_en"
                                class="form-control @error('name_en') is-invalid @enderror"
                                value="{{ old('name_en', $product->name_en) }}" required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name AR -->
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">{{ __('pages.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar"
                                class="form-control @error('name_ar') is-invalid @enderror"
                                value="{{ old('name_ar', $product->name_ar) }}" required>
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description EN -->
                        <div class="mb-3">
                            <label for="desc_en" class="form-label">{{ __('pages.desc_en') }}</label>
                            <textarea name="desc_en" id="desc_en"
                                class="form-control tinymce-editor @error('desc_en') is-invalid @enderror">{{ old('desc_en', $product->desc_en) }}</textarea>
                            @error('desc_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description AR -->
                        <div class="mb-3">
                            <label for="desc_ar" class="form-label">{{ __('pages.desc_ar') }}</label>
                            <textarea name="desc_ar" id="desc_ar"
                                class="form-control tinymce-editor @error('desc_ar') is-invalid @enderror">{{ old('desc_ar', $product->desc_ar) }}</textarea>
                            @error('desc_ar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('pages.price') }}</label>
                            <input type="number" step="0.01" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', $product->price) }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Color -->
                        <div class="mb-3">
                            <label for="color" class="form-label">{{ __('pages.color') }}</label>
                            <input type="text" name="color" id="color"
                                class="form-control @error('color') is-invalid @enderror"
                                value="{{ old('color', $product->color) }}">
                            @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Color Code -->
                        <div class="mb-3">
                            <label for="color_code" class="form-label">{{ __('pages.color_code') }}</label>
                            <input type="text" name="color_code" id="color_code"
                                class="form-control @error('color_code') is-invalid @enderror"
                                value="{{ old('color_code', $product->color_code) }}">
                            @error('color_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Size -->
                        <div class="mb-3">
                            <label for="size" class="form-label">{{ __('pages.size') }}</label>
                            <input type="text" name="size" id="size"
                                class="form-control @error('size') is-invalid @enderror"
                                value="{{ old('size', $product->size) }}">
                            @error('size')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">{{ __('pages.category') }}</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">{{ __('pages.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
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

                        <!-- Current Gallery Images -->
                        @php
                            $galleryImages = $product->images;

                            if (is_string($galleryImages)) {
                                $galleryImages = json_decode($galleryImages, true);
                            }
                        @endphp

                        @if (is_array($galleryImages) && count($galleryImages))
                            <div class="mb-3">
                                <label class="form-label">{{ __('pages.current_gallery_images') }}</label><br>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($galleryImages as $img)
                                        <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image" height="80">
                                    @endforeach
                                </div>
                            </div>
                        @endif

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
                        <button type="submit" class="btn btn-success">{{ __('pages.update') }}</button>
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
