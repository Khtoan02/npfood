jQuery(document).ready(function($) {
    // 1. OPEN MODAL LOGIC
    // Global "Send CV" button
    $(document).on('click', '.open-application-modal', function(e) {
        e.preventDefault();
        var jobId = $(this).data('job-id') || 0;
        var jobTitle = $(this).data('job-title') || '';
        
        // Populate Hidden Job ID
        $('#app_job_id').val(jobId);
        
        // Update Title UI
        if(jobTitle) {
            $('.modal-job-title').text('Ứng tuyển: ' + jobTitle);
        } else {
            $('.modal-job-title').text('Gửi CV Ứng Tuyển');
        }

        $('#applicationModal').removeClass('hidden').addClass('flex');
    });

    // Close Modal
    $('.close-modal').click(function() {
        $('#applicationModal').addClass('hidden').removeClass('flex');
    });

    // Close on overlay click
    $('#applicationModal').click(function(e) {
        if (e.target === this) {
            $(this).addClass('hidden').removeClass('flex');
        }
    });

    // 2. SUBMIT FORM LOGIC
    $('#applicationForm').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        formData.append('action', 'np_submit_application');
        formData.append('security', np_recruit_obj.nonce);
        
        var $btn = $(this).find('button[type="submit"]');
        var $msg = $('.form-message');
        
        $btn.addClass('opacity-50 cursor-not-allowed').text('Đang gửi...').prop('disabled', true);
        $msg.hide().removeClass('text-red-500 text-green-500');

        $.ajax({
            url: np_recruit_obj.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#applicationForm')[0].reset();
                    $msg.text(response.data.message).addClass('text-green-500').show();
                    setTimeout(function() {
                        $('#applicationModal').addClass('hidden').removeClass('flex');
                        $msg.hide();
                    }, 2000);
                } else {
                    $msg.text(response.data.message || 'Có lỗi xảy ra.').addClass('text-red-500').show();
                }
            },
            error: function() {
                $msg.text('Lỗi kết nối server.').addClass('text-red-500').show();
            },
            complete: function() {
                $btn.removeClass('opacity-50 cursor-not-allowed').text('Gửi Hồ Sơ').prop('disabled', false);
            }
        });
    });
});
