<?php
/**
 * Recruitment System: Settings, CPTs, and Logic
 */

// ==========================================================================
// 1. REGISTER POST TYPES & TAXONOMIES
// ==========================================================================
function np_recruit_register_types() {
    
    // 1.1 Taxonomy: Bộ phận (Phòng ban) - Linked to 'np_job'
    register_taxonomy('np_department', ['np_job'], [
        'labels' => [
            'name' => 'Bộ phận / Phòng ban',
            'singular_name' => 'Bộ phận',
            'add_new_item' => 'Thêm Bộ phận mới',
            'edit_item' => 'Sửa Bộ phận'
        ],
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
    ]);

    // 1.2 CPT: Vị trí Tuyển dụng (Jobs)
    register_post_type('np_job', [
        'labels' => [
            'name' => 'Vị trí Tuyển dụng',
            'singular_name' => 'Vị trí',
            'add_new' => 'Thêm Vị trí mới',
            'add_new_item' => 'Thêm Vị trí mới',
            'edit_item' => 'Sửa Vị trí',
            'new_item' => 'Vị trí mới',
            'view_item' => 'Xem Vị trí',
            'search_items' => 'Tìm kiếm Vị trí',
        ],
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-id-alt',
        'supports' => ['title', 'editor'], // Title = Job Name, Editor = Desc
        'show_in_menu' => false, // Will attach to main menu manually
        'has_archive' => false,
    ]);

    // 1.3 CPT: Hồ sơ Ứng tuyển (Candidates)
    register_post_type('np_candidate', [
        'labels' => [
            'name' => 'Hồ sơ Ứng tuyển',
            'singular_name' => 'Hồ sơ',
            'search_items' => 'Tìm kiếm hồ sơ',
            'not_found' => 'Không có hồ sơ nào',
        ],
        'public' => false,  // Internal only
        'show_ui' => true,
        'show_in_menu' => false, // Will attach manually
        'map_meta_cap' => true,
        'capabilities' => [
            'create_posts' => 'do_not_allow', // Users can't create manually via button (usually), handled via form
        ],
        'supports' => ['title'], // Title = Candidate Name
        'menu_icon' => 'dashicons-groups',
    ]);
}
add_action('init', 'np_recruit_register_types');


// ==========================================================================
// 2. ADMIN MENU STRUCTURE
// ==========================================================================
function np_recruitment_menu() {
    // 2.1 Main Menu Wrapper: "Tuyển dụng" -> Points to Job List
    add_menu_page(
        'Tuyển dụng', 
        'Tuyển dụng', 
        'manage_options', 
        'edit.php?post_type=np_candidate', 
        '', 
        'dashicons-businessman', 
        25
    );

    // 2.2 Submenu: Hồ sơ Ứng tuyển (Default)
    add_submenu_page(
        'edit.php?post_type=np_candidate',
        'Danh sách Hồ sơ',
        'D.sách Hồ sơ',
        'manage_options',
        'edit.php?post_type=np_candidate'
    );

    // 2.3 Submenu: Vị trí Tuyển dụng
    add_submenu_page(
        'edit.php?post_type=np_candidate',
        'Vị trí Tuyển dụng',
        'Vị trí Tuyển dụng',
        'manage_options',
        'edit.php?post_type=np_job'
    );

    // 2.4 Submenu: Danh mục Bộ phận (Taxonomy)
    add_submenu_page(
        'edit.php?post_type=np_candidate',
        'Quản lý Bộ phận',
        'Bộ phận / Phòng ban',
        'manage_options',
        'edit-tags.php?taxonomy=np_department&post_type=np_job'
    );

    // 2.5 Submenu: Cấu hình Email (Settings Page)
    add_submenu_page(
        'edit.php?post_type=np_candidate',
        'Cấu hình & Email',
        'Cấu hình & Email',
        'manage_options',
        'np-recruitment-settings', // Slug defined before
        'np_recruitment_settings_page' // Callback
    );
}
add_action('admin_menu', 'np_recruitment_menu');


// ==========================================================================
// 3. META BOXES (Job Details & Candidate Info)
// ==========================================================================

// Helper: Status Definitions
function np_get_recruit_statuses() {
    return [
        'new'       => ['label' => 'Mới nhận', 'color' => '#3c434a', 'bg' => '#f0f0f1'],
        'contacted' => ['label' => 'Đã liên hệ', 'color' => '#0073aa', 'bg' => '#dbeafe'],
        'test'      => ['label' => 'Đang làm bài test', 'color' => '#8224e3', 'bg' => '#f3e8ff'],
        'interview' => ['label' => 'Đã phỏng vấn', 'color' => '#b45309', 'bg' => '#fffbeb'],
        'offer'     => ['label' => 'Đã gửi Offer', 'color' => '#0284c7', 'bg' => '#e0f2fe'], 
        'hired'     => ['label' => 'Đã đi làm', 'color' => '#15803d', 'bg' => '#dcfce7'],
        'rejected'  => ['label' => 'Loại / Không đạt', 'color' => '#b91c1c', 'bg' => '#fee2e2'],
        'saved'     => ['label' => 'Lưu hồ sơ', 'color' => '#4b5563', 'bg' => '#f3f4f6'],
    ];
}

// 3.1 Register Meta Boxes
function np_recruit_add_meta_boxes() {
    // For Job
    add_meta_box('np_job_details', 'Thông tin Vị trí', 'np_job_details_callback', 'np_job', 'normal', 'high');
    
    // For Candidate
    add_meta_box('np_candidate_info', 'Thông tin Ứng viên', 'np_candidate_info_callback', 'np_candidate', 'normal', 'high');
}
add_action('add_meta_boxes', 'np_recruit_add_meta_boxes');

