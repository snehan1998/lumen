<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['role'];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'role_id'=>$user->role_id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

    public function includeRole(User $user)
    {
        $role = $user->role;
        return $this->item($role, new RoleTransformer());
    }
}
