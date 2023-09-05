<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

abstract class BaseService
{
    protected $repository;

    protected $nameRepo;

    public function __construct(string $nameRepo)
    {
        $this->repository = App::make('App\Repositories\\'.$nameRepo);
    }

    public function getDados(Request $request): mixed
    {
        if ($request->get('search') != 'Busca') {
            $dados = ($request->get('relations') != 'Relacao') ? ($this->getSearchComRelations($request)) : ($this->getSearchSemRelations($request));
        } else {
            if ($request->get('searchLike') != 'Incremental') {
                $dados = ($request->get('relations') != 'Relacao') ? ($this->getSearchLikeComRelations($request)) : ($this->getSearchLikeSemRelations($request));
            } else {
                $dados = ($request->get('relations') != 'Relacao') ? ($this->getAllComRelations($request)) : ($this->getAllSemRelations($request));
            }
        }

        return $dados;
    }

    private function getSearchComRelations(Request $request): mixed
    {
        return $this->repository
            ->advancedSearch($request, explode(',', $request->get('relations')))
            ->orderByRaw(($request->get('order') ?? 'id').' '.($request->get('direction') ?? 'DESC'))
            ->paginate($request->get('limit'));
    }

    private function getSearchSemRelations(Request $request): mixed
    {
        return $this->repository
            ->advancedSearch($request)
            ->orderByRaw(($request->get('order') ?? 'id').' '.($request->get('direction') ?? 'DESC'))
            ->paginate($request->get('limit'));
    }

    private function getSearchLikeComRelations(Request $request): mixed
    {
        return $this->repository
            ->SearchLike($request, explode(',', $request->get('relations')))
            ->orderByRaw(($request->get('order') ?? 'id').' '.($request->get('direction') ?? 'DESC'))
            ->paginate($request->get('limit'));
    }

    private function getSearchLikeSemRelations(Request $request): mixed
    {
        return $this->repository
            ->SearchLike($request)
            ->orderByRaw(($request->get('order') ?? 'id').' '.($request->get('direction') ?? 'DESC'))
            ->paginate($request->get('limit'));
    }

    private function getAllComRelations(Request $request): mixed
    {
        return $this->repository
            ->findAllFieldsAnd($request, explode(',', $request->get('relations')))
            ->orderByRaw(($request->get('order') ?? 'id').' '.($request->get('direction') ?? 'DESC'))
            ->paginate($request->get('limit'));
    }

    private function getAllSemRelations(Request $request): mixed
    {
        return $this->repository
            ->findAllFieldsAnd($request)
            ->orderByRaw(($request->get('order') ?? 'id').' '.($request->get('direction') ?? 'DESC'))
            ->paginate($request->get('limit'));
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find(int $id): mixed
    {
        return $this->repository->find($id);
    }

    public function create(array $input): mixed
    {
        return $this->repository->create($input);
    }

    public function update(array $input, int $id): mixed
    {
        $res = $this->find($id);
        if (! empty($res)) {
            return $this->repository->update($input, $id);
        }
    }

    public function show(int $id): mixed
    {
        return $this->find($id);
    }

    public function destroy(int $id): mixed
    {
        $res = $this->find($id);
        if (! empty($res)) {
            return $res->delete();
        }
    }

    public function truncate()
    {
        return $this->repository->truncate();
    }
}
