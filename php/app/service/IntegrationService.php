<?php

namespace app\service;

class IntegrationService
{
    public function getUsers(string $productId): array
    {
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand("
            SELECT ab.fiabonent_id as abonent_id, ab.fiabonent_type as number_type, aa.fiapp_profile_id as profile_id, aa.fsnumber as number 
            FROM auth.abonents ab 
            JOIN sw.app_activation aa 
            ON aa.fsaccount_code = RPAD(ab.fiabonent_id::varchar, 32) 
            WHERE aa.finumber_target = 0 
            AND ab.fiproduct_id = :product_id 
            AND ab.fiactive = 1", [':product_id' => $productId]);

        return $command->queryAll();
    }

    public function getUser2(string $fiPointId): array
    {
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand("
            SELECT c.fipoint_fwd_schema_id as schema_id, c.fipoint_ctx_setting_id as profile_id, fsschema_name as schema_name 
            FROM sw.point_ctx_settings c
            JOIN sw.point_fwd_schemas f ON c.fipoint_fwd_schema_id = f.fipoint_fwd_schema_id 
            WHERE c.fipoint_fwd_schema_id IS NOT NULL 
            AND f.fishow_at_web <> 2 
            AND c.fipoint_id = :fipoint_id", [':fipoint_id' => $fiPointId]);

        return $command->queryAll();
    }
}