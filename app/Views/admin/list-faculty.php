<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> Faculties </title>
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
						<div class="sub-menu" style="display: block;">
							<a href="/admin/faculty/list" class="sub-item active"> Faculties </a>
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
						<a class="sub-btn"><span class="las la-cogs"></span><span class="name">Settings</span><i class="lar la-arrow-alt-circle-right dropdown"></i></a>
						<div class="sub-menu">
							<a href="/admin/student/shift" class="sub-item"> Shift Students </a>
							<a href="/admin/evaluation/list" class="sub-item"> Manage Questionnaires </a>
						</div>
					</div>
				</li>
				<li>
					<div class="menu">
						<a class="sub-btn"><span class="las la-chart-area"></span><span class="name">Report</span><i class="lar la-arrow-alt-circle-right dropdown"></i></a>
						<div class="sub-menu">
							<a href="/admin/report/list" class="sub-item"> Faculty Evaluation </a>
							<a href="/admin/report/chart" class="sub-item"> Evaluation Chart </a>
							<a href="/admin/report/non-submitted" class="sub-item"> Non-Submitted Students </a>
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

                View
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

            <div class="recent-grid" style="margin-top: 0px;">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Faculties</h3>

                            <button><span class="las la-plus"></span>
                                <a href="/admin/faculty/add" style="color: white;">Add</a>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td> Name </td>
                                            <td> Email </td>
                                            <td> Designation </td>
                                            <td> Department </td>
                                            <td> Last Updated </td>
                                            <td> Action </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($list): ?>
                                        <?php foreach($list as $item): ?>
                                        <tr>
                                            <td> <?php echo implode(' ', array($item['first_name'], $item['middle_name'], $item['last_name'])); ?> </td>
                                            <td> <?php echo $item['email_address']; ?> </td>
                                            <td> <?php echo $item['designation']; ?> </td>
                                            <td> <?php echo $item['department']; ?> </td>
                                            <td> --- </td>
                                            <td>
                                                <button type="button" class="btn btn-labeled btn-edit" style="margin-right: 4px;background-color: var(--main-color); color: white; border:none;padding: 3px 4px;">
                                                    <span class="btn-label"><i class="las la-edit"></i></span>Edit</button>
                                                <button type="button" class="btn btn-labeled btn-danger" style="background-color: 	#DC143C; color: white;border:none;padding: 3px 4px;">
                                                    <span class="btn-label"><i class="las la-trash-alt"></i></span>Delete</button>
                                            </td>
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