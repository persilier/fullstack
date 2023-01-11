<?php

namespace App\Http\Controllers\Auth;

use App\ApiCode;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;


class VerifyEmailController extends Controller
{


    public function verify($id): Redirector|JsonResource|RedirectResponse|Application
    {
        $user =User::findOrFail($id);
        if ($user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }
        if (request()->wantsJson()) {
            return new JsonResource('', 204);
        }
        return redirect(url(env('FRONTEND_URL')) . '/admin?verify=1');

    }

    public function resend(): Response|Application|ResponseFactory
    {
        request()->user()->sendEmailVerificationNotification();
        return response([
            'data' => [
                'message' => 'Request has been sent successfully'
            ]
        ]);
    }
}
