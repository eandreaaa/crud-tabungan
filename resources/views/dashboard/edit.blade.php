@extends('layout')

@section('content')

<style>
  .col-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
    margin-bottom: 10px;
  }
  </style>

  <div class="card text-center">
    <div class="card-header">
      Sedikit demi sedikit, lama lama jadi bukit.
    </div>
    <div class="card-body">
      <h5 class="card-title">Edit siswa menabung.com</h5>
      <form id="create-form" action="{{route('nabung.update', $tabungan->id)}}" method="POST">

        @method('patch')
        @csrf
       
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
              </ul>
            </div>
        @endif

      <form method="POST" action="/update/{tabungan:id}">
            <div class="col-7">
              <input type="number" class="form-control" placeholder="NIS" name="nis" value="{{ $tabungan->nis }}" readonly>
            </div>
  
            <div class="col-7">
              <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{$tabungan->name}}" readonly>
            </div>
  
            <div class="col-7">
              <input type="text" class="form-control" name="rayon" value="{{$tabungan->rayon}}" readonly>
            </div>
  
            <div class="input-group flex-nowrap col-7">
              <span class="input-group-text" id="addon-wrapping">Rp</span>
              <input type="number" class="form-control" placeholder="Uang yang akan ditabungkan" aria-describedby="addon-wrapping" name="money" readonly value="{{ $tabungan->money }}" readonly>
            </div>  

            <div class="col-7">
                <label class="text-left" for="operasi">Pilih Operasi</label>
                <select class="form-control" id="operasi" name="aksi">
                  <option disabled>Operasi</option>
                  <option value="tarik">Tarik</option>
                  <option value="nabung">Tabung</option>
                </select>
              </div>

              <div class="input-group flex-nowrap col-7">
                <span class="input-group-text" id="addon-wrapping">Rp</span>
                <input type="number" class="form-control" placeholder="Jumlah uang" aria-describedby="addon-wrapping" name="money2">
              </div>  
        <fieldset>
          <button type="submit" class="btn btn-outline-success">Selesai</button>
        </fieldset>
        <fieldset>
          <a href="{{url('/nabung/dashboard')}}" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
      </form>
    </div>
    <div class="card-footer text-muted">
      PPLG XI-5 - SMK Wikrama Bogor
    </div>
  </div>

@endsection