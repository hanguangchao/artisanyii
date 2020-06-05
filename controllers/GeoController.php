<?php

namespace app\controllers;

use Yii;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\data\Pagination;

/**
 * DictController
 */
class GeoController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
        $geotools       = new \League\Geotools\Geotools();
        $coordToGeohash = new \League\Geotools\Coordinate\Coordinate('39.730661, 116.180350');

        // encoding
        $encoded = $geotools->geohash()->encode($coordToGeohash, 12);

        printf("%s\n", $encoded->getGeohash()); // spey
        // encoded bounding box
        // $boundingBox = $encoded->getBoundingBox(); // array of \League\Geotools\Coordinate\CoordinateInterface
        // $southWest   = $boundingBox[0];
        // $northEast   = $boundingBox[1];
        // printf("http://www.openstreetmap.org/?minlon=%s&minlat=%s&maxlon=%s&maxlat=%s&box=yes\n",
        //     $southWest->getLongitude(), $southWest->getLatitude(),
        //     $northEast->getLongitude(), $northEast->getLatitude()
        // ); 


        // $polygon = new \League\Geotools\Polygon\Polygon([
        //     [48.9675969, 1.7440796],
        //     [48.4711003, 2.5268555],
        //     [48.9279131, 3.1448364],
        //     [49.3895245, 2.6119995],
        // ]);
        
        // $polygon->setPrecision(5); // set the comparision precision
        // $polygon->pointInPolygon(new \League\Geotools\Coordinate\Coordinate([49.1785607, 2.4444580])); // true
        // $polygon->pointInPolygon(new \League\Geotools\Coordinate\Coordinate([49.1785607, 5])); // false
        // $polygon->pointOnBoundary(new \League\Geotools\Coordinate\Coordinate([48.7193486, 2.13546755])); // true
        // $polygon->pointOnBoundary(new \League\Geotools\Coordinate\Coordinate([47.1587188, 2.87841795])); // false
        // $polygon->pointOnVertex(new \League\Geotools\Coordinate\Coordinate([48.4711003, 2.5268555])); // true
        // $polygon->pointOnVertex(new \League\Geotools\Coordinate\Coordinate([49.1785607, 2.4444580])); // false
        // $polygon->getBoundingBox(); // return the BoundingBox object

        // print_r($polygon);
        exit;
    }
}