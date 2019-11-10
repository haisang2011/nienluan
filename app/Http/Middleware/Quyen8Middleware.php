<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
class Quyen8Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $trangquantri = DB::table('nhomnguoidung_quyen')
            ->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
            ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')
            ->where('nhomnguoidung.nnd_ma',$user->nnd_ma)->pluck('quyen.q_ma');
            $check = 0;
            $mang;
            foreach($trangquantri as $index => $value){
                $mang[$index] = $value;
            }
            if(in_array(8,$mang)){
                $check = 1;
            }

            if($check == 1)
                return $next($request);
            else
                return redirect()->route('Backend.layout.error');
    }
}
