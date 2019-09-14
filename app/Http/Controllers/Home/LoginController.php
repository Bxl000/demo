<?php

namespace App\Http\Controllers\Home;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $provider = [
        'github',
    ];

    /**
     * 重定向搭配登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redirectToLoginPage()
    {
        $provider = $this->provider;
        return view('home.login', compact('provider'));
    }

    /**
     * 重定向到第三方登录页面
     * @param $dirver
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($dirver)
    {
        //$dirver = $request->route('dirver');
        if (!$this->isProviderAllowable($dirver)) {
            return $this->sendFailedResponse('暂不支持该方法登录');
        }
        try {
            return Socialite::driver($dirver)->redirect();
        } catch (\Exception $err) {
            return $this->sendFailedResponse($err->getMessage());
        }
    }

    /**
     * 处理第三方登录的回调
     * @param $drive
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function handleProviderCallback($drive)
    {
        try {
            $user = Socialite::driver($drive)->user();
        } catch (Exception $err) {
            return $this->sendFailedResponse($err->getMessage());
        }
        return empty($user->getEmail())
            ? $this->sendFailedResponse('未从' . $drive . '获取到你的邮箱!')
            : $this->userLoginOrCreate($user, $drive);
    }

    /**
     * 用户和数据更新或者创建
     * @param $user
     * @param $dirve
     * @return \Illuminate\Http\RedirectResponse
     */
    private function userLoginOrCreate($user, $dirve)
    {
        //检验是否存在用户
        $userInfo = User::where('email', $user->getEmail())->first();

        if ($userInfo) {
            $userInfo = $userInfo->update([
                'name' => $user->getName,
                'nickname' => $user->getNickname,
                'email' => $user->getEmail,
                'avatar' => $user->getAvatar,
                'provider' => $dirve,
                'providerid' => $user->getId,
                'provider_access_token' => $user->token,
                'updated_at' => date('Y-M-D H:i:s'),
            ]);
        } else {
            $userInfo = User::created([
                'name' => $user->getName,
                'nickname' => $user->getNickname,
                'email' => $user->getEmail,
                'password' => '',
                'avatar' => $user->getAvatar,
                'provider' => $dirve,
                'providerid' => $user->getId,
                'provider_access_token' => $user->token,
                'created_at' => date('Y-M-D H:i:s'),
                'updated_at' => date('Y-M-D H:i:s'),
            ]);
        }
        //登录该用户(默认是不记住用户的)
        Auth::login($userInfo);

        return $this->sendSuccessResponse();
    }

    /**
     * 验证是否是合法的第三方登录提供者
     * @param $dirver
     * @return bool
     */
    private function isProviderAllowable($dirver)
    {
        return in_array($dirver, $this->provider) && config()->has("services.$dirver");
    }

    /**
     * 发送错误信息并跳转
     * @param string $msg
     */
    protected function sendFailedResponse($msg = '')
    {
        return back()->withErrors(['msg' => $msg . ",请重新尝试登录!"]);
    }

    /**
     * 发送成功信息
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendSuccessResponse()
    {
        return redirect()->intended('index')->with('SUCCESS');
    }
}
