<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#54b259',     // Xanh Lá thương hiệu
                        secondary: '#f8c03f',   // Vàng Gold
                        text: '#1F2937',
                        bgLight: '#F3F4F6'
                    },
                    fontFamily: {
                        sans: ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

	<?php wp_head(); ?>
    <style>
        /* Premium Dropdown Animation */
        .nav-dropdown {
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px) scale(0.98);
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            transform-origin: top center;
        }
        
        /* Show state */
        .group:hover .nav-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
            transition-delay: 0.05s;
        }

        /* Invisible bridge to prevent closing when moving cursor */
        .nav-dropdown::before {
            content: "";
            position: absolute;
            top: -15px;
            left: 0;
            width: 100%;
            height: 15px;
            background: transparent;
        }

        /* Triangle Arrow */
        .nav-arrow {
            position: absolute;
            top: -6px;
            left: 50%; /* Center relative to dropdown, might need adjustment for Mega */
            transform: translateX(-50%) rotate(45deg);
            width: 12px;
            height: 12px;
            background: white;
            border-top: 1px solid #f3f4f6; /* gray-100 */
            border-left: 1px solid #f3f4f6;
            z-index: 60;
        }

        /* Mega menu specific override for arrow if needed */
        .mega-menu-container .nav-arrow {
             /* The arrow is inside the dropdown which is centered relative to button. 
                Since dropdown is centered, arrow at 50% is correct. */
        }
    </style>
</head>

