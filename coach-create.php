<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>user create</title>
    <script>
        function validatePhoneNumber() {
            var phone = document.getElementById('phone').value;
            if (phone.length !== 10) {
                alert('Phone number must be 10 digits long.');
                return false;
            }
            return true;
        }

        function validateNIC() {
            var nic = document.getElementById('nic').value;
            if (nic.length !== 12) {
                alert('NIC number must be 12 digits long.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Coach Add 
                            <a href="coachdash.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="coach-code.php" method="POST">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">

                                <label>Coaching Type</label>
                                <select name="coaching_type" id="coaching_type" class="form-control" required>
                                    <option value="" disabled selected>Select Coaching Type</option>
                                    <option value="zumba">Zumba</option>
                                    <option value="martial_art">Martial Art </option>
                                    <option value="martial_art">Yoga </option>
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" maxlength="10" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>NIC</label>
                                <input type="text" name="nic" id="nic" maxlength="12" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_coach" class="btn btn-primary">Save coach</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

