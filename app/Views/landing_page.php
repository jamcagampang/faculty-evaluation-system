<!DOCTYPE html>
<html lang="en">

<head>
    <title>Faculty Evaluation System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/lp.css">
</head>

<body>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0" style="height: 650px">
            <div class="row d-flex" style="height: 575px;">
                <div class="col-lg-6">
                    <div class="card1 pb-5" style="background-color:#27373E; height: 576px;">
                        <div class="text-center">
                            <img src="images/logo.png">
                        </div>
                        <div class="roow px-3 justify-content-center mt-4 mb-5 border-line" style="border-right-width: 0px;">
                            <h1>FACULTY <br>EVALUATION <br> SYSTEM</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="<?= site_url('/login') ?>">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <h6 class="mb-0 mr-4 mt-2">Welcome, please sign in to continue.</h6>
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="line"></div>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label>
                                <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address">
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" name="password" placeholder="Enter password">
                            </div>
                            <br>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Log in as:</h6>
                                </label>
                                <select name="type" id="type" class="form-control">
                                    <option value="0">Admin</option>
                                    <option value="1">Faculty</option>
                                    <option value="2">Student</option>
                                </select>
                            </div>
                            <br>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                            </div>
                            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-notblue py-4">
                <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. MIRANDA-SALAZAR-BLANCA.</small>
                    <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
                </div>
            </div>
        </div>
    </div>

</body>