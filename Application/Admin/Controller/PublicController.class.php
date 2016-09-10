<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller
{
	public function login()
	{
		$this -> display();
	}
	//登陆验证--席
	public function loginOK()
	{
		//获取用户传递过来的数据
		$post =I('post.');
		//调用验证码类进行验证码验证
		$verify = new \Think\Verify();//实例化一个验证码类
		$rst = $verify -> check($post['capatch']);
		if ($rst) {
			//验证吗正确,进行用户身份的验证
			$administrator = M('Admin');
			//删除验证码
			unset($post['capatch']);
			//对密码进行md5加密
			$post['password'] = md5($post['password']);
			$result = $administrator->where("username = '%s' and password = '%s'",array($post['username'],$post['password']))->find();
			//dump($result);die();
			if ($result) {
				//回话控制
				//存在该用户,将用户名加入session，获取用户的登陆ip已经当前时间
				////将用户名加入session	
				session('adminID',$result['id']);
				session('adname',$result['username']);
				//获取当前登录的IP地址和时间加入数据库
				//时间格式为：年月日时分秒，对应数据库格式
				//登陆成功，更新登陆ip和登陆时间
				//组合更新信息
				$updateInfo = array(
						'LastLoginIP' => get_client_ip(),
						'LastLoginTime' => date('Y-m-d H:i:s',time()),
					);
				$rst = $administrator -> where('username = '."'".$result['username']."'" )->save($updateInfo);
				//登陆成功跳转到主页面
				$this -> success('登陆成功，正在跳转！',U('Index/index'),3);
			} else {
				//用户不存在
				$this -> error('请确认用户或密码！',U('login'),3);
			}
			
		} else {
			//验证码有问题，跳转回登陆页面
			$this -> error('验证码错误，请重新登陆！',U('login'),3);
		}

	}
	//生成验证码的方法
	public function capatch()
	{
		//配置
        $cfg = array(
            'fontSize'  =>  10,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    =>  75,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '6.ttf',              // 验证码字体，不设置随机获取

        );
        //实例化验证码类
       $verify = new \Think\Verify($cfg);
       //输出验证码使用verify的entry方法
       $verify -> entry();
	}
	//退出程序
	public function logOut()
	{

		//清空session里面的所有数据
		session(null);
		//判断
		if (!session('?adname')) {
			echo 1;
		}
	}

}