 /**
     * 登录处理
     */
    function DengLu(){
        $model = new MemberModel();//实例化模型
        $this->res = $model->loginCheck();
    }