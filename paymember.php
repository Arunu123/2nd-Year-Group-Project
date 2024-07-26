<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$conn = new mysqli('localhost', 'root', '', 'reg');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Display user profile
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/dashboardstyle1.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link to Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Add your custom CSS here */
        .profile-photo-container {
            text-align: center;
            max-width: 150px; /* Adjust the size as needed */
            border-radius: 50%;
            margin: 0 auto; /* Center the container horizontally */
        }

        /* Two-color panels with a vertical rule */
        .left-panel {
            background-color: #E0E0E0; /* Left panel background color */
            padding: 20px;
            border-right: 2px solid #333; /* Vertical rule */
            height: 500px;
        }

        .right-panel {
            background-color: #F0F0F0; /* Right panel background color */
            padding: 20px;
        }

        .right-panel.user-details {
    padding: 20px;
    border-top-right-radius: 20px; /* Curved border on the top-right corner */
    border-bottom-right-radius: 20px; /* Curved border on the bottom-right corner */
    border-left: 2px solid black; /* Vertical rule */
    display: flex; /* Use flexbox for layout */
    flex-direction: column; /* Stack elements vertically */
    align-items: center; /* Center items horizontally */
    justify-content: center; /* Center items vertically */
    text-align: center; /* Center text horizontally */
    margin-top: -18px;
    border: "";
    background-image: url(./images/payback.jpg) ;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.5); /* 0.5 for 50% transparency (adjust as needed) */
   
    
}

.left-panel {
    padding: 20px;
    border-right: 2px solid #333; /* Vertical rule */
    height: 500px;
    border-top-left-radius: 20px; /* Curved border on the top-left corner */
    border-bottom-left-radius: 20px; /* Curved border on the bottom-left corner */
    margin-top: -18px;
    border:"";
    background-image: url(./images/payback.jpg) ;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.5); /* 0.5 for 50% transparency (adjust as needed) */
   
}

video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: -1;
        }


