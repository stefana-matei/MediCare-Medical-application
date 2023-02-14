<?php

namespace App\Http\Middleware;

use App\Services\Auth;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string $role
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        switch ($role) {
            case 'medic':
                if (!Auth::user()->isMedic()) {
                    $this->reject();
                }
                break;
            case 'patient':
                if (!Auth::user()->isPatient()) {
                    $this->reject();
                }
                break;
            default:
                $this->reject();
        }

        return $next($request);
    }

    /**
     * @throws AuthenticationException
     */
    private function reject()
    {
        throw new AuthenticationException(
            'Acces interzis.', [], route('login')
        );
    }
}
