@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier une pièce
        </h1>
    </section> 
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($piece, ['route' => ['pieces.update', $piece->id], 'method' => 'patch']) !!}

                        @include('pieces.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection