<html>

<head>
    <meta charset="UTF-8">
    <title>Faculty Feedback</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        tr td:last-child {
            display: table-cell;
        }

        tr td.fixed-sm {
            width: 50px;
        }

        input[type='radio'] {
            transform: scale(2);
        }
    </style>
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
                    <a href="/faculty"><span class="las la-tachometer-alt"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/faculty/feedback" class="active"><span class="las la-clipboard-list"></span>
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
            <div class="container">

                <div class="card">
                    <div style="padding-top:10px" class="card-body">

                        <h1>Faculty Evaluation</h1>

                        <hr>

                        <form method="POST" action="<?= site_url('/faculty/feedback') ?>">

                            <select id="selection" class="custom-select" name="evaluatee">
                                <?php if ($faculties) : ?>
                                    <?php foreach ($faculties as $f) : ?>
                                        <option value="<?php echo $f['id']; ?>"><?php echo implode(' ', array($f['first_name'], $f['middle_name'], $f['last_name'])); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <hr>

                            <div class="row">
                                <div class="col-sm-6"><b>Academic Year:</b> 2020-2021</div>
                                <div class="col-sm-6"><b>Semester:</b> 1st Semester</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><b>Total Faculty Evaluated:</b> <?php echo $evaluated; ?></div>
                            </div>

                            <hr>

                            <p><b>Rating Legend:</b> 5 = Strongly Agree 4 = Agree 3 = Uncertain 2 = Disagree 1 = Strongly Disagree</p>

                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr class="table-active">
                                        <td><b>Criteria 1</b> - Observation with co-faculty</td>
                                        <td class="fixed-sm text-center">5</td>
                                        <td class="fixed-sm text-center">4</td>
                                        <td class="fixed-sm text-center">3</td>
                                        <td class="fixed-sm text-center">2</td>
                                        <td class="fixed-sm text-center">1</td>
                                    </tr>
                                    <tr>
                                        <td><b>Question 1:</b> Does he/she attentive and attends department meetings on time?</td>
                                        <td class="text-center">
                                            <input type="radio" name="q1" id="q1rate5" value="5" checked>
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q1" id="q1rate4" value="4">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q1" id="q1rate3" value="3">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q1" id="q1rate2" value="2">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q1" id="q1rate1" value="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Question 2:</b> Does he/she updates all the students concern or problems?</td>
                                        <td class="text-center">
                                            <input type="radio" name="q2" id="q2rate5" value="5" checked>
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q2" id="q2rate4" value="4">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q2" id="q2rate3" value="3">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q2" id="q2rate2" value="2">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q2" id="q2rate1" value="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Question 3:</b> Does he/she created his/her modules to teach the students?</td>
                                        <td class="text-center">
                                            <input type="radio" name="q3" id="q3rate5" value="5" checked>
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q3" id="q3rate4" value="4">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q3" id="q3rate3" value="3">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q3" id="q3rate2" value="2">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q3" id="q3rate1" value="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Question 4:</b> Does he/she wearing department uniform during the time of class?</td>
                                        <td class="text-center">
                                            <input type="radio" name="q4" id="q4rate5" value="5" checked>
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q4" id="q4rate4" value="4">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q4" id="q4rate3" value="3">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q4" id="q4rate2" value="2">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q4" id="q4rate1" value="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Question 5:</b> Does he/she reported the accomplishments of the students requirements on time?</td>
                                        <td class="text-center">
                                            <input type="radio" name="q5" id="q5rate5" value="5" checked>
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q5" id="q5rate4" value="4">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q5" id="q5rate3" value="3">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q5" id="q5rate2" value="2">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="q5" id="q5rate1" value="1">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div style="float: right;">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

</html>