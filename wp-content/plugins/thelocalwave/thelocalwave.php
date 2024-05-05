<?php

/**
 * Plugin Name:       Thelocalwave
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       thelocalwave
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class TheLocalWavePlugin
{
	function __construct()
	{
		add_action('init', [$this, 'create_block_thelocalwave_block_init']);
		add_action('init', [$this, 'thelocalwave_register_host_post_meta']);
		add_action('init', [$this, 'thelocalwave_register_host_cpt']);
	}

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	function create_block_thelocalwave_block_init()
	{
		register_block_type(__DIR__ . '/build/blocks/host-callout');
		register_block_type(__DIR__ . '/build/blocks/host-meta');
	}

	function thelocalwave_register_host_cpt()
	{
		$lables = [
			'name' => __('Hosts', 'thelocalwave'),
			'singular_name' => __('Host', 'thelocalwave'),
			'add_new' => __('Add New', 'thelocalwave'),
			'add_new_item' => __('Add New Host', 'thelocalwave'),
			'edit_item' => __('Edit Host', 'thelocalwave'),
			'new_item' => __('New Host', 'thelocalwave'),
			'view_item' => __('View Host', 'thelocalwave'),
			'view_items' => __('View Hosts', 'thelocalwave'),
			'search_items' => __('Search Hosts', 'thelocalwave'),
			'not_found' => __('No Hosts found', 'thelocalwave'),
			'not_found_in_trash' => __('No Hosts found in trash', 'thelocalwave'),
			'parent_item_colon' => __('Parent Hosts:', 'thelocalwave'),
			'all_items' => __('All Hosts', 'thelocalwave'),
			'archives' => __('Host Archive', 'thelocalwave'),
			'attributes'               => __('Host Attributes', 'thelocalwave'),
			'insert_into_item'         => __('Insert into Host', 'thelocalwave'),
			'uploaded_to_this_item'    => __('Uploaded to this Host', 'thelocalwave'),
			'featured_image'           => __('Featured Image', 'thelocalwave'),
			'set_featured_image'       => __('Set featured image', 'thelocalwave'),
			'remove_featured_image'    => __('Remove featured image', 'thelocalwave'),
			'use_featured_image'       => __('Use as featured image', 'thelocalwave'),
			'menu_name'                => __('Hosts', 'thelocalwave'),
			'filter_items_list'        => __('Filter Host list', 'thelocalwave'),
			'filter_by_date'           => __('Filter by date', 'thelocalwave'),
			'items_list_navigation'    => __('Hosts list navigation', 'thelocalwave'),
			'items_list'               => __('Hosts list', 'thelocalwave'),
			'item_published'           => __('Host published.', 'thelocalwave'),
			'item_published_privately' => __('Host published privately.', 'thelocalwave'),
			'item_reverted_to_draft'   => __('Host reverted to draft.', 'thelocalwave'),
			'item_scheduled'           => __('Host scheduled.', 'thelocalwave'),
			'item_updated'             => __('Host updated.', 'thelocalwave'),
			'item_link'                => __('Host Link', 'thelocalwave'),
			'item_link_description'    => __('A link to a host.', 'thelocalwave'),
		];

		$args = [
			'labels' => $lables,
			'description'           => __('organize and manage hosts', 'thelocalwave'),
			'public'                => false,
			'hierarchical'          => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => false,
			'show_in_admin_bar'     => false,
			'show_in_rest'          => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-users',
			'capability_type'       => 'post',
			'capabilities'          => [],
			'supports'              => ['title', 'editor', 'revisions'],
			'taxonomies'            => [],
			'has_archive'           => false,
			'rewrite'               => ['slug' => 'host'],
			'query_var'             => true,
			'can_export'            => true,
			'delete_with_user'      => false,
			'template'              => [],
			'template_lock'         => true,
		];

		register_post_type('host', $args);
	}

	function thelocalwave_register_host_post_meta()
	{
		$args = [
			'show_in_rest' => true,
			'single' => true,
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'string'
		];

		register_post_meta('host', 'first_name', $args);
	}
}

$thelocalwaveplugin = new TheLocalWavePlugin();