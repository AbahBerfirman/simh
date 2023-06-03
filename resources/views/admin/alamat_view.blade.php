@extends('admin.layout.app')

@section('heading', 'View Alamat')

@section('right_top_button')
<a href="{{ route('admin_alamat_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                    <th>Kota</th>
                                    <th>Apartement</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($alamats as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->alamatKota->name }}</td>
                                    <td>{{ $row->alamatApartement->name }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td class="pt_10 pb_10">

                                        {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Detail</button> --}}

                                        {{-- <a href="{{ route('admin_alamat_gallery',$row->id) }}" class="btn btn-success">Gallery</a> --}}

                                        <a href="{{ route('admin_alamat_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_alamat_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
