<?php
/**
 * Template Name: Nguyên Tắc Kinh Doanh
 * Description: Trang giới thiệu các Nguyên tắc kinh doanh, chính sách hợp tác của NP FOOD
 */
get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-[#54b259] selection:text-white min-h-screen">

    <!-- 1. HERO BANNER -->
    <section class="relative bg-gradient-to-r from-[#184241] via-[#1f5755] to-[#2a5e5d] text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 rounded-full bg-[#f8c03f]/10 blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs lg:text-sm text-gray-300 mb-6 font-medium">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#f8c03f] transition-colors no-underline">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-gray-300">Về NP Food</span>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-[#f8c03f] font-semibold">Nguyên Tắc Kinh Doanh</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-[#f8c03f] text-xs font-bold uppercase tracking-widest mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#f8c03f]"></span>
                    Chuẩn Mực Hợp Tác
                </div>
                <h1 class="text-3xl lg:text-5xl font-serif font-bold text-white mb-6 leading-tight">
                    Minh Bạch – Rõ Ràng <br/>
                    <span class="text-[#f8c03f]">Hợp Tác Cùng Phát Triển</span>
                </h1>
                <p class="text-base lg:text-lg text-gray-200 font-light leading-relaxed">
                    Xây dựng mối quan hệ tin cậy với khách hàng và đại lý dựa trên sự tôn trọng, thẳng thắn và tinh thần cầu thị.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. FOUR GOLDEN PRINCIPLES -->
    <section class="py-20 lg:py-28">
        <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Quy tắc làm việc</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">4 Nguyên Tắc Kinh Doanh</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">Được duy trì nhất quán trong toàn bộ hoạt động phân phối của NP FOOD.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Nguyên tắc 1 -->
                <div class="bg-white p-8 lg:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#54b259]/10 text-[#54b259] flex items-center justify-center group-hover:scale-105 transition-transform">
                                <i data-lucide="award" class="w-7 h-7"></i>
                            </div>
                            <span class="text-4xl font-black text-gray-100 group-hover:text-[#54b259]/20 transition-colors">01</span>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3 group-hover:text-[#54b259] transition-colors">Chất Lượng Là Danh Dự</h3>
                        <p class="text-gray-600 text-sm leading-relaxed text-justify">
                            NP FOOD cam kết chỉ phân phối sản phẩm chính hãng, rõ nguồn gốc xuất xứ, hạn sử dụng rõ ràng. Chúng tôi không kinh doanh các sản phẩm không rõ lai lịch hoặc không đạt tiêu chuẩn an toàn thực phẩm.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-gray-100 flex items-center gap-2 text-xs font-semibold text-[#54b259]">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Cam kết phân phối hàng chính hãng, nguồn gốc rõ ràng
                    </div>
                </div>

                <!-- Nguyên tắc 2 -->
                <div class="bg-white p-8 lg:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#f8c03f]/20 text-[#d4a017] flex items-center justify-center group-hover:scale-105 transition-transform">
                                <i data-lucide="smile" class="w-7 h-7"></i>
                            </div>
                            <span class="text-4xl font-black text-gray-100 group-hover:text-[#f8c03f]/30 transition-colors">02</span>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3 group-hover:text-[#d4a017] transition-colors">Khách Hàng Là Trọng Tâm</h3>
                        <p class="text-gray-600 text-sm leading-relaxed text-justify">
                            Lắng nghe phản hồi từ khách hàng để phục vụ ngày một tốt hơn. Mọi ý kiến thắc mắc về sản phẩm hay trải nghiệm mua hàng đều được đội ngũ chăm sóc khách hàng tiếp nhận và giải đáp chu đáo.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-gray-100 flex items-center gap-2 text-xs font-semibold text-[#d4a017]">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Hỗ trợ tư vấn nhiệt tình, giải đáp thỏa đáng
                    </div>
                </div>

                <!-- Nguyên tắc 3 -->
                <div class="bg-white p-8 lg:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#184241]/10 text-[#184241] flex items-center justify-center group-hover:scale-105 transition-transform">
                                <i data-lucide="handshake" class="w-7 h-7"></i>
                            </div>
                            <span class="text-4xl font-black text-gray-100 group-hover:text-[#184241]/20 transition-colors">03</span>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3 group-hover:text-[#184241] transition-colors">Hợp Tác Cùng Phát Triển</h3>
                        <p class="text-gray-600 text-sm leading-relaxed text-justify">
                            Chúng tôi trân trọng sự hợp tác của các đối tác đại lý và nhà thuốc. NP FOOD áp dụng chính sách giá hợp lý, cung cấp tài liệu sản phẩm và tạo điều kiện thuận lợi để các đối tác kinh doanh hiệu quả.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-gray-100 flex items-center gap-2 text-xs font-semibold text-[#184241]">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Chính sách giá minh bạch, rõ ràng cho đại lý
                    </div>
                </div>

                <!-- Nguyên tắc 4 -->
                <div class="bg-white p-8 lg:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                                <i data-lucide="file-check-2" class="w-7 h-7"></i>
                            </div>
                            <span class="text-4xl font-black text-gray-100 group-hover:text-emerald-500/20 transition-colors">04</span>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">Minh Bạch & Liêm Chính</h3>
                        <p class="text-gray-600 text-sm leading-relaxed text-justify">
                            Rõ ràng trong thông tin sản phẩm, báo giá và các điều khoản giao nhận. Làm việc với thái độ cầu thị, tôn trọng sự thật và tuân thủ đúng pháp luật.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-gray-100 flex items-center gap-2 text-xs font-semibold text-emerald-600">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Cung cấp hóa đơn và chứng từ hợp lệ theo quy định
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PARTNERSHIP SUPPORT -->
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Hỗ trợ đại lý</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">Chính Sách Hỗ Trợ Đối Tác</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">Những hỗ trợ thiết thực khi hợp tác phân phối cùng NP FOOD.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <i data-lucide="book-open" class="w-8 h-8 text-[#54b259] mb-4"></i>
                    <h4 class="font-bold text-gray-900 text-lg mb-2">Thông Tin Sản Phẩm</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Cung cấp tài liệu mô tả sản phẩm, thành phần, đối tượng sử dụng và các giấy tờ công bố chất lượng liên quan.</p>
                </div>
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <i data-lucide="image" class="w-8 h-8 text-[#f8c03f] mb-4"></i>
                    <h4 class="font-bold text-gray-900 text-lg mb-2">Hình Ảnh & Giới Thiệu</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Hỗ trợ hình ảnh chụp sản phẩm rõ nét và nội dung giới thiệu cơ bản để đối tác thuận tiện đăng tải thông tin.</p>
                </div>
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <i data-lucide="truck" class="w-8 h-8 text-[#184241] mb-4"></i>
                    <h4 class="font-bold text-gray-900 text-lg mb-2">Đóng Gói & Giao Nhận</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Đóng gói cẩn thận khi vận chuyển, hỗ trợ xử lý và đổi trả nếu sản phẩm gặp sự cố lỗi móp méo do quá trình giao nhận.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. CTA -->
    <section class="py-16 bg-gradient-to-r from-[#184241] to-[#2a5e5d] text-white">
        <div class="container mx-auto px-4 lg:px-8 text-center max-w-3xl">
            <h3 class="text-2xl lg:text-3xl font-bold font-serif mb-4 text-[#f8c03f]">Liên Hệ Hợp Tác Cùng NP FOOD</h3>
            <p class="text-gray-300 text-sm lg:text-base leading-relaxed mb-8">
                Quý đối tác, đại lý có nhu cầu tìm hiểu sản phẩm và chính sách phân phối, xin vui lòng liên hệ với chúng tôi:
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:0869858268" class="px-8 py-3.5 bg-[#f8c03f] text-[#184241] font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-white transition-all shadow-lg no-underline flex items-center gap-2">
                    <i data-lucide="phone-call" class="w-4 h-4"></i> Hotline: 0869.858.268
                </a>
                <a href="mailto:npnutri1908@gmail.com" class="px-8 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-xs uppercase tracking-wider rounded-lg transition-all no-underline flex items-center gap-2">
                    <i data-lucide="mail" class="w-4 h-4 text-[#f8c03f]"></i> npnutri1908@gmail.com
                </a>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
