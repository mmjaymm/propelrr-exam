<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propelrr</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mx-auto p-5">
        <div class="card">
            <div class="card-header text-center">
                Form
            </div>
            <div class="card-body">
                <form id="profileForm" method="post">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobileNumber" class="form-label">Mobile Number (PH format):</label>
                        <input type="tel" class="form-control" placeholder="e.g., +639XXXXXXXXX or 09XXXXXXXXX" id="mobileNumber" name="mobileNumber" pattern="(\+63|0)[9]\d{9}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" onkeydown="return false" required onchange="computeAge()">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>

</html>