<?php get_header(); ?>

<main id="primary" class="site-main container mx-auto px-4 py-8 lg:py-12">
    <div class="max-w-4xl mx-auto">
        <?php
        if ( have_posts() ) :
            ?>
            <header class="page-header mb-10 pb-6 border-b border-gray-100">
                <h1 class="page-title text-3xl font-bold text-gray-900">
                    <?php
                    if ( is_search() ) {
                         printf( 'Kết quả tìm kiếm cho: %s', '<span>' . get_search_query() . '</span>' );
                    } elseif ( is_archive() ) {
                        the_archive_title();
                    } else {
                        echo 'Blog';
                    }
                    ?>
                </h1>
            </header>
            
            <div class="space-y-12">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('flex flex-col md:flex-row gap-8 bg-white md:bg-transparent rounded-2xl md:rounded-none shadow-sm md:shadow-none overflow-hidden md:overflow-visible'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="md:w-1/3 flex-shrink-0">
                        <a href="<?php the_permalink(); ?>" class="block rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                            <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-48 md:h-full object-cover transform hover:scale-105 transition-transform duration-500']); ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <div class="flex flex-col <?php echo has_post_thumbnail() ? 'md:w-2/3' : 'w-full'; ?> p-6 md:p-0">
                        <header class="entry-header mb-3">
                             <div class="mb-2 flex items-center text-xs text-gray-500 space-x-2 font-medium">
                                <span class="text-primary uppercase"><?php echo get_the_category_list(', '); ?></span>
                                <span class="text-gray-300">•</span>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            <?php the_title( '<h2 class="entry-title text-2xl font-bold text-gray-800 mb-2 leading-tight hover:text-primary transition-colors"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                        </header>

                        <div class="entry-content text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                            <?php the_excerpt(); ?>
                        </div>
                         
                        <div class="mt-auto">
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-sm font-semibold text-primary hover:text-red-700 transition-colors">
                                Đọc thêm
                                <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<span class="text-gray-500 hover:text-primary">&larr; Trước</span>',
                    'next_text' => '<span class="text-gray-500 hover:text-primary">Sau &rarr;</span>',
                    'class' => 'flex gap-2' // Note: This doesn't fully style links without deeper customization or filter, but it's a start
                ) );
                ?>
            </div>

            <?php
        else :
            echo '<p class="text-center text-gray-500 py-10">Không tìm thấy nội dung phù hợp.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
