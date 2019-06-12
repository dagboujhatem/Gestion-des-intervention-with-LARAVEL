<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identifiant:') !!}
    <p>{!! $piece->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $piece->nom !!}</p>
</div>

<!-- Quantite Field -->
<div class="form-group">
    {!! Form::label('quantite', 'Quantité:') !!}
    <p>{!! $piece->quantite !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $piece->description !!}</p>
</div>

<!-- Nom Du Fournisseur Field -->
<div class="form-group">
    {!! Form::label('nom_du_fournisseur', 'Nom Du Fournisseur:') !!}
    <p>{!! $piece->nom_du_fournisseur !!}</p>
</div>

<!-- Prix Unitaire Field -->
<div class="form-group">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    <p>{!! $piece->prix_unitaire !!}</p>
</div>

<!-- Date De Commande Field -->
<div class="form-group">
    {!! Form::label('date_de_commande', 'Date De Commande:') !!}
    <p>{!! $piece->date_de_commande !!}</p>
</div>

<!-- Date Recu Field -->
<div class="form-group">
    {!! Form::label('date_recu', 'Date Reçu:') !!}
    <p>{!! $piece->date_recu !!}</p>
</div>

<!-- Num Facture Field -->
<div class="form-group">
    {!! Form::label('num_facture', 'Numéro Facture:') !!}
    <p>{!! $piece->num_facture !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Crée le:') !!}
    <p>{!! $piece->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $piece->updated_at !!}</p>
</div>

