<?php
include('./header-member.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
  <script>
    // window.onload = function() {
    //   var element = document.getElementById("main");
    //   element.scrollIntoView(true);
    // }
    document.getElementById("formorder").addEventListener("click", function(event){
  event.preventDefault()
});
    function handleClick() {
      var firstname = document.getElementById("first-name").value;
      var lastname = document.getElementById("last-name").value;
      var phone = document.getElementById("phone").value;
      var email = document.getElementById("email").value;
      var address = document.getElementById("address").value;
      var note = document.getElementById("note").value;
      var paymentmethod = document.querySelector('input[name="payment"]:checked').value;
      var totalPrice = document.getElementById("totalPrice").value;
      var date = new Date().toISOString().slice(0, 10).replace('T', ' ');;
      var orderId = 1;
      var userId = 1;

      var totalProducts = document.getElementById("totalProducts").value;
      //var totalProducts = 71;
      //totalPrice = 3000;

      if (firstname == "" || lastname == "" || phone == "" || address == "" || paymentmethod == "") {
        //alert("Please fill all the fields");
      } else {
        insertToDB(orderId, userId, firstname, lastname, phone, email, address, totalProducts, totalPrice, note, paymentmethod, date);
      }

    }

    function insertToDB(orderId, userId, firstname, lastname, phone, email, address, totalProducts, totalPrice, note, paymentmethod, date) {
      $.ajax({
        url: "insert_order.php",
        data: "order_id=" + orderId + "&user_id=" + userId + "&first_name=" + firstname + "&last_name=" + lastname + "&phone=" + phone + "&email=" + email + "&address=" + address + "&total_products=" + totalProducts + "&total_price=" + totalPrice + "&desc_note=" + note + "&payment_method=" + paymentmethod + "&created_date=" + date,
        type: "POST",
        success: function(response) {
          alert("You ordered successfully");
          window.location.href = "http://localhost/foodie_final/homepage-member.php";
        }
      });
    }
  </script>

</head>

<body>
  <div class=' bg-gray-200 pb-32 pt-20 mt-10' id='main'>
    <form class='shadow-lg lg:ml-32 lg:mr-32 bg-white lg:grid lg:grid-cols-4 md:ml-20 md:mr-20' id="formorder">
      <div class='col-span-3 lg:pl-5 flex flex-col'>
        <div class=''>
          <h1 class='mt-5 font-bold md:pl-5'>Recipient name</h1>
          <div class='mb-5 mt-5 md:text-center lg:text-left'>
            <input type='text' placeholder='First name' class='bg-gray-100 rounded-md pl-3 leading-7 mr-5' id='first-name' required />
            <input type='text' placeholder='Last name' class='bg-gray-100 rounded-md pl-3 leading-7 lg:mr-5' id='last-name' required />
          </div>
          <h1 class='mt-5 font-bold md:pl-5'>Contact info</h1>
          <div class='mb-5 mt-5 md:text-center lg:text-left'>
            <input type='text' placeholder='Phone number' class='bg-gray-100 rounded-md pl-3 leading-7 mr-5' id='phone' required />
            <input type='text' placeholder='Email' class='bg-gray-100 rounded-md pl-3 leading-7 lg:mr-5 ' id='email' />
          </div>
          <h1 class='mt-5 font-bold  md:pl-5'>Delivery address</h1>
          <div class=' mt-5 md:text-center lg:text-left'>
            <input type='text' placeholder='Address' class='bg-gray-100 rounded-md pl-3 leading-7 w-1/2' id='address' required />
            <div>
              <textarea placeholder='Note' class='bg-gray-100 rounded-md pl-3 leading-7 mt-5 w-1/2 resize-none' rows='3' id='note'></textarea>
            </div>
          </div>
          <input type="submit" hidden />
        </div>
        <div class='lg:mt-5 md:mt-0'>
          <h1 class='font-bold  md:pl-5'>Payment Method</h1>
          <div class='mb-5 mt-5'>
            <div class='mb-5'>
              <input type='radio' value='card' name='payment' class='ml-5' checked />
              <label for='card'>Visa/ Mastercard <img src='./user/image/visa.png' alt='' class='inline' /> <img src='./user/image/mastercard.png' alt='' class='inline' /></label>
            </div>
            <div class='mb-5'>
              <input type='radio' value='momo' name='payment' class='ml-5' />
              <label for='momo'>Momo <img src='./user/image/momo.png' alt='' class='inline' /></label>
            </div>
            <div class='mb-5'>
              <input type='radio' value='zalo' name='payment' class='ml-5' />
              <label for='zalo'>ZaloPay <img src='./user/image/zalo.png' alt='' class='inline' /></label>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class='text-center'>
          <button type='submit' class=' font-bold bg-sky-500 py-3 px-6 rounded-3xl mt-10 mb-5 shadow-lg hover:text-white transition ease-in hover:font-bold' onclick="handleClick()">Place Order</button>
          <div class='text-left lg:ml-10 md:ml-32 md:pb-10 lg:pb-0'>
            <h1 class='font-bold mb-5'>Purchase summary</h1>
            <div class='grid grid-cols-2'>
              <div>
                <p>Subtotal</p>
                <p>Tax</p>
                <p>Delivery</p>
                <p class='font-bold'>Total</p>
              </div>
              <div>
                <?php
                $totalPrice = 0;
                $totalTax = 0;
                $totalDelivery = 0;
                $total = 0;
                $totalProduct = 0;
                $userId = $_COOKIE['user_id'];
                $result = $mysqli->query("SELECT * FROM cart WHERE user_id = $userId");
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $totalPrice += $row['price'] * $row['quantity'];
                    $totalProduct += $row['quantity'];
                  }
                  $totalTax = $totalPrice * 0.1;
                  $totalDelivery = 0;
                  $total = $totalPrice + $totalTax + $totalDelivery;
                }
                ?>
                <p><?php echo $totalPrice; ?> VND</p>
                <p><?php echo $totalTax; ?> VND</p>
                <p><?php echo $totalDelivery; ?> VND</p>
                <input id="totalPrice" value="<?php echo $total; ?> VND" class="w-full" />
                <input type="hidden" id="totalProducts" value="<?php echo $totalProduct; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php
  include('./footer.php');
  ?>
</body>

</html>