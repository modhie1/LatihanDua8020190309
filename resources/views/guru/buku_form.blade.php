@extends('guru.layout')

@section('content')
 <div class="card">
     <div class="card-header bg-primary text-white">Buat Kelas Belajar Baru</div>

     <div class="card-body">
         {!! Form::model($model, ['url' => $url, 'method' => $method]) !!} 

         <div class="form-group">
             <label for="judul">Judul</label>
             {!! Form::text('judul', null, ['class' => 'form-control', 'autofocus']) !!}
             <span class="text-helper">{{ $errors->first('judul') }}</span>
         </div>

         <div class="form-group">
            <label for="pengarang">Pengarang</label>
            {!! Form::textarea('pengarang', null, ['class' => 'form-control', 'rows' => 3]) !!}
            <span class="text-helper">{{ $errors->first('pengarang') }}</span>
        </div>

       
        <div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>

         {!! Form::close() !!}          
     </div>
 </div>   
@endsection