// 3.2 Callback: Job Details
function np_job_details_callback($post) {
    $salary = get_post_meta($post->ID, '_np_job_salary', true);
    $location = get_post_meta($post->ID, '_np_job_location', true);
    $type = get_post_meta($post->ID, '_np_job_type', true);
    $is_hot = get_post_meta($post->ID, '_np_job_hot', true);
    ?>
    <p>
        <label for="np_job_salary" style="width:100px; display:inline-block;"><b>Mức lương:</b></label>
        <input type="text" name="np_job_salary" id="np_job_salary" value="<?php echo esc_attr($salary); ?>" style="width:100%; max-width:300px;" placeholder="Ví dụ: Thỏa thuận" />
    </p>
    <p>
        <label for="np_job_location" style="width:100px; display:inline-block;"><b>Địa điểm:</b></label>
        <input type="text" name="np_job_location" id="np_job_location" value="<?php echo esc_attr($location); ?>" style="width:100%; max-width:300px;" placeholder="Ví dụ: Hà Nội" />
    </p>
    <p>
        <label for="np_job_type" style="width:100px; display:inline-block;"><b>Hình thức:</b></label>
        <select name="np_job_type" id="np_job_type" style="width:100%; max-width:300px;">
            <option value="Toàn thời gian" <?php selected($type, 'Toàn thời gian'); ?>>Toàn thời gian</option>
            <option value="Bán thời gian" <?php selected($type, 'Bán thời gian'); ?>>Bán thời gian</option>
            <option value="Thực tập" <?php selected($type, 'Thực tập'); ?>>Thực tập</option>
            <option value="Freelance" <?php selected($type, 'Freelance'); ?>>Freelance</option>
        </select>
    </p>
    <p>
        <label style="width:100px; display:inline-block;"><b>Trang chi tiết:</b></label>
        <?php
        $custom_page = get_post_meta($post->ID, '_np_job_custom_page', true);
        wp_dropdown_pages([
            'name' => 'np_job_custom_page',
            'selected' => $custom_page,
            'show_option_none' => '-- Mặc định (/tuyen-dung) --',
            'option_none_value' => '',
            'class' => 'regular-text',
            'style' => 'width:100%; max-width:300px;'
        ]);
        ?>
        <br><small style="margin-left:105px; color:#666;">Chọn trang Landing Page riêng cho vị trí này (nếu có).</small>
    </p>
    <p>
        <label style="width:100px; display:inline-block;"><b>Nổi bật:</b></label>
        <label><input type="checkbox" name="np_job_hot" value="1" <?php checked($is_hot, '1'); ?> /> Vị trí HOT / Gấp</label>
    </p>
    <?php
}

// --- AJAX PROXY FOR WARDS (Bypass CORS) ---
add_action('wp_ajax_np_get_wards', 'np_get_wards_proxy');
add_action('wp_ajax_nopriv_np_get_wards', 'np_get_wards_proxy');

function np_get_wards_proxy() {
    $province_code = isset($_GET['province_code']) ? sanitize_text_field($_GET['province_code']) : '';
    
    if (!$province_code) {
        wp_send_json_error(['message' => 'Missing province code']);
    }

    // Endpoint Update: /w/search/ is 422. /p/{code}?depth=2 returns wards in some versions.
    $api_url = "https://provinces.open-api.vn/api/v2/p/" . $province_code . "?depth=2";
    
    $response = wp_remote_get($api_url, [
        'timeout' => 15,
        'headers' => [
            'Accept' => 'application/json'
        ]
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'API Connection Error']);
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (json_last_error() !== JSON_ERROR_NONE) {
        wp_send_json_error(['message' => 'Invalid JSON from API']);
    }
    
    $wards = [];
    if (isset($data->wards) && is_array($data->wards)) {
        $wards = $data->wards;
    } elseif (isset($data->districts) && is_array($data->districts)) {
        // Backup: If depth=2 returned districts, we can't get wards deeply.
        // But the user insisted on a flat list. 
        // If we are here, something is odd. We return empty or districts?
        // Let's return empty to avoid confusion.
    }
    
    wp_send_json_success($wards);
}
// 3.3 Callback: Candidate Info
function np_candidate_info_callback($post) {
    $email = get_post_meta($post->ID, '_np_candidate_email', true);
    $phone = get_post_meta($post->ID, '_np_candidate_phone', true);
    $cv_url = get_post_meta($post->ID, '_np_candidate_cv', true);
    $job_id = get_post_meta($post->ID, '_np_candidate_job_id', true);
    $address = get_post_meta($post->ID, '_np_candidate_address', true);
    $message = get_post_meta($post->ID, '_np_candidate_message', true);
    $status = get_post_meta($post->ID, '_np_candidate_status', true);
    if(!$status) $status = 'new';
    $statuses = np_get_recruit_statuses();
    
    $job_title = $job_id ? get_the_title($job_id) : 'N/A';
    ?>
    <table class="form-table">
        <tr style="background: #f0f0f1;">
            <th>Trạng thái:</th>
            <td>
                <?php $current_st = isset($statuses[$status]) ? $statuses[$status] : $statuses['new']; ?>
                <select name="np_candidate_status" style="width: 200px; font-weight:bold; color: <?php echo $current_st['color']; ?>;">
                    <?php foreach ($statuses as $key => $info): ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php selected($status, $key); ?> data-color="<?php echo $info['color']; ?>">
                            <?php echo esc_html($info['label']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <script>
                    jQuery('select[name="np_candidate_status"]').change(function() {
                        var color = jQuery(this).find(':selected').data('color');
                        jQuery(this).css('color', color);
                    });
                </script>
            </td>
        </tr>
        <tr>
            <th>Ứng tuyển vị trí:</th>
            <td>
                <?php if ($job_id): ?>
                    <a href="<?php echo get_edit_post_link($job_id); ?>" target="_blank"><b><?php echo esc_html($job_title); ?></b></a>
                <?php else: ?>
                    <span style="color:red;">Ứng tuyển tự do</span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></td>
        </tr>
        <tr>
            <th>Số điện thoại:</th>
            <td><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></td>
        </tr>
        <tr>
            <th>Địa chỉ:</th>
            <td><?php echo esc_html($address); ?></td>
        </tr>
        <tr>
            <th>Link CV:</th>
            <td>
                <?php if ($cv_url): ?>
                    <a href="<?php echo esc_url($cv_url); ?>" target="_blank" class="button button-primary">Xem CV</a>
                    <br><small style="color:#666;"><?php echo esc_url($cv_url); ?></small>
                <?php else: ?>
                    Chưa có link
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Lời nhắn / Documents:</th>
            <td>
                <div style="background:#f9f9f9; padding:10px; border:1px solid #ddd; border-radius:4px; max-width:600px;">
                    <?php echo nl2br(esc_html($message)); ?>
                </div>
            </td>
        </tr>
    </table>
    <?php
}

// 3.4 Save Meta Data
function np_recruit_save_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    // Save Job Meta
    if (isset($_POST['np_job_salary'])) update_post_meta($post_id, '_np_job_salary', sanitize_text_field($_POST['np_job_salary']));
    if (isset($_POST['np_job_location'])) update_post_meta($post_id, '_np_job_location', sanitize_text_field($_POST['np_job_location']));
    if (isset($_POST['np_job_type'])) update_post_meta($post_id, '_np_job_type', sanitize_text_field($_POST['np_job_type']));
    if (isset($_POST['np_job_custom_page'])) update_post_meta($post_id, '_np_job_custom_page', sanitize_text_field($_POST['np_job_custom_page']));
    
    // Save Candidate Status
    if (isset($_POST['np_candidate_status'])) update_post_meta($post_id, '_np_candidate_status', sanitize_text_field($_POST['np_candidate_status']));

    // Checkbox handling
    $is_hot = isset($_POST['np_job_hot']) ? '1' : '0';
    // Only update if it's the correct post type to avoid overwriting on bulk edit sometimes or wrong page
    if (get_post_type($post_id) === 'np_job') {
        update_post_meta($post_id, '_np_job_hot', $is_hot);
    }
}
add_action('save_post', 'np_recruit_save_meta');


