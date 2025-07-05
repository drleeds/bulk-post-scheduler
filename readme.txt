=== Bulk Post Scheduler ===
Contributors: your-wp-username, other-contributors
Tags: bulk schedule, post scheduler, content calendar, wpautoblog, schedule posts, automation, content management, bulk actions
Requires at least: 5.0
Tested up to: 6.5
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

WordPress plugin for bulk scheduling posts at regular intervals. Perfect for WPAutoBlog users needing to fix mass publishing or streamline content workflows.

== Description ==

Bulk Post Scheduler is a powerful WordPress plugin designed to help you efficiently manage and schedule your posts in bulk. It's particularly useful for users of **WPAutoBlog** who might accidentally publish numerous posts simultaneously and need a quick way to reschedule them with consistent intervals. Save time, maintain a regular posting schedule, and keep your content calendar organized!

Stop manually rescheduling posts one by one! With Bulk Post Scheduler, you can select multiple posts (published, draft, pending, or scheduled) and assign them new publication dates with smart intervals like 1, 3, or 7 days apart.

**Key Features**:

*   **Bulk Schedule Any Post Status**: Reschedule posts that are already `published`, or schedule `draft`, `pending`, or currently `scheduled` posts.
*   **Smart Interval Spacing**: Choose to space your posts 1, 3, or 7 days apart, ensuring a natural and consistent publishing rhythm.
*   **WordPress Bulk Actions Integration**: Seamlessly integrated into the WordPress posts list table bulk actions for intuitive use.
*   **Perfect for WPAutoBlog Workflows**: Specifically built to address the common issue of accidental bulk publishing from WPAutoBlog. Fix mass publishing errors in minutes!
*   **Simple Modal Interface**: An easy-to-use modal pops up for scheduling options when you trigger the bulk action.
*   **Lightweight & Performant**: Designed to be efficient and not bog down your WordPress admin.
*   **Secure**: Utilizes nonce verification and capability checks to ensure secure operations.

**Why Bulk Post Scheduler?**

*   **Fix WPAutoBlog Mistakes**: If WPAutoBlog publishes all your imported posts at once, Bulk Post Scheduler is your go-to tool to quickly space them out.
*   **Time Saver**: Automates the tedious task of scheduling many posts.
*   **SEO Friendly**: Helps maintain natural posting intervals which can be beneficial for SEO.
*   **User Friendly**: Integrates directly into the familiar WordPress interface.

== Installation ==

1.  **Via WordPress Admin (Recommended)**:
    *   Navigate to `Plugins > Add New` in your WordPress admin area.
    *   Search for "Bulk Post Scheduler".
    *   Click `Install Now` and then `Activate`.

