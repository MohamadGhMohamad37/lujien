@extends('admin.layout.app')

@section('title', __('pages.orders'))

@section('header')
<script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">{{ __('pages.orders') }}</h4>
                <p class="card-title-desc">{{ __('pages.orders_list') }}</p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>{{ __('pages.order_id') }}</th>
                            <th>{{ __('pages.user_id') }}</th>
                            <th>{{ __('pages.products') }}</th>
                            <th>{{ __('pages.created_at') }}</th>
                            <th>{{ __('pages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>
                                    <ul style="list-style:none; padding:0; margin:0;">
                                        @foreach($order->items as $item)
                                            <li>
                                                <strong>{{ $item->product->{'name_' . app()->getLocale()} ?? '-' }} </strong>
                                                <br>
                                                {{ __('pages.quantity') }}: {{ $item->quantity }},
                                                {{ __('pages.price') }}: ${{ number_format($item->price, 2) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                        <a href="{{ route('orders.show', ['lang' => app()->getLocale(), 'order' => $order->id]) }}" class="btn btn-info btn-sm">
                                            {{ __('pages.view') }}
                                        </a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
