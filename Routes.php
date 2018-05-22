<?php

class Routes {

    /**
     * @return array
     */
    public static function getRoutes()
    {

        return [
            'view_product' => [
                'pattern'=> 'produs/{id}',
                'controller'=> 'ProductController',
                'action'=> 'view'
            ],
           'list_category_products'=>[
               'pattern'=>'categorie/{name}/{id}',
               'controller'=>'ProductController',
               'action'=>'category'
           ],
            'despre_noi'=>[
                'pattern'=>'{lang}/about-us',
                'controller'=>'ContentController',
                'action'=>'about'
            ]

        ];
    }


}