@extends('admin.layout.app')

@section('heading', 'View Customers')

@section('right_top_button')
<a href="{{ route('admin_pelanggan_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Jenis ID</th>
                                    <th>Name</th>
                                    <th>No. Hp</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($customers as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->jenis_identitas }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td class="pt_10 pb_10">

                                        {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Detail</button> --}}

                                        {{-- <a href="{{ route('admin_pelanggan_gallery',$row->id) }}" class="btn btn-success">Gallery</a> --}}

                                        <a href="{{ route('admin_pelanggan_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_pelanggan_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
