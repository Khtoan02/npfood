<?php
/**
 * Template Name: Tổng Quan Doanh Nghiệp
 * Description: Trang giới thiệu tổng quan về Công ty TNHH Thực phẩm NP
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
                <span class="text-[#f8c03f] font-semibold">Tổng Quan Doanh Nghiệp</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-[#f8c03f] text-xs font-bold uppercase tracking-widest mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#f8c03f]"></span>
                    Hồ Sơ Doanh Nghiệp
                </div>
                <h1 class="text-3xl lg:text-5xl font-serif font-bold text-white mb-6 leading-tight">
                    Doanh Nghiệp Phân Phối <br/>
                    <span class="text-[#f8c03f]">Thực Phẩm & Dinh Dưỡng Tự Nhiên</span>
                </h1>
                <p class="text-base lg:text-lg text-gray-200 font-light leading-relaxed">
                    Cung cấp các dòng sản phẩm dinh dưỡng, thực phẩm tự nhiên và hữu cơ, hướng tới giải pháp chăm sóc sức khỏe lành tính và an tâm cho gia đình Việt.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. HIGHLIGHTS BAR (THÔNG TIN THỰC TẾ, KHÔNG NÓI QUÁ) -->
    <section class="bg-white border-b border-gray-100 py-8 shadow-sm relative z-20 -mt-6 mx-4 lg:mx-auto max-w-6xl rounded-2xl">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
                <div class="pt-3 md:pt-0">
                    <div class="text-2xl lg:text-3xl font-extrabold text-[#54b259] mb-1">2020</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-700">Năm thành lập</div>
                    <div class="text-xs text-gray-500 mt-1">Khởi nguồn từ tình yêu thương</div>
                </div>
                <div class="pt-3 md:pt-0">
                    <div class="text-2xl lg:text-3xl font-extrabold text-[#54b259] mb-1">Chính Ngạch</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-700">Nguồn gốc rõ ràng</div>
                    <div class="text-xs text-gray-500 mt-1">Đầy đủ hồ sơ công bố chất lượng</div>
                </div>
                <div class="pt-3 md:pt-0">
                    <div class="text-2xl lg:text-3xl font-extrabold text-[#54b259] mb-1">Tự Nhiên</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-700">Định hướng sản phẩm</div>
                    <div class="text-xs text-gray-500 mt-1">Ưu tiên nguồn gốc thực vật</div>
                </div>
                <div class="pt-3 md:pt-0">
                    <div class="text-2xl lg:text-3xl font-extrabold text-[#54b259] mb-1">Tận Tâm</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-700">Đồng hành khách hàng</div>
                    <div class="text-xs text-gray-500 mt-1">Lắng nghe và tư vấn chu đáo</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. DETAILED INTRODUCTION -->
    <section class="py-20 lg:py-24">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 relative">
                    <div class="relative z-10 rounded-3xl overflow-hidden shadow-xl border-4 border-white">
                        <img 
                            src="https://npfood.vn/wp-content/uploads/2023/02/19-03-2022_Nutriscience_Mixed-race27655-1-scaled-e1768883629591.jpg" 
                            alt="NP Food" 
                            class="w-full h-[450px] object-cover hover:scale-105 transition-transform duration-700"
                        />
                    </div>
                    <!-- Badge -->
                    <div class="absolute -bottom-6 -right-6 bg-[#184241] text-white p-6 rounded-2xl shadow-xl z-20 max-w-xs border border-[#54b259]/30 hidden sm:block">
                        <div class="flex items-center gap-3 mb-2">
                            <i data-lucide="shield-check" class="w-7 h-7 text-[#f8c03f]"></i>
                            <span class="font-bold text-sm uppercase text-[#f8c03f]">Minh Bạch Xuất Xứ</span>
                        </div>
                        <p class="text-xs text-gray-300 leading-relaxed m-0">Sản phẩm phân phối đều có giấy tờ công bố và nguồn gốc minh bạch.</p>
                    </div>
                </div>

                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Về chúng tôi</span>
                        <h2 class="text-2xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4 leading-tight">
                            Công Ty TNHH Thực Phẩm NP (NP FOOD)
                        </h2>
                        <div class="w-16 h-1 bg-[#f8c03f] rounded-full mb-6"></div>
                    </div>

                    <p class="text-gray-600 leading-relaxed text-justify">
                        Công ty TNHH Thực Phẩm NP được thành lập vào ngày <strong>06/02/2020</strong> theo Giấy chứng nhận đăng ký doanh nghiệp số <strong>0109082378</strong> do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp.
                    </p>

                    <p class="text-gray-600 leading-relaxed text-justify">
                        NP FOOD hoạt động trong lĩnh vực kinh doanh, phân phối các sản phẩm thực phẩm tự nhiên, thực phẩm hữu cơ và các dòng sản phẩm dinh dưỡng có nguồn gốc thực vật. Chúng tôi hướng tới việc cung cấp những sản phẩm lành tính, phù hợp với nhu cầu chăm sóc sức khỏe hàng ngày của người tiêu dùng.
                    </p>

                    <p class="text-gray-600 leading-relaxed text-justify">
                        Với phương châm <em>"Trân quý thiên nhiên – Thấu hiểu khách hàng"</em>, NP FOOD luôn chú trọng đến sự trung thực trong kinh doanh, tư vấn rõ ràng về thông tin sản phẩm và luôn lắng nghe ý kiến phản hồi để nâng cao chất lượng phục vụ.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                        <div class="flex items-start gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm">
                            <div class="w-10 h-10 rounded-lg bg-[#54b259]/10 text-[#54b259] flex items-center justify-center shrink-0">
                                <i data-lucide="building" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-800 m-0">Trụ sở & Văn phòng</h4>
                                <p class="text-xs text-gray-500 mt-1 m-0">489 Hoàng Quốc Việt, Cầu Giấy, Hà Nội</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm">
                            <div class="w-10 h-10 rounded-lg bg-[#f8c03f]/20 text-[#d4a017] flex items-center justify-center shrink-0">
                                <i data-lucide="phone-call" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-800 m-0">Hỗ trợ khách hàng</h4>
                                <p class="text-xs text-gray-500 mt-1 m-0">Hotline: 0869.858.268 (Giờ hành chính)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. CORE BUSINESS PILLARS -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Lĩnh vực hoạt động</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">Các Dòng Sản Phẩm Phân Phối</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">NP FOOD chú trọng lựa chọn các dòng sản phẩm an toàn, có nguồn gốc tự nhiên và xuất xứ rõ ràng.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pillar 1 -->
                <div class="p-8 rounded-2xl bg-gradient-to-b from-[#f0fdf4] to-white border border-[#54b259]/20 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-[#54b259] text-white flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="leaf" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#54b259] transition-colors">Thực Phẩm Hữu Cơ (Organic)</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Các sản phẩm có chứng nhận hữu cơ theo quy chuẩn quốc tế, hạn chế sử dụng hóa chất nhân tạo trong quá trình canh tác và sản xuất.
                    </p>
                    <ul class="space-y-2 text-xs text-gray-600 list-none p-0 m-0">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#54b259]"></i> Ưu tiên nguyên liệu tự nhiên</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#54b259]"></i> Lành tính và thân thiện với sức khỏe</li>
                    </ul>
                </div>

                <!-- Pillar 2 -->
                <div class="p-8 rounded-2xl bg-gradient-to-b from-[#fffbeb] to-white border border-[#f8c03f]/30 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-[#f8c03f] text-[#1a4e4d] flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="sparkles" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#d4a017] transition-colors">Dinh Dưỡng Thực Vật Chuyên Biệt</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Dòng sản phẩm thực vật như sữa hạt Miwako, Miwako A+ từ thương hiệu Dale & Cecil (Malaysia), hỗ trợ bổ sung dinh dưỡng hàng ngày.
                    </p>
                    <ul class="space-y-2 text-xs text-gray-600 list-none p-0 m-0">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#f8c03f]"></i> Nguyên liệu từ hạt và thực vật</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#f8c03f]"></i> Thích hợp cho người cần kiêng đạm sữa bò, lactose</li>
                    </ul>
                </div>

                <!-- Pillar 3 -->
                <div class="p-8 rounded-2xl bg-gradient-to-b from-[#f8fafc] to-white border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-[#184241] text-white flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i data-lucide="heart-pulse" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#184241] transition-colors">Thực Phẩm Tự Nhiên & Chăm Sóc Sức Khỏe</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Các sản phẩm chăm sóc sức khỏe chủ động có nguồn gốc thiên nhiên, hỗ trợ cung cấp vi chất và dưỡng chất cần thiết cho cơ thể.
                    </p>
                    <ul class="space-y-2 text-xs text-gray-600 list-none p-0 m-0">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#184241]"></i> Nhãn mác, hướng dẫn sử dụng rõ ràng</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#184241]"></i> Tư vấn đúng công dụng sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. TIMELINE / MILESTONES -->
    <section class="py-20 lg:py-24 bg-[#F9FAFB]">
        <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
            <div class="text-center mb-16">
                <span class="text-[#54b259] font-bold uppercase tracking-widest text-xs">Chặng đường phát triển</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-4">Các Cột Mốc Hoạt Động</h2>
                <div class="w-16 h-1 bg-[#f8c03f] mx-auto rounded-full"></div>
            </div>

            <div class="space-y-8 relative before:absolute before:inset-0 before:left-8 md:before:left-1/2 before:w-0.5 before:bg-[#54b259]/30">
                
                <!-- Event 1 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex items-center justify-start md:justify-end w-full md:w-1/2 md:pr-12 pl-16 md:pl-0">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <span class="text-xs font-bold text-[#f8c03f] uppercase">Tháng 02 / 2020</span>
                            <h4 class="text-lg font-bold text-gray-900 mt-1 mb-2">Thành Lập Doanh Nghiệp</h4>
                            <p class="text-xs text-gray-600 leading-relaxed m-0">Công ty TNHH Thực Phẩm NP được cấp giấy phép kinh doanh, bắt đầu bước vào lĩnh vực phân phối thực phẩm dinh dưỡng.</p>
                        </div>
                    </div>
                    <div class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-[#54b259] text-white flex items-center justify-center font-bold text-xs shadow-lg">1</div>
                    <div class="hidden md:block w-1/2 md:pl-12"></div>
                </div>

                <!-- Event 2 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="hidden md:block w-1/2 md:pr-12"></div>
                    <div class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-[#f8c03f] text-[#1a4e4d] flex items-center justify-center font-bold text-xs shadow-lg">2</div>
                    <div class="flex items-center justify-start w-full md:w-1/2 md:pl-12 pl-16">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <span class="text-xs font-bold text-[#54b259] uppercase">Năm 2021 - 2022</span>
                            <h4 class="text-lg font-bold text-gray-900 mt-1 mb-2">Phân Phối Sản Phẩm Miwako</h4>
                            <p class="text-xs text-gray-600 leading-relaxed m-0">Triển khai giới thiệu các dòng sản phẩm sữa hạt Miwako và Miwako A+ từ thương hiệu Dale & Cecil đến thị trường trong nước.</p>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex items-center justify-start md:justify-end w-full md:w-1/2 md:pr-12 pl-16 md:pl-0">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <span class="text-xs font-bold text-[#f8c03f] uppercase">Năm 2023 - 2024</span>
                            <h4 class="text-lg font-bold text-gray-900 mt-1 mb-2">Mở Rộng Kênh Phân Phối</h4>
                            <p class="text-xs text-gray-600 leading-relaxed m-0">Kết nối hợp tác cùng các đối tác đại lý, cửa hàng mẹ và bé, từng bước nâng cao chất lượng dịch vụ giao nhận và chăm sóc khách hàng.</p>
                        </div>
                    </div>
                    <div class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-[#54b259] text-white flex items-center justify-center font-bold text-xs shadow-lg">3</div>
                    <div class="hidden md:block w-1/2 md:pl-12"></div>
                </div>

                <!-- Event 4 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="hidden md:block w-1/2 md:pr-12"></div>
                    <div class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-[#184241] text-white flex items-center justify-center font-bold text-xs shadow-lg">4</div>
                    <div class="flex items-center justify-start w-full md:w-1/2 md:pl-12 pl-16">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                            <span class="text-xs font-bold text-[#54b259] uppercase">Định Hướng Tương Lai</span>
                            <h4 class="text-lg font-bold text-gray-900 mt-1 mb-2">Phát Triển Bền Vững</h4>
                            <p class="text-xs text-gray-600 leading-relaxed m-0">Tiếp tục tìm kiếm và phân phối những sản phẩm dinh dưỡng lành tính, phục vụ nhu cầu sức khỏe của nhiều gia đình hơn.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. CTA CONTACT SECTION -->
    <section class="py-16 bg-gradient-to-r from-[#184241] to-[#2a5e5d] text-white">
        <div class="container mx-auto px-4 lg:px-8 text-center max-w-3xl">
            <h3 class="text-2xl lg:text-3xl font-bold font-serif mb-4 text-[#f8c03f]">Kết Nối Cùng NP FOOD</h3>
            <p class="text-gray-300 text-sm lg:text-base leading-relaxed mb-8">
                Nếu bạn quan tâm đến các sản phẩm dinh dưỡng hoặc mong muốn hợp tác kinh doanh, hãy liên hệ với chúng tôi để được hỗ trợ chu đáo.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url( home_url( '/tuyen-dung' ) ); ?>" class="px-8 py-3.5 bg-[#f8c03f] text-[#184241] font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-white transition-all shadow-lg no-underline flex items-center gap-2">
                    Cơ Hội Tuyển Dụng <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
                <a href="tel:0869858268" class="px-8 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-xs uppercase tracking-wider rounded-lg transition-all no-underline flex items-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4 text-[#f8c03f]"></i> 0869.858.268
                </a>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
