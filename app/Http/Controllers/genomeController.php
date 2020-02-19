<?php

namespace App\Http\Controllers;

use App\DataTables\genomeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreategenomeRequest;
use App\Http\Requests\UpdategenomeRequest;
use App\Repositories\genomeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class genomeController extends AppBaseController
{
    /** @var  genomeRepository */
    private $genomeRepository;

    public function __construct(genomeRepository $genomeRepo)
    {
        $this->genomeRepository = $genomeRepo;
    }

    /**
     * Display a listing of the genome.
     *
     * @param genomeDataTable $genomeDataTable
     * @return Response
     */
    public function index(genomeDataTable $genomeDataTable)
    {
        return $genomeDataTable->render('genomes.index');
    }

    /**
     * Show the form for creating a new genome.
     *
     * @return Response
     */
    public function create()
    {
        return view('genomes.create');
    }

    /**
     * Store a newly created genome in storage.
     *
     * @param CreategenomeRequest $request
     *
     * @return Response
     */
    public function store(CreategenomeRequest $request)
    {
        $input = $request->all();

        $genome = $this->genomeRepository->create($input);

        Flash::success('Genome saved successfully.');

        return redirect(route('genomes.index'));
    }

    /**
     * Display the specified genome.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            Flash::error('Genome not found');

            return redirect(route('genomes.index'));
        }

        return view('genomes.show')->with('genome', $genome);
    }

    /**
     * Show the form for editing the specified genome.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            Flash::error('Genome not found');

            return redirect(route('genomes.index'));
        }

        return view('genomes.edit')->with('genome', $genome);
    }

    /**
     * Update the specified genome in storage.
     *
     * @param  int              $id
     * @param UpdategenomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategenomeRequest $request)
    {
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            Flash::error('Genome not found');

            return redirect(route('genomes.index'));
        }

        $genome = $this->genomeRepository->update($request->all(), $id);

        Flash::success('Genome updated successfully.');

        return redirect(route('genomes.index'));
    }

    /**
     * Remove the specified genome from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            Flash::error('Genome not found');

            return redirect(route('genomes.index'));
        }

        $this->genomeRepository->delete($id);

        Flash::success('Genome deleted successfully.');

        return redirect(route('genomes.index'));
    }
}
