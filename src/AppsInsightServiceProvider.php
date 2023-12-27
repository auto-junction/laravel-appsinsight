<?php

namespace AshokDevatwal\AppsInsight;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use AshokDevatwal\AppsInsight\TractorJunction;

class AppsInsightServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/config/config.php', 'appsinsight');
    $this->loadViewsFrom(__DIR__.'/resources/views', 'appsinsight');
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {

        $this->publishes([__DIR__.'/../config/config.php' => config_path('appsinsight.php'), ], 'config');

    }

    View::composer('*', function ($view) {
        
        switch( config('appsinsight.platform') ){
          case 'Tractor_Junction':  $insight_data = $this->tractorDataProccessor( $view->getData() ); break;
          // Add More Platform Here
          default: $insight_data = null; break;
        }

        $view->with('insight_data', $insight_data);        

    });

  }


  /*
  ********************
  * Tractor Junction
  ********************
  */

  public function tractorDataProccessor( $data ) {

        // no tracking if page not passed with view
        if( ! isset($data['page'] ) ) return null;

        switch( $data['page'] ) {
            case 'singleTractor_page': return TractorJunction::singleTractor( $data )    ; break;
            case 'single_brand_page' : return TractorJunction::singleBrand( $data )      ; break;
            case 'electric_tractor'  : return TractorJunction::electricTractor( $data )  ; break;
            case 'mini_tractors'     : return TractorJunction::miniTractor( $data )      ; break;
            case '4wd_tractors'      : return TractorJunction::fourwdTractor( $data )    ; break;
            case 'ac_cabin_tractors' : return TractorJunction::acCabinTractor( $data )   ; break;
            case 'popular_tractor'   : return TractorJunction::popularTractor( $data )   ; break;
            case 'upcoming_tractor'  : return TractorJunction::upcomingTractor( $data )  ; break;
            case 'latest_tractor'    : return TractorJunction::latestTractor( $data )    ; break;
        }
  }

}