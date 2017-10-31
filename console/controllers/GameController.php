<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use common\models\GameCategory;
use common\models\Game;
/**
 * @author Lex
 * Use: cd console
 * php yii category
 * php yii category/index
 * 
 */
class GameController extends Controller
{
    public $writablePaths = [
        '@common/runtime',
        '@frontend/runtime',
        '@frontend/web/assets',
        '@backend/runtime',
        '@backend/web/assets',
        '@storage/cache',
        '@storage/web/source'
    ];

    public $executablePaths = [
        '@backend/yii',
        '@frontend/yii',
        '@console/yii',
    ];

    public $generateKeysPaths = [
        '@base/.env'
    ];

   

    // Lay chi tiet cho thu muc
    // 
    // Step 3: Run   
    //          cd console
    //          php yii game/detail
    //
    public function actionDetail()
    {
        $games = Game::find()->where(['file_content' =>null])->all();
        echo 'Action on '.count($games);
        //var_dump(count($games));die;
        $count = 0;
        foreach ($games as $game) {
            if($game->file_content){
                continue;
            }
            //var_dump($game);die;
            $url = 'http://api.poki.com/game/'.$game->slug.'?site=3&mobile=0&cache=45';
            //print_r('\n');
            //echo $url;
            //print_r('\n');
            //echo $game->id;
            //var_dump($url);die;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            curl_close($ch);
            
            
            $detail = json_decode($result);
            //var_dump($result);die;
            //var_dump($detail);die;
            $game->meta_title = $detail->meta->title;
            $game->meta_description = $detail->meta->description;
            $game->desktop_available = $detail->desktop_available == 'true'? 1 : 0;
            $game->mobile_available = $detail->mobile_available == 'true'? 1 : 0;
            $game->description = $detail->description;
            $game->image = $detail->image;
            $game->file_content = $detail->file->content;
            $game->file_content_type = $detail->file->content_type;
            $game->file_height = $detail->file->height;
            $game->file_width = $detail->file->width;
            $game->file_networking = $detail->file->networking;
            $game->file_orientation = $detail->file->orientation;
            $game->file_render_type = $detail->file->render_type;
            $game->save();
            //var_dump($game->getErrors());
            //break;
            $count++;

        }
        
    
        echo "Done game:".$count;
    
    }
    
   
}
