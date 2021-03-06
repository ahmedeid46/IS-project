$(function() {
    const bar_links_open = $(".main-nav .list-links-bar i"),
        list_link = $(".links-self"),
        list_link_close_btn = $(".links-self .close-navbar"),
        choose_subject = $(".choose-subject"),
        btn_print = $(".print-table");
    let tl_gsap_nav = gsap.timeline({ paused: true });
    // Anamaition Navbar =======================================
    let list_animation = tl_gsap_nav.to(list_link, { height: "100%", duration: 0.3, ease: "bounce" })
        .to('.links-self .close-navbar', { opacity: 1, top: "60px", rotate: 360, duration: 0.3 })
        .to('.links-self .logo-link', { top: 0, opacity: 1, duration: 0.3 })
        .to('.links-self  .head-links ', { left: 0, opacity: 1, duration: 0.3 })
        .to('.links-self .outer-links li', { bottom: 0, opacity: 1, stagger: 0.3, duration: 0.3 });
    bar_links_open.on("click", () => {
        list_animation.play();
    });
    list_link_close_btn.on("click", () => {
        list_animation.reverse();
    });
     // Upload Photo Profile Section ====================================
    /* function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);

            }
            reader.readAsDataURL(input.files[0]);
        }
    } */
    $("#imageUpload").change(function() {
        // readURL(this);
        var fd = new FormData();
        var files = $('#imageUpload')[0].files;

        // Check file selected or not
        if (files.length != 0) {
            fd.append('file', files[0]);
            $.ajax({
                url: '../function/saveAndSendPhoto.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        $('#imagePreview').css('background-image', 'url(' + response + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                        $(".page-content .container-fluid").prepend(`<div class="mt-2 alert alert-success nt-slct">Uploaded</div>`);
                        $(".page-content .container-fluid").find(".nt-slct").delay(1500).hide(1200, function() {
                            $(this).remove();
                        });
                    } else {
                        $(".page-content .container-fluid").prepend(`<div class="mt-2 alert alert-danger er-nt-slct">Img Not Uploaded</div>`);
                        $(".page-content .container-fluid").find(".er-nt-slct").delay(1500).hide(1200, function() {
                            $(this).remove();
                        });
                    }
                },
            });
        } else {
            $(".page-content .container-fluid").prepend(`<div class="mt-2 alert alert-danger er-nt-slct">Please Select A Photo</div>`);
            $(".page-content .container-fluid").find(".er-nt-slct").delay(1500).hide(1200, function() {
                $(this).remove();
            });
        }
    });
    // Form Profile =======================================================
    $('.change-data-self .form-profile').submit(function(cl) {
        cl.preventDefault();
        let formdataSer = $(this).serialize(),
            formdataInputs = {
                password: $(this.password).val()
            };
            // For Password
            if (formdataInputs.password || formdataInputs.password != "") {
                if (!(/[A-Z]/g).test(formdataInputs.password)) {
                    $(this.password).removeClass('is-valid');
                    $(this.password).addClass('is-invalid');
                    $(this.password).after(`<div class="invalid-feedback">Must Be Capital , Small Letter And Numbers</div>`);
                    $(this.password).nextAll('.invalid-feedback,.valid-feedback').delay(2000).hide(200, function() {
                        $(this).remove();
                    });
                } else if (!(/[a-z]/g).test(formdataInputs.password)) {
                    $(this.password).removeClass('is-valid');
                    $(this.password).addClass('is-invalid');
                    $(this.password).after(`<div class="invalid-feedback">Must Be Capital , Small Letter And Numbers</div>`);
                    $(this.password).nextAll('.invalid-feedback,.valid-feedback').delay(2000).hide(200, function() {
                        $(this).remove();
                    });
                } else if (!(/[0-9]/g).test(formdataInputs.password)) {
                    $(this.password).removeClass('is-valid');
                    $(this.password).addClass('is-invalid');
                    $(this.password).after(`<div class="invalid-feedback">Must Be Capital , Small Letter And Numbers</div>`);
                    $(this.password).nextAll('.invalid-feedback,.valid-feedback').delay(2000).hide(1200, function() {
                        $(this).remove();
                    });
                } else {
                    $(this.password).removeClass('is-invalid');
                    $(this.password).addClass('is-valid');
                    $(this.password).after(`<div class="valid-feedback">Good Password</div>`);
                    $(this.password).nextAll('.invalid-feedback,.valid-feedback').delay(2000).hide(200, function() {
                        $(this).remove();
                    });
                    $('.form-profile').prepend('<div class="alert alert-success">Success Update Password</div>');
                    $('.form-profile').find(".alert").delay(2000).slideUp(100);
                    console.log(formdataInputs.password)
                    setTimeout(() => {
                        $(this.password).removeClass('is-valid');
                        $(this.password).val('')
                    }, 2000)
                }
        } else {
            $('.form-profile').prepend(`<div class="alert alert-danger">Empty Fields</div>`);
            $('.form-profile').find(".alert").delay(2000).slideUp(100);
        }
    });
    // Section Registeration , Choose Subject
    choose_subject.checkboxpicker({
        baseGroupCls: 'btn-group radio-subject',
        baseCls: 'btn btn-radio p-0 pr-1 pl-1'
    });

    // Section Current Page
    btn_print.on("click", () => {
        window.print();
    });
});
