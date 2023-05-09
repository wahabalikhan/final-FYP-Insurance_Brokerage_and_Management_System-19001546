<?php
include_once 'header.php';
if (empty($_GET['status'])) {
    session_destroy();
    header('Location:index.php?status=1');
    exit;
}
if (isConsumer()) {
    header("location: consumer_dashboard.php");
}
if (isBroker()) {
    header("location: broker_dashboard.php");
}
if (isAdmin()) {
    header("location: admin_dashboard.php");
}
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Insurance Brokerage Management System</h1>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus veniam atque omnis non, assumenda quaerat repudiandae eos veritatis perspiciatis iste ad consequatur! Voluptates totam quis sit veritatis non quas obcaecati!</p>
        <div class="contain">
            <div class='card' style='width: 18rem; display: inline-block;'>
                <div class='card-body'>
                    <h5 class='card-title'>Service 1</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>Lorem ipsum</h6>
                    <p class='card-text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, fugit veritatis? Odit veritatis eos optio quaerat repellat, facere dignissimos neque.</p>
                </div>
            </div>
            <div class='card' style='width: 18rem; display: inline-block;'>
                <div class='card-body'>
                    <h5 class='card-title'>Service 2</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>Lorem ipsum</h6>
                    <p class='card-text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, fugit veritatis? Odit veritatis eos optio quaerat repellat, facere dignissimos neque.</p>
                </div>
            </div>
            <div class='card' style='width: 18rem; display: inline-block;'>
                <div class='card-body'>
                    <h5 class='card-title'>Service 3</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>Lorem ipsum</h6>
                    <p class='card-text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, fugit veritatis? Odit veritatis eos optio quaerat repellat, facere dignissimos neque.</p>
                </div>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere eligendi commodi laudantium iste quibusdam nihil autem iusto corporis ad? Dolor enim consequatur minus non vel voluptate facere nulla dolorum molestias.</p>
        <h1>FAQs</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, explicabo?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, explicabo?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, explicabo?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, explicabo?</p>
    </main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>