<!-- Text Du Rappel Field -->
<div class="form-group col-sm-12">
    {!! Form::label('text_du_rappel', 'Text Du Rappel:') !!}
    {!! Form::text('text_du_rappel', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Date de début d\'entretien:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'Date de fin d\'entretien:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

<!-- Equipement ID Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipement_id', 'Équipement:') !!}
    {!! Form::select('equipement_id', $equipements , null, ['class' => 'form-control']) !!}
</div>

<!-- Fréquence de vérification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frequence', 'Fréquence de vérification:') !!}
    {!! Form::select('frequence', ['Q' => 'Q: Quotidienne ', 'M' => 'M: Mensuelle', '3M' => '3M: Aux trois mois', '6M' => '6M: Aux six mois ', 'A' => 'A: annuelle '], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('entretiens.index') !!}" class="btn btn-default">Annuler</a>
</div>
