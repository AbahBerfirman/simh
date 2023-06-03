@extends('admin.layout.app')

@section('heading', 'Edit Alamat')

@section('right_top_button')
<a href="{{ route('admin_alamat_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_alamat_update',$alamat_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Kota</label>
                                    @php $i=0; @endphp
                                    @foreach($all_kotas as $item)

                                    @if(in_array($item->id,$existing_kotas))
                                    @php $checked_type = 'checked'; @endphp
                                    @else
                                    @php $checked_type = ''; @endphp
                                    @endif

                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_kotas[]" {{ $checked_type }}>
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Apartement</label>
                                    @php $i=0; @endphp
                                    @foreach($all_apartements as $item)

                                    @if(in_array($item->id,$existing_apartements))
                                    @php $checked_type = 'checked'; @endphp
                                    @else
                                    @php $checked_type = ''; @endphp
                                    @endif

                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_apartements[]" {{ $checked_type }}>
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Alamat *</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $alamat_data->alamat }}">
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
