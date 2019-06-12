@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier un équipement 
        </h1>
    </section> 
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($equipement, ['route' => ['equipements.update', $equipement->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('equipements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> 
@endsection