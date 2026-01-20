<?php
/**
 * Template Name: Design Intern Page
 */
 $ref_job_id = isset($_GET['ref_job_id']) ? intval($_GET['ref_job_id']) : (isset($_GET['job_id']) ? intval($_GET['job_id']) : 0);
 $job_title = "Design Intern"; // Default
 if ($ref_job_id > 0) {
     $job_title = get_the_title($ref_job_id);
 }
get_header(); ?>

<div class="font-sans text-gray-800 bg-white selection:bg-[#54b259] selection:text-white">

    <!-- CSS Styles -->
    <style>
        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        .animate-slow-zoom { animation: slowZoom 20s infinite alternate linear; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #052e16; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #54b259; border-radius: 2px; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Combobox Styles - Styled for Dark Green Theme */
        .combobox-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 240px;
            overflow-y: auto;
            background-color: #064e3b; /* Dark Green bg */
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            z-index: 50;
            margin-top: 0.25rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
        }
        .combobox-dropdown.active {
            display: block;
        }
        .combobox-item {
            padding: 0.75rem 1rem;
            color: #d1d5db; /* Gray-300 */
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.875rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .combobox-item:last-child {
            border-bottom: none;
        }
        .combobox-item:hover {
            background-color: #54b259; /* Brand Green */
            color: white;
        }
    </style>

    <!-- 1. HERO SECTION: CINEMATIC & PREMIUM -->
    <section class="relative h-[85vh] min-h-[600px] flex items-center justify-center overflow-hidden bg-[#052e16] text-white">
        <div class="absolute inset-0 overflow-hidden">
            <img 
                src="https://npfood.vn/wp-content/uploads/2022/12/CanhDong_25-scaled.jpg" 
                alt="Background" 
                class="w-full h-full object-cover animate-slow-zoom origin-center opacity-60"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-[#052e16] via-[#052e16]/50 to-transparent"></div>
            <!-- Grain Texture Overlay -->
            <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-4 flex flex-col items-center">
            <div class="flex items-center gap-3 mb-6">
                 <div class="h-px w-12 bg-[#f8c03f]"></div>
                 <span class="text-[#f8c03f] font-bold uppercase tracking-[0.3em] text-xs">Tuyển Dụng Nhân Sự Nguồn</span>
                 <div class="h-px w-12 bg-[#f8c03f]"></div>
            </div>
            
            <h1 class="text-6xl md:text-8xl font-serif font-bold mb-6 text-center leading-none">
                <?php if($ref_job_id > 0): ?>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f8c03f] to-[#eab308] block text-4xl md:text-6xl mb-2">Ứng Tuyển</span>
                    <span class="text-white block text-5xl md:text-7xl"><?php echo esc_html($job_title); ?></span>
                <?php else: ?>
                    Design <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f8c03f] to-[#eab308]">Intern</span>
                <?php endif; ?>
            </h1>
            
            <p className="text-xl md:text-2xl font-light text-gray-200 max-w-3xl text-center mb-12 leading-relaxed">
                "Không chỉ là thiết kế. Đây là nơi bạn <strong class="text-white">học tư duy ngành hàng</strong>, <strong class="text-white">rèn luyện kỷ luật</strong> và tham gia vào quy trình <strong class="text-white">thực chiến</strong>."
            </p>

            <button onclick="document.getElementById('apply-section').scrollIntoView({ behavior: 'smooth' })" class="group relative px-10 py-4 bg-transparent border border-white/30 text-white font-bold rounded-full overflow-hidden hover:border-[#f8c03f] transition-all duration-300">
                <div class="absolute inset-0 w-full h-full bg-[#f8c03f] transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 origin-left"></div>
                <span class="relative z-10 flex items-center gap-3 uppercase text-xs tracking-[0.2em] group-hover:text-[#052e16]">
                    Ứng Tuyển Ngay <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </span>
            </button>
        </div>
    </section>

    <!-- 2. CHÂN DUNG ỨNG VIÊN (Editorial Style) -->
    <section class="py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-20">
                
                <!-- Left: Title & Concept -->
                <div class="lg:w-1/3">
                    <h2 class="text-5xl font-serif font-bold text-[#052e16] mb-8 leading-tight">
                        Bạn Là <br/> <span class="text-[#54b259]">Mảnh Ghép</span> <br/> Chúng Tôi Cần?
                    </h2>
                    <div class="h-1 w-24 bg-[#f8c03f] mb-8"></div>
                    <p class="text-gray-500 leading-relaxed text-justify mb-8">
                        Chúng tôi không tìm kiếm những chuyên gia đã hoàn hảo. NP FOOD tìm kiếm những người trẻ có <strong class="text-[#052e16]">thái độ đúng đắn</strong>, sẵn sàng học hỏi và cam kết đồng hành dài hạn.
                    </p>
                    
                    <div class="p-6 bg-[#F9FAFB] rounded-xl border border-gray-100">
                         <h4 class="font-bold text-[#052e16] uppercase tracking-wider text-sm mb-4">Yêu Cầu Bắt Buộc</h4>
                         <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                               <span class="w-1.5 h-1.5 rounded-full bg-[#54b259]"></span>
                               Sinh viên Năm 1 hoặc Năm 2.
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                               <span class="w-1.5 h-1.5 rounded-full bg-[#54b259]"></span>
                               Cam kết đồng hành tối thiểu 06 tháng.
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                               <span class="w-1.5 h-1.5 rounded-full bg-[#54b259]"></span>
                               Làm việc tại văn phòng &gt; 50% thời gian (5 buổi/tuần).
                            </li>
                         </ul>
                    </div>
                </div>

                <!-- Right: Detailed Job Description (Grid) -->
                <div class="lg:w-2/3">
                   <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                      <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#54b259]/30 hover:shadow-2xl transition-all duration-500">
                         <div class="w-12 h-12 bg-[#54b259]/10 rounded-full flex items-center justify-center text-[#54b259] mb-6 group-hover:bg-[#54b259] group-hover:text-white transition-colors">
                            <i data-lucide="palette" class="w-6 h-6"></i>
                         </div>
                         <h3 class="text-xl font-bold text-[#052e16] mb-3">Thiết Kế Ấn Phẩm</h3>
                         <p class="text-gray-500 text-sm leading-relaxed">
                            Thực hiện các ấn phẩm truyền thông trên Social Media (Facebook, Tiktok, Sàn TMĐT) dựa trên đơn đặt hàng (Order) từ bộ phận Content.
                         </p>
                      </div>

                      <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#54b259]/30 hover:shadow-2xl transition-all duration-500">
                         <div class="w-12 h-12 bg-[#54b259]/10 rounded-full flex items-center justify-center text-[#54b259] mb-6 group-hover:bg-[#54b259] group-hover:text-white transition-colors">
                            <i data-lucide="book-open" class="w-6 h-6"></i>
                         </div>
                         <h3 class="text-xl font-bold text-[#052e16] mb-3">Đào Tạo Chuyên Sâu</h3>
                         <p class="text-gray-500 text-sm leading-relaxed">
                            Tham gia đầy đủ các buổi đào tạo nội bộ về: Kiến thức sản phẩm, Tư duy ngành hàng F&B, và Phân tích Insight khách hàng.
                         </p>
                      </div>

                      <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#54b259]/30 hover:shadow-2xl transition-all duration-500">
                         <div class="w-12 h-12 bg-[#54b259]/10 rounded-full flex items-center justify-center text-[#54b259] mb-6 group-hover:bg-[#54b259] group-hover:text-white transition-colors">
                            <i data-lucide="layers" class="w-6 h-6"></i>
                         </div>
                         <h3 class="text-xl font-bold text-[#052e16] mb-3">Quy Trình Teamwork</h3>
                         <p class="text-gray-500 text-sm leading-relaxed">
                            Thực hành quy trình làm việc chuyên nghiệp: Nhận việc &rarr; Thực thi &rarr; Kiểm tra chéo (Cross-check) &rarr; Sửa lỗi &rarr; Bàn giao final.
                         </p>
                      </div>

                      <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#54b259]/30 hover:shadow-2xl transition-all duration-500">
                         <div class="w-12 h-12 bg-[#54b259]/10 rounded-full flex items-center justify-center text-[#54b259] mb-6 group-hover:bg-[#54b259] group-hover:text-white transition-colors">
                            <i data-lucide="users" class="w-6 h-6"></i>
                         </div>
                         <h3 class="text-xl font-bold text-[#052e16] mb-3">Mentorship 1-1</h3>
                         <p class="text-gray-500 text-sm leading-relaxed">
                            Làm việc trực tiếp tại văn phòng để được Mentor hướng dẫn cầm tay chỉ việc, sửa lỗi sai ngay lập tức. Không làm việc Online 100% giai đoạn đầu.
                         </p>
                      </div>
                   </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. LỘ TRÌNH PHÁT TRIỂN (Overview Version) -->
    <section class="py-32 bg-[#052e16] text-white relative overflow-hidden">
        <!-- Background Accents -->
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-[#54b259]/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-[#f8c03f]/5 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto mb-20">
                <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6">Lộ Trình Phát Triển</h2>
                <p class="text-gray-300 font-light text-lg">
                    Con đường sự nghiệp rõ ràng, từ những bước chân đầu tiên đến sự chuyên nghiệp vững vàng.
                </p>
            </div>

            <!-- Timeline Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                 <!-- Stage 1 -->
                 <div class="bg-white/5 backdrop-blur-md border border-white/10 p-10 rounded-2xl hover:bg-white/10 transition-colors relative group text-center">
                    <div class="w-16 h-16 bg-[#54b259]/20 rounded-full flex items-center justify-center mx-auto mb-6 text-[#54b259]">
                       <i data-lucide="sparkles" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Hội Nhập & Văn Hóa</h3>
                    <p class="text-[#f8c03f] font-mono text-xs uppercase tracking-widest mb-6">Giai đoạn Khởi động</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                       Làm quen với môi trường, văn hóa doanh nghiệp và quy trình làm việc chuyên nghiệp. Được Mentor hướng dẫn 1:1 để nắm bắt tư duy thiết kế chuẩn.
                    </p>
                 </div>

                 <!-- Stage 2 -->
                 <div class="bg-white/5 backdrop-blur-md border border-white/10 p-10 rounded-2xl hover:bg-white/10 transition-colors relative group text-center">
                    <div class="w-16 h-16 bg-[#f8c03f]/20 rounded-full flex items-center justify-center mx-auto mb-6 text-[#f8c03f]">
                       <i data-lucide="zap" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Thực Chiến & Rèn Luyện</h3>
                    <p class="text-[#f8c03f] font-mono text-xs uppercase tracking-widest mb-6">Giai đoạn Tăng tốc</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                       Trực tiếp tham gia các dự án thực tế, chịu trách nhiệm về sản phẩm của mình. Rèn luyện kỹ năng chuyên môn và tư duy giải quyết vấn đề dưới áp lực thực tế.
                    </p>
                 </div>

                 <!-- Stage 3 -->
                 <div class="bg-white/5 backdrop-blur-md border border-white/10 p-10 rounded-2xl hover:bg-white/10 transition-colors relative group text-center">
                    <div class="w-16 h-16 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-6 text-blue-400">
                       <i data-lucide="award" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Phát Triển & Thăng Tiến</h3>
                    <p class="text-[#f8c03f] font-mono text-xs uppercase tracking-widest mb-6">Giai đoạn Bứt phá</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                       Đánh giá năng lực định kỳ, mở rộng phạm vi công việc. Cơ hội trở thành nhân viên chính thức hoặc đảm nhận các vị trí quan trọng hơn trong team.
                    </p>
                 </div>
            </div>
        </div>
    </section>

    <!-- 4. FORM ỨNG TUYỂN ARTISTIC (Split Layout) -->
    <section id="apply-section" class="py-0 bg-[#052e16] relative">
        <div class="flex flex-col lg:flex-row h-full">
           
           <!-- Left: Artistic Image / Inspiration -->
           <div class="lg:w-1/2 relative min-h-[600px] overflow-hidden">
              <img 
                src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1000&auto=format&fit=crop" 
                alt="Creative Workspace" 
                class="absolute inset-0 w-full h-full object-cover opacity-80"
              />
              <div class="absolute inset-0 bg-[#052e16]/60"></div>
              <div class="relative z-10 p-12 lg:p-24 flex flex-col justify-center h-full text-white">
                 <div class="w-16 h-16 bg-[#f8c03f] rounded-full flex items-center justify-center text-[#052e16] mb-8">
                    <i data-lucide="pen-tool" class="w-8 h-8"></i>
                 </div>
                 <h2 class="text-4xl lg:text-5xl font-serif font-bold mb-6 leading-tight">
                    Bắt Đầu <br/> Hành Trình <br/> Của Bạn
                 </h2>
                 <p class="text-gray-300 font-light text-lg mb-8 max-w-md">
                    Hãy để lại thông tin, chúng tôi sẽ liên hệ để lắng nghe câu chuyện và khát vọng của bạn.
                 </p>
                 <div class="flex items-center gap-4 text-sm text-[#f8c03f]">
                    <div class="w-12 h-px bg-[#f8c03f]"></div>
                    <span>NP FOOD Recruitment</span>
                 </div>
              </div>
           </div>

           <!-- Right: The Form -->
           <div class="lg:w-1/2 bg-[#093026] p-12 lg:p-24 flex items-center justify-center">
              <div class="w-full max-w-lg">
                 <!-- Success Message -->
                 <div id="successMessage" class="hidden text-center py-20 animate-fadeIn">
                    <div class="w-20 h-20 bg-[#54b259] rounded-full flex items-center justify-center mx-auto mb-8 shadow-[0_0_30px_#54b259]">
                       <i data-lucide="check-circle" class="w-10 h-10 text-[#052e16]"></i>
                    </div>
                    <h3 class="text-3xl font-serif font-bold text-white mb-4">Gửi Thành Công!</h3>
                    <p class="text-gray-400 font-light mb-8">
                       Cảm ơn bạn đã quan tâm. Bộ phận nhân sự NP FOOD sẽ liên hệ với bạn trong thời gian sớm nhất.
                    </p>
                    <button onclick="document.getElementById('successMessage').classList.add('hidden'); document.getElementById('internForm').classList.remove('hidden');" class="px-8 py-3 border border-white/30 text-white text-xs uppercase tracking-widest hover:bg-white hover:text-[#052e16] transition-colors">
                       Gửi Đơn Khác
                    </button>
                 </div>

                 <!-- Form -->
                 <form id="internForm" class="space-y-8">
                    <h3 class="text-2xl font-bold text-white mb-8 border-b border-white/10 pb-4">Thông Tin Ứng Tuyển</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                       <div class="group relative">
                          <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1">Họ và Tên *</label>
                          <input type="text" name="fullname" required placeholder="Nguyễn Văn A" class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-white placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm">
                       </div>
                       <div class="group relative">
                          <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1">Số Điện Thoại *</label>
                          <input type="tel" name="phone" required placeholder="0912 xxx xxx" class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-white placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm">
                       </div>
                    </div>

                    <div class="group relative">
                       <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1">Email Liên Hệ</label>
                       <input type="email" name="email" required placeholder="email@example.com" class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-white placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm">
                    </div>

                    <!-- Address Comboboxes (Simulated with simple Select for native stability, but styled beautifully) -->
                    <!-- Note: Implementation of full custom combobox in Vanilla JS is complex, using styled select for reliability first as per PHP template standard, styled to match minimalist look -->
                    <!-- Address Comboboxes (Searchable) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-20"> <!-- z-20 for dropdowns -->
                        <!-- Province -->
                        <div class="relative group" id="provinceCombobox">
                             <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1">Tỉnh / Thành Phố *</label>
                             <div class="relative">
                                 <!-- Visible Input for Search -->
                                 <input type="text" id="provInput" placeholder="Nhập hoặc chọn Tỉnh..." autocomplete="off"
                                     class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-white placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm cursor-pointer">
                                 <!-- Hidden Input for Value -->
                                 <input type="hidden" name="province" id="provHidden">
                                 
                                 <i data-lucide="chevron-down" class="w-3 h-3 text-white/50 absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none transition-transform duration-300"></i>
                                 
                                 <!-- Dropdown List -->
                                 <div id="provList" class="combobox-dropdown custom-scrollbar">
                                     <!-- Items injected via JS -->
                                 </div>
                             </div>
                        </div>

                        <!-- Ward -->
                        <div class="relative group" id="wardCombobox">
                             <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1">Xã / Phường *</label>
                             <div class="relative">
                                 <input type="text" id="wardInput" name="commune" placeholder="Nhập hoặc chọn Xã/Phường..." autocomplete="off" disabled
                                     class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-white placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                                 
                                 <i data-lucide="chevron-down" class="w-3 h-3 text-white/50 absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none transition-transform duration-300"></i>
                                 
                                 <div id="wardList" class="combobox-dropdown custom-scrollbar">
                                     <!-- Items injected via JS -->
                                 </div>
                             </div>
                        </div>
                    </div>

                    <div class="space-y-6 pt-4">
                       <div class="group relative">
                          <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1 flex items-center gap-2">
                             <i data-lucide="link" class="w-3.5 h-3.5"></i> Link CV (Google Drive/PDF) *
                          </label>
                          <input type="url" name="cvLink" required placeholder="https://docs.google.com/..." class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-blue-400 placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm">
                          <p class="text-[10px] text-gray-400 mt-1 italic">* Vui lòng mở quyền truy cập Public</p>
                       </div>

                       <div class="group relative">
                          <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest mb-2 ml-1 flex items-center gap-2">
                             <i data-lucide="mouse-pointer-2" class="w-3.5 h-3.5"></i> Link Portfolio (Behance/Drive) *
                          </label>
                          <input type="url" name="portfolioLink" required placeholder="https://www.behance.net/..." class="w-full px-0 py-3 bg-transparent border-b border-white/20 text-blue-400 placeholder-white/30 focus:outline-none focus:border-[#f8c03f] transition-all font-light text-sm">
                       </div>

                       <!-- Tài liệu bổ sung -->
                       <div class="pt-2">
                          <div class="flex justify-between items-center mb-4">
                             <label class="block text-xs font-bold text-[#f8c03f] uppercase tracking-widest flex items-center gap-2">
                                <i data-lucide="file-text" class="w-3.5 h-3.5"></i> Tài liệu bổ sung
                             </label>
                             <button type="button" id="addInternDoc" class="text-[10px] bg-white/10 hover:bg-white/20 text-white px-2 py-1 rounded flex items-center gap-1 transition-colors">
                                <i data-lucide="plus" class="w-2.5 h-2.5"></i> Thêm
                             </button>
                          </div>
                          
                          <div id="internDocsContainer" class="space-y-4">
                              <!-- Dynamic Docs -->
                          </div>
                       </div>
                    </div>

                    <p class="intern-form-message text-center text-red-400 text-sm hidden"></p>

                    <button type="submit" class="w-full py-4 mt-8 bg-[#f8c03f] hover:bg-[#eab308] text-[#052e16] font-bold text-sm uppercase tracking-[0.2em] transition-all duration-300 transform hover:-translate-y-1 shadow-lg disabled:opacity-70 flex items-center justify-center gap-2">
                        <span>Gửi Hồ Sơ</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                 </form>
              </div>
           </div>

        </div>
    </section>

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        // Define AJAX URL safely (in case object is missing)
        const AJAX_URL = '<?php echo admin_url('admin-ajax.php'); ?>';
        const NONCE = '<?php echo wp_create_nonce("np_recruit_nonce"); ?>';
        
        // DYNAMIC JOB DATA
        const JOB_ID = <?php echo $ref_job_id > 0 ? $ref_job_id : 9999; ?>;
        const JOB_TITLE = "<?php echo esc_js($job_title); ?>";

        // --- DYNAMIC DOCUMENTS ---
        function addInternDocRow() {
            const container = document.getElementById('internDocsContainer');
            const div = document.createElement('div');
            div.className = 'flex gap-4 items-end bg-white/5 p-3 rounded border border-white/10 doc-row';
            div.innerHTML = `
                <div class="flex-1">
                    <input type="text" class="w-full bg-transparent border-b border-white/10 text-white text-xs pb-1 focus:outline-none focus:border-[#f8c03f] doc-name" placeholder="Tên tài liệu">
                </div>
                <div class="flex-1">
                    <input type="url" class="w-full bg-transparent border-b border-white/10 text-blue-400 text-xs pb-1 focus:outline-none focus:border-[#f8c03f] doc-link" placeholder="Link tài liệu">
                </div>
                <button type="button" class="remove-doc text-gray-500 hover:text-red-400 transition-colors">
                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                </button>
            `;
            container.appendChild(div);
            lucide.createIcons();
            
            div.querySelector('.remove-doc').addEventListener('click', function() {
                 div.remove();
            });
        }
        
        // Add initial row
        addInternDocRow();
        document.getElementById('addInternDoc').addEventListener('click', addInternDocRow);

        // --- ADDRESS LOGIC (SEARCHABLE COMBOBOX) ---
        const PROVINCE_API = 'https://provinces.open-api.vn/api/v2';
        let allProvinces = [];
        let allWards = [];

        // Elements
        const provInput = document.getElementById('provInput');
        const provHidden = document.getElementById('provHidden');
        const provList = document.getElementById('provList');
        
        const wardInput = document.getElementById('wardInput');
        const wardList = document.getElementById('wardList');

        // --- Helper: Setup Combobox ---
        function setupCombobox(input, listElement, getData, onSelect) {
            function renderList(items) {
                listElement.innerHTML = '';
                if(items.length === 0) {
                     listElement.innerHTML = '<div class="p-3 text-gray-400 text-xs italic">Không tìm thấy kết quả</div>';
                     return;
                }
                items.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'combobox-item';
                    div.textContent = item.name;
                    div.onclick = function() {
                        input.value = item.name;
                        onSelect(item);
                        listElement.classList.remove('active');
                    };
                    listElement.appendChild(div);
                });
            }

            function filterAndRender() {
                const term = input.value.toLowerCase();
                const data = getData();
                const filtered = term ? data.filter(i => i.name.toLowerCase().includes(term)) : data;
                renderList(filtered);
                listElement.classList.add('active');
            }

            // Input Event (Filtering)
            input.addEventListener('input', function() {
                filterAndRender();
            });

            // Focus Event (Show All/Filtered)
            input.addEventListener('focus', function() {
                filterAndRender();
            });

            // Click Outside to Close
            document.addEventListener('click', function(e) {
                if (!input.contains(e.target) && !listElement.contains(e.target)) {
                    listElement.classList.remove('active');
                }
            });
        }

        // --- 1. Init Province Combobox ---
        // Fetch Provinces
        fetch(`${PROVINCE_API}/p/`)
            .then(res => res.json())
            .then(data => {
                allProvinces = data;
                // Init Combobox
                setupCombobox(provInput, provList, () => allProvinces, function(selectedItem) {
                    provHidden.value = selectedItem.code; // Store code for API
                    // Trigger Ward Load
                    loadWards(selectedItem.code);
                });
            })
            .catch(err => console.error(err));


        // --- 2. Ward Logic ---
        function loadWards(provinceCode) {
             wardInput.value = '';
             wardInput.placeholder = 'Đang tải dữ liệu...';
             wardInput.disabled = true;
             wardList.innerHTML = '';
             allWards = [];
             
             const params = new URLSearchParams({
                action: 'np_get_wards',
                province_code: provinceCode
             });

             fetch(`${AJAX_URL}?${params.toString()}`)
                .then(res => res.json())
                .then(response => {
                    if(response.success && Array.isArray(response.data)) {
                        allWards = response.data; // [{name: '...'}, ...]
                        
                        wardInput.disabled = false;
                        wardInput.placeholder = 'Nhập hoặc chọn Xã/Phường...';
                        
                        // Re-use logic (closures will capture new data via getData)
                    } else {
                        wardInput.placeholder = 'Không có dữ liệu';
                        wardInput.disabled = false;
                    }
                })
                .catch(err => {
                    wardInput.placeholder = 'Lỗi tải dữ liệu';
                    wardInput.disabled = false;
                });
        }

        // Init Ward Combobox (Initially empty)
        setupCombobox(wardInput, wardList, () => allWards, function(item) {
            // Ward Selected - nothing specific to do besides setting value (handled in setup)
        });
        
        // --- SUBMIT ---
        const form = document.getElementById('internForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = form.querySelector('button[type="submit"]');
            const msg = form.querySelector('.intern-form-message');
            const originalBtn = btn.innerHTML;
            
            // Validation
            if(!provHidden.value && !provInput.value) { // Allow typing if it matches name? No, strictly require code for wards.
                // Actually user might type "Hanoi". We need the code.
                // So strictly need hidden value.
                if(!provHidden.value) {
                     alert("Vui lòng chọn Tỉnh/Thành phố từ danh sách gợi ý.");
                     provInput.focus();
                     return;
                }
            }
            if(!wardInput.value.trim()) {
                 alert("Vui lòng nhập hoặc chọn Xã/Phường.");
                 wardInput.focus();
                 return;
            }

            btn.disabled = true;
            btn.innerHTML = 'Đang gửi...';
            msg.classList.add('hidden');

            const formData = new FormData(form);
            formData.append('action', 'np_submit_application');
            formData.append('security', NONCE);
            formData.append('job_id', JOB_ID); 
            
            // Construct Message
            const portfolio = formData.get('portfolioLink');
            let message = "Ứng tuyển: " + JOB_TITLE + "\n";
            message += "Portfolio: " + portfolio + "\n\n";
            
            const docs = [];
            form.querySelectorAll('.doc-row').forEach(row => {
                const name = row.querySelector('.doc-name').value;
                const link = row.querySelector('.doc-link').value;
                if(name || link) docs.push(`- ${name}: ${link}`);
            });
            if(docs.length > 0) message += "Tài liệu bổ sung:\n" + docs.join('\n');
            formData.append('message', message);
            
            // Address Data
            // We send 'province_name' via provInput value (User sees name)
            // We send 'commune' via wardInput value
            formData.set('province_name', provInput.value); 
            formData.set('commune', wardInput.value);

            formData.append('cv_file', formData.get('cvLink'));

            fetch(AJAX_URL, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    form.reset();
                    // Clear custom inputs
                    provInput.value = ''; provHidden.value = '';
                    wardInput.value = '';
                    
                    document.getElementById('internForm').classList.add('hidden');
                    document.getElementById('successMessage').classList.remove('hidden');
                    document.getElementById('successMessage').scrollIntoView({behavior: 'smooth'});
                } else {
                    msg.textContent = data.data.message || 'Lỗi xảy ra.';
                    msg.classList.remove('hidden');
                    btn.disabled = false;
                    btn.innerHTML = originalBtn;
                }
            })
            .catch(err => {
                msg.textContent = 'Lỗi kết nối.';
                msg.classList.remove('hidden');
                btn.disabled = false;
                btn.innerHTML = originalBtn;
            });
        });
    });
</script>

<?php get_footer(); ?>
