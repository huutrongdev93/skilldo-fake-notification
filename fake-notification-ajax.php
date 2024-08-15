<?php

use JetBrains\PhpStorm\NoReturn;
use SkillDo\Http\Request;
class FakeNotificationAdminAjax {
    #[NoReturn]
    static function customerRandom(Request $request, $model): bool
    {
        if($request->isMethod('post')) {

            $fullName = [
                'Hoàng Như Quỳnh', 'Vũ Văn Long',
                'Phạm Minh', 'Nguyễn Văn Đính', 'Đinh Châu Phương Dung', 'Nguyễn Phương', 'Đặng Quốc  Việt', 'Huỳnh Trung Hiếu', 'Nguyễn Thị Thanh Nở', 'Hoàng Mạnh Tuấn',
                'Gọi và Điện', 'Đinh Ngọc Kim Thanh', 'Nguyễn Ngọc Trí', 'LÊ THỊ CẨM THẢO', 'Trần Thị Hồng Hạnh', 'Đoàn Tuấn Nghĩa', 'Đinh Hà', 'Hà Huy Dũng', 'Phan Thế Anh', 'Hiếu Huỳnh',
                'Thanh', 'Trang Quỳnh', 'Hảo Anh', 'Thanh Bùi', 'Nguyễn Văn Trung', 'Trần Tấn Sang', 'Lê Thị Thảo Anh', 'Nguyễn Thị Huệ', 'PHẠM THỊ KIM HIẾU', 'TRẦN THỊ NGUYỆT QUẾ', 'Nhật  Vy', 'Huỳnh Trọng Nghĩa', 'Cao Văn Đạt', 'Phạm Thị  Kim Hiếu', 'Huy Nguyễn', 'Bon  Bon', 'Đinh Huỳnh Phong', 'Phạm Trung Hội', 'Nguyễn Minh Thái', 'Trần Thị Bích Sen', 'Ngô Thủy Phương Tâm', 'Hoàng sơn', 'Ngô Thành', 'Trọng Nghĩa', 'Lê Đức Thương', 'Nguyễn Thị  Thạch Anh', 'Lê Kim Hảo', 'Phạm Văn Gôm', 'Trần Thanh Thiên', 'Mạnh Hiệp', 'Phan Hồng Lệ Duyên',
                'Phí Mạnh  Hiệp', 'Lưu Văn Mạnh', 'Lộc Thọ Phúc', 'JB. Kỳ Nam', 'Trần Hữu Đạt', 'Trần Vân', 'trần đạt', 'Lê Mến', 'Nguyễn Văn Sang', 'Hoài  Nam', 'Mai Trị Phương', 'Nguyễn Phát', 'Kim Quyên', 'Nguyễn Mỹ Hoàng Hà',
                'Nguyễn Quốc Cường', 'Tran Huy', 'Phùng Ngân', 'Trần Hải Bằng', 'Lâm Thanh Hải', 'Nguyễn Dương', 'Nguyễn Tuấn  An', 'Long  Mỹ', 'Kiều  Duyên', 'Thùy Dương', 'Thu Diễm', 'Đoan Trinh', 'Đoan Trinh', 'Lê Thành Đạt', 'Tấn  Phúc', 'Trần Lê Minh Uyên', 'Phạm Trâm', 'Diệp Huyền', 'Lê Toàn', 'Nguyễn Hữu Trọng',
                'Nguyễn Kha', 'Phạm Vương', 'Đặng Thị Thúy', 'Đỗ Thị Hương', 'Đinh Thị Hải Anh', 'Huy Hoàng', 'Phùng Yến Nhi', 'Lê Hoàng Khánh Duy', 'Bùi Thiên Thanh Trúc', 'Trần Phước Hưng', 'Nguyễn Trung Hiếu', 'Lê Bích Ngọc', 'Nguyễn Thị Kim  Tuyến', 'Nguyễn Tâm', 'Nguyễn Thị Ngọc Thuyên', 'Trần Thị Phương Dung', 'Dương Thị Vân', 'Nguyễn Trung Hiếu', 'Đặng Lê  Nguyên', 'Nguyễn Thị Ngọc  Phương', 'Lê Nguyễn Minh Khang', 'Nguyễn Huỳnh Mỹ Diễm', 'Nguyễn Hoàng Phúc', 'Nguyễn Thị Diệu Linh', 'Võ Huỳnh Lanh', 'Nguyễn Mậu Bửu Duy', 'Nguyễn Vũ Khoa Nguyên', 'Nguyễn Thị Trúc Mai', 'Đào Ngọc Phú', 'Nguyễn Hoàng Uyên  Giao', 'Nguyễn Thanh Bình', 'Lê Thị Minh  Phượng', 'Trần Thị Tâm', 'Hồ Hạnh Tiên', 'Nguyễn Thị Mai', 'Nguyễn Thị Dung', 'Thái Hữu Hậu', 'Nguyễn Thị Châu  Tiên', 'Lê Quốc Huy', 'Nguyễn Ngọc Băng Tâm', 'Nguyễn Đức Thuận', 'Mai Tấn Đạt', 'Nguyễn Thị Thanh Mai', 'Võ Thị Thanh Thảo', 'Đặng Hòa Khánh  Yên', 'Nguyễn Tuấn Giang', 'Lê Công Hoàng Huy', 'Trần Minh Trí', 'Trần Đắc Tài', 'Nguyễn Thị Kim  Nhi', 'Đặng Thị Tú Trinh', 'Nguyên Nguyễn', 'Lê Công Thái Sơn', 'Võ Đình Phước', 'Nguyễn Thị Duy  Linh', 'Võ Trần Ngọc Như', 'Đàm Thị  Hoa', 'Lê Thị Mỹ  Liền', 'Nguyễn Nhật Quang', 'Hồ Thảo  Trinh', 'Đặng Hữu Mạnh', 'Phan Nguyễn Phương Linh', 'Lê Thị  Liểu', 'Phạm Thị Ngọc Huyền', 'Nguyễn Thị Trang Anh', 'Trần Hoàng Anh Thư', 'Đào Thị  Dung', 'Lê Công  Hậu', 'Trương Thị Phượng Hằng', 'Huỳnh Thị Yến Oanh', 'Dương Kiều Huyền  Trân', 'Châu Huỳnh Ngọc  Trâm', 'Nguyễn Thị Vân Anh', 'Nguyễn Thanh', 'Lăng Tiến  Tấn', 'Trần Văn  Trí', 'Trần Thị Mỹ Hạnh', 'Phạm Thị Lanh', 'Võ Thị Thọ', 'Lê Tấn  Cường', 'Nguyễn Thị Mỹ  Lệ', 'Trần Thị Ngọc Trâm', 'Nguyễn Thị Hồng  Quyên', 'Lê Trần Thu  Thảo', 'Nguyễn Thị Tuyết Nhung', 'Phạm Nguyễn Đức  Toàn', 'Nguyễn Văn Tiến', 'Thân Thị Thúy  Liễu', 'Nguyễn Hoàng Thông', 'Đinh Diệu Linh Anh', 'NGUYỄN NGỌC ÁI  VY', 'DƯƠNG VŨ THÙY  TRANG', ' Nguyễn Huỳnh  Như', 'Nguyễn Thị Ánh Nguyệt', 'Phan Thanh Hòa', 'Lương Thị Thuý Ngân',
                ' Trương Thị Mỹ Tiên', 'Phan Thị Ánh Nguyệt', 'Phạm Hồng Thuận', 'Huỳnh Thị Diễm Linh', 'Võ Thành Hưng', 'Ngô Quang Phong Hào', 'Đặng Thị Thanh Hà', 'Nguyễn Quang Hưng', 'Huyền Trân', 'Đỗ Thị Thu  Hằng', 'Hoàng Thị Anh Tú', 'Nguyễn Thanh Triều',
                'Phạm Thanh Điền', 'Lê Thanh Hùng', 'Phan Tiến Đạt', 'Nguyễn Hồng  Nhung', 'Phan Thị Hồng Thảo', 'Nguyễn Thị Khuyên', 'Nguyễn Thị Ngọc Hiếu', 'Nguyễn Ngọc Thanh Vân', 'Nguyễn Lê Quốc Sỹ', 'Cao Thị Thanh Hiền', 'Trần Viết Đức', 'Phạm Anh Dũng', 'Trần Thị Thu Thảo', 'Nguyễn Thị Bích Trâm', 'Phạm Anh Khôi', 'Nguyễn Thị Bích Trang', 'Nguyễn Hoàng John',
                'Nguyễn Đức Trung', 'Nguyễn Thị Thi Hương', 'Ngô Tuấn  Khanh', 'Nguyễn Thị Nhật Linh', 'Trần Thị Cẩm Tiên', 'Trần Ngọc Bảo', 'Nguyễn Thị Mộng Trầm', 'Nguyễn Hoàn Nhân', 'Lê Sỹ Anh', 'Trần Như Quỳnh', 'Lê Xuân Dũng', 'Lê Quang  Dũng', 'Trần Thị Thu  Huyền', ' Diệp Thái  Thịnh', 'Đào Nguyễn Bích Vân', 'Nguyễn Anh Khương', ' Đỗ Thị  Huệ', 'Chu Thị Hạnh Thi', 'Lê Ngọc Hoàng Yến', 'Hà Huy Nam', 'Mi Na', 'Trần Thị Diệu', 'Đào Phương Anh', 'Trần Hữu Dũng', 'Nguyễn Thị Trang', 'Trịnh Thị Ánh', 'Nguyễn Nhật Hiền', 'Trần Phương Linh',
                'Nguyễn Lê Hùng Anh', 'Dương Nhựt Long', 'Nguyễn Tiến Đạt', 'Nguyễn Văn Hiển', 'Nguyễn Thị Nga', 'Lê Minh Trúc', 'Hoàng Ngọc Tai', 'Tấn Phát', 'Phạm Nguyễn Phi Hồng Yến', 'Đỗ Đức Nghiệp', 'Phan Thị Thanh Tâm', 'Nguyễn Việt Vĩ Tú', 'Ngô Quốc Cường', 'Nguyễn Minh Trí', 'Lê Thị Như Hảo', 'Trần Ngọc Minh', 'Phùng Bảo Ngọc', 'Ngô Văn Sang', 'Trần Thanh Ba', 'Đào Thị Thanh Thảo', 'Đinh Thị Diệu Hiền', 'Nguyễn Ngọc Hạnh Tiên', 'Nguyễn Thành Đạt', 'Trần Thanh Ba', 'Trần Việt Bảo Vương', 'Nguyễn Đức Khải', 'Nguyễn Hoàng Hiếu', 'Trần Xuân Hóa',
                'Nguyễn Minh Hiếu', 'Nguyễn Thị Thương', 'Đỗ Hoàng Nam', 'Trần Hoàng Dung', 'Nguyễn Hoàng Nam', 'Nguyễn Ái Mi', 'Bùi Đức Trung', 'Nguyễn Phương Quỳnh Trang', 'Cao Phạm Phương Thảo', 'Phùng Thị Kim Tuyến', 'Danh Thạch Thảo', 'Lê Thị Ngọc Giang', 'Văn Thị Mỹ Linh', 'Trần Thị Ngọc Loan', 'Hồ Thu Thủy', 'Phạm Tuấn Tài', 'Lò Nhật Thảo Nguyên', 'Ngô Tuấn Anh', 'Huỳnh Lâm Uyên Chi', 'Lê Nguyễn Như Ngân', 'Võ Văn Thạnh', 'Lê Duy Bảo', 'Đỗ Thành Nho', 'Lê Thị Kim Ngân', 'Nguyễn Hoàng Tố My', 'Lê Nguyễn Mai Anh', 'Nguyễn Thị Tuyết Trang', 'Ngô Anh Tuấn', 'Nguyễn Văn Cảnh', 'Nguyễn Duy Luân', 'Trần Quốc Cơ', 'Phạm Hoài Ny', 'Nguyễn Thị Bích Mai', 'Phạm Thị Thanh Trang', 'Nguyễn Như Viết Phương', 'Nguyễn Trương Trung Tín', 'Trần Thị Kim Qúi', 'Minh Lâm', 'Nguyễn Đức Vang', 'Thạch Quốc Lâm', 'Bạch Vũ Quang', 'Bùi Thị Xuân Quỳnh', 'Võ Chí Nhân', 'Cao Thị Thanh Hiền', 'Võ Trung Đức', 'Võ Thị Quỳnh Châu', 'Nguyễn Thị Hồng Huế',
                'Đỗ Thị Tuyết Nhi', 'Trần Thị Bích Trâm', 'Nguyễn Thị Hoa Hạ', 'Cao Minh Tấn', 'Châu Thị Hường', 'Nguyễn Phương Yến Linh', 'Nguyễn Thùy Trang', 'Trương Thị Thùy Tuyên', 'Trần Thị Kim Trúc', 'Phùng Đình Thạnh', 'Nguyễn Trần Tưởng Huy', 'Đỗ Trọng Bằng', 'Nguyễn Văn Tâm', 'Đỗ Duy Hùng', 'Hoàng Nhật Nam', 'Phạm Ngọc Vinh', 'Chau Kim Đa Vy', 'Trương Thị Yến', 'Lê Quốc Bảo', 'Trần Lê Quỳnh Như', 'Trần Thị Minh Hằng', 'Giang Thị Linh Nhi', 'Nguyễn Thị Ngọc Dung', 'Phan Quỳnh Mai', 'Lê Khải Huyền', 'Lâm Nguyễn Nhật Hoàng', 'Cao Văn Nghĩa', 'Ngô Thị Mỹ Giang', 'Ngô Thị Ngọc Thúy', 'Trần Thị Hà Vy', 'Nguyễn Ái Như', 'Lê Thu Hiền', 'Nguyễn Đình Duy', 'Đỗ Duy Hùng', 'Nguyễn Thanh Thiên Phước', 'Lê Anh Quý', 'Võ Thị Thanh Tươi', 'Vũ Hùng', 'Trương Quốc An', 'Lê Thị Thu Huyền', 'Huỳnh Thị Kim Hiếu', 'Huỳnh Thị Thanh Tĩnh', 'Phạm Đức Hiếu', 'Nguyễn Thị Nhung', 'Nguyễn Khắc Tuấn Dũng', 'Trần Hoàng Vũ Khang', 'Huỳnh Thị Ngọc Hà', 'Trần Thị Thanh Tâm', 'Phùng Chí Tính', 'Nguyễn Nữ Chi Mai',
                'Nguyễn Thị Phương', 'Bùi Thị Chi', 'Hoàng Thị Diệu Nghĩa', 'Võ Thị Hồng Điệp', 'Thổ Thị Bé Chiều', 'Nguyễn Thị Ngọc Bích', 'Bùi Mạnh Chung', 'Lê Chí Tân', 'Thái Dương Hoài Thương', 'Nguyễn Văn Thường', 'Nguyễn Thành Nam', 'Nguyễn Thị Minh Tâm', 'Nguyễn Nhật Ngân', 'Hồ Thị Anh Thư', 'Bùi Thị Quỳnh Như', 'Lý Kim Thanh', 'Trần Thị Hồng Thảo', 'Phan Thị Mỹ An', 'Mang Ngọc Tuyền', 'Từ Tiểu My', 'Trần Tăng Khải Hoài', 'Phạm Thị Nga', 'Huỳnh Ngọc Anh', 'Nguyễn Hữu Thắng', 'Đỗ Thiên Hương', 'Nguyễn Thị Thu', 'Phan Trần Hải Đăng', 'Nguyễn Thanh Thảo', 'Nguyễn Thị Thu Phương', 'NGUYỄN QUỐC MINH TRUNG', 'Phạm Nguyễn Mỹ Hân',
            ];

            $customers = [];

            $districts = [];

            $districtsTemp = Skilldo\Location::districts();

            foreach ($districtsTemp as $districtList) {
                foreach ($districtList->districts as $item) {
                    $districts[] = $item->fullname;
                }
            }

            for($i = 0; $i <= 20; $i++) {
                $customers[] = [
                    'name'      => Arr::random($fullName),
                    'address'   => Arr::random($districts),
                    'content'   => 'đã mua sản phẩm'
                ];
            }

            response()->success(trans('ajax.load.success'), $customers);
        }

        response()->error(trans('ajax.load.error'));
    }
    #[NoReturn]
    static function productSearch(Request $request, $model): bool
    {
        if($request->isMethod('post')) {

            $keyword    = trim((string)$request->input('keyword'));

            $categoryId = (int)trim((string)$request->input('categoryId'));

            $args = Qr::set('trash', 0)->where('public', 1)->select('id', 'title', 'image')->orderBy('created');

            if(!empty($keyword)) {
                $args->where('title', 'like', '%'.$keyword.'%');
            }

            if(!empty($categoryId)) {
                $args->whereByCategory($categoryId);
            }

            $products = Product::gets($args);

            $result = '';

            foreach ($products as $product) {
                $product->image = Template::imgLink($product->image);
                $result .= Plugin::partial(FAKE_NOTIFICATION_NAME, 'admin/product-item', ['item' => $product]);
            }

            $result = base64_encode($result);

            response()->success(trans('ajax.load.success'), $result);
        }

        response()->error(trans('Tìm sản phẩm không thành công'));
    }
    #[NoReturn]
    static function productRandom(Request $request, $model): bool
    {
        if($request->isMethod('post')) {

            $productsId = $request->input('products');

            $args = Qr::set('trash', 0)->where('public', 1)->select('id', 'title', 'image')->limit(20)->orderByRaw('rand()');

            if(have_posts($productsId)) {
                $args->whereNotIn('id', $productsId);
            }

            $products = Product::gets($args);

            response()->success(trans('ajax.load.success'), $products);
        }

        response()->error(trans('ajax.load.error'));
    }
    #[NoReturn]
    static function productLoad(Request $request, $model): bool
    {
        if($request->isMethod('post')) {

            $listId = Fake_Notification::config('dataProducts');

            if(!have_posts($listId)) {
                response()->success(trans('ajax.load.success'), []);
            }

            $args = Qr::set('trash', 0)->where('public', 1)->whereIn('id', $listId)->select('id', 'title', 'image');

            $products = Product::gets($args);

            foreach ($products as $product) {
                $product->image = Template::imgLink($product->image);
            }

            response()->success(trans('ajax.load.success'), $products);
        }

        response()->error(trans('ajax.load.error'));
    }
    #[NoReturn]
    static function save(Request $request, $model): bool
    {
        if($request->isMethod('post')) {

            $config = [];

            $config['show'] = $request->input('show');

            if(empty($config['show'])) $config['show'] = [];

            $config['position'] = $request->input('position');

            $config['key'] = time();

            $customers = $request->input('customer');

            if(!have_posts($customers)) {

                response()->error(trans('Bạn chưa tạo danh sách khách hàng ảo'));
            }

            foreach ($customers as $key => $item) {

                $item['id'] = $key;

                if(empty($item['name'])) {

                    response()->error(trans('Không được để trống giá trị tên khách hàng'));
                }
                $item['name'] = trim(Str::clear($item['name']));

                if(empty($item['address'])) {

                    response()->error(trans('Không được để trống giá trị địa chỉ khách hàng'));
                }
                $item['address'] = trim(Str::clear($item['address']));

                if(empty($item['content'])) {

                    response()->error(trans('Không được để trống giá trị hành động khách hàng'));
                }

                $item['content'] = trim(Str::clear($item['content']));

                $customers[$key] = $item;
            }

            $config['customers'] = $customers;

            $dataType = $request->input('fakeDataType');

            if($dataType == 'handmade') {

                $handmadeItems = $request->input('handmade');

                if(!have_posts($handmadeItems)) {
                    response()->error(trans('Bạn chưa tạo danh sách dữ liệu ảo'));
                }

                foreach ($handmadeItems as $key => $item) {

                    $item['id'] = $key;

                    if(!isset($item['title'])) {
                        response()->error(trans('Không được để trống hình ảnh dữ liệu mẫu'));
                    }
                    $item['title'] = trim(Str::clear($item['title']));

                    if(!isset($item['image'])) {
                        response()->error(trans('Không được để trống hình ảnh dữ liệu mẫu'));
                    }
                    $item['image'] = process_file(Str::clear($item['image']));

                    if(!isset($item['url'])) {
                        response()->error(trans('Không được để trống liên kết dữ liệu mẫu'));
                    }
                    $item['url'] = Str::clear($item['url']);

                    $handmadeItems[$key] = $item;
                }

                $config['dataHandmade'] = $handmadeItems;

                $config['dataProducts'] = [];
            }
            else {

                $products = $request->input('products');

                if(!have_posts($products)) {

                    response()->error(trans('Bạn chưa chọn sản phẩm nào'));
                }

                $config['dataHandmade'] = [];

                $config['dataProducts'] = $products;
            }

            $config['dataType'] = $dataType;

            Option::update('fake_notification_config', $config);

            $result['data']   = [];

            response()->success(trans('ajax.save.success'), $result);
        }

        response()->error(trans('ajax.save.error'));
    }
}