<body <?php body_class( 'bg-gray-50 text-gray-800 font-sans' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site flex flex-col min-h-screen">
    
    <!-- 1. TOP BAR -->
    <div class="bg-[#184241] text-white py-2 text-xs font-medium hidden lg:block border-b border-[#2a5e5d]">
        <div class="container mx-auto px-4 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-secondary"></i> 0869.858.268</span>
                <span class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-secondary"></i> npnutri1908@gmail.com</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="opacity-80 hover:opacity-100 cursor-pointer transition-opacity text-white no-underline hover:text-secondary">Tin tức</a>
                <a href="/tuyen-dung" class="opacity-80 hover:opacity-100 cursor-pointer transition-opacity text-white no-underline hover:text-secondary">Tuyển dụng</a>
                <div class="flex items-center gap-2 ml-4 border-l border-white/20 pl-4 cursor-pointer group/lang relative">
                     <div class="flex items-center gap-1 hover:text-secondary transition-colors">
                        <i data-lucide="globe" class="w-3.5 h-3.5"></i> <span>VN</span> <i data-lucide="chevron-down" class="w-2.5 h-2.5"></i>
                     </div>
                </div>
            </div>
        </div>
    </div>

	<header id="masthead" class="site-header w-full z-50 transition-all duration-300 border-b border-gray-100 relative bg-white">
        <div class="container mx-auto px-4 lg:px-8 flex justify-between items-center py-4 transition-all duration-300 relative" id="main-nav-container">
            
            <!-- A. LOGO -->
            <div class="site-branding flex items-center gap-3 cursor-pointer">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 no-underline group hover:no-underline">
                        <div class="w-10 h-10 rounded bg-primary flex items-center justify-center font-bold text-xl text-white shadow-sm">
                            NP
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl tracking-wide uppercase leading-none text-primary">
                                <?php bloginfo( 'name' ); ?>
                            </span>
                            <span class="text-[9px] uppercase tracking-[0.25em] mt-1 text-gray-500 font-semibold">
                                Distribution
                            </span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

            <!-- B. DESKTOP MENU -->
            <nav id="site-navigation" class="hidden lg:flex items-center gap-8">
                
                <!-- Menu Item 1: Trang Chủ -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-sm font-bold uppercase tracking-wide text-primary hover:text-secondary transition-colors relative group py-4">
                    Trang Chủ
                    <span class="absolute bottom-2 left-0 w-0 h-0.5 bg-secondary transition-all group-hover:w-full"></span>
                </a>

                <!-- Menu Item 2: Về NP Food (Dropdown - Left Aligned) -->
                <div class="relative group py-4 cursor-pointer">
                    <button class="flex items-center gap-1 text-sm font-bold uppercase tracking-wide text-gray-600 group-hover:text-primary transition-colors bg-transparent border-none p-0 cursor-pointer">
                        Về NP Food <i data-lucide="chevron-down" class="w-3.5 h-3.5 transform group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    <div class="nav-dropdown absolute top-full left-0 mt-1 w-64 bg-white shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] rounded-lg border border-gray-100 z-50 pt-2 pb-2">
                        <!-- Arrow -->
                        <div class="nav-arrow left-6"></div>
                        
                        <div class="relative bg-white rounded-lg overflow-hidden">
                            <a href="#" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-gray-600 hover:text-primary transition-all group/item no-underline border-b border-dashed border-gray-50 last:border-0">
                                <span class="text-gray-400 group-hover/item:text-secondary transition-colors"><i data-lucide="briefcase" class="w-4 h-4"></i></span>
                                <span class="text-sm font-medium">Tổng Quan Doanh Nghiệp</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-gray-600 hover:text-primary transition-all group/item no-underline border-b border-dashed border-gray-50 last:border-0">
                                <span class="text-gray-400 group-hover/item:text-secondary transition-colors"><i data-lucide="globe" class="w-4 h-4"></i></span>
                                <span class="text-sm font-medium">Sứ Mệnh & Tầm Nhìn</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-gray-600 hover:text-primary transition-all group/item no-underline border-b border-dashed border-gray-50 last:border-0">
                                <span class="text-gray-400 group-hover/item:text-secondary transition-colors"><i data-lucide="award" class="w-4 h-4"></i></span>
                                <span class="text-sm font-medium">Giá Trị Cốt Lõi</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-gray-600 hover:text-primary transition-all group/item no-underline border-b border-dashed border-gray-50 last:border-0">
                                <span class="text-gray-400 group-hover/item:text-secondary transition-colors"><i data-lucide="sprout" class="w-4 h-4"></i></span>
                                <span class="text-sm font-medium">Nguyên Tắc Kinh Doanh</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 3: Thương Hiệu (Mega Menu - Container Centered) -->
                <div class="group static py-4 cursor-pointer mega-menu-container">
                    <button class="flex items-center gap-1 text-sm font-bold uppercase tracking-wide text-gray-600 group-hover:text-primary transition-colors bg-transparent border-none p-0 cursor-pointer">
                        Thương Hiệu <i data-lucide="chevron-down" class="w-3.5 h-3.5 transform group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>

                    <div class="nav-dropdown absolute top-full left-0 w-full z-50 px-4 group-hover:px-4">
                         <!-- Wrapper for centering content -->
                        <div class="max-w-[1000px] mx-auto bg-white shadow-[0_15px_50px_-12px_rgba(0,0,0,0.15)] rounded-xl border border-gray-100 flex p-0 relative overflow-hidden">
                            
                            <!-- Left: 2 Products (Miwako & Miwako A+) -->
                            <div class="w-2/3 p-8 grid grid-cols-2 gap-8 border-r border-gray-100">
                                <!-- Product 1: Miwako -->
                                <div class="flex flex-col group/prod">
                                    <div class="h-40 bg-white border border-gray-100 rounded-lg overflow-hidden mb-4 relative p-2">
                                        <!-- Real Image for Miwako -->
                                        <img src="https://npfood.vn/wp-content/uploads/2023/05/npfood-products-3.png" alt="Miwako" class="w-full h-full object-contain transform group-hover/prod:scale-105 transition-transform duration-500">
                                    </div>
                                    <h4 class="font-bold text-lg text-primary mb-2 group-hover/prod:text-secondary transition-colors">Miwako</h4>
                                    <p class="text-sm text-gray-500 mb-4 line-clamp-3">Nhập khẩu chính hãng từ Malaysia. Thương hiệu uy tín Dale & Cecil, sản xuất bởi nhà máy Omega Health Products.</p>
                                    <a href="https://miwakovn.com/" class="mt-auto inline-flex items-center text-xs font-bold text-white bg-primary py-2 px-4 rounded hover:bg-secondary hover:text-primary transition-colors w-fit">
                                        XEM NGAY
                                    </a>
                                </div>

                                <!-- Product 2: Miwako A+ -->
                                <div class="flex flex-col group/prod">
                                    <div class="h-40 bg-white border border-gray-100 rounded-lg overflow-hidden mb-4 relative p-2">
                                        <!-- Real Image for Miwako A+ -->
                                        <img src="https://npfood.vn/wp-content/uploads/2023/05/npfood-products-1.png" alt="Miwako A+" class="w-full h-full object-contain transform group-hover/prod:scale-105 transition-transform duration-500">
                                    </div>
                                    <h4 class="font-bold text-lg text-primary mb-2 group-hover/prod:text-secondary transition-colors">Miwako A+</h4>
                                    <p class="text-sm text-gray-500 mb-4 line-clamp-3">Sản phẩm cao cấp nhập khẩu Malaysia. Thuộc Dale & Cecil, được sản xuất tại nhà máy chuẩn quốc tế Omega Health Products.</p>
                                    <a href="https://miwakovn.com/" class="mt-auto inline-flex items-center text-xs font-bold text-white bg-primary py-2 px-4 rounded hover:bg-secondary hover:text-primary transition-colors w-fit">
                                        XEM NGAY
                                    </a>
                                </div>
                            </div>

                            <!-- Right: Latest Post -->
                            <div class="w-1/3 p-8 bg-gray-50">
                                <h4 class="flex items-center gap-2 font-bold text-primary mb-6 uppercase text-xs tracking-widest pb-3 border-b border-gray-200">
                                    <i data-lucide="newspaper" class="w-4 h-4 text-secondary"></i> Bài Viết Mới Nhất
                                </h4>
                                
                                <?php
                                $latest_header_post = new WP_Query( array(
                                    'posts_per_page' => 1,
                                    'ignore_sticky_posts' => 1
                                ));

                                if ( $latest_header_post->have_posts() ) :
                                    while ( $latest_header_post->have_posts() ) : $latest_header_post->the_post();
                                ?>
                                    <article class="flex flex-col h-full">
                                        <a href="<?php the_permalink(); ?>" class="block h-40 rounded-lg overflow-hidden mb-4 shadow-sm hover:shadow-md transition-shadow">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']); ?>
                                            <?php else : ?>
                                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                                                    <i data-lucide="image" class="w-8 h-8"></i>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                        
                                        <div class="mb-2 text-xs text-secondary font-bold uppercase tracking-wide">
                                            <?php echo get_the_date(); ?>
                                        </div>

                                        <h3 class="text-base font-bold text-gray-800 mb-2 line-clamp-2 leading-snug hover:text-primary transition-colors">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        
                                        <div class="text-xs text-gray-500 line-clamp-3 mb-4">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <a href="<?php the_permalink(); ?>" class="text-xs font-bold text-primary hover:text-secondary uppercase tracking-wider flex items-center gap-1 hover:gap-2 transition-all mt-auto no-underline">
                                            Đọc chi tiết <i data-lucide="chevron-right" class="w-3 h-3"></i>
                                        </a>
                                    </article>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else:
                                    echo '<p class="text-sm text-gray-500">Chưa có bài viết nào.</p>';
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 4 -->
                <a href="#" class="text-sm font-bold uppercase tracking-wide text-gray-600 hover:text-primary transition-colors no-underline">Hệ Thống Phân Phối</a>
                
                <!-- Menu Item 5 -->
                <a href="#" class="text-sm font-bold uppercase tracking-wide text-gray-600 hover:text-primary transition-colors no-underline">Tin Tức</a>

            </nav>

            <!-- C. ACTIONS -->
            <div class="hidden lg:flex items-center gap-4">
                <button class="text-gray-400 hover:text-primary transition-colors bg-transparent border-none cursor-pointer">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </button>
                <a href="#contact" class="px-5 py-2.5 bg-secondary text-[#1a4e4d] rounded font-bold text-xs uppercase tracking-widest hover:bg-[#e5b035] transition-colors shadow-sm no-underline inline-block">
                    Liên Hệ Hợp Tác
                </a>
            </div>

            <!-- D. MOBILE MENU TOGGLE -->
            <div class="lg:hidden flex items-center gap-4">
                <button class="text-gray-600 bg-transparent border-none">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </button>
                <button id="mobile-menu-btn" class="text-primary bg-transparent border-none">
                    <i data-lucide="menu" class="w-7 h-7"></i>
                </button>
            </div>
        </div>
	</header>

    <!-- 3. MOBILE MENU SIDEBAR -->
    <div id="mobile-menu-overlay" class="fixed inset-0 z-[60] lg:hidden transition-opacity duration-300 opacity-0 invisible pointer-events-none">
        <!-- Backdrop -->
        <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/50"></div>
        
        <!-- Sidebar Content -->
        <div id="mobile-menu-sidebar" class="absolute top-0 right-0 w-[85%] max-w-sm h-full bg-white shadow-2xl transform transition-transform duration-300 translate-x-full flex flex-col">
            
            <!-- Mobile Header -->
            <div class="p-5 flex justify-between items-center border-b border-gray-100 bg-gray-50">
                <span class="font-bold text-primary uppercase tracking-wide">Menu</span>
                <button id="mobile-menu-close" class="text-gray-500 hover:text-red-500 bg-transparent border-none">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Mobile Links -->
            <div class="flex-1 overflow-y-auto p-5 space-y-2">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block py-3 px-4 rounded-lg bg-primary/5 text-primary font-bold no-underline">Trang Chủ</a>

                <!-- Mobile Dropdown 1 -->
                <div class="border border-gray-100 rounded-lg overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 font-bold text-gray-700 flex justify-between items-center">
                        Về NP Food <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </div>
                </div>

                <!-- Mobile Dropdown 2 -->
                <div class="border border-gray-100 rounded-lg overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 font-bold text-gray-700 flex justify-between items-center">
                        Thương Hiệu <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </div>
                </div>

                <a href="#" class="block py-3 px-4 font-medium text-gray-700 hover:text-primary no-underline">Hệ Thống Phân Phối</a>
                <a href="#" class="block py-3 px-4 font-medium text-gray-700 hover:text-primary no-underline">Tin Tức & Sự Kiện</a>
            </div>

            <!-- Mobile Footer -->
            <div class="p-5 border-t border-gray-100 bg-gray-50">
                <a href="#contact" class="block w-full py-3 bg-secondary text-[#1a4e4d] text-center rounded-lg font-bold uppercase tracking-wide text-sm shadow-sm no-underline">
                    Liên Hệ Hợp Tác
                </a>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        // Init Icons
        lucide.createIcons();

        // Sticky Header Logic
        const header = document.getElementById('masthead');
        const navContainer = document.getElementById('main-nav-container');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('fixed', 'top-0', 'shadow-md');
                header.classList.remove('relative');
                navContainer.classList.remove('py-4');
                navContainer.classList.add('py-2');
            } else {
                header.classList.remove('fixed', 'top-0', 'shadow-md');
                header.classList.add('relative');
                navContainer.classList.add('py-4');
                navContainer.classList.remove('py-2');
            }
        });

        // Mobile Menu Logic
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('mobile-menu-close');
        const backdrop = document.getElementById('mobile-menu-backdrop');
        const overlay = document.getElementById('mobile-menu-overlay');
        const sidebar = document.getElementById('mobile-menu-sidebar');

        function openMenu() {
            overlay.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
            overlay.classList.add('opacity-100', 'visible');
            setTimeout(() => {
                sidebar.classList.remove('translate-x-full');
                sidebar.classList.add('translate-x-0');
            }, 10);
        }

        function closeMenu() {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('translate-x-full');
            setTimeout(() => {
                overlay.classList.remove('opacity-100', 'visible');
                overlay.classList.add('opacity-0', 'invisible', 'pointer-events-none');
            }, 300);
        }

        mobileBtn.addEventListener('click', openMenu);
        closeBtn.addEventListener('click', closeMenu);
        backdrop.addEventListener('click', closeMenu);

    </script>