// ==========================================================================
// 4. ADMIN COLUMNS
// ==========================================================================

// 4.1 Columns for Jobs
add_filter('manage_np_job_posts_columns', function($columns) {
    $new_cols = ['cb' => $columns['cb'], 'title' => $columns['title']];
    $new_cols['job_dept'] = 'Bộ phận';
    $new_cols['job_info'] = 'Thông tin';
    $new_cols['date'] = $columns['date'];
    return $new_cols;
});

add_action('manage_np_job_posts_custom_column', function($column, $post_id) {
    if ($column == 'job_dept') {
        $terms = get_the_term_list($post_id, 'np_department', '', ', ', '');
        echo $terms ? $terms : '—';
    }
    if ($column == 'job_info') {
        echo 'Lương: ' . get_post_meta($post_id, '_np_job_salary', true) . '<br>';
        echo 'Đ.điểm: ' . get_post_meta($post_id, '_np_job_location', true);
    }
}, 10, 2);

// 4.2 Columns for Candidates
add_filter('manage_np_candidate_posts_columns', function($columns) {
    $new_cols = ['cb' => $columns['cb'], 'title' => 'Tên Ứng viên'];
    $new_cols['cand_status'] = 'Trạng thái';
    $new_cols['cand_position'] = 'Vị trí Ứng tuyển';
    $new_cols['cand_contact'] = 'Liên hệ';
    $new_cols['cand_cv'] = 'CV';
    $new_cols['date'] = 'Ngày nộp';
    return $new_cols;
});

add_action('manage_np_candidate_posts_custom_column', function($column, $post_id) {
    if ($column == 'cand_status') {
        $status = get_post_meta($post_id, '_np_candidate_status', true);
        if(!$status) $status = 'new';
        $statuses = np_get_recruit_statuses();
        $info = isset($statuses[$status]) ? $statuses[$status] : $statuses['new'];
        
        echo '<span style="
            display:inline-block; 
            padding: 4px 10px; 
            border-radius: 4px; 
            font-size: 11px; 
            font-weight: 700; 
            color: '.$info['color'].'; 
            background: '.$info['bg'].';
            border: 1px solid '.$info['color'].'20;
        ">'.esc_html($info['label']).'</span>';
    }
    if ($column == 'cand_position') {
        $job_id = get_post_meta($post_id, '_np_candidate_job_id', true);
        
        if ($job_id == 9999) {
             echo '<b>Design Intern</b> <span style="color:#888; font-size:11px;">(Trang Landing)</span>';
        } elseif ($job_id) {
            $title = get_the_title($job_id);
            if ($title) {
                 echo '<b>' . esc_html($title) . '</b>';
                 $job_dept = wp_get_post_terms($job_id, 'np_department');
                 if (!empty($job_dept) && !is_wp_error($job_dept)) {
                     echo '<br><small>(' . esc_html($job_dept[0]->name) . ')</small>';
                 }
            } else {
                 echo '<span style="color:red;">ID: ' . esc_html($job_id) . ' (Đã xóa)</span>';
            }
        } else {
             echo '<span style="color:orange;">Ứng tuyển tự do</span>';
        }
    }
    if ($column == 'cand_contact') {
        echo '<a href="mailto:'.get_post_meta($post_id, '_np_candidate_email', true).'">'.get_post_meta($post_id, '_np_candidate_email', true).'</a><br>';
        echo get_post_meta($post_id, '_np_candidate_phone', true);
        
        // Add View Button
        echo '<br><button class="button button-small quick-view-candidate" data-id="' . $post_id . '" style="margin-top:5px; border-color:#54b259; color:#54b259;">★ Xem nhanh hồ sơ</button>';
    }
    if ($column == 'cand_cv') {
        $cv = get_post_meta($post_id, '_np_candidate_cv', true);
        echo $cv ? '<a href="'.$cv.'" target="_blank" class="button button-small">Xem CV</a>' : '—';
    }
}, 10, 2);

