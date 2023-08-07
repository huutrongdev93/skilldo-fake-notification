<?php
function FakeNotificationUpdate(): void
{
    if(Admin::is() && Auth::check() ) {
        $version = Option::get('fake_notification_version');
        $version = (empty($version)) ? '1.0.0' : $version;
        if (version_compare( FAKE_NOTIFICATION_VERSION, $version ) === 1 ) {
            $update = new FakeNotificationUpdateVersion();
            $update->runUpdate($version);
        }
    }
}
add_action('admin_init', 'FakeNotificationUpdate');
Class FakeNotificationUpdateVersion {
    public function runUpdate($shippingVersion): void
    {
        $listVersion    = ['2.0.0'];
        $model          = model();
        foreach ($listVersion as $version ) {
            if(version_compare( $version, $shippingVersion ) == 1) {
                $function = 'updateVersion_'.str_replace('.','_',$version);
                if(method_exists($this, $function)) $this->$function($model);
            }
        }
        Option::update('fake_notification_version', FAKE_NOTIFICATION_VERSION );
    }
    public function updateVersion_2_0_0($model): void
    {
        FakeNotificationUpdateDatabase::Version_2_0_0($model);
        FakeNotificationUpdateFiles::Version_2_0_0($model);
    }
}
Class FakeNotificationUpdateDatabase {
    static function Version_2_0_0($model): void
    {
        $config = Option::get('fake_notification_config');
        $config['show']     = ['desktop', 'mobile'];
        $config['position'] = 'bottomRight';
        $config['dataType'] = 'products';
        if(isset($config['time_show'])) unset($config['time_show']);
        if(isset($config['time_delay'])) unset($config['time_delay']);
        $config['customers']    = (empty($config['fake_customer'])) ? [] : $config['fake_customer'];
        $config['dataProducts'] = (empty($config['fake_product'])) ? [] : $config['fake_product'];
        $config['dataHandmade'] = [];
        if(isset($config['fake_customer'])) unset($config['fake_customer']);
        if(isset($config['fake_product'])) unset($config['fake_product']);
        Option::update('fake_notification_config', $config);
    }
}

Class FakeNotificationUpdateFiles {
    static function Version_2_0_0($model): void {
        $path = FCPATH.FAKE_NOTIFICATION_PATH.'/';
        $Files = [
            //options
            'modules/html-main.php',
        ];
        foreach ($Files as $file) {
            if(file_exists($path.$file)) unlink($path.$file);
        }
        $Folders = [
            'modules',
        ];
        foreach ($Folders as $folder) {
            if(is_dir($path.$folder)) rmdir($path.$folder);
        }
    }
}