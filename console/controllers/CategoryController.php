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
class CategoryController extends Controller
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

    // lay thu muc cha
    public function actionIndex()
    {
        //$categories = file_get_contents('http://api.poki.com/category?site=3');
        //$categories = json_decode($categories,true);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://api.poki.com/category?site=3');
        $result = curl_exec($ch);
        curl_close($ch);
        
        $categories = json_decode($result);

        //var_dump($categories);die;
        
        foreach($categories as $category){
            $cat = new GameCategory();
            $cat->slug = $category->slug;
            $cat->title = $category->title;
            $cat->image = $category->image;
            $cat->save(false);
        }
    
        echo "Done";
        
        
//         You can also use curl to get the url. To use curl, you can use the example found here:

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_URL, 'url_here');
// $result = curl_exec($ch);
// curl_close($ch);

// $obj = json_decode($result);
// echo $obj->access_token;
    }
    // Lay thu muc cha va con
    //
    // Step 2: Run   php yii category/subcategory
    //
    public function actionSubcategory()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://api.poki.com/category?site=3');
        $result = curl_exec($ch);
        curl_close($ch);
        
        $categories = json_decode($result);
        $count = 0;
        foreach($categories as $category){
            $cat = new GameCategory();
            $cat->id = $category->id;
            $cat->slug = $category->slug;
            $cat->title = $category->title;
            $cat->image = $category->image;
            try{
                    $cat->save(false);
                    foreach ($category->children as $child) {
                        $catChild = new GameCategory();
                        $catChild->id = $child->id;
                        $catChild->slug = $child->slug;
                        $catChild->title = $child->title;
                        $catChild->image = $child->image;
                        $catChild->parent_id = $cat->id;
                        try{
                            $catChild->save(false);
                            $count++;
                        }catch(\Exception $e){
                            continue;
                        }
                    }
                }catch(\Exception $e){
                    continue;
                }
            
        }
    
        echo "Done ".$count."\n";
    
    }
    
    // Lay chi tiet cho thu muc
    //
    // Step 3: Run   php yii category/game-detail
    //
    public function actionGameDetail()
    {
        $games = Game::find()->all();
        //var_dump($categories[0]);die;
        $countCat = 0;
        foreach ($games as $game) {
            //var_dump($category);die;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'http://api.poki.io/game/'.$game->slug.'?site=3&mobile=0&cache=45');
            $result = curl_exec($ch);
            curl_close($ch);
            
            
            $gameDetail = json_decode($result);
            //var_dump($catDetail);die;
            $game->body = $gameDetail->description;
            $game->meta_title = $gameDetail->meta->title;
            $game->meta_description = $gameDetail->meta->description;
            $game->save();
            
            
            // $games = $catDetail->games;
            // //echo $key;
            // //var_dump($games);die;
            // if(!$games){
            //     echo ', '.$category->slug;
            //     continue;
            // }
            // foreach($games as $game){
            //     $gameModel = new Game();
                
            //     $gameModel->id = $game->id;
            //     $gameModel->slug = $game->slug;
            //     $gameModel->title = $game->title;
            //     $gameModel->thumbnail_path = $game->image;
            //     $gameModel->category_id = $category->id;
                
            //     try{
            //             $gameModel->save();$countCat++;
                        
            //     }catch(\Exception $e){
            //         continue;
            //     }
                
            // }
        }
        
    
        echo "Done cat:".$countCat;
    
    }
    
        /**
     * @author Lex
     * yii test/mail [--to="hemctest@gmail.com"]
     */
    public function actionCategoryDetail()
    {
        $categories = GameCategory::find()->all();
        //var_dump($categories[0]);die;
        $countCat = 0;
        foreach ($categories as $category) {
            //var_dump($category);die;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'http://api.poki.com/category/'.$category->slug.'?site=3&offset=0&limit=1000');
            $result = curl_exec($ch);
            curl_close($ch);
            
            
            $catDetail = json_decode($result);
            //var_dump($catDetail);die;
            //$category->body = $catDetail->description;
            //$category->meta_title = $catDetail->meta->title;
            //$category->meta_description = $catDetail->meta->description;
            //$category->save();
            
            
            $games = $catDetail->games;
            //echo $key;
            //var_dump($games);die;
            if(!$games){
                echo ', '.$category->slug;
                continue;
            }
            foreach($games as $game){
                $gameModel = new Game();
                
                $gameModel->id = $game->id;
                $gameModel->slug = $game->slug;
                $gameModel->title = $game->title;
                $gameModel->thumbnail_path = $game->image;
                $gameModel->category_id = $category->id;
                
                try{
                        $gameModel->save();$countCat++;
                        
                }catch(\Exception $e){
                    continue;
                }
                
            }
        }
        
    
        echo "Done cat:".$countCat;
    
    }
    /**
     * @author Lex
     * yii test/mail [--to="hemctest@gmail.com"]
     */
    
    public function actionMail($to) {
        echo "Sending mail to " . $to;
    }
}
