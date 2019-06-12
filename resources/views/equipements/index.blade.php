@extends('layouts.app')

@section('content') 
    
    <section class="content-header"> 
        <h2>Gestion des équipements</h2>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('equipements.create') !!}"><i class="fa fa-plus-circle"></i> Ajouter un équipement</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('equipements.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div> 
@endsection

