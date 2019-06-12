<?php

namespace App\Http\Controllers;

use App\DataTables\DefaillanceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDefaillanceRequest;
use App\Http\Requests\UpdateDefaillanceRequest;
use App\Repositories\DefaillanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response; 

class DefaillanceController extends AppBaseController
{
    /** @var  DefaillanceRepository */
    private $defaillanceRepository;

    public function __construct(DefaillanceRepository $defaillanceRepo)
    {
        $this->defaillanceRepository = $defaillanceRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Defaillance.
     *
     * @param DefaillanceDataTable $defaillanceDataTable
     * @return Response
     */
    public function index(DefaillanceDataTable $defaillanceDataTable)
    {
        return $defaillanceDataTable->render('defaillances.index');
    }

    /**
     * Show the form for creating a new Defaillance.
     *
     * @return Response
     */
    public function create()
    {
        $date = new \DateTime();  
        // afficher seuelement les entretients de ce jour
        $entretiens= \App\Entretien::where('start_date',$date->format('Y-m-d'))
        ->orWhere('end_date','>=',$date->format('Y-m-d'))
        ->pluck('text_du_rappel','id');
        // return statement 
        return view('defaillances.create',compact('entretiens'));
    }

    /**
     * Store a newly created Defaillance in storage.
     *
     * @param CreateDefaillanceRequest $request
     *
     * @return Response
     */
    public function store(CreateDefaillanceRequest $request)
    {
        $input = $request->all();

        $defaillance = $this->defaillanceRepository->create($input);

        // add the next entretien 
        // get the last entretien
        $last_entretien = $defaillance->entretien;
        // calculate the next start_date and the last_date 
        if($last_entretien->frequence=="Q"){
            $start_date = new \DateTime($last_entretien->start_date.' +1 day');
            $end_date = new \DateTime($last_entretien->end_date.' +1 day'); 
        }elseif($last_entretien->frequence=="M"){
            $start_date = new \DateTime($last_entretien->start_date.' +1 month');
            $end_date = new \DateTime($last_entretien->end_date.' +1 month'); 
        }elseif($last_entretien->frequence=="3M"){
            $start_date = new \DateTime($last_entretien->start_date.' +3 month');
            $end_date = new \DateTime($last_entretien->end_date.' +3 month'); 
        }elseif($last_entretien->frequence=="6M"){
            $start_date = new \DateTime($last_entretien->start_date.' +6 month');
            $end_date = new \DateTime($last_entretien->end_date.' +6 month'); 
        }else{
            $start_date = new \DateTime($last_entretien->start_date.' +1 year');
            $end_date = new \DateTime($last_entretien->end_date.' +1 year'); 
        }
        // add new (next) entretien 
        $ent = new \App\Entretien();
        $ent->text_du_rappel=$last_entretien->text_du_rappel;
        $ent->equipement_id=$last_entretien->equipement_id;
        $ent->frequence=$last_entretien->frequence;
        $ent->start_date=$start_date->format('Y-m-d');
        $ent->end_date=$end_date->format('Y-m-d');
        //save the new entretien
        $ent->save();

        Flash::success('Défaillance enregistré avec succès.');

        return redirect(route('defaillances.index'));
    }

    /**
     * Display the specified Defaillance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $defaillance = $this->defaillanceRepository->find($id);

        if (empty($defaillance)) {
            Flash::error('Défaillance non trouvée.');

            return redirect(route('defaillances.index'));
        }

        return view('defaillances.show')->with('defaillance', $defaillance);
    }

    /**
     * Show the form for editing the specified Defaillance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $defaillance = $this->defaillanceRepository->find($id);

        if (empty($defaillance)) {
            Flash::error('Défaillance non trouvée.');

            return redirect(route('defaillances.index'));
        }

        $entretiens= \App\Entretien::pluck('text_du_rappel','id');
        return view('defaillances.edit',compact('entretiens'))->with('defaillance', $defaillance);
    }

    /**
     * Update the specified Defaillance in storage.
     *
     * @param  int              $id
     * @param UpdateDefaillanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDefaillanceRequest $request)
    {
        $defaillance = $this->defaillanceRepository->find($id);

        if (empty($defaillance)) {
            Flash::error('Défaillance non trouvée.');

            return redirect(route('defaillances.index'));
        }

        $defaillance = $this->defaillanceRepository->update($request->all(), $id);

        Flash::success('Défaillance mis à jour avec succès.');

        return redirect(route('defaillances.index'));
    }

    /**
     * Remove the specified Defaillance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $defaillance = $this->defaillanceRepository->find($id);

        if (empty($defaillance)) {
            Flash::error('Défaillance non trouvée.');

            return redirect(route('defaillances.index'));
        }

        $this->defaillanceRepository->delete($id);

        Flash::success('Défaillance supprimée avec succès.');

        return redirect(route('defaillances.index'));
    }
}
