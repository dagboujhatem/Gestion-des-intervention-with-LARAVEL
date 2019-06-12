<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identifiant:') !!}
    <p>{!! $entretien->id !!}</p>
</div>

<!-- Equipement Field -->
<div class="form-group">
    {!! Form::label('equipement_id', 'Équipement:') !!}
    <p>{!! $entretien->equipement->nom !!}</p>
</div>

<!-- Text Du Rappel Field -->
<div class="form-group">
    {!! Form::label('text_du_rappel', 'Text Du Rappel:') !!}
    <p>{!! $entretien->text_du_rappel !!}</p>
</div>

<!-- Fréquence Field -->
<div class="form-group">
    {!! Form::label('frequence', 'Fréquence de vérification:') !!}
    <p>{!! $entretien->frequence !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Date de début d\'entretien:') !!}
    <p>{!! $entretien->start_date !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'Date de fin d\'entretien:') !!}
    <p>{!! $entretien->end_date !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Crée le:') !!}
    <p>{!! $entretien->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $entretien->updated_at !!}</p>
</div>

