<?php

namespace App\Http\Controllers;

use App\DataTables\EquipementDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipementRequest;
use App\Http\Requests\UpdateEquipementRequest;
use App\Repositories\EquipementRepository;
use App\Repositories\EntretienRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Entretien;
use Calendar;
use Illuminate\Support\Facades\Storage; 

class EquipementController extends AppBaseController
{
    /** @var  EquipementRepository */
    private $equipementRepository;

    /** @var  EntretienRepository */
    private $entretienRepository;

    public function __construct(EquipementRepository $equipementRepo,
    EntretienRepository $entretienRepo)
    {
        $this->equipementRepository = $equipementRepo;
        $this->entretienRepository = $entretienRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Equipement.
     *
     * @param EquipementDataTable $equipementDataTable
     * @return Response
     */
    public function index(EquipementDataTable $equipementDataTable)
    {
        return $equipementDataTable->render('equipements.index');
    }

    /**
     * Show the form for creating a new Equipement.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipements.create');
    }

    /**
     * Store a newly created Equipement in storage.
     *
     * @param CreateEquipementRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipementRequest $request)
    {
        $input = $request->all();

        $equipement = $this->equipementRepository->create($input);

        Flash::success('Équipement sauvegardé avec succès.');

         // begin fiche_technique section 
        //redifine 'disks => [ 'public' => ['root'=> public_path(),]
        // in conf/filesystem.php
        if($request->file('fiche_technique'))
        {
            $path = Storage::disk('public')->put('fiches_tech',$request->file('fiche_technique')); 
            $equipement->fill(['fiche_technique'=> asset($path)])->save();
        }
        // end fiche_technique section 

        return redirect(route('equipements.index'));
    }

    /**
     * Display the specified Equipement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipement = $this->equipementRepository->find($id);

        if (empty($equipement)) {
            Flash::error('Équipement non trouvé.');

            return redirect(route('equipements.index'));
        }

        return view('equipements.show')->with('equipement', $equipement);
    }

    /**
     * Show the form for editing the specified Equipement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipement = $this->equipementRepository->find($id);

        if (empty($equipement)) {
            Flash::error('Équipement non trouvé.');

            return redirect(route('equipements.index'));
        }

        return view('equipements.edit')->with('equipement', $equipement);
    }

    /**
     * Update the specified Equipement in storage.
     *
     * @param  int              $id
     * @param UpdateEquipementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipementRequest $request)
    {
        $equipement = $this->equipementRepository->find($id);

        if (empty($equipement)) {
            Flash::error('Équipement non trouvé.');

            return redirect(route('equipements.index'));
        }

        // get fiche_technique  
        $last_fiche = $equipement->fiche_technique;

        $equipement = $this->equipementRepository->update($request->all(), $id);

           // begin fiche_technique section  
        if($request->file('fiche_technique'))
        {
            $path = Storage::disk('public')->put('fiches_tech',$request->file('fiche_technique')); 
            $equipement->fill(['fiche_technique'=> asset($path)])->save();

            //delete old image 
                $exists = Storage::disk('public')->exists('fiches_tech',$last_fiche);

                if($exists)
                {   
                    $file = basename($last_fiche);  
                   // dd($file);
                    Storage::disk('public')->delete('fiches_tech/'.$file);
                }
            // end delete old image
        }
        // end fiche_technique section 
        // end update equipement 
        Flash::success('Équipement mis à jour avec succès.');

        return redirect(route('equipements.index'));
    }

    /**
     * Remove the specified Equipement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipement = $this->equipementRepository->find($id);

        if (empty($equipement)) {
            Flash::error('Équipement non trouvé.');

            return redirect(route('equipements.index'));
        }
        //delete old fiche_technique 
        $exists = Storage::disk('public')->exists('fiches_tech',$equipement->fiche_technique);

        if($exists)
        {   
            $file = basename($equipement->fiche_technique);  
            Storage::disk('public')->delete('fiches_tech/'.$file);
        }
        // end delete old fiche_technique

        // delete equipement
         $equipement->pannes()->each(function($panne){
             if($panne->intervention()->exists())
            {       
                $panne->intervention()->delete();

            }
        });
         $equipement->pannes()->delete();
         //$equipement->entretiens()->defaillance->delete();
        $equipement->entretiens()->each(function($entretiens){
             if($entretiens->defaillance()->exists())
            {       
                $entretiens->defaillance()->delete();

            }
        });
         $equipement->entretiens()->delete();
        $this->equipementRepository->delete($id);

        Flash::success('Équipement supprimé avec succès.');

        return redirect(route('equipements.index'));
    }
}
