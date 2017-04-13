@extends('admin.layouts.master')
@section('title','友情链接列表')
@section('content')
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style="padding: 20px;">
                            <font><font>
                                    友情链接列表
                                </font></font>
                            <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">添加友情链接</button>
                        </header>
                    </section>
                </div>
                <div class="col-lg-12">
                    <section class="panel userList">
                        <header class="panel-heading" style="padding: 15px;">
                            <form class="form-horizontal tasi-form">
                                <div class="form-group">

                                    <div class="col-lg-2">
                                        <select class="form-control m-bot15" v-model="search.type">
                                            <option value="0"><font><font>搜索类型</font></font></option>
                                            <option value="1"><font><font>用户名</font></font></option>
                                            <option value="2"><font><font>手机号</font></font></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" v-model="search.value">
                                    </div>
                                    <button type="submit" @click.prevent="searchLists" class="btn btn-info"><font><font>搜索</font></font></button>
                                </div>
                            </form>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th>链接名称</th>
                                <th>图片/文字</th>
                                <th>链接地址</th>
                                <th>图片名称</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(data,index) in datas">
                                <td><font><font>@{{ data.nickname }}</font></font></td>
                                <td><font><font>@{{ data.tel }}</font></font></td>
                                <td v-if="data.last_login_at == data.created_at"><font><font>刚刚创建 </font></font></td>
                                <td v-else><font><font>@{{ data.last_login_at }} </font></font></td>
                                <td>
                                    <button  @click="getAdminId(data.id)" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#updatePassword" data-whatever="@getbootstrap"  >修改</button>
                                    <button  @click="deleteAdmin(data.id,index)" class="btn btn-danger btn-xs">删除</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <center>@include('common.page')</center>
                    </section>
                    <!-- create admin form  start -->
                    <div class="modal fade createAdminUser" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">添加友情链接</h4>
                                </div>
                                <div class="modal-body" id='FriendLink'>
                                    <form class="userForm"  @submit.prevent="submit($event)">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">链接名称:</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">图片/文字:</label>
                                            <input type="text" class="form-control" name="type" id="type">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">链接地址:</label>
                                            <input type="text" class="form-control"  name="url"  id="url">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">图片名称:</label>
                                            <input type="text" class="form-control"  name="image" id="image">
                                        </div>
                                        <div class="modal-footer" style="margin-top: 45px;">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                            <button type="submit"  class="btn btn-primary">提交</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- create admin form  end -->
                    <!-- update admin password form  start -->
                    <div class="modal fade updateAdminUser" id="updatePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">修改友情链接</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="userForm"  @submit.prevent="submit($event)">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">链接名称:</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">图片/文字:</label>
                                            <input type="text" class="form-control" name="type" id="type">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">链接地址:</label>
                                            <input type="text" class="form-control"  name="url"  id="url">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">图片名称:</label>
                                            <input type="text" class="form-control"  name="image" id="image">
                                        </div>
                                        <div class="modal-footer" style="margin-top: 45px;">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                            <button type="submit"  class="btn btn-primary">提交</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- update admin password form  end -->
                </div>
            </div>
        </section>
    </section>
@stop
@section('customJs')
    <script src="{{ asset('admins/handle/link/insert.js') }}"></script>
@stop