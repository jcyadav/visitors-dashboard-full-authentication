@extends('layouts.app')

@section('content')

<section id="main-content">
<section class="wrapper">

<div class="row">

<div class="col-md-12">

<div class="panel panel-default">

<div class="panel-heading">
    <h3 class="panel-title">
        <i class="fa fa-user"></i> My Profile
    </h3>
</div>

<div class="panel-body">

<div class="row">

<div class="col-md-3 text-center">

<img src="{{ asset('images/2.png') }}"
     class="img-circle"
     width="140">

<br><br>

<h4>{{ $user->full_name }}</h4>

<span class="label label-success">
    {{ $user->is_active }}
</span>

</div>

<div class="col-md-9">

<table class="table table-bordered table-striped">

<tr>
<th width="30%">Full Name</th>
<td>{{ $user->full_name }}</td>
</tr>

<tr>
<th>Email Address</th>
<td>{{ $user->email_id }}</td>
</tr>

<tr>
<th>Mobile Number</th>
<td>{{ $user->mobile_number }}</td>
</tr>

<tr>
<th>Account Status</th>
<td>
<span class="label label-success">
{{ $user->is_active }}
</span>
</td>
</tr>

<tr>
<th>Created On</th>
<td>{{ $user->created_on }}</td>
</tr>

<tr>
<th>Last Login IP</th>
<td>{{ $user->last_login_ip ?? 'N/A' }}</td>
</tr>

</table>

</div>

</div>

</div>

</div>

</div>

</div>

</section>
</section>

@endsection