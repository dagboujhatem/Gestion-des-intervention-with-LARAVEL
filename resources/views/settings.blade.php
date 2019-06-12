@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paramètres de l'application
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model(Auth::user(), ['route' => ['settings.save', Auth::user()->id], 'method' => 'post']) !!}

                        <!-- Stock Field -->
                        <div class="form-group col-sm-6 has-feedback{{ $errors->has('stock') ? ' has-error' : '' }}">
                            {!! Form::label('stock', 'Minimum des pièces avant l\'alerte:') !!}
                            {!! Form::number('stock', config('app.stock') , ['class' => 'form-control', 'min' => '1']) !!}
                        </div>  

                        <!-- Jours Field -->
                        <div class="form-group col-sm-6 has-feedback{{ $errors->has('jours') ? ' has-error' : '' }}">
                            {!! Form::label('jours', 'Minimum des jours avant l\'alerte:') !!}
                            {!! Form::number('jours', config('app.jours'), ['class' => 'form-control', 'min' => '1']) !!}
                        </div> 
                  
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Enregister', ['class' => 'btn btn-primary']) !!}
                        </div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection