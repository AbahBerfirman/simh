@extends('admin.layout.app')

@section('heading', 'Add kamar')

@section('right_top_button')
<a href="{{ route('admin_kamar_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_kamar_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <div class="mb-4">
                                        <label class="form-label">Alamat</label>
                                        @php $i=0; @endphp
                                        @foreach($all_alamats as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_alamats[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->alamatApartement->name }} {{ $item->alamat }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nomor Kamar *</label>
                                    <input type="text" class="form-control" name="no_kamar" value="{{ old('no_kamar') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" id="select2">
                                        <option value="AVAILABLE" selected='selected'>AVAILABLE</option>
                                        <option value="UNAVAILABLE">UNAVAILABLE</option>
                                        <option value="MAINTENANCE">MAINTENANCE</option>
                                    </select>
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
