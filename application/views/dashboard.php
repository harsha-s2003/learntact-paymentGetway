<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card p-3 border-0 shadow">

                        <h4 class="fw-lighter mb-3">Student Details</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered m-0">
                                <tr>
                                    <td width="180px">Student Name</td>
                                    <td><?= ucfirst($studentfeeD->name);?></td>
                                </tr>
                                <tr>
                                    <td>Student School Name</td>
                                    <td><?= ucfirst($studentfeeD->school);?></td>
                                </tr>
                                <tr>
                                    <td>Register Program Name</td>
                                    <td><?= ucfirst($studentfeeD->program);?></td>
                                </tr>
                                <tr>
                                    <td>Class</td>
                                    <td>
                                        <?php
                                        if($studentfeeD->class==1) {
                                            echo $studentfeeD->class.'st';
                                        } elseif ($studentfeeD->class==2) {
                                            echo $studentfeeD->class.'nd';
                                        } elseif ($studentfeeD->class==3) {
                                            echo $studentfeeD->class.'rd';
                                        } else {
                                            echo $studentfeeD->class.'th';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fees</td>
                                    <td>
                                        <!-- Hidden fields -->
                                        <input type="" name="transactionId" value="<?= $transactionId; ?>">
                                        <input type="" name="atomTokenId"
                                            value="<?= $atomTokenId ? $atomTokenId : ''; ?>">

                                        <form method="post" action="<?= base_url('welcome/dashboard') ?>">
                                            <div class="form-group">
                                                <label>Enter Amount</label>
                                                <!-- <input type="number" step="0.01" name="amount" class="form-control"
                                                    value="<= $amount ?>" required> -->
                                                <?php 
                                                    $programs = $studentfeeD->program; 
                                                    $programArray = explode(',', $programs); 

                                                    $total_fee = 0; 

                                                    foreach ($programArray as $prog) {
                                                        $prog = trim($prog); 
                                                        $feeRow = $this->db->where('program_name', $prog)->get('student_program')->row();
                                                        if ($feeRow) {
                                                            $total_fee += $feeRow->program_fee; 
                                                        }
                                                    }


                                                    $program_fee = $total_fee > 0 ? $total_fee : 0;
                                                    ?>

                                                <input type="number" step="0.01" name="amount" class="form-control"
                                                    value="<?= $program_fee ?>" required>



                                            </div>

                                            <!-- Single button -->
                                            <button type="button" class="btn btn-primary mt-3" onclick="openPay()">
                                                Pay Now
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Required JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Atom payment cdn -->
    <script src="https://pgtest.atomtech.in/staticdata/ots/js/atomcheckout.js"></script>

    <!-- <script>
    function openPay() {
        let amount = document.getElementById("amount").value;

        if (amount === "" || amount <= 0) {
            alert("Please enter a valid amount before proceeding.");
            return false;
        }
        const options = {
            "atomTokenId": "<?= $atomTokenId ?>",
            "merchId": "446442",
            // "custEmail": " $studentfeeD->email ?>", 
            // "custMobile": <"?= $studentfeeD->mobile ?>", 
            "custEmail": "sagar.gopale@atomtech.in",
            "custMobile": "8976286911",
            "returnUrl": "<?= site_url('welcome/response'); ?>"
        }
        let atom = new AtomPaynetz(options, 'uat');
    }
    </script> -->

    <script>
    function openPay() {
        let amount = document.querySelector('input[name="amount"]').value;

        if (!amount || amount <= 0) {
            alert("Please enter a valid amount");
            return;
        }

        // Store amount temporarily using AJAX to server session
        $.ajax({
            url: "<?= site_url('welcome/store_amount') ?>",
            method: "POST",
            data: {
                amount: amount
            },
            success: function(response) {
                // Now call AtomPay
                const options = {
                    "atomTokenId": "<?= $atomTokenId ?>",
                    "merchId": "446442",
                    "custEmail": "sagar.gopale@atomtech.in",
                    "custMobile": "8976286911",
                    "returnUrl": "<?= site_url('welcome/response'); ?>",
                    // "returnUrl": "https://www.learntact.in/welcome/response",
                    "amount": amount
                };
                let atom = new AtomPaynetz(options, 'uat');
                atom.pay();
            }
        });
    }
    </script>

</body>

</html>