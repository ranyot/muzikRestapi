<?php 
namespace restapi\controllers;

use frontend\models\Musics;
use yii\rest\Controller;
use yii\web\Response;
use Yii;
class ProductController extends Controller
{

    public function actionIndex()
    {

        return 'salom';
    }



    public function actionCreate()
    {
        $post = Yii::$app->request->getBodyParam('name');
        return $post;
    }


}



?>