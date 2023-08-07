function uniqid() {
	const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	const idLength = 10; // Độ dài của ID mong muốn
	let randomId = '';
	for (let i = 0; i < idLength; i++) {
		const randomIndex = Math.floor(Math.random() * characters.length);
		randomId += characters.charAt(randomIndex);
	}
	// Thêm thời gian hiện tại để đảm bảo tính duy nhất
	const timestamp = new Date().getTime();
	randomId += timestamp.toString();

	return randomId;
}
class FakeNotificationHandle {
	constructor() {

		this.customerList = {
			customers : [],
			get(id) {
				let objIndex = this.customers.findIndex((item => item.id == id));
				if(objIndex == -1) return null;
				return this.customers[objIndex]
			},
			add(customer) {
				let objIndex = this.customers.findIndex((item => item.id == customer.id));
				if(objIndex == -1) {
					this.customers.unshift(customer);
				}
				return this.customers;
			},
			update(customer) {
				let objIndex = this.customers.findIndex((item => item.id == customer.id));
				this.customers[objIndex] = {...this.customers[objIndex], ...customer};
				return this.customers;
			},
			delete(id) {
				this.customers = this.customers.filter(function(item) {
					return item.id != id
				})
			},
		};

		this.customerTable = $('#js_fakeN_customer_list');

		this.modalProducHandle = new bootstrap.Modal('#js_fakeN_products_modal')

		this.modalProduct = $('#js_fakeN_products_modal')

		this.type = $('.js_fakeN_input_type:checked').val();

		this.productTable = $('#js_fakeN_products_result');

		this.productList = {
			products : [],
			add(product) {
				let objIndex = this.products.findIndex((item => item.id == product.id));
				if(objIndex == -1) {
					this.products.unshift(product);
				}
				return this.products;
			},
			update(product) {
				let objIndex = this.products.findIndex((item => item.id == product.id));
				this.products[objIndex] = {...this.products[objIndex], ...product};
				return this.products;
			},
			delete(productId) {
				productId = productId*1
				this.products = this.products.filter(function(item) {
					return item.id !== productId
				})
			},
		};

		this.handmadeList = {
			items : [],
			get(id) {
				let objIndex = this.items.findIndex((item => item.id == id));
				if(objIndex == -1) return null;
				return this.items[objIndex]
			},
			add(obj) {
				let objIndex = this.items.findIndex((item => item.id == obj.id));
				if(objIndex == -1) {
					this.items.unshift(obj);
				}
				return this.items;
			},
			update(obj) {
				let objIndex = this.items.findIndex((item => item.id == obj.id));
				this.items[objIndex] = {...this.items[objIndex], ...obj};
				return this.items;
			},
			delete(id) {
				this.items = this.items.filter(function(item) {
					return item.id != id
				})
			},
		};

		this.handmadeTable = $('#js_fakeN_handmade_result');

		$('button[form="system_form"]').attr('id', 'js_fakeN_save').removeAttr('form');

		this.loadData()
	}
	loadData() {
		let self = this;

		let customers = $('#js_fakeN_customer_box').data('customer');

		for (const [key, item] of Object.entries(customers)) {
			let customer = {
				id: item.id,
				name: item.name,
				address: item.address,
				content: item.content
			};
			self.customerList.add(customer);
		}

		this.renderCustomer();

		if(this.type == 'products') {
			this.loadProducts();
		}

		if(this.type == 'handmade') {
			let handmadeItems = $('#js_fakeN_handmade_box').data('handmade');
			for (const [key, item] of Object.entries(handmadeItems)) {
				let handmade = {
					id: item.id,
					title: item.title,
					image: item.image,
					url: item.url,
				};
				self.handmadeList.add(handmade);
			}
			this.renderHandmade();
		}
	}
	clickRandomCustomer(element) {

		let self = this;

		let data = {
			action : 'FakeNotificationAdminAjax::customerRandom',
		}

		$.post(ajax, data, function() {}, 'json').done(function(response) {
			if( response.status === 'success') {
				for (const [key, item] of Object.entries(response.customers)) {
					item.id = uniqid();
					self.customerList.add(item);
				}
				self.renderCustomer();
			}
			else {
				show_message(response.message, response.status);
			}
		});

	}
	clickAddCustomer(element) {
		let item= {id: uniqid(), name: '', address: '', content: 'đã mua sản phẩm'};
		this.customerList.add(item);
		this.renderCustomer();
		return false;
	}
	uploadCustomer(element) {

		let self = this;

		let data = $(':input', this.customerTable).serializeJSON();

		for (const [id, item] of Object.entries(data.customer)) {
			let itemOld = self.customerList.get(id);
			if(itemOld !== null) {
				itemOld.name = item.name;
				itemOld.address = item.address;
				itemOld.content = item.content;
				self.customerList.update(itemOld);
			}
		}

		return false;
	}
	deleteCustomer(element) {

		let id = element.attr('data-id');

		this.customerList.delete(id);

		element.closest('.js_fakeN_customer_item').remove();

		return false;
	}
	renderCustomer(element) {

		let self = this;

		this.customerTable.html('');

		for (const [key, items_tmp] of Object.entries(this.customerList.customers)) {
			let items = [items_tmp];
			self.customerTable.append(items.map(function(item) {
				return $('#fake_customer_template').html().split(/\$\{(.+?)\}/g).map(render(item)).join('');
			}));
		}

		return false;
	}
	changeFakeType(element) {
		let fakeDataTypeNew = $('input[name="fakeDataType"]:checked').val();
		if(fakeDataTypeNew == 'handmade') {
			$('.fakeN_data_box').hide();
			$('.fakeN_data_handmade').show();
		}
		if(fakeDataTypeNew == 'products') {
			$('.fakeN_data_box').hide();
			$('.fakeN_data_products').show();
		}
		this.type = fakeDataTypeNew;
	}
	clickOpenModalSearch(element) {
		this.modalProducHandle.show();
		return false;
	}
	loadProducts(element) {
		let data = {
			'action' : 'FakeNotificationAdminAjax::productLoad',
		}
		let self = this;
		$.post(ajax, data, function (data) { }, 'json').done(function (response) {
			if (response.status === 'error') show_message(response.message, response.status);
			if (response.status === 'success') {
				self.productList.products = response.products;
				self.productRender();
			}
		});
	}
	productSearch(element) {

		let data = {
			action      : 'FakeNotificationAdminAjax::productSearch',
			categoryId  : $('select[name="searchCategory"]').val(),
			keyword     : $('input[name="searchName"]').val(),
		}

		$.post(ajax, data, function() {}, 'json').done(function( response ) {
			show_message(response.message, response.status);
			if( response.status === 'success') {

				let listProduct = decodeURIComponent(atob(response.data).split('').map(function (c) {
					return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
				}).join(''));

				$('#js_fakeN_products_search_result').html(listProduct).promise().done(function () {
					formBuilderReset();
				});
			}
		});

	}
	productRandom(element) {

		let self = this;

		let data = {
			action : 'FakeNotificationAdminAjax::productRandom',
		}

		data.products = [];

		for (const [key, item] of Object.entries(this.productList.products)) {
			data.products.unshift(item.id)
		}

		$.post(ajax, data, function() {}, 'json').done(function(response) {
			if( response.status === 'success') {
				for (const [key, item] of Object.entries(response.products)) {
					self.productList.add(item);
				}
				self.productRender();
			}
			else {
				show_message(response.message, response.status);
			}
		});

	}
	productAdd(element) {

		let self = this;

		this.modalProduct.find('.select:checked').each(function () {
			let product = JSON.parse($(this).closest('.js_product_item').attr('data-item'));
			self.productList.add(product);
		});

		this.productRender();

		this.modalProducHandle.hide();

		return false;
	}
	productRender(element) {

		let self = this;

		this.productTable.html('');

		for (const [key, items_tmp] of Object.entries(this.productList.products)) {
			let items = [items_tmp];
			self.productTable.append(items.map(function(item) {
				return $('#fakeN_product_template').html().split(/\$\{(.+?)\}/g).map(render(item)).join('');
			}));
		}

		return false;
	}
	productDelete(element) {

		let id = element.attr('data-id');

		this.productList.delete(id);

		element.closest('tr').remove();

		return false;
	}
	clickAddHandmade(element) {
		let item= {id: uniqid(), name: '', image: '', url: ''};
		this.handmadeList.add(item);
		this.renderHandmade();
		return false;
	}
	deleteHandmade(element) {

		let id = element.attr('data-id');

		this.handmadeList.delete(id);

		element.closest('.js_fakeN_handmade_item').remove();

		return false;
	}
	renderHandmade(element) {

		let self = this;

		this.handmadeTable.html('');

		for (const [key, items_tmp] of Object.entries(this.handmadeList.items)) {
			let items = [items_tmp];
			self.handmadeTable.append(items.map(function(item) {
				return $('#fakeN_handmade_template').html().split(/\$\{(.+?)\}/g).map(render(item)).join('');
			}));
		}

		return false;
	}
	uploadHandmade(element) {

		let self = this;

		let data = $(':input', this.handmadeTable).serializeJSON();

		for (const [id, item] of Object.entries(data.handmade)) {
			let itemOld = self.handmadeList.get(id);
			if(itemOld !== null) {
				itemOld.title = item.title;
				itemOld.image = item.image;
				itemOld.url = item.url;
				self.handmadeList.update(itemOld);
			}
		}

		return false;
	}
	save(element) {

		$('.loading').show();

		let data = $('#system_form').serializeJSON();

		data.action   =  'FakeNotificationAdminAjax::save';

		data.products = [];

		for (const [key, item] of Object.entries(this.productList.products)) {
			data.products.unshift(item.id)
		}

		$.post(ajax, data, function() {}, 'json').done(function(response) {
			$('.loading').hide();
			show_message(response.message, response.status);
		});

		return false;
	}
}

