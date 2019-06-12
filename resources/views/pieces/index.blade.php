@extends('layouts.app')

@section('content') 
  
    <section class="content-header">  
        <h2>Gestion de stock</h2> 
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -15px;margin-bottom: 10px" href="{!! route('pieces.create') !!}"><i class="fa fa-plus-circle"></i> Ajouter une pièce</a>
        </h1>
    </section>
    <div class="content"> 
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                    @include('pieces.table')
            </div>
        </div> 
    </div> 
@endsection

