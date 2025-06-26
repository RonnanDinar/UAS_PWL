<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= esc($title ?? 'Rental Mobil') ?></title>
<link 
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
  rel="stylesheet">
</head>
<body>
<?php $role = session('role') ?? 'user'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            Rental Mobil - <?= $role === 'admin' ? 'Admin' : 'User' ?>
        </a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
