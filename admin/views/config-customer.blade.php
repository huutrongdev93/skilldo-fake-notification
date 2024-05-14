<div class="row mb-2" id="js_fakeN_customer_box" data-customer="{!! htmlentities(json_encode(Fake_Notification::config('customers'))) !!}">
    <div class="col-md-3">
        <div class="ui-title-bar__group" style="padding-bottom:5px;">
            <h3 class="ui-title-bar__title" style="font-size:20px;">Dữ liệu khách hàng ảo</h3>
            <p style="margin-top: 10px; margin-left: 1px; color: #8c8c8c">Quản lý thông tin khách hàng ảo</p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-content" style="padding:10px;">
	            <div class="d-flex justify-content-between align-items-center mb-1">
		            <p class="heading mb-0">Dữ liệu khách hàng ảo</p>
		            <div>
			            <button class="btn btn-blue btn-blue-bg" type="button" id="js_fakeN_customer_btn_random">
                            {!! Admin::icon('add') !!} Thêm 20 khách hàng ngẫu nhiên
			            </button>
			            <button type="button" class="btn btn-blue" id="js_fakeN_customer_btn_add"><i class="fad fa-plus-circle"></i> Thêm khách hàng ảo</button>
		            </div>
	            </div>
                <div class="fakeN_customer_table">
                    <div class="table-header clearfix">
                        <div class="column">Tên khách hàng </div>
                        <div class="column">Địa chỉ</div>
                        <div class="column">Nội dung</div>
                        <div class="colum-remove">Remove</div>
                    </div>
                    <ul class="table-list ui-sortable" id="js_fakeN_customer_list"></ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script id="fake_customer_template" type="text/x-custom-template">
    <li data-id="${id}" class="js_fakeN_customer_item clearfix">
        <div class="column">
            <input name="customer[${id}][name]" type="text" class="form-control" value="${name}" placeholder="Vd: Anh Nguyễn Văn A">
        </div>
        <div class="column">
            <input name="customer[${id}][address]" type="text" class="form-control" value="${address}" placeholder="Vd: Bình Thạnh">
        </div>
        <div class="column">
            <input name="customer[${id}][content]" type="text" class="form-control" value="${content}" placeholder="Vd: đã mua sản phẩm">
        </div>
        <div class="colum-remove">
            <button type="button" class="btn btn-red js_fakeN_customer_btn_delete" data-id="${id}">{!! Admin::icon('delete') !!}</button>
        </div>
    </li>
</script>