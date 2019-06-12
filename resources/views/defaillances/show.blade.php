@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détails de défaillance
        </h1>
    </section> 
    <div class="content"> 
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('defaillances.show_fields')
                    <a href="{!! route('defaillances.index') !!}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div> 
@endsection
