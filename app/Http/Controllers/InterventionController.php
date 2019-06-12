<?php

namespace App\Http\Controllers;

use App\DataTables\InterventionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInterventionRequest;
use App\Http\Requests\UpdateInterventionRequest;
use App\Repositories\InterventionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InterventionController extends AppBaseController
{
    /** @var  InterventionRepository */
    private $interventionRepository;

    public function __construct(InterventionRepository $interventionRepo)
    {
        $this->interventionRepository = $interventionRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Intervention.
     *
     * @param InterventionDataTable $interventionDataTable
     * @return Response
     */
    public function index(InterventionDataTable $interventionDataTable)
    {
        return $interventionDataTable->render('interventions.index');
    }

    /**
     * Show the form for creating a new Intervention.
     *
     * @return Response
     */
    public function create()
    {
        $pannes= \App\Panne::pluck('nom','id');
        $pieces= \App\Piece::where('quantite','>=','1')->pluck('nom','id');
        return view('interventions.create',compact('pannes','pieces'));
    }

    /**
     * Store a newly created Intervention in storage.
     *
     * @param CreateInterventionRequest $request
     *
     * @return Response
     */
    public function store(CreateInterventionRequest $request)
    {
        $input = $request->all();
        
        $intervention = $this->interventionRepository->create($input);
        // refresh the stock 
        $pieces= \App\Piece::where('id',$request->pieces)->get()->first();
        $stock= (int) $pieces->quantite;
        $qte=(int)  $request->qte;
        $new_qte= $stock - $qte;
        if($new_qte>=0)
        {
            $pieces->quantite= (string) $new_qte;
            $pieces->save();
                // delete panne 
                //$intervention->panne->delete();
                // show message
                Flash::success('Intervention enregistrée avec succès.');

                return redirect(route('interventions.index'));
        }else{
             $intervention->delete();
            //return statement 
            Flash::error('La quantité disponible est insuffisante.');
            return redirect(route('interventions.create'));
        }
       
    }

    /**
     * Display the specified Intervention.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $intervention = $this->interventionRepository->find($id);

        if (empty($intervention)) {
            Flash::error('Intervention non trouvée.');

            return redirect(route('interventions.index'));
        }

        return view('interventions.show')->with('intervention', $intervention);
    }

    /**
     * Show the form for editing the specified Intervention.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $intervention = $this->interventionRepository->find($id);

        if (empty($intervention)) {
            Flash::error('Intervention non trouvée.');

            return redirect(route('interventions.index'));
        }
        $pannes= \App\Panne::pluck('nom','id');
        $pieces= \App\Piece::pluck('nom','id');
        return view('interventions.edit',compact('pannes','pieces'))->with('intervention', $intervention);
    }

    /**
     * Update the specified Intervention in storage.
     *
     * @param  int              $id
     * @param UpdateInterventionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInterventionRequest $request)
    {
        $intervention = $this->interventionRepository->find($id);

        if (empty($intervention)) {
            Flash::error('Intervention non trouvée.');

            return redirect(route('interventions.index'));
        }

        $intervention = $this->interventionRepository->update($request->all(), $id);

        Flash::success('Intervention mise à jour avec succès.');

        return redirect(route('interventions.index'));
    }

    /**
     * Remove the specified Intervention from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $intervention = $this->interventionRepository->find($id);

        if (empty($intervention)) {
            Flash::error('Intervention non trouvée.');

            return redirect(route('interventions.index'));
        }

        $this->interventionRepository->delete($id);

        Flash::success('Intervention supprimée avec succès.');

        return redirect(route('interventions.index'));
    }
}
