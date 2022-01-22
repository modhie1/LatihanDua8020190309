@extends('guru.layout')

@section('content')
 <div class="card">
     <div class="card-header bg-primary text-white">Daftar  Buku</div>

     <div class="card-body">
         <a href="{{ url('guru/buku/create', []) }}" class="btn btn-primary btn-sm">Buat Buku</a>
           <div class="table-responsive">
                    `  <table class="table table-light table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <tdwidth="12%">judul</tdwidth=>
                                    <td>{{ $model->judul }}</td>
                                </td>
                                <td>
                                    <td>pengarang</td>
                                    <td>{{ $model->pengarang }}</td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
           </div>
              
     </div>
 </div>   
@endsection
