<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


//goi services de chay policy and gate
use App\Services\PermissionGateAndPolicyAccess;

use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //define gate and policy
        $permisssionGateAndPolicyAccess = new PermissionGateAndPolicyAccess();
        $permisssionGateAndPolicyAccess -> setGateAndPolicyAccess();
       
    }
    
}
