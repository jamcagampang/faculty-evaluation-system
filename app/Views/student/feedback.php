<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Faculty Feedback</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
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

<body ng-app="myApp" ng-controller="myCtrl">
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h3><span class="lab la-accusoft"></span><span>Student</span></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/student"><span class="las la-clipboard"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/student/course"><span class="las la-clipboard-list"></span>
                        <span>Course</span></a>
                </li>
                <li>
                    <a href="/student/feedback" class="active"><span class="las la-university"></span>
                        <span>Faculty Feedback</span></a>
                </li>
            </ul>

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
                <img src="/images/student.png" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $first_name ?> <?php echo $last_name ?></h4>
                    <small>Student</small>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="card">
                    <div style="padding-top:10px" class="card-body">

                        <h1>Faculty Evaluation</h1>

                        <hr>

                        <form method="POST" action="<?= site_url('/student/feedback') ?>">

                            <select id="selection" class="custom-select" name="faculty">
                                <?php if ($faculties) : ?>
                                    <?php foreach ($faculties as $f) : ?>
                                        <option value="<?php echo $f['id']; ?>"><?php echo implode(' ', array($f['first_name'], $f['middle_name'], $f['last_name'])); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <br>
                            <br>

                            <select id="selection" class="custom-select" name="course">
                                <?php if ($courses) : ?>
                                    <?php foreach ($courses as $c) : ?>
                                        <option value="<?php echo $c['id']; ?>"><?php echo $c['course_name'] . ' (' . $c['course_code'] . ')'; ?></option>
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

                            <p><b>Rating Legend:</b> 6 = Strongly Agree 5 = Agree 4 = Slightly Agree 3 = Slighthly Disagree 2 = Disagree 1 = Strongly Disagree</p>

                            <?php if ($questionaire) : ?>
                                <?php foreach ($questionaire['criteria'] as $i => $c) : ?>
                                    <table class="table table-bordered table-condensed">
                                        <tbody>
                                            <tr class="table-active">
                                                <td><b>Criteria <?php echo $i + 1 ?></b> - <?php echo $c['name'] ?></td>
                                                <td class="fixed-sm text-center">6</td>
                                                <td class="fixed-sm text-center">5</td>
                                                <td class="fixed-sm text-center">4</td>
                                                <td class="fixed-sm text-center">3</td>
                                                <td class="fixed-sm text-center">2</td>
                                                <td class="fixed-sm text-center">1</td>
                                            </tr>
                                            <?php foreach ($c['questions'] as $j => $q) : ?>
                                                <tr>
                                                    <td><b>Question <?php echo $j + 1 ?>:</b> <?php echo $q ?></td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c<?php echo $i ?>q<?php echo $j ?>" value="6" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c<?php echo $i ?>q<?php echo $j ?>" value="5">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c<?php echo $i ?>q<?php echo $j ?>" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c<?php echo $i ?>q<?php echo $j ?>" value="3">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c<?php echo $i ?>q<?php echo $j ?>" value="2">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c<?php echo $i ?>q<?php echo $j ?>" value="1">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <label for="comment<?php echo $i ?>">Comment:</label>
                                        <textarea id="comment<?php echo $i ?>" class="form-control" name="comment<?php echo $i ?>"></textarea>
                                    </div>
                                    <br>
                                <?php endforeach; ?>
                            <?php endif; ?>

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
<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
        $scope.firstName = "John";
    });
</script>

</html>