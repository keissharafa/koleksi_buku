<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

      <!-- DASHBOARD -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>

      <!-- KATEGORI -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
          <span class="menu-title">Kategori</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>

      <!-- BUKU -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('buku.index') }}">
          <span class="menu-title">Buku</span>
          <i class="mdi mdi-book-open-page-variant menu-icon"></i>
        </a>
      </li>

      <!-- LOGOUT -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="menu-title">Logout</span>
          <i class="mdi mdi-logout menu-icon"></i>
        </a>
      </li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

    </ul>
  </nav>

  <div class="main-panel">
    <div class="content-wrapper">