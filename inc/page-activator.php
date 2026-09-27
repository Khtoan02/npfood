<?php
/**
 * NP Food - 1-Click Page Activator
 * Công cụ tự động kích hoạt / khởi tạo các trang mẫu của theme chỉ với 1 click
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Danh sách định nghĩa các trang mẫu của Theme
 */
function np_get_theme_pages_config()
{
    return [
        'miwako-a-plus' => [
            'slug'     => 'miwako-a-plus',
            'title'    => 'Miwako A+',
            'template' => 'page-miwako-a-plus.php',
            'category' => 'Sản phẩm',
            'desc'     => 'Trang chi tiết thực phẩm dinh dưỡng Miwako A+ (Key visual Vàng hoàng gia, bộ ảnh thực tế 9 ảnh, hồ sơ công bố, hướng dẫn sử dụng).',
            'icon'     => 'dashicons-star-filled',
            'color'    => '#D97706',
        ],
        'miwako' => [
            'slug'     => 'miwako',
            'title'    => 'Miwako',
            'template' => 'page-miwako.php',
            'category' => 'Sản phẩm',
            'desc'     => 'Trang chi tiết thực phẩm dinh dưỡng Miwako (Key visual Xanh dương đại dương, tiêu chuẩn hữu cơ, dải chứng nhận quốc tế).',
            'icon'     => 'dashicons-star-half',
            'color'    => '#2563EB',
        ],
        'tong-quan-doanh-nghiep' => [
            'slug'     => 'tong-quan-doanh-nghiep',
            'title'    => 'Tổng Quan Doanh Nghiệp',
            'template' => 'page-tong-quan-doanh-nghiep.php',
            'category' => 'Về NP Food',
            'desc'     => 'Trang giới thiệu tổng quan doanh nghiệp Công ty TNHH Thực Phẩm NP, lịch sử hình thành, ban lãnh đạo và mạng lưới phân phối.',
            'icon'     => 'dashicons-building',
            'color'    => '#059669',
        ],
        'su-menh-tam-nhin' => [
            'slug'     => 'su-menh-tam-nhin',
            'title'    => 'Sứ Mệnh & Tầm Nhìn',
            'template' => 'page-su-menh-tam-nhin.php',
            'category' => 'Về NP Food',
            'desc'     => 'Trang định hướng phát triển, sứ mệnh phụng sự sức khỏe cộng đồng và tầm nhìn trở thành đơn vị dinh dưỡng thực vật hàng đầu.',
            'icon'     => 'dashicons-visibility',
            'color'    => '#059669',
        ],
        'gia-tri-cot-loi' => [
            'slug'     => 'gia-tri-cot-loi',
            'title'    => 'Giá Trị Cốt Lõi',
            'template' => 'page-gia-tri-cot-loi.php',
            'category' => 'Về NP Food',
            'desc'     => 'Trang chuẩn mực đạo đức, cam kết chất lượng, minh bạch và an toàn thực phẩm của tập thể NP Food.',
            'icon'     => 'dashicons-heart',
            'color'    => '#059669',
        ],
        'nguyen-tac-kinh-doanh' => [
            'slug'     => 'nguyen-tac-kinh-doanh',
            'title'    => 'Nguyên Tắc Kinh Doanh',
            'template' => 'page-nguyen-tac-kinh-doanh.php',
            'category' => 'Về NP Food',
            'desc'     => 'Trang nguyên tắc tuân thủ pháp luật, thương mại công bằng và quan hệ đối tác bền vững.',
            'icon'     => 'dashicons-shield',
            'color'    => '#059669',
        ],
        'tuyen-dung' => [
            'slug'     => 'tuyen-dung',
            'title'    => 'Tuyển Dụng',
            'template' => 'page-tuyen-dung.php',
            'category' => 'Tuyển dụng',
            'desc'     => 'Trang cơ hội nghề nghiệp, chính sách phúc lợi và các vị trí tuyển dụng thực tập sinh, nhân sự của công ty.',
            'icon'     => 'dashicons-groups',
            'color'    => '#7C3AED',
        ],
        'blog' => [
            'slug'     => 'blog',
            'title'    => 'Tin Tức & Hoạt Động',
            'template' => 'page-blog.php',
            'category' => 'Tin tức',
            'desc'     => 'Trang danh sách bài viết blog, chia sẻ kiến thức dinh dưỡng thực vật và tin tức doanh nghiệp.',
            'icon'     => 'dashicons-welcome-write-blog',
            'color'    => '#4B5563',
        ],
    ];
}

/**
 * Đăng ký Menu trang quản lý trong WP-Admin
 */
function np_register_page_activator_menu()
{
    // Thêm vào menu Trang (Pages)
    add_submenu_page(
        'edit.php?post_type=page',
        '⚡ Kích Hoạt Trang Mẫu',
        '⚡ Kích Hoạt Trang Mẫu',
        'manage_options',
        'np-page-activator',
        'np_render_page_activator_dashboard'
    );

    // Thêm vào menu Giao diện (Appearance)
    add_theme_page(
        '⚡ Kích Hoạt Trang Mẫu',
        '⚡ Kích Hoạt Trang Mẫu',
        'manage_options',
        'np-page-activator',
        'np_render_page_activator_dashboard'
    );
}
add_action('admin_menu', 'np_register_page_activator_menu');

