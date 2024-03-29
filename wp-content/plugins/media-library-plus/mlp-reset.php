<?php
/*
Plugin Name: Media Library Folders for WordPress Reset
Plugin URI: http://maxgalleria.com
Description: Plugin for reseting WordPress Media Library Folders
Author: Max Foundry
Author URI: http://maxfoundry.com
Version: 5.1.6
Copyright 2015-2020 Max Foundry, LLC (http://maxfoundry.com)
Text Domain: mlp-reset
*/

if(!defined("MAXGALLERIA_MEDIA_LIBRARY_FOLDER_TABLE"))
  define("MAXGALLERIA_MEDIA_LIBRARY_FOLDER_TABLE", "mgmlp_folders");

function mlp_reset_menu() {
  add_menu_page(__('Media Library Folders Reset','mlp-reset'), __('Media Library Folders Reset','mlp-reset'), 'manage_options', 'mlp-reset', 'mlp_reset' );
  add_submenu_page('mlp-reset', __('Display Attachment URLs','mlp-reset'), __('Display Attachment URLs','mlp-reset'), 'manage_options', 'mlpr-show-attachments', 'mlpr_show_attachments');
  add_submenu_page('mlp-reset', __('Display Folder Data','mlp-reset'), __('Display Folder Data','mlp-reset'), 'manage_options', 'mlpr-show-folders', 'mlpr_show_folders');
  add_submenu_page('mlp-reset', __('Check for Folders Without Parent IDs','mlp-reset'), __('Check for Folders Without Parent IDs','mlp-reset'), 'manage_options', 'mlpr-folders-no-ids', 'mlpr_folders_no_ids');
  add_submenu_page('mlp-reset', __('Reset Database','mlp-reset'), __('Reset Database','mlp-reset'), 'manage_options', 'clean_database', 'clean_database');
}
add_action('admin_menu', 'mlp_reset_menu');

