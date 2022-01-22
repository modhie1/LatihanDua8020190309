@extends('guru.layout')

@section('content')
 <div class="card">
     <div class="card-header bg-primary text-white">Daftar Kelas</div>

     <div class="card-body">
         <a href="{{ url('guru/kelas/create', []) }}" class="btn btn-primary btn-sm">Buat Kelas</a>
           <div class="table-responsive">
               <table class="table table-striped table-hover table-bordered">
                   <thead>
                       <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Kode</th>
                          <th>Tanggal Buat</th>
                          <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @forelse ($model as $item)
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $item->nama }}</td>
                               <td>{{ $item->deskripsi }}</td>
                               <td>{{ $item->kode }}</td>
                               <td>{{ $item->created_at }}</td>
                               <td>
                                   <a href="{{ url('guru/kelas/'.$item->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>

                                {!! Form::open(['url' => 'guru/kelas/' .$item->id, 'method' => 'DELETE']) !!} 
                                   <button type="submit" class="btn btn-danger">Hapus</button>
                                {!! Form::close() !!}  
                               </td>
                           </tr>
                       @empty
                           <tr>
                               <td colspan="5">Data tidak ada</td>
                           </tr>
                       @endforelse
                   </tbody>
               </table>
           </div>
     </div>
 </div>   
@endsection
