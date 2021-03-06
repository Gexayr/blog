<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public  function getForComboBox()
    {
//        return $this->startConditions()->all();
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        /*$result[] = $this->startConditions()->all();
        $result[] = $this
            ->startConditions()
            ->select('blog_categories.*',
                \DB::raw('CONCAT (id, ", ", title) AS id_title'))
            ->toBase()
            ->get();*/

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id','title','parent_id'];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->with([
                'parentCategory:id,title',
            ])
            ->paginate($perPage);
//            ->paginate($perPage, $columns);

        return $result;
    }
}
