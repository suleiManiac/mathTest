<?php

require_once('../private/initialize.php');
$page_title = " Addition";

if (is_request_post()) {
    

    $test_result = [];
    $correct_answers =  $_POST['corr_ans'];
    $user_answers = $_POST['user_ans'];
    $length = count($correct_answers);
    $answer_count = 0;
    $test_type = 1;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 2;
    
    for ($i = 0; $i < $length; $i++) {
        if ($correct_answers[$i] === $user_answers[$i]) $answer_count++;
    }

    $test['score'] = $answer_count;
    $test['test_type'] = $test_type;
    $test['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

    $result = insert_test($db, $test);

    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/index.php'));
    }
    else {
        $errors = $result;
    }


}

include(SHARED_PATH . '/header.php');
?>
<?php include(SHARED_PATH . '/sidebar.php');?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-primary">Addition</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div> -->
    </div>
    <div class="container d-flex justify-content-center">
        <form action="addition.php" method="post">
            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">01. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">02. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">03. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">04. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">05. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">06. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">07. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">08. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">09. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 + $num2; ?>">
            </div>


            <div class="row form-group">
                <?php 
                    $num1 = rand(0, 1000);
                    $num2 = rand(0, 1000);
                ?>
                <label for="">10. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">+</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 - $num2; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary btn-lg">
            </div>
        </form>
    </div>
</main>
</div>
</div>

<?php include(SHARED_PATH . '/footer.php');?>