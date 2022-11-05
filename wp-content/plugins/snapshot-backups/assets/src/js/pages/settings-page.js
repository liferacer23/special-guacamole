/**
 * Page: Settings.
 */

const isEmpty = (label) =>{
	return ('' === label || null === label || 'undefined' === label ) ? true : false;
}

/**
 * Displays the Notice.
 * @param {Object} args
 * @returns
 */
 const openNotice = ( args ) => {
	if (!'message' in args || isEmpty(args.message)) {
		// Message must be set and mustn't be empty.
		console.error('Cannot display a notice without message');
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
	SUI.openNotice(noticeId, noticeContent, options);
	return noticeId;
}

/**
 * Activate the Configs tab.
 *
 * @returns boolean
 */
const activateConfigsTab = function() {
	const current = document.querySelector('.sui-vertical-tab.current');
	window.history.replaceState('', document.title, snapshot_urls.settings);
	if (current) {
		current.classList.remove('current');
		document.querySelector('.snapshot-vertical-configs').classList.add('current');

		document.querySelector('.snapshot-tab.snapshot-tab-api-key').style.display = 'none';
		document.querySelector('.snapshot-tab.snapshot-tab-configs').style.display = 'block';
		return true;
	}
	return false;
}

const urlHash = window.location.hash;
if ( urlHash ) {
	if ( '#apply-configs' === urlHash ) {
		activateConfigsTab();
	}
}

/**
 * Apply the Config after successful login.
 * @param {int} preset
 * @param {*} noticeId
 * @returns
 */
const applyConfigAfterGoogleLogin = function(preset, noticeId) {
	const nonce = snapshotReact.requestsData.pluginRequests.nonce;
	if (!nonce) {
		console.error('Cannot verify the nonce!');
		return;
	}

	let applyConfigFD = new FormData();
	applyConfigFD.append('action', 'snapshot_apply_config');
	applyConfigFD.append('id', preset);
	applyConfigFD.append('_ajax_nonce', nonce);

	const configRequest = fetch(ajaxurl, {
		method: 'POST',
		credentials: 'same-origin',
		body: applyConfigFD
	});

	configRequest
		.then(response => response.json())
		.then(res => {
			if (res.success) {
				let msg = snapshotReact.config_applied
				msg = msg.replace('{configName}', `<strong>${res.data.name}</strong>`);
				const noticeArgs = {
					message: msg,
					type: 'success',
					dismissible: true
				};
				setSeen();
				window.SUI.closeNotice(noticeId);
				setTimeout(function(){
					openNotice(noticeArgs);
				}, 1000);
			} else {
				window.SUI.closeNotice(noticeId);
				setTimeout(() => {
					openNotice({
						message: res.data.error_msg,
						type: 'error',
						dismissible: true
					});
				}, 1000);
			}
		})
		.catch(err => {
			// Display an error if something is wrong.
		});
}

const urlSearchParams = new URLSearchParams(window.location.search);
if (urlSearchParams.has('referer') && 'google_login' === urlSearchParams.get('referer')) {
	const action = urlSearchParams.get('action');
	if (snapshotReact.requestsData.apiKey === urlSearchParams.get('set_apikey')) {
		if (action.indexOf('apply_config') >= 0) {
			const current = document.querySelector('.sui-vertical-tab.current');

			if (current) {
				current.classList.remove('current');
				document.querySelector('.snapshot-vertical-configs').classList.add('current');

				document.querySelector('.snapshot-tab.snapshot-tab-api-key').style.display = 'none';
				document.querySelector('.snapshot-tab.snapshot-tab-configs').style.display = 'block';
			}

			const config = action.split('apply_config_');
			const config_id = parseInt(config[1]);

			const noticeId = openNotice({
				type: 'info',
				dismissible: false,
				autoclose: false,
				message: snapshot_messages.applying_config,
			});
			window.history.pushState(null, '', snapshot_urls.settings);

			applyConfigAfterGoogleLogin(config_id, noticeId);
		}
	} else {
		if (action.indexOf('apply_config') >= 0) {
			window.history.pushState(null, '', snapshot_urls.settings);
		}
	}
}

var fetching = false;

/**
 * Send the AJAX request to set "Get Started" seen
 */
const setSeen = () => {
	const nonce = snapshotReact.requestsData.pluginRequests.nonce;

	fetch(`${ajaxurl}?action=snapshot_set_started_seen&_ajax_nonce=${nonce}`)
		.then(response => response.json())
		.then((data) => data)
		.catch(err => {console.error(err)});
}



const fetch_current_region = () => {
	let url = ajaxurl;
	url += '?action=snapshot_get_region';
	url += `&_ajax_nonce=${snapshotReact.fetch_region_nonce}`;

	var xhr = new XMLHttpRequest();

	return new Promise((resolve, reject) => {
		xhr.open('GET', url);
		xhr.onload = () => resolve(JSON.parse(xhr.responseText));
      	xhr.onerror = () => reject(xhr.statusText);
		xhr.send(null);
	});
}


/**
 * Confirm the config
 *
 * @param {Object} preset
 */

const config_confirm = ( preset ) => {
	const result = fetch_current_region();
	if (fetching) {
		return;
	}

	return new Promise((resolve, reject) => {
		result.then(data => {
			if ( preset.config.configs.settings.region !== data.data.region ) {
				reject({
					status: 'snapshot-region-mismatch',
					description: snapshotReact.region_mismatch_desc
				});
			}
			resolve({
				status: 'snapshot-region-match',
			});
		});
	});
}

/**
 * Displays the WPMUDEV password modal.
 *
 * @param {String} url
 * @param {Object} data
 * @param {XMLHttpRequest} xhr
 *
 * @returns void
 */
const password_modal = ( url, data, xhr ) => {
	if ( url.indexOf('snapshot_apply_config') >= 0 ){
		if (xhr.readyState === 4) {
			const response = JSON.parse(xhr.responseText);
			if ( ! response.success ) {

				if ('password_required' === response.data.error) {
					const passModal = document.querySelector('#snapshot-confirm-wpmudev-password-modal');
					passModal.querySelector('[name=what]').value = "apply_config_" + response.data.preset.id;

					SUI.openModal('snapshot-confirm-wpmudev-password-modal', window);

					const nonce = document.createElement('input');
					nonce.setAttribute('type', 'hidden');
					nonce.setAttribute('id', 'snapshot-confirm-password-nonce-field');
					nonce.setAttribute('value', response.data._ajax_nonce);

					const preset = document.createElement('input');
					preset.setAttribute('type', 'hidden');
					preset.setAttribute('id', 'snapshot-apply-config-id');
					preset.setAttribute('value', response.data.preset.id);

					passModal.querySelector('.sui-form-field').appendChild(nonce);
					passModal.querySelector('.sui-form-field').appendChild(preset);
				}
			}
		}
	}
}

window.snapshot_get_region_description = config_confirm;
window.snapshot_display_password_modal = password_modal;

let checking = false;
const submitPasswordForm = (e) => {
	e.preventDefault();
	const form = e.target;
	const password = form.querySelector('#snapshot-wpmudev-password');

	if ( checking ) {
		return;
	}

	if ( '' === password.value || null === password.value ) {
		password.closest('.sui-form-field').classList.add('sui-form-field-error');
		setTimeout(() => {
			form.querySelector('#error-snapshot-wpmudev-password').style.display = 'block';
		}, 100);
		password.focus();
		return;
	} else {
		password.closest('.sui-form-field').classList.remove('sui-form-field-error');
		form.querySelector('#error-snapshot-wpmudev-password').style.display = 'none';
	}

	checking = true;
	form.querySelector('.submit-button').classList.add('sui-button-onload');

	let nonce = '';
	let preset = '';

	if (form) {
		const nonceField = form.querySelector('#snapshot-confirm-password-nonce-field');
		const presetField = form.querySelector('#snapshot-apply-config-id');

		if (nonceField && presetField) {
			nonce = nonceField.value;
			preset = presetField.value;
		}
	}

	if ('' === preset || '' === nonce) {
		return;
	}

	const formData = new FormData();
	formData.append('action', 'snapshot_apply_config_confirm_wpmudev_password');
	formData.append('password', password.value);
	formData.append('_ajax_nonce', nonce);
	formData.append('id', preset);

	const request = fetch(ajaxurl, {
		method: 'POST',
		credentials: 'same-origin',
		body: formData,
	});

	request
		.then(response => response.json())
		.then((result) => {
			if (result.success && !result.data.password_is_valid) {
				password.closest('.sui-form-field').classList.add('sui-form-field-error');
				form.querySelector('#error-snapshot-wpmudev-password').style.display = 'block';
				password.value = '';
				password.focus();
				checking = false;
				form.querySelector('.submit-button').classList.remove('sui-button-onload');
			} else if (result.success && result.data.password_is_valid) {
				// Send an additional request to apply the config if password is valid.
				let applyConfigFD = new FormData();
				applyConfigFD.append('action', 'snapshot_apply_config');
				applyConfigFD.append('id', preset);
				applyConfigFD.append('_ajax_nonce', nonce);

				const configRequest = fetch( ajaxurl, {
					method: 'POST',
					credentials: 'same-origin',
					body: applyConfigFD
				});

				configRequest
					.then(response => response.json())
					.then(res => {
						if (res.success) {
							// close the password modal.
							window.SUI.closeModal();

							let msg = snapshotReact.config_applied
							msg = msg.replace('{configName}', `<strong>${res.data.name}</strong>`);
							const noticeArgs = {
								message: msg,
								type: 'success',
								dismissible: true
							};
							setSeen();
							openNotice(noticeArgs);
						}
					})
					.catch(err => {
						// Display an error if something is wrong.
					});
			}
		})
		.catch(err => {

		});
}

let settingsPage  = document.querySelector('.snapshot-page-settings');
let backupsPage   = document.querySelector('.snapshot-page-backups');
let dashboardPage = document.querySelector('.snapshot-page-dashboard');
let destinationsPage = document.querySelector('.snapshot-page-destinations');
let hostingPage = document.querySelector('.snapshot-page-hosting-backups');

if ( settingsPage || dashboardPage || backupsPage || destinationsPage || hostingPage ) {
	let page = settingsPage || backupsPage || dashboardPage || destinationsPage || hostingPage;

	const modalForm = page.querySelector('#snapshot-confirm-wpmudev-password-modal-form');
	if (modalForm) {
		modalForm.addEventListener('submit', submitPasswordForm);
	}
}

;(function($) {
	function toggle_navbar_tabs( tab = 'api-key' ) {
		var tabEl = `.snapshot-tab-${tab}`;
		var el = `.snapshot-vertical-${tab}`;

		$('.snapshot-page-main .snapshot-tab').hide();
		$('.snapshot-page-main').find('.sui-vertical-tab').removeClass('current');

		$('.snapshot-page-main').find(el).addClass('current');
		$('.snapshot-page-main').find(tabEl).show();
	}

	function copy_api_key() {
		$('#snapshot-api-key').trigger('select');
		document.execCommand('copy');
		document.getSelection().removeAllRanges();
		jQuery(window).trigger('snapshot:show_top_notice', ['success', snapshot_messages.api_key_copied, 3000, false]);
	}

	function copy_site_id() {
		$('#snapshot-site-id').trigger('select');
		document.execCommand('copy');
		document.getSelection().removeAllRanges();
		jQuery(window).trigger('snapshot:show_top_notice', ['success', snapshot_messages.site_id_copied, 3000, false]);
	}

	function reset_settings_confirm() {
		SUI.openModal('modal-settings-reset-settings', this);
		return false;
	}

	function delete_logs_confirm() {
		SUI.openModal('modal-snapshot-settings-delete-logs', this);
		return false;
	}

	function delete_logs() {
		var data = {
			_wpnonce : $( '#_wpnonce-delete_snapshot_logs' ).val(),
		};
		var url = ajaxurl + '?action=delete_snapshot_logs';

		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			cache: false,
			dataType: 'json',
			beforeSend: function () {
				$('#modal-snapshot-settings-delete-logs .sui-button').prop('disabled', true);
			},
			complete: function () {
				$('#modal-snapshot-settings-delete-logs .sui-button').prop('disabled', false);
				SUI.closeModal('modal-snapshot-settings-delete-logs');
			},
			success: function (data) {
				if (data.success) {
					openNotice({
						message: snapshot_messages.delete_all_logs_success,
						type: 'success',
						dismissible: true
					});
				} else {
					openNotice({
						message: snapshot_messages.delete_all_logs_error,
						type: 'error',
						dismissible: true
					});
				}
			},
			error: function () {
				openNotice({
					message: snapshot_messages.delete_all_logs_error,
					type: 'error',
					dismissible: true
				});
			}
		});

		return false;
	}

	function reset_settings() {
		var data = {};

		data._wpnonce = $( '#_wpnonce-reset_snapshot_settings' ).val();

		var url = ajaxurl + '?action=reset_snapshot_settings';

		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			cache: false,
			dataType: 'json',
			beforeSend: function () {
				$('#modal-settings-reset-settings .sui-button').prop('disabled', true);
			},
			complete: function () {
				$('#modal-settings-reset-settings .sui-button').prop('disabled', false);
				$(window).trigger('snapshot:close_modal');
			},
			success: function (data) {
				if (data.success) {
					jQuery(window).trigger('snapshot:show_top_notice', ['success', snapshot_messages.reset_settings_success, 3000, false]);
					// Select "Keep" in Data & Settings => Uninstall
					$('#snapshot-settings-save-tab-2 input[name=remove_on_uninstall][value=0]').trigger('click');
					$('#snapshot-remove-options-notice').hide();
				} else {
					jQuery(window).trigger('snapshot:show_top_notice', ['error', snapshot_messages.reset_settings_error]);
				}
			},
			error: function () {
				jQuery(window).trigger('snapshot:show_top_notice', ['error', snapshot_messages.reset_settings_error]);
			}
		});

		return false;
	}

	function save_settings() {
		var form = $(this);
		var data = {};
		form.serializeArray().forEach(function (item) {
			data[item.name] = item.value;
		});
		data._wpnonce = $( '#_wpnonce-save_snapshot_settings' ).val();

		var url = ajaxurl + '?action=save_snapshot_settings';

		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			cache: false,
			dataType: 'json',
			beforeSend: function () {
				form.find('[type="submit"].sui-button').prop('disabled', true);
			},
			complete: function () {
				form.find('[type="submit"].sui-button').prop('disabled', false);
			},
			success: function (data) {
				if (data.success) {
					openNotice({
						message: snapshot_messages.settings_save_success,
						type: 'success',
						autoclose: 3000,
					});
				} else {
					openNotice({
						message: snapshot_messages.settings_save_error,
						type: 'error',
						autoclose: 3000,
					});
				}
			},
			error: function () {
				openNotice({
					message: snapshot_messages.settings_save_error,
					type: 'error',
					autoclose: 3000
				});
			}
		});

		return false;
	}

	$(function () {
		if ($('.snapshot-page-settings').length) {
			$('.snapshot-page-main').on('click', '.sui-vertical-tab', function(e) {
				e.preventDefault();
				var tab = $(this).children('a').data('tab');
				toggle_navbar_tabs(tab);
			});

			$('.snapshot-page-main .sui-mobile-nav').on('change', function () {
				var option = $(this).val();
				toggle_navbar_tabs(option);
			});

			$('#snapshot-settings-copy-api-key').on('click', copy_api_key);
			$('#snapshot-settings-copy-site-id').on('click', copy_site_id);

			$('#snapshot-settings-delete-logs').on('click', delete_logs);

			$('#snapshot-settings-reset-settings-confirm').on('click', reset_settings_confirm);
			$('#snapshot-settings-reset-settings').on('click', reset_settings);

			$('#snapshot-settings-save-tab-1').on('submit', save_settings);
			$('#snapshot-settings-save-tab-2').on('submit', save_settings);

			if ($('input[type=radio][name=remove_on_uninstall]:checked').val() === '1') {
				$('#snapshot-remove-options-notice').show();
			}
			$('input[type=radio][name=remove_on_uninstall]').change(function() {
				if ($(this).val() === '0') {
					$('#snapshot-remove-options-notice').hide();
				}
				else if ($(this).val() === '1') {
					$('#snapshot-remove-options-notice').show();
				}
			});
		}
	});

})(jQuery);
