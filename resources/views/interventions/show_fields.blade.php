<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'N° de bon d\'intervention:') !!}
    <p>{!! $intervention->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description de l\'intervention:') !!}
    <p>{!! $intervention->description !!}</p>
</div>

<!-- Temps Arret Field -->
<div class="form-group">
    {!! Form::label('temps_arret', 'Temps d\'arrêt:') !!}
    <p>{!! $intervention->temps_arret !!}</p>
</div>

<!-- Heures Personnes Field -->
<div class="form-group">
    {!! Form::label('heures_personnes', 'Heures MO:') !!}
    <p>{!! $intervention->heures_personnes !!}</p>
</div>

<!-- Prix M O Field -->
<div class="form-group">
    {!! Form::label('prix_m_o', 'Coût MO:') !!}
    <p>{!! $intervention->prix_m_o !!}</p>
</div>

<!-- Prix Pieces Field -->
<div class="form-group">
    {!! Form::label('prix_pieces', 'Prix Pièces:') !!}
    <p>{!! $intervention->prix_pieces !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $intervention->total !!}</p>
</div>

<!-- Impact Sur Le Service Field -->
<div class="form-group">
    {!! Form::label('impact_sur_le_service', 'Impact Sur Le Service:') !!}
    <p>{!! $intervention->impact_sur_le_service !!}</p>
</div>


<!-- Panne Id Field -->
<hr>
<div class="form-group">
    {!! Form::label('panne_id', 'Panne:') !!}
    <p><label>Nom du panne :</label> {!! $intervention->panne->nom !!}</p>
    <p><label>Nom d l'équipement:</label> {!! $intervention->panne->equipement->nom !!}</p>
</div>
<hr>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Crée le:') !!}
    <p>{!! $intervention->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Dernière modification le:') !!}
    <p>{!! $intervention->updated_at !!}</p>
</div>

