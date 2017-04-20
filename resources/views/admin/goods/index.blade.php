@extends('admin.layouts.master')

@section('title')
    商品列表
@stop

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            商品列表
                        </header>
                        <div class="panel-body">
                            <form class="form-inline" role="form" @submit.prevent="searchList">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                    <input type="text" name="goods_title" class="form-control" id="exampleInputEmail2" placeholder="商品名称">
                                </div>
                                <button type="submit" class="btn btn-success">搜索</button>
                            </form>
                        </div>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>ID编号</th>
                                    <th>商品名称</th>
                                    <th>商品状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="good in goods">
                                    <td>@{{ good.id }}</td>
                                    <td><a href="#">@{{ good.goods_title }}</a></td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" v-if="good.goods_status == 1" title="待售"><i class="icon-truck"></i></button>
                                        <button class="btn btn-success btn-xs" v-if="good.goods_status == 2" title="上架"><i class="icon-ok"></i></button>
                                        <button class="btn btn-danger btn-xs" v-if="good.goods_status == 3" title="下架"><i class="icon-remove"></i></button>
                                    </td>
                                    <td>
                                        <a :href="'/admin/cargo/'+good.id" class="btn btn-success btn-xs"><i class="icon-plus"></i></a>
                                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                                    </td>
                                </tr>
                                <tr v-if="!isData"><td colspan="5" class="text-center">暂无数据</td></tr>
                            </tbody>
                        </table>
                        <center v-if="isData">@include('common.page')</center>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@stop

@section('customJs')
    <!-- 当前页面 js -->
    <script src="{{ asset('admins/handle/goods/index.js') }}"></script>
@stop
