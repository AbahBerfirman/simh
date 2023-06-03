@extends('admin.layout.app')

@section('heading', 'Add User')

@section('right_top_button')
<a href="{{ route('admin_user_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_user_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">NIK *</label>
                                    <input type="text" class="form-control" name="nik" value="{{ old('nik') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Penempatan</label>
                                    <select name="arr_alamats[]" class="form-control">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_alamats as $item)
                                        @php $i++; @endphp
                                        <option value="{{ $item->id }}">
                                            {{ $item->alamatKota->name }} {{ $item->alamatApartement->name }} {{ $item->alamat }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Role</label>
                                    <select name="arr_roles[]" class="form-control">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_roles as $item)
                                        @php $i++; @endphp
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nama *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Password *</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
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
