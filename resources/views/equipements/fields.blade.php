<!-- Nom Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Num serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_serie', 'N° Série:') !!}
    {!! Form::text('numero_serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Localisation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localisation', 'Localisation:') !!}
    {!! Form::text('localisation', null, ['class' => 'form-control']) !!}
</div>

<!-- Fiche Technique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiche_technique', 'Fiche technique:') !!}
    {!! Form::file('fiche_technique') !!}
</div>

<!-- Couleur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('couleur', 'Couleur:') !!}
    {!! Form::color('couleur', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipements.index') !!}" class="btn btn-default">Annuler</a>
</div>
