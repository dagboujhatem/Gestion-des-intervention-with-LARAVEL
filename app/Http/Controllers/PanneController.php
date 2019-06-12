<?php

namespace App\Http\Controllers;

use App\DataTables\PanneDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePanneRequest;
use App\Http\Requests\UpdatePanneRequest;
use App\Repositories\PanneRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PanneController extends AppBaseController
{
    /** @var  PanneRepository */
    private $panneRepository;

    public function __construct(PanneRepository $panneRepo)
    {
        $this->panneRepository = $panneRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Panne.
     *
     * @param PanneDataTable $panneDataTable
     * @return Response
     */
    public function index(PanneDataTable $panneDataTable)
    {
        return $panneDataTable->render('pannes.index');
    }

    /**
     * Show the form for creating a new Panne.
     *
     * @return Response
     */
    public function create()
    {
        $equipements= \App\Equipement::pluck('nom','id');
        return view('pannes.create',compact('equipements'));
    }

    /**
     * Store a newly created Panne in storage.
     *
     * @param CreatePanneRequest $request
     *
     * @return Response
     */
    public function store(CreatePanneRequest $request)
    {
        $input = $request->all();

        $panne = $this->panneRepository->create($input);

        Flash::success('Panne enregistré avec succès.');

        return redirect(route('pannes.index'));
    }

    /**
     * Display the specified Panne.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $panne = $this->panneRepository->find($id);

        if (empty($panne)) {
            Flash::error('Panne non trouvé.');

            return redirect(route('pannes.index'));
        }

        return view('pannes.show')->with('panne', $panne);
    }

    /**
     * Show the form for editing the specified Panne.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $panne = $this->panneRepository->find($id);

        if (empty($panne)) {
            Flash::error('Panne non trouvé.');

            return redirect(route('pannes.index'));
        }
        $equipements= \App\Equipement::pluck('nom','id');
        return view('pannes.edit',compact('equipements'))->with('panne', $panne);
    }

    /**
     * Update the specified Panne in storage.
     *
     * @param  int              $id
     * @param UpdatePanneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePanneRequest $request)
    {
        $panne = $this->panneRepository->find($id);

        if (empty($panne)) {
            Flash::error('Panne non trouvé.');

            return redirect(route('pannes.index'));
        }

        $panne = $this->panneRepository->update($request->all(), $id);

        Flash::success('Panne a été mis à jour avec succès.');

        return redirect(route('pannes.index'));
    }

    /**
     * Remove the specified Panne from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $panne = $this->panneRepository->find($id);

        if (empty($panne)) {
            Flash::error('Panne non trouvé.');

            return redirect(route('pannes.index'));
        }
        $panne->intervention()->delete();
        $this->panneRepository->delete($id);

        Flash::success('Panne supprimé avec succès.');

        return redirect(route('pannes.index'));
    }
}
