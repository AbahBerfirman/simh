@extends('admin.layout.app')

@section('heading', 'Input Data Tamu')

@section('right_top_button')
<a href="{{ route('admin_transaction_view') }}" class="btn btn-primary"><i class="fa fa-chevron-left"></i>  Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_transaction_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Kamar *</label>
                                    <input type="hidden" class="form-control" name="kamar_id" value="{{ $all_kamars->id }}">
                                    <input type="text" class="form-control" value="{{ $all_kamars->kamarAlamat->alamatApartement->name }} No.{{ $all_kamars->no_kamar }}" readonly>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Duration *</label> <br>
                                    @php $i=0; @endphp
                                    @foreach($all_durations as $item)
                                    @php $i++; @endphp
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_durations[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->duration }} Jam
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Customer *</label>
                                    <label class="form-label ml-auto btn-block justify-content-end">Customer *</label>
                                    <select name="arr_customers[]" class="form-control select2Custom">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_customers as $item)
                                        @php $i++; @endphp
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Broker *</label>
                                    <select name="arr_brokers[]" class="form-control">
                                        <option value="">--- Pilih ---</option>
                                        @php $i=0; @endphp
                                        @foreach($all_brokers as $item)
                                        @php $i++; @endphp
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Tanggal Transaksi *</label>
                                    <input type="date" class="form-control" name="transaction_date" value="{{ old('transaction_date') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Waktu Check-In *</label>
                                    <input type="datetime-local" class="form-control" name="checkin_date" value="{{ old('checkin_date') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Total Amount *</label>
                                    <input type="text" class="form-control" name="paid_amount" value="{{ old('paid_amount') }}">
                                </div>

                                <input type="hidden" class="form-control hidden" name="checkout_date" value="null" >

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Check-In</button>
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
