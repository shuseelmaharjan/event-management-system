<?php
include('../php/connection.php');
// Start session
session_start();

// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}

include('header.php');
include('sidebar.php');

?>
<!--start of container-->
<div class="main-container">
    <div class="main-title">
        <p class="font-weight-bold">Events</p>
    </div>
    <!--table-->
<table class="table table-sm">
  <thead class="table-dark">
    <tr class="shadow p-2 mb-2 bg-white rounded">
      <th scope="col">S.N.</th>
      <th scope="col">Organizer</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr class="shadow p-3 mb-3 bg-white rounded">
      <td class="col-md-1">1.</td>
      <td class="col-md-3">NEO</td>
      <td class="col-md-3">Kalanki, KTM</td>
      <td class="col-md-3">3345232</td>
      <td class="col-md-4">3345232</td>
    </tr>
  </tbody>
</table>
</div>
<style>
  thead{
    background: #efefef;
  }
</style>
