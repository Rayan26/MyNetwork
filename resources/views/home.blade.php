@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-6">
            <img src="/svg/profile.jpeg" style="max-height: 150px" class="rounded-circle">
        </div>
        <div class="col-9">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>150</strong> posts</div>
                <div class="pr-5"><strong>150</strong> follower</div>
                <div class="pr-5"><strong>150</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">Link.com</div>
            <div>Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</div>
            <div><a href="www.lapiraterie-shop.com">www.lapiraterie-shop.com</a></div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-4 ">
            <img src="/svg/posts.jpg" style="max-height: 150px" class="rounded-bottom w-100">
        </div>
        <div class="col-4">
            <img src="/svg/posts.jpg" style="max-height: 150px" class="rounded-bottom w-100">
        </div>
        <div class="col-4">
            <img src="/svg/posts.jpg" style="max-height: 150px" class="rounded-bottom w-100">
        </div>
</div>
@endsection
