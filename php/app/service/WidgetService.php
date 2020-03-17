<?php

namespace app\service;

class WidgetService
{
    public function getWidgets(int $productId, int $active): array
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT fsbutton_name, fiproduct_id
            FROM auth_low.v_buttons
            WHERE fiproduct_id = :product_id
            AND fiactive = :fiactive
            LIMIT 3
           ",
            [':product_id' => $productId, ':fiactive' => $active]
        );

        return $connection->queryAll();
    }

    public function getWidgetsCount(int $productId, int $active): int
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT count(*) as total
            FROM auth_low.v_buttons
            where fiproduct_id = :product_id
            and fiactive = :active"
            ,
            [':product_id' => $productId,':active' => $active]
        );
        $result = $connection->queryAll();
        return $result[0]['total'];
    }
}