// Filter Candidates by Job (Dropdown)
add_action('restrict_manage_posts', function() {
    global $typenow;
    if ($typenow == 'np_candidate') {
        $jobs = get_posts(['post_type' => 'np_job', 'numberposts' => -1]);
        $current_job = isset($_GET['filter_job']) ? $_GET['filter_job'] : '';
        echo '<select name="filter_job">';
        echo '<option value="">-- Tất cả vị trí --</option>';
        foreach ($jobs as $job) {
            $selected = ($current_job == $job->ID) ? 'selected' : '';
            echo '<option value="'.$job->ID.'" '.$selected.'>'.$job->post_title.'</option>';
        }
        echo '</select>';
    }
});

add_filter('parse_query', function($query) {
    global $pagenow;
    if ($pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'np_candidate' && isset($_GET['filter_job']) && $_GET['filter_job'] != '') {
        $query->query_vars['meta_key'] = '_np_candidate_job_id';
        $query->query_vars['meta_value'] = $_GET['filter_job'];
    }
});


// ==========================================================================
// 5. SETTINGS PAGE (Re-integrated from previous step)
// ==========================================================================

// Register Settings
function np_recruitment_register_settings() {
    // Section: Email Configuration (SMTP/Receiver)
    register_setting('np_recruitment_options', 'np_recruit_receiver_email');
    register_setting('np_recruitment_options', 'np_recruit_smtp_host');
    register_setting('np_recruitment_options', 'np_recruit_smtp_port');
    register_setting('np_recruitment_options', 'np_recruit_smtp_user');
    register_setting('np_recruitment_options', 'np_recruit_smtp_pass');
    register_setting('np_recruitment_options', 'np_recruit_smtp_secure');

    // Section: Email Templates
    register_setting('np_recruitment_options', 'np_recruit_confirm_subject');
    register_setting('np_recruitment_options', 'np_recruit_confirm_template'); 
    
    register_setting('np_recruitment_options', 'np_recruit_admin_subject');
    register_setting('np_recruitment_options', 'np_recruit_admin_template');
}
add_action('admin_init', 'np_recruitment_register_settings');

// Admin Settings Page Callback
function np_recruitment_settings_page() {
    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general';
    ?>
    <div class="wrap">
        <h1>Cấu hình Tuyển Dụng & Email</h1>
        
        <h2 class="nav-tab-wrapper">
            <a href="?page=np-recruitment-settings&tab=general" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>">Cấu hình Chung (SMTP)</a>
            <a href="?page=np-recruitment-settings&tab=candidate" class="nav-tab <?php echo $active_tab == 'candidate' ? 'nav-tab-active' : ''; ?>">Email Gửi Ứng Viên</a>
            <a href="?page=np-recruitment-settings&tab=admin" class="nav-tab <?php echo $active_tab == 'admin' ? 'nav-tab-active' : ''; ?>">Email Báo Admin</a>
        </h2>
        
        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php 
            settings_fields('np_recruitment_options'); 
            
            if ($active_tab == 'general') {
            ?>
                <!-- TAB 1: GENERAL & SMTP -->
                <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; margin-top: 20px;">
                    <h2>1. Cấu hình Email Nhận Hồ Sơ / SMTP</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Email Nhận CV</th>
                            <td>
                                <input type="email" name="np_recruit_receiver_email" value="<?php echo esc_attr(get_option('np_recruit_receiver_email')); ?>" class="regular-text" placeholder="hr@npfood.vn" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">SMTP Host</th>
                            <td>
                                <input type="text" name="np_recruit_smtp_host" value="<?php echo esc_attr(get_option('np_recruit_smtp_host')); ?>" class="regular-text" placeholder="smtp.gmail.com" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">SMTP Port</th>
                            <td>
                                <input type="text" name="np_recruit_smtp_port" value="<?php echo esc_attr(get_option('np_recruit_smtp_port')); ?>" class="regular-text" placeholder="587" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">SMTP Username</th>
                            <td>
                                <input type="text" name="np_recruit_smtp_user" value="<?php echo esc_attr(get_option('np_recruit_smtp_user')); ?>" class="regular-text" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">SMTP Password</th>
                            <td>
                                <input type="password" name="np_recruit_smtp_pass" value="<?php echo esc_attr(get_option('np_recruit_smtp_pass')); ?>" class="regular-text" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">SMTP Secure</th>
                            <td>
                                <select name="np_recruit_smtp_secure">
                                    <option value="tls" <?php selected(get_option('np_recruit_smtp_secure'), 'tls'); ?>>TLS</option>
                                    <option value="ssl" <?php selected(get_option('np_recruit_smtp_secure'), 'ssl'); ?>>SSL</option>
                                    <option value="none" <?php selected(get_option('np_recruit_smtp_secure'), 'none'); ?>>Không (None)</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- IMPORT DEMO DATA -->
                <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; margin-top: 20px;">
                    <h2>Import Dữ liệu Mẫu</h2>
                    <p>Nếu bạn chưa có dữ liệu, nhấn nút dưới đây để tạo tự động các Bộ phận và Vị trí tuyển dụng mẫu (như trên thiết kế).</p>
                    <a href="<?php echo admin_url('admin.php?page=np-recruitment-settings&import_demo=1'); ?>" class="button button-secondary" onclick="return confirm('Bạn có chắc chắn muốn tạo dữ liệu mẫu không?');">Tạo Dữ liệu Mẫu</a>
                </div>

            <?php 
            } elseif ($active_tab == 'candidate') {
            ?>
                <!-- TAB 2: CANDIDATE INFO -->
                <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; margin-top: 20px;">
                    <h2>2. Cấu hình Mẫu Email Gửi Ứng Viên</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Tiêu đề Email</th>
                            <td>
                                <input type="text" name="np_recruit_confirm_subject" value="<?php echo esc_attr(get_option('np_recruit_confirm_subject', 'Xác nhận ứng tuyển - NP FOOD')); ?>" class="large-text" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Nội dung Email</th>
                            <td>
                                <?php
                                $content = get_option('np_recruit_confirm_template', "Chào {name},\n\nCảm ơn bạn đã quan tâm đến cơ hội nghề nghiệp tại NP FOOD.\nChúng tôi đã nhận được hồ sơ ứng tuyển của bạn cho vị trí: {job_title}.\n\nBộ phận tuyển dụng sẽ xem xét hồ sơ và liên hệ với bạn sớm nhất.\n\nTrân trọng,\nBỘ PHẬN TUYỂN DỤNG");
                                wp_editor($content, 'np_recruit_confirm_template', array('textarea_rows' => 10, 'media_buttons' => false));
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>

            <?php 
            } elseif ($active_tab == 'admin') {
            ?>
                <!-- TAB 3: ADMIN NOTIFICATION -->
                <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; margin-top: 20px;">
                    <h2>3. Cấu hình Mẫu Email Thông Báo Admin</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Tiêu đề Notification</th>
                            <td>
                                <input type="text" name="np_recruit_admin_subject" value="<?php echo esc_attr(get_option('np_recruit_admin_subject', '[Ứng Tuyển Mới] - {job_title} - {name}')); ?>" class="large-text" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Nội dung Notification</th>
                            <td>
                                <?php
                                $admin_content = get_option('np_recruit_admin_template', "Có ứng viên mới nộp hồ sơ:\n\n- Họ tên: {name}\n- Vị trí: {job_title}\n- Email: {email}\n- SĐT: {phone}\n\nLink CV: {cv_link}\n\nVui lòng kiểm tra.");
                                wp_editor($admin_content, 'np_recruit_admin_template', array('textarea_rows' => 10, 'media_buttons' => false));
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php 
            } 
            ?>

            <?php submit_button('Lưu Cấu Hình'); ?>
        </form>
    </div>
    <?php
}

