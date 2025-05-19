@extends('admin.layout.app')

@section('title', 'Categories')

@section('header')
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

                    <h4 class="header-title">{{ __('pages.categories') }}</h4>
                    <p class="card-title-desc">{{ __('pages.textcategories') }}</p>

                    <a href="{{ route('categories.create', ['lang' => $lang]) }}" class="btn btn-primary waves-effect waves-light mb-3">
                        {{ __('pages.create_categories') }}
                    </a>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>{{ __('pages.name') }}</th>
                                <th>{{ __('pages.desc') }}</th>
                                <th>{{ __('pages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->{'name_' . app()->getLocale()} }}</td>
                                    <td>{!! $category->{'desc_' . app()->getLocale()} !!}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['lang' => $lang, 'category' => $category->id]) }}"
                                           class="btn btn-sm btn-warning">
                                            {{ __('pages.edit') }}
                                        </a>

                                        <form action="{{ route('categories.destroy', ['lang' => $lang, 'category' => $category->id]) }}"
                                              method="POST" class="d-inline" id="delete-form-{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete({{ $category->id }})">
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

    <!-- SweetAlert Delete Confirmation -->
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
    </script>
@endsection

@section('script')
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

    <!-- Show success/error messages -->
    <script>
        @if(session('success'))
            Swal.fire("{{ __('تم') }}", "{{ session('success') }}", "success");
        @endif

        @if(session('error'))
            Swal.fire("{{ __('خطأ') }}", "{{ session('error') }}", "error");
        @endif
    </script>
@endsection
