<?php
/**
 * Template Name: Sứ Mệnh & Tầm Nhìn
 * Description: Trang giới thiệu Sứ mệnh, Tầm nhìn và Triết lý phát triển của NP FOOD
 */
get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-[#54b259] selection:text-white min-h-screen">

    <!-- 1. HERO BANNER -->
    <section class="relative bg-gradient-to-r from-[#184241] via-[#1f5755] to-[#2a5e5d] text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 rounded-full bg-[#54b259]/20 blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs lg:text-sm text-gray-300 mb-6 font-medium">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#f8c03f] transition-colors no-underline">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-gray-300">Về NP Food</span>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-[#f8c03f] font-semibold">Sứ Mệnh & Tầm Nhìn</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-[#f8c03f] text-xs font-bold uppercase tracking-widest mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#f8c03f]"></span>
                    Định Hướng Phát Triển
                </div>
                <h1 class="text-3xl lg:text-5xl font-serif font-bold text-white mb-6 leading-tight">
                    Sứ Mệnh Phụng Sự <br/>
                    <span class="text-[#f8c03f]">Dinh Dưỡng Lành Cho Mọi Gia Đình</span>
                </h1>
                <p class="text-base lg:text-lg text-gray-200 font-light leading-relaxed">
                    "Trân quý thiên nhiên – Thấu hiểu khách hàng". Xuất phát từ tình cảm và sự quan tâm chân thành tới sức khỏe của những người thân yêu.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. VISION & MISSION BENTO GRID -->
    <section class="py-20 lg:py-28">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                
                <!-- TẦM NHÌN (VISION) -->
                <div class="relative bg-gradient-to-br from-[#54b259] to-[#3d8c41] p-10 lg:p-14 rounded-3xl text-white shadow-xl overflow-hidden flex flex-col justify-between group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -right-10 text-white/10">
                        <i data-lucide="eye" class="w-48 h-48"></i>
                    </div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-md text-[#f8c03f] flex items-center justify-center mb-8 border border-white/20">
                            <i data-lucide="compass" class="w-7 h-7"></i>
                        </div>
                        <span class="text-[#f8c03f] font-bold uppercase tracking-[0.25em] text-xs block mb-3">Mục Tiêu Phát Triển</span>
                        <h2 class="text-3xl lg:text-4xl font-serif font-bold mb-6 leading-tight">Tầm Nhìn</h2>
                        <div class="w-12 h-1 bg-[#f8c03f] rounded-full mb-6"></div>
                        <p class="text-gray-100 text-base lg:text-lg leading-relaxed font-light text-justify">
                            Xây dựng NP FOOD trở thành <strong>đơn vị phân phối uy tín và tin cậy</strong> trong lĩnh vực thực phẩm tự nhiên, thực phẩm hữu cơ và các dòng sản phẩm dinh dưỡng thực vật tại Việt Nam.
                        </p>
                        <p class="text-gray-100 text-sm leading-relaxed font-light mt-4 text-justify">
                            Chúng tôi nỗ lực mang lại những sản phẩm có nguồn gốc minh bạch, thành phần rõ ràng và phù hợp với nhu cầu chăm sóc sức khỏe lành mạnh của người tiêu dùng.
                        </p>
                    </div>

                    <div class="relative z-10 pt-8 mt-8 border-t border-white/20 flex items-center gap-3 text-xs tracking-wider uppercase font-semibold text-white/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-[#f8c03f]"></i> Đồng hành lâu dài và tin cậy cùng khách hàng và đối tác
                    </div>
                </div>

                <!-- SỨ MỆNH (MISSION) -->
                <div class="relative bg-white p-10 lg:p-14 rounded-3xl text-gray-800 shadow-xl border border-gray-100 flex flex-col justify-between group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#f8c03f]/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -right-10 text-gray-100">
                        <i data-lucide="heart-handshake" class="w-48 h-48"></i>
                    </div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-[#54b259]/10 text-[#54b259] flex items-center justify-center mb-8 border border-[#54b259]/20">
                            <i data-lucide="heart" class="w-7 h-7"></i>
                        </div>
                        <span class="text-[#54b259] font-bold uppercase tracking-[0.25em] text-xs block mb-3">Mục Đích Hoạt Động</span>
                        <h2 class="text-3xl lg:text-4xl font-serif font-bold text-gray-900 mb-6 leading-tight">Sứ Mệnh</h2>
                        <div class="w-12 h-1 bg-[#54b259] rounded-full mb-6"></div>
                        <p class="text-gray-600 text-base lg:text-lg leading-relaxed font-light text-justify">
                            Cung cấp các sản phẩm <strong>dinh dưỡng tự nhiên, nguồn gốc rõ ràng</strong>, giúp khách hàng có thêm sự lựa chọn an tâm cho bữa ăn và sức khỏe của cả gia đình.
                        </p>
                        <p class="text-gray-600 text-sm leading-relaxed font-light mt-4 text-justify">
                            NP FOOD đặc biệt quan tâm tới nhu cầu của các bậc phụ huynh tìm kiếm sản phẩm sữa hạt lành tính cho con, các cá nhân cần hạn chế đạm sữa động vật hoặc người đang theo đuổi lối sống ăn uống xanh, sạch.
                        </p>
                    </div>

                    <div class="relative z-10 pt-8 mt-8 border-t border-gray-100 flex items-center gap-3 text-xs tracking-wider uppercase font-semibold text-gray-500">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-[#54b259]"></i> Luôn đặt sức khỏe và sự an tâm của khách hàng lên hàng đầu
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. BRAND PHILOSOPHY / SLOGAN BREAKDOWN -->
    <section class="py-20 bg-white border-y border-gray-100">
        <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
            <div class="text-center mb-16">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Phương châm làm việc</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">"Trân Quý Thiên Nhiên – Thấu Hiểu Khách Hàng"</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="p-8 rounded-2xl bg-[#f0fdf4] border border-[#54b259]/20">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-[#54b259] text-white flex items-center justify-center font-bold">1</div>
                        <h3 class="text-xl font-bold text-[#14532d] m-0">Trân Quý Thiên Nhiên</h3>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed text-justify m-0">
                        NP FOOD ưu tiên lựa chọn và giới thiệu những sản phẩm có nguồn gốc từ thiên nhiên, nông nghiệp hữu cơ và nguồn nguyên liệu thực vật, giữ được hương vị tự nhiên và giá trị dinh dưỡng vốn có.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-[#fffbeb] border border-[#f8c03f]/30">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-[#f8c03f] text-[#1a4e4d] flex items-center justify-center font-bold">2</div>
                        <h3 class="text-xl font-bold text-[#78350f] m-0">Thấu Hiểu Khách Hàng</h3>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed text-justify m-0">
                        Lắng nghe nhu cầu thực tế của từng khách hàng để tư vấn đúng thông tin, không nói quá công dụng, giúp người tiêu dùng chọn đúng sản phẩm phù hợp với khẩu vị và thể trạng của gia đình.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FOUR COMMITMENTS -->
    <section class="py-20 lg:py-24 bg-[#F9FAFB]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Nguyên tắc cam kết</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">Bốn Cam Kết Của NP FOOD</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">Những tiêu chuẩn chúng tôi duy trì trong mọi hoạt động kinh doanh.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Commit 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-[#54b259]/10 text-[#54b259] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Chất Lượng Sản Phẩm</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">
                        Sản phẩm phân phối đều có hồ sơ công bố, nhãn mác tiếng Việt và kiểm nghiệm an toàn thực phẩm theo quy định.
                    </p>
                </div>

                <!-- Commit 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-[#f8c03f]/20 text-[#d4a017] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Đồng Hành Tận Tâm</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">
                        Hỗ trợ đối tác, đại lý và người tiêu dùng với tinh thần trách nhiệm, sẵn sàng lắng nghe và giải đáp mọi thắc mắc.
                    </p>
                </div>

                <!-- Commit 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-[#184241]/10 text-[#184241] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="globe-2" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Giá Trị Cộng Đồng</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">
                        Tích cực chia sẻ kiến thức dinh dưỡng khách quan, giúp mọi người nâng cao nhận thức về thực phẩm sạch.
                    </p>
                </div>

                <!-- Commit 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="sprout" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Thân Thiện Môi Trường</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">
                        Ưu tiên phân phối các sản phẩm nông nghiệp sạch, hạn chế hóa chất độc hại và bao bì tái chế được.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. INSPIRATIONAL QUOTE -->
    <section class="py-16 bg-[#14532d] text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
        <div class="container mx-auto px-4 max-w-3xl relative z-10">
            <i data-lucide="quote" class="w-12 h-12 text-[#f8c03f] mx-auto mb-4 opacity-50"></i>
            <h3 class="text-xl lg:text-3xl font-serif italic mb-4 leading-relaxed">
                "Chúng tôi tin điều gì xuất phát từ trái tim sẽ chạm được đến trái tim, mang đến những giá trị tốt đẹp cho cộng đồng."
            </h3>
            <span class="text-[#f8c03f] text-xs font-bold uppercase tracking-widest block">NP FOOD</span>
        </div>
    </section>

</div>

<?php get_footer(); ?>
