<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class Search extends Model
{
    public static function getComments(Request $request)
    {
        $areaId = $request->get('area');
        $conditions = [];

        if ($areaId !== null) {
            $conditions = array_merge($conditions, ['users.addresses_id' => $areaId]);
        }

        $agent = new Agent();

        $model = Comments::join('users', 'users.id', '=', 'comments.users_id')
            ->where($conditions)
            ->orderBy('comments.created_at', 'desc');

        if ($agent->isDesktop()) {
            return $model->paginate(20);
        }

        return $model->simplePaginate(20);
    }
}
