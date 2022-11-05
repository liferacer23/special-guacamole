/**
 * External dependencies.
 */
import React  from "react";
import ReactDOM from "react-dom";
import PropTypes from "prop-types";

/**
 * WordPress dependencies.
 */
import domReady from "@wordpress/dom-ready";
const { __, sprintf } = wp.i18n;

/**
 * Internal dependencies.
 */
import { Presets } from '@wpmudev/shared-presets';

export const ConfigsPage = ( { isWidget, snapshotConfig } ) => {
	const proDescription = (
		<React.Fragment>
			{ __(
				'You can easily apply configs to multiple site at once via ',
				'snapshot'
			) }
			<a
				href={ snapshotConfig.links.hubConfigs }
				target="_blank"
				rel="noreferrer"
			>
				{ __( 'the Hub.', 'snapshot' ) }
			</a>
		</React.Fragment>
	);

	const closeIcon = __( 'Close this dialog', 'snapshot' ),
		  cancelButton = __( 'Cancel', 'snapshot' );

	const lang = {
		title: __('Preset Configs', 'snapshot'),
		upload: __( 'Upload', 'snapshot' ),
		save: __( 'Save config', 'snapshot' ),
		loading: __( 'Updating the configs list', 'snapshot' ),
		emptyNotice: __(
			'You don\'t have any available config. Save preset configurations of Snapshot\'s settings, then upload and apply to your other sites in just a few clicks!',
			'snapshot'
		),
		baseDescription: __(
			'Use configs to save preset configurations of Snapshot\'s settings, then upload and apply them to your other sites in just a few clicks!',
			'snapshot'
		),
		proDescription,
		syncWithHubText: __(
			'Created or updated the configs via the Hub?',
			'snapshot'
		),
		syncWithHubButton: __(
			'Re-check to get the updated list',
			'snapshot'
		),
		apply: __( 'Apply', 'snapshot' ),
		download: __( 'Download', 'snapshot' ),
		edit: __( 'Name and description', 'snapshot' ),
		delete: __( 'Delete', 'snapshot' ),
		notificationDismiss: __( 'Dismiss notice', 'snapshot' ),
		freeButtonLabel: __( 'Try the HUB', 'snapshot' ),
		defaultRequestError: sprintf(
			/* translators: %s request status */
			__(
				'Request failed. Status: %s. Reload the page and try again.',
				'snapshot'
			),
			'{status}'
		),
		uploadActionSuccessMessage: sprintf(
			/* translators: %s config name */
			__(
				'%s config has been uploaded successfully - you can now apply it to this site.',
				'snapshot'
			),
			'{configName}'
		),
		applyAction: {
			closeIcon,
			cancelButton,
			title: __( 'Apply Config', 'snapshot' ),
			description: sprintf(
				/* translators: %s config name */
				__(
					'Are you sure you want to apply the %s config to this site? We recommend you have a backup available as your existing settings configuration will be overridden.',
					'snapshot'
				),
				'{configName}'
			),
			actionButton: __( 'Apply', 'snapshot' ),
			successMessage: sprintf(
				/* translators: %s config name */
				__( '%s has been applied successfully.', 'snapshot' ),
				'{configName}'
			),
		},
		deleteAction: {
			closeIcon,
			cancelButton,
			title: __( 'Delete Configuration File', 'snapshot' ),
			description: sprintf(
				/* translators: %s config name */
				__(
					'Are you sure you want to delete %s? You will not longer be able to apply it to this or other connected sites.',
					'snapshot'
				),
				'{status}',
			),
			actionButton: __( 'Delete', 'snapshot' )
		},
		editAction: {
			closeIcon,
			cancelButton,
			nameInput: __( 'Config name', 'snapshot' ),
			descriptionInput: __( 'Description', 'snapshot' ),
			emptyNameError: __( 'The config name is required', 'snapshot' ),
			actionButton: __( 'Save', 'snapshot' ),
			editTitle: __( 'Rename Config', 'snapshot' ),
			editDescription: __(
				'Change your config name to something recognizable.',
				'snapshot'
			),
			createTitle: __( 'Save Config', 'snapshot' ),
			createDescription: __(
				'Save your current settings configuration. You\'ll be able to then download and apply it to your other sites.',
				'snapshot'
			),
			successMessage: sprintf(
				/* translators: %s config name */
				__( '%s config created successfully.', 'snapshot' ),
				'{configName}'
			),
		},
		settingsLabels: {
			schedule: __( 'Schedule', 'snapshot' ),
			region: __( 'Region', 'snapshot' ),
			limit: __( 'Storage Limit', 'snapshot' ),
			exclusions: __( 'Exclusions', 'snapshot' ),
			notifications: __( 'Notifications', 'snapshot' ),
			options: __( 'Data & Settings', 'snapshot' ),
		},
	}

	return (
		<Presets
			isPro={ snapshotConfig.module.isMember }
			isWidget={ isWidget }
			isWhiteLabel={ snapshotConfig.module.isWhiteLabeled }
			sourceLang={ lang }
			sourceUrls={ snapshotConfig.links }
			requestsData={ snapshotConfig.requestsData }
		/>
	);
}

ConfigsPage.propTypes = {
	snapshotConfig: PropTypes.object
};

domReady(() => {
	// Configs page.
	const configs = document.querySelector('#snapshot-configs-wrap');
	const dashboard = document.querySelector('#snapshot-dashboard-configs');

	if (dashboard) {
		ReactDOM.render(
			<ConfigsPage isWidget={ true } snapshotConfig={ window.snapshotReact } />,
			dashboard
		);
	}

	if (configs) {
		ReactDOM.render(
			<ConfigsPage isWidget={ false } snapshotConfig={ window.snapshotReact } />,
			configs
		);
	}
});
