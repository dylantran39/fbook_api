<?php

namespace Laraveldaily\FAuth;

use Illuminate\Http\Request;
use App\Http\Requests;
use FAuth;
use Laraveldaily\FAuth\Services\SocialAccountService;
use Log;
use App\Eloquent\User;
use Carbon\Carbon;

class FAuthController extends Controller
{

    /**
      * @param $provider
      * @return mixed
    */
    public function redirectToProvider($provider)
    {
        // get user infor use password grant
        dd(FAuth::driver($provider)->getTokenByPasswordGrant("tran.dinh.vi@framgia.com", "12345678"));
        /*try {
            $email = "tran.dinh.vi@framgia.com";
            $password = "12345678";

            $userInDatabase = app(User::class)->whereEmail($email)->first();

            if ($userInDatabase) {
                $isTokenExpried = $userInDatabase->updated_at->addSeconds("1800")->toAtomString() > Carbon::now()->toAtomString();
                
                if ($isTokenExpried) {
                    $user = FAuth::driver($provider)->getUserUsePasswordGrant($email, $password);

                    return $user;
                } else {
                    $this->user = $userInDatabase;
                }
            } else {
                $user = FAuth::driver($provider)->getUserUsePasswordGrant($email, $password);

                $this->user = app(User::class)->create[
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'token' => $user->token,
                    'refresh_token' => $user->refresh_token,
                    'expired_time' => $user->expired_time,
                ];
            }
        } catch (\Exception $e) {
            \Log::error($e);
        }*/

        //dd(FAuth::driver($provider)->getUserByToken("4af7937e730cab28ad2e302fa6d5b2c0"));



        //return FAuth::driver($provider)->redirect();
        //return FAuth::driver($provider)->getUserByToken("4af7937e730cab28ad2e302fa6d5b2c0");
    }

    /**
      * @param SocialAccountService $service
      * @param $provider
     * @return mixed
    */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        try {
            $user = $service->createOrGetUser(FAuth::driver($provider));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
