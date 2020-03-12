<?php

namespace app\service;

class GroupService
{

    const ACD_GROUP_DIAL_ALGORITHMS = [
        0 => 'serial_by_priority',
        1 => 'parallel_by_priority',
        2 => 'parallel',
        3 => 'random',
        5 => 'most_idle',
        6 => 'answ_calls',
        7 => 'talk_time'
    ];

    public function getGroup(string $fipointid): array
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT fsname 
            FROM sw.point_acd_groups
            WHERE fipoint_id=:fipoint_id",
            [':fipoint_id' => $fipointid]
        );
        return $connection->queryAll();
    }

    public function getGroupCount(int $fipointid ): int
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT count(*) as total
            FROM sw.point_acd_groups
            WHERE fipoint_id=:fipoint_id",
            [':fipoint_id' => $fipointid]
        );
        $result = $connection->queryAll();
        return $result[0]['total'];
    }

    public function getGroupAlgorithms():array
    {
        $algl =  self::ACD_GROUP_DIAL_ALGORITHMS;
        return $algl;
    }
}

