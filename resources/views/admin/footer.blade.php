        <!-- Footer -->
        <div id="footer">
            <div class="wrapper">
                <div>Bản quyền © 2012-2016 Người_Nào_Đó.php.info</div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script>
        function Val_Gia(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.add').click(function() {
                $("#popup-add").removeClass("hide-popup");
                $("#popup-add").addClass("unhide-popup");
            });
            $('.edit').click(function() {
                $("#popup-edit").removeClass("hide-popup");
                $("#popup-edit").addClass("unhide-popup");
            });
            $(".del").on('click', function() {
                $("#popup-del").removeClass("hide-popup");
                $("#popup-del").addClass("unhide-popup");
            });
            $('.cancel').click(function() {
                if ($("#popup-add").hasClass("unhide-popup")) {
                    $("#popup-add").removeClass("unhide-popup");
                    $("#popup-add").addClass("hide-popup");
                }
                if ($("#popup-edit").hasClass("unhide-popup")) {
                    $("#popup-edit").removeClass("unhide-popup");
                    $("#popup-edit").addClass("hide-popup");
                }
                if ($("#popup-del").hasClass("unhide-popup")) {
                    $("#popup-del").removeClass("unhide-popup");
                    $("#popup-del").addClass("hide-popup");
                }
            });
            $('.product .exp').click(function() {
                if ($(".product .sub").hasClass("scrol-h")) {
                    $(".product .sub").removeClass("scrol-h");
                } else {
                    $(".product .sub").addClass("scrol-h");
                    $(".tran .sub").removeClass("scrol-h");
                    $(".account .sub").removeClass("scrol-h");
                    $(".content .sub").removeClass("scrol-h");
                }
            });
            $('.tran .exp').click(function() {
                if ($(".tran .sub").hasClass("scrol-h")) {
                    $(".tran .sub").removeClass("scrol-h");
                } else {
                    $(".product .sub").removeClass("scrol-h");
                    $(".tran .sub").addClass("scrol-h");
                    $(".account .sub").removeClass("scrol-h");
                    $(".content .sub").removeClass("scrol-h");
                }
            });
            $('.account .exp').click(function() {
                if ($(".account .sub").hasClass("scrol-h")) {
                    $(".account .sub").removeClass("scrol-h");
                } else {
                    $(".product .sub").removeClass("scrol-h");
                    $(".tran .sub").removeClass("scrol-h");
                    $(".account .sub").addClass("scrol-h");
                    $(".content .sub").removeClass("scrol-h");
                }
            });
            $('.content .exp').click(function() {
                if ($(".content .sub").hasClass("scrol-h")) {
                    $(".content .sub").removeClass("scrol-h");
                } else {
                    $(".product .sub").removeClass("scrol-h");
                    $(".tran .sub").removeClass("scrol-h");
                    $(".account .sub").removeClass("scrol-h");
                    $(".content .sub").addClass("scrol-h");
                }
            });
            $(".edit").on('click', function() {
                var id_sp, img, ten, gia, giamgia, color, size, event, idg, mota, avty;
                var product = new Array(
                    id_sp = $(this).attr('data-id'),
                    img = $(this).attr('data-img'),
                    ten = $(this).attr('data-ten'),
                    gia = $(this).attr('data-gia'),
                    giamgia = $(this).attr('data-giamgia'),
                    color = $(this).attr('data-color'),
                    size = $(this).attr('data-size'),
                    event = $(this).attr('data-event'),
                    idg = $(this).attr('data-idg'),
                    mota = $(this).attr('data-mota'),
                    avty = $(this).attr('data-avty')
                );
                $('#show_ten').val(product[2]);
                $('#show_gia').val(product[3]);
                $('#show_giamgia').val(product[4]);
                $('#show_mota').val(product[9]);
                $('#show_img').val(product[1]);
                if (product[7] == '') {
                    $('#show_event').val("");
                } else {
                    $('#show_event').val(product[7]);
                }
                $('#show_size').val(product[6]);
                $('#show_color').val(product[5]);
                if (product[10] == 'Hết hàng') {
                    $('#show_avty').val('Hết hàng');
                }
                if (product[10] == 'Còn hàng') {
                    $('#show_avty').val('Còn hàng');
                }
                $('#show_idg').val(product[8]);
                $('#show_id').val(product[0]);

                // var scrollPoint = $('#popup-edit .wrap-popup').offset().top - 28;
                // $('body,html').animate({
                //     scrollTop: scrollPoint
                // }, 500);
            });
        });
    </script>
    <script>

            $(document).ready(function(){
             $('#fileToInsert').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {

                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#thumb-output').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
             });
            });

            </script>
    {{-- <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('Mota_SP');
    </script> --}}
