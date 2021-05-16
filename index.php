<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Experts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;400;500;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/467085cb8c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="header-container">
            <div class="nav">
                <div class="logo-section">
                    <h2 class="logo-text">Track Expert</h2>
                </div>
                <div class="menu-items">
                    <li class="menu-item dropdown" >
                        <a class="dropdown-toggle" type="button" id="quick_start_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Quick Start
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="quick_start_dropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                    </li>
                    <li class="menu-item">
                        <span>
                            Tracking
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>
                            Shipping
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>
                            Services
                        </span>
                    </li>
                    <li class="menu-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown button
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                          </div>
                    </li>
                </div>
            </div>
            <div class="hero-text">
                Transform the way you <br>move your freights
            </div>
            <form method="post" action="track_package.php" name="">
                <div class="track-package">
                    <input class="track-package-input" type="text" name="tracking_no" placeholder="Tracking #xxxx-xxxx-xxxx-xxxxx">
                    <button class="track-package-button" name="track_package">Track Package </button>
                </div>
            </form>
            <div class="ql-container">
                <div class="ql-sub-container">
                    <div class="ql-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="ql-title">
                        Create a<br> Shipment
                    </div>
                </div>
                <div class="ql-sub-container">
                    <div class="ql-icon">
                        <i class="fas fa-map-signs"></i>
                    </div>
                    <div class="ql-title">
                        Change my<br> delivery
                    </div>
                </div>
                <div class="ql-sub-container">
                    <div class="ql-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="ql-title">
                        Schedule a <br> Pickup
                    </div>
                </div>
        </div>
        </div>
    </div>
    <div class="logistics-solution">
        <div class="ls-title">
            Logistical Solutions
        </div>
        <div class="ls-container">
            <div class="ls-container-sub">
                <div class="card ls-card">
                    <div>
                        <img src="assets/warehouse.jpg" class="card-img-top card-img" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Warehouse Solutions</h5>
                        <div>
                            <ul class="card-list">
                                <li>Small and Medium Size Package</li>
                                <li>Enterprise Package</li>
                            </ul>
                        </div>
                      </div>
                </div>
                <div class="card ls-card">
                    <img src="assets/distribution.jpg" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Transport and Distribution</h5>
                        <div>
                            <ul class="card-list">
                                <li>Transportation Management for Small and Medium Size Package</li>
                                <li>Transportation Management for Enterprise Package</li>
                            </ul>
                        </div>
                      </div>
                </div>
                <div class="card ls-card">
                    <img src="assets/contract.jpg" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Contract Logistics</h5>
                        <div>
                            <ul class="card-list">
                                <li>Read More about contract and logistics</li
                            </ul>
                        </div>
                      </div>
                </div>
            </div>
            
            <div class="shipping-services">
                <span class="ss-item"><i class="fas fa-plane-departure"></i></span>
                <span class="ss-item"><i class="fas fa-shipping-fast"></i></span>
                <span class="ss-item"><i class="fas fa-water"></i></span>
                <span class="ss-item"><i class="fas fa-hiking"></i></span>
                <span class="ss-item"><i class="fas fa-trailer"></i></span>
            </div>
        </div>
    </div>
    <div class="control-info">
        <div class="ci-title">
            Need to Return it?
        </div>
        <div class="ci-container">
            <div class="ci-info">
                <div class="ci-message-box">
                    <div class="ci-sub-title">
                        We Make It Easy
                    </div>
                    <div class="ci-message">
                        Take your pre-labeled package to a Track Expect Access Point® location and let us take care of it for you.
                    </div>
                </div>
                <div class="ci-message-box">
                    <div class="ci-sub-title">
                        Take Control of Your Deliveries
                    </div>
                    <div class="ci-message">
                        With Track Expect My Choice® you decide when and where your packages arrive
                    </div>
                </div>
                <div class="ci-message-box">
                    <div class="ci-sub-title">
                        FAQ
                    </div>
                    <div class="ci-message">
                        We can help. Find the answers at the Track Expect Help and Support Center.
                    </div>
                </div>
            </div>
            <div>
                <img class="ci-image card-img" src="assets/package.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="covid-container">
        <div class="cc-title">
            COVID-19 UPDATES
        </div>
        <p class="cc-message">
            <p>Connecting People, Improving Lives is Deutsche Post DHL Group's mission and guides always our effort to become exemplary corporate citizens.</p>

<p>In this critical global health crisis, our Logistics services and our worldwide network play a critical role, also in saving lives – whether it is by sending emergency medical equipment and supplies to healthcare workers; delivering necessity goods to private customers; or by finding solutions for companies to continue their operations.</p>

<p>Against the backdrop of the global Covid-19 outbreak, Deutsche Post DHL Group business operations are being continuously adapted to mitigate potential impacts. As a globally operating company, epidemic and pandemic risk scenarios are an integral part of the Group's continuous risk planning. The Group follows a holistic management process that enables our business units to ensure the best possible operations for our customers even in an emergency.</p>
<p>
The safety of our employees and customers is paramount. In order to closely monitor and manage the Coronavirus outbreak, a Deutsche Post DHL Group Coronavirus task force has been established, led by the Group’s CEO. The Group’s task force also coordinates with international organizations (such as the WHO, CDC, ECDC and Robert Koch Institute) and provides the necessary information to all employees and relevant operations.</p>
        </div>
    </div>

    <div class="footer">
        <div class="footer-grid">
            <div class="footer-item">
                <div class="footer-item-title">Help Center</div>
                <div class="footer-item-list">
                    <li>Contact Us</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-item-title">Customer Services</div>
                <div class="footer-item-list">
                    <li>Contact Us</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-item-title">Company Info</div>
                <div class="footer-item-list">
                    <li>Contact Us</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                </div>
            </div>
        </div>
        <div class="copyright">2021 © Track Expert. All rights reserved.</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>