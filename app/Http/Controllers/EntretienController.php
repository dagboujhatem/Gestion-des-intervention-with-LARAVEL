<?php

namespace App\Http\Controllers;

use App\DataTables\EntretienDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEntretienRequest;
use App\Http\Requests\UpdateEntretienRequest;
use App\Repositories\EntretienRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Entretien;
use Calendar;

class EntretienController extends AppBaseController
{
    /** @var  EntretienRepository */
    private $entretienRepository;

    public function __construct(EntretienRepository $entretienRepo)
    {
        $this->entretienRepository = $entretienRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Entretien.
     *
     * @param EntretienDataTable $entretienDataTable
     * @return Response
     */
    public function index(EntretienDataTable $entretienDataTable)
    {
        return $entretienDataTable->render('entretiens.index');
    }

    /**
     * Show the form for creating a new Entretien.
     *
     * @return Response
     */
    public function create()
    {
        $equipements= \App\Equipement::pluck('nom','id');
        return view('entretiens.create',compact('equipements'));
    }

    /**
     * Store a newly created Entretien in storage.
     *
     * @param CreateEntretienRequest $request
     *
     * @return Response
     */
    public function store(CreateEntretienRequest $request)
    {
        $input = $request->all(); 

        $entretien = $this->entretienRepository->create($input);

        Flash::success('Entretien enregistré avec succès.');

        return redirect(route('entretiens.index'));
    }

    /**
     * Display the specified Entretien.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entretien = $this->entretienRepository->find($id);

        if (empty($entretien)) {
            Flash::error('Entretien non trouvé.');

            return redirect(route('entretiens.index'));
        }

        return view('entretiens.show')->with('entretien', $entretien);
    }

    /**
     * Show the form for editing the specified Entretien.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entretien = $this->entretienRepository->find($id);

        if (empty($entretien)) {
            Flash::error('Entretien non trouvé.');

            return redirect(route('entretiens.index'));
        }
         $equipements= \App\Equipement::pluck('nom','id');
        return view('entretiens.edit',compact('equipements'))->with('entretien', $entretien);
    }

    /**
     * Update the specified Entretien in storage.
     *
     * @param  int              $id
     * @param UpdateEntretienRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntretienRequest $request)
    {
        $entretien = $this->entretienRepository->find($id);

        if (empty($entretien)) {
            Flash::error('Entretien non trouvé.');

            return redirect(route('entretiens.index'));
        }

        $entretien = $this->entretienRepository->update($request->all(), $id);

        Flash::success('Entretien mis à jour avec succès.');

        return redirect(route('entretiens.index'));
    }

    /**
     * Remove the specified Entretien from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entretien = $this->entretienRepository->find($id);

        if (empty($entretien)) {
            Flash::error('Entretien non trouvé.');

            return redirect(route('entretiens.index'));
        }
        $entretien->defaillance()->delete();
        $this->entretienRepository->delete($id);

        Flash::success('Entretien supprimé avec succès.');

        return redirect(route('entretiens.index'));
    }


    // create a calendar 
     public function calendar()
    {
        $events = [];
        $entretiens = Entretien::all();

        if($entretiens->count()) {
            
            foreach ($entretiens as $entretien) {
                $events[] = Calendar::event(
                    $entretien->text_du_rappel,
                    true,
                    new \DateTime($entretien->start_date),
                    new \DateTime($entretien->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => $entretien->equipement->couleur,
                        'url' => route('entretiens.show',['id'=>$entretien->id]),
                    ]
                );
            }
            
        }
        $calendar = Calendar::addEvents($events);
        // dd($calendar);
        return view('calendar', compact('calendar'));
    }
}
