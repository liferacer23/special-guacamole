const Helpers = {

	/**
	 * Validator.
	 */
	Validator: {
		isEmpty: (value) => {
			return value === '' || value === 'undefined' || value === null;
		},

		isNumeric: (num) => {
			return !isNaN(num);
		},
	},

	/**
	 * Window event.
	 */
	Event: {
		trigger: function(el, type) {
			if ('createEvent' in document) {
				// modern browsers, IE9+
				var e = document.createEvent('HTMLEvents');
				e.initEvent(type, false, true);
				el.dispatchEvent(e);
			} else {
				// IE 8
				var e = document.createEventObject();
				e.eventType = type;
				el.fireEvent('on'+e.eventType, e);
			}
		}
	},

	/**
	 * Notice.
	 */
	Notice: {
		open: function(args) {
			if (!'message' in args || Helpers.Validator.isEmpty(args.message)) {
				// Message must be set and mustn't be empty.
				return;
			}

			let icon_class = '';

			switch (args.type) {
				case 'success':
					icon_class = 'check-tick';
					break;

				case 'error':
				case 'warning':
					icon_class = 'warning-alert';
					break;

				case 'info':
				default:
					icon_class = 'info';
					break;
			}

			const options = {
				icon: icon_class,
				type: args.type
			};

			if (args.dismissible) {
				options.dismiss = {show: true};
			}

			if (args.autoclose) {
				options.autoclose = {timeout: args.autoclose};
			} else {
				options.autoclose = {show: false};
			}

			const $suiHeader    = document.querySelector('.sui-header');
			const noticeId     = 'snapshot-notice-' + Math.random().toString(36).substr(2,9);
			let $noticesWrapper = document.querySelector('.sui-floating-notices');
			let $notice         = document.createElement('div');

			if (!$noticesWrapper) {
				$noticesWrapper = document.createElement('div');
				$noticesWrapper.setAttribute('class', 'sui-floating-notices');
			}
			$suiHeader.insertBefore($noticesWrapper, $suiHeader.childNodes[0]);

			$notice.setAttribute('id', noticeId);
			$notice.setAttribute('role', 'alert');
			$notice.setAttribute('aria-live', 'assertive');
			$notice.setAttribute('class', 'sui-notice');

			$noticesWrapper.appendChild($notice);

			const noticeContent = `<p>${args.message}</p>`;
			window.SUI.openNotice(noticeId, noticeContent, options);
		},

		close: function(id = null) {
			if (null !== id) {
				window.SUI.closeNotice(noticeId);
			} else {
				window.SUI.closeNotice();
			}
		},

		/**
		 * Hide all the notices.
		 *
		 * @param {HTMLElement} el Selector.
		 */
		hideAll: function(el) {
			const notices = el.querySelectorAll('.sui-notice');

			if (notices) {
				notices.forEach((notice, i) => {
					if ('block' === notice.style.display) {
						notice.style.display = 'none';
					}
				})
			}
		},
	},

	/**
	 *
	 * @param {*} data
	 * @returns
	 */
	buildUrl: function(data) {
		let str = '';

		for (let [name, value] of data) {
			let prep = '&';
			if ('' === str) {
				prep = '';
			}
			str += `${prep}${name}=${value}`;
		}
		return str;
	},

	/**
	 * Send the request using fetch.
	 *
	 * @param {FormData} data
	 * @param {String}   type  Request type (GET|POST).
	 *
	 * @returns {Promise}
	 */
	request: function( data, type = 'GET' ) {
		let req = data;
		let url = SnapshotAjax.ajaxurl;

		let options = {};

		if (type === GET) {
			req = this.buildUrl(data);
			url += `?${req}`;
		} else {
			options.method = type;
			options.credentials = 'same-origin';
			options.body = data;
		}

		return fetch(url, options);
	}
}

export default Helpers;