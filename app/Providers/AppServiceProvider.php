<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Enums\RespondentType;
use App\PublicTransportUserResponse;
use App\PublicTransportOperatorResponse;
use App\PublicTransportRegulatorResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Relation::morphMap([
            (string) RespondentType::public_transport_user() => PublicTransportUserResponse::class,
            (string) RespondentType::public_transport_operator_investor() => PublicTransportOperatorResponse::class,
            (string) RespondentType::public_transport_regulator() => PublicTransportRegulatorResponse::class,
        ]);

        // Default paginator
        Paginator::defaultView('vendor.pagination.bulma');
    }
}
