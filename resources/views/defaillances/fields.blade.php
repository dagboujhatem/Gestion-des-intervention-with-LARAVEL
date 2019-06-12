<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable', 'Responsable:') !!}
    {!! Form::text('responsable', null, ['class' => 'form-control']) !!}
</div>

<!-- Entretien ID Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entretien_id', 'Entretient:') !!}
    {!! Form::select('entretien_id', $entretiens , null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('defaillances.index') !!}" class="btn btn-default">Annuler</a>
</div>
