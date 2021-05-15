<?php 
namespace restapi\controllers;

use frontend\models\Muzik;
use yii\rest\Controller;
use yii\web\Response;
use Yii;
use yii\web\UploadedFile;
class MuzikController extends Controller
{

    public function behaviors()
{
    return [
        'corsFilter' => [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['http://www.myserver.com', 'https://www.myserver.com'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Method' => ['POST', 'PUT'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],

        ],
    ];
}
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $musics = $musics = Muzik::find()->all();

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



    
   public function actionAddMuzik()
    {
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = \Yii::$app->request;
        // return $request;
        $result = "";
        if ($request->isPost) {
            
            $name = $request->post('name'); 
            $artist = $request->post('artist');
            $url = $request->post('url');
            $musicsModel = new Muzik();
            $musicsModel->name = $name;
            $musicsModel->artist = $artist;
            
            $musicsModel->url = $url;

            // $file = time().basename($_FILES['file1']['name']);
            // if (move_uploaded_file($_FILES['file1']['tmp_name'], $file)) {
                // $musicsModel->file = $file;
                // $musicsModel->save();
                
            // }
            $path = "musics/";
            $file = time().basename($_FILES['file1']['name']);
            if (is_uploaded_file($_FILES['file1']['tmp_name']))
            {   
                move_uploaded_file($_FILES["file1"]["tmp_name"], $path.$file);
                 $musicsModel->file = '/restapi/web/musics/'.$file;
                 $musicsModel->save();
            }
            $result = $musicsModel;
        }
        else {
            $result = "bu usul postdan tashqari boshqa http usulini qo'llab-quvvatlay olmaydi";
        }

        return array('data'=>$result);
    }



















//    public function actionAddMuzik()
//     {
        
//         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//         $request = \Yii::$app->request;
//         // return $request;
//         $result = "";
//         if ($request->isPost) {
            
//             $name = $request->post('name'); 
//             $artist = $request->post('artist');
//             $url = $request->post('url');
//             $musicsModel = new Muzik();
//             $musicsModel->name = $name;
//             $musicsModel->artist = $artist;
//             $musicsModel->url = $url;

//             $file = time().basename($_FILES['file1']['name']);
            
//             if (move_uploaded_file($_FILES['file1']['tmp_name'], $file)) {
//                 $musicsModel->file = $file;
//                 $musicsModel->save();

//             }
//             $result = $musicsModel;
//         }
//         else {
//             $result = "bu usul postdan tashqari boshqa http usulini qo'llab-quvvatlay olmaydi";
//         }

//         return array('data'=>$result);
//     }


   


}



?>