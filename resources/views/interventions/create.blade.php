@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ajouter une intervention
        </h1>
    </section> 
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'interventions.store']) !!}

                        @include('interventions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    // update the price 
    $("#pieces").focusout(function(){
      $('#exampleModal').modal('show');
      $('#exampleModal').on('hidden.bs.modal', function (e) {
            var id_piece = $("#pieces").children("option:selected").val();
            prix(id_piece);
          });
    });
    $("#prix_m_o").change(function(){update_total();});

    function update_total()
    {
        var id_piece = $("#pieces").children("option:selected").val();
        var prix_m_o =$("#prix_m_o").val();
        if(isNaN(prix_m_o)) {
            alert("le coût MO n'est pas valide !");
        }else{
            prix(id_piece);
        }
        
    }
   // calcul prix pièces
    function prix(id )
    { 
       $("#prix_pieces").val(0);
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
         jQuery.ajax({
                  url: "/pieces/prix/" + id ,
                  method: 'get',
                  data: {
                     "_token": "{{ csrf_token() }}",
                     "id":id
                  },
                  success: function(result){
                    
                    var qte = $('#qte').val();
                    var prix_piece = Number(result.response) * Number(qte);
                    var prix_m_o =$("#prix_m_o").val(); 
                    $("#prix_pieces").val(prix_piece); 
                    $("#total").val(Number(prix_m_o)+Number(prix_piece));
                  }});
    }
   
});
</script>
@endsection