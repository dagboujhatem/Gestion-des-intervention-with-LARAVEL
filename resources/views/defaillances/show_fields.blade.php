<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identifiant:') !!}
    <p>{!! $defaillance->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $defaillance->description !!}</p>
</div>

<!-- Responsable Field -->
<div class="form-group">
    {!! Form::label('responsable', 'Responsable:') !!}
    <p>{!! $defaillance->responsable !!}</p>
</div>

<hr>
<!-- Entretien Id Field -->
<div class="form-group">
    {!! Form::label('entretien_id', ' Détails d\'entretien:') !!}
    <p><label>Date de début:</label> {!! $defaillance->entretien->start_date !!}</p>
    <p><label>Date de fin:</label> {!! $defaillance->entretien->end_date !!}</p>
    <p><label>Text du rappel:</label> {!! $defaillance->entretien->text_du_rappel !!}</p>
</div>
<hr>
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Crée le:') !!}
    <p>{!! $defaillance->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $defaillance->updated_at !!}</p>
</div>

