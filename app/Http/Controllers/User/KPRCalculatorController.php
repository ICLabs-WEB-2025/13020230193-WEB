<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KPRCalculatorController extends Controller
{
    public function index()
    {
        return view('user.kpr.calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'house_price' => 'required|numeric|min:0',
            'down_payment' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'loan_term' => 'required|numeric|min:1',
        ]);

        $principal = $request->house_price - $request->down_payment;
        $monthly_interest = ($request->interest_rate / 100) / 12;
        $total_months = $request->loan_term * 12;

        if ($monthly_interest == 0) {
            $monthly_payment = $principal / $total_months;
        } else {
            $monthly_payment = $principal * ($monthly_interest * pow(1 + $monthly_interest, $total_months)) /
                (pow(1 + $monthly_interest, $total_months) - 1);
        }

        return view('user.kpr.calculator', [
            'monthly_payment' => round($monthly_payment),
            'inputs' => $request->all()
        ]);
    }
}
