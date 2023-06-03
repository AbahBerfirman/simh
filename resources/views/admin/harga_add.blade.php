@extends('admin.layout.app')

@section('heading', 'Add Harga')

@section('right_top_button')
<a href="{{ route('admin_harga_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_harga_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Kamar</label>
                                    @php $i=0; @endphp
                                    @foreach($all_kamars as $item)
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_kamars[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->kamarAlamat->alamatKota->name }} {{ $item->kamarAlamat->alamatApartement->name }} No. Kamar {{ $item->no_kamar }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Duration</label>
                                    @php $i=0; @endphp
                                    @foreach($all_durations as $item)
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_durations[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->duration }} Jam
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Harga *</label>
                                    <input type="text" class="form-control" name="harga" value="{{ old('harga') }}">
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
