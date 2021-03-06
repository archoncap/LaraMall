/**
 * 网站配置添加
 * @author jiaohuafeng
 */
new Vue({
    // 绑定元素
    el: '.config-add',
    // 方法定义
    methods: {
        submit() {

            // FormData支援把 Form 元素丟進去
            var formData = new FormData(event.target);
            // 发送参数
            axios.post('/admin/basicconfig', formData).then(response => {

                // 判断返回结果
                if(response.data.ServerNo == 200){
                    // 把返回参数添加到头部
                    //userListVue.datas.unshift(response.data.ResultData);
                    // 信息提示
                    layer.closeAll();
                    sweetAlert('添加完成','', "success");

                }else{
                    // 添加失败信息提示
                    layer.closeAll();
                    sweetAlert('添加失败','', "error");
                }
            }).catch(error => {
                // 请求失败
                layer.closeAll();
                sweetAlert("网络请求失败!", '', "error");
            });
        }
    }
});