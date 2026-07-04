<?php get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-primary selection:text-white min-h-screen">
    <!-- Hero / Breadcrumb Section -->
    <section class="relative bg-gradient-to-r from-[#184241] to-[#2a5e5d] text-white py-12 lg:py-20 overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
            <svg viewBox="0 0 100 100" class="w-full h-full fill-current text-white">
                <circle cx="10" cy="10" r="30" />
                <circle cx="80" cy="90" r="40" />
            </svg>
        </div>
        
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs lg:text-sm text-gray-300 mb-6 font-medium">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-secondary transition-colors no-underline">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="hover:text-secondary transition-colors no-underline">Tin tức</a>
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
            <main class="lg:col-span-8 bg-white rounded-2xl shadow-sm p-6 lg:p-10 border border-gray-100">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                ?>
                        <!-- Featured Image -->
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="mb-10 rounded-xl overflow-hidden shadow-md group">
                                <?php the_post_thumbnail( 'full', [
                                    'class' => 'w-full h-auto max-h-[500px] object-cover transform group-hover:scale-[1.02] transition-transform duration-500'
                                ] ); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Post Meta Info (Author, Reading Time) -->
                        <div class="flex items-center gap-4 pb-6 mb-8 border-b border-gray-100 text-sm text-gray-500">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold uppercase text-xs">
                                    <?php echo esc_html( get_the_author_meta( 'display_name' )[0] ); ?>
                                </div>
                                <span class="font-medium text-gray-700"><?php the_author(); ?></span>
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

                        <!-- Share Button & Tags -->
                        <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <?php if ( has_tag() ) : ?>
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-semibold text-gray-500">Tags:</span>
                                    <?php the_tags( '<span class="text-xs bg-gray-100 hover:bg-primary hover:text-white px-3 py-1 rounded transition-colors text-gray-600">', '</span> <span class="text-xs bg-gray-100 hover:bg-primary hover:text-white px-3 py-1 rounded transition-colors text-gray-600">', '</span>' ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Share to Facebook Mini-Widget -->
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-semibold text-gray-500">Chia sẻ:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center transition-colors">
                                    <i data-lucide="facebook" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>

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
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }
    .entry-content h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .entry-content h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #374151;
        margin-top: 1.75rem;
        margin-bottom: 0.75rem;
    }
    .entry-content blockquote {
        border-left: 4px solid #54b259;
        padding-left: 1.25rem;
        font-style: italic;
        color: #4b5563;
        margin: 2rem 0;
        background-color: #f9fafb;
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-radius: 0 0.5rem 0.5rem 0;
    }
    .entry-content ul, .entry-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }
    .entry-content ul {
        list-style-type: disc;
    }
    .entry-content ol {
        list-style-type: decimal;
    }
    .entry-content li {
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
    .entry-content img {
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        margin: 2rem 0;
    }
</style>

<script>
    // Initialize icons if dynamic
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>

<?php get_footer(); ?>
