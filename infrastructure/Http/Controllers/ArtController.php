<?php

namespace Infrastructure\Http\Controllers;

use Application\Art\Jobs\CreateNewArt;
use Application\Art\Jobs\UpdateArt;
use Domain\Art\ArtId;
use Exception;
use Illuminate\Http\JsonResponse;
use Infrastructure\requests\CreateArtRequest;
use Infrastructure\requests\UpdateArtRequest;
use League\Tactician\CommandBus;

class ArtController extends Controller
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateArtRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArtRequest $request)
    {
        $createNewArtCommand = new CreateNewArt(
            $request->name,
            $request->description
        );

        $this->commandBus->handle($createNewArtCommand);

        return response([], JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArtRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtRequest $request, $id)
    {
        try {
            $updateCommand = new UpdateArt(
                $request->name,
                $request->description,
                null,
                new ArtId($id)
            );

            $this->commandBus->handle($updateCommand);

            return response([], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            $this->returnBadParameterError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
