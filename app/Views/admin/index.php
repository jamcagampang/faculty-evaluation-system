<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Admin Dashboard</title>
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
					<a href="/admin" class="active"><span class="las la-clipboard"></span><span>Dashboard</span></a>
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
			<div class="cards">

				<div class="card-single">
					<div>
						<h1>54</h1>
						<span>Faculties</span>
					</div>
					<div>
						<span class="las la-users"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
						<h1>23</h1>
						<span>Courses</span>
					</div>
					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
						<h1>124</h1>
						<span>Students</span>
					</div>
					<div>
						<span class="las la-user"></span>
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