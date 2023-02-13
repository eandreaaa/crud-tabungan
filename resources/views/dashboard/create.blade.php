@extends('layout')

@section('content')

<style>
  .col-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
    margin-bottom: 10px;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
  }
  </style>

  <div class="card text-center">
    <div class="card-header">Menabunglah meskipun hanya sedikit.</div>
    <div class="card-body">
      <h5 class="card-title">Menambahkan siswa menabung.com</h5>
      <br>
      <form id="create-form" action="{{route('nabung.store')}}" method="POST">

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

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

            <div class="col-7">
              <input type="number" class="form-control" placeholder="NIS" name="nis" value="{{old('nis')}}">
            </div>
  
            <div class="number-only col-7">
              <input type="only-number" class="form-control" placeholder="Nama Lengkap" name="name" value="{{old('name')}}">
            </div>
  
            <div class="col-7">
              <select class="form-control" name="rayon">
                <option selected disabled>Rayon</option>
                <option>Wikrama 1</option>
                <option>Wikrama 2</option>
                <option>Wikrama 3</option>
                <option>Wikrama 4</option>
              </select>
            </div>
  
            <div class="input-group flex-nowrap col-7">
              <span class="input-group-text" id="addon-wrapping">Rp</span>
              <input type="number" class="form-control" placeholder="Uang yang akan ditabungkan" aria-describedby="addon-wrapping" name="money" value="{{old('money')}}">
            </div>  
            <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-account-plus"></i>
          </button>
        <fieldset>
          <a href="/nabung" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
      </form>
    </div>
    <div class="card-footer text-muted">
      PPLG XI-5 - SMK Wikrama Bogor
    </div>
  </div>

@endsection