<?php

namespace app\service;

use yii;

class NumberService
{

        public function getNumbers()
        {
            $command = \Yii::$app->dbSwMaster->createCommand('SELECT  ab.fiabonent_id as abonent_id, ab.fiabonent_type as number_type, 
aa.fiapp_profile_id as profile_id, aa.fsnumber as number FROM auth.abonents ab join sw.app_activation aa
ON aa.fsaccount_code = RPAD(ab.fiabonent_id::varchar, 32)');
            $command->bindValue(':aa.finumber_target', (int)$number);
            $command->bindValue(':ab.fiproduct_id', (int)$product);
            $command->bindValue(':ab.fiactive', (int)$active);
            return $command->queryAll();
        }

}