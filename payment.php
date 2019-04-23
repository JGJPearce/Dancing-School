<?php require('include/topTemplate.php'); 

// get the database connection
require('include/db.php');

// get the payment class
require('class/Payment.class.php');

// get all students who paid
$payments = $db->query("SELECT * FROM Payment"); 
?>
<!-- Main Content -->
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <h2> Payment page </h2>
                <!-- First Name-->
                <form id="paymentForm" action="studentPayment.php" method="post"></br>
                    <div class="form-group">
                        <!-- <input type="hidden" class="form-control" name="Payer_id" id="Payer_id" value="<?php print rand(); ?>"> -->

                        <label for="Payer_ID" class="col-sm-4 control-label"> Student ID </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Payer_ID" name="Payer_ID" placeholder="Input Student ID" required>
                        </div>	
                    </div></br>

                    </br>
                    </br>

                    <div class="form-group">
                        <label for="paymentAmount" class="col-sm-4 control-label">Payment Method: </label>
                        <div class="col-sm-8">
                            <input type="radio" name="method" id="method" value="Card" required> Debit / Credit Card</br>
                            <input type="radio" name="method" id="method" value="Cash" > Cash</br>
                            <input type="radio" name="method" id="method" value="Cheque" > Cheque</br>
                            </br>
                        </div>
                    </div>
                    </br>

                <div class="form-group">
                    <label for="paymentAmount" class="col-sm-4 control-label">Amount paid in &#163 : </label>
                    <div class="col-sm-8">
                        <input  id="paymentAmount" class="form-control" type="number" name="paymentAmount" placeholder="Enter Amount" min ="0" step = "any" required >
                        </br>
                    </div>



                        <input type="submit" class="btn btn-primary" value ="Submit">
                 </div>        

                </form>	

            </div>


        <div class = "students">	
            <!-- payment list -->
            <div id="payment-list" class="row">
            <h2>Payments so far</h2>
                <!-- list-group -->
                <div class="list-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <table data-url="data1.json" data-height="299" data-show-columns="true">
                                <thead>
                                    <tr>
                                        <th data-field ="id" class="col-md-3"data-halign="right" data-align="center">Payer id </th>
                                        <th data-field="name"class="col-md-3" data-halign="center" data-align="left"> Date</th>
                                        <th data-field="gender"class="col-md-3" data-halign="left" data-align="right">Pay Method</th>
                                        <th data-field="email"class="col-md-3" data-halign="left" data-align="right">Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // iterate through each student and create a readable list
                                    while($payment = $payments->fetch_object('Payment')): ?>
                                        <tr id="tr_id_1" class="tr-class-1">
                                            <td id="td_id_1" class="td-class-1"><?=$payment->Payer_ID?></td>
                                            <td> <?=$payment->Date?></td>
                                            <td> <?=$payment->Pay_Method?></td>
                                            <td> <?=$payment->Amount?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                     </div>
                </div><!-- /list-group -->   

            </div><!-- /payment list -->

        </div><!-- /student list -->
    </div>
</div>
<?php require('include/bottomTemplate.php'); ?>