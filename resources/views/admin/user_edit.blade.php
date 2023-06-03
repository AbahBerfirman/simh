@extends('admin.layout.app')

@section('heading', 'Edit User')

@section('right_top_button')
<a href="{{ route('admin_user_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_user_update',$user_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-4">
                                <label class="form-label">NIK *</label>
                                <input type="text" class="form-control" name="nik" value="{{ $user_data->nik }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Penempatan</label>
                                <select name="arr_alamats[]" class="form-control">
                                    <option value="">--- Pilih ---</option>
                                    @php $i=0; @endphp
                                    @foreach($all_alamats as $item)
                                    @php $i++; @endphp
                                    <option @selected($item->id == $user_data->alamat_id) value="{{ $item->id }}">
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
                                    <option @selected($item->id == $user_data->user_role_id) value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Nama *</label>
                                <input type="text" class="form-control" name="name" value="{{ $user_data->name }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ $user_data->email }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password *</label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