</style>
    </head>
            <body>
                <nav>

                        <!-- Video Background -->
            <video autoplay muted loop>
            <source src="images/hd1594.mov" type="video/mp4">
            </video>
                    <style>
                        nav{
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 250px;
                padding: 10px 14px; 
                border-right: 1px solid var(--border-color);
                transition: var(--tran-05);
                background-image: url(./images/12.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
                    </style>
<div class="logo-name">
    <div class="logo-image">
    <img src="images/bg.avif" alt="">
    </div>
    <span class="logo_name" style=color:white;>Welcome <?php echo $user['name']; ?> </span>
</div>

<div class="menu-items">
    <ul class="nav-links">
    <li><a href="profile.php">
            <i style=color:white; class="uil uil-estate"></i>
            <span class="link-name" style=color:white;><b>Dashboard</b></span>
        </a></li>
        <li><a href="BMI.php">
            <i style=color:white; class="uil uil-files-landscapes"></i>
            <span class="link-name"style=color:white;><b>BMI</b></span>
        </a></li>
        <li><a href="c_in_mem.php">
            <i style=color:white; class="uil uil-chart"></i>
            <span class="link-name" style=color:white;><b>Classes</b></span>
        </a></li>
        <li><a href="paymember.php">
            <i style=color:white; class="uil uil-thumbs-up"></i>
            <span class="link-name" style=color:white;><b>Payments</b></span>
        </a></li>
        <li><a href="help.php">
            <i style=color:white; class="uil uil-question-circle"></i>
            <span class="link-name"style=color:white;><b>Help & support</b></span>
        </a></li>
        <li><a href="tips.php">
            <i style=color:white; class="uil uil-bolt-alt"></i>
            <span class="link-name" style=color:white;><b>Tips</b></span>
        </a></li>
    </ul>
    
    <ul class="logout-mode">
        <li><a href="logout.php">
            <i style=color:white; class="uil uil-signout"></i>
            <span class="link-name" style=color:white;><b>Logout</b></span>
        </a></li>
    </ul>
</div>
<style>
    /* Change font color to white for link names */
    .link-name {
        color: white;
    }
</style>

                

               
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <style>
            .dashboard{
                background-color: "";
                background-image: url(images/neww2.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                
            }
            
        </style>
    <div class="top-center">
    <h1>Ironcity Gymnasium</h1>
</div>
<style>
    /* Centered text at the top */
    .top-center {
        text-align: center;
        padding: 20px 0;
        background-color: #333; /* Background color for the top bar */
        color: white; /* Text color */
        font-size: 20px; /* Font size */
        font-family: arial sans-serif;
        margin-left: -11px;
        margin-right: -10px;
        margin-top: -10px;
        border-radius: 10px; /* Adjust the radius as needed to curve the side edges */
    }

                    .top-center h1 {
                        margin: 0;
                        font-size: 30px; /* Adjust the font size as needed */
                        font-style: italic;
                    }

                    </style>
            </style>
<br><br><br>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
    /* Padding - just for asthetics on Bootsnipp.com */
body { 
    margin-top:20px;
    font-family: Arial, sans-serif;
    margin: 0; /* Reset margin to remove any default spacing */
}

/* CSS for Credit Card Payment form */
.credit-card-box .panel-title {
    display: inline;
    font-weight: bold;
}
.credit-card-box .form-control.error {
    border-color: red;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
}
.credit-card-box label.error {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box .payment-errors {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box label {
    display: block;
}
/* The old "center div vertically" hack */
.credit-card-box .display-table {
    display: table;
}
.credit-card-box .display-tr {
    display: table-row;
}
.credit-card-box .display-td {
    display: table-cell;
    vertical-align: middle;
    width: 50%;
}
/* Just looks nicer */
.credit-card-box .panel-heading img {
    min-width: 180px;
}

</style>

</head>
<body>

<script>
        function updatePrice() {
            // Get the selected package value
            var packageSelect = document.getElementById("package");
            var selectedPackage = packageSelect.value;

            // Define package prices
            var packagePrices = {
                "basic": 5000,
                "standard": 12000,
                "premium": 15000
            };

            // Set the price in the payment form
            document.getElementById("price").value = packagePrices[selectedPackage];
        }
    </script>



<!------ Include the above in your HEAD tag ---------->


<!-- Vendor libraries -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4"> <!-- Center the column -->
                <!-- CREDIT CARD FORM STARTS HERE -->
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td">Payment Details</h3>
                            <div class="display-td">
                                <img class="img-responsive pull-right" src="./images/visa.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="payment.php">

                    <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">CARD HOLDER NAME</label>
                                    <input type="text" class="form-control" name="UserName"value="<?php echo $user['name']; ?>" readonly>
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">SELECT A PACKAGE</label>
                                    <select id="package" class="form-control" onchange="updatePrice()">
                                    <option value="basic">Royal Fitness</option>
                                    <option value="standard">Diamond Fitness</option>
                                    <option value="premium">Platinum Fitness</option>
                                </select>
                                </div>
                            </div>                        
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="CardNo"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                            maxlength="16"
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        name="exp_date"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        min="<?php echo date('Y-m-d'); ?>"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cvv"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                        maxlength="3"
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="Amount">AMOUNT</label>
                                    <input type="text" class="form-control" name="Amount" id="price" readonly>
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                            <input type="submit" value="Pay Now" name="submit" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
            
            
        </div>            
        
        

<script>

var $form = $('#payment-form');
$form.find('.subscribe').on('click', payWithStripe);

/* If you're using Stripe for payments */
function payWithStripe(e) {
    e.preventDefault();
    
    /* Abort if invalid form data */
    if (!validator.form()) {
        return;
    }

    /* Visual feedback */
    $form.find('.subscribe').html('Validating <i class="fa fa-spinner fa-pulse"></i>').prop('disabled', true);

    var PublishableKey = 'pk_test_6pRNASCoBOKtIshFeQd4XMUh'; // Replace with your API publishable key
    Stripe.setPublishableKey(PublishableKey);
    
    /* Create token */
    var expiry = $form.find('[name=cardExpiry]').payment('cardExpiryVal');
    var ccData = {
        number: $form.find('[name=cardNumber]').val().replace(/\s/g,''),
        cvc: $form.find('[name=cardCVC]').val(),
        exp_month: expiry.month, 
        exp_year: expiry.year
    };
    
    Stripe.card.createToken(ccData, function stripeResponseHandler(status, response) {
        if (response.error) {
            /* Visual feedback */
            $form.find('.subscribe').html('Try again').prop('disabled', false);
            /* Show Stripe errors on the form */
            $form.find('.payment-errors').text(response.error.message);
            $form.find('.payment-errors').closest('.row').show();
        } else {
            /* Visual feedback */
            $form.find('.subscribe').html('Processing <i class="fa fa-spinner fa-pulse"></i>');
            /* Hide Stripe errors on the form */
            $form.find('.payment-errors').closest('.row').hide();
            $form.find('.payment-errors').text("");
            // response contains id and card, which contains additional card details            
            console.log(response.id);
            console.log(response.card);
            var token = response.id;
            // AJAX - you would send 'token' to your server here.
            $.post('/account/stripe_card_token', {
                    token: token
                })
                // Assign handlers immediately after making the request,
                .done(function(data, textStatus, jqXHR) {
                    $form.find('.subscribe').html('Payment successful <i class="fa fa-check"></i>');
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    $form.find('.subscribe').html('There was a problem').removeClass('success').addClass('error');
                    /* Show Stripe errors on the form */
                    $form.find('.payment-errors').text('Try refreshing the page and trying again.');
                    $form.find('.payment-errors').closest('.row').show();
                });
        }
    });
}
/* Fancy restrictive input formatting via jQuery.payment library*/
$('input[name=cardNumber]').payment('formatCardNumber');
$('input[name=cardCVC]').payment('formatCardCVC');
$('input[name=cardExpiry').payment('formatCardExpiry');

/* Form validation using Stripe client-side validation helpers */
jQuery.validator.addMethod("cardNumber", function(value, element) {
    return this.optional(element) || Stripe.card.validateCardNumber(value);
}, "Please specify a valid credit card number.");

jQuery.validator.addMethod("cardExpiry", function(value, element) {    
    /* Parsing month/year uses jQuery.payment library */
    value = $.payment.cardExpiryVal(value);
    return this.optional(element) || Stripe.card.validateExpiry(value.month, value.year);
}, "Invalid expiration date.");

jQuery.validator.addMethod("cardCVC", function(value, element) {
    return this.optional(element) || Stripe.card.validateCVC(value);
}, "Invalid CVC.");

validator = $form.validate({
    rules: {
        cardNumber: {
            required: true,
            cardNumber: true            
        },
        cardExpiry: {
            required: true,
            cardExpiry: true
        },
        cardCVC: {
            required: true,
            cardCVC: true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error').addClass('success');
    },
    errorPlacement: function(error, element) {
        $(element).closest('.form-group').append(error);
    }
});

paymentFormReady = function() {
    if ($form.find('[name=cardNumber]').hasClass("success") &&
        $form.find('[name=cardExpiry]').hasClass("success") &&
        $form.find('[name=cardCVC]').val().length > 1) {
        return true;
    } else {
        return false;
    }
}

$form.find('.subscribe').prop('', true);
var readyInterval = setInterval(function() {
    if (paymentFormReady()) {
        $form.find('.subscribe').prop('disabled', false);
        clearInterval(readyInterval);
    }
}, 250);
</script>


</body>
    
</html>