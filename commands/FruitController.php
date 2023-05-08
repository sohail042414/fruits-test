<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use linslin\yii2\curl;
use app\models\Fruit;
use app\models\Nutrition;

/**
 * This command fetches all fruits from https://fruityvice.com/ and inserts in database.
 *
 */
class FruitController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */

    public function actionIndex(){
        $this->actionFetch();
    }

    public function actionFetch()
    {
        
        //Init curl
        $curl = new curl\Curl();

        //get http://example.com/
        $response = $curl->get('https://fruityvice.com/api/fruit/all');

        $fruitsList = json_decode($response);

        $importedCount = 0;
        
        foreach($fruitsList as $fetchedFruit){ 

            $existing = Fruit::findOne(['external_id' => $fetchedFruit->id]);

            if(empty($existing)){

                $fruit = new Fruit();
                $fruit->external_id = $fetchedFruit->id;
                $fruit->name = $fetchedFruit->name;
                $fruit->family = $fetchedFruit->family;
                $fruit->order = $fetchedFruit->order;
                $fruit->genus = $fetchedFruit->genus;
                
                if($fruit->save()){

                    $importedCount ++;

                    foreach($fetchedFruit->nutritions as $nutritionName => $nutritionValue){
                        $nutrition = new Nutrition();
                        $nutrition->name = $nutritionName;
                        $nutrition->value = $nutritionValue;
                        $nutrition->link('fruit',$fruit);
                    }

                }
            }

        }

        if($importedCount > 0){
            $this->sendAdminEmail();
            echo "\n Imported Fruits Count :".$importedCount;
        }                
        return ExitCode::OK;
    }

    private function sendAdminEmail(){

        Yii::$app->mailer->compose('fruits-imported')
        ->setFrom(Yii::$app->params['senderEmail'])
        ->setTo(Yii::$app->params['adminEmail'])
        ->setSubject('Fruits Imported')
        ->send();

    }
}