// 6. PROCESS DEMO DATA IMPORT
function np_process_demo_import() {
    if (isset($_GET['page']) && $_GET['page'] == 'np-recruitment-settings' && isset($_GET['import_demo']) && $_GET['import_demo'] == '1') {
        
        // Check permissions (optional but good)
        if (!current_user_can('manage_options')) return;

        // 1. Create Departments (Taxonomy)
        $departments = [
            'sales' => 'Kinh Doanh',
            'marketing' => 'Marketing',
            'cs' => 'CSKH',
            'tech' => 'Kỹ Thuật',
            'logistics' => 'Kho Vận',
            'finance' => 'Tài Chính'
        ];
        
        $term_ids = [];
        foreach ($departments as $slug => $name) {
            if (!term_exists($name, 'np_department')) {
                $term = wp_insert_term($name, 'np_department', ['slug' => $slug]);
                if (!is_wp_error($term)) {
                    $term_ids[$slug] = $term['term_id'];
                }
            } else {
                $term = get_term_by('slug', $slug, 'np_department');
                $term_ids[$slug] = $term->term_id;
            }
        }

        // 2. Create Jobs (CPT)
        $jobs = [
            // SALES
            ['title' => "Giám Đốc Kinh Doanh Miền Bắc", 'dept' => 'sales', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Xây dựng chiến lược kinh doanh và phát triển mạng lưới phân phối kênh GT/MT.", 'type' => "Toàn thời gian"],
            ['title' => "Chuyên Viên Kinh Doanh B2B", 'dept' => 'sales', 'loc' => "Hà Nội / TP.HCM", 'sal' => "Thỏa thuận", 'desc' => "Tìm kiếm và duy trì mối quan hệ với các đối tác chuỗi cửa hàng mẹ bé, siêu thị.", 'type' => "Toàn thời gian"],
            ['title' => "Sales Admin (Admin Kinh Doanh)", 'dept' => 'sales', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ thủ tục giấy tờ, hợp đồng và theo dõi đơn hàng cho đội ngũ Sales.", 'type' => "Toàn thời gian"],
            ['title' => "Thực Tập Sinh Kinh Doanh", 'dept' => 'sales', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ team kinh doanh tìm kiếm khách hàng tiềm năng và học hỏi quy trình sales B2B.", 'type' => "Thực tập", 'hot' => '1'],
            
            // MARKETING
            ['title' => "Chuyên Viên Marketing Online", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Quản lý các chiến dịch quảng cáo trên mạng xã hội.", 'type' => "Toàn thời gian"],
            ['title' => "Chuyên Viên SEO/SEM", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Tối ưu hóa nội dung để tăng cường khả năng hiển thị trên các công cụ tìm kiếm.", 'type' => "Toàn thời gian"],
            ['title' => "Chuyên Viên Nội Dung", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Tạo nội dung hấp dẫn cho website và các kênh truyền thông xã hội.", 'type' => "Toàn thời gian"],
            ['title' => "Editor", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Chỉnh sửa và biên tập nội dung để đảm bảo chất lượng.", 'type' => "Toàn thời gian"],
            ['title' => "Designer", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Thiết kế hình ảnh và đồ họa cho các chiến dịch marketing.", 'type' => "Toàn thời gian"],
            ['title' => "Quay Phim và Chụp Ảnh", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Sản xuất nội dung hình ảnh và video cho sản phẩm.", 'type' => "Toàn thời gian"],
            ['title' => "Thực Tập Sinh Marketing", 'dept' => 'marketing', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ các công việc chuyên môn của bộ phận Marketing.", 'type' => "Thực tập", 'hot' => '1'],
            
            // CSKH
            ['title' => "Trưởng Bộ Phận Chăm Sóc Khách Hàng", 'dept' => 'cs', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Xây dựng quy trình CSKH, xử lý khiếu nại và nâng cao trải nghiệm khách hàng.", 'type' => "Toàn thời gian"],
            ['title' => "Nhân Viên Tư Vấn Dinh Dưỡng", 'dept' => 'cs', 'loc' => "Online / Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Tư vấn sản phẩm sữa hạt và thực phẩm chức năng qua hotline, fanpage, Zalo OA.", 'type' => "Toàn thời gian"],
            ['title' => "Thực Tập Sinh CSKH", 'dept' => 'cs', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ trả lời tin nhắn khách hàng và tổng hợp phản hồi.", 'type' => "Thực tập", 'hot' => '1'],

            // TECH
            ['title' => "Chuyên Viên QA/QC (Quản Lý Chất Lượng)", 'dept' => 'tech', 'loc' => "Kho Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Kiểm soát chất lượng hàng nhập khẩu, đảm bảo tuân thủ quy định ATVSTP.", 'type' => "Toàn thời gian"],
            ['title' => "IT Support / Quản Trị Hệ Thống", 'dept' => 'tech', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Quản trị hệ thống ERP, hỗ trợ kỹ thuật máy tính văn phòng.", 'type' => "Toàn thời gian"],
            ['title' => "Thực Tập Sinh Kỹ Thuật / QA", 'dept' => 'tech', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ kiểm tra chất lượng sản phẩm và bảo trì hệ thống.", 'type' => "Thực tập", 'hot' => '1'],

            // LOGISTICS
            ['title' => "Quản Lý Kho Vận (Warehouse Manager)", 'dept' => 'logistics', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Quản lý xuất nhập tồn, điều phối đội ngũ giao vận và sắp xếp kho bãi.", 'type' => "Toàn thời gian"],
            ['title' => "Nhân Viên Điều Phối Đơn Hàng", 'dept' => 'logistics', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Xử lý đơn hàng trên hệ thống, làm việc với các đơn vị vận chuyển.", 'type' => "Toàn thời gian"],
            ['title' => "Thực Tập Sinh Kho Vận", 'dept' => 'logistics', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ sắp xếp kho hàng và kiểm kê định kỳ.", 'type' => "Thực tập", 'hot' => '1'],

            // FINANCE
            ['title' => "Kế Toán Trưởng", 'dept' => 'finance', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Quản lý bộ máy kế toán, lập báo cáo tài chính và làm việc với cơ quan thuế.", 'type' => "Toàn thời gian"],
            ['title' => "Kế Toán Kho / Công Nợ", 'dept' => 'finance', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Theo dõi nhập xuất tồn, đối chiếu công nợ với nhà cung cấp và đại lý.", 'type' => "Toàn thời gian"],
            ['title' => "Thực Tập Sinh Kế Toán", 'dept' => 'finance', 'loc' => "Hà Nội", 'sal' => "Thỏa thuận", 'desc' => "Hỗ trợ nhập liệu chứng từ và sắp xếp hồ sơ kế toán.", 'type' => "Thực tập", 'hot' => '1'],
        ];

        foreach ($jobs as $job) {
            $exists = get_page_by_title($job['title'], OBJECT, 'np_job');
            if (!$exists) {
                // Insert Post
                $post_id = wp_insert_post([
                    'post_title' => $job['title'],
                    'post_content' => $job['desc'],
                    'post_type' => 'np_job',
                    'post_status' => 'publish'
                ]);

                if ($post_id) {
                    // Update Meta
                    update_post_meta($post_id, '_np_job_salary', $job['sal']);
                    update_post_meta($post_id, '_np_job_location', $job['loc']);
                    update_post_meta($post_id, '_np_job_type', $job['type']);
                    if (isset($job['hot'])) update_post_meta($post_id, '_np_job_hot', '1');

                    // Assign Taxonomy
                    if (isset($term_ids[$job['dept']])) {
                        wp_set_object_terms($post_id, (int)$term_ids[$job['dept']], 'np_department');
                    }
                }
            }
        }
        
        // Redirect back avoiding loop
        wp_redirect(admin_url('admin.php?page=np-recruitment-settings&imported=1'));
        exit;
    }
}
add_action('admin_init', 'np_process_demo_import');

// Helper: Send Mail Function (Same as before)
function np_send_mail($to, $subject, $message, $attachments = array()) {
    // ... (This function relies on phpmailer_init which is global, we can define it once. 
    // To ensure compatibility with other plugins, we usually use an anonymous function inside wp_mail wrapper or similar.
    // Simplifying for this theme context:
    
    add_action('phpmailer_init', 'np_configure_smtp');
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $result = wp_mail($to, $subject, $message, $headers, $attachments);
    remove_action('phpmailer_init', 'np_configure_smtp'); // Clean up
    return $result;
}

function np_configure_smtp($phpmailer) {
    $host = get_option('np_recruit_smtp_host');
    $user = get_option('np_recruit_smtp_user');
    $pass = get_option('np_recruit_smtp_pass');
    
    if ($host && $user && $pass) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = $host;
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = get_option('np_recruit_smtp_port', 587);
        $phpmailer->Username   = $user;
        $phpmailer->Password   = $pass;
        $secure = get_option('np_recruit_smtp_secure', 'tls');
        if ($secure !== 'none') $phpmailer->SMTPSecure = $secure;
        $phpmailer->From = $user;
        $phpmailer->FromName = get_bloginfo('name');
    }
}

// 7. AJAX HANDLER FOR APPLICATION FORM
add_action('wp_ajax_np_submit_application', 'np_ajax_submit_application');
add_action('wp_ajax_nopriv_np_submit_application', 'np_ajax_submit_application');

function np_ajax_submit_application() {
    check_ajax_referer('np_recruit_nonce', 'security');

    // 1. Validate Fields
    $name = sanitize_text_field($_POST['fullname']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $job_id = intval($_POST['job_id']); // Can be 0
    $message = sanitize_textarea_field($_POST['message']);
    
    // New Fields
    $province = sanitize_text_field($_POST['province_name']); // We send name from JS
    $commune = sanitize_text_field($_POST['commune']);
    $cv_url_input = sanitize_text_field($_POST['cv_file']); // Text URL
    
    if (!$name || !$email || !$phone) {
        wp_send_json_error(['message' => 'Vui lòng điền đầy đủ thông tin bắt buộc.']);
    }

    // 2. Handle CV (URL Preferred)
    $cv_url = $cv_url_input;
    
    // Fallback for file upload if ever needed (legacy)
    if (empty($cv_url) && !empty($_FILES['cv_file']['name'])) {
        if (!function_exists('wp_handle_upload')) require_once(ABSPATH . 'wp-admin/includes/file.php');
        $uploadedfile = $_FILES['cv_file'];
        $upload_overrides = ['test_form' => false, 'mimes' => ['pdf' => 'application/pdf', 'doc' => 'application/msword', 'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']];
        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
        if ($movefile && !isset($movefile['error'])) {
            $cv_url = $movefile['url'];
        }
    }

    // 3. Create Candidate Post
    $job_title = $job_id ? get_the_title($job_id) : 'Ứng tuyển tự do';
    $post_title = $name . ' - ' . $job_title;

    $candidate_id = wp_insert_post([
        'post_title' => $post_title,
        'post_type' => 'np_candidate',
        'post_status' => 'publish'
    ]);

    if ($candidate_id) {
        update_post_meta($candidate_id, '_np_candidate_email', $email);
        update_post_meta($candidate_id, '_np_candidate_phone', $phone);
        update_post_meta($candidate_id, '_np_candidate_job_id', $job_id);
        update_post_meta($candidate_id, '_np_candidate_cv', $cv_url);
        update_post_meta($candidate_id, '_np_candidate_message', $message);
        
        // Save Address
        update_post_meta($candidate_id, '_np_candidate_address', $commune . ', ' . $province);
        
        // 4. Send Emails
        
        // 4.1 To Candidate
        $candidate_subject = get_option('np_recruit_confirm_subject', 'Xác nhận ứng tuyển - NP FOOD');
        $candidate_body = get_option('np_recruit_confirm_template');
        // Replace placeholders
        $candidate_body = str_replace(
            ['{name}', '{job_title}', '{email}'], 
            [$name, $job_title, $email], 
            $candidate_body
        );
        np_send_mail($email, $candidate_subject, wpautop($candidate_body));

        // 4.2 To Admin
        $admin_email = get_option('np_recruit_receiver_email');
        if ($admin_email) {
            $admin_subject = get_option('np_recruit_admin_subject');
            $admin_subject = str_replace(['{name}', '{job_title}'], [$name, $job_title], $admin_subject);

            $admin_body = get_option('np_recruit_admin_template');
            // Add Address to body if placeholders exist or append it
            // For now, standard replacement.
            $admin_body = str_replace(
                ['{name}', '{job_title}', '{email}', '{phone}', '{cv_link}'], 
                [$name, $job_title, $email, $phone, $cv_url], 
                $admin_body
            );
            // Append extra info if not in template
            $admin_body .= "<br><hr><p><strong>Địa chỉ:</strong> $commune, $province</p>";
            $admin_body .= "<p><strong>Lời nhắn:</strong> <br> " . nl2br($message) . "</p>";
            
            np_send_mail($admin_email, $admin_subject, wpautop($admin_body));
        }

        wp_send_json_success(['message' => 'Nộp hồ sơ thành công! Chúng tôi sẽ liên hệ sớm.']);
    } else {
        wp_send_json_error(['message' => 'Có lỗi xảy ra, vui lòng thử lại.']);
    }
}

// 8. Enqueue Scripts for Frontend (unchanged)

add_action('wp_enqueue_scripts', 'np_recruitment_frontend_scripts');
function np_recruitment_frontend_scripts() {
    if (is_page_template('page-tuyen-dung.php')) {
        wp_enqueue_script('np-recruit-js', get_template_directory_uri() . '/js/recruitment.js', ['jquery'], '1.0', true);
        wp_localize_script('np-recruit-js', 'np_recruit_obj', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('np_recruit_nonce')
        ]);
    }
}

// ==========================================================================
// 8. QUICK VIEW MODAL (ADMIN)
// ==========================================================================

// 8.1 Register AJAX for fetching details
add_action('wp_ajax_np_get_candidate_detail', 'np_ajax_get_candidate_detail');
function np_ajax_get_candidate_detail() {
    $post_id = intval($_GET['post_id']);
    if (!$post_id) wp_send_json_error('Invalid ID');
    
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'np_candidate') wp_send_json_error('Not a Candidate');
    
    $email = get_post_meta($post_id, '_np_candidate_email', true);
    $phone = get_post_meta($post_id, '_np_candidate_phone', true);
    $cv_url = get_post_meta($post_id, '_np_candidate_cv', true);
    $job_id = get_post_meta($post_id, '_np_candidate_job_id', true);
    $address = get_post_meta($post_id, '_np_candidate_address', true);
    $message = nl2br(esc_html(get_post_meta($post_id, '_np_candidate_message', true)));
    
    // Status Logic
    $status = get_post_meta($post_id, '_np_candidate_status', true);
    if(!$status) $status = 'new';
    $statuses = np_get_recruit_statuses();
    $st_info = isset($statuses[$status]) ? $statuses[$status] : $statuses['new'];
    
    $job_title = 'Ứng tuyển tự do';
    if($job_id) {
        if($job_id == 9999) $job_title = 'Design Intern (Landing)';
        else $job_title = get_the_title($job_id);
    }
    
    // Determine Age/DoB (Placeholder as we don't have it yet)
    // We only have Fullname, Phone, Email, Address, CV, Message
    
    ob_start();
    ?>
    <div class="np-modal-header" style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
        <h2 style="margin: 0; color: #052e16; font-size: 24px; font-weight: 700;">
            <?php echo esc_html($post->post_title); ?>
        </h2>
        <div style="margin-top:8px;">
            <span style="display: inline-block; background: #e6fffa; color: #052e16; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; margin-right: 5px;">
                <?php echo esc_html($job_title); ?>
            </span>
            <span style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; color: <?php echo $st_info['color']; ?>; background: <?php echo $st_info['bg']; ?>; border:1px solid <?php echo $st_info['color']; ?>;">
                <?php echo esc_html($st_info['label']); ?>
            </span>
        </div>
    </div>
    
    <div class="np-modal-body" style="display: flex; gap: 30px;">
        <div class="np-col-left" style="flex: 1; border-right: 1px solid #eee; padding-right: 30px;">
            <div style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px; color: #666; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Liên Hệ</h4>
                <p style="margin: 5px 0;"><strong>📧 Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                <p style="margin: 5px 0;"><strong>📱 SĐT:</strong> <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></p>
                <p style="margin: 5px 0;"><strong>📍 Địa chỉ:</strong> <?php echo esc_html($address); ?></p>
            </div>
            
            <div style="margin-top: 30px;">
                <h4 style="margin: 0 0 10px; color: #666; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Hồ Sơ CV</h4>
                <?php if ($cv_url): ?>
                    <a href="<?php echo esc_url($cv_url); ?>" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; background: #54b259; color: white; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; width: 100%; box-sizing: border-box;">
                        Xem CV / Portfolio &rarr;
                    </a>
                    <p style="font-size: 12px; color: #999; margin-top: 5px; word-break: break-all;"><?php echo esc_url($cv_url); ?></p>
                <?php else: ?>
                    <p style="color: #999; font-style: italic;">Ứng viên chưa đính kèm CV.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="np-col-right" style="flex: 1.5;">
            <h4 style="margin: 0 0 10px; color: #666; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Lời Nhắn & Tài Liệu Bổ Sung</h4>
            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #e9ecef; color: #333; line-height: 1.6; max-height: 400px; overflow-y: auto;">
                <?php echo $message ? $message : 'Không có lời nhắn.'; ?>
            </div>
            
            <div style="margin-top: 20px; text-align: right;">
                 <a href="<?php echo get_edit_post_link($post_id); ?>" class="button" target="_blank">Chỉnh sửa chi tiết &rarr;</a>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    wp_send_json_success($html);
}

// 8.2 Inject Modal & Script into Admin Footer
add_action('admin_footer', 'np_recruit_admin_quick_view_assets');
function np_recruit_admin_quick_view_assets() {
    $screen = get_current_screen();
    if ($screen && $screen->post_type === 'np_candidate') {
    ?>
    <!-- Modal Styles and Markup -->
    <style>
        #np-candidate-modal-overlay {
            display: none;
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            align-items: center; justify-content: center;
        }
        #np-candidate-modal {
            background: white;
            width: 800px;
            max-width: 90%;
            max-height: 90vh;
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 40px;
            position: relative;
            overflow-y: auto;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.3s ease-out;
        }
        #np-candidate-modal.open {
            transform: translateY(0);
            opacity: 1;
        }
        .np-close-modal {
            position: absolute;
            top: 20px; right: 20px;
            width: 32px; height: 32px;
            border-radius: 50%;
            background: #f1f3f4;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            color: #5f6368;
            transition: all 0.2s;
        }
        .np-close-modal:hover {
            background: #e0e0e0;
            color: #000;
        }
    </style>

    <div id="np-candidate-modal-overlay">
        <div id="np-candidate-modal">
            <div class="np-close-modal">✕</div>
            <div id="np-modal-content">
                <div style="text-align: center; padding: 60px;">
                    <span class="spinner is-active" style="float:none; margin:0;"></span> Đang tải...
                </div>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        
        // Open Modal
        $(document).on('click', '.quick-view-candidate', function(e) {
            e.preventDefault();
            var postId = $(this).data('id');
            var overlay = $('#np-candidate-modal-overlay');
            var modal = $('#np-candidate-modal');
            var content = $('#np-modal-content');
            
            overlay.css('display', 'flex');
            setTimeout(function(){ modal.addClass('open'); }, 10);
            
            content.html('<div style="text-align: center; padding: 60px;"><span class="spinner is-active" style="float:none; margin:0;"></span> Đang tải dữ liệu...</div>');
            
            $.ajax({
                url: ajaxurl,
                data: {
                    action: 'np_get_candidate_detail',
                    post_id: postId
                },
                success: function(res) {
                    if(res.success) {
                        content.html(res.data);
                    } else {
                        content.html('<p style="color:red; text-align:center;">Lỗi: ' + (res.data || 'Không thể tải dữ liệu') + '</p>');
                    }
                },
                error: function() {
                    content.html('<p style="color:red; text-align:center;">Lỗi kết nối server</p>');
                }
            });
        });

        // Close Modal
        function closeNpModal() {
            $('#np-candidate-modal').removeClass('open');
            setTimeout(function() {
                $('#np-candidate-modal-overlay').hide();
            }, 300);
        }
        
        $('.np-close-modal, #np-candidate-modal-overlay').on('click', function(e) {
            if (e.target === this) {
                closeNpModal();
            }
        });
        
        // Also bind to Escape key
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                closeNpModal();
            }
        });
    });
    </script>
    <?php
    }
}
