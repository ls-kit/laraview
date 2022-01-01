@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<!-- Main content -->
<transition name="fade" mode="out-in">
    <router-view></router-view>
</transition>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
@stop

@section('js')
<script >

</script>
@stop
