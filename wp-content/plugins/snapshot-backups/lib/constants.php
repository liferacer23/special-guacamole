<?php
/**
 * Snapshot constants definition file.
 *
 * @package Snapshot
 * @since   4.4.0
 */

if ( file_exists( __DIR__ . DIRECTORY_SEPARATOR . 'constants.dev.php' ) ) {
	require __DIR__ . DIRECTORY_SEPARATOR . 'constants.dev.php';
}

if ( ! defined( 'SNAPSHOT4_SERVICE_API_URL' ) ) {
	define( 'SNAPSHOT4_SERVICE_API_URL', 'https://bbna4i2zbe.execute-api.us-east-1.amazonaws.com/prod/' );
}

if ( ! defined( 'SNAPSHOT_DROPBOX_APP_ID' ) ) {
	define( 'SNAPSHOT_DROPBOX_APP_ID', 'uh4tk1uxdft1ik3' );
}

if ( ! defined( 'SNAPSHOT_DROPBOX_APP_FOLDER_NAME' ) ) {
	define( 'SNAPSHOT_DROPBOX_APP_FOLDER_NAME', 'Snapshot-Backups' );
}

if ( ! defined( 'SNAPSHOT_DROPBOX_REDIRECT_URI' ) ) {
	define( 'SNAPSHOT_DROPBOX_REDIRECT_URI', 'https://wpmudev.com/api/snapshot/v2/dropbox-handler' );
}

define( 'SNAPSHOT_DROPBOX_VIEW_BASE_URL', 'https://www.dropbox.com/home' );
if ( ! defined( 'SNAPSHOT_DROPBOX_VIEW_URL' ) ) {
	define( 'SNAPSHOT_DROPBOX_VIEW_URL', SNAPSHOT_DROPBOX_VIEW_BASE_URL );
}

if ( ! defined( 'SNAPSHOT_TROUBLESHOOT_MODE' ) ) {
	define( 'SNAPSHOT_TROUBLESHOOT_MODE', false );
}

if ( ! defined( 'SNAPSHOT_BYPASS_IP_WHITELIST_CHECK' ) ) {
	define( 'SNAPSHOT_BYPASS_IP_WHITELIST_CHECK', false );
}