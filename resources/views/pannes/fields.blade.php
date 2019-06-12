<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Priorité Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priorite', 'Priorité:') !!}
    {!! Form::select('priorite', ['Urgent' => 'Urgent', 'Moyenne' => 'Moyenne', 'Faible' => 'Faible', 'Très Faible' => 'Très Faible'], null, ['class' => 'form-control']) !!}
</div>
<!-- Type De Panne Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type_de_panne', 'Type De Panne:') !!}
    {!! Form::select('type_de_panne', ['Mécanique' => 'Mécanique', 'Electrique' => 'Electrique', 'Electronique' => 'Electronique', 'Pneumatique' => 'Pneumatique', 'Hydraulique' => 'Hydraulique', 'Sécurité' => 'Sécurité'], null, ['class' => 'form-control']) !!}
</div>

<!-- Equipement ID Field -->
<div class="form-group col-sm-4">
    {!! Form::label('equipement_id', 'Équipement:') !!}
    {!! Form::select('equipement_id', $equipements , null, ['class' => 'form-control']) !!}
</div>

<!-- Temps Estimé Field -->
<div class="form-group col-sm-4">
    {!! Form::label('temps_estime', 'Temps estimé de réparation:') !!}
    {!! Form::text('temps_estime', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pannes.index') !!}" class="btn btn-default">Annuler</a>
</div>
