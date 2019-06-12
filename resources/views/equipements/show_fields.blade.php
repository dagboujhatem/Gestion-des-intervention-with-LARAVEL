<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identifiant:') !!}
    <p>{!! $equipement->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $equipement->nom !!}</p>
</div>

<!-- Num serie Field -->
<div class="form-group">
    {!! Form::label('numero_serie', 'N° Série:') !!}
    <p>{!! $equipement->numero_serie !!}</p>
</div>

<!-- Localisation Field -->
<div class="form-group">
    {!! Form::label('localisation', 'Localisation:') !!}
    <p>{!! $equipement->localisation !!}</p>
</div>

<!-- Fréquence de vérification Field -->
<div class="form-group">
    {!! Form::label('fiche_technique', 'Fiche technique:') !!}
    <a href="{!! $equipement->fiche_technique !!}" class="btn btn-success" >Télécharger la fiche technique</a>
</div>

<!-- Couleur Field -->
<div class="form-group">
    {!! Form::label('couleur', 'Couleur:') !!}
   <p>{!! $equipement->couleur !!}</p>
</div>
<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $equipement->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Crée le:') !!}
    <p>{!! $equipement->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $equipement->updated_at !!}</p>
</div>

