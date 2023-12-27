<?php

namespace AshokDevatwal\AppsInsight;

class TractorJunction {
 
    public static function latestTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "latest tractor",
        'data' => [ ]
      ];
    }

    public static function upcomingTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "upcoming tractor",
        'data' => [ ]
      ];
    }

    public static function popularTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "popular tractor",
        'data' => [ ]
      ];
    }

    public static function fourwdTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "4WD tractor",
        'data' => [ ]
      ];
    }

    public static function acCabinTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "AC cabin tractor",
        'data' => [ ]
      ];
    }

    public static function miniTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "Mini tractor",
        'data' => [ ]
      ];
    }

    public static function electricTractor( $data ) {
      return [
        'name' => "NewProductListing",
        'type' => "EV tractor",
        'data' => [ ]
      ];
    }

    public static function singleBrand( $data ) {
      
        return [
            'name' => "NewListingPage",
            'type' => "BrandListing",
            'data' => [
                'model_name' 		    => $data['tractor']->model_name   ?? '',
                'brand' 	 		      => $data['tractor']->brand->name  ?? '',
                'Ex-Showroom Price' => $data['tractor']->price        ?? '',
                'CC' 				        => $data['tractor']->capacity     ?? '',
                'HP' 				        => $data['tractor']->parsed_horse_power ?? '',
                'UI' 				        => 'New',
                'Fuel'  	 		      => isset( $data['tractor'] ) ? ( $data['tractor']->isElectric == null ? 'Diesel' : 'Electric' ) : 'NA',
            ]
        ];
    }

    public static function singleTractor($data) {

        return [
            'name' => "NewProductDetail",
            'type' => "ModelPage",
            'data' => [
                'model_name' 		    => $data['tractor']->model_name   ?? '',
                'brand' 	 		      => $data['tractor']->brand->name  ?? '',
                'Ex-Showroom Price' => $data['tractor']->price        ?? '',
                'CC' 				        => $data['tractor']->capacity     ?? '',
                'HP' 				        => $data['tractor']->parsed_horse_power ?? '',
                'UI' 				        => 'New',
                'Fuel'  	 		      => isset( $data['tractor'] ) ? ( $data['tractor']->isElectric == null ? 'Diesel' : 'Electric' ) : 'NA',
            ]
        ];
    }

}