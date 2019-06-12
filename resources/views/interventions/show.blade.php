@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détails de l'intervention
        </h1>
    </section> 
    <div class="content"> 
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('interventions.show_fields')
                    <a href="{!! route('interventions.index') !!}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div> 
@endsection
