<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> Create New Student </title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h3> <span class="lab la-accusoft"></span><span> Faculty Evaluation System </span> </h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/admin"><span class="las la-clipboard"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <div class="menu">
                        <a class="sub-btn"><span class="las la-plus"></span><span class="name">Create</span><i class="lar la-arrow-alt-circle-right dropdown"></i></a>
                        <div class="sub-menu" style="display: block;">
                            <a href="/admin/faculty/add" class="sub-item"> Faculty </a>
                            <a href="/admin/student/add" class="sub-item active"> Student </a>
                            <a href="/admin/course/add" class="sub-item"> Course </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a class="sub-btn"><span class="las la-folder-open"></span><span class="name">View</span><i class="lar la-arrow-alt-circle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a href="/admin/faculty/list" class="sub-item"> Faculties </a>
                            <a href="/admin/student/list" class="sub-item"> Students </a>
                            <a href="/admin/course/list" class="sub-item"> Courses </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a class="sub-btn"><span class="las la-edit"></span><span class="name">Assign</span><i class="lar la-arrow-alt-circle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a href="/admin/faculty/assign" class="sub-item"> Assign Faculty to Courses </a>
                            <a href="/admin/student/assign" class="sub-item"> Assign Student to Courses </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a class="sub-btn"><span class="las la-chart-area"></span><span class="name">Report</span><i class="lar la-arrow-alt-circle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a href="/admin/report/faculty" class="sub-item"> Faculty Evaluation </a>
                            <a href="/admin/report/student" class="sub-item"> Student Evaluation </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //jquery for toggle sub menus
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
            });
        });
    </script>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Create
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper">
                <img src="/images/student.png" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $name ?></h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="container" style="padding-left: 40px">
                <h2> Create New Student </h2>
                <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">

                        <div style="padding-top:10px" class="panel-body">

                            <form id="loginform" class="form-horizontal" role="form" method="POST" action="<?= site_url('/admin/student/add') ?>">

                                <div style="margin-bottom: 10px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="first_name" value="" placeholder=" First Name" style="height: 38.99306px;width: 503.99306px;">
                                </div>

                                <div style="margin-bottom: 10px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="middle_name" value="" placeholder=" Middle Name" style="height: 38.99306px;width: 503.99306px;">
                                </div>

                                <div style="margin-bottom: 10px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="last_name" value="" placeholder=" Last Name" style="height: 38.99306px;width: 503.99306px;">
                                </div>

                                <div style="margin-bottom: 10px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="student_id" value="" placeholder="Student ID" style="height: 38.99306px;width: 503.99306px;">
                                </div>

                                <div style="margin-bottom: 10px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="email_address" value="" placeholder=" Email Address" style="height: 38.99306px;width: 503.99306px;">
                                </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <button class=" button button1" type="submit"> Create </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>

</body>

</html>