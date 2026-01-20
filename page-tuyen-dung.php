<?php
/*
 * Template Name: Career Page
 */
get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-[#54b259] selection:text-white">
    <!-- CSS Styles for Custom Animations -->
    <style>
        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slow-zoom {
            animation: slowZoom 20s infinite alternate linear;
        }
        .text-gradient-gold {
            background: linear-gradient(135deg, #f8c03f 0%, #d4a017 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .job-card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .job-card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(84, 178, 89, 0.15);
            border-color: rgba(84, 178, 89, 0.4);
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        
        /* Combobox Styles - Styled for Light Theme */
        .combobox-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 240px;
            overflow-y: auto;
            background-color: #ffffff; /* White bg */
            border: 1px solid #e5e7eb; /* Gray-200 */
            border-radius: 0.5rem;
            z-index: 50;
            margin-top: 0.25rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .combobox-dropdown.active {
            display: block;
        }
        .combobox-item {
            padding: 0.75rem 1rem;
            color: #374151; /* Gray-700 */
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.875rem;
            border-bottom: 1px solid #f3f4f6;
        }
        .combobox-item:last-child {
            border-bottom: none;
        }
        .combobox-item:hover {
            background-color: #f0fdf4; /* Light Green */
            color: #166534; /* Dark Green */
        }
    </style>

    <!-- 1. HERO SECTION: KHỞI NGUỒN SỰ NGHIỆP - CINEMATIC STYLE -->
    <section class="relative h-[80vh] min-h-[600px] flex items-center justify-center overflow-hidden">
        <!-- Background Image with Slow Zoom -->
        <div class="absolute inset-0 overflow-hidden">
            <img 
                src="https://npfood.vn/wp-content/uploads/2022/12/CanhDong_25-scaled.jpg" 
                alt="NP Food Career Hero" 
                class="w-full h-full object-cover animate-slow-zoom origin-center"
            />
            <!-- Layered Gradient Overlay for Depth -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/70"></div>
            <div class="absolute inset-0 bg-[#052e16]/30 mix-blend-multiply"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 text-center text-white">
            <div class="inline-flex items-center gap-3 px-6 py-2.5 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-[#f8c03f] font-bold uppercase tracking-[0.25em] text-[10px] mb-8 animate-[fadeIn_1s_ease-out]">
                <i data-lucide="sparkles" class="w-3 h-3"></i> Tuyển Dụng & Nhân Sự
            </div>
          
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold mb-8 leading-tight drop-shadow-2xl animate-[fadeIn_1s_ease-out_0.2s_both]">
                Kiến Tạo <br/> 
                <span class="text-gradient-gold relative inline-block">
                    Tương Lai
                    <svg class="absolute w-full h-3 -bottom-1 left-0 text-[#f8c03f] opacity-60" viewBox="0 0 200 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.00025 6.99997C18.5002 9.99999 63.5002 9.99999 92.5002 6.49999C121.5 2.99999 169 -3.00001 198 1.99999" stroke="currentColor" strokeWidth="3"></path></svg>
                </span>
            </h1>
          
            <p class="text-lg md:text-2xl text-gray-100 max-w-3xl mx-auto font-light leading-relaxed mb-12 drop-shadow-md animate-[fadeIn_1s_ease-out_0.4s_both] italic">
                "Chúng tôi không chỉ tìm kiếm nhân sự, chúng tôi tìm kiếm những người đồng hành cùng chung nhịp đập trái tim."
            </p>
          
            <div class="flex flex-col sm:flex-row gap-6 justify-center animate-[fadeIn_1s_ease-out_0.6s_both]">
                <button 
                    onclick="document.getElementById('jobs').scrollIntoView({behavior: 'smooth'})"
                    class="group relative px-10 py-4 bg-[#f8c03f] text-[#052e16] font-bold rounded-full overflow-hidden transition-all hover:shadow-[0_0_40px_rgba(248,192,63,0.4)] hover:scale-105 border-none cursor-pointer"
                >
                    <span class="relative z-10 flex items-center justify-center gap-3 uppercase text-xs tracking-[0.2em]">
                        Xem Cơ Hội <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </span>
                    <div class="absolute inset-0 bg-white/20 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                </button>
            </div>
        </div>
    </section>

    <!-- 2. VÌ SAO CHỌN NP FOOD - PREMIUM CARDS -->
    <section class="py-32 bg-white relative overflow-hidden">
        <!-- Abstract Background Decoration -->
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#54b259]/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-24">
                <h4 class="text-[#54b259] font-bold uppercase tracking-[0.2em] text-xs mb-4">Môi Trường Làm Việc</h4>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-[#1F2937] mb-6">Nơi Tài Năng Tỏa Sáng</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-[#f8c03f] to-transparent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <?php
                $benefits = [
                    [
                        'icon' => 'heart',
                        'title' => 'Văn Hóa Tử Tế',
                        'desc' => 'Môi trường làm việc lấy đạo đức làm gốc, tôn trọng sự minh bạch và chân thành.'
                    ],
                    [
                        'icon' => 'trending-up',
                        'title' => 'Lộ Trình Rõ Ràng',
                        'desc' => 'Cơ hội thăng tiến không giới hạn dựa trên năng lực và kết quả thực tế.'
                    ],
                    [
                        'icon' => 'award',
                        'title' => 'Phúc Lợi Toàn Diện',
                        'desc' => 'Chế độ đãi ngộ cạnh tranh, thưởng KPI hấp dẫn và bảo hiểm sức khỏe cao cấp.'
                    ]
                ];
                foreach ($benefits as $item): ?>
                    <div class="group relative p-1 bg-gradient-to-br from-gray-100 to-white rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#54b259]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-[2rem]"></div>
                        <div class="relative bg-white h-full p-10 rounded-[1.9rem] flex flex-col items-center text-center z-10">
                            <div class="w-20 h-20 bg-[#54b259]/5 rounded-2xl flex items-center justify-center mb-8 text-[#54b259] group-hover:bg-[#54b259] group-hover:text-white transition-all duration-500 rotate-6 group-hover:rotate-0 shadow-inner">
                                <i data-lucide="<?php echo $item['icon']; ?>" class="w-8 h-8"></i>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-[#1F2937] mb-4 group-hover:text-[#54b259] transition-colors"><?php echo $item['title']; ?></h3>
                            <p class="text-gray-500 leading-relaxed font-light m-0"><?php echo $item['desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. DANH SÁCH VIỆC LÀM - MODERN CLEAN LAYOUT -->
    <section id="jobs" class="py-32 bg-[#F9FAFB]">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 border-b border-gray-200 pb-8">
                <div class="max-w-2xl">
                    <h2 class="text-4xl font-serif font-bold text-[#052e16] mb-4">Cơ Hội Việc Làm</h2>
                    <p class="text-gray-500 font-light">Khám phá các vị trí và trở thành một phần của đội ngũ NP FOOD.</p>
                </div>
            
                <!-- Search Box -->
                <div class="mt-6 md:mt-0 relative w-full md:w-96 group">
                    <input 
                        type="text" 
                        id="jobSearchInput"
                        placeholder="Tìm kiếm vị trí..." 
                        class="w-full pl-14 pr-6 py-4 rounded-full bg-white border border-gray-200 focus:outline-none focus:border-[#54b259] focus:ring-4 focus:ring-[#54b259]/10 transition-all shadow-sm group-hover:shadow-md"
                    />
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-[#54b259] transition-colors">
                        <i data-lucide="search" class="w-[22px] h-[22px]"></i>
                    </div>
                </div>
            </div>

            <!-- Department Tabs -->
                <?php
                // 1. Fetch Departments (Taxonomy)
                $dept_terms = get_terms([
                    'taxonomy' => 'np_department',
                    'hide_empty' => true, // Only show departments with active jobs
                ]);

                // Icon mapping for departments (fallback for dynamic terms)
                $dept_icons = [
                    'sales' => 'trending-up',
                    'marketing' => 'star',
                    'cs' => 'headphones',
                    'tech' => 'settings',
                    'logistics' => 'truck',
                    'finance' => 'dollar-sign',
                    'default' => 'briefcase'
                ];
                
                // Color mapping
                $dept_colors = [
                    'sales' => 'bg-blue-50 text-blue-600 border-blue-100',
                    'marketing' => 'bg-purple-50 text-purple-600 border-purple-100',
                    'cs' => 'bg-pink-50 text-pink-600 border-pink-100',
                    'tech' => 'bg-gray-50 text-gray-600 border-gray-200',
                    'logistics' => 'bg-orange-50 text-orange-600 border-orange-100',
                    'finance' => 'bg-yellow-50 text-yellow-700 border-yellow-100'
                ];
                ?>

                <!-- Department Tabs -->
                <div class="flex overflow-x-auto pb-6 gap-3 mb-10 scrollbar-hide" id="deptTabs">
                    <button 
                        onclick="filterJobs('all')"
                        class="dept-tab active px-8 py-3 rounded-full font-bold text-sm transition-all whitespace-nowrap border bg-[#54b259] text-white border-[#54b259] shadow-lg shadow-[#54b259]/30 cursor-pointer"
                        data-id="all"
                    >
                        Tất Cả
                    </button>
                    <?php if (!empty($dept_terms) && !is_wp_error($dept_terms)): ?>
                        <?php foreach ($dept_terms as $term): 
                            $icon = isset($dept_icons[$term->slug]) ? $dept_icons[$term->slug] : $dept_icons['default'];
                        ?>
                            <button
                                onclick="filterJobs('<?php echo $term->slug; ?>')"
                                class="dept-tab flex items-center gap-2 px-6 py-3 rounded-full font-bold text-sm transition-all whitespace-nowrap border bg-white text-gray-500 border-gray-200 hover:border-[#54b259] hover:text-[#54b259] cursor-pointer"
                                data-id="<?php echo $term->slug; ?>"
                            >
                                <i data-lucide="<?php echo $icon; ?>" class="w-[18px] h-[18px]"></i> <?php echo $term->name; ?>
                            </button>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Jobs Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="jobsGrid">
                <?php
                // 2. Fetch Jobs (CPT)
                $jobs_query = new WP_Query([
                    'post_type' => 'np_job',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => [
                        'menu_order' => 'ASC',
                        'date' => 'DESC'
                    ]
                ]);

                if ($jobs_query->have_posts()):
                    while ($jobs_query->have_posts()): $jobs_query->the_post();
                        $job_id = get_the_ID();
                        $salary = get_post_meta($job_id, '_np_job_salary', true);
                        $location = get_post_meta($job_id, '_np_job_location', true);
                        $is_hot = get_post_meta($job_id, '_np_job_hot', true);
                        
                        // Departments
                        $job_depts = get_the_terms($job_id, 'np_department');
                        $dept_slug = ($job_depts && !is_wp_error($job_depts)) ? $job_depts[0]->slug : 'other';
                        $dept_name = ($job_depts && !is_wp_error($job_depts)) ? $job_depts[0]->name : 'Chung';
                        
                        $card_class = $is_hot ? 'border-dashed border-[#f8c03f]/60' : 'border-gray-100';
                        $badge_class = isset($dept_colors[$dept_slug]) ? $dept_colors[$dept_slug] : 'bg-gray-50 text-gray-600 border-gray-200';
                        
                        // Custom Page Logic
                        $custom_page_id = get_post_meta($job_id, '_np_job_custom_page', true);
                        $job_link = $custom_page_id ? get_permalink($custom_page_id) : '#'; 
                        
                        // Click Logic: If custom page -> Go there. If not -> Open Modal
                        $card_onclick = $custom_page_id ? "window.location.href='$job_link'" : "return false;";
                        $extra_class = $custom_page_id ? "" : "open-application-modal";
                    ?>
                        <div class="job-card job-card-hover bg-white p-8 rounded-[1.5rem] border relative overflow-hidden group cursor-pointer <?php echo $card_class . ' ' . $extra_class; ?>" 
                             data-dept="<?php echo $dept_slug; ?>"
                             data-job-id="<?php echo $job_id; ?>"
                             data-job-title="<?php echo esc_attr(get_the_title()); ?>"
                             onclick="<?php echo $card_onclick; ?>"
                        >
                            
                            <!-- HOT LABEL -->
                            <?php if ($is_hot): ?>
                                <div class="absolute -right-12 top-6 bg-[#f8c03f] text-[#052e16] text-[10px] font-bold px-12 py-1 rotate-45 shadow-sm z-10 tracking-widest">
                                    HOT / GẤP
                                </div>
                            <?php endif; ?>

                            <div class="flex flex-col h-full relative z-10">
                                <div class="flex justify-between items-start mb-5">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase tracking-wider border <?php echo $badge_class; ?>">
                                        <?php echo $dept_name; ?>
                                    </span>
                                </div>

                                <h3 class="text-xl font-serif font-bold text-[#1F2937] group-hover:text-[#54b259] transition-colors mb-3 pr-8 job-title">
                                    <?php the_title(); ?>
                                </h3>
                                
                                <div class="text-gray-500 text-sm mb-8 line-clamp-2 font-light leading-relaxed">
                                    <?php the_content(); // Use content as description ?>
                                </div>

                                <div class="mt-auto pt-6 border-t border-gray-50 flex items-center justify-between">
                                    <div class="flex items-center gap-5 text-sm text-gray-500 font-medium">
                                        <span class="flex items-center gap-1.5"><i data-lucide="map-pin" class="w-4 h-4 text-[#54b259]"></i> <?php echo $location ? $location : 'Toàn Quốc'; ?></span>
                                        <span class="flex items-center gap-1.5"><i data-lucide="dollar-sign" class="w-4 h-4 text-[#54b259]"></i> <?php echo $salary ? $salary : 'Thỏa thuận'; ?></span>
                                    </div>
                                    
                                    <a href="<?php echo $job_link; ?>" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-[#54b259] group-hover:text-white transition-all transform group-hover:rotate-[-45deg] shadow-sm">
                                        <i data-lucide="arrow-right" class="w-[18px] h-[18px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php 
                    endwhile; 
                    wp_reset_postdata();
                endif; 
                ?>
                </div>

            <!-- Empty State (Hidden by default) -->
            <div id="emptyJobState" class="text-center py-32 bg-white rounded-[2rem] border border-dashed border-gray-300 hidden">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                    <i data-lucide="search" class="w-8 h-8"></i>
                </div>
                <p class="text-gray-400 font-light text-lg">Hiện tại chưa có vị trí nào cho bộ phận này.</p>
            </div>

        </div>
    </section>

    <!-- 4. QUY TRÌNH TUYỂN DỤNG - MINIMALIST STEPS -->
    <section class="py-32 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-24">
                <h4 class="text-[#f8c03f] font-bold uppercase tracking-[0.2em] text-xs mb-4">Quy Trình</h4>
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-[#052e16]">Hành Trình Gia Nhập</h2>
            </div>

            <div class="relative">
                 <!-- Connector Line (Desktop) -->
                 <div class="hidden md:block absolute top-[2.5rem] left-0 w-full h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent z-0"></div>

                 <div class="grid grid-cols-1 md:grid-cols-4 gap-12 relative z-10">
                    <?php
                    $steps = [
                        ['step' => "01", 'title' => "Ứng Tuyển", 'desc' => "Gửi CV qua email hoặc website."],
                        ['step' => "02", 'title' => "Sơ Vấn", 'desc' => "Trao đổi ngắn qua điện thoại."],
                        ['step' => "03", 'title' => "Phỏng Vấn", 'desc' => "Gặp gỡ trực tiếp quản lý."],
                        ['step' => "04", 'title' => "Gia Nhập", 'desc' => "Nhận Offer & Onboarding."]
                    ];
                    foreach ($steps as $item): ?>
                        <div class="flex flex-col items-center text-center group">
                            <div class="w-20 h-20 bg-white border-2 border-[#54b259] rounded-full flex items-center justify-center text-2xl font-bold text-[#54b259] mb-8 shadow-[0_0_0_8px_rgba(255,255,255,1)] relative transition-all duration-500 group-hover:bg-[#54b259] group-hover:text-white group-hover:shadow-[0_10px_30px_-10px_rgba(84,178,89,0.5)]">
                                <?php echo $item['step']; ?>
                            </div>
                            <h4 class="font-bold text-[#1F2937] text-lg mb-2 group-hover:text-[#54b259] transition-colors"><?php echo $item['title']; ?></h4>
                            <p class="text-gray-500 text-sm font-light leading-relaxed m-0"><?php echo $item['desc']; ?></p>
                        </div>
                    <?php endforeach; ?>
                 </div>
            </div>
        </div>
    </section>

    <!-- 5. CTA EMAIL - LUXURY DARK FOOTER -->
    <section class="py-32 bg-[#052e16] text-white relative overflow-hidden">
        <!-- Abstract Pattern -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#54b259]/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#f8c03f]/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="w-16 h-1 bg-[#f8c03f] mx-auto mb-8"></div>
            <h2 class="text-4xl md:text-5xl font-serif font-bold mb-8">Bạn chưa tìm thấy vị trí phù hợp?</h2>
            <p className="text-gray-300 max-w-2xl mx-auto mb-16 leading-relaxed font-light text-lg">
                Đừng ngần ngại gửi CV của bạn vào ngân hàng nhân sự của NP FOOD. <br/>
                Chúng tôi sẽ liên hệ ngay khi có cơ hội phù hợp với năng lực của bạn.
            </p>
          
            <div class="inline-flex flex-col sm:flex-row gap-6 items-center">
                <div class="px-10 py-5 bg-white/5 backdrop-blur-xl border border-white/10 rounded-full text-[#f8c03f] font-bold text-lg flex items-center gap-4 hover:bg-white/10 transition-colors">
                    <i data-lucide="briefcase" class="w-[22px] h-[22px]"></i> hr@npfood.vn
                </div>
                <!-- Global Apply Button -->
                <button 
                    data-job-title="Ứng tuyển tự do"
                    class="open-application-modal px-12 py-5 bg-gradient-to-r from-[#f8c03f] to-[#eab308] text-[#052e16] font-bold rounded-full hover:shadow-[0_0_40px_rgba(248,192,63,0.4)] transition-all uppercase text-sm tracking-[0.15em] transform hover:-translate-y-1 border-none cursor-pointer"
                >
                    Gửi CV Ngay
                </button>
            </div>
        </div>
    </section>
</div>

<!-- APPLICATION MODAL (New V2) -->
<div id="applicationModal" class="fixed inset-0 z-[9999] hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm animate-[fadeIn_0.3s_ease-out]">
    <div class="bg-white rounded-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto shadow-2xl relative custom-scrollbar flex flex-col">
        
        <!-- Close Button -->
        <button class="close-modal absolute top-4 right-4 p-2 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-500 transition-colors z-10">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>

        <div class="p-8 md:p-10">
            <!-- Success State -->
            <div id="successState" class="hidden flex-col items-center justify-center py-12 text-center">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center text-[#54b259] mb-6">
                    <i data-lucide="check-circle" class="w-12 h-12" stroke-width="3"></i>
                </div>
                <h3 class="text-3xl font-serif font-bold text-[#052e16] mb-4">Ứng Tuyển Thành Công!</h3>
                <p class="text-gray-500 max-w-md mb-8">
                    Cảm ơn bạn đã quan tâm đến NP FOOD. Bộ phận Tuyển dụng sẽ xem xét hồ sơ và liên hệ với bạn trong thời gian sớm nhất.
                </p>
                <button class="close-modal px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-full transition-colors">
                    Đóng
                </button>
            </div>

            <!-- Form State -->
            <div id="formState">
                <!-- Header -->
                <div class="mb-8 border-b border-gray-100 pb-4 text-center md:text-left">
                    <h2 class="text-3xl font-serif font-bold text-[#052e16] mb-2">Ứng Tuyển Ngay</h2>
                    <p class="text-gray-500 text-sm">Điền thông tin để gia nhập đội ngũ NP FOOD.</p>
                </div>

                <form id="applicationForm" class="space-y-8">
                    <!-- 1. Position Selection -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-xl border border-gray-100">
                        <div class="col-span-1 md:col-span-2 text-xs font-bold text-[#54b259] uppercase tracking-wider mb-[-10px]">
                            Vị trí ứng tuyển
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Bộ Phận <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="deptSelect" name="department" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] appearance-none bg-white font-medium cursor-pointer" required>
                                    <option value="" disabled selected>-- Chọn bộ phận --</option>
                                    <!-- Populated by JS -->
                                </select>
                                <i data-lucide="chevron-down" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Vị Trí Chi Tiết <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="jobSelect" name="job_id" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] appearance-none bg-white font-medium disabled:bg-gray-100 disabled:text-gray-400 cursor-pointer" required disabled>
                                    <option value="" disabled selected>-- Chọn vị trí --</option>
                                    <!-- Populated by JS -->
                                </select>
                                <i data-lucide="chevron-down" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Personal Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Họ và tên <span class="text-red-500">*</span></label>
                            <input type="text" name="fullname" required placeholder="Nguyễn Văn A" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] focus:ring-2 focus:ring-[#54b259]/20">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Số điện thoại <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" required placeholder="0912 xxx xxx" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] focus:ring-2 focus:ring-[#54b259]/20">
                        </div>
                    </div>
                    
                    <!-- Email field (Added back as it is critical) -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required placeholder="email@example.com" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] focus:ring-2 focus:ring-[#54b259]/20">
                    </div>

                    <!-- 3. Address (API - 2 Levels) -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-2 mb-2 border-b border-gray-100 pb-2">
                             <i data-lucide="map-pin" class="w-4 h-4 text-[#54b259]"></i>
                             <span class="text-sm font-bold uppercase tracking-wider text-gray-500">Nơi ở hiện tại</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 relative z-20"> <!-- z-20 for dropdowns -->
                            <!-- Province Combobox -->
                            <div class="relative group" id="provinceCombobox">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tỉnh / Thành phố <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="provInput" placeholder="Nhập hoặc chọn Tỉnh..." autocomplete="off"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] bg-white font-medium cursor-pointer">
                                    <input type="hidden" name="province" id="provHidden">
                                    
                                    <i data-lucide="chevron-down" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                    
                                    <div id="provList" class="combobox-dropdown custom-scrollbar"></div>
                                </div>
                            </div>
                            
                            <!-- Ward Combobox -->
                            <div class="relative group" id="wardCombobox">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Xã / Phường <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="wardInput" name="ward" placeholder="Nhập hoặc chọn Xã/Phường..." autocomplete="off" disabled
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] bg-white font-medium disabled:bg-gray-100 disabled:text-gray-400 cursor-pointer">
                                    
                                    <i data-lucide="chevron-down" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                    
                                    <div id="wardList" class="combobox-dropdown custom-scrollbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Link CV -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link CV (Google Drive / PDF Online) <span class="text-red-500">*</span></label>
                        <div class="relative group">
                            <input type="url" name="cv_file" required placeholder="https://docs.google.com/document/d/..." class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259] text-blue-600 font-medium">
                            <i data-lucide="link" class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#54b259] transition-colors"></i>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 italic flex items-center gap-1">
                            <i data-lucide="sparkles" class="w-3 h-3 text-[#f8c03f]"></i>
                            Mẹo: Đảm bảo quyền truy cập là "Bất kỳ ai có liên kết" để chúng tôi có thể xem được hồ sơ.
                        </p>
                    </div>

                    <!-- 5. Documents (Dynamic List) -->
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <label class="block text-sm font-bold text-gray-700">Tài liệu bổ sung (Portfolio, Bằng cấp...)</label>
                            <button type="button" id="addDocBtn" class="text-xs font-bold text-[#54b259] hover:text-[#14532d] flex items-center gap-1 transition-colors px-3 py-1 bg-[#54b259]/10 rounded-full">
                                <i data-lucide="plus" class="w-3.5 h-3.5"></i> Thêm link
                            </button>
                        </div>
                        <div id="docsContainer" class="space-y-3">
                            <!-- Rows via JS -->
                        </div>
                    </div>

                     <!-- 6. Message -->
                    <div>
                         <label class="block text-sm font-bold text-gray-700 mb-2">Lời nhắn (Tùy chọn)</label>
                         <textarea id="messageInput" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#54b259]" placeholder="Bạn muốn nhắn gửi gì thêm..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <p class="form-message text-sm font-bold text-center hidden"></p>
                    <button type="submit" class="w-full py-4 rounded-lg font-bold uppercase tracking-widest text-sm text-[#052e16] bg-[#f8c03f] hover:bg-[#eab308] hover:shadow-lg transition-all flex items-center justify-center gap-2 transform hover:-translate-y-1">
                        <span>Gửi Hồ Sơ Ứng Tuyển</span>
                        <i data-lucide="arrow-right" class="w-[18px] h-[18px]"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Prepare Data for JS
$js_depts = [];
$js_jobs = [];

if (!empty($dept_terms) && !is_wp_error($dept_terms)) {
    foreach ($dept_terms as $t) {
        $js_depts[] = ['id' => $t->slug, 'name' => $t->name];
    }
}

// Fetch ALL jobs for JS lookup
$all_jobs_query = new WP_Query([
    'post_type' => 'np_job', 
    'posts_per_page' => -1,
    'post_status' => 'publish'
]);
if ($all_jobs_query->have_posts()) {
    while ($all_jobs_query->have_posts()) {
        $all_jobs_query->the_post();
        $terms = get_the_terms(get_the_ID(), 'np_department');
        $d_slug = ($terms && !is_wp_error($terms)) ? $terms[0]->slug : 'other';
        $js_jobs[] = [
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'dept' => $d_slug
        ];
    }
    wp_reset_postdata();
}
?>

<script>
    // Data passed from PHP
    const DEPARTMENTS = <?php echo json_encode($js_depts); ?>;
    const JOBS = <?php echo json_encode($js_jobs); ?>;

    function filterJobs(deptId) {
        const tabs = document.querySelectorAll('.dept-tab');
        tabs.forEach(tab => {
            if (tab.dataset.id === deptId) {
                tab.classList.remove('bg-white', 'text-gray-500', 'border-gray-200');
                tab.classList.add('bg-[#54b259]', 'text-white', 'border-[#54b259]', 'shadow-lg', 'shadow-[#54b259]/30');
            } else {
                tab.classList.add('bg-white', 'text-gray-500', 'border-gray-200');
                tab.classList.remove('bg-[#54b259]', 'text-white', 'border-[#54b259]', 'shadow-lg', 'shadow-[#54b259]/30');
            }
        });
        const allJobs = document.querySelectorAll('.job-card');
        let visibleCount = 0;
        allJobs.forEach(job => {
            if (deptId === 'all' || job.dataset.dept === deptId) {
                job.classList.remove('hidden');
                visibleCount++;
            } else {
                job.classList.add('hidden');
            }
        });
        const emptyState = document.getElementById('emptyJobState');
        if(emptyState) {
            if (visibleCount === 0) emptyState.classList.remove('hidden'); else emptyState.classList.add('hidden');
        }
    }

    // Modal & App Logic
    document.addEventListener('DOMContentLoaded', function() {
        // Populate Departments
        const deptSelect = document.getElementById('deptSelect');
        DEPARTMENTS.forEach(d => {
            const opt = document.createElement('option');
            opt.value = d.id;
            opt.textContent = d.name;
            deptSelect.appendChild(opt);
        });

        // Handle Dept Change -> Update Jobs
        deptSelect.addEventListener('change', function() {
            const selectedDept = this.value;
            const jobSelect = document.getElementById('jobSelect');
            jobSelect.innerHTML = '<option value="" disabled selected>-- Chọn vị trí --</option>';
            
            const availableJobs = JOBS.filter(j => j.dept === selectedDept);
            availableJobs.forEach(j => {
                const opt = document.createElement('option');
                opt.value = j.id;
                opt.textContent = j.title;
                jobSelect.appendChild(opt);
            });
            jobSelect.disabled = false;
        });

        // --- DOCS LOGIC ---
        function addDocRow() {
            const container = document.getElementById('docsContainer');
            const div = document.createElement('div');
            div.className = 'flex gap-3 items-start p-3 bg-gray-50 rounded-lg border border-gray-200 hover:border-[#54b259]/30 transition-colors group/doc';
            div.innerHTML = `
                <div class="flex-1 space-y-2">
                    <input type="text" class="doc-name w-full px-3 py-2 text-sm rounded border border-gray-300 focus:outline-none focus:border-[#54b259]" placeholder="Tên tài liệu (VD: Portfolio)">
                    <div class="relative">
                        <input type="url" class="doc-link w-full pl-8 pr-3 py-2 text-sm rounded border border-gray-300 focus:outline-none focus:border-[#54b259] text-blue-600" placeholder="Link (Dropbox, Behance...)">
                        <i data-lucide="link" class="w-3.5 h-3.5 absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                <button type="button" class="remove-doc p-2 text-gray-400 hover:text-red-500 hover:bg-white rounded transition-colors self-center" title="Xóa">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                </button>
            `;
            container.appendChild(div);
            if(window.lucide) lucide.createIcons();
            
            div.querySelector('.remove-doc').addEventListener('click', function() {
                if(container.children.length > 1) {
                    div.remove();
                } else {
                    div.querySelector('.doc-name').value = '';
                    div.querySelector('.doc-link').value = '';
                }
            });
        }
        
        document.getElementById('addDocBtn').addEventListener('click', addDocRow);

        // Open Modal Handler
        const modal = document.getElementById('applicationModal');
        const openBtns = document.querySelectorAll('.open-application-modal');
        
        openBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const jobId = this.dataset.jobId;
                const deptId = this.dataset.dept;

                // Reset Form state
                document.getElementById('formState').classList.remove('hidden');
                document.getElementById('successState').classList.add('hidden');
                document.getElementById('applicationForm').reset();
                
                // Reset Docs
                document.getElementById('docsContainer').innerHTML = '';
                addDocRow(); // Add one initial row
                
                // Set Dept first
                if (deptId && deptSelect.querySelector(`option[value="${deptId}"]`)) {
                    deptSelect.value = deptId;
                    deptSelect.dispatchEvent(new Event('change'));
                    
                    if (jobId) {
                        setTimeout(() => {
                           const jobSelect = document.getElementById('jobSelect');
                           if(jobSelect.querySelector(`option[value="${jobId}"]`)) {
                               jobSelect.value = jobId;
                           }
                        }, 50);
                    }
                } else {
                    deptSelect.value = "";
                    const jobSelect = document.getElementById('jobSelect');
                    jobSelect.innerHTML = '<option value="" disabled selected>-- Chọn vị trí --</option>';
                    jobSelect.disabled = true;
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        // Close Modal
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });

        // --- ADDRESS LOGIC (SEARCHABLE COMBOBOX) ---
        const PROVINCE_API = 'https://provinces.open-api.vn/api/v2';
        let allProvinces = [];
        let allWards = [];

        // Elements
        const provInput = document.getElementById('provInput');
        const provHidden = document.getElementById('provHidden');
        const provList = document.getElementById('provList');
        
        const wardInput = document.getElementById('wardInput');
        const wardList = document.getElementById('wardList'); // HTML element exists now from step 2

        // --- Helper: Setup Combobox ---
        function setupCombobox(input, listElement, getData, onSelect) {
            function renderList(items) {
                listElement.innerHTML = '';
                if(items.length === 0) {
                     listElement.innerHTML = '<div class="p-3 text-gray-400 text-xs italic">Không tìm thấy kết quả</div>';
                     return;
                }
                items.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'combobox-item';
                    div.textContent = item.name;
                    div.onclick = function() {
                        input.value = item.name;
                        onSelect(item);
                        listElement.classList.remove('active');
                    };
                    listElement.appendChild(div);
                });
            }

            function filterAndRender() {
                const term = input.value.toLowerCase();
                const data = getData();
                const filtered = term ? data.filter(i => i.name.toLowerCase().includes(term)) : data;
                renderList(filtered);
                listElement.classList.add('active');
            }

            // Input Event (Filtering)
            input.addEventListener('input', function() {
                filterAndRender();
            });

            // Focus Event (Show All/Filtered)
            input.addEventListener('focus', function() {
                filterAndRender();
            });

            // Click Outside to Close
            document.addEventListener('click', function(e) {
                if (!input.contains(e.target) && !listElement.contains(e.target)) {
                    listElement.classList.remove('active');
                }
            });
        }

        // --- 1. Init Province Combobox ---
        // Fetch Provinces
        fetch(`${PROVINCE_API}/p/`)
            .then(res => res.json())
            .then(data => {
                allProvinces = data;
                // Init Combobox
                setupCombobox(provInput, provList, () => allProvinces, function(selectedItem) {
                    provHidden.value = selectedItem.code; // Store code for API
                    // Trigger Ward Load
                    loadWards(selectedItem.code);
                });
            })
            .catch(err => console.error(err));


        // --- 2. Ward Logic ---
        function loadWards(provinceCode) {
             wardInput.value = '';
             wardInput.placeholder = 'Đang tải dữ liệu...';
             wardInput.disabled = true;
             wardList.innerHTML = '';
             allWards = [];
             
             // Using jQuery AJAX to match existing proxy logic if available
             if (typeof np_recruit_obj !== 'undefined') {
                jQuery.ajax({
                    url: np_recruit_obj.ajax_url,
                    type: 'GET',
                    data: {
                        action: 'np_get_wards',
                        province_code: provinceCode
                    },
                    success: function(response) {
                        if(response.success && Array.isArray(response.data)) {
                            allWards = response.data; // [{name: '...'}, ...]
                            wardInput.disabled = false;
                            wardInput.placeholder = 'Nhập hoặc chọn Xã/Phường...';
                        } else {
                            wardInput.placeholder = 'Không có dữ liệu';
                            wardInput.disabled = false;
                        }
                    },
                    error: function() {
                        wardInput.placeholder = 'Lỗi tải dữ liệu';
                         wardInput.disabled = false;
                    }
                });
             }
        }

        // Init Ward Combobox (Initially empty)
        setupCombobox(wardInput, wardList, () => allWards, function(item) {
            // Ward Selected
        });
        
        // Handle Submit
        const appForm = document.getElementById('applicationForm');
        appForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = appForm.querySelector('button[type="submit"]');
            const msg = appForm.querySelector('.form-message');
            const originalBtnText = btn.innerHTML;
            
            // Validation
             if(!provHidden.value) {
                 alert("Vui lòng chọn Tỉnh/Thành phố từ danh sách gợi ý.");
                 provInput.focus();
                 return;
            }
            if(!wardInput.value.trim()) {
                 alert("Vui lòng nhập hoặc chọn Xã/Phường.");
                 wardInput.focus();
                 return;
            }
            
            btn.disabled = true;
            btn.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> Đang gửi...';
            if (window.lucide) lucide.createIcons();

            const formData = new FormData(appForm);
            formData.append('action', 'np_submit_application');
            if (typeof np_recruit_obj !== 'undefined') {
                formData.append('security', np_recruit_obj.nonce);
            }

            // Address: Override with explicit combo values
            formData.set('province_name', provInput.value);
            formData.set('commune', wardInput.value); 

            // Message + Docs Construction
            const docs = [];
            const docRows = document.querySelectorAll('#docsContainer > div');
            if(docRows.length > 0) {
                 docRows.forEach(row => {
                    const nameInput = row.querySelector('.doc-name');
                    const linkInput = row.querySelector('.doc-link');
                    if(nameInput && linkInput) {
                        const name = nameInput.value.trim();
                        const link = linkInput.value.trim();
                        if(name || link) {
                             docs.push(`- ${name || 'Tài liệu'}: ${link}`);
                        }
                    }
                });
            }
            
            const msgInput = document.getElementById('messageInput') || appForm.querySelector('textarea[name="message"]'); 
            const messageVal = msgInput ? msgInput.value.trim() : (formData.get('message') || '');

            let finalMsg = messageVal;
            if(docs.length > 0) {
                finalMsg += "\n\n--- TÀI LIỆU BỔ SUNG ---\n" + docs.join("\n");
            }
            formData.set('message', finalMsg);

            jQuery.ajax({
                url: np_recruit_obj.ajax_url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        document.getElementById('formState').classList.add('hidden');
                        document.getElementById('successState').classList.remove('hidden');
                        document.getElementById('successState').classList.add('flex');
                    } else {
                        msg.textContent = response.data.message || 'Có lỗi xảy ra.';
                        msg.classList.remove('hidden', 'text-green-500');
                        msg.classList.add('text-red-500');
                    }
                },
                error: function() {
                     msg.textContent = 'Lỗi kết nối. Vui lòng thử lại.';
                     msg.classList.remove('hidden', 'text-green-500');
                     msg.classList.add('text-red-500');
                },
                complete: function() {
                    btn.disabled = false;
                    btn.innerHTML = originalBtnText;
                    if (window.lucide) lucide.createIcons();
                }
            });
        });

    });
</script>

<?php get_footer(); ?>
