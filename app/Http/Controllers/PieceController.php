<?php

namespace App\Http\Controllers;

use App\DataTables\PieceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePieceRequest;
use App\Http\Requests\UpdatePieceRequest;
use App\Repositories\PieceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PieceController extends AppBaseController
{
    /** @var  PieceRepository */
    private $pieceRepository;

    public function __construct(PieceRepository $pieceRepo)
    {
        $this->pieceRepository = $pieceRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Piece.
     *
     * @param PieceDataTable $pieceDataTable
     * @return Response
     */
    public function index(PieceDataTable $pieceDataTable)
    {
        return $pieceDataTable->render('pieces.index');
    }

    /**
     * Show the form for creating a new Piece.
     *
     * @return Response
     */
    public function create()
    {
        return view('pieces.create');
    }

    /**
     * Store a newly created Piece in storage.
     *
     * @param CreatePieceRequest $request
     *
     * @return Response
     */
    public function store(CreatePieceRequest $request)
    {
        $input = $request->all();

        $piece = $this->pieceRepository->create($input);

        Flash::success('Pièce sauvegardée avec succès.');

        return redirect(route('pieces.index'));
    }

    /**
     * Display the specified Piece.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) {
            Flash::error('Pièce non trouvée.');

            return redirect(route('pieces.index'));
        }

        return view('pieces.show')->with('piece', $piece);
    }

    /**
     * Show the form for editing the specified Piece.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) {
            Flash::error('Pièce non trouvée.');

            return redirect(route('pieces.index'));
        }

        return view('pieces.edit')->with('piece', $piece);
    }

    /**
     * Update the specified Piece in storage.
     *
     * @param  int              $id
     * @param UpdatePieceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePieceRequest $request)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) {
            Flash::error('Pièce non trouvée.');

            return redirect(route('pieces.index'));
        }

        $piece = $this->pieceRepository->update($request->all(), $id);

        Flash::success('Pièce mise à jour avec succès.');

        return redirect(route('pieces.index'));
    }

    /**
     * Remove the specified Piece from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) {
            Flash::error('Pièce non trouvée.');

            return redirect(route('pieces.index'));
        }

        $this->pieceRepository->delete($id);

        Flash::success('Pièce supprimée avec succès.');

        return redirect(route('pieces.index'));
    }

    // get prix 
    public function prix($id)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) { 
            return response()->json(['response' => 'Pièce non trouvée.']);  
        }

        return response()->json(['response' =>$piece->prix_unitaire]);
    }
}
