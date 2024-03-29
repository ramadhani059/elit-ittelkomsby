@extends('layout.admin')

@section('search-navbar')

{{-- <div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <iconify-icon icon="bx:search" class="fs-4 lh-0"></iconify-icon>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
</div> --}}

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <span class="badge bg-primary">
                        <iconify-icon icon="bxs:user" style="color: white; font-size: 23px"></iconify-icon>
                    </span>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt3"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <iconify-icon icon="bx:dots-vertical-rounded"></iconify-icon>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Export</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">User Verified</span>
                <h3 class="card-title mb-2">{{ $anggota_verify->count() }} Orang</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <span class="badge bg-secondary">
                        <iconify-icon icon="bxs:book-alt" style="color: white; font-size: 23px"></iconify-icon>
                    </span>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt3"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <iconify-icon icon="bx:dots-vertical-rounded"></iconify-icon>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Export</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Book</span>
                <h3 class="card-title mb-2">{{ $buku->count() }} buku</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <span class="badge bg-danger">
                        <iconify-icon icon="bxs:donate-heart" style="color: white; font-size: 23px"></iconify-icon>
                    </span>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt3"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <iconify-icon icon="bx:dots-vertical-rounded"></iconify-icon>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Export</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Unprocessed Donations</span>
                <h3 class="card-title mb-2">{{ $donasi->count() }} Buku</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- Graphic --}}
    {{-- <div class="row">
      <!-- Expense Overview -->
      <div class="col-md-12 col-lg-12 order-1 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between mb-4">
                <h5 class="card-title m-0 me-2">Trends Overview</h5>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="transactionID"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <iconify-icon icon="bx:dots-vertical-rounded"></iconify-icon>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                    <div id="incomeChart"></div>
                </div>
                </div>
            </div>
        </div>
      </div>
      <!--/ Expense Overview -->
    </div> --}}
</div>

@endsection

