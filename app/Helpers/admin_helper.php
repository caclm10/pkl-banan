<?php

function sidebarMenus()
{
    return [
        [
            'name' => 'Dashboard',
            'icon' => 'material-symbols:dashboard-outline-rounded',
            'active' => url_is('admin/dashboard'),
            'to' => '/admin/dashboard'
        ],
        [
            'name' => 'Admin',
            'icon' => 'material-symbols:groups-outline-rounded',
            'active' => url_is('admin/admin*'),
            'to' => '/admin/admin'
        ],
        [
            'name' => 'Proyek',
            'icon' => 'ant-design:project-outlined',
            'active' => url_is('admin/proyek*'),
            'to' => '/admin/proyek'
        ],
        [
            'name' => 'Pengumuman',
            'icon' => 'material-symbols:campaign-outline-rounded',
            'active' => url_is('admin/pengumuman*'),
            'to' => '/admin/pengumuman'
        ],
        [
            'name' => 'Tim',
            'icon' => 'ant-design:team-outlined',
            'active' => url_is('admin/tim*'),
            'to' => '/admin/tim'
        ],
        [
            'name' => 'Pekerja Tambahan',
            'icon' => 'fluent-emoji-high-contrast:construction-worker',
            'active' => url_is('admin/pekerja-tambahan*'),
            'to' => '/admin/pekerja-tambahan'
        ],
    ];
}
