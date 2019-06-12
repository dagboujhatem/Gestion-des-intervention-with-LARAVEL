<!-- Panne Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('panne_id', 'Panne:') !!}
    {!! Form::select('panne_id', $pannes, null, ['class' => 'form-control']) !!}
</div>

<!-- Temps Arret Field -->
<div class="form-group col-sm-6">
    {!! Form::label('temps_arret', 'Temps d\'arrêt:') !!}
    {!! Form::text('temps_arret', null, ['class' => 'form-control']) !!}
</div>

<!-- Heures MO Field -->
<div class="form-group col-sm-6">
    {!! Form::label('heures_personnes', 'Heures MO:') !!}
    {!! Form::text('heures_personnes', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix M O Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_m_o', 'Coût MO:') !!}
    {!! Form::text('prix_m_o', null, ['class' => 'form-control']) !!}
</div>

<!-- Pieces Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pieces', 'Pièces:') !!}
    {!! Form::select('pieces', $pieces, null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Pieces Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_pieces', 'Prix Pièces:') !!}
    {!! Form::text('prix_pieces', 0, ['class' => 'form-control', 'readonly'=>'true']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', 0, ['class' => 'form-control',
    'readonly'=>'true']) !!}
</div>

<!-- Impact Sur Le Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('impact_sur_le_service', 'Impact Sur Le Service:') !!}
    {!! Form::select('impact_sur_le_service', ['aucun' => 'aucun', 'arrêt' => 'arrêt', 'ralentissement' => 'ralentissement'], null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description de l\'intervention:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Modal --> 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donner la quantité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="qte">Quantité</label>
            <input type="number" name="qte" id="qte" min="1" value="1" class="form-control">
        </div>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-primary" data-dismiss="modal">Enregistrer</button>
      </div>
    </div>
  </div>
</div> 
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('interventions.index') !!}" class="btn btn-default">Annuler</a>
</div>
