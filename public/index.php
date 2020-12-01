<?php

require_once('../private/initialize.php');
$page_title = ' Dashboard';
include(SHARED_PATH . '/header.php');
include(SHARED_PATH . '/sidebar.php');

$test_set = get_all_tests($db);
?>



            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-primary">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Welcome <?php echo $_SESSION['name']; ?></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
                </div>
            </div>

            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
            <?php 
            $test_type = [
                "Addition",
                "Subtraction",
                "Multiplication",
                "Division",
                "Random"
            ];
            ?>
            <h2>All Tests</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Score</th>
                    <th>Test Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($rows = mysqli_fetch_assoc($test_set)) { ?>
                    <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['user_id'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['score'];?></td>
                    <td><?php echo $test_type[$rows['id'] - 1];?></td>
                    </tr>
                <?php }?>
                </tbody>
                </table>
            </div>
        </main>
        </div>
        </div>

<?php include(SHARED_PATH . '/footer.php');?>