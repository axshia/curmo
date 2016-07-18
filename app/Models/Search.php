<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

        if($agent->isDesktop()){
            return Comments::join('users', 'users.id', '=', 'comments.users_id')
                ->where($conditions)
                ->orderBy('comments.created_at', 'desc')
                ->paginate(20);
        }

        return Comments::join('users', 'users.id', '=', 'comments.users_id')
            ->where($conditions)
            ->orderBy('comments.created_at', 'desc')
            ->simplePaginate(20);
    }
}
