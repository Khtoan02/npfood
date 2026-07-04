<?php get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-primary selection:text-white min-h-screen">
    <!-- Hero / Breadcrumb Section -->
    <section class="relative bg-gradient-to-r from-[#184241] to-[#2a5e5d] text-white py-12 lg:py-24 overflow-hidden">
        <?php if ( has_post_thumbnail() ) : ?>
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <?php the_post_thumbnail( 'full', [
                    'class' => 'w-full h-full object-cover object-center absolute inset-0'
                ] ); ?>
                <!-- Dark Gradient Overlay for optimal readability -->
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
                <span class="text-white truncate max-w-[200px] sm:max-w-xs md:max-w-md lg:max-w-lg font-semibold"><?php the_title(); ?></span>
            </nav>
            
            <!-- Category and Date -->
            <div class="flex flex-wrap items-center gap-3 text-xs lg:text-sm font-semibold uppercase tracking-wider mb-4">
                <span class="bg-[#f8c03f] text-[#1a4e4d] px-3 py-1 rounded-full shadow-sm text-[11px] font-bold">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );
                    }
                    ?>
                </span>
                <span class="text-gray-300 flex items-center gap-1">
                    <i data-lucide="calendar" class="w-4 h-4 text-secondary"></i> <?php echo get_the_date(); ?>
                </span>
            </div>
            
            <!-- Title -->
            <h1 class="text-2xl lg:text-4xl font-serif font-bold leading-tight max-w-4xl text-white mb-6">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <!-- Main Content and Sidebar Grid -->
    <div class="container mx-auto px-4 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Article Content (8 Cols) -->
            <main class="lg:col-span-8 bg-white rounded-2xl shadow-sm p-6 lg:p-10 border border-gray-100 min-w-0">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                ?>

                        <!-- Post Meta Info (Author, Reading Time) -->
                        <?php
                        $author_name = get_the_author();
                        if ( empty( $author_name ) ) {
                            $author_name = 'NP Food';
                        }
                        $first_letter = mb_strtoupper( mb_substr( $author_name, 0, 1, 'UTF-8' ), 'UTF-8' );
                        ?>
                        <div class="flex items-center gap-4 pb-6 mb-8 border-b border-gray-100 text-sm text-gray-500">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold uppercase text-xs">
                                    <?php echo esc_html( $first_letter ); ?>
                                </div>
                                <span class="font-medium text-gray-700"><?php echo esc_html( $author_name ); ?></span>
                            </div>
                            <span class="text-gray-300">|</span>
                            <div class="flex items-center gap-1.5">
                                <i data-lucide="clock" class="w-4 h-4 text-gray-400"></i>
                                <span>
                                    <?php
                                    $content = get_the_content();
                                    $word_count = str_word_count( strip_tags( $content ) );
                                    $reading_time = ceil( $word_count / 200 );
                                    echo esc_html( $reading_time > 0 ? $reading_time : 1 ) . ' phút đọc';
                                    ?>
                                </span>
                            </div>
                        </div>

                        <!-- Post Body / Content -->
                        <article class="entry-content text-gray-700 leading-relaxed text-base lg:text-lg space-y-6">
                            <?php the_content(); ?>
                        </article>

                        <!-- Share Button & Tags Section -->
                        <div class="mt-12 pt-8 border-t border-gray-100 space-y-6">
                            <?php if ( has_tag() ) : ?>
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-semibold text-gray-500 mr-1 flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Từ khóa:
                                    </span>
                                    <?php
                                    $tags = get_the_tags();
                                    if ( $tags ) {
                                        foreach ( $tags as $tag ) {
                                            echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200 hover:bg-primary hover:text-white hover:border-primary px-3.5 py-1.5 rounded-full transition-all duration-300 no-underline">' . esc_html( $tag->name ) . '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="flex flex-wrap items-center justify-between gap-4 bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <span class="text-sm font-bold text-gray-700 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 10.742l4.636-2.318m0 5.152l-4.636-2.318m10.909-3.636a3 3 0 11-6 0 3 3 0 016 0zm-11 5.454a3 3 0 11-6 0 3 3 0 016 0zm11 5.455a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Bạn thấy bài viết này hữu ích? Chia sẻ ngay:
                                </span>
                                
                                <div class="flex items-center gap-3">
                                    <!-- Facebook Share -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" 
                                       target="_blank" 
                                       rel="noopener noreferrer" 
                                       class="inline-flex items-center gap-2 bg-[#1877F2] hover:bg-[#166FE5] text-white text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm transition-all duration-300 no-underline hover:scale-102">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                        Facebook
                                    </a>
                                    
                                    <!-- Copy Link Button -->
                                    <button onclick="copyToClipboard()" 
                                            class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-700 border border-gray-200 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm transition-all duration-300 cursor-pointer hover:scale-102">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                        </svg>
                                        <span id="copy-text">Sao chép link</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Copy to Clipboard Script -->
                        <script>
                        function copyToClipboard() {
                            const url = window.location.href;
                            navigator.clipboard.writeText(url).then(() => {
                                const btnText = document.getElementById('copy-text');
                                btnText.innerText = 'Đã sao chép!';
                                btnText.classList.add('text-primary');
                                setTimeout(() => {
                                    btnText.innerText = 'Sao chép link';
                                    btnText.classList.remove('text-primary');
                                }, 2000);
                            }).catch(err => {
                                console.error('Lỗi sao chép liên kết: ', err);
                            });
                        }
                        </script>

                        <!-- Next & Previous Posts -->
                        <div class="mt-12 pt-8 border-t border-gray-100 grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <?php
                            $prev_post = get_previous_post();
                            if ( ! empty( $prev_post ) ) :
                            ?>
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="group block p-5 rounded-xl border border-gray-100 hover:border-primary/30 hover:bg-primary/5 transition-all no-underline">
                                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block mb-1">&larr; Bài viết trước</span>
                                    <span class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors line-clamp-2 leading-snug"><?php echo esc_html( $prev_post->post_title ); ?></span>
                                </a>
                            <?php else : ?>
                                <div></div>
                            <?php endif; ?>

                            <?php
                            $next_post = get_next_post();
                            if ( ! empty( $next_post ) ) :
                            ?>
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="group block p-5 rounded-xl border border-gray-100 hover:border-primary/30 hover:bg-primary/5 transition-all text-right no-underline">
                                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block mb-1">Bài viết sau &rarr;</span>
                                    <span class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors line-clamp-2 leading-snug"><?php echo esc_html( $next_post->post_title ); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>

                <?php
                    endwhile;
                endif;
                ?>
            </main>

            <!-- Right: Sidebar (4 Cols) -->
            <aside class="lg:col-span-4 space-y-8">
                
                <!-- Related / Recent Posts Widget -->
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-4 mb-6 flex items-center gap-2">
                        <i data-lucide="newspaper" class="w-5 h-5 text-primary"></i> Bài viết liên quan
                    </h3>
                    
                    <div class="space-y-6">
                        <?php
                        $categories = wp_get_post_categories( get_the_ID() );
                        $related_args = array(
                            'category__in'   => $categories,
                            'post__not_in'   => array( get_the_ID() ),
                            'posts_per_page' => 4,
                            'ignore_sticky_posts' => 1
                        );
                        $related_query = new WP_Query( $related_args );
                        
                        // Fallback to recent posts if no related category posts
                        if ( ! $related_query->have_posts() ) {
                            $related_query = new WP_Query( array(
                                'posts_per_page' => 4,
                                'post__not_in'   => array( get_the_ID() ),
                                'ignore_sticky_posts' => 1
                            ) );
                        }

                        if ( $related_query->have_posts() ) :
                            while ( $related_query->have_posts() ) : $related_query->the_post();
                        ?>
                                <article class="flex gap-4 group">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>" class="w-20 h-20 rounded-lg overflow-hidden shrink-0 shadow-sm block bg-gray-100">
                                            <?php the_post_thumbnail( 'thumbnail', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300'] ); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="flex flex-col justify-center">
                                        <span class="text-[10px] font-bold text-[#f8c03f] uppercase mb-1"><?php echo get_the_date(); ?></span>
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

                <!-- Call to Action (CTA) Banner Widget -->
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
    /* Styling for WordPress inner rich content elements in .entry-content */
    .entry-content p {
        margin-bottom: 1.5rem !important;
        line-height: 1.8 !important;
    }
    .entry-content h2,
    .entry-content h3,
    .entry-content h4 {
        color: #1f2937 !important;
        font-weight: 700 !important;
        line-height: 1.4 !important;
        margin-top: 2.25rem !important;
        margin-bottom: 1.25rem !important;
    }
    .entry-content h2 {
        font-size: 1.625rem !important;
    }
    .entry-content h3 {
        font-size: 1.375rem !important;
    }
    .entry-content h4 {
        font-size: 1.125rem !important;
    }
    .entry-content blockquote {
        border-left: 4px solid #54b259 !important;
        padding-left: 1.25rem !important;
        font-style: italic !important;
        color: #4b5563 !important;
        margin: 2rem 0 !important;
        background-color: #f9fafb !important;
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
    }
    /* Khôi phục bullet points & numbering bị Tailwind Preflight ẩn */
    .entry-content ul,
    .entry-content ol {
        padding-left: 2rem !important;
        margin-bottom: 1.5rem !important;
    }
    .entry-content ul {
        list-style-type: disc !important;
        list-style-position: outside !important;
    }
    .entry-content ol {
        list-style-type: decimal !important;
        list-style-position: outside !important;
    }
    .entry-content li {
        display: list-item !important;
        margin-bottom: 0.5rem !important;
        line-height: 1.8 !important;
    }
    /* Kiểu dáng danh sách lồng nhau */
    .entry-content ul ul,
    .entry-content ol ul {
        list-style-type: circle !important;
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
        padding-left: 1.5rem !important;
    }
    .entry-content ul ol,
    .entry-content ol ol {
        list-style-type: lower-alpha !important;
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
        padding-left: 1.5rem !important;
    }
    /* Hình ảnh & căn lề chuẩn chỉ */
    .entry-content figure,
    .entry-content .wp-block-image {
        max-width: 100% !important;
        height: auto !important;
        margin: 2rem auto;
        box-sizing: border-box;
    }
    .entry-content img {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 0.75rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        margin: 2rem auto;
        display: block;
    }
    /* Đảm bảo hình ảnh lấp đầy khung chứa (figure/wp-block-image) */
    .entry-content .wp-block-image img,
    .entry-content figure img {
        width: 100% !important;
        height: auto !important;
    }
    .entry-content .aligncenter,
    .entry-content .alignnone,
    .entry-content figure.aligncenter,
    .entry-content figure.alignnone {
        margin: 2rem auto;
        display: block;
        text-align: center;
        max-width: 100% !important;
    }
    .entry-content .aligncenter img,
    .entry-content .alignnone img {
        margin-left: auto;
        margin-right: auto;
    }
    .entry-content .alignleft,
    .entry-content figure.alignleft {
        float: left;
        margin: 0.5rem 1.5rem 1.5rem 0;
        max-width: 50% !important;
    }
    .entry-content .alignright,
    .entry-content figure.alignright {
        float: right;
        margin: 0.5rem 0 1.5rem 1.5rem;
        max-width: 50% !important;
    }
    .entry-content::after {
        content: "";
        display: table;
        clear: both;
    }
    .entry-content .wp-block-image.aligncenter,
    .entry-content .wp-block-image.alignnone {
        text-align: center;
    }
    .entry-content .wp-block-image.alignleft {
        float: left;
        margin-right: 1.5rem;
        margin-bottom: 1.5rem;
        max-width: 50% !important;
    }
    .entry-content .wp-block-image.alignright {
        float: right;
        margin-left: 1.5rem;
        margin-bottom: 1.5rem;
        max-width: 50% !important;
    }
    .entry-content .wp-block-image img {
        display: inline-block;
        margin: 0;
    }
    .entry-content figcaption,
    .entry-content .wp-element-caption {
        font-size: 0.875rem;
        color: #6b7280;
        margin-top: 0.5rem;
        text-align: center;
        font-style: italic;
    }
</style>

<script>
    // Initialize icons if dynamic
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>

<?php get_footer(); ?>
