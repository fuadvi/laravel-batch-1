<?php

namespace App\Http\Controllers;

use App\Http\Requests\CinemasRequest;
use App\Service\Cinemas\ICinemasService;
use App\Traits\ResponFormater;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CinemasController extends Controller
{
    use ResponFormater;
    public function __construct(
        public ICinemasService $cinemasService
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBioskop = $this->cinemasService->getListCinemas();
        return $this->success("list bioskop", $listBioskop);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CinemasRequest $request)
    {
        try {
            $this->cinemasService->addCinemas($request->validated());
            return $this->success("Berhasil Membuat data Bioskop",null);
        }catch (\Exception $err)
        {
            $this->error("Internal Server Error", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return  $this->success('Detail Bioskop', $this->cinemasService->getCinemas($id));
        }catch (ModelNotFoundException $err)
        {
            return $this->error("Not Found", Response::HTTP_FOUND);
        } catch (\Exception $err)
        {
            return $this->error("Internal Server Error", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CinemasRequest $request, string $id)
    {
        try {
            $this->cinemasService->editCinemas($request->validated(), $id);
            return  $this->success('berhasil update data bioskop',null);
        }catch (ModelNotFoundException $err)
        {
            return $this->error("Not Found", Response::HTTP_NOT_FOUND);
        } catch (\Exception $err)
        {
            return $this->error("Internal Server Error", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->cinemasService->deleteCinemas($id);
            return  $this->success('berhasil delete data bioskop',null);
        }catch (ModelNotFoundException $err)
        {
            return $this->error("Not Found", Response::HTTP_NOT_FOUND);
        } catch (\Exception $err)
        {
            return $this->error("Internal Server Error", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
