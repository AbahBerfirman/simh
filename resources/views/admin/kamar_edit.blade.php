@extends('admin.layout.app')

@section('heading', 'Edit Kamar')

@section('right_top_button')
<a href="{{ route('admin_kamar_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_kamar_update',$kamar_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Alamat</label>
                                    @php $i=0; @endphp
                                    @foreach($all_alamats as $item)

                                    @if(in_array($item->id,$existing_alamats))
                                    @php $checked_type = 'checked'; @endphp
                                    @else
                                    @php $checked_type = ''; @endphp
                                    @endif

                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_alamats[]" {{ $checked_type }}>
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->alamatApartement->name }} {{ $item->alamat }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nomor Kamar *</label>
                                    <input type="text" class="form-control" name="no_kamar" value="{{ $kamar_data->no_kamar }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <input type="text" class="form-control" name="description" value="{{ $kamar_data->description }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="status">
                                        <option value="AVAILABLE" {{($kamar_data->status === 'AVAILABLE') ? 'Selected' : ''}}>AVAILABLE</option>
                                        <option value="UNAVAILABLE"{{($kamar_data->status === 'UNAVAILABLE') ? 'Selected' : ''}}>UNAVAILABLE</option>
                                        <option value="MAINTENANCE"{{($kamar_data->status === 'MAINTENANCE') ? 'Selected' : ''}}>MAINTENANCE</option>
                                    </select>
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
