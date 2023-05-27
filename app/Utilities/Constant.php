<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class Constant
{
    const PER_PAGE_DEFAULT = 5, PAGE_DEFAULT = 1;
    const PER_PAGE = [5, 10, 25];

    public static function status($status_value)
    {
        $status_value = Str::upper($status_value);
        $status =  [
            'ACTIVE' => [
                'label' => trans('general.active'),
                'value' => 'ACTIVE',
                'class' => 'success'
            ],
            'INACTIVE' => [
                'label' =>  trans('general.inactive'),
                'value' => 'INACTIVE',
                'class' => 'danger'
            ],
        ];

        return $status[$status_value];
    }

    const WHATSAPP_TYPE = [
        'OTP' => [
            'label' => 'OTP',
            'value' => 'OTP',
            'class' => 'light-warning',
        ],
        'BROADCAST' => [
            'label' => 'Spam',
            'value' => 'BROADCAST',
            'class' => 'light-info',
        ],
        'MESSAGING' => [
            'label' => 'Enak Enak :/',
            'value' => 'MESSAGING',
            'class' => 'light-primary',
        ],
    ];
    const WHATSAPP_MESSAGE_TYPE = [
        'OTP' => [
            'label' => 'OTP',
            'value' => 'OTP',
            'class' => 'light-warning',
        ],
        'BROADCAST' => [
            'label' => 'Spam',
            'value' => 'BROADCAST',
            'class' => 'light-info',
        ],
    ];

    const WHATSAPP_STATUS = [
        'ACTIVE' => [
            'label' => 'Aktif',
            'value' => 'ACTIVE',
            'class' => 'primary',
        ],
        'INACTIVE' => [
            'label' => 'Tidak Aktif',
            'value' => 'INACTIVE',
            'class' => 'danger',
        ],
        'FAILED' => [
            'label' => 'Gagal',
            'value' => 'FAILED',
            'class' => 'danger',
        ],
        'SUCCESS' => [
            'label' => 'Sukses',
            'value' => 'SUCCESS',
            'class' => 'primary',
        ],
    ];
    const HELP_CENTER_TYPE = [
        1 => [
            'label' => 'Akun User',
            'value' => 1,
        ],
        2 => [
            'label' => 'Kelola Kartu',
            'value' => 2,
        ],
        3 => [
            'label' => 'CazhPOIN',
            'value' => 3,
        ],
        4 => [
            'label' => 'Saldo Kartu',
            'value' => 4,
        ],
        5 => [
            'label' => 'Akademik',
            'value' => 5,
        ],
        6 => [
            'label' => 'Tagihan dan Donasi',
            'value' => 6,
        ],
        7 => [
            'label' => 'Tabungan',
            'value' => 7,
        ],
        8 => [
            'label' => 'PPOB',
            'value' => 8,
        ],
    ];

}
