<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://esgoo.net/scripts/jquery.js"></script>
<script>
    $(document).ready(function() {
        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function(data_tinh) {
            if (data_tinh.error == 0) {
                $.each(data_tinh.data, function(key_tinh, val_tinh) {
                    $("#tinh").append('<option value="' + val_tinh.id + '">' + val_tinh
                        .full_name + '</option>');
                });
            }
        });
        $("#tinh").change(function() {
            var idtinh = $(this).val();
            $("#quan").html('<option value="0">Quận Huyện</option>');
            $("#phuong").html('<option value="0">Phường Xã</option>');
            if (idtinh != 0) {
                $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function(data_quan) {
                    if (data_quan.error == 0) {
                        $.each(data_quan.data, function(key_quan, val_quan) {
                            $("#quan").append('<option value="' + val_quan.id + '">' +
                                val_quan.full_name + '</option>');
                        });
                    }
                });
            }
        });
        $("#quan").change(function() {
            var idquan = $(this).val();
            $("#phuong").html('<option value="0">Phường Xã</option>');

            if (idquan != 0) {
                $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function(
                    data_phuong) {
                    if (data_phuong.error == 0) {
                        $.each(data_phuong.data, function(key_phuong, val_phuong) {
                            $("#phuong").append('<option value="' + val_phuong.id +
                                '">' + val_phuong.full_name + '</option>');
                        });
                    }
                });
            }
        });
        $('#tinh, #quan, #phuong, #detailAddress').on('input change', function() {
            updateSelectedAddress();
        });

        function updateSelectedAddress() {
            var tinh = $("#tinh option:selected").text();
            var quan = $("#quan option:selected").text();
            var phuong = $("#phuong option:selected").text();
            var detailAddress = $("#detailAddress").val();
            var fullAddress = "";
            if (tinh && tinh !== "Tỉnh Thành") {
                fullAddress += tinh;
            }
            if (quan && quan !== "Quận Huyện") {
                fullAddress += ", " + quan;
            }
            if (phuong && phuong !== "Phường Xã") {
                fullAddress += ", " + phuong;
            }
            if (detailAddress) {
                if (fullAddress) {
                    fullAddress += ", " + detailAddress;
                } else {
                    fullAddress = detailAddress;
                }
            }
            $("#selectedAddress").text(fullAddress);
            $("#allDressHiding").val(fullAddress);
        }
    });
    $('.allDressHiding').change(function() {
        console.log($(this).val());
    })
</script>
