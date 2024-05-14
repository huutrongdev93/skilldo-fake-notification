{!!
	Plugin::partial(FAKE_NOTIFICATION_NAME, 'admin/views/config-customer');
!!}
{!!
	Plugin::partial(FAKE_NOTIFICATION_NAME, 'admin/views/config-data', [
		'productsCategories'    => $productsCategories,
		'dataType'              => $dataType,
		'productPlugin'         => $productPlugin
	]);
!!}
<script>
    $(function () {
        const fakeNotification = new FakeNotificationHandle();
        $(document)
            .on('click', '#js_fakeN_customer_btn_add', function() {fakeNotification.clickAddCustomer($(this))})
            .on('change', '#js_fakeN_customer_list input', function() {fakeNotification.uploadCustomer($(this))})
            .on('click', '.js_fakeN_customer_btn_delete', function() {fakeNotification.deleteCustomer($(this))})
            .on('click', '#js_fakeN_customer_btn_random', function() {fakeNotification.clickRandomCustomer($(this))})
            .on('click', '#js_fakeN_handmade_btn_add', function() {fakeNotification.clickAddHandmade($(this))})
            .on('change', '#js_fakeN_handmade_result input', function() {fakeNotification.uploadHandmade($(this))})
            .on('click', '.js_fakeN_handmade_btn_delete', function() {fakeNotification.deleteHandmade($(this))})
            .on('change', '.js_fakeN_input_type', function() {fakeNotification.changeFakeType($(this))})
            .on('click', '#js_fakeN_products_btn_add', function() {fakeNotification.clickOpenModalSearch($(this))})
            .on('click', '#js_fakeN_products_btn_search', function() {fakeNotification.productSearch($(this))})
            .on('click', '#js_fakeN_products_btn_confirm', function() {fakeNotification.productAdd($(this))})
            .on('click', '#js_fakeN_products_btn_random', function() {fakeNotification.productRandom($(this))})
            .on('click', '.js_fakeN_product_btn_delete', function() {fakeNotification.productDelete($(this))})
            .on('click', '#js_fakeN_save', function() { return fakeNotification.save($(this))})
    })
</script>
