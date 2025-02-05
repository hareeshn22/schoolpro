@extends('layouts.admin')

@section ('title') Dashboard @endsection

@section('css')



@endsection

@section('content')
<div class="row">
    <!-- Row #1 -->
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
            <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                <div class="d-none d-sm-block">
                    <i class="fa fa-shopping-bag fa-2x opacity-25"></i>
                </div>
                <div>
                    <div class="fs-3 fw-semibold">1500</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Sales</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
            <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                <div class="d-none d-sm-block">
                    <i class="fa fa-wallet fa-2x opacity-25"></i>
                </div>
                <div>
                    <div class="fs-3 fw-semibold">$780</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Earnings</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
            <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                <div class="d-none d-sm-block">
                    <i class="fa fa-envelope-open fa-2x opacity-25"></i>
                </div>
                <div>
                    <div class="fs-3 fw-semibold">15</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Messages</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
            <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                <div class="d-none d-sm-block">
                    <i class="fa fa-users fa-2x opacity-25"></i>
                </div>
                <div>
                    <div class="fs-3 fw-semibold">4252</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Online</div>
                </div>
            </div>
        </a>
    </div>
    <!-- END Row #1 -->
</div>

<div class="row">
    <!-- Row #3 -->
    <div class="col-md-4">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <div class="mb-3">
                        <i class="fa fa-envelope-open fa-4x text-primary"></i>
                    </div>
                    <div class="fs-4 fw-semibold">9.25k Subscribers</div>
                    <div class="text-muted">Your main list is growing!</div>
                    <div class="pt-3">
                        <a class="btn btn-alt-primary" href="javascript:void(0)">
                            <i class="fa fa-cog opacity-50 me-1"></i> Manage list
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <div class="mb-3">
                        <i class="fa fab fa-twitter fa-4x text-info"></i>
                    </div>
                    <div class="fs-4 fw-semibold">+36 followers</div>
                    <div class="text-muted">You are doing great!</div>
                    <div class="pt-3">
                        <a class="btn btn-alt-info" href="javascript:void(0)">
                            <i class="fa fa-users opacity-50 me-1"></i> Check them out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <div class="mb-3">
                        <i class="fa fa-check fa-4x text-success"></i>
                    </div>
                    <div class="fs-4 fw-semibold">Business Plan</div>
                    <div class="text-muted">This is your current active plan</div>
                    <div class="pt-3">
                        <a class="btn btn-alt-success" href="javascript:void(0)">
                            <i class="fa fa-arrow-up opacity-50 me-1"></i> Upgrade to VIP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Row #3 -->
</div>

<div class="row">
    <!-- Row #4 -->
    <div class="col-md-6">
        <a class="block block-rounded block-link-shadow overflow-hidden" href="javascript:void(0)">
            <div class="block-content block-content-full">
                <i class="si si-briefcase fa-2x opacity-25"></i>
                <div class="row g-5 py-3">
                    <div class="col-6 text-end border-end">
                        <div>
                            <div class="fs-3 fw-semibold">16</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Projects</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <div class="fs-3 fw-semibold">2</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Active</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a class="block block-rounded block-link-shadow overflow-hidden" href="javascript:void(0)">
            <div class="block-content block-content-full">
                <div class="text-end">
                    <i class="si si-users fa-2x opacity-25"></i>
                </div>
                <div class="row g-5 py-3">
                    <div class="col-6 text-end border-end">
                        <div>
                            <div class="fs-3 fw-semibold text-info">63250</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Accounts</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <div class="fs-3 fw-semibold text-success">97%</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Active</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- END Row #4 -->
</div>

<div class="row">
    <!-- Row #5 -->
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-rounded block-link-shadow text-center" href="be_pages_generic_inbox.html">
            <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                <div class="ribbon-box">15</div>
                <p class="my-3">
                    <i class="si si-envelope-letter fa-2x"></i>
                </p>
                <p class="fw-semibold">Inbox</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-rounded block-link-shadow text-center" href="be_pages_generic_profile.html">
            <div class="block-content">
                <p class="my-3">
                    <i class="si si-user fa-2x"></i>
                </p>
                <p class="fw-semibold">Profile</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-rounded block-link-shadow text-center" href="be_pages_forum_categories.html">
            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-left">
                <div class="ribbon-box">3</div>
                <p class="my-3">
                    <i class="si si-bubbles fa-2x"></i>
                </p>
                <p class="fw-semibold">Forum</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-rounded block-link-shadow text-center" href="be_pages_generic_search.html">
            <div class="block-content">
                <p class="my-3">
                    <i class="si si-magnifier fa-2x"></i>
                </p>
                <p class="fw-semibold">Search</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-rounded block-link-shadow text-center" href="be_comp_charts.html">
            <div class="block-content">
                <p class="my-3">
                    <i class="si si-bar-chart fa-2x"></i>
                </p>
                <p class="fw-semibold">Live Stats</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
                <p class="my-3">
                    <i class="si si-settings fa-2x"></i>
                </p>
                <p class="fw-semibold">Settings</p>
            </div>
        </a>
    </div>
    <!-- END Row #5 -->
</div>
@endsection