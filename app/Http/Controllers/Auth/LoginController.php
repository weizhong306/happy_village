<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Knuckles\Scribe\Attributes\Response;
use Knuckles\Scribe\Attributes\ResponseField;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Log;

/**
 * @group Auth 身份驗證
 */
class LoginController extends Controller
{
    /**
     * Login 登入
     */

    
    // '@unauthenticated' 
    // 1. Laravel內建
    // 2. 定在用戶嘗試訪問需要身份驗證的路由時應該執行的內容
    // 3. 例如將其定義在/login路由，則未驗證的訪問就會被導向「登入」
     
    #[Response(status: 401, content: 'Unauthorized', description: '驗證失敗')]
    #[ResponseField(name: 'token', type: 'string', description: 'token')]
    #[ResponseField(name: 'expires_at', type: 'string', description: 'token過期時間')]
    #[ResponseField(name: 'user', type: 'object', description: '使用者資訊')]
    #[ResponseField(name: 'user.id', type: 'integer', description: '使用者id')]
    #[ResponseField(name: 'user.name', type: 'string', description: '使用者名稱')]
    #[ResponseField(name: 'user.type', type: 'integer', description: '使用者類型(0: 管理者, 1: 用戶)')]
    public function login(LoginRequest $request)
    {
        dd($request);
        // 用於將信息記錄到 Laravel 的日誌文件中，通常用於調試或記錄應用程序的運行時信息。
        Log::info($request->all());
        // 通常用於在處理表單提交或 API 請求時，僅保留必要的數據，以增強安全性。
        // safe() 方法是 Laravel 的輸入處理方法，它確保返回的值不包含任何潛在的攻擊輸入。這可以防止跨站腳本攻擊（XSS）和其他安全漏洞。
        // safe() 方法不是唯一的過濾方法，具體的方法可能取決於你的安全需求和應用程序的上下文。在處理敏感數據時，請謹慎處理，並確保按照最佳實踐進行安全性處理。
        dd(0);
        $credentals = $request->safe()->only('account', 'password');
        dd($credentals);
       
    }
}
