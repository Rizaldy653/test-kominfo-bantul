@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalProduct">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="productTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Supplier Id</th>
                    <th>Category Id</th>
                    <th>Qty/unit</th>
                    <th>Unit Price</th>
                    <th>Unit in Stock</th>
                    <th>Unit in Order</th>
                    <th>Reorder level</th>
                    <th>Discontinued</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                processing: true,
                ajax: {
                    url: "{{ route('products.index') }}",
                    dataSrc: data.dats
                },
                columns: [{
                        data: null,
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    {
                        data: 'product_name'
                    },
                    {
                        data: 'supplier_id'
                    },
                    {
                        data: 'category_id'
                    },
                    {
                        data: 'qty_per_unit'
                    },
                    {
                        data: 'unit_price',
                        render: $.fn.dataTable.render.number(',', '.', 2,
                            '$')
                    },
                    {
                        data: 'units_in_stock'
                    },
                    {
                        data: 'units_on_order'
                    },
                    {
                        data: 'reorder_level'
                    },
                    {
                        data: 'discontinued',
                        render: function(data) {
                            return data == 1 ?
                                '<span class="badge badge-danger">Yes</span>' :
                                '<span class="badge badge-success">No</span>';
                        }
                    }
                ]
            });
        });
    </script>
@endpush
