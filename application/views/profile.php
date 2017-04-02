

<?php include("Template/header.php") ;

if($this->session->flashdata('login'))
    echo $this->session->flashdata('login');
?>
<section id="slider">
    <!--slider-->
    <div class="container">
        <?php    if($this->session->userdata('logged_in'))
        {
            ?>
            <h2>Welcome back, <?php echo $customerDetails->contactFirstName; ?> </h2>
            <table class="table">
                <tr>
                    <td>Customer Number:</td>
                    <td><?php echo $customerDetails->customerNumber; ?></td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td><?php echo $customerDetails->customerName; ?></td>
                </tr>
                <tr>
                    <td>Contact First Name:</td>
                    <td><?php echo $customerDetails->contactFirstName; ?></td>
                </tr>
                <tr>
                    <td>Contact Last Name:</td>
                    <td><?php echo $customerDetails->contactLastName; ?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo $customerDetails->phone; ?></td>
                </tr>
                <tr>
                    <td>Address Line 1:</td>
                    <td><?php echo $customerDetails->addressLine1; ?></td>
                </tr>
                <tr>
                    <td>Address Line 2:</td>
                    <td><?php echo $customerDetails->addressLine2; ?></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><?php echo $customerDetails->city; ?></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><?php echo $customerDetails->state; ?></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><?php echo $customerDetails->postalCode; ?></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><?php echo $customerDetails->country; ?></td>
                </tr>
                <tr>
                    <td>Credit Limit:</td>
                    <td><?php echo $customerDetails->creditLimit; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $customerDetails->email; ?></td>
                </tr>
            </table>
            <?php
            if(count($custOrder) > 0) {

                ?>
                <br>
                <br>
                <br>
                <hr>
                <h2>Your Order History: </h2>
                <?php

                $count = 0;
                foreach ($custOrder as $order) {
                    $count++;
                } ?>
                <br>
                <?php

                if ($count > 0) {

                    if($order['status'] == "In Process") {

                        ?>
                        <h3>Orders being Processed:</h3>
                        <table class="table">
                        <thead>
                        <tr class="info">
                        <th>View Order</th>
                        <th>Order Date</th>
                        <th>Required Date</th>
                        <th>Shipped Date</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <?php

                        $index = 0;
                        foreach ($custOrder as $order) {
                            $comment = $order['comments'];
                            $data = array(
                                'name' => 'comments',
                                'rows' => '1',
                                'cols' => '20',
                                'class' => 'form-control input-md',
                                'placeholder' => "$comment",
                                'value' => set_value('comments')
                            );

                            ?>
                            <?php switch ($order['status']) {
                                case "In Process":
                                    ?>
                                    <tr>
                                        <td><a href="<?php echo site_url()."/View/viewOrder/{$order['orderNumber']}";?>"><i class="fa fa-eye"><i></a></td>
                                        <td><?php echo $order['orderDate']; ?></td>
                                        <td><?php echo $order['requiredDate']; ?></td>
                                        <td><?php echo $order['shippedDate']; ?></td>
                                        <td class="danger"><?php echo $order['status']; ?> </td>
                                        <?php if ($order['comments'] == null){ ?>
                                            <td>No Comment!</td>
                                        <?php } else ?>
                                        <td><?php echo $order['comments']; ?></td>
                                    </tr>
                                    <?php
                                    break;
                            }
                        }
                    }else{

                    }


                    ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>

                    <h3>Shipped Orders: </h3>
                    <table class="table">
                    <thead>
                    <tr class="info">
                        <th>View Order</th>
                        <th>Order Date</th>
                        <th>Required Date</th>
                        <th>Shipped Date</th>
                        <th>Status</th>
                        <th>Comments</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($custOrder as $order) { ?>
                        <?php switch ($order['status']) {
                            case "Shipped":
                                ?>
                                <tr>
                                    <td><a href="<?php echo site_url()."/View/viewOrder/{$order['orderNumber']}";?>"><i class="fa fa-eye"><i></a></td>

                                    <td><?php echo $order['orderDate']; ?></td>
                                    <td><?php echo $order['requiredDate']; ?></td>
                                    <td><?php echo $order['shippedDate']; ?></td>
                                    <td class="success"><?php echo $order['status']; ?> </td>
                                    <?php if ($order['comments'] == null){ ?>
                                        <td>No Comment!</td>
                                    <?php } else ?>
                                    <td> <?php echo $order['comments'] ?></td>
                                </tr>
                                <?php
                                break;
                        }
                    }
                }
                ?>
                </tbody>
                </table>
                <br>
                <br>
                <br>
                <br>

                <?php

            } } else { ?>
            <h3>Please Login to see you account</h3>
            <a href="<?php echo base_url() ?>index.php/Login/login" class="btn btn-warning"> Login</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php
        } ?>
    </div>
    <?php include("Template/footer.php") ?>

