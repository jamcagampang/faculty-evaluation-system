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

        tr td.nowrap {
            white-space: nowrap;
        }

        table.eval tr td {
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
                        <?php if (count($evaluation) > 0) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed eval">
                                <tbody>
                                    <tr>
                                        <td class="fixed-sm"></td>
                                        <?php if ($headers) : ?>
                                            <?php foreach ($headers as $h) : ?>
                                                <td class="nowrap" colspan="<?php echo $h['count'] ?>"><?php echo $h['text'] ?></td>
                                                <td class="fixed-sm"></td>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <?php if ($headers) : ?>
                                            <?php foreach ($headers as $h) : ?>
                                                <?php foreach ($h['questions'] as $q) : ?>
                                                    <td class="fixed-sm table-active"><?php echo $q ?></td>
                                                <?php endforeach; ?>
                                                <td class="fixed-sm"></td>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tr>
                                    <?php if ($evaluation) : ?>
                                        <?php foreach ($evaluation as $i => $e) : ?>
                                            <tr>
                                                <td class="table-active"><?php echo $i + 1 ?></td>
                                                <?php foreach ($e as $a) : ?>
                                                    <?php foreach ($a['rate'] as $ans) : ?>
                                                        <td class="fixed-sm"><?php echo $ans ?></td>
                                                    <?php endforeach; ?>
                                                    <td class="fixed-sm table-danger"><b><?php echo $a['average'] ?></b></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td></td>
                                        <?php if ($last_part) : ?>
                                            <?php foreach ($last_part as $i => $p) : ?>
                                                <?php foreach ($p as $r) : ?>
                                                    <td class="fixed-sm"><b><?php echo $r ?></b></td>
                                                <?php endforeach; ?>
                                                <td></td>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <h4>Comments:</h4>
                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <?php if ($comments) : ?>
                                    <?php foreach ($comments as $c) : ?>
                                        <tr>
                                            <td><?php echo $c ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <h4 class="text-center">No evaluation yet.</h4>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

<script>
    $('document').ready(function(e) {
        $('#selection').change(function(e) {
            location.href = '/faculty/result/' + $('#selection').val();
        });
    });
</script>

</html>