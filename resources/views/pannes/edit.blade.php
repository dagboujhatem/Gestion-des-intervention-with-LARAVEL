@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier une panne
        </h1>
    </section> 
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($panne, ['route' => ['pannes.update', $panne->id], 'method' => 'patch']) !!}

                        @include('pannes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> 
@endsection