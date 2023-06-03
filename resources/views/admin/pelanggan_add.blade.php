@extends('admin.layout.app')

@section('heading', 'Add Customer')

@section('right_top_button')
<a href="{{ route('admin_pelanggan_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_pelanggan_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">ID *</label>
                                    <input type="text" class="form-control" name="id" value="{{ old('id') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Jenis Identitas *</label>
                                    <input type="text" class="form-control" name="jenis_identitas" value="{{ old('jenis_identitas') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nomor HP *</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
