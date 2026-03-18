<?php
/**
 * Template Name: Quản Lý Thực Tập Sinh
 */
get_header(); ?>

<div id="intern-manager-root"></div>

<!-- ES Module Shims for better browser support -->
<script async src="https://ga.jspm.io/npm:es-module-shims@1.7.0/dist/es-module-shims.js"></script>

<script type="importmap">
{
  "imports": {
    "react": "https://esm.sh/react@18.2.0",
    "react-dom/client": "https://esm.sh/react-dom@18.2.0/client",
    "lucide-react": "https://esm.sh/lucide-react@0.330.0"
  }
}
</script>

<!-- Load Babel -->
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<!-- Ensure Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<script type="text/babel" data-type="module">
import React, { useState, useEffect } from 'react';
import { createRoot } from 'react-dom/client';
import { 
  Calendar, 
  Users, 
  FileSpreadsheet, 
  ChevronLeft, 
  ChevronRight, 
  Sun, 
  Sunset,
  CheckCircle2,
  Circle,
  UserCircle2,
  LogOut,
  KeyRound,
  ShieldCheck,
  Plus,
  Trash2,
  X,
  TrendingUp,
  Clock,
  Link as LinkIcon
} from 'lucide-react';

// --- DỮ LIỆU MẪU (MOCK DATA) ---
const INITIAL_INTERNS = [
  { id: 'tts1', code: 'IT001', name: 'Nguyễn Văn A', position: 'Thực tập sinh IT' },
  { id: 'tts2', code: 'MKT002', name: 'Trần Thị B', position: 'Thực tập sinh Marketing' },
  { id: 'tts3', code: 'HR003', name: 'Lê Văn C', position: 'Thực tập sinh HR' },
];

const INITIAL_STAFF = [
  { id: 'staff1', code: 'ADMIN', role: 'manager', name: 'Admin Quản Lý', position: 'Ban Giám Đốc' },
  { id: 'staff2', code: 'KETOAN', role: 'accountant', name: 'Kế Toán', position: 'Phòng Tài Chính' },
];

