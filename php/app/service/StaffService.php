<?php

namespace app\service;

class StaffService
{
    public function getStaff(): array
    {

        return [
            [
                'name' => 'Alex',
                'number' => '123213',
                'id' => '111',
            ],
            [
                'name' => 'Alex 2',
                'number' => '1232132',
                'id' => '111 2',
            ],
            [
                'name' => 'Alex3',
                'number' => '123213',
                'id' => '111',
            ],
        ];
    }

    public function getStaffCount(): int
    {
        return 12;
    }
}