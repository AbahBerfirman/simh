@extends('admin.layout.app')

@section('heading', 'Edit Transaction')

@section('right_top_button')
<a href="{{ route('admin_transaction_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_transaction_update',$transaction_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Kamar</label>
                                    <select name="arr_kamars[]" class="form-control">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_kamars as $item)
                                        @php $i++; @endphp
                                        <option @selected($item->id == $transaction_data->kamar_id) value="{{ $item->id }}">{{ $item->kamarAlamat->alamatKota->name }} {{ $item->kamarAlamat->alamatApartement->name }} No. Kamar {{ $item->no_kamar }}</option>
                                        @endforeach
                                    </select>
                                    {{-- @php $i=0; @endphp
                                    @foreach($all_kamars as $item)
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_kamars[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->kamarAlamat->alamatKota->name }} {{ $item->kamarAlamat->alamatApartement->name }} No. Kamar {{ $item->no_kamar }}
                                        </label>
                                    </div>
                                    @endforeach --}}
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Duration</label>
                                    @php $i=0; @endphp
                                    @foreach($all_durations as $item)

                                    @if(in_array($item->id,$existing_durations))
                                    @php $checked_type = 'checked'; @endphp
                                    @else
                                    @php $checked_type = ''; @endphp
                                    @endif

                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_durations[]" {{ $checked_type }}>
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->duration }} Jam
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Customer</label>
                                    <select name="arr_kamars[]" class="form-control">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_customers as $item)
                                        @php $i++; @endphp
                                        <option @selected($item->id == $transaction_data->pelanggan_id) value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Broker</label>
                                    <select name="arr_kamars[]" class="form-control">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_brokers as $item)
                                        @php $i++; @endphp
                                        <option @selected($item->id == $transaction_data->broker_id) value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Tanggal Transaksi *</label>
                                    <input type="text" class="form-control" name="transaction_date" value="{{ $transaction_data->transaction_date }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Check-In *</label>
                                    <input type="text" class="form-control" name="checkin_date" value="{{ $transaction_data->checkin_date }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Check-Out *</label>
                                    <input type="text" class="form-control" name="checkout_date" value="{{ $transaction_data->checkout_date }}">
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
