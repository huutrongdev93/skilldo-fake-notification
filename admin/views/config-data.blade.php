<div class="row mb-2">
    <div class="col-md-3">
        <div class="ui-title-bar__group" style="padding-bottom:5px;">
            <h3 class="ui-title-bar__title" style="font-size:20px;">Dữ liệu mẫu</h3>
            <p style="margin-top: 10px; margin-left: 1px; color: #8c8c8c">Quản lý thông tin sản phẩm</p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-content" style="padding:10px;">
	            <p class="heading">Loại dữ liệu mẫu</p>
	            <div class="form-group" style="display: {!! (!$productPlugin) ? 'none' : 'block' !!};">
		            <label class="radio d-block">
			            <input type="radio" name="fakeDataType" value="products" class="js_fakeN_input_type" {{($dataType == 'products' && $productPlugin) ? 'checked' : ''}}> Sản phẩm
		            </label>
		            <label class="radio d-block">
			            <input type="radio" name="fakeDataType" value="handmade" class="js_fakeN_input_type" {{($dataType == 'handmade' || !$productPlugin) ? 'checked' : ''}}> Tự tạo
		            </label>
	            </div>
	            <div class="fakeN_data_box fakeN_data_handmade" id="js_fakeN_handmade_box" data-handmade="{!! htmlentities(json_encode(Fake_Notification::config('dataHandmade'))) !!}" style="display: {{($dataType == 'products' && $productPlugin) ? 'none' : 'block'}};">
		            <div class="d-flex justify-content-between align-items-center mb-1">
			            <p class="heading mb-0">Dữ liệu mẫu được áp dụng</p>
			            <div>
				            <button class="btn btn-blue" type="button" id="js_fakeN_handmade_btn_add">
                                {!! Admin::icon('add') !!} Thêm sản phẩm
				            </button>
			            </div>
		            </div>
		            <div class="fakeN_handmade_table">
			            <table class="display table table-striped media-table ">
				            <thead>
					            <tr>
						            <th class="manage-column">Hình</th>
						            <th class="manage-column">Tiêu Đề</th>
						            <th class="manage-column">Liên kết</th>
						            <th class="manage-column">Hành động</th>
					            </tr>
				            </thead>
				            <tbody id="js_fakeN_handmade_result"></tbody>
			            </table>
		            </div>
	            </div>
	            <div class="fakeN_data_box fakeN_data_products" style="display: {!! ($dataType == 'handmade' || !$productPlugin) ? 'none' : 'block' !!};">
		            <div class="d-flex justify-content-between align-items-center mb-1">
			            <p class="heading mb-0">Sản phẩm được áp dụng</p>
			            <div>
				            <button class="btn btn-blue btn-blue-bg" type="button" id="js_fakeN_products_btn_random">
                                {!! Admin::icon('add') !!} Thêm 20 sản phẩm ngẫu nhiên
				            </button>
				            <button class="btn btn-blue" type="button" id="js_fakeN_products_btn_add">
                                {!! Admin::icon('add') !!} Thêm sản phẩm
				            </button>
			            </div>
		            </div>
		            <div class="fakeN_products_table">
			            <table class="display table table-striped media-table ">
				            <thead>
				            <tr>
					            <th class="manage-column">Hình</th>
					            <th class="manage-column">Tiêu Đề</th>
					            <th class="manage-column">Hành động</th>
				            </tr>
				            </thead>
				            <tbody id="js_fakeN_products_result"></tbody>
			            </table>
		            </div>
	            </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .heading {
        font-size: 15px;
        font-weight: bold;
    }
</style>

<div class="modal fade fakeN_products_modal" id="js_fakeN_products_modal" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5">Chọn Sản Phẩm</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="js_fakeN_products_search">
					<div class="fakeN_products_search_form">
						<div class="column">
							<select name="searchCategory" class="form-control">
                                @foreach ($productsCategories as $categoryKey => $categoryName)
									<option value="{{$categoryKey}}">{{$categoryName}}</option>
								@endforeach
							</select>
						</div>
						<div class="column">
							<input name="searchName" class="form-control" placeholder="Tên sản phẩm"/>
						</div>
						<div class="column">
							<button id="js_fakeN_products_btn_search" class="btn btn-red" type="button"><i class="fa-thin fa-magnifying-glass"></i> Tìm</button>
						</div>
					</div>
					<div class="fakeN_products_search_table">
						<table class="display table table-striped media-table ">
							<thead>
							<tr>
								<th id="cb" class="manage-column column-cb check-column">
									<input type="checkbox" name="select[]" id="select_all" class="icheck">
								</th>
								<th id="image" class="manage-column column-image">Hình</th>
								<th id="title" class="manage-column column-title">Tiêu Đề</th>
							</tr>
							</thead>
							<tbody id="js_fakeN_products_search_result"></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-blue" id="js_fakeN_products_btn_confirm" type="button">Xác nhận</button>
			</div>
		</div>
	</div>
</div>

<script id="fakeN_product_template" type="text/x-custom-template">
	<tr class="js_column js_product_item tr_${id}">
		<td class="image column-image">
			<img src="${image}" loading="lazy">
		</td>
		<td class="title column-title">
	        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="${id}" style="color:#000;">
	            ${title}
	        </span>
		</td>
		<td class="action column-action">
			<button class="btn btn-red js_fakeN_product_btn_delete" data-id="${id}">{!! Admin::icon('delete') !!}</button>
		</td>
	</tr>
</script>
<script id="fakeN_handmade_template" type="text/x-custom-template">
	<tr class="js_column js_fakeN_handmade_item tr_${id}">
		<td class="column">
			<div class="input-group image-group">
				<input type="text" name="handmade[${id}][image]" value="${image}" id="image_${id}" class="form-control" field="handmade[${id}][image]">
				<span class="input-group-addon input-file-addon iframe-btn" data-fancybox data-type="iframe" data-src="{!! Url::fileManager('type=1&field_id=image_${id}&callback=FakeNFileManagerCallback') !!}" data-id="image_${id}">
					<i class="fal fa-image"></i> Chọn Ảnh
				</span>
			</div>
		</td>
		<td class="column">
			<input name="handmade[${id}][title]" value="${title}" class="form-control" />
		</td>
		<td class="column">
			<input name="handmade[${id}][url]" value="${url}" class="form-control" />
		</td>
		<td class="action column">
			<button class="btn btn-red js_fakeN_handmade_btn_delete" data-id="${id}">{!! Admin::icon('delete') !!}</button>
		</td>
	</tr>
</script>

<script>
	function FakeNFileManagerCallback(fieldId) {
		const input = $('#' + fieldId)
		FormHelper.mediaReview(input);
		input.trigger('change');
	}
</script>