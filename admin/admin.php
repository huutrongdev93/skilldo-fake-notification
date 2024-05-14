<?php
Class FakeNotificationAdmin {

    static function register($tabs) {
        $tabs['fake_notification'] = [
            'group'         => 'marketing',
            'label'         => 'Thông báo ảo',
            'description'   => 'Quản lý thông báo đơn hàng ảo',
            'callback'      => 'FakeNotificationAdmin::render',
            'icon'          => '<i class="fad fa-bell"></i>',
        ];
        return $tabs;
    }

    static function render(): void {
        $productPlugin      = class_exists('sicommerce');

        $productsCategories = ($productPlugin) ? ProductCategory::gets(Qr::set()->categoryType('options')) : [];

        $dataType           = Fake_Notification::config('dataType');

        $form               = form();

        $form
            ->checkbox('show', [
                'desktop' => 'Hiển thị trên desktop',
                'mobile'  => 'Hiển thị trên mobile'
            ], [
                'label' => 'Bật hiển thị thông báo ảo'
            ], Fake_Notification::config('show'));

        $form->selectImg('position', [
            'bottomLeft'    => [ 'label' => 'Gốc dưới - bên trái', 'img'   => Admin::imgLink('bottomLeft.png')],
            'bottomRight'   => [ 'label' => 'Gốc dưới - bên phải', 'img'   => Admin::imgLink('bottomRight.png')],
            'topLeft'       => [ 'label' => 'Gốc trên - bên trái', 'img'   => Admin::imgLink('topLeft.png')],
            'topRight'      => [ 'label' => 'Gốc trên - bên phải', 'img'   => Admin::imgLink('topRight.png')],
        ], [
            'label' => 'Vị trí popup sẽ hiển thị',
        ], Fake_Notification::config('position'));

        Admin::view('components/system-default', [
            'title' => 'Cấu hiển thị',
            'description' => 'Cấu hình hiển thị, vị trí hiển thị thông báo',
            'form' => $form
        ]);

        Plugin::view(FAKE_NOTIFICATION_NAME, 'admin/views/config', [
            'productsCategories'    => $productsCategories,
            'dataType'              => $dataType,
            'productPlugin'         => $productPlugin
        ]);
    }
}

add_filter('skd_system_tab', 'FakeNotificationAdmin::register', 50);