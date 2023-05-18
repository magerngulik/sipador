<nav class="navbar navbar-expand-lg navbar-light"  data-bs-theme="dark" style="background-color: #26C4C3;">
        <div class="container">
            <a  class="navbar-brand" href="<?= base_url('member') ?>">Pondok Pendaki</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-dark">
              <li class="nav-item">
                <a class="nav-link <?=($tag ==="produk")?'active':'' ?>" aria-current="page" href="<?= base_url('member/produk') ?>">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  <?=($tag ==="history")?'active':'' ?>" href="<?= base_url('member/history') ?>">Riwayat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?=($tag ==="card")?'active':'' ?>" href="<?= base_url('member/card') ?>">Keranjang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?=($tag ==="user")?'active':'' ?>" href="<?= base_url('member/user') ?>">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?=($tag ==="about")?'active':'' ?>" href="<?= base_url('member/about') ?>">Tentang</a>
              </li>

            </ul>
          </div>
        </div>
</nav>