function App() {
  // --- TRẠNG THÁI ĐĂNG NHẬP (AUTH STATE) ---
  const [currentUser, setCurrentUser] = useState(() => {
    const saved = localStorage.getItem('internManager_currentUser');
    return saved ? JSON.parse(saved) : null;
  });
  
  // Trạng thái cho màn hình Login
  const [loginCode, setLoginCode] = useState('');
  const [loginError, setLoginError] = useState('');

  // --- TRẠNG THÁI ỨNG DỤNG (APP STATE LƯU STORAGE) ---
  const [staffs, setStaffs] = useState(() => {
    const saved = localStorage.getItem('internManager_staffs');
    return saved ? JSON.parse(saved) : INITIAL_STAFF;
  });

  const [interns, setInterns] = useState(() => {
    const saved = localStorage.getItem('internManager_interns');
    return saved ? JSON.parse(saved) : INITIAL_INTERNS;
  });
  
  const [attendanceData, setAttendanceData] = useState(() => {
    const saved = localStorage.getItem('internManager_attendance');
    return saved ? JSON.parse(saved) : {};
  });

  const [currentInternId, setCurrentInternId] = useState(() => {
    return interns.length > 0 ? interns[0].id : null;
  });
  
  const [viewDate, setViewDate] = useState(new Date());

  // --- AUTO LOGIN CHO KẾ TOÁN (QUA URL THEO YÊU CẦU) ---
  useEffect(() => {
    // Chỉ tự động khi chưa đăng nhập
    if (!currentUser) {
      const urlParams = new URLSearchParams(window.location.search);
      // Nếu có query ?ketoan
      if (urlParams.has('ketoan')) {
        const accountantStaff = staffs.find(s => s.role === 'accountant');
        if (accountantStaff) {
          setCurrentUser(accountantStaff);
          setCurrentInternId(interns.length > 0 ? interns[0].id : null);
        }
      }
    }
  }, [currentUser, staffs, interns]);

  // Lưu lại vào localStorage mỗi khi có thay đổi
  useEffect(() => {
    localStorage.setItem('internManager_staffs', JSON.stringify(staffs));
  }, [staffs]);

  useEffect(() => {
    localStorage.setItem('internManager_interns', JSON.stringify(interns));
  }, [interns]);

  useEffect(() => {
    localStorage.setItem('internManager_attendance', JSON.stringify(attendanceData));
  }, [attendanceData]);

  useEffect(() => {
    localStorage.setItem('internManager_currentUser', JSON.stringify(currentUser));
  }, [currentUser]);

  // Trạng thái cho chức năng Thêm/Xóa TTS
  const [isAddModalOpen, setIsAddModalOpen] = useState(false);
  const [newIntern, setNewIntern] = useState({ name: '', position: '', code: '' });
  const [confirmDeleteId, setConfirmDeleteId] = useState(null);

  // Trạng thái cho đổi Pass Admin
  const [isChangePasswordModalOpen, setIsChangePasswordModalOpen] = useState(false);
  const [newPassword, setNewPassword] = useState('');

  // Trạng thái cho Edit Intern Pass
  const [isEditInternPassModalOpen, setIsEditInternPassModalOpen] = useState(false);
  const [editInternData, setEditInternData] = useState(null);
  const [newInternPass, setNewInternPass] = useState('');

  // --- CÁC HÀM XỬ LÝ LỊCH ---
  const currentYear = viewDate.getFullYear();
  const currentMonth = viewDate.getMonth();
  const monthKey = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}`;

  const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
  
  const handlePrevMonth = () => setViewDate(new Date(currentYear, currentMonth - 1, 1));
  const handleNextMonth = () => setViewDate(new Date(currentYear, currentMonth + 1, 1));

  // --- TÍNH TOÁN DỰ ĐOÁN (TUẦN NÀY & TUẦN SAU) ---
  const getMostAttendedShift = (startDate, endDate) => {
    let bestDay = null;
    let bestShift = null; 
    let maxCount = -1;

    for (let d = new Date(startDate); d <= endDate; d.setDate(d.getDate() + 1)) {
        if (d.getDay() === 0) continue; 
        
        const y = d.getFullYear();
        const m = d.getMonth();
        const dayStr = String(d.getDate()).padStart(2, '0');
        const mk = `${y}-${String(m + 1).padStart(2, '0')}`;
        
        let morningCount = 0;
        let afternoonCount = 0;
        
        interns.forEach(intern => {
            const data = attendanceData[intern.id]?.[mk]?.[dayStr];
            if (data?.morning) morningCount++;
            if (data?.afternoon) afternoonCount++;
        });

        if (morningCount > maxCount && morningCount > 0) {
            maxCount = morningCount;
            bestDay = new Date(d);
            bestShift = 'Sáng';
        }
        if (afternoonCount > maxCount && afternoonCount > 0) {
            maxCount = afternoonCount;
            bestDay = new Date(d);
            bestShift = 'Chiều';
        }
    }
    
    if (maxCount <= 0) return { text: 'Chưa có thông tin', count: 0 };
    
    const weekDays = ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'];
    return {
        text: `Ca ${bestShift} ${weekDays[bestDay.getDay()]} (${String(bestDay.getDate()).padStart(2, '0')}/${String(bestDay.getMonth()+1).padStart(2, '0')})`,
        count: maxCount
    };
  };

  const calculatePredictions = () => {
    const today = new Date();
    today.setHours(0,0,0,0);
    
    const dayOfWeek = today.getDay() || 7; 
    const thisWeekStart = new Date(today);
    thisWeekStart.setDate(today.getDate() - dayOfWeek + 1);
    thisWeekStart.setHours(0,0,0,0);
    
    const thisWeekEnd = new Date(thisWeekStart);
    thisWeekEnd.setDate(thisWeekStart.getDate() + 6);
    thisWeekEnd.setHours(23,59,59,999);

    const nextWeekStart = new Date(thisWeekEnd);
    nextWeekStart.setDate(nextWeekStart.getDate() + 1);
    nextWeekStart.setHours(0,0,0,0);

    const nextWeekEnd = new Date(nextWeekStart);
    nextWeekEnd.setDate(nextWeekStart.getDate() + 6);
    nextWeekEnd.setHours(23,59,59,999);

    return { 
      thisWeekPopular: getMostAttendedShift(thisWeekStart, thisWeekEnd), 
      nextWeekPopular: getMostAttendedShift(nextWeekStart, nextWeekEnd) 
    };
  };

  // --- CÁC HÀM XỬ LÝ ĐĂNG NHẬP / ĐĂNG XUẤT ---
  const handleLogin = (e) => {
    e.preventDefault();
    setLoginError('');
    const codeUpper = loginCode.trim().toUpperCase();

    const staff = staffs.find(s => s.code === codeUpper);
    if (staff) {
      setCurrentUser(staff);
      setCurrentInternId(interns.length > 0 ? interns[0].id : null);
      return;
    }

    const intern = interns.find(i => i.code === codeUpper);
    if (intern) {
      setCurrentUser({ ...intern, role: 'intern' });
      setCurrentInternId(intern.id);
      return;
    }

    setLoginError('Mã đăng nhập không hợp lệ! Vui lòng kiểm tra lại.');
  };

  const handleLogout = () => {
    // Nếu có ?ketoan trong URL, xóa nó khỏi URL để tránh bị auto login khi đăng xuất
    const urlObj = new URL(window.location.href);
    if(urlObj.searchParams.has('ketoan')) {
        urlObj.searchParams.delete('ketoan');
        window.history.replaceState({}, '', urlObj);
    }

    setCurrentUser(null);
    setLoginCode('');
    setLoginError('');
  };

  const handleChangePassword = (e) => {
    e.preventDefault();
    if (!newPassword.trim()) return;
    const codeUpp = newPassword.trim().toUpperCase();
    
    if (staffs.some(s => s.id !== currentUser.id && s.code === codeUpp) || interns.some(i => i.code === codeUpp)) {
        alert('Mã này đã được sử dụng. Vui lòng chọn mã khác!');
        return;
    }

    const updatedStaffs = staffs.map(s => s.id === currentUser.id ? { ...s, code: codeUpp } : s);
    setStaffs(updatedStaffs);
    
    const updatedUser = { ...currentUser, code: codeUpp };
    setCurrentUser(updatedUser);
    
    setIsChangePasswordModalOpen(false);
    setNewPassword('');
    alert('Đổi mã đăng nhập (mật khẩu) thành công!');
  };

  // HÀM ĐỔI PASS CHO NHÂN VIÊN DO ADMIN LÀM
  const handleOpenEditInternPass = (intern) => {
    setEditInternData(intern);
    setNewInternPass(intern.code);
    setIsEditInternPassModalOpen(true);
  };

  const handleSaveInternPass = (e) => {
    e.preventDefault();
    if (!newInternPass.trim()) return;
    const codeUpp = newInternPass.trim().toUpperCase();
    
    if (
        staffs.some(s => s.code === codeUpp) || 
        interns.some(i => i.id !== editInternData.id && i.code === codeUpp)
    ) {
        alert('Mã này đã được sử dụng bởi người khác. Vui lòng chọn mã khác!');
        return;
    }

    const updatedInterns = interns.map(i => i.id === editInternData.id ? { ...i, code: codeUpp } : i);
    setInterns(updatedInterns);
    setIsEditInternPassModalOpen(false);
    setEditInternData(null);
    setNewInternPass('');
    alert('Đổi mã đăng nhập cho thực tập sinh thành công!');
  };

  // --- CÁC HÀM XỬ LÝ CHẤM CÔNG ---
  const toggleShift = (internId, day, shiftType) => {
    if (currentUser?.role === 'accountant') return;

    setAttendanceData(prev => {
      const newData = { ...prev };
      if (!newData[internId]) newData[internId] = {};
      if (!newData[internId][monthKey]) newData[internId][monthKey] = {};
      
      const dayStr = String(day).padStart(2, '0');
      const currentDayData = newData[internId][monthKey][dayStr] || { morning: false, afternoon: false };
      
      newData[internId][monthKey][dayStr] = {
        ...currentDayData,
        [shiftType]: !currentDayData[shiftType]
      };
      
      return newData;
    });
  };

  const calculateTotalWorkdays = (internId) => {
    if (!attendanceData[internId] || !attendanceData[internId][monthKey]) return 0;
    
    let total = 0;
    const monthData = attendanceData[internId][monthKey];
    
    Object.values(monthData).forEach(day => {
      if (day.morning) total += 1;
      if (day.afternoon) total += 1;
    });
    
    return total;
  };

  // --- CÁC HÀM XỬ LÝ QUẢN LÝ THỰC TẬP SINH ---
  const handleOpenAddModal = () => {
    setNewIntern({
      name: '',
      position: '',
      code: 'TTS' + Math.floor(1000 + Math.random() * 9000)
    });
    setIsAddModalOpen(true);
  };

  const handleSaveNewIntern = (e) => {
    e.preventDefault();
    if (!newIntern.name || !newIntern.code) return;
    
    const newId = 'tts' + Date.now();
    const updatedInterns = [...interns, { ...newIntern, id: newId }];
    setInterns(updatedInterns);
    setIsAddModalOpen(false);
    
    if (!currentInternId) setCurrentInternId(newId);
  };

  const handleDeleteIntern = (id) => {
    const updatedInterns = interns.filter(i => i.id !== id);
    setInterns(updatedInterns);
    setConfirmDeleteId(null);
    if (currentInternId === id) {
      setCurrentInternId(updatedInterns.length > 0 ? updatedInterns[0].id : null);
    }
  };

  const handleCopyAccountantLink = () => {
    const urlObj = new URL(window.location.href);
    urlObj.search = '?ketoan';
    navigator.clipboard.writeText(urlObj.toString());
    alert('Đã copy đường dẫn dành riêng cho Kế Toán: ' + urlObj.toString());
  };

  // --- RENDER MÀN HÌNH ĐĂNG NHẬP ---
  if (!currentUser) {
    return (
      <div className="min-h-screen bg-slate-100 flex flex-col justify-center items-center p-4" style={{ fontFamily: 'var(--wp--preset--font-family--inter, sans-serif)' }}>
        <div className="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
          <div className="bg-indigo-600 p-6 text-center">
            <div className="inline-flex bg-white/20 p-3 rounded-full mb-4 ring-4 ring-indigo-500/30">
              <Users className="w-8 h-8 text-white" />
            </div>
            <h1 className="text-2xl font-bold text-white">InternTime</h1>
            <p className="text-indigo-100 mt-1">Hệ thống quản lý thời gian làm việc</p>
          </div>

          <div className="p-6 sm:p-8">
            <form onSubmit={handleLogin} className="space-y-5">
              {loginError && (
                <div className="bg-red-50 text-red-600 p-3 rounded-lg text-sm font-medium border border-red-100 text-center">
                  {loginError}
                </div>
              )}

              <div>
                <label className="block text-sm font-medium text-slate-700 mb-1">Mã Đăng Nhập</label>
                <div className="relative">
                  <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <KeyRound className="h-5 w-5 text-slate-400" />
                  </div>
                  <input
                    type="text"
                    value={loginCode}
                    onChange={(e) => setLoginCode(e.target.value)}
                    className="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50 uppercase text-lg font-bold tracking-wide transition-all"
                    placeholder="Nhập mã của bạn..."
                    required
                  />
                </div>
              </div>

              <button
                type="submit"
                className="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors mt-2"
              >
                Đăng nhập vào hệ thống
              </button>
            </form>
          </div>
        </div>
      </div>
    );
  }

  // --- RENDER WIDGETS DỰ ĐOÁN ---
  const renderDashboardWidgets = () => {
    const { thisWeekPopular, nextWeekPopular } = calculatePredictions();
    return (
       <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 mb-6">
          <div className="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-xl p-6 text-white shadow-lg relative overflow-hidden">
              <TrendingUp className="absolute -right-4 -bottom-4 w-32 h-32 text-indigo-400 opacity-20 pointer-events-none" />
              <h4 className="flex items-center gap-2 text-indigo-100 mb-2 font-medium text-xs uppercase tracking-widest bg-indigo-900/40 inline-flex px-3 py-1 rounded-full">
                 <Users className="w-3.5 h-3.5" /> Tuần này đông đủ nhất
              </h4>
              <div className="text-2xl font-bold mb-1 mt-3" style={{textShadow: '0 2px 10px rgba(0,0,0,0.2)'}}>{thisWeekPopular.text}</div>
              <div className="text-indigo-100 text-sm font-medium bg-black/10 inline-block px-2 py-0.5 rounded mt-2">
                 {thisWeekPopular.count > 0 ? `Dự kiến: ${thisWeekPopular.count} thành viên có mặt` : 'Chưa có dữ liệu'}
              </div>
          </div>
          
          <div className="bg-gradient-to-br from-emerald-500 to-teal-700 rounded-xl p-6 text-white shadow-lg relative overflow-hidden">
              <Clock className="absolute -right-4 -bottom-4 w-32 h-32 text-emerald-400 opacity-20 pointer-events-none" />
              <h4 className="flex items-center gap-2 text-emerald-100 mb-2 font-medium text-xs uppercase tracking-widest bg-emerald-900/40 inline-flex px-3 py-1 rounded-full">
                 <Calendar className="w-3.5 h-3.5" /> Tuần sau đông đủ nhất
              </h4>
              <div className="text-2xl font-bold mb-1 mt-3" style={{textShadow: '0 2px 10px rgba(0,0,0,0.2)'}}>{nextWeekPopular.text}</div>
              <div className="text-emerald-100 text-sm font-medium bg-black/10 inline-block px-2 py-0.5 rounded mt-2">
                 {nextWeekPopular.count > 0 ? `Dự kiến: ${nextWeekPopular.count} thành viên có mặt` : 'Chưa có dữ liệu'}
              </div>
          </div>
       </div>
    );
  };

  // --- RENDER GIAO DIỆN CHÍNH (KHI ĐÃ ĐĂNG NHẬP) ---
  const renderCalendar = (internId, isReadOnly = false) => {
    const blanks = Array(firstDayOfMonth === 0 ? 6 : firstDayOfMonth - 1).fill(null);
    const days = Array.from({ length: daysInMonth }, (_, i) => i + 1);
    const internMonthData = attendanceData[internId]?.[monthKey] || {};

    const weekDays = ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'];
    
    const todayEndOfDay = new Date();
    todayEndOfDay.setHours(0,0,0,0);

    return (
      <div className="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
        <div className="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
          <h3 className="text-lg font-semibold text-slate-800 flex items-center gap-2">
            <Calendar className="w-5 h-5 text-indigo-600" />
            Lịch làm việc - Tháng {currentMonth + 1}/{currentYear}
          </h3>
          <div className="flex items-center gap-2 bg-indigo-50 px-4 py-2 rounded-lg text-indigo-700 font-medium">
            Tổng số công: <span className="text-xl font-bold">{calculateTotalWorkdays(internId)}</span>
          </div>
        </div>

        {/* Lưới Lịch */}
        <div className="grid grid-cols-7 gap-1 sm:gap-2 mb-2">
          {weekDays.map(day => (
            <div key={day} className="text-center font-semibold text-slate-500 py-2 bg-slate-50 rounded-md text-xs sm:text-sm">
              {day}
            </div>
          ))}
        </div>
        
        <div className="grid grid-cols-7 gap-1 sm:gap-2">
          {blanks.map((_, i) => (
            <div key={`blank-${i}`} className="p-1 sm:p-2 bg-slate-50/50 rounded-lg min-h-[80px] sm:min-h-[100px] border border-dashed border-slate-200"></div>
          ))}
          
          {days.map(day => {
            const dayStr = String(day).padStart(2, '0');
            const dayData = internMonthData[dayStr] || { morning: false, afternoon: false };
            const isToday = day === new Date().getDate() && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear();

            const renderDate = new Date(currentYear, currentMonth, day);
            renderDate.setHours(0,0,0,0);
            const isPast = renderDate < todayEndOfDay;
            
            // Chỉ cần role không phải manager và tính thêm đk READ ONLY -> sẽ không gửi được nữa
            const disableEdit = isReadOnly || (isPast && currentUser?.role !== 'manager');

            return (
              <div 
                key={day} 
                className={`p-1 sm:p-2 rounded-lg min-h-[80px] sm:min-h-[100px] border flex flex-col gap-1 sm:gap-2 transition-all relative overflow-hidden
                  ${isToday ? 'border-indigo-400 bg-indigo-50/30 ring-2 ring-indigo-500/20' : 'border-slate-200 bg-white hover:border-slate-300'}
                  ${isPast && !isToday && currentUser?.role !== 'manager' ? 'bg-slate-50 opacity-80' : ''}
                `}
              >
                {isPast && !isToday && <div className="absolute inset-0 bg-slate-100/50 mix-blend-multiply pointer-events-none"></div>}
                
                <div className="text-right font-medium text-slate-600 text-xs sm:text-sm relative z-10 flex justify-between items-center">
                   {isPast && !isToday && <span className="text-[9px] text-slate-400 font-normal uppercase tracking-wider bg-slate-100 px-1 rounded">Đã qua</span>}
                   <span className="ml-auto">{day}</span>
                </div>
                
                <div className="flex flex-col gap-1 mt-auto relative z-10">
                  <button
                    onClick={() => { if (!disableEdit) toggleShift(internId, day, 'morning'); }}
                    disabled={disableEdit}
                    className={`flex items-center justify-center sm:justify-between px-1 sm:px-2 py-1.5 rounded text-[10px] sm:text-xs font-medium transition-colors
                      ${disableEdit ? 'cursor-not-allowed' : 'cursor-pointer hover:opacity-80'}
                      ${dayData.morning ? 'bg-emerald-100 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-400 border border-slate-200'}
                    `}
                    title={disableEdit && !isReadOnly ? "Không thể sửa lịch quá khứ" : "Ca Sáng"}
                  >
                    <div className="flex items-center gap-1">
                      <Sun className="w-3 h-3" /> <span className="hidden sm:inline">Sáng</span>
                    </div>
                    {dayData.morning ? <CheckCircle2 className="w-3 h-3 sm:w-3.5 sm:h-3.5" /> : <Circle className="w-3 h-3 sm:w-3.5 sm:h-3.5 opacity-40" />}
                  </button>
                  
                  <button
                    onClick={() => { if (!disableEdit) toggleShift(internId, day, 'afternoon'); }}
                    disabled={disableEdit}
                    className={`flex items-center justify-center sm:justify-between px-1 sm:px-2 py-1.5 rounded text-[10px] sm:text-xs font-medium transition-colors
                      ${disableEdit ? 'cursor-not-allowed' : 'cursor-pointer hover:opacity-80'}
                      ${dayData.afternoon ? 'bg-amber-100 text-amber-700 border border-amber-200' : 'bg-slate-100 text-slate-400 border border-slate-200'}
                    `}
                    title={disableEdit && !isReadOnly ? "Không thể sửa lịch quá khứ" : "Ca Chiều"}
                  >
                    <div className="flex items-center gap-1">
                      <Sunset className="w-3 h-3" /> <span className="hidden sm:inline">Chiều</span>
                    </div>
                    {dayData.afternoon ? <CheckCircle2 className="w-3 h-3 sm:w-3.5 sm:h-3.5" /> : <Circle className="w-3 h-3 sm:w-3.5 sm:h-3.5 opacity-40" />}
                  </button>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    );
  };

  const renderSummary = () => (
    <div className="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
      <div className="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-slate-100 pb-4">
        <h2 className="text-xl font-bold text-slate-800 flex items-center gap-2">
          <FileSpreadsheet className="w-6 h-6 text-indigo-600" />
          Bảng Tổng Hợp Công - Tháng {currentMonth + 1}/{currentYear}
        </h2>
        <div className="flex flex-wrap items-center gap-3 w-full sm:w-auto">
          {currentUser.role === 'manager' && (
            <button
              onClick={handleCopyAccountantLink}
              className="bg-emerald-50 text-emerald-600 border border-emerald-200 hover:bg-emerald-100 px-4 py-2 rounded-lg font-medium shadow-sm transition-colors flex items-center gap-2"
              title="Copy link dành riêng cho Kế toán"
            >
              <LinkIcon className="w-4 h-4" />
              <span className="hidden sm:inline">Hỗ trợ (Link Kế toán)</span>
            </button>
          )}

          <div className="bg-slate-50 px-4 py-2 rounded-lg text-slate-600 font-medium border border-slate-200 shadow-sm whitespace-nowrap flex-1 sm:flex-none text-center">
            <span className="opacity-70">Tổng nhân sự:</span> <span className="text-slate-900 font-bold ml-1">{interns.length}</span>
          </div>
          {currentUser.role === 'manager' && (
            <button
              onClick={handleOpenAddModal}
              className="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium shadow-sm transition-colors flex items-center gap-2 whitespace-nowrap"
            >
              <Plus className="w-4 h-4" />
              <span className="hidden sm:inline">Thêm TTS</span>
            </button>
          )}
        </div>
      </div>

      <div className="overflow-x-auto rounded-lg border border-slate-200">
        <table className="min-w-full divide-y divide-slate-200">
          <thead className="bg-slate-50">
            <tr>
              <th scope="col" className="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Họ và Tên</th>
              <th scope="col" className="px-4 sm:px-6 py-4 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Số buổi Sáng</th>
              <th scope="col" className="px-4 sm:px-6 py-4 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Số buổi Chiều</th>
              <th scope="col" className="px-4 sm:px-6 py-4 text-center text-xs font-bold text-indigo-600 uppercase tracking-wider bg-indigo-50/50">Tổng Công</th>
              <th scope="col" className="px-4 sm:px-6 py-4 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Hành động</th>
            </tr>
          </thead>
          <tbody className="bg-white divide-y divide-slate-200">
            {interns.map(intern => {
              const monthData = attendanceData[intern.id]?.[monthKey] || {};
              let morningCount = 0;
              let afternoonCount = 0;
              
              Object.values(monthData).forEach(day => {
                if (day.morning) morningCount++;
                if (day.afternoon) afternoonCount++;
              });
              
              const totalWorkdays = morningCount + afternoonCount;

              return (
                <tr key={intern.id} className="hover:bg-slate-50 transition-colors">
                  <td className="px-4 sm:px-6 py-4 whitespace-nowrap">
                    <div className="flex items-center">
                      <div className="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full hidden sm:flex items-center justify-center text-indigo-600 font-bold">
                        {intern.name.charAt(0)}
                      </div>
                      <div className="sm:ml-4">
                        <div className="text-sm font-medium text-slate-900">{intern.name}</div>
                        <div className="text-xs text-slate-500">{intern.code} • {intern.position}</div>
                      </div>
                    </div>
                  </td>
                  <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-slate-700">
                    <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                      {morningCount}
                    </span>
                  </td>
                  <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-slate-700">
                    <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                      {afternoonCount}
                    </span>
                  </td>
                  <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-base font-bold text-indigo-700 bg-indigo-50/30">
                    {totalWorkdays}
                  </td>
                  <td className="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <div className="flex items-center justify-center gap-2">
                      <button
                        onClick={() => {
                          setCurrentInternId(intern.id);
                          window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
                        }}
                        className={`px-3 py-1.5 rounded-md transition-colors ${currentInternId === intern.id ? 'bg-indigo-600 text-white shadow-md' : 'text-indigo-600 bg-indigo-50 hover:bg-indigo-100'}`}
                      >
                        {currentInternId === intern.id ? 'Đang xem' : 'Chi tiết'}
                      </button>
                      
                      {currentUser.role === 'manager' && (
                        <div className="flex items-center gap-1">
                          <button
                            onClick={() => handleOpenEditInternPass(intern)}
                            className="text-amber-500 bg-amber-50 hover:bg-amber-100 hover:text-amber-700 p-1.5 rounded-md transition-colors"
                            title="Đổi mã đăng nhập"
                          >
                            <KeyRound className="w-4 h-4" />
                          </button>
                          
                          {confirmDeleteId === intern.id ? (
                            <div className="flex items-center gap-1 bg-red-50 p-1 rounded-md border border-red-200">
                              <button 
                                onClick={() => handleDeleteIntern(intern.id)}
                                className="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700"
                              >
                                Xóa luôn
                              </button>
                              <button 
                                onClick={() => setConfirmDeleteId(null)}
                                className="bg-slate-200 text-slate-700 px-2 py-1 rounded text-xs hover:bg-slate-300"
                              >
                                Hủy
                              </button>
                            </div>
                          ) : (
                            <button
                              onClick={() => setConfirmDeleteId(intern.id)}
                              className="text-red-500 bg-red-50 hover:bg-red-100 hover:text-red-700 p-1.5 rounded-md transition-colors"
                              title="Xóa Thực tập sinh"
                            >
                              <Trash2 className="w-4 h-4" />
                            </button>
                          )}
                        </div>
                      )}
                    </div>
                  </td>
                </tr>
              );
            })}
          </tbody>
        </table>
      </div>
    </div>
  );

  return (
    <div className="min-h-screen bg-slate-50 pb-10" style={{ fontFamily: 'var(--wp--preset--font-family--inter, sans-serif)' }}>
      {/* HEADER & THANH ĐIỀU HƯỚNG */}
      <nav className="bg-white border-b border-slate-200 sticky top-0 z-10 shadow-sm">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16">
            <div className="flex items-center gap-3">
              <div className="bg-indigo-600 text-white p-2 rounded-lg shadow-md shadow-indigo-200">
                <Users className="w-6 h-6" />
              </div>
              <span className="text-xl font-bold bg-gradient-to-r from-indigo-700 to-indigo-500 bg-clip-text text-transparent hidden sm:block">
                InternTime
              </span>
            </div>
            
            <div className="flex items-center gap-4">
              {currentUser.role === 'manager' && (
                <button
                  onClick={() => setIsChangePasswordModalOpen(true)}
                  className="flex items-center gap-2 text-slate-500 hover:text-indigo-600 transition-colors bg-slate-50 hover:bg-indigo-50 px-3 py-2 rounded-lg border border-slate-200 hover:border-indigo-200 mr-2"
                  title="Đổi mã đăng nhập Admin"
                >
                  <KeyRound className="w-4 h-4" />
                  <span className="text-sm font-medium hidden sm:inline">Đổi Mật Khẩu</span>
                </button>
              )}

              {/* Thông tin người dùng hiện tại */}
              <div className="flex items-center gap-2 sm:pr-4 sm:border-r border-slate-200">
                <div className="text-right hidden sm:block">
                  <p className="text-sm font-bold text-slate-700 leading-tight">
                    {currentUser.name}
                  </p>
                  <p className="text-xs text-slate-500 font-medium">
                    {currentUser.position || 'Thực tập sinh'}
                  </p>
                </div>
                <UserCircle2 className="w-8 h-8 text-indigo-500" />
              </div>

              {/* Nút Đăng xuất */}
              <button
                onClick={handleLogout}
                className="flex items-center gap-2 text-slate-500 hover:text-red-600 transition-colors bg-slate-50 hover:bg-red-50 px-3 py-2 rounded-lg border border-slate-200 hover:border-red-200"
              >
                <LogOut className="w-4 h-4" />
                <span className="text-sm font-medium hidden sm:inline">Đăng xuất</span>
              </button>
            </div>
          </div>
        </div>
      </nav>

      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        
        {/* WIDGETS DỰ ĐOÁN */}
        {renderDashboardWidgets()}
        
        {/* THANH ĐIỀU KHIỂN CHUNG */}
        <div className="bg-white p-4 rounded-xl shadow-sm border border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
          
          <div className="flex items-center gap-4 w-full sm:w-auto">
            {currentUser.role !== 'intern' ? (
              // Chế độ Kế toán/Quản lý: Chọn xem lịch của ai
              <div className="flex-1 sm:flex-none">
                <label className="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Đang xem lịch chi tiết của:</label>
              <select
                value={currentInternId || ''}
                onChange={(e) => setCurrentInternId(e.target.value)}
                className="block w-full sm:w-72 pl-3 pr-10 py-2.5 text-base border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg bg-slate-50 border font-medium text-slate-700"
              >
                {interns.map(intern => (
                  <option key={intern.id} value={intern.id}>{intern.name} ({intern.code})</option>
                ))}
              </select>
            </div>
          ) : (
              // Chế độ TTS: Thông báo trạng thái cá nhân
              <div className="flex items-center gap-3 bg-indigo-50 px-4 py-2.5 rounded-lg border border-indigo-100">
                <ShieldCheck className="w-5 h-5 text-indigo-600" />
                <div>
                  <p className="text-sm font-bold text-indigo-900">Không gian cá nhân</p>
                  <p className="text-xs text-indigo-700">Chỉ bạn mới có quyền xem và đăng ký lịch tương lai.</p>
                </div>
              </div>
            )}
          </div>

          {/* Điều hướng Tháng */}
          <div className="flex items-center bg-slate-50 rounded-lg p-1 border border-slate-200 w-full sm:w-auto justify-between shadow-inner">
            <button 
              onClick={handlePrevMonth}
              className="p-2 rounded hover:bg-white hover:shadow text-slate-600 transition-all border border-transparent hover:border-slate-200"
            >
              <ChevronLeft className="w-5 h-5" />
            </button>
            <div className="px-6 font-bold text-slate-700 min-w-[150px] text-center">
              Tháng {currentMonth + 1} / {currentYear}
            </div>
            <button 
              onClick={handleNextMonth}
              className="p-2 rounded hover:bg-white hover:shadow text-slate-600 transition-all border border-transparent hover:border-slate-200"
            >
              <ChevronRight className="w-5 h-5" />
            </button>
          </div>
        </div>

        {/* NỘI DUNG CHÍNH DỰA TRÊN VAI TRÒ */}
        {currentUser.role === 'intern' ? (
          // Góc nhìn Thực tập sinh: Chỉ hiển thị lịch của chính mình
          renderCalendar(currentUser.id, false)
        ) : (
          // Góc nhìn Quản lý/Kế toán: Bảng tổng hợp + Lịch chi tiết của người được chọn
      <div className="space-y-6">
        {renderSummary()}
        {currentInternId && (
          <div className="bg-slate-800 rounded-xl p-1 shadow-lg shadow-slate-200">
             <div className="bg-white rounded-lg">
               {/* renderCalendar với internId được chọn từ ô select */}
               {renderCalendar(currentInternId, currentUser.role === 'accountant')}
               
               {currentUser.role === 'accountant' && (
                  <div className="px-6 pb-6 text-sm text-amber-600 flex items-center gap-2 font-medium bg-amber-50 mx-6 mb-6 rounded-lg p-3 border border-amber-200">
                     <Circle className="w-4 h-4 flex-shrink-0" /> 
                     <span><strong>Lưu ý:</strong> Kế toán chỉ có quyền xem đối chiếu lịch. Kèm theo đó, dữ liệu quá khứ không thể bị thay đổi.</span>
                  </div>
               )}
               {currentUser.role === 'manager' && (
                  <div className="px-6 pb-6 text-sm text-indigo-600 flex items-center gap-2 font-medium bg-indigo-50 mx-6 mb-6 rounded-lg p-3 border border-indigo-200">
                     <ShieldCheck className="w-4 h-4 flex-shrink-0" /> 
                     <span><strong>Quyền Quản Lý:</strong> Bạn có quyền phê duyệt và thay đổi thời gian làm việc của mọi người kể cả những ngày đã qua.</span>
                  </div>
               )}
             </div>
          </div>
        )}
      </div>
    )}

      </main>

      {/* MODAL THÊM THỰC TẬP SINH */}
      {isAddModalOpen && (
        <div className="fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden flex flex-col">
            <div className="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
              <h3 className="text-lg font-bold text-slate-800">Thêm Thực tập sinh mới</h3>
              <button 
                onClick={() => setIsAddModalOpen(false)}
                className="text-slate-400 hover:text-slate-600 p-1 hover:bg-slate-200 rounded-full transition-colors"
              >
                <X className="w-5 h-5" />
              </button>
            </div>
            
            <form onSubmit={handleSaveNewIntern} className="p-6 space-y-4">
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-1">Họ và Tên <span className="text-red-500">*</span></label>
                <input
                  type="text"
                  required
                  value={newIntern.name}
                  onChange={e => setNewIntern({...newIntern, name: e.target.value})}
                  className="block w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50"
                  placeholder="VD: Lê Thị D"
                />
              </div>
              
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-1">Mã đăng nhập <span className="text-red-500">*</span></label>
                <div className="flex gap-2">
                  <input
                    type="text"
                    required
                    value={newIntern.code}
                    onChange={e => setNewIntern({...newIntern, code: e.target.value.toUpperCase()})}
                    className="block w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50 uppercase font-medium"
                    placeholder="VD: MKT004"
                  />
                  <button 
                    type="button"
                    onClick={() => setNewIntern({...newIntern, code: 'TTS' + Math.floor(1000 + Math.random() * 9000)})}
                    className="px-3 py-2 bg-slate-100 text-slate-600 text-sm font-medium rounded-lg border border-slate-200 hover:bg-slate-200 whitespace-nowrap"
                  >
                    Tạo ngẫu nhiên
                  </button>
                </div>
              </div>

              <div>
                <label className="block text-sm font-medium text-slate-700 mb-1">Vị trí (Phòng ban)</label>
                <input
                  type="text"
                  value={newIntern.position}
                  onChange={e => setNewIntern({...newIntern, position: e.target.value})}
                  className="block w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50"
                  placeholder="VD: Thực tập sinh Design"
                />
              </div>

              <div className="pt-4 flex gap-3">
                <button
                  type="button"
                  onClick={() => setIsAddModalOpen(false)}
                  className="flex-1 px-4 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg font-medium transition-colors"
                >
                  Hủy
                </button>
                <button
                  type="submit"
                  className="flex-1 px-4 py-2.5 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg font-medium shadow-sm transition-colors"
                >
                  Lưu thông tin
                </button>
              </div>
            </form>
          </div>
        </div>
      )}

      {/* MODAL ĐỔI PASS THỰC TẬP SINH LÀM BỞI ADMIN */}
      {isEditInternPassModalOpen && editInternData && (
        <div className="fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-xl shadow-xl w-full max-w-sm overflow-hidden flex flex-col">
            <div className="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
              <h3 className="text-lg font-bold text-slate-800 flex items-center gap-2"><KeyRound className="w-5 h-5 text-amber-600"/> Đổi Mã TTS</h3>
              <button 
                onClick={() => setIsEditInternPassModalOpen(false)}
                className="text-slate-400 hover:text-slate-600 p-1 hover:bg-slate-200 rounded-full transition-colors"
              >
                <X className="w-5 h-5" />
              </button>
            </div>
            
            <form onSubmit={handleSaveInternPass} className="p-6 space-y-4">
              <div>
                <p className="text-sm font-semibold text-slate-700 mb-4 bg-slate-100 p-3 rounded text-center">
                  Cập nhật mã riêng cho: <span className="text-indigo-600 block text-lg font-bold">{editInternData.name}</span>
                </p>
                <label className="block text-sm font-medium text-slate-700 mb-2">Mã đăng nhập mới <span className="text-red-500">*</span></label>
                <input
                  type="text"
                  required
                  value={newInternPass}
                  onChange={e => setNewInternPass(e.target.value.toUpperCase())}
                  className="block w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50 uppercase font-bold text-lg tracking-wide text-center"
                  placeholder="VD: TTS2025"
                />
              </div>

              <div className="pt-4 flex gap-3">
                <button
                  type="button"
                  onClick={() => setIsEditInternPassModalOpen(false)}
                  className="flex-1 px-4 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg font-medium transition-colors"
                >
                  Hủy
                </button>
                <button
                  type="submit"
                  className="flex-1 px-4 py-2.5 text-white bg-amber-500 hover:bg-amber-600 rounded-lg font-medium shadow-sm transition-colors flex justify-center items-center gap-2"
                >
                  <KeyRound className="w-4 h-4"/> Lưu thay đổi
                </button>
              </div>
            </form>
          </div>
        </div>
      )}

      {/* MODAL ĐỔI PASS ADMIN */}
      {isChangePasswordModalOpen && (
        <div className="fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-xl shadow-xl w-full max-w-sm overflow-hidden flex flex-col">
            <div className="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
              <h3 className="text-lg font-bold text-slate-800 flex items-center gap-2"><KeyRound className="w-5 h-5 text-indigo-600"/> Đổi Mã Admin</h3>
              <button 
                onClick={() => setIsChangePasswordModalOpen(false)}
                className="text-slate-400 hover:text-slate-600 p-1 hover:bg-slate-200 rounded-full transition-colors"
              >
                <X className="w-5 h-5" />
              </button>
            </div>
            
            <form onSubmit={handleChangePassword} className="p-6 space-y-4">
              <div>
                <label className="block text-sm font-medium text-slate-700 mb-2">Mã đăng nhập (Pass) mới <span className="text-red-500">*</span></label>
                <input
                  type="text"
                  required
                  value={newPassword}
                  onChange={e => setNewPassword(e.target.value.toUpperCase())}
                  className="block w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50 uppercase font-bold text-lg tracking-wide text-center"
                  placeholder="VD: ADMIN2025"
                />
              </div>

              <div className="pt-4 flex gap-3">
                <button
                  type="button"
                  onClick={() => setIsChangePasswordModalOpen(false)}
                  className="flex-1 px-4 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg font-medium transition-colors"
                >
                  Hủy
                </button>
                <button
                  type="submit"
                  className="flex-1 px-4 py-2.5 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg font-medium shadow-sm transition-colors flex justify-center items-center gap-2"
                >
                  <KeyRound className="w-4 h-4"/> Cập nhật mã
                </button>
              </div>
            </form>
          </div>
        </div>
      )}
    </div>
  );
}

const rootElement = document.getElementById('intern-manager-root');
const root = createRoot(rootElement);
root.render(<App />);

</script>

<?php get_footer(); ?>
