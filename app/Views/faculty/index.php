<html>

<head>
    <meta charset="UTF-8">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h3><span class="las la-meteor"></span><span>Faculty Staff</span></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/faculty" class="active"><span class="las la-tachometer-alt"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/faculty/feedback"><span class="las la-clipboard-list"></span>
                        <span>Co-Faculty Feedback</span></a>
                </li>
                <li>
                    <a href="/faculty/result"><span class="las la-university"></span>
                        <span>View Evaluation Result</span></a>
                </li>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper">
                <img src="/images/faculty.png" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $first_name ?> <?php echo $last_name ?></h4>
                    <small>Faculty Staff</small>
                </div>
            </div>
        </header>

        <main>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>15</h1>
                        <span>Total Faculties</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>10</h1>
                        <span>Total Courses</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>6</h1>
                        <span>Total Students</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Activities</h3>

                            <button> See all <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td> Username </td>
                                            <td> Email </td>
                                            <td> Activity </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> danami </td>
                                            <td> dana.mi@student.smcl.edu.ph </td>
                                            <td><span class="status purple"></span> changed password
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> brrrucelee </td>
                                            <td> bruce.lee@smcl.edu.ph </td>
                                            <td><span class="status pink"></span> print report
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> jamsbond </td>
                                            <td> j.bond@admin.smcl.edu.ph </td>
                                            <td><span class="status orange"></span> modified questionnaire
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>

</html>