<?php
/**
 * Template Name: Sản Phẩm Miwako
 * Description: Trang thông tin giới thiệu sản phẩm Dinh Dưỡng Thực Vật Miwako - Thiết kế cao cấp, nghệ thuật với bảng màu pastel Miwako & Phông chữ riêng Fz Dom Casual
 */
get_header(); ?>

<style>
    @font-face {
        font-family: 'Fz Dom Casual';
        src: url('<?php echo esc_url(get_template_directory_uri() . '/fonts/fz-dom-casual.otf'); ?>') format('opentype');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    .font-dom {
        font-family: 'Fz Dom Casual', cursive, sans-serif !important;
    }

    @keyframes marquee-scroll-infinite {
        0% {
            transform: translate3d(0, 0, 0);
        }

        100% {
            transform: translate3d(-50%, 0, 0);
        }
    }

    .gallery-marquee-track {
        display: flex;
        width: max-content;
        animation: marquee-scroll-infinite 60s linear infinite;
        will-change: transform;
    }

    .gallery-marquee-container:hover .gallery-marquee-track {
        animation-play-state: paused;
    }
</style>

<div class="font-sans text-gray-800 bg-[#F8FAFD] selection:bg-[#4A90E2] selection:text-white min-h-screen">

    <!-- 1. HERO SECTION: FULL VIEWPORT FIRST SCREEN -->
    <section id="miwako-hero"
        class="relative flex items-center justify-center py-6 sm:py-8 lg:py-10 overflow-hidden bg-cover bg-center bg-no-repeat transition-[min-height] duration-200"
        style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/images/miwako-hero-bg.webp'); ?>'); min-height: calc(100vh - 105px); min-height: calc(100dvh - 105px);">

        <!-- Atmospheric Contrast Overlay for Left Content -->
        <div
            class="absolute inset-0 bg-gradient-to-r from-emerald-950/50 via-slate-900/20 to-transparent pointer-events-none z-0">
        </div>

        <!-- Seamless Soft Transition to Section 2 below -->
        <div
            class="absolute bottom-0 inset-x-0 h-14 bg-gradient-to-t from-white via-white/40 to-transparent pointer-events-none z-10">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10 py-2 sm:py-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 xl:gap-14 items-center">

                <!-- Left Column (6 cols): Logo Text, Slogan, and Badges -->
                <div class="lg:col-span-6 flex flex-col justify-center space-y-5 lg:space-y-7">

                    <div class="space-y-3 lg:space-y-4">
                        <!-- MIWAKO Brand Logo Text -->
                        <h1
                            class="font-dom text-6xl sm:text-7xl md:text-8xl lg:text-[8rem] xl:text-[10rem] 2xl:text-[12rem] tracking-wide leading-none select-none m-0 drop-shadow-[0_4px_16px_rgba(0,0,0,0.35)]">
                            <span style="color: #FFFFFF;">MI</span><span style="color: #C5E1C6;">WA</span><span
                                style="color: #E8E286;">KO</span>
                        </h1>

                        <!-- Slogan -->
                        <h2
                            class="font-dom text-2xl sm:text-3xl md:text-4xl lg:text-[3.3rem] text-white tracking-normal leading-snug m-0 drop-shadow-md">
                            Một lựa chọn tuyệt vời cho gia đình bạn
                        </h2>
                    </div>

                    <!-- Official Certification Badges Icon Strip (scaled to 15rem) -->
                    <div class="pt-2 lg:pt-3">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/products/miwako-certifications.webp'); ?>"
                            alt="Chứng nhận tiêu chuẩn quốc tế sản phẩm Miwako - No Added Gluten, Lactose, Dairy, Soy, Vegan, Non GMO, USDA Organic, GMP Certified"
                            class="h-20 sm:h-28 md:h-36 lg:h-[13rem] xl:h-[15rem] w-auto max-w-full object-contain drop-shadow-sm" />
                    </div>

                    <!-- Mandatory Notice at beginning -->
                    <div class="pt-1">
                        <div
                            class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-2xl bg-slate-900/60 backdrop-blur-md text-white/95 text-xs sm:text-sm font-medium">
                            <i data-lucide="info" class="w-4 h-4 text-amber-300 shrink-0"></i>
                            <span>Lưu ý: Miwako không thay thế sữa mẹ hoặc bữa ăn chính.</span>
                        </div>
                    </div>

                </div>

                <!-- Right Column (6 cols): Product Group Image -->
                <div class="lg:col-span-6 flex items-end justify-center lg:justify-end relative w-full pt-4">
                    <div class="relative inline-block">
                        <div
                            class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-[85%] h-5 bg-emerald-950/40 rounded-full blur-md -z-10">
                        </div>

                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/miwako-hero.png'); ?>"
                            alt="Thực phẩm dinh dưỡng Miwako thương hiệu Dale & Cecil"
                            class="w-full max-w-[500px] sm:max-w-[560px] lg:max-w-[620px] xl:max-w-[680px] h-auto object-contain relative z-10" />
                    </div>
                </div>

            </div>
        </div>

        <!-- Subtle Animated Scroll Down Indicator -->
        <a href="#brand-origin"
            class="absolute bottom-3 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-white/80 hover:text-white transition-all duration-300 no-underline group z-20"
            aria-label="Cuộn xuống khám phá">
            <span class="text-[10px] font-dom tracking-widest uppercase opacity-80 group-hover:opacity-100">CUỘN
                XUỐNG</span>
            <div
                class="w-5 h-8 rounded-full border border-white/60 flex items-start justify-center p-1 group-hover:border-white transition-colors">
                <div class="w-1 h-2 bg-white rounded-full animate-bounce"></div>
            </div>
        </a>
    </section>

    <!-- 2. SECTION: NGUỒN GỐC XUẤT XỨ (BRAND ORIGIN) -->
    <section id="brand-origin" class="py-20 lg:py-28 bg-white relative overflow-hidden scroll-mt-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- Left: Expansive Brand & Origin Photography (5 cols) -->
                <div class="lg:col-span-5">
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-md group bg-slate-100">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/gallery/miwako/miwako-06.jpg'); ?>"
                            alt="Thực phẩm dinh dưỡng Miwako của tập đoàn Dale & Cecil Malaysia"
                            class="w-full h-[520px] lg:h-[620px] object-cover object-top group-hover:scale-105 transition-transform duration-700 ease-out" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex flex-col justify-end p-6 lg:p-8">
                            <span
                                class="px-3.5 py-1.5 rounded-full bg-slate-900/60 backdrop-blur-md text-xs font-dom tracking-wider uppercase text-white mb-2 inline-flex items-center gap-1.5 w-fit">
                                <i data-lucide="award" class="w-3.5 h-3.5 text-amber-400"></i>
                                <span>Dale &amp; Cecil • Malaysia</span>
                            </span>
                            <p class="text-white/95 text-sm lg:text-base font-medium m-0 leading-snug">
                                Thực phẩm dinh dưỡng Miwako được nghiên cứu và phát triển bởi tập đoàn Dale &amp; Cecil.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right: Brand Origin Core Facts (7 cols) -->
                <div class="lg:col-span-7 space-y-8">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                            NGUỒN GỐC & SẢN XUẤT
                        </h2>
                        <p class="text-lg text-slate-600 mt-3 leading-relaxed">
                            Thông tin chính thức về đơn vị nghiên cứu và nhà máy sản xuất tại Malaysia.
                        </p>
                    </div>

                    <!-- Fact 1: Dale & Cecil -->
                    <div class="p-8 rounded-[2rem] bg-[#F8FAFD] space-y-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl lg:text-2xl font-dom text-slate-900 m-0 uppercase">
                                TẬP ĐOÀN DALE &amp; CECIL (MALAYSIA)
                            </h3>
                            <span
                                class="text-xs font-dom uppercase text-[#2563EB] bg-blue-50 px-3.5 py-1.5 rounded-full">
                                Nghiên cứu &amp; Phát triển
                            </span>
                        </div>
                        <p class="text-base lg:text-lg text-slate-700 leading-relaxed m-0">
                            Thực phẩm dinh dưỡng Miwako được nghiên cứu bởi tập đoàn Dale &amp; Cecil (Malaysia), định
                            hướng phát triển nguồn dinh dưỡng thực vật tự nhiên.
                        </p>
                        <div class="pt-2">
                            <a href="https://daleandcecil.com.my/our-story/" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-sm font-dom uppercase text-[#2563EB] hover:text-[#1E40AF] tracking-wider transition-colors no-underline group">
                                <span>TÌM HIỂU VỀ DALE &amp; CECIL</span>
                                <i data-lucide="arrow-up-right"
                                    class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Fact 2: Omega Health Factory -->
                    <div class="p-8 rounded-[2rem] bg-[#F8FAFD] space-y-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl lg:text-2xl font-dom text-slate-900 m-0 uppercase">
                                NHÀ MÁY OMEGA HEALTH PRODUCTS
                            </h3>
                            <span
                                class="text-xs font-dom uppercase text-emerald-800 bg-emerald-50 px-3.5 py-1.5 rounded-full">
                                Chuẩn GMP &amp; HACCP
                            </span>
                        </div>
                        <p class="text-base lg:text-lg text-slate-700 leading-relaxed m-0">
                            Sản xuất trực tiếp tại nhà máy Omega Health Products (Malaysia) trên dây chuyền hiện đại đạt
                            tiêu chuẩn quốc tế GMP và HACCP.
                        </p>
                        <div class="pt-2">
                            <a href="https://omegahealth.com.my/about-us/" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-sm font-dom uppercase text-[#2563EB] hover:text-[#1E40AF] tracking-wider transition-colors no-underline group">
                                <span>THÔNG TIN NHÀ MÁY OMEGA HEALTH</span>
                                <i data-lucide="arrow-up-right"
                                    class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- 3. SECTION: ĐƠN VỊ NHẬP KHẨU VÀ PHÂN PHỐI NP FOOD (IMPORTER & REGISTRATION) -->
    <section id="importer-npfood" class="py-20 lg:py-28 bg-[#F8FAFD] relative scroll-mt-12">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- Left: NP Food Information & Self-Declaration (7 cols) -->
                <div class="lg:col-span-7 space-y-8">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                            ĐƠN VỊ NHẬP KHẨU NP FOOD
                        </h2>
                        <p class="text-lg text-slate-600 mt-3 leading-relaxed">
                            Nhập khẩu chính ngạch và phân phối độc quyền tại Việt Nam bởi Công ty TNHH Thực Phẩm NP.
                        </p>
                    </div>

                    <!-- Company Info Card (Borderless, Soft Elevation) -->
                    <div class="bg-white p-8 lg:p-10 rounded-[2rem] shadow-sm space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3.5">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#0F2322] text-white flex items-center justify-center font-bold text-xl shadow-xs">
                                    NP
                                </div>
                                <div>
                                    <h3 class="text-xl lg:text-2xl font-dom text-slate-900 uppercase m-0">
                                        CÔNG TY TNHH THỰC PHẨM NP
                                    </h3>
                                    <span class="text-sm text-slate-500">Mã số thuế: 0109082378 • Cấp bởi Sở KH&ĐT TP.
                                        Hà Nội</span>
                                </div>
                            </div>
                            <span
                                class="text-xs font-dom uppercase text-emerald-800 bg-emerald-50 px-3.5 py-1.5 rounded-full hidden sm:inline-block">
                                Nhập khẩu chính ngạch
                            </span>
                        </div>

                        <!-- Core Contact Points (Large readable text) -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-base text-slate-700 pt-2">
                            <div class="p-4 rounded-2xl bg-[#F8FAFD]">
                                <span class="block text-xs font-dom text-slate-400 uppercase mb-1">VĂN PHÒNG ĐẠI
                                    DIỆN</span>
                                <strong class="text-slate-900 font-medium text-sm sm:text-base leading-snug block">489
                                    Hoàng Quốc Việt, Cầu Giấy, Hà Nội</strong>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#F8FAFD]">
                                <span class="block text-xs font-dom text-slate-400 uppercase mb-1">HOTLINE TƯ VẤN</span>
                                <strong class="text-slate-900 font-mono font-bold text-lg block">0869.858.268</strong>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#F8FAFD]">
                                <span class="block text-xs font-dom text-slate-400 uppercase mb-1">CỔNG THÔNG TIN</span>
                                <a href="https://npfood.vn" target="_blank" rel="noopener noreferrer"
                                    class="text-[#2563EB] hover:underline font-mono font-bold text-base block">npfood.vn</a>
                            </div>
                        </div>
                    </div>

                    <!-- Self-Declaration Action Card (Borderless, Deep Brand Blue) -->
                    <div
                        class="p-6 lg:p-8 rounded-[2rem] bg-gradient-to-r from-[#1E3A8A] via-[#1E40AF] to-[#172554] text-white shadow-md flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="space-y-1.5 text-center sm:text-left">
                            <span class="text-xs font-dom uppercase tracking-wider text-sky-300 block">
                                TÀI LIỆU SẢN PHẨM
                            </span>
                            <h4 class="text-xl lg:text-2xl font-dom text-white uppercase m-0">
                                BẢN TỰ CÔNG BỐ SẢN PHẨM
                            </h4>
                            <p class="text-sm text-white/80 m-0">
                                Sản phẩm Miwako được nhập khẩu chính ngạch và phân phối độc quyền tại Việt Nam bởi Công
                                ty TNHH Thực Phẩm NP.
                            </p>
                        </div>
                        <a href="https://drive.google.com/file/d/1uQc18biNd6Yfw6cq32k9QAtRF247rU5k/view" target="_blank"
                            rel="noopener noreferrer"
                            class="shrink-0 inline-flex items-center gap-2.5 px-6 py-4 rounded-2xl bg-white hover:bg-sky-50 text-[#1E3A8A] text-sm font-dom uppercase tracking-wider shadow-md hover:shadow-lg transition-all group no-underline">
                            <i data-lucide="external-link"
                                class="w-4 h-4 text-[#2563EB] group-hover:scale-110 transition-transform"></i>
                            <span>XEM BẢN CÔNG BỐ (PDF)</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Big Authentic Miwako Photo (5 cols) -->
                <div class="lg:col-span-5">
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-md group bg-slate-100">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/gallery/miwako/miwako-23.jpg'); ?>"
                            alt="Thực phẩm dinh dưỡng Miwako chính hãng phân phối bởi NP Food"
                            class="w-full h-[520px] lg:h-[620px] object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex flex-col justify-end p-6 lg:p-8">
                            <span
                                class="px-3.5 py-1.5 rounded-full bg-slate-900/60 backdrop-blur-md text-xs font-dom tracking-wider uppercase text-white mb-2 inline-flex items-center gap-1.5 w-fit">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
                                <span>NP Food • Nhập Khẩu Độc Quyền</span>
                            </span>
                            <h3 class="text-white text-2xl lg:text-3xl font-dom m-0 uppercase leading-snug">
                                NHẬP KHẨU CHÍNH NGẠCH
                            </h3>
                            <p class="text-white/95 text-sm lg:text-base font-medium mt-1 leading-snug m-0">
                                Sản phẩm Miwako được nhập khẩu chính ngạch và phân phối độc quyền tại Việt Nam bởi Công ty TNHH Thực Phẩm NP.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- 4. SECTION: CÁC CHỨNG NHẬN ĐÃ ĐƯỢC GHI NHẬN (CERTIFICATIONS) -->
    <section id="certifications" class="py-20 lg:py-28 bg-white relative">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                    CÁC TIÊU CHUẨN VÀ CHỨNG NHẬN GHI NHẬN
                </h2>
                <p class="text-base lg:text-lg text-slate-600 mt-3 leading-relaxed m-0">
                    Thông tin ghi nhận theo tài liệu chứng nhận độc lập của tổ chức cấp phép và tài liệu công bố của nhà
                    sản xuất.
                </p>
            </div>

            <!-- 1. PRIMARY SPOTLIGHT: USDA ORGANIC & GMP CERTIFIED (TRỌNG TÂM CỐT LÕI) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 mb-12">

                <!-- Focus 1: USDA Organic -->
                <div
                    class="p-8 lg:p-12 rounded-[2.5rem] bg-[#F8FAFD] shadow-sm hover:shadow-md transition-all duration-300 flex flex-col sm:flex-row gap-6 lg:gap-8 items-center sm:items-start group">
                    <div
                        class="w-28 h-28 sm:w-36 sm:h-36 shrink-0 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-usda-organic.webp'); ?>"
                            alt="Chứng nhận hữu cơ USDA Organic (Hoa Kỳ)" class="max-h-full max-w-full object-contain"
                            loading="lazy" />
                    </div>
                    <div class="flex-1 flex flex-col justify-between h-full text-center sm:text-left">
                        <div>
                            <span
                                class="text-xs font-dom uppercase tracking-wider text-emerald-800 bg-emerald-100/90 px-3.5 py-1.5 rounded-full inline-block mb-3">
                                THEO CHỨNG NHẬN USDA ORGANIC
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-dom text-slate-900 mb-2.5 uppercase">
                                CHỨNG NHẬN NGUYÊN LIỆU HỮU CƠ USDA
                            </h3>
                            <p class="text-base text-slate-700 leading-relaxed mb-4">
                                Theo chứng nhận từ Bộ Nông nghiệp Hoa Kỳ cấp cho nguồn nguyên liệu, các thành phần nông
                                sản được canh tác hữu cơ tự nhiên, không biến đổi gen (Non-GMO), không phân bón hóa học
                                hay thuốc trừ sâu tổng hợp.
                            </p>
                        </div>
                        <div
                            class="pt-4 border-t border-slate-200/60 flex items-center justify-between text-sm font-dom">
                            <span class="text-emerald-700 uppercase">USDA ORGANIC CERTIFIED</span>
                            <span class="text-slate-500 font-sans text-xs">Theo hồ sơ nguyên liệu</span>
                        </div>
                    </div>
                </div>

                <!-- Focus 2: GMP Certified -->
                <div
                    class="p-8 lg:p-12 rounded-[2.5rem] bg-[#F8FAFD] shadow-sm hover:shadow-md transition-all duration-300 flex flex-col sm:flex-row gap-6 lg:gap-8 items-center sm:items-start group">
                    <div
                        class="w-28 h-28 sm:w-36 sm:h-36 shrink-0 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-gmp-certified.webp'); ?>"
                            alt="Chứng nhận tiêu chuẩn thực hành sản xuất tốt GMP Certified"
                            class="max-h-full max-w-full object-contain" loading="lazy" />
                    </div>
                    <div class="flex-1 flex flex-col justify-between h-full text-center sm:text-left">
                        <div>
                            <span
                                class="text-xs font-dom uppercase tracking-wider text-slate-800 bg-slate-200/90 px-3.5 py-1.5 rounded-full inline-block mb-3">
                                THEO CHỨNG NHẬN GMP NHÀ MÁY
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-dom text-slate-900 mb-2.5 uppercase">
                                TIÊU CHUẨN SẢN XUẤT GMP
                            </h3>
                            <p class="text-base text-slate-700 leading-relaxed mb-4">
                                Theo tài liệu kiểm định của nhà máy sản xuất tại Malaysia, quy trình sản xuất và đóng
                                lon đạt chứng nhận Thực hành Sản xuất Tốt (GMP), kiểm soát vô trùng và chất lượng đồng
                                nhất.
                            </p>
                        </div>
                        <div
                            class="pt-4 border-t border-slate-200/60 flex items-center justify-between text-sm font-dom">
                            <span class="text-slate-700 uppercase">GMP CERTIFIED FACILITY</span>
                            <span class="text-slate-500 font-sans text-xs">Kiểm định định kỳ</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 2. SECONDARY TIER: 6 EQUAL STANDARD BADGES (CÁC ICON CÒN LẠI NGANG NHAU) -->
            <div class="p-8 lg:p-12 rounded-[2.5rem] bg-[#F8FAFD]">
                <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
                    <h4 class="font-dom text-xl lg:text-2xl text-slate-900 uppercase m-0">
                        TIÊU CHUẨN NGUYÊN LIỆU &amp; AN TOÀN DỊ ỨNG TRÊN NHÃN LON
                    </h4>
                    <p class="text-sm lg:text-base text-slate-600 mt-2 m-0">
                        Các tiêu chuẩn được ghi nhận và in minh bạch trên bao bì theo hồ sơ công bố của sản phẩm
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 sm:gap-6 lg:gap-4 items-start">

                    <!-- Item 1: Non-GMO -->
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 lg:w-24 lg:h-24 xl:w-28 xl:h-28 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-non-gmo.webp'); ?>"
                                alt="Chứng nhận Non-GMO Không biến đổi gen" class="max-h-full max-w-full object-contain"
                                loading="lazy" />
                        </div>
                        <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-snug m-0 max-w-[155px]">
                            Nguồn ngũ cốc không biến đổi gen theo tài liệu kiểm nghiệm
                        </p>
                    </div>

                    <!-- Item 2: Vegan -->
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 lg:w-24 lg:h-24 xl:w-28 xl:h-28 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-vegan.webp'); ?>"
                                alt="Chứng nhận Vegan Thuần chay" class="max-h-full max-w-full object-contain"
                                loading="lazy" />
                        </div>
                        <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-snug m-0 max-w-[155px]">
                            Thuần thực vật, không chứa thành phần nguồn gốc động vật
                        </p>
                    </div>

                    <!-- Item 3: No Added Dairy -->
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 lg:w-24 lg:h-24 xl:w-28 xl:h-28 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-no-dairy.webp'); ?>"
                                alt="Không bổ sung đạm sữa bò No Added Dairy"
                                class="max-h-full max-w-full object-contain" loading="lazy" />
                        </div>
                        <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-snug m-0 max-w-[155px]">
                            Không bổ sung đạm sữa bò theo nhãn công bố sản phẩm
                        </p>
                    </div>

                    <!-- Item 4: No Added Gluten -->
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 lg:w-24 lg:h-24 xl:w-28 xl:h-28 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-no-gluten.webp'); ?>"
                                alt="Không chứa gluten No Added Gluten" class="max-h-full max-w-full object-contain"
                                loading="lazy" />
                        </div>
                        <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-snug m-0 max-w-[155px]">
                            Không chứa gluten, an toàn cho hệ tiêu hóa nhạy cảm
                        </p>
                    </div>

                    <!-- Item 5: No Added Lactose -->
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 lg:w-24 lg:h-24 xl:w-28 xl:h-28 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-no-lactose.webp'); ?>"
                                alt="Không đường lactose No Added Lactose" class="max-h-full max-w-full object-contain"
                                loading="lazy" />
                        </div>
                        <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-snug m-0 max-w-[155px]">
                            Không chứa đường lactose theo bảng phân tích thành phần
                        </p>
                    </div>

                    <!-- Item 6: No Added Soy -->
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 lg:w-24 lg:h-24 xl:w-28 xl:h-28 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-no-soy.webp'); ?>"
                                alt="Không chứa đậu nành No Added Soy" class="max-h-full max-w-full object-contain"
                                loading="lazy" />
                        </div>
                        <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-snug m-0 max-w-[155px]">
                            Không chứa đậu nành theo hồ sơ tự công bố sản phẩm
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- 4. SECTION: BẢNG GIÁ TRỊ DINH DƯỠNG (NUTRITION FACTS) -->
    <?php
    $miwako_ingredients = [
        ['name' => 'Quinoa (Diêm mạch) hữu cơ', 'desc' => 'Giàu 9 axit amin thiết yếu', 'icon' => 'sprout'],
        ['name' => 'Hạt Kê (Millet) hữu cơ', 'desc' => 'Giàu khoáng chất tự nhiên & kiềm tính', 'icon' => 'wheat'],
        ['name' => 'Protein đậu Hà Lan phân lập', 'desc' => 'Đạm thực vật tinh khiết Pisane™', 'icon' => 'sparkles'],
        ['name' => 'Gạo lứt nảy mầm hữu cơ', 'desc' => 'Giàu dưỡng chất GABA & vitamin nhóm B', 'icon' => 'leaf'],
        ['name' => 'Gạo lứt tự nhiên', 'desc' => 'Carbohydrate phức hợp hấp thu chậm', 'icon' => 'sun'],
        ['name' => 'Chất xơ hòa tan FOS', 'desc' => 'Prebiotic nuôi dưỡng lợi khuẩn đường ruột', 'icon' => 'shield-check'],
        ['name' => 'Dầu hướng dương & dầu hạt lanh', 'desc' => 'Nguồn giàu Omega-3 (ALA) và Omega-6 (LA)', 'icon' => 'droplet'],
    ];

    $nutrition_groups_miwako = [
        [
            'id'       => 'macro',
            'title'    => 'Giá Trị Dinh Dưỡng Năng Lượng & Đại Lượng',
            'badge'    => 'Năng lượng & Đại lượng',
            'icon'     => 'zap',
            'items'    => [
                ['name' => 'Năng lượng', 'per_100g' => '405 Kcal (1701 kJ)', 'per_serving' => '122 Kcal (512 kJ)', 'is_bold' => true, 'is_sub' => false, 'tag' => 'Năng lượng sạch'],
                ['name' => 'Carbonhydrate', 'per_100g' => '73.5 g', 'per_serving' => '22.1 g', 'is_bold' => true, 'is_sub' => false, 'tag' => ''],
                ['name' => 'Chất xơ', 'per_100g' => '5.8 g', 'per_serving' => '1.7 g', 'is_bold' => false, 'is_sub' => true, 'tag' => ''],
                ['name' => 'Chất xơ hòa tan FOS', 'per_100g' => '4.8 g', 'per_serving' => '1.4 g', 'is_bold' => true, 'is_sub' => true, 'tag' => 'Prebiotic dồi dào'],
                ['name' => 'Protein (Chất đạm thực vật)', 'per_100g' => '20.0 g', 'per_serving' => '6.0 g', 'is_bold' => true, 'is_sub' => false, 'tag' => '20% Protein'],
                ['name' => 'Tổng số chất béo', 'per_100g' => '2.2 g', 'per_serving' => '0.7 g', 'is_bold' => true, 'is_sub' => false, 'tag' => 'Chất béo thấp'],
                ['name' => 'Axit béo không bão hòa đơn', 'per_100g' => '0.2 g', 'per_serving' => '0.1 g', 'is_bold' => false, 'is_sub' => true, 'tag' => 'MUFA'],
                ['name' => 'Axit béo không bão hòa đa', 'per_100g' => '1.0 g', 'per_serving' => '0.3 g', 'is_bold' => false, 'is_sub' => true, 'tag' => 'PUFA'],
                ['name' => 'Axit alpha-linolenic (ALA)', 'per_100g' => '450 mg', 'per_serving' => '135 mg', 'is_bold' => true, 'is_sub' => true, 'tag' => 'Omega-3'],
                ['name' => 'Axit Linoleic (LA)', 'per_100g' => '550 mg', 'per_serving' => '165 mg', 'is_bold' => false, 'is_sub' => true, 'tag' => 'Omega-6'],
                ['name' => 'Axit béo bão hòa', 'per_100g' => '1.0 g', 'per_serving' => '0.3 g', 'is_bold' => false, 'is_sub' => true, 'tag' => ''],
                ['name' => 'Axit béo chuyển hóa', 'per_100g' => '0 g', 'per_serving' => '0 g', 'is_bold' => true, 'is_sub' => true, 'tag' => '0g Trans Fat'],
                ['name' => 'Cholesterol', 'per_100g' => '0 mg', 'per_serving' => '0 mg', 'is_bold' => true, 'is_sub' => false, 'tag' => '0mg Cholesterol'],
            ],
        ],
        [
            'id'       => 'minerals',
            'title'    => 'Các Khoáng Chất Tự Nhiên',
            'badge'    => 'Khoáng chất tự nhiên',
            'icon'     => 'shield-check',
            'items'    => [
                ['name' => 'Natri', 'per_100g' => '103 mg', 'per_serving' => '31 mg', 'is_bold' => false, 'is_sub' => false, 'tag' => ''],
                ['name' => 'Canxi', 'per_100g' => '160 mg', 'per_serving' => '48 mg', 'is_bold' => true, 'is_sub' => false, 'tag' => 'Canxi thực vật'],
            ],
        ],
    ];
    ?>
    <section id="nutrition-facts" class="py-20 lg:py-28 bg-[#F8FAFD] border-y border-slate-200/60 relative scroll-mt-12 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-teal-100 text-[#1a4e4d] text-xs font-dom uppercase tracking-wider mb-3 font-bold">
                    <i data-lucide="clipboard-check" class="w-4 h-4 text-[#1a4e4d]"></i>
                    HỒ SƠ CÔNG BỐ CHẤT LƯỢNG CHÍNH THỨC
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                    BẢNG GIÁ TRỊ DINH DƯỠNG MIWAKO
                </h2>
                <p class="text-base lg:text-lg text-slate-600 mt-3 leading-relaxed m-0">
                    Thành phần nguyên liệu tự nhiên cùng hàm lượng dinh dưỡng chi tiết trong 100g bột và mỗi khẩu phần chuẩn 30g từ Dale &amp; Cecil Malaysia.
                </p>
            </div>

            <!-- 4 Quick Key Metric Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-12">
                <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-dom uppercase tracking-wider text-slate-500">Năng lượng</span>
                        <div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-amber-600">
                            <i data-lucide="zap" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-dom text-slate-900 leading-none">405 <span class="text-sm font-sans font-semibold text-slate-500">Kcal</span></div>
                        <p class="text-xs text-slate-500 mt-1.5 m-0">122 Kcal / khẩu phần 30g năng lượng từ các loại hạt lành tính</p>
                    </div>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-dom uppercase tracking-wider text-slate-500">Đạm thực vật cao</span>
                        <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <i data-lucide="sprout" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-dom text-emerald-800 leading-none">20.0 <span class="text-sm font-sans font-semibold text-slate-500">g</span></div>
                        <p class="text-xs text-slate-500 mt-1.5 m-0">Chiếm 20% tỉ trọng từ mầm gạo nâu &amp; đạm đậu Hà Lan Pisane™</p>
                    </div>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-dom uppercase tracking-wider text-slate-500">Chất xơ hòa tan FOS</span>
                        <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center text-[#1a4e4d]">
                            <i data-lucide="shield-check" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-dom text-[#1a4e4d] leading-none">4.8 <span class="text-sm font-sans font-semibold text-slate-500">g</span></div>
                        <p class="text-xs text-slate-500 mt-1.5 m-0">Nguồn Prebiotic dồi dào, hỗ trợ tiêu hóa vượt trội &amp; êm dịu đường ruột</p>
                    </div>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-dom uppercase tracking-wider text-slate-500">Omega-3 (ALA)</span>
                        <div class="w-8 h-8 rounded-full bg-sky-50 flex items-center justify-center text-sky-600">
                            <i data-lucide="sparkles" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-dom text-sky-800 leading-none">450 <span class="text-sm font-sans font-semibold text-slate-500">mg</span></div>
                        <p class="text-xs text-slate-500 mt-1.5 m-0">Cùng 550mg LA từ dầu hạt lanh &amp; hướng dương nuôi dưỡng trí não</p>
                    </div>
                </div>
            </div>

            <!-- Natural Ingredients Showcase Banner -->
            <div class="p-6 sm:p-8 rounded-[2rem] bg-white border border-slate-200/80 shadow-sm mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#1a4e4d] flex items-center justify-center">
                        <i data-lucide="leaf" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <span class="text-xs font-dom uppercase tracking-wider text-[#1a4e4d] block font-bold">NGUỒN NGUYÊN LIỆU HỮU CƠ TỰ NHIÊN</span>
                        <h4 class="text-lg sm:text-xl font-dom text-slate-900 m-0 uppercase">THÀNH PHẦN NGUYÊN BẢN</h4>
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-5">
                    Miwako được bào chế từ 100% nguồn hạt và ngũ cốc hữu cơ lành tính, không chứa chất bảo quản, không phẩm màu nhân tạo, không đường lactose và không đậu nành:
                </p>
                <div class="flex flex-wrap gap-2.5">
                    <?php foreach ($miwako_ingredients as $ing): ?>
                        <div class="inline-flex items-center gap-2 py-2 px-3.5 rounded-xl bg-slate-50 border border-slate-200/70 text-xs sm:text-sm text-slate-800">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                            <span class="font-medium"><?php echo esc_html($ing['name']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Main Layout: Table (8 cols) + Sticky Side Showcase (4 cols) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

                <!-- Left Column (8 cols): Nutrition Facts Table -->
                <div class="lg:col-span-8 space-y-6">

                    <!-- Table Card -->
                    <div class="overflow-hidden rounded-[2rem] border border-slate-200/80 shadow-sm bg-white">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-sm min-w-[560px]">
                                <thead>
                                    <tr class="bg-[#1a4e4d] text-white font-dom text-xs sm:text-sm uppercase tracking-wider">
                                        <th class="py-4 px-5 sm:px-7 font-bold">Giá Trị Dinh Dưỡng</th>
                                        <th class="py-4 px-4 sm:px-6 font-bold text-right whitespace-nowrap">Trong 100g bột</th>
                                        <th class="py-4 px-5 sm:px-7 font-bold text-right whitespace-nowrap">Trong khẩu phần (30g)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nutrition_groups_miwako as $group): ?>
                                        <!-- Group Header Row -->
                                        <tr class="bg-teal-900/[0.04] border-y border-teal-800/10">
                                            <td colspan="3" class="py-3.5 px-5 sm:px-7 font-dom text-xs uppercase tracking-wider text-[#1a4e4d] font-bold">
                                                <span class="inline-flex items-center gap-2">
                                                    <i data-lucide="<?php echo esc_attr($group['icon']); ?>" class="w-4 h-4 text-emerald-600"></i>
                                                    <span><?php echo esc_html($group['title']); ?></span>
                                                    <span class="text-[10px] font-sans font-normal text-slate-500 lowercase">(<?php echo count($group['items']); ?> chỉ tiêu)</span>
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Group Items Rows -->
                                        <?php foreach ($group['items'] as $item): ?>
                                            <tr class="border-b border-slate-100 hover:bg-teal-50/40 transition-colors <?php echo $item['is_bold'] ? 'bg-slate-50/40' : ''; ?>">
                                                
                                                <!-- Nutrient Name -->
                                                <td class="py-3.5 <?php echo $item['is_sub'] ? 'pl-9 sm:pl-12 pr-4 text-slate-600 text-xs sm:text-sm' : 'px-5 sm:px-7 text-xs sm:text-sm'; ?> <?php echo $item['is_bold'] ? 'font-bold text-slate-900' : ''; ?>">
                                                    <div class="inline-flex items-center gap-2 flex-wrap">
                                                        <?php if ($item['is_sub']): ?>
                                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                                                        <?php endif; ?>
                                                        <span><?php echo esc_html($item['name']); ?></span>
                                                        <?php if (!empty($item['tag'])): ?>
                                                            <span class="text-[10px] font-dom uppercase px-2 py-0.5 rounded-full <?php echo strpos($item['tag'], '0') !== false ? 'bg-emerald-100 text-emerald-800' : 'bg-teal-100 text-[#1a4e4d]'; ?> font-bold tracking-tight">
                                                                <?php echo esc_html($item['tag']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>

                                                <!-- Per 100g -->
                                                <td class="py-3.5 px-4 sm:px-6 text-right font-mono text-xs sm:text-sm <?php echo $item['is_bold'] ? 'font-bold text-slate-900' : 'font-medium text-slate-700'; ?> whitespace-nowrap">
                                                    <?php echo esc_html($item['per_100g']); ?>
                                                </td>

                                                <!-- Per Serving (30g) -->
                                                <td class="py-3.5 px-5 sm:px-7 text-right font-mono text-xs sm:text-sm <?php echo $item['is_bold'] ? 'font-bold text-emerald-800' : 'font-semibold text-slate-800'; ?> whitespace-nowrap">
                                                    <?php echo esc_html($item['per_serving']); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Table Footer Note -->
                        <div class="p-4 sm:p-5 bg-slate-50 border-t border-slate-100 flex items-start gap-3 text-xs text-slate-500">
                            <i data-lucide="info" class="w-4 h-4 text-teal-700 shrink-0 mt-0.5"></i>
                            <span class="leading-relaxed">
                                <strong>Lưu ý:</strong> Bảng thành phần dinh dưỡng được công bố chính thức theo nhãn phụ sản phẩm của tập đoàn <strong>Dale &amp; Cecil Malaysia</strong>. Miwako là thực phẩm bổ sung dinh dưỡng thực vật từ các loại hạt, thích hợp cho trẻ từ 12 tháng tuổi trở lên và cả gia đình.
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Right Column (4 cols): Sticky Visual Presentation Card -->
                <div class="lg:col-span-4 sticky top-28 space-y-6">

                    <div class="bg-white rounded-[2.5rem] p-6 sm:p-8 shadow-sm border border-slate-100 flex flex-col items-center text-center">
                        
                        <!-- Editorial Heading -->
                        <div class="mb-4">
                            <span class="text-xs font-dom uppercase tracking-widest text-[#1a4e4d] font-bold block mb-1">
                                CÔNG THỨC DINH DƯỠNG
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-dom text-slate-900 uppercase tracking-wide leading-tight m-0">
                                GIÁ TRỊ DINH DƯỠNG CỦA MIWAKO
                            </h3>
                        </div>

                        <!-- Product Can Photo -->
                        <div class="relative py-2 w-full flex justify-center">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/products/miwako.webp'); ?>"
                                alt="Lon thực phẩm dinh dưỡng Miwako Dale & Cecil"
                                class="w-full max-w-[260px] h-auto object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.18)] hover:scale-105 transition-transform duration-500 ease-out" />
                        </div>

                        <!-- Super Health Brand Award Banner -->
                        <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-teal-50/80 border border-teal-200/60 text-left w-full mt-4">
                            <div class="w-14 h-14 shrink-0 flex items-center justify-center">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/badges/badge-health-brand.webp'); ?>"
                                    alt="Asia Pacific Super Health Brand 2022 &amp; 2023" class="max-h-full max-w-full object-contain" />
                            </div>
                            <div>
                                <span class="text-[11px] font-dom uppercase tracking-wider text-[#1a4e4d] block font-bold">CHỨNG NHẬN QUỐC TẾ</span>
                                <p class="text-xs text-slate-700 font-medium m-0 leading-snug">
                                    Asia Pacific Super Health Brand — Giải thưởng thương hiệu sức khỏe uy tín khu vực Châu Á - Thái Bình Dương.
                                </p>
                            </div>
                        </div>

                        <!-- Standard Serving Guide Box -->
                        <div class="p-5 rounded-2xl bg-[#F8FAFD] border border-slate-200/60 space-y-3 text-left w-full mt-5">
                            <div class="flex items-center gap-2 text-slate-900 font-dom text-sm uppercase">
                                <i data-lucide="cup-soda" class="w-4 h-4 text-emerald-600"></i>
                                <span>Quy Chuẩn 1 Khẩu Phần Chuẩn</span>
                            </div>
                            <ul class="text-xs text-slate-600 space-y-2 m-0 p-0 list-none">
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span><strong>3 muỗng gạt bột</strong> (tương đương khoảng <strong>30g</strong>).</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span>Pha cùng <strong>150ml nước ấm</strong> (45°C - 50°C), khuấy đều.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span>Cung cấp <strong>122 Kcal</strong> năng lượng từ hạt tự nhiên.</span>
                                </li>
                            </ul>
                        </div>

                        <!-- 3 Safety Commitments (0 Trans fat, 0 Cholesterol, 0 Lactose) -->
                        <div class="grid grid-cols-3 gap-2 w-full mt-4 text-center">
                            <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-100">
                                <span class="text-base font-bold text-emerald-700 block font-dom">0g</span>
                                <span class="text-[10px] text-emerald-800 uppercase tracking-tight block font-medium">Trans Fat</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-100">
                                <span class="text-base font-bold text-emerald-700 block font-dom">0mg</span>
                                <span class="text-[10px] text-emerald-800 uppercase tracking-tight block font-medium">Cholesterol</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-100">
                                <span class="text-base font-bold text-emerald-700 block font-dom">0%</span>
                                <span class="text-[10px] text-emerald-800 uppercase tracking-tight block font-medium">Lactose</span>
                            </div>
                        </div>

                        <!-- CTA Jump Button -->
                        <a href="#usage-guidelines"
                            class="block w-full py-3.5 px-5 bg-[#1a4e4d] hover:bg-[#133e3d] text-white text-center rounded-xl font-dom text-xs uppercase tracking-wider font-bold transition-colors shadow-sm no-underline mt-5">
                            Xem Cách Pha Chi Tiết
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- 5. SECTION: HƯỚNG DẪN SỬ DỤNG VÀ BẢO QUẢN (USAGE & STORAGE GUIDELINES) -->
    <section id="usage-guidelines" class="py-20 lg:py-28 bg-[#F8FAFD] relative">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="text-center max-w-3xl mx-auto mb-14 lg:mb-16">
                <h2 class="text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                    HƯỚNG DẪN SỬ DỤNG VÀ BẢO QUẢN
                </h2>
                <p class="text-base lg:text-lg text-slate-600 mt-3 leading-relaxed m-0">
                    Định lượng chuẩn, cách pha và quy tắc bảo quản theo hướng dẫn công bố của nhà sản xuất.
                </p>
            </div>

            <!-- 2 Columns: Full-scale & Harmonious with Other Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">

                <!-- LEFT COLUMN (5 cols): Feature Image matched to content height -->
                <div class="lg:col-span-5 relative rounded-[2.5rem] overflow-hidden shadow-sm min-h-[420px] lg:min-h-full group bg-slate-100">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/gallery/miwako/miwako-03.jpg'); ?>"
                        alt="Thực phẩm dinh dưỡng Miwako cho bữa ăn phụ của bé"
                        class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
                        loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex flex-col justify-end p-6 lg:p-8">
                        <span class="px-3.5 py-1.5 rounded-full bg-slate-900/60 backdrop-blur-md text-xs font-dom tracking-wider uppercase text-white mb-2 inline-flex items-center gap-1.5 w-fit">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-amber-400"></i>
                            <span>Khẩu phần bữa ăn phụ</span>
                        </span>
                        <p class="text-white/95 text-sm lg:text-base font-medium m-0 leading-snug">
                            Dễ dàng chuẩn bị và thưởng thức dinh dưỡng thực vật lành tính mỗi ngày.
                        </p>
                    </div>
                </div>

                <!-- RIGHT COLUMN (7 cols): Generous, balanced content -->
                <div class="lg:col-span-7 bg-white rounded-[2.5rem] p-8 lg:p-12 shadow-sm flex flex-col justify-between gap-8">

                    <!-- BLOCK 1: HƯỚNG DẪN SỬ DỤNG -->
                    <div>
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                                <i data-lucide="cup-soda" class="w-6 h-6"></i>
                            </div>
                            <h3 class="text-2xl lg:text-3xl font-dom text-slate-900 m-0 uppercase tracking-wide">
                                HƯỚNG DẪN SỬ DỤNG
                            </h3>
                        </div>

                        <!-- 3 Key Metric Pills -->
                        <div class="grid grid-cols-3 gap-3 text-center bg-[#F8FAFD] py-4 px-3 sm:px-6 rounded-2xl mb-5">
                            <div>
                                <span class="text-xs sm:text-sm text-slate-500 block mb-1 font-medium">Nước ấm (40-50°C)</span>
                                <strong class="text-slate-900 font-dom text-xl sm:text-2xl lg:text-3xl text-[#2563EB] block">150ml</strong>
                            </div>
                            <div class="border-x border-slate-200/80 px-2 sm:px-4">
                                <span class="text-xs sm:text-sm text-slate-500 block mb-1 font-medium">Muỗng gạt (~30g)</span>
                                <strong class="text-slate-900 font-dom text-xl sm:text-2xl lg:text-3xl text-[#2563EB] block">3 muỗng</strong>
                            </div>
                            <div>
                                <span class="text-xs sm:text-sm text-slate-500 block mb-1 font-medium">Khẩu phần</span>
                                <strong class="text-slate-900 font-dom text-xl sm:text-2xl lg:text-3xl text-slate-800 block">1 - 2 lần/ngày</strong>
                            </div>
                        </div>

                        <!-- 3 Step Cards in Row -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-slate-700">
                            <div class="p-4 rounded-2xl bg-[#F8FAFD] flex items-start gap-3">
                                <span class="w-7 h-7 rounded-xl bg-blue-100 text-[#2563EB] font-dom text-sm flex items-center justify-center font-bold shrink-0 mt-0.5">1</span>
                                <p class="m-0 leading-relaxed text-xs sm:text-sm"><strong class="text-slate-900 font-medium">Vệ sinh:</strong> Rửa sạch và lau khô dụng cụ trước khi pha.</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#F8FAFD] flex items-start gap-3">
                                <span class="w-7 h-7 rounded-xl bg-blue-100 text-[#2563EB] font-dom text-sm flex items-center justify-center font-bold shrink-0 mt-0.5">2</span>
                                <p class="m-0 leading-relaxed text-xs sm:text-sm"><strong class="text-slate-900 font-medium">Nước ấm:</strong> Rót 150ml nước 40-50°C vào ly.</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#F8FAFD] flex items-start gap-3">
                                <span class="w-7 h-7 rounded-xl bg-blue-100 text-[#2563EB] font-dom text-sm flex items-center justify-center font-bold shrink-0 mt-0.5">3</span>
                                <p class="m-0 leading-relaxed text-xs sm:text-sm"><strong class="text-slate-900 font-medium">Khuấy tan:</strong> Thêm 3 muỗng gạt, khuấy đều và dùng ngay.</p>
                            </div>
                        </div>
                    </div>

                    <!-- DIVIDER -->
                    <div class="border-t border-slate-100 my-1"></div>

                    <!-- BLOCK 2: HƯỚNG DẪN BẢO QUẢN -->
                    <div>
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                            </div>
                            <h3 class="text-2xl lg:text-3xl font-dom text-slate-900 m-0 uppercase tracking-wide">
                                HƯỚNG DẪN BẢO QUẢN
                            </h3>
                        </div>

                        <!-- 3 Storage Rules in 3 Columns -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-slate-700 mb-5">
                            <div class="p-4 rounded-2xl bg-[#F8FAFD] space-y-1.5">
                                <div class="flex items-center gap-2 text-slate-900 font-dom text-sm sm:text-base uppercase">
                                    <i data-lucide="lock" class="w-4 h-4 text-[#2563EB]"></i>
                                    <span>Đậy kín nắp</span>
                                </div>
                                <p class="m-0 leading-relaxed text-slate-600 text-xs sm:text-sm">Đóng chặt nắp nhựa sau mỗi lần lấy sản phẩm sử dụng.</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#F8FAFD] space-y-1.5">
                                <div class="flex items-center gap-2 text-slate-900 font-dom text-sm sm:text-base uppercase">
                                    <i data-lucide="sun-off" class="w-4 h-4 text-amber-500"></i>
                                    <span>Khô thoáng</span>
                                </div>
                                <p class="m-0 leading-relaxed text-slate-600 text-xs sm:text-sm">Bảo quản nơi khô ráo, tránh ẩm ướt và ánh nắng trực tiếp.</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-[#F8FAFD] space-y-1.5">
                                <div class="flex items-center gap-2 text-slate-900 font-dom text-sm sm:text-base uppercase">
                                    <i data-lucide="clock" class="w-4 h-4 text-emerald-600"></i>
                                    <span>Thời hạn dùng</span>
                                </div>
                                <p class="m-0 leading-relaxed text-slate-600 text-xs sm:text-sm">Nên dùng hết trong vòng 3 - 4 tuần sau khi mở nắp.</p>
                            </div>
                        </div>

                        <!-- Expiry Note -->
                        <div class="py-3.5 px-5 rounded-2xl bg-blue-50/80 flex items-center gap-3 text-xs sm:text-sm text-blue-950 font-medium">
                            <i data-lucide="info" class="w-4 h-4 sm:w-5 sm:h-5 text-[#2563EB] shrink-0"></i>
                            <span class="leading-relaxed">
                                Hạn sử dụng (EXP) và số lô sản xuất (LOT) được in dập rõ ràng dưới đáy lon.
                            </span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- 6. SECTION: KHOẢNH KHẮC CÙNG MIWAKO (GALLERY MARQUEE) -->
    <!-- (Theo yêu cầu: Nằm trên câu hỏi thường gặp và dưới của hướng dẫn sử dụng) -->
    <?php
    if (!function_exists('render_miwako_masonry_strip')) {
        function render_miwako_masonry_strip()
        {
            $base = get_template_directory_uri() . '/images/gallery/miwako/';
            ?>
            <!-- Column 1: Stacked 2 (w-[380px]) -->
            <div class="w-[380px] shrink-0 flex flex-col gap-4">
                <div class="h-[280px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-02.jpg'); ?>', 'Bé gái sử dụng thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-02.jpg'); ?>"
                        alt="Bé gái sử dụng thực phẩm dinh dưỡng Miwako trong bữa ăn phụ" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">BÉ SỬ DỤNG MIWAKO</p>
                    </div>
                </div>
                <div class="h-[224px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-22.jpg'); ?>', 'Bộ nhận diện thương hiệu thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-22.jpg'); ?>"
                        alt="Hình ảnh bộ nhận diện thực phẩm dinh dưỡng Miwako" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">BỘ NHẬN DIỆN MIWAKO</p>
                    </div>
                </div>
            </div>

            <!-- Column 2: Single Tall Hero (w-[340px], h-[520px]) -->
            <div class="w-[340px] shrink-0 h-[520px]">
                <div class="h-full rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-01.jpg'); ?>', 'Thực phẩm dinh dưỡng Miwako lon 700g nhập khẩu chính ngạch Malaysia')">
                    <img src="<?php echo esc_url($base . 'miwako-01.jpg'); ?>"
                        alt="Thực phẩm dinh dưỡng Miwako lon 700g nhập khẩu chính ngạch Malaysia" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">LON THỰC PHẨM DINH DƯỠNG MIWAKO</p>
                    </div>
                </div>
            </div>

            <!-- Column 3: Stacked 2 Asymmetric (w-[300px]) -->
            <div class="w-[300px] shrink-0 flex flex-col gap-4">
                <div class="h-[200px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-05.jpg'); ?>', 'Khoảnh khắc vui vẻ của bé cùng thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-05.jpg'); ?>"
                        alt="Khoảnh khắc vui vẻ của bé cùng thực phẩm dinh dưỡng Miwako" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">KHOẢNH KHẮC VUI TƯƠI CỦA BÉ</p>
                    </div>
                </div>
                <div class="h-[304px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-04.jpg'); ?>', 'Bé sử dụng thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-04.jpg'); ?>"
                        alt="Bé sử dụng thực phẩm dinh dưỡng Miwako trong bữa ăn phụ" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">DINH DƯỠNG TỰ NHIÊN MỖI NGÀY</p>
                    </div>
                </div>
            </div>

            <!-- Column 4: Stacked 2 Wide (w-[420px]) -->
            <div class="w-[420px] shrink-0 flex flex-col gap-4">
                <div class="h-[250px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-03.jpg'); ?>', 'Mẹ chăm sóc bữa ăn phụ cho con cùng thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-03.jpg'); ?>"
                        alt="Mẹ chăm sóc bữa ăn phụ cho con cùng thực phẩm dinh dưỡng Miwako" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">MẸ VÀ BÉ CÙNG MIWAKO</p>
                    </div>
                </div>
                <div class="h-[254px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-14.jpg'); ?>', 'Khoảnh khắc đáng yêu của bé khi dùng thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-14.jpg'); ?>"
                        alt="Khoảnh khắc đáng yêu của bé khi dùng thực phẩm dinh dưỡng Miwako" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">BỮA ĂN PHỤ DINH DƯỠNG CÙNG MIWAKO</p>
                    </div>
                </div>
            </div>

            <!-- Column 5: Single Tall Hero (w-[340px], h-[520px]) -->
            <div class="w-[340px] shrink-0 h-[520px]">
                <div class="h-full rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-08.jpg'); ?>', 'Bé trai dùng thực phẩm dinh dưỡng Miwako nhập khẩu')">
                    <img src="<?php echo esc_url($base . 'miwako-08.jpg'); ?>"
                        alt="Bé trai dùng thực phẩm dinh dưỡng Miwako nhập khẩu" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">ĐỒNG HÀNH TRONG CHẾ ĐỘ ĂN HÀNG NGÀY
                        </p>
                    </div>
                </div>
            </div>

            <!-- Column 6: Stacked 2 Tall Top (w-[320px]) -->
            <div class="w-[320px] shrink-0 flex flex-col gap-4">
                <div class="h-[310px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-07.jpg'); ?>', 'Bé được bổ sung thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-07.jpg'); ?>" alt="Bé được bổ sung thực phẩm dinh dưỡng Miwako"
                        loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">BỔ SUNG DINH DƯỠNG DỄ DÀNG</p>
                    </div>
                </div>
                <div class="h-[194px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-15.jpg'); ?>', 'Thực phẩm dinh dưỡng Miwako thương hiệu Dale & Cecil')">
                    <img src="<?php echo esc_url($base . 'miwako-15.jpg'); ?>"
                        alt="Bao bì lon thực phẩm dinh dưỡng Miwako thân thiện với gia đình" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">THIẾT KẾ LON THÂN THIỆN</p>
                    </div>
                </div>
            </div>

            <!-- Column 7: Single Tall Hero (w-[340px], h-[520px]) -->
            <div class="w-[340px] shrink-0 h-[520px]">
                <div class="h-full rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-19.jpg'); ?>', 'Cận cảnh lon thực phẩm dinh dưỡng Miwako với thiết kế bao bì vàng tươi sáng')">
                    <img src="<?php echo esc_url($base . 'miwako-19.jpg'); ?>"
                        alt="Cận cảnh lon thực phẩm dinh dưỡng Miwako với thiết kế bao bì vàng tươi sáng" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">CẬN CẢNH LON MIWAKO</p>
                    </div>
                </div>
            </div>

            <!-- Column 8: Stacked 2 Asymmetric (w-[380px]) -->
            <div class="w-[380px] shrink-0 flex flex-col gap-4">
                <div class="h-[230px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-10.jpg'); ?>', 'Bé dùng thực phẩm dinh dưỡng Miwako từ hạt kê và diêm mạch')">
                    <img src="<?php echo esc_url($base . 'miwako-10.jpg'); ?>"
                        alt="Bé dùng thực phẩm dinh dưỡng Miwako từ hạt kê và diêm mạch" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">NGUỒN NGŨ CỐC HỮU CƠ</p>
                    </div>
                </div>
                <div class="h-[274px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-13.jpg'); ?>', 'Bé gái bên thực phẩm dinh dưỡng Miwako')">
                    <img src="<?php echo esc_url($base . 'miwako-13.jpg'); ?>" alt="Bé gái bên thực phẩm dinh dưỡng Miwako"
                        loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">BÉ SỬ DỤNG MỖI NGÀY</p>
                    </div>
                </div>
            </div>

            <!-- Column 9: Stacked 2 Balanced (w-[320px]) -->
            <div class="w-[320px] shrink-0 flex flex-col gap-4">
                <div class="h-[252px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-20.jpg'); ?>', 'Thực phẩm dinh dưỡng Miwako thương hiệu Dale & Cecil sản xuất tại Malaysia')">
                    <img src="<?php echo esc_url($base . 'miwako-20.jpg'); ?>"
                        alt="Thực phẩm dinh dưỡng Miwako thương hiệu Dale & Cecil sản xuất tại Malaysia" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">DALE & CECIL MALAYSIA</p>
                    </div>
                </div>
                <div class="h-[252px] rounded-[2rem] overflow-hidden bg-gray-100 relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                    onclick="openGalleryModal('<?php echo esc_url($base . 'miwako-21.jpg'); ?>', 'Lon thực phẩm dinh dưỡng Miwako theo hồ sơ công bố chất lượng')">
                    <img src="<?php echo esc_url($base . 'miwako-21.jpg'); ?>"
                        alt="Lon thực phẩm dinh dưỡng Miwako theo hồ sơ công bố chất lượng" loading="lazy"
                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700 ease-out" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-end p-5 pointer-events-none">
                        <p class="text-white text-sm font-dom m-0 uppercase tracking-wide">TIÊU CHUẨN CHẤT LƯỢNG AN TOÀN</p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

    <!-- 6. SECTION: KHOẢNH KHẮC CÙNG MIWAKO (GALLERY MARQUEE) -->
    <section id="gallery-moments" class="py-20 lg:py-28 bg-white overflow-hidden w-full relative">
        <!-- Section Header (In Container) -->
        <div class="container mx-auto px-4 lg:px-8 mb-12 lg:mb-16 text-center max-w-3xl">
            <h2 class="text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                KHOẢNH KHẮC CÙNG MIWAKO
            </h2>
            <p class="text-base lg:text-lg text-slate-600 mt-3 leading-relaxed m-0">
                Hình ảnh thực tế về sản phẩm và trải nghiệm sử dụng thực phẩm dinh dưỡng trong bữa ăn phụ hàng ngày.
            </p>
        </div>

        <!-- Full-Width Horizontal Masonry Marquee -->
        <div class="gallery-marquee-container relative w-full overflow-hidden select-none">
            <!-- Left & Right Soft Blur Fades -->
            <div
                class="absolute left-0 top-0 bottom-0 w-20 lg:w-40 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-20 lg:w-40 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none">
            </div>

            <!-- Infinite Seamless Track -->
            <div class="gallery-marquee-track flex gap-4">
                <!-- Strip Group 1 -->
                <div class="flex gap-4 shrink-0">
                    <?php render_miwako_masonry_strip(); ?>
                </div>

                <!-- Strip Group 2 -->
                <div class="flex gap-4 shrink-0" aria-hidden="true">
                    <?php render_miwako_masonry_strip(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. SECTION: GIẢI ĐÁP CÁC CÂU HỎI THƯỜNG GẶP (FAQ) -->
    <section id="faq-section" class="py-20 lg:py-28 bg-[#F8FAFD] relative">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl lg:text-5xl font-dom text-slate-900 tracking-wide uppercase m-0">
                    NHỮNG ĐIỀU BA MẸ BĂN KHOĂN
                </h2>
                <p class="text-base lg:text-lg text-slate-600 mt-3 leading-relaxed m-0">
                    Thông tin giải thích khách quan dựa trên hồ sơ tự công bố, tài liệu kỹ thuật và nhãn sản phẩm.
                </p>

                <!-- Mandatory Notice in FAQ -->
                <div
                    class="mt-6 inline-flex items-center gap-2.5 px-5 py-3 rounded-2xl bg-amber-50 border border-amber-200/80 text-amber-900 text-sm sm:text-base font-medium shadow-xs">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-amber-600 shrink-0"></i>
                    <span>Lưu ý: Miwako không thay thế sữa mẹ hoặc bữa ăn chính.</span>
                </div>
            </div>

            <!-- FAQ List (Accordion Style - Borderless Cards) -->
            <div class="max-w-4xl mx-auto space-y-4">

                <!-- FAQ 1: Nguồn gốc -->
                <div
                    class="rounded-[2rem] bg-white shadow-sm hover:shadow-md overflow-hidden transition-all duration-200">
                    <button type="button"
                        class="w-full p-6 sm:p-7 text-left flex items-center justify-between gap-4 cursor-pointer border-none bg-transparent hover:bg-slate-50/60 transition-colors"
                        onclick="toggleFaq(1)" aria-expanded="false" aria-controls="faq-ans-1">
                        <span class="font-dom text-lg sm:text-xl text-slate-900 uppercase">
                            MIWAKO CÓ NGUỒN GỐC TỪ ĐÂU?
                        </span>
                        <div class="w-10 h-10 rounded-full bg-[#F8FAFD] flex items-center justify-center shrink-0 text-[#2563EB] transition-transform duration-200"
                            id="faq-icon-1">
                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                        </div>
                    </button>
                    <div id="faq-ans-1"
                        class="px-7 pb-7 pt-2 text-base lg:text-lg text-slate-700 leading-relaxed border-t border-slate-100 hidden">
                        <p class="m-0">
                            Miwako được sản xuất bởi Dale &amp; Cecil Sdn. Bhd. tại Malaysia. Tại Việt Nam, sản phẩm được Công ty TNHH NP Food Việt Nam nhập khẩu và phân phối chính ngạch.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2: Hồ sơ pháp lý -->
                <div
                    class="rounded-[2rem] bg-white shadow-sm hover:shadow-md overflow-hidden transition-all duration-200">
                    <button type="button"
                        class="w-full p-6 sm:p-7 text-left flex items-center justify-between gap-4 cursor-pointer border-none bg-transparent hover:bg-slate-50/60 transition-colors"
                        onclick="toggleFaq(2)" aria-expanded="false" aria-controls="faq-ans-2">
                        <span class="font-dom text-lg sm:text-xl text-slate-900 uppercase">
                            MIWAKO CÓ ĐẦY ĐỦ HỒ SƠ PHÁP LÝ TẠI VIỆT NAM KHÔNG?
                        </span>
                        <div class="w-10 h-10 rounded-full bg-[#F8FAFD] flex items-center justify-center shrink-0 text-[#2563EB] transition-transform duration-200"
                            id="faq-icon-2">
                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                        </div>
                    </button>
                    <div id="faq-ans-2"
                        class="px-7 pb-7 pt-2 text-base lg:text-lg text-slate-700 leading-relaxed border-t border-slate-100 hidden">
                        <p class="m-0">
                            Sản phẩm được nhập khẩu và phân phối chính ngạch, có nhãn phụ tiếng Việt, thông tin nhà nhập khẩu, hạn sử dụng và các hồ sơ công bố theo quy định hiện hành. Người tiêu dùng có thể tham chiếu các tài liệu được đăng tải trên trang này.
                        </p>
                    </div>
                </div>

                <!-- FAQ 3: Thành phần gây dị ứng -->
                <div
                    class="rounded-[2rem] bg-white shadow-sm hover:shadow-md overflow-hidden transition-all duration-200">
                    <button type="button"
                        class="w-full p-6 sm:p-7 text-left flex items-center justify-between gap-4 cursor-pointer border-none bg-transparent hover:bg-slate-50/60 transition-colors"
                        onclick="toggleFaq(3)" aria-expanded="false" aria-controls="faq-ans-3">
                        <span class="font-dom text-lg sm:text-xl text-slate-900 uppercase">
                            MIWAKO CÓ CHỨA THÀNH PHẦN DỄ GÂY DỊ ỨNG KHÔNG?
                        </span>
                        <div class="w-10 h-10 rounded-full bg-[#F8FAFD] flex items-center justify-center shrink-0 text-[#2563EB] transition-transform duration-200"
                            id="faq-icon-3">
                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                        </div>
                    </button>
                    <div id="faq-ans-3"
                        class="px-7 pb-7 pt-2 text-base lg:text-lg text-slate-700 leading-relaxed border-t border-slate-100 hidden">
                        <p class="m-0">
                            Thông tin về thành phần được trình bày trên nhãn sản phẩm và hồ sơ công bố. Người có tiền sử dị ứng thực phẩm hoặc nhu cầu ăn uống đặc biệt nên kiểm tra kỹ danh mục thành phần và tham khảo ý kiến chuyên gia y tế trước khi sử dụng.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4: Bảo quản -->
                <div
                    class="rounded-[2rem] bg-white shadow-sm hover:shadow-md overflow-hidden transition-all duration-200">
                    <button type="button"
                        class="w-full p-6 sm:p-7 text-left flex items-center justify-between gap-4 cursor-pointer border-none bg-transparent hover:bg-slate-50/60 transition-colors"
                        onclick="toggleFaq(4)" aria-expanded="false" aria-controls="faq-ans-4">
                        <span class="font-dom text-lg sm:text-xl text-slate-900 uppercase">
                            MIWAKO NÊN BẢO QUẢN NHƯ THẾ NÀO?
                        </span>
                        <div class="w-10 h-10 rounded-full bg-[#F8FAFD] flex items-center justify-center shrink-0 text-[#2563EB] transition-transform duration-200"
                            id="faq-icon-4">
                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                        </div>
                    </button>
                    <div id="faq-ans-4"
                        class="px-7 pb-7 pt-2 text-base lg:text-lg text-slate-700 leading-relaxed border-t border-slate-100 hidden">
                        <p class="m-0">
                            Sản phẩm nên được bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Sau khi mở bao bì, cần đóng kín lại và sử dụng trước hạn sử dụng ghi trên bao bì.
                        </p>
                    </div>
                </div>

                <!-- FAQ 5: Sử dụng hằng ngày -->
                <div
                    class="rounded-[2rem] bg-white shadow-sm hover:shadow-md overflow-hidden transition-all duration-200">
                    <button type="button"
                        class="w-full p-6 sm:p-7 text-left flex items-center justify-between gap-4 cursor-pointer border-none bg-transparent hover:bg-slate-50/60 transition-colors"
                        onclick="toggleFaq(5)" aria-expanded="false" aria-controls="faq-ans-5">
                        <span class="font-dom text-lg sm:text-xl text-slate-900 uppercase">
                            MIWAKO CÓ THỂ SỬ DỤNG HẰNG NGÀY KHÔNG?
                        </span>
                        <div class="w-10 h-10 rounded-full bg-[#F8FAFD] flex items-center justify-center shrink-0 text-[#2563EB] transition-transform duration-200"
                            id="faq-icon-5">
                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                        </div>
                    </button>
                    <div id="faq-ans-5"
                        class="px-7 pb-7 pt-2 text-base lg:text-lg text-slate-700 leading-relaxed border-t border-slate-100 hidden">
                        <p class="m-0">
                            Miwako có thể được sử dụng theo hướng dẫn ghi trên bao bì. Tùy nhu cầu và tình trạng sức khỏe của từng người, nên điều chỉnh lượng sử dụng phù hợp; trường hợp đặc biệt nên tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Legal Disclaimer Bar -->
    <div id="legal-disclaimer-bar" class="w-full bg-[#F4F6F9] border-t border-slate-200/80 py-5 sm:py-6 text-xs text-slate-500 leading-relaxed">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-start md:items-center gap-3 md:gap-6">
                <div class="inline-flex items-center gap-2 text-slate-700 font-dom uppercase tracking-wider shrink-0 text-xs">
                    <i data-lucide="shield-alert" class="w-4 h-4 text-amber-600"></i>
                    <span>LƯU Ý PHÁP LÝ &amp; Y TẾ</span>
                </div>
                <div class="space-y-1 text-slate-500 text-xs sm:text-[13px] leading-relaxed md:border-l md:border-slate-300/70 md:pl-6">
                    <p class="m-0">
                        • <strong>Khuyến nghị y tế:</strong> Miwako không thay thế sữa mẹ hoặc bữa ăn chính. Sữa mẹ là nguồn dinh dưỡng tốt nhất cho trẻ sơ sinh và trẻ nhỏ.
                    </p>
                    <p class="m-0">
                        • <strong>Bản chất sản phẩm:</strong> Sản phẩm này là thực phẩm dinh dưỡng bổ sung nguồn gốc thực vật, không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.
                    </p>
                    <p class="m-0">
                        • <strong>Lưu ý sử dụng &amp; thông tin:</strong> Không dùng khi quá hạn in dưới đáy lon hoặc bao bì bị hở, hỏng. Toàn bộ thông tin được cung cấp theo hồ sơ tự công bố và tài liệu của nhà sản xuất, không mang tính chất chỉ định y khoa.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- LIGHTBOX MODAL FOR GALLERY -->
<div id="gallery-lightbox"
    class="fixed inset-0 z-[999] bg-black/90 backdrop-blur-md hidden items-center justify-center p-4 lg:p-8"
    onclick="closeGalleryModal()">
    <button type="button"
        class="absolute top-5 right-5 text-white/80 hover:text-white bg-white/10 hover:bg-white/20 p-2.5 rounded-full transition-colors cursor-pointer border-none z-10"
        onclick="closeGalleryModal()" aria-label="Đóng">
        <i data-lucide="x" class="w-6 h-6"></i>
    </button>
    <div class="max-w-4xl max-h-[92vh] flex flex-col items-center relative my-auto" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[82vh] object-contain rounded-2xl shadow-2xl" />
        <p id="lightbox-caption"
            class="text-white/90 text-xs sm:text-sm text-center mt-3 font-dom uppercase px-4 max-w-xl"></p>
    </div>
</div>

<script>
    function openGalleryModal(src, alt) {
        const modal = document.getElementById('gallery-lightbox');
        const modalImg = document.getElementById('lightbox-img');
        const modalCaption = document.getElementById('lightbox-caption');
        if (modal && modalImg) {
            modalImg.src = src;
            modalImg.alt = alt;
            if (modalCaption) modalCaption.textContent = alt;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
    }
    function closeGalleryModal() {
        const modal = document.getElementById('gallery-lightbox');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeGalleryModal();
    });

    // Auto-fit Hero Section to fill the exact first screen viewport
    function fitHeroToFirstScreen() {
        const hero = document.getElementById('miwako-hero');
        if (!hero) return;
        const heroTop = hero.getBoundingClientRect().top + window.scrollY;
        const targetHeight = window.innerHeight - heroTop;
        if (targetHeight > 450) {
            hero.style.minHeight = targetHeight + 'px';
        }
    }
    window.addEventListener('DOMContentLoaded', fitHeroToFirstScreen);
    window.addEventListener('resize', fitHeroToFirstScreen);
    window.addEventListener('load', fitHeroToFirstScreen);

    // Toggle FAQ Accordion
    function toggleFaq(id) {
        const ans = document.getElementById('faq-ans-' + id);
        const icon = document.getElementById('faq-icon-' + id);
        const button = ans ? ans.previousElementSibling : null;
        if (!ans) return;
        const isHidden = ans.classList.contains('hidden');
        if (isHidden) {
            ans.classList.remove('hidden');
            if (icon) icon.classList.add('rotate-180');
            if (button) button.setAttribute('aria-expanded', 'true');
        } else {
            ans.classList.add('hidden');
            if (icon) icon.classList.remove('rotate-180');
            if (button) button.setAttribute('aria-expanded', 'false');
        }
    }
</script>

<?php get_footer(); ?>