/**
 * Hàm hỗ trợ kích hoạt 1 trang
 */
function np_activate_single_page($slug)
{
    $configs = np_get_theme_pages_config();
    if (!isset($configs[$slug])) {
        return false;
    }

    $item = $configs[$slug];
    
    // Tìm trang theo slug
    $existing = get_page_by_path($slug, OBJECT, 'page');
    
    // Nếu chưa có, tạo mới
    if (!$existing) {
        $post_id = wp_insert_post([
            'post_title'     => $item['title'],
            'post_name'      => $slug,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ]);
    } else {
        $post_id = $existing->ID;
        // Đảm bảo trang ở trạng thái publish
        if ($existing->post_status !== 'publish') {
            wp_update_post([
                'ID'          => $post_id,
                'post_status' => 'publish',
            ]);
        }
    }

    if ($post_id && !is_wp_error($post_id)) {
        // Gán page template cho trang
        update_post_meta($post_id, '_wp_page_template', $item['template']);
        return $post_id;
    }

    return false;
}

/**
 * Xử lý Actions gửi từ form
 */
function np_handle_page_activator_actions()
{
    if (!isset($_POST['np_action']) || !check_admin_referer('np_page_activator_nonce', 'np_nonce')) {
        return;
    }

    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền thực hiện thao tác này.');
    }

    $action = sanitize_text_field($_POST['np_action']);
    $configs = np_get_theme_pages_config();
    $activated_count = 0;

    if ($action === 'activate_all') {
        foreach ($configs as $slug => $data) {
            if (np_activate_single_page($slug)) {
                $activated_count++;
            }
        }
        flush_rewrite_rules();
        add_settings_error(
            'np_activator_messages',
            'np_all_activated',
            sprintf('Đã kích hoạt và đồng bộ thành công %d/%d trang mẫu! Bộ định tuyến đường dẫn tĩnh đã được làm mới.', $activated_count, count($configs)),
            'updated'
        );
    } elseif ($action === 'activate_single' && !empty($_POST['page_slug'])) {
        $slug = sanitize_title($_POST['page_slug']);
        if (np_activate_single_page($slug)) {
            flush_rewrite_rules();
            add_settings_error(
                'np_activator_messages',
                'np_single_activated',
                sprintf('Đã kích hoạt thành công trang "%s" (/%s/)!', esc_html($configs[$slug]['title']), esc_html($slug)),
                'updated'
            );
        }
    }
}
add_action('admin_init', 'np_handle_page_activator_actions');

/**
 * Giao diện Bảng điều khiển Kích hoạt trang mẫu
 */
