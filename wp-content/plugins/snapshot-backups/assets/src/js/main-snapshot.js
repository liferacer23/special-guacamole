/**
 * All Snapshot Pages.
 */

const setSeen = () => {
	const nonce = snapshotReact.requestsData.pluginRequests.nonce;
	fetch(`${ajaxurl}?action=snapshot_set_started_seen&_ajax_nonce=${nonce}`)
			.then(response => response.json())
			.then((data) => data)
			.catch(err => {console.error(err)});
}

const manualApply = document.querySelector('.sui-welcome-apply-configs-redirect');
if (manualApply) {
	manualApply.addEventListener('click', (e) => {
		e.preventDefault();
		const el = e.target;
		const url = el.getAttribute('href');
		setSeen();
		window.location.href = url;
	});
}
const isEmpty = (label) =>{
	return ('' === label || null === label || 'undefined' === label ) ? true : false;
}

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
}

let applying = false;

/**
 * Apply the configs.
 *
 * @param {FormData} data
 * @param {HTMLButtonElement} el
 *
 * @returns {void}
 */
const applyConfig = (data, el) => {
	const applied = fetch(ajaxurl, {
		method: 'POST',
		credentials: 'same-origin',
		body: data,
	});
	applied
		.then(response => response.json())
		.then((result) => {
			if (result.success) {
				window.SUI.closeModal();
				let msg = snapshotReact.config_applied
				msg = msg.replace('{configName}', `<strong>${result.data.name}</strong>`);
				const noticeArgs = {
					message: msg,
					type: 'success',
					dismissible: true
				};
				setSeen();
				openNotice(noticeArgs);
			} else {
				if ( 'password_required' === result.data.error ) {
					SUI.closeModal()
					const passModal = document.querySelector('#snapshot-confirm-wpmudev-password-modal');
					if (passModal) {
						passModal.querySelector('[name=what]').value = "apply_config_" + result.data.preset.id;
						SUI.openModal('snapshot-confirm-wpmudev-password-modal', window);

						const nonce = document.createElement('input');
						nonce.setAttribute('type', 'hidden');
						nonce.setAttribute('id', 'snapshot-confirm-password-nonce-field');
						nonce.setAttribute('value', result.data._ajax_nonce);

						const preset = document.createElement('input');
						preset.setAttribute('type', 'hidden');
						preset.setAttribute('id', 'snapshot-apply-config-id');
						preset.setAttribute('value', result.data.preset.id);


						passModal.querySelector('.sui-form-field').appendChild(nonce);
						passModal.querySelector('.sui-form-field').appendChild(preset);
					}


				}
			}
			el.classList.remove('applying');
			applying = false;
		})
		.catch(err => {
			el.classList.remove('applying');
			applying = false;
			console.error(err);
		})
}

const applyConfigLink = document.querySelector('.sui-welcome-apply-configs');
if ( applyConfigLink ) {
	applyConfigLink.addEventListener('click', (e) => {
		e.preventDefault();
		const el = e.target;
		const nonce = el.getAttribute('data-nonce');

		if ( applying ) {
			return;
		}

		applying = true;

		const formData = new FormData();
		formData.append('action', 'snapshot_apply_config');
		formData.append('id', 1);
		formData.append('_ajax_nonce', nonce);

		el.classList.add('applying');

		applyConfig(formData, el);

	});
}

/**
 * Get all stored Snapshot configs from the Hub.
 *
 * @returns {Promise}
 */
 const getHubConfigs = () => {
	const packageId = snapshotReact.requestsData.pluginData.id;
	const apiKey = snapshotReact.requestsData.apiKey;
	let uri = snapshotReact.requestsData.hubBaseURL;
	uri += `?package_id=${packageId}`;

	return fetch(uri, {
		method: 'GET',
		credentials: 'same-origin',
		headers: {
			'Content-Type': ' application/json',
			'Authorization': `Basic ${apiKey}`
		},
	});
}

/**
 * Sync configs from the Hub.
 *
 * @param {Object} configs
 * @returns {Promise}
 */
