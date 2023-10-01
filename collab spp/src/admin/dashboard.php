<?php
session_start();
if (!isset($_SESSION['username'])&!isset($_SESSION['password'])) {
    header("location:../index1.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fonts -->
    <link rel="import" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;800;900&display=swap" />
    <!-- styling css -->
    <link rel="stylesheet" href="../../style/styles.css" />

    <!-- Boxicons css -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <title>Dashboard</title>
</head>

<body>
    <div class="navbar">
        <ul class="menu-links">
            <li class="nav-link">
                <i class='bx bx-credit-card-front icon'></i>
                <span class="text nav-text">CARD PAYMENT</span>
            </li>
        </ul>
    </div>
    <nav class="sidebar close">
        <header>
            <div class="users">
                <!-- <div class="userDisplay">
        <span class="fotoDisplay">
          <div class="foto-user"></div>
        </span>
        <div class="nameDisplay">
          <h5 >Nama   : ${displayName}</h5>
          <h5 >Email : ${email}</h5>
          <h5 >UID    : ${uid}</h5>
        </div>
      </div> -->
            </div>
            <i class="bx bx-chevron-right toggle"></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#" data-target="Dashboard">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" data-target="TopUp">
                            <i class='bx bx-card icon'></i>
                            <span class="text nav-text">TopUp</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" data-target="Payment">
                            <i class='bx bx-credit-card-front icon'></i>
                            <span class="text nav-text">Payment</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" data-target="Register">
                            <i class='bx bx-edit icon'></i>
                            <span class="text nav-text">Register</span>
                        </a>
                    <li class="nav-link">
                        <a href="#" data-target="Manage">
                            <i class='bx bx-receipt icon'></i>
                            <span class="text nav-text">Manager Account</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" id="logout">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">LOGOUT</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <section class="about" id="Dashboard">
            <h1>Selamat datang di Dashboard Admin!</h1>
            <div class="table-container">
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>ID Kartu</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Register Number</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody data-firebase="data-result"></tbody>
                </table>
            </div>
        </section>


        <section class="about" id="TopUp" style="display: none;">
            <h1>Menu TopUp</h1>
            <div class="col-sm-10">
                <!-- form topup -->
                <section class="form-daf" id="form-daf">
                    <div class="form-input-container">
                        <label for="id">ID Kartu:</label>
                        <input type="text" class="form-input" id="TAG_IDTopup" name="id" required disabled /><br />
                        <br />
                        <div class="cta-daf-container">
                            <button class="cta-daf get-id-button" data-button="getIDTopup">Get ID</button>
                        </div>

                        <label for="nominal">Nominal TopUp:</label>
                        <input type="text" class="form-input" id="nominalTopup" name="nominalTopup" required /><br />
                        <br />

                        <div class="cta-daf-container">
                            <input type="submit" class="cta-daf" name="submit" id="topupSub" value="Submit" />
                        </div>
                    </div>
                </section>
            </div>
        </section>


        <section class="about" id="Payment" style="display: none;">
            <h1>Menu Payment</h1>
            <div class="col-sm-10">
                <!-- form topup -->
                <section class="form-daf" id="form-daf">
                    <div class="form-input-container">
                        <label for="id">ID Kartu:</label>
                        <input type="text" class="form-input" id="TAG_IDPayment" name="id" required disabled /><br />
                        <br />
                        <div class="cta-daf-container">
                            <button class="cta-daf get-id-button" data-button="getIDPayment">Get ID</button>
                        </div>

                        <label for="nominal">Nominal Pembayaran:</label>
                        <input type="text" class="form-input" id="nominalPayment" name="nominalPayment" required /><br />
                        <br />

                        <div class="cta-daf-container">
                            <input type="submit" class="cta-daf" name="submit" id="paymentSub" value="Submit" />
                        </div>
                    </div>
                </section>
            </div>
        </section>


        <section class="about" id="Register" style="display: none;">
            <h1>Menu Register</h1>
            <div class="col-sm-10">
                <!-- form topup -->
                <section class="form-daf" id="form-daf">
                    <div class="regist form-input-container">
                        <label for="email">Email:</label>
                        <input type="text" class="form-input-regist" id="email" name="email" required /><br />
                        <br />
                        <label for="idKartu">ID Kartu:</label>
                        <input type="text" class="form-input-regist" id="idKartu" name="idKartu" required disabled /><br />
                        <br />
                        <div class="cta-daf-container">
                            <button class="cta-daf get-id-button" data-button="getIDcard">Get ID</button>
                        </div>
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-input-regist" id="nama" name="nama" required /><br />
                        <br />
                        <label for="noHp">No HP:</label>
                        <input type="number" class="form-input-regist" id="noHp" name="noHp" required /><br />
                        <br />
                        <label for="regNum">Register Number:</label>
                        <input type="number" class="form-input-regist" id="regNum" name="regNum" required /><br />
                        <br />
                        <label for="saldo">Saldo:</label>
                        <input type="number" class="form-input-regist" id="saldo" name="saldo" required /><br />
                        <br />

                        <div class="cta-daf-container">
                            <input type="submit" class="cta-daf" name="submit" id="registSub" value="Submit" />
                        </div>
                    </div>
                </section>
            </div>
        </section>


        <section class="about" id="Manage" style="display: none;">
            <h1>Menu Manager Account</h1>
            <div class="table-manage">
                <table cellspacing="0" id="manage-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>ID Kartu</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Register Number</th>
                            <th>Saldo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody data-firebase="data-manage"></tbody>
                </table>
            </div>
        </section>
    </div>

</body>

</html>