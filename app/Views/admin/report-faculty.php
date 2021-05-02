<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Faculty Evaluation</title>
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
						<div class="sub-menu">
							<a href="/admin/faculty/add" class="sub-item"> Faculty </a>
							<a href="/admin/student/add" class="sub-item"> Student </a>
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
                        <div class="sub-menu" style="display: block;">
                            <a href="/admin/report/faculty" class="sub-item active"> Faculty Evaluation </a>
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

				Dashboard
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
            location.href = '/admin/report/faculty/' + $('#selection').val();
        });
    });
</script>

</html>