<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identifiant:') !!}
    <p>{!! $panne->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $panne->nom !!}</p>
</div>

<!-- Temps Estimé Field -->
<div class="form-group">
    {!! Form::label('temps_estime', 'Temps estimé de réparation:') !!}
    <p>{!! $panne->temps_estime !!}</p>
</div>

<!-- Type De Panne Field -->
<div class="form-group">
    {!! Form::label('type_de_panne', 'Type De Panne:') !!}
    <p>{!! $panne->type_de_panne !!}</p>
</div>

<!-- Priorité Field -->
<div class="form-group">
    {!! Form::label('priorite', 'Priorité:') !!}
    <p>{!! $panne->priorite !!}</p>
</div>

<!-- Type De Panne Field -->
<div class="form-group">
    {!! Form::label('equipement_id', 'Équipement:') !!}
    <p>{!! $panne->equipement->nom !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $panne->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Date de l\'évènement:') !!}
    <p>{!! $panne->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $panne->updated_at !!}</p>
</div>

