<?php
/**
 * Template Name: Giá Trị Cốt Lõi
 * Description: Trang giới thiệu Văn hóa và 4 Trụ cột Giá trị Cốt lõi của NP FOOD
 */
get_header(); ?>

<div class="font-sans text-gray-800 bg-[#F9FAFB] selection:bg-[#54b259] selection:text-white min-h-screen">

    <!-- 1. HERO BANNER -->
    <section class="relative bg-gradient-to-r from-[#184241] via-[#1f5755] to-[#2a5e5d] text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none"></div>
        <div class="absolute -right-20 -bottom-20 w-96 h-96 rounded-full bg-[#f8c03f]/10 blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs lg:text-sm text-gray-300 mb-6 font-medium">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#f8c03f] transition-colors no-underline">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-gray-300">Về NP Food</span>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-gray-400"></i>
                <span class="text-[#f8c03f] font-semibold">Giá Trị Cốt Lõi</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-[#f8c03f] text-xs font-bold uppercase tracking-widest mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#f8c03f]"></span>
                    Văn Hóa Doanh Nghiệp
                </div>
                <h1 class="text-3xl lg:text-5xl font-serif font-bold text-white mb-6 leading-tight">
                    Bốn Trụ Cột Nền Tảng <br/>
                    <span class="text-[#f8c03f]">Trong Mọi Hoạt Động Kinh Doanh</span>
                </h1>
                <p class="text-base lg:text-lg text-gray-200 font-light leading-relaxed">
                    Tại NP FOOD, các giá trị cốt lõi là kim chỉ nam giúp chúng tôi làm việc với tinh thần trung thực, trách nhiệm và tôn trọng người tiêu dùng.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. FOUR CORE VALUES DETAILED -->
    <section class="py-20 lg:py-28">
        <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Nguyên tắc nền tảng</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">Bốn Giá Trị Cốt Lõi</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">Định hình phong cách làm việc và xây dựng niềm tin cùng khách hàng, đối tác.</p>
            </div>

            <div class="space-y-12">
                <!-- Value 1: ĐẠO ĐỨC -->
                <div class="bg-white p-8 lg:p-12 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center group">
                    <div class="lg:col-span-4 flex flex-col items-start">
                        <div class="w-16 h-16 rounded-2xl bg-[#54b259]/10 text-[#54b259] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                            <i data-lucide="heart" class="w-8 h-8"></i>
                        </div>
                        <span class="text-xs font-bold text-[#f8c03f] uppercase tracking-widest">Trụ Cột 1</span>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mt-1 mb-2">ĐẠO ĐỨC (Ethics)</h3>
                        <p class="text-sm text-gray-500 font-medium">Trung thực và giữ chữ tín</p>
                    </div>
                    <div class="lg:col-span-8 border-t lg:border-t-0 lg:border-l border-gray-100 pt-6 lg:pt-0 lg:pl-10 space-y-4">
                        <p class="text-gray-600 leading-relaxed text-justify m-0">
                            Trong kinh doanh thực phẩm và dinh dưỡng, sự trung thực là yếu tố hàng đầu. NP FOOD cam kết chỉ cung cấp thông tin xác thực về thành phần và công dụng, không thổi phồng hiệu quả, không vì lợi ích kinh doanh mà đưa ra những lời khuyên thiếu căn cứ.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-[#54b259]"></i> Tư vấn đúng bản chất sản phẩm
                            </div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-[#54b259]"></i> Tôn trọng sự an toàn của người dùng
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Value 2: TRÁCH NHIỆM -->
                <div class="bg-white p-8 lg:p-12 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center group">
                    <div class="lg:col-span-4 flex flex-col items-start">
                        <div class="w-16 h-16 rounded-2xl bg-[#f8c03f]/20 text-[#d4a017] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                            <i data-lucide="users" class="w-8 h-8"></i>
                        </div>
                        <span class="text-xs font-bold text-[#54b259] uppercase tracking-widest">Trụ Cột 2</span>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mt-1 mb-2">TRÁCH NHIỆM (Responsibility)</h3>
                        <p class="text-sm text-gray-500 font-medium">Đồng hành trước và sau bán hàng</p>
                    </div>
                    <div class="lg:col-span-8 border-t lg:border-t-0 lg:border-l border-gray-100 pt-6 lg:pt-0 lg:pl-10 space-y-4">
                        <p class="text-gray-600 leading-relaxed text-justify m-0">
                            Chúng tôi coi trọng trách nhiệm đối với từng đơn hàng và từng khách hàng. Khi có sự cố phát sinh về bao bì, hạn sử dụng hoặc vận chuyển, NP FOOD luôn chủ động tiếp nhận và hỗ trợ đổi trả nhanh chóng, thỏa đáng.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-[#f8c03f]"></i> Hỗ trợ đổi trả khi lỗi do vận chuyển
                            </div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-[#f8c03f]"></i> Tận tình giải đáp thắc mắc người dùng
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Value 3: SỰ TUÂN THỦ -->
                <div class="bg-white p-8 lg:p-12 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center group">
                    <div class="lg:col-span-4 flex flex-col items-start">
                        <div class="w-16 h-16 rounded-2xl bg-[#184241]/10 text-[#184241] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                            <i data-lucide="shield-check" class="w-8 h-8"></i>
                        </div>
                        <span class="text-xs font-bold text-[#f8c03f] uppercase tracking-widest">Trụ Cột 3</span>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mt-1 mb-2">SỰ TUÂN THỦ (Compliance)</h3>
                        <p class="text-sm text-gray-500 font-medium">Chấp hành đúng quy định pháp luật</p>
                    </div>
                    <div class="lg:col-span-8 border-t lg:border-t-0 lg:border-l border-gray-100 pt-6 lg:pt-0 lg:pl-10 space-y-4">
                        <p class="text-gray-600 leading-relaxed text-justify m-0">
                            NP FOOD tuân thủ các quy định hiện hành về kinh doanh thực phẩm, đảm bảo sản phẩm có nguồn gốc xuất xứ rõ ràng, đầy đủ hồ sơ công bố và ghi nhãn phụ tiếng Việt theo đúng quy chuẩn Nhà nước.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-[#184241]"></i> Giấy tờ công bố chất lượng đầy đủ
                            </div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-[#184241]"></i> Hóa đơn chứng từ mua bán hợp lệ
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Value 4: CHUYÊN MÔN -->
                <div class="bg-white p-8 lg:p-12 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center group">
                    <div class="lg:col-span-4 flex flex-col items-start">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                            <i data-lucide="book-open" class="w-8 h-8"></i>
                        </div>
                        <span class="text-xs font-bold text-[#54b259] uppercase tracking-widest">Trụ Cột 4</span>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mt-1 mb-2">CHUYÊN CẦN (Dedication)</h3>
                        <p class="text-sm text-gray-500 font-medium">Tìm hiểu kỹ và học hỏi không ngừng</p>
                    </div>
                    <div class="lg:col-span-8 border-t lg:border-t-0 lg:border-l border-gray-100 pt-6 lg:pt-0 lg:pl-10 space-y-4">
                        <p class="text-gray-600 leading-relaxed text-justify m-0">
                            Đội ngũ nhân sự tại NP FOOD thường xuyên được hướng dẫn, tìm hiểu kỹ lưỡng về tài liệu và kiến thức sản phẩm từ nhà sản xuất, giúp giải thích rõ ràng cho khách hàng về cách sử dụng, đối tượng phù hợp và cách bảo quản đúng cách.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Nắm rõ thông tin và hướng dẫn sử dụng
                            </div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Cầu thị và tiếp thu đóng góp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. TIÊU CHUẨN LỰA CHỌN SẢN PHẨM -->
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Tiêu chí sản phẩm</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">Các Tiêu Chí Lựa Chọn Sản Phẩm</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">Những yếu tố NP FOOD xem xét trước khi đưa sản phẩm tới tay người tiêu dùng.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <span class="text-3xl font-black text-[#54b259]/30 block mb-2">01</span>
                    <h4 class="font-bold text-gray-800 text-base mb-2">Xuất Xứ Rõ Ràng</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Được sản xuất bởi thương hiệu có đăng ký pháp lý và uy tín trên thị trường.</p>
                </div>
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <span class="text-3xl font-black text-[#f8c03f]/50 block mb-2">02</span>
                    <h4 class="font-bold text-gray-800 text-base mb-2">Thành Phần Lành Tính</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Ưu tiên nguồn gốc thực vật, nguyên liệu tự nhiên và an toàn cho sức khỏe.</p>
                </div>
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <span class="text-3xl font-black text-[#184241]/30 block mb-2">03</span>
                    <h4 class="font-bold text-gray-800 text-base mb-2">Hồ Sơ Hợp Lệ</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Có đầy đủ giấy công bố sản phẩm và nhãn phụ tiếng Việt theo quy định.</p>
                </div>
                <div class="p-6 rounded-2xl bg-[#F9FAFB] border border-gray-200">
                    <span class="text-3xl font-black text-emerald-500/30 block mb-2">04</span>
                    <h4 class="font-bold text-gray-800 text-base mb-2">Hạn Dùng Đảm Bảo</h4>
                    <p class="text-xs text-gray-500 leading-relaxed m-0">Kiểm tra hạn sử dụng và điều kiện bao bì cẩn thận trước khi giao tới khách hàng.</p>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