const syncConfigs = (configs) => {
	const formData = new FormData();
	formData.append('configs', JSON.stringify(configs));
	formData.append('action', 'snapshot_sync_configs');
	formData.append('_ajax_nonce', snapshotReact.requestsData.pluginRequests.nonce);

	return fetch( SnapshotAjax.ajaxurl, {
		method: 'POST',
		credentials: 'same-origin',
		body: formData
	});
};

const loadHubConfigs = document.querySelector('.sui-welcome-load-hub-configs');
if (loadHubConfigs) {
	loadHubConfigs.addEventListener('click', (e) => {
		e.preventDefault();
		const el = e.target;
		const configs = getHubConfigs();

		if (applying) {
			return;
		}

		applying = true;
		el.classList.add('applying');
		configs
			.then(response => response.json())
			.then((res) => {
				if (res) {
					const allConfigs = syncConfigs(res);
					allConfigs
						.then(data => data.json())
						.then((result) => {
							if (result.success) {
								const nextModal = el.getAttribute('data-slide-to');
								const modal = document.querySelector(`#${nextModal}`);
								const listEl = modal.querySelector('#snapshot-configs--hub');

								for (let res in result.data) {
									const data = result.data;
									const config = data[res];
									let opt = document.createElement('OPTION');
									opt.setAttribute('value', config.id);
									opt.innerHTML = config.name;
									listEl.appendChild(opt);
								}

								SUI.slideModal(nextModal);
								el.classList.remove('applying');
							}
						})
						.catch((err) => {
							console.error(err);
						});
				} else {
					console.log('else block');
				}

				applying = false;
			})
			.catch(err => {
				console.error(err);
				applying = false;
			})
	});
}

const hubConfigsForm = document.querySelector('#snapshot-apply-config--form');
if (hubConfigsForm) {
	hubConfigsForm.addEventListener('submit', (e) => {
		e.preventDefault();
		const configId = hubConfigsForm.querySelector('#snapshot-configs--hub').value;
		const btn = hubConfigsForm.querySelector('#snapshot-configs--hub__apply');
		const nonce = hubConfigsForm.querySelector('#snapshot-fetch-nonce').value;
		if (applying) {
			return;
		}

		applying = true;
		btn.classList.add('sui-button-onload-text');

		const formData = new FormData();
		formData.append('action', 'snapshot_apply_config');
		formData.append('id', configId);
		formData.append('_ajax_nonce', nonce);

		applyConfig(formData, btn);
	});
}

const googleLoginForm = document.querySelector('#snapshot-google-login');
googleLoginForm.addEventListener('submit', (e) => {
	e.preventDefault();
	let redirectUrl = googleLoginForm.querySelector('[name=redirect_url]').value;
	const what = googleLoginForm.querySelector('[name=what]').value;

	if (what) {
		redirectUrl += `&action=${what}`;
	}

	googleLoginForm.querySelector('[name=redirect_url]').value = redirectUrl;

	googleLoginForm.submit();
});