function np_render_page_activator_dashboard()
{
    $configs = np_get_theme_pages_config();
    $all_active = true;
    ?>
    <div class="wrap" style="max-width: 1100px; margin-top: 20px;">
        
        <div style="background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%); color: #fff; padding: 30px; border-radius: 16px; margin-bottom: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                <div>
                    <h1 style="color: #fff; margin: 0 0 8px 0; font-size: 26px; font-weight: 700; display: flex; align-items: center; gap: 10px;">
                        <span class="dashicons dashicons-layout" style="font-size: 28px; width: 28px; height: 28px;"></span>
                        Kích Hoạt Trang Mẫu (1-Click Page Activator)
                    </h1>
                    <p style="color: #94A3B8; margin: 0; font-size: 14px; max-width: 650px; line-height: 1.5;">
                        Công cụ thiết lập tự động giúp bạn kích hoạt đầy đủ các mẫu trang của <strong>NP Food Theme</strong> chỉ với 1 cú click chuột mà không cần phải vào tạo tay từng trang hay gõ lại slug.
                    </p>
                </div>
                
                <form method="post" action="">
                    <?php wp_nonce_field('np_page_activator_nonce', 'np_nonce'); ?>
                    <input type="hidden" name="np_action" value="activate_all" />
                    <button type="submit" class="button button-primary" style="background: #2563EB; border-color: #1D4ED8; padding: 10px 22px; height: auto; font-size: 14px; font-weight: 600; border-radius: 10px; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4); cursor: pointer;">
                        <span class="dashicons dashicons-admin-generic" style="font-size: 18px; width: 18px; height: 18px;"></span>
                        🚀 KÍCH HOẠT TẤT CẢ CÁC TRANG
                    </button>
                </form>
            </div>
        </div>

        <?php settings_errors('np_activator_messages'); ?>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 18px;">
            <?php foreach ($configs as $slug => $item) : 
                $page = get_page_by_path($slug, OBJECT, 'page');
                $is_active = ($page && $page->post_status === 'publish');
                if (!$is_active) $all_active = false;
                $page_url = home_url('/' . $slug . '/');
            ?>
                <div style="background: #fff; border-radius: 14px; border: 1px solid #E2E8F0; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.2s ease;">
                    <div>
                        <!-- Header Card -->
                        <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 12px;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 40px; height: 40px; border-radius: 10px; background: <?php echo esc_attr($item['color'] . '15'); ?>; color: <?php echo esc_attr($item['color']); ?>; display: flex; align-items: center; justify-content: center; shrink-0;">
                                    <span class="dashicons <?php echo esc_attr($item['icon']); ?>" style="font-size: 20px; width: 20px; height: 20px;"></span>
                                </div>
                                <div>
                                    <h3 style="margin: 0; font-size: 16px; font-weight: 700; color: #0F172A;">
                                        <?php echo esc_html($item['title']); ?>
                                    </h3>
                                    <span style="font-size: 12px; color: #64748B; font-family: monospace;">
                                        /<?php echo esc_html($slug); ?>/
                                    </span>
                                </div>
                            </div>

                            <!-- Status Badge -->
                            <?php if ($is_active) : ?>
                                <span style="background: #DEF7EC; color: #03543F; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; display: inline-flex; align-items: center; gap: 4px;">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background: #0E9F6E; display: inline-block;"></span>
                                    Đã kích hoạt
                                </span>
                            <?php else : ?>
                                <span style="background: #FEE2E2; color: #991B1B; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; display: inline-flex; align-items: center; gap: 4px;">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background: #EF4444; display: inline-block;"></span>
                                    Chưa tạo
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- Description -->
                        <p style="color: #475569; font-size: 13px; line-height: 1.5; margin: 0 0 14px 0;">
                            <?php echo esc_html($item['desc']); ?>
                        </p>
                        
                        <div style="background: #F8FAFC; padding: 8px 12px; border-radius: 8px; font-size: 11px; color: #64748B; margin-bottom: 16px;">
                            Template: <code><?php echo esc_html($item['template']); ?></code>
                        </div>
                    </div>

                    <!-- Footer Action Buttons -->
                    <div style="border-top: 1px solid #F1F5F9; pt-3; padding-top: 14px; display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                        <?php if ($is_active) : ?>
                            <a href="<?php echo esc_url($page_url); ?>" target="_blank" class="button" style="border-radius: 8px; font-size: 12px; display: inline-flex; align-items: center; gap: 4px;">
                                <span class="dashicons dashicons-external" style="font-size: 14px; width: 14px; height: 14px;"></span>
                                Xem trang
                            </a>
                            <a href="<?php echo esc_url(get_edit_post_link($page->ID)); ?>" class="button" style="border-radius: 8px; font-size: 12px; display: inline-flex; align-items: center; gap: 4px;">
                                <span class="dashicons dashicons-edit" style="font-size: 14px; width: 14px; height: 14px;"></span>
                                Sửa
                            </a>
                            <form method="post" action="" style="margin: 0;">
                                <?php wp_nonce_field('np_page_activator_nonce', 'np_nonce'); ?>
                                <input type="hidden" name="np_action" value="activate_single" />
                                <input type="hidden" name="page_slug" value="<?php echo esc_attr($slug); ?>" />
                                <button type="submit" class="button" title="Đồng bộ lại template & làm mới rewrite" style="border-radius: 8px; font-size: 12px;">
                                    🔄 Đồng bộ
                                </button>
                            </form>
                        <?php else : ?>
                            <form method="post" action="" style="width: 100%; margin: 0;">
                                <?php wp_nonce_field('np_page_activator_nonce', 'np_nonce'); ?>
                                <input type="hidden" name="np_action" value="activate_single" />
                                <input type="hidden" name="page_slug" value="<?php echo esc_attr($slug); ?>" />
                                <button type="submit" class="button button-primary" style="width: 100%; justify-content: center; border-radius: 8px; font-size: 13px; font-weight: 600; display: inline-flex; align-items: center; gap: 5px; padding: 6px 12px; height: auto;">
                                    <span class="dashicons dashicons-plus-alt2" style="font-size: 16px; width: 16px; height: 16px;"></span>
                                    Kích hoạt ngay (1-Click)
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Helpful Guide Box -->
        <div style="margin-top: 30px; background: #FFFBEB; border: 1px solid #FDE68A; border-radius: 12px; padding: 18px 22px;">
            <h4 style="margin: 0 0 6px 0; color: #92400E; font-size: 14px; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                <span class="dashicons dashicons-info" style="color: #D97706;"></span>
                Cách hoạt động khi bạn deploy lên Hosting:
            </h4>
            <ol style="margin: 0; padding-left: 20px; color: #B45309; font-size: 13px; line-height: 1.6;">
                <li>Sau khi <code>git pull</code> code mới về host, bạn chỉ cần vào mục <strong>Trang ➜ ⚡ Kích Hoạt Trang Mẫu</strong>.</li>
                <li>Bấm nút <strong>"🚀 KÍCH HOẠT TẤT CẢ CÁC TRANG"</strong> ở đầu trang.</li>
                <li>Hệ thống sẽ tự động quét cơ sở dữ liệu trên host, nếu trang nào chưa có sẽ tự tạo chuẩn slug, gán đúng page-template và làm mới đường dẫn tĩnh ngay lập tức.</li>
            </ol>
        </div>

    </div>
    <?php
}