2.  **Manual Upload via WordPress Admin**:
    *   Download the plugin `.zip` file from the [WordPress.org Plugin Directory](https://wordpress.org/plugins/bulk-post-scheduler/) (link will be active once plugin is published).
    *   Go to `Plugins > Add New` in your WordPress admin.
    *   Click `Upload Plugin` at the top.
    *   Choose the downloaded `.zip` file and click `Install Now`.
    *   `Activate` the plugin.

3.  **Manual Installation via FTP/SFTP**:
    *   Download the plugin `.zip` file.
    *   Unzip the file. You should see a folder named `bulk-post-scheduler`.
    *   Upload this `bulk-post-scheduler` folder to the `wp-content/plugins/` directory on your server.
    *   Go to `Plugins` in your WordPress admin and `Activate` Bulk Post Scheduler.

== Frequently Asked Questions ==

= What post statuses can I bulk schedule? =

You can bulk schedule posts with any status: `published`, `draft`, `pending review`, or already `scheduled`. The plugin will update their publication date accordingly.

= How does the interval spacing work? =

When you select posts and choose a start date and an interval (e.g., "Every 3 days"), the first selected post will be scheduled for the start date. The next post will be scheduled 3 days after that, the third post 3 days after the second, and so on.

= Is this plugin specifically for WPAutoBlog users? =

While Bulk Post Scheduler is extremely helpful for WPAutoBlog users who face issues with bulk publishing, it's a versatile tool for anyone needing to schedule multiple WordPress posts efficiently. If you manage a lot of content or want to plan your publishing calendar in advance, this plugin is for you.

= What happens if I select posts that are already scheduled for the future? =

Their existing scheduled dates will be overridden by the new schedule you set with Bulk Post Scheduler.

= Can I choose the exact time for posts? =

Yes, the scheduling modal allows you to set the start date and time for the first post in the batch. Subsequent posts will maintain that same time of day, spaced by the chosen interval.

= Is there a limit to how many posts I can schedule at once? =

There's no hard limit imposed by the plugin itself, but performance may depend on your server's resources. For very large batches (hundreds of posts), it's always good practice to monitor the process.

= Where can I find settings for this plugin? =

Currently, Bulk Post Scheduler integrates directly into the "Bulk Actions" menu on the All Posts screen. An admin settings page is planned for future versions for more advanced configurations.

== Screenshots ==

1.  **Selecting Posts**: Shows checkboxes selected next to posts in the WordPress All Posts screen.
    `![Selecting posts in the WordPress post list](assets/screenshot-1.png)`
2.  **Bulk Action Dropdown**: Highlights the "Bulk Schedule" option in the bulk actions dropdown menu.
    `![Selecting 'Bulk Schedule' from bulk actions dropdown](assets/screenshot-2.png)`
3.  **Scheduling Modal**: The popup modal where users set the start date, time, and interval for scheduling.
    `![The scheduling modal with options](assets/screenshot-3.png)`
4.  **Posts Rescheduled**: The All Posts screen showing updated "Scheduled" dates for the posts.
    `![Posts with updated scheduled dates](assets/screenshot-4.png)`
5.  **WPAutoBlog Use Case**: (Optional) A visual representing fixing a WPAutoBlog mass publish scenario.
    `![Fixing WPAutoBlog bulk publish issue](assets/screenshot-5.png)`

*(Note: Actual screenshot file names in the `assets` directory of the plugin on WordPress.org should be `screenshot-1.png`, `screenshot-2.png`, etc. The descriptions above are for the `readme.txt`.)*

== Changelog ==

= 1.0.0 (2025-07-05) =
*   Initial release of Bulk Post Scheduler.
*   Feature: Bulk schedule posts from any status (published, draft, scheduled, pending).
*   Feature: Smart interval spacing options: 1, 3, or 7 days apart.
*   Feature: Integration with WordPress bulk actions dropdown.
*   Feature: Simple modal interface for scheduling options.
*   Feature: Admin management page for plugin settings (placeholder for future settings).
*   Feature: Specifically designed to assist WPAutoBlog users.
*   Security: Nonce verification for actions and capability checks.

== Upgrade Notice ==

= 1.0.0 =
Initial release. No upgrade notice needed. We recommend backing up your site before installing any new plugin.

== WPAutoBlog Integration ==

A common issue for **WPAutoBlog** users is accidentally publishing a large number of posts at once. Bulk Post Scheduler provides a simple fix:

1.  **Problem**: Your WPAutoBlog campaign just published 50 posts instantly.
2.  **Solution**:
    *   Go to **Posts > All Posts**.
    *   Select all the recently published posts.
    *   Choose **"Bulk Schedule"** from the bulk actions dropdown and click **"Apply"**.
    *   In the modal, set a start date and choose an interval (e.g., "Every 1 day").
    *   Click **"Schedule Posts"**. The plugin will automatically space out your posts.

**Recommended WPAutoBlog Workflow**:
*   Set WPAutoBlog to import posts as **Drafts**.
*   Review the drafts.
*   Use Bulk Post Scheduler to schedule the approved drafts for publication at regular intervals.

This gives you better control over your automated content and ensures a steady, natural posting schedule.
