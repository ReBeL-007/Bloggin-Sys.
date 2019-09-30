<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use App\Model\User\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function before($user)
    {
        dd('$user');
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\User\Post  $post
     * @return mixed
     */
    public function view(Admin $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function create(Admin $user)
    {
        // dd('d');
        
       return $this->getPermission($user,2);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\User\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user,3);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\User\Post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,5);
    }

    public function tag(Admin $user)
    {
        return $this->getPermission($user,9);
    }

    public function category(Admin $user)
    {
        
        return $this->getPermission($user,6);
    }

    public function user(Admin $user)
    {
        
        return $this->getPermission($user,11);
    }

    protected function getPermission($user, $p_id){
        //  dd($user->roles);
        
         foreach($user->roles as $role){
            // dd($role->permissions);
            foreach($role->permissions as $permission){
                    // dd($permission);
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }

  
}
