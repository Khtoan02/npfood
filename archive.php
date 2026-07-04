<?php get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-primary selection:text-white min-h-screen">
    <!-- Hero / Header Section -->
    <?php
    $hero_bg_url = '';
    if ( have_posts() ) {
        global $posts;
        if ( ! empty( $posts ) && has_post_thumbnail( $posts[0]->ID ) ) {
            $hero_bg_url = get_the_post_thumbnail_url( $posts[0]->ID, 'full' );
        }
    }
    ?>
    <section class="relative bg-gradient-to-r from-[#184241] to-[#2a5e5d] text-white py-12 lg:py-20 overflow-hidden">
        <?php if ( ! empty( $hero_bg_url ) ) : ?>
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="<?php echo esc_url( $hero_bg_url ); ?>" class="w-full h-full object-cover object-center absolute inset-0" alt="Archive Hero Background" />
                <div class="absolute inset-0 bg-gradient-to-r from-[#184241]/95 to-[#2a5e5d]/85"></div>
            </div>
        <?php else : ?>
            <!-- Background Decoration -->
            <div class="absolute inset-0 opacity-[0.05] pointer-events-none z-0">
                <svg viewBox="0 0 100 100" class="w-full h-full fill-current text-white">
                    <circle cx="10" cy="10" r="30" />
                    <circle cx="80" cy="90" r="40" />
                </svg>
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs lg:text-sm text-gray-300 mb-6 font-medium">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-secondary transition-colors no-underline">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <a href="<?php echo esc_url( home_url( '/bai-viet' ) ); ?>" class="hover:text-secondary transition-colors no-underline">Tin tức</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-white font-semibold"><?php single_term_title(); ?></span>
            </nav>
            
            <h1 class="text-3xl lg:text-5xl font-serif font-bold leading-tight max-w-4xl text-white mb-4">
                <?php the_archive_title( '', '' ); ?>
            </h1>
            <?php if ( get_the_archive_description() ) : ?>
                <div class="text-sm lg:text-base text-gray-200 font-light max-w-2xl">
                    <?php the_archive_description(); ?>
                </div>
            <?php else : ?>
                <p class="text-sm lg:text-base text-gray-200 font-light max-w-2xl">
                    Danh sách các bài viết thuộc chuyên mục: <?php single_term_title(); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Main Grid Content -->
    <div class="container mx-auto px-4 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Archive Posts List (8 Cols) -->
            <main class="lg:col-span-8 space-y-10">
                <?php if ( have_posts() ) : ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <?php
                        while ( have_posts() ) : the_post();
                        ?>
                            <article class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col group h-full">
                                <!-- Post Image -->
                                <div class="h-52 overflow-hidden relative bg-gray-100 shrink-0">
                                    <a href="<?php the_permalink(); ?>" class="block h-full">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'medium_large', [
                                                'class' => 'w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500'
                                            ] ); ?>
                                        <?php else : ?>
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <i data-lucide="image" class="w-12 h-12"></i>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                    <!-- Category Pill -->
                                    <div class="absolute top-4 left-4 z-10">
                                        <span class="bg-[#f8c03f] text-[#1a4e4d] text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-sm">
                                            <?php
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo esc_html( $categories[0]->name );
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- Post Details -->
                                <div class="p-6 flex flex-col flex-1">
                                    <!-- Meta -->
                                    <div class="flex items-center gap-3 text-xs text-gray-400 mb-3 font-medium">
                                        <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5 text-secondary"></i> <?php echo get_the_date(); ?></span>
                                        <span>•</span>
                                        <span class="flex items-center gap-1"><i data-lucide="clock" class="w-3.5 h-3.5"></i> 
                                            <?php
                                            $content = get_the_content();
                                            $word_count = str_word_count( strip_tags( $content ) );
                                            $reading_time = ceil( $word_count / 200 );
                                            echo esc_html( $reading_time > 0 ? $reading_time : 1 ) . ' phút đọc';
                                            ?>
                                        </span>
                                    </div>

                                    <!-- Title -->
                                    <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                        <a href="<?php the_permalink(); ?>" class="no-underline text-gray-800 group-hover:text-primary transition-colors"><?php the_title(); ?></a>
                                    </h2>

                                    <!-- Excerpt -->
                                    <p class="text-sm text-gray-500 leading-relaxed mb-6 line-clamp-3">
                                        <?php echo wp_strip_all_tags( get_the_excerpt() ); ?>
                                    </p>

                                    <!-- Action Button -->
                                    <div class="mt-auto">
                                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-primary hover:text-secondary transition-colors no-underline">
                                            Đọc chi tiết <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php
                        endwhile;
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-center">
                        <?php
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => '<i data-lucide="chevron-left" class="w-4 h-4"></i>',
                            'next_text' => '<i data-lucide="chevron-right" class="w-4 h-4"></i>',
                            'class'     => 'flex gap-2'
                        ) );
                        ?>
                    </div>

                <?php else : ?>
                    <p class="text-center text-gray-500 py-12">Không tìm thấy bài viết nào trong chuyên mục này.</p>
                <?php endif; ?>
            </main>

            <!-- Right: Sidebar (4 Cols) -->
            <aside class="lg:col-span-4 space-y-8">
                
                <!-- Category List Widget -->
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-4 mb-6 flex items-center gap-2">
                        <i data-lucide="folder" class="w-5 h-5 text-primary"></i> Chuyên mục
                    </h3>
                    <ul class="space-y-3 list-none p-0 m-0">
                        <?php
                        $categories = get_categories();
                        foreach ( $categories as $category ) :
                        ?>
                            <li>
                                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="flex items-center justify-between text-sm text-gray-600 hover:text-primary transition-colors no-underline pb-2 border-b border-dashed border-gray-50">
                                    <span class="font-medium"><?php echo esc_html( $category->name ); ?></span>
                                    <span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-0.5 rounded-full font-bold"><?php echo esc_html( $category->count ); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Recent Posts Widget -->
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-4 mb-6 flex items-center gap-2">
                        <i data-lucide="newspaper" class="w-5 h-5 text-primary"></i> Bài viết mới nhất
                    </h3>
                    <div class="space-y-6">
                        <?php
                        $recent_args = array(
                            'posts_per_page' => 4,
                            'ignore_sticky_posts' => 1
                        );
                        $recent_query = new WP_Query( $recent_args );
                        if ( $recent_query->have_posts() ) :
                            while ( $recent_query->have_posts() ) : $recent_query->the_post();
                        ?>
                                <article class="flex gap-4 group">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>" class="w-16 h-16 rounded-lg overflow-hidden shrink-0 shadow-sm block bg-gray-100">
                                            <?php the_post_thumbnail( 'thumbnail', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300'] ); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="flex flex-col justify-center">
                                        <span class="text-[10px] font-bold text-[#f8c03f] uppercase mb-0.5"><?php echo get_the_date(); ?></span>
                                        <h4 class="text-sm font-bold text-gray-700 line-clamp-2 leading-snug group-hover:text-primary transition-colors">
                                            <a href="<?php the_permalink(); ?>" class="no-underline text-gray-700 group-hover:text-primary transition-colors"><?php the_title(); ?></a>
                                        </h4>
                                    </div>
                                </article>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <!-- CTA Banner Widget -->
                <div class="bg-gradient-to-br from-[#184241] to-[#2a5e5d] rounded-2xl shadow-md p-8 text-white relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#f8c03f]/10 rounded-full blur-xl"></div>
                    <div class="relative z-10">
                        <span class="text-[#f8c03f] text-xs font-bold uppercase tracking-widest block mb-2">NP FOOD</span>
                        <h3 class="text-xl font-bold font-serif mb-4 leading-snug">Hợp tác & Đồng hành cùng phát triển</h3>
                        <p class="text-sm text-gray-300 leading-relaxed mb-6 font-light">Chúng tôi trân trọng giá trị tự nhiên và mong muốn đồng hành lâu dài cùng quý đối tác.</p>
                        <a href="/tuyen-dung" class="inline-flex items-center gap-2 bg-[#f8c03f] text-[#184241] font-bold text-xs uppercase tracking-wider py-3 px-6 rounded-lg hover:bg-white hover:text-[#184241] transition-all shadow-md no-underline">
                            Liên hệ ngay <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</div>

<style>
    /* Styling WordPress default pagination markup */
    .navigation.pagination {
        display: block;
        width: 100%;
    }
    .navigation.pagination .nav-links {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }
    .navigation.pagination a,
    .navigation.pagination span.current {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
        color: #4b5563;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        transition: all 0.2s;
    }
    .navigation.pagination a:hover {
        border-color: #54b259;
        color: #54b259;
        background-color: #f0fdf4;
    }
    .navigation.pagination span.current {
        background-color: #54b259;
        border-color: #54b259;
        color: white;
    }
</style>

<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>

<?php get_footer(); ?>
