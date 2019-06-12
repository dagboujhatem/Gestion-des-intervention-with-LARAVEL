<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite', 'Quantité:') !!}
    {!! Form::number('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Du Fournisseur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_du_fournisseur', 'Nom Du Fournisseur:') !!}
    {!! Form::text('nom_du_fournisseur', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Unitaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    {!! Form::text('prix_unitaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Date De Commande Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_de_commande', 'Date De Commande:') !!}
    {!! Form::date('date_de_commande', null, ['class' => 'form-control','id'=>'date_de_commande']) !!}
</div>

<!-- Date Recu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_recu', 'Date Reçu:') !!}
    {!! Form::date('date_recu', null, ['class' => 'form-control','id'=>'date_recu']) !!}
</div>

<!-- Num Facture Field -->
<div class="form-group col-sm-12">
    {!! Form::label('num_facture', 'Numéro Facture:') !!}
    {!! Form::text('num_facture', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pieces.index') !!}" class="btn btn-default">Annuler</a>
</div>