function load_mlfr_textdomain() {
  load_plugin_textdomain('mlp-reset', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'load_mlfr_textdomain');

function mlp_reset() {

	echo "<h3>" . __('WordPress Media Library Folders Reset Instructions','mlp-reset') . "</h3>";
  echo "<h4>" . __('If you need to rescan your database, please deactivate the WordPress Media Library Folders plugin and then click WordPress Media Library Folders Reset->Reset Database to erase the folder data. Then deactivate WordPress Media Library Folders Reset and reactivate WordPress Media Library Folders which will perform a fresh scan of your database.','mlp-reset') . "</h4>";
  
}

function clean_database() {  
    global $wpdb;
    
    $sql = "delete from $wpdb->prefix" . "options where option_name = 'mgmlp_upload_folder_name'";
    $wpdb->query($sql);
    
    $sql = "delete from $wpdb->prefix" . "options where option_name = 'mgmlp_upload_folder_id'";
    $wpdb->query($sql);
		
    $sql = "delete from $wpdb->prefix" . "options where option_name = 'mgmlp_database_checked'";
    $wpdb->query($sql);
		
    $sql = "delete from $wpdb->prefix" . "options where option_name = 'mgmlp_postmeta_updated'";
    $wpdb->query($sql);
				        
    echo "Deleteing mgmlp_folders<br>";
    
    $sql = "TRUNCATE TABLE $wpdb->prefix" . "mgmlp_folders";
    $wpdb->query($sql);
    
    $sql = "DROP TABLE $wpdb->prefix" . "mgmlp_folders";    
    $wpdb->query($sql);
		
    $sql = "select ID from {$wpdb->prefix}posts where post_type = 'mgmlp_media_folder'";
		
    $rows = $wpdb->get_results($sql);
		if($rows) {
      foreach($rows as $row) {
				delete_post_meta($row->ID, '_wp_attached_file');				
			}
		}
				    
    echo __('Removing mgmlp_media_folder posts','mlp-reset') . '<br>';
    $sql = "delete from $wpdb->prefix" . "posts where post_type = 'mgmlp_media_folder'";
    $wpdb->query($sql);
    
    echo __('Done. You can now reactivate WordPress Media Library Folders.','mlp-reset') . '<br>';
  
}

function mlpr_show_attachments () {
  global $wpdb;
  
  $sql = "select count(*) from {$wpdb->prefix}posts where post_type = 'attachment' ";
  
  $count = $wpdb->get_var($sql);  
		
  $uploads_path = wp_upload_dir();
  //$sql = "select ID, guid from $wpdb->prefix" . "posts where post_type = 'attachment' order by ID";
	
  $sql = "SELECT ID, pm.meta_value as attached_file, folder_id
FROM {$wpdb->prefix}posts
LEFT JOIN {$wpdb->prefix}postmeta AS pm ON pm.post_id = {$wpdb->prefix}posts.ID
LEFT JOIN {$wpdb->prefix}mgmlp_folders ON ({$wpdb->prefix}posts.ID = {$wpdb->prefix}mgmlp_folders.post_id)
WHERE post_type = 'attachment' 
AND pm.meta_key = '_wp_attached_file'
ORDER by folder_id";
	
  //echo $sql;
	
	echo '<h2>' . __('Attachment URLs','mlp-reset') . '</h2>';

  echo '<p>' . __('Number of attachments','mlp-reset') . " $count </p>";

  $rows = $wpdb->get_results($sql);
	?>
	<table>
		<tr>
			<th><?php _e('Attachment ID','mlp-reset'); ?></th>
			<th><?php _e('Attachment URL','mlp-reset'); ?></th>
			<th><?php _e('Folder ID','mlp-reset'); ?></th>
		</tr>	
    
  <?php  
  
  foreach($rows as $row) {
		$image_location = $uploads_path['baseurl'] . "/" . $row->attached_file;
	  ?>
		<tr>
			<td><?php echo $row->ID; ?></td>	
			<td><?php echo $image_location; ?></td>	
			<td><?php echo $row->folder_id; ?></td>	
		</tr>
    <?php				
  }    
	?>
	</table>
  <?php
}

function mlpr_show_folders() {
  global $wpdb;
	
  $sql = "select count(*) from {$wpdb->prefix}posts where post_type = 'mgmlp_media_folder' ";
  
  $count = $wpdb->get_var($sql);    
	
	echo '<h2>' . __('Folder URLs','mlp-reset') . '</h2>';
  
  $upload_dir = wp_upload_dir();  
  
  $upload_dir1 = $upload_dir['basedir'];
  
  echo __('Uploads folder: ','mlp-reset') . $upload_dir1 . '<br>';
        
  echo __('Uploads URL: ','mlp-reset') . $upload_dir['baseurl'] . '<br>';
  
  echo __('Number of folders: ','mlp-reset') . $count . '<br><br>';

  $folder_table = $wpdb->prefix . MAXGALLERIA_MEDIA_LIBRARY_FOLDER_TABLE;
            	
  $sql = "select distinct ID, post_title, $folder_table.folder_id, pm.meta_value as attached_file
from $wpdb->prefix" . "posts
LEFT JOIN $folder_table ON ($wpdb->prefix" . "posts.ID = $folder_table.post_id)
LEFT JOIN {$wpdb->prefix}postmeta AS pm ON pm.post_id = {$wpdb->prefix}posts.ID
where post_type = 'mgmlp_media_folder' 
order by ID";
	
  //echo $sql . "<br>";
	  
  $rows = $wpdb->get_results($sql);
	
	?>
	<table>
		<tr>
			<th><?php _e('Folder ID','mlp-reset'); ?></th>
			<th><?php _e('Folder Name','mlp-reset'); ?></th>
			<th><?php _e('Folder URL','mlp-reset'); ?></th>
			<th><?php _e('Parent ID','mlp-reset'); ?></th>
		</tr>	
    
  <?php  
  foreach($rows as $row) {
		$image_location = $upload_dir['baseurl'] . "/" . $row->attached_file;
	  ?>
		<tr>
			<td><?php echo $row->ID; ?></td>	
			<td><?php echo $row->post_title; ?></td>	
			<td><?php echo $image_location; ?></td>	
			<td><?php echo $row->folder_id; ?></td>	
		</tr>
    <?php		
  }	
	?>
	</table>
  <br><br>
  <?php
	
  echo "<br><br>$folder_table<br><br>";
  
  $sql = "select distinct post_id, folder_id from $folder_table order by post_id";
  
  $rows = $wpdb->get_results($sql);
  
  foreach($rows as $row) {
    echo "$row->post_id $row->folder_id<br>";
  }
  		  
}

function get_parent_by_name($sub_folder) {

  global $wpdb;

  $sql = "SELECT post_id FROM {$wpdb->prefix}postmeta where meta_key = '_wp_attached_file' and `meta_value` = '$sub_folder'";

  return $wpdb->get_var($sql);
}

function add_new_folder_parent($record_id, $parent_folder) {

  global $wpdb;    
  $table = $wpdb->prefix . MAXGALLERIA_MEDIA_LIBRARY_FOLDER_TABLE;

  $new_record = array( 
    'post_id'   => $record_id, 
    'folder_id' => $parent_folder 
  );

  $wpdb->insert( $table, $new_record );

}

function mlpr_folders_no_ids() {
  
  global $wpdb;
  
  echo '<h3>' . __('Checking for files without folder IDs','mlp-reset') . '</h3>' . PHP_EOL;
  
  $uploads_folder_id = get_option(MAXGALLERIA_MEDIA_LIBRARY_UPLOAD_FOLDER_ID );

  $folders = $wpdb->prefix . MAXGALLERIA_MEDIA_LIBRARY_FOLDER_TABLE;
  
  $sql = "SELECT ID, pm.meta_value AS attached_file FROM {$wpdb->prefix}posts
 LEFT JOIN $folders ON {$wpdb->prefix}posts.ID = {$folders}.post_id
 JOIN {$wpdb->prefix}postmeta AS pm ON pm.post_id = {$wpdb->prefix}posts.ID
 WHERE post_type = 'attachment' 
 AND folder_id IS NULL
 AND pm.meta_key = '_wp_attached_file'";
  
  $rows = $wpdb->get_results($sql);
  if($rows) {
    echo '<p>' . __('The following files with missing folder IDs were found','mlp-reset') . ':</p>' . PHP_EOL;
    echo "<ul>" . PHP_EOL;
    foreach($rows as $row) {
      // get the parent ID
      $folder_path = dirname($row->attached_file);
      if($folder_path != "")
        $folder_id = get_parent_by_name($folder_path);
      else
        $folder_id = $uploads_folder_id;
      if($folder_id !== NULL) {
        // if parent ID is found
        add_new_folder_parent($row->ID, $folder_id);
        echo "<li>{$row->attached_file} " . __('Fixed','mlp-reset') . "</li>" . PHP_EOL;
      } else {
        echo "<li>{$row->attached_file} " . __(' Parent folder not found.','mlp-reset') . "</li>" . PHP_EOL;        
      }  
    }
    echo "</ul>" . PHP_EOL;
  } else {
    echo "<p>" . __('No files with missing folder IDs were found.','mlp-reset') . "</p>" . PHP_EOL;
  }  
}