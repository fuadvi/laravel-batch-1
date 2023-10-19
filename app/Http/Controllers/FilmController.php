<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmReuqest;
use App\Service\film\IFilmService;
use App\Traits\ResponFormater;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    use ResponFormater;

    public function __construct(
        protected IFilmService $filmService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return $this->success("list film", $this->filmService->getListFilm());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmReuqest $request)
    {
        try {
            $this->filmService->addFilm($request);
            return  $this->success("Berhasil Membuat Film", null);
        }catch (\Exception $err)
        {
            return $this->error($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            return $this->success("detail film", $this->filmService->getFilm($slug));
        } catch (\Exception $err)
        {
            $this->error("Not Found", Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
