<?php // phpcs:ignore
/**
 * "New: Amazon S3 Integration" modal.
 *
 * @package snapshot
 */

use WPMUDEV\Snapshot4\Helper\Assets;

$assets = new Assets();
wp_nonce_field( 'snapshot_whats_new_seen', '_wpnonce-whats_new_seen' );
?>
<div class="sui-modal sui-modal-md">
	<div
		role="dialog"
		id="snapshot-whats-new-modal"
		class="sui-modal-content"
		aria-modal="true"
	>
		<div class="sui-box">

			<div class="sui-box-header sui-flatten sui-content-center sui-spacing-top--60">
				<figure class="sui-box-banner" aria-hidden="true">
					<img
						src="<?php echo esc_attr( $assets->get_asset( 'img/modal-whats-new-ftp-destination.png' ) ); ?>"
						srcset="<?php echo esc_attr( $assets->get_asset( 'img/modal-whats-new-ftp-destination.png' ) ); ?> 1x, <?php echo esc_attr( $assets->get_asset( 'img/modal-whats-new-ftp-destination@2x.png' ) ); ?> 2x"
					/>
				</figure>

				<button class="sui-button-icon sui-button-float--right" data-modal-close>
					<span class="sui-icon-close sui-md" aria-hidden="true"></span>
				</button>

				<div class="sui-box-title sui-lg" style="padding: 0 10px; white-space: normal;">
					<?php esc_html_e( 'New! FTP/SFTP Destination', 'snapshot' ); ?>
				</div>
			</div>

			<div class="sui-box-body" style="padding-bottom: 40px;">
				<p class="sui-description"><?php echo sprintf( esc_html__( 'Hey, %s! You can now automatically upload backups to an FTP server! To get started, simply navigate to the Destinations page, click Add Destination, select FTP/SFTP, and enter your FTP connection details. Once configured, a full site backup will be automatically uploaded to your FTP server after every backup.', 'snapshot' ), ucfirst( wp_get_current_user()->display_name ) ); ?></p>
			</div>
			<div class="sui-box-footer sui-content-center sui-flatten">
				<button class="sui-button" id="snapshot-whats-new-modal-button-ok" data-modal-close><?php esc_html_e( 'GOT IT', 'snapshot' ); ?></button>
			</div>

		</div>
	</div>
</div>