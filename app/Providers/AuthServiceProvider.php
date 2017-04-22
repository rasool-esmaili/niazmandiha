<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-post', function ($user, $post) {
            return $user->id == $post->user_id;
        });



        Gate::define('isadmin', function ($user)
        {
            return $user->admin ;
        });

         Gate::define('isSuperAdmin', function ($user)
        {
            return $user->superadmin ;
        });

        Gate::define('isverification', function ($user,$id)
        {
            $post=Post::find($id);
            if($post->verification==0)
                return true  ;
            else
                return false;
        });


        
        Gate::define('bookmark', function ($user, $post)
        {
            $id=$user->mark_post;
            
            if (strpos($id, $post) !== false) {
                 return true;
            }
            else
            {
                return false;
            }
        });
    }
}
