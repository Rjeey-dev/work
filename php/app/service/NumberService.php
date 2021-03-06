<?php

namespace app\service;

use yii;

class NumberService
{
    public function getNumbers(string $productId, int $limit, int $offset): array
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT ab.fiabonent_id as abonent_id, aa.fiapp_profile_id as profile_id, aa.fsnumber as number, fsschema_name as schema_name, c.fipoint_fwd_schema_id as schema_id
            FROM auth.abonents ab 
            JOIN sw.app_activation aa ON aa.fsaccount_code = RPAD(ab.fiabonent_id::varchar, 32)
            JOIN sw.point_ctx_settings c ON c.fipoint_ctx_setting_id = aa.fiapp_profile_id
            JOIN sw.point_fwd_schemas f ON c.fipoint_fwd_schema_id = f.fipoint_fwd_schema_id
            WHERE aa.finumber_target = 0 
            AND ab.fiproduct_id = :product_id 
            AND ab.fiactive = 1
            AND c.fipoint_fwd_schema_id IS NOT NULL
            AND f.fishow_at_web <> 2
            LIMIT :limit OFFSET :offset",
            [':product_id' => $productId, ':limit' => $limit, ':offset' => $offset]
        );
        return $connection->queryAll();

    }

    public function getCountNumbers(string $productId): int
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT count(*) as total
            FROM auth.abonents ab 
            JOIN sw.app_activation aa ON aa.fsaccount_code = RPAD(ab.fiabonent_id::varchar, 32)
            JOIN sw.point_ctx_settings c ON c.fipoint_ctx_setting_id = aa.fiapp_profile_id
            JOIN sw.point_fwd_schemas f ON c.fipoint_fwd_schema_id = f.fipoint_fwd_schema_id
            WHERE aa.finumber_target = 0 
            AND ab.fiproduct_id = :product_id 
            AND ab.fiactive = 1
            AND c.fipoint_fwd_schema_id IS NOT NULL
            AND f.fishow_at_web <> 2",
            [':product_id' => $productId]
        );
        $result = $connection->queryAll();
        return $result[0]['total'];
    }


    /* public function getSchema(string $fiPointId): array
     {
         $connection = \Yii::$app->dbSwMaster->createCommand("
             SELECT c.fipoint_fwd_schema_id as schema_id, c.fipoint_ctx_setting_id as profile_id, fsschema_name as schema_name
             FROM sw.point_ctx_settings c
             JOIN sw.point_fwd_schemas f ON c.fipoint_fwd_schema_id = f.fipoint_fwd_schema_id
             WHERE c.fipoint_fwd_schema_id IS NOT NULL
             AND f.fishow_at_web <> 2
             AND c.fipoint_id = :fipoint_id", [':fipoint_id' => $fiPointId]);
         return $connection->queryAll();
     }*/
}