<?php

namespace App\Http\Controllers\Voucher; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth,Artisan,Cache,Session,DB,Redirect,Validator,Datatables,Storage,Str,File,Image;

class VoucherController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {
        if(Session::get("loggin") == false && empty(Session::get('loggin'))) {
            Auth::logout();
            Artisan::call('cache:clear');
            Redirect::to('/')->send();
        }
        return $next($request);
        });
    }

    public function index(){
        return view('pages.voucher.index');
    }

    public function checkingVoucher(Request $request){

        $qry = DB::table('vouchers_transactions')
                ->leftjoin('vouchers','vouchers.idVoucher','=','vouchers_transactions.voucherID')
                ->where('voucherCode',$request->voucherCode)
                ->where('vouchers.sttsVoucher',1)
                ->first();
        if ($qry) 
        {
            $voucher = ['detail' => $qry];
            return view('pages.voucher.voucher_detail',$voucher);
        }  
        else
        {
            return Redirect::back()->with('error','Sorry! You have entered invalid code')->withInput();
        }      

    }

    public function detailVoucher($id){
        $qry = DB::table('vouchers_transactions')
                ->leftjoin('vouchers','vouchers.idVoucher','=','vouchers_transactions.voucherID')
                ->where('idVoucherTransaction',$id)
                ->where('vouchers.sttsVoucher',1)
                ->first();

        if ($qry) 
        {
            $voucher = ['detail' => $qry];
            return view('pages.voucher.voucher_detail',$voucher);
        }  
        else
        {
            return Redirect::back()->with('error','Sorry! You have entered invalid code')->withInput();
        }     
    }

    public function checkingScannerVoucher(Request $request){

        $qry = DB::table('vouchers_transactions')
                ->leftjoin('vouchers','vouchers.idVoucher','=','vouchers_transactions.voucherID')
                ->where('voucherCode',$request->voucherCode)
                ->where('vouchers.sttsVoucher',1)
                ->first();

        if ($qry) 
        {
            return json_encode($qry);
        }  
        else
        {
            return json_encode(0);
        }    

    }

    public function redeemVoucher(Request $request)
    {
 
        $qry = DB::table('vouchers_transactions')->where('voucherCode',$request->voucherCode)->update([
                'voucherTransactionAt'      => $request->session()->get('user'),
                'voucherTransactionDate'    => date('Y-m-d H:i:s'),
                'voucherStatus'             => 1,
                'updated_at'                => date('Y-m-d H:i:s'),
                'updatedBy'                 => $request->session()->get('id')
        ]);

        session()->flash('success','Congratulation, you already redeem the voucher');
        return view('pages.voucher.voucher_success_confirm');

    }

    public function voucherActive(Request $request){
        $qry = DB::table('vouchers')
            ->leftjoin('vouchers_transactions','vouchers_transactions.voucherID','=','vouchers.idVoucher')
            ->select(
                'vouchers.*',
                DB::raw('count(voucherID) as total'),
                DB::raw('count(case when voucherStatus = 1 then 1 end) as redeem')
            )
            ->groupBy('vouchers.idVoucher')
            ->orderBy('vouchers.idVoucher','asc')
            ->get();
        return json_encode($qry);    
    }

    public function infoVoucher(Request $request,$id){

        $voucher = DB::table('vouchers')
                ->where('idVoucher',$id)
                ->first();

        $transaction = DB::table('vouchers_transactions')
                ->where('voucherID',$id)
                ->where('voucherStatus',1)
                ->where('updatedBy',$request->session()->get('id'))
                ->orderBy('voucherTransactionDate','asc')
                ->get();        

        $info = ['voucher' => $voucher,'transaction' => $transaction];
        return view('pages.voucher.voucher_info',$info);
    }
}
