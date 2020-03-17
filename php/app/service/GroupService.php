<?php

namespace app\service;

class GroupService
{

    public function getGroup(string $fipointId): array
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT fsname 
            FROM sw.point_acd_groups
            WHERE fipoint_id=:point_id",
            [':point_id' => $fipointId]
        );
        return $connection->queryAll();
    }

    public function getGroupCount(int $fipointId): int
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT count(*) as total
            FROM sw.point_acd_groups
            WHERE fipoint_id=:point_id",
            [':point_id' => $fipointId]
        );
        $result = $connection->queryAll();
        return $result[0]['total'];
    }

}

