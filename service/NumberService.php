<?php

namespace app\service;

use yii;



class NumberService
{
    public function indexAction()
    {
        $select
            ->from(array(
                'ab' => 'auth.abonents'
            ), array(
                'abonent_id' => 'ab.fiabonent_id',
                "number_type" => "ab.fiabonent_type",
                'number' => 'ab.fsabonent_name'
            ))
            ->join(array(
                'a' => DB_SCHEMA_SW . 'app_activation',
            ), 'a.fsaccount_code = RPAD(ab.fiabonent_id::varchar, 32)', array(
                'profile_id' => 'fiapp_profile_id',
                '"number"' => 'fsnumber',
                '"abonent_name"' => 'ab.fsabonent_name',
                '"type"' => 'ab.fiabonent_type',
            ))
            ->where('finumber_target = 0')
            ->where('ab.fiproduct_id = ?', $productId)
            ->where('ab.fiactive = 1');


$select
->from(array('c' => DB_SCHEMA_SW . 'point_ctx_settings'), array(
'schema_id' => 'c.fipoint_fwd_schema_id',
'profile_id' => 'c.fipoint_ctx_setting_id'
))
->joinLeft(array(
'f' => DB_SCHEMA_SW . 'point_fwd_schemas',
), 'c.fipoint_fwd_schema_id = f.fipoint_fwd_schema_id', array(
'schema_name' => 'fsschema_name'
))
->where('c.fipoint_fwd_schema_id IS NOT NULL')
->where('f.fishow_at_web <> ?', 2)
->where('c.fipoint_id = ?', (int)$this->switch->getPointId());

$schemas = $select->query()->fetchAll();

}