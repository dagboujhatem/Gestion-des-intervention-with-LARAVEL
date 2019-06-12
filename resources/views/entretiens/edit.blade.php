@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier l'entretien
        </h1>
    </section> 
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($entretien, ['route' => ['entretiens.update', $entretien->id], 'method' => 'patch']) !!}

                        @include('entretiens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> 
@endsection