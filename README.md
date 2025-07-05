# Bulk Post Scheduler 🗓️

**WordPress plugin for bulk scheduling posts at regular intervals.**

[![WordPress 5.0+](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)](https://wordpress.org/download/)
[![PHP 7.4+](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/releases/7_4_0.php)
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![Repository Topics: wordpress, plugin, scheduling, wpautoblog, bulk-actions, content-management](https://img.shields.io/badge/Topics-WordPress%2C%20Scheduling%2C%20WPAutoBlog-brightgreen)](https://github.com/topics/wordpress)

Bulk Post Scheduler is a powerful WordPress plugin designed to help you efficiently manage and schedule your posts in bulk. It's particularly useful for users of WPAutoBlog who might accidentally publish numerous posts simultaneously and need a quick way to reschedule them with consistent intervals. Save time, maintain a regular posting schedule, and keep your content calendar organized!

## 🎯 Target Audience

*   **WPAutoBlog Users**: Specifically designed to fix bulk publishing mistakes and streamline content workflows.
*   **Content Managers**: Easily manage posts from multiple authors and maintain a consistent schedule.
*   **Bloggers**: Keep your blog active with a steady flow of content without manual scheduling.
*   **SEO Professionals**: Optimize content timing for better search engine performance.

## ✨ Features

*   **Bulk Schedule Any Post Status**: Reschedule posts that are already `published`, or schedule `draft`, `pending`, or currently `scheduled` posts.
*   **Smart Interval Spacing**: Choose to space your posts 1, 3, or 7 days apart, ensuring a natural and consistent publishing rhythm.
*   **WordPress Bulk Actions Integration**: Seamlessly integrated into the WordPress posts list table bulk actions for intuitive use.
*   **Perfect for WPAutoBlog Workflows**: Specifically built to address the common issue of accidental bulk publishing from WPAutoBlog.
*   **Simple Modal Interface**: An easy-to-use modal pops up for scheduling options when you trigger the bulk action.
*   **Admin Management Page**: A dedicated page for plugin settings and information (future enhancements planned).
*   **Lightweight & Performant**: Designed to be efficient and not bog down your WordPress admin.
*   **Secure**: Utilizes nonce verification and capability checks to ensure secure operations.

## 🤔 Use Cases

*   **Fix WPAutoBlog Bulk Publishing Mistakes**: Accidentally published 50 posts at once using WPAutoBlog? No problem! Select them all, choose "Bulk Schedule," set your interval, and the plugin will spread them out automatically.
*   **Strategic Content Planning**: Plan your content calendar weeks or months in advance by bulk scheduling drafts.
*   **Reschedule Existing Content**: Need to adjust your current publishing schedule? Easily re-distribute already scheduled or published posts.
*   **Consistent Social Media Flow**: Ensure a steady stream of new content for your social media channels by maintaining a regular blog posting schedule.

## ⚙️ Installation

You can install Bulk Post Scheduler via one of three methods:

### 1. WordPress Admin Dashboard
   1. Navigate to **Plugins > Add New** in your WordPress admin area.
   2. Search for "Bulk Post Scheduler".
   3. Click **Install Now** and then **Activate**.

### 2. Manual Upload via WordPress Admin
   1. Download the latest plugin `.zip` file from the [WordPress.org Plugin Directory](https://wordpress.org/plugins/bulk-post-scheduler/) (once available) or from this repository's [Releases page](https://github.com/your-username/bulk-post-scheduler/releases).
   2. Go to **Plugins > Add New** in your WordPress admin.
   3. Click **Upload Plugin** at the top.
   4. Choose the downloaded `.zip` file and click **Install Now**.
   5. **Activate** the plugin.

### 3. Manual Installation via FTP/SFTP
   1. Download the latest plugin `.zip` file as described above.
   2. Unzip the file. You should see a folder named `bulk-post-scheduler`.
   3. Upload this `bulk-post-scheduler` folder to the `wp-content/plugins/` directory on your server using an FTP/SFTP client.
   4. Go to **Plugins** in your WordPress admin and **Activate** Bulk Post Scheduler.

## 🚀 Usage

Using Bulk Post Scheduler is straightforward:

1.  **Navigate to Posts**: Go to **Posts > All Posts** in your WordPress admin.
2.  **Select Posts**: Check the boxes next to the posts you want to reschedule or schedule. You can select posts with any status (published, draft, scheduled, etc.).
    *   *![Screenshot of selecting posts in the WordPress post list](screenshots/screenshot-1.png)*
3.  **Choose Bulk Action**: From the "Bulk actions" dropdown menu at the top (or bottom) of the list, select **"Bulk Schedule"**.
    *   *![Screenshot of selecting 'Bulk Schedule' from bulk actions dropdown](screenshots/screenshot-2.png)*
4.  **Apply Action**: Click the **Apply** button next to the dropdown.
5.  **Configure Scheduling**: A modal window will appear. Here you can configure:
    *   **Start Date & Time**: The date and time for the first post in the selected batch to be published.
    *   **Interval**: How far apart each subsequent post should be scheduled (e.g., 1 day, 3 days, 7 days).
    *   **Stagger First Post**: Optionally, you can set the first post to publish immediately or after a short delay, with subsequent posts following the chosen interval. (This is a potential feature, confirm if implemented)
    *   *![Screenshot of the scheduling modal with options](screenshots/screenshot-3.png)*
6.  **Confirm Scheduling**: Click **"Schedule Posts"**. The plugin will then update the publication dates for all selected posts according to your settings.
7.  **Review**: The posts will now have their new scheduled dates. You can see these reflected in the "Date" column in the posts list.
    *   *![Screenshot showing posts with updated scheduled dates](screenshots/screenshot-4.png)*

## 🤖 WPAutoBlog Integration Workflow

Bulk Post Scheduler is a lifesaver for WPAutoBlog users. Here’s how to best use it:

### The Problem: Accidental Mass Publication
Many WPAutoBlog users configure their campaigns to import posts, but sometimes settings might lead to dozens or even hundreds of posts being published instantly. This floods your site, annoys subscribers, and looks unnatural to search engines.

### The Solution: Quick Rescheduling
1.  **Identify**: Go to **Posts > All Posts**. You'll see a flood of recently published posts.
2.  **Select**: Select all the posts that were accidentally published. Use the screen options to display more posts per page if needed.
3.  **Bulk Schedule**: Choose "Bulk Schedule" from the bulk actions, click "Apply".
4.  **Set Details**: In the modal:
    *   Set the **Start Date & Time** for the first post (e.g., today, or tomorrow).
    *   Choose a **Scheduling Interval** (e.g., "Every 1 day" or "Every 3 days") to space them out.
5.  **Confirm**: Click "Schedule Posts". Done! Your posts are now neatly scheduled.

### Recommended WPAutoBlog Workflow
To prevent issues and leverage Bulk Post Scheduler effectively:

1.  **WPAutoBlog to Drafts**: Configure your WPAutoBlog campaigns to import posts as `Drafts` instead of publishing them immediately.
2.  **Review Content**: Periodically review the imported drafts. Edit, approve, or delete them as necessary.
3.  **Bulk Schedule Approved Drafts**: Once you have a batch of approved drafts:
    *   Go to **Posts > All Posts**.
    *   Filter by `Drafts` or select your approved drafts.
    *   Use the **Bulk Schedule** action to set up a consistent publishing schedule.

This workflow gives you full control over your automated content, ensuring quality and a natural posting rhythm.

## 📋 Requirements

*   **WordPress**: Version 5.0 or higher.
*   **PHP**: Version 7.4 or higher.
*   **User Role**: Administrator access to install and use the plugin.

## 🛡️ Security

We take security seriously. Bulk Post Scheduler includes the following measures:

*   **Nonce Verification**: All actions performed by the plugin (like submitting the scheduling form) are protected by WordPress nonces to prevent CSRF attacks.
*   **Permission Checks**: The plugin checks if the current user has the appropriate capabilities (`manage_options` or specific custom capabilities if defined) before allowing access to its settings or performing scheduling actions.
*   **Data Sanitization & Validation**: Input data is sanitized and validated where appropriate to prevent XSS and other injection attacks. (Standard practice, ensure this is implemented)
*   **Escaping Output**: All data output to the screen is properly escaped to prevent XSS vulnerabilities. (Standard practice, ensure this is implemented)

If you discover any security vulnerabilities, please report them responsibly. See our `SECURITY.md` (to be created) for more details.

## 🤝 Contributing

Contributions are welcome! Whether it's bug reports, feature suggestions, or code contributions, we appreciate your help in making Bulk Post Scheduler better.

Please follow standard GitHub contribution guidelines:
1.  **Fork** the repository.
2.  Create a new **branch** for your feature or bug fix (`git checkout -b feature/your-feature-name` or `bugfix/issue-number`).
3.  **Commit** your changes (`git commit -am 'Add some feature'`).
4.  **Push** to the branch (`git push origin feature/your-feature-name`).
5.  Create a new **Pull Request**.

Please ensure your code adheres to WordPress coding standards and includes appropriate documentation.

## 📜 Changelog

For a detailed list of changes, please see the [CHANGELOG.md](CHANGELOG.md) file.

## 📄 License

This plugin is licensed under the **GPL v2 (or later)**. See the [LICENSE](LICENSE) file for more details.
© 2024 Bulk Post Scheduler Contributors

## 💬 Support

*   **Documentation**: For detailed guides, visit our [Plugin Documentation Page](https://example.com/bulk-post-scheduler-docs) (placeholder link).
*   **Issue Tracker**: Found a bug? Report it on our [GitHub Issues](https://github.com/your-username/bulk-post-scheduler/issues) page.
*   **WordPress.org Forum**: Ask questions and find solutions on the [Bulk Post Scheduler Support Forum](https://wordpress.org/support/plugin/bulk-post-scheduler/) (once the plugin is live on WordPress.org).

---

Thank you for using Bulk Post Scheduler! We hope it makes your content management tasks easier and more efficient.
If you find this plugin helpful, please consider leaving a review on WordPress.org! ⭐⭐⭐⭐⭐
