@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ajouter un équipement 
        </h1>
    </section> 
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'equipements.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('equipements.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> 
@endsection
