<?php 
namespace restapi\controllers;

use frontend\models\Musics;
use yii\rest\Controller;
use yii\web\Response;
use Yii;
use yii\web\UploadedFile;
class MusicsController extends Controller
{


    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $musics = $musics = Musics::find()->all();

        return $musics;
    }  


    // public function actionAddMusics(){
    //     \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $post = Yii::$app->request->getBodyParams();
    //     if(!empty($post)){
    //         $model = new Musics();
    //         $model->name = $post['name'];
    //         $model->artist = $post['artist'];
    //         $model->url = $post['url'];
    //         if ($model->save()) {
    //             return ['result'=>200];                
    //         }
    //         else {
    //             $model->getErrors;
    //         }
    //     }
    // }





   public function actionAddMusics()
    {
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = \Yii::$app->request;
        // return $request;
        $result = "";
        if ($request->isPost) {
            
            $name = $request->post('name'); 
            $artist = $request->post('artist');
            $url = $request->post('url');
            $musicsModel = new Musics();
            $musicsModel->name = $name;
            $musicsModel->artist = $artist;
            $musicsModel->url = $url;

            $musicsModel->file = UploadedFile::getInstances($musicsModel, 'file');
           
            if ($musicsModel->upload()) {
                $musicsModel->save();

                $result = "Malumot saqlandi";
            }
            else {
                $result = $musicsModel->errors;
            }
        }
        else {
            $result = "bu usul postdan tashqari boshqa http usulini qo'llab-quvvatlay olmaydi";
        }

        return array('data'=>$result);
    }


   


}



?>