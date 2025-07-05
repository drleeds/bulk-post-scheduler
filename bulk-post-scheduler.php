<?php
/**
 * Plugin Name: Bulk Post Scheduler
 * Plugin URI: https://github.com/yourusername/bulk-post-scheduler
 * Description: Bulk schedule WordPress posts (published, drafts, scheduled) to be republished at regular intervals. Perfect for content imported via WPAutoBlog or other automation tools.
 * Version: 1.0.0
 * Author: Mark Leeds
 * Author URI: https://yourwebsite.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bulk-post-scheduler
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * Network: false
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class BulkPostScheduler {
    
    public function __construct() {
        // Hook into WordPress
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_ajax_bulk_schedule_posts', array($this, 'handle_bulk_schedule'));
        add_action('load-edit.php', array($this, 'add_bulk_actions'));
        add_action('admin_notices', array($this, 'admin_notices'));
    }
    
    /**
     * Initialize plugin
     */
    public function init() {
        // Load text domain for translations
        load_plugin_textdomain('bulk-post-scheduler', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    public function add_admin_menu() {
        add_management_page(
            __('Bulk Post Scheduler', 'bulk-post-scheduler'),
            __('Bulk Scheduler', 'bulk-post-scheduler'),
            'manage_options',
            'bulk-post-scheduler',
            array($this, 'admin_page')
        );
    }
    
    public function enqueue_scripts($hook) {
        if ($hook !== 'tools_page_bulk-post-scheduler' && $hook !== 'edit.php') {
            return;
        }
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('bulk-scheduler-js', plugin_dir_url(__FILE__) . 'bulk-scheduler.js', array('jquery'), '1.0', true);
        wp_localize_script('bulk-scheduler-js', 'bulkScheduler', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('bulk_schedule_nonce')
        ));
    }
    
    public function add_bulk_actions() {
        add_action('admin_footer', array($this, 'custom_bulk_admin_footer'));
    }
    
    public function custom_bulk_admin_footer() {
        global $post_type;
        
        if ($post_type == 'post') {
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery('<option>').val('bulk_schedule').text('Bulk Schedule').appendTo("select[name='action']");
                    jQuery('<option>').val('bulk_schedule').text('Bulk Schedule').appendTo("select[name='action2']");
                    
                    jQuery("input[value='Apply']").click(function(e) {
                        var action = jQuery(this).prev().val();
                        if (action == 'bulk_schedule') {
                            e.preventDefault();
                            var selected_posts = [];
                            jQuery('input[name="post[]"]:checked').each(function() {
                                selected_posts.push(jQuery(this).val());
                            });
                            
                            if (selected_posts.length > 0) {
                                jQuery('#bulk-schedule-modal').show();
                                jQuery('#selected-posts').val(selected_posts.join(','));
                            } else {
                                alert('Please select posts to schedule.');
                            }
                        }
                    });
                });
            </script>
            
            <div id="bulk-schedule-modal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); background:white; padding:20px; border:1px solid #ccc; box-shadow:0 4px 8px rgba(0,0,0,0.1); z-index:9999; width:400px;">
                <h3>Bulk Schedule Posts</h3>
                <form id="bulk-schedule-form">
                    <input type="hidden" id="selected-posts" name="selected_posts" value="">
                    
                    <p>
                        <label>Start Date:</label><br>
                        <input type="date" id="start-date" name="start_date" required>
                    </p>
                    
                    <p>
                        <label>Interval:</label><br>
                        <select id="interval" name="interval" required>
                            <option value="1">Every 1 day</option>
                            <option value="3">Every 3 days</option>
                            <option value="7">Every 7 days</option>
                        </select>
                    </p>
                    
                    <p>
                        <label>Start Time:</label><br>
                        <input type="time" id="start-time" name="start_time" value="09:00" required>
                    </p>
                    
                    <p>
                        <button type="submit" class="button button-primary">Schedule Posts</button>
                        <button type="button" class="button" onclick="jQuery('#bulk-schedule-modal').hide();">Cancel</button>
                    </p>
                </form>
            </div>
            
            <div id="bulk-schedule-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9998;" onclick="jQuery('#bulk-schedule-modal').hide();"></div>
            <?php
        }
    }
    
    public function handle_bulk_schedule() {
        check_ajax_referer('bulk_schedule_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_die('Insufficient permissions');
        }
        
        $post_ids = explode(',', sanitize_text_field($_POST['selected_posts']));
        $start_date = sanitize_text_field($_POST['start_date']);
        $interval = intval($_POST['interval']);
        $start_time = sanitize_text_field($_POST['start_time']);
        
        if (empty($post_ids) || empty($start_date) || empty($interval)) {
            wp_send_json_error('Missing required fields');
        }
        
        $scheduled_count = 0;
        $current_date = new DateTime($start_date . ' ' . $start_time);
        
        foreach ($post_ids as $post_id) {
            $post_id = intval($post_id);
            
            // Update post status to scheduled
            $result = wp_update_post(array(
                'ID' => $post_id,
                'post_status' => 'future',
                'post_date' => $current_date->format('Y-m-d H:i:s'),
                'post_date_gmt' => get_gmt_from_date($current_date->format('Y-m-d H:i:s'))
            ));
            
            if (!is_wp_error($result)) {
                $scheduled_count++;
                
                // Add interval for next post
                $current_date->add(new DateInterval('P' . $interval . 'D'));
            }
        }
        
        wp_send_json_success(array(
            'message' => sprintf('%d posts scheduled successfully', $scheduled_count)
        ));
    }
    
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>Bulk Post Scheduler</h1>
            <div class="notice notice-info">
                <p><strong>How to use:</strong></p>
                <ol>
                    <li>Go to Posts → All Posts</li>
                    <li>Select the published posts you want to reschedule</li>
                    <li>Choose "Bulk Schedule" from the Bulk Actions dropdown</li>
                    <li>Click "Apply"</li>
                    <li>Set your start date, interval, and time</li>
                    <li>Click "Schedule Posts"</li>
                </ol>
                <p><strong>Note:</strong> Selected posts will be changed from "Published" to "Scheduled" and will be republished at the specified intervals.</p>
            </div>
            
            <h2>Current Scheduled Posts</h2>
            <?php
            $scheduled_posts = get_posts(array(
                'post_status' => 'future',
                'posts_per_page' => -1,
                'orderby' => 'post_date',
                'order' => 'ASC'
            ));
            
            if ($scheduled_posts) {
                echo '<table class="wp-list-table widefat fixed striped">';
                echo '<thead><tr><th>Title</th><th>Scheduled Date</th><th>Status</th></tr></thead>';
                echo '<tbody>';
                foreach ($scheduled_posts as $post) {
                    echo '<tr>';
                    echo '<td><a href="' . get_edit_post_link($post->ID) . '">' . esc_html($post->post_title) . '</a></td>';
                    echo '<td>' . get_the_date('Y-m-d H:i:s', $post->ID) . '</td>';
                    echo '<td>Scheduled</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<p>No scheduled posts found.</p>';
            }
            ?>
        </div>
        <?php
    }
    
    public function admin_notices() {
        if (isset($_GET['bulk_scheduled'])) {
            $count = intval($_GET['bulk_scheduled']);
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p>' . sprintf('%d posts scheduled successfully!', $count) . '</p>';
            echo '</div>';
        }
    }
}

// Initialize the plugin
new BulkPostScheduler();

// Add JavaScript for AJAX handling
add_action('wp_footer', 'bulk_scheduler_js');
add_action('admin_footer', 'bulk_scheduler_js');

function bulk_scheduler_js() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#bulk-schedule-form').on('submit', function(e) {
            e.preventDefault();
            
            var formData = {
                action: 'bulk_schedule_posts',
                nonce: bulkScheduler.nonce,
                selected_posts: $('#selected-posts').val(),
                start_date: $('#start-date').val(),
                interval: $('#interval').val(),
                start_time: $('#start-time').val()
            };
            
            $.ajax({
                url: bulkScheduler.ajax_url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert(response.data.message);
                        $('#bulk-schedule-modal').hide();
                        location.reload();
                    } else {
                        alert('Error: ' + response.data);
                    }
                },
                error: function() {
                    alert('An error occurred while scheduling posts.');
                }
            });
        });
    });
    </script>
    <?php
}
?>