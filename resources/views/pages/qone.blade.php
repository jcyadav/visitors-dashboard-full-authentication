@extends('layouts.app')

@section('content')

<section id="main-content">
<section class="wrapper">

<div class="row">
<div class="col-md-12">

<div class="panel panel-default">

<div class="panel-heading">
    <h3 class="panel-title">Question 1</h3>
</div>

<div class="panel-body">

    <div class="alert alert-success">
        <strong>Completed Successfully!</strong>
    </div>

    <table class="table table-bordered">
        <tr>
            <th width="30%">Module</th>
            <td>Session Based Login</td>
        </tr>

        <tr>
            <th>Authentication</th>
            <td>AJAX Login with jQuery</td>
        </tr>

        <tr>
            <th>Features</th>
            <td>
                Login Validation<br>
                Session Handling<br>
                Dashboard Redirection<br>
                Logout Functionality
            </td>
        </tr>

        <tr>
            <th>Status</th>
            <td><span class="label label-success">Completed</span></td>
        </tr>
    </table>

</div>

</div>

</div>
</div>

</section>
</section>

@endsection