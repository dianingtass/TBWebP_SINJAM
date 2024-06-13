<!-- TEMPLATE NAVBAR -->
        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">SINJAM<span>UPNVJ</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
						<li><a class="nav-link" href="cekKetersediaan.php">Jadwal</a></li>
						<li><a class="nav-link" href="formPeminjaman.php">Peminjaman</a></li>
						<li><a class="nav-link" href="feedback.php">Feedback</a></li>
						<li><a class="nav-link" href="FAQ.php">FAQ</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="profile.php"><img src="images/user.svg"></a></li>
					</ul>
				</div>
			</div>	
		</nav>

<!-- CSS NAVBAR -->
<style>
.custom-navbar {
  font-family: 'Gotham';
  background: #208aae !important;
  padding-top: 20px;
  padding-bottom: 20px; }
  .custom-navbar .navbar-brand {
    font-size: 32px;
    font-weight: 600; }
    .custom-navbar .navbar-brand > span {
      opacity: .5; 
      font-weight: 100;}
  .custom-navbar .navbar-toggler {
    border-color: transparent; }
    .custom-navbar .navbar-toggler:active, .custom-navbar .navbar-toggler:focus {
      -webkit-box-shadow: none;
      box-shadow: none;
      outline: none; }
  @media (min-width: 992px) {
    .custom-navbar .custom-navbar-nav li {
      margin-left: 15px;
      margin-right: 15px; } }
  .custom-navbar .custom-navbar-nav li a {
    font-weight: 500;
    color: #ffffff !important;
    opacity: .5;
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    position: relative; }
    @media (min-width: 768px) {
      .custom-navbar .custom-navbar-nav li a:before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 8px;
        right: 8px;
        background: #0d2149;
        height: 4px;
        opacity: 1;
        visibility: visible;
        width: 0;
        border-radius: 2px;
        -webkit-transition: .15s all ease-out;
        -o-transition: .15s all ease-out;
        transition: .15s all ease-out; } }
    .custom-navbar .custom-navbar-nav li a:hover {
      opacity: 1; }
      .custom-navbar .custom-navbar-nav li a:hover:before {
        width: calc(100% - 16px); }
  .custom-navbar .custom-navbar-nav li.active a {
    opacity: 1; }
    .custom-navbar .custom-navbar-nav li.active a:before {
      width: calc(100% - 16px); }
  .custom-navbar .custom-navbar-cta {
    margin-left: 0 !important;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row; }
    @media (min-width: 768px) {
      .custom-navbar .custom-navbar-cta {
        margin-left: 40px !important; } }
    .custom-navbar .custom-navbar-cta li {
      margin-left: 0px;
      margin-right: 0px; }
      .custom-navbar .custom-navbar-cta li:first-child {
        margin-right: 20px; }
</style>

<!-- TEMPLATE FOOTER -->
