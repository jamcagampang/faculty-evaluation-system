<html>

<head>
    <meta charset="UTF-8">
    <title>Report</title>
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

        tr td {
            width: calc(100% / 7);
            text-align: center;
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
            <h3><span class="las la-meteor"></span><span>Evaluation Report</span></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/faculty"><span class="las la-tachometer-alt"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/faculty/feedback"><span class="las la-clipboard-list"></span>
                        <span>Co-Faculty Feedback</span></a>
                </li>
                <li>
                    <a href="/faculty/result" class="active"><span class="las la-university"></span>
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

                        <select id="selection" class="custom-select" name="evaluatee">
                            <?php if ($faculties) : ?>
                                <?php foreach ($faculties as $f) : ?>
                                    <option value="<?php echo $f['id']; ?>" <?php if ($f['s']) echo 'selected' ?>><?php echo implode(' ', array($f['first_name'], $f['middle_name'], $f['last_name'])); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <hr>

                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td colspan="5" class="text-center"><b>Criteria 1</b></td>
                                    <td></td>
                                </tr>
                                <tr class="table-active">
                                    <td></td>
                                    <td class="fixed-sm text-center">1</td>
                                    <td class="fixed-sm text-center">2</td>
                                    <td class="fixed-sm text-center">3</td>
                                    <td class="fixed-sm text-center">4</td>
                                    <td class="fixed-sm text-center">5</td>
                                    <td></td>
                                </tr>

                                <?php if ($evaluation) : ?>
                                    <?php foreach ($evaluation as $key => $e) : ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $e['rate_1'] ?></td>
                                            <td><?php echo $e['rate_2'] ?></td>
                                            <td><?php echo $e['rate_3'] ?></td>
                                            <td><?php echo $e['rate_4'] ?></td>
                                            <td><?php echo $e['rate_5'] ?></td>
                                            <td><?php echo $e['mean'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <tr>
                                    <td></td>
                                    <td><?php echo $last_part['0'] ?></td>
                                    <td><?php echo $last_part['1'] ?></td>
                                    <td><?php echo $last_part['2'] ?></td>
                                    <td><?php echo $last_part['3'] ?></td>
                                    <td><?php echo $last_part['4'] ?></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

<script>

    $('document').ready(function (e) {
        $('#selection').change(function (e) {
            location.href = '/faculty/result/' + $('#selection').val();
        });
    });
</script>

</html>