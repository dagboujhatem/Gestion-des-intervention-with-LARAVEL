@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier l'intervention
        </h1>
    </section> 
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($intervention, ['route' => ['interventions.update', $intervention->id], 'method' => 'patch']) !!}

                  <!-- Panne Id Field -->
                  <div class="form-group col-sm-6">
                      {!! Form::label('panne_id', 'Panne:') !!}
                      {!! Form::select('panne_id', $pannes, null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Temps Arret Field -->
                  <div class="form-group col-sm-6">
                      {!! Form::label('temps_arret', 'Temps d\'arrêt:') !!}
                      {!! Form::text('temps_arret', null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Heures MO Field -->
                  <div class="form-group col-sm-6">
                      {!! Form::label('heures_personnes', 'Heures MO:') !!}
                      {!! Form::text('heures_personnes', null, ['class' => 'form-control']) !!}
                  </div>
                   
                  <!-- Impact Sur Le Service Field -->
                  <div class="form-group col-sm-6">
                      {!! Form::label('impact_sur_le_service', 'Impact Sur Le Service:') !!}
                      {!! Form::select('impact_sur_le_service', ['aucun' => 'aucun', 'arrêt' => 'arrêt', 'ralentissement' => 'ralentissement'], null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Description Field -->
                  <div class="form-group col-sm-12 col-lg-12">
                      {!! Form::label('description', 'Description de l\'intervention:') !!}
                      {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                  </div>
                   
                  <!-- Submit Field -->
                  <div class="form-group col-sm-12">
                      {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                      <a href="{!! route('interventions.index') !!}" class="btn btn-default">Annuler</a>
                  </div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> 
@endsection