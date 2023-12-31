@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Name Of Goods</th>
                                    <th>Photo</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @forelse ($items as $item)
                                        <?php $no++; ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>
                                                <img src="{{ url($item->photo) }}" alt="" />
                                            </td>
                                            <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <a href="{{ route('product-galleries.edit', $item->id) }}" class="href btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('product-galleries.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data not found.
                                            </td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection