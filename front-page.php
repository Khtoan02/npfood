<?php
/*
 * Template Name: Homepage
 */
get_header(); 

// --- HELPER: Render Quote Section ---
function np_render_quote_section($quote, $author, $role, $bgColor = "bg-[#14532d]", $patternOpacity = 0.1) {
    ?>
    <section class="relative py-20 <?php echo $bgColor; ?> text-white overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
        <!-- Decorative Elements -->
        <div class="absolute top-10 left-10 text-[#f8c03f] opacity-20">
            <i data-lucide="quote" class="w-20 h-20 transform rotate-180"></i>
        </div>
        <div class="absolute bottom-10 right-10 text-[#f8c03f] opacity-20">
            <i data-lucide="quote" class="w-20 h-20"></i>
        </div>
        
        <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
            <div class="w-16 h-1 bg-[#f8c03f] mx-auto mb-8"></div>
            <h3 class="text-2xl md:text-4xl font-serif leading-relaxed italic mb-6 text-gray-100">
                "<?php echo $quote; ?>"
            </h3>
            <div class="flex flex-col items-center">
                <span class="text-[#f8c03f] font-bold uppercase tracking-widest text-sm"><?php echo $author; ?></span>
                <?php if ($role): ?>
                    <span class="text-gray-400 text-xs mt-1 font-light tracking-wide"><?php echo $role; ?></span>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}
?>

<main id="primary" class="site-main font-sans text-gray-800 bg-white">

    <!-- 1. HERO SECTION -->
    <section class="relative h-[85vh] w-full overflow-hidden">
        <div class="absolute inset-0">
            <img 
                src="https://npfood.vn/wp-content/uploads/2022/12/CanhDong_25-scaled.jpg" 
                alt="NP Food Hero - Cánh Đồng" 
                class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-[#052e16]/90 via-[#052e16]/40 to-transparent"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 h-full flex flex-col justify-center text-white">
            <div class="max-w-3xl animate-fadeInUp">
                <div class="inline-flex items-center gap-3 px-4 py-2 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-sm font-bold uppercase tracking-widest mb-6">
                    <span class="w-2 h-2 rounded-full bg-[#f8c03f]"></span>
                    Nhà Phân Phối Thực Phẩm Hàng Đầu
                </div>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                    Trân Quý Thiên Nhiên <br/>
                    <span class="text-[#f8c03f]">Thấu Hiểu Khách Hàng</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl leading-relaxed font-light">
                    NP Food khởi nguồn với hai chữ “tình yêu”. Chúng tôi tin điều gì xuất phát từ trái tim sẽ chạm được đến trái tim, mang đến những giá trị tốt đẹp nhất cho cộng đồng.
                </p>
                <button 
                    class="px-8 py-4 bg-[#f8c03f] text-[#052e16] font-bold rounded hover:bg-white hover:text-[#54b259] transition-all uppercase text-sm tracking-widest shadow-lg flex items-center gap-2 group border-none cursor-pointer"
                >
                    Tìm Hiểu Thêm <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- 2. TỔNG QUAN DOANH NGHIỆP -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2 relative">
                    <div class="absolute top-[-20px] left-[-20px] w-24 h-24 border-t-4 border-l-4 border-[#54b259]"></div>
                    <img 
                        src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1000" 
                        alt="NP Food Office" 
                        class="rounded shadow-2xl relative z-10 w-full object-cover h-[500px]"
                    />
                    <div class="absolute bottom-[-20px] right-[-20px] w-24 h-24 border-b-4 border-r-4 border-[#f8c03f]"></div>
                    
                    <div class="absolute bottom-10 -left-10 bg-white p-8 rounded shadow-xl max-w-xs z-20 hidden md:block border-l-4 border-[#54b259]">
                        <p class="text-4xl font-bold text-[#54b259] mb-2 m-0">10+</p>
                        <p class="text-sm font-bold uppercase tracking-wider text-gray-500 m-0">Năm Kinh Nghiệm</p>
                        <p class="text-xs text-gray-400 mt-2 m-0">Trong lĩnh vực nhập khẩu & phân phối</p>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <h4 class="text-[#54b259] font-bold uppercase tracking-widest text-sm mb-4">Tổng Quan Doanh Nghiệp</h4>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6 leading-snug">
                        Vị Thế Tiên Phong <br/> Kiến Tạo Giá Trị Bền Vững
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed text-justify">
                        Công ty TNHH NP FOOD được thành lập với định hướng trở thành cầu nối uy tín giữa các nhà sản xuất thực phẩm hàng đầu thế giới và người tiêu dùng Việt Nam. Chúng tôi chuyên sâu trong lĩnh vực nhập khẩu và phân phối các dòng sản phẩm: Thực phẩm hữu cơ (Organic), Thực phẩm tự nhiên (Natural) và Thực phẩm chức năng cao cấp.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed text-justify">
                        Với hệ thống kho bãi đạt chuẩn GSP, mạng lưới logistics hiện đại và đội ngũ nhân sự chuyên môn cao, NP FOOD cam kết đảm bảo chất lượng sản phẩm nguyên bản từ nhà máy đến tay khách hàng.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="border border-gray-200 p-4 rounded hover:border-[#54b259] transition-colors group cursor-pointer">
                            <i data-lucide="globe" class="w-8 h-8 text-[#f8c03f] mb-3 group-hover:scale-110 transition-transform block"></i>
                            <h5 class="font-bold text-[#54b259] m-0">Mạng Lưới Quốc Tế</h5>
                            <p class="text-xs text-gray-500 mt-1 m-0">Đối tác của 25+ thương hiệu toàn cầu</p>
                        </div>
                        <div class="border border-gray-200 p-4 rounded hover:border-[#54b259] transition-colors group cursor-pointer">
                            <i data-lucide="trending-up" class="w-8 h-8 text-[#f8c03f] mb-3 group-hover:scale-110 transition-transform block"></i>
                            <h5 class="font-bold text-[#54b259] m-0">Tăng Trưởng Bền Vững</h5>
                            <p class="text-xs text-gray-500 mt-1 m-0">Mở rộng thị phần liên tục qua các năm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- --- QUOTE 1: HIPPOCRATES --- -->
    <?php np_render_quote_section(
        "Hãy để thức ăn là thuốc và thuốc là thức ăn.",
        "Hippocrates",
        "Ông tổ ngành Y học phương Tây",
        "bg-[#14532d]"
    ); ?>

    <!-- 3. SỨ MỆNH & TẦM NHÌN -->
    <section class="relative py-20 lg:py-32 bg-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 shadow-2xl rounded-[3rem] overflow-hidden min-h-[600px]">
            
                <!-- LEFT: VISION (TẦM NHÌN) -->
                <div class="relative bg-[#54b259] p-12 lg:p-20 text-white flex flex-col justify-center group overflow-hidden">
                    <div class="absolute top-0 right-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                    <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full border border-[#f8c03f]/20"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="p-3 bg-[#f8c03f]/20 rounded-full text-[#f8c03f]">
                                <i data-lucide="star" class="w-6 h-6 fill-current"></i>
                            </span>
                            <h3 class="text-[#f8c03f] uppercase tracking-[0.3em] font-bold text-sm m-0">Định Hướng</h3>
                        </div>
                        
                        <h2 class="text-3xl lg:text-5xl font-serif font-bold mb-8 leading-tight">
                            Khát Vọng <br/> Kiến Tạo
                        </h2>
                        
                        <p class="text-gray-100 text-lg font-light leading-relaxed mb-8 border-l-2 border-[#f8c03f] pl-6 text-justify">
                            NP FOOD cung cấp các sản phẩm là Thực phẩm hữu cơ (Organic Food) và Thực phẩm tự nhiên (Natural Food) vì chúng tôi muốn mang đến những giá trị tốt đẹp cộng đồng.
                        </p>
                    </div>
                </div>

                <!-- RIGHT: MISSION (SỨ MỆNH) -->
                <div class="relative bg-[#f0fdf4] p-12 lg:p-20 text-[#14532d] flex flex-col justify-center">
                    <div class="absolute -bottom-20 -right-20 w-96 h-96 rounded-full bg-[#54b259]/10"></div>

                    <div class="relative z-10 lg:pl-10">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="p-3 bg-[#54b259]/10 rounded-full text-[#54b259]">
                                <i data-lucide="sun" class="w-6 h-6"></i>
                            </span>
                            <h3 class="text-[#54b259] uppercase tracking-[0.3em] font-bold text-sm m-0">Cam Kết</h3>
                        </div>

                        <h2 class="text-3xl lg:text-4xl font-serif font-bold mb-8 leading-tight">
                            Sứ Mệnh <br/> Phụng Sự
                        </h2>
                        
                        <p class="text-gray-600 text-lg font-light leading-relaxed mb-8 text-justify">
                            Giúp khách hàng tiếp cận và sử dụng hiệu quả thực phẩm hữu cơ, nguồn gốc thiên nhiên, phục vụ cho cuộc sống khỏe mạnh và cân bằng. Chúng tôi không chỉ bán sản phẩm, chúng tôi trao giải pháp sức khỏe toàn diện.
                        </p>

                        <div class="flex items-center gap-2 text-[#f8c03f] font-bold uppercase tracking-widest text-xs cursor-pointer hover:gap-4 transition-all">
                            Tìm Hiểu Thêm <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>

                <!-- CENTRAL ARTISTIC ELEMENT -->
                <div class="hidden lg:block absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
                    <div class="w-48 h-48 rounded-full border-[8px] border-white shadow-2xl overflow-hidden relative group">
                        <img 
                            src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=400" 
                            alt="Nature Soul" 
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                        />
                        <div class="absolute inset-0 flex items-center justify-center bg-[#54b259]/30">
                            <i data-lucide="leaf" class="w-10 h-10 text-white drop-shadow-md"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- --- QUOTE 2: THOMAS EDISON --- -->
    <?php np_render_quote_section(
        "Bác sĩ của tương lai sẽ không còn trị bệnh bằng thuốc, mà thay vào đó là phòng và chữa bệnh bằng dinh dưỡng.",
        "Thomas Edison",
        "Nhà phát minh vĩ đại",
        "bg-[#166534]"
    ); ?>

    <!-- 4. GIÁ TRỊ CỐT LÕI -->
    <section class="py-24 bg-[#54b259] text-white bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div class="md:w-1/2">
                    <h4 class="text-[#f8c03f] font-bold uppercase tracking-widest text-sm mb-2">Văn Hóa Doanh Nghiệp</h4>
                    <h2 class="text-4xl font-bold m-0">Giá Trị Cốt Lõi</h2>
                </div>
                <div class="md:w-1/2 text-right md:text-right mt-4 md:mt-0">
                    <p class="text-gray-100 max-w-md ml-auto m-0">
                        Bốn trụ cột vững chắc định hình mọi hành động và quyết định của NP FOOD trong hành trình phụng sự khách hàng.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $values = [
                    ['icon' => 'heart', 'title' => 'Đạo Đức', 'desc' => 'Kinh doanh dựa trên sự tử tế, đặt lợi ích sức khỏe cộng đồng lên trên lợi nhuận.'],
                    ['icon' => 'users', 'title' => 'Trách Nhiệm', 'desc' => 'Cam kết trách nhiệm trọn đời với sản phẩm phân phối và đối tác đồng hành.'],
                    ['icon' => 'shield-check', 'title' => 'Sự Tuân Thủ', 'desc' => 'Tuân thủ nghiêm ngặt pháp luật và các chuẩn mực đạo đức kinh doanh quốc tế.'],
                    ['icon' => 'book-open', 'title' => 'Chuyên Môn', 'desc' => 'Không ngừng học hỏi, nâng cao kiến thức y khoa và dinh dưỡng để tư vấn đúng.']
                ];
                foreach ($values as $val): ?>
                    <div class="bg-white/10 backdrop-blur-sm p-8 rounded-lg hover:bg-white/20 transition-colors border border-white/10 group">
                        <div class="text-[#f8c03f] mb-6 transform group-hover:scale-110 transition-transform duration-300">
                             <i data-lucide="<?php echo $val['icon']; ?>" class="w-10 h-10"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3"><?php echo $val['title']; ?></h3>
                        <p class="text-gray-100 text-sm leading-relaxed opacity-90 m-0"><?php echo $val['desc']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. NGUYÊN TẮC KINH DOANH & TRIẾT LÝ -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <!-- Nguyên Tắc Kinh Doanh -->
                <div>
                    <h2 class="text-3xl font-bold text-[#54b259] mb-8 border-l-4 border-[#f8c03f] pl-4">Nguyên Tắc Kinh Doanh</h2>
                    <div class="space-y-6">
                        <?php
                        $principles = [
                            "Chất lượng là danh dự: Chỉ phân phối sản phẩm chính hãng, rõ nguồn gốc.",
                            "Khách hàng là trọng tâm: Lắng nghe và thấu hiểu để phục vụ tốt nhất.",
                            "Hợp tác cùng phát triển: Win-Win với mọi đối tác đại lý và nhà cung cấp.",
                            "Minh bạch & Liêm chính: Trong mọi giao dịch tài chính và thông tin."
                        ];
                        foreach ($principles as $idx => $item): ?>
                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded hover:bg-[#54b259]/5 transition-colors">
                                <div class="w-8 h-8 bg-[#54b259] text-white rounded-full flex items-center justify-center shrink-0 font-bold text-sm">
                                    <?php echo $idx + 1; ?>
                                </div>
                                <p class="text-gray-700 font-medium pt-1 m-0"><?php echo $item; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Triết Lý Doanh Nghiệp -->
                <div class="bg-[#f8c03f]/10 p-10 rounded-2xl relative">
                    <h2 class="text-3xl font-bold text-[#54b259] mb-8 border-l-4 border-[#54b259] pl-4">Triết Lý Doanh Nghiệp</h2>
                    <div class="text-center pt-8">
                        <i data-lucide="leaf" class="block w-16 h-16 text-[#54b259] mx-auto mb-6 opacity-80"></i>
                        <blockquote class="text-xl md:text-2xl font-serif text-[#54b259] leading-relaxed italic mb-6">
                            "Dinh dưỡng thực vật là kết tinh tình yêu của đất mẹ thiên nhiên, là món quà mà tự nhiên ban tặng cho con người để tạo nên cuộc sống cân bằng."
                        </blockquote>
                        <div class="w-16 h-1 bg-[#54b259] mx-auto opacity-50"></div>
                        <p class="mt-6 text-gray-600 font-medium">
                            Chúng tôi tin chăm sóc những người thân yêu chính là dành cho họ những điều tốt đẹp nhất.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- --- QUOTE 3: ANN WIGMORE --- -->
    <?php np_render_quote_section(
        "Thực phẩm bạn ăn có thể là dạng thuốc an toàn và mạnh mẽ nhất hoặc là dạng độc dược chậm nhất.",
        "Ann Wigmore",
        "Nhà tiên phong về Dinh dưỡng tự nhiên",
        "bg-[#14532d]"
    ); ?>

    <!-- 6. TRÁCH NHIỆM XÃ HỘI (CSR) -->
    <section class="relative py-32 overflow-hidden bg-[#052e16]">
        <div class="absolute inset-0 z-0">
            <img 
                src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?q=80&w=2000&auto=format&fit=crop" 
                alt="Community Soul" 
                class="w-full h-full object-cover opacity-60 grayscale hover:grayscale-0 transition-all duration-[2000ms]"
            />
            <div class="absolute inset-0 bg-[#052e16]/90 mix-blend-multiply"></div>
            <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 text-white">
            <div class="flex flex-col lg:flex-row items-end justify-between mb-24 border-b border-[#f8c03f]/30 pb-10">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-12 h-px bg-[#f8c03f]"></span>
                        <h4 class="text-[#f8c03f] uppercase tracking-[0.3em] text-xs font-bold m-0">Trách Nhiệm Xã Hội</h4>
                    </div>
                    <h2 class="text-5xl md:text-6xl font-serif leading-tight m-0">
                        Kinh Doanh Bằng <br/> 
                        <span class="italic text-[#f8c03f] relative inline-block">
                            Sự Tử Tế
                            <span class="absolute -bottom-2 left-0 w-full h-1 bg-[#f8c03f]/50 skew-x-12"></span>
                        </span>
                    </h2>
                </div>
                <p class="lg:w-1/3 text-gray-300 font-light text-base leading-relaxed mt-8 lg:mt-0 text-justify italic border-l-2 border-[#f8c03f]/50 pl-6 m-0">
                    "Chúng tôi không chỉ là những thương nhân. Chúng tôi là những người gieo hạt, mong muốn ươm mầm một cộng đồng khỏe mạnh và một hành tinh xanh hơn cho thế hệ mai sau."
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-[#f8c03f]/20 border border-[#f8c03f]/20 shadow-2xl">
                
                <!-- Column 1: Môi Trường -->
                <div class="group relative bg-[#14532d] p-12 hover:bg-[#166534] transition-all duration-700 overflow-hidden cursor-pointer">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:rotate-12 duration-700">
                        <i data-lucide="leaf" class="w-[120px] h-[120px]" stroke-width="0.5"></i>
                    </div>
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <div class="text-[#f8c03f] mb-6 opacity-80 group-hover:opacity-100 transition-opacity">
                                <i data-lucide="sprout" class="w-10 h-10"></i>
                            </div>
                            <h3 class="text-3xl font-serif mb-4 group-hover:text-[#f8c03f] transition-colors">Xanh Hóa <br/> Tương Lai</h3>
                            <p class="text-gray-400 text-sm font-light leading-relaxed m-0">
                                Tôn trọng đất mẹ bằng việc ưu tiên các nhà sản xuất có chứng nhận Organic và quy trình canh tác bền vững, giảm thiểu tác động carbon.
                            </p>
                        </div>
                        <div class="mt-12 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#f8c03f] opacity-0 group-hover:opacity-100 transition-all transform translate-y-4 group-hover:translate-y-0 duration-500">
                            Xem Hành Trình <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#f8c03f] group-hover:w-full transition-all duration-1000 ease-in-out"></div>
                </div>

                <!-- Column 2: Cộng Đồng -->
                <div class="group relative bg-[#14532d] p-12 hover:bg-[#166534] transition-all duration-700 overflow-hidden cursor-pointer border-x border-[#f8c03f]/10">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:rotate-12 duration-700">
                        <i data-lucide="heart" class="w-[120px] h-[120px]" stroke-width="0.5"></i>
                    </div>
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <div class="text-[#f8c03f] mb-6 opacity-80 group-hover:opacity-100 transition-opacity">
                                <i data-lucide="hand-heart" class="w-10 h-10"></i>
                            </div>
                            <h3 class="text-3xl font-serif mb-4 group-hover:text-[#f8c03f] transition-colors">Sẻ Chia <br/> Hạnh Phúc</h3>
                            <p class="text-gray-400 text-sm font-light leading-relaxed m-0">
                                Tài trợ dinh dưỡng định kỳ cho trẻ em vùng cao và người già neo đơn. Chúng tôi tin rằng, một xã hội khỏe mạnh bắt đầu từ sự sẻ chia.
                            </p>
                        </div>
                        <div class="mt-12 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#f8c03f] opacity-0 group-hover:opacity-100 transition-all transform translate-y-4 group-hover:translate-y-0 duration-500">
                            Xem Hoạt Động <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#f8c03f] group-hover:w-full transition-all duration-1000 ease-in-out delay-100"></div>
                </div>

                <!-- Column 3: Nhận Thức -->
                <div class="group relative bg-[#14532d] p-12 hover:bg-[#166534] transition-all duration-700 overflow-hidden cursor-pointer">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:rotate-12 duration-700">
                        <i data-lucide="book-open" class="w-[120px] h-[120px]" stroke-width="0.5"></i>
                    </div>
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <div class="text-[#f8c03f] mb-6 opacity-80 group-hover:opacity-100 transition-opacity">
                                <i data-lucide="sun" class="w-10 h-10"></i>
                            </div>
                            <h3 class="text-3xl font-serif mb-4 group-hover:text-[#f8c03f] transition-colors">Lan Tỏa <br/> Tri Thức</h3>
                            <p class="text-gray-400 text-sm font-light leading-relaxed m-0">
                                Tổ chức các chuỗi hội thảo miễn phí về dinh dưỡng chuẩn y khoa, giúp nâng cao nhận thức về chăm sóc sức khỏe chủ động cho người Việt.
                            </p>
                        </div>
                        <div class="mt-12 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#f8c03f] opacity-0 group-hover:opacity-100 transition-all transform translate-y-4 group-hover:translate-y-0 duration-500">
                            Xem Sự Kiện <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#f8c03f] group-hover:w-full transition-all duration-1000 ease-in-out delay-200"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- 7. CÔNG BỐ THÔNG TIN (Static as requested) -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="flex items-center gap-3 mb-8">
                <i data-lucide="scale" class="w-8 h-8 text-[#f8c03f]"></i>
                <h2 class="text-3xl font-bold text-[#54b259] m-0">Công Bố & Thông Báo</h2>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-[#54b259] text-white">
                            <tr>
                                <th class="px-6 py-4 font-bold text-sm uppercase tracking-wider w-32">Ngày</th>
                                <th class="px-6 py-4 font-bold text-sm uppercase tracking-wider">Tiêu Đề</th>
                                <th class="px-6 py-4 font-bold text-sm uppercase tracking-wider w-32 text-center">Loại</th>
                                <th class="px-6 py-4 font-bold text-sm uppercase tracking-wider w-32 text-center">Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php
                            $announcements = [
                                [ 
                                    'date' => "19/01/2026", 
                                    'title' => "THÔNG BÁO KẾT QUẢ KIỂM NGHIỆM SẢN PHẨM MIWAKO A+", 
                                    'type' => "Kiểm Nghiệm", 
                                    'link' => "https://npfood.vn/thong-bao-ket-qua-kiem-nghiem-san-pham-miwako-a/" 
                                ],
                                [ 
                                    'date' => "15/01/2026", 
                                    'title' => "NP FOOD RA MẮT KÊNH THÔNG TIN ZALO OFFICIAL ACCOUNT", 
                                    'type' => "Tin Tức", 
                                    'link' => "https://npfood.vn/zalo-official-account/" 
                                ],
                                [ 
                                    'date' => "10/01/2026", 
                                    'title' => "THÔNG BÁO VỀ MÀU SẮC VÀ MÙI VỊ SẢN PHẨM MIWAKO", 
                                    'type' => "Thông Báo", 
                                    'link' => "https://npfood.vn/thong-bao-miwako/" 
                                ],
                                [ 
                                    'date' => "05/01/2026", 
                                    'title' => "Dự án “DINH DƯỠNG XANH – AN LÀNH CHO CON – AN TÂM CHO MẸ”", 
                                    'type' => "Dự Án", 
                                    'link' => "https://npfood.vn/du-an-dinh-duong-xanh/" 
                                ]
                            ];
                            foreach ($announcements as $idx => $row): ?>
                                <tr class="hover:bg-gray-50 transition-colors group">
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo $row['date']; ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-[#54b259]">
                                        <a href="<?php echo $row['link']; ?>" target="_blank" rel="noopener noreferrer" class="hover:text-[#f8c03f] transition-colors flex items-center gap-2 no-underline">
                                           <?php echo $row['title']; ?>
                                           <i data-lucide="external-link" class="w-3.5 h-3.5 opacity-0 group-hover:opacity-100 transition-opacity text-[#f8c03f]"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-block px-2 py-1 text-xs font-bold rounded <?php echo $idx === 0 ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-600'; ?>">
                                            <?php echo $row['type']; ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="<?php echo $row['link']; ?>" target="_blank" rel="noopener noreferrer" class="text-[#54b259] hover:text-[#f8c03f] inline-block">
                                            <i data-lucide="file-text" class="w-4.5 h-4.5"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-50 px-6 py-4 text-center border-t border-gray-200">
                    <a href="#" class="text-sm font-bold text-[#54b259] hover:text-[#f8c03f] transition-colors inline-flex items-center gap-1 no-underline">
                        Xem toàn bộ thông báo <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. TIN TỨC & SỰ KIỆN (Dynamic) -->
    <section class="py-24 bg-[#F9FAFB]">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h4 class="text-[#f8c03f] font-bold uppercase tracking-widest text-sm mb-2">Truyền Thông</h4>
                    <h2 class="text-3xl font-bold text-[#54b259] m-0">Tin Tức & Sự Kiện</h2>
                </div>
                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="hidden md:flex items-center gap-2 text-[#54b259] font-bold hover:text-[#f8c03f] transition-colors no-underline">
                    Xem tất cả tin tức <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                // Fetch latest 3 posts
                $news_query = new WP_Query( array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'ignore_sticky_posts' => 1
                ));

                if ( $news_query->have_posts() ) {
                    $posts = $news_query->get_posts();
                    $featured_post = $posts[0]; // First post (Large)
                    $side_posts = array_slice($posts, 1); // Next 2 posts (Side)
                    
                    // --- 1. FEATURED POST ---
                    $feat_img = get_the_post_thumbnail_url($featured_post->ID, 'large');
                    $feat_date = get_the_date('d/m/Y', $featured_post->ID);
                    $feat_title = get_the_title($featured_post->ID);
                    $feat_excerpt = get_the_excerpt($featured_post->ID);
                    $feat_link = get_permalink($featured_post->ID);
                    ?>
                    <div class="md:col-span-2 group cursor-pointer relative rounded-xl overflow-hidden shadow-md h-[400px]">
                        <a href="<?php echo $feat_link; ?>" class="block w-full h-full">
                            <?php if($feat_img): ?>
                                <img src="<?php echo $feat_img; ?>" alt="<?php echo $feat_title; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"/>
                            <?php else: ?>
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center"><i data-lucide="image" class="w-12 h-12 text-gray-400"></i></div>
                            <?php endif; ?>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <div class="absolute bottom-0 left-0 p-8 text-white">
                                <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider mb-3 text-[#f8c03f]">
                                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i> <?php echo $feat_date; ?>
                                </div>
                                <h3 class="text-2xl font-bold mb-3 group-hover:text-[#f8c03f] transition-colors leading-tight">
                                    <?php echo $feat_title; ?>
                                </h3>
                                <p class="text-gray-300 line-clamp-2 text-sm m-0">
                                    <?php echo wp_trim_words($feat_excerpt, 25); ?>
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- --- 2. SIDE POSTS LIST --- -->
                    <div class="flex flex-col gap-8">
                        <?php foreach($side_posts as $post): 
                            $s_img = get_the_post_thumbnail_url($post->ID, 'medium');
                            $s_date = get_the_date('d/m/Y', $post->ID);
                            $s_title = get_the_title($post->ID);
                            $s_link = get_permalink($post->ID);
                        ?>
                        <div class="flex gap-4 group cursor-pointer bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all h-full">
                            <a href="<?php echo $s_link; ?>" class="block w-24 h-24 rounded-lg overflow-hidden shrink-0 bg-gray-100">
                                <?php if($s_img): ?>
                                    <img src="<?php echo $s_img; ?>" alt="<?php echo $s_title; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center"><i data-lucide="image" class="w-6 h-6 text-gray-400"></i></div>
                                <?php endif; ?>
                            </a>
                            <div class="flex flex-col justify-center flex-1">
                                <div class="text-xs text-gray-400 mb-1 flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i> <?php echo $s_date; ?>
                                </div>
                                <h4 class="font-bold text-gray-800 text-sm line-clamp-3 group-hover:text-[#54b259] transition-colors m-0">
                                    <a href="<?php echo $s_link; ?>" class="no-underline text-inherit"><?php echo $s_title; ?></a>
                                </h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php 
                } else {
                    echo '<div class="col-span-3 text-center py-10 text-gray-500">Chưa có tin tức nào.</div>';
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
