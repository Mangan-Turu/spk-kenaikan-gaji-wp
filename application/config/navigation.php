<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['navigation'] = [
    [
        'label' => 'Dashboard',
        'icon' => 'fas fa-tachometer-alt',
        'url' => '#',
        'active' => ['dashboard', 'index', 'index2'],
        'children' => [
            [
                'label' => 'Dashboard v1',
                'url' => 'index',
                'active' => ['index'],
            ],
            [
                'label' => 'Dashboard v2',
                'url' => 'index2',
                'active' => ['index2'],
            ]
        ]
    ],
    [
        'label' => 'Data Kriteria',
        'icon' => 'fas fa-table',
        'url' => 'kriteria',
        'active' => ['kriteria']
    ],
    [
        'label' => 'Data Karyawan',
        'icon' => 'fas fa-th',
        'url' => 'karyawan',
        'active' => ['karyawan']
    ],
    [
        'label' => 'Input Penilaian',
        'icon'  => 'fas fa-clipboard-check',
        'url'   => 'penilaian',
        'active' => ['penilaian']
    ],
    [
        'label' => 'Hasil Penilaian',
        'icon'  => 'fas fa-poll',
        'url'   => 'hasil',
        'active' => ['hasil']
    ],
    [
        'label' => 'Logout',
        'icon' => 'fas fa-sign-out-alt',
        'url' => 'logout',
        'active' => []
    ]
];
