<div id="jsNotificationKey" data-key="{!! $config['key'] !!}"></div>
<div class="sale-popup-box {{$config['position']}}" id="jsNotificationSale">
    <div class="sale-popup d-flex">
        <div class="sale-popup-thumb">
            <a href="" class="sale-popup-url js_data_url">
                <img src="" alt="sales popup" class="sale-popup-image js_data_img">
            </a>
        </div>
        <div class="sale-popup-info">
            <p style="margin-bottom: 0;">
                <span class="sale-popup-name js_customer_name"></span>
                <span class="sale-popup-address js_customer_address"></span>
            </p>
            <p style="margin: 5px 0;">
                <a href="" class="sale-popup-product-url js_data_url">
                    <span class="sale-popup-content js_customer_content"></span>
                    <span class="sale-popup-title js_data_title"></span>
                </a>
            </p>
            <p class="sale-popup-info-footer" style="margin-bottom: 0;">
                <span class="sale-popup-time js_last_time"></span>
            </p>
        </div>
    </div>
</div>
<script>
	$(function () {
		class FakeNotification {

			constructor() {

				this.key = $('#jsNotificationKey').data('key');

				this.popupDiv = $('#jsNotificationSale');

				this.lastTime = [
					'3 phút', '10 phút', '25 phút', '30 phút', '40 phút', '1 giờ', '2 giờ', '3 giờ', '4 giờ', '5 giờ', '6 giờ', '7 giờ', '8 giờ', '9 giờ', '10 giờ'
				]

				this.notification = JSON.parse(localStorage.getItem('_fakeNotificationData'));

				if (this.notification == undefined || this.notification.key != this.key) {
					this.loadNotification()
				}
				else {
					this.loopNotification();
				}
			}

			loadNotification() {
				let self = this;
				let data = {
					action: 'FakeNotificationAjax::load'
				}
				request.post(ajax, data).then(function (response) {
					if (response.status === 'success') {
						self.notification = response.data;
						localStorage.setItem('_fakeNotificationData', JSON.stringify(response.data));
						self.loopNotification()
					}
				});
			}

			loopNotification() {
				let self = this;

				if(this.notification.customers.length == 0) {
					return false;
				}
				if(this.notification.dataType == 'products' && this.notification.dataProducts.length == 0) {
					return false;
				}
				if(this.notification.dataType == 'handmade' && this.notification.dataHandmade.length == 0) {
					return false;
				}

				function addClass() {
					self.randomPopup();
					let timeOut = setTimeout(() => {
						self.popupDiv.removeClass('show');
						clearTimeout(timeOut);
					}, 4000);
				}

				function randomInterval() {
					return Math.random() * 25000 + 5000; // Random số giây từ 5 đến 30
				}

				function repeatAction(timeOutOld = undefined) {
					addClass();
					const interval = randomInterval();
					const timeOut = setTimeout(() => {
						repeatAction(timeOut)
					}, interval);
					if(timeOutOld !== undefined) clearTimeout(timeOutOld);
				}

				const firstInterval = Math.random() * 10000 + 1000; // Random số giây từ 1 đến 10
				const timeOut = setTimeout(() => {
					repeatAction(timeOut)
				}, firstInterval);
			}

			randomPopup() {
				//Random customer
				let lastTime = this.lastTime[Math.floor(Math.random()*this.lastTime.length)] + ' trước';

				let customer = this.notification.customers[Math.floor(Math.random()*this.notification.customers.length)];
				let item     = {};
				if(this.notification.dataType == 'products') {
					item = this.notification.dataProducts[Math.floor(Math.random()*this.notification.dataProducts.length)];
				}
				if(this.notification.dataType == 'handmade') {
					item = this.notification.dataHandmade[Math.floor(Math.random()*this.notification.dataHandmade.length)];
				}

				this.popupDiv.find('.js_data_url').attr('href', item.url);
				this.popupDiv.find('.js_data_img').attr('src', item.image);
				this.popupDiv.find('.js_data_title').html(item.title);

				this.popupDiv.find('.js_customer_name').html(customer.name);
				this.popupDiv.find('.js_customer_address').html('('+customer.address+')');
				this.popupDiv.find('.js_customer_content').html(customer.content);

				this.popupDiv.find('.js_last_time').html(lastTime);

				this.popupDiv.addClass('show');
			}
		}
		new FakeNotification();
	});
</script>
