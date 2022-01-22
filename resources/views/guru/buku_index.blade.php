@extends('guru.layout')

@section('content')
 <div class="card">
     <div class="card-header bg-primary text-white">Daftar  Buku</div>

     <div class="card-body">
         <a href="{{ url('guru/buku/create', []) }}" class="btn btn-primary btn-sm">Buat Buku</a>
           <div class="table-responsive">
               <table class="table table-striped table-hover table-bordered">
                   <thead>
                       <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Pengarang</th>                          
                       </tr>
                   </thead>
                   <tbody>
                       @forelse ($model as $item)
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $item->judul }}</td>
                               <td>{{ $item->pengarang }}</td>
                            
                               <td>
                                <a href="{{ url('guru/buku/'.$item->id) }}" class="btn btn-info btn-sm">Read</a>
                                
                                 
                                <a href="{{ url('guru/buku/'.$item->id.'/edit') }}" class="btn btn-info btn-sm ml-3 mr-3">Edit</a>
                                {!! Form::open(['url' => 'guru/buku/' .$item->id, 'method' => 'DELETE']) !!} 
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