Ajax::admin('FakeNotificationAdminAjax::productSearch');
Ajax::admin('FakeNotificationAdminAjax::productRandom');
Ajax::admin('FakeNotificationAdminAjax::productLoad');
Ajax::admin('FakeNotificationAdminAjax::customerRandom');
Ajax::admin('FakeNotificationAdminAjax::save');

class FakeNotificationAjax {
    #[NoReturn]
    static function load(Request $request, $model): bool
    {
        if($request->isMethod('post')) {

            $notification = Fake_Notification::config();

            $customers = [];
            foreach ($notification['customers'] as $customer) {
                $customers[] = $customer;
            }
            $notification['customers'] = $customers;

            if($notification['dataType'] == 'products') {
                $products = Product::gets(Qr::set()->whereIn('id', $notification['dataProducts'])->select('id', 'title', 'image', 'slug'));
                $notification['dataProducts'] = [];
                foreach ($products as $product) {
                    $notification['dataProducts'][] = [
                        'id' => $product->id,
                        'title' => $product->title,
                        'url' => $product->slug,
                        'image' => Template::imgLink($product->image),
                    ];
                }
            }
            if($notification['dataType'] == 'handmade') {
                $handmadeItems = [];
                foreach ($notification['dataHandmade'] as $handmade) {
                    $handmade['image'] = Template::imgLink($handmade['image']);
                    $handmadeItems[] = $handmade;
                }
                $notification['dataHandmade'] = $handmadeItems;
            }

            response()->success(trans('ajax.load.success'), $notification);
        }

        response()->error(trans('ajax.load.error'));
    }
}

Ajax::client('FakeNotificationAjax::load');