@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Daftar Siswa PPLG XI-5</title>
</head>
<body>
      @if (session('successDelete'))
      <div class="alert alert-danger">
          {{ session('successDelete') }}        
      </div>        
      @endif

    @if (session('suksesUp'))
    <div class="alert alert-success">
        {{ session('suksesUp') }}        
    </div>        
    @endif

    @if (session('successAdd'))
    <div class="alert alert-success">
        {{ session('successAdd') }}        
    </div>        
    @endif

    @if (session('suksesDown'))
    <div class="alert alert-warning">
        {{ session('suksesDown') }}        
    </div>        
    @endif
<div class="tengah">

  <table class="table table-successs table-striped">
    <thead class="table-dark">
      
      <tr>
        <th scope="col">No.</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama</th>
        <th scope="col">Rayon</th>
        <th scope="col-7">Uang</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($data as $item)
          
      <tr>
       <td>{{$loop->iteration}}.</td>
        <td>{{$item->nis}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->rayon}}</td>
        <td>Rp {{number_format($item->money,2,',','.')}}</td>
        <td><form action="{{route('nabung.hapus', $item->id)}}" method="POST">
          <a class="btn btn-success" href="{{route('nabung.edit', $item->id)}}">
          <i class="mdi mdi-cash-multiple"></i></a>
          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">
            <i class="mdi mdi-delete-empty"></i>
          </button>
      </form>
      </tr>  
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>

  
@endsection