;(function($) {

    if (($('#snapshot-welcome-dialog').length > 0) && ! ($('#snapshot-welcome-dashboard-dialog').length > 0)) {
        var listen = setInterval(function () {
			SUI.openModal('snapshot-welcome-dialog', this, undefined, false, false);
			clearInterval(listen);
        }, 500)
    }

    if ($('#snapshot-welcome-dashboard-dialog').length > 0) {
        var listen = setInterval(function () {
			SUI.openModal('snapshot-welcome-dashboard-dialog', this, undefined, false, false);
			clearInterval(listen);
        }, 500)
    }

	/**
	 * Sends an AJAX Request to change the storage limit.
	 *
	 * @param {*} el   Main "Save Changes" button.
	 * @param {*} args AJAX data arguments.
	 *
	 * @returns {bool|XMLHttpRequest}
	 */
	function change_storage_limit( el = null, args = null ) {
		if ( null === args ) {
			return false;
		}

		if ( null === el ) {
			return false;
		}

		return $.ajax({
			type: 'POST',
			url: ajaxurl,
			data: args,
			beforeSend: function () {
				el.find('.sui-button').prop('disabled', true);
            }
		});
	}

	/**
	 * Handles saving settings
	 *
	 * @param {Object} e Event object
	 */
	function handle_save_settings( e ) {
		if (e && e.preventDefault) e.preventDefault();

		var data = {};
		$(this).serializeArray().forEach(function (item) {
			data[item.name] = item.value;
		});
		data._wpnonce = $( '#_wpnonce-save_snapshot_settings' ).val();

		if ( 'snapshot-backup-limit' in data ) {
			if (
				!$.isNumeric(data['snapshot-backup-limit']) ||
				data['snapshot-backup-limit'] < 1 ||
				data['snapshot-backup-limit'] > 30
			) {
				$('#error-snapshot-backup-limit').show();
				$('#error-snapshot-backup-limit').html(snapshot_messages.storage_limit_invalid);
				$('.snapshot-storage-limit-input .sui-form-field').addClass('sui-form-field-error');
				$('#snapshot-backup-limit').trigger('focus');

				return false;
			} else {
				$('#error-snapshot-backup-limit').html('');
				$('#error-snapshot-backup-limit').hide();
				$('.snapshot-storage-limit-input .sui-form-field').removeClass('sui-form-field-error');
			}
		}

        var that = $(this);

		var global_exclusions_el = that.find('.sui-multistrings-list');

		if (global_exclusions_el.length) {
			var items = [];
			global_exclusions_el.children('li:not(.sui-multistrings-input)').each(function () {
				items.push($(this).attr('title'));
			});
			data.global_exclusions = JSON.stringify(items);
		}

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            beforeSend: function () {
				that.find('.sui-button').prop('disabled', true);
            },
            success: function (result) {
                if (result.success) {
					// We have to send another AJAX request if response has 'continue_ajax' flag.
					if ( 'continue_ajax' in result.data && result.data.continue_ajax ) {
						if ( 'change_storage_limit' === result.data.next_action ) {
							// Send another AJAX request to update the storage limit via API.
							const newAjax = change_storage_limit( that, result.data.next_args );

							newAjax.done( (result) => {
								if ( result.success ) {
									that.find('#existing_backup_limit').val(result.data.changed_storage);
									jQuery(window).trigger( 'snapshot:show_top_notice', ['success', snapshot_messages.settings_save_success, 3000, false ]);
								} else {
									jQuery(window).trigger( 'snapshot:show_top_notice', ['error', snapshot_messages.settings_save_error] );
								}
							});
							newAjax.always( () => {
								that.find('.sui-button').prop('disabled', false);
							});
							newAjax.fail( () => {
								jQuery(window).trigger( 'snapshot:show_top_notice', ['error', snapshot_messages.settings_save_error] );
							});
						}
					} else {
						that.find('.sui-button').prop('disabled', false);
						jQuery(window).trigger( 'snapshot:show_top_notice', ['success', snapshot_messages.settings_save_success, 3000, false ]);
					}
                } else {
                    jQuery(window).trigger('snapshot:show_top_notice', ['error', snapshot_messages.settings_save_error]);
                }
            },
            error: function () {
                jQuery(window).trigger('snapshot:show_top_notice', ['error', snapshot_messages.settings_save_error]);
            }
        });
        return false;
	}

	function handle_save_backup_settings( e ) {
		if (e && e.preventDefault) {
			e.preventDefault();
		}

		var data = {};
		$(this).serializeArray().forEach(function (item) {
			data[item.name] = item.value;
		});

		var that = $(this);

		var frequency = that.find('.sui-side-tabs>div[data-tabs]>div.active').data('frequency');

		var request_data = {
			action: 'snapshot-backup_schedule',
			schedule_action: data.schedule_action,
			_wpnonce: $( '#_wpnonce-backup_schedule' ).val(),
			//apply_exclusions: data.apply_exclusions === 'on',
			data: {
				frequency: frequency,
				status: data.status,
				files: data.files,
				tables: data.tables,
				frequency_weekday: null,
				frequency_monthday: null,
				time: null
			}
		};

		switch (frequency) {
			case 'daily':
				request_data.data.time = data.daily_time;
				break;
			case 'weekly':
				request_data.data.time = data.weekly_time;
				request_data.data.frequency_weekday = parseInt(data.frequency_weekday);
				break;
			case 'monthly':
				request_data.data.time = data.monthly_time;
				request_data.data.frequency_monthday = parseInt(data.frequency_monthday);
				break;
		}

		request_data.data = JSON.stringify(request_data.data);

		if (!frequency || (e.data && 'delete' === e.data.schedule_action)) {
			request_data = {
				action: 'snapshot-backup_schedule',
				schedule_action: 'delete',
				_wpnonce: $( '#_wpnonce-backup_schedule' ).val()
			};
		}

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: request_data,
			beforeSend: function () {
				that.find('.sui-button').addClass('sui-button-onload-text');
			},
			complete: function () {
				that.find('.sui-button').removeClass('sui-button-onload-text');
			},
			success: function (data) {
				close_modal();
				if (!data.success) {
					jQuery(window).trigger('snapshot:show_top_notice', ['error', snapshot_messages.schedule_save_error]);
					return;
				}
				$(window).trigger('snapshot:get-schedule');
				if (that.data('showScheduleNotice')) {
					if (data.data.schedule.values.frequency === null) {
						close_welcome_schedule_modal();
						return;
					}

					var notice = $('<span></span>');
					var notice_html = [
						snapshot_messages.schedule_backup_time.replace('%s', data.data.schedule.text),
						snapshot_messages.schedule_next_backup_time.replace('%s', data.data.schedule.next_backup_time),
					].join(' ');
					notice.append(notice_html);
					notice.find('a').on('click', function (e) {
						goto_manual_backup_modal(e, notice);
					});
					jQuery(window).trigger('snapshot:show_top_notice', ['success', notice]);

					show_whats_new_modal();
				} else if (request_data.schedule_action === 'create') {
					var create_message = snapshot_messages.schedule_backup_time.replace('%s', data.data.schedule.text);
					create_message += ' ' + snapshot_messages.schedule_next_backup_time.replace('%s', data.data.schedule.next_backup_time),
					jQuery(window).trigger('snapshot:show_top_notice', ['info', create_message]);
				} else if (request_data.schedule_action === 'update') {
					var update_message = snapshot_messages.schedule_update_time.replace('%s', data.data.schedule.text);
					update_message += ' ' + snapshot_messages.schedule_next_backup_time.replace('%s', data.data.schedule.next_backup_time),
					jQuery(window).trigger('snapshot:show_top_notice', ['info', update_message]);
				} else if (request_data.schedule_action === 'delete') {
					jQuery(window).trigger('snapshot:show_top_notice', ['info', snapshot_messages.schedule_delete]);
				}
			},
			error: function () {
				jQuery(window).trigger('snapshot:show_top_notice', ['error', snapshot_messages.schedule_save_error]);
			}
		});
	}

	function close_welcome_schedule_modal() {
		close_modal();

		var notice = $('<span></span>').html(snapshot_messages.onboarding_schedule_close);
		var a = notice.find('a');
		a.eq(0).on('click', function (e) {
			goto_manual_backup_modal(e, notice);
		});
		a.eq(1).on('click', function (e) {
			goto_set_schedule_modal(e, notice);
		});

		jQuery(window).trigger('snapshot:show_top_notice', ['success', notice]);

		show_whats_new_modal();
	}

	function boot_settings_handler() {
		$('#wps-settings').on('submit', handle_save_settings);
		$('#form-snapshot-schedule').on('submit', handle_save_backup_settings);
		$('#onboarding-schedule').on('submit', handle_save_backup_settings);
		$('#snapshot-welcome-dialog-slide-3 .close-modal').on('click', close_welcome_schedule_modal);
		$('#create-backup-link').on('click', function () {
			$(window).trigger('snapshot:backup_modal');
			$(this).trigger('snapshot:close_notice');
		});
    }

	function on_snapshot_manual_backup_modal(e) {
		if ($('#snapshot-php-version').val() < 0) {
			// We dont have a compatible PHP version, show the requirement check modal.
			SUI.openModal('modal-snapshot-requirements-check-failure', this);
			return false;
		}

		$('#form-snapshot-create-manual-backup input[type=text]').val('');
		SUI.openModal('modal-snapshot-create-manual-backup', this);
		$('#modal-snapshot-create-manual-backup #manual-backup-name').trigger('focus');
		return false;
	}

	function schedule_modal(e, action, values, schedule_action) {
		var form = $('#form-snapshot-schedule');

		form.find('.sui-button').prop('disabled', false);

		form.find('input[type=text]').val('');

		if ('update' === action) {
			form.find('[data-tabs]>div').each(function () {
				var $this = $(this);
				if ($this.data('frequency') === values.frequency) {
					$this.trigger('click');
				}
			});
			if (values.time) {
				form.find('select[name=daily_time]').val(values.time);
				form.find('select[name=weekly_time]').val(values.time);
				form.find('select[name=monthly_time]').val(values.time);
			}
			if (values.frequency_weekday) {
				form.find('select[name=frequency_weekday]').val(values.frequency_weekday);
			}
			if (values.frequency_monthday) {
				form.find('select[name=frequency_monthday]').val(values.frequency_monthday);
			}
			form.find('select').trigger('change');
		}

		var open = true;
		if ('create' === action) {
			form.find('input[name=schedule_action]').val('create');
		} else if ('update' === action) {
			form.find('input[name=schedule_action]').val('update');
		} else {
			open = false;
		}
		if (schedule_action) {
			form.find('input[name=schedule_action]').val(schedule_action);
		}
		if (open) {
			SUI.openModal('modal-snapshot-edit-schedule', this);
		}
	}

	function on_show_top_notice(e, type, text, close_after, can_dismiss) {
		if ( can_dismiss === undefined ) {
			can_dismiss = true;
		}
		if ( close_after === undefined) {
			close_after = false;
		}

		var icon = 'info';
		switch (type) {
			case 'success':
				icon = 'check-tick';
				break;
			case 'warning':
			case 'error':
				icon = 'warning-alert';
				break;
		}

		var notice_container = $('.sui-floating-notices').eq(0);
		if (!notice_container.length) {
			notice_container = $('<div class="sui-floating-notices"></div>');
			notice_container.insertAfter($('.sui-header').eq(0));
		}

		// Generate random id
		var notice_id = 'snapshot-notice-' + Math.random().toString(36).substr(2, 9);
		var notice = $('<div role="alert" id="' + notice_id + '" class="sui-notice" aria-live="assertive"></div>');
		notice.appendTo(notice_container);
		var notice_options = {type: type, icon: icon};
		if (close_after) {
			notice_options.autoclose = {timeout: close_after};
		} else {
			notice_options.autoclose = {show: false};
		}
		if (can_dismiss) {
			notice_options.dismiss = {show: true};
		}
		if (text instanceof jQuery) {
			SUI.openNotice(notice_id, '<p></p>', notice_options);
			$('#' + notice_id).find('.sui-notice-message>p').append(text);
		} else {
			SUI.openNotice(notice_id, '<p>' + $('<p></p>').text(text).html() + '</p>', notice_options);
		}

		notice.on('snapshot:close_notice', function() {
			SUI.closeNotice(notice_id);
		});
	}

	function goto_manual_backup_modal(e, notice) {
		e.preventDefault();
		notice.trigger('snapshot:close_notice');

		// Lets see if we're on the backups page.
		$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		if ($.urlParam('page') && 'snapshot-backups' === $.urlParam('page') ) {
			jQuery(window).trigger('snapshot:backup_modal');
		} else {
			window.location = snapshot_urls.backups + '#create-backup';
		}
	}

	function goto_set_schedule_modal(e, notice) {
		e.preventDefault();
		notice.trigger('snapshot:close_notice');

		// Lets see if we're on the backups page.
		$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		};

		if ($.urlParam('page') && 'snapshot-backups' === $.urlParam('page') ) {
			$('#snapshot-backup-schedule > a').trigger('click');
		} else {
			window.location = snapshot_urls.backups + '#set-schedule';
		}
	}

	function install_dashboard(e, installed) {
		if (e && e.preventDefault) e.preventDefault();

		var data = {
			_wpnonce : $( '#_wpnonce-snapshot_install_dashboard' ).val(),
			action : 'snapshot-handle_dashboard',
			installed : installed ? 1 : 0
		};

        $.ajax({
            type: 'POST',
            url: ajaxurl + '?action=snapshot-handle_dashboard',
            data: data,
            beforeSend: function () {
				$('#snapshot-welcome-dashboard-dialog').find('.sui-button').addClass('sui-button-onload-text', true);
            },
            success: function (response) {
                if (response.success) {
					if ('activation' === response.data.action) {
						// Checked in PHP after activation, whether we're logged in or not. If we are, no need to redirect.

						if (false !== response.data.redirect_to) {
							window.location.href = response.data.redirect_to;
						} else {
							$('#snapshot-welcome-dashboard-dialog').find('.sui-button').removeClass('sui-button-onload-text', false);

							close_modal();
							if (true === response.data.welcome_modal) {
								var listen = setInterval(function () {
									SUI.openModal('snapshot-welcome-dialog', this, undefined, false, false);
									clearInterval(listen);
								}, 500);
							}

							if (response.data.reactivate_membership) {
								show_membership_expired_modal(true);
							}
						}
					} else if ('installation' === response.data.action) {
						redirect_to = snapshot_urls.install_dashboard + '&plugin=install_wpmudev_dash&_wpnonce=' + response.data.nonce;
						window.location.href = redirect_to;
					}
                }
            }
        });
	}

	function reactivate_schedule() {
		var data = {};

		data._wpnonce = $( '#_wpnonce-reactivate_snapshot_schedule' ).val();

		var url = ajaxurl + '?action=reactivate_snapshot_schedule';

		var modal = $('#snapshot-welcome-dialog');

		function onError() {
			modal.find('.on-error').show();
			modal.find('.on-success').hide();
		}

		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			cache: false,
			dataType: 'json',
			beforeSend: function () {
				$('#snapshot-welcome-dialog .sui-button').prop('disabled', true);
			},
			complete: function () {
				$('#snapshot-welcome-dialog .sui-button').prop('disabled', false);
			},
			success: function (response) {
				if (!response.success) {
					onError();
					return;
				}

				modal.find('.on-success').show();
				modal.find('.on-error').hide();

				$(window).trigger('snapshot:get-schedule');

				if (response.data.show_schedule_modal === true) {
					// We have a region selected already, so we skip the region modal.
					SUI.slideModal( 'snapshot-welcome-dialog-slide-3' );

					// We also hide the X button on the schedule modal.
					$('#snapshot-welcome-dialog-slide-3 .hide-when-region-selected').hide();
				} else {
					// We have a region selected already AND an active schedule, so we all next modals.
					close_modal();
					show_whats_new_modal();
				}
			},
			error: function () {
				onError();
			}
		});

		return false;
	}

	function save_region(e) {
		if (e && e.preventDefault) e.preventDefault();
		var data = {};

		data._wpnonce = $( '#_wpnonce-save_snapshot_region' ).val();
		data.region = $( '#onboarding-select-region option:selected' ).val();

		var url = ajaxurl + '?action=save_snapshot_region';

		var modal = $('#snapshot-welcome-dialog');

		function onError() {
			modal.find('.on-error').show();
		}

		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			cache: false,
			dataType: 'json',
			beforeSend: function () {
				$('#snapshot-set-initial-region').prop('disabled', true);
				$('#snapshot-set-initial-region').addClass('sui-button-onload-text', true);
				modal.find('.on-error').hide();
			},
			complete: function () {
				$('#snapshot-set-initial-region').prop('disabled', false);
				$('#snapshot-set-initial-region').removeClass('sui-button-onload-text', true);
			},
			success: function (response) {
				if (response.success) {
					SUI.slideModal( 'snapshot-welcome-dialog-slide-3' );

					if ( response.data.selected_region === 'US' ) {
						$('#backup-region-us').prop('checked', true);
						$('#backup-region-eu').prop('checked', false);
					} else if ( response.data.selected_region === 'EU' ) {
						$('#backup-region-eu').prop('checked', true);
						$('#backup-region-us').prop('checked', false);
					}
				} else {
					onError();
				}
			},
			error: function () {
				onError();
			}
		});

		return false;
	}

	function close_modal() {
		try {
			SUI.closeModal();
		} catch (e) {
		}
	}


	function move_to_region_modal() {
		SUI.slideModal( 'snapshot-welcome-dialog-slide-2' );
	}


	function toggle_cooldown(e, time_elapsed) {
		if ( time_elapsed < 1 ) {
			$('.sui-tooltip.snapshot-cooldown').show();
			$('.sui-button.snapshot-not-cooldown').hide();
			setTimeout(function () {
				toggle_cooldown(e, 1);
			}, (1 - time_elapsed) * 1000 * 60 );
		} else {
			$('.sui-tooltip.snapshot-cooldown').hide();
			$('.sui-button.snapshot-not-cooldown').show();
		}
	}

	function uninstall_snapshot_v3(e) {
		if (e && e.preventDefault) e.preventDefault();

		var data = {
			_wpnonce : $( '#_wpnonce-uninstall_snapshot_v3' ).val(),
		};

        $.ajax({
            type: 'POST',
            url: ajaxurl + '?action=snapshot-uninstall_snapshot_v3',
            data: data,
            beforeSend: function () {
				$('.snapshot-uninstall-v3').addClass('sui-button-onload-text', true);
            },
            success: function (response) {
				$('.snapshot-uninstall-v3').removeClass('sui-button-onload-text', true);
				close_modal();
                if (response.success) {
					SUI.closeNotice( 'snapshot-uninstall-v3' );
					jQuery(window).trigger('snapshot:show_top_notice', ['success', snapshot_messages.snapshot_v3_uninstall_success]);

                    $('.wp-has-submenu.toplevel_page_snapshot_pro_dashboard').hide();
				}
            },
			error: function () {
				$('.snapshot-uninstall-v3').removeClass('sui-button-onload-text', true);
				close_modal();
			}
        });
	}

	function check_if_region_modal(e) {
		if (e && e.preventDefault) e.preventDefault();

		var data = {
			_wpnonce : $( '#_wpnonce-snapshot_check_if_region' ).val(),
		};

		var modal = $('#snapshot-welcome-dialog');
		var buttons = modal.find('.snapshot-get-started');

		function onError() {
			modal.find('.on-error').show();
			modal.find('.on-success').hide();
		}

        $.ajax({
            type: 'POST',
            url: ajaxurl + '?action=snapshot-check_creds',
            data: data,
            beforeSend: function () {
				buttons.addClass('sui-button-onload-text');
				modal.find('.on-error').hide();
				modal.find('.on-success').show();
            },
			complete: function () {
				buttons.removeClass('sui-button-onload-text');
			},
            success: function (response) {
				if (!response.success) {
					onError();
					return;
				}

                if (response.success) {
					if (response.data.region == null) {
						$(window).trigger('snapshot:move_to_region_modal');
					} else {
						$(window).trigger('snapshot:reactivate_schedule');
					}
				}
            },
			error: function () {
				onError();
			}
        });
	}

	function uninstall_v3_confirm() {
		SUI.openModal('modal-confirm-v3-uninstall', this);
		return false;
	}

	function on_click_whats_new_link() {
		var url = new URL($(this).attr('href'));
		if (url.hash === '#notifications' && $('.snapshot-page-backups').length) {
			$(window).trigger('snapshot:close_modal');
			$('.snapshot-page-main').find('.snapshot-notifications').show();
			$('.snapshot-page-main').find('.snapshot-list-backups').hide();
			$('.snapshot-page-main').find('.snapshot-vertical-notifications').addClass('current');
			$('.snapshot-page-main').find('.snapshot-vertical-backups').removeClass('current');
			$('.snapshot-page-main select.sui-mobile-nav').val('notifications').change();
			return false;
		}
	}

	function show_membership_expired_modal(no_check_dashboard) {
		if (no_check_dashboard === undefined) {
			no_check_dashboard = false;
		}
		if (!no_check_dashboard && $('#snapshot-welcome-dashboard-dialog').length) {
			return;
		}
		if ($('#snapshot-membership-expired-modal').length) {
			SUI.openModal('snapshot-membership-expired-modal', this);
		}
	}

	function show_whats_new_modal() {
		if ($('#snapshot-whats-new-modal').length) {
			SUI.openModal('snapshot-whats-new-modal', this, 'snapshot-whats-new-modal');
			$.ajax({
				type: 'POST',
				url: ajaxurl + '?action=snapshot-whats_new_seen',
				data: {
					_wpnonce : $( '#_wpnonce-whats_new_seen' ).val()
				}
			});
		}
	}

	function click_whats_new_modal_button_ok() {
		var a = $(this);
		var href = a.attr('href');
		if (href && href !== window.location.href) {
			window.location = href;
		}
	}

	function hide_double_tooltip() {
		$('.snapshot-export-failure').on('mouseenter', function () {
			$(this).parent().addClass('snapshot-tooltip-hover');
		}).on('mouseleave', function () {
			$(this).parent().removeClass('snapshot-tooltip-hover');
		});
	}

	function close_tutorials_slider() {
		$('#snapshot-tutorials-slider').closest('.sui-row').remove();

		$.ajax({
			type: 'POST',
			url: ajaxurl + '?action=snapshot-tutorials_slider_seen',
			data: {
				_wpnonce : $( '#_wpnonce-tutorials_slider_seen' ).val()
			}
		});
	}

	function sui_tabs_callback(tab) {

		if ($(tab).closest('#modal-snapshot-edit-schedule') && !snapshot_env.values.is_pro) {
			var frequency = $(tab).data('frequency');
			var submit_button = $('#modal-snapshot-edit-schedule button[type=submit]');
			if (frequency === 'daily' || frequency === 'weekly') {
				$('#snapshot-notice-tpd-schedule').hide();
				submit_button.prop('disabled', true);
			} else {
				$('#snapshot-notice-tpd-schedule').show();
				submit_button.prop('disabled', false);
			}
		}

		if ($(tab).closest('#snapshot-welcome-dialog') && !snapshot_env.values.is_pro) {
			var frequency = $(tab).data('frequency');
			var submit_button = $('#snapshot-welcome-dialog button[type=submit]');
			if (frequency === 'daily' || frequency === 'weekly') {
				submit_button.prop('disabled', true);
			} else {
				submit_button.prop('disabled', false);
			}
		}
	}

    $(function() {
		boot_settings_handler();
		$(window).on('snapshot:backup_modal', on_snapshot_manual_backup_modal);
		$(window).on('snapshot:reactivate_schedule', reactivate_schedule);
		$(window).on('snapshot:save_region', save_region);
		$(window).on('snapshot:move_to_region_modal', move_to_region_modal);
		$(window).on('snapshot:schedule', schedule_modal);
		$(window).on('snapshot:show_top_notice', on_show_top_notice);
		$(window).on('snapshot:install_dashboard', install_dashboard);
		$(window).on('snapshot:close_modal', close_modal);
		$(window).on('snapshot:toggle_cooldown', toggle_cooldown);
		$(window).on('snapshot:uninstall_snapshot_v3', uninstall_snapshot_v3);
		$(window).on('snapshot:check_if_region_modal', check_if_region_modal);
		$(window).on('snapshot:hide_double_tooltip', hide_double_tooltip);
		$(window).on('snapshot:close_tutorials_slider', close_tutorials_slider);

		if ('#create-backup' === window.location.hash) {
			jQuery(window).trigger('snapshot:backup_modal');
			if (window.history && window.history.replaceState) {
				window.history.replaceState('', document.title, window.location.pathname + window.location.search);
			}
		}

		$('#snapshot-uninstall-v3-confirm').on('click', uninstall_v3_confirm);

		$('#snapshot-whats-new-modal .sui-box-header .sui-description>a').on('click', on_click_whats_new_link);
		$(window).on('snapshot:show_whats_new_modal', show_whats_new_modal);
		$('#snapshot-whats-new-modal-button-ok').on('click', click_whats_new_modal_button_ok);
		if (!$('#snapshot-welcome-dialog').length) {
			show_whats_new_modal();
		}

		show_membership_expired_modal();

		SUI.suiTabs({callback: sui_tabs_callback});
	});
})(jQuery);

/**
 * Closes the modal when 'esc' key is pressed.
 */
document.addEventListener('keyup', (e) => {
	if (e.key && 'undefined' !== e.key && 'escape' === e.key.toLowerCase()) {
		const activeModal = document.querySelector('.sui-active');
		if (activeModal && activeModal.classList.contains('sui-modal')) {
			const $close = activeModal.querySelector('button[data-modal-close]');
			if ($close) $close.click();
		}
	}
});