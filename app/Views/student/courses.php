<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>
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
					<a href="/student/course" class="active"><span class="las la-clipboard-list"></span>
						<span>Course</span></a>
				</li>
				<li>
					<a href="/student/feedback"><span class="las la-university"></span>
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
			<div class="recent-grid" style="margin-top: 0px;">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>Courses</h3>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table width="100%">
									<thead>
										<tr>
											<td> Course Code </td>
											<td> Course Name </td>
											<td> Semester </td>
											<td> Batch </td>
										</tr>
									</thead>
									<tbody>
										<?php if ($list) : ?>
											<?php foreach ($list as $item) : ?>
												<tr>
													<td> <?php echo $item['course_code']; ?> </td>
													<td> <?php echo $item['course_name']; ?> </td>
													<td> <?php echo $item['semester']; ?> </td>
													<td> <?php echo $item['batch']; ?> </td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
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