@extends('admin.layout.app')

@section('title', __('pages.products'))

@section('header')
<script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">{{ __('pages.products') }}</h4>
                <p class="card-title-desc">{{ __('pages.textproducts') }}</p>

                <a href="{{ route('products.create', ['lang' => $lang]) }}" class="btn btn-primary waves-effect waves-light mb-3">
                    {{ __('pages.create_product') }}
                </a>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>{{ __('pages.name') }}</th>
                            <th>{{ __('pages.price') }}</th>
                            <th>{{ __('pages.category') }}</th>
                            <th>{{ __('pages.image') }}</th>
                            <th>{{ __('pages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->{'name_' . app()->getLocale()} }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->category->{'name_' . app()->getLocale()} ?? '-' }}</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" alt="image" height="50">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', ['lang' => $lang, 'product' => $product->id]) }}"
                                       class="btn btn-sm btn-warning">
                                        {{ __('pages.edit') }}
                                    </a>

                                    <form action="{{ route('products.destroy', ['lang' => $lang, 'product' => $product->id]) }}"
                                        method="POST" class="d-inline" id="delete-form-{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $product->id }})">
                                            {{ __('pages.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Your custom JS -->
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '{{ __("هل أنت متأكد؟") }}',
                text: '{{ __("لن تتمكن من التراجع عن هذا!") }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{ __("نعم، احذف!") }}',
                cancelButtonText: '{{ __("إلغاء") }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        @if(session('success'))
            Swal.fire("{{ __('تم') }}", "{{ session('success') }}", "success");
        @endif

        @if(session('error'))
            Swal.fire("{{ __('خطأ') }}", "{{ session('error') }}", "error");
        @endif
    </script>
    <!-- DataTables Scripts -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection