<?php
const FAKE_NOTIFICATION_NAME = 'fake-notification';

const FAKE_NOTIFICATION_VERSION = '2.1.1';

define('FAKE_NOTIFICATION_PATH', Path::plugin(FAKE_NOTIFICATION_NAME));

class Fake_Notification {
    private string $name = 'fake_notification';

    public function active(): void
    {
        $config = self::config();
        if(!class_exists('sicommerce')) {
            $config['dataType'] = 'handmade';
        }
        Option::update('fake_notification_config', $config);
        Option::update('fake_notification_version', FAKE_NOTIFICATION_VERSION);
    }

    public function uninstall(): void {
        Option::delete('fake_notification_config');
        Option::delete('fake_notification_version');
    }
    static function adminAssets(): void
    {
        $asset = FAKE_NOTIFICATION_PATH.'/assets/';
        if(Admin::is()) {
            Admin::asset()->location('header')->add('fakeN', $asset.'css/style.admin.css');
            Admin::asset()->location('footer')->add('fakeN', $asset.'script/script.admin.js');
        }
    }

    static function assets(): void
    {
        $asset = FAKE_NOTIFICATION_PATH.'/assets/';
        include_once $asset.'css/style.client.less';
    }

    static function config($key = '') {
        $default = [
            'key'           => time(),
            'show'          => ['desktop', 'mobile'],
            'position'      => 'bottomRight',
            'customers'     => [],
            'dataProducts'  => [],
            'dataHandmade'  => [],
            'dataType'      => 'products',
        ];

        $config = Option::get('fake_notification_config', array_merge([], $default));

        if(empty($config)) $config = [];

        $config = array_merge($default, $config);

        if(!empty($key)) {
            if(isset($config[$key])) {
                return $config[$key];
            }
            if(Arr::get($config, $key) !== null) return Arr::get($config, $key);
        }

        return $config;
    }

    static function render()
    {
        $config = static::config();
        if(Device::isGoogleSpeed()) return null;
        if(have_posts($config['show']) && !Theme::isReviewWidget()) {
            if(Device::isMobile() && !in_array('mobile', $config['show'])) return null;
            if(!Device::isMobile() && !in_array('desktop', $config['show'])) return null;
            Plugin::view(FAKE_NOTIFICATION_NAME, 'popup', ['config' => $config]);
        }
    }
}

include 'fake-notification-ajax.php';
include 'fake-notification-update.php';
if(Admin::is()) {
    add_action('admin_init','Fake_Notification::adminAssets', 100);
    include 'admin/admin.php';
}
else {
    add_action('theme_custom_less','Fake_Notification::assets');
    add_action('cle_footer','Fake_Notification::render');
}