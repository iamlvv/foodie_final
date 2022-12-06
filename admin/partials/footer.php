<div class='grid grid-cols-3 p-2' style="background-color: black; color: white">
    <div>
        <img src="../user/image/Foodie-logo.png" alt="logo" class="h-44 p-3 mx-3" />
    </div>

    <div class='flex flex-col my-auto'>
        <div class='mb-5'>

            <p class='inline ml-3'>Đại học Bách khoa TP.HCM</p>
        </div>
        <div class='mb-5'>

            <p class='inline ml-3'>0123456789</p>
        </div>
        <div>

            <p class='inline ml-3'>laptrinhweb@hcmut.edu.vn</p>
        </div>
    </div>
    <div class='mt-2'>
        <p class='font-bold lg:text-xl md:text-base'>About us</p>
        <p class='text-gray-500 text-justify mr-5 lg:text-base md:text-sm'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium eveniet, dolorem excepturi harum obcaecati nulla, incidunt sint rem recusandae neque consequatur officia voluptatibus eaque nostrum aspernatur blanditiis dignissimos odio ullam!</p>
    </div>
</div>




<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {

        
        //open modal add product
        $('.addProduct').click(function() {
            var modal = $('#addProductModal');
            modal.show();

        });
        
        $('#close').click(function() {
            var modal = $('#userModal');
            modal.hide();

        });
        
        $('#closeBtn').click(function() {

            var modal2 = $('#productModal');
            modal2.hide();
        });

        $('#btnCloseAddProductModal').click(function() {

            var modal3 = $('#addProductModal');
            modal3.hide();
        });

        //add product
        $(document).ready(function() {

            var formData = $('#saveProduct');
            $('.btnSaveProduct').ready(function() {
            });
            $.ajax({
                type: "POST",
                url: "code.php",
                data: $("#saveProduct input").serialize(),

                success: function(data) {
                    console.log(data);
                }
            });

        });

        $(document).on('click', '.userInfo', function() {

            var user_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?user_id=" + user_id,
                success: function(response) {
                    console.log('Response:', response);

                    var res = $.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {
                        $('#view_id').text(res.data.user_id);
                        $('#view_name').text(res.data.fullname);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phone);
                        $('#view_address').text(res.data.address);
                        $('#view_user-date').text(res.data.created_date);
                        $('#userModal').show();
                    }
                }
            });
        });

            $(document).on('click', '.productInfo', function() {
            var product_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?product_id=" + product_id,
                success: function(response) {
                    console.log('Response:', response);

                    var res = $.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {
                        $('#view_id').text(res.data.product_id);
                        $('#view_image').attr('src', res.data.product_image);
                        $('#view_name').text(res.data.product_name);
                        $('#view_description').text(res.data.description);
                        $('#view_price').text(res.data.price);
                        $('#view_quantity').text(res.data.quantity);
                        $('#productModal').show();
                    }
                }
            });
        });

        $(document).on('click', '.delUserBtn', function(e) {
            e.preventDefault();

            if (confirm('Are you sure you want to delete this data?')) {
                var user_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_user': true,
                        'user_id': user_id
                    },
                    success: function(response) {

                        console.log('Response:', response);

                        var res = $.parseJSON(response);
                        if (res.status == 500) {

                            alert(res.message);
                        } else {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);

                            setTimeout(function() {

                                location.reload();
                            }, 800);
                        
                        }
                    }
                });
            }
        });
        
        
         $(document).on('click', '.delProductBtn', function(e) {
            e.preventDefault();

            if (confirm('Are you sure you want to delete this data?')) {
                var product_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_product': true,
                        'product_id': product_id
                    },
                    success: function(response) {

                        console.log('Response:', response);

                        var res = $.parseJSON(response);
                        if (res.status == 500) {

                            alert(res.message);
                        } else {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);

                            setTimeout(function() {

                                location.reload();
                            }, 800);

                        }
                    }
                });
            }
        });

    })
</script>
</body>

</html>
