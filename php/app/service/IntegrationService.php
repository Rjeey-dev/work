<?php

namespace app\service;

class IntegrationService
{
    const INT_SERVICES = array(
        'API_CONNECT' => "api-vpbx/settings",
        'API_AMOCRM' => "api-vpbx/crm",
        'API_BITRIX24' => "api-vpbx/crm",
        'API_GSUITE' => "api-vpbx/systems",
        'API_PROST_ZVONKI' => "api-vpbx/partners",
        'API_RETAILCRM' => "api-vpbx/crm",
        'API_ZENDESK' => "api-vpbx/servicedesk"
    );
    const STATUS_ACTIVE = 900;

    public function getServices(int $productId): array
    {
        $connection = \Yii::$app->dbBillingMaster->createCommand("
            SELECT *
            FROM billing_iweb.get_available_services(:product_id, null, 1) 
            where fistatus=:status
            UNION all
            SELECT * 
            FROM billing_iweb.get_acc_dtl_services(:product_id, null, 1)
            where fistatus=:status",
            [':product_id' => $productId, ':status' => self::STATUS_ACTIVE]
        );
        return $connection->queryAll();
    }

    public function getIntegration(int $productId): array
    {
        $services = $this->getServices($productId);
        $integrations = [];
        foreach ($services as $service) {
            if (array_key_exists($service['fsservice_code'], self::INT_SERVICES)) {
                $integrations[] = $service;
            }
        }
        return $integrations;

    }

    public function getIntegrationCount(int $productId): int
    {
        $count = $this->getIntegration($productId);
        return count($count);
    }
}