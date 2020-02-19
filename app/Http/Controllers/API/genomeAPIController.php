<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategenomeAPIRequest;
use App\Http\Requests\API\UpdategenomeAPIRequest;
use App\Models\genome;
use App\Repositories\genomeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class genomeController
 * @package App\Http\Controllers\API
 */

class genomeAPIController extends AppBaseController
{
    /** @var  genomeRepository */
    private $genomeRepository;

    public function __construct(genomeRepository $genomeRepo)
    {
        $this->genomeRepository = $genomeRepo;
    }

    /**
     * Display a listing of the genome.
     * GET|HEAD /genomes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $genomes = $this->genomeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($genomes->toArray(), 'Genomes retrieved successfully');
    }

    /**
     * Store a newly created genome in storage.
     * POST /genomes
     *
     * @param CreategenomeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategenomeAPIRequest $request)
    {
        $input = $request->all();

        $genome = $this->genomeRepository->create($input);

        return $this->sendResponse($genome->toArray(), 'Genome saved successfully');
    }

    /**
     * Display the specified genome.
     * GET|HEAD /genomes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var genome $genome */
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            return $this->sendError('Genome not found');
        }

        return $this->sendResponse($genome->toArray(), 'Genome retrieved successfully');
    }

    /**
     * Update the specified genome in storage.
     * PUT/PATCH /genomes/{id}
     *
     * @param int $id
     * @param UpdategenomeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategenomeAPIRequest $request)
    {
        $input = $request->all();

        /** @var genome $genome */
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            return $this->sendError('Genome not found');
        }

        $genome = $this->genomeRepository->update($input, $id);

        return $this->sendResponse($genome->toArray(), 'genome updated successfully');
    }

    /**
     * Remove the specified genome from storage.
     * DELETE /genomes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var genome $genome */
        $genome = $this->genomeRepository->find($id);

        if (empty($genome)) {
            return $this->sendError('Genome not found');
        }

        $genome->delete();

        return $this->sendSuccess('Genome deleted successfully');
    }
}
