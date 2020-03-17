<?php

namespace app\service;

class StaffService
{
    public function getStaff(int $pointId, int $active): array
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT a.fiabonent_id  as  abonent_id, fipoint_member_id as point_member_id , fsabonent_name as name
            FROM sw.point_members m
            LEFT JOIN sw.auth.abonents a on  a.fiabonent_id = m.fiabonent_id
            LEFT JOIN sw.point_fwd_targets t on t.fipoint_fwd_target_id = m.fipoint_member_id
            WHERE m.fipoint_id =:point_id
            AND a.fiactive=:active
            AND a.fiis_system=1
            ORDER BY point_member_id desc
            LIMIT 3 ",
            [':point_id' => $pointId, ':active' => $active,]
        );
        return $connection->queryAll();
    }

    public function getStaffCount(int $pointId): int
    {
        $connection = \Yii::$app->dbSwMaster->createCommand("
            SELECT count(*) as total
            FROM sw.point_members
            WHERE fipoint_id=:point_id",
            [':point_id' => $pointId]
        );
        $result = $connection->queryAll();
        return $result[0]['total'];
    }
}

